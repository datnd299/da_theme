<?php
/**
 * 404 Not Found Template
 *
 * @package Dawp
 */

get_header();

$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
if (!$shop_url) {
  $shop_url = home_url('/shop/');
}

$category_links = [];
if (taxonomy_exists('product_cat')) {
  $excluded_category_ids = [];
  $uncategorized = get_term_by('slug', 'uncategorized', 'product_cat');
  if ($uncategorized && !is_wp_error($uncategorized)) {
    $excluded_category_ids[] = (int) $uncategorized->term_id;
  }

  $product_categories = get_terms([
    'taxonomy'   => 'product_cat',
    'hide_empty' => false,
    'parent'     => 0,
    'number'     => 6,
    'orderby'    => 'menu_order',
    'order'      => 'ASC',
    'exclude'    => $excluded_category_ids,
  ]);

  if (!is_wp_error($product_categories)) {
    foreach ($product_categories as $category) {
      if ('uncategorized' === $category->slug) {
        continue;
      }

      $category_url = get_term_link($category);
      if (!is_wp_error($category_url)) {
        $category_links[] = [
          'title' => $category->name,
          'url'   => $category_url,
          'count' => (int) $category->count,
        ];
      }
    }
  }
}

$quick_links = [
  ['title' => __('Home', 'dawp'),        'url' => home_url('/')],
  ['title' => __('Shop All', 'dawp'),    'url' => $shop_url],
  ['title' => __('About Us', 'dawp'),    'url' => home_url('/about-us/')],
  ['title' => __('Contact Us', 'dawp'),  'url' => home_url('/contact-us/')],
  ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/')],
];
?>

<main id="primary" class="site-main error-404 bg-[#F8F3EC] text-[#2F2A28]">
  <section class="px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
    <div class="mx-auto grid w-[min(100%,1180px)] overflow-hidden rounded-[28px] border border-[#D8CEC6] bg-white shadow-[0_18px_44px_rgba(47,42,40,0.12)] lg:grid-cols-[1.1fr_0.9fr]">
      <div class="relative flex min-h-[440px] flex-col overflow-hidden bg-[#241F1D] p-8 text-white sm:p-10 lg:min-h-[500px] lg:p-14">
        <div class="pointer-events-none absolute inset-0 opacity-35">
          <div class="absolute -right-20 -top-24 h-80 w-80 rounded-full bg-[#C98A8A] blur-3xl"></div>
          <div class="absolute -bottom-20 -left-24 h-72 w-72 rounded-full bg-[#E8D8C8] blur-3xl"></div>
        </div>

        <div class="relative z-10">
          <span class="inline-flex border-b border-[#E8D8C8] pb-2 text-xs font-bold uppercase tracking-[0.18em] text-[#E8D8C8]">
            <?php esc_html_e('404 Error', 'dawp'); ?>
          </span>
          <p class="mt-6 font-serif text-[112px] font-bold leading-none tracking-[-0.05em] text-white opacity-20 md:text-[160px]">
            404
          </p>
          <h1 class="-mt-5 max-w-2xl font-serif text-4xl leading-[1.04] text-white sm:text-5xl lg:text-6xl">
            <?php esc_html_e('We could not find that page.', 'dawp'); ?>
          </h1>
          <p class="mt-5 max-w-2xl text-base leading-8 text-white/78 sm:text-lg">
            <?php esc_html_e('The link may be outdated, or the page may have moved. Search the shop or use the links below to continue browsing.', 'dawp'); ?>
          </p>
        </div>

        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="relative z-10 mt-8 grid gap-3 sm:grid-cols-[1fr_auto]">
          <label class="sr-only" for="error-search"><?php esc_html_e('Search products', 'dawp'); ?></label>
          <input
            id="error-search"
            type="search"
            name="s"
            value="<?php echo esc_attr(get_search_query()); ?>"
            placeholder="<?php esc_attr_e('Search products', 'dawp'); ?>"
            class="min-h-12 rounded-full border border-white/18 bg-white px-5 text-sm text-[#2F2A28] outline-none transition-colors placeholder:text-[#948984] focus:border-[#C98A8A]"
          >
          <input type="hidden" name="post_type" value="product">
          <button type="submit" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#C98A8A] px-7 py-3 text-sm font-bold text-white transition-colors hover:bg-white hover:text-[#2F2A28]">
            <?php esc_html_e('Search', 'dawp'); ?>
          </button>
        </form>
      </div>

      <div class="flex flex-col justify-between gap-8 bg-[#F8F3EC] p-6 sm:p-8 lg:p-10">
        <div>
          <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#C98A8A]">
            <?php esc_html_e('Keep Browsing', 'dawp'); ?>
          </span>
          <h2 class="mt-4 font-serif text-3xl leading-tight text-[#2F2A28] sm:text-4xl">
            <?php esc_html_e('Useful links', 'dawp'); ?>
          </h2>

          <div class="mt-6 grid gap-3 sm:grid-cols-2">
            <?php foreach ($quick_links as $index => $link) : ?>
              <a href="<?php echo esc_url($link['url']); ?>" class="group rounded-[8px] border border-[#D8CEC6] bg-white p-5 transition-all hover:-translate-y-1 hover:border-[#C98A8A] hover:shadow-[0_18px_40px_rgba(47,42,40,0.12)]">
                <span class="text-xs font-bold text-[#C98A8A]"><?php echo esc_html(str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT)); ?></span>
                <span class="mt-3 block text-base font-bold text-[#2F2A28] transition-colors group-hover:text-[#C98A8A]">
                  <?php echo esc_html($link['title']); ?>
                </span>
              </a>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="border-t border-[#D8CEC6] pt-8">
          <div class="flex items-end justify-between gap-4">
            <div>
              <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#C98A8A]">
                <?php esc_html_e('Categories', 'dawp'); ?>
              </span>
              <h2 class="mt-3 font-serif text-2xl leading-tight text-[#2F2A28]">
                <?php esc_html_e('Shop by category', 'dawp'); ?>
              </h2>
            </div>
            <a href="<?php echo esc_url($shop_url); ?>" class="hidden text-sm font-bold text-[#2F2A28] underline decoration-[#C98A8A] decoration-2 underline-offset-8 transition-colors hover:text-[#C98A8A] md:block">
              <?php esc_html_e('View All', 'dawp'); ?>
            </a>
          </div>

          <?php if (!empty($category_links)) : ?>
            <div class="mt-5 grid gap-3">
              <?php foreach ($category_links as $category) : ?>
                <a href="<?php echo esc_url($category['url']); ?>" class="flex items-center justify-between gap-4 rounded-[8px] border border-[#D8CEC6] bg-white px-5 py-4 text-sm font-bold text-[#2F2A28] transition-colors hover:border-[#C98A8A] hover:bg-[#F4ECE5] hover:text-[#C98A8A]">
                  <span><?php echo esc_html($category['title']); ?></span>
                  <span class="shrink-0 text-xs font-semibold text-[#9A8C86]">
                    <?php
                    printf(
                      esc_html(_n('%s item', '%s items', $category['count'], 'dawp')),
                      esc_html(number_format_i18n($category['count']))
                    );
                    ?>
                  </span>
                </a>
              <?php endforeach; ?>
            </div>
          <?php else : ?>
            <div class="mt-5 rounded-[8px] border border-dashed border-[#D8CEC6] bg-white p-5">
              <p class="text-sm leading-6 text-[#6F625D]">
                <?php esc_html_e('Product categories are not available right now. Visit the shop to see all products.', 'dawp'); ?>
              </p>
              <a href="<?php echo esc_url($shop_url); ?>" class="mt-4 inline-flex min-h-11 items-center justify-center rounded-full bg-[#2F2A28] px-6 py-3 text-sm font-bold text-white transition-colors hover:bg-[#C98A8A]">
                <?php esc_html_e('Go To Shop', 'dawp'); ?>
              </a>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
get_footer();
