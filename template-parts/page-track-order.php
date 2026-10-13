<?php
/**
 * Template Part: Track Your Order
 */

$support_email = 'support@Mytire.co';
$track_order_url = home_url('/track-order/');
$track_order_found = false;

if (function_exists('wc_get_order')) {
    $nonce_value = isset($_REQUEST['woocommerce-order-tracking-nonce'])
        ? wp_unslash($_REQUEST['woocommerce-order-tracking-nonce'])
        : (isset($_REQUEST['_wpnonce']) ? wp_unslash($_REQUEST['_wpnonce']) : '');

    if (isset($_REQUEST['orderid']) && wp_verify_nonce($nonce_value, 'woocommerce-order_tracking')) {
        $posted_order_id = function_exists('wc_clean')
            ? wc_clean(wp_unslash($_REQUEST['orderid']))
            : sanitize_text_field(wp_unslash($_REQUEST['orderid']));
        $posted_order_id = ltrim($posted_order_id, '#');
        $posted_order_id = apply_filters('woocommerce_shortcode_order_tracking_order_id', $posted_order_id);
        $posted_order_email = isset($_REQUEST['order_email']) ? sanitize_email(wp_unslash($_REQUEST['order_email'])) : '';
        $posted_order = $posted_order_id ? wc_get_order($posted_order_id) : false;

        $track_order_found = $posted_order
            && is_a($posted_order, 'WC_Order')
            && strtolower($posted_order->get_billing_email()) === strtolower($posted_order_email);
    }
}

$track_order_form = do_shortcode('[woocommerce_order_tracking]');

if ($track_order_form) {
    $track_order_form = preg_replace(
        '/(<form\b[^>]*\bclass="[^"]*\btrack_order\b[^"]*"[^>]*\baction=")[^"]*(")/i',
        '$1' . esc_url($track_order_url) . '$2',
        $track_order_form
    );
}
?>

<div id="primary" class="track-order-page">

    <section class="track-hero">
        <div class="track-hero__inner">
            <div class="track-hero__copy">
                <span class="track-hero__label"><?php esc_html_e('Mytire Order Status', 'dawp'); ?></span>
                <h1 class="track-hero__title"><?php esc_html_e('Track Your Order', 'dawp'); ?></h1>
                <p class="track-hero__desc">
                    <?php esc_html_e('Enter your order number and billing email to review the latest tire order details available from Mytire.', 'dawp'); ?>
                </p>
            </div>

            <div class="track-form-card track-form-card--hero">
                <div class="track-form-card__header">
                    <span><?php esc_html_e('Tracking Lookup', 'dawp'); ?></span>
                    <h2><?php esc_html_e('Find your order', 'dawp'); ?></h2>
                </div>
                <div class="track-form-card__body">
                    <?php echo $track_order_form; ?>
                    <?php if ($track_order_found) : ?>
                        <a href="<?php echo esc_url($track_order_url); ?>" class="track-back-button">
                            <?php esc_html_e('Track another order', 'dawp'); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="track-support-section">
        <p>
            <?php esc_html_e('Need help? Email ', 'dawp'); ?>
            <a href="<?php echo esc_url('mailto:' . $support_email); ?>"><?php echo esc_html($support_email); ?></a>
            <?php esc_html_e(' with your order number.', 'dawp'); ?>
        </p>
    </section>

</div>
