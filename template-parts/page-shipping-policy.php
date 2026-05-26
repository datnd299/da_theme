<?php
/**
 * Shipping Policy page for LBQ Shop.
 * Structure: Hero, Shipping Locations, Order Processing, Estimated Delivery,
 * Carriers, Shipping Costs, Multiple Packages, Tracking, Delivery Issues,
 * Incorrect Address, Lost/Damaged Packages, Restrictions, Delays, Contact CTA.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$store_name       = 'LBQ Shop';
$website_domain   = 'lbqshop.com';
$support_email    = 'support@lbqshop.com';
$business_hours   = __('Monday - Friday, 9:00 AM - 5:00 PM, GMT-08:00 Pacific Standard Time (Los Angeles)', 'dawp');
$response_time    = __('We aim to reply within 1 business day.', 'dawp');
$track_url        = home_url('/track-order/');
$contact_url      = home_url('/contact-us/');
$faq_url          = home_url('/faq/');

$order_cutoff     = '5:00 PM (GMT-08:00) Pacific Standard Time (Los Angeles)';
$handling_time    = '1–2 business days, Monday to Friday';
$transit_time     = '5–7 business days, Monday to Friday';
$estimated_time   = 'Usually 6–9 business days';
$shipping_region  = 'United States';

$policy_cards = [
    [
        'label' => __('Order Cutoff Time', 'dawp'),
        'value' => __($order_cutoff, 'dawp'),
        'copy'  => __('Orders placed after the cutoff time begin processing on the next business day.', 'dawp'),
        'icon'  => 'clock',
    ],
    [
        'label' => __('Handling Time', 'dawp'),
        'value' => __($handling_time, 'dawp'),
        'copy'  => __('This is the time needed to confirm, prepare, pack, and hand your order to the carrier.', 'dawp'),
        'icon'  => 'box',
    ],
    [
        'label' => __('Transit Time', 'dawp'),
        'value' => __($transit_time, 'dawp'),
        'copy'  => __('Transit depends on the carrier route, delivery location, and item type.', 'dawp'),
        'icon'  => 'truck',
    ],
];

$shipping_steps = [
    [
        'title' => __('Order Cutoff', 'dawp'),
        'copy'  => __('Orders placed before the daily cutoff time can begin processing the same business day. Orders placed after the cutoff time begin processing on the next business day.', 'dawp'),
        'meta'  => __($order_cutoff, 'dawp'),
    ],
    [
        'title' => __('Order Handling', 'dawp'),
        'copy'  => __('Handling includes order confirmation, product preparation, packing, and handoff to the shipping carrier. Orders are handled Monday through Friday, excluding holidays.', 'dawp'),
        'meta'  => __($handling_time, 'dawp'),
    ],
    [
        'title' => __('Transit Time', 'dawp'),
        'copy'  => __('After dispatch, standard transit usually takes 5–7 business days. Delivery time can vary depending on the carrier route, delivery address, and product type.', 'dawp'),
        'meta'  => __($transit_time, 'dawp'),
    ],
    [
        'title' => __('Estimated Delivery', 'dawp'),
        'copy'  => __('Most orders are delivered within 6–9 business days. Some items may take longer, including bulky items, special handling items, oversized or freight items, or items shipped directly from a brand or partner.', 'dawp'),
        'meta'  => __($estimated_time, 'dawp'),
    ],
];

$overview_facts = [
    [
        'label' => __('Shipping Region', 'dawp'),
        'value' => __($shipping_region, 'dawp'),
    ],
    [
        'label' => __('Order Cutoff', 'dawp'),
        'value' => __($order_cutoff, 'dawp'),
    ],
    [
        'label' => __('Handling', 'dawp'),
        'value' => __($handling_time, 'dawp'),
    ],
    [
        'label' => __('Estimated Delivery', 'dawp'),
        'value' => __($estimated_time, 'dawp'),
    ],
];

$delivery_issues = [
    __('Tracking not updating', 'dawp'),
    __('Package delayed in transit', 'dawp'),
    __('Package marked delivered but not received', 'dawp'),
    __('Missing item from a package', 'dawp'),
    __('Damaged package or item', 'dawp'),
    __('Incorrect or incomplete shipping address', 'dawp'),
    __('Package returned to sender', 'dawp'),
];

$contact_items = [
    [
        'label' => __('Store Name', 'dawp'),
        'value' => $store_name,
    ],
    [
        'label' => __('Website', 'dawp'),
        'value' => $website_domain,
    ],
    [
        'label' => __('Email', 'dawp'),
        'value' => $support_email,
    ],
    [
        'label' => __('Customer Service Hours', 'dawp'),
        'value' => $business_hours,
    ],
];

$render_icon = static function ($icon) {
    $icons = [
        'clock'   => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
        'box'     => '<path d="M21 16V8a2 2 0 0 0-1-1.73L13 2.27a2 2 0 0 0-2 0L4 6.27A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><path d="M3.27 6.96 12 12.01l8.73-5.05"/><path d="M12 22.08V12"/>',
        'truck'   => '<path d="M10 17h4V5H3v12h2"/><path d="M14 8h4l3 3v6h-3"/><circle cx="7" cy="17" r="2"/><circle cx="16" cy="17" r="2"/>',
        'map'     => '<path d="M9 18l-6 3V6l6-3 6 3 6-3v15l-6 3-6-3z"/><path d="M9 3v15"/><path d="M15 6v15"/>',
        'mail'    => '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-10 6L2 7"/>',
        'check'   => '<path d="m20 6-11 11-5-5"/>',
        'alert'   => '<circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>',
    ];

    return $icons[$icon] ?? $icons['check'];
};
?>

<div class="bg-white text-[#2F2925]">
    <!-- ===== HERO ===== -->
    <section class="bg-[#FFF7F0] py-14 sm:py-20" aria-labelledby="shipping-policy-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:items-end">
                <div>
                    <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#B97878]"><?php esc_html_e('Shipping Policy', 'dawp'); ?></p>
                    <h1 id="shipping-policy-title" class="mt-4 font-heading text-4xl font-extrabold leading-tight text-[#2F2925] sm:text-5xl">
                        <?php esc_html_e('Clear shipping details from checkout to delivery.', 'dawp'); ?>
                    </h1>
                    <p class="mt-5 max-w-2xl text-base leading-8 text-[#8B7473]">
                        <?php esc_html_e('LBQ Shop provides clear shipping timelines, order cutoff details, tracking information, and support for delivery questions before and after your order is placed.', 'dawp'); ?>
                    </p>
                    <div class="mt-8 flex flex-wrap gap-3">
                        <a href="<?php echo esc_url($track_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#B97878] px-6 text-sm font-bold text-white transition hover:bg-[#2F2925]">
                            <?php esc_html_e('Track Your Order', 'dawp'); ?>
                        </a>
                        <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#B97878] bg-white px-6 text-sm font-bold text-[#B97878] transition hover:bg-[#F7F1EE]">
                            <?php esc_html_e('Contact Support', 'dawp'); ?>
                        </a>
                    </div>
                </div>

                <div class="grid gap-4 sm:grid-cols-3">
                    <?php foreach ($policy_cards as $card) : ?>
                        <article class="rounded-2xl border border-[#E7D8C8] bg-white p-5 shadow-sm">
                            <div class="flex h-11 w-11 items-center justify-center rounded-full bg-[#F7F1EE] text-[#B97878]">
                                <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <?php echo $render_icon($card['icon']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </svg>
                            </div>
                            <p class="mt-4 text-xs font-extrabold uppercase tracking-[0.12em] text-[#B97878]"><?php echo esc_html($card['label']); ?></p>
                            <h2 class="mt-2 font-heading text-lg font-extrabold leading-snug text-[#2F2925]"><?php echo esc_html($card['value']); ?></h2>
                            <p class="mt-3 text-sm leading-6 text-[#8B7473]"><?php echo esc_html($card['copy']); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== SHIPPING OVERVIEW ===== -->
    <section class="bg-[#FFFFFF] py-14 sm:py-20" aria-labelledby="shipping-overview-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.82fr_1.18fr] lg:px-8">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#B97878]"><?php esc_html_e('Shipping Overview', 'dawp'); ?></p>
                <h2 id="shipping-overview-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#2F2925] sm:text-4xl">
                    <?php esc_html_e('Estimated delivery is based on cutoff, handling, and transit time.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-[#8B7473]">
                    <?php esc_html_e('Your estimated delivery time is calculated from the order cutoff time, order handling time, and carrier transit time. Orders placed after the cutoff begin processing on the next business day.', 'dawp'); ?>
                </p>
                <div class="mt-8 grid gap-3 sm:grid-cols-2">
                    <?php foreach ($overview_facts as $fact) : ?>
                        <div class="rounded-2xl border border-[#E7D8C8] bg-[#FFF7F0] p-4">
                            <p class="text-xs font-extrabold uppercase tracking-[0.12em] text-[#B97878]"><?php echo esc_html($fact['label']); ?></p>
                            <p class="mt-2 text-sm font-bold leading-6 text-[#2F2925]"><?php echo esc_html($fact['value']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="grid gap-4">
                <?php foreach ($shipping_steps as $index => $step) : ?>
                    <article class="rounded-2xl border border-[#E7D8C8] bg-white p-5 shadow-sm">
                        <div class="flex gap-4">
                            <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#E8B8AD] text-sm font-extrabold text-[#2F2925]"><?php echo esc_html($index + 1); ?></span>
                            <div class="min-w-0">
                                <p class="mb-2 inline-flex rounded-full bg-[#F7F1EE] px-3 py-1 text-xs font-extrabold uppercase tracking-[0.12em] text-[#B97878]"><?php echo esc_html($step['meta']); ?></p>
                                <h3 class="font-heading text-lg font-extrabold text-[#2F2925]"><?php echo esc_html($step['title']); ?></h3>
                                <p class="mt-2 text-sm leading-6 text-[#8B7473]"><?php echo esc_html($step['copy']); ?></p>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ===== SHIPPING LOCATIONS & COSTS ===== -->
    <section class="bg-[#F7F1EE] py-14 sm:py-20" aria-labelledby="shipping-locations-title">
        <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-3 lg:px-8">
            <article class="rounded-2xl border border-[#E7D8C8] bg-white p-6 shadow-sm">
                <div class="flex h-11 w-11 items-center justify-center rounded-full bg-[#FFF7F0] text-[#B97878]">
                    <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <?php echo $render_icon('map'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    </svg>
                </div>
                <h2 id="shipping-locations-title" class="mt-5 font-heading text-xl font-extrabold text-[#2F2925]"><?php esc_html_e('Shipping Locations', 'dawp'); ?></h2>
                <p class="mt-3 text-sm leading-7 text-[#8B7473]">
                    <?php echo esc_html(sprintf('%s currently ships to %s. Some products may have shipping restrictions due to size, weight, carrier limits, product type, or local regulations.', $store_name, $shipping_region)); ?>
                </p>
            </article>

            <article class="rounded-2xl border border-[#E7D8C8] bg-white p-6 shadow-sm">
                <div class="flex h-11 w-11 items-center justify-center rounded-full bg-[#FFF7F0] text-[#B97878]">
                    <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <?php echo $render_icon('truck'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    </svg>
                </div>
                <h2 class="mt-5 font-heading text-xl font-extrabold text-[#2F2925]"><?php esc_html_e('Shipping Carriers', 'dawp'); ?></h2>
                <p class="mt-3 text-sm leading-7 text-[#8B7473]">
                    <?php esc_html_e('Orders may be shipped using trusted carriers such as USPS, UPS, FedEx, DHL, regional carriers, or specialized carriers for oversized items when applicable.', 'dawp'); ?>
                </p>
            </article>

            <article class="rounded-2xl border border-[#E7D8C8] bg-white p-6 shadow-sm">
                <div class="flex h-11 w-11 items-center justify-center rounded-full bg-[#FFF7F0] text-[#B97878]">
                    <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <?php echo $render_icon('check'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    </svg>
                </div>
                <h2 class="mt-5 font-heading text-xl font-extrabold text-[#2F2925]"><?php esc_html_e('Shipping Costs', 'dawp'); ?></h2>
                <p class="mt-3 text-sm leading-7 text-[#8B7473]">
                    <?php esc_html_e('Shipping costs, available shipping methods, and any applicable fees are shown at checkout before payment is completed. Oversized or special-handling items may have different shipping requirements.', 'dawp'); ?>
                </p>
            </article>
        </div>
    </section>

    <!-- ===== TRACKING & MULTIPLE PACKAGES ===== -->
    <section class="bg-white py-14 sm:py-20" aria-labelledby="tracking-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
            <div class="rounded-2xl border border-[#E7D8C8] bg-[#FFF7F0] p-6 sm:p-8">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#B97878]"><?php esc_html_e('Tracking Your Order', 'dawp'); ?></p>
                <h2 id="tracking-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#2F2925] sm:text-4xl">
                    <?php esc_html_e('Tracking information is sent once your order ships.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-sm leading-7 text-[#8B7473]">
                    <?php esc_html_e('Once your order ships, tracking information will be sent to the email address used at checkout. Tracking may include the carrier name, tracking number, tracking link, and estimated delivery date when available.', 'dawp'); ?>
                </p>
                <p class="mt-4 text-sm leading-7 text-[#8B7473]">
                    <?php esc_html_e('Please allow up to 24–48 hours for tracking information to update after the carrier receives the package.', 'dawp'); ?>
                </p>
                <a href="<?php echo esc_url($track_url); ?>" class="mt-7 inline-flex min-h-12 items-center justify-center rounded-full bg-[#B97878] px-6 text-sm font-bold text-white transition hover:bg-[#2F2925]">
                    <?php esc_html_e('Track Your Order', 'dawp'); ?>
                </a>
            </div>

            <div class="rounded-2xl border border-[#E7D8C8] bg-white p-6 sm:p-8 shadow-sm">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#B97878]"><?php esc_html_e('Multiple Packages', 'dawp'); ?></p>
                <h2 class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#2F2925] sm:text-4xl">
                    <?php esc_html_e('Some orders may arrive in more than one package.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-sm leading-7 text-[#8B7473]">
                    <?php esc_html_e('If your order includes multiple items, they may ship separately and arrive at different times. This can happen when items are fulfilled from different warehouses, require different handling times, or need special packaging.', 'dawp'); ?>
                </p>
                <p class="mt-4 text-sm leading-7 text-[#8B7473]">
                    <?php esc_html_e('You may receive more than one tracking number for the same order.', 'dawp'); ?>
                </p>
            </div>
        </div>
    </section>

    <!-- ===== DELIVERY ISSUES ===== -->
    <section class="bg-[#F7F1EE] py-14 sm:py-20" aria-labelledby="delivery-issues-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.82fr_1.18fr] lg:px-8">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#B97878]"><?php esc_html_e('Delivery Issues', 'dawp'); ?></p>
                <h2 id="delivery-issues-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#2F2925] sm:text-4xl">
                    <?php esc_html_e('Contact us if your shipment needs attention.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-[#8B7473]">
                    <?php esc_html_e('If you experience a delivery issue, contact our support team with your order number, email used at checkout, delivery address, tracking number, photos if applicable, and a short description of the issue.', 'dawp'); ?>
                </p>
                <a href="<?php echo esc_url($contact_url); ?>" class="mt-8 inline-flex min-h-12 items-center justify-center rounded-full bg-[#2F2925] px-6 text-sm font-bold text-white transition hover:bg-[#B97878]">
                    <?php esc_html_e('Contact Support', 'dawp'); ?>
                </a>
            </div>

            <div class="rounded-2xl border border-[#E7D8C8] bg-white p-6 shadow-sm">
                <h3 class="font-heading text-2xl font-extrabold text-[#2F2925]"><?php esc_html_e('Common delivery issues include:', 'dawp'); ?></h3>
                <ul class="mt-5 grid gap-3 sm:grid-cols-2">
                    <?php foreach ($delivery_issues as $issue) : ?>
                        <li class="flex gap-3 rounded-xl border border-[#E7D8C8] bg-[#FFF7F0] p-4 text-sm leading-6 text-[#8B7473]">
                            <svg class="mt-1 h-4 w-4 shrink-0 text-[#B97878]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <?php echo $render_icon('check'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </svg>
                            <span><?php echo esc_html($issue); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>

    <!-- ===== ADDRESS, LOST, DAMAGED, RESTRICTIONS ===== -->
    <section class="bg-white py-14 sm:py-20" aria-labelledby="shipping-details-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-10 max-w-3xl">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#B97878]"><?php esc_html_e('Additional Shipping Details', 'dawp'); ?></p>
                <h2 id="shipping-details-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#2F2925] sm:text-4xl">
                    <?php esc_html_e('Address accuracy, lost packages, damaged packages, and delays.', 'dawp'); ?>
                </h2>
            </div>

            <div class="grid gap-4 md:grid-cols-2">
                <article class="rounded-2xl border border-[#E7D8C8] bg-[#FFF7F0] p-6">
                    <h3 class="font-heading text-xl font-extrabold text-[#2F2925]"><?php esc_html_e('Incorrect Shipping Address', 'dawp'); ?></h3>
                    <p class="mt-3 text-sm leading-7 text-[#8B7473]"><?php esc_html_e('Customers are responsible for entering a complete and accurate shipping address at checkout. If you notice an address error, contact us as soon as possible. We can only update the address if the order has not yet been processed or shipped.', 'dawp'); ?></p>
                </article>

                <article class="rounded-2xl border border-[#E7D8C8] bg-[#FFF7F0] p-6">
                    <h3 class="font-heading text-xl font-extrabold text-[#2F2925]"><?php esc_html_e('Lost Packages', 'dawp'); ?></h3>
                    <p class="mt-3 text-sm leading-7 text-[#8B7473]"><?php esc_html_e('If a package appears lost or has no tracking updates for an extended period, contact us within 30 days of the expected delivery date or latest tracking status. We will review the tracking information and may contact the carrier.', 'dawp'); ?></p>
                </article>

                <article class="rounded-2xl border border-[#E7D8C8] bg-[#FFF7F0] p-6">
                    <h3 class="font-heading text-xl font-extrabold text-[#2F2925]"><?php esc_html_e('Damaged Packages', 'dawp'); ?></h3>
                    <p class="mt-3 text-sm leading-7 text-[#8B7473]"><?php esc_html_e('If your order arrives damaged, contact us within 30 days of delivery with your order number, photos of the damaged item, photos of the outer packaging, and photos of the shipping label. Please keep the item and packaging until the issue is resolved.', 'dawp'); ?></p>
                </article>

                <article class="rounded-2xl border border-[#E7D8C8] bg-[#FFF7F0] p-6">
                    <h3 class="font-heading text-xl font-extrabold text-[#2F2925]"><?php esc_html_e('Restrictions And Delays', 'dawp'); ?></h3>
                    <p class="mt-3 text-sm leading-7 text-[#8B7473]"><?php esc_html_e('Some products may be subject to restrictions due to size, weight, carrier limitations, product type, or local regulations. Delays may occur due to weather, holidays, high order volume, warehouse delays, carrier conditions, or incomplete shipping information.', 'dawp'); ?></p>
                </article>
            </div>
        </div>
    </section>

    <!-- ===== SUPPORT CTA ===== -->
    <section class="bg-[#2F2925] py-14 sm:py-20" aria-labelledby="shipping-help-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-3xl border border-white/10 bg-white/5 p-6 sm:p-8">
                <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#E8B8AD]"><?php esc_html_e('Customer Support', 'dawp'); ?></p>
                        <h2 id="shipping-help-title" class="mt-3 font-heading text-2xl font-extrabold text-white sm:text-3xl"><?php esc_html_e('Need help with shipping or delivery?', 'dawp'); ?></h2>
                        <p class="mt-3 text-sm leading-7 text-white/70">
                            <?php
                            echo wp_kses(
                                sprintf(
                                    /* translators: 1: support email, 2: business hours, 3: response time */
                                    __('Email %1$s with your order number and tracking details. Business hours: %2$s. %3$s', 'dawp'),
                                    '<a class="font-bold text-[#E8B8AD] underline decoration-[#E8B8AD]/40 underline-offset-4 transition hover:text-white" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>',
                                    esc_html($business_hours),
                                    esc_html($response_time)
                                ),
                                [
                                    'a' => [
                                        'class' => [],
                                        'href'  => [],
                                    ],
                                ]
                            );
                            ?>
                        </p>
                    </div>

                    <div class="flex flex-col gap-3 sm:flex-row">
                        <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#E8B8AD] px-6 text-sm font-bold text-[#2F2925] transition hover:bg-white">
                            <?php esc_html_e('Contact Support', 'dawp'); ?>
                        </a>
                        <a href="<?php echo esc_url($faq_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-white/30 bg-transparent px-6 text-sm font-bold text-white transition hover:bg-white hover:text-[#2F2925]">
                            <?php esc_html_e('Read FAQs', 'dawp'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>