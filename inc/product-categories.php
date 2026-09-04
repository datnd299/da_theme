<?php
/**
 * Product category defaults for North Time Co.
 *
 * The store is organised into three top-level watch categories. These are the
 * same labels used by the homepage "Shop by Category" section, the header/footer
 * navigation, the About page, and the 404 page.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

function dawp_lbq_product_categories() {
    return [
        'mens-watches' => [
            'name'        => __("Men's Watches", 'dawp'),
            'description' => __('Classic and contemporary watches for men — dress, field, and everyday styles with clear specs on every listing.', 'dawp'),
            'short'       => __('Classic and contemporary timepieces for every occasion.', 'dawp'),
        ],
        'womens-watches' => [
            'name'        => __("Women's Watches", 'dawp'),
            'description' => __('Elegant watches for women, from slim minimalist dials to statement pieces, chosen to complement any outfit.', 'dawp'),
            'short'       => __('Elegant designs made to complement your style.', 'dawp'),
        ],
        'automatic-watches' => [
            'name'        => __('Automatic Watches', 'dawp'),
            'description' => __('Self-winding mechanical watches powered by the motion of your wrist, with no battery to replace.', 'dawp'),
            'short'       => __('Discover the craftsmanship of mechanical movements.', 'dawp'),
        ],
    ];
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
}
