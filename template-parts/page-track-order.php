<?php
/**
 * Track Your Order — WooCommerce order tracking form with brand chrome.
 * Page layout uses Tailwind; the WooCommerce form itself is styled by track-order.css.
 */

defined('ABSPATH') || exit;

$dawp_support_email = dawp_brand('support_email');
?>

<!-- ============================================================ HERO -->
<section class="border-b border-border bg-background" aria-labelledby="track-hero-title">
    <div class="container py-16 lg:py-24">
        <nav class="mb-10 flex items-center gap-2 text-caption text-muted" aria-label="<?php esc_attr_e('Breadcrumb', 'dawp'); ?>">
            <a class="transition-colors duration-400 ease-fluid hover:text-accent-deep" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'dawp'); ?></a>
            <span aria-hidden="true">/</span>
            <span class="text-foreground"><?php esc_html_e('Track Your Order', 'dawp'); ?></span>
        </nav>

        <div class="max-w-3xl">
            <span class="c-rule" aria-hidden="true"></span>
            <p class="c-eyebrow"><?php esc_html_e('Client care', 'dawp'); ?></p>
            <h1 id="track-hero-title" class="font-heading text-h1 font-light leading-[1.02] tracking-tight text-foreground"><?php esc_html_e('Follow your watch from the bench to your door.', 'dawp'); ?></h1>
            <p class="c-lede"><?php esc_html_e('Enter the order number from your confirmation email and the address you used at checkout.', 'dawp'); ?></p>
        </div>
    </div>
</section>

<!-- ============================================================ FORM -->
<section class="border-b border-border bg-surface-alt section-y" aria-labelledby="track-form-title">
    <div class="container grid gap-12 lg:grid-cols-[1.1fr_0.9fr] lg:gap-20">

        <div class="track-order-panel">
            <h2 id="track-form-title" class="font-heading text-h2 font-light leading-none text-foreground"><?php esc_html_e('Order lookup', 'dawp'); ?></h2>
            <p class="mt-4 text-body-sm text-foreground-muted"><?php esc_html_e('Your order number begins with CHR- and appears at the top of your confirmation email.', 'dawp'); ?></p>

            <div class="track-order-form">
                <?php
                if (shortcode_exists('woocommerce_order_tracking')) {
                    echo do_shortcode('[woocommerce_order_tracking]');
                } else {
                    ?>
                    <p class="mt-6 text-body-sm text-foreground-muted">
                        <?php
                        printf(
                            /* translators: %s: support email link */
                            esc_html__('Order tracking is temporarily unavailable. Write to %s with your order number and we will check it for you.', 'dawp'),
                            '<a class="text-accent-deep underline underline-offset-4" href="mailto:' . esc_attr($dawp_support_email) . '">' . esc_html($dawp_support_email) . '</a>'
                        );
                        ?>
                    </p>
                    <?php
                }
                ?>
            </div>
        </div>

        <aside class="border border-border bg-background p-8 lg:p-10">
            <span class="c-rule" aria-hidden="true"></span>
            <h2 class="font-heading text-h3 leading-none text-foreground"><?php esc_html_e('What the statuses mean', 'dawp'); ?></h2>

            <dl class="m-0 mt-6 space-y-0">
                <?php
                $dawp_statuses = [
                    ['t' => __('Processing', 'dawp'), 'd' => __('Your order is confirmed and the watch is being prepared. Sizing and engraving happen at this stage.', 'dawp')],
                    ['t' => __('On hold', 'dawp'), 'd' => __('We are waiting on something — usually payment verification. Client care will already have written to you.', 'dawp')],
                    ['t' => __('Completed', 'dawp'), 'd' => __('The watch has left the atelier. Your dispatch email carries the carrier tracking link.', 'dawp')],
                    ['t' => __('Cancelled', 'dawp'), 'd' => __('The order was cancelled. Any payment taken is refunded to the original method.', 'dawp')],
                ];
                foreach ($dawp_statuses as $status) : ?>
                    <div class="border-t border-border py-4">
                        <dt class="text-eyebrow uppercase tracking-wide text-accent-deep"><?php echo esc_html($status['t']); ?></dt>
                        <dd class="m-0 mt-2 text-body-sm text-foreground-muted"><?php echo esc_html($status['d']); ?></dd>
                    </div>
                <?php endforeach; ?>
            </dl>

            <p class="mt-6 text-caption text-muted"><?php esc_html_e('Carrier tracking can take up to 24 hours to show movement after dispatch.', 'dawp'); ?></p>
        </aside>
    </div>
</section>

<!-- ============================================================ HELP -->
<section class="bg-background section-y" aria-labelledby="track-help-title">
    <div class="container">
        <div class="mb-12 max-w-2xl">
            <span class="c-rule" aria-hidden="true"></span>
            <p class="c-eyebrow"><?php esc_html_e('If something is wrong', 'dawp'); ?></p>
            <h2 id="track-help-title" class="c-title"><?php esc_html_e('We will sort it out.', 'dawp'); ?></h2>
        </div>

        <ul class="m-0 grid list-none grid-cols-1 gap-px border border-border bg-border p-0 lg:grid-cols-3">
            <?php
            $dawp_help = [
                ['t' => __('Tracking has not moved', 'dawp'), 'd' => __('Allow 24 hours after dispatch. If it is still silent after two business days, write to us and we will chase the carrier.', 'dawp')],
                ['t' => __('Marked delivered, not received', 'dawp'), 'd' => __('Tell us within 7 days. Every shipment is insured, so we open a claim and arrange a replacement or refund.', 'dawp')],
                ['t' => __('Wrong delivery address', 'dawp'), 'd' => __('Write immediately. Before dispatch we can change it; after dispatch we can sometimes reroute with the carrier.', 'dawp')],
            ];
            foreach ($dawp_help as $item) : ?>
                <li class="bg-background p-8">
                    <span class="block h-px w-8 bg-accent" aria-hidden="true"></span>
                    <span class="mt-6 block font-heading text-h3 leading-none text-foreground"><?php echo esc_html($item['t']); ?></span>
                    <span class="mt-3 block text-body-sm text-foreground-muted"><?php echo esc_html($item['d']); ?></span>
                </li>
            <?php endforeach; ?>
        </ul>

        <div class="mt-10 flex flex-wrap gap-4">
            <a class="c-btn" href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact client care', 'dawp'); ?></a>
            <a class="c-btn-ghost" href="<?php echo esc_url(home_url('/faq/')); ?>"><?php esc_html_e('Read the FAQ', 'dawp'); ?></a>
        </div>
    </div>
</section>
