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
$is_cart_page = function_exists('is_cart') && is_cart();
$is_checkout_page = function_exists('is_checkout') && is_checkout();
$container_class = 'container woo-page__container' . ($is_cart_page ? ' woo-page__container--cart' : '') . ($is_checkout_page ? ' woo-page__container--checkout' : '');
$container_style = '';

if (!$is_cart_page) {
    $container_style = $is_checkout_page
        ? ' style="padding-top:1.5rem; padding-bottom:4rem; min-height:60vh;"'
        : ' style="padding-top:6rem; padding-bottom:6rem; min-height:60vh;"';
}
?>
<main class="woo-page<?php echo $is_cart_page ? ' woo-page--cart' : ''; ?>">
    <div class="<?php echo esc_attr($container_class); ?>"<?php echo $container_style; ?>>
        <?php woocommerce_content(); ?>
    </div>
</main>
<?php get_footer(); ?>
