</div><!-- #content -->

<footer id="colophon" class="bg-[#0B0B0D] text-white" role="contentinfo">
    <div class="border-y border-white/10 bg-[#1A1A1D]">
        <div class="mx-auto grid max-w-7xl gap-6 px-5 py-8 sm:grid-cols-3 sm:px-8 lg:px-10">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.18em] text-white/85"><?php esc_html_e('Secure Checkout', 'dawp'); ?></p>
                <p class="mt-2 text-sm leading-6 text-white/70"><?php esc_html_e('Clear payment flow for confident ordering.', 'dawp'); ?></p>
            </div>
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.18em] text-white/85"><?php esc_html_e('Tracking Included', 'dawp'); ?></p>
                <p class="mt-2 text-sm leading-6 text-white/70"><?php esc_html_e('Order tracking is provided after dispatch.', 'dawp'); ?></p>
            </div>
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.18em] text-white/85"><?php esc_html_e('30-Day Returns', 'dawp'); ?></p>
                <p class="mt-2 text-sm leading-6 text-white/70"><?php esc_html_e('Eligible unworn footwear may be returned.', 'dawp'); ?></p>
            </div>
        </div>
    </div>

    <div class="mx-auto grid max-w-7xl gap-10 px-5 py-12 sm:px-8 md:grid-cols-2 lg:grid-cols-[1.4fr_1fr_1fr_1fr] lg:px-10 lg:py-16">
        <div>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center" aria-label="<?php esc_attr_e('Handed Shoes Home', 'dawp'); ?>">
                <img
                    loading="lazy"
                    decoding="async"
                    width="128"
                    height="128"
                    src="<?php echo esc_url(dawp_theme_image_url('assets/img/gallery/logo.png', 128, 128, 'fit')); ?>"
                    alt="<?php esc_attr_e('Handed Shoes', 'dawp'); ?>"
                    srcset="<?php echo esc_attr(dawp_theme_image_srcset('assets/img/gallery/logo.png', 955, 955, [64, 96, 128, 192])); ?>"
                    sizes="64px"
                    class="h-16 w-16 rounded-full object-contain"
                >
            </a>
            <div class="mt-5 space-y-4 text-sm text-white/72">
                <a class="flex items-start gap-3 transition-colors hover:text-white" href="mailto:support@handedshoes.com">
                    <svg class="mt-1 h-4 w-4 flex-shrink-0 text-white/55" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M4 6h16v12H4z"></path>
                        <path d="m4 7 8 6 8-6"></path>
                    </svg>
                    <span>support@handedshoes.com</span>
                </a>
                <p class="flex items-start gap-3 leading-6">
                    <svg class="mt-1 h-4 w-4 flex-shrink-0 text-white/55" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M12 21s7-5.2 7-11a7 7 0 0 0-14 0c0 5.8 7 11 7 11Z"></path>
                        <circle cx="12" cy="10" r="2.5"></circle>
                    </svg>
                    <span><?php echo esc_html(function_exists('dawp_get_store_address') ? dawp_get_store_address() : ''); ?></span>
                </p>
                <p class="flex items-start gap-3 leading-6">
                    <svg class="mt-1 h-4 w-4 flex-shrink-0 text-white/55" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="12" cy="12" r="9"></circle>
                        <path d="M12 7v5l3 2"></path>
                    </svg>
                    <span><?php esc_html_e('Business Hours: Monday-Friday, 9:00 AM-5:00 PM PST.', 'dawp'); ?></span>
                </p>
                <a
                    class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-white/15 text-white/75 transition-colors hover:border-white/30 hover:bg-white/10 hover:text-white"
                    href="https://www.facebook.com/handedfootwear/"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="<?php esc_attr_e('Facebook', 'dawp'); ?>"
                >
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M22 12.06C22 6.5 17.52 2 12 2S2 6.5 2 12.06c0 5.02 3.66 9.18 8.44 9.94v-7.03H7.9v-2.91h2.54V9.85c0-2.52 1.49-3.91 3.77-3.91 1.09 0 2.23.2 2.23.2V8.6h-1.26c-1.24 0-1.63.78-1.63 1.57v1.89h2.78l-.44 2.91h-2.34V22C18.34 21.24 22 17.08 22 12.06Z"></path>
                    </svg>
                </a>
            </div>
        </div>

        <div>
            <h2 class="text-xs font-bold uppercase tracking-[0.18em] text-white/85"><?php esc_html_e('Shop', 'dawp'); ?></h2>
            <ul class="mt-5 space-y-3 text-sm text-white/72">
                <li><a class="transition-colors hover:text-white" href="<?php echo esc_url(home_url('/shop/')); ?>"><?php esc_html_e('Shop All', 'dawp'); ?></a></li>
                <li><a class="transition-colors hover:text-white" href="<?php echo esc_url(home_url('/product-category/oxford-shoes/')); ?>"><?php esc_html_e('Oxford Shoes', 'dawp'); ?></a></li>
                <li><a class="transition-colors hover:text-white" href="<?php echo esc_url(home_url('/product-category/brogue-shoes/')); ?>"><?php esc_html_e('Brogue Shoes', 'dawp'); ?></a></li>
                <li><a class="transition-colors hover:text-white" href="<?php echo esc_url(home_url('/product-category/loafers/')); ?>"><?php esc_html_e('Loafers', 'dawp'); ?></a></li>
                <li><a class="transition-colors hover:text-white" href="<?php echo esc_url(home_url('/product-category/monk-strap-shoes/')); ?>"><?php esc_html_e('Monk Strap Shoes', 'dawp'); ?></a></li>
            </ul>
        </div>

        <div>
            <h2 class="text-xs font-bold uppercase tracking-[0.18em] text-white/85"><?php esc_html_e('Support', 'dawp'); ?></h2>
            <ul class="mt-5 space-y-3 text-sm text-white/72">
                <li><a class="transition-colors hover:text-white" href="<?php echo esc_url(home_url('/about-us/')); ?>"><?php esc_html_e('About Us', 'dawp'); ?></a></li>
                <li><a class="transition-colors hover:text-white" href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact Us', 'dawp'); ?></a></li>
                <li><a class="transition-colors hover:text-white" href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a></li>
                <li><a class="transition-colors hover:text-white" href="<?php echo esc_url(function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/')); ?>"><?php esc_html_e('My Account', 'dawp'); ?></a></li>
            </ul>
        </div>

        <div>
            <h2 class="text-xs font-bold uppercase tracking-[0.18em] text-white/85"><?php esc_html_e('Customer Care', 'dawp'); ?></h2>
            <ul class="mt-5 space-y-3 text-sm text-white/72">
                <li><a class="transition-colors hover:text-white" href="<?php echo esc_url(home_url('/faq/')); ?>"><?php esc_html_e('FAQs', 'dawp'); ?></a></li>
                <li><a class="transition-colors hover:text-white" href="<?php echo esc_url(home_url('/shipping-policy/')); ?>"><?php esc_html_e('Shipping Policy', 'dawp'); ?></a></li>
                <li><a class="transition-colors hover:text-white" href="<?php echo esc_url(home_url('/refund-return-policy/')); ?>"><?php esc_html_e('Refund & Return Policy', 'dawp'); ?></a></li>
                <li><a class="transition-colors hover:text-white" href="<?php echo esc_url(home_url('/privacy-policy/')); ?>"><?php esc_html_e('Privacy Policy', 'dawp'); ?></a></li>
                <li><a class="transition-colors hover:text-white" href="<?php echo esc_url(home_url('/terms-conditions/')); ?>"><?php esc_html_e('Terms & Conditions', 'dawp'); ?></a></li>
            </ul>
        </div>
    </div>

    <div class="border-t border-white/10">
        <div class="mx-auto flex max-w-7xl flex-col items-center justify-between gap-5 px-5 py-5 text-xs text-white/60 md:flex-row sm:px-8 lg:px-10">
            <p>&copy; <?php echo esc_html(date('Y')); ?> <?php esc_html_e('Handed Shoes. All rights reserved.', 'dawp'); ?></p>
            <div class="flex flex-wrap items-center justify-center gap-2" aria-label="<?php esc_attr_e('Accepted payment methods', 'dawp'); ?>">
                <?php echo dawp_responsive_theme_image('assets/img/gallery/Payment/image.png', esc_attr__('Payment method', 'dawp'), 320, 104, [
                    'src_width' => 160,
                    'widths' => [96, 160, 320],
                    'sizes' => '96px',
                    'class' => 'h-8 w-auto rounded bg-white px-2 py-1',
                ]); ?>
                <?php echo dawp_responsive_theme_image('assets/img/gallery/Payment/image copy.png', esc_attr__('Payment method', 'dawp'), 320, 104, [
                    'src_width' => 160,
                    'widths' => [96, 160, 320],
                    'sizes' => '96px',
                    'class' => 'h-8 w-auto rounded bg-white px-2 py-1',
                ]); ?>
                <?php echo dawp_responsive_theme_image('assets/img/gallery/Payment/image copy 2.png', esc_attr__('Payment method', 'dawp'), 320, 104, [
                    'src_width' => 160,
                    'widths' => [96, 160, 320],
                    'sizes' => '96px',
                    'class' => 'h-8 w-auto rounded bg-white px-2 py-1',
                ]); ?>
                <?php echo dawp_responsive_theme_image('assets/img/gallery/Payment/image copy 3.png', esc_attr__('Payment method', 'dawp'), 320, 104, [
                    'src_width' => 160,
                    'widths' => [96, 160, 320],
                    'sizes' => '96px',
                    'class' => 'h-8 w-auto rounded bg-white px-2 py-1',
                ]); ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
