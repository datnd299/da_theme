<?php
/**
 * Terms & Conditions — Veterangift
 */
$store_address = function_exists('dawp_get_woocommerce_store_address') ? dawp_get_woocommerce_store_address() : '';
$store_address = $store_address ?: __('United States', 'dawp');

$sgs_tc_hero_bg = sprintf(
  "--sgs-tc-hero-bg:url('%s');--sgs-tc-hero-bg-mobile:url('%s')",
  esc_url(dawp_theme_cdn_image_url('assets/img/hero/track-order-cover-v2.png', 1600, 760)),
  esc_url(dawp_theme_cdn_image_url('assets/img/hero/track-order-cover-v2.png', 720, 520))
);
get_header(); ?>
<section class="sgs-home sgs-page">
<style>
.sgs-tc-hero{background:linear-gradient(90deg,rgba(11,31,58,.96) 0%,rgba(11,31,58,.84) 42%,rgba(11,31,58,.58) 100%),var(--sgs-tc-hero-bg) center right/cover no-repeat,var(--navy);color:var(--white);padding:clamp(60px,8vw,100px) clamp(24px,4vw,64px);text-align:center}
.sgs-tc-hero__inner{max-width:680px;margin:0 auto}
.sgs-tc-hero h1{margin:0;font-family:var(--font-heading);font-size:clamp(1.8rem,4vw,3rem);font-weight:800;letter-spacing:-.02em;line-height:1.05;color:var(--white)}
.sgs-tc-hero__meta{margin-top:14px;color:var(--gold);font-family:var(--font-heading);font-size:.85rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase}
.sgs-tc-body{width:min(100% - 48px,860px);margin:0 auto;padding:var(--section-gap,56px) 0}
.sgs-tc-body h2{margin:36px 0 12px;font-family:var(--font-heading);font-size:1.2rem;font-weight:700;color:var(--ink)}
.sgs-tc-body h2:first-child{margin-top:0}
.sgs-tc-body h3{margin:24px 0 10px;font-family:var(--font-heading);font-size:1rem;font-weight:700;color:var(--ink)}
.sgs-tc-body p,.sgs-tc-body li{margin:10px 0;color:var(--muted);font-size:.92rem;line-height:1.7}
.sgs-tc-body ul{padding-left:20px}
.sgs-tc-body a{color:var(--red);text-decoration:underline;text-underline-offset:2px}
.sgs-tc-body li{margin:6px 0}
@media(max-width:640px){.sgs-tc-hero{background-image:linear-gradient(180deg,rgba(11,31,58,.76) 0%,rgba(11,31,58,.96) 100%),var(--sgs-tc-hero-bg-mobile,var(--sgs-tc-hero-bg))}}
</style>
<div class="sgs-tc-hero" style="<?php echo esc_attr($sgs_tc_hero_bg); ?>">
  <div class="sgs-tc-hero__inner">
    <p class="sgs-eyebrow sgs-eyebrow--light">Terms &amp; Conditions</p>
    <h1>Terms &amp; Conditions</h1>
    <p class="sgs-tc-hero__meta">Last Updated: July 5 2026</p>
  </div>
</div>
<div class="sgs-tc-body">
  <h2>Terms of Service</h2>

  <h2>Terms Overview</h2>
  <p>The following Terms of Service govern your access to and use of veterangift.com (the "Site", "we", "us", or "our") and your commercial purchase of custom apparel, graphic shirts, and printed products from our online storefront.</p>
  <p>By accessing the Site, browsing our collection, or submitting an online purchase order, you expressly confirm that you are in agreement with and bound by these Terms and our integrated Privacy Policy. If you do not agree to these conditions, you are not authorized to utilize this Site or execute purchases through our storefront.</p>

  <h2>PART I: WEBSITE USAGE &amp; INTELLECTUAL PROPERTY</h2>
  <h3>1. Acceptance, Eligibility &amp; Changes</h3>
  <p>We reserve the absolute right to update, modify, or rewrite these Terms at any time without prior written notice. Any dynamic modifications will become effective immediately upon being posted to the Site. Your continued interaction with the storefront following these updates constitutes your binding agreement to the revised Terms.</p>

  <h3>2. Intellectual Property Rights</h3>
  <p>All designs, original graphics, apparel illustrations, text configurations, custom page layouts, and corporate logos displayed on this website are the exclusive property of Veterangift and are protected under international copyright and trademark laws. You are strictly prohibited from copying, reproducing, distributing, modifying, or commercially exploiting any content or design layouts from this Site without explicit prior written authorization from our management.</p>

  <h3>3. User Conduct Policy</h3>
  <p>By interacting with our Site, you strictly agree NOT to:</p>
  <ul>
    <li>Post, transmit, or upload any unlawful, abusive, defamatory, obscene, or fraudulent reviews or content.</li>
    <li>Upload viruses, malicious scripts, or any digital code designed to disrupt the Site's checkout or server infrastructure.</li>
    <li>Interfere with the transactional security protocols or network architecture of our store.</li>
    <li>Collect or scrape other users' personal identifiable metrics without explicit consent.</li>
  </ul>

  <h2>PART II: TERMS OF SALE &amp; PURCHASE CONTRACTS</h2>
  <h3>4. Order Formation &amp; Verification</h3>
  <p>Official order acceptance and the execution of the purchase contract occur strictly when our automated systems transmit a confirmation email to your designated address. We reserve the right to refuse, limit, or cancel any transaction for reasons including suspected payment fraud, stock discrepancies, system pricing errors, or printing infrastructure failures. If an order is canceled post-payment, a 100% refund will be instantly processed to your original payment method.</p>

  <h3>5. Product Variations &amp; Made-to-Order Disclaimer</h3>
  <p>Because our graphic shirts and apparel products are custom made-to-order, items may feature slight, minor variations in ink placement, scaling, and color vibrancy compared to the digital mockups displayed on our storefront. We strive to present highly accurate product photography; however, the exact color hues you witness will ultimately depend on your individual monitor settings and device calibrations.</p>

  <h3>6. Custom &amp; Personalized Merchandise</h3>
  <p>Personalized items are fabricated specifically according to your digital inputs. Customers are solely responsible for reviewing all sizing metrics, spelling, and customization details thoroughly before finalizing their checkout. Once the automated printing production queue begins, design changes cannot be accommodated. Custom items are not eligible for return or exchange unless they arrive defective, physically damaged, or misprinted.</p>

  <h3>7. Pricing, Currency &amp; Secure Gateways</h3>
  <p>All retail prices are displayed transparently and denominated strictly in US Dollars ($). We reserve the right to modify pricing structures at any time without prior notification.</p>
  <p>To maintain strict consumer data protection, veterangift.com operates a protected checkout ecosystem:</p>
  <ul>
    <li>We do not collect, view, or retain your raw credit card numbers or banking passwords on our local databases.</li>
    <li>All monetary communications are encrypted utilizing secure SSL (Secure Sockets Layer) technology.</li>
    <li>Transactions are managed entirely via accredited third-party payment infrastructure nodes that comply fully with the global Payment Card Industry Data Security Standard (PCI-DSS).</li>
  </ul>

  <h3>8. Delivery Framework &amp; Risk of Loss</h3>
  <p>All delivery timelines, dispatch schedules, and shipping rates are governed by our official Shipping Policy. Full physical responsibility, ownership, and risk of loss for the purchased merchandise transfer to you immediately upon verified carrier delivery to the destination address specified at checkout.</p>

  <h2>PART III: LEGAL FRAMEWORK &amp; CORPORATE IDENTITY</h2>
  <h3>9. Limitation of Liability</h3>
  <p>To the maximum extent permitted by applicable law, Veterangift and its operational directors, officers, employees, or third-party service providers shall not be held liable for any indirect, incidental, special, punitive, or consequential damages (including, without limitation, loss of profits, data, or business opportunities) resulting from your utilization of our services, product usage, or unexpected logistical carrier delays beyond our reasonable control.</p>

  <h3>10. Governing Law &amp; Jurisdiction</h3>
  <p>These Terms of Service, along with all contractual obligations regarding the purchase of goods from our store, shall be governed by, interpreted, and construed in accordance with the laws of the United States, without regard to conflict of law principles.</p>

  <h3>11. Customer Support &amp; Operational Contact</h3>
  <p>For any policy inquiries, legal questions, or transactional support regarding these Terms, please reach out to our administration through our verified corporate channels:</p>
  <p><strong>Store/Brand Name:</strong> Veterangift</p>
  <p><strong>Customer Support Email:</strong> <a href="mailto:support@veterangift.com">support@veterangift.com</a></p>
  <p><strong>Physical Business Address:</strong> <?php echo esc_html($store_address); ?></p>
  <p><strong>Customer Service Hours:</strong> Monday - Friday, 10:00 AM - 6:00 PM PST</p>
  <p><strong>Contact Page:</strong> <a href="<?php echo esc_url(home_url('/contact-us/')); ?>">Contact Us</a></p>
</div>
</section>
<?php get_footer(); ?>
