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

    <div class="mx-auto grid max-w-7xl gap-10 px-5 py-12 sm:px-8 md:grid-cols-2 lg:grid-cols-4 lg:px-10 lg:py-16">
        <div>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center" aria-label="<?php esc_attr_e('Handed Shoes Home', 'dawp'); ?>">
                <img
                    src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/logo.png'); ?>"
                    alt="<?php esc_attr_e('Handed Shoes', 'dawp'); ?>"
                    class="h-16 w-16 rounded-full object-contain"
                >
            </a>
            <div class="mt-5 space-y-4 text-sm text-white/72">
                <a class="block transition-colors hover:text-white" href="mailto:support@handedshoes.com">support@handedshoes.com</a>
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
                <img class="h-8 w-auto rounded bg-white px-2 py-1" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/Payment/image.png'); ?>" alt="<?php esc_attr_e('Payment method', 'dawp'); ?>">
                <img class="h-8 w-auto rounded bg-white px-2 py-1" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/Payment/image copy.png'); ?>" alt="<?php esc_attr_e('Payment method', 'dawp'); ?>">
                <img class="h-8 w-auto rounded bg-white px-2 py-1" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/Payment/image copy 2.png'); ?>" alt="<?php esc_attr_e('Payment method', 'dawp'); ?>">
                <img class="h-8 w-auto rounded bg-white px-2 py-1" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/Payment/image copy 3.png'); ?>" alt="<?php esc_attr_e('Payment method', 'dawp'); ?>">
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
