<?php
/**
 * Refund & Return Policy - Veterangift
 * Style aligned with homepage. Content preserved from git original.
 */
$store_address = function_exists('dawp_get_woocommerce_store_address') ? dawp_get_woocommerce_store_address() : '';
$store_address = $store_address ?: __('United States', 'dawp');
$support_phone = function_exists('dawp_get_support_phone') ? dawp_get_support_phone() : '901-675-3151';

$sgs_rr_hero_bg = sprintf(
  "--sgs-rr-hero-bg:url('%s');--sgs-rr-hero-bg-mobile:url('%s')",
  esc_url(dawp_theme_cdn_image_url('assets/img/hero/track-order-cover-v2.png', 1600, 760)),
  esc_url(dawp_theme_cdn_image_url('assets/img/hero/track-order-cover-v2.png', 720, 520))
);
get_header(); ?>
<section class="sgs-home sgs-page">
<style>
.sgs-rr-hero{background:linear-gradient(90deg,rgba(11,31,58,.96) 0%,rgba(11,31,58,.84) 42%,rgba(11,31,58,.58) 100%),var(--sgs-rr-hero-bg) center right/cover no-repeat,var(--navy);color:var(--white);padding:clamp(60px,8vw,100px) clamp(24px,4vw,64px);text-align:center}
.sgs-rr-hero__inner{max-width:680px;margin:0 auto}
.sgs-rr-hero h1{margin:0;font-family:var(--font-heading);font-size:clamp(2rem,4.5vw,3.5rem);font-weight:800;letter-spacing:-.02em;line-height:1.05;color:var(--white)}
.sgs-rr-hero p{max-width:640px;margin:18px auto 0;color:rgba(255,255,255,.82);font-size:clamp(.95rem,1.3vw,1.1rem);line-height:1.7}
.sgs-rr-section{width:min(100% - 48px,1200px);margin:0 auto;padding:var(--section-gap,72px) 0}
.sgs-rr-section--surface{width:100%;max-width:none;padding-inline:clamp(24px,4vw,64px);background:var(--antique)}
.sgs-rr-panel{border:1px solid var(--line);border-radius:var(--radius);background:var(--white);padding:clamp(24px,3vw,36px);margin-bottom:16px;transition:box-shadow 180ms}
.sgs-rr-panel:hover{box-shadow:var(--shadow-sm)}
.sgs-rr-panel--soft{background:#fafafa}
.sgs-rr-panel h2{margin:0 0 12px;font-family:var(--font-heading);font-size:clamp(1.2rem,2vw,1.5rem);font-weight:700;color:var(--ink);line-height:1.1}
.sgs-rr-panel p{margin:12px 0 0;color:var(--muted);font-size:.92rem;line-height:1.7}
.sgs-rr-panel p:first-of-type{margin-top:0}
.sgs-rr-panel strong{color:var(--ink)}
.sgs-rr-highlight{background:var(--gold);color:var(--navy);font-weight:700;padding:2px 8px;border-radius:4px;display:inline-block}
.sgs-rr-note{border-left:4px solid var(--red);border-radius:0 var(--radius) var(--radius) 0;background:#fff0f0;padding:18px 20px;margin-top:16px;color:var(--muted);font-size:.9rem;line-height:1.65}
.sgs-rr-list{margin:14px 0 0;padding-left:20px;color:var(--muted);font-size:.92rem;line-height:1.75}
.sgs-rr-list li{margin:6px 0}
.sgs-rr-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:14px;margin-top:16px}
.sgs-rr-grid--3{display:grid;grid-template-columns:repeat(2,1fr);gap:14px;margin-top:16px}
.sgs-rr-card{border:1px solid var(--line);border-radius:var(--radius);background:var(--white);padding:20px;transition:box-shadow 180ms,transform 180ms}
.sgs-rr-card:hover{box-shadow:var(--shadow-sm);transform:translateY(-3px)}
.sgs-rr-card h3{margin:0 0 8px;font-family:var(--font-heading);font-size:.95rem;font-weight:700;color:var(--ink);line-height:1.25}
.sgs-rr-card p{margin:0;color:var(--muted);font-size:.85rem;line-height:1.5}
.sgs-rr-card p + p{margin-top:10px}
.sgs-rr-step{display:flex;gap:14px;border:1px solid var(--line);border-radius:var(--radius);background:var(--white);padding:20px;margin-bottom:12px;transition:box-shadow 180ms}
.sgs-rr-step:hover{box-shadow:var(--shadow-sm)}
.sgs-rr-step__num{display:flex;width:32px;height:32px;flex:0 0 auto;align-items:center;justify-content:center;border-radius:50%;background:var(--red);color:var(--white);font-size:.85rem;font-weight:800}
.sgs-rr-step__body h3{margin:0;font-family:var(--font-heading);font-size:.95rem;font-weight:700;color:var(--ink);line-height:1.2}
.sgs-rr-step__body p{margin:8px 0 0;color:var(--muted);font-size:.85rem;line-height:1.55}
.sgs-rr-step__body p + p{margin-top:8px}
.sgs-rr-actions{display:flex;flex-wrap:wrap;gap:12px;margin-top:20px}
.sgs-rr-contact{border:1px solid var(--line);border-radius:var(--radius);background:var(--white);display:grid;grid-template-columns:repeat(3,1fr);gap:0;padding:20px;margin-top:16px}
.sgs-rr-contact__item{text-align:center;padding:22px 18px;border-right:1px solid var(--line);border-bottom:1px solid var(--line)}
.sgs-rr-contact__item:nth-child(3n){border-right:0}
.sgs-rr-contact__item:nth-last-child(-n+2){border-bottom:0}
.sgs-rr-contact__item strong{display:block;margin-bottom:4px;font-family:var(--font-heading);font-size:.85rem;font-weight:700;color:var(--ink)}
.sgs-rr-contact__item span,.sgs-rr-contact__item a{color:var(--muted);font-size:.85rem}
.sgs-rr-contact__item a{color:var(--red);text-decoration:underline;text-underline-offset:2px}
.sgs-rr-note--gold{border-left:4px solid var(--gold);border-radius:0 var(--radius) var(--radius) 0;background:#fff7e8;padding:18px 20px;margin-top:16px;color:var(--muted);font-size:.9rem;line-height:1.65}
@media(max-width:960px){.sgs-rr-grid{grid-template-columns:1fr}.sgs-rr-grid--3{grid-template-columns:1fr}.sgs-rr-contact{grid-template-columns:repeat(2,1fr)}.sgs-rr-contact__item:nth-child(3n){border-right:1px solid var(--line)}.sgs-rr-contact__item:nth-last-child(-n+2){border-bottom:1px solid var(--line)}.sgs-rr-contact__item:nth-child(2n){border-right:0}.sgs-rr-contact__item:last-child{border-bottom:0}}
@media(max-width:700px){.sgs-rr-contact{grid-template-columns:1fr}.sgs-rr-contact__item{border-right:0}.sgs-rr-contact__item:nth-child(3n),.sgs-rr-contact__item:nth-child(2n){border-right:0}.sgs-rr-contact__item:last-child{border-bottom:0}.sgs-rr-actions .sgs-btn{width:100%}}
@media(max-width:640px){.sgs-rr-hero{background-image:linear-gradient(180deg,rgba(11,31,58,.76) 0%,rgba(11,31,58,.96) 100%),var(--sgs-rr-hero-bg-mobile,var(--sgs-rr-hero-bg))}}
</style>

<div class="sgs-rr-hero" style="<?php echo esc_attr($sgs_rr_hero_bg); ?>">
  <div class="sgs-rr-hero__inner">
    <p class="sgs-eyebrow sgs-eyebrow--light">Customer Care</p>
    <h1>Refund &amp; Return Policy</h1>
    <p class="sgs-rr-hero__meta" style="margin-top:14px;color:var(--gold);font-family:var(--font-heading);font-size:.85rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase">Last Updated: July 5 2026</p>
    <p>We want every Veterangift piece to feel just right for you and your loved ones. Please review the return requirements below before sending any patriotic apparel, accessories, or custom gift item back to us.</p>
  </div>
</div>

<div class="sgs-rr-section">
  <!-- Return Eligibility -->
  <div class="sgs-rr-panel">
    <h2>Return Eligibility</h2>
    <p>To be eligible for a return, your item must meet the following criteria:</p>
    <ul class="sgs-rr-list">
      <li><strong>Return Window:</strong> You must initiate your return request within 30 days of delivery.</li>
      <li><strong>Condition:</strong> Items must be unworn, unused, undamaged, and in their original, unaltered condition.</li>
      <li><strong>Packaging:</strong> Items must be returned with all original packaging, tags, labels, care cards, garment bags, boxes, and any included accessories.</li>
      <li><strong>Restocking Fee:</strong> Free. We do not charge any restocking fees for eligible returns.</li>
    </ul>
  </div>

  <!-- Return Shipping Fees -->
  <div class="sgs-rr-panel sgs-rr-panel--soft">
    <h2>Return Shipping Fees</h2>
    <div class="sgs-rr-grid">
      <div class="sgs-rr-card">
        <h3>Defective, Damaged, or Incorrect Products (Wrong item, carrier damage, or defective):</h3>
        <p>No cost to customer. Since the issue is on us, we cover 100% of the return shipping cost and will provide a prepaid shipping label via email.</p>
      </div>
      <div class="sgs-rr-card">
        <h3>Customer Remorse (Ordered wrong item/size/color, changed mind, or doesn't fit):</h3>
        <p>A flat return shipping fee of $4.99 applies. This fee will be deducted from your refund amount.</p>
      </div>
    </div>
    <p style="margin-top:12px">We do not charge a restocking fee. Original shipping costs, if any, are non-refundable.</p>
  </div>

  <!-- Common Delivery Issues -->
  <div class="sgs-rr-panel">
    <h2>Common Delivery Issues</h2>
    <div style="margin-top:14px;display:grid;gap:16px">
      <div class="sgs-rr-card">
        <h3>Damaged on Arrival</h3>
        <p>If your order arrives damaged, please contact us within 30 days of delivery with photos of the item and the shipping packaging, including the shipping label. We will arrange a replacement or full refund at no cost to you.</p>
      </div>
      <div class="sgs-rr-card">
        <h3>Lost Packages / Never Arrived</h3>
        <p>If your tracking status shows no updates for an extended period, or is marked "Delivered" but you did not receive it, please contact us within 30 days of the recorded delivery date. We will investigate with the carrier and arrange a replacement or refund if the package is confirmed lost.</p>
      </div>
    </div>
  </div>

  <!-- How to Return an Item - 3 Step -->
  <div class="sgs-rr-panel sgs-rr-panel--soft">
    <h2>How to Return an Item</h2>
    <p>Please follow our official 3-step process. Do not ship any item back without prior authorization, as unauthorized returns cannot be tracked or processed at our warehouse.</p>

    <div style="margin-top:18px">
      <div class="sgs-rr-step">
        <span class="sgs-rr-step__num">1</span>
        <div class="sgs-rr-step__body">
          <h3>Submit Your Return Request</h3>
          <p>Email us or use our Contact Page within 30 days of delivery. Please provide your order number, the email used at checkout, the specific item(s) you wish to return, and the reason for the return with photos or videos if damaged.</p>
        </div>
      </div>
      <div class="sgs-rr-step">
        <span class="sgs-rr-step__num">2</span>
        <div class="sgs-rr-step__body">
          <h3>Receive Approval &amp; Pack Your Item</h3>
          <p>Our support team will review your request within 1-2 business days. Once approved, we will email you a Return Merchandise Authorization (RMA) number along with a prepaid shipping label.</p>
          <p>Repack the item securely in its original packaging with all included accessories, tags, and boxes. Place it inside a sturdy outer shipping box.</p>
        </div>
      </div>
      <div class="sgs-rr-step">
        <span class="sgs-rr-step__num">3</span>
        <div class="sgs-rr-step__body">
          <h3>Ship It Back to Our Returns Center</h3>
          <p>Attach the prepaid shipping label to the outer box. Drop off the package at the designated carrier location — we recommend requesting a receipt as proof of drop-off. Once received, we inspect and process your refund within 1-2 business days.</p>
        </div>
      </div>
    </div>

    <div class="sgs-rr-note"><strong>Do not ship any item back without first receiving return authorization from our team.</strong> Unauthorized returns may be refused or delayed.</div>
    <div class="sgs-rr-actions">
      <a class="sgs-btn sgs-btn--primary" href="/contact-us/">Contact Us</a>
    </div>
  </div>

  <!-- Return Window & Non-Returnable -->
  <div class="sgs-rr-panel">
    <h2>Return Window</h2>
    <p>Eligible return requests must be initiated within 30 days of the delivery date. We are unable to accept returns after this 30-day period has expired.</p>
  </div>

  <div class="sgs-rr-panel sgs-rr-panel--soft">
    <h2>Non-Returnable Items</h2>
    <p>The following items are <strong>not eligible</strong> for return or refund:</p>
    <ul class="sgs-rr-list">
      <li>Personalized and custom-made items (unless defective, damaged, or incorrect)</li>
      <li>Gift cards</li>
      <li>Digital products or downloadable content</li>
      <li>Final sale or clearance items (marked as such at checkout)</li>
      <li>Hygiene-sensitive items with broken or missing seals</li>
      <li>Items worn, washed, altered, or damaged after delivery</li>
    </ul>
  </div>

  <!-- Return Method & Exchanges -->
  <div class="sgs-rr-panel sgs-rr-panel--soft">
    <h2>Return Method &amp; Exchanges</h2>
    <p><strong>Return Method:</strong> All returns are processed <strong>by mail</strong> using an authorized shipping label. Items returned without prior authorization or sent directly to our business address without a Return Merchandise Authorization (RMA) number will not be accepted.</p>
    <p style="margin-top:12px"><strong>Exchanges:</strong> We do not offer direct one-to-one exchanges. If you need a different size, color, or item, please return your eligible item for a refund and place a new order on our website at your convenience.</p>
  </div>

  <!-- Refund Timing -->
  <div class="sgs-rr-panel">
    <h2>Refund Timing &amp; Processing</h2>
    <p>Once your return package is received at our facility, we inspect the item within <strong>1-2 business days</strong>. If the return is approved, the refund will be issued to your <strong>original payment method</strong> within <strong>7 business days</strong>. Depending on your bank or card issuer, it may take additional time for the refund to appear in your account. If you have not received a refund after <strong>15 business days</strong> of approval, please contact us after checking with your bank or payment provider.</p>
  </div>

  <!-- Personalized Items -->
  <div class="sgs-rr-panel sgs-rr-panel--soft">
    <h2>Refunds on Personalized Items</h2>
    <p>Personalized and custom-made items are produced specifically for you based on the personalization details you provide at checkout. These items are <strong>not eligible for return or refund</strong> unless they arrive defective, damaged, or with an error made by Veterangift (e.g., incorrect personalization due to our production error, not a typo or mistake in the details you submitted). Please review all personalization details carefully before placing your order.</p>
  </div>

  <!-- Contact Info -->
  <div class="sgs-rr-panel">
    <h2>Contact Information</h2>
    <p>For all return and refund inquiries, please contact us:</p>
    <div class="sgs-rr-contact">
      <div class="sgs-rr-contact__item">
        <strong>Store Name</strong>
        <span>Veterangift</span>
      </div>
      <div class="sgs-rr-contact__item">
        <strong>Customer Support Email</strong>
        <a href="mailto:support@veterangift.com">support@veterangift.com</a>
      </div>
      <div class="sgs-rr-contact__item">
        <strong>Customer Support Phone</strong>
        <a href="tel:<?php echo esc_attr($support_phone); ?>"><?php echo esc_html($support_phone); ?></a>
      </div>
      <div class="sgs-rr-contact__item">
        <strong>Address</strong>
        <span><?php echo esc_html($store_address); ?></span>
      </div>
      <div class="sgs-rr-contact__item">
        <strong>Customer Service Hours</strong>
        <span>Monday - Friday, 10:00 AM - 6:00 PM PST</span>
      </div>
      <div class="sgs-rr-contact__item">
        <strong>Response Time</strong>
        <span>Within 24 business hours.</span>
      </div>
      <div class="sgs-rr-contact__item">
        <strong>Return Address</strong>
        <span>Provided with return authorization.</span>
      </div>
    </div>
  </div>
</div>

</section>
<?php get_footer(); ?>
