<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
    <style>
        :root {
            --hcs-ink: #17212B;
            --hcs-pine: #2F4A43;
            --hcs-sage: #A7B7A5;
            --hcs-rose: #B87C7C;
            --hcs-fog: #E7E8E3;
            --hcs-ivory: #F7F3EC;
            --hcs-charcoal: #202326;
            --hcs-slate: #6E7472;
        }
        .hcs-header-shell,
        .hcs-header-shell * {
            box-sizing: border-box;
        }
        .hcs-header-shell a {
            color: inherit;
            text-decoration: none;
        }
        .hcs-topbar {
            background: var(--hcs-ink);
            color: rgba(247, 243, 236, .88);
            font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            font-size: 12px;
            font-weight: 700;
        }
        .hcs-header-wrap {
            width: min(100% - 32px, 1180px);
            margin: 0 auto;
        }
        .hcs-topbar-inner {
            min-height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 22px;
            text-align: center;
        }
        .hcs-topbar-dot {
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: var(--hcs-sage);
            display: inline-block;
        }
        #site-header {
            position: sticky;
            top: 0;
            z-index: 50;
            background: rgba(247, 243, 236, .96);
            border-bottom: 1px solid rgba(23, 33, 43, .1);
            box-shadow: 0 10px 30px rgba(23, 33, 43, .06);
            backdrop-filter: blur(12px);
            color: var(--hcs-charcoal);
            font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }
        #site-header.hcs-is-scrolled {
            box-shadow: 0 14px 34px rgba(23, 33, 43, .12);
        }
        .hcs-mainbar {
            min-height: 76px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
        }
        .hcs-brand {
            display: inline-flex;
            align-items: center;
            min-width: max-content;
        }
        .hcs-brand-logo {
            display: block;
            width: auto;
            height: 54px;
            max-width: 210px;
            object-fit: contain;
        }
        .hcs-desktop-nav {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 4px;
            flex: 1;
        }
        .hcs-nav-item,
        .hcs-nav-trigger {
            min-height: 42px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 10px 13px;
            border-radius: 999px;
            border: 0;
            background: transparent;
            color: var(--hcs-charcoal);
            cursor: pointer;
            font: inherit;
            font-size: 14px;
            font-weight: 800;
            white-space: nowrap;
            transition: background .18s ease, color .18s ease;
        }
        .hcs-nav-item:hover,
        .hcs-nav-item[aria-current="page"],
        .hcs-nav-trigger:hover,
        .hcs-nav-group:hover .hcs-nav-trigger {
            background: var(--hcs-fog);
            color: var(--hcs-pine);
        }
        .hcs-nav-group {
            position: relative;
        }
        .hcs-megamenu {
            position: absolute;
            top: calc(100% + 12px);
            left: 50%;
            transform: translate(-50%, -6px);
            width: min(720px, calc(100vw - 40px));
            padding: 18px;
            border-radius: 22px;
            background: #fff;
            border: 1px solid rgba(23, 33, 43, .12);
            box-shadow: 0 24px 55px rgba(23, 33, 43, .18);
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transition: opacity .2s ease, transform .2s ease, visibility 0s .2s;
        }
        .hcs-nav-group:hover .hcs-megamenu,
        .hcs-nav-group:focus-within .hcs-megamenu {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
            transform: translate(-50%, 0);
            transition: opacity .2s ease, transform .2s ease;
        }
        .hcs-megamenu-grid {
            display: grid;
            grid-template-columns: 1.2fr .8fr;
            gap: 18px;
        }
        .hcs-mega-links {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 10px;
        }
        .hcs-mega-link {
            display: grid;
            gap: 6px;
            padding: 15px;
            min-height: 116px;
            border-radius: 18px;
            background: var(--hcs-ivory);
            border: 1px solid rgba(23, 33, 43, .08);
            transition: transform .18s ease, border-color .18s ease, box-shadow .18s ease;
        }
        .hcs-mega-link:hover {
            transform: translateY(-1px);
            border-color: rgba(184, 124, 124, .45);
            box-shadow: 0 12px 24px rgba(23, 33, 43, .08);
        }
        .hcs-mega-link strong {
            color: var(--hcs-ink);
            font-family: "Cormorant Garamond", Georgia, "Times New Roman", serif;
            font-size: 22px;
            line-height: 1.05;
        }
        .hcs-mega-link span {
            color: var(--hcs-slate);
            font-size: 13px;
            line-height: 1.5;
        }
        .hcs-mega-panel {
            border-radius: 18px;
            padding: 18px;
            background: var(--hcs-pine);
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 22px;
        }
        .hcs-mega-panel p {
            margin: 0;
            color: rgba(247, 243, 236, .8);
            font-size: 13px;
            line-height: 1.6;
        }
        .hcs-mega-panel strong {
            display: block;
            font-family: "Cormorant Garamond", Georgia, "Times New Roman", serif;
            font-size: 28px;
            line-height: 1.05;
            margin-bottom: 8px;
        }
        .hcs-mini-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 42px;
            width: max-content;
            border-radius: 999px;
            padding: 10px 16px;
            background: var(--hcs-rose);
            color: #fff;
            font-size: 13px;
            font-weight: 800;
            transition: background .18s ease;
        }
        .hcs-mini-btn:hover {
            background: var(--hcs-ink);
        }
        .hcs-actions {
            display: flex;
            align-items: center;
            gap: 8px;
            min-width: max-content;
        }
        .hcs-search {
            width: 230px;
            position: relative;
        }
        .hcs-search input {
            width: 100%;
            height: 42px;
            border: 1px solid rgba(23, 33, 43, .14);
            border-radius: 999px;
            background: #fff;
            color: var(--hcs-charcoal);
            font: inherit;
            font-size: 13px;
            padding: 0 42px 0 16px;
            outline: none;
        }
        .hcs-search input:focus {
            border-color: var(--hcs-pine);
            box-shadow: 0 0 0 3px rgba(167, 183, 165, .36);
        }
        .hcs-search button,
        .hcs-icon-btn {
            width: 42px;
            height: 42px;
            border: 0;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: transparent;
            color: var(--hcs-pine);
            cursor: pointer;
            transition: background .18s ease, color .18s ease;
        }
        .hcs-search button {
            position: absolute;
            right: 0;
            top: 0;
        }
        .hcs-icon-btn {
            background: var(--hcs-fog);
        }
        .hcs-icon-btn:hover,
        .hcs-search button:hover {
            background: var(--hcs-pine);
            color: #fff;
        }
        .hcs-cart-btn {
            position: relative;
        }
        .hcs-cart-count {
            position: absolute;
            top: -3px;
            right: -3px;
            min-width: 18px;
            height: 18px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0 5px;
            border-radius: 999px;
            background: var(--hcs-pine);
            color: #fff;
            font-size: 10px;
            font-weight: 800;
            line-height: 1;
        }
        .hcs-cart-btn:hover .hcs-cart-count {
            background: var(--hcs-pine);
            color: #fff;
        }
        .hcs-mobile-toggle {
            display: none;
        }
        .hcs-mobile-search {
            display: none;
            padding: 0 0 14px;
        }
        .hcs-drawer-overlay {
            position: fixed;
            inset: 0;
            z-index: 80;
            background: rgba(23, 33, 43, .56);
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transition: opacity .24s ease, visibility 0s .24s;
        }
        .hcs-drawer-overlay.is-open {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
            transition: opacity .24s ease;
        }
        .hcs-mobile-drawer {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 90;
            width: min(88vw, 390px);
            height: 100%;
            overflow-y: auto;
            background: var(--hcs-ivory);
            box-shadow: 24px 0 55px rgba(23, 33, 43, .26);
            transform: translateX(-100%);
            transition: transform .28s ease;
            font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }
        .hcs-mobile-drawer.is-open {
            transform: translateX(0);
        }
        .hcs-drawer-head {
            min-height: 74px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            padding: 16px;
            border-bottom: 1px solid rgba(23, 33, 43, .1);
        }
        .hcs-drawer-section {
            padding: 16px;
        }
        .hcs-drawer-eyebrow {
            display: block;
            margin-bottom: 10px;
            color: var(--hcs-pine);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .12em;
            text-transform: uppercase;
        }
        .hcs-drawer-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 14px 0;
            color: var(--hcs-charcoal);
            font-size: 15px;
            font-weight: 800;
            border-bottom: 1px solid rgba(23, 33, 43, .08);
        }
        .hcs-drawer-card {
            margin-top: 16px;
            border-radius: 18px;
            padding: 18px;
            background: var(--hcs-pine);
            color: #fff;
        }
        .hcs-drawer-card p {
            margin: 0 0 14px;
            color: rgba(247, 243, 236, .82);
            font-size: 13px;
            line-height: 1.6;
        }
        @media (max-width: 1120px) {
            .hcs-search {
                width: 190px;
            }
        }
        @media (max-width: 960px) {
            .hcs-desktop-nav,
            .hcs-search,
            .hcs-account-btn {
                display: none;
            }
            .hcs-mobile-toggle {
                display: inline-flex;
            }
            .hcs-mainbar {
                min-height: 68px;
            }
            .hcs-topbar-inner {
                justify-content: flex-start;
                overflow-x: auto;
                white-space: nowrap;
                scrollbar-width: none;
            }
            .hcs-topbar-inner::-webkit-scrollbar {
                display: none;
            }
        }
        @media (max-width: 520px) {
            .hcs-header-wrap {
                width: min(100% - 24px, 1180px);
            }
            .hcs-brand-logo {
                height: 42px;
                max-width: 170px;
            }
            .hcs-icon-btn {
                width: 40px;
                height: 40px;
            }
        }
    </style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
$cart_count  = 0;
$cart_url    = home_url('/cart/');
$account_url = home_url('/my-account/');

if (class_exists('WooCommerce')) {
    $cart_count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
    $cart_url   = function_exists('wc_get_cart_url') ? wc_get_cart_url() : $cart_url;

    $account_page_id = get_option('woocommerce_myaccount_page_id');
    if ($account_page_id) {
        $account_url = get_permalink($account_page_id);
    }
}

$main_links = array(
    array('title' => __('Home', 'dawp'), 'url' => home_url('/')),
    array('title' => __('Shop', 'dawp'), 'url' => home_url('/shop/')),
    array('title' => __('About', 'dawp'), 'url' => home_url('/about-us/')),
    array('title' => __('Contact', 'dawp'), 'url' => home_url('/contact-us/')),
);
?>

<div class="hcs-header-shell">
    <div class="hcs-topbar">
        <div class="hcs-header-wrap hcs-topbar-inner" aria-label="<?php esc_attr_e('Store highlights', 'dawp'); ?>">
            <span><?php esc_html_e('Secure Checkout', 'dawp'); ?></span>
            <span class="hcs-topbar-dot" aria-hidden="true"></span>
            <span><?php esc_html_e('Tracking Included', 'dawp'); ?></span>
            <span class="hcs-topbar-dot" aria-hidden="true"></span>
            <span><?php esc_html_e('30-Day Returns', 'dawp'); ?></span>
            <span class="hcs-topbar-dot" aria-hidden="true"></span>
            <span><?php esc_html_e('Support Mon-Fri, 9 AM-5 PM PST', 'dawp'); ?></span>
        </div>
    </div>

    <header id="site-header" role="banner">
        <div class="hcs-header-wrap">
            <div class="hcs-mainbar">
                <button id="hcs-menu-toggle"
                        class="hcs-icon-btn hcs-mobile-toggle"
                        type="button"
                        aria-expanded="false"
                        aria-controls="hcs-mobile-drawer"
                        aria-label="<?php esc_attr_e('Open menu', 'dawp'); ?>">
                    <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true">
                        <line x1="4" y1="6" x2="20" y2="6"></line>
                        <line x1="4" y1="12" x2="20" y2="12"></line>
                        <line x1="4" y1="18" x2="20" y2="18"></line>
                    </svg>
                </button>

                <a class="hcs-brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php esc_attr_e('Handcraft Shoe home', 'dawp'); ?>">
                    <img class="hcs-brand-logo"
                         src="<?php echo esc_url(get_theme_file_uri('/assets/img/logo.png')); ?>"
                         alt="<?php esc_attr_e('Handcraft Shoe', 'dawp'); ?>">
                </a>

                <nav class="hcs-desktop-nav" aria-label="<?php esc_attr_e('Main Navigation', 'dawp'); ?>">
                    <?php foreach ($main_links as $link) : ?>
                        <a class="hcs-nav-item"
                           href="<?php echo esc_url($link['url']); ?>"
                           <?php echo function_exists('dawp_is_current_url') && dawp_is_current_url($link['url']) ? 'aria-current="page"' : ''; ?>>
                            <?php echo esc_html($link['title']); ?>
                        </a>
                    <?php endforeach; ?>
                </nav>

                <div class="hcs-actions">
                    <form class="hcs-search" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" autocomplete="off">
                        <label class="screen-reader-text" for="hcs-search-field"><?php esc_html_e('Search products', 'dawp'); ?></label>
                        <input id="hcs-search-field"
                               type="search"
                               name="s"
                               value=""
                               autocomplete="off"
                               placeholder="<?php esc_attr_e('Search footwear...', 'dawp'); ?>">
                        <input type="hidden" name="post_type" value="product">
                        <button type="submit" aria-label="<?php esc_attr_e('Search', 'dawp'); ?>">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <circle cx="11" cy="11" r="8"></circle>
                                <path d="M21 21l-4.35-4.35"></path>
                            </svg>
                        </button>
                    </form>

                    <button id="hcs-mobile-search-toggle"
                            class="hcs-icon-btn hcs-mobile-toggle"
                            type="button"
                            aria-expanded="false"
                            aria-controls="hcs-mobile-search"
                            aria-label="<?php esc_attr_e('Open search', 'dawp'); ?>">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="M21 21l-4.35-4.35"></path>
                        </svg>
                    </button>

                    <a class="hcs-icon-btn hcs-account-btn"
                       href="<?php echo esc_url($account_url); ?>"
                       aria-label="<?php esc_attr_e('My Account', 'dawp'); ?>">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="12" cy="8" r="4"></circle>
                            <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"></path>
                        </svg>
                    </a>

                    <a class="hcs-icon-btn hcs-cart-btn"
                       href="<?php echo esc_url($cart_url); ?>"
                       aria-label="<?php printf(esc_attr__('Cart (%d items)', 'dawp'), (int) $cart_count); ?>">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <path d="M16 10a4 4 0 0 1-8 0"></path>
                        </svg>
                        <?php if ($cart_count > 0) : ?>
                            <span class="hcs-cart-count" aria-hidden="true"><?php echo esc_html($cart_count); ?></span>
                        <?php endif; ?>
                    </a>
                </div>
            </div>

            <div id="hcs-mobile-search" class="hcs-mobile-search">
                <form class="hcs-search" style="display:block;width:100%;" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" autocomplete="off">
                    <label class="screen-reader-text" for="hcs-mobile-search-field"><?php esc_html_e('Search products', 'dawp'); ?></label>
                    <input id="hcs-mobile-search-field"
                           type="search"
                           name="s"
                           value=""
                           autocomplete="off"
                           placeholder="<?php esc_attr_e('Search footwear...', 'dawp'); ?>">
                    <input type="hidden" name="post_type" value="product">
                    <button type="submit" aria-label="<?php esc_attr_e('Search', 'dawp'); ?>">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="M21 21l-4.35-4.35"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </header>

    <div id="hcs-drawer-overlay" class="hcs-drawer-overlay" aria-hidden="true"></div>

    <aside id="hcs-mobile-drawer" class="hcs-mobile-drawer" aria-label="<?php esc_attr_e('Mobile Navigation', 'dawp'); ?>">
        <div class="hcs-drawer-head">
            <a class="hcs-brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php esc_attr_e('Handcraft Shoe home', 'dawp'); ?>">
                <img class="hcs-brand-logo"
                     src="<?php echo esc_url(get_theme_file_uri('/assets/img/logo.png')); ?>"
                     alt="<?php esc_attr_e('Handcraft Shoe', 'dawp'); ?>">
            </a>
            <button id="hcs-drawer-close" class="hcs-icon-btn" type="button" aria-label="<?php esc_attr_e('Close menu', 'dawp'); ?>">
                <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>

        <nav class="hcs-drawer-section" aria-label="<?php esc_attr_e('Mobile Menu', 'dawp'); ?>">
            <?php foreach ($main_links as $link) : ?>
                <a class="hcs-drawer-link" href="<?php echo esc_url($link['url']); ?>">
                    <?php echo esc_html($link['title']); ?>
                    <span aria-hidden="true">&rarr;</span>
                </a>
            <?php endforeach; ?>
        </nav>
    </aside>
</div>

<script>
(function () {
    var header = document.getElementById('site-header');
    var menuToggle = document.getElementById('hcs-menu-toggle');
    var drawer = document.getElementById('hcs-mobile-drawer');
    var overlay = document.getElementById('hcs-drawer-overlay');
    var closeBtn = document.getElementById('hcs-drawer-close');
    var searchToggle = document.getElementById('hcs-mobile-search-toggle');
    var searchBar = document.getElementById('hcs-mobile-search');

    function setDrawer(open) {
        if (!drawer || !overlay || !menuToggle) return;
        drawer.classList.toggle('is-open', open);
        overlay.classList.toggle('is-open', open);
        menuToggle.setAttribute('aria-expanded', String(open));
        document.body.style.overflow = open ? 'hidden' : '';
    }

    if (menuToggle) {
        menuToggle.addEventListener('click', function () {
            setDrawer(!drawer.classList.contains('is-open'));
        });
    }
    if (closeBtn) closeBtn.addEventListener('click', function () { setDrawer(false); });
    if (overlay) overlay.addEventListener('click', function () { setDrawer(false); });

    if (searchToggle && searchBar) {
        searchToggle.addEventListener('click', function () {
            var open = searchBar.style.display !== 'block';
            searchBar.style.display = open ? 'block' : 'none';
            searchToggle.setAttribute('aria-expanded', String(open));
            if (open) {
                var input = searchBar.querySelector('input[type="search"]');
                if (input) input.focus();
            }
        });
    }

    if (header) {
        var onScroll = function () {
            header.classList.toggle('hcs-is-scrolled', window.scrollY > 8);
        };
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
    }

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            setDrawer(false);
            if (searchBar && searchToggle) {
                searchBar.style.display = 'none';
                searchToggle.setAttribute('aria-expanded', 'false');
            }
        }
    });
})();
</script>

<div id="content" class="site-content">
