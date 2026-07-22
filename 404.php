<?php
/**
 * 404 Not Found Template.
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

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$quick_links = function_exists('dawp_lbq_product_categories') ? dawp_lbq_product_categories() : [
    'home-garden-tools' => [
        'name'  => __('Home, Garden & Tools', 'dawp'),
        'short' => __('Home upgrades, garden care and practical tools.', 'dawp'),
    ],
    'electronics' => [
        'name'  => __('Electronics', 'dawp'),
        'short' => __('Audio, entertainment and connected tech essentials.', 'dawp'),
    ],
    'sports-outdoors' => [
        'name'  => __('Sports & Outdoors', 'dawp'),
        'short' => __('Fitness, recreation and outdoor activity gear.', 'dawp'),
    ],
    'toys-outdoor-play' => [
        'name'  => __('Toys & Outdoor Play', 'dawp'),
        'short' => __('Toys, games and outdoor play favorites.', 'dawp'),
    ],
    'beauty-personal-care' => [
        'name'  => __('Beauty & Personal Care', 'dawp'),
        'short' => __('Beauty, grooming and daily care essentials.', 'dawp'),
    ],
];

$support_links = [
    [
        'title' => __('Track Order', 'dawp'),
        'url'   => home_url('/track-order/'),
    ],
    [
        'title' => __('Contact Support', 'dawp'),
        'url'   => home_url('/contact-us/'),
    ],
    [
        'title' => __('FAQs', 'dawp'),
        'url'   => home_url('/faq/'),
    ],
];
?>

<main id="primary" class="site-main bg-white text-[#1F2937]">
    <section class="relative isolate overflow-hidden border-b border-[#E5E7EB] bg-[#F5F6F8] py-14 sm:py-20 lg:py-24" aria-labelledby="error-title">
        <div class="absolute inset-x-0 top-0 -z-10 h-40 bg-[#FFFFFF]" aria-hidden="true"></div>

        <div class="mx-auto grid max-w-7xl items-center gap-10 px-4 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:px-8">
            <div class="max-w-2xl">
                <p class="inline-flex rounded-md border border-[#E5E7EB] bg-white px-4 py-2 text-xs font-extrabold uppercase tracking-[0.14em] text-[#0046BE] shadow-sm">
                    <?php esc_html_e('Page Not Found', 'dawp'); ?>
                </p>
                <p class="mt-5 select-none font-heading text-[7rem] font-extrabold leading-none text-[#DBEAFE] sm:text-[9rem] lg:text-[11rem]" aria-hidden="true">
                    404
                </p>
                <h1 id="error-title" class="-mt-4 font-heading text-4xl font-extrabold leading-tight text-[#1F2937] sm:text-5xl lg:text-6xl">
                    <?php esc_html_e('This page is not available.', 'dawp'); ?>
                </h1>
                <p class="mt-5 max-w-2xl text-base leading-8 text-[#6B7280] sm:text-lg">
                    <?php esc_html_e('The link may have changed, but you can continue shopping Topgoodmart for home, garden, tools, electronics, sports, toys, beauty, pets, school, office and art supplies.', 'dawp'); ?>
                </p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#0046BE] px-6 text-sm font-bold text-white shadow-lg shadow-[#0046BE]/15 transition hover:bg-[#1F2937]">
                        <?php esc_html_e('Shop Products', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#0046BE] bg-white px-6 text-sm font-bold text-[#0046BE] transition hover:bg-[#EAF2FF]">
                        <?php esc_html_e('Back To Home', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <div>
                <div class="rounded-md border border-[#E5E7EB] bg-white p-5 shadow-xl shadow-[#0046BE]/15 sm:p-6 lg:p-8">
                    <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#0046BE]"><?php esc_html_e('Shop By Category', 'dawp'); ?></p>
                    <div class="mt-6 grid gap-3">
                        <?php foreach ($quick_links as $slug => $link) : ?>
                            <a href="<?php echo esc_url($category_url($slug)); ?>" class="group flex gap-4 rounded-md border border-[#E5E7EB] bg-[#FFFFFF] p-4 transition hover:-translate-y-0.5 hover:border-[#0046BE] hover:bg-[#EAF2FF]">
                                <span class="mt-1 h-2.5 w-2.5 shrink-0 rounded-full bg-[#0046BE]" aria-hidden="true"></span>
                                <span>
                                    <span class="block font-heading text-base font-extrabold text-[#1F2937] transition group-hover:text-[#0046BE]"><?php echo esc_html($link['name']); ?></span>
                                    <span class="mt-1 block text-sm leading-6 text-[#6B7280]"><?php echo esc_html($link['short'] ?? $link['description'] ?? ''); ?></span>
                                    <span class="mt-3 inline-flex text-sm font-bold text-[#0046BE]">
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
                        <a href="<?php echo esc_url($link['url']); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#E5E7EB] bg-white px-4 text-sm font-bold text-[#0046BE] transition hover:border-[#0046BE] hover:bg-[#EAF2FF] hover:text-[#1F2937]">
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
