<?php
/**
 * Template Name: Terms & Conditions
 * Template Part: page-terms-conditions
 *
 * @package dawp
 */

$support_email        = 'support@houseofshoesonline.com';
$contact_url          = home_url('/contact-us/');
$shipping_policy_url  = home_url('/shipping-policy/');
$return_refund_url    = home_url('/return-refund-policy/');
$privacy_url          = home_url('/privacy-policy/');
$shop_url             = home_url('/shop/');
?>

<main id="primary" class="bg-white text-[#141217]">
    <section class="relative overflow-hidden bg-[#FFF7FB] text-[#141217]">
        <div class="absolute left-0 top-0 h-1 w-full bg-[linear-gradient(90deg,#E6007E,#FF4FB8,#7C3AED)]"></div>
        <div class="absolute inset-y-0 right-0 hidden w-[46%] bg-[linear-gradient(135deg,#F3E8FF_0%,#F4DDE8_100%)] lg:block"></div>

        <div class="relative mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[0.92fr_1.08fr] lg:items-center lg:px-8 lg:py-24">
            <div class="max-w-3xl">
                <p class="mb-5 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]">
                    <?php esc_html_e('Store Terms', 'dawp'); ?>
                </p>
                <h1 class="font-heading text-5xl font-black leading-[0.94] text-[#141217] sm:text-6xl lg:text-7xl">
                    <?php esc_html_e('Terms & Conditions', 'dawp'); ?>
                </h1>
                <p class="mt-6 max-w-2xl text-lg leading-8 text-[#5E5363]">
                    <?php esc_html_e('Please review the terms that apply when browsing House of Shoes Online, placing footwear orders, using our website, or contacting customer support.', 'dawp'); ?>
                </p>
                <p class="mt-5 text-sm font-black uppercase tracking-[0.18em] text-[#7C3AED]">
                    <?php esc_html_e('Last updated: May 22, 2026', 'dawp'); ?>
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

            <div class="-mx-4 flex snap-x snap-mandatory gap-4 overflow-x-auto px-4 pb-4 sm:mx-0 sm:grid sm:grid-cols-2 sm:overflow-visible sm:px-0 sm:pb-0">
                <?php
                $term_cards = [
                    ['number' => '01', 'title' => __('Website Use', 'dawp'), 'copy' => __('Use our footwear store lawfully and responsibly when browsing or shopping.', 'dawp')],
                    ['number' => '02', 'title' => __('Orders', 'dawp'), 'copy' => __('Orders are subject to availability, verification, payment approval, and accurate customer details.', 'dawp')],
                    ['number' => '03', 'title' => __('Fit Details', 'dawp'), 'copy' => __('Review product descriptions, size notes, fit guidance, and return conditions before checkout.', 'dawp')],
                    ['number' => '04', 'title' => __('Store Policies', 'dawp'), 'copy' => __('Shipping, returns, privacy, and support policies are part of these terms.', 'dawp')],
                ];
                foreach ($term_cards as $card) :
                ?>
                    <div class="min-w-[82%] snap-start rounded-[1.5rem] border border-[#EEE5EF] bg-white p-6 shadow-sm sm:min-w-0">
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
                        <?php esc_html_e('Clear rules for shopping.', 'dawp'); ?>
                    </h2>
                    <p class="mt-5 text-sm leading-7 text-white/78">
                        <?php esc_html_e('These terms explain how customers may use our website, place orders, and interact with House of Shoes Online services.', 'dawp'); ?>
                    </p>
                    <nav class="mt-7 grid gap-3 text-sm font-black uppercase tracking-wide text-white/78" aria-label="<?php esc_attr_e('Terms navigation', 'dawp'); ?>">
                        <a href="#acceptance" class="rounded-2xl border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-white"><?php esc_html_e('Acceptance Of Terms', 'dawp'); ?></a>
                        <a href="#website-use" class="rounded-2xl border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-white"><?php esc_html_e('Website Use', 'dawp'); ?></a>
                        <a href="#orders" class="rounded-2xl border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-white"><?php esc_html_e('Orders And Payments', 'dawp'); ?></a>
                        <a href="#products" class="rounded-2xl border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-white"><?php esc_html_e('Product Information', 'dawp'); ?></a>
                        <a href="#shipping-returns" class="rounded-2xl border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-white"><?php esc_html_e('Shipping And Returns', 'dawp'); ?></a>
                        <a href="#intellectual-property" class="rounded-2xl border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-white"><?php esc_html_e('Intellectual Property', 'dawp'); ?></a>
                        <a href="#limitations" class="rounded-2xl border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-white"><?php esc_html_e('Limitations', 'dawp'); ?></a>
                        <a href="#contact" class="rounded-2xl border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-white"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
                    </nav>
                </div>
            </aside>

            <div class="space-y-8">
                <section id="acceptance" class="rounded-[2rem] border border-[#EEE5EF] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]"><?php esc_html_e('Acceptance Of Terms', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]"><?php esc_html_e('Using Our Store Means You Accept These Terms', 'dawp'); ?></h2>
                    <div class="mt-6 space-y-5 text-base leading-8 text-[#6F625D]">
                        <p><?php esc_html_e('By accessing our website, browsing products, creating an account, placing an order, or using any House of Shoes Online service, you agree to be bound by these Terms & Conditions and any policies referenced on this website.', 'dawp'); ?></p>
                        <p><?php esc_html_e('If you do not agree with these terms, please do not use our website or place an order through our store.', 'dawp'); ?></p>
                    </div>
                </section>

                <section id="website-use" class="rounded-[2rem] border border-[#EEE5EF] bg-[#F6F5F7] p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]"><?php esc_html_e('Website Use', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]"><?php esc_html_e('Responsible Use Of Our Website', 'dawp'); ?></h2>
                    <div class="mt-6 space-y-5 text-base leading-8 text-[#6F625D]">
                        <p><?php esc_html_e('You agree to use this website only for lawful purposes and in a way that does not damage, disable, interfere with, or disrupt the website, checkout system, customer accounts, or other users.', 'dawp'); ?></p>
                        <p><?php esc_html_e('You may not attempt to access restricted areas, misuse website features, upload harmful code, interfere with security systems, scrape content at scale, or use our store for fraudulent activity.', 'dawp'); ?></p>
                    </div>
                    <ul class="mt-8 grid gap-3 text-sm leading-6 text-[#6F625D] sm:grid-cols-2">
                        <li class="flex gap-3"><span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-[#E6007E]"></span><?php esc_html_e('Fraudulent purchases or payment misuse', 'dawp'); ?></li>
                        <li class="flex gap-3"><span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-[#E6007E]"></span><?php esc_html_e('Unauthorized access attempts', 'dawp'); ?></li>
                        <li class="flex gap-3"><span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-[#E6007E]"></span><?php esc_html_e('Copying website content without permission', 'dawp'); ?></li>
                        <li class="flex gap-3"><span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-[#E6007E]"></span><?php esc_html_e('Interfering with website functionality', 'dawp'); ?></li>
                    </ul>
                </section>

                <section id="orders" class="rounded-[2rem] border border-[#EEE5EF] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]"><?php esc_html_e('Orders And Payments', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]"><?php esc_html_e('Order Acceptance, Accuracy, And Payment', 'dawp'); ?></h2>
                    <div class="mt-6 space-y-5 text-base leading-8 text-[#6F625D]">
                        <p><?php esc_html_e('All orders are subject to product availability, payment authorization, fraud screening, and order verification. We reserve the right to cancel or refuse any order when necessary, including suspected fraud, pricing errors, inventory issues, or inaccurate customer details.', 'dawp'); ?></p>
                        <p><?php esc_html_e('Customers are responsible for providing accurate billing, shipping, size, and contact information. Incorrect details may cause order delays, failed delivery, or cancellation.', 'dawp'); ?></p>
                        <p><?php esc_html_e('Prices, promotions, product availability, and shipping options may change without notice. The final order total will be shown at checkout before payment is completed.', 'dawp'); ?></p>
                    </div>
                </section>

                <section id="products" class="rounded-[2rem] border border-[#EEE5EF] bg-[#FFF7FB] p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#7C3AED]"><?php esc_html_e('Product Information', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]"><?php esc_html_e('Footwear Details, Colors, Sizes, And Fit', 'dawp'); ?></h2>
                    <div class="mt-6 space-y-5 text-base leading-8 text-[#6F625D]">
                        <p><?php esc_html_e('We aim to display footwear names, images, descriptions, pricing, sizing, materials, care notes, and availability as accurately as possible. Slight variations may occur due to photography, screen settings, production updates, or inventory changes.', 'dawp'); ?></p>
                        <p><?php esc_html_e('Customers should review product descriptions, size guides, fit notes, material details, and care information before placing an order. If you need help choosing a size or style, please contact support before checkout.', 'dawp'); ?></p>
                        <p><?php esc_html_e('Comfort-focused language on our website describes everyday wear and general product feel. We do not make medical claims or guarantee pain relief, treatment, or health outcomes.', 'dawp'); ?></p>
                    </div>
                </section>

                <section id="shipping-returns" class="rounded-[2rem] border border-[#EEE5EF] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]"><?php esc_html_e('Shipping And Returns', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]"><?php esc_html_e('Customer Policy References', 'dawp'); ?></h2>
                    <div class="mt-6 space-y-5 text-base leading-8 text-[#6F625D]">
                        <p><?php esc_html_e('Shipping, delivery, tracking, return eligibility, refund handling, and order issue procedures are described in our Shipping Policy and Return & Refund Policy. Those policies are part of these Terms & Conditions.', 'dawp'); ?></p>
                        <p><?php esc_html_e('Orders placed after the 5:00 PM (GMT-08:00) Pacific Standard Time cutoff begin processing the following business day. Estimated total delivery is 6-10 business days, excluding standard U.S. public holidays and carrier interruptions.', 'dawp'); ?></p>
                        <p><?php esc_html_e('Eligible footwear returns must be requested within 30 days of delivery and must be unworn, unused, undamaged, clean, in original condition, and returned with original packaging where applicable.', 'dawp'); ?></p>
                    </div>
                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="<?php echo esc_url($shipping_policy_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#141217] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#E6007E]">
                            <?php esc_html_e('View Shipping Policy', 'dawp'); ?>
                        </a>
                        <a href="<?php echo esc_url($return_refund_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#E6007E] px-7 text-sm font-black uppercase tracking-wide text-[#E6007E] transition hover:bg-[#F3E8FF]">
                            <?php esc_html_e('View Return & Refund Policy', 'dawp'); ?>
                        </a>
                    </div>
                </section>

                <section id="intellectual-property" class="rounded-[2rem] border border-[#EEE5EF] bg-[#F6F5F7] p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]"><?php esc_html_e('Intellectual Property', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]"><?php esc_html_e('Brand, Content, And Design Rights', 'dawp'); ?></h2>
                    <div class="mt-6 space-y-5 text-base leading-8 text-[#6F625D]">
                        <p><?php esc_html_e('All website content, branding, page layouts, product presentation, graphics, text, images, logos, and design elements are owned by or licensed to House of Shoes Online unless otherwise stated.', 'dawp'); ?></p>
                        <p><?php esc_html_e('You may not copy, reproduce, distribute, modify, resell, or commercially exploit website content without written permission from House of Shoes Online.', 'dawp'); ?></p>
                        <p><?php esc_html_e('We do not support counterfeit goods, replica products, unauthorized logos, or misleading affiliation claims. Product listings should be reviewed based on the information provided on our website.', 'dawp'); ?></p>
                    </div>
                </section>

                <section class="rounded-[2rem] border border-[#EEE5EF] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]"><?php esc_html_e('User Content', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]"><?php esc_html_e('Reviews, Messages, And Submissions', 'dawp'); ?></h2>
                    <div class="mt-6 space-y-5 text-base leading-8 text-[#6F625D]">
                        <p><?php esc_html_e('If you submit reviews, messages, photos, or other content to House of Shoes Online, you are responsible for ensuring that the content is accurate, lawful, and does not violate the rights of others.', 'dawp'); ?></p>
                        <p><?php esc_html_e('We reserve the right to remove content that is misleading, offensive, unlawful, spam-like, unrelated to footwear shopping, or inconsistent with our store policies.', 'dawp'); ?></p>
                    </div>
                </section>

                <section id="limitations" class="rounded-[2rem] border border-[#EEE5EF] bg-[#FFF7FB] p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#7C3AED]"><?php esc_html_e('Limitations', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]"><?php esc_html_e('Service Availability And Limitations', 'dawp'); ?></h2>
                    <div class="mt-6 space-y-5 text-base leading-8 text-[#6F625D]">
                        <p><?php esc_html_e('We work to keep our website accurate, available, and secure, but we do not guarantee that the website will always be uninterrupted, error-free, or free from technical issues.', 'dawp'); ?></p>
                        <p><?php esc_html_e('To the fullest extent permitted by law, House of Shoes Online is not responsible for indirect, incidental, or consequential damages arising from website use, order delays, carrier issues, fit preferences, or misuse of our services.', 'dawp'); ?></p>
                    </div>
                </section>

                <section class="rounded-[2rem] border border-[#EEE5EF] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]"><?php esc_html_e('Terms Updates', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]"><?php esc_html_e('Changes To These Terms', 'dawp'); ?></h2>
                    <p class="mt-6 text-base leading-8 text-[#6F625D]"><?php esc_html_e('We may update these Terms & Conditions from time to time. Updates will be posted on this page. Continued use of the website after updates means you accept the revised terms.', 'dawp'); ?></p>
                </section>

                <section id="contact" class="relative overflow-hidden rounded-[2rem] bg-[linear-gradient(135deg,#141217_0%,#2A1538_100%)] p-7 text-white shadow-xl shadow-[#141217]/10 lg:p-10">
                    <div class="absolute left-0 top-0 h-1 w-full bg-[linear-gradient(90deg,#E6007E,#FF4FB8,#7C3AED)]"></div>
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#FF4FB8]"><?php esc_html_e('Questions About Terms?', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-white"><?php esc_html_e('We keep support direct.', 'dawp'); ?></h2>
                    <p class="mt-5 max-w-2xl text-base leading-8 text-white/78"><?php esc_html_e('If you have questions about these Terms & Conditions, your order, or our store policies, contact the House of Shoes Online support team.', 'dawp'); ?></p>
                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#E6007E] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#FF4FB8]"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
                        <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-white/25 px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-[#141217]"><?php echo esc_html($support_email); ?></a>
                        <a href="<?php echo esc_url($privacy_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-white/25 px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-[#141217]"><?php esc_html_e('View Privacy Policy', 'dawp'); ?></a>
                    </div>
                </section>
            </div>
        </div>
    </section>
</main>
