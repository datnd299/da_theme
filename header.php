<?php
/**
 * Theme header — SlickTee.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email  = 'support@slicktee.com';
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

$product_links = [];
foreach (dawp_main_product_categories() as $slug => $title) {
    $product_links[] = ['title' => $title, 'url' => $cat_url($slug)];
}

$fandom_links = [
    ['title' => __('Anime', 'dawp'), 'url' => $cat_url('anime')],
    ['title' => __('Pokemon', 'dawp'), 'url' => $cat_url('pokemon')],
    ['title' => __('Cartoon & Animated', 'dawp'), 'url' => $cat_url('cartoon-animated')],
    ['title' => __('Game Art', 'dawp'), 'url' => $cat_url('game-art')],
    ['title' => __('Horror', 'dawp'), 'url' => $cat_url('horror')],
    ['title' => __('Marvel Comics', 'dawp'), 'url' => $cat_url('marvel-comics')],
    ['title' => __('Movies', 'dawp'), 'url' => $cat_url('movies')],
];

$nav_items = [
    ['title' => __('New Arrivals', 'dawp'), 'url' => $cat_url('new-arrivals')],
    ['title' => __('Best Sellers', 'dawp'), 'url' => $cat_url('best-seller')],
    ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/')],
    ['title' => __('FAQs', 'dawp'), 'url' => home_url('/faq/')],
];

$announcements = [
    __('Free shipping on orders over $49', 'dawp'),
    __('Worldwide shipping — tracking on every order', 'dawp'),
    __('Printed to order just for you', 'dawp'),
    __('Free replacement for misprints & damage', 'dawp'),
    __('Secure checkout — Visa, Mastercard, Amex, PayPal', 'dawp'),
];

// FiboSearch (AJAX autocomplete) — falls back to the native WP product search if the plugin is inactive
$has_fibo         = shortcode_exists('fibosearch');
$fibo_shortcode   = '[fibosearch layout="classic" style="solaris" submit_btn="1" mobile_overlay="0" darken_bg="0"]';
$search_icon      = '<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><path d="m16 16 4 4"></path></svg>';
$render_search    = static function ($id) use ($has_fibo, $fibo_shortcode, $search_icon) {
    if ($has_fibo) {
        echo do_shortcode($fibo_shortcode);
        return;
    }
    ?>
    <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="flex items-center rounded-[8px] border-2 border-[#17140F] bg-[#FFFFFF] px-3 py-1">
        <label class="sr-only" for="<?php echo esc_attr($id); ?>"><?php esc_html_e('Search products', 'dawp'); ?></label>
        <input id="<?php echo esc_attr($id); ?>" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search tees…', 'dawp'); ?>" class="min-h-9 w-full min-w-0 bg-transparent text-base text-[#17140F] lg:text-sm outline-none placeholder:text-[#6F665A]">
        <input type="hidden" name="post_type" value="product">
        <button type="submit" class="ml-1 inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-[4px] text-[#17140F] transition hover:bg-[#F2B33D]" aria-label="<?php esc_attr_e('Submit product search', 'dawp'); ?>"><?php echo $search_icon; ?></button>
    </form>
    <?php
};

if ($has_fibo) {
    add_filter('dgwt/wcas/labels', static function ($labels) {
        $labels['search_placeholder'] = __('Search tees…', 'dawp');
        return $labels;
    });
}

$chevron = '<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg>';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Archivo:wght@600;700;800;900&family=DM+Sans:opsz,wght@9..40,400;9..40,500;9..40,700&display=swap" rel="stylesheet">

    <style>
        body { font-family: "DM Sans", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; }
        .font-heading { font-family: "Archivo", "DM Sans", system-ui, sans-serif; }
        .font-display { font-family: "Anton", "Archivo", Impact, sans-serif; font-weight: 400; letter-spacing: 0.01em; }
        html { scroll-behavior: smooth; }
    </style>

    <link rel="icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.svg'); ?>" type="image/svg+xml">

    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-[#FBF7EF] antialiased text-[#17140F]'); ?>>
<?php wp_body_open(); ?>

<a href="#content" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-[60] focus:rounded-md focus:bg-[#FBF7EF] focus:px-4 focus:py-3 focus:text-sm focus:font-bold focus:text-[#17140F] focus:shadow-lg">
    <?php esc_html_e('Skip to content', 'dawp'); ?>
</a>

<header id="site-header" class="relative z-50 border-b-2 border-[#17140F] bg-[#FBF7EF] text-[#17140F]" role="banner">
    <div class="announcement-marquee">
        <div class="announcement-marquee__track">
            <?php for ($i = 0; $i < 2; $i++) : ?>
                <?php foreach ($announcements as $message) : ?>
                    <span class="announcement-marquee__item">
                        <span class="text-[#F2B33D]" aria-hidden="true">✦</span>
                        <?php echo esc_html($message); ?>
                    </span>
                <?php endforeach; ?>
            <?php endfor; ?>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex min-h-[72px] items-center justify-between gap-4 lg:min-h-20 xl:grid xl:grid-cols-[1fr_auto_1fr] xl:gap-4">
            <a href="<?php echo esc_url($home_url); ?>" class="site-logo group inline-flex shrink-0 items-center gap-2.5 py-2 xl:justify-self-start" aria-label="<?php esc_attr_e('SlickTee home', 'dawp'); ?>">
                <svg class="h-11 w-11 shrink-0 -rotate-6 drop-shadow-[3px_3px_0_#17140F] transition group-hover:rotate-0" viewBox="0 0 48 48" aria-hidden="true" focusable="false">
                    <path d="M16 5 7 9.5 2 19l8 4.5 2.5-3.5V43h23V20l2.5 3.5 8-4.5-5-9.5L32 5c-1.6 3.4-4.5 5.2-8 5.2S17.6 8.4 16 5Z" fill="#D7351E" stroke="#17140F" stroke-width="2.5" stroke-linejoin="round"/>
                    <text x="24" y="38" text-anchor="middle" class="font-display" font-size="22" fill="#FBF7EF">S</text>
                </svg>
                <span class="flex flex-col leading-none">
                    <span class="font-display text-[1.65rem] uppercase leading-none tracking-wide text-[#17140F] sm:text-3xl">Slick<span class="text-[#D7351E]">Tee</span></span>
                    <span class="mt-1 text-[0.6rem] font-bold uppercase tracking-[0.32em] text-[#6F665A]"><?php esc_html_e('Fan Art Merch', 'dawp'); ?></span>
                </span>
            </a>

            <nav class="hidden items-center gap-0.5 xl:flex" aria-label="<?php esc_attr_e('Main store navigation', 'dawp'); ?>">
                <div class="group relative">
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex items-center gap-1 rounded-[8px] px-3 py-2 text-sm font-bold uppercase tracking-wide text-[#17140F] transition hover:bg-[#F2B33D] xl:px-2" aria-haspopup="true">
                        <?php esc_html_e('Products', 'dawp'); ?><?php echo $chevron; ?>
                    </a>
                    <div class="invisible absolute left-0 top-full z-50 w-64 pt-2 opacity-0 transition group-focus-within:visible group-focus-within:opacity-100 group-hover:visible group-hover:opacity-100">
                        <ul class="rounded-[8px] border-2 border-[#17140F] bg-[#FBF7EF] p-2 shadow-[4px_4px_0_#17140F]">
                            <?php foreach ($product_links as $link) : ?>
                                <li><a href="<?php echo esc_url($link['url']); ?>" class="block rounded-[4px] px-3 py-2 text-sm font-semibold text-[#17140F] transition hover:bg-[#F4EDE0] hover:text-[#D7351E]"><?php echo esc_html($link['title']); ?></a></li>
                            <?php endforeach; ?>
                            <li class="mt-1 border-t border-[#E3D7C2] pt-1"><a href="<?php echo esc_url($shop_url); ?>" class="block rounded-[4px] px-3 py-2 text-sm font-bold text-[#D7351E] transition hover:bg-[#F4EDE0]"><?php esc_html_e('Shop all →', 'dawp'); ?></a></li>
                        </ul>
                    </div>
                </div>

                <div class="group relative">
                    <a href="<?php echo esc_url($cat_url('anime')); ?>" class="inline-flex items-center gap-1 rounded-[8px] px-3 py-2 text-sm font-bold uppercase tracking-wide text-[#17140F] transition hover:bg-[#F2B33D] xl:px-2" aria-haspopup="true">
                        <?php esc_html_e('Fandoms', 'dawp'); ?><?php echo $chevron; ?>
                    </a>
                    <div class="invisible absolute left-0 top-full z-50 w-60 pt-2 opacity-0 transition group-focus-within:visible group-focus-within:opacity-100 group-hover:visible group-hover:opacity-100">
                        <ul class="rounded-[8px] border-2 border-[#17140F] bg-[#FBF7EF] p-2 shadow-[4px_4px_0_#17140F]">
                            <?php foreach ($fandom_links as $link) : ?>
                                <li><a href="<?php echo esc_url($link['url']); ?>" class="block rounded-[4px] px-3 py-2 text-sm font-semibold text-[#17140F] transition hover:bg-[#F4EDE0] hover:text-[#D7351E]"><?php echo esc_html($link['title']); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <?php foreach ($nav_items as $item) : ?>
                    <a href="<?php echo esc_url($item['url']); ?>" class="rounded-[8px] px-3 py-2 text-sm font-bold uppercase tracking-wide text-[#17140F] transition hover:bg-[#F2B33D] xl:px-2">
                        <?php echo esc_html($item['title']); ?>
                    </a>
                <?php endforeach; ?>
            </nav>

            <div class="flex shrink-0 items-center gap-2 xl:justify-self-end">
                <div class="header-search hidden lg:block lg:w-56 xl:w-40">
                    <?php $render_search('header-product-search'); ?>
                </div>

                <button type="button" class="search-toggle inline-flex h-11 w-11 items-center justify-center rounded-[8px] border-2 border-[#17140F] text-[#17140F] transition hover:bg-[#F2B33D] lg:hidden" aria-expanded="false" aria-label="<?php esc_attr_e('Search products', 'dawp'); ?>" aria-controls="mobile-search-panel">
                    <?php echo $search_icon; ?>
                </button>

                <a href="<?php echo esc_url($account_url); ?>" class="hidden h-11 w-11 items-center justify-center rounded-[8px] border-2 border-[#17140F] text-[#17140F] transition hover:bg-[#F2B33D] md:inline-flex" aria-label="<?php esc_attr_e('My account', 'dawp'); ?>">
                    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M20 21a8 8 0 0 0-16 0"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </a>

                <a href="<?php echo esc_url($cart_url); ?>" class="xoo-wsc-cart-trigger relative inline-flex h-11 w-11 items-center justify-center rounded-[8px] border-2 border-[#17140F] bg-[#D7351E] text-[#FFFFFF] shadow-[3px_3px_0_#17140F] transition hover:translate-x-[1px] hover:translate-y-[1px] hover:bg-[#B32813] hover:shadow-[2px_2px_0_#17140F]" aria-label="<?php esc_attr_e('Shopping cart', 'dawp'); ?>">
                    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path>
                        <path d="M3 6h18"></path>
                        <path d="M16 10a4 4 0 0 1-8 0"></path>
                    </svg>
                    <?php echo function_exists('dawp_cart_count_badge_html') ? dawp_cart_count_badge_html($cart_count) : ''; ?>
                </a>

                <button type="button" class="menu-toggle inline-flex h-11 w-11 items-center justify-center rounded-[8px] border-2 border-[#17140F] text-[#17140F] transition hover:bg-[#F2B33D] xl:hidden" aria-expanded="false" aria-label="<?php esc_attr_e('Open store menu', 'dawp'); ?>" aria-controls="mobile-store-menu">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="4" y1="7" x2="20" y2="7"></line>
                        <line x1="4" y1="12" x2="20" y2="12"></line>
                        <line x1="4" y1="17" x2="20" y2="17"></line>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile-search-panel" class="mobile-search-panel hidden border-t-2 border-[#17140F] bg-[#F4EDE0] lg:hidden">
        <div class="header-search mx-auto max-w-7xl px-4 py-3 sm:px-6">
            <?php $render_search('mobile-product-search'); ?>
        </div>
    </div>

    <div id="mobile-store-menu" class="main-navigation hidden max-h-[calc(100vh-110px)] overflow-y-auto border-t-2 border-[#17140F] bg-[#FBF7EF] xl:hidden">
        <div class="mx-auto max-w-7xl px-4 py-5 sm:px-6">
            <nav class="grid gap-6 sm:grid-cols-2" aria-label="<?php esc_attr_e('Mobile store navigation', 'dawp'); ?>">
                <div>
                    <p class="font-display text-xl uppercase text-[#D7351E]"><?php esc_html_e('Products', 'dawp'); ?></p>
                    <ul class="mt-2 grid grid-cols-2 gap-x-3">
                        <?php foreach ($product_links as $link) : ?>
                            <li><a href="<?php echo esc_url($link['url']); ?>" class="flex min-h-11 items-center text-sm font-semibold text-[#17140F]"><?php echo esc_html($link['title']); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div>
                    <p class="font-display text-xl uppercase text-[#D7351E]"><?php esc_html_e('Fandoms', 'dawp'); ?></p>
                    <ul class="mt-2 grid grid-cols-2 gap-x-3">
                        <?php foreach ($fandom_links as $link) : ?>
                            <li><a href="<?php echo esc_url($link['url']); ?>" class="flex min-h-11 items-center text-sm font-semibold text-[#17140F]"><?php echo esc_html($link['title']); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </nav>

            <div class="mt-5 flex flex-wrap gap-2 border-t border-[#E3D7C2] pt-5">
                <?php foreach ($nav_items as $item) : ?>
                    <a href="<?php echo esc_url($item['url']); ?>" class="inline-flex min-h-11 items-center rounded-[999px] border-2 border-[#17140F] px-4 text-xs font-bold uppercase tracking-wide text-[#17140F] transition hover:bg-[#F2B33D]"><?php echo esc_html($item['title']); ?></a>
                <?php endforeach; ?>
                <a href="<?php echo esc_url($account_url); ?>" class="inline-flex min-h-11 items-center rounded-[999px] border-2 border-[#17140F] px-4 text-xs font-bold uppercase tracking-wide text-[#17140F] transition hover:bg-[#F2B33D]"><?php esc_html_e('My Account', 'dawp'); ?></a>
            </div>

            <p class="mt-5 text-sm leading-6 text-[#4A4339]">
                <?php
                echo wp_kses(
                    sprintf(
                        /* translators: %s: support email */
                        __('Need help? Email %s — we reply within 24 hours.', 'dawp'),
                        '<a class="font-bold text-[#D7351E] underline" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>'
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
