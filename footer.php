<?php
/**
 * Theme footer.
 *
 * @package dawp
 */

$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$support_email = 'support@ukofficialstore.com';
$store_address = '292 Malcolm X Blvd, New York, NY 10027';
$logo_url = get_template_directory_uri() . '/assets/img/gallery/logo.png';

$footer_columns = function_exists('dawp_footer_columns') ? dawp_footer_columns() : [
    [
        'title' => __('Shop Activewear', 'dawp'),
        'links' => [
            ['title' => __('Shop All', 'dawp'), 'url' => $shop_url],
            ['title' => __('Dry-Fit T-Shirts', 'dawp'), 'url' => home_url('/product-category/dry-fit-t-shirts/')],
            ['title' => __('Tracksuits', 'dawp'), 'url' => home_url('/product-category/tracksuits/')],
            ['title' => __('Tank Tops', 'dawp'), 'url' => home_url('/product-category/tank-tops/')],
            ['title' => __('Training Sets', 'dawp'), 'url' => home_url('/product-category/training-sets/')],
            ['title' => __('Activewear Bottoms', 'dawp'), 'url' => home_url('/product-category/activewear-bottoms/')],
        ],
    ],
    [
        'title' => __('Customer Care', 'dawp'),
        'links' => [
            ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/')],
            ['title' => __('Track Your Order', 'dawp'), 'url' => home_url('/track-order/')],
            ['title' => __('FAQ', 'dawp'), 'url' => home_url('/faq/')],
            ['title' => __('My Account', 'dawp'), 'url' => function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/')],
        ],
    ],
    [
        'title' => __('Policies', 'dawp'),
        'links' => [
            ['title' => __('Shipping & Returns', 'dawp'), 'url' => home_url('/shipping-returns/')],
            ['title' => __('Privacy Policy', 'dawp'), 'url' => home_url('/privacy-policy/')],
            ['title' => __('Terms & Conditions', 'dawp'), 'url' => home_url('/terms-conditions/')],
        ],
    ],
];
?>

</div><!-- #content -->

<footer class="bg-navy text-white" role="contentinfo">
    <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8 lg:py-16">
        <div class="grid gap-10 lg:grid-cols-[1.2fr_1.8fr]">
            <div class="max-w-xl">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center" aria-label="<?php esc_attr_e('UK Official Store home', 'dawp'); ?>">
                    <img
                        src="<?php echo esc_url($logo_url); ?>"
                        alt="<?php esc_attr_e('UK Official Store', 'dawp'); ?>"
                        width="96"
                        height="96"
                        class="block h-16 w-16 rounded-md bg-white object-contain"
                        loading="lazy"
                        decoding="async"
                    >
                </a>
                <p class="mt-5 text-base leading-7 text-white/75">
                    <?php esc_html_e('Activewear essentials made for movement, comfort, and daily training. Discover dry-fit t-shirts, tracksuits, tank tops, and training-ready sportswear.', 'dawp'); ?>
                </p>

                <div class="mt-7 grid gap-3 text-sm leading-6 text-white/75">
                    <a class="inline-flex items-center gap-3 transition hover:text-white" href="mailto:<?php echo esc_attr($support_email); ?>">
                        <span class="flex h-9 w-9 items-center justify-center rounded-full bg-white/10 text-white" aria-hidden="true">
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"></path>
                                <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                            </svg>
                        </span>
                        <?php echo esc_html($support_email); ?>
                    </a>
                    <div class="inline-flex items-center gap-3">
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-white/10 text-white" aria-hidden="true">
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 10c0 5-8 12-8 12S4 15 4 10a8 8 0 1 1 16 0Z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </span>
                        <span><?php echo esc_html($store_address); ?></span>
                    </div>
                </div>

                <div class="mt-8 flex items-center gap-4">
                    <a href="https://www.facebook.com/p/Ukofficialstore-61557565089932/" target="_blank" rel="noopener" class="flex h-9 w-9 items-center justify-center rounded-full bg-white/10 text-white transition hover:bg-blue hover:text-white" aria-label="Facebook">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                        </svg>
                    </a>
                    <a href="https://www.instagram.com/ukofficialstore/" target="_blank" rel="noopener" class="flex h-9 w-9 items-center justify-center rounded-full bg-white/10 text-white transition hover:bg-blue hover:text-white" aria-label="Instagram">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="grid gap-8 sm:grid-cols-3">
                <?php foreach ($footer_columns as $column) : ?>
                    <nav aria-label="<?php echo esc_attr($column['title']); ?>">
                        <h2 class="text-sm font-semibold uppercase text-white"><?php echo esc_html($column['title']); ?></h2>
                        <ul class="mt-4 grid gap-3 text-sm text-white/70">
                            <?php foreach ($column['links'] as $link) : ?>
                                <li>
                                    <a class="transition hover:text-white" href="<?php echo esc_url($link['url']); ?>">
                                        <?php echo esc_html($link['title']); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </nav>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="mt-8 flex flex-col gap-5 border-t border-white/15 pt-6 text-sm text-white/60 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <p>&copy; <?php echo esc_html(gmdate('Y')); ?> <?php esc_html_e('UK Official Store. All rights reserved.', 'dawp'); ?></p>
                <p class="mt-1"><?php esc_html_e('Activewear Essentials For Everyday Movement.', 'dawp'); ?></p>
            </div>

            <div class="flex flex-col gap-2 lg:items-start" aria-label="<?php esc_attr_e('Accepted payment methods', 'dawp'); ?>">
                <span class="text-xs font-semibold uppercase tracking-[0.18em] text-white/55"><?php esc_html_e('We accept', 'dawp'); ?></span>
                <div class="flex flex-wrap items-center gap-2">
                    <span class="flex h-10 w-[4.75rem] items-center justify-center rounded-md border border-white/20 bg-white px-3 text-[0.95rem] font-black tracking-wide shadow-lg shadow-black/20 ring-1 ring-white/10 transition hover:-translate-y-0.5 hover:border-lime/70 hover:ring-lime/50" style="color: #1434CB;" aria-label="Visa">
                        VISA
                    </span>
                    <span class="flex h-10 w-[9rem] items-center justify-center gap-1.5 rounded-md border border-white/20 bg-white px-3 shadow-lg shadow-black/20 ring-1 ring-white/10 transition hover:-translate-y-0.5 hover:border-lime/70 hover:ring-lime/50" aria-label="Master Card">
                        <span class="relative flex h-5 w-9 items-center" aria-hidden="true">
                            <span class="absolute left-0 h-5 w-5 rounded-full" style="background-color: #EB001B;"></span>
                            <span class="absolute right-0 h-5 w-5 rounded-full mix-blend-multiply" style="background-color: #F79E1B;"></span>
                        </span>
                        <span class="text-[0.68rem] font-extrabold uppercase tracking-tight" style="color: #231F20;"><?php esc_html_e('Mastercard', 'dawp'); ?></span>
                    </span>
                    <span class="flex h-10 w-[4.75rem] items-center justify-center rounded-md border border-white/20 px-3 text-[0.8rem] font-black tracking-wide text-white shadow-lg shadow-black/20 ring-1 ring-white/10 transition hover:-translate-y-0.5 hover:border-lime/70 hover:ring-lime/50" style="background-color: #2E77BC;" aria-label="American Express">
                        AMEX
                    </span>
                    <span class="flex h-10 w-[4.75rem] items-center justify-center rounded-md border border-white/20 bg-white px-3 text-[0.92rem] font-black tracking-tight shadow-lg shadow-black/20 ring-1 ring-white/10 transition hover:-translate-y-0.5 hover:border-lime/70 hover:ring-lime/50" aria-label="PayPal">
                        <span style="color: #003087;">Pay</span><span style="color: #009CDE;">Pal</span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
