<?php
/**
 * Template Part: page-terms-conditions
 */
?>

<div id="primary" class="bg-[#F4F6F8] font-body text-[#111827]">
    <section class="bg-[#0B1F33] py-14 text-white lg:py-20">
        <div class="mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
            <p class="text-sm font-black uppercase tracking-[0.18em] text-[#F97316]"><?php esc_html_e('Tizezap Store Terms', 'dawp'); ?></p>
            <h1 class="mt-3 font-heading text-4xl font-black leading-tight lg:text-6xl">
                <?php esc_html_e('Terms & Conditions', 'dawp'); ?>
            </h1>
            <p class="mx-auto mt-4 max-w-3xl text-lg leading-8 text-[#D7DEE8]">
                <?php esc_html_e('The terms that apply when you browse Tizezap, create an account, place an order, use our services, or contact support.', 'dawp'); ?>
            </p>
            <p class="mt-3 text-sm font-semibold uppercase tracking-wide text-[#B8C3D1]">
                <?php esc_html_e('Last Updated: May 19, 2026', 'dawp'); ?>
            </p>
        </div>
    </section>

    <section class="py-12 lg:py-16">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <div class="rounded-lg border border-[#E5E7EB] border-t-4 border-t-[#2563EB] bg-white p-5 shadow-sm">
                    <p class="text-sm font-bold uppercase tracking-wide text-[#5B6472]"><?php esc_html_e('Applies To', 'dawp'); ?></p>
                    <p class="mt-2 font-heading text-2xl font-black text-[#0B1F33]"><?php esc_html_e('Website Use', 'dawp'); ?></p>
                </div>
                <div class="rounded-lg border border-[#E5E7EB] border-t-4 border-t-[#F97316] bg-white p-5 shadow-sm">
                    <p class="text-sm font-bold uppercase tracking-wide text-[#5B6472]"><?php esc_html_e('Checkout', 'dawp'); ?></p>
                    <p class="mt-2 font-heading text-2xl font-black text-[#0B1F33]"><?php esc_html_e('Order Terms', 'dawp'); ?></p>
                </div>
                <div class="rounded-lg border border-[#E5E7EB] border-t-4 border-t-[#2563EB] bg-white p-5 shadow-sm">
                    <p class="text-sm font-bold uppercase tracking-wide text-[#5B6472]"><?php esc_html_e('Products', 'dawp'); ?></p>
                    <p class="mt-2 font-heading text-2xl font-black text-[#0B1F33]"><?php esc_html_e('Tire Specs', 'dawp'); ?></p>
                </div>
                <div class="rounded-lg border border-[#E5E7EB] border-t-4 border-t-[#111827] bg-white p-5 shadow-sm">
                    <p class="text-sm font-bold uppercase tracking-wide text-[#5B6472]"><?php esc_html_e('Support', 'dawp'); ?></p>
                    <p class="mt-2 font-heading text-2xl font-black text-[#0B1F33]"><?php esc_html_e('1-2 Business Days', 'dawp'); ?></p>
                </div>
            </div>

            <div class="mt-10 grid gap-8 lg:grid-cols-[250px_minmax(0,1fr)] lg:items-start">
                <aside class="rounded-lg border border-[#E5E7EB] bg-white p-4 shadow-sm lg:sticky lg:top-24">
                    <p class="text-xs font-black uppercase tracking-[0.16em] text-[#5B6472]"><?php esc_html_e('Policy Sections', 'dawp'); ?></p>
                    <nav class="mt-4 space-y-2" aria-label="<?php esc_attr_e('Terms and conditions sections', 'dawp'); ?>">
                        <a class="block rounded-md border border-transparent px-3 py-2 text-sm font-bold text-[#111827] transition hover:border-[#2563EB] hover:bg-[#EFF6FF]" href="#terms-overview"><?php esc_html_e('Overview', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-3 py-2 text-sm font-bold text-[#111827] transition hover:border-[#2563EB] hover:bg-[#EFF6FF]" href="#online-store"><?php esc_html_e('Online Store', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-3 py-2 text-sm font-bold text-[#111827] transition hover:border-[#2563EB] hover:bg-[#EFF6FF]" href="#product-info"><?php esc_html_e('Product Information', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-3 py-2 text-sm font-bold text-[#111827] transition hover:border-[#F97316] hover:bg-[#FFF7ED]" href="#orders-billing"><?php esc_html_e('Orders & Billing', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-3 py-2 text-sm font-bold text-[#111827] transition hover:border-[#F97316] hover:bg-[#FFF7ED]" href="#shipping-returns"><?php esc_html_e('Shipping & Returns', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-3 py-2 text-sm font-bold text-[#111827] transition hover:border-[#111827] hover:bg-[#F4F6F8]" href="#prohibited-uses"><?php esc_html_e('Prohibited Uses', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-3 py-2 text-sm font-bold text-[#111827] transition hover:border-[#111827] hover:bg-[#F4F6F8]" href="#contact-terms"><?php esc_html_e('Contact', 'dawp'); ?></a>
                    </nav>
                </aside>

                <article class="rounded-lg border border-[#E5E7EB] bg-white p-6 shadow-sm sm:p-8 lg:p-10">
                    <div class="max-w-none text-base leading-8 text-[#4B5563]
                        [&_a]:font-semibold [&_a]:text-[#2563EB] [&_a]:underline [&_a]:decoration-[#BFDBFE] [&_a]:decoration-2 [&_a]:underline-offset-4 hover:[&_a]:text-[#0B1F33]
                        [&_h2]:scroll-mt-24 [&_h2]:mt-10 [&_h2]:border-t [&_h2]:border-[#E5E7EB] [&_h2]:pt-8 [&_h2]:font-heading [&_h2]:text-2xl [&_h2]:font-black [&_h2]:leading-tight [&_h2]:text-[#0B1F33] md:[&_h2]:text-3xl
                        [&_li]:leading-7 [&_li]:pl-1 [&_p]:mb-5 [&_strong]:font-bold [&_strong]:text-[#111827] [&_ul]:mb-8 [&_ul]:mt-4 [&_ul]:list-disc [&_ul]:space-y-3 [&_ul]:pl-6">

                        <p id="terms-overview" class="scroll-mt-24 rounded-lg border border-[#BFDBFE] bg-[#EFF6FF] p-4 font-medium text-[#111827]"><?php esc_html_e('Welcome to Tizezap. This website, located at tizezap.com, is operated by Tizezap. Throughout the site, the terms "we", "us", and "our" refer to Tizezap. By accessing our website, creating an account, or purchasing tire products from us, you agree to be bound by the following Terms & Conditions, including any additional policies referenced herein.', 'dawp'); ?></p>
                        <p><?php esc_html_e('Please read these terms carefully before making a purchase. If you do not agree to all the terms, please do not use our services or place an order.', 'dawp'); ?></p>

                        <h2 id="online-store"><?php esc_html_e('1. Online Store & Eligibility', 'dawp'); ?></h2>
                        <p><?php esc_html_e('By agreeing to these Terms, you represent that you are at least the age of majority in your state or province of residence. You agree not to use our products or services for any illegal or unauthorized purpose, nor violate any laws in your jurisdiction while using our site.', 'dawp'); ?></p>

                        <h2 id="product-info"><?php esc_html_e('2. Product Information & Specifications', 'dawp'); ?></h2>
                        <ul>
                            <li><strong><?php esc_html_e('Accuracy:', 'dawp'); ?></strong> <?php esc_html_e('We endeavor to display our tire specifications, sizes, rim fitment guidelines, load indexes, speed ratings, and product images as accurately as possible.', 'dawp'); ?></li>
                            <li><strong><?php esc_html_e('Display Variations:', 'dawp'); ?></strong> <?php esc_html_e('While we attempt to reflect actual products accurately, variations in user device screens and lighting may cause minor differences in how colors or tread patterns appear.', 'dawp'); ?></li>
                            <li><strong><?php esc_html_e('Vehicle Compatibility:', 'dawp'); ?></strong> <?php esc_html_e('Customers are encouraged to verify their specific vehicle manufacturer specifications before placing an order to ensure correct tire fitment.', 'dawp'); ?></li>
                        </ul>

                        <h2 id="orders-billing"><?php esc_html_e('3. Order Placement, Billing, and Price Accuracy', 'dawp'); ?></h2>
                        <ul>
                            <li><strong><?php esc_html_e('Account Info:', 'dawp'); ?></strong> <?php esc_html_e('You agree to provide current, complete, and accurate purchase, billing, and shipping details for all transactions made at our store.', 'dawp'); ?></li>
                            <li><strong><?php esc_html_e('Pricing & Availability:', 'dawp'); ?></strong> <?php esc_html_e('All prices and product availability are subject to change without prior notice. However, once an order is placed and confirmed, the price for that transaction is locked and guaranteed.', 'dawp'); ?></li>
                            <li><strong><?php esc_html_e('Order Modifications:', 'dawp'); ?></strong> <?php esc_html_e('In the event that we must change, hold, or cancel an order (e.g., due to sudden inventory depletion), we will promptly notify you via the email or phone number provided at checkout and issue a full refund immediately if payment was already processed.', 'dawp'); ?></li>
                        </ul>

                        <h2 id="shipping-returns"><?php esc_html_e('4. Shipping, Returns, and Refunds', 'dawp'); ?></h2>
                        <p><?php esc_html_e('All transactions, deliveries, and return requests are handled transparently under our designated store policies:', 'dawp'); ?></p>
                        <ul>
                            <li><?php esc_html_e('For details regarding delivery timelines and zero hidden fees, please review our ', 'dawp'); ?><a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>"><?php esc_html_e('Shipping Policy', 'dawp'); ?></a>.</li>
                            <li><?php esc_html_e('For details regarding our 30-day return window and refund processing, please review our ', 'dawp'); ?><a href="<?php echo esc_url(home_url('/returns-policy/')); ?>"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></a>.</li>
                        </ul>

                        <h2><?php esc_html_e('5. Payment Security & Secure Checkout', 'dawp'); ?></h2>
                        <p><?php esc_html_e('Your data security during checkout is protected. Every transaction is encrypted using Secure Socket Layer (SSL) technology. Tizezap does not collect, view, or retain your full credit card numbers or payment credentials; all processing is securely executed by authorized, PCI-compliant third-party payment providers.', 'dawp'); ?></p>

                        <h2 id="prohibited-uses"><?php esc_html_e('6. Prohibited Uses', 'dawp'); ?></h2>
                        <p><?php esc_html_e('You are strictly prohibited from using the site or its content:', 'dawp'); ?></p>
                        <ul>
                            <li><?php esc_html_e('For any unlawful or fraudulent purposes.', 'dawp'); ?></li>
                            <li><?php esc_html_e('To submit false, misleading, or counterfeit information.', 'dawp'); ?></li>
                            <li><?php esc_html_e('To upload or transmit viruses, malware, or any other type of malicious code that could compromise site security or customer data.', 'dawp'); ?></li>
                            <li><?php esc_html_e('To scrape, harvest, or unauthorizedly collect data from the website.', 'dawp'); ?></li>
                        </ul>
                        <p><?php esc_html_e('Violation of these security rules may result in the immediate termination of your access to our services.', 'dawp'); ?></p>

                        <h2><?php esc_html_e('7. Limitation of Liability', 'dawp'); ?></h2>
                        <p><?php esc_html_e('Tizezap provides tire products built to compliant industry manufacturing standards. To the maximum extent permitted by applicable law, Tizezap shall not be liable for any indirect, incidental, or consequential damages resulting from improper third-party installation, misuse, or road hazard damages incurred after delivery.', 'dawp'); ?></p>

                        <h2><?php esc_html_e('8. Governing Law', 'dawp'); ?></h2>
                        <p><?php esc_html_e('These Terms & Conditions and any separate agreements whereby we provide you services shall be governed by and construed in accordance with the laws of the United States.', 'dawp'); ?></p>

                        <h2><?php esc_html_e('9. Changes to Terms & Conditions', 'dawp'); ?></h2>
                        <p><?php esc_html_e('You can review the most current version of the Terms & Conditions at any time on this page. We reserve the right to update or modify these terms to remain compliant with changing e-commerce regulations.', 'dawp'); ?></p>

                        <h2 id="contact-terms"><?php esc_html_e('Contact Information', 'dawp'); ?></h2>
                        <p><?php esc_html_e('If you have any questions or require clarification regarding our Terms & Conditions, please contact us directly:', 'dawp'); ?></p>
                        <ul>
                            <li><strong><?php esc_html_e('Brand Name:', 'dawp'); ?></strong> <?php esc_html_e('Tizezap', 'dawp'); ?></li>
                            <li><strong><?php esc_html_e('Website:', 'dawp'); ?></strong> <?php esc_html_e('tizezap.com', 'dawp'); ?></li>
                            <li><strong><?php esc_html_e('Customer Support Email:', 'dawp'); ?></strong> <a href="mailto:support@tizezap.com">support@tizezap.com</a></li>
                            <li><strong><?php esc_html_e('Business Hours:', 'dawp'); ?></strong> <?php esc_html_e('Monday – Friday, 9:00 AM – 6:00 PM EST', 'dawp'); ?></li>
                        </ul>
                    </div>
                </article>
            </div>
        </div>
    </section>
</div>
