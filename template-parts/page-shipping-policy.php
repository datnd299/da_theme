<?php
/**
 * Shipping Policy — YourWatchStore. Tailwind utilities only.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email  = 'support@yourwatchstore.com';
$business_hours = __('Monday - Friday, 9:00 AM - 5:00 PM EST', 'dawp');
$updated        = get_the_modified_date('F j, Y') ?: gmdate('F j, Y');
$store_address  = function_exists('dawp_get_woocommerce_store_address') ? dawp_get_woocommerce_store_address() : '';

$sections = [
    [
        'title' => __('Where we ship', 'dawp'),
        'body'  => [
            __('YourWatchStore ships to addresses within the United States only, including APO/FPO addresses where the carrier allows it. We do not currently ship internationally.', 'dawp'),
            __('If an address cannot be served by our carriers, you will be notified before payment is taken or, if discovered afterward, contacted for an updated address or a full refund.', 'dawp'),
        ],
    ],
    [
        'title' => __('Shipping cost', 'dawp'),
        'body'  => [
            __('Standard US shipping is free on every order. There is no minimum order value and no separate handling fee. The price you see at checkout is the price you pay.', 'dawp'),
        ],
    ],
    [
        'title' => __('What counts as a business day', 'dawp'),
        'body'  => [
            __('Business days are Monday through Friday, excluding US federal holidays. Orders placed on a weekend or holiday are treated as received the next business day. Processing time and transit time are counted separately and both use business days.', 'dawp'),
        ],
    ],
    [
        'title' => __('Order processing time', 'dawp'),
        'body'  => [
            __('Orders are processed and packed within 1-3 business days of purchase. Our order cutoff is 12:00 PM (Noon) Eastern Time; orders placed after the cutoff, on weekends, or on US public holidays begin processing on the next business day.', 'dawp'),
            __('Each watch is wound, checked for timekeeping and function, and inspected for cosmetic condition before it is packed in a protective box with padding.', 'dawp'),
            __('If an item unexpectedly goes out of stock after you order, we will email you within 2 business days with the option to wait for restock, swap to another model, or receive a full refund.', 'dawp'),
        ],
    ],
    [
        'title' => __('Delivery time', 'dawp'),
        'body'  => [
            __('After dispatch, standard transit typically takes 3-7 business days. Total estimated delivery is about 4-10 business days from the order date. These are estimates, not guarantees; carrier delays, weather, customs or hub congestion, and peak periods can extend them.', 'dawp'),
            __('Delivery estimates shown at checkout or in tracking emails are provided by the carrier and may change after the label is created.', 'dawp'),
        ],
    ],
    [
        'title' => __('Order confirmation and dispatch emails', 'dawp'),
        'body'  => [
            __('You receive an order confirmation email immediately after checkout with your order number and a summary of what you bought. If it does not arrive within an hour, check your spam folder and confirm the email address on the order was correct.', 'dawp'),
            __('A separate shipping confirmation email is sent when the order leaves our facility. It contains the carrier name, the tracking number, and a tracking link.', 'dawp'),
        ],
    ],
    [
        'title' => __('Carriers and tracking', 'dawp'),
        'body'  => [
            __('We ship with USPS, UPS, and FedEx and select the carrier based on the destination and the value of the order. We cannot guarantee a specific carrier for a given order.', 'dawp'),
            __('Every order ships with tracking. You can follow status on the carrier site using the number in your shipping email, or on our Track Order page using your order details.', 'dawp'),
            __('An order with more than one item may arrive in separate parcels, each with its own tracking number and possibly on different days.', 'dawp'),
        ],
    ],
    [
        'title' => __('Signature on delivery', 'dawp'),
        'body'  => [
            __('Higher-value watches ship with a signature requirement for security. If no one is available, the carrier will leave a notice and reattempt delivery or hold the parcel at a local facility for pickup. We are not able to waive the signature requirement once a shipment is in transit.', 'dawp'),
        ],
    ],
    [
        'title' => __('Delayed, lost, or missing packages', 'dawp'),
        'body'  => [
            __('If tracking has not updated for an extended period, or a parcel is marked delivered but you cannot find it, contact us within 30 days of the expected delivery date. Include your order number, checkout email, and delivery address so we can open a carrier investigation.', 'dawp'),
        ],
    ],
    [
        'title' => __('Changing an address after ordering', 'dawp'),
        'body'  => [
            __('If you need to correct the shipping address, email us with your order number as soon as possible. We can only update an address before the order enters processing. Once a label is printed we cannot change it.', 'dawp'),
        ],
    ],
    [
        'title' => __('Incorrect or incomplete address', 'dawp'),
        'body'  => [
            __('Please review your shipping address carefully at checkout, including apartment or unit numbers. We are not able to reroute a package once it has shipped.', 'dawp'),
            __('If a parcel is returned to us as undeliverable because of an incorrect or incomplete address, we will contact you to arrange re-shipment or a refund of the item price. A re-shipment caused by an address error may incur a new shipping charge.', 'dawp'),
        ],
    ],
    [
        'title' => __('Failed delivery and unclaimed parcels', 'dawp'),
        'body'  => [
            __('If the carrier cannot deliver and you do not collect the parcel from the pickup location within the carrier hold period, it will be sent back to us. Treat this the same as a returned undeliverable parcel above.', 'dawp'),
        ],
    ],
    [
        'title' => __('Damaged in transit', 'dawp'),
        'body'  => [
            __('If your watch arrives damaged, contact us within 30 days of delivery with photos of the watch, the packaging inside and out, and the shipping label. Keep all packaging until the claim is resolved, as the carrier may need to inspect it.', 'dawp'),
            __('We cover return shipping for carrier-damaged items and arrange a replacement or refund once the claim is confirmed.', 'dawp'),
        ],
    ],
    [
        'title' => __('Risk and title', 'dawp'),
        'body'  => [
            __('Risk of loss and title for items pass to you when the carrier marks the parcel delivered to the address on the order. Claims for parcels shown as delivered but not received are handled as described under lost or missing packages above.', 'dawp'),
        ],
    ],
    [
        'title' => __('Sales tax', 'dawp'),
        'body'  => [
            __('Applicable US state and local sales tax is calculated on the shipping address and shown on the final checkout screen. Because we ship within the United States only, there are no import duties or customs fees on your order.', 'dawp'),
        ],
    ],
];
?>

<div class="bg-background text-foreground">
    <section class="border-b border-border">
        <div class="mx-auto max-w-3xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
            <p class="text-xs font-bold uppercase tracking-[0.16em] text-accent-blush"><?php esc_html_e('Policies', 'dawp'); ?></p>
            <h1 class="mt-4 font-heading text-4xl font-extrabold leading-tight tracking-tight text-foreground sm:text-5xl"><?php esc_html_e('Shipping Policy', 'dawp'); ?></h1>
            <p class="mt-5 text-base leading-7 text-foreground-muted"><?php esc_html_e('Free US shipping on every order, dispatched within 1-3 business days with tracking.', 'dawp'); ?></p>
            <p class="mt-3 text-sm text-muted"><?php printf(esc_html__('Last updated: %s', 'dawp'), esc_html($updated)); ?></p>
        </div>
    </section>

    <section class="mx-auto max-w-3xl px-4 py-14 sm:px-6 lg:px-8 lg:py-16">
        <div class="space-y-10">
            <?php foreach ($sections as $section) : ?>
                <div>
                    <h2 class="font-heading text-xl font-bold text-foreground sm:text-2xl"><?php echo esc_html($section['title']); ?></h2>
                    <?php foreach ($section['body'] as $paragraph) : ?>
                        <p class="mt-3 text-base leading-7 text-foreground-muted"><?php echo esc_html($paragraph); ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>

            <div class="rounded-md border border-border bg-surface-alt p-6">
                <h2 class="font-heading text-lg font-bold text-foreground"><?php esc_html_e('Questions about your shipment?', 'dawp'); ?></h2>
                <p class="mt-2 text-sm leading-6 text-foreground-muted">
                    <?php
                    printf(
                        wp_kses(__('Email <a class="font-semibold text-accent-blush underline underline-offset-2" href="mailto:%1$s">%1$s</a>. Support hours: %2$s.', 'dawp'), ['a' => ['class' => [], 'href' => []]]),
                        esc_attr($support_email),
                        esc_html($business_hours)
                    );
                    ?>
                </p>
                <?php if ($store_address) : ?>
                    <p class="mt-2 text-sm leading-6 text-foreground-muted"><?php printf(esc_html__('Ships from: %s', 'dawp'), esc_html($store_address)); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>
