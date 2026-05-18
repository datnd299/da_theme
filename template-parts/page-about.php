<?php
/**
 * About Us template part — Shopshive
 * Sections: Hero · Our Story · Mission & Values · Why Us · Stats · Categories · CTA
 */
?>

<!-- ===== HERO ===== -->
<section class="relative overflow-hidden bg-[#F5E6DC]" style="min-height:480px" aria-label="About hero">
  <div class="absolute inset-0 bg-gradient-to-br from-[#F5E6DC] via-[#F2A8BC]/25 to-[#E8567A]/15"></div>
  <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-[#FDF8F4]/60"></div>

  <div class="relative z-10 max-w-[1280px] mx-auto px-6 lg:px-12 py-24 lg:py-32 flex flex-col items-center text-center">
    <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#E8567A] mb-5">Our Story</p>
    <h1 class="mb-6 text-[#2B2B2B] leading-[1.1]"
        style="font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(40px,6vw,68px);font-weight:300">
      Open Doors To A<br><em>World Of Fashion</em>
    </h1>
    <p class="text-base lg:text-lg text-[#2B2B2B]/70 max-w-2xl leading-relaxed mb-10">
      We believe every woman deserves to feel confident, beautiful, and effortlessly stylish — no matter the occasion. Shopshive was built to make that possible.
    </p>
    <a href="<?php echo esc_url(home_url('/shop/')); ?>"
       class="inline-flex items-center gap-2 px-7 py-3.5 bg-[#E8567A] text-white text-sm font-semibold rounded-full hover:bg-[#d14469] transition-all duration-300 hover:scale-[1.02] active:scale-[0.98]">
      Explore The Collection
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
    </a>
  </div>
</section>

<!-- ===== OUR STORY ===== -->
<section class="bg-[#FDF8F4] py-20 lg:py-28" aria-label="Our story">
  <div class="max-w-[1280px] mx-auto px-6 lg:px-12">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">

      <!-- Image placeholder -->
      <div class="relative">
        <div class="aspect-[4/5] rounded-2xl overflow-hidden bg-[#F5E6DC]">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/shopshive/About%231.png'); ?>"
               alt="<?php esc_attr_e('Shopshive brand story', 'dawp'); ?>"
               class="h-full w-full object-cover">
        </div>
        <!-- Floating badge -->
        <div class="absolute -bottom-5 -right-4 lg:-right-8 bg-white rounded-2xl shadow-lg px-6 py-4 border border-[#F5E6DC]">
          <p class="text-xs text-[#2B2B2B]/50 uppercase tracking-wider mb-1">Est.</p>
          <p class="text-3xl font-semibold text-[#E8567A]" style="font-family:'Playfair Display',serif">2020</p>
        </div>
      </div>

      <!-- Text -->
      <div>
        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#E8567A] mb-4">Who We Are</p>
        <h2 class="mb-6 text-[#2B2B2B] leading-tight"
            style="font-family:'Playfair Display',serif;font-size:clamp(28px,3vw,40px);font-weight:500">
          Fashion That Feels Like You
        </h2>
        <div class="space-y-4 text-[14px] lg:text-[15px] text-[#2B2B2B]/70 leading-relaxed">
          <p>
            Shopshive started with a simple idea: every woman should have access to stylish, high-quality clothing without breaking the bank. Based in Merced, California, we launched our online store to bring the best of contemporary women's fashion directly to your doorstep — anywhere in the United States.
          </p>
          <p>
            From flowy dresses perfect for weekend brunches to sharp blouses for the boardroom, our curated collection is designed to carry you through every chapter of your life. We handpick each piece with real women in mind — real shapes, real lifestyles, real moments.
          </p>
          <p>
            Today, Shopshive serves thousands of customers across the country, and we're still guided by that same founding belief: <strong class="text-[#2B2B2B]">fashion should open doors, not close them.</strong>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== MISSION & VALUES ===== -->
<section class="bg-[#F5E6DC] py-20 lg:py-28" aria-label="Mission and values">
  <div class="max-w-[1280px] mx-auto px-6 lg:px-12">
    <div class="text-center mb-14">
      <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#E8567A] mb-4">What Drives Us</p>
      <h2 class="text-[#2B2B2B] leading-tight"
          style="font-family:'Playfair Display',serif;font-size:clamp(24px,3vw,36px);font-weight:500">
        Our Mission & Values
      </h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

      <!-- Value 1 -->
      <div class="bg-white rounded-2xl p-8 shadow-sm border border-[#F5E6DC] hover:shadow-md transition-shadow duration-300">
        <div class="w-12 h-12 rounded-full bg-[#F5E6DC] flex items-center justify-center mb-6">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        </div>
        <h3 class="text-[#2B2B2B] font-semibold text-lg mb-3" style="font-family:'Playfair Display',serif">Quality First</h3>
        <p class="text-[14px] text-[#2B2B2B]/65 leading-relaxed">
          Every item in our store is carefully selected for quality craftsmanship and lasting style. We don't compromise — and neither should you.
        </p>
      </div>

      <!-- Value 2 -->
      <div class="bg-white rounded-2xl p-8 shadow-sm border border-[#F5E6DC] hover:shadow-md transition-shadow duration-300">
        <div class="w-12 h-12 rounded-full bg-[#F5E6DC] flex items-center justify-center mb-6">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        </div>
        <h3 class="text-[#2B2B2B] font-semibold text-lg mb-3" style="font-family:'Playfair Display',serif">Inclusive Style</h3>
        <p class="text-[14px] text-[#2B2B2B]/65 leading-relaxed">
          Fashion is for every body and every woman. We celebrate diversity and offer styles that flatter and inspire, no matter your shape or size.
        </p>
      </div>

      <!-- Value 3 -->
      <div class="bg-white rounded-2xl p-8 shadow-sm border border-[#F5E6DC] hover:shadow-md transition-shadow duration-300">
        <div class="w-12 h-12 rounded-full bg-[#F5E6DC] flex items-center justify-center mb-6">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
        </div>
        <h3 class="text-[#2B2B2B] font-semibold text-lg mb-3" style="font-family:'Playfair Display',serif">Customer Love</h3>
        <p class="text-[14px] text-[#2B2B2B]/65 leading-relaxed">
          You're not just a customer — you're our community. From easy returns to personal support, we're here for every step of your shopping journey.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- ===== STATS ===== -->
<section class="bg-[#2B2B2B] py-16 lg:py-20" aria-label="Brand achievements">
  <div class="max-w-[1280px] mx-auto px-6 lg:px-12">
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 text-center">

      <div>
        <p class="text-4xl lg:text-5xl font-light text-[#E8567A] mb-2"
           style="font-family:'Cormorant Garamond',Georgia,serif">5K+</p>
        <p class="text-xs uppercase tracking-[0.15em] text-white/60">Happy Customers</p>
      </div>

      <div>
        <p class="text-4xl lg:text-5xl font-light text-[#E8567A] mb-2"
           style="font-family:'Cormorant Garamond',Georgia,serif">500+</p>
        <p class="text-xs uppercase tracking-[0.15em] text-white/60">Styles Available</p>
      </div>

      <div>
        <p class="text-4xl lg:text-5xl font-light text-[#E8567A] mb-2"
           style="font-family:'Cormorant Garamond',Georgia,serif">6</p>
        <p class="text-xs uppercase tracking-[0.15em] text-white/60">Fashion Categories</p>
      </div>

      <div>
        <p class="text-4xl lg:text-5xl font-light text-[#E8567A] mb-2"
           style="font-family:'Cormorant Garamond',Georgia,serif">30</p>
        <p class="text-xs uppercase tracking-[0.15em] text-white/60">Day Easy Returns</p>
      </div>
    </div>
  </div>
</section>

<!-- ===== WHY SHOP WITH US ===== -->
<section class="bg-[#FDF8F4] py-20 lg:py-28" aria-label="Why choose Shopshive">
  <div class="max-w-[1280px] mx-auto px-6 lg:px-12">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">

      <!-- Text -->
      <div>
        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#E8567A] mb-4">Why Shopshive</p>
        <h2 class="mb-8 text-[#2B2B2B] leading-tight"
            style="font-family:'Playfair Display',serif;font-size:clamp(24px,3vw,36px);font-weight:500">
          Shopping Made Easy,<br>Style Made Personal
        </h2>

        <ul class="space-y-6">
          <li class="flex items-start gap-4">
            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-[#F5E6DC] flex items-center justify-center mt-0.5">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </div>
            <div>
              <h4 class="font-semibold text-[#2B2B2B] mb-1">Free Shipping On Every Order</h4>
              <p class="text-[14px] text-[#2B2B2B]/60 leading-relaxed">No minimum spend required. We ship all orders across the United States, completely free.</p>
            </div>
          </li>

          <li class="flex items-start gap-4">
            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-[#F5E6DC] flex items-center justify-center mt-0.5">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="23 4 23 10 17 10"/><path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"/></svg>
            </div>
            <div>
              <h4 class="font-semibold text-[#2B2B2B] mb-1">Hassle-Free 30-Day Returns</h4>
              <p class="text-[14px] text-[#2B2B2B]/60 leading-relaxed">Not in love with your purchase? Exchange or return within 30 days — no questions asked.</p>
            </div>
          </li>

          <li class="flex items-start gap-4">
            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-[#F5E6DC] flex items-center justify-center mt-0.5">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
            </div>
            <div>
              <h4 class="font-semibold text-[#2B2B2B] mb-1">Flexible & Secure Payments</h4>
              <p class="text-[14px] text-[#2B2B2B]/60 leading-relaxed">Pay your way with all major credit cards. Every transaction is encrypted and protected.</p>
            </div>
          </li>

          <li class="flex items-start gap-4">
            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-[#F5E6DC] flex items-center justify-center mt-0.5">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13.6a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 2.9h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
            </div>
            <div>
              <h4 class="font-semibold text-[#2B2B2B] mb-1">Real People. Real Support.</h4>
              <p class="text-[14px] text-[#2B2B2B]/60 leading-relaxed">Our team is available Mon–Sat, 10 AM–6 PM PST. Call us at +1 (760) 383 0494 or email support@shopshive.com.</p>
            </div>
          </li>
        </ul>
      </div>

      <!-- Image placeholder -->
      <div class="relative order-first lg:order-last">
        <div class="aspect-square rounded-2xl overflow-hidden bg-[#F5E6DC]">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/shopshive/About%232.png'); ?>"
               alt="<?php esc_attr_e('Shopshive shopping experience', 'dawp'); ?>"
               class="h-full w-full object-cover">
        </div>
        <!-- Decorative ring -->
        <div class="absolute -top-4 -left-4 w-32 h-32 rounded-full border-2 border-[#F2A8BC]/50 pointer-events-none"></div>
      </div>
    </div>
  </div>
</section>

<!-- ===== CATEGORIES ===== -->
<section class="bg-[#F5E6DC] py-20 lg:py-28" aria-label="Our categories">
  <div class="max-w-[1280px] mx-auto px-6 lg:px-12">
    <div class="text-center mb-14">
      <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#E8567A] mb-4">What We Offer</p>
      <h2 class="text-[#2B2B2B] leading-tight"
          style="font-family:'Playfair Display',serif;font-size:clamp(24px,3vw,36px);font-weight:500">
        Six Categories, Endless Possibilities
      </h2>
      <p class="mt-4 text-[14px] text-[#2B2B2B]/60 max-w-xl mx-auto leading-relaxed">
        From everyday essentials to statement pieces — Shopshive covers every corner of your wardrobe.
      </p>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
      <?php
        $categories = [
          ['name' => 'Dresses',         'icon' => 'M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14H9V8h2v8zm4 0h-2V8h2v8z'],
          ['name' => 'Blouses & Shirts','icon' => 'M20.38 8.57l-1.23 1.85a8 8 0 0 1-.22 7.58H5.07A8 8 0 0 1 15.58 6.85l1.85-1.23A10 10 0 0 0 3.35 19a2 2 0 0 0 1.72 1h13.85a2 2 0 0 0 1.74-1 10 10 0 0 0-.27-10.44zm-9.79 6.84a2 2 0 0 0 2.83 0l5.66-8.49-8.49 5.66a2 2 0 0 0 0 2.83z'],
          ['name' => 'Tops',            'icon' => 'M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z'],
          ['name' => 'Pants',           'icon' => 'M9 3h6l1 9-3 9H11L8 12l1-9z'],
          ['name' => 'Shorts',          'icon' => 'M9 3h6l1 7H8L9 3zm-1 7h8l1 3H7l1-3z'],
          ['name' => 'Footwear',        'icon' => 'M2 17l2 3h16l2-3V7H2v10z'],
        ];
        foreach ( $categories as $cat ) :
      ?>
      <a href="<?php echo esc_url( home_url('/shop/?product_cat=' . sanitize_title($cat['name']) ) ); ?>"
         class="group flex flex-col items-center gap-3 bg-white rounded-2xl p-6 shadow-sm border border-white hover:border-[#F2A8BC] hover:shadow-md transition-all duration-300">
        <div class="w-12 h-12 rounded-full bg-[#F5E6DC] group-hover:bg-[#F2A8BC]/30 flex items-center justify-center transition-colors duration-300">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="<?php echo esc_attr($cat['icon']); ?>"/>
          </svg>
        </div>
        <span class="text-xs font-semibold text-[#2B2B2B] text-center tracking-wide group-hover:text-[#E8567A] transition-colors duration-300">
          <?php echo esc_html($cat['name']); ?>
        </span>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===== VISIT US / CONTACT STRIP ===== -->
<section class="bg-white py-16" aria-label="Contact information">
  <div class="max-w-[1280px] mx-auto px-6 lg:px-12">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">

      <div class="flex flex-col items-center gap-3">
        <div class="w-12 h-12 rounded-full bg-[#F5E6DC] flex items-center justify-center">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
        </div>
        <h4 class="font-semibold text-[#2B2B2B]" style="font-family:'Playfair Display',serif">Our Address</h4>
        <p class="text-[13px] text-[#2B2B2B]/60 leading-relaxed">
          885 Roselyn Lakes, South Vidashire, IL 37334, USA
        </p>
      </div>

      <div class="flex flex-col items-center gap-3">
        <div class="w-12 h-12 rounded-full bg-[#F5E6DC] flex items-center justify-center">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13.6a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 2.9h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        </div>
        <h4 class="font-semibold text-[#2B2B2B]" style="font-family:'Playfair Display',serif">Call Us</h4>
        <p class="text-[13px] text-[#2B2B2B]/60 leading-relaxed">
          <a href="tel:+17603830494" class="hover:text-[#E8567A] transition-colors">+1 (760) 383 0494</a><br>
          Mon – Sat, 10:00 AM – 6:00 PM PST
        </p>
      </div>

      <div class="flex flex-col items-center gap-3">
        <div class="w-12 h-12 rounded-full bg-[#F5E6DC] flex items-center justify-center">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        </div>
        <h4 class="font-semibold text-[#2B2B2B]" style="font-family:'Playfair Display',serif">Email Us</h4>
        <p class="text-[13px] text-[#2B2B2B]/60 leading-relaxed">
          <a href="mailto:support@shopshive.com" class="hover:text-[#E8567A] transition-colors">support@shopshive.com</a><br>
          We reply within 24 hours
        </p>
      </div>
    </div>
  </div>
</section>

<!-- ===== CTA BANNER ===== -->
<section class="bg-[#E8567A] py-16 lg:py-20" aria-label="Shop now call to action">
  <div class="max-w-[1280px] mx-auto px-6 lg:px-12 text-center">
    <h2 class="mb-4 text-white leading-tight"
        style="font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(32px,5vw,56px);font-weight:300">
      Ready to Open the Door?
    </h2>
    <p class="text-white/80 text-base mb-8 max-w-lg mx-auto leading-relaxed">
      Discover hundreds of styles made for the modern woman. Free shipping on every order.
    </p>
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
      <a href="<?php echo esc_url(home_url('/shop/')); ?>"
         class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white text-[#E8567A] text-sm font-semibold rounded-full hover:bg-[#FDF8F4] transition-all duration-300 hover:scale-[1.02] active:scale-[0.98]">
        Shop All Styles
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
      <a href="<?php echo esc_url(home_url('/contact/')); ?>"
         class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-transparent border-2 border-white text-white text-sm font-semibold rounded-full hover:bg-white/10 transition-all duration-300">
        Get In Touch
      </a>
    </div>
  </div>
</section>
