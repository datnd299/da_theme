<?php
/**
 * Theme header — TimePiece Haven.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email  = 'support@timepiecehaven.com';
$business_hours = __('Mon - Fri, 9:00 AM - 5:00 PM EST', 'dawp');
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

$dawp_cat_url = static function ($slug) {
    if (function_exists('get_term_by')) {
        $term = get_term_by('slug', $slug, 'product_cat');

        if ($term && !is_wp_error($term)) {
            $link = get_term_link($term);

            if (!is_wp_error($link)) {
                return $link;
            }
        }
    }

    return home_url('/product-category/' . trim($slug, '/') . '/');
};

$shop_collections = [
    ['title' => __('Minimalist', 'dawp'),        'desc' => __('Clean dials, slim cases', 'dawp'),        'url' => $dawp_cat_url('minimalist')],
    ['title' => __('Sport & Outdoor', 'dawp'),   'desc' => __('5 ATM, chronograph, silicone', 'dawp'),   'url' => $dawp_cat_url('sport-outdoor')],
    ['title' => __('Vintage & Leather', 'dawp'), 'desc' => __('Retro shapes, leather straps', 'dawp'),   'url' => $dawp_cat_url('vintage-leather')],
    ['title' => __('Luxury Style', 'dawp'),      'desc' => __('Polished dress watches', 'dawp'),         'url' => $dawp_cat_url('luxury-style')],
];

$nav_items = [
    ['title' => __('Home', 'dawp'),        'url' => $home_url],
    ['title' => __('Shop', 'dawp'),        'url' => $shop_url, 'children' => $shop_collections],
    ['title' => __('Contact Us', 'dawp'),  'url' => home_url('/contact-us/')],
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: "Inter", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; }
        .font-heading { font-family: "Poppins", "Inter", system-ui, sans-serif; }
        html { scroll-behavior: smooth; }
    </style>

    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-background text-foreground antialiased'); ?>>
<?php wp_body_open(); ?>

<a href="#content" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-50 focus:rounded-md focus:bg-white focus:px-4 focus:py-3 focus:text-sm focus:font-bold focus:text-primary focus:shadow-lg">
    <?php esc_html_e('Skip to content', 'dawp'); ?>
</a>

<header id="site-header" class="sticky top-0 z-50 bg-primary text-white" role="banner">
    <div class="hidden border-b border-white/10 lg:block">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-8 py-2 text-xs font-medium text-white/70">
            <p><?php esc_html_e('Free insured shipping on every US order. Genuine watches, shipped from the USA.', 'dawp'); ?></p>
            <div class="flex items-center gap-5">
                <a class="transition hover:text-accent" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
                <span><?php echo esc_html($business_hours); ?></span>
                <a class="font-semibold text-accent transition hover:text-white" href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a>
            </div>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex min-h-20 items-center justify-between gap-4">
            <a href="<?php echo esc_url($home_url); ?>" class="inline-flex shrink-0 items-center py-2" aria-label="<?php esc_attr_e('TimePiece Haven — home', 'dawp'); ?>">
                <img src="<?php echo esc_url(get_theme_file_uri('assets/img/logo.png')); ?>" alt="<?php esc_attr_e('TimePiece Haven', 'dawp'); ?>" width="720" height="347" class="h-10 w-auto sm:h-12" decoding="async" fetchpriority="high">
            </a>

            <nav class="hidden items-center gap-1 lg:flex" aria-label="<?php esc_attr_e('Main store navigation', 'dawp'); ?>">
                <?php foreach ($nav_items as $item) : ?>
                    <?php if (!empty($item['children'])) : ?>
                        <div class="group relative">
                            <a href="<?php echo esc_url($item['url']); ?>" class="inline-flex items-center gap-1 rounded-md px-3 py-2 text-sm font-semibold text-white/85 transition hover:bg-white/10 hover:text-accent group-hover:bg-white/10 group-hover:text-accent" aria-haspopup="true">
                                <?php echo esc_html($item['title']); ?>
                                <svg class="h-3.5 w-3.5 transition group-hover:rotate-180" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>
                            </a>
                            <div class="invisible absolute left-0 top-full z-50 w-80 translate-y-1 pt-2 opacity-0 transition duration-200 group-hover:visible group-hover:translate-y-0 group-hover:opacity-100 group-focus-within:visible group-focus-within:translate-y-0 group-focus-within:opacity-100">
                                <div class="overflow-hidden rounded-xl border border-white/10 bg-primary-soft shadow-2xl">
                                    <div class="grid gap-1 p-2">
                                        <?php foreach ($item['children'] as $child) : ?>
                                            <a href="<?php echo esc_url($child['url']); ?>" class="rounded-lg px-3 py-2.5 transition hover:bg-white/10">
                                                <span class="block text-sm font-semibold text-white"><?php echo esc_html($child['title']); ?></span>
                                                <span class="block text-xs text-white/55"><?php echo esc_html($child['desc']); ?></span>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                    <a href="<?php echo esc_url($item['url']); ?>" class="flex items-center justify-between border-t border-white/10 px-4 py-3 text-xs font-bold uppercase tracking-wide text-accent transition hover:bg-white/10">
                                        <?php esc_html_e('Shop all watches', 'dawp'); ?>
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <a href="<?php echo esc_url($item['url']); ?>" class="rounded-md px-3 py-2 text-sm font-semibold text-white/85 transition hover:bg-white/10 hover:text-accent">
                            <?php echo esc_html($item['title']); ?>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </nav>

            <div class="flex shrink-0 items-center gap-2">
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="hidden items-center rounded-md border border-white/15 bg-white/5 px-3 py-2 lg:flex">
                    <label class="sr-only" for="header-product-search"><?php esc_html_e('Search watches', 'dawp'); ?></label>
                    <input id="header-product-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search watches', 'dawp'); ?>" class="w-36 bg-transparent text-sm text-white outline-none placeholder:text-white/50">
                    <input type="hidden" name="post_type" value="product">
                    <button type="submit" class="ml-2 inline-flex h-8 w-8 items-center justify-center rounded-md text-accent transition hover:bg-white/10" aria-label="<?php esc_attr_e('Submit search', 'dawp'); ?>">
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="11" cy="11" r="7"></circle>
                            <path d="m16 16 4 4"></path>
                        </svg>
                    </button>
                </form>

                <a href="<?php echo esc_url($account_url); ?>" class="hidden h-11 w-11 items-center justify-center rounded-md border border-white/15 text-white transition hover:bg-white/10 hover:text-accent md:inline-flex" aria-label="<?php esc_attr_e('My account', 'dawp'); ?>">
                    <svg viewBox="0 0 24 24" width="21" height="21" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M20 21a8 8 0 0 0-16 0"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </a>

                <a href="<?php echo esc_url($cart_url); ?>" class="xoo-wsc-cart-trigger relative inline-flex h-11 w-11 items-center justify-center rounded-md bg-accent text-primary transition hover:bg-accent-hover" aria-label="<?php esc_attr_e('Shopping cart', 'dawp'); ?>">
                    <svg viewBox="0 0 24 24" width="21" height="21" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.7 13.4a2 2 0 0 0 2 1.6h8.8a2 2 0 0 0 2-1.6L22 6H6"></path>
                    </svg>
                    <?php echo function_exists('dawp_cart_count_badge_html') ? dawp_cart_count_badge_html($cart_count) : ''; ?>
                </a>

                <button type="button" class="inline-flex h-11 w-11 items-center justify-center rounded-md border border-white/15 text-white transition hover:bg-white/10 lg:hidden" aria-expanded="false" aria-label="<?php esc_attr_e('Open store menu', 'dawp'); ?>" aria-controls="mobile-store-menu" onclick="const menu=document.getElementById('mobile-store-menu'); const expanded=this.getAttribute('aria-expanded')==='true'; this.setAttribute('aria-expanded', String(!expanded)); menu.classList.toggle('hidden');">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="4" y1="7" x2="20" y2="7"></line>
                        <line x1="4" y1="12" x2="20" y2="12"></line>
                        <line x1="4" y1="17" x2="20" y2="17"></line>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile-store-menu" class="hidden border-t border-white/10 bg-primary lg:hidden">
        <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6">
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="mb-4 flex items-center rounded-md border border-white/15 bg-white/5 px-4 py-3">
                <label class="sr-only" for="mobile-product-search"><?php esc_html_e('Search watches', 'dawp'); ?></label>
                <input id="mobile-product-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search minimalist, sport, vintage, luxury', 'dawp'); ?>" class="w-full bg-transparent text-sm text-white outline-none placeholder:text-white/50">
                <input type="hidden" name="post_type" value="product">
                <button type="submit" class="ml-2 inline-flex h-9 w-9 items-center justify-center rounded-md bg-accent text-primary" aria-label="<?php esc_attr_e('Submit search', 'dawp'); ?>">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="11" cy="11" r="7"></circle>
                        <path d="m16 16 4 4"></path>
                    </svg>
                </button>
            </form>

            <nav class="grid gap-1" aria-label="<?php esc_attr_e('Mobile store navigation', 'dawp'); ?>">
                <?php foreach ($nav_items as $item) : ?>
                    <a href="<?php echo esc_url($item['url']); ?>" class="rounded-md px-4 py-3 text-base font-semibold text-white/85 transition hover:bg-white/10 hover:text-accent">
                        <?php echo esc_html($item['title']); ?>
                    </a>
                    <?php if (!empty($item['children'])) : ?>
                        <div class="mb-1 ml-3 grid gap-0.5 border-l border-white/15 pl-3">
                            <?php foreach ($item['children'] as $child) : ?>
                                <a href="<?php echo esc_url($child['url']); ?>" class="rounded-md px-3 py-2 text-sm font-medium text-white/70 transition hover:bg-white/10 hover:text-accent">
                                    <?php echo esc_html($child['title']); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </nav>

            <div class="mt-4 grid gap-3 sm:grid-cols-2">
                <a href="<?php echo esc_url($account_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-white/20 px-5 text-sm font-bold text-white transition hover:bg-white/10">
                    <?php esc_html_e('My Account', 'dawp'); ?>
                </a>
                <a href="<?php echo esc_url($cart_url); ?>" class="xoo-wsc-cart-trigger inline-flex min-h-12 items-center justify-center rounded-md bg-accent px-5 text-sm font-bold text-primary transition hover:bg-accent-hover">
                    <?php esc_html_e('Cart', 'dawp'); ?>
                </a>
            </div>

            <p class="mt-4 text-sm leading-6 text-white/70">
                <?php
                echo wp_kses(
                    sprintf(
                        /* translators: 1: support email, 2: business hours */
                        __('Questions? Email %1$s. Support hours: %2$s.', 'dawp'),
                        '<a class="font-semibold text-accent" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>',
                        esc_html($business_hours)
                    ),
                    ['a' => ['class' => [], 'href' => []]]
                );
                ?>
            </p>
        </div>
    </div>
</header>

<div id="content" class="site-content">
