<?php
/**
 * Template Part: Track Your Order
 */
?>

<main class="track-order-page">

    <!-- Hero Section -->
    <section class="track-hero">
        <div class="track-hero__inner">
            <div class="track-hero__content">
                <span class="track-hero__label"><?php esc_html_e('Order Status', 'dawp'); ?></span>
                <h1 class="track-hero__title"><?php esc_html_e('Track Your Order', 'dawp'); ?></h1>
                <p class="track-hero__desc">
                    <?php esc_html_e('Enter your order number and billing email to check the latest GraphicTShirtStore production and delivery status.', 'dawp'); ?>
                </p>
            </div>

            <div class="track-hero__panel" aria-label="<?php esc_attr_e('Order tracking steps', 'dawp'); ?>">
                <div class="track-step">
                    <span class="track-step__number">01</span>
                    <div>
                        <h2><?php esc_html_e('Order Received', 'dawp'); ?></h2>
                        <p><?php esc_html_e('We confirm your checkout details and prepare the request.', 'dawp'); ?></p>
                    </div>
                </div>
                <div class="track-step">
                    <span class="track-step__number">02</span>
                    <div>
                        <h2><?php esc_html_e('In Production', 'dawp'); ?></h2>
                        <p><?php esc_html_e('Your personalized item is reviewed, crafted, and packed.', 'dawp'); ?></p>
                    </div>
                </div>
                <div class="track-step">
                    <span class="track-step__number">03</span>
                    <div>
                        <h2><?php esc_html_e('On The Way', 'dawp'); ?></h2>
                        <p><?php esc_html_e('Carrier updates appear as soon as shipment scans begin.', 'dawp'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Form Section -->
    <section class="track-form-section">
        <div class="track-form-section__inner">

            <div class="track-content-grid">
                <!-- Form Card -->
                <div class="track-form-card">
                    <div class="track-form-card__header">
                        <span><?php esc_html_e('Lookup', 'dawp'); ?></span>
                        <h2><?php esc_html_e('Find your order', 'dawp'); ?></h2>
                    </div>
                    <div class="track-form-card__body">
                        <?php echo do_shortcode('[woocommerce_order_tracking]'); ?>
                    </div>
                </div>

                <div class="track-side">
                    <!-- Help Box -->
                    <div class="track-help-box">
                        <div class="track-help-box__icon" aria-hidden="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M12 16v-4"></path><path d="M12 8h.01"></path></svg>
                        </div>
                        <div class="track-help-box__content">
                            <h4 class="track-help-box__title"><?php esc_html_e('Need help tracking?', 'dawp'); ?></h4>
                            <p class="track-help-box__text">
                                <?php esc_html_e('If the status looks delayed, email ', 'dawp'); ?>
                                <a href="mailto:support@graphictshirtstore.com">support@graphictshirtstore.com</a>
                                <?php esc_html_e(' with your order number so our team can investigate quickly.', 'dawp'); ?>
                            </p>
                        </div>
                    </div>

                    <!-- Trust Badges -->
                    <div class="track-badges">
                        <div class="track-badge">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><path d="m9 12 2 2 4-4"></path></svg>
                            <?php esc_html_e('Secure Tracking', 'dawp'); ?>
                        </div>
                        <div class="track-badge">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            <?php esc_html_e('Status Updates', 'dawp'); ?>
                        </div>
                        <div class="track-badge">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path><path d="M3 6h18"></path><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                            <?php esc_html_e('Order Protection', 'dawp'); ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- More Ways Section -->
    <section class="track-more-section">
        <div class="track-more-section__inner">
            <div class="track-more-section__header">
                <span><?php esc_html_e('Support Center', 'dawp'); ?></span>
                <h2 class="track-more-section__title"><?php esc_html_e('More Ways We Can Help', 'dawp'); ?></h2>
                <p class="track-more-section__subtitle"><?php esc_html_e('Everything you need for a smooth GraphicTShirtStore experience.', 'dawp'); ?></p>
            </div>
            <div class="track-more-grid">
                <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>" class="track-more-card">
                    <h3 class="track-more-card__title"><?php esc_html_e('Shipping Policy', 'dawp'); ?></h3>
                    <p class="track-more-card__desc"><?php esc_html_e('Review handling time, transit time, delivery estimates, and U.S. standard shipping details.', 'dawp'); ?></p>
                </a>
                <a href="<?php echo esc_url(home_url('/refund-return-policy/')); ?>" class="track-more-card">
                    <h3 class="track-more-card__title"><?php esc_html_e('Refund & Return Policy', 'dawp'); ?></h3>
                    <p class="track-more-card__desc"><?php esc_html_e('See return windows, refund timing, exchange handling, and return shipping rules.', 'dawp'); ?></p>
                </a>
                <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="track-more-card">
                    <h3 class="track-more-card__title"><?php esc_html_e('Contact Us', 'dawp'); ?></h3>
                    <p class="track-more-card__desc"><?php esc_html_e('Reach our support team with order, delivery, customization, or product questions.', 'dawp'); ?></p>
                </a>
                <a href="<?php echo esc_url(home_url('/faq/')); ?>" class="track-more-card">
                    <h3 class="track-more-card__title"><?php esc_html_e('FAQ', 'dawp'); ?></h3>
                    <p class="track-more-card__desc"><?php esc_html_e('Find quick answers to the most common customer questions before contacting support.', 'dawp'); ?></p>
                </a>
            </div>
        </div>
    </section>

</main>
