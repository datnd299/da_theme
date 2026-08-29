<?php
defined('ABSPATH') || exit;

function dawp_product_category_definitions() {
    return [
        'dive-watches' => [
            'name'        => __('Dive Watches', 'dawp'),
            'description' => __('Automatic dive watches with rotating bezels, luminous dials, and serious water resistance for everyday wear.', 'dawp'),
        ],
        'field-watches' => [
            'name'        => __('Field Watches', 'dawp'),
            'description' => __('Rugged, highly legible field watches — a utilitarian classic built for daily use.', 'dawp'),
        ],
        'dress-watches' => [
            'name'        => __('Dress Watches', 'dawp'),
            'description' => __('Slim automatic dress watches with clean dials that slide easily under a cuff.', 'dawp'),
        ],
        'chronograph-watches' => [
            'name'        => __('Chronograph Watches', 'dawp'),
            'description' => __('Mechanical chronographs with stopwatch complications and sub-dials for timing what matters.', 'dawp'),
        ],
    ];
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
        'dive'        => 'dive-watches',
        'field'       => 'field-watches',
        'dress'       => 'dress-watches',
        'chronograph' => 'chronograph-watches',
        'chrono'      => 'chronograph-watches',
    ];
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
        wp_safe_redirect(dawp_product_category_url($redirects[$request_path]), 301);
        exit;
    }

    if (preg_match('#^product-category/([^/]+)/?$#', $request_path, $matches)) {
        $legacy_slug = sanitize_title($matches[1]);

        if (isset($redirects[$legacy_slug]) && $redirects[$legacy_slug] !== $legacy_slug) {
            wp_safe_redirect(dawp_product_category_url($redirects[$legacy_slug]), 301);
            exit;
        }
    }
}

function dawp_seed_product_categories() {
    if (! taxonomy_exists('product_cat')) {
        return;
    }

    $seeded_version = get_option('dawp_seeded_product_categories_version');
    $target_version = '2026-08-29-yourwatchstore';

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
