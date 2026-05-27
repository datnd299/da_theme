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
<main class="woo-page<?php echo $is_account_page ? ' woo-account-page' : ''; ?>">
    <div class="container" style="padding-top:6rem; padding-bottom:6rem; min-height:60vh;">
        <?php if ($is_account_page) : ?>
            <header class="woo-account-hero">
                <p class="woo-account-kicker"><?php esc_html_e('Customer area', 'dawp'); ?></p>
                <h1><?php esc_html_e('My Account', 'dawp'); ?></h1>
                <p><?php esc_html_e('Manage orders, addresses, account details, and support information in one place.', 'dawp'); ?></p>
            </header>
        <?php endif; ?>
        <?php woocommerce_content(); ?>
    </div>
</main>
<?php get_footer(); ?>
