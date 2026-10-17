<?php
defined('ABSPATH') || exit;

/**
 * Product category helpers.
 *
 * MozTire navigation is driven by the global tire attributes and product_brand
 * (see inc/tire-finder.php); categories are optional and never seeded by the theme.
 */

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

/**
 * Link for a tire type (e.g. "All-Season", "Performance").
 *
 * Uses the Season / Tire Category attribute filter — every value whose name contains the
 * label, so "Performance" also covers "Ultra High Performance" — once those values are on
 * enough products (dawp_attribute_ready()). Until then it falls back to a keyword search,
 * which FiboSearch answers from product titles.
 */
function dawp_tire_type_url($label, $keys = ['season', 'category']) {
    $needle = strtolower(str_replace('-', ' ', $label));

    foreach ($keys as $key) {
        $taxonomy = dawp_tire_tax($key);
        $slugs    = [];

        foreach (dawp_tire_terms($taxonomy) as $term) {
            $name = strtolower(str_replace('-', ' ', html_entity_decode($term->name)));
            if ($name === $needle || preg_match('/\b' . preg_quote($needle, '/') . '\b/', $name)) {
                $slugs[] = $term->slug;
            }
        }

        if ($slugs && dawp_attribute_ready($taxonomy, $slugs)) {
            return dawp_tire_filter_url([$taxonomy => $slugs]);
        }
    }

    return add_query_arg(['s' => $label, 'post_type' => 'product'], home_url('/'));
}
