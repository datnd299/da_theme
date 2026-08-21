<?php
/**
 * Contact — client care details and the enquiry form.
 */

defined('ABSPATH') || exit;

$dawp_support_email = dawp_brand('support_email');
$dawp_atelier_email = dawp_brand('atelier_email');
$dawp_store_address = function_exists('dawp_get_woocommerce_store_address') ? dawp_get_woocommerce_store_address() : '';
?>

<!-- ============================================================ HERO -->
<section class="border-b border-border bg-background" aria-labelledby="contact-hero-title">
    <div class="container py-16 lg:py-24">
        <nav class="mb-10 flex items-center gap-2 text-caption text-muted" aria-label="<?php esc_attr_e('Breadcrumb', 'dawp'); ?>">
            <a class="transition-colors duration-400 ease-fluid hover:text-accent-deep" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'dawp'); ?></a>
            <span aria-hidden="true">/</span>
            <span class="text-foreground"><?php esc_html_e('Contact', 'dawp'); ?></span>
        </nav>

        <div class="max-w-3xl">
            <span class="c-rule" aria-hidden="true"></span>
            <p class="c-eyebrow"><?php esc_html_e('Client care', 'dawp'); ?></p>
            <h1 id="contact-hero-title" class="font-heading text-h1 font-light leading-[1.02] tracking-tight text-foreground"><?php esc_html_e('Write to us. A person will answer.', 'dawp'); ?></h1>
            <p class="c-lede"><?php esc_html_e('Orders, sizing, servicing, or warranty. We reply within one business day.', 'dawp'); ?></p>
        </div>
    </div>
</section>

<!-- ============================================================ CHANNELS -->
<section class="border-b border-border bg-background" aria-labelledby="channels-title">
    <div class="container pb-16 lg:pb-24">
        <h2 id="channels-title" class="sr-only"><?php esc_html_e('How to reach us', 'dawp'); ?></h2>

        <dl class="m-0 grid grid-cols-1 gap-px border border-border bg-border sm:grid-cols-2 lg:grid-cols-4">
            <div class="bg-background p-8">
                <dt class="text-eyebrow uppercase tracking-wide text-muted"><?php esc_html_e('Client care', 'dawp'); ?></dt>
                <dd class="m-0 mt-3">
                    <a class="font-heading text-h3 text-foreground transition-colors duration-400 ease-fluid hover:text-accent-deep" href="mailto:<?php echo esc_attr($dawp_support_email); ?>"><?php echo esc_html($dawp_support_email); ?></a>
                    <span class="mt-2 block text-body-sm text-foreground-muted"><?php esc_html_e('Orders, delivery, returns, servicing.', 'dawp'); ?></span>
                </dd>
            </div>
            <div class="bg-background p-8">
                <dt class="text-eyebrow uppercase tracking-wide text-muted"><?php esc_html_e('The atelier', 'dawp'); ?></dt>
                <dd class="m-0 mt-3">
                    <a class="font-heading text-h3 text-foreground transition-colors duration-400 ease-fluid hover:text-accent-deep" href="mailto:<?php echo esc_attr($dawp_atelier_email); ?>"><?php echo esc_html($dawp_atelier_email); ?></a>
                    <span class="mt-2 block text-body-sm text-foreground-muted"><?php esc_html_e('Technical questions about your watch.', 'dawp'); ?></span>
                </dd>
            </div>
            <div class="bg-background p-8">
                <dt class="text-eyebrow uppercase tracking-wide text-muted"><?php esc_html_e('Hours', 'dawp'); ?></dt>
                <dd class="m-0 mt-3">
                    <span class="block font-heading text-h3 text-foreground"><?php esc_html_e('Mon – Fri', 'dawp'); ?></span>
                    <span class="mt-2 block text-body-sm text-foreground-muted"><?php echo esc_html(dawp_brand('hours')); ?></span>
                </dd>
            </div>
            <div class="bg-background p-8">
                <dt class="text-eyebrow uppercase tracking-wide text-muted"><?php esc_html_e('Response time', 'dawp'); ?></dt>
                <dd class="m-0 mt-3">
                    <span class="block font-heading text-h3 text-foreground"><?php esc_html_e('1 business day', 'dawp'); ?></span>
                </dd>
            </div>
        </dl>

        <?php if ($dawp_store_address) : ?>
            <p class="mt-6 text-caption text-muted">
                <span class="text-eyebrow uppercase tracking-wide text-accent-deep"><?php esc_html_e('Business Address', 'dawp'); ?></span>
                <span class="ml-3"><?php echo esc_html($dawp_store_address); ?></span>
                <span class="ml-3"><?php esc_html_e('Visits by appointment only.', 'dawp'); ?></span>
            </p>
        <?php endif; ?>
    </div>
</section>

<!-- ============================================================ FORM -->
<section class="border-b border-border bg-surface-alt section-y" aria-labelledby="contact-form-title">
    <div class="container grid gap-14 lg:grid-cols-[0.8fr_1.2fr] lg:gap-24">

        <div>
            <span class="c-rule" aria-hidden="true"></span>
            <p class="c-eyebrow"><?php esc_html_e('Send a message', 'dawp'); ?></p>
            <h2 id="contact-form-title" class="c-title"><?php esc_html_e('Tell us what you need.', 'dawp'); ?></h2>
            <p class="c-lede"><?php esc_html_e('If your question is about an existing order, include the order number so we can answer in one reply rather than three.', 'dawp'); ?></p>

            <ul class="m-0 mt-10 list-none space-y-4 border-t border-border p-0 pt-8 text-body-sm">
                <li><a class="c-link" href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track your order', 'dawp'); ?></a></li>
                <li><a class="c-link" href="<?php echo esc_url(home_url('/faq/')); ?>"><?php esc_html_e('Read the FAQ', 'dawp'); ?></a></li>
                <li><a class="c-link" href="<?php echo esc_url(home_url('/service-warranty/')); ?>"><?php esc_html_e('Service & warranty', 'dawp'); ?></a></li>
            </ul>
        </div>

        <form id="contact-form" class="border border-border bg-background p-8 lg:p-12" novalidate>
            <div class="grid gap-6 sm:grid-cols-2">
                <div>
                    <label class="c-label" for="contact-name"><?php esc_html_e('Name', 'dawp'); ?> <span class="text-accent-deep" aria-hidden="true">*</span></label>
                    <input class="c-field" id="contact-name" name="name" type="text" required autocomplete="name">
                </div>
                <div>
                    <label class="c-label" for="contact-email"><?php esc_html_e('Email', 'dawp'); ?> <span class="text-accent-deep" aria-hidden="true">*</span></label>
                    <input class="c-field" id="contact-email" name="email" type="email" required autocomplete="email">
                </div>
            </div>

            <div class="mt-6">
                <label class="c-label" for="contact-subject"><?php esc_html_e('Subject', 'dawp'); ?></label>
                <select class="c-field" id="contact-subject" name="subject">
                    <option value="general"><?php esc_html_e('General enquiry', 'dawp'); ?></option>
                    <option value="order"><?php esc_html_e('Order support', 'dawp'); ?></option>
                    <option value="service"><?php esc_html_e('Service & warranty', 'dawp'); ?></option>
                    <option value="shipping"><?php esc_html_e('Delivery', 'dawp'); ?></option>
                    <option value="return"><?php esc_html_e('Returns', 'dawp'); ?></option>
                    <option value="press"><?php esc_html_e('Press', 'dawp'); ?></option>
                    <option value="other"><?php esc_html_e('Other', 'dawp'); ?></option>
                </select>
            </div>

            <div class="mt-6">
                <label class="c-label" for="contact-message"><?php esc_html_e('Message', 'dawp'); ?> <span class="text-accent-deep" aria-hidden="true">*</span></label>
                <textarea class="c-field min-h-[180px] py-4" id="contact-message" name="message" rows="7" required placeholder="<?php esc_attr_e('Include your order number if this is about an existing order.', 'dawp'); ?>"></textarea>
            </div>

            <button class="c-btn mt-8 w-full sm:w-auto" type="submit"><?php esc_html_e('Send message', 'dawp'); ?></button>
            <p id="contact-msg" class="c-form-msg mt-4 text-caption" role="status" aria-live="polite"></p>
            <p class="mt-4 text-caption text-muted"><?php esc_html_e('We use your details to answer this message only. See our Privacy Policy.', 'dawp'); ?></p>
        </form>
    </div>
</section>

<!-- ============================================================ QUICK ANSWERS -->
<section class="bg-background section-y" aria-labelledby="quick-title">
    <div class="container">
        <div class="mb-12 max-w-2xl">
            <span class="c-rule" aria-hidden="true"></span>
            <p class="c-eyebrow"><?php esc_html_e('Before you write', 'dawp'); ?></p>
            <h2 id="quick-title" class="c-title"><?php esc_html_e('These come up most often.', 'dawp'); ?></h2>
        </div>

        <ul class="m-0 grid list-none grid-cols-1 gap-px border border-border bg-border p-0 lg:grid-cols-3">
            <?php
            $dawp_quick = [
                ['t' => __('Where is my order?', 'dawp'), 'd' => __('A tracking link is emailed the moment your watch leaves the atelier. You can also check the Track Your Order page.', 'dawp'), 'url' => home_url('/track-order/'), 'cta' => __('Track your order', 'dawp')],
                ['t' => __('Which size should I choose?', 'dawp'), 'd' => __('Send us your wrist measurement and we will recommend a case size and set the bracelet before dispatch.', 'dawp'), 'url' => home_url('/faq/'), 'cta' => __('Sizing guidance', 'dawp')],
                ['t' => __('How do I return a watch?', 'dawp'), 'd' => __('Thirty days from delivery, unworn and complete. Write to client care and we will issue a return authorisation.', 'dawp'), 'url' => home_url('/returns/'), 'cta' => __('Returns policy', 'dawp')],
            ];
            foreach ($dawp_quick as $item) : ?>
                <li class="bg-background p-8">
                    <span class="block font-heading text-h3 leading-none text-foreground"><?php echo esc_html($item['t']); ?></span>
                    <span class="mt-3 block text-body-sm text-foreground-muted"><?php echo esc_html($item['d']); ?></span>
                    <a class="c-link mt-6 inline-block" href="<?php echo esc_url($item['url']); ?>"><?php echo esc_html($item['cta']); ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
