<?php
/**
 * Theme footer.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email   = 'support@mybaapstore.com';
$business_hours  = __('Monday - Friday, 9:00 AM - 6:00 PM EST', 'dawp');
$store_address   = __('681 Main St, Belleville, NJ 07109, USA', 'dawp');
$facebook_url    = 'https://www.facebook.com/mybaapstore/';
$footer_logo_url = get_theme_file_uri('/assets/img/gallery/Logo_all (4).png');

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
            ['title' => __('Smart Gadgets', 'dawp'), 'url' => $footer_category_url('smart-gadgets')],
            ['title' => __('Home & Kitchen Gadgets', 'dawp'), 'url' => $footer_category_url('home-kitchen-gadgets')],
            ['title' => __('Personal Care Devices', 'dawp'), 'url' => $footer_category_url('personal-care-devices')],
            ['title' => __('Camera & Tech Accessories', 'dawp'), 'url' => $footer_category_url('camera-tech-accessories')],
            ['title' => __('Daily Tools', 'dawp'), 'url' => $footer_category_url('daily-tools')],
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
            ['title' => __('Shipping & Return', 'dawp'), 'url' => home_url('/shipping-returns/')],
            ['title' => __('Privacy Policy', 'dawp'), 'url' => home_url('/privacy-policy/')],
            ['title' => __('Terms & Conditions', 'dawp'), 'url' => home_url('/terms-conditions/')],
            ['title' => __('FAQs', 'dawp'), 'url' => home_url('/faq/')],
        ],
    ],
];

?>

</div><!-- #content -->

<footer class="bg-[#102A43] text-white" role="contentinfo">
    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8 lg:py-12">
        <div class="grid gap-8 lg:grid-cols-[0.9fr_1.7fr]">
            <div>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center" aria-label="<?php esc_attr_e('MyBaapStore home', 'dawp'); ?>">
                    <img class="h-14 w-auto max-w-[154px] object-contain sm:h-16 sm:max-w-[176px]" src="<?php echo esc_url($footer_logo_url); ?>" alt="<?php esc_attr_e('MyBaapStore logo', 'dawp'); ?>" width="375" height="188">
                </a>

                <p class="mt-4 max-w-md text-sm leading-6 text-white/70">
                    <?php esc_html_e('MyBaapStore offers practical gadgets and everyday electronic tools for home, kitchen, grooming, camera and tech accessories, and daily convenience.', 'dawp'); ?>
                </p>

                <div class="mt-5 grid gap-2 text-sm leading-6 text-white/75">
                    <div class="flex items-start gap-3">
                        <span class="mt-0.5 inline-flex h-6 w-6 shrink-0 items-center justify-center text-[#5BA8A0]" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="17" height="17" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 1 1 16 0Z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </span>
                        <p>
                            <span class="font-bold text-white"><?php esc_html_e('Address:', 'dawp'); ?></span>
                            <?php echo esc_html($store_address); ?>
                        </p>
                    </div>

                    <div class="flex items-start gap-3">
                        <span class="mt-0.5 inline-flex h-6 w-6 shrink-0 items-center justify-center text-[#5BA8A0]" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="17" height="17" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                <path d="m22 7-10 6L2 7"></path>
                            </svg>
                        </span>
                        <p>
                            <span class="font-bold text-white"><?php esc_html_e('Email:', 'dawp'); ?></span>
                            <a class="break-all transition hover:text-white" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
                        </p>
                    </div>

                    <div class="flex items-start gap-3">
                        <span class="mt-0.5 inline-flex h-6 w-6 shrink-0 items-center justify-center text-[#5BA8A0]" aria-hidden="true">
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

                <div class="mt-5 flex items-center gap-3">
                    <span class="text-sm font-bold text-white"><?php esc_html_e('Follow:', 'dawp'); ?></span>
                    <a class="inline-flex h-9 w-9 items-center justify-center rounded-full border border-white/20 bg-white/10 text-white transition hover:border-white hover:bg-white hover:text-[#102A43]" href="<?php echo esc_url($facebook_url); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e('Follow MyBaapStore on Facebook', 'dawp'); ?>">
                        <svg viewBox="0 0 24 24" width="17" height="17" fill="currentColor" aria-hidden="true">
                            <path d="M13.5 21v-8h2.7l.4-3h-3.1V8.1c0-.9.2-1.5 1.5-1.5h1.7V3.9c-.3 0-1.3-.1-2.4-.1-2.4 0-4.1 1.5-4.1 4.1V10H7.5v3h2.7v8h3.3Z"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="grid gap-7 sm:grid-cols-3 lg:pt-1">
                <?php foreach ($footer_columns as $column) : ?>
                    <nav aria-label="<?php echo esc_attr($column['title']); ?>">
                        <h2 class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#5BA8A0]"><?php echo esc_html($column['title']); ?></h2>
                        <ul class="mt-4 grid gap-2 text-sm leading-6 text-white/75">
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

        <div class="mt-8 flex flex-col gap-3 border-t border-white/15 pt-5 text-sm text-white/60 lg:flex-row lg:items-center lg:justify-between">
            <p>&copy; <?php echo esc_html(gmdate('Y')); ?> MyBaapStore. <?php esc_html_e('All rights reserved.', 'dawp'); ?></p>
            <div class="flex flex-wrap gap-x-5 gap-y-2">
                <a class="transition hover:text-white" href="<?php echo esc_url(home_url('/shipping-returns/')); ?>"><?php esc_html_e('Shipping & Return', 'dawp'); ?></a>
                <a class="transition hover:text-white" href="<?php echo esc_url(home_url('/privacy-policy/')); ?>"><?php esc_html_e('Privacy Policy', 'dawp'); ?></a>
                <a class="transition hover:text-white" href="<?php echo esc_url(home_url('/terms-conditions/')); ?>"><?php esc_html_e('Terms & Conditions', 'dawp'); ?></a>
                <a class="transition hover:text-white" href="<?php echo esc_url(home_url('/faq/')); ?>"><?php esc_html_e('FAQs', 'dawp'); ?></a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
