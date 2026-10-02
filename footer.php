<?php
/**
 * Theme footer.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$store_name      = dawp_store('name');
$shop_url        = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$account_url     = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');
$support_email   = dawp_store('email');
$support_phone   = dawp_store('phone');
$business_hours  = dawp_store('hours');
$store_address   = dawp_store('address');
$logo_path       = get_template_directory() . '/assets/img/medialmarket-logo.svg';
$logo_url        = dawp_store('logo');
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

$shop_links = [['title' => __('Shop All', 'dawp'), 'url' => $shop_url]];
foreach ((function_exists('dawp_lbq_product_categories') ? dawp_lbq_product_categories() : []) as $slug => $category) {
    $shop_links[] = ['title' => $category['name'], 'url' => dawp_product_category_url($slug)];
}

$footer_columns = [
    [
        'title' => __('Shop', 'dawp'),
        'links' => $shop_links,
    ],
    [
        'title' => __('Customer Care', 'dawp'),
        'links' => [
            ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/')],
            ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/')],
            ['title' => __('My Account', 'dawp'), 'url' => $account_url],
            ['title' => __('FAQs', 'dawp'), 'url' => home_url('/faq/')],
            ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/')],
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

$trust_items = [
    ['title' => __('Free Standard Shipping', 'dawp'), 'copy' => __('On every order within the U.S.', 'dawp'), 'icon' => '<path d="M3 7h11v10H3z"></path><path d="M14 10h4l3 3v4h-7z"></path><circle cx="7" cy="18.5" r="1.8"></circle><circle cx="17.5" cy="18.5" r="1.8"></circle>'],
    ['title' => __('30-Day Returns', 'dawp'), 'copy' => __('Unused items in original packaging', 'dawp'), 'icon' => '<path d="M3 12a9 9 0 1 0 3-6.7"></path><path d="M3 4v5h5"></path>'],
    ['title' => __('Secure Checkout', 'dawp'), 'copy' => __('Encrypted payments, major cards & PayPal', 'dawp'), 'icon' => '<rect x="4" y="10" width="16" height="11" rx="2"></rect><path d="M8 10V7a4 4 0 0 1 8 0v3"></path>'],
    ['title' => __('Real Support', 'dawp'), 'copy' => __('Email replies within 1 business day', 'dawp'), 'icon' => '<path d="M4 5h16v11H8l-4 4z"></path>'],
];
?>

</div><!-- #content -->

<footer class="mm-footer" role="contentinfo">
    <style>
        .mm-footer { background:var(--color-foreground); color:rgba(255,255,255,.78); font-family:var(--font-sans); font-size:.9rem; line-height:1.55; }
        .mm-footer a { color:inherit; text-decoration:none; }
        .mm-footer__wrap { width:min(100% - 32px, 1280px); margin-inline:auto; }
        .mm-footer__trust { background:var(--color-surface); color:var(--color-foreground); border-top:1px solid var(--color-border); }
        .mm-footer__trust ul { display:grid; grid-template-columns:repeat(2, minmax(0, 1fr)); gap:18px 16px; margin:0; padding:26px 0; list-style:none; }
        .mm-footer__trust li { display:flex; align-items:flex-start; gap:12px; }
        .mm-footer__trust svg { flex:none; width:40px; height:40px; padding:9px; border-radius:var(--radius-pill); background:var(--color-accent-soft); color:var(--color-accent); }
        .mm-footer__trust strong { display:block; font-family:var(--font-heading); font-size:.92rem; }
        .mm-footer__trust span { display:block; color:var(--color-foreground-muted); font-size:.8rem; line-height:1.4; }
        .mm-footer__main { display:grid; gap:34px; padding:48px 0 40px; }
        .mm-footer__brand img { display:block; width:auto; height:44px; padding:8px 12px; border-radius:var(--radius-md); background:#fff; }
        .mm-footer__brand p { max-width:340px; margin:16px 0 18px; }
        .mm-footer__contact { display:grid; gap:8px; margin:0; }
        .mm-footer__contact div { display:block; }
        .mm-footer__contact dt { display:inline; color:#fff; font-weight:600; }
        .mm-footer__contact dd { display:inline; margin:0; }
        .mm-footer__contact a { color:#FFD3B0; overflow-wrap:anywhere; }
        .mm-footer__contact a:hover { text-decoration:underline; }
        .mm-footer__cols { display:grid; grid-template-columns:repeat(2, minmax(0, 1fr)); gap:30px 24px; }
        .mm-footer__cols h2 { margin:0 0 14px; color:#fff; font-family:var(--font-heading); font-size:.95rem; font-weight:700; }
        .mm-footer__cols ul { display:grid; gap:9px; margin:0; padding:0; list-style:none; }
        .mm-footer__cols a { display:inline-block; padding:2px 0; transition:color var(--duration-fast) var(--ease-fluid); }
        .mm-footer__cols a:hover { color:#fff; text-decoration:underline; text-underline-offset:4px; }
        .mm-footer__bottom { border-top:1px solid rgba(255,255,255,.14); padding:18px 0; font-size:.82rem; }
        .mm-footer__bottom-row { display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:14px 24px; }
        .mm-footer__bottom p { margin:0; }
        .mm-footer__payments { display:flex; flex-wrap:wrap; gap:8px; }
        .mm-footer__payment { display:inline-flex; align-items:center; justify-content:center; width:54px; height:34px; padding:5px 7px; border-radius:var(--radius-sm); background:#fff; }
        .mm-footer__payment img { display:block; max-width:100%; max-height:100%; object-fit:contain; }
        @media (min-width: 900px) {
            .mm-footer__trust ul { grid-template-columns:repeat(4, minmax(0, 1fr)); }
            .mm-footer__main { grid-template-columns:minmax(280px, 1fr) 2fr; gap:56px; padding:60px 0 48px; }
            .mm-footer__cols { grid-template-columns:repeat(3, minmax(0, 1fr)); }
        }
    </style>

    <div class="mm-footer__trust">
        <div class="mm-footer__wrap">
            <ul>
                <?php foreach ($trust_items as $item) : ?>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><?php echo $item['icon']; ?></svg>
                        <div><strong><?php echo esc_html($item['title']); ?></strong><span><?php echo esc_html($item['copy']); ?></span></div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <div class="mm-footer__wrap mm-footer__main">
        <section class="mm-footer__brand" aria-label="<?php esc_attr_e('Contact information', 'dawp'); ?>">
            <a href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php echo esc_attr(sprintf(__('%s home', 'dawp'), $store_name)); ?>">
                <img src="<?php echo esc_url($logo_url); ?>" width="198" height="44" alt="<?php echo esc_attr($store_name); ?>" loading="lazy" decoding="async">
            </a>
            <p><?php esc_html_e('Budget-friendly furniture, kitchen, outdoor, decor, kids and pet essentials for American homes, shipped free across the U.S.', 'dawp'); ?></p>
            <dl class="mm-footer__contact">
                <div>
                    <dt><?php esc_html_e('Email:', 'dawp'); ?></dt>
                    <dd><a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a></dd>
                </div>
                <?php if ($support_phone) : ?>
                <div>
                    <dt><?php esc_html_e('Phone:', 'dawp'); ?></dt>
                    <dd><a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $support_phone)); ?>"><?php echo esc_html($support_phone); ?></a></dd>
                </div>
                <?php endif; ?>
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

        <div class="mm-footer__cols">
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

    <div class="mm-footer__bottom">
        <div class="mm-footer__wrap mm-footer__bottom-row">
            <p>&copy; <?php echo esc_html(gmdate('Y')); ?> <?php echo esc_html($store_name); ?>. <?php esc_html_e('All rights reserved.', 'dawp'); ?></p>
            <div class="mm-footer__payments" aria-label="<?php esc_attr_e('Accepted payment methods', 'dawp'); ?>">
                <?php foreach ($payment_methods as $method) : ?>
                    <?php
                    $payment_path = get_template_directory() . '/assets/img/payment/' . $method['file'];
                    $payment_url  = get_template_directory_uri() . '/assets/img/payment/' . $method['file'];

                    if (!file_exists($payment_path)) {
                        continue;
                    }

                    $payment_url = add_query_arg('ver', filemtime($payment_path), $payment_url);
                    ?>
                    <span class="mm-footer__payment">
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
