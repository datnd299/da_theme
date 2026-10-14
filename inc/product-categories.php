<?php
/**
 * Product category defaults for ProudlyWear.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

function dawp_lbq_product_categories() {
    return [
        't-shirts' => [
            'name'        => __('T-Shirts', 'dawp'),
            'description' => __('Veteran and military family t-shirts in soft cotton, printed to order with original patriotic designs.', 'dawp'),
            'short'       => __('Soft cotton tees with bold patriotic prints.', 'dawp'),
        ],
        'hoodies' => [
            'name'        => __('Hoodies & Zip-Ups', 'dawp'),
            'description' => __('Pullover and zip-up hoodies for veterans and their families — warm, comfortable and printed to order.', 'dawp'),
            'short'       => __('Warm pullover and zip-up hoodies.', 'dawp'),
        ],
        'sweatshirts' => [
            'name'        => __('Sweatshirts', 'dawp'),
            'description' => __('Classic crewneck sweatshirts with veteran and patriotic designs, printed to order.', 'dawp'),
            'short'       => __('Classic crewnecks with a vintage feel.', 'dawp'),
        ],
        'polo-shirts' => [
            'name'        => __('Polo Shirts', 'dawp'),
            'description' => __('Veteran polo shirts that look sharp at reunions, ceremonies and everyday outings.', 'dawp'),
            'short'       => __('Sharp polos for reunions and everyday wear.', 'dawp'),
        ],
        'bomber-jackets' => [
            'name'        => __('Bomber Jackets', 'dawp'),
            'description' => __('Flight-jacket style bomber jackets with veteran designs, made to order.', 'dawp'),
            'short'       => __('Flight-jacket style, made to order.', 'dawp'),
        ],
        'caps' => [
            'name'        => __('Hats & Caps', 'dawp'),
            'description' => __('Veteran caps and hats with embroidered or printed designs for every branch and era.', 'dawp'),
            'short'       => __('Embroidered and printed veteran caps.', 'dawp'),
        ],
        'flags' => [
            'name'        => __('Flags', 'dawp'),
            'description' => __('Garden and house flags with patriotic and veteran designs for the porch, yard or den.', 'dawp'),
            'short'       => __('Garden and house flags for the porch.', 'dawp'),
        ],
        'metal-signs' => [
            'name'        => __('Metal Signs', 'dawp'),
            'description' => __('Printed metal signs with veteran and patriotic designs for the den, garage or man cave.', 'dawp'),
            'short'       => __('Tin signs for the den or garage.', 'dawp'),
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
