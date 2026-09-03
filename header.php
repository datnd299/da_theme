<?php
/**
 * Theme header — North Time Co.
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

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

if (!$account_url) {
    $account_url = home_url('/my-account/');
}

$nav_items = [
    ['title' => __('Home', 'dawp'),        'url' => $home_url],
    ['title' => __('Shop', 'dawp'),        'url' => $shop_url],
    ['title' => __('About', 'dawp'),       'url' => home_url('/about-us/')],
    ['title' => __('Contact', 'dawp'),     'url' => home_url('/contact-us/')],
    ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/')],
];
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: "Inter", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; }
        .font-heading { font-family: "Playfair Display", Georgia, serif; }
        html { scroll-behavior: smooth; }
    </style>

    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-background text-foreground antialiased'); ?>>
<?php wp_body_open(); ?>

<a href="#content" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-50 focus:rounded-sm focus:bg-white focus:px-4 focus:py-3 focus:text-sm focus:font-bold focus:text-foreground focus:shadow-lg">
    <?php esc_html_e('Skip to content', 'dawp'); ?>
</a>

<header id="site-header" class="sticky top-0 z-50 bg-surface" role="banner">
    <div class="bg-primary text-white">
        <p class="mx-auto max-w-7xl px-4 py-2.5 text-center text-[11px] font-semibold uppercase tracking-brand sm:px-6 lg:px-8">
            <?php esc_html_e('Free shipping on all orders', 'dawp'); ?>
        </p>
    </div>

    <div class="border-b border-line">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex min-h-20 items-center justify-between gap-4">
                <?php
                $logo_webp = get_theme_file_path('assets/img/logo.webp');
                $logo_png  = get_theme_file_path('assets/img/logo.png');
                $logo_ver  = file_exists($logo_webp) ? filemtime($logo_webp) : '1';
                ?>
                <a href="<?php echo esc_url($home_url); ?>" class="inline-flex shrink-0 items-center py-2" aria-label="<?php esc_attr_e('North Time Co. — home', 'dawp'); ?>">
                    <picture>
                        <source srcset="<?php echo esc_url(get_theme_file_uri('assets/img/logo.webp') . '?v=' . $logo_ver); ?>" type="image/webp">
                        <img src="<?php echo esc_url(get_theme_file_uri('assets/img/logo.png') . '?v=' . $logo_ver); ?>" alt="<?php esc_attr_e('North Time Co.', 'dawp'); ?>" width="245" height="160" class="h-14 w-auto sm:h-16" decoding="async" fetchpriority="high">
                    </picture>
                </a>

                <nav class="hidden items-center gap-1 lg:flex" aria-label="<?php esc_attr_e('Main store navigation', 'dawp'); ?>">
                    <?php foreach ($nav_items as $item) : ?>
                        <a href="<?php echo esc_url($item['url']); ?>" class="rounded-sm px-3 py-2 text-xs font-semibold uppercase tracking-label text-foreground transition hover:text-accent">
                            <?php echo esc_html($item['title']); ?>
                        </a>
                    <?php endforeach; ?>
                </nav>

                <div class="flex shrink-0 items-center gap-1">
                    <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="hidden items-center rounded-sm border border-line px-3 py-2 lg:flex">
                        <label class="sr-only" for="header-product-search"><?php esc_html_e('Search watches', 'dawp'); ?></label>
                        <input id="header-product-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search', 'dawp'); ?>" class="w-32 bg-transparent text-sm text-foreground outline-none placeholder:text-muted">
                        <input type="hidden" name="post_type" value="product">
                        <button type="submit" class="ml-2 inline-flex h-8 w-8 items-center justify-center rounded-sm text-foreground transition hover:text-accent" aria-label="<?php esc_attr_e('Submit search', 'dawp'); ?>">
                            <svg viewBox="0 0 24 24" width="17" height="17" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <circle cx="11" cy="11" r="7"></circle>
                                <path d="m16 16 4 4"></path>
                            </svg>
                        </button>
                    </form>

                    <a href="<?php echo esc_url($account_url); ?>" class="hidden h-11 w-11 items-center justify-center rounded-sm text-foreground transition hover:bg-surface-alt hover:text-accent md:inline-flex" aria-label="<?php esc_attr_e('My account', 'dawp'); ?>">
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M20 21a8 8 0 0 0-16 0"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </a>

                    <a href="<?php echo esc_url($cart_url); ?>" class="xoo-wsc-cart-trigger relative inline-flex h-11 w-11 items-center justify-center rounded-sm text-foreground transition hover:bg-surface-alt hover:text-accent" aria-label="<?php esc_attr_e('Shopping cart', 'dawp'); ?>">
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.7 13.4a2 2 0 0 0 2 1.6h8.8a2 2 0 0 0 2-1.6L22 6H6"></path>
                        </svg>
                        <?php echo function_exists('dawp_cart_count_badge_html') ? dawp_cart_count_badge_html($cart_count) : ''; ?>
                    </a>

                    <button type="button" class="inline-flex h-11 w-11 items-center justify-center rounded-sm text-foreground transition hover:bg-surface-alt lg:hidden" aria-expanded="false" aria-label="<?php esc_attr_e('Open store menu', 'dawp'); ?>" aria-controls="mobile-store-menu" onclick="const menu=document.getElementById('mobile-store-menu'); const expanded=this.getAttribute('aria-expanded')==='true'; this.setAttribute('aria-expanded', String(!expanded)); menu.classList.toggle('hidden');">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <line x1="4" y1="7" x2="20" y2="7"></line>
                            <line x1="4" y1="12" x2="20" y2="12"></line>
                            <line x1="4" y1="17" x2="20" y2="17"></line>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="mobile-store-menu" class="hidden border-b border-line bg-surface lg:hidden">
        <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6">
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="mb-4 flex items-center rounded-sm border border-line px-4 py-3">
                <label class="sr-only" for="mobile-product-search"><?php esc_html_e('Search watches', 'dawp'); ?></label>
                <input id="mobile-product-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search watches', 'dawp'); ?>" class="w-full bg-transparent text-sm text-foreground outline-none placeholder:text-muted">
                <input type="hidden" name="post_type" value="product">
                <button type="submit" class="ml-2 inline-flex h-9 w-9 items-center justify-center rounded-sm bg-primary text-white" aria-label="<?php esc_attr_e('Submit search', 'dawp'); ?>">
                    <svg viewBox="0 0 24 24" width="17" height="17" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="11" cy="11" r="7"></circle>
                        <path d="m16 16 4 4"></path>
                    </svg>
                </button>
            </form>

            <nav class="grid gap-1" aria-label="<?php esc_attr_e('Mobile store navigation', 'dawp'); ?>">
                <?php foreach ($nav_items as $item) : ?>
                    <a href="<?php echo esc_url($item['url']); ?>" class="rounded-sm px-4 py-3 text-sm font-semibold uppercase tracking-label text-foreground transition hover:bg-surface-alt hover:text-accent">
                        <?php echo esc_html($item['title']); ?>
                    </a>
                <?php endforeach; ?>
            </nav>

            <div class="mt-4 grid grid-cols-2 gap-3">
                <a href="<?php echo esc_url($account_url); ?>" class="inline-flex min-h-12 flex-col items-center justify-center gap-1 rounded-sm border border-line text-[11px] font-semibold uppercase tracking-label text-foreground transition hover:bg-surface-alt">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 21a8 8 0 0 0-16 0"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    <?php esc_html_e('Account', 'dawp'); ?>
                </a>
                <a href="<?php echo esc_url($cart_url); ?>" class="xoo-wsc-cart-trigger inline-flex min-h-12 flex-col items-center justify-center gap-1 rounded-sm bg-primary text-[11px] font-semibold uppercase tracking-label text-white transition hover:bg-primary-soft">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.7 13.4a2 2 0 0 0 2 1.6h8.8a2 2 0 0 0 2-1.6L22 6H6"></path></svg>
                    <?php esc_html_e('Cart', 'dawp'); ?>
                </a>
            </div>
        </div>
    </div>
</header>

<div id="content" class="site-content">
