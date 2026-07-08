<?php
/**
 * Theme footer — Rubyinstar
 * Red / White / Black theme.
 */

$footer_columns = function_exists('dawp_footer_columns') ? dawp_footer_columns() : [];

$footer_contact = [
    'email'   => 'support@rubyinstar.com',
    'address' => __('United States', 'dawp'),
    'hours'   => __('Monday - Friday, 9:00 AM - 5:00 PM, GMT-08:00 Pacific Standard Time', 'dawp'),
];

// Fallback columns if theme function not defined
if (empty($footer_columns)) :
$footer_columns = [
    ['title' => __('Shop', 'dawp'), 'links' => [
        ['title' => __('Shop Tires', 'dawp'),       'url' => home_url('/shop/')],
        ['title' => __('Tire Finder', 'dawp'),       'url' => home_url('/#tire-finder')],
        ['title' => __('Shop By Brand', 'dawp'),     'url' => home_url('/shop-by-brand/')],
        ['title' => __('Shop By Rim Size', 'dawp'),  'url' => home_url('/shop-by-rim-size/')],
        ['title' => __('Deals', 'dawp'),             'url' => home_url('/deals/')],
    ]],
    ['title' => __('Support', 'dawp'), 'links' => [
        ['title' => __('Contact Us', 'dawp'),        'url' => home_url('/contact-us/')],
        ['title' => __('Track Order', 'dawp'),       'url' => home_url('/track-order/')],
        ['title' => __('Shipping Policy', 'dawp'),   'url' => home_url('/shipping-policy/')],
        ['title' => __('Return & Refund', 'dawp'),   'url' => home_url('/return-refund/')],
        ['title' => __('FAQ', 'dawp'),               'url' => home_url('/faq/')],
    ]],
    ['title' => __('Company', 'dawp'), 'links' => [
        ['title' => __('About Us', 'dawp'),          'url' => home_url('/about-us/')],
        ['title' => __('Privacy Policy', 'dawp'),    'url' => home_url('/privacy-policy/')],
        ['title' => __('Terms Of Service', 'dawp'),  'url' => home_url('/terms-conditions/')],
    ]],
];
endif;
?>


<footer class="site-shell ruby-footer">
  <style>
    .ruby-footer {
      background: #050505;
      color: #fff;
      overflow: hidden;
    }

    .ruby-footer-trust {
      border-bottom: 1px solid rgba(255,255,255,.1);
      background: #0d0d0d;
    }

    .ruby-footer-trust-grid {
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 1px;
      padding-top: 0;
      padding-bottom: 0;
    }

    .ruby-trust-card {
      display: flex;
      min-height: 94px;
      align-items: center;
      gap: 12px;
      border-left: 1px solid rgba(255,255,255,.1);
      background: transparent;
      padding: 18px 20px;
    }

    .ruby-trust-icon {
      display: inline-flex;
      width: 40px; height: 40px;
      flex: 0 0 auto;
      align-items: center; justify-content: center;
      border-radius: 10px;
      background: rgba(220,38,38,.15);
      color: #fca5a5;
    }

    .ruby-trust-card strong {
      display: block; color: #fff;
      font-family: var(--font-heading);
      font-size: 14px; line-height: 1.2;
    }

    .ruby-trust-card > span:not(.ruby-trust-icon) { display: block; }
    .ruby-trust-card > span:not(.ruby-trust-icon) span {
      display: block; margin-top: 3px;
      color: rgba(255,255,255,.68);
      font-size: 12px; font-weight: 600;
    }

    .ruby-footer-main {
      display: grid;
      grid-template-columns: 1fr;
      gap: 34px 28px;
      padding-top: 56px;
      padding-bottom: 42px;
    }

    .ruby-footer-info { max-width: 420px; }

    .ruby-footer-brand {
      display: inline-flex; align-items: center;
    }

    .ruby-footer-brand .ruby-brand-logo {
      display: block;
      width: min(230px, 72vw);
      height: auto;
    }

    .ruby-footer-brand .ruby-brand-name { font-size: 28px; }

    .ruby-footer-contact {
      display: grid; gap: 12px;
      max-width: 520px; margin: 24px 0 0;
      padding: 0; list-style: none;
    }

    .ruby-footer-contact a,
    .ruby-footer-contact li {
      display: flex; align-items: flex-start; gap: 12px;
    }

    .ruby-footer-contact a { color: inherit; }

    .ruby-footer-contact-icon {
      display: inline-flex;
      width: 32px; height: 32px;
      flex: 0 0 auto;
      align-items: center; justify-content: center;
      border-radius: 8px;
      background: rgba(255,255,255,.08);
      color: #fca5a5;
    }

    .ruby-footer-contact-icon svg {
      display: block; width: 18px; height: 18px;
    }

    .ruby-footer-contact-body {
      min-width: 0; padding-top: 1px;
    }

    .ruby-footer-contact strong {
      display: block; color: #fff;
      font-family: var(--font-heading);
      font-size: 13px; font-weight: 800; line-height: 1.25;
    }

    .ruby-footer-contact-value,
    .ruby-footer-contact address {
      display: block; margin: 3px 0 0;
      color: rgba(255,255,255,.66);
      font-size: 14px; font-style: normal; font-weight: 600; line-height: 1.55;
    }

    .ruby-footer-contact a:hover .ruby-footer-contact-value {
      color: #fca5a5;
    }

    .ruby-footer-column h2 {
      margin: 0; color: #fff;
      font-family: var(--font-heading);
      font-size: 14px; font-weight: 800;
      letter-spacing: .04em; line-height: 1.2;
      text-transform: uppercase;
    }

    .ruby-footer-column ul {
      display: grid; gap: 12px;
      margin: 18px 0 0; padding: 0; list-style: none;
    }

    .ruby-footer-column a {
      color: rgba(255,255,255,.72);
      font-size: 14px; font-weight: 600;
      transition: color .15s;
    }

    .ruby-footer-column a:hover { color: #fca5a5; }

    .ruby-footer-bottom {
      border-top: 1px solid rgba(255,255,255,.1);
      background: rgba(0,0,0,.18);
    }

    .ruby-footer-bottom-inner {
      display: flex; flex-direction: column; gap: 14px;
      padding-top: 20px; padding-bottom: 20px;
      color: rgba(255,255,255,.62);
      font-size: 13px; font-weight: 600;
    }

    .ruby-footer-payments {
      display: flex; flex-wrap: wrap; align-items: center; gap: 8px;
    }

    .ruby-footer-payment-icon {
      display: block; height: 28px; width: auto;
      border-radius: 4px; background: #fff;
    }

    @media (min-width: 760px) {
      .ruby-footer-trust-grid {
        grid-template-columns: repeat(4, minmax(0, 1fr));
      }
      .ruby-footer-main {
        grid-template-columns: minmax(280px, 1.15fr) minmax(180px, 1fr);
      }
      .ruby-footer-bottom-inner {
        flex-direction: row; align-items: center; justify-content: space-between;
      }
    }

    @media (min-width: 1024px) {
      .ruby-footer-main {
        grid-template-columns: minmax(310px, 1.25fr) repeat(3, minmax(150px, 1fr));
        align-items: start;
        gap: clamp(34px, 5vw, 72px);
      }
    }

    @media (max-width: 1023px) and (min-width: 760px) {
      .ruby-footer-main {
        grid-template-columns: minmax(280px, 1.2fr) minmax(180px, 1fr);
      }
    }

    @media (max-width: 560px) {
      .ruby-footer-trust {
        overflow: hidden;
      }
      .ruby-footer-trust-grid {
        display: flex;
        grid-template-columns: none;
        gap: 12px;
        margin-inline: 0;
        padding: 12px 16px 14px;
        overflow-x: auto;
        scroll-padding-inline: 16px;
        scroll-snap-type: x mandatory;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
      }
      .ruby-footer-trust-grid::-webkit-scrollbar {
        display: none;
      }
      .ruby-trust-card {
        flex: 0 0 min(82vw, 340px);
        min-height: 78px;
        border: 1px solid rgba(255,255,255,.12);
        border-radius: 8px;
        padding: 16px;
        scroll-snap-align: center;
      }
    }
  </style>

  <!-- Trust bar -->
  <section class="ruby-footer-trust" aria-label="<?php esc_attr_e('Store benefits', 'dawp'); ?>">
    <div class="ruby-container ruby-footer-trust-grid" data-mobile-slider="trust">
      <?php
      $trust_items = [
        ['title' => __('Secure Checkout', 'dawp'),       'text' => __('Protected payments', 'dawp'),      'icon' => 'card'],
        ['title' => __('Fast Shipping', 'dawp'),         'text' => __('Delivery updates included', 'dawp'),'icon' => 'truck'],
        ['title' => __('Order Tracking', 'dawp'),         'text' => __('Follow every step', 'dawp'),        'icon' => 'pin'],
        ['title' => __('Easy Returns', 'dawp'),           'text' => __('Simple return support', 'dawp'),    'icon' => 'return'],
      ];
      foreach ($trust_items as $item) :
      ?>
        <div class="ruby-trust-card">
          <span class="ruby-trust-icon" aria-hidden="true">
            <?php if ('truck' === $item['icon']) : ?>
              <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 7h11v9H3z"/><path d="M14 10h4l3 3v3h-7z"/><circle cx="7" cy="18" r="2"/><circle cx="18" cy="18" r="2"/></svg>
            <?php elseif ('pin' === $item['icon']) : ?>
              <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 21s7-5.2 7-12A7 7 0 0 0 5 9c0 6.8 7 12 7 12z"/><circle cx="12" cy="9" r="2.5"/></svg>
            <?php elseif ('return' === $item['icon']) : ?>
              <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 14 4 9l5-5"/><path d="M4 9h11a5 5 0 0 1 0 10h-4"/></svg>
            <?php else : ?>
              <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 10h18"/></svg>
            <?php endif; ?>
          </span>
          <span>
            <strong><?php echo esc_html($item['title']); ?></strong>
            <span><?php echo esc_html($item['text']); ?></span>
          </span>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- Main footer -->
  <div class="ruby-container ruby-footer-main">
    <div class="ruby-footer-info">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="ruby-footer-brand">
        <img class="ruby-brand-logo" src="<?php echo esc_url(get_theme_file_uri('/assets/img/rubyinstar-logo.png')); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
      </a>
      <ul class="ruby-footer-contact" aria-label="<?php esc_attr_e('Business contact information', 'dawp'); ?>">
        <li>
          <a href="<?php echo esc_url('mailto:' . $footer_contact['email']); ?>">
            <span class="ruby-footer-contact-icon" aria-hidden="true">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></svg>
            </span>
            <span class="ruby-footer-contact-body">
              <strong><?php esc_html_e('Email', 'dawp'); ?></strong>
              <span class="ruby-footer-contact-value"><?php echo esc_html($footer_contact['email']); ?></span>
            </span>
          </a>
        </li>
        <li>
          <span class="ruby-footer-contact-icon" aria-hidden="true">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 21s7-5.2 7-12A7 7 0 0 0 5 9c0 6.8 7 12 7 12z"/><circle cx="12" cy="9" r="2.5"/></svg>
          </span>
          <span class="ruby-footer-contact-body">
            <strong><?php esc_html_e('Address', 'dawp'); ?></strong>
            <address><?php echo esc_html($footer_contact['address']); ?></address>
          </span>
        </li>
        <li>
          <span class="ruby-footer-contact-icon" aria-hidden="true">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
          </span>
          <span class="ruby-footer-contact-body">
            <strong><?php esc_html_e('Hours', 'dawp'); ?></strong>
            <span class="ruby-footer-contact-value"><?php echo esc_html($footer_contact['hours']); ?></span>
          </span>
        </li>
      </ul>
    </div>

    <?php foreach ($footer_columns as $column) : ?>
      <?php if (!empty($column['groups'])) : ?>
        <?php foreach ($column['groups'] as $group) : ?>
          <div class="ruby-footer-column">
            <h2><?php echo esc_html($group['title']); ?></h2>
            <ul>
              <?php foreach ($group['links'] as $link) : ?>
                <li><a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endforeach; ?>
        <?php continue; ?>
      <?php endif; ?>
      <div class="ruby-footer-column">
        <h2><?php echo esc_html($column['title']); ?></h2>
        <ul>
          <?php foreach ($column['links'] as $link) : ?>
            <li><a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- Bottom bar -->
  <div class="ruby-footer-bottom">
    <div class="ruby-container ruby-footer-bottom-inner">
      <p>&copy; <?php echo esc_html(date_i18n('Y')); ?> Rubyinstar. <?php esc_html_e('All rights reserved.', 'dawp'); ?></p>
      <div class="ruby-footer-payments" aria-label="<?php esc_attr_e('Accepted payment methods', 'dawp'); ?>">
        <?php
        $footer_payment_methods = [
          ['file' => 'visa.png',     'name' => 'Visa'],
          ['file' => 'mastercard.png','name' => 'Mastercard'],
          ['file' => 'paypal.png',   'name' => 'PayPal'],
          ['file' => 'jcb.png',      'name' => 'JCB'],
        ];
        foreach ($footer_payment_methods as $method) :
        ?>
          <img class="ruby-footer-payment-icon"
               src="<?php echo esc_url(get_theme_file_uri('/assets/img/gallery/Oneshopvibe/payment/' . $method['file'])); ?>"
               alt="<?php echo esc_attr($method['name']); ?>"
               loading="lazy" decoding="async">
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
