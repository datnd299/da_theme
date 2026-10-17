<?php
/**
 * Navigation data — MozTire.
 */

function dawp_main_menu_items() {
    return [
        ['title' => __('Shop Tires', 'dawp'), 'url' => dawp_shop_url()],
        ['title' => __('Shop by Brand', 'dawp'), 'url' => home_url('/shop-by-brand/')],
        ['title' => __('Tire Size Guide', 'dawp'), 'url' => home_url('/tire-size-guide/')],
        ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/')],
        ['title' => __('Help', 'dawp'), 'url' => home_url('/faq/')],
    ];
}

/**
 * Tire types shown in the header quick bar and on the homepage.
 */
function dawp_tire_types() {
    return [
        ['label' => 'All-Season',     'desc' => 'Year-round grip and long tread life for daily driving.', 'image' => 'assets/img/types/all-season.jpg'],
        ['label' => 'Winter',         'desc' => 'Deep siping and soft compounds for snow and ice.',      'image' => 'assets/img/types/winter.jpg'],
        ['label' => 'All-Terrain',    'desc' => 'On-road comfort with off-road traction for trucks & SUVs.', 'image' => 'assets/img/types/all-terrain.jpg'],
        ['label' => 'Performance',    'desc' => 'Sharp steering and high-speed grip for sporty cars.',    'image' => 'assets/img/types/performance.jpg'],
        ['label' => 'All-Weather',    'desc' => 'Three-Peak rated grip that stays on all year.',          'image' => ''],
        ['label' => 'Mud-Terrain',    'desc' => 'Open tread blocks for mud, rock and trail.',             'image' => ''],
        ['label' => 'Highway',        'desc' => 'Quiet, smooth and efficient for long highway miles.',    'image' => ''],
        ['label' => 'Summer',         'desc' => 'Maximum dry and wet grip in warm temperatures.',         'image' => ''],
    ];
}

function dawp_is_current_url($url) {
    $current = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '', '/');
    $target  = trim(parse_url($url, PHP_URL_PATH) ?? '', '/');

    if ($current === '' && $target === '') {
        return true;
    }

    return $current !== '' && $current === $target;
}

function dawp_footer_columns() {
    $account_page_id = function_exists('wc_get_page_id') ? wc_get_page_id('myaccount') : 0;
    $account_url     = $account_page_id > 0 ? get_permalink($account_page_id) : home_url('/my-account/');

    return [
        [
            'title' => __('Shop', 'dawp'),
            'links' => [
                ['title' => __('All Tires', 'dawp'), 'url' => dawp_shop_url()],
                ['title' => __('Shop by Brand', 'dawp'), 'url' => home_url('/shop-by-brand/')],
                ['title' => __('All-Season Tires', 'dawp'), 'url' => dawp_tire_type_url('All-Season')],
                ['title' => __('Winter Tires', 'dawp'), 'url' => dawp_tire_type_url('Winter')],
                ['title' => __('All-Terrain Tires', 'dawp'), 'url' => dawp_tire_type_url('All-Terrain')],
            ],
        ],
        [
            'title' => __('Help', 'dawp'),
            'links' => [
                ['title' => __('Tire Size Guide', 'dawp'), 'url' => home_url('/tire-size-guide/')],
                ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/')],
                ['title' => __('FAQs', 'dawp'), 'url' => home_url('/faq/')],
                ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/')],
                ['title' => __('My Account', 'dawp'), 'url' => $account_url],
            ],
        ],
        [
            'title' => __('Company & Policy', 'dawp'),
            'links' => [
                ['title' => __('About MozTire', 'dawp'), 'url' => home_url('/about-us/')],
                ['title' => __('Shipping Policy', 'dawp'), 'url' => home_url('/shipping-policy/')],
                ['title' => __('Refund & Return Policy', 'dawp'), 'url' => home_url('/refund-return-policy/')],
                ['title' => __('Payment Policy', 'dawp'), 'url' => home_url('/payment-policy/')],
                ['title' => __('Privacy Policy', 'dawp'), 'url' => home_url('/privacy-policy/')],
                ['title' => __('Terms & Conditions', 'dawp'), 'url' => home_url('/terms-conditions/')],
            ],
        ],
    ];
}
