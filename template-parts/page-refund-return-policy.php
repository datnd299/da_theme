<?php
/**
 * Template Part: Handcraft Shoe - Return & Refund Policy Page
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$store_name     = 'Handcraft Shoe';
$website_domain = 'handcraftshoe.com';
$support_email  = 'support@handcraftshoe.com';
$return_address = dawp_get_store_address();
$contact_url    = home_url( '/contact-us/' );
?>

<style>
    .hcs-return-policy {
        --hcs-ink: #2A1D2D;
        --hcs-muted: #675D6D;
        --hcs-line: #E8DCE7;
        --hcs-paper: #FFFFFF;
        --hcs-blush: #FFF9FC;
        --hcs-cream: #FFF7E6;
        --hcs-bg: #F5F4F7;
        background: var(--hcs-bg);
        color: var(--hcs-ink);
        font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    }

    .hcs-return-wrap {
        width: min(100% - 32px, 1160px);
        margin: 0 auto;
    }

    .hcs-return-hero {
        padding: 74px 0 24px;
    }

    .hcs-return-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: var(--hcs-muted);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .12em;
        text-transform: uppercase;
    }

    .hcs-return-eyebrow::before {
        content: "";
        width: 34px;
        height: 1px;
        background: var(--hcs-ink);
    }

    .hcs-return-title,
    .hcs-return-card h2 {
        margin: 0;
        color: var(--hcs-ink);
        font-family: Georgia, "Times New Roman", serif;
        font-weight: 600;
        line-height: 1.1;
        letter-spacing: 0;
    }

    .hcs-return-title {
        max-width: 850px;
        margin-top: 16px;
        font-size: clamp(42px, 6vw, 72px);
    }

    .hcs-return-lead {
        max-width: 820px;
        margin: 20px 0 0;
        color: var(--hcs-muted);
        font-size: 18px;
        line-height: 1.75;
    }

    .hcs-return-main {
        display: grid;
        gap: 22px;
        padding: 18px 0 86px;
    }

    .hcs-return-card {
        padding: 36px;
        border: 1px solid var(--hcs-line);
        border-radius: 20px;
        background: var(--hcs-paper);
        box-shadow: 0 16px 40px rgba(42, 29, 45, .05);
    }

    .hcs-return-card-soft {
        background: var(--hcs-blush);
    }

    .hcs-return-card h2 {
        font-size: clamp(32px, 4vw, 42px);
    }

    .hcs-return-copy {
        margin: 14px 0 0;
        color: var(--hcs-muted);
        font-size: 15.5px;
        line-height: 1.75;
    }

    .hcs-return-card h3 {
        margin: 0 0 12px;
        color: var(--hcs-ink);
        font-size: 18px;
        font-weight: 500;
        line-height: 1.4;
    }

    .hcs-return-list {
        display: grid;
        gap: 12px;
        margin: 22px 0 0;
        padding-left: 18px;
        color: var(--hcs-muted);
        line-height: 1.7;
    }

    .hcs-return-list li {
        padding-left: 4px;
    }

    .hcs-return-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 16px;
        margin-top: 22px;
    }

    .hcs-return-panel {
        padding: 20px;
        border: 1px solid var(--hcs-line);
        border-radius: 14px;
        background: var(--hcs-paper);
    }

    .hcs-return-issue {
        margin-top: 24px;
    }

    .hcs-return-steps {
        display: grid;
        gap: 14px;
        margin-top: 24px;
    }

    .hcs-return-step {
        display: grid;
        grid-template-columns: 36px minmax(0, 1fr);
        gap: 14px;
        padding: 20px;
        border: 1px solid var(--hcs-line);
        border-radius: 14px;
        background: var(--hcs-paper);
    }

    .hcs-return-step-number {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 28px;
        height: 28px;
        border-radius: 999px;
        background: var(--hcs-ink);
        color: #fff;
        font-size: 13px;
        font-weight: 800;
    }

    .hcs-return-notice {
        margin-top: 18px;
        padding: 20px;
        border: 1px solid #F0D28B;
        border-radius: 14px;
        background: var(--hcs-cream);
        color: var(--hcs-ink);
        line-height: 1.65;
    }

    .hcs-return-notice strong {
        display: block;
        margin-bottom: 4px;
    }

    .hcs-return-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
        margin-top: 28px;
    }

    .hcs-return-btn {
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

    .hcs-return-btn:hover {
        transform: translateY(-1px);
    }

    .hcs-return-btn-primary {
        border: 1px solid var(--hcs-ink);
        background: var(--hcs-ink);
        color: #fff;
    }

    .hcs-return-btn-primary:hover {
        background: #3A293E;
        color: #fff;
    }

    .hcs-return-btn-secondary {
        border: 1px solid var(--hcs-ink);
        background: #fff;
        color: var(--hcs-ink);
    }

    .hcs-return-btn-secondary:hover {
        background: var(--hcs-blush);
        color: var(--hcs-ink);
    }

    .hcs-return-contact-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 14px;
        margin-top: 24px;
        padding: 18px;
        border: 1px solid var(--hcs-line);
        border-radius: 18px;
        background: var(--hcs-paper);
    }

    .hcs-return-contact-item {
        padding: 18px;
        border: 1px solid var(--hcs-line);
        border-radius: 14px;
        background: #fff;
    }

    .hcs-return-contact-item dt {
        margin-bottom: 8px;
        color: var(--hcs-ink);
        font-size: 13px;
        font-weight: 800;
    }

    .hcs-return-contact-item dd {
        margin: 0;
        color: var(--hcs-muted);
        line-height: 1.65;
        overflow-wrap: anywhere;
    }

    .hcs-return-contact-item a {
        color: inherit;
        text-decoration: none;
    }

    @media (max-width: 780px) {
        .hcs-return-hero {
            padding-top: 56px;
        }

        .hcs-return-card {
            padding: 24px;
        }

        .hcs-return-grid,
        .hcs-return-contact-grid {
            grid-template-columns: 1fr;
        }

        .hcs-return-step {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="hcs-return-policy">
    <section class="hcs-return-hero">
        <div class="hcs-return-wrap">
            <span class="hcs-return-eyebrow"><?php esc_html_e( 'Return & Refund Policy', 'dawp' ); ?></span>
            <h1 class="hcs-return-title"><?php esc_html_e( 'Returns for handmade leather footwear.', 'dawp' ); ?></h1>
            <p class="hcs-return-lead"><?php esc_html_e( 'Last updated: May 27, 2026', 'dawp' ); ?></p>
            <p class="hcs-return-lead">
                <?php
                printf(
                    esc_html__( 'This policy explains how returns, exchanges, delivery issues, and refunds are handled when you purchase shoes, sandals, boots, or custom leather footwear from %s.', 'dawp' ),
                    esc_html( $store_name )
                );
                ?>
            </p>
        </div>
    </section>

    <main class="hcs-return-main hcs-return-wrap">
        <section class="hcs-return-card">
            <h2><?php esc_html_e( 'Return Eligibility', 'dawp' ); ?></h2>
            <p class="hcs-return-copy"><?php esc_html_e( 'To be eligible for a return, your item must meet the following criteria:', 'dawp' ); ?></p>
            <ul class="hcs-return-list">
                <li><?php esc_html_e( 'Return Window: You must initiate your return request within 30 days of delivery.', 'dawp' ); ?></li>
                <li><?php esc_html_e( 'Condition: Items must be unworn, unused, undamaged, and in their original, unaltered condition.', 'dawp' ); ?></li>
                <li><?php esc_html_e( 'Packaging: Items must be returned with all original packaging, tags, labels, certificates, care cards, pouches, shoe boxes, and any included accessories.', 'dawp' ); ?></li>
                <li><?php esc_html_e( 'Restocking Fee: Free. We do not charge any restocking fees for eligible returns.', 'dawp' ); ?></li>
            </ul>
        </section>

        <section class="hcs-return-card hcs-return-card-soft">
            <h2><?php esc_html_e( 'Return Shipping Fees', 'dawp' ); ?></h2>
            <div class="hcs-return-grid">
                <div class="hcs-return-panel">
                    <h3><?php esc_html_e( 'Defective, Damaged, or Incorrect Products (Wrong item, carrier damage, or defective):', 'dawp' ); ?></h3>
                    <p class="hcs-return-copy"><?php esc_html_e( 'No cost to customer. We cover 100% of the return shipping costs. We will provide a downloadable and printable prepaid shipping label via email.', 'dawp' ); ?></p>
                </div>
                <div class="hcs-return-panel">
                    <h3><?php esc_html_e( "Customer Remorse (Ordered wrong item/size/color, changed mind, or doesn't fit):", 'dawp' ); ?></h3>
                    <p class="hcs-return-copy"><?php esc_html_e( 'The customer is responsible for the return shipping cost. The actual return shipping cost of the provided prepaid label (sent via email) will be deducted from your final refund amount.', 'dawp' ); ?></p>
                </div>
            </div>
        </section>

        <section class="hcs-return-card">
            <h2><?php esc_html_e( 'Common Delivery Issues', 'dawp' ); ?></h2>
            <div class="hcs-return-issue">
                <h3><?php esc_html_e( 'Damaged on Arrival', 'dawp' ); ?></h3>
                <p class="hcs-return-copy"><?php esc_html_e( 'If your order arrives damaged, please contact us within 30 days of delivery with photos of the item and the shipping packaging, including the shipping label. We will arrange a replacement or full refund at no cost to you.', 'dawp' ); ?></p>
            </div>
            <div class="hcs-return-issue">
                <h3><?php esc_html_e( 'Lost Packages / Never Arrived', 'dawp' ); ?></h3>
                <p class="hcs-return-copy"><?php esc_html_e( 'If your tracking status shows no updates for an extended period, or is marked "Delivered" but you did not receive it, please contact us within 30 days of the recorded delivery date. We will investigate with the carrier and arrange a replacement or refund if the package is confirmed lost.', 'dawp' ); ?></p>
            </div>
        </section>

        <section class="hcs-return-card hcs-return-card-soft">
            <h2><?php esc_html_e( 'How to Return an Item', 'dawp' ); ?></h2>
            <p class="hcs-return-copy"><?php esc_html_e( 'Please follow our official 3-step process. Do not ship any item back without prior authorization, as unauthorized returns cannot be tracked or processed at our warehouse.', 'dawp' ); ?></p>

            <div class="hcs-return-steps">
                <div class="hcs-return-step">
                    <span class="hcs-return-step-number">1</span>
                    <div>
                        <h3><?php esc_html_e( 'Submit Your Return Request', 'dawp' ); ?></h3>
                        <p class="hcs-return-copy"><?php esc_html_e( 'Email us or use our Contact Page within 30 days of delivery. Please provide your order number, the email used at checkout, the specific item(s) you wish to return, and the reason for the return with photos or videos if damaged.', 'dawp' ); ?></p>
                    </div>
                </div>

                <div class="hcs-return-step">
                    <span class="hcs-return-step-number">2</span>
                    <div>
                        <h3><?php esc_html_e( 'Receive Approval & Pack Your Item', 'dawp' ); ?></h3>
                        <p class="hcs-return-copy"><?php esc_html_e( 'Our support team will review your request within 1-2 business days. Once approved, we will email you a Return Merchandise Authorization (RMA) number along with a prepaid shipping label.', 'dawp' ); ?></p>
                        <p class="hcs-return-copy"><?php esc_html_e( 'Repack the item securely in its original packaging with all included accessories, tags, and boxes. Place it inside a sturdy outer shipping box.', 'dawp' ); ?></p>
                    </div>
                </div>

                <div class="hcs-return-step">
                    <span class="hcs-return-step-number">3</span>
                    <div>
                        <h3><?php esc_html_e( 'Ship It Back to Our Returns Center', 'dawp' ); ?></h3>
                        <p class="hcs-return-copy"><?php esc_html_e( 'Print the prepaid shipping label, attach it to the outside of your shipping box, and drop it off at the designated carrier location.', 'dawp' ); ?></p>
                    </div>
                </div>
            </div>

            <div class="hcs-return-notice">
                <strong><?php echo esc_html( $store_name ); ?> <?php esc_html_e( '- Returns Department', 'dawp' ); ?></strong>
                <?php echo esc_html( $return_address ); ?>
            </div>

            <div class="hcs-return-actions">
                <a class="hcs-return-btn hcs-return-btn-primary" href="<?php echo esc_url( $contact_url ); ?>"><?php esc_html_e( 'Contact Support', 'dawp' ); ?></a>
                <a class="hcs-return-btn hcs-return-btn-secondary" href="mailto:<?php echo esc_attr( $support_email ); ?>"><?php echo esc_html( $support_email ); ?></a>
            </div>
        </section>

        <section class="hcs-return-card">
            <h2><?php esc_html_e( 'Exchanges', 'dawp' ); ?></h2>
            <p class="hcs-return-copy"><?php esc_html_e( 'We do not process direct one-for-one product exchanges. To get a different size, color, or model, please follow the return process above to send back your original purchase for a refund, and place a new order on our website simultaneously. This ensures your desired item does not sell out.', 'dawp' ); ?></p>
        </section>

        <section class="hcs-return-card hcs-return-card-soft">
            <h2><?php esc_html_e( 'Refund Process & Timing', 'dawp' ); ?></h2>
            <ul class="hcs-return-list">
                <li><?php esc_html_e( 'Inspection: Once your return package is received at our warehouse, we will inspect the item within 1-2 business days to ensure it meets our return criteria.', 'dawp' ); ?></li>
                <li><?php esc_html_e( 'Approval & Timing: If approved, your refund will be processed automatically back to your original payment method within 7 business days.', 'dawp' ); ?></li>
                <li><?php esc_html_e( 'Refund Method: All refunds will be issued solely to your original method of payment within 7 business days of inspection. We do not offer store credit or gift cards as a refund method for returns.', 'dawp' ); ?></li>
                <li><?php esc_html_e( 'Issues with Returns: If a return is approved but is found to be missing accessories, tags, boxes, or shows signs of wear, we reserve the right to refuse the refund and will offer to ship the item back to you at your expense.', 'dawp' ); ?></li>
                <li><?php esc_html_e( 'Delayed Refunds: If you have not received your refund after 15 business days of approval, please check with your bank or credit card company first, then contact us.', 'dawp' ); ?></li>
            </ul>
            <div class="hcs-return-actions">
                <a class="hcs-return-btn hcs-return-btn-secondary" href="mailto:<?php echo esc_attr( $support_email ); ?>"><?php esc_html_e( 'Email Support', 'dawp' ); ?></a>
            </div>
        </section>

        <section class="hcs-return-card">
            <h2><?php esc_html_e( 'Non-Returnable Items', 'dawp' ); ?></h2>
            <p class="hcs-return-copy"><?php esc_html_e( 'The following items are strictly non-returnable and final sale:', 'dawp' ); ?></p>
            <ul class="hcs-return-list">
                <li><?php esc_html_e( 'Items explicitly marked as "Final Sale" or "Non-Returnable" on the product page.', 'dawp' ); ?></li>
                <li><?php esc_html_e( 'Gift cards or digital products/downloads.', 'dawp' ); ?></li>
                <li><?php esc_html_e( 'Personalized, engraved, resized, or custom-made leather footwear.', 'dawp' ); ?></li>
                <li><?php esc_html_e( 'Footwear where the product seal, hygiene liner, or protective packaging has been broken where applicable.', 'dawp' ); ?></li>
                <li><?php esc_html_e( 'Items that have been worn, washed, altered, or damaged after delivery.', 'dawp' ); ?></li>
            </ul>
        </section>

        <section class="hcs-return-card hcs-return-card-soft">
            <h2><?php esc_html_e( 'Contact Information', 'dawp' ); ?></h2>
            <dl class="hcs-return-contact-grid">
                <div class="hcs-return-contact-item">
                    <dt><?php esc_html_e( 'Store Name', 'dawp' ); ?></dt>
                    <dd><?php echo esc_html( $store_name ); ?></dd>
                </div>
                <div class="hcs-return-contact-item">
                    <dt><?php esc_html_e( 'Address', 'dawp' ); ?></dt>
                    <dd><?php echo esc_html( $return_address ); ?></dd>
                </div>
                <div class="hcs-return-contact-item">
                    <dt><?php esc_html_e( 'Email', 'dawp' ); ?></dt>
                    <dd><a href="mailto:<?php echo esc_attr( $support_email ); ?>"><?php echo esc_html( $support_email ); ?></a></dd>
                </div>
                <div class="hcs-return-contact-item">
                    <dt><?php esc_html_e( 'Contact Support', 'dawp' ); ?></dt>
                    <dd><a href="<?php echo esc_url( $contact_url ); ?>"><?php esc_html_e( 'Contact Us page', 'dawp' ); ?></a></dd>
                </div>
                <div class="hcs-return-contact-item">
                    <dt><?php esc_html_e( 'Customer Service Hours', 'dawp' ); ?></dt>
                    <dd><?php esc_html_e( 'Monday-Friday, 9:00 AM-5:00 PM PST.', 'dawp' ); ?></dd>
                </div>
                <div class="hcs-return-contact-item">
                    <dt><?php esc_html_e( 'Response Time', 'dawp' ); ?></dt>
                    <dd><?php esc_html_e( 'We aim to reply within 1 business day. Response times may vary on weekends, holidays, or high-volume periods.', 'dawp' ); ?></dd>
                </div>
            </dl>
        </section>
    </main>
</div>
