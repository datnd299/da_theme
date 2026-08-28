<?php
/**
 * Product category helpers.
 *
 * @package dawp
 */

function qb_product_category_definitions() {
    return [];
}

function qb_get_product_category_data($slug = '') {
    $definitions = qb_product_category_definitions();

    if (!$slug && is_product_category()) {
        $term = get_queried_object();
        $slug = $term && !is_wp_error($term) ? $term->slug : '';
    }

    return $slug && isset($definitions[$slug]) ? $definitions[$slug] : null;
}

function qb_product_category_url($slug) {
    if (taxonomy_exists('product_cat')) {
        $term = get_term_by('slug', $slug, 'product_cat');
        if ($term && !is_wp_error($term)) {
            $link = get_term_link($term);
            if (!is_wp_error($link)) {
                return $link;
            }
        }
    }

    return home_url('/product-category/' . trailingslashit($slug));
}

function qb_get_live_product_categories($args = []) {
    if (!taxonomy_exists('product_cat')) {
        return [];
    }

    $categories = get_terms(wp_parse_args($args, [
        'taxonomy'   => 'product_cat',
        'hide_empty' => true,
        'parent'     => 0,
        'orderby'    => 'name',
        'order'      => 'ASC',
    ]));

    return is_wp_error($categories) ? [] : $categories;
}

function qb_product_term_url($term) {
    $link = get_term_link($term);

    return is_wp_error($link) ? '' : $link;
}

function qb_theme_asset_image_url($filename) {
    $relative_path = 'assets/images/home/' . ltrim($filename, '/');
    $file_path = trailingslashit(get_template_directory()) . $relative_path;

    return file_exists($file_path) ? trailingslashit(get_template_directory_uri()) . $relative_path : '';
}
