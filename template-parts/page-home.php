<?php
/**
 * Homepage for US Watch Store.
 *
 * Hallmark · genre: modern-minimal · macrostructure: Bento Grid (H2 split-diptych
 * hero, irregular-span category grid, F6 product-card-grid new arrivals)
 * nav: N12 · footer: Ft1 · design-system: .plans/design_system.md (locked)
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

$theme_img_uri     = get_template_directory_uri() . '/assets/img';
$new_arrivals_url  = add_query_arg('orderby', 'date', $shop_url);
$support_email    = 'support@uswatchstore.com';
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

$dawp_category_term = static function ($slug) {
    if (!function_exists('get_term_by')) {
        return null;
    }

    $term = get_term_by('slug', $slug, 'product_cat');

    return ($term && !is_wp_error($term)) ? $term : null;
};

$dawp_category_link = static function ($term) use ($shop_url) {
    if (!$term || !function_exists('get_term_link')) {
        return $shop_url;
    }

    $link = get_term_link($term);

    return is_wp_error($link) ? $shop_url : $link;
};

/**
 * Category photography -- one product shot per watch category.
 */
$category_image_files = [
    'quartz-watches'     => 'cat/Quazt.webp',
    'mechanical-watches' => 'cat/mechanic.webp',
    'smartwatches'       => 'cat/smart.webp',
    'digital-watches'    => 'cat/digital.webp',
];

$get_category_image = static function ($slug) use ($theme_img_uri, $category_image_files) {
    $file = $category_image_files[$slug] ?? $category_image_files['quartz-watches'];

    return $theme_img_uri . '/' . $file;
};

$preferred_categories = [
    [
        'name'        => __('Quartz Watches', 'dawp'),
        'slug'        => 'quartz-watches',
        'description' => __('Battery-powered precision with reliable, low-maintenance timekeeping.', 'dawp'),
    ],
    [
        'name'        => __('Mechanical Watches', 'dawp'),
        'slug'        => 'mechanical-watches',
        'description' => __('Traditional automatic and hand-wound movements built for collectors.', 'dawp'),
    ],
    [
        'name'        => __('Smartwatches', 'dawp'),
        'slug'        => 'smartwatches',
        'description' => __('Connected watches with fitness tracking, notifications, and apps.', 'dawp'),
    ],
    [
        'name'        => __('Digital Watches', 'dawp'),
        'slug'        => 'digital-watches',
        'description' => __('Rugged, easy-to-read displays built for everyday durability.', 'dawp'),
    ],
];

$categories    = [];
$used_term_ids = [];

foreach ($preferred_categories as $category) {
    $term = $dawp_category_term($category['slug']);

    if (!$term) {
        continue;
    }

    $term_description = term_description($term->term_id, 'product_cat');

    $categories[] = [
        'name'        => $term->name,
        'slug'        => $category['slug'],
        'description' => $term_description ? wp_strip_all_tags($term_description) : $category['description'],
        'url'         => $dawp_category_link($term),
    ];
    $used_term_ids[] = (int) $term->term_id;
}

if (function_exists('get_terms') && count($categories) < 4) {
    $uncategorized = $dawp_category_term('uncategorized');
    $exclude_ids   = $used_term_ids;

    if ($uncategorized) {
        $exclude_ids[] = (int) $uncategorized->term_id;
    }

    $store_categories = get_terms([
        'taxonomy'   => 'product_cat',
        'hide_empty' => false,
        'parent'     => 0,
        'exclude'    => $exclude_ids,
        'number'     => 4 - count($categories),
    ]);

    if (!is_wp_error($store_categories)) {
        foreach ($store_categories as $term) {
            $term_description = term_description($term->term_id, 'product_cat');

            $categories[] = [
                'name'        => $term->name,
                'slug'        => $term->slug,
                'description' => $term_description ? wp_strip_all_tags($term_description) : __('Explore this collection from US Watch Store.', 'dawp'),
                'url'         => $dawp_category_link($term),
            ];
        }
    }
}

$value_points = [
    __('Free US shipping on all orders', 'dawp'),
    __('2-year warranty on every watch', 'dawp'),
    __('30-day returns, no questions asked', 'dawp'),
];

$quality_points = [
    [
        'title' => __('Quality Assured', 'dawp'),
        'copy'  => __('Every watch is checked against the manufacturer before it ships - no gray-market guesswork.', 'dawp'),
        'icon'  => 'shield',
    ],
    [
        'title' => __('2-Year Warranty', 'dawp'),
        'copy'  => __('Movement and battery defects are covered for two years from the date of delivery.', 'dawp'),
        'icon'  => 'refresh',
    ],
    [
        'title' => __('Inspected Before It Ships', 'dawp'),
        'copy'  => __('Timekeeping, water resistance seals, and strap hardware are checked on every unit we send out.', 'dawp'),
        'icon'  => 'magnifier',
    ],
];

$gift_points = [
    [
        'title' => __('A Gift That Keeps Time', 'dawp'),
        'copy'  => __('Graduations, anniversaries, promotions - a watch is a gift the recipient reaches for every day.', 'dawp'),
    ],
    [
        'title' => __('Something For Everyone', 'dawp'),
        'copy'  => __('Quartz, mechanical, smart, or digital - pick the movement that fits how the person you’re shopping for actually lives.', 'dawp'),
    ],
    [
        'title' => __('Fast, Trackable Shipping', 'dawp'),
        'copy'  => __('Orders ship within 1-3 business days with tracking sent straight to your inbox.', 'dawp'),
    ],
];

$trust_cards = [
    [
        'title' => __('Clear Support', 'dawp'),
        'copy'  => sprintf(
            /* translators: %s: support email address */
            __('Questions about an order or a watch? Contact %s during business hours.', 'dawp'),
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
        'copy'  => __('Orders are processed within 1-3 business days. Standard US shipping typically takes 3-7 business days after dispatch.', 'dawp'),
        'icon'  => 'calendar',
    ],
    [
        'title' => __('30-Day Returns', 'dawp'),
        'copy'  => __('Unworn watches in original condition, with box and papers, may be returned within 30 days of delivery.', 'dawp'),
        'icon'  => 'refresh',
    ],
];

$render_icon = static function ($icon) {
    $icons = [
        'mail'      => '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-10 6L2 7"/>',
        'truck'     => '<path d="M10 17h4V5H3v12h2"/><path d="M14 8h4l3 3v6h-3"/><circle cx="7" cy="17" r="2"/><circle cx="16" cy="17" r="2"/>',
        'calendar'  => '<path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/>',
        'refresh'   => '<path d="M20 12a8 8 0 0 1-13.66 5.66L4 15"/><path d="M4 20v-5h5"/><path d="M4 12A8 8 0 0 1 17.66 6.34L20 9"/><path d="M20 4v5h-5"/>',
        'shield'    => '<path d="M12 3 4.5 6v6c0 4.4 3.2 7.9 7.5 9 4.3-1.1 7.5-4.6 7.5-9V6L12 3Z"/><path d="m9 12 2 2 4-4"/>',
        'magnifier' => '<circle cx="10.5" cy="10.5" r="6.5"/><path d="m20 20-4.8-4.8"/>',
    ];

    return $icons[$icon] ?? $icons['mail'];
};
?>

<div class="bg-background text-foreground">

    <!-- Hero - H2 split diptych: headline+lede+CTA left, watch-face mark right -->
    <section class="relative isolate overflow-hidden bg-foreground" aria-labelledby="dawp-hero-title">
        <div class="absolute inset-0 -z-10" aria-hidden="true" style="background: radial-gradient(80% 90% at 82% 18%, color-mix(in srgb, var(--color-accent) 55%, transparent), transparent 60%), linear-gradient(135deg, var(--color-foreground) 0%, var(--color-accent-hover) 55%, var(--color-accent) 100%);"></div>

        <div class="mx-auto grid w-full max-w-7xl gap-10 px-4 pb-10 pt-14 sm:px-6 lg:grid-cols-[1.15fr_0.85fr] lg:items-center lg:gap-14 lg:px-8 lg:pb-16 lg:pt-24">
            <div class="max-w-2xl text-white">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-accent-blush">
                    <?php esc_html_e('Quartz · Mechanical · Smart · Digital', 'dawp'); ?>
                </p>
                <h1 id="dawp-hero-title" class="mt-5 font-heading text-4xl font-extrabold leading-tight sm:text-5xl lg:text-6xl">
                    <?php esc_html_e('Precision Timepieces, Delivered Across America', 'dawp'); ?>
                </h1>
                <p class="mt-6 max-w-xl text-base leading-8 text-white/85 sm:text-lg">
                    <?php esc_html_e('US Watch Store curates quartz, mechanical, smart, and digital watches for everyday wear, gifting, and collecting - every watch inspected, every order backed by a 2-year warranty.', 'dawp'); ?>
                </p>

                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url($new_arrivals_url); ?>" class="inline-flex min-h-12 items-center justify-center whitespace-nowrap rounded-sm bg-accent px-6 text-sm font-bold text-white transition hover:bg-white hover:text-foreground">
                        <?php esc_html_e('Shop New Arrivals', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center whitespace-nowrap rounded-sm border border-white/70 bg-white/10 px-6 text-sm font-bold text-white backdrop-blur transition hover:bg-white hover:text-foreground">
                        <?php esc_html_e('Shop All', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <div class="relative mx-auto aspect-square w-full max-w-sm justify-self-center rounded-md border border-white/15 bg-white/[0.03] lg:justify-self-end" aria-hidden="true">
                <span class="absolute left-3 top-3 h-3 w-3 border-l border-t border-white/30"></span>
                <span class="absolute right-3 top-3 h-3 w-3 border-r border-t border-white/30"></span>
                <span class="absolute bottom-3 left-3 h-3 w-3 border-b border-l border-white/30"></span>
                <span class="absolute bottom-3 right-3 h-3 w-3 border-b border-r border-white/30"></span>
                <img src="<?php echo esc_url($theme_img_uri . '/hero.png'); ?>" alt="" class="absolute inset-0 h-full w-full object-contain p-8" width="500" height="500">
                <span class="absolute bottom-5 left-1/2 -translate-x-1/2 whitespace-nowrap text-[11px] font-bold uppercase tracking-[0.14em] text-white/50">
                    <?php esc_html_e('Inspected Before It Ships', 'dawp'); ?>
                </span>
            </div>
        </div>

        <div class="border-t border-white/10 bg-white/[0.03]">
            <div class="mx-auto flex max-w-7xl flex-wrap items-center gap-x-10 gap-y-3 px-4 py-4 sm:px-6 lg:px-8">
                <?php foreach ($value_points as $point) : ?>
                    <span class="flex items-center gap-2 text-xs font-bold uppercase tracking-[0.1em] text-white/70">
                        <span class="h-1.5 w-1.5 shrink-0 bg-accent-blush" aria-hidden="true"></span>
                        <?php echo esc_html($point); ?>
                    </span>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Bento: featured category (2x1) + 3 regular tiles -->
    <section id="shop-by-category" class="bg-surface py-16 sm:py-24" aria-labelledby="category-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
                <h2 id="category-title" class="max-w-2xl font-heading text-3xl font-extrabold leading-tight text-foreground sm:text-4xl">
                    <?php esc_html_e('Four movements. One standard of quality.', 'dawp'); ?>
                </h2>
                <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 shrink-0 items-center justify-center whitespace-nowrap rounded-sm border border-accent px-6 text-sm font-bold text-accent-hover transition hover:bg-surface-alt">
                    <?php esc_html_e('Shop All Products', 'dawp'); ?>
                </a>
            </div>

            <?php if (!empty($categories)) : ?>
                <div class="mt-10 grid gap-5 lg:grid-cols-3 lg:grid-rows-2">
                    <?php $featured_category = array_shift($categories); ?>
                    <a href="<?php echo esc_url($featured_category['url']); ?>" class="group flex flex-col overflow-hidden rounded-md border border-border bg-background transition hover:border-accent hover:shadow-card-hover sm:flex-row lg:col-span-2 lg:row-span-2">
                        <div class="flex shrink-0 items-center justify-center bg-surface-alt p-6 transition duration-300 group-hover:bg-accent-soft sm:w-64 lg:w-auto lg:flex-1">
                            <img src="<?php echo esc_url($get_category_image($featured_category['slug'])); ?>" alt="<?php echo esc_attr($featured_category['name']); ?>" class="h-40 w-40 object-contain sm:h-48 sm:w-48" width="300" height="300" loading="lazy">
                        </div>
                        <div class="flex flex-1 flex-col justify-center p-6 sm:p-8">
                            <span class="text-xs font-extrabold uppercase tracking-[0.14em] text-accent-blush"><?php esc_html_e('Featured Category', 'dawp'); ?></span>
                            <h3 class="mt-2 font-heading text-2xl font-extrabold text-foreground"><?php echo esc_html($featured_category['name']); ?></h3>
                            <p class="mt-3 max-w-xl text-sm leading-6 text-foreground-muted"><?php echo esc_html($featured_category['description']); ?></p>
                            <span class="mt-5 inline-flex items-center text-sm font-bold text-accent-blush">
                                <?php esc_html_e('Shop category', 'dawp'); ?>
                                <span class="ml-2" aria-hidden="true">→</span>
                            </span>
                        </div>
                    </a>

                    <?php foreach ($categories as $category) : ?>
                        <a href="<?php echo esc_url($category['url']); ?>" class="group flex items-center gap-4 overflow-hidden rounded-md border border-border bg-background p-5 transition hover:border-accent hover:shadow-card-hover">
                            <div class="flex h-16 w-16 shrink-0 items-center justify-center overflow-hidden rounded-sm bg-surface-alt transition duration-300 group-hover:bg-accent-soft">
                                <img src="<?php echo esc_url($get_category_image($category['slug'])); ?>" alt="<?php echo esc_attr($category['name']); ?>" class="h-full w-full object-contain p-1.5" width="300" height="300" loading="lazy">
                            </div>
                            <div class="min-w-0">
                                <h3 class="truncate font-heading text-base font-extrabold text-foreground"><?php echo esc_html($category['name']); ?></h3>
                                <p class="mt-1 line-clamp-2 text-sm leading-6 text-foreground-muted"><?php echo esc_html($category['description']); ?></p>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- New arrivals - F6 product card grid -->
    <section class="bg-background py-16 sm:py-24" aria-labelledby="new-arrivals-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-8 lg:grid-cols-[220px_minmax(0,1fr)] lg:gap-12">
                <div class="lg:sticky lg:top-28 lg:self-start">
                    <h2 id="new-arrivals-title" class="font-heading text-3xl font-extrabold leading-tight text-foreground">
                        <?php esc_html_e('New arrivals', 'dawp'); ?>
                    </h2>
                    <p class="mt-3 text-sm leading-6 text-foreground-muted"><?php esc_html_e('The latest watches added to the store.', 'dawp'); ?></p>
                    <a href="<?php echo esc_url($new_arrivals_url); ?>" class="mt-6 inline-flex min-h-12 items-center justify-center whitespace-nowrap rounded-sm bg-accent px-6 text-sm font-bold text-white transition hover:bg-accent-hover lg:flex lg:w-full">
                        <?php esc_html_e('Shop New Arrivals', 'dawp'); ?>
                    </a>
                </div>

                <?php if ($home_products_query instanceof WP_Query && $home_products_query->have_posts()) : ?>
                    <div class="home-product-loop shop-main woocommerce">
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
                    <div class="rounded-md border border-border bg-surface p-6">
                        <h3 class="font-heading text-xl font-extrabold text-foreground"><?php esc_html_e('Browse US Watch Store', 'dawp'); ?></h3>
                        <p class="mt-3 max-w-2xl text-sm leading-6 text-foreground-muted"><?php esc_html_e('Products are being added. Browse the shop to see every available item.', 'dawp'); ?></p>
                        <a href="<?php echo esc_url($shop_url); ?>" class="mt-5 inline-flex min-h-12 items-center justify-center whitespace-nowrap rounded-sm bg-accent px-6 text-sm font-bold text-white transition hover:bg-accent-hover">
                            <?php esc_html_e('Browse All Products', 'dawp'); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Quality - asymmetric divided strip, no decorative eyebrow -->
    <section class="bg-surface py-14 sm:py-20" aria-labelledby="quality-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-8 lg:grid-cols-[0.7fr_1.3fr] lg:items-start lg:gap-14">
                <h2 id="quality-title" class="font-heading text-3xl font-extrabold leading-tight text-foreground sm:text-4xl">
                    <?php esc_html_e('Quality you can verify, not just trust.', 'dawp'); ?>
                </h2>
                <div class="grid gap-8 sm:grid-cols-3">
                    <?php foreach ($quality_points as $point) : ?>
                        <div class="flex flex-col gap-3">
                            <div class="flex h-11 w-11 items-center justify-center rounded-sm bg-accent-soft text-accent">
                                <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <?php echo $render_icon($point['icon']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </svg>
                            </div>
                            <h3 class="font-heading text-lg font-extrabold text-foreground"><?php echo esc_html($point['title']); ?></h3>
                            <p class="text-sm leading-6 text-foreground-muted"><?php echo esc_html($point['copy']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Gift - dark band, text left / list right -->
    <section class="bg-foreground py-16 text-white sm:py-24" aria-labelledby="gift-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:items-start">
                <div>
                    <h2 id="gift-title" class="font-heading text-3xl font-extrabold leading-tight sm:text-4xl">
                        <?php esc_html_e('A watch says more than a gift card ever will.', 'dawp'); ?>
                    </h2>
                    <p class="mt-5 text-base leading-8 text-white/80">
                        <?php esc_html_e('Whatever the occasion, a well-chosen watch gets worn - and it keeps saying thank you every time they check the time.', 'dawp'); ?>
                    </p>
                    <a href="<?php echo esc_url($shop_url); ?>" class="mt-8 inline-flex min-h-12 items-center justify-center whitespace-nowrap rounded-sm bg-accent px-6 text-sm font-bold text-white transition hover:bg-white hover:text-foreground">
                        <?php esc_html_e('Shop Gift Ideas', 'dawp'); ?>
                    </a>
                </div>

                <div class="divide-y divide-white/10 border-y border-white/10">
                    <?php foreach ($gift_points as $point) : ?>
                        <div class="py-5 first:pt-0 last:pb-0">
                            <h3 class="font-heading text-lg font-extrabold text-white"><?php echo esc_html($point['title']); ?></h3>
                            <p class="mt-2 text-sm leading-6 text-white/75"><?php echo esc_html($point['copy']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Support / trust - 2-col with 4-tile bento -->
    <section class="border-y border-border bg-surface py-16 sm:py-24" aria-labelledby="trust-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[0.84fr_1.16fr] lg:items-start">
                <div>
                    <h2 id="trust-title" class="font-heading text-3xl font-extrabold leading-tight text-foreground sm:text-4xl">
                        <?php esc_html_e('Straightforward support, start to finish.', 'dawp'); ?>
                    </h2>
                    <p class="mt-5 text-base leading-8 text-foreground-muted">
                        <?php esc_html_e('Clear shipping timelines, easy tracking, and a real person to talk to if anything is wrong with your order.', 'dawp'); ?>
                    </p>
                    <p class="mt-5 text-sm leading-7 text-foreground-muted">
                        <?php
                        echo wp_kses(
                            sprintf(
                                /* translators: 1: support email link, 2: business hours */
                                __('Need help? Email %1$s. Business hours: %2$s.', 'dawp'),
                                '<a class="font-bold text-accent-hover underline decoration-accent/40 underline-offset-4 transition hover:text-foreground" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>',
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
                        <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>" class="inline-flex min-h-12 items-center justify-center whitespace-nowrap rounded-sm bg-accent px-6 text-sm font-bold text-white transition hover:bg-accent-hover">
                            <?php esc_html_e('View Shipping & Returns', 'dawp'); ?>
                        </a>
                        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-12 items-center justify-center whitespace-nowrap rounded-sm border border-accent bg-background px-6 text-sm font-bold text-accent-hover transition hover:bg-surface-alt">
                            <?php esc_html_e('Contact Support', 'dawp'); ?>
                        </a>
                    </div>
                </div>

                <div class="grid overflow-hidden rounded-md border border-border bg-background sm:grid-cols-2">
                    <?php foreach ($trust_cards as $i => $card) : ?>
                        <div class="border-border p-6 <?php echo (0 === $i % 2) ? 'sm:border-r' : ''; ?> <?php echo ($i < count($trust_cards) - 2) ? 'border-b' : ''; ?>">
                            <div class="flex h-11 w-11 items-center justify-center rounded-sm bg-accent-soft text-accent">
                                <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <?php echo $render_icon($card['icon']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </svg>
                            </div>
                            <h3 class="mt-4 font-heading text-base font-extrabold text-foreground"><?php echo esc_html($card['title']); ?></h3>
                            <p class="mt-2 text-sm leading-6 text-foreground-muted"><?php echo esc_html($card['copy']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</div>
