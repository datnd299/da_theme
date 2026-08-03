<?php
function dawp_product_category_slug($slug) {
    $map = [
        'essentials'                  => 'home-improvement-essentials',
        'home'                        => 'home-furniture-appliances',
        'furniture'                   => 'home-furniture-appliances',
        'home-improvement'            => 'home-improvement-essentials',
        'home-improvement-essentials' => 'home-improvement-essentials',
        'home-furniture-appliances'   => 'home-furniture-appliances',
        'kitchen'                     => 'home-furniture-appliances',
        'electronics'                 => 'electronics',
        'smart'                       => 'electronics',
        'smart-home-tech'             => 'electronics',
        'outdoor'                     => 'sports-outdoors',
        'outdoor-adventure'           => 'sports-outdoors',
        'sports'                      => 'sports-outdoors',
        'garden'                      => 'patio-garden',
        'tools'                       => 'home-improvement-essentials',
        'garden-tools'                => 'patio-garden',
        'home-garden-tools'           => 'patio-garden',
        'patio-garden'                => 'patio-garden',
        'seasonal-decor'              => 'seasonal-decor',
        'toys'                        => 'toys',
        'toys-outdoor-play'           => 'toys-outdoor-play',
        'beauty'                      => 'seasonal-decor',
        'beauty-personal-care'        => 'seasonal-decor',
        'personal-care'               => 'seasonal-decor',
        'wellness-self-care'          => 'seasonal-decor',
        'pets'                        => 'home-furniture-appliances',
        'school'                      => 'home-improvement-essentials',
        'office'                      => 'home-improvement-essentials',
        'school-office-art-supplies'  => 'home-improvement-essentials',
        'office-and-school-supplies'  => 'home-improvement-essentials',
        'art'                         => 'seasonal-decor',
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

function dawp_shop_category_items() {
    $categories = function_exists('dawp_lbq_product_categories') ? dawp_lbq_product_categories() : [
        'auto-tires'                 => ['name' => __('Auto & Tires', 'dawp')],
        'electronics'                => ['name' => __('Electronics', 'dawp')],
        'home-improvement-essentials' => ['name' => __('Home Improvement Essentials', 'dawp')],
        'home-furniture-appliances'  => ['name' => __('Home, Furniture & Appliances', 'dawp')],
        'patio-garden'               => ['name' => __('Patio & Garden', 'dawp')],
        'seasonal-decor'             => ['name' => __('Seasonal Decor', 'dawp')],
        'sports-outdoors'            => ['name' => __('Sports & Outdoors', 'dawp')],
        'toys-outdoor-play'          => ['name' => __('Toys & Outdoor Play', 'dawp')],
        'toys'                       => ['name' => __('Toys', 'dawp')],
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

function dawp_homepage_mega_menu_items() {
    return [
        [
            'title' => __('Auto & Tires', 'dawp'),
            'slug'  => 'auto-tires',
            'copy'  => __('Vehicle accessories, tire care and useful road-ready tools.', 'dawp'),
            'tag'   => __('Auto', 'dawp'),
        ],
        [
            'title' => __('Electronics', 'dawp'),
            'slug'  => 'electronics',
            'copy'  => __('Connected devices, entertainment and practical everyday tech.', 'dawp'),
            'tag'   => __('Tech', 'dawp'),
        ],
        [
            'title' => __('Home Improvement Essentials', 'dawp'),
            'slug'  => 'home-improvement-essentials',
            'copy'  => __('Tools, fixtures and practical upgrades for easier home projects.', 'dawp'),
            'tag'   => __('Tools', 'dawp'),
        ],
        [
            'title' => __('Home, Furniture & Appliances', 'dawp'),
            'slug'  => 'home-furniture-appliances',
            'copy'  => __('Furniture, appliances and useful pieces for comfortable home living.', 'dawp'),
            'tag'   => __('Home', 'dawp'),
        ],
        [
            'title' => __('Patio & Garden', 'dawp'),
            'slug'  => 'patio-garden',
            'copy'  => __('Garden gear, patio accents and outdoor care essentials.', 'dawp'),
            'tag'   => __('Garden', 'dawp'),
        ],
        [
            'title' => __('Seasonal Decor', 'dawp'),
            'slug'  => 'seasonal-decor',
            'copy'  => __('Decor and accents for seasonal home updates.', 'dawp'),
            'tag'   => __('Decor', 'dawp'),
        ],
        [
            'title' => __('Sports & Outdoors', 'dawp'),
            'slug'  => 'sports-outdoors',
            'copy'  => __('Sports gear and outdoor essentials for active days.', 'dawp'),
            'tag'   => __('Sports', 'dawp'),
        ],
        [
            'title' => __('Toys & Outdoor Play', 'dawp'),
            'slug'  => 'toys-outdoor-play',
            'copy'  => __('Toys and outdoor activity picks for playful days.', 'dawp'),
            'tag'   => __('Play', 'dawp'),
        ],
        [
            'title' => __('Toys', 'dawp'),
            'slug'  => 'toys',
            'copy'  => __('Giftable toys and play essentials for everyday fun.', 'dawp'),
            'tag'   => __('Toys', 'dawp'),
        ],
    ];
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
