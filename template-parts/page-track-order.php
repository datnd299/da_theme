<?php
/**
 * Template Part: Track Your Order
 */

$brand_name = function_exists('dawp_brand_name') ? dawp_brand_name() : 'Velmo Custom';
$support_email = function_exists('dawp_contact_support_email') ? dawp_contact_support_email() : 'support@velmocustom.com';
$support_mailto = function_exists('dawp_contact_mailto_url') ? dawp_contact_mailto_url(__('Velmo Custom tracking support', 'dawp'), __('Please include your order number and checkout email.', 'dawp')) : 'mailto:' . $support_email;
$track_categories = function_exists('qb_product_category_definitions') ? qb_product_category_definitions() : [];
?>

<main class="track-order-page">

    <section class="track-hero">
        <div class="track-hero__inner">
            <div class="track-hero__content">
                <span class="track-hero__label"><?php esc_html_e('Order Tracking', 'dawp'); ?></span>
                <h1 class="track-hero__title"><?php esc_html_e('Track Your Watch Order', 'dawp'); ?></h1>
                <p class="track-hero__desc">
                    <?php echo esc_html(sprintf(__('Use your order number and checkout email to review the latest status for your %s purchase.', 'dawp'), $brand_name)); ?>
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
                        <a href="<?php echo esc_url($support_mailto); ?>"><?php echo esc_html($support_email); ?></a>
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
                    <h2><?php echo esc_html(sprintf(__('Browse %s watch collections.', 'dawp'), $brand_name)); ?></h2>
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

</main>

