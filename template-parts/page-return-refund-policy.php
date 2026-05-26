<?php
/**
 * Refund & Return Policy page for LBQ Shop.
 * Structure based on a customer-friendly 30-day return policy format.
 * Sections: Hero, 30-Day Easy Returns, Overview, Return Costs,
 * Common Scenarios, How To Return, Refund Process, Exchanges,
 * Non-Returnable Items, Questions, Contact Information.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$store_name     = 'LBQ Shop';
$website_domain = 'lbqshop.com';
$support_email  = 'support@lbqshop.com';
$support_url    = home_url('/contact-us/');
$faq_url        = home_url('/faq/');
$last_updated   = 'January 2, 2024';
$business_hours = __('Monday - Friday, 9:00 AM - 5:00 PM, GMT-08:00 Pacific Standard Time (Los Angeles)', 'dawp');
$response_time  = __('We aim to reply within 1 business day.', 'dawp');

$hero_badges = [
    __('30-Day Easy Returns', 'dawp'),
    __('$0 Restocking Fee', 'dawp'),
    __('Customer-Friendly Support', 'dawp'),
];

$overview_cards = [
    [
        'title' => __('Return Window', 'dawp'),
        'copy'  => __('30 days from the day you receive your order, unless the product page states a different return window.', 'dawp'),
    ],
    [
        'title' => __('Condition', 'dawp'),
        'copy'  => __('Items must be unused, uninstalled if applicable, in original condition, and returned with original packaging, tags or labels, accessories, manuals, and parts.', 'dawp'),
    ],
    [
        'title' => __('Easy Returns', 'dawp'),
        'copy'  => __('Our support team will assist you through the process from return approval to refund confirmation.', 'dawp'),
    ],
    [
        'title' => __('Restocking Fee', 'dawp'),
        'copy'  => __('$0 — we do not charge any restocking fees for eligible returns.', 'dawp'),
    ],
];

$return_scenarios = [
    [
        'title' => __('Order Cancellations After Ordering', 'dawp'),
        'copy'  => __('You may request an order cancellation within 9 hours after placing the order, as long as the order has not been processed or shipped. Once an order has been shipped, it can no longer be canceled; you may request a return after delivery in accordance with this policy.', 'dawp'),
    ],
    [
        'title' => __('Damaged On Arrival', 'dawp'),
        'copy'  => __('If your order arrives damaged, please contact us within 30 days of delivery and include photos of the item and the packaging, including the shipping label. We will help with a replacement or refund at no cost to you.', 'dawp'),
    ],
    [
        'title' => __('Wrong Product / Missing Items', 'dawp'),
        'copy'  => __('If you received the wrong product or your order is missing items, parts, or accessories, please contact us within 30 days of delivery. We may request photos for verification.', 'dawp'),
    ],
    [
        'title' => __('Never Arrived / Lost Packages', 'dawp'),
        'copy'  => __('If your package shows no tracking updates for an extended period or is marked delivered but you did not receive it, please contact us within 30 days of the delivery date or tracking status. We will investigate with the carrier and, if confirmed lost or misdelivered, arrange a replacement or refund as appropriate.', 'dawp'),
    ],
];

$return_steps = [
    [
        'step'  => '01',
        'title' => __('Contact Us', 'dawp'),
        'copy'  => __('Contact our support team with your order number and reason for return.', 'dawp'),
    ],
    [
        'step'  => '02',
        'title' => __('Pack Your Item', 'dawp'),
        'copy'  => __('Repack the item securely in its original packaging, including all accessories, tags, labels, manuals, and documents.', 'dawp'),
    ],
    [
        'step'  => '03',
        'title' => __('Send It Back', 'dawp'),
        'copy'  => __('Ship your return using the instructions provided in your return authorization email.', 'dawp'),
    ],
];

$non_returnable_items = [
    __('Items marked Final Sale or Non-Returnable.', 'dawp'),
    __('Gift cards or digital products/downloads.', 'dawp'),
    __('Personal care, hygiene, and intimate items.', 'dawp'),
    __('Perishable goods, including food, beverages, or supplements if applicable.', 'dawp'),
    __('Items that have been used, installed, assembled, modified, or damaged after delivery.', 'dawp'),
    __('Items missing original packaging, serial number labels, accessories, manuals, or included parts.', 'dawp'),
    __('Certain hazardous materials or restricted items that cannot be shipped back safely.', 'dawp'),
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
        'check'   => '<path d="m20 6-11 11-5-5"/>',
        'refresh' => '<path d="M20 12a8 8 0 0 1-13.66 5.66L4 15"/><path d="M4 20v-5h5"/><path d="M4 12A8 8 0 0 1 17.66 6.34L20 9"/><path d="M20 4v5h-5"/>',
        'box'     => '<path d="M21 16V8a2 2 0 0 0-1-1.73L13 2.27a2 2 0 0 0-2 0L4 6.27A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><path d="M3.27 6.96 12 12.01l8.73-5.05"/><path d="M12 22.08V12"/>',
        'card'    => '<rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/>',
        'message' => '<path d="M21 15a4 4 0 0 1-4 4H7l-4 4V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4z"/>',
        'mail'    => '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-10 6L2 7"/>',
        'alert'   => '<circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>',
        'swap'    => '<polyline points="17 1 21 5 17 9"/><path d="M3 11V9a4 4 0 0 1 4-4h14"/><polyline points="7 23 3 19 7 15"/><path d="M21 13v2a4 4 0 0 1-4 4H3"/>',
    ];

    return $icons[$icon] ?? $icons['check'];
};
?>

<div class="bg-white text-[#2F2925]">
    <!-- ===== HERO ===== -->
    <section class="bg-[#FFF7F0] py-14 sm:py-20" aria-labelledby="return-policy-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:items-end">
                <div>
                    <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#B97878]"><?php esc_html_e('Refund & Return Policy', 'dawp'); ?></p>
                    <h1 id="return-policy-title" class="mt-4 font-heading text-4xl font-extrabold leading-tight text-[#2F2925] sm:text-5xl">
                        <?php esc_html_e('Shop with confidence at LBQ Shop.', 'dawp'); ?>
                    </h1>
                    <p class="mt-5 max-w-2xl text-base leading-8 text-[#8B7473]">
                        <?php esc_html_e('If you are not satisfied with your purchase for any reason, we offer a clear and customer-friendly return process for most eligible items sold on our website.', 'dawp'); ?>
                    </p>
                    <div class="mt-8 flex flex-wrap gap-3">
                        <a href="<?php echo esc_url($support_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#B97878] px-6 text-sm font-bold text-white transition hover:bg-[#2F2925]">
                            <?php esc_html_e('Start A Return Request', 'dawp'); ?>
                        </a>
                        <a href="<?php echo esc_url($faq_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#B97878] bg-white px-6 text-sm font-bold text-[#B97878] transition hover:bg-[#F7F1EE]">
                            <?php esc_html_e('Read FAQs', 'dawp'); ?>
                        </a>
                    </div>
                </div>

                <div class="grid gap-4 sm:grid-cols-3">
                    <?php foreach ($hero_badges as $badge) : ?>
                        <article class="rounded-2xl border border-[#E7D8C8] bg-white p-5 shadow-sm">
                            <div class="flex h-11 w-11 items-center justify-center rounded-full bg-[#F7F1EE] text-[#B97878]">
                                <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <?php echo $render_icon('check'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </svg>
                            </div>
                            <p class="mt-4 text-xs font-extrabold uppercase tracking-[0.12em] text-[#B97878]"><?php echo esc_html($badge); ?></p>
                            <p class="mt-3 text-sm leading-6 text-[#8B7473]"><?php esc_html_e('Our support team will help guide you through the return process when your item is eligible.', 'dawp'); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== 30-DAY EASY RETURNS ===== -->
    <section class="bg-white py-14 sm:py-20" aria-labelledby="easy-returns-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.82fr_1.18fr] lg:px-8">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#B97878]"><?php esc_html_e('30-Day Easy Returns', 'dawp'); ?></p>
                <h2 id="easy-returns-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#2F2925] sm:text-4xl">
                    <?php esc_html_e('You have 30 days from delivery to request a return.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-[#8B7473]">
                    <?php esc_html_e('To be eligible, items must be unused, uninstalled if applicable, in original condition, and returned with all original packaging, tags or labels, manuals, accessories, and included parts. Items should be packed securely to prevent damage during return shipping.', 'dawp'); ?>
                </p>
                <p class="mt-4 rounded-2xl border border-[#E7D8C8] bg-[#FFF7F0] p-5 text-sm font-bold leading-7 text-[#2F2925]">
                    <?php esc_html_e('Restocking Fee: $0 — we do not charge restocking fees for eligible returns.', 'dawp'); ?>
                </p>
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                <?php foreach ($overview_cards as $card) : ?>
                    <article class="rounded-2xl border border-[#E7D8C8] bg-[#FFF7F0] p-5">
                        <h3 class="font-heading text-lg font-extrabold text-[#2F2925]"><?php echo esc_html($card['title']); ?></h3>
                        <p class="mt-3 text-sm leading-7 text-[#8B7473]"><?php echo esc_html($card['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ===== RETURN COSTS ===== -->
    <section class="bg-[#F7F1EE] py-14 sm:py-20" aria-labelledby="return-costs-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-10 max-w-3xl">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#B97878]"><?php esc_html_e('Return Costs', 'dawp'); ?></p>
                <h2 id="return-costs-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#2F2925] sm:text-4xl">
                    <?php esc_html_e('Return shipping depends on the reason for the return.', 'dawp'); ?>
                </h2>
            </div>

            <div class="grid gap-6 lg:grid-cols-2">
                <article class="rounded-2xl border border-[#E7D8C8] bg-white p-6 shadow-sm">
                    <div class="flex h-11 w-11 items-center justify-center rounded-full bg-[#FFF7F0] text-[#B97878]">
                        <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <?php echo $render_icon('check'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                        </svg>
                    </div>
                    <p class="mt-5 text-xs font-extrabold uppercase tracking-[0.12em] text-[#B97878]"><?php esc_html_e('No Cost To The Customer', 'dawp'); ?></p>
                    <h3 class="mt-2 font-heading text-xl font-extrabold text-[#2F2925]"><?php esc_html_e('Defective, Damaged, Or Incorrect Products', 'dawp'); ?></h3>
                    <p class="mt-3 text-sm leading-7 text-[#8B7473]"><?php esc_html_e('We cover return shipping or provide a prepaid return label if you received the wrong item, the item arrived damaged due to the carrier, or the item is defective, missing essential parts, or not functioning as intended.', 'dawp'); ?></p>
                    <p class="mt-3 text-sm leading-7 text-[#8B7473]"><?php esc_html_e('We may request photos or videos of the item and packaging to help resolve the issue quickly.', 'dawp'); ?></p>
                </article>

                <article class="rounded-2xl border border-[#E7D8C8] bg-white p-6 shadow-sm">
                    <div class="flex h-11 w-11 items-center justify-center rounded-full bg-[#FFF7F0] text-[#B97878]">
                        <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <?php echo $render_icon('card'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                        </svg>
                    </div>
                    <p class="mt-5 text-xs font-extrabold uppercase tracking-[0.12em] text-[#B97878]"><?php esc_html_e('Customer Pays Actual Return Shipping', 'dawp'); ?></p>
                    <h3 class="mt-2 font-heading text-xl font-extrabold text-[#2F2925]"><?php esc_html_e('Customer Remorse / Change Of Mind', 'dawp'); ?></h3>
                    <p class="mt-3 text-sm leading-7 text-[#8B7473]"><?php esc_html_e('The customer pays the actual return shipping cost when the wrong item, size, color, model, or compatibility was selected, the item does not fit or match personal preference, the customer no longer wants the item, or the order was placed by mistake.', 'dawp'); ?></p>
                    <p class="mt-3 text-sm font-bold leading-7 text-[#2F2925]"><?php esc_html_e('Original shipping costs are non-refundable.', 'dawp'); ?></p>
                </article>
            </div>
        </div>
    </section>

    <!-- ===== COMMON RETURN SCENARIOS ===== -->
    <section class="bg-white py-14 sm:py-20" aria-labelledby="return-scenarios-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.82fr_1.18fr] lg:px-8">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#B97878]"><?php esc_html_e('Common Return Scenarios', 'dawp'); ?></p>
                <h2 id="return-scenarios-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#2F2925] sm:text-4xl">
                    <?php esc_html_e('What to do if something goes wrong.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-[#8B7473]">
                    <?php esc_html_e('If your order is damaged, incorrect, missing items, or never arrives, contact us as soon as possible with your order number and supporting details.', 'dawp'); ?>
                </p>
            </div>

            <div class="grid gap-4">
                <?php foreach ($return_scenarios as $scenario) : ?>
                    <article class="rounded-2xl border border-[#E7D8C8] bg-[#FFF7F0] p-5">
                        <h3 class="font-heading text-lg font-extrabold text-[#2F2925]"><?php echo esc_html($scenario['title']); ?></h3>
                        <p class="mt-3 text-sm leading-7 text-[#8B7473]"><?php echo esc_html($scenario['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ===== HOW TO RETURN ===== -->
    <section class="bg-[#F7F1EE] py-14 sm:py-20" aria-labelledby="how-to-return-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-10 max-w-3xl">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#B97878]"><?php esc_html_e('How To Return An Item', 'dawp'); ?></p>
                <h2 id="how-to-return-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#2F2925] sm:text-4xl">
                    <?php esc_html_e('Return authorization is required before sending items back.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-[#8B7473]">
                    <?php esc_html_e('Please do not send items back without first receiving return approval or authorization. Return instructions and the return shipping address will be provided after we review your request.', 'dawp'); ?>
                </p>
            </div>

            <div class="grid gap-4 md:grid-cols-3">
                <?php foreach ($return_steps as $step) : ?>
                    <article class="rounded-2xl border border-[#E7D8C8] bg-white p-6 shadow-sm">
                        <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-[#E8B8AD] text-sm font-extrabold text-[#2F2925]"><?php echo esc_html($step['step']); ?></span>
                        <h3 class="mt-5 font-heading text-lg font-extrabold text-[#2F2925]"><?php echo esc_html($step['title']); ?></h3>
                        <p class="mt-3 text-sm leading-7 text-[#8B7473]"><?php echo esc_html($step['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="mt-8 rounded-2xl border border-[#E7D8C8] bg-white p-6 shadow-sm">
                <h3 class="font-heading text-xl font-extrabold text-[#2F2925]"><?php esc_html_e('What to include in your request', 'dawp'); ?></h3>
                <p class="mt-3 text-sm leading-7 text-[#8B7473]">
                    <?php esc_html_e('Please include your order number, the email used at checkout, the item(s) you want to return, the reason for return, and photos or video if the item is damaged, defective, incorrect, or the package arrived damaged.', 'dawp'); ?>
                </p>
                <p class="mt-3 text-sm leading-7 text-[#8B7473]">
                    <?php esc_html_e('Please include all parts, accessories, manuals, and original packaging when returning an item.', 'dawp'); ?>
                </p>
            </div>
        </div>
    </section>

    <!-- ===== REFUND PROCESS & EXCHANGES ===== -->
    <section class="bg-white py-14 sm:py-20" aria-labelledby="refund-process-title">
        <div class="mx-auto grid max-w-7xl gap-6 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
            <article class="rounded-2xl border border-[#E7D8C8] bg-[#FFF7F0] p-6 sm:p-8">
                <div class="flex h-11 w-11 items-center justify-center rounded-full bg-white text-[#B97878]">
                    <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <?php echo $render_icon('refresh'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    </svg>
                </div>
                <p class="mt-5 text-sm font-extrabold uppercase tracking-[0.14em] text-[#B97878]"><?php esc_html_e('Refund Process', 'dawp'); ?></p>
                <h2 id="refund-process-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#2F2925]">
                    <?php esc_html_e('Refunds are processed after inspection and approval.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-sm leading-7 text-[#8B7473]">
                    <?php esc_html_e('Once we receive your return, we will inspect the item to ensure it meets our return criteria. After approval, your refund will be processed to the original payment method. It typically takes up to 7 days for the refund to appear, depending on your bank or payment provider.', 'dawp'); ?>
                </p>
                <p class="mt-4 text-sm leading-7 text-[#8B7473]">
                    <?php esc_html_e('If your return is approved but the item is missing parts, shows signs of use, or is returned in non-original condition, we may be unable to issue a refund and may offer to send the item back to you.', 'dawp'); ?>
                </p>
                <p class="mt-4 text-sm leading-7 text-[#8B7473]">
                    <?php esc_html_e('Approved refunds are issued to the original payment method whenever possible. If the original payment method is unavailable, we may offer an alternative method, such as store credit, only with your consent.', 'dawp'); ?>
                </p>
            </article>

            <article class="rounded-2xl border border-[#E7D8C8] bg-white p-6 sm:p-8 shadow-sm">
                <div class="flex h-11 w-11 items-center justify-center rounded-full bg-[#FFF7F0] text-[#B97878]">
                    <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <?php echo $render_icon('swap'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    </svg>
                </div>
                <p class="mt-5 text-sm font-extrabold uppercase tracking-[0.14em] text-[#B97878]"><?php esc_html_e('Exchanges', 'dawp'); ?></p>
                <h2 class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#2F2925]">
                    <?php esc_html_e('Exchanges are subject to stock availability.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-sm leading-7 text-[#8B7473]">
                    <?php esc_html_e('If you would like to exchange an item for a different size, color, or model, please contact our customer support team. Exchanges are subject to stock availability.', 'dawp'); ?>
                </p>
                <p class="mt-4 text-sm leading-7 text-[#8B7473]">
                    <?php esc_html_e('In some cases, the fastest option is to return the original item for a refund and place a new order.', 'dawp'); ?>
                </p>
            </article>
        </div>
    </section>

    <!-- ===== NON-RETURNABLE ITEMS ===== -->
    <section class="bg-[#F7F1EE] py-14 sm:py-20" aria-labelledby="non-returnable-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.82fr_1.18fr] lg:px-8">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#B97878]"><?php esc_html_e('Non-Returnable Items', 'dawp'); ?></p>
                <h2 id="non-returnable-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#2F2925] sm:text-4xl">
                    <?php esc_html_e('Some items may not be eligible for return.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-[#8B7473]">
                    <?php esc_html_e('For hygiene, safety, and product integrity reasons, some items are not eligible for return. These items will be clearly marked as non-returnable on their product pages.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-2xl border border-[#E7D8C8] bg-white p-6 shadow-sm">
                <ul class="grid gap-3 sm:grid-cols-2">
                    <?php foreach ($non_returnable_items as $item) : ?>
                        <li class="flex gap-3 rounded-xl border border-[#E7D8C8] bg-[#FFF7F0] p-4 text-sm leading-6 text-[#8B7473]">
                            <svg class="mt-1 h-4 w-4 shrink-0 text-[#B97878]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <?php echo $render_icon('check'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </svg>
                            <span><?php echo esc_html($item); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>

    <!-- ===== QUESTIONS & CONTACT ===== -->
    <section class="bg-[#2F2925] py-14 sm:py-20" aria-labelledby="return-help-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-3xl border border-white/10 bg-white/5 p-6 sm:p-8">
                <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#E8B8AD]"><?php esc_html_e('Questions?', 'dawp'); ?></p>
                        <h2 id="return-help-title" class="mt-3 font-heading text-2xl font-extrabold text-white sm:text-3xl"><?php esc_html_e('Need help with a return or refund?', 'dawp'); ?></h2>
                        <p class="mt-3 text-sm leading-7 text-white/70">
                            <?php
                            echo wp_kses(
                                sprintf(
                                    /* translators: 1: support email, 2: business hours, 3: response time */
                                    __('Email %1$s with your order number and return details. Business hours: %2$s. %3$s', 'dawp'),
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
                        <div class="mt-6 grid gap-3 sm:grid-cols-2 lg:max-w-3xl">
                            <?php foreach ($contact_items as $item) : ?>
                                <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                                    <p class="text-xs font-extrabold uppercase tracking-[0.12em] text-[#E8B8AD]"><?php echo esc_html($item['label']); ?></p>
                                    <p class="mt-2 text-sm font-bold leading-6 text-white/90"><?php echo esc_html($item['value']); ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="flex flex-col gap-3 sm:flex-row lg:flex-col">
                        <a href="<?php echo esc_url($support_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#E8B8AD] px-6 text-sm font-bold text-[#2F2925] transition hover:bg-white">
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