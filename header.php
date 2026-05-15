<?php
/**
 * Theme header.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email = 'support@mybaapstore.com';
$home_url      = home_url('/');
$header_logo_url = get_theme_file_uri('/assets/img/gallery/logo.jpg');
$shop_url      = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$account_url   = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');
$cart_url      = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$cart_count    = (function_exists('WC') && WC()->cart) ? WC()->cart->get_cart_contents_count() : 0;

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

if (!$account_url) {
    $account_url = home_url('/my-account/');
}

$nav_items = [
    ['title' => __('Home', 'dawp'), 'url' => $home_url],
    ['title' => __('Shop', 'dawp'), 'url' => $shop_url],
    ['title' => __('Contact', 'dawp'), 'url' => home_url('/contact-us/')],
    ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/')],
    ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/')],
];

$shop_categories = [
    [
        'title' => __('Smart Gadgets', 'dawp'),
        'desc'  => __('Portable tools for everyday convenience', 'dawp'),
        'url'   => home_url('/product-category/smart-gadgets/'),
        'bg'    => '#EAF4FF',
        'color' => '#2F80ED',
        'icon'  => '<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="4" y="4" width="16" height="16" rx="2"/><rect x="9" y="9" width="6" height="6"/><path d="M9 2v2M15 2v2M9 20v2M15 20v2M2 9h2M2 15h2M20 9h2M20 15h2"/></svg>',
    ],
    [
        'title' => __('Home & Kitchen', 'dawp'),
        'desc'  => __('Helpful tools for kitchen and home tasks', 'dawp'),
        'url'   => home_url('/product-category/home-kitchen-gadgets/'),
        'bg'    => '#F0FDF4',
        'color' => '#16A34A',
        'icon'  => '<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>',
    ],
    [
        'title' => __('Personal Care', 'dawp'),
        'desc'  => __('Simple grooming devices for daily routines', 'dawp'),
        'url'   => home_url('/product-category/personal-care-devices/'),
        'bg'    => '#FFF7ED',
        'color' => '#EA580C',
        'icon'  => '<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 7h-9"/><path d="M14 17H5"/><circle cx="17" cy="17" r="3"/><circle cx="7" cy="7" r="3"/></svg>',
    ],
    [
        'title' => __('Camera & Tech', 'dawp'),
        'desc'  => __('Practical accessories for your devices', 'dawp'),
        'url'   => home_url('/product-category/camera-tech-accessories/'),
        'bg'    => '#F5F3FF',
        'color' => '#7C3AED',
        'icon'  => '<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>',
    ],
    [
        'title' => __('Daily Tools', 'dawp'),
        'desc'  => __('Compact tools for travel and everyday carry', 'dawp'),
        'url'   => home_url('/product-category/daily-tools/'),
        'bg'    => '#F0F9FF',
        'color' => '#0284C7',
        'icon'  => '<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>',
    ],
];
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: "Inter", "Manrope", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; }
        .font-heading { font-family: "Manrope", "Inter", system-ui, sans-serif; }
        html { scroll-behavior: smooth; }
    </style>

    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-white antialiased text-[#1F2937]'); ?>>
<?php wp_body_open(); ?>

<a href="#content" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-[60] focus:rounded-xl focus:bg-white focus:px-4 focus:py-3 focus:text-sm focus:font-bold focus:text-[#102A43]">
    <?php esc_html_e('Skip to content', 'dawp'); ?>
</a>

<header id="site-header" class="sticky top-0 z-50 border-b border-[#E5E7EB] bg-white/95 backdrop-blur" role="banner">
    <div class="hidden border-b border-[#E5E7EB] bg-[#F5F7FA] lg:block">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-8 py-2 text-xs font-semibold text-[#667085]">
            <p><?php esc_html_e('Useful gadgets for everyday life.', 'dawp'); ?></p>
            <div class="flex items-center gap-5">
                <a class="transition hover:text-[#2F80ED]" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
                <span><?php esc_html_e('Mon - Fri, 9:00 AM - 6:00 PM EST', 'dawp'); ?></span>
                <a class="font-bold text-[#102A43] transition hover:text-[#2F80ED]" href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a>
            </div>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex min-h-20 items-center justify-between gap-4">
            <a href="<?php echo esc_url($home_url); ?>" class="group inline-flex shrink-0 items-center py-2" aria-label="<?php esc_attr_e('MyBaapStore home', 'dawp'); ?>">
                <img class="h-14 w-auto max-w-[120px] object-contain sm:h-16 sm:max-w-[176px]" src="<?php echo esc_url($header_logo_url); ?>" alt="<?php esc_attr_e('MyBaapStore logo', 'dawp'); ?>" width="375" height="188">
            </a>

            <nav class="hidden items-center gap-1 lg:flex" aria-label="<?php esc_attr_e('Main store navigation', 'dawp'); ?>">
                <?php foreach ($nav_items as $item) : ?>
                    <?php if ($item['title'] === __('Shop', 'dawp')) : ?>
                        <div class="relative" id="mega-shop-wrap">
                            <button
                                type="button"
                                id="mega-shop-btn"
                                class="flex items-center gap-1 rounded-full px-4 py-2 text-sm font-bold text-[#334155] transition hover:bg-[#EAF4FF] hover:text-[#2F80ED]"
                                aria-expanded="false"
                                aria-controls="mega-shop-menu"
                                data-shop-url="<?php echo esc_url($shop_url); ?>"
                            >
                                <?php echo esc_html($item['title']); ?>
                                <svg id="mega-shop-chevron" viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="transition:transform .2s ease">
                                    <polyline points="6 9 12 15 18 9"/>
                                </svg>
                            </button>

                            <div
                                id="mega-shop-menu"
                                class="pointer-events-none absolute left-1/2 top-full z-50 -translate-x-1/2 translate-y-2 opacity-0 pt-2.5"
                                style="width:700px; transition:opacity .2s ease, transform .2s ease;"
                                role="region"
                                aria-label="<?php esc_attr_e('Shop categories', 'dawp'); ?>"
                            >
                                <div class="overflow-hidden rounded-2xl border border-[#E5E7EB] bg-white" style="box-shadow:0 20px 60px rgba(16,42,67,.14), 0 4px 16px rgba(16,42,67,.08);">
                                    <div class="grid grid-cols-3">
                                        <!-- Category list: spans 2 cols -->
                                        <div class="col-span-2 p-5">
                                            <p class="mb-3 text-[10px] font-extrabold uppercase tracking-widest text-[#667085]">
                                                <?php esc_html_e('Browse Categories', 'dawp'); ?>
                                            </p>
                                            <div class="grid grid-cols-2 gap-1.5">
                                                <?php foreach ($shop_categories as $cat) : ?>
                                                    <a
                                                        href="<?php echo esc_url($cat['url']); ?>"
                                                        class="group/cat flex items-start gap-3 rounded-xl p-3 transition-colors duration-150 hover:bg-[#F5F7FA]"
                                                    >
                                                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl" style="background-color:<?php echo esc_attr($cat['bg']); ?>;color:<?php echo esc_attr($cat['color']); ?>">
                                                            <?php echo $cat['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                                        </span>
                                                        <span class="min-w-0 pt-0.5">
                                                            <span class="block text-sm font-bold leading-tight text-[#1F2937] transition-colors group-hover/cat:text-[#2F80ED]">
                                                                <?php echo esc_html($cat['title']); ?>
                                                            </span>
                                                            <span class="mt-0.5 block text-xs leading-snug text-[#667085]">
                                                                <?php echo esc_html($cat['desc']); ?>
                                                            </span>
                                                        </span>
                                                    </a>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>

                                        <!-- Featured panel -->
                                        <div class="flex flex-col justify-between bg-[#102A43] p-5">
                                            <div>
                                                <p class="mb-2 text-[10px] font-extrabold uppercase tracking-widest text-[#5BA8A0]">
                                                    <?php esc_html_e('Featured', 'dawp'); ?>
                                                </p>
                                                <p class="text-[15px] font-extrabold leading-snug text-white">
                                                    <?php esc_html_e('Smart Little Tools For Everyday Living', 'dawp'); ?>
                                                </p>
                                                <p class="mt-2 text-xs leading-relaxed text-white/65">
                                                    <?php esc_html_e('Practical gadgets for home, kitchen, grooming, and daily routines.', 'dawp'); ?>
                                                </p>
                                            </div>
                                            <div class="mt-5 flex flex-col gap-2">
                                                <a
                                                    href="<?php echo esc_url($shop_url); ?>"
                                                    class="inline-flex items-center justify-center rounded-xl bg-[#2F80ED] px-4 py-2.5 text-sm font-bold text-white transition hover:bg-white hover:text-[#102A43]"
                                                >
                                                    <?php esc_html_e('Shop All Gadgets', 'dawp'); ?>
                                                </a>
                                                <a
                                                    href="<?php echo esc_url(home_url('/track-order/')); ?>"
                                                    class="inline-flex items-center justify-center rounded-xl border border-white/20 px-4 py-2.5 text-xs font-semibold text-white/70 transition hover:border-white/40 hover:text-white"
                                                >
                                                    <?php esc_html_e('Track Your Order', 'dawp'); ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Trust bar -->
                                    <div class="flex flex-wrap items-center gap-x-6 gap-y-1 border-t border-[#E5E7EB] bg-[#F5F7FA] px-5 py-2.5">
                                        <span class="flex items-center gap-1.5 text-[11px] font-semibold text-[#667085]">
                                            <svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="#2F80ED" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                                            <?php esc_html_e('Free shipping on orders $50+', 'dawp'); ?>
                                        </span>
                                        <span class="flex items-center gap-1.5 text-[11px] font-semibold text-[#667085]">
                                            <svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="#16A34A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                                            <?php esc_html_e('30-Day Returns', 'dawp'); ?>
                                        </span>
                                        <span class="flex items-center gap-1.5 text-[11px] font-semibold text-[#667085]">
                                            <svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="#7C3AED" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
                                            <?php esc_html_e('Ships in 2–4 Business Days', 'dawp'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <a href="<?php echo esc_url($item['url']); ?>" class="rounded-full px-4 py-2 text-sm font-bold text-[#334155] transition hover:bg-[#EAF4FF] hover:text-[#2F80ED]">
                            <?php echo esc_html($item['title']); ?>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </nav>

            <div class="flex shrink-0 items-center gap-2">
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="hidden items-center rounded-full border border-[#E5E7EB] bg-white px-3 py-2 xl:flex">
                    <label class="sr-only" for="header-product-search"><?php esc_html_e('Search products', 'dawp'); ?></label>
                    <input id="header-product-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search gadgets', 'dawp'); ?>" class="w-40 bg-transparent text-sm text-[#1F2937] outline-none placeholder:text-[#667085]">
                    <input type="hidden" name="post_type" value="product">
                    <button type="submit" class="ml-2 inline-flex h-8 w-8 items-center justify-center rounded-full text-[#102A43] transition hover:bg-[#EAF4FF] hover:text-[#2F80ED]" aria-label="<?php esc_attr_e('Submit product search', 'dawp'); ?>">
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="11" cy="11" r="7"></circle>
                            <path d="m16 16 4 4"></path>
                        </svg>
                    </button>
                </form>

                <a href="<?php echo esc_url($account_url); ?>" class="hidden h-11 w-11 items-center justify-center rounded-full border border-[#E5E7EB] text-[#102A43] transition hover:bg-[#EAF4FF] hover:text-[#2F80ED] md:inline-flex" aria-label="<?php esc_attr_e('My account', 'dawp'); ?>">
                    <svg viewBox="0 0 24 24" width="21" height="21" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M20 21a8 8 0 0 0-16 0"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </a>

                <a href="<?php echo esc_url($cart_url); ?>" class="relative inline-flex h-11 w-11 items-center justify-center rounded-full bg-[#2F80ED] text-white transition hover:bg-[#102A43]" aria-label="<?php esc_attr_e('Shopping cart', 'dawp'); ?>">
                    <svg viewBox="0 0 24 24" width="21" height="21" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.7 13.4a2 2 0 0 0 2 1.6h8.8a2 2 0 0 0 2-1.6L22 6H6"></path>
                    </svg>
                    <?php if ($cart_count > 0) : ?>
                        <span class="absolute -right-1 -top-1 flex h-5 min-w-5 items-center justify-center rounded-full bg-[#102A43] px-1 text-[11px] font-extrabold text-white">
                            <?php echo esc_html($cart_count); ?>
                        </span>
                    <?php endif; ?>
                </a>

                <button type="button" class="menu-toggle inline-flex h-11 w-11 items-center justify-center rounded-full border border-[#E5E7EB] text-[#102A43] transition hover:bg-[#EAF4FF] hover:text-[#2F80ED] lg:hidden" aria-expanded="false" aria-label="<?php esc_attr_e('Open store menu', 'dawp'); ?>" aria-controls="mobile-store-menu" onclick="const menu=document.getElementById('mobile-store-menu'); const expanded=this.getAttribute('aria-expanded')==='true'; this.setAttribute('aria-expanded', String(!expanded)); menu.classList.toggle('hidden');">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="4" y1="7" x2="20" y2="7"></line>
                        <line x1="4" y1="12" x2="20" y2="12"></line>
                        <line x1="4" y1="17" x2="20" y2="17"></line>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile-store-menu" class="hidden border-t border-[#E5E7EB] bg-white lg:hidden">
        <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6">
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="mb-4 flex items-center rounded-xl border border-[#E5E7EB] bg-[#F5F7FA] px-4 py-3">
                <label class="sr-only" for="mobile-product-search"><?php esc_html_e('Search products', 'dawp'); ?></label>
                <input id="mobile-product-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search practical gadgets', 'dawp'); ?>" class="w-full bg-transparent text-sm text-[#1F2937] outline-none placeholder:text-[#667085]">
                <input type="hidden" name="post_type" value="product">
                <button type="submit" class="ml-2 inline-flex h-9 w-9 items-center justify-center rounded-full bg-white text-[#102A43]" aria-label="<?php esc_attr_e('Submit product search', 'dawp'); ?>">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="11" cy="11" r="7"></circle>
                        <path d="m16 16 4 4"></path>
                    </svg>
                </button>
            </form>

            <nav class="grid gap-1" aria-label="<?php esc_attr_e('Mobile store navigation', 'dawp'); ?>">
                <?php foreach ($nav_items as $item) : ?>
                    <?php if ($item['title'] === __('Shop', 'dawp')) : ?>
                        <div>
                            <button
                                type="button"
                                class="mobile-shop-toggle flex w-full items-center justify-between rounded-xl px-4 py-3 text-base font-bold text-[#334155] transition hover:bg-[#EAF4FF] hover:text-[#2F80ED]"
                                aria-expanded="false"
                                aria-controls="mobile-shop-cats"
                            >
                                <?php echo esc_html($item['title']); ?>
                                <svg class="mobile-shop-chevron shrink-0 transition-transform duration-200" viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <polyline points="6 9 12 15 18 9"/>
                                </svg>
                            </button>
                            <div id="mobile-shop-cats" class="hidden px-2 pb-2 pt-1">
                                <?php foreach ($shop_categories as $cat) : ?>
                                    <a
                                        href="<?php echo esc_url($cat['url']); ?>"
                                        class="flex items-center gap-3 rounded-xl px-3 py-2.5 transition hover:bg-[#EAF4FF]"
                                    >
                                        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg" style="background-color:<?php echo esc_attr($cat['bg']); ?>;color:<?php echo esc_attr($cat['color']); ?>">
                                            <?php echo $cat['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                        </span>
                                        <span class="text-sm font-semibold text-[#1F2937]"><?php echo esc_html($cat['title']); ?></span>
                                    </a>
                                <?php endforeach; ?>
                                <a
                                    href="<?php echo esc_url($shop_url); ?>"
                                    class="mt-1.5 flex items-center justify-center rounded-xl bg-[#EAF4FF] py-2.5 text-sm font-bold text-[#2F80ED] transition hover:bg-[#2F80ED] hover:text-white"
                                >
                                    <?php esc_html_e('View All Products', 'dawp'); ?>
                                </a>
                            </div>
                        </div>
                    <?php else : ?>
                        <a href="<?php echo esc_url($item['url']); ?>" class="rounded-xl px-4 py-3 text-base font-bold text-[#334155] transition hover:bg-[#EAF4FF] hover:text-[#2F80ED]">
                            <?php echo esc_html($item['title']); ?>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </nav>

            <div class="mt-4 grid gap-3 sm:grid-cols-3">
                <a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-xl border border-[#2F80ED] px-5 text-sm font-bold text-[#2F80ED] transition hover:bg-[#EAF4FF]">
                    <?php esc_html_e('Track Order', 'dawp'); ?>
                </a>
                <a href="<?php echo esc_url($account_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-xl border border-[#2F80ED] px-5 text-sm font-bold text-[#2F80ED] transition hover:bg-[#EAF4FF]">
                    <?php esc_html_e('My Account', 'dawp'); ?>
                </a>
                <a href="<?php echo esc_url($cart_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-xl bg-[#2F80ED] px-5 text-sm font-bold text-white transition hover:bg-[#102A43]">
                    <?php esc_html_e('Cart', 'dawp'); ?>
                </a>
            </div>

            <p class="mt-4 text-sm leading-6 text-[#667085]">
                <?php esc_html_e('Need help? Email support@mybaapstore.com, Monday - Friday, 9:00 AM - 6:00 PM EST.', 'dawp'); ?>
            </p>
        </div>
    </div>
    <script>
    (function () {
        var wrap    = document.getElementById('mega-shop-wrap');
        var btn     = document.getElementById('mega-shop-btn');
        var menu    = document.getElementById('mega-shop-menu');
        var chevron = document.getElementById('mega-shop-chevron');
        if (!wrap || !btn || !menu) return;

        function open() {
            menu.classList.remove('pointer-events-none', 'opacity-0', 'translate-y-2');
            menu.classList.add('pointer-events-auto', 'opacity-100', 'translate-y-0');
            btn.setAttribute('aria-expanded', 'true');
            if (chevron) chevron.style.transform = 'rotate(180deg)';
        }
        function close() {
            menu.classList.add('pointer-events-none', 'opacity-0', 'translate-y-2');
            menu.classList.remove('pointer-events-auto', 'opacity-100', 'translate-y-0');
            btn.setAttribute('aria-expanded', 'false');
            if (chevron) chevron.style.transform = '';
        }

        wrap.addEventListener('mouseenter', open);
        wrap.addEventListener('mouseleave', close);
        btn.addEventListener('click', function () {
            window.location.href = btn.getAttribute('data-shop-url');
        });
        document.addEventListener('keydown', function (e) { if (e.key === 'Escape') close(); });
        document.addEventListener('click', function (e) { if (!wrap.contains(e.target)) close(); });

        // Mobile shop accordion
        var mToggle = document.querySelector('.mobile-shop-toggle');
        var mCats   = document.getElementById('mobile-shop-cats');
        if (mToggle && mCats) {
            mToggle.addEventListener('click', function () {
                var expanded = this.getAttribute('aria-expanded') === 'true';
                this.setAttribute('aria-expanded', String(!expanded));
                mCats.classList.toggle('hidden');
                var mChev = this.querySelector('.mobile-shop-chevron');
                if (mChev) mChev.style.transform = expanded ? '' : 'rotate(180deg)';
            });
        }
    })();
    </script>
</header>

<div id="content" class="site-content">
