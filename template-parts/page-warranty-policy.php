<?php
/**
 * Template Part: page-warranty-policy
 *
 * @package dawp
 */

$store_name     = function_exists('dawp_brand_name') ? dawp_brand_name() : 'Orvel';
$support_email  = function_exists('dawp_contact_support_email') ? dawp_contact_support_email() : 'support@orveltime.com';
$store_address  = function_exists('dawp_get_store_address_line') ? dawp_get_store_address_line() : '';
$support_portal = home_url('/contact-us/');
?>

<style>
  .qb-page { --qb-obsidian:#101412; --qb-ivory:#F6F4EF; --qb-white:#FFFFFF; --qb-carbon:#1A1F1C; --qb-green:#263C33; --qb-gold:#B38A52; --qb-silver:#D7D0C2; --qb-gray:#F6F4EF; --qb-text:#555B57; --qb-border:#D8D2C7; --qb-plum:#141817; --qb-peach:#D7B987; background:var(--qb-ivory); color:var(--qb-text); font-family:"DM Sans","Inter",system-ui,sans-serif; }
  .qb-page * { box-sizing:border-box; }
  .qb-page a { color:inherit; text-decoration:none; }
  .qb-wrap { width:min(100% - 32px,1160px); margin-inline:auto; }
  .qb-section { padding:68px 0; }
  .qb-eyebrow { margin:0 0 12px; color:var(--qb-gold); font-size:12px; font-weight:800; letter-spacing:.16em; text-transform:uppercase; }
  .qb-title { margin:0; color:var(--qb-plum); font-family:Georgia,"Times New Roman",serif; font-size:clamp(36px,5vw,64px); line-height:1.04; letter-spacing:0; }
  .qb-updated { margin:16px 0 0; color:var(--qb-plum); font-size:14px; font-weight:800; line-height:1.4; }
  .qb-copy { margin:18px 0 0; max-width:780px; color:var(--qb-text); font-size:17px; line-height:1.75; }
  .qb-button { display:inline-flex; min-height:48px; align-items:center; justify-content:center; border:1px solid var(--qb-plum); border-radius:6px; background:var(--qb-plum); color:#fff !important; padding:0 22px; font-size:14px; font-weight:800; transition:.2s ease; }
  .qb-button:hover { border-color:var(--qb-gold); background:var(--qb-gold); color:var(--qb-plum) !important; }
  .qb-button--secondary { background:#fff; color:var(--qb-plum) !important; }
  .qb-button--secondary:hover { border-color:var(--qb-plum); background:var(--qb-ivory); color:var(--qb-plum) !important; }
  .qb-actions { display:flex; flex-wrap:wrap; gap:14px; margin-top:28px; }
  .qb-hero .qb-actions { justify-content:center; }
  .qb-hero { position:relative; overflow:hidden; border-bottom:1px solid rgba(255,255,255,.12); background:linear-gradient(135deg,#101412 0%,#1F2A24 56%,#6D5334 100%); }
  .qb-hero::before { content:""; position:absolute; inset:auto 0 0; height:1px; background:linear-gradient(90deg,transparent,rgba(179,138,82,.7),transparent); }
  .qb-hero::after { content:""; position:absolute; right:8%; top:34px; width:180px; height:180px; border:1px solid rgba(255,255,255,.16); transform:rotate(12deg); }
  .qb-hero__grid { position:relative; z-index:1; display:grid; grid-template-columns:minmax(0,1fr); gap:28px; align-items:center; padding:70px 0 76px; }
  .qb-hero__content { max-width:720px; margin-inline:auto; text-align:center; }
  .qb-hero .qb-title, .qb-hero .qb-updated { color:#fff; }
  .qb-hero .qb-copy { color:rgba(255,255,255,.78); }
  .qb-hero .qb-copy { max-width:690px; margin-inline:auto; }
  .qb-hero-panel, .qb-policy-card, .qb-contact-card { border:1px solid var(--qb-border); border-radius:6px; background:rgba(255,255,255,.96); box-shadow:0 16px 38px rgba(13,15,15,.06); }
  .qb-hero-panel { padding:clamp(22px,3vw,32px); }
  .qb-glance-list { display:grid; gap:14px; margin:20px 0 0; padding:0; list-style:none; }
  .qb-glance-list li { border:1px solid var(--qb-border); border-radius:6px; background:#fff; padding:16px; color:#5E625F; font-size:14px; line-height:1.6; }
  .qb-glance-list strong { display:block; margin-bottom:5px; color:var(--qb-plum); font-size:14px; line-height:1.25; }
  .qb-soft { background:var(--qb-gray); }
  .qb-content-grid { display:grid; grid-template-columns:minmax(0,1fr); gap:32px; align-items:start; }
  .qb-policy-stack { display:grid; gap:20px; }
  .qb-policy-card { position:relative; padding:clamp(24px,4vw,38px); background:#fff; overflow:hidden; }
  .qb-policy-card::before { content:""; position:absolute; inset:0 auto 0 0; width:4px; background:linear-gradient(180deg,var(--qb-gold),rgba(179,138,82,.2)); }
  .qb-policy-card:nth-child(even) { background:var(--qb-ivory); }
  .qb-policy-card h2 { margin:0; color:var(--qb-plum); font-family:Georgia,"Times New Roman",serif; font-size:clamp(25px,3vw,38px); line-height:1.12; letter-spacing:0; }
  .qb-policy-card h3 { margin:24px 0 0; color:var(--qb-plum); font-size:18px; line-height:1.35; }
  .qb-policy-card p, .qb-policy-card li { color:#5E625F; font-size:15px; line-height:1.72; }
  .qb-policy-card p { margin:14px 0 0; }
  .qb-policy-card ul, .qb-policy-card ol { display:grid; gap:9px; margin:16px 0 0; padding-left:1.15rem; }
  .qb-policy-card ul { list-style:disc outside; }
  .qb-policy-card ol { list-style:decimal outside; }
  .qb-callout { border-left:4px solid var(--qb-gold); border-radius:0 6px 6px 0; background:rgba(179,138,82,.12); padding:15px 18px; }
  .qb-split-grid { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:16px; margin-top:18px; }
  .qb-info-panel { border:1px solid var(--qb-border); border-radius:6px; background:#fff; padding:18px; }
  .qb-info-panel--soft { background:var(--qb-ivory); }
  .qb-info-panel h3 { margin:0; }
  .qb-step-list { counter-reset:warranty-step; display:grid; gap:14px; margin-top:18px; }
  .qb-step { position:relative; border:1px solid var(--qb-border); border-radius:6px; background:#fff; padding:18px 18px 18px 58px; }
  .qb-step::before { counter-increment:warranty-step; content:counter(warranty-step); position:absolute; left:18px; top:18px; width:28px; height:28px; border-radius:999px; display:grid; place-items:center; background:var(--qb-plum); color:#fff; font-size:13px; font-weight:800; }
  .qb-step h3 { margin:0; }
  .qb-contact-card { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:14px; margin-top:22px; padding:18px; background:#fff; box-shadow:none; }
  .qb-contact-item { border:1px solid var(--qb-border); border-radius:6px; background:#fff; padding:16px; }
  .qb-contact-item strong { display:block; color:var(--qb-plum); font-size:14px; }
  .qb-contact-item span { display:block; margin-top:7px; color:#5E625F; font-size:14px; line-height:1.6; overflow-wrap:anywhere; }
  @media (max-width:920px) { .qb-hero__grid, .qb-content-grid, .qb-split-grid { grid-template-columns:1fr; } }
  @media (max-width:680px) {
    .qb-section { padding:44px 0; }
    .qb-hero__grid { gap:28px; padding:46px 0 50px; }
    .qb-hero-panel { margin-inline:-4px; padding:18px 0 18px 18px; overflow:hidden; }
    .qb-hero-panel .qb-eyebrow { margin-bottom:14px; }
    .qb-glance-list {
      display:flex;
      gap:12px;
      margin-top:0;
      overflow-x:auto;
      padding:0 18px 4px 0;
      scroll-padding-left:0;
      scroll-snap-type:x mandatory;
      -webkit-overflow-scrolling:touch;
    }
    .qb-glance-list::-webkit-scrollbar { display:none; }
    .qb-glance-list { scrollbar-width:none; }
    .qb-glance-list li {
      flex:0 0 min(78vw,300px);
      min-height:104px;
      scroll-snap-align:start;
    }
    .qb-contact-card { grid-template-columns:1fr; }
    .qb-actions { flex-direction:column; }
    .qb-button { width:100%; }
    .qb-step { padding-left:18px; padding-top:58px; }
  }
</style>

<div class="qb-page qb-warranty-policy">
  <section class="qb-hero">
    <div class="qb-wrap qb-hero__grid">
      <div class="qb-hero__content">
        <p class="qb-eyebrow"><?php esc_html_e('Warranty Policy', 'dawp'); ?></p>
        <h1 class="qb-title"><?php esc_html_e('2-Year Limited Warranty', 'dawp'); ?></h1>
        <p class="qb-updated"><?php esc_html_e('Last Updated: May 28, 2026', 'dawp'); ?></p>
        <p class="qb-copy"><?php echo esc_html(sprintf('Every %s watch is covered by a 2-year limited warranty against manufacturing defects from the original date of purchase.', $store_name)); ?></p>
        <div class="qb-actions">
          <a class="qb-button" href="<?php echo esc_url($support_portal); ?>"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
          <a class="qb-button qb-button--secondary" href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a>
        </div>
      </div>
    </div>
  </section>

  <section class="qb-section qb-soft">
    <div class="qb-wrap qb-content-grid">
      <div class="qb-policy-stack">
        <section id="warranty-coverage" class="qb-policy-card">
          <h2><?php esc_html_e('What Is Covered', 'dawp'); ?></h2>
          <p><?php echo esc_html(sprintf('%s warrants every watch against manufacturing defects in materials and workmanship for 2 years from the original date of purchase, when bought directly from our official store.', $store_name)); ?></p>
          <ul>
            <li><?php esc_html_e('Movement defects that prevent the watch from keeping time under normal use.', 'dawp'); ?></li>
            <li><?php esc_html_e('Case, crown, pusher, or clasp defects present at the time of manufacture.', 'dawp'); ?></li>
            <li><?php esc_html_e('Dial, hand, or hardware faults caused by a manufacturing error rather than daily wear.', 'dawp'); ?></li>
          </ul>
          <div class="qb-callout">
            <p><?php esc_html_e('The warranty period begins on the delivery date confirmed by your order and shipping records.', 'dawp'); ?></p>
          </div>
        </section>

        <section id="warranty-exclusions" class="qb-policy-card">
          <h2><?php esc_html_e('What Is Not Covered', 'dawp'); ?></h2>
          <p><?php esc_html_e('This warranty does not cover damage or wear that results from use, handling, or modification after delivery, including:', 'dawp'); ?></p>
          <div class="qb-split-grid">
            <div class="qb-info-panel">
              <h3><?php esc_html_e('Normal Wear & Accidents', 'dawp'); ?></h3>
              <p><?php esc_html_e('Scratches, scuffs, strap wear, crystal impact damage, or water exposure beyond the listed water resistance rating.', 'dawp'); ?></p>
            </div>
            <div class="qb-info-panel qb-info-panel--soft">
              <h3><?php esc_html_e('Unauthorized Service', 'dawp'); ?></h3>
              <p><?php esc_html_e('Damage caused by drops, misuse, unauthorized repair or disassembly, battery replacement by a third party, or loss/theft.', 'dawp'); ?></p>
            </div>
          </div>
          <p><?php esc_html_e('Battery replacement, strap wear, and cosmetic changes from everyday use are considered normal maintenance and are not covered under this warranty.', 'dawp'); ?></p>
        </section>

        <section id="warranty-claim" class="qb-policy-card">
          <h2><?php esc_html_e('How to File a Warranty Claim', 'dawp'); ?></h2>
          <p><?php esc_html_e('Please follow this process. Do not send any item back without prior authorization, because unauthorized packages cannot be tracked or processed at our warehouse.', 'dawp'); ?></p>
          <div class="qb-step-list">
            <div class="qb-step">
              <h3><?php esc_html_e('Contact Support', 'dawp'); ?></h3>
              <p><?php esc_html_e('Email us or use our Contact Page with your order number, the email used at checkout, and a clear description of the defect, along with photos or a short video.', 'dawp'); ?></p>
            </div>
            <div class="qb-step">
              <h3><?php esc_html_e('Claim Review', 'dawp'); ?></h3>
              <p><?php esc_html_e('Our support team reviews warranty claims within 1-2 business days and will confirm whether the issue qualifies as a manufacturing defect under this policy.', 'dawp'); ?></p>
            </div>
            <div class="qb-step">
              <h3><?php esc_html_e('Repair or Replacement', 'dawp'); ?></h3>
              <p><?php esc_html_e('Approved claims are resolved by repair or replacement at our discretion, at no cost to you. We will provide shipping instructions by email once your claim is approved.', 'dawp'); ?></p>
            </div>
          </div>
          <div class="qb-actions">
            <a class="qb-button" href="<?php echo esc_url($support_portal); ?>"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
            <a class="qb-button qb-button--secondary" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
          </div>
        </section>

        <section id="warranty-timing" class="qb-policy-card">
          <h2><?php esc_html_e('Processing Time', 'dawp'); ?></h2>
          <p><?php esc_html_e('Once a repaired or replacement watch ships, you will receive a tracking confirmation by email. Most approved warranty claims are resolved within 10-15 business days of receiving the returned item at our facility, though complex repairs may take longer.', 'dawp'); ?></p>
        </section>

        <section id="warranty-related-policies" class="qb-policy-card">
          <h2><?php esc_html_e('Related Policies', 'dawp'); ?></h2>
          <p><?php esc_html_e('This warranty is separate from our standard return window. If you are within 30 days of delivery and simply wish to return an unworn item, see our Return & Refund Policy instead.', 'dawp'); ?></p>
          <div class="qb-actions">
            <a class="qb-button qb-button--secondary" href="<?php echo esc_url(home_url('/return-refund-policy/')); ?>"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></a>
            <a class="qb-button qb-button--secondary" href="<?php echo esc_url(home_url('/shipping-policy/')); ?>"><?php esc_html_e('Shipping Policy', 'dawp'); ?></a>
          </div>
        </section>

        <section id="contact-info" class="qb-policy-card">
          <h2><?php esc_html_e('Contact Information', 'dawp'); ?></h2>
          <div class="qb-contact-card">
            <div class="qb-contact-item">
              <strong><?php esc_html_e('Store Name', 'dawp'); ?></strong>
              <span><?php echo esc_html($store_name); ?></span>
            </div>
            <?php if ($store_address) : ?>
              <div class="qb-contact-item">
                <strong><?php esc_html_e('Address', 'dawp'); ?></strong>
                <span><?php echo esc_html($store_address); ?></span>
              </div>
            <?php endif; ?>
            <div class="qb-contact-item">
              <strong><?php esc_html_e('Email', 'dawp'); ?></strong>
              <span><a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a></span>
            </div>
            <div class="qb-contact-item">
              <strong><?php esc_html_e('Customer Service Hours', 'dawp'); ?></strong>
              <span><?php esc_html_e('Monday-Friday, 9:00 AM-6:00 PM Pacific Time.', 'dawp'); ?></span>
            </div>
            <div class="qb-contact-item">
              <strong><?php esc_html_e('Response Time', 'dawp'); ?></strong>
              <span><?php esc_html_e('We aim to reply within 1 business day.', 'dawp'); ?></span>
            </div>
          </div>
        </section>
      </div>
    </div>
  </section>
</div>
