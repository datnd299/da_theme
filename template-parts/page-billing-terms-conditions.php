<?php
/**
 * Billing Terms & Conditions — YourWatchStore. Tailwind utilities only.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email = 'support@yourwatchstore.com';
$updated       = get_the_modified_date('F j, Y') ?: gmdate('F j, Y');
$store_address = function_exists('dawp_get_woocommerce_store_address') ? dawp_get_woocommerce_store_address() : '';

$sections = [
    [
        'title' => __('1. About these billing terms', 'dawp'),
        'body'  => [
            __('These Billing Terms & Conditions explain how YourWatchStore accepts payment, when your payment method is charged, and what happens if a payment fails or is disputed. They apply to every order placed on this website and form part of our Terms & Conditions. By completing checkout you accept the terms on this page.', 'dawp'),
            __('If anything here conflicts with our general Terms & Conditions on the subject of payment and billing, the terms on this page apply to that order.', 'dawp'),
        ],
    ],
    [
        'title' => __('2. Merchant of record', 'dawp'),
        'body'  => [
            __('YourWatchStore is the merchant of record for all purchases made on this website. Your order is sold to you directly by YourWatchStore, and YourWatchStore is responsible for the transaction, customer support, and any refund.', 'dawp'),
            __('The descriptor that appears on your card or bank statement will read "YourWatchStore" or a close abbreviation of it. If you see a charge you do not recognize, please check for this descriptor before contacting your bank, and email us so we can identify the order for you.', 'dawp'),
        ],
    ],
    [
        'title' => __('3. Currency', 'dawp'),
        'body'  => [
            __('All prices on this website are shown and charged in United States Dollars (USD). We do not bill in any other currency.', 'dawp'),
            __('If you pay with a card issued outside the United States or in another currency, your bank or card network sets the exchange rate and may add a foreign transaction fee. Those charges are set by your bank, not by YourWatchStore, and we cannot refund them.', 'dawp'),
        ],
    ],
    [
        'title' => __('4. Accepted payment methods', 'dawp'),
        'body'  => [
            __('We accept Visa, Mastercard, American Express, and Discover credit and debit cards, and PayPal. Additional wallet options such as Apple Pay or Google Pay may be offered at checkout depending on your device and browser.', 'dawp'),
            __('We do not accept checks, money orders, bank wire transfers, cash on delivery, cryptocurrency, or store credit from other retailers. Gift cards issued by YourWatchStore, where offered, can be applied at checkout.', 'dawp'),
            __('Only one payment method can be used per order unless a gift card or discount code is combined with a single card or PayPal balance.', 'dawp'),
        ],
    ],
    [
        'title' => __('5. When you are charged', 'dawp'),
        'body'  => [
            __('When you submit an order, an authorization hold is placed on your payment method for the full order total to confirm the funds are available and the details are valid.', 'dawp'),
            __('Your payment method is captured — that is, actually charged — when we accept the order and prepare it for dispatch, normally within 1-3 business days. In some cases capture happens at the time you place the order; either way you are charged only once per order.', 'dawp'),
            __('If we cannot accept your order, the authorization is released. The time it takes for a released authorization to disappear from your account is set by your bank and is usually 3-7 business days.', 'dawp'),
        ],
    ],
    [
        'title' => __('6. Order total, taxes, and shipping', 'dawp'),
        'body'  => [
            __('The order total shown on the final checkout screen is the amount you will be charged. It includes the price of each item, any applicable sales tax, and shipping if a paid method is selected. Standard US shipping is free.', 'dawp'),
            __('Sales tax is calculated based on the shipping address and the applicable state and local rates at the time of purchase. If the correct tax rate changes between the time you place the order and the time it is accepted, the rate shown at checkout applies.', 'dawp'),
            __('You are responsible for any duties, taxes, or fees imposed by a destination we are asked to ship to that are not calculated at checkout.', 'dawp'),
        ],
    ],
    [
        'title' => __('7. Billing information and authorization', 'dawp'),
        'body'  => [
            __('You agree to provide a current, complete, and accurate billing name, billing address, and payment details, and to keep them up to date. The billing address you enter must match the address your card issuer has on file.', 'dawp'),
            __('By submitting payment details you confirm that you are the authorized holder of the payment method or have the account holder\'s permission to use it, and you authorize YourWatchStore and its payment processors to charge the full order total to that method.', 'dawp'),
            __('Orders where the billing name, billing address, card verification, or IP location cannot be reconciled may be held for review or cancelled.', 'dawp'),
        ],
    ],
    [
        'title' => __('8. Payment processing and security', 'dawp'),
        'body'  => [
            __('Payments are processed through WooCommerce and PCI-DSS compliant third-party gateways, including our card processor and PayPal, over an encrypted (TLS) connection. Card details are transmitted directly to the payment gateway.', 'dawp'),
            __('YourWatchStore does not receive or store full card numbers, card expiry dates, or security codes on its own servers. We retain only limited information such as the card brand, the last four digits, and the authorization result, which we use for order support, refunds, and fraud prevention.', 'dawp'),
        ],
    ],
    [
        'title' => __('9. Declined or failed payments', 'dawp'),
        'body'  => [
            __('If your payment is declined, the order will not be created and no goods will be dispatched. Common reasons include insufficient funds, an expired card, an incorrect card number or security code, a billing address mismatch, or a block placed by your bank.', 'dawp'),
            __('You may see a temporary pending authorization on your account even for a declined attempt. This is released automatically by your bank, usually within a few business days. Placing the order again after a decline can create more than one temporary hold; these also clear on their own.', 'dawp'),
            __('If you believe a payment should have gone through, contact your bank first, then email us with the date, amount, and payment method used.', 'dawp'),
        ],
    ],
    [
        'title' => __('10. Pricing errors', 'dawp'),
        'body'  => [
            __('We take care to display correct prices, but errors can occur. If an item\'s correct price is higher than the price shown when you ordered, we will contact you before dispatch to ask whether you want to proceed at the correct price or cancel for a full refund.', 'dawp'),
            __('If an order is accepted and charged at an obviously incorrect price caused by a typographical or system error, we may cancel the order and refund the amount paid in full.', 'dawp'),
        ],
    ],
    [
        'title' => __('11. Discount codes, gift cards, and store credit', 'dawp'),
        'body'  => [
            __('Discount codes must be entered at checkout to apply; they cannot be added to an order after it is placed. Unless stated otherwise, only one discount code may be used per order, codes have no cash value, and they cannot be applied to taxes or shipping.', 'dawp'),
            __('Where a gift card or store credit is used, it is applied before any remaining balance is charged to your card or PayPal. If an order paid partly with a gift card is refunded, the gift card portion is returned as store credit and the remainder to the original payment method.', 'dawp'),
        ],
    ],
    [
        'title' => __('12. Refunds', 'dawp'),
        'body'  => [
            __('Approved refunds are issued to the original payment method used for the order. We do not refund to a different card, account, or person. Refund eligibility and timing are set out in our Refund & Return Policy.', 'dawp'),
            __('Once we process a refund, the time it takes to appear on your statement is controlled by your bank or PayPal, and is typically 5-10 business days. Original shipping was free, so no shipping charge is refunded.', 'dawp'),
        ],
    ],
    [
        'title' => __('13. Chargebacks and payment disputes', 'dawp'),
        'body'  => [
            __('If you have a problem with a charge or an order, please contact us first. Most issues — a delivery delay, a damaged item, an unexpected charge — can be resolved quickly and directly.', 'dawp'),
            __('Opening a chargeback or dispute with your bank without contacting us prevents us from helping and freezes the funds while the bank investigates. If a chargeback is filed, we will respond with the order records, delivery tracking, and these terms. Filing a chargeback for an order you received and kept, or in place of following our returns process, is treated as a fraudulent claim, and we reserve the right to recover the disputed amount and any fees and to refuse future orders.', 'dawp'),
        ],
    ],
    [
        'title' => __('14. Fraud prevention', 'dawp'),
        'body'  => [
            __('All orders are screened for fraud. We may verify your identity, ask for additional confirmation, place an order on hold, limit quantities, or cancel and refund an order where we reasonably suspect unauthorized card use, resale, or other misuse. We are not liable for any loss you claim results from a cancellation made on these grounds.', 'dawp'),
        ],
    ],
    [
        'title' => __('15. Changes to these terms', 'dawp'),
        'body'  => [
            __('We may update these Billing Terms & Conditions at any time. The version published on this page when you place your order governs that order. Material changes will be reflected in the "last updated" date below.', 'dawp'),
        ],
    ],
];
?>

<div class="bg-background text-foreground">
    <section class="border-b border-border">
        <div class="mx-auto max-w-3xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
            <p class="text-xs font-bold uppercase tracking-[0.16em] text-accent-blush"><?php esc_html_e('Policies', 'dawp'); ?></p>
            <h1 class="mt-4 font-heading text-4xl font-extrabold leading-tight tracking-tight text-foreground sm:text-5xl"><?php esc_html_e('Billing Terms & Conditions', 'dawp'); ?></h1>
            <p class="mt-5 text-base leading-7 text-foreground-muted"><?php esc_html_e('How YourWatchStore accepts payment, when your card is charged, and what happens if a payment fails or is disputed.', 'dawp'); ?></p>
            <p class="mt-3 text-sm text-muted"><?php printf(esc_html__('Last updated: %s', 'dawp'), esc_html($updated)); ?></p>
        </div>
    </section>

    <section class="mx-auto max-w-3xl px-4 py-14 sm:px-6 lg:px-8 lg:py-16">
        <div class="space-y-10">
            <?php foreach ($sections as $section) : ?>
                <div>
                    <h2 class="font-heading text-xl font-bold text-foreground sm:text-2xl"><?php echo esc_html($section['title']); ?></h2>
                    <?php foreach ($section['body'] as $paragraph) : ?>
                        <p class="mt-3 text-base leading-7 text-foreground-muted"><?php echo esc_html($paragraph); ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>

            <div class="rounded-md border border-border bg-surface-alt p-6">
                <h2 class="font-heading text-lg font-bold text-foreground"><?php esc_html_e('Questions about a charge?', 'dawp'); ?></h2>
                <p class="mt-2 text-sm leading-6 text-foreground-muted">
                    <?php
                    printf(
                        wp_kses(__('Email <a class="font-semibold text-accent-blush underline underline-offset-2" href="mailto:%1$s">%1$s</a> with your order number and we will reply within one business day.', 'dawp'), ['a' => ['class' => [], 'href' => []]]),
                        esc_attr($support_email)
                    );
                    ?>
                    <?php if ($store_address) : ?><br><?php printf(esc_html__('Business address: %s', 'dawp'), esc_html($store_address)); ?><?php endif; ?>
                </p>
            </div>
        </div>
    </section>
</div>
