<?php
/**
 * Product category defaults for US Watch Store.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

function dawp_lbq_product_categories() {
    return [
        'quartz-watches' => [
            'name'        => __('Quartz Watches', 'dawp'),
            'description' => __('Battery-powered precision timekeeping with reliable, low-maintenance movements for everyday wear.', 'dawp'),
            'short'       => __('Reliable, low-maintenance precision timekeeping.', 'dawp'),
        ],
        'mechanical-watches' => [
            'name'        => __('Mechanical Watches', 'dawp'),
            'description' => __('Traditional automatic and hand-wound movements built for collectors who appreciate the craft.', 'dawp'),
            'short'       => __('Automatic and hand-wound movements for collectors.', 'dawp'),
        ],
        'smartwatches' => [
            'name'        => __('Smartwatches', 'dawp'),
            'description' => __('Connected watches with fitness tracking, notifications, and apps for life on the go.', 'dawp'),
            'short'       => __('Fitness tracking, notifications, and apps on your wrist.', 'dawp'),
        ],
        'digital-watches' => [
            'name'        => __('Digital Watches', 'dawp'),
            'description' => __('Rugged, easy-to-read digital displays built for everyday durability and everyday use.', 'dawp'),
            'short'       => __('Rugged, easy-to-read displays built to last.', 'dawp'),
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
