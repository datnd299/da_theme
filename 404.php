<?php
/**
 * 404 Not Found — North Time Co.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$dawp_cat_url = static function ($slug) {
    if (function_exists('dawp_product_category_url')) {
        return dawp_product_category_url($slug);
    }

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

$collections = [
    ['slug' => 'mens-watches',      'name' => __("Men's Watches", 'dawp'),     'desc' => __('Classic and contemporary styles', 'dawp')],
    ['slug' => 'womens-watches',    'name' => __("Women's Watches", 'dawp'),   'desc' => __('Elegant designs for every day', 'dawp')],
    ['slug' => 'automatic-watches', 'name' => __('Automatic Watches', 'dawp'), 'desc' => __('Self-winding mechanical movements', 'dawp')],
    ['slug' => 'new-arrivals',      'name' => __('New Arrivals', 'dawp'),      'desc' => __('Our latest watches', 'dawp'), 'url' => add_query_arg('orderby', 'date', $shop_url)],
];

$help_links = [
    ['title' => __('Track Order', 'dawp'),  'url' => home_url('/track-order/')],
    ['title' => __('Contact Us', 'dawp'),   'url' => home_url('/contact-us/')],
    ['title' => __('FAQ', 'dawp'),          'url' => home_url('/faq/')],
];
?>

<div class="bg-background text-foreground">
    <section class="bg-primary text-white" aria-labelledby="error-title">
        <div class="mx-auto max-w-3xl px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
            <p class="font-heading text-xs font-semibold uppercase tracking-brand text-accent"><?php esc_html_e('Error 404', 'dawp'); ?></p>
            <h1 id="error-title" class="mt-4 font-heading text-3xl font-bold uppercase leading-tight sm:text-4xl lg:text-5xl">
                <?php esc_html_e('This page could not be found', 'dawp'); ?>
            </h1>
            <p class="mt-5 max-w-xl text-base leading-8 text-white/80">
                <?php esc_html_e('The link may be broken or the page may have moved. You can head back to the homepage or browse the North Time Co. watch collections below.', 'dawp'); ?>
            </p>
            <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-lg bg-accent px-7 text-sm font-bold uppercase tracking-wide text-primary transition hover:bg-accent-hover">
                    <?php esc_html_e('Shop all watches', 'dawp'); ?>
                </a>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-lg border border-white/25 px-7 text-sm font-bold uppercase tracking-wide text-white transition hover:border-white hover:bg-white/10">
                    <?php esc_html_e('Back to home', 'dawp'); ?>
                </a>
            </div>
        </div>
    </section>

    <section class="py-14 sm:py-20">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <h2 class="font-heading text-2xl font-bold uppercase text-foreground"><?php esc_html_e('Shop by category', 'dawp'); ?></h2>
            <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <?php foreach ($collections as $c) : ?>
                    <a href="<?php echo esc_url($c['url'] ?? $dawp_cat_url($c['slug'])); ?>" class="group flex flex-col rounded-xl border border-line bg-white p-5 transition hover:-translate-y-1 hover:border-primary/20 hover:shadow-card-hover">
                        <h3 class="font-heading text-base font-bold uppercase text-foreground"><?php echo esc_html($c['name']); ?></h3>
                        <p class="mt-2 flex-1 text-sm leading-6 text-muted"><?php echo esc_html($c['desc']); ?></p>
                        <span class="mt-4 inline-flex items-center text-sm font-bold text-primary">
                            <?php esc_html_e('Browse', 'dawp'); ?>
                            <svg class="ml-2 transition group-hover:translate-x-1" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>

            <div class="mt-10 rounded-xl border border-line bg-white p-6">
                <h2 class="font-heading text-base font-bold uppercase text-foreground"><?php esc_html_e('Looking for help?', 'dawp'); ?></h2>
                <nav class="mt-4 flex flex-wrap gap-3" aria-label="<?php esc_attr_e('Helpful links', 'dawp'); ?>">
                    <?php foreach ($help_links as $link) : ?>
                        <a href="<?php echo esc_url($link['url']); ?>" class="inline-flex min-h-11 items-center justify-center rounded-lg border border-primary px-5 text-sm font-bold uppercase tracking-wide text-primary transition hover:bg-primary hover:text-white">
                            <?php echo esc_html($link['title']); ?>
                        </a>
                    <?php endforeach; ?>
                </nav>
            </div>
        </div>
    </section>
</div>

<?php
get_footer();
