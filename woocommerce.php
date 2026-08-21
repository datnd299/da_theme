<?php
/**
 * WooCommerce master wrapper.
 *
 * WordPress routes every Woo URL through this file. Shop archives are delegated to
 * woocommerce/archive-product.php so that template's customisations apply.
 * Cart, checkout, account, and single product fall through to woocommerce_content().
 */

defined('ABSPATH') || exit;

if (is_shop() || is_product_category() || is_product_tag()) {
    include locate_template('woocommerce/archive-product.php');
    return;
}

get_header();

$is_account  = function_exists('is_account_page') && is_account_page();
$is_product  = function_exists('is_product') && is_product();
$is_cart     = function_exists('is_cart') && is_cart();
$is_checkout = function_exists('is_checkout') && is_checkout();

$main_class = 'woo-page';

if ($is_account) {
    $main_class .= ' account-page';
} elseif ($is_cart) {
    $main_class .= ' cart-page';
} elseif ($is_checkout) {
    $main_class .= ' checkout-page';
} elseif ($is_product) {
    $main_class .= ' single-product-page';
}

/**
 * Cart, checkout, and account get a plain brand cover. The single product page
 * opens straight into the gallery, so it gets none.
 */
$cover = null;

if ($is_cart) {
    $cover = [
        'crumb'   => __('Cart', 'dawp'),
        'eyebrow' => __('Your selection', 'dawp'),
        'title'   => __('Cart', 'dawp'),
        'copy'    => __('Review your selection before checkout. Shipping is complimentary and insured on every order.', 'dawp'),
    ];
} elseif ($is_checkout) {
    $cover = [
        'crumb'   => __('Checkout', 'dawp'),
        'eyebrow' => __('Secure checkout', 'dawp'),
        'title'   => __('Checkout', 'dawp'),
        'copy'    => __('Payment is processed by our provider over an encrypted connection. We never see your card number.', 'dawp'),
    ];
} elseif ($is_account) {
    $cover = [
        'crumb'   => __('My Account', 'dawp'),
        'eyebrow' => __('Client area', 'dawp'),
        'title'   => __('My Account', 'dawp'),
        'copy'    => __('Your orders, addresses, and the service record for every watch you own.', 'dawp'),
    ];
}
?>
<main class="<?php echo esc_attr($main_class); ?>">

    <?php if ($cover) : ?>
        <section class="woo-cover" aria-label="<?php echo esc_attr($cover['title']); ?>">
            <div class="container">
                <nav class="woo-cover__breadcrumb" aria-label="<?php esc_attr_e('Breadcrumb', 'dawp'); ?>">
                    <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'dawp'); ?></a>
                    <span aria-hidden="true">/</span>
                    <span><?php echo esc_html($cover['crumb']); ?></span>
                </nav>
                <span class="c-rule" aria-hidden="true"></span>
                <p class="c-eyebrow"><?php echo esc_html($cover['eyebrow']); ?></p>
                <h1><?php echo esc_html($cover['title']); ?></h1>
                <p class="woo-cover__copy"><?php echo esc_html($cover['copy']); ?></p>
            </div>
        </section>
    <?php endif; ?>

    <div class="container woo-page__body">
        <?php woocommerce_content(); ?>
    </div>
</main>
<?php get_footer(); ?>
