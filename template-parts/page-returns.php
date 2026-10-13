<?php
/**
 * Template Part: page-returns
 */
?>

<div id="primary" class="mytire-policy-page mytire-policy-minimal bg-white font-body text-[#111111]">
    <section class="mytire-policy-cover border-b border-[#111111] bg-white">
        <div class="mx-auto w-full max-w-5xl px-5 py-12 sm:px-6 lg:px-8 lg:py-14">
            <p class="text-xs font-black uppercase tracking-[0.22em] text-[#111111]"><?php esc_html_e('Mytire Customer Care', 'dawp'); ?></p>
            <h1 class="mt-4 max-w-3xl font-heading text-4xl font-black leading-tight tracking-normal text-[#111111] md:text-5xl lg:text-6xl">
                <?php esc_html_e('Return & Refund Policy', 'dawp'); ?>
            </h1>
            <p class="mt-7 max-w-3xl text-base font-semibold leading-7 text-[#333333] md:text-lg">
                <?php esc_html_e('Thank you for shopping with Mytire. Our return policy is straightforward, transparent, and designed to provide you with the best shopping experience.', 'dawp'); ?>
            </p>
            <p class="mt-8 inline-flex min-h-11 items-center border border-[#111111] bg-[#111111] px-5 text-sm font-black uppercase tracking-wide text-white">
                <?php esc_html_e('Last Updated: May 19, 2026', 'dawp'); ?>
            </p>
        </div>
    </section>

    <section class="py-12 lg:py-16">
        <div class="mx-auto max-w-5xl px-5 sm:px-6 lg:px-8">
            <div class="grid border border-[#111111] sm:grid-cols-3">
                <div class="border-b border-[#111111] bg-white p-6 sm:border-b-0 sm:border-r">
                    <p class="text-xs font-black uppercase tracking-[0.2em] text-[#555555]"><?php esc_html_e('Return Window', 'dawp'); ?></p>
                    <p class="mt-3 font-heading text-2xl font-black leading-snug text-[#111111]"><?php esc_html_e('30 Days', 'dawp'); ?></p>
                </div>
                <div class="border-b border-[#111111] bg-white p-6 sm:border-b-0 sm:border-r">
                    <p class="text-xs font-black uppercase tracking-[0.2em] text-[#555555]"><?php esc_html_e('Restocking Fee', 'dawp'); ?></p>
                    <p class="mt-3 font-heading text-2xl font-black leading-snug text-[#111111]"><?php esc_html_e('$0 - None', 'dawp'); ?></p>
                </div>
                <div class="bg-[#111111] p-6 text-white">
                    <p class="text-xs font-black uppercase tracking-[0.2em] text-white/70"><?php esc_html_e('Support Response', 'dawp'); ?></p>
                    <p class="mt-3 font-heading text-2xl font-black leading-snug text-white"><?php esc_html_e('1-2 Business Days', 'dawp'); ?></p>
                </div>
            </div>

            <article class="mt-12 bg-white lg:mt-14">
                <h2 class="sr-only"><?php esc_html_e('Return & Refund Policy Details', 'dawp'); ?></h2>
                <div class="max-w-none text-base leading-7 text-[#222222] [&_a]:font-bold [&_a]:text-[#111111] [&_a]:underline [&_a]:decoration-2 [&_a]:underline-offset-4 [&_h3]:scroll-mt-24 [&_h3]:mt-12 [&_h3]:border-t [&_h3]:border-[#111111] [&_h3]:pt-8 [&_h3]:font-heading [&_h3]:text-2xl [&_h3]:font-black [&_h3]:leading-snug [&_h3]:text-[#111111] [&_h3:first-child]:mt-0 [&_li]:leading-7 [&_p+p]:mt-4">
                    <h3 id="return-window"><?php esc_html_e('1. Return Window', 'dawp'); ?></h3>
                    <p><?php esc_html_e('You have 30 days from the date of delivery to request a return for your eligible tires.', 'dawp'); ?></p>

                    <h3 id="return-conditions"><?php esc_html_e('2. Return Conditions', 'dawp'); ?></h3>
                    <p><?php esc_html_e('To be eligible for a return, your item must meet the following criteria:', 'dawp'); ?></p>
                    <ul class="mt-5 list-disc space-y-3 pl-6">
                        <li><strong><?php esc_html_e('Condition:', 'dawp'); ?></strong> <?php esc_html_e('The tire must be unused, unmounted, undriven, undamaged, and in its original condition.', 'dawp'); ?></li>
                        <li><strong><?php esc_html_e('Packaging:', 'dawp'); ?></strong> <?php esc_html_e('Original labels, tags, and packaging must be intact.', 'dawp'); ?></li>
                        <li><strong><?php esc_html_e('Proof of Purchase:', 'dawp'); ?></strong> <?php esc_html_e('A valid order number or order confirmation email is required.', 'dawp'); ?></li>
                    </ul>
                    <p class="mt-6 font-bold text-[#111111]"><?php esc_html_e('Non-Returnable Items:', 'dawp'); ?></p>
                    <ul class="mt-3 list-disc space-y-3 pl-6">
                        <li><?php esc_html_e('Tires that have been mounted, balanced, installed, or driven on.', 'dawp'); ?></li>
                        <li><?php esc_html_e('Tires damaged due to improper installation, misuse, or road hazards.', 'dawp'); ?></li>
                        <li><?php esc_html_e('Items marked as "Final Sale" or "Clearance" at the time of purchase.', 'dawp'); ?></li>
                    </ul>

                    <h3 id="return-shipping"><?php esc_html_e('3. Return Shipping & Fees', 'dawp'); ?></h3>
                    <ul class="mt-5 list-disc space-y-3 pl-6">
                        <li><strong><?php esc_html_e('Return Shipping Cost:', 'dawp'); ?></strong> <?php esc_html_e('If the return is due to our error, Mytire will cover 100% of the return shipping costs. For customer remorse, the customer is responsible for actual return shipping costs.', 'dawp'); ?></li>
                        <li><strong><?php esc_html_e('Restocking Fee:', 'dawp'); ?></strong> <?php esc_html_e('We do NOT charge any restocking fees ($0).', 'dawp'); ?></li>
                    </ul>

                    <h3 id="return-process"><?php esc_html_e('4. How to Initiate a Return', 'dawp'); ?></h3>
                    <ol class="mt-5 list-decimal space-y-3 pl-6">
                        <li><strong><?php esc_html_e('Contact Us:', 'dawp'); ?></strong> <?php esc_html_e('Email our support team at support@Mytire.co within 30 days of delivery. Please provide your order number, tire model/size, and clear photos of the items.', 'dawp'); ?></li>
                        <li><strong><?php esc_html_e('Get Return Authorization:', 'dawp'); ?></strong> <?php esc_html_e('Our team will review your request within 1-2 business days and provide return instructions. Please do not send items back without authorization.', 'dawp'); ?></li>
                        <li><strong><?php esc_html_e('Ship the Item:', 'dawp'); ?></strong> <?php esc_html_e('Securely pack the tires and ship them using a trackable shipping service.', 'dawp'); ?></li>
                    </ol>

                    <h3><?php esc_html_e('5. Damaged, Defective, or Incorrect Items', 'dawp'); ?></h3>
                    <p><?php esc_html_e('Please inspect your order upon arrival. If you receive a damaged, defective, or incorrect tire, contact us at support@Mytire.co within 7 days of delivery. We will arrange a free replacement or a full refund at no additional cost to you.', 'dawp'); ?></p>

                    <h3 id="refunds-exchanges"><?php esc_html_e('6. Refunds & Exchanges', 'dawp'); ?></h3>
                    <ul class="mt-5 list-disc space-y-3 pl-6">
                        <li><strong><?php esc_html_e('Refund Processing:', 'dawp'); ?></strong> <?php esc_html_e('Once we receive and inspect your returned item, approved refunds will be processed automatically to your original method of payment.', 'dawp'); ?></li>
                        <li><strong><?php esc_html_e('Timeline:', 'dawp'); ?></strong> <?php esc_html_e('Refunds are typically processed within 5-10 business days after we receive the return.', 'dawp'); ?></li>
                        <li><strong><?php esc_html_e('Exchanges:', 'dawp'); ?></strong> <?php esc_html_e('We offer exchanges for incorrect, damaged, or defective items. If the item is out of stock, a full refund will be issued.', 'dawp'); ?></li>
                    </ul>

                    <h3 id="contact-info"><?php esc_html_e('Contact Information', 'dawp'); ?></h3>
                    <p><?php esc_html_e('For any questions regarding our Return and Refund Policy, please contact us:', 'dawp'); ?></p>
                    <ul class="mt-5 list-disc space-y-3 pl-6">
                        <li><strong><?php esc_html_e('Company:', 'dawp'); ?></strong> <?php esc_html_e('TIRE CAPITAL LLC', 'dawp'); ?></li>
                        <li><strong><?php esc_html_e('Address:', 'dawp'); ?></strong> <?php esc_html_e('324 W Dickerson Ln, Middletown, DE 19709-8832', 'dawp'); ?></li>
                        <li><strong><?php esc_html_e('Email:', 'dawp'); ?></strong> <a href="mailto:support@Mytire.co">support@Mytire.co</a></li>
                        <li><strong><?php esc_html_e('Business Hours:', 'dawp'); ?></strong> <?php esc_html_e('Monday - Friday, 9:00 AM - 5:00 PM (GMT-05:00) Eastern Standard Time (New York)', 'dawp'); ?></li>
                        <li><strong><?php esc_html_e('Response Time:', 'dawp'); ?></strong> <?php esc_html_e('Within 1-2 business days', 'dawp'); ?></li>
                    </ul>
                </div>
            </article>
        </div>
    </section>
</div>
