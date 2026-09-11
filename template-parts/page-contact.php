<?php
/**
 * Contact Us- Watchfavor.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$topics = [
    'order'    => __('Order or tracking question', 'dawp'),
    'shipping' => __('Shipping question', 'dawp'),
    'return'   => __('Return or refund request', 'dawp'),
    'billing'  => __('Billing or payment question', 'dawp'),
    'product'  => __('Product question', 'dawp'),
    'privacy'  => __('Privacy request', 'dawp'),
    'other'    => __('General support', 'dawp'),
];

$preselected_topic = isset($_GET['topic']) ? sanitize_key(wp_unslash($_GET['topic'])) : '';
if (!isset($topics[$preselected_topic])) {
    $preselected_topic = '';
}

$status = isset($_GET['contact_status']) ? sanitize_key(wp_unslash($_GET['contact_status'])) : '';
?>
<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>

<div class="bg-background text-foreground">
    <section class="bg-primary text-white">
        <div class="mx-auto max-w-3xl px-4 py-14 text-center sm:px-6 lg:px-8 lg:py-16">
            <p class="font-heading text-xs font-semibold uppercase tracking-brand text-accent"><?php esc_html_e('Get in Touch', 'dawp'); ?></p>
            <h1 class="mt-4 font-heading text-3xl font-semibold sm:text-4xl"><?php esc_html_e('Contact Us', 'dawp'); ?></h1>
            <p class="mx-auto mt-5 max-w-xl text-base leading-8 text-white/75"><?php esc_html_e('Questions about an order, a return, or a piece you are considering- we reply within 1 business day.', 'dawp'); ?></p>
        </div>
    </section>

    <section class="py-16 sm:py-20">
        <div class="mx-auto grid max-w-4xl gap-12 px-4 sm:px-6 lg:grid-cols-5 lg:px-8">

            <div class="lg:col-span-2">
                <h2 class="font-heading text-lg font-semibold text-primary"><?php esc_html_e('Reach Us Directly', 'dawp'); ?></h2>
                <dl class="mt-6 space-y-6 text-sm">
                    <div>
                        <dt class="font-heading text-xs font-semibold uppercase tracking-label text-muted"><?php esc_html_e('Email', 'dawp'); ?></dt>
                        <dd class="mt-2"><a href="mailto:<?php echo esc_attr(dawp_store_email()); ?>" class="text-primary underline decoration-accent decoration-2 underline-offset-4 transition hover:text-accent-hover"><?php echo esc_html(dawp_store_email()); ?></a></dd>
                    </div>
                    <div>
                        <dt class="font-heading text-xs font-semibold uppercase tracking-label text-muted"><?php esc_html_e('Support Hours', 'dawp'); ?></dt>
                        <dd class="mt-2 text-foreground-muted"><?php esc_html_e('Monday-Friday, 9 AM-5 PM EST', 'dawp'); ?></dd>
                    </div>
                    <div>
                        <dt class="font-heading text-xs font-semibold uppercase tracking-label text-muted"><?php esc_html_e('Response Time', 'dawp'); ?></dt>
                        <dd class="mt-2 text-foreground-muted"><?php esc_html_e('Within 1 business day', 'dawp'); ?></dd>
                    </div>
                </dl>
            </div>

            <div class="lg:col-span-3">
                <?php if ('success' === $status) : ?>
                    <p class="rounded-md border border-success bg-surface-alt px-5 py-4 text-sm text-success" role="status"><?php esc_html_e('Thanks- your message has been sent. We will reply within 1 business day.', 'dawp'); ?></p>
                <?php elseif ('captcha' === $status) : ?>
                    <p class="rounded-md border border-alert bg-surface-alt px-5 py-4 text-sm text-alert" role="alert"><?php esc_html_e('We could not verify you are human. Please try again.', 'dawp'); ?></p>
                <?php elseif ('error' === $status) : ?>
                    <p class="rounded-md border border-alert bg-surface-alt px-5 py-4 text-sm text-alert" role="alert"><?php esc_html_e('Something went wrong- please fill in every required field and try again.', 'dawp'); ?></p>
                <?php endif; ?>

                <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="mt-6 space-y-5">
                    <input type="hidden" name="action" value="lbq_contact_form">
                    <?php wp_nonce_field('lbq_contact_form', 'lbq_contact_nonce'); ?>
                    <div class="absolute -left-[9999px]" aria-hidden="true">
                        <label for="company_website"><?php esc_html_e('Leave this field empty', 'dawp'); ?></label>
                        <input type="text" id="company_website" name="company_website" tabindex="-1" autocomplete="off">
                    </div>

                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="contact_name" class="font-heading text-xs font-semibold uppercase tracking-label text-foreground"><?php esc_html_e('Name', 'dawp'); ?> <span class="text-accent-hover">*</span></label>
                            <input type="text" id="contact_name" name="contact_name" required class="mt-2 w-full min-h-12 border border-line bg-surface px-4 text-sm text-foreground outline-none transition focus:border-accent">
                        </div>
                        <div>
                            <label for="contact_email" class="font-heading text-xs font-semibold uppercase tracking-label text-foreground"><?php esc_html_e('Email', 'dawp'); ?> <span class="text-accent-hover">*</span></label>
                            <input type="email" id="contact_email" name="contact_email" required class="mt-2 w-full min-h-12 border border-line bg-surface px-4 text-sm text-foreground outline-none transition focus:border-accent">
                        </div>
                    </div>

                    <div>
                        <label for="contact_topic" class="font-heading text-xs font-semibold uppercase tracking-label text-foreground"><?php esc_html_e('Topic', 'dawp'); ?></label>
                        <select id="contact_topic" name="contact_topic" class="mt-2 w-full min-h-12 border border-line bg-surface px-4 text-sm text-foreground outline-none transition focus:border-accent">
                            <?php foreach ($topics as $key => $label) : ?>
                                <option value="<?php echo esc_attr($key); ?>" <?php selected($preselected_topic, $key); ?>><?php echo esc_html($label); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <label for="order_number" class="font-heading text-xs font-semibold uppercase tracking-label text-foreground"><?php esc_html_e('Order Number', 'dawp'); ?> <span class="text-muted normal-case">(<?php esc_html_e('optional', 'dawp'); ?>)</span></label>
                        <input type="text" id="order_number" name="order_number" placeholder="WF-10234" class="mt-2 w-full min-h-12 border border-line bg-surface px-4 text-sm text-foreground outline-none transition focus:border-accent">
                    </div>

                    <div>
                        <label for="contact_message" class="font-heading text-xs font-semibold uppercase tracking-label text-foreground"><?php esc_html_e('Message', 'dawp'); ?> <span class="text-accent-hover">*</span></label>
                        <textarea id="contact_message" name="contact_message" rows="5" required class="mt-2 w-full border border-line bg-surface px-4 py-3 text-sm text-foreground outline-none transition focus:border-accent"></textarea>
                    </div>

                    <div class="cf-turnstile" data-sitekey="<?php echo esc_attr(DAWP_TURNSTILE_SITE_KEY); ?>"></div>

                    <button type="submit" class="inline-flex min-h-12 w-full items-center justify-center bg-primary px-8 font-heading text-xs font-semibold uppercase tracking-button text-white transition hover:bg-primary-soft sm:w-auto">
                        <?php esc_html_e('Send Message', 'dawp'); ?>
                    </button>
                </form>
            </div>
        </div>
    </section>
</div>
