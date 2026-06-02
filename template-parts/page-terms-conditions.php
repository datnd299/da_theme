<?php
/**
 * Handed Shoes - Terms & Conditions Page
 * Store terms for site use, purchases, payment, policies, and customer conduct.
 */

if (!defined('ABSPATH')) {
    exit;
}

$store_name     = 'Handed Shoes';
$website_domain = 'handedshoes.com';
$support_email  = 'support@handedshoes.com';
$business_address = function_exists('dawp_get_store_address') ? dawp_get_store_address() : '';
$contact_url    = home_url('/contact-us/');
$shipping_url   = home_url('/shipping-policy/');
$return_url     = home_url('/refund-return-policy/');
$shop_url       = home_url('/shop/');
$last_updated   = 'May 22, 2026';
$business_hours = 'Monday - Friday, 9:00 AM - 5:00 PM EST';

$prohibited_uses = [
    'Placing fraudulent orders, abusing chargebacks, or using unauthorized payment methods.',
    'Attempting to breach, interfere with, or bypass the Site\'s security, checkout systems, or payment networks.',
    'Using automated tools, such as bots, scrapers, or spiders, to copy, harvest, or resell our website content, images, product descriptions, or branding without our express written consent.',
    'Transmitting any malicious code, viruses, or harmful content.',
];

$contact_details = [
    [
        'label' => 'Brand Name',
        'value' => $store_name,
    ],
    [
        'label' => 'Customer Support Email',
        'value' => $support_email,
    ],
    [
        'label' => 'Business Address',
        'value' => $business_address,
    ],
    [
        'label' => 'Contact Page',
        'value' => 'Contact Us',
        'url'   => $contact_url,
    ],
    [
        'label' => 'Business Hours',
        'value' => $business_hours,
    ],
];
?>

<main class="bg-[#F4F5F6] text-[#0B0B0D]">
  <section class="relative overflow-hidden bg-[#0B0B0D] text-white" aria-labelledby="terms-conditions-cover-title">
    <div class="absolute inset-0 bg-[linear-gradient(135deg,rgba(11,11,13,0.98)_0%,rgba(26,26,29,0.9)_52%,rgba(11,11,13,0.96)_100%)]"></div>
    <div class="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-[#F4F5F6] to-transparent"></div>

    <div class="relative mx-auto max-w-7xl px-5 py-16 sm:px-8 sm:py-20 lg:px-10 lg:py-24">
      <div class="max-w-4xl">
        <p class="text-xs font-bold uppercase tracking-[0.22em] text-white/60">Terms &amp; Conditions</p>
        <h1 id="terms-conditions-cover-title" class="mt-5 max-w-3xl font-serif text-5xl font-semibold leading-[1.02] text-[#F4F5F6] sm:text-6xl lg:text-7xl">
          Terms For Using Handed Shoes
        </h1>
        <p class="mt-6 max-w-2xl text-base leading-8 text-white/72 sm:text-lg">
          Welcome to <?php echo esc_html($store_name); ?>! These Terms &amp; Conditions ("Terms") govern your use of our website <?php echo esc_html($website_domain); ?> (the "Site") and any purchases you make from our online store.
        </p>
        <div class="mt-8 flex flex-col gap-3 sm:flex-row">
          <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-white px-7 text-sm font-bold uppercase tracking-[0.08em] text-[#0B0B0D] transition hover:bg-[#D9DADD]">
            Shop Handed Shoes
          </a>
          <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-white/35 px-7 text-sm font-bold uppercase tracking-[0.08em] text-white transition hover:bg-white hover:text-[#0B0B0D]">
            Contact Support
          </a>
        </div>
      </div>
    </div>
  </section>

  <div class="mx-auto max-w-7xl px-5 py-14 sm:px-8 sm:py-16 lg:px-10 lg:py-20">
    <section class="rounded-[1.75rem] border border-[#D9DADD] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="terms-intro-title">
      <p class="text-xs font-bold uppercase tracking-[0.22em] text-[#5B5D63]">Last updated: <?php echo esc_html($last_updated); ?></p>
      <h2 id="terms-intro-title" class="mt-4 font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        Agreement To These Terms
      </h2>
      <p class="mt-5 text-base leading-8 text-[#5B5D63]">
        By accessing the Site, creating an account, or placing an order, you agree to be bound by these Terms. If you do not agree to these Terms, please do not use our Site or services.
      </p>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-[#F4F5F6] p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="eligibility-title">
      <p class="text-sm font-bold uppercase tracking-[0.14em] text-[#5B5D63]">1. Eligibility</p>
      <h2 id="eligibility-title" class="mt-3 font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        Eligibility
      </h2>
      <p class="mt-5 text-base leading-8 text-[#5B5D63]">
        To use this Site and purchase products, you must be at least the age of majority in your country, state, or province of residence. If you are under the age of majority, you may only use this Site under the supervision of a parent or legal guardian.
      </p>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="product-info-title">
      <p class="text-sm font-bold uppercase tracking-[0.14em] text-[#5B5D63]">2. Product Information and Pricing</p>
      <h2 id="product-info-title" class="mt-3 font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        Product Information and Pricing
      </h2>
      <div class="mt-6 grid gap-4 md:grid-cols-3">
        <article class="rounded-2xl border border-[#D9DADD] bg-[#F4F5F6] p-5 sm:p-6">
          <h3 class="text-xl font-semibold text-[#0B0B0D]">Accuracy</h3>
          <p class="mt-4 text-base leading-8 text-[#5B5D63]">
            We make every effort to display the colors, features, specifications, and prices of our products as accurately as possible. However, slight variations in color or details may occur due to your monitor settings or photographic lighting.
          </p>
        </article>
        <article class="rounded-2xl border border-[#D9DADD] bg-[#F4F5F6] p-5 sm:p-6">
          <h3 class="text-xl font-semibold text-[#0B0B0D]">Pricing &amp; Taxes</h3>
          <p class="mt-4 text-base leading-8 text-[#5B5D63]">
            All prices displayed on our Site are in USD. Product prices, applicable sales taxes, and shipping fees will be clearly calculated and displayed at checkout before you finalize your payment. There are no hidden fees.
          </p>
        </article>
        <article class="rounded-2xl border border-[#D9DADD] bg-[#F4F5F6] p-5 sm:p-6">
          <h3 class="text-xl font-semibold text-[#0B0B0D]">Availability</h3>
          <p class="mt-4 text-base leading-8 text-[#5B5D63]">
            Prices and product availability are subject to change without notice. In the event that an item becomes unavailable after an order is placed, we will contact you immediately to offer a replacement, backorder option, or a full refund.
          </p>
        </article>
      </div>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-[#F4F5F6] p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="orders-payment-title">
      <p class="text-sm font-bold uppercase tracking-[0.14em] text-[#5B5D63]">3. Orders and Payment Terms</p>
      <h2 id="orders-payment-title" class="mt-3 font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        Orders and Payment Terms
      </h2>
      <div class="mt-6 grid gap-4 md:grid-cols-3">
        <article class="rounded-2xl border border-[#D9DADD] bg-white p-5 sm:p-6">
          <h3 class="text-xl font-semibold text-[#0B0B0D]">Order Review</h3>
          <p class="mt-4 text-base leading-8 text-[#5B5D63]">
            You are strictly responsible for reviewing all product details, footwear sizes, quantities, billing/shipping addresses, and contact details before completing your purchase.
          </p>
        </article>
        <article class="rounded-2xl border border-[#D9DADD] bg-white p-5 sm:p-6">
          <h3 class="text-xl font-semibold text-[#0B0B0D]">Secure Payment</h3>
          <p class="mt-4 text-base leading-8 text-[#5B5D63]">
            We accept the authorized payment methods listed dynamically at our checkout. All payments are processed through secure, PCI-DSS compliant third-party payment gateways. We do not store or have access to your full payment card details on our servers.
          </p>
        </article>
        <article class="rounded-2xl border border-[#D9DADD] bg-white p-5 sm:p-6">
          <h3 class="text-xl font-semibold text-[#0B0B0D]">Order Acceptance</h3>
          <p class="mt-4 text-base leading-8 text-[#5B5D63]">
            Receiving an order confirmation email does not signify our final acceptance of your order. We reserve the right to refuse, limit, or cancel any order for legitimate business reasons, including product stockouts, suspected payment fraud, unauthorized transactions, pricing errors, or shipping restrictions. If your order is canceled after payment, you will receive a full refund.
          </p>
        </article>
      </div>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="store-policies-title">
      <p class="text-sm font-bold uppercase tracking-[0.14em] text-[#5B5D63]">4. Shipping, Returns, and Store Policies</p>
      <h2 id="store-policies-title" class="mt-3 font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        Shipping, Returns, and Store Policies
      </h2>
      <p class="mt-5 text-base leading-8 text-[#5B5D63]">
        Your purchases are further governed by our dedicated store policies, which are incorporated into these Terms by reference. Please review them directly via the active hyperlinks below:
      </p>
      <div class="mt-6 grid gap-4 md:grid-cols-2">
        <article class="rounded-2xl border border-[#D9DADD] bg-[#F4F5F6] p-5 sm:p-6">
          <h3 class="text-xl font-semibold text-[#0B0B0D]">Shipping Policy</h3>
          <p class="mt-4 text-base leading-8 text-[#5B5D63]">
            Explains processing times, delivery estimates, tracking info, and address responsibilities.
          </p>
          <a href="<?php echo esc_url($shipping_url); ?>" class="mt-5 inline-flex min-h-12 items-center justify-center rounded-full border border-[#0B0B0D] px-7 text-sm font-bold text-[#0B0B0D] transition hover:bg-[#0B0B0D] hover:text-white">
            View Shipping Policy
          </a>
        </article>
        <article class="rounded-2xl border border-[#D9DADD] bg-[#F4F5F6] p-5 sm:p-6">
          <h3 class="text-xl font-semibold text-[#0B0B0D]">Return &amp; Refund Policy</h3>
          <p class="mt-4 text-base leading-8 text-[#5B5D63]">
            Outlines return windows, footwear condition requirements for returns, and refund processing timelines.
          </p>
          <a href="<?php echo esc_url($return_url); ?>" class="mt-5 inline-flex min-h-12 items-center justify-center rounded-full border border-[#0B0B0D] px-7 text-sm font-bold text-[#0B0B0D] transition hover:bg-[#0B0B0D] hover:text-white">
            View Return &amp; Refund Policy
          </a>
        </article>
      </div>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-[#F4F5F6] p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="prohibited-uses-title">
      <p class="text-sm font-bold uppercase tracking-[0.14em] text-[#5B5D63]">5. Prohibited Uses and Customer Conduct</p>
      <h2 id="prohibited-uses-title" class="mt-3 font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        Prohibited Uses and Customer Conduct
      </h2>
      <p class="mt-5 text-base leading-8 text-[#5B5D63]">
        You agree to use our Site only for lawful purposes. You are strictly prohibited from:
      </p>
      <ul class="mt-5 grid gap-3 text-base leading-7 text-[#5B5D63]">
        <?php foreach ($prohibited_uses as $item) : ?>
          <li class="flex gap-3">
            <span class="mt-3 h-1.5 w-1.5 shrink-0 rounded-full bg-[#5B5D63]"></span>
            <span><?php echo esc_html($item); ?></span>
          </li>
        <?php endforeach; ?>
      </ul>
      <div class="mt-6 border-l-4 border-[#D2A64A] bg-[#FFF8E8] px-5 py-5 text-base leading-8 text-[#5B5D63] sm:px-6">
        Violation of these provisions may result in the immediate suspension of your access, cancellation of pending orders, and potential legal action.
      </div>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="intellectual-property-title">
      <p class="text-sm font-bold uppercase tracking-[0.14em] text-[#5B5D63]">6. Intellectual Property</p>
      <h2 id="intellectual-property-title" class="mt-3 font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        Intellectual Property
      </h2>
      <p class="mt-5 text-base leading-8 text-[#5B5D63]">
        All content on this Site&mdash;including logos, branding, text, graphic designs, product photography, icons, layout, and software&mdash;is the exclusive property of <?php echo esc_html($store_name); ?> or its licensors and is protected by international copyright, trademark, and intellectual property laws.
      </p>
    </section>

    <section class="mt-6 grid gap-6 lg:grid-cols-2">
      <article class="rounded-[1.75rem] border border-[#D9DADD] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="liability-title">
        <p class="text-sm font-bold uppercase tracking-[0.14em] text-[#5B5D63]">7. Limitation of Liability</p>
        <h2 id="liability-title" class="mt-3 font-serif text-4xl font-semibold leading-tight text-[#0B0B0D]">
          Limitation of Liability
        </h2>
        <p class="mt-5 text-base leading-8 text-[#5B5D63]">
          To the maximum extent permitted by applicable law, <?php echo esc_html($store_name); ?> shall not be liable for any indirect, incidental, special, consequential, or punitive damages arising out of or related to your use of the Site, shipping delays, product fitment issues, or service interruptions.
        </p>
      </article>

      <article class="rounded-[1.75rem] border border-[#D9DADD] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="governing-law-title">
        <p class="text-sm font-bold uppercase tracking-[0.14em] text-[#5B5D63]">8. Governing Law</p>
        <h2 id="governing-law-title" class="mt-3 font-serif text-4xl font-semibold leading-tight text-[#0B0B0D]">
          Governing Law
        </h2>
        <p class="mt-5 text-base leading-8 text-[#5B5D63]">
          These Terms &amp; Conditions and any separate agreements whereby we provide you services shall be governed by, and construed in accordance with, the laws of California, USA.
        </p>
      </article>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-[#F4F5F6] p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="terms-contact-title">
      <p class="text-sm font-bold uppercase tracking-[0.14em] text-[#5B5D63]">9. Contact Information</p>
      <h2 id="terms-contact-title" class="mt-3 font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        Contact Information
      </h2>
      <p class="mt-5 text-base leading-8 text-[#5B5D63]">
        If you have any questions or require clarification regarding these Terms &amp; Conditions, please contact us using our official business channels below:
      </p>
      <div class="mt-8 rounded-3xl border border-[#D9DADD] bg-white p-5 sm:p-6">
        <div class="grid gap-4 md:grid-cols-2">
          <?php foreach ($contact_details as $detail) : ?>
            <article class="rounded-2xl border border-[#D9DADD] bg-[#F4F5F6] p-5">
              <h3 class="text-sm font-bold text-[#0B0B0D]"><?php echo esc_html($detail['label']); ?></h3>
              <?php if (!empty($detail['url'])) : ?>
                <a href="<?php echo esc_url($detail['url']); ?>" class="mt-3 inline-flex text-sm font-bold leading-7 text-[#0B0B0D] underline decoration-[#D2A64A] decoration-2 underline-offset-4 hover:text-[#5B5D63]">
                  <?php echo esc_html($detail['value']); ?>
                </a>
              <?php else : ?>
                <p class="mt-3 text-sm leading-7 text-[#5B5D63]"><?php echo esc_html($detail['value']); ?></p>
              <?php endif; ?>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="mt-8 flex flex-col gap-3 sm:flex-row">
        <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#0B0B0D] px-7 text-sm font-bold text-white transition hover:bg-[#2F3033]">
          Contact Us
        </a>
        <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#0B0B0D] px-7 text-sm font-bold text-[#0B0B0D] transition hover:bg-[#0B0B0D] hover:text-white">
          <?php echo esc_html($support_email); ?>
        </a>
      </div>
    </section>
  </div>
</main>
