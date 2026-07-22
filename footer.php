</div><!-- #content -->

<footer id="colophon" class="bg-[#161A1E] text-white" role="contentinfo">
    <div class="max-w-[1280px] mx-auto px-4 lg:px-6 py-12 lg:py-16 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-10">
        <div class="sm:col-span-2 lg:col-span-2">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center mb-4">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/shopmivo_logo.png'); ?>" alt="Shopmivo" class="h-10 w-auto">
            </a>

            <?php $dawp_store_address = dawp_get_woocommerce_store_address(); ?>
            <ul class="space-y-2.5 text-sm text-white/85 mb-6">
                <li>
                    <a href="mailto:support@shopmivo.com" class="flex items-start gap-2 hover:text-white transition-colors">
                        <svg class="shrink-0 mt-0.5" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>
                        </svg>
                        support@shopmivo.com
                    </a>
                </li>
                <?php if ($dawp_store_address) : ?>
                <li class="flex items-start gap-2">
                    <svg class="shrink-0 mt-0.5" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                        <path d="M12 21s7-4.4 7-11a7 7 0 0 0-14 0c0 6.6 7 11 7 11z"/><circle cx="12" cy="10" r="2.5"/>
                    </svg>
                    <?php echo esc_html($dawp_store_address); ?>
                </li>
                <?php endif; ?>
                <li class="flex items-start gap-2">
                    <svg class="shrink-0 mt-0.5" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                        <circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>
                    </svg>
                    <?php esc_html_e('Monday - Friday, 9:00 AM - 5:00 PM PST', 'dawp'); ?>
                </li>
            </ul>

            <p class="text-xs text-white/55 leading-relaxed max-w-md">
                <?php esc_html_e('Shopmivo is an independent general merchandise store and is not affiliated with, endorsed by, or sponsored by Walmart Inc. or any other retailer.', 'dawp'); ?>
            </p>
        </div>

        <?php foreach (dawp_footer_columns() as $col) : ?>
            <div>
                <h4 class="text-sm font-black uppercase tracking-wider text-white mb-5"><?php echo esc_html($col['title']); ?></h4>
                <ul class="space-y-3">
                    <?php foreach ($col['links'] as $link) : ?>
                    <li>
                        <a href="<?php echo esc_url($link['url']); ?>" class="text-sm text-white/78 hover:text-white transition-colors"><?php echo esc_html($link['title']); ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endforeach; ?>

        <div class="sm:col-span-2 lg:col-span-2">
            <h4 class="text-sm font-black uppercase tracking-wider text-white mb-5"><?php esc_html_e('Shopmivo Deals', 'dawp'); ?></h4>
            <p class="text-sm text-white/76 leading-relaxed mb-4">
                <?php esc_html_e('Get new arrivals, seasonal picks, and deals across every category.', 'dawp'); ?>
            </p>
            <form id="footer-newsletter-form" class="flex gap-2">
                <label for="footer-email" class="sr-only"><?php esc_html_e('Email address', 'dawp'); ?></label>
                <input id="footer-email" type="email" name="email" placeholder="<?php esc_attr_e('your@email.com', 'dawp'); ?>" required class="flex-1 min-w-0 px-3 py-2.5 text-sm rounded-md bg-white/12 border border-white/25 text-white placeholder:text-white/70 focus:outline-none focus:border-white transition-colors">
                <button type="submit" class="shrink-0 px-4 py-2.5 text-sm font-black rounded-md bg-[#D71920] text-white hover:bg-[#A70F14] transition-colors min-h-[44px]"><?php esc_html_e('Join', 'dawp'); ?></button>
            </form>
            <p id="footer-newsletter-msg" aria-live="polite" style="display:none" class="mt-2 text-xs"></p>

            <ul class="mt-6 space-y-2 text-xs text-white/78">
                <li><?php esc_html_e('Secure Checkout', 'dawp'); ?></li>
                <li><?php esc_html_e('Tracking Included', 'dawp'); ?></li>
                <li><?php esc_html_e('30-Day Returns on Eligible Items', 'dawp'); ?></li>
                <li><?php esc_html_e('Everyday Low Prices', 'dawp'); ?></li>
            </ul>
        </div>
    </div>

    <div class="border-t border-white/12">
        <div class="max-w-[1280px] mx-auto px-4 lg:px-6 py-4 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-white/70">
            <p>&copy; <?php echo esc_html(date('Y')); ?> Shopmivo. <?php esc_html_e('All rights reserved.', 'dawp'); ?></p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
