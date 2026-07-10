<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
    <style>
        #mobile-drawer {
            transform: translateX(-100%);
            transition: transform 0.28s cubic-bezier(0.4, 0, 0.2, 1);
        }
        #mobile-drawer.is-open { transform: translateX(0); }
        #drawer-overlay {
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.28s ease;
        }
        #drawer-overlay.is-open { opacity: 1; pointer-events: auto; }
        #site-header.scrolled { box-shadow: 0 14px 30px rgba(11, 31, 58, 0.18); }
        #megamenu-shop { display: none; }

        @media (min-width: 1024px) {
            #megamenu-shop {
                display: block;
                position: absolute;
                top: calc(100% + 10px);
                left: 0;
                width: min(920px, calc(100vw - 48px));
                z-index: 100;
                border-radius: 8px;
                overflow: hidden;
                opacity: 0;
                visibility: hidden;
                transform: translateY(-8px);
                pointer-events: none;
                transition: opacity 0.22s ease, transform 0.22s ease, visibility 0s 0.22s;
            }
            #megamenu-shop.is-open {
                opacity: 1;
                visibility: visible;
                transform: translateY(0);
                pointer-events: auto;
                transition: opacity 0.22s ease, transform 0.22s ease;
            }
        }

        .mega-panel {
            border: 1px solid #D9DEE8;
            background: #FFFFFF;
            box-shadow: 0 24px 70px rgba(5, 18, 38, 0.22);
        }
        .mega-panel__inner {
            display: grid;
            grid-template-columns: 260px minmax(0, 1fr);
            min-height: 360px;
        }
        .mega-feature {
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background: linear-gradient(145deg, #07172B 0%, #0B1F3A 54%, #142F55 100%);
            color: #FFFFFF;
            padding: 24px;
            overflow: hidden;
        }
        .mega-feature::before {
            content: "";
            position: absolute;
            right: -58px;
            top: -54px;
            width: 150px;
            height: 150px;
            border-radius: 999px;
            border: 1px solid rgba(198, 161, 91, 0.22);
        }
        .mega-feature::after {
            content: "";
            position: absolute;
            inset: auto 24px 78px 24px;
            height: 1px;
            background: linear-gradient(90deg, rgba(198, 161, 91, 0.48), rgba(198, 161, 91, 0));
        }
        .mega-feature > * {
            position: relative;
            z-index: 1;
        }
        .mega-section-title {
            letter-spacing: 0.12em;
        }
        .mega-feature__badge {
            display: inline-flex;
            width: max-content;
            align-items: center;
            border: 1px solid rgba(198, 161, 91, 0.45);
            background: rgba(198, 161, 91, 0.14);
            color: #F7D58F;
            border-radius: 999px;
            padding: 7px 10px;
            font-size: 11px;
            font-weight: 900;
            text-transform: uppercase;
        }
        .mega-feature__title {
            margin-top: 22px;
            color: #FFFFFF;
            font-size: 1.55rem;
            font-weight: 900;
            line-height: 1.18;
        }
        .mega-feature__copy {
            margin-top: 16px;
            color: rgba(255, 255, 255, 0.74);
            font-size: 0.9rem;
            line-height: 1.72;
        }
        .mega-feature__meta {
            display: grid;
            gap: 10px;
            margin-top: 30px;
            color: rgba(255, 255, 255, 0.82);
            font-size: 0.76rem;
            font-weight: 800;
        }
        .mega-feature__meta span {
            display: flex;
            align-items: center;
            gap: 9px;
        }
        .mega-feature__meta span::before {
            content: "";
            width: 7px;
            height: 7px;
            flex: 0 0 7px;
            border-radius: 999px;
            background: #C6A15B;
            box-shadow: 0 0 0 4px rgba(198, 161, 91, 0.12);
        }
        .mega-feature__cta {
            display: inline-flex;
            min-height: 44px;
            align-items: center;
            justify-content: center;
            gap: 9px;
            border-radius: 8px;
            background: #B31942;
            padding: 0 16px;
            color: #FFFFFF;
            font-size: 12px;
            font-weight: 900;
            text-transform: uppercase;
            box-shadow: 0 14px 26px rgba(179, 25, 66, 0.24);
            transition: background 0.16s ease, box-shadow 0.16s ease, transform 0.16s ease;
        }
        .mega-feature__cta:hover {
            background: #C6A15B;
            box-shadow: 0 16px 30px rgba(198, 161, 91, 0.2);
            transform: translateY(-1px);
        }
        .mega-content {
            display: flex;
            flex-direction: column;
            min-width: 0;
            background:
                linear-gradient(90deg, rgba(11, 31, 58, 0.045) 1px, transparent 1px) 50% 24px / 1px calc(100% - 48px) no-repeat,
                linear-gradient(180deg, #FFFFFF 0%, #FBFCFE 100%);
        }
        .mega-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 24px;
            padding: 24px;
        }
        .mega-section {
            min-width: 0;
            border: 1px solid #EEF1F6;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.78);
            padding: 14px;
            box-shadow: 0 10px 28px rgba(11, 31, 58, 0.045);
        }
        .mega-section-title {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 10px;
            border-bottom: 1px solid #EEF1F6;
            padding-bottom: 12px;
            color: #B31942;
            font-size: 11px;
            font-weight: 900;
            text-transform: uppercase;
        }
        .mega-section-title::before {
            content: "";
            width: 8px;
            height: 8px;
            border-radius: 999px;
            background: #C6A15B;
        }
        .mega-link {
            position: relative;
            display: flex;
            align-items: center;
            gap: 11px;
            border-radius: 8px;
            color: #111827;
            padding: 8px 9px;
            box-shadow: inset 0 0 0 1px transparent;
            transition: background 0.15s ease, box-shadow 0.15s ease, color 0.15s ease, transform 0.15s ease;
        }
        .mega-section li + li .mega-link {
            margin-top: 4px;
        }
        .mega-link:hover {
            background: #FFFFFF;
            box-shadow: inset 0 0 0 1px #E8ECF3, 0 8px 18px rgba(11, 31, 58, 0.07);
            color: #B31942;
            transform: translateX(2px);
        }
        .mega-link-icon {
            display: flex;
            width: 30px;
            height: 30px;
            flex: 0 0 30px;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            background: #F7F2E8;
            color: #B31942;
            box-shadow: inset 0 0 0 1px rgba(198, 161, 91, 0.18);
        }
        .mega-link-text {
            display: block;
            color: inherit;
            font-size: 0.86rem;
            font-weight: 900;
            line-height: 1.25;
        }
        .mega-footer {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 12px;
            margin-top: auto;
            border-top: 1px solid #E5E7EB;
            background: #FAFBFD;
            padding: 14px 24px;
        }
        .mega-footer__item {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            min-width: 0;
            color: #0B1F3A;
            font-size: 0.78rem;
            font-weight: 800;
            line-height: 1.2;
            text-align: center;
        }
        .mega-footer__icon {
            display: flex;
            width: 28px;
            height: 28px;
            flex: 0 0 28px;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            background: #FFFFFF;
            color: #B31942;
            box-shadow: inset 0 0 0 1px #E5E7EB;
        }
        .drawer-sub-nav {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.28s ease;
        }
        .drawer-sub-nav.is-open { max-height: 900px; }
        .sub-chevron { transition: transform 0.22s ease; }
    </style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
$cart_count    = (function_exists('WC') && WC()->cart) ? WC()->cart->get_cart_contents_count() : 0;
$cart_url      = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$account_id    = function_exists('wc_get_page_id') ? wc_get_page_id('myaccount') : 0;
$account_url   = $account_id > 0 ? get_permalink($account_id) : home_url('/my-account/');
$nav_items     = dawp_main_menu_items();
$mega_sections = dawp_megamenu_sections();
$logo_url      = get_template_directory_uri() . '/assets/img/logo-graphictshirtstore.svg';
?>

<header id="site-header" class="lg:sticky top-0 left-0 right-0 z-50 border-b border-white/10 bg-[#0B1F3A]" role="banner">
    <div class="mx-auto flex h-16 max-w-[1280px] items-center justify-between gap-3 px-4 lg:h-[72px] lg:px-6">
        <button id="menu-toggle"
                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg text-white/80 transition-colors hover:bg-white/10 hover:text-white lg:hidden"
                aria-expanded="false"
                aria-controls="mobile-drawer"
                aria-label="<?php esc_attr_e('Open menu', 'dawp'); ?>">
            <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true">
                <line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/>
            </svg>
        </button>

        <a href="<?php echo esc_url(home_url('/')); ?>" class="flex shrink-0 items-center" aria-label="<?php esc_attr_e('GraphicTShirtStore', 'dawp'); ?>">
            <img src="<?php echo esc_url($logo_url); ?>" alt="<?php esc_attr_e('GraphicTShirtStore', 'dawp'); ?>" class="h-11 w-auto lg:h-12">
        </a>

        <nav class="hidden flex-1 items-center gap-1 px-5 lg:flex" aria-label="<?php esc_attr_e('Main Navigation', 'dawp'); ?>">
            <?php foreach ($nav_items as $item) :
                $is_current = dawp_is_current_url($item['url']);
                $has_mega   = !empty($item['megamenu']);
            ?>
                <?php if ($has_mega) : ?>
                    <div id="megamenu-trigger" class="relative">
                        <a href="<?php echo esc_url($item['url']); ?>"
                           id="megamenu-btn"
                           class="flex items-center gap-1 rounded-lg px-3 py-2 text-sm font-extrabold text-white transition-colors hover:bg-white/10 <?php echo $is_current ? 'bg-white/15' : ''; ?>"
                           <?php if ($is_current) echo 'aria-current="page"'; ?>>
                            <?php echo esc_html($item['title']); ?>
                            <svg id="megamenu-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="transition:transform 0.22s ease;">
                                <polyline points="6 9 12 15 18 9"/>
                            </svg>
                        </a>

                        <div id="megamenu-shop" role="region" aria-label="<?php esc_attr_e('Shop Categories', 'dawp'); ?>">
                            <div class="mega-panel">
                                <div class="mega-panel__inner">
                                    <div class="mega-feature">
                                        <div>
                                            <span class="mega-feature__badge"><?php esc_html_e('Personalized Pride', 'dawp'); ?></span>
                                            <p class="mega-feature__title"><?php esc_html_e('Gifts that honor every branch and milestone.', 'dawp'); ?></p>
                                            <p class="mega-feature__copy"><?php esc_html_e('Explore military apparel, commemorative collections, and custom keepsakes made for veterans and proud families.', 'dawp'); ?></p>
                                            <div class="mega-feature__meta" aria-label="<?php esc_attr_e('Store highlights', 'dawp'); ?>">
                                                <span><?php esc_html_e('Personalized details', 'dawp'); ?></span>
                                                <span><?php esc_html_e('Veteran-ready gifts', 'dawp'); ?></span>
                                                <span><?php esc_html_e('Made to order', 'dawp'); ?></span>
                                            </div>
                                        </div>
                                        <a href="<?php echo esc_url(home_url('/product-category/veteran-tribute/')); ?>" class="mega-feature__cta">
                                            <?php esc_html_e('Customize Yours', 'dawp'); ?>
                                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <path d="M5 12h14"/><path d="M13 5l7 7-7 7"/>
                                            </svg>
                                        </a>
                                    </div>

                                    <div class="mega-content">
                                        <div class="mega-grid">
                                            <?php foreach ($mega_sections as $section) : ?>
                                                <div class="mega-section">
                                                    <h3 class="mega-section-title">
                                                        <?php echo esc_html($section['title']); ?>
                                                    </h3>
                                                    <ul>
                                                        <?php foreach ($section['links'] as $link) : ?>
                                                            <li>
                                                                <a href="<?php echo esc_url($link['url']); ?>" class="mega-link">
                                                                    <span class="mega-link-icon" aria-hidden="true">
                                                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                                                                            <path d="M5 12h14"/><path d="M13 5l7 7-7 7"/>
                                                                        </svg>
                                                                    </span>
                                                                    <span>
                                                                        <span class="mega-link-text"><?php echo esc_html($link['title']); ?></span>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>

                                        <div class="mega-footer" aria-label="<?php esc_attr_e('Shopping highlights', 'dawp'); ?>">
                                            <div class="mega-footer__item">
                                                <span class="mega-footer__icon" aria-hidden="true">
                                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M20 7l-8 10-5-5"/><path d="M4 12l4 4L20 4"/>
                                                    </svg>
                                                </span>
                                                <?php esc_html_e('Veteran designs', 'dawp'); ?>
                                            </div>
                                            <div class="mega-footer__item">
                                                <span class="mega-footer__icon" aria-hidden="true">
                                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M12 2v20"/><path d="M17 5H9.5a3.5 3.5 0 000 7H14a3.5 3.5 0 010 7H6"/>
                                                    </svg>
                                                </span>
                                                <?php esc_html_e('Clear pricing', 'dawp'); ?>
                                            </div>
                                            <div class="mega-footer__item">
                                                <span class="mega-footer__icon" aria-hidden="true">
                                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/><path d="M3.27 6.96L12 12.01l8.73-5.05"/><path d="M12 22.08V12"/>
                                                    </svg>
                                                </span>
                                                <?php esc_html_e('Made to order', 'dawp'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <a href="<?php echo esc_url($item['url']); ?>"
                       class="rounded-lg px-3 py-2 text-sm font-extrabold text-white transition-colors hover:bg-white/10 <?php echo $is_current ? 'bg-white/15' : ''; ?>"
                       <?php if ($is_current) echo 'aria-current="page"'; ?>>
                        <?php echo esc_html($item['title']); ?>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </nav>

        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="hidden max-w-xs flex-1 items-center lg:flex">
            <div class="relative w-full">
                <input type="search"
                       name="s"
                       value="<?php echo esc_attr(get_search_query()); ?>"
                       placeholder="<?php esc_attr_e('Search patriotic gifts...', 'dawp'); ?>"
                       class="h-10 w-full rounded-lg border border-white/25 bg-white/10 pl-4 pr-10 text-sm text-white placeholder:text-white/60 outline-none transition-colors focus:border-[#C6A15B] focus:bg-white/15">
                <button type="submit" class="absolute right-0 top-0 flex h-10 w-10 items-center justify-center text-white/70 transition hover:text-white" aria-label="<?php esc_attr_e('Search', 'dawp'); ?>">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/>
                    </svg>
                </button>
            </div>
        </form>

        <div class="flex shrink-0 items-center gap-1">
            <button id="mobile-search-toggle"
                    class="flex h-10 w-10 items-center justify-center rounded-lg text-white/80 transition-colors hover:bg-white/10 hover:text-white lg:hidden"
                    aria-label="<?php esc_attr_e('Search', 'dawp'); ?>">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/>
                </svg>
            </button>

            <a href="<?php echo esc_url($account_url); ?>"
               class="hidden h-10 w-10 items-center justify-center rounded-lg text-white/80 transition-colors hover:bg-white/10 hover:text-white lg:flex"
               aria-label="<?php esc_attr_e('My Account', 'dawp'); ?>">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/>
                </svg>
            </a>

            <a href="<?php echo esc_url($cart_url); ?>"
               class="relative flex h-10 w-10 items-center justify-center rounded-lg text-white transition-colors hover:bg-white/10"
               aria-label="<?php printf(esc_attr__('Cart (%d items)', 'dawp'), $cart_count); ?>">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 01-8 0"/>
                </svg>
                <?php if ($cart_count > 0) : ?>
                    <span class="absolute -right-0.5 -top-0.5 flex h-[18px] min-w-[18px] items-center justify-center rounded-full bg-[#B31942] px-1 text-[10px] font-black leading-none text-white" aria-hidden="true">
                        <?php echo esc_html($cart_count); ?>
                    </span>
                <?php endif; ?>
            </a>
        </div>
    </div>

    <div id="mobile-search-bar" class="hidden border-t border-white/10 bg-[#081A33] px-4 py-3 lg:hidden">
        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="relative">
            <input type="search"
                   name="s"
                   value="<?php echo esc_attr(get_search_query()); ?>"
                   placeholder="<?php esc_attr_e('Search patriotic gifts...', 'dawp'); ?>"
                   class="h-11 w-full rounded-lg border border-white/20 bg-white/10 pl-4 pr-10 text-sm text-white placeholder:text-white/65 outline-none focus:border-[#C6A15B]">
            <button type="submit" class="absolute right-0 top-0 flex h-11 w-11 items-center justify-center text-white/70" aria-label="<?php esc_attr_e('Search', 'dawp'); ?>">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/>
                </svg>
            </button>
        </form>
    </div>
</header>

<div id="drawer-overlay" class="fixed inset-0 z-40 bg-black/55" aria-hidden="true"></div>

<aside id="mobile-drawer"
       class="fixed left-0 top-0 z-50 h-full w-[calc(100%-4rem)] max-w-sm overflow-y-auto bg-[#0B1F3A] shadow-2xl"
       aria-label="<?php esc_attr_e('Mobile Navigation', 'dawp'); ?>">
    <div class="flex h-16 items-center justify-between border-b border-white/10 px-4">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center" aria-label="<?php esc_attr_e('GraphicTShirtStore', 'dawp'); ?>">
            <img src="<?php echo esc_url($logo_url); ?>" alt="<?php esc_attr_e('GraphicTShirtStore', 'dawp'); ?>" class="h-11 w-auto">
        </a>

        <button id="drawer-close"
                class="flex h-10 w-10 items-center justify-center rounded-lg text-white/80 transition-colors hover:bg-white/10 hover:text-white"
                aria-label="<?php esc_attr_e('Close menu', 'dawp'); ?>">
            <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true">
                <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>
    </div>

    <nav class="py-2" aria-label="<?php esc_attr_e('Mobile Menu', 'dawp'); ?>">
        <?php foreach ($nav_items as $item) :
            $is_current = dawp_is_current_url($item['url']);
            $has_mega   = !empty($item['megamenu']);
        ?>
            <?php if ($has_mega) : ?>
                <div class="border-b border-white/10">
                    <div class="flex items-center">
                        <a href="<?php echo esc_url($item['url']); ?>" class="flex flex-1 items-center px-5 py-3.5 text-sm font-bold text-white/90 transition-colors hover:text-white">
                            <?php echo esc_html($item['title']); ?>
                        </a>
                        <button class="drawer-sub-toggle flex h-12 w-12 shrink-0 items-center justify-center text-white/65 transition-colors hover:text-white"
                                aria-expanded="false"
                                aria-label="<?php esc_attr_e('Expand shop categories', 'dawp'); ?>">
                            <svg class="sub-chevron" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <polyline points="6 9 12 15 18 9"/>
                            </svg>
                        </button>
                    </div>

                    <div class="drawer-sub-nav bg-[#081A33]">
                        <?php foreach ($mega_sections as $section) : ?>
                            <div class="border-t border-white/5 px-5 py-3">
                                <p class="mb-2 text-[10px] font-black uppercase tracking-[0.16em] text-[#C6A15B]">
                                    <?php echo esc_html($section['title']); ?>
                                </p>
                                <?php foreach ($section['links'] as $link) : ?>
                                    <a href="<?php echo esc_url($link['url']); ?>" class="flex items-center gap-2 py-1.5 text-sm font-semibold text-white/75 transition-colors hover:text-white">
                                        <span class="h-1 w-1 shrink-0 rounded-full bg-[#C6A15B]"></span>
                                        <?php echo esc_html($link['title']); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php else : ?>
                <a href="<?php echo esc_url($item['url']); ?>"
                   class="flex items-center border-b border-white/10 px-5 py-3.5 text-sm font-bold transition-colors <?php echo $is_current ? 'bg-white/10 text-white' : 'text-white/80 hover:bg-white/5 hover:text-white'; ?>"
                   <?php if ($is_current) echo 'aria-current="page"'; ?>>
                    <?php echo esc_html($item['title']); ?>
                </a>
            <?php endif; ?>
        <?php endforeach; ?>

        <a href="<?php echo esc_url($account_url); ?>" class="mt-2 flex items-center gap-2.5 border-t border-white/20 px-5 py-3.5 text-sm font-bold text-white/80 transition-colors hover:bg-white/5 hover:text-white">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/>
            </svg>
            <?php esc_html_e('My Account', 'dawp'); ?>
        </a>
    </nav>

    <div class="border-t border-white/10 px-5 py-5">
        <a href="<?php echo esc_url(home_url('/product-category/veteran-tribute/')); ?>" class="flex min-h-[46px] items-center justify-center rounded-xl bg-[#B31942] px-4 text-sm font-black uppercase tracking-[0.08em] text-white">
            <?php esc_html_e('Customize A Gift', 'dawp'); ?>
        </a>
    </div>
</aside>

<script>
(function () {
    var header      = document.getElementById('site-header');
    var toggle      = document.getElementById('menu-toggle');
    var drawer      = document.getElementById('mobile-drawer');
    var overlay     = document.getElementById('drawer-overlay');
    var closeBtn    = document.getElementById('drawer-close');
    var srchToggle  = document.getElementById('mobile-search-toggle');
    var srchBar     = document.getElementById('mobile-search-bar');
    var megaTrigger = document.getElementById('megamenu-trigger');
    var megaPanel   = document.getElementById('megamenu-shop');
    var megaChevron = document.getElementById('megamenu-chevron');

    function openDrawer() {
        if (!drawer || !overlay || !toggle) return;
        drawer.classList.add('is-open');
        overlay.classList.add('is-open');
        toggle.setAttribute('aria-expanded', 'true');
        document.body.style.overflow = 'hidden';
    }

    function closeDrawer() {
        if (!drawer || !overlay || !toggle) return;
        drawer.classList.remove('is-open');
        overlay.classList.remove('is-open');
        toggle.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
    }

    if (toggle) {
        toggle.addEventListener('click', function () {
            drawer && drawer.classList.contains('is-open') ? closeDrawer() : openDrawer();
        });
    }
    if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
    if (overlay) overlay.addEventListener('click', closeDrawer);

    if (srchToggle && srchBar) {
        srchToggle.addEventListener('click', function () {
            var hidden = srchBar.classList.toggle('hidden');
            if (!hidden) srchBar.querySelector('input').focus();
        });
    }

    if (header) {
        window.addEventListener('scroll', function () {
            header.classList.toggle('scrolled', window.scrollY > 4);
        }, { passive: true });
    }

    var megaTimer;
    function openMega() {
        clearTimeout(megaTimer);
        if (!megaPanel) return;
        megaPanel.classList.add('is-open');
        if (megaChevron) megaChevron.style.transform = 'rotate(180deg)';
    }
    function scheduleMegaClose() {
        megaTimer = setTimeout(function () {
            if (!megaPanel) return;
            megaPanel.classList.remove('is-open');
            if (megaChevron) megaChevron.style.transform = '';
        }, 120);
    }

    if (megaTrigger && megaPanel) {
        megaTrigger.addEventListener('mouseenter', openMega);
        megaTrigger.addEventListener('mouseleave', scheduleMegaClose);
        megaPanel.addEventListener('mouseenter', function () { clearTimeout(megaTimer); });
        megaPanel.addEventListener('mouseleave', scheduleMegaClose);
    }

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeDrawer();
            clearTimeout(megaTimer);
            if (megaPanel) megaPanel.classList.remove('is-open');
            if (megaChevron) megaChevron.style.transform = '';
        }
    });

    document.querySelectorAll('.drawer-sub-toggle').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var row = btn.parentElement;
            var subNav = row ? row.nextElementSibling : null;
            var chevron = btn.querySelector('.sub-chevron');
            if (!subNav) return;
            var isOpen = subNav.classList.toggle('is-open');
            btn.setAttribute('aria-expanded', String(isOpen));
            if (chevron) chevron.style.transform = isOpen ? 'rotate(180deg)' : '';
        });
    });
})();
</script>

<div id="content" class="site-content">
