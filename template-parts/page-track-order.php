<?php
/**
 * Template Part: Track Your Order
 */
?>

<main class="track-order-page">

    <!-- Hero Section -->
    <section class="track-hero">
        <div class="track-hero__inner">
            <span class="track-hero__label"><?php esc_html_e('Order Status', 'dawp'); ?></span>
            <h1 class="track-hero__title"><?php esc_html_e('Track Your Order', 'dawp'); ?></h1>
            <p class="track-hero__desc">
                <?php esc_html_e('Enter your order details below to see your shipment status. We\'ll let you know exactly where your boutique treasures are on their way to you.', 'dawp'); ?>
            </p>
        </div>
    </section>

    <!-- Form Section -->
    <section class="track-form-section">
        <div class="track-form-section__inner">

            <!-- Form Card -->
            <div class="track-form-card">
                <div class="track-form-card__body">
                    <?php echo do_shortcode('[woocommerce_order_tracking]'); ?>
                </div>
            </div>

            <!-- Help Box -->
            <div class="track-help-box">
                <div class="track-help-box__icon" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M12 16v-4"></path><path d="M12 8h.01"></path></svg>
                </div>
                <div class="track-help-box__content">
                    <h4 class="track-help-box__title"><?php esc_html_e('Need help tracking?', 'dawp'); ?></h4>
                    <p class="track-help-box__text">
                        <?php esc_html_e('If you have any trouble, please reach out to our boutique team at ', 'dawp'); ?>
                        <a href="mailto:support@shopkelli.com">support@shopkelli.com</a>
                        <?php esc_html_e(' with your order number and we\'ll be happy to assist you.', 'dawp'); ?>
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
                    <?php esc_html_e('Real-time Updates', 'dawp'); ?>
                </div>
                <div class="track-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path><path d="M3 6h18"></path><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                    <?php esc_html_e('Order Protection', 'dawp'); ?>
                </div>
            </div>

        </div>
    </section>

    <!-- More Ways Section -->
    <section class="track-more-section">
        <div class="track-more-section__inner">
            <div class="track-more-section__header">
                <h2 class="track-more-section__title"><?php esc_html_e('More Ways We Can Help', 'dawp'); ?></h2>
                <p class="track-more-section__subtitle"><?php esc_html_e('Everything you need for a smooth boutique experience.', 'dawp'); ?></p>
            </div>
            <div class="track-more-grid">
                <a href="<?php echo esc_url(home_url('/shipping-returns/')); ?>" class="track-more-card">
                    <h3 class="track-more-card__title"><?php esc_html_e('Shipping Policy', 'dawp'); ?></h3>
                    <p class="track-more-card__desc"><?php esc_html_e('Learn about our 0-1 business day delivery estimate, free U.S. standard shipping, and returns.', 'dawp'); ?></p>
                </a>
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="track-more-card">
                    <h3 class="track-more-card__title"><?php esc_html_e('Contact Us', 'dawp'); ?></h3>
                    <p class="track-more-card__desc"><?php esc_html_e('Our boutique team is here to help, Mon–Sat 10 AM–6 PM PST.', 'dawp'); ?></p>
                </a>
                <a href="<?php echo esc_url(home_url('/faq/')); ?>" class="track-more-card">
                    <h3 class="track-more-card__title"><?php esc_html_e('FAQ', 'dawp'); ?></h3>
                    <p class="track-more-card__desc"><?php esc_html_e('Find quick answers to our most common customer questions.', 'dawp'); ?></p>
                </a>
            </div>
        </div>
    </section>

</main>
