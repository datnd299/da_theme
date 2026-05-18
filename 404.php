<?php
/**
 * 404 Not Found Template
 *
 * @package Dawp
 */

get_header();
?>

<main id="primary" class="site-main error-404 relative min-h-[100dvh] overflow-hidden bg-[#F6F7F9] font-body text-[#2D2633] flex items-center justify-center px-4 py-24 md:py-40">

  <!-- Decorative glows -->
  <div class="pointer-events-none absolute -top-32 -right-20 h-96 w-96 rounded-full bg-[#DCD5FF]/50 blur-3xl"></div>
  <div class="pointer-events-none absolute -bottom-20 -left-24 h-80 w-80 rounded-full bg-[#EAF7F0]/80 blur-3xl"></div>

  <div class="relative z-10 mx-auto w-[min(100%-32px,640px)] text-center rounded-[1.5rem] bg-white p-8 md:p-14 shadow-xl shadow-black/5 border border-[#E5E7EB]">

    <!-- 404 number -->
    <p class="select-none text-[100px] font-black leading-none tracking-[-0.04em] text-[#DCD5FF] md:text-[140px]">
      404
    </p>

    <!-- Label -->
    <div class="-mt-6 mb-6 md:-mt-10">
      <p class="inline-flex rounded-full bg-[#F7C948] px-4 py-1.5 text-xs font-black uppercase tracking-[0.18em] text-[#2D2633]">
        <?php esc_html_e('Page Not Found', 'dawp'); ?>
      </p>
    </div>

    <!-- Heading -->
    <h1 class="font-heading text-4xl font-black leading-[0.96] tracking-tight text-[#2D2633] md:text-5xl">
      <?php esc_html_e('Looks like we lost this one.', 'dawp'); ?>
    </h1>

    <p class="mt-5 text-base leading-7 text-[#6B6470]">
      <?php esc_html_e('We couldn\'t find the page you\'re looking for. It might have been moved or no longer exists. Let\'s get you back to your beauty routine.', 'dawp'); ?>
    </p>

    <!-- CTAs -->
    <div class="mt-9 flex flex-wrap justify-center gap-4">
      <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#2D2633] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#F7C948] hover:text-[#2D2633]">
        <?php esc_html_e('Shop All', 'dawp'); ?>
      </a>
      <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#2D2633] bg-white px-7 text-sm font-black uppercase tracking-wide text-[#2D2633] transition hover:bg-[#EAF7F0]">
        <?php esc_html_e('Back To Home', 'dawp'); ?>
      </a>
    </div>

    <!-- Quick links -->
    <div class="mt-12 border-t border-[#E5E7EB] pt-8">
      <p class="mb-5 text-xs font-black uppercase tracking-[0.2em] text-[#6B6470]">
        <?php esc_html_e('Browse Categories', 'dawp'); ?>
      </p>
      <div class="flex flex-wrap justify-center gap-x-6 gap-y-3 text-sm font-bold text-[#6B6470]">
        <?php
        $quick_links = [
          ['title' => __('Beauty Accessories', 'dawp'), 'url' => home_url('/product-category/beauty-accessories/')],
          ['title' => __('Makeup Tools', 'dawp'),       'url' => home_url('/product-category/makeup-tools/')],
          ['title' => __('Hair Care Essentials', 'dawp'),'url' => home_url('/product-category/hair-care-essentials/')],
          ['title' => __('Personal Care Tools', 'dawp'), 'url' => home_url('/product-category/personal-care-tools/')],
          ['title' => __('Beauty Organizers', 'dawp'),   'url' => home_url('/product-category/beauty-organizers/')],
        ];
        foreach ($quick_links as $link) : ?>
          <a href="<?php echo esc_url($link['url']); ?>" class="transition-colors hover:text-[#2D2633]"><?php echo esc_html($link['title']); ?></a>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
</main>

<?php
get_footer();
