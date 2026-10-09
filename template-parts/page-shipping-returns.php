<?php
/**
 * Shipping & Returns page — Eliteshop Express.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email   = 'support@eliteshopexpress.com';
$company_address = '447 Broadway, 2nd Floor, New York, NY 10013, United States';
$business_hours  = __('Monday - Friday, 9:00 AM - 6:00 PM EST', 'dawp');
$contact_url     = home_url('/contact-us/');
$track_url       = home_url('/track-order/');
$faq_url         = home_url('/faq/');
$terms_url       = home_url('/terms-conditions/');
$shop_url        = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$link_class = 'font-bold text-[#FF5A5F] underline decoration-[#FF5A5F]/40 underline-offset-4 hover:text-[#111827]';
$email_link = '<a class="' . $link_class . '" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>';
$track_link = '<a class="' . $link_class . '" href="' . esc_url($track_url) . '">' . esc_html__('Track Order', 'dawp') . '</a>';

$highlights = [
    [
        'title' => __('2-4 Business Days', 'dawp'),
        'copy'  => __('Processing time while your item is printed to order.', 'dawp'),
        'icon'  => '<path d="M8 2v4"></path><path d="M16 2v4"></path><rect width="18" height="18" x="3" y="4" rx="2"></rect><path d="M3 10h18"></path>',
    ],
    [
        'title' => __('5-7 Business Days', 'dawp'),
        'copy'  => __('Standard US delivery after your order is dispatched.', 'dawp'),
        'icon'  => '<path d="M10 17h4V5H3v12h2"></path><path d="M14 8h4l3 3v6h-3"></path><circle cx="7" cy="17" r="2"></circle><circle cx="16" cy="17" r="2"></circle>',
    ],
    [
        'title' => __('Free Over $50', 'dawp'),
        'copy'  => __('Free standard US shipping on orders over $50.', 'dawp'),
        'icon'  => '<path d="M20 12v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-6"></path><path d="M2 7h20v5H2z"></path><path d="M12 22V7"></path><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7Z"></path><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7Z"></path>',
    ],
    [
        'title' => __('30-Day Protection', 'dawp'),
        'copy'  => __('Report damage, defects, or misprints within 30 days of delivery.', 'dawp'),
        'icon'  => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"></path><path d="m9 12 2 2 4-4"></path>',
    ],
];

$shipping_sections = [
    [
        'id'    => 'processing',
        'title' => __('1. Order Processing', 'dawp'),
        'body'  => [
            __('Every Eliteshop Express product is print-on-demand. Nothing is pre-made, so your order goes into production only after you place it and your payment is confirmed.', 'dawp'),
            __('Processing takes 2-4 business days. Business days are Monday through Friday, excluding US federal holidays. Orders placed on a weekend or holiday begin processing on the next business day.', 'dawp'),
            __('During peak seasons (such as Black Friday through the end-of-year holidays) processing can take longer. Any expected delay is announced on our website before you check out.', 'dawp'),
        ],
    ],
    [
        'id'    => 'rates',
        'title' => __('2. Shipping Methods, Rates & Delivery Times', 'dawp'),
        'body'  => [
            __('We offer one shipping method: Standard US Shipping.', 'dawp'),
        ],
        'list'  => [
            __('Delivery time: 5-7 business days after dispatch.', 'dawp'),
            __('Total time from order to delivery: typically 7-11 business days (2-4 days processing + 5-7 days transit).', 'dawp'),
            __('Orders over $50: free standard shipping, applied automatically at checkout. The $50 threshold is based on your order subtotal after discounts, before taxes.', 'dawp'),
            __('Orders of $50 or less: a flat shipping rate is calculated and shown at checkout before you pay. You will never be charged a shipping fee that was not displayed at checkout.', 'dawp'),
        ],
        'body_after' => [
            __('Delivery times are estimates provided by our shipping carriers and begin once your order leaves production. They are not guaranteed, and carrier delays caused by weather or high volume are outside our control.', 'dawp'),
        ],
    ],
    [
        'id'    => 'destinations',
        'title' => __('3. Where We Ship', 'dawp'),
        'body'  => [
            __('We currently ship to addresses within the United States only. We do not offer international shipping at this time. Prices are listed and charged in US dollars (USD).', 'dawp'),
        ],
    ],
    [
        'id'    => 'tracking',
        'title' => __('4. Order Confirmation & Tracking', 'dawp'),
        'body'  => [
            __('You will receive an order confirmation email as soon as your order is placed. When your order ships, we send a second email with your tracking number and a link to follow your package.', 'dawp'),
            sprintf(
                /* translators: %s: track order page link */
                __('Tracking can take 24-48 hours to show movement after the label is created. You can check your order status at any time on our %s page using your order number and the email used at checkout.', 'dawp'),
                $track_link
            ),
            __('If your order contains several items, they may be printed and shipped in separate packages at no extra cost to you. Each package gets its own tracking number.', 'dawp'),
        ],
        'raw' => true,
    ],
    [
        'id'    => 'address',
        'title' => __('5. Shipping Address Accuracy', 'dawp'),
        'body'  => [
            __('Please double-check your shipping address at checkout. If you notice a mistake, contact us right away. We can update the address as long as your order has not shipped yet.', 'dawp'),
            __('If a package is returned to us because the address was incorrect or incomplete, or because it went unclaimed, we will contact you to arrange reshipment. A new shipping fee applies in that case.', 'dawp'),
        ],
    ],
    [
        'id'    => 'lost-packages',
        'title' => __('6. Delayed, Lost, or Stolen Packages', 'dawp'),
        'list'  => [
            __('If your package has not arrived within 15 business days of dispatch, contact us and we will open an investigation with the carrier.', 'dawp'),
            __('If tracking shows "delivered" but you cannot find your package, check around your property and with neighbors, and wait 48 hours, since packages are sometimes marked delivered early. Then contact us within 30 days of the delivery date.', 'dawp'),
            __('If the carrier confirms a package is lost in transit, we will send a free replacement or issue a full refund, whichever you prefer.', 'dawp'),
        ],
    ],
];

$return_sections = [
    [
        'id'    => 'cancellations',
        'title' => __('7. Order Changes & Cancellations', 'dawp'),
        'body'  => [
            __('Need to change your size, color, or personalization text, or cancel your order? Email us with your order number as soon as possible.', 'dawp'),
        ],
        'list'  => [
            __('Before production starts: we will make the change or cancel your order with a full refund, free of charge.', 'dawp'),
            __('After production starts: your item is already being printed, so we cannot change or cancel the order.', 'dawp'),
        ],
    ],
    [
        'id'    => 'personalized-items',
        'title' => __('8. Personalized Items', 'dawp'),
        'body'  => [
            __('An item is "personalized" when you add your own name, text, initials, date, or photo to it. Because personalized items are made only for you and cannot be resold, they are final sale and cannot be returned or exchanged for:', 'dawp'),
        ],
        'list'  => [
            __('A change of mind, or no longer wanting the item.', 'dawp'),
            __('Choosing the wrong size, style, or color.', 'dawp'),
            __('Spelling, spacing, or other personalization errors you entered. Items are printed exactly as shown in the preview you approved.', 'dawp'),
        ],
        'body_after' => [
            __('This does not affect your right to a free replacement or full refund if a personalized item arrives damaged, defective, misprinted, or is not the item you ordered (see section 10).', 'dawp'),
        ],
    ],
    [
        'id'    => 'standard-items',
        'title' => __('9. Returns on Non-Personalized Items', 'dawp'),
        'body'  => [
            __('Items ordered without any personalization can be returned within 30 days of delivery, as long as they are:', 'dawp'),
        ],
        'list'  => [
            __('Unworn, unwashed, and unaltered.', 'dawp'),
            __('Free of stains, odors, pet hair, and damage.', 'dawp'),
            __('Returned with all original tags and packaging, if any.', 'dawp'),
        ],
        'body_after' => [
            __('Customers pay for return shipping on these returns, and original shipping charges are non-refundable. We do not charge restocking fees. We do not offer direct exchanges. If you need a different size or color, return the original item for a refund and place a new order.', 'dawp'),
        ],
    ],
    [
        'id'    => 'damaged-items',
        'title' => __('10. Damaged, Defective, or Incorrect Items', 'dawp'),
        'body'  => [
            __('If your item arrives damaged, defective, or misprinted, or you received the wrong item, we will fix it at no cost to you. This applies to personalized and non-personalized items. Covered issues include:', 'dawp'),
        ],
        'list'  => [
            __('Printing errors we made, such as a misspelling that does not match your approved preview, the wrong design, or a missing print.', 'dawp'),
            __('Print defects such as peeling, cracking, or smudging on arrival.', 'dawp'),
            __('Garment defects such as holes, torn seams, or stains.', 'dawp'),
            __('The wrong product, size, or color compared with your order confirmation.', 'dawp'),
            __('Items damaged during shipping.', 'dawp'),
        ],
        'body_after' => [
            __('Report the issue within 30 days of delivery and include a photo. Once confirmed, we will send a free replacement or a full refund, including shipping, whichever you prefer. In most cases you do not need to send the item back.', 'dawp'),
            __('Not covered: minor color differences between your screen and the printed garment, slight variations in print placement that are normal for print-on-demand production, and wear caused by not following the care instructions (machine wash cold, inside out; tumble dry low or hang dry).', 'dawp'),
        ],
    ],
];
?>

<div class="bg-white text-[#111827]">
    <section class="bg-[#F9FAFB] py-14 sm:py-20" aria-labelledby="ship-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#FF5A5F]"><?php esc_html_e('Shipping & Returns', 'dawp'); ?></p>
            <h1 id="ship-title" class="mt-4 max-w-3xl font-heading text-4xl font-extrabold leading-tight text-[#111827] sm:text-5xl">
                <?php esc_html_e('Printed to order, delivered to your door.', 'dawp'); ?>
            </h1>
            <p class="mt-4 text-sm font-semibold text-[#6B7280]"><?php esc_html_e('Last updated: October 9, 2026', 'dawp'); ?></p>
            <p class="mt-5 max-w-2xl text-base leading-8 text-[#4B5563]">
                <?php esc_html_e('Every item is printed just for you, so here is exactly what to expect from checkout to delivery, and what we do if something goes wrong.', 'dawp'); ?>
            </p>

            <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <?php foreach ($highlights as $item) : ?>
                    <div class="rounded-[var(--radius-lg)] border border-[#E5E7EB] bg-white p-6 shadow-[var(--shadow-card)]">
                        <span class="inline-flex h-11 w-11 items-center justify-center rounded-[var(--radius-md)] bg-[#FFF1F0] text-[#FF5A5F]" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><?php echo $item['icon']; ?></svg>
                        </span>
                        <p class="font-heading mt-4 text-lg font-bold text-[#111827]"><?php echo esc_html($item['title']); ?></p>
                        <p class="mt-1 text-sm leading-relaxed text-[#4B5563]"><?php echo esc_html($item['copy']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-white py-14 sm:py-20">
        <div class="mx-auto grid max-w-5xl gap-12 px-4 sm:px-6 lg:px-8">
            <nav class="rounded-[var(--radius-lg)] border border-[#E5E7EB] bg-[#F9FAFB] p-6" aria-label="<?php esc_attr_e('On this page', 'dawp'); ?>">
                <p class="text-xs font-extrabold uppercase tracking-[0.14em] text-[#6B7280]"><?php esc_html_e('On this page', 'dawp'); ?></p>
                <ul class="mt-4 grid gap-2 text-sm sm:grid-cols-2">
                    <?php foreach (array_merge($shipping_sections, $return_sections) as $section) : ?>
                        <li><a class="font-semibold text-[#111827] hover:text-[#FF5A5F]" href="#<?php echo esc_attr($section['id']); ?>"><?php echo esc_html($section['title']); ?></a></li>
                    <?php endforeach; ?>
                    <li><a class="font-semibold text-[#111827] hover:text-[#FF5A5F]" href="#refunds"><?php esc_html_e('11. Refunds', 'dawp'); ?></a></li>
                    <li><a class="font-semibold text-[#111827] hover:text-[#FF5A5F]" href="#request"><?php esc_html_e('12. How to Request a Return, Replacement, or Refund', 'dawp'); ?></a></li>
                </ul>
            </nav>

            <?php
            $groups = [
                ['id' => 'shipping', 'label' => __('Shipping Policy', 'dawp'), 'sections' => $shipping_sections],
                ['id' => 'returns', 'label' => __('Return & Refund Policy', 'dawp'), 'sections' => $return_sections],
            ];
            foreach ($groups as $group) :
                ?>
                <div id="<?php echo esc_attr($group['id']); ?>" class="scroll-mt-24 grid gap-10">
                    <h2 class="border-b border-[#E5E7EB] pb-4 font-heading text-3xl font-extrabold text-[#111827]"><?php echo esc_html($group['label']); ?></h2>

                    <?php foreach ($group['sections'] as $section) : ?>
                        <div id="<?php echo esc_attr($section['id']); ?>" class="scroll-mt-24">
                            <h3 class="font-heading text-2xl font-bold text-[#111827]"><?php echo esc_html($section['title']); ?></h3>
                            <div class="mt-4 grid gap-4 text-base leading-8 text-[#4B5563]">
                                <?php foreach ($section['body'] ?? [] as $paragraph) : ?>
                                    <p><?php echo !empty($section['raw']) ? wp_kses($paragraph, ['a' => ['class' => [], 'href' => []]]) : esc_html($paragraph); ?></p>
                                <?php endforeach; ?>

                                <?php if (!empty($section['list'])) : ?>
                                    <ul class="grid gap-2 pl-1">
                                        <?php foreach ($section['list'] as $item) : ?>
                                            <li class="flex gap-3">
                                                <span class="mt-2.5 h-1.5 w-1.5 shrink-0 rounded-full bg-[#FF5A5F]"></span>
                                                <span><?php echo esc_html($item); ?></span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>

                                <?php foreach ($section['body_after'] ?? [] as $paragraph) : ?>
                                    <p><?php echo esc_html($paragraph); ?></p>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>

            <div id="refunds" class="scroll-mt-24">
                <h3 class="font-heading text-2xl font-bold text-[#111827]"><?php esc_html_e('11. Refunds', 'dawp'); ?></h3>
                <div class="mt-4 grid gap-4 text-base leading-8 text-[#4B5563]">
                    <p><?php esc_html_e('Approved refunds are issued to your original payment method within 3-5 business days. We approve a refund once we confirm a damage or defect claim, or once we receive and inspect a returned non-personalized item. You will get an email when your refund has been issued.', 'dawp'); ?></p>
                    <p><?php esc_html_e('Depending on your bank or card issuer, it can take another 5-10 business days for the refund to show on your statement. Refunds cannot be sent to a different card, account, or person.', 'dawp'); ?></p>
                </div>
            </div>

            <div id="request" class="scroll-mt-24 rounded-[var(--radius-lg)] border border-[#E5E7EB] bg-[#F9FAFB] p-6 sm:p-8">
                <h3 class="font-heading text-2xl font-bold text-[#111827]"><?php esc_html_e('12. How to Request a Return, Replacement, or Refund', 'dawp'); ?></h3>
                <ol class="mt-5 grid gap-3 text-base leading-7 text-[#4B5563]">
                    <li><span class="font-bold text-[#111827]">1.</span> <?php echo wp_kses(sprintf(/* translators: %s: support email link */ __('Email %s with your order number and the email used at checkout.', 'dawp'), $email_link), ['a' => ['class' => [], 'href' => []]]); ?></li>
                    <li><span class="font-bold text-[#111827]">2.</span> <?php esc_html_e('Tell us what happened. For damaged, defective, misprinted, or incorrect items, attach a clear photo of the issue and the label inside the garment.', 'dawp'); ?></li>
                    <li><span class="font-bold text-[#111827]">3.</span> <?php esc_html_e('We reply within 1 business day. For non-personalized returns we email you the return address and instructions. Please do not send items back without contacting us first, because returns sent without approval cannot be processed.', 'dawp'); ?></li>
                    <li><span class="font-bold text-[#111827]">4.</span> <?php esc_html_e('Once your claim is approved, or your return is received and inspected, we ship your replacement or issue your refund.', 'dawp'); ?></li>
                </ol>
                <p class="mt-6 text-sm leading-7 text-[#4B5563]">
                    <strong class="text-[#111827]">Eliteshop Express</strong> &middot; <?php echo esc_html($company_address); ?><br>
                    <?php
                    printf(
                        /* translators: %s: business hours */
                        esc_html__('Support hours: %s.', 'dawp'),
                        esc_html($business_hours)
                    );
                    ?>
                </p>
                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-[var(--radius-pill)] bg-[#FF5A5F] px-6 text-sm font-bold text-white transition hover:bg-[#E14247]"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
                    <a href="<?php echo esc_url($track_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-[var(--radius-pill)] border-2 border-[#111827] px-6 text-sm font-bold text-[#111827] transition hover:bg-[#111827] hover:text-white"><?php esc_html_e('Track Order', 'dawp'); ?></a>
                    <a href="<?php echo esc_url($faq_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-[var(--radius-pill)] border-2 border-[#111827] px-6 text-sm font-bold text-[#111827] transition hover:bg-[#111827] hover:text-white"><?php esc_html_e('Read FAQ', 'dawp'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#F9FAFB] py-14 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-[var(--radius-lg)] border border-[#E5E7EB] bg-white p-6 sm:p-8">
                <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#FF5A5F]"><?php esc_html_e('Shop With Confidence', 'dawp'); ?></p>
                        <h2 class="mt-3 font-heading text-2xl font-extrabold text-[#111827]"><?php esc_html_e('Personalized apparel, backed by real support.', 'dawp'); ?></h2>
                        <p class="mt-2 text-sm leading-7 text-[#4B5563]">
                            <?php esc_html_e('These policies are part of our', 'dawp'); ?>
                            <a class="<?php echo esc_attr($link_class); ?>" href="<?php echo esc_url($terms_url); ?>"><?php esc_html_e('Terms & Conditions', 'dawp'); ?></a>.
                        </p>
                    </div>
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-[var(--radius-pill)] bg-[#111827] px-6 text-sm font-bold text-white transition hover:bg-[#FF5A5F]">
                        <?php esc_html_e('Shop Products', 'dawp'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
