<?php
/**
 * Product-category URL helpers for Watchfavor.
 *
 * The catalog is organised into three collections- The Timeless Reverie,
 * The Celestial Odyssey and The Kinetic Sonata (see
 * inc/product-categories.php). These helpers resolve a category slug to its
 * archive URL and are used by 404.php, the homepage collections grid, and
 * the About page.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

function dawp_product_category_slug($slug) {
    $map = [
        'reverie'  => 'timeless-reverie',
        'dress'    => 'timeless-reverie',
        'odyssey'  => 'celestial-odyssey',
        'sport'    => 'celestial-odyssey',
        'sonata'   => 'kinetic-sonata',
        'skeleton' => 'kinetic-sonata',
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
