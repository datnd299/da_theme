<?php
/**
 * Refund & Return Policy — YourWatchStore. Tailwind utilities only.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email  = 'support@yourwatchstore.com';
$business_hours = __('Monday - Friday, 9:00 AM - 5:00 PM EST', 'dawp');
$updated        = get_the_modified_date('F j, Y') ?: gmdate('F j, Y');

$sections = [
    [
        'title' => __('Return window', 'dawp'),
        'body'  => [
            __('You may request a return within 30 days of the delivery date shown by the carrier. Requests made after 30 days cannot be accepted except where required by law.', 'dawp'),
        ],
    ],
    [
        'title' => __('Condition of returned items', 'dawp'),
        'body'  => [
            __('To be eligible, a watch must be unworn and in original, resalable condition with all protective stickers in place. It must be returned with the box, papers, warranty card, spare links, and any included accessories.', 'dawp'),
            __('Watches that have been worn, sized, engraved, adjusted by a third party, or damaged after delivery are not eligible for return.', 'dawp'),
        ],
    ],
    [
        'title' => __('How to start a return', 'dawp'),
        'body'  => [
            __('Email us or use the Contact Us page within 30 days of delivery. Include your order number, the checkout email, the item you want to return, and the reason. If the watch is damaged, defective, or incorrect, attach clear photos or a short video.', 'dawp'),
            __('Please wait for a return authorization (RMA) and instructions before shipping anything back. Returns sent without authorization, or to an address other than the one we provide, may be delayed, refused, or returned to sender at your cost.', 'dawp'),
            __('Pack the watch securely in its original box with padding so it is protected in transit. Damage caused by inadequate return packaging may reduce your refund.', 'dawp'),
        ],
    ],
    [
        'title' => __('Return shipping costs', 'dawp'),
        'body'  => [
            __('For a watch that is defective, damaged, incorrect, or damaged by the carrier, YourWatchStore covers return shipping and provides a prepaid label by email.', 'dawp'),
            __('For change-of-mind returns, the customer is responsible for return shipping. If we provide a label, its cost may be deducted from the refund. We recommend a tracked, insured service; we cannot refund an item that does not reach us or that is lost on the way back.', 'dawp'),
            __('There is no restocking fee for returns that arrive complete and in eligible condition.', 'dawp'),
        ],
    ],
    [
        'title' => __('Inspection on arrival', 'dawp'),
        'body'  => [
            __('When your return reaches us we check that the watch is unworn, that protective stickers and tags are intact, that timekeeping and functions work, and that the box, papers, warranty card, spare links, and accessories are all present.', 'dawp'),
            __('If the item passes inspection, the refund is approved. If it shows wear, is missing parts, or is damaged, we will contact you with photos and offer a partial refund or return the item to you.', 'dawp'),
        ],
    ],
    [
        'title' => __('Refunds', 'dawp'),
        'body'  => [
            __('Once your return arrives, we inspect the watch within 1-2 business days. If it is approved, the refund is issued to the original payment method within 7 business days. Your bank or card issuer may take additional time to post it.', 'dawp'),
            __('Original shipping was free, so no shipping charge is refunded. If a change-of-mind return arrives with the box, papers, or warranty card missing, the refund may be reduced to reflect the loss in value.', 'dawp'),
            __('If you have not received an approved refund after 15 business days, contact us after checking with your bank or card issuer.', 'dawp'),
        ],
    ],
    [
        'title' => __('Exchanges', 'dawp'),
        'body'  => [
            __('We do not process direct exchanges. To switch to a different model, return the original eligible watch for a refund and place a new order on the website. This makes sure your preferred model is reserved and priced correctly at the time you order it.', 'dawp'),
        ],
    ],
    [
        'title' => __('Faulty or defective watches', 'dawp'),
        'body'  => [
            __('If a watch stops working, keeps poor time beyond its stated tolerance, or has a manufacturing fault within 30 days of delivery, contact us with your order number and a description or video of the issue. We cover return shipping and provide a replacement of the same model or a full refund.', 'dawp'),
            __('After 30 days, a defect may be covered by the manufacturer warranty included with the watch. We can help you start that claim.', 'dawp'),
        ],
    ],
    [
        'title' => __('Gifts', 'dawp'),
        'body'  => [
            __('If you received a watch as a gift and it is within the return window and in eligible condition, contact us with the original order number or the purchaser name and delivery address. Refunds are always issued to the original payment method used by the purchaser.', 'dawp'),
        ],
    ],
    [
        'title' => __('Order cancellations', 'dawp'),
        'body'  => [
            __('Contact us as soon as possible to cancel an order. If it has not yet entered processing, we will cancel it and refund in full. Once an order has shipped, it must be handled as a return.', 'dawp'),
        ],
    ],
    [
        'title' => __('Sale and clearance items', 'dawp'),
        'body'  => [
            __('Discounted items are returnable under the standard 30-day policy unless the product page clearly marks them as final sale. Final sale items can only be returned if they arrive damaged or defective.', 'dawp'),
        ],
    ],
    [
        'title' => __('Non-returnable items', 'dawp'),
        'body'  => [
            __('Gift cards and items marked final sale are not eligible for return. Items that have been worn, sized, engraved, altered, serviced by a third party, or damaged after delivery are not eligible.', 'dawp'),
        ],
    ],
    [
        'title' => __('Refunds to expired or closed cards', 'dawp'),
        'body'  => [
            __('If the card used for the order has expired or been closed, the refund is still sent to that card number and your bank routes it to your new card or account. If your bank rejects it, contact us and we will arrange an alternative refund to the same account holder.', 'dawp'),
        ],
    ],
    [
        'title' => __('Your statutory rights', 'dawp'),
        'body'  => [
            __('This policy is offered in addition to any rights you have under applicable consumer protection law, which are not affected by anything on this page.', 'dawp'),
        ],
    ],
];
?>

<div class="bg-background text-foreground">
    <section class="border-b border-border">
        <div class="mx-auto max-w-3xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
            <p class="text-xs font-bold uppercase tracking-[0.16em] text-accent-blush"><?php esc_html_e('Policies', 'dawp'); ?></p>
            <h1 class="mt-4 font-heading text-4xl font-extrabold leading-tight tracking-tight text-foreground sm:text-5xl"><?php esc_html_e('Refund & Return Policy', 'dawp'); ?></h1>
            <p class="mt-5 text-base leading-7 text-foreground-muted"><?php esc_html_e('30-day returns on unworn watches in original condition, with box and papers. No restocking fee.', 'dawp'); ?></p>
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
                <h2 class="font-heading text-lg font-bold text-foreground"><?php esc_html_e('Start a return', 'dawp'); ?></h2>
                <p class="mt-2 text-sm leading-6 text-foreground-muted">
                    <?php
                    printf(
                        wp_kses(__('Email <a class="font-semibold text-accent-blush underline underline-offset-2" href="mailto:%1$s">%1$s</a> or use the <a class="font-semibold text-accent-blush underline underline-offset-2" href="%2$s">Contact Us page</a>. Support hours: %3$s.', 'dawp'), ['a' => ['class' => [], 'href' => []]]),
                        esc_attr($support_email),
                        esc_url(home_url('/contact-us/')),
                        esc_html($business_hours)
                    );
                    ?>
                </p>
            </div>
        </div>
    </section>
</div>
