<?php
/**
 * Theme header.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_phone   = '+1 757 804 6538';
$whatsapp_number = preg_replace('/[^0-9]/', '', $support_phone);
$rating_text     = __('Rated 4.8/5 based on 13,000+ Reviews', 'dawp');
$shipping_badge  = __('Secured Shipping & Customs Guarantee', 'dawp');
$home_url      = home_url('/');
$shop_url      = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$account_url   = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');
$cart_url      = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$cart_count    = (function_exists('WC') && WC()->cart) ? WC()->cart->get_cart_contents_count() : 0;
$logo_url      = get_template_directory_uri() . '/assets/img/logo/chronel-logo-black.png';

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

if (!$account_url) {
    $account_url = home_url('/my-account/');
}

$current_path = function_exists('dawp_current_request_path') ? dawp_current_request_path() : trim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '', '/');
$is_shop_area = (function_exists('is_shop') && is_shop()) || (function_exists('is_product_taxonomy') && is_product_taxonomy()) || (function_exists('is_product') && is_product());

$megamenu_brands = function_exists('dawp_megamenu_brands') ? dawp_megamenu_brands() : [];

$nav_items = [
    ['title' => __('Home', 'dawp'), 'url' => $home_url, 'active' => '' === $current_path],
    ['title' => __('Watches', 'dawp'), 'url' => $shop_url, 'active' => $is_shop_area, 'megamenu' => true],
    ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/'), 'active' => 'contact-us' === $current_path],
    ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/'), 'active' => 'track-order' === $current_path],
];

$mobile_extra_items = [
    ['title' => __('Account', 'dawp'), 'url' => $account_url],
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
        .lux-service-bar__row { display:grid; grid-template-columns:1fr auto 1fr; align-items:center; gap:20px; min-height:34px; font-size:12px; line-height:1.35; }
        .lux-service-bar__item { display:inline-flex; align-items:center; gap:6px; }
        .lux-service-bar__item svg { width:14px; height:14px; flex:none; fill:none; stroke:currentColor; stroke-width:1.8; stroke-linecap:round; stroke-linejoin:round; }
        .lux-service-bar__center { justify-self:center; text-align:center; }
        .lux-service-bar__right { justify-self:end; }
        .lux-service-bar a { color:var(--lux-gold-light); text-decoration:none; }
        .lux-service-bar a:hover { text-decoration:underline; text-underline-offset:4px; }
        .lux-header-main { display:grid; grid-template-columns:minmax(220px,1fr) auto minmax(220px,1fr); align-items:center; gap:28px; min-height:78px; }
        .lux-brand { display:inline-flex; align-items:center; justify-content:flex-start; color:var(--lux-black); line-height:1; text-decoration:none; }
        .lux-brand__logo { display:block; width:180px; height:auto; max-height:54px; }
        .lux-primary-nav { display:flex; align-items:center; justify-content:center; gap:28px; min-width:0; }
        .lux-primary-nav a, .lux-mobile-nav a { display:inline-flex; align-items:center; color:inherit; font-size:12px; font-weight:800; letter-spacing:.08em; text-decoration:none; text-transform:uppercase; transition:color .25s cubic-bezier(.22,1,.36,1); }
        .lux-primary-nav a:hover, .lux-primary-nav a.is-current { color:var(--lux-gold); }
        .lux-nav-item { position:static; display:flex; align-items:center; }
        .lux-nav-caret { width:11px; height:11px; margin-left:5px; fill:none; stroke:currentColor; stroke-width:2; transition:transform .25s cubic-bezier(.22,1,.36,1); }
        .lux-nav-item:hover .lux-nav-caret, .lux-nav-item:focus-within .lux-nav-caret { transform:rotate(180deg); }
        .lux-megamenu { position:absolute; top:100%; left:0; right:0; z-index:70; opacity:0; visibility:hidden; transform:translateY(-8px); border-top:1px solid var(--lux-line); background:var(--lux-ivory); box-shadow:0 24px 48px -24px rgba(11,11,11,.28); transition:opacity .22s cubic-bezier(.22,1,.36,1), transform .22s cubic-bezier(.22,1,.36,1), visibility .22s; }
        .lux-nav-item:hover .lux-megamenu, .lux-nav-item:focus-within .lux-megamenu { opacity:1; visibility:visible; transform:translateY(0); }
        .lux-megamenu__inner { padding:36px 0 40px; }
        .lux-megamenu__eyebrow { margin:0 0 20px; color:var(--lux-gold); font-size:11px; font-weight:800; letter-spacing:.12em; text-transform:uppercase; }
        .lux-megamenu__layout { display:grid; grid-template-columns:1fr 280px; gap:44px; align-items:start; }
        .lux-megamenu__grid { display:grid; grid-template-columns:repeat(5,minmax(0,1fr)); gap:28px 24px; }
        .lux-megamenu__col { min-width:0; }
        .lux-megamenu__brand { display:flex; align-items:center; gap:10px; margin-bottom:14px; padding-bottom:10px; border-bottom:1px solid var(--lux-line); color:var(--lux-black); text-decoration:none; transition:border-color .25s cubic-bezier(.22,1,.36,1); }
        .lux-megamenu__brand span { font-size:12px; font-weight:800; letter-spacing:.06em; text-transform:uppercase; }
        .lux-megamenu__brand:hover { border-color:var(--lux-gold); }
        .lux-megamenu__brand:hover span { color:var(--lux-gold); }
        .lux-megamenu__brand-thumb { flex:none; width:30px; height:30px; border-radius:999px; object-fit:cover; box-shadow:0 0 0 1px var(--lux-line); }
        .lux-megamenu__col ul { display:grid; gap:9px; margin:0; padding:0; list-style:none; }
        .lux-megamenu__col a { color:var(--lux-gray); font-size:13px; font-weight:500; letter-spacing:0; text-decoration:none; text-transform:none; }
        .lux-megamenu__col a:hover { color:var(--lux-gold); }
        .lux-megamenu__feature { position:relative; display:block; min-height:100%; border-radius:4px; overflow:hidden; text-decoration:none; }
        .lux-megamenu__feature img { display:block; width:100%; height:100%; min-height:280px; object-fit:cover; transition:transform .5s cubic-bezier(.22,1,.36,1); }
        .lux-megamenu__feature:hover img { transform:scale(1.05); }
        .lux-megamenu__feature::after { content:""; position:absolute; inset:0; background:linear-gradient(180deg, rgba(11,11,11,0) 40%, rgba(11,11,11,.82) 100%); }
        .lux-megamenu__feature-copy { position:absolute; left:20px; right:20px; bottom:18px; z-index:1; display:grid; gap:6px; color:var(--lux-ivory); }
        .lux-megamenu__feature-eyebrow { color:var(--lux-gold-light); font-size:10px; font-weight:800; letter-spacing:.1em; text-transform:uppercase; }
        .lux-megamenu__feature-title { font-family:"Cormorant Garamond", Georgia, serif; font-size:20px; font-weight:600; line-height:1.2; }
        .lux-megamenu__feature-cta { display:inline-flex; align-items:center; gap:4px; margin-top:4px; font-size:11px; font-weight:800; letter-spacing:.08em; text-decoration:underline; text-underline-offset:4px; text-transform:uppercase; }
        .lux-mobile-nav__item { border-bottom:1px solid var(--lux-line); }
        .lux-mobile-nav__toggle { display:flex; align-items:center; justify-content:space-between; width:100%; min-height:48px; border:0; background:transparent; padding:0; color:inherit; font-size:12px; font-weight:800; letter-spacing:.08em; text-transform:uppercase; cursor:pointer; }
        .lux-mobile-nav__toggle[aria-expanded="true"] .lux-nav-caret { transform:rotate(180deg); }
        .lux-mobile-submenu { display:none; grid-template-columns:1fr; gap:2px; padding:2px 0 16px 14px; }
        .lux-mobile-submenu.is-open { display:grid; }
        .lux-mobile-submenu a { display:flex; align-items:center; min-height:40px; color:var(--lux-gray); font-size:12px; font-weight:700; letter-spacing:.04em; text-decoration:none; text-transform:none; }
        .lux-mobile-submenu a:hover { color:var(--lux-gold); }
        .lux-actions { display:flex; align-items:center; justify-content:flex-end; gap:14px; }
        .lux-icon-link, .lux-icon-button { position:relative; display:inline-flex; align-items:center; justify-content:center; width:42px; height:42px; border:1px solid transparent; border-radius:2px; background:transparent; color:var(--lux-black); text-decoration:none; cursor:pointer; transition:border-color .25s cubic-bezier(.22,1,.36,1), color .25s cubic-bezier(.22,1,.36,1), background .25s cubic-bezier(.22,1,.36,1); }
        .lux-icon-link:hover, .lux-icon-button:hover { border-color:var(--lux-line); background:var(--lux-white); color:var(--lux-gold); }
        .lux-icon-link svg, .lux-icon-button svg { width:21px; height:21px; fill:none; stroke:currentColor; stroke-width:1.65; stroke-linecap:round; stroke-linejoin:round; }
        .lux-icon-link--cart { width:40px; height:40px; border-radius:999px; background:var(--lux-black); color:var(--lux-ivory); }
        .lux-icon-link--cart:hover { border-color:var(--lux-black); background:var(--lux-charcoal); color:var(--lux-gold-light); }
        .lux-icon-link--cart svg { width:18px; height:18px; }
        .lux-cart-count { position:absolute; top:-4px; right:-4px; display:flex; align-items:center; justify-content:center; min-width:18px; height:18px; padding:0 5px; border:1px solid var(--lux-ivory); border-radius:999px; background:var(--lux-gold); color:var(--lux-black); font-size:10px; font-weight:900; }
        .lux-search { display:flex; align-items:center; width:260px; min-width:0; border:1px solid var(--lux-line); border-radius:999px; background:var(--lux-white); overflow:hidden; }
        .lux-search input { width:100%; min-height:40px; border:0; background:transparent; color:var(--lux-black); outline:0; padding:0 4px 0 18px; font-size:13px; }
        .lux-search input::placeholder { color:#69645D; }
        .lux-search button { display:inline-flex; flex:none; align-items:center; justify-content:center; width:38px; height:38px; margin:1px; border:0; border-radius:999px; background:var(--lux-gold); color:var(--lux-black); cursor:pointer; transition:background .25s cubic-bezier(.22,1,.36,1); }
        .lux-search button:hover { background:var(--lux-gold-light); }
        .lux-search button svg { width:17px; height:17px; fill:none; stroke:currentColor; stroke-width:2; stroke-linecap:round; stroke-linejoin:round; }
        .lux-menu-button { display:none; }
        .lux-mobile-panel { display:none; border-top:1px solid var(--lux-line); background:var(--lux-ivory); }
        .lux-mobile-panel.is-open { display:block; }
        .lux-mobile-panel__inner { display:grid; gap:18px; padding:18px 0 22px; }
        .lux-mobile-nav { display:grid; gap:2px; }
        .lux-mobile-nav a { display:flex; align-items:center; min-height:48px; border-bottom:1px solid var(--lux-line); }
        .lux-mobile-nav a.is-current { color:var(--lux-gold); }
        .lux-mobile-search { width:100%; }
        .lux-icon-link:focus, .lux-icon-button:focus, .lux-primary-nav a:focus, .lux-mobile-nav a:focus, .lux-search input:focus, .lux-search button:focus, .lux-brand:focus { outline:2px solid var(--lux-gold-light); outline-offset:3px; }
        @media (max-width: 1240px) {
            .lux-megamenu__layout { grid-template-columns:1fr; }
            .lux-megamenu__feature { display:none; }
            .lux-megamenu__grid { grid-template-columns:repeat(4,minmax(0,1fr)); }
        }
        @media (max-width: 1080px) {
            .lux-service-bar__row { grid-template-columns:auto 1fr; gap:12px; font-size:11px; }
            .lux-service-bar__right { display:none; }
            .lux-header-main { grid-template-columns:auto 1fr auto; min-height:70px; }
            .lux-primary-nav, .lux-desktop-search, .lux-account-link { display:none; }
            .lux-brand { justify-self:center; }
            .lux-brand__logo { width:158px; max-height:48px; }
            .lux-menu-button { display:inline-flex; justify-self:start; }
            .lux-actions { gap:6px; }
        }
        @media (max-width: 560px) {
            .lux-head-wrap { width:min(100% - 28px,1280px); }
            .lux-service-bar__row { grid-template-columns:1fr; min-height:32px; text-align:center; }
            .lux-service-bar__item:not(.lux-service-bar__center) { display:none; }
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
            <a class="lux-service-bar__item" href="https://wa.me/<?php echo esc_attr($whatsapp_number); ?>" target="_blank" rel="noopener">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 21l1.65-4.95A8 8 0 1 1 8.9 19.2z"></path><path d="M8.5 9.5c0 3 2.5 5.5 5.5 5.5"></path></svg>
                <span><?php esc_html_e('WhatsApp Support:', 'dawp'); ?> <?php echo esc_html($support_phone); ?></span>
            </a>
            <span class="lux-service-bar__item lux-service-bar__center">
                <svg viewBox="0 0 24 24" aria-hidden="true" fill="currentColor" stroke="none"><path d="M12 2l2.9 6.3 6.9.7-5.2 4.7 1.5 6.8L12 17l-6.1 3.5 1.5-6.8-5.2-4.7 6.9-.7z"></path></svg>
                <span><?php echo esc_html($rating_text); ?></span>
            </span>
            <span class="lux-service-bar__item lux-service-bar__right">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3l7 3v6c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V6z"></path><path d="m9 12 2 2 4-4"></path></svg>
                <span><?php echo esc_html($shipping_badge); ?></span>
            </span>
        </div>
    </div>

    <div class="lux-head-wrap lux-header-main">
        <button type="button" class="lux-icon-button lux-menu-button" aria-expanded="false" aria-label="<?php esc_attr_e('Open menu', 'dawp'); ?>" aria-controls="lux-mobile-menu" onclick="const menu=document.getElementById('lux-mobile-menu'); const expanded=this.getAttribute('aria-expanded')==='true'; this.setAttribute('aria-expanded', String(!expanded)); menu.classList.toggle('is-open');">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 7h16"></path><path d="M4 12h16"></path><path d="M4 17h16"></path></svg>
        </button>

        <a href="<?php echo esc_url($home_url); ?>" class="lux-brand" aria-label="<?php esc_attr_e('Chronel home', 'dawp'); ?>">
            <img class="lux-brand__logo" src="<?php echo esc_url($logo_url); ?>" width="180" height="54" alt="<?php esc_attr_e('Chronel', 'dawp'); ?>">
        </a>

        <nav class="lux-primary-nav" aria-label="<?php esc_attr_e('Primary navigation', 'dawp'); ?>">
            <?php foreach ($nav_items as $item) : ?>
                <?php if (!empty($item['megamenu']) && !empty($megamenu_brands)) : ?>
                    <div class="lux-nav-item lux-has-megamenu">
                        <a class="<?php echo $item['active'] ? 'is-current' : ''; ?>" href="<?php echo esc_url($item['url']); ?>"<?php echo $item['active'] ? ' aria-current="page"' : ''; ?> aria-haspopup="true">
                            <?php echo esc_html($item['title']); ?>
                            <svg class="lux-nav-caret" viewBox="0 0 24 24" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg>
                        </a>
                        <div class="lux-megamenu">
                            <div class="lux-head-wrap lux-megamenu__inner">
                                <p class="lux-megamenu__eyebrow"><?php esc_html_e('Shop by Brand', 'dawp'); ?></p>
                                <div class="lux-megamenu__layout">
                                    <div class="lux-megamenu__grid">
                                        <?php foreach ($megamenu_brands as $brand) : ?>
                                            <div class="lux-megamenu__col">
                                                <a class="lux-megamenu__brand" href="<?php echo esc_url($brand['url']); ?>">
                                                    <?php if (!empty($brand['image'])) : ?>
                                                        <img class="lux-megamenu__brand-thumb" src="<?php echo esc_url($brand['image']); ?>" alt="" loading="lazy">
                                                    <?php endif; ?>
                                                    <span><?php echo esc_html($brand['title']); ?></span>
                                                </a>
                                                <?php if (!empty($brand['children'])) : ?>
                                                    <ul>
                                                        <?php foreach ($brand['children'] as $child) : ?>
                                                            <li><a href="<?php echo esc_url($child['url']); ?>"><?php echo esc_html($child['title']); ?></a></li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                <?php endif; ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <a class="lux-megamenu__feature" href="<?php echo esc_url($shop_url); ?>">
                                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/banner/heritage-collection.jpg'); ?>" alt="" loading="lazy">
                                        <span class="lux-megamenu__feature-copy">
                                            <span class="lux-megamenu__feature-eyebrow"><?php esc_html_e('The Heritage Edit', 'dawp'); ?></span>
                                            <span class="lux-megamenu__feature-title"><?php esc_html_e('Timeless References, Newly Arrived', 'dawp'); ?></span>
                                            <span class="lux-megamenu__feature-cta"><?php esc_html_e('Shop All Watches', 'dawp'); ?> &rarr;</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <a class="<?php echo $item['active'] ? 'is-current' : ''; ?>" href="<?php echo esc_url($item['url']); ?>"<?php echo $item['active'] ? ' aria-current="page"' : ''; ?>><?php echo esc_html($item['title']); ?></a>
                <?php endif; ?>
            <?php endforeach; ?>
        </nav>

        <div class="lux-actions">
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="lux-search lux-desktop-search">
                <label class="screen-reader-text" for="lux-header-search"><?php esc_html_e('Search products', 'dawp'); ?></label>
                <input id="lux-header-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search for products', 'dawp'); ?>">
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
            <a href="<?php echo esc_url($cart_url); ?>" class="lux-icon-link lux-icon-link--cart" id="dawp-cart-toggle" aria-label="<?php esc_attr_e('Shopping bag', 'dawp'); ?>">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 8h12l-1 13H7z"></path><path d="M9 8a3 3 0 0 1 6 0"></path></svg>
                <span class="lux-cart-count<?php echo $cart_count > 0 ? '' : ' hidden'; ?>"><?php echo esc_html($cart_count); ?></span>
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
                    <?php if (!empty($item['megamenu']) && !empty($megamenu_brands)) : ?>
                        <div class="lux-mobile-nav__item">
                            <button type="button" class="lux-mobile-nav__toggle" aria-expanded="false" data-mobile-megamenu-trigger>
                                <?php echo esc_html($item['title']); ?>
                                <svg class="lux-nav-caret" viewBox="0 0 24 24" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="lux-mobile-submenu" data-mobile-megamenu-panel>
                                <a href="<?php echo esc_url($item['url']); ?>"><?php esc_html_e('All Watches', 'dawp'); ?></a>
                                <?php foreach ($megamenu_brands as $brand) : ?>
                                    <a href="<?php echo esc_url($brand['url']); ?>"><?php echo esc_html($brand['title']); ?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php else : ?>
                        <a class="<?php echo $item['active'] ? 'is-current' : ''; ?>" href="<?php echo esc_url($item['url']); ?>"<?php echo $item['active'] ? ' aria-current="page"' : ''; ?>><?php echo esc_html($item['title']); ?></a>
                    <?php endif; ?>
                <?php endforeach; ?>
                <?php foreach ($mobile_extra_items as $item) : ?>
                    <a href="<?php echo esc_url($item['url']); ?>"><?php echo esc_html($item['title']); ?></a>
                <?php endforeach; ?>
            </nav>
        </div>
    </div>
</header>

<script>
(function () {
    document.querySelectorAll('[data-mobile-megamenu-trigger]').forEach(function (trigger) {
        trigger.addEventListener('click', function () {
            var panel = trigger.nextElementSibling;
            var expanded = trigger.getAttribute('aria-expanded') === 'true';
            trigger.setAttribute('aria-expanded', String(!expanded));
            if (panel) {
                panel.classList.toggle('is-open');
            }
        });
    });
})();
</script>

<div id="content" class="site-content">
