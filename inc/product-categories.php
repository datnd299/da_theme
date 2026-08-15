<?php
defined('ABSPATH') || exit;

function dawp_product_category_definitions() {
    return [
        'best-sellers' => [
            'name'        => __('Best Sellers', 'dawp'),
            'description' => __('Customer-favorite patriotic apparel and gifts made for classic American pride.', 'dawp'),
            'group'       => 'featured',
            'icon'        => 'BS',
        ],
        'american-flag-tees' => [
            'name'        => __('American Flag Tees', 'dawp'),
            'description' => __('Graphic tees with bold American flag designs, distressed prints, and eagle graphics.', 'dawp'),
            'group'       => 'collections',
            'icon'        => 'AF',
        ],
        'bomber-jackets' => [
            'name'        => __('Bomber Jackets', 'dawp'),
            'description' => __('MA-1 style bomber jackets with flag patches and custom name options.', 'dawp'),
            'group'       => 'collections',
            'icon'        => 'BJ',
        ],
        'hats-beanies' => [
            'name'        => __('Hats & Beanies', 'dawp'),
            'description' => __('Snapbacks, dad hats, and beanies with patriotic patchwork.', 'dawp'),
            'group'       => 'collections',
            'icon'        => 'HB',
        ],
        'premium-t-shirts' => [
            'name'        => __('Premium T-Shirts', 'dawp'),
            'description' => __('Heavy-weight cotton tees with vintage-style American pride prints.', 'dawp'),
            'group'       => 'collections',
            'icon'        => 'TS',
        ],
        'veteran-tribute' => [
            'name'        => __('Veteran Tribute', 'dawp'),
            'description' => __('Veteran tribute apparel and gifts honoring service, family legacy, and American pride.', 'dawp'),
            'group'       => 'collections',
            'icon'        => 'VT',
        ],
        'mugs-drinkware' => [
            'name'        => __('Mugs & Drinkware', 'dawp'),
            'description' => __('Patriotic mugs, tumblers, and drinkware gifts for home, office, and everyday use.', 'dawp'),
            'group'       => 'collections',
            'icon'        => 'MD',
        ],
        'america-250' => [
            'name'        => __('America 250 Collection', 'dawp'),
            'description' => __('Celebrate America\'s 250th Anniversary with patriotic apparel, accessories, and meaningful gifts.', 'dawp'),
            'group'       => 'collections',
            'icon'        => '250',
        ],
        'fathers-day-gifts' => [
            'name'        => __('Father\'s Day Gifts', 'dawp'),
            'description' => __('Meaningful Father\'s Day gifts for husbands, dads, grandfathers, and proud families.', 'dawp'),
            'group'       => 'gifts',
            'icon'        => 'FD',
        ],
        'veterans-day-gifts' => [
            'name'        => __('Veterans Day Gifts', 'dawp'),
            'description' => __('Thoughtful Veterans Day gifts and patriotic apparel for honoring service and sacrifice.', 'dawp'),
            'group'       => 'gifts',
            'icon'        => 'VD',
        ],
        'memorial-day-gifts' => [
            'name'        => __('Memorial Day Gifts', 'dawp'),
            'description' => __('Respectful patriotic gifts and apparel for remembrance, family legacy, and American pride.', 'dawp'),
            'group'       => 'gifts',
            'icon'        => 'MD',
        ],
        'independence-day-gifts' => [
            'name'        => __('Independence Day Gifts', 'dawp'),
            'description' => __('Red, white, and blue apparel, accessories, and custom gifts for proud American celebrations.', 'dawp'),
            'group'       => 'gifts',
            'icon'        => 'ID',
        ],
    ];
}

function dawp_product_category_group($group = null) {
    $categories = dawp_product_category_definitions();

    if ($group === null) {
        return $categories;
    }

    return array_filter($categories, function ($category) use ($group) {
        return ($category['group'] ?? 'collections') === $group;
    });
}

function dawp_product_category_url($slug) {
    $slug = sanitize_title($slug);

    if (taxonomy_exists('product_cat')) {
        $term = get_term_by('slug', $slug, 'product_cat');

        if ($term && ! is_wp_error($term)) {
            $url = get_term_link($term, 'product_cat');

            if (! is_wp_error($url)) {
                return $url;
            }
        }
    }

    return home_url('/product-category/' . $slug . '/');
}

function dawp_product_category_redirects() {
    return [
        'patches-pins' => 'shop',
        'best-sellers' => 'best-sellers',
        'flag' => 'american-flag-tees',
        'hoodie' => 'premium-t-shirts',
        'jacket' => 'bomber-jackets',
        't-shirt' => 'premium-t-shirts',
        'cap' => 'hats-beanies',
        'fathers-day' => 'fathers-day-gifts',
        'veterans-day' => 'veterans-day-gifts',
        'memorial-day' => 'memorial-day-gifts',
        'independence-day' => 'independence-day-gifts',
        'drinkware' => 'mugs-drinkware',
        'mugs' => 'mugs-drinkware',
    ];
}

function dawp_product_category_redirect_url($destination) {
    if ($destination === 'shop') {
        $shop_url = function_exists('wc_get_page_id') ? get_permalink(wc_get_page_id('shop')) : '';

        return $shop_url ?: home_url('/shop/');
    }

    return dawp_product_category_url($destination);
}

add_action('template_redirect', 'dawp_redirect_legacy_product_category_links', 1);
function dawp_redirect_legacy_product_category_links() {
    $request_path = trim(parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?? '', '/');
    $home_path    = trim(parse_url(home_url('/'), PHP_URL_PATH) ?? '', '/');

    if ($home_path !== '' && ($request_path === $home_path || strpos($request_path, $home_path . '/') === 0)) {
        $request_path = trim(substr($request_path, strlen($home_path)), '/');
    }

    $redirects = dawp_product_category_redirects();

    if (isset($redirects[$request_path])) {
        wp_safe_redirect(dawp_product_category_redirect_url($redirects[$request_path]), 301);
        exit;
    }

    if (preg_match('#^product-category/([^/]+)/?$#', $request_path, $matches)) {
        $legacy_slug = sanitize_title($matches[1]);

        if (isset($redirects[$legacy_slug]) && $redirects[$legacy_slug] !== $legacy_slug) {
            wp_safe_redirect(dawp_product_category_redirect_url($redirects[$legacy_slug]), 301);
            exit;
        }
    }
}

function dawp_hidden_product_category_slugs() {
    return [
        'patches-pins',
    ];
}

function dawp_visible_product_terms($terms) {
    if (is_wp_error($terms) || empty($terms)) {
        return [];
    }

    $hidden_slugs = function_exists('dawp_hidden_product_category_slugs') ? dawp_hidden_product_category_slugs() : [];

    return array_values(array_filter($terms, function ($term) use ($hidden_slugs) {
        return ! in_array($term->slug, $hidden_slugs, true);
    }));
}

function dawp_seed_product_categories() {
    if (! taxonomy_exists('product_cat')) {
        return;
    }

    $seeded_version = get_option('dawp_seeded_product_categories_version');
    $target_version = '2026-07-24-homepage-category-sync';

    if ($seeded_version === $target_version) {
        return;
    }

    foreach (dawp_product_category_definitions() as $slug => $category) {
        $term = get_term_by('slug', $slug, 'product_cat');

        if (! $term) {
            wp_insert_term($category['name'], 'product_cat', [
                'slug'        => $slug,
                'description' => $category['description'],
            ]);
            continue;
        }

        wp_update_term($term->term_id, 'product_cat', [
            'name'        => $category['name'],
            'description' => $category['description'],
        ]);
    }

    update_option('dawp_seeded_product_categories_version', $target_version, false);
}
add_action('init', 'dawp_seed_product_categories', 20);
