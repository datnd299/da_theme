<?php
/**
 * Template Name: FAQs
 * Template Part: page-faq
 */

get_header();
?>

<main id="primary" class="bg-white font-body text-[#141217]">

    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-[#141217] text-white">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(230,0,126,0.34),transparent_32%),linear-gradient(135deg,#141217_0%,#2A1538_58%,#141217_100%)]"></div>

        <div class="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
            <div class="max-w-4xl">
                <p class="mb-5 text-sm font-black uppercase tracking-[0.24em] text-[#FF4FB8]">
                    <?php esc_html_e('Help Center', 'dawp'); ?>
                </p>

                <h1 class="font-heading text-5xl font-black leading-[0.94] text-white sm:text-6xl lg:text-7xl">
                    <?php esc_html_e('Frequently Asked Questions', 'dawp'); ?>
                </h1>

                <p class="mt-6 max-w-2xl text-lg leading-8 text-white/82">
                    <?php esc_html_e('Find quick answers about orders, shipping, returns, sizing, payments, and customer support for House of Shoes Online.', 'dawp'); ?>
                </p>
            </div>
        </div>
    </section>

    <!-- Quick Help Cards -->
    <section class="bg-[#F6F5F7] py-12 lg:py-16">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-5 px-4 sm:grid-cols-2 sm:px-6 lg:grid-cols-4 lg:px-8">

            <div class="rounded-2xl border border-[#EEE5EF] bg-white p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-[#E6007E] text-sm font-black text-white">01</div>
                <h3 class="font-heading text-2xl font-black text-[#141217]">
                    <?php esc_html_e('Orders', 'dawp'); ?>
                </h3>
                <p class="mt-3 text-sm leading-6 text-[#5E5363]">
                    <?php esc_html_e('Learn how order processing, confirmation, and tracking work.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-2xl border border-[#EEE5EF] bg-white p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-[#FF4FB8] text-sm font-black text-white">02</div>
                <h3 class="font-heading text-2xl font-black text-[#141217]">
                    <?php esc_html_e('Shipping', 'dawp'); ?>
                </h3>
                <p class="mt-3 text-sm leading-6 text-[#5E5363]">
                    <?php esc_html_e('Review delivery timelines and shipment expectations.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-2xl border border-[#EEE5EF] bg-white p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-[#7C3AED] text-sm font-black text-white">03</div>
                <h3 class="font-heading text-2xl font-black text-[#141217]">
                    <?php esc_html_e('Returns', 'dawp'); ?>
                </h3>
                <p class="mt-3 text-sm leading-6 text-[#5E5363]">
                    <?php esc_html_e('Understand return eligibility, refund review, and order issues.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-2xl border border-[#EEE5EF] bg-white p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-[#141217] text-sm font-black text-white">04</div>
                <h3 class="font-heading text-2xl font-black text-[#141217]">
                    <?php esc_html_e('Support', 'dawp'); ?>
                </h3>
                <p class="mt-3 text-sm leading-6 text-[#5E5363]">
                    <?php esc_html_e('Contact us when you need help with an order or product question.', 'dawp'); ?>
                </p>
            </div>

        </div>
    </section>

    <!-- FAQ Content -->
    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 sm:px-6 lg:grid-cols-[0.82fr_1.18fr] lg:px-8">

            <!-- Sidebar -->
            <aside class="lg:sticky lg:top-32 lg:self-start">
                <div class="rounded-3xl bg-[#141217] p-7 text-white shadow-xl shadow-[#141217]/10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#FF4FB8]">
                        <?php esc_html_e('FAQ Categories', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black leading-none">
                        <?php esc_html_e('Answers Without The Noise.', 'dawp'); ?>
                    </h2>

                    <p class="mt-5 text-sm leading-7 text-white/80">
                        <?php esc_html_e('Use these sections to quickly find the information you need before or after placing a House of Shoes Online order.', 'dawp'); ?>
                    </p>

                    <nav class="mt-7 grid gap-3 text-sm font-black uppercase tracking-wide text-white/85" aria-label="<?php esc_attr_e('FAQ navigation', 'dawp'); ?>">
                        <a href="#orders" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-[#FF4FB8]">
                            <?php esc_html_e('Orders', 'dawp'); ?>
                        </a>
                        <a href="#shipping" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-[#FF4FB8]">
                            <?php esc_html_e('Shipping', 'dawp'); ?>
                        </a>
                        <a href="#returns" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-[#FF4FB8]">
                            <?php esc_html_e('Returns & Refunds', 'dawp'); ?>
                        </a>
                        <a href="#products" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-[#FF4FB8]">
                            <?php esc_html_e('Products & Sizing', 'dawp'); ?>
                        </a>
                        <a href="#payments" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-[#FF4FB8]">
                            <?php esc_html_e('Payments', 'dawp'); ?>
                        </a>
                        <a href="#support" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-[#FF4FB8]">
                            <?php esc_html_e('Support', 'dawp'); ?>
                        </a>
                    </nav>
                </div>
            </aside>

            <!-- FAQ Body -->
            <div class="space-y-8">

                <?php
                $faq_sections = [
                    [
                        'id'       => 'orders',
                        'eyebrow'  => __('Orders', 'dawp'),
                        'title'    => __('Order Questions', 'dawp'),
                        'bg'       => 'bg-white shadow-sm',
                        'faqs'     => [
                            [
                                'q' => __('How do I know if my order was placed successfully?', 'dawp'),
                                'a' => __('After checkout, you should receive an order confirmation email with your order details. If you do not see it, check your spam or promotions folder first, then contact support if you still need help.', 'dawp'),
                            ],
                            [
                                'q' => __('Can I change or cancel my order after placing it?', 'dawp'),
                                'a' => __('Contact us as soon as possible if you need to change or cancel an order. We cannot guarantee changes after an order has entered processing or fulfillment, but we will do our best to help.', 'dawp'),
                            ],
                            [
                                'q' => __('Why has my order not shipped yet?', 'dawp'),
                                'a' => __('Orders placed before our 2:00 PM PST cutoff time generally begin handling in 0-1 business days. During peak seasons or public holidays, there might be a slight delay in processing.', 'dawp'),
                            ],
                        ],
                    ],
                    [
                        'id'       => 'shipping',
                        'eyebrow'  => __('Shipping', 'dawp'),
                        'title'    => __('Delivery & Tracking', 'dawp'),
                        'bg'       => 'bg-[#F6F5F7]',
                        'faqs'     => [
                            [
                                'q' => __('Where do you ship to?', 'dawp'),
                                'a' => __('We ship to addresses across the United States. Shipping options and costs are displayed at checkout based on your destination.', 'dawp'),
                            ],
                            [
                                'q' => __('How long does shipping take?', 'dawp'),
                                'a' => __('Our estimated delivery time is 0-1 business days in total, consisting of 0-1 days for handling and 0 days for transit depending on your location.', 'dawp'),
                            ],
                            [
                                'q' => __('Will I receive tracking information?', 'dawp'),
                                'a' => __('Yes. Tracking information is sent by email once your order ships. Please allow some time for the carrier tracking page to update after the tracking number is created.', 'dawp'),
                            ],
                        ],
                    ],
                    [
                        'id'       => 'returns',
                        'eyebrow'  => __('Returns & Refunds', 'dawp'),
                        'title'    => __('Return Policy Questions', 'dawp'),
                        'bg'       => 'bg-white shadow-sm',
                        'faqs'     => [
                            [
                                'q' => __('What is your return window?', 'dawp'),
                                'a' => __('Customers may request a return within 30 days of delivery. Eligible footwear must be unused, unwashed, unworn, in original condition, and returned with original packaging.', 'dawp'),
                            ],
                            [
                                'q' => __('Are there restocking fees or return shipping charges?', 'dawp'),
                                'a' => __('We do not charge any restocking fees. However, customers are responsible for the return shipping costs, and a return label can be downloaded and printed. We cover return shipping only for defective or incorrect items.', 'dawp'),
                            ],
                            [
                                'q' => __('How long does a refund take?', 'dawp'),
                                'a' => __('Once a returned item is received and inspected, approved refunds are processed back to the original payment method within 10 days. Your payment provider may take extra time to post the refund.', 'dawp'),
                            ],
                        ],
                    ],
                    [
                        'id'       => 'products',
                        'eyebrow'  => __('Products & Sizing', 'dawp'),
                        'title'    => __('Footwear Questions', 'dawp'),
                        'bg'       => 'bg-[#F6F5F7]',
                        'faqs'     => [
                            [
                                'q' => __('How should I choose my size?', 'dawp'),
                                'a' => __('Review the product description and size information before placing an order. If you are between sizes or unsure about fit, feel free to contact our support team.', 'dawp'),
                            ],
                            [
                                'q' => __('Will product colors look exactly like the photos?', 'dawp'),
                                'a' => __('We aim to display product colors accurately, but slight differences may occur due to screen settings, photography lighting, or production updates.', 'dawp'),
                            ],
                            [
                                'q' => __('What condition are your shoes in?', 'dawp'),
                                'a' => __('All of our footwear is brand new, high-quality, and carefully inspected before being shipped to you.', 'dawp'),
                            ],
                        ],
                    ],
                    [
                        'id'       => 'payments',
                        'eyebrow'  => __('Payments', 'dawp'),
                        'title'    => __('Checkout & Payment Questions', 'dawp'),
                        'bg'       => 'bg-white shadow-sm',
                        'faqs'     => [
                            [
                                'q' => __('What payment methods do you accept?', 'dawp'),
                                'a' => __('We accept major credit cards (Visa, Mastercard, Discover, American Express) and PayPal for secure and convenient checkout.', 'dawp'),
                            ],
                            [
                                'q' => __('Is checkout secure?', 'dawp'),
                                'a' => __('Yes. Payment and checkout information is fully encrypted and handled through secure ecommerce systems to protect your data.', 'dawp'),
                            ],
                            [
                                'q' => __('Why was my payment declined?', 'dawp'),
                                'a' => __('Payments may be declined by your bank or card provider for several reasons. Check your billing details and contact your payment provider if the issue continues.', 'dawp'),
                            ],
                        ],
                    ],
                    [
                        'id'       => 'support',
                        'eyebrow'  => __('Support', 'dawp'),
                        'title'    => __('Getting Help', 'dawp'),
                        'bg'       => 'bg-[#F6F5F7]',
                        'faqs'     => [
                            [
                                'q' => __('How can I contact House of Shoes Online?', 'dawp'),
                                'a' => __('You can contact us through the Contact Us page or email support@houseofshoesonline.com. Include your order number if your question is order-related.', 'dawp'),
                            ],
                            [
                                'q' => __('Where are you located?', 'dawp'),
                                'a' => __('Our primary business address is 4211 W Sahara Ave Ste C, Las Vegas, NV 89102.', 'dawp'),
                            ],
                            [
                                'q' => __('When is customer support available?', 'dawp'),
                                'a' => __('Our business hours are Monday through Friday, 9:00 AM – 6:00 PM PST. Response times may vary during weekends or holidays.', 'dawp'),
                            ],
                        ],
                    ],
                ];
                ?>

                <?php foreach ($faq_sections as $section) : ?>
                    <section id="<?php echo esc_attr($section['id']); ?>" class="rounded-3xl border border-[#EEE5EF] <?php echo esc_attr($section['bg']); ?> p-7 lg:p-10">
                        <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]">
                            <?php echo esc_html($section['eyebrow']); ?>
                        </p>

                        <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]">
                            <?php echo esc_html($section['title']); ?>
                        </h2>

                        <div class="mt-7 divide-y divide-[#EEE5EF] overflow-hidden rounded-2xl border border-[#EEE5EF] bg-white">
                            <?php foreach ($section['faqs'] as $index => $faq) : ?>
                                <div class="faq-item">
                                    <button type="button"
                                            class="faq-toggle flex w-full items-center justify-between gap-4 px-5 py-5 text-left transition hover:bg-[#F6F5F7]"
                                            aria-expanded="false">
                                        <span class="font-heading text-xl font-black leading-tight text-[#141217]">
                                            <?php echo esc_html($faq['q']); ?>
                                        </span>

                                        <span class="faq-icon flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#141217] text-lg font-black text-white transition">
                                            +
                                        </span>
                                    </button>

                                    <div class="faq-answer hidden px-5 pb-6">
                                        <p class="max-w-3xl text-base leading-8 text-[#5E5363]">
                                            <?php echo esc_html($faq['a']); ?>
                                        </p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php endforeach; ?>

                <!-- Contact CTA -->
                <section class="overflow-hidden rounded-3xl bg-[#141217] text-white shadow-xl shadow-[#141217]/10">
                    <div class="p-7 lg:p-10">
                        <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#FF4FB8]">
                            <?php esc_html_e('Still Need Help?', 'dawp'); ?>
                        </p>

                        <h2 class="font-heading text-4xl font-black leading-tight lg:text-5xl">
                            <?php esc_html_e('Our Support Team Keeps It Clear.', 'dawp'); ?>
                        </h2>

                        <p class="mt-5 max-w-xl text-base leading-8 text-white/80">
                            <?php esc_html_e('If you cannot find the answer you need, contact our support team and we will help you with order, product, shipping, or return questions.', 'dawp'); ?>
                        </p>

                        <div class="mt-8 flex flex-wrap gap-4">
                            <a href="<?php echo esc_url(home_url('/contact-us/')); ?>"
                               class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#E6007E] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#7C3AED]">
                                <?php esc_html_e('Contact Support', 'dawp'); ?>
                            </a>

                            <a href="mailto:support@houseofshoesonline.com"
                               class="inline-flex min-h-12 items-center justify-center rounded-full border border-white/25 px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-[#141217]">
                                <?php esc_html_e('Email Us', 'dawp'); ?>
                            </a>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </section>

</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const toggles = document.querySelectorAll('.faq-toggle');

    toggles.forEach(function (toggle) {
        toggle.addEventListener('click', function () {
            const item = toggle.closest('.faq-item');
            const answer = item.querySelector('.faq-answer');
            const icon = item.querySelector('.faq-icon');
            const expanded = toggle.getAttribute('aria-expanded') === 'true';

            toggle.setAttribute('aria-expanded', expanded ? 'false' : 'true');
            answer.classList.toggle('hidden');

            if (icon) {
                icon.textContent = expanded ? '+' : '–';
                icon.classList.toggle('bg-[#E6007E]', !expanded);
                icon.classList.toggle('bg-[#141217]', expanded);
            }
        });
    });
});
</script>

<?php
get_footer();
