<?php
/**
 * Theme footer.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email   = 'support@eliteshopexpress.com';
$business_hours  = __('Monday - Friday, 9:00 AM - 6:00 PM EST', 'dawp');
$company_address = '447 Broadway, 2nd Floor, New York, NY 10013, United States';
$shop_url        = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$account_url     = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

if (!$account_url) {
    $account_url = home_url('/my-account/');
}

$footer_columns = [
    [
        'title' => __('Shop', 'dawp'),
        'links' => [
            ['title' => __('Shop All', 'dawp'), 'url' => $shop_url],
            ['title' => __('Men', 'dawp'), 'url' => $shop_url],
            ['title' => __('Women', 'dawp'), 'url' => $shop_url],
            ['title' => __('Kids', 'dawp'), 'url' => $shop_url],
            ['title' => __('Personalized Gifts', 'dawp'), 'url' => $shop_url],
        ],
    ],
    [
        'title' => __('Support', 'dawp'),
        'links' => [
            ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/')],
            ['title' => __('How It Works', 'dawp'), 'url' => home_url('/#how-it-works')],
            ['title' => __('FAQ', 'dawp'), 'url' => home_url('/faq/')],
            ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/')],
            ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/')],
        ],
    ],
    [
        'title' => __('Policy', 'dawp'),
        'links' => [
            ['title' => __('Privacy Policy', 'dawp'), 'url' => home_url('/privacy-policy/')],
            ['title' => __('Terms & Conditions', 'dawp'), 'url' => home_url('/terms-conditions/')],
            ['title' => __('Shipping Policy', 'dawp'), 'url' => home_url('/shipping-returns/')],
            ['title' => __('Return & Refund Policy', 'dawp'), 'url' => home_url('/shipping-returns/#returns')],
        ],
    ],
];
?>

</div><!-- #content -->

<footer class="bg-[#111827] text-white" role="contentinfo">
    <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
        <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-[1.1fr_0.7fr_0.7fr_0.7fr_1.1fr]">
            <div>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo inline-flex items-center" aria-label="<?php esc_attr_e('Eliteshop Express home', 'dawp'); ?>">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo-eliteshop-express-light-400.png'); ?>" srcset="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo-eliteshop-express-light-800.png'); ?> 2x" width="400" height="56" alt="<?php esc_attr_e('Eliteshop Express', 'dawp'); ?>" loading="lazy">
                </a>
                <p class="mt-4 max-w-xs text-sm leading-6 text-white/70">
                    <?php esc_html_e('Personalized apparel made your way. Choose a style, make it yours, and we print it to order and ship it to your door.', 'dawp'); ?>
                </p>
                <p class="mt-4 max-w-xs text-sm leading-6 text-white/50"><?php echo esc_html($company_address); ?></p>
            </div>

            <nav aria-label="<?php echo esc_attr($footer_columns[0]['title']); ?>">
                <h2 class="text-xs font-extrabold uppercase tracking-[0.16em] text-white/50"><?php echo esc_html($footer_columns[0]['title']); ?></h2>
                <ul class="mt-4 grid gap-2 text-sm leading-6 text-white/75">
                    <?php foreach ($footer_columns[0]['links'] as $link) : ?>
                        <li>
                            <a class="transition hover:text-[#FF5A5F]" href="<?php echo esc_url($link['url']); ?>">
                                <?php echo esc_html($link['title']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <nav aria-label="<?php echo esc_attr($footer_columns[1]['title']); ?>">
                <h2 class="text-xs font-extrabold uppercase tracking-[0.16em] text-white/50"><?php echo esc_html($footer_columns[1]['title']); ?></h2>
                <ul class="mt-4 grid gap-2 text-sm leading-6 text-white/75">
                    <?php foreach ($footer_columns[1]['links'] as $link) : ?>
                        <li>
                            <a class="transition hover:text-[#FF5A5F]" href="<?php echo esc_url($link['url']); ?>">
                                <?php echo esc_html($link['title']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                    <li>
                        <a class="transition hover:text-[#FF5A5F]" href="<?php echo esc_url($account_url); ?>"><?php esc_html_e('My Account', 'dawp'); ?></a>
                    </li>
                </ul>
            </nav>

            <nav aria-label="<?php echo esc_attr($footer_columns[2]['title']); ?>">
                <h2 class="text-xs font-extrabold uppercase tracking-[0.16em] text-white/50"><?php echo esc_html($footer_columns[2]['title']); ?></h2>
                <ul class="mt-4 grid gap-2 text-sm leading-6 text-white/75">
                    <?php foreach ($footer_columns[2]['links'] as $link) : ?>
                        <li>
                            <a class="transition hover:text-[#FF5A5F]" href="<?php echo esc_url($link['url']); ?>">
                                <?php echo esc_html($link['title']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <div>
                <h2 class="text-xs font-extrabold uppercase tracking-[0.16em] text-white/50"><?php esc_html_e('Customer Care', 'dawp'); ?></h2>
                <ul class="mt-4 grid gap-2 text-sm leading-6 text-white/75">
                    <li><a class="transition hover:text-[#FF5A5F]" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a></li>
                    <li><?php echo esc_html($business_hours); ?></li>
                    <li><?php esc_html_e('We reply within 1 business day.', 'dawp'); ?></li>
                </ul>

                <div class="mt-6">
                    <p class="text-sm font-bold text-white"><?php esc_html_e('Accepted Payments', 'dawp'); ?></p>
                    <ul class="mt-3 flex flex-wrap items-center gap-2" aria-label="<?php esc_attr_e('Accepted payment methods', 'dawp'); ?>">
                        <li>
                            <span class="inline-flex h-8 w-12 items-center justify-center rounded-[var(--radius-sm)] bg-white" title="<?php esc_attr_e('Visa', 'dawp'); ?>">
                                <span class="sr-only"><?php esc_html_e('Visa', 'dawp'); ?></span>
                                <svg viewBox="0 0 64 40" width="40" height="24" aria-hidden="true" focusable="false">
                                    <rect width="64" height="40" rx="5" fill="#fff"></rect>
                                    <path d="M24.6 26.6h-4.2l2.6-13.2h4.2l-2.6 13.2Zm-7.8-13.2-4 9.1-.5-2.5-1.4-6.6H6.7l3.6 13.2h4.5l6.5-13.2h-4.5Zm21.9 8.9c0-3.5-5.8-2.8-5.8-4.4 0-.5.6-1.1 1.9-1.2 1.4-.1 2.9.3 3.9.7l.7-3.4c-1-.4-2.3-.8-4-.8-4.2 0-7.2 2.1-7.2 5.1 0 2.3 2.2 3.5 3.9 4.3 1.7.8 2.3 1.3 2.3 2 0 1.1-1.4 1.5-2.7 1.5-1.8 0-2.8-.3-4.3-.9l-.7 3.5c1 .5 2.8.9 4.7.9 4.5 0 7.3-2.1 7.3-5.3Zm11.1 4.3h3.9L50.3 13.4h-3.6c-.8 0-1.5.4-1.8 1.1l-6.3 12.1H43l.9-2.3h5.4l.5 2.3Zm-4.6-5.4 2.2-5.4 1.2 5.4h-3.4Z" fill="#1A1F71"></path>
                                </svg>
                            </span>
                        </li>
                        <li>
                            <span class="inline-flex h-8 w-12 items-center justify-center rounded-[var(--radius-sm)] bg-white" title="<?php esc_attr_e('Mastercard', 'dawp'); ?>">
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
                            <span class="inline-flex h-8 w-12 items-center justify-center rounded-[var(--radius-sm)] bg-white" title="<?php esc_attr_e('PayPal', 'dawp'); ?>">
                                <span class="sr-only"><?php esc_html_e('PayPal', 'dawp'); ?></span>
                                <svg viewBox="0 0 64 40" width="40" height="24" aria-hidden="true" focusable="false">
                                    <rect width="64" height="40" rx="5" fill="#fff"></rect>
                                    <path d="M24 12h9.6c4 0 6.6 2.1 6 5.9-.7 4.7-3.9 7.2-8.4 7.2h-2.5l-.9 5.1H22l2-18.2Z" fill="#003087"></path>
                                    <path d="M31.1 17h8.7c3.7 0 5.5 2.1 5 5.3-.6 4.1-3.5 6.5-7.6 6.5h-2.8l-.8 4.2h-5.2L31.1 17Z" fill="#009CDE"></path>
                                    <path d="M30 16.5h3.6c2.1 0 3.5.8 3.3 2.7-.3 2.2-1.9 3.2-4.1 3.2h-3.4L30 16.5Z" fill="#012169"></path>
                                </svg>
                            </span>
                        </li>
                        <li>
                            <span class="inline-flex h-8 w-12 items-center justify-center rounded-[var(--radius-sm)] bg-white" title="<?php esc_attr_e('Apple Pay', 'dawp'); ?>">
                                <span class="sr-only"><?php esc_html_e('Apple Pay', 'dawp'); ?></span>
                                <svg viewBox="0 0 64 40" width="40" height="24" aria-hidden="true" focusable="false">
                                    <rect width="64" height="40" rx="5" fill="#000"></rect>
                                    <path d="M19.7 15.3c-.5.6-1.3 1.1-2.1 1-.1-.8.3-1.7.7-2.2.5-.6 1.4-1.1 2.1-1.1.1.9-.2 1.7-.7 2.3Zm.7 1.1c-1.2-.1-2.2.7-2.8.7-.6 0-1.4-.6-2.4-.6-1.2 0-2.4.7-3 1.9-1.3 2.2-.3 5.5.9 7.3.6.9 1.3 1.9 2.3 1.8 .9 0 1.3-.6 2.4-.6s1.4.6 2.4.5c1-.1 1.6-.9 2.2-1.8.7-1 1-2 1-2.1 0 0-1.9-.7-1.9-2.9 0-1.8 1.5-2.7 1.6-2.7-.9-1.3-2.2-1.4-2.7-1.5Z" fill="#fff"></path>
                                    <text x="26" y="25" font-family="Arial" font-size="9" fill="#fff">Pay</text>
                                </svg>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="mt-10 border-t border-white/15 pt-6 text-sm text-white/50">
            <p>&copy; <?php echo esc_html(gmdate('Y')); ?> Eliteshop Express. <?php esc_html_e('All rights reserved.', 'dawp'); ?></p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
