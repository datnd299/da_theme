<?php
/**
 * Template Part: page-privacy
 *
 * @package dawp
 */

$support_email = 'support@queens-bracelet.com';
?>

<style>
  .qb-page { --qb-blush:#ffb7c5; --qb-peach:#ffd6a5; --qb-mint:#cff5e7; --qb-gold:#d8a94e; --qb-plum:#2f1f35; --qb-gray:#f7f7fa; --qb-text:#4f4355; --qb-border:#eadfe8; background:#fff; color:var(--qb-text); font-family:"DM Sans","Inter",system-ui,sans-serif; }
  .qb-page * { box-sizing:border-box; }
  .qb-page a { text-decoration:none; }
  .qb-wrap { width:min(100% - 32px,1280px); margin-inline:auto; }
  .qb-section { padding:72px 0; }
  .qb-eyebrow { margin:0 0 12px; color:var(--qb-gold); font-size:12px; font-weight:800; letter-spacing:.18em; text-transform:uppercase; }
  .qb-title { margin:0; color:var(--qb-plum); font-family:Georgia,"Times New Roman",serif; font-size:clamp(34px,4.2vw,58px); line-height:1.04; letter-spacing:0; }
  .qb-copy { margin:18px 0 0; max-width:720px; color:var(--qb-text); font-size:17px; line-height:1.75; }
  .qb-actions { display:flex; flex-wrap:wrap; gap:14px; margin-top:30px; }
  .qb-button { display:inline-flex; min-height:48px; align-items:center; justify-content:center; border:1px solid var(--qb-plum); border-radius:999px; background:var(--qb-plum); color:#fff; padding:0 24px; font-size:14px; font-weight:800; transition:.2s ease; }
  .qb-button:hover { border-color:var(--qb-gold); background:var(--qb-gold); color:var(--qb-plum); }
  .qb-button--secondary { background:#fff; color:var(--qb-plum); }
  .qb-plum .qb-button { border-color:var(--qb-gold); background:var(--qb-gold); color:var(--qb-plum); }
  .qb-plum .qb-button:hover { border-color:#fff; background:#fff; color:var(--qb-plum); }
  .qb-plum .qb-button--secondary { border-color:rgba(255,255,255,.7); background:#fff; color:var(--qb-plum); }
  .qb-hero { overflow:hidden; background:linear-gradient(135deg,rgba(255,183,197,.35),rgba(255,214,165,.38) 48%,rgba(207,245,231,.4)),#fff; }
  .qb-hero__grid { display:grid; grid-template-columns:minmax(0,1.02fr) minmax(320px,.98fr); gap:48px; align-items:center; padding:78px 0; }
  .qb-panel, .qb-card, .qb-policy-card { border:1px solid var(--qb-border); border-radius:24px; background:#fff; box-shadow:0 18px 46px rgba(47,31,53,.08); }
  .qb-panel { padding:clamp(24px,4vw,44px); background:rgba(255,255,255,.86); }
  .qb-summary-grid { display:grid; grid-template-columns:repeat(4,minmax(0,1fr)); gap:18px; }
  .qb-card { padding:22px; }
  .qb-card b { display:inline-flex; width:42px; height:42px; align-items:center; justify-content:center; border-radius:999px; background:#fff4f6; color:var(--qb-plum); font-size:13px; }
  .qb-card h3, .qb-policy-card h2, .qb-mini-card strong { margin:18px 0 0; color:var(--qb-plum); }
  .qb-card p, .qb-policy-card p, .qb-policy-card li, .qb-mini-card p { color:#675a6c; font-size:14px; line-height:1.65; }
  .qb-soft { background:var(--qb-gray); }
  .qb-content-grid { display:grid; grid-template-columns:.82fr 1.18fr; gap:34px; align-items:start; }
  .qb-sidebar { position:sticky; top:120px; display:grid; gap:16px; }
  .qb-dark-card { border-radius:24px; background:var(--qb-plum); padding:28px; color:#fff; }
  .qb-dark-card .qb-eyebrow { color:var(--qb-peach); }
  .qb-dark-card h2, .qb-dark-card p, .qb-dark-card a { color:#fff; }
  .qb-dark-card p { color:rgba(255,255,255,.78); font-size:15px; line-height:1.7; }
  .qb-side-nav { display:grid; gap:10px; margin-top:22px; }
  .qb-side-nav a { border:1px solid rgba(255,255,255,.15); border-radius:999px; padding:10px 14px; color:#fff; font-size:13px; font-weight:800; }
  .qb-policy-stack { display:grid; gap:22px; }
  .qb-policy-card { padding:clamp(24px,4vw,40px); }
  .qb-policy-card:nth-child(even) { background:#fffafc; }
  .qb-policy-card h2 { font-size:clamp(25px,3vw,38px); line-height:1.12; font-family:Georgia,"Times New Roman",serif; }
  .qb-policy-card h2 + p, .qb-policy-card h2 + ul { margin-top:clamp(14px,1.8vw,20px); }
  .qb-policy-card ul { display:grid; gap:10px; margin:18px 0 0; padding-left:1.15rem; list-style:disc outside; }
  .qb-mini-grid { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:14px; margin-top:22px; }
  .qb-mini-card { border:1px solid var(--qb-border); border-radius:18px; background:#fff; padding:18px; }
  .qb-plum { background:var(--qb-plum); color:#fff; }
  .qb-plum .qb-title, .qb-plum .qb-copy { color:#fff; }
  .qb-policy-links { display:flex; flex-wrap:wrap; gap:10px; margin-top:28px; }
  .qb-policy-links a { border:1px solid rgba(255,255,255,.22); border-radius:999px; background:rgba(255,255,255,.1); padding:10px 14px; color:#fff; font-size:13px; font-weight:800; }
  @media (max-width:1080px) { .qb-summary-grid { grid-template-columns:repeat(2,minmax(0,1fr)); } }
  @media (max-width:780px) { .qb-section { padding:56px 0; } .qb-hero__grid, .qb-content-grid, .qb-summary-grid, .qb-mini-grid { grid-template-columns:1fr; } .qb-hero__grid { padding:58px 0; } .qb-sidebar { position:static; } .qb-actions { flex-direction:column; } .qb-button { width:100%; } }
</style>

<div class="qb-page qb-privacy">
  <section class="qb-hero">
    <div class="qb-wrap qb-hero__grid">
      <div>
        <p class="qb-eyebrow"><?php esc_html_e('Privacy Policy', 'dawp'); ?></p>
        <h1 class="qb-title"><?php esc_html_e('How customer information is used and protected.', 'dawp'); ?></h1>
        <p class="qb-copy"><?php esc_html_e("This Privacy Policy explains how Queen's Bracelet collects, uses, shares, and protects information when customers browse our bracelet boutique, place orders, request support, or use our ecommerce services.", 'dawp'); ?></p>
        <div class="qb-actions">
          <a class="qb-button" href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
          <a class="qb-button qb-button--secondary" href="<?php echo esc_url(home_url('/terms-conditions/')); ?>"><?php esc_html_e('Terms & Conditions', 'dawp'); ?></a>
        </div>
      </div>
      <div class="qb-panel">
        <p class="qb-eyebrow"><?php esc_html_e('Privacy Snapshot', 'dawp'); ?></p>
        <div class="qb-mini-grid">
          <div class="qb-mini-card"><strong><?php esc_html_e('Order Use', 'dawp'); ?></strong><p><?php esc_html_e('Information is used to process orders, ship products, send tracking, and provide support.', 'dawp'); ?></p></div>
          <div class="qb-mini-card"><strong><?php esc_html_e('Secure Checkout', 'dawp'); ?></strong><p><?php esc_html_e('Payment details are handled through secure ecommerce payment systems.', 'dawp'); ?></p></div>
          <div class="qb-mini-card"><strong><?php esc_html_e('No Data Selling', 'dawp'); ?></strong><p><?php esc_html_e('We do not sell customer personal information to unrelated third parties.', 'dawp'); ?></p></div>
          <div class="qb-mini-card"><strong><?php esc_html_e('Privacy Help', 'dawp'); ?></strong><p><?php esc_html_e('Customers may contact support with privacy questions or information requests.', 'dawp'); ?></p></div>
        </div>
      </div>
    </div>
  </section>

  <section class="qb-section">
    <div class="qb-wrap qb-summary-grid">
      <div class="qb-card"><b>01</b><h3><?php esc_html_e('Collected Details', 'dawp'); ?></h3><p><?php esc_html_e('Name, email, shipping address, billing details, phone number, order details, and messages when needed.', 'dawp'); ?></p></div>
      <div class="qb-card"><b>02</b><h3><?php esc_html_e('Purpose', 'dawp'); ?></h3><p><?php esc_html_e('We use information for checkout, shipping, tracking, returns, fraud prevention, support, and site improvement.', 'dawp'); ?></p></div>
      <div class="qb-card"><b>03</b><h3><?php esc_html_e('Service Providers', 'dawp'); ?></h3><p><?php esc_html_e('Necessary details may be shared with providers that help operate payments, fulfillment, shipping, email, analytics, and support.', 'dawp'); ?></p></div>
      <div class="qb-card"><b>04</b><h3><?php esc_html_e('Contact', 'dawp'); ?></h3><p><a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a><br><?php esc_html_e('Monday-Friday, 9:00 AM-6:00 PM EST.', 'dawp'); ?></p></div>
    </div>
  </section>

  <section class="qb-section qb-soft">
    <div class="qb-wrap qb-content-grid">
      <aside class="qb-sidebar">
        <div class="qb-dark-card">
          <p class="qb-eyebrow"><?php esc_html_e('Privacy Sections', 'dawp'); ?></p>
          <h2 class="qb-title" style="font-size:clamp(28px,3vw,42px);"><?php esc_html_e('Transparent by design.', 'dawp'); ?></h2>
          <p><?php esc_html_e('Review what we collect, why we collect it, when information is shared, and how to contact us.', 'dawp'); ?></p>
          <nav class="qb-side-nav" aria-label="<?php esc_attr_e('Privacy sections', 'dawp'); ?>">
            <a href="#collect"><?php esc_html_e('Information We Collect', 'dawp'); ?></a>
            <a href="#use"><?php esc_html_e('How We Use It', 'dawp'); ?></a>
            <a href="#cookies"><?php esc_html_e('Cookies', 'dawp'); ?></a>
            <a href="#sharing"><?php esc_html_e('Sharing', 'dawp'); ?></a>
            <a href="#security"><?php esc_html_e('Security', 'dawp'); ?></a>
            <a href="#rights"><?php esc_html_e('Your Choices', 'dawp'); ?></a>
          </nav>
        </div>
      </aside>

      <div class="qb-policy-stack">
        <section id="collect" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Information We Collect', 'dawp'); ?></p>
          <h2><?php esc_html_e('Customer, order, and website information.', 'dawp'); ?></h2>
          <p><?php esc_html_e('When you place an order or contact Queen\'s Bracelet, we may collect your name, email address, shipping address, billing address, phone number, order details, payment confirmation status, and communication history.', 'dawp'); ?></p>
          <p><?php esc_html_e('We may also collect technical information such as IP address, browser type, device type, pages viewed, referral source, cookies, and website usage information.', 'dawp'); ?></p>
        </section>
        <section id="use" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('How We Use Information', 'dawp'); ?></p>
          <h2><?php esc_html_e('We use data to run a clear ecommerce store.', 'dawp'); ?></h2>
          <ul>
            <li><?php esc_html_e('Process payments, confirm orders, and prepare shipments.', 'dawp'); ?></li>
            <li><?php esc_html_e('Send order confirmations, tracking updates, and customer service replies.', 'dawp'); ?></li>
            <li><?php esc_html_e('Review return requests, refunds, damaged item claims, and order issues.', 'dawp'); ?></li>
            <li><?php esc_html_e('Improve website performance, prevent fraud, maintain security, and comply with legal obligations.', 'dawp'); ?></li>
            <li><?php esc_html_e('Send bracelet updates or promotions if you subscribe to marketing emails. You may unsubscribe at any time.', 'dawp'); ?></li>
          </ul>
        </section>
        <section id="cookies" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Cookies & Tracking', 'dawp'); ?></p>
          <h2><?php esc_html_e('Cookies support cart, checkout, and site performance.', 'dawp'); ?></h2>
          <p><?php esc_html_e('Our website may use cookies and similar technologies to remember preferences, keep cart items active, support checkout, analyze traffic, and improve the shopping experience.', 'dawp'); ?></p>
          <p><?php esc_html_e('You can control cookies through browser settings. Some store features may not work correctly if cookies are disabled.', 'dawp'); ?></p>
        </section>
        <section id="sharing" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Information Sharing', 'dawp'); ?></p>
          <h2><?php esc_html_e('We share only what is needed to operate the store.', 'dawp'); ?></h2>
          <p><?php esc_html_e('Necessary information may be shared with trusted service providers for payment processing, fraud prevention, order fulfillment, shipping, email communication, analytics, hosting, and customer support.', 'dawp'); ?></p>
          <p><?php esc_html_e('We do not sell customer personal information to unrelated third parties. We may disclose information if required by law, legal process, security needs, or to protect customers and our business.', 'dawp'); ?></p>
        </section>
        <section id="security" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Security & Retention', 'dawp'); ?></p>
          <h2><?php esc_html_e('We use reasonable safeguards.', 'dawp'); ?></h2>
          <p><?php esc_html_e('We use reasonable administrative, technical, and organizational measures to help protect customer information from unauthorized access, loss, misuse, or disclosure.', 'dawp'); ?></p>
          <p><?php esc_html_e('Order and customer records may be retained as needed for accounting, legal, support, fraud prevention, and business operations. No online system can be guaranteed completely secure.', 'dawp'); ?></p>
        </section>
        <section id="rights" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Your Choices', 'dawp'); ?></p>
          <h2><?php esc_html_e('Access, update, unsubscribe, or ask questions.', 'dawp'); ?></h2>
          <p><?php esc_html_e('Customers may contact us to request help reviewing, updating, or correcting information associated with an order or customer account. Marketing emails include unsubscribe options.', 'dawp'); ?></p>
          <p><?php esc_html_e('Queen\'s Bracelet is intended for adults or customers with permission to shop online. We do not knowingly collect personal information from children without appropriate consent.', 'dawp'); ?></p>
          <div class="qb-actions">
            <a class="qb-button" href="mailto:<?php echo esc_attr($support_email); ?>"><?php esc_html_e('Email Privacy Support', 'dawp'); ?></a>
            <a class="qb-button qb-button--secondary" href="<?php echo esc_url(home_url('/shipping-returns/')); ?>"><?php esc_html_e('Shipping & Returns', 'dawp'); ?></a>
          </div>
        </section>
      </div>
    </div>
  </section>

  <section class="qb-section qb-plum">
    <div class="qb-wrap">
      <p class="qb-eyebrow"><?php esc_html_e('Policy Updates', 'dawp'); ?></p>
      <h2 class="qb-title"><?php esc_html_e('We may update this Privacy Policy.', 'dawp'); ?></h2>
      <p class="qb-copy"><?php esc_html_e('Updates will be posted on this page. Continued website use after an update means the current Privacy Policy applies to your use of Queen\'s Bracelet.', 'dawp'); ?></p>
      <nav class="qb-policy-links" aria-label="<?php esc_attr_e('Related policy links', 'dawp'); ?>">
        <a href="<?php echo esc_url(home_url('/shipping-returns/')); ?>"><?php esc_html_e('Shipping & Returns', 'dawp'); ?></a>
        <a href="<?php echo esc_url(home_url('/terms-conditions/')); ?>"><?php esc_html_e('Terms & Conditions', 'dawp'); ?></a>
        <a href="<?php echo esc_url(home_url('/faq/')); ?>"><?php esc_html_e('FAQ', 'dawp'); ?></a>
        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
      </nav>
    </div>
  </section>
</div>
