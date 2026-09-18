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

$quick_links = [
    ['name' => __("Men's Apparel", 'dawp'), 'short' => __('Tees, hoodies, crewnecks & tanks.', 'dawp'), 'url' => $shop_url],
    ['name' => __("Women's Apparel", 'dawp'), 'short' => __('Tees, hoodies, long sleeves & tanks.', 'dawp'), 'url' => $shop_url],
    ['name' => __("Kids' Zone", 'dawp'), 'short' => __('Playful, personalized tees for kids.', 'dawp'), 'url' => $shop_url],
    ['name' => __('Personalized Gifts', 'dawp'), 'short' => __('Custom name, photo & pet portrait designs.', 'dawp'), 'url' => $shop_url],
];

$support_links = [
    ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/')],
    ['title' => __('Contact Support', 'dawp'), 'url' => home_url('/contact-us/')],
    ['title' => __('FAQ', 'dawp'), 'url' => home_url('/faq/')],
];
?>

<main id="primary" class="site-main bg-white text-[#111827]">
    <section class="relative isolate overflow-hidden bg-[#F9FAFB] py-14 sm:py-20 lg:py-24" aria-labelledby="error-title">
        <div class="mx-auto grid max-w-7xl items-center gap-10 px-4 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:px-8">
            <div class="max-w-2xl">
                <p class="inline-flex rounded-[var(--radius-md)] border border-[#E5E7EB] bg-white px-4 py-2 text-xs font-extrabold uppercase tracking-[0.14em] text-[#FF5A5F] shadow-[var(--shadow-card)]">
                    <?php esc_html_e('Page Not Found', 'dawp'); ?>
                </p>
                <p class="mt-5 select-none font-heading text-[7rem] font-extrabold leading-none text-[#FFE1DF] sm:text-[9rem] lg:text-[11rem]" aria-hidden="true">
                    404
                </p>
                <h1 id="error-title" class="-mt-4 font-heading text-4xl font-extrabold leading-tight text-[#111827] sm:text-5xl lg:text-6xl">
                    <?php esc_html_e('This page is not available.', 'dawp'); ?>
                </h1>
                <p class="mt-5 max-w-2xl text-base leading-8 text-[#4B5563] sm:text-lg">
                    <?php esc_html_e('The link may have changed, but you can keep browsing Eliteshop Express for personalized T-shirts, hoodies, and gifts for men, women, and kids.', 'dawp'); ?>
                </p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-[var(--radius-pill)] bg-[#FF5A5F] px-6 text-sm font-bold text-white transition hover:bg-[#E14247]">
                        <?php esc_html_e('Shop Products', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-[var(--radius-pill)] border-2 border-[#111827] bg-white px-6 text-sm font-bold text-[#111827] transition hover:bg-[#111827] hover:text-white">
                        <?php esc_html_e('Back To Home', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <div>
                <div class="rounded-[var(--radius-lg)] border border-[#E5E7EB] bg-white p-5 shadow-[var(--shadow-card-hover)] sm:p-6 lg:p-8">
                    <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#FF5A5F]"><?php esc_html_e('Shop By Category', 'dawp'); ?></p>
                    <div class="mt-6 grid gap-3">
                        <?php foreach ($quick_links as $link) : ?>
                            <a href="<?php echo esc_url($link['url']); ?>" class="group flex gap-4 rounded-[var(--radius-md)] border border-[#E5E7EB] bg-[#F9FAFB] p-4 transition hover:-translate-y-0.5 hover:bg-[#FFF1F0]">
                                <span class="mt-1 h-2.5 w-2.5 shrink-0 rounded-full bg-[#FF5A5F]" aria-hidden="true"></span>
                                <span>
                                    <span class="block font-heading text-base font-extrabold text-[#111827] transition group-hover:text-[#FF5A5F]"><?php echo esc_html($link['name']); ?></span>
                                    <span class="mt-1 block text-sm leading-6 text-[#4B5563]"><?php echo esc_html($link['short']); ?></span>
                                    <span class="mt-3 inline-flex text-sm font-bold text-[#FF5A5F]">
                                        <?php esc_html_e('Shop category', 'dawp'); ?>
                                        <span class="ml-2" aria-hidden="true">-&gt;</span>
                                    </span>
                                </span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <nav class="mt-5 grid gap-3 sm:grid-cols-3" aria-label="<?php esc_attr_e('Helpful links', 'dawp'); ?>">
                    <?php foreach ($support_links as $link) : ?>
                        <a href="<?php echo esc_url($link['url']); ?>" class="inline-flex min-h-12 items-center justify-center rounded-[var(--radius-md)] border border-[#E5E7EB] bg-white px-4 text-sm font-bold text-[#111827] transition hover:bg-[#FFF1F0] hover:text-[#FF5A5F]">
                            <?php echo esc_html($link['title']); ?>
                        </a>
                    <?php endforeach; ?>
                </nav>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
