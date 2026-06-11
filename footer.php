<?php
/**
 * Theme footer.
 *
 * @package dawp
 */

$footer_columns = function_exists('dawp_footer_columns') ? dawp_footer_columns() : [
    [
        'title' => __('Shop', 'dawp'),
        'links' => [
            ['title' => __('Shop All', 'dawp'), 'url' => home_url('/shop/')],
            ['title' => __('Relaxed Tops', 'dawp'), 'url' => home_url('/product-category/relaxed-tops/')],
            ['title' => __('Soft Tunics', 'dawp'), 'url' => home_url('/product-category/soft-tunics/')],
            ['title' => __('Gentle Blouses', 'dawp'), 'url' => home_url('/product-category/gentle-blouses/')],
        ],
    ],
    [
        'title' => __('Store Policy', 'dawp'),
        'links' => [
            ['title' => __('Shipping Policy', 'dawp'), 'url' => home_url('/shipping-policy/')],
            ['title' => __('Return & Refund Policy', 'dawp'), 'url' => home_url('/return-refund-policy/')],
            ['title' => __('Privacy Policy', 'dawp'), 'url' => home_url('/privacy-policy/')],
            ['title' => __('Terms & Conditions', 'dawp'), 'url' => home_url('/terms-conditions/')],
            ['title' => __('Faqs', 'dawp'), 'url' => home_url('/faq/')],
        ],
    ],
    [
        'title' => __('Help', 'dawp'),
        'links' => [
            ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/')],
            ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/')],
            ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/')],
            ['title' => __('My Account', 'dawp'), 'url' => function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/')],
        ],
    ],
];

$home_url = home_url('/');
$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$payment_methods = [
    [
        'label' => __('Visa', 'dawp'),
        'file' => 'Visa.png',
    ],
    [
        'label' => __('Mastercard', 'dawp'),
        'file' => 'mastercard.png',
    ],
    [
        'label' => __('American Express', 'dawp'),
        'file' => 'amre.png',
    ],
    [
        'label' => __('PayPal', 'dawp'),
        'file' => 'paypal.png',
    ],
];
?>

</div>

<footer id="colophon" class="bg-[#4B3528] text-white" role="contentinfo">
    <div class="mx-auto max-w-6xl px-4 py-10 sm:px-6 lg:px-8 lg:py-12">
        <div class="grid gap-8 lg:grid-cols-[0.9fr_1.7fr] lg:items-start">
            <div>
                <a href="<?php echo esc_url($home_url); ?>" class="inline-flex flex-col items-start" aria-label="<?php esc_attr_e('Vivisshop home', 'dawp'); ?>">
                    <span class="flex h-12 w-44 items-center">
                        <?php if (file_exists(get_template_directory() . '/assets/img/gallery/vivisshop/Logo.jpg')) : ?>
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/vivisshop/Logo.jpg'); ?>" alt="<?php esc_attr_e('Vivisshop', 'dawp'); ?>" class="max-h-12 w-auto object-contain">
                        <?php else : ?>
                            VS
                        <?php endif; ?>
                    </span>
                    <span class="mt-2 block text-sm font-semibold text-white/75">
                        <?php esc_html_e('Soft everyday women\'s fashion', 'dawp'); ?>
                    </span>
                </a>

                <p class="mt-4 max-w-sm text-sm leading-6 text-white/75">
                    <?php esc_html_e('Soft everyday women\'s fashion made for comfort, ease, and mature feminine style.', 'dawp'); ?>
                </p>

                <div class="mt-5 grid gap-2 text-sm text-white/80">
                    <a href="https://www.facebook.com/people/Vivisshopcom/100070774974928/" class="inline-flex items-center gap-3 transition hover:text-[#F3E7DA]" target="_blank" rel="noopener noreferrer">
                        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-white/10 text-[#F3E7DA]" aria-hidden="true">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path d="M22 12.06C22 6.49 17.52 2 12 2S2 6.49 2 12.06c0 5.02 3.66 9.18 8.44 9.94v-7.03H7.9v-2.91h2.54V9.85c0-2.52 1.49-3.91 3.77-3.91 1.09 0 2.23.2 2.23.2v2.46h-1.26c-1.24 0-1.63.78-1.63 1.57v1.89h2.77l-.44 2.91h-2.33V22C18.34 21.24 22 17.08 22 12.06z"></path>
                            </svg>
                        </span>
                        <span>Facebook</span>
                    </a>
                    <a href="mailto:support@vivisshop.com" class="inline-flex items-center gap-3 transition hover:text-[#F3E7DA]">
                        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-white/10 text-[#F3E7DA]" aria-hidden="true">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                <path d="m22 7-8.97 5.7a2 2 0 0 1-2.06 0L2 7"></path>
                            </svg>
                        </span>
                        <span>support@vivisshop.com</span>
                    </a>
                    <p class="inline-flex items-center gap-3">
                        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-white/10 text-[#F3E7DA]" aria-hidden="true">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 10c0 4.99-5.54 10.19-7.39 11.8a.94.94 0 0 1-1.22 0C9.54 20.19 4 14.99 4 10a8 8 0 0 1 16 0Z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </span>
                        <span>506 Warren St, Brooklyn, NY 11217</span>
                    </p>
                    <p class="inline-flex items-center gap-3">
                        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-white/10 text-[#F3E7DA]" aria-hidden="true">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M12 6v6l4 2"></path>
                            </svg>
                        </span>
                        <span><?php esc_html_e('Business hours: Monday-Friday, 9:00 AM-5:00 PM', 'dawp'); ?></span>
                    </p>
                </div>
            </div>

            <div class="grid gap-7 sm:grid-cols-3 lg:gap-10">
                <?php foreach ($footer_columns as $column) : ?>
                    <nav aria-label="<?php echo esc_attr($column['title']); ?>">
                        <h2 class="text-sm font-bold uppercase tracking-[0.18em] text-[#F3E7DA]">
                            <?php echo esc_html($column['title']); ?>
                        </h2>
                        <ul class="mt-4 grid gap-2.5">
                            <?php foreach ($column['links'] as $link) : ?>
                                <li>
                                    <a href="<?php echo esc_url($link['url']); ?>" class="text-sm font-medium leading-6 text-white/75 transition hover:text-white">
                                        <?php echo esc_html($link['title']); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </nav>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="mt-8 border-t border-white/10 pt-6">
            <div class="flex flex-col gap-4 text-sm text-white/70 lg:flex-row lg:items-center lg:justify-between">
                <p>
                    <?php
                    printf(
                        esc_html__('Copyright %1$s %2$s. All rights reserved.', 'dawp'),
                        esc_html(date_i18n('Y')),
                        esc_html__('Vivisshop', 'dawp')
                    );
                    ?>
                </p>
                <div class="flex flex-col gap-4 sm:flex-row sm:items-center">
                    <div class="flex flex-wrap items-center gap-2" aria-label="<?php esc_attr_e('Accepted payment methods', 'dawp'); ?>">
                        <?php foreach ($payment_methods as $payment_method) : ?>
                            <span class="inline-flex h-9 w-14 shrink-0 items-center justify-center overflow-hidden rounded-md border border-[#E7D8C8] bg-white shadow-sm" role="img" aria-label="<?php echo esc_attr($payment_method['label']); ?>">
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/' . $payment_method['file']); ?>" alt="" class="h-7 max-w-full object-contain" loading="lazy" decoding="async" aria-hidden="true">
                            </span>
                        <?php endforeach; ?>
                    </div>
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-11 items-center justify-center rounded-full bg-[#B89B83] px-6 text-sm font-bold text-white transition hover:bg-white hover:text-[#4B3528]">
                        <?php esc_html_e('Continue Shopping', 'dawp'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
