<?php
/**
 * Template Name: Privacy Policy
 * Template Part: page-privacy
 */

if (!function_exists('dawp_is_virtual_page_request') || !dawp_is_virtual_page_request()) {
    get_header();
}
?>

<main id="primary" class="bg-white text-slickText font-body">

    <section class="relative overflow-hidden bg-slickBlack text-white">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(34,197,94,0.35),transparent_34%),linear-gradient(135deg,#0B0F0D_0%,#123D2A_58%,#0B0F0D_100%)]"></div>
        <div class="absolute -right-24 top-16 h-80 w-80 rounded-full bg-slickActive/20 blur-3xl"></div>
        <div class="absolute -left-24 bottom-0 h-80 w-80 rounded-full bg-slickLime/10 blur-3xl"></div>

        <div class="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
            <div class="max-w-4xl">
                <p class="mb-5 text-sm font-black uppercase tracking-[0.24em] text-slickLime">
                    <?php esc_html_e('Privacy & Security', 'dawp'); ?>
                </p>

                <h1 class="font-heading text-5xl font-black uppercase leading-[0.92] tracking-[-0.05em] text-white sm:text-6xl lg:text-7xl">
                    <?php esc_html_e('Privacy Policy', 'dawp'); ?>
                </h1>

                <p class="mt-6 max-w-2xl text-lg leading-8 text-white/85">
                    <?php esc_html_e('Learn how Slicktee collects, uses, shares, and protects customer data when you browse, shop, or contact our support team.', 'dawp'); ?>
                </p>

                <p class="mt-6 inline-flex rounded-md border border-white/15 bg-white/10 px-4 py-3 text-sm font-black uppercase tracking-wide text-white/85">
                    <?php esc_html_e('Last Updated: June 8, 2026', 'dawp'); ?>
                </p>
            </div>
        </div>
    </section>

    <section class="bg-slickSoft py-12 lg:py-16">
        <div class="policy-highlight-slider mx-auto grid max-w-7xl grid-cols-1 gap-5 px-4 sm:grid-cols-2 sm:px-6 lg:grid-cols-4 lg:px-8">

            <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-slickGreen text-sm font-black text-white">01</div>
                <h2 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                    <?php esc_html_e('Order Data', 'dawp'); ?>
                </h2>
                <p class="mt-3 text-sm leading-6 text-slickMuted">
                    <?php esc_html_e('We collect the information needed to process, fulfill, and support your order.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-slickActive text-sm font-black text-slickBlack">02</div>
                <h2 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                    <?php esc_html_e('Secure Payment', 'dawp'); ?>
                </h2>
                <p class="mt-3 text-sm leading-6 text-slickMuted">
                    <?php esc_html_e('Full payment card details are handled by certified third-party gateways.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-slickGreen text-sm font-black text-white">03</div>
                <h2 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                    <?php esc_html_e('No Data Sale', 'dawp'); ?>
                </h2>
                <p class="mt-3 text-sm leading-6 text-slickMuted">
                    <?php esc_html_e('We do not sell, rent, or trade personal customer data as a business practice.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-slickLime text-sm font-black text-slickBlack">04</div>
                <h2 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                    <?php esc_html_e('Support Access', 'dawp'); ?>
                </h2>
                <p class="mt-3 text-sm leading-6 text-slickMuted">
                    <?php esc_html_e('You can contact us for privacy questions or data modification requests.', 'dawp'); ?>
                </p>
            </div>

        </div>
    </section>

    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">

            <div class="space-y-8">

                <section id="introduction" class="rounded-3xl border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Privacy Commitment', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Your Privacy Matters To Slicktee', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('At Slicktee, accessible through our online storefront, we deeply value, respect, and prioritize the privacy and data security of our visitors and customers. This Privacy Policy explains how we collect, process, use, share, and protect your personal data when you browse our product catalog, interact with customer service, or purchase apparel and apparel-related products from our store.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('By interacting with our website, you acknowledge and agree to the secure data management practices detailed below.', 'dawp'); ?>
                        </p>
                    </div>
                </section>

                <section id="information" class="rounded-3xl border border-[#E5E7EB] bg-slickSoft p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Information We Collect', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Customer And Technical Data', 'dawp'); ?>
                    </h2>

                    <p class="mt-5 text-base leading-8 text-slickMuted">
                        <?php esc_html_e('To fulfill your purchase requests and provide an optimized shopping experience, we collect two distinct forms of customer data:', 'dawp'); ?>
                    </p>

                    <div class="mt-7 grid grid-cols-1 gap-5 lg:grid-cols-2">
                        <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6">
                            <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                                <?php esc_html_e('Direct Information Provided By You', 'dawp'); ?>
                            </h3>
                            <p class="mt-4 text-base leading-8 text-slickMuted">
                                <?php esc_html_e('This includes your full name, physical shipping address, verified billing address, email address, contact phone number, order details, and records of communication history with our customer support team.', 'dawp'); ?>
                            </p>
                        </div>

                        <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6">
                            <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                                <?php esc_html_e('Automated Technical Data', 'dawp'); ?>
                            </h3>
                            <p class="mt-4 text-base leading-8 text-slickMuted">
                                <?php esc_html_e('When you browse our storefront, our system may automatically gather device-specific data through server logs, including your IP address, browser type, operating system, referring or exit URLs, approximate geographic region derived from technical parameters, and digital interaction metrics.', 'dawp'); ?>
                            </p>
                        </div>
                    </div>
                </section>

                <section id="use" class="rounded-3xl border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('How We Use Your Information', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Operational And Customer Support Uses', 'dawp'); ?>
                    </h2>

                    <p class="mt-5 text-base leading-8 text-slickMuted">
                        <?php esc_html_e('We process your data under legal and commercial obligations to perform the following business functions:', 'dawp'); ?>
                    </p>

                    <ul class="mt-6 grid gap-3 text-base leading-8 text-slickMuted">
                        <li class="flex gap-3"><span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span><span><?php esc_html_e('Process, authenticate, manufacture, and securely ship your apparel orders.', 'dawp'); ?></span></li>
                        <li class="flex gap-3"><span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span><span><?php esc_html_e('Generate automated transaction receipts, billing invoices, and courier tracking updates.', 'dawp'); ?></span></li>
                        <li class="flex gap-3"><span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span><span><?php esc_html_e('Monitor transaction logs to help prevent fraud, technical vulnerabilities, or security breaches.', 'dawp'); ?></span></li>
                        <li class="flex gap-3"><span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span><span><?php esc_html_e('Manage standard product exchanges, returns, and customer service inquiries.', 'dawp'); ?></span></li>
                        <li class="flex gap-3"><span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span><span><?php esc_html_e('Optimize our store layout, loading speed, and product performance based on traffic metrics.', 'dawp'); ?></span></li>
                        <li class="flex gap-3"><span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span><span><?php esc_html_e('With your clear opt-in consent, distribute store newsletters and style announcements. You retain the right to opt out using the unsubscribe link in any promotional email.', 'dawp'); ?></span></li>
                    </ul>
                </section>

                <section id="cookies" class="rounded-3xl border border-[#E5E7EB] bg-slickSoft p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Cookies And Tracking Technologies', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Essential, Functional, And Analytics Cookies', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('Slicktee uses essential, functional, and analytical cookies, which are small data text files stored on your computer or mobile device. These cookies enable core ecommerce functionality, such as remembering items placed in your shopping cart across sessions and preserving secure account logins.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('We also use analytics cookies to measure anonymous site traffic. You may disable cookies through your browser settings; however, doing so may cause critical parts of checkout and payment systems to stop functioning properly.', 'dawp'); ?>
                        </p>
                    </div>
                </section>

                <section id="sharing" class="rounded-3xl border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Information Sharing Policy', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Limited Sharing With Service Providers', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('We do not sell, rent, trade, or distribute your personal customer data to unrelated third parties as a business practice. Your information is shared only with certified third-party service providers who help operate our storefront.', 'dawp'); ?>
                        </p>
                    </div>

                    <div class="mt-7 grid grid-cols-1 gap-5 sm:grid-cols-2">
                        <div class="rounded-2xl border border-[#E5E7EB] bg-slickSoft p-5">
                            <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText"><?php esc_html_e('Ecommerce Infrastructure', 'dawp'); ?></h3>
                            <p class="mt-3 text-sm leading-6 text-slickMuted"><?php esc_html_e('Platform hosts and digital database networks.', 'dawp'); ?></p>
                        </div>
                        <div class="rounded-2xl border border-[#E5E7EB] bg-slickSoft p-5">
                            <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText"><?php esc_html_e('Logistics & Fulfillment', 'dawp'); ?></h3>
                            <p class="mt-3 text-sm leading-6 text-slickMuted"><?php esc_html_e('Printing partners, fulfillment houses, and shipping carriers used to deliver packages.', 'dawp'); ?></p>
                        </div>
                        <div class="rounded-2xl border border-[#E5E7EB] bg-slickSoft p-5">
                            <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText"><?php esc_html_e('Payment & Fraud Prevention', 'dawp'); ?></h3>
                            <p class="mt-3 text-sm leading-6 text-slickMuted"><?php esc_html_e('Secure credit card processors and transaction fraud screening networks.', 'dawp'); ?></p>
                        </div>
                        <div class="rounded-2xl border border-[#E5E7EB] bg-slickSoft p-5">
                            <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText"><?php esc_html_e('Legal Compliance', 'dawp'); ?></h3>
                            <p class="mt-3 text-sm leading-6 text-slickMuted"><?php esc_html_e('We may disclose data if required by law, government audits, or court subpoenas to protect the legal rights, safety, and property of Slicktee and our customers.', 'dawp'); ?></p>
                        </div>
                    </div>
                </section>

                <section id="payment" class="rounded-3xl border border-[#E5E7EB] bg-slickSoft p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Payment Security And Data Encryption', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Encrypted Checkout And PCI-DSS Gateways', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('Your transactional safety is a priority. Slicktee does not store, process, or view your full credit card numbers or sensitive payment credentials on our own local servers.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('All checkout procedures are executed over an encrypted SSL network connection. Financial transactions are managed by certified third-party payment gateways that comply with the global Payment Card Industry Data Security Standard (PCI-DSS).', 'dawp'); ?>
                        </p>
                    </div>
                </section>

                <section id="retention" class="rounded-3xl border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Data Retention And Safeguards', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Keeping Records Only As Needed', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('We store personal transaction and order information within our business records for as long as necessary to fulfill ecommerce services, manage accounting records, comply with tax or audit requirements, or resolve potential customer service disputes.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('While we use industry-standard technical and organizational safeguards to protect your data, no method of internet storage or transmission can be guaranteed 100% secure.', 'dawp'); ?>
                        </p>
                    </div>
                </section>

                <section id="children" class="rounded-3xl border border-[#E5E7EB] bg-slickSoft p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Children Privacy Compliance', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('General Audience Storefront', 'dawp'); ?>
                    </h2>

                    <p class="mt-6 text-base leading-8 text-slickMuted">
                        <?php esc_html_e('Slicktee operates a general audience ecommerce storefront, and our products are designed for consumers who have reached the legal age of majority. We do not knowingly or intentionally collect, request, or maintain personally identifiable information from children under the age of 13. If we discover that a child under 13 has submitted personal information, we will remove it from our active databases immediately.', 'dawp'); ?>
                    </p>
                </section>

                <section id="contact" class="overflow-hidden rounded-3xl bg-slickBlack text-white shadow-xl shadow-black/10">
                    <div class="p-7 lg:p-10">
                        <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickLime">
                            <?php esc_html_e('Customer Support & Business Identity', 'dawp'); ?>
                        </p>

                        <h2 class="font-heading text-4xl font-black uppercase leading-none tracking-[-0.04em]">
                            <?php esc_html_e('Contact Information', 'dawp'); ?>
                        </h2>

                        <p class="mt-5 max-w-2xl text-base leading-8 text-white/80">
                            <?php esc_html_e('For privacy inquiries, data modification requests, or questions regarding our operational policies, please reach out through our verified support channels.', 'dawp'); ?>
                        </p>

                        <div class="mt-8 grid grid-cols-1 gap-4 lg:grid-cols-2">
                            <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                                <p class="text-xs font-black uppercase tracking-[0.2em] text-slickLime"><?php esc_html_e('Store / Brand Name', 'dawp'); ?></p>
                                <p class="mt-3 text-base font-bold text-white"><?php esc_html_e('Slicktee', 'dawp'); ?></p>
                            </div>

                            <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                                <p class="text-xs font-black uppercase tracking-[0.2em] text-slickLime"><?php esc_html_e('Customer Support Email', 'dawp'); ?></p>
                                <p class="mt-3 text-base font-bold text-white">
                                    <a href="mailto:support@slicktee.com" class="transition hover:text-slickLime">support@slicktee.com</a>
                                </p>
                            </div>

                            <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                                <p class="text-xs font-black uppercase tracking-[0.2em] text-slickLime"><?php esc_html_e('Business Address', 'dawp'); ?></p>
                                <p class="mt-3 text-base leading-7 text-white/80">
                                    <?php echo esc_html(dawp_get_store_address()); ?>
                                </p>
                            </div>

                            <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                                <p class="text-xs font-black uppercase tracking-[0.2em] text-slickLime"><?php esc_html_e('Business Operating Hours', 'dawp'); ?></p>
                                <p class="mt-3 text-base leading-7 text-white/80">
                                    <?php esc_html_e('Business Hours: Monday-Friday, 9:00 AM-6:00 PM PST', 'dawp'); ?>
                                </p>
                            </div>

                            <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                                <p class="text-xs font-black uppercase tracking-[0.2em] text-slickLime"><?php esc_html_e('Contact Page', 'dawp'); ?></p>
                                <p class="mt-3 text-base font-bold text-white">
                                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="transition hover:text-slickLime">
                                        <?php esc_html_e('Contact Us', 'dawp'); ?>
                                    </a>
                                </p>
                            </div>

                            <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
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
                                <?php esc_html_e('Email Privacy Support', 'dawp'); ?>
                            </a>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </section>

</main>

<?php
if (!function_exists('dawp_is_virtual_page_request') || !dawp_is_virtual_page_request()) {
    get_footer();
}
