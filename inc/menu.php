<?php
function dawp_main_menu_items() {
    return [
        ['title' => __('Home', 'dawp'),        'url' => home_url('/')],
        ['title' => __('Watches', 'dawp'),     'url' => home_url('/shop/')],
        ['title' => __('Contact Us', 'dawp'),  'url' => home_url('/contact-us/')],
        ['title' => __('About Us', 'dawp'),    'url' => home_url('/about-us/')],
        ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/')],
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
                ['title' => __('All Watches', 'dawp'),          'url' => home_url('/shop/')],
                ['title' => __('Dress Watches', 'dawp'),        'url' => qb_product_category_url('dress-watches')],
                ['title' => __('Sport Watches', 'dawp'),        'url' => qb_product_category_url('sport-watches')],
                ['title' => __('Skeleton Watches', 'dawp'),     'url' => qb_product_category_url('skeleton-watches')],
                ['title' => __('Track Order', 'dawp'),          'url' => home_url('/track-order/')],
            ],
        ],
        [
            'title' => 'Company',
            'links' => [
                ['title' => 'About Us',           'url' => home_url('/about-us/')],
                ['title' => 'FAQ',                'url' => home_url('/faq/')],
                ['title' => 'Contact Us',         'url' => home_url('/contact-us/')],
            ],
        ],
        [
            'title' => 'Policies',
            'links' => [
                ['title' => 'Shipping Policy',    'url' => home_url('/shipping-policy/')],
                ['title' => 'Return & Refund Policy', 'url' => home_url('/return-refund-policy/')],
                ['title' => 'Warranty Policy',     'url' => home_url('/warranty-policy/')],
                ['title' => 'Terms & Conditions', 'url' => home_url('/terms-conditions/')],
                ['title' => 'Privacy Policy',     'url' => home_url('/privacy-policy/')],
            ],
        ],
    ];
}
