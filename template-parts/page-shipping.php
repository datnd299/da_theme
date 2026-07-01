<?php
/**
 * Template Part: page-shipping
 */
?>

<div id="primary" class="bg-[#F4F6F8] font-body text-[#111827]">
    <section class="bg-[#0B1F33] py-14 text-white lg:py-20">
        <div class="mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
            <p class="text-sm font-black uppercase tracking-[0.18em] text-[#F97316]"><?php esc_html_e('Rubyinstar Customer Care', 'dawp'); ?></p>
            <h1 class="mt-3 font-heading text-4xl font-black leading-tight lg:text-6xl">
                <?php esc_html_e('Shipping Policy', 'dawp'); ?>
            </h1>
            <p class="mx-auto mt-4 max-w-3xl text-lg leading-8 text-[#D7DEE8]">
                <?php esc_html_e('Thank you for choosing Rubyinstar! We strive to process and deliver your tires as quickly and reliably as possible.', 'dawp'); ?>
            </p>
            <p class="mt-3 text-sm font-semibold uppercase tracking-wide text-[#B8C3D1]">
                <?php esc_html_e('Last Updated: May 19, 2026', 'dawp'); ?>
            </p>
        </div>
    </section>

    <section class="py-14 lg:py-20">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-5 sm:grid-cols-3 lg:gap-6">
                <div class="rounded-lg border border-[#E5E7EB] border-t-4 border-t-[#2563EB] bg-white p-6 shadow-sm">
                    <p class="text-sm font-bold uppercase tracking-wide text-[#5B6472]"><?php esc_html_e('Processing', 'dawp'); ?></p>
                    <p class="mt-3 font-heading text-2xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('1-2 Business Days', 'dawp'); ?></p>
                </div>
                <div class="rounded-lg border border-[#E5E7EB] border-t-4 border-t-[#2563EB] bg-white p-6 shadow-sm">
                    <p class="text-sm font-bold uppercase tracking-wide text-[#5B6472]"><?php esc_html_e('US Transit', 'dawp'); ?></p>
                    <p class="mt-3 font-heading text-2xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('3-5 Business Days', 'dawp'); ?></p>
                </div>
                <div class="rounded-lg border border-[#E5E7EB] border-t-4 border-t-[#F97316] bg-white p-6 shadow-sm">
                    <p class="text-sm font-bold uppercase tracking-wide text-[#5B6472]"><?php esc_html_e('Shipping Cost', 'dawp'); ?></p>
                    <p class="mt-3 font-heading text-2xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('FREE', 'dawp'); ?></p>
                </div>
            </div>

            <div class="mt-12 grid gap-10 lg:mt-14 lg:grid-cols-[240px_minmax(0,1fr)] lg:items-start lg:gap-10">
                <aside class="rounded-lg border border-[#E5E7EB] bg-white p-5 shadow-sm lg:sticky lg:top-24">
                    <p class="text-xs font-black uppercase tracking-[0.16em] text-[#5B6472]"><?php esc_html_e('Policy Sections', 'dawp'); ?></p>
                    <nav class="mt-5 space-y-3" aria-label="<?php esc_attr_e('Shipping policy sections', 'dawp'); ?>">
                        <a class="block rounded-md border border-transparent px-4 py-3 text-sm font-bold leading-5 text-[#111827] transition hover:border-[#2563EB] hover:bg-[#EFF6FF]" href="#shipping-timelines"><?php esc_html_e('Timelines & Costs', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-4 py-3 text-sm font-bold leading-5 text-[#111827] transition hover:border-[#2563EB] hover:bg-[#EFF6FF]" href="#order-tracking"><?php esc_html_e('Order Tracking', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-4 py-3 text-sm font-bold leading-5 text-[#111827] transition hover:border-[#2563EB] hover:bg-[#EFF6FF]" href="#address-accuracy"><?php esc_html_e('Address Accuracy', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-4 py-3 text-sm font-bold leading-5 text-[#111827] transition hover:border-[#2563EB] hover:bg-[#EFF6FF]" href="#lost-delayed"><?php esc_html_e('Lost & Delayed Packages', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-4 py-3 text-sm font-bold leading-5 text-[#111827] transition hover:border-[#2563EB] hover:bg-[#EFF6FF]" href="#fitment-disclaimer"><?php esc_html_e('Fitment Disclaimer', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-4 py-3 text-sm font-bold leading-5 text-[#111827] transition hover:border-[#2563EB] hover:bg-[#EFF6FF]" href="#shipping-contact"><?php esc_html_e('Contact Information', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-4 py-3 text-sm font-bold leading-5 text-[#F97316] transition hover:border-[#F97316] hover:bg-[#FFF7ED]" href="<?php echo esc_url(home_url('/returns-policy/')); ?>"><?php esc_html_e('Return & Refund Policy &rarr;', 'dawp'); ?></a>
                    </nav>
                </aside>

                <div class="space-y-10">
                    <article class="scroll-mt-24 rounded-lg border border-[#E5E7EB] bg-white p-5 shadow-sm sm:p-7 lg:p-10">
                        <div class="mb-6 inline-flex h-12 w-12 items-center justify-center rounded-full bg-[#2563EB] text-white">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h11v8H3zM14 10h4l3 3v2h-7zM7 19a2 2 0 100-4 2 2 0 000 4zM18 19a2 2 0 100-4 2 2 0 000 4z" />
                            </svg>
                        </div>
                        <h2 class="font-heading text-3xl font-black leading-tight text-[#0B1F33]"><?php esc_html_e('Shipping Policy', 'dawp'); ?></h2>
                        <div class="mt-6 max-w-none text-base leading-7 text-[#4B5563] [&_h3+div]:mt-5 [&_h3+p]:mt-5 [&_li]:leading-7 [&_p+p]:mt-4">

                            <h3 id="shipping-timelines" class="scroll-mt-24 mt-10 rounded-md border-l-4 border-[#2563EB] bg-[#EFF6FF] px-5 py-4 text-xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('1. Shipping Timelines & Costs', 'dawp'); ?></h3>
                            <p><?php esc_html_e('We ship to the United States (excluding Alaska, Hawaii, and US Territories). All orders undergo processing before they are dispatched.', 'dawp'); ?></p>
                            <div class="mt-5 overflow-x-auto rounded-lg border border-[#E5E7EB]">
                                <table class="w-full min-w-[560px] table-fixed text-left text-sm leading-6 md:min-w-0">
                                    <thead class="bg-[#F4F6F8] text-[#0B1F33]">
                                        <tr>
                                            <th class="w-[22%] px-4 py-4 font-bold"><?php esc_html_e('Destination', 'dawp'); ?></th>
                                            <th class="w-[23%] px-4 py-4 font-bold"><?php esc_html_e('Processing Time', 'dawp'); ?></th>
                                            <th class="w-[23%] px-4 py-4 font-bold"><?php esc_html_e('Transit Time', 'dawp'); ?></th>
                                            <th class="w-[32%] px-4 py-4 font-bold"><?php esc_html_e('Shipping Cost', 'dawp'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-[#E5E7EB]">
                                        <tr>
                                            <td class="px-4 py-4 align-top"><?php esc_html_e('United States', 'dawp'); ?></td>
                                            <td class="px-4 py-4 align-top"><?php esc_html_e('1–2 business days', 'dawp'); ?></td>
                                            <td class="px-4 py-4 align-top"><?php esc_html_e('3–5 business days', 'dawp'); ?></td>
                                            <td class="px-4 py-4 align-top font-bold text-[#16A34A]"><?php esc_html_e('FREE', 'dawp'); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <ul class="mt-5 list-disc space-y-3 pl-6">
                                <li><strong><?php esc_html_e('Business Days:', 'dawp'); ?></strong> <?php esc_html_e('Monday through Friday, excluding U.S. public holidays and carrier holidays.', 'dawp'); ?></li>
                                <li><strong><?php esc_html_e('Shipping Cost:', 'dawp'); ?></strong> <?php esc_html_e('Rubyinstar offers Free Standard Shipping on all tire orders within our standard delivery zones. There are no hidden shipping fees at checkout.', 'dawp'); ?></li>
                            </ul>

                            <h3 id="order-tracking" class="scroll-mt-24 mt-10 rounded-md border-l-4 border-[#2563EB] bg-[#EFF6FF] px-5 py-4 text-xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('2. Order Tracking', 'dawp'); ?></h3>
                            <ul class="mt-5 list-disc space-y-3 pl-6">
                                <li><strong><?php esc_html_e('Tracking Information:', 'dawp'); ?></strong> <?php esc_html_e('Once your order ships, we will send you a shipping confirmation email containing a tracking number and a link to track your shipment.', 'dawp'); ?></li>
                                <li><strong><?php esc_html_e('Update Delays:', 'dawp'); ?></strong> <?php esc_html_e('Please allow 24–48 hours for the tracking information to update once the carrier receives the package.', 'dawp'); ?></li>
                            </ul>

                            <h3 id="address-accuracy" class="scroll-mt-24 mt-10 rounded-md border-l-4 border-[#2563EB] bg-[#EFF6FF] px-5 py-4 text-xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('3. Address Accuracy & Changes', 'dawp'); ?></h3>
                            <ul class="mt-5 list-disc space-y-3 pl-6">
                                <li><strong><?php esc_html_e('Accuracy:', 'dawp'); ?></strong> <?php esc_html_e('Customers are responsible for ensuring the shipping address (recipient name, street, unit, city, state, ZIP code, and phone number) is complete and accurate at checkout.', 'dawp'); ?></li>
                                <li><strong><?php esc_html_e('Modifications:', 'dawp'); ?></strong> <?php esc_html_e('Address changes or order cancellations can only be accommodated before the order enters the fulfillment process (usually within a few hours of placing the order).', 'dawp'); ?></li>
                                <li><strong><?php esc_html_e('Returned Packages:', 'dawp'); ?></strong> <?php esc_html_e('If a package is returned to us due to an undeliverable or incorrect address, we will contact you to arrange reshipment at the customer\'s expense or issue a refund for the product minus the actual shipping costs.', 'dawp'); ?></li>
                            </ul>

                            <h3 id="lost-delayed" class="scroll-mt-24 mt-10 rounded-md border-l-4 border-[#2563EB] bg-[#EFF6FF] px-5 py-4 text-xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('4. Lost, Delayed, or Stolen Packages', 'dawp'); ?></h3>
                            <ul class="mt-5 list-disc space-y-3 pl-6">
                                <li><strong><?php esc_html_e('Delayed Shipments:', 'dawp'); ?></strong> <?php esc_html_e('If your tracking information shows no movement after the estimated delivery window has passed, please contact us at support@rubyinstar.com so we can investigate with the carrier.', 'dawp'); ?></li>
                                <li><strong><?php esc_html_e('Stolen or Missing (Showing "Delivered"):', 'dawp'); ?></strong> <?php esc_html_e('If the carrier\'s tracking system marks your package as "Delivered" but you cannot locate it, please check with household members, neighbors, building management, or the local post office first. While Rubyinstar is not responsible for theft after delivery, we are fully committed to helping you file a claim and locate your tires.', 'dawp'); ?></li>
                                <li><strong><?php esc_html_e('Lost in Transit:', 'dawp'); ?></strong> <?php esc_html_e('If a package is confirmed lost by the carrier prior to delivery, we will gladly send a replacement or issue a full refund.', 'dawp'); ?></li>
                            </ul>

                            <h3 id="fitment-disclaimer" class="scroll-mt-24 mt-10 rounded-md border-l-4 border-[#F97316] bg-[#FFF7ED] px-5 py-4 text-xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('5. Tire Fitment Disclaimer', 'dawp'); ?></h3>
                            <p><?php esc_html_e('Please double-check your tire size, rim size, load index, speed rating, and vehicle compatibility before finalizing your order. While we provide detailed specifications to help you choose, the customer is ultimately responsible for ensuring the selected tire is appropriate for their vehicle.', 'dawp'); ?></p>

                            <h3 id="shipping-contact" class="scroll-mt-24 mt-10 rounded-md border-l-4 border-[#2563EB] bg-[#EFF6FF] px-5 py-4 text-xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('Contact Information', 'dawp'); ?></h3>
                            <p><?php esc_html_e('If you have any questions or need assistance with your shipment, please reach out to us:', 'dawp'); ?></p>
                            <ul class="mt-5 list-disc space-y-3 pl-6">
                                <li><strong><?php esc_html_e('Company:', 'dawp'); ?></strong> <?php esc_html_e('TIRE CAPITAL LLC', 'dawp'); ?></li>
                                <li><strong><?php esc_html_e('Address:', 'dawp'); ?></strong> <?php esc_html_e('324 W Dickerson Ln, Middletown, DE 19709-8832', 'dawp'); ?></li>
                                <li><strong><?php esc_html_e('Email:', 'dawp'); ?></strong> <a href="mailto:support@rubyinstar.com" class="text-[#2563EB] underline hover:no-underline">support@rubyinstar.com</a></li>
                                <li><strong><?php esc_html_e('Support Hours:', 'dawp'); ?></strong> <?php esc_html_e('Monday – Friday, 9:00 AM – 5:00 PM (GMT-05:00) Eastern Standard Time (New York)', 'dawp'); ?></li>
                            </ul>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
</div>
