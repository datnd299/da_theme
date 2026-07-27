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
$logo_path = '/assets/img/gallery/Gudwear/gudwear-logo.png';

if (function_exists('WC') && WC()->cart) {
    $cart_count = WC()->cart->get_cart_contents_count();
}

$nav_items = function_exists('dawp_main_menu_items') ? dawp_main_menu_items() : [
    ['title' => __('Home', 'dawp'), 'url' => $home_url],
    ['title' => __('Shop', 'dawp'), 'url' => $shop_url],
    ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/')],
    ['title' => __('Contact us', 'dawp'), 'url' => home_url('/contact-us/')],
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

<header id="masthead" class="sticky top-0 z-50 border-b border-[#E7D8C8] bg-white/95 shadow-sm backdrop-blur" role="banner">
    <div class="bg-[#FFF8EF]">
        <div class="mx-auto flex max-w-7xl items-center justify-center px-4 py-2 text-center text-xs font-semibold leading-5 text-[#756A62] sm:px-6 lg:px-8">
            <?php esc_html_e('Soft everyday women\'s fashion with tracking included and 30-day returns.', 'dawp'); ?>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex min-h-20 items-center justify-between gap-4">
            <a href="<?php echo esc_url($home_url); ?>" class="flex min-w-0 items-center" aria-label="<?php esc_attr_e('Gudwear.com home', 'dawp'); ?>">
                <span class="flex h-12 w-[8.5rem] max-w-[42vw] shrink-0 items-center lg:w-[9.5rem]">
                    <?php if (file_exists(get_template_directory() . $logo_path)) : ?>
                        <img src="<?php echo esc_url(get_template_directory_uri() . $logo_path); ?>" alt="<?php esc_attr_e('Gudwear.com', 'dawp'); ?>" class="h-auto max-h-11 max-w-full object-contain">
                    <?php else : ?>
                        GW
                    <?php endif; ?>
                </span>
            </a>

            <nav class="hidden items-center gap-6 lg:flex" aria-label="<?php esc_attr_e('Main navigation', 'dawp'); ?>">
                <?php foreach ($nav_items as $item) : ?>
                    <a href="<?php echo esc_url($item['url']); ?>" class="whitespace-nowrap text-sm font-semibold text-[#4B3528] transition hover:text-[#B89B83]">
                        <?php echo esc_html($item['title']); ?>
                    </a>
                <?php endforeach; ?>
            </nav>

            <div class="flex shrink-0 items-center gap-3">
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="hidden items-center rounded-full border border-[#E7D8C8] bg-[#FFF8EF] px-4 py-2 lg:flex">
                    <label for="header-product-search" class="sr-only"><?php esc_html_e('Search products', 'dawp'); ?></label>
                    <input id="header-product-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search styles', 'dawp'); ?>" class="w-40 bg-transparent text-sm text-[#2F2925] outline-none placeholder:text-[#756A62]">
                    <input type="hidden" name="post_type" value="product">
                    <button type="submit" class="ml-2 text-[#4B3528] transition hover:text-[#B89B83]" aria-label="<?php esc_attr_e('Submit search', 'dawp'); ?>">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.35-4.35"></path>
                        </svg>
                    </button>
                </form>

                <a href="<?php echo esc_url($account_url); ?>" class="hidden h-11 w-11 items-center justify-center rounded-full border border-[#E7D8C8] text-[#4B3528] transition hover:bg-[#F3E7DA] sm:inline-flex" aria-label="<?php esc_attr_e('My account', 'dawp'); ?>">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M20 21a8 8 0 0 0-16 0"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </a>

                <a href="<?php echo esc_url($cart_url); ?>" class="relative inline-flex h-11 w-11 items-center justify-center rounded-full bg-[#4B3528] text-white transition hover:bg-[#B89B83]" aria-label="<?php esc_attr_e('Cart', 'dawp'); ?>">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="8" cy="21" r="1"></circle>
                        <circle cx="19" cy="21" r="1"></circle>
                        <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>
                    </svg>
                    <?php if ($cart_count > 0) : ?>
                        <span class="absolute -right-1 -top-1 flex h-5 min-w-5 items-center justify-center rounded-full bg-[#A8B99A] px-1 text-xs font-bold text-[#2F2925]"><?php echo esc_html($cart_count); ?></span>
                    <?php endif; ?>
                </a>

                <button type="button" class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-[#E7D8C8] text-[#4B3528] transition hover:bg-[#F3E7DA] lg:hidden" aria-expanded="false" aria-label="<?php esc_attr_e('Open menu', 'dawp'); ?>" aria-controls="gudwear-mobile-menu" onclick="const menu=document.getElementById('gudwear-mobile-menu'); const expanded=this.getAttribute('aria-expanded')==='true'; this.setAttribute('aria-expanded', String(!expanded)); menu.classList.toggle('hidden');">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="gudwear-mobile-menu" class="hidden border-t border-[#E7D8C8] bg-white lg:hidden">
        <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6">
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="mb-4 flex items-center rounded-full border border-[#E7D8C8] bg-[#FFF8EF] px-4 py-3">
                <label for="mobile-product-search" class="sr-only"><?php esc_html_e('Search products', 'dawp'); ?></label>
                <input id="mobile-product-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search styles', 'dawp'); ?>" class="flex-1 bg-transparent text-sm text-[#2F2925] outline-none placeholder:text-[#756A62]">
                <input type="hidden" name="post_type" value="product">
                <button type="submit" class="text-[#4B3528]" aria-label="<?php esc_attr_e('Submit search', 'dawp'); ?>">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.35-4.35"></path>
                    </svg>
                </button>
            </form>
            <nav class="grid gap-1" aria-label="<?php esc_attr_e('Mobile navigation', 'dawp'); ?>">
                <?php foreach ($nav_items as $item) : ?>
                    <a href="<?php echo esc_url($item['url']); ?>" class="rounded-2xl px-4 py-3 text-sm font-semibold text-[#4B3528] transition hover:bg-[#FFF8EF] hover:text-[#B89B83]">
                        <?php echo esc_html($item['title']); ?>
                    </a>
                <?php endforeach; ?>
                <a href="<?php echo esc_url($account_url); ?>" class="mt-2 inline-flex min-h-12 items-center justify-center rounded-full border border-[#B89B83] px-5 text-sm font-bold text-[#4B3528] transition hover:bg-[#F3E7DA]">
                    <?php esc_html_e('My Account', 'dawp'); ?>
                </a>
            </nav>
        </div>
    </div>
</header>

<div id="content" class="site-content">
