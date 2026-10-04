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
            <p><?php esc_html_e('Every watch bought from CHRONEL is covered for five years from the delivery date against defects in materials and workmanship of the movement. If a covered fault appears, we repair or replace the movement and cover shipping in both directions.', 'dawp'); ?></p>
            <p><?php esc_html_e('The warranty does not cover:', 'dawp'); ?></p>
            <ul>
                <li><?php esc_html_e('Normal wear to the case, crystal, bracelet, or clasp.', 'dawp'); ?></li>
                <li><?php esc_html_e('Accidental damage, impact, or misuse.', 'dawp'); ?></li>
                <li><?php esc_html_e('Water ingress where the recommended gasket service has not been carried out.', 'dawp'); ?></li>
                <li><?php esc_html_e('Repairs or alterations made by anyone other than CHRONEL or the watch\'s maker.', 'dawp'); ?></li>
                <li><?php esc_html_e('Loss or theft.', 'dawp'); ?></li>
            </ul>
            <p><?php esc_html_e('The warranty is attached to the watch, not to the buyer, and transfers with it. Keep your order confirmation as proof of purchase.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('2. The lifetime service programme', 'dawp'); ?></h2>
            <p><?php esc_html_e('For as long as you own the watch, we service it at cost. We recommend a full service every five to seven years. A full service means the movement is cleaned, lubricated, and adjusted, or the battery replaced on a quartz watch; the gaskets are replaced; and water resistance is tested.', 'dawp'); ?></p>
            <p><?php esc_html_e('Turnaround is typically four to six weeks. You are quoted before any work begins.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('3. Water resistance', 'dawp'); ?></h2>
            <p><?php esc_html_e('Water resistance varies by model and is stated on each product page. Ratings assume intact gaskets and a fully closed crown. Water resistance is not permanent; have it tested at each service, and always before swimming or diving.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('4. Arranging service or a warranty claim', 'dawp'); ?></h2>
            <p><?php
                printf(
                    /* translators: 1: support email link, 2: contact page link */
                    esc_html__('Write to %1$s or use the %2$s with your order number and a description of the fault. Do not send a watch to us without a service authorisation; unauthorised parcels cannot be insured on arrival.', 'dawp'),
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
