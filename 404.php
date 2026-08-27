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
        'title' => __('Track an order', 'dawp'),
        'url'   => home_url('/track-order/'),
    ],
    [
        'title' => __('Contact support', 'dawp'),
        'url'   => home_url('/contact-us/'),
    ],
    [
        'title' => __('FAQs', 'dawp'),
        'url'   => home_url('/faq/'),
    ],
];
?>

<main id="primary" class="site-main bg-white text-[#2B2B2B]">
    <section class="border-b border-[#E5E7EB] bg-[#F7F8FA] px-4 py-16 sm:px-6 sm:py-20 lg:px-8 lg:py-24" aria-labelledby="error-title">
        <div class="mx-auto max-w-3xl text-center">
            <p class="text-sm font-extrabold uppercase tracking-[0.12em] text-[#0046BE]">
                <?php esc_html_e('404 error', 'dawp'); ?>
            </p>
            <p class="mt-5 select-none font-heading text-5xl font-extrabold leading-none text-[#D4DAE3] sm:text-5xl" aria-hidden="true">
                404
            </p>
            <h1 id="error-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#050505] sm:text-4xl lg:text-5xl">
                <?php esc_html_e('We could not find that page.', 'dawp'); ?>
            </h1>
            <p class="mx-auto mt-5 max-w-2xl text-base leading-8 text-[#4B5563] sm:text-lg">
                <?php esc_html_e('The page may have moved or the link may be outdated. Start from the homepage, browse the shop, or reach out if you need help with an order.', 'dawp'); ?>
            </p>

            <div class="mt-8 flex flex-col justify-center gap-3 sm:flex-row">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#0046BE] px-6 text-sm font-extrabold uppercase tracking-[0.04em] text-white transition hover:bg-[#003AA6]">
                    <?php esc_html_e('Go home', 'dawp'); ?>
                </a>
                <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#111827] bg-white px-6 text-sm font-extrabold uppercase tracking-[0.04em] text-[#111827] transition hover:bg-[#111827] hover:text-white">
                    <?php esc_html_e('Shop all products', 'dawp'); ?>
                </a>
            </div>

            <nav class="mx-auto mt-10 grid max-w-2xl gap-3 border-t border-[#DDE3EA] pt-6 sm:grid-cols-3" aria-label="<?php esc_attr_e('Helpful links', 'dawp'); ?>">
                <?php foreach ($support_links as $link) : ?>
                    <a href="<?php echo esc_url($link['url']); ?>" class="inline-flex min-h-11 items-center justify-center rounded-md bg-white px-4 text-sm font-bold text-[#374151] ring-1 ring-[#DDE3EA] transition hover:text-[#0046BE] hover:ring-[#0046BE]">
                        <?php echo esc_html($link['title']); ?>
                    </a>
                <?php endforeach; ?>
            </nav>
        </div>
    </section>
</main>

<?php
get_footer();
