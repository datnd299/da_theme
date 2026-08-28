<?php
/**
 * Theme header.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email = 'support@chronelshop.com';
$support_phone = '+1 757 804 6538';
$whatsapp_number = preg_replace('/[^0-9]/', '', $support_phone);
$rating_text = __('Trusted luxury watch support', 'dawp');
$shipping_badge = __('Insured U.S. shipping', 'dawp');
$home_url      = home_url('/');
$shop_url      = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$account_url   = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');
$cart_url      = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$cart_count    = (function_exists('WC') && WC()->cart) ? WC()->cart->get_cart_contents_count() : 0;
$logo_path     = get_template_directory() . '/assets/img/logo/Logo (13).png';
$logo_url      = get_template_directory_uri() . '/assets/img/logo/Logo (13).png';

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
$is_shop_area = (function_exists('is_shop') && is_shop()) || (function_exists('is_product_taxonomy') && is_product_taxonomy()) || (function_exists('is_product') && is_product());

$megamenu_brands = function_exists('dawp_megamenu_brands') ? dawp_megamenu_brands() : [];

$nav_items = [
    ['key' => 'watches', 'title' => __('Watches', 'dawp'), 'url' => $shop_url, 'active' => $is_shop_area],
    ['key' => 'track-order', 'title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/'), 'active' => 'track-order' === $current_path],
    ['key' => 'about', 'title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/'), 'active' => 'about-us' === $current_path],
    ['key' => 'contact', 'title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/'), 'active' => in_array($current_path, ['contact-us'], true)],
];

$watch_mega_groups = function_exists('dawp_watch_mega_menu_groups') ? dawp_watch_mega_menu_groups() : [];
$mega_bg_path       = get_template_directory() . '/assets/img/home/ef05554a-2686-4d5d-a6f3-42a88a9ac3db.jpg';
$mega_bg_url        = get_template_directory_uri() . '/assets/img/home/ef05554a-2686-4d5d-a6f3-42a88a9ac3db.jpg';

if (file_exists($mega_bg_path)) {
    $mega_bg_url = add_query_arg('ver', filemtime($mega_bg_path), $mega_bg_url);
}

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
        .lux-site-header { position:sticky; top:0; z-index:1000; border-bottom:1px solid rgba(229,226,220,.82); background:rgba(247,245,240,.97); color:var(--lux-black); box-shadow:0 10px 30px rgba(11,11,11,.06); backdrop-filter:saturate(150%) blur(14px); }
        .lux-head-wrap { width:min(100% - 48px,1280px); margin-inline:auto; }
        .lux-service-bar { border-bottom:1px solid rgba(229,226,220,.35); background:var(--lux-black); color:var(--lux-ivory); }
        .lux-service-bar__row { display:grid; grid-template-columns:1fr auto 1fr; align-items:center; gap:20px; min-height:34px; font-size:12px; line-height:1.35; }
        .lux-service-bar__item { display:inline-flex; align-items:center; gap:6px; }
        .lux-service-bar__item svg { width:14px; height:14px; flex:none; fill:none; stroke:currentColor; stroke-width:1.8; stroke-linecap:round; stroke-linejoin:round; }
        .lux-service-bar__center { justify-self:center; text-align:center; }
        .lux-service-bar__right { justify-self:end; }
        .lux-service-bar a { color:var(--lux-gold-light); text-decoration:none; }
        .lux-service-bar a:hover { text-decoration:underline; text-underline-offset:4px; }
        .lux-header-main { display:grid; grid-template-columns:minmax(0,1fr) auto minmax(0,1fr); align-items:center; gap:34px; min-height:76px; }
        .lux-brand { display:inline-flex; grid-column:2; grid-row:1; align-items:center; justify-content:center; justify-self:center; color:var(--lux-black); line-height:1; text-decoration:none; }
        .lux-brand__logo { display:block; width:136px; height:auto; object-fit:contain; }
        .lux-primary-nav { display:flex; grid-column:1; grid-row:1; align-items:center; justify-content:flex-start; gap:32px; min-width:0; }
        .lux-nav-item { display:flex; align-items:center; min-height:76px; }
        .lux-primary-nav a, .lux-mega-trigger, .lux-mobile-nav a, .lux-mobile-mega summary { color:inherit; font-size:12px; font-weight:800; letter-spacing:.08em; text-decoration:none; text-transform:uppercase; transition:color .25s cubic-bezier(.22,1,.36,1); }
        .lux-mega-trigger { display:inline-flex; align-items:center; gap:6px; min-height:38px; border:0; background:transparent; cursor:pointer; font-family:inherit; padding:0; }
        .lux-mega-trigger svg { width:13px; height:13px; fill:none; stroke:currentColor; stroke-width:2; stroke-linecap:round; stroke-linejoin:round; transition:transform .2s cubic-bezier(.22,1,.36,1); }
        .lux-primary-nav a:hover, .lux-primary-nav a.is-current, .lux-mega-trigger:hover, .lux-mega-trigger.is-current, .lux-nav-item:focus-within .lux-mega-trigger, .lux-nav-item:hover .lux-mega-trigger { color:var(--lux-gold); }
        .lux-nav-item:hover .lux-mega-trigger svg, .lux-nav-item:focus-within .lux-mega-trigger svg { transform:rotate(180deg); }
        .lux-mega-panel { position:absolute; left:0; right:0; top:100%; z-index:1001; visibility:hidden; opacity:0; transform:translateY(10px); border-top:1px solid rgba(209,189,138,.34); border-bottom:1px solid rgba(11,11,11,.92); background:#0B0B0B; background-image:linear-gradient(90deg, #0B0B0B 0%, rgba(11,11,11,.98) 50%, rgba(11,11,11,.72) 68%, rgba(11,11,11,.28) 100%), linear-gradient(180deg, rgba(11,11,11,.34), rgba(11,11,11,.66)), url('<?php echo esc_url($mega_bg_url); ?>'); background-position:0 0, 0 0, right center; background-size:auto, auto, min(48vw, 720px) auto; background-repeat:no-repeat; box-shadow:0 28px 70px rgba(11,11,11,.34); isolation:isolate; transition:opacity .18s cubic-bezier(.22,1,.36,1), transform .18s cubic-bezier(.22,1,.36,1), visibility .18s; }
        .lux-nav-item:hover .lux-mega-panel, .lux-nav-item:focus-within .lux-mega-panel { visibility:visible; opacity:1; transform:translateY(0); }
        .lux-mega-inner { width:min(100% - 56px,1280px); margin-inline:auto; padding:44px 0 36px; }
        .lux-mega-grid { display:grid; grid-template-columns:1.35fr repeat(4, minmax(150px, 1fr)); gap:36px 58px; align-items:start; max-width:1120px; padding:30px 34px; border:1px solid rgba(209,189,138,.18); background:#0B0B0B; }
        .lux-mega-group { min-width:0; }
        .lux-mega-group--wide { grid-row:span 2; }
        .lux-mega-title { margin:0 0 14px; }
        .lux-mega-title a { display:inline-flex; align-items:center; padding-bottom:10px; border-bottom:1px solid rgba(209,189,138,.58); color:var(--lux-ivory); font-size:12px; font-weight:850; letter-spacing:0; line-height:1.35; text-decoration:none; text-shadow:0 1px 18px rgba(0,0,0,.42); transition:color .18s cubic-bezier(.22,1,.36,1), border-color .18s cubic-bezier(.22,1,.36,1); }
        .lux-mega-title a:hover { border-color:var(--lux-gold-light); color:var(--lux-gold-light); }
        .lux-mega-list { display:grid; gap:8px; margin:0; padding:0; list-style:none; }
        .lux-mega-list a, .lux-mega-empty { color:rgba(247,245,240,.78); font-size:13px; font-weight:600; line-height:1.35; letter-spacing:0; text-transform:none; text-decoration:none; }
        .lux-mega-list a { display:inline-flex; align-items:center; min-height:23px; transition:color .18s cubic-bezier(.22,1,.36,1), transform .18s cubic-bezier(.22,1,.36,1); }
        .lux-mega-list a:hover { color:var(--lux-gold-light); transform:translateX(3px); }
        .lux-mega-empty { display:block; min-height:23px; color:rgba(247,245,240,.5); }
        .lux-mega-footer { display:flex; justify-content:flex-start; max-width:1120px; margin-top:0; padding:22px 34px 0; border-top:1px solid rgba(209,189,138,.28); }
        .lux-mega-all { display:inline-flex; align-items:center; gap:8px; color:var(--lux-ivory); font-size:12px; font-weight:900; letter-spacing:.1em; text-transform:uppercase; text-decoration:none; }
        .lux-mega-all:hover { color:var(--lux-gold-light); }
        .lux-actions { display:flex; grid-column:3; grid-row:1; align-items:center; justify-content:flex-end; gap:10px; min-width:0; }
        .lux-icon-link, .lux-icon-button { position:relative; display:inline-flex; align-items:center; justify-content:center; width:42px; height:42px; border:1px solid transparent; border-radius:2px; background:transparent; color:var(--lux-black); text-decoration:none; cursor:pointer; transition:border-color .25s cubic-bezier(.22,1,.36,1), color .25s cubic-bezier(.22,1,.36,1), background .25s cubic-bezier(.22,1,.36,1); }
        .lux-icon-link:hover, .lux-icon-button:hover { border-color:var(--lux-line); background:var(--lux-white); color:var(--lux-gold); }
        .lux-icon-link svg, .lux-icon-button svg { width:21px; height:21px; fill:none; stroke:currentColor; stroke-width:1.65; stroke-linecap:round; stroke-linejoin:round; }
        .lux-icon-link--cart { width:40px; height:40px; border-radius:999px; background:var(--lux-black); color:var(--lux-ivory); }
        .lux-icon-link--cart:hover { border-color:var(--lux-black); background:var(--lux-charcoal); color:var(--lux-gold-light); }
        .lux-icon-link--cart svg { width:18px; height:18px; }
        .lux-cart-count { position:absolute; top:-4px; right:-4px; display:flex; align-items:center; justify-content:center; min-width:18px; height:18px; padding:0 5px; border:1px solid var(--lux-ivory); border-radius:999px; background:var(--lux-gold); color:var(--lux-black); font-size:10px; font-weight:900; }
        .lux-search { display:flex; align-items:center; width:clamp(220px, 20vw, 300px); min-width:0; border:1px solid var(--lux-line); border-radius:2px; background:var(--lux-white); overflow:hidden; box-shadow:inset 0 1px 0 rgba(255,255,255,.72); }
        .lux-search input { width:100%; min-height:40px; border:0; background:transparent; color:var(--lux-black); outline:0; padding:0 8px 0 14px; font-size:13px; }
        .lux-search input::placeholder { color:#69645D; }
        .lux-search button { display:inline-flex; flex:none; align-items:center; justify-content:center; width:40px; height:40px; margin:0; border:0; border-left:1px solid rgba(11,11,11,.08); border-radius:0; background:var(--lux-gold); color:var(--lux-black); cursor:pointer; transition:background .25s cubic-bezier(.22,1,.36,1); }
        .lux-search button:hover { background:var(--lux-gold-light); }
        .lux-search button svg { width:17px; height:17px; fill:none; stroke:currentColor; stroke-width:2; stroke-linecap:round; stroke-linejoin:round; }
        .lux-menu-button { display:none; }
        body.lux-mobile-menu-open { overflow:hidden; }
        .lux-mobile-panel { display:none; position:absolute; left:0; right:0; top:100%; max-height:calc(100dvh - 96px); overflow-y:auto; overscroll-behavior:contain; -webkit-overflow-scrolling:touch; border-top:1px solid var(--lux-line); background:var(--lux-ivory); box-shadow:0 20px 34px rgba(11,11,11,.14); }
        .lux-mobile-panel.is-open { display:block; }
        .lux-mobile-panel__inner { display:grid; gap:18px; padding:18px 0 22px; }
        .lux-mobile-nav { display:grid; gap:2px; }
        .lux-mobile-nav a { display:flex; align-items:center; min-height:48px; border-bottom:1px solid var(--lux-line); }
        .lux-mobile-nav a.is-current { color:var(--lux-gold); }
        .lux-mobile-mega { border-bottom:1px solid var(--lux-line); }
        .lux-mobile-mega summary { display:flex; align-items:center; justify-content:space-between; min-height:48px; cursor:pointer; list-style:none; }
        .lux-mobile-mega summary::-webkit-details-marker { display:none; }
        .lux-mobile-mega summary svg { width:14px; height:14px; fill:none; stroke:currentColor; stroke-width:2; stroke-linecap:round; stroke-linejoin:round; transition:transform .2s; }
        .lux-mobile-mega[open] > summary svg { transform:rotate(180deg); }
        .lux-mobile-mega__body { display:grid; gap:2px; padding:2px 0 14px; }
        .lux-mobile-mega__group { border-bottom:1px solid rgba(229,226,220,.72); }
        .lux-mobile-mega__group summary { min-height:46px; padding-left:12px; color:#4A453E; font-size:13px; font-weight:850; letter-spacing:0; line-height:1.35; text-transform:none; }
        .lux-mobile-mega__group summary span { min-width:0; }
        .lux-mobile-mega__group summary svg { width:13px; height:13px; }
        .lux-mobile-mega__group[open] > summary { color:var(--lux-gold); }
        .lux-mobile-mega__group[open] > summary svg { transform:rotate(180deg); }
        .lux-mobile-mega__links { display:grid; gap:1px; padding:0 0 10px 24px; }
        .lux-mobile-mega__links a { min-height:38px; border:0; color:#67615A; font-size:13px; font-weight:600; letter-spacing:0; line-height:1.35; text-transform:none; }
        .lux-mobile-mega__links a:hover { color:var(--lux-gold); }
        .lux-mobile-mega__all { margin-top:2px; color:var(--lux-black) !important; font-weight:900 !important; letter-spacing:.08em !important; text-transform:uppercase !important; }
        .lux-mobile-search { width:100%; }
        .lux-icon-link:focus, .lux-icon-button:focus, .lux-primary-nav a:focus, .lux-mega-trigger:focus, .lux-mobile-nav a:focus, .lux-mobile-mega summary:focus, .lux-search input:focus, .lux-search button:focus, .lux-brand:focus { outline:2px solid var(--lux-gold-light); outline-offset:3px; }
        @media (max-width: 1080px) {
            .lux-service-bar__row { grid-template-columns:auto 1fr; gap:12px; font-size:11px; }
            .lux-service-bar__right { display:none; }
            .lux-header-main { grid-template-columns:auto 1fr auto; min-height:70px; }
            .lux-primary-nav, .lux-desktop-search, .lux-account-link { display:none; }
            .lux-brand { grid-column:2; justify-self:center; }
            .lux-brand__logo { width:111px; }
            .lux-menu-button { display:inline-flex; grid-column:1; grid-row:1; justify-self:start; }
            .lux-actions { grid-column:3; gap:6px; }
        }
        @media (min-width: 1081px) and (max-width: 1220px) {
            .lux-header-main { gap:22px; }
            .lux-primary-nav { gap:22px; }
            .lux-search { width:220px; }
        }
        @media (max-width: 560px) {
            .lux-head-wrap { width:min(100% - 28px,1280px); }
            .lux-service-bar__row { justify-content:center; min-height:32px; text-align:center; }
            .lux-service-bar__row a { display:none; }
            .lux-brand__logo { width:99px; }
            .lux-icon-link, .lux-icon-button { width:38px; height:38px; }
            .lux-header-main { gap:10px; min-height:64px; }
            .lux-mobile-panel { max-height:calc(100dvh - 96px); }
            .lux-mobile-mega__links { padding-left:18px; }
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
        <button type="button" class="lux-icon-button lux-menu-button" aria-expanded="false" aria-label="<?php esc_attr_e('Open menu', 'dawp'); ?>" aria-controls="lux-mobile-menu" onclick="const menu=document.getElementById('lux-mobile-menu'); const expanded=this.getAttribute('aria-expanded')==='true'; this.setAttribute('aria-expanded', String(!expanded)); menu.classList.toggle('is-open', !expanded); document.body.classList.toggle('lux-mobile-menu-open', !expanded);">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 7h16"></path><path d="M4 12h16"></path><path d="M4 17h16"></path></svg>
        </button>

        <a href="<?php echo esc_url($home_url); ?>" class="lux-brand" aria-label="<?php esc_attr_e('Chronel Shop home', 'dawp'); ?>">
            <?php
            echo function_exists('dawp_get_responsive_image')
                ? dawp_get_responsive_image($logo_url, __('Chronel Shop', 'dawp'), 'lux-brand__logo', 126, 50, 'eager', '(max-width: 560px) 99px, (max-width: 1080px) 111px, 126px', 'high')
                : '<img class="lux-brand__logo" src="' . esc_url($logo_url) . '" width="500" height="200" alt="' . esc_attr__('Chronel Shop', 'dawp') . '">';
            ?>
        </a>

        <nav class="lux-primary-nav" aria-label="<?php esc_attr_e('Primary navigation', 'dawp'); ?>">
            <?php foreach ($nav_items as $item) : ?>
                <?php if ('watches' === $item['key'] && !empty($watch_mega_groups)) : ?>
                    <div class="lux-nav-item">
                        <a class="lux-mega-trigger <?php echo $item['active'] ? 'is-current' : ''; ?>" href="<?php echo esc_url($item['url']); ?>"<?php echo $item['active'] ? ' aria-current="page"' : ''; ?>>
                            <?php echo esc_html($item['title']); ?>
                            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg>
                        </a>
                        <div class="lux-mega-panel" aria-label="<?php esc_attr_e('Watch collections', 'dawp'); ?>">
                            <div class="lux-mega-inner">
                                <div class="lux-mega-grid">
                                    <?php foreach ($watch_mega_groups as $index => $group) : ?>
                                        <?php $group_url = !empty($group['url']) ? $group['url'] : dawp_watch_category_url($group['title']); ?>
                                        <section class="lux-mega-group <?php echo 0 === $index ? 'lux-mega-group--wide' : ''; ?>">
                                            <h2 class="lux-mega-title"><a href="<?php echo esc_url($group_url); ?>"><?php echo esc_html($group['title']); ?></a></h2>
                                            <?php if (!empty($group['items'])) : ?>
                                                <ul class="lux-mega-list">
                                                    <?php foreach ($group['items'] as $label) : ?>
                                                        <li><a href="<?php echo esc_url(dawp_watch_category_url($label)); ?>"><?php echo esc_html($label); ?></a></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php else : ?>
                                                <span class="lux-mega-empty"><?php esc_html_e('View collection', 'dawp'); ?></span>
                                            <?php endif; ?>
                                        </section>
                                    <?php endforeach; ?>
                                </div>
                                <div class="lux-mega-footer">
                                    <a class="lux-mega-all" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop all watches', 'dawp'); ?> <span aria-hidden="true">&rarr;</span></a>
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
            <a href="<?php echo esc_url($cart_url); ?>" class="lux-icon-link" aria-label="<?php esc_attr_e('Shopping bag', 'dawp'); ?>">
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
                    <?php if ('watches' === $item['key'] && !empty($watch_mega_groups)) : ?>
                        <details class="lux-mobile-mega" <?php echo $item['active'] ? 'open' : ''; ?>>
                            <summary>
                                <span><?php echo esc_html($item['title']); ?></span>
                                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg>
                            </summary>
                            <div class="lux-mobile-mega__body">
                                <?php foreach ($watch_mega_groups as $index => $group) : ?>
                                    <?php $group_url = !empty($group['url']) ? $group['url'] : dawp_watch_category_url($group['title']); ?>
                                    <details class="lux-mobile-mega__group" <?php echo 0 === $index ? 'open' : ''; ?>>
                                        <summary>
                                            <span><?php echo esc_html($group['title']); ?></span>
                                            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg>
                                        </summary>
                                        <div class="lux-mobile-mega__links">
                                            <a href="<?php echo esc_url($group_url); ?>"><?php esc_html_e('View collection', 'dawp'); ?></a>
                                            <?php if (!empty($group['items'])) : ?>
                                                <?php foreach ($group['items'] as $label) : ?>
                                                    <a href="<?php echo esc_url(dawp_watch_category_url($label)); ?>"><?php echo esc_html($label); ?></a>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                    </details>
                                <?php endforeach; ?>
                                <a class="lux-mobile-mega__all" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop all watches', 'dawp'); ?></a>
                            </div>
                        </details>
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
