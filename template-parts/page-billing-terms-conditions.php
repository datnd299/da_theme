<?php
/**
 * Billing Terms & Conditions — North Time Co.
 *
 * Hardcoded policy content covering payment methods, currency, when and how
 * customers are charged, the billing descriptor, taxes, pricing accuracy,
 * order acceptance, and chargebacks — the billing disclosures payment
 * providers and Google Merchant Center expect a store to publish. Kept
 * consistent with the Terms of Service, Shipping Policy, and Return & Refund
 * Policy.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$email = function_exists('dawp_store_email') ? dawp_store_email() : 'support@northtimeco.com';
$store = function_exists('dawp_store_name') ? dawp_store_name() : 'North Time Co.';
$host  = wp_parse_url(home_url(), PHP_URL_HOST);
$descriptor = strtoupper(preg_replace('/^www\./', '', (string) $host)) ?: 'NORTHTIMECO.COM';

dawp_render_legal([
    'title'   => __('Billing Terms & Conditions', 'dawp'),
    'updated' => __('September 4, 2026', 'dawp'),
    'intro'   => __('These Billing Terms & Conditions describe how payments are processed on this website. They apply to every order and should be read together with our Terms of Service, Shipping Policy, and Return & Refund Policy.', 'dawp'),
    'sections' => [
        [
            'heading' => __('Accepted payment methods', 'dawp'),
            'body'    => '<p>' . esc_html__('All payments on this website are processed securely through PayPal. At checkout you can:', 'dawp') . '</p><ul>'
                . '<li>' . esc_html__('pay with your PayPal balance or linked bank account; or', 'dawp') . '</li>'
                . '<li>' . esc_html__('pay by Visa, Mastercard, or American Express credit or debit card through PayPal, without creating a PayPal account.', 'dawp') . '</li>'
                . '</ul><p>' . esc_html__('You do not need a PayPal account to complete an order. We do not accept checks, money orders, wire transfers, cash on delivery, or cryptocurrency.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Currency', 'dawp'),
            'body'    => '<p>' . esc_html__('All prices on this website are listed and charged in United States Dollars (USD). If your card is denominated in another currency, your bank sets the exchange rate and may add a foreign transaction fee; both are outside our control.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('When you are charged', 'dawp'),
            'body'    => '<p>' . esc_html__('By placing an order you authorize us to charge your chosen payment method for the full order total — the item price plus any applicable shipping and sales tax — at the time the order is submitted. If a payment authorization later fails or is reversed, the order will not be dispatched.', 'dawp') . '</p>'
                . '<p>' . esc_html__('All purchases are one-time transactions. We do not operate subscriptions and will never charge your payment method on a recurring basis.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Billing descriptor', 'dawp'),
            'body'    => '<p>' . sprintf(
                /* translators: 1: store name, 2: statement descriptor */
                esc_html__('Because payments are processed by PayPal, charges from this website usually appear on your card or account statement as "PAYPAL *%2$s" or "%1$s". If you see a charge you do not recognize, please contact us before disputing it with your bank so we can identify the order quickly.', 'dawp'),
                esc_html($store),
                esc_html($descriptor)
            ) . '</p>',
        ],
        [
            'heading' => __('Sales tax', 'dawp'),
            'body'    => '<p>' . esc_html__('Sales tax is calculated at checkout based on the shipping address and the current state and local tax rates. The tax amount is shown before you confirm payment and is included in the total charged.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Pricing accuracy and errors', 'dawp'),
            'body'    => '<p>' . esc_html__('We take care to price and describe every product accurately. If an item is listed at an incorrect price or with incorrect information because of a technical or human error, we reserve the right to cancel the order and refund you in full, whether or not the order has been confirmed. We will contact you before taking that step.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Order confirmation and acceptance', 'dawp'),
            'body'    => '<p>' . esc_html__('The confirmation email you receive after checkout acknowledges that we have received your order; it is not acceptance of the order. A contract of sale is formed only when we dispatch the item. Until then, we may decline or limit an order for reasons including stock availability, a suspected pricing error, a failed payment or address verification, or a suspected fraudulent or resale order.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Payment security and fraud screening', 'dawp'),
            'body'    => '<p>' . esc_html__('Payments are processed by PayPal, a PCI-DSS compliant provider, over an encrypted connection. Your card details are entered on PayPal and are never received or stored by us. Orders may be screened for fraud, and we may ask you to verify your identity or billing details before an order is dispatched. Orders that cannot be verified are cancelled and refunded in full.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Declined or failed payments', 'dawp'),
            'body'    => '<p>' . esc_html__('If your payment is declined, the order will not be placed. Common reasons include insufficient funds, an incorrect card or billing detail, or a hold placed by your bank. Please contact your bank or try a different payment method. Any temporary authorization holds are released by your bank on its own timeline, typically within a few business days.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Discounts and promotional codes', 'dawp'),
            'body'    => '<p>' . esc_html__('Promotional codes must be entered at checkout, cannot be applied to a completed order, and cannot be combined with other codes unless we state otherwise. Each code is subject to its own start and end dates and any minimum spend or product exclusions. We may withdraw or modify a promotion at any time.', 'dawp') . '</p>',
        ],
        [
            'heading' => __('Refunds', 'dawp'),
            'body'    => '<p>' . sprintf(
                /* translators: %s: return & refund policy link */
                wp_kses_post(__('Approved refunds are always issued to the original payment method used for the order. Refund eligibility, timeframes, and who pays return shipping are set out in our %s.', 'dawp')),
                '<a href="' . esc_url(home_url('/return-refund-policy/')) . '">' . esc_html__('Return & Refund Policy', 'dawp') . '</a>'
            ) . '</p>',
        ],
        [
            'heading' => __('Chargebacks and disputes', 'dawp'),
            'body'    => '<p>' . sprintf(
                /* translators: %s: support email link */
                wp_kses_post(__('If you have a billing concern, please contact us first at %s. Most issues are resolved within 1 business day. Filing a chargeback without contacting us delays the resolution for everyone. We keep order, delivery, and communication records and will respond to disputes with that evidence.', 'dawp')),
                '<a href="mailto:' . esc_attr($email) . '">' . esc_html($email) . '</a>'
            ) . '</p>',
        ],
    ],
]);
