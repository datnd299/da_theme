<?php
/**
 * Template Part: Privacy Policy Page
 */

$store_name       = __('Broge Shoes', 'dawp');
$support_email    = 'support@brogeshoes.com';
$business_address = dawp_get_woocommerce_store_address();
$contact_url      = home_url('/contact-us/');
?>

<section class="bg-surface py-16 md:py-24">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="text-center mb-14">
            <span class="text-accent font-medium tracking-widest uppercase text-sm mb-4 block"><?php esc_html_e('Privacy Policy', 'dawp'); ?></span>
            <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl text-foreground font-bold mb-6 tracking-tight"><?php esc_html_e('Privacy Policy', 'dawp'); ?></h1>
            <p class="text-foreground-muted text-lg max-w-3xl mx-auto leading-relaxed">
                <?php esc_html_e('Broge Shoes respects your privacy and explains how we collect, use, store, share, and protect your information when you visit brogeshoes.com, shop for footwear, place an order, contact customer support, or interact with our online store.', 'dawp'); ?>
            </p>
            <p class="italic text-sm text-foreground-muted mt-4"><?php esc_html_e('Last Updated: May 26, 2026', 'dawp'); ?></p>
        </div>

        <div class="space-y-8">
            <div class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-8">
                    <div class="w-12 h-12 bg-accent-soft rounded-full flex items-center justify-center text-accent shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path></svg>
                    </div>
                    <div>
                        <h2 class="font-heading text-3xl text-foreground font-semibold"><?php esc_html_e('Policy Overview', 'dawp'); ?></h2>
                        <p class="text-foreground-muted mt-2"><?php esc_html_e('Broge Shoes operates brogeshoes.com and serves customers shopping for footwear in the United States.', 'dawp'); ?></p>
                    </div>
                </div>
                <div class="text-foreground-muted leading-relaxed space-y-4">
                    <p><?php esc_html_e('Broge Shoes ("we", "us", or "our") respects your privacy and is committed to protecting your personal data. This Privacy Policy explains how we handle information when you browse our Site, purchase footwear, request returns, or contact support.', 'dawp'); ?></p>
                    <p><?php esc_html_e('By using our Site or placing an order, you agree to the practices described in this Privacy Policy. If you do not agree with this policy, please do not use the website or submit personal information through it.', 'dawp'); ?></p>
                </div>
            </div>

            <div id="information-we-collect" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('1. Information We Collect', 'dawp'); ?></h2>
                <p class="text-foreground-muted leading-relaxed mb-6"><?php esc_html_e('To fulfill your footwear orders and provide a seamless shopping experience, we collect only the information reasonably needed to operate our ecommerce store, process purchases, and provide support.', 'dawp'); ?></p>
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="bg-surface p-6 rounded-lg border border-border">
                        <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Contact & Delivery Details', 'dawp'); ?></h3>
                        <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Full name, email address, shipping address, billing address, and product selections including shoe sizes, styles, quantities, order numbers, transaction status, return history, refund history, and customer support messages.', 'dawp'); ?></p>
                    </div>
                    <div class="bg-surface p-6 rounded-lg border border-border">
                        <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Payment Information', 'dawp'); ?></h3>
                        <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Payment-related details required to complete your purchase safely. Your full payment card details are securely handled directly by authorized third-party payment processors and are never stored on our servers.', 'dawp'); ?></p>
                    </div>
                    <div class="bg-surface p-6 rounded-lg border border-border">
                        <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Website Usage & Device Information', 'dawp'); ?></h3>
                        <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('IP address, browser type, device type, pages viewed, referral source, cart activity, and session timing to help us maintain store security and website performance.', 'dawp'); ?></p>
                    </div>
                </div>
            </div>

            <div id="payment-processing" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('2. Payment Processing & Secure Checkout', 'dawp'); ?></h2>
                <p class="text-foreground-muted leading-relaxed mb-6"><?php esc_html_e('Your shopping experience is fully protected on our Site.', 'dawp'); ?></p>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="bg-surface p-6 rounded-lg border border-border">
                        <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('SSL Encryption', 'dawp'); ?></h3>
                        <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Our website utilizes Secure Sockets Layer (SSL) encryption technology to secure all personal and financial data during transmission.', 'dawp'); ?></p>
                    </div>
                    <div class="bg-surface p-6 rounded-lg border border-border">
                        <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Payment Standards', 'dawp'); ?></h3>
                        <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('All payments are handled securely through verified, PCI-DSS compliant third-party payment providers. We do not store or have access to your full credit card numbers or financial credentials on our servers.', 'dawp'); ?></p>
                    </div>
                </div>
            </div>

            <div id="how-we-use-information" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('3. How We Use Your Information', 'dawp'); ?></h2>
                <p class="text-foreground-muted leading-relaxed mb-6"><?php esc_html_e('We utilize your data for clear and transparent business purposes, including to:', 'dawp'); ?></p>
                <ul class="space-y-4 text-foreground-muted">
                    <li class="flex gap-3"><span class="mt-2 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('Process, confirm, fulfill, ship, track, deliver, and manage eligible returns or refunds for your footwear orders.', 'dawp'); ?></span></li>
                    <li class="flex gap-3"><span class="mt-2 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('Process payments securely through third-party payment processors and prevent chargebacks or payment fraud.', 'dawp'); ?></span></li>
                    <li class="flex gap-3"><span class="mt-2 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('Send order confirmations, tracking updates, return instructions, and important store or policy updates.', 'dawp'); ?></span></li>
                    <li class="flex gap-3"><span class="mt-2 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('Provide customer support, respond to product or sizing questions, and investigate delivery issues.', 'dawp'); ?></span></li>
                    <li class="flex gap-3"><span class="mt-2 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('Send product updates and footwear category news if you subscribe to marketing emails. You may unsubscribe from promotional emails at any time through the unsubscribe link.', 'dawp'); ?></span></li>
                </ul>
            </div>

            <div id="information-sharing" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('4. How We Share Information and Non-Sale of Data', 'dawp'); ?></h2>
                <div class="text-foreground-muted leading-relaxed space-y-4">
                    <p><?php esc_html_e('We do not sell, rent, or trade your personal information to third parties for their commercial marketing purposes.', 'dawp'); ?></p>
                    <p><?php esc_html_e('We only share necessary information with trusted service providers who help operate our store, including payment processors and fraud prevention vendors, shipping carriers and fulfillment partners, website hosting, analytics, and infrastructure providers.', 'dawp'); ?></p>
                    <p><?php esc_html_e('We may also disclose information to legal authorities or professional advisers when strictly required by law, legal process, fraud investigation, or to protect the safety and rights of Broge Shoes and our customers.', 'dawp'); ?></p>
                </div>
            </div>

            <div id="cookies-choices" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('5. Cookies and Privacy Choices', 'dawp'); ?></h2>
                <div class="text-foreground-muted leading-relaxed space-y-4">
                    <p><?php esc_html_e('Our website uses cookies and similar technologies to remember your preferences, keep items in your shopping cart, secure checkout, and understand website traffic patterns to improve site performance.', 'dawp'); ?></p>
                    <p><?php esc_html_e('You can control or disable cookies through your web browser settings. Certain features, including cart, checkout, and account login functions, may not work properly if cookies are disabled.', 'dawp'); ?></p>
                    <p><?php esc_html_e('Depending on your geographic location, such as under the CCPA/CPRA in the U.S. or GDPR in Europe, you may have rights to access, correct, delete, port, or limit certain uses of your personal information.', 'dawp'); ?></p>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <div id="childrens-privacy" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('6. Children\'s Privacy', 'dawp'); ?></h2>
                    <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Our website is intended strictly for general ecommerce use by adults and is not directed to children under 13. We do not knowingly collect personal information from children under the age of 13.', 'dawp'); ?></p>
                </div>

                <div id="governing-law" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('7. Governing Law', 'dawp'); ?></h2>
                    <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('This Privacy Policy and any separate agreements whereby we provide you services shall be governed by, and construed in accordance with, the laws of the United States, where applicable to Broge Shoes and its customers.', 'dawp'); ?></p>
                </div>
            </div>

            <div id="contact-us" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                <div class="grid lg:grid-cols-[minmax(0,1fr)_minmax(320px,420px)] gap-8 lg:gap-12 items-start">
                    <div>
                        <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('8. Contact Us', 'dawp'); ?></h2>
                        <p class="text-foreground-muted leading-relaxed mb-8"><?php esc_html_e('For privacy questions, data access requests, or questions regarding our information practices, please contact Broge Shoes through our official support channels.', 'dawp'); ?></p>
                        <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-accent px-7 text-sm font-bold text-white transition hover:bg-accent-hover">
                            <?php esc_html_e('Open Contact Page', 'dawp'); ?>
                        </a>
                    </div>
                    <dl class="bg-surface rounded-lg border border-border divide-y divide-border overflow-hidden">
                        <div class="p-5">
                            <dt class="text-sm font-semibold text-foreground"><?php esc_html_e('Brand Name', 'dawp'); ?></dt>
                            <dd class="text-foreground-muted mt-1"><?php echo esc_html($store_name); ?></dd>
                        </div>
                        <div class="p-5">
                            <dt class="text-sm font-semibold text-foreground"><?php esc_html_e('Customer Support Email', 'dawp'); ?></dt>
                            <dd class="mt-1">
                                <a href="mailto:<?php echo esc_attr($support_email); ?>" class="text-accent hover:underline font-medium break-words"><?php echo esc_html($support_email); ?></a>
                            </dd>
                        </div>
                        <div class="p-5">
                            <dt class="text-sm font-semibold text-foreground"><?php esc_html_e('Physical Business Address', 'dawp'); ?></dt>
                            <dd class="text-foreground-muted mt-1"><?php echo esc_html($business_address); ?></dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</section>
