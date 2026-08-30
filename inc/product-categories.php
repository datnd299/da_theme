<?php
/**
 * Product category helpers.
 *
 * @package dawp
 */

function qb_product_category_definitions() {
    return [
        'dress-watches' => [
            'name'        => __('Dress Watches', 'dawp'),
            'description' => __('Refined watches for formal wardrobes and polished daily wear.', 'dawp'),
            'headline'    => __('Dress Watches', 'dawp'),
            'intro'       => __('Refined proportions, elegant dials and timeless details for formal wardrobes.', 'dawp'),
            'image'       => '',
            'highlights'  => [
                __('Slim profiles and elegant cases', 'dawp'),
                __('Classic dial layouts', 'dawp'),
                __('Leather, bracelet and precious-tone finishes', 'dawp'),
            ],
        ],
        'sport-watches' => [
            'name'        => __('Sport Watches', 'dawp'),
            'description' => __('Robust watches built for active days, travel and everyday confidence.', 'dawp'),
            'headline'    => __('Sport Watches', 'dawp'),
            'intro'       => __('Durable cases, legible dials and confident wrist presence for active routines.', 'dawp'),
            'image'       => '',
            'highlights'  => [
                __('Durable cases and bracelets', 'dawp'),
                __('High-legibility displays', 'dawp'),
                __('Ready for travel and daily wear', 'dawp'),
            ],
        ],
        'daily-icons' => [
            'name'        => __('Daily Icons', 'dawp'),
            'description' => __('Versatile signature pieces made for frequent wear and easy styling.', 'dawp'),
            'headline'    => __('Daily Icons', 'dawp'),
            'intro'       => __('Versatile watches with enduring style, balanced comfort and everyday appeal.', 'dawp'),
            'image'       => '',
            'highlights'  => [
                __('Easy to dress up or down', 'dawp'),
                __('Comfortable everyday proportions', 'dawp'),
                __('Recognizable modern classics', 'dawp'),
            ],
        ],
        'collector-picks' => [
            'name'        => __('Collector Picks', 'dawp'),
            'description' => __('Selected pieces with character, distinction and collector-focused appeal.', 'dawp'),
            'headline'    => __('Collector Picks', 'dawp'),
            'intro'       => __('Distinctive references selected for character, condition and collection value.', 'dawp'),
            'image'       => '',
            'highlights'  => [
                __('Standout references and details', 'dawp'),
                __('Collector-minded selection', 'dawp'),
                __('Pieces with lasting appeal', 'dawp'),
            ],
        ],
    ];
}

function qb_get_product_category_data($slug = '') {
    $definitions = qb_product_category_definitions();

    if (!$slug && is_product_category()) {
        $term = get_queried_object();
        $slug = $term && !is_wp_error($term) ? $term->slug : '';
    }

    return $slug && isset($definitions[$slug]) ? $definitions[$slug] : null;
}

function qb_product_category_url($slug) {
    if (taxonomy_exists('product_cat')) {
        $term = get_term_by('slug', $slug, 'product_cat');
        if ($term && !is_wp_error($term)) {
            $link = get_term_link($term);
            if (!is_wp_error($link)) {
                return $link;
            }
        }
    }

    return home_url('/product-category/' . trailingslashit($slug));
}

function qb_ensure_product_categories() {
    if (!taxonomy_exists('product_cat')) {
        return;
    }

    foreach (qb_product_category_definitions() as $slug => $category) {
        $term = get_term_by('slug', $slug, 'product_cat');

        if ($term && !is_wp_error($term)) {
            continue;
        }

        wp_insert_term($category['name'], 'product_cat', [
            'slug'        => $slug,
            'description' => $category['description'],
        ]);
    }
}
add_action('init', 'qb_ensure_product_categories', 20);

function qb_get_live_product_categories($args = []) {
    if (!taxonomy_exists('product_cat')) {
        return [];
    }

    $categories = get_terms(wp_parse_args($args, [
        'taxonomy'   => 'product_cat',
        'hide_empty' => true,
        'parent'     => 0,
        'orderby'    => 'name',
        'order'      => 'ASC',
    ]));

    return is_wp_error($categories) ? [] : $categories;
}

function qb_product_term_url($term) {
    $link = get_term_link($term);

    return is_wp_error($link) ? '' : $link;
}

function qb_theme_asset_image_url($filename) {
    $relative_path = 'assets/images/home/' . ltrim($filename, '/');
    $file_path = trailingslashit(get_template_directory()) . $relative_path;

    return file_exists($file_path) ? trailingslashit(get_template_directory_uri()) . $relative_path : '';
}
