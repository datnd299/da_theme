<?php
function dawp_main_menu_items() {
    return [
        ['title' => __('Shop All',    'dawp'), 'url' => home_url('/shop/'),        'megamenu' => true],
        ['title' => __('About Us',    'dawp'), 'url' => home_url('/about-us/'),    'megamenu' => false],
        ['title' => __('Contact Us',  'dawp'), 'url' => home_url('/contact-us/'),  'megamenu' => false],
        ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/'), 'megamenu' => false],
    ];
}

function dawp_megamenu_sections() {
    return [
        [
            'title' => __('Categories', 'dawp'),
            'links' => [
                ['title' => __('Formal Shoes',        'dawp'), 'url' => home_url('/product-category/formal-shoes/')],
                ['title' => __('Leather Dress Shoes', 'dawp'), 'url' => home_url('/product-category/leather-dress-shoes/')],
                ['title' => __('Brogue Shoes',        'dawp'), 'url' => home_url('/product-category/brogue-shoes/')],
            ],
        ],
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
                ['title' => __('Shop All',            'dawp'), 'url' => home_url('/shop/')],
                ['title' => __('Formal Shoes',        'dawp'), 'url' => home_url('/product-category/formal-shoes/')],
                ['title' => __('Leather Dress Shoes', 'dawp'), 'url' => home_url('/product-category/leather-dress-shoes/')],
                ['title' => __('Brogue Shoes',        'dawp'), 'url' => home_url('/product-category/brogue-shoes/')],
            ],
        ],
        [
            'title' => 'Help',
            'links' => [
                ['title' => 'About Us',   'url' => home_url('/about-us/')],
                ['title' => 'Contact Us', 'url' => home_url('/contact-us/')],
                ['title' => 'Track Order','url' => home_url('/track-order/')],
            ],
        ],
        [
            'title' => 'Policy',
            'links' => [
                ['title' => 'FAQs',               'url' => home_url('/faq/')],
                ['title' => 'Shipping Policy',     'url' => home_url('/shipping-policy/')],
                ['title' => 'Refund & Return Policy', 'url' => home_url('/refund-return-policy/')],
                ['title' => 'Privacy Policy',      'url' => home_url('/privacy-policy/')],
                ['title' => 'Terms & Conditions',  'url' => home_url('/terms-conditions/')],
            ],
        ],
    ];
}
