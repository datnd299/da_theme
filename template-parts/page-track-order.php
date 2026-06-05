<?php
/**
 * Template Part: Track Your Order
 */
?>

<section class="track-order-page">
    <header class="track-order-hero">
        <div class="track-order-hero__inner">
            <span class="track-order-kicker"><?php esc_html_e('Order Status', 'dawp'); ?></span>
            <h1 class="track-order-hero__title"><?php esc_html_e('Track Your Order', 'dawp'); ?></h1>
            <p class="track-order-hero__text">
                <?php esc_html_e('Use your order number and checkout email to view the latest available ToyocarTV order status.', 'dawp'); ?>
            </p>
        </div>
    </header>

    <div class="track-order-shell">
        <section class="track-order-panel" aria-labelledby="track-order-form-title">
            <div class="track-order-panel__intro">
                <span class="track-order-panel__eyebrow"><?php esc_html_e('Lookup', 'dawp'); ?></span>
                <h2 id="track-order-form-title" class="track-order-panel__title"><?php esc_html_e('Find Your Shipment', 'dawp'); ?></h2>
                <p class="track-order-panel__text">
                    <?php esc_html_e('Your order ID is shown on the receipt and confirmation email. Use the same billing email entered at checkout.', 'dawp'); ?>
                </p>
                <ul class="track-order-checklist" aria-label="<?php esc_attr_e('Tracking requirements', 'dawp'); ?>">
                    <li><?php esc_html_e('Order number from your receipt', 'dawp'); ?></li>
                    <li><?php esc_html_e('Billing email used during checkout', 'dawp'); ?></li>
                    <li><?php esc_html_e('Tracking appears after shipment is prepared', 'dawp'); ?></li>
                </ul>
            </div>

            <div class="track-order-panel__form">
                <?php echo do_shortcode('[woocommerce_order_tracking]'); ?>
            </div>
        </section>

        <section class="track-order-help" aria-labelledby="track-order-help-title">
            <div>
                <span class="track-order-help__label"><?php esc_html_e('Support', 'dawp'); ?></span>
                <h2 id="track-order-help-title" class="track-order-help__title"><?php esc_html_e('Need help tracking?', 'dawp'); ?></h2>
            </div>
            <p class="track-order-help__text">
                <?php esc_html_e('If you have trouble finding tracking details, email ', 'dawp'); ?>
                <a href="mailto:support@toyocartv.com">support@toyocartv.com</a>
                <?php esc_html_e(' with your order number and the email address used at checkout.', 'dawp'); ?>
            </p>
        </section>

        <section class="track-order-assurance" aria-label="<?php esc_attr_e('Order tracking details', 'dawp'); ?>">
            <?php
            $badges = [
                ['Secure Tracking', 'Order lookup uses your WooCommerce order details.'],
                ['Tracking Included', 'Tracking details are provided once your order ships.'],
                ['Support Available', 'Send your order number if carrier details look delayed.'],
            ];
            foreach ($badges as $badge) :
            ?>
                <article class="track-order-assurance__item">
                    <h3><?php echo esc_html($badge[0]); ?></h3>
                    <p><?php echo esc_html($badge[1]); ?></p>
                </article>
            <?php endforeach; ?>
        </section>

        <section class="track-order-links" aria-labelledby="track-order-links-title">
            <div class="track-order-links__header">
                <span class="track-order-panel__eyebrow"><?php esc_html_e('Resources', 'dawp'); ?></span>
                <h2 id="track-order-links-title" class="track-order-links__title"><?php esc_html_e('More Ways We Can Help', 'dawp'); ?></h2>
            </div>
            <div class="track-order-links__grid">
                <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>" class="track-order-link-card">
                    <h3><?php esc_html_e('Shipping Policy', 'dawp'); ?></h3>
                    <p><?php esc_html_e('Processing, transit, and carrier details.', 'dawp'); ?></p>
                </a>
                <a href="<?php echo esc_url(home_url('/refund-return-policy/')); ?>" class="track-order-link-card">
                    <h3><?php esc_html_e('Returns', 'dawp'); ?></h3>
                    <p><?php esc_html_e('Eligibility, condition, and refund timing.', 'dawp'); ?></p>
                </a>
                <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="track-order-link-card">
                    <h3><?php esc_html_e('Contact', 'dawp'); ?></h3>
                    <p><?php esc_html_e('Get support for orders and products.', 'dawp'); ?></p>
                </a>
                <a href="<?php echo esc_url(home_url('/faq/')); ?>" class="track-order-link-card">
                    <h3><?php esc_html_e('FAQ', 'dawp'); ?></h3>
                    <p><?php esc_html_e('Quick answers before contacting us.', 'dawp'); ?></p>
                </a>
            </div>
        </section>
    </div>
</section>
