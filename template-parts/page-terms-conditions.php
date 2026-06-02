<?php
/**
 * Template Part: page-terms-conditions
 */

$support_email = 'support@scottosterbind.com';
$store_address = function_exists('dawp_get_woocommerce_store_address') ? dawp_get_woocommerce_store_address() : '';
?>

<div id="primary" class="legal-page bg-[#F7F5EF] font-body text-[#1F2937]">
    <section class="bg-[#1B4F49] py-14 text-white lg:py-20">
        <div class="legal-page__container mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
            <p class="text-sm font-black uppercase tracking-[0.18em] text-[#C89B3C]"><?php esc_html_e('Scott Osterbind Terms', 'dawp'); ?></p>
            <h1 class="mt-3 font-heading text-4xl font-black leading-tight lg:text-6xl">
                <?php esc_html_e('Terms & Conditions', 'dawp'); ?>
            </h1>
            <p class="mx-auto mt-4 max-w-3xl text-lg leading-8 text-[#FAF6EA]">
                <?php esc_html_e('Terms governing account access, product information, checkout, payments, shipping, returns, website use, and customer support.', 'dawp'); ?>
            </p>
            <p class="mt-3 text-sm font-semibold uppercase tracking-wide text-[#E8D9A6]">
                <?php esc_html_e('Last Updated: May 27, 2026', 'dawp'); ?>
            </p>
        </div>
    </section>

    <section class="py-12 lg:py-16">
        <div class="legal-page__container mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-8 lg:grid-cols-[250px_minmax(0,1fr)] lg:items-start">
                <aside class="rounded-lg border border-[#E8D9A6] bg-white p-4 shadow-sm lg:sticky lg:top-24">
                    <p class="text-xs font-black uppercase tracking-[0.16em] text-[#C89B3C]"><?php esc_html_e('Terms Sections', 'dawp'); ?></p>
                    <nav class="mt-4 space-y-2" aria-label="<?php esc_attr_e('Terms and conditions sections', 'dawp'); ?>">
                        <a class="block rounded-md border border-transparent px-3 py-2 text-sm font-bold text-[#1F2937] transition hover:border-[#C89B3C] hover:bg-[#F7F5EF]" href="#terms-overview"><?php esc_html_e('Overview', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-3 py-2 text-sm font-bold text-[#1F2937] transition hover:border-[#C89B3C] hover:bg-[#F7F5EF]" href="#terms-eligibility"><?php esc_html_e('Eligibility & Account Security', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-3 py-2 text-sm font-bold text-[#1F2937] transition hover:border-[#C89B3C] hover:bg-[#F7F5EF]" href="#terms-products"><?php esc_html_e('Product Information', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-3 py-2 text-sm font-bold text-[#1F2937] transition hover:border-[#C89B3C] hover:bg-[#F7F5EF]" href="#terms-pricing"><?php esc_html_e('Pricing & Payment', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-3 py-2 text-sm font-bold text-[#1F2937] transition hover:border-[#C89B3C] hover:bg-[#F7F5EF]" href="#terms-policies"><?php esc_html_e('Shipping & Returns', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-3 py-2 text-sm font-bold text-[#1F2937] transition hover:border-[#C89B3C] hover:bg-[#F7F5EF]" href="#terms-contact"><?php esc_html_e('Contact', 'dawp'); ?></a>
                    </nav>
                </aside>

                <article class="rounded-lg border border-[#E8D9A6] bg-white p-6 shadow-sm sm:p-8 lg:p-10">
                    <div class="max-w-none text-base leading-8 text-[#475569]
                        [&_a]:font-semibold [&_a]:text-[#C89B3C] [&_a]:underline [&_a]:decoration-[#C89B3C] [&_a]:decoration-2 [&_a]:underline-offset-4 hover:[&_a]:text-[#1F6F68]
                        [&_h2]:scroll-mt-24 [&_h2]:mt-10 [&_h2]:border-t [&_h2]:border-[#E8D9A6] [&_h2]:pt-8 [&_h2]:font-heading [&_h2]:text-2xl [&_h2]:font-black [&_h2]:leading-tight [&_h2]:text-[#1F6F68] md:[&_h2]:text-3xl
                        [&_li]:leading-7 [&_li]:pl-1 [&_p]:mb-5 [&_strong]:font-bold [&_strong]:text-[#1F2937] [&_ul]:mb-8 [&_ul]:mt-4 [&_ul]:list-disc [&_ul]:space-y-3 [&_ul]:pl-6">
                        <p id="terms-overview" class="scroll-mt-24 rounded-lg border border-[#C89B3C]/60 bg-[#F7F5EF] p-4 font-medium text-[#1F6F68]"><?php esc_html_e('Welcome to Scott Osterbind ("we", "us", or "our"). These Terms & Conditions ("Terms") govern your access to and use of scottosterbind.com (the "Site"), including creating an account, interacting with our customer support, and purchasing our handmade jewelry, vintage-inspired accessories, curated apparel, or artisan gifts (collectively, "Products").', 'dawp'); ?></p>
                        <p><?php esc_html_e('By accessing our Site or placing an order, you agree to be bound by these Terms. If you do not agree with any part of these Terms, please do not use our website or services.', 'dawp'); ?></p>

                        <h2 id="terms-eligibility"><?php esc_html_e('1. Eligibility & Account Security', 'dawp'); ?></h2>
                        <p><strong><?php esc_html_e('Age Requirements:', 'dawp'); ?></strong> <?php esc_html_e('To purchase Products or create an account on this Site, you must be at least the age of majority in your state, province, or country of residence.', 'dawp'); ?></p>
                        <p><strong><?php esc_html_e('Account Accuracy:', 'dawp'); ?></strong> <?php esc_html_e('If you create an account, you are responsible for maintaining the confidentiality of your login credentials and for restricting unauthorized access to your device. You agree to provide accurate, current, and complete information during checkout or registration.', 'dawp'); ?></p>

                        <h2 id="terms-products"><?php esc_html_e('2. Product Information, Sizing, and Craftsmanship', 'dawp'); ?></h2>
                        <p><strong><?php esc_html_e('Artisan Nature:', 'dawp'); ?></strong> <?php esc_html_e('Because our store features handmade jewelry, vintage-inspired items, and artisan gifts, minor variations in color, texture, sizing, and finish are natural characteristics of the production process.', 'dawp'); ?></p>
                        <p><strong><?php esc_html_e('Display Accuracy:', 'dawp'); ?></strong> <?php esc_html_e('We strive to display product images, material details, and dimensions as accurately as possible. However, the colors you see depend heavily on your screen settings and lighting, and we cannot guarantee your display will perfectly reflect the product in person.', 'dawp'); ?></p>

                        <h2 id="terms-pricing"><?php esc_html_e('3. Pricing, Taxes, and Transparent Fees', 'dawp'); ?></h2>
                        <p><strong><?php esc_html_e('Currency & Changes:', 'dawp'); ?></strong> <?php esc_html_e('All prices displayed on our Site are in USD. Prices and item availability are subject to change without notice.', 'dawp'); ?></p>
                        <p><strong><?php esc_html_e('Transparency:', 'dawp'); ?></strong> <?php esc_html_e('Total purchase prices - including item costs, applicable sales taxes, duties (if applicable), and shipping options - will be fully calculated and explicitly displayed at checkout before you authorize your payment. We do not employ hidden fees or undisclosed charges.', 'dawp'); ?></p>
                        <p><strong><?php esc_html_e('Errors:', 'dawp'); ?></strong> <?php esc_html_e('In the event of a typographical or pricing error, we reserve the right to correct the error, refuse, or cancel any orders placed for the product listed at the incorrect price, even if the order has been confirmed and paid. If canceled, a full refund will be issued immediately.', 'dawp'); ?></p>

                        <h2 id="terms-payment"><?php esc_html_e('4. Order Acceptance and Payment Terms', 'dawp'); ?></h2>
                        <p><strong><?php esc_html_e('Secure Payment:', 'dawp'); ?></strong> <?php esc_html_e('We require full payment authorization before processing any order. All payments are securely processed through trusted, PCI-DSS compliant third-party payment gateways. Our website operates over a secure HTTPS/SSL connection to protect your financial data.', 'dawp'); ?></p>
                        <p><strong><?php esc_html_e('Right to Refuse Service:', 'dawp'); ?></strong> <?php esc_html_e('An order confirmation indicates receipt of your request, not final acceptance. We reserve the right to limit quantities, cancel, or refuse any order at our sole discretion due to stock limitations, suspected payment fraud, unauthorized chargeback history, or invalid shipping addresses.', 'dawp'); ?></p>

                        <h2 id="terms-policies"><?php esc_html_e('5. Shipping, Returns, and Store Policies', 'dawp'); ?></h2>
                        <p><?php esc_html_e('Your purchase and shipping journey are directly governed by our specific operational policies. These documents are incorporated into these Terms by reference. Please review them via the active links below:', 'dawp'); ?></p>
                        <p><strong><?php esc_html_e('Shipping Policy:', 'dawp'); ?></strong> <?php esc_html_e('Explains processing times for handmade/curated items, estimated transit times, shipping rates, and tracking features.', 'dawp'); ?> <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>"><?php esc_html_e('View Shipping Policy', 'dawp'); ?></a></p>
                        <p><strong><?php esc_html_e('Return & Refund Policy:', 'dawp'); ?></strong> <?php esc_html_e('Details return eligibility windows, specific item condition requirements for footwear/jewelry, non-returnable items, and refund processing timelines.', 'dawp'); ?> <a href="<?php echo esc_url(home_url('/return-refund-policy/')); ?>"><?php esc_html_e('View Return & Refund Policy', 'dawp'); ?></a></p>

                        <h2 id="terms-prohibited"><?php esc_html_e('6. Prohibited Actions and Website Abuse', 'dawp'); ?></h2>
                        <p><?php esc_html_e('You agree to use our Site strictly for legitimate shopping and communication purposes. You are prohibited from:', 'dawp'); ?></p>
                        <ul>
                            <li><?php esc_html_e('Engaging in fraudulent order activity, payment card abuse, or submitting false delivery or damage claims.', 'dawp'); ?></li>
                            <li><?php esc_html_e('Bypassing, disabling, or interfering with any security-related features, encryption protocols, or checkout systems of the Site.', 'dawp'); ?></li>
                            <li><?php esc_html_e('Using automated scrapers, bots, or spiders to extract product data, images, text, or branding from our Site for commercial or unauthorized reuse.', 'dawp'); ?></li>
                            <li><?php esc_html_e('Uploading or transmitting any malicious software, viruses, or defamatory content through our contact or support forms.', 'dawp'); ?></li>
                        </ul>

                        <h2 id="terms-ip"><?php esc_html_e('7. Intellectual Property Rights', 'dawp'); ?></h2>
                        <p><?php esc_html_e('All materials on this Site - including but not limited to the Scott Osterbind brand name, logos, custom jewelry designs, artistic text, product descriptions, photography, graphics, icons, and layout - are owned by or licensed to us. These materials are fully protected by international copyright, trademark, and intellectual property laws. You may not copy or reuse them without our express written consent.', 'dawp'); ?></p>

                        <h2 id="terms-liability"><?php esc_html_e('8. Limitation of Liability', 'dawp'); ?></h2>
                        <p><?php esc_html_e('To the fullest extent permitted by applicable law, Scott Osterbind and its associates shall not be liable for any indirect, incidental, special, consequential, or punitive damages arising from your use of the website, delays in shipping, or the performance of artisan products purchased through the Site.', 'dawp'); ?></p>

                        <h2 id="terms-law"><?php esc_html_e('9. Governing Law', 'dawp'); ?></h2>
                        <p><?php esc_html_e('These Terms & Conditions and any separate agreements whereby we provide you services shall be governed by, and construed in accordance with, the laws of the United States, without regard to principles of conflicts of laws.', 'dawp'); ?></p>

                        <h2 id="terms-contact"><?php esc_html_e('10. Contact Us', 'dawp'); ?></h2>
                        <p><?php esc_html_e('For questions regarding these Terms & Conditions, order cancellations, or policy inquiries, please contact Scott Osterbind directly:', 'dawp'); ?></p>
                        <ul>
                            <li><strong><?php esc_html_e('Brand Name:', 'dawp'); ?></strong> <?php esc_html_e('Scott Osterbind', 'dawp'); ?></li>
                            <li><strong><?php esc_html_e('Customer Support Email:', 'dawp'); ?></strong> <a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a></li>
                            <li><strong><?php esc_html_e('Physical Business Address:', 'dawp'); ?></strong> <?php echo esc_html($store_address !== '' ? $store_address : __('Available through checkout and official support channels.', 'dawp')); ?></li>
                            <li><strong><?php esc_html_e('Business Hours:', 'dawp'); ?></strong> <?php esc_html_e('Monday - Friday, 9:00 AM - 6:00 PM EST', 'dawp'); ?></li>
                            <li><strong><?php esc_html_e('Website:', 'dawp'); ?></strong> <?php esc_html_e('scottosterbind.com', 'dawp'); ?></li>
                        </ul>
                    </div>
                </article>
            </div>
        </div>
    </section>
</div>
