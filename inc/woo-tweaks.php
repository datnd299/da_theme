<?php
/**
 * WooCommerce behaviour tweaks and the extra blocks shown on a single product.
 */

defined('ABSPATH') || exit;

remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_filter('woocommerce_show_page_title', '__return_false');
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

add_filter('loop_shop_columns', function () { return 4; });
add_filter('loop_shop_per_page', function () { return 12; });

// The theme ships its own complete stylesheets.
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

add_action('woocommerce_single_product_summary', 'dawp_single_product_assurances', 31);
add_action('woocommerce_after_single_product_summary', 'dawp_single_product_atelier_banner', 8);

/**
 * Route the single-product gallery through the image CDN, matching the shop grid.
 * Filters are added and removed tightly around the gallery render only, so they do not
 * also catch the `dawp_product_responsive_image()` calls used by related products below.
 */
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
        '<svg class="dawp-product-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="%1$s" role="img">%2$s</svg>',
        $label ? 'false' : 'true',
        $path
    );
}

/**
 * The four assurances shown under the add-to-cart form.
 */
function dawp_single_product_assurances() {
    $badges = [
        [
            'icon'  => '<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>',
            'title' => __('Carefully selected automatic movement', 'dawp'),
            'copy'  => __('24 jewels, 28,800 vph, regulated in five positions.', 'dawp'),
        ],
        [
            'icon'  => '<path d="M12 3l7 3v5c0 4.3-2.9 8.2-7 9.6C7.9 19.2 5 15.3 5 11V6l7-3z"/><path d="M9 12l2 2 4-4.5"/>',
            'title' => __('Five-year movement warranty', 'dawp'),
            'copy'  => __('Backed by our lifetime service programme.', 'dawp'),
        ],
        [
            'icon'  => '<path d="M3 8h11v8H3z"/><path d="M14 11h4l3 3v2h-7z"/><circle cx="7" cy="18.5" r="1.8"/><circle cx="17" cy="18.5" r="1.8"/>',
            'title' => __('Insured delivery, included', 'dawp'),
            'copy'  => __('Signature required, fully insured across the United States.', 'dawp'),
        ],
        [
            'icon'  => '<path d="M12 3l2.4 5.4 5.6.6-4.2 3.9 1.2 5.6L12 15.7 6.9 18.5l1.2-5.6L4 9l5.6-.6z"/>',
            'title' => __('Individually numbered', 'dawp'),
            'copy'  => __('Serial engraved on the case back and recorded on the certificate.', 'dawp'),
        ],
    ];
    ?>
    <section class="dawp-product-trust" aria-label="<?php esc_attr_e('Ownership assurances', 'dawp'); ?>">
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

/**
 * A quiet atelier band below the product summary.
 */
function dawp_single_product_atelier_banner() {
    ?>
    <section class="dawp-atelier-banner" aria-label="<?php esc_attr_e('About the atelier', 'dawp'); ?>">
        <div class="dawp-atelier-banner__figure" aria-hidden="true">
            <img src="<?php echo esc_url(dawp_asset_uri('assets/img/atelier/movement.jpeg')); ?>" alt="" width="1024" height="1024" loading="lazy" decoding="async">
        </div>
        <div class="dawp-atelier-banner__content">
            <p class="dawp-atelier-banner__eyebrow"><?php esc_html_e('Calibre CH-01', 'dawp'); ?></p>
            <h2><?php esc_html_e('Assembled by one watchmaker, start to finish.', 'dawp'); ?></h2>
            <p><?php esc_html_e('Every movement is cased, timed, and inspected by the same hands. Nothing leaves the atelier until it holds its rate across five positions.', 'dawp'); ?></p>
            <a class="dawp-atelier-banner__link" href="<?php echo esc_url(home_url('/about-us/')); ?>"><?php esc_html_e('Inside the atelier', 'dawp'); ?></a>
        </div>
    </section>
    <?php
}
