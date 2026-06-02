<?php
/**
 * Store information helpers.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'dawp_get_store_address' ) ) {
    /**
     * Return the store address configured in WooCommerce settings.
     */
    function dawp_get_store_address() {
        $address_1 = trim( (string) get_option( 'woocommerce_store_address', '' ) );
        $address_2 = trim( (string) get_option( 'woocommerce_store_address_2', '' ) );
        $city      = trim( (string) get_option( 'woocommerce_store_city', '' ) );
        $postcode  = trim( (string) get_option( 'woocommerce_store_postcode', '' ) );
        $state     = '';
        $country   = '';

        if ( function_exists( 'wc_get_base_location' ) ) {
            $location = wc_get_base_location();
            $state    = isset( $location['state'] ) ? trim( (string) $location['state'] ) : '';
            $country  = isset( $location['country'] ) ? trim( (string) $location['country'] ) : '';
        } else {
            $store_country = trim( (string) get_option( 'woocommerce_store_country', '' ) );

            if ( false !== strpos( $store_country, ':' ) ) {
                list( $country, $state ) = array_map( 'trim', explode( ':', $store_country, 2 ) );
            } else {
                $country = $store_country;
            }
        }

        $locality = trim( implode( ' ', array_filter( array( $city, $state, $postcode ) ) ) );

        return implode( ', ', array_filter( array( $address_1, $address_2, $locality, $country ) ) );
    }
}
