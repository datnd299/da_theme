<?php
function dawp_main_menu_items() {
    return [
        ['title' => __('Shop All', 'dawp'),            'url' => home_url('/shop/')],
        ['title' => __('New Arrivals', 'dawp'),         'url' => home_url('/shop/?orderby=date')],
        ['title' => __('Featured Watches', 'dawp'),     'url' => home_url('/shop/?featured=1')],
        ['title' => __('Sale Watches', 'dawp'),         'url' => home_url('/shop/?product_visibility=onsale')],
        ['title' => __('Track Order', 'dawp'),          'url' => home_url('/track-order/')],
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
                ['title' => __('New Arrivals', 'dawp'),         'url' => home_url('/shop/?orderby=date')],
                ['title' => __('Featured Watches', 'dawp'),     'url' => home_url('/shop/?featured=1')],
                ['title' => __('Sale Watches', 'dawp'),         'url' => home_url('/shop/?product_visibility=onsale')],
                ['title' => __('Track Order', 'dawp'),          'url' => home_url('/track-order/')],
            ],
        ],
        [
            'title' => 'Help',
            'links' => [
                ['title' => 'About Us',           'url' => home_url('/about-us/')],
                ['title' => 'FAQ',                'url' => home_url('/faq/')],
                ['title' => 'Contact Us',         'url' => home_url('/contact-us/')],
                ['title' => 'Track Order',        'url' => home_url('/track-order/')],
                ['title' => 'Shipping Policy',    'url' => home_url('/shipping-policy/')],
                ['title' => 'Return & Refund Policy', 'url' => home_url('/return-refund-policy/')],
                ['title' => 'Terms & Conditions', 'url' => home_url('/terms-conditions/')],
                ['title' => 'Privacy Policy',     'url' => home_url('/privacy-policy/')],
            ],
        ],
    ];
}
