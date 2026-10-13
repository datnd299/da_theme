<?php
/**
 * Theme footer.
 *
 * @package dawp
 */

$current_year = date_i18n('Y');
$brand_name   = 'Mytire';
$shop_url     = function_exists('wc_get_page_id') && wc_get_page_id('shop') > 0
    ? get_permalink(wc_get_page_id('shop'))
    : home_url('/shop/');

$footer_shop_links = [
    ['title' => __('Shop All Tires', 'dawp'), 'url' => $shop_url],
    ['title' => __('Shop by Brand', 'dawp'), 'url' => home_url('/shop-by-brand/')],
    ['title' => __('Shop by Rim Size', 'dawp'), 'url' => home_url('/shop-by-rim-size/')],
];

$footer_company_links = [
    ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/')],
    ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/')],
    ['title' => __('My Account', 'dawp'), 'url' => get_permalink(get_option('woocommerce_myaccount_page_id')) ?: home_url('/my-account/')],
];

$footer_policy_links = [
    ['title' => __('FAQs', 'dawp'), 'url' => home_url('/faq/')],
    ['title' => __('Shipping Policy', 'dawp'), 'url' => home_url('/shipping-policy/')],
    ['title' => __('Return & Refund Policy', 'dawp'), 'url' => home_url('/returns-policy/')],
    ['title' => __('Privacy Policy', 'dawp'), 'url' => home_url('/privacy-policy/')],
    ['title' => __('Terms & Conditions', 'dawp'), 'url' => home_url('/terms-conditions/')],
];

$footer_payment_methods = [
    ['label' => __('JCB', 'dawp'), 'image' => get_template_directory_uri() . '/assets/img/payment/jcb.png'],
    ['label' => __('MasterCard', 'dawp'), 'image' => get_template_directory_uri() . '/assets/img/payment/mastercard.png'],
    ['label' => __('PayPal', 'dawp'), 'image' => get_template_directory_uri() . '/assets/img/payment/paypal.png'],
    ['label' => __('Visa', 'dawp'), 'image' => get_template_directory_uri() . '/assets/img/payment/visa.png'],
];
?>

</div><!-- #content -->

<footer id="colophon" class="dawp-site-footer bg-[#3f342d] font-sans text-white" role="contentinfo">
    <section class="dawp-site-footer__main">
        <div class="dawp-footer-grid mx-auto grid max-w-7xl gap-10 px-4 py-12 sm:px-6 lg:px-8 lg:py-14">
            <div class="dawp-footer-newsletter max-w-md">
                <h2 class="text-base font-semibold leading-tight text-white"><?php esc_html_e('Get on Our Email List', 'dawp'); ?></h2>
                <p class="dawp-footer-copy mt-5 text-sm font-normal leading-6 text-white"><?php esc_html_e('Stay up to date on products and current promotions.', 'dawp'); ?></p>

                <form class="dawp-footer-signup mt-2 flex max-w-sm" action="<?php echo esc_url(home_url('/')); ?>" method="get">
                    <label class="sr-only" for="dawp-footer-email"><?php esc_html_e('Email address', 'dawp'); ?></label>
                    <input id="dawp-footer-email" name="footer_email" type="email" class="h-12 min-w-0 flex-1 bg-white px-4 text-sm font-normal text-[#111111] outline-none placeholder:text-[#777777] focus:ring-2 focus:ring-[#ffcc00]/30" placeholder="<?php esc_attr_e('Email address', 'dawp'); ?>">
                    <button type="submit" class="h-12 shrink-0 bg-[#ffcc00] px-5 text-sm font-semibold text-[#171717] transition hover:bg-[#e6b800]">
                        <?php esc_html_e('Sign Up', 'dawp'); ?>
                    </button>
                </form>

                <div class="dawp-footer-social mt-7 flex items-center gap-6 text-white">
                    <a href="https://www.facebook.com/p/MyTire-100094210416851/" target="_blank" rel="noopener noreferrer" class="transition hover:text-[#ffcc00]" aria-label="<?php esc_attr_e('Facebook page', 'dawp'); ?>">
                        <svg class="h-7 w-7" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M22 12.06C22 6.51 17.52 2 12 2S2 6.51 2 12.06c0 5.02 3.66 9.18 8.44 9.94v-7.03H7.9v-2.91h2.54V9.85c0-2.52 1.49-3.91 3.77-3.91 1.09 0 2.23.2 2.23.2v2.47h-1.26c-1.24 0-1.63.78-1.63 1.57v1.88h2.78l-.44 2.91h-2.34V22C18.34 21.24 22 17.08 22 12.06z" /></svg>
                    </a>
                    <a href="mailto:support@Mytire.co" class="transition hover:text-[#ffcc00]" aria-label="<?php esc_attr_e('Email support', 'dawp'); ?>">
                        <svg class="h-7 w-7" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M3.5 5h17c.83 0 1.5.67 1.5 1.5v11c0 .83-.67 1.5-1.5 1.5h-17c-.83 0-1.5-.67-1.5-1.5v-11C2 5.67 2.67 5 3.5 5Zm8.5 7.45 7.54-5.7H4.46l7.54 5.7Zm0 2.25L4 8.65v8.6h16v-8.6l-8 6.05Z"/></svg>
                    </a>
                </div>

            </div>

            <div class="dawp-footer-support dawp-footer-info grid gap-2 text-sm font-normal leading-6 text-white">
                <h3 class="font-semibold text-white"><?php esc_html_e('Get in Touch', 'dawp'); ?></h3>
                <p class="dawp-footer-contact-item dawp-footer-copy">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2a10 10 0 1 0 10 10A10.02 10.02 0 0 0 12 2Zm4.15 12.95a1 1 0 0 1-1.4.2l-3.25-2.44A1 1 0 0 1 11.1 12V7.5a1 1 0 0 1 2 0v4l2.85 2.14a1 1 0 0 1 .2 1.31Z"/></svg>
                    <span><?php esc_html_e('Monday - Friday 8:00 - 8:00 ET', 'dawp'); ?></span>
                </p>
                <p class="dawp-footer-contact-item dawp-footer-copy">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 2a1 1 0 0 1 1 1v1h8V3a1 1 0 1 1 2 0v1h1.5A2.5 2.5 0 0 1 22 6.5v12A2.5 2.5 0 0 1 19.5 21h-15A2.5 2.5 0 0 1 2 18.5v-12A2.5 2.5 0 0 1 4.5 4H6V3a1 1 0 0 1 1-1Zm13 8H4v8.5a.5.5 0 0 0 .5.5h15a.5.5 0 0 0 .5-.5V10Z"/></svg>
                    <span><?php esc_html_e('Saturday 9:00 - 4:00 ET', 'dawp'); ?></span>
                </p>
                <p>
                    <a href="tel:+18887984739" class="dawp-footer-contact-item font-semibold transition hover:text-[#ffcc00]">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6.62 10.79a15.05 15.05 0 0 0 6.59 6.59l2.2-2.2a1.5 1.5 0 0 1 1.54-.36 11.4 11.4 0 0 0 3.55.57A1.5 1.5 0 0 1 22 16.89V20.5A1.5 1.5 0 0 1 20.5 22 18.5 18.5 0 0 1 2 3.5 1.5 1.5 0 0 1 3.5 2h3.61A1.5 1.5 0 0 1 8.6 3.5a11.4 11.4 0 0 0 .57 3.55 1.5 1.5 0 0 1-.36 1.54l-2.2 2.2Z"/></svg>
                        <span>888-798-4739</span>
                    </a>
                </p>
                <p>
                    <a href="mailto:support@Mytire.co" class="dawp-footer-contact-item font-semibold transition hover:text-[#ffcc00]">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3.5 5h17A1.5 1.5 0 0 1 22 6.5v11a1.5 1.5 0 0 1-1.5 1.5h-17A1.5 1.5 0 0 1 2 17.5v-11A1.5 1.5 0 0 1 3.5 5Zm8.5 7.35L19.4 7H4.6l7.4 5.35Zm0 2.45L4 9.02V17h16V9.02l-8 5.78Z"/></svg>
                        <span>support@Mytire.co</span>
                    </a>
                </p>
                <p class="dawp-footer-contact-item dawp-footer-copy">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 21V7.5L12 3l8 4.5V21h-6v-5h-4v5H4Zm4-8h2v-2H8v2Zm0-4h2V7H8v2Zm6 4h2v-2h-2v2Zm0-4h2V7h-2v2Z"/></svg>
                    <span><?php esc_html_e('TIRE CAPITAL LLC', 'dawp'); ?></span>
                </p>
            </div>

            <nav aria-label="<?php esc_attr_e('Footer shop navigation', 'dawp'); ?>">
                <h3 class="mb-5 text-base font-semibold leading-tight text-white"><?php esc_html_e('Shop', 'dawp'); ?></h3>
                <ul class="space-y-3">
                    <?php foreach ($footer_shop_links as $link) : ?>
                        <li><a href="<?php echo esc_url($link['url']); ?>" class="text-sm font-normal text-white transition hover:text-[#ffcc00]"><?php echo esc_html($link['title']); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <nav aria-label="<?php esc_attr_e('Footer company navigation', 'dawp'); ?>">
                <h3 class="mb-5 text-base font-semibold leading-tight text-white"><?php esc_html_e('About Mytire', 'dawp'); ?></h3>
                <ul class="space-y-3">
                    <?php foreach ($footer_company_links as $link) : ?>
                        <li><a href="<?php echo esc_url($link['url']); ?>" class="text-sm font-normal text-white transition hover:text-[#ffcc00]"><?php echo esc_html($link['title']); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <nav aria-label="<?php esc_attr_e('Footer policy navigation', 'dawp'); ?>">
                <h3 class="mb-5 text-base font-semibold leading-tight text-white"><?php esc_html_e('Privacy', 'dawp'); ?></h3>
                <ul class="space-y-3">
                    <?php foreach ($footer_policy_links as $link) : ?>
                        <li><a href="<?php echo esc_url($link['url']); ?>" class="text-sm font-normal text-white transition hover:text-[#ffcc00]"><?php echo esc_html($link['title']); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
    </section>

    <div class="dawp-site-footer__bottom border-t border-white/10">
        <div class="mx-auto flex max-w-7xl flex-col gap-5 px-4 py-5 text-xs font-normal text-white sm:px-6 lg:flex-row lg:items-center lg:justify-between lg:px-8">
            <p>&copy; <?php echo esc_html($current_year); ?> <?php echo esc_html($brand_name); ?>. <?php esc_html_e('All rights reserved.', 'dawp'); ?></p>

            <ul class="dawp-footer-payments flex flex-wrap gap-1.5" aria-label="<?php esc_attr_e('Accepted payment methods', 'dawp'); ?>">
                <?php foreach ($footer_payment_methods as $method) : ?>
                    <li>
                        <img <?php echo dawp_responsive_image_attrs($method['image'], 80, 48, '80px', [80, 120, 160]); ?>
                             alt="<?php echo esc_attr($method['label']); ?>"
                             loading="lazy"
                             class="h-6 w-auto bg-white">
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
