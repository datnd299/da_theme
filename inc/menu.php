<?php
function dawp_product_category_slug($slug) {
    $map = [
        'essentials'                 => 'city-buildings-houses',
        'home'                       => 'city-buildings-houses',
        'furniture'                  => 'city-buildings-houses',
        'buildings'                  => 'city-buildings-houses',
        'houses'                     => 'city-buildings-houses',
        'electronics'                => 'city-vehicle-sets',
        'smart'                      => 'city-vehicle-sets',
        'kitchen'                    => 'city-buildings-houses',
        'vehicles'                   => 'city-vehicle-sets',
        'cars'                       => 'city-vehicle-sets',
        'outdoor'                    => 'animals-trees-botanicals',
        'garden'                     => 'animals-trees-botanicals',
        'animals'                    => 'animals-trees-botanicals',
        'trees'                      => 'animals-trees-botanicals',
        'botanicals'                 => 'animals-trees-botanicals',
        'tools'                      => 'city-vehicle-sets',
        'sports'                     => 'world-war-ii-sets',
        'military'                   => 'world-war-ii-sets',
        'wwii'                       => 'world-war-ii-sets',
        'toys'                       => 'city-vehicle-sets',
        'beauty'                     => 'animals-trees-botanicals',
        'pets'                       => 'animals-trees-botanicals',
        'school'                     => 'world-war-ii-sets',
        'office'                     => 'world-war-ii-sets',
        'art'                        => 'animals-trees-botanicals',
        'garden-tools'               => 'animals-trees-botanicals',
        'sports-outdoors'            => 'world-war-ii-sets',
        'toys-outdoor-play'          => 'city-buildings-houses',
        'beauty-personal-care'       => 'animals-trees-botanicals',
        'school-office-art-supplies' => 'world-war-ii-sets',
        'building-sets'              => 'city-buildings-houses',
        'art-figures'                => 'animals-trees-botanicals',
        'designer-toys'              => 'city-vehicle-sets',
        'blind-boxes'                => 'world-war-ii-sets',
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
        'city-buildings-houses'    => ['name' => __('City Buildings & Houses', 'dawp')],
        'animals-trees-botanicals' => ['name' => __('Animals, Trees & Botanicals', 'dawp')],
        'city-vehicle-sets'        => ['name' => __('City Vehicle Sets', 'dawp')],
        'world-war-ii-sets'        => ['name' => __('World War II Sets', 'dawp')],
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
            'links' => dawp_shop_category_items(),
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
