<?php
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_filter('woocommerce_show_page_title', '__return_false');
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

add_filter('loop_shop_columns', function() { return 3; });
add_filter('loop_shop_per_page', function() { return 12; });

// Disable all default WooCommerce CSS
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

add_action('woocommerce_single_product_summary', 'dawp_single_product_trust_badges', 31);
add_action('woocommerce_after_single_product_summary', 'dawp_single_product_pride_banner', 8);

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

function dawp_single_product_trust_badges() {
    $badges = array(
        array(
            'icon' => '<circle cx="12" cy="12" r="8"/><path d="M12 8v4l2.5 1.5"/>',
            'title' => __('Automatic Movement', 'dawp'),
            'copy' => __('Self-winding mechanical caliber — no battery to replace.', 'dawp'),
        ),
        array(
            'icon' => '<path d="M10 17h4V5H3v12h2"/><path d="M14 8h4l3 3v6h-3"/><circle cx="7" cy="17" r="2"/><circle cx="16" cy="17" r="2"/>',
            'title' => __('Free US Shipping', 'dawp'),
            'copy' => __('Every US order ships free, with tracking and careful packaging.', 'dawp'),
        ),
        array(
            'icon' => '<path d="M20 12a8 8 0 0 1-13.66 5.66L4 15"/><path d="M4 20v-5h5"/><path d="M4 12A8 8 0 0 1 17.66 6.34L20 9"/><path d="M20 4v5h-5"/>',
            'title' => __('30-Day Returns', 'dawp'),
            'copy' => __('Return an unworn watch with box and papers within 30 days.', 'dawp'),
        ),
    );
    ?>
    <section class="dawp-product-trust" aria-label="<?php esc_attr_e('Product trust highlights', 'dawp'); ?>">
        <?php foreach ($badges as $badge) : ?>
            <div class="dawp-product-trust__item">
                <span class="dawp-product-trust__icon"><?php echo dawp_product_icon($badge['icon']); ?></span>
                <span>
                    <strong><?php echo esc_html($badge['title']); ?></strong>
                    <small><?php echo esc_html($badge['copy']); ?></small>
                </span>
            </div>
        <?php endforeach; ?>
    </section>
    <?php
}

function dawp_single_product_pride_banner() {
    ?>
    <section class="dawp-pride-banner" aria-label="<?php esc_attr_e('Watch collection message', 'dawp'); ?>">
        <div class="dawp-pride-banner__emblem" aria-hidden="true">
            <span>&#9673;</span>
        </div>
        <div class="dawp-pride-banner__content">
            <p><?php esc_html_e('YourWatchStore Collection', 'dawp'); ?></p>
            <h2><?php esc_html_e('Mechanical watches for every day.', 'dawp'); ?></h2>
            <small><?php esc_html_e('Automatic dive, field, dress, and chronograph watches, inspected before they ship.', 'dawp'); ?></small>
        </div>
    </section>
    <?php
}

