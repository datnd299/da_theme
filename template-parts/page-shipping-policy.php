<?php
/**
 * Shipping Policy- Watchfavor.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

dawp_render_legal([
    'title'   => __('Shipping Policy', 'dawp'),
    'updated' => __('September 11, 2026', 'dawp'),
    'intro'   => __('How Watchfavor ships watches within the United States, from order confirmation to delivery, including processing times, costs, tracking, and what happens if a package is lost or delayed.', 'dawp'),
    'sections' => [
        [
            'heading' => __('Order Processing Time', 'dawp'),
            'body'    => '<p>' . esc_html__('Orders are processed once payment is confirmed by PayPal. Orders placed before 3:00 PM EST on a business day are dispatched the same day. Orders placed after 3:00 PM EST, or on a weekend or public holiday, are dispatched the next business day.', 'dawp') . '</p>'
                . '<p>' . esc_html__('You will receive a shipping confirmation email with a tracking number as soon as your order leaves our workshop. During high-volume periods (such as holidays), processing may take up to 2 additional business days.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Shipping Methods, Rates & Delivery Time', 'dawp'),
            'body'    => '<p>' . esc_html__('Standard shipping (USPS or UPS, at our discretion) is free on every order within the United States, with no minimum order value.', 'dawp') . '</p>'
                . '<ul><li>' . esc_html__('Free Standard Shipping- 3-7 business days after dispatch (typically 5-9 business days from order date)', 'dawp') . '</li></ul>'
                . '<p>' . esc_html__('Delivery estimates are business days and do not include weekends, holidays, or carrier delays outside our control. They begin from the date of dispatch, not the order date.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Where We Ship', 'dawp'),
            'body'    => '<p>' . esc_html__('Watchfavor currently ships to addresses within the 50 United States. We do not currently ship internationally, and cannot deliver to APO/FPO addresses, PO boxes for signature-required shipments, or US territories.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Shipping Address Accuracy', 'dawp'),
            'body'    => '<p>' . esc_html__('Please double-check your shipping address at checkout. We ship to the address provided in your PayPal transaction, so make sure your PayPal account has your current address on file before completing payment. We are not responsible for orders delayed, lost or misdelivered due to an incorrect or incomplete address provided by the customer, though we will do our best to help you recover the shipment.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Order Tracking', 'dawp'),
            'body'    => '<p>' . sprintf(
                /* translators: %s: track order page URL */
                wp_kses_post(__('Once your order ships, use the tracking number in your confirmation email, or visit our <a href="%s">Track Order</a> page with your order number and email to check status at any time.', 'dawp')),
                esc_url(home_url('/track-order/'))
            ) . '</p>',
        ],
        [
            'heading' => __('Lost, Delayed, or Damaged Packages', 'dawp'),
            'body'    => '<p>' . esc_html__('If your package is lost in transit, significantly delayed beyond the estimated delivery window, or arrives visibly damaged, contact us within 7 days of the expected delivery date. We will file a claim with the carrier on your behalf and arrange a replacement or full refund- at no cost to you.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Failed Delivery Attempts', 'dawp'),
            'body'    => '<p>' . esc_html__('If a carrier is unable to deliver your package after multiple attempts and it is returned to us, we will contact you to arrange reshipment. Additional shipping costs may apply if the return was caused by an incorrect address or repeated missed deliveries.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Questions About Your Shipment', 'dawp'),
            'body'    => '<p>' . sprintf(
                wp_kses_post(__('For any shipping question not answered here, <a href="%s">contact us</a> with your order number and we will respond within 1 business day.', 'dawp')),
                esc_url(home_url('/contact-us/?topic=shipping'))
            ) . '</p>',
        ],
    ],
]);
