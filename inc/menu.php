<?php
function dawp_main_menu_items() {
    return [
        ['title' => __('Shop All', 'dawp'),           'url' => home_url('/shop/')],
        ['title' => __('Dresses', 'dawp'),            'url' => home_url('/product-category/dresses/')],
        ['title' => __('Blouses & Shirts', 'dawp'),   'url' => home_url('/product-category/blouses-shirts/')],
        ['title' => __('Tops', 'dawp'),               'url' => home_url('/product-category/tops/')],
        ['title' => __('Pants', 'dawp'),              'url' => home_url('/product-category/pants/')],
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
                ['title' => __('Shop All', 'dawp'),          'url' => home_url('/shop/')],
                ['title' => __('Dresses', 'dawp'),           'url' => home_url('/product-category/dresses/')],
                ['title' => __('Blouses & Shirts', 'dawp'),  'url' => home_url('/product-category/blouses-shirts/')],
                ['title' => __('Tops', 'dawp'),              'url' => home_url('/product-category/tops/')],
                ['title' => __('Pants', 'dawp'),             'url' => home_url('/product-category/pants/')],
                ['title' => __('Shorts', 'dawp'),            'url' => home_url('/product-category/shorts/')],
                ['title' => __('Footwear', 'dawp'),          'url' => home_url('/product-category/footwear/')],
            ],
        ],
        [
            'title' => 'Help',
            'links' => [
                ['title' => 'About Us',    'url' => home_url('/about-us/')],
                ['title' => 'FAQ',         'url' => home_url('/faq/')],
                ['title' => 'Contact Us',  'url' => home_url('/contact-us/')],
                ['title' => 'Track Order', 'url' => home_url('/track-order/')],
            ],
        ],
        [
            'title' => 'Policy',
            'links' => [
                ['title' => 'Shipping & Returns', 'url' => home_url('/shipping-returns/')],
                ['title' => 'Terms & Conditions', 'url' => home_url('/terms-conditions/')],
                ['title' => 'Privacy Policy',     'url' => home_url('/privacy-policy/')],
            ],
        ],
    ];
}
