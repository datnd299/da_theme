    </div><!-- #content -->

<?php $footer_cols = dawp_footer_columns(); ?>

<footer id="colophon" class="bg-[var(--color-navy)] text-white" role="contentinfo">

    <!-- Main grid -->
    <div class="max-w-[1280px] mx-auto px-4 lg:px-6 py-12 lg:py-16 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">

        <!-- Brand + Contact -->
        <div class="sm:col-span-2 lg:col-span-1">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-block mb-4">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo.png'); ?>"
                     alt="<?php bloginfo('name'); ?>"
                     class="h-8 w-auto"
                     loading="lazy">
            </a>
            <p class="text-sm text-white/60 leading-relaxed mb-5">
                <?php bloginfo('description'); ?>
            </p>

            <!-- Contact -->
            <ul class="space-y-2.5 text-sm text-white/60 mb-6">
                <li>
                    <a href="tel:4072551197"
                       class="flex items-start gap-2 hover:text-white transition-colors">
                        <svg class="shrink-0 mt-0.5" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                            <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.68A2 2 0 012 1h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L6.09 8.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z"/>
                        </svg>
                        407-255-1197
                    </a>
                </li>
                <li>
                    <a href="mailto:support@eliteshopexpress.com"
                       class="flex items-start gap-2 hover:text-white transition-colors">
                        <svg class="shrink-0 mt-0.5" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>
                        </svg>
                        support@eliteshopexpress.com
                    </a>
                </li>
                <li class="flex items-start gap-2">
                    <svg class="shrink-0 mt-0.5" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/>
                    </svg>
                    3589 South Orange Ave, Orlando, FL 32806
                </li>
                <li class="flex items-start gap-2">
                    <svg class="shrink-0 mt-0.5" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                        <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
                    </svg>
                    Mon–Fri, 9AM–6PM CST
                </li>
            </ul>

            <!-- Social -->
            <div class="flex items-center gap-3">
                <a href="https://www.facebook.com/eliteshopexpress/"
                   target="_blank" rel="noopener noreferrer"
                   class="w-9 h-9 flex items-center justify-center rounded-md border border-white/20 text-white/60 hover:border-white/60 hover:text-white transition-colors"
                   aria-label="Facebook">
                    <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor" aria-hidden="true">
                        <path d="M24 12c0-6.627-5.373-12-12-12S0 5.373 0 12c0 5.99 4.388 10.954 10.125 11.854V15.47H7.078V12h3.047V9.356c0-3.007 1.792-4.668 4.533-4.668 1.312 0 2.686.234 2.686.234v2.953H15.83c-1.491 0-1.956.925-1.956 1.874V12h3.328l-.532 3.47h-2.796v8.385C19.612 22.954 24 17.99 24 12z"/>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Dynamic columns -->
        <?php foreach ($footer_cols as $col) : ?>
        <div>
            <h4 class="text-sm font-semibold uppercase tracking-wider text-white mb-5">
                <?php echo esc_html($col['title']); ?>
            </h4>
            <ul class="space-y-3">
                <?php foreach ($col['links'] as $link) : ?>
                <li>
                    <a href="<?php echo esc_url($link['url']); ?>"
                       class="text-sm text-white/60 hover:text-white transition-colors">
                        <?php echo esc_html($link['title']); ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endforeach; ?>

        <!-- Newsletter -->
        <div>
            <h4 class="text-sm font-semibold uppercase tracking-wider text-white mb-5">
                <?php esc_html_e('Stay in the Loop', 'dawp'); ?>
            </h4>
            <p class="text-sm text-white/60 leading-relaxed mb-4">
                <?php esc_html_e('Get exclusive deals and new arrivals straight to your inbox.', 'dawp'); ?>
            </p>
            <form class="flex gap-2" action="#" method="post">
                <label for="footer-email" class="sr-only">
                    <?php esc_html_e('Email address', 'dawp'); ?>
                </label>
                <input id="footer-email" type="email" name="email"
                       placeholder="<?php esc_attr_e('your@email.com', 'dawp'); ?>"
                       required
                       class="flex-1 min-w-0 px-3 py-2.5 text-sm rounded-md bg-white/10 border border-white/20 text-white placeholder:text-white/40 focus:outline-none focus:border-white/50 transition-colors">
                <button type="submit"
                        class="shrink-0 px-4 py-2.5 text-sm font-semibold rounded-md bg-accent text-white hover:bg-[--color-accent-hover] transition-colors min-h-[44px]">
                    <?php esc_html_e('Join', 'dawp'); ?>
                </button>
            </form>

            <!-- Trust signals -->
            <ul class="mt-6 space-y-2 text-xs text-white/50">
                <li class="flex items-center gap-2">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                    <?php esc_html_e('Free Shipping on All Orders', 'dawp'); ?>
                </li>
                <li class="flex items-center gap-2">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true">
                        <polyline points="15 3 21 3 21 9"/><path d="M10 14L21 3"/><path d="M21 16v5a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h5"/>
                    </svg>
                    <?php esc_html_e('30-Day Returns', 'dawp'); ?>
                </li>
                <li class="flex items-center gap-2">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0110 0v4"/>
                    </svg>
                    <?php esc_html_e('Secure Checkout', 'dawp'); ?>
                </li>
            </ul>

            <!-- Payment badges -->
            <div class="mt-5 flex items-center gap-2 flex-wrap">
                <span class="text-xs text-white/40 mr-1">
                    <?php esc_html_e('We accept', 'dawp'); ?>
                </span>
                <span class="inline-flex items-center justify-center px-2 h-6 rounded bg-white/10 text-[10px] font-bold text-white/70 tracking-wider" aria-label="Visa">VISA</span>
                <span class="inline-flex items-center justify-center px-2 h-6 rounded bg-white/10 gap-0.5" aria-label="Mastercard">
                    <span class="w-4 h-4 rounded-full bg-red-500 opacity-80"></span>
                    <span class="w-4 h-4 rounded-full bg-yellow-400 opacity-80 -ml-2"></span>
                </span>
                <span class="inline-flex items-center justify-center px-2 h-6 rounded bg-white/10 text-[10px] font-bold text-white/70" aria-label="PayPal">PayPal</span>
                <span class="inline-flex items-center justify-center px-2 h-6 rounded bg-white/10 text-[10px] font-bold text-white/70 tracking-wider" aria-label="Amex">AMEX</span>
            </div>
        </div>

    </div>

    <!-- Bottom bar -->
    <div class="border-t border-white/10">
        <div class="max-w-[1280px] mx-auto px-4 lg:px-6 py-4 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-white/40">
            <p>
                &copy; <?php echo esc_html(date('Y')); ?> <?php bloginfo('name'); ?>.
                <?php esc_html_e('All rights reserved.', 'dawp'); ?>
            </p>
            <ul class="flex items-center gap-4">
                <li><a href="<?php echo esc_url(home_url('/terms-conditions/')); ?>"
                       class="hover:text-white/70 transition-colors">
                    <?php esc_html_e('Terms', 'dawp'); ?>
                </a></li>
                <li><a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>"
                       class="hover:text-white/70 transition-colors">
                    <?php esc_html_e('Privacy', 'dawp'); ?>
                </a></li>
                <li><a href="<?php echo esc_url(home_url('/shipping-returns/')); ?>"
                       class="hover:text-white/70 transition-colors">
                    <?php esc_html_e('Shipping', 'dawp'); ?>
                </a></li>
            </ul>
        </div>
    </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>
