<?php
/**
 * Template Part: Contact Us
 *
 * @package dawp
 */

$support_email = 'support@vivisshop.com';

$help_topics = [
    [
        'title' => __('Order Questions', 'dawp'),
        'copy'  => __('Share your order number so our team can help with order status, address details, or product questions.', 'dawp'),
    ],
    [
        'title' => __('Shipping & Tracking', 'dawp'),
        'copy'  => __('Tracking details are provided once an order ships. We can help review delivery updates if something looks unclear.', 'dawp'),
    ],
    [
        'title' => __('Returns & Fit Help', 'dawp'),
        'copy'  => __('Need help with sizing, fit, or an eligible return request? Send the product name and order details.', 'dawp'),
    ],
];

$quick_links = [
    [
        'title' => __('Shipping Policy', 'dawp'),
        'copy'  => __('Review processing times, delivery estimates, and tracking guidance.', 'dawp'),
        'url'   => home_url('/shipping-policy/'),
    ],
    [
        'title' => __('Track Your Order', 'dawp'),
        'copy'  => __('Check your order status with your order details when tracking is available.', 'dawp'),
        'url'   => home_url('/track-order/'),
    ],
    [
        'title' => __('FAQ', 'dawp'),
        'copy'  => __('Find simple answers to common shopping, shipping, return, and product questions.', 'dawp'),
        'url'   => home_url('/faq/'),
    ],
];
?>

<div class="bg-white text-[#2F2925]">
    <section class="overflow-hidden bg-[#FFF8EF]">
        <div class="mx-auto grid max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[0.92fr_1.08fr] lg:px-8 lg:py-24">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#8C6D58]"><?php esc_html_e('Customer Care', 'dawp'); ?></p>
                <h1 class="mt-5 max-w-3xl font-heading text-5xl font-bold leading-[1.05] text-[#4B3528] sm:text-6xl lg:text-7xl">
                    <?php esc_html_e('We are here to help.', 'dawp'); ?>
                </h1>
                <p class="mt-6 max-w-xl text-lg leading-8 text-[#756A62]">
                    <?php esc_html_e('Have a question about an order, a soft everyday style, shipping, or returns? Reach out to Vivisshop support and we will help you with clear, friendly guidance.', 'dawp'); ?>
                </p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#B89B83] px-7 text-sm font-bold text-white shadow-lg shadow-[#4B3528]/10 transition hover:bg-[#4B3528]">
                        <?php esc_html_e('Email Support', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#B89B83] bg-white px-7 text-sm font-bold text-[#4B3528] transition hover:bg-[#F3E7DA]">
                        <?php esc_html_e('Track Your Order', 'dawp'); ?>
                    </a>
                </div>
            </div>
            <div class="relative">
                <div class="overflow-hidden rounded-[2rem] border border-[#E7D8C8] bg-white shadow-2xl shadow-[#4B3528]/10">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/vivisshop/Soft_Women\'s_Everyday_Fashion.png'); ?>" alt="<?php esc_attr_e('Relaxed Vivisshop everyday fashion customer care', 'dawp'); ?>" class="aspect-[4/5] h-full w-full object-cover lg:aspect-[5/4]">
                </div>
                <div class="absolute bottom-4 left-4 w-[min(100%-32px,640px)] rounded-[1.35rem] border border-white/70 bg-white/95 p-5 shadow-xl">
                    <p class="text-sm font-bold text-[#4B3528]"><?php esc_html_e('Support hours', 'dawp'); ?></p>
                    <p class="mt-2 text-sm leading-6 text-[#756A62]"><?php esc_html_e('Business hours: Monday-Friday, 9:00 AM-5:00 PM. Please include your order number when contacting us about an existing purchase.', 'dawp'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 lg:py-20">
        <div class="mx-auto grid max-w-7xl gap-6 px-4 sm:px-6 lg:grid-cols-3 lg:px-8">
            <div class="rounded-2xl border border-[#E7D8C8] bg-[#FFF8EF] p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-white text-[#4B3528]" aria-hidden="true">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                        <path d="m22 7-10 6L2 7"></path>
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-[#4B3528]"><?php esc_html_e('Email', 'dawp'); ?></h2>
                <p class="mt-2 text-sm leading-6 text-[#756A62]">
                    <a href="mailto:<?php echo esc_attr($support_email); ?>" class="font-semibold text-[#4B3528] hover:text-[#B89B83]"><?php echo esc_html($support_email); ?></a>
                </p>
            </div>

            <div class="rounded-2xl border border-[#E7D8C8] bg-white p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-[#F3E7DA] text-[#4B3528]" aria-hidden="true">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-[#4B3528]"><?php esc_html_e('Business Hours', 'dawp'); ?></h2>
                <p class="mt-2 text-sm leading-6 text-[#756A62]"><?php esc_html_e('Business hours: Monday-Friday, 9:00 AM-5:00 PM', 'dawp'); ?></p>
            </div>

            <div class="rounded-2xl border border-[#E7D8C8] bg-[#F3E7DA] p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-white text-[#4B3528]" aria-hidden="true">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="7 10 12 15 17 10"></polyline>
                        <line x1="12" x2="12" y1="15" y2="3"></line>
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-[#4B3528]"><?php esc_html_e('Response Time', 'dawp'); ?></h2>
                <p class="mt-2 text-sm leading-6 text-[#756A62]"><?php esc_html_e('We usually reply within 1-2 business days. Business hours: Monday-Friday, 9:00 AM-5:00 PM.', 'dawp'); ?></p>
            </div>
        </div>
    </section>

    <section class="bg-[#FFF8EF] py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:px-8">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#8C6D58]"><?php esc_html_e('Send A Message', 'dawp'); ?></p>
                <h2 class="mt-3 font-heading text-4xl font-bold leading-tight text-[#4B3528]"><?php esc_html_e('Tell us what you need help with.', 'dawp'); ?></h2>
                <p class="mt-5 text-base leading-8 text-[#756A62]">
                    <?php esc_html_e('For order support, please include your order number, the email used at checkout, and a short note about your question. This helps us assist you faster.', 'dawp'); ?>
                </p>
                <div class="mt-8 rounded-2xl border border-[#E7D8C8] bg-white p-6">
                    <h3 class="text-lg font-bold text-[#4B3528]"><?php esc_html_e('Helpful details to include', 'dawp'); ?></h3>
                    <ul class="mt-4 space-y-3 text-sm leading-6 text-[#756A62]">
                        <li class="flex gap-3">
                            <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-[#A8B99A]" aria-hidden="true"></span>
                            <span><?php esc_html_e('Your order number, if your message is about a purchase.', 'dawp'); ?></span>
                        </li>
                        <li class="flex gap-3">
                            <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-[#A8B99A]" aria-hidden="true"></span>
                            <span><?php esc_html_e('The product name or link if you have a question about fit, fabric feel, or styling.', 'dawp'); ?></span>
                        </li>
                        <li class="flex gap-3">
                            <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-[#A8B99A]" aria-hidden="true"></span>
                            <span><?php esc_html_e('Photos may be useful for damaged, incorrect, or return-related requests.', 'dawp'); ?></span>
                        </li>
                    </ul>
                </div>
            </div>

            <form action="mailto:<?php echo esc_attr($support_email); ?>" method="post" enctype="text/plain" class="rounded-[2rem] border border-[#E7D8C8] bg-white p-5 shadow-xl shadow-[#4B3528]/10 sm:p-8">
                <div class="grid gap-5 sm:grid-cols-2">
                    <div>
                        <label for="contact-name" class="mb-2 block text-sm font-bold text-[#4B3528]"><?php esc_html_e('Name', 'dawp'); ?></label>
                        <input id="contact-name" name="name" type="text" autocomplete="name" class="min-h-12 w-full rounded-full border border-[#E7D8C8] px-5 text-sm text-[#2F2925] outline-none transition focus:border-[#A8B99A]">
                    </div>
                    <div>
                        <label for="contact-email" class="mb-2 block text-sm font-bold text-[#4B3528]"><?php esc_html_e('Email', 'dawp'); ?></label>
                        <input id="contact-email" name="email" type="email" autocomplete="email" class="min-h-12 w-full rounded-full border border-[#E7D8C8] px-5 text-sm text-[#2F2925] outline-none transition focus:border-[#A8B99A]">
                    </div>
                </div>

                <div class="mt-5">
                    <label for="contact-topic" class="mb-2 block text-sm font-bold text-[#4B3528]"><?php esc_html_e('Topic', 'dawp'); ?></label>
                    <select id="contact-topic" name="topic" class="min-h-12 w-full rounded-full border border-[#E7D8C8] bg-white px-5 text-sm text-[#2F2925] outline-none transition focus:border-[#A8B99A]">
                        <option value="Order question"><?php esc_html_e('Order question', 'dawp'); ?></option>
                        <option value="Shipping or tracking"><?php esc_html_e('Shipping or tracking', 'dawp'); ?></option>
                        <option value="Return request"><?php esc_html_e('Return request', 'dawp'); ?></option>
                        <option value="Product or sizing question"><?php esc_html_e('Product or sizing question', 'dawp'); ?></option>
                        <option value="Other"><?php esc_html_e('Other', 'dawp'); ?></option>
                    </select>
                </div>

                <div class="mt-5">
                    <label for="contact-order" class="mb-2 block text-sm font-bold text-[#4B3528]"><?php esc_html_e('Order Number', 'dawp'); ?></label>
                    <input id="contact-order" name="order_number" type="text" class="min-h-12 w-full rounded-full border border-[#E7D8C8] px-5 text-sm text-[#2F2925] outline-none transition focus:border-[#A8B99A]" placeholder="<?php esc_attr_e('Optional', 'dawp'); ?>">
                </div>

                <div class="mt-5">
                    <label for="contact-message" class="mb-2 block text-sm font-bold text-[#4B3528]"><?php esc_html_e('Message', 'dawp'); ?></label>
                    <textarea id="contact-message" name="message" rows="6" class="w-full rounded-2xl border border-[#E7D8C8] px-5 py-4 text-sm leading-6 text-[#2F2925] outline-none transition focus:border-[#A8B99A]" placeholder="<?php esc_attr_e('How can we help?', 'dawp'); ?>"></textarea>
                </div>

                <button type="submit" class="mt-6 inline-flex min-h-12 w-full items-center justify-center rounded-full bg-[#B89B83] px-7 text-sm font-bold text-white transition hover:bg-[#4B3528] sm:w-auto">
                    <?php esc_html_e('Send Message', 'dawp'); ?>
                </button>

                <p class="mt-4 text-xs leading-6 text-[#756A62]">
                    <?php esc_html_e('This form opens your email app so you can send your message directly to Vivisshop support.', 'dawp'); ?>
                </p>
            </form>
        </div>
    </section>

    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#8C6D58]"><?php esc_html_e('How We Can Help', 'dawp'); ?></p>
                <h2 class="mt-3 font-heading text-4xl font-bold leading-tight text-[#4B3528]"><?php esc_html_e('Clear support for a calm shopping experience.', 'dawp'); ?></h2>
            </div>
            <div class="mt-10 grid gap-5 md:grid-cols-3">
                <?php foreach ($help_topics as $topic) : ?>
                    <div class="rounded-2xl border border-[#E7D8C8] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-[#4B3528]/10">
                        <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-[#FFF8EF] text-[#4B3528]" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 6 9 17l-5-5"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-[#4B3528]"><?php echo esc_html($topic['title']); ?></h3>
                        <p class="mt-2 text-sm leading-6 text-[#756A62]"><?php echo esc_html($topic['copy']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-[#F3E7DA] py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-3xl">
                    <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#8C6D58]"><?php esc_html_e('Customer Resources', 'dawp'); ?></p>
                    <h2 class="mt-3 font-heading text-4xl font-bold leading-tight text-[#4B3528]"><?php esc_html_e('Find quick answers before you write.', 'dawp'); ?></h2>
                </div>
                <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#4B3528] px-7 text-sm font-bold text-white transition hover:bg-[#B89B83]">
                    <?php esc_html_e('Contact Support', 'dawp'); ?>
                </a>
            </div>

            <div class="mt-10 grid gap-5 md:grid-cols-3">
                <?php foreach ($quick_links as $link) : ?>
                    <a href="<?php echo esc_url($link['url']); ?>" class="group rounded-2xl border border-[#E7D8C8] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-[#4B3528]/10">
                        <span class="block text-lg font-bold text-[#4B3528] group-hover:text-[#B89B83]"><?php echo esc_html($link['title']); ?></span>
                        <span class="mt-2 block text-sm leading-6 text-[#756A62]"><?php echo esc_html($link['copy']); ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>
