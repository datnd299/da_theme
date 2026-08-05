<?php
/**
 * Shop By Categories - ShopGraphicShirt
 */
$sgs_st_hero_bg = sprintf(
  "--sgs-st-hero-bg:url('%s');--sgs-st-hero-bg-mobile:url('%s')",
  esc_url(dawp_theme_cdn_image_url('assets/img/hero/shop-theme-hero-background.png', 1600, 760)),
  esc_url(dawp_theme_cdn_image_url('assets/img/hero/shop-theme-hero-background.png', 720, 520))
);
get_header(); ?>
<section class="sgs-home sgs-page">
<style>
.sgs-st-hero{background:linear-gradient(90deg,rgba(11,31,58,.96) 0%,rgba(11,31,58,.84) 42%,rgba(11,31,58,.58) 100%),var(--sgs-st-hero-bg) center right/cover no-repeat,var(--navy);color:var(--white);padding:clamp(60px,8vw,100px) clamp(24px,4vw,64px);text-align:center}
.sgs-st-hero__inner{max-width:680px;margin:0 auto}
.sgs-st-hero h1{margin:0;font-family:var(--font-heading);font-size:clamp(1.8rem,4vw,3rem);font-weight:800;letter-spacing:-.02em;line-height:1.05;color:var(--white)}
.sgs-st-hero p{max-width:540px;margin:14px auto 0;color:rgba(255,255,255,.8);font-size:.95rem;line-height:1.65}
.sgs-st-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;width:min(100% - 48px,1100px);margin:0 auto;padding:var(--section-gap,56px) 0}
.sgs-st-card{display:flex;flex-direction:column;align-items:center;text-align:center;padding:36px 20px;border:1px solid var(--line);border-radius:var(--radius);background:var(--white);transition:box-shadow 180ms,transform 180ms}
.sgs-st-card:hover{box-shadow:var(--shadow-sm);transform:translateY(-3px)}
.sgs-st-card__icon{display:grid;width:42px;height:42px;place-items:center;margin-bottom:14px;border-radius:50%;background:var(--antique);color:var(--red);font-family:var(--font-heading);font-size:1.25rem;font-weight:900}
.sgs-st-card h3{margin:0;font-family:var(--font-heading);font-size:1.1rem;font-weight:700;color:var(--ink)}
.sgs-st-card p{margin:8px 0 18px;color:var(--muted);font-size:.85rem;line-height:1.5}
.sgs-st-card .sgs-st-card__cta{display:inline-flex;align-items:center;justify-content:center;gap:8px;min-height:38px;padding:0 10px 0 16px;border:1px solid rgba(179,25,66,.18);border-radius:999px;background:linear-gradient(135deg,var(--red) 0%,#8c1233 100%);color:var(--white);font-family:var(--font-heading);font-size:.7rem;font-weight:800;letter-spacing:.04em;line-height:1;text-transform:uppercase;text-decoration:none;box-shadow:0 8px 18px rgba(179,25,66,.2);transition:transform 180ms,box-shadow 180ms,background 180ms}
.sgs-st-card .sgs-st-card__cta::after{content:"\2192";display:grid;width:22px;height:22px;place-items:center;border-radius:50%;background:rgba(255,255,255,.18);color:var(--white);font-family:var(--font-body);font-size:.9rem;font-weight:700;line-height:1;transition:transform 180ms,background 180ms}
.sgs-st-card:hover .sgs-st-card__cta{background:linear-gradient(135deg,#8c1233 0%,var(--navy) 100%);box-shadow:0 14px 28px rgba(11,31,58,.18),0 8px 18px rgba(179,25,66,.24);transform:translateY(-1px)}
.sgs-st-card:hover .sgs-st-card__cta::after{background:rgba(255,255,255,.26);transform:translateX(2px)}
.sgs-st-card:focus-visible{outline:3px solid rgba(179,25,66,.24);outline-offset:4px}
@media(max-width:900px){.sgs-st-grid{grid-template-columns:repeat(2,1fr)}}
@media(max-width:640px){.sgs-st-hero{background-image:linear-gradient(180deg,rgba(11,31,58,.76) 0%,rgba(11,31,58,.96) 100%),var(--sgs-st-hero-bg-mobile,var(--sgs-st-hero-bg))}.sgs-st-grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:12px;width:min(100% - 28px,520px);padding:36px 0}.sgs-st-card{padding:22px 10px;min-width:0}.sgs-st-card:hover{transform:none}.sgs-st-card__icon{width:36px;height:36px;margin-bottom:10px;font-size:1rem}.sgs-st-card h3{font-size:.88rem;line-height:1.25}.sgs-st-card p{margin:6px 0 12px;font-size:.75rem;line-height:1.35}.sgs-st-card .sgs-st-card__cta{gap:6px;min-height:32px;padding:0 7px 0 12px;font-size:.62rem;box-shadow:0 6px 14px rgba(179,25,66,.18)}.sgs-st-card .sgs-st-card__cta::after{width:18px;height:18px;font-size:.78rem}}
</style>
<div class="sgs-st-hero" style="<?php echo esc_attr($sgs_st_hero_bg); ?>">
  <div class="sgs-st-hero__inner">
    <p class="sgs-eyebrow sgs-eyebrow--light">Shop By Categories</p>
    <h1>Browse By Categories</h1>
    <p>Find patriotic apparel, seasonal gifts, and accessories by category.</p>
  </div>
</div>
<div class="sgs-st-grid">
  <?php
  $categories = [
    ['American Flag Tees', 'American flag tees, hats, and more.', 'american-flag-tees', 'AF'],
    ['Bomber Jackets', 'Bomber jackets and outerwear.', 'bomber-jackets', 'BJ'],
    ['Hats & Beanies', 'Patriotic caps and snapbacks.', 'hats-beanies', 'HB'],
    ['Premium T-Shirts', 'Graphic tees for every patriot.', 'premium-t-shirts', 'TS'],
    ['Patches & Pins', 'Accessories for everyday American pride.', 'patches-pins', 'PP'],
    ['Best Sellers', 'Customer-favorite patriotic apparel and gifts.', 'best-sellers', 'BS'],
  ];
  foreach ($categories as $t): ?>
  <a href="<?php echo esc_url(dawp_product_category_url($t[2])); ?>" class="sgs-st-card">
    <span class="sgs-st-card__icon"><?php echo esc_html($t[3]); ?></span>
    <h3><?php echo esc_html($t[0]); ?></h3>
    <p><?php echo esc_html($t[1]); ?></p>
    <span class="sgs-st-card__cta">Shop Now</span>
  </a>
  <?php endforeach; ?>
</div>
</section>
<?php get_footer(); ?>
