<?php
/**
 * Shipping Policy — North Time Co.
 *
 * Hardcoded policy content. Written to align with Google Merchant Center
 * "Shipping and returns" requirements: processing time, delivery estimates,
 * shipping costs, carriers, destinations, and tracking. Kept consistent with
 * the Return & Refund Policy, Billing Terms & Conditions, FAQ, and footer.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$email = function_exists('dawp_store_email') ? dawp_store_email() : 'support@northtimeco.com';

dawp_render_legal([
    'title'   => __('Shipping Policy', 'dawp'),
    'updated' => __('September 4, 2026', 'dawp'),
    'intro'   => __('This policy explains where we ship, how long orders take to process and arrive, what shipping costs, and how tracking works. All estimates are in business days (Monday to Friday) and exclude weekends and US public holidays.', 'dawp'),
    'sections' => [
        [
            'heading' => __('Where we ship', 'dawp'),
            'body'    => '<p>' . esc_html__('We currently ship to all 50 US states, the District of Columbia, US territories, and APO, FPO, and DPO military addresses. We do not ship internationally at this time. Orders can be delivered to residential and business addresses and to PO boxes.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Order processing time', 'dawp'),
            'body'    => '<p>' . esc_html__('Orders are processed and dispatched within 1 to 2 business days of payment confirmation. Orders placed on a weekend or public holiday begin processing on the next business day. During sale events or peak periods, processing may take an extra 1 to 2 business days.', 'dawp') . '</p>'
                . '<p>' . esc_html__('If we expect a significant delay with your order, we will email you before it ships.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Delivery estimates and shipping cost', 'dawp'),
            'body'    => '<p>' . esc_html__('Standard shipping is free on every order to any US address, with no minimum spend. An optional paid expedited service is offered at checkout where available for your address.', 'dawp') . '</p>'
                . '<table><thead><tr>'
                . '<th>' . esc_html__('Method', 'dawp') . '</th>'
                . '<th>' . esc_html__('Estimated delivery', 'dawp') . '</th>'
                . '<th>' . esc_html__('Cost', 'dawp') . '</th>'
                . '</tr></thead><tbody>'
                . '<tr><td>' . esc_html__('Standard (USPS / UPS)', 'dawp') . '</td><td>' . esc_html__('3-7 business days after dispatch', 'dawp') . '</td><td>' . esc_html__('Free on every order', 'dawp') . '</td></tr>'
                . '<tr><td>' . esc_html__('Expedited (UPS 2-Day)', 'dawp') . '</td><td>' . esc_html__('2 business days after dispatch', 'dawp') . '</td><td>' . esc_html__('$19.95 flat rate', 'dawp') . '</td></tr>'
                . '</tbody></table>'
                . '<p>' . esc_html__('Delivery estimates begin when the carrier collects the parcel, not when the order is placed. The total time to receive an order is the processing time plus the delivery time — so most standard US orders arrive within 4 to 9 business days of being placed. The exact options and any cost for your address are shown at checkout before you pay.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Carriers', 'dawp'),
            'body'    => '<p>' . esc_html__('We ship with USPS and UPS. The carrier for a given order is selected based on the destination and the size of the parcel. Every shipment is insured for its full value while in transit and is dispatched in discreet packaging with no visible brand or product markings.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Order tracking', 'dawp'),
            'body'    => '<p>' . sprintf(
                /* translators: %s: track order page link */
                wp_kses_post(__('When your order ships, we email you a tracking number and a link. You can also track your order at any time on our %s page using your order number and the email address used at checkout. Please allow up to 24 hours after the shipping email for the first carrier scan to appear.', 'dawp')),
                '<a href="' . esc_url(home_url('/track-order/')) . '">' . esc_html__('Track Order', 'dawp') . '</a>'
            ) . '</p>',
        ],
        [
            'heading' => __('Sales tax and duties', 'dawp'),
            'body'    => '<p>' . esc_html__('Because we only ship within the United States, there are no customs duties or import fees. Any applicable state and local sales tax is calculated on the shipping address and shown at checkout before you confirm payment.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Incorrect or incomplete addresses', 'dawp'),
            'body'    => '<p>' . sprintf(
                /* translators: %s: support email link */
                wp_kses_post(__('Please check your shipping address carefully at checkout. If you need to correct an address, contact us at %s immediately; we can only change it before the order ships. If a parcel is returned to us because of an incorrect or incomplete address or a failed delivery, we will contact you to arrange re-shipment, and the re-shipping cost is the customer\'s responsibility. If you prefer a refund instead, the original item is refunded once it reaches us, less the outbound shipping cost we incurred.', 'dawp')),
                '<a href="mailto:' . esc_attr($email) . '">' . esc_html($email) . '</a>'
            ) . '</p>',
        ],
        [
            'heading' => __('Lost, stolen, or damaged shipments', 'dawp'),
            'body'    => '<p>' . esc_html__('If tracking has not updated for 7 or more business days, or shows the parcel as delivered but you did not receive it, contact us. Because every shipment is insured, we will open a claim with the carrier and send a replacement or issue a full refund once the claim is confirmed. Report a parcel that arrives physically damaged within 7 days of delivery, with photos of the item and the outer packaging, so we can file the claim quickly.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Delays outside our control', 'dawp'),
            'body'    => '<p>' . esc_html__('Delivery estimates are provided by the carriers and are not guaranteed. Severe weather, natural events, carrier disruptions, address verification checks, and peak-season volume can all add time in transit. We will help you follow up with the carrier, but once a parcel is in the carrier network we are not able to control the transit time.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Returns', 'dawp'),
            'body'    => '<p>' . sprintf(
                /* translators: %s: return & refund policy link */
                wp_kses_post(__('If you need to send an item back, our %s explains the 30-day return window, the condition requirements, who pays return shipping, and how and when refunds are issued.', 'dawp')),
                '<a href="' . esc_url(home_url('/return-refund-policy/')) . '">' . esc_html__('Return & Refund Policy', 'dawp') . '</a>'
            ) . '</p>',
        ],
    ],
]);
