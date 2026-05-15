<?php
/**
 * 404 Not Found Template
 *
 * @package Dawp
 */

get_header();

$category_url = static function ($slug) {
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

$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');

$quick_links = [
    [
        'title' => __('Sleepwear', 'dawp'),
        'copy'  => __('Soft pieces for evenings and slow mornings.', 'dawp'),
        'url'   => $category_url('sleepwear'),
    ],
    [
        'title' => __('Lingerie Sets', 'dawp'),
        'copy'  => __('Soft lace and delicate matching pieces.', 'dawp'),
        'url'   => $category_url('lingerie-sets'),
    ],
    [
        'title' => __('Robes & Loungewear', 'dawp'),
        'copy'  => __('At-home elegance made for comfort.', 'dawp'),
        'url'   => $category_url('robes-loungewear'),
    ],
];
?>

<main id="primary" class="site-main bg-white text-[#24132E]">
    <section class="bg-[#FBF4FF] py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl items-center gap-10 px-4 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:px-8">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.18em] text-[#6E3A8A]"><?php esc_html_e('Page Not Found', 'dawp'); ?></p>
                <p class="mt-4 select-none font-heading text-[7rem] font-bold leading-none text-[#E8DFF0] sm:text-[9rem] lg:text-[11rem]" aria-hidden="true">
                    404
                </p>
                <h1 class="-mt-4 font-heading text-4xl font-bold leading-tight text-[#3B1748] sm:text-5xl lg:text-6xl">
                    <?php esc_html_e('This page slipped away.', 'dawp'); ?>
                </h1>
                <p class="mt-5 max-w-2xl text-base leading-8 text-[#6D5875] sm:text-lg">
                    <?php esc_html_e('The link may be outdated, but you can keep browsing Shop Avec Moi for romantic intimates, sleepwear, and soft everyday essentials.', 'dawp'); ?>
                </p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#3B1748] px-7 py-3 text-sm font-semibold text-white transition duration-300 hover:bg-[#6E3A8A]">
                        <?php esc_html_e('Continue Shopping', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#E8DFF0] bg-white px-7 py-3 text-sm font-semibold text-[#3B1748] transition duration-300 hover:bg-[#FBF4FF]">
                        <?php esc_html_e('Back To Home', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <div class="rounded-[2rem] border border-[#E8DFF0] bg-white p-5 shadow-xl shadow-[#3B1748]/10 sm:p-6 lg:p-8">
                <p class="text-sm font-semibold uppercase tracking-[0.18em] text-[#6E3A8A]"><?php esc_html_e('Browse Collections', 'dawp'); ?></p>
                <div class="mt-6 grid gap-3">
                    <?php foreach ($quick_links as $index => $link) : ?>
                        <a href="<?php echo esc_url($link['url']); ?>" class="group flex gap-4 rounded-2xl border border-[#E8DFF0] bg-[#FBF4FF] p-4 transition duration-300 hover:bg-[#E8DFF0]">
                            <span class="flex h-10 min-w-10 items-center justify-center rounded-full bg-[#3B1748] text-xs font-bold text-white">
                                <?php echo esc_html(str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT)); ?>
                            </span>
                            <span>
                                <span class="block font-semibold text-[#3B1748] transition group-hover:text-[#6E3A8A]"><?php echo esc_html($link['title']); ?></span>
                                <span class="mt-1 block text-sm leading-6 text-[#6D5875]"><?php echo esc_html($link['copy']); ?></span>
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
