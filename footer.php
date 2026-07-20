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
$support_email  = 'support@megamalldepot.com';
$business_hours = __('Monday - Friday, 9:00 AM - 5:00 PM, GMT-08:00 Pacific Standard Time', 'dawp');
$store_address  = function_exists('dawp_get_store_address') ? dawp_get_store_address() : '';
$logo_path       = get_template_directory() . '/assets/img/about/Capture.JPG';
$logo_url        = get_template_directory_uri() . '/assets/img/about/Capture.JPG';
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

if (file_exists($logo_path)) {
    $logo_url = add_query_arg('ver', filemtime($logo_path), $logo_url);
}

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

$footer_columns = [
    [
        'title' => __('Explore', 'dawp'),
        'links' => [
            ['title' => __('Home', 'dawp'), 'url' => home_url('/')],
            ['title' => __('Shop', 'dawp'), 'url' => $shop_url],
            ['title' => __('Contact', 'dawp'), 'url' => home_url('/contact-us/')],
            ['title' => __('About', 'dawp'), 'url' => home_url('/about-us/')],
        ],
    ],
    [
        'title' => __('Customer Care', 'dawp'),
        'links' => [
            ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/')],
            ['title' => __('My Account', 'dawp'), 'url' => $account_url],
            ['title' => __('FAQs', 'dawp'), 'url' => home_url('/faq/')],
        ],
    ],
    [
        'title' => __('Policies', 'dawp'),
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

<footer class="tgm-footer" role="contentinfo">
    <style>
        .tgm-footer { background:#F8F5F0; border-top:1px solid #E8E5DF; color:#2B2B2B; font-family:Inter, "Avenir Next", Arial, sans-serif; letter-spacing:0; text-rendering:optimizeLegibility; }
        .tgm-footer__inner { width:min(100% - 32px,1280px); margin-inline:auto; }
        .tgm-footer__main { padding:44px 0 46px; }
        .tgm-footer__columns { display:grid; justify-content:center; gap:30px 58px; }
        .tgm-footer__brand { display:block; width:max-content; max-width:100%; margin:0 0 14px; line-height:1; }
        .tgm-footer__brand img { display:block; width:auto; height:42px; max-width:190px; object-fit:contain; }
        .tgm-footer__columns h2 { margin:0 0 15px; color:#2B2B2B; font-size:13px; font-weight:800; letter-spacing:.08em; line-height:1.25; text-transform:uppercase; }
        .tgm-footer__columns ul { display:grid; gap:11px; margin:0; padding:0; list-style:none; font-size:14px; line-height:1.35; }
        .tgm-footer__columns a { color:#5F514B; font-weight:400; text-decoration:none; }
        .tgm-footer__columns a:hover { color:#A45A3F; text-decoration:underline; text-underline-offset:4px; }
        .tgm-footer__columns > section:first-child { padding-right:24px; }
        .tgm-footer__contact-list { display:grid; gap:13px; margin:0; color:#5F514B; font-size:14px; font-weight:400; line-height:1.45; }
        .tgm-footer__contact-list div { display:block; max-width:100%; }
        .tgm-footer__contact-list dt { display:inline; margin:0; color:#2B2B2B; font-size:14px; font-weight:700; }
        .tgm-footer__contact-list dd { display:inline; margin:0; }
        .tgm-footer__contact-list a { color:#A45A3F; text-decoration:none; overflow-wrap:anywhere; }
        .tgm-footer__contact-list a:hover { text-decoration:underline; }
        .tgm-footer__bottom { border-top:1px solid #E0DCD4; padding:16px 0; color:#6D625C; font-size:13px; font-weight:400; }
        .tgm-footer__bottom-row { display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:14px 24px; }
        .tgm-footer__bottom p { margin:0; }
        .tgm-footer__payments { display:flex; flex-wrap:wrap; align-items:center; gap:8px; }
        .tgm-footer__payment { display:inline-flex; align-items:center; justify-content:center; width:54px; height:34px; padding:5px 7px; border:1px solid #E0DCD4; border-radius:4px; background:#fff; }
        .tgm-footer__payment img { display:block; max-width:100%; max-height:100%; object-fit:contain; }
        @media (min-width: 760px) {
            .tgm-footer__columns { grid-template-columns:minmax(320px,420px) repeat(3,minmax(150px,200px)); }
        }
    </style>

    <div class="tgm-footer__inner tgm-footer__main">
        <div class="tgm-footer__columns">
            <section aria-label="<?php esc_attr_e('Contact information', 'dawp'); ?>">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="tgm-footer__brand" aria-label="<?php esc_attr_e('MegaMallDepot home', 'dawp'); ?>">
                    <?php
                    echo function_exists('dawp_get_responsive_image')
                        ? dawp_get_responsive_image($logo_url, __('MegaMallDepot', 'dawp'), '', 190, 56, 'lazy', '190px')
                        : '<img src="' . esc_url($logo_url) . '" width="190" height="56" alt="' . esc_attr__('MegaMallDepot', 'dawp') . '" decoding="async" loading="lazy">';
                    ?>
                </a>
                <dl class="tgm-footer__contact-list">
                    <div>
                        <dt><?php esc_html_e('Email:', 'dawp'); ?></dt>
                        <dd><a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a></dd>
                    </div>
                    <div>
                        <dt><?php esc_html_e('Address:', 'dawp'); ?></dt>
                        <dd><?php echo esc_html($store_address); ?></dd>
                    </div>
                    <div>
                        <dt><?php esc_html_e('Business Hours:', 'dawp'); ?></dt>
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
    </div>

    <div class="tgm-footer__bottom">
        <div class="tgm-footer__inner tgm-footer__bottom-row">
            <p>&copy; <?php echo esc_html(gmdate('Y')); ?> MegaMallDepot. <?php esc_html_e('All rights reserved.', 'dawp'); ?></p>
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
                        <?php echo dawp_get_responsive_image($payment_url, $method['name'], '', 54, 34, 'lazy', '54px'); ?>
                    </span>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
