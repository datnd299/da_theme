<?php
/**
 * Template Part: page-faq
 *
 * @package dawp
 */

$support_email = 'support@queens-bracelet.com';

$faq_sections = [
    [
        'id' => 'orders',
        'eyebrow' => __('Orders', 'dawp'),
        'title' => __('Order Questions', 'dawp'),
        'faqs' => [
            [
                'q' => __('How do I know my order was placed successfully?', 'dawp'),
                'a' => __('After checkout, you should receive an order confirmation email with your order details. If you do not see it, check your spam or promotions folder first, then contact support with the email used at checkout.', 'dawp'),
            ],
            [
                'q' => __('Can I change or cancel an order?', 'dawp'),
                'a' => __('Contact us as soon as possible. We cannot guarantee changes after an order enters processing or fulfillment, but our support team will review what is still possible.', 'dawp'),
            ],
            [
                'q' => __('Why has my order not shipped yet?', 'dawp'),
                'a' => __('Orders have a 5:00 PM Pacific Standard Time cutoff and a 1-3 business day handling time. Fulfillment takes place Monday-Friday.', 'dawp'),
            ],
        ],
    ],
    [
        'id' => 'shipping',
        'eyebrow' => __('Shipping', 'dawp'),
        'title' => __('Delivery & Tracking', 'dawp'),
        'faqs' => [
            [
                'q' => __('How long does shipping take?', 'dawp'),
                'a' => __('After processing is complete, standard U.S. transit time is 3-5 business days. Standard shipping is free on U.S. orders.', 'dawp'),
            ],
            [
                'q' => __('Will I receive tracking information?', 'dawp'),
                'a' => __('Yes. Tracking information is sent by email once your order ships. Please allow time for the carrier tracking page to update after the tracking number is created.', 'dawp'),
            ],
            [
                'q' => __('Do business days include weekends or holidays?', 'dawp'),
                'a' => __('No. Business days do not include weekends or public holidays. Orders are fulfilled Monday-Friday.', 'dawp'),
            ],
        ],
    ],
    [
        'id' => 'returns',
        'eyebrow' => __('Returns & Refunds', 'dawp'),
        'title' => __('Return Policy Questions', 'dawp'),
        'faqs' => [
            [
                'q' => __('What is your return window?', 'dawp'),
                'a' => __('Customers may request a return within 30 days from the delivery date. Returns are handled by mail, and customers must contact support first before sending any item back.', 'dawp'),
            ],
            [
                'q' => __('Do you charge a restocking fee?', 'dawp'),
                'a' => __('No. There is no restocking fee for eligible approved returns.', 'dawp'),
            ],
            [
                'q' => __('What items may not qualify for return?', 'dawp'),
                'a' => __('Items may be refused if they show wear, stains, odors, alteration, missing parts, damage, hygiene concerns, or missing original packaging where applicable.', 'dawp'),
            ],
            [
                'q' => __('How are refunds handled?', 'dawp'),
                'a' => __('Refunds are processed within 10 days after inspection approval and issued to the original payment method. Your payment provider may take additional time to post the funds.', 'dawp'),
            ],
        ],
    ],
    [
        'id' => 'products',
        'eyebrow' => __('Products & Sizing', 'dawp'),
        'title' => __('Bracelet Details', 'dawp'),
        'faqs' => [
            [
                'q' => __('How should I choose bracelet size?', 'dawp'),
                'a' => __('Review the bracelet length, adjustable information, clasp type, and product description before checkout. If you are unsure, contact support before placing an order.', 'dawp'),
            ],
            [
                'q' => __('Will colors and finishes match the photos exactly?', 'dawp'),
                'a' => __('We aim to display product colors and finishes clearly, but slight differences may occur due to screen settings, photography lighting, production updates, or inventory changes.', 'dawp'),
            ],
            [
                'q' => __('Do your bracelets make wellness or third-party brand claims?', 'dawp'),
                'a' => __('No. Queen\'s Bracelet sells fashion bracelets and giftable jewelry. We avoid unsupported third-party brand, premium-material, medical, wellness, and guaranteed benefit claims.', 'dawp'),
            ],
        ],
    ],
    [
        'id' => 'payments',
        'eyebrow' => __('Payments & Privacy', 'dawp'),
        'title' => __('Checkout Questions', 'dawp'),
        'faqs' => [
            [
                'q' => __('Is checkout secure?', 'dawp'),
                'a' => __('Checkout and payment information is handled through secure ecommerce systems. We use customer information to process orders, arrange shipping, send tracking, and provide support.', 'dawp'),
            ],
            [
                'q' => __('Do you sell customer personal information?', 'dawp'),
                'a' => __('No. We do not sell customer personal information to unrelated third parties. Necessary information may be shared with service providers that help operate payments, shipping, email, analytics, and support.', 'dawp'),
            ],
            [
                'q' => __('Can prices or availability change?', 'dawp'),
                'a' => __('Yes. Prices, promotions, and availability may change without notice. The final order total is shown at checkout before payment is completed.', 'dawp'),
            ],
        ],
    ],
    [
        'id' => 'support',
        'eyebrow' => __('Support', 'dawp'),
        'title' => __('Getting Help', 'dawp'),
        'faqs' => [
            [
                'q' => __('How can I contact Queen\'s Bracelet?', 'dawp'),
                'a' => __('Use the Contact Us page or email support@queens-bracelet.com. For order questions, include your order number and the email address used at checkout.', 'dawp'),
            ],
            [
                'q' => __('What should I do if I received a damaged or incorrect item?', 'dawp'),
                'a' => __('Contact us as soon as possible with your order number, checkout email, and clear photos of the product, packaging, and issue so support can review next steps.', 'dawp'),
            ],
            [
                'q' => __('When is support available?', 'dawp'),
                'a' => __('Business hours are Monday-Friday, 9:00 AM-6:00 PM EST. Response times may vary on weekends, holidays, or during high-volume periods.', 'dawp'),
            ],
        ],
    ],
];
?>

<style>
  .qb-page { --qb-blush:#ffb7c5; --qb-peach:#ffd6a5; --qb-mint:#cff5e7; --qb-gold:#d8a94e; --qb-plum:#2f1f35; --qb-gray:#f7f7fa; --qb-text:#4f4355; --qb-border:#eadfe8; background:#fff; color:var(--qb-text); font-family:"DM Sans","Inter",system-ui,sans-serif; }
  .qb-page * { box-sizing:border-box; }
  .qb-page a { text-decoration:none; }
  .qb-wrap { width:min(100% - 32px,1280px); margin-inline:auto; }
  .qb-section { padding:72px 0; }
  .qb-eyebrow { margin:0 0 12px; color:var(--qb-gold); font-size:12px; font-weight:800; letter-spacing:.18em; text-transform:uppercase; }
  .qb-title { margin:0; color:var(--qb-plum); font-family:Georgia,"Times New Roman",serif; font-size:clamp(34px,4.2vw,58px); line-height:1.04; letter-spacing:0; }
  .qb-copy { margin:18px 0 0; max-width:720px; color:var(--qb-text); font-size:17px; line-height:1.75; }
  .qb-actions { display:flex; flex-wrap:wrap; gap:14px; margin-top:30px; }
  .qb-button { display:inline-flex; min-height:48px; align-items:center; justify-content:center; border:1px solid var(--qb-plum); border-radius:999px; background:var(--qb-plum); color:#fff; padding:0 24px; font-size:14px; font-weight:800; transition:.2s ease; }
  .qb-button:hover { border-color:var(--qb-gold); background:var(--qb-gold); color:var(--qb-plum); }
  .qb-button--secondary { background:#fff; color:var(--qb-plum); }
  .qb-hero { overflow:hidden; background:linear-gradient(135deg,rgba(255,183,197,.35),rgba(255,214,165,.38) 48%,rgba(207,245,231,.4)),#fff; }
  .qb-hero__grid { display:grid; grid-template-columns:minmax(0,1.02fr) minmax(320px,.98fr); gap:48px; align-items:center; padding:78px 0; }
  .qb-panel, .qb-card, .qb-faq-section { border:1px solid var(--qb-border); border-radius:24px; background:#fff; box-shadow:0 18px 46px rgba(47,31,53,.08); }
  .qb-panel { padding:clamp(24px,4vw,44px); background:rgba(255,255,255,.86); }
  .qb-summary-grid { display:grid; grid-template-columns:repeat(4,minmax(0,1fr)); gap:18px; }
  .qb-card { padding:22px; }
  .qb-card b { display:inline-flex; width:42px; height:42px; align-items:center; justify-content:center; border-radius:999px; background:#fff4f6; color:var(--qb-plum); font-size:13px; }
  .qb-card h3, .qb-faq-section h2, .qb-mini-card strong { margin:18px 0 0; color:var(--qb-plum); }
  .qb-card p, .qb-mini-card p, .qb-answer p { color:#675a6c; font-size:14px; line-height:1.65; }
  .qb-soft { background:var(--qb-gray); }
  .qb-content-grid { display:grid; grid-template-columns:.82fr 1.18fr; gap:34px; align-items:start; }
  .qb-sidebar { position:sticky; top:120px; display:grid; gap:16px; }
  .qb-dark-card { border-radius:24px; background:var(--qb-plum); padding:28px; color:#fff; }
  .qb-dark-card .qb-eyebrow { color:var(--qb-peach); }
  .qb-dark-card h2, .qb-dark-card p, .qb-dark-card a { color:#fff; }
  .qb-dark-card p { color:rgba(255,255,255,.78); font-size:15px; line-height:1.7; }
  .qb-side-nav { display:grid; gap:10px; margin-top:22px; }
  .qb-side-nav a { border:1px solid rgba(255,255,255,.15); border-radius:999px; padding:10px 14px; color:#fff; font-size:13px; font-weight:800; }
  .qb-faq-stack { display:grid; gap:22px; }
  .qb-faq-section { padding:clamp(24px,4vw,40px); }
  .qb-faq-section:nth-child(even) { background:#fffafc; }
  .qb-faq-section h2 { font-size:clamp(25px,3vw,38px); line-height:1.12; font-family:Georgia,"Times New Roman",serif; }
  .qb-accordion { overflow:hidden; margin-top:24px; border:1px solid var(--qb-border); border-radius:18px; background:#fff; }
  .qb-faq-item + .qb-faq-item { border-top:1px solid var(--qb-border); }
  .qb-faq-toggle { display:flex; width:100%; align-items:center; justify-content:space-between; gap:18px; border:0; background:#fff; padding:18px; color:var(--qb-plum); text-align:left; font:inherit; font-weight:800; cursor:pointer; }
  .qb-faq-toggle:hover { background:#fff8fa; }
  .qb-faq-toggle span:first-child { line-height:1.35; }
  .qb-faq-icon { display:inline-flex; width:34px; height:34px; flex:0 0 34px; align-items:center; justify-content:center; border-radius:999px; background:var(--qb-plum); color:#fff; font-weight:800; }
  .qb-answer { display:none; padding:0 18px 20px; }
  .qb-faq-toggle[aria-expanded="true"] .qb-faq-icon { background:var(--qb-gold); color:var(--qb-plum); }
  .qb-mini-grid { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:14px; margin-top:22px; }
  .qb-mini-card { border:1px solid var(--qb-border); border-radius:18px; background:#fff; padding:18px; }
  .qb-plum { background:var(--qb-plum); color:#fff; }
  .qb-plum .qb-title, .qb-plum .qb-copy { color:#fff; }
  .qb-policy-links { display:flex; flex-wrap:wrap; gap:10px; margin-top:28px; }
  .qb-policy-links a { border:1px solid rgba(255,255,255,.22); border-radius:999px; background:rgba(255,255,255,.1); padding:10px 14px; color:#fff; font-size:13px; font-weight:800; }
  @media (max-width:1080px) { .qb-summary-grid { grid-template-columns:repeat(2,minmax(0,1fr)); } }
  @media (max-width:780px) { .qb-section { padding:56px 0; } .qb-hero__grid, .qb-content-grid, .qb-summary-grid, .qb-mini-grid { grid-template-columns:1fr; } .qb-hero__grid { padding:58px 0; } .qb-sidebar { position:static; } .qb-actions { flex-direction:column; } .qb-button { width:100%; } }
</style>

<div class="qb-page qb-faq">
  <section class="qb-hero">
    <div class="qb-wrap qb-hero__grid">
      <div>
        <p class="qb-eyebrow"><?php esc_html_e('FAQ', 'dawp'); ?></p>
        <h1 class="qb-title"><?php esc_html_e('Answers for bracelet orders and store policies.', 'dawp'); ?></h1>
        <p class="qb-copy"><?php esc_html_e('Find clear answers about ordering, shipping, tracking, returns, refunds, bracelet sizing, product details, payments, privacy, and support at Queen\'s Bracelet.', 'dawp'); ?></p>
        <div class="qb-actions">
          <a class="qb-button" href="<?php echo esc_url(home_url('/shipping-returns/')); ?>"><?php esc_html_e('Shipping & Returns', 'dawp'); ?></a>
          <a class="qb-button qb-button--secondary" href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
        </div>
      </div>
      <div class="qb-panel">
        <p class="qb-eyebrow"><?php esc_html_e('Quick Policy Facts', 'dawp'); ?></p>
        <div class="qb-mini-grid">
          <div class="qb-mini-card"><strong><?php esc_html_e('Handling', 'dawp'); ?></strong><p><?php esc_html_e('1-3 business days, Monday-Friday.', 'dawp'); ?></p></div>
          <div class="qb-mini-card"><strong><?php esc_html_e('U.S. Transit', 'dawp'); ?></strong><p><?php esc_html_e('3-5 business days after processing.', 'dawp'); ?></p></div>
          <div class="qb-mini-card"><strong><?php esc_html_e('Returns', 'dawp'); ?></strong><p><?php esc_html_e('30 days from delivery date by mail. Contact support first.', 'dawp'); ?></p></div>
          <div class="qb-mini-card"><strong><?php esc_html_e('Refunds', 'dawp'); ?></strong><p><?php esc_html_e('10 days after inspection approval. No restocking fee.', 'dawp'); ?></p></div>
        </div>
      </div>
    </div>
  </section>

  <section class="qb-section">
    <div class="qb-wrap qb-summary-grid">
      <div class="qb-card"><b>01</b><h3><?php esc_html_e('Orders', 'dawp'); ?></h3><p><?php esc_html_e('Order confirmation, processing, changes, and cancellation questions.', 'dawp'); ?></p></div>
      <div class="qb-card"><b>02</b><h3><?php esc_html_e('Shipping', 'dawp'); ?></h3><p><?php esc_html_e('5:00 PM PST cutoff, 1-3 business day handling, free U.S. shipping, and 3-5 business day transit.', 'dawp'); ?></p></div>
      <div class="qb-card"><b>03</b><h3><?php esc_html_e('Returns', 'dawp'); ?></h3><p><?php esc_html_e('30-day return window, mail returns, no restocking fee, and 10-day refund timing after approval.', 'dawp'); ?></p></div>
      <div class="qb-card"><b>04</b><h3><?php esc_html_e('Products', 'dawp'); ?></h3><p><?php esc_html_e('Bracelet sizing, material notes, finishes, care details, and safe product claims.', 'dawp'); ?></p></div>
    </div>
  </section>

  <section class="qb-section qb-soft">
    <div class="qb-wrap qb-content-grid">
      <aside class="qb-sidebar">
        <div class="qb-dark-card">
          <p class="qb-eyebrow"><?php esc_html_e('FAQ Categories', 'dawp'); ?></p>
          <h2 class="qb-title" style="font-size:clamp(28px,3vw,42px);"><?php esc_html_e('Find answers faster.', 'dawp'); ?></h2>
          <p><?php esc_html_e('These answers match our Shipping & Returns, Privacy Policy, and Terms & Conditions pages.', 'dawp'); ?></p>
          <nav class="qb-side-nav" aria-label="<?php esc_attr_e('FAQ categories', 'dawp'); ?>">
            <?php foreach ($faq_sections as $section) : ?>
              <a href="#<?php echo esc_attr($section['id']); ?>"><?php echo esc_html($section['eyebrow']); ?></a>
            <?php endforeach; ?>
          </nav>
        </div>
      </aside>

      <div class="qb-faq-stack">
        <?php foreach ($faq_sections as $section) : ?>
          <section id="<?php echo esc_attr($section['id']); ?>" class="qb-faq-section">
            <p class="qb-eyebrow"><?php echo esc_html($section['eyebrow']); ?></p>
            <h2><?php echo esc_html($section['title']); ?></h2>
            <div class="qb-accordion">
              <?php foreach ($section['faqs'] as $faq) : ?>
                <div class="qb-faq-item">
                  <button type="button" class="qb-faq-toggle" aria-expanded="false">
                    <span><?php echo esc_html($faq['q']); ?></span>
                    <span class="qb-faq-icon" aria-hidden="true">+</span>
                  </button>
                  <div class="qb-answer">
                    <p><?php echo esc_html($faq['a']); ?></p>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </section>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="qb-section qb-plum">
    <div class="qb-wrap">
      <p class="qb-eyebrow"><?php esc_html_e('Still Need Help?', 'dawp'); ?></p>
      <h2 class="qb-title"><?php esc_html_e('Support is available for policy and order questions.', 'dawp'); ?></h2>
      <p class="qb-copy"><?php esc_html_e('For order-related messages, include your order number and the email address used at checkout. Business hours are Monday-Friday, 9:00 AM-6:00 PM EST.', 'dawp'); ?></p>
      <div class="qb-actions">
        <a class="qb-button" href="mailto:<?php echo esc_attr($support_email); ?>"><?php esc_html_e('Email Support', 'dawp'); ?></a>
        <a class="qb-button qb-button--secondary" href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
      </div>
      <nav class="qb-policy-links" aria-label="<?php esc_attr_e('Related policy links', 'dawp'); ?>">
        <a href="<?php echo esc_url(home_url('/shipping-returns/')); ?>"><?php esc_html_e('Shipping & Returns', 'dawp'); ?></a>
        <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>"><?php esc_html_e('Privacy Policy', 'dawp'); ?></a>
        <a href="<?php echo esc_url(home_url('/terms-conditions/')); ?>"><?php esc_html_e('Terms & Conditions', 'dawp'); ?></a>
        <a href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a>
      </nav>
    </div>
  </section>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.qb-faq-toggle').forEach(function (toggle) {
    toggle.addEventListener('click', function () {
      var expanded = toggle.getAttribute('aria-expanded') === 'true';
      var answer = toggle.parentElement.querySelector('.qb-answer');
      var icon = toggle.querySelector('.qb-faq-icon');

      toggle.setAttribute('aria-expanded', expanded ? 'false' : 'true');
      if (answer) {
        answer.style.display = expanded ? 'none' : 'block';
      }
      if (icon) {
        icon.textContent = expanded ? '+' : '-';
      }
    });
  });
});
</script>
