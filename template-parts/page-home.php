<?php
$pw_products = array();

if (function_exists('wc_get_products')) {
    $pw_products = wc_get_products(array(
        'status'  => 'publish',
        'limit'   => 8,
        'orderby' => 'popularity',
        'order'   => 'DESC',
    ));

    if (empty($pw_products)) {
        $pw_products = wc_get_products(array(
            'status'  => 'publish',
            'limit'   => 8,
            'orderby' => 'date',
            'order'   => 'DESC',
        ));
    }
}

if (! function_exists('pw_home_new_image')) {
    function pw_home_new_image($filename) {
        return get_template_directory_uri() . '/assets/img/Image%20New/' . rawurlencode($filename);
    }
}

if (! function_exists('pw_home_rank_image')) {
    function pw_home_rank_image($filename) {
        return get_template_directory_uri() . '/assets/img/Image%20New/Image%20rank/' . rawurlencode($filename);
    }
}

$pw_collections = array(
    array('Best Sellers', 'Customer-favorite patriotic apparel and veteran-inspired gifts.', 'best-sellers', '/product-category/best-sellers/', 'image copy 7.png'),
    array('Veteran Polo Shirts', 'Custom polos made to carry a veteran\'s name, service years, and earned pride.', 'veteran-polo-shirts', '/product-category/veteran-polo-shirts/', 'image copy 3.png'),
    array('Veteran Hats', 'Patriotic caps and veteran-inspired designs for everyday pride.', 'veteran-hats', '/product-category/veteran-hats/', 'image copy 9.png'),
    array('America 250 Collection', 'Commemorative red, white, and blue pieces for America\'s 250th anniversary.', 'america-250-collection', '/product-category/america-250-collection/', 'image copy.png'),
    array('Custom Military Gifts', 'Personalized gifts for fathers, husbands, grandfathers, and proud service families.', 'custom-military-gifts', '/product-category/custom-military-gifts/', 'image copy 8.png'),
    array('Patriotic Accessories', 'Mugs, caps, and everyday accessories made for proud Americans.', 'patriotic-accessories', '/product-category/patriotic-accessories/', 'image copy 12.png'),
);

$pw_occasions = array(
    array('Father\'s Day Gifts', 'A meaningful gift for the veteran who carries the story.', '/product-category/fathers-day-gifts/'),
    array('Veterans Day Gifts', 'Personalized apparel made to honor service years and family legacy.', '/product-category/veterans-day-gifts/'),
    array('Memorial Day Gifts', 'Respectful patriotic pieces for remembrance and service legacy.', '/product-category/memorial-day-gifts/'),
    array('Independence Day Gifts', 'Red, white, and blue apparel for proud American moments.', '/product-category/independence-day-gifts/'),
    array('America 250th Anniversary', 'Commemorative apparel and custom gifts for the 250th milestone.', '/product-category/america-250-collection/'),
    array('Christmas Gifts For Veterans', 'Gift-ready veteran-inspired apparel, hats, mugs, and accessories.', '/product-category/christmas-gifts-for-veterans/'),
);

$pw_personalized_images = array(
    array('image.png', 'Custom apparel design for a military branch'),
    array('image copy.png', 'Personalized military branch apparel design'),
    array('image copy 2.png', 'Military branch custom apparel with service details'),
    array('image copy 3.png', 'Branch-inspired personalized veteran apparel'),
    array('image copy 4.png', 'Custom military branch design for veterans'),
);
?>

<main class="bg-[#FFFFFF] text-[#111827]">
  <section class="relative overflow-hidden bg-[#0B1F3A] text-white">
    <div class="absolute inset-0 bg-gradient-to-br from-[#0B1F3A] via-[#153866] to-[#B31942] opacity-95"></div>
    <div class="absolute inset-0 opacity-20">
      <div class="h-full w-full bg-[linear-gradient(120deg,transparent_0_35%,rgba(255,255,255,.18)_35%_42%,transparent_42%_100%)]"></div>
    </div>

    <div class="relative mx-auto grid max-w-7xl grid-cols-1 items-center gap-10 px-4 py-12 md:px-6 md:py-16 lg:grid-cols-2 lg:py-20">
      <div>
        <p class="inline-flex rounded-lg border border-[#C6A15B]/40 bg-white/10 px-4 py-2 text-xs font-extrabold uppercase tracking-[0.16em] text-[#C6A15B]">
          Patriotic Apparel & Custom Gifts
        </p>
        <h1 class="mt-5 max-w-3xl text-4xl font-extrabold leading-none md:text-6xl lg:text-7xl">
          Honor The Service. Wear The Legacy.
        </h1>
        <p class="mt-6 max-w-xl text-base leading-7 text-white/80 md:text-lg">
          Shop veteran polos, patriotic hats, mugs, accessories, and custom America-inspired gifts made for veterans, military families, and proud Americans.
        </p>

        <div class="mt-8 flex flex-col gap-3 sm:flex-row">
          <a href="<?php echo esc_url(home_url('/product-category/best-sellers/')); ?>" class="inline-flex min-h-[48px] items-center justify-center rounded-lg bg-[#B31942] px-6 text-sm font-extrabold uppercase tracking-[0.06em] text-white transition hover:bg-[#921233]">
            Shop Best Sellers
          </a>
          <a href="<?php echo esc_url(home_url('/product-category/custom-military-gifts/')); ?>" class="inline-flex min-h-[48px] items-center justify-center rounded-lg border border-white/40 px-6 text-sm font-extrabold uppercase tracking-[0.06em] text-white transition hover:bg-white hover:text-[#0B1F3A]">
            Customize Yours
          </a>
        </div>

        <div class="mt-7 grid grid-cols-1 gap-3 text-sm text-white/75 sm:grid-cols-3">
          <span class="rounded-lg border border-white/15 bg-white/10 p-3">Secure checkout</span>
          <span class="rounded-lg border border-white/15 bg-white/10 p-3">Tracking included</span>
          <span class="rounded-lg border border-white/15 bg-white/10 p-3">Made with care</span>
        </div>
      </div>

      <div class="relative">
        <div class="overflow-hidden rounded-lg border border-white/15 bg-white p-3 shadow-2xl">
          <?php echo dawp_theme_image(
                'assets/img/Image New/image.png',
                'Proudlywear patriotic apparel and custom gifts display',
                720,
                900,
                array(
                    array(360, 450),
                    array(540, 675),
                    array(720, 900),
                    array(960, 1200),
                ),
                '(max-width: 1023px) calc(100vw - 56px), 600px',
                array('class' => 'aspect-[4/5] w-full rounded-lg object-cover', 'loading' => 'eager')
            ); ?>
        </div>
        <div class="absolute -bottom-6 left-4 right-4 rounded-lg border border-[#C6A15B]/30 bg-white p-5 text-[#111827] shadow-xl md:left-auto md:right-8 md:w-72">
          <p class="text-xs font-extrabold uppercase tracking-[0.14em] text-[#B31942]">Personalized Pride</p>
          <h3 class="mt-2 text-xl font-extrabold">Name. Rank. Service Years.</h3>
          <p class="mt-2 text-sm leading-6 text-[#6B7280]">Meaningful details that help carry service and legacy forward.</p>
        </div>
      </div>
    </div>

    <div class="relative border-t border-white/10 bg-[#081A33]">
      <div class="mx-auto grid max-w-7xl grid-cols-2 gap-2 px-4 py-4 md:grid-cols-4 md:px-6">
        <a href="<?php echo esc_url(home_url('/product-category/veteran-polo-shirts/')); ?>" class="rounded-lg bg-white/10 px-4 py-3 text-center text-sm font-bold text-white transition hover:bg-[#B31942]">Veteran Polos</a>
        <a href="<?php echo esc_url(home_url('/product-category/veteran-hats/')); ?>" class="rounded-lg bg-white/10 px-4 py-3 text-center text-sm font-bold text-white transition hover:bg-[#B31942]">Veteran Hats</a>
        <a href="<?php echo esc_url(home_url('/product-category/america-250-collection/')); ?>" class="rounded-lg bg-white/10 px-4 py-3 text-center text-sm font-bold text-white transition hover:bg-[#B31942]">America 250</a>
        <a href="<?php echo esc_url(home_url('/product-category/custom-military-gifts/')); ?>" class="rounded-lg bg-white/10 px-4 py-3 text-center text-sm font-bold text-white transition hover:bg-[#B31942]">Custom Gifts</a>
      </div>
    </div>
  </section>

  <section class="bg-[#F7F2E8] py-12 md:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 md:px-6">
      <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
        <div>
          <p class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#B31942]">Shop By Collection</p>
          <h2 class="mt-3 text-3xl font-extrabold text-[#111827] md:text-5xl">Patriotic gifts made easy to shop</h2>
        </div>
        <p class="max-w-xl text-sm leading-7 text-[#6B7280] md:text-base">Browse by product type, occasion, or personalized gift intent.</p>
      </div>

      <div class="relative" data-collection-slider>
        <div class="overflow-hidden">
          <div class="-mx-4 flex snap-x snap-mandatory gap-5 overflow-x-auto scroll-smooth px-4 pb-5 [scrollbar-width:none] md:mx-0 md:grid md:grid-cols-2 md:overflow-visible md:px-0 md:pb-0 lg:grid-cols-3 [&::-webkit-scrollbar]:hidden" data-collection-track>
            <?php foreach ($pw_collections as $index => $item) : ?>
              <a href="<?php echo esc_url(home_url($item[3])); ?>" class="group flex min-w-0 shrink-0 basis-[86%] snap-start overflow-hidden rounded-lg bg-white shadow-sm ring-1 ring-[#E5E7EB] transition hover:-translate-y-1 hover:shadow-xl sm:basis-[58%] md:basis-auto md:snap-none" data-collection-slide>
                <div class="flex w-full flex-col">
                  <div class="relative aspect-[4/3] overflow-hidden bg-[#0B1F3A]">
                    <?php echo dawp_theme_image(
                          'assets/img/Image New/' . $item[4],
                          $item[0],
                          640,
                          480,
                          array(
                              array(320, 240),
                              array(480, 360),
                              array(640, 480),
                              array(800, 600),
                          ),
                          '(max-width: 639px) 86vw, (max-width: 767px) 58vw, (max-width: 1023px) calc((100vw - 68px) / 2), 390px',
                          array('class' => 'h-full w-full object-cover transition duration-500 group-hover:scale-105')
                      ); ?>
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0B1F3A]/90 via-[#0B1F3A]/20 to-transparent"></div>
                    <span class="absolute bottom-4 left-4 rounded-lg bg-[#B31942] px-3 py-1 text-xs font-extrabold uppercase tracking-wide text-white">Shop Collection</span>
                  </div>
                  <div class="flex flex-1 flex-col p-5">
                    <h3 class="text-xl font-extrabold text-[#111827]"><?php echo esc_html($item[0]); ?></h3>
                    <p class="mt-2 text-sm leading-6 text-[#6B7280]"><?php echo esc_html($item[1]); ?></p>
                  </div>
                </div>
              </a>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="mt-1 flex items-center justify-between gap-4 md:hidden">
          <div class="flex items-center gap-2" data-collection-dots aria-label="Collection slides">
            <?php foreach ($pw_collections as $index => $item) : ?>
              <button type="button" class="h-2.5 w-2.5 rounded-full bg-[#0B1F3A]/25 transition data-[active=true]:w-8 data-[active=true]:bg-[#B31942]" data-collection-dot data-slide-index="<?php echo esc_attr($index); ?>" aria-label="<?php echo esc_attr(sprintf('Go to %s', $item[0])); ?>"></button>
            <?php endforeach; ?>
          </div>
          <div class="flex shrink-0 items-center gap-2">
            <button type="button" class="inline-flex h-11 w-11 items-center justify-center rounded-lg border border-[#E5E7EB] bg-white text-2xl font-bold leading-none text-[#0B1F3A] shadow-sm transition hover:bg-[#0B1F3A] hover:text-white disabled:cursor-not-allowed disabled:opacity-40" data-collection-prev aria-label="Previous collection slide">&lsaquo;</button>
            <button type="button" class="inline-flex h-11 w-11 items-center justify-center rounded-lg border border-[#E5E7EB] bg-white text-2xl font-bold leading-none text-[#0B1F3A] shadow-sm transition hover:bg-[#0B1F3A] hover:text-white disabled:cursor-not-allowed disabled:opacity-40" data-collection-next aria-label="Next collection slide">&rsaquo;</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-white py-12 md:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 md:px-6">
      <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
        <div>
          <p class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#B31942]">Best Sellers</p>
          <h2 class="mt-3 text-3xl font-extrabold text-[#111827] md:text-5xl">Patriotic favorites made to honor service and pride</h2>
        </div>
        <a href="<?php echo esc_url(home_url('/product-category/best-sellers/')); ?>" class="inline-flex min-h-[44px] shrink-0 items-center justify-center whitespace-nowrap rounded-lg bg-[#0B1F3A] px-5 text-sm font-extrabold uppercase tracking-[0.06em] text-white transition hover:bg-[#B31942]">View All</a>
      </div>

      <?php if (! empty($pw_products)) : ?>
        <div class="grid grid-cols-2 gap-4 md:grid-cols-3 md:gap-5 lg:grid-cols-4">
          <?php foreach ($pw_products as $product) : ?>
            <article class="group overflow-hidden rounded-lg border border-[#E5E7EB] bg-white transition hover:-translate-y-1 hover:shadow-xl">
              <a href="<?php echo esc_url($product->get_permalink()); ?>" class="block overflow-hidden bg-[#F7F2E8]">
                <?php echo dawp_product_responsive_image(
                    $product,
                    'aspect-square w-full object-cover transition duration-500 group-hover:scale-105',
                    '(max-width: 767px) calc((100vw - 48px) / 2), (max-width: 1023px) calc((100vw - 72px) / 3), 300px'
                ); ?>
              </a>
              <div class="p-3 md:p-4">
                <span class="rounded-lg bg-[#F7F2E8] px-2 py-1 text-[10px] font-extrabold uppercase tracking-wide text-[#B31942]">Best Seller</span>
                <h3 class="mt-2 line-clamp-2 min-h-[40px] text-sm font-bold leading-snug text-[#111827] md:text-base">
                  <a href="<?php echo esc_url($product->get_permalink()); ?>"><?php echo esc_html($product->get_name()); ?></a>
                </h3>
                <div class="mt-2 text-base font-extrabold text-[#B31942]"><?php echo wp_kses_post($product->get_price_html()); ?></div>
                <a href="<?php echo esc_url($product->get_permalink()); ?>" class="mt-3 inline-flex min-h-[42px] w-full items-center justify-center rounded-lg bg-[#B31942] px-3 text-xs font-extrabold uppercase tracking-[0.06em] text-white transition hover:bg-[#0B1F3A] md:text-sm">View Product</a>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </section>

  <section class="bg-[#0B1F3A] py-10 text-white md:py-12 lg:py-14">
    <div class="mx-auto max-w-7xl px-4 md:px-6">
      <div class="grid grid-cols-1 items-start gap-6 lg:grid-cols-[minmax(0,1fr)_420px]">
        <div class="max-w-3xl">
          <p class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#C6A15B]">Personalized With Pride</p>
          <h2 class="mt-3 text-3xl font-extrabold leading-tight md:text-4xl">Custom apparel that carries name, rank, and service years.</h2>
          <p class="mt-4 text-base leading-7 text-white/80">Many Proudlywear products can be personalized with details that matter. Keep the styling respectful, gift-ready, and clear about production time for custom items.</p>
          <a href="<?php echo esc_url(home_url('/product-category/custom-military-gifts/')); ?>" class="mt-5 inline-flex min-h-[46px] items-center justify-center rounded-lg bg-[#B31942] px-6 text-sm font-extrabold uppercase tracking-[0.06em] text-white transition hover:bg-white hover:text-[#0B1F3A]">Shop Custom Gifts</a>
        </div>
        <div class="grid grid-cols-2 gap-2 sm:gap-3">
          <div class="rounded-lg border border-white/15 bg-white/10 p-3 text-sm sm:p-4 sm:text-base"><strong>Custom Name Options</strong><span class="mt-1 block text-xs text-white/70 sm:text-sm">Make the gift feel personal.</span></div>
          <div class="rounded-lg border border-white/15 bg-white/10 p-3 text-sm sm:p-4 sm:text-base"><strong>Rank & Service Years</strong><span class="mt-1 block text-xs text-white/70 sm:text-sm">Carry details that matter.</span></div>
          <div class="rounded-lg border border-white/15 bg-white/10 p-3 text-sm sm:p-4 sm:text-base"><strong>Branch-Inspired Designs</strong><span class="mt-1 block text-xs text-white/70 sm:text-sm">Respectful tribute styling.</span></div>
          <div class="rounded-lg border border-white/15 bg-white/10 p-3 text-sm sm:p-4 sm:text-base"><strong>Gift-Ready Meaning</strong><span class="mt-1 block text-xs text-white/70 sm:text-sm">For veterans and families.</span></div>
        </div>
      </div>
      <div class="relative mt-7" data-branch-slider>
        <div class="overflow-hidden">
          <div class="-mx-4 flex snap-x snap-mandatory gap-3 overflow-x-auto scroll-smooth px-4 pb-5 [scrollbar-width:none] md:mx-0 md:grid md:grid-cols-3 md:overflow-visible md:px-0 md:pb-0 lg:grid-cols-5 [&::-webkit-scrollbar]:hidden" data-branch-track>
            <?php foreach ($pw_personalized_images as $index => $image) : ?>
              <div class="min-w-0 shrink-0 basis-[72%] snap-start overflow-hidden rounded-lg border border-white/15 bg-white/10 p-2 sm:basis-[44%] md:basis-auto md:snap-none" data-branch-slide>
                <?php echo dawp_theme_image(
                    'assets/img/Image New/Image rank/' . $image[0],
                    $image[1],
                    320,
                    160,
                    array(
                        array(220, 110),
                        array(320, 160),
                        array(480, 240),
                    ),
                    '(max-width: 639px) 72vw, (max-width: 767px) 44vw, (max-width: 1023px) calc((100vw - 72px) / 3), 230px',
                    array('class' => 'h-40 w-full rounded-lg object-contain md:h-36 lg:h-40')
                ); ?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="mt-1 flex items-center justify-between gap-4 md:hidden">
          <div class="flex items-center gap-2" data-branch-dots aria-label="Branch slides">
            <?php foreach ($pw_personalized_images as $index => $image) : ?>
              <button type="button" class="h-2.5 w-2.5 rounded-full bg-white/25 transition data-[active=true]:w-8 data-[active=true]:bg-[#C6A15B]" data-branch-dot data-slide-index="<?php echo esc_attr($index); ?>" aria-label="<?php echo esc_attr(sprintf('Go to branch design %d', $index + 1)); ?>"></button>
            <?php endforeach; ?>
          </div>
          <div class="flex shrink-0 items-center gap-2">
            <button type="button" class="inline-flex h-11 w-11 items-center justify-center rounded-lg border border-white/15 bg-white/10 text-2xl font-bold leading-none text-white shadow-sm transition hover:bg-white hover:text-[#0B1F3A] disabled:cursor-not-allowed disabled:opacity-40" data-branch-prev aria-label="Previous branch slide">&lsaquo;</button>
            <button type="button" class="inline-flex h-11 w-11 items-center justify-center rounded-lg border border-white/15 bg-white/10 text-2xl font-bold leading-none text-white shadow-sm transition hover:bg-white hover:text-[#0B1F3A] disabled:cursor-not-allowed disabled:opacity-40" data-branch-next aria-label="Next branch slide">&rsaquo;</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-[#F7F2E8] py-12 md:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 md:px-6">
      <div class="mb-8 text-center">
        <p class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#B31942]">Gift By Occasion</p>
        <h2 class="mt-3 text-3xl font-extrabold text-[#111827] md:text-5xl">Meaningful patriotic gifts for moments that matter</h2>
      </div>
      <div class="relative" data-occasion-slider>
        <div class="overflow-hidden">
          <div class="-mx-4 flex snap-x snap-mandatory gap-5 overflow-x-auto scroll-smooth px-4 pb-5 [scrollbar-width:none] md:mx-0 md:grid md:grid-cols-2 md:overflow-visible md:px-0 md:pb-0 lg:grid-cols-3 [&::-webkit-scrollbar]:hidden" data-occasion-track>
            <?php foreach ($pw_occasions as $index => $item) : ?>
              <a href="<?php echo esc_url(home_url($item[2])); ?>" class="flex min-w-0 shrink-0 basis-[86%] snap-start flex-col rounded-lg border border-[#E5E7EB] bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-xl sm:basis-[58%] md:basis-auto md:snap-none" data-occasion-slide>
                <span class="inline-flex h-10 w-10 items-center justify-center rounded-lg bg-[#0B1F3A] text-sm font-extrabold text-white">US</span>
                <h3 class="mt-4 text-xl font-extrabold text-[#111827]"><?php echo esc_html($item[0]); ?></h3>
                <p class="mt-2 text-sm leading-6 text-[#6B7280]"><?php echo esc_html($item[1]); ?></p>
                <span class="mt-4 inline-flex text-sm font-extrabold uppercase tracking-[0.06em] text-[#B31942]">Shop Gifts</span>
              </a>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="mt-1 flex items-center justify-between gap-4 md:hidden">
          <div class="flex items-center gap-2" data-occasion-dots aria-label="Occasion slides">
            <?php foreach ($pw_occasions as $index => $item) : ?>
              <button type="button" class="h-2.5 w-2.5 rounded-full bg-[#0B1F3A]/25 transition data-[active=true]:w-8 data-[active=true]:bg-[#B31942]" data-occasion-dot data-slide-index="<?php echo esc_attr($index); ?>" aria-label="<?php echo esc_attr(sprintf('Go to %s', $item[0])); ?>"></button>
            <?php endforeach; ?>
          </div>
          <div class="flex shrink-0 items-center gap-2">
            <button type="button" class="inline-flex h-11 w-11 items-center justify-center rounded-lg border border-[#E5E7EB] bg-white text-2xl font-bold leading-none text-[#0B1F3A] shadow-sm transition hover:bg-[#0B1F3A] hover:text-white disabled:cursor-not-allowed disabled:opacity-40" data-occasion-prev aria-label="Previous occasion slide">&lsaquo;</button>
            <button type="button" class="inline-flex h-11 w-11 items-center justify-center rounded-lg border border-[#E5E7EB] bg-white text-2xl font-bold leading-none text-[#0B1F3A] shadow-sm transition hover:bg-[#0B1F3A] hover:text-white disabled:cursor-not-allowed disabled:opacity-40" data-occasion-next aria-label="Next occasion slide">&rsaquo;</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-white py-12 md:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 md:px-6">
      <div class="grid grid-cols-2 gap-3 sm:gap-4 md:grid-cols-2 lg:grid-cols-4">
        <div class="rounded-lg border border-[#E5E7EB] bg-[#F7F2E8] p-3 sm:p-5"><h3 class="text-base font-extrabold leading-snug sm:text-lg">Secure Checkout</h3><p class="mt-2 text-sm leading-6 text-[#6B7280]">A safe and simple checkout experience for every order.</p></div>
        <div class="rounded-lg border border-[#E5E7EB] bg-[#F7F2E8] p-3 sm:p-5"><h3 class="text-base font-extrabold leading-snug sm:text-lg">Tracking Included</h3><p class="mt-2 text-sm leading-6 text-[#6B7280]">Tracking details are provided once your order ships.</p></div>
        <div class="rounded-lg border border-[#E5E7EB] bg-[#F7F2E8] p-3 sm:p-5"><h3 class="text-base font-extrabold leading-snug sm:text-lg">30-Day Returns</h3><p class="mt-2 text-sm leading-6 text-[#6B7280]">Eligible non-personalized items may be returned within 30 days of delivery.</p></div>
        <div class="rounded-lg border border-[#E5E7EB] bg-[#F7F2E8] p-3 sm:p-5"><h3 class="text-base font-extrabold leading-snug sm:text-lg">Personalization Support</h3><p class="mt-2 text-sm leading-6 text-[#6B7280]">Review your custom details carefully before ordering.</p></div>
      </div>

      <div class="mt-10 grid grid-cols-1 gap-8 rounded-lg bg-[#0B1F3A] p-6 text-white md:p-8 lg:grid-cols-2 lg:p-10">
        <div>
          <p class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#C6A15B]">About Proudlywear</p>
          <h2 class="mt-3 text-3xl font-extrabold md:text-5xl">Patriotic apparel and gifts made to honor service.</h2>
          <p class="mt-4 text-base leading-7 text-white/75">A patriotic POD apparel and custom gift store for veterans, military families, and proud Americans who want meaningful products that carry service, legacy, and American pride.</p>
        </div>
        <div class="rounded-lg border border-white/15 bg-white/10 p-6">
          <h3 class="text-2xl font-extrabold">Get new patriotic drops and gift ideas</h3>
          <p class="mt-3 text-sm leading-6 text-white/75">Join for updates on veteran-inspired apparel, America 250 designs, and meaningful gift ideas.</p>
          <form id="newsletter-form" class="mt-6 flex flex-col gap-3 sm:flex-row">
            <input type="email" placeholder="Enter your email" required class="min-h-[48px] flex-1 rounded-lg border border-white/20 bg-white px-4 text-sm text-[#111827] outline-none focus:ring-2 focus:ring-[#C6A15B]" aria-label="Email address">
            <button type="submit" class="min-h-[48px] rounded-lg bg-[#B31942] px-6 text-sm font-extrabold uppercase tracking-[0.06em] text-white transition hover:bg-white hover:text-[#0B1F3A]">Sign Up</button>
          </form>
          <p id="newsletter-msg" class="mt-3 hidden text-sm text-white/75" aria-live="polite"></p>
        </div>
      </div>
    </div>
  </section>
</main>
