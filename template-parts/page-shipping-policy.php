<?php
/**
 * Shipping policy page for BrickGo.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email = function_exists('dawp_get_store_contact') ? dawp_get_store_contact('email') : 'support@brickgo.com';
$support_phone = function_exists('dawp_get_store_contact') ? dawp_get_store_contact('phone') : '757-804-6538';
$store_address = function_exists('dawp_get_store_contact') ? dawp_get_store_contact('address') : '57 Calvert St, Woodbridge, VA 22191-2840';
$track_url     = home_url('/track-order/');
$contact_url   = home_url('/contact-us/');
$last_updated  = __('May 29, 2026', 'dawp');

$shipping_costs = [
    [
        'title' => __('Standard U.S. Shipping', 'dawp'),
        'copy'  => __('Completely free ($0.00) for all orders nationwide. There is no minimum purchase requirement to qualify for free standard shipping.', 'dawp'),
    ],
    [
        'title' => __('Optional Upgraded Shipping', 'dawp'),
        'copy'  => __('If expedited or assisted shipping services are available for your destination, the exact cost will be displayed clearly on the checkout page before you complete your payment.', 'dawp'),
    ],
];

$delivery_times = [
    [
        'title' => __('Order Cutoff Time', 'dawp'),
        'copy'  => __('5:00 PM (GMT-08:00) Pacific Standard Time (Monday to Friday).', 'dawp'),
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
    __('Your exact Order Number, such as #QB1001.', 'dawp'),
    __('The specific Email Address utilized during checkout.', 'dawp'),
    __('The full and complete Delivery Address.', 'dawp'),
    __('Clear, well-lit photos if the package container or jewelry item arrived damaged.', 'dawp'),
];

$contact_details = [
    [
        'label' => __('Store Name', 'dawp'),
        'value' => __('BrickGo', 'dawp'),
    ],
    [
        'label' => __('Customer Support Email', 'dawp'),
        'value' => $support_email,
    ],
    [
        'label' => __('Customer Support Phone', 'dawp'),
        'value' => $support_phone,
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

$shipping_faqs = [
    [
        'question' => __('Where does BrickGo ship?', 'dawp'),
        'answer'   => __('BrickGo currently ships exclusively within the United States domestic market. If a destination or carrier limitation prevents delivery to your address, checkout will notify you before payment is processed.', 'dawp'),
    ],
    [
        'question' => __('How much does standard shipping cost?', 'dawp'),
        'answer'   => __('Standard U.S. shipping is free for all orders nationwide with no minimum purchase requirement. Optional upgraded shipping, when available, is shown clearly at checkout before payment.', 'dawp'),
    ],
    [
        'question' => __('How long will my order take to arrive?', 'dawp'),
        'answer'   => __('Order handling takes 1-3 business days and standard transit takes 5-7 business days, so estimated delivery is 6-10 business days total from the date of purchase.', 'dawp'),
    ],
    [
        'question' => __('Will I receive tracking information?', 'dawp'),
        'answer'   => __('Yes. Once your order is dispatched, we send a shipping confirmation email with a direct tracking link and courier details to the email address used at checkout.', 'dawp'),
    ],
];
?>

<div class="bg-white text-[#2B2B2B]">
    <section class="bg-[#F8F5F0] py-14 sm:py-20" aria-labelledby="shipping-policy-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:items-end lg:px-8">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A45A3F]"><?php esc_html_e('Shipping Policy', 'dawp'); ?></p>
                <h1 id="shipping-policy-title" class="mt-4 font-heading text-4xl font-extrabold leading-tight text-[#2B2B2B] sm:text-5xl">
                    <?php esc_html_e('Shipping Policy', 'dawp'); ?>
                </h1>
                <p class="mt-5 max-w-2xl text-base leading-8 text-[#4A4A4A]">
                    <?php esc_html_e('Review our U.S. shipping coverage, free standard shipping, handling times, transit windows, tracking process, and delivery support details.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-md border border-[#E8E5DF] bg-white p-6 shadow-sm">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A45A3F]"><?php esc_html_e('Last Updated', 'dawp'); ?></p>
                <p class="mt-3 font-heading text-2xl font-extrabold text-[#2B2B2B]"><?php echo esc_html($last_updated); ?></p>
                <p class="mt-4 text-sm leading-7 text-[#4A4A4A]">
                    <?php esc_html_e('Track an order after your shipping email arrives, or contact support if a delivery appears delayed, damaged, or missing.', 'dawp'); ?>
                </p>
                <div class="mt-6 flex flex-col gap-3 sm:flex-row lg:flex-col xl:flex-row">
                    <a href="<?php echo esc_url($track_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#A45A3F] px-6 text-sm font-bold text-white transition hover:bg-[#7F422F]">
                        <?php esc_html_e('Track Order', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#A45A3F] bg-white px-6 text-sm font-bold text-[#A45A3F] transition hover:bg-[#F8F5F0]">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#F8F5F0] py-12 sm:py-16">
        <div class="mx-auto grid max-w-5xl gap-4 px-4 sm:px-6 lg:px-8">
        <section class="rounded-md border border-[#E8E5DF] bg-white p-5 shadow-sm sm:p-6" aria-labelledby="shipping-locations-title">
            <h2 id="shipping-locations-title" class="font-heading text-xl font-extrabold leading-tight text-[#2B2B2B]">
                <?php esc_html_e('Shipping Locations & Market', 'dawp'); ?>
            </h2>
            <div class="mt-5 space-y-5 text-sm leading-7 text-[#4A4A4A] sm:text-base">
                <p><?php esc_html_e('We currently ship exclusively within the United States. BrickGo serves customers shopping from the United States domestic market.', 'dawp'); ?></p>
                <p><?php esc_html_e('If a product, destination, or carrier limitation prevents delivery to your specific address, the order will not be available for that location, and you will be notified immediately at checkout before any payment is processed.', 'dawp'); ?></p>
                <div class="border-l-4 border-[#D8C7BE] bg-[#F8F5F0] p-5 text-[#4A4A4A]">
                    <p><?php esc_html_e('Some jewelry orders may ship separately if items are prepared from different fulfillment batches or require distinct specialized packing methods to ensure safe transit.', 'dawp'); ?></p>
                </div>
            </div>
        </section>

        <section class="rounded-md border border-[#E8E5DF] bg-white p-5 shadow-sm sm:p-6" aria-labelledby="shipping-costs-title">
            <h2 id="shipping-costs-title" class="font-heading text-xl font-extrabold leading-tight text-[#2B2B2B]">
                <?php esc_html_e('Shipping Fees & Costs', 'dawp'); ?>
            </h2>
            <p class="mt-5 text-sm leading-7 text-[#4A4A4A] sm:text-base">
                <?php esc_html_e('We believe in full transparency with no hidden fees at checkout. Our shipping costs are structured as follows:', 'dawp'); ?>
            </p>
            <div class="mt-6 grid gap-4 md:grid-cols-2">
                <?php foreach ($shipping_costs as $cost) : ?>
                    <article class="rounded-md border border-[#E8E5DF] bg-white p-5">
                        <h3 class="font-heading text-lg font-extrabold text-[#2B2B2B]"><?php echo esc_html($cost['title']); ?></h3>
                        <p class="mt-4 text-sm leading-7 text-[#4A4A4A] sm:text-base"><?php echo esc_html($cost['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="rounded-md border border-[#E8E5DF] bg-white p-5 shadow-sm sm:p-6" aria-labelledby="delivery-times-title">
            <h2 id="delivery-times-title" class="font-heading text-xl font-extrabold leading-tight text-[#2B2B2B]">
                <?php esc_html_e('Order Processing & Delivery Times', 'dawp'); ?>
            </h2>
            <p class="mt-5 text-sm leading-7 text-[#4A4A4A] sm:text-base">
                <?php esc_html_e('All shipping and handling timelines are calculated in business days, Monday through Friday, excluding standard U.S. public holidays.', 'dawp'); ?>
            </p>
            <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <?php foreach ($delivery_times as $time) : ?>
                    <article class="rounded-md border border-[#E8E5DF] bg-white p-5">
                        <h3 class="text-sm font-extrabold text-[#2B2B2B]"><?php echo esc_html($time['title']); ?></h3>
                        <p class="mt-3 text-sm leading-6 text-[#4A4A4A]"><?php echo esc_html($time['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
            <p class="mt-6 text-sm leading-7 text-[#4A4A4A] sm:text-base">
                <?php esc_html_e('Delivery estimates are carefully calculated windows reflecting our standard delivery benchmarks. While we and our courier partners work diligently to meet these timelines, unexpected delays due to extreme weather, carrier capacity issues, or regional holidays may occasionally occur.', 'dawp'); ?>
            </p>
        </section>

        <section class="rounded-md border border-[#E8E5DF] bg-white p-5 shadow-sm sm:p-6" aria-labelledby="multi-item-title">
            <h2 id="multi-item-title" class="font-heading text-xl font-extrabold leading-tight text-[#2B2B2B]">
                <?php esc_html_e('Multi-Item Orders & Specialized Handling', 'dawp'); ?>
            </h2>
            <div class="mt-5 space-y-5 text-sm leading-7 text-[#4A4A4A] sm:text-base">
                <p><?php esc_html_e('If your purchase includes multiple bracelets or diverse jewelry items, they may be fulfilled from different locations. Consequently, your items may ship separately and arrive in multiple packages.', 'dawp'); ?></p>
                <p><?php esc_html_e('You will receive unique tracking numbers for each package. Certain intricate or high-demand jewelry items may require extra preparation time due to rigorous address reviews, holiday volume spikes, or safe-handling protocols.', 'dawp'); ?></p>
            </div>
        </section>

        <section class="rounded-md border border-[#E8E5DF] bg-white p-5 shadow-sm sm:p-6" aria-labelledby="carrier-title">
            <h2 id="carrier-title" class="font-heading text-xl font-extrabold leading-tight text-[#2B2B2B]">
                <?php esc_html_e('Carrier Services & Delivery Tracking', 'dawp'); ?>
            </h2>
            <p class="mt-5 text-sm leading-7 text-[#4A4A4A] sm:text-base">
                <?php esc_html_e('To guarantee safe and efficient delivery, BrickGo partners with trusted domestic U.S. carriers. Orders are shipped using USPS, UPS, FedEx, or DHL.', 'dawp'); ?>
            </p>
            <div class="mt-5 flex flex-wrap gap-3">
                <?php foreach ($carriers as $carrier) : ?>
                    <span class="inline-flex min-h-9 items-center justify-center rounded-full border border-[#E8E5DF] bg-white px-6 text-sm font-extrabold text-[#2B2B2B]"><?php echo esc_html($carrier); ?></span>
                <?php endforeach; ?>
            </div>
            <p class="mt-5 text-sm leading-7 text-[#4A4A4A] sm:text-base">
                <?php esc_html_e('The final carrier service is dynamically selected when your package is securely labeled and prepared at our fulfillment center. Once your order is dispatched, an automated shipping confirmation email containing a direct tracking link and courier details will be sent to your registered email address.', 'dawp'); ?>
            </p>
            <div class="mt-7">
                <a href="<?php echo esc_url($track_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#2B2B2B] bg-white px-6 text-sm font-extrabold text-[#2B2B2B] transition hover:bg-[#7F422F] hover:text-white">
                    <?php esc_html_e('Track Order', 'dawp'); ?>
                </a>
            </div>
        </section>

        <section class="rounded-md border border-[#E8E5DF] bg-white p-5 shadow-sm sm:p-6" aria-labelledby="delivery-issues-title">
            <h2 id="delivery-issues-title" class="font-heading text-xl font-extrabold leading-tight text-[#2B2B2B]">
                <?php esc_html_e('Resolving Delivery Issues & Damaged Shipments', 'dawp'); ?>
            </h2>
            <div class="mt-5 space-y-5 text-sm leading-7 text-[#4A4A4A] sm:text-base">
                <p><?php esc_html_e('Your satisfaction is our priority. If your order encounters delays, tracking stops updating, or the package is marked as delivered but has not arrived, please reach out to our dedicated support team immediately.', 'dawp'); ?></p>
                <p><?php esc_html_e('To help us investigate and resolve the issue with the carrier swiftly, please provide:', 'dawp'); ?></p>
                <ul class="list-disc space-y-3 pl-5">
                    <?php foreach ($issue_requirements as $requirement) : ?>
                        <li><?php echo esc_html($requirement); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#A45A3F] px-6 text-sm font-extrabold text-white transition hover:bg-[#A45A3F]">
                    <?php esc_html_e('Contact Support', 'dawp'); ?>
                </a>
                <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#2B2B2B] bg-white px-6 text-sm font-extrabold text-[#2B2B2B] transition hover:bg-[#F8F5F0]">
                    <?php echo esc_html($support_email); ?>
                </a>
                <a href="tel:<?php echo esc_attr($support_phone); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#2B2B2B] bg-white px-6 text-sm font-extrabold text-[#2B2B2B] transition hover:bg-[#F8F5F0]">
                    <?php echo esc_html($support_phone); ?>
                </a>
            </div>
        </section>

        <section class="rounded-md border border-[#E8E5DF] bg-white p-5 shadow-sm sm:p-6" aria-labelledby="support-contact-title">
            <h2 id="support-contact-title" class="font-heading text-xl font-extrabold leading-tight text-[#2B2B2B]">
                <?php esc_html_e('Customer Support Contact Information', 'dawp'); ?>
            </h2>
            <p class="mt-5 text-sm leading-7 text-[#4A4A4A] sm:text-base">
                <?php esc_html_e('For any questions regarding your shipment, custom delivery requests, or transit inquiries, please contact us directly through our official channels. We respond to all inquiries within 24 business hours.', 'dawp'); ?>
            </p>
            <div class="mt-7 rounded-md border border-[#E8E5DF] p-5">
                <div class="grid gap-4 md:grid-cols-2">
                    <?php foreach ($contact_details as $detail) : ?>
                        <div class="rounded-md border border-[#E8E5DF] bg-white p-5">
                            <h3 class="text-sm font-extrabold text-[#2B2B2B]"><?php echo esc_html($detail['label']); ?></h3>
                             <?php if ($support_email === $detail['value']) : ?>
                                 <a href="mailto:<?php echo esc_attr($support_email); ?>" class="mt-3 block text-sm leading-6 text-[#4A4A4A] transition hover:text-[#A45A3F]"><?php echo esc_html($detail['value']); ?></a>
                             <?php elseif ($support_phone === $detail['value']) : ?>
                                 <a href="tel:<?php echo esc_attr($support_phone); ?>" class="mt-3 block text-sm leading-6 text-[#4A4A4A] transition hover:text-[#A45A3F]"><?php echo esc_html($detail['value']); ?></a>
                             <?php else : ?>
                                 <p class="mt-3 text-sm leading-6 text-[#4A4A4A]"><?php echo esc_html($detail['value']); ?></p>
                             <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="rounded-md border border-[#E8E5DF] bg-white p-5 shadow-sm sm:p-6" aria-labelledby="shipping-faq-title">
            <h2 id="shipping-faq-title" class="font-heading text-xl font-extrabold leading-tight text-[#2B2B2B]">
                <?php esc_html_e('Shipping FAQs', 'dawp'); ?>
            </h2>
            <div class="mt-6 divide-y divide-[#E8E5DF]">
                <?php foreach ($shipping_faqs as $item) : ?>
                    <details class="group py-5 first:pt-0 last:pb-0">
                        <summary class="flex cursor-pointer list-none items-start justify-between gap-4 text-left font-heading text-lg font-extrabold text-[#2B2B2B]">
                            <span><?php echo esc_html($item['question']); ?></span>
                            <span class="mt-1 flex h-7 w-7 shrink-0 items-center justify-center rounded-md bg-[#F8F5F0] text-[#A45A3F] transition group-open:rotate-45" aria-hidden="true">+</span>
                        </summary>
                        <p class="mt-3 text-sm leading-7 text-[#4A4A4A] sm:text-base"><?php echo esc_html($item['answer']); ?></p>
                    </details>
                <?php endforeach; ?>
            </div>
        </section>
        </div>
    </section>
</div>
