<?php
/**
 * Template Part: page-shipping-policy
 */

$support_email = 'support@patadollc.com';
$store_address = function_exists('dawp_get_woocommerce_store_address') ? dawp_get_woocommerce_store_address() : '';

$timeline_cards = [
    [
        'label' => __('Order Cutoff Time', 'dawp'),
        'value' => __('5:00 PM Eastern Time.', 'dawp'),
    ],
    [
        'label' => __('Order Handling Time', 'dawp'),
        'value' => __('1-3 business days. Orders placed after cutoff begin processing the following business day.', 'dawp'),
    ],
    [
        'label' => __('Transit Time', 'dawp'),
        'value' => __('5-7 business days after dispatch, Monday to Friday.', 'dawp'),
    ],
    [
        'label' => __('Estimated Delivery Time', 'dawp'),
        'value' => __('6-10 business days total from the date of purchase.', 'dawp'),
    ],
];

$support_details = [
    [
        'label' => __('Store Name', 'dawp'),
        'value' => __('Patado LLC', 'dawp'),
    ],
    [
        'label' => __('Customer Support Email', 'dawp'),
        'value' => $support_email,
    ],
    [
        'label' => __('Address', 'dawp'),
        'value' => $store_address !== '' ? $store_address : __('Available through checkout and official support channels.', 'dawp'),
    ],
    [
        'label' => __('Response Time', 'dawp'),
        'value' => __('Within 24 business hours.', 'dawp'),
    ],
];
?>

<div id="primary" class="bg-[#F8F1E7] font-body text-[#24211E]">
    <section class="bg-[#5A3825] py-14 text-white lg:py-20">
        <div class="mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
            <p class="text-sm font-black uppercase tracking-[0.18em] text-[#C8A45D]"><?php esc_html_e('Patado LLC Customer Care', 'dawp'); ?></p>
            <h1 class="mt-3 font-heading text-4xl font-black leading-tight lg:text-6xl">
                <?php esc_html_e('Shipping Policy', 'dawp'); ?>
            </h1>
            <p class="mx-auto mt-4 max-w-3xl text-lg leading-8 text-[#F8F1E7]">
                <?php esc_html_e('Shipping locations, delivery timelines, carrier tracking, multi-item handling, and support information for Patado LLC orders.', 'dawp'); ?>
            </p>
            <p class="mt-3 text-sm font-semibold uppercase tracking-wide text-[#D8C3A5]">
                <?php esc_html_e('Last Updated: May 20, 2026', 'dawp'); ?>
            </p>
        </div>
    </section>

    <section class="py-12 lg:py-16">
        <div class="mx-auto max-w-6xl space-y-6 px-4 sm:px-6 lg:px-8">
            <article class="rounded-lg border border-[#D8C3A5] bg-white p-6 shadow-sm sm:p-8 lg:p-10">
                <h2 class="font-heading text-3xl font-black leading-tight text-[#5A3825] md:text-4xl"><?php esc_html_e('Shipping Locations & Market', 'dawp'); ?></h2>
                <div class="mt-5 space-y-5 text-base leading-8 text-[#5E554D]">
                    <p><?php esc_html_e('We currently ship exclusively within the United States. Patado LLC serves customers shopping from the United States domestic market.', 'dawp'); ?></p>
                    <p><?php esc_html_e('If a product, destination, or carrier limitation prevents delivery to your specific address, the order will not be available for that location, and you will be notified immediately at checkout before any payment is processed.', 'dawp'); ?></p>
                    <p class="rounded-lg border-l-4 border-[#C8A45D] bg-[#F8F1E7] p-5"><?php esc_html_e('Some handmade jewelry, vintage-inspired accessory, curated apparel, or artisan gift orders may ship separately if items are prepared from different fulfillment batches or require distinct specialized packing methods to ensure safe transit.', 'dawp'); ?></p>
                </div>
            </article>

            <article class="rounded-lg border border-[#D8C3A5] bg-white p-6 shadow-sm sm:p-8 lg:p-10">
                <h2 class="font-heading text-3xl font-black leading-tight text-[#5A3825] md:text-4xl"><?php esc_html_e('Shipping Fees & Costs', 'dawp'); ?></h2>
                <p class="mt-5 text-base leading-8 text-[#5E554D]"><?php esc_html_e('We believe in full transparency with no hidden fees at checkout. Our shipping costs are structured as follows:', 'dawp'); ?></p>
                <div class="mt-6 grid gap-4 md:grid-cols-2">
                    <div class="rounded-lg border border-[#D8C3A5] bg-white p-5">
                        <h3 class="text-lg font-bold text-[#34243A]"><?php esc_html_e('Standard U.S. Shipping', 'dawp'); ?></h3>
                        <p class="mt-4 leading-8 text-[#5E554D]"><?php esc_html_e('Completely free for all orders nationwide. There is no minimum purchase requirement to qualify for free standard shipping.', 'dawp'); ?></p>
                    </div>
                    <div class="rounded-lg border border-[#D8C3A5] bg-white p-5">
                        <h3 class="text-lg font-bold text-[#34243A]"><?php esc_html_e('Optional Upgraded Shipping', 'dawp'); ?></h3>
                        <p class="mt-4 leading-8 text-[#5E554D]"><?php esc_html_e('If expedited or assisted shipping services are available for your destination, the exact cost will be displayed clearly on the checkout page before you complete your payment.', 'dawp'); ?></p>
                    </div>
                </div>
            </article>

            <article class="rounded-lg border border-[#D8C3A5] bg-white p-6 shadow-sm sm:p-8 lg:p-10">
                <h2 class="font-heading text-3xl font-black leading-tight text-[#5A3825] md:text-4xl"><?php esc_html_e('Order Processing & Delivery Times', 'dawp'); ?></h2>
                <p class="mt-5 text-base leading-8 text-[#5E554D]"><?php esc_html_e('All shipping and handling timelines are calculated in business days, Monday through Friday, excluding standard U.S. public holidays.', 'dawp'); ?></p>
                <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    <?php foreach ($timeline_cards as $card) : ?>
                        <div class="rounded-lg border border-[#D8C3A5] bg-white p-5">
                            <h3 class="text-sm font-black text-[#34243A]"><?php echo esc_html($card['label']); ?></h3>
                            <p class="mt-3 leading-7 text-[#5E554D]"><?php echo esc_html($card['value']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
                <p class="mt-6 text-base leading-8 text-[#5E554D]"><?php esc_html_e('Delivery estimates are carefully calculated windows reflecting our standard delivery benchmarks. While we and our courier partners work diligently to meet these timelines, unexpected delays due to extreme weather, carrier capacity issues, or regional holidays may occasionally occur.', 'dawp'); ?></p>
            </article>

            <article class="rounded-lg border border-[#D8C3A5] bg-white p-6 shadow-sm sm:p-8 lg:p-10">
                <h2 class="font-heading text-3xl font-black leading-tight text-[#5A3825] md:text-4xl"><?php esc_html_e('Multi-Item Orders & Specialized Handling', 'dawp'); ?></h2>
                <div class="mt-5 space-y-5 text-base leading-8 text-[#5E554D]">
                    <p><?php esc_html_e('If your purchase includes multiple handmade bracelets, beaded jewelry pieces, vintage-inspired accessories, curated apparel items, or artisan gifts, they may be fulfilled from different locations. Consequently, your items may ship separately and arrive in multiple packages.', 'dawp'); ?></p>
                    <p><?php esc_html_e('You will receive unique tracking numbers for each package. Certain delicate, handmade, curated, or high-demand items may require extra preparation time due to rigorous address reviews, holiday volume spikes, or safe-handling protocols.', 'dawp'); ?></p>
                </div>
            </article>

            <article class="rounded-lg border border-[#D8C3A5] bg-white p-6 shadow-sm sm:p-8 lg:p-10">
                <h2 class="font-heading text-3xl font-black leading-tight text-[#5A3825] md:text-4xl"><?php esc_html_e('Carrier Services & Delivery Tracking', 'dawp'); ?></h2>
                <p class="mt-5 text-base leading-8 text-[#5E554D]"><?php esc_html_e('To support safe and efficient delivery, Patado LLC partners with trusted domestic U.S. carriers. Orders are shipped using USPS, UPS, FedEx, or DHL.', 'dawp'); ?></p>
                <div class="mt-5 flex flex-wrap gap-3">
                    <?php foreach (['USPS', 'UPS', 'FedEx', 'DHL'] as $carrier) : ?>
                        <span class="inline-flex min-h-10 items-center rounded-full border border-[#D8C3A5] bg-white px-6 text-sm font-black text-[#34243A]"><?php echo esc_html($carrier); ?></span>
                    <?php endforeach; ?>
                </div>
                <p class="mt-5 text-base leading-8 text-[#5E554D]"><?php esc_html_e('The final carrier service is dynamically selected when your package is securely labeled and prepared at our fulfillment center. Once your order is dispatched, an automated shipping confirmation email containing a direct tracking link and courier details will be sent to your registered email address.', 'dawp'); ?></p>
                <a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="mt-7 inline-flex min-h-12 items-center justify-center rounded-full border border-[#34243A] px-6 text-sm font-black text-[#34243A] transition hover:bg-[#34243A] hover:text-white">
                    <?php esc_html_e('Track Order', 'dawp'); ?>
                </a>
            </article>

            <article class="rounded-lg border border-[#D8C3A5] bg-white p-6 shadow-sm sm:p-8 lg:p-10">
                <h2 class="font-heading text-3xl font-black leading-tight text-[#5A3825] md:text-4xl"><?php esc_html_e('Resolving Delivery Issues & Damaged Shipments', 'dawp'); ?></h2>
                <div class="mt-5 space-y-5 text-base leading-8 text-[#5E554D]">
                    <p><?php esc_html_e('Your satisfaction is our priority. If your order encounters delays, tracking stops updating, or the package is marked as delivered but has not arrived, please reach out to our dedicated support team immediately.', 'dawp'); ?></p>
                    <p><?php esc_html_e('To help us investigate and resolve the issue with the carrier swiftly, please provide:', 'dawp'); ?></p>
                    <ul class="list-disc space-y-3 pl-6">
                        <li><?php esc_html_e('Your exact Order Number, such as #SO1001.', 'dawp'); ?></li>
                        <li><?php esc_html_e('The specific Email Address utilized during checkout.', 'dawp'); ?></li>
                        <li><?php esc_html_e('The full and complete Delivery Address.', 'dawp'); ?></li>
                        <li><?php esc_html_e('Clear, well-lit photos if the package container, handmade jewelry item, accessory, apparel item, or gift arrived damaged.', 'dawp'); ?></li>
                    </ul>
                </div>
                <div class="mt-7 flex flex-wrap gap-3">
                    <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#5A3825] px-6 text-sm font-black text-white transition hover:bg-[#9A6242]">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>
                    <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#34243A] px-6 text-sm font-black text-[#34243A] transition hover:bg-[#34243A] hover:text-white">
                        <?php echo esc_html($support_email); ?>
                    </a>
                </div>
            </article>

            <article class="rounded-lg border border-[#D8C3A5] bg-white p-6 shadow-sm sm:p-8 lg:p-10">
                <h2 class="font-heading text-3xl font-black leading-tight text-[#5A3825] md:text-4xl"><?php esc_html_e('Customer Support Contact Information', 'dawp'); ?></h2>
                <p class="mt-5 text-base leading-8 text-[#5E554D]"><?php esc_html_e('For any questions regarding your shipment, custom delivery requests, or transit inquiries, please contact us directly through our official channels. We respond to all inquiries within 24 business hours.', 'dawp'); ?></p>
                <div class="mt-7 rounded-lg border border-[#D8C3A5] p-4">
                    <div class="grid gap-4 md:grid-cols-2">
                        <?php foreach ($support_details as $detail) : ?>
                            <div class="rounded-lg border border-[#D8C3A5] bg-white p-5">
                                <h3 class="text-sm font-black text-[#34243A]"><?php echo esc_html($detail['label']); ?></h3>
                                <p class="mt-3 leading-7 text-[#5E554D]"><?php echo esc_html($detail['value']); ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </article>
        </div>
    </section>
</div>
