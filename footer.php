<?php
/**
 * Theme footer for Velmo Custom.
 *
 * @package dawp
 */

defined('ABSPATH') || exit;

$current_year  = date_i18n('Y');
$brand_name    = function_exists('dawp_brand_name') ? dawp_brand_name() : 'Velmo Custom';
$support_email = function_exists('dawp_contact_support_email') ? dawp_contact_support_email() : 'support@velmocustom.com';
$support_mailto = function_exists('dawp_contact_mailto_url') ? dawp_contact_mailto_url(__('Velmo Custom support request', 'dawp')) : 'mailto:' . $support_email;
$logo_url      = get_template_directory_uri() . '/assets/images/home/luxuryimagecollection (1)/logobrand (2).png';
$store_address = function_exists('dawp_get_store_address_line') ? dawp_get_store_address_line() : '';
$footer_cols   = function_exists('dawp_footer_columns') ? dawp_footer_columns() : [
    [
        'title' => __('Shop', 'dawp'),
        'links' => [
            ['title' => __('Shop All', 'dawp'), 'url' => home_url('/shop/')],
            ['title' => __('New Arrivals', 'dawp'), 'url' => home_url('/shop/?orderby=date')],
        ],
    ],
    [
        'title' => __('Company', 'dawp'),
        'links' => [
            ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/')],
            ['title' => __('FAQ', 'dawp'), 'url' => home_url('/faq/')],
            ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/')],
        ],
    ],
    [
        'title' => __('Policies', 'dawp'),
        'links' => [
            ['title' => __('Shipping Policy', 'dawp'), 'url' => home_url('/shipping-policy/')],
            ['title' => __('Return & Refund Policy', 'dawp'), 'url' => home_url('/return-refund-policy/')],
            ['title' => __('Terms & Conditions', 'dawp'), 'url' => home_url('/terms-conditions/')],
            ['title' => __('Privacy Policy', 'dawp'), 'url' => home_url('/privacy-policy/')],
        ],
    ],
];
?>

</div><!-- #content -->

<style>
  .qb-site-footer {
    --qb-cream: #f5f4f1;
    --qb-gold: #d1ae68;
    --qb-ink: #10243a;
    --qb-muted: #d8d4cb;
    --qb-border: rgba(245, 242, 235, .16);
    background: var(--qb-ink);
    color: var(--qb-muted);
    font-family: "Inter", "DM Sans", system-ui, sans-serif;
  }

  .qb-site-footer * {
    box-sizing: border-box;
  }

  .qb-site-footer a,
  .qb-site-footer a:visited {
    color: inherit;
    text-decoration: none;
  }

  .qb-footer-wrap {
    width: min(100% - 32px, 1280px);
    margin-inline: auto;
  }

  .qb-footer-main {
    display: grid;
    grid-template-columns: minmax(260px, 1.35fr) repeat(3, minmax(160px, .7fr));
    gap: 46px;
    padding: 62px 0;
  }

  .qb-footer-brand a {
    display: inline-block;
  }

  .qb-footer-logo {
    display: block;
    width: min(108px, 100%);
    height: auto;
  }

  .qb-footer-tagline {
    display: block;
    margin-top: 8px;
    color: var(--qb-gold);
    font-size: 12px;
    font-weight: 800;
    letter-spacing: .2em;
    text-transform: uppercase;
  }

  .qb-footer-copy {
    max-width: 430px;
    margin: 22px 0 0;
    color: var(--qb-muted);
    font-size: 14px;
    font-weight: 600;
    line-height: 1.7;
  }

  .qb-footer-contact {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 14px;
    margin-top: 24px;
    max-width: 430px;
  }

  .qb-footer-contact a,
  .qb-footer-contact span {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: var(--qb-muted);
    font-size: 12px;
    font-weight: 700;
    line-height: 1.3;
  }

  .qb-footer-contact svg {
    width: 15px;
    height: 15px;
    flex: 0 0 auto;
    fill: currentColor;
    stroke: currentColor;
  }

  .qb-footer-contact a:hover,
  .qb-footer-contact a:focus-visible {
    color: #fff;
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
    color: var(--qb-muted);
    font-size: 14px;
    font-weight: 700;
    line-height: 1.4;
    transition: color .2s ease;
  }

  .qb-footer-col a:hover,
  .qb-footer-col a:focus-visible {
    color: #fff;
    text-decoration: underline;
    text-decoration-color: var(--qb-gold);
    text-underline-offset: 4px;
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
    color: var(--qb-muted);
    font-size: 13px;
  }

  .qb-footer-bottom__inner p {
    margin: 0;
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
    background: rgba(255, 255, 255, .06);
    color: var(--qb-cream);
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
    .qb-footer-wrap {
      width: min(100% - 20px, 1280px);
    }

    .qb-footer-main {
      grid-template-columns: 1fr;
      gap: 32px;
      padding: 48px 0;
    }

    .qb-footer-bottom__inner {
      flex-direction: column;
      align-items: flex-start;
    }

    .qb-payment {
      justify-content: flex-start;
    }
  }
</style>

<footer id="colophon" class="qb-site-footer" role="contentinfo">
    <section>
        <div class="qb-footer-wrap qb-footer-main">
            <div class="qb-footer-brand">
                <a href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php echo esc_attr(sprintf(__('%s home', 'dawp'), $brand_name)); ?>">
                    <img class="qb-footer-logo" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($brand_name); ?>">
                    <span class="qb-footer-tagline"><?php esc_html_e('Precision with Presence', 'dawp'); ?></span>
                </a>

                <p class="qb-footer-copy">
                    <?php esc_html_e('Refined watches selected for precision, craftsmanship, and timeless contemporary design.', 'dawp'); ?>
                </p>

                <div class="qb-footer-contact">
                    <span>
                        <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                            <path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20Zm0 18a8 8 0 1 1 0-16 8 8 0 0 1 0 16Zm1-13h-2v5.35l4.25 2.55 1-1.62L13 11.35V7Z"/>
                        </svg>
                        <?php esc_html_e('Monday-Friday, 9:00 AM-6:00 PM PST.', 'dawp'); ?>
                    </span>

                    <a href="<?php echo esc_url($support_mailto); ?>" aria-label="<?php esc_attr_e('Email support', 'dawp'); ?>">
                        <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                            <path d="M3 6.5A2.5 2.5 0 0 1 5.5 4h13A2.5 2.5 0 0 1 21 6.5v11A2.5 2.5 0 0 1 18.5 20h-13A2.5 2.5 0 0 1 3 17.5v-11Zm2.5-.5a.5.5 0 0 0-.5.5v.38l7 4.38 7-4.38V6.5a.5.5 0 0 0-.5-.5h-13Zm13 12a.5.5 0 0 0 .5-.5V9.25l-6.47 4.04a1 1 0 0 1-1.06 0L5 9.25v8.25a.5.5 0 0 0 .5.5h13Z"/>
                        </svg>
                        <?php echo esc_html($support_email); ?>
                    </a>

                    <?php if ($store_address) : ?>
                        <span>
                            <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                                <path d="M12 2C8.14 2 5 5.14 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.86-3.14-7-7-7Zm0 17.17C9.83 16.6 7 12.52 7 9a5 5 0 0 1 10 0c0 3.52-2.83 7.6-5 10.17ZM12 6.5A2.5 2.5 0 1 0 12 11.5 2.5 2.5 0 0 0 12 6.5Zm0 3.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
                            </svg>
                            <?php echo esc_html($store_address); ?>
                        </span>
                    <?php endif; ?>
                </div>
            </div>

            <?php foreach ($footer_cols as $column) : ?>
                <nav class="qb-footer-col" aria-label="<?php echo esc_attr(sprintf(__('Footer %s navigation', 'dawp'), $column['title'])); ?>">
                    <h3><?php echo esc_html($column['title']); ?></h3>
                    <ul>
                        <?php foreach ($column['links'] as $link) : ?>
                            <li><a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            <?php endforeach; ?>
        </div>
    </section>

    <div class="qb-footer-bottom">
        <div class="qb-footer-wrap qb-footer-bottom__inner">
            <p>&copy; <?php echo esc_html($current_year); ?> <?php echo esc_html(sprintf(__('%s. All rights reserved.', 'dawp'), $brand_name)); ?></p>
            <div class="qb-payment" aria-label="<?php esc_attr_e('Accepted payment methods', 'dawp'); ?>">
                <span><?php esc_html_e('Visa', 'dawp'); ?></span>
                <span><?php esc_html_e('Mastercard', 'dawp'); ?></span>
                <span><?php esc_html_e('Amex', 'dawp'); ?></span>
                <span><?php esc_html_e('Discover', 'dawp'); ?></span>
                <span><?php esc_html_e('PayPal', 'dawp'); ?></span>
            </div>
        </div>
    </div>
</footer>

<?php if (function_exists('dawp_cart_drawer_markup')) { dawp_cart_drawer_markup(); } ?>

<?php wp_footer(); ?>
</body>
</html>
