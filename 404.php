<?php
/**
 * 404 Not Found Template
 *
 * @package Dawp
 */

get_header();

$category_url = static function ($slug) {
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

$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');

$quick_links = [
    [
        'title' => __('Smart Gadgets', 'dawp'),
        'copy'  => __('Useful small gadgets selected for everyday convenience.', 'dawp'),
        'url'   => $category_url('smart-gadgets'),
    ],
    [
        'title' => __('Home & Kitchen Gadgets', 'dawp'),
        'copy'  => __('Helpful tools for kitchen prep, storage, and home routines.', 'dawp'),
        'url'   => $category_url('home-kitchen-gadgets'),
    ],
    [
        'title' => __('Personal Care Devices', 'dawp'),
        'copy'  => __('Simple grooming tools for everyday personal care.', 'dawp'),
        'url'   => $category_url('personal-care-devices'),
    ],
    [
        'title' => __('Camera & Tech Accessories', 'dawp'),
        'copy'  => __('Practical camera and tech accessories for daily use.', 'dawp'),
        'url'   => $category_url('camera-tech-accessories'),
    ],
    [
        'title' => __('Daily Tools', 'dawp'),
        'copy'  => __('Compact accessories for travel, carry, and everyday tasks.', 'dawp'),
        'url'   => $category_url('daily-tools'),
    ],
];
?>

<main id="primary" class="site-main bg-white text-[#1F2937]">
    <section class="bg-[#EAF4FF] py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl items-center gap-10 px-4 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:px-8">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#2F80ED]"><?php esc_html_e('Page Not Found', 'dawp'); ?></p>
                <p class="mt-4 select-none text-[7rem] font-extrabold leading-none text-[#2F80ED]/15 sm:text-[9rem] lg:text-[11rem]" aria-hidden="true">
                    404
                </p>
                <h1 class="-mt-4 text-4xl font-extrabold leading-tight text-[#102A43] sm:text-5xl lg:text-6xl">
                    <?php esc_html_e('This page does not exist.', 'dawp'); ?>
                </h1>
                <p class="mt-5 max-w-2xl text-base leading-8 text-[#667085] sm:text-lg">
                    <?php esc_html_e('The link may be outdated or incorrect, but you can keep browsing MyBaapStore for practical gadgets, home tools, personal care devices, and everyday tech accessories.', 'dawp'); ?>
                </p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-xl bg-[#2F80ED] px-6 text-sm font-bold text-white transition hover:bg-[#102A43]">
                        <?php esc_html_e('Continue Shopping', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-xl border border-[#2F80ED] bg-white px-6 text-sm font-bold text-[#2F80ED] transition hover:bg-[#EAF4FF]">
                        <?php esc_html_e('Back To Home', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <div class="rounded-2xl border border-white bg-white p-5 shadow-xl shadow-[#102A43]/15 sm:p-6 lg:p-8">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#2F80ED]"><?php esc_html_e('Browse Categories', 'dawp'); ?></p>
                <div class="mt-6 grid gap-3">
                    <?php foreach ($quick_links as $index => $link) : ?>
                        <a href="<?php echo esc_url($link['url']); ?>" class="group flex gap-4 rounded-xl border border-[#E5E7EB] bg-[#F5F7FA] p-4 transition hover:border-[#2F80ED]/30 hover:bg-[#EAF4FF]">
                            <span class="flex h-10 min-w-10 items-center justify-center rounded-xl bg-[#2F80ED] text-xs font-bold text-white">
                                <?php echo esc_html(str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT)); ?>
                            </span>
                            <span>
                                <span class="block font-extrabold text-[#102A43] transition group-hover:text-[#2F80ED]"><?php echo esc_html($link['title']); ?></span>
                                <span class="mt-1 block text-sm leading-6 text-[#667085]"><?php echo esc_html($link['copy']); ?></span>
                            </span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
