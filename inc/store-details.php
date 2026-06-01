<?php
/**
 * Store detail helpers.
 *
 * @package dawp
 */

/**
 * Get the WooCommerce store address as display lines.
 *
 * @return string[]
 */
function dawp_get_store_address_lines() {
    $address_1 = trim((string) get_option('woocommerce_store_address', ''));
    $address_2 = trim((string) get_option('woocommerce_store_address_2', ''));
    $city      = trim((string) get_option('woocommerce_store_city', ''));
    $postcode  = trim((string) get_option('woocommerce_store_postcode', ''));
    $country   = trim((string) get_option('woocommerce_default_country', ''));
    $state     = '';

    if ($country !== '' && strpos($country, ':') !== false) {
        [$country, $state] = array_map('trim', explode(':', $country, 2));
    }

    $city_state_postcode = trim(implode(' ', array_filter([
        trim(implode(', ', array_filter([$city, $state]))),
        $postcode,
    ])));

    return array_values(array_filter([
        $address_1,
        $address_2,
        $city_state_postcode,
    ]));
}

/**
 * Get the WooCommerce store address as a single line.
 *
 * @return string
 */
function dawp_get_store_address() {
    return implode(', ', dawp_get_store_address_lines());
}
