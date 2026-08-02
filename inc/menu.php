<?php
function dawp_product_category_slug($slug) {
    $map = [
        'essentials'                  => 'home-improvement',
        'home'                        => 'home-improvement',
        'furniture'                   => 'home-improvement',
        'home-improvement'            => 'home-improvement',
        'kitchen'                     => 'home-improvement',
        'electronics'                 => 'electronics',
        'smart'                       => 'electronics',
        'smart-home-tech'             => 'electronics',
        'outdoor'                     => 'sports-outdoors',
        'outdoor-adventure'           => 'sports-outdoors',
        'sports'                      => 'sports-outdoors',
        'garden'                      => 'home-garden-tools',
        'tools'                       => 'home-garden-tools',
        'garden-tools'                => 'home-garden-tools',
        'home-garden-tools'           => 'home-garden-tools',
        'patio-garden'                => 'patio-garden',
        'toys'                        => 'toys-outdoor-play',
        'beauty'                      => 'personal-care',
        'beauty-personal-care'        => 'personal-care',
        'personal-care'               => 'personal-care',
        'wellness-self-care'          => 'personal-care',
        'pets'                        => 'pets',
        'school'                      => 'office-and-school-supplies',
        'office'                      => 'office-and-school-supplies',
        'school-office-art-supplies'  => 'office-and-school-supplies',
        'office-and-school-supplies'  => 'office-and-school-supplies',
        'art'                         => 'office-and-school-supplies',
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
        'electronics'                => ['name' => __('Smart Home & Tech', 'dawp')],
        'sports-outdoors'            => ['name' => __('Outdoor & Adventure', 'dawp')],
        'home-improvement'           => ['name' => __('Home Improvement Essentials', 'dawp')],
        'home-garden-tools'          => ['name' => __('Garden Tools & Outdoor Care', 'dawp')],
        'office-and-school-supplies' => ['name' => __('Office & Productivity', 'dawp')],
        'personal-care'              => ['name' => __('Wellness & Self-Care', 'dawp')],
        'auto-tires'                 => ['name' => __('Auto & Tires', 'dawp')],
        'patio-garden'               => ['name' => __('Patio Picks', 'dawp')],
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
            'title' => __('Smart Home & Tech', 'dawp'),
            'slug'  => 'electronics',
            'copy'  => __('Connected devices, entertainment and practical everyday tech.', 'dawp'),
            'tag'   => __('Tech', 'dawp'),
        ],
        [
            'title' => __('Outdoor & Adventure', 'dawp'),
            'slug'  => 'sports-outdoors',
            'copy'  => __('Portable gear and recreation essentials for time outside.', 'dawp'),
            'tag'   => __('Explore', 'dawp'),
        ],
        [
            'title' => __('Home Improvement Essentials', 'dawp'),
            'slug'  => 'home-improvement',
            'copy'  => __('Tools, fixtures and practical upgrades for easier home projects.', 'dawp'),
            'tag'   => __('Home', 'dawp'),
        ],
        [
            'title' => __('Garden Tools & Outdoor Care', 'dawp'),
            'slug'  => 'home-garden-tools',
            'copy'  => __('Garden gear, patio helpers and outdoor care essentials.', 'dawp'),
            'tag'   => __('Garden', 'dawp'),
        ],
        [
            'title' => __('Office & Productivity', 'dawp'),
            'slug'  => 'office-and-school-supplies',
            'copy'  => __('Desk accessories, school supplies and workspace organization.', 'dawp'),
            'tag'   => __('Work', 'dawp'),
        ],
        [
            'title' => __('Wellness & Self-Care', 'dawp'),
            'slug'  => 'personal-care',
            'copy'  => __('Beauty, grooming and personal care finds for daily routines.', 'dawp'),
            'tag'   => __('Care', 'dawp'),
        ],
        [
            'title' => __('Auto & Tires', 'dawp'),
            'slug'  => 'auto-tires',
            'copy'  => __('Vehicle accessories, tire care and useful road-ready tools.', 'dawp'),
            'tag'   => __('Auto', 'dawp'),
        ],
        [
            'title' => __('Patio Picks', 'dawp'),
            'slug'  => 'patio-garden',
            'copy'  => __('Weather-ready accents and handy pieces for outdoor living.', 'dawp'),
            'tag'   => __('Patio', 'dawp'),
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
