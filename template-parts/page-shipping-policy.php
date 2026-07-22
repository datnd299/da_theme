<?php
/**
 * Template Part: Shipping Policy Page
 */

?>

<section class="bg-[#F7F8FA] py-16 lg:py-24">
    <div class="mx-auto w-[min(100%-32px,1180px)]">
        <div class="mb-12 text-center">
            <span class="mb-4 block text-xs font-black uppercase tracking-[0.18em] text-[#D71920]"><?php esc_html_e('Shipping Policy', 'dawp'); ?></span>
            <h1 class="font-heading text-5xl font-black uppercase leading-none text-[#111827] md:text-6xl"><?php esc_html_e('Shipping Policy', 'dawp'); ?></h1>
            <p class="mx-auto mt-5 max-w-3xl text-lg leading-8 text-[#6B7280]">
                <?php esc_html_e('Last Updated: June 3, 2026', 'dawp'); ?>
            </p>
            <p class="mx-auto mt-4 max-w-3xl text-lg leading-8 text-[#6B7280]">
                <?php esc_html_e('This policy explains Shopmivo shipping locations, shipping fees, processing timelines, delivery tracking, and support steps for orders.', 'dawp'); ?>
            </p>
        </div>

        <div class="space-y-8">
                <section id="shipping-locations" class="rounded-xl border border-[#E5E7EB] bg-white p-8 shadow-card md:p-10">
                    <h2 class="font-heading text-3xl font-black uppercase text-[#111827]"><?php esc_html_e('Shipping Locations & Market', 'dawp'); ?></h2>
                    <div class="mt-5 space-y-4 leading-8 text-[#6B7280]">
                        <p><?php esc_html_e('We currently ship exclusively within the United States. Shopmivo serves customers shopping from the United States domestic market.', 'dawp'); ?></p>
                        <p><?php esc_html_e('If a product, destination, or carrier limitation prevents delivery to your specific address, the order will not be available for that location, and you will be notified immediately at checkout before any payment is processed.', 'dawp'); ?></p>
                    </div>
                    <div class="mt-6 border-l-4 border-[#D71920] bg-[#FFF7ED] p-6 leading-8 text-[#6B7280]">
                        <?php esc_html_e('Some orders may ship separately if items are prepared from different fulfillment batches or require distinct specialized packing methods to ensure safe transit.', 'dawp'); ?>
                    </div>
                </section>

                <section id="shipping-fees" class="rounded-xl border border-[#E5E7EB] bg-white p-8 shadow-card md:p-10">
                    <h2 class="font-heading text-3xl font-black uppercase text-[#111827]"><?php esc_html_e('Shipping Fees & Costs', 'dawp'); ?></h2>
                    <p class="mt-5 leading-8 text-[#6B7280]"><?php esc_html_e('We believe in full transparency with no hidden fees at checkout. Our shipping costs are structured as follows:', 'dawp'); ?></p>
                    <div class="mt-6 grid gap-5 md:grid-cols-2">
                        <div class="rounded-lg border border-[#E5E7EB] bg-[#F7F8FA] p-6">
                            <h3 class="text-xl font-black text-[#111827]"><?php esc_html_e('Standard U.S. Shipping', 'dawp'); ?></h3>
                            <p class="mt-3 leading-8 text-[#6B7280]"><?php esc_html_e('Completely free for all orders nationwide. There is no minimum purchase requirement to qualify for free standard shipping.', 'dawp'); ?></p>
                        </div>
                        <div class="rounded-lg border border-[#E5E7EB] bg-[#F7F8FA] p-6">
                            <h3 class="text-xl font-black text-[#111827]"><?php esc_html_e('Optional Upgraded Shipping', 'dawp'); ?></h3>
                            <p class="mt-3 leading-8 text-[#6B7280]"><?php esc_html_e('If expedited or assisted shipping services are available for your destination, the exact cost will be displayed clearly on the checkout page before you complete your payment.', 'dawp'); ?></p>
                        </div>
                    </div>
                </section>

                <section id="processing-delivery" class="rounded-xl border border-[#E5E7EB] bg-white p-8 shadow-card md:p-10">
                    <h2 class="font-heading text-3xl font-black uppercase text-[#111827]"><?php esc_html_e('Order Processing & Delivery Times', 'dawp'); ?></h2>
                    <p class="mt-5 leading-8 text-[#6B7280]"><?php esc_html_e('All shipping and handling timelines are calculated in business days, Monday through Friday, excluding standard U.S. public holidays.', 'dawp'); ?></p>
                    <div class="mt-6 grid gap-4 md:grid-cols-2 xl:grid-cols-4">
                        <div class="rounded-lg border border-[#E5E7EB] bg-[#F7F8FA] p-5">
                            <h3 class="font-black text-[#111827]"><?php esc_html_e('Order Cutoff Time', 'dawp'); ?></h3>
                            <p class="mt-3 text-sm leading-7 text-[#6B7280]"><?php esc_html_e('5:00 PM (GMT-08:00) Pacific Standard Time.', 'dawp'); ?></p>
                        </div>
                        <div class="rounded-lg border border-[#E5E7EB] bg-[#F7F8FA] p-5">
                            <h3 class="font-black text-[#111827]"><?php esc_html_e('Order Handling Time', 'dawp'); ?></h3>
                            <p class="mt-3 text-sm leading-7 text-[#6B7280]"><?php esc_html_e('1-3 business days. Orders placed after cutoff begin processing the following business day.', 'dawp'); ?></p>
                        </div>
                        <div class="rounded-lg border border-[#E5E7EB] bg-[#F7F8FA] p-5">
                            <h3 class="font-black text-[#111827]"><?php esc_html_e('Transit Time', 'dawp'); ?></h3>
                            <p class="mt-3 text-sm leading-7 text-[#6B7280]"><?php esc_html_e('5-7 business days, Monday to Friday.', 'dawp'); ?></p>
                        </div>
                        <div class="rounded-lg border border-[#E5E7EB] bg-[#F7F8FA] p-5">
                            <h3 class="font-black text-[#111827]"><?php esc_html_e('Estimated Delivery Time', 'dawp'); ?></h3>
                            <p class="mt-3 text-sm leading-7 text-[#6B7280]"><?php esc_html_e('6-10 business days total from the date of purchase.', 'dawp'); ?></p>
                        </div>
                    </div>
                    <p class="mt-6 leading-8 text-[#6B7280]"><?php esc_html_e('Delivery estimates are carefully calculated windows reflecting our standard delivery benchmarks. While we and our courier partners work diligently to meet these timelines, unexpected delays due to extreme weather, carrier capacity issues, or regional holidays may occasionally occur.', 'dawp'); ?></p>
                </section>

                <section id="multi-item-orders" class="rounded-xl border border-[#E5E7EB] bg-white p-8 shadow-card md:p-10">
                    <h2 class="font-heading text-3xl font-black uppercase text-[#111827]"><?php esc_html_e('Multi-Item Orders & Specialized Handling', 'dawp'); ?></h2>
                    <div class="mt-5 space-y-4 leading-8 text-[#6B7280]">
                        <p><?php esc_html_e('If your purchase includes multiple items or diverse product types, they may be fulfilled from different locations. Consequently, your items may ship separately and arrive in multiple packages.', 'dawp'); ?></p>
                        <p><?php esc_html_e('You will receive unique tracking numbers for each package. Certain special-handling or high-demand items may require extra preparation time due to rigorous address reviews, holiday volume spikes, or safe-handling protocols.', 'dawp'); ?></p>
                    </div>
                </section>

                <section id="carrier-tracking" class="rounded-xl border border-[#E5E7EB] bg-white p-8 shadow-card md:p-10">
                    <h2 class="font-heading text-3xl font-black uppercase text-[#111827]"><?php esc_html_e('Carrier Services & Delivery Tracking', 'dawp'); ?></h2>
                    <p class="mt-5 leading-8 text-[#6B7280]"><?php esc_html_e('To guarantee safe and efficient delivery, Shopmivo partners with trusted domestic U.S. carriers. Orders are shipped using USPS, UPS, FedEx, or DHL.', 'dawp'); ?></p>
                    <div class="mt-6 flex flex-wrap gap-3">
                        <?php foreach (['USPS', 'UPS', 'FedEx', 'DHL'] as $carrier) : ?>
                            <span class="inline-flex min-h-10 items-center rounded-full border border-[#E5E7EB] bg-white px-6 text-sm font-black text-[#111827]"><?php echo esc_html($carrier); ?></span>
                        <?php endforeach; ?>
                    </div>
                    <p class="mt-6 leading-8 text-[#6B7280]"><?php esc_html_e('The final carrier service is dynamically selected when your package is securely labeled and prepared at our fulfillment center. Once your order is dispatched, an automated shipping confirmation email containing a direct tracking link and courier details will be sent to your registered email address.', 'dawp'); ?></p>
                    <p class="mt-8">
                        <a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-lg border border-[#111827] px-7 text-sm font-black uppercase text-[#111827] hover:border-[#D71920] hover:text-[#D71920]"><?php esc_html_e('Track Order', 'dawp'); ?></a>
                    </p>
                </section>

                <section id="delivery-issues" class="rounded-xl border border-[#E5E7EB] bg-white p-8 shadow-card md:p-10">
                    <h2 class="font-heading text-3xl font-black uppercase text-[#111827]"><?php esc_html_e('Resolving Delivery Issues & Damaged Shipments', 'dawp'); ?></h2>
                    <div class="mt-5 space-y-4 leading-8 text-[#6B7280]">
                        <p><?php esc_html_e('Your satisfaction is our priority. If your order encounters delays, tracking stops updating, or the package is marked as delivered but has not arrived, please reach out to our dedicated support team immediately.', 'dawp'); ?></p>
                        <p><?php esc_html_e('To help us investigate and resolve the issue with the carrier swiftly, please provide:', 'dawp'); ?></p>
                    </div>
                    <ul class="mt-5 space-y-3 leading-8 text-[#6B7280]">
                        <li class="rounded-lg bg-[#F7F8FA] p-4"><?php esc_html_e('Your exact order number, such as #SM1001.', 'dawp'); ?></li>
                        <li class="rounded-lg bg-[#F7F8FA] p-4"><?php esc_html_e('The specific email address utilized during checkout.', 'dawp'); ?></li>
                        <li class="rounded-lg bg-[#F7F8FA] p-4"><?php esc_html_e('The full and complete delivery address.', 'dawp'); ?></li>
                        <li class="rounded-lg bg-[#F7F8FA] p-4"><?php esc_html_e('Clear, well-lit photos if the package container or item arrived damaged.', 'dawp'); ?></li>
                    </ul>
                    <p class="mt-8">
                        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-lg bg-[#D71920] px-7 text-sm font-black uppercase text-white hover:bg-[#A70F14]"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
                    </p>
                </section>

                <section id="support-contact" class="rounded-xl border border-dashed border-[#D71920]/35 bg-white p-8 shadow-card md:p-10">
                    <h2 class="font-heading text-3xl font-black uppercase text-[#111827]"><?php esc_html_e('Customer Support Contact Information', 'dawp'); ?></h2>
                    <p class="mt-4 leading-8 text-[#6B7280]"><?php esc_html_e('For any questions regarding your shipment, custom delivery requests, or transit inquiries, please contact us directly through our official channels. We respond to all inquiries within 24 business hours.', 'dawp'); ?></p>
                    <dl class="mt-6 grid gap-4 md:grid-cols-2">
                        <div class="rounded-lg bg-[#F7F8FA] p-5"><dt class="mb-2 text-xs font-black uppercase tracking-widest text-[#D71920]"><?php esc_html_e('Store Name', 'dawp'); ?></dt><dd class="font-bold text-[#111827]">Shopmivo</dd></div>
                        <div class="rounded-lg bg-[#F7F8FA] p-5"><dt class="mb-2 text-xs font-black uppercase tracking-widest text-[#D71920]"><?php esc_html_e('Customer Support Email', 'dawp'); ?></dt><dd class="font-bold text-[#111827]">support@shopmivo.com</dd></div>
                        <div class="rounded-lg bg-[#F7F8FA] p-5"><dt class="mb-2 text-xs font-black uppercase tracking-widest text-[#D71920]"><?php esc_html_e('Address', 'dawp'); ?></dt><dd class="font-bold text-[#111827]">1777 Canal St, Merced, CA 95340, United States</dd></div>
                        <div class="rounded-lg bg-[#F7F8FA] p-5"><dt class="mb-2 text-xs font-black uppercase tracking-widest text-[#D71920]"><?php esc_html_e('Response Time', 'dawp'); ?></dt><dd class="font-bold text-[#111827]"><?php esc_html_e('Within 24 business hours.', 'dawp'); ?></dd></div>
                    </dl>
                    <p class="mt-6"><a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="font-bold text-[#D71920] hover:underline"><?php esc_html_e('Contact Us', 'dawp'); ?></a></p>
                </section>
        </div>
    </div>
</section>
