<?php
/**
 * Product category defaults for DTI Fitness.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

function dawp_lbq_product_categories() {
    return [
        'strength-training' => [
            'name'        => __('Strength Training', 'dawp'),
            'description' => __('Dumbbells, kettlebells, resistance bands, weight plates and lifting accessories for building strength at home or in the gym.', 'dawp'),
            'short'       => __('Dumbbells, kettlebells, plates and lifting gear.', 'dawp'),
        ],
        'cardio-conditioning' => [
            'name'        => __('Cardio & Conditioning', 'dawp'),
            'description' => __('Jump ropes, exercise bikes, step platforms, agility equipment and rowing accessories for conditioning work.', 'dawp'),
            'short'       => __('Jump ropes, bikes, step platforms and agility gear.', 'dawp'),
        ],
        'yoga-mobility' => [
            'name'        => __('Yoga & Mobility', 'dawp'),
            'description' => __('Yoga mats, blocks, foam rollers, stretching straps and massage balls for mobility and recovery.', 'dawp'),
            'short'       => __('Mats, blocks, rollers and recovery tools.', 'dawp'),
        ],
        'fitness-accessories' => [
            'name'        => __('Fitness Accessories', 'dawp'),
            'description' => __('Gym bags, water bottles, workout gloves, towels, fitness trackers and everyday resistance accessories.', 'dawp'),
            'short'       => __('Bags, bottles, gloves, towels and trackers.', 'dawp'),
        ],
    ];
}

function dawp_lbq_retired_product_category_slugs() {
    return [
        'home',
        'home-essentials',
        'furniture',
        'smart-home',
        'kitchen-dining',
        'outdoor-garden',
        'garden-tools',
        'electronics',
        'sports-outdoors',
        'toys-outdoor-play',
        'beauty-personal-care',
        'pets',
        'school-office-art-supplies',
    ];
}

function dawp_lbq_product_category_slugs() {
    return array_keys(dawp_lbq_product_categories());
}

function dawp_is_lbq_product_category_slug($slug) {
    return in_array($slug, dawp_lbq_product_category_slugs(), true);
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

        if (empty($term->description)) {
            wp_update_term(
                (int) $term->term_id,
                'product_cat',
                [
                    'description' => $category['description'],
                ]
            );
        }

        update_term_meta((int) $term->term_id, 'dawp_category_card_copy', $category['short']);
    }

    $default_term = get_term_by('slug', 'strength-training', 'product_cat');
    if ($default_term && !is_wp_error($default_term)) {
        update_option('default_product_cat', (int) $default_term->term_id);
    }

    dawp_remove_non_lbq_product_categories();
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
