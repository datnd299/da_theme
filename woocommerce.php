<?php
/**
 * WooCommerce master wrapper.
 *
 * WP uses this file for ALL Woo URLs. We route shop archives to
 * woocommerce/archive-product.php ourselves so that file's customisations apply.
 * Cart / Checkout / My Account fall through to woocommerce_content().
 */
if (is_shop() || is_product_category() || is_product_tag()) {
    // Delegate to our custom archive override
    include(locate_template('woocommerce/archive-product.php'));
    return;
}

get_header();
?>
<main class="woo-page">
    <div class="container" style="padding-top:6rem; padding-bottom:6rem; min-height:60vh;">
        <?php if (is_checkout() && ! is_order_received_page()) : ?>
            <header class="checkout-page-title">
                <p class="checkout-page-title__eyebrow"><?php esc_html_e('Secure checkout', 'dawp'); ?></p>
                <h1><?php esc_html_e('Check Out', 'dawp'); ?></h1>
            </header>
        <?php endif; ?>
        <?php woocommerce_content(); ?>
    </div>
</main>
<?php get_footer(); ?>
