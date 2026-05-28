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

if (!function_exists('qb_404_category_url')) {
    function qb_404_category_url($slug) {
        if (taxonomy_exists('product_cat')) {
            $term = get_term_by('slug', $slug, 'product_cat');

            if ($term && !is_wp_error($term)) {
                $link = get_term_link($term);

                if (!is_wp_error($link)) {
                    return $link;
                }
            }
        }

        return home_url('/product-category/' . trailingslashit($slug));
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

$quick_links = [
    ['title' => __('Charm Bracelets', 'dawp'),  'url' => qb_404_category_url('charm-bracelets')],
    ['title' => __('Owl Bracelets', 'dawp'),    'url' => qb_404_category_url('owl-bracelets')],
    ['title' => __('Beaded Bracelets', 'dawp'), 'url' => qb_404_category_url('beaded-bracelets')],
    ['title' => __('Chain Bracelets', 'dawp'),  'url' => qb_404_category_url('chain-bracelets')],
    ['title' => __('Gift Bracelets', 'dawp'),   'url' => qb_404_category_url('gift-bracelets')],
];

$products = qb_404_products(3);

get_header();
?>

<style>
  .qb-404 {
    --qb-blush: #ffb7c5;
    --qb-peach: #ffd6a5;
    --qb-lavender: #d8c7ff;
    --qb-mint: #cff5e7;
    --qb-gold: #d8a94e;
    --qb-plum: #2f1f35;
    --qb-gray: #f7f7fa;
    --qb-text: #4f4355;
    --qb-border: #eadfe8;
    position: relative;
    overflow: hidden;
    min-height: 72vh;
    background:
      radial-gradient(circle at 12% 12%, rgba(255, 183, 197, .34), transparent 28%),
      radial-gradient(circle at 86% 8%, rgba(207, 245, 231, .45), transparent 30%),
      linear-gradient(135deg, rgba(255, 214, 165, .36), rgba(255, 255, 255, 1) 44%, rgba(216, 199, 255, .24));
    color: var(--qb-text);
    font-family: "DM Sans", "Inter", system-ui, sans-serif;
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
    color: rgba(47, 31, 53, .08);
    font-size: clamp(96px, 16vw, 180px);
    font-weight: 900;
    line-height: .78;
  }

  .qb-404__title {
    max-width: 680px;
    margin: 0;
    color: var(--qb-plum);
    font-family: Georgia, "Times New Roman", serif;
    font-size: clamp(38px, 5.6vw, 68px);
    line-height: 1.03;
    letter-spacing: 0;
  }

  .qb-404__copy {
    max-width: 620px;
    margin: 20px 0 0;
    color: var(--qb-text);
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
    border: 1px solid var(--qb-plum);
    border-radius: 999px;
    background: var(--qb-plum);
    color: #fff;
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
    background: rgba(255, 255, 255, .78);
    color: var(--qb-plum);
  }

  .qb-404__button--secondary:hover {
    border-color: var(--qb-plum);
    background: #fff4f6;
  }

  .qb-404__panel {
    border: 1px solid rgba(47, 31, 53, .08);
    border-radius: 24px;
    background: rgba(255, 255, 255, .82);
    padding: clamp(22px, 3vw, 30px);
    box-shadow: 0 20px 54px rgba(47, 31, 53, .1);
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
    border: 1px solid rgba(47, 31, 53, .1);
    border-radius: 999px;
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
    border-color: rgba(216, 169, 78, .5);
    box-shadow: 0 10px 24px rgba(47, 31, 53, .08);
  }

  .qb-404__products {
    display: grid;
    gap: 10px;
  }

  .qb-404__product {
    display: grid;
    min-height: 70px;
    grid-template-columns: 58px minmax(0, 1fr);
    gap: 12px;
    align-items: center;
    border: 1px solid var(--qb-border);
    border-radius: 16px;
    background: #fff;
    padding: 8px;
    color: var(--qb-plum);
    transition: .2s ease;
  }

  .qb-404__product img {
    width: 58px;
    height: 58px;
    border-radius: 12px;
    background: var(--qb-gray);
    object-fit: cover;
  }

  .qb-404__product strong {
    display: block;
    overflow: hidden;
    color: var(--qb-plum);
    font-size: 14px;
    line-height: 1.35;
  }

  .qb-404__product span {
    display: block;
    margin-top: 4px;
    color: #77687b;
    font-size: 13px;
    font-weight: 700;
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
      <h1 id="qb-404-title" class="qb-404__title"><?php esc_html_e('This bracelet page slipped away.', 'dawp'); ?></h1>
      <p class="qb-404__copy">
        <?php esc_html_e("The page you requested is not available. You can return to Queen's Bracelet, browse bracelet categories, or continue shopping current products.", 'dawp'); ?>
      </p>

      <div class="qb-404__actions">
        <a class="qb-404__button" href="<?php echo esc_url($shop_url); ?>">
          <?php esc_html_e('Shop Bracelets', 'dawp'); ?>
        </a>
        <a class="qb-404__button qb-404__button--secondary" href="<?php echo esc_url(home_url('/')); ?>">
          <?php esc_html_e('Back To Home', 'dawp'); ?>
        </a>
      </div>
    </section>

    <aside aria-label="<?php esc_attr_e('Helpful 404 links', 'dawp'); ?>">
      <div class="qb-404__panel">
        <h2 class="qb-404__panel-title"><?php esc_html_e('Browse Bracelet Categories', 'dawp'); ?></h2>
        <nav class="qb-404__links" aria-label="<?php esc_attr_e('Product categories', 'dawp'); ?>">
          <?php foreach ($quick_links as $link) : ?>
            <a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?></a>
          <?php endforeach; ?>
        </nav>
      </div>

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
                  <?php
                  echo qb_responsive_image(
                      $product_image,
                      $product->get_name(),
                      [
                          'width'  => 116,
                          'height' => 116,
                          'widths' => [58, 116, 174],
                          'sizes'  => '58px',
                      ]
                  );
                  ?>
                <?php endif; ?>
                <span>
                  <strong><?php echo esc_html($product->get_name()); ?></strong>
                  <span><?php echo wp_kses_post($product->get_price_html()); ?></span>
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
