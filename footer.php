</div><!-- #content -->

<?php $footer_cols = dawp_footer_columns(); ?>

<footer id="colophon" class="bg-[#2B2B2B] text-white" role="contentinfo">

    <div class="max-w-[1280px] mx-auto px-4 lg:px-6 py-12 lg:py-16 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">

        <div class="sm:col-span-2 lg:col-span-1">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-block mb-5">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/shopshive-logo-footer.svg'); ?>"
                     alt="Shopshive"
                     class="h-14 w-auto"
                     loading="lazy">
            </a>

            <p class="text-sm text-white/55 leading-relaxed mb-5" style="font-family:'DM Sans',sans-serif">
                <?php bloginfo('description'); ?>
            </p>

            <ul class="space-y-3 text-sm text-white/60 mb-6" style="font-family:'DM Sans',sans-serif">

                <li>
                    <a href="tel:+17603830494" class="flex items-start gap-2.5 hover:text-[#F2A8BC] transition-colors">
                        <svg class="shrink-0 mt-0.5" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                            <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 10.8 19.79 19.79 0 01.12 2.2 2 2 0 012.11 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.91 7.09a16 16 0 006 6l.46-.46a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/>
                        </svg>
                        +1 (760) 383 0494
                    </a>
                </li>

                <li>
                    <a href="mailto:support@shopshive.com" class="flex items-start gap-2.5 hover:text-[#F2A8BC] transition-colors">
                        <svg class="shrink-0 mt-0.5" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                        support@shopshive.com
                    </a>
                </li>

                <li class="flex items-start gap-2.5">
                    <svg class="shrink-0 mt-0.5" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
                        <circle cx="12" cy="10" r="3"/>
                    </svg>
                    1777 Canal St, Merced, CA 95340
                </li>

                <li class="flex items-start gap-2.5 text-white/40">
                    <svg class="shrink-0 mt-0.5" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                        <circle cx="12" cy="12" r="10"/>
                        <polyline points="12 6 12 12 16 14"/>
                    </svg>
                    Mon–Sat, 10:00 AM – 6:00 PM PST
                </li>

            </ul>

            <div class="flex items-center gap-2.5">
                <a href="https://www.facebook.com/shopshivedotcom"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="w-9 h-9 flex items-center justify-center rounded-lg bg-white/10 text-white/60 hover:bg-[#E8567A] hover:text-white transition-all duration-200"
                   aria-label="Facebook">
                    <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor" aria-hidden="true">
                        <path d="M24 12c0-6.627-5.373-12-12-12S0 5.373 0 12c0 5.99 4.388 10.954 10.125 11.854V15.47H7.078V12h3.047V9.356c0-3.007 1.792-4.668 4.533-4.668 1.312 0 2.686.234 2.686.234v2.953H15.83c-1.491 0-1.956.925-1.956 1.874V12h3.328l-.532 3.47h-2.796v8.385C19.612 22.954 24 17.99 24 12z"/>
                    </svg>
                </a>

                <a href="https://www.pinterest.com/galgirlus/"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="w-9 h-9 flex items-center justify-center rounded-lg bg-white/10 text-white/60 hover:bg-[#E8567A] hover:text-white transition-all duration-200"
                   aria-label="Pinterest">
                    <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor" aria-hidden="true">
                        <path d="M12 0C5.373 0 0 5.373 0 12c0 5.084 3.163 9.426 7.627 11.174-.105-.949-.2-2.405.042-3.441.218-.937 1.407-5.965 1.407-5.965s-.359-.719-.359-1.782c0-1.668.967-2.914 2.171-2.914 1.023 0 1.518.769 1.518 1.69 0 1.029-.655 2.568-.994 3.995-.283 1.194.599 2.169 1.777 2.169 2.133 0 3.772-2.249 3.772-5.495 0-2.873-2.064-4.882-5.012-4.882-3.414 0-5.418 2.561-5.418 5.207 0 1.031.397 2.138.893 2.738a.36.36 0 01.083.345l-.333 1.36c-.053.22-.174.267-.402.161-1.499-.698-2.436-2.889-2.436-4.649 0-3.785 2.75-7.262 7.929-7.262 4.163 0 7.398 2.967 7.398 6.931 0 4.136-2.607 7.464-6.227 7.464-1.216 0-2.359-.632-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0z"/>
                    </svg>
                </a>
            </div>
        </div>

        <?php foreach (dawp_footer_columns() as $col) : ?>
            <div>
                <h4 class="text-[11px] font-semibold uppercase tracking-[0.12em] text-[#E8567A] mb-5" style="font-family:'DM Sans',sans-serif">
                    <?php echo esc_html($col['title']); ?>
                </h4>
                <ul class="space-y-3">
                    <?php foreach ($col['links'] as $link) : ?>
                    <li>
                        <a href="<?php echo esc_url($link['url']); ?>"
                           class="text-sm text-white/55 hover:text-[#F2A8BC] transition-colors"
                           style="font-family:'DM Sans',sans-serif">
                            <?php echo esc_html($link['title']); ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endforeach; ?>

        <div>

            <h4 class="text-[11px] font-semibold uppercase tracking-[0.12em] text-[#E8567A] mb-5" style="font-family:'DM Sans',sans-serif">
                <?php esc_html_e('Stay in the Loop', 'dawp'); ?>
            </h4>

            <p class="text-sm text-white/55 leading-relaxed mb-4" style="font-family:'DM Sans',sans-serif">
                <?php esc_html_e('Get new arrivals, seasonal styles, and fashion inspiration straight to your inbox.', 'dawp'); ?>
            </p>

            <div id="contact-form-2" class="flex gap-2 contact-form-2">
                <?php echo do_shortcode('[contact-form-7 id="30148ed" title="Email"]'); ?>
            </div>

            <ul class="mt-6 space-y-2.5 text-xs text-white/45" style="font-family:'DM Sans',sans-serif">

                <li class="flex items-center gap-2">
                    <span class="w-1 h-1 rounded-full bg-[#E8567A] shrink-0"></span>
                    <?php esc_html_e('Free Shipping on All Orders', 'dawp'); ?>
                </li>

                <li class="flex items-center gap-2">
                    <span class="w-1 h-1 rounded-full bg-[#E8567A] shrink-0"></span>
                    <?php esc_html_e('30-Day Returns', 'dawp'); ?>
                </li>

                <li class="flex items-center gap-2">
                    <span class="w-1 h-1 rounded-full bg-[#E8567A] shrink-0"></span>
                    <?php esc_html_e('Secure Checkout', 'dawp'); ?>
                </li>

            </ul>

            <div class="mt-5 flex items-center gap-2 flex-wrap">

                <span class="text-xs text-white/35 mr-1" style="font-family:'DM Sans',sans-serif">
                    <?php esc_html_e('We accept', 'dawp'); ?>
                </span>

                <span class="inline-flex items-center justify-center px-2 h-6 rounded bg-white/10 text-[10px] font-bold text-white/65 tracking-wider">
                    VISA
                </span>

                <span class="inline-flex items-center justify-center px-2 h-6 rounded bg-white/10 gap-0.5">
                    <span class="w-4 h-4 rounded-full bg-red-500 opacity-75"></span>
                    <span class="w-4 h-4 rounded-full bg-yellow-400 opacity-75 -ml-2"></span>
                </span>

                <span class="inline-flex items-center justify-center px-2 h-6 rounded bg-white/10 text-[10px] font-bold text-white/65">
                    PayPal
                </span>

                <span class="inline-flex items-center justify-center px-2 h-6 rounded bg-white/10 text-[10px] font-bold text-white/65 tracking-wider">
                    AMEX
                </span>

            </div>

        </div>

    </div>

    <div class="border-t border-white/10">

        <div class="max-w-[1280px] mx-auto px-4 lg:px-6 py-4 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-white/35" style="font-family:'DM Sans',sans-serif">

            <p>
                &copy; <?php echo esc_html(date('Y')); ?>
                Shopshive.
                <?php esc_html_e('All rights reserved.', 'dawp'); ?>
            </p>

            <ul class="flex items-center gap-4">

                <li>
                    <a href="<?php echo esc_url(home_url('/terms-conditions/')); ?>"
                       class="hover:text-[#F2A8BC] transition-colors">
                        <?php esc_html_e('Terms', 'dawp'); ?>
                    </a>
                </li>

                <li>
                    <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>"
                       class="hover:text-[#F2A8BC] transition-colors">
                        <?php esc_html_e('Privacy', 'dawp'); ?>
                    </a>
                </li>

                <li>
                    <a href="<?php echo esc_url(home_url('/shipping-returns/')); ?>"
                       class="hover:text-[#F2A8BC] transition-colors">
                        <?php esc_html_e('Shipping', 'dawp'); ?>
                    </a>
                </li>

            </ul>

        </div>

    </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>
