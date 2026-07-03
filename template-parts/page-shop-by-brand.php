<?php
/**
 * Template Part: page-shop-by-brand
 */

$rubyinstar_gallery_uri = get_theme_file_uri('/assets/img/gallery/Rubyinstar/');
$hero_image = $rubyinstar_gallery_uri . 'tire-hero-road.png';
$tread_image = $rubyinstar_gallery_uri . 'all-season-tread.png';

$shop_url = function_exists('wc_get_page_id') && wc_get_page_id('shop') > 0
    ? get_permalink(wc_get_page_id('shop'))
    : home_url('/shop/');

$brand_groups = [
    'Premium' => [
        [
            'name' => 'Michelin',
            'slug' => 'michelin',
            'copy' => __('Premium touring, all-season, SUV, and performance tire options.', 'dawp'),
            'tags' => [__('Touring', 'dawp'), __('SUV', 'dawp'), __('Performance', 'dawp')],
        ],
        [
            'name' => 'Bridgestone',
            'slug' => 'bridgestone',
            'copy' => __('Well-known tire brand for daily drivers, SUVs, trucks, and seasonal needs.', 'dawp'),
            'tags' => [__('All-season', 'dawp'), __('SUV', 'dawp'), __('Truck', 'dawp')],
        ],
        [
            'name' => 'Continental',
            'slug' => 'continental',
            'copy' => __('Road comfort, braking confidence, touring, and premium passenger tires.', 'dawp'),
            'tags' => [__('Comfort', 'dawp'), __('Touring', 'dawp'), __('Passenger', 'dawp')],
        ],
        [
            'name' => 'Pirelli',
            'slug' => 'pirelli',
            'copy' => __('Performance-focused tires for sporty handling and premium road feel.', 'dawp'),
            'tags' => [__('Performance', 'dawp'), __('Summer', 'dawp'), __('Touring', 'dawp')],
        ],
    ],
    'Popular Daily' => [
        [
            'name' => 'Goodyear',
            'slug' => 'goodyear',
            'copy' => __('Popular all-season, touring, SUV, and light truck tire choices.', 'dawp'),
            'tags' => [__('All-season', 'dawp'), __('SUV', 'dawp'), __('Light truck', 'dawp')],
        ],
        [
            'name' => 'Cooper',
            'slug' => 'cooper',
            'copy' => __('Common choice for passenger vehicles, SUVs, trucks, and everyday value.', 'dawp'),
            'tags' => [__('Value', 'dawp'), __('Truck', 'dawp'), __('SUV', 'dawp')],
        ],
        [
            'name' => 'Firestone',
            'slug' => 'firestone',
            'copy' => __('Everyday tire options for commuters, family vehicles, SUVs, and trucks.', 'dawp'),
            'tags' => [__('Commuter', 'dawp'), __('SUV', 'dawp'), __('All-season', 'dawp')],
        ],
        [
            'name' => 'Hankook',
            'slug' => 'hankook',
            'copy' => __('Passenger, SUV, performance, and light truck tires at broad price points.', 'dawp'),
            'tags' => [__('Passenger', 'dawp'), __('Performance', 'dawp'), __('SUV', 'dawp')],
        ],
    ],
    'SUV & Truck' => [
        [
            'name' => 'BFGoodrich',
            'slug' => 'bfgoodrich',
            'copy' => __('Known for all-terrain, truck, SUV, and off-road capable tire lines.', 'dawp'),
            'tags' => [__('All-terrain', 'dawp'), __('Truck', 'dawp'), __('Off-road', 'dawp')],
        ],
        [
            'name' => 'Falken',
            'slug' => 'falken',
            'copy' => __('All-season, performance, SUV, and all-terrain options for mixed use.', 'dawp'),
            'tags' => [__('All-terrain', 'dawp'), __('Performance', 'dawp'), __('SUV', 'dawp')],
        ],
        [
            'name' => 'Toyo',
            'slug' => 'toyo',
            'copy' => __('Truck, SUV, highway, all-terrain, and performance tire categories.', 'dawp'),
            'tags' => [__('Truck', 'dawp'), __('Highway', 'dawp'), __('All-terrain', 'dawp')],
        ],
        [
            'name' => 'Nitto',
            'slug' => 'nitto',
            'copy' => __('Truck, off-road, street performance, and enthusiast-focused tire options.', 'dawp'),
            'tags' => [__('Truck', 'dawp'), __('Off-road', 'dawp'), __('Performance', 'dawp')],
        ],
    ],
    'Value & Broad Choice' => [
        [
            'name' => 'Kumho',
            'slug' => 'kumho',
            'copy' => __('Broad tire selection for passenger cars, crossovers, SUVs, and daily use.', 'dawp'),
            'tags' => [__('Value', 'dawp'), __('Passenger', 'dawp'), __('SUV', 'dawp')],
        ],
        [
            'name' => 'Nexen',
            'slug' => 'nexen',
            'copy' => __('Budget-friendly and mid-range options across common tire categories.', 'dawp'),
            'tags' => [__('Value', 'dawp'), __('Touring', 'dawp'), __('SUV', 'dawp')],
        ],
        [
            'name' => 'Yokohama',
            'slug' => 'yokohama',
            'copy' => __('Touring, performance, SUV, and light truck options with wide availability.', 'dawp'),
            'tags' => [__('Touring', 'dawp'), __('Performance', 'dawp'), __('Truck', 'dawp')],
        ],
        [
            'name' => 'Douglas',
            'slug' => 'douglas',
            'copy' => __('Walmart-exclusive tire brand commonly used for practical replacement needs.', 'dawp'),
            'tags' => [__('Walmart exclusive', 'dawp'), __('Value', 'dawp'), __('Everyday', 'dawp')],
        ],
    ],
];

$brand_url = static function ($brand) use ($shop_url) {
    return add_query_arg([
        's' => $brand['name'],
        'post_type' => 'product',
    ], $shop_url);
};

$all_brands = [];
foreach ($brand_groups as $brands) {
    $all_brands = array_merge($all_brands, $brands);
}

$total_brands = count($all_brands);
$popular_brands = ['Michelin', 'Goodyear', 'Bridgestone', 'Cooper'];
?>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&family=Inter:wght@400;500;600;700&display=swap');

  :root{
    --navy:#0B1F3A;
    --navy-light:#12294f;
    --orange:#F97316;
    --orange-dark:#DB5F0B;
    --white:#FFFFFF;
    --gray-bg:#F5F6F8;
    --text:#111827;
    --text-soft:#6B7280;
    --border:#E5E7EB;
  }
  .brand-page *{ box-sizing:border-box; }
  .brand-page{
    font-family:'Inter', sans-serif;
    color:var(--text);
    background:var(--white);
    overflow:hidden;
  }
  .brand-page h1,.brand-page h2,.brand-page h3{
    font-family:'Plus Jakarta Sans', sans-serif;
    color:var(--navy);
    line-height:1.15;
    overflow-wrap:break-word;
  }
  .brand-page a{ color:inherit; text-decoration:none; }
  .brand-page img{ max-width:100%; display:block; }
  .brand-container{ max-width:1280px; margin:0 auto; padding:0 20px; }
  @media(min-width:768px){ .brand-container{ padding:0 32px; } }

  .brand-eyebrow{
    display:inline-flex; align-items:center; gap:8px;
    color:var(--orange); font-size:13px; font-weight:700;
    letter-spacing:.08em; text-transform:uppercase;
  }
  .brand-eyebrow::before{
    content:""; width:18px; height:2px; border-radius:2px; background:var(--orange);
  }
  .brand-btn{
    display:inline-flex; min-height:48px; align-items:center; justify-content:center; gap:8px;
    border:1.5px solid transparent; border-radius:10px; padding:0 26px;
    font-size:15px; font-weight:700; transition:transform .15s ease, background .15s ease, border-color .15s ease, box-shadow .15s ease;
    white-space:nowrap;
  }
  .brand-btn:active{ transform:translateY(1px); }
  .brand-btn-primary{ background:var(--orange); color:#fff; box-shadow:0 8px 20px -8px rgba(249,115,22,.55); }
  .brand-btn-primary:hover{ background:var(--orange-dark); color:#fff; }
  .brand-btn-outline{ background:transparent; color:#fff; border-color:rgba(255,255,255,.3); }
  .brand-btn-outline:hover{ background:#fff; color:var(--navy); }
  .brand-btn-secondary{ background:var(--navy); color:#fff; }
  .brand-btn-secondary:hover{ background:var(--navy-light); color:#fff; }

  .brand-hero{
    position:relative; color:#fff; overflow:hidden;
    background:
      radial-gradient(1100px 480px at 86% -8%, rgba(249,115,22,.18), transparent 60%),
      linear-gradient(180deg, var(--navy) 0%, #0d2547 62%, #0f2a52 100%);
  }
  .brand-hero__inner{
    display:grid; grid-template-columns:1fr; gap:40px; align-items:center;
    padding:56px 0 54px;
  }
  @media(min-width:1024px){
    .brand-hero__inner{ grid-template-columns:1.02fr .98fr; padding:78px 0 68px; }
  }
  .brand-hero h1{
    color:#fff; font-size:clamp(32px,5vw,52px); font-weight:800;
    margin:16px 0 18px; text-wrap:balance;
  }
  .brand-hero p{
    max-width:590px; color:rgba(255,255,255,.84);
    font-size:17px; line-height:1.65; margin:0;
  }
  .brand-hero__actions{ display:flex; flex-wrap:wrap; gap:14px; margin-top:28px; }
  .brand-stats{ display:flex; flex-wrap:wrap; gap:28px; margin-top:36px; }
  .brand-stats strong{ display:block; color:#fff; font-family:'Plus Jakarta Sans'; font-size:22px; }
  .brand-stats span{ display:block; color:rgba(255,255,255,.74); font-size:12.5px; letter-spacing:.05em; text-transform:uppercase; }
  .brand-visual{ position:relative; }
  .brand-photo{
    overflow:hidden; border:1px solid rgba(255,255,255,.1); border-radius:20px;
    box-shadow:0 30px 60px -20px rgba(0,0,0,.5);
  }
  .brand-photo img{ width:100%; height:360px; object-fit:cover; }
  .brand-float{
    position:absolute; bottom:-22px; left:-18px; display:flex; align-items:center; gap:12px;
    background:#fff; color:var(--navy); border-radius:14px; padding:14px 18px;
    box-shadow:0 16px 30px -10px rgba(0,0,0,.35);
  }
  .brand-float__ring{ width:42px; height:42px; border-radius:50%; background:var(--gray-bg); display:flex; align-items:center; justify-content:center; }
  .brand-float strong{ display:block; font-family:'Plus Jakarta Sans'; font-size:15px; }
  .brand-float span{ color:var(--text-soft); font-size:12px; }
  .brand-tread-line{
    position:absolute; inset:auto 0 0 0; height:10px;
    background-image:repeating-linear-gradient(100deg, rgba(255,255,255,.12) 0 10px, transparent 10px 22px);
    opacity:.5;
  }
  @media(max-width:640px){ .brand-float{ display:none; } }

  .brand-section{ padding:64px 0; }
  .brand-bg-gray{ background:var(--gray-bg); }
  .brand-section-head{ max-width:720px; margin:0 0 34px; }
  .brand-section-head.center{ text-align:center; max-width:680px; margin:0 auto 40px; }
  .brand-section-head h2{ font-size:clamp(26px,3.4vw,36px); margin:12px 0 0; }
  .brand-section-head p{ color:var(--text-soft); margin:12px 0 0; font-size:15.5px; line-height:1.6; }

  .brand-intro-grid{ display:grid; grid-template-columns:1fr; gap:34px; align-items:center; }
  @media(min-width:960px){ .brand-intro-grid{ grid-template-columns:1fr 1fr; } }
  .brand-intro-copy p{ color:var(--text-soft); font-size:15.5px; line-height:1.75; margin:14px 0 0; }
  .brand-intro-copy h2{ font-size:clamp(26px,3.4vw,38px); margin:12px 0 0; }
  .brand-intro-img{
    overflow:hidden; border:1px solid var(--border); border-radius:18px;
    box-shadow:0 22px 44px -28px rgba(11,31,58,.35);
  }
  .brand-intro-img img{ width:100%; height:420px; object-fit:cover; }

  .brand-tool-card{
    border:1px solid var(--border); border-radius:18px; background:#fff;
    padding:22px; box-shadow:0 24px 50px -24px rgba(11,31,58,.28);
  }
  .brand-tool__header{
    display:flex; align-items:flex-end; justify-content:space-between; gap:20px; flex-wrap:wrap;
    margin-bottom:22px;
  }
  .brand-search{ flex:1 1 280px; max-width:420px; }
  .brand-search input{
    width:100%; min-height:48px; border:1.5px solid var(--border); border-radius:10px;
    background:#fff; color:var(--text); padding:0 16px; font:inherit; outline:none;
  }
  .brand-search input:focus{ border-color:var(--orange); box-shadow:0 0 0 3px rgba(249,115,22,.14); }
  .brand-tabs{
    display:flex; gap:6px; overflow-x:auto; background:var(--gray-bg); padding:5px; border-radius:12px; margin-bottom:22px;
    scrollbar-width:none;
  }
  .brand-tabs::-webkit-scrollbar{ display:none; }
  .brand-tab{
    flex:0 0 auto; border:0; border-radius:9px; background:transparent; color:var(--text-soft);
    display:inline-flex; align-items:center; gap:8px; min-height:42px; padding:0 16px;
    font:inherit; font-size:13.5px; font-weight:700; cursor:pointer;
  }
  .brand-tab small{
    display:inline-flex; align-items:center; justify-content:center; min-width:22px; height:22px;
    border-radius:999px; background:#fff; color:var(--text-soft); font-size:11px;
  }
  .brand-tab.active{ background:var(--navy); color:#fff; }
  .brand-tab.active small{ color:var(--navy); }
  .brand-panel{ display:none; animation:brandFade .24s ease; }
  .brand-panel.active{ display:block; }
  .brand-panel__top{
    display:flex; align-items:flex-start; justify-content:space-between; gap:20px; flex-wrap:wrap;
    border-bottom:1px dashed var(--border); padding-bottom:18px; margin-bottom:22px;
  }
  .brand-panel__top h3{ font-size:clamp(20px,2.4vw,26px); margin:0; }
  .brand-panel__top p{ color:var(--text-soft); font-size:14px; line-height:1.6; margin:8px 0 0; }
  .brand-panel__badge{
    border-radius:999px; background:#fff7ed; color:#c2410c; padding:8px 12px;
    font-size:12px; font-weight:800; text-transform:uppercase;
  }
  .brand-grid{ display:grid; grid-template-columns:1fr; gap:16px; }
  @media(min-width:700px){ .brand-grid{ grid-template-columns:repeat(2,1fr); } }
  @media(min-width:1080px){ .brand-grid{ grid-template-columns:repeat(4,1fr); } }
  .brand-card{
    display:flex; min-height:220px; flex-direction:column; gap:14px;
    border:1px solid var(--border); border-radius:16px; background:#fff; padding:22px;
    transition:transform .18s ease, box-shadow .18s ease, border-color .18s ease;
  }
  .brand-card:hover{ transform:translateY(-4px); border-color:transparent; box-shadow:0 18px 34px -18px rgba(11,31,58,.25); }
  .brand-card__icon{
    width:52px; height:52px; border-radius:12px; background:var(--gray-bg); color:var(--navy);
    display:flex; align-items:center; justify-content:center; font-family:'Plus Jakarta Sans'; font-weight:800; font-size:18px;
  }
  .brand-card:hover .brand-card__icon{ background:var(--orange); color:#fff; }
  .brand-card__top{ display:flex; min-width:0; align-items:flex-start; justify-content:space-between; gap:12px; }
  .brand-card__top strong{ color:var(--navy); font-family:'Plus Jakarta Sans'; font-size:18px; line-height:1.2; }
  .brand-card__top em{
    flex:0 0 auto; border-radius:999px; background:#fff7ed; color:#c2410c;
    padding:6px 9px; font-size:11px; font-style:normal; font-weight:800; text-transform:uppercase;
  }
  .brand-card__copy{ color:var(--text-soft); font-size:13.5px; line-height:1.55; flex:1; }
  .brand-card__tags{ display:flex; flex-wrap:wrap; gap:8px; }
  .brand-card__tags small{ background:var(--gray-bg); border-radius:6px; color:var(--text-soft); padding:4px 8px; font-size:12px; font-weight:600; }
  .brand-no-results{
    margin:18px 0 0; border:1px solid #fed7aa; border-radius:10px; background:#fff7ed;
    color:#9a3412; padding:16px 18px; font-weight:700;
  }

  .brand-cta{
    background:var(--orange); border-radius:24px; padding:44px 32px; color:#fff; text-align:center;
  }
  .brand-cta h2{ color:#fff; font-size:clamp(24px,3vw,30px); margin:0; }
  .brand-cta p{ color:rgba(255,255,255,.9); margin:10px auto 0; max-width:650px; line-height:1.6; }
  .brand-cta-actions{ display:flex; justify-content:center; flex-wrap:wrap; gap:12px; margin-top:26px; }
  .brand-cta .brand-btn-outline{ background:#fff; color:var(--navy); border-color:#fff; }

  @keyframes brandFade{ from{ opacity:0; transform:translateY(6px); } to{ opacity:1; transform:none; } }
  @media(max-width:560px){
    .brand-hero__actions,.brand-cta-actions{ flex-direction:column; }
    .brand-btn{ width:100%; }
    .brand-tool-card{ padding:18px; }
    .brand-photo img,.brand-intro-img img{ height:300px; }
  }
</style>

<div id="primary" class="brand-page">
    <section class="brand-hero">
        <div class="brand-container brand-hero__inner">
            <div>
                <span class="brand-eyebrow"><?php esc_html_e('Rubyinstar Brand Finder', 'dawp'); ?></span>
                <h1><?php esc_html_e('Shop Tires By Brand', 'dawp'); ?></h1>
                <p><?php esc_html_e('Start with a tire name you already trust, then jump straight into matching Rubyinstar products and brand searches.', 'dawp'); ?></p>
                <div class="brand-hero__actions">
                    <a href="#brand-tool" class="brand-btn brand-btn-primary"><?php esc_html_e('Find Tire Brand', 'dawp'); ?></a>
                    <a href="<?php echo esc_url($shop_url); ?>" class="brand-btn brand-btn-outline"><?php esc_html_e('Shop All Tires', 'dawp'); ?></a>
                </div>
                <div class="brand-stats" aria-label="<?php esc_attr_e('Brand shopping summary', 'dawp'); ?>">
                    <div><strong><?php echo esc_html(count($brand_groups)); ?></strong><span><?php esc_html_e('Brand Groups', 'dawp'); ?></span></div>
                    <div><strong><?php echo esc_html($total_brands); ?></strong><span><?php esc_html_e('Featured Brands', 'dawp'); ?></span></div>
                    <div><strong><?php esc_html_e('Fast', 'dawp'); ?></strong><span><?php esc_html_e('Brand Search', 'dawp'); ?></span></div>
                </div>
            </div>
            <div class="brand-visual">
                <div class="brand-photo">
                    <img src="<?php echo esc_url($hero_image); ?>"
                         alt="<?php esc_attr_e('Rubyinstar tire shop cover for shopping by tire brand', 'dawp'); ?>"
                         loading="eager"
                         fetchpriority="high">
                </div>
                <div class="brand-float">
                    <span class="brand-float__ring">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0B1F3A" stroke-width="2"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="3"/></svg>
                    </span>
                    <div>
                        <strong><?php esc_html_e('Known Brands', 'dawp'); ?></strong>
                        <span><?php esc_html_e('Easy comparison paths', 'dawp'); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="brand-tread-line"></div>
    </section>

    <section class="brand-section brand-bg-gray">
        <div class="brand-container brand-intro-grid">
            <div class="brand-intro-img">
                <img src="<?php echo esc_url($tread_image); ?>"
                     alt="<?php esc_attr_e('Close-up tire tread used for Rubyinstar tire brand shopping guidance', 'dawp'); ?>"
                     loading="lazy">
            </div>
            <div class="brand-intro-copy">
                <span class="brand-eyebrow"><?php esc_html_e('Brand Shopping', 'dawp'); ?></span>
                <h2><?php esc_html_e('Compare the tire brands drivers already recognize.', 'dawp'); ?></h2>
                <p><?php esc_html_e('Browse premium, daily driving, SUV, truck, and value-focused brands in one clean view. Each card points to a product search so shoppers can move from brand preference to tire options faster.', 'dawp'); ?></p>
            </div>
        </div>
    </section>

    <section id="brand-tool" class="brand-section" data-brand-tool>
        <div class="brand-container">
            <div class="brand-tool-card">
                <div class="brand-tool__header">
                    <div class="brand-section-head">
                        <span class="brand-eyebrow"><?php esc_html_e('Browse Brands', 'dawp'); ?></span>
                        <h2><?php esc_html_e('Select a tire brand', 'dawp'); ?></h2>
                        <p><?php esc_html_e('Use the tabs or search by brand, vehicle type, tire category, or value tier.', 'dawp'); ?></p>
                    </div>
                    <label class="brand-search">
                        <span class="screen-reader-text"><?php esc_html_e('Search tire brand', 'dawp'); ?></span>
                        <input type="search" data-brand-search placeholder="<?php esc_attr_e('Search Michelin, Goodyear...', 'dawp'); ?>">
                    </label>
                </div>

                <div class="brand-tabs" role="tablist" aria-label="<?php esc_attr_e('Tire brand tabs', 'dawp'); ?>">
                    <?php $is_first = true; ?>
                    <?php foreach ($brand_groups as $group => $brands) : ?>
                        <button class="brand-tab<?php echo $is_first ? ' active' : ''; ?>"
                                type="button"
                                role="tab"
                                aria-selected="<?php echo $is_first ? 'true' : 'false'; ?>"
                                aria-controls="panel-<?php echo esc_attr(sanitize_title($group)); ?>"
                                data-target="<?php echo esc_attr(sanitize_title($group)); ?>">
                            <span><?php echo esc_html($group); ?></span>
                            <small><?php echo esc_html(count($brands)); ?></small>
                        </button>
                        <?php $is_first = false; ?>
                    <?php endforeach; ?>
                </div>

                <div class="brand-content">
                    <?php $is_first = true; ?>
                    <?php foreach ($brand_groups as $group => $brands) : ?>
                        <?php $group_id = sanitize_title($group); ?>
                        <div class="brand-panel<?php echo $is_first ? ' active' : ''; ?>" id="panel-<?php echo esc_attr($group_id); ?>" role="tabpanel">
                            <div class="brand-panel__top">
                                <div>
                                    <h3><?php echo esc_html(sprintf(__('%s tire brands', 'dawp'), $group)); ?></h3>
                                    <p><?php esc_html_e('Choose a brand to search matching Rubyinstar products by brand keyword.', 'dawp'); ?></p>
                                </div>
                                <?php if ('premium' === $group_id) : ?>
                                    <span class="brand-panel__badge"><?php esc_html_e('Top picks', 'dawp'); ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="brand-grid">
                                <?php foreach ($brands as $brand) : ?>
                                    <a class="brand-card"
                                       href="<?php echo esc_url($brand_url($brand)); ?>"
                                       data-brand="<?php echo esc_attr(strtolower($brand['name'] . ' ' . implode(' ', $brand['tags']))); ?>">
                                        <span class="brand-card__icon" aria-hidden="true"><?php echo esc_html(substr($brand['name'], 0, 1)); ?></span>
                                        <span class="brand-card__top">
                                            <strong><?php echo esc_html($brand['name']); ?></strong>
                                            <?php if (in_array($brand['name'], $popular_brands, true)) : ?>
                                                <em><?php esc_html_e('Popular', 'dawp'); ?></em>
                                            <?php endif; ?>
                                        </span>
                                        <span class="brand-card__copy"><?php echo esc_html($brand['copy']); ?></span>
                                        <span class="brand-card__tags">
                                            <?php foreach ($brand['tags'] as $tag) : ?>
                                                <small><?php echo esc_html($tag); ?></small>
                                            <?php endforeach; ?>
                                        </span>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php $is_first = false; ?>
                    <?php endforeach; ?>
                </div>

                <p class="brand-no-results" data-brand-empty hidden><?php esc_html_e('No matching tire brand found. Try searching by brand name, truck, SUV, all-season, performance, or value.', 'dawp'); ?></p>
            </div>
        </div>
    </section>

    <section class="brand-section">
        <div class="brand-container">
            <div class="brand-cta">
                <h2><?php esc_html_e('Choose brand after fitment.', 'dawp'); ?></h2>
                <p><?php esc_html_e('Brand is only one part of tire selection. Confirm tire size, rim size, load index, speed rating, vehicle requirements, and quantity before placing your order.', 'dawp'); ?></p>
                <div class="brand-cta-actions">
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="brand-btn brand-btn-secondary"><?php esc_html_e('Ask Rubyinstar Support', 'dawp'); ?></a>
                    <a href="<?php echo esc_url($shop_url); ?>" class="brand-btn brand-btn-outline"><?php esc_html_e('Shop All Tires', 'dawp'); ?></a>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
(function() {
    const tool = document.querySelector('[data-brand-tool]');
    if (!tool) return;

    const tabs = Array.from(tool.querySelectorAll('.brand-tab'));
    const panels = Array.from(tool.querySelectorAll('.brand-panel'));
    const search = tool.querySelector('[data-brand-search]');
    const empty = tool.querySelector('[data-brand-empty]');

    function activate(target) {
        tabs.forEach(tab => {
            const active = tab.dataset.target === target;
            tab.classList.toggle('active', active);
            tab.setAttribute('aria-selected', active ? 'true' : 'false');
        });
        panels.forEach(panel => panel.classList.toggle('active', panel.id === 'panel-' + target));
    }

    function resetCards() {
        tool.querySelectorAll('.brand-card').forEach(item => item.hidden = false);
        if (empty) empty.hidden = true;
    }

    tabs.forEach(tab => tab.addEventListener('click', () => {
        if (search) search.value = '';
        resetCards();
        activate(tab.dataset.target);
    }));

    if (search) {
        search.addEventListener('input', () => {
            const query = search.value.trim().toLowerCase().replace(/\s+/g, '');
            let matches = 0;

            if (!query) {
                resetCards();
                activate(tabs[0].dataset.target);
                return;
            }

            panels.forEach(panel => {
                let panelMatches = 0;
                panel.querySelectorAll('.brand-card').forEach(item => {
                    const haystack = item.dataset.brand.replace(/\s+/g, '');
                    const hit = haystack.includes(query);
                    item.hidden = !hit;
                    if (hit) {
                        panelMatches++;
                        matches++;
                    }
                });
                panel.classList.toggle('active', panelMatches > 0);
            });

            tabs.forEach(tab => {
                const panel = tool.querySelector('#panel-' + tab.dataset.target);
                const hasMatch = panel && panel.querySelector('.brand-card:not([hidden])');
                tab.classList.toggle('active', !!hasMatch);
                tab.setAttribute('aria-selected', hasMatch ? 'true' : 'false');
            });

            if (empty) empty.hidden = matches > 0;
        });
    }
})();
</script>
