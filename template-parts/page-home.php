<?php
/**
 * Homepage- Watchfavor.
 * "Time is not measured. It is crafted." Light & Bright design system.
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

$dawp_nav_cat_url = static function ($slug) {
    if (function_exists('dawp_product_category_url')) {
        return dawp_product_category_url($slug);
    }
    return home_url('/product-category/' . trim($slug, '/') . '/');
};

$dawp_collections = function_exists('dawp_lbq_product_categories') ? dawp_lbq_product_categories() : [];

// Featured Masterpiece: use a real, in-stock product if one exists (newest
// first); otherwise fall back to placeholder brief copy until the catalog is
// populated (see project notes- store owner still needs to add products).
$dawp_flagship = null;
if (function_exists('wc_get_products')) {
    $products = wc_get_products([
        'status'  => 'publish',
        'limit'   => 1,
        'orderby' => 'date',
        'order'   => 'DESC',
        'stock_status' => 'instock',
    ]);
    if (!empty($products)) {
        $dawp_flagship = $products[0];
    }
}
?>

<!-- ============================================================
     SECTION 1 - HERO
     ============================================================ -->
<section class="relative overflow-hidden bg-background">
    <div class="mx-auto grid max-w-[1280px] items-center gap-12 px-4 py-20 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-28">
        <div class="relative z-10 text-center lg:text-left">
            <p class="font-heading text-xs font-semibold uppercase tracking-brand text-accent"><?php esc_html_e('Watchfavor', 'dawp'); ?></p>
            <h1 class="mt-5 font-heading text-4xl font-semibold leading-[1.1] text-primary sm:text-5xl lg:text-6xl">
                <?php esc_html_e('Time Is Not Measured. It Is Crafted.', 'dawp'); ?>
            </h1>
            <p class="mx-auto mt-6 max-w-md text-base leading-8 text-foreground-muted lg:mx-0">
                <?php esc_html_e('Masterpieces of mechanical poetry, forged for those who appreciate the eternal tick.', 'dawp'); ?>
            </p>
            <div class="mt-9 flex flex-col items-center gap-4 sm:flex-row sm:justify-center lg:justify-start">
                <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-13 items-center justify-center bg-primary px-9 font-heading text-xs font-semibold uppercase tracking-button text-white transition hover:bg-primary-soft">
                    <?php esc_html_e('Explore the Collections', 'dawp'); ?>
                </a>
            </div>
        </div>

        <div class="relative mx-auto flex aspect-square w-full max-w-md items-center justify-center">
            <div class="absolute inset-0 rounded-full" style="background: radial-gradient(circle at 35% 30%, var(--color-surface-alt), var(--color-background) 70%); box-shadow: var(--shadow-card-hover);" aria-hidden="true"></div>
            <img src="<?php echo esc_url(get_theme_file_uri('assets/img/img1.jpeg')); ?>" alt="<?php echo esc_attr(sprintf(__('%s automatic chronograph watch', 'dawp'), dawp_store_name())); ?>" class="relative h-3/4 w-3/4 rounded-full object-cover shadow-card-hover" width="1024" height="1024">
        </div>
    </div>
</section>

<!-- Trust strip -->
<section class="border-y border-line bg-surface">
    <div class="mx-auto grid max-w-[1280px] grid-cols-1 divide-y divide-line px-4 sm:grid-cols-4 sm:divide-x sm:divide-y-0 sm:px-6 lg:px-8">
        <?php
        $dawp_trust = [
            ['label' => __('Free US Shipping', 'dawp'), 'desc' => __('On every order', 'dawp')],
            ['label' => __('30-Day Returns', 'dawp'), 'desc' => __('Unworn, full refund', 'dawp')],
            ['label' => __('2-Year Warranty', 'dawp'), 'desc' => __('On every watch', 'dawp')],
            ['label' => __('Automatic Movement', 'dawp'), 'desc' => __('No batteries, ever', 'dawp')],
        ];
        foreach ($dawp_trust as $t) : ?>
            <div class="flex flex-col items-center gap-1 py-6 text-center">
                <span class="font-heading text-sm font-semibold uppercase tracking-label text-primary"><?php echo esc_html($t['label']); ?></span>
                <span class="text-xs text-muted"><?php echo esc_html($t['desc']); ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- ============================================================
     SECTION 2 - THE MANIFESTO
     ============================================================ -->
<section class="bg-background">
    <div class="mx-auto max-w-3xl px-4 py-24 text-center sm:px-6 lg:py-32">
        <p class="font-heading text-xs font-semibold uppercase tracking-brand text-accent"><?php esc_html_e('The Manifesto', 'dawp'); ?></p>
        <p class="mt-8 font-heading text-2xl leading-relaxed text-primary sm:text-3xl lg:text-4xl">
            <?php esc_html_e('In a world driven by digital fleetingness, we return to the soul of mechanics.', 'dawp'); ?>
        </p>
        <p class="mx-auto mt-8 max-w-xl text-base leading-8 text-foreground-muted">
            <?php esc_html_e('No batteries. No screens. Just the heartbeat of hundreds of micro-components dancing on your wrist- powered by your motion, alive with your pulse.', 'dawp'); ?>
        </p>
    </div>
</section>

<!-- ============================================================
     SECTION 3 - THE COLLECTIONS
     ============================================================ -->
<?php if (!empty($dawp_collections)) : ?>
<section class="bg-surface-alt">
    <div class="mx-auto max-w-[1280px] px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
        <div class="mx-auto max-w-2xl text-center">
            <p class="font-heading text-xs font-semibold uppercase tracking-brand text-accent"><?php esc_html_e('The Collections', 'dawp'); ?></p>
            <h2 class="mt-4 font-heading text-3xl font-semibold text-primary sm:text-4xl"><?php esc_html_e('Three Studies in Time', 'dawp'); ?></h2>
        </div>

        <div class="mt-14 grid gap-8 sm:grid-cols-3">
            <?php foreach ($dawp_collections as $slug => $cat) : ?>
                <a href="<?php echo esc_url($dawp_nav_cat_url($slug)); ?>" class="group flex flex-col items-center rounded-lg bg-surface p-8 text-center shadow-card transition duration-normal ease-fluid hover:-translate-y-1.5 hover:shadow-card-hover">
                    <span class="flex h-16 w-16 items-center justify-center rounded-full bg-accent-soft">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="var(--color-accent-hover)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="<?php echo esc_attr($cat['icon'] ?? 'M12 4a8 8 0 100 16 8 8 0 000-16z'); ?>"/></svg>
                    </span>
                    <h3 class="mt-6 font-heading text-lg font-semibold text-primary"><?php echo esc_html($cat['name']); ?></h3>
                    <p class="mt-3 text-sm leading-6 text-muted"><?php echo esc_html($cat['short']); ?></p>
                    <span class="mt-6 inline-flex items-center border-b border-accent pb-0.5 font-heading text-xs font-semibold uppercase tracking-button text-accent-hover transition group-hover:text-primary">
                        <?php esc_html_e('View Collection', 'dawp'); ?>
                    </span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ============================================================
     SECTION 4 - FEATURED MASTERPIECE
     ============================================================ -->
<section class="bg-background">
    <div class="mx-auto grid max-w-[1280px] items-center gap-12 px-4 py-20 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-28">
        <div class="order-2 flex aspect-[4/5] items-center justify-center rounded-lg bg-surface shadow-card lg:order-1">
            <?php if ($dawp_flagship instanceof WC_Product && $dawp_flagship->get_image_id()) : ?>
                <?php echo $dawp_flagship->get_image('large', ['class' => 'h-full w-full rounded-lg object-cover']); ?>
            <?php else : ?>
                <img src="<?php echo esc_url(get_theme_file_uri('assets/img/img2.jpeg')); ?>" alt="<?php esc_attr_e('The Solstice, Watchfavor automatic watch', 'dawp'); ?>" class="h-full w-full rounded-lg object-cover" width="1024" height="1024">
            <?php endif; ?>
        </div>

        <div class="order-1 lg:order-2">
            <p class="font-heading text-xs font-semibold uppercase tracking-brand text-accent"><?php esc_html_e('The Flagship', 'dawp'); ?></p>
            <h2 class="mt-4 font-heading text-3xl font-semibold text-primary sm:text-4xl">
                <?php echo $dawp_flagship instanceof WC_Product ? esc_html($dawp_flagship->get_name()) : esc_html__('The Solstice', 'dawp'); ?>
            </h2>
            <p class="mt-6 text-base leading-8 text-foreground-muted">
                <?php
                if ($dawp_flagship instanceof WC_Product && $dawp_flagship->get_short_description()) {
                    echo wp_kses_post($dawp_flagship->get_short_description());
                } else {
                    esc_html_e('A symphony of 316L steel, domed sapphire crystal, and an intricate automatic heart- designed and finished in-house.', 'dawp');
                }
                ?>
            </p>
            <ul class="mt-7 space-y-3">
                <?php foreach ([__('42-Hour Power Reserve', 'dawp'), __('Anti-Reflective Sapphire Glass', 'dawp'), __('Exhibition Caseback', 'dawp')] as $feature) : ?>
                    <li class="flex items-center gap-3 text-sm text-foreground">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--color-accent-hover)" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 13l4 4L19 7"/></svg>
                        <?php echo esc_html($feature); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
            <a href="<?php echo esc_url($dawp_flagship instanceof WC_Product ? $dawp_flagship->get_permalink() : $shop_url); ?>" class="mt-9 inline-flex min-h-12 items-center justify-center border border-primary px-8 font-heading text-xs font-semibold uppercase tracking-button text-primary transition hover:bg-primary hover:text-white">
                <?php esc_html_e('Discover Details', 'dawp'); ?>
            </a>
        </div>
    </div>
</section>

<!-- ============================================================
     SECTION 5 - THE CRAFT
     ============================================================ -->
<section class="bg-surface-alt">
    <div class="mx-auto max-w-[1280px] px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
        <div class="mx-auto max-w-2xl text-center">
            <p class="font-heading text-xs font-semibold uppercase tracking-brand text-accent"><?php esc_html_e('The Craft', 'dawp'); ?></p>
            <h2 class="mt-4 font-heading text-3xl font-semibold text-primary sm:text-4xl"><?php esc_html_e('Materials & Making', 'dawp'); ?></h2>
        </div>

        <div class="mt-14 grid gap-10 sm:grid-cols-3">
            <?php
            $dawp_craft = [
                [
                    'title' => __('The Movement', 'dawp'),
                    'desc'  => __('Driven by precision automatic calibers. Never stops, just like you.', 'dawp'),
                    'path'  => 'M12 3v3M12 18v3M3 12h3M18 12h3M12 9a3 3 0 100 6 3 3 0 000-6z',
                ],
                [
                    'title' => __('The Materials', 'dawp'),
                    'desc'  => __('Surgical-grade steel meets scratch-resistant sapphire. Built for generations.', 'dawp'),
                    'path'  => 'M12 3l7 4v5c0 4.5-3 8.6-7 9.8C8 20.6 5 16.5 5 12V7l7-4z',
                ],
                [
                    'title' => __('The Finish', 'dawp'),
                    'desc'  => __('Hand-polished bevels and brushed surfaces catching every ray of light.', 'dawp'),
                    'path'  => 'M4 12l4-8h8l4 8-8 8-8-8z',
                ],
            ];
            foreach ($dawp_craft as $c) : ?>
                <div class="text-center">
                    <span class="mx-auto flex h-16 w-16 items-center justify-center rounded-full border border-accent">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--color-accent-hover)" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="<?php echo esc_attr($c['path']); ?>"/></svg>
                    </span>
                    <h3 class="mt-6 font-heading text-lg font-semibold text-primary"><?php echo esc_html($c['title']); ?></h3>
                    <p class="mx-auto mt-3 max-w-xs text-sm leading-7 text-foreground-muted"><?php echo esc_html($c['desc']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
