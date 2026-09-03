<?php
/**
 * Return & Refund Policy — North Time Co.
 *
 * Hardcoded policy content. Written to align with Google Merchant Center
 * "Returns and refunds" requirements: a clearly stated return window,
 * conditions, the return process, refund method and timeframe, and who pays
 * return shipping. Kept consistent with the Shipping Policy, Billing Terms &
 * Conditions, FAQ, and footer.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$email = function_exists('dawp_store_email') ? dawp_store_email() : 'support@northtimeco.com';

dawp_render_legal([
    'title'   => __('Return & Refund Policy', 'dawp'),
    'updated' => __('September 3, 2026', 'dawp'),
    'intro'   => __('We want you to be happy with your watch. If something is not right, you may return most items within 30 days of delivery. This policy explains what can be returned, how to start a return, and how and when refunds are issued. All timeframes are in business days.', 'dawp'),
    'sections' => [
        [
            'heading' => __('Return window', 'dawp'),
            'body'    => '<p>' . esc_html__('You have 30 calendar days from the date your order is marked delivered by the carrier to request a return. Requests made after 30 days can only be considered where a manufacturer warranty is included with the watch; warranty coverage, if any, is stated on the product page.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Condition of returned items', 'dawp'),
            'body'    => '<p>' . esc_html__('To be eligible for a full refund, the watch must be:', 'dawp') . '</p><ul>'
                . '<li>' . esc_html__('Unworn and undamaged, with no scratches, sizing marks, or other signs of wear;', 'dawp') . '</li>'
                . '<li>' . esc_html__('Returned with all original packaging and inserts, protective films, tags, the instruction booklet, any warranty paperwork, and any links removed during sizing;', 'dawp') . '</li>'
                . '<li>' . esc_html__('Free of any engraving, personalization, or third-party modification or repair.', 'dawp') . '</li>'
                . '</ul><p>' . esc_html__('Returns that arrive worn, incomplete, or damaged because of inadequate packaging may be refused or subject to a reduced refund that reflects the loss in value. We photograph every return on arrival.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Non-returnable items', 'dawp'),
            'body'    => '<ul>'
                . '<li>' . esc_html__('Items marked "Final Sale" or "Clearance" at the time of purchase;', 'dawp') . '</li>'
                . '<li>' . esc_html__('Engraved or personalized watches;', 'dawp') . '</li>'
                . '<li>' . esc_html__('Gift cards;', 'dawp') . '</li>'
                . '<li>' . esc_html__('Items returned more than 30 days after delivery (except valid manufacturer warranty claims).', 'dawp') . '</li>'
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
                . '<li>' . esc_html__('We will reply within 1 business day with a Return Merchandise Authorization (RMA) number and the return address.', 'dawp') . '</li>'
                . '<li>' . esc_html__('Pack the watch securely in its original box with all accessories, write the RMA number on the outside of the parcel, and ship it with a tracked and insured service.', 'dawp') . '</li>'
                . '</ol><p class="legal-note">' . esc_html__('Please do not send a return without an RMA number. Unauthorized returns may be delayed or refused.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Return shipping costs', 'dawp'),
            'body'    => '<ul>'
                . '<li><strong>' . esc_html__('Change of mind:', 'dawp') . '</strong> ' . esc_html__('You are responsible for the return shipping cost, and we recommend a tracked, insured service. Standard shipping on your original order was free, so nothing is deducted for outbound shipping on a change-of-mind return.', 'dawp') . '</li>'
                . '<li><strong>' . esc_html__('Our error, or a defective or damaged item:', 'dawp') . '</strong> ' . esc_html__('We cover the return shipping cost and send you a prepaid label, and you are refunded in full.', 'dawp') . '</li>'
                . '</ul>',
        ],
        [
            'heading' => __('Damaged, defective, or incorrect items', 'dawp'),
            'body'    => '<p>' . sprintf(
                /* translators: %s: support email link */
                wp_kses_post(__('Please inspect your order on arrival. If your watch arrives damaged or faulty, or is not the item you ordered, contact us at %s within 7 days of delivery with your order number and clear photos of the item and the packaging. We will arrange a free replacement or a full refund, including all shipping costs, at your choice.', 'dawp')),
                '<a href="mailto:' . esc_attr($email) . '">' . esc_html($email) . '</a>'
            ) . '</p>',
        ],
        [
            'heading' => __('Exchanges', 'dawp'),
            'body'    => '<p>' . esc_html__('We do not process direct exchanges. If you would like a different model or strap, return the original item for a refund under this policy and place a new order for the item you want. This keeps pricing and stock accurate for every customer and gets your new watch to you faster.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Order cancellations', 'dawp'),
            'body'    => '<p>' . esc_html__('You may cancel an order for a full refund at any time before it is dispatched — email us as soon as possible with your order number. Once an order has shipped it cannot be cancelled, but you can return it under this policy after it arrives.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Refunds', 'dawp'),
            'body'    => '<p>' . esc_html__('Once your return is received, we inspect it within 3 business days and email you the outcome. Approved refunds are issued to the original payment method used for the order within 5 to 10 business days of approval. How quickly the funds then appear on your statement depends on your bank or card issuer.', 'dawp') . '</p>'
                . '<p>' . esc_html__('We do not charge a restocking fee for returns that meet the conditions above. A refund is reduced only where a returned item shows a loss in value from handling beyond what is needed to inspect it.', 'dawp') . '</p>'
                . '<p>' . esc_html__('If more than 10 business days have passed since we told you your refund was approved and you still have not received it, please contact your bank or card issuer first, then contact us and we will follow up with our payment processor.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Late or missing deliveries', 'dawp'),
            'body'    => '<p>' . esc_html__('If tracking shows your order as delivered but you have not received it, or your order has not moved for 7 or more business days, contact us. Every shipment is insured, so we will open a carrier claim and resolve the issue with a replacement or a full refund.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Your statutory rights', 'dawp'),
            'body'    => '<p>' . esc_html__('This policy is offered in addition to, and does not limit, any rights you have under applicable US federal or state consumer protection law.', 'dawp') . '</p>',
        ],
    ],
]);
