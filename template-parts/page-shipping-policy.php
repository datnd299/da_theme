<?php
/**
 * Template Part: Shipping Policy Page
 */

defined('ABSPATH') || exit;

$support_email = 'support@myveganblog.com';
$updated_date  = 'May 28, 2026';
$store_address = function_exists('dawp_store_address') ? dawp_store_address() : '';
$shipping_image = get_template_directory_uri() . '/assets/img/All_image/image copy 5.png';

$shipping_locations_note = __('Some Myveganblog orders may ship separately if items are prepared from different fulfillment batches or require distinct specialized packing methods to ensure safe transit.', 'dawp');

$shipping_fees = [
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
        'label' => __('Order Cutoff Time', 'dawp'),
        'value' => __('5:00 PM (GMT-08:00) Pacific Standard Time.', 'dawp'),
    ],
    [
        'label' => __('Order Handling Time', 'dawp'),
        'value' => __('1-3 business days. Orders placed after cutoff begin processing the following business day.', 'dawp'),
    ],
    [
        'label' => __('Transit Time', 'dawp'),
        'value' => __('5-7 business days, Monday to Friday.', 'dawp'),
    ],
    [
        'label' => __('Estimated Delivery Time', 'dawp'),
        'value' => __('6-10 business days total from the date of purchase.', 'dawp'),
    ],
];

$carrier_badges = ['USPS', 'UPS', 'FedEx', 'DHL'];

$delivery_issue_items = [
    __('Your exact Order Number, such as #MB1001.', 'dawp'),
    __('The specific Email Address utilized during checkout.', 'dawp'),
    __('The full and complete Delivery Address.', 'dawp'),
    __('Clear, well-lit photos if the package container or Myveganblog item arrived damaged.', 'dawp'),
];
?>

<main class="bg-[#F8F3EC] text-[#2F2A28]">
    <section class="relative overflow-hidden bg-[#241F1D] px-4 py-20 text-white sm:px-6 lg:px-8 lg:py-24">
        <div class="absolute inset-0 opacity-35">
            <img src="<?php echo esc_url($shipping_image); ?>" alt="<?php esc_attr_e('Women\'s fashion accessories prepared for shipment', 'dawp'); ?>" class="h-full w-full object-cover" loading="eager">
            <div class="absolute inset-0 bg-[linear-gradient(90deg,rgba(36,31,29,0.98)_0%,rgba(36,31,29,0.78)_52%,rgba(36,31,29,0.42)_100%)]"></div>
        </div>
        <div class="relative mx-auto grid w-[min(100%,1180px)] gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:items-end">
            <div class="max-w-3xl">
                <span class="inline-flex border-b border-[#E8D8C8] pb-2 text-xs font-bold uppercase tracking-[0.18em] text-[#E8D8C8]"><?php esc_html_e('Shipping Policy', 'dawp'); ?></span>
                <h1 class="mt-7 font-serif text-4xl leading-tight text-white sm:text-6xl"><?php esc_html_e('Shipping details for Myveganblog orders.', 'dawp'); ?></h1>
                <p class="mt-6 max-w-2xl text-base leading-8 text-white/78 sm:text-lg">
                    <?php esc_html_e('Review our U.S. shipping locations, fees, processing timelines, carrier services, tracking details, delivery issue guidance, and customer support information.', 'dawp'); ?>
                </p>
            </div>
            <div class="rounded-[28px] border border-white/18 bg-white/10 p-6 backdrop-blur sm:p-8">
                <dl class="grid gap-5 sm:grid-cols-2">
                    <div>
                        <dt class="text-xs font-bold uppercase tracking-[0.18em] text-[#E8D8C8]"><?php esc_html_e('Store', 'dawp'); ?></dt>
                        <dd class="mt-2 font-serif text-2xl text-white"><?php esc_html_e('Myveganblog', 'dawp'); ?></dd>
                    </div>
                    <div>
                        <dt class="text-xs font-bold uppercase tracking-[0.18em] text-[#E8D8C8]"><?php esc_html_e('Updated', 'dawp'); ?></dt>
                        <dd class="mt-2 font-serif text-2xl text-white"><?php echo esc_html($updated_date); ?></dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>

    <section class="px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto w-[min(100%,1180px)] space-y-5">
            <article class="rounded-[28px] border border-[#D8CEC6] bg-white p-6 shadow-[0_12px_30px_rgba(47,42,40,0.06)] sm:p-8 lg:p-10">
                <h2 class="font-serif text-3xl leading-tight text-[#2F2A28] sm:text-4xl"><?php esc_html_e('Shipping Locations & Market', 'dawp'); ?></h2>
                <div class="mt-5 space-y-4 text-base leading-8 text-[#6F625D]">
                    <p><?php esc_html_e('We currently ship exclusively within the United States. Myveganblog serves customers shopping from the United States domestic market.', 'dawp'); ?></p>
                    <p><?php esc_html_e('If a product, destination, or carrier limitation prevents delivery to your specific address, the order will not be available for that location, and you will be notified immediately at checkout before any payment is processed.', 'dawp'); ?></p>
                </div>
                <p class="mt-5 text-base leading-8 text-[#6F625D]"><?php echo esc_html($shipping_locations_note); ?></p>
            </article>

            <article class="rounded-[28px] border border-[#D8CEC6] bg-white p-6 shadow-[0_12px_30px_rgba(47,42,40,0.06)] sm:p-8 lg:p-10">
                <h2 class="font-serif text-3xl leading-tight text-[#2F2A28] sm:text-4xl"><?php esc_html_e('Shipping Fees & Costs', 'dawp'); ?></h2>
                <p class="mt-5 text-base leading-8 text-[#6F625D]"><?php esc_html_e('We believe in full transparency with no hidden fees at checkout. Our shipping costs are structured as follows:', 'dawp'); ?></p>
                <div class="mt-6 grid gap-4 md:grid-cols-2">
                    <?php foreach ($shipping_fees as $fee) : ?>
                        <div class="rounded-[18px] border border-[#D8CEC6] bg-white p-5 sm:p-6">
                            <h3 class="text-lg font-semibold text-[#2F2A28]"><?php echo esc_html($fee['title']); ?></h3>
                            <p class="mt-4 text-base leading-8 text-[#6F625D]"><?php echo esc_html($fee['copy']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </article>

            <article class="rounded-[28px] border border-[#D8CEC6] bg-white p-6 shadow-[0_12px_30px_rgba(47,42,40,0.06)] sm:p-8 lg:p-10">
                <h2 class="font-serif text-3xl leading-tight text-[#2F2A28] sm:text-4xl"><?php esc_html_e('Order Processing & Delivery Times', 'dawp'); ?></h2>
                <p class="mt-5 text-base leading-8 text-[#6F625D]"><?php esc_html_e('All shipping and handling timelines are calculated in business days, Monday through Friday, excluding standard U.S. public holidays.', 'dawp'); ?></p>
                <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    <?php foreach ($delivery_times as $time) : ?>
                        <div class="rounded-[18px] border border-[#D8CEC6] bg-white p-5">
                            <h3 class="text-sm font-bold text-[#2F2A28]"><?php echo esc_html($time['label']); ?></h3>
                            <p class="mt-3 text-sm leading-7 text-[#6F625D]"><?php echo esc_html($time['value']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
                <p class="mt-6 text-base leading-8 text-[#6F625D]"><?php esc_html_e('Delivery estimates are carefully calculated windows reflecting our standard delivery benchmarks. While we and our courier partners work diligently to meet these timelines, unexpected delays due to extreme weather, carrier capacity issues, or regional holidays may occasionally occur.', 'dawp'); ?></p>
            </article>

            <article class="rounded-[28px] border border-[#D8CEC6] bg-white p-6 shadow-[0_12px_30px_rgba(47,42,40,0.06)] sm:p-8 lg:p-10">
                <h2 class="font-serif text-3xl leading-tight text-[#2F2A28] sm:text-4xl"><?php esc_html_e('Multi-Item Orders & Specialized Handling', 'dawp'); ?></h2>
                <div class="mt-5 space-y-4 text-base leading-8 text-[#6F625D]">
                    <p><?php esc_html_e('If your purchase includes multiple Myveganblog items or diverse fashion items, they may be fulfilled from different locations. Consequently, your items may ship separately and arrive in multiple packages.', 'dawp'); ?></p>
                    <p><?php esc_html_e('You will receive unique tracking numbers for each package. Certain intricate or high-demand Myveganblog items may require extra preparation time due to rigorous address reviews, holiday volume spikes, or safe-handling protocols.', 'dawp'); ?></p>
                </div>
            </article>

            <article class="rounded-[28px] border border-[#D8CEC6] bg-white p-6 shadow-[0_12px_30px_rgba(47,42,40,0.06)] sm:p-8 lg:p-10">
                <h2 class="font-serif text-3xl leading-tight text-[#2F2A28] sm:text-4xl"><?php esc_html_e('Carrier Services & Delivery Tracking', 'dawp'); ?></h2>
                <p class="mt-5 text-base leading-8 text-[#6F625D]"><?php esc_html_e('To guarantee safe and efficient delivery, Myveganblog partners with trusted domestic U.S. carriers. Orders are shipped using USPS, UPS, FedEx, or DHL.', 'dawp'); ?></p>
                <div class="mt-5 flex flex-wrap gap-3">
                    <?php foreach ($carrier_badges as $carrier) : ?>
                        <span class="inline-flex min-h-9 items-center justify-center rounded-full border border-[#D8CEC6] bg-white px-6 text-sm font-bold text-[#2F2A28]"><?php echo esc_html($carrier); ?></span>
                    <?php endforeach; ?>
                </div>
                <p class="mt-5 text-base leading-8 text-[#6F625D]"><?php esc_html_e('The final carrier service is dynamically selected when your package is securely labeled and prepared at our fulfillment center. Once your order is dispatched, an automated shipping confirmation email containing a direct tracking link and courier details will be sent to your registered email address.', 'dawp'); ?></p>
                <a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="mt-7 inline-flex min-h-12 items-center justify-center rounded-full border border-[#2F2A28] px-7 py-3 text-sm font-bold text-[#2F2A28] transition-colors hover:bg-[#2F2A28] hover:text-white">
                    <?php esc_html_e('Track Order', 'dawp'); ?>
                </a>
            </article>

            <article class="rounded-[28px] border border-[#D8CEC6] bg-white p-6 shadow-[0_12px_30px_rgba(47,42,40,0.06)] sm:p-8 lg:p-10">
                <h2 class="font-serif text-3xl leading-tight text-[#2F2A28] sm:text-4xl"><?php esc_html_e('Resolving Delivery Issues & Damaged Shipments', 'dawp'); ?></h2>
                <div class="mt-5 space-y-4 text-base leading-8 text-[#6F625D]">
                    <p><?php esc_html_e('Your satisfaction is our priority. If your order encounters delays, tracking stops updating, or the package is marked as delivered but has not arrived, please reach out to our dedicated support team immediately.', 'dawp'); ?></p>
                    <p><?php esc_html_e('To help us investigate and resolve the issue with the carrier swiftly, please provide:', 'dawp'); ?></p>
                </div>
                <ul class="mt-4 list-disc space-y-3 pl-5 text-base leading-7 text-[#6F625D]">
                    <?php foreach ($delivery_issue_items as $item) : ?>
                        <li><?php echo esc_html($item); ?></li>
                    <?php endforeach; ?>
                </ul>
                <div class="mt-7 flex flex-wrap gap-3">
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#2F2A28] px-7 py-3 text-sm font-bold text-white transition-colors hover:bg-[#C98A8A]">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url('mailto:' . $support_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#2F2A28] px-7 py-3 text-sm font-bold text-[#2F2A28] transition-colors hover:bg-[#2F2A28] hover:text-white">
                        <?php echo esc_html($support_email); ?>
                    </a>
                </div>
            </article>

            <article class="rounded-[28px] border border-[#D8CEC6] bg-white p-6 shadow-[0_12px_30px_rgba(47,42,40,0.06)] sm:p-8 lg:p-10">
                <h2 class="font-serif text-3xl leading-tight text-[#2F2A28] sm:text-4xl"><?php esc_html_e('Customer Support Contact Information', 'dawp'); ?></h2>
                <p class="mt-5 text-base leading-8 text-[#6F625D]"><?php esc_html_e('For any questions regarding your shipment, custom delivery requests, or transit inquiries, please contact us directly through our official channels. We respond to all inquiries within 24 business hours.', 'dawp'); ?></p>
                <div class="mt-7 rounded-[24px] border border-[#D8CEC6] p-4 sm:p-5">
                    <dl class="grid gap-4 md:grid-cols-2">
                        <div class="rounded-[18px] border border-[#D8CEC6] bg-white p-5">
                            <dt class="text-sm font-bold text-[#2F2A28]"><?php esc_html_e('Store Name', 'dawp'); ?></dt>
                            <dd class="mt-3 text-sm leading-7 text-[#6F625D]"><?php esc_html_e('Myveganblog', 'dawp'); ?></dd>
                        </div>
                        <div class="rounded-[18px] border border-[#D8CEC6] bg-white p-5">
                            <dt class="text-sm font-bold text-[#2F2A28]"><?php esc_html_e('Customer Support Email', 'dawp'); ?></dt>
                            <dd class="mt-3 break-words text-sm leading-7 text-[#6F625D]"><a href="<?php echo esc_url('mailto:' . $support_email); ?>" class="transition-colors hover:text-[#C98A8A]"><?php echo esc_html($support_email); ?></a></dd>
                        </div>
                        <div class="rounded-[18px] border border-[#D8CEC6] bg-white p-5">
                            <dt class="text-sm font-bold text-[#2F2A28]"><?php esc_html_e('Address', 'dawp'); ?></dt>
                            <dd class="mt-3 text-sm leading-7 text-[#6F625D]"><?php echo esc_html($store_address); ?></dd>
                        </div>
                        <div class="rounded-[18px] border border-[#D8CEC6] bg-white p-5">
                            <dt class="text-sm font-bold text-[#2F2A28]"><?php esc_html_e('Response Time', 'dawp'); ?></dt>
                            <dd class="mt-3 text-sm leading-7 text-[#6F625D]"><?php esc_html_e('Within 24 business hours.', 'dawp'); ?></dd>
                        </div>
                    </dl>
                </div>
            </article>
        </div>
    </section>
</main>
