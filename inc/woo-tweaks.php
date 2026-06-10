<?php
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_filter('woocommerce_show_page_title', '__return_false');
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

add_filter('loop_shop_columns', function() { return 3; });
add_filter('loop_shop_per_page', function() { return 12; });

function dawp_checkout_order_sidebar_open() {
    echo '<aside class="checkout-order-sidebar">';
}
add_action('woocommerce_checkout_before_order_review_heading', 'dawp_checkout_order_sidebar_open', 5);

function dawp_checkout_order_sidebar_close() {
    echo '</aside>';
}
add_action('woocommerce_checkout_after_order_review', 'dawp_checkout_order_sidebar_close', 50);

// Disable all default WooCommerce CSS
add_filter('woocommerce_enqueue_styles', '__return_empty_array');
