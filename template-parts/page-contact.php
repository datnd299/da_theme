<?php
/**
 * Template Part: Handcraft Shoe - Contact Page
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$store_name     = 'Handcraft Shoe';
$website_domain = 'handcraftshoe.com';
$support_email  = 'support@handcraftshoe.com';
$service_hours  = 'Monday - Friday, 9:00 AM - 5:00 PM, GMT-08:00 Pacific Standard Time (Los Angeles)';
$home_image_source = get_template_directory_uri() . '/assets/img/handcraft-footwear-home.png';
$home_image        = dawp_i0_image_url($home_image_source, 1600, 1067);
$home_image_tablet = dawp_i0_image_url($home_image_source, 1024, 683);
$home_image_mobile = dawp_i0_image_url($home_image_source, 700, 467);
$panel_image       = dawp_i0_image_url($home_image_source, 760, 507);
$panel_image_mobile = dawp_i0_image_url($home_image_source, 520, 347);
$shipping_url   = home_url( '/shipping-policy/' );
$returns_url    = home_url( '/refund-return-policy/' );
$track_url      = home_url( '/track-order/' );
$faq_url        = home_url( '/faq/' );

$support_cards = array(
    array(
        'title' => __( 'Order Tracking', 'dawp' ),
        'text'  => __( 'Use your order details to check shipment status, carrier updates, and delivery progress.', 'dawp' ),
        'url'   => $track_url,
        'link'  => __( 'Track Order', 'dawp' ),
    ),
    array(
        'title' => __( 'Returns & Exchanges', 'dawp' ),
        'text'  => __( 'Review return authorization, footwear condition requirements, exchange availability, and refund timing.', 'dawp' ),
        'url'   => $returns_url,
        'link'  => __( 'Read Return Policy', 'dawp' ),
    ),
);
?>

<style>
    .hcs-contact {
        --hcs-contact-hero-image: var(--hcs-contact-hero-image-desktop);
        --hcs-contact-panel-image: var(--hcs-contact-panel-image-desktop);
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
    .hcs-contact a { text-decoration: none; }
    .hcs-contact-wrap { width: min(100% - 32px, 1180px); margin: 0 auto; }
    .hcs-contact-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: var(--hcs-pine);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .12em;
        text-transform: uppercase;
    }
    .hcs-contact-eyebrow::before { content: ""; width: 34px; height: 1px; background: var(--hcs-rose); }
    .hcs-contact-title {
        margin: 0;
        color: var(--hcs-ink);
        font-family: Georgia, "Times New Roman", serif;
        font-weight: 600;
        line-height: 1.05;
        letter-spacing: 0;
    }
    .hcs-contact-copy { color: var(--hcs-slate); line-height: 1.75; }
    .hcs-contact-hero {
        padding: 90px 0 58px;
        background:
            linear-gradient(90deg, rgba(23,33,43,.9) 0%, rgba(23,33,43,.7) 48%, rgba(23,33,43,.24) 100%),
            var(--hcs-contact-hero-image) center/cover no-repeat;
        color: #fff;
    }
    .hcs-contact-hero .hcs-contact-eyebrow,
    .hcs-contact-hero .hcs-contact-copy { color: rgba(247,243,236,.82); }
    .hcs-contact-hero .hcs-contact-eyebrow::before { background: var(--hcs-sage); }
    .hcs-contact-hero .hcs-contact-title {
        max-width: 760px;
        margin-top: 14px;
        color: #fff;
        font-size: clamp(42px, 6vw, 74px);
    }
    .hcs-contact-hero .hcs-contact-copy {
        max-width: 720px;
        margin: 22px 0 0;
        font-size: 18px;
    }
    .hcs-contact-main { padding: 64px 0 88px; }
    .hcs-contact-grid {
        display: grid;
        grid-template-columns: .86fr 1.14fr;
        gap: 34px;
        align-items: start;
    }
    .hcs-contact-panel,
    .hcs-contact-form-card,
    .hcs-contact-help-card {
        border: 1px solid rgba(23,33,43,.1);
        background: #fff;
        box-shadow: 0 14px 34px rgba(23,33,43,.08);
    }
    .hcs-contact-panel { border-radius: 24px; overflow: hidden; }
    .hcs-contact-image {
        min-height: 330px;
        background-image: var(--hcs-contact-panel-image);
        background-size: 205% 205%;
        background-position: top left;
    }
    .hcs-contact-info { display: grid; gap: 16px; padding: 26px; }
    .hcs-contact-info-item {
        display: grid;
        grid-template-columns: 50px 1fr;
        gap: 15px;
        align-items: start;
        padding: 18px;
        border-radius: 18px;
        background: var(--hcs-ivory);
        border: 1px solid rgba(23,33,43,.08);
    }
    .hcs-contact-icon {
        width: 50px;
        height: 50px;
        display: grid;
        place-items: center;
        border-radius: 15px;
        background: rgba(167,183,165,.32);
        color: var(--hcs-pine);
    }
    .hcs-contact-info-item h3 {
        margin: 0 0 5px;
        color: var(--hcs-ink);
        font-size: 17px;
        font-weight: 800;
    }
    .hcs-contact-info-item p,
    .hcs-contact-info-item a {
        margin: 0;
        color: var(--hcs-slate);
        line-height: 1.6;
        font-size: 14px;
    }
    .hcs-contact-info-item a:hover { color: var(--hcs-pine); }
    .hcs-contact-form-card {
        padding: 34px;
        border-radius: 24px;
    }
    .hcs-contact-form-head {
        display: flex;
        justify-content: space-between;
        gap: 24px;
        align-items: start;
        margin-bottom: 28px;
    }
    .hcs-contact-form-head .hcs-contact-title { font-size: clamp(30px, 4vw, 44px); }
    .hcs-contact-badge {
        flex: 0 0 auto;
        display: inline-flex;
        align-items: center;
        min-height: 38px;
        padding: 8px 13px;
        border-radius: 999px;
        background: var(--hcs-fog);
        color: var(--hcs-pine);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .08em;
        text-transform: uppercase;
    }
    .hcs-contact-form { display: grid; gap: 20px; }
    .hcs-contact-fields { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 18px; }
    .hcs-contact-field { display: grid; gap: 8px; }
    .hcs-contact-field label {
        color: var(--hcs-ink);
        font-size: 14px;
        font-weight: 800;
    }
    .hcs-contact-required { color: var(--hcs-rose); }
    .hcs-contact-field input,
    .hcs-contact-field select,
    .hcs-contact-field textarea {
        width: 100%;
        min-height: 50px;
        border: 1px solid rgba(23,33,43,.14);
        border-radius: 16px;
        background: var(--hcs-ivory);
        color: var(--hcs-charcoal);
        padding: 13px 15px;
        font: inherit;
        transition: border-color .2s ease, box-shadow .2s ease, background .2s ease;
    }
    .hcs-contact-field textarea {
        min-height: 150px;
        resize: vertical;
    }
    .hcs-contact-field input:focus,
    .hcs-contact-field select:focus,
    .hcs-contact-field textarea:focus {
        outline: 0;
        border-color: var(--hcs-pine);
        background: #fff;
        box-shadow: 0 0 0 3px rgba(167,183,165,.34);
    }
    .hcs-contact-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 50px;
        padding: 13px 24px;
        border: 1px solid var(--hcs-pine);
        border-radius: 999px;
        background: var(--hcs-pine);
        color: #fff;
        font-size: 14px;
        font-weight: 800;
        cursor: pointer;
        transition: background .2s ease, border-color .2s ease, transform .2s ease;
    }
    .hcs-contact-btn:hover { background: var(--hcs-pine-deep); border-color: var(--hcs-pine-deep); transform: translateY(-1px); }
    .hcs-contact-btn:disabled { cursor: wait; opacity: .68; transform: none; }
    .hcs-contact-note { margin: 0; color: var(--hcs-slate); font-size: 13px; line-height: 1.6; }
    #contact-msg { margin: 0; font-size: 14px; font-weight: 800; }
    .hcs-contact-help { padding: 0 0 86px; }
    .hcs-contact-help-head {
        display: flex;
        justify-content: space-between;
        gap: 32px;
        align-items: end;
        margin-bottom: 28px;
    }
    .hcs-contact-help-head .hcs-contact-title { font-size: clamp(32px, 4vw, 50px); margin-top: 12px; }
    .hcs-contact-help-head .hcs-contact-copy { max-width: 470px; margin: 0; }
    .hcs-contact-help-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 18px; }
    .hcs-contact-help-card {
        display: flex;
        min-height: 245px;
        flex-direction: column;
        padding: 28px;
        border-radius: 22px;
    }
    .hcs-contact-help-card h3 {
        margin: 0 0 12px;
        color: var(--hcs-ink);
        font-family: Georgia, "Times New Roman", serif;
        font-size: 28px;
        font-weight: 600;
        line-height: 1.12;
    }
    .hcs-contact-help-card p {
        margin: 0;
        color: var(--hcs-slate);
        line-height: 1.7;
    }
    .hcs-contact-help-card a {
        margin-top: auto;
        padding-top: 22px;
        color: var(--hcs-pine);
        font-size: 14px;
        font-weight: 800;
        border-bottom: 2px solid var(--hcs-sage);
        width: fit-content;
    }
    .hcs-contact-cta {
        padding: 72px 0 86px;
        background: var(--hcs-ink);
        color: #fff;
        text-align: center;
    }
    .hcs-contact-cta .hcs-contact-title {
        max-width: 760px;
        margin: 0 auto;
        color: #fff;
        font-size: clamp(34px, 5vw, 56px);
    }
    .hcs-contact-cta .hcs-contact-copy {
        max-width: 680px;
        margin: 18px auto 0;
        color: rgba(247,243,236,.78);
    }
    .hcs-contact-cta-actions {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 12px;
        margin-top: 28px;
    }
    .hcs-contact-link-btn {
        display: inline-flex;
        min-height: 48px;
        align-items: center;
        justify-content: center;
        border-radius: 999px;
        padding: 13px 22px;
        font-size: 14px;
        font-weight: 800;
    }
    .hcs-contact-link-btn.primary { background: #fff; color: var(--hcs-pine); border: 1px solid #fff; }
    .hcs-contact-link-btn.secondary { color: #fff; border: 1px solid rgba(247,243,236,.72); }
    .hcs-contact-link-btn.secondary:hover { background: rgba(255,255,255,.1); }
    @media (max-width: 1023px) {
        .hcs-contact-grid,
        .hcs-contact-help-grid { grid-template-columns: 1fr; }
        .hcs-contact { --hcs-contact-hero-image: url('<?php echo esc_url( $home_image_tablet ); ?>'); }
        .hcs-contact-help-card { min-height: 0; }
    }
    @media (max-width: 700px) {
        .hcs-contact { --hcs-contact-hero-image: url('<?php echo esc_url( $home_image_mobile ); ?>'); --hcs-contact-panel-image: url('<?php echo esc_url( $panel_image_mobile ); ?>'); }
        .hcs-contact-hero { padding: 70px 0 42px; }
        .hcs-contact-main { padding: 42px 0 64px; }
        .hcs-contact-form-card { padding: 24px; }
        .hcs-contact-form-head,
        .hcs-contact-help-head { display: block; }
        .hcs-contact-badge { margin-top: 16px; }
        .hcs-contact-fields { grid-template-columns: 1fr; }
        .hcs-contact-info-item { grid-template-columns: 1fr; }
    }
</style>

<div class="hcs-contact" style="--hcs-contact-hero-image-desktop: url('<?php echo esc_url( $home_image ); ?>'); --hcs-contact-panel-image-desktop: url('<?php echo esc_url( $panel_image ); ?>');">
    <section class="hcs-contact-hero">
        <div class="hcs-contact-wrap">
            <span class="hcs-contact-eyebrow"><?php esc_html_e( 'Contact Handcraft Shoe', 'dawp' ); ?></span>
            <h1 class="hcs-contact-title"><?php esc_html_e( 'Support for handmade leather footwear orders.', 'dawp' ); ?></h1>
            <p class="hcs-contact-copy">
                <?php esc_html_e( 'Have a question about sizing, fit, care, shipping, returns, or a recent order? Our customer care team is here to help with clear information before and after checkout.', 'dawp' ); ?>
            </p>
        </div>
    </section>

    <section class="hcs-contact-main">
        <div class="hcs-contact-wrap hcs-contact-grid">
            <aside class="hcs-contact-panel" aria-label="<?php esc_attr_e( 'Handcraft Shoe contact details', 'dawp' ); ?>">
                <div class="hcs-contact-image" aria-hidden="true"></div>
                <div class="hcs-contact-info">
                    <div class="hcs-contact-info-item">
                        <span class="hcs-contact-icon" aria-hidden="true">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16v16H4z"/><path d="m22 6-10 7L2 6"/></svg>
                        </span>
                        <div>
                            <h3><?php esc_html_e( 'Email Support', 'dawp' ); ?></h3>
                            <p><a href="mailto:<?php echo esc_attr( $support_email ); ?>"><?php echo esc_html( $support_email ); ?></a></p>
                        </div>
                    </div>
                    <div class="hcs-contact-info-item">
                        <span class="hcs-contact-icon" aria-hidden="true">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                        </span>
                        <div>
                            <h3><?php esc_html_e( 'Service Hours', 'dawp' ); ?></h3>
                            <p><?php echo esc_html( $service_hours ); ?></p>
                        </div>
                    </div>
                    <div class="hcs-contact-info-item">
                        <span class="hcs-contact-icon" aria-hidden="true">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 7h18"/><path d="M7 7v14"/><path d="M17 7v14"/><path d="M9 3h6l2 4H7l2-4z"/></svg>
                        </span>
                        <div>
                            <h3><?php esc_html_e( 'Store Details', 'dawp' ); ?></h3>
                            <p><?php echo esc_html( $store_name ); ?><br><?php echo esc_html( $website_domain ); ?></p>
                        </div>
                    </div>
                </div>
            </aside>

            <div class="hcs-contact-form-card">
                <div class="hcs-contact-form-head">
                    <div>
                        <span class="hcs-contact-eyebrow"><?php esc_html_e( 'Send A Message', 'dawp' ); ?></span>
                        <h2 class="hcs-contact-title"><?php esc_html_e( 'Tell us how we can help.', 'dawp' ); ?></h2>
                    </div>
                    <span class="hcs-contact-badge"><?php esc_html_e( 'Response: 24 business hours', 'dawp' ); ?></span>
                </div>

                <form id="contact-form" class="hcs-contact-form">
                    <div class="hcs-contact-fields">
                        <div class="hcs-contact-field">
                            <label for="contact_name"><?php esc_html_e( 'Your Name', 'dawp' ); ?> <span class="hcs-contact-required">*</span></label>
                            <input type="text" id="contact_name" name="name" required placeholder="<?php esc_attr_e( 'e.g. Alex Morgan', 'dawp' ); ?>">
                        </div>
                        <div class="hcs-contact-field">
                            <label for="contact_email"><?php esc_html_e( 'Email Address', 'dawp' ); ?> <span class="hcs-contact-required">*</span></label>
                            <input type="email" id="contact_email" name="email" required placeholder="<?php esc_attr_e( 'alex@example.com', 'dawp' ); ?>">
                        </div>
                    </div>

                    <div class="hcs-contact-field">
                        <label for="contact_subject"><?php esc_html_e( 'Topic', 'dawp' ); ?></label>
                        <select id="contact_subject" name="subject">
                            <option value="general"><?php esc_html_e( 'General Question', 'dawp' ); ?></option>
                            <option value="order"><?php esc_html_e( 'Order Status or Tracking', 'dawp' ); ?></option>
                            <option value="styling"><?php esc_html_e( 'Sizing, Fit, or Product Details', 'dawp' ); ?></option>
                            <option value="return"><?php esc_html_e( 'Returns or Exchanges', 'dawp' ); ?></option>
                        </select>
                    </div>

                    <div class="hcs-contact-field">
                        <label for="contact_message"><?php esc_html_e( 'Message', 'dawp' ); ?> <span class="hcs-contact-required">*</span></label>
                        <textarea id="contact_message" name="message" rows="6" required placeholder="<?php esc_attr_e( 'Please include your order number if your message is about an existing order.', 'dawp' ); ?>"></textarea>
                    </div>

                    <button type="submit" class="hcs-contact-btn"><?php esc_html_e( 'Send Message', 'dawp' ); ?></button>
                    <p id="contact-msg" aria-live="polite" style="display:none"></p>
                    <p class="hcs-contact-note">
                        <?php esc_html_e( 'For order help, include your order number, email used at checkout, product name, and a short description of the issue.', 'dawp' ); ?>
                    </p>
                </form>
            </div>
        </div>
    </section>

    <section class="hcs-contact-help">
        <div class="hcs-contact-wrap">
            <div class="hcs-contact-help-head">
                <div>
                    <span class="hcs-contact-eyebrow"><?php esc_html_e( 'Quick Help', 'dawp' ); ?></span>
                    <h2 class="hcs-contact-title"><?php esc_html_e( 'Find common answers faster.', 'dawp' ); ?></h2>
                </div>
                <p class="hcs-contact-copy"><?php esc_html_e( 'Review the most useful customer care pages for handmade leather shoes, leather sandals, leather boots, and custom leather footwear.', 'dawp' ); ?></p>
            </div>

            <div class="hcs-contact-help-grid">
                <?php foreach ( $support_cards as $card ) : ?>
                    <article class="hcs-contact-help-card">
                        <h3><?php echo esc_html( $card['title'] ); ?></h3>
                        <p><?php echo esc_html( $card['text'] ); ?></p>
                        <a href="<?php echo esc_url( $card['url'] ); ?>"><?php echo esc_html( $card['link'] ); ?></a>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="hcs-contact-cta">
        <div class="hcs-contact-wrap">
            <h2 class="hcs-contact-title"><?php esc_html_e( 'Need policy details before you order?', 'dawp' ); ?></h2>
            <p class="hcs-contact-copy"><?php esc_html_e( 'Shipping, return, and FAQ pages explain timelines, eligibility, footwear condition requirements, and how to prepare for a smooth purchase.', 'dawp' ); ?></p>
            <div class="hcs-contact-cta-actions">
                <a class="hcs-contact-link-btn primary" href="<?php echo esc_url( $shipping_url ); ?>"><?php esc_html_e( 'Shipping Policy', 'dawp' ); ?></a>
                <a class="hcs-contact-link-btn secondary" href="<?php echo esc_url( $returns_url ); ?>"><?php esc_html_e( 'Return Policy', 'dawp' ); ?></a>
                <a class="hcs-contact-link-btn secondary" href="<?php echo esc_url( $faq_url ); ?>"><?php esc_html_e( 'Read FAQs', 'dawp' ); ?></a>
            </div>
        </div>
    </section>
</div>
