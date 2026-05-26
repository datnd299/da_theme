<?php
/**
 * 404 Not Found Template
 *
 * @package Dawp
 */

get_header();

$shop_url = function_exists('wc_get_page_permalink')
  ? wc_get_page_permalink('shop')
  : home_url('/shop/');

$category_links = [
  [
    'title' => __('Formal Shoes', 'dawp'),
    'slug'  => 'formal-shoes',
  ],
  [
    'title' => __('Leather Dress Shoes', 'dawp'),
    'slug'  => 'leather-dress-shoes',
  ],
  [
    'title' => __('Brogue Shoes', 'dawp'),
    'slug'  => 'brogue-shoes',
  ],
];

foreach ($category_links as &$category_link) {
  $term = get_term_by('slug', $category_link['slug'], 'product_cat');
  $category_link['url'] = ($term && !is_wp_error($term))
    ? get_term_link($term)
    : home_url('/product-category/' . $category_link['slug'] . '/');
}
unset($category_link);
?>

<style>
  .broge-404 {
    color: #ffffff;
    background:
      linear-gradient(135deg, rgba(17, 17, 17, 0.98), rgba(59, 36, 22, 0.94) 62%, rgba(16, 24, 39, 0.98)),
      #111111;
  }

  .broge-404__gold {
    color: #c8a45d;
  }

  .broge-404__cream {
    color: rgba(245, 239, 230, 0.8);
  }

  .broge-404__cream-soft {
    color: rgba(245, 239, 230, 0.7);
  }

  .broge-404__primary {
    border-color: #a66a3f;
    background: #a66a3f;
  }

  .broge-404__primary:hover,
  .broge-404__secondary:hover {
    background: rgba(255, 255, 255, 0.1);
  }

  .broge-404__secondary {
    border-color: rgba(255, 255, 255, 0.25);
    background: rgba(255, 255, 255, 0.1);
  }
</style>

<main id="primary" class="broge-404 relative site-main error-404 min-h-[100dvh] flex items-center justify-center overflow-hidden px-4 py-24 md:py-40">
  <div class="pointer-events-none absolute top-0 left-0 h-full w-full bg-black/55"></div>

  <div class="relative z-10 mx-auto w-[min(100%-32px,620px)] text-center">
    <p class="broge-404__gold font-serif text-[120px] leading-none font-bold tracking-[-0.05em] opacity-20 md:text-[180px] select-none">
      404
    </p>

    <div class="-mt-10 mb-6 flex justify-center md:-mt-14">
      <span class="inline-flex h-16 w-16 items-center justify-center rounded-full border border-white/20 bg-white/10">
        <svg xmlns="http://www.w3.org/2000/svg" class="broge-404__gold h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.2-5.2m0 0A7.5 7.5 0 1 0 5.2 5.2a7.5 7.5 0 0 0 10.6 10.6Z" />
        </svg>
      </span>
    </div>

    <p class="broge-404__gold mb-2 text-xs font-bold uppercase tracking-[0.18em]"><?php esc_html_e('Page Not Found', 'dawp'); ?></p>
    <h1 class="font-serif text-3xl leading-tight tracking-[-0.02em] text-white md:text-5xl">
      <?php esc_html_e("We couldn't find that page", 'dawp'); ?>
    </h1>
    <p class="broge-404__cream mt-4 text-base leading-7 md:text-lg">
      <?php esc_html_e('The page may have moved or the link may be incorrect. Continue shopping formal shoes, leather dress shoes, and brogue shoes below.', 'dawp'); ?>
    </p>

    <div class="mt-8 flex flex-wrap justify-center gap-3">
      <a
        href="<?php echo esc_url($shop_url); ?>"
        class="broge-404__primary inline-flex min-h-12 items-center justify-center rounded-lg border px-7 text-sm font-bold uppercase tracking-wider text-white transition hover:-translate-y-0.5"
      >
        <?php esc_html_e('Shop All Shoes', 'dawp'); ?>
      </a>
      <a
        href="<?php echo esc_url(home_url('/')); ?>"
        class="broge-404__secondary inline-flex min-h-12 items-center justify-center rounded-lg border px-7 text-sm font-bold uppercase tracking-wider text-white transition hover:-translate-y-0.5"
      >
        <?php esc_html_e('Back to Home', 'dawp'); ?>
      </a>
    </div>

    <div class="mt-12 border-t border-white/20 pt-8">
      <p class="broge-404__cream-soft mb-4 text-xs font-semibold uppercase tracking-widest"><?php esc_html_e('Shop by style', 'dawp'); ?></p>
      <div class="broge-404__cream flex flex-wrap justify-center gap-x-6 gap-y-2 text-sm font-semibold">
        <?php foreach ($category_links as $link) : ?>
          <a href="<?php echo esc_url($link['url']); ?>" class="transition-colors hover:underline"><?php echo esc_html($link['title']); ?></a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</main>

<?php
get_footer();
