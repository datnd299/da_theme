<?php
/**
 * Theme header.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email = 'support@megamalldepot.com';
$home_url      = home_url('/');
$shop_url      = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$contact_url   = home_url('/contact-us/');
$about_url     = home_url('/about-us/');
$account_url   = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');
$cart_url      = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$cart_count    = (function_exists('WC') && WC()->cart) ? WC()->cart->get_cart_contents_count() : 0;
$logo_path     = get_template_directory() . '/assets/img/about/Capture.JPG';
$logo_url      = get_template_directory_uri() . '/assets/img/about/Capture.JPG';

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

if (!$account_url) {
    $account_url = home_url('/my-account/');
}

if (file_exists($logo_path)) {
    $logo_url = add_query_arg('ver', filemtime($logo_path), $logo_url);
}

$current_path = function_exists('dawp_current_request_path') ? dawp_current_request_path() : trim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '', '/');
$nav_items = [
    ['title' => __('Home', 'dawp'), 'url' => $home_url, 'active' => is_front_page() || '' === $current_path],
    ['title' => __('Shop', 'dawp'), 'url' => $shop_url, 'active' => (function_exists('is_shop') && is_shop()) || (function_exists('is_product_taxonomy') && is_product_taxonomy()) || (function_exists('is_product') && is_product())],
    ['title' => __('Contact', 'dawp'), 'url' => $contact_url, 'active' => 'contact-us' === $current_path],
    ['title' => __('About', 'dawp'), 'url' => $about_url, 'active' => 'about-us' === $current_path],
];

/**
 * Per-page meta description.
 *
 * Reuses the same page data already defined in inc/virtual-pages.php so the
 * static pages (About, FAQ, Contact, Shipping, Returns, Terms, Privacy,
 * Track Order) and the homepage keep one single source of truth. Shop,
 * product-category and single-product pages get their own description here.
 * Only prints when Rank Math isn't active, so we never output a duplicate
 * <meta name="description"> once the SEO plugin takes over.
 */
$dawp_meta_description = '';

if (!defined('RANK_MATH_VERSION')) {
    if (function_exists('dawp_virtual_page_is_active') && ($dawp_vp_page = dawp_virtual_page_is_active())) {
        $dawp_meta_description = $dawp_vp_page['desc'] ?? '';
    } elseif ((is_front_page() || is_home()) && function_exists('dawp_home_page_seo_data')) {
        $dawp_home_seo = dawp_home_page_seo_data();
        $dawp_meta_description = $dawp_home_seo['desc'] ?? '';
    } elseif (function_exists('is_shop') && is_shop()) {
        $dawp_meta_description = __('Shop MegaMallDepot for everyday essentials across home, electronics, outdoors, toys, beauty, pets and school supplies, with fast US shipping and easy 30-day returns.', 'dawp');
    } elseif (function_exists('is_product_category') && is_product_category()) {
        $dawp_term = get_queried_object();
        if ($dawp_term && !is_wp_error($dawp_term)) {
            $dawp_cat_desc = trim(wp_strip_all_tags($dawp_term->description ?? ''));
            $dawp_meta_description = $dawp_cat_desc !== ''
                ? $dawp_cat_desc
                : sprintf(__('Shop %s at MegaMallDepot: everyday essentials selected for real households, with fast US shipping and easy returns.', 'dawp'), $dawp_term->name);
        }
    } elseif (function_exists('is_product') && is_product()) {
        $dawp_product = function_exists('wc_get_product') ? wc_get_product(get_the_ID()) : null;
        if ($dawp_product) {
            $dawp_excerpt = trim(wp_strip_all_tags($dawp_product->get_short_description() ?: $dawp_product->get_description()));
            $dawp_meta_description = $dawp_excerpt !== ''
                ? wp_html_excerpt($dawp_excerpt, 160, '…')
                : sprintf(__('Buy %s at MegaMallDepot. Fast US shipping, secure checkout and easy 30-day returns.', 'dawp'), $dawp_product->get_name());
        }
    }
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ($dawp_meta_description) : ?>
    <meta name="description" content="<?php echo esc_attr($dawp_meta_description); ?>">
    <?php endif; ?>

    <style>
        :root { --tgm-accent:#A45A3F; --tgm-accent-dark:#7F422F; --tgm-ink:#2B2B2B; --tgm-text:#4A4A4A; --tgm-muted:#746B64; --tgm-line:#E8E5DF; --tgm-soft:#F8F5F0; --tgm-white:#FFFFFF; }
        body { font-family:Inter, "Avenir Next", Arial, sans-serif; color:var(--tgm-text); letter-spacing:0; text-rendering:optimizeLegibility; }
        html { scroll-behavior:smooth; }
        .tgm-skip { position:absolute; left:-999px; top:auto; width:1px; height:1px; overflow:hidden; }
        .tgm-skip:focus { position:fixed; left:16px; top:16px; z-index:100; width:auto; height:auto; border-radius:4px; background:#fff; padding:12px 16px; color:var(--tgm-accent); font-weight:800; box-shadow:0 12px 32px rgba(43,43,43,.16); }
        .tgm-header { position:sticky; top:0; z-index:50; border-bottom:1px solid var(--tgm-line); background:rgba(255,255,255,.96); box-shadow:0 8px 22px rgba(43,43,43,.06); backdrop-filter:saturate(160%) blur(12px); }
        .tgm-header__inner { width:min(100% - 32px,1280px); margin-inline:auto; }
        .tgm-header__main { display:grid; grid-template-columns:minmax(230px,340px) minmax(260px,1fr) minmax(230px,340px); grid-template-areas:"search logo actions"; align-items:center; gap:22px; min-height:72px; }
        .tgm-logo { grid-area:logo; display:inline-flex; align-items:center; justify-content:center; justify-self:center; flex:none; color:var(--tgm-ink); line-height:1; text-align:center; text-decoration:none; }
        .tgm-logo img { display:block; width:auto; height:46px; max-width:min(220px, 34vw); object-fit:contain; }
        .tgm-header-search { grid-area:search; justify-self:start; width:min(100%,340px); }
        .tgm-search { display:flex; align-items:center; min-width:0; border:1px solid var(--tgm-ink); border-radius:0; background:#fff; overflow:hidden; }
        .tgm-search input { width:100%; min-height:32px; border:0; padding:0 10px; outline:0; color:var(--tgm-ink); font-size:.82rem; }
        .tgm-search button { display:inline-flex; align-items:center; justify-content:center; width:32px; align-self:stretch; border:0; background:var(--tgm-ink); color:#fff; cursor:pointer; }
        .tgm-actions { grid-area:actions; justify-self:end; display:flex; align-items:flex-start; gap:20px; }
        .tgm-icon-link, .tgm-menu-toggle { position:relative; display:inline-flex; flex-direction:column; align-items:center; justify-content:center; gap:6px; min-width:45px; min-height:46px; border:0; border-radius:0; background:transparent; color:var(--tgm-ink); font-size:.72rem; font-weight:400; line-height:1.2; text-align:center; text-decoration:none; transition:background .16s, color .16s, border-color .16s; }
        .tgm-icon-link:hover, .tgm-menu-toggle:hover { border-color:var(--tgm-accent); color:var(--tgm-accent); background:var(--tgm-soft); }
        .tgm-icon-link span:not(.tgm-cart-count) { display:block; white-space:nowrap; }
        .tgm-search-toggle { display:none; }
        .tgm-cart { background:transparent; color:var(--tgm-ink); border-color:transparent; }
        .tgm-cart:hover { background:var(--tgm-soft); color:var(--tgm-accent); }
        .tgm-cart-count { position:absolute; right:-6px; top:-7px; display:flex; align-items:center; justify-content:center; min-width:21px; height:21px; border:2px solid #fff; border-radius:999px; background:var(--tgm-accent); color:#fff; padding:0 5px; font-size:11px; font-weight:900; }
        .tgm-desktop-nav { border-top:1px solid transparent; }
        .tgm-nav { display:flex; justify-content:center; align-items:center; gap:42px; min-height:42px; overflow-x:auto; scrollbar-width:none; }
        .tgm-nav::-webkit-scrollbar { display:none; }
        .tgm-nav a { flex:none; border-radius:2px; padding:9px 12px 11px; color:var(--tgm-ink); font-size:.78rem; font-weight:700; letter-spacing:.05em; line-height:1.25; text-decoration:none; text-transform:uppercase; transition:background .16s, color .16s; }
        .tgm-nav a:hover { background:var(--tgm-soft); color:var(--tgm-accent); }
        .tgm-nav a.is-current { color:var(--tgm-accent); background:transparent; box-shadow:inset 0 -2px var(--tgm-accent); }
        .tgm-mobile-panel { display:none; border-top:1px solid var(--tgm-line); background:#fff; padding:12px 0 14px; }
        .tgm-mobile-panel.is-open { display:block; }
        .tgm-mobile-search-panel { padding:12px 0; }
        .tgm-mobile-nav { display:grid; gap:5px; margin-top:8px; }
        .tgm-mobile-nav a { border-radius:2px; background:var(--tgm-soft); padding:11px 12px; color:var(--tgm-text); font-size:.92rem; font-weight:600; text-decoration:none; }
        .tgm-mobile-nav a.is-current { background:var(--tgm-ink); color:#fff; }
        @media (max-width: 960px) {
            .tgm-desktop-nav, .tgm-account-link { display:none; }
            .tgm-header__main { display:flex; justify-content:space-between; gap:12px; min-height:64px; }
            .tgm-header-search { display:none; }
            .tgm-logo img { height:40px; max-width:170px; }
            .tgm-actions { justify-self:end; }
            .tgm-search-toggle { display:inline-flex; }
            .tgm-icon-link, .tgm-menu-toggle { min-width:38px; width:38px; height:38px; border:1px solid var(--tgm-line); background:#fff; }
            .tgm-icon-link span:not(.tgm-cart-count) { display:none; }
        }
        @media (min-width: 961px) { .tgm-menu-toggle { display:none; } }
        @media (max-width: 520px) {
            .tgm-header__inner { width:min(100% - 24px,1280px); }
            .tgm-logo img { height:34px; max-width:142px; }
            .tgm-actions { gap:8px; }
            .tgm-icon-link, .tgm-menu-toggle { width:38px; height:38px; }
            .tgm-cart-count { right:-5px; top:-6px; min-width:19px; height:19px; font-size:10px; }
        }
    </style>

    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-white antialiased'); ?>>
<?php wp_body_open(); ?>

<a href="#content" class="tgm-skip"><?php esc_html_e('Skip to content', 'dawp'); ?></a>

<header id="site-header" class="tgm-header" role="banner">
    <div class="tgm-header__inner tgm-header__main">
        <a href="<?php echo esc_url($home_url); ?>" class="tgm-logo" aria-label="<?php esc_attr_e('MegaMallDepot home', 'dawp'); ?>">
            <?php
            echo function_exists('dawp_get_responsive_image')
                ? dawp_get_responsive_image($logo_url, __('MegaMallDepot', 'dawp'), '', 220, 64, 'eager', '(max-width: 520px) 142px, (max-width: 960px) 170px, 220px', 'high')
                : '<img src="' . esc_url($logo_url) . '" width="220" height="64" alt="' . esc_attr__('MegaMallDepot', 'dawp') . '" decoding="async" fetchpriority="high">';
            ?>
        </a>

        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="tgm-search tgm-header-search">
            <label class="screen-reader-text" for="header-product-search"><?php esc_html_e('Search products', 'dawp'); ?></label>
            <input id="header-product-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search room essentials and home finds', 'dawp'); ?>">
            <input type="hidden" name="post_type" value="product">
            <button type="submit" aria-label="<?php esc_attr_e('Submit product search', 'dawp'); ?>">
                <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><path d="m16 16 4 4"></path></svg>
            </button>
        </form>

        <div class="tgm-actions">
            <button type="button" class="tgm-icon-link tgm-search-toggle" aria-expanded="false" aria-label="<?php esc_attr_e('Open product search', 'dawp'); ?>" aria-controls="mobile-search-panel" onclick="const panel=document.getElementById('mobile-search-panel'); const input=document.getElementById('mobile-product-search'); const expanded=this.getAttribute('aria-expanded')==='true'; this.setAttribute('aria-expanded', String(!expanded)); panel.classList.toggle('is-open'); if (!expanded && input) { window.setTimeout(() => input.focus(), 80); }">
                <svg viewBox="0 0 24 24" width="21" height="21" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><path d="m16 16 4 4"></path></svg>
            </button>
            <a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="tgm-icon-link" aria-label="<?php esc_attr_e('Track order', 'dawp'); ?>">
                <svg viewBox="0 0 24 24" width="21" height="21" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 7h11v10H3z"></path><path d="M14 10h4l3 3v4h-7z"></path><circle cx="7" cy="19" r="2"></circle><circle cx="18" cy="19" r="2"></circle></svg>
                <span><?php esc_html_e('Track Order', 'dawp'); ?></span>
            </a>
            <a href="<?php echo esc_url($account_url); ?>" class="tgm-icon-link tgm-account-link" aria-label="<?php esc_attr_e('My account', 'dawp'); ?>">
                <svg viewBox="0 0 24 24" width="21" height="21" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 21a8 8 0 0 0-16 0"></path><circle cx="12" cy="7" r="4"></circle></svg>
                <span><?php esc_html_e('Account', 'dawp'); ?></span>
            </a>
            <a href="<?php echo esc_url($cart_url); ?>" class="tgm-icon-link tgm-cart" aria-label="<?php esc_attr_e('Shopping cart', 'dawp'); ?>">
                <svg viewBox="0 0 24 24" width="21" height="21" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.7 13.4a2 2 0 0 0 2 1.6h8.8a2 2 0 0 0 2-1.6L22 6H6"></path></svg>
                <?php if ($cart_count > 0) : ?><span class="tgm-cart-count"><?php echo esc_html($cart_count); ?></span><?php endif; ?>
                <span><?php echo esc_html(sprintf(__('Cart (%d)', 'dawp'), $cart_count)); ?></span>
            </a>
            <button type="button" class="tgm-menu-toggle" aria-expanded="false" aria-label="<?php esc_attr_e('Open store menu', 'dawp'); ?>" aria-controls="mobile-store-menu" onclick="const menu=document.getElementById('mobile-store-menu'); const expanded=this.getAttribute('aria-expanded')==='true'; this.setAttribute('aria-expanded', String(!expanded)); menu.classList.toggle('is-open');">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="4" y1="7" x2="20" y2="7"></line><line x1="4" y1="12" x2="20" y2="12"></line><line x1="4" y1="17" x2="20" y2="17"></line></svg>
            </button>
        </div>
    </div>

    <div class="tgm-desktop-nav">
        <nav class="tgm-header__inner tgm-nav" aria-label="<?php esc_attr_e('Primary navigation', 'dawp'); ?>">
            <?php foreach ($nav_items as $item) : ?>
                <a class="<?php echo $item['active'] ? 'is-current' : ''; ?>" href="<?php echo esc_url($item['url']); ?>"<?php echo $item['active'] ? ' aria-current="page"' : ''; ?>><?php echo esc_html($item['title']); ?></a>
            <?php endforeach; ?>
        </nav>
    </div>

    <div id="mobile-search-panel" class="tgm-mobile-panel tgm-mobile-search-panel">
        <div class="tgm-header__inner">
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="tgm-search">
                <label class="screen-reader-text" for="mobile-product-search"><?php esc_html_e('Search products', 'dawp'); ?></label>
                <input id="mobile-product-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search products', 'dawp'); ?>">
                <input type="hidden" name="post_type" value="product">
                <button type="submit" aria-label="<?php esc_attr_e('Submit product search', 'dawp'); ?>">
                    <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><path d="m16 16 4 4"></path></svg>
                </button>
            </form>
        </div>
    </div>

    <div id="mobile-store-menu" class="tgm-mobile-panel">
        <div class="tgm-header__inner">
            <nav class="tgm-mobile-nav" aria-label="<?php esc_attr_e('Mobile store navigation', 'dawp'); ?>">
                <?php foreach ($nav_items as $item) : ?>
                    <a class="<?php echo $item['active'] ? 'is-current' : ''; ?>" href="<?php echo esc_url($item['url']); ?>"<?php echo $item['active'] ? ' aria-current="page"' : ''; ?>><?php echo esc_html($item['title']); ?></a>
                <?php endforeach; ?>
            </nav>
        </div>
    </div>
</header>

<div id="content" class="site-content">
