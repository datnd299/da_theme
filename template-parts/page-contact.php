<?php
/**
 * Contact Us - Rubyinstar
 * Tire ecommerce contact page.
 * Theme: Red / White / Black (matching homepage)
 */

$contact_status = isset($_GET['contact_status']) ? sanitize_key(wp_unslash($_GET['contact_status'])) : '';
$status_messages = [
  'sent'    => 'Thanks for your message. Our support team will get back to you shortly.',
  'invalid' => 'Please check the required fields and try again.',
  'failed'  => 'We could not send your message right now. Please email support@rubyinstar.com directly.',
];
?>

<section class="home-page contact-page">

  <div class="contact-hero">
    <img
      class="contact-hero__media"
      src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/gallery/Rubyinstar/contact-support-desk.png"
      alt=""
      loading="eager"
    />

    <div class="contact-hero__inner">
      <div class="contact-hero__copy">
        <p class="home-eyebrow">Customer Support</p>
        <h1>We're Here To Help</h1>
        <p>
          Questions about tire fitment, your order, shipping, or returns?
          Send us the details and our team will point you in the right direction.
        </p>
        <div class="home-actions">
          <a class="home-btn home-btn--primary" href="#contact-form">Send Message</a>
          <a class="home-btn home-btn--ghost" href="/track-order/">Track Order</a>
        </div>
      </div>

      <div class="contact-hero__panel" aria-label="Support highlights">
        <div>
          <span>01</span>
          <strong>Tire Guidance</strong>
          <p>Get help choosing tires by vehicle, size, and driving need.</p>
        </div>
        <div>
          <span>02</span>
          <strong>Order Support</strong>
          <p>Ask about order status, tracking, delivery, or payment details.</p>
        </div>
        <div>
          <span>03</span>
          <strong>Returns Help</strong>
          <p>Review return steps and refund questions before sending items back.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="home-strip contact-strip" data-mobile-slider="home-strip">
    <div>Secure Checkout</div>
    <div>Fast Shipping</div>
    <div>Order Tracking</div>
    <div>Easy Returns</div>
  </div>

  <div class="home-section">
    <div class="home-section__head">
      <div>
        <p class="home-eyebrow">Contact Rubyinstar</p>
        <h2>Send Us A Message</h2>
      </div>
      <a class="home-btn home-btn--dark" href="/faq/">View FAQ</a>
    </div>

    <div class="contact-grid">
      <div class="contact-form-wrap" id="contact-form">
        <?php if ($contact_status && isset($status_messages[$contact_status])) : ?>
          <div class="contact-alert contact-alert--<?php echo esc_attr($contact_status); ?>" role="status">
            <?php echo esc_html($status_messages[$contact_status]); ?>
          </div>
        <?php endif; ?>

        <form class="contact-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
          <input type="hidden" name="action" value="dawp_contact_submit">
          <?php wp_nonce_field('dawp_contact_submit', 'dawp_contact_nonce'); ?>

          <label class="contact-honeypot" aria-hidden="true">
            <span>Website</span>
            <input type="text" name="website" tabindex="-1" autocomplete="off">
          </label>

          <div class="contact-form__row">
            <label>
              <span>Your Name</span>
              <input type="text" name="name" placeholder="John Doe" autocomplete="name" required>
            </label>
            <label>
              <span>Email Address</span>
              <input type="email" name="email" placeholder="john@example.com" autocomplete="email" required>
            </label>
          </div>

          <div class="contact-form__row">
            <label>
              <span>Subject</span>
              <select name="subject" required>
                <option value="">Select a topic</option>
                <option value="General Inquiry">General Inquiry</option>
                <option value="Order Support">Order Support</option>
                <option value="Tire Help">Tire Help</option>
                <option value="Shipping Question">Shipping Question</option>
                <option value="Returns & Refunds">Returns &amp; Refunds</option>
                <option value="Other">Other</option>
              </select>
            </label>
            <label>
              <span>Order Number</span>
              <input type="text" name="order_number" placeholder="SLK-1234" autocomplete="off">
            </label>
          </div>

          <label>
            <span>Message</span>
            <textarea name="message" rows="6" placeholder="How can we help you?" required></textarea>
          </label>

          <button class="home-btn home-btn--primary" type="submit">Send Message</button>
        </form>
      </div>

      <aside class="contact-info" aria-label="Contact information">
        <h2>Contact Information</h2>

        <div class="contact-info__card">
          <div class="contact-info__icon">EM</div>
          <div>
            <strong>Email</strong>
            <a href="mailto:support@rubyinstar.com">support@rubyinstar.com</a>
          </div>
        </div>

        <div class="contact-info__card">
          <div class="contact-info__icon">US</div>
          <div>
            <strong>Location</strong>
            <span>United States</span>
          </div>
        </div>

        <div class="contact-info__card">
          <div class="contact-info__icon">HR</div>
          <div>
            <strong>Business Hours</strong>
            <span>Monday - Friday<br>9:00 AM - 5:00 PM (PST)</span>
          </div>
        </div>

        <div class="contact-info__links">
          <a href="/track-order/">Track Your Order</a>
          <a href="/returns-policy/">Return &amp; Refund Policy</a>
          <a href="/shipping-policy/">Shipping Policy</a>
        </div>
      </aside>
    </div>
  </div>

  <div class="home-section home-section--surface">
    <div class="contact-cta">
      <p class="home-eyebrow">Quick Answers</p>
      <h2>Need Help Before You Contact Us?</h2>
      <p>Find common answers about tire shopping, order tracking, shipping, returns, and refunds.</p>
      <div class="contact-cta__actions">
        <a class="home-btn home-btn--primary" href="/faq/">View FAQ</a>
        <a class="home-btn home-btn--outline" href="/shop-by-rim-size/">Shop By Rim Size</a>
      </div>
    </div>
  </div>

</section>

<style>
.contact-page {
  --home-black: #050505;
  --home-ink: #111111;
  --home-red: #dc2626;
  --home-red-dark: #991b1b;
  --home-red-bright: #ef4444;
  --home-muted: #6b7280;
  --home-line: #e5e5e5;
  --home-soft: #f6f6f6;
  --home-white: #ffffff;
  --home-radius: 8px;
  --home-section-gap: 80px;
  overflow: hidden;
  background: var(--home-white);
  color: var(--home-ink);
}

.contact-page a {
  color: inherit;
  text-decoration: none;
}

.contact-page a.home-btn,
.contact-page a.home-btn:visited {
  color: var(--home-ink);
}

.home-eyebrow {
  margin: 0 0 12px;
  color: var(--home-red);
  font-size: 0.78rem;
  font-weight: 900;
  letter-spacing: 0.14em;
  line-height: 1.3;
  text-transform: uppercase;
}

.home-actions {
  display: flex;
  flex-wrap: wrap;
  gap: 14px;
  margin-top: 34px;
}

.home-btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  min-height: 50px;
  padding: 0 28px;
  border: 2px solid transparent;
  border-radius: var(--home-radius);
  font-size: 0.85rem;
  font-weight: 900;
  letter-spacing: 0.04em;
  line-height: 1.2;
  text-align: center;
  text-transform: uppercase;
  cursor: pointer;
  transition: transform 180ms ease, background 180ms ease, border-color 180ms ease, color 180ms ease, box-shadow 180ms ease;
}

.home-btn:hover {
  transform: translateY(-2px);
}

.home-btn--primary {
  background: var(--home-red);
  color: var(--home-white);
  border-color: var(--home-red);
  box-shadow: 0 2px 8px rgba(220,38,38,0.3);
}

.contact-page a.home-btn--primary,
.contact-page a.home-btn--primary:visited {
  color: var(--home-white);
}

.home-btn--primary:hover {
  background: var(--home-red-bright);
  border-color: var(--home-red-bright);
  color: var(--home-white);
  box-shadow: 0 4px 16px rgba(220,38,38,0.4);
}

.contact-page a.home-btn--primary:hover,
.contact-page a.home-btn--primary:focus-visible {
  color: var(--home-white);
}

.home-btn--ghost {
  border-color: rgba(255,255,255,0.5);
  background: rgba(255,255,255,0.12);
  color: var(--home-white);
}

.contact-page a.home-btn--ghost,
.contact-page a.home-btn--ghost:visited {
  color: var(--home-white);
}

.home-btn--ghost:hover {
  border-color: var(--home-white);
  background: var(--home-white);
  color: var(--home-black);
}

.contact-page a.home-btn--ghost:hover,
.contact-page a.home-btn--ghost:focus-visible {
  color: var(--home-black);
}

.home-btn--dark {
  background: #1a1a1a;
  color: var(--home-white);
  border-color: #1a1a1a;
  box-shadow: 0 2px 8px rgba(0,0,0,0.15);
}

.contact-page a.home-btn--dark,
.contact-page a.home-btn--dark:visited {
  color: var(--home-white);
}

.home-btn--dark:hover {
  background: var(--home-red);
  border-color: var(--home-red);
  color: var(--home-white);
  box-shadow: 0 4px 16px rgba(220,38,38,0.35);
}

.contact-page a.home-btn--dark:hover,
.contact-page a.home-btn--dark:focus-visible {
  color: var(--home-white);
}

.home-btn--outline {
  background: transparent;
  color: var(--home-black);
  border-color: var(--home-black);
}

.contact-page a.home-btn--outline,
.contact-page a.home-btn--outline:visited {
  color: var(--home-black);
}

.home-btn--outline:hover {
  background: var(--home-black);
  color: var(--home-white);
}

.contact-page a.home-btn--outline:hover,
.contact-page a.home-btn--outline:focus-visible {
  color: var(--home-white);
}

.home-strip {
  position: relative;
  z-index: 2;
  display: grid;
  grid-template-columns: repeat(4, minmax(0, 1fr));
  width: min(100% - 32px, 1180px);
  margin: -28px auto 0;
  border: 1px solid var(--home-line);
  border-radius: var(--home-radius);
  background: var(--home-white);
  box-shadow: 0 18px 46px rgba(0,0,0,0.13);
}

.home-strip div {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  padding: 20px 14px;
  border-right: 1px solid var(--home-line);
  color: var(--home-ink);
  font-size: 0.8rem;
  font-weight: 800;
  letter-spacing: 0.04em;
  text-align: center;
}

.home-strip div:last-child {
  border-right: 0;
}

.home-section {
  width: min(100% - 32px, 1360px);
  margin: 0 auto;
  padding: var(--home-section-gap) 0;
}

.home-section--surface {
  width: 100%;
  max-width: none;
  padding-block: var(--home-section-gap);
  padding-inline: max(16px, calc((100vw - 1360px) / 2));
  background: var(--home-soft);
}

.home-section__head {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 24px;
  margin-bottom: 36px;
}

.home-section__head h2 {
  margin: 0;
  color: var(--home-black);
  font-family: var(--font-heading);
  font-size: clamp(1.5rem, 2.8vw, 2.2rem);
  font-weight: 900;
  letter-spacing: -0.02em;
  line-height: 1.2;
}

.home-section__head .home-btn {
  flex: 0 0 auto;
  min-width: 130px;
  white-space: nowrap;
}

.contact-hero {
  position: relative;
  isolation: isolate;
  overflow: hidden;
  background: var(--home-black);
  color: var(--home-white);
}

.contact-hero::before {
  position: absolute;
  inset: 0;
  z-index: -1;
  background:
    linear-gradient(90deg, rgba(5,5,5,0.96) 0%, rgba(5,5,5,0.78) 52%, rgba(5,5,5,0.35) 100%),
    linear-gradient(180deg, rgba(5,5,5,0) 58%, #050505 100%);
  content: "";
}

.contact-hero__media {
  position: absolute;
  inset: 0;
  z-index: -2;
  width: 100%;
  height: 100%;
  object-fit: cover;
  opacity: 0.62;
}

.contact-hero__inner {
  display: grid;
  grid-template-columns: minmax(0, 1fr) minmax(360px, 460px);
  gap: clamp(28px, 5vw, 64px);
  align-items: center;
  width: min(100%, 1360px);
  min-height: 560px;
  margin: 0 auto;
  padding: clamp(70px, 8vw, 120px) 18px 76px;
}

.contact-hero__copy {
  max-width: 760px;
}

.contact-hero .home-eyebrow {
  color: #fca5a5;
}

.contact-hero h1 {
  max-width: 820px;
  margin: 0;
  font-family: var(--font-heading);
  font-size: clamp(2.6rem, 6vw, 5.4rem);
  font-weight: 900;
  letter-spacing: -0.02em;
  line-height: 0.98;
  color: var(--home-white);
  text-shadow: 0 2px 24px rgba(0,0,0,0.4);
}

.contact-hero__copy > p:not(.home-eyebrow) {
  max-width: 620px;
  margin: 20px 0 0;
  color: rgba(255,255,255,0.88);
  font-size: clamp(1rem, 1.4vw, 1.18rem);
  line-height: 1.75;
  text-shadow: 0 1px 12px rgba(0,0,0,0.35);
}

.contact-hero__panel {
  display: grid;
  gap: 14px;
  padding: clamp(22px, 3vw, 30px);
  border: 1px solid rgba(255,255,255,0.2);
  border-radius: var(--home-radius);
  background: rgba(255,255,255,0.96);
  color: var(--home-ink);
  box-shadow: 0 28px 90px rgba(0,0,0,0.36);
}

.contact-hero__panel div {
  display: grid;
  grid-template-columns: 42px minmax(0, 1fr);
  column-gap: 14px;
  padding-bottom: 14px;
  border-bottom: 1px solid var(--home-line);
}

.contact-hero__panel div:last-child {
  padding-bottom: 0;
  border-bottom: 0;
}

.contact-hero__panel span {
  display: grid;
  place-items: center;
  width: 42px;
  height: 42px;
  border-radius: var(--home-radius);
  background: var(--home-black);
  color: var(--home-white);
  font-size: 0.78rem;
  font-weight: 900;
}

.contact-hero__panel strong {
  display: block;
  color: var(--home-black);
  font-family: var(--font-heading);
  font-size: 1rem;
  font-weight: 900;
  line-height: 1.25;
}

.contact-hero__panel p {
  grid-column: 2;
  margin: 5px 0 0;
  color: var(--home-muted);
  font-size: 0.9rem;
  line-height: 1.55;
}

.contact-strip div::before {
  display: inline-block;
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: var(--home-red);
  content: "";
}

.contact-grid {
  display: grid;
  grid-template-columns: minmax(0, 1.12fr) minmax(320px, 0.72fr);
  gap: clamp(28px, 4vw, 52px);
  align-items: start;
}

.contact-form-wrap {
  padding: clamp(22px, 3vw, 34px);
  border: 1.5px solid var(--home-line);
  border-radius: var(--home-radius);
  background: var(--home-white);
  box-shadow: 0 18px 46px rgba(0,0,0,0.06);
}

.contact-alert {
  margin-bottom: 18px;
  padding: 14px 16px;
  border: 1.5px solid var(--home-line);
  border-radius: var(--home-radius);
  background: #fafafa;
  color: var(--home-ink);
  font-size: 0.92rem;
  font-weight: 800;
  line-height: 1.5;
}

.contact-alert--sent {
  border-color: rgba(22,163,74,0.28);
  background: #f0fdf4;
  color: #166534;
}

.contact-alert--invalid,
.contact-alert--failed {
  border-color: rgba(220,38,38,0.28);
  background: #fef2f2;
  color: var(--home-red-dark);
}

.contact-form {
  display: grid;
  gap: 18px;
}

.contact-form__row {
  display: grid;
  grid-template-columns: repeat(2, minmax(0, 1fr));
  gap: 18px;
}

.contact-form label span {
  display: block;
  margin-bottom: 8px;
  color: var(--home-muted);
  font-size: 0.72rem;
  font-weight: 900;
  letter-spacing: 0.08em;
  text-transform: uppercase;
}

.contact-form input,
.contact-form select,
.contact-form textarea {
  width: 100%;
  min-height: 50px;
  padding: 0 14px;
  border: 1.5px solid var(--home-line);
  border-radius: var(--home-radius);
  background: #fafafa;
  color: var(--home-ink);
  outline: none;
  font-family: inherit;
  font-size: 0.92rem;
  font-weight: 700;
  box-sizing: border-box;
}

.contact-form textarea {
  min-height: 156px;
  padding: 14px;
  line-height: 1.6;
  resize: vertical;
}

.contact-form input:focus,
.contact-form select:focus,
.contact-form textarea:focus {
  border-color: var(--home-red);
  box-shadow: 0 0 0 3px rgba(220,38,38,0.15);
}

.contact-form .home-btn {
  width: 100%;
  margin-top: 2px;
}

.contact-honeypot {
  position: absolute;
  left: -9999px;
}

.contact-info {
  position: sticky;
  top: 92px;
}

.contact-info h2 {
  margin: 0 0 22px;
  color: var(--home-black);
  font-family: var(--font-heading);
  font-size: clamp(1.35rem, 2.5vw, 1.9rem);
  font-weight: 900;
  letter-spacing: -0.02em;
  line-height: 1.2;
}

.contact-info__card {
  display: flex;
  align-items: flex-start;
  gap: 16px;
  padding: 20px;
  border: 1.5px solid var(--home-line);
  border-radius: var(--home-radius);
  background: var(--home-white);
  margin-bottom: 14px;
  transition: box-shadow 180ms ease, transform 180ms ease, border-color 180ms ease;
}

.contact-info__card:hover {
  border-color: rgba(220,38,38,0.26);
  box-shadow: 0 10px 28px rgba(0,0,0,0.07);
  transform: translateY(-2px);
}

.contact-info__icon {
  display: grid;
  place-items: center;
  width: 44px;
  height: 44px;
  flex: 0 0 auto;
  border-radius: var(--home-radius);
  background: var(--home-black);
  color: var(--home-white);
  font-size: 0.75rem;
  font-weight: 900;
  letter-spacing: 0.08em;
}

.contact-info__card strong {
  display: block;
  color: var(--home-black);
  font-family: var(--font-heading);
  font-size: 0.95rem;
  font-weight: 900;
  line-height: 1.25;
}

.contact-info__card span,
.contact-info__card a {
  display: block;
  margin-top: 4px;
  color: var(--home-muted);
  font-size: 0.92rem;
  line-height: 1.55;
}

.contact-info__card a,
.contact-info__links a {
  color: var(--home-red);
  text-decoration: underline;
  text-underline-offset: 3px;
}

.contact-info__card a:hover,
.contact-info__links a:hover {
  color: var(--home-red-dark);
}

.contact-info__links {
  display: grid;
  gap: 10px;
  padding: 20px;
  border-radius: var(--home-radius);
  background: var(--home-soft);
  font-size: 0.9rem;
  font-weight: 900;
  letter-spacing: 0.03em;
  text-transform: uppercase;
}

.contact-cta {
  max-width: 720px;
  margin: 0 auto;
  text-align: center;
}

.contact-cta h2 {
  margin: 0;
  color: var(--home-black);
  font-family: var(--font-heading);
  font-size: clamp(1.5rem, 3vw, 2.2rem);
  font-weight: 900;
  letter-spacing: -0.02em;
  line-height: 1.2;
}

.contact-cta p:not(.home-eyebrow) {
  margin: 16px auto 0;
  max-width: 580px;
  color: var(--home-muted);
  font-size: 1rem;
  line-height: 1.65;
}

.contact-cta__actions {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 14px;
  margin-top: 28px;
}

@media (max-width: 1020px) {
  .contact-hero__inner,
  .contact-grid {
    grid-template-columns: 1fr;
  }

  .contact-info {
    position: static;
  }
}

@media (max-width: 760px) {
  .contact-page {
    --home-section-gap: 56px;
  }

  .home-actions,
  .contact-cta__actions {
    display: grid;
    grid-template-columns: 1fr;
  }

  .home-btn {
    width: 100%;
  }

  .home-strip {
    display: flex;
    grid-template-columns: none;
    gap: 10px;
    overflow-x: auto;
    overflow-y: hidden;
    scroll-padding-inline: 0;
    scroll-snap-type: x mandatory;
    scrollbar-width: none;
    -webkit-overflow-scrolling: touch;
  }

  .home-strip div {
    flex: 0 0 calc((100% - 10px) / 1.5);
    min-height: 58px;
    border-right: 0;
    border-bottom: 0;
    scroll-snap-align: start;
  }

  .home-strip::-webkit-scrollbar {
    display: none;
  }

  .home-strip div:not(:last-child) {
    border-right: 0;
  }

  .home-section__head {
    align-items: flex-start;
    flex-direction: column;
  }

  .home-section__head .home-btn {
    width: 100%;
  }

  .contact-hero__inner {
    min-height: auto;
    padding-top: 54px;
  }

  .contact-hero h1 {
    font-size: clamp(2rem, 10vw, 3.1rem);
  }

  .contact-form__row,
  .contact-cta__actions {
    grid-template-columns: 1fr;
  }

  .contact-form__row {
    display: grid;
  }
}
</style>
