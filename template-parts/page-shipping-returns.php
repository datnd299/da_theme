<?php
/**
 * Shipping & Returns policy template part for Shop Avec Moi.
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email = 'support@shopavecmoi.com';
$contact_url   = home_url('/contact-us/');
$track_url     = home_url('/track-order/');

$summary_cards = [
    [
        'title' => 'Order Processing',
        'copy'  => 'Orders are prepared within 2-4 business days, Monday to Friday, excluding holidays.',
    ],
    [
        'title' => 'US Delivery',
        'copy'  => 'Standard US shipping typically takes 5-10 business days after dispatch, depending on destination and carrier conditions.',
    ],
    [
        'title' => '30-Day Returns',
        'copy'  => 'Eligible unworn, unwashed, unused items may be returned within 30 days of delivery.',
    ],
];

$return_conditions = [
    'Unworn, unwashed, unused, and free from fragrance, marks, stains, or signs of wear.',
    'In original condition with tags, labels, hygiene liners, and original packaging where applicable.',
    'Returned only after contacting support and receiving return instructions.',
];

$not_eligible = [
    'Items that have been worn, washed, used, altered, damaged after delivery, or returned with odors or marks.',
    'Intimate apparel missing tags, hygiene liners, packaging, or any original protective materials.',
    'Final sale items, gift cards, and items marked non-returnable on the product page or checkout.',
];
?>

<div class="bg-white text-[#24132E] antialiased">
    <section class="bg-[#FBF4FF] px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto max-w-4xl text-center">
            <p class="text-sm font-semibold uppercase text-[#6E3A8A]">Customer Care</p>
            <h1 class="mt-4 font-heading text-5xl leading-[1.05] text-[#3B1748] sm:text-6xl">
                Shipping &amp; Returns
            </h1>
            <p class="mt-6 text-base leading-7 text-[#6D5875] sm:text-lg">
                Clear delivery, return, and refund details for Shop Avec Moi orders. This policy applies to purchases placed on shopavecmoi.com for customers in the United States.
            </p>
            <p class="mt-4 text-sm font-semibold text-[#6E3A8A]">Last updated: May 13, 2026</p>
        </div>
    </section>

    <section class="bg-white px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto max-w-7xl">
            <div class="grid gap-4 md:grid-cols-3">
                <?php foreach ($summary_cards as $card) : ?>
                    <div class="rounded-2xl border border-[#E8DFF0] bg-white p-6 shadow-sm shadow-[#3B1748]/10">
                        <div class="mb-4 flex h-10 w-10 items-center justify-center rounded-full bg-[#FBF4FF] text-[#3B1748]">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M20 6 9 17l-5-5" />
                            </svg>
                        </div>
                        <h2 class="font-heading text-2xl leading-tight text-[#3B1748]"><?php echo esc_html($card['title']); ?></h2>
                        <p class="mt-3 text-sm leading-6 text-[#6D5875]"><?php echo esc_html($card['copy']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="mt-12 grid gap-8 lg:grid-cols-[0.72fr_1.28fr]">
                <aside class="rounded-[2rem] bg-[#21102C] p-6 text-white lg:p-8">
                    <p class="text-sm font-semibold uppercase text-white">Need Help?</p>
                    <h2 class="mt-3 font-heading text-3xl leading-tight text-white">We are here for order questions.</h2>
                    <p class="mt-4 text-sm leading-6 text-white/75">
                        Email us with your order number for shipping, return, exchange, or refund support.
                    </p>
                    <div class="mt-6 grid gap-3 text-sm leading-6 text-white/75">
                        <a class="transition hover:text-white" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
                        <p>Monday to Friday, 9:00 AM to 6:00 PM EST</p>
                    </div>
                    <div class="mt-7 flex flex-col gap-3">
                        <a class="inline-flex min-h-12 items-center justify-center rounded-full bg-white px-7 py-3 text-sm font-semibold text-[#3B1748] transition duration-300 hover:bg-[#FBF4FF]" href="<?php echo esc_url($track_url); ?>">
                            Track Your Order
                        </a>
                        <a class="inline-flex min-h-12 items-center justify-center rounded-full border border-white/15 px-7 py-3 text-sm font-semibold text-white transition duration-300 hover:bg-white/10" href="<?php echo esc_url($contact_url); ?>">
                            Contact Support
                        </a>
                    </div>
                </aside>

                <div class="grid gap-6">
                    <section class="rounded-2xl border border-[#E8DFF0] bg-white p-6 shadow-sm shadow-[#3B1748]/10 lg:p-8">
                        <h2 class="font-heading text-3xl leading-tight text-[#3B1748]">Shipping Policy</h2>
                        <div class="mt-5 grid gap-5 text-sm leading-7 text-[#6D5875]">
                            <p>Orders are processed within 2-4 business days after payment is confirmed. Processing times do not include weekends or holidays.</p>
                            <p>After dispatch, standard US shipping typically takes 5-10 business days. Delivery times are estimates and may be affected by carrier delays, weather, address issues, or peak season volume.</p>
                            <p>Tracking information is sent by email once your order ships. Please allow up to 48 hours for tracking scans to update after the carrier receives the package.</p>
                            <p>Customers are responsible for entering a complete and accurate shipping address at checkout. If you notice an address mistake, contact us as soon as possible before the order ships.</p>
                        </div>
                    </section>

                    <section class="rounded-2xl border border-[#E8DFF0] bg-[#FBF4FF] p-6 lg:p-8">
                        <h2 class="font-heading text-3xl leading-tight text-[#3B1748]">Return &amp; Refund Policy</h2>
                        <p class="mt-5 text-sm leading-7 text-[#6D5875]">
                            You may request a return within 30 days of delivery. Because Shop Avec Moi sells intimate apparel, all returns are reviewed with strict hygiene requirements.
                        </p>

                        <div class="mt-7 grid gap-5 md:grid-cols-2">
                            <div class="rounded-2xl border border-[#E8DFF0] bg-white p-5">
                                <h3 class="text-base font-semibold text-[#3B1748]">Eligible Return Condition</h3>
                                <ul class="mt-4 grid gap-3 text-sm leading-6 text-[#6D5875]">
                                    <?php foreach ($return_conditions as $condition) : ?>
                                        <li class="border-l border-[#E8DFF0] pl-4"><?php echo esc_html($condition); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="rounded-2xl border border-[#E8DFF0] bg-white p-5">
                                <h3 class="text-base font-semibold text-[#3B1748]">Not Eligible For Return</h3>
                                <ul class="mt-4 grid gap-3 text-sm leading-6 text-[#6D5875]">
                                    <?php foreach ($not_eligible as $item) : ?>
                                        <li class="border-l border-[#E8DFF0] pl-4"><?php echo esc_html($item); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                        <div class="mt-7 grid gap-5 text-sm leading-7 text-[#6D5875]">
                            <p>To start a return, email <a class="font-semibold text-[#3B1748] transition hover:text-[#6E3A8A]" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a> with your order number, the item you want to return, and the reason for return. We will send return instructions if the item is eligible.</p>
                            <p>Customers are responsible for return shipping costs unless the item arrived defective, damaged, or incorrect. We recommend using a trackable shipping service because returns must be received before a refund can be completed.</p>
                            <p>Approved refunds are issued to the original payment method after the returned item is received and inspected. Please allow 5-10 business days after approval for your bank or card provider to post the refund. Original shipping charges are non-refundable unless the return is due to our error.</p>
                            <p>Exchanges may be available depending on inventory. If a size, color, or style is unavailable, we may offer a refund for eligible returned items.</p>
                        </div>
                    </section>

                    <section class="rounded-2xl border border-[#E8DFF0] bg-white p-6 shadow-sm shadow-[#3B1748]/10 lg:p-8">
                        <h2 class="font-heading text-3xl leading-tight text-[#3B1748]">Damaged, Incorrect, Or Missing Items</h2>
                        <p class="mt-5 text-sm leading-7 text-[#6D5875]">
                            Please inspect your order when it arrives. If an item is damaged, defective, incorrect, or missing, email us within 7 days of delivery with your order number and clear photos of the package and product issue. We will review the case and provide the next steps.
                        </p>
                    </section>
                </div>
            </div>
        </div>
    </section>
</div>
