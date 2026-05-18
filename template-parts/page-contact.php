<?php
/**
 * Contact page for MyBaapStore.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email  = 'support@mybaapstore.com';
$store_address  = __('681 Main St, Belleville, NJ 07109', 'dawp');
$business_hours = __('Monday - Friday, 9:00 AM - 6:00 PM EST', 'dawp');
$shop_url       = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$contact_cards = [
    [
        'title' => __('Email Support', 'dawp'),
        'copy'  => __('For order questions, product help, shipping updates, returns, or general support, email our customer care team.', 'dawp'),
        'value' => $support_email,
        'url'   => 'mailto:' . $support_email,
        'icon'  => 'mail',
    ],
    [
        'title' => __('Business Hours', 'dawp'),
        'copy'  => __('Messages are reviewed during weekday business hours. Replies may take longer on weekends or holidays.', 'dawp'),
        'value' => $business_hours,
        'url'   => '',
        'icon'  => 'clock',
    ],
    [
        'title' => __('Store Address', 'dawp'),
        'copy'  => __('Use this address for store reference. Please contact support before sending returns or product-related mail.', 'dawp'),
        'value' => $store_address,
        'url'   => '',
        'icon'  => 'map-pin',
    ],
    [
        'title' => __('Order Tracking', 'dawp'),
        'copy'  => __('Have an order number? Check the latest tracking details before contacting support about delivery timing.', 'dawp'),
        'value' => __('Track Your Order', 'dawp'),
        'url'   => home_url('/track-order/'),
        'icon'  => 'package',
    ],
];

$support_topics = [
    [
        'title' => __('Order Questions', 'dawp'),
        'copy'  => __('Help with order confirmation, shipping address questions, order status, or checkout details.', 'dawp'),
        'icon'  => 'receipt',
    ],
    [
        'title' => __('Shipping & Delivery', 'dawp'),
        'copy'  => __('Support for tracking updates, delayed packages, delivery questions, or damaged shipments.', 'dawp'),
        'icon'  => 'truck',
    ],
    [
        'title' => __('Returns & Refunds', 'dawp'),
        'copy'  => __('Return eligibility, refund timing, personal care hygiene conditions, and return instructions.', 'dawp'),
        'icon'  => 'refresh',
    ],
    [
        'title' => __('Product Help', 'dawp'),
        'copy'  => __('Questions about practical gadgets, grooming tools, camera accessories, daily tools, or product use.', 'dawp'),
        'icon'  => 'tool',
    ],
];

$email_checklist = [
    __('Your order number, if your message is about an order.', 'dawp'),
    __('The email address used at checkout.', 'dawp'),
    __('The product name or category you are asking about.', 'dawp'),
    __('A clear description of the issue or question.', 'dawp'),
    __('Photos of the item, packaging, and shipping label for damaged, incorrect, or missing item claims.', 'dawp'),
];

$quick_links = [
    [
        'title' => __('Shipping & Returns', 'dawp'),
        'copy'  => __('Review processing times, US delivery estimates, return rules, and refund information.', 'dawp'),
        'url'   => home_url('/shipping-returns/'),
    ],
    [
        'title' => __('FAQ', 'dawp'),
        'copy'  => __('Find quick answers about orders, products, personal care devices, and customer support.', 'dawp'),
        'url'   => home_url('/faq/'),
    ],
    [
        'title' => __('Shop Practical Gadgets', 'dawp'),
        'copy'  => __('Browse useful tools for home, kitchen, grooming, camera accessories, tech, and daily use.', 'dawp'),
        'url'   => $shop_url,
    ],
];

$render_icon = static function ($icon) {
    $icons = [
        'mail'    => '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-10 6L2 7"/>',
        'clock'   => '<circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>',
        'map-pin' => '<path d="M20 10c0 4.99-5.54 10.2-7.4 11.8a.94.94 0 0 1-1.2 0C9.54 20.2 4 14.99 4 10a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/>',
        'package' => '<path d="m7.5 4.27 9 5.15"/><path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/><path d="m3.3 7 8.7 5 8.7-5"/><path d="M12 22V12"/>',
        'receipt' => '<path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2Z"/><path d="M8 7h8"/><path d="M8 12h8"/><path d="M8 17h5"/>',
        'truck'   => '<path d="M10 17h4V5H3v12h2"/><path d="M14 8h4l3 3v6h-3"/><circle cx="7" cy="17" r="2"/><circle cx="16" cy="17" r="2"/>',
        'refresh' => '<path d="M20 12a8 8 0 0 1-13.66 5.66L4 15"/><path d="M4 20v-5h5"/><path d="M4 12A8 8 0 0 1 17.66 6.34L20 9"/><path d="M20 4v5h-5"/>',
        'tool'    => '<path d="M14.7 6.3a4 4 0 0 0-5.64 5.64L3 18v3h3l6.06-6.06A4 4 0 0 0 17.7 9.3Z"/><path d="m15 5 4 4"/>',
        'check'   => '<path d="M20 6 9 17l-5-5"/>',
    ];

    return $icons[$icon] ?? $icons['mail'];
};
?>

<div class="bg-white text-[#1F2937]">
    <section class="bg-[#EAF4FF]" aria-labelledby="contact-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[0.95fr_1.05fr] lg:items-center lg:px-8 lg:py-20">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#2F80ED]"><?php esc_html_e('Customer Support', 'dawp'); ?></p>
                <h1 id="contact-title" class="mt-5 text-4xl font-extrabold leading-tight text-[#102A43] sm:text-5xl">
                    <?php esc_html_e('Contact MyBaapStore', 'dawp'); ?>
                </h1>
                <p class="mt-6 max-w-3xl text-lg leading-8 text-[#667085]">
                    <?php esc_html_e('Need help with a practical gadget, order, shipping update, return request, or product question? Our support team can help with clear information for everyday gadgets, personal care devices, camera and tech accessories, and daily tools.', 'dawp'); ?>
                </p>

                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-xl bg-[#2F80ED] px-6 text-sm font-bold text-white transition hover:bg-[#102A43]">
                        <?php esc_html_e('Email Support', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-xl border border-[#2F80ED] bg-white px-6 text-sm font-bold text-[#2F80ED] transition hover:bg-[#EAF4FF]">
                        <?php esc_html_e('Track Your Order', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <div class="overflow-hidden rounded-2xl border border-white bg-white p-4 shadow-xl shadow-[#102A43]/15">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/contact.png'); ?>" alt="<?php esc_attr_e('Clean customer support desk with laptop and everyday tech accessories', 'dawp'); ?>" class="aspect-[4/3] w-full rounded-xl object-cover" loading="eager" decoding="async">
                <div class="mt-4 grid gap-3 sm:grid-cols-3">
                    <div class="rounded-xl bg-[#F5F7FA] p-4">
                        <p class="text-sm font-extrabold text-[#102A43]"><?php esc_html_e('Orders', 'dawp'); ?></p>
                        <p class="mt-1 text-xs leading-5 text-[#667085]"><?php esc_html_e('Status and delivery help', 'dawp'); ?></p>
                    </div>
                    <div class="rounded-xl bg-[#F5F7FA] p-4">
                        <p class="text-sm font-extrabold text-[#102A43]"><?php esc_html_e('Products', 'dawp'); ?></p>
                        <p class="mt-1 text-xs leading-5 text-[#667085]"><?php esc_html_e('Use and fit questions', 'dawp'); ?></p>
                    </div>
                    <div class="rounded-xl bg-[#F5F7FA] p-4">
                        <p class="text-sm font-extrabold text-[#102A43]"><?php esc_html_e('Returns', 'dawp'); ?></p>
                        <p class="mt-1 text-xs leading-5 text-[#667085]"><?php esc_html_e('Eligibility and next steps', 'dawp'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 sm:py-20" aria-labelledby="contact-info-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#2F80ED]"><?php esc_html_e('Contact Information', 'dawp'); ?></p>
                <h2 id="contact-info-title" class="mt-4 text-3xl font-extrabold leading-tight text-[#102A43] sm:text-4xl">
                    <?php esc_html_e('The fastest way to reach customer care.', 'dawp'); ?>
                </h2>
                <p class="mt-4 text-base leading-8 text-[#667085]">
                    <?php esc_html_e('Use email for all support requests so our team can review your order details, product question, photos, and return information in one place.', 'dawp'); ?>
                </p>
            </div>

            <div class="mt-10 grid gap-5 md:grid-cols-2 lg:grid-cols-4">
                <?php foreach ($contact_cards as $card) : ?>
                    <article class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-[#102A43]/10">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#EAF4FF] text-[#2F80ED]">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <?php echo $render_icon($card['icon']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </svg>
                        </div>
                        <h3 class="mt-5 text-xl font-extrabold text-[#102A43]"><?php echo esc_html($card['title']); ?></h3>
                        <p class="mt-3 text-sm leading-6 text-[#667085]"><?php echo esc_html($card['copy']); ?></p>
                        <?php if (!empty($card['url'])) : ?>
                            <a href="<?php echo esc_url($card['url']); ?>" class="mt-5 inline-flex text-sm font-bold text-[#2F80ED] hover:text-[#102A43]">
                                <?php echo esc_html($card['value']); ?>
                                <span class="ml-2" aria-hidden="true">-&gt;</span>
                            </a>
                        <?php else : ?>
                            <p class="mt-5 text-sm font-bold leading-6 text-[#102A43]"><?php echo esc_html($card['value']); ?></p>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-[#F5F7FA] py-16 sm:py-20" aria-labelledby="contact-form-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[1fr_1fr] lg:items-start">
                <div>
                    <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#2F80ED]"><?php esc_html_e('Send a Message', 'dawp'); ?></p>
                    <h2 id="contact-form-title" class="mt-4 text-3xl font-extrabold leading-tight text-[#102A43] sm:text-4xl">
                        <?php esc_html_e('We\'d love to hear from you.', 'dawp'); ?>
                    </h2>
                    <p class="mt-4 text-base leading-8 text-[#667085]">
                        <?php esc_html_e('Fill out the form and our support team will get back to you within 1–2 business days. For faster help, include your order number and a short description of your question.', 'dawp'); ?>
                    </p>
                    <div class="mt-5 inline-flex items-center gap-2 rounded-xl bg-[#EAF4FF] px-4 py-3">
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="#2F80ED" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>
                        </svg>
                        <p class="text-sm font-bold text-[#2F80ED]"><?php esc_html_e('We respond to all support messages within 24 hours.', 'dawp'); ?></p>
                    </div>
                    <div class="mt-8 space-y-4">
                        <div class="flex items-start gap-4">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#EAF4FF] text-[#2F80ED]">
                                <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-10 6L2 7"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-[#102A43]"><?php esc_html_e('Email Support', 'dawp'); ?></p>
                                <a href="mailto:<?php echo esc_attr($support_email); ?>" class="text-sm text-[#2F80ED] hover:text-[#102A43]"><?php echo esc_html($support_email); ?></a>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#EAF4FF] text-[#2F80ED]">
                                <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-[#102A43]"><?php esc_html_e('Business Hours', 'dawp'); ?></p>
                                <p class="text-sm text-[#667085]"><?php echo esc_html($business_hours); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm sm:p-8">
                    <form id="dawp-contact-form" novalidate>
                        <?php wp_nonce_field('dawp_contact_nonce', 'dawp_contact_nonce_field'); ?>

                        <div class="grid gap-5 sm:grid-cols-2">
                            <div>
                                <label for="contact_name" class="block text-sm font-semibold text-[#102A43]">
                                    <?php esc_html_e('Your Name', 'dawp'); ?> <span class="text-[#2F80ED]" aria-hidden="true">*</span>
                                </label>
                                <input type="text" id="contact_name" name="contact_name" required autocomplete="name"
                                    class="mt-2 block w-full rounded-xl border border-[#E5E7EB] bg-[#F5F7FA] px-4 py-3 text-sm text-[#1F2937] placeholder-[#9CA3AF] focus:border-[#2F80ED] focus:outline-none focus:ring-2 focus:ring-[#2F80ED]/20 transition"
                                    placeholder="<?php esc_attr_e('John Smith', 'dawp'); ?>">
                            </div>
                            <div>
                                <label for="contact_email" class="block text-sm font-semibold text-[#102A43]">
                                    <?php esc_html_e('Email Address', 'dawp'); ?> <span class="text-[#2F80ED]" aria-hidden="true">*</span>
                                </label>
                                <input type="email" id="contact_email" name="contact_email" required autocomplete="email"
                                    class="mt-2 block w-full rounded-xl border border-[#E5E7EB] bg-[#F5F7FA] px-4 py-3 text-sm text-[#1F2937] placeholder-[#9CA3AF] focus:border-[#2F80ED] focus:outline-none focus:ring-2 focus:ring-[#2F80ED]/20 transition"
                                    placeholder="<?php esc_attr_e('john@example.com', 'dawp'); ?>">
                            </div>
                        </div>

                        <div class="mt-5">
                            <label for="contact_subject" class="block text-sm font-semibold text-[#102A43]">
                                <?php esc_html_e('Subject', 'dawp'); ?> <span class="text-[#2F80ED]" aria-hidden="true">*</span>
                            </label>
                            <select id="contact_subject" name="contact_subject" required
                                class="mt-2 block w-full rounded-xl border border-[#E5E7EB] bg-[#F5F7FA] px-4 py-3 text-sm text-[#1F2937] focus:border-[#2F80ED] focus:outline-none focus:ring-2 focus:ring-[#2F80ED]/20 transition appearance-none">
                                <option value="" disabled selected><?php esc_html_e('Select a topic…', 'dawp'); ?></option>
                                <option value="Order Question"><?php esc_html_e('Order Question', 'dawp'); ?></option>
                                <option value="Shipping & Delivery"><?php esc_html_e('Shipping & Delivery', 'dawp'); ?></option>
                                <option value="Return & Refund"><?php esc_html_e('Return & Refund', 'dawp'); ?></option>
                                <option value="Product Help"><?php esc_html_e('Product Help', 'dawp'); ?></option>
                                <option value="Other"><?php esc_html_e('Other', 'dawp'); ?></option>
                            </select>
                        </div>

                        <div class="mt-5">
                            <label for="contact_message" class="block text-sm font-semibold text-[#102A43]">
                                <?php esc_html_e('Message', 'dawp'); ?> <span class="text-[#2F80ED]" aria-hidden="true">*</span>
                            </label>
                            <textarea id="contact_message" name="contact_message" required rows="5"
                                class="mt-2 block w-full resize-none rounded-xl border border-[#E5E7EB] bg-[#F5F7FA] px-4 py-3 text-sm text-[#1F2937] placeholder-[#9CA3AF] focus:border-[#2F80ED] focus:outline-none focus:ring-2 focus:ring-[#2F80ED]/20 transition"
                                placeholder="<?php esc_attr_e('Include your order number, product name, and a short description of your question or issue…', 'dawp'); ?>"></textarea>
                        </div>

                        <div id="dawp-contact-alert" role="alert" aria-live="polite" class="hidden mt-5 rounded-xl p-4 text-sm font-semibold"></div>

                        <button type="submit" id="dawp-contact-submit"
                            class="mt-6 inline-flex min-h-12 w-full items-center justify-center gap-2 rounded-xl bg-[#2F80ED] px-6 text-sm font-bold text-white transition hover:bg-[#102A43] disabled:opacity-60 disabled:cursor-not-allowed">
                            <span id="dawp-contact-btn-text"><?php esc_html_e('Send Message', 'dawp'); ?></span>
                            <svg id="dawp-contact-spinner" class="hidden h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                                <path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/>
                            </svg>
                        </button>
                    </form>

                    <script>
                    (function () {
                        var form    = document.getElementById('dawp-contact-form');
                        var alert   = document.getElementById('dawp-contact-alert');
                        var submit  = document.getElementById('dawp-contact-submit');
                        var btnText = document.getElementById('dawp-contact-btn-text');
                        var spinner = document.getElementById('dawp-contact-spinner');

                        if (!form) return;

                        form.addEventListener('submit', function (e) {
                            e.preventDefault();

                            alert.className = 'hidden mt-5 rounded-xl p-4 text-sm font-semibold';
                            submit.disabled = true;
                            btnText.textContent = '<?php esc_html_e('Sending…', 'dawp'); ?>';
                            spinner.classList.remove('hidden');

                            var data = new FormData(form);
                            data.append('action', 'dawp_contact');
                            data.append('nonce', document.getElementById('dawp_contact_nonce_field').value);

                            fetch('<?php echo esc_url(admin_url('admin-ajax.php')); ?>', {
                                method: 'POST',
                                body: data,
                                credentials: 'same-origin',
                            })
                            .then(function (r) { return r.json(); })
                            .then(function (res) {
                                alert.classList.remove('hidden');
                                if (res.success) {
                                    alert.classList.add('bg-[#EAF4FF]', 'text-[#102A43]', 'border', 'border-[#2F80ED]/30');
                                    alert.textContent = res.data.message;
                                    form.reset();
                                } else {
                                    alert.classList.add('bg-red-50', 'text-red-700', 'border', 'border-red-200');
                                    alert.textContent = res.data.message;
                                }
                            })
                            .catch(function () {
                                alert.classList.remove('hidden');
                                alert.classList.add('bg-red-50', 'text-red-700', 'border', 'border-red-200');
                                alert.textContent = '<?php esc_html_e('Something went wrong. Please try again or email us directly.', 'dawp'); ?>';
                            })
                            .finally(function () {
                                submit.disabled = false;
                                btnText.textContent = '<?php esc_html_e('Send Message', 'dawp'); ?>';
                                spinner.classList.add('hidden');
                            });
                        });
                    })();
                    </script>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#F5F7FA] py-16 sm:py-20" aria-labelledby="support-topics-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.85fr_1.15fr] lg:items-start lg:px-8">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#5BA8A0]"><?php esc_html_e('How We Can Help', 'dawp'); ?></p>
                <h2 id="support-topics-title" class="mt-4 text-3xl font-extrabold leading-tight text-[#102A43] sm:text-4xl">
                    <?php esc_html_e('Support for practical everyday shopping.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-[#667085]">
                    <?php esc_html_e('MyBaapStore focuses on useful gadgets for home, kitchen, personal care, camera and tech accessories, and daily routines. Contact us when you need help choosing, using, tracking, or returning an eligible item.', 'dawp'); ?>
                </p>
                <div class="mt-8 rounded-2xl bg-[#102A43] p-6 text-white">
                    <h3 class="text-xl font-extrabold"><?php esc_html_e('Important product note', 'dawp'); ?></h3>
                    <p class="mt-3 text-sm leading-7 text-white/75">
                        <?php esc_html_e('Personal care devices are intended for simple grooming routines and may have hygiene-related return conditions. Camera and tech accessories should be used for normal, lawful, privacy-respecting purposes.', 'dawp'); ?>
                    </p>
                </div>
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                <?php foreach ($support_topics as $topic) : ?>
                    <article class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#EAF4FF] text-[#2F80ED]">
                            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <?php echo $render_icon($topic['icon']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </svg>
                        </div>
                        <h3 class="mt-5 text-lg font-extrabold text-[#102A43]"><?php echo esc_html($topic['title']); ?></h3>
                        <p class="mt-3 text-sm leading-6 text-[#667085]"><?php echo esc_html($topic['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 sm:py-20" aria-labelledby="email-details-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[1.05fr_0.95fr] lg:items-start lg:px-8">
            <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm sm:p-8">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#2F80ED]"><?php esc_html_e('Before You Email', 'dawp'); ?></p>
                <h2 id="email-details-title" class="mt-4 text-3xl font-extrabold leading-tight text-[#102A43] sm:text-4xl">
                    <?php esc_html_e('Include the details we need to help faster.', 'dawp'); ?>
                </h2>
                <p class="mt-4 text-base leading-8 text-[#667085]">
                    <?php esc_html_e('A clear first message helps us answer accurately without extra back-and-forth, especially for shipping, returns, damaged items, or product questions.', 'dawp'); ?>
                </p>

                <ul class="mt-7 grid gap-3">
                    <?php foreach ($email_checklist as $item) : ?>
                        <li class="flex gap-3 rounded-xl border border-[#E5E7EB] bg-[#F5F7FA] p-4">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-[#2F80ED] text-white">
                                <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <?php echo $render_icon('check'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </svg>
                            </span>
                            <span class="text-sm font-semibold leading-6 text-[#334155]"><?php echo esc_html($item); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <aside class="rounded-2xl border border-[#E5E7EB] bg-[#EAF4FF] p-6 sm:p-8 lg:sticky lg:top-28">
                <h2 class="text-2xl font-extrabold text-[#102A43]"><?php esc_html_e('Support Timeline', 'dawp'); ?></h2>
                <p class="mt-4 text-base leading-8 text-[#334155]">
                    <?php esc_html_e('Orders are processed within 2-4 business days. After dispatch, standard US shipping typically takes 5-10 business days depending on destination and carrier conditions.', 'dawp'); ?>
                </p>
                <p class="mt-4 text-base leading-8 text-[#334155]">
                    <?php esc_html_e('Tracking may take 24-72 hours to update after the carrier receives the package. If your order has shipped, check the tracking page before sending a delivery update request.', 'dawp'); ?>
                </p>
                <a href="<?php echo esc_url(home_url('/shipping-returns/')); ?>" class="mt-7 inline-flex min-h-12 items-center justify-center rounded-xl bg-[#2F80ED] px-6 text-sm font-bold text-white transition hover:bg-[#102A43]">
                    <?php esc_html_e('Read Shipping & Returns', 'dawp'); ?>
                </a>
            </aside>
        </div>
    </section>

    <section class="border-t border-[#E5E7EB] bg-[#F5F7FA] py-16 sm:py-20" aria-labelledby="quick-links-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-8 lg:grid-cols-[0.8fr_1.2fr] lg:items-center">
                <div>
                    <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#2F80ED]"><?php esc_html_e('Helpful Pages', 'dawp'); ?></p>
                    <h2 id="quick-links-title" class="mt-4 text-3xl font-extrabold leading-tight text-[#102A43] sm:text-4xl">
                        <?php esc_html_e('Find answers before you wait for a reply.', 'dawp'); ?>
                    </h2>
                    <p class="mt-4 text-base leading-8 text-[#667085]">
                        <?php esc_html_e('These pages cover the most common questions about practical gadgets, shipping, returns, tracking, and customer care.', 'dawp'); ?>
                    </p>
                </div>

                <div class="grid gap-4 md:grid-cols-3">
                    <?php foreach ($quick_links as $link) : ?>
                        <a href="<?php echo esc_url($link['url']); ?>" class="group rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-[#102A43]/10">
                            <h3 class="text-lg font-extrabold text-[#102A43] group-hover:text-[#2F80ED]"><?php echo esc_html($link['title']); ?></h3>
                            <p class="mt-3 text-sm leading-6 text-[#667085]"><?php echo esc_html($link['copy']); ?></p>
                            <span class="mt-5 inline-flex text-sm font-bold text-[#2F80ED]">
                                <?php esc_html_e('Open page', 'dawp'); ?>
                                <span class="ml-2" aria-hidden="true">-&gt;</span>
                            </span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="mt-10 rounded-2xl bg-[#102A43] p-6 text-white sm:p-8">
                <div class="grid gap-6 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <h2 class="text-2xl font-extrabold"><?php esc_html_e('Need help from MyBaapStore support?', 'dawp'); ?></h2>
                        <p class="mt-3 text-base leading-8 text-white/75">
                            <?php printf(esc_html__('Email %1$s during business hours: %2$s.', 'dawp'), esc_html($support_email), esc_html($business_hours)); ?>
                        </p>
                    </div>
                    <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-xl bg-white px-6 text-sm font-bold text-[#102A43] transition hover:bg-[#EAF4FF]">
                        <?php echo esc_html($support_email); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
