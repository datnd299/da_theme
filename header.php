<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700;900&family=Inter:wght@400;500;700;800;900&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-white text-[#2D2633] antialiased'); ?>>
<?php wp_body_open(); ?>

<?php
$cart_count  = function_exists('WC') && WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
$cart_url    = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$account_url = get_permalink(get_option('woocommerce_myaccount_page_id')) ?: home_url('/my-account/');

$nav_items = [
    ['title' => __('Home', 'dawp'), 'url' => home_url('/')],
    ['title' => __('Shop', 'dawp'), 'url' => home_url('/shop/')],
    ['title' => __('About', 'dawp'), 'url' => home_url('/about-us/')],
    ['title' => __('Contact', 'dawp'), 'url' => home_url('/contact-us/')],
];
?>

<header id="masthead" class="sticky top-0 z-50 border-b border-[#E5E7EB] bg-white text-[#2D2633] shadow-sm" role="banner">
    <div class="bg-[#EAF7F0]">
        <div class="mx-auto flex max-w-7xl flex-col items-center justify-center gap-1 px-4 py-2 text-center text-xs font-black uppercase tracking-[0.18em] text-[#2D2633] sm:flex-row sm:px-6 lg:px-8">
            <span><?php esc_html_e('Beauty essentials for simple everyday confidence', 'dawp'); ?></span>
            <span class="hidden text-[#6B6470] sm:inline"><?php esc_html_e('|', 'dawp'); ?></span>
            <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>" class="text-[#6B6470] transition hover:text-[#2D2633]">
                <?php esc_html_e('Tracking included on shipped orders', 'dawp'); ?>
            </a>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-20 items-center justify-between gap-4">
            <a href="<?php echo esc_url(home_url('/')); ?>"
               class="group inline-flex shrink-0 items-center gap-3"
               aria-label="<?php echo esc_attr(get_bloginfo('name') ?: 'One Shop Vibe'); ?>">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/Oneshopvibe/image.png'); ?>" alt="<?php esc_attr_e('One Shop Vibe', 'dawp'); ?>" class="h-12 w-auto">
            </a>

            <nav class="hidden flex-1 items-center justify-center gap-5 lg:flex xl:gap-7" aria-label="<?php esc_attr_e('Primary navigation', 'dawp'); ?>">
                <?php foreach ($nav_items as $item) : ?>
                    <a href="<?php echo esc_url($item['url']); ?>"
                       class="whitespace-nowrap text-sm font-black uppercase tracking-wide text-[#2D2633] transition hover:text-[#6B6470]">
                        <?php echo esc_html($item['title']); ?>
                    </a>
                <?php endforeach; ?>
            </nav>

            <div class="flex shrink-0 items-center gap-2 sm:gap-3">
                <form role="search"
                      method="get"
                      action="<?php echo esc_url(home_url('/')); ?>"
                      class="hidden items-center sm:flex">
                    <label for="osv-header-search" class="sr-only">
                        <?php esc_html_e('Search products', 'dawp'); ?>
                    </label>
                    <input id="osv-header-search"
                           type="search"
                           name="s"
                           placeholder="<?php esc_attr_e('Search beauty tools', 'dawp'); ?>"
                           class="h-10 w-44 rounded-full border border-[#E5E7EB] bg-[#F6F7F9] px-4 text-sm text-[#2D2633] placeholder:text-[#6B6470] outline-none transition focus:border-[#DCD5FF] focus:bg-white focus:ring-2 focus:ring-[#DCD5FF]">
                    <input type="hidden" name="post_type" value="product">
                </form>

                <button type="button"
                        class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-[#E5E7EB] text-[#2D2633] transition hover:bg-[#EAF7F0] sm:hidden"
                        aria-label="<?php esc_attr_e('Search', 'dawp'); ?>"
                        onclick="document.getElementById('osv-mobile-search').classList.toggle('hidden')">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="M21 21l-4.35-4.35"></path>
                    </svg>
                </button>

                <a href="<?php echo esc_url($account_url); ?>"
                   class="hidden h-10 w-10 items-center justify-center rounded-full border border-[#E5E7EB] text-[#2D2633] transition hover:bg-[#EAF7F0] sm:inline-flex"
                   aria-label="<?php esc_attr_e('My Account', 'dawp'); ?>">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </a>

                <a href="<?php echo esc_url($cart_url); ?>"
                   class="relative inline-flex min-h-10 items-center justify-center rounded-full bg-[#2D2633] px-4 text-xs font-black uppercase tracking-wide text-white transition hover:bg-[#F7C948] hover:text-[#2D2633]"
                   aria-label="<?php esc_attr_e('Shopping Cart', 'dawp'); ?>">
                    <?php esc_html_e('Bag', 'dawp'); ?>
                    <span class="ml-1">(<?php echo esc_html($cart_count); ?>)</span>
                </a>

                <button type="button"
                        class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-[#E5E7EB] text-[#2D2633] transition hover:bg-[#EAF7F0] lg:hidden"
                        aria-label="<?php esc_attr_e('Open menu', 'dawp'); ?>"
                        onclick="document.getElementById('osv-mobile-menu').classList.toggle('hidden')">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="osv-mobile-search" class="hidden border-t border-[#E5E7EB] bg-white sm:hidden">
        <form role="search"
              method="get"
              action="<?php echo esc_url(home_url('/')); ?>"
              class="mx-auto flex max-w-7xl items-center gap-2 px-4 py-3">
            <input type="search"
                   name="s"
                   placeholder="<?php esc_attr_e('Search beauty essentials...', 'dawp'); ?>"
                   autofocus
                   class="h-10 flex-1 rounded-full border border-[#E5E7EB] bg-[#F6F7F9] px-4 text-sm text-[#2D2633] placeholder:text-[#6B6470] outline-none focus:border-[#DCD5FF] focus:bg-white focus:ring-2 focus:ring-[#DCD5FF]">
            <input type="hidden" name="post_type" value="product">
            <button type="submit"
                    class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#2D2633] text-white transition hover:bg-[#F7C948] hover:text-[#2D2633]"
                    aria-label="<?php esc_attr_e('Submit search', 'dawp'); ?>">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="M21 21l-4.35-4.35"></path>
                </svg>
            </button>
        </form>
    </div>

    <div id="osv-mobile-menu" class="hidden border-t border-[#E5E7EB] bg-white lg:hidden">
        <nav class="mx-auto grid max-w-7xl gap-1 px-4 py-4 sm:px-6" aria-label="<?php esc_attr_e('Mobile navigation', 'dawp'); ?>">
            <?php foreach ($nav_items as $item) : ?>
                <a href="<?php echo esc_url($item['url']); ?>"
                   class="rounded-2xl px-4 py-3 text-sm font-black uppercase tracking-wide text-[#2D2633] transition hover:bg-[#EAF7F0]">
                    <?php echo esc_html($item['title']); ?>
                </a>
            <?php endforeach; ?>
        </nav>
    </div>
</header>

<div id="content" class="site-content">
