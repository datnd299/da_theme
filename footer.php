<?php
/**
 * Theme footer.
 *
 * @package dawp
 */

$current_year = date_i18n('Y');

$footer_shop_links = array_merge([
    ['title' => __('Shop All', 'dawp'), 'url' => home_url('/shop/')],
], function_exists('dawp_product_category_links') ? dawp_product_category_links(5) : []);

$footer_help_links = [
    ['title' => __('Shipping Policy', 'dawp'), 'url' => home_url('/shipping-policy/')],
    ['title' => __('Return & Refund Policy', 'dawp'), 'url' => home_url('/return-refund-policy/')],
    ['title' => __('Privacy Policy', 'dawp'), 'url' => home_url('/privacy-policy/')],
    ['title' => __('Terms & Conditions', 'dawp'), 'url' => home_url('/terms-conditions/')],
    ['title' => __('FAQ', 'dawp'), 'url' => home_url('/faq/')],
];

$footer_policy_links = [
    ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/')],
    ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/')],
    ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/')],
    ['title' => __('My Account', 'dawp'), 'url' => get_permalink(get_option('woocommerce_myaccount_page_id')) ?: home_url('/my-account/')],
    ['title' => __('Cart', 'dawp'), 'url' => function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/')],
];

$footer_payment_methods = [
    ['label' => __('Visa', 'dawp'), 'mark' => 'VISA'],
    ['label' => __('Mastercard', 'dawp'), 'mark' => 'MC'],
    ['label' => __('American Express', 'dawp'), 'mark' => 'AMEX'],
    ['label' => __('Discover', 'dawp'), 'mark' => 'DISC'],
    ['label' => __('PayPal', 'dawp'), 'mark' => 'PayPal'],
];
?>

</div><!-- #content -->

<footer id="colophon" class="bg-[#2D2633] text-white" role="contentinfo">
    <section class="relative overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(247,201,72,0.18),transparent_34%),radial-gradient(circle_at_bottom_left,rgba(220,213,255,0.16),transparent_30%)]"></div>

        <div class="relative mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[1.15fr_0.85fr_0.85fr_0.85fr] lg:px-8 lg:py-20">
            <div>
                <a href="<?php echo esc_url(home_url('/')); ?>"
                   class="inline-flex items-center gap-3"
                   aria-label="<?php echo esc_attr(get_bloginfo('name') ?: 'Crestovia'); ?>">
                    <?php
                    echo dawp_responsive_image([
                        'src'           => get_template_directory_uri() . '/assets/img/gallery/Oneshopvibe/image.jpeg',
                        'alt'           => __('Crestovia', 'dawp'),
                        'width'         => 96,
                        'height'        => 96,
                        'class'         => 'h-12 w-auto',
                        'sizes'         => '48px',
                        'srcset_widths' => [48, 96, 192],
                    ]);
                    ?>
                </a>


                <div class="mt-7 space-y-5 text-sm leading-relaxed text-white/80">
                    <a href="mailto:support@crestovia.net"
                       class="flex items-start gap-3 text-white/80 transition hover:text-[#F7C948]">
                        <svg aria-hidden="true" viewBox="0 0 24 24" class="mt-0.5 h-5 w-5 shrink-0 text-[#F7C948]">
                            <path fill="currentColor" d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2Zm-.4 4.25-7.07 4.42a1 1 0 0 1-1.06 0L4.4 8.25a1 1 0 0 1 1.06-1.7L12 10.64l6.54-4.09a1 1 0 1 1 1.06 1.7Z"></path>
                        </svg>
                        <span>support@crestovia.net</span>
                    </a>

                    <div class="flex items-start gap-3">
                        <svg aria-hidden="true" viewBox="0 0 24 24" class="mt-0.5 h-5 w-5 shrink-0 text-[#F7C948]">
                            <path fill="currentColor" d="M12 2a7 7 0 0 0-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 0 0-7-7Zm0 9.5A2.5 2.5 0 1 1 12 6a2.5 2.5 0 0 1 0 5.5Z"></path>
                        </svg>
                        <div>
                            <strong class="block text-white"><?php esc_html_e('Address:', 'dawp'); ?></strong>
                            <span><?php dawp_store_address(); ?></span>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <svg aria-hidden="true" viewBox="0 0 24 24" class="mt-0.5 h-5 w-5 shrink-0 text-[#F7C948]">
                            <path fill="currentColor" d="M12 2a10 10 0 1 0 10 10A10.01 10.01 0 0 0 12 2Zm4 11h-4a1 1 0 0 1-1-1V7a1 1 0 0 1 2 0v4h3a1 1 0 0 1 0 2Z"></path>
                        </svg>
                        <div>
                            <strong class="block text-white"><?php esc_html_e('Business Hours', 'dawp'); ?></strong>
                            <span><?php esc_html_e('Monday-Friday, 9:00 AM-6:00 PM PST.', 'dawp'); ?></span>
                        </div>
                    </div>
                </div>


            </div>

            <nav aria-label="<?php esc_attr_e('Footer shop navigation', 'dawp'); ?>">
                <h3 class="mb-5 text-sm font-black uppercase tracking-[0.2em] text-[#F7C948]">
                    <?php esc_html_e('Shop', 'dawp'); ?>
                </h3>

                <ul class="space-y-3">
                    <?php foreach ($footer_shop_links as $link) : ?>
                        <li>
                            <a href="<?php echo esc_url($link['url']); ?>"
                               class="text-sm font-bold text-white/72 transition hover:text-[#F7C948]">
                                <?php echo esc_html($link['title']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <nav aria-label="<?php esc_attr_e('Footer help navigation', 'dawp'); ?>">
                <h3 class="mb-5 text-sm font-black uppercase tracking-[0.2em] text-[#F7C948]">
                    <?php esc_html_e('Customer Care', 'dawp'); ?>
                </h3>

                <ul class="space-y-3">
                    <?php foreach ($footer_help_links as $link) : ?>
                        <li>
                            <a href="<?php echo esc_url($link['url']); ?>"
                               class="text-sm font-bold text-white/72 transition hover:text-[#F7C948]">
                                <?php echo esc_html($link['title']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>


            </nav>

            <nav aria-label="<?php esc_attr_e('Footer policy navigation', 'dawp'); ?>">
                <h3 class="mb-5 text-sm font-black uppercase tracking-[0.2em] text-[#F7C948]">
                    <?php esc_html_e('About', 'dawp'); ?>
                </h3>

                <ul class="space-y-3">
                    <?php foreach ($footer_policy_links as $link) : ?>
                        <?php if (!empty($link['url'])) : ?>
                            <li>
                                <a href="<?php echo esc_url($link['url']); ?>"
                                   class="text-sm font-bold text-white/72 transition hover:text-[#F7C948]">
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
                &copy; <?php echo esc_html($current_year); ?> <?php echo esc_html('Crestovia'); ?>. <?php esc_html_e('All rights reserved.', 'dawp'); ?>
            </p>

            <div class="flex flex-col gap-3 lg:items-center">
                <p class="text-xs font-black uppercase tracking-[0.2em] text-white/70">
                    <?php esc_html_e('Payment Methods', 'dawp'); ?>
                </p>
                <ul class="flex flex-wrap gap-2" aria-label="<?php esc_attr_e('Accepted payment methods', 'dawp'); ?>">
                    <?php foreach ($footer_payment_methods as $method) : ?>
                        <li>
                            <span class="inline-flex min-h-8 min-w-14 items-center justify-center rounded-md border border-white/15 bg-white px-3 text-xs font-black leading-none tracking-wide text-[#2D2633] shadow-sm">
                                <span class="sr-only"><?php echo esc_html($method['label']); ?></span>
                                <span aria-hidden="true"><?php echo esc_html($method['mark']); ?></span>
                            </span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <p class="font-black uppercase tracking-[0.18em] text-[#F7C948]">
                <?php esc_html_e('Simple everyday confidence', 'dawp'); ?>
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
