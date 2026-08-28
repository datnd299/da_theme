<?php
if (!defined('ABSPATH')) {
    exit;
}

$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
if (!$shop_url) {
    $shop_url = home_url('/shop/');
}
?>
<style>
:root{
 --ink:#151515;--muted:#707070;--line:#e7e7e4;--paper:#fff;
 --soft:#f5f5f2;--green:#405447;--max:1240px
}
*{box-sizing:border-box}
html{scroll-behavior:smooth}
body{margin:0;background:var(--paper);color:var(--ink);font-family:Inter,Geist,Arial,sans-serif;-webkit-font-smoothing:antialiased}
img{display:block;width:100%;height:100%;object-fit:cover}
a{text-decoration:none;color:inherit}
.container{width:min(calc(100% - 64px),var(--max));margin:auto}
.eyebrow{margin:0 0 14px;font-size:11px;line-height:1;font-weight:700;letter-spacing:.16em;text-transform:uppercase;color:var(--green)}
h1,h2,h3,p{margin-top:0}
h1{max-width:680px;margin-bottom:20px;font-size:clamp(40px,4.5vw,58px);line-height:1.04;letter-spacing:-.045em;font-weight:600}
h2{font-size:clamp(28px,3vw,38px);line-height:1.1;letter-spacing:-.035em;font-weight:600}
h3{font-size:20px;line-height:1.3;letter-spacing:-.02em}
p{font-size:15px;line-height:1.72;color:var(--muted)}
.button{display:inline-flex;align-items:center;min-height:46px;padding:0 19px;background:var(--ink);color:#fff;font-size:12px;font-weight:700;letter-spacing:.04em}
.button.light{background:#fff;color:var(--ink)}

/* 1. HERO */
.hero{padding:76px 0 52px}
.hero-grid{display:grid;grid-template-columns:1.05fr .95fr;gap:70px;align-items:end}
.hero-copy>p{max-width:560px;font-size:16px;margin-bottom:0}
.hero-note{max-width:350px;padding-left:24px;border-left:1px solid var(--line)}
.hero-note strong{display:block;margin-bottom:8px;font-size:14px}
.hero-note p{margin:0;font-size:14px}

/* 2. EDITORIAL IMAGE */
.editorial{width:min(calc(100% - 64px),var(--max));height:430px;margin:auto;overflow:hidden;background:var(--soft)}
.editorial img{object-position:center 53%}

/* 3. BRAND */
.brand{padding:92px 0}
.brand-grid{display:grid;grid-template-columns:380px 1fr;gap:100px}
.brand h2{max-width:360px}
.brand-copy{max-width:650px}
.brand-copy p{font-size:16px}
.brand-copy p:last-child{margin-bottom:0}

/* 4. MISSION / VISION */
.mv-wrap{padding:0 0 92px}
.mv{display:grid;grid-template-columns:1fr 1fr;border-top:1px solid var(--line);border-bottom:1px solid var(--line)}
.mv-item{padding:42px 52px 42px 0}
.mv-item+ .mv-item{padding-left:52px;border-left:1px solid var(--line)}
.mv-number{display:block;margin-bottom:38px;color:#a0a0a0;font-size:12px}
.mv h3{max-width:430px;margin-bottom:14px;font-size:25px;font-weight:600}
.mv p{max-width:480px;margin-bottom:0}

/* 5. VALUES */
.values-section{padding:82px 0;background:var(--soft)}
.values-head{display:grid;grid-template-columns:380px 1fr;gap:100px;margin-bottom:46px}
.values-head p{max-width:540px;margin:0}
.values{display:grid;grid-template-columns:repeat(3,1fr);background:#fff}
.value{padding:30px;border-right:1px solid var(--line)}
.value:last-child{border:0}
.value .num{display:block;margin-bottom:44px;color:#999;font-size:11px}
.value h3{margin-bottom:9px;font-size:17px}
.value p{margin:0;font-size:14px}

/* 6. CTA */
.end{padding:84px 0}
.cta{display:grid;grid-template-columns:1fr auto;gap:40px;align-items:end;padding:46px 50px;background:var(--green);color:#fff}
.cta .eyebrow{color:#cbd4cd}
.cta h2{max-width:560px;margin-bottom:10px}
.cta p{max-width:550px;margin-bottom:0;color:#d6ddd8}

@media(max-width:900px){
 .hero-grid,.brand-grid,.values-head{grid-template-columns:1fr;gap:30px}
 .hero-note{padding-left:0;border:0}
 .brand-grid{gap:24px}
 .mv{grid-template-columns:1fr}
 .mv-item,.mv-item+ .mv-item{padding:34px 0;border-left:0}
 .mv-item+ .mv-item{border-top:1px solid var(--line)}
 .values{grid-template-columns:1fr}
 .value{border-right:0;border-bottom:1px solid var(--line)}
 .value:last-child{border-bottom:0}
 .cta{grid-template-columns:1fr}
}
@media(max-width:640px){
 .container,.editorial{width:calc(100% - 36px)}
 .hero{padding:54px 0 38px}
 .editorial{height:300px}
 .brand{padding:64px 0}
 .mv-wrap{padding-bottom:64px}
 .values-section{padding:60px 0}
 .value .num{margin-bottom:26px}
 .end{padding:60px 0}
 .cta{padding:34px 24px}
}
</style>

<section class="hero">
 <div class="container hero-grid">
  <div class="hero-copy">
   <div class="eyebrow">About Reluxwatches</div>
   <h1>TIME, DESIGNED FOR MODERN LIFE.</h1>
   <p>Reluxwatches is a contemporary watch brand built around simplicity, versatility and thoughtful design.</p>
  </div>
  <div class="hero-note">
   <strong>A quieter approach to watches.</strong>
   <p>Modern pieces made to feel natural on the wrist and easy to wear every day.</p>
  </div>
 </div>
</section>

<section class="editorial">
 <?php
 echo function_exists('dawp_get_responsive_image')
     ? dawp_get_responsive_image(dawp_imagewatch_url('8.png'), 'Modern wristwatch', '', 1280, 956, 'lazy', '100vw')
     : '<img src="' . esc_url(dawp_imagewatch_url('8.png')) . '" alt="Modern wristwatch" loading="lazy" decoding="async">';
 ?>
</section>

<section class="brand">
 <div class="container brand-grid">
  <div>
   <div class="eyebrow">The Brand</div>
   <h2>LESS NOISE.<br>MORE INTENTION.</h2>
  </div>
  <div class="brand-copy">
   <p>Reluxwatches was created for people who appreciate watches without the unnecessary complexity. Our collections bring together clean proportions, considered details and an understated point of view.</p>
   <p>We believe the best watch is one that feels personal, works with your everyday style and stays relevant beyond a single season.</p>
  </div>
 </div>
</section>

<section class="mv-wrap">
 <div class="container">
  <div class="mv">
   <article class="mv-item">
    <span class="mv-number">01</span>
    <div class="eyebrow">Our Mission</div>
    <h3>Make good watch design easier to wear.</h3>
    <p>To offer modern, versatile timepieces through a simple and considered shopping experience.</p>
   </article>
   <article class="mv-item">
    <span class="mv-number">02</span>
    <div class="eyebrow">Our Vision</div>
    <h3>A modern destination for everyday watches.</h3>
    <p>To build a brand where design, individuality and everyday function come together naturally.</p>
   </article>
  </div>
 </div>
</section>

<section class="values-section">
 <div class="container">
  <div class="values-head">
   <div>
    <div class="eyebrow">What We Value</div>
    <h2>DESIGNED WITH PURPOSE.</h2>
   </div>
   <p>Three simple principles guide the way we think about our products and the Reluxwatches experience.</p>
  </div>
  <div class="values">
   <article class="value"><span class="num">01</span><h3>Clean Design</h3><p>Balanced forms, thoughtful details and nothing unnecessary.</p></article>
   <article class="value"><span class="num">02</span><h3>Everyday Versatility</h3><p>Watches that move easily between work, weekends and everything between.</p></article>
   <article class="value"><span class="num">03</span><h3>Modern Perspective</h3><p>Contemporary style designed to last beyond short-lived trends.</p></article>
  </div>
 </div>
</section>

<section class="end">
 <div class="container">
  <div class="cta">
   <div>
    <div class="eyebrow">Explore Reluxwatches</div>
    <h2>FIND THE WATCH THAT FITS YOUR TIME.</h2>
    <p>Explore our latest watches and discover a style made for your everyday.</p>
   </div>
   <a class="button light" href="<?php echo esc_url($shop_url); ?>">SHOP WATCHES →</a>
  </div>
 </div>
</section>
