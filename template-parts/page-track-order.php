<?php
/**
 * Track Order - ShopGraphicShirt
 */
$sgs_to_hero_bg = sprintf(
  "--sgs-to-hero-bg:url('%s');--sgs-to-hero-bg-mobile:url('%s')",
  esc_url(dawp_theme_cdn_image_url('assets/img/hero/tracking-hero-background.png', 1600, 760)),
  esc_url(dawp_theme_cdn_image_url('assets/img/hero/tracking-hero-background.png', 720, 600))
);
$sgs_to_tips_bg = sprintf(
  "--sgs-to-tips-bg:url('%s');--sgs-to-tips-bg-mobile:url('%s')",
  esc_url(dawp_theme_cdn_image_url('assets/img/track/tracking-tips-background.jpg', 900, 700)),
  esc_url(dawp_theme_cdn_image_url('assets/img/track/tracking-tips-background.jpg', 700, 420))
);
?>
<section class="sgs-home sgs-page" style="<?php echo esc_attr($sgs_to_hero_bg . ';' . $sgs_to_tips_bg); ?>">
<style>
.sgs-to-hero{background:linear-gradient(90deg,rgba(11,31,58,.96) 0%,rgba(11,31,58,.84) 42%,rgba(11,31,58,.58) 100%),var(--sgs-to-hero-bg) center right/cover no-repeat,var(--navy);color:var(--white);padding:clamp(64px,8vw,108px) clamp(24px,4vw,64px);text-align:center}
.sgs-to-hero__inner{max-width:760px;margin:0 auto}
.sgs-to-hero h1{margin:0;font-family:var(--font-heading);font-size:clamp(2rem,4.5vw,3.5rem);font-weight:800;letter-spacing:-.02em;line-height:1.05;color:var(--white)}
.sgs-to-hero p{max-width:660px;margin:18px auto 0;color:rgba(255,255,255,.84);font-size:clamp(.95rem,1.3vw,1.08rem);line-height:1.7}
.sgs-to-section{width:min(100% - 48px,1200px);margin:0 auto;padding:var(--section-gap,72px) 0}
.sgs-to-section--surface{width:100%;max-width:none;padding-inline:clamp(24px,4vw,64px);background:var(--antique)}
.sgs-to-layout{display:grid;grid-template-columns:minmax(0,1.05fr) minmax(320px,.95fr);gap:24px;align-items:start}
.sgs-to-panel{border:1px solid var(--line);border-radius:var(--radius);background:var(--white);padding:clamp(24px,3vw,36px);box-shadow:0 12px 30px rgba(11,31,58,.08)}
.sgs-to-panel h2,.sgs-to-card h2{margin:0 0 12px;font-family:var(--font-heading);font-size:clamp(1.2rem,2vw,1.55rem);font-weight:700;color:var(--ink);line-height:1.15}
.sgs-to-panel p,.sgs-to-card p{margin:0;color:var(--muted);font-size:.92rem;line-height:1.7}
.sgs-to-panel p + p,.sgs-to-card p + p{margin-top:12px}
.sgs-to-formwrap{margin-top:22px}
.sgs-to-formwrap .woocommerce-form-track-order,.sgs-to-fallback{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:14px;margin:0}
.sgs-to-formwrap .woocommerce-form-track-order>p{margin:0}
.sgs-to-formwrap .woocommerce-form-track-order>p:not(.form-row){grid-column:1/-1;margin:0!important;padding:0!important;border:0!important;background:transparent!important;color:var(--muted)!important;font-size:.92rem;line-height:1.7}
.sgs-to-formwrap .form-row,.sgs-to-formwrap .woocommerce-form-row{float:none!important;clear:none!important;width:auto!important;margin:0!important;padding:0!important}
.sgs-to-formwrap .form-row-first,.sgs-to-formwrap .form-row-last{float:none!important;width:auto!important}
.sgs-to-formwrap label,.sgs-to-fallback label{display:block;margin:0 0 8px;font-family:var(--font-heading);font-size:.78rem;font-weight:800;letter-spacing:.04em;text-transform:uppercase;color:var(--ink)}
.sgs-to-formwrap input.input-text,.sgs-to-fallback input{width:100%;max-width:100%;height:50px;padding:0 14px;border:1.5px solid var(--line);border-radius:var(--radius);background:#fafafa;color:var(--ink);outline:none;font-size:.92rem;font-family:var(--font-body);box-sizing:border-box}
.sgs-to-formwrap input.input-text:focus,.sgs-to-fallback input:focus{border-color:var(--red);box-shadow:0 0 0 3px rgba(179,25,66,.12)}
.sgs-to-formwrap button.button,.sgs-to-formwrap input.button,.sgs-to-formwrap input[type=submit],.sgs-to-fallback .sgs-btn{display:inline-flex!important;width:100%;min-height:50px;align-items:center;justify-content:center;border:2px solid var(--red)!important;border-radius:var(--radius);background:var(--red)!important;color:var(--white)!important;-webkit-text-fill-color:var(--white);padding:0 28px;font-family:var(--font-heading);font-size:.82rem;font-weight:800;letter-spacing:.04em;line-height:1.1;text-align:center;text-decoration:none;text-transform:uppercase;box-shadow:0 3px 10px rgba(179,25,66,.25);appearance:none;transition:transform 180ms,background-color 180ms,border-color 180ms,box-shadow 180ms;cursor:pointer}
.sgs-to-formwrap button.button:hover,.sgs-to-formwrap input.button:hover,.sgs-to-formwrap input[type=submit]:hover,.sgs-to-fallback .sgs-btn:hover{transform:translateY(-2px);background:#8c1233!important;border-color:#8c1233!important;box-shadow:0 6px 16px rgba(179,25,66,.32)}
.sgs-to-formwrap .clear{display:none}
.sgs-to-formwrap .form-row:has(.button),.sgs-to-formwrap .form-row:has(input[type=submit]),.sgs-to-formwrap .woocommerce-form-track-order>p:last-child,.sgs-to-fallback__actions{grid-column:1/-1;margin-top:2px}
.sgs-to-note{margin-top:18px;border-left:4px solid var(--gold);border-radius:0 var(--radius) var(--radius) 0;background:#fff7e8;padding:16px 18px;color:var(--muted);font-size:.88rem;line-height:1.6}
.sgs-to-note strong{color:var(--ink)}
.sgs-to-side{display:grid;gap:16px}
.sgs-to-card{border:1px solid var(--line);border-radius:var(--radius);background:var(--white);padding:24px;transition:box-shadow 180ms,transform 180ms}
.sgs-to-card:hover{box-shadow:var(--shadow-sm);transform:translateY(-3px)}
.sgs-to-card--tips{position:relative;overflow:hidden;display:flex;min-height:100%;flex-direction:column;justify-content:center;padding:clamp(28px,4vw,46px);background:linear-gradient(90deg,rgba(255,255,255,.98) 0%,rgba(255,255,255,.94) 42%,rgba(255,255,255,.74) 68%,rgba(255,255,255,.2) 100%),var(--sgs-to-tips-bg) center right/cover no-repeat,var(--white)}
.sgs-to-card--tips::after{content:'';position:absolute;inset:auto 0 0 0;height:4px;background:linear-gradient(90deg,var(--red),var(--gold));pointer-events:none}
.sgs-to-card--tips h2,.sgs-to-card--tips p{position:relative;max-width:430px}
.sgs-to-card--tips .sgs-to-link{font-family:var(--font-heading);font-weight:700}
.sgs-to-meta{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:12px;margin-top:18px}
.sgs-to-meta__item{display:flex;min-height:68px;align-items:center;justify-content:center;gap:10px;border:1px solid var(--line);border-radius:var(--radius);background:#fafafa;padding:12px 14px;text-align:left}
.sgs-to-meta__icon{display:inline-flex;width:24px;height:24px;flex:0 0 24px;align-items:center;justify-content:center;color:var(--muted)}
.sgs-to-meta__icon svg{display:block;width:21px;height:21px;stroke:currentColor;stroke-width:2.15;fill:none;stroke-linecap:round;stroke-linejoin:round}
.sgs-to-meta__label{display:block;color:var(--muted);font-size:.8rem;line-height:1.25;white-space:nowrap}
.sgs-to-steps-slider{position:relative}
.sgs-to-steps{display:grid;grid-template-columns:repeat(4,1fr);gap:14px}
.sgs-to-step{position:relative;border:1px solid var(--line);border-radius:var(--radius);background:var(--white);padding:22px;min-height:178px}
.sgs-to-step__num{display:flex;width:34px;height:34px;align-items:center;justify-content:center;border-radius:50%;background:var(--navy);color:var(--white);font-family:var(--font-heading);font-size:.85rem;font-weight:800}
.sgs-to-step h3{margin:18px 0 8px;font-family:var(--font-heading);font-size:.98rem;font-weight:700;color:var(--ink);line-height:1.2}
.sgs-to-step p{margin:0;color:var(--muted);font-size:.85rem;line-height:1.55}
.sgs-to-steps-controls{display:none}
.sgs-to-steps-arrow{display:grid;place-items:center;width:38px;height:38px;border:1px solid var(--line);border-radius:50%;background:var(--white);color:var(--ink);font-family:var(--font-heading);font-size:1.35rem;line-height:1;box-shadow:0 8px 18px rgba(11,31,58,.08);transition:background 180ms,border-color 180ms,color 180ms,opacity 180ms;cursor:pointer}
.sgs-to-steps-arrow:disabled{opacity:.38;cursor:default}
.sgs-to-steps-arrow:not(:disabled):hover{border-color:var(--red);background:var(--red);color:var(--white)}
.sgs-to-steps-dots{display:flex;align-items:center;gap:7px}
.sgs-to-steps-dot{width:7px;height:7px;border:0;border-radius:999px;background:rgba(11,31,58,.22);padding:0;transition:width 180ms,background 180ms;cursor:pointer}
.sgs-to-steps-dot[data-active="true"]{width:22px;background:var(--red)}
.sgs-to-support{display:grid;grid-template-columns:1fr 1fr;gap:16px}
.sgs-to-link{color:var(--red);text-decoration:underline;text-underline-offset:2px}
.sgs-to-faq{display:grid;gap:12px}
.sgs-to-faq details{border:1px solid var(--line);border-radius:var(--radius);background:var(--white);padding:0}
.sgs-to-faq summary{cursor:pointer;padding:18px 20px;font-family:var(--font-heading);font-weight:700;color:var(--ink);list-style:none}
.sgs-to-faq summary::-webkit-details-marker{display:none}
.sgs-to-faq details p{padding:0 20px 18px;margin:0;color:var(--muted);font-size:.88rem;line-height:1.65}
@media(max-width:960px){.sgs-to-layout,.sgs-to-steps,.sgs-to-support{grid-template-columns:1fr}.sgs-to-meta{grid-template-columns:repeat(3,minmax(0,1fr))}.sgs-to-card--tips{min-height:340px;justify-content:flex-start}}
@media(max-width:700px){.sgs-to-hero{background-image:linear-gradient(180deg,rgba(11,31,58,.76) 0%,rgba(11,31,58,.96) 100%),var(--sgs-to-hero-bg-mobile,var(--sgs-to-hero-bg))}.sgs-to-section{width:100%;padding:52px 0}.sgs-to-section>*,.sgs-to-section--surface>*{width:min(100% - 40px,1200px);margin-inline:auto}.sgs-to-section--surface{padding-inline:0}.sgs-to-panel{padding:22px}.sgs-to-card--tips{min-height:310px;background:linear-gradient(180deg,rgba(255,255,255,.98) 0%,rgba(255,255,255,.9) 54%,rgba(255,255,255,.48) 100%),var(--sgs-to-tips-bg-mobile,var(--sgs-to-tips-bg)) center bottom/cover no-repeat,var(--white)}.sgs-to-formwrap .woocommerce-form-track-order,.sgs-to-fallback{grid-template-columns:1fr}.sgs-to-meta{grid-template-columns:repeat(3,minmax(0,1fr));gap:8px}.sgs-to-meta__item{min-height:62px;flex-direction:column;gap:5px;padding:9px 6px;text-align:center}.sgs-to-meta__icon{width:22px;height:22px;flex-basis:22px}.sgs-to-meta__icon svg{width:19px;height:19px}.sgs-to-meta__label{font-size:.68rem;line-height:1.15;white-space:normal}.sgs-to-formwrap .button,.sgs-to-fallback .sgs-btn{width:100%}.sgs-to-steps{display:flex;grid-template-columns:none;gap:14px;width:auto;margin-inline:-20px;overflow-x:auto;scroll-snap-type:x mandatory;scroll-padding-inline:20px;padding:0 20px 4px;-webkit-overflow-scrolling:touch;scrollbar-width:none}.sgs-to-steps::-webkit-scrollbar{display:none}.sgs-to-step{flex:0 0 min(82vw,360px);min-height:auto;scroll-snap-align:center}.sgs-to-steps-controls{display:flex;align-items:center;justify-content:center;gap:14px;margin-top:18px}}
</style>

<div class="sgs-to-hero">
  <div class="sgs-to-hero__inner">
    <p class="sgs-eyebrow sgs-eyebrow--light">Order Tracking</p>
    <h1>Track Your ShopGraphicShirt Order</h1>
    <p>Check the latest status for your patriotic apparel, custom gifts, and accessories using your order number and billing email.</p>
  </div>
</div>

<div class="sgs-to-section">
  <div class="sgs-to-layout">
    <div class="sgs-to-panel">
      <h2>Find Your Shipment</h2>
      <p>Your order number is in the confirmation email we sent after checkout. Tracking details are available once your package has shipped.</p>
      <div class="sgs-to-formwrap">
        <?php if (shortcode_exists('woocommerce_order_tracking')) : ?>
          <?php echo do_shortcode('[woocommerce_order_tracking]'); ?>
        <?php else : ?>
          <form class="sgs-to-fallback" onsubmit="event.preventDefault(); alert('Please contact support@shopgraphicshirt.com with your order number for tracking help.');">
            <p>
              <label for="to-order">Order Number</label>
              <input id="to-order" type="text" placeholder="Example: #12345" required>
            </p>
            <p>
              <label for="to-email">Billing Email</label>
              <input id="to-email" type="email" placeholder="you@example.com" required>
            </p>
            <p class="sgs-to-fallback__actions">
              <button class="sgs-btn sgs-btn--primary" type="submit">Track Order</button>
            </p>
          </form>
        <?php endif; ?>
      </div>
      <div class="sgs-to-note">
        <p><strong>No tracking yet?</strong> Custom and made-to-order items may need production time before the carrier scan appears.</p>
      </div>
    </div>

    <div class="sgs-to-side">
      <div class="sgs-to-card">
        <h2>What You Need</h2>
        <p>Use the exact billing email from checkout and the order number from your confirmation message.</p>
        <div class="sgs-to-meta">
          <div class="sgs-to-meta__item">
            <span class="sgs-to-meta__icon" aria-hidden="true">
              <svg viewBox="0 0 24 24"><path d="M9 7h10"/><path d="M9 12h10"/><path d="M9 17h10"/><path d="M5 7h.01"/><path d="M5 12h.01"/><path d="M5 17h.01"/></svg>
            </span>
            <span class="sgs-to-meta__label">Order number</span>
          </div>
          <div class="sgs-to-meta__item">
            <span class="sgs-to-meta__icon" aria-hidden="true">
              <svg viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></svg>
            </span>
            <span class="sgs-to-meta__label">Billing email</span>
          </div>
          <div class="sgs-to-meta__item">
            <span class="sgs-to-meta__icon" aria-hidden="true">
              <svg viewBox="0 0 24 24"><path d="M4 19v-7a8 8 0 0 1 16 0v7"/><path d="M4 13h3a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2H4"/><path d="M20 13h-3a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h3"/><path d="M12 4V2"/></svg>
            </span>
            <span class="sgs-to-meta__label">Support reply</span>
          </div>
        </div>
      </div>
      <div class="sgs-to-card">
        <h2>Need Help?</h2>
        <p>If the form cannot find your order, send us your order number and email. We will check the latest carrier status for you.</p>
        <p><a class="sgs-to-link" href="mailto:support@shopgraphicshirt.com">support@shopgraphicshirt.com</a></p>
      </div>
    </div>
  </div>
</div>

<div class="sgs-to-section sgs-to-section--surface">
  <div class="sgs-to-steps-slider" data-track-steps-slider>
  <div class="sgs-to-steps" data-track-steps-track>
    <div class="sgs-to-step" data-track-steps-slide>
      <span class="sgs-to-step__num">1</span>
      <h3>Order Confirmed</h3>
      <p>We receive your order details and send a confirmation email.</p>
    </div>
    <div class="sgs-to-step" data-track-steps-slide>
      <span class="sgs-to-step__num">2</span>
      <h3>In Production</h3>
      <p>Your apparel or custom gift is prepared, printed, and quality checked.</p>
    </div>
    <div class="sgs-to-step" data-track-steps-slide>
      <span class="sgs-to-step__num">3</span>
      <h3>Shipped</h3>
      <p>A tracking link is emailed once the carrier receives your package.</p>
    </div>
    <div class="sgs-to-step" data-track-steps-slide>
      <span class="sgs-to-step__num">4</span>
      <h3>Delivered</h3>
      <p>Your package arrives at the shipping address entered at checkout.</p>
    </div>
  </div>
  <div class="sgs-to-steps-controls" aria-label="Order progress slider controls">
    <button class="sgs-to-steps-arrow" type="button" data-track-steps-prev aria-label="Previous order progress step">&lsaquo;</button>
    <div class="sgs-to-steps-dots" aria-label="Order progress slides">
      <?php for ($i = 0; $i < 4; $i++) : ?>
        <button class="sgs-to-steps-dot" type="button" data-track-steps-dot aria-label="<?php echo esc_attr(sprintf('Go to order progress step %d', $i + 1)); ?>"></button>
      <?php endfor; ?>
    </div>
    <button class="sgs-to-steps-arrow" type="button" data-track-steps-next aria-label="Next order progress step">&rsaquo;</button>
  </div>
  </div>
</div>

<div class="sgs-to-section">
  <div class="sgs-to-support">
    <div class="sgs-to-card sgs-to-card--tips">
      <h2>Tracking Tips</h2>
      <p>Carrier pages can take 24-48 hours to show the first scan after a label is created. If your tracking says delivered but you cannot find the package, check nearby delivery spots and contact us within 30 days.</p>
      <p><a class="sgs-to-link" href="/shipping-policy/">View Shipping Policy</a></p>
    </div>
    <div class="sgs-to-card">
      <h2>Quick FAQ</h2>
      <div class="sgs-to-faq">
        <details>
          <summary>Where is my order number?</summary>
          <p>It appears in your order confirmation email, usually near the top of the message.</p>
        </details>
        <details>
          <summary>Why does my tracking link show no movement?</summary>
          <p>The carrier may need 24-48 hours after pickup to publish the first scan.</p>
        </details>
        <details>
          <summary>Can I change my shipping address?</summary>
          <p>Please contact us as soon as possible. Address changes may not be possible after production or shipment begins.</p>
        </details>
      </div>
    </div>
  </div>
</div>
</section>
