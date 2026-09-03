<?php
/**
 * Theme footer — North Time Co.
 *
 * @package dawp
 *
 * NOTE FOR STORE OWNER: Google Merchant Center requires a verifiable business
 * identity. The business address below is read from WooCommerce > Settings >
 * General > Store Address — keep that setting accurate and complete.
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email  = function_exists('dawp_store_email') ? dawp_store_email() : 'support@northtimeco.com';
$store_address  = function_exists('dawp_store_address') ? dawp_store_address() : '';
$business_hours = __('Mon - Fri, 9:00 AM - 5:00 PM EST', 'dawp');

$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$account_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');

if (!$account_url) {
    $account_url = home_url('/my-account/');
}

// See header.php: the catalog has no Men's / Women's / Automatic Watches
// categories yet, so these link to the shop generally rather than to
// non-existent taxonomy terms. New Arrivals sorts the shop by newest.
$footer_columns = [
    [
        'title' => __('Shop', 'dawp'),
        'links' => [
            ['title' => __('All Watches', 'dawp'),       'url' => $shop_url],
            ['title' => __("Men's Watches", 'dawp'),     'url' => $shop_url],
            ['title' => __("Women's Watches", 'dawp'),   'url' => $shop_url],
            ['title' => __('Automatic Watches', 'dawp'), 'url' => $shop_url],
            ['title' => __('New Arrivals', 'dawp'),      'url' => add_query_arg('orderby', 'date', $shop_url)],
        ],
    ],
    [
        'title' => __('Customer Service', 'dawp'),
        'links' => [
            ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/')],
            ['title' => __('Shipping', 'dawp'),   'url' => home_url('/shipping-policy/')],
            ['title' => __('Returns', 'dawp'),    'url' => home_url('/return-refund-policy/')],
            ['title' => __('Warranty', 'dawp'),   'url' => home_url('/faq/')],
            ['title' => __('FAQ', 'dawp'),        'url' => home_url('/faq/')],
        ],
    ],
    [
        'title' => __('About', 'dawp'),
        'links' => [
            ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/')],
        ],
    ],
    [
        'title' => __('Policies', 'dawp'),
        'links' => [
            ['title' => __('Privacy Policy', 'dawp'),       'url' => home_url('/privacy-policy/')],
            ['title' => __('Terms & Conditions', 'dawp'),   'url' => home_url('/terms-of-service/')],
            ['title' => __('Return Policy', 'dawp'),        'url' => home_url('/return-refund-policy/')],
        ],
    ],
];
?>

</div><!-- #content -->

<footer class="bg-primary text-white" role="contentinfo">
    <div class="border-b border-white/10 bg-primary-dark">
        <div class="mx-auto flex max-w-7xl flex-col gap-3 px-4 py-4 text-sm text-white/70 sm:px-6 lg:flex-row lg:items-center lg:justify-between lg:px-8">
            <p class="font-semibold text-accent"><?php esc_html_e('Free shipping on every order across the US.', 'dawp'); ?></p>
            <div class="flex flex-wrap gap-x-5 gap-y-2">
                <span><?php esc_html_e('30-day returns', 'dawp'); ?></span>
                <span><?php esc_html_e('Secure checkout', 'dawp'); ?></span>
                <span><?php esc_html_e('Support hours: ', 'dawp'); ?><?php echo esc_html($business_hours); ?></span>
            </div>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8 lg:py-12">
        <div class="grid gap-9 lg:grid-cols-2">
            <div>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center font-heading text-xl font-semibold uppercase tracking-label text-white" aria-label="<?php esc_attr_e('North Time Co. — home', 'dawp'); ?>">
                    North Time <span class="text-accent">Co.</span>
                </a>

                <p class="mt-5 max-w-md text-sm leading-6 text-white/70">
                    <?php esc_html_e('Timepieces that define your style. Carefully selected watches for everyday wear, designed to last.', 'dawp'); ?>
                </p>

                <div class="mt-6 grid gap-3 text-sm leading-6 text-white/75">
                    <div class="flex items-start gap-3">
                        <span class="mt-0.5 inline-flex h-6 w-6 shrink-0 items-center justify-center text-accent" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                <path d="m22 7-10 6L2 7"></path>
                            </svg>
                        </span>
                        <p>
                            <span class="font-semibold text-white"><?php esc_html_e('Email:', 'dawp'); ?></span>
                            <a class="break-all transition hover:text-accent" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
                        </p>
                    </div>

                    <?php if ($store_address) : ?>
                    <div class="flex items-start gap-3">
                        <span class="mt-0.5 inline-flex h-6 w-6 shrink-0 items-center justify-center text-accent" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </span>
                        <p>
                            <span class="font-semibold text-white"><?php esc_html_e('Business address:', 'dawp'); ?></span>
                            <?php echo esc_html($store_address); ?>
                        </p>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="mt-6">
                    <p class="text-xs font-semibold uppercase tracking-label text-white/50"><?php esc_html_e('Accepted Payments', 'dawp'); ?></p>
                    <ul class="mt-3 flex flex-wrap items-center gap-2" aria-label="<?php esc_attr_e('Accepted payment methods', 'dawp'); ?>">
                        <li>
                            <span class="inline-flex h-8 w-12 items-center justify-center rounded-sm bg-white" title="<?php esc_attr_e('Visa', 'dawp'); ?>">
                                <span class="sr-only"><?php esc_html_e('Visa', 'dawp'); ?></span>
                                <svg viewBox="0 0 64 40" width="44" height="28" aria-hidden="true" focusable="false">
                                    <rect width="64" height="40" rx="5" fill="#fff"></rect>
                                    <path d="M24.6 26.6h-4.2l2.6-13.2h4.2l-2.6 13.2Zm-7.8-13.2-4 9.1-.5-2.5-1.4-6.6H6.7l3.6 13.2h4.5l6.5-13.2h-4.5Zm21.9 8.9c0-3.5-5.8-2.8-5.8-4.4 0-.5.6-1.1 1.9-1.2 1.4-.1 2.9.3 3.9.7l.7-3.4c-1-.4-2.3-.8-4-.8-4.2 0-7.2 2.1-7.2 5.1 0 2.3 2.2 3.5 3.9 4.3 1.7.8 2.3 1.3 2.3 2 0 1.1-1.4 1.5-2.7 1.5-1.8 0-2.8-.3-4.3-.9l-.7 3.5c1 .5 2.8.9 4.7.9 4.5 0 7.3-2.1 7.3-5.3Zm11.1 4.3h3.9L50.3 13.4h-3.6c-.8 0-1.5.4-1.8 1.1l-6.3 12.1H43l.9-2.3h5.4l.5 2.3Zm-4.6-5.4 2.2-5.4 1.2 5.4h-3.4Z" fill="#1A1F71"></path>
                                </svg>
                            </span>
                        </li>
                        <li>
                            <span class="inline-flex h-8 w-12 items-center justify-center rounded-sm bg-white" title="<?php esc_attr_e('Mastercard', 'dawp'); ?>">
                                <span class="sr-only"><?php esc_html_e('Mastercard', 'dawp'); ?></span>
                                <svg viewBox="0 0 64 40" width="44" height="28" aria-hidden="true" focusable="false">
                                    <rect width="64" height="40" rx="5" fill="#fff"></rect>
                                    <circle cx="26" cy="20" r="10" fill="#EB001B"></circle>
                                    <circle cx="38" cy="20" r="10" fill="#F79E1B"></circle>
                                    <path d="M32 12.2a10 10 0 0 1 0 15.6 10 10 0 0 1 0-15.6Z" fill="#FF5F00"></path>
                                </svg>
                            </span>
                        </li>
                        <li>
                            <span class="inline-flex h-8 w-12 items-center justify-center rounded-sm bg-white" title="<?php esc_attr_e('American Express', 'dawp'); ?>">
                                <span class="sr-only"><?php esc_html_e('American Express', 'dawp'); ?></span>
                                <svg viewBox="0 0 64 40" width="44" height="28" aria-hidden="true" focusable="false">
                                    <rect width="64" height="40" rx="5" fill="#2E77BC"></rect>
                                    <path d="M7 14h8.2l1.1 2.5 1.2-2.5h8v12H20v-6.7l-3 6.7h-1.6l-3-6.7V26H7V14Zm21 0h13v3.1h-8v1.5h7.8v2.9H33v1.4h8V26H28V14Zm15 0h6l2.5 3.6 2.6-3.6H60l-5.5 6 5.6 6h-6.2l-2.6-3.8-2.7 3.8H43l5.5-6-5.5-6Z" fill="#fff"></path>
                                </svg>
                            </span>
                        </li>
                        <li>
                            <span class="inline-flex h-8 w-12 items-center justify-center rounded-sm bg-white" title="<?php esc_attr_e('PayPal', 'dawp'); ?>">
                                <span class="sr-only"><?php esc_html_e('PayPal', 'dawp'); ?></span>
                                <svg viewBox="0 0 64 40" width="44" height="28" aria-hidden="true" focusable="false">
                                    <rect width="64" height="40" rx="5" fill="#fff"></rect>
                                    <path d="M24 12h9.6c4 0 6.6 2.1 6 5.9-.7 4.7-3.9 7.2-8.4 7.2h-2.5l-.9 5.1H22l2-18.2Z" fill="#003087"></path>
                                    <path d="M31.1 17h8.7c3.7 0 5.5 2.1 5 5.3-.6 4.1-3.5 6.5-7.6 6.5h-2.8l-.8 4.2h-5.2L31.1 17Z" fill="#009CDE"></path>
                                    <path d="M30 16.5h3.6c2.1 0 3.5.8 3.3 2.7-.3 2.2-1.9 3.2-4.1 3.2h-3.4L30 16.5Z" fill="#012169"></path>
                                </svg>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="grid gap-7 sm:grid-cols-4 lg:pt-1">
                <?php foreach ($footer_columns as $column) : ?>
                    <nav aria-label="<?php echo esc_attr($column['title']); ?>">
                        <h2 class="text-xs font-bold uppercase tracking-label text-accent"><?php echo esc_html($column['title']); ?></h2>
                        <ul class="mt-4 grid gap-2 text-sm leading-6 text-white/75">
                            <?php foreach ($column['links'] as $link) : ?>
                                <li>
                                    <a class="transition hover:text-accent" href="<?php echo esc_url($link['url']); ?>">
                                        <?php echo esc_html($link['title']); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </nav>
                <?php endforeach; ?>

                <div class="sm:col-span-4">
                    <p class="text-xs leading-5 text-white/45">
                        <span class="font-semibold text-white/60"><?php esc_html_e('Business:', 'dawp'); ?></span>
                        <?php echo esc_html($store_address); ?>.
                        <?php esc_html_e('All watches are new and genuine, sold in original manufacturer packaging. Any manufacturer warranty depends on the model and is listed on the product page. We do not sell replica or counterfeit products.', 'dawp'); ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="mt-8 flex flex-col gap-3 border-t border-white/15 pt-5 text-sm text-white/55 lg:flex-row lg:items-center lg:justify-between">
            <p>&copy; <?php echo esc_html(gmdate('Y')); ?> North Time Co. <?php esc_html_e('All rights reserved.', 'dawp'); ?></p>
            <div class="flex flex-wrap gap-x-5 gap-y-2">
                <a class="transition hover:text-accent" href="<?php echo esc_url(home_url('/return-refund-policy/')); ?>"><?php esc_html_e('Returns', 'dawp'); ?></a>
                <a class="transition hover:text-accent" href="<?php echo esc_url(home_url('/shipping-policy/')); ?>"><?php esc_html_e('Shipping', 'dawp'); ?></a>
                <a class="transition hover:text-accent" href="<?php echo esc_url(home_url('/terms-of-service/')); ?>"><?php esc_html_e('Terms & Conditions', 'dawp'); ?></a>
                <a class="transition hover:text-accent" href="<?php echo esc_url(home_url('/privacy-policy/')); ?>"><?php esc_html_e('Privacy Policy', 'dawp'); ?></a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
