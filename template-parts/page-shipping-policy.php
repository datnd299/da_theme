<?php
/**
 * Shipping Policy - ShopGraphicshirt
 * Style aligned with homepage. Content preserved from original.
 */
$store_address = function_exists('dawp_get_woocommerce_store_address') ? dawp_get_woocommerce_store_address() : '';
$store_address = $store_address ?: __('United States', 'dawp');

get_header(); ?>
<section class="sgs-home sgs-page">
<style>
.sgs-sp-hero{background:linear-gradient(90deg,rgba(11,31,58,.96) 0%,rgba(11,31,58,.84) 42%,rgba(11,31,58,.58) 100%),url('<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/hero/tracking-hero-background.png') center right/cover no-repeat,var(--navy);color:var(--white);padding:clamp(60px,8vw,100px) clamp(24px,4vw,64px);text-align:center}
.sgs-sp-hero__inner{max-width:680px;margin:0 auto}
.sgs-sp-hero h1{margin:0;font-family:var(--font-heading);font-size:clamp(2rem,4.5vw,3.5rem);font-weight:800;letter-spacing:-.02em;line-height:1.05;color:var(--white)}
.sgs-sp-hero p{max-width:580px;margin:18px auto 0;color:rgba(255,255,255,.82);font-size:clamp(.95rem,1.3vw,1.1rem);line-height:1.7}
.sgs-sp-section{width:min(100% - 48px,1200px);margin:0 auto;padding:var(--section-gap,72px) 0}
.sgs-sp-section--surface{width:100%;max-width:none;padding-inline:clamp(24px,4vw,64px);background:var(--antique)}
.sgs-sp-timeline{margin-bottom:28px}
.sgs-sp-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:14px}
.sgs-sp-card{padding:24px 20px;border:1px solid var(--line);border-radius:var(--radius);background:var(--white);text-align:center;transition:box-shadow 180ms,transform 180ms}
.sgs-sp-card:hover{box-shadow:var(--shadow-sm);transform:translateY(-3px)}
.sgs-sp-card h3{margin:0 0 8px;font-family:var(--font-heading);font-size:.95rem;font-weight:700;color:var(--ink);line-height:1.2}
.sgs-sp-card p{margin:0;color:var(--muted);font-size:.85rem;line-height:1.5}
.sgs-sp-panel{border:1px solid var(--line);border-radius:var(--radius);background:var(--white);padding:clamp(24px,3vw,36px);margin-bottom:16px;transition:box-shadow 180ms}
.sgs-sp-panel:hover{box-shadow:var(--shadow-sm)}
.sgs-sp-panel--soft{background:#fafafa}
.sgs-sp-panel h2{margin:0 0 12px;font-family:var(--font-heading);font-size:clamp(1.2rem,2vw,1.5rem);font-weight:700;color:var(--ink);line-height:1.1}
.sgs-sp-panel p{margin:12px 0 0;color:var(--muted);font-size:.92rem;line-height:1.7}
.sgs-sp-panel p:first-of-type{margin-top:0}
.sgs-sp-panel strong{color:var(--ink)}
.sgs-sp-note{margin-top:16px;border-left:4px solid var(--gold);border-radius:0 var(--radius) var(--radius) 0;background:#fff7e8;padding:18px 20px;color:var(--muted);font-size:.9rem;line-height:1.65}
.sgs-sp-pills{display:flex;flex-wrap:wrap;gap:10px;margin:12px 0}
.sgs-sp-pill{display:inline-flex;min-width:60px;min-height:34px;align-items:center;justify-content:center;border:1px solid var(--line);border-radius:999px;background:var(--white);color:var(--ink);font-size:.8rem;font-weight:700}
.sgs-sp-costs{display:grid;grid-template-columns:repeat(2,1fr);gap:14px;margin-top:12px}
.sgs-sp-actions{display:flex;flex-wrap:wrap;gap:12px;margin-top:20px}
.sgs-sp-contact-actions{align-items:center;gap:10px;margin-top:22px}
.sgs-sp-contact-actions .sgs-btn,.sgs-sp-mail{display:inline-flex;min-height:42px;align-items:center;justify-content:center;border-radius:6px;padding:10px 16px;font-family:var(--font-heading);font-size:.82rem;font-weight:700;line-height:1.2;text-decoration:none;box-shadow:none;transition:background 180ms,border-color 180ms,color 180ms}
.sgs-sp-contact-actions .sgs-btn:hover{box-shadow:none}
.sgs-sp-mail{border:1px solid var(--line);background:var(--white);color:var(--ink)}
.sgs-sp-mail:hover{border-color:var(--red);color:var(--red)}
.sgs-sp-list{margin:14px 0 0;padding-left:20px;color:var(--muted);font-size:.92rem;line-height:1.75}
.sgs-sp-list li{margin:6px 0}
.sgs-sp-link{color:var(--red);text-decoration:underline;text-underline-offset:2px}
.sgs-sp-slider__controls{display:none}
.sgs-sp-support{border:1px solid var(--line);border-radius:var(--radius);background:var(--white);display:grid;grid-template-columns:repeat(3,1fr);gap:0;padding:20px;margin-top:16px}
.sgs-sp-support__item{text-align:center;padding:22px 18px;border-right:1px solid var(--line);border-bottom:1px solid var(--line)}
.sgs-sp-support__item:nth-child(3n){border-right:0}
.sgs-sp-support__item:nth-last-child(-n+3){border-bottom:0}
.sgs-sp-support__item strong{display:block;margin-bottom:4px;font-family:var(--font-heading);font-size:.85rem;font-weight:700;color:var(--ink)}
.sgs-sp-support__item span,.sgs-sp-support__item a{color:var(--muted);font-size:.85rem}
.sgs-sp-support__item a{color:var(--red);text-decoration:underline;text-underline-offset:2px}
@media(max-width:960px){.sgs-sp-grid{grid-template-columns:repeat(2,1fr)}.sgs-sp-support{grid-template-columns:repeat(2,1fr)}.sgs-sp-support__item:nth-child(3n){border-right:1px solid var(--line)}.sgs-sp-support__item:nth-last-child(-n+3){border-bottom:1px solid var(--line)}.sgs-sp-support__item:nth-child(2n){border-right:0}.sgs-sp-support__item:nth-last-child(-n+2){border-bottom:0}}
@media(max-width:700px){.sgs-sp-section{width:100%;padding:52px 0}.sgs-sp-timeline{margin-bottom:28px}.sgs-sp-grid{display:flex;grid-template-columns:none;gap:14px;overflow-x:auto;scroll-snap-type:x mandatory;scroll-padding-inline:24px;padding:0 24px 4px;-webkit-overflow-scrolling:touch;scrollbar-width:none}.sgs-sp-grid::-webkit-scrollbar{display:none}.sgs-sp-grid .sgs-sp-card{flex:0 0 min(82vw,360px);min-height:136px;display:flex;flex-direction:column;justify-content:center;scroll-snap-align:center}.sgs-sp-grid .sgs-sp-card:hover{box-shadow:none;transform:none}.sgs-sp-slider__controls{display:flex;align-items:center;justify-content:center;gap:14px;margin-top:16px}.sgs-sp-slider__arrow{display:grid;place-items:center;width:38px;height:38px;border:1px solid var(--line);border-radius:50%;background:var(--white);color:var(--ink);font-family:var(--font-heading);font-size:1.35rem;line-height:1;box-shadow:0 8px 18px rgba(11,31,58,.08);transition:background 180ms,border-color 180ms,color 180ms,opacity 180ms}.sgs-sp-slider__arrow:disabled{opacity:.38;cursor:default}.sgs-sp-slider__arrow:not(:disabled):hover{border-color:var(--red);background:var(--red);color:var(--white)}.sgs-sp-slider__dots{display:flex;align-items:center;gap:7px}.sgs-sp-slider__dot{width:7px;height:7px;border:0;border-radius:999px;background:rgba(11,31,58,.22);padding:0;transition:width 180ms,background 180ms}.sgs-sp-slider__dot[data-active="true"]{width:22px;background:var(--red)}.sgs-sp-panel{width:min(100% - 40px,1200px);margin-inline:auto}.sgs-sp-costs{grid-template-columns:1fr}.sgs-sp-support{grid-template-columns:1fr}.sgs-sp-support__item{border-right:0}.sgs-sp-support__item:nth-child(2n){border-right:0}.sgs-sp-support__item:nth-last-child(-n+2){border-bottom:1px solid var(--line)}.sgs-sp-support__item:last-child{border-bottom:0}.sgs-sp-actions .sgs-btn{width:100%}.sgs-sp-contact-actions{gap:10px}.sgs-sp-contact-actions .sgs-btn,.sgs-sp-mail{width:100%;justify-content:center}.sgs-sp-mail{justify-content:flex-start}}
</style>

<div class="sgs-sp-hero">
  <div class="sgs-sp-hero__inner">
    <p class="sgs-eyebrow sgs-eyebrow--light">Shipping Policy</p>
    <h1>Shipping Policy</h1>
    <p class="sgs-sp-hero__meta" style="margin-top:14px;color:var(--gold);font-family:var(--font-heading);font-size:.85rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase">Last Updated: July 5 2026</p>
    <p>Clear, transparent shipping information for every order — no hidden fees, no surprises.</p>
  </div>
</div>

<div class="sgs-sp-section">
  <div class="sgs-sp-timeline" data-shipping-slider>
  <div class="sgs-sp-grid" data-shipping-track>
    <div class="sgs-sp-card" data-shipping-slide>
      <h3>Order Cutoff Time</h3>
      <p>5:00 PM (GMT-08:00) Pacific Standard Time.</p>
    </div>
    <div class="sgs-sp-card" data-shipping-slide>
      <h3>Order Handling Time</h3>
      <p>1-3 business days. Orders placed after cutoff begin processing the following business day.</p>
    </div>
    <div class="sgs-sp-card" data-shipping-slide>
      <h3>Transit Time</h3>
      <p>5-7 business days, Monday to Friday.</p>
    </div>
    <div class="sgs-sp-card" data-shipping-slide>
      <h3>Estimated Delivery Time</h3>
      <p>6-10 business days total from the date of purchase.</p>
    </div>
  </div>
  <div class="sgs-sp-slider__controls" aria-label="Shipping timeline slider controls">
    <button class="sgs-sp-slider__arrow" type="button" data-shipping-prev aria-label="Previous shipping timeline item">&lsaquo;</button>
    <div class="sgs-sp-slider__dots" aria-label="Shipping timeline slides">
      <?php for ($i = 0; $i < 4; $i++) : ?>
        <button class="sgs-sp-slider__dot" type="button" data-shipping-dot aria-label="<?php echo esc_attr(sprintf('Go to shipping timeline item %d', $i + 1)); ?>"></button>
      <?php endfor; ?>
    </div>
    <button class="sgs-sp-slider__arrow" type="button" data-shipping-next aria-label="Next shipping timeline item">&rsaquo;</button>
  </div>
  </div>

  <article class="sgs-sp-panel">
    <h2>Order Processing &amp; Delivery Times</h2>
    <p>All shipping and handling timelines are calculated in business days, Monday through Friday, excluding standard U.S. public holidays.</p>
    <p>Delivery estimates are carefully calculated windows reflecting our standard delivery benchmarks. While we and our courier partners work diligently to meet these timelines, unexpected delays due to extreme weather, carrier capacity issues, or regional holidays may occasionally occur.</p>
  </article>

  <article class="sgs-sp-panel sgs-sp-panel--soft">
    <h2>Multi-Item Orders &amp; Specialized Handling</h2>
    <p>If your purchase includes multiple shirts, jackets, hats, accessories, personalized apparel, or diverse custom gift items, they may be fulfilled from different locations. Consequently, your items may ship separately and arrive in multiple packages.</p>
    <p>You will receive unique tracking numbers for each package. Certain personalized, high-demand, or made-to-order apparel items may require extra preparation time due to careful print checks, address reviews, holiday volume spikes, or safe-handling protocols.</p>
  </article>

  <article class="sgs-sp-panel">
    <h2>Shipping Locations &amp; Market</h2>
    <p>We currently ship exclusively within the <strong>United States</strong>. ShopGraphicshirt serves customers shopping from the United States domestic market.</p>
    <p>If a product, destination, or carrier limitation prevents delivery to your specific address, the order will not be available for that location, and you will be notified immediately at checkout before any payment is processed.</p>
    <div class="sgs-sp-note">Some apparel and custom gift orders may ship separately if items are prepared from different fulfillment batches or require distinct specialized packing methods to ensure safe transit.</div>
  </article>

  <article class="sgs-sp-panel sgs-sp-panel--soft">
    <h2>Shipping Fees &amp; Costs</h2>
    <p>We believe in full transparency with no hidden fees at checkout. Our shipping costs are structured as follows:</p>
    <div class="sgs-sp-costs">
      <div class="sgs-sp-card">
        <h3>Standard U.S. Shipping</h3>
        <p>Completely free for all orders nationwide. There is no minimum purchase requirement to qualify for free standard shipping.</p>
      </div>
      <div class="sgs-sp-card">
        <h3>Optional Upgraded Shipping</h3>
        <p>If expedited or assisted shipping services are available for your destination, the exact cost will be displayed clearly on the checkout page before you complete your payment.</p>
      </div>
    </div>
  </article>

  <article class="sgs-sp-panel">
    <h2>Carrier Services &amp; Delivery Tracking</h2>
    <p>To guarantee safe and efficient delivery, ShopGraphicshirt partners with trusted domestic U.S. carriers. Orders are shipped using USPS, UPS, FedEx, or DHL.</p>
    <div class="sgs-sp-pills">
      <span class="sgs-sp-pill">USPS</span>
      <span class="sgs-sp-pill">UPS</span>
      <span class="sgs-sp-pill">FedEx</span>
      <span class="sgs-sp-pill">DHL</span>
    </div>
    <p>The final carrier service is dynamically selected when your package is securely labeled and prepared at our fulfillment center. Once your order is dispatched, an automated shipping confirmation email containing a direct tracking link and courier details will be sent to your registered email address.</p>
    <div class="sgs-sp-actions">
      <a class="sgs-btn sgs-btn--primary" href="/track-order/">Track Order</a>
    </div>
  </article>

  <article class="sgs-sp-panel sgs-sp-panel--soft">
    <h2>Resolving Delivery Issues &amp; Damaged Shipments</h2>
    <p>Your satisfaction is our priority. If your order encounters delays, tracking stops updating, or the package is marked as delivered but has not arrived, please reach out to our dedicated support team immediately.</p>
    <p>To help us investigate and resolve the issue with the carrier swiftly, please provide:</p>
    <ul class="sgs-sp-list">
      <li>Your exact Order Number, such as #SGS1001.</li>
      <li>The specific Email Address utilized during checkout.</li>
      <li>The full and complete Delivery Address.</li>
      <li>Clear, well-lit photos if the package container or apparel item arrived damaged.</li>
    </ul>
    <div class="sgs-sp-actions sgs-sp-contact-actions">
      <a class="sgs-btn sgs-btn--primary" href="/contact-us/">Contact Support</a>
      <a class="sgs-sp-mail" href="mailto:support@shopgraphicshirt.com">Email Support</a>
    </div>
  </article>

  <article class="sgs-sp-panel">
    <h2>Customer Support Contact Information</h2>
    <p>For any questions regarding your shipment, custom delivery requests, or transit inquiries, please contact us directly through our official channels. We respond to all inquiries within 24 business hours.</p>
    <div class="sgs-sp-support">
      <div class="sgs-sp-support__item">
        <strong>Store Name</strong>
        <span>ShopGraphicshirt</span>
      </div>
      <div class="sgs-sp-support__item">
        <strong>Customer Support Email</strong>
        <a href="mailto:support@shopgraphicshirt.com">support@shopgraphicshirt.com</a>
      </div>
      <div class="sgs-sp-support__item">
        <strong>Address</strong>
        <span><?php echo esc_html($store_address); ?></span>
      </div>
      <div class="sgs-sp-support__item">
        <strong>Response Time</strong>
        <span>Within 24 business hours.</span>
      </div>
      <div class="sgs-sp-support__item">
        <strong>Customer Service Hours</strong>
        <span>Monday - Friday, 10:00 AM - 6:00 PM PST.</span>
      </div>
      <div class="sgs-sp-support__item">
        <strong>Return Address</strong>
        <span>Provided with return authorization.</span>
      </div>
    </div>
  </article>
</div>

</section>
<?php get_footer(); ?>
