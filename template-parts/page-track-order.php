<?php
/**
 * Template Part: Track Your Order
 */

$shop_links = function_exists('dawp_main_menu_items') ? dawp_main_menu_items() : [
    ['title' => __('Shop All', 'dawp'), 'url' => home_url('/shop/')],
];

$support_email = 'support@crestovia.net';
?>

<main class="track-order-page">

    <section class="track-hero">
        <div class="track-hero__inner">
            <div class="track-hero__copy">
                <span class="track-hero__label"><?php esc_html_e('Order Status', 'dawp'); ?></span>
                <h1 class="track-hero__title"><?php esc_html_e('Track Your Order', 'dawp'); ?></h1>
                <p class="track-hero__desc">
                    <?php esc_html_e('Enter your order number and billing email to check the latest Crestovia delivery update.', 'dawp'); ?>
                </p>
                <div class="track-hero__actions">
                    <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="track-hero__button track-hero__button--primary">
                        <?php esc_html_e('Continue Shopping', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="track-hero__button track-hero__button--ghost">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <div class="track-hero__panel" aria-label="<?php esc_attr_e('Order progress steps', 'dawp'); ?>">
                <div class="track-status-card">
                    <span class="track-status-card__eyebrow"><?php esc_html_e('Typical Flow', 'dawp'); ?></span>
                    <ol class="track-status-list">
                        <li>
                            <span></span>
                            <div>
                                <strong><?php esc_html_e('Order Confirmed', 'dawp'); ?></strong>
                                <p><?php esc_html_e('Your order details are received securely.', 'dawp'); ?></p>
                            </div>
                        </li>
                        <li>
                            <span></span>
                            <div>
                                <strong><?php esc_html_e('Packed & Shipped', 'dawp'); ?></strong>
                                <p><?php esc_html_e('Most orders ship after 1-3 business days of handling.', 'dawp'); ?></p>
                            </div>
                        </li>
                        <li>
                            <span></span>
                            <div>
                                <strong><?php esc_html_e('Delivered', 'dawp'); ?></strong>
                                <p><?php esc_html_e('Check your delivery status anytime from this page.', 'dawp'); ?></p>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="track-form-section">
        <div class="track-form-section__inner">
            <div class="track-form-card">
                <div class="track-form-card__header">
                    <span><?php esc_html_e('Tracking Lookup', 'dawp'); ?></span>
                    <h2><?php esc_html_e('Find your order', 'dawp'); ?></h2>
                </div>
                <div class="track-form-card__body">
                    <?php echo do_shortcode('[woocommerce_order_tracking]'); ?>
                </div>
            </div>

            <div class="track-help-box">
                <div class="track-help-box__icon" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M12 16v-4"></path><path d="M12 8h.01"></path></svg>
                </div>
                <div class="track-help-box__content">
                    <h4 class="track-help-box__title"><?php esc_html_e('Need help tracking?', 'dawp'); ?></h4>
                    <p class="track-help-box__text">
                        <?php esc_html_e('If the tracking form cannot find your order, contact Crestovia support at ', 'dawp'); ?>
                        <a href="<?php echo esc_url('mailto:' . $support_email); ?>"><?php echo esc_html($support_email); ?></a>
                        <?php esc_html_e(' with your order number and we\'ll be happy to assist you.', 'dawp'); ?>
                    </p>
                </div>
            </div>

            <div class="track-badges">
                <div class="track-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><path d="m9 12 2 2 4-4"></path></svg>
                    <?php esc_html_e('Secure Tracking', 'dawp'); ?>
                </div>
                <div class="track-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                    <?php esc_html_e('Carrier Tracking', 'dawp'); ?>
                </div>
                <div class="track-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path><path d="M3 6h18"></path><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                    <?php esc_html_e('Order Protection', 'dawp'); ?>
                </div>
            </div>

        </div>
    </section>

    <section class="track-more-section">
        <div class="track-more-section__inner">
            <div class="track-more-section__header">
                <span class="track-more-section__label"><?php esc_html_e('Quick Links', 'dawp'); ?></span>
                <h2 class="track-more-section__title"><?php esc_html_e('More ways we can help', 'dawp'); ?></h2>
                <p class="track-more-section__subtitle"><?php esc_html_e('Useful pages and correct shop categories for a smooth Crestovia order experience.', 'dawp'); ?></p>
            </div>
            <div class="track-more-grid">
                <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>" class="track-more-card">
                    <h3 class="track-more-card__title"><?php esc_html_e('Shipping Policy', 'dawp'); ?></h3>
                    <p class="track-more-card__desc"><?php esc_html_e('Review free standard U.S. shipping, 1-3 business day handling, 10-15 business day transit, and carrier tracking details.', 'dawp'); ?></p>
                </a>
                <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="track-more-card">
                    <h3 class="track-more-card__title"><?php esc_html_e('Contact Us', 'dawp'); ?></h3>
                    <p class="track-more-card__desc"><?php esc_html_e('Our Crestovia support team is here to help with order and delivery questions.', 'dawp'); ?></p>
                </a>
                <a href="<?php echo esc_url(home_url('/faq/')); ?>" class="track-more-card">
                    <h3 class="track-more-card__title"><?php esc_html_e('FAQ', 'dawp'); ?></h3>
                    <p class="track-more-card__desc"><?php esc_html_e('Find quick answers to our most common customer questions.', 'dawp'); ?></p>
                </a>
            </div>

            <div class="track-category-strip" aria-label="<?php esc_attr_e('Shop categories', 'dawp'); ?>">
                <?php foreach ($shop_links as $link) : ?>
                    <a href="<?php echo esc_url($link['url']); ?>" class="track-category-link">
                        <?php echo esc_html($link['title']); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</main>
