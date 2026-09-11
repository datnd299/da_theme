<?php
/**
 * Return & Refund Policy- Watchfavor.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

dawp_render_legal([
    'title'   => __('Return & Refund Policy', 'dawp'),
    'updated' => __('September 11, 2026', 'dawp'),
    'intro'   => __('We want you to love your Watchfavor watch. If it is not right, here is exactly how returns, refunds, exchanges and our 2-year limited warranty work- including how refunds are issued when you pay by PayPal.', 'dawp'),
    'sections' => [
        [
            'heading' => __('Our Guarantee', 'dawp'),
            'body'    => '<p>' . esc_html__('Every order comes with a 30-day return window and a 2-year limited warranty, at no extra cost. If a watch does not fit your expectations or arrives with a defect, we will make it right with a refund, replacement, or repair.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Return Eligibility & Window', 'dawp'),
            'body'    => '<p>' . esc_html__('You may return an unworn watch in its original packaging, with all tags, papers, warranty card and accessories included, within 30 days of the delivery date shown on your tracking, for a full refund of the purchase price.', 'dawp') . '</p>'
                . '<p>' . esc_html__('Watches showing signs of wear, scratches, damage not caused by a manufacturing defect, or missing original packaging or accessories may be refused, or accepted for a partial refund reflecting the reduction in value.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Non-Returnable Items', 'dawp'),
            'body'    => '<p>' . esc_html__('For hygiene and customization reasons, the following are not eligible for return unless defective: watches that have been engraved or otherwise personalized, and items marked as final sale at the time of purchase.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('How to Start a Return', 'dawp'),
            'body'    => '<p>' . sprintf(
                wp_kses_post(__('Email us at our support address, or use our <a href="%s">Contact Us</a> form, with your order number and the reason for return. We typically respond within 1 business day with return instructions and, where applicable, a prepaid shipping label.', 'dawp')),
                esc_url(home_url('/contact-us/?topic=return'))
            ) . '</p>'
                . '<ol>'
                . '<li>' . esc_html__('Contact us with your order number and reason for return.', 'dawp') . '</li>'
                . '<li>' . esc_html__('We confirm eligibility and send you return instructions (and a label, if applicable).', 'dawp') . '</li>'
                . '<li>' . esc_html__('Pack the watch securely with all original packaging and accessories, and ship it back.', 'dawp') . '</li>'
                . '<li>' . esc_html__('We inspect the return and process your refund or exchange.', 'dawp') . '</li>'
                . '</ol>',
        ],
        [
            'heading' => __('Return Shipping Costs', 'dawp'),
            'body'    => '<p>' . esc_html__('If the return is due to a manufacturing defect, damage in transit, or an error on our part (wrong item sent, etc.), Watchfavor covers the return shipping cost in full. For returns made simply because you changed your mind, the customer is responsible for return shipping.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Refunds- Method & Timeline', 'dawp'),
            'body'    => '<p>' . esc_html__('Once your return is received and inspected (typically within 2-3 business days of arrival), we will notify you by email whether it has been approved.', 'dawp') . '</p>'
                . '<p>' . esc_html__('Approved refunds are issued to your original payment method through PayPal. Because all payments on this site are processed by PayPal, refunds are sent back to the same PayPal transaction- if you paid with a card via PayPal Guest Checkout, PayPal returns the funds to that same card; if you paid from your PayPal balance or bank account, funds are returned to your PayPal account.', 'dawp') . '</p>'
                . '<p>' . esc_html__('We issue the refund within 5 business days of approval. PayPal refunds are typically visible in your PayPal account within minutes, though it can take 3-10 additional business days for the funds to post back to a linked card or bank account, depending on your card issuer or bank.', 'dawp') . '</p>'
                . '<p>' . esc_html__('Original shipping charges are non-refundable, except where the return is due to our error or a defective item.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Late or Missing Refunds', 'dawp'),
            'body'    => '<p>' . esc_html__('If more than 10 business days have passed since we confirmed your refund and you still have not seen it, first check your PayPal account activity, then contact your card issuer or bank, as posting times vary. If you have done this and still have not received your refund, please contact us.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Exchanges', 'dawp'),
            'body'    => '<p>' . esc_html__('To exchange a watch for a different model, dial color, or strap, return the original item for a refund and place a new order for the item you want. This keeps processing fast and ensures you get current stock and pricing.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Damaged, Defective or Incorrect Items', 'dawp'),
            'body'    => '<p>' . sprintf(
                wp_kses_post(__('If your watch arrives damaged, has a manufacturing defect, or is not what you ordered, <a href="%s">contact us</a> within 7 days of delivery with your order number and photos of the issue. We will arrange a prepaid return and send a replacement or full refund, including original shipping, at no cost to you.', 'dawp')),
                esc_url(home_url('/contact-us/?topic=return'))
            ) . '</p>',
        ],
        [
            'heading' => __('Order Cancellations', 'dawp'),
            'body'    => '<p>' . esc_html__('If you need to cancel or change an order, contact us as soon as possible. We can cancel and fully refund orders that have not yet been dispatched. Once an order has shipped, it must go through the standard return process above.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('2-Year Limited Warranty', 'dawp'),
            'body'    => '<p>' . esc_html__('Every Watchfavor watch is covered by a 2-year limited warranty against manufacturing defects in materials and workmanship, starting from the delivery date. During this period, we will repair or replace a defective watch free of charge.', 'dawp') . '</p>'
                . '<p>' . esc_html__('The warranty does not cover normal wear and tear, routine movement servicing, water damage from exceeding the stated water resistance, batteries (if applicable to your model), or damage caused by accidents, misuse, or repairs performed by anyone other than Watchfavor.', 'dawp') . '</p>',
        ],
    ],
]);
