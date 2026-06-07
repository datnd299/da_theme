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
    $address_1 = get_option('woocommerce_store_address', '');
    $address_2 = get_option('woocommerce_store_address_2', '');
    $city      = get_option('woocommerce_store_city', '');
    $postcode  = get_option('woocommerce_store_postcode', '');
    $country_state = get_option('woocommerce_default_country', '');
    
    $state = '';
    if ( strpos( $country_state, ':' ) !== false ) {
        list( $country, $state ) = explode( ':', $country_state );
    } else {
        $state = $country_state; // fallback if no colon
    }

    $address = trim( $address_1 . ' ' . $address_2 );
    if ( $city ) {
        $address .= $address ? ', ' . $city : $city;
    }
    if ( $state ) {
        $address .= $address ? ', ' . $state : $state;
    }
    if ( $postcode ) {
        $address .= $address ? ' ' . $postcode : $postcode;
    }
    
    return $address;
}

