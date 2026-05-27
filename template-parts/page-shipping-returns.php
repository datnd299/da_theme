<?php
/**
 * Shipping & Returns template part.
 *
 * @package dawp
 */

$policy_cards = [
    [
        'number' => '01',
        'title'  => __('Order Cutoff', 'dawp'),
        'copy'   => __('5:00 PM Pacific Standard Time.', 'dawp'),
        'color'  => '#2563EB',
    ],
    [
        'number' => '02',
        'title'  => __('Handling Time', 'dawp'),
        'copy'   => __('Orders are fulfilled within 1-3 business days, Monday through Friday.', 'dawp'),
        'color'  => '#06B6D4',
    ],
    [
        'number' => '03',
        'title'  => __('Transit Time', 'dawp'),
        'copy'   => __('After processing is complete, U.S. transit typically takes 3-5 business days.', 'dawp'),
        'color'  => '#C026D3',
    ],
    [
        'number' => '04',
        'title'  => __('Shipping Cost', 'dawp'),
        'copy'   => __('Free standard shipping on U.S. orders.', 'dawp'),
        'color'  => '#65A30D',
    ],
];

$sections = [
    [
        'id'      => 'shipping',
        'eyebrow' => __('Shipping Policy', 'dawp'),
        'title'   => __('Processing, shipping, and delivery time.', 'dawp'),
        'body'    => [
            __('Orders placed before the 5:00 PM Pacific Standard Time cutoff begin processing after payment is confirmed. Orders placed after the cutoff may begin processing on the next business day.', 'dawp'),
            __('Handling time is 1-3 business days, Monday through Friday. Handling includes order review, preparation, packing, and handoff for shipment.', 'dawp'),
            __('After processing is complete, standard transit within the United States typically takes 3-5 business days depending on destination and carrier conditions.', 'dawp'),
            __('Standard shipping is free on U.S. orders.', 'dawp'),
            __('Estimated delivery dates are not guaranteed. Weather, public holidays, high order volume, incorrect addresses, customs or carrier interruptions, and other conditions outside our control may affect delivery timing.', 'dawp'),
        ],
    ],
    [
        'id'      => 'tracking',
        'eyebrow' => __('Tracking', 'dawp'),
        'title'   => __('Shipment updates after dispatch.', 'dawp'),
        'body'    => [
            __('Tracking information is provided once it becomes available from the fulfillment or carrier system.', 'dawp'),
            __('A tracking number may show limited movement at first. Please allow time for the carrier tracking page to update after the label is created or the package is scanned.', 'dawp'),
            __('If tracking has not updated for an extended period, contact support with your order number and checkout email address so we can review the shipment status.', 'dawp'),
        ],
    ],
    [
        'id'      => 'returns',
        'eyebrow' => __('Return Policy', 'dawp'),
        'title'   => __('Return eligibility for shoes.', 'dawp'),
        'body'    => [
            __('Return requests must be made within 30 days after delivery. Items sent back without first contacting support may not be accepted.', 'dawp'),
            __('To be eligible for return, shoes must be unworn, unused, undamaged, and returned in the original shoebox and packaging with all included tags, inserts, and accessories where applicable.', 'dawp'),
            __('Please do not place tape, labels, or postage directly on the original shoebox. The shoebox should be placed inside a separate shipping box or mailer before return shipment.', 'dawp'),
            __('Returns are accepted by mail only. In-store returns and drop-off location returns are not available under this policy.', 'dawp'),
            __('To request a return, contact support with your order number, checkout email address, item name, and reason for the request before sending anything back.', 'dawp'),
        ],
    ],
    [
        'id'      => 'refunds',
        'eyebrow' => __('Refunds', 'dawp'),
        'title'   => __('Return costs and refund processing.', 'dawp'),
        'body'    => [
            __('Customers are responsible for return shipping costs unless support confirms a different resolution for an approved damaged, defective, incorrect, or missing item issue.', 'dawp'),
            __('Original shipping charges, upgraded shipping fees, and any duties, taxes, or carrier fees are not refundable unless required by law or confirmed by support for an approved order issue.', 'dawp'),
            __('Returned items are inspected after receipt. If the return is approved, the refund is issued to the original payment method.', 'dawp'),
            __('Approved refunds are processed within 10 business days after the returned item is received and inspected. Your bank, card provider, or payment service may take additional time to post the refund.', 'dawp'),
        ],
    ],
    [
        'id'      => 'issues',
        'eyebrow' => __('Order Issues', 'dawp'),
        'title'   => __('Damaged, incorrect, or missing items.', 'dawp'),
        'body'    => [
            __('If an item arrives damaged, defective, incorrect, or missing from your package, contact us as soon as possible with your order number and clear photos of the product, packaging, and shipping label where relevant.', 'dawp'),
            __('Our support team will review the details and provide the next available resolution based on the order issue, return eligibility, item condition, and available inventory.', 'dawp'),
        ],
    ],
];
?>

<div class="bg-white font-body text-[#101828]">
    <section class="relative overflow-hidden bg-[#F3F7FB]">
        <div class="relative mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
            <div class="max-w-4xl">
                <p class="mb-5 inline-flex rounded-full bg-[#DBEAFE] px-4 py-2 text-xs font-black uppercase tracking-[0.18em] text-[#2563EB]">
                    <?php esc_html_e('Shipping & Returns', 'dawp'); ?>
                </p>
                <h1 class="font-heading text-4xl font-black uppercase leading-[0.98] text-[#101828] sm:text-5xl lg:text-[4.25rem]">
                    <?php esc_html_e('Shipping and return policy.', 'dawp'); ?>
                </h1>
                <p class="mt-6 max-w-2xl text-lg leading-8 text-[#475467]">
                    <?php esc_html_e('Review processing time, standard delivery expectations, tracking updates, 30-day return eligibility, shoe packaging requirements, return costs, and refund processing.', 'dawp'); ?>
                </p>
            </div>

            <div class="mt-10 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <?php foreach ($policy_cards as $card) : ?>
                    <article class="border border-[#E5E7EB] bg-white p-6 shadow-sm">
                        <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full text-sm font-black text-white" style="background-color: <?php echo esc_attr($card['color']); ?>">
                            <?php echo esc_html($card['number']); ?>
                        </div>
                        <h2 class="font-heading text-xl font-black uppercase leading-tight text-[#101828]">
                            <?php echo esc_html($card['title']); ?>
                        </h2>
                        <p class="mt-3 text-sm leading-6 text-[#475467]">
                            <?php echo esc_html($card['copy']); ?>
                        </p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 sm:px-6 lg:grid-cols-[0.82fr_1.18fr] lg:px-8">
            <aside class="lg:sticky lg:top-32 lg:self-start">
                <div class="rounded-[2rem] bg-[#101828] p-7 text-white shadow-xl shadow-[#101828]/10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#67E8F9]"><?php esc_html_e('Policy Sections', 'dawp'); ?></p>
                    <h2 class="font-heading text-3xl font-black uppercase leading-tight"><?php esc_html_e('Find the details you need.', 'dawp'); ?></h2>
                    <nav class="mt-7 grid gap-3 text-sm font-black uppercase tracking-wide text-white/85" aria-label="<?php esc_attr_e('Shipping and returns navigation', 'dawp'); ?>">
                        <?php foreach ($sections as $section) : ?>
                            <a href="#<?php echo esc_attr($section['id']); ?>" class="rounded-2xl border border-white/10 px-4 py-3 transition hover:border-[#67E8F9] hover:text-[#67E8F9]">
                                <?php echo esc_html($section['eyebrow']); ?>
                            </a>
                        <?php endforeach; ?>
                    </nav>
                </div>
            </aside>

            <div class="space-y-6">
                <?php foreach ($sections as $section) : ?>
                    <section id="<?php echo esc_attr($section['id']); ?>" class="border border-[#E5E7EB] bg-[#F8FAFC] p-7 lg:p-10">
                        <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#2563EB]"><?php echo esc_html($section['eyebrow']); ?></p>
                        <h2 class="font-heading text-3xl font-black uppercase leading-tight text-[#101828] lg:text-4xl"><?php echo esc_html($section['title']); ?></h2>
                        <div class="mt-6 space-y-4 text-base leading-8 text-[#475467]">
                            <?php foreach ($section['body'] as $paragraph) : ?>
                                <p><?php echo esc_html($paragraph); ?></p>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-[#101828] py-12 text-white lg:py-16">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-8 px-4 sm:px-6 lg:grid-cols-[0.74fr_1.26fr] lg:items-start lg:px-8">
            <div class="max-w-xl">
                <p class="mb-2 text-xs font-black uppercase tracking-[0.18em] text-[#67E8F9]"><?php esc_html_e('Need Help?', 'dawp'); ?></p>
                <h2 class="font-heading text-3xl font-black uppercase leading-tight lg:text-[2.1rem]"><?php esc_html_e('Contact support before sending a return.', 'dawp'); ?></h2>
                <p class="mt-3 text-sm leading-7 text-white/72"><?php esc_html_e('Include your order number, checkout email, item name, photos when relevant, and return reason so we can review your request clearly.', 'dawp'); ?></p>
            </div>
            <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                <a href="mailto:support@eliteshopexpress.com" class="group border border-white/10 bg-white/[0.04] p-5 transition hover:bg-white hover:text-[#101828]">
                    <span class="text-xs font-black uppercase tracking-[0.18em] text-[#67E8F9] transition group-hover:text-[#2563EB]"><?php esc_html_e('Email', 'dawp'); ?></span>
                    <span class="mt-3 block break-words font-heading text-lg font-black uppercase leading-tight">support@eliteshopexpress.com</span>
                    <span class="mt-2 block text-sm leading-6 text-white/65 transition group-hover:text-[#475467]"><?php esc_html_e('Monday - Friday, 9:00 AM - 6:00 PM EST.', 'dawp'); ?></span>
                </a>
                <a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="group border border-white/10 bg-white/[0.04] p-5 transition hover:bg-white hover:text-[#101828]">
                    <span class="text-xs font-black uppercase tracking-[0.18em] text-[#67E8F9] transition group-hover:text-[#2563EB]"><?php esc_html_e('Tracking', 'dawp'); ?></span>
                    <span class="mt-3 block font-heading text-lg font-black uppercase leading-tight"><?php esc_html_e('Check Order Status', 'dawp'); ?></span>
                    <span class="mt-2 block text-sm leading-6 text-white/65 transition group-hover:text-[#475467]"><?php esc_html_e('Use your order details to review shipment updates.', 'dawp'); ?></span>
                </a>
            </div>
        </div>
    </section>
</div>
