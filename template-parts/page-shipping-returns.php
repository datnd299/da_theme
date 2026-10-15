<?php
/**
 * Shipping Policy + Return & Refund Policy — ProudlyWear.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$email_link   = '<a href="mailto:support@proudlywear.com">support@proudlywear.com</a>';
$track_link   = '<a href="' . esc_url(home_url('/track-order/')) . '">' . esc_html__('Order Tracking', 'dawp') . '</a>';
$contact_link = '<a href="' . esc_url(home_url('/contact-us/')) . '">' . esc_html__('Contact Us', 'dawp') . '</a>';

$summary = [
    ['label' => __('Production', 'dawp'), 'value' => __('2–3 business days', 'dawp')],
    ['label' => __('US delivery', 'dawp'), 'value' => __('5–10 business days', 'dawp')],
    ['label' => __('Shipping', 'dawp'), 'value' => __('Free on $49+', 'dawp')],
    ['label' => __('Returns', 'dawp'), 'value' => __('30 days', 'dawp')],
];

$sections = [
    [
        'id'    => 'shipping',
        'title' => __('Shipping Policy', 'dawp'),
        'body'  => [
            '<h3>' . esc_html__('1. Processing (production) time', 'dawp') . '</h3>',
            '<p>' . esc_html__('Every ProudlyWear item is printed to order after you buy it. Production and quality checks take 2–3 business days. Business days are Monday to Friday, excluding US federal holidays.', 'dawp') . '</p>',
            '<h3>' . esc_html__('2. Delivery time', 'dawp') . '</h3>',
            '<p>' . esc_html__('After dispatch, standard US delivery typically takes 5–10 business days. Total time from order to doorstep is usually 7–13 business days. Delays can happen around holidays or because of events outside our control, such as severe weather or carrier disruptions.', 'dawp') . '</p>',
            '<h3>' . esc_html__('3. Shipping rates', 'dawp') . '</h3>',
            '<ul><li>' . esc_html__('Orders of $49 or more (subtotal after discounts): free standard shipping.', 'dawp') . '</li></ul>' .
            '<p>' . esc_html__('Spend & Save discounts (5% off $69+, 10% off $99+, 15% off $139+) are applied automatically at checkout and never cost you free shipping: free shipping is based on the item subtotal before the Spend & Save discount.', 'dawp') . '</p>',
            '<p>' . esc_html__('The exact shipping charge is always shown at checkout before you pay.', 'dawp') . '</p>',
            '<h3>' . esc_html__('4. Where we ship', 'dawp') . '</h3>',
            '<p>' . esc_html__('We ship to addresses in all 50 US states. At this time we can’t ship to APO/FPO/DPO addresses, PO boxes or destinations outside the United States.', 'dawp') . '</p>',
            '<h3>' . esc_html__('5. Multiple items', 'dawp') . '</h3>',
            '<p>' . esc_html__('Items in one order may be made by different print partners and arrive in separate packages, each with its own tracking number.', 'dawp') . '</p>',
            '<h3>' . esc_html__('6. Tracking', 'dawp') . '</h3>',
            '<p>' . sprintf(esc_html__('Every order ships with tracking. Once your order ships we email you the tracking number and link; tracking can take 2–5 business days to show its first update. You can also check status on our %s page.', 'dawp'), $track_link) . '</p>',
        ],
    ],
    [
        'id'    => 'delivery-issues',
        'title' => __('Delivery Issues', 'dawp'),
        'body'  => [
            '<h3>' . esc_html__('Late or lost packages', 'dawp') . '</h3>',
            '<p>' . sprintf(esc_html__('If your order hasn’t arrived 5 business days after its estimated delivery date, email %s with your order number. If the carrier confirms the package is lost, we’ll reship your order at no cost or issue a full refund.', 'dawp'), $email_link) . '</p>',
            '<h3>' . esc_html__('Marked as delivered but not received', 'dawp') . '</h3>',
            '<p>' . esc_html__('Check around your property, with neighbors and household members, and allow 1–2 business days — carriers sometimes scan packages as delivered early. If it still hasn’t turned up, contact us and we’ll open a claim with the carrier and help you from there.', 'dawp') . '</p>',
            '<h3>' . esc_html__('Incorrect address', 'dawp') . '</h3>',
            '<p>' . esc_html__('Please double-check your address at checkout. Address changes can be made within 24 hours of ordering. If a package is returned to us because of an incorrect or incomplete address provided at checkout, we’ll contact you to reship it; a new shipping charge may apply.', 'dawp') . '</p>',
        ],
    ],
    [
        'id'    => 'cancel',
        'title' => __('Cancel or Change an Order', 'dawp'),
        'body'  => [
            '<p>' . sprintf(esc_html__('Because every item is made to order, you can cancel your order or change the size, color or shipping address within 24 hours of placing it, before production begins. Email %1$s with your order number or use our %2$s page. Cancelled orders are refunded in full to the original payment method.', 'dawp'), $email_link, $contact_link) . '</p>',
            '<p>' . esc_html__('After 24 hours your order may already be in production, and we can’t guarantee changes or cancellations. You can still use our return policy below once the item arrives.', 'dawp') . '</p>',
        ],
    ],
    [
        'id'    => 'returns',
        'title' => __('Return & Refund Policy', 'dawp'),
        'body'  => [
            '<h3>' . esc_html__('1. 30-day returns', 'dawp') . '</h3>',
            '<p>' . esc_html__('You can return eligible items within 30 calendar days of delivery. To be eligible, items must be unworn, unwashed, free of odors or damage, and in their original condition.', 'dawp') . '</p>',
            '<h3>' . esc_html__('2. Damaged, defective or incorrect items', 'dawp') . '</h3>',
            '<p>' . sprintf(esc_html__('If your item arrives damaged, has a print defect, or isn’t what you ordered (wrong size, color or design), email %s within 7 calendar days of delivery with your order number, a short description and clear photos. We’ll send a free replacement or a full refund — your choice — and you will not pay any return shipping.', 'dawp'), $email_link) . '</p>',
            '<h3>' . esc_html__('3. Change of mind or wrong size', 'dawp') . '</h3>',
            '<p>' . esc_html__('Eligible items can also be returned within 30 days for a change of mind or a size that doesn’t fit. In these cases the customer pays the return shipping cost, and original shipping charges are not refunded. There is no restocking fee. Personalized or custom items can’t be returned for change of mind.', 'dawp') . '</p>',
            '<h3>' . esc_html__('4. How to start a return', 'dawp') . '</h3>',
            '<ul><li>' . sprintf(esc_html__('Email %s with your order number, the item(s) and the reason for the return.', 'dawp'), $email_link) . '</li><li>' . esc_html__('We’ll reply within 24 hours (Monday–Friday) with your return authorization and the return address.', 'dawp') . '</li><li>' . esc_html__('Please don’t send items back without a return authorization — unauthorized returns can’t be accepted.', 'dawp') . '</li></ul>',
            '<h3>' . esc_html__('5. Exchanges', 'dawp') . '</h3>',
            '<p>' . esc_html__('The fastest way to get a different size or color is to return the original item for a refund and place a new order. For damaged, defective or incorrect items, we’ll send the correct replacement free of charge.', 'dawp') . '</p>',
            '<h3>' . esc_html__('6. Refunds', 'dawp') . '</h3>',
            '<p>' . esc_html__('Once your return is received and inspected (or your damage claim is approved), we process the refund within 5 business days to your original payment method. Depending on your bank or card issuer, it can take a further 5–10 business days to appear on your statement; PayPal refunds usually appear sooner.', 'dawp') . '</p>',
        ],
    ],
];

$allowed = [
    'p'  => [],
    'h3' => [],
    'ul' => [],
    'li' => [],
    'a'  => ['href' => []],
];
?>

<div class="bg-background text-foreground">
    <section class="border-b border-border-strong py-14 sm:py-20" aria-labelledby="ship-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <span class="font-stencil inline-flex items-center gap-2 border-y-2 border-foreground py-1 text-sm uppercase tracking-[0.2em]"><span class="text-accent" aria-hidden="true">★</span><?php esc_html_e('Policies', 'dawp'); ?></span>
            <h1 id="ship-title" class="font-display mt-5 text-5xl uppercase leading-[1] sm:text-7xl"><?php esc_html_e('Shipping & returns', 'dawp'); ?></h1>
            <p class="mt-5 max-w-2xl text-lg leading-relaxed text-foreground-muted"><?php esc_html_e('How we make, ship and stand behind your order. If anything here isn’t clear, just send us an email — we’re happy to help.', 'dawp'); ?></p>
            <p class="mt-3 text-sm text-muted"><?php esc_html_e('Last updated: October 14, 2026', 'dawp'); ?></p>

            <dl class="mt-10 grid grid-cols-2 gap-3 lg:grid-cols-4">
                <?php foreach ($summary as $item) : ?>
                    <div class="rounded-lg border border-border border-t-4 border-t-accent bg-[#FFFFFF] p-4">
                        <dt class="font-heading text-sm font-bold uppercase tracking-[0.14em] text-muted"><?php echo esc_html($item['label']); ?></dt>
                        <dd class="font-display mt-1 text-xl uppercase sm:text-2xl"><?php echo esc_html($item['value']); ?></dd>
                    </div>
                <?php endforeach; ?>
            </dl>
        </div>
    </section>

    <section class="py-14 sm:py-20">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[260px_1fr] lg:px-8">
            <nav class="lg:sticky lg:top-6 lg:self-start" aria-label="<?php esc_attr_e('On this page', 'dawp'); ?>">
                <p class="font-heading text-sm font-bold uppercase tracking-[0.16em] text-muted"><?php esc_html_e('On this page', 'dawp'); ?></p>
                <ul class="mt-3 grid gap-1 border-l-2 border-border-strong">
                    <?php foreach ($sections as $section) : ?>
                        <li><a href="#<?php echo esc_attr($section['id']); ?>" class="-ml-[2px] block border-l-2 border-transparent py-2 pl-4 text-sm font-semibold transition hover:border-accent hover:bg-surface hover:text-accent"><?php echo esc_html($section['title']); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <div class="grid gap-8">
                <?php foreach ($sections as $section) : ?>
                    <article id="<?php echo esc_attr($section['id']); ?>" class="scroll-mt-6 rounded-lg border border-border bg-[#FFFFFF] p-6 sm:p-8">
                        <h2 class="font-display text-3xl uppercase sm:text-4xl"><?php echo esc_html($section['title']); ?></h2>
                        <div class="mt-5 grid gap-4 text-[0.98rem] leading-7 text-foreground-muted [&_a]:font-bold [&_a]:text-foreground [&_a]:underline [&_a]:decoration-accent [&_a]:decoration-2 [&_a]:underline-offset-4 [&_h3]:mt-2 [&_h3]:font-heading [&_h3]:text-lg [&_h3]:font-bold [&_h3]:uppercase [&_h3]:tracking-wide [&_h3]:text-foreground [&_li]:pl-1 [&_ul]:grid [&_ul]:list-disc [&_ul]:gap-1.5 [&_ul]:pl-5">
                            <?php echo wp_kses(implode('', $section['body']), $allowed); ?>
                        </div>
                    </article>
                <?php endforeach; ?>

                <div class="rounded-lg border-t-4 border-highlight bg-foreground p-6 text-background sm:p-8">
                    <h2 class="font-display text-2xl uppercase"><?php esc_html_e('Need help?', 'dawp'); ?></h2>
                    <p class="mt-3 text-sm leading-7 text-background/80">
                        ProudlyWear · proudlywear.com<br>
                        <a class="font-bold text-highlight underline" href="mailto:support@proudlywear.com">support@proudlywear.com</a> · <?php esc_html_e('Monday–Friday, 9am–5pm ET', 'dawp'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
</div>
