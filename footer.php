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

$support_email  = 'concierge@luxurytheme.com';
$support_phone  = '+1 757 804 6538';
$business_hours = __('Monday - Friday, 9:00 AM - 5:00 PM', 'dawp');
$store_address  = function_exists('dawp_get_store_address') ? dawp_get_store_address() : __('Private showroom appointments available by request.', 'dawp');

$footer_columns = [
    [
        'title' => __('Watches', 'dawp'),
        'links' => [
            ['title' => __('All Watches', 'dawp'), 'url' => $shop_url],
            ['title' => __('New Arrivals', 'dawp'), 'url' => add_query_arg('orderby', 'date', $shop_url)],
            ['title' => __('Best Sellers', 'dawp'), 'url' => $shop_url],
            ['title' => __('Limited Editions', 'dawp'), 'url' => $shop_url],
        ],
    ],
    [
        'title' => __('Collections', 'dawp'),
        'links' => [
            ['title' => __('Classic', 'dawp'), 'url' => home_url('/collections/classic/')],
            ['title' => __('Sport', 'dawp'), 'url' => home_url('/collections/sport/')],
            ['title' => __('Heritage', 'dawp'), 'url' => home_url('/collections/heritage/')],
            ['title' => __('Signature', 'dawp'), 'url' => home_url('/collections/signature/')],
        ],
    ],
    [
        'title' => __('Services', 'dawp'),
        'links' => [
            ['title' => __('Personal Consultation', 'dawp'), 'url' => home_url('/contact-us/')],
            ['title' => __('Authentication', 'dawp'), 'url' => home_url('/services/authentication/')],
            ['title' => __('Warranty', 'dawp'), 'url' => home_url('/services/warranty/')],
            ['title' => __('Watch Care', 'dawp'), 'url' => home_url('/services/watch-care/')],
        ],
    ],
    [
        'title' => __('Customer Care', 'dawp'),
        'links' => [
            ['title' => __('My Account', 'dawp'), 'url' => $account_url],
            ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/')],
            ['title' => __('Shipping Policy', 'dawp'), 'url' => home_url('/shipping-policy/')],
            ['title' => __('Returns', 'dawp'), 'url' => home_url('/return-refund-policy/')],
            ['title' => __('FAQ', 'dawp'), 'url' => home_url('/faq/')],
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

<footer class="lux-footer" role="contentinfo">
    <style>
        .lux-footer { background:#0B0B0B; color:#F7F5F0; font-family:Inter, "Avenir Next", Arial, sans-serif; letter-spacing:0; }
        .lux-footer * { box-sizing:border-box; }
        .lux-footer__inner { width:min(100% - 40px,1280px); margin-inline:auto; }
        .lux-footer__top { display:grid; grid-template-columns:minmax(280px,1.1fr) 2fr; gap:70px; padding:78px 0 58px; border-top:1px solid rgba(184,155,94,.34); }
        .lux-footer__brand { color:#F7F5F0; text-decoration:none; }
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
        .lux-footer__assurance { display:grid; grid-template-columns:repeat(4,minmax(0,1fr)); gap:24px; padding:28px 0; border-top:1px solid rgba(247,245,240,.12); border-bottom:1px solid rgba(247,245,240,.12); }
        .lux-footer__assurance span { display:block; color:#F7F5F0; font-size:13px; font-weight:800; letter-spacing:.06em; text-transform:uppercase; }
        .lux-footer__assurance small { display:block; margin-top:7px; color:#A8A8A8; font-size:13px; line-height:1.5; }
        .lux-footer__bottom { display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:18px 28px; padding:22px 0 28px; color:#A8A8A8; font-size:13px; }
        .lux-footer__bottom p { margin:0; }
        .lux-footer__legal { display:flex; flex-wrap:wrap; gap:18px; }
        .lux-footer__payments { display:flex; flex-wrap:wrap; align-items:center; gap:8px; }
        .lux-footer__payment { display:inline-flex; align-items:center; justify-content:center; width:52px; height:32px; padding:5px 7px; border:1px solid rgba(247,245,240,.16); border-radius:4px; background:#F7F5F0; }
        .lux-footer__payment img { display:block; max-width:100%; max-height:100%; object-fit:contain; }
        @media (max-width: 980px) {
            .lux-footer__top { grid-template-columns:1fr; gap:42px; padding:64px 0 48px; }
            .lux-footer__columns, .lux-footer__assurance { grid-template-columns:repeat(2,minmax(0,1fr)); }
        }
        @media (max-width: 620px) {
            .lux-footer__inner { width:min(100% - 32px,1280px); }
            .lux-footer__brand strong { font-size:34px; }
            .lux-footer__columns, .lux-footer__assurance { grid-template-columns:1fr; }
            .lux-footer__bottom { display:grid; }
        }
    </style>

    <div class="lux-footer__inner">
        <div class="lux-footer__top">
            <section aria-label="<?php esc_attr_e('Brand and contact information', 'dawp'); ?>">
                <a class="lux-footer__brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php esc_attr_e('luxurytheme.com home', 'dawp'); ?>">
                    <strong><?php esc_html_e('luxurytheme.com', 'dawp'); ?></strong>
                    <span><?php esc_html_e('Fine Timepieces', 'dawp'); ?></span>
                </a>
                <p class="lux-footer__intro"><?php esc_html_e('A contemporary watch boutique for refined mechanical timepieces, crafted details and confident ownership.', 'dawp'); ?></p>
                <dl class="lux-footer__contact">
                    <div>
                        <dt><?php esc_html_e('Concierge:', 'dawp'); ?></dt>
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
                        <dt><?php esc_html_e('Showroom:', 'dawp'); ?></dt>
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

        <div class="lux-footer__assurance" aria-label="<?php esc_attr_e('Purchase assurances', 'dawp'); ?>">
            <div><span><?php esc_html_e('Authenticated', 'dawp'); ?></span><small><?php esc_html_e('Verified references and documented inspection.', 'dawp'); ?></small></div>
            <div><span><?php esc_html_e('Insured Delivery', 'dawp'); ?></span><small><?php esc_html_e('Protected shipping with signature confirmation.', 'dawp'); ?></small></div>
            <div><span><?php esc_html_e('Warranty', 'dawp'); ?></span><small><?php esc_html_e('Ownership support and service guidance.', 'dawp'); ?></small></div>
            <div><span><?php esc_html_e('Consultation', 'dawp'); ?></span><small><?php esc_html_e('Private advice for fit, gifting and selection.', 'dawp'); ?></small></div>
        </div>

        <div class="lux-footer__bottom">
            <p>&copy; <?php echo esc_html(gmdate('Y')); ?> luxurytheme.com. <?php esc_html_e('All rights reserved.', 'dawp'); ?></p>
            <nav class="lux-footer__legal" aria-label="<?php esc_attr_e('Legal links', 'dawp'); ?>">
                <?php foreach ($legal_links as $link) : ?>
                    <a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?></a>
                <?php endforeach; ?>
            </nav>
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
