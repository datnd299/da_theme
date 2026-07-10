<?php
/**
 * Template Part: Home
 *
 * Homepage for GraphicTShirtStore.
 */

defined('ABSPATH') || exit;

$img_base = 'assets/img/home/';

$quick_links = array(
    array(__('American Flag Tees', 'dawp'), '/product-category/american-flag-tees/'),
    array(__('Bomber Jackets', 'dawp'), '/product-category/bomber-jackets/'),
    array(__('Veteran Tribute', 'dawp'), '/product-category/veteran-tribute/'),
    array(__('Best Sellers', 'dawp'), '/best-sellers/'),
);

$categories = array(
    array(__('American Flag Tees', 'dawp'), __('Flag Collection', 'dawp'), __('Graphic tees with bold flag designs, distressed prints, and eagle artwork.', 'dawp'), '/product-category/american-flag-tees/', 'cat-flag-tees.png'),
    array(__('Veteran Tribute', 'dawp'), __('Service Honor', 'dawp'), __('Veteran-inspired apparel that respectfully honors service and sacrifice.', 'dawp'), '/product-category/veteran-tribute/', 'cat-veteran.png'),
    array(__('Bomber Jackets', 'dawp'), __('Classic Bombers', 'dawp'), __('MA-1 style jackets with flag patches and custom name options.', 'dawp'), '/product-category/bomber-jackets/', 'cat-bomber.png'),
    array(__('Hats & Beanies', 'dawp'), __('Headwear', 'dawp'), __('Snapbacks, dad hats, and beanies with patriotic patchwork.', 'dawp'), '/product-category/hats-beanies/', 'cat-hats.png'),
    array(__('Premium T-Shirts', 'dawp'), __('Signature Tees', 'dawp'), __('Heavy-weight cotton tees with vintage-style American pride prints.', 'dawp'), '/product-category/premium-t-shirts/', 'cat-tees.png'),
    array(__('Patches & Pins', 'dawp'), __('Accessories', 'dawp'), __('Patches, pins, mugs, and daily carry gifts for American heritage.', 'dawp'), '/product-category/patches-pins/', 'cat-accessories.png'),
);

$fallback_products = array(
    array(__('Classic Distressed Flag Tee', 'dawp'), __('Best Seller', 'dawp'), '$29.99', '/product-category/american-flag-tees/', 'product-flag-tee.png'),
    array(__('Custom Veteran Hoodie', 'dawp'), __('Customizable', 'dawp'), '$54.99', '/product-category/veteran-tribute/', 'product-veteran-hoodie.png'),
    array(__('American Flag Snapback', 'dawp'), __('Best Seller', 'dawp'), '$29.99', '/product-category/hats-beanies/', 'product-snapback.png'),
    array(__('Custom Name Bomber Jacket', 'dawp'), __('Customizable', 'dawp'), '$79.99', '/product-category/bomber-jackets/', 'product-bomber-jacket.png'),
);

$occasions = array(
    array(__('Father\'s Day Gifts', 'dawp'), __('A meaningful gift for the veteran who carries the story.', 'dawp'), '/product-category/veteran-tribute/', '01'),
    array(__('Veterans Day Gifts', 'dawp'), __('Personalized apparel made to honor service years and family legacy.', 'dawp'), '/product-category/veteran-tribute/', '11'),
    array(__('Memorial Day Gifts', 'dawp'), __('Remember and honor with patriotic tribute products.', 'dawp'), '/product-category/american-flag-tees/', '05'),
    array(__('Independence Day Gifts', 'dawp'), __('Celebrate freedom with flag tees, hats, and accessories.', 'dawp'), '/product-category/american-flag-tees/', '07'),
    array(__('America 250th Anniversary', 'dawp'), __('Limited-edition designs celebrating 250 years of American pride.', 'dawp'), '/product-category/america-250/', '250'),
    array(__('Christmas Gifts For Veterans', 'dawp'), __('Give a gift that says thank you better than words.', 'dawp'), '/product-category/veteran-tribute/', '12'),
);

$tributes = array(
    __('A gift that helps families honor a father\'s years of service.', 'dawp'),
    __('A custom bomber jacket that carries name, rank, and service years with pride.', 'dawp'),
    __('A simple way to show American pride without saying too much.', 'dawp'),
);

$trust_cards = array(
    array(__('Secure Checkout', 'dawp'), __('A safe and simple checkout experience for every order.', 'dawp'), 'shield'),
    array(__('Tracking Included', 'dawp'), __('Tracking details are provided once your order ships.', 'dawp'), 'truck'),
    array(__('30-Day Returns', 'dawp'), __('Eligible non-personalized items may be returned within 30 days.', 'dawp'), 'calendar'),
    array(__('Personalization Support', 'dawp'), __('Review custom name, rank, and service details carefully before ordering.', 'dawp'), 'headset'),
);

$products = array();
if (class_exists('WooCommerce') && function_exists('wc_get_products')) {
    $products = wc_get_products(array(
        'status'  => 'publish',
        'limit'   => 8,
        'orderby' => 'popularity',
        'return'  => 'objects',
    ));
}
?>

<section class="bg-[#FFFFFF] text-[#111827]">
  <div class="relative overflow-hidden bg-[#0B1F3A] text-white">
    <div class="absolute inset-0">
      <?php echo dawp_theme_image(
          $img_base . 'gts-hero.png',
          __('Patriotic apparel and custom bomber jacket lifestyle image', 'dawp'),
          1920,
          1080,
          array(array(720, 405), array(1280, 720), array(1920, 1080)),
          '100vw',
          array('class' => 'h-full w-full object-cover opacity-45', 'loading' => 'eager')
      ); ?>
    </div>
    <div class="absolute inset-0 bg-gradient-to-br from-[#071A33]/95 via-[#071A33]/45 to-[#B31942] opacity-95"></div>
    <div class="relative mx-auto max-w-7xl px-4 py-16 md:px-6 md:py-24 lg:py-28">
      <div class="max-w-3xl">
        <p class="inline-flex rounded-lg border border-[#C6A15B]/40 bg-white/10 px-4 py-2 text-xs font-extrabold uppercase tracking-[0.16em] text-[#C6A15B]">
          <?php esc_html_e('American Patriotic Apparel & Custom Gifts', 'dawp'); ?>
        </p>
        <h1 class="mt-5 text-4xl font-black leading-none tracking-[-0.02em] md:text-6xl lg:text-7xl">
          <?php esc_html_e('Wear The Freedom. Live The Pride.', 'dawp'); ?>
        </h1>
        <p class="mt-6 max-w-2xl text-base leading-8 text-white/80 md:text-lg">
          <?php esc_html_e('Premium graphic tees, bomber jackets, hats, hoodies, and accessories made for veterans, military families, and proud Americans.', 'dawp'); ?>
        </p>
        <div class="mt-8 flex flex-col gap-3 sm:flex-row">
          <a href="<?php echo esc_url(home_url('/best-sellers/')); ?>" class="inline-flex min-h-[48px] items-center justify-center rounded-lg bg-[#B31942] px-6 text-sm font-extrabold uppercase tracking-[0.06em] text-white transition hover:bg-[#921233]">
            <?php esc_html_e('Shop Best Sellers', 'dawp'); ?>
          </a>
          <a href="<?php echo esc_url(home_url('/product-category/bomber-jackets/')); ?>" class="inline-flex min-h-[48px] items-center justify-center rounded-lg border border-white/40 bg-white/10 px-6 text-sm font-extrabold uppercase tracking-[0.06em] text-white transition hover:bg-white hover:text-[#0B1F3A]">
            <?php esc_html_e('Customize Yours', 'dawp'); ?>
          </a>
        </div>
        <p class="mt-5 text-sm font-medium text-white/70"><?php esc_html_e('Secure checkout. Tracking included. Custom gifts made with care.', 'dawp'); ?></p>
      </div>
    </div>
  </div>

  <div class="relative z-10 mx-auto -mt-10 grid max-w-7xl grid-cols-2 gap-3 px-4 md:-mt-14 md:grid-cols-4 md:px-6">
    <?php foreach ($quick_links as $quick_link) : ?>
      <a href="<?php echo esc_url(home_url($quick_link[1])); ?>" class="rounded-lg border border-[#E5E7EB] bg-white p-5 text-center shadow-[0_18px_40px_rgba(11,31,58,0.16)] transition hover:-translate-y-1 hover:border-[#B31942]">
        <span class="block text-sm font-extrabold text-[#111827] md:text-base"><?php echo esc_html($quick_link[0]); ?></span>
        <span class="mt-2 block text-xs font-extrabold uppercase tracking-[0.08em] text-[#B31942]"><?php esc_html_e('Shop Now', 'dawp'); ?></span>
      </a>
    <?php endforeach; ?>
  </div>

  <div class="bg-white py-12 md:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 md:px-6">
      <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
        <div>
          <p class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#B31942]"><?php esc_html_e('Categories', 'dawp'); ?></p>
          <h2 class="mt-3 text-3xl font-extrabold leading-tight text-[#111827] md:text-5xl"><?php esc_html_e('Shop By Collection', 'dawp'); ?></h2>
        </div>
        <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="inline-flex min-h-[44px] items-center justify-center rounded-lg bg-[#0B1F3A] px-5 text-sm font-extrabold uppercase tracking-[0.06em] text-white transition hover:bg-[#B31942]"><?php esc_html_e('View All', 'dawp'); ?></a>
      </div>

      <div data-collection-slider>
        <div data-collection-track class="-mx-4 flex snap-x snap-mandatory gap-4 overflow-x-auto px-4 pb-4 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden md:mx-0 md:grid md:snap-none md:grid-cols-2 md:gap-5 md:overflow-visible md:px-0 md:pb-0 lg:grid-cols-3">
        <?php foreach ($categories as $category) : ?>
          <a href="<?php echo esc_url(home_url($category[3])); ?>" data-collection-slide class="group relative min-h-[320px] flex-[0_0_82%] snap-start overflow-hidden rounded-lg bg-[#0B1F3A] shadow-sm transition hover:-translate-y-1 hover:shadow-xl sm:flex-[0_0_58%] md:min-w-0 md:flex-auto">
            <?php echo dawp_theme_image(
                $img_base . $category[4],
                $category[0],
                600,
                750,
                array(array(360, 450), array(540, 675), array(600, 750)),
                '(max-width: 767px) calc(100vw - 32px), (max-width: 1023px) calc((100vw - 68px) / 2), 400px',
                array('class' => 'absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-105')
            ); ?>
            <div class="absolute inset-0 bg-black/35"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/25 to-transparent"></div>
            <div class="absolute bottom-0 left-0 right-0 p-6">
              <span class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#F3C86A] drop-shadow-[0_2px_3px_rgba(0,0,0,0.9)]"><?php echo esc_html($category[1]); ?></span>
              <h3 class="mt-2 text-2xl font-extrabold text-white drop-shadow-[0_3px_7px_rgba(0,0,0,0.9)]"><?php echo esc_html($category[0]); ?></h3>
              <p class="mt-2 max-w-[30rem] text-sm font-medium leading-6 text-white/95 drop-shadow-[0_2px_4px_rgba(0,0,0,0.9)]"><?php echo esc_html($category[2]); ?></p>
              <span class="mt-4 inline-flex text-xs font-extrabold uppercase tracking-[0.08em] text-white underline decoration-[#F3C86A] decoration-2 underline-offset-4 drop-shadow-[0_2px_3px_rgba(0,0,0,0.9)]"><?php esc_html_e('Shop Collection', 'dawp'); ?></span>
            </div>
          </a>
        <?php endforeach; ?>
        </div>

        <div class="mt-4 flex items-center justify-between gap-4 md:hidden">
          <button type="button" data-collection-prev class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-[#E5E7EB] bg-white text-[#0B1F3A] shadow-sm transition hover:border-[#B31942] hover:text-[#B31942] disabled:cursor-not-allowed disabled:opacity-40" aria-label="<?php esc_attr_e('Previous collection', 'dawp'); ?>">
            <span aria-hidden="true">&larr;</span>
          </button>
          <div class="flex items-center justify-center gap-2">
            <?php foreach ($categories as $index => $category) : ?>
              <button type="button" data-collection-dot data-active="<?php echo 0 === $index ? 'true' : 'false'; ?>" class="h-2 w-2 rounded-full bg-[#0B1F3A]/25 transition data-[active=true]:w-7 data-[active=true]:bg-[#B31942]" aria-label="<?php echo esc_attr(sprintf(__('Go to collection %d', 'dawp'), $index + 1)); ?>"></button>
            <?php endforeach; ?>
          </div>
          <button type="button" data-collection-next class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-[#E5E7EB] bg-white text-[#0B1F3A] shadow-sm transition hover:border-[#B31942] hover:text-[#B31942] disabled:cursor-not-allowed disabled:opacity-40" aria-label="<?php esc_attr_e('Next collection', 'dawp'); ?>">
            <span aria-hidden="true">&rarr;</span>
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-[#F7F2E8] py-12 md:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 md:px-6">
      <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
        <div>
          <p class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#B31942]"><?php esc_html_e('Best Sellers', 'dawp'); ?></p>
          <h2 class="mt-3 text-3xl font-extrabold leading-tight text-[#111827] md:text-5xl"><?php esc_html_e('Patriotic Favorites Made To Honor Service', 'dawp'); ?></h2>
        </div>
        <a href="<?php echo esc_url(home_url('/best-sellers/')); ?>" class="inline-flex min-h-[40px] self-start whitespace-nowrap rounded-lg bg-[#0B1F3A] px-4 text-xs font-extrabold uppercase tracking-[0.06em] text-white transition hover:bg-[#B31942] md:self-auto"><?php esc_html_e('View Best Sellers', 'dawp'); ?></a>
      </div>

      <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4">
        <?php if (!empty($products)) : ?>
          <?php foreach ($products as $index => $product) : ?>
            <article class="rounded-lg border border-[#E5E7EB] bg-white p-3 shadow-sm transition hover:-translate-y-1 hover:border-[#B31942] hover:shadow-xl md:p-4">
              <a href="<?php echo esc_url($product->get_permalink()); ?>" class="block">
                <div class="relative overflow-hidden rounded-lg bg-[#F7F8FA]">
                  <span class="absolute left-3 top-3 z-10 rounded bg-[#B31942] px-2 py-1 text-[10px] font-extrabold uppercase tracking-[0.08em] text-white"><?php echo $index < 3 ? esc_html__('Best Seller', 'dawp') : esc_html__('Customer Pick', 'dawp'); ?></span>
                  <?php echo dawp_product_responsive_image($product, 'aspect-[4/3] w-full object-cover', '(max-width: 767px) calc((100vw - 48px) / 2), (max-width: 1023px) calc((100vw - 72px) / 3), 300px'); ?>
                </div>
                <h3 class="mt-4 text-sm font-bold leading-snug text-[#111827] md:text-base"><?php echo esc_html($product->get_name()); ?></h3>
                <div class="mt-2 text-base font-extrabold text-[#B31942]"><?php echo wp_kses_post($product->get_price_html()); ?></div>
                <span class="mt-4 inline-flex min-h-[44px] w-full items-center justify-center rounded-lg bg-[#B31942] px-4 text-xs font-extrabold uppercase tracking-[0.06em] text-white transition hover:bg-[#921233]"><?php esc_html_e('Shop Now', 'dawp'); ?></span>
              </a>
            </article>
          <?php endforeach; ?>
        <?php else : ?>
          <?php foreach ($fallback_products as $product) : ?>
            <article class="rounded-lg border border-[#E5E7EB] bg-white p-3 shadow-sm transition hover:-translate-y-1 hover:border-[#B31942] hover:shadow-xl md:p-4">
              <a href="<?php echo esc_url(home_url($product[3])); ?>" class="block">
                <div class="relative overflow-hidden rounded-lg bg-[#F7F8FA]">
                  <span class="absolute left-3 top-3 z-10 rounded bg-[#B31942] px-2 py-1 text-[10px] font-extrabold uppercase tracking-[0.08em] text-white"><?php echo esc_html($product[1]); ?></span>
                  <?php echo dawp_theme_image($img_base . $product[4], $product[0], 600, 600, array(array(300, 300), array(600, 600)), '(max-width: 767px) calc((100vw - 48px) / 2), 300px', array('class' => 'aspect-[4/3] w-full object-cover')); ?>
                </div>
                <h3 class="mt-4 text-sm font-bold leading-snug text-[#111827] md:text-base"><?php echo esc_html($product[0]); ?></h3>
                <div class="mt-2 text-base font-extrabold text-[#B31942]"><?php echo esc_html($product[2]); ?></div>
                <span class="mt-4 inline-flex min-h-[44px] w-full items-center justify-center rounded-lg bg-[#B31942] px-4 text-xs font-extrabold uppercase tracking-[0.06em] text-white"><?php esc_html_e('Shop Now', 'dawp'); ?></span>
              </a>
            </article>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <div class="bg-white py-12 md:py-16 lg:py-20">
    <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-10 px-4 md:px-6 lg:grid-cols-2 lg:gap-12">
      <div>
        <p class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#B31942]"><?php esc_html_e('Personalized With Pride', 'dawp'); ?></p>
        <h2 class="mt-3 text-3xl font-extrabold leading-tight text-[#111827] md:text-5xl"><?php esc_html_e('Custom Apparel That Carries Name, Rank, And Service Years', 'dawp'); ?></h2>
        <p class="mt-5 text-base leading-8 text-[#6B7280]">
          <?php esc_html_e('Many GraphicTShirtStore products can be personalized with details that matter, from a veteran\'s name to service years, rank, or branch-inspired artwork.', 'dawp'); ?>
        </p>
        <ul class="mt-6 grid gap-3 text-sm font-extrabold text-[#111827] sm:grid-cols-2">
          <li class="flex min-h-[58px] items-center gap-3 rounded-lg border border-[#E5E7EB] bg-[#F9FAFB] px-4 py-3 shadow-sm">
            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded bg-[#B31942] text-white ring-4 ring-[#F7F2E8]" aria-hidden="true">
              <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20 13V7a2 2 0 0 0-2-2h-7.5L4 11.5a2.1 2.1 0 0 0 0 3L9.5 20a2.1 2.1 0 0 0 3 0L19 13.5a2 2 0 0 0 1-.5Z" />
                <path d="M15 9h.01" />
              </svg>
            </span>
            <span><?php esc_html_e('Custom name options', 'dawp'); ?></span>
          </li>
          <li class="flex min-h-[58px] items-center gap-3 rounded-lg border border-[#E5E7EB] bg-[#F9FAFB] px-4 py-3 shadow-sm">
            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded bg-[#0033A0] text-white ring-4 ring-[#F7F2E8]" aria-hidden="true">
              <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 15a6 6 0 1 0 0-12 6 6 0 0 0 0 12Z" />
                <path d="m9 14-1.5 7 4.5-2 4.5 2L15 14" />
                <path d="m12 6 1 2 2.2.3-1.6 1.5.4 2.2-2-1.1-2 1.1.4-2.2L8.8 8.3 11 8Z" />
              </svg>
            </span>
            <span><?php esc_html_e('Rank and service years', 'dawp'); ?></span>
          </li>
          <li class="flex min-h-[58px] items-center gap-3 rounded-lg border border-[#E5E7EB] bg-[#F9FAFB] px-4 py-3 shadow-sm">
            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded bg-[#B31942] text-white ring-4 ring-[#F7F2E8]" aria-hidden="true">
              <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 3.5 14.7 9l6 .9-4.3 4.2 1 6-5.4-2.8-5.4 2.8 1-6L3.3 9.9l6-.9Z" />
              </svg>
            </span>
            <span><?php esc_html_e('Branch-inspired designs', 'dawp'); ?></span>
          </li>
          <li class="flex min-h-[58px] items-center gap-3 rounded-lg border border-[#E5E7EB] bg-[#F9FAFB] px-4 py-3 shadow-sm">
            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded bg-[#0033A0] text-white ring-4 ring-[#F7F2E8]" aria-hidden="true">
              <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20 12v8a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-8" />
                <path d="M2 7h20v5H2Z" />
                <path d="M12 7v14" />
                <path d="M12 7H8.5A2.5 2.5 0 1 1 11 4.5Z" />
                <path d="M12 7h3.5A2.5 2.5 0 1 0 13 4.5Z" />
              </svg>
            </span>
            <span><?php esc_html_e('Gift-ready for veterans and families', 'dawp'); ?></span>
          </li>
        </ul>
        <a href="<?php echo esc_url(home_url('/product-category/veteran-tribute/')); ?>" class="mt-8 inline-flex min-h-[48px] items-center justify-center rounded-lg bg-[#B31942] px-6 text-sm font-extrabold uppercase tracking-[0.06em] text-white transition hover:bg-[#921233]"><?php esc_html_e('Shop Custom Gifts', 'dawp'); ?></a>
        <p class="mt-5 rounded-lg border border-[#E5E7EB] bg-[#F7F2E8] p-4 text-xs leading-6 text-[#6B7280]">
          <?php esc_html_e('Please review all personalization details carefully before placing your order. Personalized items may require additional production time and may not be eligible for return unless defective, damaged, incorrect, or required by law.', 'dawp'); ?>
        </p>
      </div>
      <div class="overflow-hidden rounded-lg bg-[#F7F2E8] p-3 shadow-xl ring-1 ring-[#E5E7EB]">
        <?php echo dawp_theme_image($img_base . 'gts-feature-bomber.png', __('Custom name bomber jacket with patriotic details', 'dawp'), 600, 750, array(array(360, 450), array(540, 675), array(600, 750)), '(max-width: 1023px) calc(100vw - 56px), 600px', array('class' => 'aspect-[4/5] w-full rounded-lg object-cover')); ?>
      </div>
    </div>
  </div>

  <div class="bg-[#F7F2E8] py-12 md:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 md:px-6">
      <div class="mb-8 max-w-3xl">
        <p class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#B31942]"><?php esc_html_e('Gift By Occasion', 'dawp'); ?></p>
        <h2 class="mt-3 text-3xl font-extrabold leading-tight text-[#111827] md:text-5xl"><?php esc_html_e('Meaningful Patriotic Gifts For Moments That Matter', 'dawp'); ?></h2>
      </div>
      <div class="grid grid-cols-2 gap-3 md:gap-5 md:grid-cols-2 lg:grid-cols-3">
        <?php foreach ($occasions as $occasion) : ?>
          <a href="<?php echo esc_url(home_url($occasion[2])); ?>" class="rounded-lg border border-[#E5E7EB] bg-white p-4 shadow-sm transition hover:-translate-y-1 hover:border-[#B31942] hover:shadow-xl md:p-6">
            <span class="inline-flex h-10 w-10 items-center justify-center rounded-lg bg-[#0B1F3A] text-xs font-extrabold text-white md:h-12 md:w-12 md:text-sm"><?php echo esc_html($occasion[3]); ?></span>
            <h3 class="mt-4 text-base font-extrabold leading-snug text-[#111827] md:mt-5 md:text-xl"><?php echo esc_html($occasion[0]); ?></h3>
            <p class="mt-2 text-xs leading-6 text-[#6B7280] md:mt-3 md:text-sm md:leading-7"><?php echo esc_html($occasion[1]); ?></p>
            <span class="mt-4 inline-flex text-xs font-extrabold uppercase tracking-[0.08em] text-[#B31942]"><?php esc_html_e('Shop Gifts', 'dawp'); ?></span>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <div class="bg-[#0B1F3A] py-12 text-white md:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 text-center md:px-6">
      <p class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#C6A15B]"><?php esc_html_e('Customer Tributes', 'dawp'); ?></p>
      <h2 class="mx-auto mt-3 max-w-3xl text-3xl font-extrabold leading-tight md:text-5xl"><?php esc_html_e('Gift Moments Built Around Service, Memory, And Pride', 'dawp'); ?></h2>
      <p class="mx-auto mt-5 max-w-2xl text-sm leading-7 text-white/75 md:text-base"><?php esc_html_e('Many customers choose personalized veteran apparel as a way to honor service, remember family legacy, and give a gift with meaning.', 'dawp'); ?></p>
      <div class="mt-8 grid grid-cols-1 gap-5 md:grid-cols-3">
        <?php foreach ($tributes as $tribute) : ?>
          <blockquote class="rounded-lg bg-white p-6 text-left text-base font-semibold leading-7 text-[#111827] shadow-xl">
            <?php echo esc_html($tribute); ?>
          </blockquote>
        <?php endforeach; ?>
      </div>
      <a href="<?php echo esc_url(home_url('/product-category/veteran-tribute/')); ?>" class="mt-8 inline-flex min-h-[48px] items-center justify-center rounded-lg bg-[#B31942] px-6 text-sm font-extrabold uppercase tracking-[0.06em] text-white transition hover:bg-[#921233]"><?php esc_html_e('Shop Meaningful Gifts', 'dawp'); ?></a>
    </div>
  </div>

  <div class="bg-white py-12 md:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 md:px-6">
      <div data-trust-slider>
        <div data-trust-track class="-mx-4 flex snap-x snap-mandatory gap-4 overflow-x-auto px-4 pb-4 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden md:mx-0 md:grid md:snap-none md:grid-cols-2 md:gap-5 md:overflow-visible md:px-0 md:pb-0 lg:grid-cols-4">
          <?php foreach ($trust_cards as $trust_card) : ?>
            <article data-trust-slide class="flex-[0_0_82%] snap-start rounded-lg border border-[#E5E7EB] bg-white p-6 shadow-sm sm:flex-[0_0_58%] md:min-w-0 md:flex-auto">
              <span class="inline-flex h-11 w-11 items-center justify-center rounded-lg bg-[#0B1F3A] text-xs font-extrabold uppercase text-white"><?php echo esc_html(substr($trust_card[2], 0, 2)); ?></span>
              <h3 class="mt-5 text-xl font-extrabold text-[#111827]"><?php echo esc_html($trust_card[0]); ?></h3>
              <p class="mt-3 text-sm leading-7 text-[#6B7280]"><?php echo esc_html($trust_card[1]); ?></p>
            </article>
          <?php endforeach; ?>
        </div>

        <div class="mt-4 flex items-center justify-between gap-4 md:hidden">
          <button type="button" data-trust-prev class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-[#E5E7EB] bg-white text-[#0B1F3A] shadow-sm transition hover:border-[#B31942] hover:text-[#B31942] disabled:cursor-not-allowed disabled:opacity-40" aria-label="<?php esc_attr_e('Previous trust item', 'dawp'); ?>">
            <span aria-hidden="true">&larr;</span>
          </button>
          <div class="flex items-center justify-center gap-2">
            <?php foreach ($trust_cards as $index => $trust_card) : ?>
              <button type="button" data-trust-dot data-active="<?php echo 0 === $index ? 'true' : 'false'; ?>" class="h-2 w-2 rounded-full bg-[#0B1F3A]/25 transition data-[active=true]:w-7 data-[active=true]:bg-[#B31942]" aria-label="<?php echo esc_attr(sprintf(__('Go to trust item %d', 'dawp'), $index + 1)); ?>"></button>
            <?php endforeach; ?>
          </div>
          <button type="button" data-trust-next class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-[#E5E7EB] bg-white text-[#0B1F3A] shadow-sm transition hover:border-[#B31942] hover:text-[#B31942] disabled:cursor-not-allowed disabled:opacity-40" aria-label="<?php esc_attr_e('Next trust item', 'dawp'); ?>">
            <span aria-hidden="true">&rarr;</span>
          </button>
        </div>
      </div>

      <div class="mt-12 grid grid-cols-1 gap-5 lg:grid-cols-2">
        <div class="rounded-lg bg-[#F7F2E8] p-8 md:p-10">
          <p class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#B31942]"><?php esc_html_e('GraphicTShirtStore', 'dawp'); ?></p>
          <h2 class="mt-3 text-3xl font-extrabold leading-tight text-[#111827] md:text-4xl"><?php esc_html_e('Patriotic Apparel And Gifts Made To Honor Service', 'dawp'); ?></h2>
          <p class="mt-5 text-base leading-8 text-[#6B7280]"><?php esc_html_e('GraphicTShirtStore is a patriotic apparel and custom gift brand created for veterans, military families, and proud Americans who want meaningful products that carry service, legacy, and American pride.', 'dawp'); ?></p>
          <a href="<?php echo esc_url(home_url('/about-us/')); ?>" class="mt-6 inline-flex min-h-[44px] items-center justify-center rounded-lg bg-[#0B1F3A] px-5 text-sm font-extrabold uppercase tracking-[0.06em] text-white transition hover:bg-[#B31942]"><?php esc_html_e('Learn More', 'dawp'); ?></a>
        </div>
        <div class="rounded-lg border border-[#E5E7EB] bg-white p-8 shadow-sm md:p-10">
          <h2 class="text-3xl font-extrabold leading-tight text-[#111827] md:text-4xl"><?php esc_html_e('Get New Patriotic Drops And Gift Ideas', 'dawp'); ?></h2>
          <form id="newsletter-form" class="mt-6 flex flex-col gap-3 sm:flex-row">
            <label class="sr-only" for="newsletter-email"><?php esc_html_e('Email address', 'dawp'); ?></label>
            <input id="newsletter-email" name="email" type="email" required placeholder="<?php esc_attr_e('Enter your email', 'dawp'); ?>" class="min-h-[48px] flex-1 rounded-lg border border-[#E5E7EB] px-4 text-sm outline-none focus:border-[#C6A15B] focus:ring-2 focus:ring-[#C6A15B]">
            <button type="submit" class="inline-flex min-h-[48px] items-center justify-center rounded-lg bg-[#B31942] px-6 text-sm font-extrabold uppercase tracking-[0.06em] text-white transition hover:bg-[#921233]"><?php esc_html_e('Sign Up', 'dawp'); ?></button>
          </form>
          <p id="newsletter-msg" class="mt-4 hidden text-sm font-semibold"></p>
          <p class="mt-5 text-xs leading-6 text-[#6B7280]"><?php esc_html_e('Veteran-inspired designs are tributes to service. We respectfully honor all who serve and have served.', 'dawp'); ?></p>
        </div>
      </div>
    </div>
  </div>
</section>
