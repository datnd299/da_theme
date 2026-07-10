<?php
/**
 * 404 Not Found Template
 *
 * @package Dawp
 */

get_header();
?>

<main id="primary" class="relative site-main error-404 flex items-center justify-center overflow-hidden bg-[#F7F8FA] px-4 py-20 md:py-28">

  <div class="pointer-events-none absolute inset-x-0 top-0 h-56 bg-[#0B1F3A]"></div>
  <div class="pointer-events-none absolute inset-x-0 top-56 h-px bg-[#C6A15B] opacity-45"></div>

  <div class="relative z-10 mx-auto w-[min(100%-32px,620px)] text-center">

    <!-- 404 number -->
    <p class="font-serif text-[120px] leading-none font-bold tracking-[-0.05em] text-[#C6A15B] opacity-30 md:text-[180px] select-none">
      404
    </p>

    <!-- Icon -->
    <div class="-mt-10 mb-6 flex justify-center md:-mt-14">
      <span class="inline-flex h-16 w-16 items-center justify-center rounded-lg border border-[#C6A15B]/40 bg-white shadow-[0_18px_40px_rgba(11,31,58,0.16)]">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#B31942]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 16.318A4.486 4.486 0 0 0 12.016 15a4.486 4.486 0 0 0-3.198 1.318M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z" />
        </svg>
      </span>
    </div>

    <!-- Text -->
    <p class="mb-2 text-xs font-bold uppercase tracking-[0.18em] text-[#B31942]"><?php esc_html_e('Oops - Page Not Found', 'dawp'); ?></p>
    <h1 class="font-serif text-3xl leading-tight tracking-[-0.02em] text-[#0B1F3A] md:text-5xl">
      <?php esc_html_e("We couldn't find that page", 'dawp'); ?>
    </h1>
    <p class="mt-4 text-base leading-7 text-[#475569] md:text-lg">
      <?php esc_html_e("The page you're looking for may have moved, been removed, or never existed. Don't worry - our shop is full of ProudlyWear favorites waiting for you.", 'dawp'); ?>
    </p>

    <!-- CTAs -->
    <div class="mt-8 flex flex-wrap justify-center gap-3">
      <a
        href="<?php echo esc_url(home_url('/shop/')); ?>"
        class="inline-flex min-h-12 items-center justify-center rounded-lg border border-[#B31942] bg-[#B31942] px-7 text-sm font-extrabold uppercase tracking-[0.06em] text-white transition hover:-translate-y-0.5 hover:border-[#921233] hover:bg-[#921233]"
      >
        <?php esc_html_e('Browse the Shop', 'dawp'); ?>
      </a>
      <a
        href="<?php echo esc_url(home_url('/')); ?>"
        class="inline-flex min-h-12 items-center justify-center rounded-lg border border-[#CBD5E1] bg-white px-7 text-sm font-extrabold uppercase tracking-[0.06em] text-[#0B1F3A] transition hover:-translate-y-0.5 hover:border-[#0B1F3A] hover:bg-[#0B1F3A] hover:text-white"
      >
        <?php esc_html_e('Back to Home', 'dawp'); ?>
      </a>
    </div>

    <!-- Quick links -->
    <div class="mt-12 border-t border-[#CBD5E1] pt-8">
      <p class="mb-4 text-xs font-semibold uppercase tracking-widest text-[#64748B]"><?php esc_html_e('You might be looking for', 'dawp'); ?></p>
      <div class="flex flex-wrap justify-center gap-x-6 gap-y-3 text-sm font-semibold text-[#334155]">
        <?php
        $quick_links = [
          ['title' => __('Shop All', 'dawp'),               'url' => home_url('/shop/')],
          ['title' => __('Best Sellers', 'dawp'),           'url' => home_url('/product-category/best-sellers/')],
          ['title' => __('American Flag Tees', 'dawp'),     'url' => home_url('/product-category/american-flag-tees/')],
          ['title' => __('Veteran Tribute', 'dawp'),        'url' => home_url('/product-category/veteran-tribute/')],
          ['title' => __('Bomber Jackets', 'dawp'),         'url' => home_url('/product-category/bomber-jackets/')],
          ['title' => __('Hats & Beanies', 'dawp'),         'url' => home_url('/product-category/hats-beanies/')],
        ];
        foreach ($quick_links as $link) : ?>
          <a href="<?php echo esc_url($link['url']); ?>" class="transition-colors hover:text-[#B31942]"><?php echo esc_html($link['title']); ?></a>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
</main>

<?php
get_footer();
