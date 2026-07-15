<?php
/**
 * Store information helpers.
 */

if (! function_exists('dawp_get_woocommerce_store_address')) {
    /**
     * Return the store address configured in WooCommerce settings as one line.
     */
    function dawp_get_woocommerce_store_address() {
        $address_1     = trim((string) get_option('woocommerce_store_address', ''));
        $address_2     = trim((string) get_option('woocommerce_store_address_2', ''));
        $city          = trim((string) get_option('woocommerce_store_city', ''));
        $postcode      = trim((string) get_option('woocommerce_store_postcode', ''));
        $country_state = trim((string) get_option('woocommerce_default_country', ''));

        $country_code = '';
        $state_code   = '';

        if ('' !== $country_state) {
            $country_parts = explode(':', $country_state, 2);
            $country_code  = isset($country_parts[0]) ? trim($country_parts[0]) : '';
            $state_code    = isset($country_parts[1]) ? trim($country_parts[1]) : '';
        }

        $locality_parts = array_filter(array($city, $state_code));
        $locality       = trim(implode(', ', $locality_parts));
        $locality       = trim(implode(' ', array_filter(array($locality, $postcode))));

        $address_parts = array_filter(array($address_1, $address_2, $locality));

        if ('' !== $country_code) {
            $countries = array();

            if (function_exists('WC') && WC() && isset(WC()->countries)) {
                $countries = WC()->countries->get_countries();
            }

            $country = isset($countries[$country_code]) ? $countries[$country_code] : $country_code;

            if ('' !== $country) {
                $address_parts[] = $country;
            }
        }

        return implode(', ', $address_parts);
    }
}
