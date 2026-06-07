<?php
/**
 * Contact page for LBQ Shop.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email  = 'support@lbqshop.com';
$business_hours = __('Monday - Friday, 9:00 AM - 5:00 PM, GMT-08:00 Pacific Standard Time', 'dawp');
$website_url    = home_url('/');
$website_label  = wp_parse_url($website_url, PHP_URL_HOST) ?: $website_url;
$privacy_url    = home_url('/privacy-policy/');

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
        'title' => __('Website', 'dawp'),
        'copy'  => __('Visit our official website for products, policies, order help, and store updates.', 'dawp'),
        'meta'  => $website_label,
        'url'   => $website_url,
        'icon'  => 'globe',
    ],
    [
        'title' => __('Business Hours', 'dawp'),
        'copy'  => __('Messages are reviewed during regular support hours. Response times may vary on weekends and holidays.', 'dawp'),
        'meta'  => $business_hours,
        'icon'  => 'clock',
    ],
    [
        'title' => __('Order Help', 'dawp'),
        'copy'  => __('Include your order number when asking about tracking, address changes, returns, or delivery updates.', 'dawp'),
        'meta'  => __('Order number helps us respond faster', 'dawp'),
        'icon'  => 'package',
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
        'globe'   => '<circle cx="12" cy="12" r="10"/><path d="M2 12h20"/><path d="M12 2a15.3 15.3 0 0 1 0 20"/><path d="M12 2a15.3 15.3 0 0 0 0 20"/>',
        'clock'   => '<circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>',
        'package' => '<path d="M21 8a2 2 0 0 0-1-1.73L13 2.27a2 2 0 0 0-2 0L4 6.27A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/><path d="m3.3 7 8.7 5 8.7-5"/><path d="M12 22V12"/>',
        'check'   => '<path d="m20 6-11 11-5-5"/>',
        'alert'   => '<circle cx="12" cy="12" r="10"/><path d="M12 8v5"/><path d="M12 17h.01"/>',
    ];

    return $icons[$icon] ?? $icons['mail'];
};
?>

<div class="bg-white text-[#2F2A28]">
    <section class="bg-[#F8F2EE] py-14 sm:py-20" aria-labelledby="contact-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:items-end lg:px-8">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A96870]"><?php esc_html_e('Contact Us', 'dawp'); ?></p>
                <h1 id="contact-title" class="mt-4 font-heading text-4xl font-extrabold leading-tight text-[#2F2A28] sm:text-5xl">
                    <?php esc_html_e('Clear support for beauty and style orders.', 'dawp'); ?>
                </h1>
                <p class="mt-5 max-w-2xl text-base leading-8 text-[#6F625D]">
                    <?php esc_html_e('Have a question about an order, product detail, return request, or store policy? Contact LBQ Shop and include the details our support team needs to help.', 'dawp'); ?>
                </p>
            </div>

            <div class="contact-support-slider">
                <?php foreach ($support_cards as $card) : ?>
                    <article class="contact-support-card rounded-md border border-[#E8DAD4] bg-white p-5 shadow-sm">
                        <div class="flex h-11 w-11 items-center justify-center rounded-md bg-[#FBEDEA] text-[#A96870]">
                            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <?php echo $render_icon($card['icon']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </svg>
                        </div>
                        <h2 class="mt-4 font-heading text-lg font-extrabold text-[#2F2A28]"><?php echo esc_html($card['title']); ?></h2>
                        <p class="mt-3 text-sm leading-6 text-[#6F625D]"><?php echo esc_html($card['copy']); ?></p>
                        <?php if (!empty($card['url'])) : ?>
                            <a href="<?php echo esc_url($card['url']); ?>" class="mt-4 inline-flex break-all text-sm font-bold text-[#8A4F56] underline decoration-[#C87F86]/40 underline-offset-4 transition hover:text-[#2F2A28]">
                                <?php echo esc_html($card['meta']); ?>
                            </a>
                        <?php else : ?>
                            <p class="mt-4 text-sm font-bold text-[#8A4F56]"><?php echo esc_html($card['meta']); ?></p>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-[#FFFDFC] py-14 sm:py-20" aria-labelledby="contact-form-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.8fr_1.2fr] lg:px-8">
            <aside class="lg:sticky lg:top-24 lg:self-start">
                <div class="rounded-md border border-[#E8DAD4] bg-white p-6 shadow-sm">
                    <h2 class="font-heading text-2xl font-extrabold text-[#2F2A28]"><?php esc_html_e('Before you send', 'dawp'); ?></h2>
                    <p class="mt-4 text-sm leading-7 text-[#6F625D]">
                        <?php esc_html_e('For order questions, include your order number and the email used at checkout. For product questions, include the product name or link if available.', 'dawp'); ?>
                    </p>

                    <div class="mt-6 grid gap-3 text-sm leading-6 text-[#6F625D]">
                        <div class="flex gap-3 rounded-md bg-[#F8F2EE] p-4">
                            <svg class="mt-0.5 h-5 w-5 shrink-0 text-[#A96870]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <?php echo $render_icon('check'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </svg>
                            <span><strong class="text-[#2F2A28]"><?php esc_html_e('Response Time:', 'dawp'); ?></strong> <?php esc_html_e('We aim to reply within 1 business day.', 'dawp'); ?></span>
                        </div>
                        <div class="flex gap-3 rounded-md bg-[#F8F2EE] p-4">
                            <svg class="mt-0.5 h-5 w-5 shrink-0 text-[#A96870]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <?php echo $render_icon('check'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </svg>
                            <span><?php esc_html_e('Orders use a 5:00 PM (GMT-08:00) Pacific Standard Time cutoff and 1-3 business day handling time.', 'dawp'); ?></span>
                        </div>
                        <div class="flex gap-3 rounded-md bg-[#F8F2EE] p-4">
                            <svg class="mt-0.5 h-5 w-5 shrink-0 text-[#A96870]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <?php echo $render_icon('check'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </svg>
                            <span><?php esc_html_e('Standard U.S. shipping is free, with 5-7 business day transit and a 6-10 business day total delivery estimate.', 'dawp'); ?></span>
                        </div>
                        <div class="flex gap-3 rounded-md bg-[#F8F2EE] p-4">
                            <svg class="mt-0.5 h-5 w-5 shrink-0 text-[#A96870]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <?php echo $render_icon('check'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </svg>
                            <span><?php esc_html_e('Returns and exchanges are accepted within 30 days of delivery for eligible unused items in original condition.', 'dawp'); ?></span>
                        </div>
                    </div>

                    <p class="mt-6 text-sm leading-7 text-[#6F625D]">
                        <?php
                        echo wp_kses(
                            sprintf(
                                /* translators: 1: support email link, 2: business hours */
                                __('Prefer email? Contact %1$s. Business hours: %2$s.', 'dawp'),
                                '<a class="font-bold text-[#8A4F56] underline decoration-[#C87F86]/40 underline-offset-4 transition hover:text-[#2F2A28]" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>',
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

            <div class="rounded-md border border-[#E8DAD4] bg-white p-6 shadow-sm sm:p-8">
                <div class="max-w-2xl">
                    <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A96870]"><?php esc_html_e('Support Form', 'dawp'); ?></p>
                    <h2 id="contact-form-title" class="mt-3 font-heading text-3xl font-extrabold leading-tight text-[#2F2A28]">
                        <?php esc_html_e('Send us a message.', 'dawp'); ?>
                    </h2>
                    <p class="mt-3 text-sm leading-7 text-[#6F625D]">
                        <?php esc_html_e('We use the information you provide to respond to your request and support your shopping experience.', 'dawp'); ?>
                    </p>
                </div>

                <?php if ($status === 'success') : ?>
                    <div class="mt-6 flex gap-3 rounded-md border border-[#B7D8C2] bg-[#F0FAF3] p-4 text-sm leading-6 text-[#315B3D]" role="status">
                        <svg class="mt-0.5 h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <?php echo $render_icon('check'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                        </svg>
                        <p><?php esc_html_e('Thank you. Your message has been sent to LBQ Shop support.', 'dawp'); ?></p>
                    </div>
                <?php elseif ($status === 'error') : ?>
                    <div class="mt-6 flex gap-3 rounded-md border border-[#E7B8B4] bg-[#FFF3F1] p-4 text-sm leading-6 text-[#8A332B]" role="alert">
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
                            <label for="contact-name" class="block text-sm font-extrabold text-[#2F2A28]"><?php esc_html_e('Name', 'dawp'); ?> <span class="text-[#A96870]">*</span></label>
                            <input id="contact-name" name="contact_name" type="text" autocomplete="name" required class="mt-2 block min-h-12 w-full rounded-md border border-[#E8DAD4] bg-[#FFFDFC] px-4 text-sm text-[#2F2A28] outline-none transition placeholder:text-[#9C8E88] focus:border-[#C87F86] focus:ring-4 focus:ring-[#FBEDEA]" placeholder="<?php esc_attr_e('Your name', 'dawp'); ?>">
                        </div>

                        <div>
                            <label for="contact-email" class="block text-sm font-extrabold text-[#2F2A28]"><?php esc_html_e('Email', 'dawp'); ?> <span class="text-[#A96870]">*</span></label>
                            <input id="contact-email" name="contact_email" type="email" autocomplete="email" required class="mt-2 block min-h-12 w-full rounded-md border border-[#E8DAD4] bg-[#FFFDFC] px-4 text-sm text-[#2F2A28] outline-none transition placeholder:text-[#9C8E88] focus:border-[#C87F86] focus:ring-4 focus:ring-[#FBEDEA]" placeholder="<?php esc_attr_e('you@example.com', 'dawp'); ?>">
                        </div>
                    </div>

                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="contact-topic" class="block text-sm font-extrabold text-[#2F2A28]"><?php esc_html_e('Topic', 'dawp'); ?></label>
                            <select id="contact-topic" name="contact_topic" class="mt-2 block min-h-12 w-full rounded-md border border-[#E8DAD4] bg-[#FFFDFC] px-4 text-sm text-[#2F2A28] outline-none transition focus:border-[#C87F86] focus:ring-4 focus:ring-[#FBEDEA]">
                                <?php foreach ($form_topics as $value => $label) : ?>
                                    <option value="<?php echo esc_attr($value); ?>"><?php echo esc_html($label); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div>
                            <label for="order-number" class="block text-sm font-extrabold text-[#2F2A28]"><?php esc_html_e('Order number', 'dawp'); ?></label>
                            <input id="order-number" name="order_number" type="text" autocomplete="off" class="mt-2 block min-h-12 w-full rounded-md border border-[#E8DAD4] bg-[#FFFDFC] px-4 text-sm text-[#2F2A28] outline-none transition placeholder:text-[#9C8E88] focus:border-[#C87F86] focus:ring-4 focus:ring-[#FBEDEA]" placeholder="<?php esc_attr_e('Optional', 'dawp'); ?>">
                        </div>
                    </div>

                    <div>
                        <label for="contact-message" class="block text-sm font-extrabold text-[#2F2A28]"><?php esc_html_e('Message', 'dawp'); ?> <span class="text-[#A96870]">*</span></label>
                        <textarea id="contact-message" name="contact_message" rows="7" required class="mt-2 block w-full resize-y rounded-md border border-[#E8DAD4] bg-[#FFFDFC] px-4 py-3 text-sm leading-7 text-[#2F2A28] outline-none transition placeholder:text-[#9C8E88] focus:border-[#C87F86] focus:ring-4 focus:ring-[#FBEDEA]" placeholder="<?php esc_attr_e('Tell us how we can help.', 'dawp'); ?>"></textarea>
                    </div>

                    <div class="rounded-md bg-[#F8F2EE] p-4 text-sm leading-6 text-[#6F625D]">
                        <?php
                        echo wp_kses(
                            sprintf(
                                /* translators: privacy policy link */
                                __('By submitting this form, you agree that LBQ Shop may use your details to respond to your request. Review our %s for more information.', 'dawp'),
                                '<a class="font-bold text-[#8A4F56] underline decoration-[#C87F86]/40 underline-offset-4 transition hover:text-[#2F2A28]" href="' . esc_url($privacy_url) . '">' . esc_html__('Privacy Policy', 'dawp') . '</a>'
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

                    <button type="submit" class="inline-flex min-h-12 w-full items-center justify-center rounded-md bg-[#C87F86] px-6 text-sm font-bold text-white transition hover:bg-[#2F2A28] sm:w-auto">
                        <?php esc_html_e('Send Message', 'dawp'); ?>
                    </button>
                </form>
            </div>
        </div>
    </section>
</div>

