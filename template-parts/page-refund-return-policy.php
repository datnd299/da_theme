<?php
/**
 * Handed Shoes — Return & Refund Policy Page
 * GMC-safe return policy based on the saved Crowdfused-style structure.
 *
 * Sections:
 * Hero, 30-Day Easy Returns, Policy Overview, Return Costs,
 * Common Scenarios, How To Return, Refund Process, Exchanges,
 * Non-Returnable Items, Footwear Condition Note, Questions & Contact.
 */

if (!defined('ABSPATH')) {
    exit;
}

$store_name     = 'Handed Shoes';
$website_domain = 'handedshoes.com';
$support_email  = 'support@handedshoes.com';
$support_url    = home_url('/contact-us/');
$faq_url        = home_url('/faq/');
$shipping_url   = home_url('/shipping-policy/');
$size_url       = home_url('/size-guide/');
$business_hours = 'Monday – Friday, 9:00 AM – 5:00 PM, GMT-08:00 Pacific Standard Time (Los Angeles)';
$response_time  = 'We aim to reply within 1 business day.';
$last_updated   = 'January 2, 2024';

$hero_cards = [
    [
        'label' => '30-Day Easy Returns',
        'copy'  => 'Request a return within 30 days from the day your order is delivered.',
        'icon'  => 'refresh',
    ],
    [
        'label' => '$0 Restocking Fee',
        'copy'  => 'We do not charge restocking fees for eligible returns.',
        'icon'  => 'check',
    ],
    [
        'label' => 'Return Authorization Required',
        'copy'  => 'Please contact us and wait for approval before sending any item back.',
        'icon'  => 'mail',
    ],
];

$overview_cards = [
    [
        'title' => 'Return Window',
        'copy'  => '30 days from the day you receive your order, unless the product page states a different return window.',
    ],
    [
        'title' => 'Condition',
        'copy'  => 'Items must be unused, unworn, undamaged, in original condition, and returned with original packaging where applicable.',
    ],
    [
        'title' => 'Easy Returns',
        'copy'  => 'Our support team will assist you through the process from return approval to refund confirmation.',
    ],
    [
        'title' => 'Restocking Fee',
        'copy'  => '$0 — we do not charge any restocking fees for eligible returns.',
    ],
];

$return_scenarios = [
    [
        'title' => 'Order Cancellations After Ordering',
        'copy'  => 'You may request an order cancellation within 9 hours after placing the order, as long as the order has not been processed or shipped. Once an order has shipped, it can no longer be canceled; you may request a return after delivery in accordance with this policy.',
    ],
    [
        'title' => 'Damaged On Arrival',
        'copy'  => 'If your order arrives damaged, please contact us within 30 days of delivery and include photos of the item and packaging, including the shipping label. We will help with a replacement or refund at no cost to you after review.',
    ],
    [
        'title' => 'Wrong Product / Missing Items',
        'copy'  => 'If you received the wrong product or your order is missing items, parts, or accessories, please contact us within 30 days of delivery. We may request photos for verification.',
    ],
    [
        'title' => 'Never Arrived / Lost Packages',
        'copy'  => 'If your package shows no tracking updates for an extended period or is marked delivered but you did not receive it, please contact us within 30 days of the delivery date or tracking status. We will investigate with the carrier and, if confirmed lost or misdelivered, arrange a replacement or refund as appropriate.',
    ],
];

$return_steps = [
    [
        'step'  => '01',
        'title' => 'Contact Us',
        'copy'  => 'Contact our support team with your order number, the email used at checkout, and the reason for return.',
    ],
    [
        'step'  => '02',
        'title' => 'Wait For Authorization',
        'copy'  => 'Please wait for return approval and instructions before sending any footwear back to us.',
    ],
    [
        'step'  => '03',
        'title' => 'Pack Your Item',
        'copy'  => 'Repack the item securely in its original packaging, including all accessories, tags, labels, manuals, and documents where applicable.',
    ],
    [
        'step'  => '04',
        'title' => 'Send It Back',
        'copy'  => 'Ship your return using the instructions provided in your return authorization email.',
    ],
];

$non_returnable_items = [
    'Items marked Final Sale or Non-Returnable.',
    'Gift cards or digital products/downloads.',
    'Personal care, hygiene, and intimate items if applicable.',
    'Items that have been used, worn, installed, assembled, modified, or damaged after delivery.',
    'Footwear with outdoor wear, sole marks, stains, heavy creasing, odor, damage, or missing packaging where applicable.',
    'Items missing original packaging, serial number labels, accessories, manuals, or included parts.',
    'Certain hazardous materials or restricted items that cannot be shipped back safely.',
];

$footwear_requirements = [
    'Footwear must be unworn and undamaged.',
    'Shoes must be free of outdoor wear, sole marks, stains, odor, and heavy creasing.',
    'Original packaging, tags, inserts, dust bags, or accessories should be included where applicable.',
    'Customers should try shoes on a clean indoor surface to avoid marks on soles or uppers.',
    'Return authorization is required before sending footwear back.',
];

$render_icon = static function ($icon) {
    $icons = [
        'check'   => '<path d="m20 6-11 11-5-5"/>',
        'refresh' => '<path d="M20 12a8 8 0 0 1-13.66 5.66L4 15"/><path d="M4 20v-5h5"/><path d="M4 12A8 8 0 0 1 17.66 6.34L20 9"/><path d="M20 4v5h-5"/>',
        'box'     => '<path d="M21 16V8a2 2 0 0 0-1-1.73L13 2.27a2 2 0 0 0-2 0L4 6.27A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><path d="M3.27 6.96 12 12.01l8.73-5.05"/><path d="M12 22.08V12"/>',
        'card'    => '<rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/>',
        'mail'    => '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-10 6L2 7"/>',
        'alert'   => '<circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>',
        'swap'    => '<polyline points="17 1 21 5 17 9"/><path d="M3 11V9a4 4 0 0 1 4-4h14"/><polyline points="7 23 3 19 7 15"/><path d="M21 13v2a4 4 0 0 1-4 4H3"/>',
    ];

    return $icons[$icon] ?? $icons['check'];
};
?>

<main class="bg-[#F4F5F6] text-[#0B0B0D]">
  <!-- ================= HERO ================= -->
  <section class="relative overflow-hidden bg-[#0B0B0D] text-white" aria-labelledby="return-policy-title">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(255,255,255,0.18),transparent_34%),linear-gradient(135deg,#0B0B0D_0%,#1A1A1D_54%,#050506_100%)]"></div>
    <div class="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-[#F4F5F6] to-transparent"></div>

    <div class="relative mx-auto grid max-w-7xl items-end gap-12 px-5 py-20 sm:px-8 lg:grid-cols-[0.9fr_1.1fr] lg:px-10 lg:py-28">
      <div>
        <p class="text-xs font-bold uppercase tracking-[0.22em] text-white/60">Return & Refund Policy</p>
        <h1 id="return-policy-title" class="mt-5 font-serif text-5xl font-semibold leading-[1.02] text-[#F4F5F6] sm:text-6xl lg:text-7xl">
          Clear Returns For Formal Footwear Orders
        </h1>
        <p class="mt-6 max-w-2xl text-base leading-8 text-white/72 sm:text-lg">
          Shop with confidence at <?php echo esc_html($store_name); ?>. This policy explains our 30-day return window, footwear return condition, refund timing, exchanges, and how to request help with your order.
        </p>
        <div class="mt-8 flex flex-col gap-3 sm:flex-row">
          <a href="<?php echo esc_url($support_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-white px-7 text-sm font-bold uppercase tracking-[0.08em] text-[#0B0B0D] transition hover:bg-[#D9DADD]">
            Start A Return Request
          </a>
          <a href="<?php echo esc_url($shipping_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-white/35 px-7 text-sm font-bold uppercase tracking-[0.08em] text-white transition hover:bg-white hover:text-[#0B0B0D]">
            View Shipping Policy
          </a>
        </div>
      </div>

      <div class="grid gap-4 sm:grid-cols-3">
        <?php foreach ($hero_cards as $card) : ?>
          <article class="rounded-3xl border border-white/10 bg-white/[0.06] p-5 backdrop-blur-sm">
            <div class="flex h-11 w-11 items-center justify-center rounded-full bg-[#0B0B0D] text-white">
              <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <?php echo $render_icon($card['icon']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
              </svg>
            </div>
            <p class="mt-4 text-xs font-bold uppercase tracking-[0.14em] text-white/60"><?php echo esc_html($card['label']); ?></p>
            <p class="mt-3 text-sm leading-6 text-white/65"><?php echo esc_html($card['copy']); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ================= 30-DAY RETURNS / OVERVIEW ================= -->
  <section class="bg-[#F4F5F6] py-16 sm:py-20 lg:py-24" aria-labelledby="easy-returns-title">
    <div class="mx-auto grid max-w-7xl gap-12 px-5 sm:px-8 lg:grid-cols-[0.82fr_1.18fr] lg:px-10">
      <div>
        <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#5B5D63]">30-Day Easy Returns</p>
        <h2 id="easy-returns-title" class="mt-4 font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
          You have 30 days from delivery to request a return.
        </h2>
        <p class="mt-5 text-base leading-8 text-[#5B5D63]/72">
          To be eligible, items must be unused, unworn, undamaged, in original condition, and returned with all original packaging, tags or labels, manuals, accessories, and included parts where applicable. Items should be packed securely to prevent damage during return shipping.
        </p>
        <p class="mt-4 rounded-3xl border border-[#5B5D63]/10 bg-white p-5 text-sm font-bold leading-7 text-[#0B0B0D] shadow-sm">
          Restocking Fee: $0 — we do not charge restocking fees for eligible returns.
        </p>
        <p class="mt-4 text-sm leading-7 text-[#5B5D63]/60">
          Last updated: <?php echo esc_html($last_updated); ?>
        </p>
      </div>

      <div class="grid gap-4 sm:grid-cols-2">
        <?php foreach ($overview_cards as $card) : ?>
          <article class="rounded-3xl border border-[#5B5D63]/10 bg-white p-5 shadow-sm">
            <h3 class="font-serif text-xl font-semibold text-[#0B0B0D]"><?php echo esc_html($card['title']); ?></h3>
            <p class="mt-3 text-sm leading-7 text-[#5B5D63]/72"><?php echo esc_html($card['copy']); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ================= RETURN COSTS ================= -->
  <section class="bg-white py-16 sm:py-20 lg:py-24" aria-labelledby="return-costs-title">
    <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
      <div class="mb-10 max-w-3xl">
        <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#5B5D63]">Return Costs</p>
        <h2 id="return-costs-title" class="mt-4 font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
          Return shipping depends on the reason for the return.
        </h2>
      </div>

      <div class="grid gap-6 lg:grid-cols-2">
        <article class="rounded-[2rem] border border-[#5B5D63]/10 bg-[#F4F5F6] p-6 shadow-sm">
          <div class="flex h-11 w-11 items-center justify-center rounded-full bg-white text-[#0B0B0D]">
            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <?php echo $render_icon('check'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            </svg>
          </div>
          <p class="mt-5 text-xs font-bold uppercase tracking-[0.14em] text-[#5B5D63]">No Cost To The Customer</p>
          <h3 class="mt-2 font-serif text-2xl font-semibold text-[#0B0B0D]">Defective, Damaged, Or Incorrect Products</h3>
          <p class="mt-3 text-sm leading-7 text-[#5B5D63]/72">
            We cover return shipping or provide a prepaid return label if you received the wrong item, the item arrived damaged due to the carrier, or the item is defective, missing essential parts, or not functioning as intended.
          </p>
          <p class="mt-3 text-sm leading-7 text-[#5B5D63]/72">
            We may request photos or videos of the item and packaging to help resolve the issue quickly.
          </p>
        </article>

        <article class="rounded-[2rem] border border-[#5B5D63]/10 bg-[#F4F5F6] p-6 shadow-sm">
          <div class="flex h-11 w-11 items-center justify-center rounded-full bg-white text-[#0B0B0D]">
            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <?php echo $render_icon('card'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            </svg>
          </div>
          <p class="mt-5 text-xs font-bold uppercase tracking-[0.14em] text-[#5B5D63]">Customer Pays Actual Return Shipping</p>
          <h3 class="mt-2 font-serif text-2xl font-semibold text-[#0B0B0D]">Customer Remorse / Change Of Mind</h3>
          <p class="mt-3 text-sm leading-7 text-[#5B5D63]/72">
            The customer pays the actual return shipping cost when the wrong item, size, color, model, or compatibility was selected, the item does not fit or match personal preference, the customer no longer wants the item, or the order was placed by mistake.
          </p>
          <p class="mt-3 text-sm font-bold leading-7 text-[#0B0B0D]">Original shipping costs are non-refundable.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- ================= COMMON SCENARIOS ================= -->
  <section class="bg-[#0B0B0D] py-16 text-white sm:py-20 lg:py-24" aria-labelledby="return-scenarios-title">
    <div class="mx-auto grid max-w-7xl gap-12 px-5 sm:px-8 lg:grid-cols-[0.82fr_1.18fr] lg:px-10">
      <div>
        <p class="text-xs font-bold uppercase tracking-[0.2em] text-white/60">Common Return Scenarios</p>
        <h2 id="return-scenarios-title" class="mt-4 font-serif text-4xl font-semibold leading-tight text-[#F4F5F6] sm:text-5xl">
          What to do if something goes wrong.
        </h2>
        <p class="mt-5 text-base leading-8 text-white/68">
          If your order is damaged, incorrect, missing items, or never arrives, contact us as soon as possible with your order number and supporting details.
        </p>
      </div>

      <div class="grid gap-4">
        <?php foreach ($return_scenarios as $scenario) : ?>
          <article class="rounded-3xl border border-white/10 bg-white/[0.06] p-5">
            <h3 class="font-serif text-xl font-semibold text-[#F4F5F6]"><?php echo esc_html($scenario['title']); ?></h3>
            <p class="mt-3 text-sm leading-7 text-white/65"><?php echo esc_html($scenario['copy']); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ================= HOW TO RETURN ================= -->
  <section class="bg-[#F4F5F6] py-16 sm:py-20 lg:py-24" aria-labelledby="how-to-return-title">
    <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
      <div class="mb-10 max-w-3xl">
        <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#5B5D63]">How To Return An Item</p>
        <h2 id="how-to-return-title" class="mt-4 font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
          Return authorization is required before sending items back.
        </h2>
        <p class="mt-5 text-base leading-8 text-[#5B5D63]/72">
          Please do not send items back without first receiving return approval or authorization. Return instructions and the return shipping address will be provided after we review your request.
        </p>
      </div>

      <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-4">
        <?php foreach ($return_steps as $step) : ?>
          <article class="rounded-3xl border border-[#5B5D63]/10 bg-white p-6 shadow-sm">
            <span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-[#0B0B0D] text-sm font-bold text-white"><?php echo esc_html($step['step']); ?></span>
            <h3 class="mt-5 font-serif text-xl font-semibold text-[#0B0B0D]"><?php echo esc_html($step['title']); ?></h3>
            <p class="mt-3 text-sm leading-7 text-[#5B5D63]/72"><?php echo esc_html($step['copy']); ?></p>
          </article>
        <?php endforeach; ?>
      </div>

      <div class="mt-8 rounded-[2rem] border border-[#5B5D63]/10 bg-white p-6 shadow-sm">
        <h3 class="font-serif text-2xl font-semibold text-[#0B0B0D]">What to include in your request</h3>
        <p class="mt-3 text-sm leading-7 text-[#5B5D63]/72">
          Please include your order number, the email used at checkout, the item(s) you want to return, the reason for return, and photos or video if the item is damaged, defective, incorrect, or the package arrived damaged.
        </p>
        <p class="mt-3 text-sm leading-7 text-[#5B5D63]/72">
          Please include all parts, accessories, manuals, and original packaging when returning an item.
        </p>
      </div>
    </div>
  </section>

  <!-- ================= FOOTWEAR CONDITION ================= -->
  <section class="bg-white py-16 sm:py-20 lg:py-24" aria-labelledby="footwear-condition-title">
    <div class="mx-auto grid max-w-7xl gap-12 px-5 sm:px-8 lg:grid-cols-[0.82fr_1.18fr] lg:px-10">
      <div>
        <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#5B5D63]">Footwear Return Condition</p>
        <h2 id="footwear-condition-title" class="mt-4 font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
          Dress shoes must be returned in eligible condition.
        </h2>
        <p class="mt-5 text-base leading-8 text-[#5B5D63]/72">
          Because formal footwear can show wear quickly, please try shoes on a clean indoor surface and review fit carefully before outdoor use.
        </p>
        <a href="<?php echo esc_url($size_url); ?>" class="mt-8 inline-flex min-h-12 items-center justify-center rounded-full bg-[#0B0B0D] px-7 text-sm font-bold uppercase tracking-[0.08em] text-white transition hover:bg-[#2F3033]">
          View Size Guide
        </a>
      </div>

      <div class="rounded-[2rem] border border-[#5B5D63]/10 bg-[#F4F5F6] p-6 shadow-sm">
        <ul class="grid gap-3 sm:grid-cols-2">
          <?php foreach ($footwear_requirements as $item) : ?>
            <li class="flex gap-3 rounded-2xl border border-[#5B5D63]/10 bg-white p-4 text-sm leading-6 text-[#5B5D63]/72">
              <svg class="mt-1 h-4 w-4 shrink-0 text-[#0B0B0D]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <?php echo $render_icon('check'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
              </svg>
              <span><?php echo esc_html($item); ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </section>

  <!-- ================= REFUND PROCESS & EXCHANGES ================= -->
  <section class="bg-[#1A1A1D] py-16 text-white sm:py-20 lg:py-24" aria-labelledby="refund-process-title">
    <div class="mx-auto grid max-w-7xl gap-6 px-5 sm:px-8 lg:grid-cols-2 lg:px-10">
      <article class="rounded-[2rem] border border-white/10 bg-white/[0.06] p-6 sm:p-8">
        <div class="flex h-11 w-11 items-center justify-center rounded-full bg-[#0B0B0D] text-white">
          <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <?php echo $render_icon('refresh'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
          </svg>
        </div>
        <p class="mt-5 text-xs font-bold uppercase tracking-[0.2em] text-white/60">Refund Process</p>
        <h2 id="refund-process-title" class="mt-4 font-serif text-4xl font-semibold leading-tight text-[#F4F5F6]">
          Refunds are processed after inspection and approval.
        </h2>
        <p class="mt-5 text-sm leading-7 text-white/68">
          Once we receive your return, we will inspect the item to ensure it meets our return criteria. After approval, your refund will be processed to the original payment method. It typically takes up to 7 days for the refund to appear, depending on your bank or payment provider.
        </p>
        <p class="mt-4 text-sm leading-7 text-white/68">
          If your return is approved but the item is missing parts, shows signs of use, or is returned in non-original condition, we may be unable to issue a refund and may offer to send the item back to you.
        </p>
        <p class="mt-4 text-sm leading-7 text-white/68">
          Approved refunds are issued to the original payment method whenever possible. If the original payment method is unavailable, we may offer an alternative method, such as store credit, only with your consent.
        </p>
      </article>

      <article class="rounded-[2rem] border border-white/10 bg-white/[0.06] p-6 sm:p-8">
        <div class="flex h-11 w-11 items-center justify-center rounded-full bg-[#0B0B0D] text-white">
          <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <?php echo $render_icon('swap'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
          </svg>
        </div>
        <p class="mt-5 text-xs font-bold uppercase tracking-[0.2em] text-white/60">Exchanges</p>
        <h2 class="mt-4 font-serif text-4xl font-semibold leading-tight text-[#F4F5F6]">
          Exchanges are subject to stock availability.
        </h2>
        <p class="mt-5 text-sm leading-7 text-white/68">
          If you would like to exchange an item for a different size, color, or model, please contact our customer support team. Exchanges are subject to stock availability.
        </p>
        <p class="mt-4 text-sm leading-7 text-white/68">
          In some cases, the fastest option is to return the original item for a refund and place a new order.
        </p>
      </article>
    </div>
  </section>

  <!-- ================= NON-RETURNABLE ITEMS ================= -->
  <section class="bg-[#F4F5F6] py-16 sm:py-20 lg:py-24" aria-labelledby="non-returnable-title">
    <div class="mx-auto grid max-w-7xl gap-12 px-5 sm:px-8 lg:grid-cols-[0.82fr_1.18fr] lg:px-10">
      <div>
        <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#5B5D63]">Non-Returnable Items</p>
        <h2 id="non-returnable-title" class="mt-4 font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
          Some items may not be eligible for return.
        </h2>
        <p class="mt-5 text-base leading-8 text-[#5B5D63]/72">
          For hygiene, safety, and product integrity reasons, some items are not eligible for return. These items will be clearly marked as non-returnable on their product pages where applicable.
        </p>
      </div>

      <div class="rounded-[2rem] border border-[#5B5D63]/10 bg-white p-6 shadow-sm">
        <ul class="grid gap-3 sm:grid-cols-2">
          <?php foreach ($non_returnable_items as $item) : ?>
            <li class="flex gap-3 rounded-2xl border border-[#5B5D63]/10 bg-[#F4F5F6] p-4 text-sm leading-6 text-[#5B5D63]/72">
              <svg class="mt-1 h-4 w-4 shrink-0 text-[#0B0B0D]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <?php echo $render_icon('check'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
              </svg>
              <span><?php echo esc_html($item); ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </section>

  <!-- ================= QUESTIONS & CONTACT ================= -->
  <section class="bg-[#0B0B0D] py-16 text-white sm:py-20 lg:py-24" aria-labelledby="return-help-title">
    <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
      <div class="rounded-[2rem] border border-white/10 bg-white/[0.06] p-6 sm:p-8">
        <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
          <div>
            <p class="text-xs font-bold uppercase tracking-[0.2em] text-white/60">Questions?</p>
            <h2 id="return-help-title" class="mt-3 font-serif text-4xl font-semibold text-[#F4F5F6]">Need help with a return or refund?</h2>
            <p class="mt-4 text-sm leading-7 text-white/70">
              Email <a class="font-bold text-white/60 underline decoration-white/30 underline-offset-4 transition hover:text-white" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a> with your order number and return details. Business hours: <?php echo esc_html($business_hours); ?>. <?php echo esc_html($response_time); ?>
            </p>
            <div class="mt-6 grid gap-3 sm:grid-cols-2 lg:max-w-3xl">
              <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                <p class="text-xs font-bold uppercase tracking-[0.12em] text-white/60">Store Name</p>
                <p class="mt-2 text-sm font-bold leading-6 text-white/90"><?php echo esc_html($store_name); ?></p>
              </div>
              <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                <p class="text-xs font-bold uppercase tracking-[0.12em] text-white/60">Website</p>
                <p class="mt-2 text-sm font-bold leading-6 text-white/90"><?php echo esc_html($website_domain); ?></p>
              </div>
              <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                <p class="text-xs font-bold uppercase tracking-[0.12em] text-white/60">Email</p>
                <p class="mt-2 text-sm font-bold leading-6 text-white/90"><?php echo esc_html($support_email); ?></p>
              </div>
              <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                <p class="text-xs font-bold uppercase tracking-[0.12em] text-white/60">Customer Service Hours</p>
                <p class="mt-2 text-sm font-bold leading-6 text-white/90"><?php echo esc_html($business_hours); ?></p>
              </div>
            </div>
          </div>

          <div class="flex flex-col gap-3 sm:flex-row lg:flex-col">
            <a href="<?php echo esc_url($support_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-white px-7 text-sm font-bold uppercase tracking-[0.08em] text-[#0B0B0D] transition hover:bg-[#D9DADD]">
              Contact Support
            </a>
            <a href="<?php echo esc_url($faq_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-white/30 bg-transparent px-7 text-sm font-bold uppercase tracking-[0.08em] text-white transition hover:bg-white hover:text-[#0B0B0D]">
              Read FAQs
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

