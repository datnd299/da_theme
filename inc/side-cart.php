<?php
/**
 * Side cart drawer — lightweight AJAX mini-cart.
 * Markup lives here, styles in assets/css/main.css, behavior in assets/js/main.js.
 */

defined('ABSPATH') || exit;

add_action('wp_enqueue_scripts', 'dawp_cart_localize', 20);
function dawp_cart_localize() {
    if (!class_exists('WooCommerce')) {
        return;
    }

    wp_localize_script('dawp-main', 'dawpCart', [
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('dawp_cart_nonce'),
    ]);
}

function dawp_cart_count_badge_html($count) {
    return sprintf(
        '<span class="sgs-cart-count%s">%s</span>',
        $count > 0 ? '' : ' hidden',
        esc_html($count)
    );
}

function dawp_cart_item_row($cart_item_key, $cart_item) {
    $product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);

    if (!$product || !$product->exists() || $cart_item['quantity'] <= 0) {
        return;
    }

    $permalink = apply_filters('woocommerce_cart_item_permalink', $product->is_visible() ? $product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
    $name      = apply_filters('woocommerce_cart_item_name', $product->get_name(), $cart_item, $cart_item_key);
    $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $product->get_image('woocommerce_gallery_thumbnail'), $cart_item, $cart_item_key);
    $subtotal  = apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($product, $cart_item['quantity']), $cart_item, $cart_item_key);
    $meta      = wc_get_formatted_cart_item_data($cart_item);
    $max_qty   = $product->get_max_purchase_quantity();
    ?>
    <li class="dawp-cart-item" data-cart-key="<?php echo esc_attr($cart_item_key); ?>">
        <?php if ($permalink) : ?>
            <a href="<?php echo esc_url($permalink); ?>" class="dawp-cart-item__img"><?php echo wp_kses_post($thumbnail); ?></a>
        <?php else : ?>
            <span class="dawp-cart-item__img"><?php echo wp_kses_post($thumbnail); ?></span>
        <?php endif; ?>

        <div class="dawp-cart-item__info">
            <?php if ($permalink) : ?>
                <a href="<?php echo esc_url($permalink); ?>" class="dawp-cart-item__name"><?php echo wp_kses_post($name); ?></a>
            <?php else : ?>
                <span class="dawp-cart-item__name"><?php echo wp_kses_post($name); ?></span>
            <?php endif; ?>

            <?php if ($meta) : ?>
                <div class="dawp-cart-item__meta"><?php echo wp_kses_post($meta); ?></div>
            <?php endif; ?>

            <div class="dawp-cart-item__row">
                <div class="dawp-cart-item__qty">
                    <button type="button" class="dawp-cart-item__qty-btn" data-qty-decrease aria-label="<?php esc_attr_e('Decrease quantity', 'dawp'); ?>">&#8722;</button>
                    <input type="text" inputmode="numeric" class="dawp-cart-item__qty-input" value="<?php echo esc_attr($cart_item['quantity']); ?>" data-qty-input aria-label="<?php esc_attr_e('Quantity', 'dawp'); ?>">
                    <button type="button" class="dawp-cart-item__qty-btn" data-qty-increase<?php echo ($max_qty > 0 && $cart_item['quantity'] >= $max_qty) ? ' disabled' : ''; ?> aria-label="<?php esc_attr_e('Increase quantity', 'dawp'); ?>">&#43;</button>
                </div>
                <span class="dawp-cart-item__price"><?php echo wp_kses_post($subtotal); ?></span>
            </div>
        </div>

        <button type="button" class="dawp-cart-item__remove" data-cart-remove aria-label="<?php esc_attr_e('Remove item', 'dawp'); ?>">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 6h18M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2m3 0-1 14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2L4 6h16Z"/></svg>
        </button>
    </li>
    <?php
}

function dawp_cart_drawer_body() {
    $cart = (class_exists('WooCommerce') && WC()->cart) ? WC()->cart->get_cart() : [];
    ?>
    <div class="dawp-cart-drawer__body">
        <?php if (empty($cart)) : ?>
            <div class="dawp-cart-drawer__empty">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 4h2l2.2 11.2a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.5L21 8H7M10 21h.01M18 21h.01"/></svg>
                <p><?php esc_html_e('Your cart is empty', 'dawp'); ?></p>
                <a class="dawp-cart-drawer__shop-btn" href="<?php echo esc_url(function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/')); ?>">
                    <?php esc_html_e('Start Shopping', 'dawp'); ?>
                </a>
            </div>
        <?php else : ?>
            <ul class="dawp-cart-drawer__list">
                <?php foreach ($cart as $cart_item_key => $cart_item) : dawp_cart_item_row($cart_item_key, $cart_item); endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
    <?php
}

function dawp_cart_promo_box() {
    ?>
    <div class="dawp-cart-promo">
        <p class="dawp-cart-promo__title"><?php esc_html_e('Buy more, save more', 'dawp'); ?></p>
        <ul class="dawp-cart-promo__list">
            <li><span class="dawp-cart-promo__pct">10%</span><?php esc_html_e('off when you buy 2 products', 'dawp'); ?></li>
            <li><span class="dawp-cart-promo__pct">15%</span><?php esc_html_e('off when you buy 4 products', 'dawp'); ?></li>
            <li><span class="dawp-cart-promo__pct">20%</span><?php esc_html_e('off when you buy 6 products', 'dawp'); ?></li>
        </ul>
        <p class="dawp-cart-promo__note"><?php esc_html_e('The discount is applied automatically on the cart and checkout pages.', 'dawp'); ?></p>
    </div>
    <?php
}
add_action('woocommerce_after_add_to_cart_form', 'dawp_cart_promo_box');

function dawp_cart_drawer_footer() {
    $cart = class_exists('WooCommerce') ? WC()->cart : null;
    ?>
    <div class="dawp-cart-drawer__footer">
        <?php if ($cart && !$cart->is_empty()) : ?>
            <?php dawp_cart_promo_box(); ?>
            <div class="dawp-cart-drawer__subtotal">
                <span><?php esc_html_e('Subtotal', 'dawp'); ?></span>
                <strong><?php echo wp_kses_post($cart->get_cart_subtotal()); ?></strong>
            </div>
            <p class="dawp-cart-drawer__note"><?php esc_html_e('Shipping and taxes calculated at checkout.', 'dawp'); ?></p>
            <div class="dawp-cart-drawer__actions">
                <a class="dawp-cart-drawer__btn dawp-cart-drawer__btn--outline" href="<?php echo esc_url(wc_get_cart_url()); ?>"><?php esc_html_e('View Cart', 'dawp'); ?></a>
                <a class="dawp-cart-drawer__btn dawp-cart-drawer__btn--primary" href="<?php echo esc_url(wc_get_checkout_url()); ?>"><?php esc_html_e('Checkout', 'dawp'); ?></a>
            </div>
        <?php endif; ?>
    </div>
    <?php
}

function dawp_cart_fab_markup() {
    if (!class_exists('WooCommerce') || is_cart() || is_checkout()) {
        return;
    }

    $count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
    ?>
    <button type="button" class="dawp-cart-fab" id="dawp-cart-fab" aria-label="<?php esc_attr_e('View cart', 'dawp'); ?>">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 4h2l2.2 11.2a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.5L21 8H7M10 21h.01M18 21h.01"/></svg>
        <?php echo dawp_cart_count_badge_html($count); ?>
    </button>
    <?php
}

function dawp_cart_drawer_markup() {
    if (!class_exists('WooCommerce')) {
        return;
    }
    ?>
    <div class="dawp-cart-drawer" id="dawp-cart-drawer" aria-hidden="true">
        <div class="dawp-cart-drawer__overlay" data-cart-close></div>
        <div class="dawp-cart-drawer__panel" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e('Shopping cart', 'dawp'); ?>">
            <div class="dawp-cart-drawer__header">
                <h2 class="dawp-cart-drawer__title"><?php esc_html_e('Your Cart', 'dawp'); ?></h2>
                <button type="button" class="dawp-cart-drawer__close" data-cart-close aria-label="<?php esc_attr_e('Close cart', 'dawp'); ?>">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true"><path d="M6 6l12 12M18 6 6 18"/></svg>
                </button>
            </div>
            <?php
            dawp_cart_drawer_body();
            dawp_cart_drawer_footer();
            ?>
            <div class="dawp-cart-drawer__loading" aria-hidden="true"><span class="dawp-cart-drawer__spinner"></span></div>
        </div>
    </div>
    <?php
}

/**
 * Single source of truth for drawer fragments — also picked up automatically
 * by WooCommerce core's own add_to_cart / remove_from_cart AJAX endpoints
 * (e.g. the ajax_add_to_cart buttons on the empty-cart recommendations block),
 * so the drawer stays in sync no matter which flow triggered the change.
 */
add_filter('woocommerce_add_to_cart_fragments', 'dawp_cart_fragments');
function dawp_cart_fragments($fragments) {
    ob_start();
    dawp_cart_drawer_body();
    $body = ob_get_clean();

    ob_start();
    dawp_cart_drawer_footer();
    $footer = ob_get_clean();

    $count = (class_exists('WooCommerce') && WC()->cart) ? WC()->cart->get_cart_contents_count() : 0;

    $fragments['.dawp-cart-drawer__body']   = $body;
    $fragments['.dawp-cart-drawer__footer'] = $footer;
    $fragments['.sgs-cart-count']           = dawp_cart_count_badge_html($count);

    return $fragments;
}

function dawp_cart_send_fragments() {
    wp_send_json_success(apply_filters('woocommerce_add_to_cart_fragments', []));
}

function dawp_cart_verify_nonce() {
    if (!check_ajax_referer('dawp_cart_nonce', 'nonce', false)) {
        wp_send_json_error();
    }
}

add_action('wp_ajax_dawp_cart_add', 'dawp_cart_ajax_add');
add_action('wp_ajax_nopriv_dawp_cart_add', 'dawp_cart_ajax_add');
function dawp_cart_ajax_add() {
    dawp_cart_verify_nonce();

    if (!class_exists('WooCommerce') || !WC()->cart) {
        wp_send_json_error();
    }

    $product_id = isset($_POST['dawp_product_id']) ? absint(wp_unslash($_POST['dawp_product_id'])) : 0;
    if (!$product_id) {
        wp_send_json_error();
    }

    $product = wc_get_product($product_id);
    if (!$product) {
        wp_send_json_error();
    }

    $quantity     = isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : 1;
    $variation_id = 0;
    $variation    = [];

    if ($product->is_type('variable') || $product->is_type('variation')) {
        $variation_id = isset($_POST['variation_id']) ? absint(wp_unslash($_POST['variation_id'])) : 0;

        foreach ($_POST as $key => $value) {
            if (strpos($key, 'attribute_') === 0) {
                $variation[wc_clean($key)] = wc_clean(wp_unslash($value));
            }
        }
    }

    $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity, $variation_id, $variation);

    // Buffer and discard stray output (e.g. a stray notice/warning from a
    // hooked plugin) so it can never leak into the JSON response and break
    // client-side parsing of an otherwise-successful add.
    ob_start();
    $added = $passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id, $variation);
    ob_end_clean();

    if ($added) {
        do_action('woocommerce_ajax_added_to_cart', $product_id);
        dawp_cart_send_fragments();
    }

    ob_start();
    wc_print_notices();
    $notices = ob_get_clean();

    wp_send_json_error([
        'notices'     => $notices,
        'product_url' => get_permalink($product_id),
    ]);
}

add_action('wp_ajax_dawp_cart_update_qty', 'dawp_cart_ajax_update_qty');
add_action('wp_ajax_nopriv_dawp_cart_update_qty', 'dawp_cart_ajax_update_qty');
function dawp_cart_ajax_update_qty() {
    dawp_cart_verify_nonce();

    if (!class_exists('WooCommerce') || !WC()->cart) {
        wp_send_json_error();
    }

    $cart_item_key = isset($_POST['cart_item_key']) ? wc_clean(wp_unslash($_POST['cart_item_key'])) : '';

    if (!$cart_item_key || !isset(WC()->cart->cart_contents[$cart_item_key])) {
        wp_send_json_error();
    }

    $quantity = isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : 0;

    ob_start();
    if ($quantity <= 0) {
        WC()->cart->remove_cart_item($cart_item_key);
    } else {
        WC()->cart->set_quantity($cart_item_key, $quantity, true);
    }
    ob_end_clean();

    dawp_cart_send_fragments();
}

add_action('wp_ajax_dawp_cart_remove_item', 'dawp_cart_ajax_remove_item');
add_action('wp_ajax_nopriv_dawp_cart_remove_item', 'dawp_cart_ajax_remove_item');
function dawp_cart_ajax_remove_item() {
    dawp_cart_verify_nonce();

    if (!class_exists('WooCommerce') || !WC()->cart) {
        wp_send_json_error();
    }

    $cart_item_key = isset($_POST['cart_item_key']) ? wc_clean(wp_unslash($_POST['cart_item_key'])) : '';

    ob_start();
    $removed = $cart_item_key && false !== WC()->cart->remove_cart_item($cart_item_key);
    ob_end_clean();

    if (!$removed) {
        wp_send_json_error();
    }

    dawp_cart_send_fragments();
}
