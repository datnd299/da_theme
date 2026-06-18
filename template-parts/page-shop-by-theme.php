<?php
$shop_page_id = function_exists('wc_get_page_id') ? wc_get_page_id('shop') : 0;
$shop_url = $shop_page_id > 0 ? get_permalink($shop_page_id) : home_url('/shop/');

$theme_categories = array(
    array(
        'title' => 'All Products',
        'slug' => '',
        'url' => $shop_url,
        'description' => 'Explore the full Proudlywear collection of patriotic apparel, accessories, and custom veteran gifts.',
        'image' => 'assets/img/Image New/image.png',
        'label' => 'Complete Shop',
        'size' => 'large',
    ),
    array(
        'title' => 'America 250 Collection',
        'slug' => 'america-250-collection',
        'description' => 'Commemorative red, white, and blue designs for America\'s 250th anniversary.',
        'image' => 'assets/img/Image New/image copy.png',
        'label' => 'Milestone Picks',
        'size' => 'wide',
    ),
    array(
        'title' => 'Best Sellers',
        'slug' => 'best-sellers',
        'description' => 'Customer-favorite patriotic gifts, apparel, hats, and keepsakes.',
        'image' => 'assets/img/Image New/image copy 7.png',
        'label' => 'Fan Favorites',
        'size' => 'standard',
    ),
    array(
        'title' => 'Christmas Gifts For Veterans',
        'slug' => 'christmas-gifts-for-veterans',
        'description' => 'Gift-ready veteran apparel and accessories made for the holiday season.',
        'image' => 'assets/img/Image New/image copy 10.png',
        'label' => 'Holiday Gifts',
        'size' => 'standard',
    ),
    array(
        'title' => 'Custom Military Gifts',
        'slug' => 'custom-military-gifts',
        'description' => 'Personalized pieces that carry name, rank, branch, and service years.',
        'image' => 'assets/img/Image New/image copy 8.png',
        'label' => 'Personalized',
        'size' => 'wide',
    ),
    array(
        'title' => 'Father\'s Day Gifts',
        'slug' => 'fathers-day-gifts',
        'description' => 'Meaningful gifts for fathers, grandfathers, husbands, and proud veterans.',
        'image' => 'assets/img/Image New/image copy 11.png',
        'label' => 'For Dad',
        'size' => 'standard',
    ),
    array(
        'title' => 'Independence Day Gifts',
        'slug' => 'independence-day-gifts',
        'description' => 'Bold patriotic apparel and accessories for July 4th celebrations.',
        'image' => 'assets/img/Image New/image copy 12.png',
        'label' => 'July 4th',
        'size' => 'standard',
    ),
    array(
        'title' => 'Memorial Day Gifts',
        'slug' => 'memorial-day-gifts',
        'description' => 'Respectful patriotic gifts for remembrance, service, and legacy.',
        'image' => 'assets/img/Image New/image copy 6.png',
        'label' => 'Honor & Remember',
        'size' => 'standard',
    ),
    array(
        'title' => 'Patriotic Accessories',
        'slug' => 'patriotic-accessories',
        'description' => 'Everyday mugs, caps, phone cases, and accessories with American pride.',
        'image' => 'assets/img/Image New/image copy 5.png',
        'label' => 'Accessories',
        'size' => 'standard',
    ),
    array(
        'title' => 'Veteran Hats',
        'slug' => 'veteran-hats',
        'description' => 'Patriotic caps and veteran-inspired designs made for everyday wear.',
        'image' => 'assets/img/Image New/image copy 9.png',
        'label' => 'Caps & Hats',
        'size' => 'standard',
    ),
    array(
        'title' => 'Veteran Polo Shirts',
        'slug' => 'veteran-polo-shirts',
        'description' => 'Polished custom polos designed to carry service pride with confidence.',
        'image' => 'assets/img/Image New/image copy 3.png',
        'label' => 'Custom Polos',
        'size' => 'wide',
    ),
    array(
        'title' => 'Veterans Day Gifts',
        'slug' => 'veterans-day-gifts',
        'description' => 'Thoughtful patriotic gifts made to honor veterans and their service story.',
        'image' => 'assets/img/Image New/image copy 4.png',
        'label' => 'Service Gifts',
        'size' => 'standard',
    ),
);

foreach ($theme_categories as &$category) {
    if (!empty($category['slug'])) {
        $term = get_term_by('slug', $category['slug'], 'product_cat');
        $category['url'] = $term && !is_wp_error($term) ? get_term_link($term) : home_url('/product-category/' . $category['slug'] . '/');
    }
}
unset($category);
?>

<section class="bg-[#071A33] text-white">
  <div class="relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,rgba(198,161,91,.35),transparent_34%),linear-gradient(135deg,#071A33_0%,#0B1F3A_44%,#B31942_100%)]"></div>
    <div class="absolute inset-0 opacity-20 [background-image:linear-gradient(115deg,transparent_0_42%,rgba(255,255,255,.22)_42%_46%,transparent_46%_100%)]"></div>
    <div class="relative mx-auto max-w-7xl px-4 py-16 md:px-6 md:py-24 lg:py-28">
      <div class="max-w-4xl">
        <p class="inline-flex rounded-lg border border-[#C6A15B]/50 bg-white/10 px-4 py-2 text-xs font-extrabold uppercase tracking-[0.16em] text-[#C6A15B]">Shop By Theme</p>
        <h1 class="mt-5 max-w-4xl text-4xl font-extrabold leading-none md:text-6xl">Shop Proudlywear By Theme</h1>
        <p class="mt-6 max-w-2xl text-base leading-7 text-white/80 md:text-lg">Find the right patriotic collection faster: veteran polos, custom military gifts, America 250 pieces, holiday gifts, hats, accessories, and meaningful occasion picks.</p>
        <div class="mt-8 flex flex-col gap-3 sm:flex-row">
          <a href="#theme-grid" class="inline-flex min-h-[48px] items-center justify-center rounded-lg bg-[#B31942] px-6 text-sm font-extrabold uppercase tracking-[0.06em] text-white transition hover:bg-white hover:text-[#0B1F3A]">Explore Themes</a>
          <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-[48px] items-center justify-center rounded-lg border border-white/40 px-6 text-sm font-extrabold uppercase tracking-[0.06em] text-white transition hover:bg-white hover:text-[#0B1F3A]">Shop All Products</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="theme-grid" class="bg-[#F7F2E8] py-12 md:py-16 lg:py-20">
  <div class="mx-auto max-w-7xl px-4 md:px-6">
    <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
      <div>
        <p class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#B31942]">All Shopping Themes</p>
        <h2 class="mt-3 text-3xl font-extrabold text-[#111827] md:text-5xl">Pick the mood, moment, or gift story</h2>
      </div>
      <p class="max-w-xl text-sm leading-7 text-[#6B7280] md:text-base">Each banner takes shoppers straight to the matching product category with a clear theme, mood, and gift intent.</p>
    </div>

    <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-4">
      <?php foreach ($theme_categories as $category) :
          $is_featured = in_array($category['size'], array('large', 'wide'), true);
          $card_class = $category['size'] === 'large' ? 'md:col-span-2 lg:col-span-2 lg:row-span-2' : ($category['size'] === 'wide' ? 'lg:col-span-2' : '');
          ?>
        <a href="<?php echo esc_url($category['url']); ?>" class="<?php echo esc_attr($card_class); ?> group relative min-h-[270px] overflow-hidden rounded-lg bg-[#0B1F3A] shadow-sm ring-1 ring-[#E5E7EB] transition hover:-translate-y-1 hover:shadow-xl <?php echo $is_featured ? 'md:min-h-[360px]' : ''; ?>">
          <?php echo dawp_theme_image($category['image'], $category['title'], 780, 560, array(array(360, 260), array(560, 402), array(780, 560), array(1040, 746)), '(max-width: 767px) calc(100vw - 32px), (max-width: 1023px) calc((100vw - 68px) / 2), 300px', array('class' => 'absolute inset-0 h-full w-full object-cover transition duration-500 group-hover:scale-105')); ?>
          <div class="absolute inset-0 bg-gradient-to-t from-[#071A33]/95 via-[#071A33]/45 to-transparent"></div>
          <div class="absolute inset-x-0 bottom-0 p-5 md:p-6">
            <div class="mb-3 flex flex-wrap items-center gap-2">
              <span class="rounded-lg bg-[#B31942] px-3 py-1 text-xs font-extrabold uppercase tracking-wide text-white"><?php echo esc_html($category['label']); ?></span>
            </div>
            <h3 class="<?php echo $is_featured ? 'text-3xl md:text-4xl' : 'text-2xl'; ?> font-extrabold leading-tight text-white"><?php echo esc_html($category['title']); ?></h3>
            <p class="mt-3 max-w-xl text-sm leading-6 text-white/80"><?php echo esc_html($category['description']); ?></p>
            <span class="mt-5 inline-flex min-h-[42px] items-center rounded-lg bg-white px-4 text-xs font-extrabold uppercase tracking-[0.06em] text-[#0B1F3A] transition group-hover:bg-[#C6A15B]">Shop Theme</span>
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
        <p class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#C6A15B]">Need a quick start?</p>
        <h2 class="mt-3 text-3xl font-extrabold md:text-4xl">Start with best sellers, then personalize the gift.</h2>
        <p class="mt-3 max-w-2xl text-sm leading-7 text-white/75 md:text-base">Best Sellers is the fastest path for shoppers who want proven patriotic designs. Custom Military Gifts is the best path when the gift needs a name, branch, rank, or service-year detail.</p>
      </div>
      <div class="flex flex-col gap-3 sm:flex-row md:flex-col">
        <a href="<?php echo esc_url(home_url('/product-category/best-sellers/')); ?>" class="inline-flex min-h-[48px] items-center justify-center rounded-lg bg-[#B31942] px-6 text-sm font-extrabold uppercase tracking-[0.06em] text-white transition hover:bg-white hover:text-[#0B1F3A]">Shop Best Sellers</a>
        <a href="<?php echo esc_url(home_url('/product-category/custom-military-gifts/')); ?>" class="inline-flex min-h-[48px] items-center justify-center rounded-lg border border-white/35 px-6 text-sm font-extrabold uppercase tracking-[0.06em] text-white transition hover:bg-white hover:text-[#0B1F3A]">Shop Custom Gifts</a>
      </div>
    </div>
  </div>
</section>
