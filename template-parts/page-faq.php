<?php
/**
 * Frequently Asked Questions - ShopGraphicshirt
 */
$sgs_faq_hero_bg = sprintf(
  "--sgs-faq-hero-bg:url('%s');--sgs-faq-hero-bg-mobile:url('%s')",
  esc_url(dawp_theme_cdn_image_url('assets/img/hero/support-hero-background.png', 1600, 760)),
  esc_url(dawp_theme_cdn_image_url('assets/img/hero/support-hero-background.png', 720, 600))
);
get_header(); ?>
<section class="sgs-home sgs-page">

<style>
.sgs-faq-hero{background:linear-gradient(90deg,rgba(11,31,58,.96) 0%,rgba(11,31,58,.84) 42%,rgba(11,31,58,.58) 100%),var(--sgs-faq-hero-bg) center right/cover no-repeat,var(--navy);color:var(--white);padding:clamp(72px,9vw,120px) clamp(24px,4vw,64px);text-align:center}
.sgs-faq-hero__inner{max-width:760px;margin:0 auto}
.sgs-faq-hero h1{margin:0;font-family:var(--font-heading);font-size:clamp(2rem,4.5vw,3.5rem);font-weight:800;letter-spacing:-.02em;line-height:1.05;color:var(--white)}
.sgs-faq-hero p{max-width:640px;margin:20px auto 0;color:rgba(255,255,255,.82);font-size:clamp(.95rem,1.3vw,1.1rem);line-height:1.7;font-family:var(--font-body)}
.sgs-faq-hero .sgs-faq-hero__meta{margin-top:14px;color:var(--gold);font-family:var(--font-heading);font-size:.85rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase}
.sgs-faq-wrap{width:min(100% - 48px,880px);margin:0 auto;padding:var(--section-gap,72px) 0}
.sgs-faq-list{display:grid;gap:10px}
.sgs-faq-item{border:1px solid var(--line);border-radius:var(--radius);background:var(--white);overflow:hidden;transition:border-color 200ms}
.sgs-faq-item:hover{border-color:var(--red)}
.sgs-faq-item[open]{border-color:var(--red)}
.sgs-faq-item summary{display:flex;align-items:center;justify-content:space-between;gap:14px;padding:18px 22px;cursor:pointer;font-family:var(--font-heading);font-size:.98rem;font-weight:700;color:var(--ink);line-height:1.35;list-style:none;user-select:none;-webkit-user-select:none}
.sgs-faq-item summary::-webkit-details-marker{display:none}
.sgs-faq-item summary::marker{content:""}
.sgs-faq-item summary::after{content:"+";font-size:1.3rem;font-weight:600;color:var(--red);flex-shrink:0;transition:transform 250ms}
.sgs-faq-item[open] summary::after{content:"-"}
.sgs-faq-item__answer{padding:0 22px 20px;color:var(--muted);font-size:.92rem;line-height:1.7}
.sgs-faq-item__answer p{margin:0}
.sgs-faq-item__answer a{color:var(--red);text-decoration:underline;text-underline-offset:2px}
.sgs-faq-item__answer a:hover{color:#8c1233}
.sgs-faq-cta{background:var(--antique);text-align:center;padding:clamp(48px,6vw,72px) clamp(24px,4vw,64px);border-top:3px solid var(--gold)}
.sgs-faq-cta__inner{max-width:580px;margin:0 auto}
.sgs-faq-cta h2{margin:0;font-family:var(--font-heading);font-size:clamp(1.3rem,2.5vw,1.8rem);font-weight:700;color:var(--ink);line-height:1.15}
.sgs-faq-cta p{margin:14px 0 24px;color:var(--muted);font-size:.95rem;line-height:1.6}
.sgs-faq-cta .sgs-btn{display:inline-flex;align-items:center;justify-content:center;min-height:46px;padding:0 28px;border:2px solid var(--red);border-radius:4px;background:var(--red);color:var(--white)!important;font-family:var(--font-heading);font-size:.82rem;font-weight:800;letter-spacing:.03em;text-decoration:none;text-transform:uppercase;transition:transform 200ms,background-color 200ms,border-color 200ms,box-shadow 200ms}
.sgs-faq-cta .sgs-btn:hover{transform:translateY(-2px);background:#8c1233;border-color:#8c1233;box-shadow:0 4px 14px rgba(179,25,66,.28)}
.sgs-faq-cta .sgs-btn:focus-visible{outline:3px solid rgba(179,25,66,.28);outline-offset:3px}
@media(max-width:640px){.sgs-faq-hero{background-image:linear-gradient(180deg,rgba(11,31,58,.76) 0%,rgba(11,31,58,.96) 100%),var(--sgs-faq-hero-bg-mobile,var(--sgs-faq-hero-bg))}.sgs-faq-item summary{padding:16px 18px;font-size:.92rem}.sgs-faq-item__answer{padding:0 18px 18px;font-size:.88rem}.sgs-faq-cta .sgs-btn{width:100%}}
</style>

<div class="sgs-faq-hero" style="<?php echo esc_attr($sgs_faq_hero_bg); ?>">
  <div class="sgs-faq-hero__inner">
    <p class="sgs-eyebrow sgs-eyebrow--light">FAQ</p>
    <h1>Frequently Asked Questions</h1>
    <p class="sgs-faq-hero__meta">Last Updated: July 5 2026</p>
    <p>Find clear answers about ShopGraphicshirt orders, free U.S. shipping on orders over $49, tracking, returns, refunds, checkout security, and customer support.</p>
  </div>
</div>

<div class="sgs-faq-wrap">
  <div class="sgs-faq-list">
    <?php foreach (dawp_get_faq_items() as $faq_item) : ?>
      <details class="sgs-faq-item">
        <summary><?php echo esc_html($faq_item['question']); ?></summary>
        <div class="sgs-faq-item__answer">
          <p><?php echo wp_kses_post($faq_item['answer']); ?></p>
        </div>
      </details>
    <?php endforeach; ?>
  </div>
</div>

<div class="sgs-faq-cta">
  <div class="sgs-faq-cta__inner">
    <h2>Still Have Questions?</h2>
    <p>Our support team is ready to help with product selection, order questions, or anything else. We typically respond within one business day.</p>
    <a class="sgs-btn sgs-btn--primary" href="/contact-us/">Contact Us</a>
  </div>
</div>

</section>
<?php get_footer(); ?>
