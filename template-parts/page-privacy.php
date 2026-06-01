<?php
/**
 * Handed Shoes - Privacy Policy Page
 * Policy content adapted for personal information collection, use, security, and privacy rights.
 */

if (!defined('ABSPATH')) {
    exit;
}

$store_name     = 'Handed Shoes';
$website_domain = 'handedshoes.com';
$support_email  = 'support@handedshoes.com';
$store_address  = dawp_get_store_address();
$contact_url    = home_url('/contact-us/');
$shop_url       = home_url('/shop/');
$last_updated   = 'May 27, 2026';

$information_items = [
    [
        'title' => 'Contact Information',
        'copy'  => 'Full name, email address, phone number, billing address, and shipping address.',
    ],
    [
        'title' => 'Order Information',
        'copy'  => 'Details about products purchased, order number, transaction status, history of returns, refunds, and customer support interactions.',
    ],
    [
        'title' => 'Payment Information',
        'copy'  => 'Payment-related details required to safely complete your transaction. Your full payment card details are securely processed directly by our authorized payment gateways and are never stored on our servers.',
    ],
    [
        'title' => 'Device and Usage Data',
        'copy'  => 'IP address, browser type, device details, pages viewed on our Site, referring URLs, approximate geographic location, and data collected through cookies.',
    ],
    [
        'title' => 'User Communications',
        'copy'  => 'Messages, form submissions, product inquiries, return requests, reviews, or any other content you directly send to us.',
    ],
];

$usage_items = [
    [
        'title' => 'Order Fulfillment',
        'copy'  => 'Processing payments, confirming, shipping, delivering, and handling returns, exchanges, or refunds.',
    ],
    [
        'title' => 'Customer Communication',
        'copy'  => 'Sending order confirmations, tracking updates, responding to support inquiries, and notifying you about policy updates.',
    ],
    [
        'title' => 'Fraud Prevention & Security',
        'copy'  => 'Screening orders and web activity to detect, investigate, and prevent fraudulent transactions, chargebacks, unauthorized access, or policy violations.',
    ],
    [
        'title' => 'Marketing Optimization',
        'copy'  => 'Evaluating website performance, checkout flows, and measuring the effectiveness of our advertising with your consent.',
    ],
    [
        'title' => 'Legal Compliance',
        'copy'  => 'Meeting tax, accounting, payment network rules, and other statutory or regulatory requirements.',
    ],
];

$sharing_items = [
    [
        'title' => 'Payment Processors',
        'copy'  => 'To ensure secure, compliant transaction processing during checkout.',
    ],
    [
        'title' => 'Shipping & Fulfillment Partners',
        'copy'  => 'Delivery carriers and fulfillment centers to deliver your packages and process returns.',
    ],
    [
        'title' => 'Technology & Infrastructure Providers',
        'copy'  => 'Website hosting, data analytics, email automation, fraud prevention, and security service providers.',
    ],
    [
        'title' => 'Legal Obligations',
        'copy'  => 'Professional advisers, law enforcement, regulators, or courts where required by applicable laws or to protect our legal rights.',
    ],
];

$rights_items = [
    'The right to request access to the personal data we hold about you.',
    'The right to request correction of inaccurate or incomplete information.',
    'The right to request deletion of your data, subject to certain legal exceptions.',
    'The right to opt out of certain marketing or tracking activities.',
];

$contact_details = [
    [
        'label' => 'Brand Name',
        'value' => $store_name,
    ],
    [
        'label' => 'Email',
        'value' => $support_email,
    ],
    [
        'label' => 'Store Address',
        'value' => $store_address,
    ],
    [
        'label' => 'Contact Page',
        'value' => 'Contact Us page',
    ],
    [
        'label' => 'Website',
        'value' => $website_domain,
    ],
];
?>

<main class="bg-[#F4F5F6] py-14 text-[#0B0B0D] sm:py-16 lg:py-20">
  <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
    <section class="rounded-[1.75rem] border border-[#D9DADD] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="privacy-policy-title">
      <p class="text-xs font-bold uppercase tracking-[0.22em] text-[#5B5D63]">Last updated: <?php echo esc_html($last_updated); ?></p>
      <h1 id="privacy-policy-title" class="mt-4 font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        Privacy Policy
      </h1>
      <p class="mt-5 text-base leading-8 text-[#5B5D63]">
        This Privacy Policy explains how <?php echo esc_html($store_name); ?> ("we", "our", or "us") collects, uses, shares, protects, and retains your personal information when you visit <?php echo esc_html($website_domain); ?> (the "Site"), place an order, contact our support, or use our services.
      </p>
      <p class="mt-4 text-base leading-8 text-[#5B5D63]">
        By using our Site and services, you agree to the collection and use of information in accordance with this policy.
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

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-[#F4F5F6] p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="information-collect-title">
      <h2 id="information-collect-title" class="font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        Information We Collect
      </h2>
      <p class="mt-5 text-base leading-8 text-[#5B5D63]">
        To fulfill your orders and provide a seamless shopping experience, we collect the following types of personal information:
      </p>
      <div class="mt-6 grid gap-4 md:grid-cols-2">
        <?php foreach ($information_items as $item) : ?>
          <article class="rounded-2xl border border-[#D9DADD] bg-white p-5 sm:p-6">
            <h3 class="text-xl font-semibold text-[#0B0B0D]"><?php echo esc_html($item['title']); ?></h3>
            <p class="mt-4 text-base leading-8 text-[#5B5D63]"><?php echo esc_html($item['copy']); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="information-use-title">
      <h2 id="information-use-title" class="font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        How We Use Your Information
      </h2>
      <p class="mt-5 text-base leading-8 text-[#5B5D63]">
        We use your personal data for clear, transparent, and legitimate business purposes, including:
      </p>
      <div class="mt-6 grid gap-4 md:grid-cols-2">
        <?php foreach ($usage_items as $item) : ?>
          <article class="rounded-2xl border border-[#D9DADD] bg-[#F4F5F6] p-5 sm:p-6">
            <h3 class="text-xl font-semibold text-[#0B0B0D]"><?php echo esc_html($item['title']); ?></h3>
            <p class="mt-4 text-base leading-8 text-[#5B5D63]"><?php echo esc_html($item['copy']); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-[#F4F5F6] p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="data-sharing-title">
      <h2 id="data-sharing-title" class="font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        Data Sharing and Third-Party Providers
      </h2>
      <p class="mt-5 text-base leading-8 text-[#5B5D63]">
        We do not sell, rent, or trade your personal information to third parties for their commercial marketing purposes. We only share data with trusted service providers who help us operate our store:
      </p>
      <div class="mt-6 grid gap-4 md:grid-cols-2">
        <?php foreach ($sharing_items as $item) : ?>
          <article class="rounded-2xl border border-[#D9DADD] bg-white p-5 sm:p-6">
            <h3 class="text-xl font-semibold text-[#0B0B0D]"><?php echo esc_html($item['title']); ?></h3>
            <p class="mt-4 text-base leading-8 text-[#5B5D63]"><?php echo esc_html($item['copy']); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </section>

    <section class="mt-6 grid gap-6 lg:grid-cols-2">
      <article class="rounded-[1.75rem] border border-[#D9DADD] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="cookies-title">
        <h2 id="cookies-title" class="font-serif text-4xl font-semibold leading-tight text-[#0B0B0D]">
          Cookies and Tracking Technologies
        </h2>
        <p class="mt-5 text-base leading-8 text-[#5B5D63]">
          We use cookies, web beacons, pixels, tags, and similar tracking technologies to ensure our shopping cart functions correctly, remember your preferences, monitor site performance, and understand how visitors interact with the Site.
        </p>
        <p class="mt-4 text-base leading-8 text-[#5B5D63]">
          You can manage or disable cookies through your web browser settings. However, turning off certain cookies may prevent some features of the Site from working properly.
        </p>
      </article>

      <article class="rounded-[1.75rem] border border-[#D9DADD] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="retention-title">
        <h2 id="retention-title" class="font-serif text-4xl font-semibold leading-tight text-[#0B0B0D]">
          Data Retention
        </h2>
        <p class="mt-5 text-base leading-8 text-[#5B5D63]">
          We retain your personal information only for as long as necessary to provide you with our services, complete commercial transactions, manage returns or refunds, prevent fraud, fulfill legal, tax, or accounting obligations, and resolve disputes.
        </p>
      </article>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="security-title">
      <h2 id="security-title" class="font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        Secure Checkout &amp; Data Security
      </h2>
      <p class="mt-5 text-base leading-8 text-[#5B5D63]">
        We take the security of your personal data very seriously.
      </p>
      <div class="mt-6 grid gap-4 md:grid-cols-2">
        <article class="rounded-2xl border border-[#D9DADD] bg-[#F4F5F6] p-5 sm:p-6">
          <h3 class="text-xl font-semibold text-[#0B0B0D]">SSL Encryption</h3>
          <p class="mt-4 text-base leading-8 text-[#5B5D63]">
            Our website utilizes Secure Sockets Layer (SSL) encryption technology to safeguard your personal data and credit card details during transmission.
          </p>
        </article>
        <article class="rounded-2xl border border-[#D9DADD] bg-[#F4F5F6] p-5 sm:p-6">
          <h3 class="text-xl font-semibold text-[#0B0B0D]">Secure Payment Standards</h3>
          <p class="mt-4 text-base leading-8 text-[#5B5D63]">
            All payment transactions are handled through secure payment providers that comply with the Payment Card Industry Data Security Standard (PCI-DSS).
          </p>
        </article>
      </div>
      <p class="mt-6 text-base leading-8 text-[#5B5D63]">
        While we employ rigorous administrative, technical, and organizational safeguards, no online system is 100% secure. We encourage you to use secure passwords and contact us immediately if you suspect any unauthorized activity on your account.
      </p>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-[#F4F5F6] p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="choices-rights-title">
      <h2 id="choices-rights-title" class="font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        Your Choices and Rights
      </h2>
      <p class="mt-5 text-base leading-8 text-[#5B5D63]">
        Depending on your geographic location, such as under the CCPA in California or GDPR in Europe, you may have specific rights regarding your personal data, including:
      </p>
      <ul class="mt-5 grid gap-3 text-base leading-7 text-[#5B5D63]">
        <?php foreach ($rights_items as $item) : ?>
          <li class="flex gap-3">
            <span class="mt-3 h-1.5 w-1.5 shrink-0 rounded-full bg-[#5B5D63]"></span>
            <span><?php echo esc_html($item); ?></span>
          </li>
        <?php endforeach; ?>
      </ul>
      <div class="mt-6 border-l-4 border-[#D2A64A] bg-[#FFF8E8] px-5 py-5 text-base leading-8 text-[#5B5D63] sm:px-6">
        Our website is intended for individuals who have reached the age of majority in their jurisdiction. We do not knowingly collect personal information from children under the age of 13.
      </div>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="privacy-contact-title">
      <h2 id="privacy-contact-title" class="font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        Contact Us
      </h2>
      <p class="mt-5 text-base leading-8 text-[#5B5D63]">
        If you have any questions, concerns, or wish to exercise your privacy rights, please contact our dedicated Privacy Support team using the details below:
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
          Contact Privacy Support
        </a>
        <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#0B0B0D] px-7 text-sm font-bold text-[#0B0B0D] transition hover:bg-[#0B0B0D] hover:text-white">
          <?php echo esc_html($support_email); ?>
        </a>
      </div>
    </section>
  </div>
</main>
