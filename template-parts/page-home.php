<?php
/**
 * Homepage template part — Shopshive
 * Sections: Hero · Category Nav · New Arrivals · Promo Banner · Best Sellers · Trust Bar · Email Signup
 */
?>

<!-- ===== HERO BANNER ===== -->
<section class="relative overflow-hidden bg-[#F5E6DC]"
         style="height:90vh;min-height:520px"
         aria-label="Featured campaign">

  <!-- Slides -->
  <div class="relative h-full w-full">

    <!-- Slide 1 -->
    <div class="hero-slide absolute inset-0 flex" data-slide="0">
      <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/shopshive/slide%231.png'); ?>"
           alt=""
           class="absolute inset-0 h-full w-full object-cover"
           aria-hidden="true">
      <div class="absolute inset-0 bg-gradient-to-br from-[#F5E6DC] via-[#F2A8BC]/30 to-[#E8567A]/10"></div>
      <div class="absolute inset-0 bg-gradient-to-r from-black/25 via-transparent to-transparent"></div>
      <div class="relative z-10 flex h-full items-center w-full">
        <div class="max-w-[1280px] mx-auto px-6 lg:px-12 w-full">
          <div class="max-w-lg hero-text-block">
            <p class="hero-line text-sm font-medium uppercase tracking-[0.12em] text-white/90 mb-4">Spring 2025</p>
            <h1 class="hero-line mb-4 leading-[1.1] text-white"
                style="font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(40px,6vw,72px);font-weight:300">
              New Season.<br>New You.
            </h1>
            <p class="hero-line text-base text-white/85 mb-8 leading-relaxed">
              Explore the Spring Collection — styles for every story.
            </p>
            <div class="hero-line">
              <a href="<?php echo esc_url(home_url('/shop/')); ?>"
                 class="inline-flex items-center gap-2 px-7 py-3.5 bg-[#E8567A] text-white text-sm font-semibold rounded-full hover:bg-[#d14469] transition-all duration-300 hover:scale-[1.02] active:scale-[0.98]">
                Shop Now
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Slide 2 -->
    <div class="hero-slide absolute inset-0 flex" data-slide="1">
      <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/shopshive/slide%232.png'); ?>"
           alt=""
           class="absolute inset-0 h-full w-full object-cover"
           aria-hidden="true">
      <div class="absolute inset-0 bg-gradient-to-r from-black/35 via-black/10 to-transparent"></div>
      <div class="absolute inset-0 bg-gradient-to-t from-black/12 via-transparent to-transparent"></div>
      <div class="relative z-10 flex h-full items-center w-full">
        <div class="max-w-[1280px] mx-auto px-6 lg:px-12 w-full">
          <div class="max-w-lg">
            <p class="text-sm font-medium uppercase tracking-[0.12em] text-white/80 mb-4">Summer Sale</p>
            <h1 class="mb-4 leading-[1.1] text-white"
                style="font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(40px,6vw,72px);font-weight:300">
              Up to 40% Off.<br>Shop the Sale.
            </h1>
            <p class="text-base text-white/85 mb-8 leading-relaxed">
              Limited time — summer essentials at their best prices.
            </p>
            <a href="<?php echo esc_url(home_url('/shop/')); ?>"
               class="inline-flex items-center gap-2 px-7 py-3.5 bg-[#E8567A] text-white text-sm font-semibold rounded-full hover:bg-[#d14469] transition-all duration-300 hover:scale-[1.02] active:scale-[0.98]">
              Shop the Sale
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Slide 3 -->
    <div class="hero-slide absolute inset-0 flex" data-slide="2">
      <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/shopshive/slide%233.png'); ?>"
           alt=""
           class="absolute inset-0 h-full w-full object-cover"
           aria-hidden="true">
      <div class="absolute inset-0 bg-gradient-to-r from-white/38 via-white/10 to-transparent"></div>
      <div class="absolute inset-0 bg-gradient-to-t from-black/8 via-transparent to-transparent"></div>
      <div class="relative z-10 flex h-full items-center w-full">
        <div class="max-w-[1280px] mx-auto px-6 lg:px-12 w-full">
          <div class="max-w-lg">
            <p class="text-sm font-medium uppercase tracking-[0.12em] text-[#2B2B2B]/70 mb-4">Just Arrived</p>
            <h1 class="mb-4 leading-[1.1] text-[#2B2B2B]"
                style="font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(40px,6vw,72px);font-weight:300">
              Dress for<br>Every Story.
            </h1>
            <p class="text-base text-[#2B2B2B]/70 mb-8 leading-relaxed">
              New dresses, blouses, and more — landing every week.
            </p>
            <a href="<?php echo esc_url(home_url('/shop/')); ?>"
               class="inline-flex items-center gap-2 px-7 py-3.5 bg-[#E8567A] text-white text-sm font-semibold rounded-full hover:bg-[#d14469] transition-all duration-300 hover:scale-[1.02] active:scale-[0.98]">
              Explore Now
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
          </div>
        </div>
      </div>
    </div>

  </div><!-- /slides -->

  <!-- Dot indicators -->
  <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex gap-2.5 z-20" role="tablist" aria-label="Hero slides">
    <button class="hero-dot w-2.5 h-2.5 rounded-full bg-white transition-all duration-300 scale-125" data-dot="0" role="tab" aria-selected="true"  aria-label="Slide 1"></button>
    <button class="hero-dot w-2.5 h-2.5 rounded-full bg-white/50 transition-all duration-300"           data-dot="1" role="tab" aria-selected="false" aria-label="Slide 2"></button>
    <button class="hero-dot w-2.5 h-2.5 rounded-full bg-white/50 transition-all duration-300"           data-dot="2" role="tab" aria-selected="false" aria-label="Slide 3"></button>
  </div>
</section>


<!-- ===== CATEGORY QUICK-NAV ===== -->
<section class="py-12 lg:py-16 bg-[#F5E6DC]" aria-label="Shop by category">
  <div class="max-w-[1280px] mx-auto px-4 lg:px-6">

    <h2 class="text-center mb-1.5" style="font-family:'Playfair Display',serif;font-size:28px;font-weight:600;color:#2B2B2B">
      Shop by Category
    </h2>
    <p class="text-center text-sm text-[#D4B8A0] mb-8">Find your style in a click.</p>

    <div class="flex gap-4 overflow-x-auto pb-2 lg:grid lg:grid-cols-6 lg:overflow-visible" style="-ms-overflow-style:none;scrollbar-width:none">
      <?php
      $home_cats = [
        ['name' => 'Dresses',         'slug' => 'dresses',        'emoji' => '👗'],
        ['name' => 'Blouses & Shirts', 'slug' => 'blouses-shirts', 'emoji' => '👚'],
        ['name' => 'Tops',            'slug' => 'tops',           'emoji' => '👕'],
        ['name' => 'Pants',           'slug' => 'pants',          'emoji' => '👖'],
        ['name' => 'Shorts',          'slug' => 'shorts',         'emoji' => '🩳'],
        ['name' => 'Footwear',        'slug' => 'footwear',       'emoji' => '👠'],
      ];
      foreach ($home_cats as $hcat) :
        $term        = get_term_by('slug', $hcat['slug'], 'product_cat');
        $cat_url     = '/product-category/' . $hcat['slug'] . '/';
        $thumb_id    = $term ? get_woocommerce_term_meta($term->term_id, 'thumbnail_id', true) : 0;
        $thumb_url   = $thumb_id ? wp_get_attachment_image_url($thumb_id, 'medium') : false;
      ?>
      <a href="<?php echo esc_url($cat_url); ?>"
         class="group flex-shrink-0 w-32 lg:w-auto flex flex-col items-center gap-3"
         style="min-width:120px"
         aria-label="Shop <?php echo esc_attr($hcat['name']); ?>">
        <div class="w-full aspect-square rounded-xl overflow-hidden relative bg-[#F2A8BC]/20 flex items-center justify-center">
          <?php if ($thumb_url) : ?>
            <img src="<?php echo esc_url($thumb_url); ?>"
                 alt="<?php echo esc_attr($hcat['name']); ?>"
                 class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105"
                 loading="lazy">
          <?php else : ?>
            <span class="text-5xl select-none" aria-hidden="true"><?php echo $hcat['emoji']; ?></span>
          <?php endif; ?>
          <div class="absolute inset-0 bg-[#E8567A]/0 group-hover:bg-[#E8567A]/20 transition-colors duration-300 rounded-xl"></div>
        </div>
        <span class="text-xs font-medium uppercase tracking-[0.08em] text-[#2B2B2B] text-center leading-tight">
          <?php echo esc_html($hcat['name']); ?>
        </span>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ===== NEW ARRIVALS ===== -->
<section class="py-12 lg:py-16 bg-white" aria-label="New arrivals">
  <div class="max-w-[1280px] mx-auto px-4 lg:px-6">

    <div class="flex items-end justify-between mb-8">
      <div>
        <h2 style="font-family:'Playfair Display',serif;font-size:28px;font-weight:600;color:#2B2B2B;line-height:1.25">New Arrivals</h2>
        <p class="text-sm text-[#D4B8A0] mt-1">Fresh styles, just landed.</p>
      </div>
      <a href="<?php echo esc_url(add_query_arg('orderby', 'date', get_permalink(wc_get_page_id('shop')))); ?>"
         class="text-sm font-medium text-[#E8567A] hover:text-[#d14469] flex items-center gap-1.5 transition-colors whitespace-nowrap">
        View All
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
    </div>

    <?php
    $new_arrivals = wc_get_products([
      'limit'    => 8,
      'orderby'  => 'date',
      'order'    => 'DESC',
      'status'   => 'publish',
      'category' => ['dresses'],
    ]);
    ?>

    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
      <?php foreach ($new_arrivals as $prod) :
        $p_img   = wp_get_attachment_image_url($prod->get_image_id(), 'woocommerce_medium') ?: wc_placeholder_img_src();
        $p_title = $prod->get_name();
        $p_url   = get_permalink($prod->get_id());
        $p_price = $prod->get_price_html();
        $p_sale  = $prod->is_on_sale();
        $p_days  = $prod->get_date_created() ? (time() - $prod->get_date_created()->getTimestamp()) / DAY_IN_SECONDS : 999;
        $is_new  = $p_days <= 30;
        $p_cart  = $prod->add_to_cart_url();
        $p_stars = $prod->get_average_rating();
        $p_count = $prod->get_rating_count();
      ?>
      <article class="group bg-white rounded-lg overflow-hidden shadow-[0_2px_12px_rgba(0,0,0,0.07)] hover:shadow-[0_8px_24px_rgba(0,0,0,0.12)] transition-shadow duration-300"
               aria-label="<?php echo esc_attr($p_title); ?>">
        <div class="relative overflow-hidden" style="aspect-ratio:3/4">
          <a href="<?php echo esc_url($p_url); ?>" class="block absolute inset-0">
            <img src="<?php echo esc_url($p_img); ?>"
                 alt="<?php echo esc_attr($p_title); ?>"
                 class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-[1.03]"
                 loading="lazy">
          </a>
          <?php if ($is_new) : ?>
            <span class="absolute top-2.5 left-2.5 px-2 py-0.5 text-[10px] font-bold uppercase tracking-wide bg-[#E8567A] text-white rounded-full pointer-events-none">NEW</span>
          <?php elseif ($p_sale) : ?>
            <span class="absolute top-2.5 left-2.5 px-2 py-0.5 text-[10px] font-bold uppercase tracking-wide bg-[#E8567A] text-white rounded-full pointer-events-none">SALE</span>
          <?php endif; ?>
          <button class="absolute top-2.5 right-2.5 w-8 h-8 flex items-center justify-center bg-white/80 backdrop-blur-sm rounded-full text-[#D4B8A0] hover:text-[#E8567A] transition-colors z-10"
                  aria-label="<?php printf(esc_attr__('Add %s to wishlist', 'dawp'), $p_title); ?>">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/>
            </svg>
          </button>
        </div>
        <div class="p-3">
          <h3 class="text-sm leading-tight mb-1 line-clamp-2 text-[#2B2B2B]"
              style="font-family:'Playfair Display',serif;font-weight:500">
            <a href="<?php echo esc_url($p_url); ?>" class="hover:text-[#E8567A] transition-colors">
              <?php echo esc_html($p_title); ?>
            </a>
          </h3>
          <div class="text-sm font-medium text-[#E8567A] mb-1"><?php echo $p_price; ?></div>
          <?php if ($p_stars > 0) : ?>
          <div class="flex items-center gap-0.5" aria-label="<?php echo esc_attr(number_format($p_stars, 1)); ?> out of 5 stars">
            <?php for ($s = 1; $s <= 5; $s++) : ?>
              <svg width="11" height="11" viewBox="0 0 24 24"
                   fill="<?php echo $s <= round($p_stars) ? '#D4B8A0' : 'none'; ?>"
                   stroke="#D4B8A0" stroke-width="2" aria-hidden="true">
                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
              </svg>
            <?php endfor; ?>
            <span class="text-[11px] text-[#D4B8A0] ml-0.5">(<?php echo esc_html($p_count); ?>)</span>
          </div>
          <?php endif; ?>
        </div>
      </article>
      <?php endforeach; ?>

      <?php if (empty($new_arrivals)) : ?>
        <div class="col-span-2 lg:col-span-4 py-16 text-center text-[#D4B8A0]">
          <p class="text-sm">New arrivals coming soon — check back shortly!</p>
        </div>
      <?php endif; ?>
    </div>

    <?php if (count($new_arrivals) >= 8) : ?>
    <div class="text-center mt-10">
      <a href="<?php echo esc_url(add_query_arg('orderby', 'date', get_permalink(wc_get_page_id('shop')))); ?>"
         class="inline-flex items-center gap-2 px-8 py-3 border border-[#E8567A] text-[#E8567A] text-sm font-semibold rounded-full hover:bg-[#E8567A] hover:text-white transition-all duration-300">
        Load More
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 5v14M5 12l7 7 7-7"/></svg>
      </a>
    </div>
    <?php endif; ?>

  </div>
</section>


<!-- ===== PROMOTIONAL BANNER ===== -->
<section class="relative overflow-hidden flex items-center justify-center" style="height:280px" aria-label="Sale promotion">
  <div class="absolute inset-0" style="background:linear-gradient(135deg,#F2A8BC 0%,#F5E6DC 100%)"></div>
  <div class="relative z-10 text-center px-4">
    <p class="text-xs font-semibold uppercase tracking-[0.14em] text-[#E8567A] mb-3">Limited Time Offer</p>
    <h2 class="mb-3 text-[#2B2B2B]"
        style="font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(36px,5vw,52px);font-weight:300;line-height:1.1">
      Up to 40% Off<br>Summer Essentials
    </h2>
    <p class="text-sm text-[#2B2B2B]/65 mb-7">Don't miss out — styles selling fast.</p>
    <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>"
       class="inline-flex items-center gap-2 px-8 py-3.5 bg-[#E8567A] text-white text-sm font-semibold rounded-full hover:bg-[#d14469] transition-all duration-300 hover:scale-[1.02]">
      Shop the Sale
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
    </a>
  </div>
</section>


<!-- ===== BEST SELLERS ===== -->
<section class="py-12 lg:py-16 bg-white" aria-label="Best sellers">
  <div class="max-w-[1280px] mx-auto px-4 lg:px-6">

    <div class="flex items-end justify-between mb-8">
      <div>
        <h2 style="font-family:'Playfair Display',serif;font-size:28px;font-weight:600;color:#2B2B2B;line-height:1.25">Best Sellers</h2>
        <p class="text-sm text-[#D4B8A0] mt-1">Our most-loved pieces, right now.</p>
      </div>
      <a href="<?php echo esc_url(add_query_arg('orderby', 'popularity', get_permalink(wc_get_page_id('shop')))); ?>"
         class="text-sm font-medium text-[#E8567A] hover:text-[#d14469] flex items-center gap-1.5 transition-colors whitespace-nowrap">
        View All
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
    </div>

    <?php
    $best_sellers = wc_get_products([
      'limit'    => 4,
      'orderby'  => 'popularity',
      'order'    => 'DESC',
      'status'   => 'publish',
      'category' => ['tops'],
    ]);
    ?>

    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
      <?php foreach ($best_sellers as $prod) :
        $p_img   = wp_get_attachment_image_url($prod->get_image_id(), 'woocommerce_medium') ?: wc_placeholder_img_src();
        $p_title = $prod->get_name();
        $p_url   = get_permalink($prod->get_id());
        $p_price = $prod->get_price_html();
        $p_cart  = $prod->add_to_cart_url();
        $p_stars = $prod->get_average_rating();
        $p_count = $prod->get_rating_count();
      ?>
      <article class="group bg-white rounded-lg overflow-hidden shadow-[0_2px_12px_rgba(0,0,0,0.07)] hover:shadow-[0_8px_24px_rgba(0,0,0,0.12)] transition-shadow duration-300"
               aria-label="<?php echo esc_attr($p_title); ?>">
        <a href="<?php echo esc_url($p_url); ?>" class="block relative overflow-hidden" style="aspect-ratio:3/4">
          <img src="<?php echo esc_url($p_img); ?>"
               alt="<?php echo esc_attr($p_title); ?>"
               class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-[1.03]"
               loading="lazy">
          <span class="absolute top-2.5 left-2.5 px-2 py-0.5 text-[10px] font-bold uppercase tracking-wide bg-[#E8A23A] text-white rounded-full">🔥 Best Seller</span>
          <button class="absolute top-2.5 right-2.5 w-8 h-8 flex items-center justify-center bg-white/80 backdrop-blur-sm rounded-full text-[#D4B8A0] hover:text-[#E8567A] transition-colors"
                  aria-label="<?php printf(esc_attr__('Add %s to wishlist', 'dawp'), $p_title); ?>">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/>
            </svg>
          </button>
        </a>
        <div class="p-3">
          <h3 class="text-sm leading-tight mb-1 line-clamp-2 text-[#2B2B2B]"
              style="font-family:'Playfair Display',serif;font-weight:500">
            <a href="<?php echo esc_url($p_url); ?>" class="hover:text-[#E8567A] transition-colors">
              <?php echo esc_html($p_title); ?>
            </a>
          </h3>
          <div class="text-sm font-medium text-[#E8567A] mb-1"><?php echo $p_price; ?></div>
          <?php if ($p_stars > 0) : ?>
          <div class="flex items-center gap-0.5" aria-label="<?php echo esc_attr(number_format($p_stars, 1)); ?> out of 5 stars">
            <?php for ($s = 1; $s <= 5; $s++) : ?>
              <svg width="11" height="11" viewBox="0 0 24 24"
                   fill="<?php echo $s <= round($p_stars) ? '#D4B8A0' : 'none'; ?>"
                   stroke="#D4B8A0" stroke-width="2" aria-hidden="true">
                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
              </svg>
            <?php endfor; ?>
            <span class="text-[11px] text-[#D4B8A0] ml-0.5">(<?php echo esc_html($p_count); ?>)</span>
          </div>
          <?php endif; ?>
        </div>
      </article>
      <?php endforeach; ?>

      <?php if (empty($best_sellers)) : ?>
        <div class="col-span-2 lg:col-span-4 py-16 text-center text-[#D4B8A0]">
          <p class="text-sm">Popular items coming soon!</p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>


<!-- ===== TRUST & BENEFITS BAR ===== -->
<section class="py-10 bg-[#FDF8F4] border-y border-[#E8E0D8]" aria-label="Why shop with us">
  <div class="max-w-[1280px] mx-auto px-4 lg:px-6">
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">

      <div class="flex flex-col items-center text-center gap-3">
        <div class="flex items-center justify-center w-12 h-12 text-[#E8567A]">
          <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <rect x="1" y="3" width="15" height="13" rx="2"/><path d="M16 8h4l3 3v5h-7V8z"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/>
          </svg>
        </div>
        <div>
          <p class="text-sm font-semibold text-[#2B2B2B] mb-0.5">Fast Delivery</p>
          <p class="text-xs text-[#D4B8A0]">6-9 business day estimate</p>
        </div>
      </div>

      <div class="flex flex-col items-center text-center gap-3">
        <div class="flex items-center justify-center w-12 h-12 text-[#E8567A]">
          <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <polyline points="1 4 1 10 7 10"/><polyline points="23 20 23 14 17 14"/>
            <path d="M20.49 9A9 9 0 005.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 013.51 15"/>
          </svg>
        </div>
        <div>
          <p class="text-sm font-semibold text-[#2B2B2B] mb-0.5">30-Day Returns</p>
          <p class="text-xs text-[#D4B8A0]">For eligible items</p>
        </div>
      </div>

      <div class="flex flex-col items-center text-center gap-3">
        <div class="flex items-center justify-center w-12 h-12 text-[#E8567A]">
          <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/>
          </svg>
        </div>
        <div>
          <p class="text-sm font-semibold text-[#2B2B2B] mb-0.5">Secure Payment</p>
          <p class="text-xs text-[#D4B8A0]">Multiple cards accepted</p>
        </div>
      </div>

      <div class="flex flex-col items-center text-center gap-3">
        <div class="flex items-center justify-center w-12 h-12 text-[#E8567A]">
          <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 10.8a19.79 19.79 0 01-3.07-8.72A2 2 0 012 0h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 14.92z"/>
          </svg>
        </div>
        <div>
          <p class="text-sm font-semibold text-[#2B2B2B] mb-0.5">Live Support</p>
          <p class="text-xs text-[#D4B8A0]">Mon-Fri, 9-5 PST</p>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ===== EMAIL SIGN-UP ===== -->
<section class="py-20 lg:py-24 bg-[#2B2B2B]" aria-label="Newsletter signup">
  <div class="max-w-[1280px] mx-auto px-4 lg:px-6 text-center">
    <h2 class="mb-3"
        style="font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(28px,4vw,40px);font-weight:300;color:#FDF8F4;line-height:1.25">
      Join the Shopshive Circle
    </h2>
    <p class="text-sm text-white/65 max-w-md mx-auto mb-8 leading-relaxed">
      Get early access to new arrivals, exclusive offers, and style inspiration — straight to your inbox.
    </p>

    <div id="home-newsletter-form" class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto justify-center">
      <?php echo do_shortcode('[contact-form-7 id="ad93593" title="Email"]'); ?>
    </div>

    <div id="home-newsletter-success" class="hidden mt-4">
      <p class="text-[#5BAD8A] text-sm font-medium">✓ You're in! Check your inbox.</p>
    </div>

    <p class="mt-4 text-xs text-white/40">🔒 <?php esc_html_e('No spam. Unsubscribe anytime.', 'dawp'); ?></p>
  </div>
</section>


<style>
.hero-slide > img {
  object-position: center center;
}
@media (max-width: 767px) {
  section[aria-label="Featured campaign"] { height: 70vh !important; min-height: 420px !important; }
  .hero-slide[data-slide="0"] > img { object-position: 74% center; }
  .hero-slide[data-slide="1"] > img { object-position: 70% center; }
  .hero-slide[data-slide="2"] > img { object-position: 72% center; }
}
@media (prefers-reduced-motion: no-preference) {
  .hero-text-block .hero-line {
    animation: heroFadeUp 0.6s cubic-bezier(0.25, 0, 0.1, 1) forwards;
    opacity: 0;
  }
  .hero-text-block .hero-line:nth-child(1) { animation-delay: 0ms; }
  .hero-text-block .hero-line:nth-child(2) { animation-delay: 80ms; }
  .hero-text-block .hero-line:nth-child(3) { animation-delay: 160ms; }
  .hero-text-block .hero-line:nth-child(4) { animation-delay: 240ms; }
  @keyframes heroFadeUp {
    from { opacity: 0; transform: translateY(18px); }
    to   { opacity: 1; transform: translateY(0); }
  }
}
</style>

<script>
(function () {
  /* ---- Hero Slideshow ---- */
  var slides  = document.querySelectorAll('.hero-slide');
  var dots    = document.querySelectorAll('.hero-dot');
  var current = 0;
  var timer   = null;

  function showSlide(n) {
    var prev = current;
    current  = (n + slides.length) % slides.length;

    slides[prev].style.opacity      = '0';
    slides[prev].style.pointerEvents = 'none';
    dots[prev].classList.remove('scale-125');
    dots[prev].classList.add('bg-white/50');
    dots[prev].setAttribute('aria-selected', 'false');

    slides[current].style.opacity      = '1';
    slides[current].style.pointerEvents = '';
    dots[current].classList.add('scale-125');
    dots[current].classList.remove('bg-white/50');
    dots[current].setAttribute('aria-selected', 'true');
  }

  /* Init transitions + hide non-active slides */
  slides.forEach(function (s, i) {
    s.style.transition   = 'opacity 0.6s cubic-bezier(0.25, 0, 0.1, 1)';
    s.style.opacity      = i === 0 ? '1' : '0';
    s.style.pointerEvents = i === 0 ? '' : 'none';
  });

  dots.forEach(function (d, i) {
    d.addEventListener('click', function () {
      clearInterval(timer);
      showSlide(i);
      timer = setInterval(function () { showSlide(current + 1); }, 5000);
    });
  });

  var heroSection = document.querySelector('[aria-label="Featured campaign"]');
  if (heroSection) {
    heroSection.addEventListener('mouseenter', function () { clearInterval(timer); });
    heroSection.addEventListener('mouseleave', function () {
      timer = setInterval(function () { showSlide(current + 1); }, 5000);
    });
  }

  timer = setInterval(function () { showSlide(current + 1); }, 5000);

  /* ---- Newsletter form ---- */
  var form    = document.getElementById('home-newsletter-form');
  var input   = document.getElementById('home-email-input');
  var btn     = document.getElementById('home-subscribe-btn');
  var success = document.getElementById('home-newsletter-success');

  if (btn && input && form && success) {
    btn.addEventListener('click', function () {
      var val = input.value.trim();
      if (!val || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val)) {
        input.style.borderColor = '#D94F4F';
        input.focus();
        return;
      }
      form.classList.add('hidden');
      success.classList.remove('hidden');
    });
    input.addEventListener('input', function () {
      input.style.borderColor = '';
    });
  }
})();
</script>
