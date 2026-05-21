<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800;900&family=Manrope:wght@400;600;700;800&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-white text-[#111827] antialiased'); ?>>
<?php wp_body_open(); ?>

<?php
$cart_count  = function_exists('WC') && WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
$cart_url    = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$account_url = get_permalink(get_option('woocommerce_myaccount_page_id')) ?: home_url('/my-account/');
$brand_name  = 'Tizezap';
$tizezap_gallery_uri = get_theme_file_uri('/assets/img/gallery/Tizezap/');
$shop_url    = function_exists('wc_get_page_id') && wc_get_page_id('shop') > 0
    ? get_permalink(wc_get_page_id('shop'))
    : home_url('/shop/');

$term_url = static function ($slug) {
    return function_exists('dawp_product_category_url')
        ? dawp_product_category_url($slug)
        : home_url('/product-category/' . sanitize_title($slug) . '/');
};

$mega_categories = [
    [
        'title' => __('All-Season Tires', 'dawp'),
        'copy'  => __('Practical tire options for year-round everyday driving.', 'dawp'),
        'url'   => $term_url('all-season-tires'),
    ],
    [
        'title' => __('SUV & Crossover Tires', 'dawp'),
        'copy'  => __('For SUVs, crossovers, family vehicles, and daily road use.', 'dawp'),
        'url'   => $term_url('suv-crossover-tires'),
    ],
    [
        'title' => __('Light Truck Tires', 'dawp'),
        'copy'  => __('For pickups, utility driving, and light-duty hauling needs.', 'dawp'),
        'url'   => $term_url('light-truck-tires'),
    ],
    [
        'title' => __('Performance Tires', 'dawp'),
        'copy'  => __('Responsive handling and performance-inspired road feel.', 'dawp'),
        'url'   => $term_url('performance-tires'),
    ],
    [
        'title' => __('Trailer Tires', 'dawp'),
        'copy'  => __('Road-ready tire options for trailers and towing support.', 'dawp'),
        'url'   => $term_url('trailer-tires'),
    ],
    [
        'title' => __('Winter Tires', 'dawp'),
        'copy'  => __('Cold-weather tire options for winter road conditions.', 'dawp'),
        'url'   => $term_url('winter-tires'),
    ],
];

$shop_filter_links = [
    ['title' => __('Shop By Rim Size', 'dawp'), 'url' => home_url('/shop-by-rim-size/')],
    ['title' => __('Shop By Vehicle Type', 'dawp'), 'url' => home_url('/shop-by-vehicle-type/')],
    ['title' => __('Shop By Brand', 'dawp'), 'url' => home_url('/shop-by-brand/')],
];

$best_seller_feature = [
    'title' => __('Best Seller: All-Season Tires', 'dawp'),
    'copy'  => __('A practical starting point for everyday commuters comparing comfort, fitment, and year-round road use.', 'dawp'),
    'url'   => $term_url('all-season-tires'),
    'image' => $tizezap_gallery_uri . 'all-season-tread.png',
];

$nav_items = [
    ['title' => __('Home', 'dawp'), 'url' => home_url('/')],
    ['title' => __('Shop', 'dawp'), 'url' => $shop_url, 'mega' => true],
    ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/')],
    ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/')],
];
?>

<header id="masthead" class="sticky top-0 z-50 border-b border-[#E5E7EB] bg-white text-[#111827] shadow-sm" role="banner">
    <div class="bg-[#0B1F33] text-white">
        <div class="mx-auto flex max-w-7xl flex-col items-center justify-between gap-2 px-4 py-2 text-center text-xs font-black uppercase tracking-[0.16em] sm:flex-row sm:px-6 lg:px-8">
            <span><?php esc_html_e('Reliable tires for everyday driving', 'dawp'); ?></span>
            <a href="<?php echo esc_url(home_url('/shipping-returns/')); ?>" class="text-[#93C5FD] transition hover:text-white">
                <?php esc_html_e('Processing 2-4 business days | Tracking included', 'dawp'); ?>
            </a>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-24 items-center justify-between gap-4">
            <a href="<?php echo esc_url(home_url('/')); ?>"
               class="group inline-flex shrink-0 items-center gap-3"
               aria-label="<?php echo esc_attr($brand_name); ?>">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Logo_header.png'); ?>"
                     alt="<?php echo esc_attr($brand_name); ?>"
                     class="h-20 w-auto">
            </a>

            <nav class="hidden flex-1 items-center justify-center gap-5 lg:flex xl:gap-7" aria-label="<?php esc_attr_e('Primary navigation', 'dawp'); ?>">
                <?php foreach ($nav_items as $item) : ?>
                    <?php if (! empty($item['mega'])) : ?>
                        <div class="group/menu">
                            <a href="<?php echo esc_url($item['url']); ?>"
                               class="inline-flex h-24 items-center gap-1 whitespace-nowrap text-sm font-black uppercase tracking-wide text-[#111827] transition hover:text-[#2563EB] focus:text-[#2563EB] focus:outline-none">
                                <?php echo esc_html($item['title']); ?>
                                <svg class="h-4 w-4 transition group-hover/menu:rotate-180" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="m6 9 6 6 6-6"></path>
                                </svg>
                            </a>

                            <div class="invisible absolute left-1/2 top-full w-[min(1040px,calc(100vw-32px))] -translate-x-1/2 translate-y-3 opacity-0 transition duration-200 group-hover/menu:visible group-hover/menu:translate-y-0 group-hover/menu:opacity-100 group-focus-within/menu:visible group-focus-within/menu:translate-y-0 group-focus-within/menu:opacity-100">
                                <div class="overflow-hidden rounded-lg border border-[#D7DEE8] bg-white text-left shadow-xl">
                                    <div class="grid grid-cols-[minmax(0,1.45fr)_minmax(280px,0.75fr)] gap-0">
                                        <div class="p-6">
                                            <div class="flex items-end justify-between gap-5 border-b border-[#E5E7EB] pb-5">
                                                <div>
                                                    <p class="text-xs font-black uppercase tracking-[0.18em] text-[#F97316]">
                                                        <?php esc_html_e('Shop Tires', 'dawp'); ?>
                                                    </p>
                                                    <h2 class="mt-2 font-heading text-2xl font-black leading-tight text-[#0B1F33]">
                                                        <?php esc_html_e('Browse by tire category', 'dawp'); ?>
                                                    </h2>
                                                </div>
                                                <a href="<?php echo esc_url($shop_url); ?>"
                                                   class="shrink-0 rounded-md border border-[#2563EB] px-4 py-2 text-xs font-black uppercase tracking-wide text-[#2563EB] transition hover:bg-[#EFF6FF]">
                                                    <?php esc_html_e('View All', 'dawp'); ?>
                                                </a>
                                            </div>

                                            <div class="mt-5 grid grid-cols-2 gap-3">
                                                <?php foreach ($mega_categories as $category) : ?>
                                                    <a href="<?php echo esc_url($category['url']); ?>"
                                                       class="group/category rounded-md border border-[#E5E7EB] bg-[#F4F6F8] p-4 transition hover:border-[#2563EB] hover:bg-white hover:shadow-sm">
                                                        <span class="flex items-center justify-between gap-3">
                                                            <span class="text-sm font-black text-[#0B1F33] group-hover/category:text-[#2563EB]">
                                                                <?php echo esc_html($category['title']); ?>
                                                            </span>
                                                            <svg class="h-4 w-4 shrink-0 text-[#F97316]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                                <path d="M5 12h14"></path>
                                                                <path d="m12 5 7 7-7 7"></path>
                                                            </svg>
                                                        </span>
                                                        <span class="mt-2 block text-xs font-medium leading-5 text-[#5B6472]">
                                                            <?php echo esc_html($category['copy']); ?>
                                                        </span>
                                                    </a>
                                                <?php endforeach; ?>
                                            </div>

                                            <div class="mt-5 grid grid-cols-3 gap-2 border-t border-[#E5E7EB] pt-5">
                                                <?php foreach ($shop_filter_links as $link) : ?>
                                                    <a href="<?php echo esc_url($link['url']); ?>"
                                                       class="rounded-md bg-[#EFF6FF] px-3 py-2 text-center text-xs font-black uppercase tracking-wide text-[#0B1F33] transition hover:bg-[#2563EB] hover:text-white">
                                                        <?php echo esc_html($link['title']); ?>
                                                    </a>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>

                                        <a href="<?php echo esc_url($best_seller_feature['url']); ?>"
                                           class="group/feature relative block min-h-[420px] overflow-hidden bg-[#0B1F33] text-white">
                                            <img src="<?php echo esc_url($best_seller_feature['image']); ?>"
                                                 alt="<?php echo esc_attr($best_seller_feature['title']); ?>"
                                                 class="absolute inset-0 h-full w-full object-cover transition duration-300 group-hover/feature:scale-[1.03]"
                                                 loading="lazy">
                                            <span class="absolute inset-0 bg-[#0B1F33]/78"></span>
                                            <span class="relative flex h-full min-h-[420px] flex-col justify-end p-6">
                                                <span class="mb-3 inline-flex w-fit rounded-md bg-[#F97316] px-3 py-1.5 text-xs font-black uppercase tracking-[0.16em] text-white">
                                                    <?php esc_html_e('Best Seller', 'dawp'); ?>
                                                </span>
                                                <span class="font-heading text-3xl font-black leading-tight">
                                                    <?php echo esc_html($best_seller_feature['title']); ?>
                                                </span>
                                                <span class="mt-3 text-sm font-medium leading-6 text-[#D7DEE8]">
                                                    <?php echo esc_html($best_seller_feature['copy']); ?>
                                                </span>
                                                <span class="mt-5 inline-flex items-center gap-2 text-sm font-black uppercase tracking-wide text-[#FDBA74]">
                                                    <?php esc_html_e('Shop Best Seller', 'dawp'); ?>
                                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                        <path d="M5 12h14"></path>
                                                        <path d="m12 5 7 7-7 7"></path>
                                                    </svg>
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <a href="<?php echo esc_url($item['url']); ?>"
                           class="whitespace-nowrap text-sm font-black uppercase tracking-wide text-[#111827] transition hover:text-[#2563EB]">
                            <?php echo esc_html($item['title']); ?>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </nav>

            <div class="flex shrink-0 items-center gap-2 sm:gap-3">
                <form role="search"
                      method="get"
                      action="<?php echo esc_url(home_url('/')); ?>"
                      class="hidden items-center xl:flex">
                    <label for="tizezap-header-search" class="sr-only">
                        <?php esc_html_e('Search tires', 'dawp'); ?>
                    </label>
                    <input id="tizezap-header-search"
                           type="search"
                           name="s"
                           placeholder="<?php esc_attr_e('Search tire size...', 'dawp'); ?>"
                           class="h-10 w-48 rounded-md border border-[#E5E7EB] bg-[#F4F6F8] px-4 text-sm text-[#111827] placeholder:text-[#6B7280] outline-none transition focus:border-[#2563EB] focus:bg-white focus:ring-2 focus:ring-[#2563EB]/20">
                    <input type="hidden" name="post_type" value="product">
                </form>

                <button type="button"
                        id="tizezap-mobile-search-toggle"
                        class="inline-flex h-10 w-10 items-center justify-center rounded-md border border-[#E5E7EB] text-[#0B1F33] transition hover:bg-[#F4F6F8] xl:hidden"
                        aria-label="<?php esc_attr_e('Search', 'dawp'); ?>"
                        aria-controls="tizezap-mobile-search"
                        aria-expanded="false">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="M21 21l-4.35-4.35"></path>
                    </svg>
                </button>

                <a href="<?php echo esc_url($account_url); ?>"
                   class="hidden h-10 w-10 items-center justify-center rounded-md border border-[#E5E7EB] text-[#0B1F33] transition hover:bg-[#F4F6F8] sm:inline-flex"
                   aria-label="<?php esc_attr_e('My Account', 'dawp'); ?>">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </a>

                <a href="<?php echo esc_url($cart_url); ?>"
                   class="relative inline-flex min-h-10 items-center justify-center rounded-md bg-[#2563EB] px-4 text-xs font-black uppercase tracking-wide text-white transition hover:bg-[#0B1F33]"
                   aria-label="<?php esc_attr_e('Shopping Cart', 'dawp'); ?>">
                    <?php esc_html_e('Cart', 'dawp'); ?>
                    <span class="ml-1">(<?php echo esc_html($cart_count); ?>)</span>
                </a>

                <button type="button"
                        id="tizezap-mobile-menu-toggle"
                        class="inline-flex h-10 w-10 items-center justify-center rounded-md border border-[#E5E7EB] text-[#0B1F33] transition hover:bg-[#F4F6F8] lg:hidden"
                        aria-label="<?php esc_attr_e('Open menu', 'dawp'); ?>"
                        aria-controls="tizezap-mobile-menu"
                        aria-expanded="false">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="tizezap-mobile-search" class="hidden border-t border-[#E5E7EB] bg-white xl:hidden">
        <form role="search"
              method="get"
              action="<?php echo esc_url(home_url('/')); ?>"
              class="mx-auto flex max-w-7xl items-center gap-2 px-4 py-3">
            <input type="search"
                   name="s"
                   placeholder="<?php esc_attr_e('Search tires, size, or category...', 'dawp'); ?>"
                   class="h-10 flex-1 rounded-md border border-[#E5E7EB] bg-[#F4F6F8] px-4 text-sm text-[#111827] placeholder:text-[#6B7280] outline-none focus:border-[#2563EB] focus:bg-white focus:ring-2 focus:ring-[#2563EB]/20">
            <input type="hidden" name="post_type" value="product">
            <button type="submit"
                    class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-md bg-[#2563EB] text-white transition hover:bg-[#0B1F33]"
                    aria-label="<?php esc_attr_e('Submit search', 'dawp'); ?>">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="M21 21l-4.35-4.35"></path>
                </svg>
            </button>
        </form>
    </div>

    <div id="tizezap-mobile-menu" class="hidden border-t border-[#E5E7EB] bg-white lg:hidden">
        <nav class="mx-auto grid max-w-7xl gap-1 px-4 py-4 sm:px-6" aria-label="<?php esc_attr_e('Mobile navigation', 'dawp'); ?>">
            <?php foreach ($nav_items as $item) : ?>
                <a href="<?php echo esc_url($item['url']); ?>"
                   class="rounded-md px-4 py-3 text-sm font-black uppercase tracking-wide text-[#0B1F33] transition hover:bg-[#F4F6F8] hover:text-[#2563EB]">
                    <?php echo esc_html($item['title']); ?>
                </a>
                <?php if (! empty($item['mega'])) : ?>
                    <div class="grid gap-2 rounded-lg bg-[#F4F6F8] p-3">
                        <?php foreach ($mega_categories as $category) : ?>
                            <a href="<?php echo esc_url($category['url']); ?>"
                               class="rounded-md bg-white px-4 py-3 text-sm font-bold text-[#0B1F33] transition hover:text-[#2563EB]">
                                <?php echo esc_html($category['title']); ?>
                            </a>
                        <?php endforeach; ?>
                        <a href="<?php echo esc_url($best_seller_feature['url']); ?>"
                           class="overflow-hidden rounded-md bg-[#0B1F33] text-white">
                            <img src="<?php echo esc_url($best_seller_feature['image']); ?>"
                                 alt="<?php echo esc_attr($best_seller_feature['title']); ?>"
                                 class="aspect-[16/8] w-full object-cover opacity-80"
                                 loading="lazy">
                            <span class="block p-4">
                                <span class="text-xs font-black uppercase tracking-[0.16em] text-[#FDBA74]">
                                    <?php esc_html_e('Best Seller', 'dawp'); ?>
                                </span>
                                <span class="mt-1 block text-base font-black">
                                    <?php echo esc_html($best_seller_feature['title']); ?>
                                </span>
                            </span>
                        </a>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </nav>
    </div>
</header>

<div id="content" class="site-content">
