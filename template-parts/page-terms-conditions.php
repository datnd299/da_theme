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
$contact_url    = home_url( '/contact-us/' );
$privacy_url    = home_url( '/privacy-policy/' );
$shipping_url   = home_url( '/shipping-policy/' );
$returns_url    = home_url( '/refund-return-policy/' );

$quick_facts = array(
    array( 'label' => 'Store', 'value' => $store_name, 'note' => 'Handmade leather shoes, sandals, boots, and custom footwear.' ),
    array( 'label' => 'Website', 'value' => $website_domain, 'note' => 'These terms apply to website use and purchases.' ),
    array( 'label' => 'Support', 'value' => $support_email, 'note' => 'Contact us with order or policy questions.' ),
    array( 'label' => 'Updated', 'value' => 'May 27, 2026', 'note' => 'Terms may be updated when our store changes.' ),
);

$nav_items = array(
    'overview'            => 'Overview',
    'store-terms'         => 'Store Terms',
    'products-orders'     => 'Products & Orders',
    'shipping-returns'    => 'Shipping & Returns',
    'site-content'        => 'Site Content',
    'prohibited-uses'     => 'Prohibited Uses',
    'liability'           => 'Liability',
    'contact-information' => 'Contact Information',
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
            <span class="hcs-legal-eyebrow"><?php esc_html_e( 'Terms of Service', 'dawp' ); ?></span>
            <h1 class="hcs-legal-title"><?php esc_html_e( 'Terms for using Handcraft Shoe.', 'dawp' ); ?></h1>
            <p class="hcs-legal-lead">
                <?php
                printf(
                    esc_html__( 'Please read these Terms of Service carefully before using %1$s or purchasing handmade leather footwear from %2$s.', 'dawp' ),
                    esc_html( $website_domain ),
                    esc_html( $store_name )
                );
                ?>
            </p>
        </div>
    </section>

    <section class="hcs-legal-main">
        <div class="hcs-legal-wrap hcs-legal-layout">
            <aside class="hcs-legal-nav" aria-label="<?php esc_attr_e( 'Terms of service sections', 'dawp' ); ?>">
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
                    <h2><?php esc_html_e( '1. Overview', 'dawp' ); ?></h2>
                    <p class="hcs-legal-copy"><?php echo esc_html( $store_name ); ?> operates <?php echo esc_html( $website_domain ); ?>. Throughout these Terms, "we," "us," and "our" refer to <?php echo esc_html( $store_name ); ?>.</p>
                    <p class="hcs-legal-copy"><?php esc_html_e( 'By visiting our website, browsing products, creating an account, contacting support, or placing an order, you agree to these Terms of Service and to the policies referenced on this page.', 'dawp' ); ?></p>
                    <p class="hcs-legal-copy"><?php esc_html_e( 'If you do not agree with these Terms, you should not use the website or purchase products from our store.', 'dawp' ); ?></p>
                </div>

                <div id="store-terms" class="hcs-legal-card">
                    <h2><?php esc_html_e( '2. Online Store Terms', 'dawp' ); ?></h2>
                    <div class="hcs-legal-grid">
                        <div class="hcs-legal-panel">
                            <h3><?php esc_html_e( 'Eligibility', 'dawp' ); ?></h3>
                            <p class="hcs-legal-copy"><?php esc_html_e( 'By using our store, you represent that you are at least the age of majority in your state or place of residence, or that you have permission from a parent or legal guardian.', 'dawp' ); ?></p>
                        </div>
                        <div class="hcs-legal-panel">
                            <h3><?php esc_html_e( 'Lawful Use', 'dawp' ); ?></h3>
                            <p class="hcs-legal-copy"><?php esc_html_e( 'You may not use our website, products, or services for any unlawful, unauthorized, abusive, fraudulent, or harmful purpose.', 'dawp' ); ?></p>
                        </div>
                    </div>
                </div>

                <div id="products-orders" class="hcs-legal-card hcs-legal-dark">
                    <h2><?php esc_html_e( '3. Products, Orders & Billing', 'dawp' ); ?></h2>
                    <div class="hcs-legal-grid">
                        <div class="hcs-legal-panel">
                            <h3><?php esc_html_e( 'Product Information', 'dawp' ); ?></h3>
                            <p class="hcs-legal-copy"><?php esc_html_e( 'We work to present leather footwear product names, images, descriptions, sizes, colors, material notes, fit notes, care details, prices, and availability as accurately as possible.', 'dawp' ); ?></p>
                            <ul class="hcs-legal-list">
                                <li><?php esc_html_e( 'Natural leather character, color variation, texture, and finish may vary by item.', 'dawp' ); ?></li>
                                <li><?php esc_html_e( 'Screen settings may affect how colors appear online.', 'dawp' ); ?></li>
                                <li><?php esc_html_e( 'Material or handmade details should be reviewed on each product page before purchase.', 'dawp' ); ?></li>
                            </ul>
                        </div>
                        <div class="hcs-legal-panel">
                            <h3><?php esc_html_e( 'Orders & Payment', 'dawp' ); ?></h3>
                            <p class="hcs-legal-copy"><?php esc_html_e( 'You agree to provide current, complete, and accurate billing, shipping, contact, and account information for all purchases.', 'dawp' ); ?></p>
                            <ul class="hcs-legal-list">
                                <li><?php esc_html_e( 'We may refuse, limit, cancel, or review any order where fraud, abuse, pricing errors, inventory issues, or policy concerns are suspected.', 'dawp' ); ?></li>
                                <li><?php esc_html_e( 'If we change or cancel an order, we may contact you using the email, phone, billing address, or shipping address provided at checkout.', 'dawp' ); ?></li>
                                <li><?php esc_html_e( 'Prices, promotions, product availability, and descriptions may change without notice.', 'dawp' ); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div id="shipping-returns" class="hcs-legal-card">
                    <h2><?php esc_html_e( '4. Shipping, Returns & Custom Footwear', 'dawp' ); ?></h2>
                    <div class="hcs-legal-grid">
                        <div class="hcs-legal-panel">
                            <h3><?php esc_html_e( 'Shipping', 'dawp' ); ?></h3>
                            <p class="hcs-legal-copy"><?php esc_html_e( 'Shipping locations, order cutoff times, handling times, estimated delivery windows, carriers, tracking, and delivery issue procedures are explained in our Shipping Policy.', 'dawp' ); ?></p>
                            <div class="hcs-legal-actions">
                                <a class="hcs-legal-btn hcs-legal-btn-secondary" href="<?php echo esc_url( $shipping_url ); ?>"><?php esc_html_e( 'Shipping Policy', 'dawp' ); ?></a>
                            </div>
                        </div>
                        <div class="hcs-legal-panel">
                            <h3><?php esc_html_e( 'Returns & Exchanges', 'dawp' ); ?></h3>
                            <p class="hcs-legal-copy"><?php esc_html_e( 'Eligible returns, return costs, footwear condition requirements, refund timing, exchanges, and non-returnable items are explained in our Return & Refund Policy.', 'dawp' ); ?></p>
                            <div class="hcs-legal-actions">
                                <a class="hcs-legal-btn hcs-legal-btn-secondary" href="<?php echo esc_url( $returns_url ); ?>"><?php esc_html_e( 'Return & Refund Policy', 'dawp' ); ?></a>
                            </div>
                        </div>
                    </div>
                    <p class="hcs-legal-copy"><?php esc_html_e( 'Custom, personalized, made-to-order, or modified leather footwear may require additional production time and may have return limitations unless defective, damaged, incorrect, or required by applicable law. Please review product page details before ordering.', 'dawp' ); ?></p>
                    <p class="hcs-legal-copy"><?php esc_html_e( 'Customers are responsible for reviewing size guides, fit notes, product details, customization notes, care instructions, and return conditions before purchase.', 'dawp' ); ?></p>
                </div>

                <div id="site-content" class="hcs-legal-card">
                    <h2><?php esc_html_e( '5. Site Content, Accuracy & Third-Party Links', 'dawp' ); ?></h2>
                    <p class="hcs-legal-copy"><?php esc_html_e( 'Information on our website is provided for general shopping and product reference. We may correct errors, inaccuracies, or omissions related to product descriptions, pricing, promotions, shipping charges, transit times, or availability at any time without prior notice.', 'dawp' ); ?></p>
                    <p class="hcs-legal-copy"><?php esc_html_e( 'Our website may include links to third-party websites or tools. We are not responsible for the content, policies, services, or practices of third-party sites. Review third-party terms and privacy policies before using them.', 'dawp' ); ?></p>
                    <p class="hcs-legal-copy"><?php esc_html_e( 'All website content, including text, images, layout, graphics, and branding, is owned by or licensed to us and may not be copied, sold, reproduced, or exploited without permission.', 'dawp' ); ?></p>
                </div>

                <div class="hcs-legal-card">
                    <h2><?php esc_html_e( '6. User Comments, Feedback & Submissions', 'dawp' ); ?></h2>
                    <p class="hcs-legal-copy"><?php esc_html_e( 'If you send reviews, comments, photos, ideas, suggestions, customization notes, or other submissions, you agree that we may use them to provide service, respond to your request, improve products, and operate our store.', 'dawp' ); ?></p>
                    <p class="hcs-legal-copy"><?php esc_html_e( 'You agree that submissions must not violate any third-party rights, include unlawful material, contain malware, or be misleading, abusive, obscene, defamatory, or otherwise harmful.', 'dawp' ); ?></p>
                </div>

                <div class="hcs-legal-card">
                    <h2><?php esc_html_e( '7. Personal Information', 'dawp' ); ?></h2>
                    <p class="hcs-legal-copy">
                        <?php esc_html_e( 'Your submission of personal information through the website is governed by our', 'dawp' ); ?>
                        <a href="<?php echo esc_url( $privacy_url ); ?>"><?php esc_html_e( 'Privacy Policy', 'dawp' ); ?></a>.
                    </p>
                </div>

                <div id="prohibited-uses" class="hcs-legal-card">
                    <h2><?php esc_html_e( '8. Prohibited Uses', 'dawp' ); ?></h2>
                    <p class="hcs-legal-copy"><?php esc_html_e( 'You are prohibited from using the website, store, or content for any unlawful or harmful purpose, including:', 'dawp' ); ?></p>
                    <ul class="hcs-legal-list">
                        <li><?php esc_html_e( 'Violating laws, regulations, intellectual property rights, privacy rights, or security requirements.', 'dawp' ); ?></li>
                        <li><?php esc_html_e( 'Submitting false, misleading, abusive, harassing, discriminatory, or harmful content.', 'dawp' ); ?></li>
                        <li><?php esc_html_e( 'Uploading viruses, malware, automated scraping tools, or other code that could damage the website.', 'dawp' ); ?></li>
                        <li><?php esc_html_e( 'Attempting unauthorized access to accounts, systems, payment flows, or customer information.', 'dawp' ); ?></li>
                        <li><?php esc_html_e( 'Using our website or products for fraud, resale abuse, counterfeit activity, or other unauthorized commercial purposes.', 'dawp' ); ?></li>
                    </ul>
                    <p class="hcs-legal-copy"><?php esc_html_e( 'We may suspend or terminate access for any prohibited use or violation of these Terms.', 'dawp' ); ?></p>
                </div>

                <div id="liability" class="hcs-legal-card hcs-legal-dark">
                    <h2><?php esc_html_e( '9. Disclaimers & Limitation of Liability', 'dawp' ); ?></h2>
                    <div class="hcs-legal-grid">
                        <div class="hcs-legal-panel">
                            <h3><?php esc_html_e( 'Service Availability', 'dawp' ); ?></h3>
                            <p class="hcs-legal-copy"><?php esc_html_e( 'We do not guarantee that the website or service will be uninterrupted, timely, secure, or error-free. We may modify, suspend, or discontinue any part of the website or service at any time.', 'dawp' ); ?></p>
                        </div>
                        <div class="hcs-legal-panel">
                            <h3><?php esc_html_e( 'Liability', 'dawp' ); ?></h3>
                            <p class="hcs-legal-copy"><?php esc_html_e( 'To the fullest extent permitted by law, Handcraft Shoe and its service providers will not be liable for indirect, incidental, punitive, special, consequential, or similar damages arising from your use of the website, service, or products.', 'dawp' ); ?></p>
                        </div>
                    </div>
                </div>

                <div class="hcs-legal-card">
                    <h2><?php esc_html_e( '10. Indemnification, Severability & Termination', 'dawp' ); ?></h2>
                    <p class="hcs-legal-copy"><?php esc_html_e( 'You agree to indemnify and hold harmless Handcraft Shoe, its service providers, suppliers, and partners from claims, demands, losses, liabilities, or expenses arising from your breach of these Terms or violation of any law or third-party right.', 'dawp' ); ?></p>
                    <p class="hcs-legal-copy"><?php esc_html_e( 'If any part of these Terms is found unenforceable, the remaining provisions will remain in effect. These Terms remain effective unless terminated by you or us. Obligations and liabilities incurred before termination will survive termination where appropriate.', 'dawp' ); ?></p>
                </div>

                <div class="hcs-legal-card">
                    <h2><?php esc_html_e( '11. Governing Law & Changes To Terms', 'dawp' ); ?></h2>
                    <p class="hcs-legal-copy"><?php esc_html_e( 'These Terms and any separate agreements for services or purchases are governed by applicable United States law, without regard to conflict of law principles, unless another law is required by your location.', 'dawp' ); ?></p>
                    <p class="hcs-legal-copy"><?php esc_html_e( 'We may update, change, or replace any part of these Terms by posting updates on this page. Your continued use of the website after changes are posted means you accept the updated Terms.', 'dawp' ); ?></p>
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
                        <a class="hcs-legal-btn hcs-legal-btn-secondary" href="<?php echo esc_url( $privacy_url ); ?>"><?php esc_html_e( 'Privacy Policy', 'dawp' ); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
