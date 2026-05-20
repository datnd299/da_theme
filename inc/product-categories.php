<?php
defined('ABSPATH') || exit;

function dawp_tire_category_definitions() {
    return [
        'all-season-tires' => [
            'name'        => __('All-Season Tires', 'dawp'),
            'description' => __('Tires designed for practical year-round driving and everyday road use.', 'dawp'),
            'cover'       => 'category-all-season-tires.png',
            'eyebrow'     => __('Everyday Road Use', 'dawp'),
            'summary'     => __('Shop all-season tires built around daily driving, road comfort, and practical year-round conditions.', 'dawp'),
            'tags'        => [__('Year-round use', 'dawp'), __('Daily driving', 'dawp'), __('Comfort', 'dawp')],
        ],
        'suv-crossover-tires' => [
            'name'        => __('SUV & Crossover Tires', 'dawp'),
            'description' => __('Tire options for SUVs and crossovers, built for daily driving, comfort, and road stability.', 'dawp'),
            'cover'       => 'category-suv-crossover-tires.png',
            'eyebrow'     => __('SUV & Family Vehicles', 'dawp'),
            'summary'     => __('Find tire options for SUVs, crossovers, family vehicles, and daily road trips.', 'dawp'),
            'tags'        => [__('SUV fitment', 'dawp'), __('Road stability', 'dawp'), __('Daily comfort', 'dawp')],
        ],
        'light-truck-tires' => [
            'name'        => __('Light Truck Tires', 'dawp'),
            'description' => __('Tires for light trucks, hauling needs, and everyday utility driving.', 'dawp'),
            'cover'       => 'category-light-truck-tires.png',
            'eyebrow'     => __('Pickup & Utility', 'dawp'),
            'summary'     => __('Browse tires for pickup trucks, light-duty work vehicles, hauling needs, and everyday utility driving.', 'dawp'),
            'tags'        => [__('Light truck', 'dawp'), __('Utility driving', 'dawp'), __('Hauling needs', 'dawp')],
        ],
        'performance-tires' => [
            'name'        => __('Performance Tires', 'dawp'),
            'description' => __('Tires designed for responsive handling and performance-inspired driving.', 'dawp'),
            'cover'       => 'category-performance-tires.png',
            'eyebrow'     => __('Responsive Handling', 'dawp'),
            'summary'     => __('Explore tires designed for sharper handling, confident road feel, and performance-inspired street driving.', 'dawp'),
            'tags'        => [__('Handling', 'dawp'), __('Sporty road feel', 'dawp'), __('Street use', 'dawp')],
        ],
        'trailer-tires' => [
            'name'        => __('Trailer Tires', 'dawp'),
            'description' => __('Trailer tire options for towing, utility use, and road-ready trailer needs.', 'dawp'),
            'cover'       => 'category-trailer-tires.png',
            'eyebrow'     => __('Towing Support', 'dawp'),
            'summary'     => __('Shop trailer tire options for utility trailers, towing support, and road-ready trailer needs.', 'dawp'),
            'tags'        => [__('Trailer use', 'dawp'), __('Towing', 'dawp'), __('Utility support', 'dawp')],
        ],
        'winter-tires' => [
            'name'        => __('Winter Tires', 'dawp'),
            'description' => __('Tires designed for colder temperatures and winter road conditions.', 'dawp'),
            'cover'       => 'category-winter-tires.png',
            'eyebrow'     => __('Cold Weather', 'dawp'),
            'summary'     => __('Choose tire options designed for colder temperatures, winter road conditions, and seasonal replacement needs.', 'dawp'),
            'tags'        => [__('Winter roads', 'dawp'), __('Cold weather', 'dawp'), __('Seasonal fit', 'dawp')],
        ],
    ];
}

function dawp_tire_category_data($slug) {
    $definitions = dawp_tire_category_definitions();

    if (isset($definitions[$slug])) {
        return $definitions[$slug];
    }

    return null;
}

function dawp_tire_category_cover_url($slug) {
    $category = dawp_tire_category_data($slug);
    $file = $category['cover'] ?? 'tire-hero-road.png';

    return get_theme_file_uri('/assets/img/gallery/Tizezap/' . $file);
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

function dawp_tire_product_category_terms() {
    if (! taxonomy_exists('product_cat')) {
        return [];
    }

    $terms = [];

    foreach (dawp_tire_category_definitions() as $slug => $category) {
        $term = get_term_by('slug', $slug, 'product_cat');

        if (! $term || is_wp_error($term)) {
            continue;
        }

        $terms[] = $term;
    }

    return $terms;
}

add_action('init', 'dawp_ensure_tire_product_categories', 30);
function dawp_ensure_tire_product_categories() {
    if (! taxonomy_exists('product_cat') || ! function_exists('wp_insert_term')) {
        return;
    }

    foreach (dawp_tire_category_definitions() as $slug => $category) {
        $term = get_term_by('slug', $slug, 'product_cat');

        if ($term && ! is_wp_error($term)) {
            continue;
        }

        wp_insert_term($category['name'], 'product_cat', [
            'slug'        => $slug,
            'description' => $category['description'],
        ]);
    }
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
    $definitions = dawp_tire_category_definitions();

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
