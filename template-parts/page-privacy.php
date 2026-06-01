<?php
/**
 * Template Name: Privacy Policy
 * Template Part: page-privacy
 *
 * @package dawp
 */

$support_email = 'support@houseofshoesonline.com';
$contact_url   = home_url('/contact-us/');
$terms_url     = home_url('/terms-conditions/');
?>

<main id="primary" class="bg-white text-[#141217]">
    <section class="relative overflow-hidden bg-[#FFF7FB] text-[#141217]">
        <div class="absolute left-0 top-0 h-1 w-full bg-[linear-gradient(90deg,#E6007E,#FF4FB8,#7C3AED)]"></div>
        <div class="absolute inset-y-0 right-0 hidden w-[46%] bg-[linear-gradient(135deg,#F3E8FF_0%,#F4DDE8_100%)] lg:block"></div>

        <div class="relative mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[0.92fr_1.08fr] lg:items-center lg:px-8 lg:py-24">
            <div class="max-w-3xl">
                <p class="mb-5 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]">
                    <?php esc_html_e('Customer Privacy', 'dawp'); ?>
                </p>
                <h1 class="font-heading text-5xl font-black leading-[0.94] text-[#141217] sm:text-6xl lg:text-7xl">
                    <?php esc_html_e('Privacy Policy', 'dawp'); ?>
                </h1>
                <p class="mt-6 max-w-2xl text-lg leading-8 text-[#5E5363]">
                    <?php esc_html_e('Learn how House of Shoes Online collects, uses, and protects customer information when you browse footwear, place orders, request support, or use our website.', 'dawp'); ?>
                </p>
                <p class="mt-5 text-sm font-black uppercase tracking-[0.18em] text-[#7C3AED]">
                    <?php esc_html_e('Last updated: May 22, 2026', 'dawp'); ?>
                </p>
                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#E6007E] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#7C3AED]">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>
                    <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#E6007E] bg-white px-7 text-sm font-black uppercase tracking-wide text-[#E6007E] transition hover:bg-[#F3E8FF]">
                        <?php esc_html_e('Email Privacy Team', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <div class="-mx-4 flex snap-x snap-mandatory gap-4 overflow-x-auto px-4 pb-4 sm:mx-0 sm:grid sm:grid-cols-2 sm:overflow-visible sm:px-0 sm:pb-0">
                <?php
                $privacy_cards = [
                    ['number' => '01', 'title' => __('Order Data', 'dawp'), 'copy' => __('We collect the details needed to process footwear orders and provide customer care.', 'dawp')],
                    ['number' => '02', 'title' => __('Secure Checkout', 'dawp'), 'copy' => __('Payment details are handled through secure ecommerce and payment systems.', 'dawp')],
                    ['number' => '03', 'title' => __('No Data Selling', 'dawp'), 'copy' => __('We do not sell customer personal information to unrelated third parties.', 'dawp')],
                    ['number' => '04', 'title' => __('Clear Requests', 'dawp'), 'copy' => __('Customers may contact us with privacy questions or information requests.', 'dawp')],
                ];
                foreach ($privacy_cards as $card) :
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
                        <?php esc_html_e('Policy Sections', 'dawp'); ?>
                    </p>
                    <h2 class="font-heading text-4xl font-black leading-tight">
                        <?php esc_html_e('Privacy made clear.', 'dawp'); ?>
                    </h2>
                    <p class="mt-5 text-sm leading-7 text-white/78">
                        <?php esc_html_e('This page explains what information we collect, why we use it, when it may be shared, and how you can contact us.', 'dawp'); ?>
                    </p>
                    <nav class="mt-7 grid gap-3 text-sm font-black uppercase tracking-wide text-white/78" aria-label="<?php esc_attr_e('Privacy policy navigation', 'dawp'); ?>">
                        <a href="#information" class="rounded-2xl border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-white"><?php esc_html_e('Information We Collect', 'dawp'); ?></a>
                        <a href="#usage" class="rounded-2xl border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-white"><?php esc_html_e('How We Use It', 'dawp'); ?></a>
                        <a href="#cookies" class="rounded-2xl border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-white"><?php esc_html_e('Cookies', 'dawp'); ?></a>
                        <a href="#sharing" class="rounded-2xl border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-white"><?php esc_html_e('Sharing', 'dawp'); ?></a>
                        <a href="#security" class="rounded-2xl border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-white"><?php esc_html_e('Security', 'dawp'); ?></a>
                        <a href="#rights" class="rounded-2xl border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-white"><?php esc_html_e('Your Choices', 'dawp'); ?></a>
                        <a href="#contact" class="rounded-2xl border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-white"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
                    </nav>
                </div>
            </aside>

            <div class="space-y-8">
                <section class="rounded-[2rem] border border-[#EEE5EF] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]"><?php esc_html_e('Overview', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]"><?php esc_html_e('Our Commitment To Privacy', 'dawp'); ?></h2>
                    <div class="mt-6 space-y-5 text-base leading-8 text-[#6F625D]">
                        <p><?php esc_html_e('House of Shoes Online respects your privacy. This Privacy Policy explains how we collect, use, store, and protect information when you visit our website, shop for shoes, place an order, contact support, or interact with our online store.', 'dawp'); ?></p>
                        <p><?php esc_html_e('By using our website, you agree to the practices described in this Privacy Policy. We may update this page from time to time to reflect store updates, technology changes, or legal requirements.', 'dawp'); ?></p>
                    </div>
                </section>

                <section id="information" class="rounded-[2rem] border border-[#EEE5EF] bg-[#F6F5F7] p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]"><?php esc_html_e('Information We Collect', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]"><?php esc_html_e('Customer, Order, And Website Information', 'dawp'); ?></h2>
                    <div class="mt-6 space-y-5 text-base leading-8 text-[#6F625D]">
                        <p><?php esc_html_e('When you place an order or contact us, we may collect information needed to complete your purchase and provide support. This may include your name, email address, phone number, shipping address, billing address, order details, payment confirmation status, and communication history.', 'dawp'); ?></p>
                        <p><?php esc_html_e('We may also collect basic technical information such as browser type, device type, IP address, pages viewed, referral source, cart activity, and site usage data to help us maintain website performance and improve the shopping experience.', 'dawp'); ?></p>
                    </div>
                    <ul class="mt-8 grid gap-3 text-sm leading-6 text-[#6F625D] sm:grid-cols-2">
                        <li class="flex gap-3"><span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-[#E6007E]"></span><?php esc_html_e('Contact and delivery details', 'dawp'); ?></li>
                        <li class="flex gap-3"><span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-[#E6007E]"></span><?php esc_html_e('Footwear order and return details', 'dawp'); ?></li>
                        <li class="flex gap-3"><span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-[#E6007E]"></span><?php esc_html_e('Customer support messages', 'dawp'); ?></li>
                        <li class="flex gap-3"><span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-[#E6007E]"></span><?php esc_html_e('Website usage and device information', 'dawp'); ?></li>
                    </ul>
                </section>

                <section id="usage" class="rounded-[2rem] border border-[#EEE5EF] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]"><?php esc_html_e('How We Use Information', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]"><?php esc_html_e('How Information Helps Us Serve Customers', 'dawp'); ?></h2>
                    <div class="mt-6 space-y-5 text-base leading-8 text-[#6F625D]">
                        <p><?php esc_html_e('We use information to process orders, confirm payments, arrange shipping, send tracking updates, provide customer support, manage eligible returns, prevent fraud, improve our website, and communicate important store updates.', 'dawp'); ?></p>
                        <p><?php esc_html_e('If you subscribe to marketing emails, we may send product updates, footwear category news, and promotional messages. You may unsubscribe from promotional email communication at any time.', 'dawp'); ?></p>
                    </div>
                </section>

                <section id="cookies" class="rounded-[2rem] border border-[#EEE5EF] bg-[#FFF7FB] p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#7C3AED]"><?php esc_html_e('Cookies And Tracking', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]"><?php esc_html_e('Cookies Support Store Functionality', 'dawp'); ?></h2>
                    <div class="mt-6 space-y-5 text-base leading-8 text-[#6F625D]">
                        <p><?php esc_html_e('Our website may use cookies and similar technologies to remember preferences, keep items in your cart, support checkout, understand traffic patterns, and improve site performance.', 'dawp'); ?></p>
                        <p><?php esc_html_e('You can control or disable cookies through your browser settings. Some cart, checkout, account, or preference features may not work properly if cookies are disabled.', 'dawp'); ?></p>
                    </div>
                </section>

                <section id="sharing" class="rounded-[2rem] border border-[#EEE5EF] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]"><?php esc_html_e('Information Sharing', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]"><?php esc_html_e('When Information May Be Shared', 'dawp'); ?></h2>
                    <div class="mt-6 space-y-5 text-base leading-8 text-[#6F625D]">
                        <p><?php esc_html_e('We may share necessary information with trusted service providers who help operate our store, process payments, fulfill orders, ship footwear, provide analytics, send emails, or support customer service.', 'dawp'); ?></p>
                        <p><?php esc_html_e('These providers receive only the information needed to perform their services. We do not sell customer personal information to unrelated third parties.', 'dawp'); ?></p>
                        <p><?php esc_html_e('We may also disclose information when required by law, legal process, fraud prevention, or to protect the rights, safety, and security of House of Shoes Online, our customers, or others.', 'dawp'); ?></p>
                    </div>
                </section>

                <section id="security" class="rounded-[2rem] border border-[#EEE5EF] bg-[#F6F5F7] p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]"><?php esc_html_e('Security', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]"><?php esc_html_e('Protecting Customer Information', 'dawp'); ?></h2>
                    <div class="mt-6 space-y-5 text-base leading-8 text-[#6F625D]">
                        <p><?php esc_html_e('We use reasonable administrative, technical, and organizational measures to help protect customer information from unauthorized access, misuse, loss, or disclosure.', 'dawp'); ?></p>
                        <p><?php esc_html_e('No online system can be guaranteed completely secure, but we work to maintain a trustworthy ecommerce environment for customers shopping with us.', 'dawp'); ?></p>
                    </div>
                </section>

                <section id="rights" class="rounded-[2rem] border border-[#EEE5EF] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]"><?php esc_html_e('Your Choices', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]"><?php esc_html_e('Access, Update, Or Request Help', 'dawp'); ?></h2>
                    <div class="mt-6 space-y-5 text-base leading-8 text-[#6F625D]">
                        <p><?php esc_html_e('You may contact us to request help with personal information, update order contact details, ask privacy questions, or request that we review information associated with your customer account or order.', 'dawp'); ?></p>
                        <p><?php esc_html_e('Depending on your location, you may have rights to access, correct, delete, or limit certain uses of your personal information. We will review requests according to applicable law.', 'dawp'); ?></p>
                    </div>
                </section>

                <section class="rounded-[2rem] border border-[#EEE5EF] bg-[#FFF7FB] p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#7C3AED]"><?php esc_html_e('Policy Updates', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]"><?php esc_html_e('Changes To This Privacy Policy', 'dawp'); ?></h2>
                    <p class="mt-6 text-base leading-8 text-[#6F625D]"><?php esc_html_e('We may update this Privacy Policy from time to time. Updates will be posted on this page, and continued website use means you accept the revised policy.', 'dawp'); ?></p>
                </section>

                <section id="contact" class="relative overflow-hidden rounded-[2rem] bg-[linear-gradient(135deg,#141217_0%,#2A1538_100%)] p-7 text-white shadow-xl shadow-[#141217]/10 lg:p-10">
                    <div class="absolute left-0 top-0 h-1 w-full bg-[linear-gradient(90deg,#E6007E,#FF4FB8,#7C3AED)]"></div>
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#FF4FB8]"><?php esc_html_e('Privacy Questions?', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-white"><?php esc_html_e('We keep support clear.', 'dawp'); ?></h2>
                    <p class="mt-5 max-w-2xl text-base leading-8 text-white/78"><?php esc_html_e('If you have questions about this Privacy Policy or how your information is handled, contact our support team.', 'dawp'); ?></p>
                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#E6007E] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#FF4FB8]"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
                        <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-white/25 px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-[#141217]"><?php echo esc_html($support_email); ?></a>
                        <a href="<?php echo esc_url($terms_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-white/25 px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-[#141217]"><?php esc_html_e('View Terms', 'dawp'); ?></a>
                    </div>
                </section>
            </div>
        </div>
    </section>
</main>
