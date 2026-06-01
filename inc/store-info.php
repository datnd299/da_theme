<?php
/**
 * Store information helpers.
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('dawp_get_store_address')) {
    /**
     * Get the formatted store address from WooCommerce settings.
     */
    function dawp_get_store_address() {
        $fallback = '';

        $address_1 = trim((string) get_option('woocommerce_store_address', ''));
        $address_2 = trim((string) get_option('woocommerce_store_address_2', ''));
        $city      = trim((string) get_option('woocommerce_store_city', ''));
        $postcode  = trim((string) get_option('woocommerce_store_postcode', ''));
        $location  = trim((string) get_option('woocommerce_default_country', ''));

        if ('' === $address_1 && '' === $address_2 && '' === $city && '' === $postcode && '' === $location) {
            return $fallback;
        }

        $country = $location;
        $state   = '';

        if (false !== strpos($location, ':')) {
            list($country, $state) = array_pad(explode(':', $location, 2), 2, '');
        }

        if (function_exists('WC') && WC()->countries) {
            $countries = WC()->countries->get_countries();
            $states    = WC()->countries->get_states($country);

            if (isset($states[$state])) {
                $state = $states[$state];
            }

            if (isset($countries[$country])) {
                $country = $countries[$country];
            }
        }

        $city_line = trim(implode(', ', array_filter([$city, $state])));
        $city_line = trim(implode(' ', array_filter([$city_line, $postcode])));

        $parts = array_filter([$address_1, $address_2, $city_line, $country]);

        return $parts ? implode(', ', $parts) : $fallback;
    }
}
