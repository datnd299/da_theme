<?php
/**
 * Template Part: page-shipping-policy
 *
 * @package dawp
 */

$store_name     = function_exists('dawp_brand_name') ? dawp_brand_name() : 'Zorex Craft';
$support_email  = function_exists('dawp_contact_support_email') ? dawp_contact_support_email() : 'support@zorexcraft.com';
$support_mailto = function_exists('dawp_contact_mailto_url') ? dawp_contact_mailto_url(__('Zorex Craft shipping support', 'dawp'), __('Please include your order number, checkout email, and delivery address.', 'dawp')) : 'mailto:' . $support_email;
$store_address  = function_exists('dawp_get_store_address_line') ? dawp_get_store_address_line() : '';
$support_portal = home_url('/contact-us/');
?>

<style>
  .qb-page { --qb-obsidian:#173B57; --qb-ivory:#F7F7F5; --qb-white:#FFFFFF; --qb-carbon:#181A1B; --qb-green:#173B57; --qb-gold:#A8754F; --qb-silver:#707579; --qb-gray:#F7F7F5; --qb-text:#707579; --qb-border:#E2E4E4; --qb-plum:#173B57; --qb-peach:#A8754F; background:var(--qb-ivory); color:var(--qb-text); font-family:"Lato","Inter",system-ui,sans-serif; }
  .qb-page * { box-sizing:border-box; }
  .qb-page a { color:inherit; text-decoration:none; }
  .qb-wrap { width:min(100% - 32px,1160px); margin-inline:auto; }
  .qb-section { padding:68px 0; }
  .qb-eyebrow { margin:0 0 12px; color:var(--qb-gold); font-size:12px; font-weight:800; letter-spacing:.16em; text-transform:uppercase; }
  .qb-title { margin:0; color:var(--qb-plum); font-family:Georgia,"Times New Roman",serif; font-size:clamp(36px,5vw,64px); line-height:1.04; letter-spacing:0; }
  .qb-updated { margin:16px 0 0; color:var(--qb-plum); font-size:14px; font-weight:800; line-height:1.4; }
  .qb-copy { margin:18px 0 0; max-width:780px; color:var(--qb-text); font-size:17px; line-height:1.75; }
  .qb-button { display:inline-flex; min-height:48px; align-items:center; justify-content:center; border:1px solid var(--qb-plum); border-radius:999px; background:var(--qb-plum); color:#fff !important; padding:0 22px; font-size:14px; font-weight:800; transition:.2s ease; }
  .qb-button:hover { border-color:var(--qb-gold); background:var(--qb-gold); color:var(--qb-plum) !important; }
  .qb-button--secondary { background:#fff; color:var(--qb-plum) !important; }
  .qb-button--secondary:hover { border-color:var(--qb-plum); background:var(--qb-ivory); color:var(--qb-plum) !important; }
  .qb-actions { display:flex; flex-wrap:wrap; gap:14px; margin-top:28px; }
  .qb-hero .qb-actions { justify-content:center; }
  .qb-hero { position:relative; overflow:hidden; border-bottom:1px solid var(--qb-border); background:linear-gradient(135deg,#fff 0%,#F7F4EE 62%,rgba(179,138,82,.18) 100%); }
  .qb-hero::before { content:""; position:absolute; inset:auto 0 0; height:1px; background:linear-gradient(90deg,transparent,rgba(179,138,82,.7),transparent); }
  .qb-hero::after { content:""; position:absolute; right:8%; top:34px; width:180px; height:180px; border:1px solid rgba(179,138,82,.24); transform:rotate(12deg); }
  .qb-hero__grid { position:relative; z-index:1; display:grid; grid-template-columns:minmax(0,1fr); gap:28px; align-items:center; padding:70px 0 76px; }
  .qb-hero__content { max-width:720px; margin-inline:auto; text-align:center; }
  .qb-hero .qb-copy { max-width:690px; margin-inline:auto; }
  .qb-hero-panel, .qb-policy-card, .qb-contact-card { border:1px solid var(--qb-border); border-radius:8px; background:rgba(255,255,255,.94); box-shadow:0 12px 34px rgba(13,15,15,.05); }
  .qb-hero-panel { padding:clamp(22px,3vw,32px); }
  .qb-glance-list { display:grid; gap:14px; margin:20px 0 0; padding:0; list-style:none; }
  .qb-glance-list li { border:1px solid var(--qb-border); border-radius:14px; background:#fff; padding:16px; color:#707579; font-size:14px; line-height:1.6; }
  .qb-glance-list strong { display:block; margin-bottom:5px; color:var(--qb-plum); font-size:14px; line-height:1.25; }
  .qb-soft { background:var(--qb-gray); }
  .qb-content-grid { display:grid; grid-template-columns:minmax(0,1fr); gap:32px; align-items:start; }
  .qb-policy-stack { display:grid; gap:20px; }
  .qb-policy-card { padding:clamp(24px,4vw,38px); background:#fff; }
  .qb-policy-card:nth-child(even) { background:var(--qb-ivory); }
  .qb-policy-card h2 { margin:0; color:var(--qb-plum); font-family:Georgia,"Times New Roman",serif; font-size:clamp(25px,3vw,38px); line-height:1.12; letter-spacing:0; }
  .qb-policy-card h3 { margin:24px 0 0; color:var(--qb-plum); font-size:18px; line-height:1.35; }
  .qb-policy-card p, .qb-policy-card li { color:#707579; font-size:15px; line-height:1.72; }
  .qb-policy-card p { margin:14px 0 0; }
  .qb-policy-card ul, .qb-policy-card ol { display:grid; gap:9px; margin:16px 0 0; padding-left:1.15rem; }
  .qb-policy-card ul { list-style:disc outside; }
  .qb-policy-card ol { list-style:decimal outside; }
  .qb-callout { border-left:4px solid var(--qb-gold); border-radius:0 16px 16px 0; background:rgba(179,138,82,.12); padding:15px 18px; }
  .qb-split-grid { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:16px; margin-top:18px; }
  .qb-info-panel { border:1px solid var(--qb-border); border-radius:16px; background:#fff; padding:18px; }
  .qb-info-panel--soft { background:var(--qb-ivory); }
  .qb-info-panel h3 { margin:0; }
  .qb-timeline-grid { display:grid; grid-template-columns:repeat(4,minmax(0,1fr)); gap:14px; margin-top:20px; }
  .qb-timeline-item { border:1px solid var(--qb-border); border-radius:16px; background:#fff; padding:18px; }
  .qb-timeline-item strong { display:block; color:var(--qb-plum); font-size:14px; line-height:1.35; }
  .qb-timeline-item span { display:block; margin-top:8px; color:#707579; font-size:14px; line-height:1.55; }
  .qb-policy-card .qb-carrier-list { display:flex; flex-wrap:wrap; gap:10px; margin:18px 0 0; padding:0; list-style:none; }
  .qb-policy-card .qb-carrier-list li { display:inline-flex; width:auto; min-width:72px; align-items:center; justify-content:center; border:1px solid var(--qb-border); border-radius:999px; background:#fff; padding:9px 16px; color:var(--qb-plum); font-size:13px; font-weight:800; line-height:1.2; }
  .qb-contact-card { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:14px; margin-top:22px; padding:18px; background:#fff; box-shadow:none; }
  .qb-contact-item { border:1px solid var(--qb-border); border-radius:14px; background:#fff; padding:16px; }
  .qb-contact-item strong { display:block; color:var(--qb-plum); font-size:14px; }
  .qb-contact-item span { display:block; margin-top:7px; color:#707579; font-size:14px; line-height:1.6; overflow-wrap:anywhere; }
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
  .qb-page { background:#F3F1EC; }
  .qb-wrap { width:min(100% - 40px,1080px); }
  .qb-hero { border-bottom:0; background:linear-gradient(180deg,#F9F8F4 0%,#ECE8DF 100%); }
  .qb-hero::before { inset:0 auto 0 8%; width:1px; height:auto; background:rgba(23,59,87,.14); }
  .qb-hero::after { right:10%; top:50%; width:280px; height:280px; border-color:rgba(23,59,87,.13); border-radius:50%; transform:translateY(-50%); }
  .qb-hero__grid { padding:82px 0 66px; }
  .qb-hero__content { max-width:760px; margin-inline:0 auto; text-align:left; }
  .qb-hero .qb-copy { margin-inline:0; }
  .qb-hero .qb-actions { justify-content:flex-start; }
  .qb-title { max-width:760px; font-size:clamp(38px,5.6vw,72px); }
  .qb-button { border-radius:4px; min-height:46px; }
  .qb-soft { background:#F3F1EC; }
  .qb-policy-stack { counter-reset:policy-section; gap:16px; }
  .qb-policy-card { position:relative; border-radius:4px; border-color:#D7D2C8; box-shadow:none; padding:clamp(26px,4vw,42px) clamp(22px,4vw,48px) clamp(26px,4vw,42px) clamp(72px,7vw,112px); }
  .qb-policy-card:nth-child(even) { background:#FCFBF8; }
  .qb-policy-card::before { counter-increment:policy-section; content:counter(policy-section, decimal-leading-zero); position:absolute; left:clamp(22px,3vw,42px); top:clamp(28px,4vw,44px); color:rgba(168,117,79,.72); font-family:Georgia,"Times New Roman",serif; font-size:18px; font-weight:700; }
  .qb-policy-card h2 { font-size:clamp(24px,2.5vw,34px); }
  .qb-policy-card p, .qb-policy-card li { line-height:1.78; }
  .qb-callout, .qb-info-panel, .qb-timeline-item, .qb-contact-item, .qb-glance-list li { border-radius:4px; }
  @media (max-width:680px) {
    .qb-wrap { width:min(100% - 28px,1080px); }
    .qb-hero__content { text-align:left; }
    .qb-hero .qb-actions { justify-content:stretch; }
    .qb-policy-card { padding:24px; }
    .qb-policy-card::before { position:static; display:block; margin-bottom:12px; }
  }
</style>

<div class="qb-page qb-shipping-policy">
  <section class="qb-hero">
    <div class="qb-wrap qb-hero__grid">
      <div class="qb-hero__content">
        <p class="qb-eyebrow"><?php esc_html_e('Shipping Policy', 'dawp'); ?></p>
        <h1 class="qb-title"><?php esc_html_e('Shipping Policy', 'dawp'); ?></h1>
        <p class="qb-updated"><?php esc_html_e('Last Updated: May 28, 2026', 'dawp'); ?></p>
        <p class="qb-copy"><?php esc_html_e("Free standard U.S. shipping with clear delivery timelines shown before checkout.", 'dawp'); ?></p>
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
        <section id="shipping-locations" class="qb-policy-card">
          <h2><?php esc_html_e('Shipping Locations & Market', 'dawp'); ?></h2>
          <p><?php echo esc_html(sprintf('We currently ship exclusively within the United States. %s serves customers shopping from the United States domestic market.', $store_name)); ?></p>
          <p><?php esc_html_e('If a product, destination, or carrier limitation prevents delivery to your specific address, the order will not be available for that location, and you will be notified immediately at checkout before any payment is processed.', 'dawp'); ?></p>
          <div class="qb-callout">
            <p><?php esc_html_e('Some watch orders may ship separately if items are prepared from different fulfillment batches or require distinct specialized packing methods to ensure safe transit.', 'dawp'); ?></p>
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
          <p><?php esc_html_e('If your purchase includes multiple watches or diverse watch items, they may be fulfilled from different locations. Consequently, your items may ship separately and arrive in multiple packages.', 'dawp'); ?></p>
          <p><?php esc_html_e('You will receive unique tracking numbers for each package. Certain intricate or high-demand watch items may require extra preparation time due to rigorous address reviews, holiday volume spikes, or safe-handling protocols.', 'dawp'); ?></p>
        </section>

        <section id="tracking" class="qb-policy-card">
          <h2><?php esc_html_e('Carrier Services & Delivery Tracking', 'dawp'); ?></h2>
          <p><?php echo esc_html(sprintf('To guarantee safe and efficient delivery, %s partners with trusted domestic U.S. carriers. Orders are shipped using USPS, UPS, FedEx, or DHL.', $store_name)); ?></p>
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
            <li><?php esc_html_e('Your exact Order Number, such as #VC-1001.', 'dawp'); ?></li>
            <li><?php esc_html_e('The specific Email Address utilized during checkout.', 'dawp'); ?></li>
            <li><?php esc_html_e('The full and complete Delivery Address.', 'dawp'); ?></li>
            <li><?php esc_html_e('Clear, well-lit photos if the package container or watch item arrived damaged.', 'dawp'); ?></li>
          </ul>
          <div class="qb-actions">
            <a class="qb-button" href="<?php echo esc_url($support_portal); ?>"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
            <a class="qb-button qb-button--secondary" href="<?php echo esc_url($support_mailto); ?>"><?php echo esc_html($support_email); ?></a>
          </div>
        </section>

        <section id="contact-info" class="qb-policy-card">
          <h2><?php esc_html_e('Customer Support Contact Information', 'dawp'); ?></h2>
          <p><?php esc_html_e('For any questions regarding your shipment, custom delivery requests, or transit inquiries, please contact us directly through our official channels. We aim to reply within 1 business day.', 'dawp'); ?></p>
          <div class="qb-contact-card">
            <div class="qb-contact-item">
              <strong><?php esc_html_e('Store Name', 'dawp'); ?></strong>
              <span><?php echo esc_html($store_name); ?></span>
            </div>
            <div class="qb-contact-item">
              <strong><?php esc_html_e('Customer Support Email', 'dawp'); ?></strong>
              <span><a href="<?php echo esc_url($support_mailto); ?>"><?php echo esc_html($support_email); ?></a></span>
            </div>
            <?php if ($store_address) : ?>
              <div class="qb-contact-item">
                <strong><?php esc_html_e('Address', 'dawp'); ?></strong>
                <span><?php echo esc_html($store_address); ?></span>
              </div>
            <?php endif; ?>
            <div class="qb-contact-item">
              <strong><?php esc_html_e('Customer Service Hours', 'dawp'); ?></strong>
              <span><?php esc_html_e('Monday-Friday, 9:00 AM-6:00 PM PST.', 'dawp'); ?></span>
            </div>
            <div class="qb-contact-item">
              <strong><?php esc_html_e('Response Time', 'dawp'); ?></strong>
              <span><?php esc_html_e('Within 1 business day.', 'dawp'); ?></span>
            </div>
          </div>
        </section>
      </div>
    </div>
  </section>
</div>
