<?php
/**
 * Template Part: Handcraft Shoe - FAQ Page
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$store_name     = 'Handcraft Shoe';
$website_domain = 'handcraftshoe.com';
$support_email  = 'support@handcraftshoe.com';
$contact_url    = home_url( '/contact-us/' );
$shipping_url   = home_url( '/shipping-policy/' );
$returns_url    = home_url( '/refund-return-policy/' );
$terms_url      = home_url( '/terms-conditions/' );
$privacy_url    = home_url( '/privacy-policy/' );
$track_url      = home_url( '/track-order/' );
$shop_url       = home_url( '/shop/' );

$faq_groups = array(
    'orders-payments' => array(
        'title' => 'Orders & Payments',
        'icon'  => '<rect x="2" y="5" width="20" height="14" rx="2"/><path d="M2 10h20"/><path d="M6 15h4"/>',
        'items' => array(
            array(
                'question' => 'What products does Handcraft Shoe sell?',
                'answer'   => sprintf(
                    '%s offers handmade leather shoes, leather sandals, leather boots, and custom leather footwear. Product pages include available details for material, size, fit, color, care, customization, and return limitations where applicable.',
                    $store_name
                ),
            ),
            array(
                'question' => 'Can I change my order or shipping address?',
                'answer'   => 'If you notice an incorrect shipping address or order detail, contact support as soon as possible. We will try to help before fulfillment begins, but we cannot guarantee changes after an order has entered processing or shipped.',
            ),
            array(
                'question' => 'Why was my order reviewed, changed, or canceled?',
                'answer'   => 'Orders may be reviewed, limited, changed, or canceled when fraud, payment abuse, pricing errors, inventory stockouts, shipping restrictions, incomplete information, or policy violations are suspected.',
            ),
            array(
                'question' => 'Are payments secure?',
                'answer'   => 'Yes. Checkout uses SSL encryption, and payments are handled by verified third-party payment providers that follow PCI-DSS standards. We do not store or have access to your full credit card details on our servers.',
            ),
        ),
    ),
    'shipping-delivery' => array(
        'title' => 'Shipping & Delivery',
        'icon'  => '<path d="M3 7h11v9H3z"/><path d="M14 10h4l3 3v3h-7z"/><circle cx="7" cy="18" r="2"/><circle cx="18" cy="18" r="2"/>',
        'items' => array(
            array(
                'question' => 'Where do you ship?',
                'answer'   => 'We currently ship eligible orders within the United States. Some products may have restrictions due to size, weight, carrier limits, product type, custom production needs, destination, or local regulations.',
            ),
            array(
                'question' => 'How long does shipping take?',
                'answer'   => 'Orders have a 5:00 PM PST cutoff. Handling time is usually 1-3 business days, Monday to Friday, excluding standard U.S. public holidays. Transit time is usually 5-7 business days, so estimated delivery is usually 6-10 business days from the purchase date.',
            ),
            array(
                'question' => 'How much does shipping cost?',
                'answer'   => 'Standard U.S. shipping is free for all orders nationwide with no minimum purchase requirement. If expedited or assisted shipping is available for your destination, the exact cost will be shown clearly at checkout before payment.',
            ),
            array(
                'question' => 'Which carriers do you use?',
                'answer'   => 'Orders may ship with USPS, UPS, FedEx, or DHL. The final carrier is selected when your package is labeled and prepared for shipment.',
            ),
            array(
                'question' => 'How do I track my package?',
                'answer'   => 'Once your order ships, tracking information is sent to the email address used at checkout. Please allow up to 24-48 hours for the tracking page to update after the carrier receives the package.',
                'link'     => array( 'url' => $track_url, 'label' => 'Track Your Order' ),
            ),
        ),
    ),
    'returns-exchanges' => array(
        'title' => 'Returns & Exchanges',
        'icon'  => '<path d="M3 12a9 9 0 1 0 3-6.7"/><path d="M3 4v5h5"/>',
        'items' => array(
            array(
                'question' => 'What is your return window?',
                'answer'   => 'Eligible items may be returned within 30 days from the day your order is delivered. Footwear must be unused, unworn, undamaged, and in original condition with original packaging, tags, inserts, accessories, and documents where applicable.',
            ),
            array(
                'question' => 'Do you charge a restocking fee?',
                'answer'   => 'No. We do not charge a restocking fee for eligible returns.',
            ),
            array(
                'question' => 'Who pays return shipping?',
                'answer'   => 'We cover return shipping or provide a prepaid return label when you received an incorrect item, defective item, or carrier-damaged item. For customer remorse, incorrect size selection, wrong color selection, change of mind, or orders placed by mistake, the customer is responsible for actual return shipping costs.',
            ),
            array(
                'question' => 'How do I start a return or exchange?',
                'answer'   => 'Contact support before sending anything back. Include your order number, email used at checkout, item details, reason for return, and photos or videos if the item is damaged, defective, incorrect, or missing parts. Unauthorized returns cannot be tracked or processed.',
                'link'     => array( 'url' => $returns_url, 'label' => 'Read Return Policy' ),
            ),
            array(
                'question' => 'Do you offer direct exchanges?',
                'answer'   => 'No. We do not process direct one-for-one exchanges. To get a different size, color, or model, return the eligible original item for a refund and place a new order on the website.',
            ),
            array(
                'question' => 'When will I receive my refund?',
                'answer'   => 'After your return reaches our returns center, we inspect it within 1-2 business days. If approved, the refund is issued to your original payment method within 7 business days. If you have not received it after 15 business days of approval, contact your bank or card provider first, then contact us.',
            ),
        ),
    ),
    'products-sizing' => array(
        'title' => 'Products, Sizing & Leather Care',
        'icon'  => '<path d="M6 20h12"/><path d="M7 16c3 1 7 1 10 0"/><path d="M8 4h8l1 12H7z"/>',
        'items' => array(
            array(
                'question' => 'How should I choose my size?',
                'answer'   => 'Review the size guide, product-page fit notes, measurement details, and style-specific information before ordering. Leather footwear fit can vary by silhouette, sole, closure, material, and handmade construction.',
            ),
            array(
                'question' => 'Will leather color and texture look exactly like the photos?',
                'answer'   => 'Natural leather may show variation in color, grain, texture, markings, and finish. Screen settings can also affect how colors appear online. Product images and descriptions should be reviewed as guidance for each item.',
            ),
            array(
                'question' => 'Can custom leather footwear be returned?',
                'answer'   => 'Personalized, engraved, resized, or custom-made leather footwear is final sale and non-returnable unless it arrives defective, damaged, incorrect, or return rights are required by applicable law. Please review customization notes and measurements before placing a custom order.',
            ),
            array(
                'question' => 'How should I care for leather footwear?',
                'answer'   => 'Follow the care notes shown on each product page. In general, keep leather footwear dry when possible, wipe away surface dirt with a soft cloth, store away from direct heat, and use leather care products suitable for the specific finish.',
            ),
        ),
    ),
    'support-policies' => array(
        'title' => 'Support & Policies',
        'icon'  => '<path d="M21 15a4 4 0 0 1-4 4H8l-5 3V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4z"/>',
        'items' => array(
            array(
                'question' => 'When is customer support available?',
                'answer'   => 'Customer support is available Monday - Friday, 9:00 AM - 5:00 PM, GMT-08:00 Pacific Standard Time (Los Angeles).',
            ),
            array(
                'question' => 'What should I include when contacting support?',
                'answer'   => 'Please include your order number, email used at checkout, delivery address if relevant, tracking number if available, photos if applicable, and a short description of the issue.',
            ),
            array(
                'question' => 'Where can I read the full store policies?',
                'answer'   => 'You can review the Shipping Policy, Return & Refund Policy, Privacy Policy, and Terms of Service for full details about shopping with Handcraft Shoe.',
            ),
            array(
                'question' => 'How is my personal information used?',
                'answer'   => 'We use order, custom footwear, device, and support information to process payments, prepare and ship orders, support returns and refunds, prevent fraud, maintain website functionality, and meet legal, tax, and accounting obligations. We do not sell, rent, or trade your personal information for third-party commercial marketing.',
            ),
        ),
    ),
);
?>

<style>
    .hcs-faq {
        --hcs-ink: #17212B;
        --hcs-pine: #2F4A43;
        --hcs-pine-deep: #243A35;
        --hcs-sage: #A7B7A5;
        --hcs-rose: #8B3A44;
        --hcs-fog: #E7E8E3;
        --hcs-ivory: #F7F3EC;
        --hcs-charcoal: #202326;
        --hcs-slate: #6E7472;
        background: var(--hcs-ivory);
        color: var(--hcs-charcoal);
        font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    }
    .hcs-faq-wrap { width: min(100% - 32px, 1180px); margin: 0 auto; }
    .hcs-faq-hero {
        padding: 82px 0 48px;
        background: linear-gradient(135deg, rgba(23,33,43,.94), rgba(47,74,67,.9));
        color: #fff;
    }
    .hcs-faq-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: rgba(247,243,236,.86);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .12em;
        text-transform: uppercase;
    }
    .hcs-faq-eyebrow::before { content: ""; width: 34px; height: 1px; background: var(--hcs-sage); }
    .hcs-faq-title {
        max-width: 880px;
        margin: 14px 0 0;
        color: inherit;
        font-family: Georgia, "Times New Roman", serif;
        font-size: clamp(42px, 6vw, 72px);
        font-weight: 600;
        line-height: 1.05;
        letter-spacing: 0;
    }
    .hcs-faq-lead {
        max-width: 760px;
        margin-top: 22px;
        color: rgba(247,243,236,.78);
        font-size: 18px;
        line-height: 1.75;
    }
    .hcs-faq-updated {
        margin: 18px 0 0;
        color: rgba(247,243,236,.86);
        font-size: 14px;
        font-weight: 800;
    }
    .hcs-faq-main { padding: 54px 0 86px; }
    .hcs-faq-layout { display: grid; grid-template-columns: 1fr; align-items: start; }
    .hcs-faq-content { display: grid; gap: 22px; }
    .hcs-faq-card,
    .hcs-faq-contact {
        border: 1px solid rgba(23,33,43,.1);
        background: #fff;
        box-shadow: 0 14px 34px rgba(23,33,43,.08);
    }
    .hcs-faq-copy { color: var(--hcs-slate); line-height: 1.75; }
    .hcs-faq-card { padding: 34px; border-radius: 24px; }
    .hcs-faq-card-head {
        display: grid;
        grid-template-columns: 52px minmax(0, 1fr);
        gap: 16px;
        align-items: center;
        margin-bottom: 22px;
    }
    .hcs-faq-icon {
        width: 52px;
        height: 52px;
        display: grid;
        place-items: center;
        border-radius: 16px;
        background: rgba(167,183,165,.32);
        color: var(--hcs-pine);
    }
    .hcs-faq-card h2,
    .hcs-faq-contact h2 {
        margin: 0;
        color: var(--hcs-ink);
        font-family: Georgia, "Times New Roman", serif;
        font-size: clamp(28px, 3vw, 38px);
        font-weight: 600;
        line-height: 1.14;
    }
    .hcs-faq-card-head p { margin: 8px 0 0; }
    .hcs-faq-items { display: grid; gap: 12px; }
    .hcs-faq-item {
        border: 1px solid rgba(23,33,43,.08);
        border-radius: 18px;
        background: var(--hcs-ivory);
        overflow: hidden;
    }
    .hcs-faq-item summary {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 34px;
        gap: 16px;
        align-items: center;
        min-height: 72px;
        padding: 18px 20px;
        color: var(--hcs-ink);
        font-size: 17px;
        font-weight: 800;
        cursor: pointer;
        list-style: none;
    }
    .hcs-faq-item summary::-webkit-details-marker { display: none; }
    .hcs-faq-item summary span:last-child {
        width: 34px;
        height: 34px;
        display: grid;
        place-items: center;
        border-radius: 999px;
        background: #fff;
        color: var(--hcs-pine);
        transition: transform .2s ease, background .2s ease, color .2s ease;
    }
    .hcs-faq-item[open] summary span:last-child { transform: rotate(180deg); background: var(--hcs-pine); color: #fff; }
    .hcs-faq-answer {
        padding: 0 20px 22px;
        color: var(--hcs-slate);
        line-height: 1.75;
    }
    .hcs-faq-answer p { margin: 0; }
    .hcs-faq-answer a,
    .hcs-faq-copy a {
        color: var(--hcs-pine);
        font-weight: 800;
        text-decoration: underline;
        text-underline-offset: 3px;
    }
    .hcs-faq-feature {
        background: var(--hcs-pine);
        color: #fff;
        border-color: rgba(23,33,43,.04);
    }
    .hcs-faq-feature h2,
    .hcs-faq-feature .hcs-faq-copy { color: #fff; }
    .hcs-faq-feature .hcs-faq-item {
        background: rgba(247,243,236,.07);
        border-color: rgba(247,243,236,.14);
    }
    .hcs-faq-feature .hcs-faq-item summary { color: #fff; }
    .hcs-faq-feature .hcs-faq-answer { color: rgba(247,243,236,.78); }
    .hcs-faq-feature .hcs-faq-icon { background: rgba(247,243,236,.1); color: var(--hcs-sage); }
    .hcs-faq-contact {
        padding: 32px;
        border-radius: 24px;
        background: var(--hcs-fog);
    }
    .hcs-faq-contact-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 14px; margin-top: 22px; }
    .hcs-faq-contact-item { padding: 18px; border: 1px solid rgba(23,33,43,.08); border-radius: 16px; background: #fff; }
    .hcs-faq-contact-item dt { margin-bottom: 7px; color: var(--hcs-pine); font-size: 12px; font-weight: 800; letter-spacing: .12em; text-transform: uppercase; }
    .hcs-faq-contact-item dd { margin: 0; color: var(--hcs-ink); font-weight: 800; line-height: 1.55; overflow-wrap: anywhere; }
    .hcs-faq-actions { display: flex; flex-wrap: wrap; gap: 12px; margin-top: 22px; }
    .hcs-faq-btn {
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
    .hcs-faq-btn:hover { transform: translateY(-1px); }
    .hcs-faq-btn-primary { background: var(--hcs-pine); border: 1px solid var(--hcs-pine); color: #fff; }
    .hcs-faq-btn-primary:hover { background: var(--hcs-pine-deep); border-color: var(--hcs-pine-deep); color: #fff; }
    .hcs-faq-btn-secondary { background: #fff; border: 1px solid var(--hcs-pine); color: var(--hcs-pine); }
    .hcs-faq-btn-secondary:hover { background: var(--hcs-ivory); color: var(--hcs-pine); }
    @media (max-width: 1023px) {
        .hcs-faq-layout { grid-template-columns: 1fr; }
    }
    @media (max-width: 700px) {
        .hcs-faq-hero { padding: 64px 0 38px; }
        .hcs-faq-main { padding: 36px 0 62px; }
        .hcs-faq-contact-grid { grid-template-columns: 1fr; }
        .hcs-faq-card,
        .hcs-faq-contact { padding: 24px; }
        .hcs-faq-card-head { grid-template-columns: 1fr; }
        .hcs-faq-item summary { grid-template-columns: minmax(0, 1fr) 30px; padding: 16px; font-size: 16px; }
        .hcs-faq-answer { padding: 0 16px 18px; }
    }
</style>

<div class="hcs-faq">
    <section class="hcs-faq-hero">
        <div class="hcs-faq-wrap">
            <span class="hcs-faq-eyebrow"><?php esc_html_e( 'Frequently Asked Questions', 'dawp' ); ?></span>
            <h1 class="hcs-faq-title"><?php esc_html_e( 'Answers for shopping handmade leather footwear.', 'dawp' ); ?></h1>
            <p class="hcs-faq-lead">
                <?php
                printf(
                    esc_html__( 'Find clear answers about orders, shipping, returns, sizing, leather care, custom footwear, and support at %s.', 'dawp' ),
                    esc_html( $store_name )
                );
                ?>
            </p>
            <p class="hcs-faq-updated"><?php esc_html_e( 'Last updated: May 27, 2026', 'dawp' ); ?></p>
        </div>
    </section>

    <section class="hcs-faq-main">
        <div class="hcs-faq-wrap hcs-faq-layout">
            <div class="hcs-faq-content">
                <?php foreach ( $faq_groups as $section_id => $group ) : ?>
                    <div id="<?php echo esc_attr( $section_id ); ?>" class="hcs-faq-card <?php echo 'returns-exchanges' === $section_id ? 'hcs-faq-feature' : ''; ?>">
                        <div class="hcs-faq-card-head">
                            <span class="hcs-faq-icon" aria-hidden="true">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><?php echo wp_kses( $group['icon'], array( 'rect' => array( 'x' => true, 'y' => true, 'width' => true, 'height' => true, 'rx' => true ), 'path' => array( 'd' => true ), 'circle' => array( 'cx' => true, 'cy' => true, 'r' => true ) ) ); ?></svg>
                            </span>
                            <div>
                                <h2><?php echo esc_html( $group['title'] ); ?></h2>
                                <p class="hcs-faq-copy"><?php esc_html_e( 'Current answers aligned with our store policies.', 'dawp' ); ?></p>
                            </div>
                        </div>

                        <div class="hcs-faq-items">
                            <?php foreach ( $group['items'] as $index => $item ) : ?>
                                <details class="hcs-faq-item" <?php echo 0 === $index ? 'open' : ''; ?>>
                                    <summary>
                                        <span><?php echo esc_html( $item['question'] ); ?></span>
                                        <span aria-hidden="true">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m6 9 6 6 6-6"/></svg>
                                        </span>
                                    </summary>
                                    <div class="hcs-faq-answer">
                                        <p><?php echo esc_html( $item['answer'] ); ?></p>
                                        <?php if ( ! empty( $item['link'] ) ) : ?>
                                            <p style="margin-top:12px;"><a href="<?php echo esc_url( $item['link']['url'] ); ?>"><?php echo esc_html( $item['link']['label'] ); ?></a></p>
                                        <?php endif; ?>
                                    </div>
                                </details>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div id="contact-information" class="hcs-faq-contact">
                    <h2><?php esc_html_e( 'Still Have Questions?', 'dawp' ); ?></h2>
                    <p class="hcs-faq-copy">
                        <?php
                        printf(
                            esc_html__( 'Contact %s support and include your order number, checkout email, tracking number, and photos if your question involves shipping damage, defects, or missing items.', 'dawp' ),
                            esc_html( $store_name )
                        );
                        ?>
                    </p>
                    <dl class="hcs-faq-contact-grid">
                        <div class="hcs-faq-contact-item"><dt><?php esc_html_e( 'Store Name', 'dawp' ); ?></dt><dd><?php echo esc_html( $store_name ); ?></dd></div>
                        <div class="hcs-faq-contact-item"><dt><?php esc_html_e( 'Website', 'dawp' ); ?></dt><dd><?php echo esc_html( $website_domain ); ?></dd></div>
                        <div class="hcs-faq-contact-item"><dt><?php esc_html_e( 'Email', 'dawp' ); ?></dt><dd><a href="mailto:<?php echo esc_attr( $support_email ); ?>"><?php echo esc_html( $support_email ); ?></a></dd></div>
                        <div class="hcs-faq-contact-item"><dt><?php esc_html_e( 'Service Hours', 'dawp' ); ?></dt><dd><?php esc_html_e( 'Monday - Friday, 9:00 AM - 5:00 PM, GMT-08:00 Pacific Standard Time (Los Angeles)', 'dawp' ); ?></dd></div>
                    </dl>
                    <div class="hcs-faq-actions">
                        <a class="hcs-faq-btn hcs-faq-btn-primary" href="<?php echo esc_url( $contact_url ); ?>"><?php esc_html_e( 'Contact Support', 'dawp' ); ?></a>
                        <a class="hcs-faq-btn hcs-faq-btn-secondary" href="mailto:<?php echo esc_attr( $support_email ); ?>"><?php esc_html_e( 'Email Us', 'dawp' ); ?></a>
                        <a class="hcs-faq-btn hcs-faq-btn-secondary" href="<?php echo esc_url( $shop_url ); ?>"><?php esc_html_e( 'Shop Footwear', 'dawp' ); ?></a>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
