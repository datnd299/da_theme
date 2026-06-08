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
    ['title' => __('Oversized Tees', 'dawp'), 'url' => home_url('/product-category/oversize-tees/')],
    ['title' => __('Casual Hoodies', 'dawp'), 'url' => home_url('/product-category/casual-hoodies/')],
    ['title' => __('Streetwear Essentials', 'dawp'), 'url' => home_url('/product-category/streetwear-essentials/')],
];

$footer_help_links = [
    ['title' => __('FAQ', 'dawp'), 'url' => home_url('/faq/')],
    ['title' => __('Shipping Policy', 'dawp'), 'url' => home_url('/shipping-policy/')],
    ['title' => __('Return & Refund Policy', 'dawp'), 'url' => home_url('/return-refund-policy/')],
    ['title' => __('Privacy Policy', 'dawp'), 'url' => home_url('/privacy-policy/')],
    ['title' => __('Terms & Conditions', 'dawp'), 'url' => home_url('/terms-conditions/')],
];

$footer_policy_links = [
    ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/')],
    ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/')],
    ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/')],
    ['title' => __('My Account', 'dawp'), 'url' => get_permalink(get_option('woocommerce_myaccount_page_id')) ?: home_url('/my-account/')],
    ['title' => __('Cart', 'dawp'), 'url' => function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/')],
];
?>

</div><!-- #content -->

<footer id="colophon" class="bg-slickBlack text-white" role="contentinfo">
    <section class="site-footer-trust border-b border-white/10 bg-slickGreen">
        <div class="footer-trust-slider mx-auto grid max-w-7xl grid-cols-1 gap-5 px-4 py-8 sm:px-6 lg:grid-cols-4 lg:px-8">
            <div class="footer-trust-card rounded-2xl border border-white/10 bg-white/5 p-5">
                <p class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-white">
                    <?php esc_html_e('Secure Checkout', 'dawp'); ?>
                </p>
                <p class="mt-2 text-sm leading-6 text-white/70">
                    <?php esc_html_e('Clear payment flow and protected order details.', 'dawp'); ?>
                </p>
            </div>

            <div class="footer-trust-card rounded-2xl border border-white/10 bg-white/5 p-5">
                <p class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-white">
                    <?php esc_html_e('Tracking Included', 'dawp'); ?>
                </p>
                <p class="mt-2 text-sm leading-6 text-white/70">
                    <?php esc_html_e('Shipment updates are sent after dispatch.', 'dawp'); ?>
                </p>
            </div>

            <div class="footer-trust-card rounded-2xl border border-white/10 bg-white/5 p-5">
                <p class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-white">
                    <?php esc_html_e('30-Day Returns', 'dawp'); ?>
                </p>
                <p class="mt-2 text-sm leading-6 text-white/70">
                    <?php esc_html_e('Eligible unworn items may be returned.', 'dawp'); ?>
                </p>
            </div>

            <div class="footer-trust-card rounded-2xl border border-white/10 bg-white/5 p-5">
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
                   class="inline-flex shrink-0"
                   aria-label="<?php bloginfo('name'); ?>">
                    <?php dawp_responsive_theme_image(
                        'assets/img/slicktee.png',
                        get_bloginfo('name'),
                        'h-11 w-auto',
                        190,
                        44,
                        [[190, 44], [380, 88]],
                        '190px',
                        'lazy'
                    ); ?>
                </a>

                <div class="mt-5 max-w-md space-y-3 text-sm font-bold leading-6 text-white/80">
                    <a href="mailto:support@slicktee.com"
                       class="flex items-start gap-3 transition hover:text-slickLime">
                        <svg class="mt-0.5 h-5 w-5 shrink-0 text-slickLime" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                            <path fill="currentColor" d="M4 5h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Zm0 3.2v8.8h16V8.2l-7.38 5.08a1.1 1.1 0 0 1-1.24 0L4 8.2Zm1.06-1.2L12 11.78 18.94 7H5.06Z" />
                        </svg>
                        <span>support@slicktee.com</span>
                    </a>

                    <p class="flex items-start gap-3">
                        <svg class="mt-0.5 h-5 w-5 shrink-0 text-slickLime" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                            <path fill="currentColor" d="M12 2a7 7 0 0 0-7 7c0 5.25 6.18 12.38 6.44 12.68a.75.75 0 0 0 1.12 0C12.82 21.38 19 14.25 19 9a7 7 0 0 0-7-7Zm0 17.98C10.12 17.64 7 13.21 7 9a5 5 0 0 1 10 0c0 4.21-3.12 8.64-5 10.98ZM12 6a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm0 4.1a1.1 1.1 0 1 1 0-2.2 1.1 1.1 0 0 1 0 2.2Z" />
                        </svg>
                        <span><?php echo esc_html(dawp_get_store_address()); ?></span>
                    </p>

                    <p class="flex items-start gap-3">
                        <svg class="mt-0.5 h-5 w-5 shrink-0 text-slickLime" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                            <path fill="currentColor" d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20Zm0 18a8 8 0 1 1 0-16 8 8 0 0 1 0 16Zm1-13h-2v5.42l4.16 2.5 1-1.62L13 11.42V7Z" />
                        </svg>
                        <span><?php esc_html_e('Business Hours: Monday-Friday, 9:00 AM-6:00 PM PST', 'dawp'); ?></span>
                    </p>
                </div>

                <div class="mt-7 flex flex-wrap gap-3">
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

            </div>

            <nav aria-label="<?php esc_attr_e('Footer shop navigation', 'dawp'); ?>">
                <h3 class="mb-5 text-sm font-black uppercase tracking-[0.2em] text-slickLime">
                    <?php esc_html_e('Shop', 'dawp'); ?>
                </h3>

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
                <h3 class="mb-5 text-sm font-black uppercase tracking-[0.2em] text-slickLime">
                    <?php esc_html_e('Help & Policy', 'dawp'); ?>
                </h3>

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
                <h3 class="mb-5 text-sm font-black uppercase tracking-[0.2em] text-slickLime">
                    <?php esc_html_e('About', 'dawp'); ?>
                </h3>

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
            </nav>
        </div>
    </section>

    <div class="border-t border-white/10">
        <div class="mx-auto flex max-w-7xl flex-col gap-4 px-4 py-6 text-sm text-white/60 sm:px-6 lg:flex-row lg:items-center lg:justify-between lg:px-8">
            <p>
                &copy; <?php echo esc_html($current_year); ?> <?php echo esc_html('Slicktee'); ?>. <?php esc_html_e('All rights reserved.', 'dawp'); ?>
            </p>

            <div class="flex flex-col items-center gap-2">
                <p class="text-xs font-black uppercase tracking-[0.2em] text-white/40">
                    <?php esc_html_e('Payment Methods', 'dawp'); ?>
                </p>
                <?php dawp_responsive_theme_image(
                    'assets/img/payment-methods.webp',
                    __('Accepted payment methods: Visa, Mastercard, Discover, American Express, PayPal', 'dawp'),
                    'h-7 w-auto opacity-70',
                    220,
                    28,
                    [[220, 28], [340, 44], [680, 88]],
                    '220px',
                    'lazy'
                ); ?>
            </div>

            <p class="font-black uppercase tracking-[0.18em] text-slickLime">
                <?php esc_html_e('Clean fits for everyday rotation', 'dawp'); ?>
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
