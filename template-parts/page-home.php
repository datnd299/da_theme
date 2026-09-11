<?php
$imagewatch = static function ($filename) {
    $images = ['img1.jpg', 'img2.jpg', 'img3.png', 'img4.png'];
    $index  = preg_match('/(\d+)/', $filename, $m) ? ((int) $m[1] - 1) % count($images) : 0;
    return get_theme_file_uri('assets/img/' . $images[$index]);
};

// Renders a theme image through the i0.wp.com CDN helper (srcset + sizes),
// falling back to a plain <img> if the helper is unavailable.
$imagewatch_img = static function ($filename, $alt, $width, $height, $loading = 'lazy', $sizes = '', $fetchpriority = '') use ($imagewatch) {
    $url = $imagewatch($filename);

    if (function_exists('dawp_get_responsive_image')) {
        return dawp_get_responsive_image($url, $alt, '', $width, $height, $loading, $sizes, $fetchpriority);
    }

    return sprintf(
        '<img src="%s" alt="%s" width="%d" height="%d" loading="%s" decoding="async">',
        esc_url($url),
        esc_attr($alt),
        (int) $width,
        (int) $height,
        esc_attr($loading)
    );
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
    'voyager' => $category_url('voyager'),
    'odyssey' => $category_url('odyssey'),
    'eternal' => $category_url('eternal'),
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
      <div class="product-image"><?php
        echo function_exists('dawp_get_responsive_image')
            ? dawp_get_responsive_image($fallback['image'], $fallback['alt'], '', 560, 700, 'lazy', '(max-width: 767px) 50vw, 25vw')
            : '<img src="' . esc_url($fallback['image']) . '" alt="' . esc_attr($fallback['alt']) . '" loading="lazy" decoding="async">';
      ?></div>
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
    ['image' => $imagewatch('5.png'), 'alt' => 'Relux automatic watch', 'category' => 'The Voyager', 'name' => 'Voyager GMT Automatic', 'price' => '$429'],
    ['image' => $imagewatch('6.png'), 'alt' => 'Relux automatic watch', 'category' => 'The Odyssey', 'name' => 'Odyssey Sunray Automatic', 'price' => '$389'],
    ['image' => $imagewatch('7.png'), 'alt' => 'Relux automatic watch', 'category' => 'The Eternal', 'name' => 'Eternal Slim Automatic', 'price' => '$459'],
    ['image' => $imagewatch('8.png'), 'alt' => 'Relux automatic watch', 'category' => 'The Voyager', 'name' => 'Voyager Field Automatic', 'price' => '$399'],
];

$popular_fallback_products = [
    ['image' => $imagewatch('11.png'), 'alt' => 'Relux automatic bestseller', 'category' => 'The Eternal', 'name' => 'Eternal Heritage Automatic', 'price' => '$449'],
    ['image' => $imagewatch('12.png'), 'alt' => 'Relux automatic bestseller', 'category' => 'The Odyssey', 'name' => 'Odyssey Two-Tone Automatic', 'price' => '$419'],
    ['image' => $imagewatch('13.png'), 'alt' => 'Relux automatic bestseller', 'category' => 'The Voyager', 'name' => 'Voyager Explorer Automatic', 'price' => '$469'],
    ['image' => $imagewatch('14.png'), 'alt' => 'Relux automatic bestseller', 'category' => 'The Eternal', 'name' => 'Eternal Moonphase Automatic', 'price' => '$499'],
];
?>
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
.hero-proof{display:flex;flex-wrap:wrap;gap:10px 22px;margin-top:26px}
.hero-proof span{position:relative;padding-left:16px;font-size:12px;font-weight:600;letter-spacing:.04em;text-transform:uppercase;color:rgba(255,255,255,.86)}
.hero-proof span:before{content:"";position:absolute;left:0;top:50%;width:6px;height:6px;border-radius:999px;background:var(--accent);transform:translateY(-50%)}

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
  grid-template-columns:repeat(3,1fr);
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
.newsletter-signup{width:100%}
.newsletter-alert{
  margin:0 0 14px;
  padding:12px 14px;
  border-left:2px solid #fff;
  background:rgba(255,255,255,.08);
  color:#fff;
  font-size:14px;
  line-height:1.5;
}
.newsletter-alert.is-error{
  border-left-color:#ff8f8f;
  color:#ffd7d7;
}
.newsletter-hp{
  position:absolute;
  left:-9999px;
  width:1px;
  height:1px;
  overflow:hidden;
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
  .style-strip{grid-template-columns:1fr}
  .style-link{border-bottom:1px solid var(--line)}
  .campaign{height:360px}
  .campaign-content{left:26px;right:26px;bottom:36px}
  .newsletter{padding:42px 26px}
  .newsletter-form{flex-direction:column}
}
</style>

  <section class="hero">
    <div class="hero-media">
      <?php
      $hero_image_url = get_theme_file_uri('assets/img/hero.jpeg');
      echo function_exists('dawp_get_responsive_image')
          ? dawp_get_responsive_image($hero_image_url, 'Relux automatic watch on wrist', '', 1344, 752, 'eager', '100vw', 'high')
          : sprintf('<img src="%s" alt="%s" width="1344" height="752" loading="eager" decoding="async">', esc_url($hero_image_url), esc_attr('Relux automatic watch on wrist'));
      ?>
    </div>
    <div class="container hero-content">
      <div class="hero-copy">
        <div class="eyebrow">Relux / Automatic Collection</div>
        <h1>MECHANICAL. BY DESIGN.</h1>
        <p>Self-winding automatic watches with visible movement, sapphire crystal and finishing built to last for years — every Relux watch ships with a 2-year warranty.</p>
        <a class="btn btn-light" href="<?php echo esc_url($shop_url); ?>">SHOP ALL →</a>
        <div class="hero-proof">
          <span>2-Year Warranty</span>
          <span>Automatic Movement</span>
          <span>Free US Shipping</span>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section-head">
        <div>
          <div class="eyebrow">Collections</div>
          <h2>THREE WAYS TO WEAR TIME.</h2>
        </div>
        <a class="text-link" href="<?php echo esc_url($shop_url); ?>">VIEW ALL</a>
      </div>

      <div class="collection-grid">
        <a class="collection-card" href="<?php echo esc_url($home_category_urls['voyager']); ?>">
          <?php echo $imagewatch_img('2.png', 'The Voyager automatic watch collection', 760, 568, 'lazy', '(max-width: 700px) 100vw, 50vw'); ?>
          <div class="collection-content"><h3>The Voyager</h3><p>Automatic watches built for the journey.</p></div>
        </a>
        <a class="collection-card small" href="<?php echo esc_url($home_category_urls['odyssey']); ?>">
          <?php echo $imagewatch_img('3.png', 'The Odyssey automatic watch collection', 480, 358, 'lazy', '(max-width: 700px) 100vw, 25vw'); ?>
          <div class="collection-content"><h3>The Odyssey</h3><p>The everyday automatic, refined.</p></div>
        </a>
        <a class="collection-card small" href="<?php echo esc_url($home_category_urls['eternal']); ?>">
          <?php echo $imagewatch_img('4.png', 'The Eternal automatic watch collection', 480, 358, 'lazy', '(max-width: 700px) 100vw, 25vw'); ?>
          <div class="collection-content"><h3>The Eternal</h3><p>Timeless craftsmanship, made to endure.</p></div>
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
          <?php echo $imagewatch_img('9.png', 'Watch worn in everyday life', 720, 538, 'lazy', '(max-width: 900px) 100vw, 50vw'); ?>
        </div>
        <div class="split-copy">
          <div class="eyebrow">Automatic Movement</div>
          <h2>NO BATTERY. NO SHORTCUTS.</h2>
          <p>Every Relux watch is powered by a self-winding automatic movement, visible through an exhibition caseback, and backed by our 2-year warranty against manufacturing defects.</p>
          <div><a class="btn" href="<?php echo esc_url($home_category_urls['voyager']); ?>">DISCOVER RELUX →</a></div>
        </div>
      </div>
    </div>
  </section>

  <section class="section-tight">
    <div class="container">
      <div class="section-head">
        <div>
          <div class="eyebrow">Explore</div>
          <h2>SHOP BY COLLECTION.</h2>
        </div>
      </div>
      <nav class="style-strip">
        <a class="style-link" href="<?php echo esc_url($home_category_urls['voyager']); ?>">The Voyager</a>
        <a class="style-link" href="<?php echo esc_url($home_category_urls['odyssey']); ?>">The Odyssey</a>
        <a class="style-link" href="<?php echo esc_url($home_category_urls['eternal']); ?>">The Eternal</a>
      </nav>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="campaign">
        <?php echo $imagewatch_img('10.png', 'Relux automatic watch editorial campaign', 1280, 956, 'lazy', '100vw'); ?>
        <div class="campaign-content">
          <div class="eyebrow">Relux Craftsmanship</div>
          <h2>LESS NOISE. MORE MOVEMENT.</h2>
          <p>Automatic calibers, sapphire crystal and finishing you can see through the caseback — built to outlast trends, and covered by a 2-year warranty.</p>
          <a class="btn btn-light" href="<?php echo esc_url($home_category_urls['eternal']); ?>">EXPLORE THE ETERNAL →</a>
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

  <section class="section" id="newsletter">
    <div class="container">
      <div class="newsletter">
        <div>
          <div class="eyebrow" style="color:#8f8f8f">Updates</div>
          <h2>KEEP IN TIME.</h2>
          <p>New arrivals, product stories and occasional updates.</p>
        </div>
        <div class="newsletter-signup">
          <?php
          if (function_exists('dawp_newsletter_form')) {
              dawp_newsletter_form();
          }
          ?>
        </div>
      </div>
    </div>
  </section>

