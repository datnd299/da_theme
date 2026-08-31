<?php
/**
 * Template Part: page-shipping-returns
 *
 * @package dawp
 */

$support_email = function_exists('dawp_contact_support_email') ? dawp_contact_support_email() : 'support@zorexcraft.com';
?>

<style>
  .qb-page { --qb-ivory:#F7F7F5; --qb-white:#FFFFFF; --qb-gold:#A8754F; --qb-text:#707579; --qb-border:#E2E4E4; --qb-plum:#173B57; background:var(--qb-ivory); color:var(--qb-text); font-family:"Lato","Inter",system-ui,sans-serif; }
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
  .qb-policy-card p { margin:14px 0 0; color:#707579; font-size:15px; line-height:1.72; }
  @media (max-width:780px) { .qb-section { padding:44px 0; } .qb-hero__grid { padding:46px 0 50px; } .qb-policy-grid { grid-template-columns:1fr; } .qb-actions { flex-direction:column; } .qb-button { width:100%; } }
  .qb-page { background:#F3F1EC; }
  .qb-wrap { width:min(100% - 40px,1080px); }
  .qb-hero { background:linear-gradient(180deg,#F9F8F4 0%,#ECE8DF 100%); }
  .qb-hero::before { content:""; position:absolute; inset:0 auto 0 8%; width:1px; background:rgba(23,59,87,.14); }
  .qb-hero::after { right:10%; top:50%; bottom:auto; width:280px; height:280px; border-color:rgba(23,59,87,.13); background:transparent; transform:translateY(-50%); }
  .qb-hero__grid { padding:82px 0 66px; }
  .qb-hero__content { max-width:760px; margin-inline:0 auto; text-align:left; }
  .qb-hero .qb-copy { margin-inline:0; }
  .qb-hero .qb-actions { justify-content:flex-start; }
  .qb-title { max-width:760px; font-size:clamp(38px,5.6vw,72px); }
  .qb-button { border-radius:4px; min-height:46px; }
  .qb-soft { background:#F3F1EC; }
  .qb-policy-grid { counter-reset:policy-section; gap:16px; }
  .qb-policy-card { position:relative; border-radius:4px; border-color:#D7D2C8; box-shadow:none; padding:clamp(28px,4vw,44px); }
  .qb-policy-card:nth-child(even) { background:#FCFBF8; }
  .qb-policy-card::before { counter-increment:policy-section; content:counter(policy-section, decimal-leading-zero); display:block; margin-bottom:18px; color:rgba(168,117,79,.72); font-family:Georgia,"Times New Roman",serif; font-size:18px; font-weight:700; }
  .qb-policy-card h2 { font-size:clamp(24px,2.6vw,34px); }
  .qb-policy-card p { line-height:1.78; }
  @media (max-width:780px) {
    .qb-wrap { width:min(100% - 28px,1080px); }
    .qb-hero__content { text-align:left; }
    .qb-hero .qb-actions { justify-content:stretch; }
  }
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
