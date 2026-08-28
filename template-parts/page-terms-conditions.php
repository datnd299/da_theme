<?php
/**
 * Terms and conditions page for Reluxwatches.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$store_name     = 'Reluxwatches';
$site_domain    = 'Reluxwatches.com';
$support_email  = 'support@reluxwatches.com';
$support_phone  = '826-207-1399';
$store_address  = function_exists('dawp_get_store_address') ? dawp_get_store_address() : '';
$business_hours = __('Monday - Friday, 9:00 AM - 5:00 PM, GMT-08:00 Pacific Standard Time', 'dawp');
$last_updated   = __('May 29, 2026', 'dawp');
$shipping_url   = home_url('/shipping-policy/');
$returns_url    = home_url('/return-refund-policy/');
$privacy_url    = home_url('/privacy-policy/');
$contact_url    = home_url('/contact-us/');

$shipping_parameters = [
    __('Shipping Locations: Reluxwatches currently ships exclusively within the United States domestic market.', 'dawp'),
    __('Shipping Fees: Standard U.S. shipping is free ($0.00) for all orders nationwide with no minimum purchase requirement. Any optional upgraded shipping cost, if available, is shown clearly at checkout before payment.', 'dawp'),
    __('Daily Order Cutoff Time: 5:00 PM (GMT-08:00) Pacific Standard Time (Monday to Friday). Orders placed after this time begin processing on the following business day.', 'dawp'),
    __('Handling Time: Current order handling and packaging time is 1-2 business days (Monday to Friday), excluding standard U.S. public holidays.', 'dawp'),
    __('Transit Time: Standard U.S. transit takes 3-5 business days (Monday to Friday). Estimated delivery is 4-7 business days total from the date of purchase.', 'dawp'),
    __('Carriers & Tracking: Orders are shipped using trusted domestic U.S. carriers such as USPS, UPS, FedEx, or DHL. Tracking details are emailed once an order is dispatched.', 'dawp'),
];

$return_terms = [
    __('Return Window: Customers may request returns within 30 days of documented delivery. Returns are accepted for eligible products in new condition.', 'dawp'),
    __('Product Condition: Eligible products must be entirely unused, in their original pristine condition (New only), and returned with original packaging, tags, labels, accessories, and included parts intact.', 'dawp'),
    __('Fees & Shipping Costs: There is no restocking fee ($0.00). The customer is responsible for all return shipping costs for both defective/damaged items and change-of-mind returns. We do not cover return shipping fees or provide prepaid shipping labels.', 'dawp'),
    __('Refund Timelines: Approved refunds are processed back to the original payment method within up to 7 business days.', 'dawp'),
];

$contact_details = [
    [
        'label' => __('Store/Brand Name', 'dawp'),
        'value' => $store_name,
    ],
    [
        'label' => __('Customer Support Email', 'dawp'),
        'value' => $support_email,
        'url'   => 'mailto:' . $support_email,
    ],
    [
        'label' => __('Customer Support Phone', 'dawp'),
        'value' => $support_phone,
        'url'   => 'tel:' . $support_phone,
    ],
    [
        'label' => __('Customer Service Hours', 'dawp'),
        'value' => $business_hours,
    ],
    [
        'label' => __('Contact Page', 'dawp'),
        'value' => __('Contact Us', 'dawp'),
        'url'   => $contact_url,
    ],
];

if ($store_address) {
    array_splice($contact_details, 3, 0, [[
        'label' => __('Physical Business Address', 'dawp'),
        'value' => $store_address,
    ]]);
}

$sections = [
    [
        'title' => __('1. Online Store Scope & Content Accuracy', 'dawp'),
        'copy'  => [
            __('Reluxwatches is an e-commerce store focused on modern watches, everyday timepieces, statement styles, sport watches, and watch accessories.', 'dawp'),
            __('We work to present product descriptions, images, prices, materials, dimensions, and availability as accurately as reasonably possible. Small variations in color, texture, or physical appearance may occur due to individual screen monitor settings, digital photography lighting, or periodic supplier updates.', 'dawp'),
            __('Reluxwatches strictly adheres to ethical commerce: we do not sell counterfeit goods, replica logos, unauthorized branded items, dietary supplements, medical devices, regulated products, or items with unverified health claims.', 'dawp'),
        ],
    ],
    [
        'title' => __('2. Website Use & Eligibility', 'dawp'),
        'copy'  => [
            __('By agreeing to these Terms, you represent that you are at least the age of majority in your state or province of residence. You agree to use this website only for lawful purposes and in a manner that does not interfere with store operations, checkout security, customer account databases, or other visitors experience.', 'dawp'),
            __('You may not misuse the Site, attempt unauthorized system access, transmit destructive codes such as viruses or malware, or deploy automated scraping tools to harvest our data without permission.', 'dawp'),
        ],
    ],
    [
        'title' => __('3. Orders and Order Acceptance', 'dawp'),
        'copy'  => [
            __('An order confirmation email signifies that we have successfully received your purchase request. We reserve the absolute right to review, decline, cancel, or limit any order when necessary, including instances of suspected transaction fraud, incorrect product pricing, unavailable warehouse inventory, payment processing errors, shipping restrictions, or policy violations.', 'dawp'),
            __('If an order is canceled after successful billing, the full amount will be refunded immediately to your original payment method.', 'dawp'),
        ],
    ],
    [
        'title' => __('4. Pricing and Secure Payment Processing', 'dawp'),
        'copy'  => [
            __('Prices are displayed clearly on the website and are subject to change without notice. Applicable taxes, optional upgraded shipping costs when available, and exact checkout costs are displayed dynamically where required before your order completion.', 'dawp'),
            __('All financial transactions are executed over an encrypted, secure SSL connection. Payments are handled exclusively by certified third-party payment gateways complying strictly with the Payment Card Industry Data Security Standard (PCI-DSS).', 'dawp'),
            __('By submitting payment information, you represent that you are authorized to utilize the selected payment method.', 'dawp'),
        ],
    ],
    [
        'title' => __('5. Shipping, Tracking, and Logistics Parameters', 'dawp'),
        'copy'  => [
            __('Our order processing and delivery schedules are bound by strict timelines:', 'dawp'),
        ],
        'list'  => $shipping_parameters,
        'after' => [
            'text' => __('For full parameters, please review our comprehensive Shipping Policy.', 'dawp'),
            'url'  => $shipping_url,
            'link' => __('Shipping Policy', 'dawp'),
        ],
    ],
    [
        'title' => __('6. Returns, Refunds, and Consumer Rights', 'dawp'),
        'copy'  => [
            __('We provide a transparent and risk-free return window for our watches and watch accessories:', 'dawp'),
        ],
        'list'  => $return_terms,
        'after' => [
            'text' => __('For step-by-step instructions, please read our Refund & Return Policy.', 'dawp'),
            'url'  => $returns_url,
            'link' => __('Refund & Return Policy', 'dawp'),
        ],
    ],
    [
        'title' => __('7. Integrated Store Policies', 'dawp'),
        'copy'  => [
            __('Your transactions and data security are directly integrated with our core protections. Please review our specific guidelines via the active hyperlinks below:', 'dawp'),
            __('Data Management: Your submission of personal information through the store checkout is strictly governed by our Privacy Policy.', 'dawp'),
        ],
        'after' => [
            'text' => __('Review the full Privacy Policy for details about data collection, payment security, cookies, retention, and privacy requests.', 'dawp'),
            'url'  => $privacy_url,
            'link' => __('Privacy Policy', 'dawp'),
        ],
    ],
    [
        'title' => __('8. Intellectual Property & Liability Limitations', 'dawp'),
        'copy'  => [
            __('All website text, layout configurations, imagery, custom graphics, and brand logos are owned by or licensed to Reluxwatches and are protected by copyright laws.', 'dawp'),
            __('To the fullest extent permitted by applicable law, Reluxwatches shall not be liable for any indirect, incidental, special, consequential, or punitive damages arising out of website usage, delivery delays, or product consumption.', 'dawp'),
        ],
    ],
    [
        'title' => __('9. Governing Law', 'dawp'),
        'copy'  => [
            __('These Terms & Conditions and any separate agreements whereby we provide you services shall be governed by, and construed in accordance with, the laws of the State of California, United States.', 'dawp'),
        ],
    ],
];

$terms_faqs = [
    [
        'question' => __('What do these Terms cover?', 'dawp'),
        'answer'   => __('These Terms govern access to Reluxwatches, browsing the catalog, creating an account, contacting support, and purchasing products through Reluxwatches.com.', 'dawp'),
    ],
    [
        'question' => __('When is an order accepted?', 'dawp'),
        'answer'   => __('An order confirmation email means we received your purchase request. We may still review, decline, cancel, or limit an order when necessary for fraud, pricing, inventory, payment, shipping, or policy reasons.', 'dawp'),
    ],
    [
        'question' => __('Which policies are part of the customer agreement?', 'dawp'),
        'answer'   => __('Shipping, returns, refunds, and privacy terms are integrated into the customer agreement through the Shipping Policy, Return & Refund Policy, and Privacy Policy.', 'dawp'),
    ],
    [
        'question' => __('How can I contact support about the Terms?', 'dawp'),
        'answer'   => sprintf(
            /* translators: support email */
            __('Email %s or use the Contact Us page for questions, complaints, or clarification about these Terms & Conditions or an active order.', 'dawp'),
            $support_email
        ),
    ],
];
?>

<div class="bg-white text-[#111111]">
    <section class="bg-[#FAFAFA] py-14 sm:py-20" aria-labelledby="terms-title">
        <div class="mx-auto grid max-w-5xl gap-8 px-4 sm:px-6 lg:grid-cols-[1fr_auto] lg:items-end lg:px-8">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#405447]"><?php esc_html_e('Terms & Conditions', 'dawp'); ?></p>
                <h1 id="terms-title" class="mt-4 font-heading text-4xl font-extrabold leading-tight text-[#111111] sm:text-5xl">
                    <?php esc_html_e('Terms for using and shopping with Reluxwatches.', 'dawp'); ?>
                </h1>
                <p class="mt-5 max-w-2xl text-base leading-8 text-[#777777]">
                    <?php
                    echo esc_html(
                        sprintf(
                            /* translators: 1: store name, 2: site domain */
                            __('These Terms govern access to %1$s, browsing our catalog, creating an account, contacting support, and purchasing items through %2$s.', 'dawp'),
                            $store_name,
                            $site_domain
                        )
                    );
                    ?>
                </p>
            </div>

            <div class="rounded-md border border-[#E9E9E9] bg-white p-6 shadow-sm lg:min-w-64">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#405447]"><?php esc_html_e('Last Updated', 'dawp'); ?></p>
                <p class="mt-3 font-heading text-2xl font-extrabold text-[#111111]"><?php echo esc_html($last_updated); ?></p>
            </div>
        </div>
    </section>

    <section class="bg-[#FFFFFF] py-14 sm:py-20">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-5">
                <?php foreach ($sections as $section) : ?>
                    <article class="rounded-md border border-[#E9E9E9] bg-white p-6 shadow-sm">
                        <h2 class="font-heading text-xl font-extrabold text-[#111111]"><?php echo esc_html($section['title']); ?></h2>

                        <?php if (!empty($section['copy'])) : ?>
                            <div class="mt-4 space-y-4 text-sm leading-7 text-[#777777]">
                                <?php foreach ($section['copy'] as $paragraph) : ?>
                                    <p><?php echo esc_html($paragraph); ?></p>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($section['list'])) : ?>
                            <ul class="mt-5 grid gap-3 text-sm leading-7 text-[#777777]">
                                <?php foreach ($section['list'] as $item) : ?>
                                    <li class="flex gap-3">
                                        <span aria-hidden="true">&bull;</span>
                                        <span><?php echo esc_html($item); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <?php if (!empty($section['after'])) : ?>
                            <p class="mt-5 text-sm leading-7 text-[#777777]">
                                <?php echo esc_html($section['after']['text']); ?>
                                <a class="font-bold text-[#405447] underline decoration-[#405447]/40 underline-offset-4 transition hover:text-[#2F3F35]" href="<?php echo esc_url($section['after']['url']); ?>">
                                    <?php echo esc_html($section['after']['link']); ?>
                                </a>
                            </p>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>

                <article class="rounded-md border border-[#E9E9E9] bg-[#FAFAFA] p-6 shadow-sm">
                    <h2 class="font-heading text-xl font-extrabold text-[#111111]"><?php esc_html_e('10. Customer Support & Business Identity', 'dawp'); ?></h2>
                    <p class="mt-4 text-sm leading-7 text-[#777777]">
                        <?php esc_html_e('If you have questions, complaints, or require clarification regarding these Terms & Conditions or an active order, please contact our team via our verified corporate channels:', 'dawp'); ?>
                    </p>
                    <dl class="mt-5 grid gap-4 md:grid-cols-2">
                        <?php foreach ($contact_details as $detail) : ?>
                            <div class="rounded-md border border-[#E9E9E9] bg-white p-5">
                                <dt class="text-sm font-extrabold text-[#111111]"><?php echo esc_html($detail['label']); ?></dt>
                                <dd class="mt-3 text-sm leading-7 text-[#777777]">
                                    <?php if (!empty($detail['url'])) : ?>
                                        <a class="font-bold text-[#405447] underline decoration-[#405447]/40 underline-offset-4 transition hover:text-[#2F3F35]" href="<?php echo esc_url($detail['url']); ?>"><?php echo esc_html($detail['value']); ?></a>
                                    <?php else : ?>
                                        <?php echo esc_html($detail['value']); ?>
                                    <?php endif; ?>
                                </dd>
                            </div>
                        <?php endforeach; ?>
                    </dl>
                </article>

                <article class="rounded-md border border-[#E9E9E9] bg-white p-6 shadow-sm">
                    <h2 class="font-heading text-xl font-extrabold text-[#111111]"><?php esc_html_e('Terms FAQs', 'dawp'); ?></h2>
                    <div class="mt-6 divide-y divide-[#E9E9E9]">
                        <?php foreach ($terms_faqs as $item) : ?>
                            <details class="group py-5 first:pt-0 last:pb-0">
                                <summary class="flex cursor-pointer list-none items-start justify-between gap-4 text-left font-heading text-lg font-extrabold text-[#111111]">
                                    <span><?php echo esc_html($item['question']); ?></span>
                                    <span class="mt-1 flex h-7 w-7 shrink-0 items-center justify-center rounded-md bg-[#FAFAFA] text-[#405447] transition group-open:rotate-45" aria-hidden="true">+</span>
                                </summary>
                                <p class="mt-3 text-sm leading-7 text-[#777777]"><?php echo esc_html($item['answer']); ?></p>
                            </details>
                        <?php endforeach; ?>
                    </div>
                </article>
            </div>
        </div>
    </section>
</div>
