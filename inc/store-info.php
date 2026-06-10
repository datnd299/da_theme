<?php
/**
 * Store information helpers.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

function dawp_get_store_address($fallback = '') {
    $address_1 = trim((string) get_option('woocommerce_store_address', ''));
    $address_2 = trim((string) get_option('woocommerce_store_address_2', ''));
    $city      = trim((string) get_option('woocommerce_store_city', ''));
    $postcode  = trim((string) get_option('woocommerce_store_postcode', ''));
    $location  = (string) get_option('woocommerce_default_country', '');
    $state     = '';

    if (strpos($location, ':') !== false) {
        [, $state] = array_pad(explode(':', $location, 2), 2, '');
        $state = trim($state);
    }

    $state_postcode = trim(implode(' ', array_filter([$state, $postcode])));
    if ($city && $state_postcode) {
        $city_line = $city . ', ' . $state_postcode;
    } elseif ($city) {
        $city_line = $city;
    } else {
        $city_line = $state_postcode;
    }

    $parts = array_filter([$address_1, $address_2, $city_line]);

    if (empty($parts)) {
        return $fallback;
    }

    return implode(', ', $parts);
}
