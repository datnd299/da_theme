<?php
/**
 * Fallback template — also renders the Cart, Checkout and My Account pages.
 */
get_header();

$is_account  = function_exists('is_account_page') && is_account_page();
$is_cart     = function_exists('is_cart') && is_cart();
$is_checkout = function_exists('is_checkout') && is_checkout() && ! is_wc_endpoint_url('order-received');

$heroes = [
    'account'  => ['title' => 'My Account', 'eyebrow' => 'Customer area', 'lead' => 'Orders, tracking links, saved addresses and account details in one place.', 'image' => 'assets/img/hero/support-hero.jpg'],
    'cart'     => ['title' => 'Your Cart', 'eyebrow' => 'Free ground shipping', 'lead' => 'Review sizes and quantities before checkout. Most drivers replace tires in sets of four, or in pairs per axle.', 'image' => 'assets/img/hero/shop-hero.jpg'],
    'checkout' => ['title' => 'Secure Checkout', 'eyebrow' => 'Encrypted payment', 'lead' => 'Shipping to an installer? Enter the shop’s name and address as your shipping address.', 'image' => 'assets/img/hero/tracking-hero.jpg'],
];
$hero = $is_account ? 'account' : ($is_cart ? 'cart' : ($is_checkout ? 'checkout' : ''));

$main_class = $is_account ? 'account-page' : 'woo-page' . ($is_cart ? ' cart-page' : '') . ($is_checkout ? ' checkout-page' : '');
?>
<main id="primary" class="<?php echo esc_attr($main_class); ?>">
    <?php
    if ($hero) {
        dawp_page_hero($heroes[$hero] + ['crumb' => $heroes[$hero]['title']]);
    }
    ?>
    <div class="<?php echo $is_account ? 'account-page__container' : 'mz-container woo-page__container'; ?>">
        <?php
        while (have_posts()) {
            the_post();
            the_content();
        }
        ?>
    </div>
</main>
<?php
get_footer();
