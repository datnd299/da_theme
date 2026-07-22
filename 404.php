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

$quick_links = function_exists('dawp_graphicshirt_product_categories') ? dawp_graphicshirt_product_categories() : [
    't-shirt'=>['name'=>__('T-shirt','dawp'),'short'=>__('Original patriotic tees for every occasion.','dawp')],
    'hoodie'=>['name'=>__('Hoodie','dawp'),'short'=>__('Warm patriotic hoodies made to stand out.','dawp')],
    'caps'=>['name'=>__('Caps','dawp'),'short'=>__('Patriotic caps for everyday American style.','dawp')],
    'metal-sign'=>['name'=>__('Metal Sign','dawp'),'short'=>__('Americana wall decor with lasting character.','dawp')],
    'america-250'=>['name'=>__('America 250','dawp'),'short'=>__('Celebrate America’s 250th anniversary.','dawp')],
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
        'title' => __('FAQ', 'dawp'),
        'url'   => home_url('/faq/'),
    ],
];
?>

<main id="primary" class="site-main bg-white text-[#102A43]">
    <section class="relative isolate overflow-hidden border-b border-[#D6DEE8] bg-[#F7F3EA] py-14 sm:py-20 lg:py-24" aria-labelledby="error-title">
        <div class="absolute inset-x-0 top-0 -z-10 h-40 bg-[#FBFCFE]" aria-hidden="true"></div>

        <div class="mx-auto grid max-w-7xl items-center gap-10 px-4 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:px-8">
            <div class="max-w-2xl">
                <p class="inline-flex rounded-md border border-[#D6DEE8] bg-white px-4 py-2 text-xs font-extrabold uppercase tracking-[0.14em] text-[#B83232] shadow-sm">
                    <?php esc_html_e('Page Not Found', 'dawp'); ?>
                </p>
                <p class="mt-5 select-none font-heading text-[7rem] font-extrabold leading-none text-[#F7F3EA] sm:text-[9rem] lg:text-[11rem]" aria-hidden="true">
                    404
                </p>
                <h1 id="error-title" class="-mt-4 font-heading text-4xl font-extrabold leading-tight text-[#102A43] sm:text-5xl lg:text-6xl">
                    <?php esc_html_e('This page is not available.', 'dawp'); ?>
                </h1>
                <p class="mt-5 max-w-2xl text-base leading-8 text-[#52657A] sm:text-lg">
                    <?php esc_html_e('The link may have changed, but you can continue shopping GraphicShirt for patriotic apparel, American-inspired decor, and America 250 designs.', 'dawp'); ?>
                </p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#C83E3E] px-6 text-sm font-bold text-white shadow-lg shadow-[#9B2C2C]/15 transition hover:bg-[#102A43]">
                        <?php esc_html_e('Shop Products', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#C83E3E] bg-white px-6 text-sm font-bold text-[#9B2C2C] transition hover:bg-[#E8EEF5]">
                        <?php esc_html_e('Back To Home', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <div>
                <div class="rounded-md border border-[#D6DEE8] bg-white p-5 shadow-xl shadow-[#9B2C2C]/15 sm:p-6 lg:p-8">
                    <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#B83232]"><?php esc_html_e('Shop By Category', 'dawp'); ?></p>
                    <div class="mt-6 grid gap-3">
                        <?php foreach ($quick_links as $slug => $link) : ?>
                            <a href="<?php echo esc_url($category_url($slug)); ?>" class="group flex gap-4 rounded-md border border-[#D6DEE8] bg-[#FBFCFE] p-4 transition hover:-translate-y-0.5 hover:border-[#C83E3E] hover:bg-[#E8EEF5]">
                                <span class="mt-1 h-2.5 w-2.5 shrink-0 rounded-full bg-[#C83E3E]" aria-hidden="true"></span>
                                <span>
                                    <span class="block font-heading text-base font-extrabold text-[#102A43] transition group-hover:text-[#9B2C2C]"><?php echo esc_html($link['name']); ?></span>
                                    <span class="mt-1 block text-sm leading-6 text-[#52657A]"><?php echo esc_html($link['short'] ?? $link['description'] ?? ''); ?></span>
                                    <span class="mt-3 inline-flex text-sm font-bold text-[#B83232]">
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
                        <a href="<?php echo esc_url($link['url']); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#D6DEE8] bg-white px-4 text-sm font-bold text-[#9B2C2C] transition hover:border-[#C83E3E] hover:bg-[#E8EEF5] hover:text-[#102A43]">
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
