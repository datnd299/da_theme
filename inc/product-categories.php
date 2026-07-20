<?php
/**
 * Product category defaults for MegaMallDepot.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

function dawp_lbq_product_categories() {
    return [
        'home-essentials' => [
            'name'        => __('Home Essentials', 'dawp'),
            'description' => __('Storage, cleaning, organization and practical everyday products for a better home routine.', 'dawp'),
            'short'       => __('Storage, cleaning and organization for everyday living.', 'dawp'),
        ],
        'furniture' => [
            'name'        => __('Furniture', 'dawp'),
            'description' => __('Living room, bedroom, office and space-saving furniture for modern homes.', 'dawp'),
            'short'       => __('Comfortable furniture for living, working and relaxing.', 'dawp'),
        ],
        'electronics' => [
            'name'        => __('Electronics', 'dawp'),
            'description' => __('TVs, audio, computer accessories, connected devices and practical home entertainment products.', 'dawp'),
            'short'       => __('Audio, entertainment and connected tech essentials.', 'dawp'),
        ],
        'smart-home' => [
            'name'        => __('Smart Home', 'dawp'),
            'description' => __('Smart lighting, security, plugs, Wi-Fi devices and automation products for connected living.', 'dawp'),
            'short'       => __('Smart lighting, security and automation devices.', 'dawp'),
        ],
        'kitchen-dining' => [
            'name'        => __('Kitchen & Dining', 'dawp'),
            'description' => __('Cookware, appliances, coffee gear and dining essentials for everyday meals.', 'dawp'),
            'short'       => __('Cookware, appliances and dining favorites.', 'dawp'),
        ],
        'outdoor-garden' => [
            'name'        => __('Outdoor & Garden', 'dawp'),
            'description' => __('Patio, garden, grilling and outdoor living products for home spaces outside.', 'dawp'),
            'short'       => __('Patio, garden and outdoor living picks.', 'dawp'),
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
