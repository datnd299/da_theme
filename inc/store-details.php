<?php
/**
 * Store detail helpers.
 *
 * @package dawp
 */

/**
 * Get the business address as display lines.
 *
 * @return string[]
 */
function dawp_get_store_address_lines() {
    return [
        '4211 W Sahara Ave, Ste C',
        'Las Vegas, NV 89102',
    ];
}

/**
 * Get the business address as a single line.
 *
 * @return string
 */
function dawp_get_store_address() {
    return implode(', ', dawp_get_store_address_lines());
}
