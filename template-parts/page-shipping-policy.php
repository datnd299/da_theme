<?php
/**
 * Handed Shoes — Shipping Policy Page
 * GMC-safe shipping-only policy based on the saved Crowdfused-style structure.
 *
 * Sections:
 * Hero, Shipping Overview, Shipping Locations, Processing & Delivery,
 * Carriers & Costs, Tracking, Multiple Packages, Delivery Issues,
 * Incorrect Address, Lost/Damaged Packages, Restrictions/Delays, Support CTA.
 */

if (!defined('ABSPATH')) {
    exit;
}

$store_name      = 'Handed Shoes';
$website_domain  = 'handedshoes.com';
$support_email   = 'support@handedshoes.com';
$business_hours  = 'Monday – Friday, 9:00 AM – 5:00 PM, GMT-08:00 Pacific Standard Time (Los Angeles)';
$response_time   = 'We aim to reply within 1 business day.';
$track_url       = home_url('/track-order/');
$contact_url     = home_url('/contact-us/');
$faq_url         = home_url('/faq/');

$order_cutoff    = '5:00 PM (GMT-08:00) Pacific Standard Time (Los Angeles)';
$handling_time   = '1–2 business days, Monday to Friday';
$transit_time    = '5–7 business days, Monday to Friday';
$estimated_time  = 'Usually 6–9 business days';
$shipping_region = 'United States';

$hero_cards = [
    [
        'label' => 'Order Cutoff',
        'value' => $order_cutoff,
        'copy'  => 'Orders placed after the cutoff begin processing on the next business day.',
        'icon'  => 'clock',
    ],
    [
        'label' => 'Handling Time',
        'value' => $handling_time,
        'copy'  => 'This is the time needed to confirm, prepare, pack, and hand your order to the carrier.',
        'icon'  => 'box',
    ],
    [
        'label' => 'Transit Time',
        'value' => $transit_time,
        'copy'  => 'Transit depends on the carrier route, delivery address, and item type.',
        'icon'  => 'truck',
    ],
];

$timeline_steps = [
    [
        'title' => 'Order Cutoff Time',
        'meta'  => $order_cutoff,
        'copy'  => 'Orders placed before the daily cutoff can begin processing the same business day. Orders placed after the cutoff time begin processing on the next business day.',
    ],
    [
        'title' => 'Order Handling Time',
        'meta'  => $handling_time,
        'copy'  => 'Handling includes order confirmation, product preparation, packing, and handoff to the shipping carrier. Orders are handled Monday through Friday, excluding holidays.',
    ],
    [
        'title' => 'Transit Time',
        'meta'  => $transit_time,
        'copy'  => 'After dispatch, standard transit usually takes 5–7 business days. Delivery time may vary depending on carrier route, location, and shipment conditions.',
    ],
    [
        'title' => 'Estimated Delivery Time',
        'meta'  => $estimated_time,
        'copy'  => 'Most orders are delivered within 6–9 business days. Some items may take longer, including bulky items, special handling items, oversized or freight items, or items shipped directly from a brand or partner.',
    ],
];

$overview_facts = [
    [
        'label' => 'Shipping Region',
        'value' => $shipping_region,
    ],
    [
        'label' => 'Order Cutoff',
        'value' => $order_cutoff,
    ],
    [
        'label' => 'Handling',
        'value' => $handling_time,
    ],
    [
        'label' => 'Estimated Delivery',
        'value' => $estimated_time,
    ],
];

$delivery_issues = [
    'Tracking not updating',
    'Package delayed in transit',
    'Package marked delivered but not received',
    'Missing item from a package',
    'Damaged package or item',
    'Incorrect or incomplete shipping address',
    'Package returned to sender',
];

$render_icon = static function ($icon) {
    $icons = [
        'clock' => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
        'box'   => '<path d="M21 16V8a2 2 0 0 0-1-1.73L13 2.27a2 2 0 0 0-2 0L4 6.27A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><path d="M3.27 6.96 12 12.01l8.73-5.05"/><path d="M12 22.08V12"/>',
        'truck' => '<path d="M10 17h4V5H3v12h2"/><path d="M14 8h4l3 3v6h-3"/><circle cx="7" cy="17" r="2"/><circle cx="16" cy="17" r="2"/>',
        'map'   => '<path d="M9 18l-6 3V6l6-3 6 3 6-3v15l-6 3-6-3z"/><path d="M9 3v15"/><path d="M15 6v15"/>',
        'mail'  => '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-10 6L2 7"/>',
        'check' => '<path d="m20 6-11 11-5-5"/>',
        'alert' => '<circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>',
    ];

    return $icons[$icon] ?? $icons['check'];
};
?>

<main class="bg-[#F4F5F6] text-[#0B0B0D]">
  <!-- ================= HERO ================= -->
  <section class="relative overflow-hidden bg-[#0B0B0D] text-white" aria-labelledby="shipping-policy-title">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(255,255,255,0.18),transparent_34%),linear-gradient(135deg,#0B0B0D_0%,#1A1A1D_54%,#050506_100%)]"></div>
    <div class="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-[#F4F5F6] to-transparent"></div>

    <div class="relative mx-auto grid max-w-7xl items-end gap-12 px-5 py-20 sm:px-8 lg:grid-cols-[0.9fr_1.1fr] lg:px-10 lg:py-28">
      <div>
        <p class="text-xs font-bold uppercase tracking-[0.22em] text-white/60">Shipping Policy</p>
        <h1 id="shipping-policy-title" class="mt-5 font-serif text-5xl font-semibold leading-[1.02] text-[#F4F5F6] sm:text-6xl lg:text-7xl">
          Clear Shipping Details From Checkout To Delivery
        </h1>
        <p class="mt-6 max-w-2xl text-base leading-8 text-white/72 sm:text-lg">
          <?php echo esc_html($store_name); ?> provides clear shipping timelines, order cutoff details, tracking information, and customer support for delivery questions before and after your order is placed.
        </p>
        <div class="mt-8 flex flex-col gap-3 sm:flex-row">
          <a href="<?php echo esc_url($track_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-white px-7 text-sm font-bold uppercase tracking-[0.08em] text-[#0B0B0D] transition hover:bg-[#D9DADD]">
            Track Your Order
          </a>
          <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-white/35 px-7 text-sm font-bold uppercase tracking-[0.08em] text-white transition hover:bg-white hover:text-[#0B0B0D]">
            Contact Support
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
            <h2 class="mt-2 font-serif text-lg font-semibold leading-snug text-[#F4F5F6]"><?php echo esc_html($card['value']); ?></h2>
            <p class="mt-3 text-sm leading-6 text-white/65"><?php echo esc_html($card['copy']); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ================= SHIPPING OVERVIEW ================= -->
  <section class="bg-[#F4F5F6] py-16 sm:py-20 lg:py-24" aria-labelledby="shipping-overview-title">
    <div class="mx-auto grid max-w-7xl gap-12 px-5 sm:px-8 lg:grid-cols-[0.82fr_1.18fr] lg:px-10">
      <div>
        <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#5B5D63]">Shipping Overview</p>
        <h2 id="shipping-overview-title" class="mt-4 font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
          Estimated delivery is based on cutoff, handling, and transit time.
        </h2>
        <p class="mt-5 text-base leading-8 text-[#5B5D63]/72">
          Your estimated delivery time is calculated from the order cutoff time, order handling time, and carrier transit time. Orders placed after the cutoff begin processing on the next business day.
        </p>

        <div class="mt-8 grid gap-3 sm:grid-cols-2">
          <?php foreach ($overview_facts as $fact) : ?>
            <div class="rounded-3xl border border-[#5B5D63]/10 bg-white p-5 shadow-sm">
              <p class="text-xs font-bold uppercase tracking-[0.14em] text-[#5B5D63]"><?php echo esc_html($fact['label']); ?></p>
              <p class="mt-2 text-sm font-bold leading-6 text-[#0B0B0D]"><?php echo esc_html($fact['value']); ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="grid gap-4">
        <?php foreach ($timeline_steps as $index => $step) : ?>
          <article class="rounded-3xl border border-[#5B5D63]/10 bg-white p-5 shadow-sm">
            <div class="flex gap-4">
              <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#0B0B0D] text-sm font-bold text-white"><?php echo esc_html($index + 1); ?></span>
              <div>
                <p class="mb-2 inline-flex rounded-full bg-[#F4F5F6] px-3 py-1 text-xs font-bold uppercase tracking-[0.12em] text-[#5B5D63]"><?php echo esc_html($step['meta']); ?></p>
                <h3 class="font-serif text-xl font-semibold text-[#0B0B0D]"><?php echo esc_html($step['title']); ?></h3>
                <p class="mt-2 text-sm leading-7 text-[#5B5D63]/72"><?php echo esc_html($step['copy']); ?></p>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ================= LOCATIONS / CARRIERS / COSTS ================= -->
  <section class="bg-white py-16 sm:py-20 lg:py-24" aria-labelledby="shipping-locations-title">
    <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
      <div class="mb-10 max-w-3xl">
        <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#5B5D63]">Shipping Details</p>
        <h2 id="shipping-locations-title" class="mt-4 font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
          Locations, carriers, and shipping costs.
        </h2>
      </div>

      <div class="grid gap-5 lg:grid-cols-3">
        <article class="rounded-3xl border border-[#5B5D63]/10 bg-[#F4F5F6] p-6 shadow-sm">
          <div class="flex h-11 w-11 items-center justify-center rounded-full bg-white text-[#0B0B0D]">
            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <?php echo $render_icon('map'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            </svg>
          </div>
          <h3 class="mt-5 font-serif text-2xl font-semibold text-[#0B0B0D]">Shipping Locations</h3>
          <p class="mt-3 text-sm leading-7 text-[#5B5D63]/72">
            <?php echo esc_html(sprintf('%s currently ships to the %s. Some items may have shipping restrictions due to size, weight, carrier limits, product type, or local regulations.', $store_name, $shipping_region)); ?>
          </p>
        </article>

        <article class="rounded-3xl border border-[#5B5D63]/10 bg-[#F4F5F6] p-6 shadow-sm">
          <div class="flex h-11 w-11 items-center justify-center rounded-full bg-white text-[#0B0B0D]">
            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <?php echo $render_icon('truck'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            </svg>
          </div>
          <h3 class="mt-5 font-serif text-2xl font-semibold text-[#0B0B0D]">Shipping Carriers</h3>
          <p class="mt-3 text-sm leading-7 text-[#5B5D63]/72">
            Orders may be shipped using trusted carriers such as USPS, UPS, FedEx, DHL, regional carriers, or specialized carriers for oversized items when applicable.
          </p>
        </article>

        <article class="rounded-3xl border border-[#5B5D63]/10 bg-[#F4F5F6] p-6 shadow-sm">
          <div class="flex h-11 w-11 items-center justify-center rounded-full bg-white text-[#0B0B0D]">
            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <?php echo $render_icon('check'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            </svg>
          </div>
          <h3 class="mt-5 font-serif text-2xl font-semibold text-[#0B0B0D]">Shipping Costs</h3>
          <p class="mt-3 text-sm leading-7 text-[#5B5D63]/72">
            Shipping costs, available shipping methods, and any applicable fees are shown at checkout before payment is completed. Oversized or special-handling items may have different shipping requirements.
          </p>
        </article>
      </div>
    </div>
  </section>

  <!-- ================= TRACKING / MULTIPLE PACKAGES ================= -->
  <section class="bg-[#0B0B0D] py-16 text-white sm:py-20 lg:py-24" aria-labelledby="tracking-title">
    <div class="mx-auto grid max-w-7xl gap-8 px-5 sm:px-8 lg:grid-cols-2 lg:px-10">
      <article class="rounded-[2rem] border border-white/10 bg-white/[0.06] p-6 sm:p-8">
        <p class="text-xs font-bold uppercase tracking-[0.2em] text-white/60">Tracking Your Order</p>
        <h2 id="tracking-title" class="mt-4 font-serif text-4xl font-semibold leading-tight text-[#F4F5F6] sm:text-5xl">
          Tracking is sent after your order ships.
        </h2>
        <p class="mt-5 text-sm leading-7 text-white/68">
          Once your order ships, tracking information will be sent to the email address used at checkout. Tracking may include the carrier name, tracking number, tracking link, and estimated delivery date when available.
        </p>
        <p class="mt-4 text-sm leading-7 text-white/68">
          Please allow up to 24–48 hours for tracking information to update after the carrier receives the package.
        </p>
        <a href="<?php echo esc_url($track_url); ?>" class="mt-7 inline-flex min-h-12 items-center justify-center rounded-full bg-white px-7 text-sm font-bold uppercase tracking-[0.08em] text-[#0B0B0D] transition hover:bg-[#D9DADD]">
          Track Your Order
        </a>
      </article>

      <article class="rounded-[2rem] border border-white/10 bg-white/[0.06] p-6 sm:p-8">
        <p class="text-xs font-bold uppercase tracking-[0.2em] text-white/60">Multiple Packages</p>
        <h2 class="mt-4 font-serif text-4xl font-semibold leading-tight text-[#F4F5F6] sm:text-5xl">
          Some orders may arrive separately.
        </h2>
        <p class="mt-5 text-sm leading-7 text-white/68">
          If your order includes multiple items, they may ship separately and arrive at different times. This can happen when items are fulfilled from different warehouses, require different handling times, or need special packaging.
        </p>
        <p class="mt-4 text-sm leading-7 text-white/68">
          You may receive more than one tracking number for the same order.
        </p>
      </article>
    </div>
  </section>

  <!-- ================= DELIVERY ISSUES ================= -->
  <section class="bg-[#F4F5F6] py-16 sm:py-20 lg:py-24" aria-labelledby="delivery-issues-title">
    <div class="mx-auto grid max-w-7xl gap-12 px-5 sm:px-8 lg:grid-cols-[0.82fr_1.18fr] lg:px-10">
      <div>
        <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#5B5D63]">Delivery Issues</p>
        <h2 id="delivery-issues-title" class="mt-4 font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
          Contact us if your shipment needs attention.
        </h2>
        <p class="mt-5 text-base leading-8 text-[#5B5D63]/72">
          If you experience a delivery issue, contact our support team with your order number, email used at checkout, delivery address, tracking number, photos if applicable, and a short description of the issue.
        </p>
        <a href="<?php echo esc_url($contact_url); ?>" class="mt-8 inline-flex min-h-12 items-center justify-center rounded-full bg-[#0B0B0D] px-7 text-sm font-bold uppercase tracking-[0.08em] text-white transition hover:bg-[#2F3033]">
          Contact Support
        </a>
      </div>

      <div class="rounded-[2rem] border border-[#5B5D63]/10 bg-white p-6 shadow-sm">
        <h3 class="font-serif text-3xl font-semibold text-[#0B0B0D]">Common delivery issues include:</h3>
        <ul class="mt-6 grid gap-3 sm:grid-cols-2">
          <?php foreach ($delivery_issues as $issue) : ?>
            <li class="flex gap-3 rounded-2xl border border-[#5B5D63]/10 bg-[#F4F5F6] p-4 text-sm leading-6 text-[#5B5D63]/72">
              <svg class="mt-1 h-4 w-4 shrink-0 text-[#0B0B0D]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <?php echo $render_icon('check'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
              </svg>
              <span><?php echo esc_html($issue); ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </section>

  <!-- ================= ADDRESS / LOST / DAMAGED / RESTRICTIONS ================= -->
  <section class="bg-white py-16 sm:py-20 lg:py-24" aria-labelledby="shipping-details-title">
    <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
      <div class="mb-10 max-w-3xl">
        <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#5B5D63]">Additional Shipping Details</p>
        <h2 id="shipping-details-title" class="mt-4 font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
          Address accuracy, lost packages, damaged packages, and delays.
        </h2>
      </div>

      <div class="grid gap-5 md:grid-cols-2">
        <article class="rounded-3xl border border-[#5B5D63]/10 bg-[#F4F5F6] p-6">
          <h3 class="font-serif text-2xl font-semibold text-[#0B0B0D]">Incorrect Shipping Address</h3>
          <p class="mt-3 text-sm leading-7 text-[#5B5D63]/72">Customers are responsible for entering a complete and accurate shipping address at checkout. If you notice an address error, contact us as soon as possible. We can only update the address if the order has not yet been processed or shipped.</p>
        </article>

        <article class="rounded-3xl border border-[#5B5D63]/10 bg-[#F4F5F6] p-6">
          <h3 class="font-serif text-2xl font-semibold text-[#0B0B0D]">Lost Packages</h3>
          <p class="mt-3 text-sm leading-7 text-[#5B5D63]/72">If a package appears lost or has no tracking updates for an extended period, contact us within 30 days of the expected delivery date or latest tracking status. We will review the tracking information and may contact the carrier.</p>
        </article>

        <article class="rounded-3xl border border-[#5B5D63]/10 bg-[#F4F5F6] p-6">
          <h3 class="font-serif text-2xl font-semibold text-[#0B0B0D]">Damaged Packages</h3>
          <p class="mt-3 text-sm leading-7 text-[#5B5D63]/72">If your order arrives damaged, contact us within 30 days of delivery with your order number, photos of the damaged item, photos of the outer packaging, and photos of the shipping label. Please keep the item and packaging until the issue is resolved.</p>
        </article>

        <article class="rounded-3xl border border-[#5B5D63]/10 bg-[#F4F5F6] p-6">
          <h3 class="font-serif text-2xl font-semibold text-[#0B0B0D]">Restrictions And Delays</h3>
          <p class="mt-3 text-sm leading-7 text-[#5B5D63]/72">Some products may be subject to restrictions due to size, weight, carrier limitations, product type, or local regulations. Delays may occur due to weather, holidays, high order volume, warehouse delays, carrier conditions, or incomplete shipping information.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- ================= SUPPORT CTA ================= -->
  <section class="bg-[#1A1A1D] py-16 text-white sm:py-20 lg:py-24" aria-labelledby="shipping-support-title">
    <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
      <div class="rounded-[2rem] border border-white/10 bg-white/[0.06] p-6 sm:p-8">
        <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
          <div>
            <p class="text-xs font-bold uppercase tracking-[0.2em] text-white/60">Customer Support</p>
            <h2 id="shipping-support-title" class="mt-3 font-serif text-4xl font-semibold text-[#F4F5F6]">Need help with shipping or delivery?</h2>
            <p class="mt-4 text-sm leading-7 text-white/70">
              Email <a class="font-bold text-white/60 underline decoration-white/30 underline-offset-4 transition hover:text-white" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a> with your order number and tracking details. Business hours: <?php echo esc_html($business_hours); ?>. <?php echo esc_html($response_time); ?>
            </p>
          </div>

          <div class="flex flex-col gap-3 sm:flex-row">
            <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-white px-7 text-sm font-bold uppercase tracking-[0.08em] text-[#0B0B0D] transition hover:bg-[#D9DADD]">
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

