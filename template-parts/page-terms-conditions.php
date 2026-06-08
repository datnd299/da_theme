<?php
/**
 * Template Name: Terms & Conditions
 * Template Part: page-terms-conditions
 */

get_header();
?>

<main id="primary" class="bg-white font-body text-slickText">

    <section class="relative overflow-hidden bg-slickBlack text-white">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(34,197,94,0.35),transparent_34%),linear-gradient(135deg,#0B0F0D_0%,#123D2A_58%,#0B0F0D_100%)]"></div>
        <div class="absolute -right-24 top-16 h-80 w-80 rounded-full bg-slickActive/20 blur-3xl"></div>
        <div class="absolute -left-24 bottom-0 h-80 w-80 rounded-full bg-slickLime/10 blur-3xl"></div>

        <div class="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
            <div class="max-w-4xl">
                <p class="mb-5 text-sm font-black uppercase tracking-[0.24em] text-slickLime">
                    <?php esc_html_e('Store Terms', 'dawp'); ?>
                </p>

                <h1 class="font-heading text-5xl font-black uppercase leading-[0.92] tracking-[-0.05em] text-white sm:text-6xl lg:text-7xl">
                    <?php esc_html_e('Terms & Conditions', 'dawp'); ?>
                </h1>

                <p class="mt-6 max-w-2xl text-lg leading-8 text-white/85">
                    <?php esc_html_e('Review the rules that apply when you browse Slicktee, place apparel orders, submit reviews, or contact our support team.', 'dawp'); ?>
                </p>

                <p class="mt-6 inline-flex rounded-md border border-white/15 bg-white/10 px-4 py-3 text-sm font-black uppercase tracking-wide text-white/85">
                    <?php esc_html_e('Last Updated: June 8, 2026', 'dawp'); ?>
                </p>
            </div>
        </div>
    </section>

    <section class="bg-slickSoft py-12 lg:py-16">
        <div class="policy-highlight-slider mx-auto grid max-w-7xl grid-cols-1 gap-5 px-4 sm:grid-cols-2 sm:px-6 lg:grid-cols-4 lg:px-8">

            <div class="rounded-md border border-[#E5E7EB] bg-white p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-md bg-slickGreen text-sm font-black text-white">01</div>
                <h2 class="font-heading text-2xl font-black uppercase text-slickText">
                    <?php esc_html_e('Lawful Use', 'dawp'); ?>
                </h2>
                <p class="mt-3 text-sm leading-6 text-slickMuted">
                    <?php esc_html_e('Use the store only for lawful browsing, shopping, account, and support purposes.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-md border border-[#E5E7EB] bg-white p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-md bg-slickActive text-sm font-black text-slickBlack">02</div>
                <h2 class="font-heading text-2xl font-black uppercase text-slickText">
                    <?php esc_html_e('Secure Checkout', 'dawp'); ?>
                </h2>
                <p class="mt-3 text-sm leading-6 text-slickMuted">
                    <?php esc_html_e('Payments are handled through encrypted, PCI-DSS aligned third-party gateways.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-md border border-[#E5E7EB] bg-white p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-md bg-slickGreen text-sm font-black text-white">03</div>
                <h2 class="font-heading text-2xl font-black uppercase text-slickText">
                    <?php esc_html_e('Clear Policies', 'dawp'); ?>
                </h2>
                <p class="mt-3 text-sm leading-6 text-slickMuted">
                    <?php esc_html_e('Shipping, returns, refunds, and privacy terms are integrated into these store terms.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-md border border-[#E5E7EB] bg-white p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-md bg-slickLime text-sm font-black text-slickBlack">04</div>
                <h2 class="font-heading text-2xl font-black uppercase text-slickText">
                    <?php esc_html_e('Support Access', 'dawp'); ?>
                </h2>
                <p class="mt-3 text-sm leading-6 text-slickMuted">
                    <?php esc_html_e('Questions about these terms can be sent to Slicktee customer support.', 'dawp'); ?>
                </p>
            </div>

        </div>
    </section>

    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">

            <div class="space-y-8">

                <section id="agreement" class="rounded-md border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Agreement Overview', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase text-slickText">
                        <?php esc_html_e('Welcome To Slicktee', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('These Terms & Conditions constitute a legally binding agreement made between you and Slicktee concerning your access to and use of our online storefront.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('Throughout the site, the terms "we", "us", and "our" refer to Slicktee. By browsing our products, creating an account, or purchasing apparel from our store, you confirm that you accept, understand, and agree to be bound by these Terms and all operational policies integrated herein.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('If you do not agree with these Terms, please immediately discontinue using our website.', 'dawp'); ?>
                        </p>
                    </div>
                </section>

                <section id="eligibility" class="rounded-md border border-[#E5E7EB] bg-slickSoft p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Online Store Use & Eligibility', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase text-slickText">
                        <?php esc_html_e('Lawful Access And Account Use', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('By agreeing to these Terms, you represent that you are at least the legal age of majority in your state, province, or country of residence. You agree to use our storefront strictly for lawful commercial purposes.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('You are prohibited from using our site, servers, or checkout interfaces for fraudulent activities, unauthorized access attempts, system disruptions, or transmission of malicious software.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('You may not copy, scrape, or reproduce page layouts, graphics, images, text, logos, or other materials owned by Slicktee without prior written authorization.', 'dawp'); ?>
                        </p>
                    </div>
                </section>

                <section id="orders" class="rounded-md border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Product Presentation & Order Verification', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase text-slickText">
                        <?php esc_html_e('Product Details And Order Review', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('Slicktee works to display product names, descriptions, size charts, pricing, and apparel images as accurately as possible. Slight physical variations in fabric color tones or textures may occur due to monitor settings, device displays, or studio photography lighting.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('All orders placed through our store are subject to inventory availability, payment authorization, and routine fraud screening. We reserve the right to cancel, limit, or refuse any order when necessary.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('If an order is canceled after billing, the full amount will be refunded to your original payment method.', 'dawp'); ?>
                        </p>
                    </div>
                </section>

                <section id="payment" class="rounded-md border border-[#E5E7EB] bg-slickSoft p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Secure Checkout & Payment Processing', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase text-slickText">
                        <?php esc_html_e('Encrypted Payment Handling', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('Prices for our apparel are displayed on product pages and are subject to change without notice. Applicable taxes, shipping fees when available, and final totals are shown during checkout before payment is completed.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('To support secure transactions, Slicktee does not collect or store raw credit card numbers on our corporate systems. Payment transactions are protected through encrypted SSL connection and processed through certified third-party gateways that comply with the Payment Card Industry Data Security Standard (PCI-DSS).', 'dawp'); ?>
                        </p>
                    </div>
                </section>

                <section id="shipping" class="rounded-md border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Shipping, Handling, And Delivery Parameters', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase text-slickText">
                        <?php esc_html_e('Core Shipping Terms', 'dawp'); ?>
                    </h2>

                    <p class="mt-5 text-base leading-8 text-slickMuted">
                        <?php esc_html_e('By completing a purchase, you acknowledge and agree to our logistical processing windows:', 'dawp'); ?>
                    </p>

                    <div class="mt-7 grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div class="rounded-md border border-[#E5E7EB] bg-slickSoft p-5">
                            <p class="text-sm font-black uppercase tracking-wide text-slickText"><?php esc_html_e('Order Cutoff Time', 'dawp'); ?></p>
                            <p class="mt-3 text-base leading-7 text-slickMuted"><?php esc_html_e('5:00 PM (GMT-08:00) Pacific Standard Time. Orders completed after cutoff begin processing the following business day.', 'dawp'); ?></p>
                        </div>

                        <div class="rounded-md border border-[#E5E7EB] bg-slickSoft p-5">
                            <p class="text-sm font-black uppercase tracking-wide text-slickText"><?php esc_html_e('Handling Time', 'dawp'); ?></p>
                            <p class="mt-3 text-base leading-7 text-slickMuted"><?php esc_html_e('1-3 business days, Monday through Friday, excluding public holidays.', 'dawp'); ?></p>
                        </div>

                        <div class="rounded-md border border-[#E5E7EB] bg-slickSoft p-5">
                            <p class="text-sm font-black uppercase tracking-wide text-slickText"><?php esc_html_e('Transit Time', 'dawp'); ?></p>
                            <p class="mt-3 text-base leading-7 text-slickMuted"><?php esc_html_e('Standard domestic transit routes take approximately 5-7 business days from courier dispatch.', 'dawp'); ?></p>
                        </div>

                        <div class="rounded-md border border-[#E5E7EB] bg-slickSoft p-5">
                            <p class="text-sm font-black uppercase tracking-wide text-slickText"><?php esc_html_e('Delivery Window', 'dawp'); ?></p>
                            <p class="mt-3 text-base leading-7 text-slickMuted"><?php esc_html_e('Estimated delivery is 6-10 business days total from the date of purchase.', 'dawp'); ?></p>
                        </div>
                    </div>

                    <div class="mt-7">
                        <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>"
                           class="inline-flex min-h-12 items-center justify-center rounded-md bg-slickBlack px-6 text-sm font-black uppercase tracking-wide text-white transition hover:bg-slickGreen">
                            <?php esc_html_e('View Shipping Policy', 'dawp'); ?>
                        </a>
                    </div>
                </section>

                <section id="returns" class="rounded-md border border-[#E5E7EB] bg-slickSoft p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Returns, Refunds, And Consumer Cancellations', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase text-slickText">
                        <?php esc_html_e('Return And Refund Terms', 'dawp'); ?>
                    </h2>

                    <ul class="mt-6 grid gap-3 text-base leading-8 text-slickMuted">
                        <li class="flex gap-3"><span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span><span><?php esc_html_e('Return Window: Customers may initiate a return or exchange request within 30 days of documented courier delivery.', 'dawp'); ?></span></li>
                        <li class="flex gap-3"><span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span><span><?php esc_html_e('Product Condition: Items must be returned unused, unwashed, in original condition, and complete with original packaging, tags, and labels attached.', 'dawp'); ?></span></li>
                        <li class="flex gap-3"><span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span><span><?php esc_html_e('Fee Structure: There is no restocking fee. Slicktee covers return shipping costs for defective, damaged, or incorrect items. Customers are responsible for actual return shipping costs for change-of-mind returns.', 'dawp'); ?></span></li>
                        <li class="flex gap-3"><span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span><span><?php esc_html_e('Refund Timeline: Approved refunds are credited back to the original payment method within 7 business days.', 'dawp'); ?></span></li>
                    </ul>

                    <div class="mt-7">
                        <a href="<?php echo esc_url(home_url('/return-refund-policy/')); ?>"
                           class="inline-flex min-h-12 items-center justify-center rounded-md bg-slickBlack px-6 text-sm font-black uppercase tracking-wide text-white transition hover:bg-slickGreen">
                            <?php esc_html_e('View Return & Refund Policy', 'dawp'); ?>
                        </a>
                    </div>
                </section>

                <section id="content" class="rounded-md border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('User-Generated Content & Reviews', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase text-slickText">
                        <?php esc_html_e('Reviews, Ratings, And Product Comments', 'dawp'); ?>
                    </h2>

                    <p class="mt-6 text-base leading-8 text-slickMuted">
                        <?php esc_html_e('If you submit reviews, product comments, ratings, or photos to Slicktee, you grant us a non-exclusive, royalty-free right to use and display that content across our storefront. You are responsible for ensuring your submissions are truthful, lawful, and do not violate third-party copyrights, trademarks, privacy rights, or other legal rights. We reserve the right to remove content deemed offensive, misleading, unlawful, or promotional spam.', 'dawp'); ?>
                    </p>
                </section>

                <section id="liability" class="rounded-md border border-[#E5E7EB] bg-slickSoft p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Limitation Of Liability', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase text-slickText">
                        <?php esc_html_e('Store Availability And Service Limits', 'dawp'); ?>
                    </h2>

                    <p class="mt-6 text-base leading-8 text-slickMuted">
                        <?php esc_html_e('Slicktee works to keep our online store accurate, secure, and accessible. However, we do not guarantee that website operations will be completely uninterrupted or error-free. To the fullest extent permitted by applicable law, Slicktee shall not be liable for indirect, incidental, or consequential damages resulting from delivery transit delays, carrier management issues, third-party service interruptions, or your inability to access our digital services.', 'dawp'); ?>
                    </p>
                </section>

                <section id="law" class="rounded-md border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Governing Law', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase text-slickText">
                        <?php esc_html_e('United States Ecommerce Terms', 'dawp'); ?>
                    </h2>

                    <p class="mt-6 text-base leading-8 text-slickMuted">
                        <?php esc_html_e('These Terms & Conditions, along with any separate operational policies whereby we provide ecommerce services, shall be governed by, interpreted, and construed in accordance with the laws of the United States, without regard to conflict-of-law principles.', 'dawp'); ?>
                    </p>
                </section>

                <section id="contact" class="overflow-hidden rounded-md bg-slickBlack text-white shadow-xl shadow-black/10">
                    <div class="p-7 lg:p-10">
                        <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickLime">
                            <?php esc_html_e('Customer Support & Contact Information', 'dawp'); ?>
                        </p>

                        <h2 class="font-heading text-4xl font-black uppercase leading-none">
                            <?php esc_html_e('Questions About These Terms?', 'dawp'); ?>
                        </h2>

                        <p class="mt-5 max-w-2xl text-base leading-8 text-white/80">
                            <?php esc_html_e('For inquiries regarding these Terms & Conditions, order updates, or policy interpretation, contact Slicktee through our verified support channels.', 'dawp'); ?>
                        </p>

                        <div class="mt-8 grid grid-cols-1 gap-4 lg:grid-cols-2">
                            <div class="rounded-md border border-white/10 bg-white/5 p-5">
                                <p class="text-xs font-black uppercase tracking-[0.2em] text-slickLime"><?php esc_html_e('Store / Brand Name', 'dawp'); ?></p>
                                <p class="mt-3 text-base font-bold text-white"><?php esc_html_e('Slicktee', 'dawp'); ?></p>
                            </div>

                            <div class="rounded-md border border-white/10 bg-white/5 p-5">
                                <p class="text-xs font-black uppercase tracking-[0.2em] text-slickLime"><?php esc_html_e('Customer Support Email', 'dawp'); ?></p>
                                <p class="mt-3 text-base font-bold text-white">
                                    <a href="mailto:support@slicktee.com" class="transition hover:text-slickLime">support@slicktee.com</a>
                                </p>
                            </div>

                            <div class="rounded-md border border-white/10 bg-white/5 p-5">
                                <p class="text-xs font-black uppercase tracking-[0.2em] text-slickLime"><?php esc_html_e('Physical Business Address', 'dawp'); ?></p>
                                <p class="mt-3 text-base leading-7 text-white/80">
                                    <?php esc_html_e('425 Avenue P, Newark, NJ 07105', 'dawp'); ?>
                                </p>
                            </div>

                            <div class="rounded-md border border-white/10 bg-white/5 p-5">
                                <p class="text-xs font-black uppercase tracking-[0.2em] text-slickLime"><?php esc_html_e('Customer Service Hours', 'dawp'); ?></p>
                                <p class="mt-3 text-base leading-7 text-white/80">
                                    <?php esc_html_e('Business Hours: Monday-Friday, 9:00 AM-6:00 PM PST', 'dawp'); ?>
                                </p>
                            </div>

                            <div class="rounded-md border border-white/10 bg-white/5 p-5">
                                <p class="text-xs font-black uppercase tracking-[0.2em] text-slickLime"><?php esc_html_e('Contact Page', 'dawp'); ?></p>
                                <p class="mt-3 text-base font-bold text-white">
                                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="transition hover:text-slickLime">
                                        <?php esc_html_e('Contact Us', 'dawp'); ?>
                                    </a>
                                </p>
                            </div>

                            <div class="rounded-md border border-white/10 bg-white/5 p-5">
                                <p class="text-xs font-black uppercase tracking-[0.2em] text-slickLime"><?php esc_html_e('Response Time', 'dawp'); ?></p>
                                <p class="mt-3 text-base leading-7 text-white/80">
                                    <?php esc_html_e('We aim to reply within 1 business day. Response times may vary on weekends, holidays, or high-volume periods.', 'dawp'); ?>
                                </p>
                            </div>
                        </div>

                        <div class="mt-8 flex flex-wrap gap-4">
                            <a href="<?php echo esc_url(home_url('/contact-us/')); ?>"
                               class="inline-flex min-h-12 items-center justify-center rounded-md bg-slickActive px-6 text-sm font-black uppercase tracking-wide text-slickBlack transition hover:bg-slickLime">
                                <?php esc_html_e('Contact Support', 'dawp'); ?>
                            </a>

                            <a href="mailto:support@slicktee.com"
                               class="inline-flex min-h-12 items-center justify-center rounded-md border border-white/25 px-6 text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-slickBlack">
                                <?php esc_html_e('Email Support', 'dawp'); ?>
                            </a>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </section>

</main>

<?php
get_footer();
