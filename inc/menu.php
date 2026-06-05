<?php
function dawp_main_menu_items() {
    return [
        ['title' => __('Home', 'dawp'), 'url' => home_url('/')],
        ['title' => __('Shop', 'dawp'), 'url' => home_url('/shop/')],
        ['title' => __('About', 'dawp'), 'url' => home_url('/about-us/')],
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
            'title' => __('Shop', 'dawp'),
            'links' => [
                ['title' => __('All Products', 'dawp'), 'url' => home_url('/shop/')],
                ['title' => __('Interior Accessories', 'dawp'), 'url' => home_url('/product-category/interior-accessories/')],
                ['title' => __('Exterior Add-Ons', 'dawp'), 'url' => home_url('/product-category/exterior-accessories/')],
                ['title' => __('Driver Lifestyle Merch', 'dawp'), 'url' => home_url('/product-category/driver-merch/')],
            ],
        ],
        [
            'title' => __('Vehicles', 'dawp'),
            'links' => [
                ['title' => __('Tacoma Accessories', 'dawp'), 'url' => home_url('/product-category/tacoma-accessories/')],
                ['title' => __('4Runner Accessories', 'dawp'), 'url' => home_url('/product-category/4runner-accessories/')],
                ['title' => __('FJ Cruiser Accessories', 'dawp'), 'url' => home_url('/product-category/fj-cruiser-accessories/')],
                ['title' => __('Tundra Accessories', 'dawp'), 'url' => home_url('/product-category/tundra-accessories/')],
            ],
        ],
        [
            'title' => __('Support', 'dawp'),
            'links' => [
                ['title' => __('About', 'dawp'), 'url' => home_url('/about-us/')],
                ['title' => __('Contact', 'dawp'), 'url' => home_url('/contact-us/')],
                ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/')],
                ['title' => __('FAQs', 'dawp'), 'url' => home_url('/faq/')],
            ],
        ],
        [
            'title' => __('Policies', 'dawp'),
            'links' => [
                ['title' => __('Shipping Policy', 'dawp'), 'url' => home_url('/shipping-policy/')],
                ['title' => __('Refund & Return Policy', 'dawp'), 'url' => home_url('/refund-return-policy/')],
                ['title' => __('Privacy Policy', 'dawp'), 'url' => home_url('/privacy-policy/')],
                ['title' => __('Terms & Conditions', 'dawp'), 'url' => home_url('/terms-conditions/')],
            ],
        ],
    ];
}
