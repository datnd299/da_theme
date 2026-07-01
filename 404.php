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

<main id="primary" class="site-main error-404 bg-white font-body text-[#111827]">
  <section class="relative overflow-hidden bg-[#0B1F33] text-white">
    <div class="absolute inset-0 opacity-80">
      <div class="h-full w-full bg-[linear-gradient(135deg,rgba(249,115,22,0.28)_0%,rgba(11,31,51,0.96)_50%,rgba(17,24,39,0.88)_100%)]"></div>
    </div>

    <div class="relative mx-auto grid min-h-[640px] max-w-7xl grid-cols-1 items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[minmax(0,0.92fr)_minmax(0,1.08fr)] lg:px-8 lg:py-20">
      <div>
        <p class="mb-5 inline-flex rounded-md border border-[#FDBA74]/50 bg-[#F97316]/15 px-4 py-2 text-xs font-black uppercase tracking-[0.18em] text-[#FDBA74]">
          <?php esc_html_e('404 | Page Not Found', 'dawp'); ?>
        </p>

        <h1 class="font-heading text-5xl font-black leading-[0.98] text-white sm:text-6xl lg:text-7xl">
          <?php esc_html_e('This page could not be found.', 'dawp'); ?>
        </h1>

        <p class="mt-6 max-w-2xl text-lg leading-8 text-[#D7DEE8]">
          <?php esc_html_e('The page may have moved, the link may be outdated, or a tire category address may have changed. Use the shortcuts below to get back to the current Rubyinstar tire catalog.', 'dawp'); ?>
        </p>

        <div class="mt-8 flex flex-col gap-3 sm:flex-row">
          <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#F97316] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-[#0B1F33]">
            <?php esc_html_e('Shop All Products', 'dawp'); ?>
          </a>
          <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-white/40 bg-white/10 px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-[#0B1F33]">
            <?php esc_html_e('Back To Home', 'dawp'); ?>
          </a>
        </div>
      </div>

      <div class="rounded-lg border border-white/10 bg-white p-5 text-[#111827] shadow-xl">
        <div class="flex items-start justify-between gap-5 border-b border-[#E5E7EB] pb-5">
          <div>
            <p class="text-xs font-black uppercase tracking-[0.18em] text-[#F97316]">
              <?php esc_html_e('Quick Recovery', 'dawp'); ?>
            </p>
            <h2 class="mt-2 font-heading text-3xl font-black leading-tight text-[#0B1F33]">
              <?php esc_html_e('Browse active categories', 'dawp'); ?>
            </h2>
          </div>
          <span class="select-none text-5xl font-black leading-none text-[#E5E7EB]">404</span>
        </div>

        <?php if (! empty($quick_links)) : ?>
          <div class="mt-5 grid grid-cols-1 gap-3 sm:grid-cols-2">
            <?php foreach ($quick_links as $link) : ?>
              <a href="<?php echo esc_url($link['url']); ?>" class="group rounded-md border border-[#E5E7EB] bg-[#F4F6F8] p-4 transition hover:border-[#F97316] hover:bg-white hover:shadow-sm">
                <span class="flex items-center justify-between gap-3">
                  <span>
                    <span class="block text-sm font-black text-[#0B1F33] group-hover:text-[#C2410C]"><?php echo esc_html($link['title']); ?></span>
                    <?php if (! empty($link['copy'])) : ?>
                      <span class="mt-1 block text-xs font-semibold leading-5 text-[#4B5563]"><?php echo esc_html($link['copy']); ?></span>
                    <?php endif; ?>
                  </span>
                  <svg class="h-4 w-4 shrink-0 text-[#F97316]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M5 12h14"></path>
                    <path d="m12 5 7 7-7 7"></path>
                  </svg>
                </span>
              </a>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="mt-6 flex flex-col gap-2 rounded-md border border-[#D7DEE8] bg-white p-2 sm:flex-row">
          <label for="rubyinstar-404-search" class="sr-only"><?php esc_html_e('Search products', 'dawp'); ?></label>
          <input id="rubyinstar-404-search" type="search" name="s" placeholder="<?php esc_attr_e('Search tires, size, or category...', 'dawp'); ?>" class="min-h-11 flex-1 rounded-md bg-[#F4F6F8] px-4 text-sm text-[#111827] placeholder:text-[#6B7280] outline-none focus:bg-white">
          <input type="hidden" name="post_type" value="product">
          <button type="submit" class="inline-flex min-h-11 shrink-0 items-center justify-center rounded-md bg-[#F97316] px-5 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#0B1F33]">
            <?php esc_html_e('Search', 'dawp'); ?>
          </button>
        </form>
      </div>
    </div>
  </section>

  <section class="bg-[#F4F6F8] py-10">
    <div class="mx-auto grid max-w-7xl grid-cols-1 gap-4 px-4 sm:grid-cols-3 sm:px-6 lg:px-8">
      <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>" class="rounded-lg border border-[#E5E7EB] bg-white p-5 transition hover:border-[#F97316] hover:shadow-sm">
        <p class="text-sm font-black text-[#0B1F33]"><?php esc_html_e('Shipping Policy', 'dawp'); ?></p>
        <p class="mt-2 text-sm leading-6 text-[#4B5563]"><?php esc_html_e('Check processing, delivery, and tracking details.', 'dawp'); ?></p>
      </a>
      <a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="rounded-lg border border-[#E5E7EB] bg-white p-5 transition hover:border-[#F97316] hover:shadow-sm">
        <p class="text-sm font-black text-[#0B1F33]"><?php esc_html_e('Track Order', 'dawp'); ?></p>
        <p class="mt-2 text-sm leading-6 text-[#4B5563]"><?php esc_html_e('Find the latest status for an existing order.', 'dawp'); ?></p>
      </a>
      <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="rounded-lg border border-[#E5E7EB] bg-white p-5 transition hover:border-[#F97316] hover:shadow-sm">
        <p class="text-sm font-black text-[#0B1F33]"><?php esc_html_e('Contact Support', 'dawp'); ?></p>
        <p class="mt-2 text-sm leading-6 text-[#4B5563]"><?php esc_html_e('Ask for help with ordering, delivery, or product questions.', 'dawp'); ?></p>
      </a>
    </div>
  </section>
</main>

<?php
get_footer();
