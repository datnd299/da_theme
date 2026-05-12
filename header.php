<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@600;700;800;900&family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-white text-slickText font-body antialiased'); ?>>
<?php wp_body_open(); ?>

<?php
$cart_count  = function_exists('WC') && WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
$cart_url    = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$account_url = get_permalink(get_option('woocommerce_myaccount_page_id'));

$nav_items = function_exists('dawp_main_menu_items') ? dawp_main_menu_items() : [];

if (empty($nav_items)) {
    $nav_items = [
        [
            'title' => 'New Arrivals',
            'url'   => home_url('/shop/'),
        ],
        [
            'title' => 'Graphic Tees',
            'url'   => home_url('/product-category/graphic-tees/'),
        ],
        [
            'title' => 'Oversized Tees',
            'url'   => home_url('/product-category/oversized-tees/'),
        ],
        [
            'title' => 'Hoodies',
            'url'   => home_url('/product-category/casual-hoodies/'),
        ],
        [
            'title' => 'Essentials',
            'url'   => home_url('/product-category/streetwear-essentials/'),
        ],
    ];
}
?>

<!-- HEADER -->
<header id="masthead" class="sticky top-0 z-50 bg-slickBlack text-white shadow-lg shadow-black/20" role="banner">

    <!-- Announcement Bar -->
    <div class="border-b border-white/10 bg-slickGreen">
        <div class="mx-auto flex max-w-[1480px] items-center justify-center px-4 py-2 text-center text-xs font-black uppercase tracking-[0.18em] text-slickLime sm:px-6 lg:px-8">
            <?php esc_html_e('New streetwear drops are live • Clean fits for everyday rotation', 'dawp'); ?>
        </div>
    </div>

    <!-- Main Header -->
    <div class="mx-auto max-w-[1480px] px-4 sm:px-6 lg:px-8 2xl:px-10">
        <div class="flex h-20 items-center justify-between gap-4 xl:gap-6">

            <!-- Logo -->
            <a href="<?php echo esc_url(home_url('/')); ?>"
               class="shrink-0"
               aria-label="<?php bloginfo('name'); ?>">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/slicktee.png'); ?>"
                     alt="<?php bloginfo('name'); ?>"
                     class="h-11 w-auto"
                     width="190"
                     height="44">
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden flex-1 items-center justify-center gap-4 xl:gap-6 2xl:gap-7 lg:flex" aria-label="<?php esc_attr_e('Primary navigation', 'dawp'); ?>">
                <?php foreach ($nav_items as $item) : ?>
                    <a href="<?php echo esc_url($item['url']); ?>"
                       class="whitespace-nowrap text-sm font-black uppercase tracking-wide text-white/82 transition hover:text-slickLime">
                        <?php echo esc_html($item['title']); ?>
                    </a>
                <?php endforeach; ?>
            </nav>

            <!-- Header Actions -->
            <div class="flex shrink-0 items-center gap-3 sm:gap-4">

                <!-- Desktop Search -->
                <form role="search"
                      method="get"
                      action="<?php echo esc_url(home_url('/')); ?>"
                      class="hidden items-center sm:flex">

                    <label for="slicktee-header-search" class="sr-only">
                        <?php esc_html_e('Search products', 'dawp'); ?>
                    </label>

                    <input id="slicktee-header-search"
                           type="search"
                           name="s"
                           placeholder="<?php esc_attr_e('Search', 'dawp'); ?>"
                           class="h-10 w-36 rounded-md border border-white/10 bg-white/10 px-3 text-sm text-white placeholder:text-white/55 outline-none transition focus:border-slickActive focus:bg-white/15 lg:w-44">

                    <input type="hidden" name="post_type" value="product">
                </form>

                <!-- Mobile Search Icon -->
                <button type="button"
                        class="inline-flex h-10 w-10 items-center justify-center rounded-md border border-white/10 text-white/85 transition hover:border-slickActive hover:text-slickLime sm:hidden"
                        aria-label="<?php esc_attr_e('Search', 'dawp'); ?>"
                        onclick="document.getElementById('slicktee-mobile-search').classList.toggle('hidden')">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="M21 21l-4.35-4.35"></path>
                    </svg>
                </button>

                <!-- Account -->
                <a href="<?php echo esc_url($account_url); ?>"
                   class="hidden h-10 w-10 items-center justify-center rounded-md border border-white/10 text-white/85 transition hover:border-slickActive hover:text-slickLime sm:inline-flex"
                   aria-label="<?php esc_attr_e('My Account', 'dawp'); ?>">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </a>

                <!-- Cart -->
                <a href="<?php echo esc_url($cart_url); ?>"
                   class="relative inline-flex min-h-10 items-center justify-center rounded-md bg-slickActive px-4 text-xs font-black uppercase tracking-wide text-slickBlack transition hover:bg-slickLime"
                   aria-label="<?php esc_attr_e('Shopping Cart', 'dawp'); ?>">
                    <?php esc_html_e('Bag', 'dawp'); ?>
                    <span class="ml-1">(<?php echo esc_html($cart_count); ?>)</span>
                </a>

                <!-- Mobile Menu Button -->
                <button type="button"
                        class="inline-flex h-10 w-10 items-center justify-center rounded-md border border-white/10 text-white/85 transition hover:border-slickActive hover:text-slickLime lg:hidden"
                        aria-label="<?php esc_attr_e('Open menu', 'dawp'); ?>"
                        onclick="document.getElementById('slicktee-mobile-menu').classList.toggle('hidden')">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>

            </div>
        </div>
    </div>

    <!-- Mobile Search Bar -->
    <div id="slicktee-mobile-search" class="hidden border-t border-white/10 bg-slickBlack sm:hidden">
        <form role="search"
              method="get"
              action="<?php echo esc_url(home_url('/')); ?>"
              class="mx-auto flex max-w-7xl items-center gap-2 px-4 py-3">
            <input type="search"
                   name="s"
                   placeholder="<?php esc_attr_e('Search products...', 'dawp'); ?>"
                   autofocus
                   class="h-10 flex-1 rounded-md border border-white/10 bg-white/10 px-3 text-sm text-white placeholder:text-white/55 outline-none focus:border-slickActive focus:bg-white/15">
            <input type="hidden" name="post_type" value="product">
            <button type="submit"
                    class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-md bg-slickActive text-slickBlack transition hover:bg-slickLime"
                    aria-label="<?php esc_attr_e('Submit search', 'dawp'); ?>">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                     stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="M21 21l-4.35-4.35"></path>
                </svg>
            </button>
        </form>
    </div>

    <!-- Mobile Navigation -->
    <div id="slicktee-mobile-menu" class="hidden border-t border-white/10 bg-slickBlack lg:hidden">
        <nav class="mx-auto grid max-w-7xl gap-1 px-4 py-4 sm:px-6" aria-label="<?php esc_attr_e('Mobile navigation', 'dawp'); ?>">
            <?php foreach ($nav_items as $item) : ?>
                <a href="<?php echo esc_url($item['url']); ?>"
                   class="rounded-md px-3 py-3 text-sm font-black uppercase tracking-wide text-white/82 transition hover:bg-white/10 hover:text-slickLime">
                    <?php echo esc_html($item['title']); ?>
                </a>
            <?php endforeach; ?>
        </nav>
    </div>

</header>

<div id="content" class="site-content">
