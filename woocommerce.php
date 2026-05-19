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
$is_checkout_page = function_exists('is_checkout') && is_checkout() && ! is_order_received_page();
$queried_post = get_post();

if (! $is_checkout_page && $queried_post instanceof WP_Post) {
    $is_checkout_page = is_page('checkout') || has_shortcode($queried_post->post_content, 'woocommerce_checkout');
}
?>
<main class="woo-page">
    <div class="container" style="padding-top:6rem; padding-bottom:6rem; min-height:60vh;">
        <?php if ($is_checkout_page) : ?>
            <header class="checkout-page-title">
                <h1><?php esc_html_e('Check Out', 'dawp'); ?></h1>
            </header>
        <?php endif; ?>
        <?php woocommerce_content(); ?>
    </div>
</main>
<?php get_footer(); ?>
