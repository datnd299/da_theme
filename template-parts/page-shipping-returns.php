<?php
/**
 * Template Part: page-shipping-returns
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
  .qb-button--secondary:hover { border-color:var(--qb-plum); background:#fff4f6; color:var(--qb-plum); }
  .qb-plum .qb-button { border-color:var(--qb-gold); background:var(--qb-gold); color:var(--qb-plum); }
  .qb-plum .qb-button:hover { border-color:#fff; background:#fff; color:var(--qb-plum); }
  .qb-plum .qb-button--secondary { border-color:rgba(255,255,255,.7); background:#fff; color:var(--qb-plum); }
  .qb-hero { overflow:hidden; background:linear-gradient(135deg,rgba(255,183,197,.35),rgba(255,214,165,.38) 48%,rgba(207,245,231,.4)),#fff; }
  .qb-hero__grid { display:grid; grid-template-columns:minmax(0,1.02fr) minmax(320px,.98fr); gap:48px; align-items:center; padding:78px 0; }
  .qb-hero-panel, .qb-card, .qb-policy-card { border:1px solid var(--qb-border); border-radius:24px; background:rgba(255,255,255,.86); box-shadow:0 18px 46px rgba(47,31,53,.08); }
  .qb-hero-panel { padding:clamp(24px,4vw,44px); }
  .qb-summary-grid { display:grid; grid-template-columns:repeat(4,minmax(0,1fr)); gap:18px; }
  .qb-card { padding:22px; background:#fff; }
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
  .qb-policy-card { padding:clamp(24px,4vw,40px); background:#fff; }
  .qb-policy-card:nth-child(even) { background:#fffafc; }
  .qb-policy-card h2 { font-size:clamp(25px,3vw,38px); line-height:1.12; font-family:Georgia,"Times New Roman",serif; }
  .qb-policy-card h2 + p, .qb-policy-card h2 + ul { margin-top:clamp(14px,1.8vw,20px); }
  .qb-policy-card ul { display:grid; gap:10px; margin:18px 0 0; padding-left:1.15rem; list-style:disc outside; }
  .qb-mini-grid { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:14px; margin-top:22px; }
  .qb-mini-card { border:1px solid var(--qb-border); border-radius:18px; background:#fff; padding:18px; }
  .qb-plum { background:var(--qb-plum); color:#fff; }
  .qb-plum .qb-title, .qb-plum .qb-copy { color:#fff; }
  .qb-policy-links { display:flex; flex-wrap:wrap; gap:10px; margin-top:28px; }
  .qb-policy-links a { border:1px solid rgba(47,31,53,.12); border-radius:999px; background:rgba(255,255,255,.78); padding:10px 14px; color:var(--qb-plum); font-size:13px; font-weight:800; }
  .qb-plum .qb-policy-links a { border-color:rgba(255,255,255,.22); background:rgba(255,255,255,.1); color:#fff; }
  @media (max-width:1080px) { .qb-summary-grid { grid-template-columns:repeat(2,minmax(0,1fr)); } }
  @media (max-width:780px) { .qb-section { padding:56px 0; } .qb-hero__grid, .qb-content-grid, .qb-summary-grid, .qb-mini-grid { grid-template-columns:1fr; } .qb-hero__grid { padding:58px 0; } .qb-sidebar { position:static; } .qb-actions { flex-direction:column; } .qb-button { width:100%; } }
</style>

<div class="qb-page qb-shipping-returns">
  <section class="qb-hero">
    <div class="qb-wrap qb-hero__grid">
      <div>
        <p class="qb-eyebrow"><?php esc_html_e('Shipping & Returns', 'dawp'); ?></p>
        <h1 class="qb-title"><?php esc_html_e('Clear delivery and return expectations.', 'dawp'); ?></h1>
        <p class="qb-copy"><?php esc_html_e("Queen's Bracelet provides transparent order processing, standard US delivery timelines, tracking updates, and a 30-day return window for eligible jewelry items.", 'dawp'); ?></p>
        <div class="qb-actions">
          <a class="qb-button" href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a>
          <a class="qb-button qb-button--secondary" href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
        </div>
      </div>
      <div class="qb-hero-panel">
        <p class="qb-eyebrow"><?php esc_html_e('Policy Snapshot', 'dawp'); ?></p>
        <div class="qb-mini-grid">
          <div class="qb-mini-card"><strong><?php esc_html_e('Processing', 'dawp'); ?></strong><p><?php esc_html_e('Orders are processed within 2-4 business days before dispatch.', 'dawp'); ?></p></div>
          <div class="qb-mini-card"><strong><?php esc_html_e('US Delivery', 'dawp'); ?></strong><p><?php esc_html_e('Standard shipping usually takes 5-10 business days after dispatch.', 'dawp'); ?></p></div>
          <div class="qb-mini-card"><strong><?php esc_html_e('Tracking', 'dawp'); ?></strong><p><?php esc_html_e('Tracking information is emailed once an order ships.', 'dawp'); ?></p></div>
          <div class="qb-mini-card"><strong><?php esc_html_e('Returns', 'dawp'); ?></strong><p><?php esc_html_e('Eligible items may be returned within 30 days of delivery.', 'dawp'); ?></p></div>
        </div>
      </div>
    </div>
  </section>

  <section class="qb-section">
    <div class="qb-wrap qb-summary-grid">
      <div class="qb-card"><b>01</b><h3><?php esc_html_e('Processing Time', 'dawp'); ?></h3><p><?php esc_html_e('Please allow 2-4 business days for order verification, preparation, and fulfillment before shipment.', 'dawp'); ?></p></div>
      <div class="qb-card"><b>02</b><h3><?php esc_html_e('Delivery Time', 'dawp'); ?></h3><p><?php esc_html_e('After dispatch, standard US shipping typically takes 5-10 business days depending on destination and carrier conditions.', 'dawp'); ?></p></div>
      <div class="qb-card"><b>03</b><h3><?php esc_html_e('Return Window', 'dawp'); ?></h3><p><?php esc_html_e('Return requests must be submitted within 30 days of delivery for eligible jewelry items.', 'dawp'); ?></p></div>
      <div class="qb-card"><b>04</b><h3><?php esc_html_e('Support Email', 'dawp'); ?></h3><p><a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a><br><?php esc_html_e('Monday-Friday, 9:00 AM-6:00 PM EST.', 'dawp'); ?></p></div>
    </div>
  </section>

  <section class="qb-section qb-soft">
    <div class="qb-wrap qb-content-grid">
      <aside class="qb-sidebar">
        <div class="qb-dark-card">
          <p class="qb-eyebrow"><?php esc_html_e('Policy Navigation', 'dawp'); ?></p>
          <h2 class="qb-title" style="font-size:clamp(28px,3vw,42px);"><?php esc_html_e('Review before ordering.', 'dawp'); ?></h2>
          <p><?php esc_html_e('These sections explain shipping, tracking, returns, refunds, and issue review for bracelet and fashion jewelry orders.', 'dawp'); ?></p>
          <nav class="qb-side-nav" aria-label="<?php esc_attr_e('Shipping and returns sections', 'dawp'); ?>">
            <a href="#shipping"><?php esc_html_e('Shipping', 'dawp'); ?></a>
            <a href="#tracking"><?php esc_html_e('Tracking', 'dawp'); ?></a>
            <a href="#returns"><?php esc_html_e('Returns', 'dawp'); ?></a>
            <a href="#refunds"><?php esc_html_e('Refunds', 'dawp'); ?></a>
            <a href="#issues"><?php esc_html_e('Order Issues', 'dawp'); ?></a>
          </nav>
        </div>
      </aside>

      <div class="qb-policy-stack">
        <section id="shipping" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Shipping Information', 'dawp'); ?></p>
          <h2><?php esc_html_e('Order processing and standard US delivery.', 'dawp'); ?></h2>
          <p><?php esc_html_e('Orders are processed within 2-4 business days after checkout. Processing includes order verification, payment confirmation, item preparation, and fulfillment before dispatch.', 'dawp'); ?></p>
          <p><?php esc_html_e('After dispatch, standard US shipping typically takes 5-10 business days. Delivery times may vary by destination, carrier workload, weather, holidays, and seasonal volume.', 'dawp'); ?></p>
          <p><?php esc_html_e('Business days do not include weekends or public holidays. If an order contains multiple items, shipments may arrive separately depending on fulfillment availability.', 'dawp'); ?></p>
        </section>

        <section id="tracking" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Tracking Information', 'dawp'); ?></p>
          <h2><?php esc_html_e('Tracking is provided after dispatch.', 'dawp'); ?></h2>
          <p><?php esc_html_e('Once your order ships, tracking information will be sent to the email address used at checkout. Carrier tracking pages may take time to update after a tracking number is created.', 'dawp'); ?></p>
          <p><?php esc_html_e('If tracking has not updated after several business days, contact support with your order number and checkout email so we can help review the status.', 'dawp'); ?></p>
        </section>

        <section id="returns" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Return Policy', 'dawp'); ?></p>
          <h2><?php esc_html_e('30-day return window for eligible jewelry.', 'dawp'); ?></h2>
          <p><?php esc_html_e('Customers may request a return within 30 days of delivery. To qualify, jewelry must be unused, unworn, undamaged, in original condition, and returned with original packaging where applicable.', 'dawp'); ?></p>
          <ul>
            <li><?php esc_html_e('Items must show no signs of wear, stains, odors, alteration, missing parts, or damage.', 'dawp'); ?></li>
            <li><?php esc_html_e('Returns must be reviewed and approved by support before items are sent back.', 'dawp'); ?></li>
            <li><?php esc_html_e('Items that raise hygiene concerns or arrive outside return requirements may be refused.', 'dawp'); ?></li>
          </ul>
        </section>

        <section id="refunds" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Refunds', 'dawp'); ?></p>
          <h2><?php esc_html_e('Refunds are reviewed after inspection.', 'dawp'); ?></h2>
          <p><?php esc_html_e('When an approved return is received, we inspect the item and notify you of the refund status. Approved refunds are issued to the original payment method.', 'dawp'); ?></p>
          <p><?php esc_html_e('Payment providers may take several business days to post a refund after it is processed. Original shipping costs, when applicable, may not be refundable unless the return is due to an error on our side.', 'dawp'); ?></p>
        </section>

        <section id="issues" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Damaged, Incorrect, Or Missing Items', 'dawp'); ?></p>
          <h2><?php esc_html_e('Report order issues promptly.', 'dawp'); ?></h2>
          <p><?php esc_html_e('If your order arrives damaged, incorrect, or incomplete, contact support as soon as possible with your order number, checkout email, and clear photos of the product, packaging, and issue.', 'dawp'); ?></p>
          <p><?php esc_html_e('Our support team will review the information and provide next steps based on the order details and item condition.', 'dawp'); ?></p>
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
      <p class="qb-eyebrow"><?php esc_html_e('Customer Care', 'dawp'); ?></p>
      <h2 class="qb-title"><?php esc_html_e('Policy information stays connected.', 'dawp'); ?></h2>
      <p class="qb-copy"><?php esc_html_e('Please review product material notes, bracelet length or adjustable sizing, clasp information, care instructions, shipping timelines, return requirements, privacy practices, and terms before ordering.', 'dawp'); ?></p>
      <nav class="qb-policy-links" aria-label="<?php esc_attr_e('Related policy links', 'dawp'); ?>">
        <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>"><?php esc_html_e('Privacy Policy', 'dawp'); ?></a>
        <a href="<?php echo esc_url(home_url('/terms-conditions/')); ?>"><?php esc_html_e('Terms & Conditions', 'dawp'); ?></a>
        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
        <a href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a>
      </nav>
    </div>
  </section>
</div>
