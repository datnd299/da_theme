<?php
/**
 * 404 Not Found - ShopGraphicshirt
 */
get_header();

$shop_url = function_exists('wc_get_page_id') && wc_get_page_id('shop') > 0
    ? get_permalink(wc_get_page_id('shop'))
    : home_url('/shop/');

$category_sections = function_exists('dawp_megamenu_sections') ? dawp_megamenu_sections() : [
    [
        'title' => __('Shop by Collections', 'dawp'),
        'links' => [
            ['title' => __('Cap', 'dawp'), 'url' => home_url('/product-category/cap/')],
            ['title' => __('Flag', 'dawp'), 'url' => home_url('/product-category/flag/')],
            ['title' => __('Hoodie', 'dawp'), 'url' => home_url('/product-category/hoodie/')],
            ['title' => __('Jacket', 'dawp'), 'url' => home_url('/product-category/jacket/')],
            ['title' => __('T-Shirt', 'dawp'), 'url' => home_url('/product-category/t-shirt/')],
        ],
    ],
];

$help_links = [
    ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/')],
    ['title' => __('Shipping Policy', 'dawp'), 'url' => home_url('/shipping-policy/')],
    ['title' => __('Returns & Refunds', 'dawp'), 'url' => home_url('/refund-return-policy/')],
    ['title' => __('FAQ', 'dawp'), 'url' => home_url('/faq/')],
    ['title' => __('Contact Support', 'dawp'), 'url' => home_url('/contact-us/')],
];
?>

<main class="sgs-home sgs-page sgs-404-page">
  <style>
    .sgs-404-page{background:var(--white);color:var(--ink)}
    .sgs-404-hero{position:relative;overflow:hidden;background:linear-gradient(90deg,rgba(11,31,58,.97),rgba(11,31,58,.88) 52%,rgba(179,25,66,.76)),var(--navy);color:var(--white)}
    .sgs-404-hero__inner{width:min(100% - 48px,1180px);margin:0 auto;display:grid;grid-template-columns:minmax(0,1fr) 360px;gap:clamp(28px,5vw,72px);align-items:center;padding:clamp(64px,9vw,118px) 0}
    .sgs-404-hero__copy{max-width:700px}
    .sgs-404-kicker{display:inline-flex;align-items:center;gap:10px;margin:0 0 14px;color:var(--gold);font-family:var(--font-heading);font-size:.78rem;font-weight:800;letter-spacing:.16em;text-transform:uppercase}
    .sgs-404-kicker:before{content:"";width:34px;height:2px;background:var(--gold)}
    .sgs-404-hero h1{margin:0;font-family:var(--font-heading);font-size:clamp(2.25rem,5vw,4.75rem);font-weight:800;letter-spacing:0;line-height:1.02;color:var(--white)}
    .sgs-404-hero p{max-width:620px;margin:18px 0 0;color:rgba(255,255,255,.82);font-size:clamp(.96rem,1.4vw,1.08rem);line-height:1.75}
    .sgs-404-actions{display:flex;flex-wrap:wrap;gap:12px;margin-top:28px}
    .sgs-404-search{display:flex;width:min(100%,560px);margin-top:24px;padding:6px;border:1px solid rgba(255,255,255,.24);border-radius:var(--radius);background:rgba(255,255,255,.1)}
    .sgs-404-search label{position:absolute;width:1px;height:1px;overflow:hidden;clip:rect(0,0,0,0)}
    .sgs-404-search input{min-width:0;flex:1;border:0;background:transparent;color:var(--white);padding:0 14px;font-size:.92rem;outline:0}
    .sgs-404-search input::placeholder{color:rgba(255,255,255,.68)}
    .sgs-404-search button{height:42px;border:0;border-radius:calc(var(--radius) - 2px);background:var(--gold);color:var(--navy);padding:0 18px;font-weight:800;cursor:pointer}
    .sgs-404-badge{justify-self:end;width:min(100%,320px);aspect-ratio:1;border:1px solid rgba(255,255,255,.2);border-radius:var(--radius);display:grid;place-items:center;background:rgba(255,255,255,.08);box-shadow:0 24px 70px rgba(0,0,0,.2)}
    .sgs-404-badge span{font-family:var(--font-heading);font-size:clamp(5rem,12vw,9rem);font-weight:800;line-height:1;color:rgba(255,255,255,.92)}
    .sgs-404-body{width:min(100% - 48px,1180px);margin:0 auto;padding:clamp(42px,6vw,76px) 0}
    .sgs-404-head{display:flex;align-items:end;justify-content:space-between;gap:20px;margin-bottom:22px}
    .sgs-404-head h2{margin:0;font-family:var(--font-heading);font-size:clamp(1.45rem,3vw,2.15rem);font-weight:800;letter-spacing:0;color:var(--navy)}
    .sgs-404-head p{max-width:520px;margin:8px 0 0;color:var(--muted);font-size:.92rem;line-height:1.65}
    .sgs-404-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:16px}
    .sgs-404-card{border:1px solid var(--line);border-radius:var(--radius);background:var(--white);padding:22px;box-shadow:var(--shadow-sm)}
    .sgs-404-card h3{margin:0 0 14px;font-family:var(--font-heading);font-size:1rem;font-weight:800;color:var(--ink);letter-spacing:.04em;text-transform:uppercase}
    .sgs-404-links{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:8px}
    .sgs-404-links a,.sgs-404-help a{display:flex;align-items:center;justify-content:space-between;gap:12px;border:1px solid var(--line);border-radius:6px;padding:11px 12px;color:var(--ink);font-size:.9rem;font-weight:700;text-decoration:none;transition:border-color 150ms,color 150ms,background 150ms}
    .sgs-404-links a:after,.sgs-404-help a:after{content:"›";color:var(--red);font-size:1.1rem;line-height:1}
    .sgs-404-links a:hover,.sgs-404-help a:hover{border-color:rgba(179,25,66,.35);background:#fff7f7;color:var(--red)}
    .sgs-404-footer{display:grid;grid-template-columns:1fr minmax(260px,360px);gap:16px;margin-top:16px}
    .sgs-404-callout{border-radius:var(--radius);background:var(--antique);padding:24px}
    .sgs-404-callout h2{margin:0;font-family:var(--font-heading);font-size:1.25rem;font-weight:800;color:var(--navy)}
    .sgs-404-callout p{margin:10px 0 0;color:var(--muted);font-size:.9rem;line-height:1.65}
    .sgs-404-help{display:grid;gap:8px}
    @media(max-width:900px){.sgs-404-hero__inner{grid-template-columns:1fr}.sgs-404-badge{justify-self:start;width:220px}.sgs-404-head{display:block}.sgs-404-grid,.sgs-404-footer{grid-template-columns:1fr}}
    @media(max-width:620px){.sgs-404-hero__inner,.sgs-404-body{width:min(100% - 32px,1180px)}.sgs-404-actions .sgs-btn,.sgs-404-search button{width:100%}.sgs-404-search{display:grid;gap:6px}.sgs-404-search input{height:42px}.sgs-404-links{grid-template-columns:1fr}.sgs-404-badge{width:180px}}
  </style>

  <section class="sgs-404-hero" aria-labelledby="sgs-404-title">
    <div class="sgs-404-hero__inner">
      <div class="sgs-404-hero__copy">
        <p class="sgs-404-kicker"><?php esc_html_e('Page not found', 'dawp'); ?></p>
        <h1 id="sgs-404-title"><?php esc_html_e('This page has moved, but the shop is ready.', 'dawp'); ?></h1>
        <p><?php esc_html_e('The link may be outdated or the product may have been moved. Search the store, browse all products, or jump into the most-used collections below.', 'dawp'); ?></p>

        <form class="sgs-404-search" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
          <label for="sgs-404-search-field"><?php esc_html_e('Search products', 'dawp'); ?></label>
          <input id="sgs-404-search-field" type="search" name="s" placeholder="<?php esc_attr_e('Search patriotic gifts, shirts, jackets...', 'dawp'); ?>">
          <input type="hidden" name="post_type" value="product">
          <button type="submit"><?php esc_html_e('Search', 'dawp'); ?></button>
        </form>

        <div class="sgs-404-actions">
          <a class="sgs-btn sgs-btn--primary sgs-btn--lg" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop All Products', 'dawp'); ?></a>
          <a class="sgs-btn sgs-btn--ghost sgs-btn--lg" href="<?php echo esc_url(home_url('/best-sellers/')); ?>"><?php esc_html_e('Best Sellers', 'dawp'); ?></a>
        </div>
      </div>
      <div class="sgs-404-badge" aria-hidden="true">
        <span>404</span>
      </div>
    </div>
  </section>

  <section class="sgs-404-body" aria-label="<?php esc_attr_e('Helpful links', 'dawp'); ?>">
    <div class="sgs-404-head">
      <div>
        <p class="sgs-eyebrow"><?php esc_html_e('Find your way', 'dawp'); ?></p>
        <h2><?php esc_html_e('Popular categories and support links', 'dawp'); ?></h2>
      </div>
      <p><?php esc_html_e('These links match the main shop navigation so visitors can recover quickly from a missing URL.', 'dawp'); ?></p>
    </div>

    <div class="sgs-404-grid">
      <?php foreach ($category_sections as $section) : ?>
        <div class="sgs-404-card">
          <h3><?php echo esc_html($section['title']); ?></h3>
          <div class="sgs-404-links">
            <?php foreach ($section['links'] as $link) : ?>
              <a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?></a>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="sgs-404-footer">
      <div class="sgs-404-callout">
        <h2><?php esc_html_e('Need help with an order?', 'dawp'); ?></h2>
        <p><?php esc_html_e('If you arrived here from an email, tracking page, or saved product link, customer support can help you find the right order or replacement page.', 'dawp'); ?></p>
      </div>
      <div class="sgs-404-help">
        <?php foreach ($help_links as $link) : ?>
          <a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?></a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
