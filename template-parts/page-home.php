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
$business_hours   = __('Monday - Friday, 9:00 AM - 6:00 PM EST', 'dawp');
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
$used_term_ids  = [];
$fallback_images = [
    $stock_images['brushes'],
    $stock_images['drawer'],
    $stock_images['fashion'],
    $stock_images['essentials'],
    $stock_images['gift'],
];

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
    $used_term_ids[] = (int) $term->term_id;
}

if (function_exists('get_terms') && count($categories) < 5) {
    $uncategorized = $lbq_category_term('uncategorized');
    $exclude_ids   = $used_term_ids;

    if ($uncategorized) {
        $exclude_ids[] = (int) $uncategorized->term_id;
    }

    $store_categories = get_terms([
        'taxonomy'   => 'product_cat',
        'hide_empty' => false,
        'parent'     => 0,
        'exclude'    => $exclude_ids,
        'number'     => 5 - count($categories),
    ]);

    if (!is_wp_error($store_categories)) {
        foreach ($store_categories as $index => $term) {
            $term_description = term_description($term->term_id, 'product_cat');

            $categories[] = [
                'name'        => $term->name,
                'description' => $term_description ? wp_strip_all_tags($term_description) : __('Explore this collection from LBQ Shop.', 'dawp'),
                'url'         => $lbq_category_link($term),
                'image'       => $fallback_images[$index % count($fallback_images)],
                'alt'         => sprintf(
                    /* translators: %s: product category name */
                    __('Products from the %s category', 'dawp'),
                    $term->name
                ),
            ];
        }
    }
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
        'copy'  => __('Tracking information is provided once your order ships.', 'dawp'),
        'icon'  => 'truck',
    ],
    [
        'title' => __('Transparent Shipping', 'dawp'),
        'copy'  => __('Orders are processed within 2-4 business days. Standard US shipping typically takes 5-10 business days after dispatch.', 'dawp'),
        'icon'  => 'calendar',
    ],
    [
        'title' => __('30-Day Returns', 'dawp'),
        'copy'  => __('Eligible unused items may be returned within 30 days of delivery, with hygiene and original-condition requirements where relevant.', 'dawp'),
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
        <img src="<?php echo esc_url($stock_images['hero']); ?>" alt="<?php esc_attr_e('Open blush makeup bag with beauty and fashion accessories on a clean vanity', 'dawp'); ?>" class="absolute inset-0 -z-20 h-full w-full object-cover" loading="eager" decoding="async">
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
            <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-5">
                <?php foreach ($categories as $category) : ?>
                    <a href="<?php echo esc_url($category['url']); ?>" class="group overflow-hidden rounded-md border border-[#E8DAD4] bg-white transition hover:-translate-y-1 hover:shadow-xl hover:shadow-[#8A4F56]/10">
                        <img src="<?php echo esc_url($category['image']); ?>" alt="<?php echo esc_attr($category['alt']); ?>" class="aspect-[4/3] w-full object-cover transition duration-300 group-hover:scale-105" loading="lazy" decoding="async">
                        <div class="p-5">
                            <h3 class="font-heading text-lg font-extrabold text-[#2F2A28]"><?php echo esc_html($category['name']); ?></h3>
                            <p class="mt-3 text-sm leading-6 text-[#6F625D]"><?php echo esc_html($category['description']); ?></p>
                            <span class="mt-5 inline-flex items-center text-sm font-bold text-[#A96870]">
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

    <section class="bg-[#F8F2EE] py-14 sm:py-20" aria-labelledby="organizer-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.96fr_1.04fr] lg:items-center lg:px-8">
            <div class="grid gap-4 sm:grid-cols-5">
                <img src="<?php echo esc_url($stock_images['drawer']); ?>" alt="<?php esc_attr_e('A clean makeup drawer with cosmetic bags, brushes, palettes, and small beauty items', 'dawp'); ?>" class="aspect-[4/5] w-full rounded-md object-cover shadow-sm sm:col-span-3" loading="lazy" decoding="async">
                <div class="grid gap-4 sm:col-span-2">
                    <img src="<?php echo esc_url($stock_images['brushes']); ?>" alt="<?php esc_attr_e('Makeup brushes arranged in small holders', 'dawp'); ?>" class="aspect-square w-full rounded-md object-cover shadow-sm" loading="lazy" decoding="async">
                    <img src="<?php echo esc_url($stock_images['flat_lay']); ?>" alt="<?php esc_attr_e('Beauty and fashion accessories arranged on a tabletop', 'dawp'); ?>" class="aspect-square w-full rounded-md object-cover shadow-sm" loading="lazy" decoding="async">
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

                <div class="grid gap-4 sm:grid-cols-2">
                    <img src="<?php echo esc_url($stock_images['fashion']); ?>" alt="<?php esc_attr_e('Pouch, scarf, scrunchies, sunglasses, and jewelry arranged as a fashion flat lay', 'dawp'); ?>" class="aspect-[4/5] w-full rounded-md object-cover shadow-sm sm:mt-12" loading="lazy" decoding="async">
                    <img src="<?php echo esc_url($stock_images['flat_lay']); ?>" alt="<?php esc_attr_e('Beauty and fashion essentials arranged neatly on a tabletop', 'dawp'); ?>" class="aspect-[4/5] w-full rounded-md object-cover shadow-sm" loading="lazy" decoding="async">
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
                        <a href="<?php echo esc_url(home_url('/shipping-returns/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#C87F86] px-6 text-sm font-bold text-white transition hover:bg-[#2F2A28]">
                            <?php esc_html_e('View Shipping & Returns', 'dawp'); ?>
                        </a>
                        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#C87F86] bg-white px-6 text-sm font-bold text-[#8A4F56] transition hover:bg-[#FBEDEA]">
                            <?php esc_html_e('Contact Support', 'dawp'); ?>
                        </a>
                    </div>
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                    <?php foreach ($trust_cards as $card) : ?>
                        <article class="rounded-md border border-[#E8DAD4] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-[#8A4F56]/10">
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
