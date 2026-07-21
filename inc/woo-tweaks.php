<?php
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_filter('woocommerce_show_page_title', '__return_false');
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

add_filter('loop_shop_columns', function() { return 3; });
add_filter('loop_shop_per_page', function() { return 12; });

// Disable all default WooCommerce CSS
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

add_action('woocommerce_single_product_summary', 'dawp_single_product_benefits', 45);
function dawp_single_product_benefits() {
    if (!is_product()) {
        return;
    }

    $benefits = [
        [
            'title' => __('Fast Shipping', 'dawp'),
            'copy'  => __('Reliable delivery across the United States.', 'dawp'),
            'icon'  => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 7h11v10H3z"/><path d="M14 10h4l3 3v4h-7z"/><path d="M7 20a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/><path d="M18 20a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>',
        ],
        [
            'title' => __('Secure Checkout', 'dawp'),
            'copy'  => __('Protected payment experience from cart to confirmation.', 'dawp'),
            'icon'  => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3l7 3v5c0 4.6-2.9 8-7 10-4.1-2-7-5.4-7-10V6z"/><path d="M9 12l2 2 4-5"/></svg>',
        ],
        [
            'title' => __('Easy Returns', 'dawp'),
            'copy'  => __('Simple 30-day return process after delivery.', 'dawp'),
            'icon'  => '<span aria-hidden="true">30</span>',
        ],
        [
            'title' => __('Friendly Support', 'dawp'),
            'copy'  => __('Helpful service whenever you need order guidance.', 'dawp'),
            'icon'  => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 12a8 8 0 0 1 16 0v4a3 3 0 0 1-3 3h-2"/><path d="M4 13h3v5H4z"/><path d="M17 13h3v5h-3z"/><path d="M10 19h5"/></svg>',
        ],
    ];
    ?>
    <section class="tgm-product-benefits" aria-label="<?php esc_attr_e('Shopping benefits', 'dawp'); ?>">
        <?php foreach ($benefits as $benefit) : ?>
            <article class="tgm-product-benefit">
                <div class="tgm-product-benefit__icon"><?php echo $benefit['icon']; ?></div>
                <div class="tgm-product-benefit__content">
                    <h2><?php echo esc_html($benefit['title']); ?></h2>
                    <p><?php echo esc_html($benefit['copy']); ?></p>
                </div>
            </article>
        <?php endforeach; ?>
    </section>
    <?php
}

/**
 * Get the formatted store address from WooCommerce settings.
 *
 * @return string
 */
function dawp_get_store_address() {
    $address_1     = trim((string) get_option('woocommerce_store_address', ''));
    $address_2     = trim((string) get_option('woocommerce_store_address_2', ''));
    $city          = trim((string) get_option('woocommerce_store_city', ''));
    $postcode      = trim((string) get_option('woocommerce_store_postcode', ''));
    $country_state = trim((string) get_option('woocommerce_default_country', ''));

    $country = '';
    $state   = '';

    if (strpos($country_state, ':') !== false) {
        [$country, $state] = array_pad(explode(':', $country_state, 2), 2, '');
    } else {
        $country = $country_state;
    }

    $woocommerce = function_exists('WC') ? WC() : null;

    if ($woocommerce && !empty($woocommerce->countries)) {
        $countries = $woocommerce->countries->get_countries();
        $states    = $country ? $woocommerce->countries->get_states($country) : [];

        if ($state && is_array($states) && isset($states[$state])) {
            $state = $states[$state];
        }

        if ($country && isset($countries[$country])) {
            $country = $countries[$country];
        }
    }

    $city_line = trim(implode(' ', array_filter([$city, $state, $postcode])));
    $parts     = array_filter([$address_1, $address_2, $city_line, $country]);

    return implode(', ', $parts);
}

/* ============================================================
 * GMC Compliance — GTIN / MPN Admin Fields
 * ============================================================ */

/**
 * Add GTIN and MPN fields to product admin (Inventory tab, after SKU).
 */
add_action('woocommerce_product_options_sku', 'tgm_add_gtin_mpn_fields');
function tgm_add_gtin_mpn_fields() {
    woocommerce_wp_text_input([
        'id'          => '_gtin',
        'label'       => __('GTIN (UPC/EAN)', 'topgoodmart'),
        'desc_tip'    => true,
        'description' => __('Global Trade Item Number — required for Google Merchant Center.', 'topgoodmart'),
        'placeholder' => 'e.g. 012345678905',
    ]);
    woocommerce_wp_text_input([
        'id'          => '_mpn',
        'label'       => __('MPN', 'topgoodmart'),
        'desc_tip'    => true,
        'description' => __('Manufacturer Part Number — required for Google Merchant Center.', 'topgoodmart'),
        'placeholder' => 'e.g. TGM-MPN-0001',
    ]);
}

/**
 * Save GTIN and MPN meta when product is saved.
 */
add_action('woocommerce_admin_process_product_object', 'tgm_save_gtin_mpn_fields');
function tgm_save_gtin_mpn_fields($product) {
    if (isset($_POST['_gtin'])) {
        $product->update_meta_data('_gtin', sanitize_text_field($_POST['_gtin']));
    }
    if (isset($_POST['_mpn'])) {
        $product->update_meta_data('_mpn', sanitize_text_field($_POST['_mpn']));
    }
}

/**
 * Display GTIN and MPN on the product page (after SKU in product meta).
 */
add_action('woocommerce_product_meta_end', 'tgm_display_gtin_mpn');
function tgm_display_gtin_mpn() {
    global $product;
    if (!$product) {
        return;
    }

    $gtin = $product->get_meta('_gtin');
    $mpn  = $product->get_meta('_mpn');

    if (!empty($gtin)) {
        echo '<span class="gtin_wrapper">GTIN: <span>' . esc_html($gtin) . '</span></span> ';
    }
    if (!empty($mpn)) {
        echo '<span class="mpn_wrapper">MPN: <span>' . esc_html($mpn) . '</span></span>';
    }
}

