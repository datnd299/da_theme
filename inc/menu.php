<?php
function dawp_main_menu_items() {
    return [
        ['title' => __('Home', 'dawp'), 'url' => home_url('/')],
        ['title' => __('Shop', 'dawp'), 'url' => home_url('/shop/')],
        ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/')],
        ['title' => __('FAQ', 'dawp'), 'url' => home_url('/faq/')],
        ['title' => __('Contact', 'dawp'), 'url' => home_url('/contact-us/')],
    ];
}
function dawp_is_current_url($url) {
    $current = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '', '/');
    $target  = trim(parse_url($url, PHP_URL_PATH) ?? '', '/');
    if ($current === '' && $target === '') return true;
    return $current !== '' && $current === $target;
}

function dawp_footer_columns() {
    return [
        [
            'title' => 'Information',
            'links' => [
                ['title' => 'About Us', 'url' => home_url('/about-us/')],
                ['title' => 'FAQ', 'url' => home_url('/faq/')],
                ['title' => 'Track Order', 'url' => home_url('/track-order/')],
            ],
        ],
        [
            'title' => 'Customer Service',
            'links' => [
                ['title' => 'Contact Us', 'url' => home_url('/contact-us/')],
                ['title' => 'Shipping & Returns', 'url' => home_url('/shipping-returns/')],
                ['title' => 'Terms & Conditions', 'url' => home_url('/terms-conditions/')],
                ['title' => 'Privacy Policy', 'url' => home_url('/privacy-policy/')],
            ],
        ],
    ];
}
