<?php
/**
 * WooCommerce master wrapper — MozTire.
 *
 * Shop, brand, category and attribute archives use woocommerce/archive-product.php.
 * Product / Cart / Checkout / My Account fall through to woocommerce_content().
 */
if (is_shop() || is_product_taxonomy()) {
    include locate_template('woocommerce/archive-product.php');
    return;
}

get_header();

$is_account = function_exists('is_account_page') && is_account_page();
$is_product = function_exists('is_product') && is_product();
$main_class = $is_account ? 'account-page' : 'woo-page';
?>
<main id="primary" class="<?php echo esc_attr($main_class); ?>">
    <div class="<?php echo $is_account ? 'account-page__container' : 'mz-container woo-page__container' . ($is_product ? ' woo-page__container--product' : ''); ?>">
        <?php woocommerce_content(); ?>
    </div>
</main>
<?php get_footer(); ?>
