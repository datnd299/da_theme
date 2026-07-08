<?php
/**
 * Theme header — Rubyinstar
 * Red / White / Black theme.
 */

$shop_url = function_exists('wc_get_page_id') && wc_get_page_id('shop') > 0
    ? get_permalink(wc_get_page_id('shop'))
    : home_url('/shop/');

$cart_url = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$cart_count = function_exists('WC') && WC()->cart ? WC()->cart->get_cart_contents_count() : 0;

$menu_items = function_exists('dawp_main_menu_items') ? dawp_main_menu_items() : [
    ['title' => __('Home', 'dawp'),    'url' => home_url('/')],
    ['title' => __('Shop', 'dawp'),    'url' => $shop_url],
    ['title' => __('About', 'dawp'),   'url' => home_url('/about-us/')],
    ['title' => __('Contact', 'dawp'), 'url' => home_url('/contact-us/')],
];
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@600;700;800;900&family=Inter:wght@400;500;600;700;800&display=swap');

        :root {
            --ruby-black:    #050505;
            --ruby-ink:      #111111;
            --ruby-red:      #dc2626;
            --ruby-red-dark: #991b1b;
            --ruby-white:    #ffffff;
            --ruby-soft:     #f6f6f6;
            --ruby-muted:    #666666;
            --ruby-line:     #e5e5e5;
            --font-heading:  'Plus Jakarta Sans', sans-serif;
            --font-body:     'Inter', sans-serif;
            --radius:         8px;
        }

        body {
            margin: 0;
            background: var(--ruby-white);
            color: var(--ruby-ink);
            font-family: var(--font-body);
            -webkit-font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
        }

        .site-shell a {
            color: inherit;
            text-decoration: none;
        }

        .site-shell button,
        .site-shell input {
            font: inherit;
        }

        .hidden { display: none !important; }

        .sr-only {
            position: absolute; width: 1px; height: 1px;
            padding: 0; margin: -1px; overflow: hidden;
            clip: rect(0,0,0,0); white-space: nowrap; border: 0;
        }

        .skip-link:focus {
            position: fixed; left: 16px; top: 16px; z-index: 1000;
            width: auto; height: auto; clip: auto;
            padding: 12px 16px; border-radius: var(--radius);
            background: var(--ruby-red); color: #fff;
            font-size: 14px; font-weight: 800; white-space: normal;
        }

        /* ── Header ── */
        .ruby-header {
            position: sticky; top: 0; z-index: 1000;
            background: var(--ruby-black);
            color: #fff;
            box-shadow: 0 -1px 0 var(--ruby-black);
        }

        body.admin-bar .ruby-header {
            top: 32px;
        }

        .ruby-container {
            max-width: 1240px; margin: 0 auto; padding: 0 28px;
        }

        .ruby-navrow {
            display: flex; min-height: 80px; align-items: center; gap: 28px;
        }

        .ruby-brand {
            display: inline-flex; flex: 0 0 auto; min-width: 0; align-items: center;
            color: #fff;
        }

        .ruby-brand-logo {
            display: block;
            width: clamp(188px, 16vw, 218px);
            height: auto;
        }

        .ruby-brand-name {
            display: block; color: #fff;
            font-family: var(--font-heading);
            font-size: 25px; font-weight: 800; line-height: 1;
        }

        .ruby-brand-tagline {
            display: block; margin-top: 3px;
            color: rgba(255,255,255,.7);
            font-size: 11px; font-weight: 800;
            letter-spacing: .14em; text-transform: uppercase;
        }

        /* ── Main nav ── */
        .ruby-main-nav {
            display: flex; flex: 0 1 auto; align-items: center; gap: 6px;
        }

        .ruby-main-nav a {
            border-radius: var(--radius);
            padding: 11px 13px;
            color: rgba(255,255,255,.84);
            font-size: 14px; font-weight: 800;
            transition: background .15s, color .15s;
        }

        .ruby-main-nav a:hover,
        .ruby-main-nav a.is-current {
            background: var(--ruby-red);
            color: #fff;
        }

        .ruby-header-actions {
            display: flex; align-items: center; gap: 12px; margin-left: auto;
        }

        .ruby-search {
            display: flex;
            width: clamp(300px, 27vw, 390px);
            align-items: stretch;
        }

        .ruby-search input {
            min-width: 0; width: 100%; height: 48px;
            border: 1px solid rgba(255,255,255,.18); border-right: 0;
            border-radius: var(--radius) 0 0 var(--radius);
            background: #fff; color: var(--ruby-ink);
            padding: 0 16px; font-size: 14px; font-weight: 600; outline: none;
        }

        .ruby-search input:focus {
            box-shadow: 0 0 0 3px rgba(220,38,38,.24);
        }

        .ruby-search button,
        .ruby-icon-button,
        .ruby-cart-button {
            display: inline-flex; width: 48px; height: 48px;
            flex: 0 0 auto; align-items: center; justify-content: center;
            border: 0; border-radius: var(--radius);
            cursor: pointer;
            transition: background .15s, color .15s, transform .15s;
        }

        .ruby-search button {
            border-radius: 0 var(--radius) var(--radius) 0;
            background: var(--ruby-red); color: #fff;
        }

        .ruby-icon-button {
            border: 1px solid rgba(255,255,255,.16);
            background: rgba(255,255,255,.08); color: #fff;
        }

        .ruby-cart-button {
            position: relative;
            background: var(--ruby-red); color: #fff;
        }

        .ruby-search button:hover,
        .ruby-cart-button:hover {
            background: #fff; color: var(--ruby-black);
        }

        .ruby-icon-button:hover {
            background: rgba(255,255,255,.16);
        }

        .ruby-cart-count {
            position: absolute; right: 4px; top: 4px;
            display: flex; min-width: 18px; height: 18px;
            align-items: center; justify-content: center;
            border: 2px solid var(--ruby-black);
            border-radius: 999px; background: #fff;
            color: var(--ruby-red);
            font-size: 10px; font-weight: 800;
        }

        /* ── Mobile ── */
        .ruby-mobile-panel {
            border-top: 1px solid rgba(255,255,255,.1);
            background: var(--ruby-black);
            padding: 16px 20px;
        }

        .ruby-mobile-menu-grid {
            display: grid; gap: 8px;
        }

        .ruby-mobile-menu-grid a {
            border: 1px solid rgba(255,255,255,.12);
            border-radius: 12px;
            background: rgba(255,255,255,.06);
            padding: 14px 16px; color: #fff;
            font-size: 14px; font-weight: 800;
        }

        .ruby-mobile-search-form {
            display: flex; width: 100%; max-width: 1280px; margin: 0 auto;
        }

        .ruby-mobile-search-form button {
            width: auto; min-width: 92px; padding: 0 18px;
            font-size: 14px; font-weight: 800;
        }

        .ruby-mobile-only { display: none; }

        @media (max-width: 1023px) {
            .ruby-container { padding: 0 20px; }
            .ruby-main-nav, .ruby-desktop-search { display: none; }
            .ruby-mobile-only { display: inline-flex; }
            .ruby-navrow { min-height: 72px; gap: 14px; }
        }

        @media (max-width: 640px) {
            .ruby-container { padding: 0 16px; }
            .ruby-navrow { min-height: 64px; gap: 8px; }
            .ruby-header-actions { gap: 8px; }
            .ruby-search button,
            .ruby-icon-button,
            .ruby-cart-button {
                width: 44px;
                height: 44px;
            }
            .ruby-brand-name { font-size: 20px; }
            .ruby-brand-tagline { display: none; }
            .ruby-brand-logo { width: min(168px, 42vw); }
        }

        @media (max-width: 374px) {
            .ruby-container { padding: 0 12px; }
            .ruby-navrow { gap: 6px; }
            .ruby-header-actions { gap: 6px; }
            .ruby-search button,
            .ruby-icon-button,
            .ruby-cart-button {
                width: 40px;
                height: 40px;
            }
            .ruby-brand-logo { width: min(142px, 40vw); }
        }

        @media (max-width: 782px) {
            body.admin-bar .ruby-header {
                top: 46px;
            }
        }
    </style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="sr-only skip-link" href="#primary">
    <?php esc_html_e('Skip to content', 'dawp'); ?>
</a>

<header id="masthead" class="site-shell ruby-header">
    <div class="ruby-container ruby-navrow">
        <button id="rubyinstar-mobile-menu-toggle" class="ruby-icon-button ruby-mobile-only" type="button" aria-controls="rubyinstar-mobile-menu" aria-expanded="false">
            <span class="sr-only"><?php esc_html_e('Open menu', 'dawp'); ?></span>
            <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M4 7h16M4 12h16M4 17h16" /></svg>
        </button>

        <a href="<?php echo esc_url(home_url('/')); ?>" class="ruby-brand" aria-label="<?php echo esc_attr(get_bloginfo('name')); ?>">
            <img class="ruby-brand-logo" src="<?php echo esc_url(get_theme_file_uri('/assets/img/rubyinstar-logo.png')); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
        </a>

        <nav class="ruby-main-nav" aria-label="<?php esc_attr_e('Primary navigation', 'dawp'); ?>">
            <?php foreach ($menu_items as $item) : ?>
                <?php $is_current = function_exists('dawp_is_current_url') && dawp_is_current_url($item['url']); ?>
                <a href="<?php echo esc_url($item['url']); ?>" class="<?php echo $is_current ? 'is-current' : ''; ?>">
                    <?php echo esc_html($item['title']); ?>
                </a>
            <?php endforeach; ?>
        </nav>

        <div class="ruby-header-actions">
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="ruby-search ruby-desktop-search">
                <input type="hidden" name="post_type" value="product">
                <label class="sr-only" for="header-product-search"><?php esc_html_e('Search tires', 'dawp'); ?></label>
                <input id="header-product-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search tires', 'dawp'); ?>">
                <button type="submit" aria-label="<?php esc_attr_e('Search', 'dawp'); ?>">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="m21 21-4.3-4.3M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15z" /></svg>
                </button>
            </form>

            <button id="rubyinstar-mobile-search-toggle" class="ruby-icon-button ruby-mobile-only" type="button" aria-controls="rubyinstar-mobile-search" aria-expanded="false">
                <span class="sr-only"><?php esc_html_e('Open search', 'dawp'); ?></span>
                <svg width="21" height="21" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="m21 21-4.3-4.3M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15z" /></svg>
            </button>

            <a href="<?php echo esc_url($cart_url); ?>" class="ruby-cart-button" aria-label="<?php esc_attr_e('View cart', 'dawp'); ?>">
                <svg width="21" height="21" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.1" d="M3 4h2l2.2 11.2a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.5L21 8H7M10 21h.01M18 21h.01" /></svg>
                <?php if ($cart_count > 0) : ?>
                    <span class="ruby-cart-count"><?php echo esc_html($cart_count); ?></span>
                <?php endif; ?>
            </a>
        </div>
    </div>

    <div id="rubyinstar-mobile-search" class="ruby-mobile-panel hidden">
        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="ruby-search ruby-mobile-search-form">
            <input type="hidden" name="post_type" value="product">
            <label class="sr-only" for="mobile-product-search"><?php esc_html_e('Search tires', 'dawp'); ?></label>
            <input id="mobile-product-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search tires', 'dawp'); ?>">
            <button type="submit"><?php esc_html_e('Search', 'dawp'); ?></button>
        </form>
    </div>

    <nav id="rubyinstar-mobile-menu" class="ruby-mobile-panel hidden" aria-label="<?php esc_attr_e('Mobile navigation', 'dawp'); ?>">
        <div class="ruby-mobile-menu-grid">
            <?php foreach ($menu_items as $item) : ?>
                <a href="<?php echo esc_url($item['url']); ?>"><?php echo esc_html($item['title']); ?></a>
            <?php endforeach; ?>
            <a href="<?php echo esc_url(home_url('/#tire-finder')); ?>"><?php esc_html_e('Tire Finder', 'dawp'); ?></a>
            <a href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a>
        </div>
    </nav>
</header>
