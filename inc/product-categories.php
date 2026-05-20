<?php
defined('ABSPATH') || exit;

function dawp_product_category_definitions() {
    return [
        'handmade-bracelets' => [
            'name'        => __('Handmade Bracelets', 'dawp'),
            'description' => __('Handmade bracelets designed with simple materials, creative details, and everyday personal style.', 'dawp'),
            'cover'       => 'handmade-bracelets.png',
            'eyebrow'     => __('Handmade Wristwear', 'dawp'),
            'summary'     => __('Shop bead bracelets, stretch bracelets, stone bracelets, layering bracelets, and handmade wrist accessories.', 'dawp'),
            'tags'        => [__('Beaded details', 'dawp'), __('Layering-friendly', 'dawp'), __('Giftable', 'dawp')],
        ],
        'beaded-jewelry' => [
            'name'        => __('Beaded Jewelry', 'dawp'),
            'description' => __('Beaded jewelry pieces made for everyday expression and creative personal styling.', 'dawp'),
            'cover'       => 'hero-artisan-jewelry.png',
            'eyebrow'     => __('Beads, Texture & Detail', 'dawp'),
            'summary'     => __('Browse beaded bracelets, necklaces, small handmade jewelry pieces, layering jewelry, and creative accessory sets.', 'dawp'),
            'tags'        => [__('Beaded pieces', 'dawp'), __('Everyday expression', 'dawp'), __('Creative styling', 'dawp')],
        ],
        'vintage-accessories' => [
            'name'        => __('Vintage Accessories', 'dawp'),
            'description' => __('Curated accessories with vintage character and everyday styling potential.', 'dawp'),
            'cover'       => 'vintage-curated-finds.png',
            'eyebrow'     => __('Vintage-Inspired Finds', 'dawp'),
            'summary'     => __('Explore vintage-style hats, scarves, bags, belts, small accessories, and curated accent pieces.', 'dawp'),
            'tags'        => [__('Curated accessories', 'dawp'), __('Vintage-inspired', 'dawp'), __('Everyday accents', 'dawp')],
        ],
        'curated-apparel' => [
            'name'        => __('Curated Apparel', 'dawp'),
            'description' => __('Curated apparel pieces selected for creative everyday style and vintage-inspired looks.', 'dawp'),
            'cover'       => 'vintage-curated-finds.png',
            'eyebrow'     => __('Creative Everyday Style', 'dawp'),
            'summary'     => __('Find vintage-style clothing, curated shirts, hats, layering pieces, and creative casual apparel.', 'dawp'),
            'tags'        => [__('Curated pieces', 'dawp'), __('Vintage-inspired', 'dawp'), __('Casual style', 'dawp')],
        ],
        'artisan-gifts' => [
            'name'        => __('Artisan Gifts', 'dawp'),
            'description' => __('Small handmade and curated pieces made for thoughtful everyday gifting.', 'dawp'),
            'cover'       => 'handmade-bracelets.png',
            'eyebrow'     => __('Thoughtful Small Gifts', 'dawp'),
            'summary'     => __('Shop bracelet gifts, jewelry sets, accessory bundles, small curated finds, and creative gift items.', 'dawp'),
            'tags'        => [__('Giftable pieces', 'dawp'), __('Handmade details', 'dawp'), __('Curated finds', 'dawp')],
        ],
    ];
}

function dawp_tire_category_definitions() {
    return dawp_product_category_definitions();
}

function dawp_product_category_data($slug) {
    $definitions = dawp_product_category_definitions();

    if (isset($definitions[$slug])) {
        return $definitions[$slug];
    }

    return null;
}

function dawp_tire_category_data($slug) {
    return dawp_product_category_data($slug);
}

function dawp_product_category_cover_url($slug) {
    $category = dawp_product_category_data($slug);
    $file = $category['cover'] ?? 'hero-artisan-jewelry.png';

    return get_theme_file_uri('/assets/img/gallery/ScottOsterbind/' . $file);
}

function dawp_tire_category_cover_url($slug) {
    return dawp_product_category_cover_url($slug);
}

function dawp_product_category_url($slug) {
    if (taxonomy_exists('product_cat')) {
        $term = get_term_by('slug', $slug, 'product_cat');

        if ($term && ! is_wp_error($term)) {
            $link = get_term_link($term);

            if (! is_wp_error($link)) {
                return $link;
            }
        }
    }

    return home_url('/product-category/' . sanitize_title($slug) . '/');
}

function dawp_product_category_terms() {
    if (! taxonomy_exists('product_cat')) {
        return [];
    }

    $terms = [];

    foreach (dawp_product_category_definitions() as $slug => $category) {
        $term = get_term_by('slug', $slug, 'product_cat');

        if (! $term || is_wp_error($term)) {
            continue;
        }

        $terms[] = $term;
    }

    return $terms;
}

function dawp_tire_product_category_terms() {
    return dawp_product_category_terms();
}

add_action('init', 'dawp_ensure_product_categories', 30);
function dawp_ensure_product_categories() {
    if (! taxonomy_exists('product_cat') || ! function_exists('wp_insert_term')) {
        return;
    }

    foreach (dawp_product_category_definitions() as $slug => $category) {
        $term = get_term_by('slug', $slug, 'product_cat');

        if ($term && ! is_wp_error($term)) {
            if ((string) $term->name !== (string) $category['name'] || (string) $term->description !== (string) $category['description']) {
                wp_update_term((int) $term->term_id, 'product_cat', [
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

function dawp_ensure_tire_product_categories() {
    dawp_ensure_product_categories();
}

add_action('template_redirect', 'dawp_handle_product_category_fallback', 5);
function dawp_handle_product_category_fallback() {
    if (! taxonomy_exists('product_cat') || is_product_category()) {
        return;
    }

    $request_path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '', '/');
    $home_path = trim(parse_url(home_url('/'), PHP_URL_PATH) ?? '', '/');

    if ($home_path !== '' && strpos($request_path, $home_path . '/') === 0) {
        $request_path = substr($request_path, strlen($home_path) + 1);
    }

    if (! preg_match('#^product-category/([^/]+)/?$#', $request_path, $matches)) {
        return;
    }

    $slug = sanitize_title($matches[1]);
    $definitions = dawp_product_category_definitions();

    if (! isset($definitions[$slug])) {
        return;
    }

    $term = get_term_by('slug', $slug, 'product_cat');

    if (! $term || is_wp_error($term)) {
        return;
    }

    $paged = max(1, (int) get_query_var('paged'), (int) get_query_var('page'));
    $per_page = function_exists('wc_get_default_products_per_row') ? (int) apply_filters('loop_shop_per_page', 12) : 12;

    $category_query = new WP_Query([
        'post_type'      => 'product',
        'post_status'    => 'publish',
        'posts_per_page' => $per_page,
        'paged'          => $paged,
        'tax_query'      => [
            [
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'    => [(int) $term->term_id],
            ],
        ],
    ]);

    global $wp_query;
    $wp_query = $category_query;
    $wp_query->is_404 = false;
    $wp_query->is_archive = true;
    $wp_query->is_tax = true;
    $wp_query->queried_object = $term;
    $wp_query->queried_object_id = (int) $term->term_id;
    $wp_query->query_vars['taxonomy'] = 'product_cat';
    $wp_query->query_vars['term'] = $slug;
    $wp_query->query_vars['product_cat'] = $slug;

    status_header(200);
    include locate_template('woocommerce/archive-product.php');
    exit;
}
