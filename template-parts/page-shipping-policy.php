<?php
/**
 * Template Part: page-shipping-policy
 *
 * @package dawp
 */

$store_name     = "Queen's Bracelet";
$support_email  = function_exists('dawp_contact_support_email') ? dawp_contact_support_email() : 'support@queens-bracelet.com';
$store_address  = function_exists('dawp_get_store_address_line') ? dawp_get_store_address_line() : '1777 Canal St, Merced, CA 95340';
$support_portal = home_url('/contact-us/');
?>

<style>
  .qb-page { --qb-blush:#ffb7c5; --qb-peach:#ffd6a5; --qb-mint:#cff5e7; --qb-gold:#d8a94e; --qb-plum:#2f1f35; --qb-gray:#f7f7fa; --qb-text:#4f4355; --qb-border:#eadfe8; background:#fff; color:var(--qb-text); font-family:"DM Sans","Inter",system-ui,sans-serif; }
  .qb-page * { box-sizing:border-box; }
  .qb-page a { color:inherit; text-decoration:none; }
  .qb-wrap { width:min(100% - 32px,1160px); margin-inline:auto; }
  .qb-section { padding:68px 0; }
  .qb-eyebrow { margin:0 0 12px; color:var(--qb-gold); font-size:12px; font-weight:800; letter-spacing:.16em; text-transform:uppercase; }
  .qb-title { margin:0; color:var(--qb-plum); font-family:Georgia,"Times New Roman",serif; font-size:clamp(36px,5vw,64px); line-height:1.04; letter-spacing:0; }
  .qb-copy { margin:18px 0 0; max-width:780px; color:var(--qb-text); font-size:17px; line-height:1.75; }
  .qb-button { display:inline-flex; min-height:48px; align-items:center; justify-content:center; border:1px solid var(--qb-plum); border-radius:999px; background:var(--qb-plum); color:#fff !important; padding:0 22px; font-size:14px; font-weight:800; transition:.2s ease; }
  .qb-button:hover { border-color:var(--qb-gold); background:var(--qb-gold); color:var(--qb-plum) !important; }
  .qb-button--secondary { background:#fff; color:var(--qb-plum) !important; }
  .qb-button--secondary:hover { border-color:var(--qb-plum); background:#fff4f6; color:var(--qb-plum) !important; }
  .qb-actions { display:flex; flex-wrap:wrap; gap:14px; margin-top:28px; }
  .qb-hero { position:relative; overflow:hidden; background:linear-gradient(135deg,rgba(255,183,197,.36),rgba(255,214,165,.36) 46%,rgba(207,245,231,.42)),#fff; }
  .qb-hero::before { content:""; position:absolute; inset:24px auto auto 8%; width:220px; height:220px; border-radius:999px; background:rgba(255,255,255,.42); filter:blur(8px); }
  .qb-hero::after { content:""; position:absolute; right:7%; bottom:-92px; width:360px; height:360px; border:1px solid rgba(216,169,78,.22); border-radius:999px; background:rgba(255,255,255,.2); }
  .qb-hero__grid { position:relative; z-index:1; display:grid; grid-template-columns:minmax(0,1.08fr) minmax(300px,.92fr); gap:44px; align-items:center; padding:78px 0 84px; }
  .qb-hero__content { max-width:720px; }
  .qb-hero .qb-copy { max-width:690px; }
  .qb-hero-panel, .qb-policy-card, .qb-contact-card { border:1px solid var(--qb-border); border-radius:20px; background:rgba(255,255,255,.92); box-shadow:0 18px 46px rgba(47,31,53,.08); }
  .qb-hero-panel { padding:clamp(22px,3vw,32px); }
  .qb-glance-list { display:grid; gap:14px; margin:20px 0 0; padding:0; list-style:none; }
  .qb-glance-list li { border:1px solid var(--qb-border); border-radius:14px; background:#fff; padding:16px; color:#675a6c; font-size:14px; line-height:1.6; }
  .qb-glance-list strong { display:block; margin-bottom:5px; color:var(--qb-plum); font-size:14px; line-height:1.25; }
  .qb-soft { background:var(--qb-gray); }
  .qb-content-grid { display:grid; grid-template-columns:minmax(0,1fr); gap:32px; align-items:start; }
  .qb-policy-stack { display:grid; gap:20px; }
  .qb-policy-card { padding:clamp(24px,4vw,38px); background:#fff; }
  .qb-policy-card:nth-child(even) { background:#fffafc; }
  .qb-policy-card h2 { margin:0; color:var(--qb-plum); font-family:Georgia,"Times New Roman",serif; font-size:clamp(25px,3vw,38px); line-height:1.12; letter-spacing:0; }
  .qb-policy-card h3 { margin:24px 0 0; color:var(--qb-plum); font-size:18px; line-height:1.35; }
  .qb-policy-card p, .qb-policy-card li { color:#675a6c; font-size:15px; line-height:1.72; }
  .qb-policy-card p { margin:14px 0 0; }
  .qb-policy-card ul, .qb-policy-card ol { display:grid; gap:9px; margin:16px 0 0; padding-left:1.15rem; }
  .qb-policy-card ul { list-style:disc outside; }
  .qb-policy-card ol { list-style:decimal outside; }
  .qb-callout { border-left:4px solid var(--qb-gold); border-radius:0 16px 16px 0; background:#fff8e8; padding:15px 18px; }
  .qb-split-grid { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:16px; margin-top:18px; }
  .qb-info-panel { border:1px solid var(--qb-border); border-radius:16px; background:#fff; padding:18px; }
  .qb-info-panel--soft { background:#fffafc; }
  .qb-info-panel h3 { margin:0; }
  .qb-timeline-grid { display:grid; grid-template-columns:repeat(4,minmax(0,1fr)); gap:14px; margin-top:20px; }
  .qb-timeline-item { border:1px solid var(--qb-border); border-radius:16px; background:#fff; padding:18px; }
  .qb-timeline-item strong { display:block; color:var(--qb-plum); font-size:14px; line-height:1.35; }
  .qb-timeline-item span { display:block; margin-top:8px; color:#675a6c; font-size:14px; line-height:1.55; }
  .qb-policy-card .qb-carrier-list { display:flex; flex-wrap:wrap; gap:10px; margin:18px 0 0; padding:0; list-style:none; }
  .qb-policy-card .qb-carrier-list li { display:inline-flex; width:auto; min-width:72px; align-items:center; justify-content:center; border:1px solid var(--qb-border); border-radius:999px; background:#fff; padding:9px 16px; color:var(--qb-plum); font-size:13px; font-weight:800; line-height:1.2; }
  .qb-contact-card { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:14px; margin-top:22px; padding:18px; background:#fff; box-shadow:none; }
  .qb-contact-item { border:1px solid var(--qb-border); border-radius:14px; background:#fff; padding:16px; }
  .qb-contact-item strong { display:block; color:var(--qb-plum); font-size:14px; }
  .qb-contact-item span { display:block; margin-top:7px; color:#675a6c; font-size:14px; line-height:1.6; overflow-wrap:anywhere; }
  @media (max-width:920px) { .qb-hero__grid, .qb-content-grid, .qb-split-grid, .qb-timeline-grid { grid-template-columns:1fr; } }
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
  }
</style>

<div class="qb-page qb-shipping-policy">
  <section class="qb-hero">
    <div class="qb-wrap qb-hero__grid">
      <div class="qb-hero__content">
        <p class="qb-eyebrow"><?php esc_html_e('Shipping Policy', 'dawp'); ?></p>
        <h1 class="qb-title"><?php esc_html_e('Shipping Policy', 'dawp'); ?></h1>
        <p class="qb-copy"><?php esc_html_e("Queen's Bracelet currently ships exclusively within the United States, with free standard U.S. shipping for every order and clear delivery timelines shown before checkout is completed.", 'dawp'); ?></p>
        <div class="qb-actions">
          <a class="qb-button" href="<?php echo esc_url($support_portal); ?>"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
          <a class="qb-button qb-button--secondary" href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a>
        </div>
      </div>

      <div class="qb-hero-panel">
        <p class="qb-eyebrow"><?php esc_html_e('At a Glance', 'dawp'); ?></p>
        <ul class="qb-glance-list">
          <li><strong><?php esc_html_e('Shipping market', 'dawp'); ?></strong><?php esc_html_e('United States domestic orders only.', 'dawp'); ?></li>
          <li><strong><?php esc_html_e('Standard shipping', 'dawp'); ?></strong><?php esc_html_e('Free nationwide with no minimum purchase requirement.', 'dawp'); ?></li>
          <li><strong><?php esc_html_e('Order cutoff', 'dawp'); ?></strong><?php esc_html_e('5:00 PM Pacific Standard Time, Monday-Friday.', 'dawp'); ?></li>
          <li><strong><?php esc_html_e('Estimated delivery', 'dawp'); ?></strong><?php esc_html_e('6-10 business days total from the date of purchase.', 'dawp'); ?></li>
        </ul>
      </div>
    </div>
  </section>

  <section class="qb-section qb-soft">
    <div class="qb-wrap qb-content-grid">
      <div class="qb-policy-stack">
        <section id="shipping-locations" class="qb-policy-card">
          <h2><?php esc_html_e('Shipping Locations & Market', 'dawp'); ?></h2>
          <p><?php esc_html_e("We currently ship exclusively within the United States. Queen's Bracelet serves customers shopping from the United States domestic market.", 'dawp'); ?></p>
          <p><?php esc_html_e('If a product, destination, or carrier limitation prevents delivery to your specific address, the order will not be available for that location, and you will be notified immediately at checkout before any payment is processed.', 'dawp'); ?></p>
          <div class="qb-callout">
            <p><?php esc_html_e('Some jewelry orders may ship separately if items are prepared from different fulfillment batches or require distinct specialized packing methods to ensure safe transit.', 'dawp'); ?></p>
          </div>
        </section>

        <section id="shipping-fees" class="qb-policy-card">
          <h2><?php esc_html_e('Shipping Fees & Costs', 'dawp'); ?></h2>
          <p><?php esc_html_e('We believe in full transparency with no hidden fees at checkout. Our shipping costs are structured as follows:', 'dawp'); ?></p>
          <div class="qb-split-grid">
            <div class="qb-info-panel">
              <h3><?php esc_html_e('Standard U.S. Shipping', 'dawp'); ?></h3>
              <p><?php esc_html_e('Completely free for all orders nationwide. There is no minimum purchase requirement to qualify for free standard shipping.', 'dawp'); ?></p>
            </div>
            <div class="qb-info-panel qb-info-panel--soft">
              <h3><?php esc_html_e('Optional Upgraded Shipping', 'dawp'); ?></h3>
              <p><?php esc_html_e('If expedited or assisted shipping services are available for your destination, the exact cost will be displayed clearly on the checkout page before you complete your payment.', 'dawp'); ?></p>
            </div>
          </div>
        </section>

        <section id="delivery-times" class="qb-policy-card">
          <h2><?php esc_html_e('Order Processing & Delivery Times', 'dawp'); ?></h2>
          <p><?php esc_html_e('All shipping and handling timelines are calculated in business days, Monday through Friday, excluding standard U.S. public holidays.', 'dawp'); ?></p>
          <div class="qb-timeline-grid">
            <div class="qb-timeline-item">
              <strong><?php esc_html_e('Order Cutoff Time', 'dawp'); ?></strong>
              <span><?php esc_html_e('5:00 PM (GMT-08:00) Pacific Standard Time.', 'dawp'); ?></span>
            </div>
            <div class="qb-timeline-item">
              <strong><?php esc_html_e('Order Handling Time', 'dawp'); ?></strong>
              <span><?php esc_html_e('1-3 business days. Orders placed after cutoff begin processing the following business day.', 'dawp'); ?></span>
            </div>
            <div class="qb-timeline-item">
              <strong><?php esc_html_e('Transit Time', 'dawp'); ?></strong>
              <span><?php esc_html_e('5-7 business days, Monday to Friday.', 'dawp'); ?></span>
            </div>
            <div class="qb-timeline-item">
              <strong><?php esc_html_e('Estimated Delivery Time', 'dawp'); ?></strong>
              <span><?php esc_html_e('6-10 business days total from the date of purchase.', 'dawp'); ?></span>
            </div>
          </div>
          <p><?php esc_html_e('Delivery estimates are carefully calculated windows reflecting our standard delivery benchmarks. While we and our courier partners work diligently to meet these timelines, unexpected delays due to extreme weather, carrier capacity issues, or regional holidays may occasionally occur.', 'dawp'); ?></p>
        </section>

        <section id="multi-item-orders" class="qb-policy-card">
          <h2><?php esc_html_e('Multi-Item Orders & Specialized Handling', 'dawp'); ?></h2>
          <p><?php esc_html_e('If your purchase includes multiple bracelets or diverse jewelry items, they may be fulfilled from different locations. Consequently, your items may ship separately and arrive in multiple packages.', 'dawp'); ?></p>
          <p><?php esc_html_e('You will receive unique tracking numbers for each package. Certain intricate or high-demand jewelry items may require extra preparation time due to rigorous address reviews, holiday volume spikes, or safe-handling protocols.', 'dawp'); ?></p>
        </section>

        <section id="tracking" class="qb-policy-card">
          <h2><?php esc_html_e('Carrier Services & Delivery Tracking', 'dawp'); ?></h2>
          <p><?php esc_html_e("To guarantee safe and efficient delivery, Queen's Bracelet partners with trusted domestic U.S. carriers. Orders are shipped using USPS, UPS, FedEx, or DHL.", 'dawp'); ?></p>
          <ul class="qb-carrier-list">
            <li><?php esc_html_e('USPS', 'dawp'); ?></li>
            <li><?php esc_html_e('UPS', 'dawp'); ?></li>
            <li><?php esc_html_e('FedEx', 'dawp'); ?></li>
            <li><?php esc_html_e('DHL', 'dawp'); ?></li>
          </ul>
          <p><?php esc_html_e('The final carrier service is dynamically selected when your package is securely labeled and prepared at our fulfillment center. Once your order is dispatched, an automated shipping confirmation email containing a direct tracking link and courier details will be sent to your registered email address.', 'dawp'); ?></p>
          <div class="qb-actions">
            <a class="qb-button qb-button--secondary" href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a>
          </div>
        </section>

        <section id="delivery-issues" class="qb-policy-card">
          <h2><?php esc_html_e('Resolving Delivery Issues & Damaged Shipments', 'dawp'); ?></h2>
          <p><?php esc_html_e('Your satisfaction is our priority. If your order encounters delays, tracking stops updating, or the package is marked as delivered but has not arrived, please reach out to our dedicated support team immediately.', 'dawp'); ?></p>
          <p><?php esc_html_e('To help us investigate and resolve the issue with the carrier swiftly, please provide:', 'dawp'); ?></p>
          <ul>
            <li><?php esc_html_e('Your exact Order Number, such as #QB1001.', 'dawp'); ?></li>
            <li><?php esc_html_e('The specific Email Address utilized during checkout.', 'dawp'); ?></li>
            <li><?php esc_html_e('The full and complete Delivery Address.', 'dawp'); ?></li>
            <li><?php esc_html_e('Clear, well-lit photos if the package container or jewelry item arrived damaged.', 'dawp'); ?></li>
          </ul>
          <div class="qb-actions">
            <a class="qb-button" href="<?php echo esc_url($support_portal); ?>"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
            <a class="qb-button qb-button--secondary" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
          </div>
        </section>

        <section id="contact-info" class="qb-policy-card">
          <h2><?php esc_html_e('Customer Support Contact Information', 'dawp'); ?></h2>
          <p><?php esc_html_e('For any questions regarding your shipment, custom delivery requests, or transit inquiries, please contact us directly through our official channels. We respond to all inquiries within 24 business hours.', 'dawp'); ?></p>
          <div class="qb-contact-card">
            <div class="qb-contact-item">
              <strong><?php esc_html_e('Store Name', 'dawp'); ?></strong>
              <span><?php echo esc_html($store_name); ?></span>
            </div>
            <div class="qb-contact-item">
              <strong><?php esc_html_e('Customer Support Email', 'dawp'); ?></strong>
              <span><a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a></span>
            </div>
            <?php if ($store_address) : ?>
              <div class="qb-contact-item">
                <strong><?php esc_html_e('Address', 'dawp'); ?></strong>
                <span><?php echo esc_html($store_address); ?></span>
              </div>
            <?php endif; ?>
            <div class="qb-contact-item">
              <strong><?php esc_html_e('Response Time', 'dawp'); ?></strong>
              <span><?php esc_html_e('Within 24 business hours.', 'dawp'); ?></span>
            </div>
          </div>
        </section>
      </div>
    </div>
  </section>
</div>
