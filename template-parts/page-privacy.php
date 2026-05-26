<?php
/**
 * Handed Shoes - Privacy Policy Page
 * GMC-safe privacy policy with clear data use, payment, cookies, rights, and contact details.
 */

if (!defined('ABSPATH')) {
    exit;
}

$store_name     = 'Handed Shoes';
$website_domain = 'handedshoes.com';
$support_email  = 'support@handedshoes.com';
$contact_url    = home_url('/contact-us/');
$terms_url      = home_url('/terms-conditions/');
$shipping_url   = home_url('/shipping-policy/');
$returns_url    = home_url('/refund-return-policy/');
$business_hours = 'Monday - Friday, 9:00 AM - 5:00 PM, GMT-08:00 Pacific Standard Time (Los Angeles)';
$response_time  = 'We aim to reply within 1 business day.';
$last_updated   = 'May 27, 2026';

$summary_cards = [
    [
        'label' => 'Secure Checkout',
        'copy'  => 'Payment information is handled through secure payment providers and is not stored in full by us.',
        'icon'  => 'lock',
    ],
    [
        'label' => 'Order Support',
        'copy'  => 'We use order details to process purchases, ship products, prevent fraud, and help customers.',
        'icon'  => 'box',
    ],
    [
        'label' => 'Clear Contact',
        'copy'  => 'Customers can contact us by email or through our contact page for privacy questions.',
        'icon'  => 'mail',
    ],
];

$information_collected = [
    'Contact information such as name, email address, phone number, billing address, and shipping address.',
    'Order information such as products purchased, order number, transaction status, returns, refunds, and support history.',
    'Payment-related information needed to complete checkout. Full payment card details are processed by secure payment providers.',
    'Device and usage information such as IP address, browser type, device type, pages viewed, referring URLs, approximate location, and cookie identifiers.',
    'Messages, form submissions, product questions, return requests, reviews, or other information you choose to send to us.',
];

$use_cases = [
    'Process, confirm, ship, deliver, return, exchange, and refund orders.',
    'Send order confirmations, shipping updates, support replies, policy notices, and service communications.',
    'Screen orders and website activity for fraud, abuse, chargebacks, security issues, or policy violations.',
    'Improve our website, product pages, checkout flow, customer support, inventory planning, and advertising measurement.',
    'Comply with legal, tax, accounting, payment network, and regulatory requirements.',
];

$sharing_cases = [
    'Payment processors and checkout providers for secure payment processing.',
    'Shipping carriers, fulfillment partners, and order management providers for delivery and returns.',
    'Website hosting, analytics, email, customer support, fraud prevention, and security service providers.',
    'Professional advisers, payment networks, banks, law enforcement, regulators, or courts when required by law or needed to protect our rights.',
    'Advertising and measurement partners where permitted by law and cookie preferences.',
];

$rights = [
    'Request access to the personal information we hold about you.',
    'Request correction of inaccurate or incomplete information.',
    'Request deletion of personal information where legally permitted.',
    'Opt out of certain marketing communications.',
    'Request information about how your data is used or shared.',
];

$render_icon = static function ($icon) {
    $icons = [
        'lock'   => '<rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/>',
        'box'    => '<path d="M21 16V8a2 2 0 0 0-1-1.73L13 2.27a2 2 0 0 0-2 0L4 6.27A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><path d="M3.27 6.96 12 12.01l8.73-5.05"/><path d="M12 22.08V12"/>',
        'mail'   => '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-10 6L2 7"/>',
        'check'  => '<path d="m20 6-11 11-5-5"/>',
        'shield' => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>',
        'eye'    => '<path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z"/><circle cx="12" cy="12" r="3"/>',
        'file'   => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6"/><path d="M16 13H8"/><path d="M16 17H8"/><path d="M10 9H8"/>',
    ];

    return $icons[$icon] ?? $icons['check'];
};
?>

<main class="bg-[#F4EEE6] text-[#121212]">
  <!-- ================= HERO ================= -->
  <section class="relative overflow-hidden bg-[#121212] text-white" aria-labelledby="privacy-policy-title">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(169,101,56,0.32),transparent_36%),linear-gradient(135deg,#121212_0%,#3A2418_60%,#121212_100%)]"></div>
    <div class="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-[#F4EEE6] to-transparent"></div>

    <div class="relative mx-auto grid max-w-7xl items-end gap-12 px-5 py-20 sm:px-8 lg:grid-cols-[0.9fr_1.1fr] lg:px-10 lg:py-28">
      <div>
        <p class="text-xs font-bold uppercase tracking-[0.22em] text-[#B8955A]">Privacy Policy</p>
        <h1 id="privacy-policy-title" class="mt-5 font-serif text-5xl font-semibold leading-[1.02] text-[#F4EEE6] sm:text-6xl lg:text-7xl">
          Clear Privacy Details For Your Shopping Experience
        </h1>
        <p class="mt-6 max-w-2xl text-base leading-8 text-white/72 sm:text-lg">
          This Privacy Policy explains how <?php echo esc_html($store_name); ?> collects, uses, shares, protects, and retains personal information when you visit <?php echo esc_html($website_domain); ?>, place an order, contact support, or use our services.
        </p>
        <p class="mt-5 text-sm leading-7 text-white/60">Last updated: <?php echo esc_html($last_updated); ?></p>
        <div class="mt-8 flex flex-col gap-3 sm:flex-row">
          <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#A96538] px-7 text-sm font-bold uppercase tracking-[0.08em] text-white transition hover:bg-white hover:text-[#121212]">
            Contact Privacy Support
          </a>
          <a href="<?php echo esc_url($terms_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#A96538] px-7 text-sm font-bold uppercase tracking-[0.08em] text-[#F4EEE6] transition hover:bg-[#A96538] hover:text-white">
            View Terms
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

  <!-- ================= OVERVIEW ================= -->
  <section class="bg-[#F4EEE6] py-16 sm:py-20 lg:py-24" aria-labelledby="privacy-overview-title">
    <div class="mx-auto grid max-w-7xl gap-12 px-5 sm:px-8 lg:grid-cols-[0.82fr_1.18fr] lg:px-10">
      <div>
        <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#A96538]">Policy Overview</p>
        <h2 id="privacy-overview-title" class="mt-4 font-serif text-4xl font-semibold leading-tight text-[#121212] sm:text-5xl">
          We collect only the information needed to operate our store and support customers.
        </h2>
        <p class="mt-5 text-base leading-8 text-[#3A2418]/72">
          We use personal information to process orders, provide shipping and return support, maintain website security, prevent fraud, improve our services, and comply with legal obligations. We do not sell full payment card details, and we do not knowingly collect personal information from children.
        </p>
      </div>

      <div class="rounded-[2rem] border border-[#3A2418]/10 bg-white p-6 shadow-sm">
        <h3 class="font-serif text-3xl font-semibold text-[#121212]">Information We Collect</h3>
        <ul class="mt-6 grid gap-3">
          <?php foreach ($information_collected as $item) : ?>
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

  <!-- ================= USE / SHARE ================= -->
  <section class="bg-white py-16 sm:py-20 lg:py-24" aria-labelledby="privacy-use-title">
    <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
      <div class="mb-10 max-w-3xl">
        <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#A96538]">Data Use And Sharing</p>
        <h2 id="privacy-use-title" class="mt-4 font-serif text-4xl font-semibold leading-tight text-[#121212] sm:text-5xl">
          We use customer data for clear business purposes.
        </h2>
      </div>

      <div class="grid gap-6 lg:grid-cols-2">
        <article class="rounded-[2rem] border border-[#3A2418]/10 bg-[#F4EEE6] p-6 shadow-sm">
          <div class="flex h-11 w-11 items-center justify-center rounded-full bg-white text-[#A96538]">
            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <?php echo $render_icon('file'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            </svg>
          </div>
          <h3 class="mt-5 font-serif text-2xl font-semibold text-[#121212]">How We Use Information</h3>
          <ul class="mt-5 grid gap-3">
            <?php foreach ($use_cases as $item) : ?>
              <li class="flex gap-3 text-sm leading-7 text-[#3A2418]/72">
                <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-[#A96538]"></span>
                <span><?php echo esc_html($item); ?></span>
              </li>
            <?php endforeach; ?>
          </ul>
        </article>

        <article class="rounded-[2rem] border border-[#3A2418]/10 bg-[#F4EEE6] p-6 shadow-sm">
          <div class="flex h-11 w-11 items-center justify-center rounded-full bg-white text-[#A96538]">
            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <?php echo $render_icon('shield'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            </svg>
          </div>
          <h3 class="mt-5 font-serif text-2xl font-semibold text-[#121212]">When We Share Information</h3>
          <ul class="mt-5 grid gap-3">
            <?php foreach ($sharing_cases as $item) : ?>
              <li class="flex gap-3 text-sm leading-7 text-[#3A2418]/72">
                <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-[#A96538]"></span>
                <span><?php echo esc_html($item); ?></span>
              </li>
            <?php endforeach; ?>
          </ul>
        </article>
      </div>
    </div>
  </section>

  <!-- ================= COOKIES / SECURITY / RETENTION ================= -->
  <section class="bg-[#121212] py-16 text-white sm:py-20 lg:py-24" aria-labelledby="privacy-cookies-title">
    <div class="mx-auto grid max-w-7xl gap-6 px-5 sm:px-8 lg:grid-cols-3 lg:px-10">
      <article class="rounded-[2rem] border border-white/10 bg-white/[0.06] p-6">
        <div class="flex h-11 w-11 items-center justify-center rounded-full bg-[#A96538] text-white">
          <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <?php echo $render_icon('eye'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
          </svg>
        </div>
        <p class="mt-5 text-xs font-bold uppercase tracking-[0.2em] text-[#B8955A]">Cookies</p>
        <h2 id="privacy-cookies-title" class="mt-3 font-serif text-3xl font-semibold text-[#F4EEE6]">Cookies help the site work.</h2>
        <p class="mt-4 text-sm leading-7 text-white/68">
          We may use cookies, pixels, tags, and similar technologies to keep carts working, remember preferences, measure site performance, protect against fraud, and understand how visitors use our website. You can control cookies through your browser settings, but some features may not work properly if cookies are disabled.
        </p>
      </article>

      <article class="rounded-[2rem] border border-white/10 bg-white/[0.06] p-6">
        <div class="flex h-11 w-11 items-center justify-center rounded-full bg-[#A96538] text-white">
          <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <?php echo $render_icon('lock'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
          </svg>
        </div>
        <p class="mt-5 text-xs font-bold uppercase tracking-[0.2em] text-[#B8955A]">Security</p>
        <h2 class="mt-3 font-serif text-3xl font-semibold text-[#F4EEE6]">We use reasonable safeguards.</h2>
        <p class="mt-4 text-sm leading-7 text-white/68">
          We use administrative, technical, and organizational safeguards designed to protect personal information. No online system is completely secure, so customers should use strong passwords and contact us if they suspect unauthorized account or order activity.
        </p>
      </article>

      <article class="rounded-[2rem] border border-white/10 bg-white/[0.06] p-6">
        <div class="flex h-11 w-11 items-center justify-center rounded-full bg-[#A96538] text-white">
          <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <?php echo $render_icon('file'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
          </svg>
        </div>
        <p class="mt-5 text-xs font-bold uppercase tracking-[0.2em] text-[#B8955A]">Retention</p>
        <h2 class="mt-3 font-serif text-3xl font-semibold text-[#F4EEE6]">We retain data only as needed.</h2>
        <p class="mt-4 text-sm leading-7 text-white/68">
          We keep personal information for as long as needed to provide services, complete transactions, support returns and refunds, prevent fraud, meet tax and accounting obligations, resolve disputes, and comply with applicable law.
        </p>
      </article>
    </div>
  </section>

  <!-- ================= RIGHTS ================= -->
  <section class="bg-[#F4EEE6] py-16 sm:py-20 lg:py-24" aria-labelledby="privacy-rights-title">
    <div class="mx-auto grid max-w-7xl gap-12 px-5 sm:px-8 lg:grid-cols-[0.82fr_1.18fr] lg:px-10">
      <div>
        <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#A96538]">Your Choices And Rights</p>
        <h2 id="privacy-rights-title" class="mt-4 font-serif text-4xl font-semibold leading-tight text-[#121212] sm:text-5xl">
          You can contact us about privacy requests.
        </h2>
        <p class="mt-5 text-base leading-8 text-[#3A2418]/72">
          Depending on your location and applicable privacy laws, you may have rights regarding your personal information. We may need to verify your identity before completing a request.
        </p>
        <p class="mt-4 text-sm leading-7 text-[#3A2418]/60">
          This website is intended for customers who are at least the age of majority in their jurisdiction. We do not knowingly collect personal information from children under 13.
        </p>
      </div>

      <div class="rounded-[2rem] border border-[#3A2418]/10 bg-white p-6 shadow-sm">
        <ul class="grid gap-3 sm:grid-cols-2">
          <?php foreach ($rights as $item) : ?>
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

  <!-- ================= POLICY LINKS / CONTACT ================= -->
  <section class="bg-[#3A2418] py-16 text-white sm:py-20 lg:py-24" aria-labelledby="privacy-contact-title">
    <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
      <div class="rounded-[2rem] border border-white/10 bg-white/[0.06] p-6 sm:p-8">
        <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
          <div>
            <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#B8955A]">Questions Or Requests</p>
            <h2 id="privacy-contact-title" class="mt-3 font-serif text-4xl font-semibold text-[#F4EEE6]">Contact us about this Privacy Policy.</h2>
            <p class="mt-4 text-sm leading-7 text-white/70">
              Email <a class="font-bold text-[#B8955A] underline decoration-[#B8955A]/40 underline-offset-4 transition hover:text-white" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a> or use our contact page. Business hours: <?php echo esc_html($business_hours); ?>. <?php echo esc_html($response_time); ?>
            </p>
            <div class="mt-6 grid gap-3 sm:grid-cols-2 lg:max-w-3xl">
              <a href="<?php echo esc_url($shipping_url); ?>" class="rounded-2xl border border-white/10 bg-white/5 p-4 text-sm font-bold text-white/90 transition hover:border-[#B8955A] hover:text-[#B8955A]">Shipping Policy</a>
              <a href="<?php echo esc_url($returns_url); ?>" class="rounded-2xl border border-white/10 bg-white/5 p-4 text-sm font-bold text-white/90 transition hover:border-[#B8955A] hover:text-[#B8955A]">Return & Refund Policy</a>
              <a href="<?php echo esc_url($terms_url); ?>" class="rounded-2xl border border-white/10 bg-white/5 p-4 text-sm font-bold text-white/90 transition hover:border-[#B8955A] hover:text-[#B8955A]">Terms & Conditions</a>
              <div class="rounded-2xl border border-white/10 bg-white/5 p-4 text-sm font-bold text-white/90"><?php echo esc_html($website_domain); ?></div>
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
