<?php
$contact_status = isset($_GET['contact_status']) ? sanitize_key(wp_unslash($_GET['contact_status'])) : '';

$status_messages = [
    'sent'    => ['type' => 'success', 'text' => __('Thank you. Your message has been sent and our support team will reply as soon as possible.', 'dawp')],
    'invalid' => ['type' => 'error', 'text' => __('Please check your information and try again. Name, valid email, and message are required.', 'dawp')],
    'failed'  => ['type' => 'error', 'text' => __('Sorry, we could not send your message right now. Please email support@rubyinstar.com directly.', 'dawp')],
];

$contact_items = [
    [
        'label' => __('Email Support', 'dawp'),
        'value' => 'support@rubyinstar.com',
        'href'  => 'mailto:support@rubyinstar.com',
        'note'  => __('For order questions, tire fitment help, returns, and general support.', 'dawp'),
        'icon'  => 'mail',
    ],
    [
        'label' => __('Business Location', 'dawp'),
        'value' => __('United States', 'dawp'),
        'href'  => '',
        'note'  => __('Online tire store serving customers across all 50 states.', 'dawp'),
        'icon'  => 'pin',
    ],
    [
        'label' => __('Support Hours', 'dawp'),
        'value' => __('Monday - Friday, 9:00 AM - 5:00 PM PST', 'dawp'),
        'href'  => '',
        'note'  => __('Messages received outside business hours are reviewed the next business day.', 'dawp'),
        'icon'  => 'clock',
    ],
];
?>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&family=Inter:wght@400;500;600;700&display=swap');

  :root{
    --navy:#0B1F3A;
    --navy-light:#12294f;
    --orange:#F97316;
    --orange-dark:#DB5F0B;
    --white:#FFFFFF;
    --gray-bg:#F5F6F8;
    --text:#111827;
    --text-soft:#6B7280;
    --border:#E5E7EB;
    --success:#166534;
    --success-bg:#DCFCE7;
    --error:#991B1B;
    --error-bg:#FEE2E2;
  }
  *{box-sizing:border-box; margin:0; padding:0;}
  html{scroll-behavior:smooth;}
  body{
    font-family:'Inter', sans-serif;
    color:var(--text);
    background:var(--white);
    -webkit-font-smoothing:antialiased;
    text-rendering:optimizeLegibility;
  }
  h1,h2,h3,h4{
    font-family:'Plus Jakarta Sans', sans-serif;
    color:var(--navy);
    line-height:1.15;
    overflow-wrap:break-word;
  }
  p,span,a,strong,button,label,input,select,textarea{ overflow-wrap:break-word; }
  a{text-decoration:none; color:inherit;}
  button,input,select,textarea{font-family:inherit;}
  button{cursor:pointer;}
  .contact-container{max-width:1280px; margin:0 auto; padding:0 20px;}
  @media(min-width:768px){ .contact-container{padding:0 32px;} }

  .contact-eyebrow{
    display:inline-flex; align-items:center; gap:8px;
    font-size:13px; font-weight:700; letter-spacing:0.08em; text-transform:uppercase;
    color:var(--orange);
  }
  .contact-eyebrow::before{
    content:""; width:18px; height:2px; background:var(--orange); display:inline-block; border-radius:2px;
  }
  .contact-btn{
    display:inline-flex; align-items:center; justify-content:center; gap:8px;
    min-height:48px; padding:0 24px; border-radius:8px; font-weight:800; font-size:15px;
    border:0; transition:transform .15s ease, background .15s ease, border-color .15s ease, box-shadow .15s ease;
    white-space:nowrap;
  }
  .contact-btn:active{ transform:translateY(1px); }
  .contact-btn-primary{ background:var(--orange); color:#fff; box-shadow:0 8px 20px -8px rgba(249,115,22,.55); }
  .contact-btn-primary:hover{ background:var(--orange-dark); }
  .contact-btn-outline{ background:#fff; color:var(--navy); border:1.5px solid var(--border); }
  .contact-btn-outline:hover{ border-color:var(--navy); }

  .contact-section{ padding:64px 0; }
  .contact-bg{ background:var(--gray-bg); }
  .contact-hero{
    position:relative;
    background:
      radial-gradient(900px 420px at 82% -8%, rgba(249,115,22,.18), transparent 62%),
      linear-gradient(180deg, var(--navy) 0%, #0d2547 62%, #0f2a52 100%);
    color:#fff;
    overflow:hidden;
  }
  .contact-hero-inner{
    display:grid; grid-template-columns:1fr; gap:34px;
    padding:58px 0 54px;
  }
  @media(min-width:980px){
    .contact-hero-inner{ grid-template-columns:minmax(0,1.05fr) minmax(320px,.95fr); align-items:center; padding:78px 0 66px; }
  }
  .contact-hero h1{
    color:#fff; font-size:clamp(32px, 5vw, 52px); font-weight:800;
    margin:16px 0 16px; text-wrap:balance;
  }
  .contact-hero p{ color:rgba(255,255,255,.84); font-size:17px; line-height:1.65; max-width:610px; }
  .contact-hero-actions{ display:flex; flex-wrap:wrap; gap:14px; margin-top:28px; }
  .contact-hero-actions .contact-btn-outline{ background:transparent; color:#fff; border-color:rgba(255,255,255,.3); }
  .contact-tread-line{
    position:absolute; inset:auto 0 0 0; height:10px;
    background-image:repeating-linear-gradient(100deg, rgba(255,255,255,.12) 0 10px, transparent 10px 22px);
    opacity:.5;
  }
  .contact-hero-card{
    border:1px solid rgba(255,255,255,.12);
    border-radius:8px;
    background:rgba(255,255,255,.08);
    padding:24px;
    box-shadow:0 30px 60px -28px rgba(0,0,0,.55);
  }
  .contact-hero-card h2{ color:#fff; font-size:22px; }
  .contact-hero-card p{ margin-top:10px; font-size:14.5px; color:rgba(255,255,255,.74); }
  .contact-quick-list{ display:grid; gap:12px; margin-top:22px; }
  .contact-quick-item{
    display:flex; gap:12px; align-items:flex-start;
    border-top:1px solid rgba(255,255,255,.1);
    padding-top:14px;
  }
  .contact-quick-icon{
    position:relative;
    width:38px; height:38px; flex:0 0 auto; border-radius:8px;
    display:flex; align-items:center; justify-content:center;
    background:rgba(249,115,22,.16); color:#FDBA74;
  }
  .contact-quick-icon svg,
  .contact-info-icon svg{
    position:absolute;
    top:50%;
    left:50%;
    width:20px;
    height:20px;
    transform:translate(-50%, -50%);
  }
  .contact-quick-item strong{ display:block; color:#fff; font-family:'Plus Jakarta Sans', sans-serif; font-size:14px; }
  .contact-quick-item span{ display:block; color:rgba(255,255,255,.7); font-size:13px; line-height:1.5; margin-top:4px; }

  .contact-main-grid{ display:grid; grid-template-columns:1fr; gap:24px; align-items:start; }
  @media(min-width:980px){ .contact-main-grid{ grid-template-columns:minmax(0,.86fr) minmax(0,1.14fr); } }
  .contact-info-grid{ display:grid; gap:16px; }
  .contact-info-card,
  .contact-form-card,
  .contact-help-card{
    background:#fff; border:1px solid var(--border); border-radius:8px;
    box-shadow:0 18px 34px -26px rgba(11,31,58,.28);
  }
  .contact-info-card{ padding:22px; display:flex; gap:14px; align-items:flex-start; }
  .contact-info-icon{
    position:relative;
    width:44px; height:44px; flex:0 0 auto; border-radius:8px;
    display:flex; align-items:center; justify-content:center;
    background:var(--gray-bg); color:var(--navy);
  }
  .contact-info-card:hover .contact-info-icon{ background:var(--orange); color:#fff; }
  .contact-info-card h3{ font-size:16px; }
  .contact-info-value{ display:block; color:var(--navy); font-weight:800; margin-top:6px; line-height:1.45; }
  .contact-info-note{ color:var(--text-soft); font-size:13.5px; line-height:1.55; margin-top:7px; }

  .contact-form-card{ padding:26px; }
  @media(min-width:720px){ .contact-form-card{ padding:32px; } }
  .contact-form-head{ margin-bottom:22px; }
  .contact-form-head h2{ font-size:clamp(24px,3vw,32px); margin-top:10px; }
  .contact-form-head p{ color:var(--text-soft); font-size:15px; line-height:1.65; margin-top:10px; max-width:660px; }
  .contact-alert{
    border-radius:8px; padding:14px 16px; margin-bottom:18px;
    font-size:14px; line-height:1.5; font-weight:700;
  }
  .contact-alert-success{ background:var(--success-bg); color:var(--success); }
  .contact-alert-error{ background:var(--error-bg); color:var(--error); }
  .contact-form{ display:grid; gap:16px; }
  .contact-form-grid{ display:grid; grid-template-columns:1fr; gap:16px; }
  @media(min-width:680px){ .contact-form-grid{ grid-template-columns:1fr 1fr; } }
  .contact-field label{
    display:block; color:var(--navy); font-size:13px; font-weight:800;
    text-transform:uppercase; letter-spacing:.04em; margin-bottom:7px;
  }
  .contact-field input,
  .contact-field select,
  .contact-field textarea{
    width:100%; border:1.5px solid var(--border); border-radius:8px; background:#fff;
    color:var(--text); font-size:15px; outline:none; transition:border-color .15s ease, box-shadow .15s ease;
  }
  .contact-field input,
  .contact-field select{ height:48px; padding:0 14px; }
  .contact-field textarea{ min-height:150px; padding:13px 14px; resize:vertical; }
  .contact-field input:focus,
  .contact-field select:focus,
  .contact-field textarea:focus{
    border-color:var(--orange); box-shadow:0 0 0 3px rgba(249,115,22,.14);
  }
  .contact-field select{
    appearance:none;
    background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%236B7280' stroke-width='1.6' fill='none' fill-rule='evenodd'/%3E%3C/svg%3E");
    background-repeat:no-repeat; background-position:right 14px center; padding-right:38px;
  }
  .contact-honeypot{ position:absolute; left:-9999px; top:auto; width:1px; height:1px; overflow:hidden; }
  .contact-form-foot{
    display:flex; flex-direction:column; gap:12px; align-items:flex-start;
  }
  @media(min-width:620px){ .contact-form-foot{ flex-direction:row; align-items:center; justify-content:space-between; } }
  .contact-form-foot p{ color:var(--text-soft); font-size:13px; line-height:1.5; max-width:420px; }

  .contact-help-card{ padding:26px; margin-top:18px; }
  .contact-help-card h2{ font-size:22px; }
  .contact-help-list{ display:grid; gap:12px; margin-top:18px; }
  .contact-help-list a{
    display:flex; align-items:center; justify-content:space-between; gap:16px;
    border:1px solid var(--border); border-radius:8px; padding:14px 16px;
    color:var(--navy); font-weight:800; font-size:14px;
  }
  .contact-help-list a:hover{ border-color:var(--orange); color:var(--orange); background:#FFF7ED; }

  .contact-faq-head{ text-align:center; max-width:680px; margin:0 auto 34px; }
  .contact-faq-head h2{ font-size:clamp(26px,3.4vw,36px); margin-top:12px; }
  .contact-faq-head p{ color:var(--text-soft); margin-top:12px; font-size:15.5px; line-height:1.6; }
  .contact-faq-grid{ display:grid; grid-template-columns:1fr; gap:16px; }
  @media(min-width:900px){ .contact-faq-grid{ grid-template-columns:repeat(3,1fr); } }
  .contact-faq-card{ background:#fff; border:1px solid var(--border); border-radius:8px; padding:22px; }
  .contact-faq-card h3{ font-size:16px; }
  .contact-faq-card p{ color:var(--text-soft); font-size:14px; line-height:1.6; margin-top:9px; }

  .contact-cta{
    background:var(--orange); border-radius:8px; color:#fff; text-align:center; padding:42px 28px;
  }
  .contact-cta h2{ color:#fff; font-size:clamp(24px,3vw,30px); }
  .contact-cta p{ color:rgba(255,255,255,.9); margin:10px auto 0; max-width:570px; line-height:1.6; }
  .contact-cta-actions{ display:flex; justify-content:center; flex-wrap:wrap; gap:12px; margin-top:24px; }
  .contact-cta .contact-btn-outline{ border-color:rgba(255,255,255,.45); color:#fff; background:transparent; }
  .contact-cta .contact-btn-outline:hover{ background:#fff; color:var(--navy); border-color:#fff; }

  .contact-reveal{ opacity:0; transform:translateY(16px); transition:opacity .6s ease, transform .6s ease; }
  .contact-reveal.in{ opacity:1; transform:none; }
  @media (prefers-reduced-motion: reduce){
    .contact-reveal{ opacity:1; transform:none; transition:none; }
    html{ scroll-behavior:auto; }
  }
</style>

<section class="contact-hero">
  <div class="contact-container contact-hero-inner">
    <div>
      <span class="contact-eyebrow"><?php esc_html_e('Contact Rubyinstar', 'dawp'); ?></span>
      <h1><?php esc_html_e('Need Help With Tires Or An Order?', 'dawp'); ?></h1>
      <p><?php esc_html_e('Send Rubyinstar a message for order support, tire fitment questions, shipping details, return help, or general store inquiries.', 'dawp'); ?></p>
      <div class="contact-hero-actions">
        <a href="#contact-form" class="contact-btn contact-btn-primary"><?php esc_html_e('Send A Message', 'dawp'); ?></a>
        <a href="mailto:support@rubyinstar.com" class="contact-btn contact-btn-outline"><?php esc_html_e('Email Support', 'dawp'); ?></a>
      </div>
    </div>

    <aside class="contact-hero-card" aria-label="<?php esc_attr_e('Support overview', 'dawp'); ?>">
      <h2><?php esc_html_e('Support That Keeps Things Clear', 'dawp'); ?></h2>
      <p><?php esc_html_e('Include your order number when available so our team can find the right details faster.', 'dawp'); ?></p>
      <div class="contact-quick-list">
        <div class="contact-quick-item">
          <span class="contact-quick-icon" aria-hidden="true">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></svg>
          </span>
          <span><strong>support@rubyinstar.com</strong><span><?php esc_html_e('Primary support inbox for all customer questions.', 'dawp'); ?></span></span>
        </div>
        <div class="contact-quick-item">
          <span class="contact-quick-icon" aria-hidden="true">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
          </span>
          <span><strong><?php esc_html_e('Monday - Friday', 'dawp'); ?></strong><span><?php esc_html_e('9:00 AM - 5:00 PM Pacific Standard Time.', 'dawp'); ?></span></span>
        </div>
        <div class="contact-quick-item">
          <span class="contact-quick-icon" aria-hidden="true">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 7h11v9H3z"/><path d="M14 10h4l3 3v3h-7z"/><circle cx="7" cy="18" r="2"/><circle cx="18" cy="18" r="2"/></svg>
          </span>
          <span><strong><?php esc_html_e('Order Tracking', 'dawp'); ?></strong><span><?php esc_html_e('For shipment updates, use the tracking page or message us.', 'dawp'); ?></span></span>
        </div>
      </div>
    </aside>
  </div>
  <div class="contact-tread-line"></div>
</section>

<section class="contact-section contact-bg">
  <div class="contact-container">
    <div class="contact-main-grid">
      <div>
        <div class="contact-info-grid contact-reveal">
          <?php foreach ($contact_items as $item) : ?>
            <div class="contact-info-card">
              <span class="contact-info-icon" aria-hidden="true">
                <?php if ('pin' === $item['icon']) : ?>
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 21s7-5.2 7-12A7 7 0 0 0 5 9c0 6.8 7 12 7 12z"/><circle cx="12" cy="9" r="2.5"/></svg>
                <?php elseif ('clock' === $item['icon']) : ?>
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
                <?php else : ?>
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></svg>
                <?php endif; ?>
              </span>
              <div>
                <h3><?php echo esc_html($item['label']); ?></h3>
                <?php if ($item['href']) : ?>
                  <a class="contact-info-value" href="<?php echo esc_url($item['href']); ?>"><?php echo esc_html($item['value']); ?></a>
                <?php else : ?>
                  <span class="contact-info-value"><?php echo esc_html($item['value']); ?></span>
                <?php endif; ?>
                <p class="contact-info-note"><?php echo esc_html($item['note']); ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

        <div class="contact-help-card contact-reveal">
          <h2><?php esc_html_e('Helpful Links', 'dawp'); ?></h2>
          <div class="contact-help-list">
            <a href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track Your Order', 'dawp'); ?><span aria-hidden="true">&rarr;</span></a>
            <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>"><?php esc_html_e('Shipping Policy', 'dawp'); ?><span aria-hidden="true">&rarr;</span></a>
            <a href="<?php echo esc_url(home_url('/returns-policy/')); ?>"><?php esc_html_e('Returns & Refunds', 'dawp'); ?><span aria-hidden="true">&rarr;</span></a>
            <a href="<?php echo esc_url(home_url('/faq/')); ?>"><?php esc_html_e('Frequently Asked Questions', 'dawp'); ?><span aria-hidden="true">&rarr;</span></a>
          </div>
        </div>
      </div>

      <div class="contact-form-card contact-reveal" id="contact-form">
        <div class="contact-form-head">
          <span class="contact-eyebrow"><?php esc_html_e('Send A Message', 'dawp'); ?></span>
          <h2><?php esc_html_e('Tell Us How We Can Help', 'dawp'); ?></h2>
          <p><?php esc_html_e('Use the form below and include your order number, tire size, or vehicle details if they are relevant to your question.', 'dawp'); ?></p>
        </div>

        <?php if ($contact_status && isset($status_messages[$contact_status])) : ?>
          <div class="contact-alert contact-alert-<?php echo esc_attr($status_messages[$contact_status]['type']); ?>" role="status">
            <?php echo esc_html($status_messages[$contact_status]['text']); ?>
          </div>
        <?php endif; ?>

        <form class="contact-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
          <input type="hidden" name="action" value="dawp_contact_submit">
          <?php wp_nonce_field('dawp_contact_submit', 'dawp_contact_nonce'); ?>

          <div class="contact-honeypot" aria-hidden="true">
            <label for="contact-website"><?php esc_html_e('Website', 'dawp'); ?></label>
            <input id="contact-website" type="text" name="website" tabindex="-1" autocomplete="off">
          </div>

          <div class="contact-form-grid">
            <div class="contact-field">
              <label for="contact-name"><?php esc_html_e('Name', 'dawp'); ?></label>
              <input id="contact-name" type="text" name="name" autocomplete="name" required>
            </div>
            <div class="contact-field">
              <label for="contact-email"><?php esc_html_e('Email', 'dawp'); ?></label>
              <input id="contact-email" type="email" name="email" autocomplete="email" required>
            </div>
          </div>

          <div class="contact-form-grid">
            <div class="contact-field">
              <label for="contact-topic"><?php esc_html_e('Topic', 'dawp'); ?></label>
              <select id="contact-topic" name="subject">
                <option value="Order Support"><?php esc_html_e('Order Support', 'dawp'); ?></option>
                <option value="Tire Fitment Question"><?php esc_html_e('Tire Fitment Question', 'dawp'); ?></option>
                <option value="Shipping Question"><?php esc_html_e('Shipping Question', 'dawp'); ?></option>
                <option value="Return or Refund"><?php esc_html_e('Return or Refund', 'dawp'); ?></option>
                <option value="General Question"><?php esc_html_e('General Question', 'dawp'); ?></option>
              </select>
            </div>
            <div class="contact-field">
              <label for="contact-order"><?php esc_html_e('Order Number Optional', 'dawp'); ?></label>
              <input id="contact-order" type="text" name="order_number" autocomplete="off" placeholder="<?php esc_attr_e('Example: RBY-1001', 'dawp'); ?>">
            </div>
          </div>

          <div class="contact-field">
            <label for="contact-message"><?php esc_html_e('Message', 'dawp'); ?></label>
            <textarea id="contact-message" name="message" required></textarea>
          </div>

          <div class="contact-form-foot">
            <p><?php esc_html_e('We use your message only to respond to your request. Please do not include payment card details.', 'dawp'); ?></p>
            <button class="contact-btn contact-btn-primary" type="submit"><?php esc_html_e('Submit Message', 'dawp'); ?></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<section class="contact-section">
  <div class="contact-container">
    <div class="contact-faq-head contact-reveal">
      <span class="contact-eyebrow"><?php esc_html_e('Before You Message', 'dawp'); ?></span>
      <h2><?php esc_html_e('Quick Answers For Common Questions', 'dawp'); ?></h2>
      <p><?php esc_html_e('These details help many customers get the right next step faster.', 'dawp'); ?></p>
    </div>

    <div class="contact-faq-grid contact-reveal">
      <div class="contact-faq-card">
        <h3><?php esc_html_e('What should I include for tire fitment help?', 'dawp'); ?></h3>
        <p><?php esc_html_e('Send your vehicle year, make, model, trim, current tire size, and the type of driving you do most often.', 'dawp'); ?></p>
      </div>
      <div class="contact-faq-card">
        <h3><?php esc_html_e('Where can I check my order?', 'dawp'); ?></h3>
        <p><?php esc_html_e('Use the Track Order page with your order details, or contact us with your order number for support.', 'dawp'); ?></p>
      </div>
      <div class="contact-faq-card">
        <h3><?php esc_html_e('How quickly will support respond?', 'dawp'); ?></h3>
        <p><?php esc_html_e('Most support requests are reviewed during business hours, Monday through Friday, 9:00 AM to 5:00 PM PST.', 'dawp'); ?></p>
      </div>
    </div>
  </div>
</section>

<section class="contact-section">
  <div class="contact-container">
    <div class="contact-cta contact-reveal">
      <h2><?php esc_html_e('Looking For Tires Right Now?', 'dawp'); ?></h2>
      <p><?php esc_html_e('Browse tire categories first, then contact support if you need help comparing sizes, vehicle types, or order options.', 'dawp'); ?></p>
      <div class="contact-cta-actions">
        <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="contact-btn contact-btn-outline"><?php esc_html_e('Shop Tires', 'dawp'); ?></a>
        <a href="<?php echo esc_url(home_url('/shop-by-rim-size/')); ?>" class="contact-btn contact-btn-outline"><?php esc_html_e('Shop By Rim Size', 'dawp'); ?></a>
      </div>
    </div>
  </div>
</section>

<script>
  const contactRevealObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('in');
        contactRevealObserver.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12 });

  document.querySelectorAll('.contact-reveal').forEach((element) => contactRevealObserver.observe(element));
</script>
