<?php
/**
 * Template Part: page-shipping-policy
 */
?>

<div id="primary" class="bg-[#FBFCFA] font-body text-[#2D2633]">
    <section class="bg-[#F6F7F9] py-14 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
            <p class="text-sm font-black uppercase tracking-[0.18em] text-[#6B6470]">
                <?php esc_html_e('One Shop Vibe Delivery Guide', 'dawp'); ?>
            </p>
            <h1 class="mt-3 font-heading text-4xl font-black leading-tight text-[#2D2633] lg:text-6xl">
                <?php esc_html_e('Shipping Policy', 'dawp'); ?>
            </h1>
            <p class="mx-auto mt-4 max-w-3xl text-lg leading-8 text-[#6B6470]">
                <?php esc_html_e('Clear shipping locations, costs, processing times, delivery tracking, and support details for One Shop Vibe orders.', 'dawp'); ?>
            </p>
            <p class="mt-3 text-sm font-semibold uppercase tracking-wide text-[#6B6470]">
                <?php esc_html_e('Last Updated: June 11, 2026', 'dawp'); ?>
            </p>
        </div>
    </section>

    <section class="py-12 lg:py-16">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <div>
                <article class="rounded-lg border border-[#E5E7EB] bg-white p-6 shadow-sm sm:p-8 lg:p-10">
                    <div class="max-w-none text-base leading-8 text-[#6B6470]
                        [&_h2]:scroll-mt-24 [&_h2]:mt-10 [&_h2]:border-t [&_h2]:border-[#E8E6EB] [&_h2]:pt-8 [&_h2]:font-heading [&_h2]:text-2xl [&_h2]:font-black [&_h2]:leading-tight [&_h2]:text-[#2D2633] md:[&_h2]:text-3xl
                        [&_h3]:mt-7 [&_h3]:font-heading [&_h3]:text-xl [&_h3]:font-bold [&_h3]:leading-snug [&_h3]:text-[#2D2633]
                        [&_li]:leading-7 [&_li]:pl-1 [&_p]:mb-5 [&_strong]:font-bold [&_strong]:text-[#2D2633] [&_ul]:mb-8 [&_ul]:mt-4 [&_ul]:list-disc [&_ul]:space-y-3 [&_ul]:pl-6">
                        <p class="rounded-lg border border-[#F7E4A3] bg-[#FFF9E6] p-4 font-medium text-[#2D2633]">
                            <?php esc_html_e('Standard U.S. shipping is free on every order. Most orders arrive within 6-10 business days after purchase, including order handling and carrier transit time.', 'dawp'); ?>
                        </p>

                        <h2 id="shipping-overview"><?php esc_html_e('Shipping Locations & Market', 'dawp'); ?></h2>
                        <p><?php esc_html_e('We currently ship exclusively within the United States. One Shop Vibe serves customers shopping from the United States domestic market.', 'dawp'); ?></p>
                        <p><?php esc_html_e('If a product, destination, or carrier limitation prevents delivery to your specific address, the order will not be available for that location, and you will be notified immediately at checkout before any payment is processed.', 'dawp'); ?></p>
                        <p class="rounded-lg border border-[#E5E7EB] bg-[#F6F7F9] p-4 text-[#2D2633]">
                            <?php esc_html_e('Some beauty and personal care orders may ship separately if items are prepared from different fulfillment batches or require distinct specialized packing methods to ensure safe transit.', 'dawp'); ?>
                        </p>

                        <h2 id="shipping-costs"><?php esc_html_e('Shipping Fees & Costs', 'dawp'); ?></h2>
                        <p><?php esc_html_e('We believe in full transparency with no hidden fees at checkout. Our shipping costs are structured as follows:', 'dawp'); ?></p>
                        <div class="not-prose my-6 grid gap-4 md:grid-cols-2">
                            <div class="rounded-lg border border-[#E5E7EB] bg-[#FBFCFA] p-5">
                                <p class="text-sm font-black uppercase tracking-wide text-[#6B6470]"><?php esc_html_e('Standard U.S. Shipping', 'dawp'); ?></p>
                                <p class="mt-2 font-heading text-3xl font-black text-[#2D2633]"><?php esc_html_e('$0.00', 'dawp'); ?></p>
                                <p class="mt-3 leading-7 text-[#6B6470]"><?php esc_html_e('Completely free for all orders nationwide. There is no minimum purchase requirement to qualify for free standard shipping.', 'dawp'); ?></p>
                            </div>
                            <div class="rounded-lg border border-[#E5E7EB] bg-[#FBFCFA] p-5">
                                <p class="text-sm font-black uppercase tracking-wide text-[#6B6470]"><?php esc_html_e('Optional Upgraded Shipping', 'dawp'); ?></p>
                                <p class="mt-2 font-heading text-3xl font-black text-[#2D2633]"><?php esc_html_e('Shown at Checkout', 'dawp'); ?></p>
                                <p class="mt-3 leading-7 text-[#6B6470]"><?php esc_html_e('If expedited or assisted shipping services are available for your destination, the exact cost will be displayed clearly on the checkout page before you complete your payment.', 'dawp'); ?></p>
                            </div>
                        </div>

                        <h2 id="shipping-timeline"><?php esc_html_e('Order Processing & Delivery Times', 'dawp'); ?></h2>
                        <p><?php esc_html_e('All shipping and handling timelines are calculated in business days, Monday through Friday, excluding standard U.S. public holidays.', 'dawp'); ?></p>
                        <div class="not-prose my-6 grid gap-4 sm:grid-cols-2">
                            <div class="rounded-lg border border-[#E5E7EB] bg-white p-5 shadow-sm">
                                <p class="text-sm font-black uppercase tracking-wide text-[#6B6470]"><?php esc_html_e('Order Cutoff Time', 'dawp'); ?></p>
                                <p class="mt-2 font-heading text-2xl font-black text-[#2D2633]"><?php esc_html_e('5:00 PM PST', 'dawp'); ?></p>
                                <p class="mt-3 leading-7 text-[#6B6470]"><?php esc_html_e('GMT-08:00 Pacific Standard Time.', 'dawp'); ?></p>
                            </div>
                            <div class="rounded-lg border border-[#E5E7EB] bg-white p-5 shadow-sm">
                                <p class="text-sm font-black uppercase tracking-wide text-[#6B6470]"><?php esc_html_e('Order Handling Time', 'dawp'); ?></p>
                                <p class="mt-2 font-heading text-2xl font-black text-[#2D2633]"><?php esc_html_e('1-3 Business Days', 'dawp'); ?></p>
                                <p class="mt-3 leading-7 text-[#6B6470]"><?php esc_html_e('Orders placed after cutoff begin processing the following business day.', 'dawp'); ?></p>
                            </div>
                            <div class="rounded-lg border border-[#E5E7EB] bg-white p-5 shadow-sm">
                                <p class="text-sm font-black uppercase tracking-wide text-[#6B6470]"><?php esc_html_e('Transit Time', 'dawp'); ?></p>
                                <p class="mt-2 font-heading text-2xl font-black text-[#2D2633]"><?php esc_html_e('5-7 Business Days', 'dawp'); ?></p>
                                <p class="mt-3 leading-7 text-[#6B6470]"><?php esc_html_e('Monday through Friday after courier dispatch.', 'dawp'); ?></p>
                            </div>
                            <div class="rounded-lg border border-[#E5E7EB] bg-white p-5 shadow-sm">
                                <p class="text-sm font-black uppercase tracking-wide text-[#6B6470]"><?php esc_html_e('Estimated Delivery Time', 'dawp'); ?></p>
                                <p class="mt-2 font-heading text-2xl font-black text-[#2D2633]"><?php esc_html_e('6-10 Business Days', 'dawp'); ?></p>
                                <p class="mt-3 leading-7 text-[#6B6470]"><?php esc_html_e('Total estimated window from the date of purchase.', 'dawp'); ?></p>
                            </div>
                        </div>
                        <p><?php esc_html_e('Delivery estimates are carefully calculated windows reflecting our standard delivery benchmarks. While we and our courier partners work diligently to meet these timelines, unexpected delays due to extreme weather, carrier capacity issues, or regional holidays may occasionally occur.', 'dawp'); ?></p>

                        <h2><?php esc_html_e('Multi-Item Orders & Specialized Handling', 'dawp'); ?></h2>
                        <p><?php esc_html_e('If your purchase includes multiple beauty accessories, makeup tools, hair care essentials, personal care tools, organizers, or related products, they may be fulfilled from different locations. Consequently, your items may ship separately and arrive in multiple packages.', 'dawp'); ?></p>
                        <p><?php esc_html_e('You will receive unique tracking numbers for each package. Certain delicate, hygiene-sensitive, or high-demand beauty and personal care items may require extra preparation time due to rigorous address reviews, holiday volume spikes, or safe-handling protocols.', 'dawp'); ?></p>

                        <h2 id="shipping-tracking"><?php esc_html_e('Carrier Services & Delivery Tracking', 'dawp'); ?></h2>
                        <p><?php esc_html_e('To guarantee safe and efficient delivery, One Shop Vibe partners with trusted domestic U.S. carriers. Orders are shipped using USPS, UPS, FedEx, or DHL.', 'dawp'); ?></p>
                        <div class="not-prose my-5 flex flex-wrap gap-3">
                            <span class="rounded-full border border-[#E5E7EB] bg-[#FBFCFA] px-5 py-2 text-sm font-black text-[#2D2633]"><?php esc_html_e('USPS', 'dawp'); ?></span>
                            <span class="rounded-full border border-[#E5E7EB] bg-[#FBFCFA] px-5 py-2 text-sm font-black text-[#2D2633]"><?php esc_html_e('UPS', 'dawp'); ?></span>
                            <span class="rounded-full border border-[#E5E7EB] bg-[#FBFCFA] px-5 py-2 text-sm font-black text-[#2D2633]"><?php esc_html_e('FedEx', 'dawp'); ?></span>
                            <span class="rounded-full border border-[#E5E7EB] bg-[#FBFCFA] px-5 py-2 text-sm font-black text-[#2D2633]"><?php esc_html_e('DHL', 'dawp'); ?></span>
                        </div>
                        <p><?php esc_html_e('The final carrier service is dynamically selected when your package is securely labeled and prepared at our fulfillment center. Once your order is dispatched, an automated shipping confirmation email containing a direct tracking link and courier details will be sent to your registered email address.', 'dawp'); ?></p>
                        <p>
                            <a class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#2D2633] bg-white px-7 text-sm font-black no-underline transition hover:bg-[#2D2633] hover:text-white hover:decoration-transparent" href="<?php echo esc_url(home_url('/track-order/')); ?>">
                                <?php esc_html_e('Track Order', 'dawp'); ?>
                            </a>
                        </p>

                        <h2 id="shipping-support"><?php esc_html_e('Resolving Delivery Issues & Damaged Shipments', 'dawp'); ?></h2>
                        <p><?php esc_html_e('Your satisfaction is our priority. If your order encounters delays, tracking stops updating, or the package is marked as delivered but has not arrived, please reach out to our dedicated support team immediately.', 'dawp'); ?></p>
                        <p><?php esc_html_e('To help us investigate and resolve the issue with the carrier swiftly, please provide:', 'dawp'); ?></p>
                        <ul>
                            <li><?php esc_html_e('Your exact Order Number, such as #OSV1001.', 'dawp'); ?></li>
                            <li><?php esc_html_e('The specific Email Address utilized during checkout.', 'dawp'); ?></li>
                            <li><?php esc_html_e('The full and complete Delivery Address.', 'dawp'); ?></li>
                            <li><?php esc_html_e('Clear, well-lit photos if the package container or beauty item arrived damaged.', 'dawp'); ?></li>
                        </ul>
                        <div class="not-prose my-6 flex flex-wrap gap-3">
                            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#2D2633] px-7 text-sm font-black text-white no-underline transition hover:bg-[#F7C948] hover:text-[#2D2633]">
                                <?php esc_html_e('Contact Support', 'dawp'); ?>
                            </a>
                            <a href="mailto:support@oneshopvibe.com" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#2D2633] bg-white px-7 text-sm font-black text-[#2D2633] no-underline transition hover:bg-[#2D2633] hover:text-white">
                                support@oneshopvibe.com
                            </a>
                        </div>

                        <h2><?php esc_html_e('Customer Support Contact Information', 'dawp'); ?></h2>
                        <p><?php esc_html_e('For any questions regarding your shipment, custom delivery requests, or transit inquiries, please contact us directly through our official channels. We respond to all inquiries within 24 business hours.', 'dawp'); ?></p>
                        <div class="not-prose mt-6 rounded-lg border border-[#E5E7EB] bg-[#FBFCFA] p-4">
                            <div class="grid gap-4 md:grid-cols-2">
                                <div class="rounded-lg border border-[#E5E7EB] bg-white p-4">
                                    <p class="font-bold text-[#2D2633]"><?php esc_html_e('Store Name', 'dawp'); ?></p>
                                    <p class="mt-2 text-[#6B6470]"><?php esc_html_e('One Shop Vibe', 'dawp'); ?></p>
                                </div>
                                <div class="rounded-lg border border-[#E5E7EB] bg-white p-4">
                                    <p class="font-bold text-[#2D2633]"><?php esc_html_e('Customer Support Email', 'dawp'); ?></p>
                                    <p class="mt-2"><a class="font-semibold text-[#2D2633] underline decoration-[#DCD5FF] decoration-2 underline-offset-4 hover:text-[#F7C948]" href="mailto:support@oneshopvibe.com">support@oneshopvibe.com</a></p>
                                </div>
                                <div class="rounded-lg border border-[#E5E7EB] bg-white p-4">
                                    <p class="font-bold text-[#2D2633]"><?php esc_html_e('Address', 'dawp'); ?></p>
                                    <p class="mt-2 text-[#6B6470]"><?php esc_html_e('500 Dekalb Ave Suite 316, Brooklyn, NY 11205', 'dawp'); ?></p>
                                </div>
                                <div class="rounded-lg border border-[#E5E7EB] bg-white p-4">
                                    <p class="font-bold text-[#2D2633]"><?php esc_html_e('Response Time', 'dawp'); ?></p>
                                    <p class="mt-2 text-[#6B6470]"><?php esc_html_e('Within 24 business hours.', 'dawp'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>
</div>
