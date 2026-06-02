<?php
/**
 * Template Part: Terms & Conditions Page
 */

$support_email  = 'support@brogeshoes.com';
$store_name     = __('Broge Shoes', 'dawp');
$store_address  = dawp_get_woocommerce_store_address();
$business_hours = __('Monday - Friday, 9:00 AM - 5:00 PM EST', 'dawp');
?>

<section class="bg-surface py-16 md:py-24">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="text-center mb-14">
            <span class="text-accent font-medium tracking-widest uppercase text-sm mb-4 block"><?php esc_html_e('Store Terms', 'dawp'); ?></span>
            <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl text-foreground font-bold mb-6 tracking-tight"><?php esc_html_e('Terms & Conditions', 'dawp'); ?></h1>
            <p class="text-foreground-muted text-lg max-w-3xl mx-auto leading-relaxed">
                <?php printf(esc_html__('These Terms & Conditions explain the rules for accessing %1$s, browsing products, contacting support, creating an account, and purchasing from %2$s.', 'dawp'), esc_html__('brogeshoes.com', 'dawp'), esc_html($store_name)); ?>
            </p>
            <p class="italic text-sm text-foreground-muted mt-4"><?php esc_html_e('Last Updated: May 26, 2026', 'dawp'); ?></p>
        </div>

        <div class="space-y-8">
            <div class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-8">
                    <div class="w-12 h-12 bg-accent-soft rounded-full flex items-center justify-center text-accent shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><path d="M14 2v6h6"></path><path d="M16 13H8"></path><path d="M16 17H8"></path><path d="M10 9H8"></path></svg>
                    </div>
                    <div>
                        <h2 class="font-heading text-3xl text-foreground font-semibold"><?php esc_html_e('Terms Overview', 'dawp'); ?></h2>
                        <p class="text-foreground-muted mt-2"><?php printf(esc_html__('%s operates brogeshoes.com for customers shopping men\'s formal footwear.', 'dawp'), esc_html($store_name)); ?></p>
                    </div>
                </div>
                <div class="text-foreground-muted leading-relaxed space-y-4">
                    <p><?php printf(esc_html__('Welcome to %s. These Terms & Conditions ("Terms") govern your access to and use of brogeshoes.com (the "Site"), including product browsing, account activity, support communications, and online purchases.', 'dawp'), esc_html($store_name)); ?></p>
                    <p><?php printf(esc_html__('The Site is operated by %s. Throughout the Site, "we", "us", and "our" refer to %s. By visiting our Site or placing an order, you agree to these Terms and any policies referenced here. If you do not accept them, please do not use the website or purchase from us.', 'dawp'), esc_html($store_name), esc_html($store_name)); ?></p>
                </div>
            </div>

            <div id="online-store-terms" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('1. Online Store Terms & Eligibility', 'dawp'); ?></h2>
                <div class="text-foreground-muted leading-relaxed space-y-4">
                    <p><?php esc_html_e('By accepting these Terms, you confirm that you are at least the age of majority in your state or country of residence, or that you have authorized your minor dependents to use this Site under your responsibility.', 'dawp'); ?></p>
                    <p><?php esc_html_e('You may not use our products, website, or services for any illegal or unauthorized purpose. This includes sending malicious code, attempting to hack or disrupt our systems, or violating intellectual property laws.', 'dawp'); ?></p>
                </div>
            </div>

            <div id="orders-billing-payment" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('2. Orders, Billing, and Secure Payment', 'dawp'); ?></h2>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="bg-surface p-6 rounded-lg border border-border">
                        <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Order Review & Acceptance', 'dawp'); ?></h3>
                        <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('An order confirmation email means we received your request, but it does not guarantee final acceptance. We may limit, cancel, or refuse an order because of inventory shortages, payment authorization issues, suspected fraud, pricing errors, or invalid shipping information. If a paid order is canceled, we will issue a full refund promptly.', 'dawp'); ?></p>
                    </div>
                    <div class="bg-surface p-6 rounded-lg border border-border">
                        <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Information Accuracy', 'dawp'); ?></h3>
                        <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('You agree to provide current, complete, and accurate billing, shipping, email, and phone details for every purchase made through our store.', 'dawp'); ?></p>
                    </div>
                    <div class="bg-surface p-6 rounded-lg border border-border">
                        <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Payment Security', 'dawp'); ?></h3>
                        <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Payments are processed by secure, PCI-DSS compliant third-party providers through HTTPS/SSL checkout. You authorize us and our payment providers to charge your selected payment method for the total shown at checkout. We do not add hidden fees.', 'dawp'); ?></p>
                    </div>
                    <div class="bg-surface p-6 rounded-lg border border-border">
                        <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Taxes and Pricing', 'dawp'); ?></h3>
                        <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Product prices, availability, and applicable taxes may change without prior notice.', 'dawp'); ?></p>
                    </div>
                </div>
            </div>

            <div id="products-sizing-materials" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('3. Products, Sizing, and Material Transparency', 'dawp'); ?></h2>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="bg-surface p-6 rounded-lg border border-border">
                        <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Product Line', 'dawp'); ?></h3>
                        <p class="text-foreground-muted leading-relaxed"><?php printf(esc_html__('%s specializes in men\'s formal shoes, leather dress shoes, and brogue shoes for professional, formal, and smart-casual wardrobes.', 'dawp'), esc_html($store_name)); ?></p>
                    </div>
                    <div class="bg-surface p-6 rounded-lg border border-border">
                        <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Display & Colors', 'dawp'); ?></h3>
                        <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('We aim to present product images, colors, and textures accurately. Actual appearance may vary slightly because of monitor settings, device screens, and photography lighting.', 'dawp'); ?></p>
                    </div>
                    <div class="bg-surface p-6 rounded-lg border border-border">
                        <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Material Claims', 'dawp'); ?></h3>
                        <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('We describe materials honestly. Specific leather claims, such as genuine leather or full-grain leather, are used only when supported by manufacturing data. When a material is synthetic or unverified, product pages will use terms such as "leather-look finish" or "polished finish."', 'dawp'); ?></p>
                    </div>
                    <div class="bg-surface p-6 rounded-lg border border-border">
                        <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Sizing Guidance', 'dawp'); ?></h3>
                        <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Shoe fit can vary by design and individual foot shape. Size guides are provided to support informed decisions, but they do not guarantee a perfect fit for every customer.', 'dawp'); ?></p>
                    </div>
                </div>
            </div>

            <div id="shipping-returns-policies" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('4. Shipping, Returns, and Store Policies', 'dawp'); ?></h2>
                <p class="text-foreground-muted leading-relaxed mb-6"><?php esc_html_e('Purchases are handled through our standard store operations. Please review the active policy pages below for the complete details:', 'dawp'); ?></p>
                <div class="grid md:grid-cols-2 gap-6 mb-6">
                    <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>" class="block bg-surface p-6 rounded-lg border border-border hover:border-accent transition-all">
                        <h3 class="text-foreground font-semibold text-xl mb-3"><?php esc_html_e('Shipping Guidelines', 'dawp'); ?></h3>
                        <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Shipping timelines, order cutoff details, handling times, carrier services, and tracking information are explained in our Shipping Policy.', 'dawp'); ?></p>
                    </a>
                    <a href="<?php echo esc_url(home_url('/refund-return-policy/')); ?>" class="block bg-surface p-6 rounded-lg border border-border hover:border-accent transition-all">
                        <h3 class="text-foreground font-semibold text-xl mb-3"><?php esc_html_e('Return Conditions', 'dawp'); ?></h3>
                        <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Return eligibility, return windows, return shipping fees, and refund processing are explained in our Refund & Return Policy.', 'dawp'); ?></p>
                    </a>
                </div>
                <div class="bg-accent-soft p-6 rounded-lg border border-accent/20">
                    <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('To qualify for a return, footwear must be unused, unworn, undamaged, free from outdoor wear, stains, heavy creasing, or sole marks, and returned in the original packaging.', 'dawp'); ?></p>
                </div>
            </div>

            <div id="prohibited-uses" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('5. Prohibited Uses and Website Security', 'dawp'); ?></h2>
                <p class="text-foreground-muted leading-relaxed mb-6"><?php esc_html_e('You are prohibited from using the Site or its content for:', 'dawp'); ?></p>
                <ul class="space-y-4 text-foreground-muted">
                    <li class="flex gap-3"><span class="mt-2 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('Any unlawful, fraudulent, abusive, or harmful purpose.', 'dawp'); ?></span></li>
                    <li class="flex gap-3"><span class="mt-2 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('Submitting false billing, shipping, account, or identity information.', 'dawp'); ?></span></li>
                    <li class="flex gap-3"><span class="mt-2 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('Trying to disrupt, damage, overload, reverse engineer, or abusively scrape the Site or its data.', 'dawp'); ?></span></li>
                    <li class="flex gap-3"><span class="mt-2 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('Making misleading statements, unauthorized brand affiliation claims, or false counterfeit accusations.', 'dawp'); ?></span></li>
                </ul>
            </div>

            <div id="intellectual-property" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('6. Intellectual Property Rights', 'dawp'); ?></h2>
                <p class="text-foreground-muted leading-relaxed"><?php printf(esc_html__('All website content, including text, graphics, page layouts, product presentation, logos, images, icons, and software, belongs to %s or its content providers and is protected by international intellectual property laws. You may not copy, reproduce, or commercially exploit our content without prior written permission.', 'dawp'), esc_html($store_name)); ?></p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <div id="limitation-liability" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('7. Limitation of Liability', 'dawp'); ?></h2>
                    <p class="text-foreground-muted leading-relaxed"><?php printf(esc_html__('We do not guarantee that our website will always be uninterrupted, secure, or error-free. To the fullest extent permitted by law, %s will not be liable for indirect, incidental, special, consequential, or punitive damages arising from website use, order delays, carrier issues, or misuse of our products.', 'dawp'), esc_html($store_name)); ?></p>
                </div>

                <div id="governing-law" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('8. Governing Law', 'dawp'); ?></h2>
                    <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('These Terms & Conditions and any separate agreements whereby we provide you services shall be governed by, and construed in accordance with, the laws of the United States.', 'dawp'); ?></p>
                </div>
            </div>

            <div id="contact-us" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('9. Contact Us', 'dawp'); ?></h2>
                <p class="text-foreground-muted leading-relaxed mb-8"><?php printf(esc_html__('For questions about these Terms & Conditions, order cancellations, or policy clarifications, contact %s through our official business channels:', 'dawp'), esc_html($store_name)); ?></p>
                <div class="grid sm:grid-cols-2 gap-4">
                    <div class="bg-surface p-6 rounded-lg border border-border">
                        <h3 class="text-foreground font-semibold mb-2"><?php esc_html_e('Brand Name', 'dawp'); ?></h3>
                        <p class="text-foreground-muted"><?php echo esc_html($store_name); ?></p>
                    </div>
                    <div class="bg-surface p-6 rounded-lg border border-border">
                        <h3 class="text-foreground font-semibold mb-2"><?php esc_html_e('Customer Support Email', 'dawp'); ?></h3>
                        <a href="mailto:<?php echo esc_attr($support_email); ?>" class="text-accent hover:underline font-medium"><?php echo esc_html($support_email); ?></a>
                    </div>
                    <div class="bg-surface p-6 rounded-lg border border-border">
                        <h3 class="text-foreground font-semibold mb-2"><?php esc_html_e('Physical Business Address', 'dawp'); ?></h3>
                        <p class="text-foreground-muted"><?php echo esc_html($store_address); ?></p>
                    </div>
                    <div class="bg-surface p-6 rounded-lg border border-border">
                        <h3 class="text-foreground font-semibold mb-2"><?php esc_html_e('Business Hours', 'dawp'); ?></h3>
                        <p class="text-foreground-muted"><?php echo esc_html($business_hours); ?></p>
                    </div>
                    <div class="bg-surface p-6 rounded-lg border border-border">
                        <h3 class="text-foreground font-semibold mb-2"><?php esc_html_e('Website', 'dawp'); ?></h3>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="text-accent hover:underline font-medium"><?php esc_html_e('brogeshoes.com', 'dawp'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
