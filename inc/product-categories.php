<?php
/**
 * Bracelet category definitions and helpers.
 *
 * @package dawp
 */

function qb_product_category_definitions() {
    return [
        'charm-bracelets' => [
            'name'        => 'Charm Bracelets',
            'headline'    => 'Charm bracelets for personal expression.',
            'description' => 'Charm bracelets designed for personal expression, everyday styling, and thoughtful gifting.',
            'intro'       => 'Browse meaningful bracelet styles with small charms, symbols, and decorative details made for daily outfits and giftable moments.',
            'image'       => 'Charm_Bracelets.png',
            'highlights'  => ['Meaningful charm details', 'Easy everyday styling', 'Gift-ready bracelet looks'],
        ],
        'owl-bracelets' => [
            'name'        => 'Owl Bracelets',
            'headline'    => 'Owl-inspired bracelet styles with thoughtful detail.',
            'description' => 'Owl-inspired bracelet designs with a meaningful charm look and everyday styling appeal.',
            'intro'       => 'Explore owl charm bracelets that keep the collection focused, feminine, and easy to wear without designer-inspired claims.',
            'image'       => 'Owl_Bracelets.png',
            'highlights'  => ['Owl charm accents', 'Symbolic styling', 'Simple giftable pieces'],
        ],
        'beaded-bracelets' => [
            'name'        => 'Beaded Bracelets',
            'headline'    => 'Beaded bracelets made for layering and casual polish.',
            'description' => 'Beaded bracelets made for layering, casual outfits, and simple everyday elegance.',
            'intro'       => 'Find bead-based bracelet styles that pair well with relaxed outfits, layered jewelry looks, and thoughtful everyday gifts.',
            'image'       => 'Beaded_Bracelets.png',
            'highlights'  => ['Layer-friendly styles', 'Casual elegance', 'Soft everyday color'],
        ],
        'chain-bracelets' => [
            'name'        => 'Chain Bracelets',
            'headline'    => 'Chain bracelets with a polished fashion finish.',
            'description' => 'Chain bracelet styles designed to add a polished accent to daily looks.',
            'intro'       => 'Shop gold-tone, silver-tone, and polished chain bracelet styles designed as versatile accents for everyday outfits.',
            'image'       => 'Chain_Bracelets.png',
            'highlights'  => ['Polished chain details', 'Gold-tone and silver-tone styles', 'Versatile daily wear'],
        ],
        'gift-bracelets' => [
            'name'        => 'Gift Bracelets',
            'headline'    => 'Giftable bracelets for thoughtful everyday moments.',
            'description' => 'Giftable bracelet styles made for birthdays, holidays, and thoughtful everyday moments.',
            'intro'       => 'Choose bracelet styles that feel personal, polished, and easy to give for birthdays, holidays, and simple just-because gifts.',
            'image'       => 'Gift_Bracelets.png',
            'highlights'  => ['Birthday gift ideas', 'Holiday-ready pieces', 'Thoughtful everyday giving'],
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

function qb_theme_asset_image_url($filename) {
    $relative_path = 'assets/images/home/' . ltrim($filename, '/');
    $file_path = trailingslashit(get_template_directory()) . $relative_path;

    return file_exists($file_path) ? trailingslashit(get_template_directory_uri()) . $relative_path : '';
}

add_action('init', 'qb_register_default_product_categories', 20);
function qb_register_default_product_categories() {
    if (!taxonomy_exists('product_cat')) {
        return;
    }

    foreach (qb_product_category_definitions() as $slug => $category) {
        $term = get_term_by('slug', $slug, 'product_cat');

        if (!$term || is_wp_error($term)) {
            wp_insert_term($category['name'], 'product_cat', [
                'slug'        => $slug,
                'description' => $category['description'],
            ]);
            continue;
        }

        if (empty($term->description)) {
            wp_update_term($term->term_id, 'product_cat', [
                'description' => $category['description'],
            ]);
        }
    }
}
