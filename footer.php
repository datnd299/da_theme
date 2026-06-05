<?php
/**
 * Theme footer.
 *
 * @package dawp
 */

$current_year  = date_i18n('Y');
$support_email = 'support@eliteshopexpress.com';
$support_address = '123 Market Street, New York, NY 10001';
$operating_hours = 'Monday - Friday, 9:00 AM - 6:00 PM EST';

$footer_shop_links = dawp_product_category_links();

$footer_care_links = [
    ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/')],
    ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/')],
    ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/')],
    ['title' => __('My Account', 'dawp'), 'url' => get_permalink(get_option('woocommerce_myaccount_page_id')) ?: home_url('/my-account/')],
    ['title' => __('Cart', 'dawp'), 'url' => function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/')],
];

$footer_policy_links = [
    ['title' => __('FAQ', 'dawp'), 'url' => home_url('/faq/')],
    ['title' => __('Shipping Policy', 'dawp'), 'url' => home_url('/shipping-policy/')],
    ['title' => __('Return & Refund Policy', 'dawp'), 'url' => home_url('/return-refund-policy/')],
    ['title' => __('Privacy Policy', 'dawp'), 'url' => home_url('/privacy-policy/')],
    ['title' => __('Terms of Service', 'dawp'), 'url' => home_url('/terms-conditions/')],
];

?>

</div><!-- #content -->

<footer id="colophon" class="bg-[#101828] text-white" role="contentinfo">
    <section class="bg-[#101828]">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[1.15fr_0.85fr_0.85fr_0.85fr] lg:px-8 lg:py-20">
            <div>
                <a href="<?php echo esc_url(home_url('/')); ?>"
                   class="inline-flex leading-none"
                   aria-label="<?php echo esc_attr(get_bloginfo('name') ?: 'Elite Shop Express'); ?>">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/footer-logo.png'); ?>"
                         alt="<?php echo esc_attr(get_bloginfo('name') ?: 'Elite Shop Express'); ?>"
                         class="h-auto w-[220px] max-w-full object-contain sm:w-[240px]"
                         width="189"
                         height="60">
                </a>

                <div class="mt-7 space-y-3 text-sm font-bold text-white/75">
                    <a href="mailto:<?php echo esc_attr($support_email); ?>"
                       class="inline-flex items-center gap-3 transition hover:text-[#67E8F9]">
                        <svg class="h-5 w-5 flex-none text-[#67E8F9]" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M4 6h16v12H4V6Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                            <path d="m4 7 8 6 8-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span><?php echo esc_html($support_email); ?></span>
                    </a>
                    <p class="flex items-start gap-3">
                        <svg class="mt-0.5 h-5 w-5 flex-none text-[#67E8F9]" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M12 21s7-5.1 7-12a7 7 0 1 0-14 0c0 6.9 7 12 7 12Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                            <path d="M12 12a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                        </svg>
                        <span><?php echo esc_html($support_address); ?></span>
                    </p>
                    <p class="flex items-start gap-3">
                        <svg class="mt-0.5 h-5 w-5 flex-none text-[#67E8F9]" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M12 6v6l4 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 22a10 10 0 1 0 0-20 10 10 0 0 0 0 20Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                        </svg>
                        <span>
                            <span class="block text-xs font-black uppercase tracking-[0.18em] text-[#67E8F9]"><?php esc_html_e('Business Hours', 'dawp'); ?></span>
                            <span class="mt-1 block"><?php echo esc_html($operating_hours); ?></span>
                        </span>
                    </p>
                </div>
            </div>

            <nav aria-label="<?php esc_attr_e('Footer shop navigation', 'dawp'); ?>">
                <h3 class="mb-5 text-sm font-black uppercase tracking-[0.18em] text-[#67E8F9]">
                    <?php esc_html_e('Shop', 'dawp'); ?>
                </h3>

                <ul class="space-y-3">
                    <?php foreach ($footer_shop_links as $link) : ?>
                        <li>
                            <a href="<?php echo esc_url($link['url']); ?>"
                               class="text-sm font-bold text-white/72 transition hover:text-[#67E8F9]">
                                <?php echo esc_html($link['title']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <nav aria-label="<?php esc_attr_e('Footer customer care navigation', 'dawp'); ?>">
                <h3 class="mb-5 text-sm font-black uppercase tracking-[0.18em] text-[#67E8F9]">
                    <?php esc_html_e('Customer Care', 'dawp'); ?>
                </h3>

                <ul class="space-y-3">
                    <?php foreach ($footer_care_links as $link) : ?>
                        <?php if (!empty($link['url'])) : ?>
                            <li>
                                <a href="<?php echo esc_url($link['url']); ?>"
                                   class="text-sm font-bold text-white/72 transition hover:text-[#67E8F9]">
                                    <?php echo esc_html($link['title']); ?>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <nav aria-label="<?php esc_attr_e('Footer policy navigation', 'dawp'); ?>">
                <h3 class="mb-5 text-sm font-black uppercase tracking-[0.18em] text-[#67E8F9]">
                    <?php esc_html_e('Policies', 'dawp'); ?>
                </h3>

                <ul class="space-y-3">
                    <?php foreach ($footer_policy_links as $link) : ?>
                        <li>
                            <a href="<?php echo esc_url($link['url']); ?>"
                               class="text-sm font-bold text-white/72 transition hover:text-[#67E8F9]">
                                <?php echo esc_html($link['title']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>

            </nav>
        </div>
    </section>

    <div class="border-t border-white/10">
        <div class="mx-auto flex max-w-7xl flex-col gap-4 px-4 py-6 text-sm text-white/60 sm:px-6 lg:flex-row lg:items-center lg:justify-between lg:px-8">
            <p>
                &copy; <?php echo esc_html($current_year); ?> <?php echo esc_html('Elite Shop Express'); ?>. <?php esc_html_e('All rights reserved.', 'dawp'); ?>
            </p>

            <div class="flex flex-col gap-2 lg:items-center">
                <p class="text-xs font-black uppercase tracking-[0.18em] text-white/45">
                    <?php esc_html_e('Accepted Payment Methods', 'dawp'); ?>
                </p>
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/payment-methods.webp'); ?>"
                     alt="<?php esc_attr_e('Accepted payment methods: Visa, Mastercard, Discover, American Express, PayPal', 'dawp'); ?>"
                     class="h-7 w-auto opacity-85"
                     width="340"
                     height="44">
            </div>

            <p class="font-black uppercase tracking-[0.18em] text-[#67E8F9]">
                <?php esc_html_e('Everyday essentials, delivered with ease', 'dawp'); ?>
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
