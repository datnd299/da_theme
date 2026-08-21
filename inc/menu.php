<?php
/**
 * Navigation — primary menu, collections mega menu, footer columns.
 * See .plans/site.md §5.
 */

defined('ABSPATH') || exit;

function dawp_main_menu_items() {
    return [
        ['title' => __('Home', 'dawp'), 'url' => home_url('/'), 'megamenu' => false],
        ['title' => __('Shop', 'dawp'), 'url' => home_url('/shop/'), 'megamenu' => true],
        ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/'), 'megamenu' => false],
        ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/'), 'megamenu' => false],
    ];
}

function dawp_megamenu_sections() {
    $links = [];

    foreach (dawp_collections() as $collection) {
        $links[] = [
            'title'       => $collection['name'],
            'url'         => dawp_product_category_url($collection['slug']),
            'description' => $collection['tagline'],
            'image'       => $collection['image'],
        ];
    }

    return [
        [
            'title' => __('The Collections', 'dawp'),
            'links' => $links,
        ],
        [
            'title' => __('Discover', 'dawp'),
            'links' => [
                ['title' => __('All Watches', 'dawp'), 'url' => home_url('/shop/'), 'description' => __('The complete catalogue.', 'dawp')],
                ['title' => __('Limited Editions', 'dawp'), 'url' => dawp_product_category_url('limited-editions'), 'description' => __('Numbered series, produced once.', 'dawp')],
                ['title' => __('The Atelier', 'dawp'), 'url' => home_url('/about-us/'), 'description' => __('How a CHRONEL watch is made.', 'dawp')],
                ['title' => __('The Movement', 'dawp'), 'url' => home_url('/about-us/#movement'), 'description' => __('Carefully selected automatic, calibre CH-01.', 'dawp')],
            ],
        ],
    ];
}

function dawp_product_category_slugs() {
    return array_keys(dawp_product_category_definitions());
}

function dawp_is_current_url($url) {
    $current = trim(parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?? '', '/');
    $target  = trim(parse_url($url, PHP_URL_PATH) ?? '', '/');

    if ($current === '' && $target === '') {
        return true;
    }

    return $current !== '' && $current === $target;
}

function dawp_footer_columns() {
    $account_page_id = function_exists('wc_get_page_id') ? wc_get_page_id('myaccount') : 0;
    $account_url     = $account_page_id > 0 ? get_permalink($account_page_id) : home_url('/my-account/');

    $collection_links = [];
    foreach (dawp_collections() as $collection) {
        $collection_links[] = ['title' => $collection['name'], 'url' => dawp_product_category_url($collection['slug'])];
    }
    $collection_links[] = ['title' => __('All Watches', 'dawp'), 'url' => home_url('/shop/')];

    return [
        [
            'title' => __('Collections', 'dawp'),
            'links' => $collection_links,
        ],
        [
            'title' => __('Maison', 'dawp'),
            'links' => [
                ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/')],
                ['title' => __('Limited Editions', 'dawp'), 'url' => dawp_product_category_url('limited-editions')],
                ['title' => __('Contact', 'dawp'), 'url' => home_url('/contact-us/')],
            ],
        ],
        [
            'title' => __('Client Care', 'dawp'),
            'links' => [
                ['title' => __('Service & Warranty', 'dawp'), 'url' => home_url('/service-warranty/')],
                ['title' => __('Track Your Order', 'dawp'), 'url' => home_url('/track-order/')],
                ['title' => __('My Account', 'dawp'), 'url' => $account_url],
                ['title' => __('FAQ', 'dawp'), 'url' => home_url('/faq/')],
            ],
        ],
        [
            'title' => __('Legal', 'dawp'),
            'links' => [
                ['title' => __('Privacy Policy', 'dawp'), 'url' => home_url('/privacy-policy/')],
                ['title' => __('Terms of Service', 'dawp'), 'url' => home_url('/terms-conditions/')],
                ['title' => __('Return & Refund Policy', 'dawp'), 'url' => home_url('/returns/')],
                ['title' => __('Shipping Policy', 'dawp'), 'url' => home_url('/shipping-policy/')],
                ['title' => __('Billing Terms & Conditions', 'dawp'), 'url' => home_url('/billing-terms/')],
            ],
        ],
    ];
}
