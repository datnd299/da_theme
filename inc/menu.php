<?php
function dawp_product_category_links($limit = 5) {
    $fallback = [];

    if (function_exists('dawp_tire_category_definitions')) {
        foreach (dawp_tire_category_definitions() as $slug => $category) {
            $fallback[] = [
                'title' => $category['name'],
                'url'   => function_exists('dawp_product_category_url')
                    ? dawp_product_category_url($slug)
                    : home_url('/product-category/' . sanitize_title($slug) . '/'),
            ];
        }
    }

    if (!function_exists('get_terms') || !taxonomy_exists('product_cat')) {
        return array_slice($fallback, 0, $limit);
    }

    $uncategorized = get_term_by('slug', 'uncategorized', 'product_cat');
    $exclude = $uncategorized ? [(int) $uncategorized->term_id] : [];
    $terms = get_terms([
        'taxonomy'   => 'product_cat',
        'hide_empty' => true,
        'parent'     => 0,
        'exclude'    => $exclude,
        'orderby'    => 'name',
        'order'      => 'ASC',
        'number'     => $limit,
    ]);

    if (is_wp_error($terms) || empty($terms)) {
        return array_slice($fallback, 0, $limit);
    }

    return array_map(function ($term) {
        return [
            'title' => $term->name,
            'url'   => get_term_link($term),
        ];
    }, $terms);
}

function dawp_main_menu_items() {
    return array_merge([
        ['title' => __('Shop All', 'dawp'),            'url' => home_url('/shop/')],
    ], dawp_product_category_links(5));
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
            'title' => 'Shop',
            'links' => array_merge([
                ['title' => __('Shop All', 'dawp'),            'url' => home_url('/shop/')],
                ['title' => __('Shop By Rim Size', 'dawp'),    'url' => home_url('/shop-by-rim-size/')],
                ['title' => __('Shop By Vehicle Type', 'dawp'), 'url' => home_url('/shop-by-vehicle-type/')],
                ['title' => __('Shop By Brand', 'dawp'),       'url' => home_url('/shop-by-brand/')],
            ], dawp_product_category_links(5)),
        ],
        [
            'title' => 'Help',
            'links' => [
                ['title' => 'About Us',           'url' => home_url('/about-us/')],
                ['title' => 'FAQ',                'url' => home_url('/faq/')],
                ['title' => 'Contact Us',         'url' => home_url('/contact-us/')],
                ['title' => 'Track Order',        'url' => home_url('/track-order/')],
                ['title' => 'Shipping & Returns', 'url' => home_url('/shipping-returns/')],
                ['title' => 'Terms & Conditions', 'url' => home_url('/terms-conditions/')],
                ['title' => 'Privacy Policy',     'url' => home_url('/privacy-policy/')],
            ],
        ],
    ];
}
