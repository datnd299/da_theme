<?php
function dawp_store_address() {
    $fallback = __('1777 Canal St, Merced, CA 95340', 'dawp');

    $address_1 = trim((string) get_option('woocommerce_store_address', ''));
    $address_2 = trim((string) get_option('woocommerce_store_address_2', ''));
    $city      = trim((string) get_option('woocommerce_store_city', ''));
    $postcode  = trim((string) get_option('woocommerce_store_postcode', ''));
    $location  = (string) get_option('woocommerce_default_country', '');

    if ($address_1 === '' && $address_2 === '' && $city === '' && $postcode === '') {
        return $fallback;
    }

    $state = '';
    if (strpos($location, ':') !== false) {
        [, $state] = explode(':', $location, 2);
        $state = trim($state);
    }

    $street_parts = array_filter([$address_1, $address_2]);
    $locality = trim(implode(' ', array_filter([$state, $postcode])));
    $city_line = trim(implode(', ', array_filter([$city, $locality])));
    $address_parts = array_filter([implode(', ', $street_parts), $city_line]);

    return $address_parts ? implode(', ', $address_parts) : $fallback;
}
