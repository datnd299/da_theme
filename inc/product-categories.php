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
        'electronics' => [
            'name'        => __('Smart Home & Tech', 'dawp'),
            'description' => __('Connected devices and everyday tech that quietly make home life easier.', 'dawp'),
            'short'       => __('Connected devices and everyday tech for modern living.', 'dawp'),
        ],
        'sports-outdoors' => [
            'name'        => __('Outdoor & Adventure', 'dawp'),
            'description' => __('Portable gear and recreation essentials built for time outside.', 'dawp'),
            'short'       => __('Portable gear and recreation essentials for time outside.', 'dawp'),
        ],
        'home-improvement' => [
            'name'        => __('Home Improvement Essentials', 'dawp'),
            'description' => __('Practical tools, fixtures and upgrades that make home projects simpler.', 'dawp'),
            'short'       => __('Tools, fixtures and practical upgrades for easier home projects.', 'dawp'),
        ],
        'home-garden-tools' => [
            'name'        => __('Garden Tools & Outdoor Care', 'dawp'),
            'description' => __('Practical gardening tools and yard essentials for planting, pruning and keeping outdoor spaces tidy.', 'dawp'),
            'short'       => __('Garden gear, patio helpers and outdoor care essentials.', 'dawp'),
        ],
        'office-and-school-supplies' => [
            'name'        => __('Office & Productivity', 'dawp'),
            'description' => __('Desk accessories and workspace essentials for focused, organized days.', 'dawp'),
            'short'       => __('Desk accessories, school supplies and workspace organization.', 'dawp'),
        ],
        'personal-care' => [
            'name'        => __('Wellness & Self-Care', 'dawp'),
            'description' => __('Thoughtful personal care finds that make everyday routines feel better.', 'dawp'),
            'short'       => __('Beauty, grooming and personal care finds for daily routines.', 'dawp'),
        ],
        'auto-tires' => [
            'name'        => __('Auto & Tires', 'dawp'),
            'description' => __('Practical vehicle accessories, tire care and tools that keep every drive running smoothly.', 'dawp'),
            'short'       => __('Vehicle accessories, tire care and useful road-ready tools.', 'dawp'),
        ],
        'patio-garden' => [
            'name'        => __('Patio Picks', 'dawp'),
            'description' => __('Weather-ready accents, lighting and handy tools that make outdoor living effortless.', 'dawp'),
            'short'       => __('Weather-ready accents and handy pieces for outdoor living.', 'dawp'),
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
        'garden-tools',
        'beauty-personal-care',
        'school-office-art-supplies',
        'toys-outdoor-play',
        'pets',
    ];
}

function dawp_lbq_product_category_slug_aliases() {
    return [
        'home'                       => 'home-improvement',
        'home-essentials'            => 'home-improvement',
        'furniture'                  => 'home-improvement',
        'smart-home'                 => 'electronics',
        'kitchen-dining'             => 'home-improvement',
        'outdoor-garden'             => 'home-garden-tools',
        'garden-tools'               => 'home-garden-tools',
        'beauty-personal-care'       => 'personal-care',
        'school-office-art-supplies' => 'office-and-school-supplies',
        'toys-outdoor-play'          => 'sports-outdoors',
        'pets'                       => 'home-improvement',
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

    dawp_migrate_lbq_product_category_slugs();

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

function dawp_migrate_lbq_product_category_slugs() {
    foreach (dawp_lbq_product_category_slug_aliases() as $old_slug => $new_slug) {
        $old_term = get_term_by('slug', $old_slug, 'product_cat');

        if (!$old_term || is_wp_error($old_term)) {
            continue;
        }

        $new_term = get_term_by('slug', $new_slug, 'product_cat');

        if (!$new_term || is_wp_error($new_term)) {
            wp_update_term((int) $old_term->term_id, 'product_cat', ['slug' => $new_slug]);
            continue;
        }

        $product_ids = get_posts([
            'post_type'      => 'product',
            'posts_per_page' => -1,
            'fields'         => 'ids',
            'tax_query'      => [
                [
                    'taxonomy' => 'product_cat',
                    'field'    => 'term_id',
                    'terms'    => (int) $old_term->term_id,
                ],
            ],
        ]);

        foreach ($product_ids as $product_id) {
            wp_set_object_terms((int) $product_id, (int) $new_term->term_id, 'product_cat', true);
        }
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
