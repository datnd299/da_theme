<?php
/**
 * Theme header — Crowdfused.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email = 'support@Crowdfused.com';
$home_url      = home_url('/');
$shop_url      = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$contact_url   = home_url('/contact-us/');
$about_url     = home_url('/about-us/');
$account_url   = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');
$cart_url      = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$cart_count    = (function_exists('WC') && WC()->cart) ? WC()->cart->get_cart_contents_count() : 0;
$logo_path     = get_template_directory() . '/assets/img/gallery/logo_crowd_cropped.png';
$logo_url      = get_template_directory_uri() . '/assets/img/gallery/logo_crowd_cropped.png';

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
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        :root { --cf-orange:#F58220; --cf-orange-dark:#E96F00; --cf-white:#FFFFFF; --cf-charcoal:#222222; --cf-text:#666666; --cf-light:#8A8A8A; --cf-bg:#FAFAFA; --cf-border:#E9ECEF; --cf-font-heading:'Manrope', 'Inter', Arial, sans-serif; --cf-font-body:'Inter', Arial, sans-serif; }
        body { font-family:var(--cf-font-body); color:var(--cf-text); letter-spacing:0; text-rendering:optimizeLegibility; }
        html { scroll-behavior:smooth; }
        .cf-skip { position:absolute; left:-999px; top:auto; width:1px; height:1px; overflow:hidden; }
        .cf-skip:focus { position:fixed; left:16px; top:16px; z-index:100; width:auto; height:auto; border-radius:8px; background:#fff; padding:12px 16px; color:var(--cf-orange); font-weight:800; box-shadow:0 12px 32px rgba(34,34,34,.16); }

        .cf-header { position:sticky; top:0; z-index:50; background:rgba(255,255,255,.96); border-bottom:1px solid var(--cf-border); backdrop-filter:saturate(160%) blur(12px); }
        .cf-header__announce { background:var(--cf-charcoal); color:#fff; }
        .cf-header__inner { width:min(100% - 40px,1280px); margin-inline:auto; }
        .cf-header__announce-row { display:flex; align-items:center; justify-content:space-between; gap:16px; min-height:36px; font-size:.78rem; font-weight:600; }
        .cf-header__announce-row a { color:#fff; text-decoration:none; opacity:.9; }
        .cf-header__announce-row a:hover { opacity:1; text-decoration:underline; text-underline-offset:3px; }

        .cf-header__main { display:grid; grid-template-columns:minmax(220px,320px) minmax(240px,1fr) minmax(220px,320px); grid-template-areas:"logo search actions"; align-items:center; gap:20px; min-height:76px; }
        .cf-logo { grid-area:logo; display:inline-flex; align-items:center; color:var(--cf-charcoal); line-height:1; text-decoration:none; }
        .cf-logo img { display:block; width:auto; height:38px; max-width:min(200px, 34vw); object-fit:contain; }

        .cf-header-search { grid-area:search; justify-self:stretch; width:100%; max-width:420px; margin-inline:auto; }
        .cf-search { display:flex; align-items:center; min-width:0; border:1.5px solid var(--cf-border); border-radius:999px; background:var(--cf-bg); overflow:hidden; transition:border-color 200ms ease; }
        .cf-search:focus-within { border-color:var(--cf-orange); }
        .cf-search input { width:100%; min-height:42px; border:0; background:transparent; padding:0 4px 0 18px; outline:0; color:var(--cf-charcoal); font-size:.86rem; }
        .cf-search input::placeholder { color:var(--cf-light); }
        .cf-search button { display:inline-flex; align-items:center; justify-content:center; width:42px; height:42px; margin:2px; border:0; border-radius:999px; background:var(--cf-orange); color:#fff; cursor:pointer; flex:none; transition:background 200ms ease; }
        .cf-search button:hover { background:var(--cf-orange-dark); }

        .cf-actions { grid-area:actions; justify-self:end; display:flex; align-items:center; gap:6px; }
        .cf-icon-link, .cf-menu-toggle { position:relative; display:inline-flex; flex-direction:column; align-items:center; justify-content:center; gap:4px; min-width:46px; min-height:46px; border:0; border-radius:12px; background:transparent; color:var(--cf-charcoal); font-size:.7rem; font-weight:600; line-height:1.2; text-align:center; text-decoration:none; cursor:pointer; transition:background 180ms ease, color 180ms ease; }
        .cf-icon-link:hover, .cf-menu-toggle:hover { background:var(--cf-bg); color:var(--cf-orange); }
        .cf-icon-link span:not(.cf-cart-count) { display:block; white-space:nowrap; }
        .cf-search-toggle { display:none; }
        .cf-cart-count { position:absolute; right:2px; top:2px; display:flex; align-items:center; justify-content:center; min-width:18px; height:18px; border:2px solid #fff; border-radius:999px; background:var(--cf-orange); color:#fff; padding:0 4px; font-size:10px; font-weight:800; }

        .cf-desktop-nav { border-top:1px solid var(--cf-border); }
        .cf-nav { display:flex; justify-content:center; align-items:center; gap:8px; min-height:48px; overflow-x:auto; scrollbar-width:none; }
        .cf-nav::-webkit-scrollbar { display:none; }
        .cf-nav a { flex:none; border-radius:999px; padding:8px 18px; color:var(--cf-text); font-family:var(--cf-font-heading); font-size:.84rem; font-weight:700; letter-spacing:.01em; line-height:1.25; text-decoration:none; transition:background 180ms ease, color 180ms ease; }
        .cf-nav a:hover { background:var(--cf-bg); color:var(--cf-orange); }
        .cf-nav a.is-current { color:var(--cf-orange); background:rgba(245,130,32,.1); }

        .cf-mobile-panel { display:none; border-top:1px solid var(--cf-border); background:#fff; padding:14px 0 16px; }
        .cf-mobile-panel.is-open { display:block; }
        .cf-mobile-search-panel { padding:14px 0; }
        .cf-mobile-nav { display:grid; gap:6px; margin-top:8px; }
        .cf-mobile-nav a { border-radius:12px; background:var(--cf-bg); padding:13px 16px; color:var(--cf-charcoal); font-family:var(--cf-font-heading); font-size:.92rem; font-weight:700; text-decoration:none; }
        .cf-mobile-nav a.is-current { background:var(--cf-orange); color:#fff; }

        @media (max-width: 960px) {
            .cf-header__announce-row { justify-content:center; text-align:center; }
            .cf-header__announce-row .cf-header__support { display:none; }
            .cf-desktop-nav, .cf-account-link { display:none; }
            .cf-header__main { display:flex; justify-content:space-between; gap:12px; min-height:66px; }
            .cf-header-search { display:none; }
            .cf-logo img { height:32px; max-width:170px; }
            .cf-search-toggle { display:inline-flex; }
            .cf-icon-link, .cf-menu-toggle { min-width:40px; width:40px; height:40px; border-radius:10px; }
            .cf-icon-link span:not(.cf-cart-count) { display:none; }
        }
        @media (min-width: 961px) { .cf-menu-toggle { display:none; } }
        @media (max-width: 520px) {
            .cf-header__inner { width:min(100% - 24px,1280px); }
            .cf-header__announce-row { min-height:34px; font-size:.72rem; line-height:1.35; }
            .cf-logo img { height:28px; max-width:140px; }
            .cf-actions { gap:2px; }
        }
    </style>

    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-white antialiased'); ?>>
<?php wp_body_open(); ?>

<a href="#content" class="cf-skip"><?php esc_html_e('Skip to content', 'dawp'); ?></a>

<header id="site-header" class="cf-header" role="banner">
    <div class="cf-header__announce">
        <div class="cf-header__inner cf-header__announce-row">
            <p><?php esc_html_e('Free Shipping on Eligible Orders — Innovation Made Everyday', 'dawp'); ?></p>
            <div class="cf-header__support">
                <a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
            </div>
        </div>
    </div>

    <div class="cf-header__inner cf-header__main">
        <a href="<?php echo esc_url($home_url); ?>" class="cf-logo" aria-label="<?php esc_attr_e('Crowdfused home', 'dawp'); ?>">
            <?php
            echo function_exists('dawp_get_responsive_image')
                ? dawp_get_responsive_image($logo_url, __('Crowdfused', 'dawp'), '', 200, 86, 'eager', '(max-width: 520px) 140px, (max-width: 960px) 170px, 200px', 'high')
                : '<img src="' . esc_url($logo_url) . '" width="200" height="86" alt="' . esc_attr__('Crowdfused', 'dawp') . '" decoding="async" fetchpriority="high">';
            ?>
        </a>

        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="cf-search cf-header-search">
            <label class="screen-reader-text" for="header-product-search"><?php esc_html_e('Search products', 'dawp'); ?></label>
            <input id="header-product-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search innovative products', 'dawp'); ?>">
            <input type="hidden" name="post_type" value="product">
            <button type="submit" aria-label="<?php esc_attr_e('Submit product search', 'dawp'); ?>">
                <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><path d="m16 16 4 4"></path></svg>
            </button>
        </form>

        <div class="cf-actions">
            <button type="button" class="cf-icon-link cf-search-toggle" aria-expanded="false" aria-label="<?php esc_attr_e('Open product search', 'dawp'); ?>" aria-controls="mobile-search-panel" onclick="const panel=document.getElementById('mobile-search-panel'); const input=document.getElementById('mobile-product-search'); const expanded=this.getAttribute('aria-expanded')==='true'; this.setAttribute('aria-expanded', String(!expanded)); panel.classList.toggle('is-open'); if (!expanded && input) { window.setTimeout(() => input.focus(), 80); }">
                <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><path d="m16 16 4 4"></path></svg>
            </button>
            <a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="cf-icon-link" aria-label="<?php esc_attr_e('Track order', 'dawp'); ?>">
                <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 7h11v10H3z"></path><path d="M14 10h4l3 3v4h-7z"></path><circle cx="7" cy="19" r="2"></circle><circle cx="18" cy="19" r="2"></circle></svg>
                <span><?php esc_html_e('Track Order', 'dawp'); ?></span>
            </a>
            <a href="<?php echo esc_url($account_url); ?>" class="cf-icon-link cf-account-link" aria-label="<?php esc_attr_e('My account', 'dawp'); ?>">
                <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 21a8 8 0 0 0-16 0"></path><circle cx="12" cy="7" r="4"></circle></svg>
                <span><?php esc_html_e('Account', 'dawp'); ?></span>
            </a>
            <a href="<?php echo esc_url($cart_url); ?>" class="cf-icon-link cf-cart" aria-label="<?php esc_attr_e('Shopping cart', 'dawp'); ?>">
                <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.7 13.4a2 2 0 0 0 2 1.6h8.8a2 2 0 0 0 2-1.6L22 6H6"></path></svg>
                <?php if ($cart_count > 0) : ?><span class="cf-cart-count"><?php echo esc_html($cart_count); ?></span><?php endif; ?>
                <span><?php echo esc_html(sprintf(__('Cart (%d)', 'dawp'), $cart_count)); ?></span>
            </a>
            <button type="button" class="cf-menu-toggle" aria-expanded="false" aria-label="<?php esc_attr_e('Open store menu', 'dawp'); ?>" aria-controls="mobile-store-menu" onclick="const menu=document.getElementById('mobile-store-menu'); const expanded=this.getAttribute('aria-expanded')==='true'; this.setAttribute('aria-expanded', String(!expanded)); menu.classList.toggle('is-open');">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="4" y1="7" x2="20" y2="7"></line><line x1="4" y1="12" x2="20" y2="12"></line><line x1="4" y1="17" x2="20" y2="17"></line></svg>
            </button>
        </div>
    </div>

    <div class="cf-desktop-nav">
        <nav class="cf-header__inner cf-nav" aria-label="<?php esc_attr_e('Primary navigation', 'dawp'); ?>">
            <?php foreach ($nav_items as $item) : ?>
                <a class="<?php echo $item['active'] ? 'is-current' : ''; ?>" href="<?php echo esc_url($item['url']); ?>"<?php echo $item['active'] ? ' aria-current="page"' : ''; ?>><?php echo esc_html($item['title']); ?></a>
            <?php endforeach; ?>
        </nav>
    </div>

    <div id="mobile-search-panel" class="cf-mobile-panel cf-mobile-search-panel">
        <div class="cf-header__inner">
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="cf-search">
                <label class="screen-reader-text" for="mobile-product-search"><?php esc_html_e('Search products', 'dawp'); ?></label>
                <input id="mobile-product-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search products', 'dawp'); ?>">
                <input type="hidden" name="post_type" value="product">
                <button type="submit" aria-label="<?php esc_attr_e('Submit product search', 'dawp'); ?>">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><path d="m16 16 4 4"></path></svg>
                </button>
            </form>
        </div>
    </div>

    <div id="mobile-store-menu" class="cf-mobile-panel">
        <div class="cf-header__inner">
            <nav class="cf-mobile-nav" aria-label="<?php esc_attr_e('Mobile store navigation', 'dawp'); ?>">
                <?php foreach ($nav_items as $item) : ?>
                    <a class="<?php echo $item['active'] ? 'is-current' : ''; ?>" href="<?php echo esc_url($item['url']); ?>"<?php echo $item['active'] ? ' aria-current="page"' : ''; ?>><?php echo esc_html($item['title']); ?></a>
                <?php endforeach; ?>
            </nav>
        </div>
    </div>
</header>

<div id="content" class="site-content">
