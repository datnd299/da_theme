<?php
/**
 * Template Part: About Us
 *
 * About page for Proudlywear.
 */

$about_values = array(
    array(
        'title' => __('Service-Inspired Design', 'dawp'),
        'copy'  => __('Every collection is shaped around respectful patriotic details, veteran-inspired artwork, and meaningful personalization.', 'dawp'),
    ),
    array(
        'title' => __('Personal Details Matter', 'dawp'),
        'copy'  => __('Names, ranks, branches, years, and family messages help turn everyday apparel into a keepsake with a story.', 'dawp'),
    ),
    array(
        'title' => __('Easy Gift Shopping', 'dawp'),
        'copy'  => __('We organize products by collection, occasion, and gift intent so families can find a thoughtful item quickly.', 'dawp'),
    ),
);

$about_steps = array(
    array('Choose', __('Pick a polo, hat, mug, accessory, or patriotic gift style.', 'dawp')),
    array('Personalize', __('Add the service-inspired details that make the piece meaningful.', 'dawp')),
    array('Review', __('Check names, dates, and custom text carefully before placing your order.', 'dawp')),
    array('Wear', __('Receive a made-with-care item ready for everyday pride or a special gift moment.', 'dawp')),
);

$about_collections = array(
    array(__('Veteran Polos', 'dawp'), __('Custom apparel designed to carry name, rank, branch, and service pride.', 'dawp'), '/product-category/veteran-polo-shirts/', 'image copy 3.png'),
    array(__('Veteran Hats', 'dawp'), __('Patriotic caps and everyday accessories for proud Americans and service families.', 'dawp'), '/product-category/veteran-hats/', 'image copy 9.png'),
    array(__('America 250', 'dawp'), __('Commemorative designs for America-inspired milestone celebrations.', 'dawp'), '/product-category/america-250-collection/', 'image copy.png'),
);
?>

<section class="bg-[#FFFFFF] text-[#111827]">
  <div class="relative overflow-hidden bg-[#0B1F3A] text-white">
    <div class="absolute inset-0 bg-gradient-to-br from-[#0B1F3A] via-[#153866] to-[#B31942] opacity-95"></div>
    <div class="absolute inset-0 opacity-20">
      <div class="h-full w-full bg-[linear-gradient(120deg,transparent_0_35%,rgba(255,255,255,.18)_35%_42%,transparent_42%_100%)]"></div>
    </div>

    <div class="relative mx-auto grid max-w-7xl grid-cols-1 items-center gap-10 px-4 py-12 md:px-6 md:py-16 lg:grid-cols-2 lg:py-20">
      <div>
        <p class="inline-flex rounded-lg border border-[#C6A15B]/40 bg-white/10 px-4 py-2 text-xs font-extrabold uppercase tracking-[0.16em] text-[#C6A15B]">
          <?php esc_html_e('About Proudlywear', 'dawp'); ?>
        </p>
        <h1 class="mt-5 max-w-3xl text-4xl font-extrabold leading-none md:text-6xl lg:text-7xl">
          <?php esc_html_e('Patriotic apparel made to honor the story behind the service.', 'dawp'); ?>
        </h1>
        <p class="mt-6 max-w-xl text-base leading-7 text-white/80 md:text-lg">
          <?php esc_html_e('Proudlywear creates veteran-inspired apparel, custom gifts, and America pride accessories for veterans, military families, and loved ones who want to carry legacy with respect.', 'dawp'); ?>
        </p>

        <div class="mt-8 flex flex-col gap-3 sm:flex-row">
          <a href="<?php echo esc_url(home_url('/product-category/best-sellers/')); ?>" class="inline-flex min-h-[48px] items-center justify-center rounded-lg bg-[#B31942] px-6 text-sm font-extrabold uppercase tracking-[0.06em] text-white transition hover:bg-[#921233]">
            <?php esc_html_e('Shop Best Sellers', 'dawp'); ?>
          </a>
          <a href="<?php echo esc_url(home_url('/product-category/custom-military-gifts/')); ?>" class="inline-flex min-h-[48px] items-center justify-center rounded-lg border border-white/40 px-6 text-sm font-extrabold uppercase tracking-[0.06em] text-white transition hover:bg-white hover:text-[#0B1F3A]">
            <?php esc_html_e('Explore Custom Gifts', 'dawp'); ?>
          </a>
        </div>
      </div>

      <div class="relative">
        <div class="overflow-hidden rounded-lg border border-white/15 bg-white p-3 shadow-2xl">
          <?php echo dawp_theme_image(
              'assets/img/Image New/image copy 8.png',
              __('Proudlywear custom veteran-inspired apparel', 'dawp'),
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
          <p class="text-xs font-extrabold uppercase tracking-[0.14em] text-[#B31942]"><?php esc_html_e('Meaningful Details', 'dawp'); ?></p>
          <h2 class="mt-2 text-xl font-extrabold"><?php esc_html_e('Name. Rank. Years. Legacy.', 'dawp'); ?></h2>
          <p class="mt-2 text-sm leading-6 text-[#6B7280]"><?php esc_html_e('Personalized pieces made for proud everyday wear and thoughtful family gifts.', 'dawp'); ?></p>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-[#F7F2E8] py-12 md:py-16 lg:py-20">
    <div class="mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 md:px-6 lg:grid-cols-12 lg:gap-12">
      <div class="lg:col-span-5">
        <p class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#B31942]"><?php esc_html_e('Our Purpose', 'dawp'); ?></p>
        <h2 class="mt-3 text-3xl font-extrabold leading-tight text-[#111827] md:text-5xl">
          <?php esc_html_e('Built for tribute, family pride, and everyday American moments.', 'dawp'); ?>
        </h2>
      </div>
      <div class="space-y-5 text-base leading-8 text-[#6B7280] md:text-lg lg:col-span-7">
        <p><?php esc_html_e('We believe a shirt, hat, mug, or gift can do more than complete an outfit. It can start a conversation, mark a milestone, and help a family honor a service story with care.', 'dawp'); ?></p>
        <p><?php esc_html_e('Our collections focus on clean patriotic design, readable personalization, and product choices that are easy to give for birthdays, Father\'s Day, Veterans Day, Memorial Day, Independence Day, holidays, and reunion moments.', 'dawp'); ?></p>
        <p class="rounded-lg border border-[#E5E7EB] bg-white p-5 text-sm leading-7 text-[#111827]">
          <?php esc_html_e('Proudlywear is a veteran-inspired patriotic apparel and custom gift brand. We do not claim to be official, licensed, endorsed by, or affiliated with the U.S. military or any government agency.', 'dawp'); ?>
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

      <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
        <?php foreach ($about_values as $value) : ?>
          <article class="rounded-lg border border-[#E5E7EB] bg-white p-6 shadow-sm">
            <span class="mb-5 block h-1 w-12 rounded-full bg-[#B31942]"></span>
            <h3 class="text-xl font-extrabold text-[#111827]"><?php echo esc_html($value['title']); ?></h3>
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
        <p class="max-w-xl text-sm leading-7 text-white/75 md:text-base"><?php esc_html_e('Custom details should feel special, but ordering them should feel straightforward.', 'dawp'); ?></p>
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
          <h2 class="mt-3 text-3xl font-extrabold text-[#111827] md:text-5xl"><?php esc_html_e('Start with the pieces customers look for most.', 'dawp'); ?></h2>
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
                  'assets/img/Image New/' . $collection[3],
                  $collection[0],
                  640,
                  480,
                  array(
                      array(320, 240),
                      array(480, 360),
                      array(640, 480),
                      array(800, 600),
                  ),
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
        <div class="p-8 md:p-10 lg:p-12">
          <p class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#C6A15B]"><?php esc_html_e('Ready To Honor The Story?', 'dawp'); ?></p>
          <h2 class="mt-3 text-3xl font-extrabold md:text-5xl"><?php esc_html_e('Find a meaningful gift or customize a piece of your own.', 'dawp'); ?></h2>
          <p class="mt-5 text-base leading-7 text-white/75"><?php esc_html_e('Browse veteran-inspired apparel, patriotic hats, custom military gifts, and America pride accessories made for families who value legacy.', 'dawp'); ?></p>
          <div class="mt-8 flex flex-col gap-3 sm:flex-row">
            <a href="<?php echo esc_url(home_url('/product-category/best-sellers/')); ?>" class="inline-flex min-h-[48px] items-center justify-center rounded-lg bg-[#B31942] px-6 text-sm font-extrabold uppercase tracking-[0.06em] text-white transition hover:bg-[#921233]"><?php esc_html_e('Shop Best Sellers', 'dawp'); ?></a>
            <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-[48px] items-center justify-center rounded-lg border border-white/40 px-6 text-sm font-extrabold uppercase tracking-[0.06em] text-white transition hover:bg-white hover:text-[#0B1F3A]"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
          </div>
        </div>
        <div class="min-h-[320px] bg-[#F7F2E8]">
          <?php echo dawp_theme_image(
              'assets/img/Image New/image copy 8.png',
              __('Custom patriotic gifts from Proudlywear', 'dawp'),
              720,
              540,
              array(
                  array(360, 270),
                  array(540, 405),
                  array(720, 540),
                  array(960, 720),
              ),
              '(max-width: 1023px) calc(100vw - 32px), 640px',
              array('class' => 'h-full w-full object-cover')
          ); ?>
        </div>
      </div>
    </div>
  </div>
</section>
