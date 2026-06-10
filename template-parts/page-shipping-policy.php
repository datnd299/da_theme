<?php
/**
 * Shipping policy template part.
 */

if (!defined('ABSPATH')) {
    exit;
}

$track_order_url = home_url('/track-order/');
$contact_url     = home_url('/contact-us/');
$support_email   = 'support@queens-bracelet.com';
$store_address   = function_exists('dawp_get_store_address') ? dawp_get_store_address() : '';
?>

<div class="bg-white pb-20 text-[#24132E] antialiased lg:pb-24">
    <section class="relative overflow-hidden bg-[#FBF4FF] px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
        <div class="absolute -left-24 top-8 h-64 w-64 rounded-full bg-[#F1E2FA] blur-3xl" aria-hidden="true"></div>
        <div class="absolute -right-20 bottom-0 h-72 w-72 rounded-full bg-[#E8DFF0] blur-3xl" aria-hidden="true"></div>
        <div class="relative mx-auto max-w-4xl text-center">
            <div class="mx-auto mb-6 flex h-14 w-14 items-center justify-center rounded-full border border-[#E8DFF0] bg-white text-[#6E3A8A] shadow-sm shadow-[#3B1748]/10" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M10 17h4V5H2v12h3"></path>
                    <path d="M14 9h4l4 4v4h-3"></path>
                    <circle cx="7.5" cy="17.5" r="2.5"></circle>
                    <circle cx="16.5" cy="17.5" r="2.5"></circle>
                </svg>
            </div>
            <h1 class="font-heading text-5xl leading-[1.05] text-[#3B1748] sm:text-6xl">Shipping Policy</h1>
        </div>
    </section>

    <section class="bg-white px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto grid max-w-6xl gap-6">
            <section class="rounded-[2rem] border border-[#E8DFF0] bg-white p-6 shadow-sm shadow-[#3B1748]/10 sm:p-8 lg:p-10">
                <h2 class="font-heading text-3xl leading-tight text-[#3B1748] sm:text-4xl">Shipping Locations &amp; Market</h2>
                <div class="mt-5 grid gap-4 text-sm leading-7 text-[#6D5875] sm:text-base">
                    <p>We currently ship exclusively within the United States. Queen's Bracelet serves customers shopping from the United States domestic market.</p>
                    <p>If a product, destination, or carrier limitation prevents delivery to your specific address, the order will not be available for that location, and you will be notified immediately at checkout before any payment is processed.</p>
                    <p class="rounded-r-2xl border-l-4 border-[#6E3A8A] bg-[#FBF4FF] px-5 py-4">Some jewelry orders may ship separately if items are prepared from different fulfillment batches or require distinct specialized packing methods to ensure safe transit.</p>
                </div>
            </section>

            <section class="rounded-[2rem] border border-[#E8DFF0] bg-[#FBF4FF] p-6 shadow-sm shadow-[#3B1748]/10 sm:p-8 lg:p-10">
                <h2 class="font-heading text-3xl leading-tight text-[#3B1748] sm:text-4xl">Shipping Fees &amp; Costs</h2>
                <p class="mt-5 text-sm leading-7 text-[#6D5875] sm:text-base">We believe in full transparency with no hidden fees at checkout. Our shipping costs are structured as follows:</p>
                <div class="mt-5 grid gap-4 md:grid-cols-2">
                    <article class="rounded-2xl border border-[#E8DFF0] bg-white p-5 sm:p-6">
                        <h3 class="text-lg font-semibold text-[#3B1748]">Standard U.S. Shipping</h3>
                        <p class="mt-3 text-sm leading-7 text-[#6D5875] sm:text-base">Completely free for all orders nationwide. There is no minimum purchase requirement to qualify for free standard shipping.</p>
                    </article>
                    <article class="rounded-2xl border border-[#E8DFF0] bg-white p-5 sm:p-6">
                        <h3 class="text-lg font-semibold text-[#3B1748]">Optional Upgraded Shipping</h3>
                        <p class="mt-3 text-sm leading-7 text-[#6D5875] sm:text-base">If expedited or assisted shipping services are available for your destination, the exact cost will be displayed clearly on the checkout page before you complete your payment.</p>
                    </article>
                </div>
            </section>

            <section class="rounded-[2rem] border border-[#E8DFF0] bg-white p-6 shadow-sm shadow-[#3B1748]/10 sm:p-8 lg:p-10">
                <h2 class="font-heading text-3xl leading-tight text-[#3B1748] sm:text-4xl">Order Processing &amp; Delivery Times</h2>
                <p class="mt-5 text-sm leading-7 text-[#6D5875] sm:text-base">All shipping and handling timelines are calculated in business days, Monday through Friday, excluding standard U.S. public holidays.</p>
                <div class="mt-5 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    <article class="rounded-2xl border border-[#E8DFF0] bg-[#FBF4FF] p-5">
                        <h3 class="font-semibold text-[#3B1748]">Order Cutoff Time</h3>
                        <p class="mt-2 text-sm leading-6 text-[#6D5875]">5:00 PM (GMT-08:00) Pacific Standard Time.</p>
                    </article>
                    <article class="rounded-2xl border border-[#E8DFF0] bg-[#FBF4FF] p-5">
                        <h3 class="font-semibold text-[#3B1748]">Order Handling Time</h3>
                        <p class="mt-2 text-sm leading-6 text-[#6D5875]">1–3 business days. Orders placed after cutoff begin processing the following business day.</p>
                    </article>
                    <article class="rounded-2xl border border-[#E8DFF0] bg-[#FBF4FF] p-5">
                        <h3 class="font-semibold text-[#3B1748]">Transit Time</h3>
                        <p class="mt-2 text-sm leading-6 text-[#6D5875]">5–7 business days, Monday to Friday.</p>
                    </article>
                    <article class="rounded-2xl border border-[#E8DFF0] bg-[#FBF4FF] p-5">
                        <h3 class="font-semibold text-[#3B1748]">Estimated Delivery Time</h3>
                        <p class="mt-2 text-sm leading-6 text-[#6D5875]">6–10 business days total from the date of purchase.</p>
                    </article>
                </div>
                <p class="mt-5 text-sm leading-7 text-[#6D5875] sm:text-base">Delivery estimates are carefully calculated windows reflecting our standard delivery benchmarks. While we and our courier partners work diligently to meet these timelines, unexpected delays due to extreme weather, carrier capacity issues, or regional holidays may occasionally occur.</p>
            </section>

            <section class="rounded-[2rem] border border-[#E8DFF0] bg-[#FBF4FF] p-6 shadow-sm shadow-[#3B1748]/10 sm:p-8 lg:p-10">
                <h2 class="font-heading text-3xl leading-tight text-[#3B1748] sm:text-4xl">Multi-Item Orders &amp; Specialized Handling</h2>
                <div class="mt-5 grid gap-4 text-sm leading-7 text-[#6D5875] sm:text-base">
                    <p>If your purchase includes multiple bracelets or diverse jewelry items, they may be fulfilled from different locations. Consequently, your items may ship separately and arrive in multiple packages.</p>
                    <p>You will receive unique tracking numbers for each package. Certain intricate or high–demand jewelry items may require extra preparation time due to rigorous address reviews, holiday volume spikes, or safe–handling protocols.</p>
                </div>
            </section>

            <section class="rounded-[2rem] border border-[#E8DFF0] bg-white p-6 shadow-sm shadow-[#3B1748]/10 sm:p-8 lg:p-10">
                <h2 class="font-heading text-3xl leading-tight text-[#3B1748] sm:text-4xl">Carrier Services &amp; Delivery Tracking</h2>
                <div class="mt-5 grid gap-4 text-sm leading-7 text-[#6D5875] sm:text-base">
                    <p>To guarantee safe and efficient delivery, Queen's Bracelet partners with trusted domestic U.S. carriers. Orders are shipped using USPS, UPS, FedEx, or DHL.</p>
                    <div class="flex flex-wrap gap-3">
                        <?php foreach (['USPS', 'UPS', 'FedEx', 'DHL'] as $carrier) : ?>
                            <span class="rounded-full border border-[#E8DFF0] bg-[#FBF4FF] px-5 py-2 text-xs font-semibold text-[#3B1748]"><?php echo esc_html($carrier); ?></span>
                        <?php endforeach; ?>
                    </div>
                    <p>The final carrier service is dynamically selected when your package is securely labeled and prepared at our fulfillment center. Once your order is dispatched, an automated shipping confirmation email containing a direct tracking link and courier details will be sent to your registered email address.</p>
                    <div class="pt-2">
                        <a class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#3B1748] px-7 py-3 text-sm font-semibold text-[#3B1748] transition duration-300 hover:bg-[#3B1748] hover:text-white" href="<?php echo esc_url($track_order_url); ?>">Track Order</a>
                    </div>
                </div>
            </section>

            <section class="rounded-[2rem] border border-[#E8DFF0] bg-[#FBF4FF] p-6 shadow-sm shadow-[#3B1748]/10 sm:p-8 lg:p-10">
                <h2 class="font-heading text-3xl leading-tight text-[#3B1748] sm:text-4xl">Resolving Delivery Issues &amp; Damaged Shipments</h2>
                <div class="mt-5 grid gap-4 text-sm leading-7 text-[#6D5875] sm:text-base">
                    <p>Your satisfaction is our priority. If your order encounters delays, tracking stops updating, or the package is marked as delivered but has not arrived, please reach out to our dedicated support team immediately.</p>
                    <p>To help us investigate and resolve the issue with the carrier swiftly, please provide:</p>
                    <ul class="grid gap-2 pl-5">
                        <li class="list-disc">Your exact Order Number, such as #QB1001.</li>
                        <li class="list-disc">The specific Email Address utilized during checkout.</li>
                        <li class="list-disc">The full and complete Delivery Address.</li>
                        <li class="list-disc">Clear, well–lit photos if the package container or jewelry item arrived damaged.</li>
                    </ul>
                    <div class="flex flex-wrap gap-3 pt-2">
                        <a class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#3B1748] px-7 py-3 text-sm font-semibold text-white transition duration-300 hover:bg-[#6E3A8A]" href="<?php echo esc_url($contact_url); ?>">Contact Support</a>
                        <a class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#3B1748] px-7 py-3 text-sm font-semibold text-[#3B1748] transition duration-300 hover:bg-white" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
                    </div>
                </div>
            </section>

            <section class="rounded-[2rem] border border-[#E8DFF0] bg-white p-6 shadow-sm shadow-[#3B1748]/10 sm:p-8 lg:p-10">
                <h2 class="font-heading text-3xl leading-tight text-[#3B1748] sm:text-4xl">Customer Support Contact Information</h2>
                <p class="mt-5 text-sm leading-7 text-[#6D5875] sm:text-base">For any questions regarding your shipment, custom delivery requests, or transit inquiries, please contact us directly through our official channels. We respond to all inquiries within 24 business hours.</p>
                <div class="mt-6 grid gap-4 rounded-2xl border border-[#E8DFF0] bg-[#FBF4FF] p-4 sm:grid-cols-2 sm:p-5">
                    <div class="rounded-2xl border border-[#E8DFF0] bg-white p-5">
                        <h3 class="text-sm font-semibold text-[#3B1748]">Store Name</h3>
                        <p class="mt-2 text-sm leading-6 text-[#6D5875]">Queen's Bracelet</p>
                    </div>
                    <div class="rounded-2xl border border-[#E8DFF0] bg-white p-5">
                        <h3 class="text-sm font-semibold text-[#3B1748]">Customer Support Email</h3>
                        <a class="mt-2 block break-all text-sm leading-6 text-[#6D5875] transition hover:text-[#6E3A8A]" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
                    </div>
                    <div class="rounded-2xl border border-[#E8DFF0] bg-white p-5">
                        <h3 class="text-sm font-semibold text-[#3B1748]">Address</h3>
                        <p class="mt-2 text-sm leading-6 text-[#6D5875]"><?php echo esc_html($store_address); ?></p>
                    </div>
                    <div class="rounded-2xl border border-[#E8DFF0] bg-white p-5">
                        <h3 class="text-sm font-semibold text-[#3B1748]">Response Time</h3>
                        <p class="mt-2 text-sm leading-6 text-[#6D5875]">Within 24 business hours.</p>
                    </div>
                </div>
            </section>
        </div>
    </section>
</div>
