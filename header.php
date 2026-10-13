<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-white text-[#111827] antialiased'); ?>>
<?php wp_body_open(); ?>

<?php
$cart_count  = function_exists('WC') && WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
$cart_url    = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$account_url = get_permalink(get_option('woocommerce_myaccount_page_id')) ?: home_url('/my-account/');
$brand_name  = 'Mytire';
$shop_url    = function_exists('wc_get_page_id') && wc_get_page_id('shop') > 0
    ? get_permalink(wc_get_page_id('shop'))
    : home_url('/shop/');
$blog_category = get_category_by_slug('blog');
$blog_url      = $blog_category ? get_category_link($blog_category) : home_url('/category/blog/');

$term_url = static function ($slug) {
    return function_exists('dawp_product_category_url')
        ? dawp_product_category_url($slug)
        : home_url('/product-category/' . sanitize_title($slug) . '/');
};

$mega_categories = [
    ['title' => __('All-Season Tires', 'dawp'), 'copy' => __('Everyday comfort and balanced year-round value.', 'dawp'), 'url' => $term_url('all-season-tires')],
    ['title' => __('SUV & Crossover Tires', 'dawp'), 'copy' => __('Confident options for family vehicles and daily road use.', 'dawp'), 'url' => $term_url('suv-crossover-tires')],
    ['title' => __('Light Truck Tires', 'dawp'), 'copy' => __('Built for pickups, utility driving, and light-duty hauling.', 'dawp'), 'url' => $term_url('light-truck-tires')],
    ['title' => __('Performance Tires', 'dawp'), 'copy' => __('Responsive tire choices for sharper handling.', 'dawp'), 'url' => $term_url('performance-tires')],
    ['title' => __('Trailer Tires', 'dawp'), 'copy' => __('Road-ready support for trailers and towing needs.', 'dawp'), 'url' => $term_url('trailer-tires')],
    ['title' => __('Winter Tires', 'dawp'), 'copy' => __('Cold-weather choices for seasonal grip.', 'dawp'), 'url' => $term_url('winter-tires')],
];

$shop_filter_links = [
    ['title' => __('By Rim Size', 'dawp'), 'url' => home_url('/shop-by-rim-size/')],
    ['title' => __('By Vehicle Type', 'dawp'), 'url' => home_url('/shop-by-vehicle-type/')],
    ['title' => __('By Brand', 'dawp'), 'url' => home_url('/shop-by-brand/')],
];

$nav_items = [
    ['title' => __('Home', 'dawp'), 'url' => home_url('/')],
    ['title' => __('Shop', 'dawp'), 'url' => $shop_url, 'mega' => true],
    ['title' => __('Blog', 'dawp'), 'url' => $blog_url],
    ['title' => __('About', 'dawp'), 'url' => home_url('/about-us/')],
    ['title' => __('Contact', 'dawp'), 'url' => home_url('/contact-us/')],
];
?>

<header id="masthead" class="sticky top-0 z-50 border-b border-[#d9d9d9] bg-white font-sans text-[#111111]" role="banner">
    <div class="dawp-header-topbar" style="background-color: #373230; color: #ffffff;">
        <div class="mx-auto flex max-w-7xl items-center justify-center px-4 py-2 text-center text-xs font-medium leading-none tracking-normal sm:px-6 lg:justify-between lg:px-8">
            <span style="color: #ffffff;"><?php esc_html_e('Online tires, sharper prices, smarter matching.', 'dawp'); ?></span>
            <a class="hidden font-semibold transition hover:text-[#ffcc00] lg:inline-flex" style="color: #ffffff;" href="<?php echo esc_url(home_url('/track-order/')); ?>">
                <?php esc_html_e('Track Order', 'dawp'); ?>
            </a>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex min-h-[76px] items-center justify-between gap-6 py-3">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex shrink-0 items-center" aria-label="<?php echo esc_attr($brand_name); ?>">
                <img <?php echo dawp_responsive_image_attrs(get_template_directory_uri() . '/assets/img/gallery/Mytire/Logo_Mytire.png', 688, 384, '270px', [270, 390, 540]); ?>
                     alt="<?php echo esc_attr($brand_name); ?>"
                     class="w-auto"
                     style="height: 72px;">
            </a>

            <nav class="hidden flex-1 items-center justify-start gap-8 lg:flex" aria-label="<?php esc_attr_e('Primary navigation', 'dawp'); ?>">
                <?php foreach ($nav_items as $item) : ?>
                    <?php if (! empty($item['mega'])) : ?>
                        <div class="dawp-mega group/menu">
                            <a href="<?php echo esc_url($item['url']); ?>" class="dawp-mega__trigger inline-flex h-16 items-center gap-1 whitespace-nowrap text-sm font-medium tracking-normal text-black transition hover:text-[#8a6d00] focus:text-[#8a6d00] focus:outline-none">
                                <?php echo esc_html($item['title']); ?>
                                <svg class="h-3.5 w-3.5 transition group-hover/menu:rotate-180" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="m6 9 6 6 6-6"></path>
                                </svg>
                            </a>

                            <div class="dawp-mega__panel invisible opacity-0 transition duration-200">
                                <div class="dawp-mega__surface overflow-hidden rounded-lg border border-[#e5e5e5] bg-white text-left shadow-xl">
                                    <div class="grid grid-cols-[minmax(0,1fr)_300px] gap-0">
                                        <div class="p-6">
                                            <div class="dawp-mega__head flex items-end justify-between gap-5 border-b border-[#e5e5e5] pb-5">
                                                <div>
                                                    <p class="dawp-mega__eyebrow text-xs font-black uppercase tracking-[0.18em] text-[#b38600]"><?php esc_html_e('Shop Tires', 'dawp'); ?></p>
                                                    <h2 class="mt-2 font-heading text-2xl font-black leading-tight text-[#171717]"><?php esc_html_e('Browse by driving need', 'dawp'); ?></h2>
                                                </div>
                                                <a href="<?php echo esc_url($shop_url); ?>" class="dawp-mega__all shrink-0 rounded-md bg-[#ffcc00] px-4 py-2 text-xs font-black uppercase tracking-wide text-[#171717] transition hover:bg-[#e6b800]">
                                                    <?php esc_html_e('View All', 'dawp'); ?>
                                                </a>
                                            </div>

                                            <div class="mt-5 grid grid-cols-2 gap-3">
                                                <?php foreach ($mega_categories as $category) : ?>
                                                    <a href="<?php echo esc_url($category['url']); ?>" class="dawp-mega__category group/category rounded-md border border-[#e5e5e5] bg-[#f7f7f7] p-4 transition hover:border-[#ffcc00] hover:bg-white hover:shadow-sm">
                                                        <span class="flex items-center justify-between gap-3">
                                                            <span class="text-sm font-black text-[#171717] group-hover/category:text-[#b38600]"><?php echo esc_html($category['title']); ?></span>
                                                            <span class="dawp-mega__arrow text-[#b38600]" aria-hidden="true">&gt;</span>
                                                        </span>
                                                        <span class="mt-2 block text-xs font-medium leading-5 text-[#666666]"><?php echo esc_html($category['copy']); ?></span>
                                                    </a>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>

                                        <div class="dawp-mega__aside bg-[#171717] p-6 text-white">
                                            <p class="text-xs font-black uppercase tracking-[0.18em] text-[#ffcc00]"><?php esc_html_e('Shop Faster', 'dawp'); ?></p>
                                            <h2 class="mt-3 font-heading text-3xl font-black leading-tight"><?php esc_html_e('Start with what you know.', 'dawp'); ?></h2>
                                            <p class="mt-4 text-sm font-medium leading-6 text-white/70"><?php esc_html_e('Jump into a focused path by size, vehicle type, or brand before comparing products.', 'dawp'); ?></p>
                                            <div class="mt-6 grid gap-2">
                                                <?php foreach ($shop_filter_links as $link) : ?>
                                                    <a href="<?php echo esc_url($link['url']); ?>" class="dawp-mega__quick rounded-md border border-white/10 px-4 py-3 text-sm font-black uppercase tracking-wide text-white transition hover:border-[#ffcc00] hover:text-[#ffcc00]">
                                                        <?php echo esc_html($link['title']); ?>
                                                    </a>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <a href="<?php echo esc_url($item['url']); ?>" class="whitespace-nowrap text-sm font-medium tracking-normal text-black transition hover:text-[#8a6d00]">
                            <?php echo esc_html($item['title']); ?>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </nav>

            <div class="flex shrink-0 items-center gap-5">
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="hidden items-center xl:flex">
                    <label for="Mytire-header-search" class="sr-only"><?php esc_html_e('Search tires', 'dawp'); ?></label>
                    <input id="Mytire-header-search" type="search" name="s" placeholder="<?php esc_attr_e('Search tire size...', 'dawp'); ?>" class="h-10 w-48 rounded-sm border border-[#d9d9d9] bg-white px-4 text-sm font-normal text-[#111111] placeholder:text-[#777777] outline-none transition focus:border-[#ffcc00] focus:ring-2 focus:ring-[#ffcc00]/30">
                    <input type="hidden" name="post_type" value="product">
                </form>

                <button type="button" id="Mytire-mobile-search-toggle" class="inline-flex min-w-12 flex-col items-center justify-center gap-1 text-xs font-normal text-black transition hover:text-[#8a6d00] xl:hidden" aria-label="<?php esc_attr_e('Search', 'dawp'); ?>" aria-controls="Mytire-mobile-search" aria-expanded="false">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><path d="M20 20l-4.2-4.2"></path></svg>
                    <span><?php esc_html_e('Search', 'dawp'); ?></span>
                </button>

                <a href="<?php echo esc_url($account_url); ?>" class="hidden min-w-12 flex-col items-center justify-center gap-1 text-xs font-normal text-black transition hover:text-[#8a6d00] sm:inline-flex" aria-label="<?php esc_attr_e('My Account', 'dawp'); ?>">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 12.5a4.8 4.8 0 1 0 0-9.6 4.8 4.8 0 0 0 0 9.6Zm0 1.8c-4 0-7.2 2.35-7.2 5.25 0 .45.36.75.8.75h12.8c.44 0 .8-.3.8-.75 0-2.9-3.2-5.25-7.2-5.25Z"/></svg>
                    <span><?php esc_html_e('Account', 'dawp'); ?></span>
                </a>

                <a href="<?php echo esc_url($cart_url); ?>" class="relative inline-flex min-w-12 flex-col items-center justify-center gap-1 text-xs font-normal text-black transition hover:text-[#8a6d00]" aria-label="<?php esc_attr_e('Shopping Cart', 'dawp'); ?>">
                    <span class="relative">
                        <svg width="31" height="31" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M7.2 18.9a1.65 1.65 0 1 0 0 3.3 1.65 1.65 0 0 0 0-3.3Zm9.8 0a1.65 1.65 0 1 0 0 3.3 1.65 1.65 0 0 0 0-3.3ZM5.1 4.7l.62 2.6h13.76a.9.9 0 0 1 .86 1.16l-1.5 5.15a2.9 2.9 0 0 1-2.78 2.09H8.23a2.9 2.9 0 0 1-2.82-2.23L3.75 6.55 3.2 4.2H1.9a.9.9 0 0 1 0-1.8h2.01c.42 0 .78.29.88.7l.31 1.6Z"/></svg>
                        <span class="absolute -right-2 -top-2 inline-flex h-5 min-w-5 items-center justify-center rounded-full bg-[#e00000] px-1 text-[11px] font-bold leading-none text-white"><?php echo esc_html($cart_count); ?></span>
                    </span>
                    <span><?php esc_html_e('Cart', 'dawp'); ?></span>
                </a>

                <button type="button" id="Mytire-mobile-menu-toggle" class="inline-flex min-w-12 flex-col items-center justify-center gap-1 text-xs font-normal text-black transition hover:text-[#8a6d00] lg:hidden" aria-label="<?php esc_attr_e('Open menu', 'dawp'); ?>" aria-controls="Mytire-mobile-menu" aria-expanded="false">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="4" y1="7" x2="20" y2="7"></line><line x1="4" y1="12" x2="20" y2="12"></line><line x1="4" y1="17" x2="20" y2="17"></line></svg>
                    <span><?php esc_html_e('Menu', 'dawp'); ?></span>
                </button>
            </div>
        </div>
    </div>

    <div id="Mytire-mobile-search" class="hidden border-t border-[#e5e5e5] bg-white xl:hidden">
        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="mx-auto flex max-w-7xl items-center gap-2 px-4 py-3">
            <input type="search" name="s" placeholder="<?php esc_attr_e('Search tires, size, or category...', 'dawp'); ?>" class="h-10 flex-1 rounded-md border border-[#e5e5e5] bg-[#f7f7f7] px-4 text-sm text-[#171717] placeholder:text-[#666666] outline-none focus:border-[#ffcc00] focus:bg-white focus:ring-2 focus:ring-[#ffcc00]/30">
            <input type="hidden" name="post_type" value="product">
            <button type="submit" class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-md bg-[#ffcc00] text-[#171717] transition hover:bg-[#e6b800]" aria-label="<?php esc_attr_e('Submit search', 'dawp'); ?>">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="8"></circle><path d="M21 21l-4.35-4.35"></path></svg>
            </button>
        </form>
    </div>

    <div id="Mytire-mobile-menu" class="hidden border-t border-[#e5e5e5] bg-white lg:hidden">
        <nav class="mx-auto grid max-w-7xl gap-1 px-4 py-4 sm:px-6" aria-label="<?php esc_attr_e('Mobile navigation', 'dawp'); ?>">
            <?php foreach ($nav_items as $item) : ?>
                <a href="<?php echo esc_url($item['url']); ?>" class="rounded-md px-4 py-3 text-sm font-black uppercase tracking-wide text-[#171717] transition hover:bg-[#f7f7f7] hover:text-[#b38600]">
                    <?php echo esc_html($item['title']); ?>
                </a>
                <?php if (! empty($item['mega'])) : ?>
                    <div class="grid gap-2 rounded-lg bg-[#f7f7f7] p-3">
                        <?php foreach ($mega_categories as $category) : ?>
                            <a href="<?php echo esc_url($category['url']); ?>" class="rounded-md bg-white px-4 py-3 text-sm font-bold text-[#171717] transition hover:text-[#b38600]">
                                <?php echo esc_html($category['title']); ?>
                            </a>
                        <?php endforeach; ?>
                        <div class="grid grid-cols-3 gap-2">
                            <?php foreach ($shop_filter_links as $link) : ?>
                                <a href="<?php echo esc_url($link['url']); ?>" class="rounded-md bg-[#171717] px-3 py-3 text-center text-xs font-black uppercase tracking-wide text-white transition hover:text-[#ffcc00]">
                                    <?php echo esc_html($link['title']); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </nav>
    </div>
</header>

<div id="content" class="site-content">
