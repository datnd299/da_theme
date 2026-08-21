<?php
/**
 * Site header — announcement bar, centred wordmark, navigation, collections mega menu.
 */

defined('ABSPATH') || exit;

$dawp_menu_items = dawp_main_menu_items();
$dawp_mega       = dawp_megamenu_sections();
$dawp_collections = dawp_collections();

$dawp_account_id  = function_exists('wc_get_page_id') ? wc_get_page_id('myaccount') : 0;
$dawp_account_url = $dawp_account_id > 0 ? get_permalink($dawp_account_id) : home_url('/my-account/');
$dawp_cart_url    = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$dawp_cart_count  = (function_exists('WC') && WC() && WC()->cart) ? WC()->cart->get_cart_contents_count() : 0;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-background text-foreground font-sans antialiased'); ?>>
<?php wp_body_open(); ?>

<a class="sr-only focus:not-sr-only focus:absolute focus:z-[100] focus:m-4 focus:bg-ink focus:px-4 focus:py-2 focus:text-on-ink" href="#content"><?php esc_html_e('Skip to content', 'dawp'); ?></a>

<!-- Announcement -->
<div class="bg-ink text-on-ink-muted">
    <div class="container flex items-center justify-center gap-6 py-2.5 text-center">
        <p class="m-0 text-eyebrow font-medium uppercase tracking-wide">
            <?php esc_html_e('Complimentary insured shipping', 'dawp'); ?>
            <span class="hidden sm:inline">
                <span class="mx-3 text-accent" aria-hidden="true">&middot;</span>
                <?php esc_html_e('Five-year movement warranty', 'dawp'); ?>
            </span>
        </p>
    </div>
</div>

<header id="masthead" class="sticky top-0 z-50 border-b border-border bg-background/95 backdrop-blur transition-shadow duration-400 ease-fluid">

    <!-- Row 1 — utilities, wordmark, account & cart -->
    <div class="container">
        <div class="grid h-16 grid-cols-[1fr_auto_1fr] items-center gap-4 lg:h-24">

            <div class="flex items-center gap-1 justify-self-start">
                <button id="c-mobile-toggle" type="button" class="-ml-3 inline-flex h-11 w-11 items-center justify-center text-foreground lg:hidden" aria-expanded="false" aria-controls="c-mobile-menu" aria-label="<?php esc_attr_e('Open menu', 'dawp'); ?>">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M3 6h18M3 12h18M3 18h18"/></svg>
                </button>
                <button id="c-search-toggle" type="button" class="inline-flex h-11 w-11 items-center justify-center text-foreground transition-colors duration-400 ease-fluid hover:text-accent-deep" aria-expanded="false" aria-controls="c-search-panel" aria-label="<?php esc_attr_e('Search watches', 'dawp'); ?>">
                    <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="M20 20l-3.5-3.5"/></svg>
                </button>
            </div>

            <a href="<?php echo esc_url(home_url('/')); ?>" class="justify-self-center" aria-label="<?php echo esc_attr(get_bloginfo('name') ?: 'CHRONEL'); ?>">
                <img src="<?php echo esc_url(dawp_asset_uri('assets/img/chronel_logo_black.png')); ?>" alt="<?php esc_attr_e('CHRONEL', 'dawp'); ?>" width="536" height="166" class="c-logo" fetchpriority="high" decoding="async">
            </a>

            <div class="flex items-center justify-self-end">
                <a href="<?php echo esc_url($dawp_account_url); ?>" class="hidden h-11 w-11 items-center justify-center text-foreground transition-colors duration-400 ease-fluid hover:text-accent-deep sm:inline-flex" aria-label="<?php esc_attr_e('My account', 'dawp'); ?>">
                    <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><circle cx="12" cy="8" r="4"/><path d="M4.5 20a7.5 7.5 0 0 1 15 0"/></svg>
                </a>
                <a href="<?php echo esc_url($dawp_cart_url); ?>" class="relative -mr-3 inline-flex h-11 w-11 items-center justify-center text-foreground transition-colors duration-400 ease-fluid hover:text-accent-deep" aria-label="<?php esc_attr_e('Cart', 'dawp'); ?>" aria-controls="c-cart-drawer" aria-expanded="false" data-cart-toggle>
                    <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M6 7h12l-1.2 12.2a2 2 0 0 1-2 1.8H9.2a2 2 0 0 1-2-1.8z"/><path d="M9 9V6a3 3 0 0 1 6 0v3"/></svg>
                    <span class="absolute right-1 top-1.5 min-w-[17px] rounded-pill bg-accent px-1 text-center text-[10px] font-medium leading-[17px] text-background" data-cart-count <?php echo $dawp_cart_count > 0 ? '' : 'hidden'; ?>><?php echo esc_html($dawp_cart_count); ?></span>
                </a>
            </div>
        </div>
    </div>

    <!-- Row 2 — primary navigation (desktop) -->
    <nav class="hidden border-t border-border lg:block" aria-label="<?php esc_attr_e('Primary', 'dawp'); ?>">
        <div class="container">
            <ul class="m-0 flex list-none items-center justify-center gap-12 p-0">
                <?php foreach ($dawp_menu_items as $item) :
                    $is_current = dawp_is_current_url($item['url']);
                    ?>
                    <li class="group static">
                        <a href="<?php echo esc_url($item['url']); ?>"
                           class="relative block py-4 text-eyebrow font-medium uppercase tracking-wide transition-colors duration-400 ease-fluid <?php echo $is_current ? 'text-accent-deep' : 'text-foreground hover:text-accent-deep'; ?>"
                           <?php echo $is_current ? 'aria-current="page"' : ''; ?>>
                            <?php echo esc_html($item['title']); ?>
                            <span class="pointer-events-none absolute inset-x-0 bottom-3 h-px origin-left scale-x-0 bg-accent transition-transform duration-400 ease-fluid group-hover:scale-x-100 <?php echo $is_current ? 'scale-x-100' : ''; ?>" aria-hidden="true"></span>
                        </a>

                        <?php if (!empty($item['megamenu'])) : ?>
                            <div class="invisible absolute inset-x-0 top-full z-40 border-b border-border bg-surface opacity-0 shadow-card-hover transition-[opacity,visibility] duration-400 ease-fluid group-hover:visible group-hover:opacity-100 group-focus-within:visible group-focus-within:opacity-100">
                                <div class="container grid grid-cols-[1fr_260px] gap-16 py-12">

                                    <div>
                                        <p class="c-eyebrow"><?php echo esc_html($dawp_mega[0]['title']); ?></p>
                                        <ul class="m-0 grid list-none grid-cols-4 gap-8 p-0">
                                            <?php foreach ($dawp_mega[0]['links'] as $link) : ?>
                                                <li>
                                                    <a class="group/card block" href="<?php echo esc_url($link['url']); ?>">
                                                        <span class="mb-4 block overflow-hidden border border-border bg-surface-alt">
                                                            <img src="<?php echo esc_url(dawp_asset_uri($link['image'])); ?>" alt="" width="896" height="1200" loading="lazy" decoding="async" class="h-48 w-full object-cover transition-transform duration-700 ease-fluid group-hover/card:scale-105">
                                                        </span>
                                                        <span class="block font-heading text-h3 leading-none text-foreground"><?php echo esc_html($link['title']); ?></span>
                                                        <span class="mt-2 block text-caption text-foreground-muted"><?php echo esc_html($link['description']); ?></span>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>

                                    <div class="border-l border-border pl-12">
                                        <p class="c-eyebrow"><?php echo esc_html($dawp_mega[1]['title']); ?></p>
                                        <ul class="m-0 list-none space-y-5 p-0">
                                            <?php foreach ($dawp_mega[1]['links'] as $link) : ?>
                                                <li>
                                                    <a class="block text-foreground transition-colors duration-400 ease-fluid hover:text-accent-deep" href="<?php echo esc_url($link['url']); ?>">
                                                        <span class="block text-body-sm"><?php echo esc_html($link['title']); ?></span>
                                                        <span class="block text-caption text-foreground-muted"><?php echo esc_html($link['description']); ?></span>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </nav>

    <!-- Search panel -->
    <div id="c-search-panel" class="hidden border-t border-border bg-surface">
        <div class="container py-8">
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="mx-auto flex max-w-2xl items-center gap-3">
                <input type="hidden" name="post_type" value="product">
                <label class="sr-only" for="c-search-input"><?php esc_html_e('Search watches', 'dawp'); ?></label>
                <input id="c-search-input" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search by reference or collection', 'dawp'); ?>" class="c-field flex-1" autocomplete="off">
                <button type="submit" class="c-btn"><?php esc_html_e('Search', 'dawp'); ?></button>
            </form>
        </div>
    </div>

    <!-- Mobile menu -->
    <div id="c-mobile-menu" class="hidden max-h-[calc(100dvh-6rem)] overflow-y-auto border-t border-border bg-surface lg:hidden">
        <nav class="container py-6" aria-label="<?php esc_attr_e('Mobile', 'dawp'); ?>">
            <ul class="m-0 list-none divide-y divide-border p-0">
                <?php foreach ($dawp_menu_items as $item) : ?>
                    <li>
                        <a class="flex min-h-[52px] items-center justify-between py-3 text-body text-foreground" href="<?php echo esc_url($item['url']); ?>">
                            <?php echo esc_html($item['title']); ?>
                            <svg class="h-4 w-4 text-muted" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M9 6l6 6-6 6"/></svg>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <p class="c-eyebrow mt-8"><?php esc_html_e('The Collections', 'dawp'); ?></p>
            <ul class="m-0 grid list-none grid-cols-2 gap-4 p-0">
                <?php foreach ($dawp_collections as $collection) : ?>
                    <li>
                        <a class="block overflow-hidden border border-border bg-surface-alt pb-3 text-center" href="<?php echo esc_url(dawp_product_category_url($collection['slug'])); ?>">
                            <img src="<?php echo esc_url(dawp_asset_uri($collection['image'])); ?>" alt="" width="896" height="1200" loading="lazy" decoding="async" class="h-32 w-full object-cover">
                            <span class="mt-3 block font-heading text-h3 leading-none text-foreground"><?php echo esc_html($collection['name']); ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <ul class="m-0 mt-8 list-none space-y-4 border-t border-border p-0 pt-6 text-body-sm">
                <li><a class="text-foreground-muted" href="<?php echo esc_url(home_url('/shop/')); ?>"><?php esc_html_e('All Watches', 'dawp'); ?></a></li>
                <li><a class="text-foreground-muted" href="<?php echo esc_url($dawp_account_url); ?>"><?php esc_html_e('My Account', 'dawp'); ?></a></li>
                <li><a class="text-foreground-muted" href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track Your Order', 'dawp'); ?></a></li>
            </ul>
        </nav>
    </div>
</header>

<!-- Side cart — the mini-cart markup inside .widget_shopping_cart_content is
     replaced wholesale by WooCommerce fragments, so it carries no classes of
     its own; it is styled through .side-cart in assets/css/main.css. -->
<div id="c-cart-drawer" class="fixed inset-0 z-[60] hidden" role="dialog" aria-modal="true" aria-labelledby="c-cart-drawer-title">

    <div class="absolute inset-0 bg-ink/50 opacity-0 transition-opacity duration-400 ease-fluid" data-cart-overlay></div>

    <div class="absolute inset-y-0 right-0 flex w-full max-w-[26rem] translate-x-full flex-col bg-background shadow-ink transition-transform duration-400 ease-fluid" data-cart-panel>

        <div class="flex items-center justify-between gap-4 border-b border-border px-5 py-3 lg:px-6">
            <p id="c-cart-drawer-title" class="c-eyebrow m-0"><?php esc_html_e('Your selection', 'dawp'); ?></p>
            <button type="button" class="-mr-3 inline-flex h-11 w-11 items-center justify-center text-foreground transition-colors duration-400 ease-fluid hover:text-accent-deep" aria-label="<?php esc_attr_e('Close cart', 'dawp'); ?>" data-cart-close>
                <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M6 6l12 12M18 6L6 18"/></svg>
            </button>
        </div>

        <p class="side-cart__notice" data-cart-notice hidden></p>

        <div class="side-cart flex min-h-0 flex-1 flex-col px-5 lg:px-6">

            <div class="widget_shopping_cart_content" <?php echo $dawp_cart_count > 0 ? '' : 'hidden'; ?>>
                <?php if (function_exists('woocommerce_mini_cart')) { woocommerce_mini_cart(); } ?>
            </div>

            <div class="side-cart__empty" data-cart-empty <?php echo $dawp_cart_count > 0 ? 'hidden' : ''; ?>>
                <span class="c-rule c-rule--center" aria-hidden="true"></span>
                <p class="c-eyebrow"><?php esc_html_e('Nothing selected', 'dawp'); ?></p>
                <h2><?php esc_html_e('Your cart is empty.', 'dawp'); ?></h2>
                <p><?php esc_html_e('Four collections, each built on the same Japanese automatic calibre. Take your time.', 'dawp'); ?></p>
                <a class="c-btn" href="<?php echo esc_url(home_url('/collections/')); ?>"><?php esc_html_e('The collections', 'dawp'); ?></a>
                <a class="c-btn-ghost" href="<?php echo esc_url(home_url('/shop/')); ?>"><?php esc_html_e('All watches', 'dawp'); ?></a>
            </div>

        </div>

        <p class="m-0 border-t border-border bg-surface-alt px-5 py-3 text-center text-caption text-foreground-muted lg:px-6">
            <?php esc_html_e('Complimentary insured shipping', 'dawp'); ?>
            <span class="mx-2 text-accent" aria-hidden="true">&middot;</span><?php esc_html_e('30-day returns', 'dawp'); ?>
        </p>

    </div>
</div>

<div id="content">
