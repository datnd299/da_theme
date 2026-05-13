<?php
function dawp_product_category_slug($slug) {
    $map = [
        'casual-tops'       => 'relaxed-tops',
        'tunic-tops'        => 'soft-tunics',
        'blouses-shirts'    => 'gentle-blouses',
        'new-arrivals'      => 'relaxed-tops',
        'soft-graphic-tops' => 'relaxed-tops',
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
    return [
        ['title' => __('Relaxed Tops', 'dawp'), 'url' => dawp_product_category_url('relaxed-tops')],
        ['title' => __('Soft Tunics', 'dawp'), 'url' => dawp_product_category_url('soft-tunics')],
        ['title' => __('Gentle Blouses', 'dawp'), 'url' => dawp_product_category_url('gentle-blouses')],
    ];
}

function dawp_main_menu_items() {
    return array_merge([
        ['title' => __('Shop All', 'dawp'), 'url' => home_url('/shop/')],
    ], dawp_shop_category_items(), [
        ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/')],
        ['title' => __('Contact', 'dawp'), 'url' => home_url('/contact-us/')],
    ]);
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
                ['title' => __('Shipping & Return', 'dawp'), 'url' => home_url('/shipping-returns/')],
                ['title' => __('Privacy Policy', 'dawp'), 'url' => home_url('/privacy-policy/')],
                ['title' => __('Terms & Conditions', 'dawp'), 'url' => home_url('/terms-conditions/')],
                ['title' => __('Faqs', 'dawp'), 'url' => home_url('/faq/')],
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
