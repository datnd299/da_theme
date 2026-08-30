<?php
/**
 * Template Part: page-faq
 *
 * @package dawp
 */

$store_name        = function_exists('dawp_brand_name') ? dawp_brand_name() : 'Velmo Custom';
$support_email     = function_exists('dawp_contact_support_email') ? dawp_contact_support_email() : 'support@velmocustom.com';
$support_mailto    = function_exists('dawp_contact_mailto_url') ? dawp_contact_mailto_url(__('Velmo Custom support question', 'dawp'), __('Please include your order number and checkout email if this is about an existing order.', 'dawp')) : 'mailto:' . $support_email;
$store_address     = function_exists('dawp_get_store_address_line') ? dawp_get_store_address_line() : '';
$support_portal    = home_url('/contact-us/');
$shipping_policy   = home_url('/shipping-policy/');
$return_policy     = home_url('/return-refund-policy/');
$track_order_page   = home_url('/track-order/');

$faq_sections = [
    [
        'id' => 'orders',
        'eyebrow' => __('Orders', 'dawp'),
        'title' => __('Order Questions', 'dawp'),
        'faqs' => [
            [
                'q' => __('How do I know my order was placed successfully?', 'dawp'),
                'a' => __('After checkout, you should receive an order confirmation email with your order details. If you do not see it, check your spam or promotions folder first, then contact support with the email address used at checkout.', 'dawp'),
            ],
            [
                'q' => __('Can I change an order after checkout?', 'dawp'),
                'a' => __('Contact us as soon as possible if you need to update order details. Orders placed before 5:00 PM PST begin processing the same business day, while orders placed after 5:00 PM PST or over the weekend begin processing the next business day. We cannot guarantee changes after an order enters processing or fulfillment, but our support team will review what is still possible.', 'dawp'),
            ],
            [
                'q' => __('Can I cancel my order after placing it?', 'dawp'),
                'a' => __('Please contact support as soon as possible if you need to cancel. If the order has already entered fulfillment, been processed for shipment, or shipped, cancellation may no longer be available. After delivery, eligible items may be returned according to our Return & Refund Policy.', 'dawp'),
            ],
            [
                'q' => __('Why has my order not shipped yet?', 'dawp'),
                'a' => __('Orders have a 5:00 PM PST cutoff and a 1-3 business day handling time. Fulfillment takes place Monday-Friday, excluding weekends and official U.S. public holidays. Some intricate, high-demand, or separately packed watch items may require additional processing time.', 'dawp'),
            ],
        ],
    ],
    [
        'id' => 'shipping',
        'eyebrow' => __('Shipping', 'dawp'),
        'title' => __('Delivery & Tracking', 'dawp'),
        'faqs' => [
            [
                'q' => __('Where do you ship?', 'dawp'),
                'a' => __('We currently ship exclusively within the United States domestic market. If a product, destination, or carrier limitation prevents delivery to your specific address, checkout will notify you before payment is processed.', 'dawp'),
            ],
            [
                'q' => __('How much does standard shipping cost?', 'dawp'),
                'a' => __('Standard U.S. shipping is free nationwide for every order with no minimum purchase requirement. If expedited or assisted shipping is available for your destination, the exact cost will be shown clearly at checkout before payment.', 'dawp'),
            ],
            [
                'q' => __('How long does shipping take?', 'dawp'),
                'a' => __('Order handling usually takes 1-3 business days and transit usually takes 5-7 business days, for a total estimated delivery time of 6-10 business days. Business days do not include weekends or official U.S. public holidays.', 'dawp'),
            ],
            [
                'q' => __('Will I receive tracking information?', 'dawp'),
                'a' => __('Yes. Once your order is dispatched, we send a shipping confirmation email with a direct tracking link and courier details to the email address used at checkout. Orders may ship with USPS, UPS, FedEx, or DHL depending on the final carrier selected at fulfillment.', 'dawp'),
            ],
            [
                'q' => __('Do multi-item orders ship together?', 'dawp'),
                'a' => __('Some multi-item watch orders may ship separately when items are prepared from different fulfillment batches or require distinct specialized packing methods. If that happens, you will receive separate tracking numbers at no additional cost.', 'dawp'),
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
                'a' => __('You may initiate a return request within 30 days of delivery. Please contact support before sending anything back because unauthorized returns cannot be tracked or processed at our warehouse.', 'dawp'),
            ],
            [
                'q' => __('What condition must a return be in?', 'dawp'),
                'a' => __('Eligible returns must be unworn, unused, undamaged, and in original, unaltered condition with all original packaging, tags, labels, certificates, care cards, pouches, boxes, and included accessories.', 'dawp'),
            ],
            [
                'q' => __('Do you charge a restocking fee?', 'dawp'),
                'a' => __('No. We do not charge restocking fees for eligible approved returns.', 'dawp'),
            ],
            [
                'q' => __('Who pays return shipping?', 'dawp'),
                'a' => __('We cover 100% of return shipping costs or provide a prepaid shipping label when the item is defective, damaged, incorrect, missing essential parts, or not functioning as intended. For customer remorse returns, such as wrong item, size, color, model, fit preference, or no longer wanting the item, the customer is responsible for return shipping, and the actual return label cost may be deducted from the final refund amount.', 'dawp'),
            ],
            [
                'q' => __('How are refunds handled?', 'dawp'),
                'a' => __('After your return package is received at our warehouse, we inspect the item within 1-2 business days. If approved, the refund is processed automatically back to the original payment method within 7 business days. If you have not received your refund after 15 business days from approval, please check with your bank or card provider first, then contact us.', 'dawp'),
            ],
        ],
    ],
    [
        'id' => 'delivery-issues',
        'eyebrow' => __('Delivery Issues', 'dawp'),
        'title' => __('Damaged, Delayed, or Missing Packages', 'dawp'),
        'faqs' => [
            [
                'q' => __('What should I do if my order arrived damaged?', 'dawp'),
                'a' => __('Contact us within 30 days of delivery with your order number, checkout email, and clear photos of the item and shipping packaging, including the shipping label. We will review the issue and arrange a replacement or full refund at no cost to you when approved.', 'dawp'),
            ],
            [
                'q' => __('What if tracking says delivered but I did not receive the package?', 'dawp'),
                'a' => __('Please contact support within 30 days of the recorded delivery date with your order number, checkout email, and confirmed delivery address. We will investigate with the carrier and arrange a replacement or refund if the package is confirmed lost.', 'dawp'),
            ],
            [
                'q' => __('What if tracking has stopped updating?', 'dawp'),
                'a' => __('If tracking has not updated for an extended period or your delivery is delayed beyond the estimated 6-10 business day delivery window, contact support so we can review the shipment and open an investigation with the carrier. Please include your order number, checkout email, confirmed delivery address, and photos of the outer packaging if the shipment arrived damaged.', 'dawp'),
            ],
        ],
    ],
    [
        'id' => 'products',
        'eyebrow' => __('Products & Fit', 'dawp'),
        'title' => __('Watch Details', 'dawp'),
        'faqs' => [
            [
                'q' => __('How should I choose watch or strap size?', 'dawp'),
                'a' => __('Review the case size, strap size, adjustment details, clasp type, and product description before checkout. If you are unsure, contact support before placing an order.', 'dawp'),
            ],
            [
                'q' => __('Will colors and finishes match the photos exactly?', 'dawp'),
                'a' => __('We aim to display product colors and finishes clearly, but slight differences may occur due to screen settings, photography lighting, production updates, or inventory changes.', 'dawp'),
            ],
            [
                'q' => __('Do your watches make unsupported brand or performance claims?', 'dawp'),
                'a' => sprintf(
                    __('No. %s sells watches and watch accessories. We avoid unsupported third-party brand, premium-material, medical, wellness, investment, and guaranteed performance claims.', 'dawp'),
                    $store_name
                ),
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
];
?>

<style>
  .qb-page { --qb-ink:#10243A; --qb-moss:#5F6668; --qb-olive:#A5A5A0; --qb-paper:#FFFFFF; --qb-pearl:#F5F4F1; --qb-stone:#D8D4CB; --qb-line:#D8D4CB; --qb-brass:#D1AE68; --qb-brass-soft:#D1AE68; background:var(--qb-paper); color:var(--qb-moss); font-family:"Inter","DM Sans",system-ui,sans-serif; }
  .qb-page * { box-sizing:border-box; }
  .qb-page a { color:inherit; text-decoration:none; }
  .qb-wrap { width:min(100% - 32px,1160px); margin-inline:auto; }
  .qb-section { padding:68px 0; }
  .qb-eyebrow { margin:0 0 12px; color:var(--qb-brass); font-size:12px; font-weight:800; letter-spacing:.16em; text-transform:uppercase; }
  .qb-title { margin:0; color:var(--qb-ink); font-family:Georgia,"Times New Roman",serif; font-size:clamp(36px,5vw,64px); line-height:1.04; letter-spacing:0; }
  .qb-updated { margin:16px 0 0; color:var(--qb-ink); font-size:14px; font-weight:800; line-height:1.4; }
  .qb-copy { margin:18px 0 0; max-width:780px; color:var(--qb-moss); font-size:17px; line-height:1.75; }
  .qb-button { display:inline-flex; min-height:48px; align-items:center; justify-content:center; border:1px solid var(--qb-ink); border-radius:2px; background:var(--qb-ink); color:#fff !important; padding:0 22px; font-size:14px; font-weight:800; transition:.2s ease; }
  .qb-button:hover { border-color:var(--qb-brass); background:var(--qb-brass); color:#fff !important; }
  .qb-button--secondary { background:#fff; color:var(--qb-ink) !important; }
  .qb-button--secondary:hover { border-color:var(--qb-ink); background:var(--qb-pearl); color:var(--qb-ink) !important; }
  .qb-actions { display:flex; flex-wrap:wrap; gap:14px; margin-top:28px; }
  .qb-hero { position:relative; overflow:hidden; border-bottom:1px solid var(--qb-line); background:linear-gradient(135deg,#F4F0E8 0%,#FFFFFF 58%,#EFE7DB 100%); }
  .qb-hero::before { content:""; position:absolute; inset:auto 0 0; height:1px; background:linear-gradient(90deg,transparent,rgba(166,129,88,.42),transparent); }
  .qb-hero::after { content:""; position:absolute; right:7%; top:0; bottom:0; width:1px; background:rgba(166,129,88,.16); transform:skewX(-12deg); }
  .qb-hero__grid { position:relative; z-index:1; display:grid; grid-template-columns:minmax(0,1fr); gap:28px; align-items:center; padding:78px 0 84px; }
  .qb-hero__content { max-width:720px; margin-inline:auto; text-align:center; }
  .qb-hero .qb-copy { max-width:690px; margin-inline:auto; }
  .qb-hero .qb-actions { justify-content:center; }
  .qb-hero-panel, .qb-policy-card, .qb-contact-card { border:1px solid var(--qb-line); border-radius:2px; background:rgba(255,255,255,.92); box-shadow:0 18px 46px rgba(17,19,18,.05); }
  .qb-hero-panel { padding:clamp(22px,3vw,32px); }
  .qb-glance-list { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:10px; margin:18px 0 0; padding:0; list-style:none; }
  .qb-glance-list li { border:1px solid var(--qb-line); border-radius:2px; background:#fff; padding:12px 13px; color:var(--qb-moss); font-size:13px; line-height:1.45; }
  .qb-glance-list strong { display:block; margin-bottom:3px; color:var(--qb-ink); font-size:13px; line-height:1.2; }
  .qb-soft { background:var(--qb-pearl); }
  .qb-content-grid { display:grid; grid-template-columns:280px minmax(0,1fr); gap:32px; align-items:start; }
  .qb-sidebar { position:sticky; top:110px; }
  .qb-dark-card { border-radius:2px; background:var(--qb-ink); padding:24px; color:#fff; }
  .qb-dark-card .qb-eyebrow { color:var(--qb-brass-soft); }
  .qb-dark-card h2 { margin:0; color:#fff; font-family:Georgia,"Times New Roman",serif; font-size:28px; line-height:1.12; }
  .qb-dark-card p { margin:14px 0 0; color:rgba(255,255,255,.78); font-size:14px; line-height:1.65; }
  .qb-dark-card a { color:#fff; }
  .qb-side-nav { display:grid; gap:9px; margin-top:20px; }
  .qb-side-nav a { border:1px solid rgba(255,255,255,.15); border-radius:2px; padding:10px 13px; color:#fff; font-size:13px; font-weight:800; }
  .qb-policy-stack { display:grid; gap:20px; }
  .qb-policy-card { padding:clamp(24px,4vw,38px); background:#fff; }
  .qb-policy-card:nth-child(even) { background:var(--qb-pearl); }
  .qb-policy-card h2 { margin:0; color:var(--qb-ink); font-family:Georgia,"Times New Roman",serif; font-size:clamp(25px,3vw,38px); line-height:1.12; letter-spacing:0; }
  .qb-policy-card h3 { margin:24px 0 0; color:var(--qb-ink); font-size:18px; line-height:1.35; }
  .qb-policy-card h2 + .qb-policy-card__intro { margin-top:14px; }
  .qb-policy-card p, .qb-policy-card li { color:var(--qb-moss); font-size:15px; line-height:1.72; }
  .qb-policy-card p { margin:14px 0 0; }
  .qb-policy-card ul, .qb-policy-card ol { display:grid; gap:9px; margin:16px 0 0; padding-left:1.15rem; }
  .qb-policy-card ul { list-style:disc outside; }
  .qb-policy-card ol { list-style:decimal outside; }
  .qb-accordion { overflow:hidden; margin-top:22px; border:1px solid var(--qb-line); border-radius:2px; background:#fff; }
  .qb-faq-item + .qb-faq-item { border-top:1px solid var(--qb-stone); }
  .qb-faq-toggle { display:flex; width:100%; align-items:center; justify-content:space-between; gap:18px; border:0; background:#fff; padding:18px; color:var(--qb-ink); text-align:left; font:inherit; font-weight:800; cursor:pointer; }
  .qb-faq-toggle:hover { background:var(--qb-pearl); }
  .qb-faq-toggle span:first-child { line-height:1.35; }
  .qb-faq-icon { display:inline-flex; width:34px; height:34px; flex:0 0 34px; align-items:center; justify-content:center; border-radius:2px; background:var(--qb-ink); color:#fff; font-size:18px; font-weight:800; line-height:1; }
  .qb-answer { display:none; padding:0 18px 20px; }
  .qb-answer p { color:var(--qb-moss); font-size:15px; line-height:1.72; }
  .qb-faq-toggle[aria-expanded="true"] .qb-faq-icon { background:var(--qb-brass); color:#fff; }
  .qb-contact-card { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:14px; margin-top:22px; padding:18px; background:#fff; box-shadow:none; }
  .qb-contact-item { border:1px solid var(--qb-line); border-radius:2px; background:#fff; padding:16px; }
  .qb-contact-item strong { display:block; color:var(--qb-ink); font-size:14px; }
  .qb-contact-item span { display:block; margin-top:7px; color:var(--qb-moss); font-size:14px; line-height:1.6; overflow-wrap:anywhere; }
  @media (max-width:920px) { .qb-hero__grid, .qb-content-grid { grid-template-columns:1fr; } .qb-sidebar { position:static; } }
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
      flex:0 0 min(72vw,260px);
      min-height:88px;
      scroll-snap-align:start;
    }
    .qb-sidebar { display:none; }
    .qb-contact-card { grid-template-columns:1fr; }
    .qb-actions { flex-direction:column; }
    .qb-button { width:100%; }
  }
</style>

<div class="qb-page qb-faq">
  <section class="qb-hero">
    <div class="qb-wrap qb-hero__grid">
      <div class="qb-hero__content">
        <p class="qb-eyebrow"><?php esc_html_e('FAQ', 'dawp'); ?></p>
        <h1 class="qb-title"><?php esc_html_e('Frequently Asked Questions', 'dawp'); ?></h1>
        <p class="qb-updated"><?php esc_html_e('Last Updated: May 28, 2026', 'dawp'); ?></p>
        <p class="qb-copy"><?php echo esc_html(sprintf(__('Find clear answers about orders, U.S. shipping, tracking, returns, refunds, watch details, checkout, privacy, and customer support at %s.', 'dawp'), $store_name)); ?></p>
        <div class="qb-actions">
          <a class="qb-button" href="<?php echo esc_url($support_portal); ?>"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
          <a class="qb-button qb-button--secondary" href="<?php echo esc_url($support_mailto); ?>"><?php esc_html_e('Email Support', 'dawp'); ?></a>
        </div>
      </div>
    </div>
  </section>

  <section class="qb-section qb-soft">
    <div class="qb-wrap qb-content-grid">
      <aside class="qb-sidebar">
        <div class="qb-dark-card">
          <p class="qb-eyebrow"><?php esc_html_e('FAQ Categories', 'dawp'); ?></p>
          <h2><?php esc_html_e('Find answers faster.', 'dawp'); ?></h2>
          <p><?php esc_html_e('These answers are aligned with our Shipping Policy and Return & Refund Policy pages.', 'dawp'); ?></p>
          <nav class="qb-side-nav" aria-label="<?php esc_attr_e('FAQ categories', 'dawp'); ?>">
            <a href="#quick-answers"><?php esc_html_e('Quick Answers', 'dawp'); ?></a>
            <?php foreach ($faq_sections as $section) : ?>
              <a href="#<?php echo esc_attr($section['id']); ?>"><?php echo esc_html($section['eyebrow']); ?></a>
            <?php endforeach; ?>
            <a href="#contact-info"><?php esc_html_e('Contact Information', 'dawp'); ?></a>
          </nav>
        </div>
      </aside>

      <div class="qb-policy-stack">
        <section id="quick-answers" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Quick Answers', 'dawp'); ?></p>
          <h2><?php esc_html_e('The essentials before you order.', 'dawp'); ?></h2>
          <ul class="qb-glance-list">
            <li><strong><?php esc_html_e('Ships To', 'dawp'); ?></strong><?php esc_html_e('United States domestic orders only', 'dawp'); ?></li>
            <li><strong><?php esc_html_e('Standard Shipping', 'dawp'); ?></strong><?php esc_html_e('Free nationwide with no minimum', 'dawp'); ?></li>
            <li><strong><?php esc_html_e('Order Cutoff', 'dawp'); ?></strong><?php esc_html_e('5:00 PM Pacific Standard Time, Monday-Friday', 'dawp'); ?></li>
            <li><strong><?php esc_html_e('Delivery Time', 'dawp'); ?></strong><?php esc_html_e('6-10 business days', 'dawp'); ?></li>
            <li><strong><?php esc_html_e('Return Window', 'dawp'); ?></strong><?php esc_html_e('30 days of delivery', 'dawp'); ?></li>
            <li><strong><?php esc_html_e('Restocking Fee', 'dawp'); ?></strong><?php esc_html_e('No restocking fee for eligible returns', 'dawp'); ?></li>
            <li><strong><?php esc_html_e('Refund Timing', 'dawp'); ?></strong><?php esc_html_e('Within 7 business days after approval', 'dawp'); ?></li>
          </ul>
        </section>

        <?php foreach ($faq_sections as $section) : ?>
          <section id="<?php echo esc_attr($section['id']); ?>" class="qb-policy-card">
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
                    <?php echo wp_kses_post(wpautop($faq['a'])); ?>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </section>
        <?php endforeach; ?>

        <section id="policy-links" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Related Policies', 'dawp'); ?></p>
          <h2><?php esc_html_e('Read the full policy details.', 'dawp'); ?></h2>
          <p class="qb-policy-card__intro"><?php esc_html_e('For complete terms, review the dedicated policy pages before placing an order or starting a return request.', 'dawp'); ?></p>
          <div class="qb-actions">
            <a class="qb-button" href="<?php echo esc_url($shipping_policy); ?>"><?php esc_html_e('Shipping Policy', 'dawp'); ?></a>
            <a class="qb-button qb-button--secondary" href="<?php echo esc_url($return_policy); ?>"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></a>
            <a class="qb-button qb-button--secondary" href="<?php echo esc_url($track_order_page); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a>
          </div>
        </section>

        <section id="contact-info" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Still Need Help?', 'dawp'); ?></p>
          <h2><?php esc_html_e('Contact Information', 'dawp'); ?></h2>
          <p class="qb-policy-card__intro"><?php esc_html_e('For order-related messages, include your order number and the email address used at checkout so our support team can help faster.', 'dawp'); ?></p>
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
              <span><a href="<?php echo esc_url($support_mailto); ?>"><?php echo esc_html($support_email); ?></a></span>
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
