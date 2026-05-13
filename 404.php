<?php
/**
 * 404 Not Found Template
 *
 * @package Dawp
 */

get_header();
?>

<main id="primary" class="site-main error-404 relative min-h-[100dvh] overflow-hidden bg-slickBlack text-white flex items-center justify-center px-4 py-24 md:py-40">

  <!-- Decorative glows -->
  <div class="pointer-events-none absolute -top-32 -right-20 h-96 w-96 rounded-full bg-slickActive/20 blur-3xl"></div>
  <div class="pointer-events-none absolute -bottom-20 -left-24 h-80 w-80 rounded-full bg-slickLime/15 blur-3xl"></div>

  <div class="relative z-10 mx-auto w-[min(100%-32px,640px)] text-center">

    <!-- 404 number -->
    <p class="select-none text-[140px] font-black leading-none tracking-[-0.06em] text-white/5 md:text-[200px]">
      404
    </p>

    <!-- Label -->
    <div class="-mt-12 mb-6 md:-mt-16">
      <p class="text-sm font-black uppercase tracking-[0.24em] text-slickLime">Page Not Found</p>
    </div>

    <!-- Heading -->
    <h1 class="text-4xl font-black uppercase leading-[0.92] tracking-tighter text-white md:text-6xl">
      Lost In The Streets.
    </h1>

    <p class="mt-6 text-base leading-7 text-white/75 md:text-lg">
      That page doesn't exist — but the fits do. Head back and keep browsing clean graphic tees and streetwear essentials.
    </p>

    <!-- CTAs -->
    <div class="mt-9 flex flex-wrap justify-center gap-4">
      <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-slickActive px-7 text-sm font-black uppercase tracking-wide text-slickBlack transition hover:bg-slickLime">
        Shop Now
      </a>
      <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-white/30 px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-slickBlack">
        Back To Home
      </a>
    </div>

    <!-- Quick links -->
    <div class="mt-12 border-t border-white/10 pt-8">
      <p class="mb-5 text-xs font-black uppercase tracking-[0.2em] text-white/40">Browse Collections</p>
      <div class="flex flex-wrap justify-center gap-x-6 gap-y-3 text-sm font-semibold text-white/60">
        <?php
        $quick_links = [
          ['title' => 'Graphic Tees',          'url' => home_url('/product-category/graphic-tees/')],
          ['title' => 'Oversized Tees',         'url' => home_url('/product-category/oversize-tees/')],
          ['title' => 'Casual Hoodies',         'url' => home_url('/product-category/casual-hoodies/')],
          ['title' => 'Streetwear Essentials',  'url' => home_url('/product-category/streetwear-essentials/')],
          ['title' => 'New Arrivals',           'url' => home_url('/shop/')],
        ];
        foreach ($quick_links as $link) : ?>
          <a href="<?php echo esc_url($link['url']); ?>" class="transition-colors hover:text-slickLime"><?php echo esc_html($link['title']); ?></a>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
</main>

<?php
get_footer();
