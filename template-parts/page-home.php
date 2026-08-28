<?php
$imagewatch = static function ($filename) {
    return get_theme_file_uri('assets/img/imagewatch/' . $filename);
};

$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$category_url = static function ($slug) use ($shop_url) {
    if (function_exists('dawp_product_category_url')) {
        return dawp_product_category_url($slug);
    }

    return 'new-arrivals' === $slug ? $shop_url : home_url('/product-category/' . trim($slug, '/') . '/');
};

$home_category_urls = [
    'watches'      => $category_url('watches'),
    'new-arrivals' => $category_url('new-arrivals'),
    'minimal'      => $category_url('minimal'),
    'sport'        => $category_url('sport'),
    'statement'    => $category_url('statement'),
    'accessories'  => $category_url('accessories'),
];

$get_product_category_name = static function ($product) {
    if (!$product || !function_exists('get_the_terms')) {
        return '';
    }

    $cats = get_the_terms($product->get_id(), 'product_cat');

    if (is_wp_error($cats) || empty($cats)) {
        return '';
    }

    foreach ($cats as $cat) {
        if (function_exists('dawp_is_lbq_product_category_slug') && !dawp_is_lbq_product_category_slug($cat->slug)) {
            continue;
        }

        return $cat->name;
    }

    return $cats[0]->name;
};

$render_home_product_card = static function ($product, $fallback = []) use ($get_product_category_name) {
    if ($product && function_exists('wc_get_product')) {
        $category = $get_product_category_name($product);
        ?>
        <article class="product-card">
          <a class="product-card-link" href="<?php echo esc_url(get_permalink($product->get_id())); ?>">
            <div class="product-image">
              <?php
              echo function_exists('dawp_get_product_responsive_image')
                  ? dawp_get_product_responsive_image($product, 'home-product-img', 560, 700, '(max-width: 767px) 50vw, 25vw')
                  : $product->get_image('woocommerce_single', ['class' => 'home-product-img', 'loading' => 'lazy']);
              ?>
            </div>
            <?php if ($category) : ?><div class="product-meta"><?php echo esc_html($category); ?></div><?php endif; ?>
            <div class="product-name"><?php echo esc_html($product->get_name()); ?></div>
            <div class="product-price"><?php echo wp_kses_post($product->get_price_html()); ?></div>
          </a>
        </article>
        <?php
        return;
    }

    ?>
    <article class="product-card">
      <div class="product-image"><img src="<?php echo esc_url($fallback['image']); ?>" alt="<?php echo esc_attr($fallback['alt']); ?>"></div>
      <div class="product-meta"><?php echo esc_html($fallback['category']); ?></div>
      <div class="product-name"><?php echo esc_html($fallback['name']); ?></div>
      <div class="product-price"><?php echo esc_html($fallback['price']); ?></div>
    </article>
    <?php
};

$render_home_products = static function ($query_args, $fallback_products) use ($render_home_product_card) {
    $products = [];

    if (class_exists('WooCommerce') && class_exists('WP_Query')) {
        $product_query = new WP_Query(array_merge([
            'post_type'              => 'product',
            'post_status'            => 'publish',
            'posts_per_page'         => 4,
            'ignore_sticky_posts'    => true,
            'no_found_rows'          => true,
            'update_post_meta_cache' => true,
            'update_post_term_cache' => true,
        ], $query_args));

        while ($product_query->have_posts()) {
            $product_query->the_post();
            $product = wc_get_product(get_the_ID());

            if ($product && $product->is_visible()) {
                $products[] = $product;
            }
        }

        wp_reset_postdata();
    }

    if (!empty($products)) {
        foreach ($products as $product) {
            $render_home_product_card($product);
        }

        return;
    }

    foreach ($fallback_products as $fallback) {
        $render_home_product_card(null, $fallback);
    }
};

$new_in_fallback_products = [
    ['image' => $imagewatch('5.png'), 'alt' => 'Reluxwatches watch', 'category' => 'Everyday', 'name' => 'Reluxwatches Core 01', 'price' => '$189'],
    ['image' => $imagewatch('6.png'), 'alt' => 'Reluxwatches watch', 'category' => 'Minimal', 'name' => 'Reluxwatches Form 02', 'price' => '$215'],
    ['image' => $imagewatch('7.png'), 'alt' => 'Reluxwatches watch', 'category' => 'Sport', 'name' => 'Reluxwatches Motion S1', 'price' => '$249'],
    ['image' => $imagewatch('8.png'), 'alt' => 'Reluxwatches watch', 'category' => 'Statement', 'name' => 'Reluxwatches Edge 04', 'price' => '$279'],
];

$popular_fallback_products = [
    ['image' => $imagewatch('11.png'), 'alt' => 'Reluxwatches bestseller', 'category' => 'Minimal', 'name' => 'Reluxwatches Mono 01', 'price' => '$199'],
    ['image' => $imagewatch('12.png'), 'alt' => 'Reluxwatches bestseller', 'category' => 'Everyday', 'name' => 'Reluxwatches Day 03', 'price' => '$225'],
    ['image' => $imagewatch('13.png'), 'alt' => 'Reluxwatches bestseller', 'category' => 'Sport', 'name' => 'Reluxwatches Pace 02', 'price' => '$259'],
    ['image' => $imagewatch('14.png'), 'alt' => 'Reluxwatches bestseller', 'category' => 'Statement', 'name' => 'Reluxwatches Frame 05', 'price' => '$289'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reluxwatches — Homepage</title>
<style>
:root{
  --bg:#ffffff;
  --text:#111111;
  --muted:#777777;
  --line:#e9e9e9;
  --accent:#405447;
  --max:1380px;
}
*{box-sizing:border-box}
body{
  margin:0;
  background:var(--bg);
  color:var(--text);
  font-family:Inter,Geist,Arial,sans-serif;
  -webkit-font-smoothing:antialiased;
}
img{display:block;width:100%;height:100%;object-fit:cover}
a{text-decoration:none;color:inherit}
main{overflow:hidden}
.container{max-width:var(--max);margin:0 auto;padding:0 40px}
.section{padding:112px 0}
.section-tight{padding:88px 0}
.eyebrow{
  font-size:12px;
  letter-spacing:.14em;
  text-transform:uppercase;
  color:var(--muted);
  margin-bottom:18px;
  font-weight:600;
}
h1,h2,h3,p{margin-top:0}
h1{
  font-size:clamp(44px,5vw,58px);
  line-height:1.02;
  letter-spacing:-.04em;
  font-weight:600;
  max-width:620px;
  margin-bottom:28px;
}
h2{
  font-size:clamp(30px,3vw,38px);
  line-height:1.08;
  letter-spacing:-.03em;
  font-weight:600;
  margin-bottom:18px;
}
h3{
  font-size:18px;
  line-height:1.25;
  letter-spacing:-.02em;
  font-weight:600;
  margin-bottom:8px;
}
p{
  color:var(--muted);
  font-size:16px;
  line-height:1.65;
}
.btn{
  display:inline-flex;
  align-items:center;
  gap:10px;
  min-height:48px;
  padding:0 20px;
  border:1px solid var(--text);
  background:var(--text);
  color:#fff;
  font-size:13px;
  font-weight:600;
  letter-spacing:.02em;
  transition:.2s ease;
}
.btn:hover{
  background:#2a2a2a;
  border-color:#2a2a2a;
  color:#fff;
}
.btn-light{
  background:#fff;
  color:#111;
  border-color:#fff;
}
.text-link{
  font-size:13px;
  font-weight:600;
  border-bottom:1px solid #bbb;
  padding-bottom:3px;
}
.section-head{
  display:flex;
  justify-content:space-between;
  align-items:end;
  gap:32px;
  margin-bottom:44px;
}

/* HERO */
.hero{
  position:relative;
  min-height:760px;
  background:#f2f2f2;
}
.hero-media{
  position:absolute;
  inset:0;
}
.hero-media:after{
  content:"";
  position:absolute;
  inset:0;
  background:linear-gradient(90deg,rgba(0,0,0,.42) 0%,rgba(0,0,0,.16) 38%,rgba(0,0,0,0) 65%);
}
.hero-content{
  position:relative;
  z-index:2;
  min-height:760px;
  display:flex;
  align-items:flex-end;
  padding-bottom:88px;
}
.hero-copy{
  max-width:560px;
  color:#fff;
}
.hero-copy .eyebrow,.hero-copy p{color:rgba(255,255,255,.8)}
.hero-copy .eyebrow{margin-bottom:22px}
.hero-copy h1{margin-bottom:24px}
.hero-copy p{margin-bottom:32px}

/* COLLECTIONS */
.collection-grid{
  display:grid;
  grid-template-columns:1.4fr 1fr 1fr;
  gap:28px;
}
.collection-card{
  position:relative;
  min-height:520px;
  overflow:hidden;
  background:#f4f4f4;
}
.collection-card.small{min-height:520px}
.collection-card:after{
  content:"";
  position:absolute;
  inset:0;
  background:linear-gradient(180deg,transparent 55%,rgba(0,0,0,.42));
}
.collection-content{
  position:absolute;
  z-index:2;
  left:32px;
  right:32px;
  bottom:30px;
  color:#fff;
}
.collection-content p{margin:0;color:rgba(255,255,255,.8);font-size:14px}

/* PRODUCTS */
.product-grid{
  display:grid;
  grid-template-columns:repeat(4,1fr);
  gap:48px 26px;
}
.product-card{}
.product-card-link{
  display:block;
}
.product-image{
  aspect-ratio:4/5;
  background:#f4f4f4;
  overflow:hidden;
  margin-bottom:20px;
}
.product-meta{
  font-size:11px;
  text-transform:uppercase;
  letter-spacing:.08em;
  color:var(--muted);
  margin-bottom:8px;
}
.product-name{
  font-size:15px;
  font-weight:600;
  margin-bottom:8px;
}
.product-price{font-size:14px;color:#333}

/* EDITORIAL SPLIT */
.split{
  display:grid;
  grid-template-columns:1.15fr .85fr;
  min-height:620px;
  background:#f6f6f4;
}
.split-image{min-height:620px}
.split-copy{
  display:flex;
  flex-direction:column;
  justify-content:center;
  padding:84px;
}
.split-copy p{max-width:480px;margin-bottom:30px}

/* STYLE LINKS */
.style-strip{
  display:grid;
  grid-template-columns:repeat(5,1fr);
  border-top:1px solid var(--line);
  border-bottom:1px solid var(--line);
}
.style-link{
  padding:24px 16px;
  text-align:center;
  border-right:1px solid var(--line);
  font-size:14px;
  font-weight:600;
  transition:.2s ease;
}
.style-link:last-child{border-right:0}
.style-link:hover{
  color:var(--accent);
  background:#f7f8f7;
}

/* CAMPAIGN */
.campaign{
  position:relative;
  height:420px;
  overflow:hidden;
}
.campaign:after{
  content:"";
  position:absolute;
  inset:0;
  background:linear-gradient(90deg,rgba(0,0,0,.48),rgba(0,0,0,.08));
}
.campaign-content{
  position:absolute;
  left:68px;
  bottom:68px;
  z-index:2;
  color:#fff;
  max-width:480px;
}
.campaign-content .eyebrow,.campaign-content p{color:rgba(255,255,255,.8)}
.campaign-content p{margin-bottom:30px}

/* NEWSLETTER */
.newsletter{
  display:grid;
  grid-template-columns:1fr 1fr;
  gap:56px;
  align-items:center;
  padding:68px;
  background:#111;
  color:#fff;
}
.newsletter p{color:#bdbdbd;margin-bottom:0}
.newsletter-form{
  display:flex;
  gap:14px;
}
.newsletter input{
  flex:1;
  height:48px;
  background:transparent;
  border:1px solid #3a3a3a;
  color:#fff;
  padding:0 14px;
  outline:none;
}
.newsletter button{
  height:48px;
  padding:0 20px;
  border:1px solid #fff;
  background:#fff;
  color:#111;
  font-weight:600;
  cursor:pointer;
}
.newsletter button:hover{
  background:#2a2a2a;
  border-color:#2a2a2a;
  color:#fff;
}

/* subtle product hover */
.product-image img,.collection-card img{
  transition:transform .35s ease;
}
.product-card:hover .product-image img,
.collection-card:hover img{
  transform:scale(1.025);
}

@media(max-width:1024px){
  .hero,.hero-content{min-height:650px}
  .collection-grid{grid-template-columns:1fr 1fr}
  .collection-card:first-child{grid-column:1/-1}
  .product-grid{grid-template-columns:repeat(2,1fr)}
  .split{grid-template-columns:1fr}
  .split-image{min-height:520px}
  .split-copy{padding:56px}
  .style-strip{grid-template-columns:repeat(3,1fr)}
  .newsletter{grid-template-columns:1fr}
}
@media(max-width:680px){
  .container{padding:0 22px}
  .section{padding:78px 0}
  .section-tight{padding:64px 0}
  .hero,.hero-content{min-height:560px}
  .hero-content{padding-bottom:54px}
  .hero-media:after{
    background:linear-gradient(180deg,rgba(0,0,0,.05) 20%,rgba(0,0,0,.55) 100%);
  }
  .collection-grid{grid-template-columns:1fr}
  .collection-card:first-child{grid-column:auto}
  .collection-card,.collection-card.small{min-height:440px}
  .product-grid{gap:34px 16px}
  .split-copy{padding:42px 26px}
  .style-strip{grid-template-columns:1fr 1fr}
  .style-link{border-bottom:1px solid var(--line)}
  .campaign{height:360px}
  .campaign-content{left:26px;right:26px;bottom:36px}
  .newsletter{padding:42px 26px}
  .newsletter-form{flex-direction:column}
}
</style>
</head>
<body>
<main>

  <section class="hero">
    <div class="hero-media">
      <img src="<?php echo esc_url($imagewatch('1.png')); ?>" alt="Modern wristwatch campaign">
    </div>
    <div class="container hero-content">
      <div class="hero-copy">
        <div class="eyebrow">Reluxwatches / New Season</div>
        <h1>TIME, YOUR WAY.</h1>
        <p>Modern watches with a quieter point of view — refined, wearable and made for every day.</p>
        <a class="btn btn-light" href="<?php echo esc_url($shop_url); ?>">SHOP ALL →</a>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section-head">
        <div>
          <div class="eyebrow">Collections</div>
          <h2>FIND YOUR STYLE.</h2>
        </div>
        <a class="text-link" href="<?php echo esc_url($shop_url); ?>">VIEW ALL</a>
      </div>

      <div class="collection-grid">
        <a class="collection-card" href="<?php echo esc_url($home_category_urls['minimal']); ?>">
          <img src="<?php echo esc_url($imagewatch('2.png')); ?>" alt="Minimal watch collection">
          <div class="collection-content"><h3>Minimal</h3><p>Clean lines, easy wear.</p></div>
        </a>
        <a class="collection-card small" href="<?php echo esc_url($home_category_urls['sport']); ?>">
          <img src="<?php echo esc_url($imagewatch('3.png')); ?>" alt="Sport watch collection">
          <div class="collection-content"><h3>Sport</h3><p>Sharper energy.</p></div>
        </a>
        <a class="collection-card small" href="<?php echo esc_url($home_category_urls['watches']); ?>">
          <img src="<?php echo esc_url($imagewatch('4.png')); ?>" alt="Everyday watch collection">
          <div class="collection-content"><h3>Everyday</h3><p>Built for daily rotation.</p></div>
        </a>
      </div>
    </div>
  </section>

  <section class="section-tight">
    <div class="container">
      <div class="section-head">
        <div>
          <div class="eyebrow">Latest</div>
          <h2>NEW IN.</h2>
        </div>
        <a class="text-link" href="<?php echo esc_url($shop_url); ?>">SHOP ALL</a>
      </div>

      <div class="product-grid">
        <?php
        $render_home_products([
            'orderby' => 'date',
            'order'   => 'DESC',
        ], $new_in_fallback_products);
        ?>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="split">
        <div class="split-image">
          <img src="<?php echo esc_url($imagewatch('9.png')); ?>" alt="Watch worn in everyday life">
        </div>
        <div class="split-copy">
          <div class="eyebrow">Everyday Objects</div>
          <h2>MADE FOR EVERYDAY.</h2>
          <p>Quiet proportions, versatile materials and a contemporary point of view. Designed to work with what you already wear.</p>
          <div><a class="btn" href="<?php echo esc_url($home_category_urls['watches']); ?>">DISCOVER RELUX →</a></div>
        </div>
      </div>
    </div>
  </section>

  <section class="section-tight">
    <div class="container">
      <div class="section-head">
        <div>
          <div class="eyebrow">Explore</div>
          <h2>SHOP BY STYLE.</h2>
        </div>
      </div>
      <nav class="style-strip">
        <a class="style-link" href="<?php echo esc_url($home_category_urls['watches']); ?>">Everyday</a>
        <a class="style-link" href="<?php echo esc_url($home_category_urls['minimal']); ?>">Minimal</a>
        <a class="style-link" href="<?php echo esc_url($home_category_urls['sport']); ?>">Sport</a>
        <a class="style-link" href="<?php echo esc_url($home_category_urls['statement']); ?>">Statement</a>
        <a class="style-link" href="<?php echo esc_url($home_category_urls['accessories']); ?>">Accessories</a>
      </nav>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="campaign">
        <img src="<?php echo esc_url($imagewatch('10.png')); ?>" alt="Reluxwatches watch editorial campaign">
        <div class="campaign-content">
          <div class="eyebrow">Reluxwatches Editorial</div>
          <h2>LESS NOISE. MORE TIME.</h2>
          <p>A modern approach to watches: fewer distractions, better proportions and pieces made to last in your rotation.</p>
          <a class="btn btn-light" href="<?php echo esc_url($home_category_urls['statement']); ?>">EXPLORE THE EDIT →</a>
        </div>
      </div>
    </div>
  </section>

  <section class="section-tight">
    <div class="container">
      <div class="section-head">
        <div>
          <div class="eyebrow">Popular</div>
          <h2>MOST WANTED.</h2>
        </div>
        <a class="text-link" href="<?php echo esc_url($shop_url); ?>">VIEW ALL</a>
      </div>

      <div class="product-grid">
        <?php
        $render_home_products([
            'meta_key' => 'total_sales',
            'orderby'  => 'meta_value_num',
            'order'    => 'DESC',
        ], $popular_fallback_products);
        ?>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="newsletter">
        <div>
          <div class="eyebrow" style="color:#8f8f8f">Updates</div>
          <h2>KEEP IN TIME.</h2>
          <p>New arrivals, product stories and occasional updates.</p>
        </div>
        <form class="newsletter-form">
          <input type="email" placeholder="Email address" aria-label="Email address">
          <button type="submit">JOIN →</button>
        </form>
      </div>
    </div>
  </section>

</main>
</body>
</html>
