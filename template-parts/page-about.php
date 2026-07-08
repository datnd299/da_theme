<?php
/**
 * About Us - Rubyinstar
 * Tire ecommerce about page.
 * Theme: Red / White / Black (matching homepage)
 */
?>

<section class="home-page about-page">

  <div class="about-hero">
    <img
      class="about-hero__media"
      src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/gallery/Rubyinstar/about-warehouse-consultation.png"
      alt=""
      loading="eager"
    />

    <div class="about-hero__inner">
      <div class="about-hero__copy">
        <p class="home-eyebrow">About Rubyinstar</p>
        <h1>Tire Shopping Made Clearer, Faster, And Easier</h1>
        <p>
          Rubyinstar helps everyday drivers find quality tires online with clear product information,
          competitive pricing, reliable delivery, and support when it matters.
        </p>
        <div class="home-actions">
          <a class="home-btn home-btn--primary" href="/shop/">Shop Tires</a>
          <a class="home-btn home-btn--ghost" href="/contact-us/">Contact Support</a>
        </div>
      </div>

      <div class="about-hero__panel" aria-label="Rubyinstar highlights">
        <div>
          <strong>Built For Online Tire Buyers</strong>
          <p>Simple category paths, useful tire details, and fewer confusing steps.</p>
        </div>
        <div>
          <strong>Focused On Daily Drivers</strong>
          <p>Passenger, SUV, truck, performance, all-season, winter, and trailer options.</p>
        </div>
        <div>
          <strong>Backed By Practical Support</strong>
          <p>Help with tire selection, order tracking, shipping questions, and returns.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="home-strip about-strip" data-mobile-slider="home-strip">
    <div>Secure Checkout</div>
    <div>Fast Shipping</div>
    <div>Order Tracking</div>
    <div>Easy Returns</div>
  </div>

  <div class="home-section">
    <div class="about-story">
      <div>
        <p class="home-eyebrow">Our Mission</p>
        <h2>Make Buying Tires Feel Less Complicated</h2>
      </div>
      <div class="about-story__copy">
        <p>
          Choosing tires can feel technical, rushed, and full of fine print. Rubyinstar was built
          to make the process more approachable, whether you already know your tire size or need
          a clearer path by vehicle type, rim size, or driving need.
        </p>
        <p>
          We focus on dependable product choices, transparent shopping pages, and a support flow
          that helps customers move from browsing to checkout with more confidence.
        </p>
      </div>
    </div>

    <div class="about-stat-grid" data-mobile-slider="about-stats">
      <div class="about-stat">
        <span>01</span>
        <strong>Clear Categories</strong>
        <p>Shop by tire type, vehicle use, rim size, or driving season.</p>
      </div>
      <div class="about-stat">
        <span>02</span>
        <strong>Helpful Product Detail</strong>
        <p>Compare fitment clues, tire type, pricing, and availability.</p>
      </div>
      <div class="about-stat">
        <span>03</span>
        <strong>Online Convenience</strong>
        <p>Order tires from home and track the shipment after checkout.</p>
      </div>
    </div>
  </div>

  <div class="home-section home-section--surface">
    <div class="home-section__head">
      <div>
        <p class="home-eyebrow">What We Value</p>
        <h2>A Better Tire Buying Experience</h2>
      </div>
      <a class="home-btn home-btn--dark" href="/faq/">View FAQ</a>
    </div>

    <div class="about-value-grid">
      <div class="about-value">
        <span>CL</span>
        <h3>Clarity First</h3>
        <p>We organize tire shopping around practical decisions: vehicle type, rim size, season, and use case.</p>
      </div>
      <div class="about-value">
        <span>VA</span>
        <h3>Everyday Value</h3>
        <p>Our catalog is shaped around dependable options and competitive pricing for real-world driving.</p>
      </div>
      <div class="about-value">
        <span>TR</span>
        <h3>Transparent Support</h3>
        <p>Shipping, returns, refunds, and order help are kept easy to find before and after purchase.</p>
      </div>
      <div class="about-value">
        <span>SE</span>
        <h3>Secure Shopping</h3>
        <p>Checkout is designed to be straightforward, protected, and focused on getting the right tires ordered.</p>
      </div>
    </div>
  </div>

  <div class="home-section">
    <div class="about-split">
      <img
        src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/gallery/Rubyinstar/about-order-prep.png"
        alt="Tire order preparation"
        loading="lazy"
      />
      <div>
        <p class="home-eyebrow">How We Help</p>
        <h2>From Tire Search To Delivery</h2>
        <div class="about-step-list">
          <div>
            <span>1</span>
            <div>
              <strong>Find The Right Category</strong>
              <p>Start with passenger, SUV, truck, performance, all-season, winter, or trailer tires.</p>
            </div>
          </div>
          <div>
            <span>2</span>
            <div>
              <strong>Compare Products Online</strong>
              <p>Review options, prices, tire details, and product pages before you buy.</p>
            </div>
          </div>
          <div>
            <span>3</span>
            <div>
              <strong>Order With Support Nearby</strong>
              <p>Track your order, review policies, or contact support if questions come up.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="home-section home-section--surface">
    <div class="about-cta">
      <p class="home-eyebrow">Ready To Shop?</p>
      <h2>Find Tires That Fit Your Drive</h2>
      <p>Browse Rubyinstar tire categories or search by rim size to get started.</p>
      <div class="about-cta__actions">
        <a class="home-btn home-btn--primary" href="/shop/">Shop Tires</a>
        <a class="home-btn home-btn--outline" href="/shop-by-rim-size/">Shop By Rim Size</a>
      </div>
    </div>
  </div>

</section>

<style>
.about-page {
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

.about-page a {
  color: inherit;
  text-decoration: none;
}

.about-page a.home-btn,
.about-page a.home-btn:visited {
  text-decoration: none;
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

.home-btn:focus-visible {
  outline: 3px solid rgba(220,38,38,0.28);
  outline-offset: 3px;
}

.home-btn--primary {
  background: var(--home-red);
  color: var(--home-white);
  border-color: var(--home-red);
  box-shadow: 0 2px 8px rgba(220,38,38,0.3);
}

.about-page a.home-btn--primary,
.about-page a.home-btn--primary:visited {
  color: var(--home-white);
}

.home-btn--primary:hover {
  background: var(--home-red-bright);
  border-color: var(--home-red-bright);
  color: var(--home-white);
  box-shadow: 0 4px 16px rgba(220,38,38,0.4);
}

.about-page a.home-btn--primary:hover,
.about-page a.home-btn--primary:focus-visible {
  color: var(--home-white);
}

.home-btn--ghost {
  border-color: rgba(255,255,255,0.5);
  background: rgba(255,255,255,0.12);
  color: var(--home-white);
}

.about-page a.home-btn--ghost,
.about-page a.home-btn--ghost:visited {
  color: var(--home-white);
}

.home-btn--ghost:hover {
  border-color: var(--home-white);
  background: var(--home-white);
  color: var(--home-black);
}

.about-page a.home-btn--ghost:hover,
.about-page a.home-btn--ghost:focus-visible {
  color: var(--home-black);
}

.home-btn--dark {
  background: #1a1a1a;
  color: var(--home-white);
  border-color: #1a1a1a;
  box-shadow: 0 2px 8px rgba(0,0,0,0.15);
}

.about-page a.home-btn--dark,
.about-page a.home-btn--dark:visited {
  color: var(--home-white);
}

.home-btn--dark:hover {
  background: var(--home-red);
  border-color: var(--home-red);
  color: var(--home-white);
  box-shadow: 0 4px 16px rgba(220,38,38,0.35);
}

.about-page a.home-btn--dark:hover,
.about-page a.home-btn--dark:focus-visible {
  color: var(--home-white);
}

.home-btn--outline {
  background: transparent;
  color: var(--home-black);
  border-color: var(--home-black);
}

.about-page a.home-btn--outline,
.about-page a.home-btn--outline:visited {
  color: var(--home-black);
}

.home-btn--outline:hover {
  background: var(--home-black);
  color: var(--home-white);
}

.about-page a.home-btn--outline:hover,
.about-page a.home-btn--outline:focus-visible {
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

.home-section__head h2,
.about-story h2,
.about-split h2,
.about-cta h2 {
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

.about-hero {
  position: relative;
  isolation: isolate;
  overflow: hidden;
  background: var(--home-black);
  color: var(--home-white);
}

.about-hero::before {
  position: absolute;
  inset: 0;
  z-index: -1;
  background:
    linear-gradient(90deg, rgba(5,5,5,0.96) 0%, rgba(5,5,5,0.78) 52%, rgba(5,5,5,0.35) 100%),
    linear-gradient(180deg, rgba(5,5,5,0) 58%, #050505 100%);
  content: "";
}

.about-hero__media {
  position: absolute;
  inset: 0;
  z-index: -2;
  width: 100%;
  height: 100%;
  object-fit: cover;
  opacity: 0.62;
}

.about-hero__inner {
  display: grid;
  grid-template-columns: minmax(0, 1fr) minmax(360px, 460px);
  gap: clamp(28px, 5vw, 64px);
  align-items: center;
  width: min(100%, 1360px);
  min-height: 590px;
  margin: 0 auto;
  padding: clamp(70px, 8vw, 120px) 18px 76px;
}

.about-hero__copy {
  max-width: 820px;
}

.about-hero .home-eyebrow {
  color: #fca5a5;
}

.about-hero h1 {
  max-width: 880px;
  margin: 0;
  font-family: var(--font-heading);
  font-size: clamp(2.5rem, 6vw, 5.4rem);
  font-weight: 900;
  letter-spacing: -0.02em;
  line-height: 0.98;
  color: var(--home-white);
  text-shadow: 0 2px 24px rgba(0,0,0,0.4);
}

.about-hero__copy > p:not(.home-eyebrow) {
  max-width: 650px;
  margin: 20px 0 0;
  color: rgba(255,255,255,0.88);
  font-size: clamp(1rem, 1.4vw, 1.18rem);
  line-height: 1.75;
  text-shadow: 0 1px 12px rgba(0,0,0,0.35);
}

.about-hero__panel {
  display: grid;
  gap: 0;
  border: 1px solid rgba(255,255,255,0.2);
  border-radius: var(--home-radius);
  background: rgba(255,255,255,0.96);
  color: var(--home-ink);
  box-shadow: 0 28px 90px rgba(0,0,0,0.36);
}

.about-hero__panel div {
  padding: 24px;
  border-bottom: 1px solid var(--home-line);
}

.about-hero__panel div:last-child {
  border-bottom: 0;
}

.about-hero__panel strong {
  display: block;
  color: var(--home-black);
  font-family: var(--font-heading);
  font-size: 1.05rem;
  font-weight: 900;
  line-height: 1.25;
}

.about-hero__panel p {
  margin: 8px 0 0;
  color: var(--home-muted);
  font-size: 0.92rem;
  line-height: 1.55;
}

.about-strip div::before {
  display: inline-block;
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: var(--home-red);
  content: "";
}

.about-story {
  display: grid;
  grid-template-columns: minmax(260px, 0.72fr) minmax(0, 1fr);
  gap: clamp(28px, 5vw, 72px);
  align-items: start;
}

.about-story__copy {
  display: grid;
  gap: 18px;
  color: var(--home-muted);
  font-size: 1.02rem;
  line-height: 1.75;
}

.about-story__copy p {
  margin: 0;
}

.about-stat-grid,
.about-value-grid {
  display: grid;
  grid-template-columns: repeat(3, minmax(0, 1fr));
  gap: 18px;
  margin-top: 42px;
}

.about-value-grid {
  grid-template-columns: repeat(4, minmax(0, 1fr));
  margin-top: 0;
}

.about-stat,
.about-value {
  min-height: 210px;
  padding: 24px;
  border: 1.5px solid var(--home-line);
  border-radius: var(--home-radius);
  background: var(--home-white);
  transition: box-shadow 180ms ease, transform 180ms ease, border-color 180ms ease;
}

.about-stat:hover,
.about-value:hover {
  border-color: rgba(220,38,38,0.26);
  box-shadow: 0 10px 28px rgba(0,0,0,0.07);
  transform: translateY(-2px);
}

.about-stat span,
.about-value span {
  display: grid;
  place-items: center;
  width: 46px;
  height: 46px;
  margin-bottom: 20px;
  border-radius: var(--home-radius);
  background: var(--home-black);
  color: var(--home-white);
  font-size: 0.78rem;
  font-weight: 900;
  letter-spacing: 0.08em;
}

.about-stat strong,
.about-value h3 {
  display: block;
  margin: 0;
  color: var(--home-black);
  font-family: var(--font-heading);
  font-size: 1.12rem;
  font-weight: 900;
  line-height: 1.25;
}

.about-stat p,
.about-value p {
  margin: 10px 0 0;
  color: var(--home-muted);
  font-size: 0.95rem;
  line-height: 1.62;
}

.about-split {
  display: grid;
  grid-template-columns: minmax(0, 0.94fr) minmax(0, 1.06fr);
  gap: clamp(28px, 5vw, 64px);
  align-items: center;
}

.about-split > img {
  width: 100%;
  min-height: 420px;
  max-height: 560px;
  border-radius: var(--home-radius);
  object-fit: cover;
  box-shadow: 0 24px 70px rgba(0,0,0,0.12);
}

.about-step-list {
  display: grid;
  gap: 16px;
  margin-top: 28px;
}

.about-step-list > div {
  display: grid;
  grid-template-columns: 46px minmax(0, 1fr);
  gap: 16px;
  padding: 20px;
  border: 1.5px solid var(--home-line);
  border-radius: var(--home-radius);
  background: var(--home-white);
}

.about-step-list span {
  display: grid;
  place-items: center;
  width: 46px;
  height: 46px;
  border-radius: var(--home-radius);
  background: var(--home-red);
  color: var(--home-white);
  font-weight: 900;
}

.about-step-list strong {
  display: block;
  color: var(--home-black);
  font-family: var(--font-heading);
  font-size: 1rem;
  font-weight: 900;
  line-height: 1.25;
}

.about-step-list p {
  margin: 6px 0 0;
  color: var(--home-muted);
  font-size: 0.95rem;
  line-height: 1.6;
}

.about-cta {
  max-width: 760px;
  margin: 0 auto;
  text-align: center;
}

.about-cta p:not(.home-eyebrow) {
  margin: 16px auto 0;
  max-width: 560px;
  color: var(--home-muted);
  font-size: 1rem;
  line-height: 1.65;
}

.about-cta__actions {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 14px;
  margin-top: 28px;
}

@media (max-width: 1080px) {
  .about-hero__inner,
  .about-story,
  .about-split {
    grid-template-columns: 1fr;
  }

  .about-value-grid {
    grid-template-columns: repeat(2, minmax(0, 1fr));
  }
}

@media (max-width: 760px) {
  .about-page {
    --home-section-gap: 56px;
  }

  .home-actions,
  .about-cta__actions {
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

  .home-section__head {
    align-items: flex-start;
    flex-direction: column;
  }

  .home-section__head .home-btn {
    width: 100%;
  }

  .about-hero__inner {
    min-height: auto;
    padding-top: 54px;
  }

  .about-hero h1 {
    font-size: clamp(2rem, 10vw, 3.1rem);
  }

  .about-stat-grid,
  .about-value-grid {
    grid-template-columns: 1fr;
  }

  .about-split > img {
    min-height: 300px;
  }
}
</style>
