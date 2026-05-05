    </div><!-- #content -->

<?php $columns = dawp_footer_columns(); ?>

<footer id="colophon" class="bg-foreground text-background mt-20">

    <!-- Main footer grid -->
    <div class="max-w-screen-xl mx-auto px-4 lg:px-8 py-14 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">

        <!-- Brand column -->
        <div class="sm:col-span-2 lg:col-span-1">
            <a href="<?php echo esc_url(home_url('/')); ?>"
               class="inline-block text-xl font-bold tracking-widest uppercase text-background mb-4">
                <?php bloginfo('name'); ?>
            </a>
            <p class="text-sm text-background/60 leading-relaxed mb-6">
                <?php bloginfo('description'); ?>
            </p>

            <!-- Social -->
            <div class="flex items-center gap-3">
                <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer"
                   class="w-9 h-9 flex items-center justify-center rounded-full border border-background/20 text-background/60 hover:border-background hover:text-background transition-colors"
                   aria-label="Facebook">
                    <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor" aria-hidden="true"><path d="M24 12c0-6.627-5.373-12-12-12S0 5.373 0 12c0 5.99 4.388 10.954 10.125 11.854V15.47H7.078V12h3.047V9.356c0-3.007 1.792-4.668 4.533-4.668 1.312 0 2.686.234 2.686.234v2.953H15.83c-1.491 0-1.956.925-1.956 1.874V12h3.328l-.532 3.47h-2.796v8.385C19.612 22.954 24 17.99 24 12z"/></svg>
                </a>
                <a href="#" target="_blank" rel="noopener noreferrer"
                   class="w-9 h-9 flex items-center justify-center rounded-full border border-background/20 text-background/60 hover:border-background hover:text-background transition-colors"
                   aria-label="Instagram">
                    <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor" aria-hidden="true"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.326 3.608 1.301.975.975 1.24 2.242 1.302 3.608.058 1.265.069 1.645.069 4.849s-.011 3.584-.069 4.849c-.062 1.366-.327 2.633-1.302 3.608-.975.975-2.242 1.24-3.608 1.302-1.265.058-1.645.069-4.849.069s-3.584-.011-4.849-.069c-1.366-.062-2.633-.327-3.608-1.302-.975-.975-1.24-2.242-1.302-3.608C2.175 15.584 2.163 15.204 2.163 12s.012-3.584.07-4.849c.062-1.366.326-2.633 1.301-3.608.975-.975 2.242-1.24 3.608-1.302C8.416 2.175 8.796 2.163 12 2.163zm0-2.163C8.741 0 8.332.014 7.052.072 5.197.157 3.355.673 1.924 2.104.493 3.535-.023 5.377.072 7.232-.014 8.332 0 8.741 0 12s.014 3.668.072 4.948c.085 1.855.601 3.697 2.032 5.128 1.431 1.431 3.273 1.947 5.128 2.032C8.332 23.986 8.741 24 12 24s3.668-.014 4.948-.072c1.855-.085 3.697-.601 5.128-2.032 1.431-1.431 1.947-3.273 2.032-5.128.058-1.28.072-1.689.072-4.948s-.014-3.668-.072-4.948c-.085-1.855-.601-3.697-2.032-5.128C20.697.673 18.855.157 17 .072 15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                </a>
                <a href="#" target="_blank" rel="noopener noreferrer"
                   class="w-9 h-9 flex items-center justify-center rounded-full border border-background/20 text-background/60 hover:border-background hover:text-background transition-colors"
                   aria-label="TikTok">
                    <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor" aria-hidden="true"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1V9.01a6.32 6.32 0 00-.79-.05 6.34 6.34 0 00-6.34 6.34 6.34 6.34 0 006.34 6.34 6.34 6.34 0 006.33-6.34V9.17a8.16 8.16 0 004.77 1.52V7.25a4.85 4.85 0 01-1-.56z"/></svg>
                </a>
            </div>
        </div>

        <!-- Dynamic link columns -->
        <?php foreach ($columns as $col) : ?>
        <div>
            <h4 class="text-sm font-semibold uppercase tracking-widest text-background mb-5">
                <?php echo esc_html($col['title']); ?>
            </h4>
            <ul class="space-y-3">
                <?php foreach ($col['links'] as $link) : ?>
                <li>
                    <a href="<?php echo esc_url($link['url']); ?>"
                       class="text-sm text-background/60 hover:text-background transition-colors">
                        <?php echo esc_html($link['title']); ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endforeach; ?>

        <!-- Newsletter column -->
        <div>
            <h4 class="text-sm font-semibold uppercase tracking-widest text-background mb-5">
                <?php esc_html_e('Newsletter', 'dawp'); ?>
            </h4>
            <p class="text-sm text-background/60 leading-relaxed mb-4">
                <?php esc_html_e('Get the latest drops and exclusive offers.', 'dawp'); ?>
            </p>
            <form class="flex gap-2" action="#" method="post">
                <label for="footer-email" class="sr-only"><?php esc_html_e('Email address', 'dawp'); ?></label>
                <input id="footer-email" type="email" name="email"
                       placeholder="<?php esc_attr_e('your@email.com', 'dawp'); ?>"
                       required
                       class="flex-1 min-w-0 px-3 py-2.5 text-sm rounded-lg bg-background/10 border border-background/20 text-background placeholder:text-background/40 focus:outline-none focus:border-background/60 transition-colors">
                <button type="submit"
                        class="shrink-0 px-4 py-2.5 text-sm font-semibold rounded-lg bg-background text-foreground hover:bg-background/90 transition-colors"
                        aria-label="<?php esc_attr_e('Subscribe', 'dawp'); ?>">
                    <?php esc_html_e('Join', 'dawp'); ?>
                </button>
            </form>

            <!-- Payment icons -->
            <div class="mt-6 flex items-center gap-2 flex-wrap">
                <span class="text-xs text-background/40 mr-1"><?php esc_html_e('We accept', 'dawp'); ?></span>
                <span class="inline-block" aria-label="Visa">
                    <svg viewBox="0 0 48 16" width="48" height="16" xmlns="http://www.w3.org/2000/svg"><rect width="48" height="16" rx="2" fill="rgba(255,255,255,.15)"/><text x="24" y="11.5" text-anchor="middle" font-family="Arial" font-weight="800" font-style="italic" font-size="8" letter-spacing="0.8" fill="#fff">VISA</text></svg>
                </span>
                <span class="inline-block" aria-label="Mastercard">
                    <svg viewBox="0 0 48 16" width="48" height="16" xmlns="http://www.w3.org/2000/svg"><rect width="48" height="16" rx="2" fill="rgba(255,255,255,.15)"/><circle cx="19" cy="8" r="5" fill="#EB001B" opacity=".8"/><circle cx="29" cy="8" r="5" fill="#F79E1B" opacity=".8"/><path fill="#FF5F00" opacity=".8" d="M24 4.2a5 5 0 000 7.6 5 5 0 000-7.6z"/></svg>
                </span>
                <span class="inline-block" aria-label="PayPal">
                    <svg viewBox="0 0 48 16" width="48" height="16" xmlns="http://www.w3.org/2000/svg"><rect width="48" height="16" rx="2" fill="rgba(255,255,255,.15)"/><text x="24" y="11.5" text-anchor="middle" font-family="Arial" font-weight="800" font-size="8" fill="#fff">PayPal</text></svg>
                </span>
            </div>
        </div>

    </div>

    <!-- Footer bottom bar -->
    <div class="border-t border-background/10">
        <div class="max-w-screen-xl mx-auto px-4 lg:px-8 py-5 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-background/40">
            <p>
                &copy; <?php echo esc_html(date('Y')); ?> <?php bloginfo('name'); ?>.
                <?php esc_html_e('All rights reserved.', 'dawp'); ?>
            </p>
            <ul class="flex items-center gap-4">
                <li><a href="<?php echo esc_url(home_url('/terms-conditions/')); ?>" class="hover:text-background/70 transition-colors"><?php esc_html_e('Terms', 'dawp'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>" class="hover:text-background/70 transition-colors"><?php esc_html_e('Privacy', 'dawp'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>" class="hover:text-background/70 transition-colors"><?php esc_html_e('Cookies', 'dawp'); ?></a></li>
            </ul>
        </div>
    </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>
