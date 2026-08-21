<?php
/**
 * Additions for the WooCommerce empty-cart block (.cart-empty-* in
 * assets/css/cart.css) and for the header side cart (.side-cart in
 * assets/css/main.css).
 */

defined('ABSPATH') || exit;

/* =============================================================
   SIDE CART — quantity stepper
   The stepper replaces the mini-cart's "2 × $120" line, so it is
   rebuilt with every fragment refresh. Driven by assets/js/main.js.
   ============================================================= */

add_filter('woocommerce_widget_cart_item_quantity', 'dawp_mini_cart_item_quantity', 10, 3);

function dawp_mini_cart_item_quantity($html, $cart_item, $cart_item_key) {
    $product = isset($cart_item['data']) ? $cart_item['data'] : null;

    if (! $product instanceof WC_Product) {
        return $html;
    }

    $quantity = isset($cart_item['quantity']) ? (int) $cart_item['quantity'] : 0;
    $min      = max(1, (int) $product->get_min_purchase_quantity());
    $max      = (int) $product->get_max_purchase_quantity(); // -1 when unlimited.

    ob_start();
    ?>
    <span class="side-cart-qty" data-cart-item="<?php echo esc_attr($cart_item_key); ?>">
        <span class="side-cart-qty__control">
            <button type="button" class="side-cart-qty__btn" data-cart-qty-step="-1" aria-label="<?php esc_attr_e('Decrease quantity', 'dawp'); ?>" <?php disabled($quantity <= $min); ?>>&minus;</button>
            <input type="number"
                   class="side-cart-qty__input"
                   value="<?php echo esc_attr($quantity); ?>"
                   min="<?php echo esc_attr($min); ?>"
                   <?php echo $max > 0 ? 'max="' . esc_attr($max) . '"' : ''; ?>
                   step="1"
                   inputmode="numeric"
                   autocomplete="off"
                   aria-label="<?php esc_attr_e('Quantity', 'dawp'); ?>"
                   data-cart-qty-input>
            <button type="button" class="side-cart-qty__btn" data-cart-qty-step="1" aria-label="<?php esc_attr_e('Increase quantity', 'dawp'); ?>" <?php disabled($max > 0 && $quantity >= $max); ?>>+</button>
        </span>
        <span class="side-cart-qty__price"><?php echo wp_kses_post(WC()->cart->get_product_subtotal($product, $quantity)); ?></span>
    </span>
    <?php
    return ob_get_clean();
}

/* =============================================================
   SIDE CART — quantity endpoint
   Registered on wc-ajax rather than admin-ajax: wc-ajax runs on the
   front end, where WooCommerce has already loaded the cart.
   ============================================================= */

add_action('wc_ajax_dawp_cart_quantity', 'dawp_ajax_cart_quantity');

function dawp_ajax_cart_quantity() {
    check_ajax_referer('dawp_cart_nonce', 'nonce');

    if (! function_exists('WC') || ! WC()->cart) {
        wp_send_json_error(['message' => __('The cart is unavailable.', 'dawp')], 500);
    }

    $cart_item_key = isset($_POST['cart_item_key']) ? wc_clean(wp_unslash($_POST['cart_item_key'])) : '';
    $cart_item     = $cart_item_key ? WC()->cart->get_cart_item($cart_item_key) : null;

    if (empty($cart_item)) {
        wp_send_json_error(['message' => __('That item is no longer in your cart.', 'dawp')], 404);
    }

    $requested = isset($_POST['quantity']) ? (int) wc_stock_amount(wp_unslash($_POST['quantity'])) : 0;
    $product   = $cart_item['data'];
    $notice    = '';
    $quantity  = max(0, $requested);

    if ($quantity > 0 && $product instanceof WC_Product) {
        $min = max(1, (int) $product->get_min_purchase_quantity());
        $max = (int) $product->get_max_purchase_quantity();

        if ($quantity < $min) {
            $quantity = $min;
        }

        if ($max > 0 && $quantity > $max) {
            $quantity = $max;
            $notice   = sprintf(
                /* translators: %s: maximum quantity available */
                __('Only %s available.', 'dawp'),
                $max
            );
        }
    }

    WC()->cart->set_quantity($cart_item_key, $quantity, true);

    wp_send_json(dawp_cart_fragments_response($notice));
}

/**
 * Mirrors the payload shape of WC_AJAX::get_refreshed_fragments so the
 * response can be handed straight to WooCommerce's fragment handling.
 */
function dawp_cart_fragments_response($notice = '') {
    ob_start();
    woocommerce_mini_cart();
    $mini_cart = ob_get_clean();

    return [
        'fragments' => apply_filters(
            'woocommerce_add_to_cart_fragments',
            ['div.widget_shopping_cart_content' => '<div class="widget_shopping_cart_content">' . $mini_cart . '</div>']
        ),
        'cart_hash' => WC()->cart->get_cart_hash(),
        'notice'    => $notice,
    ];
}

add_filter('render_block', 'dawp_enhance_empty_cart_block', 10, 2);

function dawp_enhance_empty_cart_block($block_content, $block) {
    $empty_cart_blocks = ['woocommerce/empty-cart', 'woocommerce/empty-cart-block'];

    if (empty($block['blockName']) || ! in_array($block['blockName'], $empty_cart_blocks, true)) {
        return $block_content;
    }

    // Replace the inner blocks only: the block's own empty state repeats the
    // same message and pulls in an unstyled "New in store" grid.
    //
    // The Cart block's React frontend walks the DOM children of
    // .wp-block-woocommerce-cart and matches each one to a component through
    // its data-block-name attribute (added by WooCommerce on this same
    // render_block filter). Only the mapped empty-cart component knows to
    // return null while the cart holds items — anything without that wrapper
    // is kept as static markup and stays visible on a filled cart. So swap the
    // contents and hand the original wrapper element back untouched.
    $inner = dawp_render_empty_cart_intro() . dawp_render_empty_cart_extras();

    if (preg_match('#^(\s*<([a-z0-9-]+)\b[^>]*>)(.*)(</\2>\s*)$#is', $block_content, $wrapper)) {
        return $wrapper[1] . $inner . $wrapper[4];
    }

    return $block_content;
}

function dawp_shop_permalink() {
    return function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
}

function dawp_render_empty_cart_intro() {
    ob_start();
    ?>
    <section class="cart-empty-intro" aria-label="<?php esc_attr_e('Empty cart', 'dawp'); ?>">
        <div class="cart-empty-intro__copy">
            <span class="c-rule" aria-hidden="true"></span>
            <span class="cart-empty-intro__eyebrow"><?php esc_html_e('Nothing selected', 'dawp'); ?></span>
            <h1><?php esc_html_e('Your cart is empty.', 'dawp'); ?></h1>
            <p><?php esc_html_e('Four collections, each built on the same carefully selected automatic calibre. Take your time.', 'dawp'); ?></p>
            <div class="cart-empty-intro__actions">
                <a class="c-btn" href="<?php echo esc_url(dawp_shop_permalink()); ?>"><?php esc_html_e('All watches', 'dawp'); ?></a>
            </div>
        </div>
        <ul class="cart-empty-intro__panel">
            <li><?php esc_html_e('Complimentary insured shipping', 'dawp'); ?></li>
            <li><?php esc_html_e('Five-year movement warranty', 'dawp'); ?></li>
            <li><?php esc_html_e('30 days to return an unworn watch', 'dawp'); ?></li>
            <li><?php esc_html_e('Lifetime service programme', 'dawp'); ?></li>
        </ul>
    </section>
    <?php
    return ob_get_clean();
}

function dawp_render_empty_cart_extras() {
    $products = [];

    if (function_exists('wc_get_products')) {
        $products = wc_get_products([
            'status'     => 'publish',
            'limit'      => 4,
            'orderby'    => 'meta_value_num',
            'order'      => 'DESC',
            'meta_key'   => 'total_sales',
            'visibility' => 'catalog',
        ]);

        if (empty($products)) {
            $products = wc_get_products([
                'status'     => 'publish',
                'limit'      => 4,
                'orderby'    => 'date',
                'order'      => 'DESC',
                'visibility' => 'catalog',
            ]);
        }
    }

    if (empty($products)) {
        return '';
    }

    ob_start();
    ?>
    <section class="cart-empty-extras" aria-label="<?php esc_attr_e('Suggested watches', 'dawp'); ?>">
        <div class="cart-empty-section-head">
            <span><?php esc_html_e('Most often chosen', 'dawp'); ?></span>
            <a class="c-link" href="<?php echo esc_url(dawp_shop_permalink()); ?>"><?php esc_html_e('All watches', 'dawp'); ?></a>
        </div>

        <div class="cart-empty-product-grid">
            <?php
            foreach ($products as $product) :
                if (! $product instanceof WC_Product) {
                    continue;
                }
                ?>
                <article class="cart-empty-product">
                    <a class="cart-empty-product__link" href="<?php echo esc_url(get_permalink($product->get_id())); ?>">
                        <span class="cart-empty-product__image">
                            <?php echo wp_kses_post($product->get_image('woocommerce_thumbnail')); ?>
                        </span>
                        <span class="cart-empty-product__body">
                            <span class="cart-empty-product__name"><?php echo esc_html($product->get_name()); ?></span>
                            <span class="cart-empty-product__price"><?php echo wp_kses_post($product->get_price_html()); ?></span>
                        </span>
                    </a>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
