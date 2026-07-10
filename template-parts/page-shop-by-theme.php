<?php
/**
 * Template Part: Shop By Theme
 *
 * Theme and occasion browse page for GraphicTShirtStore.
 */

defined('ABSPATH') || exit;

$shop_page_id = function_exists('wc_get_page_id') ? wc_get_page_id('shop') : 0;
$shop_url     = $shop_page_id > 0 ? get_permalink($shop_page_id) : home_url('/shop/');
$img_base     = 'assets/img/home/';

$theme_categories = array(
    array(
        'title'       => __('All Products', 'dawp'),
        'slug'        => '',
        'url'         => $shop_url,
        'description' => __('Explore the full GraphicTShirtStore collection of patriotic apparel, accessories, and custom veteran gifts.', 'dawp'),
        'image'       => $img_base . 'gts-hero.png',
        'label'       => __('Complete Shop', 'dawp'),
        'size'        => 'large',
    ),
    array(
        'title'       => __('American Flag Tees', 'dawp'),
        'slug'        => 'american-flag-tees',
        'description' => __('Graphic tees with bold flag designs, distressed prints, and eagle artwork.', 'dawp'),
        'image'       => $img_base . 'cat-flag-tees.png',
        'label'       => __('Flag Collection', 'dawp'),
        'size'        => 'wide',
    ),
    array(
        'title'       => __('Veteran Tribute', 'dawp'),
        'slug'        => 'veteran-tribute',
        'description' => __('Veteran-inspired apparel that respectfully honors service, branch pride, and sacrifice.', 'dawp'),
        'image'       => $img_base . 'cat-veteran.png',
        'label'       => __('Service Honor', 'dawp'),
        'size'        => 'standard',
    ),
    array(
        'title'       => __('Bomber Jackets', 'dawp'),
        'slug'        => 'bomber-jackets',
        'description' => __('MA-1 style jackets with flag patches and custom name options.', 'dawp'),
        'image'       => $img_base . 'cat-bomber.png',
        'label'       => __('Classic Bombers', 'dawp'),
        'size'        => 'standard',
    ),
    array(
        'title'       => __('Hats & Beanies', 'dawp'),
        'slug'        => 'hats-beanies',
        'description' => __('Snapbacks, dad hats, and beanies with patriotic patchwork.', 'dawp'),
        'image'       => $img_base . 'cat-hats.png',
        'label'       => __('Headwear', 'dawp'),
        'size'        => 'standard',
    ),
    array(
        'title'       => __('Premium T-Shirts', 'dawp'),
        'slug'        => 'premium-t-shirts',
        'description' => __('Heavy-weight cotton tees with vintage-style American pride prints.', 'dawp'),
        'image'       => $img_base . 'cat-tees.png',
        'label'       => __('Signature Tees', 'dawp'),
        'size'        => 'standard',
    ),
    array(
        'title'       => __('Patches & Pins', 'dawp'),
        'slug'        => 'patches-pins',
        'description' => __('Patriotic patches, pins, mugs, and daily carry gifts for American heritage.', 'dawp'),
        'image'       => $img_base . 'cat-accessories.png',
        'label'       => __('Accessories', 'dawp'),
        'size'        => 'wide',
    ),
    array(
        'title'       => __('America 250 Collection', 'dawp'),
        'slug'        => 'america-250',
        'description' => __('Limited-edition designs celebrating 250 years of American pride.', 'dawp'),
        'image'       => 'assets/img/Image New/image copy.png',
        'label'       => __('Heritage 2026', 'dawp'),
        'size'        => 'standard',
    ),
    array(
        'title'       => __('Father\'s Day Gifts', 'dawp'),
        'slug'        => 'fathers-day-gifts',
        'description' => __('Meaningful gifts for fathers, grandfathers, husbands, and proud veterans.', 'dawp'),
        'image'       => 'assets/img/Image New/image copy 11.png',
        'label'       => __('For Dad', 'dawp'),
        'size'        => 'standard',
    ),
    array(
        'title'       => __('Independence Day Gifts', 'dawp'),
        'slug'        => 'independence-day-gifts',
        'description' => __('Bold patriotic apparel and accessories for July 4th celebrations.', 'dawp'),
        'image'       => 'assets/img/Image New/image copy 12.png',
        'label'       => __('July 4th', 'dawp'),
        'size'        => 'standard',
    ),
    array(
        'title'       => __('Memorial Day Gifts', 'dawp'),
        'slug'        => 'memorial-day-gifts',
        'description' => __('Respectful patriotic gifts for remembrance, service, and legacy.', 'dawp'),
        'image'       => 'assets/img/Image New/image copy 6.png',
        'label'       => __('Honor & Remember', 'dawp'),
        'size'        => 'standard',
    ),
    array(
        'title'       => __('Christmas Gifts For Veterans', 'dawp'),
        'slug'        => 'christmas-gifts-for-veterans',
        'description' => __('Gift-ready veteran apparel and accessories made for the holiday season.', 'dawp'),
        'image'       => 'assets/img/Image New/image copy 10.png',
        'label'       => __('Holiday Gifts', 'dawp'),
        'size'        => 'standard',
    ),
);

foreach ($theme_categories as &$category) {
    if (!empty($category['slug'])) {
        $term            = get_term_by('slug', $category['slug'], 'product_cat');
        $category['url'] = $term && !is_wp_error($term) ? get_term_link($term) : home_url('/product-category/' . $category['slug'] . '/');
    }
}
unset($category);
?>

<section class="bg-white text-[#111827]">
  <div class="relative overflow-hidden bg-[#0B1F3A] text-white">
    <div class="absolute inset-0">
      <?php echo dawp_theme_image(
          $img_base . 'gts-hero.png',
          __('Patriotic apparel and custom gift collection', 'dawp'),
          1920,
          1080,
          array(array(720, 405), array(1280, 720), array(1920, 1080)),
          '100vw',
          array('class' => 'h-full w-full object-cover opacity-45', 'loading' => 'eager')
      ); ?>
    </div>
    <div class="absolute inset-0 bg-gradient-to-br from-[#071A33]/95 via-[#071A33]/65 to-[#B31942]/90"></div>
    <div class="relative mx-auto max-w-7xl px-4 py-16 md:px-6 md:py-24 lg:py-28">
      <div class="max-w-3xl">
        <p class="inline-flex rounded-lg border border-[#C6A15B]/40 bg-white/10 px-4 py-2 text-xs font-extrabold uppercase tracking-[0.16em] text-[#C6A15B]">
          <?php esc_html_e('Shop By Theme', 'dawp'); ?>
        </p>
        <h1 class="mt-5 text-4xl font-black leading-none tracking-[-0.02em] md:text-6xl lg:text-7xl">
          <?php esc_html_e('Find Your Patriotic Fit', 'dawp'); ?>
        </h1>
        <p class="mt-6 max-w-2xl text-base leading-8 text-white/80 md:text-lg">
          <?php esc_html_e('Browse GraphicTShirtStore by collection, occasion, and gift intent: flag tees, bomber jackets, veteran tribute gear, America 250 designs, and seasonal gifts.', 'dawp'); ?>
        </p>
        <div class="mt-8 flex flex-col gap-3 sm:flex-row">
          <a href="#theme-grid" class="inline-flex min-h-[48px] items-center justify-center rounded-lg bg-[#B31942] px-6 text-sm font-extrabold uppercase tracking-[0.06em] text-white transition hover:bg-[#921233]">
            <?php esc_html_e('Explore Themes', 'dawp'); ?>
          </a>
          <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-[48px] items-center justify-center rounded-lg border border-white/40 bg-white/10 px-6 text-sm font-extrabold uppercase tracking-[0.06em] text-white transition hover:bg-white hover:text-[#0B1F3A]">
            <?php esc_html_e('Shop All Products', 'dawp'); ?>
          </a>
        </div>
        <p class="mt-5 text-sm font-medium text-white/70"><?php esc_html_e('Secure checkout. Tracking included. Custom gifts made with care.', 'dawp'); ?></p>
      </div>
    </div>
  </div>

  <div class="relative z-10 mx-auto -mt-10 grid max-w-7xl grid-cols-2 gap-3 px-4 md:-mt-14 md:grid-cols-4 md:px-6">
    <?php foreach (array_slice($theme_categories, 1, 4) as $quick_theme) : ?>
      <a href="<?php echo esc_url($quick_theme['url']); ?>" class="rounded-lg border border-[#E5E7EB] bg-white p-5 text-center shadow-[0_18px_40px_rgba(11,31,58,0.16)] transition hover:-translate-y-1 hover:border-[#B31942]">
        <span class="block text-sm font-extrabold text-[#111827] md:text-base"><?php echo esc_html($quick_theme['title']); ?></span>
        <span class="mt-2 block text-xs font-extrabold uppercase tracking-[0.08em] text-[#B31942]"><?php esc_html_e('Shop Now', 'dawp'); ?></span>
      </a>
    <?php endforeach; ?>
  </div>
</section>

<section id="theme-grid" class="bg-[#F7F2E8] py-12 md:py-16 lg:py-20">
  <div class="mx-auto max-w-7xl px-4 md:px-6">
    <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
      <div>
        <p class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#B31942]"><?php esc_html_e('Shopping Themes', 'dawp'); ?></p>
        <h2 class="mt-3 text-3xl font-extrabold leading-tight text-[#111827] md:text-5xl"><?php esc_html_e('Pick A Collection Or Occasion', 'dawp'); ?></h2>
      </div>
      <p class="max-w-xl text-sm leading-7 text-[#6B7280] md:text-base"><?php esc_html_e('Each card leads shoppers straight to the matching product category with a clear theme, mood, and gift intent.', 'dawp'); ?></p>
    </div>

    <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-4">
      <?php foreach ($theme_categories as $category) :
          $is_featured = in_array($category['size'], array('large', 'wide'), true);
          $card_class  = $category['size'] === 'large' ? 'md:col-span-2 lg:col-span-2 lg:row-span-2' : ($category['size'] === 'wide' ? 'lg:col-span-2' : '');
          ?>
        <a href="<?php echo esc_url($category['url']); ?>" class="<?php echo esc_attr($card_class); ?> group relative min-h-[290px] overflow-hidden rounded-lg bg-[#0B1F3A] shadow-sm ring-1 ring-[#E5E7EB] transition hover:-translate-y-1 hover:shadow-xl <?php echo $is_featured ? 'md:min-h-[380px]' : ''; ?>">
          <?php echo dawp_theme_image($category['image'], $category['title'], 780, 560, array(array(360, 260), array(560, 402), array(780, 560), array(1040, 746)), '(max-width: 767px) calc(100vw - 32px), (max-width: 1023px) calc((100vw - 68px) / 2), 300px', array('class' => 'absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-105')); ?>
          <div class="absolute inset-0 bg-black/25"></div>
          <div class="absolute inset-0 bg-gradient-to-t from-[#071A33]/95 via-[#071A33]/45 to-transparent"></div>
          <div class="absolute inset-x-0 bottom-0 p-5 md:p-6">
            <span class="inline-flex rounded bg-[#B31942] px-3 py-1 text-xs font-extrabold uppercase tracking-[0.08em] text-white"><?php echo esc_html($category['label']); ?></span>
            <h3 class="mt-3 <?php echo $is_featured ? 'text-3xl md:text-4xl' : 'text-2xl'; ?> font-extrabold leading-tight text-white drop-shadow-[0_3px_7px_rgba(0,0,0,0.75)]"><?php echo esc_html($category['title']); ?></h3>
            <p class="mt-3 max-w-xl text-sm font-medium leading-6 text-white/90 drop-shadow-[0_2px_4px_rgba(0,0,0,0.75)]"><?php echo esc_html($category['description']); ?></p>
            <span class="mt-5 inline-flex text-xs font-extrabold uppercase tracking-[0.08em] text-white underline decoration-[#F3C86A] decoration-2 underline-offset-4 drop-shadow-[0_2px_3px_rgba(0,0,0,0.9)]"><?php esc_html_e('Shop Theme', 'dawp'); ?></span>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="bg-white py-12 md:py-16">
  <div class="mx-auto max-w-7xl px-4 md:px-6">
    <div class="grid grid-cols-1 gap-6 rounded-lg bg-[#0B1F3A] p-6 text-white md:grid-cols-[minmax(0,1fr)_auto] md:items-center md:p-8 lg:p-10">
      <div>
        <p class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#C6A15B]"><?php esc_html_e('Need A Quick Start?', 'dawp'); ?></p>
        <h2 class="mt-3 text-3xl font-extrabold leading-tight md:text-4xl"><?php esc_html_e('Start With Best Sellers, Then Personalize The Gift.', 'dawp'); ?></h2>
        <p class="mt-3 max-w-2xl text-sm leading-7 text-white/75 md:text-base"><?php esc_html_e('Best Sellers is the fastest path for proven patriotic designs. Veteran Tribute is the best path when the gift needs a name, branch, rank, or service-year detail.', 'dawp'); ?></p>
      </div>
      <div class="flex flex-col gap-3 sm:flex-row md:flex-col">
        <a href="<?php echo esc_url(home_url('/best-sellers/')); ?>" class="inline-flex min-h-[48px] items-center justify-center rounded-lg bg-[#B31942] px-6 text-sm font-extrabold uppercase tracking-[0.06em] text-white transition hover:bg-white hover:text-[#0B1F3A]"><?php esc_html_e('Shop Best Sellers', 'dawp'); ?></a>
        <a href="<?php echo esc_url(home_url('/product-category/veteran-tribute/')); ?>" class="inline-flex min-h-[48px] items-center justify-center rounded-lg border border-white/35 px-6 text-sm font-extrabold uppercase tracking-[0.06em] text-white transition hover:bg-white hover:text-[#0B1F3A]"><?php esc_html_e('Shop Custom Gifts', 'dawp'); ?></a>
      </div>
    </div>
  </div>
</section>
