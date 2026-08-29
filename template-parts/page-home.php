<?php
/**
 * Homepage — YourWatchStore.
 *
 * Premium / minimal / modern. Sections: Hero · Shop by Style · Best Sellers ·
 * New Arrivals · Why Choose Us. Tailwind utilities only; product grids reuse
 * the WooCommerce `content-product` card (styled in assets/css/shop.css).
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

/**
 * Shared product_visibility exclusion (hidden / out-of-stock) for the home queries.
 */
$dawp_home_tax_query = [];
if (function_exists('wc_get_product_visibility_term_ids')) {
    $dawp_vis  = wc_get_product_visibility_term_ids();
    $dawp_excl = [];

    if (!empty($dawp_vis['exclude-from-catalog'])) {
        $dawp_excl[] = $dawp_vis['exclude-from-catalog'];
    }
    if ('yes' === get_option('woocommerce_hide_out_of_stock_items') && !empty($dawp_vis['outofstock'])) {
        $dawp_excl[] = $dawp_vis['outofstock'];
    }
    if ($dawp_excl) {
        $dawp_home_tax_query[] = [
            'taxonomy' => 'product_visibility',
            'field'    => 'term_taxonomy_id',
            'terms'    => $dawp_excl,
            'operator' => 'NOT IN',
        ];
    }
}

$best_sellers_query = null;
$new_arrivals_query = null;

if (class_exists('WooCommerce')) {
    $best_sellers_query = new WP_Query([
        'post_type'           => 'product',
        'post_status'         => 'publish',
        'posts_per_page'      => 4,
        'meta_key'            => 'total_sales',
        'orderby'             => ['meta_value_num' => 'DESC', 'date' => 'DESC'],
        'ignore_sticky_posts' => true,
        'no_found_rows'       => true,
        'tax_query'           => $dawp_home_tax_query,
    ]);

    $new_arrivals_query = new WP_Query([
        'post_type'           => 'product',
        'post_status'         => 'publish',
        'posts_per_page'      => 8,
        'orderby'             => 'date',
        'order'               => 'DESC',
        'ignore_sticky_posts' => true,
        'no_found_rows'       => true,
        'tax_query'           => $dawp_home_tax_query,
    ]);
}

/**
 * Resolve the 4 style categories, with graceful fallbacks to any top-level
 * product categories so the section is never empty on a fresh install.
 */
$dawp_img_base = get_template_directory_uri() . '/assets/img/';

$dawp_style_defs = [
    ['slug' => 'dive-watches',        'name' => __('Dive Watches', 'dawp'),        'description' => __('Rotating bezels, luminous dials, and serious water resistance for the water and everywhere else.', 'dawp'), 'image' => $dawp_img_base . 'dive.webp'],
    ['slug' => 'field-watches',       'name' => __('Field Watches', 'dawp'),       'description' => __('Legible, rugged, and unfussy — a utilitarian classic built for daily wear.', 'dawp'), 'image' => $dawp_img_base . 'field.webp'],
    ['slug' => 'dress-watches',       'name' => __('Dress Watches', 'dawp'),       'description' => __('Slim cases and clean dials that slide under a cuff and finish an outfit.', 'dawp'), 'image' => $dawp_img_base . 'dress.webp'],
    ['slug' => 'chronograph-watches', 'name' => __('Chronograph Watches', 'dawp'), 'description' => __('Stopwatch complications and sub-dials for timing anything that matters.', 'dawp'), 'image' => $dawp_img_base . 'chrono.webp'],
];

$dawp_style_cards = [];
$dawp_used_terms  = [];

foreach ($dawp_style_defs as $def) {
    $term = function_exists('get_term_by') ? get_term_by('slug', $def['slug'], 'product_cat') : null;

    if (!$term || is_wp_error($term)) {
        $dawp_style_cards[] = [
            'name'        => $def['name'],
            'description' => $def['description'],
            'url'         => $shop_url,
            'image'       => !empty($def['image']) ? $def['image'] : '',
        ];
        continue;
    }

    $link = get_term_link($term);
    $desc = term_description($term->term_id, 'product_cat');
    $img  = '';

    $thumb_id = get_term_meta($term->term_id, 'thumbnail_id', true);
    if ($thumb_id) {
        $img = wp_get_attachment_image_url($thumb_id, 'medium_large');
    }
    if (!$img && !empty($def['image'])) {
        $img = $def['image'];
    }

    $dawp_style_cards[] = [
        'name'        => $term->name,
        'description' => $desc ? wp_strip_all_tags($desc) : $def['description'],
        'url'         => is_wp_error($link) ? $shop_url : $link,
        'image'       => $img,
    ];
    $dawp_used_terms[] = (int) $term->term_id;
}

if (function_exists('get_terms') && count($dawp_style_cards) < 4) {
    $fallback_terms = get_terms([
        'taxonomy'   => 'product_cat',
        'hide_empty' => false,
        'parent'     => 0,
        'exclude'    => array_merge($dawp_used_terms, [(int) get_option('default_product_cat')]),
        'number'     => 4 - count($dawp_style_cards),
        'orderby'    => 'count',
        'order'      => 'DESC',
    ]);

    if (!is_wp_error($fallback_terms)) {
        foreach ($fallback_terms as $term) {
            $link     = get_term_link($term);
            $desc     = term_description($term->term_id, 'product_cat');
            $img      = '';
            $thumb_id = get_term_meta($term->term_id, 'thumbnail_id', true);

            if ($thumb_id) {
                $img = wp_get_attachment_image_url($thumb_id, 'medium_large');
            }

            $dawp_style_cards[] = [
                'name'        => $term->name,
                'description' => $desc ? wp_strip_all_tags($desc) : __('Browse this collection.', 'dawp'),
                'url'         => is_wp_error($link) ? $shop_url : $link,
                'image'       => $img,
            ];
        }
    }
}

$why_points = [
    [
        'title' => __('Automatic Movements', 'dawp'),
        'copy'  => __('Self-winding mechanical calibers that run on the motion of your wrist — no battery to replace.', 'dawp'),
        'icon'  => 'gear',
    ],
    [
        'title' => __('Sapphire Crystal', 'dawp'),
        'copy'  => __('Scratch-resistant sapphire glass protecting the dial on our core collection.', 'dawp'),
        'icon'  => 'shield',
    ],
    [
        'title' => __('Free US Shipping', 'dawp'),
        'copy'  => __('Every US order ships free. Orders are dispatched within 1–3 business days with tracking.', 'dawp'),
        'icon'  => 'truck',
    ],
    [
        'title' => __('30-Day Returns', 'dawp'),
        'copy'  => __('Return an unworn watch in original condition, with box and papers, within 30 days of delivery.', 'dawp'),
        'icon'  => 'refresh',
    ],
];

$dawp_home_icon = static function ($icon) {
    $icons = [
        'gear'    => '<circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.6 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.6a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9c.14.31.22.65.22 1v.09"/>',
        'shield'  => '<path d="M12 3 4.5 6v6c0 4.4 3.2 7.9 7.5 9 4.3-1.1 7.5-4.6 7.5-9V6L12 3Z"/><path d="m9 12 2 2 4-4"/>',
        'truck'   => '<path d="M10 17h4V5H3v12h2"/><path d="M14 8h4l3 3v6h-3"/><circle cx="7" cy="17" r="2"/><circle cx="16" cy="17" r="2"/>',
        'refresh' => '<path d="M20 12a8 8 0 0 1-13.66 5.66L4 15"/><path d="M4 20v-5h5"/><path d="M4 12A8 8 0 0 1 17.66 6.34L20 9"/><path d="M20 4v5h-5"/>',
    ];

    return $icons[$icon] ?? $icons['shield'];
};

/**
 * Render a WooCommerce product grid from a WP_Query using the theme card.
 */
$dawp_render_product_grid = static function ($query) {
    if (!($query instanceof WP_Query) || !$query->have_posts()) {
        return false;
    }
    ?>
    <div class="home-product-loop shop-page woocommerce">
        <?php
        if (function_exists('wc_setup_loop')) {
            wc_setup_loop(['columns' => 4, 'is_shortcode' => true, 'name' => 'home-products']);
        }

        woocommerce_product_loop_start();

        while ($query->have_posts()) :
            $query->the_post();
            wc_get_template_part('content', 'product');
        endwhile;

        woocommerce_product_loop_end();

        if (function_exists('woocommerce_reset_loop')) {
            woocommerce_reset_loop();
        }

        wp_reset_postdata();
        ?>
    </div>
    <?php
    return true;
};
?>

<div class="bg-background text-foreground">

    <!-- Hero -->
    <section class="border-b border-border" aria-labelledby="home-hero-title">
        <div class="mx-auto grid max-w-[1280px] gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[1.05fr_0.95fr] lg:items-center lg:gap-16 lg:px-8 lg:py-24">
            <div class="max-w-xl">
                <p class="text-xs font-bold uppercase tracking-[0.16em] text-accent-blush">
                    <?php esc_html_e('Dive · Field · Dress · Chronograph', 'dawp'); ?>
                </p>
                <h1 id="home-hero-title" class="mt-5 font-heading text-4xl font-extrabold leading-[1.08] tracking-tight text-foreground sm:text-5xl lg:text-6xl">
                    <?php esc_html_e('Mechanical Watches for Every Day.', 'dawp'); ?>
                </h1>
                <p class="mt-6 max-w-md text-base leading-7 text-foreground-muted sm:text-lg">
                    <?php esc_html_e('Discover automatic timepieces designed for everyday wear.', 'dawp'); ?>
                </p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-[3rem] items-center justify-center rounded-sm bg-foreground px-7 text-sm font-semibold uppercase tracking-[0.06em] text-white transition hover:bg-accent-hover">
                        <?php esc_html_e('Shop Watches', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url($new_arrivals_url); ?>" class="inline-flex min-h-[3rem] items-center justify-center rounded-sm border border-foreground bg-transparent px-7 text-sm font-semibold uppercase tracking-[0.06em] text-foreground transition hover:bg-foreground hover:text-white">
                        <?php esc_html_e('New Arrivals', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <div class="relative aspect-[4/5] w-full overflow-hidden rounded-md border border-border bg-surface-alt sm:aspect-[5/4] lg:aspect-square">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/hero.png'); ?>" alt="<?php esc_attr_e('Automatic mechanical watch', 'dawp'); ?>" class="absolute inset-0 h-full w-full object-cover" width="1000" height="1000" fetchpriority="high">
                <span class="absolute bottom-5 left-1/2 -translate-x-1/2 whitespace-nowrap rounded-sm bg-surface px-3 py-1 text-[11px] font-bold uppercase tracking-[0.16em] text-muted">
                    <?php esc_html_e('Automatic · Sapphire Crystal', 'dawp'); ?>
                </span>
            </div>
        </div>
    </section>

    <!-- Shop by Style -->
    <section id="shop-by-style" class="bg-background py-16 sm:py-24" aria-labelledby="home-style-title">
        <div class="mx-auto max-w-[1280px] px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <h2 id="home-style-title" class="font-heading text-3xl font-extrabold tracking-tight text-foreground sm:text-4xl">
                    <?php esc_html_e('Shop by Style', 'dawp'); ?>
                </h2>
                <a href="<?php echo esc_url($shop_url); ?>" class="text-sm font-semibold text-foreground underline decoration-border underline-offset-4 transition hover:decoration-foreground">
                    <?php esc_html_e('View all watches', 'dawp'); ?>
                </a>
            </div>

            <?php if (!empty($dawp_style_cards)) : ?>
                <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                    <?php foreach ($dawp_style_cards as $card) : ?>
                        <a href="<?php echo esc_url($card['url']); ?>" class="group flex flex-col overflow-hidden rounded-md border border-border bg-surface transition hover:border-foreground hover:shadow-card-hover">
                            <div class="flex aspect-square items-center justify-center overflow-hidden bg-surface-alt">
                                <?php if (!empty($card['image'])) : ?>
                                    <img src="<?php echo esc_url($card['image']); ?>" alt="<?php echo esc_attr($card['name']); ?>" class="h-full w-full object-cover transition duration-500 group-hover:scale-[1.03]" width="400" height="400" loading="lazy">
                                <?php else : ?>
                                    <svg viewBox="0 0 24 24" width="40" height="40" fill="none" stroke="currentColor" stroke-width="1.4" class="text-foreground/25" aria-hidden="true"><circle cx="12" cy="12" r="6"/><path d="M12 12V8.5M12 12l2.5 1.5M9.5 3h5M9.5 21h5"/></svg>
                                <?php endif; ?>
                            </div>
                            <div class="flex flex-1 flex-col p-5">
                                <h3 class="font-heading text-base font-bold text-foreground"><?php echo esc_html($card['name']); ?></h3>
                                <p class="mt-2 line-clamp-3 text-sm leading-6 text-foreground-muted"><?php echo esc_html($card['description']); ?></p>
                                <span class="mt-4 inline-flex items-center text-sm font-semibold text-accent-blush">
                                    <?php esc_html_e('Shop', 'dawp'); ?>
                                    <span class="ml-1.5 transition group-hover:translate-x-0.5" aria-hidden="true">&rarr;</span>
                                </span>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Best Sellers -->
    <section class="border-y border-border bg-surface-alt py-16 sm:py-24" aria-labelledby="home-best-title">
        <div class="mx-auto max-w-[1280px] px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <h2 id="home-best-title" class="font-heading text-3xl font-extrabold tracking-tight text-foreground sm:text-4xl">
                    <?php esc_html_e('Best Sellers', 'dawp'); ?>
                </h2>
                <a href="<?php echo esc_url($shop_url); ?>" class="text-sm font-semibold text-foreground underline decoration-border underline-offset-4 transition hover:decoration-foreground">
                    <?php esc_html_e('Shop all', 'dawp'); ?>
                </a>
            </div>

            <div class="mt-10">
                <?php
                if (!$dawp_render_product_grid($best_sellers_query)) :
                    ?>
                    <div class="rounded-md border border-border bg-surface p-6">
                        <p class="text-sm leading-6 text-foreground-muted"><?php esc_html_e('Best sellers appear here once orders start coming in. In the meantime, browse the full collection.', 'dawp'); ?></p>
                        <a href="<?php echo esc_url($shop_url); ?>" class="mt-4 inline-flex min-h-[3rem] items-center justify-center rounded-sm bg-foreground px-6 text-sm font-semibold uppercase tracking-[0.06em] text-white transition hover:bg-accent-hover">
                            <?php esc_html_e('Browse All Watches', 'dawp'); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- New Arrivals -->
    <section class="bg-background py-16 sm:py-24" aria-labelledby="home-new-title">
        <div class="mx-auto max-w-[1280px] px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <h2 id="home-new-title" class="font-heading text-3xl font-extrabold tracking-tight text-foreground sm:text-4xl">
                    <?php esc_html_e('New Arrivals', 'dawp'); ?>
                </h2>
                <a href="<?php echo esc_url($new_arrivals_url); ?>" class="text-sm font-semibold text-foreground underline decoration-border underline-offset-4 transition hover:decoration-foreground">
                    <?php esc_html_e('See what\'s new', 'dawp'); ?>
                </a>
            </div>

            <div class="mt-10">
                <?php
                if (!$dawp_render_product_grid($new_arrivals_query)) :
                    ?>
                    <div class="rounded-md border border-border bg-surface p-6">
                        <p class="text-sm leading-6 text-foreground-muted"><?php esc_html_e('New watches are being added to the store. Browse the shop to see everything available now.', 'dawp'); ?></p>
                        <a href="<?php echo esc_url($shop_url); ?>" class="mt-4 inline-flex min-h-[3rem] items-center justify-center rounded-sm bg-foreground px-6 text-sm font-semibold uppercase tracking-[0.06em] text-white transition hover:bg-accent-hover">
                            <?php esc_html_e('Browse All Watches', 'dawp'); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="border-t border-border bg-surface-alt py-16 sm:py-20" aria-labelledby="home-why-title">
        <div class="mx-auto max-w-[1280px] px-4 sm:px-6 lg:px-8">
            <h2 id="home-why-title" class="font-heading text-3xl font-extrabold tracking-tight text-foreground sm:text-4xl">
                <?php esc_html_e('Why Choose Us', 'dawp'); ?>
            </h2>
            <div class="mt-10 grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
                <?php foreach ($why_points as $point) : ?>
                    <div class="flex flex-col gap-3">
                        <span class="inline-flex h-11 w-11 items-center justify-center rounded-sm bg-accent-soft text-accent-hover">
                            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <?php echo $dawp_home_icon($point['icon']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </svg>
                        </span>
                        <h3 class="font-heading text-base font-bold text-foreground"><?php echo esc_html($point['title']); ?></h3>
                        <p class="text-sm leading-6 text-foreground-muted"><?php echo esc_html($point['copy']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</div>
