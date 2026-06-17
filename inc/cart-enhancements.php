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
            <h1><?php esc_html_e('Build your next everyday rotation.', 'dawp'); ?></h1>
            <p><?php esc_html_e('Browse fresh arrivals, save your favorites, and come back to checkout whenever the fit feels right.', 'dawp'); ?></p>
            <a class="cart-empty-intro__button" href="<?php echo esc_url($shop_url); ?>">
                <?php esc_html_e('Start shopping', 'dawp'); ?>
            </a>
        </div>
        <div class="cart-empty-intro__panel" aria-hidden="true">
            <div class="cart-empty-intro__row">
                <span><?php esc_html_e('Subtotal', 'dawp'); ?></span>
                <strong><?php echo wp_kses_post(function_exists('wc_price') ? wc_price(0) : '$0.00'); ?></strong>
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
    $categories = get_terms([
        'taxonomy'   => 'product_cat',
        'hide_empty' => true,
        'number'     => 3,
        'orderby'    => 'count',
        'order'      => 'DESC',
    ]);

    ob_start();
    ?>
    <section class="cart-empty-extras" aria-label="<?php esc_attr_e('Helpful shopping links', 'dawp'); ?>">
        <?php if (!is_wp_error($categories) && !empty($categories)) : ?>
            <div class="cart-empty-categories">
                <div class="cart-empty-section-head">
                    <span><?php esc_html_e('Shop by category', 'dawp'); ?></span>
                    <a href="<?php echo esc_url(function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/')); ?>">
                        <?php esc_html_e('View all', 'dawp'); ?>
                    </a>
                </div>
                <div class="cart-empty-category-grid">
                    <?php foreach ($categories as $category) : ?>
                        <a class="cart-empty-category" href="<?php echo esc_url(get_term_link($category)); ?>">
                            <span><?php echo esc_html($category->name); ?></span>
                            <small>
                                <?php
                                printf(
                                    esc_html(_n('%s item', '%s items', (int) $category->count, 'dawp')),
                                    esc_html(number_format_i18n((int) $category->count))
                                );
                                ?>
                            </small>
                        </a>
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
