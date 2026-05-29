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
  .qb-step-list { counter-reset:return-step; display:grid; gap:14px; margin-top:18px; }
  .qb-step { position:relative; border:1px solid var(--qb-border); border-radius:16px; background:#fff; padding:18px 18px 18px 58px; }
  .qb-step::before { counter-increment:return-step; content:counter(return-step); position:absolute; left:18px; top:18px; width:28px; height:28px; border-radius:999px; display:grid; place-items:center; background:var(--qb-plum); color:#fff; font-size:13px; font-weight:800; }
  .qb-step h3 { margin:0; }
  .qb-address-box { margin-top:18px; border:1px solid rgba(216,169,78,.38); border-radius:16px; background:#fff8e8; padding:18px; color:var(--qb-plum); }
  .qb-address-box strong { display:block; }
  .qb-contact-card { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:14px; margin-top:22px; padding:18px; background:#fff; box-shadow:none; }
  .qb-contact-item { border:1px solid var(--qb-border); border-radius:14px; background:#fff; padding:16px; }
  .qb-contact-item strong { display:block; color:var(--qb-plum); font-size:14px; }
  .qb-contact-item span { display:block; margin-top:7px; color:#675a6c; font-size:14px; line-height:1.6; overflow-wrap:anywhere; }
  @media (max-width:920px) { .qb-hero__grid, .qb-content-grid, .qb-split-grid { grid-template-columns:1fr; } }
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
    .qb-step { padding-left:18px; padding-top:58px; }
  }
</style>

<div class="qb-page qb-return-refund-policy">
  <section class="qb-hero">
    <div class="qb-wrap qb-hero__grid">
      <div class="qb-hero__content">
        <p class="qb-eyebrow"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></p>
        <h1 class="qb-title"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></h1>
        <p class="qb-copy"><?php esc_html_e('We want you to be completely satisfied with your purchase. Unless specified under the Non-Returnable Items section below, all products purchased from our store can be returned within 30 days of delivery, subject to the conditions below.', 'dawp'); ?></p>
        <div class="qb-actions">
          <a class="qb-button" href="<?php echo esc_url($support_portal); ?>"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
          <a class="qb-button qb-button--secondary" href="mailto:<?php echo esc_attr($support_email); ?>"><?php esc_html_e('Email Support', 'dawp'); ?></a>
        </div>
      </div>

      <div class="qb-hero-panel">
        <p class="qb-eyebrow"><?php esc_html_e('At a Glance', 'dawp'); ?></p>
        <ul class="qb-glance-list">
          <li><strong><?php esc_html_e('Return window', 'dawp'); ?></strong><?php esc_html_e('30 days of delivery.', 'dawp'); ?></li>
          <li><strong><?php esc_html_e('Condition', 'dawp'); ?></strong><?php esc_html_e('Unworn, unused, undamaged, and in original, unaltered condition.', 'dawp'); ?></li>
          <li><strong><?php esc_html_e('Restocking fee', 'dawp'); ?></strong><?php esc_html_e('Free. We do not charge restocking fees for eligible returns.', 'dawp'); ?></li>
          <li><strong><?php esc_html_e('Refund processing', 'dawp'); ?></strong><?php esc_html_e('Original payment method within 7 business days after approval.', 'dawp'); ?></li>
        </ul>
      </div>
    </div>
  </section>

  <section class="qb-section qb-soft">
    <div class="qb-wrap qb-content-grid">
      <div class="qb-policy-stack">
        <section id="return-eligibility" class="qb-policy-card">
          <h2><?php esc_html_e('Return Eligibility', 'dawp'); ?></h2>
          <p><?php esc_html_e('To be eligible for a return, your item must meet the following criteria:', 'dawp'); ?></p>
          <ul>
            <li><?php esc_html_e('Return Window: You must initiate your return request within 30 days of delivery.', 'dawp'); ?></li>
            <li><?php esc_html_e('Condition: Items must be unworn, unused, undamaged, and in their original, unaltered condition.', 'dawp'); ?></li>
            <li><?php esc_html_e('Packaging: Items must be returned with all original packaging, tags, labels, certificates, care cards, pouches, boxes, and any included accessories.', 'dawp'); ?></li>
            <li><?php esc_html_e('Restocking Fee: Free. We do not charge any restocking fees for eligible returns.', 'dawp'); ?></li>
          </ul>
        </section>

        <section id="return-costs" class="qb-policy-card">
          <h2><?php esc_html_e('Return Shipping Fees', 'dawp'); ?></h2>
          <p><?php esc_html_e('Who pays for return shipping depends on the reason for the return.', 'dawp'); ?></p>
          <div class="qb-split-grid">
            <div class="qb-info-panel">
              <h3><?php esc_html_e('Defective, Damaged, or Incorrect Products', 'dawp'); ?></h3>
              <p><?php esc_html_e('No cost to customer. We cover 100% of the return shipping costs or provide a prepaid shipping label if:', 'dawp'); ?></p>
              <ul>
                <li><?php esc_html_e('You received the wrong item.', 'dawp'); ?></li>
                <li><?php esc_html_e('The item arrived damaged due to the carrier.', 'dawp'); ?></li>
                <li><?php esc_html_e('The item is defective, missing essential parts, or not functioning as intended.', 'dawp'); ?></li>
              </ul>
              <p><?php esc_html_e('We may request photos or videos of the item and packaging to verify the issue and expedite your request.', 'dawp'); ?></p>
            </div>
            <div class="qb-info-panel qb-info-panel--soft">
              <h3><?php esc_html_e('Customer Remorse', 'dawp'); ?></h3>
              <p><?php esc_html_e('The customer is responsible for the return shipping cost if:', 'dawp'); ?></p>
              <ul>
                <li><?php esc_html_e('You ordered the wrong item, size, color, model, or compatibility.', 'dawp'); ?></li>
                <li><?php esc_html_e('The item does not fit or does not match your personal preference.', 'dawp'); ?></li>
                <li><?php esc_html_e('You simply no longer want the item.', 'dawp'); ?></li>
              </ul>
              <p><?php esc_html_e('The actual return shipping cost of the provided prepaid label will be deducted from your final refund amount. Original shipping costs are non-refundable.', 'dawp'); ?></p>
            </div>
          </div>
        </section>

        <section id="delivery-issues" class="qb-policy-card">
          <h2><?php esc_html_e('Common Delivery Issues', 'dawp'); ?></h2>
          <h3><?php esc_html_e('Damaged on Arrival', 'dawp'); ?></h3>
          <p><?php esc_html_e('If your order arrives damaged, please contact us within 30 days of delivery with photos of the item and the shipping packaging, including the shipping label. We will arrange a replacement or full refund at no cost to you.', 'dawp'); ?></p>

          <h3><?php esc_html_e('Lost Packages / Never Arrived', 'dawp'); ?></h3>
          <p><?php esc_html_e('If your tracking status shows no updates for an extended period, or is marked "Delivered" but you did not receive it, please contact us within 30 days of the recorded delivery date. We will investigate with the carrier and arrange a replacement or refund if the package is confirmed lost.', 'dawp'); ?></p>
        </section>

        <section id="how-to-return" class="qb-policy-card">
          <h2><?php esc_html_e('How to Return an Item', 'dawp'); ?></h2>
          <p><?php esc_html_e('Please follow our official 3-step process. Do not ship any item back without prior authorization, as unauthorized returns cannot be tracked or processed at our warehouse.', 'dawp'); ?></p>
          <div class="qb-step-list">
            <div class="qb-step">
              <h3><?php esc_html_e('Submit Your Return Request', 'dawp'); ?></h3>
              <p><?php esc_html_e('Email us or use our Contact Page within 30 days of delivery. Please provide your order number, the email used at checkout, the specific item(s) you wish to return, and the reason for the return with photos or videos if damaged.', 'dawp'); ?></p>
            </div>
            <div class="qb-step">
              <h3><?php esc_html_e('Receive Approval & Pack Your Item', 'dawp'); ?></h3>
              <p><?php esc_html_e('Our support team will review your request within 1-2 business days. Once approved, we will email you a Return Merchandise Authorization (RMA) number along with a prepaid shipping label.', 'dawp'); ?></p>
              <p><?php esc_html_e('Repack the item securely in its original packaging with all included accessories, tags, and boxes. Place it inside a sturdy outer shipping box.', 'dawp'); ?></p>
            </div>
            <div class="qb-step">
              <h3><?php esc_html_e('Ship It Back to Our Returns Center', 'dawp'); ?></h3>
              <p><?php esc_html_e('Print the prepaid shipping label, attach it to the outside of your shipping box, and drop it off at the designated carrier location.', 'dawp'); ?></p>
            </div>
          </div>
          <div class="qb-address-box">
            <strong><?php esc_html_e("Queen's Bracelet - Returns Department", 'dawp'); ?></strong>
            <span><?php esc_html_e('1777 Canal St, Merced, CA 95340', 'dawp'); ?></span>
          </div>
          <div class="qb-actions">
            <a class="qb-button" href="<?php echo esc_url($support_portal); ?>"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
            <a class="qb-button qb-button--secondary" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
          </div>
        </section>

        <section id="exchanges" class="qb-policy-card">
          <h2><?php esc_html_e('Exchanges', 'dawp'); ?></h2>
          <p><?php esc_html_e('We do not process direct one-for-one product exchanges. To get a different size, color, or model, please follow the return process above to send back your original purchase for a refund, and place a new order on our website simultaneously. This ensures your desired item does not sell out.', 'dawp'); ?></p>
        </section>

        <section id="refund-process" class="qb-policy-card">
          <h2><?php esc_html_e('Refund Process & Timing', 'dawp'); ?></h2>
          <ul>
            <li><?php esc_html_e('Inspection: Once your return package is received at our warehouse, we will inspect the item within 1-2 business days to ensure it meets our return criteria.', 'dawp'); ?></li>
            <li><?php esc_html_e('Approval & Timing: If approved, your refund will be processed automatically back to your original payment method within 7 business days.', 'dawp'); ?></li>
            <li><?php esc_html_e('Issues with Returns: If a return is approved but is found to be missing accessories, tags, boxes, or shows signs of wear, we reserve the right to refuse the refund and will offer to ship the item back to you at your expense.', 'dawp'); ?></li>
            <li><?php esc_html_e('Delayed Refunds: If you have not received your refund after 15 business days of approval, please check with your bank or credit card company first, then contact us.', 'dawp'); ?></li>
          </ul>
          <div class="qb-actions">
            <a class="qb-button qb-button--secondary" href="mailto:<?php echo esc_attr($support_email); ?>"><?php esc_html_e('Email Support', 'dawp'); ?></a>
          </div>
        </section>

        <section id="non-returnable" class="qb-policy-card">
          <h2><?php esc_html_e('Non-Returnable Items', 'dawp'); ?></h2>
          <p><?php esc_html_e('The following items are strictly non-returnable and final sale:', 'dawp'); ?></p>
          <ul>
            <li><?php esc_html_e('Items explicitly marked as "Final Sale" or "Non-Returnable" on the product page.', 'dawp'); ?></li>
            <li><?php esc_html_e('Gift cards or digital products/downloads.', 'dawp'); ?></li>
            <li><?php esc_html_e('Personalized, engraved, resized, or custom-made items.', 'dawp'); ?></li>
            <li><?php esc_html_e('Intimate apparel, swimwear, or hygiene-sensitive items such as earrings where the product seal has been broken.', 'dawp'); ?></li>
            <li><?php esc_html_e('Items that have been worn, washed, altered, or damaged after delivery.', 'dawp'); ?></li>
          </ul>
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
