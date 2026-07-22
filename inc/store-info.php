<?php
/**
 * Store information helpers.
 */

if (! function_exists('dawp_get_woocommerce_store_address')) {
    /**
     * Return the store's official business address as one line.
     *
     * Hardcoded rather than read from WooCommerce settings so the address
     * shown across the site can't drift from the store's official record.
     */
    function dawp_get_woocommerce_store_address() {
        return '1417 Weiner Rd, Memphis, TN 38108';
    }
}

if (! function_exists('dawp_get_support_phone')) {
    /**
     * Return the store's customer support phone number.
     */
    function dawp_get_support_phone() {
        return '901-675-3151';
    }
}
