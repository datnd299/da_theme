<?php
/**
 * Shop By Categories - ShopGraphicshirt
 */
get_header(); ?>
<section class="sgs-home sgs-page">
<style>
.sgs-st-hero{background:linear-gradient(90deg,rgba(11,31,58,.96) 0%,rgba(11,31,58,.84) 42%,rgba(11,31,58,.58) 100%),url('<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/hero/shop-theme-hero-background.png') center right/cover no-repeat,var(--navy);color:var(--white);padding:clamp(60px,8vw,100px) clamp(24px,4vw,64px);text-align:center}
.sgs-st-hero__inner{max-width:680px;margin:0 auto}
.sgs-st-hero h1{margin:0;font-family:var(--font-heading);font-size:clamp(1.8rem,4vw,3rem);font-weight:800;letter-spacing:-.02em;line-height:1.05;color:var(--white)}
.sgs-st-hero p{max-width:540px;margin:14px auto 0;color:rgba(255,255,255,.8);font-size:.95rem;line-height:1.65}
.sgs-st-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;width:min(100% - 48px,1100px);margin:0 auto;padding:var(--section-gap,56px) 0}
.sgs-st-card{display:flex;flex-direction:column;align-items:center;text-align:center;padding:36px 20px;border:1px solid var(--line);border-radius:var(--radius);background:var(--white);transition:box-shadow 180ms,transform 180ms}
.sgs-st-card:hover{box-shadow:var(--shadow-sm);transform:translateY(-3px)}
.sgs-st-card__icon{font-size:2.4rem;margin-bottom:14px}
.sgs-st-card h3{margin:0;font-family:var(--font-heading);font-size:1.1rem;font-weight:700;color:var(--ink)}
.sgs-st-card p{margin:8px 0 16px;color:var(--muted);font-size:.85rem;line-height:1.5}
.sgs-st-card .sgs-btn{min-height:40px;font-size:.74rem;padding:0 18px}
@media(max-width:900px){.sgs-st-grid{grid-template-columns:repeat(2,1fr)}}
@media(max-width:640px){.sgs-st-grid{grid-template-columns:1fr}}
</style>
<div class="sgs-st-hero">
  <div class="sgs-st-hero__inner">
    <p class="sgs-eyebrow sgs-eyebrow--light">Shop By Categories</p>
    <h1>Browse By Categories</h1>
    <p>Find patriotic apparel, seasonal gifts, and accessories by category.</p>
  </div>
</div>
<div class="sgs-st-grid">
  <?php
  $categories = [
    ['Flag', 'American flag tees, hats, and more.', 'flag', '🏴'],
    ['Hoodie', 'Premium patriot hoodies.', 'hoodie', '🧥'],
    ['Jacket', 'Bomber jackets and outerwear.', 'jacket', '🧥'],
    ['T-Shirt', 'Graphic tees for every patriot.', 't-shirt', '👕'],
    ['Cap', 'Patriotic caps and snapbacks.', 'cap', '🧢'],
  ];
  foreach ($categories as $t): ?>
  <a href="/product-category/<?php echo $t[2]; ?>/" class="sgs-st-card">
    <span class="sgs-st-card__icon"><?php echo $t[3]; ?></span>
    <h3><?php echo $t[0]; ?></h3>
    <p><?php echo $t[1]; ?></p>
    <span class="sgs-btn sgs-btn--primary">Shop Now</span>
  </a>
  <?php endforeach; ?>
</div>
</section>
<?php get_footer(); ?>
