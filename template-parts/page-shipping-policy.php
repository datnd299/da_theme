<?php
/**
 * Shipping policy page for US Watch Store.
 *
 * Hallmark · genre: modern-minimal · macrostructure: Long Document (genuinely
 * ordinal shipping steps keep numbering - ordinal content is the documented
 * exception to the no-eyebrow rule)
 * nav: N12 · footer: Ft1 · design-system: .plans/design_system.md (locked)
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email      = 'support@uswatchstore.com';
$business_hours     = __('Monday - Friday, 9:00 AM - 6:00 PM EST', 'dawp');
$last_updated       = __('August 21, 2026', 'dawp');
$track_url          = home_url('/track-order/');
$contact_url        = home_url('/contact-us/');
$return_refund_url  = home_url('/return-refund-policy/');
$terms_url          = home_url('/terms-of-service/');

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
        'copy'  => __('Estimated delivery timing begins after dispatch and may vary by destination or carrier conditions. Free on all orders.', 'dawp'),
        'icon'  => 'truck',
    ],
];

$shipping_steps = [
    [
        'title' => __('Order confirmation', 'dawp'),
        'copy'  => __('After checkout, you will receive an order confirmation at the email address used during purchase, including your order number and an itemized summary.', 'dawp'),
    ],
    [
        'title' => __('Processing', 'dawp'),
        'copy'  => __('Most orders are processed within 1-3 business days, excluding weekends and federal holidays. Orders placed after our daily cutoff begin processing the next business day.', 'dawp'),
    ],
    [
        'title' => __('Shipment and tracking', 'dawp'),
        'copy'  => __('Tracking information is emailed once your order ships. Tracking may take 24-48 hours to update after the carrier receives the package.', 'dawp'),
    ],
    [
        'title' => __('Delivery', 'dawp'),
        'copy'  => __('Standard US shipping typically takes 3-7 business days after dispatch, depending on the destination and carrier conditions. Shipping is free on all orders, with no minimum purchase required.', 'dawp'),
    ],
];

$sections = [
    [
        'title' => __('1. Where We Ship', 'dawp'),
        'copy'  => [
            __('US Watch Store currently ships only to addresses within the United States, including Alaska, Hawaii, and US territories where our carriers provide service. We do not currently offer international shipping outside the United States.', 'dawp'),
            __('We can deliver to residential and commercial addresses, as well as P.O. boxes and military APO/FPO/DPO addresses where supported by the carrier. Delivery to P.O. boxes and military addresses may take longer than the standard estimate.', 'dawp'),
        ],
    ],
    [
        'title' => __('2. Shipping Methods, Carriers, and Cost', 'dawp'),
        'copy'  => [
            __('Orders are shipped via USPS, UPS, or FedEx, selected based on your delivery address, package size, and service availability.', 'dawp'),
            __('Shipping is free on every order, with no minimum purchase required and no separate shipping line item added at checkout.', 'dawp'),
        ],
    ],
    [
        'title' => __('3. Order Processing Time', 'dawp'),
        'copy'  => [
            __('Orders are reviewed, quality-inspected, and packed within 1-3 business days of purchase, Monday through Friday, excluding weekends and federal holidays.', 'dawp'),
            __('Our daily order cutoff time is 5:00 PM EST. Orders placed before 5:00 PM EST begin processing the same business day; orders placed after 5:00 PM EST, on weekends, or on holidays begin processing on the next business day.', 'dawp'),
            __('Processing may take longer during high-volume periods such as major holidays or sale events; known delays will be noted on the website.', 'dawp'),
        ],
    ],
    [
        'title' => __('4. Delivery Timeframes', 'dawp'),
        'copy'  => [
            __('Once dispatched, standard US shipping typically takes 3-7 business days to arrive, depending on the destination and carrier conditions. Total time from order placement to delivery is generally 4-10 business days, combining processing and transit.', 'dawp'),
            __('Delivery estimates are provided in good faith based on carrier information and are not guaranteed. Actual delivery times may vary due to weather, high shipping volume, carrier delays, incorrect address information, or other events outside our control.', 'dawp'),
        ],
    ],
    [
        'title' => __('5. Order Tracking', 'dawp'),
        'copy'  => [
            __('You will receive a shipping confirmation email with tracking information once your order leaves our facility. Tracking updates may take 24-48 hours to appear after a shipping label is created.', 'dawp'),
            __('You can also check order status anytime on our Track Order page using your order number and the email address or zip code used at checkout.', 'dawp'),
        ],
    ],
    [
        'title' => __('6. Shipping Address Accuracy', 'dawp'),
        'copy'  => [
            __('You are responsible for entering a complete and accurate shipping address at checkout. US Watch Store is not responsible for delayed, misdirected, or undelivered packages resulting from an incorrect or incomplete address provided by the customer.', 'dawp'),
            __('If you notice an error in your shipping address, contact support@uswatchstore.com as soon as possible after placing your order. We will do our best to update it before the order ships, but we cannot guarantee changes once an order has entered processing or shipped.', 'dawp'),
        ],
    ],
    [
        'title' => __('7. Lost, Stolen, or Delayed Packages', 'dawp'),
        'copy'  => [
            __('If tracking shows your package as delivered but you have not received it, please check with neighbors and building management and allow up to 48 hours, as carriers occasionally mark packages delivered slightly before arrival.', 'dawp'),
            __('If a package is confirmed lost in transit or does not arrive within a reasonable time after the estimated delivery window, contact support@uswatchstore.com with your order number so we can file a claim with the carrier and arrange a replacement or refund.', 'dawp'),
            __('US Watch Store is not responsible for packages stolen after delivery is confirmed, but we are happy to help you file a report with the carrier or local authorities if needed.', 'dawp'),
        ],
    ],
    [
        'title' => __('8. Order Changes and Cancellations', 'dawp'),
        'copy'  => [
            __('If you need to change or cancel an order, contact support@uswatchstore.com as soon as possible. We can typically accommodate changes or cancellations only before an order has entered processing or shipped; once shipped, an order must instead be handled under our Return & Refund Policy.', 'dawp'),
        ],
    ],
    [
        'title' => __('9. Multiple-Item and Split Shipments', 'dawp'),
        'copy'  => [
            __('Orders containing multiple items may ship in separate packages, sometimes from different fulfillment locations, and may arrive on different days. You will receive tracking information for each shipment.', 'dawp'),
        ],
    ],
    [
        'title' => __('10. Damaged Packages', 'dawp'),
        'copy'  => [
            __('If your package arrives visibly damaged, note it or take photos before opening if possible, and contact support@uswatchstore.com within 48 hours of delivery with your order number and photos of the damage so we can arrange a free replacement or refund.', 'dawp'),
        ],
    ],
];

$render_icon = static function ($icon) {
    $icons = [
        'calendar' => '<path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/>',
        'truck'    => '<path d="M10 17h4V5H3v12h2"/><path d="M14 8h4l3 3v6h-3"/><circle cx="7" cy="17" r="2"/><circle cx="16" cy="17" r="2"/>',
    ];

    return $icons[$icon] ?? $icons['calendar'];
};
?>

<div class="bg-background text-foreground">
    <section class="bg-surface py-14 sm:py-20" aria-labelledby="shipping-policy-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:items-end">
                <div>
                    <div class="flex flex-wrap items-center gap-3">
                        <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-accent-blush"><?php esc_html_e('Shipping Policy', 'dawp'); ?></p>
                        <span class="inline-flex items-center rounded-sm border border-border bg-background px-2.5 py-1 text-xs font-semibold uppercase tracking-[0.08em] text-muted">
                            <?php echo esc_html(sprintf(__('Last Updated: %s', 'dawp'), $last_updated)); ?>
                        </span>
                    </div>
                    <h1 id="shipping-policy-title" class="mt-4 font-heading text-4xl font-extrabold leading-tight text-foreground sm:text-5xl">
                        <?php esc_html_e('Clear delivery timelines on every order.', 'dawp'); ?>
                    </h1>
                    <p class="mt-5 max-w-2xl text-base leading-8 text-foreground-muted">
                        <?php esc_html_e('US Watch Store ships every watch with transparent processing and tracking details so you know what to expect after checkout.', 'dawp'); ?>
                    </p>
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                    <?php foreach ($policy_cards as $card) : ?>
                        <article class="rounded-md border border-border bg-background p-5 shadow-card">
                            <div class="flex h-11 w-11 items-center justify-center rounded-sm bg-accent-soft text-accent-blush">
                                <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <?php echo $render_icon($card['icon']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </svg>
                            </div>
                            <p class="mt-4 text-xs font-extrabold uppercase tracking-[0.12em] text-accent-blush"><?php echo esc_html($card['label']); ?></p>
                            <h2 class="mt-2 font-heading text-xl font-extrabold text-foreground"><?php echo esc_html($card['value']); ?></h2>
                            <p class="mt-3 text-sm leading-6 text-foreground-muted"><?php echo esc_html($card['copy']); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-background py-14 sm:py-20" aria-labelledby="shipping-steps-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.82fr_1.18fr] lg:px-8">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-accent-blush"><?php esc_html_e('How It Works', 'dawp'); ?></p>
                <h2 id="shipping-steps-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-foreground sm:text-4xl">
                    <?php esc_html_e('How your order moves from checkout to delivery.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-foreground-muted">
                    <?php esc_html_e('Orders are processed within 1-3 business days. After dispatch, standard US shipping typically takes 3-7 business days depending on the delivery address and carrier conditions. Shipping is free on all orders.', 'dawp'); ?>
                </p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url($track_url); ?>" class="inline-flex min-h-12 items-center justify-center whitespace-nowrap rounded-sm bg-accent px-6 text-sm font-bold text-white transition hover:bg-accent-hover">
                        <?php esc_html_e('Track Your Order', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url($return_refund_url); ?>" class="inline-flex min-h-12 items-center justify-center whitespace-nowrap rounded-sm border border-accent bg-background px-6 text-sm font-bold text-accent-hover transition hover:bg-surface-alt">
                        <?php esc_html_e('Return & Refund Policy', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <div class="grid gap-4">
                <?php foreach ($shipping_steps as $index => $step) : ?>
                    <article class="rounded-md border border-border bg-surface p-5">
                        <div class="flex gap-4">
                            <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-sm bg-accent-soft text-sm font-extrabold text-accent-hover"><?php echo esc_html($index + 1); ?></span>
                            <div>
                                <h3 class="font-heading text-lg font-extrabold text-foreground"><?php echo esc_html($step['title']); ?></h3>
                                <p class="mt-2 text-sm leading-6 text-foreground-muted"><?php echo esc_html($step['copy']); ?></p>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Long Document: continuous prose, inline section heads, no card boxes -->
    <section class="bg-surface py-16 sm:py-24" aria-labelledby="shipping-detail-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.7fr_1.3fr] lg:px-8">
            <aside class="lg:sticky lg:top-24 lg:self-start">
                <div class="rounded-md border border-border bg-background p-6">
                    <h2 id="shipping-detail-title" class="font-heading text-xl font-extrabold text-foreground"><?php esc_html_e('Full shipping details', 'dawp'); ?></h2>
                    <p class="mt-4 text-sm leading-7 text-foreground-muted">
                        <?php esc_html_e('Coverage area, carriers, address accuracy, lost packages, and order changes - everything beyond the quick summary above.', 'dawp'); ?>
                    </p>
                    <div class="mt-6 grid gap-3">
                        <a href="<?php echo esc_url($return_refund_url); ?>" class="inline-flex min-h-12 items-center justify-center whitespace-nowrap rounded-sm bg-accent px-5 text-sm font-bold text-white transition hover:bg-accent-hover">
                            <?php esc_html_e('Return & Refund Policy', 'dawp'); ?>
                        </a>
                        <a href="<?php echo esc_url($terms_url); ?>" class="inline-flex min-h-12 items-center justify-center whitespace-nowrap rounded-sm border border-accent bg-background px-5 text-sm font-bold text-accent-hover transition hover:bg-surface-alt">
                            <?php esc_html_e('Terms of Service', 'dawp'); ?>
                        </a>
                    </div>
                </div>
            </aside>

            <div class="max-w-[65ch] divide-y divide-border">
                <?php foreach ($sections as $section) : ?>
                    <article class="py-7 first:pt-0">
                        <h2 class="font-heading text-xl font-extrabold text-foreground"><?php echo esc_html($section['title']); ?></h2>
                        <div class="mt-4 space-y-4 text-base leading-7 text-foreground-muted">
                            <?php foreach ($section['copy'] as $paragraph) : ?>
                                <p><?php echo esc_html($paragraph); ?></p>
                            <?php endforeach; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-background py-14 sm:py-20" aria-labelledby="shipping-help-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-md border border-border bg-surface p-6 sm:p-8">
                <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <h2 id="shipping-help-title" class="font-heading text-2xl font-extrabold text-foreground"><?php esc_html_e('Need help with a shipment?', 'dawp'); ?></h2>
                        <p class="mt-3 text-sm leading-7 text-foreground-muted">
                            <?php
                            echo wp_kses(
                                sprintf(
                                    /* translators: 1: support email, 2: business hours */
                                    __('Email %1$s with your order number. Business hours: %2$s.', 'dawp'),
                                    '<a class="font-bold text-accent-hover underline decoration-accent/40 underline-offset-4 transition hover:text-foreground" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>',
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

                    <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center whitespace-nowrap rounded-sm bg-foreground px-6 text-sm font-bold text-white transition hover:bg-accent-hover">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
