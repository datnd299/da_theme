<?php
/**
 * Shipping and returns policy page for MyBaapStore.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email = 'support@mybaapstore.com';
$last_updated  = 'May 14, 2026';

$summary_cards = [
    [
        'title' => __('Order Processing', 'dawp'),
        'copy'  => __('Orders are processed within 2-4 business days, Monday through Friday, excluding holidays.', 'dawp'),
        'icon'  => 'calendar',
    ],
    [
        'title' => __('US Delivery', 'dawp'),
        'copy'  => __('After dispatch, standard US shipping typically takes 5-10 business days depending on destination and carrier conditions.', 'dawp'),
        'icon'  => 'truck',
    ],
    [
        'title' => __('Tracking Included', 'dawp'),
        'copy'  => __('Tracking information is emailed once your order ships and the carrier has accepted the package.', 'dawp'),
        'icon'  => 'map',
    ],
    [
        'title' => __('30-Day Returns', 'dawp'),
        'copy'  => __('Eligible unused items may be returned within 30 days of delivery after contacting our support team.', 'dawp'),
        'icon'  => 'refresh',
    ],
];

$shipping_steps = [
    __('You place an order and receive an order confirmation email.', 'dawp'),
    __('Our team reviews and prepares the order within 2-4 business days.', 'dawp'),
    __('When the package is dispatched, tracking details are sent to the email used at checkout.', 'dawp'),
    __('Standard US delivery usually takes 5-10 business days after dispatch.', 'dawp'),
];

$return_requirements = [
    __('The return request is made within 30 days of delivery.', 'dawp'),
    __('The item is unused, undamaged, and in original condition.', 'dawp'),
    __('The item is returned with original packaging, manuals, accessories, and parts where applicable.', 'dawp'),
    __('A receipt, order number, or proof of purchase is provided.', 'dawp'),
];

$non_returnable = [
    __('Personal care or grooming devices that have been opened, used, or cannot be inspected for hygiene reasons.', 'dawp'),
    __('Items damaged by misuse, incorrect handling, unauthorized repair, or normal wear from use.', 'dawp'),
    __('Products returned without required accessories, packaging, or proof of purchase.', 'dawp'),
    __('Gift cards, final clearance items, or items clearly marked as non-returnable at purchase.', 'dawp'),
];

$render_icon = static function ($icon) {
    $icons = [
        'calendar' => '<path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/>',
        'truck'    => '<path d="M10 17h4V5H3v12h2"/><path d="M14 8h4l3 3v6h-3"/><circle cx="7" cy="17" r="2"/><circle cx="16" cy="17" r="2"/>',
        'map'      => '<path d="M9 18 3 21V6l6-3 6 3 6-3v15l-6 3-6-3Z"/><path d="M9 3v15"/><path d="M15 6v15"/>',
        'refresh'  => '<path d="M20 12a8 8 0 0 1-13.66 5.66L4 15"/><path d="M4 20v-5h5"/><path d="M4 12A8 8 0 0 1 17.66 6.34L20 9"/><path d="M20 4v5h-5"/>',
    ];

    return $icons[$icon] ?? $icons['calendar'];
};
?>

<div class="bg-white text-[#1F2937]">
    <section class="bg-[#EAF4FF]" aria-labelledby="shipping-returns-title">
        <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
            <div class="max-w-4xl">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#2F80ED]"><?php esc_html_e('Customer Care Policy', 'dawp'); ?></p>
                <h1 id="shipping-returns-title" class="mt-5 text-4xl font-extrabold leading-tight text-[#102A43] sm:text-5xl">
                    <?php esc_html_e('Shipping & Returns', 'dawp'); ?>
                </h1>
                <p class="mt-6 text-lg leading-8 text-[#667085]">
                    <?php esc_html_e('Clear delivery and return information for practical gadgets, home tools, grooming devices, camera accessories, and everyday products from MyBaapStore.', 'dawp'); ?>
                </p>
                <p class="mt-5 text-sm font-semibold text-[#102A43]">
                    <?php printf(esc_html__('Last updated: %s', 'dawp'), esc_html($last_updated)); ?>
                </p>
            </div>

            <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <?php foreach ($summary_cards as $card) : ?>
                    <article class="rounded-2xl border border-white bg-white p-6 shadow-sm">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#EAF4FF] text-[#2F80ED]">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <?php echo $render_icon($card['icon']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </svg>
                        </div>
                        <h2 class="mt-5 text-lg font-extrabold text-[#102A43]"><?php echo esc_html($card['title']); ?></h2>
                        <p class="mt-3 text-sm leading-6 text-[#667085]"><?php echo esc_html($card['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 sm:py-20">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.75fr_1.25fr] lg:px-8">
            <aside class="lg:sticky lg:top-28 lg:self-start">
                <div class="rounded-2xl border border-[#E5E7EB] bg-[#F5F7FA] p-6">
                    <h2 class="text-lg font-extrabold text-[#102A43]"><?php esc_html_e('Policy Overview', 'dawp'); ?></h2>
                    <nav class="mt-5 grid gap-2 text-sm font-bold text-[#334155]" aria-label="<?php esc_attr_e('Shipping and returns sections', 'dawp'); ?>">
                        <a class="rounded-xl px-3 py-2 transition hover:bg-white hover:text-[#2F80ED]" href="#shipping-times"><?php esc_html_e('Shipping Times', 'dawp'); ?></a>
                        <a class="rounded-xl px-3 py-2 transition hover:bg-white hover:text-[#2F80ED]" href="#tracking-delivery"><?php esc_html_e('Tracking & Delivery', 'dawp'); ?></a>
                        <a class="rounded-xl px-3 py-2 transition hover:bg-white hover:text-[#2F80ED]" href="#returns-refunds"><?php esc_html_e('Returns & Refunds', 'dawp'); ?></a>
                        <a class="rounded-xl px-3 py-2 transition hover:bg-white hover:text-[#2F80ED]" href="#personal-care-note"><?php esc_html_e('Personal Care Note', 'dawp'); ?></a>
                    </nav>
                </div>
            </aside>

            <div class="max-w-4xl">
                <section id="shipping-times" class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm sm:p-8">
                    <h2 class="text-2xl font-extrabold text-[#102A43]"><?php esc_html_e('Shipping Times', 'dawp'); ?></h2>
                    <p class="mt-4 text-base leading-8 text-[#667085]">
                        <?php esc_html_e('MyBaapStore currently serves customers in the United States. Orders are processed within 2-4 business days before dispatch. After dispatch, standard US shipping typically takes 5-10 business days depending on your delivery address, carrier capacity, weather, holidays, and other conditions outside our control.', 'dawp'); ?>
                    </p>
                    <div class="mt-6 grid gap-3">
                        <?php foreach ($shipping_steps as $index => $step) : ?>
                            <div class="flex gap-4 rounded-xl bg-[#F5F7FA] p-4">
                                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-[#2F80ED] text-sm font-extrabold text-white"><?php echo esc_html((string) ($index + 1)); ?></span>
                                <p class="text-sm font-semibold leading-6 text-[#334155]"><?php echo esc_html($step); ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <p class="mt-6 text-sm leading-7 text-[#667085]">
                        <?php esc_html_e('Delivery dates are estimates and are not guaranteed unless a guaranteed service is specifically shown at checkout.', 'dawp'); ?>
                    </p>
                </section>

                <section id="tracking-delivery" class="mt-6 rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm sm:p-8">
                    <h2 class="text-2xl font-extrabold text-[#102A43]"><?php esc_html_e('Tracking & Delivery Issues', 'dawp'); ?></h2>
                    <p class="mt-4 text-base leading-8 text-[#667085]">
                        <?php esc_html_e('Tracking details are sent by email once your order ships. Tracking may take 24-72 hours to update after the carrier receives the package. If your package appears delayed, please check the tracking page first and allow carrier scans to update.', 'dawp'); ?>
                    </p>
                    <p class="mt-4 text-base leading-8 text-[#667085]">
                        <?php esc_html_e('Please enter your shipping address carefully at checkout. If you need to request an address correction, contact us as soon as possible. We cannot guarantee changes after an order has started processing or shipped.', 'dawp'); ?>
                    </p>
                    <p class="mt-4 text-base leading-8 text-[#667085]">
                        <?php esc_html_e('For damaged, missing, or incorrect items, email us within 7 days of delivery with your order number and clear photos of the item, packaging, and shipping label so we can review the issue.', 'dawp'); ?>
                    </p>
                </section>

                <section id="returns-refunds" class="mt-6 rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm sm:p-8">
                    <h2 class="text-2xl font-extrabold text-[#102A43]"><?php esc_html_e('Returns & Refunds', 'dawp'); ?></h2>
                    <p class="mt-4 text-base leading-8 text-[#667085]">
                        <?php esc_html_e('You may request a return within 30 days of delivery. To begin a return, contact our support team before sending anything back. Returns sent without prior approval may not be accepted.', 'dawp'); ?>
                    </p>

                    <h3 class="mt-7 text-lg font-extrabold text-[#102A43]"><?php esc_html_e('Return eligibility', 'dawp'); ?></h3>
                    <ul class="mt-4 grid gap-3">
                        <?php foreach ($return_requirements as $requirement) : ?>
                            <li class="rounded-xl border border-[#E5E7EB] bg-[#F5F7FA] px-4 py-3 text-sm font-semibold leading-6 text-[#334155]"><?php echo esc_html($requirement); ?></li>
                        <?php endforeach; ?>
                    </ul>

                    <h3 class="mt-7 text-lg font-extrabold text-[#102A43]"><?php esc_html_e('Items that may not be eligible', 'dawp'); ?></h3>
                    <ul class="mt-4 grid gap-3">
                        <?php foreach ($non_returnable as $item) : ?>
                            <li class="rounded-xl border border-[#E5E7EB] bg-white px-4 py-3 text-sm font-semibold leading-6 text-[#334155]"><?php echo esc_html($item); ?></li>
                        <?php endforeach; ?>
                    </ul>

                    <p class="mt-6 text-base leading-8 text-[#667085]">
                        <?php esc_html_e('Unless the item arrived damaged, defective, or incorrect, customers are responsible for return shipping costs. Approved refunds are issued to the original payment method after the returned item is received and inspected. Your bank or payment provider may need additional time to post the refund.', 'dawp'); ?>
                    </p>
                </section>

                <section id="personal-care-note" class="mt-6 rounded-2xl border border-[#E5E7EB] bg-[#EAF4FF] p-6 sm:p-8">
                    <h2 class="text-2xl font-extrabold text-[#102A43]"><?php esc_html_e('Personal Care Device Hygiene Note', 'dawp'); ?></h2>
                    <p class="mt-4 text-base leading-8 text-[#334155]">
                        <?php esc_html_e('For grooming and personal care devices, return approval may depend on hygiene and product condition. Opened or used personal care items may be declined when they cannot be safely inspected or resold. Product pages may include additional use, care, or hygiene notes when relevant.', 'dawp'); ?>
                    </p>
                </section>

                <section class="mt-8 rounded-2xl bg-[#102A43] p-6 text-white sm:p-8">
                    <h2 class="text-2xl font-extrabold"><?php esc_html_e('Need Help With Shipping Or A Return?', 'dawp'); ?></h2>
                    <p class="mt-4 text-base leading-8 text-white/75">
                        <?php esc_html_e('Email our support team with your order number and a short description of the issue. We reply during business hours: Monday - Friday, 9:00 AM - 6:00 PM EST.', 'dawp'); ?>
                    </p>
                    <div class="mt-6 flex flex-col gap-3 sm:flex-row">
                        <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-xl bg-white px-6 text-sm font-bold text-[#102A43] transition hover:bg-[#EAF4FF]"><?php echo esc_html($support_email); ?></a>
                        <a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-xl border border-white/35 px-6 text-sm font-bold text-white transition hover:bg-white/10"><?php esc_html_e('Track Your Order', 'dawp'); ?></a>
                    </div>
                </section>
            </div>
        </div>
    </section>
</div>
