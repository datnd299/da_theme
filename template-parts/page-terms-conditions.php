<?php
/**
 * Terms and conditions page for Brickgoshop.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$store_name     = function_exists('dawp_get_store_contact') ? dawp_get_store_contact('name') : 'Brickgoshop';
$site_domain    = function_exists('dawp_get_store_contact') ? dawp_get_store_contact('domain') : 'https://brickgoshop.com';
$support_email  = function_exists('dawp_get_store_contact') ? dawp_get_store_contact('email') : 'support@brickgoshop.com';
$support_phone  = function_exists('dawp_get_store_contact') ? dawp_get_store_contact('phone') : '';
$store_address  = function_exists('dawp_get_store_contact') ? dawp_get_store_contact('address') : '';
$business_hours = __('Monday - Friday, 9:00 AM - 5:00 PM, GMT-08:00 Pacific Standard Time', 'dawp');
$last_updated   = __('May 29, 2026', 'dawp');
$shipping_url   = home_url('/shipping-policy/');
$returns_url    = home_url('/return-refund-policy/');
$privacy_url    = home_url('/privacy-policy/');
$contact_url    = home_url('/contact-us/');

$shipping_parameters = [
    __('Shipping Locations: Brickgoshop currently ships exclusively within the United States domestic market (50 States).', 'dawp'),
    __('Shipping Fees: Standard U.S. shipping is free ($0.00) for all orders nationwide with no minimum purchase requirement. Any optional upgraded shipping cost, if available, is shown clearly at checkout before payment.', 'dawp'),
    __('Daily Order Cutoff Time: 5:00 PM (GMT-08:00) Pacific Standard Time (Monday to Friday). Orders placed after this time begin processing on the following business day.', 'dawp'),
    __('Handling Time: Order handling, processing, and packaging time is 1-3 business days (Monday to Friday, excluding U.S. federal holidays).', 'dawp'),
    __('Transit Time: Standard U.S. transit takes 5-7 business days (Monday to Friday). Estimated total delivery time is 6-10 business days from the date of purchase.', 'dawp'),
    __('Carriers & Tracking: Orders are shipped using trusted domestic U.S. carriers (such as USPS, UPS, FedEx, or DHL). Order tracking details are automatically emailed once an order is dispatched.', 'dawp'),
];

$return_terms = [
    __('Return Window: Customers may request a return within 30 days of documented product delivery.', 'dawp'),
    __('Product Condition: Eligible products must be unworn, unused, undamaged, in their original unaltered condition, and returned with original packaging, tags, labels, certificates, care cards, pouches, boxes, and included accessories intact.', 'dawp'),
    __('Restocking Fees: We charge $0.00 / No Restocking Fee.', 'dawp'),
    __('Defective/Damaged/Incorrect Items: Brickgoshop covers 100% of return shipping costs by providing a prepaid shipping label.', 'dawp'),
    __('Customer Remorse (e.g., changed mind, wrong item selected): The cost of the prepaid return shipping label will be deducted from the final refund amount.', 'dawp'),
    __('Refund Processing Time: Approved refunds are processed back to the original payment method within up to 7 business days after receiving and inspecting the returned item.', 'dawp'),
];

$contact_details = [
    [
        'label' => __('Store Name', 'dawp'),
        'value' => $store_name,
    ],
    [
        'label' => __('Customer Support Email', 'dawp'),
        'value' => $support_email,
        'url'   => 'mailto:' . $support_email,
    ],
    [
        'label' => __('Phone Number', 'dawp'),
        'value' => $support_phone,
        'url'   => 'tel:' . $support_phone,
    ],
    [
        'label' => __('Physical Business Address', 'dawp'),
        'value' => $store_address,
    ],
    [
        'label' => __('Support Hours', 'dawp'),
        'value' => $business_hours,
    ],
];

$sections = [
    [
        'title' => __('1. Online Store Scope & Content Accuracy', 'dawp'),
        'copy'  => [
            __('Brickgoshop is an e-commerce store focused on practical collectible toys, building sets, designer figures, art toys, blind boxes, mini figures, display pieces, and collector accessories.', 'dawp'),
            __('We strive to present product descriptions, images, prices, materials, dimensions, and availability as accurately as reasonably possible. Small variations in color, texture, or physical appearance may occur due to individual screen monitor settings, digital photography lighting, or periodic supplier updates.', 'dawp'),
            __('Ethical Commerce Commitment: Brickgoshop strictly adheres to ethical commerce standards. We do not sell counterfeit goods, replica logos, unauthorized branded items, dietary supplements, medical devices, regulated products, or items with unverified health claims.', 'dawp'),
        ],
    ],
    [
        'title' => __('2. Website Use & Eligibility', 'dawp'),
        'copy'  => [
            __('By agreeing to these Terms, you represent that you are at least the age of majority in your state or province of residence. You agree to use this website only for lawful purposes and in a manner that does not interfere with store operations, checkout security, customer account databases, or other visitors\' experiences.', 'dawp'),
            __('You may not misuse the Site, attempt unauthorized system access, transmit destructive codes such as viruses or malware, or deploy automated scraping tools to harvest our data without prior written permission.', 'dawp'),
        ],
    ],
    [
        'title' => __('3. Orders and Order Acceptance', 'dawp'),
        'copy'  => [
            __('An order confirmation email signifies that we have successfully received your purchase request. We reserve the absolute right to review, decline, cancel, or limit any order when necessary, including instances of suspected transaction fraud or security flags, incorrect product pricing or typographical errors, unavailable warehouse inventory, payment processing errors or authorization failures, shipping restrictions, or policy violations.', 'dawp'),
            __('If an order is canceled after successful billing, the full amount will be refunded immediately to your original payment method.', 'dawp'),
        ],
    ],
    [
        'title' => __('4. Pricing and Secure Payment Processing', 'dawp'),
        'copy'  => [
            __('Pricing: All prices are displayed clearly in U.S. Dollars ($ USD) on the website and are subject to change without notice. Applicable taxes, optional upgraded shipping costs (when available), and exact checkout totals are displayed dynamically before order completion.', 'dawp'),
            __('Payment Security: All financial transactions are executed over an encrypted, secure SSL (Secure Sockets Layer) connection. Payments are handled exclusively by certified third-party payment gateways complying strictly with the Payment Card Industry Data Security Standard (PCI-DSS).', 'dawp'),
            __('Authorization: By submitting payment information, you represent that you are authorized to utilize the selected payment method.', 'dawp'),
        ],
    ],
    [
        'title' => __('5. Shipping, Tracking, and Logistics Parameters', 'dawp'),
        'copy'  => [
            __('Our order processing and delivery schedules are bound by strict operational timelines:', 'dawp'),
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
            __('We provide a transparent and risk-free return window for our collectible products:', 'dawp'),
        ],
        'list'  => $return_terms,
        'after' => [
            'text' => __('For step-by-step return instructions, please read our Refund & Return Policy.', 'dawp'),
            'url'  => $returns_url,
            'link' => __('Refund & Return Policy', 'dawp'),
        ],
    ],
    [
        'title' => __('7. Integrated Store Policies', 'dawp'),
        'copy'  => [
            __('Your transactions, privacy rights, and data security are directly governed by our integrated policies. Please review our specific guidelines via the active links below:', 'dawp'),
            __('Privacy Policy: Governs how we handle data collection, payment security, cookies, retention, and CCPA consumer rights.', 'dawp'),
            __('Shipping Policy: Details timelines, carrier methods, and delivery logistics.', 'dawp'),
            __('Refund Policy: Outlines step-by-step instructions for returns and exchanges.', 'dawp'),
        ],
        'after' => [
            'text' => __('Read our full Privacy Policy.', 'dawp'),
            'url'  => $privacy_url,
            'link' => __('Privacy Policy', 'dawp'),
        ],
    ],
    [
        'title' => __('8. Intellectual Property & Liability Limitations', 'dawp'),
        'copy'  => [
            __('All website text, layout configurations, imagery, custom graphics, and brand logos are owned by or licensed to Brickgoshop and are protected by applicable intellectual property and copyright laws.', 'dawp'),
            __('To the fullest extent permitted by applicable law, Brickgoshop shall not be liable for any indirect, incidental, special, consequential, or punitive damages arising out of website usage, delivery delays, or product handling.', 'dawp'),
        ],
    ],
    [
        'title' => __('9. Governing Law', 'dawp'),
        'copy'  => [
            __('These Terms & Conditions and any separate agreements whereby we provide you services shall be governed by, and construed in accordance with, the laws of the State of California, United States, without regard to its conflict of law principles.', 'dawp'),
        ],
    ],
];
?>

<div class="bgs-policy bg-white text-[#2B2B2B]">
    <section class="bgs-policy__hero bg-[#F8F5F0] py-14 sm:py-20" aria-labelledby="terms-title">
        <div class="bgs-policy__shell mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:items-end lg:px-8">
            <div>
                <p class="bgs-policy-kicker text-sm font-extrabold uppercase tracking-[0.14em] text-[#A45A3F]"><?php esc_html_e('Terms & Conditions', 'dawp'); ?></p>
                <h1 id="terms-title" class="mt-4 font-heading text-4xl font-extrabold leading-tight text-[#2B2B2B] sm:text-5xl">
                    <?php esc_html_e('Terms for using and shopping with Brickgoshop.', 'dawp'); ?>
                </h1>
                <p class="mt-5 max-w-2xl text-base leading-8 text-[#4A4A4A]">
                    <?php
                    echo esc_html(
                        sprintf(
                            /* translators: 1: store name, 2: site domain */
                            __('Welcome to %1$s. These Terms and Conditions ("Terms") govern your use of our website, services, and the purchase of any products from our online store. By accessing or using %2$s, you agree to be bound by these Terms and all integrated store policies.', 'dawp'),
                            $store_name,
                            $site_domain
                        )
                    );
                    ?>
                </p>
            </div>

            <div class="bgs-policy-meta rounded-md border border-[#E8E5DF] bg-white p-6 shadow-sm">
                <p class="bgs-policy-kicker text-sm font-extrabold uppercase tracking-[0.14em] text-[#A45A3F]"><?php esc_html_e('Last Updated', 'dawp'); ?></p>
                <p class="mt-3 font-heading text-2xl font-extrabold text-[#2B2B2B]"><?php echo esc_html($last_updated); ?></p>
            </div>
        </div>
    </section>

    <section class="bgs-policy__content bg-[#FFFFFF] py-12 sm:py-16" aria-labelledby="terms-content-title">
        <div class="bgs-policy__shell mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <h2 id="terms-content-title" class="sr-only"><?php esc_html_e('Terms Details', 'dawp'); ?></h2>
            <div class="grid gap-4">
                <?php foreach ($sections as $section) : ?>
                    <article class="rounded-md border border-[#E8E5DF] bg-white p-5 shadow-sm sm:p-6">
                        <h2 class="font-heading text-xl font-extrabold text-[#2B2B2B]"><?php echo esc_html($section['title']); ?></h2>

                        <?php if (!empty($section['copy'])) : ?>
                            <div class="mt-4 space-y-4 text-sm leading-7 text-[#4A4A4A]">
                                <?php foreach ($section['copy'] as $paragraph) : ?>
                                    <p><?php echo esc_html($paragraph); ?></p>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($section['list'])) : ?>
                            <ul class="mt-5 grid gap-3 text-sm leading-7 text-[#4A4A4A]">
                                <?php foreach ($section['list'] as $item) : ?>
                                    <li class="flex gap-3">
                                        <span aria-hidden="true">&bull;</span>
                                        <span><?php echo esc_html($item); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <?php if (!empty($section['after'])) : ?>
                            <p class="mt-5 text-sm leading-7 text-[#4A4A4A]">
                                <?php echo esc_html($section['after']['text']); ?>
                                <a class="font-bold text-[#A45A3F] underline decoration-[#A45A3F]/40 underline-offset-4 transition hover:text-[#7F422F]" href="<?php echo esc_url($section['after']['url']); ?>">
                                    <?php echo esc_html($section['after']['link']); ?>
                                </a>
                            </p>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>

                <article class="rounded-md border border-[#E8E5DF] bg-[#F8F5F0] p-5 shadow-sm sm:p-6">
                    <h2 class="font-heading text-xl font-extrabold text-[#2B2B2B]"><?php esc_html_e('10. Customer Support & Business Identity', 'dawp'); ?></h2>
                    <p class="mt-4 text-sm leading-7 text-[#4A4A4A]">
                        <?php esc_html_e('If you have questions, complaints, or require clarification regarding these Terms & Conditions or an active order, please contact our support team through our verified corporate channels:', 'dawp'); ?>
                    </p>
                    <dl class="mt-5 grid gap-4 md:grid-cols-2">
                        <?php foreach ($contact_details as $detail) : ?>
                            <div class="rounded-md border border-[#E8E5DF] bg-white p-5">
                                <dt class="text-sm font-extrabold text-[#2B2B2B]"><?php echo esc_html($detail['label']); ?></dt>
                                <dd class="mt-3 text-sm leading-7 text-[#4A4A4A]">
                                    <?php if (!empty($detail['url'])) : ?>
                                        <a class="font-bold text-[#A45A3F] underline decoration-[#A45A3F]/40 underline-offset-4 transition hover:text-[#7F422F]" href="<?php echo esc_url($detail['url']); ?>"><?php echo esc_html($detail['value']); ?></a>
                                    <?php else : ?>
                                        <?php echo esc_html($detail['value']); ?>
                                    <?php endif; ?>
                                </dd>
                            </div>
                        <?php endforeach; ?>
                    </dl>
                </article>
            </div>
        </div>
    </section>
</div>
