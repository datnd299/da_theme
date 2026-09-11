<?php
/**
 * Site footer- Watchfavor.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$dawp_nav_cat_url = static function ($slug) {
    if (function_exists('dawp_product_category_url')) {
        return dawp_product_category_url($slug);
    }
    return home_url('/product-category/' . trim($slug, '/') . '/');
};

$dawp_collections = function_exists('dawp_lbq_product_categories') ? dawp_lbq_product_categories() : [];
$dawp_year = date('Y');
$dawp_email = function_exists('dawp_store_email') ? dawp_store_email() : 'support@watchfavor.com';
$dawp_address = function_exists('dawp_store_address') ? dawp_store_address() : '';

$dawp_payment_methods = [
    ['name' => __('Visa', 'dawp'), 'file' => 'visa.png'],
    ['name' => __('Mastercard', 'dawp'), 'file' => 'mastercard.png'],
    ['name' => __('American Express', 'dawp'), 'file' => 'amex.png'],
    ['name' => __('PayPal', 'dawp'), 'file' => 'paypal.png'],
];
?>

<footer class="border-t border-line bg-primary text-white">
    <div class="mx-auto max-w-[1280px] px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto max-w-xl text-center">
            <p class="font-heading text-xs font-semibold uppercase tracking-brand text-accent"><?php esc_html_e('Join the Inner Circle', 'dawp'); ?></p>
            <h2 class="mt-4 font-heading text-2xl font-semibold sm:text-3xl"><?php esc_html_e('Become Part of the Legacy', 'dawp'); ?></h2>
            <p class="mt-4 text-sm leading-7 text-white/70"><?php esc_html_e('Join our inner circle to receive early access to limited editions and mechanical insights.', 'dawp'); ?></p>

            <form id="newsletter-form" class="mx-auto mt-7 flex max-w-md flex-col gap-3 sm:flex-row">
                <label for="newsletter-email" class="sr-only"><?php esc_html_e('Email address', 'dawp'); ?></label>
                <input type="email" id="newsletter-email" required placeholder="<?php esc_attr_e('Your email address', 'dawp'); ?>" class="min-h-12 flex-1 border border-white/25 bg-transparent px-4 text-sm text-white placeholder-white/50 outline-none transition focus:border-accent">
                <button type="submit" class="inline-flex min-h-12 items-center justify-center bg-accent px-7 font-heading text-xs font-semibold uppercase tracking-button text-primary transition hover:bg-accent-hover">
                    <?php esc_html_e('Subscribe', 'dawp'); ?>
                </button>
            </form>
            <p id="newsletter-message" class="mt-3 hidden text-sm text-accent" role="status"></p>
        </div>

        <div class="mt-16 grid gap-10 border-t border-white/10 pt-14 sm:grid-cols-2 lg:grid-cols-4">
            <div>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center" aria-label="<?php echo esc_attr(dawp_store_name()); ?>">
                    <img src="<?php echo esc_url(get_theme_file_uri('assets/img/logo_wfavor.png')); ?>" alt="<?php echo esc_attr(dawp_store_name()); ?>" class="h-12 w-auto" width="1344" height="752">
                </a>
                <p class="mt-4 max-w-xs text-sm leading-7 text-white/60"><?php esc_html_e('Mechanical watches designed and finished in-house. No batteries, no screens- just the heartbeat of hundreds of micro-components, alive with your pulse.', 'dawp'); ?></p>
                <ul class="mt-5 space-y-2 text-sm text-white/60">
                    <li>
                        <a href="mailto:<?php echo esc_attr($dawp_email); ?>" class="transition hover:text-accent"><?php echo esc_html($dawp_email); ?></a>
                    </li>
                    <?php if ($dawp_address) : ?>
                        <li><?php echo esc_html($dawp_address); ?></li>
                    <?php endif; ?>
                </ul>
            </div>

            <div>
                <h3 class="font-heading text-xs font-semibold uppercase tracking-label text-white/50"><?php esc_html_e('Shop', 'dawp'); ?></h3>
                <ul class="mt-5 space-y-3 text-sm">
                    <?php foreach ($dawp_collections as $slug => $cat) : ?>
                        <li><a href="<?php echo esc_url($dawp_nav_cat_url($slug)); ?>" class="text-white/70 transition hover:text-accent"><?php echo esc_html($cat['name']); ?></a></li>
                    <?php endforeach; ?>
                    <li><a href="<?php echo esc_url($shop_url); ?>" class="text-white/70 transition hover:text-accent"><?php esc_html_e('All Watches', 'dawp'); ?></a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-heading text-xs font-semibold uppercase tracking-label text-white/50"><?php esc_html_e('Company', 'dawp'); ?></h3>
                <ul class="mt-5 space-y-3 text-sm">
                    <li><a href="<?php echo esc_url(home_url('/about-us/')); ?>" class="text-white/70 transition hover:text-accent"><?php esc_html_e('Brand Story', 'dawp'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/faq/')); ?>" class="text-white/70 transition hover:text-accent"><?php esc_html_e('FAQ', 'dawp'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="text-white/70 transition hover:text-accent"><?php esc_html_e('Contact Us', 'dawp'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="text-white/70 transition hover:text-accent"><?php esc_html_e('Track Order', 'dawp'); ?></a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-heading text-xs font-semibold uppercase tracking-label text-white/50"><?php esc_html_e('Legal', 'dawp'); ?></h3>
                <ul class="mt-5 space-y-3 text-sm">
                    <li><a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>" class="text-white/70 transition hover:text-accent"><?php esc_html_e('Shipping Policy', 'dawp'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/return-refund-policy/')); ?>" class="text-white/70 transition hover:text-accent"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/billing-terms-conditions/')); ?>" class="text-white/70 transition hover:text-accent"><?php esc_html_e('Billing Terms', 'dawp'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/terms-of-service/')); ?>" class="text-white/70 transition hover:text-accent"><?php esc_html_e('Terms of Service', 'dawp'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>" class="text-white/70 transition hover:text-accent"><?php esc_html_e('Privacy Policy', 'dawp'); ?></a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="border-t border-white/10 bg-primary-dark">
        <div class="mx-auto flex max-w-[1280px] flex-col items-center justify-between gap-4 px-4 py-6 text-xs text-white/50 sm:flex-row sm:px-6 lg:px-8">
            <p><?php echo esc_html(sprintf(__('© %1$s %2$s. All rights reserved.', 'dawp'), $dawp_year, dawp_store_name())); ?></p>
            <p><?php esc_html_e('Free US shipping · 30-day returns · 2-year warranty', 'dawp'); ?></p>
            <ul class="flex items-center gap-2" aria-label="<?php esc_attr_e('Accepted payment methods', 'dawp'); ?>">
                <?php foreach ($dawp_payment_methods as $method) :
                    $payment_path = get_theme_file_path('assets/img/payment/' . $method['file']);
                    if (!file_exists($payment_path)) {
                        continue;
                    }
                    $payment_url = get_theme_file_uri('assets/img/payment/' . $method['file']);
                    ?>
                    <li class="flex h-7 w-11 items-center justify-center bg-white p-1">
                        <img src="<?php echo esc_url($payment_url); ?>" alt="<?php echo esc_attr($method['name']); ?>" loading="lazy" decoding="async" class="max-h-full max-w-full object-contain">
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
