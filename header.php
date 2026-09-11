<?php
/**
 * Site header- Watchfavor.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$dawp_nav_cat_url = static function ($slug) {
    if (function_exists('dawp_product_category_url')) {
        return dawp_product_category_url($slug);
    }
    return home_url('/product-category/' . trim($slug, '/') . '/');
};

$dawp_collections = function_exists('dawp_lbq_product_categories') ? dawp_lbq_product_categories() : [];

$dawp_cart_count = (function_exists('WC') && WC()->cart) ? WC()->cart->get_cart_contents_count() : 0;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,500&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main-content"><?php esc_html_e('Skip to content', 'dawp'); ?></a>

<!-- Tailwind safelist: assets/js/main.js toggles these classes at runtime
     (mobile nav + collections megamenu) but never writes them into a PHP
     source file the build scanner reads, so they'd otherwise be purged. -->
<!-- tw-safelist: overflow-hidden rotate-180 -->

<header id="site-header" class="sticky top-0 z-40 border-b border-line bg-background/95 backdrop-blur transition-shadow duration-normal ease-fluid">
    <div class="mx-auto flex h-20 max-w-[1280px] items-center justify-between gap-4 px-4 sm:px-6 lg:px-8">

        <button type="button" class="menu-toggle inline-flex h-10 w-10 items-center justify-center text-primary lg:hidden" aria-expanded="false" aria-controls="primary-navigation" aria-label="<?php esc_attr_e('Open menu', 'dawp'); ?>">
            <svg class="menu-icon-open" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M3 6h18M3 12h18M3 18h18"/></svg>
            <svg class="menu-icon-close hidden" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M6 6l12 12M18 6L6 18"/></svg>
        </button>

        <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center" aria-label="<?php echo esc_attr(dawp_store_name()); ?> <?php esc_attr_e('home', 'dawp'); ?>">
            <img src="<?php echo esc_url(get_theme_file_uri('assets/img/logo_wfavor.png')); ?>" alt="<?php echo esc_attr(dawp_store_name()); ?>" class="h-10 w-auto invert sm:h-12" width="1344" height="752">
        </a>

        <nav id="primary-navigation" class="main-navigation fixed inset-x-0 top-20 z-30 hidden max-h-[calc(100vh-5rem)] flex-col gap-1 overflow-y-auto border-b border-line bg-background px-6 py-6 lg:static lg:top-auto lg:z-auto lg:flex lg:max-h-none lg:flex-row lg:items-center lg:gap-10 lg:overflow-visible lg:border-0 lg:bg-transparent lg:p-0" aria-label="<?php esc_attr_e('Primary', 'dawp'); ?>">
            <div class="group relative border-b border-line py-1 lg:border-0 lg:py-0">
                <button type="button" class="collections-trigger flex w-full items-center justify-between gap-1 py-3 font-heading text-sm font-medium uppercase tracking-label text-foreground transition hover:text-accent lg:w-auto lg:justify-start lg:py-0" data-menu-toggle aria-expanded="false" aria-controls="collections-menu">
                    <?php esc_html_e('Collections', 'dawp'); ?>
                    <svg class="chevron h-2.5 w-2.5 shrink-0 transition-transform duration-normal" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
                </button>
                <?php if (!empty($dawp_collections)) : ?>
                <div id="collections-menu" class="hidden pb-3 lg:absolute lg:left-1/2 lg:top-full lg:mt-3 lg:block lg:w-[600px] lg:-translate-x-1/2 lg:pb-0 lg:opacity-0 lg:pointer-events-none lg:shadow-card-hover lg:transition lg:duration-normal lg:ease-fluid lg:group-hover:opacity-100 lg:group-hover:pointer-events-auto lg:group-focus-within:opacity-100 lg:group-focus-within:pointer-events-auto">
                    <div class="flex flex-col gap-1 lg:border lg:border-line lg:bg-surface lg:p-6">
                        <div class="grid gap-1 lg:grid-cols-3 lg:gap-6">
                            <?php foreach ($dawp_collections as $slug => $cat) : ?>
                                <a href="<?php echo esc_url($dawp_nav_cat_url($slug)); ?>" class="flex items-center gap-3 rounded-md px-2 py-2 transition hover:bg-surface-alt lg:flex-col lg:items-start lg:gap-0 lg:rounded-none lg:p-0 lg:text-left lg:hover:bg-transparent">
                                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-accent-soft lg:h-12 lg:w-12">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--color-accent-hover)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="<?php echo esc_attr($cat['icon'] ?? 'M12 4a8 8 0 100 16 8 8 0 000-16z'); ?>"/></svg>
                                    </span>
                                    <span class="lg:mt-4">
                                        <span class="block font-heading text-sm font-semibold text-primary"><?php echo esc_html($cat['name']); ?></span>
                                        <span class="mt-0.5 block text-xs leading-5 text-muted lg:mt-1.5"><?php echo esc_html($cat['short']); ?></span>
                                    </span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                        <a href="<?php echo esc_url($shop_url); ?>" class="mt-2 inline-flex items-center gap-1.5 border-t border-line px-2 py-3 font-heading text-xs font-semibold uppercase tracking-button text-accent-hover transition hover:text-primary lg:mt-6 lg:px-0 lg:pb-0 lg:pt-5">
                            <?php esc_html_e('Shop All Watches', 'dawp'); ?>
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                        </a>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <a href="<?php echo esc_url(home_url('/about-us/')); ?>" class="block border-b border-line py-3 font-heading text-sm font-medium uppercase tracking-label text-foreground transition hover:text-accent lg:border-0 lg:py-0"><?php esc_html_e('About Us', 'dawp'); ?></a>
            <a href="<?php echo esc_url(home_url('/faq/')); ?>" class="block border-b border-line py-3 font-heading text-sm font-medium uppercase tracking-label text-foreground transition hover:text-accent lg:border-0 lg:py-0"><?php esc_html_e('FAQ', 'dawp'); ?></a>
            <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="block border-b border-line py-3 font-heading text-sm font-medium uppercase tracking-label text-foreground transition hover:text-accent lg:border-0 lg:py-0"><?php esc_html_e('Contact Us', 'dawp'); ?></a>

            <a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="mt-4 inline-flex min-h-11 items-center justify-center border border-primary px-5 font-heading text-xs font-semibold uppercase tracking-button text-primary transition hover:bg-primary hover:text-white lg:hidden">
                <?php esc_html_e('Track Order', 'dawp'); ?>
            </a>
        </nav>

        <div id="nav-backdrop" class="fixed inset-0 z-20 hidden bg-primary/40 lg:hidden"></div>

        <div class="flex items-center gap-4 sm:gap-5">
            <a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="hidden font-heading text-xs font-semibold uppercase tracking-button text-foreground-muted transition hover:text-accent lg:inline-flex">
                <?php esc_html_e('Track Order', 'dawp'); ?>
            </a>

            <?php if (function_exists('wc_get_page_permalink')) : ?>
            <a href="#" class="xoo-wsc-cart-trigger relative flex h-10 w-10 items-center justify-center text-primary transition hover:text-accent" aria-label="<?php esc_attr_e('Open cart', 'dawp'); ?>">
                <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 7h13l-1.2 9.6A2 2 0 0 1 15.8 18H8.2a2 2 0 0 1-2-1.4L4 4H2"/><circle cx="9" cy="21" r="1"/><circle cx="17" cy="21" r="1"/></svg>
                <?php echo dawp_cart_count_badge_html($dawp_cart_count); ?>
            </a>
            <?php endif; ?>
        </div>
    </div>
</header>
