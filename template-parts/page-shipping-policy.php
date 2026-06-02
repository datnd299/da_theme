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
$store_address  = dawp_get_store_address();
$contact_url    = home_url( '/contact-us/' );
$track_url      = home_url( '/track-order/' );
$returns_url    = home_url( '/refund-return-policy/' );

$timeline_items = array(
    array(
        'title' => 'Order Cutoff Time',
        'text'  => '5:00 PM (GMT-08:00) Pacific Standard Time.',
    ),
    array(
        'title' => 'Order Handling Time',
        'text'  => '1-3 business days. Orders placed after cutoff begin processing the following business day.',
    ),
    array(
        'title' => 'Transit Time',
        'text'  => '5-7 business days, Monday to Friday.',
    ),
    array(
        'title' => 'Estimated Delivery Time',
        'text'  => '6-10 business days total from the date of purchase.',
    ),
);

$carriers = array( 'USPS', 'UPS', 'FedEx', 'DHL' );
?>

<style>
    .hcs-ship {
        --ship-ink: #302039;
        --ship-muted: #6d6073;
        --ship-line: #eadde7;
        --ship-bg: #f6f5f7;
        --ship-soft: #fff8ea;
        --ship-accent: #2f2039;
        --ship-gold: #d3a844;
        background: var(--ship-bg);
        color: var(--ship-muted);
        font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        padding: 0 0 64px;
    }
    .hcs-ship-wrap {
        width: min(100% - 32px, 1160px);
        margin: 0 auto;
    }
    .hcs-ship-hero {
        padding: 72px 0 28px;
    }
    .hcs-ship-hero-card,
    .hcs-ship-card {
        border: 1px solid var(--ship-line);
        border-radius: 22px;
        background: rgba(255, 255, 255, .92);
        box-shadow: 0 16px 40px rgba(47, 32, 57, .05);
    }
    .hcs-ship-hero-card {
        padding: clamp(34px, 5vw, 58px);
    }
    .hcs-ship-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: var(--ship-accent);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .12em;
        text-transform: uppercase;
    }
    .hcs-ship-eyebrow::before {
        content: "";
        width: 34px;
        height: 1px;
        background: var(--ship-gold);
    }
    .hcs-ship-title,
    .hcs-ship-card h2 {
        margin: 0;
        color: var(--ship-ink);
        font-family: Georgia, "Times New Roman", serif;
        font-weight: 600;
        line-height: 1.08;
        letter-spacing: 0;
    }
    .hcs-ship-title {
        max-width: 860px;
        margin-top: 16px;
        font-size: clamp(42px, 6vw, 76px);
    }
    .hcs-ship-lead {
        max-width: 880px;
        margin: 22px 0 0;
        color: var(--ship-muted);
        font-size: 17px;
        line-height: 1.8;
    }
    .hcs-ship-meta {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 14px;
        margin-top: 28px;
    }
    .hcs-ship-meta-item,
    .hcs-ship-panel,
    .hcs-ship-contact-item {
        border: 1px solid var(--ship-line);
        border-radius: 16px;
        background: #fff;
    }
    .hcs-ship-meta-item {
        padding: 18px;
    }
    .hcs-ship-label {
        display: block;
        margin-bottom: 9px;
        color: var(--ship-ink);
        font-size: 13px;
        font-weight: 800;
    }
    .hcs-ship-meta-item span,
    .hcs-ship-panel p,
    .hcs-ship-copy {
        color: var(--ship-muted);
        line-height: 1.72;
    }
    .hcs-ship-main {
        display: grid;
        gap: 20px;
    }
    .hcs-ship-card {
        padding: clamp(28px, 4vw, 40px);
    }
    .hcs-ship-card h2 {
        font-size: clamp(32px, 4vw, 44px);
    }
    .hcs-ship-card p {
        margin: 14px 0 0;
    }
    .hcs-ship-note {
        margin-top: 8px;
        padding: 22px 24px;
        border-left: 4px solid var(--ship-gold);
        border-radius: 0 14px 14px 0;
        background: var(--ship-soft);
        color: var(--ship-muted);
        line-height: 1.75;
    }
    .hcs-ship-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 16px;
        margin-top: 22px;
    }
    .hcs-ship-grid.four {
        grid-template-columns: repeat(4, minmax(0, 1fr));
    }
    .hcs-ship-panel {
        padding: 22px;
    }
    .hcs-ship-panel h3 {
        margin: 0 0 10px;
        color: var(--ship-ink);
        font-size: 18px;
        line-height: 1.35;
    }
    .hcs-ship-list {
        display: grid;
        gap: 12px;
        margin: 18px 0 0;
        padding-left: 18px;
        color: var(--ship-muted);
        line-height: 1.7;
    }
    .hcs-ship-carriers {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin: 22px 0 0;
        padding: 0;
        list-style: none;
    }
    .hcs-ship-carriers li {
        min-width: 72px;
        padding: 10px 18px;
        border: 1px solid var(--ship-line);
        border-radius: 999px;
        color: var(--ship-ink);
        font-size: 13px;
        font-weight: 800;
        text-align: center;
        background: #fff;
    }
    .hcs-ship-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 24px;
    }
    .hcs-ship-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 48px;
        padding: 13px 24px;
        border-radius: 999px;
        font-size: 14px;
        font-weight: 800;
        text-decoration: none;
        transition: transform .2s ease, background .2s ease, color .2s ease, border-color .2s ease;
    }
    .hcs-ship-btn:hover {
        transform: translateY(-1px);
    }
    .hcs-ship-btn.primary {
        border: 1px solid var(--ship-accent);
        background: var(--ship-accent);
        color: #fff;
    }
    .hcs-ship-btn.primary:hover {
        background: #1f1526;
        border-color: #1f1526;
        color: #fff;
    }
    .hcs-ship-btn.secondary {
        border: 1px solid var(--ship-accent);
        background: #fff;
        color: var(--ship-accent);
    }
    .hcs-ship-btn.secondary:hover {
        background: var(--ship-soft);
        color: var(--ship-accent);
    }
    .hcs-ship-contact-box {
        margin-top: 24px;
        padding: 18px;
        border: 1px solid var(--ship-line);
        border-radius: 18px;
        background: rgba(255, 255, 255, .72);
    }
    .hcs-ship-contact-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 14px;
    }
    .hcs-ship-contact-item {
        padding: 18px;
    }
    .hcs-ship-contact-item dt {
        margin-bottom: 9px;
        color: var(--ship-ink);
        font-size: 13px;
        font-weight: 800;
    }
    .hcs-ship-contact-item dd {
        margin: 0;
        color: var(--ship-muted);
        line-height: 1.6;
        overflow-wrap: anywhere;
    }
    .hcs-ship-contact-item a {
        color: var(--ship-muted);
        text-decoration: none;
    }
    .hcs-ship-contact-item a:hover {
        color: var(--ship-accent);
        text-decoration: underline;
        text-underline-offset: 3px;
    }
    @media (max-width: 1023px) {
        .hcs-ship-meta,
        .hcs-ship-grid.four {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }
    @media (max-width: 700px) {
        .hcs-ship {
            padding-bottom: 44px;
        }
        .hcs-ship-hero {
            padding-top: 46px;
        }
        .hcs-ship-meta,
        .hcs-ship-grid,
        .hcs-ship-grid.four,
        .hcs-ship-contact-grid {
            grid-template-columns: 1fr;
        }
        .hcs-ship-card,
        .hcs-ship-hero-card {
            border-radius: 18px;
        }
        .hcs-ship-btn {
            width: 100%;
        }
    }
</style>

<div class="hcs-ship">
    <section class="hcs-ship-hero">
        <div class="hcs-ship-wrap">
            <div class="hcs-ship-hero-card">
                <span class="hcs-ship-eyebrow"><?php esc_html_e( 'Shipping Policy', 'dawp' ); ?></span>
                <h1 class="hcs-ship-title"><?php esc_html_e( 'Clear delivery terms for handmade leather footwear.', 'dawp' ); ?></h1>
                <p class="hcs-ship-lead">
                    <?php
                    printf(
                        esc_html__( 'This Shipping Policy explains where %1$s ships, how orders are processed, estimated delivery windows, carrier services, tracking, delivery issues, and customer support for purchases made through %2$s.', 'dawp' ),
                        esc_html( $store_name ),
                        esc_html( $website_domain )
                    );
                    ?>
                </p>
                <div class="hcs-ship-meta">
                    <div class="hcs-ship-meta-item">
                        <strong class="hcs-ship-label"><?php esc_html_e( 'Shipping Market', 'dawp' ); ?></strong>
                        <span><?php esc_html_e( 'United States domestic shipping.', 'dawp' ); ?></span>
                    </div>
                    <div class="hcs-ship-meta-item">
                        <strong class="hcs-ship-label"><?php esc_html_e( 'Standard Shipping', 'dawp' ); ?></strong>
                        <span><?php esc_html_e( 'Free for all orders nationwide.', 'dawp' ); ?></span>
                    </div>
                    <div class="hcs-ship-meta-item">
                        <strong class="hcs-ship-label"><?php esc_html_e( 'Delivery Window', 'dawp' ); ?></strong>
                        <span><?php esc_html_e( '6-10 business days.', 'dawp' ); ?></span>
                    </div>
                    <div class="hcs-ship-meta-item">
                        <strong class="hcs-ship-label"><?php esc_html_e( 'Last Updated', 'dawp' ); ?></strong>
                        <span><?php esc_html_e( 'May 27, 2026', 'dawp' ); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main class="hcs-ship-wrap hcs-ship-main">
        <section class="hcs-ship-card">
            <h2><?php esc_html_e( 'Shipping Locations & Market', 'dawp' ); ?></h2>
            <p class="hcs-ship-copy">
                <?php
                printf(
                    esc_html__( 'We currently ship exclusively within the United States. %s serves customers shopping from the United States domestic market.', 'dawp' ),
                    esc_html( $store_name )
                );
                ?>
            </p>
            <p class="hcs-ship-copy"><?php esc_html_e( 'If a product, destination, or carrier limitation prevents delivery to your specific address, the order will not be available for that location, and you will be notified immediately at checkout before any payment is processed.', 'dawp' ); ?></p>
            <div class="hcs-ship-note"><?php esc_html_e( 'Some footwear orders may ship separately if items are prepared from different fulfillment batches or require distinct specialized packing methods to ensure safe transit.', 'dawp' ); ?></div>
        </section>

        <section class="hcs-ship-card">
            <h2><?php esc_html_e( 'Shipping Fees & Costs', 'dawp' ); ?></h2>
            <p class="hcs-ship-copy"><?php esc_html_e( 'We believe in full transparency with no hidden fees at checkout. Our shipping costs are structured as follows:', 'dawp' ); ?></p>
            <div class="hcs-ship-grid">
                <div class="hcs-ship-panel">
                    <h3><?php esc_html_e( 'Standard U.S. Shipping', 'dawp' ); ?></h3>
                    <p><?php esc_html_e( 'Completely free for all orders nationwide. There is no minimum purchase requirement to qualify for free standard shipping.', 'dawp' ); ?></p>
                </div>
                <div class="hcs-ship-panel">
                    <h3><?php esc_html_e( 'Optional Upgraded Shipping', 'dawp' ); ?></h3>
                    <p><?php esc_html_e( 'If expedited or assisted shipping services are available for your destination, the exact cost will be displayed clearly on the checkout page before you complete your payment.', 'dawp' ); ?></p>
                </div>
            </div>
        </section>

        <section class="hcs-ship-card">
            <h2><?php esc_html_e( 'Order Processing & Delivery Times', 'dawp' ); ?></h2>
            <p class="hcs-ship-copy"><?php esc_html_e( 'All shipping and handling timelines are calculated in business days, Monday through Friday, excluding standard U.S. public holidays.', 'dawp' ); ?></p>
            <div class="hcs-ship-grid four">
                <?php foreach ( $timeline_items as $item ) : ?>
                    <div class="hcs-ship-panel">
                        <h3><?php echo esc_html( $item['title'] ); ?></h3>
                        <p><?php echo esc_html( $item['text'] ); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            <p class="hcs-ship-copy"><?php esc_html_e( 'Delivery estimates are carefully calculated windows reflecting our standard delivery benchmarks. While we and our courier partners work diligently to meet these timelines, unexpected delays due to extreme weather, carrier capacity issues, or regional holidays may occasionally occur.', 'dawp' ); ?></p>
        </section>

        <section class="hcs-ship-card">
            <h2><?php esc_html_e( 'Multi-Item Orders & Specialized Handling', 'dawp' ); ?></h2>
            <p class="hcs-ship-copy"><?php esc_html_e( 'If your purchase includes multiple pairs of shoes, sandals, boots, or custom leather footwear items, they may be fulfilled from different locations. Consequently, your items may ship separately and arrive in multiple packages.', 'dawp' ); ?></p>
            <p class="hcs-ship-copy"><?php esc_html_e( 'You will receive unique tracking numbers for each package. Certain handmade, custom, high-demand, bulky, or special-handling footwear items may require extra preparation time due to rigorous address reviews, holiday volume spikes, or safe-handling protocols.', 'dawp' ); ?></p>
        </section>

        <section class="hcs-ship-card">
            <h2><?php esc_html_e( 'Carrier Services & Delivery Tracking', 'dawp' ); ?></h2>
            <p class="hcs-ship-copy">
                <?php
                printf(
                    esc_html__( 'To support safe and efficient delivery, %s partners with trusted domestic U.S. carriers. Orders may be shipped using USPS, UPS, FedEx, or DHL.', 'dawp' ),
                    esc_html( $store_name )
                );
                ?>
            </p>
            <ul class="hcs-ship-carriers" aria-label="<?php esc_attr_e( 'Shipping carriers', 'dawp' ); ?>">
                <?php foreach ( $carriers as $carrier ) : ?>
                    <li><?php echo esc_html( $carrier ); ?></li>
                <?php endforeach; ?>
            </ul>
            <p class="hcs-ship-copy"><?php esc_html_e( 'The final carrier service is dynamically selected when your package is securely labeled and prepared at our fulfillment center. Once your order is dispatched, an automated shipping confirmation email containing a direct tracking link and courier details will be sent to your registered email address.', 'dawp' ); ?></p>
            <div class="hcs-ship-actions">
                <a class="hcs-ship-btn secondary" href="<?php echo esc_url( $track_url ); ?>"><?php esc_html_e( 'Track Order', 'dawp' ); ?></a>
            </div>
        </section>

        <section class="hcs-ship-card">
            <h2><?php esc_html_e( 'Resolving Delivery Issues & Damaged Shipments', 'dawp' ); ?></h2>
            <p class="hcs-ship-copy"><?php esc_html_e( 'Your satisfaction is our priority. If your order encounters delays, tracking stops updating, or the package is marked as delivered but has not arrived, please reach out to our dedicated support team immediately.', 'dawp' ); ?></p>
            <p class="hcs-ship-copy"><?php esc_html_e( 'To help us investigate and resolve the issue with the carrier swiftly, please provide:', 'dawp' ); ?></p>
            <ul class="hcs-ship-list">
                <li><?php esc_html_e( 'Your exact order number, such as #HCS1001.', 'dawp' ); ?></li>
                <li><?php esc_html_e( 'The specific email address utilized during checkout.', 'dawp' ); ?></li>
                <li><?php esc_html_e( 'The full and complete delivery address.', 'dawp' ); ?></li>
                <li><?php esc_html_e( 'Clear, well-lit photos if the package container or footwear item arrived damaged.', 'dawp' ); ?></li>
            </ul>
            <div class="hcs-ship-actions">
                <a class="hcs-ship-btn primary" href="<?php echo esc_url( $contact_url ); ?>"><?php esc_html_e( 'Contact Support', 'dawp' ); ?></a>
                <a class="hcs-ship-btn secondary" href="mailto:<?php echo esc_attr( $support_email ); ?>"><?php echo esc_html( $support_email ); ?></a>
            </div>
        </section>

        <section class="hcs-ship-card">
            <h2><?php esc_html_e( 'Incorrect Shipping Address', 'dawp' ); ?></h2>
            <p class="hcs-ship-copy"><?php esc_html_e( 'Customers are responsible for entering a complete and accurate shipping address at checkout. Please review your street address, apartment or suite number, city, state, ZIP code, phone number, and email address before submitting your order.', 'dawp' ); ?></p>
            <p class="hcs-ship-copy"><?php esc_html_e( 'If you notice an address mistake, contact us as soon as possible. We will try to help before fulfillment begins, but we cannot guarantee that changes can be made after an order has entered processing or shipped.', 'dawp' ); ?></p>
        </section>

        <section class="hcs-ship-card">
            <h2><?php esc_html_e( 'Lost Packages, Restrictions & Delays', 'dawp' ); ?></h2>
            <div class="hcs-ship-grid">
                <div class="hcs-ship-panel">
                    <h3><?php esc_html_e( 'Lost Packages', 'dawp' ); ?></h3>
                    <p><?php esc_html_e( 'If tracking shows no movement for an unusual period or indicates delivery but you cannot locate the package, contact us promptly so we can review the shipment details and assist with carrier follow-up.', 'dawp' ); ?></p>
                </div>
                <div class="hcs-ship-panel">
                    <h3><?php esc_html_e( 'Shipping Restrictions', 'dawp' ); ?></h3>
                    <p><?php esc_html_e( 'Some addresses, carrier routes, restricted locations, or product-specific handling requirements may limit delivery availability. If a restriction applies, checkout availability or support communication will reflect that limitation.', 'dawp' ); ?></p>
                </div>
                <div class="hcs-ship-panel">
                    <h3><?php esc_html_e( 'Operational Delays', 'dawp' ); ?></h3>
                    <p><?php esc_html_e( 'Carrier disruptions, severe weather, holidays, address verification, payment review, product preparation, and high-volume periods may extend delivery windows. We will keep customers updated when meaningful shipment changes are available.', 'dawp' ); ?></p>
                </div>
                <div class="hcs-ship-panel">
                    <h3><?php esc_html_e( 'Returns After Delivery', 'dawp' ); ?></h3>
                    <p>
                        <?php esc_html_e( 'Return eligibility, footwear condition requirements, and refund timing are explained in our', 'dawp' ); ?>
                        <a href="<?php echo esc_url( $returns_url ); ?>"><?php esc_html_e( 'Return & Refund Policy', 'dawp' ); ?></a>.
                    </p>
                </div>
            </div>
        </section>

        <section class="hcs-ship-card">
            <h2><?php esc_html_e( 'Customer Support Contact Information', 'dawp' ); ?></h2>
            <p class="hcs-ship-copy"><?php esc_html_e( 'For any questions regarding your shipment, custom delivery requests, or transit inquiries, please contact us directly through our official channels. We respond to all inquiries within 24 business hours.', 'dawp' ); ?></p>
            <div class="hcs-ship-contact-box">
                <dl class="hcs-ship-contact-grid">
                    <div class="hcs-ship-contact-item">
                        <dt><?php esc_html_e( 'Store Name', 'dawp' ); ?></dt>
                        <dd><?php echo esc_html( $store_name ); ?></dd>
                    </div>
                    <div class="hcs-ship-contact-item">
                        <dt><?php esc_html_e( 'Customer Support Email', 'dawp' ); ?></dt>
                        <dd><a href="mailto:<?php echo esc_attr( $support_email ); ?>"><?php echo esc_html( $support_email ); ?></a></dd>
                    </div>
                    <div class="hcs-ship-contact-item">
                        <dt><?php esc_html_e( 'Address', 'dawp' ); ?></dt>
                        <dd><?php echo esc_html( $store_address ); ?></dd>
                    </div>
                    <div class="hcs-ship-contact-item">
                        <dt><?php esc_html_e( 'Response Time', 'dawp' ); ?></dt>
                        <dd><?php esc_html_e( 'Within 24 business hours.', 'dawp' ); ?></dd>
                    </div>
                </dl>
            </div>
            <div class="hcs-ship-actions">
                <a class="hcs-ship-btn primary" href="<?php echo esc_url( $contact_url ); ?>"><?php esc_html_e( 'Contact Support', 'dawp' ); ?></a>
                <a class="hcs-ship-btn secondary" href="<?php echo esc_url( $track_url ); ?>"><?php esc_html_e( 'Track Your Order', 'dawp' ); ?></a>
            </div>
        </section>
    </main>
</div>
