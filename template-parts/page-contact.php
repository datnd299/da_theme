<?php
/**
 * Template Name: Contact Us
 * Template Part: page-contact
 */

$support_email = 'support@brogeshoes.com';
$support_hours = __('Monday-Friday, 9:00 AM-5:00 PM PST', 'dawp');
$store_address = dawp_get_woocommerce_store_address();
?>

<section class="bg-surface py-16 md:py-24">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="grid lg:grid-cols-12 gap-10 lg:gap-12 items-start">
            <div class="lg:col-span-5">
                <div class="mb-10">
                    <span class="text-accent font-medium tracking-widest uppercase text-sm mb-4 block"><?php esc_html_e('Contact Broge Shoes', 'dawp'); ?></span>
                    <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl text-foreground font-bold mb-6">
                        <?php esc_html_e('Customer support for orders, fit, shipping, and returns.', 'dawp'); ?>
                    </h1>
                    <p class="text-foreground-muted text-lg leading-relaxed">
                        <?php esc_html_e('Send us a message with your question and our support team will reply during our Monday-Friday, 9:00 AM-5:00 PM PST business hours. For order questions, include your order number so we can review it faster.', 'dawp'); ?>
                    </p>
                </div>

                <div class="bg-background rounded-lg border border-border shadow-card overflow-hidden mb-6">
                    <?php
                    echo dawp_responsive_theme_image('broge-customer-care.png', __('Broge Shoes customer support desk', 'dawp'), [
                        'class' => 'w-full aspect-[16/10] object-cover',
                        'width' => 760,
                        'height' => 507,
                        'src_width' => 760,
                        'widths' => [400, 640, 760, 1024],
                        'sizes' => '(max-width: 1023px) calc(100vw - 32px), 42vw',
                        'loading' => 'lazy',
                    ]);
                    ?>
                    <div class="p-6">
                        <dl class="space-y-5">
                            <div class="flex gap-4">
                                <dt class="w-11 h-11 rounded-full bg-accent-soft text-accent flex items-center justify-center shrink-0" aria-label="<?php esc_attr_e('Email', 'dawp'); ?>">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M4 4h16v16H4z"></path><path d="m22 6-10 7L2 6"></path></svg>
                                </dt>
                                <dd>
                                    <p class="text-foreground font-semibold"><?php esc_html_e('Email Support', 'dawp'); ?></p>
                                    <a href="mailto:<?php echo esc_attr($support_email); ?>" class="text-foreground-muted hover:text-accent transition-colors"><?php echo esc_html($support_email); ?></a>
                                </dd>
                            </div>
                            <div class="flex gap-4">
                                <dt class="w-11 h-11 rounded-full bg-accent-soft text-accent flex items-center justify-center shrink-0" aria-label="<?php esc_attr_e('Hours', 'dawp'); ?>">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="9"></circle><path d="M12 7v5l3 2"></path></svg>
                                </dt>
                                <dd>
                                    <p class="text-foreground font-semibold"><?php esc_html_e('Business Hours', 'dawp'); ?></p>
                                    <p class="text-foreground-muted"><?php echo esc_html($support_hours); ?></p>
                                </dd>
                            </div>
                            <div class="flex gap-4">
                                <dt class="w-11 h-11 rounded-full bg-accent-soft text-accent flex items-center justify-center shrink-0" aria-label="<?php esc_attr_e('Address', 'dawp'); ?>">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M20 10c0 4.5-8 11-8 11S4 14.5 4 10a8 8 0 0 1 16 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                </dt>
                                <dd>
                                    <p class="text-foreground font-semibold"><?php esc_html_e('Address', 'dawp'); ?></p>
                                    <p class="text-foreground-muted"><?php echo esc_html($store_address); ?></p>
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <div class="grid sm:grid-cols-2 gap-4">
                    <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>" class="block bg-background p-5 rounded-lg border border-border hover:border-accent transition-all">
                        <span class="text-accent font-semibold uppercase text-xs tracking-widest"><?php esc_html_e('Shipping', 'dawp'); ?></span>
                        <p class="text-foreground font-semibold mt-2"><?php esc_html_e('Delivery timelines and tracking help', 'dawp'); ?></p>
                    </a>
                    <a href="<?php echo esc_url(home_url('/refund-return-policy/')); ?>" class="block bg-background p-5 rounded-lg border border-border hover:border-accent transition-all">
                        <span class="text-accent font-semibold uppercase text-xs tracking-widest"><?php esc_html_e('Returns', 'dawp'); ?></span>
                        <p class="text-foreground font-semibold mt-2"><?php esc_html_e('30-day return eligibility', 'dawp'); ?></p>
                    </a>
                </div>
            </div>

            <div class="lg:col-span-7 bg-background p-6 md:p-10 rounded-lg border border-border shadow-card">
                <div class="mb-8">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-3"><?php esc_html_e('Send a Message', 'dawp'); ?></h2>
                    <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Required fields are marked with an asterisk. We use this information only to answer your support request.', 'dawp'); ?></p>
                </div>

                <form id="contact-form" class="space-y-6" novalidate>
                    <input type="text" name="website" class="hidden" tabindex="-1" autocomplete="off" aria-hidden="true">

                    <div class="grid md:grid-cols-2 gap-5">
                        <div class="space-y-2">
                            <label for="contact_name" class="text-sm font-semibold text-foreground"><?php esc_html_e('Name', 'dawp'); ?> <span class="text-accent">*</span></label>
                            <input type="text" id="contact_name" name="name" required autocomplete="name"
                                   class="w-full px-4 py-3 rounded-lg bg-surface border border-border focus:outline-none focus:border-accent focus:ring-1 focus:ring-accent transition-all text-foreground"
                                   placeholder="<?php esc_attr_e('Your full name', 'dawp'); ?>">
                        </div>
                        <div class="space-y-2">
                            <label for="contact_email" class="text-sm font-semibold text-foreground"><?php esc_html_e('Email Address', 'dawp'); ?> <span class="text-accent">*</span></label>
                            <input type="email" id="contact_email" name="email" required autocomplete="email"
                                   class="w-full px-4 py-3 rounded-lg bg-surface border border-border focus:outline-none focus:border-accent focus:ring-1 focus:ring-accent transition-all text-foreground"
                                   placeholder="<?php esc_attr_e('you@example.com', 'dawp'); ?>">
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-5">
                        <div class="space-y-2">
                            <label for="contact_subject" class="text-sm font-semibold text-foreground"><?php esc_html_e('Topic', 'dawp'); ?></label>
                            <select id="contact_subject" name="subject"
                                    class="w-full px-4 py-3 rounded-lg bg-surface border border-border focus:outline-none focus:border-accent focus:ring-1 focus:ring-accent transition-all text-foreground">
                                <option value="general"><?php esc_html_e('General question', 'dawp'); ?></option>
                                <option value="order"><?php esc_html_e('Order or tracking', 'dawp'); ?></option>
                                <option value="sizing"><?php esc_html_e('Sizing or product help', 'dawp'); ?></option>
                                <option value="return"><?php esc_html_e('Return or refund', 'dawp'); ?></option>
                                <option value="privacy"><?php esc_html_e('Privacy request', 'dawp'); ?></option>
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label for="contact_order" class="text-sm font-semibold text-foreground"><?php esc_html_e('Order Number', 'dawp'); ?></label>
                            <input type="text" id="contact_order" name="order_number" autocomplete="off"
                                   class="w-full px-4 py-3 rounded-lg bg-surface border border-border focus:outline-none focus:border-accent focus:ring-1 focus:ring-accent transition-all text-foreground"
                                   placeholder="<?php esc_attr_e('Optional, e.g. SK-1234', 'dawp'); ?>">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="contact_message" class="text-sm font-semibold text-foreground"><?php esc_html_e('Message', 'dawp'); ?> <span class="text-accent">*</span></label>
                        <textarea id="contact_message" name="message" rows="6" required
                                  class="w-full px-4 py-3 rounded-lg bg-surface border border-border focus:outline-none focus:border-accent focus:ring-1 focus:ring-accent transition-all text-foreground resize-none"
                                  placeholder="<?php esc_attr_e('Tell us how we can help.', 'dawp'); ?>"></textarea>
                    </div>

                    <label class="flex items-start gap-3 text-sm text-foreground-muted">
                        <input type="checkbox" name="privacy_confirm" value="1" required class="mt-1 h-4 w-4 rounded border-border text-accent focus:ring-accent">
                        <span>
                            <?php
                            printf(
                                wp_kses(
                                    __('I agree that Broge Shoes may use my submitted information to respond to this request, as described in the <a href="%s" class="text-accent hover:underline font-medium">Privacy Policy</a>.', 'dawp'),
                                    ['a' => ['href' => [], 'class' => []]]
                                ),
                                esc_url(home_url('/privacy-policy/'))
                            );
                            ?>
                        </span>
                    </label>

                    <button type="submit" class="w-full inline-flex items-center justify-center bg-accent text-white px-8 py-4 rounded-full font-medium hover:bg-accent-hover transition-colors shadow-lg shadow-accent/20 disabled:opacity-70 disabled:cursor-not-allowed">
                        <?php esc_html_e('Send Message', 'dawp'); ?>
                    </button>

                    <p id="contact-msg" aria-live="polite" style="display:none" class="text-sm text-center font-semibold"></p>
                </form>
            </div>
        </div>
    </div>
</section>
