<?php
/**
 * Template Part: About Us
 *
 * About page for GraphicTShirtStore.
 */

defined('ABSPATH') || exit;

$img_base = 'assets/img/home/';

$about_values = array(
    array(
        'title' => __('Respectful Tribute', 'dawp'),
        'copy'  => __('We use veteran-inspired language and patriotic artwork with care, avoiding official claims, political slogans, or borrowed military marks.', 'dawp'),
        'abbr'  => 'RT',
    ),
    array(
        'title' => __('Personal Details Matter', 'dawp'),
        'copy'  => __('Names, ranks, branches, service years, and family messages help turn everyday apparel into a gift with real meaning.', 'dawp'),
        'abbr'  => 'PD',
    ),
    array(
        'title' => __('Easy Gift Shopping', 'dawp'),
        'copy'  => __('Collections are organized by product, occasion, and gift intent so shoppers can move from idea to order without friction.', 'dawp'),
        'abbr'  => 'EG',
    ),
);

$about_steps = array(
    array('Choose', __('Pick a graphic tee, hoodie, bomber jacket, hat, mug, patch, or patriotic accessory.', 'dawp')),
    array('Personalize', __('Add the custom service-inspired details that make the piece yours.', 'dawp')),
    array('Review', __('Check names, dates, branch text, and custom fields carefully before checkout.', 'dawp')),
    array('Wear Or Gift', __('Receive a made-with-care item ready for daily pride or a meaningful gift moment.', 'dawp')),
);

$about_collections = array(
    array(__('American Flag Tees', 'dawp'), __('Distressed flag prints, eagle artwork, and everyday freedom wear.', 'dawp'), '/product-category/american-flag-tees/', 'cat-flag-tees.png'),
    array(__('Veteran Tribute', 'dawp'), __('Service-honoring apparel and personalized gifts for veterans and families.', 'dawp'), '/product-category/veteran-tribute/', 'cat-veteran.png'),
    array(__('Bomber Jackets', 'dawp'), __('Classic MA-1 inspired jackets with patriotic details and custom name options.', 'dawp'), '/product-category/bomber-jackets/', 'cat-bomber.png'),
);

$trust_points = array(
    __('Premium graphic apparel for proud Americans', 'dawp'),
    __('Tracking included once your order ships', 'dawp'),
    __('30-day returns on eligible non-personalized items', 'dawp'),
);
?>

<section class="bg-[#FFFFFF] text-[#111827]">
  <div class="relative overflow-hidden bg-[#0B1F3A] text-white">
    <div class="absolute inset-0">
      <?php echo dawp_theme_image(
          $img_base . 'gts-hero.png',
          __('GraphicTShirtStore patriotic apparel lifestyle image', 'dawp'),
          1920,
          1080,
          array(array(720, 405), array(1280, 720), array(1920, 1080)),
          '100vw',
          array('class' => 'h-full w-full object-cover opacity-40', 'loading' => 'eager')
      ); ?>
    </div>
    <div class="absolute inset-0 bg-gradient-to-br from-[#071A33]/95 via-[#071A33]/60 to-[#B31942]/90"></div>

    <div class="relative mx-auto grid max-w-7xl grid-cols-1 items-center gap-10 px-4 py-16 md:px-6 md:py-24 lg:grid-cols-2 lg:py-28">
      <div>
        <p class="inline-flex rounded-lg border border-[#C6A15B]/40 bg-white/10 px-4 py-2 text-xs font-extrabold uppercase tracking-[0.16em] text-[#C6A15B]">
          <?php esc_html_e('About GraphicTShirtStore', 'dawp'); ?>
        </p>
        <h1 class="mt-5 max-w-3xl text-4xl font-black leading-none md:text-6xl lg:text-7xl">
          <?php esc_html_e('American Pride, Made Personal.', 'dawp'); ?>
        </h1>
        <p class="mt-6 max-w-xl text-base leading-8 text-white/80 md:text-lg">
          <?php esc_html_e('GraphicTShirtStore is a patriotic apparel and custom gift brand built for veterans, military families, and proud Americans who want graphic tees, bomber jackets, hats, hoodies, and accessories with meaning.', 'dawp'); ?>
        </p>

        <div class="mt-8 flex flex-col gap-3 sm:flex-row">
          <a href="<?php echo esc_url(home_url('/best-sellers/')); ?>" class="inline-flex min-h-[48px] items-center justify-center rounded-lg bg-[#B31942] px-6 text-sm font-extrabold uppercase tracking-[0.06em] text-white transition hover:bg-[#921233]">
            <?php esc_html_e('Shop Best Sellers', 'dawp'); ?>
          </a>
          <a href="<?php echo esc_url(home_url('/product-category/veteran-tribute/')); ?>" class="inline-flex min-h-[48px] items-center justify-center rounded-lg border border-white/40 bg-white/10 px-6 text-sm font-extrabold uppercase tracking-[0.06em] text-white transition hover:bg-white hover:text-[#0B1F3A]">
            <?php esc_html_e('Explore Custom Gifts', 'dawp'); ?>
          </a>
        </div>

        <div class="mt-8 grid gap-3 text-sm font-semibold text-white/80 sm:grid-cols-3">
          <?php foreach ($trust_points as $point) : ?>
            <div class="rounded-lg border border-white/15 bg-white/10 p-4"><?php echo esc_html($point); ?></div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="relative">
        <div class="overflow-hidden rounded-lg border border-white/15 bg-white p-3 shadow-2xl">
          <?php echo dawp_theme_image(
              $img_base . 'gts-feature-bomber.png',
              __('Custom patriotic bomber jacket with American flag details', 'dawp'),
              600,
              750,
              array(array(360, 450), array(540, 675), array(600, 750)),
              '(max-width: 1023px) calc(100vw - 56px), 600px',
              array('class' => 'aspect-[4/5] w-full rounded-lg object-cover', 'loading' => 'eager')
          ); ?>
        </div>
        <div class="absolute -bottom-6 left-4 right-4 rounded-lg border border-[#E5E7EB] bg-white p-5 text-[#111827] shadow-xl md:left-auto md:right-8 md:w-72">
          <p class="text-xs font-extrabold uppercase tracking-[0.14em] text-[#B31942]"><?php esc_html_e('GraphicTShirtStore.com', 'dawp'); ?></p>
          <h2 class="mt-2 text-xl font-extrabold"><?php esc_html_e('Name. Rank. Years. Legacy.', 'dawp'); ?></h2>
          <p class="mt-2 text-sm leading-6 text-[#6B7280]"><?php esc_html_e('Custom details for gifts that feel personal, respectful, and ready to wear.', 'dawp'); ?></p>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-[#F7F2E8] py-12 md:py-16 lg:py-20">
    <div class="mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 md:px-6 lg:grid-cols-12 lg:gap-12">
      <div class="lg:col-span-5">
        <p class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#B31942]"><?php esc_html_e('Our Purpose', 'dawp'); ?></p>
        <h2 class="mt-3 text-3xl font-extrabold leading-tight text-[#111827] md:text-5xl">
          <?php esc_html_e('Built for tribute, everyday pride, and meaningful gifts.', 'dawp'); ?>
        </h2>
      </div>
      <div class="space-y-5 text-base leading-8 text-[#6B7280] md:text-lg lg:col-span-7">
        <p><?php esc_html_e('We believe a shirt, hat, jacket, mug, or patch can do more than complete an outfit. It can start a conversation, mark a milestone, and help a family honor a service story with care.', 'dawp'); ?></p>
        <p><?php esc_html_e('Our store focuses on premium-looking graphics, clear product choices, and personalization options for birthdays, Father\'s Day, Veterans Day, Memorial Day, Independence Day, holidays, reunions, and America 250 celebrations.', 'dawp'); ?></p>
        <p class="rounded-lg border border-[#E5E7EB] bg-white p-5 text-sm leading-7 text-[#111827]">
          <?php esc_html_e('GraphicTShirtStore is available at graphictshirtstore.com. We are not official, licensed, endorsed by, or affiliated with the U.S. military, the Department of Defense, or any government agency.', 'dawp'); ?>
        </p>
      </div>
    </div>
  </div>

  <div class="bg-white py-12 md:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 md:px-6">
      <div class="mb-8 max-w-3xl">
        <p class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#B31942]"><?php esc_html_e('What We Stand For', 'dawp'); ?></p>
        <h2 class="mt-3 text-3xl font-extrabold text-[#111827] md:text-5xl"><?php esc_html_e('Respectful products, clear choices, lasting meaning.', 'dawp'); ?></h2>
      </div>

      <div class="-mx-4 flex snap-x snap-mandatory gap-4 overflow-x-auto px-4 pb-4 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden md:mx-0 md:grid md:snap-none md:grid-cols-3 md:gap-5 md:overflow-visible md:px-0 md:pb-0">
        <?php foreach ($about_values as $value) : ?>
          <article class="min-w-0 flex-[0_0_82%] snap-start rounded-lg border border-[#E5E7EB] bg-white p-6 shadow-sm sm:flex-[0_0_58%] md:flex-auto">
            <span class="inline-flex h-11 w-11 items-center justify-center rounded-lg bg-[#0B1F3A] text-xs font-extrabold text-white"><?php echo esc_html($value['abbr']); ?></span>
            <h3 class="mt-5 text-xl font-extrabold text-[#111827]"><?php echo esc_html($value['title']); ?></h3>
            <p class="mt-3 text-sm leading-7 text-[#6B7280]"><?php echo esc_html($value['copy']); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <div class="bg-[#0B1F3A] py-12 text-white md:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 md:px-6">
      <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
        <div>
          <p class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#C6A15B]"><?php esc_html_e('How It Works', 'dawp'); ?></p>
          <h2 class="mt-3 text-3xl font-extrabold md:text-5xl"><?php esc_html_e('A simple path from idea to keepsake.', 'dawp'); ?></h2>
        </div>
        <p class="max-w-xl text-sm leading-7 text-white/75 md:text-base"><?php esc_html_e('Custom products should feel special, while ordering them stays straightforward.', 'dawp'); ?></p>
      </div>

      <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
        <?php foreach ($about_steps as $index => $step) : ?>
          <article class="rounded-lg border border-white/15 bg-white/10 p-5">
            <span class="inline-flex h-10 w-10 items-center justify-center rounded-lg bg-[#C6A15B] text-sm font-extrabold text-[#0B1F3A]"><?php echo esc_html(str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT)); ?></span>
            <h3 class="mt-5 text-xl font-extrabold"><?php echo esc_html($step[0]); ?></h3>
            <p class="mt-3 text-sm leading-7 text-white/75"><?php echo esc_html($step[1]); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <div class="bg-[#F7F2E8] py-12 md:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 md:px-6">
      <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
        <div>
          <p class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#B31942]"><?php esc_html_e('Featured Collections', 'dawp'); ?></p>
          <h2 class="mt-3 text-3xl font-extrabold text-[#111827] md:text-5xl"><?php esc_html_e('Start with the pieces shoppers look for most.', 'dawp'); ?></h2>
        </div>
        <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="inline-flex min-h-[44px] shrink-0 items-center justify-center rounded-lg bg-[#0B1F3A] px-5 text-sm font-extrabold uppercase tracking-[0.06em] text-white transition hover:bg-[#B31942]">
          <?php esc_html_e('Shop All', 'dawp'); ?>
        </a>
      </div>

      <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
        <?php foreach ($about_collections as $collection) : ?>
          <a href="<?php echo esc_url(home_url($collection[2])); ?>" class="group overflow-hidden rounded-lg bg-white shadow-sm ring-1 ring-[#E5E7EB] transition hover:-translate-y-1 hover:shadow-xl">
            <div class="relative aspect-[4/3] overflow-hidden bg-[#0B1F3A]">
              <?php echo dawp_theme_image(
                  $img_base . $collection[3],
                  $collection[0],
                  600,
                  450,
                  array(array(360, 270), array(540, 405), array(600, 450)),
                  '(max-width: 767px) calc(100vw - 32px), (max-width: 1023px) calc((100vw - 64px) / 3), 390px',
                  array('class' => 'h-full w-full object-cover transition duration-500 group-hover:scale-105')
              ); ?>
              <div class="absolute inset-0 bg-gradient-to-t from-[#0B1F3A]/85 via-[#0B1F3A]/15 to-transparent"></div>
              <span class="absolute bottom-4 left-4 rounded-lg bg-[#B31942] px-3 py-1 text-xs font-extrabold uppercase tracking-wide text-white"><?php esc_html_e('View Collection', 'dawp'); ?></span>
            </div>
            <div class="p-5">
              <h3 class="text-xl font-extrabold text-[#111827]"><?php echo esc_html($collection[0]); ?></h3>
              <p class="mt-2 text-sm leading-6 text-[#6B7280]"><?php echo esc_html($collection[1]); ?></p>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <div class="bg-white py-12 md:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 md:px-6">
      <div class="grid grid-cols-1 overflow-hidden rounded-lg bg-[#0B1F3A] text-white lg:grid-cols-2">
        <div class="flex min-h-[420px] flex-col justify-between gap-10 p-8 md:p-10 lg:min-h-[520px] lg:p-12">
          <div>
            <p class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#C6A15B]"><?php esc_html_e('Ready To Honor The Story?', 'dawp'); ?></p>
            <h2 class="mt-4 max-w-xl text-3xl font-extrabold leading-tight md:text-5xl"><?php esc_html_e('Find a meaningful gift or customize a piece of your own.', 'dawp'); ?></h2>
            <p class="mt-6 max-w-lg text-base leading-8 text-white/75"><?php esc_html_e('Browse patriotic apparel, custom veteran gifts, bomber jackets, hats, hoodies, and accessories made for families who value service, freedom, and legacy.', 'dawp'); ?></p>
            <div class="mt-8 flex flex-col gap-3 sm:flex-row">
              <a href="<?php echo esc_url(home_url('/best-sellers/')); ?>" class="inline-flex min-h-[48px] items-center justify-center rounded-lg bg-[#B31942] px-6 text-sm font-extrabold uppercase tracking-[0.06em] text-white transition hover:bg-[#921233]"><?php esc_html_e('Shop Best Sellers', 'dawp'); ?></a>
              <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-[48px] items-center justify-center rounded-lg border border-white/40 px-6 text-sm font-extrabold uppercase tracking-[0.06em] text-white transition hover:bg-white hover:text-[#0B1F3A]"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
            </div>
          </div>
          <div class="grid gap-3 border-t border-white/15 pt-6 text-sm font-semibold leading-6 text-white/80 sm:grid-cols-3">
            <div><?php esc_html_e('Veteran-inspired apparel', 'dawp'); ?></div>
            <div><?php esc_html_e('Custom gift details', 'dawp'); ?></div>
            <div><?php esc_html_e('Made for family legacy', 'dawp'); ?></div>
          </div>
        </div>
        <div class="min-h-[320px] bg-[#F7F2E8]">
          <?php echo dawp_theme_image(
              $img_base . 'cat-veteran.png',
              __('Veteran tribute apparel from GraphicTShirtStore', 'dawp'),
              600,
              750,
              array(array(360, 450), array(540, 675), array(600, 750)),
              '(max-width: 1023px) calc(100vw - 32px), 640px',
              array('class' => 'h-full w-full object-cover')
          ); ?>
        </div>
      </div>
    </div>
  </div>
</section>
