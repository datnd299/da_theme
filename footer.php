<?php
/**
 * Theme footer for Zorex Craft.
 *
 * @package dawp
 */

defined('ABSPATH') || exit;

$current_year  = date_i18n('Y');
$brand_name    = function_exists('dawp_brand_name') ? dawp_brand_name() : 'Zorex Craft';
$support_email = function_exists('dawp_contact_support_email') ? dawp_contact_support_email() : 'support@zorexcraft.com';
$support_mailto = function_exists('dawp_contact_mailto_url') ? dawp_contact_mailto_url(__('Zorex Craft support request', 'dawp')) : 'mailto:' . $support_email;
$logo_url      = get_template_directory_uri() . '/assets/images/home/luxuryimagecollection (1)/logobrand (3).png';
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
    --qb-cream: #f7f7f5;
    --qb-gold: #a8754f;
    --qb-ink: #173b57;
    --qb-deep: #181a1b;
    --qb-muted: rgba(247, 247, 245, .74);
    --qb-border: rgba(247, 247, 245, .14);
    background:
      linear-gradient(180deg, rgba(255, 255, 255, .05), transparent 34%),
      #101415;
    color: var(--qb-muted);
    font-family: "DM Sans", "Inter", system-ui, sans-serif;
    overflow: hidden;
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

  .qb-footer-kicker {
    display: grid;
    grid-template-columns: 1fr auto;
    gap: 24px;
    align-items: end;
    padding: 42px 0 28px;
    border-bottom: 1px solid var(--qb-border);
  }

  .qb-footer-kicker__eyebrow {
    display: block;
    margin-bottom: 10px;
    color: var(--qb-gold);
    font-size: 11px;
    font-weight: 900;
    letter-spacing: .24em;
    text-transform: uppercase;
  }

  .qb-footer-kicker h2 {
    max-width: 680px;
    margin: 0;
    color: #fff;
    font-family: "Playfair Display", Georgia, serif;
    font-size: clamp(30px, 4.2vw, 56px);
    font-weight: 700;
    line-height: 1.04;
  }

  .qb-footer-note {
    max-width: 290px;
    margin: 0;
    color: var(--qb-muted);
    font-size: 14px;
    font-weight: 700;
    line-height: 1.6;
  }

  .qb-footer-main {
    display: grid;
    grid-template-columns: minmax(280px, .95fr) minmax(0, 1.7fr);
    gap: clamp(28px, 5vw, 72px);
    align-items: start;
    padding: clamp(38px, 6vw, 64px) 0 46px;
  }

  .qb-footer-brand {
    padding: 28px;
    border: 1px solid var(--qb-border);
    background: rgba(247, 247, 245, .06);
    border-radius: 8px;
  }

  .qb-footer-brand a {
    display: inline-block;
  }

  .qb-footer-logo {
    display: block;
    width: min(104px, 100%);
    height: auto;
  }

  .qb-footer-tagline {
    display: block;
    margin-top: 8px;
    color: var(--qb-gold);
    font-size: 11px;
    font-weight: 800;
    letter-spacing: .2em;
    text-transform: uppercase;
  }

  .qb-footer-copy {
    max-width: 360px;
    margin: 22px 0 0;
    color: var(--qb-muted);
    font-size: 14px;
    font-weight: 600;
    line-height: 1.65;
  }

  .qb-footer-contact {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 14px;
    margin-top: 26px;
    max-width: 360px;
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

  .qb-footer-links {
    display: grid;
    grid-template-columns: repeat(3, minmax(140px, 1fr));
    gap: clamp(22px, 4vw, 46px);
    padding-top: 4px;
  }

  .qb-footer-col h3 {
    margin: 0 0 16px;
    color: var(--qb-gold);
    font-size: 12px;
    font-weight: 800;
    letter-spacing: .18em;
    text-transform: uppercase;
  }

  .qb-footer-col ul {
    display: grid;
    gap: 10px;
    margin: 0;
    padding: 0;
    list-style: none;
  }

  .qb-footer-col a {
    color: var(--qb-muted);
    font-size: 14px;
    font-weight: 650;
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

  .qb-footer-services {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 1px;
    margin-top: 32px;
    background: var(--qb-border);
    border: 1px solid var(--qb-border);
    border-radius: 8px;
    overflow: hidden;
  }

  .qb-footer-service {
    min-height: 78px;
    padding: 18px;
    background: rgba(255, 255, 255, .045);
  }

  .qb-footer-service strong {
    display: block;
    color: #fff;
    font-size: 13px;
    font-weight: 850;
    line-height: 1.3;
  }

  .qb-footer-service span {
    display: block;
    margin-top: 5px;
    color: rgba(247, 247, 245, .62);
    font-size: 12px;
    font-weight: 650;
    line-height: 1.45;
  }

  .qb-footer-bottom {
    border-top: 1px solid var(--qb-border);
  }

  .qb-footer-bottom__inner {
    display: flex;
    gap: 20px;
    align-items: center;
    justify-content: space-between;
    padding: 20px 0 24px;
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
    border-radius: 999px;
    background: rgba(255, 255, 255, .04);
    color: var(--qb-cream);
    font-size: 11px;
    font-weight: 800;
    line-height: 1;
    padding: 7px 9px;
  }

  @media (max-width: 980px) {
    .qb-footer-kicker {
      grid-template-columns: 1fr;
      text-align: center;
      justify-items: center;
    }

    .qb-footer-kicker h2 {
      max-width: 100%;
    }

    .qb-footer-note {
      max-width: 520px;
      text-align: center;
    }

    .qb-footer-main {
      grid-template-columns: 1fr;
    }

    .qb-footer-links {
      grid-template-columns: repeat(3, minmax(0, 1fr));
    }
  }

  @media (max-width: 680px) {
    .qb-footer-wrap {
      width: min(100% - 20px, 1280px);
    }

    .qb-footer-kicker {
      padding: 36px 0 24px;
    }

    .qb-footer-main {
      grid-template-columns: 1fr;
      gap: 28px;
      padding: 34px 0;
    }

    .qb-footer-brand {
      padding: 22px;
    }

    .qb-footer-links,
    .qb-footer-services {
      grid-template-columns: 1fr;
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
        <div class="qb-footer-wrap qb-footer-kicker">
            <div>
                <span class="qb-footer-kicker__eyebrow"><?php esc_html_e('Curated Timepieces', 'dawp'); ?></span>
                <h2><?php esc_html_e('Built for easier collecting, gifting, and everyday choosing.', 'dawp'); ?></h2>
            </div>
            <p class="qb-footer-note">
                <?php esc_html_e('Browse with clear policies, responsive support, and a calm checkout from first look to final wrist check.', 'dawp'); ?>
            </p>
        </div>

        <div class="qb-footer-wrap qb-footer-main">
            <div class="qb-footer-brand">
                <a href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php echo esc_attr(sprintf(__('%s home', 'dawp'), $brand_name)); ?>">
                    <img class="qb-footer-logo" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($brand_name); ?>">
                    <span class="qb-footer-tagline"><?php esc_html_e('Modern Icons', 'dawp'); ?></span>
                </a>

                <p class="qb-footer-copy">
                    <?php esc_html_e('A calm luxury watch destination for clear discovery, confident comparison, and collector-focused shopping.', 'dawp'); ?>
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

            <div>
                <div class="qb-footer-links">
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

                <div class="qb-footer-services" aria-label="<?php esc_attr_e('Store highlights', 'dawp'); ?>">
                    <div class="qb-footer-service">
                        <strong><?php esc_html_e('Secure checkout', 'dawp'); ?></strong>
                        <span><?php esc_html_e('Protected payments and order updates.', 'dawp'); ?></span>
                    </div>
                    <div class="qb-footer-service">
                        <strong><?php esc_html_e('Careful shipping', 'dawp'); ?></strong>
                        <span><?php esc_html_e('Packed with attention before dispatch.', 'dawp'); ?></span>
                    </div>
                    <div class="qb-footer-service">
                        <strong><?php esc_html_e('Helpful support', 'dawp'); ?></strong>
                        <span><?php esc_html_e('Real answers during business hours.', 'dawp'); ?></span>
                    </div>
                </div>
            </div>
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
