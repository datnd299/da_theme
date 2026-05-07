<?php
function dawp_main_menu_items() {
    return [
        ['title' => __('Shop All', 'dawp'),            'url' => home_url('/shop/')],
        ['title' => __('Girls Dresses', 'dawp'),  'url' => home_url('/product-category/girls-dresses/')],
        ['title' => __('Mommy & Me', 'dawp'),  'url' => home_url('/product-category/mommy-me-matching-sets/')],
        ['title' => __('Women Casual', 'dawp'),        'url' => home_url('/product-category/women-casual/')],
        ['title' => __('Baby Girl', 'dawp'),       'url' => home_url('/product-category/baby-girl-boutique/')],
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
                ['title' => __('Shop All', 'dawp'),            'url' => home_url('/shop/')],
        ['title' => __('Girls Dresses', 'dawp'),  'url' => home_url('/product-category/girls-dresses/')],
        ['title' => __('Mommy & Me', 'dawp'),  'url' => home_url('/product-category/mommy-me-matching-sets/')],
        ['title' => __('Women Casual', 'dawp'),        'url' => home_url('/product-category/women-casual/')],
        ['title' => __('Baby Girl', 'dawp'),       'url' => home_url('/product-category/baby-girl-boutique/')],
        ['title' => __('Boutique Accessories', 'dawp'),       'url' => home_url('/product-category/boutique-accessories/')],
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
