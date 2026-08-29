<?php
/**
 * Track Order — YourWatchStore. Tailwind utilities only (form chrome in main.css).
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email  = 'support@yourwatchstore.com';
$business_hours = __('Monday - Friday, 9:00 AM - 5:00 PM EST', 'dawp');

$steps = [
    ['title' => __('Order placed', 'dawp'),   'copy' => __('You receive a confirmation email with your order number as soon as checkout completes.', 'dawp')],
    ['title' => __('Processing', 'dawp'),      'copy' => __('We inspect and pack your watch within 1-3 business days of purchase.', 'dawp')],
    ['title' => __('Shipped', 'dawp'),         'copy' => __('A shipping email with a tracking link is sent when your parcel leaves our facility.', 'dawp')],
    ['title' => __('Out for delivery', 'dawp'),'copy' => __('Standard transit is typically 3-7 business days after dispatch, tracked to your door.', 'dawp')],
];
?>

<div class="bg-background text-foreground">
    <section class="border-b border-border">
        <div class="mx-auto max-w-3xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
            <p class="text-xs font-bold uppercase tracking-[0.16em] text-accent-blush"><?php esc_html_e('Order Tracking', 'dawp'); ?></p>
            <h1 class="mt-4 font-heading text-4xl font-extrabold leading-tight tracking-tight text-foreground sm:text-5xl"><?php esc_html_e('Track your order', 'dawp'); ?></h1>
            <p class="mt-5 text-base leading-7 text-foreground-muted"><?php esc_html_e('Enter your order number and the billing email you used at checkout to see the latest status.', 'dawp'); ?></p>
        </div>
    </section>

    <section class="mx-auto max-w-[1280px] px-4 py-14 sm:px-6 lg:px-8 lg:py-16">
        <div class="grid gap-10 lg:grid-cols-[1fr_0.7fr] lg:gap-16">
            <div>
                <div class="track-order-form rounded-md border border-border bg-surface p-6 sm:p-8">
                    <h2 class="font-heading text-xl font-bold text-foreground"><?php esc_html_e('Find your shipment', 'dawp'); ?></h2>
                    <p class="mt-2 text-sm leading-6 text-foreground-muted"><?php esc_html_e('Your order number is in the confirmation email sent right after checkout. Tracking appears once the parcel has shipped.', 'dawp'); ?></p>
                    <div class="mt-5">
                        <?php if (shortcode_exists('woocommerce_order_tracking')) : ?>
                            <?php echo do_shortcode('[woocommerce_order_tracking]'); ?>
                        <?php else : ?>
                            <p class="text-sm leading-6 text-foreground-muted">
                                <?php
                                printf(
                                    wp_kses(__('Order tracking is temporarily unavailable. Email <a class="font-semibold text-accent-blush underline underline-offset-2" href="mailto:%1$s">%1$s</a> with your order number and we will check the status for you.', 'dawp'), ['a' => ['class' => [], 'href' => []]]),
                                    esc_attr($support_email)
                                );
                                ?>
                            </p>
                        <?php endif; ?>
                    </div>
                    <div class="mt-6 rounded-sm border-l-2 border-accent bg-surface-alt p-4 text-sm leading-6 text-foreground-muted">
                        <strong class="font-semibold text-foreground"><?php esc_html_e('No tracking yet?', 'dawp'); ?></strong>
                        <?php esc_html_e('Tracking updates can take 1-2 business days to appear after an order ships while the carrier scans the parcel.', 'dawp'); ?>
                    </div>
                </div>
            </div>

            <aside class="space-y-8">
                <div class="rounded-md border border-border bg-surface-alt p-6">
                    <h2 class="font-heading text-lg font-bold text-foreground"><?php esc_html_e('What you need', 'dawp'); ?></h2>
                    <ul class="mt-3 space-y-2 text-sm leading-6 text-foreground-muted">
                        <li><?php esc_html_e('Your order number (e.g. YWS-1234), from the confirmation email.', 'dawp'); ?></li>
                        <li><?php esc_html_e('The exact billing email address used at checkout.', 'dawp'); ?></li>
                    </ul>
                </div>
                <div class="rounded-md border border-border bg-surface-alt p-6">
                    <h2 class="font-heading text-lg font-bold text-foreground"><?php esc_html_e('Need a hand?', 'dawp'); ?></h2>
                    <p class="mt-2 text-sm leading-6 text-foreground-muted">
                        <?php
                        printf(
                            wp_kses(__('Email <a class="font-semibold text-accent-blush underline underline-offset-2" href="mailto:%1$s">%1$s</a>. Support hours: %2$s.', 'dawp'), ['a' => ['class' => [], 'href' => []]]),
                            esc_attr($support_email),
                            esc_html($business_hours)
                        );
                        ?>
                    </p>
                </div>
            </aside>
        </div>

        <div class="mt-14">
            <h2 class="font-heading text-2xl font-extrabold tracking-tight text-foreground sm:text-3xl"><?php esc_html_e('How delivery works', 'dawp'); ?></h2>
            <ol class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <?php foreach ($steps as $i => $step) : ?>
                    <li class="rounded-md border border-border bg-surface p-5">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-sm bg-foreground text-sm font-bold text-white"><?php echo esc_html($i + 1); ?></span>
                        <h3 class="mt-4 font-heading text-base font-bold text-foreground"><?php echo esc_html($step['title']); ?></h3>
                        <p class="mt-2 text-sm leading-6 text-foreground-muted"><?php echo esc_html($step['copy']); ?></p>
                    </li>
                <?php endforeach; ?>
            </ol>
        </div>
    </section>
</div>
