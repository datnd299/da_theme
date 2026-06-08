<?php
/**
 * My Account dashboard.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

defined('ABSPATH') || exit;

$current_user = wp_get_current_user();
$orders_url   = wc_get_endpoint_url('orders');
$address_url  = wc_get_endpoint_url('edit-address');
$details_url  = wc_get_endpoint_url('edit-account');
?>

<div class="slick-account-dashboard">
    <section class="slick-account-welcome" aria-labelledby="slick-account-welcome-title">
        <p class="slick-account-kicker"><?php esc_html_e('Account Overview', 'dawp'); ?></p>
        <h2 id="slick-account-welcome-title">
            <?php
            printf(
                /* translators: %s: customer display name */
                esc_html__('Welcome back, %s', 'dawp'),
                esc_html($current_user->display_name)
            );
            ?>
        </h2>
        <p>
            <?php esc_html_e('Track recent orders, manage your saved addresses, and keep your account details up to date from one place.', 'dawp'); ?>
        </p>
    </section>

    <div class="slick-account-actions" aria-label="<?php esc_attr_e('Account shortcuts', 'dawp'); ?>">
        <a class="slick-account-action" href="<?php echo esc_url($orders_url); ?>">
            <span><?php esc_html_e('Orders', 'dawp'); ?></span>
            <small><?php esc_html_e('View order history and status', 'dawp'); ?></small>
        </a>
        <a class="slick-account-action" href="<?php echo esc_url($address_url); ?>">
            <span><?php esc_html_e('Addresses', 'dawp'); ?></span>
            <small><?php esc_html_e('Update billing and shipping', 'dawp'); ?></small>
        </a>
        <a class="slick-account-action" href="<?php echo esc_url($details_url); ?>">
            <span><?php esc_html_e('Account Details', 'dawp'); ?></span>
            <small><?php esc_html_e('Edit profile and password', 'dawp'); ?></small>
        </a>
    </div>
</div>

<?php
/**
 * My Account dashboard hook.
 *
 * @since 2.6.0
 */
do_action('woocommerce_account_dashboard');
