<?php
function dawp_product_category_slug($slug) {
    $map = [
        'lingerie'              => 'lingerie-sets',
        'bras-and-bralettes'    => 'bras-bralettes',
        'robes-and-loungewear'  => 'robes-loungewear',
        'robes'                 => 'robes-loungewear',
        'loungewear'            => 'robes-loungewear',
        'essentials'            => 'intimate-essentials',
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
        ['title' => __('Lingerie Sets', 'dawp'), 'url' => dawp_product_category_url('lingerie-sets')],
        ['title' => __('Sleepwear', 'dawp'), 'url' => dawp_product_category_url('sleepwear')],
        ['title' => __('Robes & Loungewear', 'dawp'), 'url' => dawp_product_category_url('robes-loungewear')],
        ['title' => __('Bras & Bralettes', 'dawp'), 'url' => dawp_product_category_url('bras-bralettes')],
        ['title' => __('Intimate Essentials', 'dawp'), 'url' => dawp_product_category_url('intimate-essentials')],
    ];
}

function dawp_main_menu_items() {
    return [
        ['title' => __('Home', 'dawp'), 'url' => home_url('/')],
        ['title' => __('Shop', 'dawp'), 'url' => home_url('/shop/')],
        ['title' => __('About', 'dawp'), 'url' => home_url('/about-us/')],
        ['title' => __('Contact', 'dawp'), 'url' => home_url('/contact-us/')],
        ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/')],
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
                ['title' => __('FAQ', 'dawp'), 'url' => home_url('/faq/')],
                ['title' => __('Shipping & Returns', 'dawp'), 'url' => home_url('/shipping-returns/')],
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
