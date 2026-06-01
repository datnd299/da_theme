<?php
/**
 * Handed Shoes - Terms & Conditions Page
 * Policy content adapted for site usage, online orders, payments, and customer support.
 */

if (!defined('ABSPATH')) {
    exit;
}

$store_name     = 'Handed Shoes';
$website_domain = 'handedshoes.com';
$support_email  = 'support@handedshoes.com';
$store_address  = '912 Airport Center Rd, Allentown, PA 18109';
$contact_url    = home_url('/contact-us/');
$shop_url       = home_url('/shop/');
$shipping_url   = home_url('/shipping-policy/');
$return_url     = home_url('/refund-return-policy/');
$currency       = 'USD';
$governing_law  = 'Pennsylvania, USA';
$last_updated   = 'May 27, 2026';

$prohibited_uses = [
    'Placing fraudulent orders, abusing chargebacks, or using unauthorized payment methods.',
    'Attempting to breach, interfere with, or bypass the Site security, checkout systems, or payment networks.',
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
        'value' => $store_address,
    ],
    [
        'label' => 'Contact Page',
        'value' => 'Contact Us page',
    ],
];
?>

<main class="bg-[#F4F5F6] py-14 text-[#0B0B0D] sm:py-16 lg:py-20">
  <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
    <section class="rounded-[1.75rem] border border-[#D9DADD] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="terms-title">
      <p class="text-xs font-bold uppercase tracking-[0.22em] text-[#5B5D63]">Last updated: <?php echo esc_html($last_updated); ?></p>
      <h1 id="terms-title" class="mt-4 font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        Terms &amp; Conditions
      </h1>
      <p class="mt-5 text-base leading-8 text-[#5B5D63]">
        Welcome to <?php echo esc_html($store_name); ?>! These Terms &amp; Conditions ("Terms") govern your use of our website <?php echo esc_html($website_domain); ?> (the "Site") and any purchases you make from our online store.
      </p>
      <p class="mt-4 text-base leading-8 text-[#5B5D63]">
        By accessing the Site, creating an account, or placing an order, you agree to be bound by these Terms. If you do not agree to these Terms, please do not use our Site or services.
      </p>
      <div class="mt-8 flex flex-col gap-3 sm:flex-row">
        <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#0B0B0D] px-7 text-sm font-bold text-white transition hover:bg-[#2F3033]">
          Shop Handed Shoes
        </a>
        <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#0B0B0D] px-7 text-sm font-bold text-[#0B0B0D] transition hover:bg-[#0B0B0D] hover:text-white">
          Contact Support
        </a>
      </div>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-[#F4F5F6] p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="eligibility-title">
      <h2 id="eligibility-title" class="font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        1. Eligibility
      </h2>
      <p class="mt-5 text-base leading-8 text-[#5B5D63]">
        To use this Site and purchase products, you must be at least the age of majority in your country, state, or province of residence. If you are under the age of majority, you may only use this Site under the supervision of a parent or legal guardian.
      </p>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="product-pricing-title">
      <h2 id="product-pricing-title" class="font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        2. Product Information and Pricing
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
            All prices displayed on our Site are in <?php echo esc_html($currency); ?>. Product prices, applicable sales taxes, and shipping fees will be clearly calculated and displayed at checkout before you finalize your payment. There are no hidden fees.
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
      <h2 id="orders-payment-title" class="font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        3. Orders and Payment Terms
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
            We accept the authorized payment methods listed dynamically at our checkout. All payments are processed through secure, PCI-DSS compliant third-party payment gateways. We do not store or have access to your full payment card details.
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

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="shipping-returns-title">
      <h2 id="shipping-returns-title" class="font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        4. Shipping, Returns, and Refunds
      </h2>
      <p class="mt-5 text-base leading-8 text-[#5B5D63]">
        Your purchases are further governed by our dedicated store policies, which are incorporated into these Terms by reference. Please review them directly via the active links below:
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
            View Return Policy
          </a>
        </article>
      </div>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-[#F4F5F6] p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="prohibited-title">
      <h2 id="prohibited-title" class="font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        5. Prohibited Uses and Customer Conduct
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

    <section class="mt-6 grid gap-6 lg:grid-cols-2">
      <article class="rounded-[1.75rem] border border-[#D9DADD] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="intellectual-property-title">
        <h2 id="intellectual-property-title" class="font-serif text-4xl font-semibold leading-tight text-[#0B0B0D]">
          6. Intellectual Property
        </h2>
        <p class="mt-5 text-base leading-8 text-[#5B5D63]">
          All content on this Site, including logos, branding, text, graphic designs, product photography, icons, layout, and software, is the exclusive property of <?php echo esc_html($store_name); ?> or its licensors and is protected by international copyright, trademark, and intellectual property laws.
        </p>
      </article>

      <article class="rounded-[1.75rem] border border-[#D9DADD] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="liability-title">
        <h2 id="liability-title" class="font-serif text-4xl font-semibold leading-tight text-[#0B0B0D]">
          7. Limitation of Liability
        </h2>
        <p class="mt-5 text-base leading-8 text-[#5B5D63]">
          To the maximum extent permitted by applicable law, <?php echo esc_html($store_name); ?> shall not be liable for any indirect, incidental, special, consequential, or punitive damages arising out of or related to your use of the Site, shipping delays, product fitment issues, or service interruptions.
        </p>
      </article>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-[#F4F5F6] p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="governing-law-title">
      <h2 id="governing-law-title" class="font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        8. Governing Law
      </h2>
      <p class="mt-5 text-base leading-8 text-[#5B5D63]">
        These Terms &amp; Conditions and any separate agreements whereby we provide you services shall be governed by, and construed in accordance with, the laws of <?php echo esc_html($governing_law); ?>.
      </p>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="terms-contact-title">
      <h2 id="terms-contact-title" class="font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        9. Contact Information
      </h2>
      <p class="mt-5 text-base leading-8 text-[#5B5D63]">
        If you have any questions or require clarification regarding these Terms &amp; Conditions, please contact us using our official business channels below:
      </p>
      <div class="mt-8 rounded-3xl border border-[#D9DADD] bg-[#F4F5F6] p-5 sm:p-6">
        <div class="grid gap-4 md:grid-cols-2">
          <?php foreach ($contact_details as $detail) : ?>
            <article class="rounded-2xl border border-[#D9DADD] bg-white p-5">
              <h3 class="text-sm font-bold text-[#0B0B0D]"><?php echo esc_html($detail['label']); ?></h3>
              <p class="mt-3 text-sm leading-7 text-[#5B5D63]"><?php echo esc_html($detail['value']); ?></p>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="mt-8 flex flex-col gap-3 sm:flex-row">
        <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#0B0B0D] px-7 text-sm font-bold text-white transition hover:bg-[#2F3033]">
          Contact Support
        </a>
        <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#0B0B0D] px-7 text-sm font-bold text-[#0B0B0D] transition hover:bg-[#0B0B0D] hover:text-white">
          <?php echo esc_html($support_email); ?>
        </a>
      </div>
    </section>
  </div>
</main>
