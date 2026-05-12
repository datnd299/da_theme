<?php
/**
 * Theme footer.
 *
 * @package dawp
 */

$current_year = date_i18n('Y');

$footer_shop_links = [
    ['title' => __('Shop All', 'dawp'), 'url' => home_url('/shop/')],
    ['title' => __('Graphic Tees', 'dawp'), 'url' => home_url('/product-category/graphic-tees/')],
    ['title' => __('Oversized Tees', 'dawp'), 'url' => home_url('/product-category/oversized-tees/')],
    ['title' => __('Casual Hoodies', 'dawp'), 'url' => home_url('/product-category/casual-hoodies/')],
    ['title' => __('Streetwear Essentials', 'dawp'), 'url' => home_url('/product-category/streetwear-essentials/')],
];

$footer_help_links = [
    ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/')],
    ['title' => __('FAQ', 'dawp'), 'url' => home_url('/faq/')],
    ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/')],
    ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/')],
    ['title' => __('Shipping & Returns', 'dawp'), 'url' => home_url('/shipping-returns/')],
];

$footer_policy_links = [
    ['title' => __('Privacy Policy', 'dawp'), 'url' => home_url('/privacy-policy/')],
    ['title' => __('Terms & Conditions', 'dawp'), 'url' => home_url('/terms-conditions/')],
    ['title' => __('My Account', 'dawp'), 'url' => get_permalink(get_option('woocommerce_myaccount_page_id')) ?: home_url('/my-account/')],
    ['title' => __('Cart', 'dawp'), 'url' => function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/')],
];
?>

</div><!-- #content -->

<footer id="colophon" class="bg-slickBlack text-white" role="contentinfo">
    <section class="border-b border-white/10 bg-slickGreen">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-5 px-4 py-8 sm:px-6 lg:grid-cols-4 lg:px-8">
            <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                <p class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-white">
                    <?php esc_html_e('Secure Checkout', 'dawp'); ?>
                </p>
                <p class="mt-2 text-sm leading-6 text-white/70">
                    <?php esc_html_e('Clear payment flow and protected order details.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                <p class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-white">
                    <?php esc_html_e('Tracking Included', 'dawp'); ?>
                </p>
                <p class="mt-2 text-sm leading-6 text-white/70">
                    <?php esc_html_e('Shipment updates are sent after dispatch.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                <p class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-white">
                    <?php esc_html_e('30-Day Returns', 'dawp'); ?>
                </p>
                <p class="mt-2 text-sm leading-6 text-white/70">
                    <?php esc_html_e('Eligible unworn items may be returned.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                <p class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-white">
                    <?php esc_html_e('Support Available', 'dawp'); ?>
                </p>
                <p class="mt-2 text-sm leading-6 text-white/70">
                    <?php esc_html_e('Help with orders, sizing, shipping, and returns.', 'dawp'); ?>
                </p>
            </div>
        </div>
    </section>

    <section class="relative overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(34,197,94,0.24),transparent_34%),linear-gradient(135deg,#0B0F0D_0%,#123D2A_64%,#0B0F0D_100%)]"></div>

        <div class="relative mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[1.15fr_0.85fr_0.85fr_0.85fr] lg:px-8 lg:py-20">
            <div>
                <a href="<?php echo esc_url(home_url('/')); ?>"
                   class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-white"
                   aria-label="<?php bloginfo('name'); ?>">
                    Slick<span class="text-slickActive">tee</span>
                </a>

                <p class="mt-5 max-w-md text-base leading-8 text-white/78">
                    <?php esc_html_e('Modern graphic tees, oversized silhouettes, casual hoodies, and everyday streetwear essentials built for clean daily rotation.', 'dawp'); ?>
                </p>

                <form role="search"
                      method="get"
                      action="<?php echo esc_url(home_url('/')); ?>"
                      class="mt-7 flex max-w-md flex-col gap-3 rounded-2xl border border-white/10 bg-white/5 p-3 sm:flex-row">
                    <label for="slicktee-footer-search" class="sr-only">
                        <?php esc_html_e('Search products', 'dawp'); ?>
                    </label>

                    <input id="slicktee-footer-search"
                           type="search"
                           name="s"
                           placeholder="<?php esc_attr_e('Search apparel', 'dawp'); ?>"
                           class="min-h-12 flex-1 rounded-md border border-white/10 bg-white px-4 text-slickText placeholder:text-slickMuted outline-none transition focus:border-slickActive focus:ring-2 focus:ring-slickLime">

                    <input type="hidden" name="post_type" value="product">

                    <button type="submit"
                            class="min-h-12 rounded-md bg-slickActive px-6 text-sm font-black uppercase tracking-wide text-slickBlack transition hover:bg-slickLime">
                        <?php esc_html_e('Search', 'dawp'); ?>
                    </button>
                </form>

                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="mailto:support@slicktee.com"
                       class="inline-flex min-h-10 items-center justify-center rounded-md border border-white/15 px-4 text-xs font-black uppercase tracking-wide text-white/85 transition hover:border-slickLime hover:text-slickLime">
                        support@slicktee.com
                    </a>

                    <a href="<?php echo esc_url(home_url('/shop/')); ?>"
                       class="inline-flex min-h-10 items-center justify-center rounded-md bg-white px-4 text-xs font-black uppercase tracking-wide text-slickBlack transition hover:bg-slickLime">
                        <?php esc_html_e('Shop New Drops', 'dawp'); ?>
                    </a>

                    <a href="https://www.facebook.com/slickteeshirt/"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="inline-flex h-10 w-10 items-center justify-center rounded-md border border-white/15 text-white/85 transition hover:border-slickLime hover:text-slickLime"
                       aria-label="<?php esc_attr_e('Visit Slicktee on Facebook', 'dawp'); ?>">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                            <path fill="currentColor" d="M22 12.06C22 6.51 17.52 2 12 2S2 6.51 2 12.06c0 5.01 3.66 9.16 8.44 9.91v-7.01H7.9v-2.9h2.54V9.85c0-2.52 1.49-3.91 3.77-3.91 1.09 0 2.23.2 2.23.2V8.6h-1.26c-1.24 0-1.63.78-1.63 1.57v1.89h2.77l-.44 2.9h-2.33v7.01C18.34 21.22 22 17.07 22 12.06Z" />
                        </svg>
                    </a>
                </div>

                <div class="mt-4 max-w-md rounded-2xl border border-white/10 bg-white/5 p-5">
                    <p class="text-xs font-black uppercase tracking-[0.2em] text-slickLime">
                        <?php esc_html_e('Address', 'dawp'); ?>
                    </p>
                    <p class="mt-2 text-sm font-bold leading-6 text-white/80">
                        <?php esc_html_e('2171 Prairie Center Pkwy, Brighton, CO 80601, US', 'dawp'); ?>
                    </p>
                </div>
            </div>

            <nav aria-label="<?php esc_attr_e('Footer shop navigation', 'dawp'); ?>">
                <h2 class="mb-5 text-sm font-black uppercase tracking-[0.2em] text-slickLime">
                    <?php esc_html_e('Shop', 'dawp'); ?>
                </h2>

                <ul class="space-y-3">
                    <?php foreach ($footer_shop_links as $link) : ?>
                        <li>
                            <a href="<?php echo esc_url($link['url']); ?>"
                               class="text-sm font-bold text-white/72 transition hover:text-slickLime">
                                <?php echo esc_html($link['title']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <nav aria-label="<?php esc_attr_e('Footer help navigation', 'dawp'); ?>">
                <h2 class="mb-5 text-sm font-black uppercase tracking-[0.2em] text-slickLime">
                    <?php esc_html_e('Help', 'dawp'); ?>
                </h2>

                <ul class="space-y-3">
                    <?php foreach ($footer_help_links as $link) : ?>
                        <li>
                            <a href="<?php echo esc_url($link['url']); ?>"
                               class="text-sm font-bold text-white/72 transition hover:text-slickLime">
                                <?php echo esc_html($link['title']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <nav aria-label="<?php esc_attr_e('Footer policy navigation', 'dawp'); ?>">
                <h2 class="mb-5 text-sm font-black uppercase tracking-[0.2em] text-slickLime">
                    <?php esc_html_e('Account & Policy', 'dawp'); ?>
                </h2>

                <ul class="space-y-3">
                    <?php foreach ($footer_policy_links as $link) : ?>
                        <?php if (!empty($link['url'])) : ?>
                            <li>
                                <a href="<?php echo esc_url($link['url']); ?>"
                                   class="text-sm font-bold text-white/72 transition hover:text-slickLime">
                                    <?php echo esc_html($link['title']); ?>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>

                <div class="mt-7 rounded-2xl border border-white/10 bg-white/5 p-5">
                    <p class="text-xs font-black uppercase tracking-[0.2em] text-slickLime">
                        <?php esc_html_e('Business Hours', 'dawp'); ?>
                    </p>
                    <p class="mt-2 text-sm font-bold leading-6 text-white/80">
                        <?php esc_html_e('Monday - Friday', 'dawp'); ?><br>
                        <?php esc_html_e('9:00 AM - 6:00 PM EST', 'dawp'); ?>
                    </p>
                </div>
            </nav>
        </div>
    </section>

    <div class="border-t border-white/10">
        <div class="mx-auto flex max-w-7xl flex-col gap-4 px-4 py-6 text-sm text-white/60 sm:px-6 lg:flex-row lg:items-center lg:justify-between lg:px-8">
            <p>
                &copy; <?php echo esc_html($current_year); ?> <?php echo esc_html('Slicktee'); ?>. <?php esc_html_e('All rights reserved.', 'dawp'); ?>
            </p>

            <p class="font-black uppercase tracking-[0.18em] text-slickLime">
                <?php esc_html_e('Clean fits for everyday rotation', 'dawp'); ?>
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
