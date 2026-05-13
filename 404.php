<?php
/**
 * 404 Not Found Template — Shopshive
 *
 * @package Dawp
 */

get_header();
?>

<main id="primary" class="relative site-main error-404 min-h-dvh flex items-center justify-center overflow-hidden px-4 py-24 md:py-40"
      style="background-color:#FDF8F4">

  <!-- Decorative blobs -->
  <div class="pointer-events-none absolute -top-32 -left-32 h-96 w-96 rounded-full opacity-25 blur-3xl"
       style="background-color:#F5E6DC"></div>
  <div class="pointer-events-none absolute -bottom-24 -right-24 h-80 w-80 rounded-full opacity-20 blur-3xl"
       style="background-color:#F2A8BC"></div>

  <div class="relative z-10 mx-auto w-[min(100%-32px,600px)] text-center">

    <!-- 404 number -->
    <p class="select-none leading-none font-light opacity-[0.12]"
       style="font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(100px,20vw,180px);color:#2B2B2B">
      404
    </p>

    <!-- Icon -->
    <div class="-mt-8 mb-6 flex justify-center md:-mt-12">
      <span class="inline-flex h-16 w-16 items-center justify-center rounded-full bg-white"
            style="box-shadow:0 4px 20px rgba(232,86,122,0.15)">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
             stroke="#E8567A" stroke-width="1.5" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z"/>
        </svg>
      </span>
    </div>

    <!-- Label -->
    <p class="mb-2 text-xs font-semibold uppercase tracking-[0.16em]" style="color:#E8567A;font-family:'DM Sans',system-ui,sans-serif">
      Page Not Found
    </p>

    <!-- Heading -->
    <h1 class="leading-tight tracking-[-0.02em]"
        style="font-family:'Playfair Display',Georgia,serif;font-size:clamp(26px,5vw,40px);font-weight:500;color:#2B2B2B">
      We couldn't find that page
    </h1>

    <!-- Body copy -->
    <p class="mt-4 leading-[1.7]" style="color:#6B5A52;font-family:'DM Sans',system-ui,sans-serif;font-size:15px">
      The page you're looking for may have moved or no longer exists.<br>
      Let's get you back to the good stuff — there's a whole collection waiting.
    </p>

    <!-- CTAs -->
    <div class="mt-8 flex flex-wrap justify-center gap-3">
      <a href="<?php echo esc_url(home_url('/shop/')); ?>"
         class="inline-flex min-h-12 items-center justify-center rounded-full px-7 text-sm font-semibold text-white transition-all duration-300 hover:scale-[1.02] active:scale-[0.98]"
         style="background-color:#E8567A;font-family:'DM Sans',system-ui,sans-serif">
        Shop Now
      </a>
      <a href="<?php echo esc_url(home_url('/')); ?>"
         class="inline-flex min-h-12 items-center justify-center rounded-full border px-7 text-sm font-semibold transition-all duration-300 hover:scale-[1.02] active:scale-[0.98]"
         style="border-color:#D4B8A0;color:#2B2B2B;background-color:#fff;font-family:'DM Sans',system-ui,sans-serif">
        Back to Home
      </a>
    </div>

    <!-- Quick links -->
    <div class="mt-12 border-t pt-8" style="border-color:#E8E0D8">
      <p class="mb-4 text-xs font-semibold uppercase tracking-widest" style="color:#A89080;font-family:'DM Sans',system-ui,sans-serif">
        Browse categories
      </p>
      <div class="flex flex-wrap justify-center gap-x-6 gap-y-2 text-sm" style="color:#6B5A52;font-family:'DM Sans',system-ui,sans-serif">
        <?php
        $quick_links = [
          ['title' => __('Dresses', 'dawp'),        'url' => home_url('/product-category/dresses/')],
          ['title' => __('Blouses & Shirts', 'dawp'), 'url' => home_url('/product-category/blouses-shirts/')],
          ['title' => __('Tops', 'dawp'),           'url' => home_url('/product-category/tops/')],
          ['title' => __('Pants', 'dawp'),          'url' => home_url('/product-category/pants/')],
          ['title' => __('Footwear', 'dawp'),       'url' => home_url('/product-category/footwear/')],
        ];
        foreach ($quick_links as $link) : ?>
          <a href="<?php echo esc_url($link['url']); ?>"
             class="transition-colors duration-150 hover:text-accent">
            <?php echo esc_html($link['title']); ?>
          </a>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
</main>

<?php
get_footer();
