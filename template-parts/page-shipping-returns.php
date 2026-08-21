<?php
/**
 * Shipping and returns page for US Watch Store.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email  = 'support@uswatchstore.com';
$business_hours = __('Monday - Friday, 9:00 AM - 6:00 PM EST', 'dawp');
$track_url      = home_url('/track-order/');
$contact_url    = home_url('/contact-us/');
$faq_url        = home_url('/faq/');

$policy_cards = [
    [
        'label' => __('Order Processing', 'dawp'),
        'value' => __('1-3 business days', 'dawp'),
        'copy'  => __('Orders are inspected and packed before they are handed to the carrier.', 'dawp'),
        'icon'  => 'calendar',
    ],
    [
        'label' => __('Standard US Shipping', 'dawp'),
        'value' => __('3-7 business days', 'dawp'),
        'copy'  => __('Estimated delivery timing begins after dispatch and may vary by destination or carrier conditions. Free on orders over $75.', 'dawp'),
        'icon'  => 'truck',
    ],
    [
        'label' => __('Return Window', 'dawp'),
        'value' => __('30 days, no questions asked', 'dawp'),
        'copy'  => __('Eligible watches must be unworn, undamaged, and in original condition.', 'dawp'),
        'icon'  => 'refresh',
    ],
];

$shipping_steps = [
    [
        'title' => __('Order confirmation', 'dawp'),
        'copy'  => __('After checkout, you will receive an order confirmation at the email address used during purchase.', 'dawp'),
    ],
    [
        'title' => __('Processing', 'dawp'),
        'copy'  => __('Most orders are processed within 1-3 business days, excluding weekends and holidays.', 'dawp'),
    ],
    [
        'title' => __('Shipment and tracking', 'dawp'),
        'copy'  => __('Tracking information is provided once your order ships. Tracking may take a short time to update after the carrier receives the package.', 'dawp'),
    ],
    [
        'title' => __('Delivery', 'dawp'),
        'copy'  => __('Standard US shipping typically takes 3-7 business days after dispatch, depending on the destination and carrier conditions. Orders over $75 ship free.', 'dawp'),
    ],
];

$return_requirements = [
    __('Return requests must be made within 30 days of delivery, no questions asked.', 'dawp'),
    __('The watch must be unworn and undamaged, in original condition.', 'dawp'),
    __('Original box, tags, papers, and accessories must be included.', 'dawp'),
    __('Watches showing signs of wear, alteration, or accidental damage do not qualify for return.', 'dawp'),
];

$return_process = [
    __('Email support with your order number, the watch you would like to return, and the reason for the request.', 'dawp'),
    __('Wait for return instructions before sending anything back so the return can be matched to your order.', 'dawp'),
    __('Pack the watch securely in its original box with all papers and accessories.', 'dawp'),
    __('Once the return is received and inspected, eligible refunds are issued to the original payment method.', 'dawp'),
];

$warranty_claim = [
    __('Every watch is covered by a 2-year warranty against movement and battery defects from normal use.', 'dawp'),
    __('Accidental damage, water damage beyond the watch rated resistance, and normal wear (strap, crystal scratches, battery depletion after warranty) are not covered.', 'dawp'),
    __('To file a warranty claim, email support@uswatchstore.com with your order number and a description of the issue. We will confirm coverage and provide next steps for repair or replacement.', 'dawp'),
];

$render_icon = static function ($icon) {
    $icons = [
        'calendar' => '<path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/>',
        'truck'    => '<path d="M10 17h4V5H3v12h2"/><path d="M14 8h4l3 3v6h-3"/><circle cx="7" cy="17" r="2"/><circle cx="16" cy="17" r="2"/>',
        'refresh'  => '<path d="M20 12a8 8 0 0 1-13.66 5.66L4 15"/><path d="M4 20v-5h5"/><path d="M4 12A8 8 0 0 1 17.66 6.34L20 9"/><path d="M20 4v5h-5"/>',
        'mail'     => '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-10 6L2 7"/>',
        'check'    => '<path d="m20 6-11 11-5-5"/>',
    ];

    return $icons[$icon] ?? $icons['check'];
};
?>

<div class="bg-white text-[#10151C]">
    <section class="bg-[#EEF2F6] py-14 sm:py-20" aria-labelledby="shipping-returns-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:items-end">
                <div>
                    <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#5B7A99]"><?php esc_html_e('Shipping & Returns', 'dawp'); ?></p>
                    <h1 id="shipping-returns-title" class="mt-4 font-heading text-4xl font-extrabold leading-tight text-[#10151C] sm:text-5xl">
                        <?php esc_html_e('Clear delivery timelines and fair return support.', 'dawp'); ?>
                    </h1>
                    <p class="mt-5 max-w-2xl text-base leading-8 text-[#64748B]">
                        <?php esc_html_e('US Watch Store ships every watch with transparent processing, tracking, and return details so you know what to expect before and after checkout.', 'dawp'); ?>
                    </p>
                </div>

                <div class="grid gap-4 sm:grid-cols-3">
                    <?php foreach ($policy_cards as $card) : ?>
                        <article class="rounded-md border border-[#E2E8F0] bg-white p-5 shadow-sm">
                            <div class="flex h-11 w-11 items-center justify-center rounded-md bg-[#E6EDF5] text-[#5B7A99]">
                                <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <?php echo $render_icon($card['icon']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </svg>
                            </div>
                            <p class="mt-4 text-xs font-extrabold uppercase tracking-[0.12em] text-[#5B7A99]"><?php echo esc_html($card['label']); ?></p>
                            <h2 class="mt-2 font-heading text-xl font-extrabold text-[#10151C]"><?php echo esc_html($card['value']); ?></h2>
                            <p class="mt-3 text-sm leading-6 text-[#64748B]"><?php echo esc_html($card['copy']); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#FFFFFF] py-14 sm:py-20" aria-labelledby="shipping-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.82fr_1.18fr] lg:px-8">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#5B7A99]"><?php esc_html_e('Shipping Policy', 'dawp'); ?></p>
                <h2 id="shipping-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#10151C] sm:text-4xl">
                    <?php esc_html_e('How your order moves from checkout to delivery.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-[#64748B]">
                    <?php esc_html_e('Orders are processed within 1-3 business days. After dispatch, standard US shipping typically takes 3-7 business days depending on the delivery address and carrier conditions. Orders over $75 ship free.', 'dawp'); ?>
                </p>
                <a href="<?php echo esc_url($track_url); ?>" class="mt-8 inline-flex min-h-12 items-center justify-center rounded-md bg-[#1F4E79] px-6 text-sm font-bold text-white transition hover:bg-[#10151C]">
                    <?php esc_html_e('Track Your Order', 'dawp'); ?>
                </a>
            </div>

            <div class="grid gap-4">
                <?php foreach ($shipping_steps as $index => $step) : ?>
                    <article class="rounded-md border border-[#E2E8F0] bg-white p-5 shadow-sm">
                        <div class="flex gap-4">
                            <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-md bg-[#E6EDF5] text-sm font-extrabold text-[#14324D]"><?php echo esc_html($index + 1); ?></span>
                            <div>
                                <h3 class="font-heading text-lg font-extrabold text-[#10151C]"><?php echo esc_html($step['title']); ?></h3>
                                <p class="mt-2 text-sm leading-6 text-[#64748B]"><?php echo esc_html($step['copy']); ?></p>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-[#EEF2F6] py-14 sm:py-20" aria-labelledby="returns-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#5B7A99]"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></p>
                <h2 id="returns-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#10151C] sm:text-4xl">
                    <?php esc_html_e('30-day returns, no questions asked.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-[#64748B]">
                    <?php esc_html_e('You may request a return within 30 days of delivery. Eligibility depends on the watch being unworn, undamaged, and returned with its original box, tags, and papers.', 'dawp'); ?>
                </p>

                <div class="mt-7 rounded-md border border-[#E2E8F0] bg-white p-6">
                    <h3 class="font-heading text-lg font-extrabold text-[#10151C]"><?php esc_html_e('Return eligibility', 'dawp'); ?></h3>
                    <ul class="mt-4 space-y-3 text-sm leading-6 text-[#64748B]">
                        <?php foreach ($return_requirements as $requirement) : ?>
                            <li class="flex gap-3">
                                <svg class="mt-1 h-4 w-4 shrink-0 text-[#5B7A99]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <?php echo $render_icon('check'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </svg>
                                <span><?php echo esc_html($requirement); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="mt-7 rounded-md border border-[#E2E8F0] bg-white p-6">
                    <h3 class="font-heading text-lg font-extrabold text-[#10151C]"><?php esc_html_e('2-year warranty', 'dawp'); ?></h3>
                    <ul class="mt-4 space-y-3 text-sm leading-6 text-[#64748B]">
                        <?php foreach ($warranty_claim as $claim) : ?>
                            <li class="flex gap-3">
                                <svg class="mt-1 h-4 w-4 shrink-0 text-[#5B7A99]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <?php echo $render_icon('check'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </svg>
                                <span><?php echo esc_html($claim); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="rounded-md border border-[#E2E8F0] bg-white p-6 shadow-sm">
                <h3 class="font-heading text-2xl font-extrabold text-[#10151C]"><?php esc_html_e('How to request a return', 'dawp'); ?></h3>
                <div class="mt-6 grid gap-4">
                    <?php foreach ($return_process as $index => $process) : ?>
                        <div class="flex gap-4 border-b border-[#E2E8F0] pb-4 last:border-0 last:pb-0">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-md bg-[#E6EDF5] text-sm font-extrabold text-[#14324D]"><?php echo esc_html($index + 1); ?></span>
                            <p class="text-sm leading-6 text-[#64748B]"><?php echo esc_html($process); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="mt-7 rounded-md bg-[#FFFFFF] p-5">
                    <h4 class="font-heading text-lg font-extrabold text-[#10151C]"><?php esc_html_e('Refunds and return shipping', 'dawp'); ?></h4>
                    <p class="mt-3 text-sm leading-6 text-[#64748B]">
                        <?php esc_html_e('Refunds are issued to the original payment method after the returned item is received and inspected. Customers are responsible for return shipping costs unless the item arrived damaged, defective, or incorrect.', 'dawp'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-14 sm:py-20" aria-labelledby="shipping-help-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-md border border-[#E2E8F0] bg-[#FFFFFF] p-6 sm:p-8">
                <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#5B7A99]"><?php esc_html_e('Customer Support', 'dawp'); ?></p>
                        <h2 id="shipping-help-title" class="mt-3 font-heading text-2xl font-extrabold text-[#10151C]"><?php esc_html_e('Need help with a shipment or return?', 'dawp'); ?></h2>
                        <p class="mt-3 text-sm leading-7 text-[#64748B]">
                            <?php
                            echo wp_kses(
                                sprintf(
                                    /* translators: 1: support email, 2: business hours */
                                    __('Email %1$s with your order number. Business hours: %2$s.', 'dawp'),
                                    '<a class="font-bold text-[#14324D] underline decoration-[#1F4E79]/40 underline-offset-4 transition hover:text-[#10151C]" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>',
                                    esc_html($business_hours)
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
                        <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#10151C] px-6 text-sm font-bold text-white transition hover:bg-[#14324D]">
                            <?php esc_html_e('Contact Support', 'dawp'); ?>
                        </a>
                        <a href="<?php echo esc_url($faq_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#1F4E79] bg-white px-6 text-sm font-bold text-[#14324D] transition hover:bg-[#E6EDF5]">
                            <?php esc_html_e('Read FAQ', 'dawp'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
