<?php
/**
 * Template Name: Shipping Policy
 * Template Part: page-shipping-policy
 */

if (!function_exists('dawp_is_virtual_page_request') || !dawp_is_virtual_page_request()) {
    get_header();
}
?>

<main id="primary" class="bg-white font-body text-slickText">

    <section class="relative overflow-hidden bg-slickBlack text-white">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(34,197,94,0.35),transparent_34%),linear-gradient(135deg,#0B0F0D_0%,#123D2A_58%,#0B0F0D_100%)]"></div>
        <div class="absolute -right-24 top-16 h-80 w-80 rounded-full bg-slickActive/20 blur-3xl"></div>
        <div class="absolute -left-24 bottom-0 h-80 w-80 rounded-full bg-slickLime/10 blur-3xl"></div>

        <div class="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
            <div class="max-w-4xl">
                <p class="mb-5 text-sm font-black uppercase tracking-[0.24em] text-slickLime">
                    <?php esc_html_e('Customer Care', 'dawp'); ?>
                </p>

                <h1 class="font-heading text-5xl font-black uppercase leading-[0.92] tracking-[-0.05em] text-white sm:text-6xl lg:text-7xl">
                    <?php esc_html_e('Shipping Policy', 'dawp'); ?>
                </h1>

                <p class="mt-6 max-w-2xl text-lg leading-8 text-white/85">
                    <?php esc_html_e('Review Slicktee shipping locations, free standard U.S. shipping, processing windows, tracking details, and delivery support.', 'dawp'); ?>
                </p>

                <p class="mt-6 inline-flex rounded-md border border-white/15 bg-white/10 px-4 py-3 text-sm font-black uppercase tracking-wide text-white/85">
                    <?php esc_html_e('Last Updated: June 8, 2026', 'dawp'); ?>
                </p>
            </div>
        </div>
    </section>

    <section class="bg-slickSoft py-12 lg:py-16">
        <div class="policy-highlight-slider mx-auto grid max-w-7xl grid-cols-1 gap-5 px-4 sm:grid-cols-2 sm:px-6 lg:grid-cols-4 lg:px-8">

            <div class="rounded-md border border-[#E5E7EB] bg-white p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-md bg-slickGreen text-sm font-black text-white">01</div>
                <h2 class="font-heading text-2xl font-black uppercase text-slickText">
                    <?php esc_html_e('U.S. Only', 'dawp'); ?>
                </h2>
                <p class="mt-3 text-sm leading-6 text-slickMuted">
                    <?php esc_html_e('We currently ship exclusively within the United States domestic market.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-md border border-[#E5E7EB] bg-white p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-md bg-slickActive text-sm font-black text-slickBlack">02</div>
                <h2 class="font-heading text-2xl font-black uppercase text-slickText">
                    <?php esc_html_e('Free Standard', 'dawp'); ?>
                </h2>
                <p class="mt-3 text-sm leading-6 text-slickMuted">
                    <?php esc_html_e('Standard U.S. shipping is free on every order with no minimum purchase.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-md border border-[#E5E7EB] bg-white p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-md bg-slickGreen text-sm font-black text-white">03</div>
                <h2 class="font-heading text-2xl font-black uppercase text-slickText">
                    <?php esc_html_e('6-10 Days', 'dawp'); ?>
                </h2>
                <p class="mt-3 text-sm leading-6 text-slickMuted">
                    <?php esc_html_e('Estimated delivery is 6-10 business days from the date of purchase.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-md border border-[#E5E7EB] bg-white p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-md bg-slickLime text-sm font-black text-slickBlack">04</div>
                <h2 class="font-heading text-2xl font-black uppercase text-slickText">
                    <?php esc_html_e('Tracking Sent', 'dawp'); ?>
                </h2>
                <p class="mt-3 text-sm leading-6 text-slickMuted">
                    <?php esc_html_e('Tracking details are emailed after your package is dispatched.', 'dawp'); ?>
                </p>
            </div>

        </div>
    </section>

    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">

            <div class="space-y-8">

                <section id="locations" class="rounded-md border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Shipping Locations', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase text-slickText">
                        <?php esc_html_e('United States Domestic Shipping', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('We currently ship exclusively within the United States. Slicktee serves customers shopping from the United States domestic market.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('If a product, destination, or carrier limitation prevents delivery to your specific address, the order will not be available for that location, and you will be notified immediately at checkout before any payment is processed.', 'dawp'); ?>
                        </p>
                    </div>

                    <div class="mt-7 rounded-md border border-slickActive/40 bg-slickActive/10 p-5 text-sm leading-7 text-slickText">
                        <?php esc_html_e('Some apparel orders may ship separately if items are prepared from different fulfillment batches or require distinct specialized packing methods to ensure safe transit.', 'dawp'); ?>
                    </div>
                </section>

                <section id="fees" class="rounded-md border border-[#E5E7EB] bg-slickSoft p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Fees & Costs', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase text-slickText">
                        <?php esc_html_e('Transparent Shipping Costs', 'dawp'); ?>
                    </h2>

                    <p class="mt-5 text-base leading-8 text-slickMuted">
                        <?php esc_html_e('We believe in full transparency with no hidden fees at checkout. Our shipping costs are structured as follows:', 'dawp'); ?>
                    </p>

                    <div class="mt-7 grid grid-cols-1 gap-5 lg:grid-cols-2">
                        <div class="rounded-md border border-[#E5E7EB] bg-white p-6">
                            <h3 class="font-heading text-2xl font-black uppercase text-slickText">
                                <?php esc_html_e('Standard U.S. Shipping', 'dawp'); ?>
                            </h3>
                            <p class="mt-4 text-base leading-8 text-slickMuted">
                                <?php esc_html_e('Completely free for all orders nationwide. There is no minimum purchase requirement to qualify for free standard shipping.', 'dawp'); ?>
                            </p>
                        </div>

                        <div class="rounded-md border border-[#E5E7EB] bg-white p-6">
                            <h3 class="font-heading text-2xl font-black uppercase text-slickText">
                                <?php esc_html_e('Optional Upgraded Shipping', 'dawp'); ?>
                            </h3>
                            <p class="mt-4 text-base leading-8 text-slickMuted">
                                <?php esc_html_e('If expedited or assisted shipping services are available for your destination, the exact cost will be displayed clearly on the checkout page before you complete your payment.', 'dawp'); ?>
                            </p>
                        </div>
                    </div>
                </section>

                <section id="timelines" class="rounded-md border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Processing & Delivery', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase text-slickText">
                        <?php esc_html_e('Order Processing & Delivery Times', 'dawp'); ?>
                    </h2>

                    <p class="mt-5 text-base leading-8 text-slickMuted">
                        <?php esc_html_e('All shipping and handling timelines are calculated in business days, Monday through Friday, excluding standard U.S. public holidays.', 'dawp'); ?>
                    </p>

                    <div class="mt-7 grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div class="rounded-md border border-[#E5E7EB] bg-slickSoft p-5">
                            <p class="text-sm font-black uppercase tracking-wide text-slickText">
                                <?php esc_html_e('Order Cutoff Time', 'dawp'); ?>
                            </p>
                            <p class="mt-3 text-base leading-7 text-slickMuted">
                                <?php esc_html_e('5:00 PM (GMT-08:00) Pacific Standard Time.', 'dawp'); ?>
                            </p>
                        </div>

                        <div class="rounded-md border border-[#E5E7EB] bg-slickSoft p-5">
                            <p class="text-sm font-black uppercase tracking-wide text-slickText">
                                <?php esc_html_e('Order Handling Time', 'dawp'); ?>
                            </p>
                            <p class="mt-3 text-base leading-7 text-slickMuted">
                                <?php esc_html_e('1-3 business days. Orders placed after cutoff begin processing the following business day.', 'dawp'); ?>
                            </p>
                        </div>

                        <div class="rounded-md border border-[#E5E7EB] bg-slickSoft p-5">
                            <p class="text-sm font-black uppercase tracking-wide text-slickText">
                                <?php esc_html_e('Transit Time', 'dawp'); ?>
                            </p>
                            <p class="mt-3 text-base leading-7 text-slickMuted">
                                <?php esc_html_e('5-7 business days, Monday to Friday.', 'dawp'); ?>
                            </p>
                        </div>

                        <div class="rounded-md border border-[#E5E7EB] bg-slickSoft p-5">
                            <p class="text-sm font-black uppercase tracking-wide text-slickText">
                                <?php esc_html_e('Estimated Delivery Time', 'dawp'); ?>
                            </p>
                            <p class="mt-3 text-base leading-7 text-slickMuted">
                                <?php esc_html_e('6-10 business days total from the date of purchase.', 'dawp'); ?>
                            </p>
                        </div>
                    </div>

                    <p class="mt-6 text-base leading-8 text-slickMuted">
                        <?php esc_html_e('Delivery estimates are carefully calculated windows reflecting our standard delivery benchmarks. While we and our courier partners work diligently to meet these timelines, unexpected delays due to extreme weather, carrier capacity issues, or regional holidays may occasionally occur.', 'dawp'); ?>
                    </p>
                </section>

                <section id="multi-item" class="rounded-md border border-[#E5E7EB] bg-slickSoft p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Multi-Item Orders', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase text-slickText">
                        <?php esc_html_e('Specialized Handling', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('If your purchase includes multiple tees or diverse apparel items, they may be fulfilled from different locations. Consequently, your items may ship separately and arrive in multiple packages.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('You will receive unique tracking numbers for each package. Certain intricate or high-demand apparel items may require extra preparation time due to rigorous address reviews, holiday volume spikes, or safe-handling protocols.', 'dawp'); ?>
                        </p>
                    </div>
                </section>

                <section id="tracking" class="rounded-md border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Carrier Tracking', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase text-slickText">
                        <?php esc_html_e('Carrier Services & Delivery Tracking', 'dawp'); ?>
                    </h2>

                    <p class="mt-5 text-base leading-8 text-slickMuted">
                        <?php esc_html_e('To guarantee safe and efficient delivery, Slicktee partners with trusted domestic U.S. carriers. Orders are shipped using USPS, UPS, FedEx, or DHL.', 'dawp'); ?>
                    </p>

                    <div class="mt-6 flex flex-wrap gap-3">
                        <?php foreach (['USPS', 'UPS', 'FedEx', 'DHL'] as $carrier) : ?>
                            <span class="inline-flex min-h-10 min-w-16 items-center justify-center rounded-md border border-[#E5E7EB] bg-slickSoft px-5 text-sm font-black uppercase tracking-wide text-slickText">
                                <?php echo esc_html($carrier); ?>
                            </span>
                        <?php endforeach; ?>
                    </div>

                    <p class="mt-6 text-base leading-8 text-slickMuted">
                        <?php esc_html_e('The final carrier service is dynamically selected when your package is securely labeled and prepared at our fulfillment center. Once your order is dispatched, an automated shipping confirmation email containing a direct tracking link and courier details will be sent to your registered email address.', 'dawp'); ?>
                    </p>

                    <div class="mt-8">
                        <a href="<?php echo esc_url(home_url('/track-order/')); ?>"
                           class="inline-flex min-h-12 items-center justify-center rounded-md bg-slickBlack px-6 text-sm font-black uppercase tracking-wide text-white transition hover:bg-slickGreen">
                            <?php esc_html_e('Track Order', 'dawp'); ?>
                        </a>
                    </div>
                </section>

                <section id="issues" class="rounded-md border border-[#E5E7EB] bg-slickSoft p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickActive">
                        <?php esc_html_e('Delivery Issues', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black uppercase text-slickText">
                        <?php esc_html_e('Resolving Delivery Issues & Damaged Shipments', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('Your satisfaction is our priority. If your order encounters delays, tracking stops updating, or the package is marked as delivered but has not arrived, please reach out to our dedicated support team immediately.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('To help us investigate and resolve the issue with the carrier swiftly, please provide:', 'dawp'); ?>
                        </p>
                    </div>

                    <ul class="mt-6 grid gap-3 text-base leading-8 text-slickMuted">
                        <li class="flex gap-3"><span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span><span><?php esc_html_e('Your exact Order Number, such as #ST1001.', 'dawp'); ?></span></li>
                        <li class="flex gap-3"><span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span><span><?php esc_html_e('The specific Email Address utilized during checkout.', 'dawp'); ?></span></li>
                        <li class="flex gap-3"><span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span><span><?php esc_html_e('The full and complete Delivery Address.', 'dawp'); ?></span></li>
                        <li class="flex gap-3"><span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span><span><?php esc_html_e('Clear, well-lit photos if the package container or apparel item arrived damaged.', 'dawp'); ?></span></li>
                    </ul>

                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>"
                           class="inline-flex min-h-12 items-center justify-center rounded-md bg-slickBlack px-6 text-sm font-black uppercase tracking-wide text-white transition hover:bg-slickGreen">
                            <?php esc_html_e('Contact Support', 'dawp'); ?>
                        </a>

                        <a href="mailto:support@slicktee.com"
                           class="inline-flex min-h-12 items-center justify-center rounded-md border border-slickBlack px-6 text-sm font-black uppercase tracking-wide text-slickBlack transition hover:bg-slickBlack hover:text-white">
                            <?php esc_html_e('Email Support', 'dawp'); ?>
                        </a>
                    </div>
                </section>

                <section id="contact" class="overflow-hidden rounded-md bg-slickBlack text-white shadow-xl shadow-black/10">
                    <div class="p-7 lg:p-10">
                        <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-slickLime">
                            <?php esc_html_e('Customer Support', 'dawp'); ?>
                        </p>

                        <h2 class="font-heading text-4xl font-black uppercase leading-none">
                            <?php esc_html_e('Contact Information', 'dawp'); ?>
                        </h2>

                        <p class="mt-5 max-w-2xl text-base leading-8 text-white/80">
                            <?php esc_html_e('For any questions regarding your shipment, custom delivery requests, or transit inquiries, please contact us directly through our official channels. We respond to all inquiries within 24 business hours.', 'dawp'); ?>
                        </p>

                        <div class="mt-8 grid grid-cols-1 gap-4 lg:grid-cols-2">
                            <div class="rounded-md border border-white/10 bg-white/5 p-5">
                                <p class="text-xs font-black uppercase tracking-[0.2em] text-slickLime">
                                    <?php esc_html_e('Store Name', 'dawp'); ?>
                                </p>
                                <p class="mt-3 text-base font-bold text-white">
                                    <?php esc_html_e('Slicktee', 'dawp'); ?>
                                </p>
                            </div>

                            <div class="rounded-md border border-white/10 bg-white/5 p-5">
                                <p class="text-xs font-black uppercase tracking-[0.2em] text-slickLime">
                                    <?php esc_html_e('Customer Support Email', 'dawp'); ?>
                                </p>
                                <p class="mt-3 text-base font-bold text-white">
                                    <a href="mailto:support@slicktee.com" class="transition hover:text-slickLime">support@slicktee.com</a>
                                </p>
                            </div>

                            <div class="rounded-md border border-white/10 bg-white/5 p-5">
                                <p class="text-xs font-black uppercase tracking-[0.2em] text-slickLime">
                                    <?php esc_html_e('Address', 'dawp'); ?>
                                </p>
                                <p class="mt-3 text-base leading-7 text-white/80">
                                    <?php echo esc_html(dawp_get_store_address()); ?>
                                </p>
                            </div>

                            <div class="rounded-md border border-white/10 bg-white/5 p-5">
                                <p class="text-xs font-black uppercase tracking-[0.2em] text-slickLime">
                                    <?php esc_html_e('Response Time', 'dawp'); ?>
                                </p>
                                <p class="mt-3 text-base leading-7 text-white/80">
                                    <?php esc_html_e('Within 24 business hours.', 'dawp'); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </section>

</main>

<?php
if (!function_exists('dawp_is_virtual_page_request') || !dawp_is_virtual_page_request()) {
    get_footer();
}
