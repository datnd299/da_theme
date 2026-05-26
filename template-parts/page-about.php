<?php
/**
 * Template Name: About Us
 * Template Part: page-about
 */

$img_base = get_template_directory_uri() . '/assets/img/';

$categories = [
    [
        'title' => __('Formal Shoes', 'dawp'),
        'copy'  => __('Polished formal footwear for office days, evening events, smart casual dressing, and special occasions.', 'dawp'),
        'url'   => home_url('/product-category/formal-shoes/'),
    ],
    [
        'title' => __('Leather Dress Shoes', 'dawp'),
        'copy'  => __('Dress shoes with refined silhouettes, polished finishes, and material details shown clearly on each product page.', 'dawp'),
        'url'   => home_url('/product-category/leather-dress-shoes/'),
    ],
    [
        'title' => __('Brogue Shoes', 'dawp'),
        'copy'  => __('Brogue shoes with classic detailing for formal outfits, smart casual looks, and confident occasions.', 'dawp'),
        'url'   => home_url('/product-category/brogue-shoes/'),
    ],
];

$values = [
    [
        'title' => __('Focused Formal Style', 'dawp'),
        'copy'  => __('We keep the collection centered on men\'s formal shoes, dress shoes, and brogue shoes so every product fits a clear wardrobe purpose.', 'dawp'),
    ],
    [
        'title' => __('Clear Product Details', 'dawp'),
        'copy'  => __('Product pages are built around size guidance, fit notes, color options, finish details, closure type, care instructions, shipping notes, and return conditions.', 'dawp'),
    ],
    [
        'title' => __('Practical Customer Care', 'dawp'),
        'copy'  => __('We keep shipping, tracking, returns, and support information easy to find before and after checkout.', 'dawp'),
    ],
];

$trust_items = [
    __('Three focused shoe categories', 'dawp'),
    __('Material and finish notes', 'dawp'),
    __('Size guide and fit details', 'dawp'),
    __('Order tracking support', 'dawp'),
    __('30-day eligible returns', 'dawp'),
    __('Customer support by email', 'dawp'),
];
?>

<style>
.broge-about {
  --broge-charcoal: #111111;
  --broge-brown: #3b2416;
  --broge-cognac: #a66a3f;
  --broge-cream: #f5efe6;
  --broge-gold: #c8a45d;
  --broge-navy: #101827;
  --broge-white: #ffffff;
  --broge-text: #221812;
  --broge-muted: #6f625d;
  color: var(--broge-text);
  background: var(--broge-white);
  font-family: "Inter", system-ui, sans-serif;
}
.broge-about *,
.broge-about *::before,
.broge-about *::after { box-sizing: border-box; }
.broge-about a { color: inherit; text-decoration: none; }
.broge-about img { display: block; max-width: 100%; }
.broge-about__container {
  width: min(100% - 32px, 1280px);
  margin-inline: auto;
}
.broge-about__section { padding: 72px 0; }
.broge-about h1,
.broge-about h2,
.broge-about h3 {
  margin: 0;
  font-family: Georgia, "Times New Roman", serif;
  font-weight: 600;
  letter-spacing: 0;
  line-height: 1.05;
}
.broge-about p { margin: 0; }
.broge-about__eyebrow {
  color: var(--broge-gold);
  font-size: 0.75rem;
  font-weight: 800;
  letter-spacing: 0.12em;
  text-transform: uppercase;
}
.broge-about__eyebrow--dark { color: var(--broge-cognac); }
.broge-about__btn {
  min-height: 46px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  padding: 0 20px;
  border: 1px solid transparent;
  border-radius: 10px;
  font-size: 0.78rem;
  font-weight: 800;
  letter-spacing: 0.06em;
  line-height: 1.2;
  text-transform: uppercase;
  transition: transform 180ms ease, background 180ms ease, border-color 180ms ease, color 180ms ease;
}
.broge-about__btn:hover { transform: translateY(-1px); }
.broge-about a.broge-about__btn--primary {
  color: var(--broge-white);
  background: var(--broge-cognac);
}
.broge-about a.broge-about__btn--primary:hover {
  color: var(--broge-white);
  background: var(--broge-charcoal);
}
.broge-about a.broge-about__btn--ghost {
  color: var(--broge-cream);
  border-color: rgba(200, 164, 93, 0.5);
}
.broge-about a.broge-about__btn--ghost:hover {
  color: var(--broge-white);
  border-color: var(--broge-cognac);
  background: rgba(166, 106, 63, 0.22);
}
.broge-about__actions {
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
  align-items: center;
}
.broge-about__hero {
  position: relative;
  overflow: hidden;
  padding: 84px 0 78px;
  color: var(--broge-text);
  background:
    linear-gradient(90deg, var(--broge-cream) 0%, var(--broge-cream) 58%, var(--broge-white) 58%, var(--broge-white) 100%);
}
.broge-about__hero-grid {
  display: grid;
  grid-template-columns: minmax(0, 1.02fr) minmax(0, 0.98fr);
  gap: 54px;
  align-items: center;
}
.broge-about__hero-content {
  display: grid;
  gap: 24px;
  max-width: 690px;
}
.broge-about__hero h1 {
  color: var(--broge-charcoal);
  font-size: clamp(2.55rem, 4.4vw, 4.7rem);
}
.broge-about__lead {
  max-width: 610px;
  color: var(--broge-muted);
  font-size: 1.08rem;
  line-height: 1.75;
}
.broge-about__hero-note {
  max-width: 520px;
  padding-left: 18px;
  border-left: 3px solid var(--broge-cognac);
  color: var(--broge-muted);
  font-size: 0.92rem;
  line-height: 1.7;
}
.broge-about__hero a.broge-about__btn--ghost {
  color: var(--broge-brown);
  border-color: rgba(59, 36, 22, 0.24);
}
.broge-about__hero a.broge-about__btn--ghost:hover {
  color: var(--broge-white);
  border-color: var(--broge-charcoal);
  background: var(--broge-charcoal);
}
.broge-about__hero-story {
  display: grid;
  gap: 18px;
}
.broge-about__hero-media {
  position: relative;
  min-height: 500px;
  overflow: hidden;
  border-radius: 0 32px 0 32px;
  box-shadow: 0 28px 70px rgba(59, 36, 22, 0.2);
}
.broge-about__hero-media::after {
  content: "";
  position: absolute;
  inset: 16px;
  border: 1px solid rgba(245, 239, 230, 0.72);
  pointer-events: none;
}
.broge-about__hero-media img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.broge-about__hero-label {
  position: absolute;
  right: 22px;
  bottom: 22px;
  max-width: 260px;
  padding: 18px 20px;
  background: rgba(17, 17, 17, 0.88);
  color: var(--broge-cream);
  font-size: 0.82rem;
  font-weight: 700;
  line-height: 1.55;
}
.broge-about__hero-points {
  display: grid;
  grid-template-columns: repeat(3, minmax(0, 1fr));
  gap: 10px;
}
.broge-about__hero-point {
  min-height: 86px;
  display: grid;
  align-content: center;
  gap: 6px;
  padding: 16px;
  border: 1px solid rgba(59, 36, 22, 0.12);
  background: var(--broge-white);
}
.broge-about__hero-point strong {
  color: var(--broge-charcoal);
  font-family: Georgia, "Times New Roman", serif;
  font-size: 1.45rem;
  line-height: 1;
}
.broge-about__hero-point span {
  color: var(--broge-muted);
  font-size: 0.75rem;
  font-weight: 800;
  letter-spacing: 0.08em;
  line-height: 1.35;
  text-transform: uppercase;
}
.broge-about__split-media {
  height: 520px;
  min-height: 520px;
  overflow: hidden;
  border: 1px solid rgba(200, 164, 93, 0.28);
  border-radius: 22px;
  box-shadow: 0 30px 90px rgba(0, 0, 0, 0.35);
}
.broge-about__split-media img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.broge-about__intro,
.broge-about__trust { background: var(--broge-cream); }
.broge-about__split {
  display: grid;
  grid-template-columns: minmax(0, 1fr) minmax(0, 0.92fr);
  gap: 52px;
  align-items: center;
}
.broge-about__content {
  display: grid;
  gap: 18px;
}
.broge-about__content h2,
.broge-about__section-head h2 {
  max-width: 760px;
  font-size: clamp(2rem, 3vw, 3.25rem);
}
.broge-about__content p,
.broge-about__section-head p,
.broge-about__card p,
.broge-about__care-card p {
  color: var(--broge-muted);
  font-size: 1rem;
  line-height: 1.75;
}
.broge-about__section-head {
  display: grid;
  gap: 14px;
  max-width: 760px;
  margin-bottom: 34px;
}
.broge-about__grid {
  display: grid;
  grid-template-columns: repeat(3, minmax(0, 1fr));
  gap: 18px;
}
.broge-about__card {
  min-height: 100%;
  padding: 26px;
  border: 1px solid rgba(59, 36, 22, 0.12);
  border-radius: 16px;
  background: var(--broge-white);
  color: var(--broge-text);
  box-shadow: 0 12px 32px rgba(34, 24, 18, 0.07);
}
.broge-about__card h3 {
  margin-bottom: 12px;
  color: var(--broge-text);
  font-size: 1.35rem;
}
.broge-about__card-link {
  display: inline-flex;
  margin-top: 18px;
  color: var(--broge-cognac);
  font-size: 0.78rem;
  font-weight: 800;
  letter-spacing: 0.08em;
  text-transform: uppercase;
}
.broge-about__dark {
  color: var(--broge-white);
  background:
    linear-gradient(135deg, rgba(17, 17, 17, 0.98), rgba(59, 36, 22, 0.96) 62%, rgba(16, 24, 39, 0.98)),
    var(--broge-charcoal);
}
.broge-about__dark .broge-about__content p,
.broge-about__dark .broge-about__section-head p {
  color: rgba(245, 239, 230, 0.82);
}
.broge-about__trust-grid {
  display: grid;
  grid-template-columns: repeat(3, minmax(0, 1fr));
  gap: 14px;
}
.broge-about__trust-item {
  min-height: 74px;
  display: flex;
  align-items: center;
  padding: 18px;
  border: 1px solid rgba(166, 106, 63, 0.16);
  border-radius: 14px;
  background: var(--broge-white);
  color: var(--broge-text);
  font-weight: 800;
}
.broge-about__care {
  display: grid;
  grid-template-columns: minmax(0, 0.9fr) minmax(0, 1.1fr);
  gap: 40px;
  align-items: start;
}
.broge-about__care-card {
  overflow: hidden;
  border: 1px solid rgba(200, 164, 93, 0.2);
  border-radius: 16px;
  background: rgba(255, 255, 255, 0.06);
}
.broge-about__care-card img {
  width: 100%;
  height: 290px;
  object-fit: cover;
}
.broge-about__care-card-body {
  display: grid;
  gap: 14px;
  padding: 24px;
}
.broge-about__care-card p {
  color: rgba(245, 239, 230, 0.78);
}
@media (max-width: 1023px) {
  .broge-about__section { padding: 58px 0; }
  .broge-about__hero {
    padding: 64px 0;
    background: var(--broge-cream);
  }
  .broge-about__hero-grid,
  .broge-about__split,
  .broge-about__care {
    grid-template-columns: 1fr;
  }
  .broge-about__hero-media,
  .broge-about__split-media {
    height: 390px;
    min-height: 390px;
  }
  .broge-about__grid,
  .broge-about__trust-grid {
    grid-template-columns: 1fr;
  }
}
@media (max-width: 640px) {
  .broge-about__container { width: min(100% - 28px, 1280px); }
  .broge-about__hero h1 { font-size: 2.55rem; }
  .broge-about__hero-media { min-height: 340px; }
  .broge-about__split-media {
    height: 320px;
    min-height: 320px;
  }
  .broge-about__hero-points { grid-template-columns: 1fr; }
  .broge-about__hero-label {
    right: 14px;
    bottom: 14px;
    max-width: calc(100% - 28px);
  }
  .broge-about__btn { width: 100%; }
  .broge-about__care-card img { height: 230px; }
}
</style>

<div class="broge-about">
    <section class="broge-about__hero" aria-labelledby="broge-about-title">
        <div class="broge-about__container broge-about__hero-grid">
            <div class="broge-about__hero-content">
                <p class="broge-about__eyebrow broge-about__eyebrow--dark"><?php esc_html_e('About Broge Shoes', 'dawp'); ?></p>
                <h1 id="broge-about-title"><?php esc_html_e('Built around polished men\'s dress footwear.', 'dawp'); ?></h1>
                <p class="broge-about__lead">
                    <?php esc_html_e('Broge Shoes keeps the shopping experience focused on formal shoes, leather dress shoes, and brogue styles, with product details that help customers choose confidently before checkout.', 'dawp'); ?>
                </p>
                <div class="broge-about__actions">
                    <a class="broge-about__btn broge-about__btn--primary" href="<?php echo esc_url(home_url('/shop/')); ?>">
                        <?php esc_html_e('Shop Formal Footwear', 'dawp'); ?>
                    </a>
                    <a class="broge-about__btn broge-about__btn--ghost" href="<?php echo esc_url(home_url('/contact-us/')); ?>">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>
                </div>
                <p class="broge-about__hero-note"><?php esc_html_e('This page is about the store direction: a tighter formal footwear catalog, practical product notes, and customer policies that stay easy to find.', 'dawp'); ?></p>
            </div>
            <div class="broge-about__hero-story">
                <div class="broge-about__hero-media">
                    <img src="<?php echo esc_url($img_base . 'broge-hero-formal-shoes.png'); ?>"
                         alt="<?php esc_attr_e('Brown brogue dress shoes on a refined dark surface', 'dawp'); ?>"
                         loading="eager"
                         fetchpriority="high">
                    <div class="broge-about__hero-label">
                        <?php esc_html_e('Formal-first catalog direction with clear fit, finish, shipping, and return details.', 'dawp'); ?>
                    </div>
                </div>
                <div class="broge-about__hero-points" aria-label="<?php esc_attr_e('Broge Shoes store highlights', 'dawp'); ?>">
                    <div class="broge-about__hero-point">
                        <strong><?php esc_html_e('03', 'dawp'); ?></strong>
                        <span><?php esc_html_e('Core categories', 'dawp'); ?></span>
                    </div>
                    <div class="broge-about__hero-point">
                        <strong><?php esc_html_e('30', 'dawp'); ?></strong>
                        <span><?php esc_html_e('Day eligible returns', 'dawp'); ?></span>
                    </div>
                    <div class="broge-about__hero-point">
                        <strong><?php esc_html_e('PST', 'dawp'); ?></strong>
                        <span><?php esc_html_e('Support hours', 'dawp'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="broge-about__section broge-about__intro" aria-labelledby="broge-story-title">
        <div class="broge-about__container broge-about__split">
            <div class="broge-about__split-media">
                <img src="<?php echo esc_url($img_base . 'broge-work-events.png'); ?>"
                     alt="<?php esc_attr_e('Formal dress shoes arranged with business outfit details', 'dawp'); ?>"
                     loading="lazy">
            </div>
            <div class="broge-about__content">
                <p class="broge-about__eyebrow broge-about__eyebrow--dark"><?php esc_html_e('Our Focus', 'dawp'); ?></p>
                <h2 id="broge-story-title"><?php esc_html_e('A polished men\'s footwear store with a clear formal niche.', 'dawp'); ?></h2>
                <p><?php esc_html_e('Broge Shoes was built for customers who want dress footwear that feels refined, practical, and easy to understand. Instead of acting like a general footwear marketplace, we keep the store centered on formal silhouettes, polished finishes, brogue-inspired details, and suit-friendly styling.', 'dawp'); ?></p>
                <p><?php esc_html_e('Our product direction is simple: offer shoes that support workdays, weddings, evening events, business casual outfits, and smart everyday presentation while keeping product information and customer policies visible.', 'dawp'); ?></p>
            </div>
        </div>
    </section>

    <section class="broge-about__section" aria-labelledby="broge-categories-title">
        <div class="broge-about__container">
            <div class="broge-about__section-head">
                <p class="broge-about__eyebrow broge-about__eyebrow--dark"><?php esc_html_e('What We Offer', 'dawp'); ?></p>
                <h2 id="broge-categories-title"><?php esc_html_e('Three categories. One refined wardrobe purpose.', 'dawp'); ?></h2>
                <p><?php esc_html_e('Every visible category stays within the men\'s formal footwear direction described for Broge Shoes.', 'dawp'); ?></p>
            </div>
            <div class="broge-about__grid">
                <?php foreach ($categories as $category) : ?>
                    <article class="broge-about__card">
                        <h3><?php echo esc_html($category['title']); ?></h3>
                        <p><?php echo esc_html($category['copy']); ?></p>
                        <a class="broge-about__card-link" href="<?php echo esc_url($category['url']); ?>">
                            <?php esc_html_e('Shop style', 'dawp'); ?>
                        </a>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="broge-about__section broge-about__dark" aria-labelledby="broge-values-title">
        <div class="broge-about__container broge-about__care">
            <div class="broge-about__content">
                <p class="broge-about__eyebrow"><?php esc_html_e('Our Standards', 'dawp'); ?></p>
                <h2 id="broge-values-title"><?php esc_html_e('Classy style, clear information, practical support.', 'dawp'); ?></h2>
                <p><?php esc_html_e('We describe products carefully, especially material and finish details. Premium material, construction, or craft claims should only appear when verified by product data.', 'dawp'); ?></p>
            </div>
            <div class="broge-about__grid">
                <?php foreach ($values as $value) : ?>
                    <article class="broge-about__card">
                        <h3><?php echo esc_html($value['title']); ?></h3>
                        <p><?php echo esc_html($value['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="broge-about__section broge-about__trust" aria-labelledby="broge-trust-title">
        <div class="broge-about__container">
            <div class="broge-about__section-head">
                <p class="broge-about__eyebrow broge-about__eyebrow--dark"><?php esc_html_e('Shop With Clarity', 'dawp'); ?></p>
                <h2 id="broge-trust-title"><?php esc_html_e('The details customers need before ordering dress shoes.', 'dawp'); ?></h2>
                <p><?php esc_html_e('Dress footwear should be easy to evaluate. We focus on practical product notes and policy pages that help customers choose, track, and return eligible items with confidence.', 'dawp'); ?></p>
            </div>
            <div class="broge-about__trust-grid">
                <?php foreach ($trust_items as $item) : ?>
                    <div class="broge-about__trust-item"><?php echo esc_html($item); ?></div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="broge-about__section broge-about__dark" aria-labelledby="broge-support-title">
        <div class="broge-about__container broge-about__care">
            <div class="broge-about__content">
                <p class="broge-about__eyebrow"><?php esc_html_e('Customer Support', 'dawp'); ?></p>
                <h2 id="broge-support-title"><?php esc_html_e('Support for sizing, orders, shipping, and returns.', 'dawp'); ?></h2>
                <p><?php esc_html_e('If you need help choosing a style, reviewing fit information, tracking an order, or starting an eligible return, contact our support team during our Monday-Friday, 9:00 AM-5:00 PM PST business hours.', 'dawp'); ?></p>
                <p>
                    <strong><?php esc_html_e('Email:', 'dawp'); ?></strong>
                    <a href="mailto:support@brogeshoes.com">support@brogeshoes.com</a><br>
                    <strong><?php esc_html_e('Business Hours:', 'dawp'); ?></strong>
                    <?php esc_html_e('Monday-Friday, 9:00 AM-5:00 PM PST', 'dawp'); ?>
                </p>
                <div class="broge-about__actions">
                    <a class="broge-about__btn broge-about__btn--primary" href="<?php echo esc_url(home_url('/shipping-policy/')); ?>">
                        <?php esc_html_e('Shipping Policy', 'dawp'); ?>
                    </a>
                    <a class="broge-about__btn broge-about__btn--ghost" href="<?php echo esc_url(home_url('/refund-return-policy/')); ?>">
                        <?php esc_html_e('Return Policy', 'dawp'); ?>
                    </a>
                </div>
            </div>
            <article class="broge-about__care-card">
                <img src="<?php echo esc_url($img_base . 'broge-customer-care.png'); ?>"
                     alt="<?php esc_attr_e('Dress shoes with customer care and product guidance details', 'dawp'); ?>"
                     loading="lazy">
                <div class="broge-about__care-card-body">
                    <p><?php esc_html_e('Eligible footwear must be unworn, undamaged, free of outdoor wear, stains, heavy creasing, or sole marks, and returned with original packaging where applicable within 30 days of delivery.', 'dawp'); ?></p>
                    <p><?php esc_html_e('Orders placed before 5:00 PM Pacific Standard Time begin processing the same business day. Orders placed after the cutoff begin processing on the next business day.', 'dawp'); ?></p>
                </div>
            </article>
        </div>
    </section>
</div>
