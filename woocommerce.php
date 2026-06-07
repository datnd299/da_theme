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
$is_account_page = function_exists('is_account_page') && is_account_page();
?>
<main class="<?php echo $is_account_page ? 'account-page' : 'woo-page'; ?>">
    <div class="<?php echo $is_account_page ? 'account-page__container' : 'container'; ?>"<?php echo $is_account_page ? '' : ' style="padding-top:6rem; padding-bottom:6rem; min-height:60vh;"'; ?>>
        <?php woocommerce_content(); ?>
    </div>
</main>
<?php get_footer(); ?>
