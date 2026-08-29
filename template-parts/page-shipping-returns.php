<?php
/**
 * Template Part: page-shipping-returns
 *
 * @package dawp
 */

$support_email = function_exists('dawp_contact_support_email') ? dawp_contact_support_email() : 'support@orveltime.com';
?>

<style>
  .qb-page { --qb-ivory:#F5F2EB; --qb-white:#FFFFFF; --qb-gold:#B38A52; --qb-text:#5E625F; --qb-border:#B8B8B2; --qb-plum:#171A19; background:var(--qb-ivory); color:var(--qb-text); font-family:"DM Sans","Inter",system-ui,sans-serif; }
  .qb-page * { box-sizing:border-box; }
  .qb-page a { color:inherit; text-decoration:none; }
  .qb-wrap { width:min(100% - 32px,1160px); margin-inline:auto; }
  .qb-section { padding:68px 0; }
  .qb-eyebrow { margin:0 0 12px; color:var(--qb-gold); font-size:12px; font-weight:800; letter-spacing:.16em; text-transform:uppercase; }
  .qb-title { margin:0; color:var(--qb-plum); font-family:Georgia,"Times New Roman",serif; font-size:clamp(36px,5vw,64px); line-height:1.04; letter-spacing:0; }
  .qb-updated { margin:16px 0 0; color:var(--qb-plum); font-size:14px; font-weight:800; line-height:1.4; }
  .qb-copy { margin:18px 0 0; max-width:700px; color:var(--qb-text); font-size:17px; line-height:1.75; }
  .qb-actions { display:flex; flex-wrap:wrap; gap:14px; margin-top:28px; }
  .qb-hero .qb-actions { justify-content:center; }
  .qb-button { display:inline-flex; min-height:48px; align-items:center; justify-content:center; border:1px solid var(--qb-plum); border-radius:999px; background:var(--qb-plum); color:#fff !important; padding:0 22px; font-size:14px; font-weight:800; transition:.2s ease; }
  .qb-button:hover { border-color:var(--qb-gold); background:var(--qb-gold); color:var(--qb-plum) !important; }
  .qb-button--secondary { background:#fff; color:var(--qb-plum) !important; }
  .qb-button--secondary:hover { border-color:var(--qb-plum); background:var(--qb-ivory); color:var(--qb-plum) !important; }
  .qb-hero { position:relative; overflow:hidden; background:linear-gradient(135deg,rgba(245,242,235,.98),rgba(255,255,255,.94) 50%,rgba(38,60,51,.13)),#F5F2EB; }
  .qb-hero::after { content:""; position:absolute; right:7%; bottom:-92px; width:360px; height:360px; border:1px solid rgba(179,138,82,.22); border-radius:999px; background:rgba(255,255,255,.2); }
  .qb-hero__grid { position:relative; z-index:1; display:grid; grid-template-columns:minmax(0,1fr); gap:28px; align-items:center; padding:78px 0 84px; }
  .qb-hero__content { max-width:720px; margin-inline:auto; text-align:center; }
  .qb-hero .qb-copy { margin-inline:auto; }
  .qb-soft { background:#F5F2EB; }
  .qb-policy-grid { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:20px; }
  .qb-policy-card { border:1px solid var(--qb-border); border-radius:20px; background:#fff; padding:clamp(24px,4vw,38px); box-shadow:0 18px 46px rgba(13,15,15,.06); }
  .qb-policy-card h2 { margin:0; color:var(--qb-plum); font-family:Georgia,"Times New Roman",serif; font-size:clamp(25px,3vw,38px); line-height:1.12; letter-spacing:0; }
  .qb-policy-card p { margin:14px 0 0; color:#5E625F; font-size:15px; line-height:1.72; }
  @media (max-width:780px) { .qb-section { padding:44px 0; } .qb-hero__grid { padding:46px 0 50px; } .qb-policy-grid { grid-template-columns:1fr; } .qb-actions { flex-direction:column; } .qb-button { width:100%; } }
</style>

<div class="qb-page qb-shipping-returns">
  <section class="qb-hero">
    <div class="qb-wrap qb-hero__grid">
      <div class="qb-hero__content">
        <p class="qb-eyebrow"><?php esc_html_e('Policy Center', 'dawp'); ?></p>
        <h1 class="qb-title"><?php esc_html_e('Shipping & Returns', 'dawp'); ?></h1>
        <p class="qb-updated"><?php esc_html_e('Last Updated: May 28, 2026', 'dawp'); ?></p>
        <p class="qb-copy"><?php esc_html_e('Quick access to shipping, returns, refunds, and order support.', 'dawp'); ?></p>
        <div class="qb-actions">
          <a class="qb-button" href="<?php echo esc_url(home_url('/shipping-policy/')); ?>"><?php esc_html_e('Shipping Policy', 'dawp'); ?></a>
          <a class="qb-button qb-button--secondary" href="<?php echo esc_url(home_url('/return-refund-policy/')); ?>"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></a>
          <a class="qb-button qb-button--secondary" href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a>
        </div>
      </div>
    </div>
  </section>

  <section class="qb-section qb-soft">
    <div class="qb-wrap qb-policy-grid">
      <section class="qb-policy-card">
        <h2><?php esc_html_e('Shipping Policy', 'dawp'); ?></h2>
        <p><?php esc_html_e('Review delivery locations, shipping costs, processing times, carrier tracking, and delivery issue support.', 'dawp'); ?></p>
        <div class="qb-actions">
          <a class="qb-button qb-button--secondary" href="<?php echo esc_url(home_url('/shipping-policy/')); ?>"><?php esc_html_e('View Shipping Policy', 'dawp'); ?></a>
        </div>
      </section>

      <section class="qb-policy-card">
        <h2><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></h2>
        <p><?php esc_html_e('Review return eligibility, return shipping fees, refund timing, non-returnable items, and support details.', 'dawp'); ?></p>
        <div class="qb-actions">
          <a class="qb-button qb-button--secondary" href="<?php echo esc_url(home_url('/return-refund-policy/')); ?>"><?php esc_html_e('View Return Policy', 'dawp'); ?></a>
        </div>
      </section>
    </div>
  </section>
</div>
