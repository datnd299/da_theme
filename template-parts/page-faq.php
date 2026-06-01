<?php
/**
 * Template Part: page-faq
 *
 * @package dawp
 */

$support_email          = 'support@houseofshoesonline.com';
$address                = dawp_get_store_address();
$contact_url            = home_url('/contact-us/');
$customer_service_hours = 'Monday-Friday, 9:00 AM-6:00 PM PST.';
?>

<main id="primary" class="bg-[#F6F5F7] font-body text-[#141217]">

    <section class="relative overflow-hidden bg-[#FFF7FB] text-[#141217]">
        <div class="absolute left-0 top-0 h-1 w-full bg-[linear-gradient(90deg,#E6007E,#FF4FB8,#7C3AED)]"></div>

        <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
            <div class="max-w-4xl">
                <p class="mb-5 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]">
                    <?php esc_html_e('Customer Care', 'dawp'); ?>
                </p>

                <h1 class="font-heading text-5xl font-black leading-[0.94] text-[#141217] sm:text-6xl lg:text-7xl">
                    <?php esc_html_e('Frequently Asked Questions', 'dawp'); ?>
                </h1>

                <p class="mt-6 max-w-3xl text-lg leading-8 text-[#5E5363]">
                    <?php esc_html_e('Quick answers about orders, U.S. shipping, returns, refunds, sizing, payments, and customer support for House of Shoes Online.', 'dawp'); ?>
                </p>

                <p class="mt-5 text-sm font-black uppercase tracking-[0.18em] text-[#7C3AED]">
                    <?php esc_html_e('Last updated: May 22, 2026', 'dawp'); ?>
                </p>
            </div>
        </div>
    </section>

    <section class="py-12 lg:py-16">
        <div class="faq-topic-slider mx-auto grid max-w-7xl grid-cols-1 gap-5 px-4 sm:grid-cols-2 sm:px-6 lg:grid-cols-4 lg:px-8" aria-label="<?php esc_attr_e('FAQ topic highlights', 'dawp'); ?>">

            <div class="faq-topic-card rounded-[1.5rem] border border-[#EEE5EF] bg-white p-6 shadow-sm shadow-[#141217]/5">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-[#E6007E] text-sm font-black text-white">01</div>
                <h3 class="font-heading text-2xl font-black text-[#141217]">
                    <?php esc_html_e('Orders', 'dawp'); ?>
                </h3>
                <p class="mt-3 text-sm leading-6 text-[#5E5363]">
                    <?php esc_html_e('Learn how order processing, confirmation, cutoff time, and tracking work.', 'dawp'); ?>
                </p>
            </div>

            <div class="faq-topic-card rounded-[1.5rem] border border-[#EEE5EF] bg-white p-6 shadow-sm shadow-[#141217]/5">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-[#FF4FB8] text-sm font-black text-white">02</div>
                <h3 class="font-heading text-2xl font-black text-[#141217]">
                    <?php esc_html_e('Shipping', 'dawp'); ?>
                </h3>
                <p class="mt-3 text-sm leading-6 text-[#5E5363]">
                    <?php esc_html_e('Review free standard U.S. shipping, delivery estimates, and carrier updates.', 'dawp'); ?>
                </p>
            </div>

            <div class="faq-topic-card rounded-[1.5rem] border border-[#EEE5EF] bg-white p-6 shadow-sm shadow-[#141217]/5">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-[#7C3AED] text-sm font-black text-white">03</div>
                <h3 class="font-heading text-2xl font-black text-[#141217]">
                    <?php esc_html_e('Returns', 'dawp'); ?>
                </h3>
                <p class="mt-3 text-sm leading-6 text-[#5E5363]">
                    <?php esc_html_e('Understand 30-day eligibility, return labels, refund timing, and exchanges.', 'dawp'); ?>
                </p>
            </div>

            <div class="faq-topic-card rounded-[1.5rem] border border-[#EEE5EF] bg-white p-6 shadow-sm shadow-[#141217]/5">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-[#141217] text-sm font-black text-white">04</div>
                <h3 class="font-heading text-2xl font-black text-[#141217]">
                    <?php esc_html_e('Support', 'dawp'); ?>
                </h3>
                <p class="mt-3 text-sm leading-6 text-[#5E5363]">
                    <?php esc_html_e('Contact us when you need help with an order, shipment, or product question.', 'dawp'); ?>
                </p>
            </div>

        </div>
    </section>

    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 sm:px-6 lg:grid-cols-[0.82fr_1.18fr] lg:px-8">

            <aside class="hidden lg:sticky lg:top-32 lg:block lg:self-start">
                <div class="rounded-[1.5rem] bg-[#141217] p-7 text-white shadow-xl shadow-[#141217]/10">
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
                        <a href="#orders" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-[#FF4FB8]"><?php esc_html_e('Orders', 'dawp'); ?></a>
                        <a href="#shipping" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-[#FF4FB8]"><?php esc_html_e('Shipping', 'dawp'); ?></a>
                        <a href="#returns" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-[#FF4FB8]"><?php esc_html_e('Returns & Refunds', 'dawp'); ?></a>
                        <a href="#products" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-[#FF4FB8]"><?php esc_html_e('Products & Sizing', 'dawp'); ?></a>
                        <a href="#payments" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-[#FF4FB8]"><?php esc_html_e('Payments', 'dawp'); ?></a>
                        <a href="#support" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-[#FF4FB8]"><?php esc_html_e('Support', 'dawp'); ?></a>
                    </nav>
                </div>
            </aside>

            <div class="space-y-8">

                <?php
                $faq_sections = [
                    [
                        'id'      => 'orders',
                        'eyebrow' => __('Orders', 'dawp'),
                        'title'   => __('Order Questions', 'dawp'),
                        'bg'      => 'bg-white shadow-sm',
                        'faqs'    => [
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
                                'a' => __('Orders are processed Monday through Friday, excluding standard U.S. public holidays. Orders placed after our 5:00 PM (GMT-08:00) Pacific Standard Time cutoff begin processing the following business day. Standard handling takes 1-3 business days.', 'dawp'),
                            ],
                        ],
                    ],
                    [
                        'id'      => 'shipping',
                        'eyebrow' => __('Shipping', 'dawp'),
                        'title'   => __('Delivery & Tracking', 'dawp'),
                        'bg'      => 'bg-[#F6F5F7]',
                        'faqs'    => [
                            [
                                'q' => __('Where do you ship to?', 'dawp'),
                                'a' => __('We currently ship exclusively within the United States. If a product, destination, or carrier limitation prevents delivery to your address, you will be notified at checkout before payment is processed.', 'dawp'),
                            ],
                            [
                                'q' => __('How much does shipping cost?', 'dawp'),
                                'a' => __('Standard U.S. shipping is free for all orders nationwide with no minimum purchase requirement. If optional upgraded shipping is available for your destination, the exact cost will be shown at checkout before payment.', 'dawp'),
                            ],
                            [
                                'q' => __('How long does shipping take?', 'dawp'),
                                'a' => __('Estimated delivery is 6-10 business days total from the date of purchase. This includes 1-3 business days for order handling and 5-7 business days for transit, Monday through Friday.', 'dawp'),
                            ],
                            [
                                'q' => __('Will I receive tracking information?', 'dawp'),
                                'a' => __('Yes. Once your order is dispatched, we send a shipping confirmation email with a direct tracking link and carrier details. Please allow some time for the carrier tracking page to update after the tracking number is created.', 'dawp'),
                            ],
                            [
                                'q' => __('Which carriers do you use?', 'dawp'),
                                'a' => __('Orders ship with trusted domestic U.S. carriers including USPS, UPS, FedEx, or DHL. The final carrier is selected when your package is labeled and prepared for shipment.', 'dawp'),
                            ],
                        ],
                    ],
                    [
                        'id'      => 'returns',
                        'eyebrow' => __('Returns & Refunds', 'dawp'),
                        'title'   => __('Return Policy Questions', 'dawp'),
                        'bg'      => 'bg-white shadow-sm',
                        'faqs'    => [
                            [
                                'q' => __('What is your return window?', 'dawp'),
                                'a' => __('You must initiate your return request within 30 days of delivery. Eligible footwear must be unworn, unused, undamaged, clean, in original unaltered condition, and returned with all original packaging, tags, labels, shoe boxes, inserts, and included accessories.', 'dawp'),
                            ],
                            [
                                'q' => __('Are there restocking fees or return shipping charges?', 'dawp'),
                                'a' => __('We do not charge restocking fees for eligible returns. For defective, damaged, incorrect, or carrier-damaged products, we cover 100% of return shipping and provide a downloadable, printable prepaid label by email. For customer remorse returns, the prepaid label cost is deducted from the final refund.', 'dawp'),
                            ],
                            [
                                'q' => __('How do I start a return?', 'dawp'),
                                'a' => __('Email us or use the Contact Us page within 30 days of delivery. Include your order number, checkout email, item details, return reason, and photos or videos if the item arrived damaged. Do not ship items back without return authorization.', 'dawp'),
                            ],
                            [
                                'q' => __('How long does a refund take?', 'dawp'),
                                'a' => __('Once your return package is received, we inspect the item within 1-2 business days. If approved, your refund is processed automatically back to your original payment method within 7 business days. If you have not received it after 15 business days of approval, please check with your bank or card company, then contact us.', 'dawp'),
                            ],
                            [
                                'q' => __('Do you offer exchanges?', 'dawp'),
                                'a' => __('We do not process direct one-for-one exchanges. To get a different size, color, or model, return the original purchase for a refund and place a new order on our website.', 'dawp'),
                            ],
                        ],
                    ],
                    [
                        'id'      => 'products',
                        'eyebrow' => __('Products & Sizing', 'dawp'),
                        'title'   => __('Footwear Questions', 'dawp'),
                        'bg'      => 'bg-[#F6F5F7]',
                        'faqs'    => [
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
                        'id'      => 'payments',
                        'eyebrow' => __('Payments', 'dawp'),
                        'title'   => __('Checkout & Payment Questions', 'dawp'),
                        'bg'      => 'bg-white shadow-sm',
                        'faqs'    => [
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
                        'id'      => 'support',
                        'eyebrow' => __('Support', 'dawp'),
                        'title'   => __('Getting Help', 'dawp'),
                        'bg'      => 'bg-[#F6F5F7]',
                        'faqs'    => [
                            [
                                'q' => __('How can I contact House of Shoes Online?', 'dawp'),
                                'a' => sprintf(__('You can contact us through the Contact Us page or email %s. Include your order number if your question is order-related.', 'dawp'), $support_email),
                            ],
                            [
                                'q' => __('Where are you located?', 'dawp'),
                                'a' => sprintf(__('Our primary business address is %s.', 'dawp'), $address),
                            ],
                            [
                                'q' => __('When is customer support available?', 'dawp'),
                                'a' => sprintf(__('Our customer service hours are %s We aim to reply within 1 business day, though response times may vary on weekends, holidays, or high-volume periods.', 'dawp'), $customer_service_hours),
                            ],
                        ],
                    ],
                ];
                ?>

                <?php foreach ($faq_sections as $section) : ?>
                    <section id="<?php echo esc_attr($section['id']); ?>" class="rounded-[1.5rem] border border-[#EEE5EF] <?php echo esc_attr($section['bg']); ?> p-7 lg:p-10">
                        <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]">
                            <?php echo esc_html($section['eyebrow']); ?>
                        </p>

                        <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]">
                            <?php echo esc_html($section['title']); ?>
                        </h2>

                        <div class="mt-7 divide-y divide-[#EEE5EF] overflow-hidden rounded-[1rem] border border-[#EEE5EF] bg-white">
                            <?php foreach ($section['faqs'] as $faq) : ?>
                                <div class="faq-item">
                                    <button type="button" class="faq-toggle flex w-full items-center justify-between gap-4 px-5 py-5 text-left transition hover:bg-[#F6F5F7]" aria-expanded="false">
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

                <section class="overflow-hidden rounded-[1.5rem] bg-[#141217] text-white shadow-xl shadow-[#141217]/10">
                    <div class="p-7 lg:p-10">
                        <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#FF4FB8]">
                            <?php esc_html_e('Still Need Help?', 'dawp'); ?>
                        </p>

                        <h2 class="font-heading text-4xl font-black leading-tight lg:text-5xl">
                            <?php esc_html_e('Our Support Team Keeps It Clear.', 'dawp'); ?>
                        </h2>

                        <p class="mt-5 max-w-xl text-base leading-8 text-white/80">
                            <?php esc_html_e('If you cannot find the answer you need, contact our support team or review the full policy pages for complete shipping, return, and refund details.', 'dawp'); ?>
                        </p>

                        <div class="mt-8 flex flex-wrap gap-4">
                            <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#E6007E] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#7C3AED]">
                                <?php esc_html_e('Contact Support', 'dawp'); ?>
                            </a>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </section>

</main>

<style>
@media (max-width: 1023px) {
    .faq-topic-slider {
        display: flex;
        gap: 16px;
        overflow-x: auto;
        overscroll-behavior-x: contain;
        scroll-padding-inline: 16px;
        scroll-snap-type: x mandatory;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
    }

    .faq-topic-slider::-webkit-scrollbar {
        display: none;
    }

    .faq-topic-card {
        flex: 0 0 min(82vw, 340px);
        min-height: 230px;
        scroll-snap-align: start;
    }
}
</style>

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
                icon.textContent = expanded ? '+' : '-';
                icon.classList.toggle('bg-[#E6007E]', !expanded);
                icon.classList.toggle('bg-[#141217]', expanded);
            }
        });
    });
});
</script>
