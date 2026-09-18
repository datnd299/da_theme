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
        POD_VARIANTS_DB_VERSION,
        true
    );
    wp_add_inline_script(
        'pod-variants',
        'var podVariantData = ' . wp_json_encode(pod_build_variant_payload($product->get_id())) . ';',
        'before'
    );
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
        'variants'   => $variant_list,
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

function pod_render_gallery() {
    $product  = pod_get_current_product();
    $variants = $product ? pod_get_variants_for_product($product->get_id()) : [];
    $images   = !empty($variants) ? pod_proxy_image_urls($variants[0]->image_urls) : [];
    if (!$images) {
        $images = [wc_placeholder_img_src()];
    }
    ?>
    <div class="woocommerce-product-gallery pod-gallery">
        <div class="woocommerce-product-gallery__image">
            <img src="<?php echo esc_url($images[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" id="pod-main-image" loading="eager">
        </div>
        <?php if (count($images) > 1) : ?>
            <ul class="flex-control-thumbs" id="pod-gallery-thumbs">
                <?php foreach ($images as $i => $url) : ?>
                    <li><img src="<?php echo esc_url($url); ?>" class="<?php echo $i === 0 ? 'flex-active' : ''; ?>" loading="lazy" alt=""></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
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
    ?>
    <div class="pod-variant-selector" id="pod-variant-selector" data-product-id="<?php echo esc_attr($product->get_id()); ?>">
        <div class="pod-variant-group" data-group="type">
            <span class="pod-variant-label"><?php esc_html_e('Style', 'dawp'); ?><span class="pod-variant-selected" id="pod-type-selected"></span></span>
            <div class="pod-variant-options" id="pod-type-options"></div>
        </div>
        <div class="pod-variant-group" data-group="color">
            <span class="pod-variant-label"><?php esc_html_e('Color', 'dawp'); ?><span class="pod-variant-selected" id="pod-color-selected"></span></span>
            <div class="pod-variant-options" id="pod-color-options"></div>
        </div>
        <div class="pod-variant-group" data-group="size">
            <div class="pod-variant-label-row">
                <span class="pod-variant-label"><?php esc_html_e('Size', 'dawp'); ?><span class="pod-variant-selected" id="pod-size-selected"></span></span>
                <?php if ($chart_types) : ?>
                    <button type="button" class="pod-sizechart-trigger" data-pod-sizechart-open>
                        <?php esc_html_e('Size chart', 'dawp'); ?>
                    </button>
                <?php endif; ?>
            </div>
            <div class="pod-variant-options" id="pod-size-options"></div>
        </div>
        <p class="pod-variant-error" id="pod-variant-error" hidden></p>
    </div>
    <?php
    if ($chart_types) {
        pod_render_size_chart_modal($chart_types);
    }
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
                        <?php echo wp_kses_post($type->size_chart_html); ?>
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
