<?php
/**
 * 404 Not Found Template.
 *
 * @package Dawp
 */

get_header();

$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$support_links = [
    [
        'title' => __('Track order', 'dawp'),
        'url'   => home_url('/track-order/'),
    ],
    [
        'title' => __('Contact', 'dawp'),
        'url'   => home_url('/contact-us/'),
    ],
    [
        'title' => __('FAQs', 'dawp'),
        'url'   => home_url('/faq/'),
    ],
];
?>

<main id="primary" class="site-main bg-[#F7F4EF] text-[#171717]">
    <section class="grid min-h-[72vh] place-items-center border-b border-[#E4DED4] px-4 py-16 sm:px-6 lg:px-8" aria-labelledby="error-title">
        <div class="w-full max-w-3xl text-center">
            <p class="text-xs font-semibold uppercase tracking-[0.28em] text-[#9B7A43]">
                <?php esc_html_e('404', 'dawp'); ?>
            </p>
            <h1 id="error-title" class="mt-5 font-heading text-4xl font-semibold leading-tight text-[#171717] sm:text-6xl lg:text-7xl">
                <?php esc_html_e('Page not found.', 'dawp'); ?>
            </h1>
            <p class="mx-auto mt-5 max-w-xl text-base leading-8 text-[#625D55] sm:text-lg">
                <?php esc_html_e('The page may have moved. Return to the collection or search for the piece you had in mind.', 'dawp'); ?>
            </p>

<<<<<<< HEAD
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="mx-auto mt-9 flex max-w-xl flex-col gap-3 border border-[#D8D0C3] bg-white p-2 shadow-[0_18px_50px_rgba(23,23,23,0.08)] sm:flex-row">
                <label class="sr-only" for="error-search"><?php esc_html_e('Search products', 'dawp'); ?></label>
                <input id="error-search" type="search" name="s" placeholder="<?php esc_attr_e('Search the store', 'dawp'); ?>" class="min-h-12 flex-1 border-0 bg-transparent px-4 text-sm text-[#171717] outline-none placeholder:text-[#9A948B]">
                <input type="hidden" name="post_type" value="product">
                <button type="submit" class="min-h-12 bg-[#171717] px-7 text-sm font-semibold text-white transition hover:bg-[#9B7A43]">
                    <?php esc_html_e('Search', 'dawp'); ?>
                </button>
            </form>

            <div class="mt-7 flex flex-col items-center justify-center gap-3 sm:flex-row">
                <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 w-full items-center justify-center border border-[#171717] bg-[#171717] px-7 text-sm font-semibold text-white transition hover:border-[#9B7A43] hover:bg-[#9B7A43] sm:w-auto">
                    <?php esc_html_e('Shop collection', 'dawp'); ?>
                </a>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex min-h-12 w-full items-center justify-center border border-[#CFC6B8] bg-transparent px-7 text-sm font-semibold text-[#171717] transition hover:border-[#9B7A43] hover:text-[#9B7A43] sm:w-auto">
                    <?php esc_html_e('Back home', 'dawp'); ?>
                </a>
=======
        <div class="mx-auto grid max-w-7xl items-center gap-10 px-4 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:px-8">
            <div class="max-w-2xl">
                <p class="inline-flex rounded-md border border-[#E8E5DF] bg-white px-4 py-2 text-xs font-extrabold uppercase tracking-[0.14em] text-[#A45A3F] shadow-sm">
                    <?php esc_html_e('Page Not Found', 'dawp'); ?>
                </p>
                <p class="mt-5 select-none font-heading text-[7rem] font-extrabold leading-none text-[#D8C7BE] sm:text-[9rem] lg:text-[11rem]" aria-hidden="true">
                    404
                </p>
                <h1 id="error-title" class="-mt-4 font-heading text-4xl font-extrabold leading-tight text-[#2B2B2B] sm:text-5xl lg:text-6xl">
                    <?php esc_html_e('This page is not available.', 'dawp'); ?>
                </h1>
                <p class="mt-5 max-w-2xl text-base leading-8 text-[#554E49] sm:text-lg">
                    <?php esc_html_e('The link may have changed, but you can continue shopping luxurytheme for home essentials, furniture, electronics, smart home products, kitchen favorites, and outdoor living products.', 'dawp'); ?>
                </p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#2B2B2B] px-6 text-sm font-bold text-white shadow-lg transition hover:bg-[#A45A3F]">
                        <?php esc_html_e('Shop Products', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#2B2B2B] bg-white px-6 text-sm font-bold text-[#2B2B2B] transition hover:border-[#A45A3F] hover:bg-[#F8F5F0] hover:text-[#A45A3F]">
                        <?php esc_html_e('Back To Home', 'dawp'); ?>
                    </a>
                </div>
>>>>>>> dcfaa17ffbda8ec1285a68abf9ec66d4f3f93fe1
            </div>

            <nav class="mt-10 flex flex-wrap items-center justify-center gap-x-6 gap-y-3 text-sm font-medium text-[#625D55]" aria-label="<?php esc_attr_e('Helpful links', 'dawp'); ?>">
                <?php foreach ($support_links as $link) : ?>
                    <a href="<?php echo esc_url($link['url']); ?>" class="underline decoration-[#CFC6B8] underline-offset-4 transition hover:text-[#9B7A43] hover:decoration-[#9B7A43]">
                        <?php echo esc_html($link['title']); ?>
                    </a>
                <?php endforeach; ?>
            </nav>
        </div>
    </section>
</main>

<?php
get_footer();
