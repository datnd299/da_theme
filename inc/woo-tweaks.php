<?php
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_filter('woocommerce_show_page_title', '__return_false');
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

add_filter('loop_shop_columns', function() { return 3; });
add_filter('loop_shop_per_page', function() { return 12; });

// Disable all default WooCommerce CSS
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

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

