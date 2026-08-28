<?php
/**
 * Theme header — Reluxwatches.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$home_url    = home_url('/');
$shop_url    = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$account_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');
$cart_url    = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$cart_count  = (function_exists('WC') && WC()->cart) ? WC()->cart->get_cart_contents_count() : 0;
$logo_path   = get_template_directory() . '/assets/img/imagewatch/watchlogo.png';
$logo_url    = get_template_directory_uri() . '/assets/img/imagewatch/watchlogo.png';

if (file_exists($logo_path)) {
    $logo_url = add_query_arg('ver', filemtime($logo_path), $logo_url);
}

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

if (!$account_url) {
    $account_url = home_url('/my-account/');
}

$current_path = function_exists('dawp_current_request_path') ? dawp_current_request_path() : trim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '', '/');
$nav_items = [
    ['title' => __('Home', 'dawp'), 'url' => $home_url, 'active' => is_front_page() || '' === $current_path],
    ['title' => __('Shop', 'dawp'), 'url' => $shop_url, 'active' => (function_exists('is_shop') && is_shop()) || (function_exists('is_product_taxonomy') && is_product_taxonomy()) || (function_exists('is_product') && is_product())],
    ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/'), 'active' => 'contact-us' === $current_path],
    ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/'), 'active' => 'about-us' === $current_path],
];
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        :root { --cf-ink:#111111; --cf-text:#5f5f5f; --cf-muted:#777777; --cf-line:#e9e9e9; --cf-soft:#f7f8f7; --cf-accent:#405447; --cf-white:#ffffff; --cf-max:1380px; --cf-font:'Inter', 'Manrope', Arial, sans-serif; }
        html { scroll-behavior:smooth; }
        body { color:var(--cf-text); font-family:var(--cf-font); letter-spacing:0; text-rendering:optimizeLegibility; }
        .cf-skip { position:absolute; left:-999px; top:auto; width:1px; height:1px; overflow:hidden; }
        .cf-skip:focus { position:fixed; left:18px; top:18px; z-index:100; width:auto; height:auto; background:#fff; border:1px solid var(--cf-line); padding:12px 16px; color:var(--cf-ink); font-weight:700; box-shadow:0 18px 42px rgba(17,17,17,.14); }
        .cf-header { position:sticky; top:0; z-index:50; background:rgba(255,255,255,.94); border-bottom:1px solid var(--cf-line); backdrop-filter:saturate(150%) blur(14px); }
        .cf-header__inner { width:min(100% - 64px,var(--cf-max)); margin-inline:auto; }
        .cf-header__bar { display:grid; grid-template-columns:minmax(170px,.8fr) minmax(320px,1.4fr) minmax(220px,.8fr); align-items:center; gap:24px; min-height:78px; }
        .cf-logo { display:inline-flex; align-items:center; width:max-content; color:var(--cf-ink); text-decoration:none; }
        .cf-logo__img { display:block; width:auto; height:48px; max-width:170px; object-fit:contain; }
        .cf-nav { display:flex; align-items:center; justify-content:center; gap:30px; }
        .cf-nav a { color:var(--cf-ink); font-size:13px; font-weight:700; letter-spacing:.08em; line-height:1.2; text-decoration:none; text-transform:uppercase; transition:color .18s ease; }
        .cf-nav a:hover, .cf-nav a.is-current { color:var(--cf-accent); }
        .cf-actions { display:flex; align-items:center; justify-content:flex-end; gap:10px; }
        .cf-search { display:flex; align-items:center; width:min(230px, 24vw); min-width:160px; border-bottom:1px solid var(--cf-line); }
        .cf-search input { width:100%; min-height:38px; border:0; outline:0; background:transparent; color:var(--cf-ink); font-size:13px; }
        .cf-search input::placeholder { color:var(--cf-muted); }
        .cf-search button, .cf-icon-button, .cf-menu-toggle { display:inline-flex; align-items:center; justify-content:center; width:40px; height:40px; border:0; background:transparent; color:var(--cf-ink); cursor:pointer; text-decoration:none; transition:color .18s ease, background .18s ease; }
        .cf-search button:hover, .cf-icon-button:hover, .cf-menu-toggle:hover { color:var(--cf-accent); background:var(--cf-soft); }
        .cf-cart { position:relative; }
        .cf-cart .dawp-cart-count { position:absolute; right:1px; top:2px; min-width:17px; height:17px; border-radius:999px; background:var(--cf-ink); color:#fff; padding:0 5px; font-size:10px; font-weight:800; line-height:17px; text-align:center; }
        .cf-cart .dawp-cart-count.hidden { display:none; }
        .cf-menu-toggle { display:none; }
        .cf-mobile-panel { display:none; border-top:1px solid var(--cf-line); background:#fff; }
        .cf-mobile-panel.is-open { display:block; }
        .cf-mobile-search-panel { padding:14px 0; }
        .cf-mobile-search-panel .cf-search { width:100%; min-width:0; }
        .cf-mobile-overlay { position:fixed; inset:0; z-index:48; visibility:hidden; background:rgba(17,17,17,.32); opacity:0; pointer-events:none; transition:opacity .18s ease, visibility .18s ease; }
        .cf-mobile-overlay.is-open { visibility:visible; opacity:1; pointer-events:auto; }
        body.cf-mobile-menu-open { overflow:hidden; }
        .cf-mobile-drawer { position:absolute; left:0; right:0; top:100%; z-index:80; visibility:hidden; background:#fff; border-top:1px solid var(--cf-line); box-shadow:0 22px 46px rgba(17,17,17,.16); opacity:0; pointer-events:none; transform:translateY(-8px); transition:opacity .18s ease, transform .18s ease, visibility .18s ease; }
        .cf-mobile-drawer.is-open { visibility:visible; opacity:1; pointer-events:auto; transform:translateY(0); }
        .cf-mobile-drawer__head { display:flex; align-items:center; justify-content:space-between; gap:14px; padding:16px 18px; border-bottom:1px solid var(--cf-line); }
        .cf-mobile-drawer__head strong { color:var(--cf-ink); font-size:13px; letter-spacing:.1em; text-transform:uppercase; }
        .cf-mobile-close { display:inline-flex; align-items:center; justify-content:center; width:38px; height:38px; border:1px solid var(--cf-line); background:#fff; color:var(--cf-ink); cursor:pointer; }
        .cf-mobile-drawer__body { display:grid; gap:8px; padding:14px 18px 20px; }
        .cf-mobile-drawer__body a { display:flex; align-items:center; justify-content:space-between; min-height:48px; border-bottom:1px solid var(--cf-line); color:var(--cf-ink); font-size:13px; font-weight:700; letter-spacing:.08em; text-decoration:none; text-transform:uppercase; }
        .cf-mobile-drawer__body a::after { content:""; width:7px; height:7px; border-top:1.5px solid currentColor; border-right:1.5px solid currentColor; transform:rotate(45deg); opacity:.45; }
        .cf-mobile-drawer__body a.is-current { color:var(--cf-accent); }
        @media (max-width: 980px) {
            .cf-header__inner { width:min(100% - 36px,var(--cf-max)); }
            .cf-header__bar { display:flex; justify-content:space-between; gap:14px; min-height:66px; }
            .cf-logo__img { height:42px; max-width:150px; }
            .cf-nav, .cf-header-search, .cf-account-link { display:none; }
            .cf-menu-toggle, .cf-search-toggle { display:inline-flex; }
        }
        @media (min-width: 981px) {
            .cf-mobile-overlay, .cf-mobile-drawer, .cf-search-toggle { display:none; }
        }
        @media (max-width: 520px) {
            .cf-header__inner { width:min(100% - 28px,var(--cf-max)); }
            .cf-logo__img { height:38px; max-width:132px; }
            .cf-actions { gap:2px; }
            .cf-icon-button, .cf-menu-toggle { width:38px; height:38px; }
        }
    </style>

    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-white antialiased'); ?>>
<?php wp_body_open(); ?>

<a href="#content" class="cf-skip"><?php esc_html_e('Skip to content', 'dawp'); ?></a>

<header id="site-header" class="cf-header" role="banner">
    <div class="cf-header__inner cf-header__bar">
        <a href="<?php echo esc_url($home_url); ?>" class="cf-logo" aria-label="<?php esc_attr_e('Reluxwatches home', 'dawp'); ?>">
            <?php
            echo function_exists('dawp_get_responsive_image')
                ? dawp_get_responsive_image($logo_url, __('Reluxwatches', 'dawp'), 'cf-logo__img', 115, 48, 'eager', '115px', 'high')
                : '<img class="cf-logo__img" src="' . esc_url($logo_url) . '" alt="' . esc_attr__('Reluxwatches', 'dawp') . '" width="170" height="48" decoding="async" fetchpriority="high">';
            ?>
        </a>

        <nav class="cf-nav" aria-label="<?php esc_attr_e('Primary navigation', 'dawp'); ?>">
            <?php foreach ($nav_items as $item) : ?>
                <a class="<?php echo $item['active'] ? 'is-current' : ''; ?>" href="<?php echo esc_url($item['url']); ?>"<?php echo $item['active'] ? ' aria-current="page"' : ''; ?>><?php echo esc_html($item['title']); ?></a>
            <?php endforeach; ?>
        </nav>

        <div class="cf-actions">
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="cf-search cf-header-search">
                <label class="screen-reader-text" for="header-product-search"><?php esc_html_e('Search products', 'dawp'); ?></label>
                <input id="header-product-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search', 'dawp'); ?>">
                <input type="hidden" name="post_type" value="product">
                <button type="submit" aria-label="<?php esc_attr_e('Submit product search', 'dawp'); ?>">
                    <svg viewBox="0 0 24 24" width="19" height="19" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><path d="m16 16 4 4"></path></svg>
                </button>
            </form>
            <button type="button" class="cf-icon-button cf-search-toggle" aria-expanded="false" aria-label="<?php esc_attr_e('Open product search', 'dawp'); ?>" aria-controls="mobile-search-panel" data-cf-search-toggle>
                <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><path d="m16 16 4 4"></path></svg>
            </button>
            <a href="<?php echo esc_url($account_url); ?>" class="cf-icon-button cf-account-link" aria-label="<?php esc_attr_e('My account', 'dawp'); ?>">
                <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 21a8 8 0 0 0-16 0"></path><circle cx="12" cy="7" r="4"></circle></svg>
            </a>
            <a href="<?php echo esc_url($cart_url); ?>" class="cf-icon-button cf-cart" id="dawp-cart-toggle" aria-label="<?php esc_attr_e('Shopping cart', 'dawp'); ?>">
                <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.7 13.4a2 2 0 0 0 2 1.6h8.8a2 2 0 0 0 2-1.6L22 6H6"></path></svg>
                <span class="dawp-cart-count<?php echo $cart_count > 0 ? '' : ' hidden'; ?>"><?php echo esc_html($cart_count); ?></span>
            </a>
            <button type="button" class="cf-menu-toggle" aria-expanded="false" aria-label="<?php esc_attr_e('Open store menu', 'dawp'); ?>" aria-controls="mobile-store-menu" data-cf-menu-toggle>
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="4" y1="7" x2="20" y2="7"></line><line x1="4" y1="12" x2="20" y2="12"></line><line x1="4" y1="17" x2="20" y2="17"></line></svg>
            </button>
        </div>
    </div>

    <div id="mobile-search-panel" class="cf-mobile-panel cf-mobile-search-panel">
        <div class="cf-header__inner">
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="cf-search">
                <label class="screen-reader-text" for="mobile-product-search"><?php esc_html_e('Search products', 'dawp'); ?></label>
                <input id="mobile-product-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search products', 'dawp'); ?>">
                <input type="hidden" name="post_type" value="product">
                <button type="submit" aria-label="<?php esc_attr_e('Submit product search', 'dawp'); ?>">
                    <svg viewBox="0 0 24 24" width="19" height="19" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><path d="m16 16 4 4"></path></svg>
                </button>
            </form>
        </div>
    </div>

    <div class="cf-mobile-overlay" data-cf-mobile-overlay aria-hidden="true"></div>
    <div id="mobile-store-menu" class="cf-mobile-drawer" aria-hidden="true">
        <div class="cf-mobile-drawer__head">
            <strong><?php esc_html_e('Menu', 'dawp'); ?></strong>
            <button type="button" class="cf-mobile-close" aria-label="<?php esc_attr_e('Close store menu', 'dawp'); ?>" data-cf-menu-close>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>
            </button>
        </div>
        <nav class="cf-mobile-drawer__body" aria-label="<?php esc_attr_e('Mobile navigation', 'dawp'); ?>">
            <?php foreach ($nav_items as $item) : ?>
                <a class="<?php echo $item['active'] ? 'is-current' : ''; ?>" href="<?php echo esc_url($item['url']); ?>"<?php echo $item['active'] ? ' aria-current="page"' : ''; ?>><?php echo esc_html($item['title']); ?></a>
            <?php endforeach; ?>
            <a href="<?php echo esc_url($account_url); ?>"><?php esc_html_e('Account', 'dawp'); ?></a>
        </nav>
    </div>
</header>

<div id="content" class="site-content">
