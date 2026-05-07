</div><!-- #content -->

<?php $footer_cols = dawp_footer_columns(); ?>

<footer id="colophon" class="bg-[#C98A8A] text-white" role="contentinfo">

    <div class="max-w-[1280px] mx-auto px-4 lg:px-6 py-12 lg:py-16 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">

        <div class="sm:col-span-2 lg:col-span-1">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-block mb-4">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo.jpg'); ?>"
                     alt="Shopkelli"
                     class="h-16 w-auto"
                     loading="lazy">
            </a>

            <p class="text-sm text-white leading-relaxed mb-5">
                <?php bloginfo('description'); ?>
            </p>

            <ul class="space-y-2.5 text-sm text-white/90 mb-6">


                <li>
                    <a href="mailto:support@shopkelli.com" class="flex items-start gap-2 hover:text-white transition-colors">
                        <svg class="shrink-0 mt-0.5" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                        support@shopkelli.com
                    </a>
                </li>

                <li class="flex items-start gap-2">
                    <svg class="shrink-0 mt-0.5" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
                        <circle cx="12" cy="10" r="3"/>
                    </svg>
                    1777 Canal St, Merced, CA, United States, California
                </li>


            </ul>

            <div class="flex items-center gap-3">
                <a href="https://www.facebook.com/shopkelli/"
                   target="_blank"
                   rel="noopener noreferrer"
                   style="background: linear-gradient(45deg, #0866FF 0%, #1877F2 50%, #4267B2 100%);"
                   class="w-10 h-10 flex items-center justify-center rounded-lg bg-[#1877F2] text-white shadow-md hover:scale-110 hover:shadow-lg transition-all duration-200"
                   aria-label="Facebook">

                    <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor" aria-hidden="true">
                        <path d="M24 12c0-6.627-5.373-12-12-12S0 5.373 0 12c0 5.99 4.388 10.954 10.125 11.854V15.47H7.078V12h3.047V9.356c0-3.007 1.792-4.668 4.533-4.668 1.312 0 2.686.234 2.686.234v2.953H15.83c-1.491 0-1.956.925-1.956 1.874V12h3.328l-.532 3.47h-2.796v8.385C19.612 22.954 24 17.99 24 12z"/>
                    </svg>
                </a>

                <a href="https://www.instagram.com/kelli_shop/"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="w-10 h-10 flex items-center justify-center rounded-lg text-white shadow-md hover:scale-110 hover:shadow-lg transition-all duration-200"
                   style="background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);"
                   aria-label="Instagram">

                    <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor" aria-hidden="true">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                </a>
            </div>
        </div>
        <?php foreach (dawp_footer_columns() as $col) : ?>
            <div>
                <h4 class="text-sm font-semibold uppercase tracking-wider text-white mb-5">
                    <?php echo esc_html($col['title']); ?>
                </h4>
                <ul class="space-y-3">
                    <?php foreach ($col['links'] as $link) : ?>
                    <li>
                        <a href="<?php echo esc_url($link['url']); ?>"
                           class="text-sm text-white/90 hover:text-white transition-colors">
                            <?php echo esc_html($link['title']); ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endforeach; ?>

        <div>

            <h4 class="text-sm font-semibold uppercase tracking-wider text-white mb-5">
                <?php esc_html_e('Stay in the Loop', 'dawp'); ?>
            </h4>

            <p class="text-sm text-white leading-relaxed mb-4">
                <?php esc_html_e('Get new arrivals, seasonal boutique styles, and family-friendly outfit inspiration straight to your inbox.', 'dawp'); ?>
            </p>

            <form class="flex gap-2" action="#" method="post">

                <label for="footer-email" class="sr-only">
                    <?php esc_html_e('Email address', 'dawp'); ?>
                </label>

                <input id="footer-email"
                       type="email"
                       name="email"
                       placeholder="<?php esc_attr_e('your@email.com', 'dawp'); ?>"
                       required
                       class="flex-1 min-w-0 px-3 py-2.5 text-sm rounded-md bg-white/25 border border-white/40 text-white placeholder:text-white/85 focus:outline-none focus:border-white transition-colors">

                <button type="submit"
                        class="shrink-0 px-4 py-2.5 text-sm font-semibold rounded-md bg-white text-[#C98A8A] hover:bg-white/90 transition-colors min-h-[44px]">

                    <?php esc_html_e('Join', 'dawp'); ?>

                </button>

            </form>

            <ul class="mt-6 space-y-2 text-xs text-white/85">

                <li class="flex items-center gap-2">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>

                    <?php esc_html_e('Free Shipping on All Orders', 'dawp'); ?>
                </li>

                <li class="flex items-center gap-2">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true">
                        <polyline points="15 3 21 3 21 9"/>
                        <path d="M10 14L21 3"/>
                        <path d="M21 16v5a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h5"/>
                    </svg>

                    <?php esc_html_e('30-Day Returns', 'dawp'); ?>
                </li>

                <li class="flex items-center gap-2">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                        <path d="M7 11V7a5 5 0 0110 0v4"/>
                    </svg>

                    <?php esc_html_e('Secure Checkout', 'dawp'); ?>
                </li>

            </ul>

            <div class="mt-5 flex items-center gap-2 flex-wrap">

                <span class="text-xs text-white/85 mr-1">
                    <?php esc_html_e('We accept', 'dawp'); ?>
                </span>

                <span class="inline-flex items-center justify-center px-2 h-6 rounded bg-white/25 text-[10px] font-bold text-white tracking-wider">
                    VISA
                </span>

                <span class="inline-flex items-center justify-center px-2 h-6 rounded bg-white/25 gap-0.5">
                    <span class="w-4 h-4 rounded-full bg-red-500 opacity-90"></span>
                    <span class="w-4 h-4 rounded-full bg-yellow-400 opacity-90 -ml-2"></span>
                </span>

                <span class="inline-flex items-center justify-center px-2 h-6 rounded bg-white/25 text-[10px] font-bold text-white">
                    PayPal
                </span>

                <span class="inline-flex items-center justify-center px-2 h-6 rounded bg-white/25 text-[10px] font-bold text-white tracking-wider">
                    AMEX
                </span>

            </div>

        </div>

    </div>

    <div class="border-t border-white/20">

        <div class="max-w-[1280px] mx-auto px-4 lg:px-6 py-4 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-white/85">

            <p>
                &copy; <?php echo esc_html(date('Y')); ?>
                Shopkelli.
                <?php esc_html_e('All rights reserved.', 'dawp'); ?>
            </p>

            <ul class="flex items-center gap-4">

                <li>
                    <a href="<?php echo esc_url(home_url('/terms-conditions/')); ?>"
                       class="hover:text-white transition-colors">

                        <?php esc_html_e('Terms', 'dawp'); ?>

                    </a>
                </li>

                <li>
                    <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>"
                       class="hover:text-white transition-colors">

                        <?php esc_html_e('Privacy', 'dawp'); ?>

                    </a>
                </li>

                <li>
                    <a href="<?php echo esc_url(home_url('/shipping-returns/')); ?>"
                       class="hover:text-white transition-colors">

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