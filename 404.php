<?php
/**
 * 404 page — ProudlyWear.
 *
 * @package dawp
 */

get_header();

$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$cat_url = static function ($slug) use ($shop_url) {
    return function_exists('dawp_product_category_url') ? dawp_product_category_url($slug) : $shop_url;
};

$popular = [
    ['name' => __('T-Shirts', 'dawp'), 'url' => $cat_url('t-shirts')],
    ['name' => __('Hoodies & Zip-Ups', 'dawp'), 'url' => $cat_url('hoodies')],
    ['name' => __('Hats & Caps', 'dawp'), 'url' => $cat_url('caps')],
    ['name' => __('Army Veterans', 'dawp'), 'url' => $cat_url('army')],
    ['name' => __('Navy Veterans', 'dawp'), 'url' => $cat_url('navy')],
    ['name' => __('Flags', 'dawp'), 'url' => $cat_url('flags')],
    ['name' => __('New Arrivals', 'dawp'), 'url' => $cat_url('new-arrivals')],
    ['name' => __('Best Sellers', 'dawp'), 'url' => $cat_url('best-seller')],
];
?>

<main id="primary" class="site-main bg-background text-foreground">
    <section class="py-16 sm:py-24" aria-labelledby="error-title">
        <div class="mx-auto grid max-w-7xl gap-12 px-4 sm:px-6 lg:grid-cols-[1.1fr_0.9fr] lg:items-center lg:px-8">
            <div>
                <p class="font-stencil text-[7rem] leading-none text-accent sm:text-[10rem]" aria-hidden="true">404</p>
                <h1 id="error-title" class="font-display mt-2 text-4xl uppercase leading-none sm:text-6xl"><?php esc_html_e('This page went AWOL.', 'dawp'); ?></h1>
                <p class="mt-5 max-w-xl text-lg leading-relaxed text-foreground-muted"><?php esc_html_e('The link may be old or the product may have moved. Search by branch, design or product, or head back to the collection.', 'dawp'); ?></p>

                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="mt-7 flex max-w-lg overflow-hidden rounded-md border border-border-strong bg-[#FFFFFF] shadow-card">
                    <label class="sr-only" for="error-product-search"><?php esc_html_e('Search products', 'dawp'); ?></label>
                    <input id="error-product-search" type="search" name="s" placeholder="<?php esc_attr_e('Search e.g. veteran cap, Navy dad…', 'dawp'); ?>" class="min-h-12 w-full bg-transparent px-4 text-base outline-none placeholder:text-muted">
                    <input type="hidden" name="post_type" value="product">
                    <button type="submit" class="shrink-0 bg-foreground px-5 font-heading text-base font-bold uppercase tracking-wider text-background transition hover:bg-accent"><?php esc_html_e('Search', 'dawp'); ?></button>
                </form>

                <div class="mt-7 flex flex-wrap gap-3">
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center rounded-md bg-accent px-6 font-heading text-base font-bold uppercase tracking-wider text-background shadow-ink transition hover:translate-y-[2px] hover:bg-accent-hover hover:shadow-none"><?php esc_html_e('Shop all', 'dawp'); ?></a>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex min-h-12 items-center rounded-md border-2 border-foreground px-6 font-heading text-base font-bold uppercase tracking-wider transition hover:bg-foreground hover:text-background"><?php esc_html_e('Back to home', 'dawp'); ?></a>
                </div>
            </div>

            <div class="rounded-lg border border-border border-t-4 border-t-accent bg-[#FFFFFF] p-6 shadow-card-hover sm:p-8">
                <h2 class="font-display text-2xl uppercase"><?php esc_html_e('Popular places', 'dawp'); ?></h2>
                <ul class="mt-5 grid grid-cols-2 gap-3">
                    <?php foreach ($popular as $link) : ?>
                        <li><a href="<?php echo esc_url($link['url']); ?>" class="flex min-h-12 items-center justify-between rounded-md border border-border-strong px-3 text-sm font-bold transition hover:bg-surface"><?php echo esc_html($link['name']); ?><span aria-hidden="true">→</span></a></li>
                    <?php endforeach; ?>
                </ul>
                <p class="mt-6 text-sm leading-6 text-foreground-muted">
                    <?php esc_html_e('Looking for an order?', 'dawp'); ?>
                    <a class="font-bold underline decoration-accent decoration-2 underline-offset-4" href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track it here', 'dawp'); ?></a>
                    · <a class="font-bold underline decoration-accent decoration-2 underline-offset-4" href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact us', 'dawp'); ?></a>
                </p>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
