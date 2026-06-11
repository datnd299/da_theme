<?php
/**
 * Store information helpers.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'dawp_get_store_address' ) ) {
    /**
     * Return the public-facing store address.
     */
    function dawp_get_store_address() {
        return '2875 Baseline Rd, Roseville, CA 95747';
    }
}
