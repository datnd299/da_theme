<?php
/**
 * Template Part: Track Your Order
 */

$support_email = 'support@brogeshoes.com';
$support_hours = __('Monday-Friday, 9:00 AM-5:00 PM PST', 'dawp');
?>

<section class="track-order-page">
    <div class="track-shell">
        <header class="track-hero" aria-labelledby="track-order-title">
            <div class="track-hero__copy">
                <span class="track-kicker"><?php esc_html_e('Order Tracking', 'dawp'); ?></span>
                <h1 id="track-order-title" class="track-hero__title"><?php esc_html_e('Track your Broge Shoes order.', 'dawp'); ?></h1>
                <p class="track-hero__desc">
                    <?php esc_html_e('Use the order number and billing email from your confirmation email to check the latest available status for your shipment.', 'dawp'); ?>
                </p>
            </div>

            <div class="track-hero__status" aria-label="<?php esc_attr_e('Order support summary', 'dawp'); ?>">
                <div>
                    <span><?php esc_html_e('Handling', 'dawp'); ?></span>
                    <strong><?php esc_html_e('1-2 business days', 'dawp'); ?></strong>
                </div>
                <div>
                    <span><?php esc_html_e('Transit', 'dawp'); ?></span>
                    <strong><?php esc_html_e('5-7 business days', 'dawp'); ?></strong>
                </div>
            </div>
        </header>

        <div class="track-workspace">
            <div class="track-panel track-panel--form">
                <div class="track-panel__header">
                    <span class="track-panel__icon" aria-hidden="true">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10H3"></path><path d="M7 15h.01"></path><path d="M11 15h2"></path><rect width="18" height="14" x="3" y="5" rx="2"></rect></svg>
                    </span>
                    <div>
                        <h2><?php esc_html_e('Enter order details', 'dawp'); ?></h2>
                        <p><?php esc_html_e('Both fields are required so we can match your order securely.', 'dawp'); ?></p>
                    </div>
                </div>

                <div class="track-form-card">
                    <?php echo do_shortcode('[woocommerce_order_tracking]'); ?>
                </div>
            </div>

            <aside class="track-panel track-panel--support" aria-labelledby="track-support-title">
                <div class="track-support-card">
                    <span class="track-panel__icon" aria-hidden="true">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a4 4 0 0 1-4 4H8l-5 3V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4z"></path></svg>
                    </span>
                    <h2 id="track-support-title"><?php esc_html_e('Need tracking help?', 'dawp'); ?></h2>
                    <p>
                        <?php esc_html_e('If your order status is unclear, contact our support team with your order number and shipping address.', 'dawp'); ?>
                    </p>
                    <a class="track-support-card__email" href="mailto:<?php echo esc_attr($support_email); ?>">
                        <?php echo esc_html($support_email); ?>
                    </a>
                    <a class="track-button track-button--secondary" href="<?php echo esc_url(home_url('/contact-us/')); ?>">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>
                    <p class="track-support-card__hours"><?php echo esc_html($support_hours); ?></p>
                </div>

                <ol class="track-timeline" aria-label="<?php esc_attr_e('Typical order timeline', 'dawp'); ?>">
                    <li>
                        <span></span>
                        <div>
                            <strong><?php esc_html_e('Order confirmed', 'dawp'); ?></strong>
                            <p><?php esc_html_e('A confirmation email is sent after checkout.', 'dawp'); ?></p>
                        </div>
                    </li>
                    <li>
                        <span></span>
                        <div>
                            <strong><?php esc_html_e('Prepared for shipment', 'dawp'); ?></strong>
                            <p><?php esc_html_e('Most orders are handled within 1-2 business days.', 'dawp'); ?></p>
                        </div>
                    </li>
                    <li>
                        <span></span>
                        <div>
                            <strong><?php esc_html_e('Tracking updates', 'dawp'); ?></strong>
                            <p><?php esc_html_e('Carrier scans may take time to appear after handoff.', 'dawp'); ?></p>
                        </div>
                    </li>
                </ol>
            </aside>
        </div>

        <div class="track-resources" aria-labelledby="track-resources-title">
            <div class="track-resources__header">
                <span class="track-kicker"><?php esc_html_e('Customer Care', 'dawp'); ?></span>
                <h2 id="track-resources-title"><?php esc_html_e('Useful order links', 'dawp'); ?></h2>
            </div>

            <div class="track-resource-grid">
                <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>" class="track-resource-card">
                    <span><?php esc_html_e('Shipping', 'dawp'); ?></span>
                    <strong><?php esc_html_e('Delivery timelines and carrier notes', 'dawp'); ?></strong>
                </a>
                <a href="<?php echo esc_url(home_url('/refund-return-policy/')); ?>" class="track-resource-card">
                    <span><?php esc_html_e('Returns', 'dawp'); ?></span>
                    <strong><?php esc_html_e('Eligibility, exchanges, and refunds', 'dawp'); ?></strong>
                </a>
                <a href="<?php echo esc_url(home_url('/faq/')); ?>" class="track-resource-card">
                    <span><?php esc_html_e('FAQ', 'dawp'); ?></span>
                    <strong><?php esc_html_e('Fast answers before contacting us', 'dawp'); ?></strong>
                </a>
            </div>
        </div>
    </div>
</section>
