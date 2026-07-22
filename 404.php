<?php
/**
 * 404 Not Found Template
 *
 * @package Dawp
 */

get_header();
?>

<main id="primary" class="site-main min-h-[82vh] bg-[#161A1E] px-4 py-20 text-white md:py-28">
    <div class="mx-auto grid w-[min(100%,980px)] gap-10 md:grid-cols-[0.75fr_1fr] md:items-center">
        <div>
            <p class="font-heading text-[120px] font-black leading-none text-[#D71920] md:text-[180px]">404</p>
        </div>
        <div>
            <span class="mb-4 block text-xs font-black uppercase tracking-[0.18em] text-[#D71920]"><?php esc_html_e('Page Not Found', 'dawp'); ?></span>
            <h1 class="font-heading text-5xl font-black uppercase leading-none md:text-6xl">
                <?php esc_html_e('This route is off the map.', 'dawp'); ?>
            </h1>
            <p class="mt-5 text-lg leading-8 text-white/72">
                <?php esc_html_e('The page may have moved or the link may be incorrect. Start with the shop, categories, or support pages below.', 'dawp'); ?>
            </p>

            <div class="mt-8 flex flex-wrap gap-3">
                <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-lg bg-[#D71920] px-7 text-sm font-black uppercase text-white hover:bg-[#A70F14]">
                    <?php esc_html_e('Browse Shop', 'dawp'); ?>
                </a>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-lg border border-white/30 px-7 text-sm font-black uppercase text-white hover:bg-white hover:text-[#161A1E]">
                    <?php esc_html_e('Back Home', 'dawp'); ?>
                </a>
            </div>

            <div class="mt-10 border-t border-white/15 pt-8">
                <p class="mb-4 text-xs font-black uppercase tracking-widest text-white/50"><?php esc_html_e('You might be looking for', 'dawp'); ?></p>
                <div class="flex flex-wrap gap-x-6 gap-y-2 text-sm text-white/72">
                    <?php
                    $quick_links = [
                        ['title' => __('Shop All', 'dawp'), 'url' => home_url('/shop/')],
                        ['title' => __('Tools', 'dawp'), 'url' => home_url('/product-category/tools/')],
                        ['title' => __('Houseware', 'dawp'), 'url' => home_url('/product-category/houseware/')],
                        ['title' => __('Pet Supplies', 'dawp'), 'url' => home_url('/product-category/pet-supplies/')],
                        ['title' => __('Contact Support', 'dawp'), 'url' => home_url('/contact-us/')],
                    ];
                    foreach ($quick_links as $link) : ?>
                        <a href="<?php echo esc_url($link['url']); ?>" class="hover:text-white"><?php echo esc_html($link['title']); ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
