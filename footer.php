<?php
/**
 * Theme footer — SlickTee.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email = 'support@slicktee.com';
$us_phone      = '+1 909-366-3939';
$us_address    = '304 S. Jones Blvd #3456, Las Vegas, NV 89107, United States';
$shop_url      = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$account_url   = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

if (!$account_url) {
    $account_url = home_url('/my-account/');
}

$cat_url = static function ($slug) use ($shop_url) {
    return function_exists('dawp_product_category_url') ? dawp_product_category_url($slug) : $shop_url;
};

$footer_columns = [
    [
        'title' => __('Shop', 'dawp'),
        'links' => [
            ['title' => __('Shop All', 'dawp'), 'url' => $shop_url],
            ['title' => __('New Arrivals', 'dawp'), 'url' => $cat_url('new-arrivals')],
            ['title' => __('Best Sellers', 'dawp'), 'url' => $cat_url('best-seller')],
            ['title' => __('Vintage Shirts', 'dawp'), 'url' => $cat_url('vintage-shirts')],
            ['title' => __('Vintage Hoodie', 'dawp'), 'url' => $cat_url('vintage-hoodie')],
            ['title' => __('Vintage Shorts', 'dawp'), 'url' => $cat_url('vintage-shorts')],
        ],
    ],
    [
        'title' => __('Help', 'dawp'),
        'links' => [
            ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/')],
            ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/')],
            ['title' => __('FAQs', 'dawp'), 'url' => home_url('/faq/')],
            ['title' => __('Track Your Order', 'dawp'), 'url' => home_url('/track-order/')],
            ['title' => __('Size Guide', 'dawp'), 'url' => home_url('/faq/#size-guide')],
            ['title' => __('My Account', 'dawp'), 'url' => $account_url],
        ],
    ],
    [
        'title' => __('Policies', 'dawp'),
        'links' => [
            ['title' => __('Shipping Information', 'dawp'), 'url' => home_url('/shipping-returns/')],
            ['title' => __('Refund & Return Policy', 'dawp'), 'url' => home_url('/shipping-returns/#returns')],
            ['title' => __('Cancel / Change Order', 'dawp'), 'url' => home_url('/shipping-returns/#cancel')],
            ['title' => __('Payment Methods', 'dawp'), 'url' => home_url('/terms-conditions/#payment')],
            ['title' => __('Privacy Policy', 'dawp'), 'url' => home_url('/privacy-policy/')],
            ['title' => __('Terms of Service', 'dawp'), 'url' => home_url('/terms-conditions/')],
            ['title' => __('DMCA / IP Notice', 'dawp'), 'url' => home_url('/terms-conditions/#ip')],
        ],
    ],
];
?>

</div><!-- #content -->

<section class="border-t-2 border-[#17140F] bg-[#F2B33D]" aria-label="<?php esc_attr_e('Store promises', 'dawp'); ?>">
    <div class="mx-auto grid max-w-7xl grid-cols-2 gap-x-4 gap-y-5 px-4 py-7 sm:px-6 lg:grid-cols-4 lg:px-8">
        <?php
        $promises = [
            ['title' => __('Free Shipping $49+', 'dawp'), 'copy' => __('Tracked delivery on orders over $49', 'dawp'), 'icon' => '<circle cx="12" cy="12" r="9"></circle><path d="M3 12h18"></path><path d="M12 3a14 14 0 0 1 0 18a14 14 0 0 1 0-18"></path>'],
            ['title' => __('Secure Payments', 'dawp'), 'copy' => __('256-bit SSL encrypted checkout', 'dawp'), 'icon' => '<rect x="4" y="10" width="16" height="10" rx="2"></rect><path d="M8 10V7a4 4 0 0 1 8 0v3"></path>'],
            ['title' => __('Easy Fixes', 'dawp'), 'copy' => __('Misprint or damage? Free replacement', 'dawp'), 'icon' => '<path d="M3 12a9 9 0 1 0 3-6.7"></path><path d="M3 4v5h5"></path>'],
            ['title' => __('Premium Cotton', 'dawp'), 'copy' => __('Soft, durable, eco-certified inks', 'dawp'), 'icon' => '<path d="M4 8 9 4l3 3 3-3 5 4-3 4-2-1v9H6v-9l-2 1Z"></path>'],
        ];
        foreach ($promises as $promise) :
            ?>
            <div class="flex items-start gap-3">
                <span class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-[8px] border-2 border-[#17140F] bg-[#FBF7EF] text-[#17140F]" aria-hidden="true">
                    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><?php echo $promise['icon']; ?></svg>
                </span>
                <span>
                    <span class="block text-sm font-extrabold uppercase tracking-wide text-[#17140F]"><?php echo esc_html($promise['title']); ?></span>
                    <span class="block text-xs leading-5 text-[#17140F]/80"><?php echo esc_html($promise['copy']); ?></span>
                </span>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<footer class="bg-[#17140F] text-[#FBF7EF]" role="contentinfo">
    <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
        <div class="grid grid-cols-2 gap-x-6 gap-y-10 sm:grid-cols-3 lg:grid-cols-[1.6fr_1fr_1fr_1fr] lg:gap-x-10">
            <div class="col-span-2 sm:col-span-3 lg:col-span-1">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center gap-2.5" aria-label="<?php esc_attr_e('SlickTee home', 'dawp'); ?>">
                    <svg class="h-11 w-11 shrink-0 -rotate-6" viewBox="0 0 48 48" aria-hidden="true" focusable="false">
                        <path d="M16 5 7 9.5 2 19l8 4.5 2.5-3.5V43h23V20l2.5 3.5 8-4.5-5-9.5L32 5c-1.6 3.4-4.5 5.2-8 5.2S17.6 8.4 16 5Z" fill="#D7351E" stroke="#FBF7EF" stroke-width="2.5" stroke-linejoin="round"/>
                        <text x="24" y="38" text-anchor="middle" class="font-display" font-size="22" fill="#FBF7EF">S</text>
                    </svg>
                    <span class="font-display text-3xl uppercase leading-none tracking-wide">Slick<span class="text-[#F2B33D]">Tee</span></span>
                </a>
                <p class="mt-4 max-w-sm text-sm leading-6 text-[#FBF7EF]/70">
                    <?php esc_html_e('Fan art merch for people who never really grew out of Saturday-morning cartoons. Vintage-washed tees, hoodies, shorts and caps — printed to order, one at a time.', 'dawp'); ?>
                </p>

                <address class="mt-6 grid max-w-sm gap-2.5 border-l-2 border-[#D7351E] pl-4 text-sm not-italic leading-6 text-[#FBF7EF]/75">
                    <a class="font-semibold text-[#FBF7EF] transition hover:text-[#F2B33D]" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
                    <span><a class="transition hover:text-[#F2B33D]" href="tel:+19093663939"><?php echo esc_html($us_phone); ?></a> · <?php esc_html_e('Mon–Fri 10am–6pm · Sat 8am–6pm', 'dawp'); ?></span>
                    <span><?php echo esc_html($us_address); ?></span>
                </address>
            </div>

            <?php foreach ($footer_columns as $column) : ?>
                <nav aria-label="<?php echo esc_attr($column['title']); ?>">
                    <h2 class="font-display text-lg uppercase tracking-wide text-[#FBF7EF]"><?php echo esc_html($column['title']); ?></h2>
                    <ul class="mt-4 grid gap-2 text-sm leading-6 text-[#FBF7EF]/75">
                        <?php foreach ($column['links'] as $link) : ?>
                            <li><a class="transition hover:text-[#F2B33D]" href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            <?php endforeach; ?>
        </div>

        <div class="mt-12 flex flex-col gap-4 border-t border-[#FBF7EF]/15 pt-6 sm:flex-row sm:items-center sm:justify-between">
            <p class="text-xs leading-5 text-[#FBF7EF]/55">&copy; <?php echo esc_html(gmdate('Y')); ?> SlickTee. <?php esc_html_e('All rights reserved. Designs are fan-made artwork; all characters and trademarks belong to their respective owners.', 'dawp'); ?></p>

            <ul class="flex flex-wrap items-center gap-2" aria-label="<?php esc_attr_e('Accepted payment methods', 'dawp'); ?>">
                <li>
                    <span class="inline-flex h-8 w-12 items-center justify-center rounded-[4px] bg-[#FFFFFF]" title="<?php esc_attr_e('Visa', 'dawp'); ?>">
                        <span class="sr-only"><?php esc_html_e('Visa', 'dawp'); ?></span>
                        <svg viewBox="0 0 64 40" width="40" height="24" aria-hidden="true" focusable="false">
                            <rect width="64" height="40" rx="5" fill="#fff"></rect>
                            <path d="M24.6 26.6h-4.2l2.6-13.2h4.2l-2.6 13.2Zm-7.8-13.2-4 9.1-.5-2.5-1.4-6.6H6.7l3.6 13.2h4.5l6.5-13.2h-4.5Zm21.9 8.9c0-3.5-5.8-2.8-5.8-4.4 0-.5.6-1.1 1.9-1.2 1.4-.1 2.9.3 3.9.7l.7-3.4c-1-.4-2.3-.8-4-.8-4.2 0-7.2 2.1-7.2 5.1 0 2.3 2.2 3.5 3.9 4.3 1.7.8 2.3 1.3 2.3 2 0 1.1-1.4 1.5-2.7 1.5-1.8 0-2.8-.3-4.3-.9l-.7 3.5c1 .5 2.8.9 4.7.9 4.5 0 7.3-2.1 7.3-5.3Zm11.1 4.3h3.9L50.3 13.4h-3.6c-.8 0-1.5.4-1.8 1.1l-6.3 12.1H43l.9-2.3h5.4l.5 2.3Zm-4.6-5.4 2.2-5.4 1.2 5.4h-3.4Z" fill="#1A1F71"></path>
                        </svg>
                    </span>
                </li>
                <li>
                    <span class="inline-flex h-8 w-12 items-center justify-center rounded-[4px] bg-[#FFFFFF]" title="<?php esc_attr_e('Mastercard', 'dawp'); ?>">
                        <span class="sr-only"><?php esc_html_e('Mastercard', 'dawp'); ?></span>
                        <svg viewBox="0 0 64 40" width="40" height="24" aria-hidden="true" focusable="false">
                            <rect width="64" height="40" rx="5" fill="#fff"></rect>
                            <circle cx="26" cy="20" r="10" fill="#EB001B"></circle>
                            <circle cx="38" cy="20" r="10" fill="#F79E1B"></circle>
                            <path d="M32 12.2a10 10 0 0 1 0 15.6 10 10 0 0 1 0-15.6Z" fill="#FF5F00"></path>
                        </svg>
                    </span>
                </li>
                <li>
                    <span class="inline-flex h-8 w-12 items-center justify-center rounded-[4px] bg-[#2E77BC]" title="<?php esc_attr_e('American Express', 'dawp'); ?>">
                        <span class="sr-only"><?php esc_html_e('American Express', 'dawp'); ?></span>
                        <svg viewBox="0 0 64 40" width="40" height="24" aria-hidden="true" focusable="false">
                            <rect width="64" height="40" rx="5" fill="#2E77BC"></rect>
                            <text x="32" y="25" text-anchor="middle" font-family="Arial, sans-serif" font-size="11" font-weight="700" fill="#fff">AMEX</text>
                        </svg>
                    </span>
                </li>
                <li>
                    <span class="inline-flex h-8 w-12 items-center justify-center rounded-[4px] bg-[#FFFFFF]" title="<?php esc_attr_e('PayPal', 'dawp'); ?>">
                        <span class="sr-only"><?php esc_html_e('PayPal', 'dawp'); ?></span>
                        <svg viewBox="0 0 64 40" width="40" height="24" aria-hidden="true" focusable="false">
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
</footer>

<?php wp_footer(); ?>
</body>
</html>
