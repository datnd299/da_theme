<?php
/**
 * Theme header.
 *
 * @package dawp
 */

$home_url = home_url('/');
$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$cart_url = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$account_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');
$cart_count = 0;

if (function_exists('WC') && WC()->cart) {
    $cart_count = WC()->cart->get_cart_contents_count();
}

$nav_items = function_exists('dawp_main_menu_items') ? dawp_main_menu_items() : [
    ['title' => __('Home', 'dawp'), 'url' => $home_url],
    ['title' => __('Shop', 'dawp'), 'url' => $shop_url],
    ['title' => __('About', 'dawp'), 'url' => home_url('/about-us/')],
    ['title' => __('Contact', 'dawp'), 'url' => home_url('/contact-us/')],
];
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: "Inter", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; }
        .font-heading { font-family: "Playfair Display", Georgia, serif; }
        html { scroll-behavior: smooth; }
    </style>

    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-white antialiased'); ?>>
<?php wp_body_open(); ?>

<header id="masthead" class="sticky top-0 z-50 border-b border-[#E8DFF0] bg-white/95 shadow-sm backdrop-blur" role="banner">
    <div class="bg-[#3B1748]">
        <div class="mx-auto flex max-w-7xl items-center justify-center px-4 py-2 text-center text-sm font-semibold leading-6 text-white sm:px-6 lg:px-8">
            <?php esc_html_e('Romantic intimates, sleepwear, and robes with tracking included and 30-day eligible returns.', 'dawp'); ?>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex min-h-24 items-center justify-between gap-4">
            <a href="<?php echo esc_url($home_url); ?>" class="flex min-w-0 items-center" aria-label="<?php esc_attr_e('Shop Avec Moi home', 'dawp'); ?>">
                <span class="flex h-16 w-[11rem] max-w-[56vw] shrink-0 items-center lg:w-[12rem]">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/shopavecmoi_logo.png'); ?>" alt="<?php esc_attr_e('Shop Avec Moi', 'dawp'); ?>" class="h-full w-auto object-contain">
                </span>
            </a>

            <nav class="hidden items-center gap-6 lg:flex" aria-label="<?php esc_attr_e('Main navigation', 'dawp'); ?>">
                <?php foreach ($nav_items as $item) : ?>
                    <a href="<?php echo esc_url($item['url']); ?>" class="whitespace-nowrap text-base font-semibold text-[#24132E] transition hover:text-[#6E3A8A]">
                        <?php echo esc_html($item['title']); ?>
                    </a>
                <?php endforeach; ?>
            </nav>

            <div class="flex shrink-0 items-center gap-3">
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="hidden items-center rounded-full border border-[#E8DFF0] bg-[#FBF4FF] px-5 py-3 lg:flex">
                    <label for="header-product-search" class="sr-only"><?php esc_html_e('Search products', 'dawp'); ?></label>
                    <input id="header-product-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search intimates', 'dawp'); ?>" class="w-44 bg-transparent text-base text-[#24132E] outline-none placeholder:text-[#6D5875]">
                    <input type="hidden" name="post_type" value="product">
                    <button type="submit" class="ml-2 text-[#3B1748] transition hover:text-[#6E3A8A]" aria-label="<?php esc_attr_e('Submit search', 'dawp'); ?>">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.35-4.35"></path>
                        </svg>
                    </button>
                </form>

                <a href="<?php echo esc_url($account_url); ?>" class="hidden h-12 w-12 items-center justify-center rounded-full border border-[#E8DFF0] text-[#3B1748] transition hover:bg-[#FBF4FF] sm:inline-flex" aria-label="<?php esc_attr_e('My account', 'dawp'); ?>">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M20 21a8 8 0 0 0-16 0"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </a>

                <a href="<?php echo esc_url($cart_url); ?>" class="relative inline-flex h-12 w-12 items-center justify-center rounded-full bg-[#3B1748] text-white transition hover:bg-[#6E3A8A]" aria-label="<?php esc_attr_e('Cart', 'dawp'); ?>">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="8" cy="21" r="1"></circle>
                        <circle cx="19" cy="21" r="1"></circle>
                        <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>
                    </svg>
                    <?php if ($cart_count > 0) : ?>
                        <span class="absolute -right-1 -top-1 flex h-6 min-w-6 items-center justify-center rounded-full bg-white px-1 text-xs font-bold text-[#3B1748]"><?php echo esc_html($cart_count); ?></span>
                    <?php endif; ?>
                </a>

                <button type="button" class="inline-flex h-12 w-12 items-center justify-center rounded-full border border-[#E8DFF0] text-[#3B1748] transition hover:bg-[#FBF4FF] lg:hidden" aria-expanded="false" aria-label="<?php esc_attr_e('Open menu', 'dawp'); ?>" aria-controls="shopavecmoi-mobile-menu" onclick="const menu=document.getElementById('shopavecmoi-mobile-menu'); const expanded=this.getAttribute('aria-expanded')==='true'; this.setAttribute('aria-expanded', String(!expanded)); menu.classList.toggle('hidden');">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="shopavecmoi-mobile-menu" class="hidden border-t border-[#E8DFF0] bg-white lg:hidden">
        <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6">
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="mb-4 flex items-center rounded-full border border-[#E8DFF0] bg-[#FBF4FF] px-5 py-4">
                <label for="mobile-product-search" class="sr-only"><?php esc_html_e('Search products', 'dawp'); ?></label>
                <input id="mobile-product-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search intimates', 'dawp'); ?>" class="flex-1 bg-transparent text-base text-[#24132E] outline-none placeholder:text-[#6D5875]">
                <input type="hidden" name="post_type" value="product">
                <button type="submit" class="text-[#3B1748]" aria-label="<?php esc_attr_e('Submit search', 'dawp'); ?>">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.35-4.35"></path>
                    </svg>
                </button>
            </form>
            <nav class="grid gap-1" aria-label="<?php esc_attr_e('Mobile navigation', 'dawp'); ?>">
                <?php foreach ($nav_items as $item) : ?>
                    <a href="<?php echo esc_url($item['url']); ?>" class="rounded-2xl px-4 py-4 text-base font-semibold text-[#24132E] transition hover:bg-[#FBF4FF] hover:text-[#6E3A8A]">
                        <?php echo esc_html($item['title']); ?>
                    </a>
                <?php endforeach; ?>
                <a href="<?php echo esc_url($account_url); ?>" class="mt-2 inline-flex min-h-14 items-center justify-center rounded-full border border-[#E8DFF0] px-5 text-base font-bold text-[#3B1748] transition hover:bg-[#FBF4FF]">
                    <?php esc_html_e('My Account', 'dawp'); ?>
                </a>
            </nav>
        </div>
    </div>
</header>

<div id="content" class="site-content">
