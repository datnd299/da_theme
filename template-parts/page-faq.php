<?php
/**
 * Template Name: FAQs
 * Template Part: page-faq
 */

get_header();
?>

<main id="primary" class="bg-white text-slickText font-body">

    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-slickBlack text-white">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(34,197,94,0.35),transparent_34%),linear-gradient(135deg,#0B0F0D_0%,#123D2A_58%,#0B0F0D_100%)]"></div>
        <div class="absolute -right-24 top-16 h-80 w-80 rounded-full bg-slickActive/20 blur-3xl"></div>
        <div class="absolute -left-24 bottom-0 h-80 w-80 rounded-full bg-slickLime/10 blur-3xl"></div>

        <div class="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
            <div class="max-w-4xl">
                <p class="mb-5 text-sm font-black uppercase tracking-[0.24em] text-slickLime">
                    <?php esc_html_e('Help Center', 'dawp'); ?>
                </p>

                <h1 class="font-heading text-5xl font-black uppercase leading-[0.92] tracking-[-0.05em] text-white sm:text-6xl lg:text-7xl">
                    <?php esc_html_e('Frequently Asked Questions', 'dawp'); ?>
                </h1>

                <p class="mt-6 max-w-2xl text-lg leading-8 text-white/85">
                    <?php esc_html_e('Find quick answers about orders, shipping, returns, sizing, payments, and customer support at Slicktee.', 'dawp'); ?>
                </p>
            </div>
        </div>
    </section>

    <!-- Quick Help Cards -->
    <section class="bg-slickSoft py-12 lg:py-16">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-5 px-4 sm:grid-cols-2 sm:px-6 lg:grid-cols-4 lg:px-8">

            <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-slickGreen text-sm font-black text-white">01</div>
                <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                    <?php esc_html_e('Orders', 'dawp'); ?>
                </h3>
                <p class="mt-3 text-sm leading-6 text-slickMuted">
                    <?php esc_html_e('Learn how order processing, confirmation, and tracking work.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-slickActive text-sm font-black text-slickBlack">02</div>
                <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                    <?php esc_html_e('Shipping', 'dawp'); ?>
                </h3>
                <p class="mt-3 text-sm leading-6 text-slickMuted">
                    <?php esc_html_e('Review delivery timelines and shipment expectations.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-slickGreen text-sm font-black text-white">03</div>
                <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                    <?php esc_html_e('Returns', 'dawp'); ?>
                </h3>
                <p class="mt-3 text-sm leading-6 text-slickMuted">
                    <?php esc_html_e('Understand return eligibility, refund review, and order issues.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-slickLime text-sm font-black text-slickBlack">04</div>
                <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                    <?php esc_html_e('Support', 'dawp'); ?>
                </h3>
                <p class="mt-3 text-sm leading-6 text-slickMuted">
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
                <div class="rounded-3xl bg-slickBlack p-7 text-white shadow-xl shadow-black/10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickLime">
                        <?php esc_html_e('FAQ Categories', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase leading-none tracking-[-0.04em]">
                        <?php esc_html_e('Answers Without The Noise.', 'dawp'); ?>
                    </h2>

                    <p class="mt-5 text-sm leading-7 text-white/80">
                        <?php esc_html_e('Use these sections to quickly find the information you need before or after placing a Slicktee order.', 'dawp'); ?>
                    </p>

                    <nav class="mt-7 grid gap-3 text-sm font-black uppercase tracking-wide text-white/85" aria-label="<?php esc_attr_e('FAQ navigation', 'dawp'); ?>">
                        <a href="#orders" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-slickLime hover:text-slickLime">
                            <?php esc_html_e('Orders', 'dawp'); ?>
                        </a>
                        <a href="#shipping" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-slickLime hover:text-slickLime">
                            <?php esc_html_e('Shipping', 'dawp'); ?>
                        </a>
                        <a href="#returns" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-slickLime hover:text-slickLime">
                            <?php esc_html_e('Returns & Refunds', 'dawp'); ?>
                        </a>
                        <a href="#products" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-slickLime hover:text-slickLime">
                            <?php esc_html_e('Products & Sizing', 'dawp'); ?>
                        </a>
                        <a href="#payments" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-slickLime hover:text-slickLime">
                            <?php esc_html_e('Payments', 'dawp'); ?>
                        </a>
                        <a href="#support" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-slickLime hover:text-slickLime">
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
                                'a' => __('Orders are typically processed within 2–4 business days. Processing time includes order verification, preparation, and fulfillment before dispatch.', 'dawp'),
                            ],
                        ],
                    ],
                    [
                        'id'       => 'shipping',
                        'eyebrow'  => __('Shipping', 'dawp'),
                        'title'    => __('Delivery & Tracking', 'dawp'),
                        'bg'       => 'bg-slickSoft',
                        'faqs'     => [
                            [
                                'q' => __('How long does shipping take?', 'dawp'),
                                'a' => __('After dispatch, standard US shipping typically takes 5–10 business days depending on destination, carrier conditions, and seasonal volume.', 'dawp'),
                            ],
                            [
                                'q' => __('Will I receive tracking information?', 'dawp'),
                                'a' => __('Yes. Tracking information is sent by email once your order ships. Please allow some time for the carrier tracking page to update after the tracking number is created.', 'dawp'),
                            ],
                            [
                                'q' => __('Do business days include weekends or holidays?', 'dawp'),
                                'a' => __('No. Business days do not include weekends or public holidays. Delivery and processing may take slightly longer during high-volume periods.', 'dawp'),
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
                                'a' => __('Customers may request a return within 30 days of delivery. Eligible items must be unused, unwashed, unworn, in original condition, and returned with original packaging where applicable.', 'dawp'),
                            ],
                            [
                                'q' => __('What items are not eligible for return?', 'dawp'),
                                'a' => __('Items may not qualify if they show wear, stains, odors, damage, washing, alteration, or missing original packaging where applicable.', 'dawp'),
                            ],
                            [
                                'q' => __('How long does a refund take?', 'dawp'),
                                'a' => __('Once a returned item is received and inspected, we will notify you about the approval status. Approved refunds are processed back to the original payment method. Your payment provider may take several business days to post the refund.', 'dawp'),
                            ],
                        ],
                    ],
                    [
                        'id'       => 'products',
                        'eyebrow'  => __('Products & Sizing', 'dawp'),
                        'title'    => __('Apparel Questions', 'dawp'),
                        'bg'       => 'bg-slickSoft',
                        'faqs'     => [
                            [
                                'q' => __('How should I choose my size?', 'dawp'),
                                'a' => __('Review the product description and size information before placing an order. If you are between sizes or unsure about fit, contact our support team before checkout.', 'dawp'),
                            ],
                            [
                                'q' => __('Will product colors look exactly like the photos?', 'dawp'),
                                'a' => __('We aim to display product colors accurately, but slight differences may occur due to screen settings, photography lighting, or production updates.', 'dawp'),
                            ],
                            [
                                'q' => __('Are your designs original?', 'dawp'),
                                'a' => __('Slicktee focuses on clean, brand-led graphic apparel. We avoid copyright-heavy fan merch, celebrity images, anime references, offensive designs, and unauthorized third-party graphics.', 'dawp'),
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
                                'q' => __('Is checkout secure?', 'dawp'),
                                'a' => __('Yes. Payment and checkout information is handled through secure ecommerce systems. We focus on providing a clear and trustworthy shopping experience.', 'dawp'),
                            ],
                            [
                                'q' => __('Why was my payment declined?', 'dawp'),
                                'a' => __('Payments may be declined by your bank, card provider, or payment processor for several reasons. Check your billing details and contact your payment provider if the issue continues.', 'dawp'),
                            ],
                            [
                                'q' => __('Can prices change?', 'dawp'),
                                'a' => __('Prices, product availability, and promotions may change without notice. The final order total will be shown at checkout before payment is completed.', 'dawp'),
                            ],
                        ],
                    ],
                    [
                        'id'       => 'support',
                        'eyebrow'  => __('Support', 'dawp'),
                        'title'    => __('Getting Help', 'dawp'),
                        'bg'       => 'bg-slickSoft',
                        'faqs'     => [
                            [
                                'q' => __('How can I contact Slicktee?', 'dawp'),
                                'a' => __('You can contact us through the Contact Us page or email support@slicktee.com. Include your order number if your question is order-related.', 'dawp'),
                            ],
                            [
                                'q' => __('What should I do if I received a damaged or incorrect item?', 'dawp'),
                                'a' => __('Contact us as soon as possible with your order number and clear photos of the issue. Our support team will review your case and help with the next steps.', 'dawp'),
                            ],
                            [
                                'q' => __('When is customer support available?', 'dawp'),
                                'a' => __('Our business hours are Monday through Friday, 9:00 AM – 6:00 PM EST. Response times may vary during weekends, holidays, or high-volume periods.', 'dawp'),
                            ],
                        ],
                    ],
                ];
                ?>

                <?php foreach ($faq_sections as $section) : ?>
                    <section id="<?php echo esc_attr($section['id']); ?>" class="rounded-3xl border border-[#E5E7EB] <?php echo esc_attr($section['bg']); ?> p-7 lg:p-10">
                        <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                            <?php echo esc_html($section['eyebrow']); ?>
                        </p>

                        <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                            <?php echo esc_html($section['title']); ?>
                        </h2>

                        <div class="mt-7 divide-y divide-[#E5E7EB] overflow-hidden rounded-2xl border border-[#E5E7EB] bg-white">
                            <?php foreach ($section['faqs'] as $index => $faq) : ?>
                                <div class="faq-item">
                                    <button type="button"
                                            class="faq-toggle flex w-full items-center justify-between gap-4 px-5 py-5 text-left transition hover:bg-slickSoft"
                                            aria-expanded="false">
                                        <span class="font-heading text-xl font-black uppercase leading-tight tracking-[-0.03em] text-slickText">
                                            <?php echo esc_html($faq['q']); ?>
                                        </span>

                                        <span class="faq-icon flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-slickBlack text-lg font-black text-white transition">
                                            +
                                        </span>
                                    </button>

                                    <div class="faq-answer hidden px-5 pb-6">
                                        <p class="max-w-3xl text-base leading-8 text-slickMuted">
                                            <?php echo esc_html($faq['a']); ?>
                                        </p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php endforeach; ?>

                <!-- Contact CTA -->
                <section class="overflow-hidden rounded-3xl bg-slickBlack text-white shadow-xl shadow-black/10">
                    <div class="grid grid-cols-1 lg:grid-cols-[1.05fr_0.95fr]">
                        <div class="p-7 lg:p-10">
                            <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickLime">
                                <?php esc_html_e('Still Need Help?', 'dawp'); ?>
                            </p>

                            <h2 class="font-heading text-4xl font-black uppercase leading-none tracking-[-0.04em]">
                                <?php esc_html_e('Our Support Team Keeps It Clear.', 'dawp'); ?>
                            </h2>

                            <p class="mt-5 max-w-xl text-base leading-8 text-white/80">
                                <?php esc_html_e('If you cannot find the answer you need, contact Slicktee support and we will help you with order, product, shipping, or return questions.', 'dawp'); ?>
                            </p>

                            <div class="mt-8 flex flex-wrap gap-4">
                                <a href="<?php echo esc_url(home_url('/contact-us/')); ?>"
                                   class="inline-flex min-h-12 items-center justify-center rounded-md bg-slickActive px-6 text-sm font-black uppercase tracking-wide text-slickBlack transition hover:bg-slickLime">
                                    <?php esc_html_e('Contact Support', 'dawp'); ?>
                                </a>

                                <a href="mailto:support@slicktee.com"
                                   class="inline-flex min-h-12 items-center justify-center rounded-md border border-white/25 px-6 text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-slickBlack">
                                    <?php esc_html_e('Email Us', 'dawp'); ?>
                                </a>
                            </div>
                        </div>

                        <div class="min-h-[300px] bg-slickGreen">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/Slichtee/contact_banner.png'); ?>"
                                 alt="<?php esc_attr_e('Slicktee customer support FAQ assistance', 'dawp'); ?>"
                                 class="h-full w-full object-cover opacity-85">
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
                icon.classList.toggle('bg-slickActive', !expanded);
                icon.classList.toggle('text-slickBlack', !expanded);
                icon.classList.toggle('bg-slickBlack', expanded);
                icon.classList.toggle('text-white', expanded);
            }
        });
    });
});
</script>

<?php
get_footer();
