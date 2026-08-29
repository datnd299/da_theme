<?php
function dawp_main_menu_items() {
    return [
        ['title' => __('Home', 'dawp'), 'url' => home_url('/'), 'megamenu' => false],
        ['title' => __('Shop', 'dawp'), 'url' => home_url('/shop/'), 'megamenu' => false],
        ['title' => __('About', 'dawp'), 'url' => home_url('/about-us/'), 'megamenu' => false],
        ['title' => __('Contact', 'dawp'), 'url' => home_url('/contact-us/'), 'megamenu' => false],
    ];
}

function dawp_megamenu_sections() {
    return [
        [
            'title' => __('Shop by Style', 'dawp'),
            'links' => [
                ['title' => __('Dive Watches', 'dawp'), 'url' => dawp_product_category_url('dive-watches'), 'description' => __('Rotating bezels and real water resistance.', 'dawp')],
                ['title' => __('Field Watches', 'dawp'), 'url' => dawp_product_category_url('field-watches'), 'description' => __('Legible, rugged, everyday utility.', 'dawp')],
                ['title' => __('Dress Watches', 'dawp'), 'url' => dawp_product_category_url('dress-watches'), 'description' => __('Slim cases and clean dials.', 'dawp')],
                ['title' => __('Chronograph Watches', 'dawp'), 'url' => dawp_product_category_url('chronograph-watches'), 'description' => __('Stopwatch complications and sub-dials.', 'dawp')],
            ],
        ],
    ];
}

function dawp_product_category_slugs() {
    return [
        'dive-watches',
        'field-watches',
        'dress-watches',
        'chronograph-watches',
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
                ['title' => __('Shop All', 'dawp'), 'url' => home_url('/shop/')],
                ['title' => __('Dive Watches', 'dawp'), 'url' => dawp_product_category_url('dive-watches')],
                ['title' => __('Field Watches', 'dawp'), 'url' => dawp_product_category_url('field-watches')],
                ['title' => __('Dress Watches', 'dawp'), 'url' => dawp_product_category_url('dress-watches')],
                ['title' => __('Chronograph Watches', 'dawp'), 'url' => dawp_product_category_url('chronograph-watches')],
            ],
        ],
        [
            'title' => __('Help', 'dawp'),
            'links' => [
                ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/')],
                ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/')],
                ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/')],
                ['title' => __('My Account', 'dawp'), 'url' => $account_url],
                ['title' => __('FAQs', 'dawp'), 'url' => home_url('/faq/')],
            ],
        ],
        [
            'title' => __('Policy', 'dawp'),
            'links' => [
                ['title' => __('Shipping Policy', 'dawp'), 'url' => home_url('/shipping-policy/')],
                ['title' => __('Refund & Return Policy', 'dawp'), 'url' => home_url('/refund-return-policy/')],
                ['title' => __('Privacy Policy', 'dawp'), 'url' => home_url('/privacy-policy/')],
                ['title' => __('Terms & Conditions', 'dawp'), 'url' => home_url('/terms-conditions/')],
                ['title' => __('Billing Terms & Conditions', 'dawp'), 'url' => home_url('/billing-terms-conditions/')],
            ],
        ],
    ];
}
