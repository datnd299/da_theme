<?php
/**
 * Template Part: Handcraft Shoe - Terms & Conditions Page
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$store_name     = 'Handcraft Shoe';
$website_domain = 'handcraftshoe.com';
$support_email  = 'support@handcraftshoe.com';
$store_address  = dawp_get_store_address();
$service_hours  = 'Monday - Friday, 9:00 AM - 5:00 PM, GMT-08:00 Pacific Standard Time (Los Angeles)';
$contact_url    = home_url( '/contact-us/' );
$privacy_url    = home_url( '/privacy-policy/' );
$shipping_url   = home_url( '/shipping-policy/' );
$returns_url    = home_url( '/refund-return-policy/' );

?>

<style>
    .hcs-legal {
        --hcs-ink: #17212B;
        --hcs-pine: #2F4A43;
        --hcs-pine-deep: #243A35;
        --hcs-sage: #A7B7A5;
        --hcs-fog: #E7E8E3;
        --hcs-ivory: #F7F3EC;
        --hcs-charcoal: #202326;
        --hcs-slate: #6E7472;
        background: var(--hcs-ivory);
        color: var(--hcs-charcoal);
        font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    }
    .hcs-legal-wrap { width: min(100% - 32px, 1180px); margin: 0 auto; }
    .hcs-legal-hero {
        padding: 82px 0 48px;
        background: linear-gradient(135deg, rgba(23,33,43,.94), rgba(47,74,67,.9));
        color: #fff;
    }
    .hcs-legal-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: rgba(247,243,236,.86);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .12em;
        text-transform: uppercase;
    }
    .hcs-legal-eyebrow::before { content: ""; width: 34px; height: 1px; background: var(--hcs-sage); }
    .hcs-legal-title {
        max-width: 850px;
        margin: 14px 0 0;
        color: inherit;
        font-family: Georgia, "Times New Roman", serif;
        font-size: clamp(42px, 6vw, 72px);
        font-weight: 600;
        line-height: 1.05;
        letter-spacing: 0;
    }
    .hcs-legal-lead {
        max-width: 760px;
        margin-top: 22px;
        color: rgba(247,243,236,.78);
        font-size: 18px;
        line-height: 1.75;
    }
    .hcs-legal-main { padding: 54px 0 86px; }
    .hcs-legal-layout { display: grid; grid-template-columns: 1fr; align-items: start; }
    .hcs-legal-content { display: grid; gap: 22px; }
    .hcs-legal-card,
    .hcs-legal-mini {
        border: 1px solid rgba(23,33,43,.1);
        background: #fff;
        box-shadow: 0 14px 34px rgba(23,33,43,.08);
    }
    .hcs-legal-copy { color: var(--hcs-slate); line-height: 1.75; }
    .hcs-legal-card { padding: 34px; border-radius: 24px; }
    .hcs-legal-card h2,
    .hcs-legal-mini h2,
    .hcs-legal-panel h3 {
        margin: 0;
        color: var(--hcs-ink);
        font-family: Georgia, "Times New Roman", serif;
        font-weight: 600;
        line-height: 1.14;
    }
    .hcs-legal-card h2 { font-size: clamp(28px, 3vw, 38px); }
    .hcs-legal-mini h2 { font-size: 29px; }
    .hcs-legal-card p { margin: 14px 0 0; }
    .hcs-legal-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 18px; margin-top: 22px; }
    .hcs-legal-panel {
        padding: 24px;
        border: 1px solid rgba(23,33,43,.08);
        border-radius: 18px;
        background: var(--hcs-ivory);
    }
    .hcs-legal-panel h3 { margin-bottom: 14px; font-size: 23px; }
    .hcs-legal-list { display: grid; gap: 12px; margin: 18px 0 0; padding: 0; list-style: none; color: var(--hcs-slate); line-height: 1.6; }
    .hcs-legal-list li { position: relative; padding-left: 22px; }
    .hcs-legal-list li::before {
        content: "";
        position: absolute;
        left: 0;
        top: .6em;
        width: 8px;
        height: 8px;
        border-radius: 99px;
        background: var(--hcs-pine);
        box-shadow: 0 0 0 3px rgba(167,183,165,.28);
    }
    .hcs-legal-dark { background: var(--hcs-pine); color: #fff; border-color: rgba(23,33,43,.04); }
    .hcs-legal-dark h2,
    .hcs-legal-dark h3 { color: #fff; }
    .hcs-legal-dark .hcs-legal-copy { color: rgba(247,243,236,.78); }
    .hcs-legal-dark .hcs-legal-list { color: rgba(247,243,236,.72); }
    .hcs-legal-dark .hcs-legal-list li::before {
        background: var(--hcs-sage);
        box-shadow: 0 0 0 3px rgba(247,243,236,.16);
    }
    .hcs-legal-dark .hcs-legal-panel { background: rgba(247,243,236,.07); border-color: rgba(247,243,236,.14); }
    .hcs-legal-contact {
        padding: 32px;
        border: 1px solid rgba(47,74,67,.18);
        border-radius: 24px;
        background: var(--hcs-fog);
    }
    .hcs-legal-contact-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 14px; margin-top: 22px; }
    .hcs-legal-contact-item { padding: 18px; border: 1px solid rgba(23,33,43,.08); border-radius: 16px; background: #fff; }
    .hcs-legal-contact-item dt { margin-bottom: 7px; color: var(--hcs-pine); font-size: 12px; font-weight: 800; letter-spacing: .12em; text-transform: uppercase; }
    .hcs-legal-contact-item dd { margin: 0; color: var(--hcs-ink); font-weight: 800; line-height: 1.55; overflow-wrap: anywhere; }
    .hcs-legal-actions { display: flex; flex-wrap: wrap; gap: 12px; margin-top: 22px; }
    .hcs-legal-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 48px;
        padding: 13px 22px;
        border-radius: 999px;
        font-size: 14px;
        font-weight: 800;
        text-decoration: none;
        transition: background .2s ease, color .2s ease, border-color .2s ease, transform .2s ease;
    }
    .hcs-legal-btn:hover { transform: translateY(-1px); }
    .hcs-legal-btn-primary { background: var(--hcs-pine); border: 1px solid var(--hcs-pine); color: #fff; }
    .hcs-legal-btn-primary:hover { background: var(--hcs-pine-deep); border-color: var(--hcs-pine-deep); color: #fff; }
    .hcs-legal-btn-secondary { background: #fff; border: 1px solid var(--hcs-pine); color: var(--hcs-pine); }
    .hcs-legal-btn-secondary:hover { background: var(--hcs-ivory); color: var(--hcs-pine); }
    .hcs-legal-copy a { color: var(--hcs-pine); font-weight: 800; text-decoration: underline; text-underline-offset: 3px; }
    @media (max-width: 1023px) {
        .hcs-legal-layout { grid-template-columns: 1fr; }
    }
    @media (max-width: 700px) {
        .hcs-legal-hero { padding: 64px 0 38px; }
        .hcs-legal-main { padding: 36px 0 62px; }
        .hcs-legal-grid,
        .hcs-legal-contact-grid { grid-template-columns: 1fr; }
        .hcs-legal-card,
        .hcs-legal-contact { padding: 24px; }
    }
</style>

<div class="hcs-legal">
    <section class="hcs-legal-hero">
        <div class="hcs-legal-wrap">
            <span class="hcs-legal-eyebrow"><?php esc_html_e( 'Terms & Conditions', 'dawp' ); ?></span>
            <h1 class="hcs-legal-title"><?php esc_html_e( 'Terms for using Handcraft Shoe.', 'dawp' ); ?></h1>
            <p class="hcs-legal-lead">
                <?php
                printf(
                    esc_html__( 'Please read these Terms & Conditions carefully before using %1$s or purchasing handmade leather footwear from %2$s.', 'dawp' ),
                    esc_html( $website_domain ),
                    esc_html( $store_name )
                );
                ?>
            </p>
        </div>
    </section>

    <section class="hcs-legal-main">
        <div class="hcs-legal-wrap hcs-legal-layout">
            <div class="hcs-legal-content">
                <div id="overview" class="hcs-legal-card">
                    <h2><?php esc_html_e( 'Terms & Conditions', 'dawp' ); ?></h2>
                    <p class="hcs-legal-copy"><?php esc_html_e( 'Last updated: May 27, 2026', 'dawp' ); ?></p>
                    <p class="hcs-legal-copy">
                        <?php
                        printf(
                            esc_html__( 'Welcome to %1$s! These Terms & Conditions ("Terms") govern your access to and use of %2$s (the "Site"), including browsing our products, creating an account, interacting with our customer support, or purchasing standard and custom footwear from our online store.', 'dawp' ),
                            esc_html( $store_name ),
                            esc_html( $website_domain )
                        );
                        ?>
                    </p>
                    <p class="hcs-legal-copy"><?php esc_html_e( 'By visiting our Site or placing an order, you agree to be bound by these Terms and all policies referenced herein. If you do not agree with these Terms, you should not use the website or purchase products from our store.', 'dawp' ); ?></p>
                </div>

                <div id="store-terms" class="hcs-legal-card">
                    <h2><?php esc_html_e( '1. Online Store Terms & Eligibility', 'dawp' ); ?></h2>
                    <p class="hcs-legal-copy"><?php esc_html_e( 'By agreeing to these Terms, you represent that you are at least the age of majority in your state or country of residence, or that you have given us your consent to allow any of your minor dependents to use this Site.', 'dawp' ); ?></p>
                    <p class="hcs-legal-copy"><?php esc_html_e( 'You are strictly prohibited from using our website, products, or services for any unlawful, unauthorized, abusive, or fraudulent purpose. You must not transmit any worms, viruses, or any code of a destructive nature.', 'dawp' ); ?></p>
                </div>

                <div id="products-sizing" class="hcs-legal-card hcs-legal-dark">
                    <h2><?php esc_html_e( '2. Products, Custom Footwear, and Sizing', 'dawp' ); ?></h2>
                    <div class="hcs-legal-grid">
                        <div class="hcs-legal-panel">
                            <h3><?php esc_html_e( 'Product Information', 'dawp' ); ?></h3>
                            <p class="hcs-legal-copy"><?php esc_html_e( 'We work to present our leather footwear names, images, descriptions, sizes, colors, material notes, and care details as accurately as possible.', 'dawp' ); ?></p>
                        </div>
                        <div class="hcs-legal-panel">
                            <h3><?php esc_html_e( 'Handmade & Leather Character', 'dawp' ); ?></h3>
                            <p class="hcs-legal-copy"><?php esc_html_e( 'Because our products feature artisanal craftsmanship, natural leather characteristics, minor color variations, distinct textures, and finishes may vary slightly by individual item. Screen monitor settings may also affect how colors appear online.', 'dawp' ); ?></p>
                        </div>
                    </div>
                    <p class="hcs-legal-copy"><?php esc_html_e( 'Custom, personalized, or modified leather footwear requires additional manufacturing and production time. Due to the bespoke nature of these products, custom items have return limitations unless they arrive defective, damaged, or incorrect. Customers are strictly responsible for reviewing our size guides, fit notes, and measurement instructions before finalized custom orders.', 'dawp' ); ?></p>
                </div>

                <div id="orders-billing" class="hcs-legal-card">
                    <h2><?php esc_html_e( '3. Orders, Billing, and Secure Payment', 'dawp' ); ?></h2>
                    <div class="hcs-legal-grid">
                        <div class="hcs-legal-panel">
                            <h3><?php esc_html_e( 'Information Accuracy', 'dawp' ); ?></h3>
                            <p class="hcs-legal-copy"><?php esc_html_e( 'You agree to provide current, complete, and accurate billing, shipping, contact, and account information for all purchases made at our store.', 'dawp' ); ?></p>
                        </div>
                        <div class="hcs-legal-panel">
                            <h3><?php esc_html_e( 'Order Limitations', 'dawp' ); ?></h3>
                            <p class="hcs-legal-copy"><?php esc_html_e( 'We reserve the right to refuse, limit, or cancel any order where fraud, payment abuse, pricing errors, inventory stockouts, or policy violations are suspected. If we change or cancel an order, we will notify you via the email, billing address, or phone number provided at checkout.', 'dawp' ); ?></p>
                        </div>
                    </div>
                    <p class="hcs-legal-copy"><?php esc_html_e( 'All prices displayed on our Site are in USD. Prices, promotions, and product availability are subject to change without notice. All applicable taxes and shipping charges are calculated dynamically and displayed clearly before final payment.', 'dawp' ); ?></p>
                </div>

                <div id="shipping-returns" class="hcs-legal-card">
                    <h2><?php esc_html_e( '4. Shipping, Returns, and Store Policies', 'dawp' ); ?></h2>
                    <p class="hcs-legal-copy"><?php esc_html_e( 'Your purchases and transactions are directly bound by our dedicated store policies. Please review our specific guidelines via the active hyperlinks below:', 'dawp' ); ?></p>
                    <div class="hcs-legal-grid">
                        <div class="hcs-legal-panel">
                            <h3><?php esc_html_e( 'Shipping Guidelines', 'dawp' ); ?></h3>
                            <p class="hcs-legal-copy">
                                <?php esc_html_e( 'Shipping locations, order cutoff times, handling times, delivery windows, and tracking details are explained in our full', 'dawp' ); ?>
                                <a href="<?php echo esc_url( $shipping_url ); ?>"><?php esc_html_e( 'Shipping Policy', 'dawp' ); ?></a>.
                            </p>
                        </div>
                        <div class="hcs-legal-panel">
                            <h3><?php esc_html_e( 'Returns Conditions', 'dawp' ); ?></h3>
                            <p class="hcs-legal-copy">
                                <?php esc_html_e( 'Eligible returns, footwear condition requirements (must be unworn, undamaged, free of outdoor creasing or sole marks), and refund timelines are explained in our', 'dawp' ); ?>
                                <a href="<?php echo esc_url( $returns_url ); ?>"><?php esc_html_e( 'Return & Refund Policy', 'dawp' ); ?></a>.
                            </p>
                        </div>
                    </div>
                </div>

                <div id="prohibited-uses" class="hcs-legal-card">
                    <h2><?php esc_html_e( '5. Prohibited Uses', 'dawp' ); ?></h2>
                    <p class="hcs-legal-copy"><?php esc_html_e( 'You are strictly prohibited from using the website, store, or its content for:', 'dawp' ); ?></p>
                    <ul class="hcs-legal-list">
                        <li><?php esc_html_e( 'Violating any international, federal, or state laws, regulations, or intellectual property rights.', 'dawp' ); ?></li>
                        <li><?php esc_html_e( 'Submitting false, misleading, fraudulent, or deceptive billing and identity information.', 'dawp' ); ?></li>
                        <li><?php esc_html_e( 'Uploading viruses, malware, or utilizing automated scraping tools (bots, spiders) to harvest store content without permission.', 'dawp' ); ?></li>
                        <li><?php esc_html_e( 'Attempting unauthorized access to accounts, payment gateways, or customer database systems.', 'dawp' ); ?></li>
                    </ul>
                </div>

                <div id="intellectual" class="hcs-legal-card">
                    <h2><?php esc_html_e( '6. Intellectual Property & Site Content', 'dawp' ); ?></h2>
                    <p class="hcs-legal-copy"><?php esc_html_e( 'All website content, including text, high-resolution product photography, graphic designs, website layouts, logos, icons, and software, is owned by or licensed to Handcraft Shoe and is protected by international copyright and intellectual property laws. You may not reproduce, copy, or exploit any content without our express written permission.', 'dawp' ); ?></p>
                </div>

                <div id="liability" class="hcs-legal-card hcs-legal-dark">
                    <h2><?php esc_html_e( '7. Limitation of Liability', 'dawp' ); ?></h2>
                    <p class="hcs-legal-copy"><?php esc_html_e( 'We do not guarantee that our website service will be completely uninterrupted, timely, secure, or error-free. To the fullest extent permitted by law, Handcraft Shoe shall not be liable for any indirect, incidental, punitive, special, or consequential damages arising from website usage, shipping carrier delays, or product fitment issues.', 'dawp' ); ?></p>
                </div>

                <div id="governing-law" class="hcs-legal-card">
                    <h2><?php esc_html_e( '8. Governing Law', 'dawp' ); ?></h2>
                    <p class="hcs-legal-copy"><?php esc_html_e( 'These Terms & Conditions and any separate agreements whereby we provide you services shall be governed by, and construed in accordance with, the laws of the United States.', 'dawp' ); ?></p>
                </div>

                <div id="contact-information" class="hcs-legal-contact">
                    <h2 class="hcs-legal-title" style="font-size:clamp(30px,3vw,42px);"><?php esc_html_e( 'Contact Information', 'dawp' ); ?></h2>
                    <p class="hcs-legal-copy">
                        <?php
                        printf(
                            esc_html__( 'If you have questions, concerns, or require clarification regarding these Terms & Conditions, please contact %s directly through our official channels:', 'dawp' ),
                            esc_html( $store_name )
                        );
                        ?>
                    </p>
                    <dl class="hcs-legal-contact-grid">
                        <div class="hcs-legal-contact-item"><dt><?php esc_html_e( 'Store Name', 'dawp' ); ?></dt><dd><?php echo esc_html( $store_name ); ?></dd></div>
                        <div class="hcs-legal-contact-item"><dt><?php esc_html_e( 'Customer Support Email', 'dawp' ); ?></dt><dd><a href="mailto:<?php echo esc_attr( $support_email ); ?>"><?php echo esc_html( $support_email ); ?></a></dd></div>
                        <div class="hcs-legal-contact-item"><dt><?php esc_html_e( 'Physical Business Address', 'dawp' ); ?></dt><dd><?php echo esc_html( $store_address ); ?></dd></div>
                        <div class="hcs-legal-contact-item"><dt><?php esc_html_e( 'Service Hours', 'dawp' ); ?></dt><dd><?php echo esc_html( $service_hours ); ?></dd></div>
                        <div class="hcs-legal-contact-item"><dt><?php esc_html_e( 'Contact Page', 'dawp' ); ?></dt><dd><a href="<?php echo esc_url( $contact_url ); ?>"><?php esc_html_e( 'Contact Us', 'dawp' ); ?></a></dd></div>
                        <div class="hcs-legal-contact-item"><dt><?php esc_html_e( 'Website', 'dawp' ); ?></dt><dd><?php echo esc_html( $website_domain ); ?></dd></div>
                    </dl>
                    <div class="hcs-legal-actions">
                        <a class="hcs-legal-btn hcs-legal-btn-primary" href="<?php echo esc_url( $contact_url ); ?>"><?php esc_html_e( 'Contact Support', 'dawp' ); ?></a>
                        <a class="hcs-legal-btn hcs-legal-btn-secondary" href="<?php echo esc_url( $privacy_url ); ?>"><?php esc_html_e( 'Privacy Policy', 'dawp' ); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
