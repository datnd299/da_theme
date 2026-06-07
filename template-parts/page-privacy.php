<?php
/**
 * Template Part: Privacy Policy
 */

$store_name      = 'Shop Kelli Boutique';
$support_email   = 'support@shopkelli.com';
$mailing_address = dawp_get_woocommerce_store_address();
?>

<main class="sk-policy-page bg-surface">
    <section class="sk-policy-hero">
        <div class="container mx-auto max-w-6xl px-4">
            <div class="sk-policy-hero__inner text-center">
            <span class="mb-4 block text-sm font-bold uppercase tracking-widest text-accent"><?php esc_html_e('Privacy & Security', 'dawp'); ?></span>
            <h1 class="font-heading text-4xl font-bold tracking-tight text-foreground md:text-5xl lg:text-6xl"><?php esc_html_e('Privacy Policy', 'dawp'); ?></h1>
            <p class="mt-5 text-sm font-bold uppercase tracking-widest text-foreground"><?php esc_html_e('Last Updated: May 30, 2026', 'dawp'); ?></p>
            <div class="sk-policy-hero__copy mx-auto mt-6 max-w-4xl space-y-5 text-lg leading-relaxed text-foreground-muted">
                <p><?php esc_html_e('At Shop Kelli, your privacy and the security of your personal data are our utmost priorities. This Privacy Policy describes how your personal information is collected, used, protected, and shared when you visit, browse, or make a purchase from shopkelli.com (the "Site").', 'dawp'); ?></p>
                <p><?php esc_html_e('By accessing our Site or utilizing our boutique services, you acknowledge and agree to the data management practices outlined in this policy.', 'dawp'); ?></p>
            </div>
            </div>
        </div>
    </section>

    <section class="sk-policy-body">
    <div class="container mx-auto max-w-6xl px-4">
        <div class="space-y-8">
            <section class="rounded-3xl border border-border bg-background p-8 shadow-card md:p-10">
                <h2 class="font-heading text-3xl font-semibold text-foreground md:text-4xl"><?php esc_html_e('1. Information We Collect', 'dawp'); ?></h2>
                <p class="mt-5 leading-relaxed text-foreground-muted">
                    <?php esc_html_e('To fulfill your boutique orders and optimize your user experience, we collect two primary types of data:', 'dawp'); ?>
                </p>
                <div class="mt-6 grid gap-4 md:grid-cols-2">
                    <div class="rounded-2xl border border-border bg-background p-5">
                        <h3 class="text-lg font-medium leading-snug text-foreground"><?php esc_html_e('A. Order Information', 'dawp'); ?></h3>
                        <p class="mt-5 leading-relaxed text-foreground-muted">
                            <?php esc_html_e('When you make a purchase or attempt to place an order through the Site, we collect certain essential billing and routing details from you, including your name, billing address, shipping address, payment details (including encrypted credit card tokens), email address, and phone number. We refer to this safely handled data as "Order Information."', 'dawp'); ?>
                        </p>
                    </div>
                    <div class="rounded-2xl border border-border bg-background p-5">
                        <h3 class="text-lg font-medium leading-snug text-foreground"><?php esc_html_e('B. Device Information', 'dawp'); ?></h3>
                        <p class="mt-5 leading-relaxed text-foreground-muted">
                            <?php esc_html_e('When you browse the Site, we automatically gather structural technical details regarding your local device, including information about your web browser, active IP address, local time zone, and specific tracking cookies that are pre-installed on your device. We refer to this automatically-logged data as "Device Information."', 'dawp'); ?>
                        </p>
                    </div>
                </div>
            </section>

            <section class="rounded-3xl border border-border bg-background p-8 shadow-card md:p-10">
                <h2 class="font-heading text-3xl font-semibold text-foreground md:text-4xl"><?php esc_html_e('2. Secure Payment Processing & Data Encryption (GMC MANDATORY)', 'dawp'); ?></h2>
                <div class="mt-5 space-y-5 leading-relaxed text-foreground-muted">
                    <p><?php esc_html_e('Your commercial transaction data is fully guarded. Shop Kelli does not store, harvest, or retain your raw credit card numbers on our local storefront servers.', 'dawp'); ?></p>
                    <p><?php esc_html_e('Because our online store operates via WooCommerce, all payment interactions are seamlessly redirected to, and processed by, certified third-party payment gateways. All data transmissions during checkout are protected utilizing industry-standard SSL (Secure Sockets Layer) encryption technology and strictly comply with the Payment Card Industry Data Security Standard (PCI-DSS).', 'dawp'); ?></p>
                </div>
            </section>

            <section class="rounded-3xl border border-border bg-background p-8 shadow-card md:p-10">
                <h2 class="font-heading text-3xl font-semibold text-foreground md:text-4xl"><?php esc_html_e('3. How We Use Your Personal Information', 'dawp'); ?></h2>
                <p class="mt-5 leading-relaxed text-foreground-muted">
                    <?php esc_html_e('We process your collected data based on legitimate business operations to:', 'dawp'); ?>
                </p>
                <ul class="mt-6 list-disc space-y-4 pl-5 leading-relaxed text-foreground-muted">
                    <li><?php esc_html_e('Fulfill and build any orders placed through the Site (including processing secure payments, coordinating domestic shipping, and rendering invoices/order confirmations).', 'dawp'); ?></li>
                    <li><?php esc_html_e('Communicate with you directly regarding your order status.', 'dawp'); ?></li>
                    <li><?php esc_html_e('Screen our transaction logs for potential financial risk, system vulnerabilities, or identity fraud.', 'dawp'); ?></li>
                    <li><?php esc_html_e('Provide you with curated marketing insights, seasonal boutique lookbooks, or promotional advertising relating to our products, strictly in line with the communication preferences you have shared with us.', 'dawp'); ?></li>
                </ul>
            </section>

            <section class="rounded-3xl border border-border bg-background p-8 shadow-card md:p-10">
                <h2 class="font-heading text-3xl font-semibold text-foreground md:text-4xl"><?php esc_html_e('4. Sharing Your Personal Information', 'dawp'); ?></h2>
                <p class="mt-5 leading-relaxed text-foreground-muted">
                    <?php esc_html_e('We share your Personal Information with trusted third-party operational service providers to help us facilitate our storefront, as described above:', 'dawp'); ?>
                </p>
                <ul class="mt-6 list-disc space-y-4 pl-5 leading-relaxed text-foreground-muted">
                    <li><?php esc_html_e('E-commerce Infrastructure: We use WooCommerce to power our online storefront and catalog ecosystem.', 'dawp'); ?></li>
                    <li><?php esc_html_e('Behavioral Analytics: We utilize Google Analytics to analyze aggregate customer movement, traffic sources, and site health metrics.', 'dawp'); ?></li>
                    <li><?php esc_html_e("Legal & Regulatory Mandates: Finally, we may disclose your personal files to comply with applicable state and federal laws, to respond to a lawful subpoena, search warrant, or official request for information, or to protect our brand's safety and property rights.", 'dawp'); ?></li>
                </ul>
            </section>

            <section class="rounded-3xl border border-border bg-background p-8 shadow-card md:p-10">
                <h2 class="font-heading text-3xl font-semibold text-foreground md:text-4xl"><?php esc_html_e('5. Cookies & Behavioral Advertising Opt-Out', 'dawp'); ?></h2>
                <div class="mt-5 space-y-5 leading-relaxed text-foreground-muted">
                    <p><?php esc_html_e('We utilize functional cookies (small data files deposited on your computer containing a unique, anonymous identifier) to enhance your browsing experience, remember shopping cart additions, and maintain secure user sessions.', 'dawp'); ?></p>
                    <p>
                        <?php esc_html_e('For exhaustive educational resources regarding cookies and configuration controls, you may visit', 'dawp'); ?>
                        <a href="https://www.allaboutcookies.org/" target="_blank" rel="noopener noreferrer" class="font-bold text-foreground transition-colors hover:text-accent"><?php esc_html_e('All About Cookies', 'dawp'); ?></a>.
                    </p>
                    <p>
                        <?php esc_html_e('To opt-out of targeted Google tracking used for behavioral marketing, you can manage your preferences directly via the', 'dawp'); ?>
                        <a href="https://adssettings.google.com/" target="_blank" rel="noopener noreferrer" class="font-bold text-foreground transition-colors hover:text-accent"><?php esc_html_e('Google Ads Settings Page', 'dawp'); ?></a>.
                    </p>
                </div>
            </section>

            <section class="rounded-3xl border border-border bg-background p-8 shadow-card md:p-10">
                <h2 class="font-heading text-3xl font-semibold text-foreground md:text-4xl"><?php esc_html_e('6. Your Rights Under Global and US Privacy Laws (CCPA/GDPR)', 'dawp'); ?></h2>
                <div class="mt-5 space-y-5 leading-relaxed text-foreground-muted">
                    <p><?php esc_html_e('If you are a resident of certain protected territories (including California or the European Union), you possess explicit legal rights to access the specific personal data we hold about you, to request that inaccurate information be corrected, updated, or permanently deleted.', 'dawp'); ?></p>
                    <p><?php esc_html_e('If you would like to actively exercise these legal consumer protection rights, please contact our Compliance Officer through the dedicated channel listed below.', 'dawp'); ?></p>
                </div>
            </section>

            <section class="rounded-3xl border border-border bg-background p-8 shadow-card md:p-10">
                <h2 class="font-heading text-3xl font-semibold text-foreground md:text-4xl"><?php esc_html_e('7. Data Retention', 'dawp'); ?></h2>
                <p class="mt-5 leading-relaxed text-foreground-muted">
                    <?php esc_html_e('When you execute an order through our boutique storefront, we will preserve your structural Order Information for our continuous business, tax reporting, and accounting records unless and until you formally ask us to scrub this information from our directories.', 'dawp'); ?>
                </p>
            </section>

            <section class="rounded-3xl border border-border bg-background p-8 shadow-card md:p-10">
                <h2 class="font-heading text-3xl font-semibold text-foreground md:text-4xl"><?php esc_html_e('8. Contact Us', 'dawp'); ?></h2>
                <p class="mt-5 leading-relaxed text-foreground-muted">
                    <?php esc_html_e('For more information regarding our data privacy practices, if you have technical questions, or if you wish to file an official data inquiry, please contact our team via the verified channels below:', 'dawp'); ?>
                </p>

                <div class="mt-6 rounded-3xl border border-border bg-background p-4 md:p-5">
                    <div class="grid gap-4 md:grid-cols-2">
                        <div class="rounded-2xl border border-border p-5">
                            <h3 class="font-bold text-foreground"><?php esc_html_e('Store Name', 'dawp'); ?></h3>
                            <p class="mt-3 text-foreground-muted"><?php echo esc_html($store_name); ?></p>
                        </div>
                        <div class="rounded-2xl border border-border p-5">
                            <h3 class="font-bold text-foreground"><?php esc_html_e('Support Email', 'dawp'); ?></h3>
                            <p class="mt-3 text-foreground-muted"><a href="mailto:<?php echo esc_attr($support_email); ?>" class="transition-colors hover:text-accent"><?php echo esc_html($support_email); ?></a></p>
                        </div>
                        <div class="rounded-2xl border border-border p-5">
                            <h3 class="font-bold text-foreground"><?php esc_html_e('Physical Mailing Address', 'dawp'); ?></h3>
                            <p class="mt-3 leading-relaxed text-foreground-muted"><?php echo esc_html($mailing_address); ?></p>
                        </div>
                        <div class="rounded-2xl border border-border p-5">
                            <h3 class="font-bold text-foreground"><?php esc_html_e('Support Availability', 'dawp'); ?></h3>
                            <p class="mt-3 text-foreground-muted"><?php esc_html_e('Monday-Friday, 10:00 AM-6:00 PM PST', 'dawp'); ?></p>
                        </div>
                    </div>
                </div>

                <div class="mt-7 flex flex-wrap gap-4">
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-foreground px-6 text-sm font-bold text-white transition-colors hover:bg-accent">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>
                    <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-foreground px-6 text-sm font-bold text-foreground transition-colors hover:border-accent hover:text-accent">
                        <?php echo esc_html($support_email); ?>
                    </a>
                </div>
            </section>
        </div>
    </div>
    </section>
</main>
