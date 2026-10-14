<?php
/**
 * Theme header — ProudlyWear.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email  = 'support@proudlywear.com';
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

$cat_url = static function ($slug) use ($shop_url) {
    return function_exists('dawp_product_category_url') ? dawp_product_category_url($slug) : $shop_url;
};

$product_links = [
    ['title' => __('T-Shirts', 'dawp'), 'url' => $cat_url('t-shirts')],
    ['title' => __('Hoodies & Zip-Ups', 'dawp'), 'url' => $cat_url('hoodies')],
    ['title' => __('Sweatshirts', 'dawp'), 'url' => $cat_url('sweatshirts')],
    ['title' => __('Polo Shirts', 'dawp'), 'url' => $cat_url('polo-shirts')],
    ['title' => __('Bomber Jackets', 'dawp'), 'url' => $cat_url('bomber-jackets')],
    ['title' => __('Hats & Caps', 'dawp'), 'url' => $cat_url('caps')],
    ['title' => __('Flags', 'dawp'), 'url' => $cat_url('flags')],
    ['title' => __('Metal Signs', 'dawp'), 'url' => $cat_url('metal-signs')],
];

$branch_links = [
    ['title' => __('Army Veterans', 'dawp'), 'url' => $cat_url('army')],
    ['title' => __('Navy Veterans', 'dawp'), 'url' => $cat_url('navy')],
    ['title' => __('Air Force Veterans', 'dawp'), 'url' => $cat_url('air-force')],
    ['title' => __('Marine Veterans', 'dawp'), 'url' => $cat_url('marine-corps')],
    ['title' => __('Coast Guard Veterans', 'dawp'), 'url' => $cat_url('coast-guard')],
    ['title' => __('Military Families', 'dawp'), 'url' => $cat_url('military-family')],
];

$nav_items = [
    ['title' => __('New Arrivals', 'dawp'), 'url' => $cat_url('new-arrivals')],
    ['title' => __('Best Sellers', 'dawp'), 'url' => $cat_url('best-seller')],
    ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/')],
    ['title' => __('FAQs', 'dawp'), 'url' => home_url('/faq/')],
];

$announcements = [
    __('Free US shipping on orders $49+', 'dawp'),
    __('Proudly serving those who served', 'dawp'),
    __('Printed to order — just for you', 'dawp'),
    __('30-day returns on eligible items', 'dawp'),
    __('Secure checkout — Visa, Mastercard, Amex, PayPal', 'dawp'),
];

// FiboSearch (AJAX autocomplete) — falls back to the native WP product search if the plugin is inactive
$has_fibo         = shortcode_exists('fibosearch');
$fibo_shortcode   = '[fibosearch layout="classic" style="solaris" submit_btn="1" mobile_overlay="0" darken_bg="0"]';
$search_icon      = '<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><path d="m16 16 4 4"></path></svg>';
$render_search    = static function ($id) use ($has_fibo, $fibo_shortcode, $search_icon) {
    if ($has_fibo) {
        echo do_shortcode($fibo_shortcode);
        return;
    }
    ?>
    <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="flex items-center rounded-md border border-border-strong bg-background px-3 py-1">
        <label class="sr-only" for="<?php echo esc_attr($id); ?>"><?php esc_html_e('Search products', 'dawp'); ?></label>
        <input id="<?php echo esc_attr($id); ?>" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search apparel…', 'dawp'); ?>" class="min-h-9 w-full min-w-0 bg-transparent text-sm text-foreground outline-none placeholder:text-muted">
        <input type="hidden" name="post_type" value="product">
        <button type="submit" class="ml-1 inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-sm bg-foreground text-background transition hover:bg-accent" aria-label="<?php esc_attr_e('Submit product search', 'dawp'); ?>"><?php echo $search_icon; ?></button>
    </form>
    <?php
};

if ($has_fibo) {
    add_filter('dgwt/wcas/labels', static function ($labels) {
        $labels['search_placeholder'] = __('Search apparel…', 'dawp');
        return $labels;
    });
}

$chevron = '<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg>';
$nav_link = 'inline-flex items-center gap-1 whitespace-nowrap border-b-2 border-transparent px-2 py-2 font-heading text-[0.95rem] font-semibold uppercase tracking-[0.06em] text-foreground transition hover:border-accent hover:text-accent';
$drop_link = 'flex items-center gap-2 rounded-sm px-3 py-2 text-sm font-semibold text-foreground transition hover:bg-surface hover:text-accent';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@500;600;700&family=Barlow:wght@400;500;600;700&family=Oswald:wght@500;600;700&family=Saira+Stencil+One&display=swap" rel="stylesheet">

    <style>
        body { font-family: "Barlow", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; }
        .font-heading { font-family: "Barlow Semi Condensed", "Barlow", system-ui, sans-serif; }
        .font-display { font-family: "Oswald", "Barlow Semi Condensed", Impact, sans-serif; font-weight: 600; letter-spacing: 0.01em; }
        .font-stencil { font-family: "Saira Stencil One", "Oswald", Impact, sans-serif; font-weight: 400; }
        html { scroll-behavior: smooth; }
    </style>

    <link rel="icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.svg'); ?>" type="image/svg+xml">

    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-background antialiased text-foreground'); ?>>
<?php wp_body_open(); ?>

<a href="#content" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-[60] focus:rounded-md focus:bg-background focus:px-4 focus:py-3 focus:text-sm focus:font-bold focus:text-foreground focus:shadow-lg">
    <?php esc_html_e('Skip to content', 'dawp'); ?>
</a>

<header id="site-header" class="relative z-50 border-b border-border-strong bg-background text-foreground" role="banner">
    <div class="flag-stripe" aria-hidden="true"></div>
    <div class="announcement-marquee">
        <div class="announcement-marquee__track">
            <?php for ($i = 0; $i < 2; $i++) : ?>
                <?php foreach ($announcements as $message) : ?>
                    <span class="announcement-marquee__item">
                        <span class="text-highlight" aria-hidden="true">★</span>
                        <?php echo esc_html($message); ?>
                    </span>
                <?php endforeach; ?>
            <?php endfor; ?>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex min-h-[72px] items-center justify-between gap-4 lg:min-h-20 xl:grid xl:grid-cols-[auto_1fr_auto] xl:gap-6">
            <a href="<?php echo esc_url($home_url); ?>" class="group inline-flex shrink-0 items-center gap-2.5 py-2" aria-label="<?php esc_attr_e('ProudlyWear home', 'dawp'); ?>">
                <svg class="h-11 w-10 shrink-0" viewBox="0 0 44 48" aria-hidden="true" focusable="false">
                    <defs><clipPath id="pw-shield-h"><path d="M22 2 41 8v14c0 11.5-7.8 20.6-19 24C10.8 42.6 3 33.5 3 22V8Z"/></clipPath></defs>
                    <g clip-path="url(#pw-shield-h)">
                        <rect width="44" height="48" fill="#0F1E33"/>
                        <rect y="27" width="44" height="4" fill="#B31942"/><rect y="35" width="44" height="4" fill="#B31942"/><rect y="43" width="44" height="5" fill="#B31942"/>
                        <rect y="31" width="44" height="4" fill="#F7F4EE"/><rect y="39" width="44" height="4" fill="#F7F4EE"/>
                    </g>
                    <path d="M22 2 41 8v14c0 11.5-7.8 20.6-19 24C10.8 42.6 3 33.5 3 22V8Z" fill="none" stroke="#C8A24A" stroke-width="2"/>
                    <path d="m22 8.5 2.6 5.3 5.8.8-4.2 4.1 1 5.8-5.2-2.7-5.2 2.7 1-5.8-4.2-4.1 5.8-.8Z" fill="#F7F4EE"/>
                </svg>
                <span class="flex flex-col leading-none">
                    <span class="font-display text-[1.6rem] uppercase leading-none tracking-wide text-foreground sm:text-[1.8rem]">Proudly<span class="text-accent">Wear</span></span>
                    <span class="mt-1 hidden text-[0.6rem] font-semibold uppercase tracking-[0.3em] text-muted sm:block"><?php esc_html_e('Proudly Served · Proudly Worn', 'dawp'); ?></span>
                </span>
            </a>

            <nav class="hidden items-center justify-center gap-1 xl:flex" aria-label="<?php esc_attr_e('Main store navigation', 'dawp'); ?>">
                <div class="group relative">
                    <a href="<?php echo esc_url($shop_url); ?>" class="<?php echo esc_attr($nav_link); ?>" aria-haspopup="true">
                        <?php esc_html_e('Shop', 'dawp'); ?><?php echo $chevron; ?>
                    </a>
                    <div class="invisible absolute left-0 top-full z-50 w-64 pt-2 opacity-0 transition group-focus-within:visible group-focus-within:opacity-100 group-hover:visible group-hover:opacity-100">
                        <ul class="rounded-md border border-border-strong border-t-[3px] border-t-accent bg-background p-2 shadow-card-hover">
                            <?php foreach ($product_links as $link) : ?>
                                <li><a href="<?php echo esc_url($link['url']); ?>" class="<?php echo esc_attr($drop_link); ?>"><?php echo esc_html($link['title']); ?></a></li>
                            <?php endforeach; ?>
                            <li class="mt-1 border-t border-border pt-1"><a href="<?php echo esc_url($shop_url); ?>" class="block rounded-sm px-3 py-2 text-sm font-bold text-accent transition hover:bg-surface"><?php esc_html_e('Shop all →', 'dawp'); ?></a></li>
                        </ul>
                    </div>
                </div>

                <div class="group relative">
                    <a href="<?php echo esc_url($shop_url); ?>" class="<?php echo esc_attr($nav_link); ?>" aria-haspopup="true">
                        <?php esc_html_e('By Branch', 'dawp'); ?><?php echo $chevron; ?>
                    </a>
                    <div class="invisible absolute left-0 top-full z-50 w-64 pt-2 opacity-0 transition group-focus-within:visible group-focus-within:opacity-100 group-hover:visible group-hover:opacity-100">
                        <ul class="rounded-md border border-border-strong border-t-[3px] border-t-accent bg-background p-2 shadow-card-hover">
                            <?php foreach ($branch_links as $link) : ?>
                                <li><a href="<?php echo esc_url($link['url']); ?>" class="<?php echo esc_attr($drop_link); ?>"><span class="text-[0.7rem] text-highlight" aria-hidden="true">★</span><?php echo esc_html($link['title']); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <?php foreach ($nav_items as $item) : ?>
                    <a href="<?php echo esc_url($item['url']); ?>" class="<?php echo esc_attr($nav_link); ?>">
                        <?php echo esc_html($item['title']); ?>
                    </a>
                <?php endforeach; ?>
            </nav>

            <div class="flex shrink-0 items-center gap-2">
                <div class="header-search hidden lg:block lg:w-56 xl:w-44">
                    <?php $render_search('header-product-search'); ?>
                </div>

                <button type="button" class="search-toggle inline-flex h-11 w-11 items-center justify-center rounded-md border border-border-strong text-foreground transition hover:border-foreground hover:bg-surface lg:hidden" aria-expanded="false" aria-label="<?php esc_attr_e('Search products', 'dawp'); ?>" aria-controls="mobile-search-panel">
                    <?php echo $search_icon; ?>
                </button>

                <a href="<?php echo esc_url($account_url); ?>" class="hidden h-11 w-11 items-center justify-center rounded-md border border-border-strong text-foreground transition hover:border-foreground hover:bg-surface md:inline-flex" aria-label="<?php esc_attr_e('My account', 'dawp'); ?>">
                    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M20 21a8 8 0 0 0-16 0"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </a>

                <a href="<?php echo esc_url($cart_url); ?>" class="xoo-wsc-cart-trigger relative inline-flex h-11 w-11 items-center justify-center rounded-md bg-accent text-background shadow-ink transition hover:translate-y-[1px] hover:bg-accent-hover hover:shadow-none" aria-label="<?php esc_attr_e('Shopping cart', 'dawp'); ?>">
                    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path>
                        <path d="M3 6h18"></path>
                        <path d="M16 10a4 4 0 0 1-8 0"></path>
                    </svg>
                    <?php echo function_exists('dawp_cart_count_badge_html') ? dawp_cart_count_badge_html($cart_count) : ''; ?>
                </a>

                <button type="button" class="menu-toggle inline-flex h-11 w-11 items-center justify-center rounded-md border border-border-strong text-foreground transition hover:border-foreground hover:bg-surface xl:hidden" aria-expanded="false" aria-label="<?php esc_attr_e('Open store menu', 'dawp'); ?>" aria-controls="mobile-store-menu">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="4" y1="7" x2="20" y2="7"></line>
                        <line x1="4" y1="12" x2="20" y2="12"></line>
                        <line x1="4" y1="17" x2="20" y2="17"></line>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile-search-panel" class="mobile-search-panel hidden border-t border-border-strong bg-surface lg:hidden">
        <div class="header-search mx-auto max-w-7xl px-4 py-3 sm:px-6">
            <?php $render_search('mobile-product-search'); ?>
        </div>
    </div>

    <div id="mobile-store-menu" class="main-navigation hidden max-h-[calc(100vh-110px)] overflow-y-auto border-t border-border-strong bg-background xl:hidden">
        <div class="mx-auto max-w-7xl px-4 py-5 sm:px-6">
            <nav class="grid gap-6 sm:grid-cols-2" aria-label="<?php esc_attr_e('Mobile store navigation', 'dawp'); ?>">
                <div>
                    <p class="font-display text-lg uppercase tracking-wide text-accent"><?php esc_html_e('Shop', 'dawp'); ?></p>
                    <ul class="mt-2 grid grid-cols-2 gap-x-3">
                        <?php foreach ($product_links as $link) : ?>
                            <li><a href="<?php echo esc_url($link['url']); ?>" class="flex min-h-11 items-center text-sm font-semibold text-foreground"><?php echo esc_html($link['title']); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div>
                    <p class="font-display text-lg uppercase tracking-wide text-accent"><?php esc_html_e('By Branch', 'dawp'); ?></p>
                    <ul class="mt-2 grid grid-cols-2 gap-x-3">
                        <?php foreach ($branch_links as $link) : ?>
                            <li><a href="<?php echo esc_url($link['url']); ?>" class="flex min-h-11 items-center text-sm font-semibold text-foreground"><?php echo esc_html($link['title']); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </nav>

            <div class="mt-5 flex flex-wrap gap-2 border-t border-border pt-5">
                <?php foreach ($nav_items as $item) : ?>
                    <a href="<?php echo esc_url($item['url']); ?>" class="inline-flex min-h-11 items-center rounded-md border border-border-strong px-4 font-heading text-sm font-semibold uppercase tracking-wider text-foreground transition hover:border-foreground hover:bg-surface"><?php echo esc_html($item['title']); ?></a>
                <?php endforeach; ?>
                <a href="<?php echo esc_url($account_url); ?>" class="inline-flex min-h-11 items-center rounded-md border border-border-strong px-4 font-heading text-sm font-semibold uppercase tracking-wider text-foreground transition hover:border-foreground hover:bg-surface"><?php esc_html_e('My Account', 'dawp'); ?></a>
            </div>

            <p class="mt-5 text-sm leading-6 text-foreground-muted">
                <?php
                echo wp_kses(
                    sprintf(
                        /* translators: %s: support email */
                        __('Need help? Email %s — we reply within 24 hours, Monday to Friday.', 'dawp'),
                        '<a class="font-bold text-accent underline" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>'
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
