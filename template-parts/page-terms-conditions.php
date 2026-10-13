<?php
/**
 * Template Part: page-terms-conditions
 */
?>

<div id="primary" class="mytire-policy-page mytire-policy-minimal bg-white font-body text-[#111111]">
    <section class="mytire-policy-cover border-b border-[#111111] bg-white">
        <div class="mx-auto w-full max-w-5xl px-5 py-12 sm:px-6 lg:px-8 lg:py-14">
            <p class="text-xs font-black uppercase tracking-[0.22em] text-[#111111]"><?php esc_html_e('Mytire Store Terms', 'dawp'); ?></p>
            <h1 class="mt-4 max-w-3xl font-heading text-4xl font-black leading-tight tracking-normal text-[#111111] md:text-5xl lg:text-6xl">
                <?php esc_html_e('Terms & Conditions', 'dawp'); ?>
            </h1>
            <p class="mt-7 max-w-3xl text-base font-semibold leading-7 text-[#333333] md:text-lg">
                <?php esc_html_e('The terms that apply when you browse Mytire, create an account, place an order, use our services, or contact support.', 'dawp'); ?>
            </p>
            <p class="mt-8 inline-flex min-h-11 items-center border border-[#111111] bg-[#111111] px-5 text-sm font-black uppercase tracking-wide text-white">
                <?php esc_html_e('Last Updated: May 19, 2026', 'dawp'); ?>
            </p>
        </div>
    </section>

    <section class="py-12 lg:py-16">
        <div class="mx-auto max-w-5xl px-5 sm:px-6 lg:px-8">
            <div class="grid border border-[#111111] sm:grid-cols-2 lg:grid-cols-4">
                <div class="border-b border-[#111111] bg-white p-5 sm:border-r lg:border-b-0">
                    <p class="text-xs font-black uppercase tracking-[0.2em] text-[#555555]"><?php esc_html_e('Applies To', 'dawp'); ?></p>
                    <p class="mt-2 font-heading text-2xl font-black text-[#111111]"><?php esc_html_e('Website Use', 'dawp'); ?></p>
                </div>
                <div class="border-b border-[#111111] bg-white p-5 lg:border-b-0 lg:border-r">
                    <p class="text-xs font-black uppercase tracking-[0.2em] text-[#555555]"><?php esc_html_e('Checkout', 'dawp'); ?></p>
                    <p class="mt-2 font-heading text-2xl font-black text-[#111111]"><?php esc_html_e('Order Terms', 'dawp'); ?></p>
                </div>
                <div class="border-b border-[#111111] bg-white p-5 sm:border-b-0 sm:border-r">
                    <p class="text-xs font-black uppercase tracking-[0.2em] text-[#555555]"><?php esc_html_e('Products', 'dawp'); ?></p>
                    <p class="mt-2 font-heading text-2xl font-black text-[#111111]"><?php esc_html_e('Tire Specs', 'dawp'); ?></p>
                </div>
                <div class="bg-[#111111] p-5 text-white">
                    <p class="text-xs font-black uppercase tracking-[0.2em] text-white/70"><?php esc_html_e('Support', 'dawp'); ?></p>
                    <p class="mt-2 font-heading text-2xl font-black text-white"><?php esc_html_e('1-2 Business Days', 'dawp'); ?></p>
                </div>
            </div>

            <article class="mt-12 bg-white lg:mt-14">
                <div class="max-w-none text-base leading-7 text-[#222222]
                    [&_a]:font-bold [&_a]:text-[#111111] [&_a]:underline [&_a]:decoration-2 [&_a]:underline-offset-4
                    [&_h2]:scroll-mt-24 [&_h2]:mt-12 [&_h2]:border-t [&_h2]:border-[#111111] [&_h2]:pt-8 [&_h2]:font-heading [&_h2]:text-2xl [&_h2]:font-black [&_h2]:leading-snug [&_h2]:text-[#111111] md:[&_h2]:text-3xl
                    [&_li]:leading-7 [&_p]:mb-5 [&_strong]:font-bold [&_strong]:text-[#111111] [&_ul]:mb-8 [&_ul]:mt-4 [&_ul]:list-disc [&_ul]:space-y-3 [&_ul]:pl-6">

                    <p id="terms-overview" class="border border-[#111111] bg-white p-5 font-semibold text-[#111111]"><?php esc_html_e('Welcome to Mytire. This website, located at Mytire.co, is operated by Mytire. By accessing our website, creating an account, or purchasing tire products from us, you agree to be bound by these Terms & Conditions and the policies referenced here.', 'dawp'); ?></p>
                    <p><?php esc_html_e('Please read these terms carefully before making a purchase. If you do not agree to all the terms, please do not use our services or place an order.', 'dawp'); ?></p>

                    <h2 id="online-store"><?php esc_html_e('1. Online Store & Eligibility', 'dawp'); ?></h2>
                    <p><?php esc_html_e('By agreeing to these Terms, you represent that you are at least the age of majority in your state or province of residence. You agree not to use our products or services for any illegal or unauthorized purpose.', 'dawp'); ?></p>

                    <h2 id="product-info"><?php esc_html_e('2. Product Information & Specifications', 'dawp'); ?></h2>
                    <ul>
                        <li><strong><?php esc_html_e('Accuracy:', 'dawp'); ?></strong> <?php esc_html_e('We endeavor to display tire specifications, sizes, rim fitment guidelines, load indexes, speed ratings, and product images as accurately as possible.', 'dawp'); ?></li>
                        <li><strong><?php esc_html_e('Display Variations:', 'dawp'); ?></strong> <?php esc_html_e('Device screens and lighting may cause minor differences in how colors or tread patterns appear.', 'dawp'); ?></li>
                        <li><strong><?php esc_html_e('Vehicle Compatibility:', 'dawp'); ?></strong> <?php esc_html_e('Customers are encouraged to verify manufacturer specifications before ordering to ensure correct tire fitment.', 'dawp'); ?></li>
                    </ul>

                    <h2 id="orders-billing"><?php esc_html_e('3. Order Placement, Billing, and Price Accuracy', 'dawp'); ?></h2>
                    <ul>
                        <li><strong><?php esc_html_e('Account Info:', 'dawp'); ?></strong> <?php esc_html_e('You agree to provide current, complete, and accurate purchase, billing, and shipping details for all transactions.', 'dawp'); ?></li>
                        <li><strong><?php esc_html_e('Pricing & Availability:', 'dawp'); ?></strong> <?php esc_html_e('Prices and availability may change without prior notice. Once an order is placed and confirmed, the price for that transaction is locked.', 'dawp'); ?></li>
                        <li><strong><?php esc_html_e('Order Modifications:', 'dawp'); ?></strong> <?php esc_html_e('If we must change, hold, or cancel an order, we will notify you promptly and issue a full refund if payment was already processed.', 'dawp'); ?></li>
                    </ul>

                    <h2 id="shipping-returns"><?php esc_html_e('4. Shipping, Returns, and Refunds', 'dawp'); ?></h2>
                    <p><?php esc_html_e('All transactions, deliveries, and return requests are handled transparently under our designated store policies:', 'dawp'); ?></p>
                    <ul>
                        <li><?php esc_html_e('For delivery timelines and shipping fees, review our ', 'dawp'); ?><a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>"><?php esc_html_e('Shipping Policy', 'dawp'); ?></a>.</li>
                        <li><?php esc_html_e('For our return window and refund processing, review our ', 'dawp'); ?><a href="<?php echo esc_url(home_url('/returns-policy/')); ?>"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></a>.</li>
                    </ul>

                    <h2><?php esc_html_e('5. Payment Security & Secure Checkout', 'dawp'); ?></h2>
                    <p><?php esc_html_e('Every transaction is encrypted using Secure Socket Layer (SSL) technology. Mytire does not collect, view, or retain your full credit card numbers or payment credentials.', 'dawp'); ?></p>

                    <h2 id="prohibited-uses"><?php esc_html_e('6. Prohibited Uses', 'dawp'); ?></h2>
                    <ul>
                        <li><?php esc_html_e('For any unlawful or fraudulent purposes.', 'dawp'); ?></li>
                        <li><?php esc_html_e('To submit false, misleading, or counterfeit information.', 'dawp'); ?></li>
                        <li><?php esc_html_e('To upload or transmit viruses, malware, or malicious code.', 'dawp'); ?></li>
                        <li><?php esc_html_e('To scrape, harvest, or unauthorizedly collect data from the website.', 'dawp'); ?></li>
                    </ul>

                    <h2><?php esc_html_e('7. Limitation of Liability', 'dawp'); ?></h2>
                    <p><?php esc_html_e('To the maximum extent permitted by applicable law, Mytire shall not be liable for indirect, incidental, or consequential damages resulting from improper third-party installation, misuse, or road hazard damages incurred after delivery.', 'dawp'); ?></p>

                    <h2><?php esc_html_e('8. Governing Law', 'dawp'); ?></h2>
                    <p><?php esc_html_e('These Terms & Conditions shall be governed by and construed in accordance with the laws of the United States.', 'dawp'); ?></p>

                    <h2><?php esc_html_e('9. Changes to Terms & Conditions', 'dawp'); ?></h2>
                    <p><?php esc_html_e('You can review the most current version of the Terms & Conditions at any time on this page. We reserve the right to update or modify these terms to remain compliant with changing e-commerce regulations.', 'dawp'); ?></p>

                    <h2 id="contact-terms"><?php esc_html_e('Contact Information', 'dawp'); ?></h2>
                    <ul>
                        <li><strong><?php esc_html_e('Brand Name:', 'dawp'); ?></strong> <?php esc_html_e('Mytire', 'dawp'); ?></li>
                        <li><strong><?php esc_html_e('Company:', 'dawp'); ?></strong> <?php esc_html_e('TIRE CAPITAL LLC', 'dawp'); ?></li>
                        <li><strong><?php esc_html_e('Address:', 'dawp'); ?></strong> <?php esc_html_e('324 W Dickerson Ln, Middletown, DE 19709-8832', 'dawp'); ?></li>
                        <li><strong><?php esc_html_e('Website:', 'dawp'); ?></strong> <?php esc_html_e('Mytire.co', 'dawp'); ?></li>
                        <li><strong><?php esc_html_e('Customer Support Email:', 'dawp'); ?></strong> <a href="mailto:support@Mytire.co">support@Mytire.co</a></li>
                        <li><strong><?php esc_html_e('Business Hours:', 'dawp'); ?></strong> <?php esc_html_e('Monday - Friday, 9:00 AM - 5:00 PM (GMT-05:00) Eastern Standard Time (New York)', 'dawp'); ?></li>
                    </ul>
                </div>
            </article>
        </div>
    </section>
</div>
