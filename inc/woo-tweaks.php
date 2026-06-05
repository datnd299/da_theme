<?php
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_filter('woocommerce_show_page_title', '__return_false');
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

add_filter('loop_shop_columns', function() { return 3; });
add_filter('loop_shop_per_page', function() { return 12; });

// Disable all default WooCommerce CSS
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

function dawp_get_woocommerce_store_address() {
    $countries = function_exists('WC') && WC() ? WC()->countries : null;

    if ($countries) {
        $address_1 = $countries->get_base_address();
        $address_2 = $countries->get_base_address_2();
        $city      = $countries->get_base_city();
        $state     = $countries->get_base_state();
        $postcode  = $countries->get_base_postcode();
        $country   = $countries->get_base_country();
    } else {
        $address_1       = get_option('woocommerce_store_address', '');
        $address_2       = get_option('woocommerce_store_address_2', '');
        $city            = get_option('woocommerce_store_city', '');
        $country_state   = explode(':', get_option('woocommerce_default_country', ''), 2);
        $country         = $country_state[0] ?? '';
        $state           = $country_state[1] ?? '';
        $postcode        = get_option('woocommerce_store_postcode', '');
    }

    $address_parts = array_filter(array_map('trim', [
        wp_strip_all_tags($address_1),
        wp_strip_all_tags($address_2),
    ]));

    $city_state_postcode = trim(implode(', ', array_filter([
        wp_strip_all_tags($city),
        trim(implode(' ', array_filter([
            wp_strip_all_tags($state),
            wp_strip_all_tags($postcode),
        ]))),
    ])));

    if ($city_state_postcode) {
        $address_parts[] = $city_state_postcode;
    }

    if (!$address_parts && $country) {
        $address_parts[] = wp_strip_all_tags($country);
    }

    return implode(', ', $address_parts);
}
