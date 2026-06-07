<?php
/**
 * Template Part: Terms of Service
 */

$store_name       = 'Shop Kelli Boutique';
$support_email    = 'support@shopkelli.com';
$mailing_address  = '1777 Canal St, Merced, CA 95340';
$support_hours    = 'Monday-Friday, 10:00 AM-6:00 PM PST';
$return_policy    = home_url('/refund-return-policy/');
$shipping_policy  = home_url('/shipping-policy/');
$privacy_policy   = home_url('/privacy-policy/');
$contact_page_url = home_url('/contact-us/');
?>

<main class="sk-policy-page bg-surface">
    <section class="sk-policy-hero">
        <div class="container mx-auto max-w-6xl px-4">
            <div class="sk-policy-hero__inner text-center">
            <span class="mb-4 block text-sm font-bold uppercase tracking-widest text-accent"><?php esc_html_e('Terms & Conditions', 'dawp'); ?></span>
            <h1 class="font-heading text-4xl font-bold tracking-tight text-foreground md:text-5xl lg:text-6xl"><?php esc_html_e('Terms of Service', 'dawp'); ?></h1>
            <p class="mt-5 text-sm font-bold uppercase tracking-widest text-foreground"><?php esc_html_e('Last Updated: May 30, 2026', 'dawp'); ?></p>
            <div class="sk-policy-hero__copy mx-auto mt-6 max-w-4xl space-y-5 text-lg leading-relaxed text-foreground-muted">
                <p><?php esc_html_e('Welcome to Shop Kelli! These Terms of Service ("Terms") govern your access to and use of our website shopkelli.com (the "Site"), including browsing our catalog, creating an account, interacting with our boutique support, or purchasing items from our online store.', 'dawp'); ?></p>
                <p><?php esc_html_e('This Site is operated by Shop Kelli. Throughout the Site, the terms “we”, “us” and “our” refer to Shop Kelli. By visiting our Site and/or purchasing something from us, you engage in our “Service” and agree to be bound by the following terms and conditions, including those additional terms, conditions, and operational policies referenced herein and/or available by hyperlink.', 'dawp'); ?></p>
                <p><?php esc_html_e('Please read these Terms of Service carefully before accessing or using our website. If you do not agree to all the terms and conditions of this agreement, then you may not access the website or use any services.', 'dawp'); ?></p>
            </div>
            </div>
        </div>
    </section>

    <section class="sk-policy-body">
    <div class="container mx-auto max-w-6xl px-4">
        <div class="space-y-8">
            <section class="rounded-3xl border border-border bg-background p-8 shadow-card md:p-10">
                <h2 class="font-heading text-3xl font-semibold text-foreground md:text-4xl"><?php esc_html_e('1. Online Store Terms & Eligibility', 'dawp'); ?></h2>
                <div class="mt-5 space-y-5 leading-relaxed text-foreground-muted">
                    <p><?php esc_html_e('By agreeing to these Terms of Service, you represent that you are at least the age of majority in your state or province of residence, or that you have given us your explicit consent to allow any of your minor dependents to use this Site.', 'dawp'); ?></p>
                    <p><?php esc_html_e('You may not use our boutique products or website services for any illegal, unauthorized, or fraudulent purpose. You must not transmit any worms, viruses, or any code of a destructive nature. A breach or violation of any of these Terms will result in an immediate termination of your access to our Services.', 'dawp'); ?></p>
                </div>
            </section>

            <section class="rounded-3xl border border-border bg-background p-8 shadow-card md:p-10">
                <h2 class="font-heading text-3xl font-semibold text-foreground md:text-4xl"><?php esc_html_e('2. General Conditions & Payment Security', 'dawp'); ?></h2>
                <div class="mt-6 grid gap-4 md:grid-cols-3">
                    <div class="rounded-2xl border border-border bg-background p-5">
                        <h3 class="text-lg font-medium leading-snug text-foreground"><?php esc_html_e('Service Access', 'dawp'); ?></h3>
                        <p class="mt-5 leading-relaxed text-foreground-muted"><?php esc_html_e('We reserve the right to refuse service to anyone for any reason at any time.', 'dawp'); ?></p>
                    </div>
                    <div class="rounded-2xl border border-border bg-background p-5">
                        <h3 class="text-lg font-medium leading-snug text-foreground"><?php esc_html_e('Data Encryption Transmission', 'dawp'); ?></h3>
                        <p class="mt-5 leading-relaxed text-foreground-muted"><?php esc_html_e('You understand that your content (not including credit card information), may be transferred unencrypted over various networks. Credit card information is always fully encrypted during transfer over networks utilizing secure SSL (Secure Sockets Layer) technology. All transactions adhere strictly to PCI-DSS compliance standards.', 'dawp'); ?></p>
                    </div>
                    <div class="rounded-2xl border border-border bg-background p-5">
                        <h3 class="text-lg font-medium leading-snug text-foreground"><?php esc_html_e('Proprietary Rights', 'dawp'); ?></h3>
                        <p class="mt-5 leading-relaxed text-foreground-muted"><?php esc_html_e('You agree not to reproduce, duplicate, copy, sell, resell or exploit any portion of the Service, use of the Service, or access to the Service without express written permission from us.', 'dawp'); ?></p>
                    </div>
                </div>
            </section>

            <section class="rounded-3xl border border-border bg-background p-8 shadow-card md:p-10">
                <h2 class="font-heading text-3xl font-semibold text-foreground md:text-4xl"><?php esc_html_e('3. Product Representation & Accuracy', 'dawp'); ?></h2>
                <div class="mt-5 space-y-5 leading-relaxed text-foreground-muted">
                    <p>
                        <strong class="font-bold text-foreground"><?php esc_html_e('Boutique Assortment:', 'dawp'); ?></strong>
                        <?php esc_html_e('Certain products or lifestyle pieces may be available exclusively online through the Site. These products may have limited quantities and are subject to return and refund handling strictly according to our', 'dawp'); ?>
                        <a href="<?php echo esc_url($return_policy); ?>" class="font-bold text-foreground transition-colors hover:text-accent"><?php esc_html_e('Refund & Return Policy', 'dawp'); ?></a>.
                    </p>
                    <p><strong class="font-bold text-foreground"><?php esc_html_e('Display Limitations:', 'dawp'); ?></strong> <?php esc_html_e("We have made every reasonable effort to display as accurately as possible the colors, textures, and images of our boutique products. We cannot guarantee that your personal computer or mobile monitor's display of any color will be 100% exact.", 'dawp'); ?></p>
                    <p><strong class="font-bold text-foreground"><?php esc_html_e('Modifications:', 'dawp'); ?></strong> <?php esc_html_e('Prices for our products are subject to change without notice. We reserve the right at any time to modify or discontinue any item or service assortment without prior liability.', 'dawp'); ?></p>
                </div>
            </section>

            <section class="rounded-3xl border border-border bg-background p-8 shadow-card md:p-10">
                <h2 class="font-heading text-3xl font-semibold text-foreground md:text-4xl"><?php esc_html_e('4. Billing and Account Information', 'dawp'); ?></h2>
                <div class="mt-5 space-y-5 leading-relaxed text-foreground-muted">
                    <p><?php esc_html_e('We reserve the right to refuse, limit, or cancel any order placed with us. In our sole discretion, we may restrict quantities purchased per person, per household, or per order (including orders linked to the same customer account, the same credit card, and/or matching billing/shipping addresses).', 'dawp'); ?></p>
                    <p><?php esc_html_e('In the event that we make a change to or cancel an order, we will notify you by attempting to contact the email and/or billing address/phone number provided at checkout. You agree to provide current, complete, and accurate purchase and account records for all transactions executed at our store.', 'dawp'); ?></p>
                </div>
            </section>

            <section class="rounded-3xl border border-border bg-background p-8 shadow-card md:p-10">
                <h2 class="font-heading text-3xl font-semibold text-foreground md:text-4xl"><?php esc_html_e('5. Integrated Store Policies', 'dawp'); ?></h2>
                <p class="mt-5 leading-relaxed text-foreground-muted"><?php esc_html_e('Your transactions, logistics, and account protections are directly bound by our core operational terms. Please review our detailed parameters via the active hyperlinks below:', 'dawp'); ?></p>
                <div class="mt-6 grid gap-4 md:grid-cols-3">
                    <div class="rounded-2xl border border-border bg-background p-5">
                        <h3 class="text-lg font-medium leading-snug text-foreground"><?php esc_html_e('Shipping & Processing', 'dawp'); ?></h3>
                        <p class="mt-5 leading-relaxed text-foreground-muted">
                            <?php esc_html_e('U.S.-only shipping, free standard U.S. shipping, handling timeframes, cutoff times, tracking methods, and carrier conditions are detailed in our full', 'dawp'); ?>
                            <a href="<?php echo esc_url($shipping_policy); ?>" class="font-bold text-foreground transition-colors hover:text-accent"><?php esc_html_e('Shipping Policy', 'dawp'); ?></a>.
                        </p>
                    </div>
                    <div class="rounded-2xl border border-border bg-background p-5">
                        <h3 class="text-lg font-medium leading-snug text-foreground"><?php esc_html_e('Refunds & Returns', 'dawp'); ?></h3>
                        <p class="mt-5 leading-relaxed text-foreground-muted">
                            <?php esc_html_e('Return eligibility, return shipping fees, non-returnable items, refund timing, and exchange handling are detailed in our full', 'dawp'); ?>
                            <a href="<?php echo esc_url($return_policy); ?>" class="font-bold text-foreground transition-colors hover:text-accent"><?php esc_html_e('Refund & Return Policy', 'dawp'); ?></a>.
                        </p>
                    </div>
                    <div class="rounded-2xl border border-border bg-background p-5">
                        <h3 class="text-lg font-medium leading-snug text-foreground"><?php esc_html_e('Privacy & Data Management', 'dawp'); ?></h3>
                        <p class="mt-5 leading-relaxed text-foreground-muted">
                            <?php esc_html_e('Your submission of personal information through the storefront checkout is strictly governed by our', 'dawp'); ?>
                            <a href="<?php echo esc_url($privacy_policy); ?>" class="font-bold text-foreground transition-colors hover:text-accent"><?php esc_html_e('Privacy Policy', 'dawp'); ?></a>.
                        </p>
                    </div>
                </div>
            </section>

            <section class="rounded-3xl border border-border bg-background p-8 shadow-card md:p-10">
                <h2 class="font-heading text-3xl font-semibold text-foreground md:text-4xl"><?php esc_html_e('6. Errors, Inaccuracies, and Omissions', 'dawp'); ?></h2>
                <p class="mt-5 leading-relaxed text-foreground-muted"><?php esc_html_e('Occasionally there may be information on our Site that contains typographical errors, inaccuracies, or omissions that may relate to product descriptions, pricing, promotions, shipping charges, transit times, and product availability. We reserve the right to correct any errors, inaccuracies, or omissions, and to change or update information or cancel affected orders at any time without prior notice (including after you have submitted your order).', 'dawp'); ?></p>
            </section>

            <section class="rounded-3xl border border-border bg-background p-8 shadow-card md:p-10">
                <h2 class="font-heading text-3xl font-semibold text-foreground md:text-4xl"><?php esc_html_e('7. Prohibited Uses', 'dawp'); ?></h2>
                <p class="mt-5 leading-relaxed text-foreground-muted"><?php esc_html_e('You are strictly prohibited from using the Site or its content: (a) for any unlawful purpose; (b) to violate any international, federal, or state regulations, rules, or local ordinances; (c) to infringe upon or violate our intellectual property rights or the rights of others; (d) to submit malicious code, deploy automated scraping scripts, or compromise store transactional systems; (e) to harass, abuse, insult, or discriminate based on gender, sexual orientation, religion, ethnicity, race, age, national origin, or disability.', 'dawp'); ?></p>
            </section>

            <section class="rounded-3xl border border-border bg-background p-8 shadow-card md:p-10">
                <h2 class="font-heading text-3xl font-semibold text-foreground md:text-4xl"><?php esc_html_e('8. Limitation of Liability', 'dawp'); ?></h2>
                <p class="mt-5 leading-relaxed text-foreground-muted"><?php esc_html_e('In no case shall Shop Kelli, our directors, officers, employees, affiliates, agents, or suppliers be liable for any injury, loss, claim, or any direct, indirect, incidental, punitive, special, or consequential damages of any kind—including, without limitation, lost profits, lost revenue, lost savings, or replacement costs—arising from your use of the website or any products procured using the service.', 'dawp'); ?></p>
            </section>

            <section class="rounded-3xl border border-border bg-background p-8 shadow-card md:p-10">
                <h2 class="font-heading text-3xl font-semibold text-foreground md:text-4xl"><?php esc_html_e('9. Governing Law', 'dawp'); ?></h2>
                <p class="mt-5 leading-relaxed text-foreground-muted"><?php esc_html_e('These Terms of Service and any separate agreements whereby we provide you Services shall be governed by, and construed in accordance with, the laws of the State of California, United States.', 'dawp'); ?></p>
            </section>

            <section class="rounded-3xl border border-border bg-background p-8 shadow-card md:p-10">
                <h2 class="font-heading text-3xl font-semibold text-foreground md:text-4xl"><?php esc_html_e('10. Contact Information', 'dawp'); ?></h2>
                <p class="mt-5 leading-relaxed text-foreground-muted"><?php esc_html_e('Questions regarding these Terms of Service should be directed to our compliance team via the verified channels below:', 'dawp'); ?></p>

                <div class="mt-6 rounded-3xl border border-border bg-background p-4 md:p-5">
                    <div class="grid gap-4 md:grid-cols-2">
                        <div class="rounded-2xl border border-border p-5">
                            <h3 class="font-bold text-foreground"><?php esc_html_e('Store Name', 'dawp'); ?></h3>
                            <p class="mt-3 text-foreground-muted"><?php echo esc_html($store_name); ?></p>
                        </div>
                        <div class="rounded-2xl border border-border p-5">
                            <h3 class="font-bold text-foreground"><?php esc_html_e('Customer Support Email', 'dawp'); ?></h3>
                            <p class="mt-3 text-foreground-muted"><a href="mailto:<?php echo esc_attr($support_email); ?>" class="transition-colors hover:text-accent"><?php echo esc_html($support_email); ?></a></p>
                        </div>
                        <div class="rounded-2xl border border-border p-5">
                            <h3 class="font-bold text-foreground"><?php esc_html_e('Physical Mailing Address', 'dawp'); ?></h3>
                            <p class="mt-3 leading-relaxed text-foreground-muted"><?php echo esc_html($mailing_address); ?></p>
                        </div>
                        <div class="rounded-2xl border border-border p-5">
                            <h3 class="font-bold text-foreground"><?php esc_html_e('Support Availability', 'dawp'); ?></h3>
                            <p class="mt-3 text-foreground-muted"><?php echo esc_html($support_hours); ?></p>
                        </div>
                    </div>
                </div>

                <div class="mt-7 flex flex-wrap gap-4">
                    <a href="<?php echo esc_url($contact_page_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-foreground px-6 text-sm font-bold text-white transition-colors hover:bg-accent">
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
