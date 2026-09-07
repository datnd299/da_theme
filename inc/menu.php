<?php
/**
 * Product-category URL helpers for WristUnion.
 *
 * The catalog is organised into two shopping categories- Field & Everyday
 * and Heritage (see inc/product-categories.php). These helpers resolve a
 * category slug to its archive URL and are used by 404.php, the homepage
 * category grid, and the About page.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

function dawp_product_category_slug($slug) {
    $map = [
        'field'          => 'field-everyday',
        'everyday'       => 'field-everyday',
        'dress'          => 'heritage',
        'dress-heritage' => 'heritage',
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
