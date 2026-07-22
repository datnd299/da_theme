<?php
if (!defined('ABSPATH')) { exit; }
$policy_title = __('Shipping Policy', 'dawp');
$policy_intro = __('This policy explains how GraphicShirt prepares, ships, and supports orders delivered within the United States.', 'dawp');
$policy_updated = __('July 22, 2026', 'dawp');
$policy_sections = [
    ['title' => __('1. Order Processing', 'dawp'), 'copy' => [__('Most orders are made to order and require 2-4 business days for production and quality checks before shipment. Weekends and US holidays are not business days. High-volume periods or complex products may require additional time.', 'dawp')]],
    ['title' => __('2. Shipping Time and Charges', 'dawp'), 'copy' => [__('Standard US delivery typically takes 5-10 business days after dispatch. The available method, estimated delivery window, and shipping charge are displayed at checkout before payment.', 'dawp'), __('Delivery dates are estimates, not guarantees. Weather, carrier disruptions, holidays, peak demand, and remote destinations may affect transit times.', 'dawp')]],
    ['title' => __('3. Tracking', 'dawp'), 'copy' => [__('A shipping confirmation with tracking information is emailed when your order leaves the fulfillment facility. Tracking may take 24-48 hours to show movement after the carrier receives the parcel.', 'dawp')]],
    ['title' => __('4. Address Changes and Delivery', 'dawp'), 'copy' => [__('Customers are responsible for entering a complete and accurate shipping address. Contact us immediately if a correction is needed; once production or shipment begins, we may be unable to change or cancel the order.', 'dawp'), __('GraphicShirt is not responsible for delays or losses caused by an incorrect address. If a parcel is returned to sender, reshipping charges may apply.', 'dawp')]],
    ['title' => __('5. Lost, Stolen, or Delayed Packages', 'dawp'), 'copy' => [__('If tracking shows no movement beyond the expected window, contact us with your order number so we can assist with a carrier inquiry. If tracking shows delivered, first check the property, household members, neighbors, and the carrier. Report unresolved delivery issues promptly.', 'dawp')]],
    ['title' => __('6. Multiple Shipments and International Orders', 'dawp'), 'copy' => [__('Items in one order may ship separately because products can be fulfilled at different facilities. You will receive tracking for each available shipment.', 'dawp'), __('Unless international delivery is expressly offered at checkout, our published times apply only to US addresses. International customers are responsible for any customs duties, taxes, or import fees displayed or assessed by their country.', 'dawp')]],
];
require locate_template('template-parts/page-policy-layout.php');
