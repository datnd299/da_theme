<?php
/**
 * Product category / collection helpers.
 *
 * Corvel is organised around three permanent collections. They are defined here
 * in theme code (per project scope: no WooCommerce taxonomy terms, no database
 * or site-setting changes) and surfaced across the storefront - homepage, the
 * /collections/ page, header and footer navigation, and the shop archive hero.
 *
 * Real WooCommerce product data (products, prices, stock, images, URLs) always
 * stays dynamic. These definitions only drive editorial presentation and link
 * through to the Shop.
 *
 * @package dawp
 */

defined('ABSPATH') || exit;

/**
 * The three Corvel collections, in display order.
 *
 * Keys map to the shape woocommerce/archive-product.php expects
 * (name, headline, description, intro, image, highlights) plus a short
 * `tagline` used in compact navigation contexts.
 */
function qb_product_category_definitions() {
    return apply_filters('dawp_collections', [
        'foundry-collection' => [
            'name'        => 'Foundry Collection',
            'tagline'     => 'The core automatic line',
            'headline'    => 'The everyday automatic, built to be worn hard.',
            'description' => 'Corvel\'s core house line. Robust self-winding movements, brushed steel cases, and proportions that sit right from the desk to the weekend.',
            'intro'       => 'Foundry is where a Corvel starts: a dependable automatic caliber, a clean dial, and finishing you can live with every day.',
            'image'       => 'img1.jpeg',
            'highlights'  => ['Automatic movement', 'Brushed steel case', 'Everyday proportions'],
        ],
        'frontier-collection' => [
            'name'        => 'Frontier Collection',
            'tagline'     => 'Field and travel character',
            'headline'    => 'Legible, sealed, and ready to move.',
            'description' => 'Corvel watches with field and travel character. High-contrast dials, sapphire crystals, and higher water resistance for motion-heavy days.',
            'intro'       => 'Frontier takes the Corvel automatic movement and wraps it in a tougher case: more legibility, more sealing, more distance.',
            'image'       => 'img4.jpeg',
            'highlights'  => ['Sapphire crystal', 'Higher water resistance', 'High-legibility dial'],
        ],
        'prestige-collection' => [
            'name'        => 'Prestige Collection',
            'tagline'     => 'The dress tier',
            'headline'    => 'Slimmer, quieter, more considered.',
            'description' => 'Corvel\'s dress tier. Slimmer automatic calibers, polished finishing, and exhibition case backs that show the movement at work.',
            'intro'       => 'Prestige is Corvel at its most refined: a thinner self-winding movement, sharper finishing, and detail meant to be noticed up close.',
            'image'       => 'img2.jpeg',
            'highlights'  => ['Slim automatic caliber', 'Polished finishing', 'Exhibition case back'],
        ],
    ]);
}

/**
 * Collections prepared for navigation / homepage use: adds a resolved URL.
 *
 * Each collection links to its matching WooCommerce category (by slug) when
 * one exists, so the customer lands on live, in-stock product data for that
 * category. Falls back to /product-category/{slug}/ if the term isn't
 * created yet, and to the Shop if categories aren't in use at all.
 */
function qb_theme_collections() {
    $shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
    $items    = [];

    foreach (qb_product_category_definitions() as $slug => $data) {
        $url = taxonomy_exists('product_cat') ? qb_product_category_url($slug) : $shop_url;

        $items[$slug] = array_merge($data, [
            'slug' => $slug,
            'url'  => $url ?: $shop_url,
        ]);
    }

    return $items;
}

function qb_get_product_category_data($slug = '') {
    $definitions = qb_product_category_definitions();

    if (!$slug && function_exists('is_product_category') && is_product_category()) {
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
