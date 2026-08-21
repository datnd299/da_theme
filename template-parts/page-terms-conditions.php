<?php
/**
 * Terms & Conditions.
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
                <span><?php esc_html_e('Terms & Conditions', 'dawp'); ?></span>
            </nav>
            <span class="c-rule" aria-hidden="true"></span>
            <p class="c-eyebrow"><?php esc_html_e('Legal', 'dawp'); ?></p>
            <h1><?php esc_html_e('Terms & Conditions', 'dawp'); ?></h1>
            <p><?php esc_html_e('The terms on which we sell watches and you use this site.', 'dawp'); ?></p>
        </div>
    </div>
</section>

<section class="c-policy-body">
    <div class="container-narrow">

        <section>
            <h2><?php esc_html_e('1. These terms', 'dawp'); ?></h2>
            <p><?php esc_html_e('By placing an order or using this site you accept these terms. If you do not accept them, please do not order. We may update them; the version in force is the one published when your order is accepted.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('2. When an order is accepted', 'dawp'); ?></h2>
            <p><?php esc_html_e('Adding a watch to the cart and paying is an offer to buy. A contract exists only when we send an order confirmation to the email address used at checkout. Until then, no contract has been formed.', 'dawp'); ?></p>
            <p><?php esc_html_e('We may decline or cancel an order where a watch is no longer available, a price or description was published in error, payment cannot be verified, fraud is suspected, or we cannot deliver to the address given. Where a paid order is cancelled by us, the full amount is refunded to the original payment method.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('3. Prices and payment', 'dawp'); ?></h2>
            <p><?php esc_html_e('Prices are shown in US dollars and exclude sales tax, which is calculated at checkout where applicable. Payment is taken in full at checkout for in-stock watches. Bespoke commissions are invoiced half on agreement and half before dispatch.', 'dawp'); ?></p>
            <p><?php esc_html_e('If a watch is listed at an obviously incorrect price, we will contact you before doing anything else and give you the choice of paying the correct price or cancelling with a full refund.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('4. Product description', 'dawp'); ?></h2>
            <p><?php esc_html_e('We describe every watch as accurately as we can: case material and size, movement, crystal, water resistance, and the origin of each principal component. Illustrations are drawn to represent the design and cannot reproduce metal finishing or dial colour exactly, which also vary with your screen.', 'dawp'); ?></p>
            <p><?php esc_html_e('Because watches are finished by hand, small variations between individual pieces are normal and are not defects.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('5. Bespoke commissions', 'dawp'); ?></h2>
            <p><?php esc_html_e('A commission proceeds only once the written specification and the quotation are agreed by both sides. Two rounds of revision are included at the drawing stage. After the build begins, changes may not be possible and may be chargeable.', 'dawp'); ?></p>
            <p><?php esc_html_e('Lead times are estimates given in good faith. A commissioned watch cannot be returned for a change of mind, but the warranty and service programme apply in full.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('6. Delivery and risk', 'dawp'); ?></h2>
            <p><?php
                printf(
                    /* translators: %s: link to the service and warranty page */
                    esc_html__('Delivery is complimentary, insured, and requires an adult signature. Risk passes to you on delivery. Full details are set out in %s.', 'dawp'),
                    '<a href="' . esc_url(home_url('/service-warranty/')) . '">' . esc_html__('Service & Warranty', 'dawp') . '</a>'
                );
            ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('7. Returns and warranty', 'dawp'); ?></h2>
            <p><?php
                printf(
                    /* translators: 1: returns page link, 2: service page link */
                    esc_html__('Returns are governed by our %1$s. Warranty and servicing are governed by %2$s. Nothing in these terms limits your statutory rights.', 'dawp'),
                    '<a href="' . esc_url(home_url('/returns/')) . '">' . esc_html__('Returns policy', 'dawp') . '</a>',
                    '<a href="' . esc_url(home_url('/service-warranty/')) . '">' . esc_html__('Service & Warranty', 'dawp') . '</a>'
                );
            ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('8. Accounts', 'dawp'); ?></h2>
            <p><?php esc_html_e('You are responsible for keeping your account credentials secure and for activity carried out through your account. Tell us at once if you believe it has been used without your permission. We may suspend an account used for fraud or abuse.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('9. Intellectual property', 'dawp'); ?></h2>
            <p><?php esc_html_e('The CHRONEL name, marks, designs, illustrations, photographs, and text on this site belong to us and may not be reproduced, distributed, or used commercially without written permission. Buying a watch does not transfer any rights in the design.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('10. Acceptable use', 'dawp'); ?></h2>
            <p><?php esc_html_e('Do not attempt to disrupt the site, gain unauthorised access to any system, scrape it at scale, or place orders you do not intend to pay for. We may refuse service where this occurs.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('11. Liability', 'dawp'); ?></h2>
            <p><?php esc_html_e('To the extent permitted by law, our total liability arising from an order is limited to the amount you paid for it. We are not liable for indirect or consequential loss. We do not exclude liability for death or personal injury caused by our negligence, for fraud, or for anything else that cannot lawfully be excluded.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('12. Events outside our control', 'dawp'); ?></h2>
            <p><?php esc_html_e('We are not responsible for delay or failure caused by events beyond our reasonable control, including carrier disruption, supplier failure, natural events, or government action. If such an event materially delays your order, we will tell you and you may cancel for a full refund.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('13. Governing law', 'dawp'); ?></h2>
            <p><?php esc_html_e('These terms are governed by the laws of the United States and of the state in which CHRONEL is established, without regard to conflict of law rules. Disputes are subject to the courts of that state.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('14. Contact', 'dawp'); ?></h2>
            <p><?php
                printf(
                    /* translators: %s: support email link */
                    esc_html__('Questions about these terms go to %s.', 'dawp'),
                    '<a href="mailto:' . esc_attr($dawp_support_email) . '">' . esc_html($dawp_support_email) . '</a>'
                );
            ?></p>
        </section>
    </div>
</section>
