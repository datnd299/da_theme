<?php
/**
 * Template Part: page-home
 */

$gallery_uri = get_theme_file_uri('/assets/img/gallery/ScottOsterbind/');

$images = [
    'hero'              => $gallery_uri . 'Home_Image/Handmade_Jewelry_Vintage_Accessories.png',
    'bracelets'         => $gallery_uri . 'Home_Image/Handmade_Bracelets.png',
    'curated'           => $gallery_uri . 'vintage-curated-finds.png',
    'beaded'            => $gallery_uri . 'Home_Image/Beaded_Jewelry.png',
    'brand_story'       => $gallery_uri . 'brand-story-ai.png',
    'bracelets_feature' => $gallery_uri . 'home-bracelets-feature-v2.png',
    'curated_feature'   => $gallery_uri . 'home-curated-feature-v2.png',
    'curated_apparel'   => $gallery_uri . 'Home_Image/Curated Apparel_home.png',
    'artisan_gifts'     => $gallery_uri . 'Home_Image/Artisan_Gifts.png',
];

$shop_url = function_exists('wc_get_page_id') && wc_get_page_id('shop') > 0
    ? get_permalink(wc_get_page_id('shop'))
    : home_url('/shop/');

$category_url = static function ($slug) {
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

$categories = [
    [
        'title' => __('Handmade Bracelets', 'dawp'),
        'copy'  => __('Beaded and handmade wristwear with everyday character.', 'dawp'),
        'url'   => $category_url('handmade-bracelets'),
        'image' => $images['bracelets'],
    ],
    [
        'title' => __('Beaded Jewelry', 'dawp'),
        'copy'  => __('Creative jewelry pieces made with beads, texture, and personal detail.', 'dawp'),
        'url'   => $category_url('beaded-jewelry'),
        'image' => $images['beaded'],
    ],
    [
        'title' => __('Vintage Accessories', 'dawp'),
        'copy'  => __('Curated accessories with vintage-inspired charm and styling potential.', 'dawp'),
        'url'   => $category_url('vintage-accessories'),
        'image' => $images['curated'],
    ],
    [
        'title' => __('Curated Apparel', 'dawp'),
        'copy'  => __('Apparel pieces selected for creative everyday style.', 'dawp'),
        'url'   => $category_url('curated-apparel'),
        'image' => $images['curated_apparel'],
    ],
    [
        'title' => __('Artisan Gifts', 'dawp'),
        'copy'  => __('Small handmade and curated pieces made for thoughtful gifting.', 'dawp'),
        'url'   => $category_url('artisan-gifts'),
        'image' => $images['artisan_gifts'],
    ],
    [
        'title' => __('Our Brand Story', 'dawp'),
        'copy'  => __('Learn about the creative point of view behind our handmade jewelry, curated finds, and thoughtful everyday style.', 'dawp'),
        'url'   => home_url('/about-us/'),
        'image' => $images['brand_story'],
        'cta'   => __('Learn About Us', 'dawp'),
    ],
];

$bracelet_highlights = [
    __('Beaded details', 'dawp'),
    __('Layering-friendly', 'dawp'),
    __('Giftable pieces', 'dawp'),
    __('Handmade character', 'dawp'),
];

$curated_cards = [
    [
        'title' => __('Vintage Accessories', 'dawp'),
        'copy'  => __('Accessories with warm character and vintage-inspired styling.', 'dawp'),
    ],
    [
        'title' => __('Curated Apparel', 'dawp'),
        'copy'  => __('Simple apparel pieces selected to pair with jewelry and accessories.', 'dawp'),
    ],
    [
        'title' => __('Artisan Gifts', 'dawp'),
        'copy'  => __('Thoughtful handmade and curated finds for everyday gifting.', 'dawp'),
    ],
];

$trust_items = [
    __('Secure Checkout', 'dawp'),
    __('Tracking Included', 'dawp'),
    __('30-Day Returns', 'dawp'),
    __('Clear Product Details', 'dawp'),
];

$home_products = null;

if (class_exists('WooCommerce')) {
    $product_tax_query = [];

    if (function_exists('wc_get_product_visibility_term_ids')) {
        $product_visibility_terms = wc_get_product_visibility_term_ids();

        if (! empty($product_visibility_terms['exclude-from-catalog'])) {
            $product_tax_query[] = [
                'taxonomy' => 'product_visibility',
                'field'    => 'term_taxonomy_id',
                'terms'    => [$product_visibility_terms['exclude-from-catalog']],
                'operator' => 'NOT IN',
            ];
        }
    }

    $home_product_args = [
        'post_type'           => 'product',
        'post_status'         => 'publish',
        'posts_per_page'      => 4,
        'ignore_sticky_posts' => true,
        'orderby'             => 'date',
        'order'               => 'DESC',
    ];

    if (! empty($product_tax_query)) {
        $home_product_args['tax_query'] = $product_tax_query;
    }

    $home_products = new WP_Query($home_product_args);
}
?>

<div id="primary" class="bg-white font-body text-[#1F2937]">

    <!-- Hero -->
    <section class="relative overflow-hidden bg-[#F7F5EF]">
        <div class="mx-auto grid min-h-[640px] max-w-7xl grid-cols-1 items-center gap-10 px-4 py-14 sm:px-6 lg:grid-cols-[minmax(0,0.92fr)_minmax(0,1.08fr)] lg:px-8 lg:py-20">
            <div class="relative z-10">
                <p class="mb-5 inline-flex rounded-full border border-[#C89B3C]/60 bg-white px-4 py-2 text-xs font-black uppercase tracking-[0.16em] text-[#6E9B8E]">
                    <?php esc_html_e('Handmade Jewelry & Vintage Accessories', 'dawp'); ?>
                </p>

                <h1 class="font-heading text-5xl font-black leading-[0.98] text-[#1F6F68] sm:text-6xl lg:text-7xl">
                    <?php esc_html_e('Handmade Jewelry & Vintage Accessories With A Personal Feel', 'dawp'); ?>
                </h1>

                <p class="mt-6 max-w-2xl text-lg leading-8 text-[#475569]">
                    <?php esc_html_e('Explore handmade bracelets, beaded jewelry, vintage-inspired accessories, curated apparel, and small artisan gifts made for everyday expression.', 'dawp'); ?>
                </p>

                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url($category_url('handmade-bracelets')); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#C89B3C] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#1F6F68] hover:text-white">
                        <?php esc_html_e('Shop Handmade Bracelets', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url($category_url('vintage-accessories')); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#C89B3C] bg-white px-7 text-sm font-black uppercase tracking-wide text-[#1F6F68] transition hover:bg-[#F7F5EF]">
                        <?php esc_html_e('Explore Vintage Finds', 'dawp'); ?>
                    </a>
                </div>

                <p class="mt-7 border-l-4 border-l-[#C89B3C] bg-white p-4 text-sm font-bold leading-7 text-[#1F6F68]">
                    <?php esc_html_e('Curated pieces. Handmade details. Everyday personal style.', 'dawp'); ?>
                </p>
            </div>

            <div class="relative">
                <div class="overflow-hidden rounded-lg border border-[#E8D9A6] bg-white shadow-xl">
                    <img <?php echo dawp_responsive_image_attrs($images['hero'], 760, 570, [[400, 300], [760, 570], [1024, 768], [1300, 975]], '(max-width: 1023px) 100vw, 680px', 'aspect-[4/3] w-full object-cover', 'eager', 'high'); ?>
                         alt="<?php esc_attr_e('Warm artisan jewelry workspace with handmade bracelets and beaded details', 'dawp'); ?>"
                    >
                </div>

                <div class="absolute -bottom-6 left-6 right-6 rounded-lg border border-[#E8D9A6] bg-white p-5 shadow-xl sm:left-auto sm:right-8 sm:w-80">
                    <p class="text-xs font-black uppercase tracking-[0.16em] text-[#C89B3C]">
                        <?php esc_html_e('Small-Batch Feel', 'dawp'); ?>
                    </p>
                    <p class="mt-2 text-sm font-semibold leading-6 text-[#475569]">
                        <?php esc_html_e('Handmade and curated items are presented with clear materials, care notes, and product details.', 'dawp'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Shop By Category -->
    <section class="bg-white py-14 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#C89B3C]">
                    <?php esc_html_e('Shop By Category', 'dawp'); ?>
                </p>
                <h2 class="font-heading text-4xl font-black leading-tight text-[#1F6F68] lg:text-5xl">
                    <?php esc_html_e('Focused collections for handmade and vintage-inspired style.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-[#475569]">
                    <?php esc_html_e('Browse clear product groups built around bracelets, beaded details, curated accessories, apparel, and thoughtful everyday gifts.', 'dawp'); ?>
                </p>
            </div>

            <div class="mt-10 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                <?php foreach ($categories as $category) : ?>
                    <a href="<?php echo esc_url($category['url']); ?>"
                       class="group overflow-hidden rounded-lg border border-[#E8D9A6] bg-white shadow-sm transition hover:-translate-y-1 hover:border-[#C89B3C] hover:shadow-md">
                        <img <?php echo dawp_responsive_image_attrs($category['image'], 520, 390, [[360, 270], [520, 390], [768, 576]], '(max-width: 639px) 100vw, (max-width: 1023px) 50vw, 33vw', 'aspect-[4/3] w-full object-cover transition duration-300 group-hover:scale-[1.03]', 'lazy'); ?>
                             alt="<?php echo esc_attr($category['title']); ?>"
                        >
                        <span class="block p-5">
                            <span class="block font-heading text-2xl font-black leading-tight text-[#1F6F68]">
                                <?php echo esc_html($category['title']); ?>
                            </span>
                            <span class="mt-3 block text-sm leading-7 text-[#475569]">
                                <?php echo esc_html($category['copy']); ?>
                            </span>
                            <span class="mt-5 inline-flex items-center gap-2 text-sm font-black uppercase tracking-wide text-[#C89B3C]">
                                <?php echo esc_html($category['cta'] ?? __('Shop Category', 'dawp')); ?>
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M5 12h14"></path>
                                    <path d="m12 5 7 7-7 7"></path>
                                </svg>
                            </span>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Find What You Came For -->
    <section class="bg-[#F7F5EF] py-14 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-3xl">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#C89B3C]">
                        <?php esc_html_e('Find What You Came For', 'dawp'); ?>
                    </p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#1F6F68] lg:text-5xl">
                        <?php esc_html_e('Fresh handmade and curated pieces from the shop.', 'dawp'); ?>
                    </h2>
                    <p class="mt-5 text-base leading-8 text-[#475569]">
                        <?php esc_html_e('Browse recent products with clear details, warm materials, and everyday styling potential.', 'dawp'); ?>
                    </p>
                </div>

                <a href="<?php echo esc_url($shop_url); ?>"
                   class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#C89B3C] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#1F6F68] hover:text-white">
                    <?php esc_html_e('View All Products', 'dawp'); ?>
                </a>
            </div>

            <?php if ($home_products instanceof WP_Query && $home_products->have_posts()) : ?>
                <div class="home-products-grid mt-10 grid grid-cols-2 gap-3 sm:gap-5 lg:grid-cols-4">
                    <?php while ($home_products->have_posts()) : ?>
                        <?php
                        $home_products->the_post();
                        $product = wc_get_product(get_the_ID());

                        if (! $product || ! $product->is_visible()) {
                            continue;
                        }

                        $product_cats = get_the_terms($product->get_id(), 'product_cat');
                        $product_cat_name = (! is_wp_error($product_cats) && ! empty($product_cats)) ? $product_cats[0]->name : '';
                        ?>
                        <a href="<?php the_permalink(); ?>"
                           class="home-product-card group overflow-hidden rounded-lg border border-[#E8D9A6] bg-white shadow-sm transition hover:-translate-y-1 hover:border-[#C89B3C] hover:shadow-md"
                           aria-label="<?php the_title_attribute(); ?>">
                            <span class="home-product-card__media relative block overflow-hidden bg-[#EEF6F2]">
                                <?php
                                echo $product->get_image(
                                    'woocommerce_single',
                                    [
                                        'class'    => 'home-product-card__image aspect-[4/3] w-full object-cover transition duration-300 group-hover:scale-[1.03]',
                                        'loading'  => 'lazy',
                                        'decoding' => 'async',
                                        'sizes'    => '(max-width: 639px) 50vw, (max-width: 1023px) 50vw, 25vw',
                                    ]
                                );
                                ?>

                                <?php if ($product->is_on_sale()) : ?>
                                    <span class="absolute left-4 top-4 rounded-full bg-[#6E9B8E] px-3 py-1 text-xs font-black uppercase tracking-wide text-white">
                                        <?php esc_html_e('Sale', 'dawp'); ?>
                                    </span>
                                <?php endif; ?>
                            </span>

                            <span class="block p-5">
                                <?php if ($product_cat_name) : ?>
                                    <span class="mb-2 block text-xs font-black uppercase tracking-[0.16em] text-[#C89B3C]">
                                        <?php echo esc_html($product_cat_name); ?>
                                    </span>
                                <?php endif; ?>

                                <span class="block min-h-14 font-heading text-xl font-black leading-tight text-[#1F6F68] transition group-hover:text-[#C89B3C]">
                                    <?php the_title(); ?>
                                </span>

                                <span class="mt-4 block text-base font-black text-[#1F2937]">
                                    <?php echo wp_kses_post($product->get_price_html()); ?>
                                </span>

                                <span class="mt-5 inline-flex items-center gap-2 text-sm font-black uppercase tracking-wide text-[#6E9B8E]">
                                    <?php esc_html_e('View Product', 'dawp'); ?>
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M5 12h14"></path>
                                        <path d="m12 5 7 7-7 7"></path>
                                    </svg>
                                </span>
                            </span>
                        </a>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            <?php else : ?>
                <div class="mt-10 rounded-lg border border-[#E8D9A6] bg-white p-6 text-sm font-semibold leading-7 text-[#1F6F68]">
                    <?php esc_html_e('Products are being added to the shop. Check back soon or browse the full catalog.', 'dawp'); ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Handmade Bracelets Feature -->
    <section class="bg-[#F7F5EF] py-14 lg:py-20">
        <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
            <div class="overflow-hidden rounded-lg border border-[#E8D9A6] bg-white shadow-sm">
                <img <?php echo dawp_responsive_image_attrs($images['bracelets_feature'], 700, 525, [[400, 300], [700, 525], [1024, 768]], '(max-width: 1023px) 100vw, 50vw', 'aspect-[4/3] w-full object-cover', 'lazy'); ?>
                     alt="<?php esc_attr_e('Handmade beaded bracelets arranged on warm linen texture', 'dawp'); ?>"
                >
            </div>

            <div>
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#C89B3C]">
                    <?php esc_html_e('Handmade Bracelets', 'dawp'); ?>
                </p>
                <h2 class="font-heading text-4xl font-black leading-tight text-[#1F6F68] lg:text-5xl">
                    <?php esc_html_e('Small handmade pieces made for everyday expression.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-[#475569]">
                    <?php esc_html_e('From beaded bracelets to simple layering pieces, Scott Osterbind focuses on handmade details, natural textures, and personal accessories that feel easy to wear and thoughtful to gift.', 'dawp'); ?>
                </p>

                <div class="mt-7 grid grid-cols-1 gap-3 sm:grid-cols-2">
                    <?php foreach ($bracelet_highlights as $highlight) : ?>
                        <div class="flex min-h-12 items-center gap-3 rounded-lg border border-[#E8D9A6] bg-white px-4">
                            <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-[#6E9B8E] text-white">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <span class="text-sm font-bold text-[#1F2937]"><?php echo esc_html($highlight); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>

                <p class="mt-7 rounded-lg border border-[#C89B3C]/60 bg-white p-5 text-sm font-semibold leading-7 text-[#1F6F68]">
                    <?php esc_html_e('Handmade pieces may include slight natural variations in color, texture, or bead pattern.', 'dawp'); ?>
                </p>

                <div class="mt-8">
                    <a href="<?php echo esc_url($category_url('handmade-bracelets')); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#C89B3C] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#1F6F68] hover:text-white">
                        <?php esc_html_e('Shop Bracelets', 'dawp'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Vintage Accessories & Curated Finds -->
    <section class="bg-white py-14 lg:py-20">
        <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-10 px-4 sm:px-6 lg:grid-cols-[minmax(0,0.95fr)_minmax(0,1.05fr)] lg:px-8">
            <div>
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#C89B3C]">
                    <?php esc_html_e('Vintage Accessories & Curated Finds', 'dawp'); ?>
                </p>
                <h2 class="font-heading text-4xl font-black leading-tight text-[#1F6F68] lg:text-5xl">
                    <?php esc_html_e('Curated details for creative everyday style.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-[#475569]">
                    <?php esc_html_e('Discover vintage-inspired accessories, curated apparel pieces, and small creative finds selected for personal style, texture, and everyday wearability.', 'dawp'); ?>
                </p>

                <div class="mt-7 space-y-4">
                    <?php foreach ($curated_cards as $card) : ?>
                        <div class="rounded-lg border border-[#E8D9A6] bg-[#F7F5EF] p-5">
                            <h3 class="font-heading text-xl font-black text-[#1F6F68]"><?php echo esc_html($card['title']); ?></h3>
                            <p class="mt-2 text-sm leading-7 text-[#475569]"><?php echo esc_html($card['copy']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>

                <p class="mt-6 text-sm font-semibold leading-7 text-[#6E9B8E]">
                    <?php esc_html_e('Vintage-inspired items are described clearly on each product page. Authentic vintage claims should only be used when verified.', 'dawp'); ?>
                </p>

                <div class="mt-8">
                    <a href="<?php echo esc_url($category_url('vintage-accessories')); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#C89B3C] bg-white px-7 text-sm font-black uppercase tracking-wide text-[#1F6F68] transition hover:bg-[#F7F5EF]">
                        <?php esc_html_e('Explore Curated Finds', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <div class="overflow-hidden rounded-lg border border-[#E8D9A6] bg-white shadow-sm">
                <img <?php echo dawp_responsive_image_attrs($images['curated_feature'], 760, 570, [[400, 300], [760, 570], [1024, 768]], '(max-width: 1023px) 100vw, 52vw', 'aspect-[4/3] w-full object-cover', 'lazy'); ?>
                     alt="<?php esc_attr_e('Vintage-inspired accessories and curated style pieces arranged on neutral fabric', 'dawp'); ?>"
                >
            </div>
        </div>
    </section>

    <!-- Artisan Story / Customer Care Trust -->
    <section class="bg-[#1B4F49] py-14 text-white lg:py-20">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 sm:px-6 lg:grid-cols-[minmax(0,0.9fr)_minmax(0,1.1fr)] lg:px-8">
            <div>
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#C89B3C]">
                    <?php esc_html_e('Artisan Story', 'dawp'); ?>
                </p>
                <h2 class="font-heading text-4xl font-black leading-tight text-white lg:text-5xl">
                    <?php esc_html_e('Curated with warmth, detail, and everyday style in mind.', 'dawp'); ?>
                </h2>
                <p class="mt-5 max-w-2xl text-base leading-8 text-[#FAF6EA]">
                    <?php esc_html_e('Scott Osterbind brings together handmade jewelry, beaded pieces, vintage-inspired accessories, and curated finds with a personal creative point of view. Each item is selected or made to feel thoughtful, wearable, and expressive.', 'dawp'); ?>
                </p>
            </div>

            <div class="space-y-5">
                <div>
                    <h3 class="font-heading text-3xl font-black text-white">
                        <?php esc_html_e('Shop With Confidence', 'dawp'); ?>
                    </h3>
                    <div class="mt-5 grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <?php foreach ($trust_items as $item) : ?>
                            <div class="rounded-lg border border-white/10 border-l-4 border-l-[#C89B3C] bg-white/10 p-5">
                                <h4 class="text-base font-black text-white"><?php echo esc_html($item); ?></h4>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="rounded-lg border border-[#C89B3C]/50 bg-[#EEF6F2]/14 p-5">
                    <p class="text-sm font-semibold leading-7 text-[#FAF6EA]">
                        <?php esc_html_e('Orders are processed within 1-3 business days. Standard US shipping typically takes 5-7 business days after dispatch, Monday to Friday, and tracking information is provided once an order ships.', 'dawp'); ?>
                    </p>
                    <p class="mt-3 text-sm font-semibold leading-7 text-[#FAF6EA]">
                        <?php esc_html_e('Eligible unused, unworn, and undamaged items may be returned within 30 days of delivery in original condition.', 'dawp'); ?>
                    </p>
                    <p class="mt-3 text-sm font-semibold leading-7 text-[#FAF6EA]">
                        <?php esc_html_e('Handmade pieces may include slight natural variations in color, texture, or bead pattern.', 'dawp'); ?>
                    </p>
                </div>

                <div class="flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#C89B3C] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-[#123D39]">
                        <?php esc_html_e('View Shipping Policy', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#C89B3C] bg-transparent px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-[#1F2937]">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>
