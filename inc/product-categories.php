<?php
/**
 * Product category defaults for LBQ Shop.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

function dawp_lbq_product_categories() {
    return [
        'beauty-accessories' => [
            'name'        => __('Beauty Accessories', 'dawp'),
            'description' => __('Useful beauty tools and small accessories designed to support simple everyday routines.', 'dawp'),
            'short'       => __('Beauty tools and small helpers for everyday routines.', 'dawp'),
        ],
        'makeup-bags-organizers' => [
            'name'        => __('Makeup Bags & Organizers', 'dawp'),
            'description' => __('Travel-friendly cosmetic bags, storage pieces, and organizers that help keep beauty items neat and easy to find.', 'dawp'),
            'short'       => __('Cosmetic bags, cases, and organizers for home or travel.', 'dawp'),
        ],
        'fashion-accessories' => [
            'name'        => __('Fashion Accessories', 'dawp'),
            'description' => __('Simple style accents for everyday outfits, from hair accessories to small carry pieces.', 'dawp'),
            'short'       => __('Small accents for polished everyday styling.', 'dawp'),
        ],
        'everyday-style-essentials' => [
            'name'        => __('Everyday Style Essentials', 'dawp'),
            'description' => __('Practical accessories for daily beauty, travel, organization, and personal style.', 'dawp'),
            'short'       => __('Practical daily pieces for beauty, travel, and style.', 'dawp'),
        ],
        'giftable-finds' => [
            'name'        => __('Giftable Finds', 'dawp'),
            'description' => __('Pretty, practical accessories made for thoughtful everyday gifting.', 'dawp'),
            'short'       => __('Small beauty and style finds that are easy to gift.', 'dawp'),
        ],
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
}
