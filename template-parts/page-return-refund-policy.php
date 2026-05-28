<?php
/**
 * Template Part: page-return-refund-policy
 *
 * @package dawp
 */

$support_email = function_exists('dawp_contact_support_email') ? dawp_contact_support_email() : 'support@queens-bracelet.com';
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
  .qb-summary-grid { display:grid; grid-template-columns:repeat(4,minmax(0,1fr)); gap:18px; }
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
  .qb-policy-card ul, .qb-policy-card ol { display:grid; gap:10px; margin:18px 0 0; padding-left:1.15rem; }
  .qb-policy-card ul { list-style:disc outside; }
  .qb-policy-card ol { list-style:decimal outside; }
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
  @media (max-width:1080px) { .qb-summary-grid { grid-template-columns:repeat(2,minmax(0,1fr)); } }
  @media (max-width:780px) { .qb-section { padding:56px 0; } .qb-hero__grid, .qb-content-grid, .qb-summary-grid, .qb-mini-grid, .qb-contact-card { grid-template-columns:1fr; } .qb-hero__grid { padding:58px 0; gap:30px; } .qb-sidebar { position:static; } .qb-actions { flex-direction:column; } .qb-button { width:100%; } }
</style>

<div class="qb-page qb-return-refund-policy">
  <section class="qb-hero">
    <div class="qb-wrap qb-hero__grid">
      <div>
        <p class="qb-eyebrow"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></p>
        <h1 class="qb-title"><?php esc_html_e('Shop bracelets with clear return support.', 'dawp'); ?></h1>
        <p class="qb-copy"><?php esc_html_e("At Queen's Bracelet, we want you to shop with confidence. If a bracelet or fashion jewelry order is not right, this policy explains our return window, item condition requirements, return costs, exchanges, refunds, and order issue process.", 'dawp'); ?></p>
        <div class="qb-actions">
          <a class="qb-button" href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Start a Return Request', 'dawp'); ?></a>
          <a class="qb-button qb-button--secondary" href="mailto:<?php echo esc_attr($support_email); ?>"><?php esc_html_e('Email Support', 'dawp'); ?></a>
        </div>
      </div>

      <div class="qb-hero-panel">
        <p class="qb-eyebrow"><?php esc_html_e('Return Snapshot', 'dawp'); ?></p>
        <div class="qb-mini-grid">
          <div class="qb-mini-card"><strong><?php esc_html_e('Return Window', 'dawp'); ?></strong><p><?php esc_html_e('30 days from delivery date.', 'dawp'); ?></p></div>
          <div class="qb-mini-card"><strong><?php esc_html_e('Condition', 'dawp'); ?></strong><p><?php esc_html_e('Unused, unworn, uninstalled, and in original condition.', 'dawp'); ?></p></div>
          <div class="qb-mini-card"><strong><?php esc_html_e('Return Method', 'dawp'); ?></strong><p><?php esc_html_e('By mail after support approval.', 'dawp'); ?></p></div>
          <div class="qb-mini-card"><strong><?php esc_html_e('Restocking Fee', 'dawp'); ?></strong><p><?php esc_html_e('$0 for eligible returns.', 'dawp'); ?></p></div>
          <div class="qb-mini-card"><strong><?php esc_html_e('Refund Timing', 'dawp'); ?></strong><p><?php esc_html_e('Within 10 days after inspection approval.', 'dawp'); ?></p></div>
          <div class="qb-mini-card"><strong><?php esc_html_e('Shipping Policy Sync', 'dawp'); ?></strong><p><?php esc_html_e('Standard U.S. shipping is free unless checkout shows otherwise.', 'dawp'); ?></p></div>
        </div>
      </div>
    </div>
  </section>

  <section class="qb-section">
    <div class="qb-wrap qb-summary-grid">
      <div class="qb-card"><b>01</b><h3><?php esc_html_e('30-Day Easy Returns', 'dawp'); ?></h3><p><?php esc_html_e('Most eligible items may be returned within 30 days from the delivery date.', 'dawp'); ?></p></div>
      <div class="qb-card"><b>02</b><h3><?php esc_html_e('Support Approval', 'dawp'); ?></h3><p><?php esc_html_e('Contact us first so we can review the request and send return instructions.', 'dawp'); ?></p></div>
      <div class="qb-card"><b>03</b><h3><?php esc_html_e('No Restocking Fee', 'dawp'); ?></h3><p><?php esc_html_e('We do not charge restocking fees for eligible approved returns.', 'dawp'); ?></p></div>
      <div class="qb-card"><b>04</b><h3><?php esc_html_e('Original Payment', 'dawp'); ?></h3><p><?php esc_html_e('Approved refunds are issued to the original payment method whenever possible.', 'dawp'); ?></p></div>
    </div>
  </section>

  <section class="qb-section qb-soft">
    <div class="qb-wrap qb-content-grid">
      <aside class="qb-sidebar">
        <div class="qb-dark-card">
          <p class="qb-eyebrow"><?php esc_html_e('Policy Sections', 'dawp'); ?></p>
          <h2 class="qb-title" style="font-size:clamp(28px,3vw,42px);"><?php esc_html_e('Review before sending items back.', 'dawp'); ?></h2>
          <p><?php esc_html_e('These sections follow the full return and refund flow from eligibility through support, shipping costs, inspection, refund, and contact details.', 'dawp'); ?></p>
          <nav class="qb-side-nav" aria-label="<?php esc_attr_e('Return and refund policy sections', 'dawp'); ?>">
            <a href="#easy-returns"><?php esc_html_e('30-Day Easy Returns', 'dawp'); ?></a>
            <a href="#overview"><?php esc_html_e('Return Policy Overview', 'dawp'); ?></a>
            <a href="#return-costs"><?php esc_html_e('Return Costs', 'dawp'); ?></a>
            <a href="#scenarios"><?php esc_html_e('Common Scenarios', 'dawp'); ?></a>
            <a href="#how-to-return"><?php esc_html_e('How to Return', 'dawp'); ?></a>
            <a href="#authorization"><?php esc_html_e('Return Authorization', 'dawp'); ?></a>
            <a href="#refund-process"><?php esc_html_e('Refund Process', 'dawp'); ?></a>
            <a href="#exchanges"><?php esc_html_e('Exchanges', 'dawp'); ?></a>
            <a href="#non-returnable"><?php esc_html_e('Non-Returnable', 'dawp'); ?></a>
            <a href="#shipping-sync"><?php esc_html_e('Shipping Policy Sync', 'dawp'); ?></a>
            <a href="#questions"><?php esc_html_e('Questions', 'dawp'); ?></a>
            <a href="#contact-info"><?php esc_html_e('Contact Information', 'dawp'); ?></a>
          </nav>
        </div>
      </aside>

      <div class="qb-policy-stack">
        <section id="easy-returns" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('30-Day Easy Returns', 'dawp'); ?></p>
          <h2><?php esc_html_e('You have 30 days from delivery to request most returns.', 'dawp'); ?></h2>
          <p><?php esc_html_e('Most Queen\'s Bracelet items may be returned within 30 days from the delivery date. To be eligible, items must be unused, unworn, uninstalled if applicable, in original condition, and returned with original packaging, tags or labels, manuals, accessories, and included parts.', 'dawp'); ?></p>
          <p><?php esc_html_e('Items should be packed securely to prevent damage during return shipping. Restocking Fee: $0 - we do not charge restocking fees for eligible approved returns.', 'dawp'); ?></p>
          <p><?php esc_html_e('The 30-day period starts on the date the carrier tracking shows the order was delivered. If your order arrives in multiple packages, the return window for each item may be based on the delivery date for the package containing that item.', 'dawp'); ?></p>
          <p><?php esc_html_e('Please inspect your bracelet or jewelry item shortly after delivery. If anything appears damaged, incorrect, incomplete, or different from what you ordered, contact support promptly so we can review the issue while tracking, packaging, and delivery details are still available.', 'dawp'); ?></p>
          <p><?php esc_html_e('Return approval does not mean every item will automatically be refunded. Returned items are inspected after arrival. Items that are used, worn, damaged after delivery, missing packaging, missing parts, or returned without approval may be refused or may not qualify for a full refund.', 'dawp'); ?></p>
        </section>

        <section id="overview" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Return Policy Overview', 'dawp'); ?></p>
          <h2><?php esc_html_e('The key return requirements are simple.', 'dawp'); ?></h2>
          <ul>
            <li><?php esc_html_e('Return Window: 30 days from the delivery date unless the product page states a different return window.', 'dawp'); ?></li>
            <li><?php esc_html_e('Condition: Items must be unused, unworn, uninstalled if applicable, in original condition, and returned with original packaging, tags or labels, accessories, manuals, and included parts.', 'dawp'); ?></li>
            <li><?php esc_html_e('Easy Returns: Our support team will assist you from return review through refund confirmation.', 'dawp'); ?></li>
            <li><?php esc_html_e('Restocking Fee: $0 - we do not charge restocking fees for eligible returns.', 'dawp'); ?></li>
            <li><?php esc_html_e('Shipping Context: Standard U.S. shipping is free unless the checkout page shows otherwise. Return shipping responsibility depends on the reason for return.', 'dawp'); ?></li>
          </ul>
          <h3><?php esc_html_e('What original condition means', 'dawp'); ?></h3>
          <p><?php esc_html_e('Original condition means the item is clean, unused, unworn, unaltered, undamaged, and includes the original presentation materials or protective packaging where provided. Bracelet clasps, charms, beads, chains, stones, finishes, tags, labels, sizing pieces, care cards, manuals, accessories, and included parts must be returned together when they were included in the shipment.', 'dawp'); ?></p>
          <h3><?php esc_html_e('When a return may be refused', 'dawp'); ?></h3>
          <p><?php esc_html_e('A return may be refused if the request is outside the return window, the item was sent back without approval, the item shows wear or damage after delivery, the item is missing parts or packaging, the product was marked final sale or non-returnable, or the item cannot be safely or hygienically accepted back.', 'dawp'); ?></p>
          <p><?php esc_html_e('If a return is refused after inspection, our support team will explain the reason and may offer to send the item back to you. Additional shipping may apply when an ineligible item must be returned to the customer.', 'dawp'); ?></p>
        </section>

        <section id="return-costs" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Return Costs', 'dawp'); ?></p>
          <h2><?php esc_html_e('Return shipping depends on why the item is coming back.', 'dawp'); ?></h2>
          <h3><?php esc_html_e('For defective, damaged, incorrect, or missing essential items: no cost to the customer', 'dawp'); ?></h3>
          <p><?php esc_html_e('We cover return shipping or provide a prepaid label when the issue is caused by an order error, carrier damage, defect, missing essential parts, or an item not functioning as intended.', 'dawp'); ?></p>
          <ul>
            <li><?php esc_html_e('You received the wrong item.', 'dawp'); ?></li>
            <li><?php esc_html_e('The item arrived damaged due to the carrier.', 'dawp'); ?></li>
            <li><?php esc_html_e('The item is defective, missing essential parts, or not functioning as intended.', 'dawp'); ?></li>
          </ul>
          <p><?php esc_html_e('We may request photos or videos of the item, packaging, and shipping label so we can resolve the issue quickly.', 'dawp'); ?></p>
          <p><?php esc_html_e('For damaged packages, keep the product, inner packaging, outer packaging, packing materials, and shipping label until the review is complete. The carrier or fulfillment partner may need those materials to verify the damage claim.', 'dawp'); ?></p>
          <h3><?php esc_html_e('For customer remorse or change of mind: the customer pays actual return shipping', 'dawp'); ?></h3>
          <p><?php esc_html_e('The customer pays the actual return shipping cost when the return is based on preference, incorrect selection, or no longer wanting the item.', 'dawp'); ?></p>
          <ul>
            <li><?php esc_html_e('You ordered the wrong item, it does not fit, or it does not match your preference.', 'dawp'); ?></li>
            <li><?php esc_html_e('You no longer want the item.', 'dawp'); ?></li>
            <li><?php esc_html_e('You made a mistake selecting size, color, model, style, or compatibility.', 'dawp'); ?></li>
          </ul>
          <p class="qb-note"><?php esc_html_e('Original shipping costs are non-refundable when a shipping charge was paid, except when the return is due to our error, carrier damage, or a confirmed product issue. Standard U.S. shipping is free on most orders unless checkout shows otherwise.', 'dawp'); ?></p>
          <h3><?php esc_html_e('Return shipping method', 'dawp'); ?></h3>
          <p><?php esc_html_e('When you are responsible for return shipping, we recommend using a trackable shipping method and keeping the receipt until your return is received and processed. Queen\'s Bracelet is not responsible for customer-paid return packages that are lost, delayed, misdelivered, or damaged in transit.', 'dawp'); ?></p>
          <p><?php esc_html_e('When Queen\'s Bracelet provides a prepaid return label, please use that label and follow the instructions provided by support. Using a different shipping method without approval may delay the review or affect return shipping reimbursement.', 'dawp'); ?></p>
        </section>

        <section id="scenarios" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Common Return Scenarios', 'dawp'); ?></p>
          <h2><?php esc_html_e('Here is how common order issues are handled.', 'dawp'); ?></h2>
          <h3><?php esc_html_e('Order cancellations after ordering', 'dawp'); ?></h3>
          <p><?php esc_html_e('You may request an order cancellation within 9 hours after placing the order, as long as the order has not been processed or shipped. Once an order has shipped, it can no longer be canceled; you may request a return after delivery in accordance with this policy.', 'dawp'); ?></p>
          <p><?php esc_html_e('Cancellation requests are reviewed during Customer Service Hours: Monday-Friday, 9:00 AM-6:00 PM EST. If fulfillment has already started, the order may ship before the cancellation request can be completed. In that case, the return process can begin after delivery.', 'dawp'); ?></p>
          <h3><?php esc_html_e('Damaged on arrival', 'dawp'); ?></h3>
          <p><?php esc_html_e('If your order arrives damaged, contact us within 30 days of delivery and include photos of the item and packaging, including the shipping label. We will help with a replacement or refund at no cost to you when the issue is verified.', 'dawp'); ?></p>
          <p><?php esc_html_e('Please do not discard the damaged item or packaging until support confirms the next step. In many cases, clear photos allow us to review the issue quickly, but we may still ask you to hold the package while a carrier claim or fulfillment review is completed.', 'dawp'); ?></p>
          <h3><?php esc_html_e('Wrong product or missing items', 'dawp'); ?></h3>
          <p><?php esc_html_e('If you received the wrong product or your order is missing items or parts, contact us within 30 days of delivery. We may request photos for verification.', 'dawp'); ?></p>
          <p><?php esc_html_e('For missing items in a multi-item order, first check whether your order has multiple tracking numbers. Some bracelet and jewelry items may ship separately, and separate packages may arrive on different days within the shipping window described in our Shipping Policy.', 'dawp'); ?></p>
          <h3><?php esc_html_e('Never arrived or lost packages', 'dawp'); ?></h3>
          <p><?php esc_html_e('If your package shows no tracking updates for an extended period or is marked delivered but you did not receive it, contact us within 30 days of the delivery date or tracking status.', 'dawp'); ?></p>
          <p><?php esc_html_e('We will review the tracking details and, when needed, work with the carrier or fulfillment partner. If the package is confirmed lost or misdelivered, we will arrange a replacement or refund as appropriate.', 'dawp'); ?></p>
          <h3><?php esc_html_e('Delivered but not received', 'dawp'); ?></h3>
          <p><?php esc_html_e('If tracking shows delivered but the package is not at your address, please check common delivery locations, household members, neighbors, mailrooms, parcel lockers, front desk areas, and building management where applicable. Then contact support with your order number, checkout email, delivery address, and any information from the carrier.', 'dawp'); ?></p>
          <h3><?php esc_html_e('Delayed tracking updates', 'dawp'); ?></h3>
          <p><?php esc_html_e('Carrier tracking pages may take time to update after a label is created or after a package moves between facilities. If tracking appears stalled beyond the normal shipping timeline, contact us so we can review the shipment details.', 'dawp'); ?></p>
          <h3><?php esc_html_e('Address issues', 'dawp'); ?></h3>
          <p><?php esc_html_e('Customers are responsible for providing accurate shipping details at checkout. If an incorrect or incomplete address causes a failed delivery, delay, return to sender, or misdelivery, we will review the available carrier information and explain the available options.', 'dawp'); ?></p>
        </section>

        <section id="how-to-return" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('How to Return an Item', 'dawp'); ?></p>
          <h2><?php esc_html_e('Contact support before mailing anything back.', 'dawp'); ?></h2>
          <ol>
            <li><?php esc_html_e('Contact Us: Use the Contact Us page or email support with your order number and reason for return.', 'dawp'); ?></li>
            <li><?php esc_html_e('Pack Your Item: Repack the item securely in its original packaging, including all accessories, tags or labels, manuals, documents, and included parts.', 'dawp'); ?></li>
            <li><?php esc_html_e('Send It Back: Ship your return using the instructions provided in your return authorization email. You may use the carrier or method recommended in that email.', 'dawp'); ?></li>
          </ol>
          <p><?php esc_html_e('Return Authorization Required: Please do not send items back without first receiving return approval. Return instructions and the return shipping address will be provided after we review your request.', 'dawp'); ?></p>
          <p><?php esc_html_e('Return Address: The return address is the Queen\'s Bracelet website store address. Please still contact support first so we can confirm the correct return instructions for your order before you mail anything back.', 'dawp'); ?></p>
          <p><?php esc_html_e('What to include in your request: order number, the email used at checkout, item or items you want to return, reason for return, and photos or video if the item is damaged, defective, incorrect, incomplete, or the package arrived damaged.', 'dawp'); ?></p>
          <p><?php esc_html_e('Packaging requirement: Please include all parts, accessories, manuals, and original packaging when returning an item.', 'dawp'); ?></p>
          <p><?php esc_html_e('Please remove or cover old shipping labels when reusing an outer shipping box. Package the item so it cannot move freely inside the box or mailer, especially for jewelry with charms, stones, chains, clasps, or delicate finishes.', 'dawp'); ?></p>
          <p><?php esc_html_e('Return packages should be shipped within the timeframe provided in the authorization email. If you need more time, contact support before shipping so we can confirm whether the authorization can still be used.', 'dawp'); ?></p>
          <div class="qb-actions">
            <a class="qb-button" href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Open Contact Form', 'dawp'); ?></a>
            <a class="qb-button qb-button--secondary" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
          </div>
        </section>

        <section id="authorization" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Return Authorization Required', 'dawp'); ?></p>
          <h2><?php esc_html_e('Returns must be reviewed before they are mailed back.', 'dawp'); ?></h2>
          <p><?php esc_html_e('A return authorization helps us match your returned package to the correct order, confirm the return reason, provide the right return address, and explain whether Queen\'s Bracelet or the customer is responsible for return shipping.', 'dawp'); ?></p>
          <p><?php esc_html_e('The return address is the Queen\'s Bracelet website store address. Support will confirm the address and return instructions in your return authorization so the package can be matched to your order correctly.', 'dawp'); ?></p>
          <p><?php esc_html_e('Please do not send any item back without authorization or to any carrier address, fulfillment address, or address found on the original package unless support specifically provides that address in your return instructions. Packages sent without approval or to the wrong address may be delayed, lost, refused, or returned to sender.', 'dawp'); ?></p>
          <h3><?php esc_html_e('Information support may request', 'dawp'); ?></h3>
          <ul>
            <li><?php esc_html_e('Order number and the email address used at checkout.', 'dawp'); ?></li>
            <li><?php esc_html_e('Name of the item or items you want to return.', 'dawp'); ?></li>
            <li><?php esc_html_e('Reason for return, such as wrong item, damaged item, fit issue, preference, or duplicate order.', 'dawp'); ?></li>
            <li><?php esc_html_e('Photos or video of the item, packaging, shipping label, damage, defect, missing part, or incorrect product when applicable.', 'dawp'); ?></li>
            <li><?php esc_html_e('Whether the item is unused, unworn, and still includes original packaging, tags, labels, manuals, accessories, and included parts.', 'dawp'); ?></li>
          </ul>
          <p><?php esc_html_e('Support will review your request and provide the next step. Depending on the issue, this may include a return label, return address, replacement review, refund review, exchange guidance, or additional questions needed to verify the claim.', 'dawp'); ?></p>
        </section>

        <section id="refund-process" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Refund Process', 'dawp'); ?></p>
          <h2><?php esc_html_e('Refunds are processed after inspection approval.', 'dawp'); ?></h2>
          <h3><?php esc_html_e('Inspection', 'dawp'); ?></h3>
          <p><?php esc_html_e('Once we receive your return, we inspect the item to confirm it meets our return criteria.', 'dawp'); ?></p>
          <p><?php esc_html_e('Inspection may include checking item condition, signs of wear, missing parts, included accessories, packaging, tags or labels, serial or product labels if applicable, and whether the returned item matches the approved return request.', 'dawp'); ?></p>
          <h3><?php esc_html_e('Refund timing', 'dawp'); ?></h3>
          <p><?php esc_html_e('After approval, your refund will be processed to the original payment method. Queen\'s Bracelet processes approved refunds within 10 days after inspection approval. Your bank or payment provider may take additional time to post the credit.', 'dawp'); ?></p>
          <p><?php esc_html_e('If a return is approved but the item is missing parts, shows signs of use, or is returned in non-original condition, we may be unable to issue a refund and may offer to send the item back to you.', 'dawp'); ?></p>
          <p><?php esc_html_e('Refund timing begins after the returned item is received, inspected, and approved. Delivery of a return package to the return address does not by itself mean the refund has been approved.', 'dawp'); ?></p>
          <h3><?php esc_html_e('Refund method', 'dawp'); ?></h3>
          <p><?php esc_html_e('Approved refunds are issued to the original payment method whenever possible. If the original payment method is unavailable, we may offer an alternative method, such as store credit, only with your consent.', 'dawp'); ?></p>
          <h3><?php esc_html_e('Partial or unavailable refunds', 'dawp'); ?></h3>
          <p><?php esc_html_e('A refund may be delayed, reduced, or unavailable if the return is incomplete, ineligible, late, damaged after delivery, missing original components, or different from the item approved for return. We will contact you if inspection finds an issue that affects refund eligibility.', 'dawp'); ?></p>
          <h3><?php esc_html_e('Shipping charges and discounts', 'dawp'); ?></h3>
          <p><?php esc_html_e('Original shipping charges, when paid, are not refundable for customer remorse returns. If a discount, promotion, coupon, bundle offer, or store credit was used, the refund may reflect the actual amount paid for the returned item according to the order record.', 'dawp'); ?></p>
        </section>

        <section id="exchanges" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Exchanges', 'dawp'); ?></p>
          <h2><?php esc_html_e('Exchanges depend on stock availability.', 'dawp'); ?></h2>
          <p><?php esc_html_e('If you would like to exchange an item for a different size, color, style, or model, contact support with your order number and the item you want to exchange. Exchanges are subject to stock availability.', 'dawp'); ?></p>
          <p><?php esc_html_e('In some cases, the fastest option is to return the original item for a refund and place a new order for the preferred item.', 'dawp'); ?></p>
          <p><?php esc_html_e('Exchange requests follow the same condition rules as returns. The original item must be unused, unworn, in original condition, and returned with all original packaging and included parts. If the requested replacement item is unavailable, support may offer a refund process or another available option.', 'dawp'); ?></p>
          <p><?php esc_html_e('Price differences, promotions, availability, and shipping timing may vary between the original order and a new order. We cannot guarantee that a sale price, discount, or limited-stock item will remain available while an exchange is being reviewed.', 'dawp'); ?></p>
        </section>

        <section id="non-returnable" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Non-Returnable Items', 'dawp'); ?></p>
          <h2><?php esc_html_e('Some items cannot be returned for hygiene, safety, or product integrity reasons.', 'dawp'); ?></h2>
          <p><?php esc_html_e('Items that are not eligible for return will be identified where applicable. Examples may include, but are not limited to:', 'dawp'); ?></p>
          <ul>
            <li><?php esc_html_e('Items marked Final Sale or Non-Returnable.', 'dawp'); ?></li>
            <li><?php esc_html_e('Gift cards or digital products and downloads.', 'dawp'); ?></li>
            <li><?php esc_html_e('Personal care, hygiene, and intimate items.', 'dawp'); ?></li>
            <li><?php esc_html_e('Perishable goods, if applicable.', 'dawp'); ?></li>
            <li><?php esc_html_e('Items that have been used, worn, installed, assembled, modified, or damaged after delivery.', 'dawp'); ?></li>
            <li><?php esc_html_e('Items missing original packaging, serial number labels, tags, accessories, manuals, or included parts.', 'dawp'); ?></li>
            <li><?php esc_html_e('Certain hazardous materials or restricted items that cannot be shipped back safely.', 'dawp'); ?></li>
          </ul>
          <p><?php esc_html_e('For jewelry, hygiene and product integrity matter. Items that show signs of wear, skin contact residue, fragrance, cosmetic marks, stains, tarnish caused after delivery, broken clasps, bent parts, missing charms, removed tags, or altered sizing may not qualify for return.', 'dawp'); ?></p>
          <p><?php esc_html_e('If a product page has a specific return limitation, that product-specific note controls for that item. Please review product details, size information, material notes, and any final sale or non-returnable labels before placing an order.', 'dawp'); ?></p>
        </section>

        <section id="shipping-sync" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Shipping Policy Sync', 'dawp'); ?></p>
          <h2><?php esc_html_e('Return and refund handling follows our shipping timelines where relevant.', 'dawp'); ?></h2>
          <p><?php esc_html_e('Queen\'s Bracelet currently ships orders within the United States. Standard U.S. shipping is free on most orders unless checkout shows otherwise. Our Shipping Policy states a 5:00 PM PST order cutoff, 1-2 business day handling time, Monday-Friday fulfillment, 5-7 business day standard transit, and usually 6-9 business days estimated delivery.', 'dawp'); ?></p>
          <p><?php esc_html_e('If a return request involves late delivery, tracking not updating, a delivered-but-not-received package, damaged packaging, missing items, or a shipment that may have been lost, we use the order tracking, carrier status, delivery date, and shipping timeline to review the issue.', 'dawp'); ?></p>
          <p><?php esc_html_e('If items from one order ship separately, return windows and issue review may be based on the delivery date and tracking information for the relevant package. Keep all tracking emails and package details until your order is complete and any return or issue review is resolved.', 'dawp'); ?></p>
          <div class="qb-actions">
            <a class="qb-button" href="<?php echo esc_url(home_url('/shipping-policy/')); ?>"><?php esc_html_e('Review Shipping Policy', 'dawp'); ?></a>
            <a class="qb-button qb-button--secondary" href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a>
          </div>
        </section>

        <section id="questions" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Questions?', 'dawp'); ?></p>
          <h2><?php esc_html_e('Use our FAQ page or contact customer support.', 'dawp'); ?></h2>
          <p><?php esc_html_e('For common answers about orders, shipping, tracking, returns, refunds, bracelet sizing, product details, payments, privacy, and support, visit our FAQ page or contact our customer service team.', 'dawp'); ?></p>
          <p><?php esc_html_e('For the fastest help, include your order number, checkout email, a short description of the issue, and any photos or videos that show the item condition, packaging, shipping label, defect, damage, missing part, or incorrect item.', 'dawp'); ?></p>
          <p><?php esc_html_e('Support responses are sent during Customer Service Hours: Monday-Friday, 9:00 AM-6:00 PM EST. If you contact us on a weekend, holiday, or high-volume period, response times may vary, but we aim to reply within 1 business day.', 'dawp'); ?></p>
          <div class="qb-actions">
            <a class="qb-button" href="<?php echo esc_url(home_url('/faq/')); ?>"><?php esc_html_e('Visit FAQs', 'dawp'); ?></a>
            <a class="qb-button qb-button--secondary" href="<?php echo esc_url(home_url('/shipping-policy/')); ?>"><?php esc_html_e('Shipping Policy', 'dawp'); ?></a>
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
              <strong><?php esc_html_e('Support Portal', 'dawp'); ?></strong>
              <span><a href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact Us page', 'dawp'); ?></a></span>
            </div>
            <div class="qb-contact-item">
              <strong><?php esc_html_e('Customer Service Hours', 'dawp'); ?></strong>
              <span><?php esc_html_e('Monday-Friday, 9:00 AM-6:00 PM EST.', 'dawp'); ?></span>
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
      <h2 class="qb-title"><?php esc_html_e('Returns and refunds are separate from shipping timelines.', 'dawp'); ?></h2>
      <p class="qb-copy"><?php esc_html_e('For order cutoff, handling time, transit time, free standard U.S. shipping, carrier tracking, and delivery issue details, review the dedicated Shipping Policy.', 'dawp'); ?></p>
      <nav class="qb-policy-links" aria-label="<?php esc_attr_e('Related policy links', 'dawp'); ?>">
        <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>"><?php esc_html_e('Shipping Policy', 'dawp'); ?></a>
        <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>"><?php esc_html_e('Privacy Policy', 'dawp'); ?></a>
        <a href="<?php echo esc_url(home_url('/terms-conditions/')); ?>"><?php esc_html_e('Terms & Conditions', 'dawp'); ?></a>
        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
      </nav>
    </div>
  </section>
</div>
