<?php
/**
 * Theme footer.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email  = 'support@lbqshop.com';
$business_hours = __('Monday - Friday, 9:00 AM - 6:00 PM EST', 'dawp');
$store_address  = __('4803 N Milwaukee AveChicago, IL 60630', 'dawp');
$instagram_url  = 'https://www.instagram.com/thelbqshop/';
$facebook_url   = 'https://www.facebook.com/lacedbyQ/';

$footer_category_url = static function ($slug) {
    if (function_exists('get_term_by')) {
        $term = get_term_by('slug', $slug, 'product_cat');

        if ($term && !is_wp_error($term)) {
            $link = get_term_link($term);

            if (!is_wp_error($link)) {
                return $link;
            }
        }
    }

    return home_url('/product-category/' . trim($slug, '/') . '/');
};

$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$account_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');

if (!$account_url) {
    $account_url = home_url('/my-account/');
}

$footer_columns = [
    [
        'title' => __('Shop Categories', 'dawp'),
        'links' => [
            ['title' => __('Shop All', 'dawp'), 'url' => $shop_url],
            ['title' => __('Beauty Accessories', 'dawp'), 'url' => $footer_category_url('beauty-accessories')],
            ['title' => __('Makeup Bags & Organizers', 'dawp'), 'url' => $footer_category_url('makeup-bags-organizers')],
            ['title' => __('Fashion Accessories', 'dawp'), 'url' => $footer_category_url('fashion-accessories')],
            ['title' => __('Everyday Style Essentials', 'dawp'), 'url' => $footer_category_url('everyday-style-essentials')],
            ['title' => __('Giftable Finds', 'dawp'), 'url' => $footer_category_url('giftable-finds')],
        ],
    ],
    [
        'title' => __('Customer Care', 'dawp'),
        'links' => [
            ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/')],
            ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/')],
            ['title' => __('Track Your Order', 'dawp'), 'url' => home_url('/track-order/')],
            ['title' => __('My Account', 'dawp'), 'url' => $account_url],
        ],
    ],
    [
        'title' => __('Store Policy', 'dawp'),
        'links' => [
            ['title' => __('FAQs', 'dawp'), 'url' => home_url('/faq/')],
            ['title' => __('Shipping & Returns', 'dawp'), 'url' => home_url('/shipping-returns/')],
            ['title' => __('Privacy Policy', 'dawp'), 'url' => home_url('/privacy-policy/')],
            ['title' => __('Terms & Conditions', 'dawp'), 'url' => home_url('/terms-conditions/')],
        ],
    ],
];

?>

</div><!-- #content -->

<footer class="bg-[#2F2A28] text-white" role="contentinfo">
    <div class="border-b border-white/10 bg-[#3A302C]">
        <div class="mx-auto flex max-w-7xl flex-col gap-3 px-4 py-4 text-sm text-white/80 sm:px-6 lg:flex-row lg:items-center lg:justify-between lg:px-8">
            <p class="font-semibold text-[#F6D5CF]"><?php esc_html_e('Pretty, practical accessories for beauty routines, travel, and everyday style.', 'dawp'); ?></p>
            <div class="flex flex-wrap gap-x-5 gap-y-2">
                <span><?php esc_html_e('Cut off: 2:00 PM PST', 'dawp'); ?></span>
                <span><?php esc_html_e('Handling: 0-1 business days', 'dawp'); ?></span>
                <span><?php esc_html_e('Transit: 0 business days', 'dawp'); ?></span>
                <span><?php esc_html_e('30-day eligible returns', 'dawp'); ?></span>
            </div>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8 lg:py-12">
        <div class="grid gap-9 lg:grid-cols-[0.95fr_1.7fr]">
            <div>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center" aria-label="<?php esc_attr_e('LBQ Shop home', 'dawp'); ?>">
                    <img
                        class="h-auto w-48 sm:w-56 lg:w-60"
                        src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/logo-footer.png'); ?>"
                        width="1053"
                        height="473"
                        alt="<?php esc_attr_e('LBQ Shop', 'dawp'); ?>"
                        loading="lazy"
                    >
                </a>

                <div class="mt-6 grid gap-3 text-sm leading-6 text-white/75">
                    <div class="flex items-start gap-3">
                        <span class="mt-0.5 inline-flex h-6 w-6 shrink-0 items-center justify-center text-[#F6D5CF]" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="17" height="17" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                <path d="m22 7-10 6L2 7"></path>
                            </svg>
                        </span>
                        <p>
                            <span class="font-bold text-white"><?php esc_html_e('Email:', 'dawp'); ?></span>
                            <a class="break-all transition hover:text-[#F6D5CF]" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
                        </p>
                    </div>

                    <div class="flex items-start gap-3">
                        <span class="mt-0.5 inline-flex h-6 w-6 shrink-0 items-center justify-center text-[#F6D5CF]" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="17" height="17" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </span>
                        <p>
                            <span class="font-bold text-white"><?php esc_html_e('Address:', 'dawp'); ?></span>
                            <?php echo esc_html($store_address); ?>
                        </p>
                    </div>

                    <div class="flex items-start gap-3">
                        <span class="mt-0.5 inline-flex h-6 w-6 shrink-0 items-center justify-center text-[#F6D5CF]" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="17" height="17" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M12 6v6l4 2"></path>
                            </svg>
                        </span>
                        <p>
                            <span class="font-bold text-white"><?php esc_html_e('Hours:', 'dawp'); ?></span>
                            <?php echo esc_html($business_hours); ?>
                        </p>
                    </div>
                </div>

                <div class="mt-6">
                    <p class="text-sm font-bold text-white"><?php esc_html_e('Follow LBQ Shop', 'dawp'); ?></p>
                    <div class="mt-3 flex items-center gap-3">
                        <a class="inline-flex h-12 w-12 items-center justify-center rounded-md bg-[#E4405F] text-white shadow-lg shadow-black/10 transition hover:-translate-y-0.5 hover:bg-white hover:text-[#E4405F]" href="<?php echo esc_url($instagram_url); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e('Follow LBQ Shop on Instagram', 'dawp'); ?>">
                            <svg viewBox="0 0 24 24" width="23" height="23" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <rect width="18" height="18" x="3" y="3" rx="5"></rect>
                                <circle cx="12" cy="12" r="4"></circle>
                                <circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"></circle>
                            </svg>
                        </a>
                        <a class="inline-flex h-12 w-12 items-center justify-center rounded-md bg-[#1877F2] text-white shadow-lg shadow-black/10 transition hover:-translate-y-0.5 hover:bg-white hover:text-[#1877F2]" href="<?php echo esc_url($facebook_url); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e('Follow LBQ Shop on Facebook', 'dawp'); ?>">
                            <svg viewBox="0 0 24 24" width="22" height="22" fill="currentColor" aria-hidden="true">
                                <path d="M13.5 21v-8h2.7l.4-3h-3.1V8.1c0-.9.2-1.5 1.5-1.5h1.7V3.9c-.3 0-1.3-.1-2.4-.1-2.4 0-4.1 1.5-4.1 4.1V10H7.5v3h2.7v8h3.3Z"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="mt-6">
                    <p class="text-sm font-bold text-white"><?php esc_html_e('Accepted Payments', 'dawp'); ?></p>
                    <ul class="mt-3 flex flex-wrap items-center gap-2.5" aria-label="<?php esc_attr_e('Accepted payment methods', 'dawp'); ?>">
                        <li>
                            <span class="inline-flex h-9 w-14 items-center justify-center rounded-md bg-white p-1 shadow-lg shadow-black/10" title="<?php esc_attr_e('Visa', 'dawp'); ?>">
                                <span class="sr-only"><?php esc_html_e('Visa', 'dawp'); ?></span>
                                <img class="h-full w-full object-contain" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/payment/visa.png'); ?>" alt="" loading="lazy" aria-hidden="true">
                            </span>
                        </li>
                        <li>
                            <span class="inline-flex h-9 w-14 items-center justify-center rounded-md bg-white p-1 shadow-lg shadow-black/10" title="<?php esc_attr_e('Mastercard', 'dawp'); ?>">
                                <span class="sr-only"><?php esc_html_e('Mastercard', 'dawp'); ?></span>
                                <img class="h-full w-full object-contain" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/payment/master%20card.png'); ?>" alt="" loading="lazy" aria-hidden="true">
                            </span>
                        </li>
                        <li>
                            <span class="inline-flex h-9 w-14 items-center justify-center rounded-md bg-white p-1 shadow-lg shadow-black/10" title="<?php esc_attr_e('American Express', 'dawp'); ?>">
                                <span class="sr-only"><?php esc_html_e('American Express', 'dawp'); ?></span>
                                <img class="h-full w-full object-contain" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/payment/AX.png'); ?>" alt="" loading="lazy" aria-hidden="true">
                            </span>
                        </li>
                        <li>
                            <span class="inline-flex h-9 w-14 items-center justify-center rounded-md bg-white p-1 shadow-lg shadow-black/10" title="<?php esc_attr_e('PayPal', 'dawp'); ?>">
                                <span class="sr-only"><?php esc_html_e('PayPal', 'dawp'); ?></span>
                                <img class="h-full w-full object-contain" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/payment/paypal.png'); ?>" alt="" loading="lazy" aria-hidden="true">
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="grid gap-7 sm:grid-cols-3 lg:pt-1">
                <?php foreach ($footer_columns as $column) : ?>
                    <nav aria-label="<?php echo esc_attr($column['title']); ?>">
                        <h2 class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#F6D5CF]"><?php echo esc_html($column['title']); ?></h2>
                        <ul class="mt-4 grid gap-2 text-sm leading-6 text-white/75">
                            <?php foreach ($column['links'] as $link) : ?>
                                <li>
                                    <a class="transition hover:text-[#F6D5CF]" href="<?php echo esc_url($link['url']); ?>">
                                        <?php echo esc_html($link['title']); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </nav>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="mt-8 flex flex-col gap-3 border-t border-white/15 pt-5 text-sm text-white/60 lg:flex-row lg:items-center lg:justify-between">
            <p>&copy; <?php echo esc_html(gmdate('Y')); ?> LBQ Shop. <?php esc_html_e('All rights reserved.', 'dawp'); ?></p>
            <div class="flex flex-wrap gap-x-5 gap-y-2">
                <a class="transition hover:text-[#F6D5CF]" href="<?php echo esc_url(home_url('/shipping-returns/')); ?>"><?php esc_html_e('Shipping & Returns', 'dawp'); ?></a>
                <a class="transition hover:text-[#F6D5CF]" href="<?php echo esc_url(home_url('/privacy-policy/')); ?>"><?php esc_html_e('Privacy Policy', 'dawp'); ?></a>
                <a class="transition hover:text-[#F6D5CF]" href="<?php echo esc_url(home_url('/terms-conditions/')); ?>"><?php esc_html_e('Terms & Conditions', 'dawp'); ?></a>
                <a class="transition hover:text-[#F6D5CF]" href="<?php echo esc_url(home_url('/faq/')); ?>"><?php esc_html_e('FAQs', 'dawp'); ?></a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
