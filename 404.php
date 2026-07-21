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

if (function_exists('dawp_product_category_definitions')) {
  foreach (dawp_product_category_definitions() as $slug => $category) {
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

<main id="primary" class="site-main error-404 bg-white font-body text-[#1F2937]">
  <section class="relative overflow-hidden bg-[#F7F5EF]">
    <div class="absolute inset-0 opacity-80">
      <div class="h-full w-full bg-[linear-gradient(135deg,rgba(255,251,235,0.96)_0%,rgba(255,255,255,0.72)_50%,rgba(254,243,199,0.82)_100%)]"></div>
    </div>

    <div class="relative mx-auto grid min-h-[640px] max-w-7xl grid-cols-1 items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[minmax(0,0.92fr)_minmax(0,1.08fr)] lg:px-8 lg:py-20">
      <div>
        <p class="mb-5 inline-flex rounded-full border border-[#C89B3C]/60 bg-white px-4 py-2 text-xs font-black uppercase tracking-[0.16em] text-[#6E9B8E]">
          <?php esc_html_e('404 | Page Not Found', 'dawp'); ?>
        </p>

        <h1 class="font-heading text-5xl font-black leading-[0.98] text-[#1F6F68] sm:text-6xl lg:text-7xl">
          <?php esc_html_e('This page could not be found.', 'dawp'); ?>
        </h1>

        <p class="mt-6 max-w-2xl text-lg leading-8 text-[#475569]">
          <?php esc_html_e('The page may have moved, the link may be outdated, or a product category address may have changed. Use the shortcuts below to get back to the current Patado LLC catalog.', 'dawp'); ?>
        </p>

        <div class="mt-8 flex flex-col gap-3 sm:flex-row">
          <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#C89B3C] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#1F6F68] hover:text-white">
            <?php esc_html_e('Shop All Products', 'dawp'); ?>
          </a>
          <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#C89B3C] bg-white px-7 text-sm font-black uppercase tracking-wide text-[#1F6F68] transition hover:bg-[#F7F5EF]">
            <?php esc_html_e('Back To Home', 'dawp'); ?>
          </a>
        </div>
      </div>

      <div class="rounded-lg border border-[#E8D9A6] bg-white p-5 text-[#1F2937] shadow-xl">
        <div class="flex items-start justify-between gap-5 border-b border-[#E8D9A6] pb-5">
          <div>
            <p class="text-xs font-black uppercase tracking-[0.16em] text-[#C89B3C]">
              <?php esc_html_e('Quick Recovery', 'dawp'); ?>
            </p>
            <h2 class="mt-2 font-heading text-3xl font-black leading-tight text-[#1F6F68]">
              <?php esc_html_e('Browse active categories', 'dawp'); ?>
            </h2>
          </div>
          <span class="select-none text-5xl font-black leading-none text-[#E8D9A6]">404</span>
        </div>

        <?php if (! empty($quick_links)) : ?>
          <div class="mt-5 grid grid-cols-1 gap-3 sm:grid-cols-2">
            <?php foreach ($quick_links as $link) : ?>
              <a href="<?php echo esc_url($link['url']); ?>" class="group rounded-lg border border-[#E8D9A6] bg-[#F7F5EF] p-4 transition hover:border-[#C89B3C] hover:bg-white hover:shadow-sm">
                <span class="flex items-center justify-between gap-3">
                  <span>
                    <span class="block text-sm font-black text-[#1F6F68] group-hover:text-[#C89B3C]"><?php echo esc_html($link['title']); ?></span>
                    <?php if (! empty($link['copy'])) : ?>
                      <span class="mt-1 block text-xs font-semibold leading-5 text-[#475569]"><?php echo esc_html($link['copy']); ?></span>
                    <?php endif; ?>
                  </span>
                  <svg class="h-4 w-4 shrink-0 text-[#6E9B8E]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M5 12h14"></path>
                    <path d="m12 5 7 7-7 7"></path>
                  </svg>
                </span>
              </a>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="mt-6 flex flex-col gap-2 rounded-lg border border-[#E8D9A6] bg-white p-2 sm:flex-row">
          <label for="scott-404-search" class="sr-only"><?php esc_html_e('Search products', 'dawp'); ?></label>
          <input id="scott-404-search" type="search" name="s" placeholder="<?php esc_attr_e('Search bracelets, jewelry, or gifts...', 'dawp'); ?>" class="min-h-11 flex-1 rounded-md bg-[#F7F5EF] px-4 text-sm text-[#1F2937] placeholder:text-[#6E9B8E] outline-none focus:bg-white">
          <input type="hidden" name="post_type" value="product">
          <button type="submit" class="inline-flex min-h-11 shrink-0 items-center justify-center rounded-full bg-[#C89B3C] px-5 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#1F6F68] hover:text-white">
            <?php esc_html_e('Search', 'dawp'); ?>
          </button>
        </form>
      </div>
    </div>
  </section>

  <section class="bg-white py-10">
    <div class="mx-auto grid max-w-7xl grid-cols-1 gap-4 px-4 sm:grid-cols-2 sm:px-6 lg:grid-cols-4 lg:px-8">
      <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>" class="rounded-lg border border-[#E8D9A6] bg-[#F7F5EF] p-5 transition hover:border-[#C89B3C] hover:bg-white hover:shadow-sm">
        <p class="text-sm font-black text-[#1F6F68]"><?php esc_html_e('Shipping Policy', 'dawp'); ?></p>
        <p class="mt-2 text-sm leading-6 text-[#475569]"><?php esc_html_e('Check processing, delivery, and tracking details.', 'dawp'); ?></p>
      </a>
      <a href="<?php echo esc_url(home_url('/return-refund-policy/')); ?>" class="rounded-lg border border-[#E8D9A6] bg-[#F7F5EF] p-5 transition hover:border-[#C89B3C] hover:bg-white hover:shadow-sm">
        <p class="text-sm font-black text-[#1F6F68]"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></p>
        <p class="mt-2 text-sm leading-6 text-[#475569]"><?php esc_html_e('Review return eligibility and refund timing.', 'dawp'); ?></p>
      </a>
      <a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="rounded-lg border border-[#E8D9A6] bg-[#F7F5EF] p-5 transition hover:border-[#C89B3C] hover:bg-white hover:shadow-sm">
        <p class="text-sm font-black text-[#1F6F68]"><?php esc_html_e('Track Order', 'dawp'); ?></p>
        <p class="mt-2 text-sm leading-6 text-[#475569]"><?php esc_html_e('Find the latest status for an existing order.', 'dawp'); ?></p>
      </a>
      <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="rounded-lg border border-[#E8D9A6] bg-[#F7F5EF] p-5 transition hover:border-[#C89B3C] hover:bg-white hover:shadow-sm">
        <p class="text-sm font-black text-[#1F6F68]"><?php esc_html_e('Contact Support', 'dawp'); ?></p>
        <p class="mt-2 text-sm leading-6 text-[#475569]"><?php esc_html_e('Ask for help with ordering, delivery, or product questions.', 'dawp'); ?></p>
      </a>
    </div>
  </section>
</main>

<?php
get_footer();
