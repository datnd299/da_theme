<?php
/**
 * Template Part: page-privacy
 *
 * @package dawp
 */

$support_email = function_exists('dawp_contact_support_email') ? dawp_contact_support_email() : 'support@queens-bracelet.com';
$store_address = function_exists('dawp_get_store_address_line') ? dawp_get_store_address_line() : '';
?>

<style>
  .qb-page { --qb-blush:#ffb7c5; --qb-peach:#ffd6a5; --qb-mint:#cff5e7; --qb-gold:#d8a94e; --qb-plum:#2f1f35; --qb-gray:#f7f7fa; --qb-text:#4f4355; --qb-border:#eadfe8; background:#fff; color:var(--qb-text); font-family:"DM Sans","Inter",system-ui,sans-serif; }
  .qb-page * { box-sizing:border-box; }
  .qb-page a { text-decoration:none; }
  .qb-wrap { width:min(100% - 32px,1280px); margin-inline:auto; }
  .qb-section { padding:72px 0; }
  .qb-eyebrow { margin:0 0 12px; color:var(--qb-gold); font-size:12px; font-weight:800; letter-spacing:.18em; text-transform:uppercase; }
  .qb-title { margin:0; color:var(--qb-plum); font-family:Georgia,"Times New Roman",serif; font-size:clamp(34px,4.2vw,58px); line-height:1.04; letter-spacing:0; }
  .qb-copy { margin:18px 0 0; max-width:720px; color:var(--qb-text); font-size:17px; line-height:1.75; }
  .qb-actions { display:flex; flex-wrap:wrap; gap:14px; margin-top:30px; }
  .qb-button { display:inline-flex; min-height:48px; align-items:center; justify-content:center; border:1px solid var(--qb-plum); border-radius:999px; background:var(--qb-plum); color:#fff; padding:0 24px; font-size:14px; font-weight:800; transition:.2s ease; }
  .qb-button:hover { border-color:var(--qb-gold); background:var(--qb-gold); color:var(--qb-plum); }
  .qb-button--secondary { background:#fff; color:var(--qb-plum); }
  .qb-plum .qb-button { border-color:var(--qb-gold); background:var(--qb-gold); color:var(--qb-plum); }
  .qb-plum .qb-button:hover { border-color:#fff; background:#fff; color:var(--qb-plum); }
  .qb-plum .qb-button--secondary { border-color:rgba(255,255,255,.7); background:#fff; color:var(--qb-plum); }
  .qb-hero { overflow:hidden; background:linear-gradient(135deg,rgba(255,183,197,.35),rgba(255,214,165,.38) 48%,rgba(207,245,231,.4)),#fff; }
  .qb-hero__grid { display:grid; grid-template-columns:minmax(0,1.02fr) minmax(320px,.98fr); gap:48px; align-items:center; padding:78px 0; }
  .qb-panel, .qb-card, .qb-policy-card { border:1px solid var(--qb-border); border-radius:24px; background:#fff; box-shadow:0 18px 46px rgba(47,31,53,.08); }
  .qb-panel { padding:clamp(24px,4vw,44px); background:rgba(255,255,255,.86); }
  .qb-summary-grid { display:grid; grid-template-columns:repeat(4,minmax(0,1fr)); gap:18px; }
  .qb-card { padding:22px; }
  .qb-card b { display:inline-flex; width:42px; height:42px; align-items:center; justify-content:center; border-radius:999px; background:#fff4f6; color:var(--qb-plum); font-size:13px; }
  .qb-card h3, .qb-policy-card h2, .qb-mini-card strong { margin:18px 0 0; color:var(--qb-plum); }
  .qb-card p, .qb-policy-card p, .qb-policy-card li, .qb-mini-card p { color:#675a6c; font-size:14px; line-height:1.65; }
  .qb-soft { background:var(--qb-gray); }
  .qb-content-grid { display:grid; grid-template-columns:.82fr 1.18fr; gap:34px; align-items:start; }
  .qb-sidebar { position:sticky; top:120px; display:grid; gap:16px; }
  .qb-dark-card { border-radius:24px; background:var(--qb-plum); padding:28px; color:#fff; }
  .qb-dark-card .qb-eyebrow { color:var(--qb-peach); }
  .qb-dark-card h2, .qb-dark-card p, .qb-dark-card a { color:#fff; }
  .qb-dark-card p { color:rgba(255,255,255,.78); font-size:15px; line-height:1.7; }
  .qb-side-nav { display:grid; gap:10px; margin-top:22px; }
  .qb-side-nav a { border:1px solid rgba(255,255,255,.15); border-radius:999px; padding:10px 14px; color:#fff; font-size:13px; font-weight:800; }
  .qb-policy-stack { display:grid; gap:22px; }
  .qb-policy-card { padding:clamp(24px,4vw,40px); }
  .qb-policy-card:nth-child(even) { background:#fffafc; }
  .qb-policy-card h2 { font-size:clamp(25px,3vw,38px); line-height:1.12; font-family:Georgia,"Times New Roman",serif; }
  .qb-policy-card h3 { margin:24px 0 0; color:var(--qb-plum); font-size:18px; }
  .qb-policy-card h2 + p, .qb-policy-card h2 + ul { margin-top:clamp(14px,1.8vw,20px); }
  .qb-policy-card ul { display:grid; gap:10px; margin:18px 0 0; padding-left:1.15rem; list-style:disc outside; }
  .qb-policy-card p { margin:16px 0 0; }
  .qb-mini-grid { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:14px; margin-top:22px; }
  .qb-mini-card { border:1px solid var(--qb-border); border-radius:18px; background:#fff; padding:18px; }
  .qb-contact-card { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:14px; margin-top:24px; }
  .qb-contact-item { border:1px solid var(--qb-border); border-radius:18px; background:#fff; padding:16px; }
  .qb-contact-item strong { display:block; color:var(--qb-plum); font-size:14px; }
  .qb-contact-item span { display:block; margin-top:7px; color:#675a6c; font-size:14px; line-height:1.6; }
  .qb-plum { background:var(--qb-plum); color:#fff; }
  .qb-plum .qb-title, .qb-plum .qb-copy { color:#fff; }
  .qb-policy-links { display:flex; flex-wrap:wrap; gap:10px; margin-top:28px; }
  .qb-policy-links a { border:1px solid rgba(255,255,255,.22); border-radius:999px; background:rgba(255,255,255,.1); padding:10px 14px; color:#fff; font-size:13px; font-weight:800; }
  @media (max-width:1080px) { .qb-summary-grid { grid-template-columns:repeat(2,minmax(0,1fr)); } }
  @media (max-width:780px) { .qb-section { padding:56px 0; } .qb-hero__grid, .qb-content-grid, .qb-summary-grid, .qb-mini-grid, .qb-contact-card { grid-template-columns:1fr; } .qb-hero__grid { padding:58px 0; } .qb-sidebar { position:static; } .qb-actions { flex-direction:column; } .qb-button { width:100%; } }
</style>

<div class="qb-page qb-privacy">
  <section class="qb-hero">
    <div class="qb-wrap qb-hero__grid">
      <div>
        <p class="qb-eyebrow"><?php esc_html_e('Privacy Policy', 'dawp'); ?></p>
        <h1 class="qb-title"><?php esc_html_e('Privacy Policy', 'dawp'); ?></h1>
        <p class="qb-copy"><?php esc_html_e("Last updated: February 23, 2026. This Privacy Policy explains how Queen's Bracelet collects, uses, and protects your personal information when you visit queens-bracelet.com or use our services.", 'dawp'); ?></p>
        <div class="qb-actions">
          <a class="qb-button" href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
          <a class="qb-button qb-button--secondary" href="<?php echo esc_url(home_url('/terms-conditions/')); ?>"><?php esc_html_e('Terms & Conditions', 'dawp'); ?></a>
        </div>
      </div>
      <div class="qb-panel">
        <p class="qb-eyebrow"><?php esc_html_e('Privacy Snapshot', 'dawp'); ?></p>
        <div class="qb-mini-grid">
          <div class="qb-mini-card"><strong><?php esc_html_e('Responsible Use', 'dawp'); ?></strong><p><?php esc_html_e('We use information to process orders, support customers, and improve your shopping experience.', 'dawp'); ?></p></div>
          <div class="qb-mini-card"><strong><?php esc_html_e('Secure Checkout', 'dawp'); ?></strong><p><?php esc_html_e('Payment details are handled through secure ecommerce payment systems.', 'dawp'); ?></p></div>
          <div class="qb-mini-card"><strong><?php esc_html_e('No Data Selling', 'dawp'); ?></strong><p><?php esc_html_e('We do not sell customer personal information to unrelated third parties.', 'dawp'); ?></p></div>
          <div class="qb-mini-card"><strong><?php esc_html_e('Privacy Help', 'dawp'); ?></strong><p><?php esc_html_e('Customers may contact support with privacy questions or information requests.', 'dawp'); ?></p></div>
        </div>
      </div>
    </div>
  </section>

  <section class="qb-section">
    <div class="qb-wrap qb-summary-grid">
      <div class="qb-card"><b>01</b><h3><?php esc_html_e('How We Collect', 'dawp'); ?></h3><p><?php esc_html_e('We collect information directly from you, automatically through site use, and from trusted third-party services.', 'dawp'); ?></p></div>
      <div class="qb-card"><b>02</b><h3><?php esc_html_e('How We Use It', 'dawp'); ?></h3><p><?php esc_html_e('We use information for orders, shipping, support, fraud prevention, website improvement, and opt-in marketing.', 'dawp'); ?></p></div>
      <div class="qb-card"><b>03</b><h3><?php esc_html_e('Service Providers', 'dawp'); ?></h3><p><?php esc_html_e('Necessary details may be shared with providers for payments, shipping, analytics, hosting, email, and customer support.', 'dawp'); ?></p></div>
      <div class="qb-card"><b>04</b><h3><?php esc_html_e('Contact', 'dawp'); ?></h3><p><a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a><br><?php esc_html_e('Monday-Friday, 9:00 AM-6:00 PM EST.', 'dawp'); ?></p></div>
    </div>
  </section>

  <section class="qb-section qb-soft">
    <div class="qb-wrap qb-content-grid">
      <aside class="qb-sidebar">
        <div class="qb-dark-card">
          <p class="qb-eyebrow"><?php esc_html_e('Privacy Sections', 'dawp'); ?></p>
          <h2 class="qb-title" style="font-size:clamp(28px,3vw,42px);"><?php esc_html_e('Transparent by design.', 'dawp'); ?></h2>
          <p><?php esc_html_e('Review how we collect information, the tools we use, how data is shared, SMS terms, your rights, retention, and contact details.', 'dawp'); ?></p>
          <nav class="qb-side-nav" aria-label="<?php esc_attr_e('Privacy sections', 'dawp'); ?>">
            <a href="#collect"><?php esc_html_e('How We Collect', 'dawp'); ?></a>
            <a href="#tools"><?php esc_html_e('Tools & Services', 'dawp'); ?></a>
            <a href="#use"><?php esc_html_e('How We Use It', 'dawp'); ?></a>
            <a href="#payments"><?php esc_html_e('Payments & Security', 'dawp'); ?></a>
            <a href="#cookies"><?php esc_html_e('Cookies', 'dawp'); ?></a>
            <a href="#sharing"><?php esc_html_e('Sharing', 'dawp'); ?></a>
            <a href="#messaging"><?php esc_html_e('Messaging Terms', 'dawp'); ?></a>
            <a href="#rights"><?php esc_html_e('Your Privacy Rights', 'dawp'); ?></a>
            <a href="#contact-info"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
          </nav>
        </div>
      </aside>

      <div class="qb-policy-stack">
        <section id="collect" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('How We Collect Information', 'dawp'); ?></p>
          <h2><?php esc_html_e('We collect information in three main ways.', 'dawp'); ?></h2>
          <p><?php esc_html_e('This includes information directly from you, information collected automatically through your use of the Site, and information from trusted third-party services.', 'dawp'); ?></p>
          <h3><?php esc_html_e('1. Information You Provide', 'dawp'); ?></h3>
          <ul>
            <li><?php esc_html_e('Contact details such as name, email, phone number, billing address, and shipping address.', 'dawp'); ?></li>
            <li><?php esc_html_e('Order information such as products purchased, order history, and delivery details.', 'dawp'); ?></li>
            <li><?php esc_html_e('Account details if you create an account.', 'dawp'); ?></li>
            <li><?php esc_html_e('Customer support messages and inquiries.', 'dawp'); ?></li>
          </ul>
          <h3><?php esc_html_e('2. Automatically Collected Information', 'dawp'); ?></h3>
          <ul>
            <li><?php esc_html_e('Device and browser type.', 'dawp'); ?></li>
            <li><?php esc_html_e('IP address and approximate location.', 'dawp'); ?></li>
            <li><?php esc_html_e('Pages visited, time spent, and interactions.', 'dawp'); ?></li>
            <li><?php esc_html_e('Shopping behavior such as products viewed and cart activity.', 'dawp'); ?></li>
          </ul>
          <h3><?php esc_html_e('3. Information from Third Parties', 'dawp'); ?></h3>
          <ul>
            <li><?php esc_html_e('Payment providers, including transaction confirmations only.', 'dawp'); ?></li>
            <li><?php esc_html_e('Shipping carriers, including tracking and delivery updates.', 'dawp'); ?></li>
            <li><?php esc_html_e('Analytics and marketing tools.', 'dawp'); ?></li>
          </ul>
        </section>

        <section id="tools" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Tools and Services We Use', 'dawp'); ?></p>
          <h2><?php esc_html_e('We use trusted services to operate our store efficiently.', 'dawp'); ?></h2>
          <ul>
            <li><?php esc_html_e('Website platform: WordPress and WooCommerce.', 'dawp'); ?></li>
            <li><?php esc_html_e('Analytics: Google Analytics to understand site usage and improve performance.', 'dawp'); ?></li>
            <li><?php esc_html_e('Payments: Secure payment providers such as Stripe and PayPal.', 'dawp'); ?></li>
            <li><?php esc_html_e('Email communication: Used for order updates and customer communication.', 'dawp'); ?></li>
            <li><?php esc_html_e('Customer support: Contact form, support email, and customer support systems.', 'dawp'); ?></li>
            <li><?php esc_html_e('Shipping: Carriers such as USPS, UPS, and FedEx.', 'dawp'); ?></li>
          </ul>
          <p><?php esc_html_e('These providers only access the information necessary to perform their services.', 'dawp'); ?></p>
        </section>

        <section id="use" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('How We Use Information', 'dawp'); ?></p>
          <h2><?php esc_html_e('Your information is used to run and improve the store.', 'dawp'); ?></h2>
          <ul>
            <li><?php esc_html_e('Process and deliver your orders.', 'dawp'); ?></li>
            <li><?php esc_html_e('Send order confirmations and updates.', 'dawp'); ?></li>
            <li><?php esc_html_e('Provide customer support.', 'dawp'); ?></li>
            <li><?php esc_html_e('Improve our website and services.', 'dawp'); ?></li>
            <li><?php esc_html_e('Detect and prevent fraudulent activity.', 'dawp'); ?></li>
            <li><?php esc_html_e('Send marketing communications only if you opt in.', 'dawp'); ?></li>
          </ul>
        </section>

        <section id="payments" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Payments & Security', 'dawp'); ?></p>
          <h2><?php esc_html_e('Checkout is handled through secure payment providers.', 'dawp'); ?></h2>
          <p><?php esc_html_e('All payments are processed through secure third-party payment providers. We do not store your full payment card details on our servers.', 'dawp'); ?></p>
          <p><?php esc_html_e('Your information is protected using industry-standard SSL encryption during checkout.', 'dawp'); ?></p>
        </section>

        <section id="cookies" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Cookies & Tracking', 'dawp'); ?></p>
          <h2><?php esc_html_e('We use cookies and similar technologies.', 'dawp'); ?></h2>
          <ul>
            <li><?php esc_html_e('Ensure the website functions properly.', 'dawp'); ?></li>
            <li><?php esc_html_e('Remember your preferences and cart.', 'dawp'); ?></li>
            <li><?php esc_html_e('Analyze traffic and user behavior.', 'dawp'); ?></li>
            <li><?php esc_html_e('Improve product recommendations.', 'dawp'); ?></li>
          </ul>
          <p><?php esc_html_e('You can manage cookies through your browser settings.', 'dawp'); ?></p>
        </section>

        <section id="sharing" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('How We Share Information', 'dawp'); ?></p>
          <h2><?php esc_html_e('Customer data is not shared for third-party promotional or marketing purposes.', 'dawp'); ?></h2>
          <h3><?php esc_html_e('Data Sharing', 'dawp'); ?></h3>
          <ul>
            <li><?php esc_html_e('Customer data is not shared with third parties for promotional or marketing purposes.', 'dawp'); ?></li>
            <li><?php esc_html_e('Mobile opt-in and consent are never shared with anyone for any purpose.', 'dawp'); ?></li>
          </ul>
          <p><?php esc_html_e('Any information sharing that may be mentioned elsewhere in this policy excludes mobile opt-in data.', 'dawp'); ?></p>
          <p><?php esc_html_e('We only share your information when necessary to operate our business, including with service providers for payments, shipping, analytics, hosting, customer support, when required by law or legal processes, or to prevent fraud and protect our business.', 'dawp'); ?></p>
          <p><?php esc_html_e('We do not sell your personal information.', 'dawp'); ?></p>
        </section>

        <section id="messaging" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Queen\'s Bracelet Messaging Terms and Conditions', 'dawp'); ?></p>
          <h2><?php esc_html_e('These terms apply if you opt in to SMS messaging.', 'dawp'); ?></h2>
          <ol>
            <li><?php esc_html_e('The messaging program may include general conversational messaging to answer questions and provide support to customers, promotional offers or discounts, and promotion of our products or services.', 'dawp'); ?></li>
            <li><?php esc_html_e('You can cancel the SMS service at any time. Text STOP to the phone number from which you received messages. After you send STOP, we will send an SMS confirmation that you have been unsubscribed. After this, you will no longer receive SMS messages from us. If you want to join again, sign up as you did the first time and we will start sending SMS messages to you again.', 'dawp'); ?></li>
            <li><?php printf(
                /* translators: %s: support email address. */
                esc_html__('If you are experiencing issues with the messaging program, reply with HELP for more assistance, or get help directly at %s.', 'dawp'),
                '<a href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>'
            ); ?></li>
            <li><?php esc_html_e('Carriers are not liable for delayed or undelivered messages.', 'dawp'); ?></li>
            <li><?php esc_html_e('Message and data rates may apply for any messages sent to you from us and to us from you. Message frequency will vary based on communication needs. If you have questions about your text plan or data plan, contact your wireless provider.', 'dawp'); ?></li>
            <li><?php esc_html_e('If you have questions regarding privacy, please read the rest of this Privacy Policy.', 'dawp'); ?></li>
          </ol>
        </section>

        <section id="rights" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Your Privacy Rights', 'dawp'); ?></p>
          <h2><?php esc_html_e('Depending on your location, you may have privacy rights.', 'dawp'); ?></h2>
          <ul>
            <li><?php esc_html_e('Access or update your personal information.', 'dawp'); ?></li>
            <li><?php esc_html_e('Request deletion of your data.', 'dawp'); ?></li>
            <li><?php esc_html_e('Opt out of marketing communications.', 'dawp'); ?></li>
          </ul>
          <p><?php esc_html_e('To submit a request, please contact us using the details below.', 'dawp'); ?></p>
          <h3><?php esc_html_e('Data Retention', 'dawp'); ?></h3>
          <p><?php esc_html_e('We retain personal information only as long as necessary to fulfill orders and provide services, provide customer support, and comply with legal and financial obligations.', 'dawp'); ?></p>
          <h3><?php esc_html_e('Children\'s Privacy', 'dawp'); ?></h3>
          <p><?php esc_html_e('Our services are not intended for individuals under 18. We do not knowingly collect personal information from minors.', 'dawp'); ?></p>
          <h3><?php esc_html_e('Changes to This Policy', 'dawp'); ?></h3>
          <p><?php esc_html_e('We may update this Privacy Policy from time to time. Any updates will be posted on this page with a revised date.', 'dawp'); ?></p>
          <div class="qb-actions">
            <a class="qb-button" href="mailto:<?php echo esc_attr($support_email); ?>"><?php esc_html_e('Email Privacy Support', 'dawp'); ?></a>
            <a class="qb-button qb-button--secondary" href="<?php echo esc_url(home_url('/shipping-policy/')); ?>"><?php esc_html_e('Shipping Policy', 'dawp'); ?></a>
            <a class="qb-button qb-button--secondary" href="<?php echo esc_url(home_url('/return-refund-policy/')); ?>"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></a>
          </div>
        </section>

        <section id="contact-info" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Contact Us', 'dawp'); ?></p>
          <h2><?php esc_html_e('Contact Queen\'s Bracelet about this Privacy Policy.', 'dawp'); ?></h2>
          <p><?php esc_html_e('If you have any questions about this Privacy Policy or your personal data, please contact us:', 'dawp'); ?></p>
          <div class="qb-contact-card">
            <div class="qb-contact-item">
              <strong><?php esc_html_e('Store Name', 'dawp'); ?></strong>
              <span><?php esc_html_e('Queen\'s Bracelet', 'dawp'); ?></span>
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
              <strong><?php esc_html_e('Support Portal', 'dawp'); ?></strong>
              <span><a href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact Us page', 'dawp'); ?></a></span>
            </div>
            <div class="qb-contact-item">
              <strong><?php esc_html_e('Customer Service Hours', 'dawp'); ?></strong>
              <span><?php esc_html_e('Monday-Friday, 9:00 AM-6:00 PM EST.', 'dawp'); ?></span>
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

  <section class="qb-section qb-plum">
    <div class="qb-wrap">
      <p class="qb-eyebrow"><?php esc_html_e('Policy Updates', 'dawp'); ?></p>
      <h2 class="qb-title"><?php esc_html_e('We may update this Privacy Policy.', 'dawp'); ?></h2>
      <p class="qb-copy"><?php esc_html_e('Any updates will be posted on this page with a revised date. Continued website use after an update means the current Privacy Policy applies to your use of Queen\'s Bracelet.', 'dawp'); ?></p>
      <nav class="qb-policy-links" aria-label="<?php esc_attr_e('Related policy links', 'dawp'); ?>">
        <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>"><?php esc_html_e('Shipping Policy', 'dawp'); ?></a>
        <a href="<?php echo esc_url(home_url('/return-refund-policy/')); ?>"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></a>
        <a href="<?php echo esc_url(home_url('/terms-conditions/')); ?>"><?php esc_html_e('Terms & Conditions', 'dawp'); ?></a>
        <a href="<?php echo esc_url(home_url('/faq/')); ?>"><?php esc_html_e('FAQ', 'dawp'); ?></a>
        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
      </nav>
    </div>
  </section>
</div>
