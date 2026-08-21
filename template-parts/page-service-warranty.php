<?php
/**
 * Service & Warranty — warranty coverage and the lifetime service programme.
 * Served at /service-warranty/.
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
                <span><?php esc_html_e('Service & Warranty', 'dawp'); ?></span>
            </nav>
            <span class="c-rule" aria-hidden="true"></span>
            <p class="c-eyebrow"><?php esc_html_e('Ownership', 'dawp'); ?></p>
            <h1><?php esc_html_e('Service & Warranty', 'dawp'); ?></h1>
            <p><?php esc_html_e('What is covered, and what happens every five to seven years for the rest of the watch\'s life.', 'dawp'); ?></p>
            <p class="c-policy-updated"><?php esc_html_e('Last updated: August 21, 2026', 'dawp'); ?></p>
        </div>
    </div>
</section>

<section class="c-policy-body">
    <div class="container-narrow">

        <section>
            <h2><?php esc_html_e('1. The five-year warranty', 'dawp'); ?></h2>
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
            <h2><?php esc_html_e('2. The lifetime service programme', 'dawp'); ?></h2>
            <p><?php esc_html_e('For as long as you own the watch, we service it at cost. We recommend a full service every five to seven years. A full service means the movement is disassembled, cleaned, lubricated, reassembled, and regulated in five positions; the gaskets are replaced; and the case is pressure tested and refinished.', 'dawp'); ?></p>
            <p><?php esc_html_e('Because every serial is recorded with its full component list, we can service a CHRONEL correctly decades after it was built. Turnaround is typically four to six weeks. You are quoted before any work begins.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('3. Water resistance', 'dawp'); ?></h2>
            <p><?php esc_html_e('The Meridian, The Sovereign, and The Aviator are rated to 100 metres. The Abyss is rated to 200 metres with a screw-down crown. These ratings assume intact gaskets and a fully closed crown. Water resistance is not permanent; have it tested at each service, and always before swimming or diving.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('4. Arranging service or a warranty claim', 'dawp'); ?></h2>
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
            <h2><?php esc_html_e('5. Shipping and returns', 'dawp'); ?></h2>
            <p><?php
                printf(
                    /* translators: 1: shipping policy link, 2: returns page link */
                    esc_html__('Delivery times and insured shipping are covered in our %1$s. Returns and refunds are covered separately in our %2$s.', 'dawp'),
                    '<a href="' . esc_url(home_url('/shipping-policy/')) . '">' . esc_html__('Shipping Policy', 'dawp') . '</a>',
                    '<a href="' . esc_url(home_url('/returns/')) . '">' . esc_html__('Return & Refund Policy', 'dawp') . '</a>'
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
