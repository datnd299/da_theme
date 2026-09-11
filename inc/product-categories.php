<?php
/**
 * Product category helpers.
 *
 * @package dawp
 */

function qb_product_category_definitions() {
    return [
        'dress-watches' => [
            'name'        => 'Dress Watches',
            'headline'    => 'Dress watches shaped for formal presence and quiet refinement.',
            'description' => 'Explore polished watches designed for tailored outfits, evening occasions, and understated daily elegance.',
            'intro'       => 'This collection focuses on slim profiles, balanced dials, refined finishes, and straps that pair cleanly with formal or business wardrobes.',
            'image'       => 'luxuryimagecollection (1)/20.jpg',
            'highlights'  => ['Formal styling', 'Slim wrist presence', 'Refined dial details'],
        ],
        'sport-watches' => [
            'name'        => 'Sport Watches',
            'headline'    => 'Sport watches built around confident form and everyday versatility.',
            'description' => 'Browse modern sport watch styles with stronger case presence, practical readability, and easy pairing from weekday to weekend.',
            'intro'       => 'This category suits customers looking for a more active visual language without losing a polished everyday feel.',
            'image'       => 'luxuryimagecollection (1)/23.jpg',
            'highlights'  => ['Bold case design', 'Everyday versatility', 'Readable dial layouts'],
        ],
        'skeleton-watches' => [
            'name'        => 'Skeleton Watches',
            'headline'    => 'Skeleton watches with visible mechanics and architectural dial detail.',
            'description' => 'Discover open-work watch designs that put movement-inspired structure, layered depth, and mechanical character at the center.',
            'intro'       => 'Skeleton styling is ideal for buyers who want a watch that feels technical, expressive, and visually distinctive on the wrist.',
            'image'       => 'luxuryimagecollection (1)/25.jpg',
            'highlights'  => ['Open-work styling', 'Mechanical character', 'Layered dial depth'],
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
            if ($term->name !== $category['name'] || $term->description !== $category['description']) {
                wp_update_term($term->term_id, 'product_cat', [
                    'name'        => $category['name'],
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

    if (is_wp_error($categories)) {
        return [];
    }

    $defined_slugs = array_keys(qb_product_category_definitions());
    $live_slugs    = wp_list_pluck($categories, 'slug');

    foreach ($defined_slugs as $slug) {
        if (in_array($slug, $live_slugs, true)) {
            continue;
        }

        $term = get_term_by('slug', $slug, 'product_cat');
        if ($term && !is_wp_error($term)) {
            $categories[] = $term;
        }
    }

    return $categories;
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
