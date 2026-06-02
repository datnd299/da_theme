<?php
/**
 * Template Part: page-shipping-policy
 *
 * @package dawp
 */

$store_name    = 'House of Shoes Online';
$support_email = 'support@houseofshoesonline.com';
$address       = dawp_get_store_address();
$contact_url   = 'https://houseofshoesonline.com/contact-us/';
$track_url     = 'https://houseofshoesonline.com/track-order/';
?>

<main id="primary" class="bg-[#F6F5F7] font-body text-[#141217]">

    <section class="relative overflow-hidden bg-[#FFF7FB] text-[#141217]">
        <div class="absolute left-0 top-0 h-1 w-full bg-[linear-gradient(90deg,#E6007E,#FF4FB8,#7C3AED)]"></div>

        <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
            <div class="max-w-4xl">
                <p class="mb-5 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]">
                    <?php esc_html_e('Customer Care', 'dawp'); ?>
                </p>

                <h1 class="font-heading text-5xl font-black leading-[0.94] text-[#141217] sm:text-6xl lg:text-7xl">
                    <?php esc_html_e('Shipping Policy', 'dawp'); ?>
                </h1>

                <p class="mt-6 max-w-3xl text-lg leading-8 text-[#5E5363]">
                    <?php esc_html_e('Shipping locations, fees, processing times, delivery tracking, and customer support details for House of Shoes Online orders.', 'dawp'); ?>
                </p>

                <p class="mt-5 text-sm font-black uppercase tracking-[0.18em] text-[#7C3AED]">
                    <?php esc_html_e('Last updated: 20 May, 2026', 'dawp'); ?>
                </p>
            </div>
        </div>
    </section>

    <section class="py-12 lg:py-16">
        <div class="mx-auto max-w-6xl space-y-5 px-4 sm:px-6 lg:px-8">

            <section id="shipping-locations" class="rounded-[1.5rem] border border-[#EEE5EF] bg-white p-7 shadow-sm shadow-[#141217]/5 lg:p-10">
                <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]">
                    <?php esc_html_e('Shipping Locations & Market', 'dawp'); ?>
                </h2>

                <div class="mt-4 space-y-5 text-base leading-8 text-[#5E5363]">
                    <p><?php esc_html_e('We currently ship exclusively within the United States. House of Shoes Online serves customers shopping from the United States domestic market.', 'dawp'); ?></p>
                    <p><?php esc_html_e('If a product, destination, or carrier limitation prevents delivery to your specific address, the order will not be available for that location, and you will be notified immediately at checkout before any payment is processed.', 'dawp'); ?></p>
                </div>

                <div class="mt-2 border-l-4 border-[#E6007E] bg-[#FFF7E8] p-5 text-base leading-8 text-[#5E5363] sm:p-6">
                    <?php esc_html_e('Some footwear orders may ship separately if items are prepared from different fulfillment batches or require distinct specialized packing methods to ensure safe transit.', 'dawp'); ?>
                </div>
            </section>

            <section id="shipping-fees" class="rounded-[1.5rem] border border-[#EEE5EF] bg-[#FFF9FC] p-7 shadow-sm shadow-[#141217]/5 lg:p-10">
                <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]">
                    <?php esc_html_e('Shipping Fees & Costs', 'dawp'); ?>
                </h2>

                <p class="mt-4 text-base leading-8 text-[#5E5363]">
                    <?php esc_html_e('We believe in full transparency with no hidden fees at checkout. Our shipping costs are structured as follows:', 'dawp'); ?>
                </p>

                <div class="mt-6 grid grid-cols-1 gap-4 lg:grid-cols-2">
                    <div class="rounded-[1rem] border border-[#EEE5EF] bg-white p-6">
                        <h3 class="text-xl font-medium text-[#141217]"><?php esc_html_e('Standard U.S. Shipping', 'dawp'); ?></h3>
                        <p class="mt-4 text-base leading-8 text-[#5E5363]">
                            <?php esc_html_e('Completely free for all orders nationwide. There is no minimum purchase requirement to qualify for free standard shipping.', 'dawp'); ?>
                        </p>
                    </div>

                    <div class="rounded-[1rem] border border-[#EEE5EF] bg-white p-6">
                        <h3 class="text-xl font-medium text-[#141217]"><?php esc_html_e('Optional Upgraded Shipping', 'dawp'); ?></h3>
                        <p class="mt-4 text-base leading-8 text-[#5E5363]">
                            <?php esc_html_e('If expedited or assisted shipping services are available for your destination, the exact cost will be displayed clearly on the checkout page before you complete your payment.', 'dawp'); ?>
                        </p>
                    </div>
                </div>
            </section>

            <section id="processing-delivery" class="rounded-[1.5rem] border border-[#EEE5EF] bg-white p-7 shadow-sm shadow-[#141217]/5 lg:p-10">
                <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]">
                    <?php esc_html_e('Order Processing & Delivery Times', 'dawp'); ?>
                </h2>

                <p class="mt-4 text-base leading-8 text-[#5E5363]">
                    <?php esc_html_e('All shipping and handling timelines are calculated in business days, Monday through Friday, excluding standard U.S. public holidays.', 'dawp'); ?>
                </p>

                <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="rounded-[1rem] border border-[#EEE5EF] bg-white p-5">
                        <h3 class="font-black text-[#141217]"><?php esc_html_e('Order Cutoff Time', 'dawp'); ?></h3>
                        <p class="mt-3 text-base leading-7 text-[#5E5363]"><?php esc_html_e('5:00 PM (GMT-08:00) Pacific Standard Time.', 'dawp'); ?></p>
                    </div>

                    <div class="rounded-[1rem] border border-[#EEE5EF] bg-white p-5">
                        <h3 class="font-black text-[#141217]"><?php esc_html_e('Order Handling Time', 'dawp'); ?></h3>
                        <p class="mt-3 text-base leading-7 text-[#5E5363]"><?php esc_html_e('1-3 business days. Orders placed after cutoff begin processing the following business day.', 'dawp'); ?></p>
                    </div>

                    <div class="rounded-[1rem] border border-[#EEE5EF] bg-white p-5">
                        <h3 class="font-black text-[#141217]"><?php esc_html_e('Transit Time', 'dawp'); ?></h3>
                        <p class="mt-3 text-base leading-7 text-[#5E5363]"><?php esc_html_e('5-7 business days, Monday to Friday.', 'dawp'); ?></p>
                    </div>

                    <div class="rounded-[1rem] border border-[#EEE5EF] bg-white p-5">
                        <h3 class="font-black text-[#141217]"><?php esc_html_e('Estimated Delivery Time', 'dawp'); ?></h3>
                        <p class="mt-3 text-base leading-7 text-[#5E5363]"><?php esc_html_e('6-10 business days total from the date of purchase.', 'dawp'); ?></p>
                    </div>
                </div>

                <p class="mt-6 text-base leading-8 text-[#5E5363]">
                    <?php esc_html_e('Delivery estimates are carefully calculated windows reflecting our standard delivery benchmarks. While we and our courier partners work diligently to meet these timelines, unexpected delays due to extreme weather, carrier capacity issues, or regional holidays may occasionally occur.', 'dawp'); ?>
                </p>
            </section>

            <section id="multi-item-orders" class="rounded-[1.5rem] border border-[#EEE5EF] bg-[#FFF9FC] p-7 shadow-sm shadow-[#141217]/5 lg:p-10">
                <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]">
                    <?php esc_html_e('Multi-Item Orders & Specialized Handling', 'dawp'); ?>
                </h2>

                <div class="mt-4 space-y-5 text-base leading-8 text-[#5E5363]">
                    <p><?php esc_html_e('If your purchase includes multiple shoes or diverse footwear items, they may be fulfilled from different locations. Consequently, your items may ship separately and arrive in multiple packages.', 'dawp'); ?></p>
                    <p><?php esc_html_e('You will receive unique tracking numbers for each package. Certain intricate or high-demand footwear items may require extra preparation time due to rigorous address reviews, holiday volume spikes, or safe-handling protocols.', 'dawp'); ?></p>
                </div>
            </section>

            <section id="carrier-services" class="rounded-[1.5rem] border border-[#EEE5EF] bg-white p-7 shadow-sm shadow-[#141217]/5 lg:p-10">
                <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]">
                    <?php esc_html_e('Carrier Services & Delivery Tracking', 'dawp'); ?>
                </h2>

                <p class="mt-4 text-base leading-8 text-[#5E5363]">
                    <?php esc_html_e('To guarantee safe and efficient delivery, House of Shoes Online partners with trusted domestic U.S. carriers. Orders are shipped using USPS, UPS, FedEx, or DHL.', 'dawp'); ?>
                </p>

                <div class="mt-5 flex flex-wrap gap-3">
                    <?php foreach (['USPS', 'UPS', 'FedEx', 'DHL'] as $carrier) : ?>
                        <span class="inline-flex min-h-9 items-center justify-center rounded-full border border-[#EEE5EF] bg-white px-6 text-sm font-black text-[#141217]">
                            <?php echo esc_html($carrier); ?>
                        </span>
                    <?php endforeach; ?>
                </div>

                <p class="mt-5 text-base leading-8 text-[#5E5363]">
                    <?php esc_html_e('The final carrier service is dynamically selected when your package is securely labeled and prepared at our fulfillment center. Once your order is dispatched, an automated shipping confirmation email containing a direct tracking link and courier details will be sent to your registered email address.', 'dawp'); ?>
                </p>

                <div class="mt-8">
                    <a href="<?php echo esc_url($track_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#141217] px-7 text-sm font-black text-[#141217] transition hover:bg-[#141217] hover:text-white">
                        <?php esc_html_e('Track Order', 'dawp'); ?>
                    </a>
                </div>
            </section>

            <section id="delivery-issues" class="rounded-[1.5rem] border border-[#EEE5EF] bg-[#FFF9FC] p-7 shadow-sm shadow-[#141217]/5 lg:p-10">
                <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]">
                    <?php esc_html_e('Resolving Delivery Issues & Damaged Shipments', 'dawp'); ?>
                </h2>

                <div class="mt-4 space-y-5 text-base leading-8 text-[#5E5363]">
                    <p><?php esc_html_e('Your satisfaction is our priority. If your order encounters delays, tracking stops updating, or the package is marked as delivered but has not arrived, please reach out to our dedicated support team immediately.', 'dawp'); ?></p>
                    <p><?php esc_html_e('To help us investigate and resolve the issue with the carrier swiftly, please provide:', 'dawp'); ?></p>
                </div>

                <ul class="mt-5 space-y-4 text-base leading-7 text-[#5E5363]">
                    <li class="flex gap-4"><span class="mt-3 h-1.5 w-1.5 shrink-0 rounded-full bg-[#5E5363]"></span><?php esc_html_e('Your exact Order Number, such as #HOS1001.', 'dawp'); ?></li>
                    <li class="flex gap-4"><span class="mt-3 h-1.5 w-1.5 shrink-0 rounded-full bg-[#5E5363]"></span><?php esc_html_e('The specific Email Address utilized during checkout.', 'dawp'); ?></li>
                    <li class="flex gap-4"><span class="mt-3 h-1.5 w-1.5 shrink-0 rounded-full bg-[#5E5363]"></span><?php esc_html_e('The full and complete Delivery Address.', 'dawp'); ?></li>
                    <li class="flex gap-4"><span class="mt-3 h-1.5 w-1.5 shrink-0 rounded-full bg-[#5E5363]"></span><?php esc_html_e('Clear, well-lit photos if the package container or footwear item arrived damaged.', 'dawp'); ?></li>
                </ul>

                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#2A1538] px-7 text-sm font-black text-white transition hover:bg-[#E6007E]">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>

                    <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 max-w-full items-center justify-center rounded-full border border-[#141217] px-7 text-center text-sm font-black text-[#141217] transition hover:bg-[#141217] hover:text-white max-[420px]:break-all">
                        <?php echo esc_html($support_email); ?>
                    </a>
                </div>
            </section>

            <section id="customer-support" class="rounded-[1.5rem] border border-[#EEE5EF] bg-white p-7 shadow-sm shadow-[#141217]/5 lg:p-10">
                <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]">
                    <?php esc_html_e('Customer Support Contact Information', 'dawp'); ?>
                </h2>

                <p class="mt-4 text-base leading-8 text-[#5E5363]">
                    <?php esc_html_e('For any questions regarding your shipment, custom delivery requests, or transit inquiries, please contact us directly through our official channels. We respond to all inquiries within 24 business hours.', 'dawp'); ?>
                </p>

                <div class="mt-7 rounded-[1.5rem] border border-[#EEE5EF] p-5 sm:p-6">
                    <div class="grid min-w-0 grid-cols-1 gap-4 lg:grid-cols-2">
                        <div class="min-w-0 rounded-[1rem] border border-[#EEE5EF] bg-white p-5">
                            <h3 class="font-black text-[#141217]"><?php esc_html_e('Store Name', 'dawp'); ?></h3>
                            <p class="mt-3 text-base leading-7 text-[#5E5363]"><?php echo esc_html($store_name); ?></p>
                        </div>

                        <div class="min-w-0 rounded-[1rem] border border-[#EEE5EF] bg-white p-5">
                            <h3 class="font-black text-[#141217]"><?php esc_html_e('Customer Support Email', 'dawp'); ?></h3>
                            <p class="mt-3 break-all text-base leading-7 text-[#5E5363]"><?php echo esc_html($support_email); ?></p>
                        </div>

                        <div class="min-w-0 rounded-[1rem] border border-[#EEE5EF] bg-white p-5">
                            <h3 class="font-black text-[#141217]"><?php esc_html_e('Address', 'dawp'); ?></h3>
                            <p class="mt-3 text-base leading-7 text-[#5E5363]"><?php echo esc_html($address); ?></p>
                        </div>

                        <div class="min-w-0 rounded-[1rem] border border-[#EEE5EF] bg-white p-5">
                            <h3 class="font-black text-[#141217]"><?php esc_html_e('Response Time', 'dawp'); ?></h3>
                            <p class="mt-3 text-base leading-7 text-[#5E5363]"><?php esc_html_e('Within 24 business hours.', 'dawp'); ?></p>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </section>

</main>
