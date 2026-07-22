<?php
if (!defined('ABSPATH')) { exit; }
$policy_title = __('Billing Terms & Conditions', 'dawp');
$policy_intro = __('These billing terms describe pricing, payment authorization, taxes, order review, and refund handling for purchases from GraphicShirt.', 'dawp');
$policy_updated = __('July 22, 2026', 'dawp');
$policy_sections = [
    ['title' => __('1. Prices and Currency', 'dawp'), 'copy' => [__('Prices are displayed in US dollars unless checkout clearly states otherwise. Product prices, promotions, and availability may change without notice. The price confirmed at checkout applies to your order, subject to correction of obvious errors.', 'dawp')]],
    ['title' => __('2. Payment Authorization', 'dawp'), 'copy' => [__('By placing an order, you confirm that the billing information is accurate and that you are authorized to use the selected payment method. Payment is authorized or charged when the order is submitted, depending on the payment provider.', 'dawp'), __('Payments are handled by third-party processors using their security controls. GraphicShirt does not intentionally store complete card numbers on its own systems.', 'dawp')]],
    ['title' => __('3. Taxes and Shipping Charges', 'dawp'), 'copy' => [__('Applicable sales tax, shipping charges, discounts, and the final order total are shown during checkout. Customers are responsible for duties or import fees on international orders where applicable.', 'dawp')]],
    ['title' => __('4. Order Review and Cancellation', 'dawp'), 'copy' => [__('We may verify or decline an order because of failed authorization, suspected fraud, incorrect pricing, product unavailability, or incomplete billing information. If we cancel a paid order, the eligible amount will be returned to the original payment method.', 'dawp'), __('Because products may enter production soon after checkout, customer-requested cancellations are not guaranteed. Contact support immediately if you need assistance.', 'dawp')]],
    ['title' => __('5. Refunds and Billing Errors', 'dawp'), 'copy' => [__('Approved refunds are issued to the original payment method under our Return & Refund Policy. Bank processing time may delay when the credit appears.', 'dawp'), __('If you believe a charge is incorrect, contact support first with the order number and charge details so we can investigate promptly. Nothing in these terms limits rights provided by applicable law.', 'dawp')]],
];
require locate_template('template-parts/page-policy-layout.php');
