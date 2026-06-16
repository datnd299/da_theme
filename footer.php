</div><!-- #content -->

<?php
$footer_store_address = dawp_get_woocommerce_store_address();
?>

<footer id="colophon" class="bg-[#0B1F3A] text-white" role="contentinfo">
    <div class="border-y border-white/10 bg-[#081A33]">
        <div class="mx-auto grid max-w-[1280px] grid-cols-1 gap-3 px-4 py-4 text-sm font-bold text-white/80 sm:grid-cols-3 lg:px-6">
            <div class="flex items-center gap-2">
                <span class="h-2 w-2 rounded-full bg-[#C6A15B]"></span>
                <?php esc_html_e('Secure checkout', 'dawp'); ?>
            </div>
            <div class="flex items-center gap-2">
                <span class="h-2 w-2 rounded-full bg-[#C6A15B]"></span>
                <?php esc_html_e('Tracking included', 'dawp'); ?>
            </div>
            <div class="flex items-center gap-2">
                <span class="h-2 w-2 rounded-full bg-[#C6A15B]"></span>
                <?php esc_html_e('Custom gifts made with care', 'dawp'); ?>
            </div>
        </div>
    </div>

    <div class="mx-auto grid max-w-[1280px] grid-cols-1 gap-10 px-4 py-12 sm:grid-cols-2 lg:grid-cols-6 lg:px-6 lg:py-16">
        <div class="sm:col-span-2 lg:col-span-2">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-block text-white" aria-label="Proudlywear">
                <span class="block text-3xl font-black tracking-wide leading-none">Proudly<span class="text-[#C6A15B]">wear</span></span>
                <span class="mt-1 block text-[11px] font-extrabold uppercase tracking-[0.22em] text-white/60">Honor The Service</span>
            </a>

            <p class="mt-5 max-w-sm text-sm leading-7 text-white/75">
                <?php esc_html_e('Patriotic apparel and personalized gifts for veterans, military families, and proud Americans.', 'dawp'); ?>
            </p>

            <ul class="mt-6 space-y-3 text-sm text-white/80">
                <li>
                    <a href="mailto:support@proudlywear.com" class="flex items-start gap-2 transition-colors hover:text-white">
                        <svg class="mt-0.5 shrink-0" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" aria-hidden="true">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                        support@proudlywear.com
                    </a>
                </li>

                <?php if ('' !== $footer_store_address) : ?>
                    <li class="flex items-start gap-2">
                        <svg class="mt-0.5 shrink-0" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" aria-hidden="true">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
                            <circle cx="12" cy="10" r="3"/>
                        </svg>
                        <?php echo esc_html($footer_store_address); ?>
                    </li>
                <?php endif; ?>

                <li class="flex items-start gap-2">
                    <svg class="mt-0.5 shrink-0" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" aria-hidden="true">
                        <circle cx="12" cy="12" r="10"/>
                        <polyline points="12 6 12 12 16 14"/>
                    </svg>
                    <?php esc_html_e('Support: Monday-Friday, 10:00 AM-6:00 PM PST', 'dawp'); ?>
                </li>
            </ul>
        </div>

        <?php foreach (dawp_footer_columns() as $col) : ?>
            <div>
                <h4 class="mb-5 text-sm font-black uppercase tracking-[0.14em] text-[#C6A15B]">
                    <?php echo esc_html($col['title']); ?>
                </h4>
                <ul class="space-y-3">
                    <?php foreach ($col['links'] as $link) : ?>
                        <li>
                            <a href="<?php echo esc_url($link['url']); ?>" class="text-sm font-semibold text-white/75 transition-colors hover:text-white">
                                <?php echo esc_html($link['title']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="border-t border-white/10 bg-[#081A33]">
        <div class="mx-auto flex max-w-[1280px] flex-col items-center justify-between gap-3 px-4 py-4 text-xs font-semibold text-white/70 sm:flex-row lg:px-6">
            <p>
                &copy; <?php echo esc_html(date('Y')); ?> Proudlywear.
                <?php esc_html_e('All rights reserved.', 'dawp'); ?>
            </p>

            <ul class="flex flex-wrap items-center justify-center gap-4">
                <li><a href="<?php echo esc_url(home_url('/terms-conditions/')); ?>" class="transition-colors hover:text-white"><?php esc_html_e('Terms', 'dawp'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>" class="transition-colors hover:text-white"><?php esc_html_e('Privacy', 'dawp'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>" class="transition-colors hover:text-white"><?php esc_html_e('Shipping', 'dawp'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/refund-return-policy/')); ?>" class="transition-colors hover:text-white"><?php esc_html_e('Returns', 'dawp'); ?></a></li>
            </ul>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
