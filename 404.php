<?php
/**
 * 404 Not Found Template
 *
 * @package Dawp
 */

get_header();

$shop_url = function_exists('wc_get_page_id') && wc_get_page_id('shop') > 0
  ? get_permalink(wc_get_page_id('shop'))
  : home_url('/shop/');

$quick_links = [];

if (function_exists('dawp_tire_category_definitions')) {
  foreach (dawp_tire_category_definitions() as $slug => $category) {
    $quick_links[] = [
      'title' => $category['name'],
      'copy'  => $category['summary'] ?? $category['description'] ?? '',
      'url'   => function_exists('dawp_product_category_url')
        ? dawp_product_category_url($slug)
        : home_url('/product-category/' . sanitize_title($slug) . '/'),
    ];
  }
} elseif (function_exists('get_terms') && taxonomy_exists('product_cat')) {
  $uncategorized = get_term_by('slug', 'uncategorized', 'product_cat');
  $exclude = $uncategorized && ! is_wp_error($uncategorized) ? [(int) $uncategorized->term_id] : [];

  $terms = get_terms([
    'taxonomy'   => 'product_cat',
    'hide_empty' => true,
    'parent'     => 0,
    'exclude'    => $exclude,
    'orderby'    => 'name',
    'order'      => 'ASC',
    'number'     => 6,
  ]);

  if (! is_wp_error($terms) && ! empty($terms)) {
    foreach ($terms as $term) {
      $link = get_term_link($term);

      if (is_wp_error($link)) {
        continue;
      }

      $quick_links[] = [
        'title' => $term->name,
        'copy'  => $term->description,
        'url'   => $link,
      ];
    }
  }
}
?>

<main id="primary" class="site-main error-404 mytire-404">
  <section class="mytire-404__hero">
    <div class="mytire-404__inner">
      <div class="mytire-404__copy">
        <p class="mytire-404__eyebrow">
          <?php esc_html_e('404 | Page Not Found', 'dawp'); ?>
        </p>

        <h1>
          <?php esc_html_e('Page not found.', 'dawp'); ?>
        </h1>

        <p class="mytire-404__intro">
          <?php esc_html_e('The link may be outdated or moved. Search the catalog, return home, or jump back into tire shopping.', 'dawp'); ?>
        </p>

        <div class="mytire-404__actions">
          <a href="<?php echo esc_url($shop_url); ?>" class="mytire-404__button mytire-404__button--primary">
            <?php esc_html_e('Shop All Products', 'dawp'); ?>
          </a>
          <a href="<?php echo esc_url(home_url('/')); ?>" class="mytire-404__button mytire-404__button--secondary">
            <?php esc_html_e('Back To Home', 'dawp'); ?>
          </a>
        </div>
      </div>

      <div class="mytire-404__panel">
        <div class="mytire-404__panel-head">
          <div>
            <p>
              <?php esc_html_e('Quick Recovery', 'dawp'); ?>
            </p>
            <h2>
              <?php esc_html_e('Find tires faster', 'dawp'); ?>
            </h2>
          </div>
        </div>

        <?php if (! empty($quick_links)) : ?>
          <div class="mytire-404__category-grid">
            <?php foreach ($quick_links as $link) : ?>
              <a href="<?php echo esc_url($link['url']); ?>" class="mytire-404__category">
                <span>
                  <span>
                    <span class="mytire-404__category-title"><?php echo esc_html($link['title']); ?></span>
                  </span>
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M5 12h14"></path>
                    <path d="m12 5 7 7-7 7"></path>
                  </svg>
                </span>
              </a>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="mytire-404__search">
          <label for="Mytire-404-search" class="sr-only"><?php esc_html_e('Search products', 'dawp'); ?></label>
          <input id="Mytire-404-search" type="search" name="s" placeholder="<?php esc_attr_e('Search tires, size, or category...', 'dawp'); ?>">
          <input type="hidden" name="post_type" value="product">
          <button type="submit">
            <?php esc_html_e('Search', 'dawp'); ?>
          </button>
        </form>
      </div>
    </div>
  </section>

  <section class="mytire-404__support">
    <div class="mytire-404__support-grid">
      <span><?php esc_html_e('Need help?', 'dawp'); ?></span>
      <a href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a>
      <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>"><?php esc_html_e('Shipping Policy', 'dawp'); ?></a>
      <a href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
    </div>
  </section>
</main>

<?php
get_footer();
