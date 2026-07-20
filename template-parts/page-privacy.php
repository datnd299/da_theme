<?php
/**
 * Privacy Policy - Veterangift
 */
$store_address = function_exists('dawp_get_woocommerce_store_address') ? dawp_get_woocommerce_store_address() : '';
$store_address = $store_address ?: __('United States', 'dawp');

$sgs_pp_hero_bg = sprintf(
  "--sgs-pp-hero-bg:url('%s');--sgs-pp-hero-bg-mobile:url('%s')",
  esc_url(dawp_theme_cdn_image_url('assets/img/policy/policy-hero-background.png', 1600, 760)),
  esc_url(dawp_theme_cdn_image_url('assets/img/policy/policy-hero-background.png', 720, 520))
);
get_header(); ?>
<section class="sgs-home sgs-page">
<style>
.sgs-pp-hero{background:linear-gradient(90deg,rgba(11,31,58,.96) 0%,rgba(11,31,58,.84) 42%,rgba(11,31,58,.58) 100%),var(--sgs-pp-hero-bg) center right/cover no-repeat,var(--navy);color:var(--white);padding:clamp(60px,8vw,100px) clamp(24px,4vw,64px);text-align:center}
.sgs-pp-hero__inner{max-width:680px;margin:0 auto}
.sgs-pp-hero h1{margin:0;font-family:var(--font-heading);font-size:clamp(1.8rem,4vw,3rem);font-weight:800;letter-spacing:-.02em;line-height:1.05;color:var(--white)}
.sgs-pp-hero__meta{margin-top:14px;color:var(--gold);font-family:var(--font-heading);font-size:.85rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase}
.sgs-pp-body{width:min(100% - 48px,860px);margin:0 auto;padding:var(--section-gap,56px) 0}
.sgs-pp-body h2{margin:36px 0 12px;font-family:var(--font-heading);font-size:1.2rem;font-weight:700;color:var(--ink)}
.sgs-pp-body h2:first-child{margin-top:0}
.sgs-pp-body p,.sgs-pp-body li{margin:10px 0;color:var(--muted);font-size:.92rem;line-height:1.7}
.sgs-pp-body ul{padding-left:20px}
.sgs-pp-body li{margin:6px 0}
.sgs-pp-body a{color:var(--red);text-decoration:underline;text-underline-offset:2px}
.sgs-pp-body a:hover{color:var(--red-dark)}
@media(max-width:640px){.sgs-pp-hero{background-image:linear-gradient(180deg,rgba(11,31,58,.76) 0%,rgba(11,31,58,.96) 100%),var(--sgs-pp-hero-bg-mobile,var(--sgs-pp-hero-bg))}}
</style>
<div class="sgs-pp-hero" style="<?php echo esc_attr($sgs_pp_hero_bg); ?>">
  <div class="sgs-pp-hero__inner">
    <p class="sgs-eyebrow sgs-eyebrow--light">Privacy Policy</p>
    <h1>Privacy Policy</h1>
    <p class="sgs-pp-hero__meta">Last Updated: July 5 2026</p>
  </div>
</div>
<div class="sgs-pp-body">
  <p>This Privacy Policy explains how veterangift.com (the "Site", "we", "us", or "our") collects, uses, and discloses your Personal Information when you visit, browse, or execute an apparel purchase from the Site.</p>
  <p>By utilizing our Site or purchasing products from our store, you acknowledge and agree to the data management and processing practices detailed in this policy.</p>

  <h2>1. Information We Collect</h2>
  <p>When you interact with the Site, we gather specific metrics regarding your device, store interactions, and details strictly necessary to process your transactions.</p>
  <p><strong>Device Metrics:</strong> Collected automatically via functional cookies, server logs, web beacons, and tracking pixels when you access our Site. This includes browser type, local IP address, active time zone, unique cookie files, what specific products you view, and store search terms.</p>
  <p><strong>Order Records:</strong> Collected directly from you to fulfill our sales contract. This includes your full name, billing address, physical shipping address, contact email address, phone number, and encrypted payment details (such as credit card numbers or PayPal email accounts).</p>
  <p><strong>Customer Support Records:</strong> Gathered directly from you during support inquiries to provide efficient operational responses.</p>

  <h2>2. How We Use Your Information</h2>
  <p>We utilize your dynamic Order Information strictly to fulfill any purchases executed through the Site. This includes:</p>
  <ul>
    <li>Processing your payment credentials and secure billing information.</li>
    <li>Arranging standard commercial shipping and generating invoices/order confirmations.</li>
    <li>Screening active incoming orders for potential risk or transaction fraud.</li>
    <li>Communicating directly with you regarding order delivery updates or customer service queries.</li>
    <li>Providing tailored promotional advertisements or product offers based on your verified preferences.</li>
  </ul>

  <h2>3. Sharing Your Information &amp; Third-Party Service Providers</h2>
  <p>We share your Personal Information with trusted corporate service providers to help us deliver our e-commerce services and execute our contractual agreements with you. For example:</p>
  <ul>
    <li>We use WooCommerce to power our digital storefront infrastructure.</li>
    <li>We use verified payment processors to handle transactional settlements and reliable shipping carriers to physically deliver your apparel packages.</li>
    <li>We use Google Analytics to understand traffic volume and consumer browsing behaviors. Learn more: <a href="https://policies.google.com/privacy" target="_blank" rel="noopener">https://policies.google.com/privacy</a>. Opt out of tracking here: <a href="https://tools.google.com/dlpage/gaoptout" target="_blank" rel="noopener">https://tools.google.com/dlpage/gaoptout</a>.</li>
    <li>We may share your records to comply with applicable laws, respond to a lawful search warrant, or protect our corporate property and legal rights.</li>
  </ul>

  <h2>4. Secure Payments &amp; Transaction Encryption (GMC MANDATORY)</h2>
  <p>To ensure the safety of your financial credentials, veterangift.com operates a highly protected checkout ecosystem. All monetary communications and payment data transfers are encrypted utilizing secure SSL (Secure Sockets Layer) technology.</p>
  <p>Furthermore, we do not store, view, or retain raw credit card numbers or payment passwords on our local databases. All transactions are routed directly to accredited payment processors adhering to the strict global Payment Card Industry Data Security Standard (PCI-DSS).</p>

  <h2>5. Consumer Data Rights (GDPR &amp; CCPA Compliant)</h2>
  <p>Regardless of your geographic location, we respect your data privacy and grant you the following structural controls:</p>
  <p><strong>GDPR (For EEA Residents):</strong> If you reside within the European Economic Area, you possess the right to access your data, port it to a new service, or request that your records be corrected, updated, or permanently deleted. To exercise these rights, please email us directly at <a href="mailto:support@veterangift.com">support@veterangift.com</a>.</p>
  <p><strong>CCPA (For California Residents):</strong> If you are a resident of California, you possess the specific "Right to Know" what personal data we collect, the right to request deletion of that data, and the right to opt-out of the sale of personal information.</p>

  <h2>6. Data Retention &amp; Cookies Policy</h2>
  <p><strong>Retention Protocols:</strong> When you place an order through the Site, we will securely retain your transaction data for our official business registries unless and until you formally request the removal of this information.</p>
  <p><strong>Cookies Notice:</strong> We employ essential background cookies to manage your shopping cart persistence, preserve user login states, and optimize storefront speeds. You can adjust or clear cookies via your local web browser preferences. However, disabling essential cookies may prevent the checkout system from functioning properly.</p>

  <h2>7. Changes to This Policy</h2>
  <p>We may update this Privacy Policy periodically to reflect shifts in our retail operations, software modifications, or localized legal regulations. The "Last Updated" date at the top of the page will signify the latest revision.</p>

  <h2>8. Corporate Identity &amp; Customer Support Channels</h2>
  <p>For questions about our data practices, to file a privacy inquiry, or for help with an active order, please connect with our compliance officer via our verified communication block:</p>
  <p><strong>Store / Brand Name:</strong> Veterangift</p>
  <p><strong>Customer Support Email:</strong> <a href="mailto:support@veterangift.com">support@veterangift.com</a></p>
  <p><strong>Physical Business Address:</strong> <?php echo esc_html($store_address); ?></p>
  <p><strong>Customer Support Availability:</strong> Monday - Friday, 10:00 AM - 6:00 PM PST.</p>
  <p><strong>Contact Page:</strong> <a href="/contact-us/">Contact Us</a></p>
</div>
</section>
<?php get_footer(); ?>
