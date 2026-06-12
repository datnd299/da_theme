<?php
/**
 * Theme footer.
 *
 * @package dawp
 */

$current_year = date_i18n('Y');
$brand_name   = 'Tizezap';

$term_url = static function ($slug) {
    return function_exists('dawp_product_category_url')
        ? dawp_product_category_url($slug)
        : home_url('/product-category/' . sanitize_title($slug) . '/');
};

$footer_shop_links = [
    ['title' => __('Shop All Tires', 'dawp'), 'url' => home_url('/shop/')],
    ['title' => __('All-Season Tires', 'dawp'), 'url' => $term_url('all-season-tires')],
    ['title' => __('SUV & Crossover Tires', 'dawp'), 'url' => $term_url('suv-crossover-tires')],
    ['title' => __('Light Truck Tires', 'dawp'), 'url' => $term_url('light-truck-tires')],
    ['title' => __('Performance Tires', 'dawp'), 'url' => $term_url('performance-tires')],
];

$footer_help_links = [
    ['title' => __('Shipping Policy', 'dawp'), 'url' => home_url('/shipping-policy/')],
    ['title' => __('Return & Refund Policy', 'dawp'), 'url' => home_url('/returns-policy/')],
    ['title' => __('Privacy Policy', 'dawp'), 'url' => home_url('/privacy-policy/')],
    ['title' => __('Terms & Conditions', 'dawp'), 'url' => home_url('/terms-conditions/')],
    ['title' => __('FAQs', 'dawp'), 'url' => home_url('/faq/')],
];

$footer_policy_links = [
    ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/')],
    ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/')],
    ['title' => __('Track My Order', 'dawp'), 'url' => home_url('/track-order/')],
    ['title' => __('My Account', 'dawp'), 'url' => get_permalink(get_option('woocommerce_myaccount_page_id')) ?: home_url('/my-account/')],
];

$trust_items = [
    [
        'title' => __('Secure Checkout', 'dawp'),
        'copy'  => __('Protected checkout flow for tire orders.', 'dawp'),
    ],
    [
        'title' => __('Tracking Included', 'dawp'),
        'copy'  => __('Tracking information is provided once an order ships.', 'dawp'),
    ],
    [
        'title' => __('30-Day Eligible Returns', 'dawp'),
        'copy'  => __('Eligible unused, unmounted, undriven, and undamaged tires may be returned within 30 days of delivery.', 'dawp'),
    ],
    [
        'title' => __('Clear Tire Specs', 'dawp'),
        'copy'  => __('Review size, rim, load index, speed rating, and fitment details.', 'dawp'),
    ],
];

$footer_payment_methods = [
    [
        'label' => __('JCB', 'dawp'),
        'image' => get_template_directory_uri() . '/assets/img/gallery/Oneshopvibe/payment/image copy.png',
    ],
    [
        'label' => __('MasterCard', 'dawp'),
        'image' => get_template_directory_uri() . '/assets/img/gallery/Oneshopvibe/payment/image copy 2.png',
    ],
    [
        'label' => __('PayPal', 'dawp'),
        'image' => get_template_directory_uri() . '/assets/img/gallery/Oneshopvibe/payment/image copy 3.png',
    ],
    [
        'label' => __('Visa', 'dawp'),
        'image' => get_template_directory_uri() . '/assets/img/gallery/Oneshopvibe/payment/image copy 4.png',
    ],
];
?>

</div><!-- #content -->

<footer id="colophon" class="bg-[#0B1F33] text-white" role="contentinfo">
    <section class="border-b border-white/10 bg-[#F4F6F8] text-[#111827]">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-4 px-4 py-8 sm:grid-cols-2 sm:px-6 lg:grid-cols-4 lg:px-8">
            <?php foreach ($trust_items as $item) : ?>
                <div class="rounded-lg border border-[#E5E7EB] bg-white p-5 shadow-sm">
                    <div class="mb-4 flex h-10 w-10 items-center justify-center rounded-md bg-[#2563EB] text-white">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <p class="text-lg font-black leading-snug text-[#0B1F33]">
                        <?php echo esc_html($item['title']); ?>
                    </p>
                    <p class="mt-2 text-sm leading-6 text-[#4B5563]">
                        <?php echo esc_html($item['copy']); ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section>
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-8 px-4 py-10 sm:px-6 lg:grid-cols-[1.2fr_0.8fr_0.8fr_0.8fr] lg:px-8 lg:py-12">
            <div>
                <a href="<?php echo esc_url(home_url('/')); ?>"
                   class="block h-[5.25rem] w-[17rem] max-w-full overflow-hidden"
                   aria-label="<?php echo esc_attr($brand_name); ?>">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo_footer.png'); ?>"
                         alt="<?php echo esc_attr($brand_name); ?>"
                         width="1536"
                         height="1024"
                         class="block w-[24rem] max-w-none -translate-x-[3.8rem] -translate-y-[5rem]">
                </a>

                <div class="mt-2 space-y-1 text-sm leading-6 text-white/75">
                    <p>
                        <strong class="text-white"><?php esc_html_e('Company:', 'dawp'); ?></strong>
                        <?php esc_html_e('TIRE CAPITAL LLC', 'dawp'); ?>
                    </p>
                    <p>
                        <strong class="text-white"><?php esc_html_e('Address:', 'dawp'); ?></strong>
                        <?php esc_html_e('324 W Dickerson Ln, Middletown, DE 19709-8832', 'dawp'); ?>
                    </p>
                    <p>
                        <strong class="text-white"><?php esc_html_e('Support:', 'dawp'); ?></strong>
                        <a href="mailto:support@tizezap.com" class="transition hover:text-[#93C5FD]">support@tizezap.com</a>
                    </p>
                </div>
            </div>

            <nav aria-label="<?php esc_attr_e('Footer shop navigation', 'dawp'); ?>">
                <h3 class="mb-5 text-sm font-black uppercase tracking-[0.2em] text-[#93C5FD]">
                    <?php esc_html_e('Shop Tires', 'dawp'); ?>
                </h3>

                <ul class="space-y-3">
                    <?php foreach ($footer_shop_links as $link) : ?>
                        <li>
                            <a href="<?php echo esc_url($link['url']); ?>"
                               class="text-sm font-bold text-white/72 transition hover:text-white">
                                <?php echo esc_html($link['title']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <nav aria-label="<?php esc_attr_e('Footer help navigation', 'dawp'); ?>">
                <h3 class="mb-5 text-sm font-black uppercase tracking-[0.2em] text-[#93C5FD]">
                    <?php esc_html_e('Store Policy', 'dawp'); ?>
                </h3>

                <ul class="space-y-3">
                    <?php foreach ($footer_help_links as $link) : ?>
                        <li>
                            <a href="<?php echo esc_url($link['url']); ?>"
                               class="text-sm font-bold text-white/72 transition hover:text-white">
                                <?php echo esc_html($link['title']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <nav aria-label="<?php esc_attr_e('Footer policy navigation', 'dawp'); ?>">
                <h3 class="mb-5 text-sm font-black uppercase tracking-[0.2em] text-[#93C5FD]">
                    <?php esc_html_e('Company', 'dawp'); ?>
                </h3>

                <ul class="space-y-3">
                    <?php foreach ($footer_policy_links as $link) : ?>
                        <?php if (! empty($link['url'])) : ?>
                            <li>
                                <a href="<?php echo esc_url($link['url']); ?>"
                                   class="text-sm font-bold text-white/72 transition hover:text-white">
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
                &copy; <?php echo esc_html($current_year); ?> <?php echo esc_html($brand_name); ?>. <?php esc_html_e('All rights reserved.', 'dawp'); ?>
            </p>

            <div class="flex flex-col gap-3 lg:items-center">
                <p class="text-xs font-black uppercase tracking-[0.2em] text-white/70">
                    <?php esc_html_e('Payment Methods', 'dawp'); ?>
                </p>
                <ul class="flex flex-wrap gap-1.5" aria-label="<?php esc_attr_e('Accepted payment methods', 'dawp'); ?>">
                    <?php foreach ($footer_payment_methods as $method) : ?>
                        <li>
                            <img
                                src="<?php echo esc_url($method['image']); ?>"
                                alt="<?php echo esc_attr($method['label']); ?>"
                                width="80"
                                height="48"
                                loading="lazy"
                                class="h-7 w-auto rounded bg-white shadow-sm"
                            >
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="flex flex-col gap-3 lg:items-end">
                <p class="font-black uppercase tracking-[0.18em] text-[#93C5FD]">
                    <?php esc_html_e('Road-ready tire shopping', 'dawp'); ?>
                </p>

                <a href="#"
                   class="dawp-footer-facebook inline-flex items-center justify-center text-white"
                   aria-label="<?php esc_attr_e('Facebook page', 'dawp'); ?>">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M22 12.06C22 6.51 17.52 2 12 2S2 6.51 2 12.06c0 5.02 3.66 9.18 8.44 9.94v-7.03H7.9v-2.91h2.54V9.85c0-2.52 1.49-3.91 3.77-3.91 1.09 0 2.23.2 2.23.2v2.47h-1.26c-1.24 0-1.63.78-1.63 1.57v1.88h2.78l-.44 2.91h-2.34V22C18.34 21.24 22 17.08 22 12.06z" />
                    </svg>
                    <span><?php esc_html_e('Facebook page', 'dawp'); ?></span>
                </a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
