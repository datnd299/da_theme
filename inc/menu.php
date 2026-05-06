<?php
function dawp_main_menu_items() {
    return [
        ['title' => __('Shop All', 'dawp'),            'url' => home_url('/shop/')],
        ['title' => __('Home & Living', 'dawp'),  'url' => home_url('/product-category/home-living/')],
        ['title' => __('Lawn & Garden', 'dawp'),  'url' => home_url('/product-category/lawn-garden/')],
        ['title' => __('Pet Care', 'dawp'),        'url' => home_url('/product-category/pet-care/')],
        ['title' => __('Car Parts', 'dawp'),       'url' => home_url('/product-category/car-parts/')],
        ['title' => __('Automotive', 'dawp'),      'url' => home_url('/product-category/automotive/')],
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
            'title' => 'Shop',
            'links' => [
                ['title' => 'Home & Living',  'url' => home_url('/product-category/home-living/')],
                ['title' => 'Lawn & Garden',  'url' => home_url('/product-category/lawn-garden/')],
                ['title' => 'Pet Care',       'url' => home_url('/product-category/pet-care/')],
                ['title' => 'Car Parts',      'url' => home_url('/product-category/car-parts/')],
                ['title' => 'Automotive',     'url' => home_url('/product-category/automotive/')],
                ['title' => 'Sale',           'url' => home_url('/sale/')],
            ],
        ],
        [
            'title' => 'Help',
            'links' => [
                ['title' => 'About Us',           'url' => home_url('/about-us/')],
                ['title' => 'FAQ',                'url' => home_url('/faq/')],
                ['title' => 'Contact Us',         'url' => home_url('/contact-us/')],
                ['title' => 'Track Order',        'url' => home_url('/track-order/')],
                ['title' => 'Shipping & Returns', 'url' => home_url('/shipping-returns/')],
                ['title' => 'Terms & Conditions', 'url' => home_url('/terms-conditions/')],
                ['title' => 'Privacy Policy',     'url' => home_url('/privacy-policy/')],
            ],
        ],
    ];
}
