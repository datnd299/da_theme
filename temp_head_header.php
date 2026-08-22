<?php
/**
 * Theme header.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email  = 'support@chronelshop.com';
$business_hours = __('Monday - Friday, 9:00 AM - 6:00 PM EST', 'dawp');
$home_url       = home_url('/');
$shop_url       = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$account_url    = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');
$cart_url       = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$cart_count     = (function_exists('WC') && WC()->cart) ? WC()->cart->get_cart_contents_count() : 0;
$logo_path      = get_template_directory() . '/assets/img/gallery/logo.png';
$logo_url       = get_template_directory_uri() . '/assets/img/gallery/logo.png';

if (file_exists($logo_path)) {
    $logo_url = add_query_arg('ver', filemtime($logo_path), $logo_url);
}

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

if (!$account_url) {
    $account_url = home_url('/my-account/');
}

$nav_items = [
    ['title' => __('Home', 'dawp'), 'url' => $home_url],
    ['title' => __('Shop', 'dawp'), 'url' => $shop_url],
    ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/')],
    ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/')],
];
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <style>
        body { font-family: "Avenir Next for Best Buy", "Avenir Next", Avenir, Arial, "Helvetica Neue", Helvetica, sans-serif; letter-spacing:0; text-rendering:optimizeLegibility; }
        .font-heading { font-family: "Avenir Next for Best Buy", "Avenir Next", Avenir, Arial, "Helvetica Neue", Helvetica, sans-serif; }
        html { scroll-behavior: smooth; }
        .site-logo-img {
            display: block;
            width: auto;
            height: clamp(3rem, 5vw, 4rem);
            max-width: min(38vw, 8rem);
            object-fit: contain;
            image-rendering: auto;
            transform: translateZ(0);
        }
    </style>

    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-white antialiased text-[#1F2937]'); ?>>
<?php wp_body_open(); ?>

<a href="#content" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-[60] focus:rounded-md focus:bg-white focus:px-4 focus:py-3 focus:text-sm focus:font-bold focus:text-[#1F2937] focus:shadow-lg">
    <?php esc_html_e('Skip to content', 'dawp'); ?>
</a>

<header id="site-header" class="sticky top-0 z-50 border-b border-[#E5E7EB] bg-[#FFFFFF]/95 text-[#1F2937] backdrop-blur" role="banner">
    <div class="hidden border-b border-[#E5E7EB] bg-[#F5F6F8] lg:block">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-8 py-2 text-xs font-semibold text-[#6B7280]">
            <p><?php esc_html_e('Home, electronics and lifestyle products for modern living.', 'dawp'); ?></p>
            <div class="flex items-center gap-5">
                <a class="transition hover:text-[#0046BE]" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
                <span><?php echo esc_html($business_hours); ?></span>
                <a class="font-bold text-[#0046BE] transition hover:text-[#1F2937]" href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a>
            </div>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex min-h-20 items-center justify-between gap-4">
            <a href="<?php echo esc_url($home_url); ?>" class="inline-flex shrink-0 items-center py-2" aria-label="<?php esc_attr_e('Chronel Shop home', 'dawp'); ?>">
                <?php
                echo function_exists('dawp_get_responsive_image')
                    ? dawp_get_responsive_image($logo_url, __('Chronel Shop', 'dawp'), 'site-logo-img', 128, 128, 'eager', '(max-width: 520px) 104px, 128px', 'high')
                    : '<img class="site-logo-img" src="' . esc_url($logo_url) . '" width="1290" height="1290" alt="' . esc_attr__('Chronel Shop', 'dawp') . '" decoding="async" fetchpriority="high">';
                ?>
            </a>

            <nav class="hidden items-center gap-1 xl:flex" aria-label="<?php esc_attr_e('Main store navigation', 'dawp'); ?>">
                <?php foreach ($nav_items as $item) : ?>
                    <a href="<?php echo esc_url($item['url']); ?>" class="rounded-md px-3 py-2 text-sm font-bold text-[#4B403C] transition hover:bg-[#EAF2FF] hover:text-[#0046BE]">
                        <?php echo esc_html($item['title']); ?>
                    </a>
                <?php endforeach; ?>
            </nav>

            <div class="flex shrink-0 items-center gap-2">
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="hidden items-center rounded-md border border-[#E5E7EB] bg-white px-3 py-2 lg:flex">
                    <label class="sr-only" for="header-product-search"><?php esc_html_e('Search products', 'dawp'); ?></label>
                    <input id="header-product-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search home, electronics, kitchen and more', 'dawp'); ?>" class="w-40 bg-transparent text-sm text-[#1F2937] outline-none placeholder:text-[#8D7D77]">
                    <input type="hidden" name="post_type" value="product">
                    <button type="submit" class="ml-2 inline-flex h-8 w-8 items-center justify-center rounded-md text-[#0046BE] transition hover:bg-[#EAF2FF] hover:text-[#1F2937]" aria-label="<?php esc_attr_e('Submit product search', 'dawp'); ?>">
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="11" cy="11" r="7"></circle>
                            <path d="m16 16 4 4"></path>
                        </svg>
                    </button>
                </form>

                <a href="<?php echo esc_url($account_url); ?>" class="hidden h-11 w-11 items-center justify-center rounded-md border border-[#E5E7EB] text-[#0046BE] transition hover:bg-[#EAF2FF] hover:text-[#1F2937] md:inline-flex" aria-label="<?php esc_attr_e('My account', 'dawp'); ?>">
                    <svg viewBox="0 0 24 24" width="21" height="21" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M20 21a8 8 0 0 0-16 0"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </a>

                <a href="<?php echo esc_url($cart_url); ?>" class="relative inline-flex h-11 w-11 items-center justify-center rounded-md bg-[#0046BE] text-white transition hover:bg-[#1F2937]" aria-label="<?php esc_attr_e('Shopping cart', 'dawp'); ?>">
                    <svg viewBox="0 0 24 24" width="21" height="21" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.7 13.4a2 2 0 0 0 2 1.6h8.8a2 2 0 0 0 2-1.6L22 6H6"></path>
                    </svg>
                    <?php if ($cart_count > 0) : ?>
                        <span class="absolute -right-1 -top-1 flex h-5 min-w-5 items-center justify-center rounded-full bg-[#1F2937] px-1 text-[11px] font-extrabold text-white">
                            <?php echo esc_html($cart_count); ?>
                        </span>
                    <?php endif; ?>
                </a>

                <button type="button" class="menu-toggle inline-flex h-11 w-11 items-center justify-center rounded-md border border-[#E5E7EB] text-[#0046BE] transition hover:bg-[#EAF2FF] hover:text-[#1F2937] xl:hidden" aria-expanded="false" aria-label="<?php esc_attr_e('Open store menu', 'dawp'); ?>" aria-controls="mobile-store-menu" onclick="const menu=document.getElementById('mobile-store-menu'); const expanded=this.getAttribute('aria-expanded')==='true'; this.setAttribute('aria-expanded', String(!expanded)); menu.classList.toggle('hidden');">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="4" y1="7" x2="20" y2="7"></line>
                        <line x1="4" y1="12" x2="20" y2="12"></line>
                        <line x1="4" y1="17" x2="20" y2="17"></line>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile-store-menu" class="hidden border-t border-[#E5E7EB] bg-[#FFFFFF] xl:hidden">
        <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6">
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="mb-4 flex items-center rounded-md border border-[#E5E7EB] bg-[#F5F6F8] px-4 py-3">
                <label class="sr-only" for="mobile-product-search"><?php esc_html_e('Search products', 'dawp'); ?></label>
                <input id="mobile-product-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search home, electronics, kitchen and more', 'dawp'); ?>" class="w-full bg-transparent text-sm text-[#1F2937] outline-none placeholder:text-[#8D7D77]">
                <input type="hidden" name="post_type" value="product">
                <button type="submit" class="ml-2 inline-flex h-9 w-9 items-center justify-center rounded-md bg-white text-[#0046BE]" aria-label="<?php esc_attr_e('Submit product search', 'dawp'); ?>">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="11" cy="11" r="7"></circle>
                        <path d="m16 16 4 4"></path>
                    </svg>
                </button>
            </form>

            <nav class="grid gap-1" aria-label="<?php esc_attr_e('Mobile store navigation', 'dawp'); ?>">
                <?php foreach ($nav_items as $item) : ?>
                    <a href="<?php echo esc_url($item['url']); ?>" class="rounded-md px-4 py-3 text-base font-bold text-[#4B403C] transition hover:bg-[#EAF2FF] hover:text-[#0046BE]">
                        <?php echo esc_html($item['title']); ?>
                    </a>
                <?php endforeach; ?>
            </nav>

            <div class="mt-4 grid gap-3 sm:grid-cols-3">
                <a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#0046BE] px-5 text-sm font-bold text-[#0046BE] transition hover:bg-[#EAF2FF]">
                    <?php esc_html_e('Track Order', 'dawp'); ?>
                </a>
                <a href="<?php echo esc_url($account_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#0046BE] px-5 text-sm font-bold text-[#0046BE] transition hover:bg-[#EAF2FF]">
                    <?php esc_html_e('My Account', 'dawp'); ?>
                </a>
                <a href="<?php echo esc_url($cart_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#0046BE] px-5 text-sm font-bold text-white transition hover:bg-[#1F2937]">
                    <?php esc_html_e('Cart', 'dawp'); ?>
                </a>
            </div>

            <p class="mt-4 text-sm leading-6 text-[#6B7280]">
                <?php
                echo wp_kses(
                    sprintf(
                        /* translators: 1: support email, 2: business hours */
                        __('Need help? Email %1$s. Business hours: %2$s.', 'dawp'),
                        '<a class="font-bold text-[#0046BE]" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>',
                        esc_html($business_hours)
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
