<?php
/**
 * Brand and store information helpers.
 */

defined('ABSPATH') || exit;

if (!function_exists('dawp_brand')) {
    /**
     * Single source for brand contact details used across templates and schema.
     */
    function dawp_brand($key = null) {
        $brand = [
            'name'          => 'CHRONEL',
            'domain'        => 'chronelwatches.com',
            'tagline'       => __('Hand-assembled. Every movement carefully selected.', 'dawp'),
            'support_email' => 'support@chronelwatches.com',
            'atelier_email' => 'atelier@chronelwatches.com',
            'hours'             => __('Monday – Friday, 9:00 AM – 5:00 PM (GMT-05:00) Eastern Time', 'dawp'),
            'response_time'     => __('Within 1 business day', 'dawp'),
            'order_cutoff'      => __('5:00 PM (GMT-05:00) Eastern Time', 'dawp'),
            'handling_time'     => __('1–2 business days', 'dawp'),
            'transit_time'      => __('3–5 business days', 'dawp'),
            'delivery_estimate' => __('4–7 business days', 'dawp'),
            'founded'           => '2016',
        ];

        if ($key === null) {
            return $brand;
        }

        return $brand[$key] ?? '';
    }
}

if (!function_exists('dawp_get_woocommerce_store_address')) {
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

        $locality_parts = array_filter([$city, $state_code]);
        $locality       = trim(implode(', ', $locality_parts));
        $locality       = trim(implode(' ', array_filter([$locality, $postcode])));

        $address_parts = array_filter([$address_1, $address_2, $locality]);

        if ('' !== $country_code) {
            $countries = [];

            if (function_exists('WC') && WC() && isset(WC()->countries)) {
                $countries = WC()->countries->get_countries();
            }

            $country = $countries[$country_code] ?? $country_code;

            if ('' !== $country) {
                $address_parts[] = $country;
            }
        }

        return implode(', ', $address_parts);
    }
}
