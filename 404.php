<?php
/**
 * 404 Not Found Template
 *
 * @package Dawp
 */

get_header();
?>

<main id="primary" class="relative site-main error-404 min-h-[100dvh] flex items-center justify-center bg-gradient-to-br from-[#FAF7F2] to-[#FFF6F3] overflow-hidden px-4 py-24 md:py-40">

  <!-- Decorative blobs -->
  <div class="pointer-events-none absolute -top-24 -left-24 h-80 w-80 rounded-full bg-[#E8D8C8] opacity-30 blur-3xl"></div>
  <div class="pointer-events-none absolute -bottom-20 -right-20 h-72 w-72 rounded-full bg-[#DFA39A] opacity-20 blur-3xl"></div>

  <div class="relative z-10 mx-auto w-[min(100%-32px,620px)] text-center">

    <!-- 404 number -->
    <p class="font-serif text-[120px] leading-none font-bold tracking-[-0.05em] text-[#C98A8A] opacity-20 md:text-[180px] select-none">
      404
    </p>

    <!-- Icon -->
    <div class="-mt-10 mb-6 flex justify-center md:-mt-14">
      <span class="inline-flex h-16 w-16 items-center justify-center rounded-full bg-white shadow-[0_4px_16px_rgba(201,138,138,0.18)]">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#C98A8A]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 16.318A4.486 4.486 0 0 0 12.016 15a4.486 4.486 0 0 0-3.198 1.318M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z" />
        </svg>
      </span>
    </div>

    <!-- Text -->
    <p class="mb-2 text-xs font-bold uppercase tracking-[0.18em] text-[#C98A8A]">Oops — Page Not Found</p>
    <h1 class="font-serif text-3xl leading-tight tracking-[-0.02em] text-[#2F2A28] md:text-5xl">
      We couldn't find that page
    </h1>
    <p class="mt-4 text-base leading-7 text-[#6F625D] md:text-lg">
      The page you're looking for may have moved, been removed, or never existed.
      Don't worry — our boutique is full of beautiful things waiting for you!
    </p>

    <!-- CTAs -->
    <div class="mt-8 flex flex-wrap justify-center gap-3">
      <a
        href="<?php echo esc_url(home_url('/shop/')); ?>"
        class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#C98A8A] bg-[#C98A8A] px-7 text-sm font-bold text-white transition hover:-translate-y-0.5 hover:bg-[#2F2A28] hover:border-[#2F2A28]"
      >
        Browse the Shop
      </a>
      <a
        href="<?php echo esc_url(home_url('/')); ?>"
        class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#E6DDD6] bg-white px-7 text-sm font-bold text-[#2F2A28] transition hover:-translate-y-0.5 hover:bg-[#FAF7F2]"
      >
        Back to Home
      </a>
    </div>

    <!-- Quick links -->
    <div class="mt-12 border-t border-[#E6DDD6] pt-8">
      <p class="mb-4 text-xs font-semibold uppercase tracking-widest text-[#9A8C86]">You might be looking for</p>
      <div class="flex flex-wrap justify-center gap-x-6 gap-y-2 text-sm text-[#6F625D]">
        <?php
        $quick_links = [
          ['title' => __('Shop All', 'dawp'),        'url' => home_url('/shop/')],
          ['title' => __('Girls Dresses', 'dawp'),   'url' => home_url('/product-category/girls-dresses/')],
          ['title' => __('Mommy & Me', 'dawp'),      'url' => home_url('/product-category/mommy-me-matching-sets/')],
          ['title' => __('Women Casual', 'dawp'),    'url' => home_url('/product-category/women-casual/')],
          ['title' => __('Baby Girl', 'dawp'),       'url' => home_url('/product-category/baby-girl-boutique/')],
        ];
        foreach ($quick_links as $link) : ?>
          <a href="<?php echo esc_url($link['url']); ?>" class="hover:text-[#C98A8A] transition-colors"><?php echo esc_html($link['title']); ?></a>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
</main>

<?php
get_footer();
