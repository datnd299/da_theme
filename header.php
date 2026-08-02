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
$logo_path     = get_template_directory() . '/assets/img/logo_file/logo_crowd_cropped.png';
$logo_url      = get_template_directory_uri() . '/assets/img/logo_file/logo_crowd_cropped.png';
$mega_feature_image_path = get_template_directory() . '/assets/img/New_homepage/Innovation_fits_everyday_life_202607281529.jpeg';
$mega_feature_image_url  = get_template_directory_uri() . '/assets/img/New_homepage/Innovation_fits_everyday_life_202607281529.jpeg';

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

if (!$account_url) {
    $account_url = home_url('/my-account/');
}

if (file_exists($logo_path)) {
    $logo_url = add_query_arg('ver', filemtime($logo_path), $logo_url);
}

if (file_exists($mega_feature_image_path)) {
    $mega_feature_image_url = add_query_arg('ver', filemtime($mega_feature_image_path), $mega_feature_image_url);
}

$current_path = function_exists('dawp_current_request_path') ? dawp_current_request_path() : trim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '', '/');
$mega_menu_items = function_exists('dawp_homepage_mega_menu_items') ? dawp_homepage_mega_menu_items() : [];
$nav_items = [
    ['title' => __('Home', 'dawp'), 'url' => $home_url, 'active' => is_front_page() || '' === $current_path],
    ['title' => __('Shop', 'dawp'), 'url' => $shop_url, 'active' => (function_exists('is_shop') && is_shop()) || (function_exists('is_product_taxonomy') && is_product_taxonomy()) || (function_exists('is_product') && is_product()), 'mega' => true],
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
        .cf-nav { display:flex; justify-content:center; align-items:center; gap:8px; min-height:48px; overflow:visible; scrollbar-width:none; }
        .cf-nav::-webkit-scrollbar { display:none; }
        .cf-nav__item { position:relative; display:flex; align-items:center; }
        .cf-nav__link { flex:none; display:inline-flex; align-items:center; gap:7px; border-radius:999px; padding:8px 18px; color:var(--cf-text); font-family:var(--cf-font-heading); font-size:.84rem; font-weight:700; letter-spacing:.01em; line-height:1.25; text-decoration:none; transition:background 180ms ease, color 180ms ease; }
        .cf-nav__link:hover, .cf-nav__item:focus-within > .cf-nav__link { background:var(--cf-bg); color:var(--cf-orange); }
        .cf-nav__link.is-current { color:var(--cf-orange); background:rgba(245,130,32,.1); }
        .cf-nav__chevron { width:14px; height:14px; transition:transform 180ms ease; }
        .cf-nav__item:hover .cf-nav__chevron, .cf-nav__item:focus-within .cf-nav__chevron { transform:rotate(180deg); }
        .cf-mega { position:absolute; left:50%; top:calc(100% + 8px); z-index:70; width:min(1120px, calc(100vw - 40px)); transform:translateX(-50%) translateY(10px); border:1px solid rgba(34,34,34,.1); border-radius:8px; background:#fff; box-shadow:0 30px 70px rgba(17,24,39,.18), 0 10px 24px rgba(17,24,39,.08); opacity:0; visibility:hidden; pointer-events:none; transition:opacity 180ms ease, transform 180ms ease, visibility 180ms ease; overflow:hidden; }
        .cf-nav__item:hover .cf-mega, .cf-nav__item:focus-within .cf-mega { opacity:1; visibility:visible; pointer-events:auto; transform:translateX(-50%) translateY(0); }
        .cf-mega::before { content:""; position:absolute; left:0; right:0; top:0; height:4px; background:linear-gradient(90deg, var(--cf-orange), #FFC98A 55%, #0046BE); }
        .cf-mega::after { content:""; position:absolute; left:280px; top:4px; bottom:0; width:1px; background:linear-gradient(180deg, rgba(255,255,255,.18), rgba(233,236,239,.95) 18%, rgba(233,236,239,.7)); pointer-events:none; }
        .cf-mega__inner { display:grid; grid-template-columns:280px minmax(0,1fr); gap:0; }
        .cf-mega__feature { position:relative; display:flex; flex-direction:column; justify-content:space-between; gap:18px; background:linear-gradient(160deg, #222 0%, #2b2b2b 62%, #181818 100%); padding:28px; color:#fff; overflow:hidden; }
        .cf-mega__feature::before { content:""; position:absolute; inset:0; background:linear-gradient(135deg, rgba(245,130,32,.18), transparent 36%), linear-gradient(0deg, rgba(0,0,0,.38), transparent 46%); pointer-events:none; }
        .cf-mega__feature > * { position:relative; z-index:1; }
        .cf-mega__feature p { margin:0; color:rgba(255,255,255,.72); font-size:.9rem; line-height:1.6; }
        .cf-mega__feature strong { display:block; color:#fff; font-family:var(--cf-font-heading); font-size:1.35rem; line-height:1.18; }
        .cf-mega__feature a { display:inline-flex; align-items:center; justify-content:center; min-height:42px; width:max-content; border-radius:999px; background:var(--cf-orange); padding:0 18px; color:#fff; font-size:.84rem; font-weight:800; text-decoration:none; transition:background 180ms ease, transform 180ms ease; }
        .cf-mega__feature a:hover { background:var(--cf-orange-dark); transform:translateY(-1px); }
        .cf-mega__visual { position:relative; display:block; min-height:118px; border:1px solid rgba(255,255,255,.18); border-radius:8px; overflow:hidden; box-shadow:0 18px 36px rgba(0,0,0,.28); }
        .cf-mega__visual img { display:block; width:100%; height:118px; object-fit:cover; }
        .cf-mega__visual::after { content:""; position:absolute; inset:0; background:linear-gradient(180deg, transparent 42%, rgba(0,0,0,.42)); }
        .cf-mega__grid { display:grid; grid-template-columns:repeat(4, minmax(0,1fr)); gap:0; padding:24px; background:linear-gradient(90deg, rgba(245,130,32,.04), transparent 28%); }
        .cf-mega__card { position:relative; display:grid; gap:8px; min-height:132px; border:1px solid transparent; border-radius:8px; padding:14px; color:inherit; text-decoration:none; transition:background 180ms ease, border-color 180ms ease, transform 180ms ease, box-shadow 180ms ease; }
        .cf-mega__card::before { content:""; position:absolute; left:0; right:0; top:-1px; height:1px; background:var(--cf-border); opacity:.82; }
        .cf-mega__card::after { content:""; position:absolute; top:14px; right:0; bottom:14px; width:1px; background:var(--cf-border); opacity:.82; }
        .cf-mega__card:nth-child(-n+4)::before { display:none; }
        .cf-mega__card:nth-child(4n)::after { display:none; }
        .cf-mega__card:hover, .cf-mega__card:focus { border-color:rgba(245,130,32,.38); background:var(--cf-bg); transform:translateY(-2px); box-shadow:0 12px 28px rgba(34,34,34,.08); outline:0; }
        .cf-mega__tag { width:max-content; border-radius:999px; background:rgba(245,130,32,.1); padding:4px 8px; color:var(--cf-orange); font-size:.68rem; font-weight:800; line-height:1; text-transform:uppercase; }
        .cf-mega__title { color:var(--cf-charcoal); font-family:var(--cf-font-heading); font-size:.95rem; font-weight:800; line-height:1.25; }
        .cf-mega__copy { color:var(--cf-text); font-size:.78rem; line-height:1.5; }

        .cf-mobile-panel { display:none; border-top:1px solid var(--cf-border); background:#fff; }
        .cf-mobile-panel.is-open { display:block; }
        .cf-mobile-search-panel { padding:14px 0; box-shadow:0 18px 36px rgba(17,24,39,.08); }
        .cf-mobile-overlay { position:fixed; inset:0; z-index:48; visibility:hidden; background:rgba(34,34,34,.34); opacity:0; pointer-events:none; transition:opacity 180ms ease, visibility 180ms ease; }
        .cf-mobile-overlay.is-open { visibility:visible; opacity:1; pointer-events:auto; }
        body.cf-mobile-menu-open { overflow:hidden; }
        .cf-mobile-drawer { position:absolute; left:0; right:0; top:100%; z-index:80; visibility:hidden; border-top:1px solid var(--cf-border); background:#fff; box-shadow:0 22px 42px rgba(17,24,39,.16); opacity:0; pointer-events:none; transform:translateY(-10px); transition:opacity 180ms ease, transform 180ms ease, visibility 180ms ease; }
        .cf-mobile-drawer.is-open { visibility:visible; opacity:1; pointer-events:auto; transform:translateY(0); }
        .cf-mobile-drawer__head { display:flex; align-items:center; justify-content:space-between; gap:14px; border-bottom:1px solid var(--cf-border); padding:12px 14px; }
        .cf-mobile-drawer__brand { display:flex; min-width:0; flex-direction:column; gap:2px; }
        .cf-mobile-drawer__brand strong { color:var(--cf-charcoal); font-family:var(--cf-font-heading); font-size:1rem; font-weight:800; line-height:1.22; }
        .cf-mobile-drawer__brand span { color:var(--cf-light); font-size:.74rem; font-weight:500; line-height:1.35; }
        .cf-mobile-close { display:inline-flex; align-items:center; justify-content:center; width:38px; height:38px; flex:none; border:1px solid var(--cf-border); border-radius:8px; background:#fff; color:var(--cf-charcoal); cursor:pointer; transition:background 180ms ease, color 180ms ease, border-color 180ms ease; }
        .cf-mobile-close:hover { border-color:rgba(245,130,32,.45); background:rgba(245,130,32,.08); color:var(--cf-orange); }
        .cf-mobile-drawer__body { max-height:calc(100vh - 116px); overflow:auto; overscroll-behavior:contain; padding:12px 14px 16px; }
        .cf-mobile-quick { display:grid; grid-template-columns:repeat(3, minmax(0,1fr)); gap:7px; margin-bottom:10px; }
        .cf-mobile-quick a { display:grid; place-items:center; min-height:42px; border:1px solid var(--cf-border); border-radius:8px; background:#fff; color:var(--cf-charcoal); font-size:.72rem; font-weight:700; line-height:1.25; text-align:center; text-decoration:none; }
        .cf-mobile-nav { display:grid; grid-template-columns:repeat(2, minmax(0,1fr)); gap:7px; }
        .cf-mobile-nav a { display:flex; align-items:center; justify-content:center; min-height:42px; border-radius:8px; background:var(--cf-bg); padding:8px 10px; color:var(--cf-charcoal); font-family:var(--cf-font-heading); font-size:.88rem; font-weight:700; line-height:1.25; text-align:center; text-decoration:none; }
        .cf-mobile-category-grid a::after { content:""; width:7px; height:7px; flex:none; border-top:2px solid currentColor; border-right:2px solid currentColor; opacity:.38; transform:rotate(45deg); }
        .cf-mobile-nav a.is-current { background:var(--cf-orange); color:#fff; }
        .cf-mobile-categories { margin-top:12px; border-top:1px solid var(--cf-border); padding-top:12px; }
        .cf-mobile-categories__head { display:flex; align-items:center; justify-content:space-between; gap:12px; margin-bottom:8px; }
        .cf-mobile-categories__title { margin:0; color:var(--cf-light); font-size:.68rem; font-weight:700; letter-spacing:.08em; line-height:1.3; text-transform:uppercase; }
        .cf-mobile-categories__all { color:var(--cf-orange); font-size:.78rem; font-weight:700; text-decoration:none; }
        .cf-mobile-category-grid { display:grid; grid-template-columns:repeat(2, minmax(0,1fr)); gap:7px; }
        .cf-mobile-category-grid a { display:grid; grid-template-columns:minmax(0,1fr) auto; gap:5px 8px; align-items:center; min-height:50px; border-radius:8px; border:1px solid var(--cf-border); background:#fff; padding:9px 10px; color:inherit; text-decoration:none; }
        .cf-mobile-category-grid strong { color:var(--cf-charcoal); font-family:var(--cf-font-body); font-size:.8rem; font-weight:650; line-height:1.28; }
        .cf-mobile-category-grid span { display:none; }

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
        @media (min-width: 961px) {
            .cf-mobile-overlay, .cf-mobile-drawer { display:none; }
        }
        @media (min-width: 961px) { .cf-menu-toggle { display:none; } }
        @media (max-width: 520px) {
            .cf-header__inner { width:min(100% - 24px,1280px); }
            .cf-header__announce-row { min-height:34px; font-size:.72rem; line-height:1.35; }
            .cf-logo img { height:28px; max-width:140px; }
            .cf-actions { gap:2px; }
            .cf-mobile-drawer__head, .cf-mobile-drawer__body { padding-inline:12px; }
            .cf-mobile-quick a { min-height:40px; font-size:.68rem; }
            .cf-mobile-nav a { min-height:40px; font-size:.84rem; }
            .cf-mobile-category-grid strong { font-size:.75rem; line-height:1.3; }
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
            <button type="button" class="cf-icon-link cf-search-toggle" aria-expanded="false" aria-label="<?php esc_attr_e('Open product search', 'dawp'); ?>" aria-controls="mobile-search-panel" data-cf-search-toggle>
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
            <button type="button" class="cf-menu-toggle" aria-expanded="false" aria-label="<?php esc_attr_e('Open store menu', 'dawp'); ?>" aria-controls="mobile-store-menu" data-cf-menu-toggle>
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="4" y1="7" x2="20" y2="7"></line><line x1="4" y1="12" x2="20" y2="12"></line><line x1="4" y1="17" x2="20" y2="17"></line></svg>
            </button>
        </div>
    </div>

    <div class="cf-desktop-nav">
        <nav class="cf-header__inner cf-nav" aria-label="<?php esc_attr_e('Primary navigation', 'dawp'); ?>">
            <?php foreach ($nav_items as $item) : ?>
                <div class="cf-nav__item">
                    <a class="cf-nav__link <?php echo $item['active'] ? 'is-current' : ''; ?>" href="<?php echo esc_url($item['url']); ?>"<?php echo $item['active'] ? ' aria-current="page"' : ''; ?>>
                        <?php echo esc_html($item['title']); ?>
                        <?php if (!empty($item['mega']) && !empty($mega_menu_items)) : ?>
                            <svg class="cf-nav__chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg>
                        <?php endif; ?>
                    </a>
                    <?php if (!empty($item['mega']) && !empty($mega_menu_items)) : ?>
                        <div class="cf-mega" role="group" aria-label="<?php esc_attr_e('Shop product categories', 'dawp'); ?>">
                            <div class="cf-mega__inner">
                                <div class="cf-mega__feature">
                                    <div>
                                        <strong><?php esc_html_e('Shop every Crowdfused lifestyle category.', 'dawp'); ?></strong>
                                        <p><?php esc_html_e('A polished shortcut to the same product worlds featured on the Homepage, from smart tech to patio-ready picks.', 'dawp'); ?></p>
                                    </div>
                                    <span class="cf-mega__visual" aria-hidden="true">
                                        <img src="<?php echo esc_url($mega_feature_image_url); ?>" alt="" loading="lazy" decoding="async">
                                    </span>
                                    <a href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('View All Products', 'dawp'); ?></a>
                                </div>
                                <div class="cf-mega__grid">
                                    <?php foreach ($mega_menu_items as $mega_item) : ?>
                                        <a class="cf-mega__card" href="<?php echo esc_url(function_exists('dawp_product_category_url') ? dawp_product_category_url($mega_item['slug']) : home_url('/product-category/' . trim($mega_item['slug'], '/') . '/')); ?>">
                                            <span class="cf-mega__tag"><?php echo esc_html($mega_item['tag']); ?></span>
                                            <span class="cf-mega__title"><?php echo esc_html($mega_item['title']); ?></span>
                                            <span class="cf-mega__copy"><?php echo esc_html($mega_item['copy']); ?></span>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
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

    <div class="cf-mobile-overlay" data-cf-mobile-overlay aria-hidden="true"></div>

    <div id="mobile-store-menu" class="cf-mobile-drawer" aria-hidden="true">
        <div class="cf-mobile-drawer__head">
            <div class="cf-mobile-drawer__brand">
                <strong><?php esc_html_e('Crowdfused Menu', 'dawp'); ?></strong>
                <span><?php esc_html_e('Quick links and categories', 'dawp'); ?></span>
            </div>
            <button type="button" class="cf-mobile-close" aria-label="<?php esc_attr_e('Close store menu', 'dawp'); ?>" data-cf-menu-close>
                <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>
            </button>
        </div>
        <div class="cf-mobile-drawer__body">
            <div class="cf-mobile-quick" aria-label="<?php esc_attr_e('Quick links', 'dawp'); ?>">
                <a href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop All', 'dawp'); ?></a>
                <a href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a>
                <a href="<?php echo esc_url($account_url); ?>"><?php esc_html_e('Account', 'dawp'); ?></a>
            </div>
            <nav class="cf-mobile-nav" aria-label="<?php esc_attr_e('Mobile store navigation', 'dawp'); ?>">
                <?php foreach ($nav_items as $item) : ?>
                    <a class="<?php echo $item['active'] ? 'is-current' : ''; ?>" href="<?php echo esc_url($item['url']); ?>"<?php echo $item['active'] ? ' aria-current="page"' : ''; ?>><?php echo esc_html($item['title']); ?></a>
                <?php endforeach; ?>
            </nav>
            <?php if (!empty($mega_menu_items)) : ?>
                <div class="cf-mobile-categories">
                    <div class="cf-mobile-categories__head">
                        <p class="cf-mobile-categories__title"><?php esc_html_e('Shop Categories', 'dawp'); ?></p>
                        <a class="cf-mobile-categories__all" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('View all', 'dawp'); ?></a>
                    </div>
                    <div class="cf-mobile-category-grid">
                        <?php foreach ($mega_menu_items as $mega_item) : ?>
                            <a href="<?php echo esc_url(function_exists('dawp_product_category_url') ? dawp_product_category_url($mega_item['slug']) : home_url('/product-category/' . trim($mega_item['slug'], '/') . '/')); ?>">
                                <strong><?php echo esc_html($mega_item['title']); ?></strong>
                                <span><?php echo esc_html($mega_item['copy']); ?></span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</header>

<div id="content" class="site-content">
