<?php
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_filter('woocommerce_show_page_title', '__return_false');
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

add_filter('loop_shop_columns', function() { return 3; });
add_filter('loop_shop_per_page', function() { return 12; });

// Disable all default WooCommerce CSS
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

add_filter('woocommerce_shortcode_order_tracking_order_id', 'dawp_normalize_tracking_order_id');
function dawp_normalize_tracking_order_id($order_id) {
    $raw_order_id = is_scalar($order_id) ? (string) $order_id : '';
    $raw_order_id = trim(wp_strip_all_tags($raw_order_id));

    if ($raw_order_id === '') {
        return $order_id;
    }

    if (preg_match('/#?\s*MVB\s*[-_#\s]*\s*(\d+)/i', $raw_order_id, $matches)) {
        return absint($matches[1]);
    }

    if (preg_match('/(?:order|id|#)\D*(\d+)/i', $raw_order_id, $matches)) {
        return absint($matches[1]);
    }

    if (preg_match_all('/\d+/', $raw_order_id, $matches) && !empty($matches[0])) {
        return absint(end($matches[0]));
    }

    return $order_id;
}
