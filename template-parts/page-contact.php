<?php
/**
 * Contact page — YourWatchStore. Tailwind utilities only.
 * Form posts to the `dawp_contact` AJAX action (see inc/newsletter.php, assets/js/main.js).
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email  = 'support@yourwatchstore.com';
$business_hours = __('Monday - Friday, 9:00 AM - 5:00 PM EST', 'dawp');
$store_address  = function_exists('dawp_get_woocommerce_store_address') ? dawp_get_woocommerce_store_address() : '';

$subjects = [
    'general'  => __('General inquiry', 'dawp'),
    'order'    => __('Order support', 'dawp'),
    'product'  => __('Product question', 'dawp'),
    'shipping' => __('Shipping question', 'dawp'),
    'return'   => __('Returns & refunds', 'dawp'),
    'other'    => __('Other', 'dawp'),
];

$quick_links = [
    ['label' => __('Track your order', 'dawp'), 'url' => home_url('/track-order/')],
    ['label' => __('Shipping Policy', 'dawp'),  'url' => home_url('/shipping-policy/')],
    ['label' => __('Refund & Return Policy', 'dawp'), 'url' => home_url('/refund-return-policy/')],
    ['label' => __('Read the FAQ', 'dawp'),     'url' => home_url('/faq/')],
];

$field_class = 'w-full rounded-sm border border-border bg-surface px-4 py-3 text-sm text-foreground outline-none transition placeholder:text-muted focus:border-foreground';
?>

<div class="bg-background text-foreground">
    <section class="border-b border-border">
        <div class="mx-auto max-w-3xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
            <p class="text-xs font-bold uppercase tracking-[0.16em] text-accent-blush"><?php esc_html_e('Contact', 'dawp'); ?></p>
            <h1 class="mt-4 font-heading text-4xl font-extrabold leading-tight tracking-tight text-foreground sm:text-5xl"><?php esc_html_e('Get in touch', 'dawp'); ?></h1>
            <p class="mt-5 text-base leading-7 text-foreground-muted"><?php esc_html_e('Send us a message and our support team will reply within one business day.', 'dawp'); ?></p>
        </div>
    </section>

    <section class="mx-auto max-w-[1280px] px-4 py-14 sm:px-6 lg:px-8 lg:py-16">
        <div class="grid gap-10 lg:grid-cols-[1fr_0.7fr] lg:gap-16">
            <div>
                <form id="contact-form" class="grid gap-4" novalidate>
                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label class="mb-1.5 block text-sm font-semibold text-foreground" for="contact-name"><?php esc_html_e('Name', 'dawp'); ?></label>
                            <input class="<?php echo esc_attr($field_class); ?>" type="text" id="contact-name" name="name" required autocomplete="name">
                        </div>
                        <div>
                            <label class="mb-1.5 block text-sm font-semibold text-foreground" for="contact-email"><?php esc_html_e('Email', 'dawp'); ?></label>
                            <input class="<?php echo esc_attr($field_class); ?>" type="email" id="contact-email" name="email" required autocomplete="email">
                        </div>
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-semibold text-foreground" for="contact-subject"><?php esc_html_e('Subject', 'dawp'); ?></label>
                        <select class="<?php echo esc_attr($field_class); ?>" id="contact-subject" name="subject">
                            <?php foreach ($subjects as $value => $label) : ?>
                                <option value="<?php echo esc_attr($value); ?>"><?php echo esc_html($label); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-semibold text-foreground" for="contact-message"><?php esc_html_e('Message', 'dawp'); ?></label>
                        <textarea class="<?php echo esc_attr($field_class); ?>" id="contact-message" name="message" rows="6" required placeholder="<?php esc_attr_e('Include your order number if your question is about an existing order.', 'dawp'); ?>"></textarea>
                    </div>
                    <button type="submit" class="inline-flex min-h-[3rem] items-center justify-center rounded-sm bg-foreground px-7 text-sm font-semibold uppercase tracking-[0.06em] text-white transition hover:bg-accent-hover">
                        <?php esc_html_e('Send Message', 'dawp'); ?>
                    </button>
                    <p id="contact-msg" class="text-sm font-medium" style="display:none;" role="status"></p>
                </form>
            </div>

            <aside class="space-y-8">
                <div class="rounded-md border border-border bg-surface-alt p-6">
                    <h2 class="font-heading text-lg font-bold text-foreground"><?php esc_html_e('Email us', 'dawp'); ?></h2>
                    <a class="mt-1 block text-sm font-semibold text-accent-blush underline underline-offset-2" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
                    <p class="mt-3 text-sm font-semibold leading-6 text-foreground"><?php esc_html_e('We reply to every message within 1 business day.', 'dawp'); ?></p>
                    <p class="mt-3 text-sm leading-6 text-foreground-muted"><?php echo esc_html($business_hours); ?></p>
                    <?php if ($store_address) : ?>
                        <p class="mt-3 text-sm leading-6 text-foreground-muted"><?php echo esc_html($store_address); ?></p>
                    <?php endif; ?>
                </div>

                <div>
                    <h2 class="font-heading text-lg font-bold text-foreground"><?php esc_html_e('Before you write', 'dawp'); ?></h2>
                    <ul class="mt-3 space-y-2 text-sm text-foreground-muted">
                        <?php foreach ($quick_links as $link) : ?>
                            <li><a class="font-semibold text-accent-blush underline underline-offset-2 transition hover:text-foreground" href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['label']); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </aside>
        </div>
    </section>
</div>
