<?php
/**
 * Theme header.
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
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@600;700;800&family=Inter:wght@400;500;600;700&display=swap');

        :root {
            --ruby-navy: #0B1F3A;
            --ruby-navy-light: #12294f;
            --ruby-orange: #F97316;
            --ruby-orange-dark: #DB5F0B;
            --ruby-white: #FFFFFF;
            --ruby-gray: #F5F6F8;
            --ruby-text: #111827;
            --ruby-soft: #6B7280;
            --ruby-border: #E5E7EB;
        }

        body {
            margin: 0;
            background: var(--ruby-white);
            color: var(--ruby-text);
            font-family: 'Inter', sans-serif;
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

        .hidden {
            display: none !important;
        }

        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0;
        }

        .skip-link:focus {
            position: fixed;
            left: 16px;
            top: 16px;
            z-index: 1000;
            width: auto;
            height: auto;
            clip: auto;
            padding: 12px 16px;
            border-radius: 10px;
            background: var(--ruby-orange);
            color: #fff;
            font-size: 14px;
            font-weight: 800;
            white-space: normal;
        }

        .ruby-header {
            position: sticky;
            top: 0;
            z-index: 50;
            background: var(--ruby-navy);
            color: #fff;
            box-shadow: 0 18px 42px -34px rgba(0, 0, 0, .95);
        }

        .ruby-container {
            max-width: 1240px;
            margin: 0 auto;
            padding: 0 28px;
        }

        .ruby-accent {
            color: #FDBA74;
        }

        .ruby-navrow {
            display: flex;
            min-height: 80px;
            align-items: center;
            gap: 28px;
        }

        .ruby-brand {
            display: inline-flex;
            flex: 0 0 auto;
            min-width: 0;
            align-items: center;
            color: #fff;
        }

        .ruby-brand-logo {
            display: block;
            width: clamp(188px, 16vw, 218px);
            height: auto;
        }

        .ruby-brand-name {
            display: block;
            color: #fff;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 25px;
            font-weight: 800;
            line-height: 1;
        }

        .ruby-brand-tagline {
            display: block;
            margin-top: 3px;
            color: rgba(255, 255, 255, .7);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .14em;
            text-transform: uppercase;
        }

        .ruby-main-nav {
            display: flex;
            flex: 0 1 auto;
            align-items: center;
            gap: 6px;
            margin-left: 0;
        }

        .ruby-main-nav a {
            border-radius: 8px;
            padding: 11px 13px;
            color: rgba(255, 255, 255, .84);
            font-size: 14px;
            font-weight: 800;
            transition: background .15s ease, color .15s ease;
        }

        .ruby-main-nav a:hover,
        .ruby-main-nav a.is-current {
            background: #fff;
            color: var(--ruby-navy);
        }

        .ruby-header-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-left: auto;
        }

        .ruby-search {
            display: flex;
            width: clamp(300px, 27vw, 390px);
            align-items: stretch;
        }

        .ruby-search input {
            min-width: 0;
            width: 100%;
            height: 48px;
            border: 1px solid rgba(255, 255, 255, .18);
            border-right: 0;
            border-radius: 8px 0 0 8px;
            background: #fff;
            color: var(--ruby-text);
            padding: 0 16px;
            font-size: 14px;
            font-weight: 600;
            outline: none;
        }

        .ruby-search input:focus {
            box-shadow: 0 0 0 3px rgba(249, 115, 22, .24);
        }

        .ruby-search button,
        .ruby-icon-button,
        .ruby-cart-button {
            display: inline-flex;
            width: 48px;
            height: 48px;
            flex: 0 0 auto;
            align-items: center;
            justify-content: center;
            border: 0;
            border-radius: 8px;
            cursor: pointer;
            transition: background .15s ease, color .15s ease, transform .15s ease;
        }

        .ruby-search button {
            border-radius: 0 8px 8px 0;
            background: var(--ruby-orange);
            color: #fff;
        }

        .ruby-icon-button {
            border: 1px solid rgba(255, 255, 255, .16);
            background: rgba(255, 255, 255, .08);
            color: #fff;
        }

        .ruby-cart-button {
            position: relative;
            background: var(--ruby-orange);
            color: #fff;
        }

        .ruby-search button:hover,
        .ruby-cart-button:hover {
            background: #fff;
            color: var(--ruby-navy);
        }

        .ruby-icon-button:hover {
            background: rgba(255, 255, 255, .16);
        }

        .ruby-cart-count {
            position: absolute;
            right: -7px;
            top: -7px;
            display: flex;
            min-width: 20px;
            height: 20px;
            align-items: center;
            justify-content: center;
            border: 2px solid var(--ruby-navy);
            border-radius: 999px;
            background: #fff;
            color: var(--ruby-orange);
            font-size: 11px;
            font-weight: 800;
        }

        .ruby-quicknav {
            border-top: 1px solid rgba(255, 255, 255, .1);
            background: #102846;
        }

        .ruby-quicknav-inner {
            display: flex;
            min-height: 48px;
            align-items: center;
            gap: 18px;
            overflow-x: auto;
            scrollbar-width: none;
        }

        .ruby-quicknav-inner::-webkit-scrollbar {
            display: none;
        }

        .ruby-quicknav a {
            flex: 0 0 auto;
            border-radius: 8px;
            padding: 9px 14px;
            color: rgba(255, 255, 255, .82);
            font-size: 13px;
            font-weight: 800;
            white-space: nowrap;
            transition: background .15s ease, color .15s ease;
        }

        .ruby-quicknav a:hover,
        .ruby-quicknav a:first-child {
            background: var(--ruby-orange);
            color: #fff;
        }

        .ruby-mobile-panel {
            border-top: 1px solid rgba(255, 255, 255, .1);
            background: var(--ruby-navy);
            padding: 16px 20px;
        }

        .ruby-mobile-menu-grid {
            display: grid;
            gap: 8px;
        }

        .ruby-mobile-menu-grid a {
            border: 1px solid rgba(255, 255, 255, .12);
            border-radius: 12px;
            background: rgba(255, 255, 255, .06);
            padding: 14px 16px;
            color: #fff;
            font-size: 14px;
            font-weight: 800;
        }

        .ruby-mobile-search-form {
            display: flex;
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
        }

        .ruby-mobile-search-form button {
            width: auto;
            min-width: 92px;
            padding: 0 18px;
            font-size: 14px;
            font-weight: 800;
        }

        .ruby-mobile-only {
            display: none;
        }

        @media (max-width: 1023px) {
            .ruby-container {
                padding: 0 20px;
            }

            .ruby-main-nav,
            .ruby-desktop-search,
            .ruby-quicknav {
                display: none;
            }

            .ruby-mobile-only {
                display: inline-flex;
            }

            .ruby-navrow {
                min-height: 72px;
                gap: 14px;
            }
        }

        @media (max-width: 640px) {
            .ruby-container {
                padding: 0 16px;
            }

            .ruby-brand-name {
                font-size: 20px;
            }

            .ruby-brand-tagline {
                display: none;
            }

            .ruby-brand-logo {
                width: min(186px, 48vw);
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

    <div class="ruby-quicknav" aria-label="<?php esc_attr_e('Shop shortcuts', 'dawp'); ?>">
        <div class="ruby-container ruby-quicknav-inner">
            <a href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop Tires', 'dawp'); ?></a>
            <a href="<?php echo esc_url(home_url('/#finder-card')); ?>"><?php esc_html_e('Tire Finder', 'dawp'); ?></a>
            <a href="<?php echo esc_url(home_url('/shop-by-rim-size/')); ?>"><?php esc_html_e('Shop By Rim Size', 'dawp'); ?></a>
            <a href="<?php echo esc_url(home_url('/shop-by-vehicle-type/')); ?>"><?php esc_html_e('Vehicle Type', 'dawp'); ?></a>
            <a href="<?php echo esc_url(home_url('/#deals')); ?>"><?php esc_html_e('Deals', 'dawp'); ?></a>
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
            <a href="<?php echo esc_url(home_url('/#finder-card')); ?>"><?php esc_html_e('Tire Finder', 'dawp'); ?></a>
            <a href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a>
        </div>
    </nav>
</header>
