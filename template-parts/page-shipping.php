<?php
/**
 * Template Part: page-shipping
 */

?>

<div id="primary" class="mytire-policy-page mytire-shipping-minimal bg-white font-body text-[#111111]">
    <section class="mytire-policy-cover border-b border-[#111111] bg-white">
        <div class="mx-auto w-full max-w-5xl px-5 py-12 sm:px-6 lg:px-8 lg:py-14">
            <p class="text-xs font-black uppercase tracking-[0.22em] text-[#111111]"><?php esc_html_e('Mytire Customer Care', 'dawp'); ?></p>
            <h1 class="mt-4 max-w-3xl font-heading text-4xl font-black leading-tight tracking-normal text-[#111111] md:text-5xl lg:text-6xl">
                <?php esc_html_e('Shipping Policy', 'dawp'); ?>
            </h1>
            <p class="mt-7 max-w-2xl text-base font-semibold leading-7 text-[#333333] md:text-lg">
                <?php esc_html_e('Thank you for choosing Mytire! We strive to process and deliver your tires as quickly and reliably as possible.', 'dawp'); ?>
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
                    <p class="text-xs font-black uppercase tracking-[0.2em] text-[#555555]"><?php esc_html_e('Processing', 'dawp'); ?></p>
                    <p class="mt-3 font-heading text-2xl font-black leading-snug text-[#111111]"><?php esc_html_e('1-2 Business Days', 'dawp'); ?></p>
                </div>
                <div class="border-b border-[#111111] bg-white p-6 sm:border-b-0 sm:border-r">
                    <p class="text-xs font-black uppercase tracking-[0.2em] text-[#555555]"><?php esc_html_e('US Transit', 'dawp'); ?></p>
                    <p class="mt-3 font-heading text-2xl font-black leading-snug text-[#111111]"><?php esc_html_e('3-5 Business Days', 'dawp'); ?></p>
                </div>
                <div class="bg-[#111111] p-6 text-white">
                    <p class="text-xs font-black uppercase tracking-[0.2em] text-white/70"><?php esc_html_e('Shipping Cost', 'dawp'); ?></p>
                    <p class="mt-3 font-heading text-2xl font-black leading-snug text-white"><?php esc_html_e('FREE', 'dawp'); ?></p>
                </div>
            </div>

            <div class="mt-12 lg:mt-14">
                <article class="scroll-mt-24 bg-white">
                    <h2 class="sr-only"><?php esc_html_e('Shipping Policy Details', 'dawp'); ?></h2>
                    <div class="max-w-none text-base leading-7 text-[#222222] [&_h3+div]:mt-5 [&_h3+p]:mt-5 [&_li]:leading-7 [&_p+p]:mt-4">

                            <h3 id="shipping-timelines" class="scroll-mt-24 border-t border-[#111111] pt-8 text-2xl font-black leading-snug text-[#111111]"><?php esc_html_e('1. Shipping Timelines & Costs', 'dawp'); ?></h3>
                            <p><?php esc_html_e('We ship to the United States (excluding Alaska, Hawaii, and US Territories). All orders undergo processing before they are dispatched.', 'dawp'); ?></p>
                            <div class="mt-5 overflow-x-auto border border-[#111111]">
                                <table class="w-full min-w-[560px] table-fixed text-left text-sm leading-6 md:min-w-0">
                                    <thead class="bg-[#111111] text-white">
                                        <tr>
                                            <th class="w-[22%] px-4 py-4 font-bold"><?php esc_html_e('Destination', 'dawp'); ?></th>
                                            <th class="w-[23%] px-4 py-4 font-bold"><?php esc_html_e('Processing Time', 'dawp'); ?></th>
                                            <th class="w-[23%] px-4 py-4 font-bold"><?php esc_html_e('Transit Time', 'dawp'); ?></th>
                                            <th class="w-[32%] px-4 py-4 font-bold"><?php esc_html_e('Shipping Cost', 'dawp'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-[#111111]">
                                        <tr>
                                            <td class="px-4 py-4 align-top"><?php esc_html_e('United States', 'dawp'); ?></td>
                                            <td class="px-4 py-4 align-top"><?php esc_html_e('1–2 business days', 'dawp'); ?></td>
                                            <td class="px-4 py-4 align-top"><?php esc_html_e('3–5 business days', 'dawp'); ?></td>
                                            <td class="px-4 py-4 align-top font-black text-[#111111]"><?php esc_html_e('FREE', 'dawp'); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <ul class="mt-5 list-disc space-y-3 pl-6">
                                <li><strong><?php esc_html_e('Business Days:', 'dawp'); ?></strong> <?php esc_html_e('Monday through Friday, excluding U.S. public holidays and carrier holidays.', 'dawp'); ?></li>
                                <li><strong><?php esc_html_e('Shipping Cost:', 'dawp'); ?></strong> <?php esc_html_e('Mytire offers Free Standard Shipping on all tire orders within our standard delivery zones. There are no hidden shipping fees at checkout.', 'dawp'); ?></li>
                            </ul>

                            <h3 id="order-tracking" class="scroll-mt-24 mt-12 border-t border-[#111111] pt-8 text-2xl font-black leading-snug text-[#111111]"><?php esc_html_e('2. Order Tracking', 'dawp'); ?></h3>
                            <ul class="mt-5 list-disc space-y-3 pl-6">
                                <li><strong><?php esc_html_e('Tracking Information:', 'dawp'); ?></strong> <?php esc_html_e('Once your order ships, we will send you a shipping confirmation email containing a tracking number and a link to track your shipment.', 'dawp'); ?></li>
                                <li><strong><?php esc_html_e('Update Delays:', 'dawp'); ?></strong> <?php esc_html_e('Please allow 24–48 hours for the tracking information to update once the carrier receives the package.', 'dawp'); ?></li>
                            </ul>

                            <h3 id="address-accuracy" class="scroll-mt-24 mt-12 border-t border-[#111111] pt-8 text-2xl font-black leading-snug text-[#111111]"><?php esc_html_e('3. Address Accuracy & Changes', 'dawp'); ?></h3>
                            <ul class="mt-5 list-disc space-y-3 pl-6">
                                <li><strong><?php esc_html_e('Accuracy:', 'dawp'); ?></strong> <?php esc_html_e('Customers are responsible for ensuring the shipping address (recipient name, street, unit, city, state, ZIP code, and phone number) is complete and accurate at checkout.', 'dawp'); ?></li>
                                <li><strong><?php esc_html_e('Modifications:', 'dawp'); ?></strong> <?php esc_html_e('Address changes or order cancellations can only be accommodated before the order enters the fulfillment process (usually within a few hours of placing the order).', 'dawp'); ?></li>
                                <li><strong><?php esc_html_e('Returned Packages:', 'dawp'); ?></strong> <?php esc_html_e('If a package is returned to us due to an undeliverable or incorrect address, we will contact you to arrange reshipment at the customer\'s expense or issue a refund for the product minus the actual shipping costs.', 'dawp'); ?></li>
                            </ul>

                            <h3 id="lost-delayed" class="scroll-mt-24 mt-12 border-t border-[#111111] pt-8 text-2xl font-black leading-snug text-[#111111]"><?php esc_html_e('4. Lost, Delayed, or Stolen Packages', 'dawp'); ?></h3>
                            <ul class="mt-5 list-disc space-y-3 pl-6">
                                <li><strong><?php esc_html_e('Delayed Shipments:', 'dawp'); ?></strong> <?php esc_html_e('If your tracking information shows no movement after the estimated delivery window has passed, please contact us at support@Mytire.co so we can investigate with the carrier.', 'dawp'); ?></li>
                                <li><strong><?php esc_html_e('Stolen or Missing (Showing "Delivered"):', 'dawp'); ?></strong> <?php esc_html_e('If the carrier\'s tracking system marks your package as "Delivered" but you cannot locate it, please check with household members, neighbors, building management, or the local post office first. While Mytire is not responsible for theft after delivery, we are fully committed to helping you file a claim and locate your tires.', 'dawp'); ?></li>
                                <li><strong><?php esc_html_e('Lost in Transit:', 'dawp'); ?></strong> <?php esc_html_e('If a package is confirmed lost by the carrier prior to delivery, we will gladly send a replacement or issue a full refund.', 'dawp'); ?></li>
                            </ul>

                            <h3 id="fitment-disclaimer" class="scroll-mt-24 mt-12 border-t border-[#111111] pt-8 text-2xl font-black leading-snug text-[#111111]"><?php esc_html_e('5. Tire Fitment Disclaimer', 'dawp'); ?></h3>
                            <p><?php esc_html_e('Please double-check your tire size, rim size, load index, speed rating, and vehicle compatibility before finalizing your order. While we provide detailed specifications to help you choose, the customer is ultimately responsible for ensuring the selected tire is appropriate for their vehicle.', 'dawp'); ?></p>

                            <h3 id="shipping-contact" class="scroll-mt-24 mt-12 border-t border-[#111111] pt-8 text-2xl font-black leading-snug text-[#111111]"><?php esc_html_e('Contact Information', 'dawp'); ?></h3>
                            <p><?php esc_html_e('If you have any questions or need assistance with your shipment, please reach out to us:', 'dawp'); ?></p>
                            <ul class="mt-5 list-disc space-y-3 pl-6">
                                <li><strong><?php esc_html_e('Company:', 'dawp'); ?></strong> <?php esc_html_e('TIRE CAPITAL LLC', 'dawp'); ?></li>
                                <li><strong><?php esc_html_e('Address:', 'dawp'); ?></strong> <?php esc_html_e('324 W Dickerson Ln, Middletown, DE 19709-8832', 'dawp'); ?></li>
                                <li><strong><?php esc_html_e('Email:', 'dawp'); ?></strong> <a href="mailto:support@Mytire.co" class="font-bold text-[#111111] underline decoration-2 underline-offset-4 hover:no-underline">support@Mytire.co</a></li>
                                <li><strong><?php esc_html_e('Support Hours:', 'dawp'); ?></strong> <?php esc_html_e('Monday – Friday, 9:00 AM – 5:00 PM (GMT-05:00) Eastern Standard Time (New York)', 'dawp'); ?></li>
                            </ul>
                    </div>
                </article>
            </div>
        </div>
    </section>
</div>
