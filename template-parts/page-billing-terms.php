<?php
/**
 * Billing terms & conditions page for US Watch Store.
 *
 * Hallmark · genre: modern-minimal · macrostructure: Long Document (continuous
 * prose sections, no per-section card boxes)
 * nav: N12 · footer: Ft1 · design-system: .plans/design_system.md (locked)
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email     = 'support@uswatchstore.com';
$last_updated      = __('August 21, 2026', 'dawp');
$terms_url         = home_url('/terms-of-service/');
$privacy_url       = home_url('/privacy-policy/');
$contact_url       = home_url('/contact-us/');

$billing_highlights = [
    [
        'title' => __('Secure Payment Processing', 'dawp'),
        'copy'  => __('Payments are handled by PCI-DSS-compliant third-party payment providers. US Watch Store does not store full card numbers on its own systems.', 'dawp'),
    ],
    [
        'title' => __('Charged at Checkout', 'dawp'),
        'copy'  => __('Your payment method is charged when your order is placed, not when it ships.', 'dawp'),
    ],
    [
        'title' => __('Clear, Itemized Totals', 'dawp'),
        'copy'  => __('Order subtotal, shipping, and tax are itemized at checkout before you confirm payment. Shipping is always $0.', 'dawp'),
    ],
];

$sections = [
    [
        'title' => __('1. Accepted Payment Methods', 'dawp'),
        'copy'  => [
            __('US Watch Store accepts Visa, Mastercard, American Express, and PayPal at checkout. Available payment methods may vary by order or location.', 'dawp'),
            __('Card payments are processed through PCI-DSS-compliant payment processors using SSL/TLS encryption; PayPal transactions are processed under PayPal\'s own security terms. We do not accept cash, check, money order, or cryptocurrency.', 'dawp'),
        ],
    ],
    [
        'title' => __('2. When You Are Charged', 'dawp'),
        'copy'  => [
            __('Your payment method is authorized and charged at the time your order is placed, not when it ships. If an order cannot be fulfilled, eligible amounts are refunded to the original payment method.', 'dawp'),
        ],
    ],
    [
        'title' => __('3. Currency', 'dawp'),
        'copy'  => [
            __('All prices are displayed and charged in US Dollars (USD). If your card is issued in a different currency, your bank or card network may apply its own conversion rate and any associated foreign transaction fee; US Watch Store has no control over and does not receive any portion of such fees.', 'dawp'),
        ],
    ],
    [
        'title' => __('4. Pricing and Price Changes', 'dawp'),
        'copy'  => [
            __('Product prices are shown on the website and may change without notice. The price charged is the price displayed at the time your order is placed and confirmed at checkout; price changes made after an order is placed do not apply retroactively to that order.', 'dawp'),
        ],
    ],
    [
        'title' => __('5. Sales Tax', 'dawp'),
        'copy'  => [
            __('Applicable sales tax is calculated at checkout based on your shipping address and applicable state and local law, and is displayed as a separate line item before you confirm payment. US Watch Store collects and remits sales tax in states where required by law.', 'dawp'),
        ],
    ],
    [
        'title' => __('6. Shipping Costs', 'dawp'),
        'copy'  => [
            __('Shipping is free on all orders; no separate shipping fee is added at checkout, regardless of order size or destination within the United States.', 'dawp'),
        ],
    ],
    [
        'title' => __('7. Billing Accuracy and Authorization', 'dawp'),
        'copy'  => [
            __('You are responsible for providing accurate billing name, address, and payment details. By submitting payment information, you represent that you are authorized to use the selected payment method.', 'dawp'),
            __('US Watch Store is not responsible for delays or declined payments caused by incorrect or outdated billing information.', 'dawp'),
        ],
    ],
    [
        'title' => __('8. Order Confirmation and Receipts', 'dawp'),
        'copy'  => [
            __('An emailed order confirmation serves as your receipt and includes an itemized breakdown of the charge, including subtotal, tax, and the $0 shipping charge. Keep this confirmation for your records and any future support requests.', 'dawp'),
        ],
    ],
    [
        'title' => __('9. Declined or Failed Payments', 'dawp'),
        'copy'  => [
            __('If a payment is declined or fails to process, the order will not be placed. Please verify your payment details or contact your card issuer, then try again or use another payment method.', 'dawp'),
        ],
    ],
    [
        'title' => __('10. Refunds to Original Payment Method', 'dawp'),
        'copy'  => [
            __('Approved refunds, including eligible returns, warranty resolutions, and cancellations, are issued to the original payment method used at checkout. Processing times vary by bank or card issuer, typically 5-10 business days after a refund is submitted. See our Return & Refund Policy for full return and warranty terms.', 'dawp'),
        ],
    ],
    [
        'title' => __('11. Billing Disputes and Chargebacks', 'dawp'),
        'copy'  => [
            __('If you believe you were billed in error, contact support before filing a chargeback with your bank so we can review and resolve the issue directly. Unrecognized charges should be reported to support@uswatchstore.com with your order number.', 'dawp'),
            __('Filing a chargeback for a charge that was properly authorized, rather than contacting support first, may delay resolution and affect your ability to place future orders.', 'dawp'),
        ],
    ],
    [
        'title' => __('12. No Recurring Charges or Subscriptions', 'dawp'),
        'copy'  => [
            __('US Watch Store sells watches as one-time purchases. We do not enroll customers in subscriptions, membership programs, or recurring billing of any kind. Every charge on your statement corresponds to a specific order you placed.', 'dawp'),
        ],
    ],
    [
        'title' => __('13. Promotional Codes and Discounts', 'dawp'),
        'copy'  => [
            __('Discount codes and promotions are subject to the terms stated at the time of the offer, must be applied at checkout before payment is submitted, and cannot be applied retroactively to a completed order. Promotions cannot be combined unless explicitly stated.', 'dawp'),
        ],
    ],
    [
        'title' => __('14. Changes to These Terms', 'dawp'),
        'copy'  => [
            __('We may update these Billing Terms & Conditions from time to time. Updated terms will be posted on this page with a revised "Last Updated" date and apply to orders placed after posting.', 'dawp'),
        ],
    ],
];
?>

<div class="bg-background text-foreground">
    <section class="bg-surface py-14 sm:py-20" aria-labelledby="billing-terms-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:items-end">
                <div>
                    <div class="flex flex-wrap items-center gap-3">
                        <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-accent-blush"><?php esc_html_e('Billing Terms & Conditions', 'dawp'); ?></p>
                        <span class="inline-flex items-center rounded-sm border border-border bg-background px-2.5 py-1 text-xs font-semibold uppercase tracking-[0.08em] text-muted">
                            <?php echo esc_html(sprintf(__('Last Updated: %s', 'dawp'), $last_updated)); ?>
                        </span>
                    </div>
                    <h1 id="billing-terms-title" class="mt-4 font-heading text-4xl font-extrabold leading-tight text-foreground sm:text-5xl">
                        <?php esc_html_e('How payment and billing work at checkout.', 'dawp'); ?>
                    </h1>
                    <p class="mt-5 max-w-2xl text-base leading-8 text-foreground-muted">
                        <?php esc_html_e('These terms explain accepted payment methods, when your card is charged, pricing and taxes, and how billing disputes are handled at US Watch Store.', 'dawp'); ?>
                    </p>
                </div>

                <div class="grid gap-4 md:grid-cols-3 lg:grid-cols-1 xl:grid-cols-3">
                    <?php foreach ($billing_highlights as $highlight) : ?>
                        <article class="rounded-md border border-border bg-background p-5 shadow-card">
                            <h2 class="font-heading text-lg font-extrabold text-foreground"><?php echo esc_html($highlight['title']); ?></h2>
                            <p class="mt-3 text-sm leading-6 text-foreground-muted"><?php echo esc_html($highlight['copy']); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Long Document: continuous prose, inline section heads, no card boxes -->
    <section class="bg-background py-16 sm:py-24" aria-labelledby="billing-terms-content-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.7fr_1.3fr] lg:px-8">
            <aside class="lg:sticky lg:top-24 lg:self-start">
                <div class="rounded-md border border-border bg-surface p-6">
                    <h2 id="billing-terms-content-title" class="font-heading text-xl font-extrabold text-foreground"><?php esc_html_e('Related policies', 'dawp'); ?></h2>
                    <p class="mt-4 text-sm leading-7 text-foreground-muted">
                        <?php esc_html_e('Billing works alongside our general store terms and privacy practices. Review them if you have questions beyond payment and checkout.', 'dawp'); ?>
                    </p>
                    <div class="mt-6 grid gap-3">
                        <a href="<?php echo esc_url($terms_url); ?>" class="inline-flex min-h-12 items-center justify-center whitespace-nowrap rounded-sm bg-accent px-5 text-sm font-bold text-white transition hover:bg-accent-hover">
                            <?php esc_html_e('Terms of Service', 'dawp'); ?>
                        </a>
                        <a href="<?php echo esc_url($privacy_url); ?>" class="inline-flex min-h-12 items-center justify-center whitespace-nowrap rounded-sm border border-accent bg-background px-5 text-sm font-bold text-accent-hover transition hover:bg-surface-alt">
                            <?php esc_html_e('Privacy Policy', 'dawp'); ?>
                        </a>
                    </div>
                </div>
            </aside>

            <div class="max-w-[65ch] divide-y divide-border">
                <?php foreach ($sections as $section) : ?>
                    <article class="py-7 first:pt-0">
                        <h2 class="font-heading text-xl font-extrabold text-foreground"><?php echo esc_html($section['title']); ?></h2>
                        <div class="mt-4 space-y-4 text-base leading-7 text-foreground-muted">
                            <?php foreach ($section['copy'] as $paragraph) : ?>
                                <p><?php echo esc_html($paragraph); ?></p>
                            <?php endforeach; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-surface py-14 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-md border border-border bg-background p-6 sm:p-8">
                <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <h2 class="font-heading text-2xl font-extrabold text-foreground"><?php esc_html_e('Questions about a charge?', 'dawp'); ?></h2>
                        <p class="mt-3 text-sm leading-7 text-foreground-muted">
                            <?php
                            echo wp_kses(
                                sprintf(
                                    /* translators: support email */
                                    __('Email %s and include your order number so we can look into it quickly.', 'dawp'),
                                    '<a class="font-bold text-accent-hover underline decoration-accent/40 underline-offset-4 transition hover:text-foreground" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>'
                                ),
                                [
                                    'a' => [
                                        'class' => [],
                                        'href'  => [],
                                    ],
                                ]
                            );
                            ?>
                        </p>
                    </div>
                    <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center whitespace-nowrap rounded-sm bg-foreground px-6 text-sm font-bold text-white transition hover:bg-accent-hover">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
