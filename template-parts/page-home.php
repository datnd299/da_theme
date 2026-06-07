<?php
/**
 * Homepage for LBQ Shop.
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

$new_arrivals_url = add_query_arg('orderby', 'date', $shop_url);
$support_email    = 'support@lbqshop.com';
$business_hours   = __('Monday - Friday, 9:00 AM - 5:00 PM, GMT-08:00 Pacific Standard Time', 'dawp');
$home_products_query = null;

if (class_exists('WooCommerce')) {
    $home_product_tax_query = [];

    if (function_exists('wc_get_product_visibility_term_ids')) {
        $product_visibility_term_ids = wc_get_product_visibility_term_ids();
        $excluded_visibility_terms   = [];

        if (!empty($product_visibility_term_ids['exclude-from-catalog'])) {
            $excluded_visibility_terms[] = $product_visibility_term_ids['exclude-from-catalog'];
        }

        if ('yes' === get_option('woocommerce_hide_out_of_stock_items') && !empty($product_visibility_term_ids['outofstock'])) {
            $excluded_visibility_terms[] = $product_visibility_term_ids['outofstock'];
        }

        if (!empty($excluded_visibility_terms)) {
            $home_product_tax_query[] = [
                'taxonomy' => 'product_visibility',
                'field'    => 'term_taxonomy_id',
                'terms'    => $excluded_visibility_terms,
                'operator' => 'NOT IN',
            ];
        }
    }

    $home_products_query = new WP_Query([
        'post_type'           => 'product',
        'post_status'         => 'publish',
        'posts_per_page'      => 4,
        'orderby'             => 'date',
        'order'               => 'DESC',
        'ignore_sticky_posts' => true,
        'no_found_rows'       => true,
        'tax_query'           => $home_product_tax_query,
    ]);
}

$lbq_category_term = static function ($slug) {
    if (!function_exists('get_term_by')) {
        return null;
    }

    $term = get_term_by('slug', $slug, 'product_cat');

    return ($term && !is_wp_error($term)) ? $term : null;
};

$lbq_category_link = static function ($term) use ($shop_url) {
    if (!$term || !function_exists('get_term_link')) {
        return $shop_url;
    }

    $link = get_term_link($term);

    return is_wp_error($link) ? $shop_url : $link;
};

$home_image_base = trailingslashit(get_theme_file_uri('assets/img/home'));

$stock_images = [
    'hero'       => $home_image_base . 'hero-beauty-style.png',
    'drawer'     => $home_image_base . 'makeup-organizers.png',
    'brushes'    => $home_image_base . 'beauty-accessories.png',
    'flat_lay'   => $home_image_base . 'beauty-fashion-flat-lay.png',
    'fashion'    => $home_image_base . 'fashion-accessories.png',
    'gift'       => $home_image_base . 'giftable-finds.png',
    'essentials' => $home_image_base . 'everyday-essentials.png',
];

$preferred_categories = [
    [
        'name'        => __('Beauty Accessories', 'dawp'),
        'slug'        => 'beauty-accessories',
        'description' => __('Useful beauty tools and small accessories designed to support simple everyday routines.', 'dawp'),
        'image'       => $stock_images['brushes'],
        'alt'         => __('Makeup brushes stored neatly in small holders', 'dawp'),
    ],
    [
        'name'        => __('Makeup Bags & Organizers', 'dawp'),
        'slug'        => 'makeup-bags-organizers',
        'description' => __('Travel-friendly cosmetic bags and organizers that help keep beauty items neat and easy to find.', 'dawp'),
        'image'       => $stock_images['drawer'],
        'alt'         => __('Cosmetic bags and beauty tools organized in a clean vanity drawer', 'dawp'),
    ],
    [
        'name'        => __('Fashion Accessories', 'dawp'),
        'slug'        => 'fashion-accessories',
        'description' => __('Simple style accents for everyday outfits, from hair accessories to small carry pieces.', 'dawp'),
        'image'       => $stock_images['fashion'],
        'alt'         => __('Daily fashion accessories arranged as a clean flat lay', 'dawp'),
    ],
    [
        'name'        => __('Everyday Style Essentials', 'dawp'),
        'slug'        => 'everyday-style-essentials',
        'description' => __('Practical accessories for daily beauty, travel, organization, and personal style.', 'dawp'),
        'image'       => $stock_images['essentials'],
        'alt'         => __('Small pouches and everyday accessories arranged on a white surface', 'dawp'),
    ],
    [
        'name'        => __('Giftable Finds', 'dawp'),
        'slug'        => 'giftable-finds',
        'description' => __('Pretty, practical accessories made for thoughtful everyday gifting.', 'dawp'),
        'image'       => $stock_images['gift'],
        'alt'         => __('Pink beauty accessories arranged for a giftable flat lay', 'dawp'),
    ],
];

$categories     = [];

foreach ($preferred_categories as $category) {
    $term = $lbq_category_term($category['slug']);

    if (!$term) {
        continue;
    }

    $term_description = term_description($term->term_id, 'product_cat');

    $categories[] = [
        'name'        => $term->name,
        'description' => $term_description ? wp_strip_all_tags($term_description) : $category['description'],
        'url'         => $lbq_category_link($term),
        'image'       => $category['image'],
        'alt'         => $category['alt'],
    ];
}

$organizer_term = $lbq_category_term('makeup-bags-organizers');
$organizer_url  = $lbq_category_link($organizer_term);
$organizer_label = $organizer_term ? __('Shop Makeup Organizers', 'dawp') : __('Shop All Products', 'dawp');

$organizer_points = [
    __('Compact cases for travel and daily carry', 'dawp'),
    __('Storage ideas for brushes, palettes, and small tools', 'dawp'),
    __('Simple designs for a cleaner vanity setup', 'dawp'),
    __('Easy-to-use pieces for home or on the go', 'dawp'),
];

$fashion_points = [
    [
        'title' => __('Small Outfit Accents', 'dawp'),
        'copy'  => __('Hair clips, pouches, scarves, and simple details that fit regular daily looks.', 'dawp'),
    ],
    [
        'title' => __('Easy Everyday Styling', 'dawp'),
        'copy'  => __('Wearable accessories selected for clean, feminine style without counterfeit branding.', 'dawp'),
    ],
    [
        'title' => __('Gift-Friendly Finds', 'dawp'),
        'copy'  => __('Practical beauty and fashion accessories that feel thoughtful, useful, and easy to give.', 'dawp'),
    ],
];

$product_placeholders = [
    [
        'name'     => __('Makeup Organizer', 'dawp'),
        'category' => __('Beauty storage', 'dawp'),
        'image'    => $stock_images['drawer'],
        'alt'      => __('Cosmetic bags and beauty tools organized in a clean vanity drawer', 'dawp'),
    ],
    [
        'name'     => __('Beauty Tool Set', 'dawp'),
        'category' => __('Beauty accessories', 'dawp'),
        'image'    => $stock_images['brushes'],
        'alt'      => __('Makeup brushes stored neatly in small holders', 'dawp'),
    ],
    [
        'name'     => __('Everyday Pouch', 'dawp'),
        'category' => __('Daily essentials', 'dawp'),
        'image'    => $stock_images['essentials'],
        'alt'      => __('Small pouches and everyday accessories arranged on a white surface', 'dawp'),
    ],
    [
        'name'     => __('Giftable Accessory', 'dawp'),
        'category' => __('Giftable finds', 'dawp'),
        'image'    => $stock_images['gift'],
        'alt'      => __('Pink beauty accessories arranged for a giftable flat lay', 'dawp'),
    ],
];

$trust_cards = [
    [
        'title' => __('Clear Support', 'dawp'),
        'copy'  => sprintf(
            /* translators: %s: support email address */
            __('Questions about an order or product? Contact %s during business hours.', 'dawp'),
            $support_email
        ),
        'icon'  => 'mail',
    ],
    [
        'title' => __('Order Tracking', 'dawp'),
        'copy'  => __('A shipping confirmation email with tracking details is sent once your order is dispatched.', 'dawp'),
        'icon'  => 'truck',
    ],
    [
        'title' => __('Transparent Shipping', 'dawp'),
        'copy'  => __('Standard U.S. shipping is free. Orders use a 5:00 PM (GMT-08:00) Pacific Standard Time cutoff, 1-3 business day handling, and 5-7 business day transit.', 'dawp'),
        'icon'  => 'calendar',
    ],
    [
        'title' => __('30-Day Returns', 'dawp'),
        'copy'  => __('Returns and exchanges are accepted within 30 days of delivery for eligible unused items in original condition.', 'dawp'),
        'icon'  => 'refresh',
    ],
];

$render_icon = static function ($icon) {
    $icons = [
        'bag'      => '<path d="M6 8h12l1 13H5L6 8Z"/><path d="M9 8a3 3 0 0 1 6 0"/>',
        'mail'     => '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-10 6L2 7"/>',
        'truck'    => '<path d="M10 17h4V5H3v12h2"/><path d="M14 8h4l3 3v6h-3"/><circle cx="7" cy="17" r="2"/><circle cx="16" cy="17" r="2"/>',
        'calendar' => '<path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/>',
        'refresh'  => '<path d="M20 12a8 8 0 0 1-13.66 5.66L4 15"/><path d="M4 20v-5h5"/><path d="M4 12A8 8 0 0 1 17.66 6.34L20 9"/><path d="M20 4v5h-5"/>',
        'sparkle'  => '<path d="m12 3 1.9 5.8L20 11l-6.1 2.2L12 19l-1.9-5.8L4 11l6.1-2.2L12 3Z"/>',
    ];

    return $icons[$icon] ?? $icons['bag'];
};
?>

<div class="bg-white text-[#2F2A28]">
    <section class="relative isolate flex min-h-[70svh] items-center overflow-hidden bg-[#F8F2EE] py-16" aria-labelledby="lbq-hero-title">
        <?php echo dawp_get_responsive_image($stock_images['hero'], __('Open blush makeup bag with beauty and fashion accessories on a clean vanity', 'dawp'), 'absolute inset-0 -z-20 h-full w-full object-cover', 1920, 1080, 'eager'); ?>
        <div class="absolute inset-0 -z-10 bg-[#2E2320]/55" aria-hidden="true"></div>

        <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl text-white">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#F6D5CF]">
                    <?php esc_html_e('Beauty & fashion accessories', 'dawp'); ?>
                </p>
                <h1 id="lbq-hero-title" class="mt-5 font-heading text-4xl font-extrabold leading-tight sm:text-5xl lg:text-6xl">
                    <?php esc_html_e('Beauty & Style Essentials For Everyday Confidence', 'dawp'); ?>
                </h1>
                <p class="mt-6 max-w-xl text-base leading-8 text-white/90 sm:text-lg">
                    <?php esc_html_e('Discover practical makeup bags, beauty organizers, fashion accessories, and small everyday finds designed to keep routines simple, polished, and easy to carry.', 'dawp'); ?>
                </p>

                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url($new_arrivals_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#C87F86] px-6 text-sm font-bold text-white transition hover:bg-[#2F2A28]">
                        <?php esc_html_e('Shop New Arrivals', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-white/70 bg-white/10 px-6 text-sm font-bold text-white backdrop-blur transition hover:bg-white hover:text-[#2F2A28]">
                        <?php esc_html_e('Shop All', 'dawp'); ?>
                    </a>
                </div>

                <div class="mt-8 grid max-w-xl gap-3 text-sm font-semibold text-white/90 sm:grid-cols-3">
                    <span class="border-l border-[#F6D5CF] pl-3"><?php esc_html_e('Organized beauty routines', 'dawp'); ?></span>
                    <span class="border-l border-[#F6D5CF] pl-3"><?php esc_html_e('Everyday style accents', 'dawp'); ?></span>
                    <span class="border-l border-[#F6D5CF] pl-3"><?php esc_html_e('Giftable practical finds', 'dawp'); ?></span>
                </div>
            </div>
        </div>
    </section>

    <section id="shop-by-category" class="bg-[#FFFDFC] py-14 sm:py-20" aria-labelledby="category-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-3xl">
                    <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A96870]"><?php esc_html_e('Shop By Category', 'dawp'); ?></p>
                    <h2 id="category-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#2F2A28] sm:text-4xl">
                        <?php esc_html_e('Focused finds for beauty, organization, and daily style.', 'dawp'); ?>
                    </h2>
                    <p class="mt-4 text-base leading-7 text-[#6F625D]">
                        <?php esc_html_e('Browse a clean selection of beauty accessories, makeup organizers, fashion accents, everyday essentials, and small giftable pieces.', 'dawp'); ?>
                    </p>
                </div>
                <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#C87F86] px-6 text-sm font-bold text-[#8A4F56] transition hover:bg-[#FBEDEA]">
                    <?php esc_html_e('Shop All Products', 'dawp'); ?>
                </a>
            </div>

            <?php if (!empty($categories)) : ?>
            <div class="home-category-slider mt-8 sm:mt-10">
                <?php foreach ($categories as $category) : ?>
                    <a href="<?php echo esc_url($category['url']); ?>" class="home-category-card group">
                        <?php echo dawp_get_responsive_image($category['image'], $category['alt'], 'home-category-card__image', 800, 1000); ?>
                        <div class="home-category-card__body">
                            <h3 class="home-category-card__title"><?php echo esc_html($category['name']); ?></h3>
                            <p class="home-category-card__copy"><?php echo esc_html($category['description']); ?></p>
                            <span class="home-category-card__cta">
                                <?php esc_html_e('Shop category', 'dawp'); ?>
                                <span class="ml-2" aria-hidden="true">-&gt;</span>
                            </span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
            <?php else : ?>
                <?php if ($home_products_query instanceof WP_Query && $home_products_query->have_posts()) : ?>
                    <div class="home-product-loop shop-main woocommerce mt-10">
                        <?php
                        if (function_exists('wc_setup_loop')) {
                            wc_setup_loop([
                                'columns'      => 4,
                                'is_shortcode' => true,
                                'name'         => 'home-products',
                            ]);
                        }

                        woocommerce_product_loop_start();

                        while ($home_products_query->have_posts()) :
                            $home_products_query->the_post();
                            wc_get_template_part('content', 'product');
                        endwhile;

                        woocommerce_product_loop_end();

                        if (function_exists('woocommerce_reset_loop')) {
                            woocommerce_reset_loop();
                        }

                        wp_reset_postdata();
                        ?>
                    </div>
                <?php else : ?>
                    <div class="mt-10 rounded-md border border-[#E8DAD4] bg-white p-6">
                        <h3 class="font-heading text-xl font-extrabold text-[#2F2A28]"><?php esc_html_e('Browse LBQ Shop', 'dawp'); ?></h3>
                        <p class="mt-3 max-w-2xl text-sm leading-6 text-[#6F625D]"><?php esc_html_e('Products are being added. Browse the shop to see every available item.', 'dawp'); ?></p>
                        <a href="<?php echo esc_url($shop_url); ?>" class="mt-5 inline-flex min-h-12 items-center justify-center rounded-md bg-[#2F2A28] px-6 text-sm font-bold text-white transition hover:bg-[#8A4F56]">
                            <?php esc_html_e('Browse All Products', 'dawp'); ?>
                        </a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </section>

    <section class="bg-white py-14 sm:py-20" aria-labelledby="featured-products-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-3xl">
                    <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A96870]"><?php esc_html_e('New In Store', 'dawp'); ?></p>
                    <h2 id="featured-products-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#2F2A28] sm:text-4xl">
                        <?php esc_html_e('Find what you came for', 'dawp'); ?>
                    </h2>
                    <p class="mt-4 text-base leading-7 text-[#6F625D]">
                        <?php esc_html_e('A ready product area for your WooCommerce import. Once products are published, this section will show the latest items automatically.', 'dawp'); ?>
                    </p>
                </div>
                <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#C87F86] px-6 text-sm font-bold text-[#8A4F56] transition hover:bg-[#FBEDEA]">
                    <?php esc_html_e('View Shop', 'dawp'); ?>
                </a>
            </div>

            <?php if ($home_products_query instanceof WP_Query && $home_products_query->have_posts()) : ?>
                <div class="mt-10 grid grid-cols-2 gap-3 sm:gap-5 lg:grid-cols-4">
                    <?php
                    while ($home_products_query->have_posts()) :
                        $home_products_query->the_post();
                        $product = function_exists('wc_get_product') ? wc_get_product(get_the_ID()) : null;

                        if (!$product) {
                            continue;
                        }

                        $product_categories = get_the_terms($product->get_id(), 'product_cat');
                        $product_category   = __('LBQ Shop', 'dawp');

                        if (!empty($product_categories) && !is_wp_error($product_categories)) {
                            foreach ($product_categories as $category_term) {
                                if (function_exists('dawp_is_lbq_product_category_slug') && !dawp_is_lbq_product_category_slug($category_term->slug)) {
                                    continue;
                                }

                                $product_category = $category_term->name;
                                break;
                            }
                        }
                        ?>
                        <article class="group overflow-hidden rounded-md border border-[#E8DAD4] bg-[#FFFDFC] transition hover:-translate-y-1 hover:shadow-xl hover:shadow-[#8A4F56]/10">
                            <a href="<?php the_permalink(); ?>" class="block" aria-label="<?php the_title_attribute(); ?>">
                                <div class="relative overflow-hidden bg-[#F8F2EE]">
                                    <?php echo $product->get_image('woocommerce_single', ['class' => 'aspect-[4/5] w-full object-cover transition duration-300 group-hover:scale-105', 'loading' => 'lazy']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                    <?php if ($product->is_on_sale()) : ?>
                                        <span class="absolute left-4 top-4 rounded-md bg-[#C87F86] px-3 py-1 text-xs font-extrabold uppercase tracking-[0.12em] text-white">
                                            <?php esc_html_e('Sale', 'dawp'); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="p-3 sm:p-5">
                                    <p class="text-xs font-extrabold uppercase tracking-[0.12em] text-[#A96870]"><?php echo esc_html($product_category); ?></p>
                                    <h3 class="mt-2 font-heading text-sm font-extrabold leading-snug text-[#2F2A28] sm:text-lg"><?php the_title(); ?></h3>
                                    <div class="mt-3 text-sm font-extrabold text-[#8A4F56] sm:mt-4 sm:text-base">
                                        <?php echo wp_kses_post($product->get_price_html()); ?>
                                    </div>
                                </div>
                            </a>
                        </article>
                    <?php endwhile; ?>
                </div>
                <?php
                wp_reset_postdata();
                $home_products_query->rewind_posts();
                ?>
            <?php else : ?>
                <div class="mt-10 grid grid-cols-2 gap-3 sm:gap-5 lg:grid-cols-4">
                    <?php foreach ($product_placeholders as $placeholder) : ?>
                        <article class="overflow-hidden rounded-md border border-dashed border-[#D8C5BE] bg-[#FFFDFC]">
                            <div class="relative overflow-hidden bg-[#F8F2EE]">
                                <?php echo dawp_get_responsive_image($placeholder['image'], $placeholder['alt'], 'aspect-[4/5] w-full object-cover opacity-80', 800, 1000); ?>
                                <span class="absolute left-4 top-4 rounded-md bg-white/90 px-3 py-1 text-xs font-extrabold uppercase tracking-[0.12em] text-[#8A4F56]">
                                    <?php esc_html_e('Coming soon', 'dawp'); ?>
                                </span>
                            </div>
                            <div class="p-3 sm:p-5">
                                <p class="text-xs font-extrabold uppercase tracking-[0.12em] text-[#A96870]"><?php echo esc_html($placeholder['category']); ?></p>
                                <h3 class="mt-2 font-heading text-sm font-extrabold leading-snug text-[#2F2A28] sm:text-lg"><?php echo esc_html($placeholder['name']); ?></h3>
                                <p class="mt-3 text-sm font-bold text-[#6F625D] sm:mt-4"><?php esc_html_e('WooCommerce product slot', 'dawp'); ?></p>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="bg-[#F8F2EE] py-14 sm:py-20" aria-labelledby="organizer-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.96fr_1.04fr] lg:items-center lg:px-8">
            <div class="sm:hidden" data-organizer-gallery>
                <div class="-mx-4 flex snap-x snap-mandatory gap-4 overflow-x-auto overscroll-x-contain px-4 pb-2 scroll-smooth [scrollbar-width:none] [&::-webkit-scrollbar]:hidden" data-organizer-gallery-track>
                    <?php echo dawp_get_responsive_image($stock_images['drawer'], __('A clean makeup drawer with cosmetic bags, brushes, palettes, and small beauty items', 'dawp'), 'aspect-[4/5] w-[86%] shrink-0 snap-center rounded-md object-cover shadow-sm', 800, 1000); ?>
                    <?php echo dawp_get_responsive_image($stock_images['brushes'], __('Makeup brushes arranged in small holders', 'dawp'), 'aspect-[4/5] w-[86%] shrink-0 snap-center rounded-md object-cover shadow-sm', 800, 1000); ?>
                    <?php echo dawp_get_responsive_image($stock_images['flat_lay'], __('Beauty and fashion accessories arranged on a tabletop', 'dawp'), 'aspect-[4/5] w-[86%] shrink-0 snap-center rounded-md object-cover shadow-sm', 800, 1000); ?>
                </div>
                <div class="mt-4 flex justify-center gap-2" aria-label="<?php esc_attr_e('Makeup organizer image slider controls', 'dawp'); ?>">
                    <button type="button" class="h-2.5 w-2.5 rounded-full bg-[#2F2A28]" aria-label="<?php esc_attr_e('Show makeup drawer image', 'dawp'); ?>" aria-current="true" data-organizer-slide-dot="0"></button>
                    <button type="button" class="h-2.5 w-2.5 rounded-full bg-[#D8C5BE]" aria-label="<?php esc_attr_e('Show makeup brush holder image', 'dawp'); ?>" data-organizer-slide-dot="1"></button>
                    <button type="button" class="h-2.5 w-2.5 rounded-full bg-[#D8C5BE]" aria-label="<?php esc_attr_e('Show beauty accessories image', 'dawp'); ?>" data-organizer-slide-dot="2"></button>
                </div>
            </div>

            <div class="hidden gap-4 sm:grid sm:grid-cols-5">
                <?php echo dawp_get_responsive_image($stock_images['drawer'], __('A clean makeup drawer with cosmetic bags, brushes, palettes, and small beauty items', 'dawp'), 'aspect-[4/5] w-full rounded-md object-cover shadow-sm sm:col-span-3', 800, 1000); ?>
                <div class="grid gap-4 sm:col-span-2">
                    <?php echo dawp_get_responsive_image($stock_images['brushes'], __('Makeup brushes arranged in small holders', 'dawp'), 'aspect-square w-full rounded-md object-cover shadow-sm', 800, 800); ?>
                    <?php echo dawp_get_responsive_image($stock_images['flat_lay'], __('Beauty and fashion accessories arranged on a tabletop', 'dawp'), 'aspect-square w-full rounded-md object-cover shadow-sm', 800, 800); ?>
                </div>
            </div>

            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A96870]"><?php esc_html_e('Makeup Bags & Beauty Organizers', 'dawp'); ?></p>
                <h2 id="organizer-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#2F2A28] sm:text-4xl">
                    <?php esc_html_e('Keep your beauty routine organized at home or on the go.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-[#6F625D]">
                    <?php esc_html_e('LBQ Shop highlights cosmetic bags, portable organizers, brush storage, vanity pieces, and everyday beauty cases that help small essentials stay neat and easy to reach.', 'dawp'); ?>
                </p>

                <div class="mt-7 grid gap-3 sm:grid-cols-2">
                    <?php foreach ($organizer_points as $point) : ?>
                        <div class="rounded-md border border-[#E8DAD4] bg-white px-4 py-3 text-sm font-bold text-[#2F2A28]">
                            <?php echo esc_html($point); ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <a href="<?php echo esc_url($organizer_url); ?>" class="mt-8 inline-flex min-h-12 items-center justify-center rounded-md bg-[#2F2A28] px-6 text-sm font-bold text-white transition hover:bg-[#8A4F56]">
                    <?php echo esc_html($organizer_label); ?>
                </a>
            </div>
        </div>
    </section>

    <section class="bg-white py-14 sm:py-20" aria-labelledby="fashion-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:items-start">
                <div>
                    <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A96870]"><?php esc_html_e('Fashion Accessories For Daily Looks', 'dawp'); ?></p>
                    <h2 id="fashion-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#2F2A28] sm:text-4xl">
                        <?php esc_html_e('Simple accents that make everyday outfits feel polished.', 'dawp'); ?>
                    </h2>
                    <p class="mt-5 text-base leading-8 text-[#6F625D]">
                        <?php esc_html_e('From small pouches and hair accessories to simple wearable details, the collection stays practical, feminine, and easy to style for regular days.', 'dawp'); ?>
                    </p>

                    <div class="mt-8 grid gap-4">
                        <?php foreach ($fashion_points as $point) : ?>
                            <article class="rounded-md border border-[#E8DAD4] bg-[#FFFDFC] p-5">
                                <div class="flex items-start gap-4">
                                    <span class="mt-1 inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-md bg-[#FBEDEA] text-[#A96870]">
                                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                            <?php echo $render_icon('sparkle'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                        </svg>
                                    </span>
                                    <div>
                                        <h3 class="font-heading text-lg font-extrabold text-[#2F2A28]"><?php echo esc_html($point['title']); ?></h3>
                                        <p class="mt-2 text-sm leading-6 text-[#6F625D]"><?php echo esc_html($point['copy']); ?></p>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="sm:hidden" data-mobile-image-gallery>
                    <div class="-mx-4 flex snap-x snap-mandatory gap-4 overflow-x-auto overscroll-x-contain px-4 pb-2 scroll-smooth [scrollbar-width:none] [&::-webkit-scrollbar]:hidden" data-mobile-image-gallery-track>
                        <?php echo dawp_get_responsive_image($stock_images['fashion'], __('Pouch, scarf, scrunchies, sunglasses, and jewelry arranged as a fashion flat lay', 'dawp'), 'aspect-[4/5] w-[86%] shrink-0 snap-center rounded-md object-cover shadow-sm', 800, 1000); ?>
                        <?php echo dawp_get_responsive_image($stock_images['flat_lay'], __('Beauty and fashion essentials arranged neatly on a tabletop', 'dawp'), 'aspect-[4/5] w-[86%] shrink-0 snap-center rounded-md object-cover shadow-sm', 800, 1000); ?>
                    </div>
                    <div class="mt-4 flex justify-center gap-2" aria-label="<?php esc_attr_e('Fashion accessories image slider controls', 'dawp'); ?>">
                        <button type="button" class="h-2.5 w-2.5 rounded-full bg-[#2F2A28]" aria-label="<?php esc_attr_e('Show fashion accessories image', 'dawp'); ?>" aria-current="true" data-mobile-image-slide-dot="0"></button>
                        <button type="button" class="h-2.5 w-2.5 rounded-full bg-[#D8C5BE]" aria-label="<?php esc_attr_e('Show beauty and fashion essentials image', 'dawp'); ?>" data-mobile-image-slide-dot="1"></button>
                    </div>
                </div>

                <div class="hidden gap-4 sm:grid sm:grid-cols-2">
                    <?php echo dawp_get_responsive_image($stock_images['fashion'], __('Pouch, scarf, scrunchies, sunglasses, and jewelry arranged as a fashion flat lay', 'dawp'), 'aspect-[4/5] w-full rounded-md object-cover shadow-sm sm:mt-12', 800, 1000); ?>
                    <?php echo dawp_get_responsive_image($stock_images['flat_lay'], __('Beauty and fashion essentials arranged neatly on a tabletop', 'dawp'), 'aspect-[4/5] w-full rounded-md object-cover shadow-sm', 800, 1000); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="border-y border-[#E8DAD4] bg-[#F8F2EE] py-14 sm:py-20" aria-labelledby="trust-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[0.84fr_1.16fr] lg:items-start">
                <div>
                    <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A96870]"><?php esc_html_e('Giftable Finds & Customer Care', 'dawp'); ?></p>
                    <h2 id="trust-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#2F2A28] sm:text-4xl">
                        <?php esc_html_e('Pretty, practical finds with clear store support.', 'dawp'); ?>
                    </h2>
                    <p class="mt-5 text-base leading-8 text-[#6F625D]">
                        <?php esc_html_e('Choose small beauty and style accessories for yourself or as thoughtful gifts, with straightforward shipping, tracking, returns, and support details.', 'dawp'); ?>
                    </p>
                    <p class="mt-5 text-sm leading-7 text-[#6F625D]">
                        <?php
                        echo wp_kses(
                            sprintf(
                                /* translators: 1: support email link, 2: business hours */
                                __('Need help? Email %1$s. Business hours: %2$s.', 'dawp'),
                                '<a class="font-bold text-[#8A4F56] underline decoration-[#C87F86]/40 underline-offset-4 transition hover:text-[#2F2A28]" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>',
                                esc_html($business_hours)
                            ),
                            [
                                'a' => [
                                    'class' => [],
                                    'href'  => [],
                                ],
                            ]
                        );
                        ?>
                    </p>

                    <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                        <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#C87F86] px-6 text-sm font-bold text-white transition hover:bg-[#2F2A28]">
                            <?php esc_html_e('View Shipping Policy', 'dawp'); ?>
                        </a>
                        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#C87F86] bg-white px-6 text-sm font-bold text-[#8A4F56] transition hover:bg-[#FBEDEA]">
                            <?php esc_html_e('Contact Support', 'dawp'); ?>
                        </a>
                    </div>
                </div>

                <div class="home-trust-slider grid gap-4 sm:grid-cols-2">
                    <?php foreach ($trust_cards as $card) : ?>
                        <article class="home-trust-card rounded-md border border-[#E8DAD4] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-[#8A4F56]/10">
                            <div class="flex h-12 w-12 items-center justify-center rounded-md bg-[#FBEDEA] text-[#A96870]">
                                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <?php echo $render_icon($card['icon']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </svg>
                            </div>
                            <h3 class="mt-5 font-heading text-lg font-extrabold text-[#2F2A28]"><?php echo esc_html($card['title']); ?></h3>
                            <p class="mt-3 text-sm leading-6 text-[#6F625D]"><?php echo esc_html($card['copy']); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</div>
