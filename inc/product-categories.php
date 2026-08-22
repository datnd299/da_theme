<?php
/**
 * Product category defaults for Chronel Shop.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

function dawp_lbq_product_categories() {
    return [];
}

function dawp_new_arrivals_category_slug() {
    return 'new-arrivals';
}

function dawp_new_arrivals_category_args() {
    return [
        'name'        => __('New Arrivals', 'dawp'),
        'slug'        => dawp_new_arrivals_category_slug(),
        'description' => __('The latest watches added to the catalog, refreshed automatically from current products.', 'dawp'),
    ];
}

add_action('init', 'dawp_ensure_new_arrivals_category', 20);
function dawp_ensure_new_arrivals_category() {
    if (!taxonomy_exists('product_cat')) {
        return;
    }

    $args = dawp_new_arrivals_category_args();
    $term = get_term_by('slug', $args['slug'], 'product_cat');

    if ($term && !is_wp_error($term)) {
        if ($term->name !== $args['name'] || trim((string) $term->description) === '') {
            wp_update_term((int) $term->term_id, 'product_cat', [
                'name'        => $args['name'],
                'description' => $args['description'],
            ]);
        }

        return;
    }

    wp_insert_term($args['name'], 'product_cat', [
        'slug'        => $args['slug'],
        'description' => $args['description'],
    ]);
}

function dawp_is_new_arrivals_category_archive() {
    return function_exists('is_product_category') && is_product_category(dawp_new_arrivals_category_slug());
}

add_action('pre_get_posts', 'dawp_new_arrivals_archive_query', 99);
function dawp_new_arrivals_archive_query($query) {
    if (is_admin() || !$query->is_main_query() || !dawp_is_new_arrivals_category_archive()) {
        return;
    }

    $query->set('post_type', 'product');
    $query->set('posts_per_page', 30);
    $query->set('orderby', 'date');
    $query->set('order', 'DESC');
    $query->set('ignore_sticky_posts', true);
    $query->set('product_cat', '');
    $query->set('tax_query', dawp_new_arrivals_without_category_tax_query((array) $query->get('tax_query')));
}

add_filter('post_limits', 'dawp_new_arrivals_archive_limit', 10, 2);
function dawp_new_arrivals_archive_limit($limits, $query) {
    if (is_admin() || !$query->is_main_query() || !dawp_is_new_arrivals_category_archive()) {
        return $limits;
    }

    return 'LIMIT 0, 30';
}

add_filter('found_posts', 'dawp_new_arrivals_archive_found_posts', 10, 2);
function dawp_new_arrivals_archive_found_posts($found_posts, $query) {
    if (is_admin() || !$query->is_main_query() || !dawp_is_new_arrivals_category_archive()) {
        return $found_posts;
    }

    return min(30, (int) $found_posts);
}

function dawp_new_arrivals_without_category_tax_query($tax_query) {
    $filtered = [];

    foreach ($tax_query as $key => $clause) {
        if ('relation' === $key) {
            $filtered[$key] = $clause;
            continue;
        }

        if (is_array($clause) && isset($clause['taxonomy']) && 'product_cat' === $clause['taxonomy']) {
            continue;
        }

        $filtered[$key] = $clause;
    }

    return $filtered;
}

function dawp_lbq_retired_product_category_slugs() {
    return [
        'home',
        'garden-tools',
        'electronics',
        'sports-outdoors',
        'toys-outdoor-play',
        'beauty-personal-care',
        'pets',
        'school-office-art-supplies',
        'home-essentials',
        'furniture',
        'smart-home',
        'kitchen-dining',
        'outdoor-garden',
        'classic',
        'sport',
        'heritage',
        'signature',
        'limited-editions',
    ];
}

function dawp_lbq_product_category_slugs() {
    return array_keys(dawp_lbq_flatten_categories());
}

function dawp_is_lbq_product_category_slug($slug) {
    return in_array($slug, dawp_lbq_product_category_slugs(), true);
}

function dawp_lbq_product_category_terms() {
    if (!function_exists('get_term_by') || !taxonomy_exists('product_cat')) {
        return [];
    }

    $terms = [];

    foreach (array_keys(dawp_lbq_product_categories()) as $slug) {
        $term = get_term_by('slug', $slug, 'product_cat');

        if ($term && !is_wp_error($term)) {
            $terms[] = $term;
        }
    }

    return $terms;
}

add_action('init', 'dawp_remove_retired_product_categories_once', 30);
function dawp_remove_retired_product_categories_once() {
    if (!taxonomy_exists('product_cat')) {
        return;
    }

    if (get_option('dawp_retired_product_categories_removed_v2')) {
        return;
    }

    foreach (dawp_lbq_retired_product_category_slugs() as $slug) {
        $term = get_term_by('slug', $slug, 'product_cat');

        if ($term && !is_wp_error($term)) {
            wp_delete_term((int) $term->term_id, 'product_cat');
        }
    }

    if (taxonomy_exists('product_tag')) {
        foreach (['limited-editions'] as $slug) {
            $term = get_term_by('slug', $slug, 'product_tag');

            if ($term && !is_wp_error($term)) {
                wp_delete_term((int) $term->term_id, 'product_tag');
            }
        }
    }

    update_option('dawp_retired_product_categories_removed_v2', 1, false);
}

function dawp_remove_non_lbq_product_categories() {
    return;
}

function dawp_get_category_image_url($term_id) {
    $image_name = get_term_meta($term_id, 'dawp_category_image', true);

    if (empty($image_name)) {
        return '';
    }

    return get_theme_file_uri('assets/img/categories/' . $image_name);
}
