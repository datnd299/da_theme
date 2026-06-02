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
$store_address  = dawp_get_store_address();
$service_hours  = 'Monday - Friday, 9:00 AM - 5:00 PM, GMT-08:00 Pacific Standard Time (Los Angeles)';
$contact_url    = home_url( '/contact-us/' );
?>

<style>
    .hcs-privacy {
        --privacy-ink: #2a1d2d;
        --privacy-muted: #675d6d;
        --privacy-line: #e8dce7;
        --privacy-paper: #ffffff;
        --privacy-soft: #fff9fc;
        --privacy-cream: #fff7e6;
        --privacy-bg: #f5f4f7;
        background: var(--privacy-bg);
        color: var(--privacy-ink);
        font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    }
    .hcs-privacy-wrap {
        width: min(100% - 32px, 1160px);
        margin: 0 auto;
    }
    .hcs-privacy-hero {
        padding: 74px 0 24px;
    }
    .hcs-privacy-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: var(--privacy-muted);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .12em;
        text-transform: uppercase;
    }
    .hcs-privacy-eyebrow::before {
        content: "";
        width: 34px;
        height: 1px;
        background: var(--privacy-ink);
    }
    .hcs-privacy-title,
    .hcs-privacy-card h2 {
        margin: 0;
        color: var(--privacy-ink);
        font-family: Georgia, "Times New Roman", serif;
        font-weight: 600;
        line-height: 1.1;
        letter-spacing: 0;
    }
    .hcs-privacy-title {
        max-width: 850px;
        margin-top: 16px;
        font-size: clamp(42px, 6vw, 72px);
    }
    .hcs-privacy-lead {
        max-width: 850px;
        margin: 20px 0 0;
        color: var(--privacy-muted);
        font-size: 18px;
        line-height: 1.75;
    }
    .hcs-privacy-main {
        display: grid;
        gap: 22px;
        padding: 18px 0 86px;
    }
    .hcs-privacy-card {
        padding: 36px;
        border: 1px solid var(--privacy-line);
        border-radius: 20px;
        background: var(--privacy-paper);
        box-shadow: 0 16px 40px rgba(42, 29, 45, .05);
    }
    .hcs-privacy-card-soft {
        background: var(--privacy-soft);
    }
    .hcs-privacy-card h2 {
        font-size: clamp(30px, 4vw, 42px);
    }
    .hcs-privacy-copy {
        margin: 14px 0 0;
        color: var(--privacy-muted);
        font-size: 15.5px;
        line-height: 1.75;
    }
    .hcs-privacy-list {
        display: grid;
        gap: 12px;
        margin: 22px 0 0;
        padding-left: 18px;
        color: var(--privacy-muted);
        line-height: 1.7;
    }
    .hcs-privacy-list li {
        padding-left: 4px;
    }
    .hcs-privacy-list strong {
        color: var(--privacy-ink);
    }
    .hcs-privacy-contact-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 14px;
        margin-top: 24px;
        padding: 18px;
        border: 1px solid var(--privacy-line);
        border-radius: 18px;
        background: var(--privacy-paper);
    }
    .hcs-privacy-contact-item {
        padding: 18px;
        border: 1px solid var(--privacy-line);
        border-radius: 14px;
        background: #fff;
    }
    .hcs-privacy-contact-item dt {
        margin-bottom: 8px;
        color: var(--privacy-ink);
        font-size: 13px;
        font-weight: 800;
    }
    .hcs-privacy-contact-item dd {
        margin: 0;
        color: var(--privacy-muted);
        line-height: 1.65;
        overflow-wrap: anywhere;
    }
    .hcs-privacy-contact-item a {
        color: inherit;
        text-decoration: none;
    }
    .hcs-privacy-contact-item a:hover {
        color: var(--privacy-ink);
        text-decoration: underline;
        text-underline-offset: 3px;
    }
    .hcs-privacy-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
        margin-top: 28px;
    }
    .hcs-privacy-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 48px;
        padding: 13px 24px;
        border-radius: 999px;
        font-size: 14px;
        font-weight: 800;
        text-decoration: none;
        transition: background .2s ease, color .2s ease, border-color .2s ease, transform .2s ease;
    }
    .hcs-privacy-btn:hover {
        transform: translateY(-1px);
    }
    .hcs-privacy-btn-primary {
        border: 1px solid var(--privacy-ink);
        background: var(--privacy-ink);
        color: #fff;
    }
    .hcs-privacy-btn-primary:hover {
        background: #3a293e;
        color: #fff;
    }
    .hcs-privacy-btn-secondary {
        border: 1px solid var(--privacy-ink);
        background: #fff;
        color: var(--privacy-ink);
    }
    .hcs-privacy-btn-secondary:hover {
        background: var(--privacy-cream);
        color: var(--privacy-ink);
    }
    @media (max-width: 780px) {
        .hcs-privacy-hero {
            padding-top: 56px;
        }
        .hcs-privacy-card {
            padding: 24px;
        }
        .hcs-privacy-contact-grid {
            grid-template-columns: 1fr;
        }
        .hcs-privacy-btn {
            width: 100%;
        }
    }
</style>

<div class="hcs-privacy">
    <section class="hcs-privacy-hero">
        <div class="hcs-privacy-wrap">
            <span class="hcs-privacy-eyebrow"><?php esc_html_e( 'Privacy Policy', 'dawp' ); ?></span>
            <h1 class="hcs-privacy-title"><?php esc_html_e( 'Privacy Policy', 'dawp' ); ?></h1>
            <p class="hcs-privacy-lead"><?php esc_html_e( 'Last updated: May 27, 2026', 'dawp' ); ?></p>
            <p class="hcs-privacy-lead">
                <?php
                printf(
                    esc_html__( 'This Privacy Policy explains how %1$s ("we," "us," or "our") collects, uses, shares, protects, and retains your personal information when you visit %2$s (the "Site"), place an order, request custom footwear, or contact our customer support.', 'dawp' ),
                    esc_html( $store_name ),
                    esc_html( $website_domain )
                );
                ?>
            </p>
            <p class="hcs-privacy-lead"><?php esc_html_e( 'By using our Site and services, you agree to the collection and use of information in accordance with this policy.', 'dawp' ); ?></p>
        </div>
    </section>

    <main class="hcs-privacy-main hcs-privacy-wrap">
        <section class="hcs-privacy-card">
            <h2><?php esc_html_e( '1. Information We Collect', 'dawp' ); ?></h2>
            <p class="hcs-privacy-copy"><?php esc_html_e( 'To fulfill your orders and provide a premium, tailored shopping experience, we collect the following types of personal information:', 'dawp' ); ?></p>
            <ul class="hcs-privacy-list">
                <li><strong><?php esc_html_e( 'Order Information:', 'dawp' ); ?></strong> <?php esc_html_e( 'When you place or attempt to place an order, we collect your name, billing address, shipping address, email address, phone number, order details, and product selections (including shoe sizes or fit options).', 'dawp' ); ?></li>
                <li><strong><?php esc_html_e( 'Custom Footwear Details:', 'dawp' ); ?></strong> <?php esc_html_e( 'For our custom leather footwear services, we collect your specific customization choices, sizing details, feet measurement notes, fit preferences, and production instructions necessary to manufacture your bespoke items.', 'dawp' ); ?></li>
                <li><strong><?php esc_html_e( 'Device and Usage Data:', 'dawp' ); ?></strong> <?php esc_html_e( 'When you visit the Site, we automatically collect technical details such as your IP address, browser type, time zone, referring URLs, pages viewed, and data collected through cookies to ensure site functionality.', 'dawp' ); ?></li>
                <li><strong><?php esc_html_e( 'Support Information:', 'dawp' ); ?></strong> <?php esc_html_e( 'When you contact us, we collect your order number, message content, and any photos you provide (such as for measurement checks or item inquiries).', 'dawp' ); ?></li>
            </ul>
        </section>

        <section class="hcs-privacy-card hcs-privacy-card-soft">
            <h2><?php esc_html_e( '2. Secure Checkout & Data Security', 'dawp' ); ?></h2>
            <p class="hcs-privacy-copy"><?php esc_html_e( 'We take the security of your personal and financial data very seriously:', 'dawp' ); ?></p>
            <ul class="hcs-privacy-list">
                <li><strong><?php esc_html_e( 'SSL Encryption:', 'dawp' ); ?></strong> <?php esc_html_e( 'Our website utilizes Secure Sockets Layer (SSL) encryption technology to safeguard all personal data and transaction details during transmission.', 'dawp' ); ?></li>
                <li><strong><?php esc_html_e( 'Secure Payment Standards:', 'dawp' ); ?></strong> <?php esc_html_e( 'All payments are handled securely through verified third-party payment providers that comply with the Payment Card Industry Data Security Standard (PCI-DSS). We do not store or have access to your full credit card details on our servers.', 'dawp' ); ?></li>
            </ul>
        </section>

        <section class="hcs-privacy-card">
            <h2><?php esc_html_e( '3. How We Use Your Information', 'dawp' ); ?></h2>
            <p class="hcs-privacy-copy"><?php esc_html_e( 'We use your personal data for transparent and legitimate business purposes, including to:', 'dawp' ); ?></p>
            <ul class="hcs-privacy-list">
                <li><?php esc_html_e( 'Process payments, confirm transactions, and provide formal receipts.', 'dawp' ); ?></li>
                <li><?php esc_html_e( 'Prepare, pack, craft, ship, and track your custom or standard footwear orders.', 'dawp' ); ?></li>
                <li><?php esc_html_e( 'Handle returns, exchanges, refunds, and dedicated customer support requests.', 'dawp' ); ?></li>
                <li><?php esc_html_e( 'Screen orders and website activity for potential risk, fraud, abuse, or unauthorized transactions.', 'dawp' ); ?></li>
                <li><?php esc_html_e( 'Comply with statutory tax, accounting, legal, and regulatory requirements.', 'dawp' ); ?></li>
            </ul>
        </section>

        <section class="hcs-privacy-card hcs-privacy-card-soft">
            <h2><?php esc_html_e( '4. Data Sharing and Third-Party Providers', 'dawp' ); ?></h2>
            <p class="hcs-privacy-copy"><?php esc_html_e( 'We do not sell, rent, or trade your personal information to third parties for their commercial marketing purposes. We only share data with trusted service providers essential to running our store:', 'dawp' ); ?></p>
            <ul class="hcs-privacy-list">
                <li><strong><?php esc_html_e( 'Payment & Fraud Providers:', 'dawp' ); ?></strong> <?php esc_html_e( 'To ensure secure transaction processing at checkout.', 'dawp' ); ?></li>
                <li><strong><?php esc_html_e( 'Shipping & Fulfillment Partners:', 'dawp' ); ?></strong> <?php esc_html_e( 'Delivery carriers and logistics services to deliver your packages and manage tracking details.', 'dawp' ); ?></li>
                <li><strong><?php esc_html_e( 'Technology Providers:', 'dawp' ); ?></strong> <?php esc_html_e( 'Website hosting, data analytics, and email automation tools.', 'dawp' ); ?></li>
                <li><strong><?php esc_html_e( 'Legal Obligations:', 'dawp' ); ?></strong> <?php esc_html_e( 'Where required by applicable laws to protect our legal rights or respond to lawful requests.', 'dawp' ); ?></li>
            </ul>
        </section>

        <section class="hcs-privacy-card">
            <h2><?php esc_html_e( '5. Cookies and Privacy Rights', 'dawp' ); ?></h2>
            <p class="hcs-privacy-copy"><?php esc_html_e( 'We use cookies to keep your shopping cart working correctly, remember your preferences, and monitor store performance. You can manage or disable cookies through your browser settings, though doing so may affect checkout and cart functionalities.', 'dawp' ); ?></p>
            <p class="hcs-privacy-copy"><?php esc_html_e( 'Depending on your geographic location, you may have specific rights regarding your personal data, including the right to request access to, correction of, deletion of, or a copy of the personal information we hold about you. To submit a request, contact us at our support email below.', 'dawp' ); ?></p>
        </section>

        <section class="hcs-privacy-card hcs-privacy-card-soft">
            <h2><?php esc_html_e( "6. Children's Privacy", 'dawp' ); ?></h2>
            <p class="hcs-privacy-copy"><?php esc_html_e( 'Our website and custom footwear products are intended strictly for adults. We do not knowingly collect personal information from children under the age of 13.', 'dawp' ); ?></p>
        </section>

        <section class="hcs-privacy-card">
            <h2><?php esc_html_e( '7. Governing Law', 'dawp' ); ?></h2>
            <p class="hcs-privacy-copy"><?php esc_html_e( 'This Privacy Policy and any separate agreements whereby we provide you services shall be governed by, and construed in accordance with, the laws of United States', 'dawp' ); ?></p>
        </section>

        <section class="hcs-privacy-card hcs-privacy-card-soft">
            <h2><?php esc_html_e( '8. Contact Information', 'dawp' ); ?></h2>
            <p class="hcs-privacy-copy">
                <?php
                printf(
                    esc_html__( 'If you have questions, concerns, or wish to exercise your privacy rights, please contact %s through our official business channels:', 'dawp' ),
                    esc_html( $store_name )
                );
                ?>
            </p>
            <dl class="hcs-privacy-contact-grid">
                <div class="hcs-privacy-contact-item">
                    <dt><?php esc_html_e( 'Store Name', 'dawp' ); ?></dt>
                    <dd><?php echo esc_html( $store_name ); ?></dd>
                </div>
                <div class="hcs-privacy-contact-item">
                    <dt><?php esc_html_e( 'Customer Support Email', 'dawp' ); ?></dt>
                    <dd><a href="mailto:<?php echo esc_attr( $support_email ); ?>"><?php echo esc_html( $support_email ); ?></a></dd>
                </div>
                <div class="hcs-privacy-contact-item">
                    <dt><?php esc_html_e( 'Physical Business Address', 'dawp' ); ?></dt>
                    <dd><?php echo esc_html( $store_address ); ?></dd>
                </div>
                <div class="hcs-privacy-contact-item">
                    <dt><?php esc_html_e( 'Service Hours', 'dawp' ); ?></dt>
                    <dd><?php echo esc_html( $service_hours ); ?></dd>
                </div>
                <div class="hcs-privacy-contact-item">
                    <dt><?php esc_html_e( 'Contact Page', 'dawp' ); ?></dt>
                    <dd><a href="<?php echo esc_url( $contact_url ); ?>"><?php esc_html_e( 'Contact Us', 'dawp' ); ?></a></dd>
                </div>
                <div class="hcs-privacy-contact-item">
                    <dt><?php esc_html_e( 'Website', 'dawp' ); ?></dt>
                    <dd><?php echo esc_html( $website_domain ); ?></dd>
                </div>
            </dl>
            <div class="hcs-privacy-actions">
                <a class="hcs-privacy-btn hcs-privacy-btn-primary" href="<?php echo esc_url( $contact_url ); ?>"><?php esc_html_e( 'Contact Support', 'dawp' ); ?></a>
                <a class="hcs-privacy-btn hcs-privacy-btn-secondary" href="mailto:<?php echo esc_attr( $support_email ); ?>"><?php echo esc_html( $support_email ); ?></a>
            </div>
        </section>
    </main>
</div>
