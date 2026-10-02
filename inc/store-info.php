<?php
/**
 * Single source of truth for Medial Market business details.
 *
 * Phone and address are intentionally empty until the real business details
 * are confirmed. Every template hides a row whose value is empty, so filling
 * these in here updates the header, footer, About, Contact and policy pages.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

function dawp_store_info() {
    return [
        'name'    => 'Medial Market',
        'domain'  => 'medialmarket.com',
        'tagline' => __('Your Budget-Friendly Home Market', 'dawp'),
        'email'   => 'support@medialmarket.com',
        'phone'   => '',
        'address' => '',
        'hours'   => __('Monday - Friday, 9:00 AM - 5:00 PM, GMT-08:00 Pacific Standard Time', 'dawp'),
        'logo'    => get_template_directory_uri() . '/assets/img/medialmarket-logo.svg',
    ];
}

function dawp_store($key) {
    $info = dawp_store_info();
    return $info[$key] ?? '';
}
