<?php
/**
 * Template Part: page-privacy
 *
 * @package dawp
 */

$brand_name    = function_exists('dawp_brand_name') ? dawp_brand_name() : 'Velmo';
$support_email = function_exists('dawp_contact_support_email') ? dawp_contact_support_email() : 'support@velmocustom.com';
$support_mailto = function_exists('dawp_contact_mailto_url') ? dawp_contact_mailto_url(__('Velmo privacy support', 'dawp')) : 'mailto:' . $support_email;
$store_address = function_exists('dawp_get_store_address_line') ? dawp_get_store_address_line() : '';
?>

<style>
  .qb-page { --qb-obsidian:#10243A; --qb-ivory:#F5F4F1; --qb-white:#FFFFFF; --qb-carbon:#111111; --qb-green:#10243A; --qb-gold:#D1AE68; --qb-silver:#A5A5A0; --qb-gray:#F5F4F1; --qb-text:#5F6668; --qb-border:#D8D4CB; --qb-plum:#10243A; --qb-peach:#D1AE68; background:var(--qb-ivory); color:var(--qb-text); font-family:"Inter","DM Sans",system-ui,sans-serif; }
  .qb-page * { box-sizing:border-box; }
  .qb-page a { text-decoration:none; }
  .qb-wrap { width:min(100% - 32px,1280px); margin-inline:auto; }
  .qb-section { padding:72px 0; }
  .qb-eyebrow { margin:0 0 12px; color:var(--qb-gold); font-size:12px; font-weight:800; letter-spacing:.18em; text-transform:uppercase; }
  .qb-title { margin:0; color:var(--qb-plum); font-family:Georgia,"Times New Roman",serif; font-size:clamp(34px,4.2vw,58px); line-height:1.04; letter-spacing:0; }
  .qb-updated { margin:16px 0 0; color:var(--qb-plum); font-size:14px; font-weight:800; line-height:1.4; }
  .qb-copy { margin:18px 0 0; max-width:720px; color:var(--qb-text); font-size:17px; line-height:1.75; }
  .qb-actions { display:flex; flex-wrap:wrap; gap:14px; margin-top:30px; }
  .qb-hero .qb-actions { justify-content:center; }
  .qb-button { display:inline-flex; min-height:48px; align-items:center; justify-content:center; border:1px solid var(--qb-plum); border-radius:4px; background:var(--qb-plum); color:#fff; padding:0 24px; font-size:14px; font-weight:800; transition:.2s ease; }
  .qb-button:hover { border-color:var(--qb-gold); background:var(--qb-gold); color:var(--qb-plum); }
  .qb-button--secondary { background:#fff; color:var(--qb-plum); }
  .qb-plum .qb-button { border-color:var(--qb-gold); background:var(--qb-gold); color:var(--qb-plum); }
  .qb-plum .qb-button:hover { border-color:#fff; background:#fff; color:var(--qb-plum); }
  .qb-plum .qb-button--secondary { border-color:rgba(255,255,255,.7); background:#fff; color:var(--qb-plum); }
  .qb-hero { position:relative; overflow:hidden; border-bottom:1px solid var(--qb-border); background:linear-gradient(120deg,#10243A 0%,#F5F4F1 0.5%,#fff 52%,#ECE7DD 100%); }
  .qb-hero::before { content:""; position:absolute; inset:auto 0 0; height:1px; background:linear-gradient(90deg,transparent,rgba(179,138,82,.7),transparent); }
  .qb-hero::after { content:""; position:absolute; right:8%; top:34px; width:180px; height:180px; border:1px solid rgba(16,36,58,.18); transform:rotate(45deg); }
  .qb-hero__grid { position:relative; z-index:1; display:grid; grid-template-columns:minmax(0,1fr); gap:28px; align-items:center; padding:70px 0 76px; }
  .qb-hero__grid > div { max-width:720px; margin-inline:auto; text-align:center; }
  .qb-hero .qb-copy { margin-inline:auto; }
  .qb-panel, .qb-card, .qb-policy-card { border:1px solid var(--qb-border); border-radius:4px; background:#fff; box-shadow:0 10px 0 rgba(16,36,58,.04); }
  .qb-panel { padding:clamp(24px,4vw,44px); background:rgba(255,255,255,.86); }
  .qb-card { padding:22px; }
  .qb-card b { display:inline-flex; width:42px; height:42px; align-items:center; justify-content:center; border-radius:999px; background:var(--qb-ivory); color:var(--qb-plum); font-size:13px; }
  .qb-card h3, .qb-policy-card h2, .qb-mini-card strong { margin:18px 0 0; color:var(--qb-plum); }
  .qb-card p, .qb-policy-card p, .qb-policy-card li, .qb-mini-card p { color:#A5A5A0; font-size:14px; line-height:1.65; }
  .qb-soft { background:var(--qb-gray); }
  .qb-content-grid { display:grid; grid-template-columns:.82fr 1.18fr; gap:34px; align-items:start; }
  .qb-sidebar { position:sticky; top:120px; display:grid; gap:16px; }
  .qb-dark-card { border-radius:4px; background:var(--qb-plum); padding:28px; color:#fff; }
  .qb-dark-card .qb-eyebrow { color:var(--qb-peach); }
  .qb-dark-card h2, .qb-dark-card p, .qb-dark-card a { color:#fff; }
  .qb-dark-card p { color:rgba(255,255,255,.78); font-size:15px; line-height:1.7; }
  .qb-side-nav { display:grid; gap:10px; margin-top:22px; }
  .qb-side-nav a { border:1px solid rgba(255,255,255,.15); border-radius:4px; padding:10px 14px; color:#fff; font-size:13px; font-weight:800; }
  .qb-policy-stack { display:grid; gap:22px; }
  .qb-policy-card { padding:clamp(24px,4vw,40px); border-top:3px solid rgba(209,174,104,.72); }
  .qb-policy-card:nth-child(even) { background:var(--qb-ivory); }
  .qb-policy-card h2 { font-size:clamp(25px,3vw,38px); line-height:1.12; font-family:Georgia,"Times New Roman",serif; }
  .qb-policy-card h3 { margin:24px 0 0; color:var(--qb-plum); font-size:18px; }
  .qb-policy-card h2 + p, .qb-policy-card h2 + ul, .qb-policy-card h2 + ol { margin-top:clamp(14px,1.8vw,20px); }
  .qb-policy-card ul { display:grid; gap:10px; margin:18px 0 0; padding-left:1.15rem; list-style:disc outside; }
  .qb-policy-card ol { display:grid; gap:12px; margin:18px 0 0; padding-left:1.25rem; list-style:decimal outside; }
  .qb-policy-card p { margin:16px 0 0; }
  .qb-policy-section { margin-top:clamp(24px,3vw,34px); }
  .qb-policy-section h3 { margin-top:0; }
  .qb-policy-section p, .qb-policy-section ul, .qb-policy-section ol { margin-top:12px; }
  .qb-policy-section + .qb-policy-section { margin-top:clamp(26px,3.2vw,38px); padding-top:clamp(22px,2.8vw,30px); border-top:1px solid var(--qb-border); }
  .qb-mini-grid { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:14px; margin-top:22px; }
  .qb-mini-card { border:1px solid var(--qb-border); border-radius:18px; background:#fff; padding:18px; }
  .qb-contact-card { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:14px; margin-top:24px; }
  .qb-contact-item { border:1px solid var(--qb-border); border-radius:18px; background:#fff; padding:16px; }
  .qb-contact-item strong { display:block; color:var(--qb-plum); font-size:14px; }
  .qb-contact-item span { display:block; margin-top:7px; color:#A5A5A0; font-size:14px; line-height:1.6; }
  .qb-plum { background:var(--qb-plum); color:#fff; }
  .qb-plum .qb-title, .qb-plum .qb-copy { color:#fff; }
  .qb-policy-links { display:flex; flex-wrap:wrap; gap:10px; margin-top:28px; }
  .qb-policy-links a { border:1px solid rgba(255,255,255,.22); border-radius:999px; background:rgba(255,255,255,.1); padding:10px 14px; color:#fff; font-size:13px; font-weight:800; }
  @media (max-width:780px) { .qb-section { padding:56px 0; } .qb-hero__grid, .qb-content-grid, .qb-contact-card { grid-template-columns:1fr; } .qb-hero__grid { padding:58px 0; } .qb-sidebar { display:none; } .qb-actions { flex-direction:column; } .qb-button { width:100%; } .qb-panel { padding:22px 0 22px 22px; overflow:hidden; } .qb-panel .qb-eyebrow { padding-right:22px; } .qb-mini-grid { display:flex; grid-template-columns:none; gap:12px; margin-top:18px; overflow-x:auto; padding:0 22px 4px 0; scroll-snap-type:x mandatory; -webkit-overflow-scrolling:touch; } .qb-mini-grid::-webkit-scrollbar { display:none; } .qb-mini-card { flex:0 0 min(82vw,300px); min-height:164px; scroll-snap-align:start; } }
</style>

<div class="qb-page qb-privacy">
  <section class="qb-hero">
    <div class="qb-wrap qb-hero__grid">
      <div>
        <p class="qb-eyebrow"><?php esc_html_e('Privacy Policy', 'dawp'); ?></p>
        <h1 class="qb-title"><?php esc_html_e('Privacy Policy', 'dawp'); ?></h1>
        <p class="qb-updated"><?php esc_html_e('Last Updated: September 21, 2026', 'dawp'); ?></p>
        <p class="qb-copy"><?php echo esc_html(sprintf('How %s collects, uses, stores, and protects information connected to your shopping experience.', $brand_name)); ?></p>
        <div class="qb-actions">
          <a class="qb-button" href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
          <a class="qb-button qb-button--secondary" href="<?php echo esc_url(home_url('/terms-conditions/')); ?>"><?php esc_html_e('Terms & Conditions', 'dawp'); ?></a>
        </div>
      </div>
    </div>
  </section>

  <section class="qb-section qb-soft">
    <div class="qb-wrap qb-content-grid">
      <aside class="qb-sidebar">
        <div class="qb-dark-card">
          <p class="qb-eyebrow"><?php esc_html_e('Privacy Sections', 'dawp'); ?></p>
          <h2 class="qb-title" style="font-size:clamp(28px,3vw,42px);"><?php esc_html_e('Built around clarity.', 'dawp'); ?></h2>
          <p><?php esc_html_e('Review how information is collected, which services support the store, how data may be shared, SMS terms, your rights, retention, and contact details.', 'dawp'); ?></p>
          <nav class="qb-side-nav" aria-label="<?php esc_attr_e('Privacy sections', 'dawp'); ?>">
            <a href="#collect"><?php esc_html_e('How We Collect', 'dawp'); ?></a>
            <a href="#tools"><?php esc_html_e('Tools & Services', 'dawp'); ?></a>
            <a href="#use"><?php esc_html_e('How We Use It', 'dawp'); ?></a>
            <a href="#payments"><?php esc_html_e('Payments & Security', 'dawp'); ?></a>
            <a href="#cookies"><?php esc_html_e('Cookies', 'dawp'); ?></a>
            <a href="#sharing"><?php esc_html_e('Sharing', 'dawp'); ?></a>
            <a href="#messaging"><?php esc_html_e('Messaging Terms', 'dawp'); ?></a>
            <a href="#rights"><?php esc_html_e('Your Privacy Rights', 'dawp'); ?></a>
            <a href="#opt-out"><?php esc_html_e('Opt-Out Choices', 'dawp'); ?></a>
            <a href="#contact-info"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
          </nav>
        </div>
      </aside>

      <div class="qb-policy-stack">
        <section id="collect" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('How We Collect Information', 'dawp'); ?></p>
          <h2><?php esc_html_e('Information is collected in three primary ways.', 'dawp'); ?></h2>
          <p><?php esc_html_e('This includes details you provide directly, information gathered automatically while you use the Site, and information received from trusted third-party services.', 'dawp'); ?></p>
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
          <h2><?php esc_html_e('Trusted services help us operate the store efficiently.', 'dawp'); ?></h2>
          <ul>
            <li><?php esc_html_e('Website platform: WordPress and WooCommerce.', 'dawp'); ?></li>
            <li><?php esc_html_e('Analytics: Google Analytics to understand site usage and improve performance.', 'dawp'); ?></li>
            <li><?php esc_html_e('Payments: Secure payment providers such as Stripe and PayPal.', 'dawp'); ?></li>
            <li><?php esc_html_e('Email communication: Used for order updates and customer communication.', 'dawp'); ?></li>
            <li><?php esc_html_e('Customer support: Contact form, support email, and customer support systems.', 'dawp'); ?></li>
            <li><?php esc_html_e('Shipping: Carriers such as USPS, UPS, FedEx, and DHL.', 'dawp'); ?></li>
          </ul>
          <p><?php esc_html_e('These providers are given access only to the information needed to perform their services.', 'dawp'); ?></p>
        </section>

        <section id="use" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('How We Use Information', 'dawp'); ?></p>
          <h2><?php esc_html_e('We use information to operate, support, and improve the store.', 'dawp'); ?></h2>
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
          <h2><?php esc_html_e('Secure payment providers process checkout.', 'dawp'); ?></h2>
          <p><?php esc_html_e('Payments are processed by secure third-party payment providers. We do not store your full payment card details on our servers.', 'dawp'); ?></p>
          <p><?php esc_html_e('Your information is protected using industry-standard SSL encryption during checkout.', 'dawp'); ?></p>
        </section>

        <section id="cookies" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Cookies & Tracking', 'dawp'); ?></p>
          <h2><?php esc_html_e('Cookies and similar technologies support the site experience.', 'dawp'); ?></h2>
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
          <p class="qb-eyebrow"><?php echo esc_html(sprintf('%s Messaging Terms and Conditions', $brand_name)); ?></p>
          <h2><?php esc_html_e('These terms apply if you opt in to SMS messaging.', 'dawp'); ?></h2>
          <p><?php esc_html_e('Review the program details, opt-out instructions, support options, carrier limits, and message rate information before subscribing.', 'dawp'); ?></p>
          <div class="qb-policy-section">
            <h3><?php esc_html_e('Program Messages', 'dawp'); ?></h3>
            <p><?php esc_html_e('The messaging program may include general conversational messaging to answer questions and provide support to customers, promotional offers or discounts, and promotion of our products or services.', 'dawp'); ?></p>
          </div>
          <div class="qb-policy-section">
            <h3><?php esc_html_e('How to Opt Out', 'dawp'); ?></h3>
            <p><?php esc_html_e('You can cancel the SMS service at any time. Text STOP to the phone number from which you received messages. After you send STOP, we will send an SMS confirmation that you have been unsubscribed. After this, you will no longer receive SMS messages from us. If you want to join again, sign up as you did the first time and we will start sending SMS messages to you again.', 'dawp'); ?></p>
          </div>
          <div class="qb-policy-section">
            <h3><?php esc_html_e('Help and Support', 'dawp'); ?></h3>
            <p><?php printf(
                /* translators: %s: support email address. */
                esc_html__('If you are experiencing issues with the messaging program, reply with HELP for more assistance, or get help directly at %s.', 'dawp'),
                '<a href="' . esc_url($support_mailto) . '">' . esc_html($support_email) . '</a>'
            ); ?></p>
          </div>
          <div class="qb-policy-section">
            <h3><?php esc_html_e('Carrier Delivery and Rates', 'dawp'); ?></h3>
            <ul>
              <li><?php esc_html_e('Carriers are not liable for delayed or undelivered messages.', 'dawp'); ?></li>
              <li><?php esc_html_e('Message and data rates may apply for any messages sent to you from us and to us from you.', 'dawp'); ?></li>
              <li><?php esc_html_e('Message frequency will vary based on communication needs. If you have questions about your text plan or data plan, contact your wireless provider.', 'dawp'); ?></li>
            </ul>
          </div>
          <div class="qb-policy-section">
            <h3><?php esc_html_e('Privacy Questions', 'dawp'); ?></h3>
            <p><?php esc_html_e('If you have questions regarding privacy, please read the rest of this Privacy Policy.', 'dawp'); ?></p>
          </div>
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
          <p><?php esc_html_e('If your state or local privacy law provides additional rights, such as correction, portability, appeal, or limiting certain processing, you may contact us and we will review your request according to applicable law.', 'dawp'); ?></p>
          <h3><?php esc_html_e('Data Retention', 'dawp'); ?></h3>
          <p><?php esc_html_e('We retain personal information only as long as necessary to fulfill orders and provide services, provide customer support, and comply with legal and financial obligations.', 'dawp'); ?></p>
          <h3><?php esc_html_e('Children\'s Privacy', 'dawp'); ?></h3>
          <p><?php esc_html_e('Our services are not intended for individuals under 18. We do not knowingly collect personal information from minors.', 'dawp'); ?></p>
          <h3><?php esc_html_e('Changes to This Policy', 'dawp'); ?></h3>
          <p><?php esc_html_e('We may update this Privacy Policy from time to time. Any updates will be posted on this page with a revised date.', 'dawp'); ?></p>
          <div class="qb-actions">
            <a class="qb-button" href="<?php echo esc_url($support_mailto); ?>"><?php esc_html_e('Email Privacy Support', 'dawp'); ?></a>
            <a class="qb-button qb-button--secondary" href="<?php echo esc_url(home_url('/shipping-policy/')); ?>"><?php esc_html_e('Shipping Policy', 'dawp'); ?></a>
            <a class="qb-button qb-button--secondary" href="<?php echo esc_url(home_url('/return-refund-policy/')); ?>"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></a>
          </div>
        </section>

        <section id="opt-out" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Opt-Out Choices', 'dawp'); ?></p>
          <h2><?php esc_html_e('You can control marketing, cookies, and sale/share choices.', 'dawp'); ?></h2>
          <ul>
            <li><?php esc_html_e('Marketing emails: You may unsubscribe using the link in a marketing email or contact us for help.', 'dawp'); ?></li>
            <li><?php esc_html_e('SMS messages: If you opted in, you may text STOP to opt out as described in the Messaging Terms section.', 'dawp'); ?></li>
            <li><?php esc_html_e('Cookies and analytics: You may manage cookies through your browser settings. Some settings may affect site features such as cart or checkout functions.', 'dawp'); ?></li>
            <li><?php esc_html_e('Do Not Sell or Share: We do not sell personal information. If applicable law treats certain analytics or advertising cookies as a sale or sharing of personal information, you may contact us to request opt-out assistance.', 'dawp'); ?></li>
          </ul>
          <p><?php echo wp_kses_post(sprintf(__('To make a privacy or opt-out request, email us at %s and include the email address connected to your order or account so we can locate the relevant records.', 'dawp'), '<a href="' . esc_url($support_mailto) . '">' . esc_html($support_email) . '</a>')); ?></p>
        </section>

        <section id="contact-info" class="qb-policy-card">
          <p class="qb-eyebrow"><?php esc_html_e('Contact Us', 'dawp'); ?></p>
          <h2><?php echo esc_html(sprintf('Contact %s about this Privacy Policy.', $brand_name)); ?></h2>
          <p><?php esc_html_e('If you have any questions about this Privacy Policy or your personal data, please contact us:', 'dawp'); ?></p>
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
              <span><a href="<?php echo esc_url($support_mailto); ?>"><?php echo esc_html($support_email); ?></a></span>
            </div>
            <div class="qb-contact-item">
              <strong><?php esc_html_e('Customer Service Hours', 'dawp'); ?></strong>
              <span><?php esc_html_e('Monday-Friday, 9:00 AM-6:00 PM PT.', 'dawp'); ?></span>
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
