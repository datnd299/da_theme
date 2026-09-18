<?php
/**
 * Theme header.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email  = 'support@eliteshopexpress.com';
$home_url       = home_url('/');
$shop_url       = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$account_url    = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');
$cart_url       = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$cart_count     = (function_exists('WC') && WC()->cart) ? WC()->cart->get_cart_contents_count() : 0;

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

if (!$account_url) {
    $account_url = home_url('/my-account/');
}

$nav_items = [
    ['title' => __('Men', 'dawp'), 'url' => $shop_url],
    ['title' => __('Women', 'dawp'), 'url' => $shop_url],
    ['title' => __('Kids', 'dawp'), 'url' => $shop_url],
    ['title' => __('Personalized Gifts', 'dawp'), 'url' => $shop_url],
    ['title' => __('How It Works', 'dawp'), 'url' => home_url('/#how-it-works')],
    ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/')],
];

$announcements = [
    __('Free Shipping in the US for orders over $50', 'dawp'),
    __('100% Satisfaction Guarantee', 'dawp'),
    __('Printed & Shipped from the USA', 'dawp'),
    __('Personalize it. Make it yours.', 'dawp'),
];
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:wght@600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: "Inter", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; }
        .font-heading { font-family: "Poppins", "Montserrat", system-ui, sans-serif; }
        html { scroll-behavior: smooth; }
        .site-logo {
            font-family: "Poppins", "Montserrat", system-ui, sans-serif;
        }
    </style>

    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-white antialiased text-[#111827]'); ?>>
<?php wp_body_open(); ?>

<a href="#content" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-[60] focus:rounded-md focus:bg-white focus:px-4 focus:py-3 focus:text-sm focus:font-bold focus:text-[#111827] focus:shadow-lg">
    <?php esc_html_e('Skip to content', 'dawp'); ?>
</a>

<header id="site-header" class="sticky top-0 z-50 bg-white/95 text-[#111827] backdrop-blur transition-shadow [&.is-scrolled]:shadow-[0_1px_3px_rgba(17,24,39,0.08)]" role="banner">
    <div class="announcement-marquee">
        <div class="announcement-marquee__track">
            <?php for ($i = 0; $i < 2; $i++) : ?>
                <?php foreach ($announcements as $message) : ?>
                    <span class="announcement-marquee__item">
                        <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M20 6 9 17l-5-5"></path>
                        </svg>
                        <?php echo esc_html($message); ?>
                    </span>
                <?php endforeach; ?>
            <?php endfor; ?>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex min-h-20 items-center justify-between gap-4">
            <a href="<?php echo esc_url($home_url); ?>" class="site-logo inline-flex shrink-0 items-center gap-0.5 py-2 text-2xl font-extrabold tracking-tight sm:text-[1.75rem]" aria-label="<?php esc_attr_e('Eliteshop Express home', 'dawp'); ?>">
                <span class="text-[#FF5A5F]"><?php esc_html_e('Eliteshop', 'dawp'); ?></span>
                <span class="text-[#111827]"><?php esc_html_e('Express', 'dawp'); ?></span>
            </a>

            <nav class="hidden items-center gap-1 xl:flex" aria-label="<?php esc_attr_e('Main store navigation', 'dawp'); ?>">
                <?php foreach ($nav_items as $item) : ?>
                    <a href="<?php echo esc_url($item['url']); ?>" class="rounded-[var(--radius-md)] px-3 py-2 text-sm font-bold text-[#374151] transition hover:bg-[#FFF1F0] hover:text-[#FF5A5F]">
                        <?php echo esc_html($item['title']); ?>
                    </a>
                <?php endforeach; ?>
            </nav>

            <div class="flex shrink-0 items-center gap-2">
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="hidden items-center rounded-[var(--radius-md)] border border-[#E5E7EB] bg-white px-3 py-2 lg:flex">
                    <label class="sr-only" for="header-product-search"><?php esc_html_e('Search products', 'dawp'); ?></label>
                    <input id="header-product-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search designs', 'dawp'); ?>" class="w-40 bg-transparent text-sm text-[#111827] outline-none placeholder:text-[#6B7280]">
                    <input type="hidden" name="post_type" value="product">
                    <button type="submit" class="ml-2 inline-flex h-8 w-8 items-center justify-center rounded-[var(--radius-sm)] text-[#FF5A5F] transition hover:bg-[#FFF1F0]" aria-label="<?php esc_attr_e('Submit product search', 'dawp'); ?>">
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="11" cy="11" r="7"></circle>
                            <path d="m16 16 4 4"></path>
                        </svg>
                    </button>
                </form>

                <a href="<?php echo esc_url($account_url); ?>" class="hidden h-11 w-11 items-center justify-center rounded-[var(--radius-md)] border border-[#E5E7EB] text-[#374151] transition hover:bg-[#FFF1F0] hover:text-[#FF5A5F] md:inline-flex" aria-label="<?php esc_attr_e('My account', 'dawp'); ?>">
                    <svg viewBox="0 0 24 24" width="21" height="21" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M20 21a8 8 0 0 0-16 0"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </a>

                <a href="<?php echo esc_url($cart_url); ?>" class="xoo-wsc-cart-trigger relative inline-flex h-11 w-11 items-center justify-center rounded-[var(--radius-md)] bg-[#FF5A5F] text-white transition hover:bg-[#E14247]" aria-label="<?php esc_attr_e('Shopping cart', 'dawp'); ?>">
                    <svg viewBox="0 0 24 24" width="21" height="21" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.7 13.4a2 2 0 0 0 2 1.6h8.8a2 2 0 0 0 2-1.6L22 6H6"></path>
                    </svg>
                    <?php echo function_exists('dawp_cart_count_badge_html') ? dawp_cart_count_badge_html($cart_count) : ''; ?>
                </a>

                <button type="button" class="menu-toggle inline-flex h-11 w-11 items-center justify-center rounded-[var(--radius-md)] border border-[#E5E7EB] text-[#374151] transition hover:bg-[#FFF1F0] hover:text-[#FF5A5F] xl:hidden" aria-expanded="false" aria-label="<?php esc_attr_e('Open store menu', 'dawp'); ?>" aria-controls="mobile-store-menu">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="4" y1="7" x2="20" y2="7"></line>
                        <line x1="4" y1="12" x2="20" y2="12"></line>
                        <line x1="4" y1="17" x2="20" y2="17"></line>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile-store-menu" class="main-navigation hidden border-t border-[#E5E7EB] bg-white xl:hidden">
        <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6">
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="mb-4 flex items-center rounded-[var(--radius-md)] border border-[#E5E7EB] bg-[#F9FAFB] px-4 py-3">
                <label class="sr-only" for="mobile-product-search"><?php esc_html_e('Search products', 'dawp'); ?></label>
                <input id="mobile-product-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search personalized designs', 'dawp'); ?>" class="w-full bg-transparent text-sm text-[#111827] outline-none placeholder:text-[#6B7280]">
                <input type="hidden" name="post_type" value="product">
                <button type="submit" class="ml-2 inline-flex h-9 w-9 items-center justify-center rounded-[var(--radius-sm)] bg-white text-[#FF5A5F]" aria-label="<?php esc_attr_e('Submit product search', 'dawp'); ?>">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="11" cy="11" r="7"></circle>
                        <path d="m16 16 4 4"></path>
                    </svg>
                </button>
            </form>

            <nav class="grid gap-1" aria-label="<?php esc_attr_e('Mobile store navigation', 'dawp'); ?>">
                <?php foreach ($nav_items as $item) : ?>
                    <a href="<?php echo esc_url($item['url']); ?>" class="rounded-[var(--radius-md)] px-4 py-3 text-base font-bold text-[#374151] transition hover:bg-[#FFF1F0] hover:text-[#FF5A5F]">
                        <?php echo esc_html($item['title']); ?>
                    </a>
                <?php endforeach; ?>
            </nav>

            <div class="mt-4 grid gap-3 sm:grid-cols-3">
                <a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-[var(--radius-pill)] border-2 border-[#111827] px-5 text-sm font-bold text-[#111827] transition hover:bg-[#111827] hover:text-white">
                    <?php esc_html_e('Track Order', 'dawp'); ?>
                </a>
                <a href="<?php echo esc_url($account_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-[var(--radius-pill)] border-2 border-[#111827] px-5 text-sm font-bold text-[#111827] transition hover:bg-[#111827] hover:text-white">
                    <?php esc_html_e('My Account', 'dawp'); ?>
                </a>
                <a href="<?php echo esc_url($cart_url); ?>" class="xoo-wsc-cart-trigger inline-flex min-h-12 items-center justify-center rounded-[var(--radius-pill)] bg-[#FF5A5F] px-5 text-sm font-bold text-white transition hover:bg-[#E14247]">
                    <?php esc_html_e('Cart', 'dawp'); ?>
                </a>
            </div>

            <p class="mt-4 text-sm leading-6 text-[#4B5563]">
                <?php
                echo wp_kses(
                    sprintf(
                        /* translators: %s: support email */
                        __('Need help? Email %s — we reply within 1 business day.', 'dawp'),
                        '<a class="font-bold text-[#FF5A5F]" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>'
                    ),
                    [
                        'a' => [
                            'class' => [],
                            'href'  => [],
                        ],
                    ]
                );
                ?>
            </p>
        </div>
    </div>
</header>

<div id="content" class="site-content">
