<?php
/**
 * Theme footer — MozTire
 */

$facts   = dawp_store_facts();
$address = function_exists('dawp_get_woocommerce_store_address') ? dawp_get_woocommerce_store_address() : '';

$trust_items = [
    ['title' => 'Free Ground Shipping', 'text' => 'Contiguous U.S., tracked', 'icon' => '<path d="M3 7h11v9H3zM14 10h4l3 3v3h-7z"/><circle cx="7" cy="18" r="2"/><circle cx="17" cy="18" r="2"/>'],
    ['title' => $facts['return_window'] . '-Day Returns', 'text' => 'New & unmounted tires', 'icon' => '<path d="M4 12a8 8 0 1 0 3-6.2"/><path d="M4 4v4h4"/>'],
    ['title' => 'Secure Checkout', 'text' => 'Encrypted payments', 'icon' => '<rect x="4" y="10" width="16" height="11" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/>'],
    ['title' => 'Real Fitment Help', 'text' => 'Reply ' . $facts['response_time'], 'icon' => '<circle cx="12" cy="12" r="9"/><path d="M9.5 9a2.5 2.5 0 1 1 3.5 2.3c-.6.3-1 .9-1 1.6V14M12 17h.01"/>'],
];
$payments = ['VISA', 'Mastercard', 'AMEX', 'Discover', 'PayPal'];
?>

<section class="border-t border-border bg-surface" aria-label="<?php esc_attr_e('Fitment help', 'dawp'); ?>">
    <div class="mz-container grid items-center gap-6 py-10 md:grid-cols-[1fr_auto] md:py-12">
        <div>
            <p class="m-0 font-heading text-sm font-extrabold tracking-[0.14em] text-accent uppercase">Not sure which tire fits?</p>
            <h2 class="mt-2 mb-0 font-heading text-2xl font-black md:text-3xl">Send us your current tire size or vehicle. We&rsquo;ll point you to tires that fit.</h2>
        </div>
        <div class="flex flex-wrap gap-3">
            <a class="mz-btn mz-btn--dark" href="<?php echo esc_url(home_url('/tire-size-guide/')); ?>">Read the Size Guide</a>
            <a class="mz-btn mz-btn--outline" href="<?php echo esc_url(home_url('/contact-us/')); ?>">Ask a Tire Question</a>
        </div>
    </div>
</section>

<footer class="bg-ink text-white">
    <div class="border-b border-white/10">
        <ul class="mz-container m-0 grid list-none grid-cols-2 gap-px p-0 lg:grid-cols-4" aria-label="<?php esc_attr_e('Store benefits', 'dawp'); ?>">
            <?php foreach ($trust_items as $item) : ?>
                <li class="flex items-center gap-3 py-5 pr-3">
                    <span class="inline-flex size-10 shrink-0 items-center justify-center rounded-md bg-white/5 text-accent-blush" aria-hidden="true">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><?php echo $item['icon']; // phpcs:ignore ?></svg>
                    </span>
                    <span>
                        <strong class="block font-heading text-[15px] leading-tight"><?php echo esc_html($item['title']); ?></strong>
                        <span class="block text-[13px] text-white/60"><?php echo esc_html($item['text']); ?></span>
                    </span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="mz-container grid gap-10 py-12 md:grid-cols-2 lg:grid-cols-[1.4fr_1fr_1fr_1fr]">
        <div class="max-w-sm">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex" aria-label="<?php echo esc_attr($facts['brand']); ?>">
                <img src="<?php echo esc_url(get_theme_file_uri('/assets/img/logo-moztire.svg')); ?>" alt="<?php echo esc_attr($facts['brand']); ?>" width="220" height="48" class="block h-10 w-auto" loading="lazy" decoding="async">
            </a>
            <p class="mt-4 mb-0 text-sm text-white/65">An online tire store for U.S. drivers. Shop passenger, SUV and light-truck tires by size, brand and season, with free ground shipping to the contiguous U.S.</p>

            <ul class="mt-6 mb-0 grid list-none gap-3 p-0 text-sm">
                <li>
                    <a class="flex gap-3 text-white/80 hover:text-white" href="mailto:<?php echo esc_attr($facts['email']); ?>">
                        <svg class="mt-0.5 shrink-0 text-accent-blush" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></svg>
                        <span><?php echo esc_html($facts['email']); ?></span>
                    </a>
                </li>
                <li class="flex gap-3 text-white/80">
                    <svg class="mt-0.5 shrink-0 text-accent-blush" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
                    <span><?php echo esc_html($facts['hours']); ?></span>
                </li>
                <?php if ($address) : ?>
                    <li class="flex gap-3 text-white/80">
                        <svg class="mt-0.5 shrink-0 text-accent-blush" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M12 21s-7-6.2-7-11a7 7 0 0 1 14 0c0 4.8-7 11-7 11z"/><circle cx="12" cy="10" r="2.5"/></svg>
                        <address class="not-italic"><?php echo esc_html($address); ?></address>
                    </li>
                <?php endif; ?>
            </ul>
        </div>

        <?php foreach (dawp_footer_columns() as $column) : ?>
            <div>
                <h3 class="m-0 font-heading text-sm font-extrabold tracking-[0.12em] text-white uppercase"><?php echo esc_html($column['title']); ?></h3>
                <ul class="mt-4 mb-0 grid list-none gap-1 p-0">
                    <?php foreach ($column['links'] as $link) : ?>
                        <li><a class="inline-flex min-h-9 items-center text-sm text-white/65 hover:text-accent-blush" href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="border-t border-white/10 bg-black/30">
        <div class="mz-container flex flex-col gap-4 py-5 text-[13px] text-white/55 md:flex-row md:items-center md:justify-between">
            <p class="m-0">&copy; <?php echo esc_html(date_i18n('Y')); ?> <?php echo esc_html($facts['brand']); ?> (<?php echo esc_html($facts['domain']); ?>). All rights reserved. Brand names and tire line names belong to their respective manufacturers.</p>
            <ul class="m-0 flex list-none flex-wrap gap-2 p-0" aria-label="<?php esc_attr_e('Accepted payment methods', 'dawp'); ?>">
                <?php foreach ($payments as $payment) : ?>
                    <li class="rounded border border-white/15 bg-white px-2 py-1 font-heading text-[11px] font-black tracking-wide text-ink"><?php echo esc_html($payment); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</footer>

<?php if (function_exists('dawp_cart_fab_markup')) : dawp_cart_fab_markup(); endif; ?>
<?php if (function_exists('dawp_cart_drawer_markup')) : dawp_cart_drawer_markup(); endif; ?>

<?php wp_footer(); ?>
</body>
</html>
