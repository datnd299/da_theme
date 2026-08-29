<?php
/**
 * Product category defaults for Brickygo.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

function dawp_lbq_product_categories() {
    return [
        'city-buildings-houses' => [
            'name'        => __('City Buildings & Houses', 'dawp'),
            'description' => __('Modular houses, storefronts and street-side buildings for detailed brick-built city blocks.', 'dawp'),
            'short'       => __('Brick-built homes and shops for your city layout.', 'dawp'),
        ],
        'animals-trees-botanicals' => [
            'name'        => __('Animals, Trees & Botanicals', 'dawp'),
            'description' => __('Brick-built animals, trees, flowers and greenery that bring scenery and life to any build.', 'dawp'),
            'short'       => __('Creatures and greenery to finish every scene.', 'dawp'),
        ],
        'city-vehicle-sets' => [
            'name'        => __('City Vehicle Sets', 'dawp'),
            'description' => __('Cars, trucks, service vehicles and transit sets built for busy brick-built streets.', 'dawp'),
            'short'       => __('Cars, trucks and service rigs for the streets.', 'dawp'),
        ],
        'world-war-ii-sets' => [
            'name'        => __('World War II Sets', 'dawp'),
            'description' => __('History-themed WWII-era vehicles, aircraft and battlefield sets made for display and collection.', 'dawp'),
            'short'       => __('WWII-era vehicles and scenes for collectors.', 'dawp'),
        ],
    ];
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
        'building-sets',
        'art-figures',
        'designer-toys',
        'blind-boxes',
    ];
}

function dawp_lbq_product_category_slugs() {
    return array_keys(dawp_lbq_product_categories());
}

function dawp_is_lbq_product_category_slug($slug) {
    return in_array($slug, dawp_lbq_product_category_slugs(), true);
}

function dawp_lbq_legacy_product_category_slug_map() {
    return [
        'home'                       => 'city-buildings-houses',
        'garden-tools'               => 'animals-trees-botanicals',
        'electronics'                => 'city-vehicle-sets',
        'sports-outdoors'            => 'world-war-ii-sets',
        'toys-outdoor-play'          => 'city-buildings-houses',
        'beauty-personal-care'       => 'animals-trees-botanicals',
        'pets'                       => 'animals-trees-botanicals',
        'school-office-art-supplies' => 'world-war-ii-sets',
        'building-sets'              => 'city-buildings-houses',
        'art-figures'                => 'animals-trees-botanicals',
        'designer-toys'              => 'city-vehicle-sets',
        'blind-boxes'                => 'world-war-ii-sets',
    ];
}

function dawp_lbq_product_category_terms() {
    if (!function_exists('get_term_by') || !taxonomy_exists('product_cat')) {
        return [];
    }

    $terms = [];

    foreach (dawp_lbq_product_category_slugs() as $slug) {
        $term = get_term_by('slug', $slug, 'product_cat');

        if ($term && !is_wp_error($term)) {
            $terms[] = $term;
        }
    }

    return $terms;
}

add_action('init', 'dawp_ensure_lbq_product_categories', 30);
function dawp_ensure_lbq_product_categories() {
    if (!taxonomy_exists('product_cat')) {
        return;
    }

    dawp_migrate_lbq_legacy_product_categories();

    foreach (dawp_lbq_product_categories() as $slug => $category) {
        $term = get_term_by('slug', $slug, 'product_cat');

        if (!$term || is_wp_error($term)) {
            $created = wp_insert_term(
                $category['name'],
                'product_cat',
                [
                    'slug'        => $slug,
                    'description' => $category['description'],
                ]
            );

            if (is_wp_error($created) || empty($created['term_id'])) {
                continue;
            }

            update_term_meta((int) $created['term_id'], 'dawp_category_card_copy', $category['short']);
            continue;
        }

        wp_update_term(
            (int) $term->term_id,
            'product_cat',
            [
                'name'        => $category['name'],
                'slug'        => $slug,
                'description' => $category['description'],
            ]
        );

        update_term_meta((int) $term->term_id, 'dawp_category_card_copy', $category['short']);
    }

    $default_term = get_term_by('slug', 'city-buildings-houses', 'product_cat');
    if ($default_term && !is_wp_error($default_term)) {
        update_option('default_product_cat', (int) $default_term->term_id);
    }

    dawp_remove_non_lbq_product_categories();
}

function dawp_migrate_lbq_legacy_product_categories() {
    foreach (dawp_lbq_legacy_product_category_slug_map() as $legacy_slug => $new_slug) {
        $legacy_term = get_term_by('slug', $legacy_slug, 'product_cat');

        if (!$legacy_term || is_wp_error($legacy_term)) {
            continue;
        }

        $new_term = get_term_by('slug', $new_slug, 'product_cat');
        if ($new_term && !is_wp_error($new_term) && (int) $new_term->term_id !== (int) $legacy_term->term_id) {
            dawp_reassign_product_category_terms($legacy_slug, (int) $new_term->term_id);
            wp_delete_term((int) $legacy_term->term_id, 'product_cat');
            continue;
        }

        wp_update_term(
            (int) $legacy_term->term_id,
            'product_cat',
            [
                'slug' => $new_slug,
            ]
        );
    }
}

function dawp_reassign_product_category_terms($from_slug, $to_term_id) {
    if (!$from_slug || !$to_term_id || !function_exists('wc_get_products')) {
        return;
    }

    $products = wc_get_products([
        'limit'    => -1,
        'status'   => ['publish', 'private', 'draft', 'pending'],
        'category' => [$from_slug],
        'return'   => 'ids',
    ]);

    foreach ($products as $product_id) {
        wp_set_object_terms((int) $product_id, [(int) $to_term_id], 'product_cat', true);
    }
}

function dawp_remove_non_lbq_product_categories() {
    $allowed_slugs = dawp_lbq_product_category_slugs();
    $terms = get_terms([
        'taxonomy'   => 'product_cat',
        'hide_empty' => false,
        'fields'     => 'all',
    ]);

    if (is_wp_error($terms) || empty($terms)) {
        return;
    }

    foreach ($terms as $term) {
        if (in_array($term->slug, $allowed_slugs, true)) {
            continue;
        }

        wp_delete_term((int) $term->term_id, 'product_cat');
    }
}
