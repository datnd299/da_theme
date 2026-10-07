<?php
/**
 * Product category defaults for US Watch Store.
 *
 * Two style families - each mixes automatic and quartz watches for men and women.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

function dawp_lbq_product_categories() {
    return [
        'classic-style' => [
            'name'        => __('Classic Style', 'dawp'),
            'description' => __('Everyday watches for men and women with legible dials and hard-wearing cases - the watch you reach for every morning.', 'dawp'),
            'short'       => __('Everyday watches with legible dials and hard-wearing cases.', 'dawp'),
        ],
        'elegant-style' => [
            'name'        => __('Elegant Style', 'dawp'),
            'description' => __('Dress watches for men and women with slim profiles, polished finishing, and refined detailing for the occasions that call for it.', 'dawp'),
            'short'       => __('Dress watches with slim profiles and polished finishing.', 'dawp'),
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
