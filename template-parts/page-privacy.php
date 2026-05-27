<?php
/**
 * Template Part: Handcraft Shoe - Privacy Policy Page
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$store_name     = 'Handcraft Shoe';
$website_domain = 'handcraftshoe.com';
$support_email  = 'support@handcraftshoe.com';
$contact_url    = home_url( '/contact-us/' );
$terms_url      = home_url( '/terms-conditions/' );
$shipping_url   = home_url( '/shipping-policy/' );
$returns_url    = home_url( '/refund-return-policy/' );

$quick_facts = array(
    array( 'label' => 'Store', 'value' => $store_name, 'note' => 'Handmade leather footwear for everyday wear.' ),
    array( 'label' => 'Website', 'value' => $website_domain, 'note' => 'This policy applies to use of our website and store.' ),
    array( 'label' => 'Support', 'value' => $support_email, 'note' => 'Contact us with privacy questions or requests.' ),
    array( 'label' => 'Updated', 'value' => 'May 27, 2026', 'note' => 'We may update this policy when practices change.' ),
);

$nav_items = array(
    'overview'             => 'Overview',
    'information-collected'=> 'Information Collected',
    'how-we-use'           => 'How We Use Data',
    'sharing'              => 'Sharing',
    'cookies'              => 'Cookies',
    'retention-security'   => 'Retention & Security',
    'your-rights'          => 'Your Rights',
    'contact-information'  => 'Contact Information',
);
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
    .hcs-legal-layout { display: grid; grid-template-columns: 260px minmax(0, 1fr); gap: 32px; align-items: start; }
    .hcs-legal-nav { position: sticky; top: 96px; display: grid; gap: 10px; }
    .hcs-legal-nav a {
        display: block;
        padding: 14px 16px;
        border: 1px solid rgba(23,33,43,.1);
        border-radius: 16px;
        background: #fff;
        color: var(--hcs-ink);
        font-size: 14px;
        font-weight: 800;
        box-shadow: 0 10px 24px rgba(23,33,43,.05);
        text-decoration: none;
        transition: border-color .2s ease, color .2s ease, transform .2s ease;
    }
    .hcs-legal-nav a:hover { border-color: var(--hcs-pine); color: var(--hcs-pine); transform: translateY(-1px); }
    .hcs-legal-content { display: grid; gap: 22px; }
    .hcs-legal-facts { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 14px; }
    .hcs-legal-fact,
    .hcs-legal-card,
    .hcs-legal-mini {
        border: 1px solid rgba(23,33,43,.1);
        background: #fff;
        box-shadow: 0 14px 34px rgba(23,33,43,.08);
    }
    .hcs-legal-fact { padding: 22px; border-radius: 18px; }
    .hcs-legal-label {
        margin: 0 0 9px;
        color: var(--hcs-pine);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .12em;
        text-transform: uppercase;
    }
    .hcs-legal-fact strong { display: block; overflow-wrap: anywhere; color: var(--hcs-ink); font-size: 22px; line-height: 1.15; }
    .hcs-legal-fact span,
    .hcs-legal-copy { color: var(--hcs-slate); line-height: 1.75; }
    .hcs-legal-fact span { display: block; margin-top: 10px; font-size: 14px; }
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
    .hcs-legal-dark .hcs-legal-list { color: rgba(247,243,236,.78); }
    .hcs-legal-dark .hcs-legal-list li::before {
        background: var(--hcs-sage);
        box-shadow: 0 0 0 3px rgba(247,243,236,.18);
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
        .hcs-legal-nav { display: none; }
        .hcs-legal-facts { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    }
    @media (max-width: 700px) {
        .hcs-legal-hero { padding: 64px 0 38px; }
        .hcs-legal-main { padding: 36px 0 62px; }
        .hcs-legal-facts,
        .hcs-legal-grid,
        .hcs-legal-contact-grid { grid-template-columns: 1fr; }
        .hcs-legal-card,
        .hcs-legal-contact { padding: 24px; }
    }
</style>

<div class="hcs-legal">
    <section class="hcs-legal-hero">
        <div class="hcs-legal-wrap">
            <span class="hcs-legal-eyebrow"><?php esc_html_e( 'Privacy Policy', 'dawp' ); ?></span>
            <h1 class="hcs-legal-title"><?php esc_html_e( 'How we protect your shopping information.', 'dawp' ); ?></h1>
            <p class="hcs-legal-lead">
                <?php
                printf(
                    esc_html__( 'This Privacy Policy explains how %s collects, uses, shares, and protects information when you visit our website, place an order, request support, or shop handmade leather footwear.', 'dawp' ),
                    esc_html( $store_name )
                );
                ?>
            </p>
        </div>
    </section>

    <section class="hcs-legal-main">
        <div class="hcs-legal-wrap hcs-legal-layout">
            <aside class="hcs-legal-nav" aria-label="<?php esc_attr_e( 'Privacy policy sections', 'dawp' ); ?>">
                <?php foreach ( $nav_items as $section_id => $label ) : ?>
                    <a href="#<?php echo esc_attr( $section_id ); ?>"><?php echo esc_html( $label ); ?></a>
                <?php endforeach; ?>
            </aside>

            <div class="hcs-legal-content">
                <div class="hcs-legal-facts">
                    <?php foreach ( $quick_facts as $fact ) : ?>
                        <div class="hcs-legal-fact">
                            <p class="hcs-legal-label"><?php echo esc_html( $fact['label'] ); ?></p>
                            <strong><?php echo esc_html( $fact['value'] ); ?></strong>
                            <span><?php echo esc_html( $fact['note'] ); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div id="overview" class="hcs-legal-card">
                    <h2><?php esc_html_e( 'Overview', 'dawp' ); ?></h2>
                    <p class="hcs-legal-copy"><?php echo esc_html( $store_name ); ?> operates <?php echo esc_html( $website_domain ); ?>. When this policy says "we," "us," or "our," it refers to <?php echo esc_html( $store_name ); ?>.</p>
                    <p class="hcs-legal-copy"><?php esc_html_e( 'We collect information needed to operate our website, process orders, arrange shipping, provide customer support, improve our store, prevent fraud, and meet legal or compliance obligations.', 'dawp' ); ?></p>
                </div>

                <div id="information-collected" class="hcs-legal-card">
                    <h2><?php esc_html_e( 'Information We Collect', 'dawp' ); ?></h2>
                    <div class="hcs-legal-grid">
                        <div class="hcs-legal-panel">
                            <h3><?php esc_html_e( 'Order Information', 'dawp' ); ?></h3>
                            <p class="hcs-legal-copy"><?php esc_html_e( 'When you place or attempt to place an order, we may collect your name, billing address, shipping address, email address, phone number, order details, product selections, size or fit selections, and payment-related information.', 'dawp' ); ?></p>
                        </div>
                        <div class="hcs-legal-panel">
                            <h3><?php esc_html_e( 'Device Information', 'dawp' ); ?></h3>
                            <p class="hcs-legal-copy"><?php esc_html_e( 'When you visit the website, we may collect technical information such as browser type, IP address, time zone, referring pages, pages viewed, cookie identifiers, and interactions with our website.', 'dawp' ); ?></p>
                        </div>
                        <div class="hcs-legal-panel">
                            <h3><?php esc_html_e( 'Support Information', 'dawp' ); ?></h3>
                            <p class="hcs-legal-copy"><?php esc_html_e( 'When you contact us, we may collect your order number, message content, photos you provide for damaged or incorrect items, and other information needed to respond.', 'dawp' ); ?></p>
                        </div>
                        <div class="hcs-legal-panel">
                            <h3><?php esc_html_e( 'Custom Footwear Details', 'dawp' ); ?></h3>
                            <p class="hcs-legal-copy"><?php esc_html_e( 'If you order custom leather footwear, we may collect customization choices, sizing details, measurement notes, fit preferences, and production instructions needed to complete the order.', 'dawp' ); ?></p>
                        </div>
                    </div>
                </div>

                <div id="how-we-use" class="hcs-legal-card hcs-legal-dark">
                    <h2><?php esc_html_e( 'How We Use Your Information', 'dawp' ); ?></h2>
                    <div class="hcs-legal-grid">
                        <div class="hcs-legal-panel">
                            <h3><?php esc_html_e( 'Store Operations', 'dawp' ); ?></h3>
                            <ul class="hcs-legal-list">
                                <li><?php esc_html_e( 'Process payments, confirm orders, and provide receipts.', 'dawp' ); ?></li>
                                <li><?php esc_html_e( 'Prepare, pack, ship, and track your order.', 'dawp' ); ?></li>
                                <li><?php esc_html_e( 'Handle returns, exchanges, refunds, delivery issues, and support requests.', 'dawp' ); ?></li>
                                <li><?php esc_html_e( 'Communicate about product availability, custom footwear details, or order updates.', 'dawp' ); ?></li>
                            </ul>
                        </div>
                        <div class="hcs-legal-panel">
                            <h3><?php esc_html_e( 'Store Improvement & Protection', 'dawp' ); ?></h3>
                            <ul class="hcs-legal-list">
                                <li><?php esc_html_e( 'Improve website performance, navigation, product pages, and customer experience.', 'dawp' ); ?></li>
                                <li><?php esc_html_e( 'Screen orders for risk, fraud, abuse, or unauthorized activity.', 'dawp' ); ?></li>
                                <li><?php esc_html_e( 'Measure marketing performance when permitted by your settings or applicable law.', 'dawp' ); ?></li>
                                <li><?php esc_html_e( 'Comply with tax, accounting, legal, and regulatory requirements.', 'dawp' ); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div id="sharing" class="hcs-legal-card">
                    <h2><?php esc_html_e( 'Sharing Your Information', 'dawp' ); ?></h2>
                    <p class="hcs-legal-copy"><?php esc_html_e( 'We share personal information only as needed to operate our store, complete transactions, provide support, protect our business, and comply with applicable law.', 'dawp' ); ?></p>
                    <ul class="hcs-legal-list">
                        <li><?php esc_html_e( 'Payment processors and fraud prevention providers help process transactions securely.', 'dawp' ); ?></li>
                        <li><?php esc_html_e( 'Shipping carriers, fulfillment partners, and service providers help deliver orders and manage tracking.', 'dawp' ); ?></li>
                        <li><?php esc_html_e( 'Website, analytics, email, and customer support providers help operate and improve our store.', 'dawp' ); ?></li>
                        <li><?php esc_html_e( 'Legal, tax, or compliance recipients may receive information when required by law or to protect our rights.', 'dawp' ); ?></li>
                    </ul>
                </div>

                <div id="cookies" class="hcs-legal-card">
                    <h2><?php esc_html_e( 'Cookies & Similar Technologies', 'dawp' ); ?></h2>
                    <p class="hcs-legal-copy"><?php esc_html_e( 'Cookies are small files stored on your browser or device. We may use cookies and similar technologies to keep your cart working, remember preferences, understand website activity, improve performance, and help with security or fraud prevention.', 'dawp' ); ?></p>
                    <p class="hcs-legal-copy"><?php esc_html_e( 'You can manage cookies through your browser settings. Some website features, including cart and checkout functions, may not work correctly if certain cookies are disabled.', 'dawp' ); ?></p>
                </div>

                <div id="retention-security" class="hcs-legal-card">
                    <h2><?php esc_html_e( 'Data Retention & Security', 'dawp' ); ?></h2>
                    <div class="hcs-legal-grid">
                        <div class="hcs-legal-panel">
                            <h3><?php esc_html_e( 'Retention', 'dawp' ); ?></h3>
                            <p class="hcs-legal-copy"><?php esc_html_e( 'We keep order and account information for as long as needed to provide service, maintain business records, handle disputes, comply with legal obligations, and enforce our policies.', 'dawp' ); ?></p>
                        </div>
                        <div class="hcs-legal-panel">
                            <h3><?php esc_html_e( 'Security', 'dawp' ); ?></h3>
                            <p class="hcs-legal-copy"><?php esc_html_e( 'We use reasonable administrative, technical, and organizational safeguards to protect personal information. No online transmission or storage system can be guaranteed completely secure.', 'dawp' ); ?></p>
                        </div>
                    </div>
                </div>

                <div id="your-rights" class="hcs-legal-card">
                    <h2><?php esc_html_e( 'Your Privacy Rights', 'dawp' ); ?></h2>
                    <p class="hcs-legal-copy"><?php esc_html_e( 'Depending on your location, you may have the right to request access to, correction of, deletion of, or a copy of personal information we hold about you. You may also have the right to object to or restrict certain processing.', 'dawp' ); ?></p>
                    <p class="hcs-legal-copy"><?php esc_html_e( 'To submit a privacy request, contact us using the email below. We may need to verify your identity before completing the request.', 'dawp' ); ?></p>
                    <p class="hcs-legal-copy"><?php esc_html_e( 'Our website and products are intended for adults. We do not knowingly collect personal information from children under 13.', 'dawp' ); ?></p>
                </div>

                <div class="hcs-legal-card">
                    <h2><?php esc_html_e( 'Policy Changes', 'dawp' ); ?></h2>
                    <p class="hcs-legal-copy"><?php esc_html_e( 'We may update this Privacy Policy from time to time to reflect operational, legal, regulatory, or service changes. The updated date on this page shows when the policy was last revised.', 'dawp' ); ?></p>
                </div>

                <div id="contact-information" class="hcs-legal-contact">
                    <h2 class="hcs-legal-title" style="font-size:clamp(30px,3vw,42px);"><?php esc_html_e( 'Contact Information', 'dawp' ); ?></h2>
                    <dl class="hcs-legal-contact-grid">
                        <div class="hcs-legal-contact-item"><dt><?php esc_html_e( 'Store Name', 'dawp' ); ?></dt><dd><?php echo esc_html( $store_name ); ?></dd></div>
                        <div class="hcs-legal-contact-item"><dt><?php esc_html_e( 'Website', 'dawp' ); ?></dt><dd><?php echo esc_html( $website_domain ); ?></dd></div>
                        <div class="hcs-legal-contact-item"><dt><?php esc_html_e( 'Email', 'dawp' ); ?></dt><dd><a href="mailto:<?php echo esc_attr( $support_email ); ?>"><?php echo esc_html( $support_email ); ?></a></dd></div>
                        <div class="hcs-legal-contact-item"><dt><?php esc_html_e( 'Service Hours', 'dawp' ); ?></dt><dd><?php esc_html_e( 'Monday - Friday, 9:00 AM - 5:00 PM, GMT-08:00 Pacific Standard Time (Los Angeles)', 'dawp' ); ?></dd></div>
                    </dl>
                    <div class="hcs-legal-actions">
                        <a class="hcs-legal-btn hcs-legal-btn-primary" href="<?php echo esc_url( $contact_url ); ?>"><?php esc_html_e( 'Contact Support', 'dawp' ); ?></a>
                        <a class="hcs-legal-btn hcs-legal-btn-secondary" href="<?php echo esc_url( $terms_url ); ?>"><?php esc_html_e( 'Terms of Service', 'dawp' ); ?></a>
                        <a class="hcs-legal-btn hcs-legal-btn-secondary" href="<?php echo esc_url( $shipping_url ); ?>"><?php esc_html_e( 'Shipping Policy', 'dawp' ); ?></a>
                        <a class="hcs-legal-btn hcs-legal-btn-secondary" href="<?php echo esc_url( $returns_url ); ?>"><?php esc_html_e( 'Return Policy', 'dawp' ); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
