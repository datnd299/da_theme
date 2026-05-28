<?php
/**
 * Store information helpers.
 *
 * @package dawp
 */

if (! function_exists('dawp_get_woocommerce_store_address')) {
    /**
     * Return the WooCommerce store address as a single display string.
     *
     * @return string
     */
    function dawp_get_woocommerce_store_address() {
        $address_1       = trim((string) get_option('woocommerce_store_address', ''));
        $address_2       = trim((string) get_option('woocommerce_store_address_2', ''));
        $city            = trim((string) get_option('woocommerce_store_city', ''));
        $postcode        = trim((string) get_option('woocommerce_store_postcode', ''));
        $country_setting = trim((string) get_option('woocommerce_default_country', ''));

        $state = '';
        if ($country_setting !== '') {
            $country_state = explode(':', $country_setting, 2);
            $state         = isset($country_state[1]) ? trim($country_state[1]) : '';
        }

        $city_line = $city;
        $state_zip = trim(implode(' ', array_filter([$state, $postcode])));

        if ($state_zip !== '') {
            $city_line = $city_line !== '' ? $city_line . ', ' . $state_zip : $state_zip;
        }

        return implode(', ', array_filter([$address_1, $address_2, $city_line]));
    }
}
