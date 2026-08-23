<?php
function dawp_product_category_slug($slug) {
    return $slug;
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
        'rolex-watches'    => ['name' => __('Rolex Watches', 'dawp')],
        'patek-philippe'   => ['name' => __('Patek Philippe', 'dawp')],
        'audemars-piguet'  => ['name' => __('Audemars Piguet', 'dawp')],
        'omega-watches'    => ['name' => __('Omega Watches', 'dawp')],
        'richard-mille'    => ['name' => __('Richard Mille', 'dawp')],
        'breitling'        => ['name' => __('Breitling', 'dawp')],
        'hublot'           => ['name' => __('Hublot', 'dawp')],
        'tag-heuer'        => ['name' => __('Tag Heuer', 'dawp')],
        'iced-out-watches' => ['name' => __('Iced Out Watches', 'dawp')],
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

/**
 * Brand columns for the header mega menu and the homepage brand showcase.
 * Each item includes its sub-collections (child categories), if any.
 */
function dawp_megamenu_brands() {
    $categories = function_exists('dawp_lbq_product_categories') ? dawp_lbq_product_categories() : [];
    $items = [];

    foreach ($categories as $slug => $category) {
        $children = [];

        foreach ($category['children'] ?? [] as $child_slug => $child_data) {
            $child_name = is_array($child_data) ? $child_data['name'] : $child_data;

            $children[] = [
                'title' => $child_name,
                'url'   => dawp_product_category_url($child_slug),
            ];
        }

        $items[] = [
            'title'    => $category['name'],
            'url'      => dawp_product_category_url($slug),
            'image'    => !empty($category['image']) ? get_theme_file_uri('assets/img/categories/' . $category['image']) : '',
            'children' => $children,
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
