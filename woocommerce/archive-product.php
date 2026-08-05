<?php
/**
 * Shop / Archive Product — ShopGraphicShirt
 */
defined('ABSPATH') || exit;

get_header();

$sgs_is_best_sellers = is_product_category('best-sellers');
$sgs_shop_classes = 'sgs-shop' . ($sgs_is_best_sellers ? ' sgs-shop--best-sellers' : '');
$sgs_best_sellers_cover = get_template_directory_uri() . '/assets/img/home/cat-best-seller.png';
$sgs_default_cover = get_template_directory_uri() . '/assets/img/hero/shop-theme-hero-background.png';
$sgs_cover_image = $sgs_is_best_sellers ? $sgs_best_sellers_cover : $sgs_default_cover;
$sgs_cover_eyebrow = __('Curated Collection', 'dawp');
$sgs_cover_title = is_shop() ? __('All Products', 'dawp') : woocommerce_page_title(false);
$sgs_cover_description = __('Explore patriotic graphic shirts, apparel, and gift-ready designs made for everyday pride.', 'dawp');

if (is_shop()) {
  $sgs_cover_eyebrow = __('ShopGraphicShirt Store', 'dawp');
} elseif (is_product_tag()) {
  $sgs_cover_eyebrow = __('Tagged Collection', 'dawp');
  $sgs_cover_description = sprintf(__('Browse designs tagged with %s across our latest apparel and gift picks.', 'dawp'), $sgs_cover_title);
} elseif (is_product_category()) {
  $sgs_current_term = get_queried_object();
  $sgs_cover_eyebrow = $sgs_is_best_sellers ? __('Customer Favorites', 'dawp') : __('Featured Category', 'dawp');
  $sgs_term_description = term_description($sgs_current_term->term_id, 'product_cat');
  if ($sgs_term_description) {
    $sgs_cover_description = wp_strip_all_tags($sgs_term_description);
  } elseif ($sgs_is_best_sellers) {
    $sgs_cover_description = __('Top patriotic apparel, graphic shirts, and gift-ready pieces picked most often by ShopGraphicShirt customers.', 'dawp');
  } else {
    $sgs_cover_description = sprintf(__('Discover standout %s designs selected for comfort, detail, and patriotic style.', 'dawp'), $sgs_cover_title);
  }

  $sgs_thumbnail_id = get_term_meta($sgs_current_term->term_id, 'thumbnail_id', true);
  $sgs_thumbnail_url = $sgs_thumbnail_id ? wp_get_attachment_image_url($sgs_thumbnail_id, 'full') : '';
  if ($sgs_thumbnail_url && !$sgs_is_best_sellers) {
    $sgs_cover_image = $sgs_thumbnail_url;
  }
}
$sgs_cover_bg = sprintf(
  "--sgs-cover-image:url('%s');--sgs-cover-image-mobile:url('%s')",
  esc_url(dawp_cdn_image_url($sgs_cover_image, 1600, 640)),
  esc_url(dawp_cdn_image_url($sgs_cover_image, 720, 760))
);
?>

<div class="<?php echo esc_attr($sgs_shop_classes); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
.sgs-shop{background:var(--white);color:var(--ink);font-family:var(--font-body)}
.sgs-shop--best-sellers{background:linear-gradient(180deg,#f7f2e8 0%,#fff 360px),radial-gradient(circle at 18% 12%,rgba(179,25,66,.12),transparent 28%),radial-gradient(circle at 82% 8%,rgba(198,161,91,.18),transparent 26%);background-blend-mode:normal,multiply,normal}
.sgs-shop__container{width:min(100% - 48px,1280px);margin:0 auto;padding:24px 0 64px}
.sgs-shop-breadcrumb{display:flex;flex-wrap:wrap;gap:6px;padding:14px 0;color:var(--muted);font-size:.82rem;font-weight:500}
.sgs-shop-breadcrumb a{color:var(--muted);text-decoration:underline;text-underline-offset:2px}
.sgs-shop-breadcrumb a:hover{color:var(--red)}
.sgs-shop-breadcrumb .current{color:var(--ink);font-weight:700}
.sgs-shop-breadcrumb .sep{margin:0 6px;color:var(--line)}
.sgs-shop-header{margin-bottom:24px}
.sgs-shop-cover{position:relative;isolation:isolate;display:grid;min-height:clamp(190px,24vw,300px);align-items:end;margin-bottom:24px;overflow:hidden;border-radius:var(--radius);background-color:var(--navy);background-image:linear-gradient(90deg,rgba(11,31,58,.96) 0%,rgba(11,31,58,.82) 48%,rgba(11,31,58,.22) 100%),var(--sgs-cover-image);background-size:cover;background-position:center;color:var(--white);box-shadow:0 22px 48px rgba(11,31,58,.18)}
.sgs-shop-cover:after{content:"";position:absolute;inset:auto 0 0;height:42%;z-index:-1;background:linear-gradient(180deg,transparent,rgba(11,31,58,.86))}
.sgs-shop-cover__content{max-width:700px;padding:clamp(22px,4vw,40px)}
.sgs-shop-cover__eyebrow{display:inline-flex;margin:0 0 10px;padding:6px 10px;border:1px solid rgba(255,255,255,.32);border-radius:5px;background:rgba(255,255,255,.12);font-family:var(--font-heading);font-size:.72rem;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:rgba(255,255,255,.88)}
.sgs-shop-cover h1{margin:0;font-family:var(--font-heading);font-size:clamp(2rem,5vw,4.3rem);font-weight:900;letter-spacing:-.02em;line-height:.98;color:var(--white)}
.sgs-shop-cover p{margin:12px 0 0;color:rgba(255,255,255,.84);font-size:clamp(.94rem,1.4vw,1.08rem);line-height:1.65;max-width:560px}
.sgs-shop-header{display:none}
.sgs-shop--best-sellers .sgs-shop-toolbar{background:rgba(255,255,255,.9);box-shadow:0 10px 28px rgba(11,31,58,.08);backdrop-filter:blur(10px)}
.sgs-shop--best-sellers .sgs-shop-product{box-shadow:0 12px 28px rgba(11,31,58,.08)}
.sgs-shop-header h1{margin:0;font-family:var(--font-heading);font-size:clamp(1.6rem,3vw,2.5rem);font-weight:800;letter-spacing:-.02em;line-height:1.05;color:var(--navy)}
.sgs-shop-header p{margin:10px 0 0;color:var(--muted);font-size:.92rem;line-height:1.6;max-width:640px}
.sgs-shop-toolbar{display:flex;align-items:center;justify-content:space-between;gap:16px;margin-bottom:24px;padding:12px 16px;border:1px solid var(--line);border-radius:var(--radius)}
.sgs-shop-count{color:var(--muted);font-size:.85rem;font-weight:600}
.sgs-shop-filter-btn{display:none;align-items:center;gap:8px;height:38px;padding:0 14px;border:1.5px solid var(--line);border-radius:var(--radius);background:var(--white);color:var(--ink);font-size:.82rem;font-weight:700;cursor:pointer;transition:border-color 150ms}
.sgs-shop-filter-btn:hover{border-color:var(--red);color:var(--red)}
.sgs-shop-toolbar select{height:38px;padding:0 30px 0 12px;border:1.5px solid var(--line);border-radius:var(--radius);background:var(--white);color:var(--ink);font-size:.82rem;font-weight:600;appearance:none;background-image:url("data:image/svg+xml,%3Csvg width='10' height='6' viewBox='0 0 10 6' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1 1l4 4 4-4' stroke='%236B7280' stroke-width='1.5' stroke-linecap='round'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:right 12px center;cursor:pointer}
.sgs-shop-layout{display:grid;grid-template-columns:260px 1fr;gap:28px;align-items:start}
.sgs-shop-sidebar{position:sticky;top:100px}
.sgs-shop-sidebar__widget{margin-bottom:16px}
.sgs-shop-sidebar__title{margin:0 0 10px;font-family:var(--font-heading);font-size:.85rem;font-weight:700;color:var(--navy);letter-spacing:.04em;text-transform:uppercase}
.sgs-shop-sidebar__categories{list-style:none;padding:0;margin:0;display:grid;gap:4px}
.sgs-shop-sidebar__categories li a{display:block;padding:8px 12px;border-radius:5px;color:var(--ink);font-size:.85rem;font-weight:500;transition:background 150ms,color 150ms}
.sgs-shop-sidebar__categories li a:hover{background:var(--antique);color:var(--red)}
.sgs-shop-sidebar__categories li a[aria-current]{background:var(--red);color:var(--white);font-weight:700}
.sgs-shop-sidebar__categories .count{color:var(--muted);font-size:.78rem}
.sgs-shop-sidebar__categories li a[aria-current] .count{color:rgba(255,255,255,.7)}
.sgs-shop-sidebar__toggle{display:flex;align-items:center;justify-content:space-between;gap:8px;width:100%;padding:10px 12px;border:0;background:var(--antique);border-radius:5px;cursor:pointer;font-family:var(--font-heading);font-size:.85rem;font-weight:700;color:var(--navy);text-align:left}
.sgs-shop-sidebar__toggle-icon{transition:transform 200ms;flex:0 0 auto}
.sgs-shop-sidebar__widget--open .sgs-shop-sidebar__toggle-icon{transform:rotate(180deg)}
.sgs-shop-sidebar__panel{display:none;margin-top:8px}
.sgs-shop-sidebar__widget--open .sgs-shop-sidebar__panel{display:block}
.sgs-shop-sidebar__mobile-title{display:none}
.sgs-shop-sidebar__close{display:none}
.sgs-shop-main{min-height:40vh}
.sgs-shop-products{display:grid;grid-template-columns:repeat(3,1fr);gap:16px}
.sgs-shop-product{display:flex;flex-direction:column;padding:14px;border:1px solid var(--line);border-radius:var(--radius);background:var(--white);position:relative;transition:transform 180ms,border-color 180ms,box-shadow 180ms}
.sgs-shop-product:hover{transform:translateY(-3px);border-color:var(--red);box-shadow:0 8px 24px rgba(0,0,0,.1)}
.sgs-shop-product__badge{position:absolute;top:10px;left:10px;z-index:2;background:var(--red);color:var(--white);font-family:var(--font-heading);font-size:.68rem;font-weight:700;letter-spacing:.05em;text-transform:uppercase;padding:3px 8px;border-radius:4px}
.sgs-shop-product__img{aspect-ratio:1;background:#f5f5f5;border-radius:var(--radius);display:grid;place-items:center;margin-bottom:12px;overflow:hidden}
.sgs-shop-product__media-link{display:block;color:inherit;text-decoration:none}
.sgs-shop-product__img img{width:100%;height:100%;object-fit:cover}
.sgs-shop-product h2{margin:0 0 4px;font-family:var(--font-body);font-size:.93rem;font-weight:600;color:var(--ink);line-height:1.25;display:-webkit-box;-webkit-box-orient:vertical;-webkit-line-clamp:3;overflow:hidden}
.sgs-shop-product h2 a{color:inherit;text-decoration:none}
.sgs-shop-product h2 a:hover{color:var(--red)}
.sgs-shop-product .price{display:inline-flex;align-items:center;gap:6px;width:max-content;max-width:100%;margin-top:6px;padding:7px 10px;border:1px solid rgba(179,25,66,.18);border-radius:6px;background:rgba(179,25,66,.07);color:var(--red);font-family:var(--font-heading);font-size:1.18rem;font-weight:800;line-height:1.1;box-shadow:0 4px 12px rgba(179,25,66,.08)}
.sgs-shop-product .price del{color:var(--muted);font-family:var(--font-body);font-size:.82rem;font-weight:600;margin-right:2px}
.sgs-shop-product .price ins{text-decoration:none;color:var(--red);font-weight:800}
.sgs-shop-pagination{margin-top:40px;padding-top:28px;border-top:1px solid var(--line)}
.sgs-shop-pagination nav{display:flex;justify-content:center;width:100%}
.sgs-shop .sgs-shop-pagination ul.page-numbers{display:flex;flex-wrap:wrap;align-items:center;justify-content:center;list-style:none;margin:0;padding:0;gap:8px}
.sgs-shop .sgs-shop-pagination li .page-numbers{display:inline-flex;min-width:40px;height:40px;align-items:center;justify-content:center;padding:0 10px;border:1.5px solid var(--line);border-radius:8px;background:var(--white);color:var(--ink);font-family:var(--font-heading);font-size:.85rem;font-weight:700;text-decoration:none;transition:all 150ms}
.sgs-shop .sgs-shop-pagination li a.page-numbers:hover{border-color:var(--red);color:var(--red);background:rgba(179,25,66,.06)}
.sgs-shop .sgs-shop-pagination li .page-numbers.current{border-color:var(--red);background:var(--red);color:var(--white);box-shadow:0 6px 16px rgba(179,25,66,.22);cursor:default}
.sgs-shop .sgs-shop-pagination li .page-numbers.dots{border-color:transparent;background:transparent;color:var(--muted);min-width:20px;padding:0}
.sgs-shop .sgs-shop-pagination li a.page-numbers.next,.sgs-shop .sgs-shop-pagination li a.page-numbers.prev{color:var(--navy);font-size:1.05rem}
.sgs-shop .sgs-shop-pagination li a.page-numbers.next:hover,.sgs-shop .sgs-shop-pagination li a.page-numbers.prev:hover{background:var(--navy);border-color:var(--navy);color:var(--white)}
.sgs-shop-empty{text-align:center;padding:60px 20px;color:var(--muted);font-size:.95rem}
.sgs-shop-empty a{display:inline-block;margin-top:16px;color:var(--red);font-weight:700;text-decoration:underline;text-underline-offset:2px}
.sgs-shop-sidebar-overlay{display:none}
@media(max-width:1100px){.sgs-shop-layout{grid-template-columns:1fr}.sgs-shop-filter-btn{display:inline-flex}.sgs-shop-sidebar{position:fixed;top:0;left:0;z-index:100;width:min(100% - 48px,360px);height:100dvh;overflow-y:auto;background:var(--white);padding:24px 20px;transform:translateX(-100%);transition:transform 250ms;box-shadow:0 0 40px rgba(0,0,0,.2)}
.sgs-shop-sidebar.is-open{transform:translateX(0)}
.sgs-shop-sidebar__header{display:flex;align-items:center;justify-content:space-between;margin-bottom:20px}
.sgs-shop-sidebar__mobile-title{display:block;margin:0;font-family:var(--font-heading);font-size:1.1rem;font-weight:700;color:var(--ink)}
.sgs-shop-sidebar__close{display:inline-flex;width:36px;height:36px;align-items:center;justify-content:center;border:1px solid var(--line);border-radius:5px;background:var(--white);color:var(--ink);cursor:pointer;font-size:1rem}
.sgs-shop-sidebar-overlay{display:block;position:fixed;inset:0;z-index:99;background:rgba(0,0,0,.4);opacity:0;pointer-events:none;transition:opacity 250ms}
.sgs-shop-sidebar-overlay.is-open{opacity:1;pointer-events:auto}
.sgs-shop-products{grid-template-columns:repeat(2,1fr)}}
@media(max-width:640px){.sgs-shop__container{width:min(100% - 32px,1280px)}.sgs-shop-cover{min-height:250px;background-image:linear-gradient(180deg,rgba(11,31,58,.52) 0%,rgba(11,31,58,.96) 100%),var(--sgs-cover-image-mobile,var(--sgs-cover-image));background-position:center top}.sgs-shop-cover__content{padding:22px}.sgs-shop-products{grid-template-columns:repeat(2,1fr);gap:10px}.sgs-shop-toolbar{flex-wrap:wrap}.sgs-shop-toolbar select{width:100%}}
</style>

<div class="sgs-shop__container">
  <nav class="sgs-shop-breadcrumb" aria-label="Breadcrumb">
    <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
    <span aria-hidden="true" class="sep">›</span>
    <?php if (is_product_category()) :
      $cat = get_queried_object(); ?>
      <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>">Shop</a>
      <span aria-hidden="true" class="sep">›</span>
      <span class="current"><?php echo esc_html($cat->name); ?></span>
    <?php elseif (is_product_tag()) :
      $tag = get_queried_object(); ?>
      <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>">Shop</a>
      <span aria-hidden="true" class="sep">›</span>
      <span class="current"><?php echo esc_html($tag->name); ?></span>
    <?php else : ?>
      <span class="current">Shop</span>
    <?php endif; ?>
  </nav>

  <section class="sgs-shop-cover" style="<?php echo esc_attr($sgs_cover_bg); ?>" aria-labelledby="sgsShopCoverTitle">
    <div class="sgs-shop-cover__content">
      <p class="sgs-shop-cover__eyebrow"><?php echo esc_html($sgs_cover_eyebrow); ?></p>
      <h1 id="sgsShopCoverTitle"><?php echo esc_html($sgs_cover_title); ?></h1>
      <p><?php echo esc_html($sgs_cover_description); ?></p>
    </div>
  </section>

  <div class="sgs-shop-header">
    <h1>
      <?php
      if (is_product_category() || is_product_tag()) {
        woocommerce_page_title();
      } else {
        echo 'All Products';
      }
      ?>
    </h1>
    <?php if (is_product_category() || is_product_tag()) :
      $desc = term_description();
      if ($desc) : ?>
        <p><?php echo wp_kses_post(wpautop($desc)); ?></p>
      <?php endif;
    endif; ?>
  </div>

  <div class="sgs-shop-toolbar">
    <div style="display:flex;align-items:center;gap:10px">
      <span class="sgs-shop-count">
        <?php
        global $wp_query;
        $total = $wp_query->found_posts;
        printf('%d %s', $total, $total === 1 ? 'product' : 'products');
        ?>
      </span>
      <button class="sgs-shop-filter-btn" id="sgsFilterBtn" aria-expanded="false" aria-controls="sgsSidebar">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="4" y1="6" x2="20" y2="6"/><line x1="8" y1="12" x2="20" y2="12"/><line x1="12" y1="18" x2="20" y2="18"/></svg>
        Filter
      </button>
    </div>
    <?php woocommerce_catalog_ordering(); ?>
  </div>

  <div class="sgs-shop-sidebar-overlay" id="sgsSidebarOverlay" aria-hidden="true"></div>

  <div class="sgs-shop-layout">
    <aside class="sgs-shop-sidebar" id="sgsSidebar">
      <div class="sgs-shop-sidebar__header">
        <h2 class="sgs-shop-sidebar__mobile-title">Filter Products</h2>
        <button class="sgs-shop-sidebar__close" id="sgsSidebarClose" aria-label="Close filters">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
        </button>
      </div>

      <div class="sgs-shop-sidebar__widget sgs-shop-sidebar__widget--open">
        <h3 class="sgs-shop-sidebar__title">Shop</h3>
        <ul class="sgs-shop-sidebar__categories">
          <li><a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" <?php if (is_shop()) echo 'aria-current="page"'; ?>>All Products</a></li>
        </ul>
      </div>

      <?php
      $mega_sections = function_exists('dawp_megamenu_sections') ? dawp_megamenu_sections() : [];
      foreach ($mega_sections as $si => $section) :
        if (empty($section['links'])) continue;
        $items = [];
        $has_current = false;
        foreach ($section['links'] as $link) {
          $path = trim(parse_url($link['url'], PHP_URL_PATH) ?? '', '/');
          $slug = basename($path);
          $term = $slug ? get_term_by('slug', $slug, 'product_cat') : false;
          if (!$term || is_wp_error($term)) continue;
          $is_cur = is_product_category($term->slug);
          if ($is_cur) $has_current = true;
          $items[] = ['title' => $link['title'], 'term' => $term, 'is_current' => $is_cur];
        }
        if (empty($items)) continue;
        $panel_id = 'sgs-sidebar-section-' . $si;
        $is_open = $has_current || $section['title'] === __('Shop by Collections', 'dawp');
      ?>
      <div class="sgs-shop-sidebar__widget sgs-shop-sidebar__widget--accordion <?php echo $is_open ? 'sgs-shop-sidebar__widget--open' : ''; ?>">
        <h3 class="sgs-shop-sidebar__title">
          <button class="sgs-shop-sidebar__toggle" type="button" aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>" aria-controls="<?php echo esc_attr($panel_id); ?>">
            <span><?php echo esc_html($section['title']); ?></span>
            <svg class="sgs-shop-sidebar__toggle-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg>
          </button>
        </h3>
        <ul class="sgs-shop-sidebar__categories sgs-shop-sidebar__panel" id="<?php echo esc_attr($panel_id); ?>">
          <?php foreach ($items as $item) : ?>
            <li><a href="<?php echo esc_url(get_term_link($item['term'])); ?>" <?php if ($item['is_current']) echo 'aria-current="page"'; ?>><?php echo esc_html($item['title']); ?> <span class="count">(<?php echo (int) $item['term']->count; ?>)</span></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <?php endforeach; ?>

      <?php if (is_active_sidebar('shop-sidebar')) dynamic_sidebar('shop-sidebar'); ?>
    </aside>

    <main class="sgs-shop-main">
      <?php if (woocommerce_product_loop()) : ?>
        <div class="sgs-shop-products">
          <?php while (have_posts()) : the_post();
            global $product;
            $product_url = get_permalink($product->get_id()); ?>
            <div class="sgs-shop-product">
              <?php if ($product->is_on_sale()) : ?>
                <span class="sgs-shop-product__badge">Sale</span>
              <?php endif; ?>
              <a class="sgs-shop-product__media-link" href="<?php echo esc_url($product_url); ?>" aria-label="<?php echo esc_attr($product->get_name()); ?>">
              <div class="sgs-shop-product__img">
                <?php if ($product->get_image()) : ?>
                  <?php echo dawp_product_responsive_image($product, '', '(max-width: 640px) calc(100vw - 92px), (max-width: 1100px) calc((100vw - 88px) / 2), 300px'); ?>
                <?php else : ?>
                  <span style="color:var(--muted);font-size:2.5rem;opacity:.3">👕</span>
                <?php endif; ?>
              </div>
              </a>
              <h2><a href="<?php echo esc_url($product_url); ?>"><?php echo esc_html($product->get_name()); ?></a></h2>
              <span class="price"><?php echo $product->get_price_html(); ?></span>
            </div>
          <?php endwhile; ?>
        </div>
        <div class="sgs-shop-pagination">
          <?php do_action('woocommerce_after_shop_loop'); ?>
        </div>
      <?php else : ?>
        <div class="sgs-shop-empty">
          <p>No products found in this collection.</p>
          <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>">Browse all products →</a>
        </div>
      <?php endif; ?>
    </main>
  </div>
</div>
</div>

<script>
(function(){
  var btn = document.getElementById('sgsFilterBtn');
  var sidebar = document.getElementById('sgsSidebar');
  var overlay = document.getElementById('sgsSidebarOverlay');
  var closeBtn = document.getElementById('sgsSidebarClose');
  function open(){sidebar.classList.add('is-open');overlay.classList.add('is-open');overlay.removeAttribute('aria-hidden');btn.setAttribute('aria-expanded','true');document.body.style.overflow='hidden'}
  function close(){sidebar.classList.remove('is-open');overlay.classList.remove('is-open');overlay.setAttribute('aria-hidden','true');btn.setAttribute('aria-expanded','false');document.body.style.overflow=''}
  if(btn&&sidebar){btn.addEventListener('click',open)}
  if(overlay){overlay.addEventListener('click',close)}
  if(closeBtn){closeBtn.addEventListener('click',close)}
  sidebar.querySelectorAll('.sgs-shop-sidebar__toggle').forEach(function(t){
    t.addEventListener('click',function(){
      var w=t.closest('.sgs-shop-sidebar__widget--accordion');
      var o=w.classList.toggle('sgs-shop-sidebar__widget--open');
      t.setAttribute('aria-expanded',String(o));
    });
  });
  document.addEventListener('keydown',function(e){
    if(e.key==='Escape'&&sidebar.classList.contains('is-open')){close()}
  });
})();
</script>

<?php get_footer(); ?>
