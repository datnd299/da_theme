<?php
/**
 * Template Part: page-shipping-returns
 *
 * Legacy policy hub for older links.
 *
 * @package dawp
 */
?>

<style>
  .qb-page { --qb-blush:#ffb7c5; --qb-peach:#ffd6a5; --qb-mint:#cff5e7; --qb-gold:#d8a94e; --qb-plum:#2f1f35; --qb-gray:#f7f7fa; --qb-text:#4f4355; --qb-border:#eadfe8; background:#fff; color:var(--qb-text); font-family:"DM Sans","Inter",system-ui,sans-serif; }
  .qb-page * { box-sizing:border-box; }
  .qb-page a { text-decoration:none; }
  .qb-wrap { width:min(100% - 32px,1100px); margin-inline:auto; }
  .qb-section { padding:72px 0; }
  .qb-hero { background:linear-gradient(135deg,rgba(255,183,197,.35),rgba(255,214,165,.38) 48%,rgba(207,245,231,.4)),#fff; }
  .qb-eyebrow { margin:0 0 12px; color:var(--qb-gold); font-size:12px; font-weight:800; letter-spacing:.18em; text-transform:uppercase; }
  .qb-title { margin:0; color:var(--qb-plum); font-family:Georgia,"Times New Roman",serif; font-size:clamp(34px,4.2vw,58px); line-height:1.04; letter-spacing:0; }
  .qb-copy { margin:18px 0 0; max-width:760px; color:var(--qb-text); font-size:17px; line-height:1.75; }
  .qb-policy-grid { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:22px; margin-top:34px; }
  .qb-policy-card { border:1px solid var(--qb-border); border-radius:24px; background:#fff; padding:clamp(24px,4vw,40px); box-shadow:0 18px 46px rgba(47,31,53,.08); }
  .qb-policy-card h2 { margin:0; color:var(--qb-plum); font-family:Georgia,"Times New Roman",serif; font-size:clamp(26px,3vw,38px); line-height:1.12; }
  .qb-policy-card p { margin:16px 0 0; color:#675a6c; font-size:15px; line-height:1.7; }
  .qb-list { display:grid; gap:10px; margin:20px 0 0; padding-left:1.15rem; color:#675a6c; font-size:14px; line-height:1.6; }
  .qb-actions { display:flex; flex-wrap:wrap; gap:14px; margin-top:28px; }
  .qb-button { display:inline-flex; min-height:48px; align-items:center; justify-content:center; border:1px solid var(--qb-plum); border-radius:999px; background:var(--qb-plum); color:#fff; padding:0 24px; font-size:14px; font-weight:800; transition:.2s ease; }
  .qb-button:hover { border-color:var(--qb-gold); background:var(--qb-gold); color:var(--qb-plum); }
  .qb-button--secondary { background:#fff; color:var(--qb-plum); }
  .qb-soft { background:var(--qb-gray); }
  .qb-link-row { display:flex; flex-wrap:wrap; gap:10px; margin-top:26px; }
  .qb-link-row a { border:1px solid rgba(47,31,53,.12); border-radius:999px; background:#fff; padding:10px 14px; color:var(--qb-plum); font-size:13px; font-weight:800; }
  @media (max-width:780px) { .qb-section { padding:56px 0; } .qb-policy-grid { grid-template-columns:1fr; } .qb-actions { flex-direction:column; } .qb-button { width:100%; } }
</style>

<div class="qb-page qb-shipping-returns">
  <section class="qb-section qb-hero">
    <div class="qb-wrap">
      <p class="qb-eyebrow"><?php esc_html_e('Policy Center', 'dawp'); ?></p>
      <h1 class="qb-title"><?php esc_html_e('Shipping and returns now have separate policy pages.', 'dawp'); ?></h1>
      <p class="qb-copy"><?php esc_html_e('Choose the policy you need for clearer details about delivery timelines, return eligibility, and refund timing at Queen\'s Bracelet.', 'dawp'); ?></p>

      <div class="qb-policy-grid">
        <article class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Shipping Policy', 'dawp'); ?></p>
          <h2><?php esc_html_e('Order processing, delivery, and tracking.', 'dawp'); ?></h2>
          <p><?php esc_html_e('Review U.S. shipping locations, handling time, standard U.S. transit time, free standard shipping, tracking, and delivery support.', 'dawp'); ?></p>
          <ul class="qb-list">
            <li><?php esc_html_e('5:00 PM PST order cutoff.', 'dawp'); ?></li>
            <li><?php esc_html_e('1-2 business day handling time.', 'dawp'); ?></li>
            <li><?php esc_html_e('5-7 business day standard U.S. transit.', 'dawp'); ?></li>
            <li><?php esc_html_e('Usually 6-9 business days estimated delivery.', 'dawp'); ?></li>
            <li><?php esc_html_e('Tracking information is emailed after shipment.', 'dawp'); ?></li>
          </ul>
          <div class="qb-actions">
            <a class="qb-button" href="<?php echo esc_url(home_url('/shipping-policy/')); ?>"><?php esc_html_e('View Shipping Policy', 'dawp'); ?></a>
          </div>
        </article>

        <article class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></p>
          <h2><?php esc_html_e('Return eligibility, method, and refund timing.', 'dawp'); ?></h2>
          <p><?php esc_html_e('Review the 30-day return window, return by mail requirement, item condition rules, no restocking fee, and refund process.', 'dawp'); ?></p>
          <ul class="qb-list">
            <li><?php esc_html_e('30 days from delivery date.', 'dawp'); ?></li>
            <li><?php esc_html_e('Contact support before mailing items back.', 'dawp'); ?></li>
            <li><?php esc_html_e('Refunds are processed within 10 days after inspection approval.', 'dawp'); ?></li>
          </ul>
          <div class="qb-actions">
            <a class="qb-button" href="<?php echo esc_url(home_url('/return-refund-policy/')); ?>"><?php esc_html_e('View Return & Refund Policy', 'dawp'); ?></a>
          </div>
        </article>
      </div>
    </div>
  </section>

  <section class="qb-section qb-soft">
    <div class="qb-wrap">
      <p class="qb-eyebrow"><?php esc_html_e('Related Pages', 'dawp'); ?></p>
      <h2 class="qb-title"><?php esc_html_e('Other policy information remains connected.', 'dawp'); ?></h2>
      <p class="qb-copy"><?php esc_html_e('For privacy, terms, order tracking, or support questions, use the related links below.', 'dawp'); ?></p>
      <nav class="qb-link-row" aria-label="<?php esc_attr_e('Related policy links', 'dawp'); ?>">
        <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>"><?php esc_html_e('Privacy Policy', 'dawp'); ?></a>
        <a href="<?php echo esc_url(home_url('/terms-conditions/')); ?>"><?php esc_html_e('Terms & Conditions', 'dawp'); ?></a>
        <a href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a>
        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
      </nav>
    </div>
  </section>
</div>
