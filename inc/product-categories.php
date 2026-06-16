<?php
defined('ABSPATH') || exit;

function dawp_product_category_definitions() {
    return [
        'best-sellers' => [
            'name'        => __('Best Sellers', 'dawp'),
            'description' => __('Customer-favorite patriotic apparel and veteran-inspired gifts made to honor service, legacy, and American pride.', 'dawp'),
        ],
        'veteran-polo-shirts' => [
            'name'        => __('Veteran Polo Shirts', 'dawp'),
            'description' => __('Custom veteran polo shirts made to carry name, service years, and earned pride.', 'dawp'),
        ],
        'veteran-hats' => [
            'name'        => __('Veteran Hats', 'dawp'),
            'description' => __('Patriotic caps and veteran-inspired designs made for everyday pride.', 'dawp'),
        ],
        'america-250-collection' => [
            'name'        => __('America 250 Collection', 'dawp'),
            'description' => __('Celebrate America\'s 250th Anniversary with patriotic apparel, accessories, and meaningful gifts.', 'dawp'),
        ],
        'custom-military-gifts' => [
            'name'        => __('Custom Military Gifts', 'dawp'),
            'description' => __('Personalized military-inspired gifts made to honor service, family legacy, and American pride.', 'dawp'),
        ],
        'patriotic-accessories' => [
            'name'        => __('Patriotic Accessories', 'dawp'),
            'description' => __('Everyday patriotic accessories made for proud Americans and military families.', 'dawp'),
        ],
        'fathers-day-gifts' => [
            'name'        => __('Father\'s Day Gifts', 'dawp'),
            'description' => __('Meaningful Father\'s Day gifts for veterans, husbands, grandfathers, and military families.', 'dawp'),
        ],
        'veterans-day-gifts' => [
            'name'        => __('Veterans Day Gifts', 'dawp'),
            'description' => __('Gift-ready patriotic apparel and personalized keepsakes made to honor veterans and service legacy.', 'dawp'),
        ],
        'memorial-day-gifts' => [
            'name'        => __('Memorial Day Gifts', 'dawp'),
            'description' => __('Respectful patriotic gifts and service-inspired apparel for remembrance, family legacy, and American pride.', 'dawp'),
        ],
        'independence-day-gifts' => [
            'name'        => __('Independence Day Gifts', 'dawp'),
            'description' => __('Red, white, and blue apparel, accessories, and custom gifts for proud American celebrations.', 'dawp'),
        ],
        'christmas-gifts-for-veterans' => [
            'name'        => __('Christmas Gifts For Veterans', 'dawp'),
            'description' => __('Gift-ready veteran-inspired apparel, hats, mugs, and personalized accessories for the holiday season.', 'dawp'),
        ],
    ];
}

function dawp_seed_product_categories() {
    if (! taxonomy_exists('product_cat')) {
        return;
    }

    $seeded_version = get_option('dawp_seeded_product_categories_version');
    $target_version = '2026-06-16';

    if ($seeded_version === $target_version) {
        return;
    }

    foreach (dawp_product_category_definitions() as $slug => $category) {
        $term = get_term_by('slug', $slug, 'product_cat');

        if (! $term) {
            wp_insert_term($category['name'], 'product_cat', [
                'slug'        => $slug,
                'description' => $category['description'],
            ]);
            continue;
        }

        wp_update_term($term->term_id, 'product_cat', [
            'name'        => $category['name'],
            'description' => $category['description'],
        ]);
    }

    update_option('dawp_seeded_product_categories_version', $target_version, false);
}
add_action('init', 'dawp_seed_product_categories', 20);
