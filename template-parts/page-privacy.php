<?php
/**
 * Template Part: Privacy Policy Page
 */

defined('ABSPATH') || exit;

$support_email  = 'support@myveganblog.com';
$updated_date   = 'May 28, 2026';
$store_address  = function_exists('dawp_store_address') ? dawp_store_address() : '';
$business_hours = __('Monday - Friday, 9:00 AM - 5:00 PM, GMT-08:00', 'dawp');
$contact_url    = home_url('/contact-us/');
$privacy_image  = get_template_directory_uri() . '/assets/img/All_image/image copy 6.png';
?>

<main class="bg-[#F8F3EC] text-[#2F2A28]">
    <section class="relative overflow-hidden bg-[#241F1D] px-4 py-20 text-white sm:px-6 lg:px-8 lg:py-24">
        <div class="absolute inset-0 opacity-35">
            <img src="<?php echo esc_url($privacy_image); ?>" alt="<?php esc_attr_e('Women\'s shoes, handbags, and accessories arranged for Myveganblog privacy policy', 'dawp'); ?>" class="h-full w-full object-cover" loading="eager">
            <div class="absolute inset-0 bg-[linear-gradient(90deg,rgba(36,31,29,0.98)_0%,rgba(36,31,29,0.78)_52%,rgba(36,31,29,0.42)_100%)]"></div>
        </div>
        <div class="relative mx-auto grid w-[min(100%,1180px)] gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:items-end">
            <div class="max-w-3xl">
                <span class="inline-flex border-b border-[#E8D8C8] pb-2 text-xs font-bold uppercase tracking-[0.18em] text-[#E8D8C8]"><?php esc_html_e('Privacy Policy', 'dawp'); ?></span>
                <h1 class="mt-7 font-serif text-4xl leading-tight text-white sm:text-6xl"><?php esc_html_e('Privacy Policy', 'dawp'); ?></h1>
                <p class="mt-6 max-w-2xl text-base leading-8 text-white/78 sm:text-lg">
                    <?php esc_html_e('At Myveganblog, accessible from myveganblog.com, we are deeply committed to protecting the privacy, confidentiality, and security of our visitors and customers.', 'dawp'); ?>
                </p>
            </div>
            <div class="rounded-[28px] border border-white/18 bg-white/10 p-6 backdrop-blur sm:p-8">
                <dl class="grid gap-5 sm:grid-cols-2">
                    <div>
                        <dt class="text-xs font-bold uppercase tracking-[0.18em] text-[#E8D8C8]"><?php esc_html_e('Store', 'dawp'); ?></dt>
                        <dd class="mt-2 font-serif text-2xl text-white"><?php esc_html_e('Myveganblog', 'dawp'); ?></dd>
                    </div>
                    <div>
                        <dt class="text-xs font-bold uppercase tracking-[0.18em] text-[#E8D8C8]"><?php esc_html_e('Last Updated', 'dawp'); ?></dt>
                        <dd class="mt-2 font-serif text-2xl text-white"><?php echo esc_html($updated_date); ?></dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>

    <section class="px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto w-[min(100%,1180px)] space-y-5">
            <article class="rounded-[28px] border border-[#D8CEC6] bg-white p-6 shadow-[0_12px_30px_rgba(47,42,40,0.06)] sm:p-8 lg:p-10">
                <h2 class="font-serif text-3xl leading-tight text-[#2F2A28] sm:text-4xl"><?php esc_html_e('Privacy Policy', 'dawp'); ?></h2>
                <p class="mt-5 text-base leading-8 text-[#6F625D]"><?php echo esc_html(sprintf(__('Last Updated: %s', 'dawp'), $updated_date)); ?></p>
                <p class="mt-5 text-base leading-8 text-[#6F625D]"><?php esc_html_e('At Myveganblog, accessible from myveganblog.com (the "Site"), we are deeply committed to protecting the privacy, confidentiality, and security of our visitors and customers. This Privacy Policy explains how we collect, use, disclose, and safeguard your personal information when you browse our website or purchase our women\'s shoes, handbags, and accessories.', 'dawp'); ?></p>
            </article>

            <article class="rounded-[28px] border border-[#D8CEC6] bg-white p-6 shadow-[0_12px_30px_rgba(47,42,40,0.06)] sm:p-8 lg:p-10">
                <h2 class="font-serif text-3xl leading-tight text-[#2F2A28] sm:text-4xl"><?php esc_html_e('01. Information We Collect', 'dawp'); ?></h2>
                <div class="mt-5 space-y-4 text-base leading-8 text-[#6F625D]">
                    <p><strong class="text-[#2F2A28]"><?php esc_html_e('Information You Provide to Us:', 'dawp'); ?></strong> <?php esc_html_e('When you shop, create an account, or interact with us, we collect information necessary to process your transactions. This includes your name, email address, billing address, shipping address, order details, and secure payment confirmation data.', 'dawp'); ?></p>
                    <p><strong class="text-[#2F2A28]"><?php esc_html_e('Information Collected Automatically:', 'dawp'); ?></strong> <?php esc_html_e('When you access the Site, our systems automatically collect device and browsing metrics. This includes your IP address, browser type, device type, operating system, pages viewed, referring URLs, time stamps, general geographic location, and cookie identifiers to help keep the site secure and optimize the shopping layout.', 'dawp'); ?></p>
                </div>
            </article>

            <article class="rounded-[28px] border border-[#D8CEC6] bg-white p-6 shadow-[0_12px_30px_rgba(47,42,40,0.06)] sm:p-8 lg:p-10">
                <h2 class="font-serif text-3xl leading-tight text-[#2F2A28] sm:text-4xl"><?php esc_html_e('02. How We Use Your Information', 'dawp'); ?></h2>
                <p class="mt-5 text-base leading-8 text-[#6F625D]"><?php esc_html_e('We utilize your personal information to fulfill the core operational needs of our store, including:', 'dawp'); ?></p>
                <ul class="mt-5 list-disc space-y-3 pl-5 text-base leading-7 text-[#6F625D]">
                    <li><?php esc_html_e('Processing, billing, and fulfilling your orders.', 'dawp'); ?></li>
                    <li><?php esc_html_e('Arranging secure shipping, sending order confirmations, and providing tracking updates.', 'dawp'); ?></li>
                    <li><?php esc_html_e('Responding to customer service inquiries, managing returns, and issuing refunds.', 'dawp'); ?></li>
                    <li><?php esc_html_e('Detecting, preventing, and mitigating fraudulent transactions or security risks.', 'dawp'); ?></li>
                    <li><?php esc_html_e('With your explicit consent, sending newsletters, new arrival notices, style updates, or promotional marketing offers related to Myveganblog. You can opt out of these emails at any time.', 'dawp'); ?></li>
                </ul>
            </article>

            <article class="rounded-[28px] border border-[#D8CEC6] bg-white p-6 shadow-[0_12px_30px_rgba(47,42,40,0.06)] sm:p-8 lg:p-10">
                <h2 class="font-serif text-3xl leading-tight text-[#2F2A28] sm:text-4xl"><?php esc_html_e('03. Cookies & Tracking Technologies', 'dawp'); ?></h2>
                <div class="mt-5 space-y-4 text-base leading-8 text-[#6F625D]">
                    <p><?php esc_html_e('Our website utilizes cookies, web beacons, and similar tracking technologies to enhance your retail experience. Cookies help us remember items placed in your shopping cart, maintain your account session, analyze web traffic, and understand customer browsing behavior.', 'dawp'); ?></p>
                    <p><?php esc_html_e('You can manage or disable cookies through your personal browser settings; however, please note that disabling core cookies may impact essential store functionalities, such as the checkout and secure login processes.', 'dawp'); ?></p>
                </div>
            </article>

            <article class="rounded-[28px] border border-[#D8CEC6] bg-white p-6 shadow-[0_12px_30px_rgba(47,42,40,0.06)] sm:p-8 lg:p-10">
                <h2 class="font-serif text-3xl leading-tight text-[#2F2A28] sm:text-4xl"><?php esc_html_e('04. Sharing Your Information', 'dawp'); ?></h2>
                <p class="mt-5 text-base leading-8 text-[#6F625D]"><?php esc_html_e('We do not sell, rent, or trade your personal information to third parties. We share data strictly with trusted service providers who perform operations on our behalf, including:', 'dawp'); ?></p>
                <ul class="mt-5 list-disc space-y-3 pl-5 text-base leading-7 text-[#6F625D]">
                    <li><strong class="text-[#2F2A28]"><?php esc_html_e('Payment Processors:', 'dawp'); ?></strong> <?php esc_html_e('To execute secure transactions without storing raw financial details on our servers.', 'dawp'); ?></li>
                    <li><strong class="text-[#2F2A28]"><?php esc_html_e('Shipping & Logistics Carriers:', 'dawp'); ?></strong> <?php esc_html_e('To print labels and deliver your shoes, bags, and accessories.', 'dawp'); ?></li>
                    <li><strong class="text-[#2F2A28]"><?php esc_html_e('Corporate Operations:', 'dawp'); ?></strong> <?php esc_html_e('E-mail service providers, analytics platforms (such as Google Analytics), fraud prevention tools, and website hosting partners.', 'dawp'); ?></li>
                    <li><strong class="text-[#2F2A28]"><?php esc_html_e('Legal Compliance:', 'dawp'); ?></strong> <?php esc_html_e('We may disclose information if required to do so by applicable laws, subpoenas, or legal processes to protect the safety, rights, and property of Myveganblog, our customers, or the public.', 'dawp'); ?></li>
                </ul>
            </article>

            <article class="rounded-[28px] border border-[#D8CEC6] bg-white p-6 shadow-[0_12px_30px_rgba(47,42,40,0.06)] sm:p-8 lg:p-10">
                <h2 class="font-serif text-3xl leading-tight text-[#2F2A28] sm:text-4xl"><?php esc_html_e('05. Data Security & Payment Protection', 'dawp'); ?></h2>
                <div class="mt-5 space-y-4 text-base leading-8 text-[#6F625D]">
                    <p><?php esc_html_e('The security of your personal data is vital to us. We implement robust technical, administrative, and organizational safeguards designed to protect your information from unauthorized access, loss, or alteration.', 'dawp'); ?></p>
                    <p><?php esc_html_e('To guarantee a secure shopping environment, our checkout process is protected using SSL (Secure Sockets Layer) encryption technology. All credit card and payment interactions are handled exclusively by certified third-party payment gateways operating under strict PCI-DSS (Payment Card Industry Data Security Standard) compliance. We do not store or retain your raw credit card numbers on our corporate database.', 'dawp'); ?></p>
                </div>
            </article>

            <article class="rounded-[28px] border border-[#D8CEC6] bg-white p-6 shadow-[0_12px_30px_rgba(47,42,40,0.06)] sm:p-8 lg:p-10">
                <h2 class="font-serif text-3xl leading-tight text-[#2F2A28] sm:text-4xl"><?php esc_html_e('06. Children\'s Privacy', 'dawp'); ?></h2>
                <p class="mt-5 text-base leading-8 text-[#6F625D]"><?php esc_html_e('Our website and retail products are directed toward adults and mature consumers. We do not knowingly or intentionally collect, solicit, or maintain personal information from children under the age of 13 (or under 16 in certain international jurisdictions). If we discover that a child under these age thresholds has provided us with personal data, we will delete it immediately from our servers.', 'dawp'); ?></p>
            </article>

            <article class="rounded-[28px] border border-[#D8CEC6] bg-white p-6 shadow-[0_12px_30px_rgba(47,42,40,0.06)] sm:p-8 lg:p-10">
                <h2 class="font-serif text-3xl leading-tight text-[#2F2A28] sm:text-4xl"><?php esc_html_e('07. Your Privacy Rights & Choices', 'dawp'); ?></h2>
                <p class="mt-5 text-base leading-8 text-[#6F625D]"><?php esc_html_e('Depending on your geographic location (such as the European Union under GDPR or California under CCPA), you may hold specific statutory rights regarding your data. These may include the right to request access to, correction of, restriction of, or permanent deletion of your personal information. You can also exercise your right to object to marketing communications by clicking the "Unsubscribe" link included at the bottom of any promotional email.', 'dawp'); ?></p>
            </article>

            <article class="rounded-[28px] border border-[#D8CEC6] bg-white p-6 shadow-[0_12px_30px_rgba(47,42,40,0.06)] sm:p-8 lg:p-10">
                <h2 class="font-serif text-3xl leading-tight text-[#2F2A28] sm:text-4xl"><?php esc_html_e('08. Contact Us', 'dawp'); ?></h2>
                <p class="mt-5 text-base leading-8 text-[#6F625D]"><?php esc_html_e('For any privacy requests, questions, complaints, or clarifications regarding this Privacy Policy, please contact our dedicated support team using the verified business channels below:', 'dawp'); ?></p>
                <div class="mt-7 rounded-[24px] border border-[#D8CEC6] p-4 sm:p-5">
                    <dl class="grid gap-4 md:grid-cols-2">
                        <div class="rounded-[18px] border border-[#D8CEC6] bg-white p-5">
                            <dt class="text-sm font-bold text-[#2F2A28]"><?php esc_html_e('Store Name', 'dawp'); ?></dt>
                            <dd class="mt-3 text-sm leading-7 text-[#6F625D]"><?php esc_html_e('Myveganblog', 'dawp'); ?></dd>
                        </div>
                        <div class="rounded-[18px] border border-[#D8CEC6] bg-white p-5">
                            <dt class="text-sm font-bold text-[#2F2A28]"><?php esc_html_e('Customer Support Email', 'dawp'); ?></dt>
                            <dd class="mt-3 break-words text-sm leading-7 text-[#6F625D]"><a href="<?php echo esc_url('mailto:' . $support_email); ?>" class="transition-colors hover:text-[#C98A8A]"><?php echo esc_html($support_email); ?></a></dd>
                        </div>
                        <div class="rounded-[18px] border border-[#D8CEC6] bg-white p-5">
                            <dt class="text-sm font-bold text-[#2F2A28]"><?php esc_html_e('Physical Business Address', 'dawp'); ?></dt>
                            <dd class="mt-3 text-sm leading-7 text-[#6F625D]"><?php echo esc_html($store_address); ?></dd>
                        </div>
                        <div class="rounded-[18px] border border-[#D8CEC6] bg-white p-5">
                            <dt class="text-sm font-bold text-[#2F2A28]"><?php esc_html_e('Operating Hours', 'dawp'); ?></dt>
                            <dd class="mt-3 text-sm leading-7 text-[#6F625D]"><?php echo esc_html($business_hours); ?></dd>
                        </div>
                        <div class="rounded-[18px] border border-[#D8CEC6] bg-[#F8F3EC] p-5 md:col-span-2">
                            <dt class="text-sm font-bold text-[#2F2A28]"><?php esc_html_e('Need Privacy Support?', 'dawp'); ?></dt>
                            <dd class="mt-3 flex flex-col gap-4 text-sm leading-7 text-[#6F625D] sm:flex-row sm:items-center sm:justify-between">
                                <span><?php esc_html_e('Use our secure contact form for privacy requests, data questions, account concerns, or complaint follow-ups.', 'dawp'); ?></span>
                                <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-11 shrink-0 items-center justify-center rounded-full bg-[#2F2A28] px-6 py-3 text-sm font-bold text-white transition-colors hover:bg-[#C98A8A]">
                                    <?php esc_html_e('Contact Support', 'dawp'); ?>
                                </a>
                            </dd>
                        </div>
                    </dl>
                </div>
            </article>
        </div>
    </section>
</main>
