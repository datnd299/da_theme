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
$logo_url = get_template_directory_uri() . '/assets/img/gallery/logo.png';
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
        .font-heading { font-family: "Plus Jakarta Sans", "Inter", sans-serif; }
        html { scroll-behavior: smooth; }
    </style>

    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-white antialiased'); ?>>
<?php wp_body_open(); ?>

<header id="masthead" class="sticky top-0 z-50 border-b border-border bg-white/95 shadow-sm backdrop-blur" role="banner">
    <div class="bg-navy">
        <div class="mx-auto flex max-w-7xl items-center justify-center px-4 py-2 text-center text-sm font-semibold leading-6 text-white sm:px-6 lg:px-8">
            <?php esc_html_e('Activewear essentials made for movement, comfort, and daily training.', 'dawp'); ?>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex min-h-24 items-center justify-between gap-4">
            <a href="<?php echo esc_url($home_url); ?>" class="flex min-w-0 items-center" aria-label="<?php esc_attr_e('UK Official Store home', 'dawp'); ?>">
                <img
                    src="<?php echo esc_url($logo_url); ?>"
                    alt="<?php esc_attr_e('UK Official Store', 'dawp'); ?>"
                    width="96"
                    height="96"
                    class="block h-14 w-14 object-contain sm:h-16 sm:w-16"
                    decoding="async"
                    fetchpriority="high"
                >
            </a>

            <nav class="hidden items-center gap-10 lg:flex" aria-label="<?php esc_attr_e('Main navigation', 'dawp'); ?>">
                <?php foreach ($nav_items as $item) : ?>
                    <?php if (strcasecmp($item['title'], __('Shop', 'dawp')) === 0) : ?>
                        <div class="group relative py-8">
                            <a href="<?php echo esc_url($item['url']); ?>" class="flex items-center gap-1 whitespace-nowrap text-base font-semibold text-foreground transition hover:text-blue">
                                <?php echo esc_html($item['title']); ?>
                                <svg class="transition-transform group-hover:rotate-180" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m6 9 6 6 6-6"></path>
                                </svg>
                            </a>
                            <div class="invisible absolute left-1/2 top-full z-50 w-screen max-w-3xl -translate-x-1/2 pt-4 opacity-0 transition-all duration-300 group-hover:visible group-hover:opacity-100">
                                <div class="overflow-hidden rounded-[2rem] border border-border bg-white p-2 shadow-2xl">
                                    <div class="flex">
                                        <!-- Categories Column -->
                                        <div class="w-1/2 p-8">
                                            <h3 class="mb-6 text-[11px] font-extrabold uppercase tracking-[0.2em] text-foreground-muted/60"><?php esc_html_e('Product Categories', 'dawp'); ?></h3>
                                            <ul class="grid gap-3">
                                                <?php
                                                $categories = function_exists('dawp_shop_category_items') ? dawp_shop_category_items() : [];
                                                foreach ($categories as $cat) : ?>
                                                    <li>
                                                        <a href="<?php echo esc_url($cat['url']); ?>" class="group/item flex items-center justify-between rounded-2xl bg-surface-alt/50 px-5 py-4 text-base font-bold text-navy transition-all hover:bg-navy hover:text-white">
                                                            <span class="flex items-center gap-4">
                                                                <span class="flex h-2 w-2 rounded-full bg-blue transition-transform group-hover/item:scale-125"></span>
                                                                <?php echo esc_html($cat['title']); ?>
                                                            </span>
                                                            <svg class="opacity-0 transition-all -translate-x-4 group-hover/item:opacity-100 group-hover/item:translate-x-0" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                                                <path d="M5 12h14m-7-7 7 7-7 7"></path>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>

                                        <!-- Featured Column -->
                                        <div class="w-1/2 p-2">
                                            <div class="relative flex h-full flex-col justify-end overflow-hidden rounded-[1.5rem] bg-navy px-8 py-10 text-white shadow-inner">
                                                <?php $featured_img = get_template_directory_uri() . '/assets/img/hero_activewear_lifestyle.png'; ?>
                                                <img src="<?php echo esc_url($featured_img); ?>" alt="<?php esc_attr_e('Featured activewear', 'dawp'); ?>" class="absolute inset-0 h-full w-full object-cover opacity-60 transition-transform duration-700 group-hover:scale-110">
                                                <div class="absolute inset-0 bg-gradient-to-t from-navy via-navy/40 to-transparent"></div>
                                                
                                                <div class="relative z-10">
                                                    <div class="mb-4 inline-flex items-center rounded-full bg-blue px-3 py-1 text-[10px] font-black uppercase tracking-widest text-white shadow-lg">
                                                        <?php esc_html_e('Featured Collection', 'dawp'); ?>
                                                    </div>
                                                    <h3 class="text-2xl font-extrabold leading-tight tracking-tight"><?php esc_html_e('New Arrivals & Dry-Fit Essentials', 'dawp'); ?></h3>
                                                    <p class="mt-3 text-sm font-medium leading-relaxed text-white/80"><?php esc_html_e('Engineered for movement, comfort, and daily training.', 'dawp'); ?></p>
                                                    
                                                    <a href="<?php echo esc_url($shop_url); ?>" class="group/btn mt-8 inline-flex h-12 items-center justify-center rounded-xl bg-white px-6 text-sm font-bold text-navy transition-all hover:bg-blue hover:text-white">
                                                        <?php esc_html_e('Shop All Collection', 'dawp'); ?>
                                                        <svg class="ml-2 transition-transform group-hover/btn:translate-x-1" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M5 12h14m-7-7 7 7-7 7"></path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <a href="<?php echo esc_url($item['url']); ?>" class="whitespace-nowrap text-base font-semibold text-foreground transition hover:text-blue">
                            <?php echo esc_html($item['title']); ?>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </nav>

            <div class="flex shrink-0 items-center gap-3">
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="hidden items-center rounded-full border border-border bg-surface-alt px-5 py-3 lg:flex">
                    <label for="header-product-search" class="sr-only"><?php esc_html_e('Search products', 'dawp'); ?></label>
                    <input id="header-product-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search activewear', 'dawp'); ?>" class="w-44 bg-transparent text-base text-foreground outline-none placeholder:text-foreground-muted">
                    <input type="hidden" name="post_type" value="product">
                    <button type="submit" class="ml-2 text-navy transition hover:text-blue" aria-label="<?php esc_attr_e('Submit search', 'dawp'); ?>">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.35-4.35"></path>
                        </svg>
                    </button>
                </form>

                <a href="<?php echo esc_url($account_url); ?>" class="hidden h-12 w-12 items-center justify-center rounded-full border border-border text-navy transition hover:bg-surface-alt sm:inline-flex" aria-label="<?php esc_attr_e('My account', 'dawp'); ?>">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M20 21a8 8 0 0 0-16 0"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </a>

                <a href="<?php echo esc_url($cart_url); ?>" class="relative inline-flex h-12 w-12 items-center justify-center rounded-full bg-navy text-white transition hover:bg-blue" aria-label="<?php esc_attr_e('Cart', 'dawp'); ?>">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="8" cy="21" r="1"></circle>
                        <circle cx="19" cy="21" r="1"></circle>
                        <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>
                    </svg>
                    <?php if ($cart_count > 0) : ?>
                        <span class="absolute -right-1 -top-1 flex h-6 min-w-6 items-center justify-center rounded-full bg-blue px-1 text-xs font-bold text-white"><?php echo esc_html($cart_count); ?></span>
                    <?php endif; ?>
                </a>

                <button type="button" class="inline-flex h-12 w-12 items-center justify-center rounded-full border border-border text-navy transition hover:bg-surface-alt lg:hidden" aria-expanded="false" aria-label="<?php esc_attr_e('Open menu', 'dawp'); ?>" aria-controls="mobile-menu" onclick="const menu=document.getElementById('mobile-menu'); const expanded=this.getAttribute('aria-expanded')==='true'; this.setAttribute('aria-expanded', String(!expanded)); menu.classList.toggle('hidden');">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile-menu" class="hidden border-t border-border bg-white lg:hidden">
        <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6">
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="mb-4 flex items-center rounded-full border border-border bg-surface-alt px-5 py-4">
                <label for="mobile-product-search" class="sr-only"><?php esc_html_e('Search products', 'dawp'); ?></label>
                <input id="mobile-product-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search activewear', 'dawp'); ?>" class="flex-1 bg-transparent text-base text-foreground outline-none placeholder:text-foreground-muted">
                <input type="hidden" name="post_type" value="product">
                <button type="submit" class="text-navy" aria-label="<?php esc_attr_e('Submit search', 'dawp'); ?>">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.35-4.35"></path>
                    </svg>
                </button>
            </form>
            <nav class="grid gap-1" aria-label="<?php esc_attr_e('Mobile navigation', 'dawp'); ?>">
                <?php foreach ($nav_items as $item) : ?>
                    <?php if (strcasecmp($item['title'], __('Shop', 'dawp')) === 0) : ?>
                        <div class="grid gap-1">
                            <button type="button" class="flex w-full items-center justify-between rounded-2xl px-4 py-4 text-left text-base font-semibold text-foreground transition hover:bg-surface-alt hover:text-blue" onclick="document.getElementById('mobile-shop-categories').classList.toggle('hidden'); this.querySelector('svg').classList.toggle('rotate-180');">
                                <?php echo esc_html($item['title']); ?>
                                <svg class="transition-transform" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m6 9 6 6 6-6"></path>
                                </svg>
                            </button>
                            <div id="mobile-shop-categories" class="hidden overflow-hidden pl-4 pr-2">
                                <div class="grid gap-1 py-1">
                                    <a href="<?php echo esc_url($shop_url); ?>" class="rounded-xl px-4 py-3 text-base font-semibold text-foreground/70 transition hover:bg-surface-alt hover:text-blue">
                                        <?php esc_html_e('Shop All', 'dawp'); ?>
                                    </a>
                                    <?php foreach ($categories as $cat) : ?>
                                        <a href="<?php echo esc_url($cat['url']); ?>" class="rounded-xl px-4 py-3 text-base font-semibold text-foreground/70 transition hover:bg-surface-alt hover:text-blue">
                                            <?php echo esc_html($cat['title']); ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <a href="<?php echo esc_url($item['url']); ?>" class="rounded-2xl px-4 py-4 text-base font-semibold text-foreground transition hover:bg-surface-alt hover:text-blue">
                            <?php echo esc_html($item['title']); ?>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
                <a href="<?php echo esc_url($account_url); ?>" class="mt-2 inline-flex min-h-14 items-center justify-center rounded-full border border-border px-5 text-base font-bold text-navy transition hover:bg-surface-alt">
                    <?php esc_html_e('My Account', 'dawp'); ?>
                </a>
            </nav>
        </div>
    </div>
</header>

<div id="content" class="site-content">
