<?php
/**
 * Template Part: page-shipping-policy
 *
 * @package dawp
 */

$support_email = 'support@queens-bracelet.com';
$store_address = function_exists('dawp_get_store_address_line') ? dawp_get_store_address_line() : '';
?>

<style>
  .qb-page { --qb-blush:#ffb7c5; --qb-peach:#ffd6a5; --qb-lavender:#d8c7ff; --qb-mint:#cff5e7; --qb-gold:#d8a94e; --qb-plum:#2f1f35; --qb-gray:#f7f7fa; --qb-text:#4f4355; --qb-border:#eadfe8; background:#fff; color:var(--qb-text); font-family:"DM Sans","Inter",system-ui,sans-serif; }
  .qb-page * { box-sizing:border-box; }
  .qb-page a { color:inherit; text-decoration:none; }
  .qb-wrap { width:min(100% - 32px,1280px); margin-inline:auto; }
  .qb-section { padding:72px 0; }
  .qb-eyebrow { margin:0 0 12px; color:var(--qb-gold); font-size:12px; font-weight:800; letter-spacing:.18em; text-transform:uppercase; }
  .qb-title { margin:0; color:var(--qb-plum); font-family:Georgia,"Times New Roman",serif; font-size:clamp(34px,4.2vw,58px); line-height:1.04; letter-spacing:0; }
  .qb-copy { margin:18px 0 0; max-width:780px; color:var(--qb-text); font-size:17px; line-height:1.75; }
  .qb-actions { display:flex; flex-wrap:wrap; gap:14px; margin-top:30px; }
  .qb-button { display:inline-flex; min-height:48px; align-items:center; justify-content:center; border:1px solid var(--qb-plum); border-radius:999px; background:var(--qb-plum); color:#fff !important; padding:0 24px; font-size:14px; font-weight:800; transition:.2s ease; }
  .qb-button:hover { border-color:var(--qb-gold); background:var(--qb-gold); color:var(--qb-plum) !important; }
  .qb-button--secondary { background:#fff; color:var(--qb-plum) !important; }
  .qb-button--secondary:hover { border-color:var(--qb-plum); background:#fff4f6; color:var(--qb-plum) !important; }
  .qb-hero { overflow:hidden; background:linear-gradient(135deg,rgba(255,183,197,.36),rgba(255,214,165,.38) 48%,rgba(207,245,231,.42)),#fff; }
  .qb-hero__grid { display:grid; grid-template-columns:minmax(0,1.04fr) minmax(320px,.96fr); gap:48px; align-items:center; padding:78px 0; }
  .qb-hero-panel, .qb-card, .qb-policy-card, .qb-contact-card { border:1px solid var(--qb-border); border-radius:24px; background:rgba(255,255,255,.9); box-shadow:0 18px 46px rgba(47,31,53,.08); }
  .qb-hero-panel { padding:clamp(24px,4vw,44px); }
  .qb-mini-grid { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:14px; margin-top:22px; }
  .qb-mini-card { border:1px solid var(--qb-border); border-radius:18px; background:#fff; padding:18px; }
  .qb-mini-card strong { display:block; color:var(--qb-plum); font-size:15px; }
  .qb-mini-card p { margin:7px 0 0; color:#675a6c; font-size:14px; line-height:1.65; }
  .qb-card { padding:22px; background:#fff; }
  .qb-card b { display:inline-flex; width:42px; height:42px; align-items:center; justify-content:center; border-radius:999px; background:#fff4f6; color:var(--qb-plum); font-size:13px; }
  .qb-card h3 { margin:18px 0 0; color:var(--qb-plum); font-size:19px; }
  .qb-card p { margin:10px 0 0; color:#675a6c; font-size:14px; line-height:1.65; }
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
  .qb-policy-card h2 { margin:0; color:var(--qb-plum); font-size:clamp(25px,3vw,38px); line-height:1.12; font-family:Georgia,"Times New Roman",serif; letter-spacing:0; }
  .qb-policy-card h3 { margin:24px 0 0; color:var(--qb-plum); font-size:18px; }
  .qb-policy-card p, .qb-policy-card li { color:#675a6c; font-size:15px; line-height:1.72; }
  .qb-policy-card p { margin:16px 0 0; }
  .qb-policy-card ul { display:grid; gap:10px; margin:18px 0 0; padding-left:1.15rem; list-style:disc outside; }
  .qb-note { border-left:4px solid var(--qb-gold); border-radius:0 18px 18px 0; background:#fff8e8; padding:16px 18px; }
  .qb-contact-card { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:14px; margin-top:24px; padding:18px; background:#fff; }
  .qb-contact-item { border:1px solid var(--qb-border); border-radius:18px; background:#fff; padding:16px; }
  .qb-contact-item strong { display:block; color:var(--qb-plum); font-size:14px; }
  .qb-contact-item span { display:block; margin-top:7px; color:#675a6c; font-size:14px; line-height:1.6; }
  .qb-plum { background:var(--qb-plum); color:#fff; }
  .qb-plum .qb-title, .qb-plum .qb-copy { color:#fff; }
  .qb-plum .qb-eyebrow { color:var(--qb-peach); }
  .qb-plum .qb-button { border-color:var(--qb-gold); background:var(--qb-gold); color:var(--qb-plum) !important; }
  .qb-policy-links { display:flex; flex-wrap:wrap; gap:10px; margin-top:28px; }
  .qb-policy-links a { border:1px solid rgba(255,255,255,.22); border-radius:999px; background:rgba(255,255,255,.1); padding:10px 14px; color:#fff; font-size:13px; font-weight:800; }
  @media (max-width:780px) { .qb-section { padding:56px 0; } .qb-hero__grid, .qb-content-grid, .qb-mini-grid, .qb-contact-card { grid-template-columns:1fr; } .qb-hero__grid { padding:58px 0; gap:30px; } .qb-sidebar { position:static; } .qb-actions { flex-direction:column; } .qb-button { width:100%; } }
</style>

<div class="qb-page qb-shipping-policy">
  <section class="qb-hero">
    <div class="qb-wrap qb-hero__grid">
      <div>
        <p class="qb-eyebrow"><?php esc_html_e('Shipping Policy', 'dawp'); ?></p>
        <h1 class="qb-title"><?php esc_html_e('Clear delivery details for bracelet orders.', 'dawp'); ?></h1>
        <p class="qb-copy"><?php esc_html_e("At Queen's Bracelet, we want your delivery experience to feel simple, clear, and predictable. We ship bracelet and fashion jewelry orders within the United States, provide tracking once an order ships, and keep our shipping timelines visible before you order.", 'dawp'); ?></p>
        <div class="qb-actions">
          <a class="qb-button" href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a>
          <a class="qb-button qb-button--secondary" href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
        </div>
      </div>

      <div class="qb-hero-panel">
        <p class="qb-eyebrow"><?php esc_html_e('Shipping Snapshot', 'dawp'); ?></p>
        <div class="qb-mini-grid">
          <div class="qb-mini-card"><strong><?php esc_html_e('Ships To', 'dawp'); ?></strong><p><?php esc_html_e('United States customers.', 'dawp'); ?></p></div>
          <div class="qb-mini-card"><strong><?php esc_html_e('Order Cutoff', 'dawp'); ?></strong><p><?php esc_html_e('5:00 PM PST, Los Angeles time.', 'dawp'); ?></p></div>
          <div class="qb-mini-card"><strong><?php esc_html_e('Handling Time', 'dawp'); ?></strong><p><?php esc_html_e('1-3 business days.', 'dawp'); ?></p></div>
          <div class="qb-mini-card"><strong><?php esc_html_e('Transit Time', 'dawp'); ?></strong><p><?php esc_html_e('5-7 business days.', 'dawp'); ?></p></div>
          <div class="qb-mini-card"><strong><?php esc_html_e('Estimated Delivery', 'dawp'); ?></strong><p><?php esc_html_e('Usually 6-10 business days.', 'dawp'); ?></p></div>
          <div class="qb-mini-card"><strong><?php esc_html_e('Shipping Cost', 'dawp'); ?></strong><p><?php esc_html_e('Free standard U.S. shipping', 'dawp'); ?></p></div>
          <div class="qb-mini-card"><strong><?php esc_html_e('Business Days', 'dawp'); ?></strong><p><?php esc_html_e('Monday-Friday, excluding holidays.', 'dawp'); ?></p></div>
          <div class="qb-mini-card"><strong><?php esc_html_e('Tracking', 'dawp'); ?></strong><p><?php esc_html_e('Emailed after shipment.', 'dawp'); ?></p></div>
        </div>
      </div>
    </div>
  </section>

  <section class="qb-section qb-soft">
    <div class="qb-wrap qb-content-grid">
      <aside class="qb-sidebar">
        <div class="qb-dark-card">
          <p class="qb-eyebrow"><?php esc_html_e('Policy Sections', 'dawp'); ?></p>
          <h2 class="qb-title" style="font-size:clamp(28px,3vw,42px);"><?php esc_html_e('From checkout to delivery.', 'dawp'); ?></h2>
          <p><?php esc_html_e('Use these sections to review locations, timelines, costs, tracking, and support before placing a bracelet order.', 'dawp'); ?></p>
          <nav class="qb-side-nav" aria-label="<?php esc_attr_e('Shipping policy sections', 'dawp'); ?>">
            <a href="#locations"><?php esc_html_e('Shipping Locations', 'dawp'); ?></a>
            <a href="#times"><?php esc_html_e('Delivery Times', 'dawp'); ?></a>
            <a href="#carriers"><?php esc_html_e('Carrier Services', 'dawp'); ?></a>
            <a href="#costs"><?php esc_html_e('Shipping Costs', 'dawp'); ?></a>
            <a href="#issues"><?php esc_html_e('Delivery Issues', 'dawp'); ?></a>
            <a href="#tracking"><?php esc_html_e('Tracking Your Order', 'dawp'); ?></a>
            <a href="#questions"><?php esc_html_e('Questions', 'dawp'); ?></a>
            <a href="#contact-info"><?php esc_html_e('Contact Information', 'dawp'); ?></a>
          </nav>
        </div>
      </aside>

      <div class="qb-policy-stack">
        <section id="locations" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Shipping Locations', 'dawp'); ?></p>
          <h2><?php esc_html_e('We currently ship within the USA.', 'dawp'); ?></h2>
          <p><?php esc_html_e("Queen's Bracelet serves customers shopping from the United States market. If a product, destination, or carrier limitation prevents delivery to your address, the order may not be available for that location at checkout.", 'dawp'); ?></p>
          <p><?php esc_html_e('Some jewelry orders may ship separately when items are prepared from different fulfillment batches or require different packing methods.', 'dawp'); ?></p>
        </section>

        <section id="times" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Delivery Times', 'dawp'); ?></p>
          <h2><?php esc_html_e('Most orders arrive after processing and standard U.S. transit.', 'dawp'); ?></h2>
          <ul>
            <li><?php esc_html_e('Order cutoff time: 5:00 PM (GMT-08:00) Pacific Standard Time, Los Angeles.', 'dawp'); ?></li>
            <li><?php esc_html_e('Orders placed after the cutoff start processing the next business day.', 'dawp'); ?></li>
            <li><?php esc_html_e('Order handling time: 1-3 business days, Monday to Friday.', 'dawp'); ?></li>
            <li><?php esc_html_e('Transit time: 5-7 business days, Monday to Friday.', 'dawp'); ?></li>
            <li><?php esc_html_e('Estimated delivery time: usually 6-10 business days.', 'dawp'); ?></li>
          </ul>
          <p class="qb-note"><?php esc_html_e('Business days do not include weekends or public holidays. Delivery estimates are not guaranteed dates, but they reflect the usual shipping window for standard U.S. orders.', 'dawp'); ?></p>
          <h3><?php esc_html_e('Notes for multi-item orders', 'dawp'); ?></h3>
          <ul>
            <li><?php esc_html_e('If you buy more than one bracelet or jewelry item, items may ship separately and arrive in multiple packages.', 'dawp'); ?></li>
            <li><?php esc_html_e('Some items may need extra time due to special handling, fulfillment availability, address review, holiday volume, or carrier delays.', 'dawp'); ?></li>
          </ul>
        </section>

        <section id="carriers" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Carrier Services', 'dawp'); ?></p>
          <h2><?php esc_html_e('Orders ship with trusted U.S. carrier services.', 'dawp'); ?></h2>
          <p><?php esc_html_e('Queen\'s Bracelet may use USPS, UPS, FedEx, or another available carrier service depending on the package size, destination, service availability, and fulfillment route.', 'dawp'); ?></p>
          <p><?php esc_html_e('The final carrier is selected when your order is prepared for shipment. Tracking details will show the carrier information once available.', 'dawp'); ?></p>
        </section>

        <section id="costs" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Shipping Costs', 'dawp'); ?></p>
          <h2><?php esc_html_e('Standard U.S. shipping is free unless checkout shows otherwise.', 'dawp'); ?></h2>
          <ul>
            <li><?php esc_html_e('Free Shipping: Most U.S. orders qualify for free standard shipping.', 'dawp'); ?></li>
            <li><?php esc_html_e('Optional Paid Shipping: Customers may choose a faster or assisted shipping service when available. Any additional shipping cost will be shown clearly at checkout before payment.', 'dawp'); ?></li>
          </ul>
          <p><?php esc_html_e('Please review the checkout page carefully before placing your order, especially if you select an upgraded shipping service or your address requires a different carrier service or delivery method.', 'dawp'); ?></p>
        </section>

        <section id="issues" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Delivery Issues', 'dawp'); ?></p>
          <h2><?php esc_html_e('Contact us if something looks off.', 'dawp'); ?></h2>
          <p><?php esc_html_e('If your order is delayed, tracking is not updating, a package is missing, an item is missing from a multi-item order, or tracking shows delivered but you have not received it, contact our support team so we can review the issue.', 'dawp'); ?></p>
          <p><?php esc_html_e('To help us review it faster, please include:', 'dawp'); ?></p>
          <ul>
            <li><?php esc_html_e('Your order number.', 'dawp'); ?></li>
            <li><?php esc_html_e('The email address used at checkout.', 'dawp'); ?></li>
            <li><?php esc_html_e('The delivery address.', 'dawp'); ?></li>
            <li><?php esc_html_e('Photos if the package or item arrived damaged.', 'dawp'); ?></li>
          </ul>
          <p><?php esc_html_e('We will review the details and, when needed, work with the carrier or fulfillment partner to help resolve the issue.', 'dawp'); ?></p>
        </section>

        <section id="tracking" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Tracking Your Order', 'dawp'); ?></p>
          <h2><?php esc_html_e('Tracking is sent once your order ships.', 'dawp'); ?></h2>
          <p><?php esc_html_e('Once your order ships, we will email tracking information to the email address used at checkout. If items ship separately, you may receive more than one tracking number.', 'dawp'); ?></p>
          <p><?php esc_html_e('Carrier tracking pages may take time to update after a tracking number is created. You can also use our Order Tracking page when tracking information is available.', 'dawp'); ?></p>
          <div class="qb-actions">
            <a class="qb-button" href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Open Order Tracking', 'dawp'); ?></a>
            <a class="qb-button qb-button--secondary" href="mailto:<?php echo esc_attr($support_email); ?>"><?php esc_html_e('Email Support', 'dawp'); ?></a>
          </div>
        </section>

        <section id="questions" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Questions?', 'dawp'); ?></p>
          <h2><?php esc_html_e('Use our FAQ or contact customer support.', 'dawp'); ?></h2>
          <p><?php esc_html_e('For common answers about orders, shipping, tracking, returns, refunds, bracelet sizing, product details, payments, privacy, and support, visit our FAQ page.', 'dawp'); ?></p>
          <div class="qb-actions">
            <a class="qb-button" href="<?php echo esc_url(home_url('/faq/')); ?>"><?php esc_html_e('Visit FAQs', 'dawp'); ?></a>
            <a class="qb-button qb-button--secondary" href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
          </div>
        </section>

        <section id="contact-info" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Contact Information', 'dawp'); ?></p>
          <h2><?php esc_html_e('Queen\'s Bracelet support details.', 'dawp'); ?></h2>
          <div class="qb-contact-card">
            <div class="qb-contact-item">
              <strong><?php esc_html_e('Store Name', 'dawp'); ?></strong>
              <span><?php esc_html_e('Queen\'s Bracelet', 'dawp'); ?></span>
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
              <span><?php esc_html_e('Monday-Friday, 9:00 AM-6:00 PM PST.', 'dawp'); ?></span>
            </div>
            <div class="qb-contact-item">
              <strong><?php esc_html_e('Response Time', 'dawp'); ?></strong>
              <span><?php esc_html_e('We aim to reply within 1 business day. Response times may vary on weekends, holidays, or high-volume periods.', 'dawp'); ?></span>
            </div>
          </div>
        </section>
      </div>
    </div>
  </section>

  <section class="qb-section qb-plum">
    <div class="qb-wrap">
      <p class="qb-eyebrow"><?php esc_html_e('Related Policies', 'dawp'); ?></p>
      <h2 class="qb-title"><?php esc_html_e('Shipping is separate from returns and refunds.', 'dawp'); ?></h2>
      <p class="qb-copy"><?php esc_html_e('For return eligibility, return method, item condition, and refund timing, review the dedicated Return & Refund Policy before sending any item back.', 'dawp'); ?></p>
      <nav class="qb-policy-links" aria-label="<?php esc_attr_e('Related policy links', 'dawp'); ?>">
        <a href="<?php echo esc_url(home_url('/return-refund-policy/')); ?>"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></a>
        <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>"><?php esc_html_e('Privacy Policy', 'dawp'); ?></a>
        <a href="<?php echo esc_url(home_url('/terms-conditions/')); ?>"><?php esc_html_e('Terms & Conditions', 'dawp'); ?></a>
        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
      </nav>
    </div>
  </section>
</div>
