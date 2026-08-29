<?php
/**
 * Homepage — TimePiece Haven (watch retailer, US market).
 *
 * Content is intentionally hardcoded (see theme skill). Copy is written to
 * comply with Google Merchant Center / Shopping policies: no unverifiable
 * claims, clear shipping/returns/warranty language, and an explicit statement
 * that products are genuine (no replicas or counterfeits).
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
$support_email    = 'support@timepiecehaven.com';

$dawp_cat_url = static function ($slug) {
    if (function_exists('get_term_by')) {
        $term = get_term_by('slug', $slug, 'product_cat');

        if ($term && !is_wp_error($term)) {
            $link = get_term_link($term);

            if (!is_wp_error($link)) {
                return $link;
            }
        }
    }

    return home_url('/product-category/' . trim($slug, '/') . '/');
};

/* --- Collection photos (background removed, transparent WebP) --- */
$cat_images = [
    'minimalist'      => 'assets/img/minimal.webp',
    'sport-outdoor'   => 'assets/img/sport.webp',
    'vintage-leather' => 'assets/img/vintage.webp',
    'luxury-style'    => 'assets/img/luxury.webp',
];

$cat_img = static function ($slug, $class, $loading = 'lazy') use ($cat_images) {
    if (empty($cat_images[$slug])) {
        return '';
    }

    return sprintf(
        '<img src="%s" alt="" width="900" height="900" class="%s" loading="%s" decoding="async">',
        esc_url(get_theme_file_uri($cat_images[$slug])),
        esc_attr($class),
        esc_attr($loading)
    );
};

$categories = [
    [
        'slug'  => 'minimalist',
        'name'  => __('Minimalist', 'dawp'),
        'copy'  => __('Clean dials, slim cases, and leather or mesh straps. A Scandinavian-inspired look that works for the office and everyday wear.', 'dawp'),
        'specs' => [__('Slim profile', 'dawp'), __('Leather / mesh strap', 'dawp'), __('Everyday & workwear', 'dawp')],
    ],
    [
        'slug'  => 'sport-outdoor',
        'name'  => __('Sport & Outdoor', 'dawp'),
        'copy'  => __('Built for active days: 5 ATM water resistance, silicone straps, and chronograph or backlight functions in bold, energetic colors.', 'dawp'),
        'specs' => [__('5 ATM water resistance', 'dawp'), __('Chronograph / backlight', 'dawp'), __('Silicone strap', 'dawp')],
    ],
    [
        'slug'  => 'vintage-leather',
        'name'  => __('Vintage & Leather', 'dawp'),
        'copy'  => __('Retro shapes inspired by the 70s and 80s, some with an open-heart dial that shows the movement, on genuine brown leather straps.', 'dawp'),
        'specs' => [__('Open-heart options', 'dawp'), __('Genuine leather strap', 'dawp'), __('Retro case shapes', 'dawp')],
    ],
    [
        'slug'  => 'luxury-style',
        'name'  => __('Luxury Style', 'dawp'),
        'copy'  => __('Dress watches with polished finishing, sapphire-coated glass, and refined detailing for weddings, events, and formal occasions.', 'dawp'),
        'specs' => [__('Polished finishing', 'dawp'), __('Dress & formal wear', 'dawp'), __('Gift-ready packaging', 'dawp')],
    ],
];

$feature_bar = [
    [
        'title' => __('Free shipping on every US order', 'dawp'),
        'copy'  => __('Tracked and insured standard shipping to any US address, with no minimum.', 'dawp'),
        'icon'  => '<path d="M10 17h4V5H3v12h2"/><path d="M14 8h4l3 3v6h-3"/><circle cx="7" cy="17" r="2"/><circle cx="16" cy="17" r="2"/>',
    ],
    [
        'title' => __('Genuine watches only', 'dawp'),
        'copy'  => __('New, authentic watches in original packaging. No replicas or counterfeits.', 'dawp'),
        'icon'  => '<path d="M12 2 4 5v6c0 5 3.4 8.6 8 10 4.6-1.4 8-5 8-10V5Z"/><path d="m9 12 2 2 4-4"/>',
    ],
    [
        'title' => __('30-day returns', 'dawp'),
        'copy'  => __('Return an unworn watch within 30 days of delivery for a refund.', 'dawp'),
        'icon'  => '<path d="M20 12a8 8 0 0 1-13.66 5.66L4 15"/><path d="M4 20v-5h5"/><path d="M4 12A8 8 0 0 1 17.66 6.34L20 9"/><path d="M20 4v5h-5"/>',
    ],
    [
        'title' => __('Secure checkout', 'dawp'),
        'copy'  => __('Encrypted payments via Visa, Mastercard, American Express, and PayPal.', 'dawp'),
        'icon'  => '<rect width="18" height="11" x="3" y="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/>',
    ],
];

$guide_points = [
    [
        'title' => __('Quartz movement', 'dawp'),
        'copy'  => __('Battery powered, highly accurate, and low maintenance. A practical choice for daily and sport wear.', 'dawp'),
    ],
    [
        'title' => __('Automatic movement', 'dawp'),
        'copy'  => __('Self-winding through the motion of your wrist, with no battery. Featured in most of our Vintage and Luxury pieces.', 'dawp'),
    ],
    [
        'title' => __('Water resistance', 'dawp'),
        'copy'  => __('3 ATM handles splashes and rain, 5 ATM is suitable for showering and short swims. Ratings are listed on every product page.', 'dawp'),
    ],
    [
        'title' => __('Strap & sizing', 'dawp'),
        'copy'  => __('Case sizes run 36-44 mm. Each listing shows the case diameter, strap width, and material so you can choose the right fit.', 'dawp'),
    ],
];

$assurance = [
    __('Genuine products only — we never sell replica or counterfeit watches.', 'dawp'),
    __('Shipped in original manufacturer packaging with the instruction booklet.', 'dawp'),
    __('Any manufacturer warranty depends on the model and is listed on the product page.', 'dawp'),
    __('Prices are shown in USD; applicable sales tax is calculated at checkout.', 'dawp'),
    __('Order and shipping updates are emailed to you, with tracking once dispatched.', 'dawp'),
];

/* --- New arrivals query (optional; degrades gracefully) --- */
$home_products_query = null;

if (class_exists('WooCommerce')) {
    $home_tax_query = [];

    if (function_exists('wc_get_product_visibility_term_ids')) {
        $vis = wc_get_product_visibility_term_ids();
        $excluded = [];

        if (!empty($vis['exclude-from-catalog'])) {
            $excluded[] = $vis['exclude-from-catalog'];
        }

        if ('yes' === get_option('woocommerce_hide_out_of_stock_items') && !empty($vis['outofstock'])) {
            $excluded[] = $vis['outofstock'];
        }

        if (!empty($excluded)) {
            $home_tax_query[] = [
                'taxonomy' => 'product_visibility',
                'field'    => 'term_taxonomy_id',
                'terms'    => $excluded,
                'operator' => 'NOT IN',
            ];
        }
    }

    $home_products_query = new WP_Query([
        'post_type'           => 'product',
        'post_status'         => 'publish',
        'posts_per_page'      => 8,
        'orderby'             => 'date',
        'order'               => 'DESC',
        'ignore_sticky_posts' => true,
        'no_found_rows'       => true,
        'tax_query'           => $home_tax_query,
    ]);
}
?>

<div class="bg-background text-foreground">

    <!-- HERO -->
    <section class="relative overflow-hidden bg-primary text-white" aria-labelledby="hero-title">
        <div class="pointer-events-none absolute -right-24 -top-24 h-96 w-96 rounded-full border border-white/10" aria-hidden="true"></div>
        <div class="pointer-events-none absolute -right-8 top-16 h-64 w-64 rounded-full border border-accent/25" aria-hidden="true"></div>

        <div class="mx-auto grid max-w-7xl gap-12 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:items-center lg:px-8 lg:py-24">
            <div class="max-w-2xl">
                <p class="font-heading text-xs font-semibold uppercase tracking-brand text-accent">
                    <?php esc_html_e('Watches for every day, sport & dress', 'dawp'); ?>
                </p>
                <h1 id="hero-title" class="mt-5 font-heading text-4xl font-bold uppercase leading-tight sm:text-5xl lg:text-6xl">
                    <?php esc_html_e('Find the watch that fits your routine', 'dawp'); ?>
                </h1>
                <p class="mt-6 max-w-xl text-base leading-8 text-white/80 sm:text-lg">
                    <?php esc_html_e('TimePiece Haven is an independent US watch shop with four focused collections — Minimalist, Sport & Outdoor, Vintage & Leather, and Luxury Style. Straightforward pricing, clear specs, and free insured shipping on every US order.', 'dawp'); ?>
                </p>

                <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url($new_arrivals_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-lg bg-accent px-7 text-sm font-bold uppercase tracking-wide text-primary transition hover:bg-accent-hover">
                        <?php esc_html_e('Shop New Arrivals', 'dawp'); ?>
                    </a>
                    <a href="#shop-by-category" class="inline-flex min-h-12 items-center justify-center rounded-lg border border-white/25 px-7 text-sm font-bold uppercase tracking-wide text-white transition hover:border-white hover:bg-white/10">
                        <?php esc_html_e('Explore Collections', 'dawp'); ?>
                    </a>
                </div>

                <dl class="mt-10 grid max-w-lg grid-cols-3 gap-4 border-t border-white/10 pt-6 text-sm">
                    <div>
                        <dt class="font-heading text-lg font-bold text-white">4</dt>
                        <dd class="mt-1 text-white/60"><?php esc_html_e('Curated collections', 'dawp'); ?></dd>
                    </div>
                    <div>
                        <dt class="font-heading text-lg font-bold text-white"><?php esc_html_e('Free', 'dawp'); ?></dt>
                        <dd class="mt-1 text-white/60"><?php esc_html_e('US shipping, every order', 'dawp'); ?></dd>
                    </div>
                    <div>
                        <dt class="font-heading text-lg font-bold text-white">30 days</dt>
                        <dd class="mt-1 text-white/60"><?php esc_html_e('To return an unworn watch', 'dawp'); ?></dd>
                    </div>
                </dl>
            </div>

            <div class="relative mx-auto flex w-full max-w-md items-center justify-center">
                <div class="absolute inset-0 rounded-full bg-accent/10 blur-2xl" aria-hidden="true"></div>
                <div class="relative grid w-full grid-cols-2 gap-4">
                    <?php foreach ($categories as $i => $cat) : ?>
                        <div class="flex flex-col items-center gap-3 rounded-xl border border-white/10 bg-white/5 p-4 text-center<?php echo $i % 2 ? ' translate-y-5' : ''; ?>">
                            <span class="flex h-24 w-full items-center justify-center rounded-lg bg-white p-2">
                                <?php echo $cat_img($cat['slug'], 'h-full w-auto object-contain', $i < 2 ? 'eager' : 'lazy'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </span>
                            <span class="font-heading text-xs font-semibold uppercase tracking-wide text-white/75"><?php echo esc_html($cat['name']); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURE BAR -->
    <section class="border-b border-line bg-white" aria-label="<?php esc_attr_e('Store policies at a glance', 'dawp'); ?>">
        <div class="mx-auto grid max-w-7xl gap-6 px-4 py-8 sm:grid-cols-2 sm:px-6 lg:grid-cols-4 lg:px-8">
            <?php foreach ($feature_bar as $item) : ?>
                <div class="flex items-start gap-3">
                    <span class="mt-0.5 inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-accent-soft text-primary" aria-hidden="true">
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><?php echo $item['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></svg>
                    </span>
                    <div>
                        <p class="text-sm font-bold text-foreground"><?php echo esc_html($item['title']); ?></p>
                        <p class="mt-1 text-xs leading-5 text-muted"><?php echo esc_html($item['copy']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- SHOP BY COLLECTION -->
    <section id="shop-by-category" class="py-16 sm:py-20" aria-labelledby="category-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-3xl">
                    <p class="font-heading text-xs font-semibold uppercase tracking-brand text-accent"><?php esc_html_e('Shop by collection', 'dawp'); ?></p>
                    <h2 id="category-title" class="mt-4 font-heading text-3xl font-bold uppercase leading-tight text-foreground sm:text-4xl">
                        <?php esc_html_e('Four styles, one place to shop', 'dawp'); ?>
                    </h2>
                    <p class="mt-4 text-base leading-7 text-muted">
                        <?php esc_html_e('Each collection has its own use case. Browse the one that matches how you want to wear your watch.', 'dawp'); ?>
                    </p>
                </div>
                <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center self-start rounded-lg border border-primary px-6 text-sm font-bold uppercase tracking-wide text-primary transition hover:bg-primary hover:text-white">
                    <?php esc_html_e('Shop all watches', 'dawp'); ?>
                </a>
            </div>

            <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <?php foreach ($categories as $cat) : ?>
                    <a href="<?php echo esc_url($dawp_cat_url($cat['slug'])); ?>" class="group flex flex-col overflow-hidden rounded-xl border border-line bg-white transition hover:-translate-y-1 hover:border-primary/20 hover:shadow-card-hover">
                        <div class="flex items-center justify-center bg-surface-alt p-6 transition group-hover:bg-accent-soft">
                            <?php echo $cat_img($cat['slug'], 'h-40 w-auto object-contain transition duration-300 group-hover:scale-105'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                        </div>
                        <div class="flex flex-1 flex-col p-5">
                            <h3 class="font-heading text-lg font-bold uppercase text-foreground"><?php echo esc_html($cat['name']); ?></h3>
                            <p class="mt-3 flex-1 text-sm leading-6 text-muted"><?php echo esc_html($cat['copy']); ?></p>
                            <ul class="mt-4 flex flex-wrap gap-2">
                                <?php foreach ($cat['specs'] as $spec) : ?>
                                    <li class="rounded-full bg-background px-2.5 py-1 text-xs font-semibold text-primary"><?php echo esc_html($spec); ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <span class="mt-5 inline-flex items-center text-sm font-bold text-primary">
                                <?php
                                /* translators: %s: collection name */
                                printf(esc_html__('Shop %s', 'dawp'), esc_html($cat['name']));
                                ?>
                                <svg class="ml-2 transition group-hover:translate-x-1" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                            </span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- NEW ARRIVALS -->
    <section class="bg-white py-16 sm:py-20" aria-labelledby="arrivals-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="font-heading text-xs font-semibold uppercase tracking-brand text-accent"><?php esc_html_e('Just landed', 'dawp'); ?></p>
                    <h2 id="arrivals-title" class="mt-4 font-heading text-3xl font-bold uppercase leading-tight text-foreground sm:text-4xl">
                        <?php esc_html_e('New arrivals', 'dawp'); ?>
                    </h2>
                </div>
                <a href="<?php echo esc_url($new_arrivals_url); ?>" class="text-sm font-bold uppercase tracking-wide text-primary underline decoration-accent decoration-2 underline-offset-4 transition hover:text-accent">
                    <?php esc_html_e('View all new arrivals', 'dawp'); ?>
                </a>
            </div>

            <?php if ($home_products_query instanceof WP_Query && $home_products_query->have_posts()) : ?>
                <div class="home-product-loop woocommerce mt-10">
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
                <div class="mt-10 flex flex-col gap-6 rounded-xl border border-line bg-background p-8 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h3 class="font-heading text-xl font-bold uppercase text-foreground"><?php esc_html_e('New pieces are being added', 'dawp'); ?></h3>
                        <p class="mt-3 max-w-xl text-sm leading-6 text-muted"><?php esc_html_e('Our latest watches are on the way to the store. Browse the full catalog in the meantime, or check back soon.', 'dawp'); ?></p>
                    </div>
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 shrink-0 items-center justify-center rounded-lg bg-primary px-6 text-sm font-bold uppercase tracking-wide text-white transition hover:bg-primary-soft">
                        <?php esc_html_e('Browse the catalog', 'dawp'); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- BUYING GUIDE -->
    <section class="bg-surface-alt py-16 sm:py-20" aria-labelledby="guide-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:items-start lg:px-8">
            <div>
                <p class="font-heading text-xs font-semibold uppercase tracking-brand text-accent"><?php esc_html_e('Before you buy', 'dawp'); ?></p>
                <h2 id="guide-title" class="mt-4 font-heading text-3xl font-bold uppercase leading-tight text-foreground sm:text-4xl">
                    <?php esc_html_e('A quick watch buying guide', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-muted">
                    <?php esc_html_e('Not sure where to start? These are the details that matter most when choosing a watch. Every product page lists the movement, case size, strap material, and water resistance so you can compare with confidence.', 'dawp'); ?>
                </p>
                <a href="<?php echo esc_url(home_url('/faq/')); ?>" class="mt-8 inline-flex min-h-12 items-center justify-center rounded-lg border border-primary px-6 text-sm font-bold uppercase tracking-wide text-primary transition hover:bg-primary hover:text-white">
                    <?php esc_html_e('Read the full FAQ', 'dawp'); ?>
                </a>
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                <?php foreach ($guide_points as $point) : ?>
                    <article class="rounded-xl border border-line bg-white p-6">
                        <h3 class="font-heading text-base font-bold uppercase text-foreground"><?php echo esc_html($point['title']); ?></h3>
                        <p class="mt-2 text-sm leading-6 text-muted"><?php echo esc_html($point['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ASSURANCE -->
    <section class="py-16 sm:py-20" aria-labelledby="assurance-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-2 lg:items-start">
                <div>
                    <p class="font-heading text-xs font-semibold uppercase tracking-brand text-accent"><?php esc_html_e('Buy with confidence', 'dawp'); ?></p>
                    <h2 id="assurance-title" class="mt-4 font-heading text-3xl font-bold uppercase leading-tight text-foreground sm:text-4xl">
                        <?php esc_html_e('What to expect from TimePiece Haven', 'dawp'); ?>
                    </h2>
                    <p class="mt-5 text-base leading-8 text-muted">
                        <?php
                        echo wp_kses(
                            sprintf(
                                /* translators: %s: support email link */
                                __('Questions before ordering? Email us at %s and we will get back to you within one business day.', 'dawp'),
                                '<a class="font-semibold text-primary underline decoration-accent decoration-2 underline-offset-4 transition hover:text-accent" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>'
                            ),
                            ['a' => ['class' => [], 'href' => []]]
                        );
                        ?>
                    </p>
                    <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                        <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-lg bg-accent px-6 text-sm font-bold uppercase tracking-wide text-primary transition hover:bg-accent-hover">
                            <?php esc_html_e('Shipping Policy', 'dawp'); ?>
                        </a>
                        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-lg border border-primary px-6 text-sm font-bold uppercase tracking-wide text-primary transition hover:bg-primary hover:text-white">
                            <?php esc_html_e('Contact us', 'dawp'); ?>
                        </a>
                    </div>
                </div>

                <ul class="grid gap-4 sm:grid-cols-2">
                    <?php foreach ($assurance as $line) : ?>
                        <li class="flex items-start gap-3 rounded-xl border border-line bg-white p-5">
                            <span class="mt-0.5 inline-flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-success/15 text-success" aria-hidden="true">
                                <svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m5 12 5 5L20 7"/></svg>
                            </span>
                            <span class="text-sm leading-6 text-foreground"><?php echo esc_html($line); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>

    <!-- CLOSING CTA -->
    <section class="bg-primary text-white" aria-labelledby="cta-title">
        <div class="mx-auto flex max-w-7xl flex-col items-start gap-6 px-4 py-14 sm:px-6 lg:flex-row lg:items-center lg:justify-between lg:px-8 lg:py-16">
            <div class="max-w-2xl">
                <h2 id="cta-title" class="font-heading text-2xl font-bold uppercase leading-tight sm:text-3xl">
                    <?php esc_html_e('Ready to pick your next watch?', 'dawp'); ?>
                </h2>
                <p class="mt-3 text-sm leading-7 text-white/75 sm:text-base">
                    <?php esc_html_e('Browse all four collections, compare the specs, and order with free insured shipping on every US order.', 'dawp'); ?>
                </p>
            </div>
            <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 shrink-0 items-center justify-center rounded-lg bg-accent px-8 text-sm font-bold uppercase tracking-wide text-primary transition hover:bg-accent-hover">
                <?php esc_html_e('Shop all watches', 'dawp'); ?>
            </a>
        </div>
    </section>

</div>
