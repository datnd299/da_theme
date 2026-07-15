<?php
/**
 * Theme header.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email = 'support@topgoodmart.com';
$home_url      = home_url('/');
$shop_url      = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$account_url   = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');
$cart_url      = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$cart_count    = (function_exists('WC') && WC()->cart) ? WC()->cart->get_cart_contents_count() : 0;
$logo_path     = get_template_directory() . '/assets/img/home/5f4f0066-d0af-4d77-af44-11e501dd5cc9 (1).png';
$logo_url      = get_template_directory_uri() . '/assets/img/home/5f4f0066-d0af-4d77-af44-11e501dd5cc9 (1).png';

if (file_exists($logo_path)) {
    $logo_url = add_query_arg('ver', filemtime($logo_path), $logo_url);
}

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

if (!$account_url) {
    $account_url = home_url('/my-account/');
}

$nav_items = [
    ['title' => __('Home Essentials', 'dawp'), 'url' => home_url('/product-category/home-essentials/')],
    ['title' => __('Furniture', 'dawp'), 'url' => home_url('/product-category/furniture/')],
    ['title' => __('Electronics', 'dawp'), 'url' => home_url('/product-category/electronics/')],
    ['title' => __('Smart Home', 'dawp'), 'url' => home_url('/product-category/smart-home/')],
    ['title' => __('Kitchen & Dining', 'dawp'), 'url' => home_url('/product-category/kitchen-dining/')],
    ['title' => __('Outdoor & Garden', 'dawp'), 'url' => home_url('/product-category/outdoor-garden/')],
];
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <style>
        :root { --tgm-blue:#0046BE; --tgm-yellow:#FFE000; --tgm-ink:#111827; --tgm-text:#1F2937; --tgm-muted:#6B7280; --tgm-line:#E5E7EB; --tgm-soft:#F5F6F8; }
        body { font-family:"Avenir Next for Best Buy", "Avenir Next", Avenir, Arial, "Helvetica Neue", Helvetica, sans-serif; color:var(--tgm-text); letter-spacing:0; text-rendering:optimizeLegibility; }
        html { scroll-behavior:smooth; }
        .tgm-skip { position:absolute; left:-999px; top:auto; width:1px; height:1px; overflow:hidden; }
        .tgm-skip:focus { position:fixed; left:16px; top:16px; z-index:100; width:auto; height:auto; border-radius:8px; background:#fff; padding:12px 16px; color:var(--tgm-blue); font-weight:800; box-shadow:0 12px 32px rgba(17,24,39,.18); }
        .tgm-header { position:sticky; top:0; z-index:50; border-bottom:1px solid #d9e1ee; background:#fff; box-shadow:0 6px 20px rgba(17,24,39,.06); }
        .tgm-header__top { background:var(--tgm-blue); color:#fff; }
        .tgm-header__inner { width:min(100% - 32px,1280px); margin-inline:auto; }
        .tgm-header__top-row { display:flex; align-items:center; justify-content:space-between; gap:16px; min-height:36px; font-size:.82rem; font-weight:700; }
        .tgm-header__top-links { display:flex; align-items:center; gap:18px; white-space:nowrap; }
        .tgm-header__main { display:grid; grid-template-columns:auto 1fr auto; align-items:center; gap:18px; min-height:78px; }
        .tgm-logo { display:inline-flex; align-items:center; flex:none; }
        .tgm-logo img { display:block; width:auto; height:40px; max-width:196px; object-fit:contain; }
        .tgm-search { display:flex; align-items:center; min-width:0; border:2px solid var(--tgm-blue); border-radius:8px; background:#fff; overflow:hidden; }
        .tgm-search input { width:100%; min-height:46px; border:0; padding:0 16px; outline:0; color:var(--tgm-ink); font-size:.95rem; }
        .tgm-search button { display:inline-flex; align-items:center; justify-content:center; width:54px; align-self:stretch; border:0; background:var(--tgm-yellow); color:var(--tgm-ink); cursor:pointer; }
        .tgm-actions { display:flex; align-items:center; gap:10px; }
        .tgm-icon-link, .tgm-menu-toggle { position:relative; display:inline-flex; align-items:center; justify-content:center; width:44px; height:44px; border:1px solid var(--tgm-line); border-radius:8px; background:#fff; color:var(--tgm-blue); transition:background .16s, color .16s, border-color .16s; }
        .tgm-icon-link:hover, .tgm-menu-toggle:hover { border-color:var(--tgm-blue); background:#eef5ff; }
        .tgm-cart { background:var(--tgm-blue); color:#fff; border-color:var(--tgm-blue); }
        .tgm-cart:hover { background:#00389a; color:#fff; }
        .tgm-cart-count { position:absolute; right:-6px; top:-7px; display:flex; align-items:center; justify-content:center; min-width:21px; height:21px; border:2px solid #fff; border-radius:999px; background:var(--tgm-yellow); color:var(--tgm-ink); padding:0 5px; font-size:11px; font-weight:900; }
        .tgm-nav-wrap { border-top:1px solid var(--tgm-line); background:var(--tgm-soft); }
        .tgm-nav { display:flex; align-items:center; gap:4px; min-height:46px; overflow-x:auto; scrollbar-width:none; }
        .tgm-nav::-webkit-scrollbar { display:none; }
        .tgm-nav a { flex:none; border-radius:8px; padding:10px 12px; color:#263244; font-size:.9rem; font-weight:800; text-decoration:none; transition:background .16s, color .16s; }
        .tgm-nav a:hover { background:#fff; color:var(--tgm-blue); }
        .tgm-deal-link { background:var(--tgm-yellow); color:var(--tgm-ink) !important; }
        .tgm-mobile-panel { display:none; border-top:1px solid var(--tgm-line); background:#fff; padding:14px 0 18px; }
        .tgm-mobile-panel.is-open { display:block; }
        .tgm-mobile-nav { display:grid; gap:6px; margin-top:12px; }
        .tgm-mobile-nav a { border-radius:8px; background:var(--tgm-soft); padding:12px 14px; color:var(--tgm-text); font-weight:800; text-decoration:none; }
        @media (max-width: 960px) {
            .tgm-header__top-row { justify-content:center; text-align:center; }
            .tgm-header__top-links, .tgm-nav-wrap, .tgm-account-link { display:none; }
            .tgm-header__main { grid-template-columns:auto auto; gap:12px; min-height:68px; }
            .tgm-search { grid-column:1 / -1; order:3; }
            .tgm-logo img { height:36px; max-width:168px; }
            .tgm-actions { justify-self:end; }
        }
        @media (min-width: 961px) { .tgm-menu-toggle { display:none; } }
        @media (max-width: 520px) {
            .tgm-header__inner { width:min(100% - 24px,1280px); }
            .tgm-logo img { height:32px; max-width:148px; }
            .tgm-icon-link, .tgm-menu-toggle { width:40px; height:40px; }
        }
    </style>

    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-white antialiased'); ?>>
<?php wp_body_open(); ?>

<a href="#content" class="tgm-skip"><?php esc_html_e('Skip to content', 'dawp'); ?></a>

<header id="site-header" class="tgm-header" role="banner">
    <div class="tgm-header__top">
        <div class="tgm-header__inner tgm-header__top-row">
            <p><?php esc_html_e('Fast U.S. shipping, secure checkout and everyday deals for modern living.', 'dawp'); ?></p>
            <div class="tgm-header__top-links">
                <a href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a>
                <a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
            </div>
        </div>
    </div>

    <div class="tgm-header__inner tgm-header__main">
        <a href="<?php echo esc_url($home_url); ?>" class="tgm-logo" aria-label="<?php esc_attr_e('Topgoodmart home', 'dawp'); ?>">
            <img src="<?php echo esc_url($logo_url); ?>" width="196" height="42" alt="<?php esc_attr_e('Topgoodmart', 'dawp'); ?>" decoding="async" fetchpriority="high">
        </a>

        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="tgm-search">
            <label class="screen-reader-text" for="header-product-search"><?php esc_html_e('Search products', 'dawp'); ?></label>
            <input id="header-product-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search home, electronics, kitchen and more', 'dawp'); ?>">
            <input type="hidden" name="post_type" value="product">
            <button type="submit" aria-label="<?php esc_attr_e('Submit product search', 'dawp'); ?>">
                <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><path d="m16 16 4 4"></path></svg>
            </button>
        </form>

        <div class="tgm-actions">
            <a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="tgm-icon-link" aria-label="<?php esc_attr_e('Track order', 'dawp'); ?>">
                <svg viewBox="0 0 24 24" width="21" height="21" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 7h11v10H3z"></path><path d="M14 10h4l3 3v4h-7z"></path><circle cx="7" cy="19" r="2"></circle><circle cx="18" cy="19" r="2"></circle></svg>
            </a>
            <a href="<?php echo esc_url($account_url); ?>" class="tgm-icon-link tgm-account-link" aria-label="<?php esc_attr_e('My account', 'dawp'); ?>">
                <svg viewBox="0 0 24 24" width="21" height="21" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 21a8 8 0 0 0-16 0"></path><circle cx="12" cy="7" r="4"></circle></svg>
            </a>
            <a href="<?php echo esc_url($cart_url); ?>" class="tgm-icon-link tgm-cart" aria-label="<?php esc_attr_e('Shopping cart', 'dawp'); ?>">
                <svg viewBox="0 0 24 24" width="21" height="21" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.7 13.4a2 2 0 0 0 2 1.6h8.8a2 2 0 0 0 2-1.6L22 6H6"></path></svg>
                <?php if ($cart_count > 0) : ?><span class="tgm-cart-count"><?php echo esc_html($cart_count); ?></span><?php endif; ?>
            </a>
            <button type="button" class="tgm-menu-toggle" aria-expanded="false" aria-label="<?php esc_attr_e('Open store menu', 'dawp'); ?>" aria-controls="mobile-store-menu" onclick="const menu=document.getElementById('mobile-store-menu'); const expanded=this.getAttribute('aria-expanded')==='true'; this.setAttribute('aria-expanded', String(!expanded)); menu.classList.toggle('is-open');">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="4" y1="7" x2="20" y2="7"></line><line x1="4" y1="12" x2="20" y2="12"></line><line x1="4" y1="17" x2="20" y2="17"></line></svg>
            </button>
        </div>
    </div>

    <div class="tgm-nav-wrap">
        <nav class="tgm-header__inner tgm-nav" aria-label="<?php esc_attr_e('Store departments', 'dawp'); ?>">
            <a class="tgm-deal-link" href="<?php echo esc_url(home_url('/shop/?on_sale=1')); ?>"><?php esc_html_e('Deals', 'dawp'); ?></a>
            <a href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop All', 'dawp'); ?></a>
            <?php foreach ($nav_items as $item) : ?>
                <a href="<?php echo esc_url($item['url']); ?>"><?php echo esc_html($item['title']); ?></a>
            <?php endforeach; ?>
        </nav>
    </div>

    <div id="mobile-store-menu" class="tgm-mobile-panel">
        <div class="tgm-header__inner">
            <nav class="tgm-mobile-nav" aria-label="<?php esc_attr_e('Mobile store navigation', 'dawp'); ?>">
                <a href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop All Products', 'dawp'); ?></a>
                <a href="<?php echo esc_url(home_url('/shop/?on_sale=1')); ?>"><?php esc_html_e('Deals', 'dawp'); ?></a>
                <?php foreach ($nav_items as $item) : ?>
                    <a href="<?php echo esc_url($item['url']); ?>"><?php echo esc_html($item['title']); ?></a>
                <?php endforeach; ?>
                <a href="<?php echo esc_url($account_url); ?>"><?php esc_html_e('My Account', 'dawp'); ?></a>
                <a href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
            </nav>
        </div>
    </div>
</header>

<div id="content" class="site-content">
