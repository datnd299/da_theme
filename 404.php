<?php
/**
 * 404 Not Found Template
 *
 * @package Dawp
 */

if (!function_exists('qb_404_shop_url')) {
    function qb_404_shop_url() {
        if (function_exists('wc_get_page_permalink')) {
            $shop_url = wc_get_page_permalink('shop');

            if ($shop_url) {
                return $shop_url;
            }
        }

        return home_url('/shop/');
    }
}

if (!function_exists('qb_404_products')) {
    function qb_404_products($limit = 3) {
        if (!function_exists('wc_get_products')) {
            return [];
        }

        return wc_get_products([
            'limit'   => $limit,
            'orderby' => 'date',
            'order'   => 'DESC',
            'status'  => 'publish',
        ]);
    }
}

$shop_url = qb_404_shop_url();
$brand_name = function_exists('dawp_brand_name') ? dawp_brand_name() : 'Velmo Custom';
$products    = qb_404_products(3);

get_header();
?>

<style>
  .qb-404 {
    --qb-blush: #d1ae68;
    --qb-peach: #f5f4f1;
    --qb-lavender: #a5a5a0;
    --qb-mint: #f5f4f1;
    --qb-gold: #d1ae68;
    --qb-plum: #10243a;
    --qb-gray: #f5f4f1;
    --qb-text: #5f6668;
    --qb-border: #d8d4cb;
    position: relative;
    overflow: hidden;
    min-height: 72vh;
    background:
      linear-gradient(90deg, rgba(16, 36, 58, .95), rgba(16, 36, 58, .68) 48%, rgba(16, 36, 58, .16) 86%),
      linear-gradient(135deg, #f5f4f1, #ffffff);
    color: var(--qb-text);
    font-family: "Inter", "DM Sans", system-ui, sans-serif;
    padding: clamp(64px, 9vw, 112px) 0;
  }

  .qb-404 * {
    box-sizing: border-box;
  }

  .qb-404 a {
    text-decoration: none;
  }

  .qb-404__wrap {
    display: grid;
    width: min(100% - 32px, 1120px);
    margin-inline: auto;
    grid-template-columns: minmax(0, 1fr) minmax(280px, 420px);
    gap: clamp(28px, 5vw, 58px);
    align-items: center;
  }

  .qb-404__eyebrow {
    margin: 0 0 12px;
    color: var(--qb-gold);
    font-size: 12px;
    font-weight: 800;
    letter-spacing: .18em;
    text-transform: uppercase;
  }

  .qb-404__code {
    display: block;
    margin: 0 0 10px;
    color: rgba(255, 255, 255, .1);
    font-size: clamp(96px, 16vw, 180px);
    font-weight: 900;
    line-height: .78;
  }

  .qb-404__title {
    max-width: 680px;
    margin: 0;
    color: #ffffff;
    font-family: Georgia, "Times New Roman", serif;
    font-size: clamp(38px, 5.6vw, 68px);
    line-height: 1.03;
    letter-spacing: 0;
  }

  .qb-404__copy {
    max-width: 620px;
    margin: 20px 0 0;
    color: rgba(255, 255, 255, .78);
    font-size: 17px;
    line-height: 1.75;
  }

  .qb-404__actions,
  .qb-404__links {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
  }

  .qb-404__actions {
    margin-top: 30px;
  }

  .qb-404__button {
    display: inline-flex;
    min-height: 48px;
    align-items: center;
    justify-content: center;
    border: 1px solid #ffffff;
    border-radius: 4px;
    background: #ffffff;
    color: var(--qb-plum);
    padding: 0 24px;
    font-size: 14px;
    font-weight: 800;
    transition: .2s ease;
  }

  .qb-404__button:hover {
    border-color: var(--qb-gold);
    background: var(--qb-gold);
    color: var(--qb-plum);
  }

  .qb-404__button--secondary {
    border-color: rgba(255, 255, 255, .35);
    background: transparent;
    color: #ffffff;
  }

  .qb-404__button--secondary:hover {
    border-color: #ffffff;
    background: #ffffff;
    color: var(--qb-plum);
  }

  .qb-404__panel {
    border: 1px solid rgba(255, 255, 255, .16);
    border-radius: 4px;
    background: rgba(255, 255, 255, .94);
    padding: clamp(22px, 3vw, 30px);
    box-shadow: 0 20px 54px rgba(13, 15, 15, .18);
  }

  .qb-404__panel + .qb-404__panel {
    margin-top: 16px;
  }

  .qb-404__panel-title {
    margin: 0 0 14px;
    color: var(--qb-plum);
    font-size: 17px;
    font-weight: 900;
  }

  .qb-404__links a {
    border: 1px solid rgba(13, 15, 15, .12);
    border-radius: 4px;
    background: #fff;
    color: var(--qb-plum);
    padding: 10px 14px;
    font-size: 13px;
    font-weight: 800;
    transition: .2s ease;
  }

  .qb-404__links a:hover,
  .qb-404__product:hover {
    transform: translateY(-2px);
    border-color: rgba(179, 138, 82, .5);
    box-shadow: 0 10px 24px rgba(13, 15, 15, .08);
  }

  .qb-404__products {
    display: grid;
    gap: 10px;
  }

  .qb-404__product {
    display: grid;
    min-height: 86px;
    grid-template-columns: 74px minmax(0, 1fr);
    gap: 14px;
    align-items: center;
    border: 1px solid var(--qb-border);
    border-radius: 4px;
    background:
      linear-gradient(180deg, rgba(255, 255, 255, .98), rgba(245, 244, 241, .42)),
      #fff;
    padding: 10px;
    color: var(--qb-plum);
    transition: .2s ease;
  }

  .qb-404__product-media {
    display: block;
    overflow: hidden;
    width: 74px;
    height: 74px;
    border-radius: 4px;
    background: var(--qb-gray);
  }

  .qb-404__product-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .qb-404__product-body {
    display: grid;
    min-width: 0;
    gap: 8px;
  }

  .qb-404__product strong {
    display: -webkit-box;
    overflow: hidden;
    color: var(--qb-plum);
    font-size: 14px;
    font-weight: 850;
    line-height: 1.32;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
    line-clamp: 2;
  }

  .qb-404__product-price {
    display: flex;
    flex-wrap: wrap;
    align-items: baseline;
    gap: 4px 8px;
    color: var(--qb-plum);
    font-size: 14px;
    font-weight: 900;
    line-height: 1.2;
  }

  .qb-404__product-price .woocommerce-Price-amount {
    white-space: nowrap;
  }

  .qb-404__product-price ins {
    color: var(--qb-plum);
    text-decoration: none;
  }

  .qb-404__product-price del {
    color: #9a9a94;
    font-size: 12px;
    font-weight: 700;
    opacity: .78;
  }

  .qb-404__product-price del .woocommerce-Price-amount {
    text-decoration: line-through;
  }

  .qb-404__product-price > .woocommerce-Price-amount,
  .qb-404__product-price ins .woocommerce-Price-amount {
    display: inline-flex;
    align-items: baseline;
    border-radius: 3px;
    background: rgba(209, 174, 104, .14);
    padding: 5px 8px;
    color: var(--qb-plum);
  }

  @media (max-width: 820px) {
    .qb-404__wrap {
      grid-template-columns: 1fr;
    }

    .qb-404__actions {
      flex-direction: column;
    }

    .qb-404__button {
      width: 100%;
    }
  }
</style>

<main id="primary" class="site-main qb-404">
  <div class="qb-404__wrap">
    <section aria-labelledby="qb-404-title">
      <span class="qb-404__code" aria-hidden="true">404</span>
      <p class="qb-404__eyebrow"><?php esc_html_e('Page Not Found', 'dawp'); ?></p>
      <h1 id="qb-404-title" class="qb-404__title"><?php esc_html_e('This watch page slipped away.', 'dawp'); ?></h1>
      <p class="qb-404__copy">
        <?php echo esc_html(sprintf(__('The page you requested is not available. You can return to %s, browse current watches, or continue shopping recent products.', 'dawp'), $brand_name)); ?>
      </p>

      <div class="qb-404__actions">
        <a class="qb-404__button" href="<?php echo esc_url($shop_url); ?>">
          <?php esc_html_e('Shop Watches', 'dawp'); ?>
        </a>
        <a class="qb-404__button qb-404__button--secondary" href="<?php echo esc_url(home_url('/')); ?>">
          <?php esc_html_e('Back To Home', 'dawp'); ?>
        </a>
      </div>
    </section>

    <aside aria-label="<?php esc_attr_e('Helpful 404 links', 'dawp'); ?>">
      <?php if (!empty($products)) : ?>
        <div class="qb-404__panel">
          <h2 class="qb-404__panel-title"><?php esc_html_e('Recent Products', 'dawp'); ?></h2>
          <div class="qb-404__products">
            <?php foreach ($products as $product) : ?>
              <?php
              $product_image = wp_get_attachment_image_url($product->get_image_id(), 'woocommerce_thumbnail');
              $product_image = $product_image ?: (function_exists('wc_placeholder_img_src') ? wc_placeholder_img_src('woocommerce_thumbnail') : '');
              ?>
              <a class="qb-404__product" href="<?php echo esc_url(get_permalink($product->get_id())); ?>">
                <?php if ($product_image) : ?>
                  <span class="qb-404__product-media">
                    <?php
                    echo qb_responsive_image(
                        $product_image,
                        $product->get_name(),
                        [
                            'width'  => 148,
                            'height' => 148,
                            'widths' => [74, 148, 222],
                            'sizes'  => '74px',
                        ]
                    );
                    ?>
                  </span>
                <?php endif; ?>
                <span class="qb-404__product-body">
                  <strong><?php echo esc_html($product->get_name()); ?></strong>
                  <span class="qb-404__product-price"><?php echo wp_kses_post($product->get_price_html()); ?></span>
                </span>
              </a>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>
    </aside>
  </div>
</main>

<?php
get_footer();
