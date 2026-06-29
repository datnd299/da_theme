<?php
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_filter('woocommerce_show_page_title', '__return_false');
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

add_filter('loop_shop_columns', function() { return 3; });
add_filter('loop_shop_per_page', function() { return 12; });

// Disable all default WooCommerce CSS
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

add_action('wp_ajax_dawp_load_more_products', 'dawp_load_more_products');
add_action('wp_ajax_nopriv_dawp_load_more_products', 'dawp_load_more_products');

function dawp_load_more_products() {
    if (
        ! isset($_POST['nonce']) ||
        ! wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'dawp_load_more_products')
    ) {
        wp_send_json_error(['message' => 'Security check failed.'], 403);
    }

    $page = isset($_POST['page']) ? max(1, absint($_POST['page'])) : 1;
    $query_vars = [];

    if (isset($_POST['query_vars'])) {
        $decoded = json_decode(wp_unslash($_POST['query_vars']), true);
        if (is_array($decoded)) {
            $query_vars = $decoded;
        }
    }

    $query_vars['post_type']      = 'product';
    $query_vars['post_status']    = 'publish';
    $query_vars['paged']          = $page;
    $query_vars['posts_per_page'] = (int) apply_filters('loop_shop_per_page', wc_get_default_products_per_row() * wc_get_default_product_rows_per_page());

    unset($query_vars['page']);
    unset($query_vars['pagename']);

    $products = new WP_Query($query_vars);

    ob_start();
    if ($products->have_posts()) {
        while ($products->have_posts()) {
            $products->the_post();
            wc_get_template_part('content', 'product');
        }
    }
    wp_reset_postdata();

    wp_send_json_success([
        'html'       => ob_get_clean(),
        'page'       => $page,
        'max_pages'  => (int) $products->max_num_pages,
        'has_more'   => $page < (int) $products->max_num_pages,
    ]);
}
