<?php
/**
 * Theme footer.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$shop_url    = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$account_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

if (!$account_url) {
    $account_url = home_url('/my-account/');
}

$support_email  = 'support@chronelshop.com';
$support_phone  = '+1 304 585 0364';
$business_hours = __('Monday - Friday, 9:00 AM - 5:00 PM', 'dawp');
$store_address  = 'Loom Agency LLC, 30 N Gould St, STE R, Sheridan, Wyoming 82801, US';

$footer_columns = [
    [
        'title' => __('Watches', 'dawp'),
        'links' => [
            ['title' => __('All Watches', 'dawp'), 'url' => $shop_url],
            ['title' => __('New Arrivals', 'dawp'), 'url' => add_query_arg('orderby', 'date', $shop_url)],
            ['title' => __('Best Sellers', 'dawp'), 'url' => add_query_arg('orderby', 'popularity', $shop_url)],
            ['title' => __('Iced Out Watches', 'dawp'), 'url' => dawp_product_category_url('iced-out-watches')],
        ],
    ],
    [
        'title' => __('Popular Brands', 'dawp'),
        'links' => [
            ['title' => __('Rolex', 'dawp'), 'url' => dawp_product_category_url('rolex-watches')],
            ['title' => __('Patek Philippe', 'dawp'), 'url' => dawp_product_category_url('patek-philippe')],
            ['title' => __('Audemars Piguet', 'dawp'), 'url' => dawp_product_category_url('audemars-piguet')],
            ['title' => __('Omega', 'dawp'), 'url' => dawp_product_category_url('omega-watches')],
        ],
    ],
    [
        'title' => __('More Brands', 'dawp'),
        'links' => [
            ['title' => __('Richard Mille', 'dawp'), 'url' => dawp_product_category_url('richard-mille')],
            ['title' => __('Breitling', 'dawp'), 'url' => dawp_product_category_url('breitling')],
            ['title' => __('Hublot', 'dawp'), 'url' => dawp_product_category_url('hublot')],
            ['title' => __('Tag Heuer', 'dawp'), 'url' => dawp_product_category_url('tag-heuer')],
        ],
    ],
    [
        'title' => __('Customer Care', 'dawp'),
        'links' => [
            ['title' => __('My Account', 'dawp'), 'url' => $account_url],
            ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/')],
            ['title' => __('FAQ', 'dawp'), 'url' => home_url('/faq/')],
            ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/')],
        ],
    ],
    [
        'title' => __('Policies', 'dawp'),
        'links' => [
            ['title' => __('Return & Refund Policy', 'dawp'), 'url' => home_url('/return-refund-policy/')],
            ['title' => __('Shipping Policy', 'dawp'), 'url' => home_url('/shipping-policy/')],
            ['title' => __('Billing Terms & Conditions', 'dawp'), 'url' => home_url('/terms-conditions/')],
            ['title' => __('Terms of Service', 'dawp'), 'url' => home_url('/terms-conditions/')],
            ['title' => __('Privacy Policy', 'dawp'), 'url' => home_url('/privacy-policy/')],
        ],
    ],
];

$legal_links = [
    ['title' => __('Privacy', 'dawp'), 'url' => home_url('/privacy-policy/')],
    ['title' => __('Terms', 'dawp'), 'url' => home_url('/terms-conditions/')],
    ['title' => __('Contact', 'dawp'), 'url' => home_url('/contact-us/')],
];

$payment_methods = [
    ['name' => __('Visa', 'dawp'), 'file' => 'visa.png'],
    ['name' => __('Mastercard', 'dawp'), 'file' => 'master card.png'],
    ['name' => __('American Express', 'dawp'), 'file' => 'AX.png'],
    ['name' => __('PayPal', 'dawp'), 'file' => 'paypal.png'],
];
?>

</div><!-- #content -->

<footer class="mx-footer" role="contentinfo">
    <div class="mx-footer__assure" aria-label="<?php esc_attr_e('Purchase assurances', 'dawp'); ?>">
        <div>
            <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="8"></circle><path d="M12 7v5l3 2"></path></svg>
            <strong><?php esc_html_e('Quality Inspected', 'dawp'); ?></strong>
            <span><?php esc_html_e('Every piece passes a strict quality inspection.', 'dawp'); ?></span>
        </div>
        <div>
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 7h11v10H3z"></path><path d="M14 10h4l3 3v4h-7z"></path><circle cx="7" cy="19" r="2"></circle><circle cx="18" cy="19" r="2"></circle></svg>
            <strong><?php esc_html_e('Insured Delivery', 'dawp'); ?></strong>
            <span><?php esc_html_e('Protected shipping with signature confirmation.', 'dawp'); ?></span>
        </div>
        <div>
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3l7 3v6c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V6z"></path><path d="m9 12 2 2 4-4"></path></svg>
            <strong><?php esc_html_e('Warranty', 'dawp'); ?></strong>
            <span><?php esc_html_e('Coverage and service support after purchase.', 'dawp'); ?></span>
        </div>
        <div>
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M21 15a4 4 0 0 1-4 4H8l-5 3V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4z"></path></svg>
            <strong><?php esc_html_e('Consultation', 'dawp'); ?></strong>
            <span><?php esc_html_e('Private advice for fit, gifting and selection.', 'dawp'); ?></span>
        </div>
    </div>

    <div class="mx-wrap">
        <div class="mx-footer__top">
            <section aria-label="<?php esc_attr_e('Brand and contact information', 'dawp'); ?>">
                <a href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php esc_attr_e('Chronel home', 'dawp'); ?>">
                    <img class="mx-footer__logo" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo/chronel-logo-white.png'); ?>" width="160" height="50" alt="<?php esc_attr_e('Chronel', 'dawp'); ?>" loading="lazy">
                </a>
                <p class="mx-footer__lede"><?php esc_html_e('Rolex, Patek Philippe, Audemars Piguet, Omega and other Swiss houses, each piece inspected before it reaches you.', 'dawp'); ?></p>
                <dl class="mx-footer__contact">
                    <div>
                        <dt><?php esc_html_e('Concierge', 'dawp'); ?></dt>
                        <dd><a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a></dd>
                    </div>
                    <div>
                        <dt><?php esc_html_e('Phone', 'dawp'); ?></dt>
                        <dd><a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $support_phone)); ?>"><?php echo esc_html($support_phone); ?></a></dd>
                    </div>
                    <div>
                        <dt><?php esc_html_e('Hours', 'dawp'); ?></dt>
                        <dd><?php echo esc_html($business_hours); ?></dd>
                    </div>
                    <div>
                        <dt><?php esc_html_e('Address', 'dawp'); ?></dt>
                        <dd><?php echo esc_html($store_address); ?></dd>
                    </div>
                </dl>
            </section>

            <div class="mx-footer__cols">
                <?php foreach ($footer_columns as $column) : ?>
                    <nav aria-label="<?php echo esc_attr($column['title']); ?>">
                        <h2><?php echo esc_html($column['title']); ?></h2>
                        <ul>
                            <?php foreach ($column['links'] as $link) : ?>
                                <li><a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </nav>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="mx-footer__bottom">
            <p>&copy; <?php echo esc_html(gmdate('Y')); ?> Chronel. <?php esc_html_e('All rights reserved.', 'dawp'); ?></p>
            <nav class="mx-footer__legal" aria-label="<?php esc_attr_e('Legal links', 'dawp'); ?>">
                <?php foreach ($legal_links as $link) : ?>
                    <a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?></a>
                <?php endforeach; ?>
            </nav>
            <div class="mx-footer__pay" aria-label="<?php esc_attr_e('Accepted payment methods', 'dawp'); ?>">
                <?php foreach ($payment_methods as $method) : ?>
                    <?php
                    $payment_path = get_template_directory() . '/assets/img/payment/' . $method['file'];
                    if (!file_exists($payment_path)) {
                        continue;
                    }
                    $payment_url = add_query_arg('ver', filemtime($payment_path), get_template_directory_uri() . '/assets/img/payment/' . rawurlencode($method['file']));
                    ?>
                    <span><img src="<?php echo esc_url($payment_url); ?>" width="50" height="31" alt="<?php echo esc_attr($method['name']); ?>" decoding="async" loading="lazy"></span>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</footer>

<?php if (function_exists('dawp_cart_fab_markup')) : dawp_cart_fab_markup(); endif; ?>
<a class="dawp-wa-fab" href="https://wa.me/<?php echo esc_attr(preg_replace('/[^0-9]/', '', $support_phone)); ?>" target="_blank" rel="noopener" aria-label="<?php esc_attr_e('Chat with us on WhatsApp', 'dawp'); ?>">
    <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.47 14.38c-.3-.15-1.75-.86-2.02-.96-.27-.1-.47-.15-.67.15-.2.3-.77.96-.94 1.16-.17.2-.35.22-.64.07-.3-.15-1.25-.46-2.38-1.47-.88-.79-1.47-1.76-1.65-2.06-.17-.3-.02-.46.13-.6.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.08-.15-.67-1.61-.92-2.2-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.79.37-.27.3-1.04 1.02-1.04 2.48 0 1.46 1.07 2.88 1.21 3.07.15.2 2.1 3.2 5.08 4.49.71.31 1.26.49 1.69.63.71.23 1.36.2 1.87.12.57-.09 1.75-.72 2-1.41.25-.69.25-1.29.17-1.41-.07-.12-.27-.2-.57-.35zM12.05 21.5h-.01a9.47 9.47 0 0 1-4.83-1.32l-.35-.21-3.59.94.96-3.5-.23-.36a9.45 9.45 0 0 1-1.45-5.04c0-5.23 4.26-9.49 9.5-9.49 2.54 0 4.92.99 6.71 2.79a9.43 9.43 0 0 1 2.78 6.71c0 5.24-4.26 9.48-9.49 9.48zm8.08-17.56A11.35 11.35 0 0 0 12.05.6C5.75.6.63 5.72.62 12.01c0 2.01.53 3.98 1.53 5.71L.53 23.6l6.02-1.58a11.4 11.4 0 0 0 5.45 1.39h.01c6.29 0 11.41-5.12 11.42-11.41a11.34 11.34 0 0 0-3.3-8.06z"/></svg>
</a>
<?php if (function_exists('dawp_cart_drawer_markup')) : dawp_cart_drawer_markup(); endif; ?>

<?php wp_footer(); ?>
</body>
</html>
