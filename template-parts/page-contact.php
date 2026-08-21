<?php
/**
 * Contact page for US Watch Store.
 *
 * Hallmark · genre: modern-minimal · macrostructure: Split Studio (diptych -
 * info column paired with the support form; form field names/logic in
 * inc/contact-form.php are untouched)
 * nav: N12 · footer: Ft1 · design-system: .plans/design_system.md (locked)
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email  = 'support@uswatchstore.com';
$store_address  = function_exists('dawp_get_store_address') ? dawp_get_store_address() : '';
$business_hours = __('Monday - Friday, 9:00 AM - 6:00 PM EST', 'dawp');
$track_url      = home_url('/track-order/');
$faq_url        = home_url('/faq/');
$shipping_url   = home_url('/shipping-policy/');
$privacy_url    = home_url('/privacy-policy/');
$terms_url      = home_url('/terms-of-service/');
$shop_url       = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$status = isset($_GET['contact_status']) ? sanitize_key(wp_unslash($_GET['contact_status'])) : '';

$support_cards = [
    [
        'title' => __('Email Support', 'dawp'),
        'copy'  => sprintf(
            /* translators: %s: support email address */
            __('Send order, product, return, or policy questions to %s.', 'dawp'),
            $support_email
        ),
        'meta'  => $support_email,
        'icon'  => 'mail',
    ],
    [
        'title' => __('Business Hours', 'dawp'),
        'copy'  => __('Messages are reviewed during regular support hours. Response times may vary on weekends and holidays.', 'dawp'),
        'meta'  => $business_hours,
        'icon'  => 'clock',
    ],
];

if (!empty($store_address)) {
    $support_cards[] = [
        'title' => __('Store Location', 'dawp'),
        'copy'  => __('Our business location and fulfillment center for US Watch Store orders.', 'dawp'),
        'meta'  => $store_address,
        'icon'  => 'map-pin',
    ];
}

$support_cards[] = [
    'title' => __('Order Help', 'dawp'),
    'copy'  => __('Include your order number when asking about tracking, address changes, returns, or delivery updates.', 'dawp'),
    'meta'  => __('Order number helps us respond faster', 'dawp'),
    'icon'  => 'package',
];

$help_topics = [
    [
        'title' => __('Orders & Tracking', 'dawp'),
        'copy'  => __('For shipment questions, include your order number and the email used at checkout.', 'dawp'),
        'url'   => $track_url,
    ],
    [
        'title' => __('Shipping & Returns', 'dawp'),
        'copy'  => __('Review processing times, standard US delivery estimates, return eligibility, and refunds.', 'dawp'),
        'url'   => $shipping_url,
    ],
    [
        'title' => __('FAQ', 'dawp'),
        'copy'  => __('Find quick answers about products, checkout, tracking, privacy, and customer support.', 'dawp'),
        'url'   => $faq_url,
    ],
    [
        'title' => __('Privacy Requests', 'dawp'),
        'copy'  => __('Use the contact form for account information questions or privacy-related requests.', 'dawp'),
        'url'   => $privacy_url,
    ],
];

$form_topics = [
    'order'   => __('Order or tracking question', 'dawp'),
    'return'  => __('Return or refund request', 'dawp'),
    'product' => __('Product question', 'dawp'),
    'privacy' => __('Privacy request', 'dawp'),
    'other'   => __('General support', 'dawp'),
];

$render_icon = static function ($icon) {
    $icons = [
        'mail'    => '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-10 6L2 7"/>',
        'clock'   => '<circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>',
        'map-pin' => '<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/>',
        'package' => '<path d="M21 8a2 2 0 0 0-1-1.73L13 2.27a2 2 0 0 0-2 0L4 6.27A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/><path d="m3.3 7 8.7 5 8.7-5"/><path d="M12 22V12"/>',
        'check'   => '<path d="m20 6-11 11-5-5"/>',
        'alert'   => '<circle cx="12" cy="12" r="10"/><path d="M12 8v5"/><path d="M12 17h.01"/>',
    ];

    return $icons[$icon] ?? $icons['mail'];
};
?>

<div class="bg-background text-foreground">
    <section class="bg-surface py-14 sm:py-20" aria-labelledby="contact-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:items-end lg:px-8">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-accent-blush"><?php esc_html_e('Contact Us', 'dawp'); ?></p>
                <h1 id="contact-title" class="mt-4 font-heading text-4xl font-extrabold leading-tight text-foreground sm:text-5xl">
                    <?php esc_html_e('Clear support for your watch order.', 'dawp'); ?>
                </h1>
                <p class="mt-5 max-w-2xl text-base leading-8 text-foreground-muted">
                    <?php esc_html_e('Have a question about an order, a watch, a return request, or store policy? Contact US Watch Store and include the details our support team needs to help.', 'dawp'); ?>
                </p>
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                <?php foreach ($support_cards as $card) : ?>
                    <article class="rounded-md border border-border bg-background p-5 shadow-card">
                        <div class="flex h-11 w-11 items-center justify-center rounded-sm bg-accent-soft text-accent-blush">
                            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <?php echo $render_icon($card['icon']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </svg>
                        </div>
                        <h2 class="mt-4 font-heading text-lg font-extrabold text-foreground"><?php echo esc_html($card['title']); ?></h2>
                        <p class="mt-3 text-sm leading-6 text-foreground-muted"><?php echo esc_html($card['copy']); ?></p>
                        <p class="mt-4 text-sm font-bold text-accent-hover"><?php echo esc_html($card['meta']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Split Studio: info aside / form -->
    <section class="bg-background py-14 sm:py-20" aria-labelledby="contact-form-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.8fr_1.2fr] lg:px-8">
            <aside class="lg:sticky lg:top-24 lg:self-start">
                <div class="rounded-md border border-border bg-background p-6 shadow-card">
                    <h2 class="font-heading text-2xl font-extrabold text-foreground"><?php esc_html_e('Before you send', 'dawp'); ?></h2>
                    <p class="mt-4 text-sm leading-7 text-foreground-muted">
                        <?php esc_html_e('For order questions, include your order number and the email used at checkout. For product questions, include the product name or link if available.', 'dawp'); ?>
                    </p>

                    <div class="mt-6 grid gap-3 text-sm leading-6 text-foreground-muted">
                        <div class="flex gap-3 rounded-sm bg-surface p-4">
                            <svg class="mt-0.5 h-5 w-5 shrink-0 text-accent-blush" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <?php echo $render_icon('check'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </svg>
                            <span><strong class="text-foreground"><?php esc_html_e('Response Time:', 'dawp'); ?></strong> <?php esc_html_e('We aim to reply within 1 business day.', 'dawp'); ?></span>
                        </div>
                        <div class="flex gap-3 rounded-sm bg-surface p-4">
                            <svg class="mt-0.5 h-5 w-5 shrink-0 text-accent-blush" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <?php echo $render_icon('check'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </svg>
                            <span><?php esc_html_e('Orders are processed within 1-3 business days.', 'dawp'); ?></span>
                        </div>
                        <div class="flex gap-3 rounded-sm bg-surface p-4">
                            <svg class="mt-0.5 h-5 w-5 shrink-0 text-accent-blush" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <?php echo $render_icon('check'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </svg>
                            <span><?php esc_html_e('Standard US shipping typically takes 3-7 business days after dispatch.', 'dawp'); ?></span>
                        </div>
                        <div class="flex gap-3 rounded-sm bg-surface p-4">
                            <svg class="mt-0.5 h-5 w-5 shrink-0 text-accent-blush" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <?php echo $render_icon('check'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </svg>
                            <span><?php esc_html_e('Eligible unused watches may be returned within 30 days of delivery.', 'dawp'); ?></span>
                        </div>
                    </div>

                    <p class="mt-6 text-sm leading-7 text-foreground-muted">
                        <?php
                        echo wp_kses(
                            sprintf(
                                /* translators: 1: support email link, 2: business hours */
                                __('Prefer email? Contact %1$s. Business hours: %2$s.', 'dawp'),
                                '<a class="font-bold text-accent-hover underline decoration-accent/40 underline-offset-4 transition hover:text-foreground" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>',
                                esc_html($business_hours)
                            ),
                            [
                                'a' => [
                                    'class' => [],
                                    'href'  => [],
                                ],
                            ]
                        );
                        ?>
                    </p>
                </div>
            </aside>

            <div class="rounded-md border border-border bg-background p-6 shadow-card sm:p-8">
                <div class="max-w-2xl">
                    <h2 id="contact-form-title" class="font-heading text-3xl font-extrabold leading-tight text-foreground">
                        <?php esc_html_e('Send us a message.', 'dawp'); ?>
                    </h2>
                    <p class="mt-3 text-sm leading-7 text-foreground-muted">
                        <?php esc_html_e('We use the information you provide to respond to your request and support your shopping experience.', 'dawp'); ?>
                    </p>
                </div>

                <?php if ($status === 'success') : ?>
                    <div class="mt-6 flex gap-3 rounded-sm border border-success/30 bg-success/10 p-4 text-sm leading-6 text-success" role="status">
                        <svg class="mt-0.5 h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <?php echo $render_icon('check'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                        </svg>
                        <p><?php esc_html_e('Thank you. Your message has been sent to US Watch Store support.', 'dawp'); ?></p>
                    </div>
                <?php elseif ($status === 'error') : ?>
                    <div class="mt-6 flex gap-3 rounded-sm border border-alert/30 bg-alert/10 p-4 text-sm leading-6 text-alert" role="alert">
                        <svg class="mt-0.5 h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <?php echo $render_icon('alert'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                        </svg>
                        <p><?php esc_html_e('Please check the required fields and try again, or email support directly.', 'dawp'); ?></p>
                    </div>
                <?php endif; ?>

                <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" class="mt-8 grid gap-5">
                    <input type="hidden" name="action" value="lbq_contact_form">
                    <?php wp_nonce_field('lbq_contact_form', 'lbq_contact_nonce'); ?>

                    <div class="hidden" aria-hidden="true">
                        <label for="company-website"><?php esc_html_e('Company website', 'dawp'); ?></label>
                        <input id="company-website" type="text" name="company_website" tabindex="-1" autocomplete="off">
                    </div>

                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="contact-name" class="block text-sm font-extrabold text-foreground"><?php esc_html_e('Name', 'dawp'); ?> <span class="text-accent-blush">*</span></label>
                            <input id="contact-name" name="contact_name" type="text" autocomplete="name" required class="mt-2 block min-h-12 w-full rounded-sm border border-border bg-background px-4 text-sm text-foreground outline-none transition placeholder:text-muted focus:border-accent focus:ring-4 focus:ring-accent-soft" placeholder="<?php esc_attr_e('Your name', 'dawp'); ?>">
                        </div>

                        <div>
                            <label for="contact-email" class="block text-sm font-extrabold text-foreground"><?php esc_html_e('Email', 'dawp'); ?> <span class="text-accent-blush">*</span></label>
                            <input id="contact-email" name="contact_email" type="email" autocomplete="email" required class="mt-2 block min-h-12 w-full rounded-sm border border-border bg-background px-4 text-sm text-foreground outline-none transition placeholder:text-muted focus:border-accent focus:ring-4 focus:ring-accent-soft" placeholder="<?php esc_attr_e('you@example.com', 'dawp'); ?>">
                        </div>
                    </div>

                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="contact-topic" class="block text-sm font-extrabold text-foreground"><?php esc_html_e('Topic', 'dawp'); ?></label>
                            <select id="contact-topic" name="contact_topic" class="mt-2 block min-h-12 w-full rounded-sm border border-border bg-background px-4 text-sm text-foreground outline-none transition focus:border-accent focus:ring-4 focus:ring-accent-soft">
                                <?php foreach ($form_topics as $value => $label) : ?>
                                    <option value="<?php echo esc_attr($value); ?>"><?php echo esc_html($label); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div>
                            <label for="order-number" class="block text-sm font-extrabold text-foreground"><?php esc_html_e('Order number', 'dawp'); ?></label>
                            <input id="order-number" name="order_number" type="text" autocomplete="off" class="mt-2 block min-h-12 w-full rounded-sm border border-border bg-background px-4 text-sm text-foreground outline-none transition placeholder:text-muted focus:border-accent focus:ring-4 focus:ring-accent-soft" placeholder="<?php esc_attr_e('Optional', 'dawp'); ?>">
                        </div>
                    </div>

                    <div>
                        <label for="contact-message" class="block text-sm font-extrabold text-foreground"><?php esc_html_e('Message', 'dawp'); ?> <span class="text-accent-blush">*</span></label>
                        <textarea id="contact-message" name="contact_message" rows="7" required class="mt-2 block w-full resize-y rounded-sm border border-border bg-background px-4 py-3 text-sm leading-7 text-foreground outline-none transition placeholder:text-muted focus:border-accent focus:ring-4 focus:ring-accent-soft" placeholder="<?php esc_attr_e('Tell us how we can help.', 'dawp'); ?>"></textarea>
                    </div>

                    <div class="rounded-sm bg-surface p-4 text-sm leading-6 text-foreground-muted">
                        <?php
                        echo wp_kses(
                            sprintf(
                                /* translators: privacy policy link */
                                __('By submitting this form, you agree that US Watch Store may use your details to respond to your request. Review our %s for more information.', 'dawp'),
                                '<a class="font-bold text-accent-hover underline decoration-accent/40 underline-offset-4 transition hover:text-foreground" href="' . esc_url($privacy_url) . '">' . esc_html__('Privacy Policy', 'dawp') . '</a>'
                            ),
                            [
                                'a' => [
                                    'class' => [],
                                    'href'  => [],
                                ],
                            ]
                        );
                        ?>
                    </div>

                    <button type="submit" class="inline-flex min-h-12 w-full items-center justify-center whitespace-nowrap rounded-sm bg-accent px-6 text-sm font-bold text-white transition hover:bg-accent-hover sm:w-auto">
                        <?php esc_html_e('Send Message', 'dawp'); ?>
                    </button>
                </form>
            </div>
        </div>
    </section>

    <section class="bg-surface py-14 sm:py-20" aria-labelledby="contact-help-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-3xl">
                    <h2 id="contact-help-title" class="font-heading text-3xl font-extrabold leading-tight text-foreground sm:text-4xl">
                        <?php esc_html_e('Find the right support information faster.', 'dawp'); ?>
                    </h2>
                    <p class="mt-4 text-base leading-7 text-foreground-muted">
                        <?php esc_html_e('Review the policy pages for complete details about shipping, returns, privacy, and store terms before submitting a request.', 'dawp'); ?>
                    </p>
                </div>
                <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center whitespace-nowrap rounded-sm border border-accent bg-background px-6 text-sm font-bold text-accent-hover transition hover:bg-surface-alt">
                    <?php esc_html_e('Shop Products', 'dawp'); ?>
                </a>
            </div>

            <div class="mt-10 grid gap-5 md:grid-cols-2 lg:grid-cols-4">
                <?php foreach ($help_topics as $topic) : ?>
                    <a href="<?php echo esc_url($topic['url']); ?>" class="group rounded-md border border-border bg-background p-6 shadow-card transition hover:border-accent">
                        <h3 class="font-heading text-lg font-extrabold text-foreground transition group-hover:text-accent-hover"><?php echo esc_html($topic['title']); ?></h3>
                        <p class="mt-3 text-sm leading-6 text-foreground-muted"><?php echo esc_html($topic['copy']); ?></p>
                        <span class="mt-5 inline-flex text-sm font-bold text-accent-blush">
                            <?php esc_html_e('View details', 'dawp'); ?>
                            <span class="ml-2" aria-hidden="true">→</span>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-background py-14 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-md border border-border bg-surface p-6 sm:p-8">
                <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <h2 class="font-heading text-2xl font-extrabold text-foreground"><?php esc_html_e('Transparent customer care for US Watch Store orders.', 'dawp'); ?></h2>
                        <p class="mt-3 text-sm leading-7 text-foreground-muted">
                            <?php esc_html_e('US Watch Store keeps support, shipping, return, privacy, and terms information visible so customers can shop quartz, mechanical, smart, and digital watches with clear expectations.', 'dawp'); ?>
                        </p>
                    </div>
                    <div class="flex flex-col gap-3 sm:flex-row">
                        <a href="<?php echo esc_url($shipping_url); ?>" class="inline-flex min-h-12 items-center justify-center whitespace-nowrap rounded-sm bg-foreground px-6 text-sm font-bold text-white transition hover:bg-accent-hover">
                            <?php esc_html_e('Shipping & Returns', 'dawp'); ?>
                        </a>
                        <a href="<?php echo esc_url($terms_url); ?>" class="inline-flex min-h-12 items-center justify-center whitespace-nowrap rounded-sm border border-accent bg-background px-6 text-sm font-bold text-accent-hover transition hover:bg-surface-alt">
                            <?php esc_html_e('Terms & Conditions', 'dawp'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
