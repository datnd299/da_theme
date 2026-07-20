<?php
/**
 * Contact Us — Veterangift
 */
$sgs_contact_hero_bg = sprintf(
  "--sgs-contact-hero-bg:url('%s');--sgs-contact-hero-bg-mobile:url('%s')",
  esc_url(dawp_theme_cdn_image_url('assets/img/hero/support-hero-background.png', 1600, 760)),
  esc_url(dawp_theme_cdn_image_url('assets/img/hero/support-hero-background.png', 720, 600))
);
get_header(); ?>
<section class="sgs-home sgs-page">

<style>
.sgs-contact-hero{background:linear-gradient(90deg,rgba(11,31,58,.96) 0%,rgba(11,31,58,.86) 46%,rgba(11,31,58,.62) 100%),var(--sgs-contact-hero-bg) center right/cover no-repeat,var(--navy);color:var(--white);padding:clamp(72px,9vw,120px) clamp(24px,4vw,64px);text-align:center}
.sgs-contact-hero__inner{max-width:680px;margin:0 auto}
.sgs-contact-hero h1{margin:0;font-family:var(--font-heading);font-size:clamp(2rem,4.5vw,3.5rem);font-weight:800;letter-spacing:-.02em;line-height:1.05;color:var(--white)}
.sgs-contact-hero p{max-width:580px;margin:18px auto 0;color:rgba(255,255,255,.82);font-size:clamp(.95rem,1.3vw,1.1rem);line-height:1.7}
.sgs-contact-grid{display:grid;grid-template-columns:1.2fr .8fr;gap:40px;align-items:start;width:min(100% - 48px,1200px);margin:0 auto;padding:var(--section-gap,72px) 0}
.sgs-contact-form h2{margin:0 0 24px;font-family:var(--font-heading);font-size:clamp(1.3rem,2.5vw,1.8rem);font-weight:700;color:var(--ink)}
.sgs-cf{display:grid;gap:16px}
.sgs-cf__row{display:grid;grid-template-columns:1fr 1fr;gap:16px}
.sgs-cf label span{display:block;margin-bottom:6px;color:var(--muted);font-size:.7rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase}
.sgs-cf input,.sgs-cf select,.sgs-cf textarea{width:100%;min-height:46px;padding:0 14px;border:1.5px solid var(--line);border-radius:var(--radius);background:#fafafa;color:var(--ink);outline:none;font-size:.88rem;font-weight:500;font-family:var(--font-body);box-sizing:border-box}
.sgs-cf textarea{padding:12px 14px;min-height:130px;resize:vertical;line-height:1.6}
.sgs-cf input:focus,.sgs-cf select:focus,.sgs-cf textarea:focus{border-color:var(--red);box-shadow:0 0 0 3px rgba(179,25,66,.12)}
.sgs-cf__actions{display:flex;flex-direction:column;align-items:flex-start;gap:12px;margin-top:4px}
.sgs-cf__submit{display:inline-flex;align-items:center;justify-content:center;gap:10px;width:auto;min-width:190px;min-height:50px;padding:0 26px;border:0;border-radius:8px;background:var(--red);color:var(--white);box-shadow:0 10px 24px rgba(179,25,66,.18);font-family:var(--font-heading);font-size:.92rem;font-weight:800;line-height:1;text-transform:uppercase;letter-spacing:.02em;cursor:pointer;transition:background 180ms,box-shadow 180ms,transform 180ms}
.sgs-cf__submit:hover{background:var(--red-dark);box-shadow:0 14px 30px rgba(179,25,66,.24);transform:translateY(-1px)}
.sgs-cf__submit:focus-visible{outline:3px solid rgba(179,25,66,.25);outline-offset:3px}
.sgs-cf__submit:disabled{cursor:not-allowed;opacity:.72;transform:none;box-shadow:none}
.sgs-cf__submit-icon{font-size:1rem;line-height:1}
.sgs-cf__msg{display:none;margin:0;font-size:.9rem;font-weight:700;line-height:1.5}
.sgs-contact-info h2{margin:0 0 24px;font-family:var(--font-heading);font-size:clamp(1.3rem,2.5vw,1.8rem);font-weight:700;color:var(--ink)}
.sgs-ci-card{display:flex;align-items:flex-start;gap:14px;padding:18px;border:1px solid var(--line);border-radius:var(--radius);background:var(--white);margin-bottom:12px;transition:box-shadow 180ms,transform 180ms}
.sgs-ci-card:hover{box-shadow:var(--shadow-sm);transform:translateY(-2px)}
.sgs-ci-icon{display:grid;place-items:center;width:42px;height:42px;flex:0 0 auto;border-radius:var(--radius);background:var(--navy);color:var(--white);font-size:19px}
.sgs-ci-card strong{display:block;color:var(--ink);font-family:var(--font-heading);font-size:.92rem;font-weight:700;line-height:1.25}
.sgs-ci-card span,.sgs-ci-card a{display:block;margin-top:3px;color:var(--muted);font-size:.85rem;line-height:1.5}
.sgs-ci-card a{color:var(--red);text-decoration:underline;text-underline-offset:2px}
.sgs-ci-card a:hover{color:var(--red-dark)}
@media(max-width:900px){.sgs-contact-hero{background-image:linear-gradient(180deg,rgba(11,31,58,.76) 0%,rgba(11,31,58,.96) 100%),var(--sgs-contact-hero-bg-mobile,var(--sgs-contact-hero-bg))}.sgs-contact-grid{grid-template-columns:1fr}.sgs-cf__row{grid-template-columns:1fr}.sgs-cf__submit{width:100%}}
</style>

<div class="sgs-contact-hero" style="<?php echo esc_attr($sgs_contact_hero_bg); ?>">
  <div class="sgs-contact-hero__inner">
    <p class="sgs-eyebrow sgs-eyebrow--light">Get In Touch</p>
    <h1>We're Here To Help</h1>
    <p>Have a question about your order, need help finding the right product, or just want to say hello? Our team is ready to assist you.</p>
  </div>
</div>

<div class="sgs-contact-grid">
  <div class="sgs-contact-form">
    <h2>Send Us A Message</h2>
    <form id="contact-form" class="sgs-cf" method="post" novalidate>
      <div class="sgs-cf__row">
        <label><span>Your Name</span><input type="text" name="name" placeholder="John Doe" autocomplete="name" required></label>
        <label><span>Email Address</span><input type="email" name="email" placeholder="john@example.com" autocomplete="email" required></label>
      </div>
      <label><span>Subject</span>
        <select name="subject">
          <option value="general">General Inquiry</option>
          <option value="order">Order Support</option>
          <option value="product">Product Question</option>
          <option value="shipping">Shipping Question</option>
          <option value="return">Returns &amp; Refunds</option>
          <option value="other">Other</option>
        </select>
      </label>
      <label><span>Message</span><textarea name="message" rows="6" placeholder="How can we help you?" required></textarea></label>
      <div class="sgs-cf__actions">
        <button class="sgs-cf__submit" type="submit"><span>Send Message</span><span class="sgs-cf__submit-icon" aria-hidden="true">→</span></button>
        <p id="contact-msg" class="sgs-cf__msg" role="status" aria-live="polite"></p>
      </div>
    </form>
  </div>

  <div class="sgs-contact-info">
    <h2>Contact Information</h2>
    <div class="sgs-ci-card"><div class="sgs-ci-icon">📧</div><div><strong>Email</strong><a href="mailto:support@veterangift.com">support@veterangift.com</a></div></div>
    <div class="sgs-ci-card"><div class="sgs-ci-icon">🕐</div><div><strong>Business Hours</strong><span>Monday – Friday, 10:00 AM – 6:00 PM PST</span></div></div>
    <div class="sgs-ci-card"><div class="sgs-ci-icon">📦</div><div><strong>Order Support</strong><a href="/track-order/">Track Your Order</a></div></div>
    <div class="sgs-ci-card"><div class="sgs-ci-icon">📋</div><div><strong>Returns</strong><a href="/refund-return-policy/">Return &amp; Refund Policy</a></div></div>
  </div>
</div>

</section>
<?php get_footer(); ?>
