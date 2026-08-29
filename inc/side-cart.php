<?php
/**
 * Lightweight built-in side cart (drawer) — replaces the "Side Cart WooCommerce"
 * plugin. Uses WooCommerce's own wc-ajax=add_to_cart / wc-ajax=remove_from_cart
 * endpoints for add/remove, plus a small custom AJAX action for quantity changes.
 * All three flow through the same woocommerce_add_to_cart_fragments filter so the
 * drawer, the header badge and the subtotal stay in sync after every action.
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Header cart-count badge markup. Shared by header.php and the fragments
 * filter so both render the exact same element (fragment refresh replaces it
 * by selector, so the markup must always match).
 */
function dawp_cart_count_badge_html($count) {
    $count   = (int) $count;
    $classes = 'cart-count-badge absolute -right-1 -top-1 flex h-5 min-w-5 items-center justify-center rounded-full border border-white bg-alert px-1 text-xs font-extrabold text-white';

    if ($count < 1) {
        $classes .= ' hidden';
    }

    return sprintf(
        '<span class="%s" data-cart-count>%s</span>',
        esc_attr($classes),
        esc_html($count)
    );
}

/**
 * Cart item rows, wrapped in the .side-cart__items <ul> (this outer element
 * is what gets swapped on fragment refresh, so it must be included here too).
 */
function dawp_side_cart_render_items() {
    $cart = function_exists('WC') ? WC()->cart : null;
    ?>
    <ul class="side-cart__items">
        <?php if (!$cart || $cart->is_empty()) : ?>
            <li class="side-cart__empty">
                <p><?php esc_html_e('Your cart is empty.', 'dawp'); ?></p>
                <a href="<?php echo esc_url(function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/')); ?>" class="side-cart__empty-cta">
                    <?php esc_html_e('Continue Shopping', 'dawp'); ?>
                </a>
            </li>
        <?php else : ?>
            <?php foreach ($cart->get_cart() as $cart_item_key => $cart_item) :
                $product = $cart_item['data'];
                if (!$product || !$product->exists() || $cart_item['quantity'] <= 0) {
                    continue;
                }

                $permalink   = apply_filters('woocommerce_cart_item_permalink', $product->is_visible() ? $product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
                $image       = apply_filters('woocommerce_cart_item_thumbnail', $product->get_image('thumbnail'), $cart_item, $cart_item_key);
                $name        = apply_filters('woocommerce_cart_item_name', $product->get_name(), $cart_item, $cart_item_key);
                $price_html  = apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_subtotal($product, $cart_item['quantity']), $cart_item, $cart_item_key);
                $item_data   = wc_get_formatted_cart_item_data($cart_item);
                $max_qty     = $product->get_max_purchase_quantity();
                ?>
                <li class="side-cart-item" data-cart-item-key="<?php echo esc_attr($cart_item_key); ?>">
                    <?php if ($permalink) : ?>
                        <a href="<?php echo esc_url($permalink); ?>" class="side-cart-item__img-link"><?php echo $image; ?></a>
                    <?php else : ?>
                        <span class="side-cart-item__img-link"><?php echo $image; ?></span>
                    <?php endif; ?>

                    <div class="side-cart-item__info">
                        <?php if ($permalink) : ?>
                            <a href="<?php echo esc_url($permalink); ?>" class="side-cart-item__name"><?php echo esc_html($name); ?></a>
                        <?php else : ?>
                            <span class="side-cart-item__name"><?php echo esc_html($name); ?></span>
                        <?php endif; ?>

                        <?php if ($item_data) : ?>
                            <div class="side-cart-item__meta"><?php echo wp_kses_post($item_data); ?></div>
                        <?php endif; ?>

                        <div class="side-cart-item__row">
                            <div class="side-cart-item__qty"<?php echo $max_qty > 0 ? ' data-max="' . esc_attr($max_qty) . '"' : ''; ?>>
                                <button type="button" class="side-cart-item__qty-btn" data-qty-action="decrease" aria-label="<?php esc_attr_e('Decrease quantity', 'dawp'); ?>">&minus;</button>
                                <input
                                    type="number"
                                    class="side-cart-item__qty-input"
                                    value="<?php echo esc_attr($cart_item['quantity']); ?>"
                                    min="1"
                                    <?php echo $max_qty > 0 ? 'max="' . esc_attr($max_qty) . '"' : ''; ?>
                                    inputmode="numeric"
                                    aria-label="<?php esc_attr_e('Quantity', 'dawp'); ?>"
                                >
                                <button type="button" class="side-cart-item__qty-btn" data-qty-action="increase" aria-label="<?php esc_attr_e('Increase quantity', 'dawp'); ?>">+</button>
                            </div>
                            <span class="side-cart-item__price"><?php echo wp_kses_post($price_html); ?></span>
                        </div>
                    </div>

                    <button type="button" class="side-cart-item__remove" aria-label="<?php echo esc_attr(sprintf(__('Remove %s', 'dawp'), $name)); ?>">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 6 6 18M6 6l12 12"/></svg>
                    </button>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
    <?php
}

/**
 * Drawer shell, printed once in wp_footer. The item list, subtotal and badge
 * inside it are re-rendered piecemeal afterwards via fragments.
 */
add_action('wp_footer', 'dawp_side_cart_markup');
function dawp_side_cart_markup() {
    if (!function_exists('WC') || is_admin()) {
        return;
    }

    $count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
    ?>
    <div
        id="side-cart"
        class="side-cart"
        aria-hidden="true"
        data-ajax-url="<?php echo esc_url(admin_url('admin-ajax.php')); ?>"
        data-wc-ajax-base="<?php echo esc_url(home_url('/')); ?>"
        data-nonce="<?php echo esc_attr(wp_create_nonce('dawp_side_cart')); ?>"
    >
        <div class="side-cart__overlay" data-side-cart-close></div>
        <div class="side-cart__panel" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e('Shopping cart', 'dawp'); ?>">
            <div class="side-cart__header">
                <h2 class="side-cart__title">
                    <?php esc_html_e('Your Cart', 'dawp'); ?>
                    <span class="side-cart__count">(<?php echo (int) $count; ?>)</span>
                </h2>
                <button type="button" class="side-cart__close" data-side-cart-close aria-label="<?php esc_attr_e('Close cart', 'dawp'); ?>">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 6 6 18M6 6l12 12"/></svg>
                </button>
            </div>

            <div class="side-cart__body">
                <?php dawp_side_cart_render_items(); ?>
            </div>

            <div class="side-cart__footer">
                <div class="side-cart__subtotal-row">
                    <span><?php esc_html_e('Subtotal', 'dawp'); ?></span>
                    <span class="side-cart__subtotal-value"><?php echo WC()->cart ? WC()->cart->get_cart_subtotal() : ''; ?></span>
                </div>
                <a href="<?php echo esc_url(wc_get_checkout_url()); ?>" class="side-cart__checkout-btn"><?php esc_html_e('Checkout', 'dawp'); ?></a>
                <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="side-cart__view-cart-link"><?php esc_html_e('View Cart', 'dawp'); ?></a>
            </div>
        </div>
    </div>
    <?php
}

/**
 * Fragments consumed by wc-ajax=add_to_cart, wc-ajax=remove_from_cart and our
 * own dawp_side_cart_update_qty action — keeps the drawer, subtotal and
 * header badge in sync after every cart change without a page reload.
 */
add_filter('woocommerce_add_to_cart_fragments', 'dawp_side_cart_fragments');
function dawp_side_cart_fragments($fragments) {
    if (!function_exists('WC') || !WC()->cart) {
        return $fragments;
    }

    ob_start();
    dawp_side_cart_render_items();
    $fragments['.side-cart__items'] = ob_get_clean();

    $fragments['.side-cart__subtotal-value'] = '<span class="side-cart__subtotal-value">' . WC()->cart->get_cart_subtotal() . '</span>';
    $fragments['.side-cart__count']          = '<span class="side-cart__count">(' . (int) WC()->cart->get_cart_contents_count() . ')</span>';
    $fragments['.cart-count-badge']          = dawp_cart_count_badge_html(WC()->cart->get_cart_contents_count());

    return $fragments;
}

/**
 * Quantity stepper in the drawer — WooCommerce core has no AJAX endpoint for
 * this, so it's the one custom action here; add/remove reuse WC's own
 * wc-ajax handlers directly from the front end (see main.js).
 */
add_action('wp_ajax_dawp_side_cart_update_qty', 'dawp_side_cart_update_qty');
add_action('wp_ajax_nopriv_dawp_side_cart_update_qty', 'dawp_side_cart_update_qty');
function dawp_side_cart_update_qty() {
    check_ajax_referer('dawp_side_cart', 'nonce');

    if (!function_exists('WC') || !WC()->cart) {
        wp_send_json_error();
    }

    $cart_item_key = isset($_POST['cart_item_key']) ? wc_clean(wp_unslash($_POST['cart_item_key'])) : '';
    $quantity      = isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : 0;

    if (!$cart_item_key || !WC()->cart->find_product_in_cart($cart_item_key)) {
        wp_send_json_error();
    }

    if ($quantity <= 0) {
        WC()->cart->remove_cart_item($cart_item_key);
    } else {
        WC()->cart->set_quantity($cart_item_key, $quantity, true);
    }

    wp_send_json_success([
        'fragments' => apply_filters('woocommerce_add_to_cart_fragments', []),
        'cart_hash' => WC()->cart->get_cart_hash(),
    ]);
}
