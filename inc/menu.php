<?php

function dawp_shop_category_items() {
    $categories = function_exists('dawp_lbq_product_categories') ? dawp_lbq_product_categories() : [
        'home'                       => ['name' => __('Home', 'dawp')],
        'garden-tools'               => ['name' => __('Garden & Tools', 'dawp')],
        'electronics'                => ['name' => __('Electronics', 'dawp')],
        'sports-outdoors'            => ['name' => __('Sports & Outdoors', 'dawp')],
        'toys-outdoor-play'          => ['name' => __('Toys & Outdoor Play', 'dawp')],
        'beauty-personal-care'       => ['name' => __('Beauty & Personal Care', 'dawp')],
        'pets'                       => ['name' => __('Pets', 'dawp')],
        'school-office-art-supplies' => ['name' => __('School, Office & Art Supplies', 'dawp')],
    ];

    $items = [];

    foreach ($categories as $slug => $category) {
        $items[] = [
            'title' => $category['name'],
            'url'   => dawp_product_category_url($slug),
        ];
    }

    return $items;
}

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
            'links' => array_merge([
                ['title' => __('Shop All', 'dawp'), 'url' => home_url('/shop/')],
            ], dawp_shop_category_items()),
        ],
        [
            'title' => __('Store Policy', 'dawp'),
            'links' => [
                ['title' => __('FAQs', 'dawp'), 'url' => home_url('/faq/')],
                ['title' => __('Shipping Policy', 'dawp'), 'url' => home_url('/shipping-policy/')],
                ['title' => __('Return & Refund Policy', 'dawp'), 'url' => home_url('/return-refund-policy/')],
                ['title' => __('Privacy Policy', 'dawp'), 'url' => home_url('/privacy-policy/')],
                ['title' => __('Terms & Conditions', 'dawp'), 'url' => home_url('/terms-conditions/')],
            ],
        ],
        [
            'title' => __('Help', 'dawp'),
            'links' => [
                ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/')],
                ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/')],
                ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/')],
                ['title' => __('My Account', 'dawp'), 'url' => function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/')],
            ],
        ],
    ];
}
