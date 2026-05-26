<?php
/**
 * Handed Shoes - Terms & Conditions Page
 * GMC-safe purchase terms with transparent ordering, payment, shipping, returns, and contact details.
 */

if (!defined('ABSPATH')) {
    exit;
}

$store_name     = 'Handed Shoes';
$website_domain = 'handedshoes.com';
$support_email  = 'support@handedshoes.com';
$contact_url    = home_url('/contact-us/');
$privacy_url    = home_url('/privacy-policy/');
$shipping_url   = home_url('/shipping-policy/');
$returns_url    = home_url('/refund-return-policy/');
$track_url      = home_url('/track-order/');
$business_hours = 'Monday - Friday, 9:00 AM - 5:00 PM, GMT-08:00 Pacific Standard Time (Los Angeles)';
$response_time  = 'We aim to reply within 1 business day.';
$last_updated   = 'May 27, 2026';

$summary_cards = [
    [
        'label' => 'Transparent Checkout',
        'copy'  => 'Product prices, shipping options, taxes if applicable, and order totals are shown before payment.',
        'icon'  => 'card',
    ],
    [
        'label' => 'Clear Policies',
        'copy'  => 'Shipping, returns, refunds, privacy, and contact information are available before purchase.',
        'icon'  => 'file',
    ],
    [
        'label' => 'Customer Support',
        'copy'  => 'Contact us with order, product, shipping, return, or account questions.',
        'icon'  => 'mail',
    ],
];

$purchase_terms = [
    [
        'title' => 'Product Information',
        'copy'  => 'We work to present product titles, descriptions, images, sizes, colors, materials, pricing, and availability accurately. Slight color differences may occur due to screen settings, lighting, or photography.',
    ],
    [
        'title' => 'Pricing And Availability',
        'copy'  => 'Prices and availability may change without notice. If an item is unavailable after purchase, we may contact you to offer a replacement, wait option, or refund.',
    ],
    [
        'title' => 'Order Review',
        'copy'  => 'Customers are responsible for reviewing product details, size, quantity, billing information, shipping address, and contact information before placing an order.',
    ],
    [
        'title' => 'Order Acceptance',
        'copy'  => 'An order confirmation means we received your order request. We may refuse, cancel, or limit an order when required due to inventory, payment, fraud, pricing, address, or policy issues.',
    ],
];

$customer_responsibilities = [
    'Provide accurate account, billing, payment, shipping, and contact information.',
    'Use the website only for lawful purposes and in a way that does not harm the website or other users.',
    'Review footwear size, product details, shipping timelines, return eligibility, and checkout totals before purchase.',
    'Contact us promptly if you notice an order issue, incorrect address, unauthorized transaction, damaged package, or delivery problem.',
];

$prohibited_uses = [
    'Fraudulent orders, chargeback abuse, unauthorized payment use, or false claims.',
    'Attempts to interfere with site security, payment processing, checkout, account access, or order systems.',
    'Copying, scraping, reselling, or using website content, images, product data, or branding without permission.',
    'Posting or transmitting unlawful, harmful, misleading, abusive, infringing, or malicious content.',
];

$legal_sections = [
    [
        'title' => 'Intellectual Property',
        'copy'  => 'All website content, branding, text, graphics, images, layout, icons, product presentation, and other materials are owned by or licensed to Handed Shoes and are protected by applicable intellectual property laws.',
    ],
    [
        'title' => 'Third-Party Services',
        'copy'  => 'Our website may use third-party services for payment processing, shipping, analytics, fraud prevention, customer support, or embedded features. Those services may have their own terms and privacy practices.',
    ],
    [
        'title' => 'Website Availability',
        'copy'  => 'We aim to keep the website available and accurate, but we do not guarantee uninterrupted, error-free, or fully secure access. We may update, suspend, or discontinue parts of the website when needed.',
    ],
    [
        'title' => 'Limitation Of Liability',
        'copy'  => 'To the fullest extent permitted by law, Handed Shoes is not liable for indirect, incidental, special, consequential, punitive, or similar damages arising from website use, products, delays, or service interruptions.',
    ],
];

$render_icon = static function ($icon) {
    $icons = [
        'card'  => '<rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/>',
        'file'  => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6"/><path d="M16 13H8"/><path d="M16 17H8"/><path d="M10 9H8"/>',
        'mail'  => '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-10 6L2 7"/>',
        'check' => '<path d="m20 6-11 11-5-5"/>',
        'box'   => '<path d="M21 16V8a2 2 0 0 0-1-1.73L13 2.27a2 2 0 0 0-2 0L4 6.27A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><path d="M3.27 6.96 12 12.01l8.73-5.05"/><path d="M12 22.08V12"/>',
        'truck' => '<path d="M10 17h4V5H3v12h2"/><path d="M14 8h4l3 3v6h-3"/><circle cx="7" cy="17" r="2"/><circle cx="16" cy="17" r="2"/>',
        'alert' => '<circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>',
    ];

    return $icons[$icon] ?? $icons['check'];
};
?>

<main class="bg-[#F4EEE6] text-[#121212]">
  <!-- ================= HERO ================= -->
  <section class="relative overflow-hidden bg-[#121212] text-white" aria-labelledby="terms-title">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(169,101,56,0.32),transparent_36%),linear-gradient(135deg,#121212_0%,#3A2418_60%,#121212_100%)]"></div>
    <div class="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-[#F4EEE6] to-transparent"></div>

    <div class="relative mx-auto grid max-w-7xl items-end gap-12 px-5 py-20 sm:px-8 lg:grid-cols-[0.9fr_1.1fr] lg:px-10 lg:py-28">
      <div>
        <p class="text-xs font-bold uppercase tracking-[0.22em] text-[#B8955A]">Terms & Conditions</p>
        <h1 id="terms-title" class="mt-5 font-serif text-5xl font-semibold leading-[1.02] text-[#F4EEE6] sm:text-6xl lg:text-7xl">
          Clear Purchase Terms For Handed Shoes Customers
        </h1>
        <p class="mt-6 max-w-2xl text-base leading-8 text-white/72 sm:text-lg">
          These Terms & Conditions explain the rules for using <?php echo esc_html($website_domain); ?>, placing orders, making payments, receiving shipments, requesting returns, and contacting <?php echo esc_html($store_name); ?>.
        </p>
        <p class="mt-5 text-sm leading-7 text-white/60">Last updated: <?php echo esc_html($last_updated); ?></p>
        <div class="mt-8 flex flex-col gap-3 sm:flex-row">
          <a href="<?php echo esc_url($shipping_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#A96538] px-7 text-sm font-bold uppercase tracking-[0.08em] text-white transition hover:bg-white hover:text-[#121212]">
            Shipping Policy
          </a>
          <a href="<?php echo esc_url($returns_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#A96538] px-7 text-sm font-bold uppercase tracking-[0.08em] text-[#F4EEE6] transition hover:bg-[#A96538] hover:text-white">
            Return & Refund Policy
          </a>
        </div>
      </div>

      <div class="grid gap-4 sm:grid-cols-3">
        <?php foreach ($summary_cards as $card) : ?>
          <article class="rounded-3xl border border-white/10 bg-white/[0.06] p-5 backdrop-blur-sm">
            <div class="flex h-11 w-11 items-center justify-center rounded-full bg-[#A96538] text-white">
              <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <?php echo $render_icon($card['icon']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
              </svg>
            </div>
            <p class="mt-4 text-xs font-bold uppercase tracking-[0.14em] text-[#B8955A]"><?php echo esc_html($card['label']); ?></p>
            <p class="mt-3 text-sm leading-6 text-white/65"><?php echo esc_html($card['copy']); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ================= AGREEMENT OVERVIEW ================= -->
  <section class="bg-[#F4EEE6] py-16 sm:py-20 lg:py-24" aria-labelledby="terms-overview-title">
    <div class="mx-auto grid max-w-7xl gap-12 px-5 sm:px-8 lg:grid-cols-[0.82fr_1.18fr] lg:px-10">
      <div>
        <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#A96538]">Agreement Overview</p>
        <h2 id="terms-overview-title" class="mt-4 font-serif text-4xl font-semibold leading-tight text-[#121212] sm:text-5xl">
          By using this website or placing an order, you agree to these terms.
        </h2>
        <p class="mt-5 text-base leading-8 text-[#3A2418]/72">
          If you do not agree with these Terms & Conditions, please do not use the website or place an order. These terms apply to all visitors, customers, account holders, and anyone who accesses or uses our online store.
        </p>
        <p class="mt-4 text-sm leading-7 text-[#3A2418]/60">
          You must be at least the age of majority in your jurisdiction, or use the website with permission from a parent or legal guardian.
        </p>
      </div>

      <div class="grid gap-4 sm:grid-cols-2">
        <?php foreach ($purchase_terms as $term) : ?>
          <article class="rounded-3xl border border-[#3A2418]/10 bg-white p-5 shadow-sm">
            <h3 class="font-serif text-xl font-semibold text-[#121212]"><?php echo esc_html($term['title']); ?></h3>
            <p class="mt-3 text-sm leading-7 text-[#3A2418]/72"><?php echo esc_html($term['copy']); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ================= ORDERS / PAYMENTS ================= -->
  <section class="bg-white py-16 sm:py-20 lg:py-24" aria-labelledby="orders-payments-title">
    <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
      <div class="mb-10 max-w-3xl">
        <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#A96538]">Orders And Payments</p>
        <h2 id="orders-payments-title" class="mt-4 font-serif text-4xl font-semibold leading-tight text-[#121212] sm:text-5xl">
          Checkout must be accurate, secure, and complete before payment.
        </h2>
      </div>

      <div class="grid gap-6 lg:grid-cols-2">
        <article class="rounded-[2rem] border border-[#3A2418]/10 bg-[#F4EEE6] p-6 shadow-sm">
          <div class="flex h-11 w-11 items-center justify-center rounded-full bg-white text-[#A96538]">
            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <?php echo $render_icon('card'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            </svg>
          </div>
          <h3 class="mt-5 font-serif text-2xl font-semibold text-[#121212]">Payment Terms</h3>
          <p class="mt-3 text-sm leading-7 text-[#3A2418]/72">
            We accept the payment methods shown at checkout. Payment must be authorized and completed before an order can be processed. Payment information is submitted through secure checkout and handled by payment processors according to their security standards.
          </p>
          <p class="mt-3 text-sm leading-7 text-[#3A2418]/72">
            If a payment is declined, flagged, reversed, or suspected of being unauthorized, we may pause, cancel, or request additional verification for the order.
          </p>
        </article>

        <article class="rounded-[2rem] border border-[#3A2418]/10 bg-[#F4EEE6] p-6 shadow-sm">
          <div class="flex h-11 w-11 items-center justify-center rounded-full bg-white text-[#A96538]">
            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <?php echo $render_icon('alert'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            </svg>
          </div>
          <h3 class="mt-5 font-serif text-2xl font-semibold text-[#121212]">Errors, Cancellations, And Limits</h3>
          <p class="mt-3 text-sm leading-7 text-[#3A2418]/72">
            We may correct errors, update inaccurate information, cancel orders, limit quantities, or refuse service when necessary, including for suspected fraud, inventory issues, pricing errors, restricted locations, payment problems, or violations of these terms.
          </p>
          <p class="mt-3 text-sm leading-7 text-[#3A2418]/72">
            Customers may request cancellation within the window stated in our Return & Refund Policy if the order has not been processed or shipped.
          </p>
        </article>
      </div>
    </div>
  </section>

  <!-- ================= SHIPPING / RETURNS ================= -->
  <section class="bg-[#121212] py-16 text-white sm:py-20 lg:py-24" aria-labelledby="shipping-returns-title">
    <div class="mx-auto grid max-w-7xl gap-8 px-5 sm:px-8 lg:grid-cols-2 lg:px-10">
      <article class="rounded-[2rem] border border-white/10 bg-white/[0.06] p-6 sm:p-8">
        <div class="flex h-11 w-11 items-center justify-center rounded-full bg-[#A96538] text-white">
          <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <?php echo $render_icon('truck'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
          </svg>
        </div>
        <p class="mt-5 text-xs font-bold uppercase tracking-[0.2em] text-[#B8955A]">Shipping</p>
        <h2 id="shipping-returns-title" class="mt-4 font-serif text-4xl font-semibold leading-tight text-[#F4EEE6] sm:text-5xl">
          Shipping terms are part of your purchase.
        </h2>
        <p class="mt-5 text-sm leading-7 text-white/68">
          Processing times, transit times, delivery estimates, shipping locations, carrier details, tracking, delivery issues, and address responsibilities are explained in our Shipping Policy.
        </p>
        <a href="<?php echo esc_url($shipping_url); ?>" class="mt-7 inline-flex min-h-12 items-center justify-center rounded-full bg-[#A96538] px-7 text-sm font-bold uppercase tracking-[0.08em] text-white transition hover:bg-white hover:text-[#121212]">
          View Shipping Policy
        </a>
      </article>

      <article class="rounded-[2rem] border border-white/10 bg-white/[0.06] p-6 sm:p-8">
        <div class="flex h-11 w-11 items-center justify-center rounded-full bg-[#A96538] text-white">
          <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <?php echo $render_icon('box'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
          </svg>
        </div>
        <p class="mt-5 text-xs font-bold uppercase tracking-[0.2em] text-[#B8955A]">Returns And Refunds</p>
        <h2 class="mt-4 font-serif text-4xl font-semibold leading-tight text-[#F4EEE6] sm:text-5xl">
          Returns follow our published return policy.
        </h2>
        <p class="mt-5 text-sm leading-7 text-white/68">
          Return windows, footwear condition requirements, return shipping costs, refund timing, exchanges, damaged items, lost packages, and non-returnable items are explained in our Return & Refund Policy.
        </p>
        <a href="<?php echo esc_url($returns_url); ?>" class="mt-7 inline-flex min-h-12 items-center justify-center rounded-full bg-[#A96538] px-7 text-sm font-bold uppercase tracking-[0.08em] text-white transition hover:bg-white hover:text-[#121212]">
          View Return Policy
        </a>
      </article>
    </div>
  </section>

  <!-- ================= CUSTOMER RESPONSIBILITIES ================= -->
  <section class="bg-[#F4EEE6] py-16 sm:py-20 lg:py-24" aria-labelledby="customer-responsibilities-title">
    <div class="mx-auto grid max-w-7xl gap-12 px-5 sm:px-8 lg:grid-cols-[0.82fr_1.18fr] lg:px-10">
      <div>
        <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#A96538]">Customer Responsibilities</p>
        <h2 id="customer-responsibilities-title" class="mt-4 font-serif text-4xl font-semibold leading-tight text-[#121212] sm:text-5xl">
          Customers are responsible for accurate information and lawful use.
        </h2>
        <p class="mt-5 text-base leading-8 text-[#3A2418]/72">
          These responsibilities help us process orders, prevent avoidable shipping issues, reduce fraud, and provide support when something needs attention.
        </p>
      </div>

      <div class="rounded-[2rem] border border-[#3A2418]/10 bg-white p-6 shadow-sm">
        <ul class="grid gap-3 sm:grid-cols-2">
          <?php foreach ($customer_responsibilities as $item) : ?>
            <li class="flex gap-3 rounded-2xl border border-[#3A2418]/10 bg-[#F4EEE6] p-4 text-sm leading-6 text-[#3A2418]/72">
              <svg class="mt-1 h-4 w-4 shrink-0 text-[#A96538]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <?php echo $render_icon('check'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
              </svg>
              <span><?php echo esc_html($item); ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </section>

  <!-- ================= PROHIBITED USES ================= -->
  <section class="bg-white py-16 sm:py-20 lg:py-24" aria-labelledby="prohibited-uses-title">
    <div class="mx-auto grid max-w-7xl gap-12 px-5 sm:px-8 lg:grid-cols-[0.82fr_1.18fr] lg:px-10">
      <div>
        <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#A96538]">Prohibited Uses</p>
        <h2 id="prohibited-uses-title" class="mt-4 font-serif text-4xl font-semibold leading-tight text-[#121212] sm:text-5xl">
          The website may not be used for harmful, fraudulent, or unlawful activity.
        </h2>
        <p class="mt-5 text-base leading-8 text-[#3A2418]/72">
          We may suspend access, cancel orders, refuse service, or take other appropriate action when these terms are violated.
        </p>
      </div>

      <div class="rounded-[2rem] border border-[#3A2418]/10 bg-[#F4EEE6] p-6 shadow-sm">
        <ul class="grid gap-3">
          <?php foreach ($prohibited_uses as $item) : ?>
            <li class="flex gap-3 rounded-2xl border border-[#3A2418]/10 bg-white p-4 text-sm leading-6 text-[#3A2418]/72">
              <svg class="mt-1 h-4 w-4 shrink-0 text-[#A96538]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <?php echo $render_icon('check'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
              </svg>
              <span><?php echo esc_html($item); ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </section>

  <!-- ================= LEGAL DETAILS ================= -->
  <section class="bg-[#3A2418] py-16 text-white sm:py-20 lg:py-24" aria-labelledby="legal-details-title">
    <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
      <div class="mb-10 max-w-3xl">
        <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#B8955A]">Legal Details</p>
        <h2 id="legal-details-title" class="mt-4 font-serif text-4xl font-semibold leading-tight text-[#F4EEE6] sm:text-5xl">
          Additional terms for website use and purchases.
        </h2>
      </div>

      <div class="grid gap-5 md:grid-cols-2">
        <?php foreach ($legal_sections as $section) : ?>
          <article class="rounded-3xl border border-white/10 bg-white/[0.06] p-6">
            <h3 class="font-serif text-2xl font-semibold text-[#F4EEE6]"><?php echo esc_html($section['title']); ?></h3>
            <p class="mt-3 text-sm leading-7 text-white/68"><?php echo esc_html($section['copy']); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ================= PRIVACY / CHANGES / GOVERNING LAW ================= -->
  <section class="bg-[#F4EEE6] py-16 sm:py-20 lg:py-24" aria-labelledby="terms-final-title">
    <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
      <div class="grid gap-5 md:grid-cols-3">
        <article class="rounded-3xl border border-[#3A2418]/10 bg-white p-6 shadow-sm">
          <h2 id="terms-final-title" class="font-serif text-2xl font-semibold text-[#121212]">Privacy</h2>
          <p class="mt-3 text-sm leading-7 text-[#3A2418]/72">
            Personal information submitted through the website is handled according to our Privacy Policy.
          </p>
          <a href="<?php echo esc_url($privacy_url); ?>" class="mt-5 inline-flex text-sm font-bold text-[#A96538] transition hover:text-[#121212]">View Privacy Policy</a>
        </article>

        <article class="rounded-3xl border border-[#3A2418]/10 bg-white p-6 shadow-sm">
          <h2 class="font-serif text-2xl font-semibold text-[#121212]">Changes To These Terms</h2>
          <p class="mt-3 text-sm leading-7 text-[#3A2418]/72">
            We may update these Terms & Conditions from time to time. The latest version will be posted on this page with the last updated date.
          </p>
        </article>

        <article class="rounded-3xl border border-[#3A2418]/10 bg-white p-6 shadow-sm">
          <h2 class="font-serif text-2xl font-semibold text-[#121212]">Governing Law</h2>
          <p class="mt-3 text-sm leading-7 text-[#3A2418]/72">
            These terms are governed by applicable laws in the jurisdiction where Handed Shoes operates, without limiting any mandatory consumer protection rights that may apply to you.
          </p>
        </article>
      </div>
    </div>
  </section>

  <!-- ================= CONTACT ================= -->
  <section class="bg-[#121212] py-16 text-white sm:py-20 lg:py-24" aria-labelledby="terms-contact-title">
    <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
      <div class="rounded-[2rem] border border-white/10 bg-white/[0.06] p-6 sm:p-8">
        <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
          <div>
            <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#B8955A]">Contact Information</p>
            <h2 id="terms-contact-title" class="mt-3 font-serif text-4xl font-semibold text-[#F4EEE6]">Questions about these Terms & Conditions?</h2>
            <p class="mt-4 text-sm leading-7 text-white/70">
              Email <a class="font-bold text-[#B8955A] underline decoration-[#B8955A]/40 underline-offset-4 transition hover:text-white" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a> or use our contact page. Business hours: <?php echo esc_html($business_hours); ?>. <?php echo esc_html($response_time); ?>
            </p>
            <div class="mt-6 grid gap-3 sm:grid-cols-2 lg:max-w-3xl">
              <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                <p class="text-xs font-bold uppercase tracking-[0.12em] text-[#B8955A]">Store Name</p>
                <p class="mt-2 text-sm font-bold leading-6 text-white/90"><?php echo esc_html($store_name); ?></p>
              </div>
              <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                <p class="text-xs font-bold uppercase tracking-[0.12em] text-[#B8955A]">Website</p>
                <p class="mt-2 text-sm font-bold leading-6 text-white/90"><?php echo esc_html($website_domain); ?></p>
              </div>
              <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                <p class="text-xs font-bold uppercase tracking-[0.12em] text-[#B8955A]">Email</p>
                <p class="mt-2 text-sm font-bold leading-6 text-white/90"><?php echo esc_html($support_email); ?></p>
              </div>
              <a href="<?php echo esc_url($track_url); ?>" class="rounded-2xl border border-white/10 bg-white/5 p-4 text-sm font-bold leading-6 text-white/90 transition hover:border-[#B8955A] hover:text-[#B8955A]">Track Order</a>
            </div>
          </div>

          <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#A96538] px-7 text-sm font-bold uppercase tracking-[0.08em] text-white transition hover:bg-white hover:text-[#121212]">
            Contact Support
          </a>
        </div>
      </div>
    </div>
  </section>
</main>
