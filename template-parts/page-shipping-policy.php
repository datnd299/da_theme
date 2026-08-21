<?php
/**
 * Service & Warranty — shipping, delivery, warranty, and the service programme.
 * Served at /service-warranty/.
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
                <span><?php esc_html_e('Service & Warranty', 'dawp'); ?></span>
            </nav>
            <span class="c-rule" aria-hidden="true"></span>
            <p class="c-eyebrow"><?php esc_html_e('Ownership', 'dawp'); ?></p>
            <h1><?php esc_html_e('Shipping, Service & Warranty', 'dawp'); ?></h1>
            <p><?php esc_html_e('How your watch reaches you, what is covered, and what happens every five to seven years for the rest of its life.', 'dawp'); ?></p>
        </div>
    </div>
</section>

<section class="c-policy-body">
    <div class="container-narrow">

        <section>
            <h2><?php esc_html_e('1. Where we ship', 'dawp'); ?></h2>
            <p><?php esc_html_e('CHRONEL ships within the United States, including Alaska, Hawaii, and APO/FPO addresses. We do not currently ship internationally. If an address cannot be served by our insured carrier, you will be told at checkout before payment is taken.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('2. Cost and insurance', 'dawp'); ?></h2>
            <p><?php esc_html_e('Shipping is complimentary on every order, with no minimum. Every shipment is insured for its full value and requires an adult signature on delivery. We do not offer unsigned or unattended delivery for watches.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('3. Preparation and transit times', 'dawp'); ?></h2>
            <ul>
                <li><?php esc_html_e('In-stock watches: prepared in 1 to 3 business days, then 2 to 5 business days in transit.', 'dawp'); ?></li>
                <li><?php esc_html_e('Bracelet sizing to a supplied wrist measurement: add 1 business day.', 'dawp'); ?></li>
                <li><?php esc_html_e('Case-back engraving: add 3 to 5 business days.', 'dawp'); ?></li>
                <li><?php esc_html_e('Bespoke commissions: approximately twelve weeks from the agreed specification.', 'dawp'); ?></li>
            </ul>
            <p><?php esc_html_e('Orders placed after 3:00 PM PST begin preparation on the next business day. We do not prepare or dispatch orders on weekends or public holidays.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('4. Tracking', 'dawp'); ?></h2>
            <p><?php
                printf(
                    /* translators: %s: link to the track order page */
                    esc_html__('A dispatch email with a tracking link is sent the moment your watch leaves the atelier. You can also follow it on the %s using your order number and the email used at checkout.', 'dawp'),
                    '<a href="' . esc_url(home_url('/track-order/')) . '">' . esc_html__('Track Your Order page', 'dawp') . '</a>'
                );
            ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('5. Delays, loss, and damage in transit', 'dawp'); ?></h2>
            <p><?php esc_html_e('Because every shipment is insured, a lost or damaged parcel is our problem to solve, not yours. Contact client care within 30 days of the expected delivery date with your order number. We open a claim with the carrier and arrange a replacement or a full refund without waiting for the claim to close.', 'dawp'); ?></p>
            <p><?php esc_html_e('If a parcel is marked delivered but is not with you, tell us within 7 days so the carrier investigation can begin while the record is still available.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('6. What arrives with the watch', 'dawp'); ?></h2>
            <ul>
                <li><?php esc_html_e('The watch, sized as requested, in its presentation case.', 'dawp'); ?></li>
                <li><?php esc_html_e('A certificate carrying the individual serial number and the date of assembly.', 'dawp'); ?></li>
                <li><?php esc_html_e('A service record booklet for future entries.', 'dawp'); ?></li>
                <li><?php esc_html_e('A bracelet sizing tool and every link removed during sizing.', 'dawp'); ?></li>
            </ul>
        </section>

        <section>
            <h2><?php esc_html_e('7. The five-year warranty', 'dawp'); ?></h2>
            <p><?php esc_html_e('Every CHRONEL movement is covered for five years from the delivery date against defects in materials and workmanship. If a covered fault appears, we repair or replace the movement and cover shipping in both directions.', 'dawp'); ?></p>
            <p><?php esc_html_e('The warranty does not cover:', 'dawp'); ?></p>
            <ul>
                <li><?php esc_html_e('Normal wear to the case, crystal, bracelet, or clasp.', 'dawp'); ?></li>
                <li><?php esc_html_e('Accidental damage, impact, or misuse.', 'dawp'); ?></li>
                <li><?php esc_html_e('Water ingress where the recommended gasket service has not been carried out.', 'dawp'); ?></li>
                <li><?php esc_html_e('Any work carried out by a watchmaker other than CHRONEL.', 'dawp'); ?></li>
                <li><?php esc_html_e('Loss or theft.', 'dawp'); ?></li>
            </ul>
            <p><?php esc_html_e('The warranty is attached to the serial number, not to the buyer, and transfers with the watch.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('8. The lifetime service programme', 'dawp'); ?></h2>
            <p><?php esc_html_e('For as long as you own the watch, we service it at cost. We recommend a full service every five to seven years. A full service means the movement is disassembled, cleaned, lubricated, reassembled, and regulated in five positions; the gaskets are replaced; and the case is pressure tested and refinished.', 'dawp'); ?></p>
            <p><?php esc_html_e('Because every serial is recorded with its full component list, we can service a CHRONEL correctly decades after it was built. Turnaround is typically four to six weeks. You are quoted before any work begins.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('9. Water resistance', 'dawp'); ?></h2>
            <p><?php esc_html_e('The Meridian, The Sovereign, and The Aviator are rated to 100 metres. The Abyss is rated to 200 metres with a screw-down crown. These ratings assume intact gaskets and a fully closed crown. Water resistance is not permanent; have it tested at each service, and always before swimming or diving.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('10. Arranging service or a warranty claim', 'dawp'); ?></h2>
            <p><?php
                printf(
                    /* translators: 1: support email link, 2: contact page link */
                    esc_html__('Write to %1$s or use the %2$s with your serial number and a description of the fault. Do not send a watch to us without a service authorisation; unauthorised parcels cannot be insured on arrival.', 'dawp'),
                    '<a href="mailto:' . esc_attr($dawp_support_email) . '">' . esc_html($dawp_support_email) . '</a>',
                    '<a href="' . esc_url(home_url('/contact-us/')) . '">' . esc_html__('Contact page', 'dawp') . '</a>'
                );
            ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('11. Returns', 'dawp'); ?></h2>
            <p><?php
                printf(
                    /* translators: %s: link to the returns page */
                    esc_html__('Returns and refunds are covered separately. See the %s for the 30-day window and the condition required.', 'dawp'),
                    '<a href="' . esc_url(home_url('/returns/')) . '">' . esc_html__('Returns policy', 'dawp') . '</a>'
                );
            ?></p>
        </section>
    </div>
</section>
