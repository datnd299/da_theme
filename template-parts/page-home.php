<?php
/**
 * Homepage for GraphicShirt.
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
$support_email    = 'support@graphicshirt.com';
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

$graphicshirt_category_term = static function ($slug) {
    if (!function_exists('get_term_by')) {
        return null;
    }

    $term = get_term_by('slug', $slug, 'product_cat');

    return ($term && !is_wp_error($term)) ? $term : null;
};

$graphicshirt_category_link = static function ($term) use ($shop_url) {
    if (!$term || !function_exists('get_term_link')) {
        return $shop_url;
    }

    $link = get_term_link($term);

    return is_wp_error($link) ? $shop_url : $link;
};

$home_image_base = trailingslashit(get_theme_file_uri('assets/img/home'));

$stock_images = [
    'hero' => $home_image_base . 'hero-graphicshirt-americana.png',
    't-shirt' => $home_image_base . 'category-t-shirt.jpg', 'hoodie' => $home_image_base . 'category-hoodie.jpg',
    'polo-shirt' => $home_image_base . 'category-polo-shirt.jpg', 'caps' => $home_image_base . 'category-caps.jpg',
    'flags' => $home_image_base . 'category-flags.jpg', 'metal-sign' => $home_image_base . 'category-metal-sign.jpg',
    'america-250' => $home_image_base . 'category-america-250.jpg',
    'editorial-america-family' => $home_image_base . 'editorial-america-250-family.jpg',
    'editorial-america-flatlay' => $home_image_base . 'editorial-america-250-flatlay.jpg',
    'editorial-hoodie' => $home_image_base . 'editorial-hoodie-lifestyle.jpg',
    'editorial-polo-cap' => $home_image_base . 'editorial-polo-cap.jpg',
    'editorial-decor' => $home_image_base . 'editorial-metal-sign-flag.jpg',
];

$preferred_categories = [
    ['name'=>__('T-shirt','dawp'),'slug'=>'t-shirt','description'=>__('Original patriotic tees for every occasion.','dawp'),'image'=>$stock_images['t-shirt'],'alt'=>__('Patriotic graphic T-shirt','dawp')],
    ['name'=>__('Hoodie','dawp'),'slug'=>'hoodie','description'=>__('Warm patriotic hoodies made to stand out.','dawp'),'image'=>$stock_images['hoodie'],'alt'=>__('Patriotic graphic hoodie','dawp')],
    ['name'=>__('Polo Shirt','dawp'),'slug'=>'polo-shirt','description'=>__('Classic American style with a polished finish.','dawp'),'image'=>$stock_images['polo-shirt'],'alt'=>__('Navy patriotic polo shirt','dawp')],
    ['name'=>__('Caps','dawp'),'slug'=>'caps','description'=>__('Patriotic caps for everyday American style.','dawp'),'image'=>$stock_images['caps'],'alt'=>__('Navy embroidered patriotic cap','dawp')],
    ['name'=>__('Flags','dawp'),'slug'=>'flags','description'=>__('Display American pride at home or outdoors.','dawp'),'image'=>$stock_images['flags'],'alt'=>__('Decorative patriotic flag','dawp')],
    ['name'=>__('Metal Sign','dawp'),'slug'=>'metal-sign','description'=>__('Americana wall decor with lasting character.','dawp'),'image'=>$stock_images['metal-sign'],'alt'=>__('Vintage Americana metal sign','dawp')],
    ['name'=>__('America 250','dawp'),'slug'=>'america-250','description'=>__('Celebrate America’s 250th anniversary in 2026.','dawp'),'image'=>$stock_images['america-250'],'alt'=>__('America 250 commemorative graphic shirt','dawp')],
];

$categories     = [];
$used_term_ids  = [];
$fallback_images = array_values(array_intersect_key($stock_images, array_flip(['t-shirt','hoodie','polo-shirt','caps','flags','metal-sign','america-250'])));

foreach ($preferred_categories as $category) {
    $term = $graphicshirt_category_term($category['slug']);

    if (!$term) {
        continue;
    }

    $term_description = term_description($term->term_id, 'product_cat');

    $categories[] = [
        'name'        => $term->name,
        'description' => $term_description ? wp_strip_all_tags($term_description) : $category['description'],
        'url'         => $graphicshirt_category_link($term),
        'image'       => $category['image'],
        'alt'         => $category['alt'],
    ];
    $used_term_ids[] = (int) $term->term_id;
}

if (function_exists('get_terms') && count($categories) < 7) {
    $uncategorized = $graphicshirt_category_term('uncategorized');
    $exclude_ids   = $used_term_ids;

    if ($uncategorized) {
        $exclude_ids[] = (int) $uncategorized->term_id;
    }

    $store_categories = get_terms([
        'taxonomy'   => 'product_cat',
        'hide_empty' => false,
        'parent'     => 0,
        'exclude'    => $exclude_ids,
        'number'     => 7 - count($categories),
    ]);

    if (!is_wp_error($store_categories)) {
        foreach ($store_categories as $index => $term) {
            $term_description = term_description($term->term_id, 'product_cat');

            $categories[] = [
                'name'        => $term->name,
                'description' => $term_description ? wp_strip_all_tags($term_description) : __('Explore this collection from GraphicShirt.', 'dawp'),
                'url'         => $graphicshirt_category_link($term),
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

$america250_term  = $graphicshirt_category_term('america-250');
$america250_url   = $graphicshirt_category_link($america250_term);
$america250_label = $america250_term ? __('Shop America 250', 'dawp') : __('Shop All Products', 'dawp');

$america250_points = [
    __('Commemorative designs for America’s 250th anniversary', 'dawp'),
    __('Patriotic apparel for celebrations across the country', 'dawp'),
    __('Classic stars, stripes, and heritage-inspired artwork', 'dawp'),
    __('Original gifts made for a once-in-a-generation milestone', 'dawp'),
];

$fashion_points = [
    [
        'title' => __('Small Outfit Accents', 'dawp'),
        'copy'  => __('Graphic shirts, hoodies, caps, flags, and decor designed for American moments.', 'dawp'),
    ],
    [
        'title' => __('Easy Everyday Styling', 'dawp'),
        'copy'  => __('Wearable accessories selected for clean, patriotic style without counterfeit branding.', 'dawp'),
    ],
    [
        'title' => __('Gift-Friendly Finds', 'dawp'),
        'copy'  => __('Practical patriotic apparel and American-inspired decor that feel thoughtful, useful, and easy to give.', 'dawp'),
    ],
];

$trust_cards = [
    [
        'title' => __('Helpful Customer Support', 'dawp'),
        'copy'  => sprintf(
            /* translators: %s: support email address */
            __('Questions about an order or product? Contact %s during business hours.', 'dawp'),
            $support_email
        ),
        'icon'  => 'mail',
    ],
    [
        'title' => __('Track Every Order', 'dawp'),
        'copy'  => __('We send tracking information as soon as your order is printed, packed, and on its way.', 'dawp'),
        'icon'  => 'truck',
    ],
    [
        'title' => __('Clear Processing & Shipping', 'dawp'),
        'copy'  => __('Orders are processed within 2-4 business days. Standard US shipping typically takes 5-10 business days after dispatch.', 'dawp'),
        'icon'  => 'calendar',
    ],
    [
        'title' => __('30-Day Returns', 'dawp'),
        'copy'  => __('Eligible unworn apparel and unused decor may be returned within 30 days of delivery, subject to our return policy.', 'dawp'),
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

<div class="bg-white text-[#102A43]">
    <section class="relative isolate flex min-h-[70svh] items-center overflow-hidden bg-[#F7F3EA] py-16" aria-labelledby="graphicshirt-hero-title">
        <img <?php echo dawp_i0_img_attrs($stock_images['hero'], [
            'width'   => 1806,
            'height'  => 871,
            'srcset'  => [[640, 309], [1024, 494], [1440, 694], [1806, 871]],
            'sizes'   => '100vw',
            'loading' => 'eager',
        ]); ?> alt="<?php esc_attr_e('American families wearing patriotic graphic T-shirts together outdoors', 'dawp'); ?>" class="absolute inset-0 z-0 h-full w-full object-cover object-center" fetchpriority="high">
        <div class="absolute inset-0 z-10" style="background: linear-gradient(90deg, rgba(16, 42, 67, 0.95) 0%, rgba(16, 42, 67, 0.55) 50%, rgba(16, 42, 67, 0.10) 100%);" aria-hidden="true"></div>

        <div class="relative z-20 mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl text-white">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#F7F3EA]">
                    <?php esc_html_e('Made for American moments', 'dawp'); ?>
                </p>
                <h1 id="graphicshirt-hero-title" class="mt-5 font-heading text-4xl font-extrabold leading-tight sm:text-5xl lg:text-6xl">
                    <?php esc_html_e('Wear What You Stand For', 'dawp'); ?>
                </h1>
                <p class="mt-6 max-w-xl text-base leading-8 text-white/90 sm:text-lg">
                    <?php esc_html_e('Shop original graphic shirts created for family, remembrance, celebration, and the American spirit—from everyday pride to America 250.', 'dawp'); ?>
                </p>

                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url($new_arrivals_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#C83E3E] px-6 text-sm font-bold text-white transition hover:bg-[#8F2929]">
                        <?php esc_html_e('Shop New Arrivals', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-white/70 bg-white/10 px-6 text-sm font-bold text-white backdrop-blur transition hover:bg-white hover:text-[#102A43]">
                        <?php esc_html_e('Shop All', 'dawp'); ?>
                    </a>
                </div>

                <div class="mt-8 grid max-w-xl gap-3 text-sm font-semibold text-white/90 sm:grid-cols-3">
                    <span class="border-l border-[#F7F3EA] pl-3"><?php esc_html_e('Original patriotic designs', 'dawp'); ?></span>
                    <span class="border-l border-[#F7F3EA] pl-3"><?php esc_html_e('Printed for every occasion', 'dawp'); ?></span>
                    <span class="border-l border-[#F7F3EA] pl-3"><?php esc_html_e('Made to wear with pride', 'dawp'); ?></span>
                </div>
            </div>
        </div>
    </section>

    <section id="shop-by-category" class="bg-[#FBFCFE] py-14 sm:py-20" aria-labelledby="category-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-3xl">
                    <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#B83232]"><?php esc_html_e('Shop By Category', 'dawp'); ?></p>
                    <h2 id="category-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#102A43] sm:text-4xl">
                        <?php esc_html_e('Graphic shirts made for every American moment.', 'dawp'); ?>
                    </h2>
                    <p class="mt-4 text-base leading-7 text-[#52657A]">
                        <?php esc_html_e('Explore original designs for family celebrations, national holidays, remembrance, Veterans Day, Independence Day, and America 250.', 'dawp'); ?>
                    </p>
                </div>
                <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#C83E3E] px-6 text-sm font-bold text-[#9B2C2C] transition hover:bg-[#E8EEF5]">
                    <?php esc_html_e('Shop All Products', 'dawp'); ?>
                </a>
            </div>

            <?php if (!empty($categories)) : ?>
            <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <?php foreach ($categories as $category) : ?>
                    <a href="<?php echo esc_url($category['url']); ?>" class="group overflow-hidden rounded-md border border-[#D6DEE8] bg-white transition hover:-translate-y-1 hover:shadow-xl hover:shadow-[#9B2C2C]/10">
                        <img <?php echo dawp_i0_img_attrs($category['image'], [
                            'width'  => 480,
                            'height' => 360,
                            'srcset' => [[240, 180], [320, 240], [480, 360], [640, 480]],
                            'sizes'  => '(max-width: 639px) 100vw, (max-width: 1023px) 45vw, 230px',
                        ]); ?> alt="<?php echo esc_attr($category['alt']); ?>" class="aspect-[4/3] w-full object-cover transition duration-300 group-hover:scale-105">
                        <div class="p-5">
                            <h3 class="font-heading text-lg font-extrabold text-[#102A43]"><?php echo esc_html($category['name']); ?></h3>
                            <p class="mt-3 text-sm leading-6 text-[#52657A]"><?php echo esc_html($category['description']); ?></p>
                            <span class="mt-5 inline-flex items-center text-sm font-bold text-[#B83232]">
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
                    <div class="mt-10 rounded-md border border-[#D6DEE8] bg-white p-6">
                        <h3 class="font-heading text-xl font-extrabold text-[#102A43]"><?php esc_html_e('Browse GraphicShirt', 'dawp'); ?></h3>
                        <p class="mt-3 max-w-2xl text-sm leading-6 text-[#52657A]"><?php esc_html_e('Products are being added. Browse the shop to see every available item.', 'dawp'); ?></p>
                        <a href="<?php echo esc_url($shop_url); ?>" class="mt-5 inline-flex min-h-12 items-center justify-center rounded-md bg-[#102A43] px-6 text-sm font-bold text-white transition hover:bg-[#9B2C2C]">
                            <?php esc_html_e('Browse All Products', 'dawp'); ?>
                        </a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </section>

    <section class="bg-[#F7F3EA] py-14 sm:py-20" aria-labelledby="america-250-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.96fr_1.04fr] lg:items-center lg:px-8">
            <div class="grid gap-4 sm:grid-cols-5">
                <img <?php echo dawp_i0_img_attrs($stock_images['editorial-america-family'], [
                    'width'  => 600,
                    'height' => 750,
                    'srcset' => [[320, 400], [480, 600], [600, 750], [900, 1125]],
                    'sizes'  => '(max-width: 639px) 100vw, (max-width: 1023px) 45vw, 360px',
                ]); ?> alt="<?php esc_attr_e('Family wearing America 250 commemorative graphic T-shirts', 'dawp'); ?>" class="aspect-[4/5] w-full rounded-md object-cover shadow-sm sm:col-span-3">
                <div class="grid gap-4 sm:col-span-2">
                    <img <?php echo dawp_i0_img_attrs($stock_images['editorial-america-flatlay'], [
                        'width'  => 400,
                        'height' => 400,
                        'srcset' => [[200, 200], [300, 300], [400, 400], [600, 600]],
                        'sizes'  => '(max-width: 639px) 50vw, (max-width: 1023px) 30vw, 235px',
                    ]); ?> alt="<?php esc_attr_e('Folded America 250 graphic shirts in patriotic colors', 'dawp'); ?>" class="aspect-square w-full rounded-md object-cover shadow-sm">
                    <img <?php echo dawp_i0_img_attrs($stock_images['editorial-decor'], [
                        'width'  => 400,
                        'height' => 400,
                        'srcset' => [[200, 200], [300, 300], [400, 400], [600, 600]],
                        'sizes'  => '(max-width: 639px) 50vw, (max-width: 1023px) 30vw, 235px',
                    ]); ?> alt="<?php esc_attr_e('America 250 metal sign and decorative flag on a porch', 'dawp'); ?>" class="aspect-square w-full rounded-md object-cover shadow-sm">
                </div>
            </div>

            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#B83232]"><?php esc_html_e('America 250 Collection', 'dawp'); ?></p>
                <h2 id="america-250-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#102A43] sm:text-4xl">
                    <?php esc_html_e('Celebrate 250 years of the American story.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-[#52657A]">
                    <?php esc_html_e('Mark America’s 250th anniversary with original graphic apparel, flags, and keepsakes inspired by the people, history, and enduring spirit of the United States.', 'dawp'); ?>
                </p>

                <div class="mt-7 grid gap-3 sm:grid-cols-2">
                    <?php foreach ($america250_points as $point) : ?>
                        <div class="rounded-md border border-[#D6DEE8] bg-white px-4 py-3 text-sm font-bold text-[#102A43]">
                            <?php echo esc_html($point); ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <a href="<?php echo esc_url($america250_url); ?>" class="mt-8 inline-flex min-h-12 items-center justify-center rounded-md bg-[#102A43] px-6 text-sm font-bold text-white transition hover:bg-[#9B2C2C]">
                    <?php echo esc_html($america250_label); ?>
                </a>
            </div>
        </div>
    </section>

    <section class="bg-white py-14 sm:py-20" aria-labelledby="fashion-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:items-start">
                <div>
                    <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#B83232]"><?php esc_html_e('Patriotic Decor For Daily Looks', 'dawp'); ?></p>
                    <h2 id="fashion-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#102A43] sm:text-4xl">
                        <?php esc_html_e('Simple accents that make everyday outfits feel polished.', 'dawp'); ?>
                    </h2>
                    <p class="mt-5 text-base leading-8 text-[#52657A]">
                        <?php esc_html_e('From everyday graphic shirts and hoodies to caps and patriotic decor, the collection makes it easy to express American pride.', 'dawp'); ?>
                    </p>

                    <div class="mt-8 grid gap-4">
                        <?php foreach ($fashion_points as $point) : ?>
                            <article class="rounded-md border border-[#D6DEE8] bg-[#FBFCFE] p-5">
                                <div class="flex items-start gap-4">
                                    <span class="mt-1 inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-md bg-[#E8EEF5] text-[#B83232]">
                                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                            <?php echo $render_icon('sparkle'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                        </svg>
                                    </span>
                                    <div>
                                        <h3 class="font-heading text-lg font-extrabold text-[#102A43]"><?php echo esc_html($point['title']); ?></h3>
                                        <p class="mt-2 text-sm leading-6 text-[#52657A]"><?php echo esc_html($point['copy']); ?></p>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                    <img <?php echo dawp_i0_img_attrs($stock_images['editorial-hoodie'], [
                        'width'  => 500,
                        'height' => 625,
                        'srcset' => [[300, 375], [400, 500], [500, 625], [750, 938]],
                        'sizes'  => '(max-width: 639px) 100vw, (max-width: 1023px) 50vw, 340px',
                    ]); ?> alt="<?php esc_attr_e('Man wearing an America 250 graphic hoodie', 'dawp'); ?>" class="aspect-[4/5] w-full rounded-md object-cover shadow-sm sm:mt-12">
                    <img <?php echo dawp_i0_img_attrs($stock_images['editorial-polo-cap'], [
                        'width'  => 500,
                        'height' => 625,
                        'srcset' => [[300, 375], [400, 500], [500, 625], [750, 938]],
                        'sizes'  => '(max-width: 639px) 100vw, (max-width: 1023px) 50vw, 340px',
                    ]); ?> alt="<?php esc_attr_e('America 250 polo shirt and embroidered cap', 'dawp'); ?>" class="aspect-[4/5] w-full rounded-md object-cover shadow-sm">
                </div>
            </div>
        </div>
    </section>

    <section class="border-y border-[#D6DEE8] bg-[#F7F3EA] py-14 sm:py-20" aria-labelledby="trust-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[0.84fr_1.16fr] lg:items-start">
                <div>
                    <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#B83232]"><?php esc_html_e('Meaningful Gifts & Customer Care', 'dawp'); ?></p>
                    <h2 id="trust-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#102A43] sm:text-4xl">
                        <?php esc_html_e('Patriotic gifts made for every American moment.', 'dawp'); ?>
                    </h2>
                    <p class="mt-5 text-base leading-8 text-[#52657A]">
                        <?php esc_html_e('Choose graphic shirts, hoodies, caps, flags, and metal signs for family celebrations, national holidays, veterans, and proud American homes—with clear shipping, tracking, returns, and support.', 'dawp'); ?>
                    </p>
                    <p class="mt-5 text-sm leading-7 text-[#52657A]">
                        <?php
                        echo wp_kses(
                            sprintf(
                                /* translators: 1: support email link, 2: business hours */
                                __('Need help? Email %1$s. Business hours: %2$s.', 'dawp'),
                                '<a class="font-bold text-[#9B2C2C] underline decoration-[#C83E3E]/40 underline-offset-4 transition hover:text-[#102A43]" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>',
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
                        <a href="<?php echo esc_url(home_url('/return-refund-policy/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#C83E3E] px-6 text-sm font-bold text-white transition hover:bg-[#102A43]">
                            <?php esc_html_e('View Shipping & Returns', 'dawp'); ?>
                        </a>
                        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#C83E3E] bg-white px-6 text-sm font-bold text-[#9B2C2C] transition hover:bg-[#E8EEF5]">
                            <?php esc_html_e('Contact Support', 'dawp'); ?>
                        </a>
                    </div>
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                    <?php foreach ($trust_cards as $card) : ?>
                        <article class="rounded-md border border-[#D6DEE8] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-[#9B2C2C]/10">
                            <div class="flex h-12 w-12 items-center justify-center rounded-md bg-[#E8EEF5] text-[#B83232]">
                                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <?php echo $render_icon($card['icon']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </svg>
                            </div>
                            <h3 class="mt-5 font-heading text-lg font-extrabold text-[#102A43]"><?php echo esc_html($card['title']); ?></h3>
                            <p class="mt-3 text-sm leading-6 text-[#52657A]"><?php echo esc_html($card['copy']); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</div>
