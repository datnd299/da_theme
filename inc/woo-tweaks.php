<?php
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_filter('woocommerce_show_page_title', '__return_false');
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

add_filter('loop_shop_columns', function() { return 3; });
add_filter('loop_shop_per_page', function() { return 12; });

// Disable all default WooCommerce CSS
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

add_filter('woocommerce_shortcode_order_tracking_order_id', 'dawp_normalize_tracking_order_id', 9);

function dawp_normalize_tracking_order_id($order_id) {
    $tracking_id = trim((string) $order_id);

    if ($tracking_id === '') {
        return $order_id;
    }

    $tracking_id = ltrim($tracking_id, '#');
    $tracking_id = trim($tracking_id);

    if (ctype_digit($tracking_id)) {
        return $tracking_id;
    }

    if (preg_match('/^QB\s*-\s*(\d+)$/i', $tracking_id, $matches)) {
        return $matches[1];
    }

    return $order_id;
}

add_action('woocommerce_before_account_navigation', 'dawp_my_account_page_title', 5);
add_action('woocommerce_before_customer_login_form', 'dawp_my_account_page_title', 5);

function dawp_my_account_page_title() {
    if (!is_account_page()) {
        return;
    }

    $account_page_id = wc_get_page_id('myaccount');
    $title = $account_page_id > 0 ? get_the_title($account_page_id) : __('My Account', 'dawp');

    echo '<h1 class="qb-account-title">' . esc_html($title) . '</h1>';
}
