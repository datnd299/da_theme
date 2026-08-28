<?php
/**
 * Theme footer — Reluxwatches.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$shop_url       = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$account_url    = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');
$support_email  = 'support@reluxwatches.com';
$business_hours = __('Monday - Friday, 9:00 AM - 5:00 PM Pacific Time', 'dawp');
$store_address  = function_exists('dawp_get_store_address') ? dawp_get_store_address() : '';
$footer_logo_path = get_template_directory() . '/assets/img/imagewatch/logowatch.png';
$footer_logo_url  = get_template_directory_uri() . '/assets/img/imagewatch/logowatch.png';
$payment_methods = [
    ['name' => __('Visa', 'dawp'), 'file' => 'visa.png'],
    ['name' => __('Mastercard', 'dawp'), 'file' => 'master card.png'],
    ['name' => __('American Express', 'dawp'), 'file' => 'AX.png'],
    ['name' => __('PayPal', 'dawp'), 'file' => 'paypal.png'],
];

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

if (!$account_url) {
    $account_url = home_url('/my-account/');
}

if (file_exists($footer_logo_path)) {
    $footer_logo_url = add_query_arg('ver', filemtime($footer_logo_path), $footer_logo_url);
}

$footer_columns = [
    [
        'title' => __('Shop', 'dawp'),
        'links' => [
            ['title' => __('All Products', 'dawp'), 'url' => $shop_url],
            ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/')],
            ['title' => __('My Account', 'dawp'), 'url' => $account_url],
            ['title' => __('FAQs', 'dawp'), 'url' => home_url('/faq/')],
        ],
    ],
    [
        'title' => __('Company', 'dawp'),
        'links' => [
            ['title' => __('About', 'dawp'), 'url' => home_url('/about-us/')],
            ['title' => __('Contact', 'dawp'), 'url' => home_url('/contact-us/')],
        ],
    ],
    [
        'title' => __('Legal', 'dawp'),
        'links' => [
            ['title' => __('Shipping Policy', 'dawp'), 'url' => home_url('/shipping-policy/')],
            ['title' => __('Return & Refund Policy', 'dawp'), 'url' => home_url('/return-refund-policy/')],
            ['title' => __('Privacy Policy', 'dawp'), 'url' => home_url('/privacy-policy/')],
            ['title' => __('Terms & Conditions', 'dawp'), 'url' => home_url('/terms-conditions/')],
        ],
    ],
];
?>

</div><!-- #content -->

<footer class="cf-footer" role="contentinfo">
    <style>
        .cf-footer { --cf-ink:#111111; --cf-text:#bdbdbd; --cf-muted:#858585; --cf-line:#111111; --cf-white:#ffffff; --cf-accent:#405447; --cf-max:1380px; --cf-font:'Inter', 'Manrope', Arial, sans-serif; background:#111; color:#fff; font-family:var(--cf-font); letter-spacing:0; }
        .cf-footer__inner { width:min(100% - 64px,var(--cf-max)); margin-inline:auto; }
        .cf-footer__main { display:grid; grid-template-columns:minmax(280px,1.35fr) repeat(3,minmax(140px,.55fr)); gap:44px; padding:64px 0 52px; }
        .cf-footer__brand { display:inline-flex; width:max-content; max-width:100%; margin-bottom:22px; color:#fff; line-height:1; text-decoration:none; }
        .cf-footer__brand-img { display:block; width:auto; height:54px; max-width:210px; object-fit:contain; }
        .cf-footer__tagline { max-width:440px; margin:0 0 24px; color:var(--cf-text); font-size:15px; line-height:1.7; }
        .cf-footer__contact { display:grid; gap:9px; margin:0; color:var(--cf-text); font-size:13px; line-height:1.55; }
        .cf-footer__contact div { display:block; }
        .cf-footer__contact dt { display:inline; margin:0; color:#fff; font-weight:700; }
        .cf-footer__contact dd { display:inline; margin:0; }
        .cf-footer__contact a { color:#fff; text-decoration:none; }
        .cf-footer__contact a:hover { text-decoration:underline; text-underline-offset:4px; }
        .cf-footer h2 { margin:0 0 18px; color:#fff; font-size:12px; font-weight:800; letter-spacing:.14em; line-height:1.25; text-transform:uppercase; }
        .cf-footer ul { display:grid; gap:12px; margin:0; padding:0; list-style:none; }
        .cf-footer li { margin:0; }
        .cf-footer nav a { color:var(--cf-text); font-size:14px; line-height:1.35; text-decoration:none; transition:color .18s ease; }
        .cf-footer nav a:hover { color:#fff; }
        .cf-footer__bottom { border-top:1px solid var(--cf-line); padding:18px 0; }
        .cf-footer__bottom-row { display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:16px 24px; }
        .cf-footer__bottom p { margin:0; color:var(--cf-muted); font-size:13px; }
        .cf-footer__payments { display:flex; flex-wrap:wrap; align-items:center; gap:8px; }
        .cf-footer__payment { display:inline-flex; align-items:center; justify-content:center; width:54px; height:32px; padding:5px 7px; border:1px solid var(--cf-line); background:#fff; }
        .cf-footer__payment img { display:block; max-width:100%; max-height:100%; object-fit:contain; }
        @media (max-width: 900px) {
            .cf-footer__inner { width:min(100% - 36px,var(--cf-max)); }
            .cf-footer__main { grid-template-columns:1fr 1fr; gap:34px 28px; padding:50px 0 42px; }
            .cf-footer__about { grid-column:1 / -1; }
        }
        @media (max-width: 560px) {
            .cf-footer__inner { width:min(100% - 28px,var(--cf-max)); }
            .cf-footer__main { grid-template-columns:1fr; gap:28px; }
            .cf-footer__brand-img { height:48px; max-width:180px; }
            .cf-footer__bottom-row { align-items:flex-start; flex-direction:column; }
        }
    </style>

    <div class="cf-footer__inner cf-footer__main">
        <section class="cf-footer__about" aria-label="<?php esc_attr_e('Reluxwatches information', 'dawp'); ?>">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="cf-footer__brand" aria-label="<?php esc_attr_e('Reluxwatches home', 'dawp'); ?>">
                <?php
                echo function_exists('dawp_get_responsive_image')
                    ? dawp_get_responsive_image($footer_logo_url, __('Reluxwatches', 'dawp'), 'cf-footer__brand-img', 129, 54, 'lazy', '129px')
                    : '<img class="cf-footer__brand-img" src="' . esc_url($footer_logo_url) . '" alt="' . esc_attr__('Reluxwatches', 'dawp') . '" width="210" height="54" loading="lazy" decoding="async">';
                ?>
            </a>
            <p class="cf-footer__tagline"><?php esc_html_e('Modern everyday finds, selected for useful living and simple discovery.', 'dawp'); ?></p>
            <dl class="cf-footer__contact">
                <div>
                    <dt><?php esc_html_e('Email:', 'dawp'); ?></dt>
                    <dd><a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a></dd>
                </div>
                <?php if ($store_address) : ?>
                    <div>
                        <dt><?php esc_html_e('Address:', 'dawp'); ?></dt>
                        <dd><?php echo esc_html($store_address); ?></dd>
                    </div>
                <?php endif; ?>
                <div>
                    <dt><?php esc_html_e('Hours:', 'dawp'); ?></dt>
                    <dd><?php echo esc_html($business_hours); ?></dd>
                </div>
            </dl>
        </section>

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

    <div class="cf-footer__bottom">
        <div class="cf-footer__inner cf-footer__bottom-row">
            <p>&copy; <?php echo esc_html(gmdate('Y')); ?> Reluxwatches. <?php esc_html_e('All rights reserved.', 'dawp'); ?></p>
            <div class="cf-footer__payments" aria-label="<?php esc_attr_e('Accepted payment methods', 'dawp'); ?>">
                <?php foreach ($payment_methods as $method) : ?>
                    <?php
                    $payment_path = get_template_directory() . '/assets/img/payment/' . $method['file'];
                    $payment_url  = get_template_directory_uri() . '/assets/img/payment/' . $method['file'];

                    if (!file_exists($payment_path)) {
                        continue;
                    }

                    $payment_url = add_query_arg('ver', filemtime($payment_path), $payment_url);
                    ?>
                    <span class="cf-footer__payment">
                        <?php
                        echo function_exists('dawp_get_responsive_image')
                            ? dawp_get_responsive_image($payment_url, $method['name'], '', 54, 32, 'lazy', '54px')
                            : '<img src="' . esc_url($payment_url) . '" alt="' . esc_attr($method['name']) . '" loading="lazy" decoding="async">';
                        ?>
                    </span>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</footer>

<?php
if (function_exists('dawp_cart_fab_markup')) {
    dawp_cart_fab_markup();
}
if (function_exists('dawp_cart_drawer_markup')) {
    dawp_cart_drawer_markup();
}
?>

<?php wp_footer(); ?>
</body>
</html>
