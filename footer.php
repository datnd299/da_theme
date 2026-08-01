<?php
/**
 * Theme footer — Crowdfused.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$shop_url    = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$account_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');
$support_email  = 'support@Crowdfused.com';
$business_hours = __('Monday - Friday, 9:00 AM - 5:00 PM, GMT-08:00 Pacific Standard Time', 'dawp');
$store_address  = function_exists('dawp_get_store_address') ? dawp_get_store_address() : '';
$logo_path       = get_template_directory() . '/assets/img/gallery/logo_crowd_cropped.png';
$logo_url        = get_template_directory_uri() . '/assets/img/gallery/logo_crowd_cropped.png';
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

<footer class="cf-footer" role="contentinfo">
    <style>
        .cf-footer { --cf-orange:#F58220; --cf-orange-dark:#E96F00; --cf-charcoal:#222222; --cf-text:#666666; --cf-light:#8A8A8A; --cf-bg:#FAFAFA; --cf-border:#E9ECEF; --cf-font-heading:'Manrope', 'Inter', Arial, sans-serif; --cf-font-body:'Inter', Arial, sans-serif; }
        .cf-footer { background:var(--cf-bg); border-top:1px solid var(--cf-border); color:var(--cf-charcoal); font-family:var(--cf-font-body); letter-spacing:0; text-rendering:optimizeLegibility; }
        .cf-footer__inner { width:min(100% - 40px,1280px); margin-inline:auto; }
        .cf-footer__main { padding:56px 0 48px; }
        .cf-footer__columns { display:grid; justify-content:center; gap:34px 58px; }
        .cf-footer__brand { display:block; width:max-content; max-width:100%; margin:0 0 16px; line-height:1; }
        .cf-footer__brand img { display:block; width:auto; height:34px; max-width:180px; object-fit:contain; }
        .cf-footer__columns h2 { margin:0 0 16px; color:var(--cf-charcoal); font-family:var(--cf-font-heading); font-size:13px; font-weight:800; letter-spacing:.06em; line-height:1.25; text-transform:uppercase; }
        .cf-footer__columns ul { display:grid; gap:12px; margin:0; padding:0; list-style:none; font-size:14px; line-height:1.35; }
        .cf-footer__columns a { color:var(--cf-text); font-weight:400; text-decoration:none; transition:color 180ms ease; }
        .cf-footer__columns a:hover { color:var(--cf-orange); text-decoration:underline; text-underline-offset:4px; }
        .cf-footer__columns > section:first-child { padding-right:24px; }
        .cf-footer__tagline { margin:0 0 18px; max-width:320px; font-size:14px; line-height:1.6; color:var(--cf-text); }
        .cf-footer__contact-list { display:grid; gap:13px; margin:0; color:var(--cf-text); font-size:14px; font-weight:400; line-height:1.45; }
        .cf-footer__contact-list div { display:block; max-width:100%; }
        .cf-footer__contact-list dt { display:inline; margin:0; color:var(--cf-charcoal); font-size:14px; font-weight:700; }
        .cf-footer__contact-list dd { display:inline; margin:0; }
        .cf-footer__contact-list a { color:var(--cf-orange); text-decoration:none; overflow-wrap:anywhere; }
        .cf-footer__contact-list a:hover { text-decoration:underline; }
        .cf-footer__bottom { border-top:1px solid var(--cf-border); padding:18px 0; color:var(--cf-light); font-size:13px; font-weight:400; }
        .cf-footer__bottom-row { display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:14px 24px; }
        .cf-footer__bottom p { margin:0; }
        .cf-footer__payments { display:flex; flex-wrap:wrap; align-items:center; gap:8px; }
        .cf-footer__payment { display:inline-flex; align-items:center; justify-content:center; width:52px; height:32px; padding:5px 7px; border:1px solid var(--cf-border); border-radius:8px; background:#fff; }
        .cf-footer__payment img { display:block; max-width:100%; max-height:100%; object-fit:contain; }
        @media (min-width: 760px) {
            .cf-footer__columns { grid-template-columns:minmax(300px,400px) repeat(3,minmax(150px,200px)); }
        }
    </style>

    <div class="cf-footer__inner cf-footer__main">
        <div class="cf-footer__columns">
            <section aria-label="<?php esc_attr_e('Contact information', 'dawp'); ?>">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="cf-footer__brand" aria-label="<?php esc_attr_e('Crowdfused home', 'dawp'); ?>">
                    <?php
                    echo function_exists('dawp_get_responsive_image')
                        ? dawp_get_responsive_image($logo_url, __('Crowdfused', 'dawp'), '', 180, 78, 'lazy', '180px')
                        : '<img src="' . esc_url($logo_url) . '" width="180" height="78" alt="' . esc_attr__('Crowdfused', 'dawp') . '" decoding="async" loading="lazy">';
                    ?>
                </a>
                <p class="cf-footer__tagline"><?php esc_html_e('A curated destination for thoughtfully designed products that make everyday life smarter, simpler and more enjoyable.', 'dawp'); ?></p>
                <dl class="cf-footer__contact-list">
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

    <div class="cf-footer__bottom">
        <div class="cf-footer__inner cf-footer__bottom-row">
            <p>&copy; <?php echo esc_html(gmdate('Y')); ?> Crowdfused. <?php esc_html_e('All rights reserved.', 'dawp'); ?></p>
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
                        <?php echo dawp_get_responsive_image($payment_url, $method['name'], '', 52, 32, 'lazy', '52px'); ?>
                    </span>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
