<?php
/**
 * Template Part: page-collections
 *
 * Editorial overview of the three Corvel collections. The collections are
 * defined in theme code (inc/product-categories.php) — there is no matching
 * WooCommerce taxonomy — so every action link points at the live Shop.
 *
 * @package dawp
 */

$shop_url    = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$collections = function_exists('qb_theme_collections') ? qb_theme_collections() : [];
?>

<style>
  .qb-page { --qb-obsidian:#0D0F0F; --qb-ivory:#F5F2EB; --qb-white:#FFFFFF; --qb-carbon:#171A19; --qb-green:#263C33; --qb-gold:#B38A52; --qb-silver:#B8B8B2; --qb-text:#5E625F; --qb-border:#B8B8B2; --qb-plum:#171A19; --qb-peach:#D7B987; background:var(--qb-ivory); color:var(--qb-text); font-family:"DM Sans","Inter",system-ui,sans-serif; }
  .qb-page * { box-sizing:border-box; }
  .qb-page a { color:inherit; text-decoration:none; }
  .qb-wrap { width:min(100% - 32px,1200px); margin-inline:auto; }
  .qb-eyebrow { margin:0 0 12px; color:var(--qb-gold); font-size:12px; font-weight:800; letter-spacing:.16em; text-transform:uppercase; }
  .qb-title { margin:0; color:var(--qb-plum); font-family:Georgia,"Times New Roman",serif; font-size:clamp(36px,5vw,60px); line-height:1.04; }
  .qb-copy { margin:18px 0 0; max-width:760px; color:var(--qb-text); font-size:17px; line-height:1.75; }
  .qb-button { display:inline-flex; min-height:48px; align-items:center; justify-content:center; border:1px solid var(--qb-plum); border-radius:999px; background:var(--qb-plum); color:#fff !important; padding:0 24px; font-size:14px; font-weight:800; transition:.2s ease; }
  .qb-button:hover { border-color:var(--qb-gold); background:var(--qb-gold); color:var(--qb-plum) !important; }
  .qb-button--ghost { background:transparent; color:var(--qb-plum) !important; }
  .qb-button--ghost:hover { border-color:var(--qb-gold); background:var(--qb-ivory); }
  .qb-actions { display:flex; flex-wrap:wrap; gap:14px; margin-top:28px; }

  .qb-hero { background:var(--qb-obsidian); color:#fff; }
  .qb-hero__inner { padding:76px 0 84px; }
  .qb-hero .qb-title { color:#fff; }
  .qb-hero .qb-copy { color:rgba(255,255,255,.78); }
  .qb-hero .qb-button { border-color:#fff; background:#fff; color:var(--qb-plum) !important; }
  .qb-hero .qb-button:hover { border-color:var(--qb-gold); background:var(--qb-gold); }

  .qb-collections { padding:12px 0 40px; }
  .qb-collection { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:clamp(24px,4vw,56px); align-items:center; padding:56px 0; border-bottom:1px solid var(--qb-border); }
  .qb-collection:last-child { border-bottom:0; }
  .qb-collection:nth-child(even) .qb-collection__media { order:2; }
  .qb-collection__media { overflow:hidden; border:1px solid var(--qb-border); background:#fff; }
  .qb-collection__media img { display:block; width:100%; height:100%; aspect-ratio:4/3; object-fit:cover; }
  .qb-collection__index { color:var(--qb-gold); font-size:13px; font-weight:800; letter-spacing:.16em; }
  .qb-collection h2 { margin:10px 0 0; color:var(--qb-plum); font-family:Georgia,"Times New Roman",serif; font-size:clamp(26px,3.4vw,40px); line-height:1.1; }
  .qb-collection__lead { margin:8px 0 0; color:var(--qb-plum); font-size:16px; font-weight:700; }
  .qb-collection p { margin:14px 0 0; font-size:15px; line-height:1.75; }
  .qb-collection__tags { display:flex; flex-wrap:wrap; gap:8px; margin:18px 0 0; padding:0; list-style:none; }
  .qb-collection__tags li { border:1px solid var(--qb-border); border-radius:999px; background:#fff; padding:7px 14px; color:var(--qb-plum); font-size:12px; font-weight:800; }

  .qb-note { background:var(--qb-green); color:#fff; }
  .qb-note__inner { display:grid; grid-template-columns:1fr auto; gap:24px; align-items:center; padding:44px 0; }
  .qb-note h2 { margin:0; color:#fff; font-family:Georgia,"Times New Roman",serif; font-size:clamp(24px,3vw,34px); line-height:1.14; }
  .qb-note p { margin:10px 0 0; max-width:640px; color:rgba(255,255,255,.82); font-size:15px; line-height:1.7; }
  .qb-note .qb-button { border-color:#fff; background:#fff; color:var(--qb-plum) !important; }

  @media (max-width:860px) {
    .qb-collection, .qb-note__inner { grid-template-columns:1fr; }
    .qb-collection:nth-child(even) .qb-collection__media { order:0; }
  }
</style>

<div class="qb-page qb-collections-page">
  <section class="qb-hero">
    <div class="qb-wrap qb-hero__inner">
      <p class="qb-eyebrow"><?php esc_html_e('Collections', 'dawp'); ?></p>
      <h1 class="qb-title"><?php esc_html_e('Three collections. One mechanical heart.', 'dawp'); ?></h1>
      <p class="qb-copy"><?php esc_html_e('Every Corvel runs on an automatic, self-winding movement — no quartz, no battery. What changes between collections is the case, the finishing, and what the watch is built to do.', 'dawp'); ?></p>
      <div class="qb-actions">
        <a class="qb-button" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop All Watches', 'dawp'); ?></a>
        <a class="qb-button qb-button--ghost" href="<?php echo esc_url(home_url('/warranty/')); ?>"><?php esc_html_e('2-Year Warranty', 'dawp'); ?></a>
      </div>
    </div>
  </section>

  <section class="qb-collections">
    <div class="qb-wrap">
      <?php $i = 0; foreach ($collections as $collection) : $i++; ?>
        <?php $image = function_exists('qb_theme_asset_image_url') ? qb_theme_asset_image_url($collection['image']) : ''; ?>
        <article class="qb-collection">
          <div class="qb-collection__media">
            <?php if ($image) : ?>
              <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($collection['name']); ?>" loading="lazy" width="1200" height="900">
            <?php endif; ?>
          </div>
          <div class="qb-collection__body">
            <span class="qb-collection__index"><?php echo esc_html(sprintf('%02d', $i)); ?></span>
            <h2><?php echo esc_html($collection['name']); ?></h2>
            <p class="qb-collection__lead"><?php echo esc_html($collection['headline']); ?></p>
            <p><?php echo esc_html($collection['intro']); ?></p>
            <ul class="qb-collection__tags">
              <?php foreach ($collection['highlights'] as $highlight) : ?>
                <li><?php echo esc_html($highlight); ?></li>
              <?php endforeach; ?>
            </ul>
            <div class="qb-actions">
              <a class="qb-button" href="<?php echo esc_url($collection['url']); ?>"><?php echo esc_html(sprintf(__('Shop %s', 'dawp'), $collection['name'])); ?></a>
            </div>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </section>

  <section class="qb-note">
    <div class="qb-wrap qb-note__inner">
      <div>
        <h2><?php esc_html_e('Covered for two years, whichever you choose.', 'dawp'); ?></h2>
        <p><?php esc_html_e('Foundry, Frontier, and Prestige are all backed by the Corvel 2-Year Limited Warranty against defects in the movement and in materials and workmanship.', 'dawp'); ?></p>
      </div>
      <a class="qb-button" href="<?php echo esc_url(home_url('/warranty/')); ?>"><?php esc_html_e('Read the Warranty', 'dawp'); ?></a>
    </div>
  </section>
</div>
