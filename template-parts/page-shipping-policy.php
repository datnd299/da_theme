<?php
/**
 * Template Part: Shipping Policy
 *
 * @package dawp
 */

$brand_name    = 'UK Official Store';
$support_email = 'support@ukofficialstore.com';
$store_address = dawp_store_address();
$last_updated  = 'June 5, 2026';
?>

<div class="shipping-policy-page bg-[#f8fafc] text-navy">
    <section class="relative overflow-hidden bg-navy py-20 text-white md:py-28">
        <div class="absolute inset-0 z-0">
            <div class="absolute right-0 top-0 -mr-64 -mt-64 h-[500px] w-[500px] rounded-full bg-blue/20 blur-[120px]"></div>
            <div class="absolute bottom-0 left-0 -mb-48 -ml-48 h-[400px] w-[400px] rounded-full bg-lime/10 blur-[100px]"></div>
        </div>
        <div class="relative z-10 mx-auto max-w-7xl px-6">
            <nav class="mb-8 flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-blue" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="transition-colors hover:text-lime">Home</a>
                <span class="text-white/30">/</span>
                <span>Customer Care</span>
            </nav>
            <h1 class="font-heading text-5xl font-black leading-tight md:text-6xl">Shipping <span class="text-blue">Policy.</span></h1>
            <p class="mt-6 max-w-3xl text-lg font-light leading-relaxed text-gray-400 md:text-xl">
                Clear shipping locations, costs, delivery timelines, tracking details, and support information for your <?php echo esc_html($brand_name); ?> activewear order.
            </p>
            <p class="mt-8 text-sm font-bold uppercase tracking-widest text-white/50">Last Updated: <?php echo esc_html($last_updated); ?></p>
        </div>
    </section>

    <main class="mx-auto max-w-7xl px-4 py-14 md:px-6 md:py-20">
        <div class="space-y-5">
            <section class="rounded-2xl border border-border bg-white p-6 shadow-sm md:p-10" aria-labelledby="shipping-locations">
                <h2 id="shipping-locations" class="font-heading text-3xl font-bold tracking-tight text-navy md:text-4xl">Shipping Locations &amp; Market</h2>
                <div class="mt-4 space-y-4 text-base leading-7 text-foreground-muted">
                    <p>We currently ship exclusively within the United States. <?php echo esc_html($brand_name); ?> serves customers shopping from the United States domestic market.</p>
                    <p>If a product, destination, or carrier limitation prevents delivery to your specific address, the order will not be available for that location, and you will be notified immediately at checkout before any payment is processed.</p>
                    <p class="border-l-4 border-lime bg-lime/10 px-5 py-5 md:px-6">Some activewear orders may ship separately if items are prepared from different fulfillment batches or require distinct specialized packing methods to ensure safe transit.</p>
                </div>
            </section>

            <section class="rounded-2xl border border-border bg-white p-6 shadow-sm md:p-10" aria-labelledby="shipping-fees">
                <h2 id="shipping-fees" class="font-heading text-3xl font-bold tracking-tight text-navy md:text-4xl">Shipping Fees &amp; Costs</h2>
                <p class="mt-4 text-base leading-7 text-foreground-muted">We believe in full transparency with no hidden fees at checkout. Our shipping costs are structured as follows:</p>
                <div class="mt-5 grid gap-4 md:grid-cols-2">
                    <article class="rounded-2xl border border-border bg-surface p-5 md:p-6">
                        <h3 class="text-lg font-bold text-navy">Standard U.S. Shipping</h3>
                        <p class="mt-3 leading-7 text-foreground-muted">Completely free for all orders nationwide. There is no minimum purchase requirement to qualify for free standard shipping.</p>
                    </article>
                    <article class="rounded-2xl border border-border bg-surface p-5 md:p-6">
                        <h3 class="text-lg font-bold text-navy">Optional Upgraded Shipping</h3>
                        <p class="mt-3 leading-7 text-foreground-muted">If expedited or assisted shipping services are available for your destination, the exact cost will be displayed clearly on the checkout page before you complete your payment.</p>
                    </article>
                </div>
            </section>

            <section class="rounded-2xl border border-border bg-white p-6 shadow-sm md:p-10" aria-labelledby="delivery-times">
                <h2 id="delivery-times" class="font-heading text-3xl font-bold tracking-tight text-navy md:text-4xl">Order Processing &amp; Delivery Times</h2>
                <p class="mt-4 text-base leading-7 text-foreground-muted">All shipping and handling timelines are calculated in business days, Monday through Friday, excluding standard U.S. public holidays.</p>
                <div class="mt-5 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    <article class="rounded-2xl border border-border p-5">
                        <h3 class="font-bold text-navy">Order Cutoff Time</h3>
                        <p class="mt-2 leading-6 text-foreground-muted">5:00 PM (GMT-08:00) Pacific Standard Time.</p>
                    </article>
                    <article class="rounded-2xl border border-border p-5">
                        <h3 class="font-bold text-navy">Order Handling Time</h3>
                        <p class="mt-2 leading-6 text-foreground-muted">1–3 business days. Orders placed after cutoff begin processing the following business day.</p>
                    </article>
                    <article class="rounded-2xl border border-border p-5">
                        <h3 class="font-bold text-navy">Transit Time</h3>
                        <p class="mt-2 leading-6 text-foreground-muted">5–7 business days, Monday to Friday.</p>
                    </article>
                    <article class="rounded-2xl border border-border p-5">
                        <h3 class="font-bold text-navy">Estimated Delivery Time</h3>
                        <p class="mt-2 leading-6 text-foreground-muted">6–10 business days total from the date of purchase.</p>
                    </article>
                </div>
                <p class="mt-5 text-base leading-7 text-foreground-muted">Delivery estimates are carefully calculated windows reflecting our standard delivery benchmarks. While we and our courier partners work diligently to meet these timelines, unexpected delays due to extreme weather, carrier capacity issues, or regional holidays may occasionally occur.</p>
            </section>

            <section class="rounded-2xl border border-border bg-white p-6 shadow-sm md:p-10" aria-labelledby="multi-item-orders">
                <h2 id="multi-item-orders" class="font-heading text-3xl font-bold tracking-tight text-navy md:text-4xl">Multi-Item Orders &amp; Specialized Handling</h2>
                <div class="mt-4 space-y-4 text-base leading-7 text-foreground-muted">
                    <p>If your purchase includes multiple activewear pieces or diverse sportswear items, they may be fulfilled from different locations. Consequently, your items may ship separately and arrive in multiple packages.</p>
                    <p>You will receive unique tracking numbers for each package. Certain high-demand activewear items may require extra preparation time due to rigorous address reviews, holiday volume spikes, or safe-handling protocols.</p>
                </div>
            </section>

            <section class="rounded-2xl border border-border bg-white p-6 shadow-sm md:p-10" aria-labelledby="carrier-services">
                <h2 id="carrier-services" class="font-heading text-3xl font-bold tracking-tight text-navy md:text-4xl">Carrier Services &amp; Delivery Tracking</h2>
                <p class="mt-4 text-base leading-7 text-foreground-muted">To guarantee safe and efficient delivery, <?php echo esc_html($brand_name); ?> partners with trusted domestic U.S. carriers. Orders are shipped using USPS, UPS, FedEx, or DHL.</p>
                <div class="mt-5 flex flex-wrap gap-3" aria-label="Available carriers">
                    <?php foreach (['USPS', 'UPS', 'FedEx', 'DHL'] as $carrier) : ?>
                        <span class="rounded-full border border-border bg-white px-5 py-2 text-sm font-bold text-navy"><?php echo esc_html($carrier); ?></span>
                    <?php endforeach; ?>
                </div>
                <p class="mt-5 text-base leading-7 text-foreground-muted">The final carrier service is dynamically selected when your package is securely labeled and prepared at our fulfillment center. Once your order is dispatched, an automated shipping confirmation email containing a direct tracking link and courier details will be sent to your registered email address.</p>
                <a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="mt-6 inline-flex min-h-11 items-center justify-center rounded-xl border-2 border-blue px-6 py-3 text-sm font-bold text-blue transition-colors hover:bg-blue hover:text-white">Track Order</a>
            </section>

            <section class="rounded-2xl border border-border bg-white p-6 shadow-sm md:p-10" aria-labelledby="delivery-issues">
                <h2 id="delivery-issues" class="font-heading text-3xl font-bold tracking-tight text-navy md:text-4xl">Resolving Delivery Issues &amp; Damaged Shipments</h2>
                <div class="mt-4 space-y-4 text-base leading-7 text-foreground-muted">
                    <p>Your satisfaction is our priority. If your order encounters delays, tracking stops updating, or the package is marked as delivered but has not arrived, please reach out to our dedicated support team immediately.</p>
                    <p>To help us investigate and resolve the issue with the carrier swiftly, please provide:</p>
                    <ul class="grid gap-2 pl-5 marker:text-blue">
                        <li class="list-disc">Your exact Order Number, such as #UKOS001.</li>
                        <li class="list-disc">The specific Email Address utilized during checkout.</li>
                        <li class="list-disc">The full and complete Delivery Address.</li>
                        <li class="list-disc">Clear, well-lit photos if the package container or activewear item arrived damaged.</li>
                    </ul>
                </div>
                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-11 items-center justify-center rounded-xl bg-blue px-6 py-3 text-sm font-bold text-white transition-colors hover:bg-navy">Contact Support</a>
                    <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-11 items-center justify-center rounded-xl border-2 border-blue px-6 py-3 text-sm font-bold text-blue transition-colors hover:bg-blue hover:text-white"><?php echo esc_html($support_email); ?></a>
                </div>
            </section>

            <section class="rounded-2xl border border-border bg-white p-6 shadow-sm md:p-10" aria-labelledby="support-information">
                <h2 id="support-information" class="font-heading text-3xl font-bold tracking-tight text-navy md:text-4xl">Customer Support Contact Information</h2>
                <p class="mt-4 text-base leading-7 text-foreground-muted">For any questions regarding your shipment, custom delivery requests, or transit inquiries, please contact us directly through our official channels. We respond to all inquiries within 24 business hours.</p>
                <dl class="mt-6 grid gap-4 rounded-2xl border border-border p-4 md:grid-cols-2">
                    <div class="rounded-xl border border-border p-5">
                        <dt class="font-bold text-navy">Store Name</dt>
                        <dd class="mt-2 text-foreground-muted"><?php echo esc_html($brand_name); ?></dd>
                    </div>
                    <div class="rounded-xl border border-border p-5">
                        <dt class="font-bold text-navy">Customer Support Email</dt>
                        <dd class="mt-2 text-foreground-muted"><a class="hover:text-blue hover:underline" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a></dd>
                    </div>
                    <div class="rounded-xl border border-border p-5">
                        <dt class="font-bold text-navy">Address</dt>
                        <dd class="mt-2 text-foreground-muted"><?php echo esc_html($store_address); ?></dd>
                    </div>
                    <div class="rounded-xl border border-border p-5">
                        <dt class="font-bold text-navy">Response Time</dt>
                        <dd class="mt-2 text-foreground-muted">Within 24 business hours.</dd>
                    </div>
                </dl>
            </section>
        </div>
    </main>
</div>
