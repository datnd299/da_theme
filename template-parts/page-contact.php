<?php
/**
 * Contact page content.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$shop_url     = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$track_url    = home_url('/track-order/');
$faq_url      = home_url('/faq/');
$returns_url  = home_url('/return-refund-policy/');
$shipping_url = home_url('/shipping-policy/');
$privacy_url  = home_url('/privacy-policy/');
$status       = isset($_GET['contact_status']) ? sanitize_key(wp_unslash($_GET['contact_status'])) : '';

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$contact_topics = [
    'order'   => __('Order or tracking question', 'dawp'),
    'return'  => __('Return or refund request', 'dawp'),
    'product' => __('Product question', 'dawp'),
    'privacy' => __('Privacy request', 'dawp'),
    'other'   => __('General support', 'dawp'),
];

$support_cards = [
    [
        'title' => __('Track an order', 'dawp'),
        'copy'  => __('Check the latest shipping status and delivery details for a recent purchase.', 'dawp'),
        'url'   => $track_url,
        'label' => __('Open tracking', 'dawp'),
        'icon'  => '<path d="M3 7h11v10H3z"></path><path d="M14 10h4l3 3v4h-4z"></path><circle cx="7" cy="19" r="2"></circle><circle cx="18" cy="19" r="2"></circle>',
    ],
    [
        'title' => __('Returns and refunds', 'dawp'),
        'copy'  => __('Review eligibility, return steps and refund timing before sending an item back.', 'dawp'),
        'url'   => $returns_url,
        'label' => __('View policy', 'dawp'),
        'icon'  => '<path d="m9 14-4-4 4-4"></path><path d="M5 10h10a4 4 0 0 1 0 8h-2"></path>',
    ],
    [
        'title' => __('Shipping questions', 'dawp'),
        'copy'  => __('Find processing windows, carrier notes and delivery support details.', 'dawp'),
        'url'   => $shipping_url,
        'label' => __('Read shipping info', 'dawp'),
        'icon'  => '<path d="M5 8h14"></path><path d="M7 8l1 12h8l1-12"></path><path d="M9 8V6a3 3 0 0 1 6 0v2"></path>',
    ],
    [
        'title' => __('Common answers', 'dawp'),
        'copy'  => __('Get quick help with payments, accounts, product details and order changes.', 'dawp'),
        'url'   => $faq_url,
        'label' => __('Browse FAQs', 'dawp'),
        'icon'  => '<circle cx="12" cy="12" r="9"></circle><path d="M9.6 9a2.6 2.6 0 0 1 5 1c0 2-2.6 2.2-2.6 4"></path><path d="M12 17.5h.01"></path>',
    ],
];
?>

<style>
    .cf-contact { --cf-orange:#F58220; --cf-orange-dark:#E96F00; --cf-white:#FFFFFF; --cf-charcoal:#222222; --cf-text:#666666; --cf-light:#8A8A8A; --cf-bg:#FAFAFA; --cf-border:#E9ECEF; --cf-green:#43A047; --cf-red:#E64A3B; --cf-font-heading:'Manrope', 'Inter', Arial, sans-serif; --cf-font-body:'Inter', Arial, sans-serif; --cf-radius:16px; background:var(--cf-white); color:var(--cf-text); font-family:var(--cf-font-body); letter-spacing:0; }
    .cf-contact * { box-sizing:border-box; }
    .cf-contact p, .cf-contact h1, .cf-contact h2, .cf-contact h3 { margin:0; }
    .cf-contact h1, .cf-contact h2, .cf-contact h3 { color:var(--cf-charcoal); font-family:var(--cf-font-heading); font-weight:800; letter-spacing:-0.01em; line-height:1.15; }
    .cf-contact a { color:inherit; }
    .cf-contact-container { width:min(100% - 40px, 1180px); margin-inline:auto; }
    .cf-contact-eyebrow { margin:0 0 10px; color:var(--cf-orange); font-size:.78rem; font-weight:800; letter-spacing:.1em; text-transform:uppercase; }
    .cf-contact-btn { display:inline-flex; align-items:center; justify-content:center; gap:8px; min-height:48px; border-radius:999px; padding:0 26px; font-size:.92rem; font-weight:700; text-decoration:none; transition:background 220ms ease, color 220ms ease, border-color 220ms ease, transform 220ms ease, box-shadow 220ms ease; }
    .cf-contact-btn.cf-contact-btn--primary { border:1px solid var(--cf-orange); background:var(--cf-orange); color:var(--cf-white); }
    .cf-contact-btn.cf-contact-btn--primary:hover { border-color:var(--cf-orange-dark); background:var(--cf-orange-dark); color:var(--cf-white); transform:translateY(-1px); box-shadow:0 12px 26px rgba(245,130,32,.28); }
    .cf-contact-btn.cf-contact-btn--secondary { border:1px solid var(--cf-orange); background:transparent; color:var(--cf-orange); }
    .cf-contact-btn.cf-contact-btn--secondary:hover { background:var(--cf-orange); color:var(--cf-white); transform:translateY(-1px); }
    .cf-contact-hero { background:var(--cf-bg); border-bottom:1px solid var(--cf-border); padding:42px 0 56px; }
    .cf-contact-hero__grid { display:grid; gap:30px; align-items:center; }
    .cf-contact-hero h1 { max-width:660px; font-size:clamp(2rem, 4.4vw, 3.1rem); }
    .cf-contact-hero__copy { max-width:620px; margin-top:18px; color:var(--cf-text); font-size:clamp(1rem, 1.6vw, 1.1rem); line-height:1.7; }
    .cf-contact-hero__actions, .cf-contact-proof { display:flex; flex-wrap:wrap; gap:12px; }
    .cf-contact-hero__actions { margin-top:28px; }
    .cf-contact-proof { margin-top:26px; gap:16px 22px; }
    .cf-contact-proof span { display:inline-flex; align-items:center; gap:8px; color:var(--cf-charcoal); font-size:.84rem; font-weight:700; }
    .cf-contact-proof svg { color:var(--cf-green); flex:none; }
    .cf-contact-hero__panel { border:1px solid var(--cf-border); border-radius:var(--cf-radius); background:var(--cf-white); padding:24px; box-shadow:0 24px 48px rgba(34,34,34,.1); }
    .cf-contact-hero__panel h2 { font-size:1.35rem; }
    .cf-contact-hero__panel p { margin-top:12px; line-height:1.65; }
    .cf-contact-hours { display:grid; gap:12px; margin-top:22px; }
    .cf-contact-hours div { display:flex; justify-content:space-between; gap:16px; border-top:1px solid var(--cf-border); padding-top:12px; font-size:.92rem; }
    .cf-contact-hours strong { color:var(--cf-charcoal); }
    .cf-contact-section { padding:64px 0; }
    .cf-contact-section--soft { background:var(--cf-bg); }
    .cf-contact-section__head { display:flex; align-items:end; justify-content:space-between; gap:20px; margin-bottom:30px; }
    .cf-contact-section__head h2 { font-size:clamp(1.6rem, 2.6vw, 2.35rem); }
    .cf-contact-section__head p:not(.cf-contact-eyebrow) { max-width:560px; margin-top:10px; line-height:1.65; }
    .cf-contact-grid { display:grid; gap:24px; align-items:start; }
    .cf-contact-form-card, .cf-contact-info-card, .cf-contact-card { border:1px solid var(--cf-border); border-radius:var(--cf-radius); background:var(--cf-white); box-shadow:0 18px 40px rgba(34,34,34,.08); }
    .cf-contact-form-card { padding:24px; }
    .cf-contact-alert { border-radius:14px; margin-bottom:18px; padding:14px 16px; font-size:.92rem; font-weight:700; line-height:1.5; }
    .cf-contact-alert--success { border:1px solid rgba(67,160,71,.28); background:rgba(67,160,71,.08); color:#43A047; }
    .cf-contact-alert--error { border:1px solid rgba(230,74,59,.28); background:rgba(230,74,59,.08); color:#E64A3B; }
    .cf-contact-form { display:grid; gap:16px; }
    .cf-contact-field { display:grid; gap:8px; }
    .cf-contact-field label { color:var(--cf-charcoal); font-size:.88rem; font-weight:800; }
    .cf-contact-field input, .cf-contact-field select, .cf-contact-field textarea { width:100%; border:1px solid var(--cf-border); border-radius:12px; background:var(--cf-white); color:var(--cf-charcoal); font:inherit; font-size:.94rem; padding:13px 14px; transition:border-color 180ms ease, box-shadow 180ms ease; }
    .cf-contact-field textarea { min-height:150px; resize:vertical; }
    .cf-contact-field input:focus, .cf-contact-field select:focus, .cf-contact-field textarea:focus { outline:0; border-color:var(--cf-orange); box-shadow:0 0 0 4px rgba(245,130,32,.14); }
    .cf-contact-field ::placeholder { color:#8A8A8A; }
    .cf-contact-form__row { display:grid; gap:16px; }
    .cf-contact-form__note { color:var(--cf-light); font-size:.82rem; line-height:1.55; }
    .cf-contact-honeypot { position:absolute; left:-9999px; width:1px; height:1px; overflow:hidden; }
    .cf-contact-info-card { padding:24px; }
    .cf-contact-info-card + .cf-contact-info-card { margin-top:18px; }
    .cf-contact-info-card h3 { font-size:1.12rem; }
    .cf-contact-info-list { display:grid; gap:14px; margin:18px 0 0; padding:0; list-style:none; }
    .cf-contact-info-list li { display:flex; gap:12px; line-height:1.55; }
    .cf-contact-info-list svg { width:20px; height:20px; flex:none; color:var(--cf-orange); fill:none; stroke:currentColor; stroke-width:2; stroke-linecap:round; stroke-linejoin:round; margin-top:2px; }
    .cf-contact-info-list strong { display:block; color:var(--cf-charcoal); font-size:.9rem; }
    .cf-contact-info-list span, .cf-contact-info-list a { color:var(--cf-text); font-size:.9rem; text-decoration:none; overflow-wrap:anywhere; }
    .cf-contact-info-list a:hover { color:var(--cf-orange); text-decoration:underline; text-underline-offset:3px; }
    .cf-contact-card-grid { display:grid; gap:16px; }
    .cf-contact-card { display:flex; flex-direction:column; min-height:100%; padding:22px; color:inherit; text-decoration:none; transition:transform 240ms ease, box-shadow 240ms ease, border-color 240ms ease; }
    .cf-contact-card:hover { border-color:var(--cf-orange); transform:translateY(-4px); box-shadow:0 20px 40px rgba(34,34,34,.12); }
    .cf-contact-card__icon { display:inline-flex; align-items:center; justify-content:center; width:44px; height:44px; margin-bottom:14px; border-radius:999px; background:var(--cf-bg); color:var(--cf-orange); }
    .cf-contact-card__icon svg { width:22px; height:22px; fill:none; stroke:currentColor; stroke-width:1.9; stroke-linecap:round; stroke-linejoin:round; }
    .cf-contact-card h3 { font-size:1rem; }
    .cf-contact-card p { margin-top:8px; font-size:.9rem; line-height:1.6; }
    .cf-contact-card em { margin-top:auto; padding-top:16px; color:var(--cf-orange); font-size:.84rem; font-style:normal; font-weight:800; }
    .cf-contact-cta { background:var(--cf-charcoal); color:var(--cf-white); padding:52px 0; }
    .cf-contact-cta__inner { display:grid; gap:22px; align-items:center; }
    .cf-contact-cta h2 { color:var(--cf-white); font-size:clamp(1.5rem, 2.6vw, 2.1rem); }
    .cf-contact-cta p { max-width:560px; margin-top:10px; color:rgba(255,255,255,.72); line-height:1.6; }
    .cf-contact-cta__actions { display:flex; flex-wrap:wrap; gap:10px; }
    @media (max-width:759px) {
        .cf-contact-section__head { flex-direction:column; align-items:start; }
        .cf-contact-card-grid { display:flex; gap:14px; margin-inline:-20px; overflow-x:auto; overscroll-behavior-x:contain; padding-inline:20px; padding-bottom:6px; scroll-snap-type:x mandatory; scrollbar-width:none; }
        .cf-contact-card-grid::-webkit-scrollbar { display:none; }
        .cf-contact-card { flex:0 0 clamp(16rem, 82vw, 20rem); max-width:clamp(16rem, 82vw, 20rem); scroll-snap-align:start; }
        .cf-contact-hero__panel, .cf-contact-form-card, .cf-contact-info-card { padding:20px; }
        .cf-contact-btn { width:100%; }
    }
    @media (min-width:760px) {
        .cf-contact-hero__grid { grid-template-columns:1.05fr .95fr; min-height:420px; }
        .cf-contact-grid { grid-template-columns:minmax(0, 1.2fr) minmax(300px, .8fr); }
        .cf-contact-form__row { grid-template-columns:repeat(2, minmax(0, 1fr)); }
        .cf-contact-card-grid { grid-template-columns:repeat(2, minmax(0, 1fr)); }
        .cf-contact-cta__inner { grid-template-columns:1fr auto; }
    }
    @media (min-width:1024px) {
        .cf-contact-section { padding:88px 0; }
        .cf-contact-card-grid { grid-template-columns:repeat(4, minmax(0, 1fr)); }
    }
</style>

<div class="cf-contact">
    <section class="cf-contact-hero" aria-labelledby="cf-contact-title">
        <div class="cf-contact-container cf-contact-hero__grid">
            <div>
                <p class="cf-contact-eyebrow"><?php esc_html_e('Customer Support', 'dawp'); ?></p>
                <h1 id="cf-contact-title"><?php esc_html_e('We are here to help with every Crowdfused order.', 'dawp'); ?></h1>
                <p class="cf-contact-hero__copy"><?php esc_html_e('Send us a note about tracking, returns, product details or account questions. The more detail you share, the faster we can point you in the right direction.', 'dawp'); ?></p>
                <div class="cf-contact-hero__actions">
                    <a class="cf-contact-btn cf-contact-btn--primary" href="#contact-form"><?php esc_html_e('Send a Message', 'dawp'); ?></a>
                    <a class="cf-contact-btn cf-contact-btn--secondary" href="<?php echo esc_url($track_url); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a>
                </div>
                <div class="cf-contact-proof">
                    <span><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"></path></svg><?php esc_html_e('Secure support form', 'dawp'); ?></span>
                    <span><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"></path></svg><?php esc_html_e('Order details protected', 'dawp'); ?></span>
                    <span><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"></path></svg><?php esc_html_e('Helpful policy links', 'dawp'); ?></span>
                </div>
            </div>
            <aside class="cf-contact-hero__panel" aria-labelledby="cf-response-title">
                <p class="cf-contact-eyebrow"><?php esc_html_e('Support Window', 'dawp'); ?></p>
                <h2 id="cf-response-title"><?php esc_html_e('Response times', 'dawp'); ?></h2>
                <p><?php esc_html_e('Most messages receive a reply within one business day. Order-specific requests are easier to resolve when you include your order number.', 'dawp'); ?></p>
                <div class="cf-contact-hours">
                    <div><strong><?php esc_html_e('Monday-Friday', 'dawp'); ?></strong><span><?php esc_html_e('9:00 AM-6:00 PM', 'dawp'); ?></span></div>
                    <div><strong><?php esc_html_e('Saturday', 'dawp'); ?></strong><span><?php esc_html_e('Limited email support', 'dawp'); ?></span></div>
                    <div><strong><?php esc_html_e('Sunday', 'dawp'); ?></strong><span><?php esc_html_e('Closed', 'dawp'); ?></span></div>
                </div>
            </aside>
        </div>
    </section>

    <section class="cf-contact-section" id="contact-form" aria-labelledby="cf-contact-form-title">
        <div class="cf-contact-container cf-contact-grid">
            <div class="cf-contact-form-card">
                <p class="cf-contact-eyebrow"><?php esc_html_e('Message Us', 'dawp'); ?></p>
                <h2 id="cf-contact-form-title"><?php esc_html_e('Tell us what you need.', 'dawp'); ?></h2>

                <?php if ('success' === $status) : ?>
                    <div class="cf-contact-alert cf-contact-alert--success" role="status"><?php esc_html_e('Thanks. Your message has been received and our support team will follow up soon.', 'dawp'); ?></div>
                <?php elseif ('error' === $status) : ?>
                    <div class="cf-contact-alert cf-contact-alert--error" role="alert"><?php esc_html_e('Please check the required fields and try sending your message again.', 'dawp'); ?></div>
                <?php endif; ?>

                <form class="cf-contact-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                    <input type="hidden" name="action" value="lbq_contact_form">
                    <?php wp_nonce_field('lbq_contact_form', 'lbq_contact_nonce'); ?>
                    <div class="cf-contact-honeypot" aria-hidden="true">
                        <label for="company_website"><?php esc_html_e('Company website', 'dawp'); ?></label>
                        <input id="company_website" type="text" name="company_website" tabindex="-1" autocomplete="off">
                    </div>

                    <div class="cf-contact-form__row">
                        <div class="cf-contact-field">
                            <label for="contact_name"><?php esc_html_e('Full name', 'dawp'); ?></label>
                            <input id="contact_name" type="text" name="contact_name" required autocomplete="name" placeholder="<?php esc_attr_e('Jane Smith', 'dawp'); ?>">
                        </div>
                        <div class="cf-contact-field">
                            <label for="contact_email"><?php esc_html_e('Email address', 'dawp'); ?></label>
                            <input id="contact_email" type="email" name="contact_email" required autocomplete="email" placeholder="<?php esc_attr_e('jane@example.com', 'dawp'); ?>">
                        </div>
                    </div>

                    <div class="cf-contact-form__row">
                        <div class="cf-contact-field">
                            <label for="contact_topic"><?php esc_html_e('What can we help with?', 'dawp'); ?></label>
                            <select id="contact_topic" name="contact_topic">
                                <?php foreach ($contact_topics as $key => $label) : ?>
                                    <option value="<?php echo esc_attr($key); ?>"><?php echo esc_html($label); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="cf-contact-field">
                            <label for="order_number"><?php esc_html_e('Order number', 'dawp'); ?></label>
                            <input id="order_number" type="text" name="order_number" autocomplete="off" placeholder="<?php esc_attr_e('Optional', 'dawp'); ?>">
                        </div>
                    </div>

                    <div class="cf-contact-field">
                        <label for="contact_message"><?php esc_html_e('Message', 'dawp'); ?></label>
                        <textarea id="contact_message" name="contact_message" required placeholder="<?php esc_attr_e('Share the product name, order number or details that will help us support you.', 'dawp'); ?>"></textarea>
                    </div>

                    <p class="cf-contact-form__note"><?php echo wp_kses_post(sprintf(__('By submitting this form, you agree that Crowdfused may use your details to respond to your request. See our <a href="%s">Privacy Policy</a>.', 'dawp'), esc_url($privacy_url))); ?></p>
                    <button type="submit" class="cf-contact-btn cf-contact-btn--primary"><?php esc_html_e('Submit Message', 'dawp'); ?></button>
                </form>
            </div>

            <aside>
                <div class="cf-contact-info-card">
                    <h3><?php esc_html_e('Support details', 'dawp'); ?></h3>
                    <ul class="cf-contact-info-list">
                        <li>
                            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 4h16v16H4z"></path><path d="m4 7 8 6 8-6"></path></svg>
                            <div><strong><?php esc_html_e('Email', 'dawp'); ?></strong><a href="mailto:support@crowdfused.com">support@crowdfused.com</a></div>
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21s7-5.2 7-11a7 7 0 0 0-14 0c0 5.8 7 11 7 11Z"></path><circle cx="12" cy="10" r="2.5"></circle></svg>
                            <div><strong><?php esc_html_e('Service area', 'dawp'); ?></strong><span><?php esc_html_e('Online support for U.S. orders', 'dawp'); ?></span></div>
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 8v4l2.5 1.5"></path><circle cx="12" cy="12" r="9"></circle></svg>
                            <div><strong><?php esc_html_e('Best for fast help', 'dawp'); ?></strong><span><?php esc_html_e('Include order number, product name and photos when relevant.', 'dawp'); ?></span></div>
                        </li>
                    </ul>
                </div>

                <div class="cf-contact-info-card">
                    <h3><?php esc_html_e('Before you send', 'dawp'); ?></h3>
                    <ul class="cf-contact-info-list">
                        <li>
                            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 6 9 17l-5-5"></path></svg>
                            <div><span><?php esc_html_e('For delivery updates, use the tracking page first.', 'dawp'); ?></span></div>
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 6 9 17l-5-5"></path></svg>
                            <div><span><?php esc_html_e('For returns, review the return window and item condition requirements.', 'dawp'); ?></span></div>
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 6 9 17l-5-5"></path></svg>
                            <div><span><?php esc_html_e('For product questions, link or name the item you are asking about.', 'dawp'); ?></span></div>
                        </li>
                    </ul>
                </div>
            </aside>
        </div>
    </section>

    <section class="cf-contact-section cf-contact-section--soft" aria-labelledby="cf-contact-help-title">
        <div class="cf-contact-container">
            <div class="cf-contact-section__head">
                <div>
                    <p class="cf-contact-eyebrow"><?php esc_html_e('Quick Help', 'dawp'); ?></p>
                    <h2 id="cf-contact-help-title"><?php esc_html_e('Start with the right support path.', 'dawp'); ?></h2>
                    <p><?php esc_html_e('These pages solve the most common order and policy questions without waiting for an email reply.', 'dawp'); ?></p>
                </div>
            </div>
            <div class="cf-contact-card-grid">
                <?php foreach ($support_cards as $card) : ?>
                    <a class="cf-contact-card" href="<?php echo esc_url($card['url']); ?>">
                        <span class="cf-contact-card__icon" aria-hidden="true"><svg viewBox="0 0 24 24"><?php echo $card['icon']; ?></svg></span>
                        <h3><?php echo esc_html($card['title']); ?></h3>
                        <p><?php echo esc_html($card['copy']); ?></p>
                        <em><?php echo esc_html($card['label']); ?></em>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="cf-contact-cta" aria-labelledby="cf-contact-shop-title">
        <div class="cf-contact-container cf-contact-cta__inner">
            <div>
                <p class="cf-contact-eyebrow" style="color:#FFC98A;"><?php esc_html_e('Still Browsing?', 'dawp'); ?></p>
                <h2 id="cf-contact-shop-title"><?php esc_html_e('Find practical innovations for everyday life.', 'dawp'); ?></h2>
                <p><?php esc_html_e('Explore curated home, tech, outdoor and self-care products while our support team handles your message.', 'dawp'); ?></p>
            </div>
            <div class="cf-contact-cta__actions">
                <a class="cf-contact-btn cf-contact-btn--primary" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop Crowdfused', 'dawp'); ?></a>
                <a class="cf-contact-btn cf-contact-btn--secondary" href="<?php echo esc_url($faq_url); ?>"><?php esc_html_e('Read FAQs', 'dawp'); ?></a>
            </div>
        </div>
    </section>
</div>
