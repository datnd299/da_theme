<?php
/**
 * Shipping policy page for Topgoodmart.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email = 'support@topgoodmart.com';
$store_address = function_exists('dawp_get_store_address') && !empty(dawp_get_store_address()) ? dawp_get_store_address() : __('4803 N Milwaukee Ave, Chicago, IL 60630', 'dawp');
$track_url     = home_url('/track-order/');
$contact_url   = home_url('/contact-us/');
$last_updated  = __('May 29, 2026', 'dawp');

$shipping_costs = [
    [
        'title' => __('Standard U.S. Shipping', 'dawp'),
        'copy'  => __('Completely free for all orders nationwide. There is no minimum purchase requirement to qualify for free standard shipping.', 'dawp'),
    ],
    [
        'title' => __('Optional Upgraded Shipping', 'dawp'),
        'copy'  => __('If expedited or assisted shipping services are available for your destination, the exact cost will be displayed clearly on the checkout page before you complete your payment.', 'dawp'),
    ],
];

$delivery_times = [
    [
        'title' => __('Order Cutoff Time', 'dawp'),
        'copy'  => __('5:00 PM (GMT-08:00) Pacific Standard Time.', 'dawp'),
    ],
    [
        'title' => __('Order Handling Time', 'dawp'),
        'copy'  => __('1-3 business days. Orders placed after cutoff begin processing the following business day.', 'dawp'),
    ],
    [
        'title' => __('Transit Time', 'dawp'),
        'copy'  => __('5-7 business days, Monday to Friday.', 'dawp'),
    ],
    [
        'title' => __('Estimated Delivery Time', 'dawp'),
        'copy'  => __('6-10 business days total from the date of purchase.', 'dawp'),
    ],
];

$carriers = [
    __('USPS', 'dawp'),
    __('UPS', 'dawp'),
    __('FedEx', 'dawp'),
    __('DHL', 'dawp'),
];

$issue_requirements = [
    __('Your exact Order Number, such as #TGM1001.', 'dawp'),
    __('The specific Email Address utilized during checkout.', 'dawp'),
    __('The full and complete Delivery Address.', 'dawp'),
    __('Clear, well-lit photos if the package container or home, electronics or lifestyle item arrived damaged.', 'dawp'),
];

$contact_details = [
    [
        'label' => __('Store Name', 'dawp'),
        'value' => __('Topgoodmart', 'dawp'),
    ],
    [
        'label' => __('Customer Support Email', 'dawp'),
        'value' => $support_email,
    ],
    [
        'label' => __('Address', 'dawp'),
        'value' => $store_address,
    ],
    [
        'label' => __('Response Time', 'dawp'),
        'value' => __('Within 24 business hours.', 'dawp'),
    ],
];
?>

<div class="bg-white text-[#1F2937]">
    <section class="bg-[#F5F6F8] py-14 sm:py-20" aria-labelledby="shipping-policy-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:items-end lg:px-8">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#0046BE]"><?php esc_html_e('Shipping Policy', 'dawp'); ?></p>
                <h1 id="shipping-policy-title" class="mt-4 font-heading text-4xl font-extrabold leading-tight text-[#1F2937] sm:text-5xl">
                    <?php esc_html_e('Shipping Policy', 'dawp'); ?>
                </h1>
                <p class="mt-5 max-w-2xl text-base leading-8 text-[#6B7280]">
                    <?php esc_html_e('Review our U.S. shipping coverage, free standard shipping, handling times, transit windows, tracking process, and delivery support details.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-md border border-[#E5E7EB] bg-white p-6 shadow-sm">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#0046BE]"><?php esc_html_e('Last Updated', 'dawp'); ?></p>
                <p class="mt-3 font-heading text-2xl font-extrabold text-[#1F2937]"><?php echo esc_html($last_updated); ?></p>
                <p class="mt-4 text-sm leading-7 text-[#6B7280]">
                    <?php esc_html_e('Track an order after your shipping email arrives, or contact support if a delivery appears delayed, damaged, or missing.', 'dawp'); ?>
                </p>
                <div class="mt-6 flex flex-col gap-3 sm:flex-row lg:flex-col xl:flex-row">
                    <a href="<?php echo esc_url($track_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#0046BE] px-6 text-sm font-bold text-white transition hover:bg-[#1F2937]">
                        <?php esc_html_e('Track Order', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#0046BE] bg-white px-6 text-sm font-bold text-[#0046BE] transition hover:bg-[#EAF2FF]">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#F5F6F8] py-12 sm:py-16">
        <div class="mx-auto grid max-w-7xl gap-6 px-4 sm:px-6 lg:px-8">
        <section class="rounded-md border border-[#E5E7EB] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="shipping-locations-title">
            <h1 id="shipping-locations-title" class="font-heading text-4xl font-extrabold leading-tight text-[#1F2937] sm:text-5xl">
                <?php esc_html_e('Shipping Locations & Market', 'dawp'); ?>
            </h1>
            <div class="mt-5 space-y-5 text-sm leading-7 text-[#6B7280] sm:text-base">
                <p><?php esc_html_e('We currently ship exclusively within the United States. Topgoodmart serves customers shopping from the United States domestic market.', 'dawp'); ?></p>
                <p><?php esc_html_e('If a product, destination, or carrier limitation prevents delivery to your specific address, the order will not be available for that location, and you will be notified immediately at checkout before any payment is processed.', 'dawp'); ?></p>
                <div class="border-l-4 border-[#FFE000] bg-[#FFF8C5] p-5 text-[#6B7280]">
                    <p><?php esc_html_e('Some home, electronics and lifestyle orders may ship separately if items are prepared from different fulfillment batches or require distinct specialized packing methods to ensure safe transit.', 'dawp'); ?></p>
                </div>
            </div>
        </section>

        <section class="rounded-md border border-[#E5E7EB] bg-[#F5F6F8] p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="shipping-costs-title">
            <h2 id="shipping-costs-title" class="font-heading text-4xl font-extrabold leading-tight text-[#1F2937]">
                <?php esc_html_e('Shipping Fees & Costs', 'dawp'); ?>
            </h2>
            <p class="mt-5 text-sm leading-7 text-[#6B7280] sm:text-base">
                <?php esc_html_e('We believe in full transparency with no hidden fees at checkout. Our shipping costs are structured as follows:', 'dawp'); ?>
            </p>
            <div class="mt-6 grid gap-4 md:grid-cols-2">
                <?php foreach ($shipping_costs as $cost) : ?>
                    <article class="rounded-md border border-[#E5E7EB] bg-white p-5">
                        <h3 class="font-heading text-xl font-extrabold text-[#1F2937]"><?php echo esc_html($cost['title']); ?></h3>
                        <p class="mt-4 text-sm leading-7 text-[#6B7280] sm:text-base"><?php echo esc_html($cost['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="rounded-md border border-[#E5E7EB] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="delivery-times-title">
            <h2 id="delivery-times-title" class="font-heading text-4xl font-extrabold leading-tight text-[#1F2937]">
                <?php esc_html_e('Order Processing & Delivery Times', 'dawp'); ?>
            </h2>
            <p class="mt-5 text-sm leading-7 text-[#6B7280] sm:text-base">
                <?php esc_html_e('All shipping and handling timelines are calculated in business days, Monday through Friday, excluding standard U.S. public holidays.', 'dawp'); ?>
            </p>
            <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <?php foreach ($delivery_times as $time) : ?>
                    <article class="rounded-md border border-[#E5E7EB] bg-white p-5">
                        <h3 class="text-sm font-extrabold text-[#1F2937]"><?php echo esc_html($time['title']); ?></h3>
                        <p class="mt-3 text-sm leading-6 text-[#6B7280]"><?php echo esc_html($time['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
            <p class="mt-6 text-sm leading-7 text-[#6B7280] sm:text-base">
                <?php esc_html_e('Delivery estimates are carefully calculated windows reflecting our standard delivery benchmarks. While we and our courier partners work diligently to meet these timelines, unexpected delays due to extreme weather, carrier capacity issues, or regional holidays may occasionally occur.', 'dawp'); ?>
            </p>
        </section>

        <section class="rounded-md border border-[#E5E7EB] bg-[#F5F6F8] p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="multi-item-title">
            <h2 id="multi-item-title" class="font-heading text-4xl font-extrabold leading-tight text-[#1F2937]">
                <?php esc_html_e('Multi-Item Orders & Specialized Handling', 'dawp'); ?>
            </h2>
            <div class="mt-5 space-y-5 text-sm leading-7 text-[#6B7280] sm:text-base">
                <p><?php esc_html_e('If your purchase includes multiple home, electronics or lifestyle products, they may be fulfilled from different locations. Consequently, your items may ship separately and arrive in multiple packages.', 'dawp'); ?></p>
                <p><?php esc_html_e('You will receive unique tracking numbers for each package. Certain intricate or high-demand home, electronics and lifestyle products may require extra preparation time due to rigorous address reviews, holiday volume spikes, or safe-handling protocols.', 'dawp'); ?></p>
            </div>
        </section>

        <section class="rounded-md border border-[#E5E7EB] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="carrier-title">
            <h2 id="carrier-title" class="font-heading text-4xl font-extrabold leading-tight text-[#1F2937]">
                <?php esc_html_e('Carrier Services & Delivery Tracking', 'dawp'); ?>
            </h2>
            <p class="mt-5 text-sm leading-7 text-[#6B7280] sm:text-base">
                <?php esc_html_e('To guarantee safe and efficient delivery, Topgoodmart partners with trusted domestic U.S. carriers. Orders are shipped using USPS, UPS, FedEx, or DHL.', 'dawp'); ?>
            </p>
            <div class="mt-5 flex flex-wrap gap-3">
                <?php foreach ($carriers as $carrier) : ?>
                    <span class="inline-flex min-h-9 items-center justify-center rounded-full border border-[#E5E7EB] bg-white px-6 text-sm font-extrabold text-[#1F2937]"><?php echo esc_html($carrier); ?></span>
                <?php endforeach; ?>
            </div>
            <p class="mt-5 text-sm leading-7 text-[#6B7280] sm:text-base">
                <?php esc_html_e('The final carrier service is dynamically selected when your package is securely labeled and prepared at our fulfillment center. Once your order is dispatched, an automated shipping confirmation email containing a direct tracking link and courier details will be sent to your registered email address.', 'dawp'); ?>
            </p>
            <div class="mt-7">
                <a href="<?php echo esc_url($track_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#1F2937] bg-white px-6 text-sm font-extrabold text-[#1F2937] transition hover:bg-[#1F2937] hover:text-white">
                    <?php esc_html_e('Track Order', 'dawp'); ?>
                </a>
            </div>
        </section>

        <section class="rounded-md border border-[#E5E7EB] bg-[#F5F6F8] p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="delivery-issues-title">
            <h2 id="delivery-issues-title" class="font-heading text-4xl font-extrabold leading-tight text-[#1F2937]">
                <?php esc_html_e('Resolving Delivery Issues & Damaged Shipments', 'dawp'); ?>
            </h2>
            <div class="mt-5 space-y-5 text-sm leading-7 text-[#6B7280] sm:text-base">
                <p><?php esc_html_e('Your satisfaction is our priority. If your order encounters delays, tracking stops updating, or the package is marked as delivered but has not arrived, please reach out to our dedicated support team immediately.', 'dawp'); ?></p>
                <p><?php esc_html_e('To help us investigate and resolve the issue with the carrier swiftly, please provide:', 'dawp'); ?></p>
                <ul class="list-disc space-y-3 pl-5">
                    <?php foreach ($issue_requirements as $requirement) : ?>
                        <li><?php echo esc_html($requirement); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#0046BE] px-6 text-sm font-extrabold text-white transition hover:bg-[#0046BE]">
                    <?php esc_html_e('Contact Support', 'dawp'); ?>
                </a>
                <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#1F2937] bg-white px-6 text-sm font-extrabold text-[#1F2937] transition hover:bg-[#EAF2FF]">
                    <?php echo esc_html($support_email); ?>
                </a>
            </div>
        </section>

        <section class="rounded-md border border-[#E5E7EB] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="support-contact-title">
            <h2 id="support-contact-title" class="font-heading text-4xl font-extrabold leading-tight text-[#1F2937]">
                <?php esc_html_e('Customer Support Contact Information', 'dawp'); ?>
            </h2>
            <p class="mt-5 text-sm leading-7 text-[#6B7280] sm:text-base">
                <?php esc_html_e('For any questions regarding your shipment, custom delivery requests, or transit inquiries, please contact us directly through our official channels. We respond to all inquiries within 24 business hours.', 'dawp'); ?>
            </p>
            <div class="mt-7 rounded-md border border-[#E5E7EB] p-5">
                <div class="grid gap-4 md:grid-cols-2">
                    <?php foreach ($contact_details as $detail) : ?>
                        <div class="rounded-md border border-[#E5E7EB] bg-white p-5">
                            <h3 class="text-sm font-extrabold text-[#1F2937]"><?php echo esc_html($detail['label']); ?></h3>
                            <?php if ($support_email === $detail['value']) : ?>
                                <a href="mailto:<?php echo esc_attr($support_email); ?>" class="mt-3 block text-sm leading-6 text-[#6B7280] transition hover:text-[#0046BE]"><?php echo esc_html($detail['value']); ?></a>
                            <?php else : ?>
                                <p class="mt-3 text-sm leading-6 text-[#6B7280]"><?php echo esc_html($detail['value']); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        </div>
    </section>
</div>
