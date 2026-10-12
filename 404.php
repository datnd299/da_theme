<?php
/**
 * 404 page — SlickTee.
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
    ['name' => __('Vintage Shirts', 'dawp'), 'url' => $cat_url('vintage-shirts')],
    ['name' => __('Vintage Hoodie', 'dawp'), 'url' => $cat_url('vintage-hoodie')],
    ['name' => __('Vintage Shorts', 'dawp'), 'url' => $cat_url('vintage-shorts')],
    ['name' => __('Anime', 'dawp'), 'url' => $cat_url('anime')],
    ['name' => __('Game Art', 'dawp'), 'url' => $cat_url('game-art')],
    ['name' => __('Horror', 'dawp'), 'url' => $cat_url('horror')],
    ['name' => __('New Arrivals', 'dawp'), 'url' => $cat_url('new-arrivals')],
    ['name' => __('Best Sellers', 'dawp'), 'url' => $cat_url('best-seller')],
];
?>

<main id="primary" class="site-main bg-[#FBF7EF] text-[#17140F]">
    <section class="py-16 sm:py-24" aria-labelledby="error-title">
        <div class="mx-auto grid max-w-7xl gap-12 px-4 sm:px-6 lg:grid-cols-[1.1fr_0.9fr] lg:items-center lg:px-8">
            <div>
                <p class="font-display text-[7rem] leading-none text-[#D7351E] sm:text-[10rem]" aria-hidden="true">404</p>
                <h1 id="error-title" class="font-display mt-2 text-4xl uppercase leading-none sm:text-6xl"><?php esc_html_e('This page got lost in another dimension.', 'dawp'); ?></h1>
                <p class="mt-5 max-w-xl text-lg leading-relaxed text-[#4A4339]"><?php esc_html_e('The link may be old or the design may have moved. Search for your character or jump back into the collection.', 'dawp'); ?></p>

                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="mt-7 flex max-w-lg overflow-hidden rounded-[8px] border-2 border-[#17140F] bg-[#FFFFFF] shadow-[4px_4px_0_#17140F]">
                    <label class="sr-only" for="error-product-search"><?php esc_html_e('Search products', 'dawp'); ?></label>
                    <input id="error-product-search" type="search" name="s" placeholder="<?php esc_attr_e('Search a character, show or game…', 'dawp'); ?>" class="min-h-12 w-full bg-transparent px-4 text-base outline-none placeholder:text-[#6F665A]">
                    <input type="hidden" name="post_type" value="product">
                    <button type="submit" class="shrink-0 border-l-2 border-[#17140F] bg-[#F2B33D] px-5 text-sm font-extrabold uppercase tracking-wide transition hover:bg-[#17140F] hover:text-[#FBF7EF]"><?php esc_html_e('Search', 'dawp'); ?></button>
                </form>

                <div class="mt-7 flex flex-wrap gap-3">
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center rounded-[8px] border-2 border-[#17140F] bg-[#D7351E] px-6 text-sm font-extrabold uppercase tracking-wide text-[#FFFFFF] transition hover:bg-[#B32813]"><?php esc_html_e('Shop all', 'dawp'); ?></a>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex min-h-12 items-center rounded-[8px] border-2 border-[#17140F] px-6 text-sm font-extrabold uppercase tracking-wide transition hover:bg-[#17140F] hover:text-[#FBF7EF]"><?php esc_html_e('Back to home', 'dawp'); ?></a>
                </div>
            </div>

            <div class="rounded-[14px] border-2 border-[#17140F] bg-[#FFFFFF] p-6 shadow-[6px_6px_0_#17140F] sm:p-8">
                <h2 class="font-display text-2xl uppercase"><?php esc_html_e('Popular places', 'dawp'); ?></h2>
                <ul class="mt-5 grid grid-cols-2 gap-3">
                    <?php foreach ($popular as $link) : ?>
                        <li><a href="<?php echo esc_url($link['url']); ?>" class="flex min-h-12 items-center justify-between rounded-[8px] border-2 border-[#17140F] px-3 text-sm font-extrabold transition hover:bg-[#F2B33D]"><?php echo esc_html($link['name']); ?><span aria-hidden="true">→</span></a></li>
                    <?php endforeach; ?>
                </ul>
                <p class="mt-6 text-sm leading-6 text-[#4A4339]">
                    <?php esc_html_e('Looking for an order?', 'dawp'); ?>
                    <a class="font-bold underline decoration-[#D7351E] decoration-2 underline-offset-4" href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track it here', 'dawp'); ?></a>
                    · <a class="font-bold underline decoration-[#D7351E] decoration-2 underline-offset-4" href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact us', 'dawp'); ?></a>
                </p>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
