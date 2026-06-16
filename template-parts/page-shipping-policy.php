<?php
/**
 * Template Part: page-shipping-policy
 *
 * Shipping policy content adapted for Proudlywear.
 */

$store_name     = 'Proudlywear';
$support_email  = 'support@proudlywear.com';
$store_address  = dawp_get_woocommerce_store_address();
$support_portal = home_url('/contact-us/');
?>

<style>
  .sk-ship-page { --sk-cream:#F7F2E8; --sk-surface:#F3F4F6; --sk-rose:#B31942; --sk-rose-dark:#921233; --sk-beige:#C6A15B; --sk-blush:#153866; --sk-ink:#111827; --sk-muted:#6B7280; --sk-soft:#8A94A6; --sk-border:#E5E7EB; background:linear-gradient(180deg,#fff 0%,var(--sk-cream) 18%,#fff 100%); color:var(--sk-muted); font-family:"Lato","Inter",system-ui,sans-serif; }
  .sk-ship-page * { box-sizing:border-box; }
  .sk-ship-page a { color:inherit; text-decoration:none; }
  .sk-ship-wrap { width:min(100% - 32px,1160px); margin-inline:auto; }
  .sk-ship-section { padding:68px 0; }
  .sk-ship-eyebrow { margin:0 0 12px; color:var(--sk-rose); font-size:12px; font-weight:800; letter-spacing:.16em; text-transform:uppercase; }
  .sk-ship-title { margin:0; color:var(--sk-ink); font-family:"Lato","Inter",system-ui,sans-serif; font-size:clamp(36px,5vw,64px); font-weight:800; line-height:1.04; letter-spacing:0; }
  .sk-ship-updated { margin:16px 0 0; color:var(--sk-ink); font-size:14px; font-weight:800; line-height:1.4; }
  .sk-ship-copy { margin:18px 0 0; max-width:780px; color:var(--sk-muted); font-size:17px; line-height:1.75; }
  .sk-ship-button { display:inline-flex; min-height:48px; align-items:center; justify-content:center; border:1px solid var(--sk-rose); border-radius:999px; background:var(--sk-rose); color:#fff !important; padding:0 22px; font-size:14px; font-weight:800; transition:.2s ease; }
  .sk-ship-button:hover { border-color:var(--sk-rose-dark); background:var(--sk-rose-dark); color:#fff !important; }
  .sk-ship-button--secondary { border-color:var(--sk-ink); background:#fff; color:var(--sk-ink) !important; }
  .sk-ship-button--secondary:hover { border-color:var(--sk-rose); background:var(--sk-cream); color:var(--sk-rose) !important; }
  .sk-ship-actions { display:flex; flex-wrap:wrap; gap:14px; margin-top:28px; }
  .sk-ship-hero { position:relative; overflow:hidden; border-bottom:1px solid rgba(198,161,91,.28); background:linear-gradient(135deg,rgba(11,31,58,.98),rgba(21,56,102,.94) 48%,rgba(179,25,66,.88)),#0B1F3A; }
  .sk-ship-hero::before { content:""; position:absolute; inset:24px auto auto 8%; width:220px; height:220px; border-radius:999px; background:rgba(198,161,91,.2); filter:blur(10px); }
  .sk-ship-hero::after { content:""; position:absolute; right:7%; bottom:-92px; width:360px; height:360px; border:1px solid rgba(198,161,91,.24); border-radius:999px; background:rgba(255,255,255,.08); }
  .sk-ship-hero .sk-ship-title, .sk-ship-hero .sk-ship-updated { color:#fff; }
  .sk-ship-hero .sk-ship-copy { color:rgba(255,255,255,.8); }
  .sk-ship-hero__grid { position:relative; z-index:1; display:grid; grid-template-columns:minmax(0,1fr); gap:44px; align-items:center; justify-items:center; padding:78px 0 84px; text-align:center; }
  .sk-ship-hero__content { max-width:760px; margin-inline:auto; }
  .sk-ship-hero .sk-ship-copy { max-width:690px; margin-inline:auto; }
  .sk-ship-hero .sk-ship-actions { justify-content:center; }
  .sk-ship-policy-card, .sk-ship-contact-card { border:1px solid rgba(229,231,235,.92); border-radius:20px; background:rgba(255,255,255,.94); box-shadow:0 12px 34px rgba(11,31,58,.08); }
  .sk-ship-soft { background:var(--sk-cream); }
  .sk-ship-content-grid { display:grid; grid-template-columns:minmax(0,1fr); gap:32px; align-items:start; }
  .sk-ship-policy-stack { display:grid; gap:20px; }
  .sk-ship-policy-card { padding:clamp(24px,4vw,38px); background:linear-gradient(180deg,rgba(255,255,255,.98),rgba(247,242,232,.5)),#fff; }
  .sk-ship-policy-card:nth-child(even) { background:linear-gradient(180deg,rgba(247,242,232,.7),rgba(255,255,255,.96)),#fff; }
  .sk-ship-policy-card h2 { position:relative; margin:0; padding-bottom:18px; color:var(--sk-ink); font-family:"Lato","Inter",system-ui,sans-serif; font-size:clamp(25px,3vw,38px); font-weight:800; line-height:1.12; letter-spacing:0; }
  .sk-ship-policy-card h2::after { content:""; position:absolute; bottom:0; left:0; width:54px; height:3px; border-radius:999px; background:var(--sk-rose); }
  .sk-ship-policy-card h3 { margin:24px 0 0; color:var(--sk-ink); font-size:18px; line-height:1.35; }
  .sk-ship-policy-card p, .sk-ship-policy-card li { color:var(--sk-muted); font-size:15px; line-height:1.72; }
  .sk-ship-policy-card p { margin:14px 0 0; }
  .sk-ship-policy-card ul, .sk-ship-policy-card ol { display:grid; gap:9px; margin:16px 0 0; padding-left:1.15rem; }
  .sk-ship-policy-card ul { list-style:disc outside; }
  .sk-ship-policy-card ol { list-style:decimal outside; }
  .sk-ship-callout { border-left:4px solid var(--sk-rose); border-radius:0 16px 16px 0; background:#FFF8E8; padding:15px 18px; }
  .sk-ship-split-grid { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:16px; margin-top:18px; }
  .sk-ship-info-panel { border:1px solid rgba(229,231,235,.95); border-radius:16px; background:rgba(255,255,255,.72); padding:18px; }
  .sk-ship-info-panel--soft { background:rgba(247,242,232,.78); }
  .sk-ship-info-panel h3 { margin:0; }
  .sk-ship-timeline-grid { display:grid; grid-template-columns:repeat(4,minmax(0,1fr)); gap:14px; margin-top:20px; }
  .sk-ship-timeline-item { border:1px solid rgba(229,231,235,.95); border-radius:16px; background:rgba(255,255,255,.72); padding:18px; }
  .sk-ship-timeline-item strong { display:block; color:var(--sk-ink); font-size:14px; line-height:1.35; }
  .sk-ship-timeline-item span { display:block; margin-top:8px; color:var(--sk-muted); font-size:14px; line-height:1.55; }
  .sk-ship-policy-card .sk-ship-carrier-list { display:flex; flex-wrap:wrap; gap:10px; margin:18px 0 0; padding:0; list-style:none; }
  .sk-ship-policy-card .sk-ship-carrier-list li { display:inline-flex; width:auto; min-width:72px; align-items:center; justify-content:center; border:1px solid rgba(179,25,66,.34); border-radius:999px; background:#fff; padding:9px 16px; color:var(--sk-ink); font-size:13px; font-weight:800; line-height:1.2; }
  .sk-ship-contact-card { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:14px; margin-top:22px; padding:18px; background:#fff; box-shadow:none; }
  .sk-ship-contact-item { border:1px solid rgba(229,231,235,.95); border-radius:14px; background:rgba(255,255,255,.72); padding:16px; }
  .sk-ship-contact-item strong { display:block; color:var(--sk-ink); font-size:14px; }
  .sk-ship-contact-item span { display:block; margin-top:7px; color:var(--sk-muted); font-size:14px; line-height:1.6; overflow-wrap:anywhere; }
  @media (max-width:920px) { .sk-ship-content-grid, .sk-ship-split-grid, .sk-ship-timeline-grid { grid-template-columns:1fr; } }
  @media (max-width:680px) {
    .sk-ship-section { padding:44px 0; }
    .sk-ship-hero__grid { gap:28px; padding:46px 0 50px; }
    .sk-ship-contact-card { grid-template-columns:1fr; }
    .sk-ship-actions { flex-direction:column; }
    .sk-ship-button { width:100%; }
  }
</style>

<div class="sk-ship-page">
  <section class="sk-ship-hero">
    <div class="sk-ship-wrap sk-ship-hero__grid">
      <div class="sk-ship-hero__content">
        <p class="sk-ship-eyebrow"><?php esc_html_e('Shipping Policy', 'dawp'); ?></p>
        <h1 class="sk-ship-title"><?php esc_html_e('Shipping Policy', 'dawp'); ?></h1>
        <p class="sk-ship-updated"><?php esc_html_e('Last Updated: May 30, 2026', 'dawp'); ?></p>
        <p class="sk-ship-copy"><?php esc_html_e('Proudlywear currently ships exclusively within the United States, with free standard U.S. shipping for every order and clear delivery timelines shown before checkout is completed.', 'dawp'); ?></p>
        <div class="sk-ship-actions">
          <a class="sk-ship-button" href="<?php echo esc_url($support_portal); ?>"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
          <a class="sk-ship-button sk-ship-button--secondary" href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a>
        </div>
      </div>
    </div>
  </section>

  <section class="sk-ship-section sk-ship-soft">
    <div class="sk-ship-wrap sk-ship-content-grid">
      <div class="sk-ship-policy-stack">
        <section id="shipping-locations" class="sk-ship-policy-card">
          <h2><?php esc_html_e('Shipping Locations & Market', 'dawp'); ?></h2>
          <p><?php esc_html_e('We currently ship exclusively within the United States. Proudlywear serves customers shopping from the United States domestic market.', 'dawp'); ?></p>
          <p><?php esc_html_e('If a product, destination, or carrier limitation prevents delivery to your specific address, the order will not be available for that location, and you will be notified immediately at checkout before any payment is processed.', 'dawp'); ?></p>
          <div class="sk-ship-callout">
            <p><?php esc_html_e('Some patriotic apparel orders may ship separately if items are prepared from different fulfillment batches or require distinct packing methods to keep apparel, accessories, and custom gift items protected in transit.', 'dawp'); ?></p>
          </div>
        </section>

        <section id="shipping-fees" class="sk-ship-policy-card">
          <h2><?php esc_html_e('Shipping Fees & Costs', 'dawp'); ?></h2>
          <p><?php esc_html_e('We believe in full transparency with no hidden fees at checkout. Our shipping costs are structured as follows:', 'dawp'); ?></p>
          <div class="sk-ship-split-grid">
            <div class="sk-ship-info-panel">
              <h3><?php esc_html_e('Standard U.S. Shipping', 'dawp'); ?></h3>
              <p><?php esc_html_e('Completely free for all orders nationwide. There is no minimum purchase requirement to qualify for free standard shipping.', 'dawp'); ?></p>
            </div>
            <div class="sk-ship-info-panel sk-ship-info-panel--soft">
              <h3><?php esc_html_e('Optional Upgraded Shipping', 'dawp'); ?></h3>
              <p><?php esc_html_e('If expedited or assisted shipping services are available for your destination, the exact cost will be displayed clearly on the checkout page before you complete your payment.', 'dawp'); ?></p>
            </div>
          </div>
        </section>

        <section id="delivery-times" class="sk-ship-policy-card">
          <h2><?php esc_html_e('Order Processing & Delivery Times', 'dawp'); ?></h2>
          <p><?php esc_html_e('All shipping and handling timelines are calculated in business days, Monday through Friday, excluding standard U.S. public holidays.', 'dawp'); ?></p>
          <div class="sk-ship-timeline-grid">
            <div class="sk-ship-timeline-item">
              <strong><?php esc_html_e('Order Cutoff Time', 'dawp'); ?></strong>
              <span><?php esc_html_e('5:00 PM (GMT-08:00) Pacific Standard Time.', 'dawp'); ?></span>
            </div>
            <div class="sk-ship-timeline-item">
              <strong><?php esc_html_e('Order Handling Time', 'dawp'); ?></strong>
              <span><?php esc_html_e('1-3 business days. Orders placed after cutoff begin processing the following business day.', 'dawp'); ?></span>
            </div>
            <div class="sk-ship-timeline-item">
              <strong><?php esc_html_e('Transit Time', 'dawp'); ?></strong>
              <span><?php esc_html_e('5-7 business days, Monday to Friday.', 'dawp'); ?></span>
            </div>
            <div class="sk-ship-timeline-item">
              <strong><?php esc_html_e('Estimated Delivery Time', 'dawp'); ?></strong>
              <span><?php esc_html_e('6-10 business days total from the date of purchase.', 'dawp'); ?></span>
            </div>
          </div>
          <p><?php esc_html_e('Delivery estimates are carefully calculated windows reflecting our standard delivery benchmarks. While we and our courier partners work diligently to meet these timelines, unexpected delays due to extreme weather, carrier capacity issues, or regional holidays may occasionally occur.', 'dawp'); ?></p>
        </section>

        <section id="multi-item-orders" class="sk-ship-policy-card">
          <h2><?php esc_html_e('Multi-Item Orders & Specialized Handling', 'dawp'); ?></h2>
          <p><?php esc_html_e('If your purchase includes multiple patriotic apparel, hats, accessories, custom gifts, or veteran-inspired collection items, they may be fulfilled from different locations. Consequently, your items may ship separately and arrive in multiple packages.', 'dawp'); ?></p>
          <p><?php esc_html_e('You will receive unique tracking numbers for each package. Certain high-demand seasonal pieces, custom sets, or carefully packed products may require extra preparation time due to rigorous address reviews, holiday volume spikes, or safe-handling protocols.', 'dawp'); ?></p>
        </section>

        <section id="tracking" class="sk-ship-policy-card">
          <h2><?php esc_html_e('Carrier Services & Delivery Tracking', 'dawp'); ?></h2>
          <p><?php esc_html_e('To guarantee safe and efficient delivery, Proudlywear partners with trusted domestic U.S. carriers. Orders are shipped using USPS, UPS, FedEx, or DHL.', 'dawp'); ?></p>
          <ul class="sk-ship-carrier-list">
            <li><?php esc_html_e('USPS', 'dawp'); ?></li>
            <li><?php esc_html_e('UPS', 'dawp'); ?></li>
            <li><?php esc_html_e('FedEx', 'dawp'); ?></li>
            <li><?php esc_html_e('DHL', 'dawp'); ?></li>
          </ul>
          <p><?php esc_html_e('The final carrier service is dynamically selected when your package is securely labeled and prepared at our fulfillment center. Once your order is dispatched, an automated shipping confirmation email containing a direct tracking link and courier details will be sent to your registered email address.', 'dawp'); ?></p>
          <div class="sk-ship-actions">
            <a class="sk-ship-button sk-ship-button--secondary" href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a>
          </div>
        </section>

        <section id="delivery-issues" class="sk-ship-policy-card">
          <h2><?php esc_html_e('Resolving Delivery Issues & Damaged Shipments', 'dawp'); ?></h2>
          <p><?php esc_html_e('Your satisfaction is our priority. If your order encounters delays, tracking stops updating, or the package is marked as delivered but has not arrived, please reach out to our dedicated support team immediately.', 'dawp'); ?></p>
          <p><?php esc_html_e('To help us investigate and resolve the issue with the carrier swiftly, please provide:', 'dawp'); ?></p>
          <ul>
            <li><?php esc_html_e('Your exact Order Number, such as #PW1001.', 'dawp'); ?></li>
            <li><?php esc_html_e('The specific Email Address utilized during checkout.', 'dawp'); ?></li>
            <li><?php esc_html_e('The full and complete Delivery Address.', 'dawp'); ?></li>
            <li><?php esc_html_e('Clear, well-lit photos if the package container or product arrived damaged.', 'dawp'); ?></li>
          </ul>
          <div class="sk-ship-actions">
            <a class="sk-ship-button" href="<?php echo esc_url($support_portal); ?>"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
            <a class="sk-ship-button sk-ship-button--secondary" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
          </div>
        </section>

        <section id="contact-info" class="sk-ship-policy-card">
          <h2><?php esc_html_e('Customer Support Contact Information', 'dawp'); ?></h2>
          <p><?php esc_html_e('For any questions regarding your shipment, custom delivery requests, or transit inquiries, please contact us directly through our official channels. We respond to all inquiries within 24 business hours.', 'dawp'); ?></p>
          <div class="sk-ship-contact-card">
            <div class="sk-ship-contact-item">
              <strong><?php esc_html_e('Store Name', 'dawp'); ?></strong>
              <span><?php echo esc_html($store_name); ?></span>
            </div>
            <div class="sk-ship-contact-item">
              <strong><?php esc_html_e('Customer Support Email', 'dawp'); ?></strong>
              <span><a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a></span>
            </div>
            <div class="sk-ship-contact-item">
              <strong><?php esc_html_e('Address', 'dawp'); ?></strong>
              <span><?php echo esc_html($store_address); ?></span>
            </div>
            <div class="sk-ship-contact-item">
              <strong><?php esc_html_e('Support Availability', 'dawp'); ?></strong>
              <span><?php esc_html_e('Monday-Friday, 10:00 AM-6:00 PM PST', 'dawp'); ?></span>
            </div>
            <div class="sk-ship-contact-item">
              <strong><?php esc_html_e('Response Time', 'dawp'); ?></strong>
              <span><?php esc_html_e('Within 24 business hours.', 'dawp'); ?></span>
            </div>
          </div>
        </section>
      </div>
    </div>
  </section>
</div>

