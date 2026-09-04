<?php
/**
 * Product-category URL helpers for North Time Co.
 *
 * The store's catalogue is organised into three top-level categories —
 * Men's Watches, Women's Watches, and Automatic Watches (see
 * inc/product-categories.php). These helpers resolve a category slug to its
 * archive URL and are used by 404.php and the homepage / About category cards.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

function dawp_product_category_slug($slug) {
    $map = [
        'men'       => 'mens-watches',
        'mens'      => 'mens-watches',
        'women'     => 'womens-watches',
        'womens'    => 'womens-watches',
        'automatic' => 'automatic-watches',
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
