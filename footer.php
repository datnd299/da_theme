</div><!-- #content -->

<?php
$footer_shop_links = [
    ['title' => __('Women\'s Leather Shoes', 'dawp'), 'url' => home_url('/product-category/womens-leather-shoes/')],
    ['title' => __('Women\'s Sandals', 'dawp'),       'url' => home_url('/product-category/womens-sandals/')],
    ['title' => __('Women\'s Handbags', 'dawp'),      'url' => home_url('/product-category/womens-handbags/')],
    ['title' => __('Fashion Accessories', 'dawp'),    'url' => home_url('/product-category/fashion-accessories/')],
];

$footer_help_links = [
    ['title' => __('About', 'dawp'),           'url' => home_url('/about-us/')],
    ['title' => __('Contact', 'dawp'),         'url' => home_url('/contact-us/')],
    ['title' => __('My Account', 'dawp'),      'url' => home_url('/my-account/')],
    ['title' => __('Track Order', 'dawp'),     'url' => home_url('/track-order/')],
];

$footer_policy_links = [
    ['title' => __('FAQ', 'dawp'),                    'url' => home_url('/faq/')],
    ['title' => __('Shipping Policy', 'dawp'),        'url' => home_url('/shipping-policy/')],
    ['title' => __('Return & Refund Policy', 'dawp'), 'url' => home_url('/refund-return-policy/')],
    ['title' => __('Privacy Policy', 'dawp'),         'url' => home_url('/privacy-policy/')],
    ['title' => __('Terms & Conditions', 'dawp'),     'url' => home_url('/terms-conditions/')],
];

$footer_payment_methods = [
    ['file' => 'image.png',        'label' => __('Payment method', 'dawp')],
    ['file' => 'image copy.png',   'label' => __('Payment method', 'dawp')],
    ['file' => 'image copy 2.png', 'label' => __('Payment method', 'dawp')],
    ['file' => 'image copy 3.png', 'label' => __('Payment method', 'dawp')],
];

$support_email = 'support@smartbasketco.com';
$business_hours = __('Business Hours: Monday-Friday, 9:00 AM-5:00 PM, GMT-08:00', 'dawp');
$business_address = dawp_store_address();
$site_name     = get_bloginfo('name');
$logo_url      = get_template_directory_uri() . '/assets/img/gallery/logo.png';
?>

<footer id="colophon" class="bg-[#2F2A28] text-white" role="contentinfo">
    <div class="mx-auto grid w-[min(100%,1280px)] gap-10 px-4 py-14 sm:grid-cols-2 lg:grid-cols-[1.2fr_0.8fr_0.8fr_0.8fr] lg:px-6 lg:py-16">
        <div>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-block rounded-md bg-white px-3 py-2" aria-label="<?php echo esc_attr($site_name); ?>">
                <?php echo dawp_responsive_image($logo_url, [
                    'alt'     => $site_name,
                    'width'   => 120,
                    'height'  => 60,
                    'class'   => 'h-10 w-auto',
                    'loading' => 'lazy',
                    'sizes'   => '80px',
                    'srcset'  => [[80, 40], [120, 60]],
                ]); ?>
            </a>
            <ul class="mt-6 space-y-3 text-sm text-white/78">
                <li class="inline-flex items-start gap-2">
                    <svg class="mt-0.5 shrink-0" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M12 6v6l4 2"></path>
                    </svg>
                    <span><?php echo esc_html($business_hours); ?></span>
                </li>
                <li>
                    <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex items-center gap-2 transition-colors hover:text-white">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <path d="m22 6-10 7L2 6"></path>
                        </svg>
                        <?php echo esc_html($support_email); ?>
                    </a>
                </li>
                <li class="inline-flex items-start gap-2">
                    <svg class="mt-0.5 shrink-0" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                        <path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 1 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    <span><?php echo esc_html($business_address); ?></span>
                </li>
            </ul>

        </div>

        <div>
            <h2 class="text-xs font-bold uppercase tracking-[0.18em] text-[#E8D8C8]"><?php esc_html_e('Shop', 'dawp'); ?></h2>
            <ul class="mt-5 space-y-3">
                <?php foreach ($footer_shop_links as $link) : ?>
                    <li>
                        <a href="<?php echo esc_url($link['url']); ?>" class="text-sm text-white/76 transition-colors hover:text-white">
                            <?php echo esc_html($link['title']); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div>
            <h2 class="text-xs font-bold uppercase tracking-[0.18em] text-[#E8D8C8]"><?php esc_html_e('Help', 'dawp'); ?></h2>
            <ul class="mt-5 space-y-3">
                <?php foreach ($footer_help_links as $link) : ?>
                    <li>
                        <a href="<?php echo esc_url($link['url']); ?>" class="text-sm text-white/76 transition-colors hover:text-white">
                            <?php echo esc_html($link['title']); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div>
            <h2 class="text-xs font-bold uppercase tracking-[0.18em] text-[#E8D8C8]"><?php esc_html_e('Policy', 'dawp'); ?></h2>
            <ul class="mt-5 space-y-3">
                <?php foreach ($footer_policy_links as $link) : ?>
                    <li>
                        <a href="<?php echo esc_url($link['url']); ?>" class="text-sm text-white/76 transition-colors hover:text-white">
                            <?php echo esc_html($link['title']); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

    </div>

    <div class="border-t border-white/12">
        <div class="mx-auto flex w-[min(100%,1280px)] flex-col items-center justify-between gap-4 px-4 py-5 text-xs text-white/65 md:flex-row lg:px-6">
            <p>
                &copy; <?php echo esc_html(date('Y')); ?> <?php bloginfo('name'); ?>.
                <?php esc_html_e('All rights reserved.', 'dawp'); ?>
            </p>
            <div class="flex flex-col items-center gap-3 sm:flex-row sm:gap-4">
                <h2 class="text-center text-xs font-bold uppercase tracking-[0.18em] text-[#E8D8C8] sm:text-left"><?php esc_html_e('Accepted payments', 'dawp'); ?></h2>
                <div class="flex flex-wrap items-center justify-center gap-2">
                    <?php foreach ($footer_payment_methods as $method) : ?>
                        <span class="inline-flex h-9 items-center justify-center rounded bg-white px-2">
                            <?php echo dawp_responsive_image(get_template_directory_uri() . '/assets/img/Payment/' . $method['file'], [
                                'alt'     => $method['label'],
                                'width'   => 320,
                                'height'  => 104,
                                'class'   => 'h-6 w-auto',
                                'loading' => 'lazy',
                                'sizes'   => '74px',
                                'srcset'  => [[74, 24], [148, 48], [320, 104]],
                            ]); ?>
                        </span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
