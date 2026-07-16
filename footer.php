<?php
/**
 * Theme footer — ShopGraphicshirt
 * Patriot Navy / Heritage Red / Antique White
 */

$footer_contact = [
    'email'   => 'support@shopgraphicshirt.com',
    'address' => function_exists('dawp_get_woocommerce_store_address') ? dawp_get_woocommerce_store_address() : '',
    'hours'   => __('Monday - Friday, 10:00 AM - 6:00 PM PST', 'shopgraphicshirt'),
];
$footer_contact['address'] = $footer_contact['address'] ?: __('United States', 'shopgraphicshirt');
$account_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');
$account_url = $account_url ? $account_url : home_url('/my-account/');
?>

<footer class="sgs-footer">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    .sgs-footer {
      background: var(--navy-dark, #07152a);
      color: #fff;
      overflow: hidden;
    }

    .sgs-footer-trust {
      border-bottom: 1px solid rgba(255,255,255,0.08);
      background: var(--navy, #0B1F3A);
    }

    .sgs-footer-trust-grid {
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 1px;
    }

    .sgs-trust-item {
      display: flex; min-height: 86px;
      align-items: center; gap: 12px;
      border-left: 1px solid rgba(255,255,255,0.08);
      padding: 16px 20px;
    }

    .sgs-trust-icon {
      display: inline-flex; width: 38px; height: 38px;
      flex: 0 0 auto; align-items: center; justify-content: center;
      border-radius: 8px;
      background: rgba(179,25,66,0.15);
      color: #fca5a5;
    }

    .sgs-trust-item strong {
      display: block; color: #fff;
      font-family: var(--font-heading);
      font-size: 15px; line-height: 1.25;
    }

    .sgs-trust-item > span:not(.sgs-trust-icon) { display: block; }
    .sgs-trust-item > span:not(.sgs-trust-icon) span {
      display: block; margin-top: 2px;
      color: rgba(255,255,255,0.62);
      font-size: 13px; font-weight: 500;
    }

    .sgs-footer-main {
      display: grid; grid-template-columns: 1fr; gap: 32px;
      padding-top: 48px; padding-bottom: 36px;
    }

    .sgs-footer-info { max-width: 380px; }

    .sgs-footer-brand {
      display: inline-flex; align-items: center;
    }

    .sgs-footer-logo {
      display: block;
      width: min(190px, 58vw);
      height: auto;
    }

    .sgs-footer-contact {
      display: grid; gap: 10px;
      max-width: 480px; margin: 20px 0 0;
      padding: 0; list-style: none;
    }

    .sgs-footer-contact a,
    .sgs-footer-contact li {
      display: flex; align-items: flex-start; gap: 10px;
    }

    .sgs-footer-contact a { color: inherit; }

    .sgs-footer-contact-icon {
      display: inline-flex; width: 30px; height: 30px;
      flex: 0 0 auto; align-items: center; justify-content: center;
      border-radius: 6px;
      background: rgba(255,255,255,0.06);
      color: #fca5a5;
    }

    .sgs-footer-contact-icon i { font-size: 14px; }

    .sgs-footer-contact-body { min-width: 0; padding-top: 1px; }

    .sgs-footer-contact strong {
      display: block; color: #fff;
      font-family: var(--font-heading);
      font-size: 13px; font-weight: 800; line-height: 1.3;
    }

    .sgs-footer-contact adress,
    .sgs-footer-contact .contact-value {
      display: block; margin: 2px 0 0;
      color: rgba(255,255,255,0.6);
      font-size: 14px; font-style: normal; font-weight: 500; line-height: 1.6;
    }

    .sgs-footer-column h3 {
      margin: 0; color: #fff;
      font-family: var(--font-heading);
      font-size: 14px; font-weight: 800;
      letter-spacing: 0.04em; text-transform: uppercase;
    }

    .sgs-footer-column ul {
      display: grid; gap: 10px;
      margin: 16px 0 0; padding: 0; list-style: none;
    }

    .sgs-footer-column a {
      color: rgba(255,255,255,0.65);
      font-size: 14px; font-weight: 500;
      transition: color 150ms;
    }

    .sgs-footer-column a:hover { color: #fca5a5; }

    .sgs-footer-newsletter {
      border: 1px solid rgba(255,255,255,0.1);
      border-radius: 8px;
      background: rgba(255,255,255,0.04);
      padding: 20px;
    }

    .sgs-footer-newsletter h3 {
      margin: 0; color: #fff;
      font-family: var(--font-heading);
      font-size: 18px; line-height: 1.25;
    }

    .sgs-footer-newsletter p {
      margin: 6px 0 0;
      color: rgba(255,255,255,0.6);
      font-size: 14px; line-height: 1.6;
    }

    .sgs-footer-form {
      display: flex; width: 100%; gap: 8px;
      margin-top: 14px;
    }

    .sgs-footer-form input {
      min-width: 0; width: 100%; height: 44px;
      border: 1px solid rgba(255,255,255,0.15);
      border-radius: 6px;
      background: #fff; color: var(--ink, #111827);
      padding: 0 14px; outline: none; font-size: 16px;
      font-family: var(--font-body);
    }

    .sgs-footer-form button {
      height: 44px; border: 0; border-radius: 6px;
      background: var(--red, #B31942); color: #fff;
      padding: 0 16px; font-weight: 700; cursor: pointer;
      font-family: var(--font-body); font-size: 14px;
      letter-spacing: 0.04em;
    }

    .sgs-footer-form button:hover { background: var(--red-dark, #8a1433); }

    .sgs-footer-bottom {
      border-top: 1px solid rgba(255,255,255,0.08);
      background: rgba(0,0,0,0.15);
    }

    .sgs-footer-bottom-inner {
      display: flex; flex-direction: column; gap: 12px;
      padding-top: 18px; padding-bottom: 18px;
      color: rgba(255,255,255,0.55);
      font-size: 13px; font-weight: 500;
    }

    .sgs-footer-payments {
      display: flex; flex-wrap: wrap; align-items: center; gap: 6px;
    }

    .sgs-footer-payments img {
      display: block; height: 24px; width: auto;
      border-radius: 3px; background: #fff;
    }

    @media (min-width: 760px) {
      .sgs-footer-trust-grid { grid-template-columns: repeat(4, minmax(0, 1fr)); }
      .sgs-footer-bottom-inner { flex-direction: row; align-items: center; justify-content: space-between; }
    }

    @media (min-width: 1024px) {
      .sgs-footer-main {
        grid-template-columns: minmax(260px, 1.2fr) repeat(3, minmax(130px, 0.7fr)) minmax(260px, 0.9fr);
        align-items: start;
        gap: clamp(24px, 3vw, 44px);
      }
    }

    @media (max-width: 1120px) and (min-width: 760px) {
      .sgs-footer-main {
        grid-template-columns: minmax(250px, 1.1fr) repeat(2, minmax(140px, 1fr));
      }
      .sgs-footer-newsletter {
        grid-column: 1 / -1;
        grid-template-columns: 1fr minmax(280px, 420px);
        align-items: center;
      }
    }

    @media (max-width: 560px) {
      .sgs-footer-trust-grid {
        display: flex;
        grid-template-columns: none;
        gap: 0;
        overflow-x: auto;
        overscroll-behavior-x: contain;
        scroll-snap-type: x mandatory;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
      }
      .sgs-footer-trust-grid::-webkit-scrollbar { display: none; }
      .sgs-trust-item {
        flex: 0 0 66.666%;
        min-width: 0;
        min-height: 72px;
        border-left: 1px solid rgba(255,255,255,0.08);
        scroll-snap-align: start;
        padding: 14px 16px;
      }
      .sgs-footer-form { flex-direction: column; }
    }
  </style>

  <section class="sgs-footer-trust" aria-label="<?php esc_attr_e('Store benefits', 'shopgraphicshirt'); ?>">
    <div class="sgs-container sgs-footer-trust-grid">
      <?php
      $trust_items = [
        ['title' => __('Secure Checkout', 'shopgraphicshirt'), 'text' => __('Protected payments', 'shopgraphicshirt'), 'icon' => 'fa-credit-card'],
        ['title' => __('Tracking Included', 'shopgraphicshirt'), 'text' => __('Delivery updates', 'shopgraphicshirt'), 'icon' => 'fa-truck'],
        ['title' => __('30-Day Returns', 'shopgraphicshirt'), 'text' => __('Eligible items', 'shopgraphicshirt'), 'icon' => 'fa-calendar'],
        ['title' => __('Personalization Support', 'shopgraphicshirt'), 'text' => __('Review before ordering', 'shopgraphicshirt'), 'icon' => 'fa-headset'],
      ];
      foreach ($trust_items as $item) :
      ?>
        <div class="sgs-trust-item">
          <span class="sgs-trust-icon" aria-hidden="true"><i class="fas <?php echo esc_attr($item['icon']); ?>"></i></span>
          <span>
            <strong><?php echo esc_html($item['title']); ?></strong>
            <span><?php echo esc_html($item['text']); ?></span>
          </span>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <div class="sgs-container sgs-footer-main">
    <div class="sgs-footer-info">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="sgs-footer-brand">
        <img class="sgs-footer-logo"
             src="<?php echo esc_url(get_theme_file_uri('/assets/img/logo-shopgraphicshirt.svg')); ?>"
             alt="<?php echo esc_attr(get_bloginfo('name')); ?>"
             width="420"
             height="112"
             loading="lazy"
             decoding="async">
      </a>
      <ul class="sgs-footer-contact" aria-label="<?php esc_attr_e('Contact', 'shopgraphicshirt'); ?>">
        <li>
          <a href="mailto:<?php echo esc_attr($footer_contact['email']); ?>">
            <span class="sgs-footer-contact-icon"><i class="fas fa-envelope"></i></span>
            <span class="sgs-footer-contact-body">
              <strong>Email</strong>
              <span class="contact-value"><?php echo esc_html($footer_contact['email']); ?></span>
            </span>
          </a>
        </li>
        <li>
          <span class="sgs-footer-contact-icon"><i class="fas fa-location-dot"></i></span>
          <span class="sgs-footer-contact-body">
            <strong>Address</strong>
            <span class="contact-value"><?php echo esc_html($footer_contact['address']); ?></span>
          </span>
        </li>
        <li>
          <span class="sgs-footer-contact-icon"><i class="fas fa-clock"></i></span>
          <span class="sgs-footer-contact-body">
            <strong>Support Hours</strong>
            <span class="contact-value"><?php echo esc_html($footer_contact['hours']); ?></span>
          </span>
        </li>
      </ul>
    </div>

    <div class="sgs-footer-column">
      <h3>Shop</h3>
      <ul>
        <li><a href="<?php echo esc_url(home_url('/shop/')); ?>">Shop All</a></li>
        <li><a href="<?php echo esc_url(dawp_product_category_url('best-sellers')); ?>">Best Sellers</a></li>
        <li><a href="<?php echo esc_url(home_url('/shop-by-categories/')); ?>">Shop By Categories</a></li>
        <li><a href="<?php echo esc_url(home_url('/product-category/american-flag-tees/')); ?>">American Flag Tees</a></li>
        <li><a href="<?php echo esc_url(home_url('/product-category/bomber-jackets/')); ?>">Bomber Jackets</a></li>
      </ul>
    </div>

    <div class="sgs-footer-column">
      <h3>Help</h3>
      <ul>
        <li><a href="<?php echo esc_url(home_url('/about-us/')); ?>">About Us</a></li>
        <li><a href="<?php echo esc_url(home_url('/contact-us/')); ?>">Contact Us</a></li>
        <li><a href="<?php echo esc_url(home_url('/track-order/')); ?>">Track Order</a></li>
        <li><a href="<?php echo esc_url($account_url); ?>">My Account</a></li>
        <li><a href="<?php echo esc_url(home_url('/faq/')); ?>">FAQs</a></li>
      </ul>
    </div>

    <div class="sgs-footer-column">
      <h3>Policy</h3>
      <ul>
        <li><a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>">Shipping Policy</a></li>
        <li><a href="<?php echo esc_url(home_url('/refund-return-policy/')); ?>">Refund &amp; Return Policy</a></li>
        <li><a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>">Privacy Policy</a></li>
        <li><a href="<?php echo esc_url(home_url('/terms-conditions/')); ?>">Terms &amp; Conditions</a></li>
      </ul>
    </div>

    <div class="sgs-footer-newsletter">
      <div>
        <h3>Get New Patriotic Drops &amp; Gift Ideas</h3>
        <p>Receive offers, patriotic apparel drops, and gift ideas.</p>
      </div>
      <form class="sgs-footer-form" onsubmit="event.preventDefault(); this.reset(); alert('Thanks for signing up!');">
        <label class="sr-only" for="sgs-footer-email"><?php esc_html_e('Email address', 'shopgraphicshirt'); ?></label>
        <input id="sgs-footer-email" type="email" placeholder="<?php esc_attr_e('Enter your email', 'shopgraphicshirt'); ?>" required>
        <button type="submit"><?php esc_html_e('Sign Up', 'shopgraphicshirt'); ?></button>
      </form>
    </div>
  </div>

  <div class="sgs-footer-bottom">
    <div class="sgs-container sgs-footer-bottom-inner">
      <p>&copy; <?php echo esc_html(date_i18n('Y')); ?> <?php esc_html_e('Shop Graphic Shirt', 'shopgraphicshirt'); ?>. All rights reserved.</p>
      <div class="sgs-footer-payments" aria-label="<?php esc_attr_e('Payment methods', 'shopgraphicshirt'); ?>">
        <?php
        $payments = [
          ['file' => 'amex.png', 'name' => 'American Express'],
          ['file' => 'visa.png', 'name' => 'Visa'],
          ['file' => 'mastercard.png', 'name' => 'Mastercard'],
          ['file' => 'paypal.png', 'name' => 'PayPal'],
        ];
        $payment_dir = '/assets/img/payment/';
        foreach ($payments as $pm) :
        ?>
          <?php
          echo dawp_theme_image(
            $payment_dir . $pm['file'],
            $pm['name'],
            64,
            40,
            [[48, 30], [64, 40], [96, 60]],
            '64px',
            ['loading' => 'lazy', 'decoding' => 'async']
          );
          ?>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
