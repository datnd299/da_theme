<?php
/**
 * Handed Shoes - Privacy Policy Page
 * Explains data collection, usage, sharing, cookies, security, retention, rights, and privacy contact details.
 */

if (!defined('ABSPATH')) {
    exit;
}

$store_name       = 'Handed Shoes';
$website_domain   = 'handedshoes.com';
$support_email    = 'support@handedshoes.com';
$business_address = function_exists('dawp_get_store_address') ? dawp_get_store_address() : '';
$contact_url      = home_url('/contact-us/');
$shop_url         = home_url('/shop/');
$last_updated     = 'May 22, 2026';
$business_hours   = 'Monday - Friday, 9:00 AM - 5:00 PM EST';

$information_items = [
    [
        'label' => 'Contact Information',
        'copy'  => 'Full name, email address, phone number, billing address, and shipping address.',
    ],
    [
        'label' => 'Order Information',
        'copy'  => 'Details about products purchased, order number, transaction status, history of returns, refunds, and customer support interactions.',
    ],
    [
        'label' => 'Payment Information',
        'copy'  => 'Payment-related details required to safely complete your transaction. Your full payment card details are securely processed directly by our authorized payment gateways and are never stored on our servers.',
    ],
    [
        'label' => 'Device and Usage Data',
        'copy'  => 'IP address, browser type, device details, pages viewed on our Site, referring URLs, approximate geographic location, and data collected through cookies.',
    ],
    [
        'label' => 'User Communications',
        'copy'  => 'Messages, form submissions, product inquiries, return requests, reviews, or any other content you directly send to us.',
    ],
];

$usage_items = [
    [
        'label' => 'Order Fulfillment',
        'copy'  => 'Processing payments, confirming, shipping, delivering, and handling returns, exchanges, or refunds.',
    ],
    [
        'label' => 'Customer Communication',
        'copy'  => 'Sending order confirmations, tracking updates, responding to support inquiries, and notifying you about policy updates.',
    ],
    [
        'label' => 'Fraud Prevention & Security',
        'copy'  => 'Screening orders and web activity to detect, investigate, and prevent fraudulent transactions, chargebacks, unauthorized access, or policy violations.',
    ],
    [
        'label' => 'Marketing Optimization',
        'copy'  => 'Evaluating website performance, checkout flows, and measuring the effectiveness of our advertising with your consent.',
    ],
    [
        'label' => 'Legal Compliance',
        'copy'  => 'Meeting tax, accounting, payment network rules, and other statutory or regulatory requirements.',
    ],
];

$sharing_items = [
    [
        'label' => 'Payment Processors',
        'copy'  => 'To ensure secure, compliant transaction processing during checkout.',
    ],
    [
        'label' => 'Shipping & Fulfillment Partners',
        'copy'  => 'Delivery carriers and fulfillment centers to deliver your packages and process returns.',
    ],
    [
        'label' => 'Technology Providers',
        'copy'  => 'Website hosting, data analytics, email automation, fraud prevention, and security service providers.',
    ],
    [
        'label' => 'Legal Obligations',
        'copy'  => 'Professional advisers, law enforcement, regulators, or courts where required by applicable laws or to protect our legal rights.',
    ],
];

$security_items = [
    [
        'label' => 'SSL Encryption',
        'copy'  => 'Our website utilizes Secure Sockets Layer (SSL) encryption technology to safeguard your personal data and credit card details during transmission.',
    ],
    [
        'label' => 'Secure Payment Standards',
        'copy'  => 'All payment transactions are handled through secure payment providers that comply with the Payment Card Industry Data Security Standard (PCI-DSS).',
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
    [
        'label' => 'Website',
        'value' => $website_domain,
    ],
];
?>

<main class="bg-[#F4F5F6] text-[#0B0B0D]">
  <section class="relative overflow-hidden bg-[#0B0B0D] text-white" aria-labelledby="privacy-policy-cover-title">
    <div class="absolute inset-0 bg-[linear-gradient(135deg,rgba(11,11,13,0.98)_0%,rgba(26,26,29,0.9)_52%,rgba(11,11,13,0.96)_100%)]"></div>
    <div class="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-[#F4F5F6] to-transparent"></div>

    <div class="relative mx-auto max-w-7xl px-5 py-16 sm:px-8 sm:py-20 lg:px-10 lg:py-24">
      <div class="max-w-4xl">
        <p class="text-xs font-bold uppercase tracking-[0.22em] text-white/60">Privacy Policy</p>
        <h1 id="privacy-policy-cover-title" class="mt-5 max-w-3xl font-serif text-5xl font-semibold leading-[1.02] text-[#F4F5F6] sm:text-6xl lg:text-7xl">
          How Handed Shoes Protects Your Information
        </h1>
        <p class="mt-6 max-w-2xl text-base leading-8 text-white/72 sm:text-lg">
          This Privacy Policy explains how <?php echo esc_html($store_name); ?> ("we", "our", or "us") collects, uses, shares, protects, and retains your personal information when you visit <?php echo esc_html($website_domain); ?> (the "Site"), place an order, contact our support, or use our services.
        </p>
        <div class="mt-8 flex flex-col gap-3 sm:flex-row">
          <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-white px-7 text-sm font-bold uppercase tracking-[0.08em] text-[#0B0B0D] transition hover:bg-[#D9DADD]">
            Shop Handed Shoes
          </a>
          <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-white/35 px-7 text-sm font-bold uppercase tracking-[0.08em] text-white transition hover:bg-white hover:text-[#0B0B0D]">
            Contact Us
          </a>
        </div>
      </div>
    </div>
  </section>

  <div class="mx-auto max-w-7xl px-5 py-14 sm:px-8 sm:py-16 lg:px-10 lg:py-20">
    <section class="rounded-[1.75rem] border border-[#D9DADD] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="privacy-intro-title">
      <p class="text-xs font-bold uppercase tracking-[0.22em] text-[#5B5D63]">Last updated: <?php echo esc_html($last_updated); ?></p>
      <h2 id="privacy-intro-title" class="mt-4 font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        Privacy Policy
      </h2>
      <p class="mt-5 text-base leading-8 text-[#5B5D63]">
        By using our Site and services, you agree to the collection and use of information in accordance with this policy.
      </p>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-[#F4F5F6] p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="information-collect-title">
      <p class="text-sm font-bold uppercase tracking-[0.14em] text-[#5B5D63]">1. Information We Collect</p>
      <h2 id="information-collect-title" class="mt-3 font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        Information We Collect
      </h2>
      <p class="mt-5 text-base leading-8 text-[#5B5D63]">
        To fulfill your orders and provide a seamless shopping experience, we collect the following types of personal information:
      </p>
      <div class="mt-6 grid gap-4 md:grid-cols-2 xl:grid-cols-3">
        <?php foreach ($information_items as $item) : ?>
          <article class="rounded-2xl border border-[#D9DADD] bg-white p-5 sm:p-6">
            <h3 class="text-xl font-semibold text-[#0B0B0D]"><?php echo esc_html($item['label']); ?></h3>
            <p class="mt-4 text-base leading-8 text-[#5B5D63]"><?php echo esc_html($item['copy']); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="information-use-title">
      <p class="text-sm font-bold uppercase tracking-[0.14em] text-[#5B5D63]">2. How We Use Your Information</p>
      <h2 id="information-use-title" class="mt-3 font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        How We Use Your Information
      </h2>
      <p class="mt-5 text-base leading-8 text-[#5B5D63]">
        We use your personal data for clear, transparent, and legitimate business purposes, including:
      </p>
      <div class="mt-6 grid gap-4 md:grid-cols-2 xl:grid-cols-3">
        <?php foreach ($usage_items as $item) : ?>
          <article class="rounded-2xl border border-[#D9DADD] bg-[#F4F5F6] p-5 sm:p-6">
            <h3 class="text-xl font-semibold text-[#0B0B0D]"><?php echo esc_html($item['label']); ?></h3>
            <p class="mt-4 text-base leading-8 text-[#5B5D63]"><?php echo esc_html($item['copy']); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-[#F4F5F6] p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="data-sharing-title">
      <p class="text-sm font-bold uppercase tracking-[0.14em] text-[#5B5D63]">3. Data Sharing and Third-Party Providers</p>
      <h2 id="data-sharing-title" class="mt-3 font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        Data Sharing and Third-Party Providers
      </h2>
      <p class="mt-5 text-base leading-8 text-[#5B5D63]">
        We do not sell, rent, or trade your personal information to third parties for their commercial marketing purposes. We only share data with trusted service providers who help us operate our store:
      </p>
      <div class="mt-6 grid gap-4 md:grid-cols-2">
        <?php foreach ($sharing_items as $item) : ?>
          <article class="rounded-2xl border border-[#D9DADD] bg-white p-5 sm:p-6">
            <h3 class="text-xl font-semibold text-[#0B0B0D]"><?php echo esc_html($item['label']); ?></h3>
            <p class="mt-4 text-base leading-8 text-[#5B5D63]"><?php echo esc_html($item['copy']); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="cookies-title">
      <p class="text-sm font-bold uppercase tracking-[0.14em] text-[#5B5D63]">4. Cookies and Tracking Technologies</p>
      <h2 id="cookies-title" class="mt-3 font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        Cookies and Tracking Technologies
      </h2>
      <p class="mt-5 text-base leading-8 text-[#5B5D63]">
        We use cookies, web beacons, pixels, tags, and similar tracking technologies to ensure our shopping cart functions correctly, remember your preferences, monitor site performance, and understand how visitors interact with the Site.
      </p>
      <p class="mt-4 text-base leading-8 text-[#5B5D63]">
        You can manage or disable cookies through your web browser settings. However, turning off certain cookies may prevent some features of the Site from working properly.
      </p>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-[#F4F5F6] p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="data-security-title">
      <p class="text-sm font-bold uppercase tracking-[0.14em] text-[#5B5D63]">5. Secure Checkout &amp; Data Security</p>
      <h2 id="data-security-title" class="mt-3 font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        Secure Checkout &amp; Data Security
      </h2>
      <p class="mt-5 text-base leading-8 text-[#5B5D63]">
        We take the security of your personal data very seriously:
      </p>
      <div class="mt-6 grid gap-4 md:grid-cols-2">
        <?php foreach ($security_items as $item) : ?>
          <article class="rounded-2xl border border-[#D9DADD] bg-white p-5 sm:p-6">
            <h3 class="text-xl font-semibold text-[#0B0B0D]"><?php echo esc_html($item['label']); ?></h3>
            <p class="mt-4 text-base leading-8 text-[#5B5D63]"><?php echo esc_html($item['copy']); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
      <div class="mt-6 border-l-4 border-[#D2A64A] bg-[#FFF8E8] px-5 py-5 text-base leading-8 text-[#5B5D63] sm:px-6">
        While we employ rigorous administrative, technical, and organizational safeguards, no online system is 100% secure. We encourage you to use secure passwords and contact us immediately if you suspect any unauthorized activity on your account.
      </div>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="data-retention-title">
      <p class="text-sm font-bold uppercase tracking-[0.14em] text-[#5B5D63]">6. Data Retention</p>
      <h2 id="data-retention-title" class="mt-3 font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
        Data Retention
      </h2>
      <p class="mt-5 text-base leading-8 text-[#5B5D63]">
        We retain your personal information only for as long as necessary to provide you with our services, complete commercial transactions, manage returns or refunds, prevent fraud, fulfill legal, tax, or accounting obligations, and resolve disputes.
      </p>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-[#F4F5F6] p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="privacy-rights-title">
      <p class="text-sm font-bold uppercase tracking-[0.14em] text-[#5B5D63]">7. Your Choices and Rights</p>
      <h2 id="privacy-rights-title" class="mt-3 font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
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
      <p class="mt-6 text-base leading-8 text-[#5B5D63]">
        Our website is intended for individuals who have reached the age of majority in their jurisdiction. We do not knowingly collect personal information from children under the age of 13.
      </p>
    </section>

    <section class="mt-6 rounded-[1.75rem] border border-[#D9DADD] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="privacy-contact-title">
      <p class="text-sm font-bold uppercase tracking-[0.14em] text-[#5B5D63]">8. Contact Us</p>
      <h2 id="privacy-contact-title" class="mt-3 font-serif text-4xl font-semibold leading-tight text-[#0B0B0D] sm:text-5xl">
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
      <div class="mt-8">
        <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#0B0B0D] px-7 text-sm font-bold text-white transition hover:bg-[#2F3033]">
          Contact Us
        </a>
      </div>
    </section>
  </div>
</main>
