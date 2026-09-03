<?php
/**
 * Track Order page — North Time Co.
 *
 * Wraps WooCommerce's [woocommerce_order_tracking] shortcode. The form and its
 * results (.track_order, .woocommerce-info, order tables) are styled by the
 * ".track-order-wc" rules in assets/css/main.css.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$email    = function_exists('dawp_store_email') ? dawp_store_email() : 'support@northtimeco.com';
$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$steps = [
    ['title' => __('Order placed', 'dawp'), 'copy' => __('Your checkout details are received securely and you get a confirmation email.', 'dawp')],
    ['title' => __('Processing', 'dawp'),    'copy' => __('Orders are prepared and dispatched within 1-3 business days.', 'dawp')],
    ['title' => __('On the way', 'dawp'),    'copy' => __('Standard US delivery takes 3-7 business days after dispatch.', 'dawp')],
    ['title' => __('Delivered', 'dawp'),     'copy' => __('Tracking is emailed to you and updates until the parcel arrives.', 'dawp')],
];
?>

<div class="bg-background text-foreground">
    <section class="bg-primary text-white">
        <div class="mx-auto max-w-4xl px-4 py-14 sm:px-6 lg:px-8 lg:py-16">
            <p class="font-heading text-xs font-semibold uppercase tracking-brand text-accent"><?php esc_html_e('Order Tracking', 'dawp'); ?></p>
            <h1 class="mt-4 font-heading text-3xl font-bold uppercase leading-tight sm:text-4xl"><?php esc_html_e('Track your order', 'dawp'); ?></h1>
            <p class="mt-5 max-w-2xl text-base leading-8 text-white/80">
                <?php esc_html_e('Enter the order number from your confirmation email and the billing email used at checkout to see your current order and shipment status.', 'dawp'); ?>
            </p>
        </div>
    </section>

    <section class="py-14 sm:py-20">
        <div class="mx-auto grid max-w-4xl gap-10 px-4 sm:px-6 lg:px-8">

            <div class="track-order-wc rounded-xl border border-line bg-white p-6 sm:p-8">
                <h2 class="font-heading text-lg font-bold uppercase text-foreground"><?php esc_html_e('Find your order', 'dawp'); ?></h2>
                <p class="mt-2 text-sm leading-6 text-muted"><?php esc_html_e('Order numbers look like "NTC-1234" and are shown in your confirmation email.', 'dawp'); ?></p>
                <div class="mt-5">
                    <?php echo do_shortcode('[woocommerce_order_tracking]'); ?>
                </div>
            </div>

            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <?php foreach ($steps as $i => $step) : ?>
                    <div class="rounded-xl border border-line bg-white p-5">
                        <span class="font-heading text-sm font-bold text-accent"><?php echo esc_html(sprintf('%02d', $i + 1)); ?></span>
                        <h3 class="mt-2 font-heading text-sm font-bold uppercase text-foreground"><?php echo esc_html($step['title']); ?></h3>
                        <p class="mt-1 text-xs leading-5 text-muted"><?php echo esc_html($step['copy']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="rounded-xl border border-line bg-white p-6">
                <h2 class="font-heading text-base font-bold uppercase text-foreground"><?php esc_html_e('Need help with your order?', 'dawp'); ?></h2>
                <p class="mt-3 text-sm leading-7 text-muted">
                    <?php
                    echo wp_kses(
                        sprintf(
                            /* translators: %s: support email link */
                            __('Email %s with your order number and we will look into it within 1 business day.', 'dawp'),
                            '<a class="font-semibold text-primary underline decoration-accent decoration-2 underline-offset-4 transition hover:text-accent" href="mailto:' . esc_attr($email) . '">' . esc_html($email) . '</a>'
                        ),
                        ['a' => ['class' => [], 'href' => []]]
                    );
                    ?>
                </p>
                <div class="mt-4 flex flex-wrap gap-x-5 gap-y-2 text-sm">
                    <a class="font-semibold text-primary underline decoration-accent decoration-2 underline-offset-4 transition hover:text-accent" href="<?php echo esc_url(home_url('/shipping-policy/')); ?>"><?php esc_html_e('Shipping Policy', 'dawp'); ?></a>
                    <a class="font-semibold text-primary underline decoration-accent decoration-2 underline-offset-4 transition hover:text-accent" href="<?php echo esc_url(home_url('/return-refund-policy/')); ?>"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></a>
                    <a class="font-semibold text-primary underline decoration-accent decoration-2 underline-offset-4 transition hover:text-accent" href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
                </div>
            </div>

            <div>
                <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-lg border border-primary px-6 text-sm font-bold uppercase tracking-wide text-primary transition hover:bg-primary hover:text-white">
                    <?php esc_html_e('Continue shopping', 'dawp'); ?>
                </a>
            </div>

        </div>
    </section>
</div>
