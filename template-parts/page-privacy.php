<?php
/**
 * Template Part: Privacy Policy Page
 */

$support_email = 'support@brogeshoes.com';
$business_address = dawp_get_woocommerce_store_address();
$business_hours = 'Monday - Friday, 9:00 AM - 5:00 PM EST';
?>

<section class="bg-surface py-16 md:py-24">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="text-center mb-14">
            <span class="text-accent font-medium tracking-widest uppercase text-sm mb-4 block"><?php esc_html_e('Privacy Policy', 'dawp'); ?></span>
            <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl text-foreground font-bold mb-6 tracking-tight"><?php esc_html_e('Privacy Policy', 'dawp'); ?></h1>
            <p class="text-foreground-muted text-lg max-w-3xl mx-auto leading-relaxed">
                <?php esc_html_e('This Privacy Policy explains how Broge Shoes collects, uses, shares, protects, and retains personal information when you visit brogeshoes.com, create an account, contact us, or place an order.', 'dawp'); ?>
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
                        <p class="text-foreground-muted mt-2"><?php esc_html_e('Broge Shoes operates brogeshoes.com and serves customers in the United States.', 'dawp'); ?></p>
                    </div>
                </div>
                <div class="text-foreground-muted leading-relaxed space-y-4">
                    <p><?php esc_html_e('Broge Shoes ("we", "us", or "our") operates the Site and specializes in selling premium men\'s formal shoes, leather dress shoes, and brogue shoes to consumers in the United States.', 'dawp'); ?></p>
                    <p><?php esc_html_e('By using our Site or placing an order, you agree to the collection and use of information in accordance with this policy.', 'dawp'); ?></p>
                </div>
            </div>

            <div id="information-we-collect" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('1. Information We Collect', 'dawp'); ?></h2>
                <p class="text-foreground-muted leading-relaxed mb-6"><?php esc_html_e('We collect only the information reasonably needed to operate our ecommerce store, process your purchases, and provide support.', 'dawp'); ?></p>
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="bg-surface p-6 rounded-lg border border-border">
                        <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Order and Account Information', 'dawp'); ?></h3>
                        <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('When you make or attempt to make a purchase, we collect your full name, billing address, shipping address, email address, phone number, product selections including shoe sizes and color options, and necessary payment details.', 'dawp'); ?></p>
                    </div>
                    <div class="bg-surface p-6 rounded-lg border border-border">
                        <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Device and Site Information', 'dawp'); ?></h3>
                        <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('When you browse our Site, we automatically collect technical data such as your IP address, browser type, device type, pages viewed, referring URLs, approximate geographic location, and cookie identifiers to maintain store security.', 'dawp'); ?></p>
                    </div>
                    <div class="bg-surface p-6 rounded-lg border border-border">
                        <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Customer Support Information', 'dawp'); ?></h3>
                        <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('If you contact us for size guidance or order issues, we collect your messages, order numbers, and any photos you provide, such as for damaged or incorrect item claims.', 'dawp'); ?></p>
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
                    <li class="flex gap-3"><span class="mt-2 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('Process payments, confirm orders, arrange shipping, and provide automated tracking updates.', 'dawp'); ?></span></li>
                    <li class="flex gap-3"><span class="mt-2 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('Respond to customer inquiries regarding product details, size fitment, shipping, returns, and refunds.', 'dawp'); ?></span></li>
                    <li class="flex gap-3"><span class="mt-2 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('Screen website activity and transactions for fraud, abuse, unauthorized access, or potential security risks.', 'dawp'); ?></span></li>
                    <li class="flex gap-3"><span class="mt-2 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('Comply with global tax, accounting, payment network rules, and applicable regulatory obligations.', 'dawp'); ?></span></li>
                </ul>
            </div>

            <div id="information-sharing" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('4. How We Share Information and Non-Sale of Data', 'dawp'); ?></h2>
                <div class="text-foreground-muted leading-relaxed space-y-4">
                    <p><?php esc_html_e('We do not sell, rent, or trade your personal information to third parties for their commercial marketing purposes.', 'dawp'); ?></p>
                    <p><?php esc_html_e('We only share data with trusted service providers essential to running our store, such as ecommerce platform hosting, payment processors, shipping carriers, fraud prevention tools, and customer support analytics.', 'dawp'); ?></p>
                    <p><?php esc_html_e('We may also disclose information if required to comply with applicable laws, respond to lawful subpoenas, or protect our legal rights and the safety of our customers.', 'dawp'); ?></p>
                </div>
            </div>

            <div id="cookies-choices" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('5. Cookies and Privacy Choices', 'dawp'); ?></h2>
                <div class="text-foreground-muted leading-relaxed space-y-4">
                    <p><?php esc_html_e('We use cookies, pixels, and tracking tags to keep your shopping cart working properly, remember your preferences, and evaluate store performance.', 'dawp'); ?></p>
                    <p><?php esc_html_e('You can disable cookies via your browser settings, though doing so may interfere with checkout and account functionality.', 'dawp'); ?></p>
                    <p><?php esc_html_e('Depending on your geographic location, including various U.S. state privacy laws, you may have the right to access, correct, delete, or receive a copy of the personal data we hold about you.', 'dawp'); ?></p>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <div id="childrens-privacy" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('6. Children\'s Privacy', 'dawp'); ?></h2>
                    <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Our website is intended strictly for general ecommerce use by adults and is not directed to children under 13. We do not knowingly collect personal information from children under the age of 13.', 'dawp'); ?></p>
                </div>

                <div id="governing-law" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('7. Governing Law', 'dawp'); ?></h2>
                    <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('This Privacy Policy and any separate agreements whereby we provide you services shall be governed by, and construed in accordance with, the laws of United States.', 'dawp'); ?></p>
                </div>
            </div>

            <div id="contact-us" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('8. Contact Us', 'dawp'); ?></h2>
                <p class="text-foreground-muted leading-relaxed mb-8"><?php esc_html_e('For privacy questions, data deletion requests, or order-related privacy inquiries, please contact Broge Shoes through our official channels:', 'dawp'); ?></p>
                <div class="grid sm:grid-cols-2 gap-4">
                    <div class="bg-surface p-6 rounded-lg border border-border">
                        <h3 class="text-foreground font-semibold mb-2"><?php esc_html_e('Brand Name', 'dawp'); ?></h3>
                        <p class="text-foreground-muted"><?php esc_html_e('Broge Shoes', 'dawp'); ?></p>
                    </div>
                    <div class="bg-surface p-6 rounded-lg border border-border">
                        <h3 class="text-foreground font-semibold mb-2"><?php esc_html_e('Customer Support Email', 'dawp'); ?></h3>
                        <a href="mailto:<?php echo esc_attr($support_email); ?>" class="text-accent hover:underline font-medium"><?php echo esc_html($support_email); ?></a>
                    </div>
                    <div class="bg-surface p-6 rounded-lg border border-border">
                        <h3 class="text-foreground font-semibold mb-2"><?php esc_html_e('Physical Business Address', 'dawp'); ?></h3>
                        <p class="text-foreground-muted"><?php echo esc_html($business_address); ?></p>
                    </div>
                    <div class="bg-surface p-6 rounded-lg border border-border">
                        <h3 class="text-foreground font-semibold mb-2"><?php esc_html_e('Business Hours', 'dawp'); ?></h3>
                        <p class="text-foreground-muted"><?php echo esc_html($business_hours); ?></p>
                    </div>
                    <div class="bg-surface p-6 rounded-lg border border-border sm:col-span-2">
                        <h3 class="text-foreground font-semibold mb-2"><?php esc_html_e('Website', 'dawp'); ?></h3>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="text-accent hover:underline font-medium"><?php esc_html_e('brogeshoes.com', 'dawp'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
