<?php
/**
 * Template Part: page-home
 */

defined('ABSPATH') || exit;

if (!function_exists('dawp_home_product_grid')) {
    function dawp_home_product_grid($products) {
        if (empty($products)) {
            ?>
            <div class="col-span-full rounded-3xl border border-[#D8CEC6] bg-white p-8 text-center">
                <p class="text-[#6F625D]"><?php esc_html_e('New Myveganblog style pieces will be available soon.', 'dawp'); ?></p>
            </div>
            <?php
            return;
        }

        foreach ($products as $product) :
            if (!$product instanceof WC_Product) {
                continue;
            }

            $product_id = $product->get_id();
            $image_id   = $product->get_image_id();
            $image      = $image_id
                ? wp_get_attachment_image($image_id, 'woocommerce_single', false, [
                    'class'   => 'h-full w-full object-cover transition-transform duration-500 group-hover:scale-105',
                    'loading' => 'lazy',
                ])
                : wc_placeholder_img('woocommerce_single', ['class' => 'h-full w-full object-cover']);
            ?>
            <article class="group overflow-hidden rounded-3xl border border-[#D8CEC6] bg-white shadow-[0_12px_30px_rgba(47,42,40,0.06)] transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_18px_40px_rgba(47,42,40,0.12)]">
                <a href="<?php echo esc_url(get_permalink($product_id)); ?>" class="block" aria-label="<?php echo esc_attr($product->get_name()); ?>">
                    <div class="aspect-square overflow-hidden bg-[#F4ECE5]">
                        <?php echo $image; ?>
                    </div>
                    <div class="space-y-4 p-4 sm:p-5">
                        <div class="space-y-2">
                            <h3 class="line-clamp-2 min-h-[3rem] text-base font-bold leading-snug text-[#2F2A28]">
                                <?php echo esc_html($product->get_name()); ?>
                            </h3>
                            <div class="text-base font-bold text-[#C98A8A]">
                                <?php echo wp_kses_post($product->get_price_html()); ?>
                            </div>
                        </div>
                        <span class="inline-flex min-h-11 w-full items-center justify-center rounded-full bg-[#2F2A28] px-5 py-3 text-sm font-bold text-white transition-colors duration-300 group-hover:bg-[#C98A8A]">
                            <?php esc_html_e('View Product', 'dawp'); ?>
                        </span>
                    </div>
                </a>
            </article>
            <?php
        endforeach;
    }
}

$all_image_base = get_template_directory_uri() . '/assets/img/All_image/';
$stock_images = [
    'hero'        => $all_image_base . 'banner.png',
    'hero_small'  => $all_image_base . 'image copy 3.png',
    'shoes'       => $all_image_base . 'image.png',
    'sandals'     => $all_image_base . 'image copy 5.png',
    'handbags'    => $all_image_base . 'image copy 8.png',
    'accessories' => $all_image_base . 'image copy 10.png',
    'feature'     => $all_image_base . 'image copy 9.png',
    'about'       => $all_image_base . 'image copy 7.png',
];

$collections = [
    [
        'title' => __('Women\'s Leather Shoes', 'dawp'),
        'copy'  => __('Polished women\'s shoes designed for daily outfits, office-ready looks, and confident everyday wear.', 'dawp'),
        'url'   => home_url('/product-category/womens-leather-shoes/'),
        'image' => $stock_images['shoes'],
    ],
    [
        'title' => __('Women\'s Sandals', 'dawp'),
        'copy'  => __('Relaxed sandals made for warm days, travel, weekends, and easy everyday styling.', 'dawp'),
        'url'   => home_url('/product-category/womens-sandals/'),
        'image' => $stock_images['sandals'],
    ],
    [
        'title' => __('Women\'s Handbags', 'dawp'),
        'copy'  => __('Handbags designed for daily essentials, polished outfits, and practical everyday use.', 'dawp'),
        'url'   => home_url('/product-category/womens-handbags/'),
        'image' => $stock_images['handbags'],
    ],
    [
        'title' => __('Fashion Accessories', 'dawp'),
        'copy'  => __('Outfit-finishing accessories that add a polished touch to everyday looks.', 'dawp'),
        'url'   => home_url('/product-category/fashion-accessories/'),
        'image' => $stock_images['accessories'],
    ],
];

$new_arrivals = class_exists('WooCommerce') ? wc_get_products([
    'status'  => 'publish',
    'limit'   => 4,
    'orderby' => 'date',
    'order'   => 'DESC',
]) : [];

$favorites = class_exists('WooCommerce') ? wc_get_products([
    'status'  => 'publish',
    'limit'   => 4,
    'orderby' => 'date',
    'order'   => 'ASC',
]) : [];

if (empty($favorites)) {
    $favorites = $new_arrivals;
}

$trust_cards = [
    ['title' => __('Secure Checkout', 'dawp'), 'copy' => __('A clean and protected checkout experience for every order.', 'dawp')],
    ['title' => __('Tracking Included', 'dawp'), 'copy' => __('Tracking details are provided once your order ships.', 'dawp')],
    ['title' => __('30-Day Returns', 'dawp'), 'copy' => __('Returns are available on eligible unused items within 30 days of delivery.', 'dawp')],
    ['title' => __('Clear Product Notes', 'dawp'), 'copy' => __('Review sizing, materials, care details, and return conditions before ordering.', 'dawp')],
];
?>

<main class="bg-[#F8F3EC] text-[#2F2A28]">
    <!-- Hero -->
    <section class="relative overflow-hidden bg-[#241F1D] text-white">
        <div class="absolute inset-0">
            <?php echo dawp_responsive_image($stock_images['hero'], [
                'alt'           => __('Women\'s shoes and accessories styled for everyday outfits', 'dawp'),
                'width'         => 1600,
                'height'        => 900,
                'class'         => 'h-full w-full object-cover opacity-60',
                'loading'       => 'eager',
                'fetchpriority' => 'high',
                'sizes'         => '100vw',
                'srcset'        => [[640, 360], [960, 540], [1280, 720], [1600, 900], [2000, 1125]],
            ]); ?>
            <div class="absolute inset-0 bg-[linear-gradient(90deg,rgba(36,31,29,0.96)_0%,rgba(36,31,29,0.78)_42%,rgba(36,31,29,0.16)_100%)]"></div>
        </div>
        <div class="relative mx-auto grid min-h-[660px] w-[min(100%,1180px)] content-end px-4 pb-8 pt-20 sm:px-6 lg:px-8 lg:pb-12">
            <div class="max-w-4xl">
                <span class="inline-flex border-b border-[#E8D8C8] pb-2 text-xs font-bold uppercase tracking-[0.18em] text-[#E8D8C8]">
                    <?php esc_html_e('Myveganblog', 'dawp'); ?>
                </span>
                <h1 class="mt-7 max-w-4xl font-serif text-4xl leading-[1.02] text-white sm:text-6xl lg:text-7xl">
                    <?php esc_html_e('Women\'s Shoes & Accessories For Everyday Style', 'dawp'); ?>
                </h1>
                <p class="mt-6 max-w-3xl text-base leading-8 text-white/78 sm:text-lg">
                    <?php esc_html_e('Discover women\'s leather shoes, sandals, handbags, and fashion accessories designed for polished daily outfits, relaxed weekends, and confident everyday looks.', 'dawp'); ?>
                </p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url(home_url('/product-category/womens-leather-shoes/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-white px-7 py-3 text-sm font-bold text-[#2F2A28] transition-colors duration-300 hover:bg-[#E8D8C8]">
                        <?php esc_html_e('Shop Women\'s Shoes', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/product-category/womens-handbags/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-white/35 px-7 py-3 text-sm font-bold text-white transition-colors duration-300 hover:border-white hover:bg-white/10">
                        <?php esc_html_e('Explore Handbags', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <div class="mt-12 grid gap-3 border-t border-white/18 pt-5 sm:grid-cols-3">
                <div>
                    <span class="block font-serif text-2xl text-white"><?php esc_html_e('01', 'dawp'); ?></span>
                    <p class="mt-1 text-sm leading-6 text-white/72"><?php esc_html_e('Polished shoes for workdays, dinners, and daily outfits.', 'dawp'); ?></p>
                </div>
                <div>
                    <span class="block font-serif text-2xl text-white"><?php esc_html_e('02', 'dawp'); ?></span>
                    <p class="mt-1 text-sm leading-6 text-white/72"><?php esc_html_e('Easy sandals for warm days, travel, and weekends.', 'dawp'); ?></p>
                </div>
                <div>
                    <span class="block font-serif text-2xl text-white"><?php esc_html_e('03', 'dawp'); ?></span>
                    <p class="mt-1 text-sm leading-6 text-white/72"><?php esc_html_e('Handbags and accessories for simple outfit finishing.', 'dawp'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Shop by collection -->
    <section class="bg-white px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto grid w-[min(100%,1180px)] gap-8 lg:grid-cols-[0.88fr_1.12fr]">
            <div class="flex flex-col justify-center gap-8 border-y border-[#D8CEC6] py-8 lg:py-10">
                <div class="max-w-md space-y-4">
                    <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#C98A8A]"><?php esc_html_e('Shop By Collection', 'dawp'); ?></span>
                    <h2 class="font-serif text-3xl leading-tight text-[#2F2A28] sm:text-5xl"><?php esc_html_e('Shop polished pieces for everyday outfits.', 'dawp'); ?></h2>
                </div>
                <p class="max-w-md text-base leading-8 text-[#6F625D]">
                    <?php esc_html_e('Choose from women\'s leather shoes, sandals, handbags, and accessories made to pair easily with daily looks.', 'dawp'); ?>
                </p>
                <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="inline-flex min-h-11 w-fit items-center justify-center rounded-full bg-[#2F2A28] px-6 py-3 text-sm font-bold text-white transition-colors hover:bg-[#C98A8A]">
                    <?php esc_html_e('Shop All', 'dawp'); ?>
                </a>
            </div>

            <div class="grid gap-4 lg:grid-cols-[1.05fr_0.95fr]">
                <a href="<?php echo esc_url($collections[0]['url']); ?>" class="group relative min-h-[460px] overflow-hidden rounded-[8px] bg-[#2F2A28]">
                    <?php echo dawp_responsive_image($collections[0]['image'], [
                        'alt'     => $collections[0]['title'],
                        'width'   => 680,
                        'height'  => 680,
                        'class'   => 'absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-105',
                        'sizes'   => '(min-width: 1024px) 400px, 100vw',
                        'srcset'  => [[360, 360], [573, 573], [680, 680]],
                    ]); ?>
                    <div class="absolute inset-0 bg-gradient-to-t from-[#2F2A28]/90 via-[#2F2A28]/20 to-transparent"></div>
                    <div class="absolute inset-x-0 bottom-0 p-6 sm:p-8">
                        <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#E8D8C8]"><?php esc_html_e('Start Here', 'dawp'); ?></span>
                        <h3 class="mt-3 font-serif text-3xl leading-tight text-white sm:text-4xl"><?php echo esc_html($collections[0]['title']); ?></h3>
                        <p class="mt-3 max-w-md text-sm leading-6 text-white/82"><?php echo esc_html($collections[0]['copy']); ?></p>
                    </div>
                </a>

                <div class="grid gap-4">
                    <?php foreach (array_slice($collections, 1) as $index => $collection) : ?>
                        <a href="<?php echo esc_url($collection['url']); ?>" class="group grid min-h-[160px] grid-cols-[104px_1fr] overflow-hidden rounded-[8px] border border-[#D8CEC6] bg-[#F8F3EC] transition-colors hover:bg-[#F4ECE5] sm:grid-cols-[120px_1fr]">
                            <?php echo dawp_responsive_image($collection['image'], [
                                'alt'     => $collection['title'],
                                'width'   => 240,
                                'height'  => 240,
                                'class'   => 'h-full min-h-[160px] w-full object-cover transition-transform duration-500 group-hover:scale-105',
                                'sizes'   => '(min-width: 640px) 120px, 104px',
                                'srcset'  => [[104, 160], [120, 184], [240, 368]],
                            ]); ?>
                            <div class="flex flex-col justify-between gap-4 p-4">
                                <span class="text-xs font-bold text-[#C98A8A]"><?php echo esc_html(str_pad((string) ($index + 2), 2, '0', STR_PAD_LEFT)); ?></span>
                                <div>
                                    <h3 class="break-words font-serif text-xl leading-tight text-[#2F2A28]"><?php echo esc_html($collection['title']); ?></h3>
                                    <p class="mt-2 text-sm leading-6 text-[#6F625D]"><?php echo esc_html($collection['copy']); ?></p>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- New arrivals -->
    <section class="bg-[#F4ECE5] px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto w-[min(100%,1180px)]">
            <div class="mb-10 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                <div class="max-w-2xl space-y-3">
                    <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#C98A8A]"><?php esc_html_e('New Arrivals', 'dawp'); ?></span>
                    <h2 class="font-serif text-3xl leading-tight text-[#2F2A28] sm:text-4xl"><?php esc_html_e('Fresh picks for polished everyday style', 'dawp'); ?></h2>
                </div>
                <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="text-sm font-bold text-[#2F2A28] underline decoration-[#C98A8A] decoration-2 underline-offset-8 transition-colors hover:text-[#C98A8A]">
                    <?php esc_html_e('View All', 'dawp'); ?>
                </a>
            </div>

            <div class="grid grid-cols-2 gap-4 lg:grid-cols-4 lg:gap-6">
                <?php dawp_home_product_grid($new_arrivals); ?>
            </div>
        </div>
    </section>

    <!-- Feature -->
    <section class="px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto grid w-[min(100%,1180px)] items-center gap-8 lg:grid-cols-2">
            <div class="overflow-hidden rounded-[28px] border-8 border-white shadow-[0_18px_44px_rgba(47,42,40,0.12)]">
                <?php echo dawp_responsive_image($stock_images['feature'], [
                    'alt'     => __('Women\'s fashion boutique with shoes and accessories', 'dawp'),
                    'width'   => 760,
                    'height'  => 608,
                    'class'   => 'aspect-[5/4] w-full object-cover',
                    'sizes'   => '(min-width: 1024px) 560px, 100vw',
                    'srcset'  => [[400, 320], [573, 458], [760, 608]],
                ]); ?>
            </div>
            <div class="rounded-[28px] border border-[#D8CEC6] bg-white p-8 shadow-[0_12px_30px_rgba(47,42,40,0.08)] lg:p-10">
                <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#C98A8A]"><?php esc_html_e('Polished Shoes For Daily Looks', 'dawp'); ?></span>
                <h2 class="mt-4 font-serif text-3xl leading-tight text-[#2F2A28] sm:text-4xl">
                    <?php esc_html_e('Shoes, sandals, bags, and accessories that work with real wardrobes.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-[#6F625D]">
                    <?php esc_html_e('Myveganblog focuses on feminine footwear, practical handbags, and simple accessories that fit workdays, weekends, travel moments, and everyday routines.', 'dawp'); ?>
                </p>
                <div class="mt-8 grid gap-3 sm:grid-cols-3">
                    <div class="rounded-2xl bg-[#F8F3EC] p-4">
                        <h3 class="font-bold text-[#2F2A28]"><?php esc_html_e('Daily Shoes', 'dawp'); ?></h3>
                        <p class="mt-2 text-sm leading-6 text-[#6F625D]"><?php esc_html_e('Polished pairs for busy days.', 'dawp'); ?></p>
                    </div>
                    <div class="rounded-2xl bg-[#F8F3EC] p-4">
                        <h3 class="font-bold text-[#2F2A28]"><?php esc_html_e('Handbags', 'dawp'); ?></h3>
                        <p class="mt-2 text-sm leading-6 text-[#6F625D]"><?php esc_html_e('Room for daily essentials.', 'dawp'); ?></p>
                    </div>
                    <div class="rounded-2xl bg-[#F8F3EC] p-4">
                        <h3 class="font-bold text-[#2F2A28]"><?php esc_html_e('Accessories', 'dawp'); ?></h3>
                        <p class="mt-2 text-sm leading-6 text-[#6F625D]"><?php esc_html_e('Finishing touches for outfits.', 'dawp'); ?></p>
                    </div>
                </div>
                <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="mt-8 inline-flex min-h-12 items-center justify-center rounded-full bg-[#C98A8A] px-7 py-3 text-sm font-bold text-white transition-colors duration-300 hover:bg-[#2F2A28]">
                    <?php esc_html_e('Shop The Collection', 'dawp'); ?>
                </a>
            </div>
        </div>
    </section>

    <!-- Favorites -->
    <section class="bg-white px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto w-[min(100%,1180px)]">
            <div class="mb-10 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                <div class="max-w-2xl space-y-3">
                    <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#C98A8A]"><?php esc_html_e('Customer Favorites', 'dawp'); ?></span>
                    <h2 class="font-serif text-3xl leading-tight text-[#2F2A28] sm:text-4xl"><?php esc_html_e('Loved for everyday style', 'dawp'); ?></h2>
                </div>
                <p class="max-w-md text-sm leading-6 text-[#6F625D]"><?php esc_html_e('A practical edit of shoes, handbags, and accessories made for simple daily styling.', 'dawp'); ?></p>
            </div>
            <div class="grid grid-cols-2 gap-4 lg:grid-cols-4 lg:gap-6">
                <?php dawp_home_product_grid($favorites); ?>
            </div>
        </div>
    </section>

    <!-- About and newsletter -->
    <section class="px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto grid min-h-[520px] w-[min(100%,1180px)] overflow-hidden rounded-[28px] bg-[#2F2A28] lg:min-h-[560px] lg:grid-cols-[0.9fr_1.1fr]">
            <div class="min-h-[360px] lg:min-h-[560px]">
                <?php echo dawp_responsive_image($stock_images['about'], [
                    'alt'     => __('Women\'s handbag styled with everyday accessories', 'dawp'),
                    'width'   => 700,
                    'height'  => 560,
                    'class'   => 'h-full w-full object-cover',
                    'sizes'   => '(min-width: 1024px) 500px, 100vw',
                    'srcset'  => [[400, 320], [573, 458], [700, 560]],
                ]); ?>
            </div>
            <div class="flex min-h-[520px] flex-col justify-center p-8 pb-10 text-white sm:p-10 sm:pb-12 lg:min-h-[560px] lg:p-12">
                <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#E8D8C8]"><?php esc_html_e('Our Boutique Direction', 'dawp'); ?></span>
                <h2 class="mt-4 font-serif text-3xl leading-tight sm:text-4xl">
                    <?php esc_html_e('A clear place for polished women\'s shoes, handbags, and accessories.', 'dawp'); ?>
                </h2>
                <p class="mt-5 max-w-2xl text-base leading-8 text-white/78">
                    <?php esc_html_e('Myveganblog brings together women\'s footwear, handbags, and fashion accessories for shoppers who want practical style pieces that are easy to wear and easy to pair.', 'dawp'); ?>
                </p>
                <form id="newsletter-form" class="mt-8 grid gap-3 sm:grid-cols-[1fr_auto]" method="post" action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>" novalidate>
                    <input type="hidden" name="action" value="dawp_newsletter">
                    <input type="hidden" name="nonce" value="<?php echo esc_attr(wp_create_nonce('dawp_newsletter_nonce')); ?>">
                    <label class="sr-only" for="home-newsletter-email"><?php esc_html_e('Email address', 'dawp'); ?></label>
                    <input id="home-newsletter-email" name="email" type="email" required autocomplete="email" placeholder="<?php esc_attr_e('Enter your email', 'dawp'); ?>" class="min-h-12 min-w-0 rounded-full border border-white/18 bg-white px-5 text-sm text-[#2F2A28] outline-none transition-colors placeholder:text-[#948984] focus:border-[#C98A8A]">
                    <button type="submit" class="min-h-12 whitespace-nowrap rounded-full bg-[#C98A8A] px-7 py-3 text-sm font-bold text-white transition-colors hover:bg-white hover:text-[#2F2A28] disabled:cursor-not-allowed disabled:opacity-70">
                        <?php esc_html_e('Sign Up', 'dawp'); ?>
                    </button>
                    <p id="newsletter-msg" class="text-sm font-bold sm:col-span-2" aria-live="polite" style="display:none"></p>
                </form>
                <div class="mt-8 flex flex-col flex-wrap gap-3 sm:flex-row">
                    <a href="<?php echo esc_url(home_url('/about-us/')); ?>" class="inline-flex min-h-11 w-full items-center justify-center rounded-full border border-white/24 px-6 py-3 text-sm font-bold text-white transition-colors hover:bg-white hover:text-[#2F2A28] sm:w-auto">
                        <?php esc_html_e('Learn About Us', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-11 w-full items-center justify-center rounded-full px-6 py-3 text-sm font-bold text-[#F4ECE5] transition-colors hover:text-white sm:w-auto">
                        <?php esc_html_e('Customer Support', 'dawp'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Trust -->
    <section class="bg-white px-4 py-14 sm:px-6 lg:px-8 lg:py-16">
        <div class="mx-auto flex w-[min(100%,1180px)] snap-x snap-mandatory gap-4 overflow-x-auto pb-1 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden md:grid md:grid-cols-2 md:overflow-visible md:pb-0 lg:grid-cols-4" aria-label="<?php esc_attr_e('Shopping trust highlights', 'dawp'); ?>">
            <?php foreach ($trust_cards as $card) : ?>
                <div class="min-w-[82%] snap-start rounded-3xl border border-[#D8CEC6] bg-[#F8F3EC] p-6 sm:min-w-[46%] sm:p-8 md:min-h-[230px] md:min-w-0">
                    <div class="mb-5 flex h-12 w-12 items-center justify-center rounded-full bg-[#C98A8A]/14 text-[#C98A8A]">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>
                    </div>
                    <h3 class="font-serif text-xl text-[#2F2A28]"><?php echo esc_html($card['title']); ?></h3>
                    <p class="mt-4 text-sm leading-6 text-[#6F625D]"><?php echo esc_html($card['copy']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>
