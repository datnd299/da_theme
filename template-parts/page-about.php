<?php
/**
 * About Us- Watchfavor.
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
?>

<div class="bg-background text-foreground">
    <section class="bg-primary text-white">
        <div class="mx-auto max-w-3xl px-4 py-16 text-center sm:px-6 lg:px-8 lg:py-20">
            <p class="font-heading text-xs font-semibold uppercase tracking-brand text-accent"><?php esc_html_e('Our Story', 'dawp'); ?></p>
            <h1 class="mt-4 font-heading text-3xl font-semibold leading-tight sm:text-4xl lg:text-5xl"><?php esc_html_e('Watches, Designed and Finished In-House', 'dawp'); ?></h1>
            <p class="mx-auto mt-6 max-w-xl text-base leading-8 text-white/75"><?php esc_html_e('Watchfavor is a mechanical watch house- not a retailer. Every case, dial and movement assembly on this site carries our own name.', 'dawp'); ?></p>
        </div>
    </section>

    <section class="py-16 sm:py-20">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-2 lg:items-center">
                <div class="mx-auto max-w-xl lg:mx-0">
                    <p class="font-heading text-xs font-semibold uppercase tracking-brand text-accent"><?php esc_html_e('The Manifesto', 'dawp'); ?></p>
                    <p class="mt-5 font-heading text-2xl leading-relaxed text-primary sm:text-3xl"><?php esc_html_e('In a world driven by digital fleetingness, we return to the soul of mechanics.', 'dawp'); ?></p>
                    <div class="wu-prose mt-8 space-y-5 text-base leading-8 text-foreground-muted">
                        <p><?php esc_html_e('No batteries. No screens. Just the heartbeat of hundreds of micro-components dancing on your wrist, powered by your motion and alive with your pulse. Every Watchfavor watch begins as a sketch, not a spec sheet from a supplier catalog- we design the case profile, select the movement, and set the finishing standard ourselves before a single unit is built.', 'dawp'); ?></p>
                        <p><?php esc_html_e('That in-house discipline is why we can stand behind every detail: the depth of a guilloché pattern, the angle of a hand-polished bevel, the exact weight of a crown\'s knurling under your fingertip. We build in small runs so quality control never becomes a bottleneck.', 'dawp'); ?></p>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <img src="<?php echo esc_url(get_theme_file_uri('assets/img/img4.jpeg')); ?>" alt="<?php esc_attr_e('Watchfavor classic dress watch, angled detail', 'dawp'); ?>" class="h-full w-full rounded-lg object-cover shadow-card" width="1024" height="1024">
                    <img src="<?php echo esc_url(get_theme_file_uri('assets/img/img3.jpeg')); ?>" alt="<?php esc_attr_e('Watchfavor automatic watch with diamond hour markers', 'dawp'); ?>" class="mt-8 h-full w-full rounded-lg object-cover shadow-card" width="1024" height="1024">
                </div>
            </div>
        </div>
    </section>

    <?php if (!empty($dawp_collections)) : ?>
    <section class="bg-surface-alt py-16 sm:py-20">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-center font-heading text-2xl font-semibold text-primary sm:text-3xl"><?php esc_html_e('Three Collections, One Standard', 'dawp'); ?></h2>
            <div class="mt-12 grid gap-8 sm:grid-cols-3">
                <?php foreach ($dawp_collections as $slug => $cat) : ?>
                    <a href="<?php echo esc_url($dawp_nav_cat_url($slug)); ?>" class="group block rounded-lg bg-surface p-7 shadow-card transition hover:-translate-y-1 hover:shadow-card-hover">
                        <h3 class="font-heading text-lg font-semibold text-primary"><?php echo esc_html($cat['name']); ?></h3>
                        <p class="mt-3 text-sm leading-7 text-muted"><?php echo esc_html($cat['description']); ?></p>
                        <span class="mt-5 inline-block text-xs font-semibold uppercase tracking-button text-accent-hover"><?php esc_html_e('Shop the collection →', 'dawp'); ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <section class="py-16 sm:py-20">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-center font-heading text-2xl font-semibold text-primary sm:text-3xl"><?php esc_html_e('What We Stand Behind', 'dawp'); ?></h2>
            <div class="mt-12 grid gap-10 sm:grid-cols-3">
                <?php
                $dawp_values = [
                    ['title' => __('Automatic Only', 'dawp'), 'desc' => __('Every Watchfavor watch runs on a self-winding mechanical movement. No batteries, ever.', 'dawp')],
                    ['title' => __('Full Spec Sheet', 'dawp'), 'desc' => __('Case size, power reserve, water resistance and crystal type are listed on every product page.', 'dawp')],
                    ['title' => __('Free US Shipping', 'dawp'), 'desc' => __('Every order ships free within the US, with tracking from dispatch to your door.', 'dawp')],
                ];
                foreach ($dawp_values as $v) : ?>
                    <div class="text-center">
                        <h3 class="font-heading text-base font-semibold text-primary"><?php echo esc_html($v['title']); ?></h3>
                        <p class="mx-auto mt-3 max-w-xs text-sm leading-7 text-foreground-muted"><?php echo esc_html($v['desc']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="border-t border-line py-16 text-center sm:py-20">
        <div class="mx-auto max-w-2xl px-4 sm:px-6 lg:px-8">
            <h2 class="font-heading text-2xl font-semibold text-primary sm:text-3xl"><?php esc_html_e('Ready to Find Your Watch?', 'dawp'); ?></h2>
            <a href="<?php echo esc_url($shop_url); ?>" class="mt-8 inline-flex min-h-12 items-center justify-center bg-primary px-9 font-heading text-xs font-semibold uppercase tracking-button text-white transition hover:bg-primary-soft">
                <?php esc_html_e('Explore the Collections', 'dawp'); ?>
            </a>
        </div>
    </section>
</div>
