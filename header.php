<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Lora:wght@500;600;700&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
    <style>
        :root {
            --font-heading: 'Lora', Georgia, serif;
            --font-sans: 'Inter', system-ui, sans-serif;
        }

        #masthead .scott-header-logo {
            display: block;
            width: auto;
            height: 48px;
            max-width: 160px;
            object-fit: contain;
        }

        @media (min-width: 640px) {
            #masthead .scott-header-logo {
                height: 52px;
                max-width: 180px;
            }
        }

        #masthead .scott-mega-shell {
            width: min(980px, calc(100vw - 32px));
        }

        #masthead .scott-mega-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.45fr) minmax(260px, 0.7fr);
            gap: 0;
        }

        #masthead .scott-mega-heading-row {
            padding-bottom: 1rem;
        }

        #masthead .scott-mega-feature,
        #masthead .scott-mega-feature-content {
            min-height: 360px;
        }
    </style>
</head>

<body <?php body_class('bg-white text-[#24211E] antialiased'); ?>>
<?php wp_body_open(); ?>

<?php
$brand_name  = 'Scott Osterbind';
$brand_logo  = get_theme_file_uri('/assets/img/gallery/Logo_all (8).png');
$cart_count  = function_exists('WC') && WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
$cart_url    = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$account_id  = (int) get_option('woocommerce_myaccount_page_id');
$account_url = $account_id > 0 ? get_permalink($account_id) : home_url('/my-account/');
$shop_url    = function_exists('wc_get_page_id') && wc_get_page_id('shop') > 0
    ? get_permalink(wc_get_page_id('shop'))
    : home_url('/shop/');

$term_url = static function ($slug) {
    if (taxonomy_exists('product_cat')) {
        $term = get_term_by('slug', $slug, 'product_cat');

        if ($term && ! is_wp_error($term)) {
            $link = get_term_link($term);

            if (! is_wp_error($link)) {
                return $link;
            }
        }
    }

    return home_url('/product-category/' . sanitize_title($slug) . '/');
};

$gallery_uri = get_theme_file_uri('/assets/img/gallery/ScottOsterbind/');

$shop_categories = [
    [
        'title' => __('Handmade Bracelets', 'dawp'),
        'copy'  => __('Beaded and handmade wristwear with everyday character.', 'dawp'),
        'url'   => $term_url('handmade-bracelets'),
    ],
    [
        'title' => __('Beaded Jewelry', 'dawp'),
        'copy'  => __('Jewelry pieces made with beads, texture, and personal detail.', 'dawp'),
        'url'   => $term_url('beaded-jewelry'),
    ],
    [
        'title' => __('Vintage Accessories', 'dawp'),
        'copy'  => __('Curated accessories with vintage-inspired charm.', 'dawp'),
        'url'   => $term_url('vintage-accessories'),
    ],
    [
        'title' => __('Curated Apparel', 'dawp'),
        'copy'  => __('Apparel selected for creative everyday style.', 'dawp'),
        'url'   => $term_url('curated-apparel'),
    ],
    [
        'title' => __('Artisan Gifts', 'dawp'),
        'copy'  => __('Small handmade and curated pieces for thoughtful gifting.', 'dawp'),
        'url'   => $term_url('artisan-gifts'),
    ],
];

$featured_collection = [
    'title' => __('Handmade Bracelets', 'dawp'),
    'copy'  => __('Explore beaded bracelets, layering pieces, and small-batch accessories with warm handmade detail.', 'dawp'),
    'url'   => $term_url('handmade-bracelets'),
    'image' => $gallery_uri . 'handmade-bracelets.png',
];

$nav_items = [
    ['title' => __('Home', 'dawp'), 'url' => home_url('/')],
    ['title' => __('Shop', 'dawp'), 'url' => $shop_url, 'mega' => true],
    ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/')],
    ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/')],
];
?>

<header id="masthead" class="sticky top-0 z-50 border-b border-[#D8C3A5] bg-white text-[#24211E] shadow-sm" role="banner">
    <div class="bg-[#5A3825] text-white">
        <div class="mx-auto flex max-w-7xl flex-col items-center justify-between gap-2 px-4 py-2 text-center text-xs font-black uppercase tracking-[0.16em] sm:flex-row sm:px-6 lg:px-8">
            <span><?php esc_html_e('Handmade jewelry and curated vintage-inspired accessories', 'dawp'); ?></span>
            <a href="<?php echo esc_url(home_url('/shipping-returns/')); ?>" class="text-[#F8F1E7] transition hover:text-[#C8A45D]">
                <?php esc_html_e('2-4 day processing | Tracking included | 30-day returns', 'dawp'); ?>
            </a>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-20 items-center justify-between gap-4">
            <a href="<?php echo esc_url(home_url('/')); ?>"
               class="group inline-flex shrink-0 items-center"
               aria-label="<?php echo esc_attr($brand_name); ?>">
                <img src="<?php echo esc_url($brand_logo); ?>"
                     alt="<?php echo esc_attr($brand_name); ?>"
                     class="scott-header-logo">
            </a>

            <nav class="hidden flex-1 items-center justify-center gap-5 lg:flex xl:gap-7" aria-label="<?php esc_attr_e('Primary navigation', 'dawp'); ?>">
                <?php foreach ($nav_items as $item) : ?>
                    <?php if (! empty($item['mega'])) : ?>
                        <div class="group/menu">
                            <a href="<?php echo esc_url($item['url']); ?>"
                               class="inline-flex h-20 items-center gap-1 whitespace-nowrap text-sm font-black uppercase tracking-wide text-[#24211E] transition hover:text-[#9A6242] focus:text-[#9A6242] focus:outline-none">
                                <?php echo esc_html($item['title']); ?>
                                <svg class="h-4 w-4 transition group-hover/menu:rotate-180" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="m6 9 6 6 6-6"></path>
                                </svg>
                            </a>

                            <div class="scott-mega-shell invisible absolute left-1/2 top-full -translate-x-1/2 translate-y-3 opacity-0 transition duration-200 group-hover/menu:visible group-hover/menu:translate-y-0 group-hover/menu:opacity-100 group-focus-within/menu:visible group-focus-within/menu:translate-y-0 group-focus-within/menu:opacity-100">
                                <div class="overflow-hidden rounded-lg border border-[#D8C3A5] bg-white text-left shadow-xl">
                                    <div class="scott-mega-grid">
                                        <div class="p-5">
                                            <div class="scott-mega-heading-row flex items-end justify-between gap-4 border-b border-[#D8C3A5]">
                                                <div>
                                                    <p class="text-xs font-black uppercase tracking-[0.18em] text-[#9A6242]">
                                                        <?php esc_html_e('Shop Collections', 'dawp'); ?>
                                                    </p>
                                                    <h2 class="mt-2 font-heading text-xl font-black leading-tight text-[#5A3825]">
                                                        <?php esc_html_e('Handmade and vintage-inspired finds', 'dawp'); ?>
                                                    </h2>
                                                </div>
                                                <a href="<?php echo esc_url($shop_url); ?>"
                                                   class="shrink-0 rounded-full border border-[#9A6242] px-4 py-2 text-xs font-black uppercase tracking-wide text-[#5A3825] transition hover:bg-[#F8F1E7]">
                                                    <?php esc_html_e('View All', 'dawp'); ?>
                                                </a>
                                            </div>

                                            <div class="mt-4 grid grid-cols-2 gap-3">
                                                <?php foreach ($shop_categories as $category) : ?>
                                                    <a href="<?php echo esc_url($category['url']); ?>"
                                                       class="group/category rounded-lg border border-[#D8C3A5] bg-[#F8F1E7] p-3 transition hover:border-[#9A6242] hover:bg-white hover:shadow-sm">
                                                        <span class="flex items-center justify-between gap-3">
                                                            <span class="text-sm font-black text-[#5A3825] group-hover/category:text-[#9A6242]">
                                                                <?php echo esc_html($category['title']); ?>
                                                            </span>
                                                            <svg class="h-4 w-4 shrink-0 text-[#C8A45D]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                                <path d="M5 12h14"></path>
                                                                <path d="m12 5 7 7-7 7"></path>
                                                            </svg>
                                                        </span>
                                                        <span class="mt-2 block text-xs font-medium leading-5 text-[#4F463F]">
                                                            <?php echo esc_html($category['copy']); ?>
                                                        </span>
                                                    </a>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>

                                        <a href="<?php echo esc_url($featured_collection['url']); ?>"
                                           class="scott-mega-feature group/feature relative block overflow-hidden bg-[#24211E] text-white">
                                            <img src="<?php echo esc_url($featured_collection['image']); ?>"
                                                 alt="<?php echo esc_attr($featured_collection['title']); ?>"
                                                 class="absolute inset-0 h-full w-full object-cover transition duration-300 group-hover/feature:scale-[1.03]"
                                                 loading="lazy">
                                            <span class="absolute inset-0 bg-[#24211E]/80"></span>
                                            <span class="scott-mega-feature-content relative flex h-full flex-col justify-end p-5">
                                                <span class="mb-3 inline-flex w-fit rounded-full bg-[#C8A45D] px-3 py-1.5 text-xs font-black uppercase tracking-[0.16em] text-[#24211E]">
                                                    <?php esc_html_e('Featured', 'dawp'); ?>
                                                </span>
                                                <span class="font-heading text-2xl font-black leading-tight">
                                                    <?php echo esc_html($featured_collection['title']); ?>
                                                </span>
                                                <span class="mt-3 text-sm font-medium leading-6 text-[#F8F1E7]">
                                                    <?php echo esc_html($featured_collection['copy']); ?>
                                                </span>
                                                <span class="mt-5 inline-flex items-center gap-2 text-sm font-black uppercase tracking-wide text-[#C8A45D]">
                                                    <?php esc_html_e('Shop Bracelets', 'dawp'); ?>
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
                           class="whitespace-nowrap text-sm font-black uppercase tracking-wide text-[#24211E] transition hover:text-[#9A6242]">
                            <?php echo esc_html($item['title']); ?>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </nav>

            <div class="flex shrink-0 items-center gap-2 sm:gap-3">
                <form role="search"
                      method="get"
                      action="<?php echo esc_url(home_url('/')); ?>"
                      autocomplete="off"
                      class="hidden items-center xl:flex">
                    <label for="scott-header-search" class="sr-only">
                        <?php esc_html_e('Search products', 'dawp'); ?>
                    </label>
                    <input id="scott-header-search"
                           type="search"
                           name="s"
                           autocomplete="off"
                           placeholder="<?php esc_attr_e('Search jewelry...', 'dawp'); ?>"
                           class="h-10 w-48 rounded-full border border-[#D8C3A5] bg-[#F8F1E7] px-4 text-sm text-[#24211E] placeholder:text-[#7A7B52] outline-none transition focus:border-[#9A6242] focus:bg-white focus:ring-2 focus:ring-[#9A6242]/20">
                    <input type="hidden" name="post_type" value="product">
                </form>

                <button type="button"
                        class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-[#D8C3A5] text-[#5A3825] transition hover:bg-[#F8F1E7] xl:hidden"
                        aria-label="<?php esc_attr_e('Search', 'dawp'); ?>"
                        onclick="document.getElementById('scott-mobile-search').classList.toggle('hidden')">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="M21 21l-4.35-4.35"></path>
                    </svg>
                </button>

                <a href="<?php echo esc_url($account_url); ?>"
                   class="hidden h-10 w-10 items-center justify-center rounded-full border border-[#D8C3A5] text-[#5A3825] transition hover:bg-[#F8F1E7] sm:inline-flex"
                   aria-label="<?php esc_attr_e('My Account', 'dawp'); ?>">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </a>

                <a href="<?php echo esc_url($cart_url); ?>"
                   class="relative inline-flex min-h-10 items-center justify-center rounded-full bg-[#9A6242] px-4 text-xs font-black uppercase tracking-wide text-white transition hover:bg-[#5A3825]"
                   aria-label="<?php esc_attr_e('Shopping Cart', 'dawp'); ?>">
                    <?php esc_html_e('Cart', 'dawp'); ?>
                    <span class="ml-1">(<?php echo esc_html($cart_count); ?>)</span>
                </a>

                <button type="button"
                        class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-[#D8C3A5] text-[#5A3825] transition hover:bg-[#F8F1E7] lg:hidden"
                        aria-label="<?php esc_attr_e('Open menu', 'dawp'); ?>"
                        onclick="document.getElementById('scott-mobile-menu').classList.toggle('hidden')">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="scott-mobile-search" class="hidden border-t border-[#D8C3A5] bg-white xl:hidden">
        <form role="search"
              method="get"
              action="<?php echo esc_url(home_url('/')); ?>"
              autocomplete="off"
              class="mx-auto flex max-w-7xl items-center gap-2 px-4 py-3">
            <input type="search"
                   name="s"
                   autocomplete="off"
                   placeholder="<?php esc_attr_e('Search bracelets, jewelry, or gifts...', 'dawp'); ?>"
                   class="h-10 flex-1 rounded-full border border-[#D8C3A5] bg-[#F8F1E7] px-4 text-sm text-[#24211E] placeholder:text-[#7A7B52] outline-none focus:border-[#9A6242] focus:bg-white focus:ring-2 focus:ring-[#9A6242]/20">
            <input type="hidden" name="post_type" value="product">
            <button type="submit"
                    class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#9A6242] text-white transition hover:bg-[#5A3825]"
                    aria-label="<?php esc_attr_e('Submit search', 'dawp'); ?>">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="M21 21l-4.35-4.35"></path>
                </svg>
            </button>
        </form>
    </div>

    <div id="scott-mobile-menu" class="hidden border-t border-[#D8C3A5] bg-white lg:hidden">
        <nav class="mx-auto grid max-w-7xl gap-1 px-4 py-4 sm:px-6" aria-label="<?php esc_attr_e('Mobile navigation', 'dawp'); ?>">
            <?php foreach ($nav_items as $item) : ?>
                <a href="<?php echo esc_url($item['url']); ?>"
                   class="rounded-lg px-4 py-3 text-sm font-black uppercase tracking-wide text-[#5A3825] transition hover:bg-[#F8F1E7] hover:text-[#9A6242]">
                    <?php echo esc_html($item['title']); ?>
                </a>
                <?php if (! empty($item['mega'])) : ?>
                    <div class="grid gap-2 rounded-lg bg-[#F8F1E7] p-3">
                        <?php foreach ($shop_categories as $category) : ?>
                            <a href="<?php echo esc_url($category['url']); ?>"
                               class="rounded-lg bg-white px-4 py-3 text-sm font-bold text-[#5A3825] transition hover:text-[#9A6242]">
                                <?php echo esc_html($category['title']); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </nav>
    </div>
</header>

<div id="content" class="site-content">
