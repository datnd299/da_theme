<?php
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_filter('woocommerce_show_page_title', '__return_false');
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

add_filter('loop_shop_columns', function() { return 3; });
add_filter('loop_shop_per_page', function() { return 12; });

add_filter('woocommerce_gateway_icon', function($icon, $gateway_id) {
    $payment_icons = [
        'paypal' => [
            'file' => 'image copy 3.png',
            'label' => __('PayPal', 'dawp'),
        ],
        'jcb' => [
            'file' => 'image copy.png',
            'label' => __('JCB', 'dawp'),
        ],
        'mastercard' => [
            'file' => 'image copy 2.png',
            'label' => __('MasterCard', 'dawp'),
        ],
        'visa' => [
            'file' => 'image copy 4.png',
            'label' => __('Visa', 'dawp'),
        ],
    ];

    $html = '<span class="dawp-payment-icons icon-box" aria-label="' . esc_attr__('Accepted payment methods', 'dawp') . '">';

    foreach ($payment_icons as $method) {
        $html .= sprintf(
            '<img class="dawp-payment-icon icon" src="%s" alt="%s" loading="lazy" decoding="async">',
            esc_url(get_theme_file_uri('/assets/img/gallery/Oneshopvibe/payment/' . $method['file'])),
            esc_attr($method['label'])
        );
    }

    $html .= '</span>';

    return $html;
}, 20, 2);

// Disable all default WooCommerce CSS
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

add_action('wp_ajax_dawp_load_more_products', 'dawp_load_more_products');
add_action('wp_ajax_nopriv_dawp_load_more_products', 'dawp_load_more_products');

function dawp_load_more_products() {
    check_ajax_referer('dawp_load_more_products', 'nonce');

    $page = isset($_POST['page']) ? max(1, absint($_POST['page'])) : 1;
    $raw_query = isset($_POST['query']) ? wp_unslash($_POST['query']) : '';
    $query_vars = json_decode($raw_query, true);

    if (! is_array($query_vars)) {
        wp_send_json_error([
            'message' => __('Invalid product request.', 'dawp'),
        ]);
    }

    $query_vars['post_type'] = 'product';
    $query_vars['post_status'] = 'publish';
    $query_vars['paged'] = $page;
    $query_vars['posts_per_page'] = (int) apply_filters('loop_shop_per_page', 12);

    $products = new WP_Query($query_vars);

    ob_start();

    if ($products->have_posts()) {
        while ($products->have_posts()) {
            $products->the_post();
            wc_get_template_part('content', 'product');
        }
    }

    $html = ob_get_clean();
    wp_reset_postdata();

    wp_send_json_success([
        'html'      => $html,
        'page'      => $page,
        'max_pages' => (int) $products->max_num_pages,
        'has_more'  => $page < (int) $products->max_num_pages,
    ]);
}
