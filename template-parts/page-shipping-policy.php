<?php
/**
 * Shipping Policy template part.
 *
 * @package dawp
 */

$store_name     = 'Elite Shop Express';
$support_email  = 'support@eliteshopexpress.com';
$store_address  = 'United States';
$support_portal = home_url('/contact-us/');
?>

<style>
  .ese-page { --ese-blue:#2563eb; --ese-cyan:#06b6d4; --ese-lime:#a3e635; --ese-ink:#101828; --ese-slate:#475467; --ese-soft:#f3f7fb; --ese-card:#ffffff; --ese-border:#dbe3ef; --ese-callout:#eff6ff; background:#fff; color:var(--ese-slate); font-family:"Lato","Inter",system-ui,sans-serif; }
  .ese-page * { box-sizing:border-box; }
  .ese-page a { color:inherit; text-decoration:none; }
  .ese-wrap { width:min(100% - 32px,1160px); margin-inline:auto; }
  .ese-section { padding:68px 0; }
  .ese-eyebrow { margin:0 0 12px; color:var(--ese-blue); font-size:12px; font-weight:900; letter-spacing:.16em; text-transform:uppercase; }
  .ese-title { margin:0; color:var(--ese-ink); font-family:"Lato","Inter",system-ui,sans-serif; font-size:clamp(36px,5vw,64px); font-weight:900; line-height:1.04; letter-spacing:0; text-transform:uppercase; }
  .ese-updated { margin:16px 0 0; color:var(--ese-ink); font-size:14px; font-weight:900; line-height:1.4; }
  .ese-copy { margin:18px 0 0; max-width:780px; color:var(--ese-slate); font-size:17px; line-height:1.75; }
  .ese-button { display:inline-flex; min-height:48px; align-items:center; justify-content:center; border:1px solid var(--ese-ink); border-radius:999px; background:var(--ese-ink); color:#fff !important; padding:0 22px; font-size:14px; font-weight:900; transition:.2s ease; }
  .ese-button:hover { border-color:var(--ese-blue); background:var(--ese-blue); color:#fff !important; }
  .ese-button--secondary { background:#fff; color:var(--ese-ink) !important; }
  .ese-button--secondary:hover { border-color:var(--ese-blue); background:#eff6ff; color:var(--ese-blue) !important; }
  .ese-actions { display:flex; flex-wrap:wrap; gap:14px; margin-top:28px; }
  .ese-hero { position:relative; overflow:hidden; background:linear-gradient(135deg,rgba(37,99,235,.14),rgba(6,182,212,.12) 48%,rgba(163,230,53,.16)),#f8fbff; }
  .ese-hero::before { content:""; position:absolute; inset:24px auto auto 8%; width:220px; height:220px; border-radius:999px; background:rgba(255,255,255,.56); filter:blur(8px); }
  .ese-hero::after { content:""; position:absolute; right:7%; bottom:-92px; width:360px; height:360px; border:1px solid rgba(37,99,235,.18); border-radius:999px; background:rgba(255,255,255,.28); }
  .ese-hero__grid { position:relative; z-index:1; display:grid; place-items:center; padding:82px 0 88px; text-align:center; }
  .ese-hero__content { max-width:880px; }
  .ese-hero .ese-copy { max-width:760px; margin-inline:auto; }
  .ese-hero .ese-actions { justify-content:center; }
  .ese-policy-card, .ese-contact-card { border:1px solid var(--ese-border); border-radius:20px; background:rgba(255,255,255,.94); box-shadow:0 18px 46px rgba(16,24,40,.08); }
  .ese-soft { background:var(--ese-soft); }
  .ese-content-grid { display:grid; grid-template-columns:minmax(0,1fr); gap:32px; align-items:start; }
  .ese-policy-stack { display:grid; gap:20px; }
  .ese-policy-card { padding:clamp(24px,4vw,38px); background:#fff; }
  .ese-policy-card:nth-child(even) { background:#fcfdff; }
  .ese-policy-card h2 { margin:0; color:var(--ese-ink); font-family:"Lato","Inter",system-ui,sans-serif; font-size:clamp(25px,3vw,38px); font-weight:900; line-height:1.12; letter-spacing:0; text-transform:uppercase; }
  .ese-policy-card h3 { margin:24px 0 0; color:var(--ese-ink); font-size:18px; font-weight:800; line-height:1.35; }
  .ese-policy-card p, .ese-policy-card li { color:var(--ese-slate); font-size:15px; line-height:1.72; }
  .ese-policy-card p { margin:14px 0 0; }
  .ese-policy-card ul, .ese-policy-card ol { display:grid; gap:9px; margin:16px 0 0; padding-left:1.15rem; }
  .ese-policy-card ul { list-style:disc outside; }
  .ese-policy-card ol { list-style:decimal outside; }
  .ese-callout { border-left:4px solid var(--ese-blue); border-radius:0 16px 16px 0; background:var(--ese-callout); padding:15px 18px; }
  .ese-split-grid { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:16px; margin-top:18px; }
  .ese-info-panel { border:1px solid var(--ese-border); border-radius:16px; background:#fff; padding:18px; }
  .ese-info-panel--soft { background:#f8fbff; }
  .ese-info-panel h3 { margin:0; }
  .ese-timeline-grid { display:grid; grid-template-columns:repeat(4,minmax(0,1fr)); gap:14px; margin-top:20px; }
  .ese-timeline-item { border:1px solid var(--ese-border); border-radius:16px; background:#fff; padding:18px; }
  .ese-timeline-item strong { display:block; color:var(--ese-ink); font-size:14px; line-height:1.35; }
  .ese-timeline-item span { display:block; margin-top:8px; color:var(--ese-slate); font-size:14px; line-height:1.55; }
  .ese-policy-card .ese-carrier-list { display:flex; flex-wrap:wrap; gap:10px; margin:18px 0 0; padding:0; list-style:none; }
  .ese-policy-card .ese-carrier-list li { display:inline-flex; width:auto; min-width:72px; align-items:center; justify-content:center; border:1px solid var(--ese-border); border-radius:999px; background:#fff; padding:9px 16px; color:var(--ese-ink); font-size:13px; font-weight:900; line-height:1.2; }
  .ese-contact-card { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:14px; margin-top:22px; padding:18px; background:#fff; box-shadow:none; }
  .ese-contact-item { border:1px solid var(--ese-border); border-radius:14px; background:#fff; padding:16px; }
  .ese-contact-item strong { display:block; color:var(--ese-ink); font-size:14px; }
  .ese-contact-item span { display:block; margin-top:7px; color:var(--ese-slate); font-size:14px; line-height:1.6; overflow-wrap:anywhere; }
  @media (max-width:920px) { .ese-content-grid, .ese-split-grid, .ese-timeline-grid { grid-template-columns:1fr; } }
  @media (max-width:680px) {
    .ese-section { padding:44px 0; }
    .ese-hero__grid { padding:52px 0 56px; }
    .ese-contact-card { grid-template-columns:1fr; }
    .ese-actions { flex-direction:column; }
    .ese-button { width:100%; }
  }
</style>

<div class="ese-page ese-shipping-policy">
  <section class="ese-hero">
    <div class="ese-wrap ese-hero__grid">
      <div class="ese-hero__content">
        <p class="ese-eyebrow"><?php esc_html_e('Shipping Policy', 'dawp'); ?></p>
        <h1 class="ese-title"><?php esc_html_e('Shipping Policy', 'dawp'); ?></h1>
        <p class="ese-updated"><?php esc_html_e('Last Updated: June 5, 2026', 'dawp'); ?></p>
        <p class="ese-copy"><?php esc_html_e('Elite Shop Express currently ships exclusively within the United States, with free standard U.S. shipping for every order and clear delivery timelines shown before checkout is completed.', 'dawp'); ?></p>
        <div class="ese-actions">
          <a class="ese-button" href="<?php echo esc_url($support_portal); ?>"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
          <a class="ese-button ese-button--secondary" href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a>
        </div>
      </div>
    </div>
  </section>

  <section class="ese-section ese-soft">
    <div class="ese-wrap ese-content-grid">
      <div class="ese-policy-stack">
        <section id="shipping-locations" class="ese-policy-card">
          <h2><?php esc_html_e('Shipping Locations & Market', 'dawp'); ?></h2>
          <p><?php esc_html_e('We currently ship exclusively within the United States. Elite Shop Express serves customers shopping from the United States domestic market.', 'dawp'); ?></p>
          <p><?php esc_html_e('If a product, destination, or carrier limitation prevents delivery to your specific address, the order will not be available for that location, and you will be notified immediately at checkout before any payment is processed.', 'dawp'); ?></p>
          <div class="ese-callout">
            <p><?php esc_html_e('Some everyday essentials and lifestyle orders may ship separately if items are prepared from different fulfillment batches or require distinct packing methods to ensure safe transit.', 'dawp'); ?></p>
          </div>
        </section>

        <section id="shipping-fees" class="ese-policy-card">
          <h2><?php esc_html_e('Shipping Fees & Costs', 'dawp'); ?></h2>
          <p><?php esc_html_e('We believe in full transparency with no hidden fees at checkout. Our shipping costs are structured as follows:', 'dawp'); ?></p>
          <div class="ese-split-grid">
            <div class="ese-info-panel">
              <h3><?php esc_html_e('Standard U.S. Shipping', 'dawp'); ?></h3>
              <p><?php esc_html_e('Completely free for all orders nationwide. There is no minimum purchase requirement to qualify for free standard shipping.', 'dawp'); ?></p>
            </div>
            <div class="ese-info-panel ese-info-panel--soft">
              <h3><?php esc_html_e('Optional Upgraded Shipping', 'dawp'); ?></h3>
              <p><?php esc_html_e('If expedited or assisted shipping services are available for your destination, the exact cost will be displayed clearly on the checkout page before you complete your payment.', 'dawp'); ?></p>
            </div>
          </div>
        </section>

        <section id="delivery-times" class="ese-policy-card">
          <h2><?php esc_html_e('Order Processing & Delivery Times', 'dawp'); ?></h2>
          <p><?php esc_html_e('All shipping and handling timelines are calculated in business days, Monday through Friday, excluding standard U.S. public holidays.', 'dawp'); ?></p>
          <div class="ese-timeline-grid">
            <div class="ese-timeline-item">
              <strong><?php esc_html_e('Order Cutoff Time', 'dawp'); ?></strong>
              <span><?php esc_html_e('5:00 PM (GMT-08:00) Pacific Standard Time.', 'dawp'); ?></span>
            </div>
            <div class="ese-timeline-item">
              <strong><?php esc_html_e('Order Handling Time', 'dawp'); ?></strong>
              <span><?php esc_html_e('1-3 business days. Orders placed after cutoff begin processing the following business day.', 'dawp'); ?></span>
            </div>
            <div class="ese-timeline-item">
              <strong><?php esc_html_e('Transit Time', 'dawp'); ?></strong>
              <span><?php esc_html_e('5-7 business days, Monday to Friday.', 'dawp'); ?></span>
            </div>
            <div class="ese-timeline-item">
              <strong><?php esc_html_e('Estimated Delivery Time', 'dawp'); ?></strong>
              <span><?php esc_html_e('6-10 business days total from the date of purchase.', 'dawp'); ?></span>
            </div>
          </div>
          <p><?php esc_html_e('Delivery estimates are carefully calculated windows reflecting our standard delivery benchmarks. While we and our courier partners work diligently to meet these timelines, unexpected delays due to extreme weather, carrier capacity issues, or regional holidays may occasionally occur.', 'dawp'); ?></p>
        </section>

        <section id="multi-item-orders" class="ese-policy-card">
          <h2><?php esc_html_e('Multi-Item Orders & Specialized Handling', 'dawp'); ?></h2>
          <p><?php esc_html_e('If your purchase includes multiple home, personal care, accessory, lifestyle, or giftable items, they may be fulfilled from different locations. Consequently, your items may ship separately and arrive in multiple packages.', 'dawp'); ?></p>
          <p><?php esc_html_e('You will receive unique tracking numbers for each package. Certain high-demand or carefully packed products may require extra preparation time due to rigorous address reviews, holiday volume spikes, or safe-handling protocols.', 'dawp'); ?></p>
        </section>

        <section id="tracking" class="ese-policy-card">
          <h2><?php esc_html_e('Carrier Services & Delivery Tracking', 'dawp'); ?></h2>
          <p><?php esc_html_e('To guarantee safe and efficient delivery, Elite Shop Express partners with trusted domestic U.S. carriers. Orders are shipped using USPS, UPS, FedEx, or DHL.', 'dawp'); ?></p>
          <ul class="ese-carrier-list">
            <li><?php esc_html_e('USPS', 'dawp'); ?></li>
            <li><?php esc_html_e('UPS', 'dawp'); ?></li>
            <li><?php esc_html_e('FedEx', 'dawp'); ?></li>
            <li><?php esc_html_e('DHL', 'dawp'); ?></li>
          </ul>
          <p><?php esc_html_e('The final carrier service is dynamically selected when your package is securely labeled and prepared at our fulfillment center. Once your order is dispatched, an automated shipping confirmation email containing a direct tracking link and courier details will be sent to your registered email address.', 'dawp'); ?></p>
          <div class="ese-actions">
            <a class="ese-button ese-button--secondary" href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a>
          </div>
        </section>

        <section id="delivery-issues" class="ese-policy-card">
          <h2><?php esc_html_e('Resolving Delivery Issues & Damaged Shipments', 'dawp'); ?></h2>
          <p><?php esc_html_e('Your satisfaction is our priority. If your order encounters delays, tracking stops updating, or the package is marked as delivered but has not arrived, please reach out to our dedicated support team immediately.', 'dawp'); ?></p>
          <p><?php esc_html_e('To help us investigate and resolve the issue with the carrier swiftly, please provide:', 'dawp'); ?></p>
          <ul>
            <li><?php esc_html_e('Your exact Order Number, such as #ESE1001.', 'dawp'); ?></li>
            <li><?php esc_html_e('The specific Email Address utilized during checkout.', 'dawp'); ?></li>
            <li><?php esc_html_e('The full and complete Delivery Address.', 'dawp'); ?></li>
            <li><?php esc_html_e('Clear, well-lit photos if the package container or product arrived damaged.', 'dawp'); ?></li>
          </ul>
          <div class="ese-actions">
            <a class="ese-button" href="<?php echo esc_url($support_portal); ?>"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
            <a class="ese-button ese-button--secondary" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
          </div>
        </section>

        <section id="contact-info" class="ese-policy-card">
          <h2><?php esc_html_e('Customer Support Contact Information', 'dawp'); ?></h2>
          <p><?php esc_html_e('For any questions regarding your shipment, custom delivery requests, or transit inquiries, please contact us directly through our official channels. We respond to all inquiries within 24 business hours.', 'dawp'); ?></p>
          <div class="ese-contact-card">
            <div class="ese-contact-item">
              <strong><?php esc_html_e('Store Name', 'dawp'); ?></strong>
              <span><?php echo esc_html($store_name); ?></span>
            </div>
            <div class="ese-contact-item">
              <strong><?php esc_html_e('Customer Support Email', 'dawp'); ?></strong>
              <span><a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a></span>
            </div>
            <?php if ($store_address) : ?>
              <div class="ese-contact-item">
                <strong><?php esc_html_e('Address', 'dawp'); ?></strong>
                <span><?php echo esc_html($store_address); ?></span>
              </div>
            <?php endif; ?>
            <div class="ese-contact-item">
              <strong><?php esc_html_e('Response Time', 'dawp'); ?></strong>
              <span><?php esc_html_e('Within 24 business hours.', 'dawp'); ?></span>
            </div>
          </div>
        </section>
      </div>
    </div>
  </section>
</div>
