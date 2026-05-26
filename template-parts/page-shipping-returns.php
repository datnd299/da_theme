<?php
/**
 * Shipping and returns page for LBQ Shop.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email  = 'support@lbqshop.com';
$business_hours = __('Monday - Friday, 9:00 AM - 6:00 PM EST', 'dawp');
$track_url      = home_url('/track-order/');
$contact_url    = home_url('/contact-us/');
$faq_url        = home_url('/faq/');

$policy_cards = [
    [
        'label' => __('Order Cut Off', 'dawp'),
        'value' => __('2:00 PM PST', 'dawp'),
        'copy'  => __('Orders placed after the cut off time are counted from the next business day.', 'dawp'),
        'icon'  => 'calendar',
    ],
    [
        'label' => __('Handling Time', 'dawp'),
        'value' => __('0-1 business days', 'dawp'),
        'copy'  => __('Orders are prepared for shipment Monday through Saturday.', 'dawp'),
        'icon'  => 'truck',
    ],
    [
        'label' => __('Return Window', 'dawp'),
        'value' => __('30 days from delivery', 'dawp'),
        'copy'  => __('Returns and exchanges are accepted for new products that meet the policy conditions.', 'dawp'),
        'icon'  => 'refresh',
    ],
];

$shipping_steps = [
    [
        'title' => __('Order cut off', 'dawp'),
        'copy'  => __('The daily order cut off time is 2:00 PM Pacific Standard Time (Los Angeles). Orders placed after the cut off time are processed from the next business day.', 'dawp'),
        'meta'  => __('2:00 PM PST', 'dawp'),
    ],
    [
        'title' => __('Handling time', 'dawp'),
        'copy'  => __('Handling time is the time between order cut off and when the shipment is ready for transit. Current handling time is 0-1 business days.', 'dawp'),
        'meta'  => __('0-1 business days', 'dawp'),
    ],
    [
        'title' => __('Fulfillment days', 'dawp'),
        'copy'  => __('Orders are fulfilled Monday through Saturday. Public holidays may affect the final delivery estimate.', 'dawp'),
        'meta'  => __('Mon - Sat', 'dawp'),
    ],
    [
        'title' => __('Transit time', 'dawp'),
        'copy'  => __('Transit time is currently listed as 0 business days for all destinations in the provided policy settings.', 'dawp'),
        'meta'  => __('0 business days', 'dawp'),
    ],
];

$return_requirements = [
    __('Returns are accepted for defective and non-defective products.', 'dawp'),
    __('Exchanges are accepted.', 'dawp'),
    __('Only new products are eligible, including unopened products in original packaging or products that have never been used.', 'dawp'),
    __('Return requests must be made within 30 days of delivery.', 'dawp'),
];

$return_process = [
    __('Email support with your order number, item details, and whether you need a return or exchange.', 'dawp'),
    __('Wait for instructions before mailing the item back so the return can be matched to your order.', 'dawp'),
    __('Return the item by mail. The return label option is download and print.', 'dawp'),
    __('After the return is received and approved, refunds are processed within 10 days.', 'dawp'),
];

$shipping_facts = [
    [
        'label' => __('Time zone', 'dawp'),
        'value' => __('(GMT-08:00) Pacific Standard Time (Los Angeles)', 'dawp'),
    ],
    [
        'label' => __('Fulfilled', 'dawp'),
        'value' => __('Mon - Sat', 'dawp'),
    ],
    [
        'label' => __('Shipped', 'dawp'),
        'value' => __('Mon - Sat', 'dawp'),
    ],
    [
        'label' => __('All destinations', 'dawp'),
        'value' => __('0-1 business days', 'dawp'),
    ],
];

$return_facts = [
    [
        'label' => __('Return method', 'dawp'),
        'value' => __('By mail', 'dawp'),
    ],
    [
        'label' => __('Currency', 'dawp'),
        'value' => __('USD', 'dawp'),
    ],
    [
        'label' => __('Return label cost', 'dawp'),
        'value' => __('Customer responsibility', 'dawp'),
    ],
    [
        'label' => __('Restocking fee', 'dawp'),
        'value' => __('No cost', 'dawp'),
    ],
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

<div class="bg-white text-[#2F2A28]">
    <section class="bg-[#F8F2EE] py-14 sm:py-20" aria-labelledby="shipping-returns-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:items-end">
                <div>
                    <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A96870]"><?php esc_html_e('Shipping & Returns', 'dawp'); ?></p>
                    <h1 id="shipping-returns-title" class="mt-4 font-heading text-4xl font-extrabold leading-tight text-[#2F2A28] sm:text-5xl">
                        <?php esc_html_e('Shipping and return policy details.', 'dawp'); ?>
                    </h1>
                    <p class="mt-5 max-w-2xl text-base leading-8 text-[#6F625D]">
                        <?php esc_html_e('LBQ Shop keeps the policy settings visible so you can review cut off time, handling time, return eligibility, label cost, and refund timing before or after checkout.', 'dawp'); ?>
                    </p>
                </div>

                <div class="grid gap-4 sm:grid-cols-3">
                    <?php foreach ($policy_cards as $card) : ?>
                        <article class="rounded-md border border-[#E8DAD4] bg-white p-5 shadow-sm">
                            <div class="flex h-11 w-11 items-center justify-center rounded-md bg-[#FBEDEA] text-[#A96870]">
                                <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <?php echo $render_icon($card['icon']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </svg>
                            </div>
                            <p class="mt-4 text-xs font-extrabold uppercase tracking-[0.12em] text-[#A96870]"><?php echo esc_html($card['label']); ?></p>
                            <h2 class="mt-2 font-heading text-xl font-extrabold text-[#2F2A28]"><?php echo esc_html($card['value']); ?></h2>
                            <p class="mt-3 text-sm leading-6 text-[#6F625D]"><?php echo esc_html($card['copy']); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#FFFDFC] py-14 sm:py-20" aria-labelledby="shipping-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.82fr_1.18fr] lg:px-8">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A96870]"><?php esc_html_e('Shipping Policy', 'dawp'); ?></p>
                <h2 id="shipping-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#2F2A28] sm:text-4xl">
                    <?php esc_html_e('Estimated delivery is based on cut off, handling, and transit time.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-[#6F625D]">
                    <?php esc_html_e('The provided shipping settings use a 2:00 PM PST order cut off, 0-1 business day handling time, Monday through Saturday fulfillment, and 0 business day transit time for all destinations.', 'dawp'); ?>
                </p>
                <a href="<?php echo esc_url($track_url); ?>" class="mt-8 inline-flex min-h-12 items-center justify-center rounded-md bg-[#C87F86] px-6 text-sm font-bold text-white transition hover:bg-[#2F2A28]">
                    <?php esc_html_e('Track Your Order', 'dawp'); ?>
                </a>

                <div class="mt-8 grid gap-3 sm:grid-cols-2">
                    <?php foreach ($shipping_facts as $fact) : ?>
                        <div class="rounded-md border border-[#E8DAD4] bg-white p-4">
                            <p class="text-xs font-extrabold uppercase tracking-[0.12em] text-[#A96870]"><?php echo esc_html($fact['label']); ?></p>
                            <p class="mt-2 text-sm font-bold leading-6 text-[#2F2A28]"><?php echo esc_html($fact['value']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="grid gap-4">
                <?php foreach ($shipping_steps as $index => $step) : ?>
                    <article class="rounded-md border border-[#E8DAD4] bg-white p-5 shadow-sm">
                        <div class="flex gap-4">
                            <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-md bg-[#FBEDEA] text-sm font-extrabold text-[#8A4F56]"><?php echo esc_html($index + 1); ?></span>
                            <div class="min-w-0">
                                <p class="mb-2 inline-flex rounded-md bg-[#FFF3F1] px-3 py-1 text-xs font-extrabold uppercase tracking-[0.12em] text-[#8A4F56]"><?php echo esc_html($step['meta']); ?></p>
                                <h3 class="font-heading text-lg font-extrabold text-[#2F2A28]"><?php echo esc_html($step['title']); ?></h3>
                                <p class="mt-2 text-sm leading-6 text-[#6F625D]"><?php echo esc_html($step['copy']); ?></p>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-[#F8F2EE] py-14 sm:py-20" aria-labelledby="returns-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A96870]"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></p>
                <h2 id="returns-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#2F2A28] sm:text-4xl">
                    <?php esc_html_e('Returns and exchanges are accepted for eligible new products.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-[#6F625D]">
                    <?php esc_html_e('The provided policy accepts returns for defective and non-defective products, accepts exchanges, and uses a 30-day return window. Eligible products must be new and meet the stated condition requirements.', 'dawp'); ?>
                </p>

                <div class="mt-7 rounded-md border border-[#E8DAD4] bg-white p-6">
                    <h3 class="font-heading text-lg font-extrabold text-[#2F2A28]"><?php esc_html_e('Return eligibility', 'dawp'); ?></h3>
                    <ul class="mt-4 space-y-3 text-sm leading-6 text-[#6F625D]">
                        <?php foreach ($return_requirements as $requirement) : ?>
                            <li class="flex gap-3">
                                <svg class="mt-1 h-4 w-4 shrink-0 text-[#A96870]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <?php echo $render_icon('check'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </svg>
                                <span><?php echo esc_html($requirement); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="rounded-md border border-[#E8DAD4] bg-white p-6 shadow-sm">
                <h3 class="font-heading text-2xl font-extrabold text-[#2F2A28]"><?php esc_html_e('How to request a return', 'dawp'); ?></h3>
                <div class="mt-5 grid gap-3 sm:grid-cols-2">
                    <?php foreach ($return_facts as $fact) : ?>
                        <div class="rounded-md border border-[#E8DAD4] bg-[#FFFDFC] p-4">
                            <p class="text-xs font-extrabold uppercase tracking-[0.12em] text-[#A96870]"><?php echo esc_html($fact['label']); ?></p>
                            <p class="mt-2 text-sm font-bold leading-6 text-[#2F2A28]"><?php echo esc_html($fact['value']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="mt-6 grid gap-4">
                    <?php foreach ($return_process as $index => $process) : ?>
                        <div class="flex gap-4 border-b border-[#E8DAD4] pb-4 last:border-0 last:pb-0">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-md bg-[#FBEDEA] text-sm font-extrabold text-[#8A4F56]"><?php echo esc_html($index + 1); ?></span>
                            <p class="text-sm leading-6 text-[#6F625D]"><?php echo esc_html($process); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="mt-7 rounded-md bg-[#FFFDFC] p-5">
                    <h4 class="font-heading text-lg font-extrabold text-[#2F2A28]"><?php esc_html_e('Refunds and return shipping', 'dawp'); ?></h4>
                    <p class="mt-3 text-sm leading-6 text-[#6F625D]">
                        <?php esc_html_e('Customers are responsible for the return label cost. There is no restocking fee, and approved refunds are processed within 10 days after the return is received and reviewed.', 'dawp'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-14 sm:py-20" aria-labelledby="shipping-help-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-md border border-[#E8DAD4] bg-[#FFFDFC] p-6 sm:p-8">
                <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A96870]"><?php esc_html_e('Customer Support', 'dawp'); ?></p>
                        <h2 id="shipping-help-title" class="mt-3 font-heading text-2xl font-extrabold text-[#2F2A28]"><?php esc_html_e('Need help with a shipment or return?', 'dawp'); ?></h2>
                        <p class="mt-3 text-sm leading-7 text-[#6F625D]">
                            <?php
                            echo wp_kses(
                                sprintf(
                                    /* translators: 1: support email, 2: business hours */
                                    __('Email %1$s with your order number. Business hours: %2$s.', 'dawp'),
                                    '<a class="font-bold text-[#8A4F56] underline decoration-[#C87F86]/40 underline-offset-4 transition hover:text-[#2F2A28]" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>',
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
                        <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#2F2A28] px-6 text-sm font-bold text-white transition hover:bg-[#8A4F56]">
                            <?php esc_html_e('Contact Support', 'dawp'); ?>
                        </a>
                        <a href="<?php echo esc_url($faq_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#C87F86] bg-white px-6 text-sm font-bold text-[#8A4F56] transition hover:bg-[#FBEDEA]">
                            <?php esc_html_e('Read FAQs', 'dawp'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
