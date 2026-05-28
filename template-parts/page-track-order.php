<?php
/**
 * Template Part: Track Your Order
 */

$support_email = 'support@queens-bracelet.com';
$track_categories = function_exists('qb_product_category_definitions') ? qb_product_category_definitions() : [];
?>

<main class="track-order-page">

    <section class="track-hero">
        <div class="track-hero__inner">
            <div class="track-hero__content">
                <span class="track-hero__label"><?php esc_html_e('Order Tracking', 'dawp'); ?></span>
                <h1 class="track-hero__title"><?php esc_html_e('Track Your Bracelet Order', 'dawp'); ?></h1>
                <p class="track-hero__desc">
                    <?php esc_html_e('Use your order number and checkout email to review the latest status for your Queen\'s Bracelet purchase.', 'dawp'); ?>
                </p>
                <div class="track-hero__actions">
                    <a class="track-button" href="<?php echo esc_url(home_url('/shipping-policy/')); ?>"><?php esc_html_e('Shipping Policy', 'dawp'); ?></a>
                    <a class="track-button track-button--secondary" href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
                </div>
            </div>
            <div class="track-form-card">
                <div class="track-form-card__header">
                    <span><?php esc_html_e('Status Lookup', 'dawp'); ?></span>
                    <strong><?php esc_html_e('Have your order number ready.', 'dawp'); ?></strong>
                </div>
                <div class="track-form-card__body">
                    <?php echo do_shortcode('[woocommerce_order_tracking]'); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="track-support-section">
        <div class="track-support-section__inner">
            <div class="track-step-list" aria-label="<?php esc_attr_e('Order tracking steps', 'dawp'); ?>">
                <div class="track-step">
                    <span>01</span>
                    <strong><?php esc_html_e('Find Order Details', 'dawp'); ?></strong>
                    <p><?php esc_html_e('Use the order confirmation email sent after checkout.', 'dawp'); ?></p>
                </div>
                <div class="track-step">
                    <span>02</span>
                    <strong><?php esc_html_e('Check Status', 'dawp'); ?></strong>
                    <p><?php esc_html_e('Enter the order number and billing email in the tracker.', 'dawp'); ?></p>
                </div>
                <div class="track-step">
                    <span>03</span>
                    <strong><?php esc_html_e('Review Delivery', 'dawp'); ?></strong>
                    <p><?php esc_html_e('Tracking details appear after the order has shipped.', 'dawp'); ?></p>
                </div>
            </div>
            <div class="track-help-box">
                <div class="track-help-box__icon" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M12 16v-4"></path><path d="M12 8h.01"></path></svg>
                </div>
                <div class="track-help-box__content">
                    <h2 class="track-help-box__title"><?php esc_html_e('Need help tracking?', 'dawp'); ?></h2>
                    <p class="track-help-box__text">
                        <?php esc_html_e('Send your order number and checkout email to ', 'dawp'); ?>
                        <a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
                        <?php esc_html_e(' and our support team will review it.', 'dawp'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <?php if (!empty($track_categories)) : ?>
        <section class="track-category-section">
            <div class="track-category-section__inner">
                <div class="track-section-heading">
                    <span><?php esc_html_e('Shop By Category', 'dawp'); ?></span>
                    <h2><?php esc_html_e('Browse Queen\'s Bracelet collections.', 'dawp'); ?></h2>
                </div>
                <div class="track-category-grid">
                    <?php foreach ($track_categories as $slug => $category) : ?>
                        <a class="track-category-card" href="<?php echo esc_url(function_exists('qb_product_category_url') ? qb_product_category_url($slug) : home_url('/product-category/' . trailingslashit($slug))); ?>">
                            <strong><?php echo esc_html($category['name']); ?></strong>
                            <span><?php echo esc_html($category['description']); ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section class="track-more-section">
        <div class="track-more-section__inner">
            <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>" class="track-more-card">
                <strong><?php esc_html_e('Shipping Policy', 'dawp'); ?></strong>
                <span><?php esc_html_e('Review cutoff, handling, free U.S. shipping, transit, and tracking.', 'dawp'); ?></span>
            </a>
            <a href="<?php echo esc_url(home_url('/return-refund-policy/')); ?>" class="track-more-card">
                <strong><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></strong>
                <span><?php esc_html_e('Review return eligibility, return method, fees, and refund timing.', 'dawp'); ?></span>
            </a>
            <a href="<?php echo esc_url(home_url('/faq/')); ?>" class="track-more-card">
                <strong><?php esc_html_e('FAQ', 'dawp'); ?></strong>
                <span><?php esc_html_e('Find quick answers for orders, products, and support.', 'dawp'); ?></span>
            </a>
            <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="track-more-card">
                <strong><?php esc_html_e('Contact Us', 'dawp'); ?></strong>
                <span><?php esc_html_e('Get direct help with an order or delivery question.', 'dawp'); ?></span>
            </a>
        </div>
    </section>

</main>

