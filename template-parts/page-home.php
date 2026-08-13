<?php
/**
 * Homepage template part.
 *
 * @package dawp
 */

$theme_uri = get_template_directory_uri();
$hero_img  = $theme_uri . '/assets/img/elite/home-lifestyle-hero-v2.png';
$notify_signup_status = isset($_GET['notify_signup']) ? sanitize_key(wp_unslash($_GET['notify_signup'])) : '';

$home_category_overview_img = $theme_uri . '/assets/img/elite/home-category-overview-v2.png';
$home_essentials_img       = $theme_uri . '/assets/img/elite/category-home-essentials-v2.png';
$beauty_personal_care_img  = $theme_uri . '/assets/img/elite/category-beauty-personal-care-v2.png';
$fashion_accessories_img   = $theme_uri . '/assets/img/elite/category-fashion-accessories-v2.png';
$lifestyle_accessories_img = $theme_uri . '/assets/img/elite/category-lifestyle-accessories-v2.png';
$giftable_finds_img        = $theme_uri . '/assets/img/elite/category-giftable-finds-v2.png';
$beauty_accessories_img    = $theme_uri . '/assets/img/elite/home-beauty-accessories-v2.png';

$category_links = [
    [
        'name'   => __('Home Essentials', 'dawp'),
        'copy'   => __('Practical products for organized daily living.', 'dawp'),
        'slug'   => 'home-essentials',
        'url'    => dawp_get_product_category_url('home-essentials'),
        'accent' => '#2563EB',
        'wash'   => 'bg-[#EFF6FF]',
        'meta'   => __('Storage, kitchen helpers, and home convenience', 'dawp'),
        'image'  => $home_essentials_img,
        'alt'    => __('Organized home essentials and practical daily products', 'dawp'),
    ],
    [
        'name'   => __('Beauty & Personal Care', 'dawp'),
        'copy'   => __('Simple self-care and beauty items for everyday routines.', 'dawp'),
        'slug'   => 'beauty-personal-care',
        'url'    => dawp_get_product_category_url('beauty-personal-care'),
        'accent' => '#D946EF',
        'wash'   => 'bg-[#FDF4FF]',
        'meta'   => __('Beauty tools, grooming accessories, and organizers', 'dawp'),
        'image'  => $beauty_personal_care_img,
        'alt'    => __('Beauty and personal care accessories arranged for daily routines', 'dawp'),
    ],
    [
        'name'   => __('Fashion Accessories', 'dawp'),
        'copy'   => __('Easy accessories that add style to daily looks.', 'dawp'),
        'slug'   => 'fashion-accessories',
        'url'    => dawp_get_product_category_url('fashion-accessories'),
        'accent' => '#F97316',
        'wash'   => 'bg-[#FFF7ED]',
        'meta'   => __('Pouches, hair accessories, small bags, and scarves', 'dawp'),
        'image'  => $fashion_accessories_img,
        'alt'    => __('Fashion accessories and small style items for everyday looks', 'dawp'),
    ],
    [
        'name'   => __('Lifestyle Accessories', 'dawp'),
        'copy'   => __('Useful finds for travel, organization, and daily convenience.', 'dawp'),
        'slug'   => 'lifestyle-accessories',
        'url'    => dawp_get_product_category_url('lifestyle-accessories'),
        'accent' => '#06B6D4',
        'wash'   => 'bg-[#ECFEFF]',
        'meta'   => __('Travel pouches, desk items, and everyday carry', 'dawp'),
        'image'  => $lifestyle_accessories_img,
        'alt'    => __('Lifestyle accessories for travel organization and everyday carry', 'dawp'),
    ],
    [
        'name'   => __('Giftable Finds', 'dawp'),
        'copy'   => __('Thoughtful everyday products made for simple gifting.', 'dawp'),
        'slug'   => 'giftable-finds',
        'url'    => dawp_get_product_category_url('giftable-finds'),
        'accent' => '#65A30D',
        'wash'   => 'bg-[#F7FEE7]',
        'meta'   => __('Useful gifts for home, care, style, and daily life', 'dawp'),
        'image'  => $giftable_finds_img,
        'alt'    => __('Giftable everyday products for home care style and daily life', 'dawp'),
    ],
];

$fallback_products = [
    [
        'title' => __('Everyday Home Organizer', 'dawp'),
        'tag'   => __('Home Essentials', 'dawp'),
        'price' => '$18.00',
        'image' => $theme_uri . '/assets/img/elite/product-home-organizer-v2.png',
    ],
    [
        'title' => __('Clean Beauty Storage Pouch', 'dawp'),
        'tag'   => __('Personal Care', 'dawp'),
        'price' => '$16.00',
        'image' => $theme_uri . '/assets/img/elite/product-beauty-pouch-v2.png',
    ],
    [
        'title' => __('Compact Travel Accessory Case', 'dawp'),
        'tag'   => __('Lifestyle Find', 'dawp'),
        'price' => '$22.00',
        'image' => $theme_uri . '/assets/img/elite/product-travel-case-v2.png',
    ],
    [
        'title' => __('Thoughtful Daily Gift Set', 'dawp'),
        'tag'   => __('Giftable', 'dawp'),
        'price' => '$24.00',
        'image' => $theme_uri . '/assets/img/elite/product-gift-set-v2.png',
    ],
];

$latest_products = null;

if (class_exists('WooCommerce')) {
    $latest_products = new WP_Query([
        'post_type'           => 'product',
        'post_status'         => 'publish',
        'posts_per_page'      => 4,
        'ignore_sticky_posts' => true,
        'no_found_rows'       => true,
    ]);
}
?>

<div class="bg-white font-body text-[#101828]">
    <section class="relative overflow-hidden bg-[#F3F7FB]">
        <div class="absolute inset-x-0 top-0 h-24 bg-white"></div>

        <div class="relative mx-auto max-w-7xl px-4 pb-14 pt-10 sm:px-6 lg:px-8 lg:pb-20 lg:pt-16">
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-[1fr_0.9fr] lg:items-stretch lg:gap-8">
                <div class="flex min-h-[520px] flex-col justify-between rounded-[2rem] bg-[#101828] p-6 text-white shadow-2xl shadow-[#101828]/15 sm:p-10 lg:min-h-[560px] lg:p-12">
                    <div>
                        <p class="mb-5 inline-flex rounded-full bg-white/10 px-4 py-2 text-xs font-black uppercase tracking-[0.18em] text-[#67E8F9]">
                            <?php esc_html_e('Modern Lifestyle Essentials', 'dawp'); ?>
                        </p>

                        <h1 class="max-w-4xl font-heading text-4xl font-black uppercase leading-[0.98] text-white sm:text-5xl lg:text-[3.45rem]">
                            <?php esc_html_e('Everyday Essentials, Delivered With Ease', 'dawp'); ?>
                        </h1>

                        <p class="mt-6 max-w-2xl text-lg leading-8 text-white/78">
                            <?php esc_html_e('Discover practical home, beauty, personal care, accessory, and lifestyle products selected for simple daily needs.', 'dawp'); ?>
                        </p>
                    </div>

                    <div>
                        <div class="mt-8 flex flex-wrap gap-4">
                            <a href="<?php echo esc_url(home_url('/shop/')); ?>"
                               class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#2563EB] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#06B6D4]">
                                <?php esc_html_e('Shop Everyday Essentials', 'dawp'); ?>
                            </a>

                            <a href="#shop-by-category"
                               class="inline-flex min-h-12 items-center justify-center rounded-full border border-white/20 px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-[#101828]">
                                <?php esc_html_e('Explore Categories', 'dawp'); ?>
                            </a>
                        </div>

                        <p class="mt-8 max-w-xl border-t border-white/15 pt-5 text-sm font-bold leading-6 text-white/70">
                            <?php esc_html_e('Useful finds. Clear support. Simple everyday shopping.', 'dawp'); ?>
                        </p>
                    </div>
                </div>

                <div class="min-h-[360px] lg:min-h-[560px]">
                    <div class="relative h-full overflow-hidden rounded-[2rem] bg-white p-3 shadow-2xl shadow-[#101828]/12">
                        <img src="<?php echo esc_url($hero_img); ?>"
                             alt="<?php esc_attr_e('Bright lifestyle arrangement of home, beauty, personal care, and everyday accessories', 'dawp'); ?>"
                             class="h-full min-h-[336px] w-full rounded-[1.4rem] object-cover object-center lg:min-h-[536px]">
                        <div class="pointer-events-none absolute inset-x-3 bottom-3 h-32 rounded-b-[1.4rem] bg-gradient-to-t from-white/75 to-transparent"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="shop-by-category" class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-10 flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-4xl">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#2563EB]"><?php esc_html_e('Shop By Category', 'dawp'); ?></p>
                    <h2 class="font-heading text-3xl font-black uppercase leading-tight text-[#101828] lg:text-4xl">
                        <?php esc_html_e('A cleaner way to browse everyday lifestyle products.', 'dawp'); ?>
                    </h2>
                </div>

                <p class="max-w-sm text-base leading-7 text-[#475467]">
                    <?php esc_html_e('Focused categories keep the store easy to scan and avoid the random marketplace feel.', 'dawp'); ?>
                </p>
            </div>

            <div class="grid grid-cols-1 gap-8 lg:grid-cols-[0.92fr_1.08fr] lg:items-stretch">
                <div class="relative min-h-[360px] overflow-hidden rounded-[2rem] bg-[#101828] shadow-xl shadow-[#101828]/10">
                    <img src="<?php echo esc_url($home_category_overview_img); ?>"
                         alt="<?php esc_attr_e('Everyday lifestyle products arranged in a clean modern shopping scene', 'dawp'); ?>"
                         class="h-full min-h-[360px] w-full object-cover opacity-90">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#101828]/80 via-[#101828]/15 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 sm:p-8">
                        <p class="text-xs font-black uppercase tracking-[0.18em] text-[#67E8F9]"><?php esc_html_e('Curated Range', 'dawp'); ?></p>
                        <p class="mt-3 max-w-md font-heading text-2xl font-black uppercase leading-tight text-white">
                            <?php esc_html_e('Simple categories for daily shopping.', 'dawp'); ?>
                        </p>
                    </div>
                </div>

                <div class="overflow-hidden rounded-[2rem] border border-[#E5E7EB] bg-white">
                    <?php foreach ($category_links as $category) : ?>
                        <a href="<?php echo esc_url($category['url']); ?>"
                           class="group grid grid-cols-[88px_1fr_auto] items-center gap-4 border-b border-[#E5E7EB] p-4 transition last:border-b-0 hover:bg-[#F8FAFC] sm:grid-cols-[116px_1fr_auto] sm:gap-5 sm:p-5">
                            <div class="overflow-hidden rounded-2xl bg-[#F3F7FB]">
                                <img src="<?php echo esc_url($category['image']); ?>"
                                     alt="<?php echo esc_attr($category['alt']); ?>"
                                     class="aspect-square w-full object-cover transition duration-500 group-hover:scale-105">
                            </div>

                            <div class="min-w-0">
                                <span class="mb-3 block h-1.5 w-12 rounded-full" style="background-color: <?php echo esc_attr($category['accent']); ?>"></span>
                                <h3 class="font-heading text-lg font-black uppercase leading-tight text-[#101828] sm:text-xl">
                                    <?php echo esc_html($category['name']); ?>
                                </h3>
                                <p class="mt-2 line-clamp-2 text-sm leading-6 text-[#475467]">
                                    <?php echo esc_html($category['copy']); ?>
                                </p>
                            </div>

                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#F2F4F7] text-lg font-black text-[#101828] transition group-hover:bg-[#101828] group-hover:text-white" aria-hidden="true">+</span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#F3F7FB] py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-10 flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-3xl">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#06B6D4]"><?php esc_html_e('New Everyday Finds', 'dawp'); ?></p>
                    <h2 class="font-heading text-3xl font-black uppercase leading-tight text-[#101828] lg:text-4xl">
                        <?php esc_html_e('Fresh picks for simple daily needs.', 'dawp'); ?>
                    </h2>
                    <p class="mt-4 text-base leading-7 text-[#475467]">
                        <?php esc_html_e('Browse practical products selected for home routines, personal care, accessories, travel, and thoughtful gifting.', 'dawp'); ?>
                    </p>
                </div>

                <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#101828] px-6 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#2563EB]">
                    <?php esc_html_e('Shop All Products', 'dawp'); ?>
                </a>
            </div>

            <div class="grid grid-cols-2 gap-4 lg:grid-cols-4 lg:gap-6">
                <?php if ($latest_products instanceof WP_Query && $latest_products->have_posts()) : ?>
                    <?php while ($latest_products->have_posts()) : $latest_products->the_post(); ?>
                        <?php
                        $product = function_exists('wc_get_product') ? wc_get_product(get_the_ID()) : null;
                        $image   = get_the_post_thumbnail_url(get_the_ID(), 'woocommerce_thumbnail') ?: $hero_img;
                        ?>
                        <article class="group overflow-hidden rounded-[1.5rem] border border-[#E5E7EB] bg-white p-3 shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-[#101828]/10">
                            <a href="<?php the_permalink(); ?>" class="block overflow-hidden rounded-[1.1rem] bg-[#F3F7FB]">
                                <img src="<?php echo esc_url($image); ?>"
                                     alt="<?php echo esc_attr(get_the_title()); ?>"
                                     class="aspect-[4/5] w-full object-cover transition duration-500 group-hover:scale-105">
                            </a>
                            <div class="p-3">
                                <p class="mb-2 inline-flex rounded-full bg-[#DBEAFE] px-3 py-1 text-xs font-black uppercase tracking-[0.14em] text-[#2563EB]">
                                    <?php esc_html_e('Everyday Pick', 'dawp'); ?>
                                </p>
                                <h3 class="line-clamp-2 min-h-12 font-heading text-lg font-black uppercase leading-snug text-[#101828]">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <?php if ($product) : ?>
                                    <div class="mt-3 text-base font-black text-[#2563EB]"><?php echo wp_kses_post($product->get_price_html()); ?></div>
                                <?php endif; ?>
                                <a href="<?php the_permalink(); ?>" class="mt-4 inline-flex min-h-10 w-full items-center justify-center rounded-full bg-[#101828] px-4 text-xs font-black uppercase tracking-wide text-white transition hover:bg-[#2563EB]">
                                    <?php esc_html_e('View Details', 'dawp'); ?>
                                </a>
                            </div>
                        </article>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php else : ?>
                    <?php foreach ($fallback_products as $product) : ?>
                        <article class="overflow-hidden rounded-[1.5rem] border border-[#E5E7EB] bg-white p-3 shadow-sm">
                            <div class="overflow-hidden rounded-[1.1rem] bg-[#F8FAFC]">
                                <img src="<?php echo esc_url($product['image']); ?>"
                                     alt="<?php echo esc_attr($product['title']); ?>"
                                     class="aspect-[4/5] w-full object-cover">
                            </div>
                            <div class="p-3">
                                <p class="mb-2 inline-flex rounded-full bg-[#DBEAFE] px-3 py-1 text-xs font-black uppercase tracking-[0.14em] text-[#2563EB]">
                                    <?php echo esc_html($product['tag']); ?>
                                </p>
                                <h3 class="min-h-12 font-heading text-lg font-black uppercase leading-snug text-[#101828]">
                                    <?php echo esc_html($product['title']); ?>
                                </h3>
                                <p class="mt-3 text-base font-black text-[#2563EB]"><?php echo esc_html($product['price']); ?></p>
                                <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="mt-4 inline-flex min-h-10 w-full items-center justify-center rounded-full bg-[#101828] px-4 text-xs font-black uppercase tracking-wide text-white transition hover:bg-[#2563EB]">
                                    <?php esc_html_e('Shop Now', 'dawp'); ?>
                                </a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:items-center lg:gap-16 lg:px-8">
            <div class="overflow-hidden rounded-[1.75rem] bg-[#EEF2FF] p-3 shadow-xl shadow-[#101828]/10">
                <img src="<?php echo esc_url($home_essentials_img); ?>"
                     alt="<?php esc_attr_e('Organized home and lifestyle essentials on a clean surface', 'dawp'); ?>"
                     class="aspect-[4/5] w-full rounded-[1.25rem] object-cover sm:aspect-[5/4] lg:aspect-[4/5]">
            </div>

            <div class="flex flex-col justify-center lg:pl-2">
                <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#2563EB]"><?php esc_html_e('Home & Lifestyle Essentials', 'dawp'); ?></p>
                <h2 class="max-w-3xl font-heading text-3xl font-black uppercase leading-tight text-[#101828] lg:text-4xl">
                    <?php esc_html_e('Practical finds for organized daily living.', 'dawp'); ?>
                </h2>
                <p class="mt-5 max-w-2xl text-base leading-8 text-[#475467]">
                    <?php esc_html_e('Explore everyday products for home routines, storage, organization, travel, and simple lifestyle needs selected to make daily tasks easier without overcomplicating your space.', 'dawp'); ?>
                </p>

                <div class="mt-8 grid grid-cols-1 gap-3 sm:grid-cols-2">
                    <?php foreach ([__('Home organization', 'dawp'), __('Daily convenience', 'dawp'), __('Travel-friendly finds', 'dawp'), __('Useful lifestyle accessories', 'dawp')] as $highlight) : ?>
                        <div class="min-h-[58px] border-l-4 border-[#2563EB] bg-[#F8FAFC] px-5 py-4">
                            <p class="font-bold text-[#101828]"><?php echo esc_html($highlight); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="<?php echo esc_url(dawp_get_product_category_url('home-essentials')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#2563EB] px-6 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#06B6D4]">
                        <?php esc_html_e('Shop Home Essentials', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url(dawp_get_product_category_url('lifestyle-accessories')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#2563EB]/25 px-6 text-sm font-black uppercase tracking-wide text-[#2563EB] transition hover:bg-[#F3F7FB]">
                        <?php esc_html_e('Explore Lifestyle Finds', 'dawp'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#FDF4FF] py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:items-center">
                <div>
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#C026D3]"><?php esc_html_e('Beauty, Personal Care & Accessories', 'dawp'); ?></p>
                    <h2 class="font-heading text-3xl font-black uppercase leading-tight text-[#101828] lg:text-4xl">
                        <?php esc_html_e('Simple essentials for routines, style, and self-care.', 'dawp'); ?>
                    </h2>
                    <p class="mt-5 text-base leading-8 text-[#475467]">
                        <?php esc_html_e('From personal care accessories to beauty organizers and everyday style pieces, Meridova brings together practical finds designed for simple routines and polished daily living.', 'dawp'); ?>
                    </p>
                    <a href="<?php echo esc_url(dawp_get_product_category_url('beauty-personal-care')); ?>" class="mt-8 inline-flex min-h-12 items-center justify-center rounded-full bg-[#C026D3] px-6 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#101828]">
                        <?php esc_html_e('Explore Personal Care & Accessories', 'dawp'); ?>
                    </a>
                </div>

                <div class="overflow-hidden rounded-[2rem] bg-white shadow-xl shadow-[#86198F]/10">
                    <div class="grid grid-cols-1 sm:grid-cols-[0.85fr_1.15fr]">
                        <img src="<?php echo esc_url($beauty_accessories_img); ?>"
                             alt="<?php esc_attr_e('Beauty personal care fashion accessory and giftable products in a bright lifestyle scene', 'dawp'); ?>"
                             class="h-full min-h-[380px] w-full object-cover">

                        <div class="divide-y divide-[#F3E8FF]">
                            <div class="p-6">
                                <span class="text-xs font-black uppercase tracking-[0.16em] text-[#C026D3]"><?php esc_html_e('Beauty & Personal Care', 'dawp'); ?></span>
                                <p class="mt-3 text-sm leading-6 text-[#475467]"><?php esc_html_e('Everyday items for simple self-care and beauty routines.', 'dawp'); ?></p>
                            </div>
                            <div class="p-6">
                                <span class="text-xs font-black uppercase tracking-[0.16em] text-[#EA580C]"><?php esc_html_e('Fashion Accessories', 'dawp'); ?></span>
                                <p class="mt-3 text-sm leading-6 text-[#475467]"><?php esc_html_e('Small style pieces for daily outfits and personal looks.', 'dawp'); ?></p>
                            </div>
                            <div class="p-6">
                                <span class="text-xs font-black uppercase tracking-[0.16em] text-[#65A30D]"><?php esc_html_e('Giftable Finds', 'dawp'); ?></span>
                                <p class="mt-3 text-sm leading-6 text-[#475467]"><?php esc_html_e('Useful products that make thoughtful everyday gifts.', 'dawp'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#101828] py-12 text-white lg:py-16">
        <div class="mx-auto max-w-3xl px-4 text-center sm:px-6 lg:px-8">
            <p class="mb-2 text-xs font-black uppercase tracking-[0.18em] text-[#67E8F9]"><?php esc_html_e('Customer Care', 'dawp'); ?></p>
            <h2 class="font-heading text-3xl font-black uppercase leading-tight lg:text-[2.1rem]">
                <?php esc_html_e('Clear support from checkout to delivery.', 'dawp'); ?>
            </h2>
            <p class="mx-auto mt-3 max-w-2xl text-sm leading-7 text-white/72">
                <?php esc_html_e('Shop everyday essentials with clear product details, order tracking, and customer support when you need help.', 'dawp'); ?>
            </p>

            <form id="notify-signup" class="mx-auto mt-6 flex max-w-2xl flex-col gap-3 rounded-full border border-white/15 bg-white/10 p-2 sm:flex-row" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                <input type="hidden" name="action" value="dawp_notification_signup">
                <?php wp_nonce_field('dawp_notification_signup', 'dawp_notify_nonce'); ?>
                <label class="sr-only" for="notify-email"><?php esc_html_e('Email address', 'dawp'); ?></label>
                <input id="notify-email" name="notify_email" type="email" autocomplete="email" required placeholder="<?php esc_attr_e('Enter your email for updates', 'dawp'); ?>" class="min-h-11 flex-1 rounded-full border border-white/15 bg-white px-5 text-sm font-bold text-[#101828] outline-none transition placeholder:text-[#667085] focus:border-[#67E8F9] focus:ring-2 focus:ring-[#67E8F9]">
                <label class="sr-only" for="notify-website"><?php esc_html_e('Website', 'dawp'); ?></label>
                <input id="notify-website" name="website" type="text" tabindex="-1" autocomplete="off" class="hidden">
                <button type="submit" class="inline-flex min-h-11 shrink-0 items-center justify-center rounded-full bg-[#2563EB] px-6 text-xs font-black uppercase tracking-wide text-white transition hover:bg-[#06B6D4]">
                    <?php esc_html_e('Notify Me', 'dawp'); ?>
                </button>
            </form>

            <?php if ('success' === $notify_signup_status) : ?>
                <p class="mx-auto mt-3 max-w-2xl rounded-full bg-white/10 px-4 py-3 text-sm font-bold text-[#A3E635]">
                    <?php esc_html_e('Thanks. We will send updates to that email address.', 'dawp'); ?>
                </p>
            <?php elseif ('invalid' === $notify_signup_status) : ?>
                <p class="mx-auto mt-3 max-w-2xl rounded-full bg-white/10 px-4 py-3 text-sm font-bold text-[#FACC15]">
                    <?php esc_html_e('Please enter a valid email address.', 'dawp'); ?>
                </p>
            <?php elseif ('error' === $notify_signup_status) : ?>
                <p class="mx-auto mt-3 max-w-2xl rounded-full bg-white/10 px-4 py-3 text-sm font-bold text-[#FACC15]">
                    <?php esc_html_e('We could not save your email. Please try again.', 'dawp'); ?>
                </p>
            <?php endif; ?>
        </div>
    </section>
</div>
