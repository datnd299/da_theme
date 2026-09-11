<?php
/**
 * Billing Terms & Conditions- Watchfavor.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

dawp_render_legal([
    'title'   => __('Billing Terms & Conditions', 'dawp'),
    'updated' => __('September 11, 2026', 'dawp'),
    'intro'   => __('How payments are processed, charged and secured when you purchase from Watchfavor. All checkout payments on this site are handled by PayPal.', 'dawp'),
    'sections' => [
        [
            'heading' => __('Accepted Payment Methods', 'dawp'),
            'body'    => '<p>' . esc_html__('We accept payment exclusively through PayPal at checkout. Through PayPal you can pay using:', 'dawp') . '</p>'
                . '<ul>'
                . '<li>' . esc_html__('Your PayPal balance or a linked bank account', 'dawp') . '</li>'
                . '<li>' . esc_html__('Visa, Mastercard, American Express, and Discover credit or debit cards, via PayPal Guest Checkout- you do not need a PayPal account to pay by card', 'dawp') . '</li>'
                . '</ul>'
                . '<p>' . esc_html__('All transactions are encrypted and processed on PayPal\'s PCI-DSS compliant systems. Watchfavor never receives or stores your full card number, CVV, or bank account details.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Currency', 'dawp'),
            'body'    => '<p>' . esc_html__('All prices on this site are listed and charged in US Dollars (USD). If your PayPal account or card is denominated in a different currency, PayPal will convert the charge using its own exchange rate and may apply a currency conversion fee, in accordance with PayPal\'s terms.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Order Confirmation & When You Are Charged', 'dawp'),
            'body'    => '<p>' . esc_html__('When you complete checkout through PayPal, your payment method is authorized and charged in full at the time the order is placed, not at the time of shipment. You will receive an order confirmation email from Watchfavor and a separate payment receipt from PayPal.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Payment Security', 'dawp'),
            'body'    => '<p>' . esc_html__('Payment pages are served over encrypted (SSL/TLS) connections. Because PayPal handles the entire payment step, your sensitive card and bank information is entered directly into PayPal\'s secure environment and is protected by PayPal\'s fraud monitoring and PCI-DSS Level 1 certified infrastructure.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Billing Descriptor', 'dawp'),
            'body'    => '<p>' . esc_html__('Charges will appear on your PayPal account and card or bank statement referencing PayPal along with our store name (for example, "PAYPAL *WATCHFAVOR"). If you do not recognize a charge, please contact us before disputing it with PayPal or your bank so we can help resolve it quickly.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Sales Tax', 'dawp'),
            'body'    => '<p>' . esc_html__('Applicable US sales tax, if any, is calculated at checkout based on your shipping address and the tax requirements of that state and locality, and is included in the total charged through PayPal.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Pricing & Payment Errors', 'dawp'),
            'body'    => '<p>' . esc_html__('If a product is listed at an incorrect price or a payment is processed in error, we will contact you and either cancel the order with a full refund through PayPal, or confirm whether you would like to proceed at the correct price.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Declined or Failed Payments', 'dawp'),
            'body'    => '<p>' . esc_html__('If PayPal declines or is unable to process your payment, your order will not be placed and no charge will be made. Please check your PayPal account, card details, or available balance, or try an alternate payment method within PayPal, and contact your bank or PayPal support if the issue continues.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Fraud Prevention & Order Verification', 'dawp'),
            'body'    => '<p>' . esc_html__('Orders may be screened by PayPal and by Watchfavor for fraud risk. We reserve the right to cancel or delay an order, request additional verification, or refund the payment in full if it cannot be verified or is flagged as high risk.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Refunds', 'dawp'),
            'body'    => '<p>' . sprintf(
                wp_kses_post(__('Approved refunds are always issued back through PayPal to your original payment method. Full details on refund eligibility and timing are in our <a href="%s">Return & Refund Policy</a>.', 'dawp')),
                esc_url(home_url('/return-refund-policy/'))
            ) . '</p>',
        ],
        [
            'heading' => __('Billing Questions', 'dawp'),
            'body'    => '<p>' . sprintf(
                wp_kses_post(__('If you have a question about a charge, receipt, or your PayPal transaction, <a href="%s">contact us</a> with your order number and we will respond within 1 business day.', 'dawp')),
                esc_url(home_url('/contact-us/?topic=billing'))
            ) . '</p>',
        ],
    ],
]);
