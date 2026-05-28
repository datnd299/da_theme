<?php
/**
 * Template Part: page-terms-conditions
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

<div class="qb-page qb-terms">
  <section class="qb-hero">
    <div class="qb-wrap qb-hero__grid">
      <div>
        <p class="qb-eyebrow"><?php esc_html_e('Terms & Conditions', 'dawp'); ?></p>
        <h1 class="qb-title"><?php esc_html_e('Clear terms for browsing and shopping.', 'dawp'); ?></h1>
        <p class="qb-copy"><?php esc_html_e("These Terms & Conditions explain the rules that apply when you use Queen's Bracelet, browse bracelet products, place orders, contact support, or use our ecommerce services.", 'dawp'); ?></p>
        <div class="qb-actions">
          <a class="qb-button" href="<?php echo esc_url(home_url('/shop/')); ?>"><?php esc_html_e('Shop Bracelets', 'dawp'); ?></a>
          <a class="qb-button qb-button--secondary" href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
        </div>
      </div>
      <div class="qb-panel">
        <p class="qb-eyebrow"><?php esc_html_e('Terms Snapshot', 'dawp'); ?></p>
        <div class="qb-mini-grid">
          <div class="qb-mini-card"><strong><?php esc_html_e('Lawful Use', 'dawp'); ?></strong><p><?php esc_html_e('Use the website responsibly and only for lawful shopping and support purposes.', 'dawp'); ?></p></div>
          <div class="qb-mini-card"><strong><?php esc_html_e('Order Review', 'dawp'); ?></strong><p><?php esc_html_e('Orders are subject to availability, payment approval, verification, and fraud screening.', 'dawp'); ?></p></div>
          <div class="qb-mini-card"><strong><?php esc_html_e('Product Details', 'dawp'); ?></strong><p><?php esc_html_e('Review bracelet size, finish, material notes, clasp details, and care instructions before ordering.', 'dawp'); ?></p></div>
          <div class="qb-mini-card"><strong><?php esc_html_e('Policies Apply', 'dawp'); ?></strong><p><?php esc_html_e('Shipping, returns, refunds, privacy, and support policies are part of these terms.', 'dawp'); ?></p></div>
        </div>
      </div>
    </div>
  </section>

  <section class="qb-section">
    <div class="qb-wrap qb-summary-grid">
      <div class="qb-card"><b>01</b><h3><?php esc_html_e('Website Use', 'dawp'); ?></h3><p><?php esc_html_e('Customers agree to use our bracelet boutique without disrupting security, checkout, accounts, or other users.', 'dawp'); ?></p></div>
      <div class="qb-card"><b>02</b><h3><?php esc_html_e('Orders', 'dawp'); ?></h3><p><?php esc_html_e('Accurate billing, shipping, and contact information is required to complete order processing and delivery.', 'dawp'); ?></p></div>
      <div class="qb-card"><b>03</b><h3><?php esc_html_e('Product Accuracy', 'dawp'); ?></h3><p><?php esc_html_e('We aim for clear product details, but colors, sizing, finish, and availability may vary slightly.', 'dawp'); ?></p></div>
      <div class="qb-card"><b>04</b><h3><?php esc_html_e('Support', 'dawp'); ?></h3><p><a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a><br><?php esc_html_e('Monday-Friday, 9:00 AM-6:00 PM EST.', 'dawp'); ?></p></div>
    </div>
  </section>

  <section class="qb-section qb-soft">
    <div class="qb-wrap qb-content-grid">
      <aside class="qb-sidebar">
        <div class="qb-dark-card">
          <p class="qb-eyebrow"><?php esc_html_e('Terms Sections', 'dawp'); ?></p>
          <h2 class="qb-title" style="font-size:clamp(28px,3vw,42px);"><?php esc_html_e('Know the basics before checkout.', 'dawp'); ?></h2>
          <p><?php esc_html_e('These terms connect website use, orders, product information, customer policies, and support expectations.', 'dawp'); ?></p>
          <nav class="qb-side-nav" aria-label="<?php esc_attr_e('Terms sections', 'dawp'); ?>">
            <a href="#acceptance"><?php esc_html_e('Acceptance', 'dawp'); ?></a>
            <a href="#website-use"><?php esc_html_e('Website Use', 'dawp'); ?></a>
            <a href="#orders"><?php esc_html_e('Orders & Payments', 'dawp'); ?></a>
            <a href="#products"><?php esc_html_e('Products', 'dawp'); ?></a>
            <a href="#policies"><?php esc_html_e('Policies', 'dawp'); ?></a>
            <a href="#intellectual"><?php esc_html_e('Intellectual Property', 'dawp'); ?></a>
            <a href="#limitations"><?php esc_html_e('Limitations', 'dawp'); ?></a>
          </nav>
        </div>
      </aside>

      <div class="qb-policy-stack">
        <section id="acceptance" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Acceptance Of Terms', 'dawp'); ?></p>
          <h2><?php esc_html_e('Using Queen\'s Bracelet means you accept these terms.', 'dawp'); ?></h2>
          <p><?php esc_html_e('By accessing our website, browsing products, creating an account, placing an order, or contacting support, you agree to these Terms & Conditions and the policies referenced on this website.', 'dawp'); ?></p>
          <p><?php esc_html_e('If you do not agree with these terms, please do not use the website or place an order.', 'dawp'); ?></p>
        </section>
        <section id="website-use" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Website Use', 'dawp'); ?></p>
          <h2><?php esc_html_e('Use the store responsibly and lawfully.', 'dawp'); ?></h2>
          <p><?php esc_html_e('You agree not to damage, disable, overload, misuse, or interfere with the website, checkout, customer accounts, security systems, or other users.', 'dawp'); ?></p>
          <ul>
            <li><?php esc_html_e('Do not attempt unauthorized access to restricted areas or systems.', 'dawp'); ?></li>
            <li><?php esc_html_e('Do not use the store for fraudulent orders, payment misuse, spam, or harmful code.', 'dawp'); ?></li>
            <li><?php esc_html_e('Do not copy, scrape, reproduce, or commercially exploit website content without permission.', 'dawp'); ?></li>
          </ul>
        </section>
        <section id="orders" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Orders & Payments', 'dawp'); ?></p>
          <h2><?php esc_html_e('Orders require accurate information and payment approval.', 'dawp'); ?></h2>
          <p><?php esc_html_e('Orders are subject to product availability, payment authorization, fraud screening, and order verification. We may cancel or refuse orders when necessary, including suspected fraud, inaccurate information, pricing errors, or unavailable products.', 'dawp'); ?></p>
          <p><?php esc_html_e('Customers are responsible for providing accurate billing, shipping, email, and phone details. Incorrect information may cause delays, failed delivery, or cancellation.', 'dawp'); ?></p>
          <p><?php esc_html_e('Prices, promotions, and availability may change without notice. The final order total is shown at checkout before payment is completed.', 'dawp'); ?></p>
        </section>
        <section id="products" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Product Information', 'dawp'); ?></p>
          <h2><?php esc_html_e('Review product details before ordering.', 'dawp'); ?></h2>
          <p><?php esc_html_e('Queen\'s Bracelet focuses on fashion bracelets and giftable jewelry. Product pages may include material or finish notes, bracelet length, adjustable details, clasp information, charm details, care instructions, and styling guidance.', 'dawp'); ?></p>
          <p><?php esc_html_e('We aim to present product names, images, descriptions, prices, and availability clearly. Slight differences may occur due to screen settings, photography, production updates, or inventory changes.', 'dawp'); ?></p>
          <p><?php esc_html_e('We do not make unsupported third-party brand, premium-material, medical, wellness, or guaranteed benefit claims for our products.', 'dawp'); ?></p>
        </section>
        <section id="policies" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Shipping, Returns & Privacy', 'dawp'); ?></p>
          <h2><?php esc_html_e('Store policies are part of these terms.', 'dawp'); ?></h2>
          <p><?php esc_html_e('Our Shipping & Returns page explains order cutoff, handling time, fulfillment days, transit time, shipping cost, tracking, return method, restocking fee, refund timing, and order issue procedures. Our Privacy Policy explains how customer information is handled.', 'dawp'); ?></p>
          <div class="qb-actions">
            <a class="qb-button" href="<?php echo esc_url(home_url('/shipping-returns/')); ?>"><?php esc_html_e('Shipping & Returns', 'dawp'); ?></a>
            <a class="qb-button qb-button--secondary" href="<?php echo esc_url(home_url('/privacy-policy/')); ?>"><?php esc_html_e('Privacy Policy', 'dawp'); ?></a>
          </div>
        </section>
        <section id="intellectual" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Intellectual Property', 'dawp'); ?></p>
          <h2><?php esc_html_e('Brand, content, and design rights.', 'dawp'); ?></h2>
          <p><?php esc_html_e('Website content, branding, product presentation, page layouts, graphics, text, images, and design elements are owned by or licensed to Queen\'s Bracelet unless otherwise stated.', 'dawp'); ?></p>
          <p><?php esc_html_e('You may not copy, reproduce, distribute, modify, resell, or commercially exploit website content without written permission.', 'dawp'); ?></p>
        </section>
        <section id="limitations" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Limitations & Updates', 'dawp'); ?></p>
          <h2><?php esc_html_e('Website availability and policy changes.', 'dawp'); ?></h2>
          <p><?php esc_html_e('We work to keep the website accurate, available, and secure, but we cannot guarantee uninterrupted or error-free access. Carrier delays, technical issues, and third-party service limitations may occur.', 'dawp'); ?></p>
          <p><?php esc_html_e('We may update these Terms & Conditions from time to time. Updates will be posted on this page. Continued website use after updates means you accept the revised terms.', 'dawp'); ?></p>
          <div class="qb-actions">
            <a class="qb-button" href="mailto:<?php echo esc_attr($support_email); ?>"><?php esc_html_e('Email Support', 'dawp'); ?></a>
            <a class="qb-button qb-button--secondary" href="<?php echo esc_url(home_url('/faq/')); ?>"><?php esc_html_e('View FAQ', 'dawp'); ?></a>
          </div>
        </section>
      </div>
    </div>
  </section>

  <section class="qb-section qb-plum">
    <div class="qb-wrap">
      <p class="qb-eyebrow"><?php esc_html_e('Customer Transparency', 'dawp'); ?></p>
      <h2 class="qb-title"><?php esc_html_e('Policies are available before checkout.', 'dawp'); ?></h2>
      <p class="qb-copy"><?php esc_html_e('Customers should review bracelet product details, shipping expectations, return conditions, privacy information, and these terms before placing an order.', 'dawp'); ?></p>
      <nav class="qb-policy-links" aria-label="<?php esc_attr_e('Related policy links', 'dawp'); ?>">
        <a href="<?php echo esc_url(home_url('/shipping-returns/')); ?>"><?php esc_html_e('Shipping & Returns', 'dawp'); ?></a>
        <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>"><?php esc_html_e('Privacy Policy', 'dawp'); ?></a>
        <a href="<?php echo esc_url(home_url('/faq/')); ?>"><?php esc_html_e('FAQ', 'dawp'); ?></a>
        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
      </nav>
    </div>
  </section>
</div>
