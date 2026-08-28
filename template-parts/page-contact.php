<?php
if (!defined('ABSPATH')) {
    exit;
}

$shop_url     = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
if (!$shop_url) {
    $shop_url = home_url('/shop/');
}
$track_url    = home_url('/track-order/');
$shipping_url = home_url('/shipping-policy/');
$returns_url  = home_url('/return-refund-policy/');
?>
<style>
:root{
 --ink:#151515;--muted:#707070;--line:#e7e7e4;--paper:#fff;
 --soft:#f5f5f2;--green:#405447;--max:1240px
}
*{box-sizing:border-box}
body{margin:0;background:var(--paper);color:var(--ink);font-family:Inter,Geist,Arial,sans-serif;-webkit-font-smoothing:antialiased}
img{display:block;width:100%;height:100%;object-fit:cover}
a{text-decoration:none;color:inherit}
button,input,select,textarea{font:inherit}
.container{width:min(calc(100% - 64px),var(--max));margin:auto}
.eyebrow{margin:0 0 14px;font-size:11px;line-height:1;font-weight:700;letter-spacing:.16em;text-transform:uppercase;color:var(--green)}
h1,h2,h3,p{margin-top:0}
h1{max-width:700px;margin-bottom:20px;font-size:clamp(40px,4.5vw,58px);line-height:1.04;letter-spacing:-.045em;font-weight:600}
h2{font-size:clamp(28px,3vw,38px);line-height:1.1;letter-spacing:-.035em;font-weight:600}
h3{font-size:17px;line-height:1.3;margin-bottom:8px}
p{font-size:15px;line-height:1.72;color:var(--muted)}
.button{display:inline-flex;align-items:center;justify-content:center;min-height:46px;padding:0 20px;border:0;background:var(--ink);color:#fff;font-size:12px;font-weight:700;letter-spacing:.04em;cursor:pointer}

/* HERO */
.hero{padding:76px 0 56px}
.hero-grid{display:grid;grid-template-columns:1.05fr .95fr;gap:70px;align-items:end}
.hero p{max-width:570px;font-size:16px;margin-bottom:0}
.hero-side{max-width:370px;padding-left:24px;border-left:1px solid var(--line)}
.hero-side strong{display:block;font-size:14px;margin-bottom:8px}
.hero-side p{font-size:14px}

/* IMAGE STRIP */
.visual{width:min(calc(100% - 64px),var(--max));height:330px;margin:auto;overflow:hidden;background:var(--soft)}
.visual img{object-position:center 52%}

/* MAIN */
.contact{padding:88px 0}
.contact-grid{display:grid;grid-template-columns:1.35fr .65fr;gap:90px;align-items:start}
.form-head{margin-bottom:34px}
.form-head h2{margin-bottom:10px}
.form-head p{max-width:530px;margin-bottom:0}
.row{display:grid;grid-template-columns:1fr 1fr;gap:18px}
.field{margin-bottom:20px}
label{display:block;margin-bottom:8px;font-size:12px;font-weight:700}
input,select,textarea{
 width:100%;border:1px solid var(--line);border-radius:0;background:#fff;color:var(--ink);outline:none;
 padding:0 14px;transition:border-color .2s
}
input,select{height:48px}
textarea{min-height:145px;padding-top:14px;resize:vertical}
input:focus,select:focus,textarea:focus{border-color:#999}
.form-note{margin:12px 0 0;font-size:12px}
.form-alert{margin:0 0 22px;padding:14px 16px;border-left:3px solid var(--green);background:var(--soft);font-size:14px;line-height:1.55}
.form-alert--error{border-left-color:#b42318;background:#fff4f2;color:#7a271a}
.field--hidden{position:absolute;left:-9999px;width:1px;height:1px;overflow:hidden}

/* INFO */
.info{padding:34px;background:var(--soft);border-top:3px solid var(--green)}
.info-item{padding:0 0 25px;margin:0 0 25px;border-bottom:1px solid #deded9}
.info-item:last-child{padding:0;margin:0;border:0}
.info-item p{margin-bottom:4px;font-size:14px}
.info-item a{display:inline-block;margin-top:4px;font-size:13px;font-weight:700;border-bottom:1px solid #aaa}

/* QUICK HELP */
.quick{padding:0 0 88px}
.quick-head{display:grid;grid-template-columns:380px 1fr;gap:100px;margin-bottom:38px}
.quick-head p{max-width:530px;margin:0}
.quick-grid{display:grid;grid-template-columns:repeat(3,1fr);border-top:1px solid var(--line);border-bottom:1px solid var(--line)}
.quick-item{padding:30px;border-right:1px solid var(--line)}
.quick-item:last-child{border:0}
.num{display:block;margin-bottom:36px;font-size:11px;color:#999}
.quick-item p{font-size:14px;margin-bottom:14px}
.quick-item a{font-size:12px;font-weight:700}

/* CTA */
.end{padding:0 0 84px}
.cta{display:grid;grid-template-columns:1fr auto;gap:40px;align-items:end;padding:44px 50px;background:var(--green);color:#fff}
.cta .eyebrow{color:#cbd4cd}
.cta h2{max-width:570px;margin-bottom:9px}
.cta p{max-width:540px;margin-bottom:0;color:#d6ddd8}
.cta .button{background:#fff;color:var(--ink)}

@media(max-width:900px){
 .hero-grid,.contact-grid,.quick-head,.cta{grid-template-columns:1fr;gap:30px}
 .hero-side{padding-left:0;border:0}
 .contact-grid{gap:55px}
 .quick-head{gap:20px}
 .quick-grid{grid-template-columns:1fr}
 .quick-item{border-right:0;border-bottom:1px solid var(--line)}
 .quick-item:last-child{border-bottom:0}
}
@media(max-width:640px){
 .container,.visual{width:calc(100% - 36px)}
 .hero{padding:54px 0 40px}
 .visual{height:250px}
 .contact{padding:62px 0}
 .row{grid-template-columns:1fr;gap:0}
 .info{padding:28px 22px}
 .quick{padding-bottom:62px}
 .num{margin-bottom:24px}
 .end{padding-bottom:60px}
 .cta{padding:34px 24px}
}
</style>

<section class="hero">
 <div class="container hero-grid">
  <div>
   <div class="eyebrow">Contact Reluxwatches</div>
   <h1>WE’RE HERE TO HELP.</h1>
   <p>Questions about a watch, your order or delivery? Send us a message and our team will help you with what you need.</p>
  </div>
  <div class="hero-side">
   <strong>Simple, personal support.</strong>
   <p>For order enquiries, include your order number so we can assist you faster.</p>
  </div>
 </div>
</section>

<section class="visual">
 <img src="<?php echo esc_url(dawp_imagewatch_url('9.png')); ?>" alt="Reluxwatches watch detail">
</section>

<section class="contact">
 <div class="container contact-grid">
  <div>
   <div class="form-head">
    <div class="eyebrow">Send a Message</div>
    <h2>GET IN TOUCH.</h2>
    <p>Tell us how we can help. We aim to reply within 1–2 business days.</p>
   </div>
   <?php $contact_status = isset($_GET['contact_status']) ? sanitize_key(wp_unslash($_GET['contact_status'])) : ''; ?>
   <?php if ('success' === $contact_status) : ?>
    <p class="form-alert form-alert--success" role="status">Thank you. Your message has been sent and our team will reply as soon as possible.</p>
   <?php elseif ('error' === $contact_status) : ?>
    <p class="form-alert form-alert--error" role="alert">Please check your details and try sending the message again.</p>
   <?php endif; ?>
   <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
    <input type="hidden" name="action" value="lbq_contact_form">
    <input type="hidden" name="contact_source" value="contact-us">
    <?php wp_nonce_field('lbq_contact_form', 'lbq_contact_nonce'); ?>
    <div class="field field--hidden" aria-hidden="true"><label for="company_website">Company website</label><input id="company_website" name="company_website" type="text" tabindex="-1" autocomplete="off"></div>
    <div class="row">
     <div class="field"><label for="contact_name">Name</label><input id="contact_name" name="contact_name" type="text" autocomplete="name" required></div>
     <div class="field"><label for="contact_email">Email</label><input id="contact_email" name="contact_email" type="email" autocomplete="email" required></div>
    </div>
    <div class="row">
     <div class="field">
      <label for="contact_topic">Subject</label>
      <select id="contact_topic" name="contact_topic">
       <option value="order">Order Support</option><option value="product">Product Question</option><option value="shipping">Shipping</option><option value="return">Returns</option><option value="other">General Enquiry</option>
      </select>
     </div>
     <div class="field"><label for="order_number">Order Number (optional)</label><input id="order_number" name="order_number" type="text" autocomplete="off"></div>
    </div>
    <div class="field"><label for="contact_message">Message</label><textarea id="contact_message" name="contact_message" required></textarea></div>
    <button class="button" type="submit">SEND MESSAGE →</button>
    <p class="form-note">Please do not include payment or other sensitive information.</p>
   </form>
  </div>

  <aside class="info">
   <div class="info-item">
    <div class="eyebrow">Customer Care</div>
    <h3>Email Support</h3>
    <p>For orders, products and general questions.</p>
    <a href="mailto:support@reluxwatches.com">support@reluxwatches.com</a>
   </div>
   <div class="info-item">
    <h3>Response Time</h3>
    <p>We aim to respond within 1–2 business days.</p>
   </div>
   <div class="info-item">
    <h3>Need a quick answer?</h3>
    <p>Shipping and return information may already answer your question.</p>
   </div>
  </aside>
 </div>
</section>

<section class="quick">
 <div class="container">
  <div class="quick-head">
   <div><div class="eyebrow">Quick Help</div><h2>START HERE.</h2></div>
   <p>Find the information you need before sending a message.</p>
  </div>
  <div class="quick-grid">
   <article class="quick-item"><span class="num">01</span><h3>Order Status</h3><p>Check the latest information about your order.</p><a href="<?php echo esc_url($track_url); ?>">TRACK ORDER →</a></article>
   <article class="quick-item"><span class="num">02</span><h3>Shipping</h3><p>Learn about delivery options and estimated times.</p><a href="<?php echo esc_url($shipping_url); ?>">SHIPPING INFO →</a></article>
   <article class="quick-item"><span class="num">03</span><h3>Returns</h3><p>Find return instructions and eligibility details.</p><a href="<?php echo esc_url($returns_url); ?>">RETURN POLICY →</a></article>
  </div>
 </div>
</section>

<section class="end">
 <div class="container">
  <div class="cta">
   <div>
    <div class="eyebrow">Explore Reluxwatches</div>
    <h2>STILL BROWSING?</h2>
    <p>Discover our latest watches and find a style made for your everyday.</p>
   </div>
   <a class="button" href="<?php echo esc_url($shop_url); ?>">SHOP WATCHES →</a>
  </div>
 </div>
</section>
