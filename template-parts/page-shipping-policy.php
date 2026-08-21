<?php
/**
 * Shipping Policy. Served at /shipping-policy/.
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
                <span><?php esc_html_e('Shipping Policy', 'dawp'); ?></span>
            </nav>
            <span class="c-rule" aria-hidden="true"></span>
            <p class="c-eyebrow"><?php esc_html_e('Client care', 'dawp'); ?></p>
            <h1><?php esc_html_e('Shipping Policy', 'dawp'); ?></h1>
            <p><?php esc_html_e('When your order is placed, when it ships, and when it arrives.', 'dawp'); ?></p>
            <p class="c-policy-updated"><?php esc_html_e('Last updated: August 21, 2026', 'dawp'); ?></p>
        </div>
    </div>
</section>

<section class="c-policy-body">
    <div class="container-narrow">

        <section>
            <h2><?php esc_html_e('1. Order cutoff time', 'dawp'); ?></h2>
            <p><?php
                printf(
                    /* translators: %s: order cutoff time */
                    esc_html__('Orders placed before %s, Monday to Friday, begin processing the same business day. An order placed after that time, or on a weekend or public holiday, begins processing the next business day. Nothing is lost by ordering after the cutoff — your order keeps its place in line.', 'dawp'),
                    esc_html(dawp_brand('order_cutoff'))
                );
            ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('2. Order handling time', 'dawp'); ?></h2>
            <p><?php
                printf(
                    /* translators: %s: handling time */
                    esc_html__('Handling takes %s, Monday to Friday. This covers three steps: assembly, quality check, and packing. Weekends and public holidays are not business days and do not count toward handling time.', 'dawp'),
                    esc_html(dawp_brand('handling_time'))
                );
            ?></p>
            <p><?php esc_html_e('Bracelet sizing to a supplied wrist measurement, or case-back engraving, is carried out during handling and may extend it. The revised estimate is shown at checkout and in your order confirmation.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('3. Transit time', 'dawp'); ?></h2>
            <p><?php
                printf(
                    /* translators: %s: transit time */
                    esc_html__('Once dispatched, transit takes %s, Monday to Friday, within the United States.', 'dawp'),
                    esc_html(dawp_brand('transit_time'))
                );
            ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('4. Total estimated delivery time', 'dawp'); ?></h2>
            <p><?php
                printf(
                    /* translators: %s: total delivery estimate */
                    esc_html__('Handling plus transit comes to %s from order confirmation to delivery, for in-stock watches shipped within the United States. This is an estimate, not a guarantee — carrier delays are covered in section 8.', 'dawp'),
                    esc_html(dawp_brand('delivery_estimate'))
                );
            ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('5. Where we ship', 'dawp'); ?></h2>
            <p><?php esc_html_e('CHRONEL ships within the United States, including Alaska, Hawaii, and APO/FPO addresses. We do not currently ship internationally. If an address cannot be served by our insured carrier, you will be told at checkout before payment is taken.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('6. Cost and insurance', 'dawp'); ?></h2>
            <p><?php esc_html_e('Shipping is complimentary on every order, with no minimum. Every shipment is insured for its full value and requires an adult signature on delivery. We do not offer unsigned or unattended delivery for watches.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('7. Tracking', 'dawp'); ?></h2>
            <p><?php
                printf(
                    /* translators: %s: link to the track order page */
                    esc_html__('A dispatch email with a tracking link is sent the moment your watch leaves the atelier. You can also follow it on the %s using your order number and the email used at checkout.', 'dawp'),
                    '<a href="' . esc_url(home_url('/track-order/')) . '">' . esc_html__('Track Your Order page', 'dawp') . '</a>'
                );
            ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('8. Delays, loss, and damage in transit', 'dawp'); ?></h2>
            <p><?php esc_html_e('Because every shipment is insured, a lost or damaged parcel is our problem to solve, not yours. Contact client care within 30 days of the expected delivery date with your order number. We open a claim with the carrier and arrange a replacement or a full refund without waiting for the claim to close.', 'dawp'); ?></p>
            <p><?php esc_html_e('If a parcel is marked delivered but is not with you, tell us within 7 days so the carrier investigation can begin while the record is still available.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('9. Changing a delivery address', 'dawp'); ?></h2>
            <p><?php esc_html_e('Contact client care as soon as possible if an address needs to change. We can update it only while the order is still in handling. Once a watch has been handed to the carrier, an address change must be arranged directly with the carrier and may not be possible.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('10. What arrives with the watch', 'dawp'); ?></h2>
            <ul>
                <li><?php esc_html_e('The watch, sized as requested, in its presentation case.', 'dawp'); ?></li>
                <li><?php esc_html_e('A certificate carrying the individual serial number and the date of assembly.', 'dawp'); ?></li>
                <li><?php esc_html_e('A service record booklet for future entries.', 'dawp'); ?></li>
                <li><?php esc_html_e('A bracelet sizing tool and every link removed during sizing.', 'dawp'); ?></li>
            </ul>
        </section>

        <section>
            <h2><?php esc_html_e('11. Warranty, service, and returns', 'dawp'); ?></h2>
            <p><?php
                printf(
                    /* translators: 1: service and warranty page link, 2: returns page link */
                    esc_html__('Movement warranty and the lifetime service programme are covered in %1$s. Returns and refunds are covered in %2$s.', 'dawp'),
                    '<a href="' . esc_url(home_url('/service-warranty/')) . '">' . esc_html__('Service & Warranty', 'dawp') . '</a>',
                    '<a href="' . esc_url(home_url('/returns/')) . '">' . esc_html__('Return & Refund Policy', 'dawp') . '</a>'
                );
            ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('12. Questions', 'dawp'); ?></h2>
            <p><?php
                printf(
                    /* translators: 1: support email link, 2: contact page link */
                    esc_html__('Write to %1$s or use the %2$s with your order number.', 'dawp'),
                    '<a href="mailto:' . esc_attr($dawp_support_email) . '">' . esc_html($dawp_support_email) . '</a>',
                    '<a href="' . esc_url(home_url('/contact-us/')) . '">' . esc_html__('Contact page', 'dawp') . '</a>'
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
