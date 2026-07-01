<?php
/**
 * Theme footer.
 */

$shop_url = function_exists('wc_get_page_id') && wc_get_page_id('shop') > 0
    ? get_permalink(wc_get_page_id('shop'))
    : home_url('/shop/');

$footer_columns = function_exists('dawp_footer_columns') ? dawp_footer_columns() : [];
?>

<footer class="bg-[#050505] text-white">
    <section class="border-y border-white/10 bg-[#111111]">
        <div class="mx-auto grid max-w-7xl grid-cols-2 gap-3 px-4 py-6 sm:px-6 md:grid-cols-4 lg:px-8">
            <?php
            $trust_items = [
                __('Secure Checkout', 'dawp'),
                __('Order Tracking', 'dawp'),
                __('Transparent Shipping', 'dawp'),
                __('Easy Returns', 'dawp'),
            ];
            foreach ($trust_items as $item) :
            ?>
                <div class="rounded-md border border-white/10 bg-white/5 px-3 py-3 text-center text-xs font-black uppercase tracking-wide text-[#FCA5A5]">
                    <?php echo esc_html($item); ?>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <div class="mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 py-14 sm:px-6 lg:grid-cols-[1.2fr_0.8fr_0.8fr_0.8fr] lg:px-8 lg:py-16">
        <div>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center gap-3 text-white hover:text-white">
                <span class="flex h-12 w-12 items-center justify-center rounded-md bg-[#DC2626]">
                    <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><circle cx="12" cy="12" r="7" stroke-width="2" /><circle cx="12" cy="12" r="2" stroke-width="2" /><path stroke-linecap="round" stroke-width="2" d="M12 5v3m0 8v3m7-7h-3M8 12H5" /></svg>
                </span>
                <span>
                    <span class="block font-heading text-3xl font-black leading-none"><?php bloginfo('name'); ?></span>
                    <span class="text-xs font-black uppercase tracking-[0.18em] text-[#FCA5A5]"><?php esc_html_e('Online Tire Store', 'dawp'); ?></span>
                </span>
            </a>
            <p class="mt-5 max-w-md text-sm leading-7 text-[#D4D4D4]">
                <?php esc_html_e('Rubyinstar helps everyday drivers shop quality tires online with simple product discovery, competitive pricing, and reliable delivery updates.', 'dawp'); ?>
            </p>
            <div class="mt-6 flex flex-col gap-3 sm:flex-row">
                <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#DC2626] px-6 text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-[#111111]">
                    <?php esc_html_e('Shop Tires', 'dawp'); ?>
                </a>
                <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-white/20 bg-white/10 px-6 text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-[#111111]">
                    <?php esc_html_e('Contact Support', 'dawp'); ?>
                </a>
            </div>
        </div>

        <?php foreach ($footer_columns as $column) : ?>
            <div>
                <h2 class="font-heading text-lg font-black uppercase tracking-wide text-white"><?php echo esc_html($column['title']); ?></h2>
                <ul class="mt-5 space-y-3">
                    <?php foreach ($column['links'] as $link) : ?>
                        <li>
                            <a href="<?php echo esc_url($link['url']); ?>" class="text-sm font-semibold text-[#D4D4D4] transition hover:text-[#FCA5A5]">
                                <?php echo esc_html($link['title']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endforeach; ?>

        <div>
            <h2 class="font-heading text-lg font-black uppercase tracking-wide text-white"><?php esc_html_e('Need Help?', 'dawp'); ?></h2>
            <div class="mt-5 space-y-4 text-sm leading-7 text-[#D4D4D4]">
                <p><?php esc_html_e('Have questions about tire size, shipping, returns, or your order status? Our support pages are ready when you need them.', 'dawp'); ?></p>
                <a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="inline-flex min-h-11 items-center justify-center rounded-md bg-white px-5 text-sm font-black uppercase tracking-wide text-[#111111] transition hover:bg-[#DC2626] hover:text-white">
                    <?php esc_html_e('Track Order', 'dawp'); ?>
                </a>
            </div>
        </div>
    </div>

    <div class="border-t border-white/10">
        <div class="mx-auto flex max-w-7xl flex-col gap-4 px-4 py-6 text-sm font-semibold text-[#A3A3A3] sm:px-6 md:flex-row md:items-center md:justify-between lg:px-8">
            <p>&copy; <?php echo esc_html(date_i18n('Y')); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved.', 'dawp'); ?></p>
            <div class="flex flex-wrap gap-x-5 gap-y-2">
                <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>" class="hover:text-white"><?php esc_html_e('Privacy Policy', 'dawp'); ?></a>
                <a href="<?php echo esc_url(home_url('/terms-conditions/')); ?>" class="hover:text-white"><?php esc_html_e('Terms Of Service', 'dawp'); ?></a>
                <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>" class="hover:text-white"><?php esc_html_e('Shipping Policy', 'dawp'); ?></a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
