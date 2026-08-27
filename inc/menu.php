<?php
function dawp_product_category_slug($slug) {
    $map = [
        'essentials'                 => 'building-sets',
        'home'                       => 'building-sets',
        'furniture'                  => 'building-sets',
        'electronics'                => 'designer-toys',
        'smart'                      => 'designer-toys',
        'kitchen'                    => 'building-sets',
        'outdoor'                    => 'blind-boxes',
        'garden'                     => 'art-figures',
        'tools'                      => 'art-figures',
        'sports'                     => 'blind-boxes',
        'toys'                       => 'designer-toys',
        'beauty'                     => 'art-figures',
        'pets'                       => 'designer-toys',
        'school'                     => 'blind-boxes',
        'office'                     => 'blind-boxes',
        'art'                        => 'art-figures',
        'garden-tools'               => 'art-figures',
        'sports-outdoors'            => 'blind-boxes',
        'toys-outdoor-play'          => 'building-sets',
        'beauty-personal-care'       => 'art-figures',
        'school-office-art-supplies' => 'blind-boxes',
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
        'building-sets'        => ['name' => __('Building Sets', 'dawp')],
        'art-figures'          => ['name' => __('Art Figures', 'dawp')],
        'designer-toys'        => ['name' => __('Designer Toys', 'dawp')],
        'blind-boxes'          => ['name' => __('Blind Boxes', 'dawp')],
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
            'links' => [
                ['title' => __('Desk Collectibles', 'dawp'), 'url' => home_url('/shop/')],
                ['title' => __('Shelf Icons', 'dawp'), 'url' => home_url('/shop/')],
                ['title' => __('Big Builds', 'dawp'), 'url' => home_url('/shop/')],
                ['title' => __('Gift Ideas', 'dawp'), 'url' => home_url('/shop/')],
            ],
        ],
    [
        'title' => __('Discover', 'dawp'),
        'links' => [
            ['title' => __('About', 'dawp'), 'url' => home_url('/about-us/')],
            ['title' => __('Contact', 'dawp'), 'url' => home_url('/contact-us/')],
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
        [
            'title' => __('Policy', 'dawp'),
            'links' => [
                ['title' => __('FAQ', 'dawp'), 'url' => home_url('/faq/')],
                ['title' => __('Shipping Policy', 'dawp'), 'url' => home_url('/shipping-policy/')],
                ['title' => __('Return & Refund Policy', 'dawp'), 'url' => home_url('/return-refund-policy/')],
                ['title' => __('Privacy Policy', 'dawp'), 'url' => home_url('/privacy-policy/')],
                ['title' => __('Terms & Condition', 'dawp'), 'url' => home_url('/terms-conditions/')],
            ],
        ],
    ];
}
