<?php
/**
 * Return & Refund Policy — TimePiece Haven.
 *
 * Hardcoded policy content. Written to align with Google Merchant Center
 * "Returns and refunds" requirements: a clearly stated return window,
 * conditions, process, refund method and timeframe, and who pays return
 * shipping.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$email = function_exists('dawp_store_email') ? dawp_store_email() : 'support@timepiecehaven.com';

dawp_render_legal([
    'title'   => __('Return & Refund Policy', 'dawp'),
    'updated' => __('August 29, 2026', 'dawp'),
    'intro'   => __('We want you to be happy with your watch. If something is not right, you may return most items within 30 days of delivery. This policy explains what can be returned, how to start a return, and how refunds are issued.', 'dawp'),
    'sections' => [
        [
            'heading' => __('Return window', 'dawp'),
            'body'    => '<p>' . esc_html__('You have 30 calendar days from the date your order is marked delivered to request a return. After 30 days, a return can only be considered where a manufacturer warranty is included with the watch (warranty coverage is stated on the product page).', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Condition of returned items', 'dawp'),
            'body'    => '<p>' . esc_html__('To be eligible for a refund, the watch must be:', 'dawp') . '</p><ul>'
                . '<li>' . esc_html__('Unworn and undamaged, with no scratches, sizing marks, or signs of wear;', 'dawp') . '</li>'
                . '<li>' . esc_html__('Returned with all original packaging, protective films, tags, links removed during sizing, the instruction booklet, and any warranty paperwork supplied with the watch;', 'dawp') . '</li>'
                . '<li>' . esc_html__('Free of any engraving, personalization, or third-party modification.', 'dawp') . '</li>'
                . '</ul><p>' . esc_html__('Returns that arrive worn, incomplete, or damaged due to inadequate packaging may be refused or subject to a reduced refund that reflects the loss in value.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Non-returnable items', 'dawp'),
            'body'    => '<ul>'
                . '<li>' . esc_html__('Items marked "Final Sale" or "Clearance" at the time of purchase;', 'dawp') . '</li>'
                . '<li>' . esc_html__('Engraved or personalized watches;', 'dawp') . '</li>'
                . '<li>' . esc_html__('Gift cards;', 'dawp') . '</li>'
                . '<li>' . esc_html__('Items returned more than 30 days after delivery.', 'dawp') . '</li>'
                . '</ul>',
        ],
        [
            'heading' => __('How to start a return', 'dawp'),
            'body'    => '<ol>'
                . '<li>' . sprintf(
                    /* translators: %s: support email link */
                    wp_kses_post(__('Email us at %s with your order number and the reason for the return.', 'dawp')),
                    '<a href="mailto:' . esc_attr($email) . '">' . esc_html($email) . '</a>'
                ) . '</li>'
                . '<li>' . esc_html__('We will reply within one business day with a Return Merchandise Authorization (RMA) number and the return address.', 'dawp') . '</li>'
                . '<li>' . esc_html__('Pack the watch securely in its original box with all accessories, write the RMA number on the outside of the parcel, and ship it with a tracked and insured service.', 'dawp') . '</li>'
                . '</ol><p class="legal-note">' . esc_html__('Please do not send a return without an RMA number. Unauthorized returns may be delayed or refused.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Return shipping costs', 'dawp'),
            'body'    => '<ul>'
                . '<li><strong>' . esc_html__('Change of mind:', 'dawp') . '</strong> ' . esc_html__('You are responsible for the return shipping cost. The original outbound shipping charge, if any, is not refunded.', 'dawp') . '</li>'
                . '<li><strong>' . esc_html__('Our error (wrong, defective, or damaged item):', 'dawp') . '</strong> ' . esc_html__('We cover the return shipping cost and send a prepaid label. You are refunded in full, including original shipping.', 'dawp') . '</li>'
                . '</ul>',
        ],
        [
            'heading' => __('Damaged, defective, or incorrect items', 'dawp'),
            'body'    => '<p>' . sprintf(
                /* translators: %s: support email link */
                wp_kses_post(__('Inspect your order on arrival. If your watch arrives damaged, faulty, or is not the item you ordered, contact us at %s within 7 days of delivery with your order number and clear photos of the item and packaging. We will arrange a free replacement or a full refund, including shipping.', 'dawp')),
                '<a href="mailto:' . esc_attr($email) . '">' . esc_html($email) . '</a>'
            ) . '</p>',
        ],
        [
            'heading' => __('Exchanges', 'dawp'),
            'body'    => '<p>' . esc_html__('We do not process direct exchanges. If you would like a different model or strap, return the original item for a refund and place a new order. This keeps pricing and stock accurate for every customer.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Order cancellations', 'dawp'),
            'body'    => '<p>' . esc_html__('You may cancel an order for a full refund at any time before it is dispatched. Once an order has shipped it cannot be cancelled, but you can return it under this policy after it arrives.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Refunds', 'dawp'),
            'body'    => '<p>' . esc_html__('Once your return is received, we inspect it within 3 business days and email you the result. Approved refunds are issued to your original payment method within 5 to 10 business days of approval. The time it takes for the funds to appear depends on your bank or card issuer.', 'dawp') . '</p>'
                . '<p>' . esc_html__('We do not charge a restocking fee for returns that meet the conditions above. Refunds may be reduced only where a returned item shows a loss in value from handling beyond what is needed to inspect it.', 'dawp') . '</p>'
                . '<p>' . esc_html__('If more than 10 business days have passed since we approved your refund and you have not received it, please contact your bank first, then contact us.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Late or missing deliveries', 'dawp'),
            'body'    => '<p>' . esc_html__('If tracking shows your order as delivered but you have not received it, or your order has not moved for an extended period, contact us. Shipments are insured and we will open a carrier claim and resolve the issue with a replacement or refund.', 'dawp') . '</p>',
        ],
    ],
]);
