<?php
/**
 * Theme footer — YourWatchStore.
 *
 * Mast-headed footer with a commerce sitemap link block. Tailwind utilities only.
 * Business address is pulled from WooCommerce > Settings > General > Store Address.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email  = 'support@yourwatchstore.com';
$business_hours = __('Monday - Friday, 9:00 AM - 5:00 PM EST', 'dawp');
$theme_img_uri  = get_template_directory_uri() . '/assets/img';

$store_address = '';
if (function_exists('dawp_get_woocommerce_store_address')) {
    $store_address = dawp_get_woocommerce_store_address();
}

$dawp_footer_category_url = static function ($slug) {
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

$trust_badges = [
    ['label' => __('Free US Shipping', 'dawp'), 'detail' => __('on every order', 'dawp')],
    ['label' => __('30-Day Returns', 'dawp'), 'detail' => __('unworn, with box & papers', 'dawp')],
    ['label' => __('Automatic Movements', 'dawp'), 'detail' => __('across the range', 'dawp')],
    ['label' => __('Secure Checkout', 'dawp'), 'detail' => __('encrypted payment', 'dawp')],
];

$link_groups = [
    [
        'title' => __('Shop', 'dawp'),
        'links' => [
            ['title' => __('Shop All', 'dawp'), 'url' => $shop_url],
            ['title' => __('Dive Watches', 'dawp'), 'url' => $dawp_footer_category_url('dive-watches')],
            ['title' => __('Field Watches', 'dawp'), 'url' => $dawp_footer_category_url('field-watches')],
            ['title' => __('Dress Watches', 'dawp'), 'url' => $dawp_footer_category_url('dress-watches')],
            ['title' => __('Chronograph Watches', 'dawp'), 'url' => $dawp_footer_category_url('chronograph-watches')],
        ],
    ],
    [
        'title' => __('Support', 'dawp'),
        'links' => [
            ['title' => __('FAQ', 'dawp'), 'url' => home_url('/faq/')],
            ['title' => __('Track Your Order', 'dawp'), 'url' => home_url('/track-order/')],
            ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/')],
            ['title' => __('My Account', 'dawp'), 'url' => $account_url],
        ],
    ],
    [
        'title' => __('Company', 'dawp'),
        'links' => [
            ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/')],
        ],
    ],
    [
        'title' => __('Policy', 'dawp'),
        'links' => [
            ['title' => __('Shipping Policy', 'dawp'), 'url' => home_url('/shipping-policy/')],
            ['title' => __('Refund & Return Policy', 'dawp'), 'url' => home_url('/refund-return-policy/')],
            ['title' => __('Privacy Policy', 'dawp'), 'url' => home_url('/privacy-policy/')],
            ['title' => __('Terms & Conditions', 'dawp'), 'url' => home_url('/terms-conditions/')],
            ['title' => __('Billing Terms & Conditions', 'dawp'), 'url' => home_url('/billing-terms-conditions/')],
        ],
    ],
];

$payment_methods = [
    ['file' => 'visa.png', 'name' => 'Visa'],
    ['file' => 'mastercard.png', 'name' => 'Mastercard'],
    ['file' => 'amex.png', 'name' => 'American Express'],
    ['file' => 'paypal.png', 'name' => 'PayPal'],
];
?>

</div><!-- #content -->

<footer class="border-t border-border bg-surface-alt" role="contentinfo">
    <div class="mx-auto max-w-[1280px] px-4 py-12 sm:px-6 lg:px-8 lg:py-16">

        <div class="flex flex-col gap-8 border-b border-border pb-8 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-block" aria-label="<?php esc_attr_e('YourWatchStore home', 'dawp'); ?>">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo.png'); ?>" alt="<?php esc_attr_e('YourWatchStore', 'dawp'); ?>" class="h-10 w-auto" width="179" height="100">
                </a>
                <p class="mt-3 max-w-sm text-sm leading-6 text-foreground-muted">
                    <?php esc_html_e('Mechanical watches for every day. Automatic dive, field, dress, and chronograph timepieces designed for everyday wear.', 'dawp'); ?>
                </p>
            </div>

            <dl class="grid grid-cols-2 gap-x-6 gap-y-4 sm:grid-cols-4 lg:gap-x-8">
                <?php foreach ($trust_badges as $badge) : ?>
                    <div>
                        <dt class="text-xs font-bold uppercase tracking-[0.08em] text-foreground"><?php echo esc_html($badge['label']); ?></dt>
                        <dd class="mt-1 text-xs text-foreground-muted"><?php echo esc_html($badge['detail']); ?></dd>
                    </div>
                <?php endforeach; ?>
            </dl>
        </div>

        <div class="grid grid-cols-2 gap-x-8 gap-y-8 border-b border-border py-8 sm:grid-cols-4">
            <?php foreach ($link_groups as $group) : ?>
                <div>
                    <p class="mb-4 text-sm font-bold uppercase tracking-[0.06em] text-foreground"><?php echo esc_html($group['title']); ?></p>
                    <ul class="space-y-2.5 text-sm text-foreground-muted">
                        <?php foreach ($group['links'] as $link) : ?>
                            <li><a class="transition hover:text-foreground" href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="flex flex-col gap-4 py-8 text-xs text-foreground-muted lg:flex-row lg:items-center lg:justify-between">
            <div class="flex flex-wrap items-center gap-x-4 gap-y-2">
                <a class="font-semibold text-foreground transition hover:text-accent-blush" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
                <span class="hidden text-border sm:inline">·</span>
                <span><?php echo esc_html($business_hours); ?></span>
                <?php if ($store_address) : ?>
                    <span class="hidden text-border sm:inline">·</span>
                    <span><?php echo esc_html($store_address); ?></span>
                <?php endif; ?>
            </div>
            <div class="flex flex-wrap items-center gap-2">
                <?php foreach ($payment_methods as $pm) : ?>
                    <img src="<?php echo esc_url($theme_img_uri . '/payment/' . $pm['file']); ?>" alt="<?php echo esc_attr($pm['name']); ?>" width="46" height="28" loading="lazy" decoding="async" class="h-7 w-auto rounded-sm border border-border bg-white">
                <?php endforeach; ?>
            </div>
        </div>

        <div class="flex flex-col gap-2 border-t border-border pt-6 text-xs text-muted lg:flex-row lg:items-center lg:justify-between">
            <p>&copy; <?php echo esc_html(gmdate('Y')); ?> <?php esc_html_e('YourWatchStore. All rights reserved.', 'dawp'); ?></p>
            <p><?php esc_html_e('yourwatchstore.com', 'dawp'); ?></p>
        </div>
    </div>
</footer>

<?php if (function_exists('dawp_cart_fab_markup')) : dawp_cart_fab_markup(); endif; ?>
<?php if (function_exists('dawp_cart_drawer_markup')) : dawp_cart_drawer_markup(); endif; ?>

<?php wp_footer(); ?>
</body>
</html>
