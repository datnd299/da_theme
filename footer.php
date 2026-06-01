</div><!-- #content -->

<footer id="colophon" class="bg-[#111111] text-[#F5EFE6]" role="contentinfo">
    <div class="border-b border-white/10 bg-[#3B2416]">
        <div class="max-w-[1280px] mx-auto px-4 lg:px-6 py-8 grid grid-cols-1 md:grid-cols-3 gap-5">
            <div class="flex items-start gap-3">
                <span class="mt-1 h-2.5 w-2.5 rounded-full bg-[#C8A45D] shrink-0"></span>
                <div>
                    <h3 class="text-sm font-extrabold uppercase tracking-[0.12em] text-white"><?php esc_html_e('Formal Focus', 'dawp'); ?></h3>
                    <p class="mt-2 text-sm leading-6 text-[#F5EFE6]/75"><?php esc_html_e('Formal shoes, leather dress shoes, and brogue shoes for polished outfits.', 'dawp'); ?></p>
                </div>
            </div>
            <div class="flex items-start gap-3">
                <span class="mt-1 h-2.5 w-2.5 rounded-full bg-[#C8A45D] shrink-0"></span>
                <div>
                    <h3 class="text-sm font-extrabold uppercase tracking-[0.12em] text-white"><?php esc_html_e('Clear Support', 'dawp'); ?></h3>
                    <p class="mt-2 text-sm leading-6 text-[#F5EFE6]/75"><?php esc_html_e('Size guidance, fit notes, care details, and transparent return conditions.', 'dawp'); ?></p>
                </div>
            </div>
            <div class="flex items-start gap-3">
                <span class="mt-1 h-2.5 w-2.5 rounded-full bg-[#C8A45D] shrink-0"></span>
                <div>
                    <h3 class="text-sm font-extrabold uppercase tracking-[0.12em] text-white"><?php esc_html_e('Secure Checkout', 'dawp'); ?></h3>
                    <p class="mt-2 text-sm leading-6 text-[#F5EFE6]/75"><?php esc_html_e('Tracking included, customer support available, and 30-day eligible returns.', 'dawp'); ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-[1280px] mx-auto px-4 lg:px-6 py-12 lg:py-16 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-10">
        <div class="sm:col-span-2">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex h-12 w-40 overflow-hidden rounded-sm text-white mb-6" aria-label="<?php esc_attr_e('Broge Shoes Home', 'dawp'); ?>">
                <?php
                echo dawp_responsive_theme_image('Logo.png', __('Broge Shoes', 'dawp'), [
                    'class' => 'h-full w-full scale-125 object-cover object-[50%_27%]',
                    'width' => 160,
                    'height' => 93,
                    'src_width' => 320,
                    'widths' => [160, 240, 320],
                    'sizes' => '160px',
                    'loading' => 'lazy',
                ]);
                ?>
            </a>

            <ul class="space-y-3 text-sm text-[#F5EFE6]/80">
                <li>
                    <a href="mailto:support@brogeshoes.com" class="flex items-start gap-2 hover:text-white transition-colors">
                        <svg class="shrink-0 mt-0.5 text-[#C8A45D]" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                        support@brogeshoes.com
                    </a>
                </li>
                <li class="flex items-start gap-2">
                    <svg class="shrink-0 mt-0.5 text-[#C8A45D]" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                        <path d="M20 10c0 4.5-8 11-8 11S4 14.5 4 10a8 8 0 0 1 16 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    <?php echo esc_html(dawp_get_woocommerce_store_address()); ?>
                </li>
                <li class="flex items-start gap-2">
                    <svg class="shrink-0 mt-0.5 text-[#C8A45D]" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                        <circle cx="12" cy="12" r="9"></circle>
                        <path d="M12 7v5l3 2"></path>
                    </svg>
                    <?php esc_html_e('Monday-Friday, 9:00 AM-5:00 PM PST', 'dawp'); ?>
                </li>
            </ul>

            <div class="mt-6 flex items-center gap-3">
                <a href="https://www.facebook.com/brogeshoes/"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="inline-flex h-10 w-10 items-center justify-center rounded-md bg-[#1877F2] text-white shadow-md transition-all duration-200 hover:scale-105 hover:shadow-lg"
                   aria-label="<?php esc_attr_e('Facebook', 'dawp'); ?>">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor" aria-hidden="true">
                        <path d="M24 12c0-6.627-5.373-12-12-12S0 5.373 0 12c0 5.99 4.388 10.954 10.125 11.854V15.47H7.078V12h3.047V9.356c0-3.007 1.792-4.668 4.533-4.668 1.312 0 2.686.234 2.686.234v2.953H15.83c-1.491 0-1.956.925-1.956 1.874V12h3.328l-.532 3.47h-2.796v8.385C19.612 22.954 24 17.99 24 12z"></path>
                    </svg>
                </a>
            </div>
        </div>

        <div>
            <h4 class="text-sm font-extrabold uppercase tracking-[0.14em] text-white mb-5"><?php esc_html_e('Shop', 'dawp'); ?></h4>
            <ul class="space-y-3">
                <li><a href="<?php echo esc_url(home_url('/shop/')); ?>" class="text-sm text-[#F5EFE6]/75 hover:text-white transition-colors"><?php esc_html_e('Shop All', 'dawp'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/product-category/formal-shoes/')); ?>" class="text-sm text-[#F5EFE6]/75 hover:text-white transition-colors"><?php esc_html_e('Formal Shoes', 'dawp'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/product-category/leather-dress-shoes/')); ?>" class="text-sm text-[#F5EFE6]/75 hover:text-white transition-colors"><?php esc_html_e('Leather Dress Shoes', 'dawp'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/product-category/brogue-shoes/')); ?>" class="text-sm text-[#F5EFE6]/75 hover:text-white transition-colors"><?php esc_html_e('Brogue Shoes', 'dawp'); ?></a></li>
            </ul>
        </div>

        <div>
            <h4 class="text-sm font-extrabold uppercase tracking-[0.14em] text-white mb-5"><?php esc_html_e('Customer Care', 'dawp'); ?></h4>
            <ul class="space-y-3">
                <li><a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="text-sm text-[#F5EFE6]/75 hover:text-white transition-colors"><?php esc_html_e('Contact Us', 'dawp'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/about-us/')); ?>" class="text-sm text-[#F5EFE6]/75 hover:text-white transition-colors"><?php esc_html_e('About Us', 'dawp'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/my-account/')); ?>" class="text-sm text-[#F5EFE6]/75 hover:text-white transition-colors"><?php esc_html_e('My Account', 'dawp'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="text-sm text-[#F5EFE6]/75 hover:text-white transition-colors"><?php esc_html_e('Track Order', 'dawp'); ?></a></li>
            </ul>
        </div>

        <div>
            <h4 class="text-sm font-extrabold uppercase tracking-[0.14em] text-white mb-5"><?php esc_html_e('Policies', 'dawp'); ?></h4>
            <ul class="space-y-3">
                <li><a href="<?php echo esc_url(home_url('/faq/')); ?>" class="text-sm text-[#F5EFE6]/75 hover:text-white transition-colors"><?php esc_html_e('FAQ', 'dawp'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>" class="text-sm text-[#F5EFE6]/75 hover:text-white transition-colors"><?php esc_html_e('Shipping Policy', 'dawp'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/refund-return-policy/')); ?>" class="text-sm text-[#F5EFE6]/75 hover:text-white transition-colors"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>" class="text-sm text-[#F5EFE6]/75 hover:text-white transition-colors"><?php esc_html_e('Privacy Policy', 'dawp'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/terms-conditions/')); ?>" class="text-sm text-[#F5EFE6]/75 hover:text-white transition-colors"><?php esc_html_e('Terms of Service', 'dawp'); ?></a></li>
            </ul>
        </div>
    </div>

    <div class="border-t border-white/10">
        <div class="max-w-[1280px] mx-auto px-4 lg:px-6 py-5 flex flex-col md:flex-row items-center justify-between gap-4 text-xs text-[#F5EFE6]/70">
            <p>
                &copy; <?php echo esc_html(date('Y')); ?>
                <?php esc_html_e('Broge Shoes. All rights reserved.', 'dawp'); ?>
            </p>
            <div class="flex items-center gap-2 flex-wrap justify-center">
                <span><?php esc_html_e('We accept', 'dawp'); ?></span>
                <span class="inline-flex items-center justify-center px-2.5 h-6 rounded bg-white/10 text-[10px] font-bold text-white tracking-wider">VISA</span>
                <span class="inline-flex items-center justify-center px-2.5 h-6 rounded bg-white/10 text-[10px] font-bold text-white tracking-wider">MC</span>
                <span class="inline-flex items-center justify-center px-2.5 h-6 rounded bg-white/10 text-[10px] font-bold text-white">PayPal</span>
                <span class="inline-flex items-center justify-center px-2.5 h-6 rounded bg-white/10 text-[10px] font-bold text-white tracking-wider">AMEX</span>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
