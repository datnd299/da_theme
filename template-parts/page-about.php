<?php
/**
 * About Us — Veterangift
 * Patriotic apparel & gift brand.
 */
$sgs_about_hero_bg = sprintf(
  "--about-hero-bg:url('%s');--about-hero-bg-mobile:url('%s')",
  esc_url(dawp_theme_cdn_image_url('assets/img/about/about-hero-studio-apparel-v2.png', 1600, 760)),
  esc_url(dawp_theme_cdn_image_url('assets/img/about/about-hero-studio-apparel-v2.png', 720, 760))
);
get_header(); ?>
<section class="sgs-home sgs-page">

<style>
.sgs-page-hero{position:relative;isolation:isolate;background-color:var(--navy);background-image:var(--about-hero-bg);background-size:cover;background-position:center;color:var(--white);padding:clamp(104px,12vw,166px) clamp(24px,4vw,64px) clamp(82px,9vw,122px);overflow:hidden}
.sgs-page-hero:before{content:"";position:absolute;inset:0;z-index:-2;background:inherit;background-size:cover;background-position:center;transform:scale(1.01)}
.sgs-page-hero:after{content:"";position:absolute;inset:0;z-index:-1;background:linear-gradient(90deg,rgba(11,31,58,.92),rgba(11,31,58,.78) 34%,rgba(11,31,58,.48) 58%,rgba(11,31,58,.18)),linear-gradient(180deg,rgba(11,31,58,.38),rgba(11,31,58,.18) 42%,rgba(11,31,58,.82))}
.sgs-page-hero__inner{width:min(100%,1200px);max-width:1200px;margin:0 auto;position:relative;z-index:1}
.sgs-page-hero__copy{max-width:620px}
.sgs-page-hero h1{margin:0;font-family:var(--font-heading);font-size:clamp(2rem,4.5vw,3.5rem);font-weight:800;letter-spacing:-.02em;line-height:1.05;color:var(--white)}
.sgs-page-hero p{max-width:620px;margin:20px 0 0;color:rgba(255,255,255,.84);font-size:clamp(.95rem,1.3vw,1.1rem);line-height:1.7}
.sgs-about-stats{display:grid;grid-template-columns:repeat(3,1fr);gap:1px;width:min(100% - 48px,960px);margin:-36px auto 0;position:relative;z-index:2;overflow:hidden;border:1px solid rgba(11,31,58,.1);border-radius:var(--radius);background:rgba(11,31,58,.1);box-shadow:0 18px 40px rgba(11,31,58,.14)}
.sgs-about-stat{padding:22px 20px;background:var(--white);text-align:center}
.sgs-about-stat strong{display:block;font-family:var(--font-heading);font-size:clamp(1.3rem,2vw,1.7rem);font-weight:800;color:var(--navy);line-height:1}
.sgs-about-stat span{display:block;margin-top:8px;color:var(--muted);font-size:.82rem;font-weight:700;letter-spacing:.04em;text-transform:uppercase}
.sgs-pg{width:min(100% - 48px,1200px);margin:0 auto;padding:var(--section-gap,72px) 0}
.sgs-pg--surface{width:100%;max-width:none;padding-inline:clamp(24px,4vw,64px);background:var(--antique)}
.sgs-pg__center{max-width:640px;margin:0 auto 36px;text-align:center}
.sgs-pg__center h2{margin:0;font-family:var(--font-heading);font-size:clamp(1.4rem,2.5vw,2rem);font-weight:700;letter-spacing:-.01em;line-height:1.1;color:var(--ink)}
.sgs-card-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px}
.sgs-card{padding:32px 24px;border:1px solid var(--line);border-radius:var(--radius);background:var(--white);text-align:center;transition:box-shadow 180ms,transform 180ms}
.sgs-card:hover{box-shadow:var(--shadow-sm);transform:translateY(-3px)}
.sgs-card__icon{display:grid;place-items:center;width:52px;height:52px;border-radius:var(--radius);background:var(--navy);color:var(--white);font-size:22px;margin:0 auto 18px}
.sgs-card__icon i{line-height:1}
.sgs-card h3{margin:0;font-family:var(--font-heading);font-size:1.2rem;font-weight:700;color:var(--ink)}
.sgs-card p{margin:10px 0 0;color:var(--muted);font-size:.9rem;line-height:1.6}
.sgs-card--4{grid-template-columns:repeat(4,1fr)}
.sgs-story{display:grid;grid-template-columns:minmax(0,.92fr) minmax(0,1.08fr);gap:52px;align-items:center}
.sgs-story__content h2{margin:0 0 16px;font-family:var(--font-heading);font-size:clamp(1.4rem,2.5vw,2rem);font-weight:700;letter-spacing:-.01em;line-height:1.1;color:var(--ink)}
.sgs-story__content p{margin:14px 0 0;color:var(--muted);font-size:.95rem;line-height:1.7}
.sgs-story__content p:first-of-type{margin-top:0}
.sgs-story__visual{position:relative;border-radius:var(--radius);background:var(--antique);min-height:360px;overflow:hidden;box-shadow:0 18px 40px rgba(11,31,58,.12)}
.sgs-story__visual img{width:100%;height:100%;min-height:360px;object-fit:cover}
.sgs-story__visual:after{content:"";position:absolute;inset:0;background:linear-gradient(180deg,rgba(11,31,58,0) 48%,rgba(11,31,58,.22));pointer-events:none}
.sgs-story__badge{position:absolute;left:18px;bottom:18px;z-index:1;display:inline-flex;align-items:center;gap:10px;padding:10px 14px;border-radius:var(--radius);background:rgba(255,255,255,.92);color:var(--navy);font-family:var(--font-heading);font-size:.86rem;font-weight:800;box-shadow:0 10px 24px rgba(11,31,58,.18)}
.sgs-story__badge i{color:var(--red)}
.sgs-cta-block{text-align:center;max-width:580px;margin:0 auto}
.sgs-cta-block h2{margin:0;font-family:var(--font-heading);font-size:clamp(1.3rem,2.5vw,1.8rem);font-weight:700;color:var(--ink);line-height:1.15}
.sgs-cta-block p{margin:14px 0 24px;color:var(--muted);font-size:.95rem;line-height:1.6}
.sgs-cta-block .sgs-btn{display:inline-flex;align-items:center;justify-content:center;min-height:48px;padding:0 30px;border:2px solid var(--red);border-radius:var(--radius);background:var(--red);color:var(--white)!important;font-family:var(--font-heading);font-size:.82rem;font-weight:800;letter-spacing:.04em;text-decoration:none;text-transform:uppercase;box-shadow:0 3px 10px rgba(179,25,66,.25);transition:transform 180ms,background-color 180ms,border-color 180ms,box-shadow 180ms}
.sgs-cta-block .sgs-btn:hover{transform:translateY(-2px);background:#8c1233;border-color:#8c1233;color:var(--white)!important;box-shadow:0 6px 16px rgba(179,25,66,.32)}
.sgs-cta-block .sgs-btn:focus-visible{outline:3px solid rgba(179,25,66,.28);outline-offset:3px}
@media(max-width:1024px){.sgs-card-grid{grid-template-columns:repeat(2,1fr)}.sgs-card--4{grid-template-columns:repeat(2,1fr)}.sgs-story{grid-template-columns:1fr;gap:28px}.sgs-story__visual{min-height:280px;order:-1}.sgs-story__visual img{min-height:280px}}
@media(max-width:640px){.sgs-page-hero{background-image:var(--about-hero-bg-mobile,var(--about-hero-bg));background-position:center;padding-top:92px;text-align:center}.sgs-page-hero:after{background:linear-gradient(180deg,rgba(11,31,58,.86),rgba(11,31,58,.58) 52%,rgba(11,31,58,.84))}.sgs-page-hero p{margin-inline:auto}.sgs-about-stats{grid-template-columns:1fr;width:min(100% - 40px,960px);margin-top:-28px}.sgs-about-stat{padding:18px 16px}.sgs-pg{width:100%;padding:52px 0}.sgs-pg--surface{padding-inline:0}.sgs-pg__center{width:min(100% - 40px,640px);margin-bottom:28px}.sgs-card-grid,.sgs-card--4{display:flex;grid-template-columns:none;gap:14px;overflow-x:auto;scroll-snap-type:x mandatory;scroll-padding-inline:20px;padding:0 20px 8px;-webkit-overflow-scrolling:touch}.sgs-card-grid::-webkit-scrollbar{display:none}.sgs-card-grid{scrollbar-width:none}.sgs-card{flex:0 0 min(82vw,360px);scroll-snap-align:center;min-height:244px;display:flex;flex-direction:column;justify-content:center}.sgs-card:hover{box-shadow:none;transform:none}.sgs-story{width:min(100% - 40px,1200px);margin-inline:auto}.sgs-story__badge{left:14px;right:14px;justify-content:center}.sgs-cta-block{width:min(100% - 40px,580px)}.sgs-cta-block .sgs-btn{width:100%}}
</style>

<div class="sgs-page-hero" style="<?php echo esc_attr($sgs_about_hero_bg); ?>">
  <div class="sgs-page-hero__inner">
    <div class="sgs-page-hero__copy">
      <p class="sgs-eyebrow sgs-eyebrow--light">About Us</p>
      <h1>Patriotic Apparel And Gifts Made For American Pride</h1>
      <p>Veterangift is an American patriotic apparel and custom gift brand built for proud Americans who want meaningful products that carry classic style and pride.</p>
    </div>
  </div>
</div>

<div class="sgs-about-stats" aria-label="<?php esc_attr_e('Veterangift brand highlights', 'veterangift'); ?>">
  <div class="sgs-about-stat">
    <strong>Premium</strong>
    <span>Apparel Quality</span>
  </div>
  <div class="sgs-about-stat">
    <strong>Custom</strong>
    <span>Gift Options</span>
  </div>
  <div class="sgs-about-stat">
    <strong>USA</strong>
    <span>Pride Inspired</span>
  </div>
</div>

<div class="sgs-pg">
  <div class="sgs-card-grid">
    <div class="sgs-card">
      <div class="sgs-card__icon" aria-hidden="true"><i class="fas fa-bullseye"></i></div>
      <h3>Our Mission</h3>
      <p>To provide every American with a simple, affordable, and meaningful way to wear their pride.</p>
    </div>
    <div class="sgs-card">
      <div class="sgs-card__icon" aria-hidden="true"><i class="fas fa-eye"></i></div>
      <h3>Our Vision</h3>
      <p>To become the most trusted patriotic apparel destination for proud Americans nationwide.</p>
    </div>
    <div class="sgs-card">
      <div class="sgs-card__icon" aria-hidden="true"><i class="fas fa-handshake"></i></div>
      <h3>Our Promise</h3>
      <p>Premium quality, clear product information, reliable delivery, and support that actually helps you find the right products.</p>
    </div>
  </div>
</div>

<div class="sgs-pg sgs-pg--surface">
  <div class="sgs-pg__center">
    <p class="sgs-eyebrow">Why Shop With Us</p>
    <h2>What Sets Us Apart</h2>
  </div>
  <div class="sgs-card-grid sgs-card--4">
    <div class="sgs-card">
      <div class="sgs-card__icon" aria-hidden="true"><i class="fas fa-shirt"></i></div>
      <h3>Premium Quality</h3>
      <p>Heavy-weight cotton, durable prints, and comfortable fits made to last.</p>
    </div>
    <div class="sgs-card">
      <div class="sgs-card__icon" aria-hidden="true"><i class="fas fa-palette"></i></div>
      <h3>Unique Designs</h3>
      <p>Original patriotic graphics you won't find anywhere else.</p>
    </div>
    <div class="sgs-card">
      <div class="sgs-card__icon" aria-hidden="true"><i class="fas fa-box"></i></div>
      <h3>Easy Ordering</h3>
      <p>Simple checkout, tracking included, and reliable delivery to your door.</p>
    </div>
    <div class="sgs-card">
      <div class="sgs-card__icon" aria-hidden="true"><i class="fas fa-gift"></i></div>
      <h3>Personalization</h3>
      <p>Custom name options for meaningful gifts.</p>
    </div>
  </div>
</div>

<div class="sgs-pg">
  <div class="sgs-story">
    <div class="sgs-story__content">
      <p class="sgs-eyebrow">Our Story</p>
      <h2>Built For Proud American Style</h2>
      <p>Veterangift was created because finding quality patriotic apparel shouldn't be complicated. Too many stores feel generic, political, or low-quality.</p>
      <p>We started this brand to change that, focusing on premium graphic tees, bomber jackets, hats, and accessories that actually look good, feel great, and celebrate American pride.</p>
      <p>Today, we help thousands of Americans express their pride with products that carry meaning.</p>
    </div>
    <div class="sgs-story__visual">
      <?php echo dawp_theme_image('assets/img/about/about-story-packing-v2.png', __('Patriotic apparel and custom gifts arranged on a premium packing table', 'veterangift'), 900, 650, [[480, 347], [720, 520], [900, 650], [1200, 867]], '(max-width: 1024px) calc(100vw - 40px), 600px'); ?>
      <span class="sgs-story__badge"><i class="fas fa-flag-usa" aria-hidden="true"></i> American Pride Since Day One</span>
    </div>
  </div>
</div>

<div class="sgs-pg sgs-pg--surface">
  <div class="sgs-cta-block">
    <h2>Have Questions? We're Here To Help</h2>
    <p>Our team is ready to assist you with product selection, orders, or any questions you may have.</p>
    <a class="sgs-btn sgs-btn--primary" href="<?php echo esc_url(home_url('/contact-us/')); ?>">Contact Us</a>
  </div>
</div>

</section>
<?php get_footer(); ?>
