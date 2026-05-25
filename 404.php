<?php
/**
 * 404 Not Found Template.
 *
 * @package dawp
 */

get_header();

$fallback_categories = [
    [
        'title'  => __('Home Essentials', 'dawp'),
        'slug'   => 'home-essentials',
        'url'    => dawp_get_product_category_url('home-essentials'),
        'accent' => '#2563EB',
        'copy'   => __('Practical products for organized daily living.', 'dawp'),
    ],
    [
        'title'  => __('Beauty & Personal Care', 'dawp'),
        'slug'   => 'beauty-personal-care',
        'url'    => dawp_get_product_category_url('beauty-personal-care'),
        'accent' => '#C026D3',
        'copy'   => __('Simple self-care and beauty items for everyday routines.', 'dawp'),
    ],
    [
        'title'  => __('Fashion Accessories', 'dawp'),
        'slug'   => 'fashion-accessories',
        'url'    => dawp_get_product_category_url('fashion-accessories'),
        'accent' => '#EA580C',
        'copy'   => __('Easy accessories that add style to daily looks.', 'dawp'),
    ],
    [
        'title'  => __('Lifestyle Accessories', 'dawp'),
        'slug'   => 'lifestyle-accessories',
        'url'    => dawp_get_product_category_url('lifestyle-accessories'),
        'accent' => '#06B6D4',
        'copy'   => __('Useful finds for travel, organization, and daily convenience.', 'dawp'),
    ],
    [
        'title'  => __('Giftable Finds', 'dawp'),
        'slug'   => 'giftable-finds',
        'url'    => dawp_get_product_category_url('giftable-finds'),
        'accent' => '#65A30D',
        'copy'   => __('Thoughtful everyday products made for simple gifting.', 'dawp'),
    ],
];

$browse_categories = $fallback_categories;

if (taxonomy_exists('product_cat')) {
    $uncategorized = get_term_by('slug', 'uncategorized', 'product_cat');

    $terms = get_terms([
        'taxonomy'   => 'product_cat',
        'hide_empty' => true,
        'parent'     => 0,
        'orderby'    => 'name',
        'exclude'    => array_filter([
            $uncategorized ? $uncategorized->term_id : 0,
        ]),
    ]);

    if (!empty($terms) && !is_wp_error($terms)) {
        $accent_by_slug = wp_list_pluck($fallback_categories, 'accent', 'slug');
        $copy_by_slug   = wp_list_pluck($fallback_categories, 'copy', 'slug');

        $browse_categories = array_map(
            static function ($term) use ($accent_by_slug, $copy_by_slug) {
                $term_link = get_term_link($term);

                return [
                    'title'  => $term->name,
                    'slug'   => $term->slug,
                    'url'    => is_wp_error($term_link) ? home_url('/shop/') : $term_link,
                    'accent' => $accent_by_slug[$term->slug] ?? '#2563EB',
                    'copy'   => $copy_by_slug[$term->slug] ?? sprintf(
                        /* translators: %s: product category name */
                        __('Browse practical everyday products in %s.', 'dawp'),
                        $term->name
                    ),
                ];
            },
            $terms
        );
    }
}
?>

<main id="primary" class="site-main bg-white font-body text-[#101828]">
    <section class="relative overflow-hidden bg-[#F3F7FB]">
        <div class="absolute inset-x-0 top-0 h-24 bg-white"></div>

        <div class="relative mx-auto grid max-w-7xl grid-cols-1 gap-8 px-4 py-16 sm:px-6 lg:grid-cols-[1.05fr_0.95fr] lg:items-stretch lg:px-8 lg:py-24">
            <div class="relative isolate flex min-h-[520px] flex-col justify-between overflow-hidden rounded-[2rem] bg-[#101828] p-6 text-white shadow-2xl shadow-[#101828]/15 sm:p-10 lg:p-12">
                <div class="pointer-events-none absolute inset-x-6 bottom-28 -z-10 h-48 rounded-[1.75rem] bg-white/[0.04] sm:inset-x-10 sm:h-56 lg:inset-x-12"></div>
                <img
                    src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/elite/home-category-overview-v2.png'); ?>"
                    alt=""
                    class="pointer-events-none absolute bottom-24 right-0 -z-10 w-80 max-w-[58%] translate-x-6 opacity-90 drop-shadow-[0_24px_40px_rgba(0,0,0,0.28)] sm:bottom-28 sm:right-8 sm:w-[24rem] lg:bottom-24 lg:right-10 lg:w-[27rem]"
                    loading="lazy"
                    decoding="async"
                    aria-hidden="true"
                >

                <div class="relative z-10">
                    <p class="mb-5 inline-flex rounded-full bg-white/10 px-4 py-2 text-xs font-black uppercase tracking-[0.18em] text-[#67E8F9]">
                        <?php esc_html_e('Page Not Found', 'dawp'); ?>
                    </p>

                    <p class="select-none text-7xl font-black leading-none text-white/10 sm:text-6xl lg:text-7xl">
                        <?php esc_html_e('404', 'dawp'); ?>
                    </p>

                    <h1 class="mt-5 max-w-4xl font-heading text-4xl font-black uppercase leading-[0.98] text-white sm:text-5xl lg:text-[3.45rem]">
                        <?php esc_html_e('This page is not available.', 'dawp'); ?>
                    </h1>

                    <p class="mt-6 max-w-2xl text-lg leading-8 text-white/78">
                        <?php esc_html_e('The link may have moved or no longer exists. Continue shopping everyday essentials, lifestyle accessories, and practical giftable finds.', 'dawp'); ?>
                    </p>
                </div>

                <div class="relative z-10">
                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#2563EB] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#06B6D4]">
                            <?php esc_html_e('Shop All Products', 'dawp'); ?>
                        </a>

                        <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-white/20 px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-[#101828]">
                            <?php esc_html_e('Back To Home', 'dawp'); ?>
                        </a>
                    </div>

                    <p class="mt-8 max-w-xl border-t border-white/15 pt-5 text-sm font-bold leading-6 text-white/70">
                        <?php esc_html_e('Useful finds. Clear support. Simple everyday shopping.', 'dawp'); ?>
                    </p>
                </div>
            </div>

            <div class="overflow-hidden rounded-[2rem] border border-[#E5E7EB] bg-white shadow-xl shadow-[#101828]/10">
                <div class="border-b border-[#E5E7EB] bg-[#F8FAFC] p-6 sm:p-8">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#2563EB]">
                        <?php esc_html_e('Browse Categories', 'dawp'); ?>
                    </p>
                    <h2 class="font-heading text-3xl font-black uppercase leading-tight text-[#101828]">
                        <?php esc_html_e('Find what you were looking for.', 'dawp'); ?>
                    </h2>
                    <p class="mt-4 text-base leading-7 text-[#475467]">
                        <?php esc_html_e('Jump into the main product categories used across Elite Shop Express.', 'dawp'); ?>
                    </p>
                </div>

                <div class="divide-y divide-[#E5E7EB]">
                    <?php foreach ($browse_categories as $category) : ?>
                        <a href="<?php echo esc_url($category['url']); ?>" class="group grid grid-cols-[1fr_auto] items-center gap-4 p-5 transition hover:bg-[#F8FAFC] sm:p-6">
                            <span class="min-w-0">
                                <span class="mb-3 block h-1.5 w-12 rounded-full" style="background-color: <?php echo esc_attr($category['accent']); ?>"></span>
                                <span class="block font-heading text-lg font-black uppercase leading-tight text-[#101828] transition group-hover:text-[#2563EB]">
                                    <?php echo esc_html($category['title']); ?>
                                </span>
                                <span class="mt-2 line-clamp-2 block text-sm leading-6 text-[#475467]">
                                    <?php echo esc_html($category['copy']); ?>
                                </span>
                            </span>

                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#F2F4F7] text-lg font-black text-[#101828] transition group-hover:bg-[#101828] group-hover:text-white" aria-hidden="true">+</span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-12 lg:py-16">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-5 px-4 sm:px-6 lg:grid-cols-4 lg:px-8">
            <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="border border-[#E5E7EB] bg-[#F8FAFC] p-6 transition hover:border-[#2563EB] hover:bg-white">
                <span class="text-xs font-black uppercase tracking-[0.18em] text-[#06B6D4]"><?php esc_html_e('Need Help?', 'dawp'); ?></span>
                <span class="mt-3 block font-heading text-xl font-black uppercase leading-tight text-[#101828]"><?php esc_html_e('Contact Support', 'dawp'); ?></span>
            </a>
            <a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="border border-[#E5E7EB] bg-[#F8FAFC] p-6 transition hover:border-[#2563EB] hover:bg-white">
                <span class="text-xs font-black uppercase tracking-[0.18em] text-[#2563EB]"><?php esc_html_e('Order Status', 'dawp'); ?></span>
                <span class="mt-3 block font-heading text-xl font-black uppercase leading-tight text-[#101828]"><?php esc_html_e('Track Order', 'dawp'); ?></span>
            </a>
            <a href="<?php echo esc_url(home_url('/shipping-returns/')); ?>" class="border border-[#E5E7EB] bg-[#F8FAFC] p-6 transition hover:border-[#2563EB] hover:bg-white">
                <span class="text-xs font-black uppercase tracking-[0.18em] text-[#65A30D]"><?php esc_html_e('Customer Care', 'dawp'); ?></span>
                <span class="mt-3 block font-heading text-xl font-black uppercase leading-tight text-[#101828]"><?php esc_html_e('Shipping & Returns', 'dawp'); ?></span>
            </a>
            <a href="<?php echo esc_url(home_url('/faq/')); ?>" class="border border-[#E5E7EB] bg-[#F8FAFC] p-6 transition hover:border-[#2563EB] hover:bg-white">
                <span class="text-xs font-black uppercase tracking-[0.18em] text-[#C026D3]"><?php esc_html_e('Questions', 'dawp'); ?></span>
                <span class="mt-3 block font-heading text-xl font-black uppercase leading-tight text-[#101828]"><?php esc_html_e('Read FAQ', 'dawp'); ?></span>
            </a>
        </div>
    </section>
</main>

<?php
get_footer();
