<?php
/**
 * Template Part: Track Your Order
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email = 'support@handedshoes.com';
$contact_url   = home_url('/contact-us/');
$shipping_url  = home_url('/shipping-policy/');
$returns_url   = home_url('/refund-return-policy/');
$faq_url       = home_url('/faq/');
?>

<main class="track-order-page">
    <section class="track-hero" aria-labelledby="track-order-title">
        <div class="track-hero__inner">
            <div class="track-hero__content">
                <p class="track-eyebrow"><?php esc_html_e('Order Tracking', 'dawp'); ?></p>
                <h1 id="track-order-title" class="track-hero__title"><?php esc_html_e('Track Your Handed Shoes Order', 'dawp'); ?></h1>
                <p class="track-hero__desc">
                    <?php esc_html_e('Enter your order number and billing email to check the latest order status. Tracking details appear after your order has shipped.', 'dawp'); ?>
                </p>
                <div class="track-hero__actions">
                    <a href="#track-order-form" class="track-button track-button--primary"><?php esc_html_e('Track Order', 'dawp'); ?></a>
                    <a href="<?php echo esc_url($contact_url); ?>" class="track-button track-button--secondary"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
                </div>
            </div>

            <div class="track-status-card" aria-label="<?php esc_attr_e('Order tracking steps', 'dawp'); ?>">
                <div class="track-status-card__top">
                    <span><?php esc_html_e('Typical Flow', 'dawp'); ?></span>
                    <strong><?php esc_html_e('Order to Delivery', 'dawp'); ?></strong>
                </div>
                <ol class="track-status-list">
                    <li>
                        <span class="track-status-list__dot"></span>
                        <div>
                            <strong><?php esc_html_e('Order confirmed', 'dawp'); ?></strong>
                            <p><?php esc_html_e('Your order is received and queued for handling.', 'dawp'); ?></p>
                        </div>
                    </li>
                    <li>
                        <span class="track-status-list__dot"></span>
                        <div>
                            <strong><?php esc_html_e('Packed and dispatched', 'dawp'); ?></strong>
                            <p><?php esc_html_e('Tracking is sent once the carrier receives the package.', 'dawp'); ?></p>
                        </div>
                    </li>
                    <li>
                        <span class="track-status-list__dot"></span>
                        <div>
                            <strong><?php esc_html_e('In transit', 'dawp'); ?></strong>
                            <p><?php esc_html_e('Carrier updates may take 24-48 hours to appear.', 'dawp'); ?></p>
                        </div>
                    </li>
                </ol>
            </div>
        </div>
    </section>

    <section id="track-order-form" class="track-form-section" aria-labelledby="track-form-title">
        <div class="track-form-section__inner">
            <aside class="track-support-panel">
                <p class="track-eyebrow"><?php esc_html_e('Before You Start', 'dawp'); ?></p>
                <h2 id="track-form-title" class="track-section-title"><?php esc_html_e('Have your order details ready.', 'dawp'); ?></h2>
                <p class="track-section-copy">
                    <?php esc_html_e('Use the order number from your confirmation email and the billing email used at checkout. If tracking has not updated yet, check again later or contact us with your order number.', 'dawp'); ?>
                </p>

                <div class="track-info-stack">
                    <div class="track-info-item">
                        <span class="track-info-item__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73L13 2.27a2 2 0 0 0-2 0L4 6.27A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><path d="M3.27 6.96 12 12.01l8.73-5.05"></path><path d="M12 22.08V12"></path></svg>
                        </span>
                        <div>
                            <strong><?php esc_html_e('Order number', 'dawp'); ?></strong>
                            <p><?php esc_html_e('Find it in your confirmation email.', 'dawp'); ?></p>
                        </div>
                    </div>
                    <div class="track-info-item">
                        <span class="track-info-item__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-10 6L2 7"></path></svg>
                        </span>
                        <div>
                            <strong><?php esc_html_e('Billing email', 'dawp'); ?></strong>
                            <p><?php esc_html_e('Use the email address entered at checkout.', 'dawp'); ?></p>
                        </div>
                    </div>
                    <div class="track-info-item">
                        <span class="track-info-item__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                        </span>
                        <div>
                            <strong><?php esc_html_e('Carrier updates', 'dawp'); ?></strong>
                            <p><?php esc_html_e('Tracking can take 24-48 hours to refresh.', 'dawp'); ?></p>
                        </div>
                    </div>
                </div>
            </aside>

            <div class="track-form-column">
                <div class="track-form-card">
                    <div class="track-form-card__header">
                        <p class="track-eyebrow"><?php esc_html_e('Check Status', 'dawp'); ?></p>
                        <h2><?php esc_html_e('Enter order information', 'dawp'); ?></h2>
                    </div>
                    <div class="track-form-card__body">
                        <?php echo do_shortcode('[woocommerce_order_tracking]'); ?>
                    </div>
                </div>

                <div class="track-help-box">
                    <div class="track-help-box__icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M12 16v-4"></path><path d="M12 8h.01"></path></svg>
                    </div>
                    <div class="track-help-box__content">
                        <h3 class="track-help-box__title"><?php esc_html_e('Need help tracking?', 'dawp'); ?></h3>
                        <p class="track-help-box__text">
                            <?php esc_html_e('Email ', 'dawp'); ?>
                            <a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
                            <?php esc_html_e(' with your order number and our support team will help review the shipment.', 'dawp'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="track-more-section" aria-labelledby="track-more-title">
        <div class="track-more-section__inner">
            <div class="track-more-section__header">
                <p class="track-eyebrow"><?php esc_html_e('Support Links', 'dawp'); ?></p>
                <h2 id="track-more-title" class="track-section-title"><?php esc_html_e('More ways we can help.', 'dawp'); ?></h2>
                <p class="track-section-copy"><?php esc_html_e('Review shipping, returns, and common questions for a smoother order experience.', 'dawp'); ?></p>
            </div>

            <div class="track-more-grid">
                <a href="<?php echo esc_url($shipping_url); ?>" class="track-more-card">
                    <span class="track-more-card__icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 17h4V5H3v12h2"></path><path d="M14 8h4l3 3v6h-3"></path><circle cx="7" cy="17" r="2"></circle><circle cx="16" cy="17" r="2"></circle></svg>
                    </span>
                    <h3 class="track-more-card__title"><?php esc_html_e('Shipping Policy', 'dawp'); ?></h3>
                    <p class="track-more-card__desc"><?php esc_html_e('See processing, transit estimates, carrier details, and delivery issue guidance.', 'dawp'); ?></p>
                </a>
                <a href="<?php echo esc_url($returns_url); ?>" class="track-more-card">
                    <span class="track-more-card__icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 7 4-4 4 4"></path><path d="M7 3v12a4 4 0 0 0 4 4h10"></path></svg>
                    </span>
                    <h3 class="track-more-card__title"><?php esc_html_e('Refund & Return Policy', 'dawp'); ?></h3>
                    <p class="track-more-card__desc"><?php esc_html_e('Review return eligibility, refund timelines, and exchange rules.', 'dawp'); ?></p>
                </a>
                <a href="<?php echo esc_url($contact_url); ?>" class="track-more-card">
                    <span class="track-more-card__icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a4 4 0 0 1-4 4H7l-4 4V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4z"></path></svg>
                    </span>
                    <h3 class="track-more-card__title"><?php esc_html_e('Contact Us', 'dawp'); ?></h3>
                    <p class="track-more-card__desc"><?php esc_html_e('Send our support team your order number and details for direct help.', 'dawp'); ?></p>
                </a>
                <a href="<?php echo esc_url($faq_url); ?>" class="track-more-card">
                    <span class="track-more-card__icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 1 1 5.82 1c0 2-3 2-3 4"></path><path d="M12 17h.01"></path></svg>
                    </span>
                    <h3 class="track-more-card__title"><?php esc_html_e('FAQ', 'dawp'); ?></h3>
                    <p class="track-more-card__desc"><?php esc_html_e('Find quick answers to common order, shipping, and product questions.', 'dawp'); ?></p>
                </a>
            </div>
        </div>
    </section>
</main>
