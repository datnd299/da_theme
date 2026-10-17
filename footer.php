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

$support_email  = 'support@celviaus.com';
$business_hours = __('Monday - Friday, 9:00 AM - 5:00 PM', 'dawp');
$store_address  = 'Loom Agency LLC, 198 Bear Branch Rd, Reevesville, SC 29471, US';

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
                <a href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php esc_attr_e('Celvia home', 'dawp'); ?>">
                    <img class="mx-footer__logo" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo/celvia-logo-white.svg'); ?>" width="160" height="50" alt="<?php esc_attr_e('Celvia', 'dawp'); ?>" loading="lazy">
                </a>
                <p class="mx-footer__lede"><?php esc_html_e('Rolex, Patek Philippe, Audemars Piguet, Omega and other Swiss houses, each piece inspected before it reaches you.', 'dawp'); ?></p>
                <dl class="mx-footer__contact">
                    <div>
                        <dt><?php esc_html_e('Concierge', 'dawp'); ?></dt>
                        <dd><a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a></dd>
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
            <p>&copy; <?php echo esc_html(gmdate('Y')); ?> Celvia. <?php esc_html_e('All rights reserved.', 'dawp'); ?></p>
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
<?php if (function_exists('dawp_cart_drawer_markup')) : dawp_cart_drawer_markup(); endif; ?>

<?php wp_footer(); ?>
</body>
</html>
