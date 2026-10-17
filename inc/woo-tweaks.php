<?php
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_filter('woocommerce_show_page_title', '__return_false');
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

add_filter('loop_shop_columns', function() { return 3; });
add_filter('loop_shop_per_page', function() { return 12; });

// Disable all default WooCommerce CSS
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

// Tire product page blocks
add_action('woocommerce_single_product_summary', 'dawp_pdp_head', 6);
add_action('woocommerce_single_product_summary', 'dawp_pdp_key_specs', 25);
add_action('woocommerce_single_product_summary', 'dawp_pdp_trust', 35);
add_action('woocommerce_after_single_product_summary', 'dawp_pdp_spec_table', 5);
add_filter('woocommerce_product_tabs', 'dawp_pdp_tabs', 20);
add_filter('woocommerce_output_related_products_args', 'dawp_related_products_args');

// Route the single-product gallery (no theme template override exists for it) through the
// i0.wp.com CDN, matching the shop grid. Filters are added/removed tightly around the gallery
// render only, so they don't also catch the unrelated `dawp_product_responsive_image()` calls
// used by the related-products loop further down the same page.
add_action('woocommerce_before_single_product_summary', 'dawp_product_gallery_cdn_filters_on', 19);
add_action('woocommerce_before_single_product_summary', 'dawp_product_gallery_cdn_filters_off', 21);

function dawp_product_gallery_cdn_filters_on() {
    add_filter('wp_get_attachment_image_attributes', 'dawp_product_gallery_cdn_image_attributes');
    add_filter('wp_get_attachment_image_src', 'dawp_product_gallery_cdn_image_src');
    add_filter('wp_calculate_image_srcset', 'dawp_product_gallery_cdn_image_srcset');
}

function dawp_product_gallery_cdn_filters_off() {
    remove_filter('wp_get_attachment_image_attributes', 'dawp_product_gallery_cdn_image_attributes');
    remove_filter('wp_get_attachment_image_src', 'dawp_product_gallery_cdn_image_src');
    remove_filter('wp_calculate_image_srcset', 'dawp_product_gallery_cdn_image_srcset');
}

function dawp_product_gallery_cdn_image_attributes($attr) {
    if (!function_exists('dawp_cdn_image_url')) {
        return $attr;
    }

    $width = isset($attr['width']) ? (int) $attr['width'] : 0;

    if (!empty($attr['src'])) {
        $attr['src'] = dawp_cdn_image_url($attr['src'], $width);
    }
    if (!empty($attr['data-src'])) {
        $attr['data-src'] = dawp_cdn_image_url($attr['data-src']);
    }
    if (!empty($attr['data-large_image'])) {
        $attr['data-large_image'] = dawp_cdn_image_url($attr['data-large_image']);
    }

    return $attr;
}

function dawp_product_gallery_cdn_image_src($image) {
    if (!function_exists('dawp_cdn_image_url') || empty($image[0])) {
        return $image;
    }

    $image[0] = dawp_cdn_image_url($image[0], isset($image[1]) ? (int) $image[1] : 0);

    return $image;
}

function dawp_product_gallery_cdn_image_srcset($sources) {
    if (!function_exists('dawp_cdn_image_url') || empty($sources) || !is_array($sources)) {
        return $sources;
    }

    foreach ($sources as $width => $source) {
        if (!empty($source['url'])) {
            $sources[$width]['url'] = dawp_cdn_image_url($source['url'], (int) $width);
        }
    }

    return $sources;
}

function dawp_product_icon($path, $label = '') {
    return sprintf(
        '<svg class="dawp-product-icon" viewBox="0 0 24 24" aria-hidden="%1$s" role="img">%2$s</svg>',
        $label ? 'false' : 'true',
        $path
    );
}

/**
 * Brand, size and headline specs directly under the product title.
 */
function dawp_pdp_head() {
    global $product;

    $brand      = dawp_product_brand($product);
    $brand_name = dawp_product_brand_name($product);
    $size       = dawp_product_tire_size($product);
    $chips      = dawp_product_tire_chips($product, ['season', 'category', 'vehicle']);

    if (! $brand_name && ! $size && ! $chips) {
        return;
    }
    ?>
    <div class="mz-pdp-head">
        <?php if ($brand) : ?>
            <a class="mz-pdp-head__brand" href="<?php echo esc_url(get_term_link($brand)); ?>"><?php echo esc_html($brand->name); ?> tires</a>
        <?php elseif ($brand_name) : ?>
            <span class="mz-pdp-head__brand"><?php echo esc_html($brand_name); ?></span>
        <?php endif; ?>
        <div class="mz-pdp-head__row">
            <?php if ($size) : ?>
                <span class="mz-pdp-head__size"><?php echo esc_html($size); ?></span>
            <?php endif; ?>
            <?php foreach ($chips as $chip) : ?>
                <span class="mz-pdp-head__chip"><?php echo esc_html($chip); ?></span>
            <?php endforeach; ?>
        </div>
    </div>
    <?php
}

/**
 * Compact spec grid above the add-to-cart button.
 */
function dawp_pdp_key_specs() {
    global $product;

    $rows = [
        'Load Index'     => dawp_product_tire_value($product, 'load_index'),
        'Speed Rating'   => dawp_product_tire_value($product, 'speed'),
        'Load Range'     => dawp_product_tire_value($product, 'load_range'),
        'Tread Warranty' => dawp_product_tire_value($product, 'warranty'),
        'Sidewall'       => dawp_product_tire_value($product, 'sidewall'),
        'Sold As'        => dawp_product_tire_value($product, 'pack'),
    ];
    $rows = array_filter($rows, 'strlen');

    if (! $rows) {
        return;
    }
    ?>
    <dl class="mz-pdp-specs">
        <?php foreach ($rows as $label => $value) : ?>
            <div><dt><?php echo esc_html($label); ?></dt><dd><?php echo esc_html($value); ?></dd></div>
        <?php endforeach; ?>
    </dl>
    <?php
}

function dawp_pdp_trust() {
    global $product;

    $facts = dawp_store_facts();
    $size  = dawp_product_tire_size($product, false);
    $items = [
        ['icon' => '<path d="M3 7h11v9H3zM14 10h4l3 3v3h-7z"/><circle cx="7" cy="18" r="2"/><circle cx="17" cy="18" r="2"/>', 'title' => 'Free ground shipping', 'text' => 'Arrives in ' . $facts['delivery_total'] . ' to the contiguous U.S.'],
        ['icon' => '<path d="M3 21h18M5 21V8l7-4 7 4v13M9 21v-6h6v6"/>', 'title' => 'Ship to your installer', 'text' => 'Use the shop\'s address at checkout'],
        ['icon' => '<path d="M4 12a8 8 0 1 0 3-6.2"/><path d="M4 4v4h4"/>', 'title' => $facts['return_window'] . '-day returns', 'text' => 'On new, unmounted tires'],
    ];
    ?>
    <p class="mz-pdp-fit">
        <span>
            <strong>Check fitment:</strong>
            <?php if ($size) : ?>
                make sure <strong><?php echo esc_html($size); ?></strong> matches the size on your current sidewall or door-jamb placard.
            <?php else : ?>
                compare this size with the one on your current sidewall or door-jamb placard.
            <?php endif; ?>
            <a href="<?php echo esc_url(home_url('/tire-size-guide/')); ?>">How to read a tire size</a>
        </span>
    </p>
    <ul class="mz-pdp-trust">
        <?php foreach ($items as $item) : ?>
            <li>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><?php echo $item['icon']; // phpcs:ignore ?></svg>
                <span><strong><?php echo esc_html($item['title']); ?></strong><span><?php echo esc_html($item['text']); ?></span></span>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php
}

/**
 * Full tire specification table. Each value links to the shop filtered by it.
 */
function dawp_pdp_spec_table() {
    global $product;

    $rows  = [];
    $brand = dawp_product_brand($product);

    if ($brand) {
        $rows[] = ['label' => 'Brand', 'html' => '<a href="' . esc_url(get_term_link($brand)) . '">' . esc_html($brand->name) . '</a>'];
    }

    $size = dawp_product_tire_size($product, false);
    if ($size) {
        $size_cat = null;
        foreach (get_the_terms($product->get_id(), 'product_cat') ?: [] as $cat) {
            if (dawp_tire_parse_size($cat->name)) {
                $size_cat = $cat;
                break;
            }
        }
        $rows[] = ['label' => 'Tire Size', 'html' => $size_cat ? '<a href="' . esc_url(get_term_link($size_cat)) . '">' . esc_html($size) . '</a>' : esc_html($size)];
    }

    foreach (dawp_tire_attributes() as $attribute) {
        $taxonomy = $attribute['tax'];
        if (! taxonomy_exists($taxonomy)) {
            continue;
        }

        $terms = wc_get_product_terms($product->get_id(), $taxonomy);
        if (is_wp_error($terms) || ! $terms) {
            continue;
        }

        $links = array_map(static function ($term) use ($attribute) {
            return ! empty($attribute['filter'])
                ? '<a href="' . esc_url(dawp_tire_filter_url([$term->taxonomy => $term->slug])) . '">' . esc_html($term->name) . '</a>'
                : esc_html($term->name);
        }, $terms);

        $rows[] = ['label' => $attribute['label'], 'html' => implode(', ', $links)];
    }

    if ($product->get_sku()) {
        $rows[] = ['label' => 'SKU', 'html' => esc_html($product->get_sku())];
    }

    if (count($rows) < 2) {
        return;
    }
    ?>
    <section class="mz-spec" aria-labelledby="mz-spec-title">
        <div class="mz-spec__head">
            <h2 id="mz-spec-title">Tire specifications</h2>
            <a href="<?php echo esc_url(home_url('/tire-size-guide/')); ?>">What do these mean?</a>
        </div>
        <dl class="mz-spec__grid">
            <?php foreach ($rows as $row) : ?>
                <div><dt><?php echo esc_html($row['label']); ?></dt><dd><?php echo wp_kses_post($row['html']); ?></dd></div>
            <?php endforeach; ?>
        </dl>
    </section>
    <?php
}

/**
 * The spec table above replaces WooCommerce's "Additional information" tab.
 */
function dawp_pdp_tabs($tabs) {
    global $product;

    if ($product && count(array_filter(dawp_tire_attributes(), static function ($a) use ($product) {
        return taxonomy_exists($a['tax']) && has_term('', $a['tax'], $product->get_id());
    }))) {
        unset($tabs['additional_information']);
    }

    return $tabs;
}

function dawp_related_products_args($args) {
    $args['posts_per_page'] = 4;
    $args['columns']        = 4;
    return $args;
}
