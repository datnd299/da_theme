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
</head>

<body <?php body_class('bg-white font-body text-[#111111] antialiased'); ?>>
<?php wp_body_open(); ?>

<a class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-[100] focus:rounded-md focus:bg-[#DC2626] focus:px-4 focus:py-3 focus:text-sm focus:font-black focus:text-white" href="#primary">
    <?php esc_html_e('Skip to content', 'dawp'); ?>
</a>

<header id="masthead" class="sticky top-0 z-50 border-b border-[#262626] bg-[#050505] text-white shadow-sm">
    <div class="bg-[#111111]">
        <div class="mx-auto flex min-h-10 max-w-7xl items-center justify-between gap-4 px-4 text-xs font-black uppercase tracking-wide text-[#D4D4D4] sm:px-6 lg:px-8">
            <span><?php esc_html_e('Secure Checkout • Order Tracking • Easy Returns', 'dawp'); ?></span>
            <a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="hidden text-[#FCA5A5] hover:text-white sm:inline-flex">
                <?php esc_html_e('Track Order', 'dawp'); ?>
            </a>
        </div>
    </div>

    <div class="mx-auto flex min-h-20 max-w-7xl items-center gap-3 px-4 sm:px-6 lg:px-8">
        <button id="rubyinstar-mobile-menu-toggle" class="inline-flex h-11 w-11 items-center justify-center rounded-md border border-white/15 bg-white/10 text-white lg:hidden" type="button" aria-controls="rubyinstar-mobile-menu" aria-expanded="false">
            <span class="sr-only"><?php esc_html_e('Open menu', 'dawp'); ?></span>
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7h16M4 12h16M4 17h16" /></svg>
        </button>

        <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex min-w-0 items-center gap-3 text-white hover:text-white">
            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-md bg-[#DC2626]">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><circle cx="12" cy="12" r="7" stroke-width="2" /><circle cx="12" cy="12" r="2" stroke-width="2" /><path stroke-linecap="round" stroke-width="2" d="M12 5v3m0 8v3m7-7h-3M8 12H5" /></svg>
            </span>
            <span class="min-w-0">
                <span class="block font-heading text-2xl font-black leading-none"><?php bloginfo('name'); ?></span>
                <span class="hidden text-xs font-black uppercase tracking-[0.18em] text-[#FCA5A5] sm:block"><?php esc_html_e('Online Tire Store', 'dawp'); ?></span>
            </span>
        </a>

        <nav class="ml-4 hidden flex-1 items-center gap-1 lg:flex" aria-label="<?php esc_attr_e('Primary navigation', 'dawp'); ?>">
            <?php foreach ($menu_items as $item) : ?>
                <?php $is_current = function_exists('dawp_is_current_url') && dawp_is_current_url($item['url']); ?>
                <a href="<?php echo esc_url($item['url']); ?>" class="rounded-md px-3 py-2 text-sm font-black uppercase tracking-wide transition <?php echo $is_current ? 'bg-white text-[#111111]' : 'text-[#E5E5E5] hover:bg-white/10 hover:text-white'; ?>">
                    <?php echo esc_html($item['title']); ?>
                </a>
            <?php endforeach; ?>
        </nav>

        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="ml-auto hidden w-full max-w-xs items-center lg:flex">
            <input type="hidden" name="post_type" value="product">
            <label class="sr-only" for="header-product-search"><?php esc_html_e('Search tires', 'dawp'); ?></label>
            <input id="header-product-search" class="min-h-11 w-full rounded-l-md border border-white/15 bg-white px-4 text-sm font-semibold text-[#111111] placeholder:text-[#737373] focus:border-[#DC2626] focus:outline-none focus:ring-2 focus:ring-[#DC2626]/30" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search tires', 'dawp'); ?>">
            <button class="inline-flex min-h-11 items-center justify-center rounded-r-md bg-[#DC2626] px-4 text-white transition hover:bg-white hover:text-[#111111]" type="submit">
                <span class="sr-only"><?php esc_html_e('Search', 'dawp'); ?></span>
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-4.3-4.3M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15z" /></svg>
            </button>
        </form>

        <button id="rubyinstar-mobile-search-toggle" class="ml-auto inline-flex h-11 w-11 items-center justify-center rounded-md border border-white/15 bg-white/10 text-white lg:hidden" type="button" aria-controls="rubyinstar-mobile-search" aria-expanded="false">
            <span class="sr-only"><?php esc_html_e('Open search', 'dawp'); ?></span>
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-4.3-4.3M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15z" /></svg>
        </button>

        <a href="<?php echo esc_url($cart_url); ?>" class="relative inline-flex h-11 w-11 items-center justify-center rounded-md bg-[#DC2626] text-white transition hover:bg-white hover:text-[#111111]" aria-label="<?php esc_attr_e('View cart', 'dawp'); ?>">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h2l2.2 11.2a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.5L21 8H7M10 21h.01M18 21h.01" /></svg>
            <?php if ($cart_count > 0) : ?>
                <span class="absolute -right-2 -top-2 flex h-5 min-w-5 items-center justify-center rounded-md bg-white px-1 text-xs font-black text-[#DC2626]"><?php echo esc_html($cart_count); ?></span>
            <?php endif; ?>
        </a>
    </div>

    <div id="rubyinstar-mobile-search" class="hidden border-t border-white/10 bg-[#111111] px-4 py-4 lg:hidden">
        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="mx-auto flex max-w-7xl">
            <input type="hidden" name="post_type" value="product">
            <label class="sr-only" for="mobile-product-search"><?php esc_html_e('Search tires', 'dawp'); ?></label>
            <input id="mobile-product-search" class="min-h-12 w-full rounded-l-md border border-white/15 bg-white px-4 text-sm font-semibold text-[#111111] placeholder:text-[#737373] focus:border-[#DC2626] focus:outline-none" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search tires', 'dawp'); ?>">
            <button class="min-h-12 rounded-r-md bg-[#DC2626] px-5 text-sm font-black uppercase tracking-wide text-white" type="submit"><?php esc_html_e('Search', 'dawp'); ?></button>
        </form>
    </div>

    <nav id="rubyinstar-mobile-menu" class="hidden border-t border-white/10 bg-[#050505] px-4 py-4 lg:hidden" aria-label="<?php esc_attr_e('Mobile navigation', 'dawp'); ?>">
        <div class="mx-auto grid max-w-7xl gap-2">
            <?php foreach ($menu_items as $item) : ?>
                <a href="<?php echo esc_url($item['url']); ?>" class="rounded-md border border-white/10 bg-white/5 px-4 py-3 text-sm font-black uppercase tracking-wide text-white">
                    <?php echo esc_html($item['title']); ?>
                </a>
            <?php endforeach; ?>
        </div>
    </nav>
</header>
