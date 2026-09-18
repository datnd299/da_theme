<?php
/**
 * POD variant system — cart/order integration.
 *
 * WooCommerce still owns cart/checkout/orders, this just feeds
 * pod_variant_id / pod_size_id through its standard hooks.
 */

if (!defined('ABSPATH')) {
    exit;
}

add_filter('woocommerce_add_to_cart_validation', 'pod_validate_add_to_cart', 10, 3);
function pod_validate_add_to_cart($passed, $product_id, $quantity) {
    if (!pod_product_has_variants($product_id)) {
        return $passed;
    }

    $variant_id = isset($_REQUEST['pod_variant_id']) ? absint($_REQUEST['pod_variant_id']) : 0;
    $size_id    = isset($_REQUEST['pod_size_id']) ? absint($_REQUEST['pod_size_id']) : 0;
    $variant    = $variant_id ? pod_get_variant($variant_id) : null;

    if (!$variant || (int) $variant->product_id !== (int) $product_id || !$variant->is_active) {
        wc_add_notice(__('Please select a valid style and color.', 'dawp'), 'error');
        return false;
    }

    if (!pod_size_valid_for_type($variant->type_id, $size_id)) {
        wc_add_notice(__('Please select a valid size.', 'dawp'), 'error');
        return false;
    }

    return $passed;
}

add_filter('woocommerce_add_cart_item_data', 'pod_add_cart_item_data', 10, 2);
function pod_add_cart_item_data($cart_item_data, $product_id) {
    if (!pod_product_has_variants($product_id)) {
        return $cart_item_data;
    }

    $variant_id = isset($_REQUEST['pod_variant_id']) ? absint($_REQUEST['pod_variant_id']) : 0;
    $size_id    = isset($_REQUEST['pod_size_id']) ? absint($_REQUEST['pod_size_id']) : 0;

    if ($variant_id && $size_id) {
        $cart_item_data['pod_variant_id'] = $variant_id;
        $cart_item_data['pod_size_id']    = $size_id;
    }

    return $cart_item_data;
}

/**
 * Without this, pod_variant_id/pod_size_id set above would vanish the
 * moment WooCommerce restores the cart from session on the next request —
 * WC only carries forward cart item keys a filter explicitly re-attaches.
 */
add_filter('woocommerce_get_cart_item_from_session', 'pod_get_cart_item_from_session', 10, 2);
function pod_get_cart_item_from_session($cart_item, $values) {
    if (isset($values['pod_variant_id'], $values['pod_size_id'])) {
        $cart_item['pod_variant_id'] = $values['pod_variant_id'];
        $cart_item['pod_size_id']    = $values['pod_size_id'];
    }
    return $cart_item;
}

add_action('woocommerce_before_calculate_totals', 'pod_before_calculate_totals', 20, 1);
function pod_before_calculate_totals($cart) {
    if (is_admin() && !defined('DOING_AJAX')) {
        return;
    }

    $variant_ids = [];
    foreach ($cart->get_cart() as $cart_item) {
        if (!empty($cart_item['pod_variant_id'])) {
            $variant_ids[] = (int) $cart_item['pod_variant_id'];
        }
    }
    if (!$variant_ids) {
        return;
    }

    global $wpdb;
    $variant_ids  = array_unique($variant_ids);
    $placeholders = implode(',', array_fill(0, count($variant_ids), '%d'));
    $rows         = $wpdb->get_results($wpdb->prepare(
        'SELECT id, type_id, price, sale_price FROM ' . pod_table_variants() . " WHERE id IN ($placeholders) AND is_active = 1",
        $variant_ids
    ));

    $variants_by_id = [];
    foreach ($rows as $row) {
        $variants_by_id[(int) $row->id] = $row;
    }

    $size_prices = pod_get_size_prices();

    foreach ($cart->get_cart() as $cart_item_key => $cart_item) {
        if (empty($cart_item['pod_variant_id'])) {
            continue;
        }

        $variant_id = (int) $cart_item['pod_variant_id'];

        if (!isset($variants_by_id[$variant_id])) {
            // Variant was deactivated/deleted after being added to cart — don't
            // let the line item silently keep whatever price it had before.
            $cart->remove_cart_item($cart_item_key);
            continue;
        }

        $variant   = $variants_by_id[$variant_id];
        $size_id   = (int) $cart_item['pod_size_id'];
        $base      = $variant->sale_price !== null ? (float) $variant->sale_price : (float) $variant->price;
        $surcharge = isset($size_prices[$variant->type_id][$size_id]) ? (float) $size_prices[$variant->type_id][$size_id] : 0;

        $cart_item['data']->set_price($base + $surcharge);
    }
}

add_filter('woocommerce_get_item_data', 'pod_get_item_data', 10, 2);
function pod_get_item_data($item_data, $cart_item) {
    if (empty($cart_item['pod_variant_id'])) {
        return $item_data;
    }

    $variant = pod_get_variant((int) $cart_item['pod_variant_id']);
    if (!$variant) {
        return $item_data;
    }

    $types  = pod_get_types();
    $colors = pod_get_colors();
    $sizes  = pod_get_sizes();

    if (isset($types[$variant->type_id])) {
        $item_data[] = ['name' => __('Style', 'dawp'), 'value' => $types[$variant->type_id]->name];
    }
    if (isset($colors[$variant->color_id])) {
        $item_data[] = ['name' => __('Color', 'dawp'), 'value' => $colors[$variant->color_id]->name];
    }
    if (isset($sizes[(int) $cart_item['pod_size_id']])) {
        $item_data[] = ['name' => __('Size', 'dawp'), 'value' => $sizes[(int) $cart_item['pod_size_id']]->name];
    }

    return $item_data;
}

add_action('woocommerce_checkout_create_order_line_item', 'pod_checkout_create_order_line_item', 10, 4);
function pod_checkout_create_order_line_item($item, $cart_item_key, $values, $order) {
    if (empty($values['pod_variant_id'])) {
        return;
    }

    $variant = pod_get_variant((int) $values['pod_variant_id']);
    if (!$variant) {
        return;
    }

    $types  = pod_get_types();
    $colors = pod_get_colors();
    $sizes  = pod_get_sizes();

    if (isset($types[$variant->type_id])) {
        $item->add_meta_data(__('Style', 'dawp'), $types[$variant->type_id]->name);
    }
    if (isset($colors[$variant->color_id])) {
        $item->add_meta_data(__('Color', 'dawp'), $colors[$variant->color_id]->name);
    }
    if (isset($sizes[(int) $values['pod_size_id']])) {
        $item->add_meta_data(__('Size', 'dawp'), $sizes[(int) $values['pod_size_id']]->name);
    }

    $item->add_meta_data('_pod_variant_id', $variant->id);
    $item->add_meta_data('_pod_sku', $variant->sku);
}

/**
 * Show the selected variant's own image instead of the base product image
 * in the cart/side-cart. Two hooks are needed because this store's Cart and
 * Checkout pages are the WooCommerce blocks (Store API), which don't read
 * the classic thumbnail filter below — only the side cart drawer (custom,
 * classic-style rendering in inc/side-cart.php) does.
 */
add_filter('woocommerce_cart_item_thumbnail', 'pod_cart_item_thumbnail', 10, 2);
function pod_cart_item_thumbnail($image, $cart_item) {
    $url = pod_first_cart_item_variant_image($cart_item);
    if (!$url) {
        return $image;
    }

    $alt = isset($cart_item['data']) && is_a($cart_item['data'], 'WC_Product') ? $cart_item['data']->get_name() : '';

    return sprintf(
        '<img src="%s" alt="%s" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" loading="lazy" width="150" height="150">',
        esc_url($url),
        esc_attr($alt)
    );
}

add_filter('woocommerce_store_api_cart_item_images', 'pod_store_api_cart_item_images', 10, 2);
function pod_store_api_cart_item_images($images, $cart_item) {
    $url = pod_first_cart_item_variant_image($cart_item);
    if (!$url) {
        return $images;
    }

    $alt = isset($cart_item['data']) && is_a($cart_item['data'], 'WC_Product') ? $cart_item['data']->get_name() : '';

    return [(object) [
        'id'               => (int) $cart_item['pod_variant_id'],
        'src'              => $url,
        'thumbnail'        => $url,
        'srcset'           => '',
        'sizes'            => '',
        'thumbnail_srcset' => '',
        'thumbnail_sizes'  => '',
        'name'             => $alt,
        'alt'              => $alt,
    ]];
}

function pod_first_cart_item_variant_image($cart_item) {
    if (empty($cart_item['pod_variant_id'])) {
        return '';
    }

    $variant = pod_get_variant((int) $cart_item['pod_variant_id']);
    if (!$variant) {
        return '';
    }

    $images = json_decode($variant->image_urls, true) ?: [];
    $url    = $images[0] ?? '';

    return $url !== '' ? pod_proxy_image_url($url) : '';
}

add_action('before_delete_post', 'pod_cleanup_variants_on_delete_post');
function pod_cleanup_variants_on_delete_post($post_id) {
    if (get_post_type($post_id) !== 'product') {
        return;
    }
    global $wpdb;
    $wpdb->delete(pod_table_variants(), ['product_id' => $post_id], ['%d']);
}
