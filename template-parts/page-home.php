<main>
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-[#FAF7F2] to-[#FFF6F3] py-10 md:py-16">
      <div class="mx-auto grid w-[min(100%-32px,1180px)] grid-cols-1 items-center gap-10 lg:grid-cols-[1fr_0.95fr] lg:gap-12">
        <div>
          <p class="mb-3 text-xs font-bold uppercase tracking-[0.18em] text-[#C98A8A]">Women & Children Boutique</p>
          <h1 class="font-serif text-5xl leading-[0.95] tracking-[-0.04em] text-[#2F2A28] md:text-7xl">
            Sweet styles for everyday moments.
          </h1>
          <p class="mt-6 max-w-xl text-lg leading-8 text-[#6F625D]">
            Discover warm, wearable boutique fashion for women and young girls, from seasonal outfits to mommy and daughter favorites.
          </p>
          <div class="mt-8 flex flex-wrap gap-3">
            <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#C98A8A] bg-[#C98A8A] px-6 text-sm font-bold text-white transition hover:-translate-y-0.5 hover:bg-[#2F2A28] hover:border-[#2F2A28]">
              Shop Collections
            </a>
            <a href="<?php echo esc_url(home_url('/about-us/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#E6DDD6] bg-white px-6 text-sm font-bold text-[#2F2A28] transition hover:-translate-y-0.5 hover:bg-[#FAF7F2]">
              Our Brand Story
            </a>
          </div>
        </div>

        <div class="relative">
          <div class="overflow-hidden rounded-[28px] border-[10px] border-white bg-white shadow-[0_12px_30px_rgba(47,42,40,0.08)]">
            <img class="h-[420px] w-full object-cover md:h-[520px]" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/banner_baby.png'); ?>" alt="Mother and daughter boutique lifestyle fashion" />
          </div>
          <div class="absolute -left-6 bottom-7 hidden h-[270px] w-[230px] overflow-hidden rounded-[28px] border-[10px] border-white bg-white shadow-[0_12px_30px_rgba(47,42,40,0.08)] lg:block">
            <img class="h-full w-full object-cover" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/fashion_baby.png'); ?>" alt="Women's casual boutique style" />
          </div>
          <div class="absolute bottom-8 right-6 hidden max-w-[240px] rounded-2xl bg-white p-5 shadow-[0_12px_30px_rgba(47,42,40,0.08)] lg:block">
            <strong class="mb-1 block text-[#2F2A28]">Curated with care</strong>
            <p class="text-sm leading-6 text-[#6F625D]">Family-friendly styles for seasons, weekends, and everyday wear.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Shop By Collection -->
    <section class="py-14 md:py-20" id="women">
      <div class="mx-auto w-[min(100%-32px,1180px)]">
        <div class="mb-8 flex flex-col gap-5 md:flex-row md:items-end md:justify-between">
          <div>
            <p class="mb-3 text-xs font-bold uppercase tracking-[0.18em] text-[#C98A8A]">Shop By Collection</p>
            <h2 class="font-serif text-4xl leading-tight tracking-[-0.03em] md:text-5xl">Warm boutique favorites</h2>
          </div>
          <p class="max-w-lg text-[#6F625D]">Browse curated categories designed for women, young girls, and special family moments.</p>
        </div>

        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
          <a href="<?php echo esc_url(home_url('/product-category/girls-dresses/')); ?>" class="group relative min-h-[320px] overflow-hidden rounded-2xl bg-[#F5F3F1] shadow-sm">
            <img class="h-full min-h-[320px] w-full object-cover transition duration-300 group-hover:scale-105" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/babygirls_dress.png'); ?>" alt="Girls Dresses collection" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/45 to-black/5"></div>
            <div class="absolute bottom-5 left-5 right-5 text-white">
              <h3 class="font-serif text-2xl">Girls Dresses</h3>
              <p class="mt-1 text-sm text-white/90">Sweet floral patterns and twirl-worthy styles.</p>
            </div>
          </a>

          <a href="<?php echo esc_url(home_url('/product-category/mommy-me-matching-sets/')); ?>" id="mommy-me" class="group relative min-h-[320px] overflow-hidden rounded-2xl bg-[#F5F3F1] shadow-sm">
            <img class="h-full min-h-[320px] w-full object-cover transition duration-300 group-hover:scale-105" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Mom&me_collection.png'); ?>" alt="Mommy & Me collection" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/45 to-black/5"></div>
            <div class="absolute bottom-5 left-5 right-5 text-white">
              <h3 class="font-serif text-2xl">Mommy & Me</h3>
              <p class="mt-1 text-sm text-white/90">Matching outfits for you and your mini-me.</p>
            </div>
          </a>

          <a href="<?php echo esc_url(home_url('/product-category/women-casual/')); ?>" id="women-casual" class="group relative min-h-[320px] overflow-hidden rounded-2xl bg-[#F5F3F1] shadow-sm">
            <img class="h-full min-h-[320px] w-full object-cover transition duration-300 group-hover:scale-105" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/women_casual.png'); ?>" alt="Women Casual collection" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/45 to-black/5"></div>
            <div class="absolute bottom-5 left-5 right-5 text-white">
              <h3 class="font-serif text-2xl">Women Casual</h3>
              <p class="mt-1 text-sm text-white/90">Effortless pieces for your everyday look.</p>
            </div>
          </a>

          <a href="<?php echo esc_url(home_url('/product-category/baby-girl-boutique/')); ?>" id="baby-girl" class="group relative min-h-[320px] overflow-hidden rounded-2xl bg-[#F5F3F1] shadow-sm">
            <img class="h-full min-h-[320px] w-full object-cover transition duration-300 group-hover:scale-105" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Baby_girls.png'); ?>" alt="Baby Girl collection" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/45 to-black/5"></div>
            <div class="absolute bottom-5 left-5 right-5 text-white">
              <h3 class="font-serif text-2xl">Baby Girl</h3>
              <p class="mt-1 text-sm text-white/90">Soft fabrics and adorable first outfits.</p>
            </div>
          </a>
        </div>
      </div>
    </section>

    <!-- New Arrivals -->
    <section class="bg-[#FAF7F2] py-14 md:py-20" id="new-arrivals">
      <div class="mx-auto w-[min(100%-32px,1180px)]">
        <div class="mb-8 flex items-end justify-between gap-5">
          <div>
            <p class="mb-3 text-xs font-bold uppercase tracking-[0.18em] text-[#C98A8A]">Trending Now</p>
            <h2 class="font-serif text-4xl leading-tight tracking-[-0.03em] md:text-5xl">Top picks for you</h2>
          </div>
          <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="hidden min-h-12 items-center justify-center rounded-full border border-[#E6DDD6] bg-white px-6 text-sm font-bold text-[#2F2A28] transition hover:bg-[#FAF7F2] sm:inline-flex">View All</a>
        </div>

        <div class="grid grid-cols-2 gap-4 md:gap-6 lg:grid-cols-4">
          <?php
          $top_picks = wc_get_products( array(
            'status'  => 'publish',
            'limit'   => 4,
            'orderby' => 'date',
            'order'   => 'DESC',
          ) );
          foreach ( $top_picks as $product ) :
            $img_url = wp_get_attachment_image_url( $product->get_image_id(), 'woocommerce_thumbnail' );
            if ( ! $img_url ) $img_url = wc_placeholder_img_src( 'woocommerce_thumbnail' );
          ?>
          <article class="overflow-hidden rounded-2xl border border-[#E6DDD6] bg-white transition hover:-translate-y-0.5 hover:shadow-[0_12px_30px_rgba(47,42,40,0.08)]">
            <a href="<?php echo esc_url( $product->get_permalink() ); ?>">
              <img class="aspect-square w-full object-cover" src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $product->get_name() ); ?>" />
            </a>
            <div class="p-3 md:p-4">
              <h3 class="line-clamp-2 text-sm font-bold md:text-base"><?php echo esc_html( $product->get_name() ); ?></h3>
              <p class="mt-1 font-bold text-[#C98A8A]"><?php echo $product->get_price_html(); ?></p>
              <a href="<?php echo esc_url( $product->get_permalink() ); ?>" class="mt-3 inline-flex min-h-10 w-full items-center justify-center rounded-full border border-[#E6DDD6] bg-[#FAF7F2] text-xs font-bold text-[#2F2A28] md:text-sm">View Product</a>
            </div>
          </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- Mommy & Me Feature -->
    <section class="py-14 md:py-20">
      <div class="mx-auto grid w-[min(100%-32px,1180px)] grid-cols-1 items-center gap-6 lg:grid-cols-2">
        <div class="overflow-hidden rounded-[28px] bg-[#F5F3F1]">
          <img class="h-[420px] w-full object-cover md:h-[520px]" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Mom&me.png'); ?>" alt="Mommy and daughter boutique outfits" />
        </div>
        <div class="rounded-[28px] border border-[#E6DDD6] bg-white p-8 shadow-[0_12px_30px_rgba(47,42,40,0.08)] md:p-10">
          <p class="mb-3 text-xs font-bold uppercase tracking-[0.18em] text-[#C98A8A]">Mommy & Me</p>
          <h2 class="font-serif text-4xl leading-tight tracking-[-0.03em] md:text-5xl">Matching moments made beautifully simple.</h2>
          <p class="mt-5 text-[#6F625D]">
            Create sweet everyday memories with coordinated boutique styles for mothers and daughters. Soft colors, easy silhouettes, and seasonal pieces made for family photos, weekends, and special days.
          </p>
          <a href="<?php echo esc_url(home_url('/product-category/mommy-me-matching-sets/')); ?>" class="mt-7 inline-flex min-h-12 items-center justify-center rounded-full border border-[#C98A8A] bg-[#C98A8A] px-6 text-sm font-bold text-white transition hover:bg-[#2F2A28] hover:border-[#2F2A28]">Shop Matching Styles</a>
        </div>
      </div>
    </section>

    <!-- Seasonal Picks -->
    <section class="bg-[#FAF7F2] py-14 md:py-20">
      <div class="mx-auto w-[min(100%-32px,1180px)]">
        <div class="mb-8 flex flex-col gap-5 md:flex-row md:items-end md:justify-between">
          <div>
            <p class="mb-3 text-xs font-bold uppercase tracking-[0.18em] text-[#C98A8A]">Seasonal Boutique Picks</p>
            <h2 class="font-serif text-4xl leading-tight tracking-[-0.03em] md:text-5xl">Style for every little occasion</h2>
          </div>
          <p class="max-w-lg text-[#6F625D]">Simple seasonal collections help customers shop naturally without overwhelming the experience.</p>
        </div>

        <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
          <div class="rounded-2xl border border-[#E6DDD6] bg-white p-6">
            <h3 class="font-serif text-2xl">Spring Styles</h3>
            <p class="mt-3 text-[#6F625D]">Light layers, soft dresses, and cheerful everyday outfits for warmer days.</p>
          </div>
          <div class="rounded-2xl border border-[#E6DDD6] bg-white p-6">
            <h3 class="font-serif text-2xl">Girls Holiday Looks</h3>
            <p class="mt-3 text-[#6F625D]">Sweet pieces for family gatherings, photos, celebrations, and special moments.</p>
          </div>
          <div class="rounded-2xl border border-[#E6DDD6] bg-white p-6">
            <h3 class="font-serif text-2xl">Summer Favorites</h3>
            <p class="mt-3 text-[#6F625D]">Comfortable boutique essentials for sunny weekends and casual family outings.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Boutique Favorites -->
    <section class="py-14 md:py-20">
      <div class="mx-auto w-[min(100%-32px,1180px)]">
        <div class="mb-8 flex items-end justify-between gap-5">
          <div>
            <p class="mb-3 text-xs font-bold uppercase tracking-[0.18em] text-[#C98A8A]">Loved By The Boutique</p>
            <h2 class="font-serif text-4xl leading-tight tracking-[-0.03em] md:text-5xl">Boutique favorites</h2>
          </div>

        </div>

        <div class="grid grid-cols-2 gap-4 md:gap-6 lg:grid-cols-4">
          <?php
          $favorites = wc_get_products( array(
            'status'   => 'publish',
            'limit'    => 4,
            'orderby'  => 'date',
            'order'    => 'ASC',
          ) );
          if ( empty( $favorites ) ) {
            $favorites = wc_get_products( array(
              'status'  => 'publish',
              'limit'   => 4,
              'orderby' => 'date',
              'order'   => 'ASC',
            ) );
          }
          foreach ( $favorites as $product ) :
            $img_url = wp_get_attachment_image_url( $product->get_image_id(), 'woocommerce_thumbnail' );
            if ( ! $img_url ) $img_url = wc_placeholder_img_src( 'woocommerce_thumbnail' );
          ?>
          <article class="overflow-hidden rounded-2xl border border-[#E6DDD6] bg-white transition hover:-translate-y-0.5 hover:shadow-[0_12px_30px_rgba(47,42,40,0.08)]">
            <a href="<?php echo esc_url( $product->get_permalink() ); ?>">
              <img class="aspect-square w-full object-cover" src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $product->get_name() ); ?>" />
            </a>
            <div class="p-3 md:p-4">
              <h3 class="line-clamp-2 text-sm font-bold md:text-base"><?php echo esc_html( $product->get_name() ); ?></h3>
              <p class="mt-1 font-bold text-[#C98A8A]"><?php echo $product->get_price_html(); ?></p>
              <a href="<?php echo esc_url( $product->get_permalink() ); ?>" class="mt-3 inline-flex min-h-10 w-full items-center justify-center rounded-full border border-[#E6DDD6] bg-[#FAF7F2] text-xs font-bold text-[#2F2A28] md:text-sm">View Product</a>
            </div>
          </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- Trust Section -->
    <section class="bg-[#FAF7F2] py-14 md:py-20">
      <div class="mx-auto grid w-[min(100%-32px,1180px)] grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <div class="rounded-2xl border border-[#E6DDD6] bg-white p-6">
          <div class="mb-4 flex h-11 w-11 items-center justify-center rounded-full bg-[#FAF7F2] text-sm font-bold text-[#C98A8A]">01</div>
          <h3 class="font-serif text-2xl">Free Shipping</h3>
          <p class="mt-2 text-sm leading-6 text-[#6F625D]">Free standard shipping on all orders with tracking included.</p>
        </div>
        <div class="rounded-2xl border border-[#E6DDD6] bg-white p-6">
          <div class="mb-4 flex h-11 w-11 items-center justify-center rounded-full bg-[#FAF7F2] text-sm font-bold text-[#C98A8A]">02</div>
          <h3 class="font-serif text-2xl">30-Day Returns</h3>
          <p class="mt-2 text-sm leading-6 text-[#6F625D]">Simple returns on eligible unworn items in original condition.</p>
        </div>
        <div class="rounded-2xl border border-[#E6DDD6] bg-white p-6">
          <div class="mb-4 flex h-11 w-11 items-center justify-center rounded-full bg-[#FAF7F2] text-sm font-bold text-[#C98A8A]">03</div>
          <h3 class="font-serif text-2xl">Secure Checkout</h3>
          <p class="mt-2 text-sm leading-6 text-[#6F625D]">A clean and protected checkout experience for every order.</p>
        </div>
        <div class="rounded-2xl border border-[#E6DDD6] bg-white p-6">
          <div class="mb-4 flex h-11 w-11 items-center justify-center rounded-full bg-[#FAF7F2] text-sm font-bold text-[#C98A8A]">04</div>
          <h3 class="font-serif text-2xl">Friendly Support</h3>
          <p class="mt-2 text-sm leading-6 text-[#6F625D]">Helpful boutique customer support for order and product questions.</p>
        </div>
      </div>
    </section>

    <!-- About Brand -->
    <section class="py-14 md:py-20">
      <div class="mx-auto grid w-[min(100%-32px,1180px)] grid-cols-1 items-center gap-8 rounded-[28px] bg-[#FAF7F2] p-6 md:p-8 lg:grid-cols-[0.9fr_1.1fr]">
        <div class="overflow-hidden rounded-2xl">
          <img class="h-[360px] w-full object-cover md:h-[420px]" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mom_baby_store.png'); ?>" alt="Warm local boutique shopping experience" />
        </div>
        <div class="p-2 md:p-6">
          <p class="mb-3 text-xs font-bold uppercase tracking-[0.18em] text-[#C98A8A]">Our Boutique Story</p>
          <h2 class="font-serif text-4xl leading-tight tracking-[-0.03em] md:text-5xl">A warm shopping place for women and young girls.</h2>
          <p class="mt-5 max-w-xl text-[#6F625D]">
            Shop Kelli brings together curated women’s clothing, girls outfits, and seasonal boutique pieces for families who love comfortable, cheerful, and easy-to-wear style.
          </p>
          <a href="<?php echo esc_url(home_url('/about-us/')); ?>" class="mt-7 inline-flex min-h-12 items-center justify-center rounded-full border border-[#E6DDD6] bg-white px-6 text-sm font-bold text-[#2F2A28] transition hover:bg-[#FAF7F2]">Learn About Us</a>
        </div>
      </div>
    </section>

    <!-- Newsletter -->
    <section class="py-14 md:py-20">
      <div class="mx-auto grid w-[min(100%-32px,1180px)] grid-cols-1 items-center gap-8 rounded-[28px] bg-[#2F2A28] p-8 text-white md:p-12 lg:grid-cols-2">
        <div>
          <h2 class="font-serif text-4xl leading-tight tracking-[-0.03em] md:text-5xl">Join the boutique community</h2>
          <p class="mt-4 text-white/80">Get updates on new arrivals, seasonal collections, and warm family-friendly style inspiration.</p>
        </div>
        <div class="flex flex-col gap-3">
          <form id="newsletter-form" class="flex flex-col gap-3 rounded-2xl bg-white/10 p-2 sm:flex-row sm:rounded-full">
            <input class="min-h-12 flex-1 bg-transparent px-4 text-white placeholder:text-white/70 outline-none" type="email" placeholder="Enter your email" aria-label="Email address" required />
            <button class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#C98A8A] bg-[#C98A8A] px-6 text-sm font-bold text-white transition hover:bg-white hover:text-[#2F2A28]" type="submit">
              Sign Up
            </button>
          </form>
          <p id="newsletter-msg" aria-live="polite" style="display:none" class="text-center text-sm text-white/80"></p>
        </div>
      </div>
    </section>

    <!-- Gallery -->
    <section class="bg-[#FAF7F2] py-14 md:py-20">
      <div class="mx-auto w-[min(100%-32px,1180px)]">
        <div class="mb-8 text-center">
          <p class="mb-3 text-xs font-bold uppercase tracking-[0.18em] text-[#C98A8A]">Boutique Life</p>
          <h2 class="font-serif text-4xl leading-tight tracking-[-0.03em] md:text-5xl">From our gallery</h2>
        </div>
        <div class="grid grid-cols-2 gap-3 md:grid-cols-3 md:gap-4">
          <?php
          $gallery_imgs = ['gallery1','gallery2','gallery3','gallery4','gallery5','gallery6'];
          foreach ( $gallery_imgs as $img ) : ?>
          <div class="group overflow-hidden rounded-2xl">
            <img
              class="h-60 w-full object-cover transition duration-500 group-hover:scale-105 md:h-72"
              src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/gallery/' . $img . '.jpg' ); ?>"
              alt="Boutique lifestyle photo"
            />
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  </main>