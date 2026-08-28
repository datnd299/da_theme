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
        'title' => __('Track Order', 'dawp'),
        'copy'  => __('Check shipment progress for an existing order.', 'dawp'),
        'url'   => home_url('/track-order/'),
    ],
    [
        'title' => __('Contact Support', 'dawp'),
        'copy'  => __('Get help with an order, return, refund or product question.', 'dawp'),
        'url'   => home_url('/contact-us/'),
    ],
    [
        'title' => __('FAQs', 'dawp'),
        'copy'  => __('Find quick answers about shopping with Reluxwatches.', 'dawp'),
        'url'   => home_url('/faq/'),
    ],
];
?>

<main id="primary" class="site-main bg-white text-[#111111]">
    <section class="relative overflow-hidden border-b border-[#E9E9E9] bg-[#FAFAFA] py-14 sm:py-20 lg:py-24" aria-labelledby="error-title">
        <div class="mx-auto grid max-w-7xl items-center gap-10 px-4 sm:px-6 lg:grid-cols-[0.95fr_1.05fr] lg:px-8">
            <div class="max-w-2xl">
                <p class="text-xs font-extrabold uppercase tracking-[0.08em] text-[#405447]">
                    <?php esc_html_e('Page Not Found', 'dawp'); ?>
                </p>
                <p class="mt-5 select-none font-heading text-[6.5rem] font-extrabold leading-none text-[#D8DED9] sm:text-[8rem] lg:text-[10rem]" aria-hidden="true">
                    404
                </p>
                <h1 id="error-title" class="-mt-3 max-w-xl font-heading text-4xl font-extrabold leading-tight tracking-[0] text-[#111111] sm:text-5xl lg:text-6xl">
                    <?php esc_html_e('This page is not available.', 'dawp'); ?>
                </h1>
                <p class="mt-5 max-w-2xl text-base leading-8 text-[#777777] sm:text-lg">
                    <?php esc_html_e('The link may have changed or the page may no longer exist. Search the store, return home, or contact support if you need help finding something.', 'dawp'); ?>
                </p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#405447] px-6 text-sm font-extrabold text-white shadow-lg shadow-[#4054471f] transition hover:-translate-y-0.5 hover:bg-[#2F3F35]">
                        <?php esc_html_e('Shop Products', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#111111] bg-white px-6 text-sm font-extrabold text-[#111111] transition hover:-translate-y-0.5 hover:border-[#405447] hover:text-[#405447]">
                        <?php esc_html_e('Back To Home', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <div class="rounded-md border border-[#E9E9E9] bg-white p-5 shadow-xl shadow-[#11182714] sm:p-6 lg:p-8">
                <div class="border-b border-[#E9E9E9] pb-6">
                    <p class="text-sm font-extrabold uppercase tracking-[0.08em] text-[#405447]"><?php esc_html_e('Search Reluxwatches', 'dawp'); ?></p>
                    <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="mt-4 grid gap-3 sm:grid-cols-[1fr_auto]">
                        <label class="screen-reader-text" for="error-product-search"><?php esc_html_e('Search products', 'dawp'); ?></label>
                        <input id="error-product-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search products', 'dawp'); ?>" class="min-h-12 rounded-md border border-[#E9E9E9] bg-[#FAFAFA] px-4 text-sm text-[#111111] outline-none transition placeholder:text-[#777777] focus:border-[#405447] focus:bg-white">
                        <input type="hidden" name="post_type" value="product">
                        <button type="submit" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#111111] px-5 text-sm font-extrabold text-white transition hover:-translate-y-0.5 hover:bg-[#405447]">
                            <?php esc_html_e('Search', 'dawp'); ?>
                        </button>
                    </form>
                </div>

                <nav class="mt-6 grid gap-3" aria-label="<?php esc_attr_e('Helpful links', 'dawp'); ?>">
                    <?php foreach ($support_links as $link) : ?>
                        <a href="<?php echo esc_url($link['url']); ?>" class="group rounded-md border border-[#E9E9E9] bg-white p-4 text-[#111111] no-underline transition hover:-translate-y-0.5 hover:border-[#405447] hover:bg-[#FAFAFA] hover:shadow-lg hover:shadow-[#4054471f]">
                            <span class="block font-heading text-base font-extrabold transition group-hover:text-[#405447]"><?php echo esc_html($link['title']); ?></span>
                            <span class="mt-1 block text-sm leading-6 text-[#777777]"><?php echo esc_html($link['copy']); ?></span>
                        </a>
                    <?php endforeach; ?>
                </nav>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
