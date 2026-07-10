</div><!-- #content -->

<?php
$footer_store_address = dawp_get_woocommerce_store_address();
$logo_url             = get_template_directory_uri() . '/assets/img/logo-graphictshirtstore.svg';
$payment_methods      = array(
    array('name' => __('Visa', 'dawp'), 'file' => 'visa.png'),
    array('name' => __('Mastercard', 'dawp'), 'file' => 'mastercard.png'),
    array('name' => __('PayPal', 'dawp'), 'file' => 'paypal.png'),
    array('name' => __('American Express', 'dawp'), 'file' => 'amex.png'),
);
?>

<footer id="colophon" class="bg-[#0B1F3A] text-white" role="contentinfo">
    <div class="mx-auto grid max-w-[1280px] grid-cols-1 gap-10 px-4 py-12 sm:grid-cols-2 sm:gap-x-12 sm:gap-y-10 lg:grid-cols-[minmax(0,1.45fr)_repeat(3,minmax(0,1fr))] lg:gap-x-14 lg:px-6 lg:py-16 xl:gap-x-20">
        <div class="sm:col-span-2 lg:col-span-1">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center" aria-label="<?php esc_attr_e('GraphicTShirtStore', 'dawp'); ?>">
                <img src="<?php echo esc_url($logo_url); ?>" alt="<?php esc_attr_e('GraphicTShirtStore', 'dawp'); ?>" class="h-[64px] w-auto sm:h-[72px]">
            </a>

            <ul class="mt-6 space-y-3 text-sm text-white/80">
                <li>
                    <a href="mailto:support@graphictshirtstore.com" class="flex items-start gap-2 transition-colors hover:text-white">
                        <svg class="mt-0.5 shrink-0" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" aria-hidden="true">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                        support@graphictshirtstore.com
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
            <div class="lg:max-w-[220px]">
                <details class="footer-accordion border-t border-white/10 py-4 sm:hidden">
                    <summary class="flex cursor-pointer list-none items-center justify-between gap-4 text-sm font-black uppercase tracking-[0.14em] text-[#C6A15B]">
                        <span><?php echo esc_html($col['title']); ?></span>
                        <svg class="footer-accordion-icon h-4 w-4 shrink-0 text-white/70 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="m6 9 6 6 6-6"/>
                        </svg>
                    </summary>
                    <ul class="footer-accordion-panel mt-4 space-y-3">
                        <?php foreach ($col['links'] as $link) : ?>
                            <li>
                                <a href="<?php echo esc_url($link['url']); ?>" class="text-sm font-semibold text-white/75 transition-colors hover:text-white">
                                    <?php echo esc_html($link['title']); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </details>

                <div class="hidden sm:block">
                    <h2 class="mb-5 text-sm font-black uppercase tracking-[0.14em] text-[#C6A15B]">
                        <?php echo esc_html($col['title']); ?>
                    </h2>
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
            </div>
        <?php endforeach; ?>
    </div>

    <div class="border-t border-white/10 bg-[#081A33]">
        <div class="mx-auto flex max-w-[1280px] flex-col items-center justify-between gap-3 px-4 py-4 text-xs font-semibold text-white/70 sm:flex-row lg:px-6">
            <p>
                &copy; <?php echo esc_html(date('Y')); ?> GraphicTShirtStore.
                <?php esc_html_e('All rights reserved.', 'dawp'); ?>
            </p>

            <ul class="flex flex-nowrap items-center justify-center gap-1.5" aria-label="<?php esc_attr_e('Accepted payment methods', 'dawp'); ?>">
                <?php foreach ($payment_methods as $method) : ?>
                    <li class="flex h-7 w-[64px] items-center justify-center overflow-hidden rounded bg-white shadow-sm ring-1 ring-white/10">
                        <img
                            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/payment/' . $method['file']); ?>"
                            alt="<?php echo esc_attr($method['name']); ?>"
                            class="h-full w-full object-contain"
                            loading="lazy"
                            decoding="async"
                        >
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
