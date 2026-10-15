<?php
/**
 * Product category helpers.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Top-level product categories that actually contain products (excludes Uncategorized).
 */
function dawp_shop_product_categories() {
    if (!taxonomy_exists('product_cat')) {
        return [];
    }

    $uncategorized = get_term_by('slug', 'uncategorized', 'product_cat');
    $terms = get_terms([
        'taxonomy'   => 'product_cat',
        'hide_empty' => true,
        'parent'     => 0,
        'exclude'    => $uncategorized && !is_wp_error($uncategorized) ? [(int) $uncategorized->term_id] : [],
    ]);

    return is_wp_error($terms) ? [] : $terms;
}

/**
 * Main product-type categories (slug => label) — shared by the header "Products" menu and the shop category nav.
 */
function dawp_main_product_categories() {
    return [
        'vintage-shirts'         => __('Vintage Shirts', 'dawp'),
        'vintage-shirt-for-kids' => __('Vintage Shirt For Kids', 'dawp'),
        'vintage-tank-top'       => __('Vintage Tank Tops', 'dawp'),
        'vintage-sweatshirt'     => __('Vintage Sweatshirt', 'dawp'),
        'vintage-hoodie'         => __('Vintage Hoodie', 'dawp'),
        'vintage-shorts'         => __('Vintage Shorts', 'dawp'),
        'vintage-caps'           => __('Vintage Caps', 'dawp'),
        'vintage-leg-pants'      => __('Vintage Leg Pants', 'dawp'),
        'classic-tee'            => __('Classic Tee', 'dawp'),
    ];
}

/**
 * One-time cleanup: remove the empty placeholder categories an older theme version auto-created.
 */
add_action('init', 'dawp_remove_legacy_product_categories', 30);
function dawp_remove_legacy_product_categories() {
    if (get_option('dawp_legacy_cats_removed') || !taxonomy_exists('product_cat')) {
        return;
    }

    $legacy = ['beauty-accessories', 'makeup-bags-organizers', 'fashion-accessories', 'everyday-style-essentials', 'giftable-finds'];

    foreach ($legacy as $slug) {
        $term = get_term_by('slug', $slug, 'product_cat');
        if ($term && !is_wp_error($term) && (int) $term->count === 0) {
            wp_delete_term((int) $term->term_id, 'product_cat');
        }
    }

    update_option('dawp_legacy_cats_removed', 1, false);
}
