<?php
/**
 * Theme header — MozTire
 * Asphalt / Tread Orange / Signal Yellow
 */

$shop_url    = dawp_shop_url();
$cart_url    = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$cart_count  = function_exists('WC') && WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
$account_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : '';
$account_url = $account_url ? $account_url : home_url('/my-account/');
$facts       = dawp_store_facts();

// FiboSearch (AJAX autocomplete) — fall back to the native product search if the plugin is inactive
$has_fibo           = shortcode_exists('fibosearch');
$search_placeholder = __('Search size (225/65R17), brand or tire line', 'dawp');
if ($has_fibo) {
    add_filter('dgwt/wcas/labels', function ($labels) use ($search_placeholder) {
        $labels['search_placeholder'] = $search_placeholder;
        return $labels;
    });
}

$nav_types = ['All-Season', 'Winter', 'All-Terrain', 'Performance', 'Highway'];
$search_icon = '<svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4" d="m21 21-4.3-4.3M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15z"/></svg>';
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@600;700;800;900&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="sr-only skip-link" href="#primary"><?php esc_html_e('Skip to content', 'dawp'); ?></a>

<header id="masthead" class="mz-header relative z-50 bg-ink text-white">
    <div class="hidden border-b border-white/10 bg-ink-soft text-[13px] text-white/75 md:block">
        <div class="mz-container flex h-9 items-center justify-between gap-6">
            <p class="m-0 flex items-center gap-2">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-accent-blush" aria-hidden="true"><path d="M3 7h11v9H3zM14 10h4l3 3v3h-7z"/><circle cx="7" cy="18" r="2"/><circle cx="17" cy="18" r="2"/></svg>
                <span><strong class="font-semibold text-white">Free ground shipping</strong> to the contiguous U.S. &middot; <?php echo (int) $facts['return_window']; ?>-day returns on unmounted tires</span>
            </p>
            <nav class="flex items-center gap-5" aria-label="<?php esc_attr_e('Utility', 'dawp'); ?>">
                <a class="hover:text-white" href="<?php echo esc_url(home_url('/track-order/')); ?>">Track Order</a>
                <a class="hover:text-white" href="<?php echo esc_url(home_url('/faq/')); ?>">Help &amp; FAQ</a>
                <a class="hover:text-white" href="mailto:<?php echo esc_attr($facts['email']); ?>"><?php echo esc_html($facts['email']); ?></a>
            </nav>
        </div>
    </div>

    <div class="mz-container flex min-h-16 items-center gap-3 lg:min-h-[76px] lg:gap-8">
        <button id="sgs-mobile-toggle" class="inline-flex size-11 shrink-0 items-center justify-center rounded-md border border-white/15 bg-white/5 lg:hidden" type="button" aria-controls="sgs-mobile-menu" aria-expanded="false">
            <span class="sr-only"><?php esc_html_e('Open menu', 'dawp'); ?></span>
            <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-width="2.2" d="M4 7h16M4 12h16M4 17h16"/></svg>
        </button>

        <a href="<?php echo esc_url(home_url('/')); ?>" class="flex min-w-0 shrink-0 items-center" aria-label="<?php echo esc_attr($facts['brand'] . ' home'); ?>">
            <img src="<?php echo esc_url(get_theme_file_uri('/assets/img/logo-moztire.svg')); ?>" alt="<?php echo esc_attr($facts['brand']); ?>" width="220" height="48" class="block h-9 w-auto lg:h-11" decoding="async">
        </a>

        <div class="hidden min-w-0 flex-1 lg:block">
            <?php if ($has_fibo) : ?>
                <div class="mz-fibo"><?php echo do_shortcode('[fibosearch layout="classic" style="solaris" submit_btn="1" mobile_overlay="0" darken_bg="0"]'); ?></div>
            <?php else : ?>
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="flex h-12 w-full overflow-hidden rounded-md bg-white">
                    <input type="hidden" name="post_type" value="product">
                    <label class="sr-only" for="sgs-prod-search"><?php echo esc_html($search_placeholder); ?></label>
                    <input id="sgs-prod-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php echo esc_attr($search_placeholder); ?>" class="min-w-0 flex-1 border-0 bg-transparent px-4 text-base text-foreground outline-none placeholder:text-muted">
                    <button type="submit" class="inline-flex w-14 items-center justify-center bg-accent text-white transition-colors hover:bg-accent-hover" aria-label="<?php esc_attr_e('Search', 'dawp'); ?>"><?php echo $search_icon; // phpcs:ignore ?></button>
                </form>
            <?php endif; ?>
        </div>

        <div class="ml-auto flex shrink-0 items-center gap-2 lg:ml-0">
            <button id="sgs-mobile-search-toggle" class="inline-flex size-11 items-center justify-center rounded-md border border-white/15 bg-white/5 lg:hidden" type="button" aria-controls="sgs-mobile-search" aria-expanded="false">
                <span class="sr-only"><?php esc_html_e('Search', 'dawp'); ?></span>
                <?php echo $search_icon; // phpcs:ignore ?>
            </button>

            <a href="<?php echo esc_url($account_url); ?>" class="hidden h-11 items-center gap-2 rounded-md px-3 text-sm font-semibold text-white/85 hover:bg-white/10 hover:text-white sm:inline-flex" aria-label="<?php esc_attr_e('My Account', 'dawp'); ?>">
                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM4 21v-1a6 6 0 0 1 6-6h4a6 6 0 0 1 6 6v1"/></svg>
                <span class="hidden xl:inline">Account</span>
            </a>

            <a href="<?php echo esc_url($cart_url); ?>" id="dawp-cart-toggle" class="relative inline-flex h-11 items-center gap-2 rounded-md bg-accent px-3 font-heading text-sm font-extrabold text-white transition-colors hover:bg-accent-hover" aria-label="<?php esc_attr_e('View cart', 'dawp'); ?>">
                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h2l2.2 11.2a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.5L21 8H7M10 21h.01M18 21h.01"/></svg>
                <span class="hidden sm:inline">Cart</span>
                <span class="mz-cart-count<?php echo $cart_count > 0 ? '' : ' hidden'; ?>"><?php echo esc_html($cart_count); ?></span>
            </a>
        </div>
    </div>

    <nav class="hidden border-t border-white/10 lg:block" aria-label="<?php esc_attr_e('Primary', 'dawp'); ?>">
        <div class="mz-container flex h-12 items-center gap-1 text-sm font-semibold">
            <a href="<?php echo esc_url($shop_url); ?>" class="mr-2 inline-flex h-9 items-center gap-2 rounded-md bg-white px-3 font-heading font-extrabold text-foreground hover:bg-accent-blush">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="4"/><path d="M12 3v5M12 16v5M3 12h5M16 12h5"/></svg>
                Shop All Tires
            </a>
            <?php foreach ($nav_types as $type) : ?>
                <a href="<?php echo esc_url(dawp_tire_type_url($type)); ?>" class="inline-flex h-9 items-center rounded-md px-3 text-white/80 hover:bg-white/10 hover:text-white"><?php echo esc_html($type); ?></a>
            <?php endforeach; ?>
            <a href="<?php echo esc_url(home_url('/shop-by-brand/')); ?>" class="inline-flex h-9 items-center rounded-md px-3 text-white/80 hover:bg-white/10 hover:text-white">Brands</a>
            <a href="<?php echo esc_url(home_url('/tire-size-guide/')); ?>" class="ml-auto inline-flex h-9 items-center gap-2 rounded-md px-3 text-accent-blush hover:bg-white/10">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 8h.01M11 12h1v5h1"/></svg>
                How to read your tire size
            </a>
        </div>
    </nav>

    <div id="sgs-mobile-search" class="hidden border-t border-white/10 bg-ink px-4 py-3 lg:hidden">
        <?php if ($has_fibo) : ?>
            <div class="mz-fibo"><?php echo do_shortcode('[fibosearch layout="classic" style="solaris" submit_btn="1" mobile_overlay="0" darken_bg="0"]'); ?></div>
        <?php else : ?>
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="flex h-12 overflow-hidden rounded-md bg-white">
                <input type="hidden" name="post_type" value="product">
                <label class="sr-only" for="sgs-mobile-search-input"><?php echo esc_html($search_placeholder); ?></label>
                <input id="sgs-mobile-search-input" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Size, brand or tire line', 'dawp'); ?>" class="min-w-0 flex-1 border-0 bg-transparent px-4 text-base text-foreground outline-none">
                <button type="submit" class="bg-accent px-4 font-heading font-extrabold text-white"><?php esc_html_e('Search', 'dawp'); ?></button>
            </form>
        <?php endif; ?>
        <p class="mt-2 mb-0 text-xs text-white/60">Tip: type your size exactly as it appears on the sidewall, e.g. 225/65R17.</p>
    </div>

    <nav id="sgs-mobile-menu" class="hidden max-h-[calc(100dvh-64px)] overflow-y-auto border-t border-white/10 bg-ink px-4 pt-3 pb-5 lg:hidden" aria-label="<?php esc_attr_e('Mobile navigation', 'dawp'); ?>">
        <a href="<?php echo esc_url($shop_url); ?>" class="mb-3 flex h-12 items-center justify-center rounded-md bg-accent font-heading font-extrabold text-white">Shop All Tires</a>
        <p class="mt-4 mb-2 text-xs font-bold tracking-widest text-white/50 uppercase">Tire type</p>
        <div class="grid grid-cols-2 gap-2">
            <?php foreach ($nav_types as $type) : ?>
                <a href="<?php echo esc_url(dawp_tire_type_url($type)); ?>" class="flex min-h-11 items-center rounded-md border border-white/10 bg-white/5 px-3 text-[15px] font-semibold"><?php echo esc_html($type); ?></a>
            <?php endforeach; ?>
            <a href="<?php echo esc_url(home_url('/shop-by-brand/')); ?>" class="flex min-h-11 items-center rounded-md border border-white/10 bg-white/5 px-3 text-[15px] font-semibold">All Brands</a>
        </div>
        <p class="mt-5 mb-2 text-xs font-bold tracking-widest text-white/50 uppercase">Help</p>
        <div class="grid gap-1 text-[15px]">
            <a class="flex min-h-11 items-center text-accent-blush" href="<?php echo esc_url(home_url('/tire-size-guide/')); ?>">Tire Size Guide</a>
            <a class="flex min-h-11 items-center" href="<?php echo esc_url(home_url('/track-order/')); ?>">Track Order</a>
            <a class="flex min-h-11 items-center" href="<?php echo esc_url(home_url('/faq/')); ?>">FAQ</a>
            <a class="flex min-h-11 items-center" href="<?php echo esc_url(home_url('/contact-us/')); ?>">Contact Us</a>
            <a class="flex min-h-11 items-center" href="<?php echo esc_url($account_url); ?>">My Account</a>
        </div>
    </nav>
</header>
