<?php
/**
 * Product category defaults for Medial Market.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

function dawp_lbq_product_categories() {
    return [
        'furniture' => [
            'name'        => __('Furniture', 'dawp'),
            'description' => __('Sofas, accent chairs, beds, dressers, dining sets, desks and storage furniture for every room, at prices that make sense for real households.', 'dawp'),
            'short'       => __('Living room, bedroom, dining and home office pieces.', 'dawp'),
            'image'       => 'Living_Room.jpeg',
        ],
        'kitchen-dining' => [
            'name'        => __('Kitchen & Dining', 'dawp'),
            'description' => __('Cookware, small kitchen appliances, utensils, bar stools, kitchen carts and organization pieces for everyday cooking and hosting.', 'dawp'),
            'short'       => __('Cookware, small appliances, tools and dining.', 'dawp'),
            'image'       => 'Kitchen_need.jpeg',
        ],
        'outdoor-patio' => [
            'name'        => __('Outdoor & Patio', 'dawp'),
            'description' => __('Patio furniture sets, umbrellas, gazebos, fire pits, garden tools and outdoor storage for backyards, decks and balconies.', 'dawp'),
            'short'       => __('Patio sets, shade, fire pits and garden gear.', 'dawp'),
            'image'       => 'Outdoor.jpeg',
        ],
        'home-decor' => [
            'name'        => __('Home Decor & Bedding', 'dawp'),
            'description' => __('Rugs, mirrors, lamps, faux plants, bedding and decorative accents that make a room feel finished without overspending.', 'dawp'),
            'short'       => __('Rugs, mirrors, lighting, bedding and accents.', 'dawp'),
            'image'       => 'Bedroom.jpeg',
        ],
        'kids-baby' => [
            'name'        => __('Kids & Baby', 'dawp'),
            'description' => __('Kids furniture, toy storage, play kitchens, ride-on toys, high chairs and baby gear chosen for safety, durability and easy cleanup.', 'dawp'),
            'short'       => __('Kids furniture, play, nursery and baby gear.', 'dawp'),
            'image'       => 'Children_playing_tumble_tower_game_202607241524.jpeg',
        ],
        'pets' => [
            'name'        => __('Pets', 'dawp'),
            'description' => __('Dog kennels, cat trees, pet beds, gates and everyday supplies that keep pets comfortable and homes tidy.', 'dawp'),
            'short'       => __('Beds, cat trees, kennels and pet gates.', 'dawp'),
            'image'       => 'Pet_bed_with_cat_202607241524.jpeg',
        ],
    ];
}

function dawp_lbq_retired_product_category_slugs() {
    return [
        'home',
        'garden-tools',
        'electronics',
        'sports-outdoors',
        'auto-tire',
        'toys-outdoor-play',
        'beauty-personal-care',
        'school-office-art-supplies',
    ];
}

function dawp_lbq_product_category_slugs() {
    return array_keys(dawp_lbq_product_categories());
}

function dawp_product_category_slug($slug) {
    $slug = sanitize_title($slug);

    $map = [
        'home'          => 'home-decor',
        'decor'         => 'home-decor',
        'bedding'       => 'home-decor',
        'kitchen'       => 'kitchen-dining',
        'dining'        => 'kitchen-dining',
        'outdoor'       => 'outdoor-patio',
        'patio'         => 'outdoor-patio',
        'garden'        => 'outdoor-patio',
        'garden-tools'  => 'outdoor-patio',
        'kids'          => 'kids-baby',
        'baby'          => 'kids-baby',
        'toys'          => 'kids-baby',
        'pet'           => 'pets',
        'pet-supplies'  => 'pets',
    ];

    return $map[$slug] ?? $slug;
}

function dawp_is_lbq_product_category_slug($slug) {
    return in_array($slug, dawp_lbq_product_category_slugs(), true);
}

function dawp_product_category_url($slug) {
    $slug = dawp_product_category_slug($slug);

    if (taxonomy_exists('product_cat')) {
        $term = get_term_by('slug', $slug, 'product_cat');

        if ($term && !is_wp_error($term)) {
            $link = get_term_link($term, 'product_cat');

            if (!is_wp_error($link)) {
                return $link;
            }
        }
    }

    return home_url('/product-category/' . trim($slug, '/') . '/');
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

    $home_term = get_term_by('slug', 'furniture', 'product_cat');
    if ($home_term && !is_wp_error($home_term)) {
        update_option('default_product_cat', (int) $home_term->term_id);
    }
}
