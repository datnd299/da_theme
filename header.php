<?php
/**
 * Theme header — ShopGraphicshirt
 * Patriot Navy / Heritage Red / Antique White
 */

$shop_url = function_exists('wc_get_page_id') && wc_get_page_id('shop') > 0
    ? get_permalink(wc_get_page_id('shop'))
    : home_url('/shop/');

$cart_url = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$cart_count = function_exists('WC') && WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
$account_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');
$account_url = $account_url ? $account_url : home_url('/my-account/');
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@600;700;800;900&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --navy: #0B1F3A;
            --navy-dark: #07152a;
            --red: #B31942;
            --red-dark: #991B1B;
            --gold: #C6A15B;
            --antique: #F7F2E8;
            --white: #FFFFFF;
            --ink: #111827;
            --muted: #6B7280;
            --line: #E5E7EB;
            --radius: 8px;
            --font-heading: 'Barlow Condensed', 'Impact', sans-serif;
            --font-body: 'Inter', system-ui, -apple-system, sans-serif;
        }

        *, *::before, *::after { box-sizing: border-box; }

        body {
            margin: 0;
            background: var(--white);
            color: var(--ink);
            font-family: var(--font-body);
            font-size: clamp(16px, 0.96rem + 0.18vw, 17px);
            line-height: 1.65;
            -webkit-font-smoothing: antialiased;
            -webkit-text-size-adjust: 100%;
            text-size-adjust: 100%;
        }

        a { color: inherit; text-decoration: none; }
        img { max-width: 100%; height: auto; display: block; }
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
            background: var(--red); color: var(--white);
            font-size: 15px; font-weight: 700; white-space: normal;
        }

        /* ── Header ── */
        .sgs-header {
            position: sticky; top: var(--sgs-admin-offset, 0); z-index: 50;
            background: var(--navy); color: var(--white);
        }

        body.admin-bar {
            --sgs-admin-offset: 32px;
        }

        @media (max-width: 782px) {
            body.admin-bar {
                --sgs-admin-offset: 46px;
            }
        }

        .sgs-container {
            max-width: 1280px; margin: 0 auto; padding: 0 24px;
        }

        .sgs-navrow {
            display: flex; min-height: 76px; align-items: center; gap: 20px;
        }

        .sgs-brand {
            display: flex; flex: 0 0 auto; align-items: center;
            color: var(--white);
        }

        .sgs-brand-logo {
            display: block;
            width: clamp(170px, 14vw, 200px);
            height: auto;
        }

        /* ── Nav ── */
        .sgs-main-nav {
            display: flex; align-items: center; gap: 4px;
        }

        .sgs-main-nav a {
            border-radius: var(--radius);
            padding: 10px 12px;
            color: rgba(255,255,255,0.82);
            font-family: var(--font-body);
            font-size: 14px; font-weight: 600;
            letter-spacing: 0.02em;
            transition: background 150ms, color 150ms;
        }

        .sgs-main-nav a:hover,
        .sgs-main-nav a.is-current {
            background: var(--red); color: var(--white);
        }

        .sgs-header-actions {
            display: flex; align-items: center; gap: 10px; margin-left: auto;
        }

        .sgs-search {
            display: flex;
            width: clamp(240px, 22vw, 320px);
            align-items: stretch;
        }

        .sgs-search input {
            min-width: 0; width: 100%; height: 44px;
            border: 1px solid rgba(255,255,255,0.15); border-right: 0;
            border-radius: var(--radius) 0 0 var(--radius);
            background: var(--white); color: var(--ink);
            padding: 0 14px; font-size: 16px; font-weight: 500; outline: none;
            font-family: var(--font-body);
        }

        .sgs-search input:focus {
            box-shadow: 0 0 0 3px rgba(179,25,66,0.2);
        }

        .sgs-search button,
        .sgs-icon-btn,
        .sgs-cart-btn {
            display: inline-flex; width: 44px; height: 44px;
            flex: 0 0 auto;
            align-items: center; justify-content: center;
            border: 0; border-radius: var(--radius);
            cursor: pointer;
            transition: background 150ms, color 150ms;
        }

        .sgs-search button {
            border-radius: 0 var(--radius) var(--radius) 0;
            background: var(--red); color: var(--white);
        }

        .sgs-icon-btn {
            border: 1px solid rgba(255,255,255,0.15);
            background: rgba(255,255,255,0.06); color: var(--white);
        }

        .sgs-cart-btn {
            position: relative;
            background: var(--red); color: var(--white);
        }

        .sgs-search button:hover,
        .sgs-cart-btn:hover {
            background: var(--white); color: var(--navy);
        }

        .sgs-icon-btn:hover {
            background: rgba(255,255,255,0.12);
        }

        .sgs-cart-count {
            position: absolute; right: -6px; top: -6px;
            display: flex; min-width: 18px; height: 18px;
            align-items: center; justify-content: center;
            border: 2px solid var(--navy);
            border-radius: 999px; background: var(--white);
            color: var(--red);
            font-size: 11px; font-weight: 800;
        }

        .sgs-quicknav {
            border-top: 1px solid rgba(255,255,255,0.08);
            background: #0a1a30;
        }

        .sgs-quicknav-inner {
            display: flex; min-height: 44px; align-items: center; gap: 14px;
            overflow-x: auto; scrollbar-width: none;
        }

        .sgs-quicknav-inner::-webkit-scrollbar { display: none; }

        .sgs-quicknav a {
            flex: 0 0 auto; border-radius: var(--radius);
            padding: 8px 12px;
            color: rgba(255,255,255,0.78);
            font-family: var(--font-body);
            font-size: 13px; font-weight: 700;
            white-space: nowrap;
            transition: background 150ms, color 150ms;
        }

        .sgs-quicknav a:hover {
            background: var(--red); color: var(--white);
        }

        /* ── Mobile ── */
        .sgs-mobile-panel {
            border-top: 1px solid rgba(255,255,255,0.08);
            background: var(--navy);
            padding: 14px 20px;
        }

        .sgs-mobile-grid {
            display: grid; gap: 6px;
        }

        .sgs-mobile-grid a,
        .sgs-mobile-grid button {
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 10px;
            background: rgba(255,255,255,0.05);
            padding: 12px 14px; color: var(--white);
            font-size: 16px; font-weight: 600; font-family: var(--font-body);
            cursor: pointer; text-align: left;
        }

        .sgs-mobile-search-form {
            display: flex; width: 100%; max-width: 1280px; margin: 0 auto;
        }

        .sgs-mobile-search-form button {
            width: auto; min-width: 80px; padding: 0 16px;
            font-size: 15px; font-weight: 700;
        }

        .sgs-mobile-only { display: none; }

        .sgs-cat-expand {
            display: flex; align-items: center; justify-content: space-between;
        }

        .sgs-cat-expand::after {
            content: "+"; font-size: 18px; font-weight: 700;
            transition: transform 200ms;
        }

        .sgs-cat-expand[aria-expanded="true"]::after {
            content: "−";
        }

        .sgs-subcats {
            display: grid; gap: 2px;
            padding-left: 14px; margin-top: 2px;
        }

        .sgs-subcats a {
            font-size: 15px; padding: 9px 14px; border: 0;
        }

        .sgs-customize-btn {
            display: block; width: 100%; margin: 6px 0;
            padding: 12px;
            background: var(--red); color: var(--white);
            border-radius: var(--radius);
            font-family: var(--font-heading);
            font-size: 15px; font-weight: 800; text-align: center;
            letter-spacing: 0.06em; text-transform: uppercase;
        }

        @media (max-width: 1023px) {
            .sgs-container { padding: 0 18px; }
            .sgs-main-nav, .sgs-desktop-search, .sgs-quicknav { display: none; }
            .sgs-mobile-only { display: inline-flex; }
            .sgs-navrow { min-height: 64px; gap: 12px; }
            .sgs-brand { min-width: 0; flex: 1 1 auto; }
            .sgs-header-actions { flex: 0 0 auto; gap: 8px; margin-left: 0; }
            .sgs-icon-btn,
            .sgs-cart-btn {
                width: 40px;
                height: 40px;
            }
            .sgs-mobile-panel {
                padding: 12px 18px 16px;
            }
        }

        @media (max-width: 640px) {
            .sgs-container { padding: 0 12px; }
            .sgs-navrow { gap: 8px; }
            .sgs-brand-logo { width: min(148px, 38vw); }
            .sgs-header-actions { gap: 6px; }
            .sgs-icon-btn,
            .sgs-cart-btn {
                width: 38px;
                height: 38px;
            }
            .sgs-mobile-panel {
                padding-inline: 12px;
            }
            .sgs-mobile-search-form button {
                min-width: 70px;
                padding-inline: 12px;
                font-size: 14px;
            }
        }
    </style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="sr-only skip-link" href="#primary">
    <?php esc_html_e('Skip to content', 'shopgraphicshirt'); ?>
</a>

<header id="masthead" class="sgs-header">
    <div class="sgs-container sgs-navrow">
        <button id="sgs-mobile-toggle" class="sgs-icon-btn sgs-mobile-only" type="button" aria-controls="sgs-mobile-menu" aria-expanded="false">
            <span class="sr-only"><?php esc_html_e('Open menu', 'shopgraphicshirt'); ?></span>
            <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M4 7h16M4 12h16M4 17h16" /></svg>
        </button>

        <a href="<?php echo esc_url(home_url('/')); ?>" class="sgs-brand" aria-label="<?php echo esc_attr(get_bloginfo('name')); ?>">
            <img class="sgs-brand-logo"
                 src="<?php echo esc_url(get_theme_file_uri('/assets/img/logo-shopgraphicshirt.svg')); ?>"
                 alt="<?php echo esc_attr(get_bloginfo('name')); ?>"
                 width="420"
                 height="112"
                 decoding="async">
        </a>

        <nav class="sgs-main-nav" aria-label="<?php esc_attr_e('Primary', 'shopgraphicshirt'); ?>">
            <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
            <a href="<?php echo esc_url($shop_url); ?>">Shop</a>
            <a href="<?php echo esc_url(home_url('/about-us/')); ?>">About</a>
            <a href="<?php echo esc_url(home_url('/contact-us/')); ?>">Contact</a>
        </nav>

        <div class="sgs-header-actions">
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="sgs-search sgs-desktop-search">
                <input type="hidden" name="post_type" value="product">
                <label class="sr-only" for="sgs-prod-search"><?php esc_html_e('Search patriotic gifts...', 'shopgraphicshirt'); ?></label>
                <input id="sgs-prod-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search patriotic gifts...', 'shopgraphicshirt'); ?>">
                <button type="submit" aria-label="<?php esc_attr_e('Search', 'shopgraphicshirt'); ?>">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="m21 21-4.3-4.3M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15z" /></svg>
                </button>
            </form>

            <button id="sgs-mobile-search-toggle" class="sgs-icon-btn sgs-mobile-only" type="button" aria-controls="sgs-mobile-search" aria-expanded="false">
                <span class="sr-only"><?php esc_html_e('Search', 'shopgraphicshirt'); ?></span>
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="m21 21-4.3-4.3M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15z" /></svg>
            </button>

            <a href="<?php echo esc_url($account_url); ?>" class="sgs-icon-btn" aria-label="<?php esc_attr_e('My Account', 'shopgraphicshirt'); ?>">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM4 21v-1a6 6 0 0 1 6-6h4a6 6 0 0 1 6 6v1"/></svg>
            </a>

            <a href="<?php echo esc_url($cart_url); ?>" class="sgs-cart-btn" aria-label="<?php esc_attr_e('View cart', 'shopgraphicshirt'); ?>">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h2l2.2 11.2a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.5L21 8H7M10 21h.01M18 21h.01"/></svg>
                <?php if ($cart_count > 0) : ?>
                    <span class="sgs-cart-count"><?php echo esc_html($cart_count); ?></span>
                <?php endif; ?>
            </a>
        </div>
    </div>

    <div id="sgs-mobile-search" class="sgs-mobile-panel hidden">
        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="sgs-search sgs-mobile-search-form">
            <input type="hidden" name="post_type" value="product">
            <label class="sr-only" for="sgs-mobile-search-input"><?php esc_html_e('Search patriotic gifts...', 'shopgraphicshirt'); ?></label>
            <input id="sgs-mobile-search-input" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search patriotic gifts...', 'shopgraphicshirt'); ?>">
            <button type="submit"><?php esc_html_e('Search', 'shopgraphicshirt'); ?></button>
        </form>
    </div>

    <nav id="sgs-mobile-menu" class="sgs-mobile-panel hidden" aria-label="<?php esc_attr_e('Mobile navigation', 'shopgraphicshirt'); ?>">
        <div class="sgs-mobile-grid">
            <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
            <a href="<?php echo esc_url($shop_url); ?>">Shop</a>
            <a href="<?php echo esc_url(home_url('/about-us/')); ?>">About</a>
            <a href="<?php echo esc_url(home_url('/contact-us/')); ?>">Contact</a>
        </div>
    </nav>
</header>
