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
    $collection_links = [];
    $gift_links       = [];

    if (function_exists('dawp_product_category_group')) {
        foreach (dawp_product_category_group('collections') as $slug => $category) {
            $collection_links[] = [
                'title'       => $category['name'],
                'url'         => dawp_product_category_url($slug),
                'description' => $category['description'],
            ];
        }

        foreach (dawp_product_category_group('gifts') as $slug => $category) {
            $gift_links[] = [
                'title'       => $category['name'],
                'url'         => dawp_product_category_url($slug),
                'description' => $category['description'],
            ];
        }
    }

    return [
        [
            'title' => __('Shop by Collections', 'dawp'),
            'links' => $collection_links,
        ],
        [
            'title' => __('Shop by Occasion', 'dawp'),
            'links' => $gift_links,
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
        'veteran-tribute',
        'mugs-drinkware',
        'america-250',
        'fathers-day-gifts',
        'veterans-day-gifts',
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
