<?php
/**
 * Store information helpers — MozTire.
 *
 * Every page, policy and FAQ answer reads its numbers from dawp_store_facts()
 * so shipping / return terms stay identical across the site.
 */

if (! function_exists('dawp_store_facts')) {
    function dawp_store_facts() {
        return [
            'brand'            => 'MozTire',
            'domain'           => 'moztire.com',
            'email'            => 'support@moztire.com',
            'hours'            => 'Monday - Friday, 9:00 AM - 6:00 PM ET',
            'response_time'    => 'within 1 business day',
            'ship_area'        => 'the contiguous United States (48 states)',
            'free_shipping'    => 'Free standard ground shipping on every order to the contiguous U.S.',
            'processing'       => '1-2 business days',
            'transit'          => '3-7 business days',
            'delivery_total'   => '4-9 business days',
            'cutoff'           => '2:00 PM Eastern Time',
            'carriers'         => 'UPS, FedEx Ground, or a regional freight carrier',
            'return_window'    => 30,
            'refund_inspect'   => '2-3 business days',
            'refund_issue'     => '5-7 business days',
            'order_prefix'     => 'MZT-',
            'payment'          => 'PayPal',
            'currency'         => 'U.S. dollars (USD)',
            'damage_report'    => 7,
        ];
    }
}

if (! function_exists('dawp_store_fact')) {
    function dawp_store_fact($key) {
        $facts = dawp_store_facts();
        return isset($facts[$key]) ? $facts[$key] : '';
    }
}

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
