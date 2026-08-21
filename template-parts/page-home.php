<?php
/**
 * Homepage for US Watch Store.
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
 * Category glyphs -- no product photography exists yet (see .plans/site.md
 * imagery policy), so each watch category gets a distinct line-art dial icon
 * instead of a stock photo.
 */
$render_category_icon = static function ($slug) {
    $icons = [
        'quartz-watches'     => '<circle cx="12" cy="12" r="9"/><path d="M12 3v1.6"/><path d="M12 19.4V21"/><path d="M3 12h1.6"/><path d="M19.4 12H21"/><path d="M12 7.2v5l3.4 1.8"/>',
        'mechanical-watches' => '<circle cx="11" cy="12" r="8"/><circle cx="11" cy="12" r="2.3"/><path d="M11 6.3v1.4"/><path d="M11 16.3v1.4"/><path d="M5.3 12h1.4"/><path d="M15.3 12h1.4"/><path d="M19 10.3h2.2v3.4H19z"/>',
        'smartwatches'       => '<rect x="6.5" y="5" width="11" height="14" rx="3.2"/><path d="M9.3 2.4h5.4"/><path d="M9.3 21.6h5.4"/><path d="M9.5 13h5"/><circle cx="14.3" cy="8.6" r="1" fill="currentColor" stroke="none"/>',
        'digital-watches'    => '<rect x="5" y="6.5" width="14" height="11" rx="2"/><path d="M8.2 3h2.2"/><path d="M13.6 3h2.2"/><path d="M8.2 21h2.2"/><path d="M13.6 21h2.2"/><path d="M8 11h2.4"/><path d="M8 14.4h2.4"/><path d="M13.6 11h2.4"/><path d="M13.6 14.4h2.4"/>',
    ];

    return $icons[$slug] ?? $icons['quartz-watches'];
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
    __('Free US shipping on orders over $75', 'dawp'),
    __('2-year warranty on every watch', 'dawp'),
    __('30-day returns, no questions asked', 'dawp'),
];

$quality_points = [
    [
        'title' => __('Authenticity Verified', 'dawp'),
        'copy'  => __('Every watch is checked against the manufacturer before it ships -- no gray-market guesswork.', 'dawp'),
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
        'copy'  => __('Graduations, anniversaries, promotions -- a watch is a gift the recipient reaches for every day.', 'dawp'),
    ],
    [
        'title' => __('Something For Everyone', 'dawp'),
        'copy'  => __('Quartz, mechanical, smart, or digital -- pick the movement that fits how the person you\'re shopping for actually lives.', 'dawp'),
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

<div class="bg-[#F7F9FB] text-[#10151C]">
    <section class="relative isolate overflow-hidden bg-[#10151C]" aria-labelledby="dawp-hero-title">
        <div class="absolute inset-0 -z-10" aria-hidden="true" style="background: radial-gradient(80% 90% at 82% 18%, rgba(31,78,121,0.55), transparent 60%), linear-gradient(135deg, #10151C 0%, #14324D 55%, #1F4E79 100%);"></div>

        <div class="mx-auto grid w-full max-w-7xl gap-10 px-4 py-14 sm:px-6 lg:grid-cols-[1.15fr_0.85fr] lg:items-center lg:gap-14 lg:px-8 lg:py-20">
            <div class="max-w-2xl text-white">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#9FC1E0]">
                    <?php esc_html_e('Quartz - Mechanical - Smart - Digital', 'dawp'); ?>
                </p>
                <h1 id="dawp-hero-title" class="mt-5 font-heading text-4xl font-extrabold leading-tight sm:text-5xl lg:text-6xl">
                    <?php esc_html_e('Precision Timepieces, Delivered Across America', 'dawp'); ?>
                </h1>
                <p class="mt-6 max-w-xl text-base leading-8 text-white/85 sm:text-lg">
                    <?php esc_html_e('US Watch Store curates quartz, mechanical, smart, and digital watches for everyday wear, gifting, and collecting -- every watch inspected, every order backed by a 2-year warranty.', 'dawp'); ?>
                </p>

                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url($new_arrivals_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-sm bg-[#1F4E79] px-6 text-sm font-bold text-white transition hover:bg-white hover:text-[#10151C]">
                        <?php esc_html_e('Shop New Arrivals', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-sm border border-white/70 bg-white/10 px-6 text-sm font-bold text-white backdrop-blur transition hover:bg-white hover:text-[#10151C]">
                        <?php esc_html_e('Shop All', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <div class="relative mx-auto aspect-square w-full max-w-sm justify-self-center rounded-md border border-white/15 bg-white/[0.03] lg:justify-self-end" aria-hidden="true">
                <span class="absolute left-3 top-3 h-3 w-3 border-l border-t border-white/30"></span>
                <span class="absolute right-3 top-3 h-3 w-3 border-r border-t border-white/30"></span>
                <span class="absolute bottom-3 left-3 h-3 w-3 border-b border-l border-white/30"></span>
                <span class="absolute bottom-3 right-3 h-3 w-3 border-b border-r border-white/30"></span>
                <svg class="absolute inset-0 h-full w-full p-10 text-white/25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="0.6" aria-hidden="true">
                    <circle cx="12" cy="12" r="9"/>
                    <circle cx="12" cy="12" r="6.4"/>
                    <path d="M12 3v1.6M12 19.4V21M3 12h1.6M19.4 12H21"/>
                    <path d="M12 7.2v5l3.6 1.9"/>
                </svg>
                <span class="absolute bottom-5 left-1/2 -translate-x-1/2 whitespace-nowrap text-[11px] font-bold uppercase tracking-[0.14em] text-white/50">
                    <?php esc_html_e('Inspected Before It Ships', 'dawp'); ?>
                </span>
            </div>
        </div>

        <div class="border-t border-white/10 bg-white/[0.03]">
            <div class="mx-auto flex max-w-7xl flex-wrap items-center gap-x-10 gap-y-3 px-4 py-4 sm:px-6 lg:px-8">
                <?php foreach ($value_points as $point) : ?>
                    <span class="flex items-center gap-2 text-xs font-bold uppercase tracking-[0.1em] text-white/70">
                        <span class="h-1.5 w-1.5 shrink-0 bg-[#5B7A99]" aria-hidden="true"></span>
                        <?php echo esc_html($point); ?>
                    </span>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="shop-by-category" class="bg-white py-14 sm:py-20" aria-labelledby="category-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-3xl">
                    <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#5B7A99]"><?php esc_html_e('Shop By Category', 'dawp'); ?></p>
                    <h2 id="category-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#10151C] sm:text-4xl">
                        <?php esc_html_e('Four movements. One standard of quality.', 'dawp'); ?>
                    </h2>
                    <p class="mt-4 text-base leading-7 text-[#4B5563]">
                        <?php esc_html_e('Browse quartz, mechanical, smart, and digital watches -- each category curated and inspected before it ships.', 'dawp'); ?>
                    </p>
                </div>
                <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-sm border border-[#1F4E79] px-6 text-sm font-bold text-[#14324D] transition hover:bg-[#E6EDF5]">
                    <?php esc_html_e('Shop All Products', 'dawp'); ?>
                </a>
            </div>

            <?php if (!empty($categories)) : ?>
                <?php $featured_category = array_shift($categories); ?>
                <a href="<?php echo esc_url($featured_category['url']); ?>" class="group mt-10 flex flex-col overflow-hidden rounded-md border border-[#E2E8F0] bg-[#F7F9FB] transition hover:border-[#1F4E79] hover:shadow-sm sm:flex-row">
                    <div class="flex shrink-0 items-center justify-center bg-[#EEF2F6] p-10 transition duration-300 group-hover:bg-[#E6EDF5] sm:w-64">
                        <svg viewBox="0 0 24 24" width="88" height="88" fill="none" stroke="#1F4E79" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <?php echo $render_category_icon($featured_category['slug']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                        </svg>
                    </div>
                    <div class="flex flex-1 flex-col justify-center p-6 sm:p-8">
                        <span class="text-xs font-extrabold uppercase tracking-[0.14em] text-[#5B7A99]"><?php esc_html_e('Featured Category', 'dawp'); ?></span>
                        <h3 class="mt-2 font-heading text-2xl font-extrabold text-[#10151C]"><?php echo esc_html($featured_category['name']); ?></h3>
                        <p class="mt-3 max-w-xl text-sm leading-6 text-[#4B5563]"><?php echo esc_html($featured_category['description']); ?></p>
                        <span class="mt-5 inline-flex items-center text-sm font-bold text-[#5B7A99]">
                            <?php esc_html_e('Shop category', 'dawp'); ?>
                            <span class="ml-2" aria-hidden="true">-&gt;</span>
                        </span>
                    </div>
                </a>

                <?php if (!empty($categories)) : ?>
                <div class="mt-5 grid gap-5 sm:grid-cols-3">
                    <?php foreach ($categories as $category) : ?>
                        <a href="<?php echo esc_url($category['url']); ?>" class="group overflow-hidden rounded-md border border-[#E2E8F0] bg-white transition hover:border-[#1F4E79] hover:shadow-sm">
                            <div class="flex aspect-[4/3] w-full items-center justify-center bg-[#EEF2F6] transition duration-300 group-hover:bg-[#E6EDF5]">
                                <svg viewBox="0 0 24 24" width="48" height="48" fill="none" stroke="#1F4E79" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <?php echo $render_category_icon($category['slug']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </svg>
                            </div>
                            <div class="p-5">
                                <h3 class="font-heading text-base font-extrabold text-[#10151C]"><?php echo esc_html($category['name']); ?></h3>
                                <p class="mt-2 text-sm leading-6 text-[#4B5563]"><?php echo esc_html($category['description']); ?></p>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </section>

    <section class="bg-[#EEF2F6] py-14 sm:py-20" aria-labelledby="new-arrivals-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-8 lg:grid-cols-[220px_1fr] lg:gap-12">
                <div class="lg:sticky lg:top-28 lg:self-start">
                    <span class="font-mono text-xs text-[#5B7A99]">02</span>
                    <p class="mt-2 text-sm font-extrabold uppercase tracking-[0.14em] text-[#5B7A99]"><?php esc_html_e('Just In', 'dawp'); ?></p>
                    <h2 id="new-arrivals-title" class="mt-3 font-heading text-3xl font-extrabold leading-tight text-[#10151C]">
                        <?php esc_html_e('New arrivals', 'dawp'); ?>
                    </h2>
                    <a href="<?php echo esc_url($new_arrivals_url); ?>" class="mt-6 inline-flex min-h-12 items-center justify-center rounded-sm bg-[#1F4E79] px-6 text-sm font-bold text-white transition hover:bg-[#14324D] lg:flex lg:w-full">
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
                    <div class="rounded-md border border-[#E2E8F0] bg-white p-6">
                        <h3 class="font-heading text-xl font-extrabold text-[#10151C]"><?php esc_html_e('Browse US Watch Store', 'dawp'); ?></h3>
                        <p class="mt-3 max-w-2xl text-sm leading-6 text-[#4B5563]"><?php esc_html_e('Products are being added. Browse the shop to see every available item.', 'dawp'); ?></p>
                        <a href="<?php echo esc_url($shop_url); ?>" class="mt-5 inline-flex min-h-12 items-center justify-center rounded-sm bg-[#1F4E79] px-6 text-sm font-bold text-white transition hover:bg-[#14324D]">
                            <?php esc_html_e('Browse All Products', 'dawp'); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="bg-white py-14 sm:py-20" aria-labelledby="quality-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#5B7A99]"><?php esc_html_e('Every Watch, Inspected Twice', 'dawp'); ?></p>
                <h2 id="quality-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#10151C] sm:text-4xl">
                    <?php esc_html_e('Quality you can verify, not just trust.', 'dawp'); ?>
                </h2>
                <p class="mt-4 text-base leading-7 text-[#4B5563]">
                    <?php esc_html_e('We curate across all four categories instead of chasing one narrow niche, and every watch is checked before it leaves our warehouse.', 'dawp'); ?>
                </p>
            </div>

            <div class="mt-10 grid divide-y divide-[#E2E8F0] border-t border-[#E2E8F0] sm:grid-cols-3 sm:divide-x sm:divide-y-0 sm:border-b">
                <?php foreach ($quality_points as $i => $point) : ?>
                    <div class="flex flex-col gap-3 py-6 sm:px-6 sm:py-0 sm:first:pl-0 sm:last:pr-0">
                        <span class="font-mono text-xs text-[#5B7A99]">0<?php echo (int) $i + 1; ?></span>
                        <div class="flex h-11 w-11 items-center justify-center rounded-sm bg-[#E6EDF5] text-[#1F4E79]">
                            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <?php echo $render_icon($point['icon']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </svg>
                        </div>
                        <h3 class="font-heading text-lg font-extrabold text-[#10151C]"><?php echo esc_html($point['title']); ?></h3>
                        <p class="text-sm leading-6 text-[#4B5563]"><?php echo esc_html($point['copy']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-[#10151C] py-14 text-white sm:py-20" aria-labelledby="gift-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:items-start">
                <div>
                    <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#9FC1E0]"><?php esc_html_e('The Perfect Gift, On Time', 'dawp'); ?></p>
                    <h2 id="gift-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight sm:text-4xl">
                        <?php esc_html_e('A watch says more than a gift card ever will.', 'dawp'); ?>
                    </h2>
                    <p class="mt-5 text-base leading-8 text-white/80">
                        <?php esc_html_e('Whatever the occasion, a well-chosen watch gets worn -- and it keeps saying thank you every time they check the time.', 'dawp'); ?>
                    </p>
                    <a href="<?php echo esc_url($shop_url); ?>" class="mt-8 inline-flex min-h-12 items-center justify-center rounded-sm bg-[#1F4E79] px-6 text-sm font-bold text-white transition hover:bg-white hover:text-[#10151C]">
                        <?php esc_html_e('Shop Gift Ideas', 'dawp'); ?>
                    </a>
                </div>

                <div class="divide-y divide-white/10 border-y border-white/10">
                    <?php foreach ($gift_points as $i => $point) : ?>
                        <div class="flex gap-4 py-5 first:pt-0 last:pb-0">
                            <span class="font-mono text-sm text-[#9FC1E0]">0<?php echo (int) $i + 1; ?></span>
                            <div>
                                <h3 class="font-heading text-lg font-extrabold text-white"><?php echo esc_html($point['title']); ?></h3>
                                <p class="mt-2 text-sm leading-6 text-white/75"><?php echo esc_html($point['copy']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="border-y border-[#E2E8F0] bg-[#EEF2F6] py-14 sm:py-20" aria-labelledby="trust-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[0.84fr_1.16fr] lg:items-start">
                <div>
                    <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#5B7A99]"><?php esc_html_e('Customer Care', 'dawp'); ?></p>
                    <h2 id="trust-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#10151C] sm:text-4xl">
                        <?php esc_html_e('Straightforward support, start to finish.', 'dawp'); ?>
                    </h2>
                    <p class="mt-5 text-base leading-8 text-[#4B5563]">
                        <?php esc_html_e('Clear shipping timelines, easy tracking, and a real person to talk to if anything is wrong with your order.', 'dawp'); ?>
                    </p>
                    <p class="mt-5 text-sm leading-7 text-[#4B5563]">
                        <?php
                        echo wp_kses(
                            sprintf(
                                /* translators: 1: support email link, 2: business hours */
                                __('Need help? Email %1$s. Business hours: %2$s.', 'dawp'),
                                '<a class="font-bold text-[#14324D] underline decoration-[#1F4E79]/40 underline-offset-4 transition hover:text-[#10151C]" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>',
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
                        <a href="<?php echo esc_url(home_url('/shipping-returns/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-sm bg-[#1F4E79] px-6 text-sm font-bold text-white transition hover:bg-[#14324D]">
                            <?php esc_html_e('View Shipping & Returns', 'dawp'); ?>
                        </a>
                        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-sm border border-[#1F4E79] bg-white px-6 text-sm font-bold text-[#14324D] transition hover:bg-[#E6EDF5]">
                            <?php esc_html_e('Contact Support', 'dawp'); ?>
                        </a>
                    </div>
                </div>

                <div class="grid overflow-hidden rounded-md border border-[#E2E8F0] bg-white sm:grid-cols-2">
                    <?php foreach ($trust_cards as $i => $card) : ?>
                        <div class="border-[#E2E8F0] p-6 <?php echo (0 === $i % 2) ? 'sm:border-r' : ''; ?> <?php echo ($i < count($trust_cards) - 2) ? 'border-b' : ''; ?>">
                            <div class="flex h-11 w-11 items-center justify-center rounded-sm bg-[#E6EDF5] text-[#1F4E79]">
                                <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <?php echo $render_icon($card['icon']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </svg>
                            </div>
                            <h3 class="mt-4 font-heading text-base font-extrabold text-[#10151C]"><?php echo esc_html($card['title']); ?></h3>
                            <p class="mt-2 text-sm leading-6 text-[#4B5563]"><?php echo esc_html($card['copy']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</div>
