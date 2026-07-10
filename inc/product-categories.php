<?php
defined('ABSPATH') || exit;

function dawp_product_category_definitions() {
    return [
        'best-sellers' => [
            'name'        => __('Best Sellers', 'dawp'),
            'description' => __('Customer-favorite patriotic apparel and veteran-inspired gifts made to honor service, legacy, and American pride.', 'dawp'),
        ],
        'american-flag-tees' => [
            'name'        => __('American Flag Tees', 'dawp'),
            'description' => __('Graphic tees with bold American flag designs, distressed prints, and eagle graphics.', 'dawp'),
        ],
        'veteran-tribute' => [
            'name'        => __('Veteran Tribute', 'dawp'),
            'description' => __('Veteran-inspired apparel that respectfully honors service, branch pride, and sacrifice.', 'dawp'),
        ],
        'bomber-jackets' => [
            'name'        => __('Bomber Jackets', 'dawp'),
            'description' => __('MA-1 style bomber jackets with flag patches and custom name options.', 'dawp'),
        ],
        'hats-beanies' => [
            'name'        => __('Hats & Beanies', 'dawp'),
            'description' => __('Snapbacks, dad hats, and beanies with patriotic patchwork.', 'dawp'),
        ],
        'premium-t-shirts' => [
            'name'        => __('Premium T-Shirts', 'dawp'),
            'description' => __('Heavy-weight cotton tees with vintage-style American pride prints.', 'dawp'),
        ],
        'patches-pins' => [
            'name'        => __('Patches & Pins', 'dawp'),
            'description' => __('Patriotic patches, pins, mugs, and daily carry gifts for American heritage.', 'dawp'),
        ],
        'america-250' => [
            'name'        => __('America 250 Collection', 'dawp'),
            'description' => __('Celebrate America\'s 250th Anniversary with patriotic apparel, accessories, and meaningful gifts.', 'dawp'),
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
