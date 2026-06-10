<?php
/**
 * Theme footer.
 *
 * @package dawp
 */

$current_year  = date_i18n('Y');
$support_email = 'support@houseofshoesonline.com';
$site_name     = trim(get_bloginfo('name'));
$address       = dawp_get_store_address();

if ($site_name === '' || strtolower($site_name) === 'xxx') {
    $site_name = 'House of Shoes Online';
}

$footer_shop_links = [
    ['title' => __('Shop All', 'dawp'), 'url' => home_url('/shop/')],
    ['title' => __('Everyday Sneakers', 'dawp'), 'url' => home_url('/product-category/everyday-sneakers/')],
    ['title' => __('Sandals & Slides', 'dawp'), 'url' => home_url('/product-category/sandals-slides/')],
    ['title' => __('Boots', 'dawp'), 'url' => home_url('/product-category/boots/')],
];

$footer_policy_links = [
    ['title' => __('FAQ', 'dawp'), 'url' => home_url('/faq/')],
    ['title' => __('Shipping Policy', 'dawp'), 'url' => home_url('/shipping-policy/')],
    ['title' => __('Return & Refund Policy', 'dawp'), 'url' => home_url('/return-refund-policy/')],
    ['title' => __('Privacy Policy', 'dawp'), 'url' => home_url('/privacy-policy/')],
    ['title' => __('Terms & Conditions', 'dawp'), 'url' => home_url('/terms-conditions/')],
];

$footer_brand_links = [
    ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/')],
    ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/')],
    ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/')],
    ['title' => __('My Account', 'dawp'), 'url' => home_url('/my-account/')],
];
?>

</div><!-- #content -->

<footer id="colophon" class="bg-[linear-gradient(135deg,#141217_0%,#2A1538_100%)] text-white" role="contentinfo">
    <section class="relative overflow-hidden">
        <div class="absolute left-0 top-0 h-1 w-full bg-[linear-gradient(90deg,#E6007E,#FF4FB8,#7C3AED)]"></div>

        <div class="relative mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[minmax(0,1fr)_minmax(0,2fr)] lg:items-start lg:gap-16 lg:px-8 lg:py-20">
            <div class="lg:max-w-sm">
                <a href="<?php echo esc_url(home_url('/')); ?>"
                   class="inline-flex max-w-xs items-center gap-3"
                   aria-label="<?php echo esc_attr($site_name); ?>">
                    <img <?php echo dawp_i0_img_attrs(get_template_directory_uri() . '/assets/img/image.png', [
                             'width'  => 88,
                             'height' => 88,
                             'srcset' => [[40, 40], [88, 88], [132, 132]],
                             'sizes'  => '(max-width: 640px) 40px, 44px',
                         ]); ?>
                         alt="<?php echo esc_attr($site_name); ?>"
                         class="h-10 w-10 shrink-0 rounded-full object-contain sm:h-11 sm:w-11">
                    <span class="font-heading text-base font-extrabold uppercase leading-snug tracking-[0.1em] text-white sm:text-lg">
                        <?php echo esc_html($site_name); ?>
                    </span>
                </a>

                <?php if ($address !== '') : ?>
                    <address class="mt-7 flex items-start gap-3 not-italic">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mt-0.5 shrink-0 text-[#FF4FB8]">
                            <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                            <circle cx="12" cy="10" r="3"/>
                        </svg>
                        <p class="max-w-none text-sm font-bold text-white/72">
                            <?php echo esc_html($address); ?>
                        </p>
                    </address>
                <?php endif; ?>

                <a href="mailto:<?php echo esc_attr($support_email); ?>"
                   class="mt-5 flex items-start gap-3 text-sm font-bold text-white/72 transition hover:text-white">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mt-0.5 shrink-0 text-[#FF4FB8]" aria-hidden="true">
                        <path d="M21 15a4 4 0 0 1-4 4h-1l-4 3v-3H7a4 4 0 0 1-4-4V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4z"/>
                        <path d="M8 9h8"/>
                        <path d="M8 13h5"/>
                    </svg>
                    <span><?php echo esc_html($support_email); ?></span>
                </a>

                <div class="mt-5 flex items-start gap-3 text-sm font-bold text-white/72">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mt-0.5 shrink-0 text-[#FF4FB8]" aria-hidden="true">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="M12 6v6l4 2"/>
                    </svg>
                    <span><?php esc_html_e('Business Hours: Monday-Friday, 9:00 AM-6:00 PM PST', 'dawp'); ?></span>
                </div>

                <div class="mt-5 flex">
                    <a href="https://www.facebook.com/vegashouseofshoes"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-white/15 text-white/85 transition hover:border-[#FF4FB8] hover:bg-white/10 hover:text-white"
                       aria-label="<?php esc_attr_e('Follow House of Shoes on Facebook', 'dawp'); ?>">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M22 12.06C22 6.5 17.52 2 12 2S2 6.5 2 12.06c0 5.02 3.66 9.18 8.44 9.94v-7.03H7.9v-2.91h2.54V9.84c0-2.52 1.49-3.91 3.77-3.91 1.09 0 2.23.2 2.23.2v2.46h-1.25c-1.24 0-1.63.77-1.63 1.56v1.87h2.77l-.44 2.91h-2.33V22C18.34 21.24 22 17.08 22 12.06z"/>
                        </svg>
                    </a>
                </div>

                <form role="search"
                      method="get"
                      action="<?php echo esc_url(home_url('/')); ?>"
                      class="mt-7 flex w-full max-w-sm items-center rounded-full bg-white p-0.5 focus-within:ring-2 focus-within:ring-[#FF4FB8]">
                    <label for="house-shoes-footer-search" class="sr-only">
                        <?php esc_html_e('Search products', 'dawp'); ?>
                    </label>
                    <input id="house-shoes-footer-search"
                           type="search"
                           name="s"
                           placeholder="<?php esc_attr_e('Search footwear', 'dawp'); ?>"
                           class="min-h-10 w-full bg-transparent px-4 text-sm text-[#141217] placeholder:text-[#6F625D] outline-none">
                    <button type="submit"
                            class="min-h-10 shrink-0 rounded-full bg-[#E6007E] px-5 text-xs font-black uppercase tracking-wide text-white transition hover:bg-[#FF4FB8]">
                        <?php esc_html_e('Search', 'dawp'); ?>
                    </button>
                </form>
            </div>

            <div class="grid grid-cols-1 gap-10 sm:grid-cols-3 lg:gap-12">
                <nav aria-label="<?php esc_attr_e('Footer shop navigation', 'dawp'); ?>">
                    <h3 class="mb-5 text-sm font-black uppercase tracking-[0.18em] text-[#FF4FB8]">
                        <?php esc_html_e('Shop', 'dawp'); ?>
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

                <nav aria-label="<?php esc_attr_e('Footer policy navigation', 'dawp'); ?>">
                    <h3 class="mb-5 text-sm font-black uppercase tracking-[0.18em] text-[#FF4FB8]">
                        <?php esc_html_e('Policy', 'dawp'); ?>
                    </h3>

                    <ul class="space-y-3">
                        <?php foreach ($footer_policy_links as $link) : ?>
                            <li>
                                <a href="<?php echo esc_url($link['url']); ?>"
                                   class="text-sm font-bold text-white/72 transition hover:text-white">
                                    <?php echo esc_html($link['title']); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>

                <nav aria-label="<?php esc_attr_e('Footer brand navigation', 'dawp'); ?>">
                    <h3 class="mb-5 text-sm font-black uppercase tracking-[0.18em] text-[#FF4FB8]">
                        <?php esc_html_e('Brand', 'dawp'); ?>
                    </h3>

                    <ul class="space-y-3">
                        <?php foreach ($footer_brand_links as $link) : ?>
                            <li>
                                <a href="<?php echo esc_url($link['url']); ?>"
                                   class="text-sm font-bold text-white/72 transition hover:text-white">
                                    <?php echo esc_html($link['title']); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </section>

    <div class="border-t border-white/10">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-4 px-4 py-6 text-sm text-white/60 sm:px-6 lg:grid-cols-[1fr_auto_1fr] lg:items-center lg:gap-8 lg:px-8">
            <p class="lg:justify-self-start">
                &copy; <?php echo esc_html($current_year); ?> <?php esc_html_e('House of Shoes Online. All rights reserved.', 'dawp'); ?>
            </p>

            <div class="flex flex-col gap-2 lg:items-center lg:justify-self-center">
                <p class="text-xs font-black uppercase tracking-[0.18em] text-white/40">
                    <?php esc_html_e('Payment Methods', 'dawp'); ?>
                </p>
                <img <?php echo dawp_i0_img_attrs(get_template_directory_uri() . '/assets/img/payment-methods.webp', [
                         'width'  => 520,
                         'height' => 76,
                         'srcset' => [[260, 38], [390, 57], [520, 76]],
                         'sizes'  => '(max-width: 640px) 260px, 260px',
                     ]); ?>
                     alt="<?php esc_attr_e('Accepted payment methods: Visa, Mastercard, Discover, American Express, PayPal', 'dawp'); ?>"
                     class="h-auto w-[260px] max-w-full opacity-95">
            </div>

            <p class="font-black uppercase tracking-[0.18em] text-[#FF4FB8] lg:justify-self-end lg:text-right">
                <?php esc_html_e('Comfort, style, and confident steps', 'dawp'); ?>
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
