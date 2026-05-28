<?php
/**
 * Template Part: page-return-refund-policy
 *
 * @package dawp
 */

$store_name     = "Queen's Bracelet";
$support_email  = function_exists('dawp_contact_support_email') ? dawp_contact_support_email() : 'support@queens-bracelet.com';
$store_address  = function_exists('dawp_get_store_address_line') ? dawp_get_store_address_line() : '';
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
  .qb-hero { overflow:hidden; background:linear-gradient(135deg,rgba(255,183,197,.34),rgba(255,214,165,.35) 48%,rgba(207,245,231,.38)),#fff; }
  .qb-hero__grid { display:grid; grid-template-columns:minmax(0,1.05fr) minmax(300px,.95fr); gap:42px; align-items:center; padding:76px 0; }
  .qb-hero-panel, .qb-policy-card, .qb-contact-card { border:1px solid var(--qb-border); border-radius:20px; background:rgba(255,255,255,.92); box-shadow:0 18px 46px rgba(47,31,53,.08); }
  .qb-hero-panel { padding:clamp(24px,4vw,38px); }
  .qb-mini-grid { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:14px; margin-top:20px; }
  .qb-mini-card { border:1px solid var(--qb-border); border-radius:14px; background:#fff; padding:16px; }
  .qb-mini-card strong { display:block; color:var(--qb-plum); font-size:14px; }
  .qb-mini-card p { margin:7px 0 0; color:#675a6c; font-size:14px; line-height:1.55; }
  .qb-soft { background:var(--qb-gray); }
  .qb-content-grid { display:grid; grid-template-columns:280px minmax(0,1fr); gap:32px; align-items:start; }
  .qb-sidebar { position:sticky; top:110px; }
  .qb-dark-card { border-radius:20px; background:var(--qb-plum); padding:24px; color:#fff; }
  .qb-dark-card .qb-eyebrow { color:var(--qb-peach); }
  .qb-dark-card h2 { margin:0; color:#fff; font-family:Georgia,"Times New Roman",serif; font-size:28px; line-height:1.12; }
  .qb-dark-card p { margin:14px 0 0; color:rgba(255,255,255,.78); font-size:14px; line-height:1.65; }
  .qb-side-nav { display:grid; gap:9px; margin-top:20px; }
  .qb-side-nav a { border:1px solid rgba(255,255,255,.15); border-radius:999px; padding:10px 13px; color:#fff; font-size:13px; font-weight:800; }
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
  .qb-contact-card { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:14px; margin-top:22px; padding:18px; background:#fff; box-shadow:none; }
  .qb-contact-item { border:1px solid var(--qb-border); border-radius:14px; background:#fff; padding:16px; }
  .qb-contact-item strong { display:block; color:var(--qb-plum); font-size:14px; }
  .qb-contact-item span { display:block; margin-top:7px; color:#675a6c; font-size:14px; line-height:1.6; overflow-wrap:anywhere; }
  @media (max-width:920px) { .qb-hero__grid, .qb-content-grid { grid-template-columns:1fr; } .qb-sidebar { position:static; } }
  @media (max-width:680px) { .qb-section { padding:52px 0; } .qb-hero__grid { padding:56px 0; gap:28px; } .qb-mini-grid, .qb-contact-card { grid-template-columns:1fr; } .qb-actions { flex-direction:column; } .qb-button { width:100%; } }
</style>

<div class="qb-page qb-return-refund-policy">
  <section class="qb-hero">
    <div class="qb-wrap qb-hero__grid">
      <div>
        <p class="qb-eyebrow"><?php esc_html_e('Refund & Return Policy', 'dawp'); ?></p>
        <h1 class="qb-title"><?php esc_html_e('Refund & Return Policy', 'dawp'); ?></h1>
        <p class="qb-copy"><?php echo esc_html(sprintf('At %s, we want you to shop with confidence. If you are not satisfied with your purchase for any reason, we offer a clear and customer-friendly return process for most items sold on our website.', $store_name)); ?></p>
        <div class="qb-actions">
          <a class="qb-button" href="<?php echo esc_url($support_portal); ?>"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
          <a class="qb-button qb-button--secondary" href="mailto:<?php echo esc_attr($support_email); ?>"><?php esc_html_e('Email Support', 'dawp'); ?></a>
        </div>
      </div>

      <div class="qb-hero-panel">
        <p class="qb-eyebrow"><?php esc_html_e('Return Policy Overview', 'dawp'); ?></p>
        <div class="qb-mini-grid">
          <div class="qb-mini-card"><strong><?php esc_html_e('Return Window', 'dawp'); ?></strong><p><?php esc_html_e('30 days from the day you receive your order.', 'dawp'); ?></p></div>
          <div class="qb-mini-card"><strong><?php esc_html_e('Condition', 'dawp'); ?></strong><p><?php esc_html_e('Unused, uninstalled, and in original condition.', 'dawp'); ?></p></div>
          <div class="qb-mini-card"><strong><?php esc_html_e('Restocking Fee', 'dawp'); ?></strong><p><?php esc_html_e('Free', 'dawp'); ?></p></div>
          <div class="qb-mini-card"><strong><?php esc_html_e('Free Return Shipping', 'dawp'); ?></strong><p><?php esc_html_e('Free return shipping when the issue is our fault.', 'dawp'); ?></p></div>
        </div>
      </div>
    </div>
  </section>

  <section class="qb-section qb-soft">
    <div class="qb-wrap qb-content-grid">
      <aside class="qb-sidebar">
        <div class="qb-dark-card">
          <p class="qb-eyebrow"><?php esc_html_e('Policy Sections', 'dawp'); ?></p>
          <h2><?php esc_html_e('Review the return process.', 'dawp'); ?></h2>
          <p><?php esc_html_e('Use these sections to find return eligibility, costs, scenarios, refund timing, exchanges, and contact details.', 'dawp'); ?></p>
          <nav class="qb-side-nav" aria-label="<?php esc_attr_e('Return and refund policy sections', 'dawp'); ?>">
            <a href="#exchanges"><?php esc_html_e('Exchanges', 'dawp'); ?></a>
            <a href="#easy-returns"><?php esc_html_e('30-Day Easy Returns', 'dawp'); ?></a>
            <a href="#overview"><?php esc_html_e('Return Policy Overview', 'dawp'); ?></a>
            <a href="#return-costs"><?php esc_html_e('Return Shipping Fee', 'dawp'); ?></a>
            <a href="#scenarios"><?php esc_html_e('Common Scenarios', 'dawp'); ?></a>
            <a href="#how-to-return"><?php esc_html_e('How to Return', 'dawp'); ?></a>
            <a href="#refund-process"><?php esc_html_e('Refund Process', 'dawp'); ?></a>
            <a href="#non-returnable"><?php esc_html_e('Non-Returnable Items', 'dawp'); ?></a>
            <a href="#questions"><?php esc_html_e('Questions?', 'dawp'); ?></a>
            <a href="#contact-info"><?php esc_html_e('Contact Information', 'dawp'); ?></a>
          </nav>
        </div>
      </aside>

      <div class="qb-policy-stack">
        <section id="exchanges" class="qb-policy-card">
          <h2><?php esc_html_e('Exchanges', 'dawp'); ?></h2>
          <p><?php esc_html_e('If you would like to exchange an item for a different size, color, or model, contact our customer support team. Exchanges are subject to stock availability.', 'dawp'); ?></p>
          <p><?php esc_html_e('In some cases, the fastest option is to return the original item for a refund and place a new order.', 'dawp'); ?></p>
        </section>

        <section id="easy-returns" class="qb-policy-card">
          <h2><?php esc_html_e('30-Day Easy Returns', 'dawp'); ?></h2>
          <p><?php esc_html_e('You have 30 days from the day you receive your order to request a return for most items.', 'dawp'); ?></p>
          <p><?php esc_html_e('To be eligible, items must be unused, uninstalled (if applicable), in original condition, and returned with all original packaging, tags/labels, manuals, accessories, and included parts. Items should be packed securely to prevent damage during return shipping.', 'dawp'); ?></p>
          <p class="qb-callout"><?php esc_html_e('Restocking Fee: Free - we do not charge restocking fees for eligible returns.', 'dawp'); ?></p>
        </section>

        <section id="overview" class="qb-policy-card">
          <h2><?php esc_html_e('Return Policy Overview', 'dawp'); ?></h2>
          <ul>
            <li><?php esc_html_e('Return Window: 30 days from the day you receive your order (unless the product page states a different return window).', 'dawp'); ?></li>
            <li><?php esc_html_e('Condition: Items must be unused, uninstalled, in original condition, and returned with original packaging, tags/labels, accessories, manuals, and parts.', 'dawp'); ?></li>
            <li><?php esc_html_e('Easy Returns: Our support team will assist you through the process from return approval to refund confirmation.', 'dawp'); ?></li>
            <li><?php esc_html_e('Restocking Fee: Free - we do not charge any restocking fees for eligible returns.', 'dawp'); ?></li>
          </ul>
        </section>

        <section id="return-costs" class="qb-policy-card">
          <h2><?php esc_html_e('Return Shipping Fee', 'dawp'); ?></h2>
          <h3><?php esc_html_e('For Defective or Incorrect Products: No cost to the customer', 'dawp'); ?></h3>
          <p><?php esc_html_e('We cover return shipping (or provide a prepaid label) if:', 'dawp'); ?></p>
          <ul>
            <li><?php esc_html_e('You received the wrong item,', 'dawp'); ?></li>
            <li><?php esc_html_e('The item arrived damaged due to the carrier,', 'dawp'); ?></li>
            <li><?php esc_html_e('The item is defective, missing essential parts, or not functioning as intended.', 'dawp'); ?></li>
          </ul>
          <p><?php esc_html_e('We may request photos/videos of the item and packaging to help resolve the issue quickly.', 'dawp'); ?></p>

          <h3><?php esc_html_e('For Customer Remorse (Change of Mind): The customer pays the actual return shipping cost', 'dawp'); ?></h3>
          <p><?php esc_html_e('The customer pays the actual return shipping cost when:', 'dawp'); ?></p>
          <ul>
            <li><?php esc_html_e('You ordered the wrong item, it does not fit, or it does not match your preference,', 'dawp'); ?></li>
            <li><?php esc_html_e('You no longer want the item,', 'dawp'); ?></li>
            <li><?php esc_html_e('You made a mistake in selecting size/color/model/compatibility.', 'dawp'); ?></li>
          </ul>
          <p class="qb-callout"><?php esc_html_e('Original shipping costs are non-refundable.', 'dawp'); ?></p>
        </section>

        <section id="scenarios" class="qb-policy-card">
          <h2><?php esc_html_e('Common Return Scenarios', 'dawp'); ?></h2>
          <h3><?php esc_html_e('Order Cancellations (After Ordering)', 'dawp'); ?></h3>
          <p><?php esc_html_e('You may request an order cancellation within 9 hours after placing the order, as long as the order has not been processed or shipped.', 'dawp'); ?></p>
          <p><?php esc_html_e('Once an order has been shipped, it can no longer be canceled; you may request a return after delivery in accordance with this policy.', 'dawp'); ?></p>

          <h3><?php esc_html_e('Damaged on Arrival', 'dawp'); ?></h3>
          <p><?php esc_html_e('If your order arrives damaged, please contact us within 30 days of delivery and include photos of the item and the packaging (shipping label included). We will help with a replacement or refund at no cost to you.', 'dawp'); ?></p>

          <h3><?php esc_html_e('Wrong Product / Missing Items', 'dawp'); ?></h3>
          <p><?php esc_html_e('If you received the wrong product or your order is missing items/parts, please contact us within 30 days of delivery. We may request photos for verification.', 'dawp'); ?></p>

          <h3><?php esc_html_e('Never Arrived / Lost Packages', 'dawp'); ?></h3>
          <p><?php esc_html_e('If your package shows no tracking updates for an extended period or is marked "Delivered" but you did not receive it, please contact us within 30 days of the delivery date/tracking status.', 'dawp'); ?></p>
          <p><?php esc_html_e('We will investigate with the carrier and, if confirmed lost or misdelivered, we will arrange a replacement or refund as appropriate.', 'dawp'); ?></p>
        </section>

        <section id="how-to-return" class="qb-policy-card">
          <h2><?php esc_html_e('How to Return an Item', 'dawp'); ?></h2>
          <ol>
            <li><?php esc_html_e('Contact Us: Use our contact page or email support with your order number and reason for return.', 'dawp'); ?></li>
            <li><?php esc_html_e('Pack Your Item: Repack the item securely in its original packaging, including all accessories, tags/labels, manuals, and documents.', 'dawp'); ?></li>
            <li><?php esc_html_e('Send It Back: Ship your return using the instructions provided in your return authorization email. You may use the carrier or method recommended in that email.', 'dawp'); ?></li>
          </ol>
          <p><?php esc_html_e('Return Authorization Required: Please do not send items back without first receiving return approval/authorization. Return instructions and the return shipping address will be provided in the return authorization email after we review your request.', 'dawp'); ?></p>
          <?php if ($store_address) : ?>
            <p><?php echo esc_html(sprintf('Return Address: The return address is our website store address: %s. Please contact support before sending any item back so we can confirm the correct return instructions for your order.', $store_address)); ?></p>
          <?php endif; ?>
          <p><?php esc_html_e('What to include in your request: Order number, the email used at checkout, item(s) you want to return, reason for return, and photos/video if the item is damaged/defective or the package arrived damaged.', 'dawp'); ?></p>
          <p><?php esc_html_e('Packaging requirement: Please include all parts, accessories, manuals, and original packaging when returning an item.', 'dawp'); ?></p>
          <div class="qb-actions">
            <a class="qb-button" href="<?php echo esc_url($support_portal); ?>"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
          </div>
        </section>

        <section id="refund-process" class="qb-policy-card">
          <h2><?php esc_html_e('Refund Process', 'dawp'); ?></h2>
          <h3><?php esc_html_e('Inspection:', 'dawp'); ?></h3>
          <p><?php esc_html_e('Once we receive your return, we will inspect the item to ensure it meets our return criteria.', 'dawp'); ?></p>
          <h3><?php esc_html_e('Refund Timing:', 'dawp'); ?></h3>
          <p><?php esc_html_e('After approval, your refund will be processed to the original payment method. It typically takes up to 7 days for the refund to appear, depending on your bank or payment provider. If your return is approved but the item is missing parts, shows signs of use, or is returned in non-original condition, we may be unable to issue a refund and may offer to send the item back to you.', 'dawp'); ?></p>
          <h3><?php esc_html_e('Refund Method', 'dawp'); ?></h3>
          <p><?php esc_html_e('Approved refunds are issued to the original payment method whenever possible. If the original payment method is unavailable, we may offer an alternative method (such as store credit) only with your consent.', 'dawp'); ?></p>
        </section>

        <section id="non-returnable" class="qb-policy-card">
          <h2><?php esc_html_e('Non-Returnable Items', 'dawp'); ?></h2>
          <p><?php esc_html_e('For hygiene, safety, and product integrity reasons, some items are not eligible for return. These items will be clearly marked as non-returnable on their product pages. Examples may include (but are not limited to):', 'dawp'); ?></p>
          <ul>
            <li><?php esc_html_e('Items marked Final Sale / Non-Returnable', 'dawp'); ?></li>
            <li><?php esc_html_e('Gift cards or digital products/downloads', 'dawp'); ?></li>
            <li><?php esc_html_e('Personal care, hygiene, and intimate items', 'dawp'); ?></li>
            <li><?php esc_html_e('Perishable goods (food, beverages, supplements if applicable)', 'dawp'); ?></li>
            <li><?php esc_html_e('Items that have been used, installed, assembled, modified, or damaged after delivery', 'dawp'); ?></li>
            <li><?php esc_html_e('Items missing original packaging, serial number labels, accessories, manuals, or included parts', 'dawp'); ?></li>
            <li><?php esc_html_e('Certain hazardous materials or restricted items that cannot be shipped back safely', 'dawp'); ?></li>
          </ul>
        </section>

        <section id="questions" class="qb-policy-card">
          <h2><?php esc_html_e('Questions?', 'dawp'); ?></h2>
          <p><?php esc_html_e('Visit our FAQs page here or contact our customer service team.', 'dawp'); ?></p>
          <div class="qb-actions">
            <a class="qb-button" href="<?php echo esc_url(home_url('/faq/')); ?>"><?php esc_html_e('Visit FAQs', 'dawp'); ?></a>
            <a class="qb-button qb-button--secondary" href="mailto:<?php echo esc_attr($support_email); ?>"><?php esc_html_e('Contact Customer Service', 'dawp'); ?></a>
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
              <div class="qb-contact-item">
                <strong><?php esc_html_e('Return Address', 'dawp'); ?></strong>
                <span><?php echo esc_html($store_address); ?></span>
              </div>
            <?php endif; ?>
            <div class="qb-contact-item">
              <strong><?php esc_html_e('Email', 'dawp'); ?></strong>
              <span><a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a></span>
            </div>
            <div class="qb-contact-item">
              <strong><?php esc_html_e('Contact Support', 'dawp'); ?></strong>
              <span><a href="<?php echo esc_url($support_portal); ?>"><?php esc_html_e('Contact Us page', 'dawp'); ?></a></span>
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
</div>
