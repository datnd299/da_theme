<?php
/**
 * Theme header.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email = 'concierge@luxurytheme.com';
$home_url      = home_url('/');
$shop_url      = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$account_url   = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');
$cart_url      = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$cart_count    = (function_exists('WC') && WC()->cart) ? WC()->cart->get_cart_contents_count() : 0;
$logo_url      = get_template_directory_uri() . '/assets/img/logo/luxurytheme-logo.svg';

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

if (!$account_url) {
    $account_url = home_url('/my-account/');
}

$current_path = function_exists('dawp_current_request_path') ? dawp_current_request_path() : trim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '', '/');
$is_shop_area = (function_exists('is_shop') && is_shop()) || (function_exists('is_product_taxonomy') && is_product_taxonomy()) || (function_exists('is_product') && is_product());

$nav_items = [
    ['title' => __('Watches', 'dawp'), 'url' => $shop_url, 'active' => $is_shop_area],
    ['title' => __('Collections', 'dawp'), 'url' => home_url('/collections/'), 'active' => 'collections' === $current_path],
    ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/'), 'active' => 'about-us' === $current_path],
    ['title' => __('Discover', 'dawp'), 'url' => home_url('/discover/'), 'active' => 'discover' === $current_path],
    ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/'), 'active' => in_array($current_path, ['contact-us'], true)],
];

$mobile_extra_items = [
    ['title' => __('Account', 'dawp'), 'url' => $account_url],
    ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/')],
    ['title' => __('Contact', 'dawp'), 'url' => home_url('/contact-us/')],
];
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        :root { --lux-black:#0B0B0B; --lux-charcoal:#1A1A1A; --lux-ivory:#F7F5F0; --lux-white:#FFFFFF; --lux-gold:#B89B5E; --lux-gold-light:#D1BD8A; --lux-gray:#858585; --lux-line:#E5E2DC; }
        html { scroll-behavior:smooth; }
        body { margin:0; color:var(--lux-charcoal); font-family:Inter, "Avenir Next", Arial, sans-serif; letter-spacing:0; text-rendering:optimizeLegibility; }
        .lux-skip { position:absolute; left:-999px; top:auto; width:1px; height:1px; overflow:hidden; }
        .lux-skip:focus { position:fixed; left:16px; top:16px; z-index:1000; width:auto; height:auto; padding:12px 16px; border:1px solid var(--lux-gold); border-radius:2px; background:var(--lux-ivory); color:var(--lux-black); font-weight:800; }
        .lux-site-header { position:sticky; top:0; z-index:80; border-bottom:1px solid rgba(229,226,220,.82); background:rgba(247,245,240,.94); color:var(--lux-black); backdrop-filter:saturate(150%) blur(14px); }
        .lux-head-wrap { width:min(100% - 40px,1280px); margin-inline:auto; }
        .lux-service-bar { border-bottom:1px solid rgba(229,226,220,.35); background:var(--lux-black); color:var(--lux-ivory); }
        .lux-service-bar__row { display:flex; align-items:center; justify-content:space-between; gap:20px; min-height:34px; font-size:12px; line-height:1.35; }
        .lux-service-bar a { color:var(--lux-gold-light); text-decoration:none; }
        .lux-service-bar a:hover { text-decoration:underline; text-underline-offset:4px; }
        .lux-header-main { display:grid; grid-template-columns:minmax(220px,1fr) auto minmax(220px,1fr); align-items:center; gap:28px; min-height:78px; }
        .lux-brand { display:inline-flex; align-items:center; justify-content:center; color:var(--lux-black); line-height:1; text-decoration:none; }
        .lux-brand__logo { display:block; width:180px; height:auto; max-height:54px; }
        .lux-primary-nav { display:flex; align-items:center; gap:28px; min-width:0; }
        .lux-primary-nav a, .lux-mobile-nav a { color:inherit; font-size:12px; font-weight:800; letter-spacing:.08em; text-decoration:none; text-transform:uppercase; transition:color .25s cubic-bezier(.22,1,.36,1); }
        .lux-primary-nav a:hover, .lux-primary-nav a.is-current { color:var(--lux-gold); }
        .lux-actions { display:flex; align-items:center; justify-content:flex-end; gap:8px; }
        .lux-icon-link, .lux-icon-button { position:relative; display:inline-flex; align-items:center; justify-content:center; width:42px; height:42px; border:1px solid transparent; border-radius:2px; background:transparent; color:var(--lux-black); text-decoration:none; cursor:pointer; transition:border-color .25s cubic-bezier(.22,1,.36,1), color .25s cubic-bezier(.22,1,.36,1), background .25s cubic-bezier(.22,1,.36,1); }
        .lux-icon-link:hover, .lux-icon-button:hover { border-color:var(--lux-line); background:var(--lux-white); color:var(--lux-gold); }
        .lux-icon-link svg, .lux-icon-button svg { width:21px; height:21px; fill:none; stroke:currentColor; stroke-width:1.65; stroke-linecap:round; stroke-linejoin:round; }
        .lux-cart-count { position:absolute; top:3px; right:2px; display:flex; align-items:center; justify-content:center; min-width:18px; height:18px; padding:0 5px; border:1px solid var(--lux-ivory); border-radius:999px; background:var(--lux-gold); color:var(--lux-black); font-size:10px; font-weight:900; }
        .lux-search { display:flex; align-items:center; width:260px; min-width:0; border-bottom:1px solid rgba(11,11,11,.32); }
        .lux-search input { width:100%; min-height:40px; border:0; background:transparent; color:var(--lux-black); outline:0; padding:0 8px 0 0; font-size:13px; }
        .lux-search input::placeholder { color:#69645D; }
        .lux-search button { display:inline-flex; align-items:center; justify-content:center; width:36px; height:40px; border:0; background:transparent; color:var(--lux-black); cursor:pointer; }
        .lux-search button svg { width:19px; height:19px; fill:none; stroke:currentColor; stroke-width:1.7; stroke-linecap:round; stroke-linejoin:round; }
        .lux-menu-button { display:none; }
        .lux-mobile-panel { display:none; border-top:1px solid var(--lux-line); background:var(--lux-ivory); }
        .lux-mobile-panel.is-open { display:block; }
        .lux-mobile-panel__inner { display:grid; gap:18px; padding:18px 0 22px; }
        .lux-mobile-nav { display:grid; gap:2px; }
        .lux-mobile-nav a { display:flex; align-items:center; min-height:48px; border-bottom:1px solid var(--lux-line); }
        .lux-mobile-nav a.is-current { color:var(--lux-gold); }
        .lux-mobile-search { width:100%; }
        .lux-icon-link:focus, .lux-icon-button:focus, .lux-primary-nav a:focus, .lux-mobile-nav a:focus, .lux-search input:focus, .lux-search button:focus, .lux-brand:focus { outline:2px solid var(--lux-gold-light); outline-offset:3px; }
        @media (max-width: 1080px) {
            .lux-header-main { grid-template-columns:auto 1fr auto; min-height:70px; }
            .lux-primary-nav, .lux-desktop-search, .lux-account-link { display:none; }
            .lux-brand { justify-self:center; }
            .lux-brand__logo { width:158px; max-height:48px; }
            .lux-menu-button { display:inline-flex; justify-self:start; }
            .lux-actions { gap:6px; }
        }
        @media (max-width: 560px) {
            .lux-head-wrap { width:min(100% - 28px,1280px); }
            .lux-service-bar__row { justify-content:center; min-height:32px; text-align:center; }
            .lux-service-bar__row a { display:none; }
            .lux-brand__logo { width:142px; max-height:43px; }
            .lux-icon-link, .lux-icon-button { width:38px; height:38px; }
            .lux-header-main { gap:10px; min-height:64px; }
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-white antialiased'); ?>>
<?php wp_body_open(); ?>

<a href="#content" class="lux-skip"><?php esc_html_e('Skip to content', 'dawp'); ?></a>

<header id="site-header" class="lux-site-header" role="banner">
    <div class="lux-service-bar">
        <div class="lux-head-wrap lux-service-bar__row">
            <span><?php esc_html_e('Complimentary insured shipping and private consultation', 'dawp'); ?></span>
            <a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
        </div>
    </div>

    <div class="lux-head-wrap lux-header-main">
        <button type="button" class="lux-icon-button lux-menu-button" aria-expanded="false" aria-label="<?php esc_attr_e('Open menu', 'dawp'); ?>" aria-controls="lux-mobile-menu" onclick="const menu=document.getElementById('lux-mobile-menu'); const expanded=this.getAttribute('aria-expanded')==='true'; this.setAttribute('aria-expanded', String(!expanded)); menu.classList.toggle('is-open');">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 7h16"></path><path d="M4 12h16"></path><path d="M4 17h16"></path></svg>
        </button>

        <nav class="lux-primary-nav" aria-label="<?php esc_attr_e('Primary navigation', 'dawp'); ?>">
            <?php foreach ($nav_items as $item) : ?>
                <a class="<?php echo $item['active'] ? 'is-current' : ''; ?>" href="<?php echo esc_url($item['url']); ?>"<?php echo $item['active'] ? ' aria-current="page"' : ''; ?>><?php echo esc_html($item['title']); ?></a>
            <?php endforeach; ?>
        </nav>

        <a href="<?php echo esc_url($home_url); ?>" class="lux-brand" aria-label="<?php esc_attr_e('luxurytheme.com home', 'dawp'); ?>">
            <img class="lux-brand__logo" src="<?php echo esc_url($logo_url); ?>" width="180" height="54" alt="<?php esc_attr_e('luxurytheme.com', 'dawp'); ?>">
        </a>

        <div class="lux-actions">
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="lux-search lux-desktop-search">
                <label class="screen-reader-text" for="lux-header-search"><?php esc_html_e('Search watches', 'dawp'); ?></label>
                <input id="lux-header-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search references', 'dawp'); ?>">
                <input type="hidden" name="post_type" value="product">
                <button type="submit" aria-label="<?php esc_attr_e('Submit search', 'dawp'); ?>">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><path d="m16 16 4 4"></path></svg>
                </button>
            </form>
            <a href="<?php echo esc_url($account_url); ?>" class="lux-icon-link lux-account-link" aria-label="<?php esc_attr_e('Account', 'dawp'); ?>">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 21a8 8 0 0 0-16 0"></path><circle cx="12" cy="7" r="4"></circle></svg>
            </a>
            <a href="<?php echo esc_url(home_url('/wishlist/')); ?>" class="lux-icon-link" aria-label="<?php esc_attr_e('Wishlist', 'dawp'); ?>">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 0 0-7.8 7.8l1 1L12 21l7.8-7.6 1-1a5.5 5.5 0 0 0 0-7.8z"></path></svg>
            </a>
            <a href="<?php echo esc_url($cart_url); ?>" class="lux-icon-link" aria-label="<?php esc_attr_e('Shopping bag', 'dawp'); ?>">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 8h12l-1 13H7z"></path><path d="M9 8a3 3 0 0 1 6 0"></path></svg>
                <?php if ($cart_count > 0) : ?><span class="lux-cart-count"><?php echo esc_html($cart_count); ?></span><?php endif; ?>
            </a>
        </div>
    </div>

    <div id="lux-mobile-menu" class="lux-mobile-panel">
        <div class="lux-head-wrap lux-mobile-panel__inner">
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="lux-search lux-mobile-search">
                <label class="screen-reader-text" for="lux-mobile-search"><?php esc_html_e('Search watches', 'dawp'); ?></label>
                <input id="lux-mobile-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search watches and references', 'dawp'); ?>">
                <input type="hidden" name="post_type" value="product">
                <button type="submit" aria-label="<?php esc_attr_e('Submit search', 'dawp'); ?>">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><path d="m16 16 4 4"></path></svg>
                </button>
            </form>

            <nav class="lux-mobile-nav" aria-label="<?php esc_attr_e('Mobile navigation', 'dawp'); ?>">
                <?php foreach ($nav_items as $item) : ?>
                    <a class="<?php echo $item['active'] ? 'is-current' : ''; ?>" href="<?php echo esc_url($item['url']); ?>"<?php echo $item['active'] ? ' aria-current="page"' : ''; ?>><?php echo esc_html($item['title']); ?></a>
                <?php endforeach; ?>
                <?php foreach ($mobile_extra_items as $item) : ?>
                    <a href="<?php echo esc_url($item['url']); ?>"><?php echo esc_html($item['title']); ?></a>
                <?php endforeach; ?>
            </nav>
        </div>
    </div>
</header>

<div id="content" class="site-content">
