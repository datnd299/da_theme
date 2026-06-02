<?php
/**
 * Template Part: page-terms-conditions
 *
 * @package dawp
 */

$store_name        = 'House of Shoes Online';
$support_email     = 'support@houseofshoesonline.com';
$address           = dawp_get_store_address();
$contact_url       = 'https://houseofshoesonline.com/contact-us/';
$shipping_url      = 'https://houseofshoesonline.com/shipping-policy/';
$return_refund_url = 'https://houseofshoesonline.com/return-refund-policy/';
$shop_url          = 'https://houseofshoesonline.com/shop/';
?>

<main id="primary" class="bg-[#F6F5F7] font-body text-[#141217]">
    <section class="relative overflow-hidden bg-[#FFF7FB] text-[#141217]">
        <div class="absolute left-0 top-0 h-1 w-full bg-[linear-gradient(90deg,#E6007E,#FF4FB8,#7C3AED)]"></div>
        <div class="absolute inset-y-0 right-0 hidden w-[38%] bg-[linear-gradient(135deg,#F3E8FF_0%,#F4DDE8_100%)] lg:block"></div>

        <div class="relative mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[1fr_0.9fr] lg:items-center lg:px-8 lg:py-24">
            <div class="max-w-4xl">
                <p class="mb-5 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]">
                    <?php esc_html_e('Store Terms', 'dawp'); ?>
                </p>
                <h1 class="font-heading text-5xl font-black leading-[0.94] text-[#141217] sm:text-6xl lg:text-7xl">
                    <?php esc_html_e('Terms & Conditions', 'dawp'); ?>
                </h1>
                <p class="mt-6 max-w-3xl text-lg leading-8 text-[#5E5363]">
                    <?php esc_html_e('These Terms govern website access, footwear purchases, account use, payments, store policies, and support interactions with House of Shoes Online.', 'dawp'); ?>
                </p>
                <p class="mt-5 text-sm font-black uppercase tracking-[0.18em] text-[#7C3AED]">
                    <?php esc_html_e('Last updated: 20 May, 2026', 'dawp'); ?>
                </p>
                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#E6007E] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#7C3AED]">
                        <?php esc_html_e('Shop Shoes', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#E6007E] bg-white px-7 text-sm font-black uppercase tracking-wide text-[#E6007E] transition hover:bg-[#F3E8FF]">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                <?php
                $terms_cards = [
                    ['number' => '01', 'title' => __('Lawful Use', 'dawp'), 'copy' => __('Use the Site only for lawful shopping purposes and account activity.', 'dawp')],
                    ['number' => '02', 'title' => __('Order Review', 'dawp'), 'copy' => __('Orders may be verified for availability, payment authorization, and fraud screening.', 'dawp')],
                    ['number' => '03', 'title' => __('Policy Links', 'dawp'), 'copy' => __('Shipping, returns, refunds, and support policies are part of the store experience.', 'dawp')],
                    ['number' => '04', 'title' => __('Support', 'dawp'), 'copy' => __('Questions about these Terms should be sent through official support channels.', 'dawp')],
                ];

                foreach ($terms_cards as $card) :
                    ?>
                    <div class="rounded-[1.5rem] border border-[#EEE5EF] bg-white p-6 shadow-sm shadow-[#141217]/5">
                        <span class="flex h-12 w-12 items-center justify-center rounded-full bg-[#F3E8FF] text-sm font-black text-[#7C3AED]"><?php echo esc_html($card['number']); ?></span>
                        <h2 class="mt-5 font-heading text-2xl font-black leading-tight text-[#141217]"><?php echo esc_html($card['title']); ?></h2>
                        <p class="mt-3 text-sm leading-6 text-[#6F625D]"><?php echo esc_html($card['copy']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 sm:px-6 lg:grid-cols-[0.82fr_1.18fr] lg:px-8">
            <aside class="hidden lg:sticky lg:top-32 lg:block lg:self-start">
                <div class="rounded-[2rem] bg-[#141217] p-7 text-white shadow-xl shadow-[#141217]/10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#FF4FB8]">
                        <?php esc_html_e('Terms Overview', 'dawp'); ?>
                    </p>
                    <h2 class="font-heading text-4xl font-black leading-tight">
                        <?php esc_html_e('Rules for shopping with us.', 'dawp'); ?>
                    </h2>
                    <p class="mt-5 text-sm leading-7 text-white/78">
                        <?php esc_html_e('Review the terms for using the Site, placing footwear orders, making payments, and contacting customer support.', 'dawp'); ?>
                    </p>
                    <nav class="mt-7 grid gap-3 text-sm font-black uppercase tracking-wide text-white/78" aria-label="<?php esc_attr_e('Terms navigation', 'dawp'); ?>">
                        <a href="#introduction" class="rounded-2xl border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-white"><?php esc_html_e('Introduction', 'dawp'); ?></a>
                        <a href="#website-use" class="rounded-2xl border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-white"><?php esc_html_e('Website Use', 'dawp'); ?></a>
                        <a href="#orders-payments" class="rounded-2xl border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-white"><?php esc_html_e('Orders & Payments', 'dawp'); ?></a>
                        <a href="#product-information" class="rounded-2xl border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-white"><?php esc_html_e('Product Information', 'dawp'); ?></a>
                        <a href="#store-policies" class="rounded-2xl border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-white"><?php esc_html_e('Store Policies', 'dawp'); ?></a>
                        <a href="#intellectual-property" class="rounded-2xl border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-white"><?php esc_html_e('Intellectual Property', 'dawp'); ?></a>
                        <a href="#liability" class="rounded-2xl border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-white"><?php esc_html_e('Liability', 'dawp'); ?></a>
                        <a href="#governing-law" class="rounded-2xl border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-white"><?php esc_html_e('Governing Law', 'dawp'); ?></a>
                        <a href="#contact" class="rounded-2xl border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-white"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
                    </nav>
                </div>
            </aside>

            <div class="min-w-0 space-y-8">
                <section id="introduction" class="rounded-[2rem] border border-[#EEE5EF] bg-white p-7 shadow-sm shadow-[#141217]/5 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]"><?php esc_html_e('Introduction', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]"><?php esc_html_e('Agreement To These Terms', 'dawp'); ?></h2>
                    <div class="mt-6 space-y-5 text-base leading-8 text-[#6F625D]">
                        <p><?php esc_html_e('Welcome to House of Shoes Online. These Terms & Conditions ("Terms") govern your access to and use of houseofshoesonline.com (the "Site"), including browsing products, creating an account, interacting with our support, or purchasing footwear from our online store.', 'dawp'); ?></p>
                        <p><?php esc_html_e('By accessing our Site or placing an order, you agree to be bound by these Terms and any policies referenced herein. If you do not agree with these terms, please do not use our website or place an order.', 'dawp'); ?></p>
                    </div>
                </section>

                <section id="website-use" class="rounded-[2rem] border border-[#EEE5EF] bg-[#F6F5F7] p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]"><?php esc_html_e('Website Use & Eligibility', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]"><?php esc_html_e('Lawful Shopping Purposes Only', 'dawp'); ?></h2>
                    <p class="mt-6 text-base leading-8 text-[#6F625D]"><?php esc_html_e('You agree to use this Site strictly for lawful shopping purposes. You must be at least the age of majority in your jurisdiction to purchase products independently. You are strictly prohibited from:', 'dawp'); ?></p>
                    <ul class="mt-7 space-y-4 text-base leading-7 text-[#6F625D]">
                        <li class="flex gap-4"><span class="mt-3 h-1.5 w-1.5 shrink-0 rounded-full bg-[#E6007E]"></span><?php esc_html_e('Engaging in fraudulent purchases, unauthorized payment card use, or chargeback abuse.', 'dawp'); ?></li>
                        <li class="flex gap-4"><span class="mt-3 h-1.5 w-1.5 shrink-0 rounded-full bg-[#E6007E]"></span><?php esc_html_e('Attempting unauthorized access to restricted areas, customer accounts, or website backend systems.', 'dawp'); ?></li>
                        <li class="flex gap-4"><span class="mt-3 h-1.5 w-1.5 shrink-0 rounded-full bg-[#E6007E]"></span><?php esc_html_e('Using automated tools to scrape website content, images, or product data without written permission.', 'dawp'); ?></li>
                        <li class="flex gap-4"><span class="mt-3 h-1.5 w-1.5 shrink-0 rounded-full bg-[#E6007E]"></span><?php esc_html_e('Interfering with website security, payment processing, or overall functionality.', 'dawp'); ?></li>
                    </ul>
                </section>

                <section id="orders-payments" class="rounded-[2rem] border border-[#EEE5EF] bg-white p-7 shadow-sm shadow-[#141217]/5 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]"><?php esc_html_e('Orders, Accuracy, And Payments', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]"><?php esc_html_e('Order Verification And Customer Details', 'dawp'); ?></h2>
                    <div class="mt-7 grid gap-4">
                        <?php
                        $order_items = [
                            ['title' => __('Order Verification', 'dawp'), 'copy' => __('All orders are subject to product availability, payment authorization, and fraud screening. We reserve the right to cancel or refuse any order due to suspected fraud, pricing errors, inventory issues, or inaccurate customer details. If an order is canceled after payment, a full refund will be issued.', 'dawp')],
                            ['title' => __('Customer Responsibility', 'dawp'), 'copy' => __('You are responsible for providing accurate billing, shipping, sizing, and contact information. Incorrect details may result in delivery delays or cancellation.', 'dawp')],
                            ['title' => __('Pricing Transparency', 'dawp'), 'copy' => __('Prices, promotions, and shipping options may change without notice. The final order total, including taxes and fees (if applicable), will be clearly displayed at checkout before your payment is processed. There are no hidden fees.', 'dawp')],
                        ];

                        foreach ($order_items as $item) :
                            ?>
                            <div class="rounded-[1.25rem] border border-[#EEE5EF] bg-[#F6F5F7] p-5">
                                <h3 class="font-black text-[#141217]"><?php echo esc_html($item['title']); ?></h3>
                                <p class="mt-3 text-sm leading-7 text-[#6F625D]"><?php echo esc_html($item['copy']); ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>

                <section id="product-information" class="rounded-[2rem] border border-[#EEE5EF] bg-[#FFF7FB] p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#7C3AED]"><?php esc_html_e('Product Information & Footwear Sizing', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]"><?php esc_html_e('Accuracy, Display, And Fit Notes', 'dawp'); ?></h2>
                    <div class="mt-7 grid gap-4 sm:grid-cols-2">
                        <div class="rounded-[1.25rem] border border-[#EEE5EF] bg-white p-5 shadow-sm shadow-[#141217]/5">
                            <h3 class="font-black text-[#141217]"><?php esc_html_e('Display Accuracy', 'dawp'); ?></h3>
                            <p class="mt-3 text-sm leading-7 text-[#6F625D]"><?php esc_html_e('We aim to display footwear names, images, descriptions, pricing, sizing, materials, and care notes as accurately as possible. Slight variations in color or texture may occur due to photography lighting or monitor screen settings.', 'dawp'); ?></p>
                        </div>
                        <div class="rounded-[1.25rem] border border-[#EEE5EF] bg-white p-5 shadow-sm shadow-[#141217]/5">
                            <h3 class="font-black text-[#141217]"><?php esc_html_e('No Medical Claims', 'dawp'); ?></h3>
                            <p class="mt-3 text-sm leading-7 text-[#6F625D]"><?php esc_html_e('Comfort-focused language used on our website describes everyday wear and general product feel. We do not make medical claims or guarantee pain relief, orthopedic treatment, or specific health outcomes.', 'dawp'); ?></p>
                        </div>
                    </div>
                </section>

                <section id="store-policies" class="rounded-[2rem] border border-[#EEE5EF] bg-[#F6F5F7] p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]"><?php esc_html_e('Shipping, Returns, And Store Policies', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]"><?php esc_html_e('Integrated Store Guidelines', 'dawp'); ?></h2>
                    <div class="mt-6 space-y-5 text-base leading-8 text-[#6F625D]">
                        <p><?php esc_html_e('Your purchases are directly integrated with our standard store operations. Please review our specific guidelines via the active links below.', 'dawp'); ?></p>
                        <p><?php esc_html_e('Order Cutoff & Delivery: Orders placed after our 5:00 PM (GMT-08:00) Pacific Standard Time cutoff will begin processing the following business day. Estimated total delivery is 6-10 business days, excluding standard U.S. public holidays.', 'dawp'); ?></p>
                        <p><?php esc_html_e('Return Policy: Eligible footwear returns must be requested within 30 days of delivery. Items must be unworn, unused, undamaged, clean, in original condition, and returned with original packaging.', 'dawp'); ?></p>
                    </div>
                    <div class="mt-7 flex flex-wrap gap-4">
                        <a href="<?php echo esc_url($shipping_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#2A1538] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#E6007E]">
                            <?php esc_html_e('View Shipping Policy', 'dawp'); ?>
                        </a>
                        <a href="<?php echo esc_url($return_refund_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#141217] bg-white px-7 text-sm font-black uppercase tracking-wide text-[#141217] transition hover:bg-[#141217] hover:text-white">
                            <?php esc_html_e('View Return & Refund Policy', 'dawp'); ?>
                        </a>
                    </div>
                </section>

                <section id="intellectual-property" class="rounded-[2rem] border border-[#EEE5EF] bg-white p-7 shadow-sm shadow-[#141217]/5 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]"><?php esc_html_e('Intellectual Property Rights', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]"><?php esc_html_e('Website Content And Brand Assets', 'dawp'); ?></h2>
                    <p class="mt-6 text-base leading-8 text-[#6F625D]"><?php esc_html_e('All website content, branding, page layouts, graphics, text, images, logos, and design elements are owned by or licensed to House of Shoes Online. You may not copy, reproduce, distribute, or commercially exploit any content without our express written consent. We strictly prohibit and do not sell counterfeit goods, replica products, or unauthorized trademarked logos.', 'dawp'); ?></p>
                </section>

                <section id="liability" class="rounded-[2rem] border border-[#EEE5EF] bg-[#FFF7FB] p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#7C3AED]"><?php esc_html_e('Limitations Of Liability', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]"><?php esc_html_e('Website Availability And Store Limitations', 'dawp'); ?></h2>
                    <p class="mt-6 text-base leading-8 text-[#6F625D]"><?php esc_html_e('We work to keep our website accurate, secure, and continuously available, but we do not guarantee uninterrupted or error-free access. To the fullest extent permitted by law, House of Shoes Online is not liable for indirect, incidental, or consequential damages arising from website usage, shipping carrier delays, fit preferences, or product misuse.', 'dawp'); ?></p>
                </section>

                <section id="governing-law" class="rounded-[2rem] border border-[#EEE5EF] bg-white p-7 shadow-sm shadow-[#141217]/5 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]"><?php esc_html_e('Governing Law', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]"><?php esc_html_e('United States Legal Framework', 'dawp'); ?></h2>
                    <p class="mt-6 text-base leading-8 text-[#6F625D]"><?php esc_html_e('These Terms & Conditions and any separate agreements whereby we provide you services shall be governed by, and construed in accordance with, the laws of the United States, where applicable to House of Shoes Online and its customers.', 'dawp'); ?></p>
                </section>

                <section id="contact" class="relative min-w-0 overflow-hidden rounded-[2rem] bg-[linear-gradient(135deg,#141217_0%,#2A1538_100%)] p-7 text-white shadow-xl shadow-[#141217]/10 lg:p-10">
                    <div class="absolute left-0 top-0 h-1 w-full bg-[linear-gradient(90deg,#E6007E,#FF4FB8,#7C3AED)]"></div>
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#FF4FB8]"><?php esc_html_e('Contact Us', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-white"><?php esc_html_e('Questions about these Terms go through support.', 'dawp'); ?></h2>
                    <p class="mt-5 max-w-2xl text-base leading-8 text-white/78"><?php esc_html_e('For questions regarding these Terms & Conditions, order cancellations, or policy clarifications, please contact House of Shoes Online directly.', 'dawp'); ?></p>

                    <div class="mt-8 grid min-w-0 gap-4 sm:grid-cols-2">
                        <div class="min-w-0 rounded-[1.25rem] border border-white/15 bg-white/8 p-5">
                            <h3 class="text-sm font-black uppercase tracking-[0.16em] text-[#FF4FB8]"><?php esc_html_e('Brand Name', 'dawp'); ?></h3>
                            <p class="mt-3 text-base leading-7 text-white"><?php echo esc_html($store_name); ?></p>
                        </div>
                        <div class="min-w-0 rounded-[1.25rem] border border-white/15 bg-white/8 p-5">
                            <h3 class="text-sm font-black uppercase tracking-[0.16em] text-[#FF4FB8]"><?php esc_html_e('Customer Support Email', 'dawp'); ?></h3>
                            <p class="mt-3 break-all text-base leading-7 text-white"><?php echo esc_html($support_email); ?></p>
                        </div>
                        <?php if ($address !== '') : ?>
                            <div class="min-w-0 rounded-[1.25rem] border border-white/15 bg-white/8 p-5">
                                <h3 class="text-sm font-black uppercase tracking-[0.16em] text-[#FF4FB8]"><?php esc_html_e('Physical Business Address', 'dawp'); ?></h3>
                                <p class="mt-3 text-base leading-7 text-white"><?php echo esc_html($address); ?></p>
                            </div>
                        <?php endif; ?>
                        <div class="min-w-0 rounded-[1.25rem] border border-white/15 bg-white/8 p-5">
                            <h3 class="text-sm font-black uppercase tracking-[0.16em] text-[#FF4FB8]"><?php esc_html_e('Contact Page', 'dawp'); ?></h3>
                            <a href="<?php echo esc_url($contact_url); ?>" class="mt-3 inline-flex max-w-full text-base font-black leading-7 text-white underline decoration-[#FF4FB8] decoration-2 underline-offset-4 transition hover:text-[#FF4FB8]">
                                <?php esc_html_e('Contact Us page', 'dawp'); ?>
                            </a>
                        </div>
                    </div>

                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#E6007E] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#FF4FB8]"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
                        <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 max-w-full items-center justify-center rounded-full border border-white/25 px-7 text-center text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-[#141217] max-[420px]:break-all"><?php echo esc_html($support_email); ?></a>
                    </div>
                </section>
            </div>
        </div>
    </section>
</main>
