<?php
/**
 * Shared template helpers.
 *
 * @package dawp
 */

function dawp_get_store_address() {
    $address_parts = array_filter(array_map('trim', [
        get_option('woocommerce_store_address', ''),
        get_option('woocommerce_store_address_2', ''),
    ]));

    $city     = trim(get_option('woocommerce_store_city', ''));
    $postcode = trim(get_option('woocommerce_store_postcode', ''));
    $state    = '';

    $default_country = get_option('woocommerce_default_country', '');
    if (strpos($default_country, ':') !== false) {
        [, $state] = array_map('trim', explode(':', $default_country, 2));
    }

    $city_state_postcode = trim(implode(' ', array_filter([
        trim(implode(', ', array_filter([$city, $state]))),
        $postcode,
    ])));

    if ($city_state_postcode !== '') {
        $address_parts[] = $city_state_postcode;
    }

    $address = implode(', ', $address_parts);

    return $address !== '' ? $address : __('425 Avenue P, Newark, NJ 07105', 'dawp');
}
