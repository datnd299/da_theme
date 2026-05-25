<?php
/**
 * Product category helpers.
 *
 * @package dawp
 */

function dawp_product_category_definitions() {
    return [
        [
            'title'       => __('Home Essentials', 'dawp'),
            'slug'        => 'home-essentials',
            'description' => __('Practical products for organized daily living.', 'dawp'),
            'accent'      => '#2563EB',
        ],
        [
            'title'       => __('Beauty & Personal Care', 'dawp'),
            'slug'        => 'beauty-personal-care',
            'description' => __('Simple self-care and beauty items for everyday routines.', 'dawp'),
            'accent'      => '#C026D3',
        ],
        [
            'title'       => __('Fashion Accessories', 'dawp'),
            'slug'        => 'fashion-accessories',
            'description' => __('Easy accessories that add style to daily looks.', 'dawp'),
            'accent'      => '#EA580C',
        ],
        [
            'title'       => __('Lifestyle Accessories', 'dawp'),
            'slug'        => 'lifestyle-accessories',
            'description' => __('Useful finds for travel, organization, and daily convenience.', 'dawp'),
            'accent'      => '#06B6D4',
        ],
        [
            'title'       => __('Giftable Finds', 'dawp'),
            'slug'        => 'giftable-finds',
            'description' => __('Thoughtful everyday products made for simple gifting.', 'dawp'),
            'accent'      => '#65A30D',
        ],
    ];
}

function dawp_get_product_category_url($slug) {
    if (taxonomy_exists('product_cat')) {
        $term = get_term_by('slug', $slug, 'product_cat');

        if ($term) {
            $term_link = get_term_link($term);

            if (!is_wp_error($term_link)) {
                return $term_link;
            }
        }
    }

    return home_url('/product-category/' . trim($slug, '/') . '/');
}

function dawp_product_category_links($include_shop_all = true) {
    $links = [];

    if ($include_shop_all) {
        $links[] = [
            'title' => __('Shop All', 'dawp'),
            'url'   => function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/'),
        ];
    }

    foreach (dawp_product_category_definitions() as $category) {
        $links[] = [
            'title' => $category['title'],
            'url'   => dawp_get_product_category_url($category['slug']),
            'slug'  => $category['slug'],
        ];
    }

    return $links;
}

add_action('init', 'dawp_ensure_product_categories', 20);
function dawp_ensure_product_categories() {
    if (!taxonomy_exists('product_cat')) {
        return;
    }

    foreach (dawp_product_category_definitions() as $category) {
        $existing = get_term_by('slug', $category['slug'], 'product_cat');

        if ($existing) {
            continue;
        }

        wp_insert_term(
            $category['title'],
            'product_cat',
            [
                'slug'        => $category['slug'],
                'description' => $category['description'],
            ]
        );
    }

    if (!get_option('dawp_product_category_rewrites_flushed')) {
        flush_rewrite_rules(false);
        update_option('dawp_product_category_rewrites_flushed', '1', false);
    }
}
