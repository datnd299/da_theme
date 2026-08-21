<?php
/**
 * Theme footer.
 *
 * Hallmark · genre: modern-minimal · footer: Ft1 Mast-headed, enriched with
 * dense Ft4-flavored link rows (justified commerce-sitemap exception to the
 * Ft3 ban - no boxed columns, no social-icon showcase row, no tiny copyright
 * tail) · design-system: .plans/design_system.md (locked)
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email  = 'support@uswatchstore.com';
$business_hours = __('Monday - Friday, 9:00 AM - 6:00 PM EST', 'dawp');
$theme_img_uri  = get_template_directory_uri() . '/assets/img';

// Pulled from WooCommerce > Settings > General > Store Address.
$store_address = function_exists('dawp_get_store_address') ? dawp_get_store_address() : '';

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

$trust_badges = [
    ['label' => __('Free US Shipping', 'dawp'), 'detail' => __('on all orders', 'dawp')],
    ['label' => __('2-Year Warranty', 'dawp'), 'detail' => __('on every watch', 'dawp')],
    ['label' => __('30-Day Returns', 'dawp'), 'detail' => __('no questions asked', 'dawp')],
    ['label' => __('Quality Assured', 'dawp'), 'detail' => __('inspected before shipping', 'dawp')],
];

$link_groups = [
    [
        'title' => __('Shop', 'dawp'),
        'links' => [
            ['title' => __('Shop All', 'dawp'), 'url' => $shop_url],
            ['title' => __('Quartz', 'dawp'), 'url' => $footer_category_url('quartz-watches')],
            ['title' => __('Mechanical', 'dawp'), 'url' => $footer_category_url('mechanical-watches')],
            ['title' => __('Smartwatches', 'dawp'), 'url' => $footer_category_url('smartwatches')],
            ['title' => __('Digital', 'dawp'), 'url' => $footer_category_url('digital-watches')],
        ],
    ],
    [
        'title' => __('Support', 'dawp'),
        'links' => [
            ['title' => __('FAQ', 'dawp'), 'url' => home_url('/faq/')],
            ['title' => __('Track Your Order', 'dawp'), 'url' => home_url('/track-order/')],
            ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/')],
        ],
    ],
    [
        'title' => __('Company', 'dawp'),
        'links' => [
            ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/')],
            ['title' => __('My Account', 'dawp'), 'url' => $account_url],
        ],
    ],
    [
        'title' => __('Policy', 'dawp'),
        'links' => [
            ['title' => __('Shipping Policy', 'dawp'), 'url' => home_url('/shipping-policy/')],
            ['title' => __('Return & Refund Policy', 'dawp'), 'url' => home_url('/return-refund-policy/')],
            ['title' => __('Billing Terms & Conditions', 'dawp'), 'url' => home_url('/billing-terms/')],
            ['title' => __('Terms of Service', 'dawp'), 'url' => home_url('/terms-of-service/')],
            ['title' => __('Privacy Policy', 'dawp'), 'url' => home_url('/privacy-policy/')],
        ],
    ],
];
?>

</div><!-- #content -->

<footer class="border-t border-border bg-foreground text-white" role="contentinfo">
    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14">

        <div class="flex flex-col gap-8 border-b border-white/10 pb-8 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center rounded-sm bg-white px-3 py-2" aria-label="<?php esc_attr_e('US Watch Store home', 'dawp'); ?>">
                    <img src="<?php echo esc_url($theme_img_uri . '/logo.png'); ?>" alt="<?php esc_attr_e('US Watch Store', 'dawp'); ?>" class="h-8 w-auto shrink-0" width="143" height="80">
                </a>
                <p class="mt-3 max-w-sm text-sm leading-6 text-white/60">
                    <?php esc_html_e('Precision timepieces, delivered across America. Quartz, mechanical, smart, and digital watches, curated for quality.', 'dawp'); ?>
                </p>
            </div>

            <dl class="grid grid-cols-2 gap-x-6 gap-y-4 sm:grid-cols-4 lg:gap-x-8">
                <?php foreach ($trust_badges as $badge) : ?>
                    <div>
                        <dt class="text-xs font-extrabold uppercase tracking-[0.1em] text-accent-blush"><?php echo esc_html($badge['label']); ?></dt>
                        <dd class="mt-1 text-xs text-white/55"><?php echo esc_html($badge['detail']); ?></dd>
                    </div>
                <?php endforeach; ?>
            </dl>
        </div>

        <div class="grid grid-cols-2 gap-x-8 gap-y-8 border-b border-white/10 py-8 sm:grid-cols-4">
            <?php foreach ($link_groups as $group) : ?>
                <div>
                    <p class="mb-4 text-sm font-extrabold uppercase tracking-[0.08em] text-white"><?php echo esc_html($group['title']); ?></p>
                    <ul class="space-y-2.5 text-sm text-white/65">
                        <?php foreach ($group['links'] as $link) : ?>
                            <li><a class="transition hover:text-white" href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="flex flex-col gap-3 pt-6 text-xs text-white/55 lg:flex-row lg:items-center lg:justify-between">
            <div class="flex flex-wrap items-center gap-x-4 gap-y-2">
                <a class="font-semibold text-white/75 transition hover:text-white" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
                <span class="hidden text-white/25 sm:inline">·</span>
                <span><?php echo esc_html($business_hours); ?></span>
                <?php if ($store_address) : ?>
                    <span class="hidden text-white/25 sm:inline">·</span>
                    <span><?php echo $store_address; // phpcs:ignore WordPress.Security.EscapeOutput -- already esc_html'd per-field by WC_Countries::get_formatted_address(). ?></span>
                <?php endif; ?>
            </div>
            <div class="flex flex-wrap items-center gap-2.5">
                <span class="inline-flex h-6 min-w-10 items-center justify-center rounded-sm bg-white px-1.5" aria-label="<?php esc_attr_e('Visa', 'dawp'); ?>">
                    <span class="text-[11px] font-extrabold italic tracking-tight text-[#1434CB]">VISA</span>
                </span>
                <span class="inline-flex h-6 min-w-10 items-center justify-center rounded-sm bg-white px-1.5" aria-label="<?php esc_attr_e('Mastercard', 'dawp'); ?>">
                    <svg viewBox="0 0 24 16" class="h-3.5 w-6" aria-hidden="true">
                        <circle cx="9" cy="8" r="7" fill="#EB001B"></circle>
                        <circle cx="15" cy="8" r="7" fill="#F79E1B" fill-opacity=".85"></circle>
                    </svg>
                </span>
                <span class="inline-flex h-6 min-w-10 items-center justify-center rounded-sm bg-[#2557D6] px-1.5" aria-label="<?php esc_attr_e('American Express', 'dawp'); ?>">
                    <span class="text-[9px] font-extrabold tracking-tight text-white">AMEX</span>
                </span>
                <span class="inline-flex h-6 min-w-10 items-center justify-center rounded-sm bg-white px-1.5" aria-label="<?php esc_attr_e('PayPal', 'dawp'); ?>">
                    <span class="text-[11px] font-extrabold italic tracking-tight">
                        <span class="text-[#003087]">Pay</span><span class="text-[#0079C1]">Pal</span>
                    </span>
                </span>
            </div>
        </div>

        <div class="mt-6 flex flex-col gap-3 border-t border-white/10 pt-6 text-xs text-white/45 lg:flex-row lg:items-center lg:justify-between">
            <p>&copy; <?php echo esc_html(gmdate('Y')); ?> <?php esc_html_e('US Watch Store. All rights reserved.', 'dawp'); ?></p>
            <p class="text-white/35"><?php esc_html_e('uswatchstore.com', 'dawp'); ?></p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
