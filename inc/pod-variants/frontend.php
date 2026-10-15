<?php
/**
 * POD variant system — front-end: variant selector UI on the single
 * product page.
 *
 * Only activates for products that actually have POD variant rows — a
 * normal simple/variable product is left completely untouched.
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * The `$product` global is a very generic name — other code running on the
 * same hooks can overwrite it with a non-object value (seen in production as
 * a string). Never trust it directly; only use it if it's really a
 * WC_Product, otherwise re-fetch by post ID.
 */
function pod_get_current_product() {
    global $product;
    if ($product instanceof WC_Product) {
        return $product;
    }
    $product_id = get_the_ID();
    return $product_id ? wc_get_product($product_id) : false;
}

add_action('wp_enqueue_scripts', 'pod_enqueue_assets');
function pod_enqueue_assets() {
    if (!function_exists('is_product') || !is_product()) {
        return;
    }

    $product = pod_get_current_product();
    if (!$product || !pod_product_has_variants($product->get_id())) {
        return;
    }

    wp_enqueue_script(
        'pod-variants',
        get_template_directory_uri() . '/assets/js/pod-variants.js',
        [],
        dawp_asset_ver('/assets/js/pod-variants.js'),
        true
    );
    wp_add_inline_script(
        'pod-variants',
        'var podVariantData = ' . wp_json_encode(pod_get_variant_payload($product->get_id())) . ';',
        'before'
    );
}

// The payload is needed by the inline script, gallery and selector alike.
function pod_get_variant_payload($product_id) {
    static $cache = [];
    if (!isset($cache[$product_id])) {
        $cache[$product_id] = pod_build_variant_payload($product_id);
    }
    return $cache[$product_id];
}

function pod_build_variant_payload($product_id) {
    $variants    = pod_get_variants_for_product($product_id);
    $types       = pod_get_types();
    $colors      = pod_get_colors();
    $sizes       = pod_get_sizes();
    $size_prices = pod_get_size_prices();

    $variant_list = [];
    foreach ($variants as $variant) {
        $variant_list[] = [
            'id'         => (int) $variant->id,
            'type_id'    => (int) $variant->type_id,
            'color_id'   => (int) $variant->color_id,
            'price'      => (float) $variant->price,
            'sale_price' => $variant->sale_price !== null ? (float) $variant->sale_price : null,
            'images'     => pod_proxy_image_urls($variant->image_urls),
            'sku'        => $variant->sku,
        ];
    }

    $type_list = [];
    foreach ($types as $id => $type) {
        $type_list[] = ['id' => $id, 'name' => $type->name, 'slug' => $type->slug];
    }

    $color_list = [];
    foreach ($colors as $id => $color) {
        $color_list[] = ['id' => $id, 'name' => $color->name, 'slug' => $color->slug, 'hex' => $color->hex_code];
    }

    $size_list = [];
    foreach ($sizes as $id => $size) {
        $size_list[] = ['id' => $id, 'name' => $size->name, 'slug' => $size->slug];
    }

    return [
        'variants'     => $variant_list,
        'parentImages' => pod_get_parent_image_urls(wc_get_product($product_id)),
        'types'      => $type_list,
        'colors'     => $color_list,
        'sizes'      => $size_list,
        'sizePrices' => $size_prices,
        // get_woocommerce_currency_symbol() returns HTML entities (e.g. "&#36;")
        // meant for HTML output; decode to a plain character since JS sets it
        // via textContent, not innerHTML.
        'currency'   => html_entity_decode(get_woocommerce_currency_symbol(), ENT_QUOTES, 'UTF-8'),
    ];
}

/**
 * Default WC gallery is built from Media Library attachment IDs
 * (_product_image_gallery meta) — doesn't apply to our external image_urls,
 * so it's swapped out only for POD products.
 */
add_action('woocommerce_before_single_product_summary', 'pod_maybe_override_gallery', 5);
function pod_maybe_override_gallery() {
    $product = pod_get_current_product();
    if (!$product || !pod_product_has_variants($product->get_id())) {
        return;
    }
    remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
    add_action('woocommerce_before_single_product_summary', 'pod_render_gallery', 20);
}

/**
 * The parent product's own images (featured + gallery), full size. Goes
 * through wp_get_attachment_image_src() so da-sync virtual image ids resolve
 * too (its image_downsize filter), not just Media Library attachments.
 */
function pod_get_parent_image_urls($product) {
    if (!$product) {
        return [];
    }
    $ids  = array_merge([$product->get_image_id()], (array) $product->get_gallery_image_ids());
    $urls = [];
    foreach ($ids as $id) {
        if (!$id) {
            continue;
        }
        $src = wp_get_attachment_image_src($id, 'full');
        if (!empty($src[0])) {
            $urls[] = $src[0];
        }
    }
    return array_values(array_unique($urls));
}

/**
 * Gallery = selected variant's images first, then the parent product's,
 * de-duplicated by URL. Mirrored by galleryImages() in pod-variants.js.
 */
function pod_merge_gallery_images($variant_images, $parent_images) {
    return array_values(array_unique(array_filter(array_merge((array) $variant_images, (array) $parent_images))));
}

function pod_render_gallery() {
    $product = pod_get_current_product();
    $images  = [];
    if ($product) {
        // Render the variant JS will select first, so it doesn't swap on load.
        $payload = pod_get_variant_payload($product->get_id());
        $state   = pod_initial_selector_state($payload);
        $current = $payload['variants'][0] ?? null;
        foreach ($payload['variants'] as $variant) {
            if ($variant['type_id'] === $state['type_id'] && $variant['color_id'] === $state['color_id']) {
                $current = $variant;
                break;
            }
        }
        $images = pod_merge_gallery_images($current['images'] ?? [], $payload['parentImages']);
    }
    if (!$images) {
        $images = [wc_placeholder_img_src()];
    }
    // .pod-gallery-col fills grid row 1 so the sticky gallery inside it stops
    // at the end of the summary instead of sliding over the tabs below.
    ?>
    <div class="pod-gallery-col">
    <div class="woocommerce-product-gallery pod-gallery">
        <div class="woocommerce-product-gallery__image">
            <img src="<?php echo esc_url($images[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" id="pod-main-image" width="1000" height="1000" loading="eager" fetchpriority="high">
        </div>
        <?php if (count($images) > 1) : ?>
            <ul class="flex-control-thumbs" id="pod-gallery-thumbs">
                <?php foreach ($images as $i => $url) : ?>
                    <li><img src="<?php echo esc_url($url); ?>" class="<?php echo $i === 0 ? 'flex-active' : ''; ?>" loading="lazy" alt=""></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
    </div>
    <?php
}

add_action('woocommerce_single_product_summary', 'pod_render_variant_selector', 25);
function pod_render_variant_selector() {
    $product = pod_get_current_product();
    if (!$product || !pod_product_has_variants($product->get_id())) {
        return;
    }

    $chart_types = pod_get_size_chart_types_for_product($product->get_id());

    // Options are rendered here in the exact markup JS would build for the
    // initial state, so the Style thumbnails etc. don't pop in and push the
    // price/cart down after load. JS adopts them (matching data-key).
    $payload = pod_get_variant_payload($product->get_id());
    $state   = pod_initial_selector_state($payload);
    $groups  = [
        'type'  => ['items' => $payload['types'], 'ids' => $state['type_ids'], 'selected' => $state['type_id']],
        'color' => ['items' => $payload['colors'], 'ids' => $state['color_ids'], 'selected' => $state['color_id']],
        'size'  => ['items' => $payload['sizes'], 'ids' => $state['size_ids'], 'selected' => $state['size_id']],
    ];
    // A group with a single value has nothing to choose — JS auto-selects
    // and hides it.
    $hidden = [];
    foreach ($groups as $group => $g) {
        $hidden[$group] = count($g['ids']) <= 1;
    }
    ?>
    <div class="pod-variant-selector" id="pod-variant-selector" data-product-id="<?php echo esc_attr($product->get_id()); ?>"<?php echo !in_array(false, $hidden, true) ? ' hidden' : ''; ?>>
        <div class="pod-variant-group" data-group="type"<?php echo $hidden['type'] ? ' hidden' : ''; ?>>
            <span class="pod-variant-label"><?php esc_html_e('Style', 'dawp'); ?><span class="pod-variant-selected" id="pod-type-selected"><?php pod_selected_label($groups['type']); ?></span></span>
            <?php pod_render_options('pod-type-options', 'type', $groups['type'], $payload); ?>
        </div>
        <div class="pod-variant-group" data-group="color"<?php echo $hidden['color'] ? ' hidden' : ''; ?>>
            <span class="pod-variant-label"><?php esc_html_e('Color', 'dawp'); ?><span class="pod-variant-selected" id="pod-color-selected"><?php pod_selected_label($groups['color']); ?></span></span>
            <?php pod_render_options('pod-color-options', 'color', $groups['color'], $payload); ?>
        </div>
        <div class="pod-variant-group" data-group="size"<?php echo $hidden['size'] ? ' hidden' : ''; ?>>
            <div class="pod-variant-label-row">
                <span class="pod-variant-label"><?php esc_html_e('Size', 'dawp'); ?><span class="pod-variant-selected" id="pod-size-selected"><?php pod_selected_label($groups['size']); ?></span></span>
                <?php if ($chart_types) : ?>
                    <button type="button" class="pod-sizechart-trigger" data-pod-sizechart-open>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21.3 15.3a2.4 2.4 0 0 1 0 3.4l-2.6 2.6a2.4 2.4 0 0 1-3.4 0L2.7 8.7a2.4 2.4 0 0 1 0-3.4l2.6-2.6a2.4 2.4 0 0 1 3.4 0Z"/><path d="m14.5 12.5 2-2M11.5 9.5l2-2M8.5 6.5l2-2M17.5 15.5l2-2"/></svg>
                        <?php esc_html_e('Size chart', 'dawp'); ?>
                    </button>
                <?php endif; ?>
            </div>
            <?php pod_render_options('pod-size-options', 'size', $groups['size'], $payload); ?>
        </div>
        <p class="pod-variant-error" id="pod-variant-error" hidden></p>
    </div>
    <?php
    if ($chart_types) {
        pod_render_size_chart_modal($chart_types);
    }
}

/**
 * Initial Style/Color/Size selection — mirrors initState() in
 * pod-variants.js (URL params first, else the first available value).
 */
function pod_initial_selector_state($payload) {
    $id_by_slug = function ($list, $param) {
        $slug = isset($_GET[$param]) ? sanitize_title(wp_unslash($_GET[$param])) : '';
        foreach ($list as $item) {
            if ($slug !== '' && $item['slug'] === $slug) {
                return $item['id'];
            }
        }
        return null;
    };

    $colors_by_type = [];
    foreach ($payload['variants'] as $variant) {
        $colors_by_type[$variant['type_id']][] = $variant['color_id'];
    }
    $type_ids = [];
    foreach ($payload['types'] as $type) {
        if (isset($colors_by_type[$type['id']])) {
            $type_ids[] = $type['id'];
        }
    }

    $type_id = $id_by_slug($payload['types'], 'pod_style');
    if (!in_array($type_id, $type_ids, true)) {
        $type_id = $type_ids[0] ?? null;
    }
    $color_ids = $type_id !== null ? array_values(array_unique($colors_by_type[$type_id])) : [];
    // JS reads sizes via Object.keys(), which orders integer keys ascending.
    $size_ids = $type_id !== null ? array_map('intval', array_keys($payload['sizePrices'][$type_id] ?? [])) : [];
    sort($size_ids);

    $color_id = $id_by_slug($payload['colors'], 'pod_color');
    if (!in_array($color_id, $color_ids, true)) {
        $color_id = $color_ids[0] ?? null;
    }
    $size_id = $id_by_slug($payload['sizes'], 'pod_size');
    if (!in_array($size_id, $size_ids, true)) {
        $size_id = $size_ids[0] ?? null;
    }

    return compact('type_id', 'type_ids', 'color_id', 'color_ids', 'size_id', 'size_ids');
}

function pod_selected_label($group) {
    foreach ($group['items'] as $item) {
        if ($item['id'] === $group['selected']) {
            echo esc_html(': ' . $item['name']);
        }
    }
}

/**
 * Same markup as renderOptions() + fill*Option() in pod-variants.js; the
 * data-key lets JS keep these buttons instead of rebuilding them.
 */
function pod_render_options($container_id, $group_name, $group, $payload) {
    $visible = array_values(array_filter($group['items'], function ($item) use ($group) {
        return in_array($item['id'], $group['ids'], true);
    }));
    ?>
    <div class="pod-variant-options" id="<?php echo esc_attr($container_id); ?>" data-key="<?php echo esc_attr(implode(',', wp_list_pluck($visible, 'id'))); ?>">
        <?php foreach ($visible as $item) :
            $classes = ['pod-option'];
            $inner   = esc_html($item['name']);
            $attrs   = ' title="' . esc_attr($item['name']) . '"';
            if ($group_name === 'type') {
                $classes[] = 'pod-option--type';
                $thumb     = '';
                foreach ($payload['variants'] as $variant) {
                    if ($variant['type_id'] === $item['id']) {
                        $thumb = $variant['images'][0] ?? '';
                        break;
                    }
                }
                $inner = '<img class="pod-option-thumb" alt="" loading="lazy" width="52" height="52"' . ($thumb ? ' src="' . esc_url($thumb) . '"' : '') . '>'
                    . '<span class="pod-option-name">' . esc_html($item['name']) . '</span>';
            } elseif ($group_name === 'color' && !empty($item['hex'])) {
                $classes[] = 'pod-option--color';
                $attrs    .= ' aria-label="' . esc_attr($item['name']) . '"';
                $inner     = '<span class="pod-option-swatch" style="background-color:' . esc_attr($item['hex']) . '"></span>';
            } else {
                $classes[] = 'pod-option--text';
                if ($group_name === 'size') {
                    $attrs = '';
                }
            }
            if ($item['id'] === $group['selected']) {
                $classes[] = 'is-selected';
            }
            ?>
            <button type="button" class="<?php echo esc_attr(implode(' ', $classes)); ?>" data-id="<?php echo esc_attr($item['id']); ?>"<?php echo $attrs; ?>><?php echo $inner; ?></button>
        <?php endforeach; ?>
    </div>
    <?php
}

function pod_render_size_chart_modal($chart_types) {
    ?>
    <div class="pod-sizechart-modal" id="pod-sizechart-modal" aria-hidden="true">
        <div class="pod-sizechart-modal__overlay" data-pod-sizechart-close></div>
        <div class="pod-sizechart-modal__panel" role="dialog" aria-modal="true" aria-labelledby="pod-sizechart-modal-title">
            <div class="pod-sizechart-modal__header">
                <h3 class="pod-sizechart-modal__title" id="pod-sizechart-modal-title"><?php esc_html_e('Size Chart', 'dawp'); ?></h3>
                <button type="button" class="pod-sizechart-modal__close" data-pod-sizechart-close aria-label="<?php esc_attr_e('Close', 'dawp'); ?>">&times;</button>
            </div>
            <div class="pod-sizechart-modal__body">
                <?php foreach ($chart_types as $i => $type) : ?>
                    <div class="pod-sizechart-panel" data-type-id="<?php echo esc_attr($type->id); ?>" <?php echo $i === 0 ? '' : 'hidden'; ?>>
                        <?php // {theme_uri} lets stored chart HTML reference theme images on any host. ?>
                        <?php echo wp_kses_post(str_replace('{theme_uri}', get_template_directory_uri(), $type->size_chart_html)); ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php if (count($chart_types) > 1) : ?>
                <div class="pod-sizechart-modal__tabs">
                    <?php foreach ($chart_types as $i => $type) : ?>
                        <button type="button" class="pod-sizechart-tab <?php echo $i === 0 ? 'is-active' : ''; ?>" data-type-id="<?php echo esc_attr($type->id); ?>">
                            <?php echo esc_html($type->name); ?>
                        </button>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php
}

add_action('woocommerce_before_add_to_cart_button', 'pod_render_hidden_inputs');
function pod_render_hidden_inputs() {
    $product = pod_get_current_product();
    if (!$product || !pod_product_has_variants($product->get_id())) {
        return;
    }
    ?>
    <input type="hidden" name="pod_variant_id" id="pod_variant_id" value="">
    <input type="hidden" name="pod_size_id" id="pod_size_id" value="">
    <?php
}
