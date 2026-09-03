<?php
/**
 * Product category defaults for North Time Co.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

function dawp_lbq_product_categories() {
    return [
        'minimalist' => [
            'name'        => __('Minimalist', 'dawp'),
            'description' => __('Clean-dial watches with slim cases and leather or mesh straps. A Scandinavian-inspired look made for the office and everyday wear.', 'dawp'),
            'short'       => __('Slim, clean-dial watches for work and everyday wear.', 'dawp'),
        ],
        'sport-outdoor' => [
            'name'        => __('Sport & Outdoor', 'dawp'),
            'description' => __('Active-ready watches with 5 ATM water resistance, silicone straps, and chronograph or backlight functions in bold colors.', 'dawp'),
            'short'       => __('5 ATM water resistance, silicone straps, chronograph and backlight.', 'dawp'),
        ],
        'vintage-leather' => [
            'name'        => __('Vintage & Leather', 'dawp'),
            'description' => __('Retro-inspired watches with 70s and 80s case shapes, open-heart dial options, and genuine brown leather straps.', 'dawp'),
            'short'       => __('Retro shapes, open-heart dials, and genuine leather straps.', 'dawp'),
        ],
        'luxury-style' => [
            'name'        => __('Luxury Style', 'dawp'),
            'description' => __('Dress watches with polished finishing and refined detailing for weddings, events, and formal occasions.', 'dawp'),
            'short'       => __('Polished dress watches for formal occasions and gifting.', 'dawp'),
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
