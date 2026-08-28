<?php
/**
 * Theme footer.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$account_url    = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');
$cart_url       = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$checkout_url   = function_exists('wc_get_checkout_url') ? wc_get_checkout_url() : home_url('/checkout/');
$support_email  = function_exists('dawp_get_store_contact') ? dawp_get_store_contact('email') : 'support@brickgo.com';
$support_phone  = function_exists('dawp_get_store_contact') ? dawp_get_store_contact('phone') : '757-804-6538';
$store_address  = function_exists('dawp_get_store_contact') ? dawp_get_store_contact('address') : '57 Calvert St, Woodbridge, VA 22191-2840';
$logo_path      = get_template_directory() . '/assets/img/about/Logosite (1).png';
$logo_url       = get_template_directory_uri() . '/assets/img/about/Logosite (1).png';
$payment_methods = [
    ['name' => __('Visa', 'dawp'), 'file' => 'visa.png'],
    ['name' => __('Mastercard', 'dawp'), 'file' => 'master card.png'],
    ['name' => __('American Express', 'dawp'), 'file' => 'AX.png'],
    ['name' => __('PayPal', 'dawp'), 'file' => 'paypal.png'],
];

if (!$account_url) {
    $account_url = home_url('/my-account/');
}

if (file_exists($logo_path)) {
    $logo_url = add_query_arg('ver', filemtime($logo_path), $logo_url);
}

$footer_columns = [
    [
        'title' => __('Collections', 'dawp'),
        'links' => [
            ['title' => __('Desk Collectibles', 'dawp'), 'url' => home_url('/collections/')],
            ['title' => __('Shelf Icons', 'dawp'), 'url' => home_url('/collections/')],
            ['title' => __('Big Builds', 'dawp'), 'url' => home_url('/collections/')],
            ['title' => __('Gift Ideas', 'dawp'), 'url' => home_url('/collections/')],
        ],
    ],
    [
        'title' => __('Discover', 'dawp'),
        'links' => [
            ['title' => __('Culture Notes', 'dawp'), 'url' => home_url('/culture-notes/')],
            ['title' => __('About', 'dawp'), 'url' => home_url('/about-us/')],
            ['title' => __('Contact', 'dawp'), 'url' => home_url('/contact-us/')],
        ],
    ],
    [
        'title' => __('Help', 'dawp'),
        'links' => [
            ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/')],
            ['title' => __('My Account', 'dawp'), 'url' => $account_url],
            ['title' => __('Cart', 'dawp'), 'url' => $cart_url],
            ['title' => __('Checkout', 'dawp'), 'url' => $checkout_url],
        ],
    ],
    [
        'title' => __('Policy', 'dawp'),
        'links' => [
            ['title' => __('FAQ', 'dawp'), 'url' => home_url('/faq/')],
            ['title' => __('Shipping Policy', 'dawp'), 'url' => home_url('/shipping-policy/')],
            ['title' => __('Return & Refund Policy', 'dawp'), 'url' => home_url('/return-refund-policy/')],
            ['title' => __('Privacy Policy', 'dawp'), 'url' => home_url('/privacy-policy/')],
            ['title' => __('Terms & Condition', 'dawp'), 'url' => home_url('/terms-conditions/')],
        ],
    ],
];
?>

</div><!-- #content -->

<footer class="tgm-footer" role="contentinfo">
    <div class="tgm-shell tgm-footer__top">
        <section class="tgm-footer__newsletter" aria-labelledby="footer-newsletter-title">
            <p><?php esc_html_e('Inbox Drop List', 'dawp'); ?></p>
            <h2 id="footer-newsletter-title"><?php esc_html_e('GET THE DROP.', 'dawp'); ?></h2>
            <form action="<?php echo esc_url(home_url('/')); ?>" method="post">
                <label class="screen-reader-text" for="footer-newsletter-email"><?php esc_html_e('Email address', 'dawp'); ?></label>
                <input id="footer-newsletter-email" type="email" name="email" placeholder="<?php esc_attr_e('Email address', 'dawp'); ?>" required>
                <button type="submit"><?php esc_html_e('Join', 'dawp'); ?></button>
            </form>
        </section>

        <div class="tgm-footer__brand">
            <a href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php esc_attr_e('BrickGo home', 'dawp'); ?>">
                <?php
                echo function_exists('dawp_get_responsive_image')
                    ? dawp_get_responsive_image($logo_url, __('BrickGo', 'dawp'), '', 190, 56, 'lazy', '190px')
                    : '<img src="' . esc_url($logo_url) . '" width="190" height="56" alt="' . esc_attr__('BrickGo', 'dawp') . '" decoding="async" loading="lazy">';
                ?>
            </a>
            <p><?php esc_html_e('Creative objects for building, collecting, gifting, and displaying.', 'dawp'); ?></p>
            <address>
                <a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
                <a href="tel:<?php echo esc_attr($support_phone); ?>"><?php echo esc_html($support_phone); ?></a>
                <?php if ($store_address) : ?><span><?php echo esc_html($store_address); ?></span><?php endif; ?>
            </address>
        </div>
    </div>

    <div class="tgm-shell tgm-footer__main">
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

    <div class="tgm-shell tgm-footer__bottom">
        <div class="tgm-footer__meta">
            <p>&copy; <?php echo esc_html(gmdate('Y')); ?> BrickGo. <?php esc_html_e('All rights reserved.', 'dawp'); ?></p>
        </div>
        <div class="tgm-footer__payments" aria-label="<?php esc_attr_e('Accepted payment methods', 'dawp'); ?>">
            <?php foreach ($payment_methods as $method) : ?>
                <?php
                $payment_path = get_template_directory() . '/assets/img/payment/' . $method['file'];
                $payment_url  = get_template_directory_uri() . '/assets/img/payment/' . $method['file'];

                if (!file_exists($payment_path)) {
                    continue;
                }

                $payment_url = add_query_arg('ver', filemtime($payment_path), $payment_url);
                ?>
                <span class="tgm-footer__payment">
                    <?php echo function_exists('dawp_get_responsive_image') ? dawp_get_responsive_image($payment_url, $method['name'], '', 54, 34, 'lazy', '54px') : '<img src="' . esc_url($payment_url) . '" alt="' . esc_attr($method['name']) . '" loading="lazy" decoding="async">'; ?>
                </span>
            <?php endforeach; ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
