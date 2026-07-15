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
            'title' => __('Shop by Collections', 'dawp'),
            'links' => [
                ['title' => __('American Flag Tees', 'dawp'), 'url' => dawp_product_category_url('american-flag-tees'), 'description' => __('American pride flag designs.', 'dawp')],
                ['title' => __('Bomber Jackets', 'dawp'), 'url' => dawp_product_category_url('bomber-jackets'), 'description' => __('Outerwear with patriotic character.', 'dawp')],
                ['title' => __('Hats & Beanies', 'dawp'), 'url' => dawp_product_category_url('hats-beanies'), 'description' => __('Patriotic caps and beanies for everyday wear.', 'dawp')],
                ['title' => __('Premium T-Shirts', 'dawp'), 'url' => dawp_product_category_url('premium-t-shirts'), 'description' => __('Classic patriotic tees.', 'dawp')],
                ['title' => __('Patches & Pins', 'dawp'), 'url' => dawp_product_category_url('patches-pins'), 'description' => __('Accessories with American pride.', 'dawp')],
                ['title' => __('America 250 Collection', 'dawp'), 'url' => dawp_product_category_url('america-250'), 'description' => __('Anniversary apparel and gifts.', 'dawp')],
            ],
        ],
    ];
}

function dawp_product_category_slugs() {
    return [
        'best-sellers',
        'american-flag-tees',
        'bomber-jackets',
        'hats-beanies',
        'premium-t-shirts',
        'patches-pins',
        'america-250',
        'fathers-day-gifts',
        'memorial-day-gifts',
        'independence-day-gifts',
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
                ['title' => __('Shop By Categories', 'dawp'), 'url' => home_url('/shop-by-categories/')],
                ['title' => __('Best Sellers', 'dawp'), 'url' => dawp_product_category_url('best-sellers')],
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
            ],
        ],
    ];
}
