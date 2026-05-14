<?php
/**
 * Theme footer.
 *
 * @package dawp
 */

$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$support_email = 'support@shopavecmoi.com';
$instagram_url = 'https://www.instagram.com/shopavec.moi/';
$facebook_url = 'https://www.facebook.com/shopavec.moi/';

$footer_columns = function_exists('dawp_footer_columns') ? dawp_footer_columns() : [
    [
        'title' => __('Shop', 'dawp'),
        'links' => [
            ['title' => __('Shop All', 'dawp'), 'url' => $shop_url],
            ['title' => __('Lingerie Sets', 'dawp'), 'url' => home_url('/product-category/lingerie-sets/')],
            ['title' => __('Sleepwear', 'dawp'), 'url' => home_url('/product-category/sleepwear/')],
            ['title' => __('Robes & Loungewear', 'dawp'), 'url' => home_url('/product-category/robes-loungewear/')],
            ['title' => __('Bras & Bralettes', 'dawp'), 'url' => home_url('/product-category/bras-bralettes/')],
            ['title' => __('Intimate Essentials', 'dawp'), 'url' => home_url('/product-category/intimate-essentials/')],
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

<footer class="bg-[#21102C] text-white" role="contentinfo">
    <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8 lg:py-16">
        <div class="grid gap-10 lg:grid-cols-[1.2fr_1.8fr]">
            <div class="max-w-xl">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center" aria-label="<?php esc_attr_e('Shop Avec Moi home', 'dawp'); ?>">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/shopavecmoi_logo_footer.png'); ?>" alt="<?php esc_attr_e('Shop Avec Moi', 'dawp'); ?>" class="h-16 w-auto max-w-[14rem] object-contain">
                </a>
                <p class="mt-5 text-base leading-7 text-white/75">
                    <?php esc_html_e('A romantic feminine boutique for lingerie, sleepwear, robes, and intimate essentials made for comfort, softness, and quiet confidence.', 'dawp'); ?>
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
                    <a class="inline-flex items-center gap-3 transition hover:text-white" href="<?php echo esc_url($instagram_url); ?>" target="_blank" rel="noopener noreferrer">
                        <span class="flex h-9 w-9 items-center justify-center rounded-full bg-white/10 text-white" aria-hidden="true">
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="20" rx="5"></rect>
                                <path d="M16 11.37a4 4 0 1 1-7.99 1.26A4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                            </svg>
                        </span>
                        @shopavec.moi
                    </a>
                    <a class="inline-flex items-center gap-3 transition hover:text-white" href="<?php echo esc_url($facebook_url); ?>" target="_blank" rel="noopener noreferrer">
                        <span class="flex h-9 w-9 items-center justify-center rounded-full bg-white/10 text-white" aria-hidden="true">
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3V2z"></path>
                            </svg>
                        </span>
                        <?php esc_html_e('Facebook fanpage', 'dawp'); ?>
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

        <div class="mt-12 grid gap-4 border-t border-white/15 pt-8 sm:grid-cols-3">
            <div class="rounded-2xl border border-white/15 bg-white/10 p-5">
                <h3 class="text-sm font-semibold text-white"><?php esc_html_e('Business Hours', 'dawp'); ?></h3>
                <p class="mt-2 text-sm leading-6 text-white/70"><?php esc_html_e('Monday to Friday, 9:00 AM to 6:00 PM EST.', 'dawp'); ?></p>
            </div>
            <div class="rounded-2xl border border-white/15 bg-white/10 p-5">
                <h3 class="text-sm font-semibold text-white"><?php esc_html_e('Shipping', 'dawp'); ?></h3>
                <p class="mt-2 text-sm leading-6 text-white/70"><?php esc_html_e('Orders process within 2-4 business days. Standard US shipping typically takes 5-10 business days after dispatch.', 'dawp'); ?></p>
            </div>
            <div class="rounded-2xl border border-white/15 bg-white/10 p-5">
                <h3 class="text-sm font-semibold text-white"><?php esc_html_e('Returns', 'dawp'); ?></h3>
                <p class="mt-2 text-sm leading-6 text-white/70"><?php esc_html_e('Eligible unworn and unused items may be returned within 30 days. Intimate apparel returns are hygiene-aware.', 'dawp'); ?></p>
            </div>
        </div>

        <div class="mt-8 flex flex-col gap-4 border-t border-white/15 pt-6 text-sm text-white/60 lg:flex-row lg:items-center lg:justify-between">
            <p>&copy; <?php echo esc_html(gmdate('Y')); ?> <?php esc_html_e('Shop Avec Moi. All rights reserved.', 'dawp'); ?></p>
            <p><?php esc_html_e('Soft intimate pieces for comfort, romance, and quiet confidence.', 'dawp'); ?></p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
