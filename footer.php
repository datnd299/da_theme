</div><!-- #content -->

<?php
/**
 * Theme footer.
 */

$footer_shop_links = array(
    array(
        'title' => __('Shop All Footwear', 'dawp'),
        'url'   => home_url('/shop/'),
    ),
    array(
        'title' => __('Handmade Leather Shoes', 'dawp'),
        'url'   => home_url('/product-category/handmade-leather-shoes/'),
    ),
    array(
        'title' => __('Leather Sandals', 'dawp'),
        'url'   => home_url('/product-category/leather-sandals/'),
    ),
    array(
        'title' => __('Leather Boots', 'dawp'),
        'url'   => home_url('/product-category/leather-boots/'),
    ),
    array(
        'title' => __('Custom Leather Footwear', 'dawp'),
        'url'   => home_url('/product-category/custom-leather-footwear/'),
    ),
);

$footer_help_links = array(
    array(
        'title' => __('Track Order', 'dawp'),
        'url'   => home_url('/track-order/'),
    ),
    array(
        'title' => __('Contact Us', 'dawp'),
        'url'   => home_url('/contact-us/'),
    ),
    array(
        'title' => __('About Us', 'dawp'),
        'url'   => home_url('/about-us/'),
    ),
    array(
        'title' => __('My Account', 'dawp'),
        'url'   => function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/'),
    ),
);

$footer_policy_links = array(
    array(
        'title' => __('FAQs', 'dawp'),
        'url'   => home_url('/faq/'),
    ),
    array(
        'title' => __('Shipping Policy', 'dawp'),
        'url'   => home_url('/shipping-policy/'),
    ),
    array(
        'title' => __('Refund & Return Policy', 'dawp'),
        'url'   => home_url('/refund-return-policy/'),
    ),
    array(
        'title' => __('Privacy Policy', 'dawp'),
        'url'   => home_url('/privacy-policy/'),
    ),
    array(
        'title' => __('Terms & Conditions', 'dawp'),
        'url'   => home_url('/terms-conditions/'),
    ),
);

$footer_payment_methods = array(
    array(
        'title' => __('Visa', 'dawp'),
        'file'  => 'visa.png',
    ),
    array(
        'title' => __('Mastercard', 'dawp'),
        'file'  => 'master_card.png',
    ),
    array(
        'title' => __('PayPal', 'dawp'),
        'file'  => 'Paypal.png',
    ),
    array(
        'title' => __('American Express', 'dawp'),
        'file'  => 'AE.png',
    ),
);

$footer_store_address = dawp_get_store_address();
$footer_logo_url      = get_template_directory_uri() . '/assets/img/logo.png';
$footer_logo_src      = dawp_i0_image_url($footer_logo_url, 272, 181);
$footer_logo_srcset   = dawp_i0_srcset($footer_logo_url, 1536, 1024, array(136, 272, 408));
?>

<style>
    .hcs-footer {
        --hcs-ink: #17212B;
        --hcs-pine: #2F4A43;
        --hcs-sage: #A7B7A5;
        --hcs-rose: #8B3A44;
        --hcs-fog: #E7E8E3;
        --hcs-ivory: #F7F3EC;
        --hcs-slate: #B9C0BC;
        background: var(--hcs-ink);
        color: var(--hcs-ivory);
        font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    }
    .hcs-footer a { color: inherit; text-decoration: none; }
    .hcs-footer-wrap { width: min(100% - 32px, 1340px); margin: 0 auto; }
    .hcs-footer-main {
        display: grid;
        grid-template-columns: minmax(0, 1.05fr) repeat(3, minmax(150px, .72fr)) minmax(300px, 1fr);
        column-gap: 58px;
        row-gap: 38px;
        padding: 68px 0 54px;
    }
    .hcs-footer-brand {
        display: inline-flex;
        align-items: center;
        margin-bottom: 18px;
    }
    .hcs-footer-logo {
        display: block;
        width: 136px;
        max-width: 100%;
        height: auto;
    }
    .hcs-footer-socials {
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 18px 0 0;
    }
    .hcs-footer-social {
        display: inline-grid;
        place-items: center;
        width: 38px;
        height: 38px;
        border-radius: 999px;
        background: rgba(247,243,236,.08);
        border: 1px solid rgba(247,243,236,.16);
        color: rgba(247,243,236,.88);
        transition: background .18s ease, color .18s ease, transform .18s ease;
    }
    .hcs-footer-social:hover {
        background: #fff;
        color: var(--hcs-ink);
        transform: translateY(-1px);
    }
    .hcs-footer-social svg {
        display: block;
        width: 18px;
        height: 18px;
    }
    .hcs-footer-heading {
        margin: 4px 0 17px;
        color: #fff;
        font-size: 12px;
        font-weight: 900;
        letter-spacing: .14em;
        text-transform: uppercase;
    }
    .hcs-footer-list {
        display: grid;
        gap: 11px;
        margin: 0;
        padding: 0;
        list-style: none;
    }
    .hcs-footer-list a {
        color: rgba(247,243,236,.74);
        font-size: 14px;
        line-height: 1.45;
        transition: color .18s ease, padding-left .18s ease;
    }
    .hcs-footer-list a:hover {
        color: #fff;
        padding-left: 4px;
    }
    .hcs-footer-newsletter {
        padding: 24px;
        border-radius: 22px;
        background: rgba(47,74,67,.82);
        border: 1px solid rgba(247,243,236,.14);
        box-shadow: 0 18px 38px rgba(0,0,0,.14);
    }
    .hcs-footer-newsletter p {
        margin: 0 0 16px;
        color: rgba(247,243,236,.74);
        font-size: 14px;
        line-height: 1.65;
    }
    .hcs-footer-form {
        display: flex;
        gap: 9px;
    }
    .hcs-footer-input {
        flex: 1;
        min-width: 0;
        height: 46px;
        padding: 0 14px;
        border-radius: 999px;
        border: 1px solid rgba(247,243,236,.22);
        background: rgba(247,243,236,.12);
        color: #fff;
        font-size: 14px;
        outline: none;
    }
    .hcs-footer-input::placeholder { color: rgba(247,243,236,.58); }
    .hcs-footer-input:focus {
        border-color: var(--hcs-sage);
        background: rgba(247,243,236,.16);
    }
    .hcs-footer-submit {
        height: 46px;
        padding: 0 18px;
        border: 0;
        border-radius: 999px;
        background: #fff;
        color: var(--hcs-ink);
        font-size: 14px;
        font-weight: 900;
        cursor: pointer;
        transition: background .18s ease, transform .18s ease;
    }
    .hcs-footer-submit:hover {
        background: rgba(247,243,236,.88);
        color: var(--hcs-ink);
        transform: translateY(-1px);
    }
    .hcs-footer-note {
        display: grid;
        gap: 9px;
        margin-top: 18px;
        color: rgba(247,243,236,.72);
        font-size: 12px;
        line-height: 1.45;
    }
    .hcs-footer-note span {
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .hcs-footer-dot {
        width: 7px;
        height: 7px;
        border-radius: 99px;
        background: var(--hcs-sage);
        flex: 0 0 auto;
    }
    .hcs-footer-bottom {
        border-top: 1px solid rgba(247,243,236,.12);
        background: rgba(0,0,0,.14);
    }
    .hcs-footer-bottom-inner {
        min-height: 64px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 18px;
        color: rgba(247,243,236,.68);
        font-size: 13px;
    }
    .hcs-footer-payments {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: flex-end;
        gap: 10px;
        margin: 0;
        padding: 0;
        list-style: none;
    }
    .hcs-footer-payment {
        display: grid;
        place-items: center;
        width: 54px;
        height: 34px;
        border-radius: 6px;
        background: rgba(247,243,236,.94);
        border: 1px solid rgba(247,243,236,.18);
    }
    .hcs-footer-payment img {
        display: block;
        max-width: 42px;
        max-height: 22px;
        object-fit: contain;
    }
    .screen-reader-text {
        border: 0;
        clip: rect(1px, 1px, 1px, 1px);
        clip-path: inset(50%);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        width: 1px;
        word-wrap: normal !important;
    }
    @media (max-width: 1100px) {
        .hcs-footer-main {
            grid-template-columns: 1.25fr 1fr 1fr;
        }
        .hcs-footer-newsletter {
            grid-column: span 2;
        }
    }
    @media (max-width: 760px) {
        .hcs-footer-main {
            grid-template-columns: 1fr;
            gap: 30px;
            padding: 52px 0 42px;
        }
        .hcs-footer-newsletter {
            grid-column: auto;
            padding: 20px;
        }
        .hcs-footer-form {
            display: grid;
        }
        .hcs-footer-bottom-inner {
            align-items: flex-start;
            flex-direction: column;
            padding: 18px 0;
        }
        .hcs-footer-payments {
            justify-content: flex-start;
        }
    }
</style>

<footer id="colophon" class="hcs-footer" role="contentinfo">
    <div class="hcs-footer-wrap hcs-footer-main">
        <div>
            <a class="hcs-footer-brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php esc_attr_e('Handcraft Shoe homepage', 'dawp'); ?>">
                <img
                    class="hcs-footer-logo"
                    loading="lazy"
                    decoding="async"
                    width="136"
                    height="91"
                    src="<?php echo esc_url($footer_logo_src); ?>"
                    srcset="<?php echo esc_attr($footer_logo_srcset); ?>"
                    sizes="136px"
                    alt="<?php esc_attr_e('Handcraft Shoe', 'dawp'); ?>">
            </a>

            <div class="hcs-footer-note" aria-label="<?php esc_attr_e('Customer support notes', 'dawp'); ?>">
                <span><i class="hcs-footer-dot" aria-hidden="true"></i><?php esc_html_e('Support: ', 'dawp'); ?><a href="mailto:support@handcraftshoe.com"><?php esc_html_e('support@handcraftshoe.com', 'dawp'); ?></a></span>
                <?php if ( $footer_store_address ) : ?>
                    <span><i class="hcs-footer-dot" aria-hidden="true"></i><?php printf( esc_html__( 'Address: %s.', 'dawp' ), esc_html( $footer_store_address ) ); ?></span>
                <?php endif; ?>
                <span><i class="hcs-footer-dot" aria-hidden="true"></i><?php esc_html_e('Business Hours: Monday to Friday, 9:00 AM to 5:00 PM PST.', 'dawp'); ?></span>
            </div>

            <div class="hcs-footer-socials">
                <a class="hcs-footer-social" href="https://www.facebook.com/handcraftshoe/" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e('Handcraft Shoe on Facebook', 'dawp'); ?>">
                    <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M14 8.5V6.75c0-.9.56-1.11.95-1.11h2.42V2.12L14.03 2C10.72 2 9.96 4.48 9.96 6.07V8.5H7.5v3.96h2.46V22H14v-9.54h3.05l.4-3.96H14Z"/>
                    </svg>
                </a>
            </div>
        </div>

        <nav aria-label="<?php esc_attr_e('Footer shop links', 'dawp'); ?>">
            <h2 class="hcs-footer-heading"><?php esc_html_e('Shop', 'dawp'); ?></h2>
            <ul class="hcs-footer-list">
                <?php foreach ($footer_shop_links as $link) : ?>
                    <li><a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <nav aria-label="<?php esc_attr_e('Footer help links', 'dawp'); ?>">
            <h2 class="hcs-footer-heading"><?php esc_html_e('Help', 'dawp'); ?></h2>
            <ul class="hcs-footer-list">
                <?php foreach ($footer_help_links as $link) : ?>
                    <li><a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <nav aria-label="<?php esc_attr_e('Footer policy links', 'dawp'); ?>">
            <h2 class="hcs-footer-heading"><?php esc_html_e('Policy', 'dawp'); ?></h2>
            <ul class="hcs-footer-list">
                <?php foreach ($footer_policy_links as $link) : ?>
                    <li><a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <div class="hcs-footer-newsletter">
            <h2 class="hcs-footer-heading"><?php esc_html_e('Care Notes', 'dawp'); ?></h2>
            <p>
                <?php esc_html_e('Receive new footwear updates, leather care notes, and sizing reminders written for calm, practical shopping.', 'dawp'); ?>
            </p>

            <form id="footer-newsletter-form" class="hcs-footer-form" autocomplete="off">
                <label for="footer-email" class="screen-reader-text">
                    <?php esc_html_e('Email address', 'dawp'); ?>
                </label>
                <input
                    id="footer-email"
                    class="hcs-footer-input"
                    type="email"
                    name="email"
                    autocomplete="off"
                    placeholder="<?php esc_attr_e('Email address', 'dawp'); ?>"
                    required>
                <button type="submit" class="hcs-footer-submit">
                    <?php esc_html_e('Join', 'dawp'); ?>
                </button>
            </form>
            <p id="footer-newsletter-msg" aria-live="polite" style="display:none;margin-top:10px;margin-bottom:0;font-size:12px;"></p>

        </div>
    </div>

    <div class="hcs-footer-bottom">
        <div class="hcs-footer-wrap hcs-footer-bottom-inner">
            <p>
                &copy; <?php echo esc_html(date_i18n('Y')); ?>
                <?php esc_html_e('Handcraft Shoe. All rights reserved.', 'dawp'); ?>
            </p>
            <ul class="hcs-footer-payments" aria-label="<?php esc_attr_e('Accepted payment methods', 'dawp'); ?>">
                <?php foreach ($footer_payment_methods as $payment_method) : ?>
                    <li class="hcs-footer-payment">
                        <img
                            loading="lazy"
                            decoding="async"
                            width="42"
                            height="14"
                            src="<?php echo esc_url(dawp_i0_image_url(get_template_directory_uri() . '/assets/img/payment/' . $payment_method['file'], 84, 27)); ?>"
                            srcset="<?php echo esc_attr(dawp_i0_srcset(get_template_directory_uri() . '/assets/img/payment/' . $payment_method['file'], 320, 104, array(42, 84, 160))); ?>"
                            sizes="42px"
                            alt="<?php echo esc_attr($payment_method['title']); ?>">
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
