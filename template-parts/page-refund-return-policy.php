<?php
/**
 * Returns & Refunds. Served at /returns/.
 */

defined('ABSPATH') || exit;

$dawp_support_email = dawp_brand('support_email');
?>

<section class="c-policy-hero">
    <div class="container">
        <div class="c-policy-hero__inner">
            <nav class="c-policy-breadcrumb" aria-label="<?php esc_attr_e('Breadcrumb', 'dawp'); ?>">
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'dawp'); ?></a>
                <span aria-hidden="true">/</span>
                <span><?php esc_html_e('Returns', 'dawp'); ?></span>
            </nav>
            <span class="c-rule" aria-hidden="true"></span>
            <p class="c-eyebrow"><?php esc_html_e('Client care', 'dawp'); ?></p>
            <h1><?php esc_html_e('Returns & Refunds', 'dawp'); ?></h1>
            <p><?php esc_html_e('Thirty days to decide. Unworn, complete, and in its original condition.', 'dawp'); ?></p>
        </div>
    </div>
</section>

<section class="c-policy-body">
    <div class="container-narrow">

        <section>
            <h2><?php esc_html_e('1. The return window', 'dawp'); ?></h2>
            <p><?php esc_html_e('You may return an eligible watch within 30 days of delivery. The request must be made within that window; the watch itself must then reach us within 14 days of the return authorisation being issued.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('2. Condition required', 'dawp'); ?></h2>
            <p><?php esc_html_e('A returned watch must be unworn and complete. That means:', 'dawp'); ?></p>
            <ul>
                <li><?php esc_html_e('No scratches or marks on the case, crystal, bracelet, or clasp.', 'dawp'); ?></li>
                <li><?php esc_html_e('Protective films still in place where they were fitted.', 'dawp'); ?></li>
                <li><?php esc_html_e('Presentation case, certificate, service booklet, and sizing tool included.', 'dawp'); ?></li>
                <li><?php esc_html_e('Every link removed during sizing returned with the watch.', 'dawp'); ?></li>
            </ul>
            <p><?php esc_html_e('A bracelet that has been sized is not a problem — that is a service we carried out. Wear to the case or crystal is, because it cannot be undone.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('3. What cannot be returned', 'dawp'); ?></h2>
            <ul>
                <li><?php esc_html_e('Bespoke commissions, which are made for one person to an agreed specification.', 'dawp'); ?></li>
                <li><?php esc_html_e('Watches with case-back engraving carried out at your request.', 'dawp'); ?></li>
                <li><?php esc_html_e('Gift cards.', 'dawp'); ?></li>
                <li><?php esc_html_e('Watches worn, damaged, or altered after delivery.', 'dawp'); ?></li>
            </ul>
            <p><?php esc_html_e('These exclusions do not apply where a watch arrives faulty, damaged, or not as described. In that case your rights are unaffected, whatever the item.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('4. How to start a return', 'dawp'); ?></h2>
            <ol>
                <li><?php
                    printf(
                        /* translators: 1: support email link, 2: contact page link */
                        esc_html__('Write to %1$s or use the %2$s within 30 days of delivery.', 'dawp'),
                        '<a href="mailto:' . esc_attr($dawp_support_email) . '">' . esc_html($dawp_support_email) . '</a>',
                        '<a href="' . esc_url(home_url('/contact-us/')) . '">' . esc_html__('Contact page', 'dawp') . '</a>'
                    );
                ?></li>
                <li><?php esc_html_e('Include your order number, the serial number, and the reason for the return. Add photographs if the watch is faulty or damaged.', 'dawp'); ?></li>
                <li><?php esc_html_e('We issue a return authorisation and an insured shipping label within one business day.', 'dawp'); ?></li>
                <li><?php esc_html_e('Pack the watch in its original presentation case and outer box, and hand it to the carrier.', 'dawp'); ?></li>
            </ol>
            <p><?php esc_html_e('Do not send a watch back without an authorisation. Unauthorised parcels cannot be insured on arrival and may be refused.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('5. Who pays for return shipping', 'dawp'); ?></h2>
            <ul>
                <li><?php esc_html_e('Faulty, damaged, incorrect, or not as described: we cover return shipping and insurance in full.', 'dawp'); ?></li>
                <li><?php esc_html_e('Change of mind, including wrong size or wrong colour: return shipping and insurance are yours, and the cost of the label may be deducted from the refund.', 'dawp'); ?></li>
            </ul>
            <p><?php esc_html_e('We do not charge restocking fees.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('6. Inspection and refund', 'dawp'); ?></h2>
            <p><?php esc_html_e('A returned watch is inspected by a watchmaker within two business days of arrival. If it meets the condition above, the refund is issued to the original payment method within seven business days. Your bank may take a further few days to post the credit.', 'dawp'); ?></p>
            <p><?php esc_html_e('If a watch does not meet the condition required, we photograph the issue, explain it, and offer either a partial refund or return of the watch at our cost. Nothing is decided without telling you first.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('7. Exchanges', 'dawp'); ?></h2>
            <p><?php esc_html_e('We do not process direct exchanges. To change reference or size, return the original watch for a refund and place a new order. If the new order is placed before the return arrives, we hold the watch for you at no charge.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('8. Cancelling before dispatch', 'dawp'); ?></h2>
            <p><?php esc_html_e('An order can be cancelled at no cost any time before it enters final inspection. Once a watch has been sized, engraved, or handed to the carrier, the return process above applies instead.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('9. Faults after the return window', 'dawp'); ?></h2>
            <p><?php
                printf(
                    /* translators: %s: link to the service and warranty page */
                    esc_html__('A fault that appears after 30 days is handled under the five-year movement warranty rather than as a return. See %s.', 'dawp'),
                    '<a href="' . esc_url(home_url('/service-warranty/')) . '">' . esc_html__('Service & Warranty', 'dawp') . '</a>'
                );
            ?></p>
        </section>
    </div>
</section>
