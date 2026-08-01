<?php
/**
 * Product category defaults for Crowdfused.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

function dawp_lbq_product_categories() {
    return [
        'home' => [
            'name'        => __('Home', 'dawp'),
            'description' => __('Home essentials, furniture, kitchen favorites and practical pieces for everyday living.', 'dawp'),
            'short'       => __('Everyday essentials and home comfort picks.', 'dawp'),
        ],
        'auto-tires' => [
            'name'        => __('Auto & Tires', 'dawp'),
            'description' => __('Vehicle accessories, tire care essentials and practical tools that keep everyday journeys running smoothly.', 'dawp'),
            'short'       => __('Practical vehicle care and auto accessories for the road ahead.', 'dawp'),
        ],
        'garden-tools' => [
            'name'        => __('Garden & Tools', 'dawp'),
            'description' => __('Garden, patio, outdoor care and handy tools for home projects.', 'dawp'),
            'short'       => __('Garden gear, patio picks and useful tools.', 'dawp'),
        ],
        'electronics' => [
            'name'        => __('Electronics', 'dawp'),
            'description' => __('TVs, audio, computer accessories, connected devices and practical home entertainment products.', 'dawp'),
            'short'       => __('Audio, entertainment and connected tech essentials.', 'dawp'),
        ],
        'sports-outdoors' => [
            'name'        => __('Sports & Outdoors', 'dawp'),
            'description' => __('Sports, fitness, recreation and outdoor activity products.', 'dawp'),
            'short'       => __('Fitness, recreation and outdoor activity gear.', 'dawp'),
        ],
        'toys-outdoor-play' => [
            'name'        => __('Toys & Outdoor Play', 'dawp'),
            'description' => __('Toys, games and outdoor play products for kids and families.', 'dawp'),
            'short'       => __('Toys, games and outdoor play favorites.', 'dawp'),
        ],
        'beauty-personal-care' => [
            'name'        => __('Beauty & Personal Care', 'dawp'),
            'description' => __('Beauty, grooming, wellness and personal care products for daily routines.', 'dawp'),
            'short'       => __('Beauty, grooming and personal care essentials.', 'dawp'),
        ],
        'pets' => [
            'name'        => __('Pets', 'dawp'),
            'description' => __('Pet food, care, toys, beds and everyday supplies for animal companions.', 'dawp'),
            'short'       => __('Care, comfort and everyday pet supplies.', 'dawp'),
        ],
        'school-office-art-supplies' => [
            'name'        => __('School, Office & Art Supplies', 'dawp'),
            'description' => __('School supplies, office essentials, stationery and art materials.', 'dawp'),
            'short'       => __('School, office, stationery and art supplies.', 'dawp'),
        ],
    ];
}

function dawp_lbq_retired_product_category_slugs() {
    return [
        'home-essentials',
        'furniture',
        'smart-home',
        'kitchen-dining',
        'outdoor-garden',
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

    $home_term = get_term_by('slug', 'home', 'product_cat');
    if ($home_term && !is_wp_error($home_term)) {
        update_option('default_product_cat', (int) $home_term->term_id);
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
