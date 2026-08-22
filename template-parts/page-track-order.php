<?php
/**
 * Track order page.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

?>

<div class="track-order-page">
    <section class="track-hero" aria-labelledby="track-order-title">
        <div class="track-hero__inner">
            <div class="track-hero__copy">
                <p class="track-eyebrow"><?php esc_html_e('Order Tracking', 'dawp'); ?></p>
                <h1 id="track-order-title" class="track-hero__title"><?php esc_html_e('Track Your Order', 'dawp'); ?></h1>
                <p class="track-hero__desc">
                    <?php esc_html_e('Enter your order ID and billing email to check the latest status for your chronelshop.com purchase.', 'dawp'); ?>
                </p>
                <div class="track-hero__meta" aria-label="<?php esc_attr_e('Tracking essentials', 'dawp'); ?>">
                    <span><?php esc_html_e('Secure lookup', 'dawp'); ?></span>
                    <span><?php esc_html_e('Dispatch updates', 'dawp'); ?></span>
                    <span><?php esc_html_e('Order support', 'dawp'); ?></span>
                </div>
            </div>

            <div id="track-order-form" class="track-form-card">
                <div class="track-form-card__head">
                    <p class="track-eyebrow"><?php esc_html_e('Lookup', 'dawp'); ?></p>
                    <h2><?php esc_html_e('Find Your Order', 'dawp'); ?></h2>
                    <p><?php esc_html_e('Use the order ID from your confirmation email and the billing email used at checkout.', 'dawp'); ?></p>
                </div>
                <div class="track-form-card__body">
                    <?php echo do_shortcode('[woocommerce_order_tracking]'); ?>
                </div>
            </div>
        </div>
    </section>

</div>
