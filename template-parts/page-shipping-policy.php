<?php
/**
 * Template Part: Handcraft Shoe - Shipping Policy Page
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$store_name     = 'Handcraft Shoe';
$website_domain = 'handcraftshoe.com';
$support_email  = 'support@handcraftshoe.com';
$track_url      = home_url( '/track-order/' );
$contact_url    = home_url( '/contact-us/' );
$faq_url        = home_url( '/faq/' );

$quick_facts = array(
    array( 'label' => 'Order Cutoff', 'value' => '5:00 PM', 'note' => 'GMT-08:00 Pacific Standard Time, Los Angeles' ),
    array( 'label' => 'Handling Time', 'value' => '1-2 Business Days', 'note' => 'Monday to Friday, excluding holidays.' ),
    array( 'label' => 'Transit Time', 'value' => '5-7 Business Days', 'note' => 'After processing and carrier pickup.' ),
    array( 'label' => 'Estimated Delivery', 'value' => '6-9 Business Days', 'note' => 'Some handmade or custom items may take longer.' ),
);

$nav_items = array(
    'shipping-locations'  => 'Shipping Locations',
    'order-processing'    => 'Order Processing',
    'delivery-times'      => 'Delivery Times',
    'carrier-services'    => 'Carriers & Costs',
    'tracking-packages'   => 'Tracking',
    'delivery-issues'     => 'Delivery Issues',
    'contact-information' => 'Contact Information',
);
?>

<style>
    .hcs-policy {
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
    .hcs-policy-wrap { width: min(100% - 32px, 1180px); margin: 0 auto; }
    .hcs-policy-hero {
        padding: 82px 0 48px;
        background:
            linear-gradient(135deg, rgba(23,33,43,.92), rgba(47,74,67,.9)),
            var(--hcs-ivory);
        color: #fff;
    }
    .hcs-policy-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: rgba(247,243,236,.86);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .12em;
        text-transform: uppercase;
    }
    .hcs-policy-eyebrow::before { content: ""; width: 34px; height: 1px; background: var(--hcs-sage); }
    .hcs-policy-title {
        max-width: 850px;
        margin: 14px 0 0;
        color: inherit;
        font-family: Georgia, "Times New Roman", serif;
        font-size: clamp(42px, 6vw, 72px);
        font-weight: 600;
        line-height: 1.05;
        letter-spacing: 0;
    }
    .hcs-policy-lead {
        max-width: 760px;
        margin-top: 22px;
        color: rgba(247,243,236,.78);
        font-size: 18px;
        line-height: 1.75;
    }
    .hcs-policy-main { padding: 54px 0 86px; }
    .hcs-policy-layout { display: grid; grid-template-columns: 260px minmax(0, 1fr); gap: 32px; align-items: start; }
    .hcs-policy-nav {
        position: sticky;
        top: 96px;
        display: grid;
        gap: 10px;
    }
    .hcs-policy-nav a {
        display: block;
        padding: 14px 16px;
        border: 1px solid rgba(23,33,43,.1);
        border-radius: 16px;
        background: #fff;
        color: var(--hcs-ink);
        font-size: 14px;
        font-weight: 800;
        box-shadow: 0 10px 24px rgba(23,33,43,.05);
        transition: border-color .2s ease, color .2s ease, transform .2s ease;
    }
    .hcs-policy-nav a:hover { border-color: var(--hcs-pine); color: var(--hcs-pine); transform: translateY(-1px); }
    .hcs-policy-content { display: grid; gap: 22px; }
    .hcs-policy-facts { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 14px; }
    .hcs-policy-fact,
    .hcs-policy-card,
    .hcs-policy-mini {
        border: 1px solid rgba(23,33,43,.1);
        background: #fff;
        box-shadow: 0 14px 34px rgba(23,33,43,.08);
    }
    .hcs-policy-fact { padding: 22px; border-radius: 18px; }
    .hcs-policy-label {
        margin: 0 0 9px;
        color: var(--hcs-pine);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .12em;
        text-transform: uppercase;
    }
    .hcs-policy-fact strong { display: block; color: var(--hcs-ink); font-size: 24px; line-height: 1.15; }
    .hcs-policy-fact span,
    .hcs-policy-copy { color: var(--hcs-slate); line-height: 1.75; }
    .hcs-policy-fact span { display: block; margin-top: 10px; font-size: 14px; }
    .hcs-policy-card { padding: 34px; border-radius: 24px; }
    .hcs-policy-card h2,
    .hcs-policy-mini h2,
    .hcs-policy-panel h3 {
        margin: 0;
        color: var(--hcs-ink);
        font-family: Georgia, "Times New Roman", serif;
        font-weight: 600;
        line-height: 1.14;
    }
    .hcs-policy-card h2 { font-size: clamp(28px, 3vw, 38px); }
    .hcs-policy-mini h2 { font-size: 29px; }
    .hcs-policy-card-head {
        display: grid;
        grid-template-columns: 52px minmax(0, 1fr);
        gap: 16px;
        align-items: center;
        margin-bottom: 22px;
    }
    .hcs-policy-icon {
        width: 52px;
        height: 52px;
        display: grid;
        place-items: center;
        border-radius: 16px;
        background: rgba(167,183,165,.32);
        color: var(--hcs-pine);
    }
    .hcs-policy-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 18px; margin-top: 22px; }
    .hcs-policy-panel {
        padding: 24px;
        border: 1px solid rgba(23,33,43,.08);
        border-radius: 18px;
        background: var(--hcs-ivory);
    }
    .hcs-policy-panel h3 { margin-bottom: 16px; font-size: 23px; }
    .hcs-policy-list { display: grid; gap: 12px; margin: 0; padding: 0; list-style: none; color: var(--hcs-slate); line-height: 1.6; }
    .hcs-policy-list li { position: relative; padding-left: 22px; }
    .hcs-policy-list li::before {
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
    .hcs-policy-definition { display: grid; gap: 13px; margin: 0; }
    .hcs-policy-definition div {
        display: flex;
        justify-content: space-between;
        gap: 18px;
        padding-bottom: 12px;
        border-bottom: 1px solid rgba(23,33,43,.1);
    }
    .hcs-policy-definition div:last-child { padding-bottom: 0; border-bottom: 0; }
    .hcs-policy-definition dt { color: var(--hcs-slate); }
    .hcs-policy-definition dd { margin: 0; color: var(--hcs-ink); font-weight: 800; text-align: right; }
    .hcs-policy-dark {
        background: var(--hcs-pine);
        color: #fff;
        border-color: rgba(23,33,43,.04);
    }
    .hcs-policy-dark h2,
    .hcs-policy-dark h3 { color: #fff; }
    .hcs-policy-dark .hcs-policy-panel {
        background: rgba(247,243,236,.07);
        border-color: rgba(247,243,236,.14);
    }
    .hcs-policy-dark .hcs-policy-copy { color: rgba(247,243,236,.78); }
    .hcs-policy-actions { display: flex; flex-wrap: wrap; gap: 12px; margin-top: 22px; }
    .hcs-policy-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 48px;
        padding: 13px 22px;
        border-radius: 999px;
        font-size: 14px;
        font-weight: 800;
        transition: background .2s ease, color .2s ease, border-color .2s ease, transform .2s ease;
    }
    .hcs-policy-btn:hover { transform: translateY(-1px); }
    .hcs-policy-btn-primary { background: var(--hcs-pine); border: 1px solid var(--hcs-pine); color: #fff; }
    .hcs-policy-btn-primary:hover { background: var(--hcs-pine-deep); border-color: var(--hcs-pine-deep); color: #fff; }
    .hcs-policy-dark .hcs-policy-btn-primary { background: #fff; border-color: #fff; color: var(--hcs-pine); }
    .hcs-policy-btn-secondary { background: transparent; border: 1px solid var(--hcs-pine); color: var(--hcs-pine); }
    .hcs-policy-btn-secondary:hover { background: var(--hcs-fog); color: var(--hcs-pine); }
    .hcs-policy-mini-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 18px; }
    .hcs-policy-mini { padding: 28px; border-radius: 24px; }
    .hcs-policy-mini p,
    .hcs-policy-card p { margin: 14px 0 0; }
    .hcs-policy-contact {
        padding: 32px;
        border: 1px solid rgba(47,74,67,.18);
        border-radius: 24px;
        background: var(--hcs-fog);
    }
    .hcs-policy-contact-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 14px; margin-top: 22px; }
    .hcs-policy-contact-item { padding: 18px; border: 1px solid rgba(23,33,43,.08); border-radius: 16px; background: #fff; }
    .hcs-policy-contact-item dt { margin-bottom: 7px; color: var(--hcs-pine); font-size: 12px; font-weight: 800; letter-spacing: .12em; text-transform: uppercase; }
    .hcs-policy-contact-item dd { margin: 0; color: var(--hcs-ink); font-weight: 800; line-height: 1.55; }
    .hcs-policy a { text-decoration: none; }
    .hcs-policy-copy a { color: var(--hcs-pine); font-weight: 800; text-decoration: underline; text-underline-offset: 3px; }
    @media (max-width: 1023px) {
        .hcs-policy-layout { grid-template-columns: 1fr; }
        .hcs-policy-nav { display: none; }
        .hcs-policy-facts { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    }
    @media (max-width: 700px) {
        .hcs-policy-hero { padding: 64px 0 38px; }
        .hcs-policy-main { padding: 36px 0 62px; }
        .hcs-policy-facts,
        .hcs-policy-grid,
        .hcs-policy-mini-grid,
        .hcs-policy-contact-grid { grid-template-columns: 1fr; }
        .hcs-policy-card,
        .hcs-policy-contact { padding: 24px; }
        .hcs-policy-card-head { grid-template-columns: 1fr; }
        .hcs-policy-definition div { display: grid; gap: 5px; }
        .hcs-policy-definition dd { text-align: left; }
    }
</style>

<div class="hcs-policy">
    <section class="hcs-policy-hero">
        <div class="hcs-policy-wrap">
            <span class="hcs-policy-eyebrow"><?php esc_html_e( 'Shipping Policy', 'dawp' ); ?></span>
            <h1 class="hcs-policy-title"><?php esc_html_e( 'Clear shipping details for your leather footwear order.', 'dawp' ); ?></h1>
            <p class="hcs-policy-lead">
                <?php
                printf(
                    esc_html__( 'This Shipping Policy explains where we ship, how order processing works, estimated delivery timelines, tracking, delivery issues, and how to contact %s for help.', 'dawp' ),
                    esc_html( $store_name )
                );
                ?>
            </p>
        </div>
    </section>

    <section class="hcs-policy-main">
        <div class="hcs-policy-wrap hcs-policy-layout">
            <aside class="hcs-policy-nav" aria-label="<?php esc_attr_e( 'Shipping policy sections', 'dawp' ); ?>">
                <?php foreach ( $nav_items as $section_id => $label ) : ?>
                    <a href="#<?php echo esc_attr( $section_id ); ?>"><?php echo esc_html( $label ); ?></a>
                <?php endforeach; ?>
            </aside>

            <div class="hcs-policy-content">
                <div class="hcs-policy-facts">
                    <?php foreach ( $quick_facts as $fact ) : ?>
                        <div class="hcs-policy-fact">
                            <p class="hcs-policy-label"><?php echo esc_html( $fact['label'] ); ?></p>
                            <strong><?php echo esc_html( $fact['value'] ); ?></strong>
                            <span><?php echo esc_html( $fact['note'] ); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div id="shipping-locations" class="hcs-policy-card">
                    <div class="hcs-policy-card-head">
                        <span class="hcs-policy-icon" aria-hidden="true">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        </span>
                        <div>
                            <h2><?php esc_html_e( 'Shipping Locations', 'dawp' ); ?></h2>
                            <p class="hcs-policy-copy"><?php esc_html_e( 'We currently ship eligible orders within the United States.', 'dawp' ); ?></p>
                        </div>
                    </div>
                    <p class="hcs-policy-copy"><?php echo esc_html( $store_name ); ?> ships eligible handmade leather shoes, leather sandals, leather boots, and custom leather footwear to U.S. delivery addresses.</p>
                    <p class="hcs-policy-copy"><?php esc_html_e( 'Some items may have shipping restrictions due to product type, size, weight, carrier limits, destination, custom production needs, or local regulations. If an item cannot be shipped to your address, our support team will contact you using the information provided at checkout.', 'dawp' ); ?></p>
                </div>

                <div id="order-processing" class="hcs-policy-card">
                    <h2><?php esc_html_e( 'Order Processing & Cutoff Time', 'dawp' ); ?></h2>
                    <div class="hcs-policy-grid">
                        <div class="hcs-policy-panel">
                            <h3><?php esc_html_e( 'Processing Timeline', 'dawp' ); ?></h3>
                            <dl class="hcs-policy-definition">
                                <div><dt><?php esc_html_e( 'Order cutoff time', 'dawp' ); ?></dt><dd><?php esc_html_e( '5:00 PM PST', 'dawp' ); ?></dd></div>
                                <div><dt><?php esc_html_e( 'Handling time', 'dawp' ); ?></dt><dd><?php esc_html_e( '1-2 business days', 'dawp' ); ?></dd></div>
                                <div><dt><?php esc_html_e( 'Processing days', 'dawp' ); ?></dt><dd><?php esc_html_e( 'Monday-Friday', 'dawp' ); ?></dd></div>
                                <div><dt><?php esc_html_e( 'Orders after cutoff', 'dawp' ); ?></dt><dd><?php esc_html_e( 'Next business day', 'dawp' ); ?></dd></div>
                            </dl>
                        </div>
                        <div class="hcs-policy-panel">
                            <h3><?php esc_html_e( 'What Handling Includes', 'dawp' ); ?></h3>
                            <ul class="hcs-policy-list">
                                <li><?php esc_html_e( 'Order confirmation and internal review.', 'dawp' ); ?></li>
                                <li><?php esc_html_e( 'Product preparation, packing, and quality check where applicable.', 'dawp' ); ?></li>
                                <li><?php esc_html_e( 'Handoff to the shipping carrier, often from the closest available warehouse or fulfillment partner.', 'dawp' ); ?></li>
                                <li><?php esc_html_e( 'Custom, handmade, or special-handling products may require additional time when stated on the product page.', 'dawp' ); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div id="delivery-times" class="hcs-policy-card">
                    <h2><?php esc_html_e( 'Estimated Delivery Times', 'dawp' ); ?></h2>
                    <div class="hcs-policy-grid">
                        <div class="hcs-policy-panel">
                            <h3><?php esc_html_e( 'What to Expect', 'dawp' ); ?></h3>
                            <dl class="hcs-policy-definition">
                                <div><dt><?php esc_html_e( 'Handling time', 'dawp' ); ?></dt><dd><?php esc_html_e( '1-2 business days', 'dawp' ); ?></dd></div>
                                <div><dt><?php esc_html_e( 'Transit time', 'dawp' ); ?></dt><dd><?php esc_html_e( '5-7 business days', 'dawp' ); ?></dd></div>
                                <div><dt><?php esc_html_e( 'Estimated delivery', 'dawp' ); ?></dt><dd><?php esc_html_e( 'Usually 6-9 business days', 'dawp' ); ?></dd></div>
                            </dl>
                        </div>
                        <div class="hcs-policy-panel">
                            <h3><?php esc_html_e( 'Delivery Notes', 'dawp' ); ?></h3>
                            <ul class="hcs-policy-list">
                                <li><?php esc_html_e( 'Transit depends on the carrier route, delivery address, and item type.', 'dawp' ); ?></li>
                                <li><?php esc_html_e( 'Handmade, custom, bulky, special-handling, oversized, or partner-shipped items may take longer.', 'dawp' ); ?></li>
                                <li><?php esc_html_e( 'Multi-item orders may ship in more than one package.', 'dawp' ); ?></li>
                                <li><?php esc_html_e( 'Weather, holidays, carrier delays, and high-volume periods may extend delivery timelines.', 'dawp' ); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div id="carrier-services" class="hcs-policy-card">
                    <h2><?php esc_html_e( 'Carrier Services & Shipping Costs', 'dawp' ); ?></h2>
                    <div class="hcs-policy-grid">
                        <div class="hcs-policy-panel">
                            <h3><?php esc_html_e( 'Carriers', 'dawp' ); ?></h3>
                            <p class="hcs-policy-copy"><?php esc_html_e( 'Orders may ship with trusted carriers such as USPS, UPS, FedEx, DHL, regional carriers, or specialized carriers when applicable. The carrier used may depend on package size, destination, availability, and item type.', 'dawp' ); ?></p>
                        </div>
                        <div class="hcs-policy-panel">
                            <h3><?php esc_html_e( 'Shipping Costs', 'dawp' ); ?></h3>
                            <p class="hcs-policy-copy"><?php esc_html_e( 'Shipping costs, available shipping methods, and any applicable fees are shown at checkout before payment is completed. If a product has special shipping rules, they may be shown on the product page or at checkout.', 'dawp' ); ?></p>
                        </div>
                    </div>
                </div>

                <div id="tracking-packages" class="hcs-policy-card hcs-policy-dark">
                    <h2><?php esc_html_e( 'Tracking & Multiple Packages', 'dawp' ); ?></h2>
                    <div class="hcs-policy-grid">
                        <div class="hcs-policy-panel">
                            <h3><?php esc_html_e( 'Tracking Your Order', 'dawp' ); ?></h3>
                            <p class="hcs-policy-copy"><?php esc_html_e( 'Once your order ships, tracking information will be sent to the email address used at checkout. Please allow up to 24-48 hours for tracking information to update after the carrier receives the package.', 'dawp' ); ?></p>
                            <div class="hcs-policy-actions">
                                <a class="hcs-policy-btn hcs-policy-btn-primary" href="<?php echo esc_url( $track_url ); ?>"><?php esc_html_e( 'Track Your Order', 'dawp' ); ?></a>
                            </div>
                        </div>
                        <div class="hcs-policy-panel">
                            <h3><?php esc_html_e( 'Multiple Packages', 'dawp' ); ?></h3>
                            <p class="hcs-policy-copy"><?php esc_html_e( 'If your order includes multiple items, they may ship separately and arrive at different times. This can happen when products are fulfilled from different locations, require different handling times, or need special packaging.', 'dawp' ); ?></p>
                        </div>
                    </div>
                </div>

                <div id="delivery-issues" class="hcs-policy-card">
                    <h2><?php esc_html_e( 'Delivery Issues', 'dawp' ); ?></h2>
                    <p class="hcs-policy-copy"><?php esc_html_e( 'If tracking has not updated, a package is delayed, an item arrives damaged, or the carrier marks a package as delivered but you cannot find it, contact us so we can help review the issue.', 'dawp' ); ?></p>
                    <p class="hcs-policy-copy"><?php esc_html_e( 'Please include your order number, email used at checkout, delivery address, tracking number, photos if applicable, and a short description of the issue.', 'dawp' ); ?></p>
                    <p class="hcs-policy-copy">
                        <?php esc_html_e( 'You can also use the', 'dawp' ); ?>
                        <a href="<?php echo esc_url( $track_url ); ?>"><?php esc_html_e( 'Order Tracking page', 'dawp' ); ?></a>
                        <?php esc_html_e( 'to check the latest available status.', 'dawp' ); ?>
                    </p>
                </div>

                <div class="hcs-policy-mini-grid">
                    <div class="hcs-policy-mini">
                        <h2><?php esc_html_e( 'Incorrect Shipping Address', 'dawp' ); ?></h2>
                        <p class="hcs-policy-copy"><?php esc_html_e( 'Customers are responsible for entering a complete and accurate shipping address at checkout. If you notice an address error, contact us as soon as possible. We can only update the address if the order has not yet been processed or shipped.', 'dawp' ); ?></p>
                    </div>
                    <div class="hcs-policy-mini">
                        <h2><?php esc_html_e( 'Lost Packages', 'dawp' ); ?></h2>
                        <p class="hcs-policy-copy"><?php esc_html_e( 'If a package appears lost or has no tracking updates for an extended period, contact us within 30 days of the expected delivery date or latest tracking status. We will review the tracking information and may contact the carrier.', 'dawp' ); ?></p>
                    </div>
                    <div class="hcs-policy-mini">
                        <h2><?php esc_html_e( 'Damaged Packages', 'dawp' ); ?></h2>
                        <p class="hcs-policy-copy"><?php esc_html_e( 'If your order arrives damaged, contact us within 30 days of delivery with your order number, photos of the damaged item, photos of the outer packaging, and photos of the shipping label. Please keep the item and packaging until the issue is resolved.', 'dawp' ); ?></p>
                    </div>
                    <div class="hcs-policy-mini">
                        <h2><?php esc_html_e( 'Restrictions & Delays', 'dawp' ); ?></h2>
                        <p class="hcs-policy-copy"><?php esc_html_e( 'Some products may be subject to restrictions due to size, weight, carrier limitations, product type, or local regulations. Delays may occur due to weather, holidays, high order volume, warehouse delays, carrier conditions, or incomplete shipping information.', 'dawp' ); ?></p>
                    </div>
                </div>

                <div id="contact-information" class="hcs-policy-contact">
                    <h2 class="hcs-policy-title" style="font-size:clamp(30px,3vw,42px);"><?php esc_html_e( 'Contact Information', 'dawp' ); ?></h2>
                    <dl class="hcs-policy-contact-grid">
                        <div class="hcs-policy-contact-item"><dt><?php esc_html_e( 'Store Name', 'dawp' ); ?></dt><dd><?php echo esc_html( $store_name ); ?></dd></div>
                        <div class="hcs-policy-contact-item"><dt><?php esc_html_e( 'Website', 'dawp' ); ?></dt><dd><?php echo esc_html( $website_domain ); ?></dd></div>
                        <div class="hcs-policy-contact-item"><dt><?php esc_html_e( 'Email', 'dawp' ); ?></dt><dd><a href="mailto:<?php echo esc_attr( $support_email ); ?>"><?php echo esc_html( $support_email ); ?></a></dd></div>
                        <div class="hcs-policy-contact-item"><dt><?php esc_html_e( 'Service Hours', 'dawp' ); ?></dt><dd><?php esc_html_e( 'Monday - Friday, 9:00 AM - 5:00 PM, GMT-08:00 Pacific Standard Time (Los Angeles)', 'dawp' ); ?></dd></div>
                    </dl>
                    <div class="hcs-policy-actions">
                        <a class="hcs-policy-btn hcs-policy-btn-primary" href="<?php echo esc_url( $contact_url ); ?>"><?php esc_html_e( 'Contact Support', 'dawp' ); ?></a>
                        <a class="hcs-policy-btn hcs-policy-btn-secondary" href="<?php echo esc_url( $faq_url ); ?>"><?php esc_html_e( 'Read FAQs', 'dawp' ); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
