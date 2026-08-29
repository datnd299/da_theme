<?php
/**
 * Lightweight additions for WooCommerce cart pages.
 */

add_filter('render_block', 'dawp_enhance_empty_cart_block', 10, 2);

function dawp_enhance_empty_cart_block($block_content, $block) {
    $empty_cart_blocks = ['woocommerce/empty-cart', 'woocommerce/empty-cart-block'];

    if (empty($block['blockName']) || !in_array($block['blockName'], $empty_cart_blocks, true)) {
        return $block_content;
    }

    return dawp_render_empty_cart_intro() . $block_content . dawp_render_empty_cart_extras();
}

function dawp_render_empty_cart_intro() {
    $shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');

    ob_start();
    ?>
    <section class="cart-empty-intro" aria-label="<?php esc_attr_e('Cart inspiration', 'dawp'); ?>">
        <div class="cart-empty-intro__copy">
            <span class="cart-empty-intro__eyebrow"><?php esc_html_e('Ready when you are', 'dawp'); ?></span>
            <h1><?php esc_html_e('Build your everyday rotation.', 'dawp'); ?></h1>
            <p><?php esc_html_e('Browse new arrivals and best sellers, then come back to checkout whenever you are ready.', 'dawp'); ?></p>
            <a class="cart-empty-intro__button" href="<?php echo esc_url($shop_url); ?>">
                <?php esc_html_e('Start shopping', 'dawp'); ?>
            </a>
        </div>
        <div class="cart-empty-intro__panel" aria-hidden="true">
            <div class="cart-empty-intro__row">
                <span><?php esc_html_e('Subtotal', 'dawp'); ?></span>
                <strong><?php
                    $cart_subtotal = (function_exists('WC') && WC()->cart) ? WC()->cart->get_subtotal() : 0;
                    echo wp_kses_post(function_exists('wc_price') ? wc_price($cart_subtotal) : '$0.00');
                ?></strong>
            </div>
            <div class="cart-empty-intro__line"></div>
            <div class="cart-empty-intro__chips">
                <span><?php esc_html_e('Secure checkout', 'dawp'); ?></span>
                <span><?php esc_html_e('Easy returns', 'dawp'); ?></span>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

function dawp_render_empty_cart_extras() {
    $best_sellers = function_exists('wc_get_products') ? wc_get_products([
        'status'     => 'publish',
        'limit'      => 4,
        'orderby'    => 'meta_value_num',
        'order'      => 'DESC',
        'meta_key'   => 'total_sales',
        'visibility' => 'catalog',
    ]) : [];

    if (empty($best_sellers) && function_exists('wc_get_products')) {
        $best_sellers = wc_get_products([
            'status'     => 'publish',
            'limit'      => 4,
            'orderby'    => 'date',
            'order'      => 'DESC',
            'visibility' => 'catalog',
        ]);
    }

    ob_start();
    ?>
    <section class="cart-empty-extras" aria-label="<?php esc_attr_e('Helpful shopping links', 'dawp'); ?>">
        <?php if (!empty($best_sellers)) : ?>
            <div class="cart-empty-recommendations">
                <div class="cart-empty-section-head">
                    <span><?php esc_html_e('You may also like', 'dawp'); ?></span>
                    <a href="<?php echo esc_url(function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/')); ?>">
                        <?php esc_html_e('View all', 'dawp'); ?>
                    </a>
                </div>
                <div class="cart-empty-product-grid">
                    <?php foreach ($best_sellers as $product) : ?>
                        <?php
                        if (!$product instanceof WC_Product) {
                            continue;
                        }

                        $product_id = $product->get_id();
                        ?>
                        <article class="cart-empty-product">
                            <a class="cart-empty-product__link" href="<?php echo esc_url(get_permalink($product_id)); ?>">
                                <span class="cart-empty-product__image">
                                    <?php echo wp_kses_post($product->get_image('woocommerce_thumbnail')); ?>
                                </span>
                                <span class="cart-empty-product__body">
                                    <span class="cart-empty-product__name"><?php echo esc_html($product->get_name()); ?></span>
                                    <span class="cart-empty-product__price"><?php echo wp_kses_post($product->get_price_html()); ?></span>
                                </span>
                            </a>
                            <a class="cart-empty-product__button add_to_cart_button<?php echo $product->supports('ajax_add_to_cart') ? ' ajax_add_to_cart' : ''; ?>" href="<?php echo esc_url($product->add_to_cart_url()); ?>" data-quantity="1" data-product_id="<?php echo esc_attr($product_id); ?>" data-product_sku="<?php echo esc_attr($product->get_sku()); ?>" aria-label="<?php echo esc_attr($product->add_to_cart_description()); ?>" rel="nofollow">
                                <?php echo esc_html($product->add_to_cart_text()); ?>
                            </a>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="cart-empty-promises">
            <div>
                <span><?php esc_html_e('Fast packing', 'dawp'); ?></span>
                <p><?php esc_html_e('Orders are prepared carefully so your pieces leave the store in good shape.', 'dawp'); ?></p>
            </div>
            <div>
                <span><?php esc_html_e('Flexible payment', 'dawp'); ?></span>
                <p><?php esc_html_e('Checkout supports WooCommerce payment methods configured for the store.', 'dawp'); ?></p>
            </div>
            <div>
                <span><?php esc_html_e('Real product links', 'dawp'); ?></span>
                <p><?php esc_html_e('Recommendations and categories update automatically from your product catalog.', 'dawp'); ?></p>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
