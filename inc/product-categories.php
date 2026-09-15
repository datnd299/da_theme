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
            'headline'    => __('Dress Watches With A Clean Formal Line.', 'dawp'),
            'description' => __('Explore refined Velmos dress watches selected for slim profiles, polished finishes, and confident daily-to-evening wear.', 'dawp'),
            'intro'       => __('A focused edit of watches for sharper outfits, quieter details, and occasions where the wrist should feel composed.', 'dawp'),
            'highlights'  => [
                __('Slim profile', 'dawp'),
                __('Polished finish', 'dawp'),
                __('Formal-ready detail', 'dawp'),
            ],
            'image'       => 'luxuryimagecollection (1)/velmoscustome_image/69.jpg',
        ],
        'diver-watches' => [
            'name'        => __('Diver Watches', 'dawp'),
            'headline'    => __('Diver Watches Built For Strong Presence.', 'dawp'),
            'description' => __('Browse Velmos diver-style watches with bold bezels, legible dials, and sturdy case proportions for everyday confidence.', 'dawp'),
            'intro'       => __('These pieces lean into sport utility and visual clarity, with product pages covering fit, finish, strap, and care notes.', 'dawp'),
            'highlights'  => [
                __('Bold bezel form', 'dawp'),
                __('High-legibility dials', 'dawp'),
                __('Sport-informed cases', 'dawp'),
            ],
            'image'       => 'luxuryimagecollection (1)/velmoscustome_image/68.jpg',
        ],
        'chronograph-watches' => [
            'name'        => __('Chronograph Watches', 'dawp'),
            'headline'    => __('Chronograph Watches With Measured Detail.', 'dawp'),
            'description' => __('Shop Velmos chronograph watches selected for layered dials, balanced subregisters, and a more technical wrist presence.', 'dawp'),
            'intro'       => __('A practical category for customers who like added dial depth, timing-inspired design, and a sharper instrument feel.', 'dawp'),
            'highlights'  => [
                __('Layered dial layout', 'dawp'),
                __('Timing-inspired style', 'dawp'),
                __('Technical presence', 'dawp'),
            ],
            'image'       => 'luxuryimagecollection (1)/velmoscustome_image/70.jpg',
        ],
    ];
}

add_action('init', 'qb_ensure_product_category_terms', 20);
function qb_ensure_product_category_terms() {
    if (!taxonomy_exists('product_cat')) {
        return;
    }

    foreach (qb_product_category_definitions() as $slug => $category) {
        $term = get_term_by('slug', $slug, 'product_cat');

        if ($term && !is_wp_error($term)) {
            if (empty($term->description) && !empty($category['description'])) {
                wp_update_term((int) $term->term_id, 'product_cat', [
                    'description' => $category['description'],
                ]);
            }
            continue;
        }

        wp_insert_term($category['name'], 'product_cat', [
            'slug'        => $slug,
            'description' => $category['description'],
        ]);
    }
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
