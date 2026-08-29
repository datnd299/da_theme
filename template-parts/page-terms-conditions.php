<?php
/**
 * Template Part: page-terms-conditions
 *
 * @package dawp
 */

$brand_name    = function_exists('dawp_brand_name') ? dawp_brand_name() : 'Orvel Time';
$support_email = function_exists('dawp_contact_support_email') ? dawp_contact_support_email() : 'support@orveltime.com';
$store_address = function_exists('dawp_get_store_address_line') ? dawp_get_store_address_line() : '';
?>

<style>
  .qb-page { --qb-obsidian:#0D0F0F; --qb-ivory:#F7F4EE; --qb-white:#FFFFFF; --qb-carbon:#171A19; --qb-green:#263C33; --qb-gold:#B38A52; --qb-silver:#D7D0C2; --qb-gray:#F7F4EE; --qb-text:#5E625F; --qb-border:#DDD5C7; --qb-plum:#171A19; --qb-peach:#D7B987; background:var(--qb-ivory); color:var(--qb-text); font-family:"DM Sans","Inter",system-ui,sans-serif; }
  .qb-page * { box-sizing:border-box; }
  .qb-page a { color:inherit; text-decoration:none; }
  .qb-wrap { width:min(100% - 32px,1280px); margin-inline:auto; }
  .qb-section { padding:72px 0; }
  .qb-eyebrow { margin:0 0 12px; color:var(--qb-gold); font-size:12px; font-weight:800; letter-spacing:.18em; text-transform:uppercase; }
  .qb-title { margin:0; color:var(--qb-plum); font-family:Georgia,"Times New Roman",serif; font-size:clamp(34px,4.2vw,58px); line-height:1.04; letter-spacing:0; }
  .qb-updated { margin:16px 0 0; color:var(--qb-plum); font-size:14px; font-weight:800; line-height:1.4; }
  .qb-copy { margin:18px 0 0; max-width:780px; color:var(--qb-text); font-size:17px; line-height:1.75; }
  .qb-actions { display:flex; flex-wrap:wrap; gap:14px; margin-top:30px; }
  .qb-hero .qb-actions { justify-content:center; }
  .qb-button { display:inline-flex; min-height:48px; align-items:center; justify-content:center; border:1px solid var(--qb-plum); border-radius:999px; background:var(--qb-plum); color:#fff !important; padding:0 24px; font-size:14px; font-weight:800; transition:.2s ease; }
  .qb-button:hover { border-color:var(--qb-gold); background:var(--qb-gold); color:var(--qb-plum) !important; }
  .qb-button--secondary { background:#fff; color:var(--qb-plum) !important; }
  .qb-button--secondary:hover { border-color:var(--qb-plum); background:var(--qb-ivory); color:var(--qb-plum) !important; }
  .qb-hero { position:relative; overflow:hidden; border-bottom:1px solid var(--qb-border); background:linear-gradient(135deg,#fff 0%,#F7F4EE 62%,rgba(179,138,82,.18) 100%); }
  .qb-hero::before { content:""; position:absolute; inset:auto 0 0; height:1px; background:linear-gradient(90deg,transparent,rgba(179,138,82,.7),transparent); }
  .qb-hero::after { content:""; position:absolute; right:8%; top:34px; width:180px; height:180px; border:1px solid rgba(179,138,82,.24); transform:rotate(12deg); }
  .qb-hero__grid { position:relative; z-index:1; display:grid; grid-template-columns:minmax(0,1fr); gap:28px; align-items:center; padding:70px 0 76px; }
  .qb-hero__grid > div { max-width:720px; margin-inline:auto; text-align:center; }
  .qb-hero .qb-copy { margin-inline:auto; }
  .qb-panel, .qb-card, .qb-policy-card { border:1px solid var(--qb-border); border-radius:8px; background:#fff; box-shadow:0 12px 34px rgba(13,15,15,.05); }
  .qb-panel { padding:clamp(24px,4vw,44px); background:rgba(255,255,255,.86); }
  .qb-summary-grid { display:grid; grid-template-columns:repeat(4,minmax(0,1fr)); gap:18px; }
  .qb-card { padding:22px; }
  .qb-card b { display:inline-flex; width:42px; height:42px; align-items:center; justify-content:center; border-radius:999px; background:var(--qb-ivory); color:var(--qb-plum); font-size:13px; }
  .qb-card h3, .qb-policy-card h2, .qb-mini-card strong { margin:18px 0 0; color:var(--qb-plum); }
  .qb-card p, .qb-policy-card p, .qb-policy-card li, .qb-mini-card p { color:#5E625F; font-size:15px; line-height:1.7; }
  .qb-soft { background:var(--qb-gray); }
  .qb-content-grid { display:grid; grid-template-columns:.82fr 1.18fr; gap:34px; align-items:start; }
  .qb-sidebar { position:sticky; top:120px; display:grid; gap:16px; }
  .qb-dark-card { border-radius:8px; background:var(--qb-plum); padding:28px; color:#fff; }
  .qb-dark-card .qb-eyebrow { color:var(--qb-peach); }
  .qb-dark-card h2, .qb-dark-card p, .qb-dark-card a { color:#fff; }
  .qb-dark-card p { color:rgba(255,255,255,.78); font-size:15px; line-height:1.7; }
  .qb-side-nav { display:grid; gap:10px; margin-top:22px; }
  .qb-side-nav a { border:1px solid rgba(255,255,255,.15); border-radius:999px; padding:10px 14px; color:#fff; font-size:13px; font-weight:800; }
  .qb-policy-stack { display:grid; gap:22px; }
  .qb-policy-card { padding:clamp(24px,4vw,40px); }
  .qb-policy-card:nth-child(even) { background:var(--qb-ivory); }
  .qb-policy-card h2 { font-size:clamp(25px,3vw,38px); line-height:1.12; font-family:Georgia,"Times New Roman",serif; }
  .qb-policy-card h2 + p, .qb-policy-card h2 + ul { margin-top:clamp(14px,1.8vw,20px); }
  .qb-policy-card p { margin:16px 0 0; }
  .qb-policy-card ul { display:grid; gap:10px; margin:18px 0 0; padding-left:1.15rem; list-style:disc outside; }
  .qb-mini-grid { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:14px; margin-top:22px; }
  .qb-mini-card { border:1px solid var(--qb-border); border-radius:18px; background:#fff; padding:18px; }
  .qb-mini-card strong { display:block; }
  .qb-mini-card p { margin:7px 0 0; font-size:14px; }
  .qb-contact-card { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:14px; margin-top:24px; }
  .qb-contact-item { border:1px solid var(--qb-border); border-radius:18px; background:#fff; padding:16px; }
  .qb-contact-item strong { display:block; color:var(--qb-plum); font-size:14px; }
  .qb-contact-item span { display:block; margin-top:7px; color:#5E625F; font-size:14px; line-height:1.6; }
  .qb-plum { background:var(--qb-plum); color:#fff; }
  .qb-plum .qb-title, .qb-plum .qb-copy { color:#fff; }
  .qb-plum .qb-eyebrow { color:var(--qb-peach); }
  .qb-policy-links { display:flex; flex-wrap:wrap; gap:10px; margin-top:28px; }
  .qb-policy-links a { border:1px solid rgba(255,255,255,.22); border-radius:999px; background:rgba(255,255,255,.1); padding:10px 14px; color:#fff; font-size:13px; font-weight:800; }
  @media (max-width:1080px) { .qb-summary-grid { grid-template-columns:repeat(2,minmax(0,1fr)); } }
  @media (max-width:780px) { .qb-section { padding:56px 0; } .qb-hero__grid, .qb-content-grid, .qb-summary-grid, .qb-contact-card { grid-template-columns:1fr; } .qb-hero__grid { padding:58px 0; } .qb-sidebar { display:none; } .qb-actions { flex-direction:column; } .qb-button { width:100%; } .qb-panel { overflow:hidden; } .qb-panel .qb-mini-grid { display:flex; grid-template-columns:none; gap:14px; margin-inline:calc(clamp(24px,4vw,44px) * -1); padding:0 clamp(24px,4vw,44px) 8px; overflow-x:auto; scroll-snap-type:x mandatory; -webkit-overflow-scrolling:touch; scrollbar-width:none; } .qb-panel .qb-mini-grid::-webkit-scrollbar { display:none; } .qb-panel .qb-mini-card { flex:0 0 min(82vw,300px); scroll-snap-align:start; } }
</style>

<div class="qb-page qb-terms">
  <section class="qb-hero">
    <div class="qb-wrap qb-hero__grid">
      <div>
        <p class="qb-eyebrow"><?php esc_html_e('Terms & Conditions', 'dawp'); ?></p>
        <h1 class="qb-title"><?php esc_html_e('Terms of Service', 'dawp'); ?></h1>
        <p class="qb-updated"><?php esc_html_e('Last Updated: May 28, 2026', 'dawp'); ?></p>
        <p class="qb-copy"><?php echo esc_html(sprintf('Key terms for using %s, placing orders, and accessing support.', $brand_name)); ?></p>
        <div class="qb-actions">
          <a class="qb-button" href="<?php echo esc_url(home_url('/shop/')); ?>"><?php esc_html_e('Shop Watches', 'dawp'); ?></a>
          <a class="qb-button qb-button--secondary" href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
        </div>
      </div>
    </div>
  </section>

  <section class="qb-section qb-soft">
    <div class="qb-wrap qb-content-grid">
      <aside class="qb-sidebar">
        <div class="qb-dark-card">
          <p class="qb-eyebrow"><?php esc_html_e('Terms Sections', 'dawp'); ?></p>
          <h2 class="qb-title" style="font-size:clamp(28px,3vw,42px);"><?php esc_html_e('Review before using the store.', 'dawp'); ?></h2>
          <p><?php esc_html_e('These Terms explain website use, orders, product details, third-party tools, prohibited uses, liability, and contact information.', 'dawp'); ?></p>
          <nav class="qb-side-nav" aria-label="<?php esc_attr_e('Terms sections', 'dawp'); ?>">
            <a href="#overview"><?php esc_html_e('Overview', 'dawp'); ?></a>
            <a href="#online-store"><?php esc_html_e('Online Store', 'dawp'); ?></a>
            <a href="#general"><?php esc_html_e('General Conditions', 'dawp'); ?></a>
            <a href="#products"><?php esc_html_e('Products & Orders', 'dawp'); ?></a>
            <a href="#optional-tools"><?php esc_html_e('Optional Tools', 'dawp'); ?></a>
            <a href="#third-party"><?php esc_html_e('Third-Party Links', 'dawp'); ?></a>
            <a href="#prohibited"><?php esc_html_e('Prohibited Uses', 'dawp'); ?></a>
            <a href="#liability"><?php esc_html_e('Liability', 'dawp'); ?></a>
            <a href="#contact-info"><?php esc_html_e('Contact Information', 'dawp'); ?></a>
          </nav>
        </div>
      </aside>

      <div class="qb-policy-stack">
        <section id="overview" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Overview', 'dawp'); ?></p>
          <h2><?php echo esc_html(sprintf('This website is operated by %s.', $brand_name)); ?></h2>
          <p><?php echo esc_html(sprintf('Throughout the site, the terms "we," "us," and "our" refer to %s. We provide this website, including all information, tools, products, and services available from this site, to you conditioned upon your acceptance of all terms, conditions, policies, and notices stated here.', $brand_name)); ?></p>
          <p><?php esc_html_e('By visiting our site and/or purchasing something from us, you engage in our "Service" and agree to be bound by these Terms of Service ("Terms"), including any additional terms, conditions, and policies referenced here or available by hyperlink, including our Privacy Policy, Shipping Policy, and Return & Refund Policy.', 'dawp'); ?></p>
          <p><?php esc_html_e('These Terms apply to all users of the site, including without limitation browsers, customers, account holders, merchants/partners (if applicable), and contributors of content.', 'dawp'); ?></p>
          <p><?php esc_html_e('Please read these Terms carefully before accessing or using our website. If you do not agree to all the terms and conditions, you may not access the website or use any services.', 'dawp'); ?></p>
        </section>

        <section id="online-store" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('1. Online Store Terms', 'dawp'); ?></p>
          <h2><?php esc_html_e('You must use the store lawfully and responsibly.', 'dawp'); ?></h2>
          <p><?php esc_html_e('By agreeing to these Terms, you represent that you are at least the age of majority in your jurisdiction, or that you have given us your consent to allow any minor dependents to use this site under your supervision.', 'dawp'); ?></p>
          <p><?php esc_html_e('You may not use our products or Services for any unlawful or unauthorized purpose, and you may not violate any applicable laws or regulations in your jurisdiction, including import/export, consumer protection, or intellectual property laws.', 'dawp'); ?></p>
          <p><?php esc_html_e('You must not transmit any worms, viruses, malware, or any code of a destructive nature.', 'dawp'); ?></p>
          <p><?php esc_html_e('A breach or violation of any of these Terms may result in immediate suspension or termination of your access to our Services.', 'dawp'); ?></p>
        </section>

        <section id="general" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('2. General Conditions', 'dawp'); ?></p>
          <h2><?php esc_html_e('We may refuse service or limit access when needed.', 'dawp'); ?></h2>
          <p><?php esc_html_e('We reserve the right to refuse service, limit access, cancel orders, or suspend accounts to anyone for any reason at any time, including suspected fraud, abuse, misuse of promotions, or violations of these Terms.', 'dawp'); ?></p>
          <p><?php esc_html_e('You understand that your content, excluding payment card information, may be transferred unencrypted over various networks and may be adapted to technical requirements of connecting devices or networks. Payment card information is encrypted during transmission by our payment processors.', 'dawp'); ?></p>
          <p><?php esc_html_e('You agree not to reproduce, duplicate, copy, sell, resell, or exploit any portion of the Service without our express written permission.', 'dawp'); ?></p>
          <p><?php esc_html_e('Headings in this agreement are included for convenience only and do not limit or otherwise affect these Terms.', 'dawp'); ?></p>
        </section>

        <section id="accuracy" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('3. Accuracy, Completeness, and Timeliness of Information', 'dawp'); ?></p>
          <h2><?php esc_html_e('Site information may not always be complete, accurate, or current.', 'dawp'); ?></h2>
          <p><?php esc_html_e('We try to ensure that information on this site is accurate and up to date, but we do not guarantee that all information, including product descriptions, pricing, availability, compatibility information, or images, is always complete, accurate, or current.', 'dawp'); ?></p>
          <p><?php esc_html_e('The material on this site is provided for general information only and should not be relied upon as the sole basis for making decisions without verifying more specific, complete, or timely information.', 'dawp'); ?></p>
          <p><?php esc_html_e('We reserve the right to modify site content at any time, but we are not obligated to update any information except as required by law.', 'dawp'); ?></p>
        </section>

        <section id="service-prices" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('4. Modifications to the Service and Prices', 'dawp'); ?></p>
          <h2><?php esc_html_e('Prices and services may change without notice.', 'dawp'); ?></h2>
          <p><?php esc_html_e('Prices for products may change without notice.', 'dawp'); ?></p>
          <p><?php esc_html_e('We reserve the right to modify, suspend, or discontinue any part of the Service, including product listings, categories, features, promotions, or checkout functionality, at any time without notice.', 'dawp'); ?></p>
          <p><?php esc_html_e('We shall not be liable to you or to any third party for any modification, price change, suspension, or discontinuation of the Service.', 'dawp'); ?></p>
        </section>

        <section id="products" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('5. Products or Services', 'dawp'); ?></p>
          <h2><?php esc_html_e('Some products or services may be limited or online only.', 'dawp'); ?></h2>
          <p><?php esc_html_e('Certain products or services may be available exclusively online through the website. Some products may have limited quantities, category-specific restrictions, or delivery limitations based on destination, carrier, or local law.', 'dawp'); ?></p>
          <p><?php esc_html_e('Product images are for illustrative purposes only. While we make reasonable efforts to display product colors, packaging, and details accurately, we cannot guarantee your device display will reflect exact product appearance.', 'dawp'); ?></p>
          <p><?php esc_html_e('We reserve the right, but are not obligated, to:', 'dawp'); ?></p>
          <ul>
            <li><?php esc_html_e('Limit the sales of our products or Services to any person, region, or jurisdiction.', 'dawp'); ?></li>
            <li><?php esc_html_e('Limit quantities purchased per order, household, or account.', 'dawp'); ?></li>
            <li><?php esc_html_e('Discontinue any product at any time.', 'dawp'); ?></li>
            <li><?php esc_html_e('Refuse orders that appear to be placed by dealers, resellers, or distributors unless approved by us.', 'dawp'); ?></li>
          </ul>
          <p><?php esc_html_e('All products are subject to our Return & Refund Policy, including category-specific exceptions stated on product pages.', 'dawp'); ?></p>
        </section>

        <section id="billing" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('6. Accuracy of Billing and Account Information', 'dawp'); ?></p>
          <h2><?php esc_html_e('Accurate order information is required.', 'dawp'); ?></h2>
          <p><?php esc_html_e('We reserve the right to refuse, limit, or cancel any order you place with us. This may include limitations on quantities purchased per person, household, payment method, address, or order.', 'dawp'); ?></p>
          <p><?php esc_html_e('In the event that we make a change to or cancel an order, we may attempt to notify you using the email address, billing address, and/or phone number provided at the time the order was made.', 'dawp'); ?></p>
          <p><?php esc_html_e('You agree to provide current, complete, and accurate purchase, payment, shipping, and account information for all transactions. You agree to promptly update your account and other information, including your email address, shipping address, and payment details, so we can complete your transactions and contact you as needed.', 'dawp'); ?></p>
        </section>

        <section id="optional-tools" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('7. Optional Tools', 'dawp'); ?></p>
          <h2><?php esc_html_e('Third-party tools are used at your own discretion.', 'dawp'); ?></h2>
          <p><?php esc_html_e('We may provide you with access to third-party tools or features, such as financing options, shipping estimators, product comparison tools, chat tools, or integrations, that we do not monitor or control.', 'dawp'); ?></p>
          <p><?php esc_html_e('These tools are provided "as is" and "as available" without warranties, representations, or conditions of any kind and without endorsement.', 'dawp'); ?></p>
          <p><?php esc_html_e('Your use of optional third-party tools is entirely at your own risk and discretion, and you should review the terms provided by the relevant third-party provider(s).', 'dawp'); ?></p>
        </section>

        <section id="third-party" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('8. Third-Party Links', 'dawp'); ?></p>
          <h2><?php esc_html_e('Third-party links may lead to services not affiliated with us.', 'dawp'); ?></h2>
          <p><?php esc_html_e('Certain content, products, services, or features available through our Service may include materials from third parties or links to third-party websites.', 'dawp'); ?></p>
          <p><?php esc_html_e('Third-party links on this site may direct you to websites or services that are not affiliated with us. We are not responsible for examining or evaluating their content, accuracy, policies, or practices, and we do not warrant and will not have any liability for any third-party materials, websites, products, or services.', 'dawp'); ?></p>
          <p><?php esc_html_e('Please review the applicable terms and privacy policies of any third-party website before engaging in any transaction or sharing personal information.', 'dawp'); ?></p>
        </section>

        <section id="submissions" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('9. User Comments and Submissions', 'dawp'); ?></p>
          <h2><?php esc_html_e('Submissions may be used in connection with our business.', 'dawp'); ?></h2>
          <p><?php esc_html_e('If you submit reviews, comments, suggestions, feedback, ideas, photos, or other materials, collectively "Submissions", you grant us a non-exclusive, worldwide, royalty-free, perpetual license to use, reproduce, publish, translate, adapt, and display such Submissions in connection with our business and Services.', 'dawp'); ?></p>
          <p><?php esc_html_e('You agree that your Submissions will not violate any rights of any third party and will not contain unlawful, abusive, defamatory, misleading, obscene, or harmful material, or any malware or malicious code.', 'dawp'); ?></p>
          <p><?php esc_html_e('We may, but are not obligated to, monitor, edit, or remove content that we determine in our sole discretion to be unlawful, offensive, fraudulent, misleading, or in violation of these Terms.', 'dawp'); ?></p>
        </section>

        <section id="personal-information" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('10. Personal Information', 'dawp'); ?></p>
          <h2><?php esc_html_e('Personal information is governed by our Privacy Policy.', 'dawp'); ?></h2>
          <p><?php esc_html_e('Your submission of personal information through the site is governed by our Privacy Policy. By using our Services, you acknowledge that you have read and understood our Privacy Policy.', 'dawp'); ?></p>
        </section>

        <section id="errors" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('11. Errors, Inaccuracies, and Omissions', 'dawp'); ?></p>
          <h2><?php esc_html_e('We may correct inaccurate site or order information.', 'dawp'); ?></h2>
          <p><?php esc_html_e('Occasionally, there may be information on our site or in the Service that contains typographical errors, inaccuracies, or omissions relating to product descriptions, pricing, promotions, shipping charges, availability, estimated delivery times, or other content.', 'dawp'); ?></p>
          <p><?php esc_html_e('We reserve the right to correct any errors, inaccuracies, or omissions, and to change or update information or cancel orders if any information in the Service or on any related website is inaccurate at any time without prior notice, including after you have submitted your order, subject to applicable law.', 'dawp'); ?></p>
        </section>

        <section id="prohibited" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('12. Prohibited Uses', 'dawp'); ?></p>
          <h2><?php esc_html_e('You may not use the site for prohibited conduct.', 'dawp'); ?></h2>
          <p><?php esc_html_e('In addition to other prohibitions set forth in these Terms, you are prohibited from using the site or its content:', 'dawp'); ?></p>
          <ul>
            <li><?php esc_html_e('For any unlawful purpose or to solicit others to perform unlawful acts.', 'dawp'); ?></li>
            <li><?php esc_html_e('To violate any international, federal, state, provincial, or local laws or regulations.', 'dawp'); ?></li>
            <li><?php esc_html_e('To infringe upon or violate our intellectual property rights or the rights of others.', 'dawp'); ?></li>
            <li><?php esc_html_e('To harass, abuse, insult, harm, defame, slander, intimidate, or discriminate.', 'dawp'); ?></li>
            <li><?php esc_html_e('To submit false, misleading, or fraudulent information.', 'dawp'); ?></li>
            <li><?php esc_html_e('To upload or transmit viruses, malware, or malicious code.', 'dawp'); ?></li>
            <li><?php esc_html_e('To collect or track the personal information of others without authorization.', 'dawp'); ?></li>
            <li><?php esc_html_e('To spam, phish, scrape, crawl, or otherwise interfere with site security or operations.', 'dawp'); ?></li>
            <li><?php esc_html_e('To attempt to gain unauthorized access to our systems, accounts, or networks.', 'dawp'); ?></li>
            <li><?php esc_html_e('To use the site in a way that could disable, overburden, or impair our Services.', 'dawp'); ?></li>
            <li><?php esc_html_e('To misuse coupons, promotions, returns, refunds, or other customer programs.', 'dawp'); ?></li>
          </ul>
          <p><?php esc_html_e('We reserve the right to terminate your use of the Service for violating any prohibited use.', 'dawp'); ?></p>
        </section>

        <section id="liability" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('13. Disclaimer of Warranties; Limitation of Liability', 'dawp'); ?></p>
          <h2><?php esc_html_e('The Service is provided as available and subject to legal limits.', 'dawp'); ?></h2>
          <p><?php esc_html_e('We do not guarantee, represent, or warrant that your use of our Service will be uninterrupted, timely, secure, or error-free.', 'dawp'); ?></p>
          <p><?php esc_html_e('To the fullest extent permitted by law, the Service and all products and services delivered to you through the Service are provided "as is" and "as available", without any warranties or conditions of any kind, either express or implied, except where prohibited by law.', 'dawp'); ?></p>
          <p><?php echo esc_html(sprintf('To the fullest extent permitted by law, %s, its affiliates, officers, directors, employees, agents, contractors, suppliers, and service providers shall not be liable for any indirect, incidental, punitive, special, or consequential damages arising from your use of the Service or any products purchased through the Service.', $brand_name)); ?></p>
          <p><?php esc_html_e('Nothing in these Terms limits liability that cannot be limited under applicable law, such as certain consumer rights.', 'dawp'); ?></p>
        </section>

        <section id="indemnification" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('14. Indemnification', 'dawp'); ?></p>
          <h2><?php esc_html_e('You agree to hold us harmless for certain claims.', 'dawp'); ?></h2>
          <p><?php echo esc_html(sprintf('You agree to indemnify, defend, and hold harmless %s and our affiliates, partners, officers, directors, agents, contractors, licensors, service providers, subcontractors, suppliers, and employees from any claim, demand, liability, damages, losses, or expenses, including reasonable attorneys\' fees, arising out of or related to:', $brand_name)); ?></p>
          <ul>
            <li><?php esc_html_e('Your breach of these Terms.', 'dawp'); ?></li>
            <li><?php esc_html_e('Your violation of any law or regulation.', 'dawp'); ?></li>
            <li><?php esc_html_e('Your violation of any third-party rights.', 'dawp'); ?></li>
            <li><?php esc_html_e('Your misuse of the website, Services, or products.', 'dawp'); ?></li>
          </ul>
        </section>

        <section id="severability" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('15. Severability', 'dawp'); ?></p>
          <h2><?php esc_html_e('Unenforceable terms may be severed without affecting the rest.', 'dawp'); ?></h2>
          <p><?php esc_html_e('If any provision of these Terms is determined to be unlawful, void, or unenforceable, that provision shall nonetheless be enforceable to the fullest extent permitted by applicable law, and the unenforceable portion shall be deemed severed from these Terms. Such determination shall not affect the validity and enforceability of any remaining provisions.', 'dawp'); ?></p>
        </section>

        <section id="termination" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('16. Termination', 'dawp'); ?></p>
          <h2><?php esc_html_e('These Terms remain effective until terminated.', 'dawp'); ?></h2>
          <p><?php esc_html_e('These Terms are effective unless and until terminated by either you or us. You may terminate these Terms at any time by discontinuing use of our website and Services. We may suspend or terminate your access to the Service immediately, without notice, if we believe you have violated these Terms, engaged in fraud or abuse, or used the Service in a way that may harm us, other users, or third parties.', 'dawp'); ?></p>
          <p><?php esc_html_e('Any obligations and liabilities incurred before termination shall survive termination to the extent required by law or by their nature.', 'dawp'); ?></p>
        </section>

        <section id="entire-agreement" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('17. Entire Agreement', 'dawp'); ?></p>
          <h2><?php esc_html_e('These Terms and posted policies form the full agreement.', 'dawp'); ?></h2>
          <p><?php echo esc_html(sprintf('These Terms, together with any policies or operating rules posted by us on this site, including our Privacy Policy, Shipping Policy, and Return & Refund Policy, constitute the entire agreement between you and %s regarding your use of the Service and supersede any prior or contemporaneous agreements, communications, or proposals.', $brand_name)); ?></p>
        </section>

        <section id="governing-law" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('18. Governing Law', 'dawp'); ?></p>
          <h2><?php esc_html_e('These Terms are governed by the laws of the USA.', 'dawp'); ?></h2>
          <p><?php esc_html_e('These Terms and any separate agreements whereby we provide you Services shall be governed by and construed in accordance with the laws of the USA, without regard to conflict of law principles. If required by applicable consumer protection laws, you may also have rights under the laws of your place of residence.', 'dawp'); ?></p>
        </section>

        <section id="changes" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('19. Changes to Terms of Service', 'dawp'); ?></p>
          <h2><?php esc_html_e('The current version is posted on this page.', 'dawp'); ?></h2>
          <p><?php esc_html_e('You can review the most current version of these Terms of Service at any time on this page.', 'dawp'); ?></p>
          <p><?php esc_html_e('We reserve the right to update, change, or replace any part of these Terms by posting updates to our website. Changes become effective when posted unless otherwise stated. Your continued use of the website or Services after changes are posted constitutes acceptance of those changes.', 'dawp'); ?></p>
        </section>

        <section id="contact-info" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('20. Contact Information', 'dawp'); ?></p>
          <h2><?php echo esc_html(sprintf('%s support details.', $brand_name)); ?></h2>
          <div class="qb-contact-card">
            <div class="qb-contact-item">
              <strong><?php esc_html_e('Store Name', 'dawp'); ?></strong>
              <span><?php echo esc_html($brand_name); ?></span>
            </div>
            <?php if ($store_address) : ?>
              <div class="qb-contact-item">
                <strong><?php esc_html_e('Address', 'dawp'); ?></strong>
                <span><?php echo esc_html($store_address); ?></span>
              </div>
            <?php endif; ?>
            <div class="qb-contact-item">
              <strong><?php esc_html_e('Email', 'dawp'); ?></strong>
              <span><a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a></span>
            </div>
            <div class="qb-contact-item">
              <strong><?php esc_html_e('Customer Service Hours', 'dawp'); ?></strong>
              <span><?php esc_html_e('Monday-Friday, 9:00 AM-6:00 PM PST.', 'dawp'); ?></span>
            </div>
            <div class="qb-contact-item">
              <strong><?php esc_html_e('Response Time', 'dawp'); ?></strong>
              <span><?php esc_html_e('We aim to reply within 1 business day. Response times may vary on weekends, holidays, or high-volume periods.', 'dawp'); ?></span>
            </div>
          </div>
        </section>
      </div>
    </div>
  </section>

</div>
