<?php
/**
 * Shipping Policy — TimePiece Haven.
 *
 * Hardcoded policy content. Written to align with Google Merchant Center
 * "Shipping and returns" requirements: processing time, delivery estimates,
 * shipping costs, carriers, destinations, and tracking.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$email = function_exists('dawp_store_email') ? dawp_store_email() : 'support@timepiecehaven.com';

dawp_render_legal([
    'title'   => __('Shipping Policy', 'dawp'),
    'updated' => __('August 29, 2026', 'dawp'),
    'intro'   => __('This policy explains where we ship, how long orders take to process and arrive, what shipping costs, and how tracking works. All estimates are in business days and exclude weekends and public holidays.', 'dawp'),
    'sections' => [
        [
            'heading' => __('Where we ship', 'dawp'),
            'body'    => '<p>' . esc_html__('We currently ship to all 50 US states, including APO, FPO, and DPO addresses and US territories. We do not ship internationally at this time. Orders can be delivered to residential addresses and PO boxes.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Order processing time', 'dawp'),
            'body'    => '<p>' . esc_html__('Orders are processed and dispatched within 1 to 3 business days of payment confirmation. Orders placed on weekends or holidays are processed on the next business day. During sales events or peak periods, processing may take an extra 1 to 2 business days.', 'dawp') . '</p>'
                . '<p>' . esc_html__('If we expect a significant delay with your order, we will email you.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Delivery estimates and shipping cost', 'dawp'),
            'body'    => '<p>' . esc_html__('Standard shipping is free on every order, with no minimum spend. An optional paid expedited service is offered at checkout where available.', 'dawp') . '</p>'
                . '<table><thead><tr>'
                . '<th>' . esc_html__('Method', 'dawp') . '</th>'
                . '<th>' . esc_html__('Estimated delivery', 'dawp') . '</th>'
                . '<th>' . esc_html__('Cost', 'dawp') . '</th>'
                . '</tr></thead><tbody>'
                . '<tr><td>' . esc_html__('Standard (USPS / UPS)', 'dawp') . '</td><td>' . esc_html__('3-7 business days after dispatch', 'dawp') . '</td><td>' . esc_html__('Free on every order', 'dawp') . '</td></tr>'
                . '<tr><td>' . esc_html__('Expedited (UPS 2-Day)', 'dawp') . '</td><td>' . esc_html__('2 business days after dispatch', 'dawp') . '</td><td>' . esc_html__('$19.95 flat rate', 'dawp') . '</td></tr>'
                . '</tbody></table>'
                . '<p>' . esc_html__('Delivery estimates begin when the carrier picks up the parcel, not when the order is placed. Total time to receive an order is the processing time plus the delivery time. The exact options and any cost are shown at checkout before payment.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Carriers', 'dawp'),
            'body'    => '<p>' . esc_html__('We ship with USPS and UPS. The carrier for a given order is chosen based on the destination and the size of the parcel. Every shipment is insured for its full value in transit.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Order tracking', 'dawp'),
            'body'    => '<p>' . sprintf(
                /* translators: %s: track order page link */
                wp_kses_post(__('When your order ships, we email you a tracking number and a link. You can also track your order any time on our %s page. Please allow up to 24 hours for tracking to update after you receive the email.', 'dawp')),
                '<a href="' . esc_url(home_url('/track-order/')) . '">' . esc_html__('Track Order', 'dawp') . '</a>'
            ) . '</p>',
        ],
        [
            'heading' => __('Taxes and duties', 'dawp'),
            'body'    => '<p>' . esc_html__('Because we only ship within the United States, there are no customs duties or import fees. Any applicable US sales tax is calculated and shown at checkout based on your delivery address.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Incorrect or incomplete addresses', 'dawp'),
            'body'    => '<p>' . sprintf(
                /* translators: %s: support email link */
                wp_kses_post(__('Please check your shipping address carefully at checkout. If you need to correct an address, contact us at %s immediately; we can only change it before the order ships. If a parcel is returned to us because of an incorrect address or a failed delivery, we will contact you to arrange re-shipment. Re-shipping costs are the customer\'s responsibility.', 'dawp')),
                '<a href="mailto:' . esc_attr($email) . '">' . esc_html($email) . '</a>'
            ) . '</p>',
        ],
        [
            'heading' => __('Lost, stolen, or damaged shipments', 'dawp'),
            'body'    => '<p>' . esc_html__('If tracking has not updated for 7 or more business days, or shows delivered but you did not receive the parcel, contact us. Because shipments are insured, we will open a claim with the carrier and send a replacement or issue a refund once the claim is confirmed. Report shipments that arrive physically damaged within 7 days of delivery with photos of the item and the packaging.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Shipping delays outside our control', 'dawp'),
            'body'    => '<p>' . esc_html__('Delivery estimates are provided by the carriers and are not guaranteed. Severe weather, natural events, carrier disruptions, and peak-season volume can cause delays. We will help you follow up with the carrier, but we are not able to control transit times once a parcel is in the carrier network.', 'dawp') . '</p>',
        ],
    ],
]);
