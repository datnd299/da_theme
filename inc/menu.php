<?php
function dawp_product_category_slug($slug) {
    $map = [
        'essentials' => 'home',
        'home'       => 'home',
        'furniture'  => 'home',
        'electronics'=> 'electronics',
        'smart'      => 'electronics',
        'kitchen'    => 'home',
        'outdoor'    => 'sports-outdoors',
        'garden'     => 'garden-tools',
        'tools'      => 'garden-tools',
        'sports'     => 'sports-outdoors',
        'toys'       => 'toys-outdoor-play',
        'beauty'     => 'beauty-personal-care',
        'pets'       => 'pets',
        'school'     => 'school-office-art-supplies',
        'office'     => 'school-office-art-supplies',
        'art'        => 'school-office-art-supplies',
    ];

    return $map[$slug] ?? $slug;
}

function dawp_product_category_url($slug) {
    $slug = dawp_product_category_slug($slug);

    if (function_exists('get_term_by')) {
        $term = get_term_by('slug', $slug, 'product_cat');
        if ($term && !is_wp_error($term)) {
            $link = get_term_link($term);
            if (!is_wp_error($link)) {
                return $link;
            }
        }
    }

    return home_url('/product-category/' . trim($slug, '/') . '/');
}

function dawp_new_arrivals_url() {
    $slug = function_exists('dawp_new_arrivals_category_slug') ? dawp_new_arrivals_category_slug() : 'new-arrivals';

    return dawp_product_category_url($slug);
}

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

function dawp_watch_mega_menu_groups() {
    return [
        [
            'title' => __('Rolex Watches', 'dawp'),
            'url'   => dawp_watch_category_url('Rolex Watches'),
            'items' => [
                'Rolex Datejust',
                'Rolex Daytona',
                'Rolex Day-Date',
                'Rolex GMT-Master',
                'Rolex Sky-Dweller',
                'Rolex Submariner',
                'Rolex Oyster Perpetual',
                'Rolex Milgauss',
                'Rolex Air-King',
                'Rolex Explorer',
                'Rolex Cellini',
                'Rolex Sea-Dweller',
                'Rolex Land-Dweller',
            ],
        ],
        [
            'title' => __('Patek Philippe', 'dawp'),
            'url'   => dawp_watch_category_url('Patek Philippe'),
            'items' => [
                'Patek Philippe Nautilus',
                'Patek Philippe Aquanaut',
                'Patek Philippe Calatrava',
                'Patek Philippe Complications',
            ],
        ],
        [
            'title' => __('Audemars Piguet', 'dawp'),
            'url'   => dawp_watch_category_url('Audemars Piguet'),
            'items' => [
                'Audemars Piguet Royal Oak',
                'AP Royal Oak Offshore',
                'AP Royal Oak Tourbillon',
            ],
        ],
        [
            'title' => __('Omega Watches', 'dawp'),
            'url'   => dawp_watch_category_url('Omega Watches'),
            'items' => [
                'Omega Seamaster',
                'Omega De Ville',
                'Omega Constellation',
                'Omega Speedmaster',
            ],
        ],
        [
            'title' => __('Richard Mille', 'dawp'),
            'url'   => dawp_watch_category_url('Richard Mille'),
            'items' => [
                'Richard Mille RM 011',
                'Richard Mille RM 027',
                'Richard Mille RM 035',
                'Richard Mille RM 052',
                'Richard Mille RM 055',
                'Richard Mille RM 056',
            ],
        ],
        [
            'title' => __('Breitling', 'dawp'),
            'url'   => dawp_watch_category_url('Breitling'),
            'items' => [
                'Breitling Avenger',
                'Breitling Navitimer',
                'Breitling Endurance Pro',
            ],
        ],
        [
            'title' => __('Hublot', 'dawp'),
            'url'   => dawp_watch_category_url('Hublot'),
            'items' => [
                'Hublot Big Bang',
                'Hublot Fusion',
            ],
        ],
        [
            'title' => __('Tag Heuer', 'dawp'),
            'url'   => dawp_watch_category_url('Tag Heuer'),
            'items' => [],
        ],
        [
            'title' => __('Iced Out Watches', 'dawp'),
            'url'   => dawp_watch_category_url('Iced Out Watches'),
            'items' => [],
        ],
    ];
}

function dawp_watch_category_url($label) {
    $slug = function_exists('sanitize_title') ? sanitize_title($label) : strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '-', $label), '-'));

    return dawp_product_category_url($slug);
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
