<?php
/**
 * Template Name: Privacy Policy
 * Template Part: page-privacy
 *
 * @package dawp
 */

$store_name    = 'House of Shoes Online';
$support_email = 'support@houseofshoesonline.com';
$address       = dawp_get_store_address();
$contact_url   = 'https://houseofshoesonline.com/contact-us/';
$shop_url      = 'https://houseofshoesonline.com/shop/';
?>

<main id="primary" class="bg-[#F6F5F7] text-[#141217]">
    <section class="relative overflow-hidden bg-[#FFF7FB] text-[#141217]">
        <div class="absolute left-0 top-0 h-1 w-full bg-[linear-gradient(90deg,#E6007E,#FF4FB8,#7C3AED)]"></div>
        <div class="absolute inset-y-0 right-0 hidden w-[42%] bg-[linear-gradient(135deg,#F3E8FF_0%,#F4DDE8_100%)] lg:block"></div>

        <div class="relative mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:items-center lg:px-8 lg:py-24">
            <div class="max-w-3xl">
                <p class="mb-5 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]">
                    <?php esc_html_e('Privacy & Data Care', 'dawp'); ?>
                </p>
                <h1 class="font-heading text-5xl font-black leading-[0.94] text-[#141217] sm:text-6xl lg:text-7xl">
                    <?php esc_html_e('Privacy Policy', 'dawp'); ?>
                </h1>
                <p class="mt-6 max-w-2xl text-lg leading-8 text-[#5E5363]">
                    <?php esc_html_e('House of Shoes Online respects your privacy and explains clearly how customer information is collected, used, protected, and shared when you shop with us.', 'dawp'); ?>
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

            <div class="-mx-4 flex snap-x snap-mandatory gap-4 overflow-x-auto px-4 pb-4 sm:mx-0 sm:grid sm:grid-cols-2 sm:overflow-visible sm:px-0 sm:pb-0">
                <?php
                $privacy_cards = [
                    ['number' => '01', 'title' => __('Order Data', 'dawp'), 'copy' => __('We collect only the information needed to process footwear orders and support requests.', 'dawp')],
                    ['number' => '02', 'title' => __('Secure Checkout', 'dawp'), 'copy' => __('Payments are handled through authorized third-party processors with secure standards.', 'dawp')],
                    ['number' => '03', 'title' => __('No Data Sale', 'dawp'), 'copy' => __('We do not sell, rent, or trade personal information for commercial marketing.', 'dawp')],
                    ['number' => '04', 'title' => __('Customer Rights', 'dawp'), 'copy' => __('You may request access, correction, deletion, or limits on certain personal data uses.', 'dawp')],
                ];

                foreach ($privacy_cards as $card) :
                    ?>
                    <div class="min-w-[82%] snap-start rounded-[1.5rem] border border-[#EEE5EF] bg-white p-6 shadow-sm shadow-[#141217]/5 sm:min-w-0">
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
                        <?php esc_html_e('Privacy Overview', 'dawp'); ?>
                    </p>
                    <h2 class="font-heading text-4xl font-black leading-tight">
                        <?php esc_html_e('Your data, handled clearly.', 'dawp'); ?>
                    </h2>
                    <p class="mt-5 text-sm leading-7 text-white/78">
                        <?php esc_html_e('This policy covers website browsing, footwear shopping, checkout, order delivery, returns, and customer support interactions.', 'dawp'); ?>
                    </p>
                    <nav class="mt-7 grid gap-3 text-sm font-black uppercase tracking-wide text-white/78" aria-label="<?php esc_attr_e('Privacy navigation', 'dawp'); ?>">
                        <a href="#introduction" class="rounded-2xl border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-white"><?php esc_html_e('Introduction', 'dawp'); ?></a>
                        <a href="#information" class="rounded-2xl border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-white"><?php esc_html_e('Information We Collect', 'dawp'); ?></a>
                        <a href="#use" class="rounded-2xl border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-white"><?php esc_html_e('How We Use Data', 'dawp'); ?></a>
                        <a href="#cookies" class="rounded-2xl border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-white"><?php esc_html_e('Cookies', 'dawp'); ?></a>
                        <a href="#security" class="rounded-2xl border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-white"><?php esc_html_e('Security', 'dawp'); ?></a>
                        <a href="#sharing" class="rounded-2xl border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-white"><?php esc_html_e('Data Sharing', 'dawp'); ?></a>
                        <a href="#rights" class="rounded-2xl border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-white"><?php esc_html_e('Privacy Rights', 'dawp'); ?></a>
                        <a href="#contact" class="rounded-2xl border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-white"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
                    </nav>
                </div>
            </aside>

            <div class="min-w-0 space-y-8">
                <section id="introduction" class="rounded-[2rem] border border-[#EEE5EF] bg-white p-7 shadow-sm shadow-[#141217]/5 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]"><?php esc_html_e('Introduction', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]"><?php esc_html_e('How This Policy Applies', 'dawp'); ?></h2>
                    <div class="mt-6 space-y-5 text-base leading-8 text-[#6F625D]">
                        <p><?php esc_html_e('House of Shoes Online ("we", "us", or "our") respects your privacy and is committed to protecting your personal data. This Privacy Policy explains how we collect, use, store, share, and protect your information when you visit houseofshoesonline.com, shop for footwear, place an order, contact customer support, or interact with our online store.', 'dawp'); ?></p>
                        <p><?php esc_html_e('By using our website or placing an order, you agree to the practices described in this Privacy Policy. If you do not agree with this policy, please do not use the website or submit personal information through it.', 'dawp'); ?></p>
                    </div>
                </section>

                <section id="information" class="rounded-[2rem] border border-[#EEE5EF] bg-[#F6F5F7] p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]"><?php esc_html_e('Information We Collect', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]"><?php esc_html_e('Data Needed For Footwear Orders', 'dawp'); ?></h2>
                    <p class="mt-6 text-base leading-8 text-[#6F625D]"><?php esc_html_e('To fulfill your footwear orders and provide a seamless shopping experience, we collect the following types of personal information:', 'dawp'); ?></p>
                    <div class="mt-7 grid gap-4 sm:grid-cols-2">
                        <?php
                        $information_items = [
                            ['title' => __('Contact & Delivery Details', 'dawp'), 'copy' => __('Full name, email address, shipping address, and billing address.', 'dawp')],
                            ['title' => __('Footwear Order & Return Details', 'dawp'), 'copy' => __('Products purchased, shoe sizes, styles, quantities, order numbers, transaction status, return history, refund history, and customer support messages.', 'dawp')],
                            ['title' => __('Payment Information', 'dawp'), 'copy' => __('Payment-related details required to complete your purchase safely. Full payment card details are securely handled directly by authorized third-party payment processors and are never stored on our servers.', 'dawp')],
                            ['title' => __('Website Usage & Device Information', 'dawp'), 'copy' => __('IP address, browser type, device type, pages viewed, referral source, cart activity, and session timing to help us maintain website performance.', 'dawp')],
                        ];

                        foreach ($information_items as $item) :
                            ?>
                            <div class="rounded-[1.25rem] border border-[#EEE5EF] bg-white p-5 shadow-sm shadow-[#141217]/5">
                                <h3 class="font-black text-[#141217]"><?php echo esc_html($item['title']); ?></h3>
                                <p class="mt-3 text-sm leading-7 text-[#6F625D]"><?php echo esc_html($item['copy']); ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>

                <section id="use" class="rounded-[2rem] border border-[#EEE5EF] bg-white p-7 shadow-sm shadow-[#141217]/5 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]"><?php esc_html_e('How We Use Your Information', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]"><?php esc_html_e('Clear Store Purposes', 'dawp'); ?></h2>
                    <p class="mt-6 text-base leading-8 text-[#6F625D]"><?php esc_html_e('We use your personal data for transparent and legitimate business purposes connected to our online store, including to:', 'dawp'); ?></p>
                    <ul class="mt-7 space-y-4 text-base leading-7 text-[#6F625D]">
                        <li class="flex gap-4"><span class="mt-3 h-1.5 w-1.5 shrink-0 rounded-full bg-[#E6007E]"></span><?php esc_html_e('Process, confirm, fulfill, ship, track, deliver, and manage eligible returns or refunds for your footwear orders.', 'dawp'); ?></li>
                        <li class="flex gap-4"><span class="mt-3 h-1.5 w-1.5 shrink-0 rounded-full bg-[#E6007E]"></span><?php esc_html_e('Process payments securely through third-party payment processors and prevent chargebacks or payment fraud.', 'dawp'); ?></li>
                        <li class="flex gap-4"><span class="mt-3 h-1.5 w-1.5 shrink-0 rounded-full bg-[#E6007E]"></span><?php esc_html_e('Send order confirmations, tracking updates, return instructions, and important store or policy updates.', 'dawp'); ?></li>
                        <li class="flex gap-4"><span class="mt-3 h-1.5 w-1.5 shrink-0 rounded-full bg-[#E6007E]"></span><?php esc_html_e('Provide customer support, respond to product or sizing questions, and investigate delivery issues.', 'dawp'); ?></li>
                        <li class="flex gap-4"><span class="mt-3 h-1.5 w-1.5 shrink-0 rounded-full bg-[#E6007E]"></span><?php esc_html_e('Send product updates and footwear category news if you subscribe to marketing emails. You may unsubscribe at any time through the email unsubscribe link.', 'dawp'); ?></li>
                    </ul>
                </section>

                <section id="cookies" class="rounded-[2rem] border border-[#EEE5EF] bg-[#FFF7FB] p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#7C3AED]"><?php esc_html_e('Cookies And Tracking', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]"><?php esc_html_e('Essential Store Functionality', 'dawp'); ?></h2>
                    <div class="mt-6 space-y-5 text-base leading-8 text-[#6F625D]">
                        <p><?php esc_html_e('Our website uses cookies and similar technologies to support essential store functionality. These cookies help us remember your preferences, keep items in your shopping cart, secure checkout, and understand website traffic patterns to improve site performance.', 'dawp'); ?></p>
                        <p><?php esc_html_e('You can control or disable cookies through your web browser settings. Certain features, including cart, checkout, and account login functions, may not work properly if cookies are disabled.', 'dawp'); ?></p>
                    </div>
                </section>

                <section id="security" class="rounded-[2rem] border border-[#EEE5EF] bg-white p-7 shadow-sm shadow-[#141217]/5 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]"><?php esc_html_e('Secure Checkout & Data Security', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]"><?php esc_html_e('A Trustworthy Ecommerce Environment', 'dawp'); ?></h2>
                    <div class="mt-7 grid gap-4 sm:grid-cols-2">
                        <div class="rounded-[1.25rem] border border-[#EEE5EF] bg-[#F6F5F7] p-5">
                            <h3 class="font-black text-[#141217]"><?php esc_html_e('SSL Encryption', 'dawp'); ?></h3>
                            <p class="mt-3 text-sm leading-7 text-[#6F625D]"><?php esc_html_e('Our website uses Secure Sockets Layer (SSL) encryption technology (HTTPS) to safeguard personal data and financial credentials during transmission.', 'dawp'); ?></p>
                        </div>
                        <div class="rounded-[1.25rem] border border-[#EEE5EF] bg-[#F6F5F7] p-5">
                            <h3 class="font-black text-[#141217]"><?php esc_html_e('Secure Payment Standards', 'dawp'); ?></h3>
                            <p class="mt-3 text-sm leading-7 text-[#6F625D]"><?php esc_html_e('Payment gateways used by House of Shoes Online comply with the Payment Card Industry Data Security Standard (PCI-DSS).', 'dawp'); ?></p>
                        </div>
                    </div>
                    <p class="mt-6 text-base leading-8 text-[#6F625D]"><?php esc_html_e('While we use administrative, technical, and organizational safeguards to protect your data, no online transmission can be guaranteed 100% secure. We encourage you to protect your account credentials and contact us immediately if you suspect unauthorized activity.', 'dawp'); ?></p>
                </section>

                <section id="sharing" class="rounded-[2rem] border border-[#EEE5EF] bg-[#F6F5F7] p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]"><?php esc_html_e('Information Sharing And Non-Sale Of Data', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]"><?php esc_html_e('We Do Not Sell Customer Data', 'dawp'); ?></h2>
                    <p class="mt-6 text-base leading-8 text-[#6F625D]"><?php esc_html_e('We do not sell, rent, or trade your personal information to third parties for their commercial marketing purposes. We only share necessary information with trusted service providers who help operate our store:', 'dawp'); ?></p>
                    <ul class="mt-7 grid gap-3 text-sm leading-6 text-[#6F625D] sm:grid-cols-2">
                        <li class="flex gap-3"><span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-[#E6007E]"></span><?php esc_html_e('Payment processors and fraud prevention vendors to secure checkout.', 'dawp'); ?></li>
                        <li class="flex gap-3"><span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-[#E6007E]"></span><?php esc_html_e('Shipping carriers and fulfillment partners to deliver footwear and handle returns.', 'dawp'); ?></li>
                        <li class="flex gap-3"><span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-[#E6007E]"></span><?php esc_html_e('Website hosting, analytics, and infrastructure providers to keep the store operational and secure.', 'dawp'); ?></li>
                        <li class="flex gap-3"><span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-[#E6007E]"></span><?php esc_html_e('Legal authorities or professional advisers when required by law, legal process, fraud investigation, or safety and rights protection.', 'dawp'); ?></li>
                    </ul>
                </section>

                <section id="rights" class="rounded-[2rem] border border-[#EEE5EF] bg-white p-7 shadow-sm shadow-[#141217]/5 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]"><?php esc_html_e('Your Choices And Privacy Rights', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]"><?php esc_html_e('Access, Correction, Deletion, And Limits', 'dawp'); ?></h2>
                    <div class="mt-6 space-y-5 text-base leading-8 text-[#6F625D]">
                        <p><?php esc_html_e('Depending on your geographic location, such as under the CCPA/CPRA in the U.S. or GDPR in Europe, you may have rights to access, correct, delete, port, or limit certain uses of your personal information.', 'dawp'); ?></p>
                        <p><?php esc_html_e('Our website is intended for adult consumers and is not directed to children under 13. We do not knowingly collect personal information from children under the age of 13.', 'dawp'); ?></p>
                    </div>
                </section>

                <section id="governing-law" class="rounded-[2rem] border border-[#EEE5EF] bg-[#FFF7FB] p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#7C3AED]"><?php esc_html_e('Governing Law', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]"><?php esc_html_e('United States Privacy Policy Framework', 'dawp'); ?></h2>
                    <p class="mt-6 text-base leading-8 text-[#6F625D]"><?php esc_html_e('This Privacy Policy and any separate agreements whereby we provide services shall be governed by, and construed in accordance with, the laws of the United States, where applicable to House of Shoes Online and its customers.', 'dawp'); ?></p>
                </section>

                <section id="contact" class="relative min-w-0 overflow-hidden rounded-[2rem] bg-[linear-gradient(135deg,#141217_0%,#2A1538_100%)] p-7 text-white shadow-xl shadow-[#141217]/10 lg:p-10">
                    <div class="absolute left-0 top-0 h-1 w-full bg-[linear-gradient(90deg,#E6007E,#FF4FB8,#7C3AED)]"></div>
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#FF4FB8]"><?php esc_html_e('Contact Us', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-white"><?php esc_html_e('Privacy questions go through support.', 'dawp'); ?></h2>
                    <p class="mt-5 max-w-2xl text-base leading-8 text-white/78"><?php esc_html_e('For privacy questions, data access requests, or questions regarding our information practices, please contact House of Shoes Online through our official support channels.', 'dawp'); ?></p>

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
