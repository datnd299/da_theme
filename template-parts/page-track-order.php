<?php
/**
 * Track Order page — WristUnion.
 *
 * Wraps WooCommerce's [woocommerce_order_tracking] shortcode. The form and its
 * results are styled by the ".track-order-wc" rules in assets/css/main.css.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$email    = function_exists('dawp_store_email') ? dawp_store_email() : 'support@wristunion.com';
$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$steps = [
    ['title' => __('Order placed', 'dawp'), 'copy' => __('Checkout confirmed securely; you get a confirmation email.', 'dawp')],
    ['title' => __('On the bench', 'dawp'), 'copy' => __('In-stock watches dispatch in 1–2 business days. Made-to-order in ~3 weeks, custom builds in 4–6 weeks.', 'dawp')],
    ['title' => __('On the way', 'dawp'),   'copy' => __('Standard US delivery is 3–7 business days after dispatch, with tracking.', 'dawp')],
    ['title' => __('Delivered', 'dawp'),    'copy' => __('Tracking updates until the parcel arrives at your address.', 'dawp')],
];
?>

<div class="bg-background text-foreground">
    <section class="bg-primary text-white">
        <div class="mx-auto max-w-4xl px-8 py-16 sm:px-14 lg:py-20">
            <p class="text-[11px] font-medium uppercase tracking-brand text-accent"><?php esc_html_e('Order tracking', 'dawp'); ?></p>
            <h1 class="mt-4 font-heading text-[clamp(2rem,5vw,3rem)] font-bold leading-[1.05]"><?php esc_html_e('Track your order', 'dawp'); ?></h1>
            <p class="mt-5 max-w-2xl font-serif text-lg leading-8 text-white/80">
                <?php esc_html_e('Enter the order number from your confirmation email and the billing email used at checkout to see your current order and shipment status.', 'dawp'); ?>
            </p>
        </div>
    </section>

    <section class="py-16 sm:py-20">
        <div class="mx-auto grid max-w-4xl gap-10 px-8 sm:px-14">

            <div class="track-order-wc border border-line bg-surface p-6 sm:p-8">
                <h2 class="font-heading text-lg font-semibold uppercase tracking-label text-foreground"><?php esc_html_e('Find your order', 'dawp'); ?></h2>
                <p class="mt-2 font-serif text-sm leading-6 text-foreground-muted"><?php esc_html_e('Order numbers look like "WU-1234" and are shown in your confirmation email.', 'dawp'); ?></p>
                <div class="mt-5">
                    <?php echo do_shortcode('[woocommerce_order_tracking]'); ?>
                </div>
            </div>

            <div class="grid gap-px bg-line sm:grid-cols-2 lg:grid-cols-4">
                <?php foreach ($steps as $i => $step) : ?>
                    <div class="bg-surface p-5">
                        <span class="wu-tnum font-heading text-sm font-semibold text-accent"><?php echo esc_html(sprintf('%02d', $i + 1)); ?></span>
                        <h3 class="mt-2 font-heading text-sm font-semibold uppercase tracking-label text-foreground"><?php echo esc_html($step['title']); ?></h3>
                        <p class="mt-1 font-serif text-xs leading-5 text-foreground-muted"><?php echo esc_html($step['copy']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="border border-line bg-surface p-6">
                <h2 class="font-heading text-base font-semibold uppercase tracking-label text-foreground"><?php esc_html_e('Need help with your order?', 'dawp'); ?></h2>
                <p class="mt-3 font-serif text-sm leading-7 text-foreground-muted">
                    <?php
                    echo wp_kses(
                        sprintf(
                            /* translators: %s: support email link */
                            __('Email %s with your order number and we will look into it within 1 business day.', 'dawp'),
                            '<a class="font-semibold text-blued underline decoration-line underline-offset-4 transition hover:text-blued-hover" href="mailto:' . esc_attr($email) . '">' . esc_html($email) . '</a>'
                        ),
                        ['a' => ['class' => [], 'href' => []]]
                    );
                    ?>
                </p>
                <div class="mt-4 flex flex-wrap gap-x-5 gap-y-2 text-sm">
                    <a class="font-semibold text-blued underline decoration-line underline-offset-4 transition hover:text-blued-hover" href="<?php echo esc_url(home_url('/shipping-policy/')); ?>"><?php esc_html_e('Shipping Policy', 'dawp'); ?></a>
                    <a class="font-semibold text-blued underline decoration-line underline-offset-4 transition hover:text-blued-hover" href="<?php echo esc_url(home_url('/return-refund-policy/')); ?>"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></a>
                    <a class="font-semibold text-blued underline decoration-line underline-offset-4 transition hover:text-blued-hover" href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact us', 'dawp'); ?></a>
                </div>
            </div>

            <div>
                <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex h-12 items-center justify-center border border-primary px-7 text-xs font-semibold uppercase tracking-button text-primary transition hover:bg-primary hover:text-white">
                    <?php esc_html_e('Continue shopping', 'dawp'); ?>
                </a>
            </div>

        </div>
    </section>
</div>
