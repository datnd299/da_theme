<?php
/**
 * Product category defaults for GraphicShirt.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

function dawp_graphicshirt_product_categories() {
    return [
        't-shirt' => [
            'name' => __('T-shirt', 'dawp'), 'description' => __('Patriotic graphic T-shirts for American moments and everyday pride.', 'dawp'), 'short' => __('Original patriotic tees for every occasion.', 'dawp'),
        ],
        'hoodie' => [
            'name' => __('Hoodie', 'dawp'), 'description' => __('Comfortable graphic hoodies featuring bold American-inspired designs.', 'dawp'), 'short' => __('Warm patriotic hoodies made to stand out.', 'dawp'),
        ],
        'polo-shirt' => [
            'name' => __('Polo Shirt', 'dawp'), 'description' => __('Classic polo shirts with clean patriotic details for a polished look.', 'dawp'), 'short' => __('Classic American style with a polished finish.', 'dawp'),
        ],
        'caps' => [
            'name' => __('Caps', 'dawp'), 'description' => __('Embroidered and printed caps inspired by American pride.', 'dawp'), 'short' => __('Patriotic caps for everyday American style.', 'dawp'),
        ],
        'flags' => [
            'name' => __('Flags', 'dawp'), 'description' => __('Decorative patriotic flags for homes, gardens, and celebrations.', 'dawp'), 'short' => __('Display American pride at home or outdoors.', 'dawp'),
        ],
        'metal-sign' => [
            'name' => __('Metal Sign', 'dawp'), 'description' => __('Vintage-inspired metal signs made for patriotic home decor.', 'dawp'), 'short' => __('Americana wall decor with lasting character.', 'dawp'),
        ],
        'america-250' => [
            'name' => __('America 250', 'dawp'), 'description' => __('Commemorative designs celebrating 250 years of American history.', 'dawp'), 'short' => __('Celebrate America’s 250th anniversary in 2026.', 'dawp'),
        ],
    ];
}

add_action('init', 'dawp_ensure_graphicshirt_product_categories', 30);
function dawp_ensure_graphicshirt_product_categories() {
    if (!taxonomy_exists('product_cat')) {
        return;
    }

    foreach (dawp_graphicshirt_product_categories() as $slug => $category) {
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
