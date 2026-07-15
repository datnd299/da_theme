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
$is_product_page = function_exists('is_product') && is_product();
$is_cart_page = function_exists('is_cart') && is_cart();
$container_style = $is_product_page
    ? ' style="padding-top:1.5rem; padding-bottom:4rem; min-height:60vh;"'
    : ' style="padding-top:6rem; padding-bottom:6rem; min-height:60vh;"';
$main_class = $is_account_page ? 'account-page' : 'woo-page';

if ($is_cart_page) {
    $main_class .= ' cart-page';
}
?>
<main class="<?php echo esc_attr($main_class); ?>">
    <?php if ($is_cart_page) : ?>
        <section class="cart-cover" style="--cart-cover-bg:url('<?php echo esc_url(trailingslashit(get_template_directory_uri()) . 'assets/img/hero/shop-theme-hero-background.png'); ?>')" aria-label="<?php esc_attr_e('Cart summary introduction', 'dawp'); ?>">
            <div class="cart-cover__inner">
                <nav class="cart-cover__breadcrumb" aria-label="<?php esc_attr_e('Breadcrumb', 'dawp'); ?>">
                    <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'dawp'); ?></a>
                    <span aria-hidden="true">/</span>
                    <span><?php esc_html_e('Cart', 'dawp'); ?></span>
                </nav>
                <p class="cart-cover__eyebrow"><?php esc_html_e('Secure checkout starts here', 'dawp'); ?></p>
                <h1><?php esc_html_e('Shopping Cart', 'dawp'); ?></h1>
                <p class="cart-cover__copy"><?php esc_html_e('Review your selected pieces, adjust quantities, and move to checkout when everything looks right.', 'dawp'); ?></p>
                <div class="cart-cover__notes" aria-label="<?php esc_attr_e('Shopping promises', 'dawp'); ?>">
                    <span><?php esc_html_e('Secure payment', 'dawp'); ?></span>
                    <span><?php esc_html_e('Easy order updates', 'dawp'); ?></span>
                    <span><?php esc_html_e('Support ready to help', 'dawp'); ?></span>
                </div>
            </div>
        </section>
    <?php elseif ($is_account_page) : ?>
        <section class="account-cover" style="--account-cover-bg:url('<?php echo esc_url(trailingslashit(get_template_directory_uri()) . 'assets/img/hero/support-hero-background.png'); ?>')" aria-label="<?php esc_attr_e('Account introduction', 'dawp'); ?>">
            <div class="account-cover__inner">
                <nav class="account-cover__breadcrumb" aria-label="<?php esc_attr_e('Breadcrumb', 'dawp'); ?>">
                    <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'dawp'); ?></a>
                    <span aria-hidden="true">/</span>
                    <span><?php esc_html_e('My Account', 'dawp'); ?></span>
                </nav>
                <p class="account-cover__eyebrow"><?php esc_html_e('Customer area', 'dawp'); ?></p>
                <h1><?php esc_html_e('My Account', 'dawp'); ?></h1>
                <p class="account-cover__copy"><?php esc_html_e('Manage orders, saved addresses, and account details in one secure place.', 'dawp'); ?></p>
            </div>
        </section>
    <?php endif; ?>
    <div class="<?php echo $is_account_page ? 'account-page__container' : 'container'; ?>"<?php echo $is_account_page ? '' : $container_style; ?>>
        <?php woocommerce_content(); ?>
    </div>
</main>
<?php get_footer(); ?>
