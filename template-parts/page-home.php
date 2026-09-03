<?php
/**
 * Homepage — North Time Co.
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
$best_sellers_url = add_query_arg('orderby', 'popularity', $shop_url);

// This WooCommerce install's product catalog is shared with unrelated prior
// theme branches (apparel, tools — see .plans/site.md), so Best Sellers and
// New Arrivals are scoped to the store's watch categories rather than
// querying "all products," which would otherwise surface that leftover
// inventory here.
$dawp_watch_cat_slugs = ['dive-watches', 'field-watches', 'dress-watches', 'chronograph-watches', 'minimalist', 'sport-outdoor', 'vintage-leather', 'luxury-style'];

function dawp_home_watch_query(array $args, array $cat_slugs) {
    return get_posts(wp_parse_args($args, [
        'post_type'   => 'product',
        'post_status' => 'publish',
        'tax_query'   => [
            'relation' => 'AND',
            [
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => $cat_slugs,
            ],
            [
                'taxonomy' => 'product_visibility',
                'field'    => 'name',
                'terms'    => 'exclude-from-catalog',
                'operator' => 'NOT IN',
            ],
        ],
    ]));
}

$best_seller_posts = dawp_home_watch_query([
    'posts_per_page' => 4,
    'meta_key'       => 'total_sales',
    'orderby'        => 'meta_value_num',
    'order'          => 'DESC',
], $dawp_watch_cat_slugs);

$new_arrival_posts = dawp_home_watch_query([
    'posts_per_page' => 8,
    'orderby'        => 'date',
    'order'          => 'DESC',
], $dawp_watch_cat_slugs);

/**
 * One product card for the Best Sellers / New Arrivals grids.
 */
function dawp_home_product_card($post_id, $is_first = false) {
    $product = wc_get_product($post_id);

    if (!$product || !$product->is_visible()) {
        return;
    }

    $cats     = get_the_terms($post_id, 'product_cat');
    $cat_name = (!is_wp_error($cats) && !empty($cats)) ? $cats[0]->name : '';
    $image_id = $product->get_image_id();
    $image_html = '';

    if ($image_id) {
        $image_url = wp_get_attachment_image_url($image_id, 'full');
        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true) ?: $product->get_name();
        $attrs = function_exists('dawp_i0_img_attrs') ? dawp_i0_img_attrs($image_url, [
            'width'   => 480,
            'height'  => 600,
            'srcset'  => [[240, 300], [320, 400], [480, 600], [640, 800]],
            'sizes'   => '(min-width: 1024px) 22vw, (min-width: 640px) 45vw, 46vw',
            'loading' => $is_first ? 'eager' : 'lazy',
        ]) : 'loading="lazy"';
        $image_html = sprintf('<img class="h-full w-full object-cover transition duration-500 group-hover:scale-105" alt="%s" %s>', esc_attr($image_alt), $attrs);
    }
    ?>
    <li class="group">
        <a href="<?php echo esc_url(get_permalink($post_id)); ?>" class="block">
            <div class="relative aspect-[4/5] overflow-hidden bg-surface-alt">
                <?php echo $image_html; ?>

                <?php if ($product->is_on_sale()) : ?>
                    <span class="absolute left-3 top-3 bg-primary px-2.5 py-1 text-[10px] font-bold uppercase tracking-label text-white">
                        <?php esc_html_e('Sale', 'dawp'); ?>
                    </span>
                <?php endif; ?>

                <button type="button" class="absolute right-3 top-3 inline-flex h-9 w-9 items-center justify-center bg-surface/90 text-foreground opacity-0 transition duration-300 group-hover:opacity-100" aria-label="<?php esc_attr_e('Add to wishlist', 'dawp'); ?>" onclick="event.preventDefault();">
                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 0 0-7.8 7.8l1 1L12 21l7.8-7.6 1-1a5.5 5.5 0 0 0 0-7.8Z"></path></svg>
                </button>

                <span class="absolute inset-x-3 bottom-3 translate-y-2 bg-primary py-2.5 text-center text-[11px] font-bold uppercase tracking-label text-white opacity-0 transition duration-300 group-hover:translate-y-0 group-hover:opacity-100">
                    <?php esc_html_e('Quick View', 'dawp'); ?>
                </span>
            </div>

            <div class="mt-4">
                <?php if ($cat_name) : ?>
                    <p class="text-[11px] font-semibold uppercase tracking-label text-muted"><?php echo esc_html($cat_name); ?></p>
                <?php endif; ?>
                <h3 class="mt-1 font-heading text-base text-foreground"><?php echo esc_html($product->get_name()); ?></h3>

                <?php if ($product->get_rating_count() > 0) : ?>
                    <div class="mt-1.5 flex items-center gap-0.5" aria-label="<?php echo esc_attr(sprintf(__('Rated %s out of 5', 'dawp'), $product->get_average_rating())); ?>">
                        <?php
                        $rating = round((float) $product->get_average_rating());
                        for ($i = 1; $i <= 5; $i++) :
                        ?>
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="<?php echo $i <= $rating ? 'currentColor' : 'none'; ?>" stroke="currentColor" stroke-width="1.5" class="<?php echo $i <= $rating ? 'text-accent' : 'text-line'; ?>" aria-hidden="true">
                                <path d="M12 2.5l2.9 6.1 6.6.7-4.9 4.5 1.3 6.6L12 17l-5.9 3.4 1.3-6.6-4.9-4.5 6.6-.7L12 2.5Z"/>
                            </svg>
                        <?php endfor; ?>
                    </div>
                <?php endif; ?>

                <p class="mt-1.5 text-sm font-semibold text-foreground"><?php echo wp_kses_post($product->get_price_html()); ?></p>
            </div>
        </a>
    </li>
    <?php
}

/**
 * Placeholder shown in place of a product grid until the catalog has watches
 * assigned to the watch categories (see $dawp_watch_cat_slugs above).
 */
function dawp_home_empty_state($shop_url) {
    ?>
    <div class="mt-10 border border-dashed border-line px-6 py-14 text-center">
        <p class="font-heading text-lg text-foreground"><?php esc_html_e('New watches are on the way', 'dawp'); ?></p>
        <p class="mx-auto mt-2 max-w-sm text-sm leading-6 text-foreground-muted"><?php esc_html_e("We're adding fresh timepieces to the collection soon — check back shortly.", 'dawp'); ?></p>
        <a href="<?php echo esc_url($shop_url); ?>" class="mt-6 inline-flex h-11 items-center justify-center border border-foreground px-7 text-xs font-bold uppercase tracking-button text-foreground transition hover:border-accent hover:text-accent">
            <?php esc_html_e('Visit the Shop', 'dawp'); ?>
        </a>
    </div>
    <?php
}
?>

<!-- Hero -->
<section class="bg-background">
    <div class="mx-auto grid max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 sm:py-20 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-28">
        <div>
            <p class="text-xs font-semibold uppercase tracking-brand text-accent"><?php esc_html_e('North Time Co.', 'dawp'); ?></p>
            <h1 class="mt-4 font-heading text-4xl leading-[1.1] text-foreground sm:text-5xl lg:text-6xl">
                <?php esc_html_e('Timepieces that define your style', 'dawp'); ?>
            </h1>
            <p class="mt-5 max-w-md text-base leading-7 text-foreground-muted">
                <?php esc_html_e('Discover carefully selected timepieces designed for everyday wear and timeless style.', 'dawp'); ?>
            </p>
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex h-12 items-center justify-center bg-primary px-8 text-xs font-bold uppercase tracking-button text-white transition hover:bg-primary-soft">
                    <?php esc_html_e('Shop All Watches', 'dawp'); ?>
                </a>
                <a href="<?php echo esc_url($new_arrivals_url); ?>" class="inline-flex h-12 items-center justify-center border border-foreground px-8 text-xs font-bold uppercase tracking-button text-foreground transition hover:border-accent hover:text-accent">
                    <?php esc_html_e('Explore New Arrivals', 'dawp'); ?>
                </a>
            </div>
        </div>

        <div class="aspect-[5/4] overflow-hidden bg-surface-alt sm:aspect-[4/3] lg:aspect-[4/5]">
            <img src="<?php echo esc_url(get_theme_file_uri('assets/img/luxury.webp')); ?>" alt="<?php esc_attr_e('Featured North Time Co. watch', 'dawp'); ?>" width="900" height="1125" class="h-full w-full object-cover" loading="eager" fetchpriority="high" decoding="async">
        </div>
    </div>
</section>

<!-- Shop by Category -->
<section class="bg-surface py-16 sm:py-20 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <h2 class="font-heading text-3xl text-foreground sm:text-4xl"><?php esc_html_e('Shop by Category', 'dawp'); ?></h2>

        <div class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <?php
            $dawp_home_categories = [
                [
                    'title' => __("Men's Watches", 'dawp'),
                    'desc'  => __('Classic and contemporary timepieces for every occasion.', 'dawp'),
                    'image' => 'assets/img/minimal.webp',
                ],
                [
                    'title' => __("Women's Watches", 'dawp'),
                    'desc'  => __('Elegant designs made to complement your style.', 'dawp'),
                    'image' => 'assets/img/vintage.webp',
                ],
                [
                    'title' => __('Automatic Watches', 'dawp'),
                    'desc'  => __('Discover the craftsmanship of mechanical movements.', 'dawp'),
                    'image' => 'assets/img/luxury.webp',
                ],
                [
                    'title' => __('New Arrivals', 'dawp'),
                    'desc'  => __('Explore our latest watches and newest collections.', 'dawp'),
                    'image' => 'assets/img/minimal.webp',
                    'url'   => $new_arrivals_url,
                ],
            ];

            foreach ($dawp_home_categories as $category) :
            ?>
                <a href="<?php echo esc_url($category['url'] ?? $shop_url); ?>" class="group block">
                    <div class="aspect-[4/5] overflow-hidden bg-surface-alt">
                        <img src="<?php echo esc_url(get_theme_file_uri($category['image'])); ?>" alt="<?php echo esc_attr($category['title']); ?>" width="480" height="600" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" loading="lazy" decoding="async">
                    </div>
                    <h3 class="mt-4 font-heading text-lg text-foreground"><?php echo esc_html($category['title']); ?></h3>
                    <p class="mt-1 text-sm leading-6 text-foreground-muted"><?php echo esc_html($category['desc']); ?></p>
                    <span class="mt-3 inline-flex items-center gap-1.5 text-xs font-bold uppercase tracking-label text-accent">
                        <?php esc_html_e('Shop Now', 'dawp'); ?>
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                    </span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Best Sellers -->
<section class="bg-background py-16 sm:py-20 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <h2 class="font-heading text-3xl text-foreground sm:text-4xl"><?php esc_html_e('Best Sellers', 'dawp'); ?></h2>
        <p class="mt-2 text-sm text-foreground-muted"><?php esc_html_e('Discover the watches our customers love most.', 'dawp'); ?></p>

        <?php if ($best_seller_posts) : ?>
            <ul class="mt-10 grid grid-cols-2 gap-x-5 gap-y-10 lg:grid-cols-4 lg:gap-x-8">
                <?php foreach ($best_seller_posts as $i => $post) : dawp_home_product_card($post->ID, 0 === $i); endforeach; ?>
            </ul>

            <div class="mt-12 text-center">
                <a href="<?php echo esc_url($best_sellers_url); ?>" class="inline-flex h-12 items-center justify-center bg-primary px-8 text-xs font-bold uppercase tracking-button text-white transition hover:bg-primary-soft">
                    <?php esc_html_e('Shop Best Sellers', 'dawp'); ?>
                </a>
            </div>
        <?php else : ?>
            <?php dawp_home_empty_state($shop_url); ?>
        <?php endif; ?>
    </div>
</section>

<!-- New Arrivals -->
<section class="bg-surface py-16 sm:py-20 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <h2 class="font-heading text-3xl text-foreground sm:text-4xl"><?php esc_html_e('New Arrivals', 'dawp'); ?></h2>
        <p class="mt-2 text-sm text-foreground-muted"><?php esc_html_e('Fresh styles and new timepieces, carefully selected for you.', 'dawp'); ?></p>

        <?php if ($new_arrival_posts) : ?>
            <ul class="mt-10 grid grid-cols-2 gap-x-5 gap-y-10 lg:grid-cols-4 lg:gap-x-8">
                <?php foreach ($new_arrival_posts as $post) : dawp_home_product_card($post->ID); endforeach; ?>
            </ul>

            <div class="mt-12 text-center">
                <a href="<?php echo esc_url($new_arrivals_url); ?>" class="inline-flex h-12 items-center justify-center border border-foreground px-8 text-xs font-bold uppercase tracking-button text-foreground transition hover:border-accent hover:text-accent">
                    <?php esc_html_e('View All', 'dawp'); ?>
                </a>
            </div>
        <?php else : ?>
            <?php dawp_home_empty_state($shop_url); ?>
        <?php endif; ?>
    </div>
</section>

<!-- Why North Time Co. -->
<section class="bg-primary py-16 text-white sm:py-20 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <h2 class="text-center font-heading text-3xl sm:text-4xl"><?php esc_html_e('Shop With Confidence', 'dawp'); ?></h2>

        <div class="mt-12 grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-4">
            <?php
            $dawp_home_features = [
                [
                    'title' => __('Free Shipping', 'dawp'),
                    'desc'  => __('Free shipping on every order across the US.', 'dawp'),
                    'icon'  => '<path d="M3 7h11v9H3z"/><path d="M14 10h4l3 3v3h-7z"/><circle cx="7" cy="18" r="1.6"/><circle cx="17.5" cy="18" r="1.6"/>',
                ],
                [
                    'title' => __('30-Day Returns', 'dawp'),
                    'desc'  => __('Shop with confidence with our easy return policy.', 'dawp'),
                    'icon'  => '<path d="M4 4v6h6"/><path d="M20 20v-6h-6"/><path d="M5 14a8 8 0 0 0 14.5 3.5"/><path d="M19 10A8 8 0 0 0 4.5 6.5"/>',
                ],
                [
                    'title' => __('Secure Checkout', 'dawp'),
                    'desc'  => __('Safe and secure payment for every purchase.', 'dawp'),
                    'icon'  => '<rect x="4" y="10" width="16" height="10" rx="1.5"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/>',
                ],
                [
                    'title' => __('Quality Timepieces', 'dawp'),
                    'desc'  => __('Carefully selected watches built for style and everyday wear.', 'dawp'),
                    'icon'  => '<circle cx="12" cy="12" r="8.5"/><path d="M12 7.5V12l3 2"/>',
                ],
            ];

            foreach ($dawp_home_features as $feature) :
            ?>
                <div class="text-center">
                    <svg class="mx-auto h-9 w-9 text-accent" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><?php echo $feature['icon']; ?></svg>
                    <h3 class="mt-4 font-heading text-lg"><?php echo esc_html($feature['title']); ?></h3>
                    <p class="mt-2 text-sm leading-6 text-white/70"><?php echo esc_html($feature['desc']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Featured Collection -->
<section class="relative bg-background">
    <div class="relative aspect-[4/5] overflow-hidden sm:aspect-[16/9] lg:aspect-[21/9]">
        <img src="<?php echo esc_url(get_theme_file_uri('assets/img/vintage.webp')); ?>" alt="<?php esc_attr_e('North Time Co. featured collection', 'dawp'); ?>" width="1600" height="900" class="h-full w-full object-cover" loading="lazy" decoding="async">
        <div class="absolute inset-0 bg-primary/45"></div>
        <div class="absolute inset-0 flex items-center justify-center px-4 text-center">
            <div>
                <h2 class="font-heading text-3xl text-white sm:text-4xl lg:text-5xl"><?php esc_html_e('Timeless by Design', 'dawp'); ?></h2>
                <p class="mx-auto mt-4 max-w-md text-sm leading-6 text-white/85 sm:text-base"><?php esc_html_e('A carefully curated collection of watches made to complement every moment.', 'dawp'); ?></p>
                <a href="<?php echo esc_url($shop_url); ?>" class="mt-7 inline-flex h-12 items-center justify-center bg-white px-8 text-xs font-bold uppercase tracking-button text-primary transition hover:bg-accent hover:text-white">
                    <?php esc_html_e('Explore the Collection', 'dawp'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter -->
<section class="bg-surface py-16 sm:py-20 lg:py-24">
    <div class="mx-auto max-w-xl px-4 text-center sm:px-6 lg:px-8">
        <h2 class="font-heading text-3xl text-foreground sm:text-4xl"><?php esc_html_e('Stay in the Loop', 'dawp'); ?></h2>
        <p class="mt-3 text-sm leading-6 text-foreground-muted"><?php esc_html_e('Get updates on new arrivals, exclusive offers, and the latest from North Time Co.', 'dawp'); ?></p>

        <form id="newsletter-form" class="mt-7 flex flex-col gap-3 sm:flex-row" novalidate>
            <label class="sr-only" for="newsletter-email"><?php esc_html_e('Email address', 'dawp'); ?></label>
            <input id="newsletter-email" type="email" name="email" required placeholder="<?php esc_attr_e('Enter your email', 'dawp'); ?>" class="h-12 w-full border border-line bg-surface px-4 text-sm text-foreground outline-none placeholder:text-muted focus:border-accent">
            <button type="submit" class="h-12 shrink-0 bg-primary px-8 text-xs font-bold uppercase tracking-button text-white transition hover:bg-primary-soft">
                <?php esc_html_e('Subscribe', 'dawp'); ?>
            </button>
        </form>
        <p id="newsletter-message" class="mt-3 hidden text-sm font-medium text-accent" role="status"></p>
    </div>
</section>
