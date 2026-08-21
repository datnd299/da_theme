<?php
/**
 * Billing Terms & Conditions. Served at /billing-terms/.
 */

defined('ABSPATH') || exit;

$dawp_support_email    = dawp_brand('support_email');
$dawp_business_address = function_exists('dawp_get_woocommerce_store_address') ? dawp_get_woocommerce_store_address() : '';
?>

<section class="c-policy-hero">
    <div class="container">
        <div class="c-policy-hero__inner">
            <nav class="c-policy-breadcrumb" aria-label="<?php esc_attr_e('Breadcrumb', 'dawp'); ?>">
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'dawp'); ?></a>
                <span aria-hidden="true">/</span>
                <span><?php esc_html_e('Billing Terms & Conditions', 'dawp'); ?></span>
            </nav>
            <span class="c-rule" aria-hidden="true"></span>
            <p class="c-eyebrow"><?php esc_html_e('Legal', 'dawp'); ?></p>
            <h1><?php esc_html_e('Billing Terms & Conditions', 'dawp'); ?></h1>
            <p><?php esc_html_e('How payment is taken, in what currency, and how it is kept secure.', 'dawp'); ?></p>
            <p class="c-policy-updated"><?php esc_html_e('Last updated: August 21, 2026', 'dawp'); ?></p>
        </div>
    </div>
</section>

<section class="c-policy-body">
    <div class="container-narrow">

        <section>
            <h2><?php esc_html_e('1. Accepted payment methods', 'dawp'); ?></h2>
            <p><?php esc_html_e('All payment on this site is processed securely through PayPal. You can pay with a PayPal balance, a linked bank account, or a Visa, Mastercard, or American Express card through PayPal Checkout. A PayPal account is not required to pay by card.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('2. Currency', 'dawp'); ?></h2>
            <p><?php esc_html_e('All prices on this site are listed and charged in US dollars (USD). If your card or PayPal account is denominated in another currency, your bank or PayPal may apply its own conversion rate and fees; these are outside our control.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('3. When you are charged', 'dawp'); ?></h2>
            <p><?php esc_html_e('Payment is captured in full at the time an order is placed, before the watch enters production. We do not currently offer installment or partial payment, and we do not store or charge a card automatically for future orders.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('4. Sales tax', 'dawp'); ?></h2>
            <p><?php esc_html_e('Applicable US sales tax is calculated at checkout based on your delivery address and shown before you confirm payment. Prices displayed on product pages exclude tax.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('5. Billing and delivery information', 'dawp'); ?></h2>
            <p><?php esc_html_e('You are responsible for entering accurate billing and delivery details at checkout. We are not responsible for delay, non-delivery, or a failed payment caused by incorrect information supplied at checkout.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('6. Pricing errors', 'dawp'); ?></h2>
            <p><?php esc_html_e('If a watch is listed at an obviously incorrect price, we will contact you before doing anything else and give you the choice of paying the correct price or cancelling with a full refund. No payment is captured beyond the price you were charged at checkout without this contact.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('7. Payment security', 'dawp'); ?></h2>
            <p><?php esc_html_e('Card and bank details are entered directly into PayPal\'s secure checkout and never touch our servers. We receive confirmation of payment and, where you pay by card, the last four digits only. We never see or store your full card number.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('8. Declined or failed payments', 'dawp'); ?></h2>
            <p><?php esc_html_e('If a payment is declined or fails to complete, the order is not placed and the watch is not reserved. Try another payment method, or contact your bank or PayPal directly for the reason.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('9. Chargebacks and disputes', 'dawp'); ?></h2>
            <p><?php
                printf(
                    /* translators: %s: support email link */
                    esc_html__('If something is wrong with an order, contact client care at %s first. We resolve almost every issue directly, and quickly. Filing a chargeback or PayPal dispute before contacting us moves the case onto your bank\'s or PayPal\'s own timeline, which is usually slower than writing to us.', 'dawp'),
                    '<a href="mailto:' . esc_attr($dawp_support_email) . '">' . esc_html($dawp_support_email) . '</a>'
                );
            ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('10. Refunds', 'dawp'); ?></h2>
            <p><?php
                printf(
                    /* translators: %s: link to the return and refund policy */
                    esc_html__('Approved refunds are issued to the original PayPal account or the card used at checkout. Refund timing and eligibility are set out in our %s.', 'dawp'),
                    '<a href="' . esc_url(home_url('/returns/')) . '">' . esc_html__('Return & Refund Policy', 'dawp') . '</a>'
                );
            ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('11. Receipts', 'dawp'); ?></h2>
            <p><?php esc_html_e('An order confirmation is emailed at checkout, and PayPal issues its own payment receipt. Keep both as proof of purchase; either is accepted for a warranty or service claim.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('12. Questions', 'dawp'); ?></h2>
            <p><?php
                printf(
                    /* translators: %s: support email link */
                    esc_html__('Billing questions go to %s.', 'dawp'),
                    '<a href="mailto:' . esc_attr($dawp_support_email) . '">' . esc_html($dawp_support_email) . '</a>'
                );
            ?></p>
            <?php if ($dawp_business_address) : ?>
                <p><?php
                    printf(
                        /* translators: %s: business address */
                        esc_html__('Business address: %s.', 'dawp'),
                        esc_html($dawp_business_address)
                    );
                ?></p>
            <?php endif; ?>
        </section>
    </div>
</section>
