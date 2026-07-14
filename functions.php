<?php
require_once get_template_directory() . '/inc/theme-setup.php';
require_once get_template_directory() . '/inc/responsive-images.php';
require_once get_template_directory() . '/inc/product-categories.php';
require_once get_template_directory() . '/inc/menu.php';
require_once get_template_directory() . '/inc/virtual-pages.php';
require_once get_template_directory() . '/inc/woo-tweaks.php';
require_once get_template_directory() . '/inc/contact-form.php';
add_filter('manage_edit-shop_order_columns', 'pys_add_purchase_column');
add_filter('manage_woocommerce_page_wc-orders_columns', 'pys_add_purchase_column');
function pys_add_purchase_column($columns) {
    $columns['pys_purchase'] = 'PYS Purchase';
    return $columns;
}

add_action('manage_shop_order_posts_custom_column', 'pys_render_purchase_column', 10, 2);
add_action('manage_woocommerce_page_wc-orders_custom_column', 'pys_render_purchase_column', 10, 2);
function pys_render_purchase_column($column, $order_or_post_id) {
    if ($column !== 'pys_purchase') {
        return;
    }
    $order = ($order_or_post_id instanceof WC_Order) ? $order_or_post_id : wc_get_order($order_or_post_id);
    if (!$order) {
        return;
    }

    $fired1 = $order->get_meta('_pys_purchase_event_fired', true);
    $fired2 = $order->get_meta('_pys_ga_purchase_event_fired', true);

    echo $fired1
        ? '<span style="color:green;font-weight:bold;">✔</span>'
        : '<span style="color:red;">✘</span>';

    echo $fired2
        ? '<span style="color:green;font-weight:bold;">-GA✔</span>'
        : '<span style="color:red;">-GA✘</span>';
}