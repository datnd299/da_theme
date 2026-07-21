<?php
/**
 * Theme footer for Altrevia.
 *
 * @package dawp
 */

$current_year = date_i18n('Y');
$account_url  = get_permalink(get_option('woocommerce_myaccount_page_id'));
$account_url  = $account_url ?: home_url('/my-account/');
$footer_logo  = get_template_directory_uri() . '/assets/images/altrevia.png';
$store_address = function_exists('dawp_get_store_address_line') ? dawp_get_store_address_line() : '';

$footer_shop_links = [
    ['title' => __('Shop All Bracelets', 'dawp'), 'url' => home_url('/shop/')],
    ['title' => __('Charm Bracelets', 'dawp'), 'url' => home_url('/product-category/charm-bracelets/')],
    ['title' => __('Owl Bracelets', 'dawp'), 'url' => home_url('/product-category/owl-bracelets/')],
    ['title' => __('Beaded Bracelets', 'dawp'), 'url' => home_url('/product-category/beaded-bracelets/')],
    ['title' => __('Chain Bracelets', 'dawp'), 'url' => home_url('/product-category/chain-bracelets/')],
    ['title' => __('Gift Bracelets', 'dawp'), 'url' => home_url('/product-category/gift-bracelets/')],
];

$footer_help_links = [
    ['title' => __('FAQs', 'dawp'), 'url' => home_url('/faq/')],
    ['title' => __('Shipping Policy', 'dawp'), 'url' => home_url('/shipping-policy/')],
    ['title' => __('Return & Refund Policy', 'dawp'), 'url' => home_url('/return-refund-policy/')],
    ['title' => __('Privacy Policy', 'dawp'), 'url' => home_url('/privacy-policy/')],
    ['title' => __('Terms & Conditions', 'dawp'), 'url' => home_url('/terms-conditions/')],
];

$footer_policy_links = [
    ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/')],
    ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/')],
    ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/')],
    ['title' => __('My Account', 'dawp'), 'url' => $account_url],
];
?>

</div><!-- #content -->

<style>
  .qb-site-footer {
    --qb-blush: #ffb7c5;
    --qb-peach: #ffd6a5;
    --qb-cream: #fff8f4;
    --qb-mint: #cff5e7;
    --qb-gold: #d8a94e;
    --qb-plum: #2f1f35;
    --qb-text: #4f4355;
    --qb-border: rgba(47,31,53,.12);
    background:
      linear-gradient(135deg, rgba(255,183,197,.35), rgba(255,214,165,.38) 48%, rgba(207,245,231,.4)),
      #fff;
    color: var(--qb-text);
    font-family: "DM Sans", "Inter", system-ui, sans-serif;
  }

  .qb-site-footer * {
    box-sizing: border-box;
  }

  .qb-site-footer a {
    color: inherit;
    text-decoration: none;
  }

  .qb-footer-wrap {
    width: min(100% - 32px, 1280px);
    margin-inline: auto;
  }

  .qb-footer-main {
    display: grid;
    grid-template-columns: minmax(0, 1.35fr) repeat(3, minmax(160px, .7fr));
    gap: 46px;
    padding: 62px 0;
  }

  .qb-footer-brand strong {
    display: block;
    color: var(--qb-plum);
    font-family: Georgia, "Times New Roman", serif;
    font-size: clamp(32px, 4vw, 48px);
    line-height: 1.05;
    letter-spacing: 0;
  }

  .qb-footer-logo {
    display: block;
    width: min(108px, 100%);
    height: auto;
  }

  .qb-footer-brand span {
    display: block;
    margin-top: 8px;
    color: var(--qb-gold);
    font-size: 12px;
    font-weight: 800;
    letter-spacing: .2em;
    text-transform: uppercase;
  }

  .qb-footer-contact {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 16px;
    margin-top: 24px;
    max-width: 430px;
  }

  .qb-footer-contact a,
  .qb-footer-contact span {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    color: var(--qb-text);
    font-size: 12px;
    font-weight: 700;
    line-height: 1.2;
  }

  .qb-footer-contact svg {
    width: 15px;
    height: 15px;
    flex: 0 0 auto;
    fill: currentColor;
    stroke: currentColor;
  }

  .qb-footer-contact a:hover {
    color: var(--qb-plum);
  }

  .qb-footer-contact a:last-child {
    justify-content: flex-start;
  }

  .qb-footer-col h3 {
    margin: 0 0 18px;
    color: var(--qb-gold);
    font-size: 12px;
    font-weight: 800;
    letter-spacing: .2em;
    text-transform: uppercase;
  }

  .qb-footer-col ul {
    display: grid;
    gap: 12px;
    margin: 0;
    padding: 0;
    list-style: none;
  }

  .qb-footer-col a {
    color: var(--qb-text);
    font-size: 14px;
    font-weight: 700;
    line-height: 1.4;
    transition: color .2s ease;
  }

  .qb-footer-col a:hover {
    color: var(--qb-plum);
  }

  .qb-footer-bottom {
    border-top: 1px solid var(--qb-border);
  }

  .qb-footer-bottom__inner {
    display: flex;
    gap: 20px;
    align-items: center;
    justify-content: space-between;
    padding: 22px 0;
    color: var(--qb-text);
    font-size: 13px;
  }

  .qb-payment {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    align-items: center;
    justify-content: center;
  }

  .qb-payment span {
    border: 1px solid var(--qb-border);
    border-radius: 6px;
    background: rgba(255,255,255,.55);
    color: var(--qb-plum);
    font-size: 11px;
    font-weight: 800;
    line-height: 1;
    padding: 7px 9px;
  }

  @media (max-width: 980px) {
    .qb-footer-main {
      grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .qb-footer-brand {
      grid-column: 1 / -1;
    }
  }

  @media (max-width: 680px) {
    .qb-footer-main {
      grid-template-columns: 1fr;
    }

    .qb-footer-main {
      gap: 32px;
      padding: 48px 0;
    }

    .qb-footer-contact a,
    .qb-footer-contact span {
      width: auto;
    }

    .qb-footer-bottom__inner {
      flex-direction: column;
      align-items: flex-start;
    }
  }
</style>

<footer id="colophon" class="qb-site-footer" role="contentinfo">
    <section>
        <div class="qb-footer-wrap qb-footer-main">
            <div class="qb-footer-brand">
                <a href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php esc_attr_e("Altrevia home", 'dawp'); ?>">
                    <?php
                    echo qb_responsive_image(
                        $footer_logo,
                        __("Altrevia", 'dawp'),
                        [
                            'class'  => 'qb-footer-logo',
                            'width'  => 108,
                            'height' => 108,
                            'widths' => [108, 160, 216],
                            'sizes'  => '108px',
                        ]
                    );
                    ?>
                </a>

                <div class="qb-footer-contact">
                    <span>
                        <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                            <path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20Zm0 18a8 8 0 1 1 0-16 8 8 0 0 1 0 16Zm1-13h-2v5.35l4.25 2.55 1-1.62L13 11.35V7Z"/>
                        </svg>
                        <?php esc_html_e('Monday-Friday, 9:00 AM-6:00 PM PST.', 'dawp'); ?>
                    </span>
                    <a href="mailto:support@altreviallc.com" aria-label="<?php esc_attr_e('Email support', 'dawp'); ?>">
                        <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                            <path d="M3 6.5A2.5 2.5 0 0 1 5.5 4h13A2.5 2.5 0 0 1 21 6.5v11A2.5 2.5 0 0 1 18.5 20h-13A2.5 2.5 0 0 1 3 17.5v-11Zm2.5-.5a.5.5 0 0 0-.5.5v.38l7 4.38 7-4.38V6.5a.5.5 0 0 0-.5-.5h-13Zm13 12a.5.5 0 0 0 .5-.5V9.25l-6.47 4.04a1 1 0 0 1-1.06 0L5 9.25v8.25a.5.5 0 0 0 .5.5h13Z"/>
                        </svg>
                        support@altreviallc.com
                    </a>
                    <?php if ($store_address) : ?>
                        <span>
                            <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                                <path d="M12 2C8.14 2 5 5.14 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.86-3.14-7-7-7Zm0 17.17C9.83 16.6 7 12.52 7 9a5 5 0 0 1 10 0c0 3.52-2.83 7.6-5 10.17ZM12 6.5A2.5 2.5 0 1 0 12 11.5 2.5 2.5 0 0 0 12 6.5Zm0 3.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
                            </svg>
                            <?php echo esc_html($store_address); ?>
                        </span>
                    <?php endif; ?>
                    <a href="https://www.facebook.com/altreviallc/" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e('Facebook', 'dawp'); ?>">
                        <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                            <path d="M22 12.06C22 6.5 17.52 2 12 2S2 6.5 2 12.06C2 17.08 5.66 21.25 10.44 22v-7.03H7.9v-2.91h2.54V9.84c0-2.52 1.49-3.91 3.78-3.91 1.1 0 2.24.2 2.24.2v2.47H15.2c-1.24 0-1.63.78-1.63 1.57v1.89h2.78l-.44 2.91h-2.34V22C18.34 21.25 22 17.08 22 12.06Z"/>
                        </svg>
                        Facebook
                    </a>
                </div>
            </div>

            <nav class="qb-footer-col" aria-label="<?php esc_attr_e('Footer shop navigation', 'dawp'); ?>">
                <h3><?php esc_html_e('Shop', 'dawp'); ?></h3>
                <ul>
                    <?php foreach ($footer_shop_links as $link) : ?>
                        <li><a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <nav class="qb-footer-col" aria-label="<?php esc_attr_e('Footer help navigation', 'dawp'); ?>">
                <h3><?php esc_html_e('HELP', 'dawp'); ?></h3>
                <ul>
                    <?php foreach ($footer_help_links as $link) : ?>
                        <li><a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <nav class="qb-footer-col" aria-label="<?php esc_attr_e('Footer policy navigation', 'dawp'); ?>">
                <h3><?php esc_html_e('ABOUT', 'dawp'); ?></h3>
                <ul>
                    <?php foreach ($footer_policy_links as $link) : ?>
                        <li><a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
    </section>

    <div class="qb-footer-bottom">
        <div class="qb-footer-wrap qb-footer-bottom__inner">
            <p>&copy; <?php echo esc_html($current_year); ?> <?php esc_html_e("Altrevia. All rights reserved.", 'dawp'); ?></p>
            <div class="qb-payment" aria-label="<?php esc_attr_e('Accepted payment methods', 'dawp'); ?>">
                <span><?php esc_html_e('Visa', 'dawp'); ?></span>
                <span><?php esc_html_e('Mastercard', 'dawp'); ?></span>
                <span><?php esc_html_e('Amex', 'dawp'); ?></span>
                <span><?php esc_html_e('Discover', 'dawp'); ?></span>
                <span><?php esc_html_e('PayPal', 'dawp'); ?></span>
            </div>
            <p><?php esc_html_e('Bracelet-focused fashion jewelry boutique', 'dawp'); ?></p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
