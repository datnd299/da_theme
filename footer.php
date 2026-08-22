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
$support_phone  = '+1 757 804 6538';
$business_hours = __('Monday - Friday, 9:00 AM - 5:00 PM', 'dawp');
$store_address  = function_exists('dawp_get_store_address') ? dawp_get_store_address() : __('Private showroom appointments available by request.', 'dawp');
$logo_path      = get_template_directory() . '/assets/img/logo/watch_logo.png';
$logo_url       = get_template_directory_uri() . '/assets/img/logo/watch_logo.png';
$iced_out_url   = get_term_link('iced-out-watches', 'product_tag');
$new_arrivals_url = function_exists('dawp_new_arrivals_url') ? dawp_new_arrivals_url() : home_url('/product-category/new-arrivals/');

if (file_exists($logo_path)) {
    $logo_url = add_query_arg('ver', filemtime($logo_path), $logo_url);
}

if (is_wp_error($iced_out_url)) {
    $iced_out_url = add_query_arg([
        's'         => 'Iced Out Watches',
        'post_type' => 'product',
    ], home_url('/'));
}

$brand_links = [
    ['title' => __('Rolex', 'dawp'), 'url' => function_exists('dawp_watch_category_url') ? dawp_watch_category_url('Rolex Watches') : home_url('/product-category/rolex-watches/')],
    ['title' => __('Patek Philippe', 'dawp'), 'url' => function_exists('dawp_watch_category_url') ? dawp_watch_category_url('Patek Philippe') : home_url('/product-category/patek-philippe/')],
    ['title' => __('Audemars Piguet', 'dawp'), 'url' => function_exists('dawp_watch_category_url') ? dawp_watch_category_url('Audemars Piguet') : home_url('/product-category/audemars-piguet/')],
    ['title' => __('Omega', 'dawp'), 'url' => function_exists('dawp_watch_category_url') ? dawp_watch_category_url('Omega Watches') : home_url('/product-category/omega-watches/')],
];

$footer_columns = [
    [
        'title' => __('Watches', 'dawp'),
        'links' => [
            ['title' => __('All Watches', 'dawp'), 'url' => $shop_url],
            ['title' => __('New Arrivals', 'dawp'), 'url' => $new_arrivals_url],
            ['title' => __('Best Sellers', 'dawp'), 'url' => add_query_arg('orderby', 'popularity', $shop_url)],
            ['title' => __('Iced Out Watches', 'dawp'), 'url' => $iced_out_url],
        ],
    ],
    [
        'title' => __('Popular Brands', 'dawp'),
        'links' => $brand_links,
    ],
    [
        'title' => __('Store Policy', 'dawp'),
        'links' => [
            ['title' => __('FAQs', 'dawp'), 'url' => home_url('/faq/')],
            ['title' => __('Shipping Policy', 'dawp'), 'url' => home_url('/shipping-policy/')],
            ['title' => __('Return & Refund Policy', 'dawp'), 'url' => home_url('/return-refund-policy/')],
            ['title' => __('Privacy Policy', 'dawp'), 'url' => home_url('/privacy-policy/')],
            ['title' => __('Terms & Condition', 'dawp'), 'url' => home_url('/terms-conditions/')],
        ],
    ],
    [
        'title' => __('About Chronoshop', 'dawp'),
        'links' => [
            ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/')],
            ['title' => __('Journal', 'dawp'), 'url' => home_url('/journal/')],
            ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/')],
            ['title' => __('My Account', 'dawp'), 'url' => $account_url],
        ],
    ],
];

$payment_methods = [
    ['name' => __('Visa', 'dawp'), 'file' => 'visa.png'],
    ['name' => __('Mastercard', 'dawp'), 'file' => 'master card.png'],
    ['name' => __('American Express', 'dawp'), 'file' => 'AX.png'],
    ['name' => __('PayPal', 'dawp'), 'file' => 'paypal.png'],
];
?>

</div><!-- #content -->

<footer class="lux-footer" role="contentinfo">
    <style>
        .lux-footer { background:#0B0B0B; color:#F7F5F0; font-family:Inter, "Avenir Next", Arial, sans-serif; letter-spacing:0; }
        .lux-footer * { box-sizing:border-box; }
        .lux-footer__inner { width:min(100% - 40px,1280px); margin-inline:auto; }
        .lux-footer__top { display:grid; grid-template-columns:minmax(280px,1.1fr) 2fr; gap:70px; padding:78px 0 58px; border-top:1px solid rgba(184,155,94,.34); }
        .lux-footer__brand { color:#F7F5F0; text-decoration:none; }
        .lux-footer__logo { display:block; width:180px; height:auto; max-height:54px; object-fit:contain; }
        .lux-footer__brand strong { display:block; font-family:"Cormorant Garamond", Georgia, serif; font-size:42px; font-weight:400; line-height:.95; letter-spacing:0; }
        .lux-footer__brand span { display:block; margin-top:11px; color:#B89B5E; font-size:11px; font-weight:800; letter-spacing:.16em; text-transform:uppercase; }
        .lux-footer__intro { max-width:440px; margin:28px 0 0; color:#C9C3B8; font-size:15px; line-height:1.75; }
        .lux-footer__contact { display:grid; gap:11px; margin:30px 0 0; color:#C9C3B8; font-size:14px; line-height:1.55; }
        .lux-footer__contact div { display:block; }
        .lux-footer__contact dt { display:inline; margin:0; color:#F7F5F0; font-weight:800; }
        .lux-footer__contact dd { display:inline; margin:0; }
        .lux-footer a { color:inherit; text-decoration:none; }
        .lux-footer a:hover { color:#D1BD8A; text-decoration:underline; text-underline-offset:5px; }
        .lux-footer__columns { display:grid; grid-template-columns:repeat(4,minmax(0,1fr)); gap:34px; }
        .lux-footer__columns h2 { margin:0 0 18px; color:#B89B5E; font-size:12px; font-weight:800; letter-spacing:.1em; line-height:1.35; text-transform:uppercase; }
        .lux-footer__columns ul { display:grid; gap:12px; margin:0; padding:0; list-style:none; color:#D8D0C2; font-size:14px; line-height:1.45; }
        .lux-footer__divider { border-top:1px solid rgba(184,155,94,.55); }
        .lux-footer__bottom { display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:18px 28px; padding:22px 0 28px; color:#A8A8A8; font-size:13px; }
        .lux-footer__bottom p { margin:0; }
        .lux-footer__payments { display:flex; flex-wrap:wrap; align-items:center; gap:8px; }
        .lux-footer__payment { display:inline-flex; align-items:center; justify-content:center; width:52px; height:32px; padding:5px 7px; border:1px solid rgba(247,245,240,.16); border-radius:4px; background:#F7F5F0; }
        .lux-footer__payment img { display:block; max-width:100%; max-height:100%; object-fit:contain; }
        @media (max-width: 980px) {
            .lux-footer__top { grid-template-columns:1fr; gap:42px; padding:64px 0 48px; }
            .lux-footer__columns { grid-template-columns:repeat(2,minmax(0,1fr)); }
        }
        @media (max-width: 620px) {
            .lux-footer__inner { width:min(100% - 32px,1280px); }
            .lux-footer__brand strong { font-size:34px; }
            .lux-footer__columns { grid-template-columns:1fr; }
            .lux-footer__bottom { display:grid; grid-template-columns:1fr; justify-items:start; }
            .lux-footer__payments { width:100%; }
            .lux-footer__payments { justify-content:flex-start; }
        }
    </style>

    <div class="lux-footer__inner">
        <div class="lux-footer__top">
            <section aria-label="<?php esc_attr_e('Brand and contact information', 'dawp'); ?>">
                <a class="lux-footer__brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php esc_attr_e('chronelshop.com home', 'dawp'); ?>">
                    <?php
                    echo function_exists('dawp_get_responsive_image')
                        ? dawp_get_responsive_image($logo_url, __('Chronel Shop', 'dawp'), 'lux-footer__logo', 180, 54, 'lazy', '(max-width: 620px) 160px, 180px')
                        : '<img class="lux-footer__logo" src="' . esc_url($logo_url) . '" width="180" height="54" alt="' . esc_attr__('Chronel Shop', 'dawp') . '" decoding="async" loading="lazy">';
                    ?>
                </a>
                <p class="lux-footer__intro"><?php esc_html_e('A contemporary watch boutique for refined mechanical timepieces, crafted details and confident ownership.', 'dawp'); ?></p>
                <dl class="lux-footer__contact">
                    <div>
                        <dt><?php esc_html_e('Mail:', 'dawp'); ?></dt>
                        <dd><a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a></dd>
                    </div>
                    <div>
                        <dt><?php esc_html_e('Phone:', 'dawp'); ?></dt>
                        <dd><a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $support_phone)); ?>"><?php echo esc_html($support_phone); ?></a></dd>
                    </div>
                    <div>
                        <dt><?php esc_html_e('Hours:', 'dawp'); ?></dt>
                        <dd><?php echo esc_html($business_hours); ?></dd>
                    </div>
                    <div>
                        <dt><?php esc_html_e('Address:', 'dawp'); ?></dt>
                        <dd><?php echo esc_html($store_address); ?></dd>
                    </div>
                </dl>
            </section>

            <div class="lux-footer__columns">
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

        <div class="lux-footer__divider" aria-hidden="true"></div>

        <div class="lux-footer__bottom">
            <p>&copy; <?php echo esc_html(gmdate('Y')); ?> chronelshop.com. <?php esc_html_e('All rights reserved.', 'dawp'); ?></p>
            <div class="lux-footer__payments" aria-label="<?php esc_attr_e('Accepted payment methods', 'dawp'); ?>">
                <?php foreach ($payment_methods as $method) : ?>
                    <?php
                    $payment_path = get_template_directory() . '/assets/img/payment/' . $method['file'];
                    $payment_url  = get_template_directory_uri() . '/assets/img/payment/' . $method['file'];

                    if (!file_exists($payment_path)) {
                        continue;
                    }

                    $payment_url = add_query_arg('ver', filemtime($payment_path), $payment_url);
                    ?>
                    <span class="lux-footer__payment">
                        <?php
                        echo function_exists('dawp_get_responsive_image')
                            ? dawp_get_responsive_image($payment_url, $method['name'], '', 52, 32, 'lazy', '52px')
                            : '<img src="' . esc_url($payment_url) . '" width="52" height="32" alt="' . esc_attr($method['name']) . '" decoding="async" loading="lazy">';
                        ?>
                    </span>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
