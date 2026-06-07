<?php
/**
 * Terms and conditions page for LBQ Shop.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$store_name     = 'LBQ Shop';
$site_domain    = 'lbqshop.com';
$support_email  = 'support@lbqshop.com';
$store_address  = function_exists('dawp_get_store_address') && !empty(dawp_get_store_address()) ? dawp_get_store_address() : __('4803 N Milwaukee Ave, Chicago, IL 60630', 'dawp');
$business_hours = __('Monday - Friday, 9:00 AM - 5:00 PM, GMT-08:00 Pacific Standard Time', 'dawp');
$last_updated   = __('May 29, 2026', 'dawp');
$shipping_url   = home_url('/shipping-policy/');
$returns_url    = home_url('/return-refund-policy/');
$privacy_url    = home_url('/privacy-policy/');
$contact_url    = home_url('/contact-us/');

$intro_paragraphs = [
    __('Welcome to LBQ Shop! These Terms & Conditions ("Terms") govern your access to and use of our website lbqshop.com (the "Site"), including browsing our product catalog, creating an account, interacting with our customer support, or purchasing items from our online store.', 'dawp'),
    __('The Site is operated by LBQ Shop. Throughout the Site, the terms "we", "us" and "our" refer to LBQ Shop. By accessing our Site or placing an order, you agree to be bound by these Terms and all operational policies referenced herein. If you do not agree to these terms, please discontinue using the website or placing orders.', 'dawp'),
];

$terms_highlights = [
    [
        'title' => __('Store Scope', 'dawp'),
        'copy'  => __('LBQ Shop focuses on beauty accessories, makeup bags, cosmetic organizers, fashion accents, everyday style essentials, and giftable accessories.', 'dawp'),
    ],
    [
        'title' => __('Secure Checkout', 'dawp'),
        'copy'  => __('Payments are handled through encrypted checkout and certified third-party payment gateways that follow PCI-DSS standards.', 'dawp'),
    ],
    [
        'title' => __('Linked Policies', 'dawp'),
        'copy'  => __('Shipping, returns, refunds, and privacy terms are published as part of the full customer agreement.', 'dawp'),
    ],
];

$shipping_parameters = [
    __('Shipping Locations: LBQ Shop currently ships exclusively within the United States domestic market.', 'dawp'),
    __('Shipping Fees: Standard U.S. shipping is free for all orders nationwide with no minimum purchase requirement. Any optional upgraded shipping cost, if available, is shown clearly at checkout before payment.', 'dawp'),
    __('Daily Order Cutoff Time: 5:00 PM (GMT-08:00) Pacific Standard Time. Orders placed after this time begin processing on the following business day.', 'dawp'),
    __('Handling Time: Current order handling and packaging time is 1-3 business days, Monday through Friday, excluding standard U.S. public holidays.', 'dawp'),
    __('Transit Time: Standard U.S. transit takes 5-7 business days, Monday to Friday. Estimated delivery is 6-10 business days total from the date of purchase.', 'dawp'),
    __('Carriers & Tracking: Orders are shipped using trusted domestic U.S. carriers such as USPS, UPS, FedEx, or DHL. Tracking details are emailed once an order is dispatched.', 'dawp'),
];

$return_terms = [
    __('Return Window: Customers may request returns or exchanges within 30 days of documented delivery. Returns are accepted for both defective and non-defective products.', 'dawp'),
    __('Product Condition: Eligible products must be entirely unused, in their original pristine condition, and returned with original packaging, tags, labels, accessories, and included parts intact.', 'dawp'),
    __('Fees & Shipping Costs: There is no restocking fee ($0.00). We cover full return shipping costs for defective, damaged, or incorrect products. Customers are responsible for actual return shipping fees for change-of-mind returns.', 'dawp'),
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
        'label' => __('Physical Business Address', 'dawp'),
        'value' => $store_address,
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

$sections = [
    [
        'title' => __('1. Online Store Scope & Content Accuracy', 'dawp'),
        'copy'  => [
            __('LBQ Shop is an e-commerce store focused on practical makeup bags, cosmetic organizers, beauty accessories, fashion accents, everyday style essentials, and giftable accessories.', 'dawp'),
            __('We work to present product descriptions, images, prices, materials, dimensions, and availability as accurately as reasonably possible. Small variations in color, texture, or physical appearance may occur due to individual screen monitor settings, digital photography lighting, or periodic supplier updates.', 'dawp'),
            __('LBQ Shop strictly adheres to ethical commerce: we do not sell counterfeit designer products, fake branded cosmetics, dietary supplements, medical skincare treatments, or products with unverified medical or beauty claims.', 'dawp'),
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
            __('We provide a transparent and risk-free return window for our beauty and fashion accessories:', 'dawp'),
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
            __('All website text, layout configurations, imagery, custom graphics, and brand logos are owned by or licensed to LBQ Shop and are protected by copyright laws.', 'dawp'),
            __('To the fullest extent permitted by applicable law, LBQ Shop shall not be liable for any indirect, incidental, special, consequential, or punitive damages arising out of website usage, delivery delays, or product consumption.', 'dawp'),
        ],
    ],
    [
        'title' => __('9. Governing Law', 'dawp'),
        'copy'  => [
            __('These Terms & Conditions and any separate agreements whereby we provide you services shall be governed by, and construed in accordance with, the laws of the State of California, United States.', 'dawp'),
        ],
    ],
];
?>

<div class="bg-white text-[#2F2A28]">
    <section class="bg-[#F8F2EE] py-14 sm:py-20" aria-labelledby="terms-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:items-end lg:px-8">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A96870]"><?php esc_html_e('Terms & Conditions', 'dawp'); ?></p>
                <h1 id="terms-title" class="mt-4 font-heading text-4xl font-extrabold leading-tight text-[#2F2A28] sm:text-5xl">
                    <?php esc_html_e('Terms for using and shopping with LBQ Shop.', 'dawp'); ?>
                </h1>
                <p class="mt-5 max-w-2xl text-base leading-8 text-[#6F625D]">
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

            <div class="rounded-md border border-[#E8DAD4] bg-white p-6 shadow-sm">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A96870]"><?php esc_html_e('Last Updated', 'dawp'); ?></p>
                <p class="mt-3 font-heading text-2xl font-extrabold text-[#2F2A28]"><?php echo esc_html($last_updated); ?></p>
                <div class="mt-5 grid gap-4 md:grid-cols-3 lg:grid-cols-1 xl:grid-cols-3">
                    <?php foreach ($terms_highlights as $highlight) : ?>
                        <article class="rounded-md border border-[#E8DAD4] bg-[#FFFDFC] p-4">
                            <h2 class="font-heading text-base font-extrabold text-[#2F2A28]"><?php echo esc_html($highlight['title']); ?></h2>
                            <p class="mt-3 text-sm leading-6 text-[#6F625D]"><?php echo esc_html($highlight['copy']); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#FFFDFC] py-14 sm:py-20" aria-labelledby="terms-content-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.78fr_1.22fr] lg:px-8">
            <aside class="lg:sticky lg:top-24 lg:self-start">
                <div class="rounded-md border border-[#E8DAD4] bg-white p-6 shadow-sm">
                    <h2 id="terms-content-title" class="font-heading text-2xl font-extrabold text-[#2F2A28]"><?php esc_html_e('Terms overview', 'dawp'); ?></h2>
                    <div class="mt-4 space-y-4 text-sm leading-7 text-[#6F625D]">
                        <?php foreach ($intro_paragraphs as $paragraph) : ?>
                            <p><?php echo esc_html($paragraph); ?></p>
                        <?php endforeach; ?>
                    </div>
                    <div class="mt-6 grid gap-3">
                        <a href="<?php echo esc_url($shipping_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#C87F86] px-5 text-sm font-bold text-white transition hover:bg-[#2F2A28]">
                            <?php esc_html_e('Shipping Policy', 'dawp'); ?>
                        </a>
                        <a href="<?php echo esc_url($returns_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#C87F86] bg-white px-5 text-sm font-bold text-[#8A4F56] transition hover:bg-[#FBEDEA]">
                            <?php esc_html_e('Return & Refund Policy', 'dawp'); ?>
                        </a>
                        <a href="<?php echo esc_url($privacy_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#C87F86] bg-white px-5 text-sm font-bold text-[#8A4F56] transition hover:bg-[#FBEDEA]">
                            <?php esc_html_e('Privacy Policy', 'dawp'); ?>
                        </a>
                    </div>
                </div>
            </aside>

            <div class="grid gap-5">
                <?php foreach ($sections as $section) : ?>
                    <article class="rounded-md border border-[#E8DAD4] bg-white p-6 shadow-sm">
                        <h2 class="font-heading text-xl font-extrabold text-[#2F2A28]"><?php echo esc_html($section['title']); ?></h2>

                        <?php if (!empty($section['copy'])) : ?>
                            <div class="mt-4 space-y-4 text-sm leading-7 text-[#6F625D]">
                                <?php foreach ($section['copy'] as $paragraph) : ?>
                                    <p><?php echo esc_html($paragraph); ?></p>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($section['list'])) : ?>
                            <ul class="mt-5 grid gap-3 text-sm leading-7 text-[#6F625D]">
                                <?php foreach ($section['list'] as $item) : ?>
                                    <li class="flex gap-3">
                                        <span aria-hidden="true">&bull;</span>
                                        <span><?php echo esc_html($item); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <?php if (!empty($section['after'])) : ?>
                            <p class="mt-5 text-sm leading-7 text-[#6F625D]">
                                <?php echo esc_html($section['after']['text']); ?>
                                <a class="font-bold text-[#8A4F56] underline decoration-[#C87F86]/40 underline-offset-4 transition hover:text-[#2F2A28]" href="<?php echo esc_url($section['after']['url']); ?>">
                                    <?php echo esc_html($section['after']['link']); ?>
                                </a>
                            </p>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>

                <article class="rounded-md border border-[#E8DAD4] bg-[#FFF8FB] p-6 shadow-sm">
                    <h2 class="font-heading text-xl font-extrabold text-[#2F2A28]"><?php esc_html_e('10. Customer Support & Business Identity', 'dawp'); ?></h2>
                    <p class="mt-4 text-sm leading-7 text-[#6F625D]">
                        <?php esc_html_e('If you have questions, complaints, or require clarification regarding these Terms & Conditions or an active order, please contact our team via our verified corporate channels:', 'dawp'); ?>
                    </p>
                    <dl class="mt-5 grid gap-4 md:grid-cols-2">
                        <?php foreach ($contact_details as $detail) : ?>
                            <div class="rounded-md border border-[#E8DAD4] bg-white p-5">
                                <dt class="text-sm font-extrabold text-[#2F2A28]"><?php echo esc_html($detail['label']); ?></dt>
                                <dd class="mt-3 text-sm leading-7 text-[#6F625D]">
                                    <?php if (!empty($detail['url'])) : ?>
                                        <a class="font-bold text-[#8A4F56] underline decoration-[#C87F86]/40 underline-offset-4 transition hover:text-[#2F2A28]" href="<?php echo esc_url($detail['url']); ?>"><?php echo esc_html($detail['value']); ?></a>
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
