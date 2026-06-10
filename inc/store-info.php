<?php
/**
 * Store information helpers.
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('dawp_get_store_address')) {
    /**
     * Get the formatted store address used across policy and contact pages.
     */
    function dawp_get_store_address() {
        return apply_filters('dawp_store_address', '1932 William Clark Ave, Sanford, FL 32771');
    }
}
