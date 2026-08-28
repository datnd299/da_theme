<?php
/**
 * Product category defaults for BrickGo.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

function dawp_lbq_product_categories() {
    return [
        'building-sets' => [
            'name'        => __('Building Sets', 'dawp'),
            'description' => __('Creative construction sets, architecture-inspired builds and display models.', 'dawp'),
            'short'       => __('Builds made for desks, shelves and weekend focus.', 'dawp'),
        ],
        'art-figures' => [
            'name'        => __('Art Figures', 'dawp'),
            'description' => __('Display-focused collectible figures with clean forms and shelf presence.', 'dawp'),
            'short'       => __('Figures made to collect, gift and display.', 'dawp'),
        ],
        'designer-toys' => [
            'name'        => __('Designer Toys', 'dawp'),
            'description' => __('Original collectible objects, sculptural toys and design-led editions.', 'dawp'),
            'short'       => __('Creative forms with collector energy.', 'dawp'),
        ],
        'blind-boxes' => [
            'name'        => __('Blind Boxes', 'dawp'),
            'description' => __('Mystery collectibles, small series and surprise mini releases.', 'dawp'),
            'short'       => __('Small surprises for repeat discovery.', 'dawp'),
        ],
        'mini-figures' => [
            'name'        => __('Mini Figures', 'dawp'),
            'description' => __('Small collectible characters, display figures and tiny shelf pieces.', 'dawp'),
            'short'       => __('Tiny pieces with a lot of personality.', 'dawp'),
        ],
        'display-collectibles' => [
            'name'        => __('Display Collectibles', 'dawp'),
            'description' => __('Decorative pieces designed for shelves, desks and interior displays.', 'dawp'),
            'short'       => __('Objects that earn the visible spot.', 'dawp'),
        ],
        'accessories' => [
            'name'        => __('Accessories', 'dawp'),
            'description' => __('Display cases, stands, storage, lighting and collector-friendly extras.', 'dawp'),
            'short'       => __('Tools for protecting and showing the collection.', 'dawp'),
        ],
        'gift-ideas' => [
            'name'        => __('Gift Ideas', 'dawp'),
            'description' => __('Giftable collectibles for new collectors, display lovers and builders.', 'dawp'),
            'short'       => __('Easy wins for collector gifting.', 'dawp'),
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
        'home'                       => 'building-sets',
        'garden-tools'               => 'art-figures',
        'electronics'                => 'designer-toys',
        'sports-outdoors'            => 'blind-boxes',
        'toys-outdoor-play'          => 'mini-figures',
        'beauty-personal-care'       => 'display-collectibles',
        'pets'                       => 'accessories',
        'school-office-art-supplies' => 'gift-ideas',
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

    $building_sets_term = get_term_by('slug', 'building-sets', 'product_cat');
    if ($building_sets_term && !is_wp_error($building_sets_term)) {
        update_option('default_product_cat', (int) $building_sets_term->term_id);
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
