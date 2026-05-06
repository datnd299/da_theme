<?php
/**
 * Template Part: About Us Page
 * Store: Elite Shop Express
 * Design System: Trusted Hardware — clean, practical, conversion-first
 */
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<div class="font-[Inter,system-ui,sans-serif] bg-white text-[#111111]">

  <!-- ░░ HERO BANNER ░░ -->
  <div class="bg-[#1B3A5C] py-14 px-6">
    <div class="max-w-[1280px] mx-auto">
      <p class="text-[#E8470A] text-xs font-semibold uppercase tracking-widest mb-3">About Us</p>
      <h1 class="text-white text-[clamp(2rem,5vw,3.25rem)] font-bold leading-tight mb-5 max-w-[720px]">
        Your One-Stop Shop for Home, Garden, Pet &amp; Auto
      </h1>
      <p class="text-slate-300 text-base leading-relaxed max-w-[600px] mb-8">
        At Elite Shop Express, we believe shopping should be simple, reliable, and enjoyable—no matter what you're looking for.
      </p>
      <div class="flex flex-wrap gap-3">
        <a href="<?php echo esc_url( home_url( '/shop/' ) ); ?>"
           class="inline-flex items-center gap-2 bg-[#E8470A] hover:bg-[#C93D08] active:scale-[0.97] text-white font-semibold text-[0.9375rem] px-6 py-3 rounded-md min-h-[44px] transition-colors duration-150 no-underline">
          Shop Now
        </a>
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"
           class="inline-flex items-center gap-2 bg-transparent hover:bg-[#475569] border-2 border-slate-500 text-slate-300 font-semibold text-[0.9375rem] px-6 py-[10px] rounded-md min-h-[44px] transition-colors duration-150 no-underline">
          Contact Us
        </a>
      </div>
    </div>
  </div>

  <!-- ░░ TRUST BAR ░░ -->
  <div class="bg-[#254E7A] py-3 px-6">
    <div class="max-w-[1280px] mx-auto flex flex-wrap gap-4 gap-x-8 justify-center items-center">
      <span class="text-white text-[0.8125rem] font-medium whitespace-nowrap">🚚 Free Shipping on All Orders</span>
      <span class="text-white text-[0.8125rem] font-medium whitespace-nowrap">↩️ 30-Day Returns</span>
      <span class="text-white text-[0.8125rem] font-medium whitespace-nowrap">🇺🇸 US-Based Support</span>
      <a href="tel:4072551197" class="text-white text-[0.8125rem] font-medium no-underline whitespace-nowrap">📞 407-255-1197</a>
    </div>
  </div>

  <!-- ░░ MAIN CONTENT ░░ -->
  <div class="max-w-[1280px] mx-auto px-6 py-16">

    <!-- Quick Stats -->
    <div class="grid grid-cols-[repeat(auto-fit,minmax(180px,1fr))] gap-4 mb-16">
      <?php
      $stats = [
        [ 'val' => 'Free',        'label' => 'Shipping',         'sub'  => 'On all US orders' ],
        [ 'val' => '30 Days',     'label' => 'Return Window',     'sub'  => 'Hassle-free' ],
        [ 'val' => '5 Categories','label' => 'Product Ranges',    'sub'  => 'Home · Garden · Pet · Auto' ],
        [ 'val' => '100%',        'label' => 'Tracked Orders',    'sub'  => 'Real-time updates' ],
      ];
      foreach ( $stats as $s ) : ?>
        <div class="bg-[#F5F5F5] border border-[#E2E2E2] rounded-md p-6">
          <p class="text-[1.625rem] font-bold text-[#111111] mb-1"><?php echo esc_html( $s['val'] ); ?></p>
          <p class="text-[0.9375rem] font-semibold text-[#111111] mb-1"><?php echo esc_html( $s['label'] ); ?></p>
          <p class="text-xs text-[#888888] m-0"><?php echo esc_html( $s['sub'] ); ?></p>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Sections stack -->
    <div class="grid grid-cols-1 gap-16">

      <!-- ── WHO WE ARE ── -->
      <section>
        <p class="text-xs font-semibold uppercase tracking-widest text-[#E8470A] mb-2">Who We Are</p>
        <h2 class="text-[clamp(1.375rem,3vw,1.875rem)] font-semibold text-[#111111] mb-4">Based in Orlando, FL. Built for Everyday Americans.</h2>
        <p class="text-[0.9375rem] text-[#555555] leading-[1.75] mb-4">
          Elite Shop Express is a customer-focused online store based in <strong class="text-[#111111]">Orlando, Florida</strong>, dedicated to offering a wide range of practical, affordable, and innovative products.
        </p>
        <p class="text-[0.9375rem] text-[#555555] leading-[1.75]">
          We carefully curate items across multiple categories so you can find what you need in one place—without the hassle of visiting multiple stores. Whether you're upgrading your home, improving your garden, caring for your pets, or maintaining your vehicle, we aim to be your trusted go-to destination.
        </p>
      </section>

      <!-- ── WHAT WE OFFER ── -->
      <section>
        <p class="text-xs font-semibold uppercase tracking-widest text-[#E8470A] mb-2">What We Offer</p>
        <h2 class="text-[clamp(1.375rem,3vw,1.875rem)] font-semibold text-[#111111] mb-4">Five Categories. One Trusted Store.</h2>
        <p class="text-[0.9375rem] text-[#555555] leading-[1.75] mb-6">
          Every product in our store is selected with a focus on functionality, durability, and value.
        </p>
        <div class="grid grid-cols-[repeat(auto-fit,minmax(200px,1fr))] gap-3">
          <?php
          $categories = [
            [ 'icon' => '🏠', 'name' => 'Home &amp; Living',           'desc' => 'Essentials for every room' ],
            [ 'icon' => '🌿', 'name' => 'Lawn &amp; Garden',           'desc' => 'Tools for outdoor spaces' ],
            [ 'icon' => '🐾', 'name' => 'Pet Care',                    'desc' => 'Supplies for your animals' ],
            [ 'icon' => '🚗', 'name' => 'Car Parts &amp; Accessories', 'desc' => 'Keep your vehicle ready' ],
            [ 'icon' => '🔧', 'name' => 'Automotive Tools',            'desc' => 'Equipment that works hard' ],
          ];
          foreach ( $categories as $cat ) : ?>
            <div class="bg-[#F5F5F5] border border-[#E2E2E2] rounded-md p-4 flex items-start gap-3">
              <span class="text-2xl flex-shrink-0 leading-none"><?php echo $cat['icon']; ?></span>
              <div>
                <p class="text-sm font-semibold text-[#111111] mb-0.5"><?php echo $cat['name']; ?></p>
                <p class="text-xs text-[#888888] m-0"><?php echo esc_html( $cat['desc'] ); ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </section>

      <!-- ── OUR MISSION ── -->
      <section class="bg-[#1B3A5C] rounded-md px-8 py-10">
        <p class="text-xs font-semibold uppercase tracking-widest text-[#E8470A] mb-2">Our Mission</p>
        <h2 class="text-[clamp(1.375rem,3vw,1.875rem)] font-semibold text-white mb-4">Quality Products. Fair Prices. Seamless Experience.</h2>
        <p class="text-base text-slate-300 leading-[1.75] mb-4">
          Our goal is simple: <strong class="text-white">To deliver quality products at fair prices while providing a seamless shopping experience.</strong>
        </p>
        <p class="text-[0.9375rem] text-slate-400 leading-[1.75]">
          We continuously work to improve our catalog, optimize our logistics, and enhance customer support—so you can shop with confidence every time.
        </p>
      </section>

      <!-- ── WHY CHOOSE US ── -->
      <section>
        <p class="text-xs font-semibold uppercase tracking-widest text-[#E8470A] mb-2">Why Choose Us</p>
        <h2 class="text-[clamp(1.375rem,3vw,1.875rem)] font-semibold text-[#111111] mb-6">Here's What Sets Us Apart</h2>
        <div class="grid grid-cols-[repeat(auto-fit,minmax(260px,1fr))] gap-4">
          <?php
          $reasons = [
            [ 'icon' => '🚚', 'title' => 'Free Shipping on All Orders',  'desc' => 'No hidden fees—what you see is what you pay.' ],
            [ 'icon' => '⏱️', 'title' => 'Fast &amp; Reliable Processing', 'desc' => 'Orders processed within 3–5 business days and shipped promptly.' ],
            [ 'icon' => '📦', 'title' => 'Tracked Deliveries',            'desc' => 'Stay updated with real-time tracking on every order.' ],
            [ 'icon' => '↩️', 'title' => '30-Day Return Policy',          'desc' => 'Not satisfied? We make returns simple and straightforward.' ],
            [ 'icon' => '💬', 'title' => 'Responsive Customer Support',   'desc' => 'Our team is here to help with any questions or concerns.' ],
          ];
          foreach ( $reasons as $r ) : ?>
            <div class="border border-[#E2E2E2] rounded-md p-6 flex gap-4 items-start">
              <span class="text-[1.75rem] flex-shrink-0 leading-none mt-0.5"><?php echo $r['icon']; ?></span>
              <div>
                <p class="text-[0.9375rem] font-semibold text-[#111111] mb-1.5"><?php echo $r['title']; ?></p>
                <p class="text-sm text-[#555555] leading-[1.65] m-0"><?php echo esc_html( $r['desc'] ); ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </section>

      <!-- ── QUALITY + CUSTOMER FIRST (2-col on desktop) ── -->
      <div class="grid grid-cols-[repeat(auto-fit,minmax(280px,1fr))] gap-6">
        <section class="bg-[#F5F5F5] border border-[#E2E2E2] rounded-md p-8">
          <p class="text-xs font-semibold uppercase tracking-widest text-[#E8470A] mb-2">Commitment to Quality</p>
          <h2 class="text-xl font-semibold text-[#111111] mb-3">Trusted Suppliers. Dependable Products.</h2>
          <p class="text-[0.9375rem] text-[#555555] leading-[1.75] m-0">
            We work with trusted suppliers and carefully review every product to ensure it meets our standards. Our commitment is to provide items that are not only useful but also dependable—because trust is everything in online shopping.
          </p>
        </section>
        <section class="bg-[#F5F5F5] border border-[#E2E2E2] rounded-md p-8">
          <p class="text-xs font-semibold uppercase tracking-widest text-[#E8470A] mb-2">Customer First, Always</p>
          <h2 class="text-xl font-semibold text-[#111111] mb-3">You Are at the Center of Everything We Do.</h2>
          <p class="text-[0.9375rem] text-[#555555] leading-[1.75] m-0">
            From browsing to delivery and beyond, we strive to provide a smooth and satisfying experience. Your satisfaction is our priority—and we're always here to support you.
          </p>
        </section>
      </div>

      <!-- ── CONTACT US ── -->
      <section>
        <p class="text-xs font-semibold uppercase tracking-widest text-[#E8470A] mb-2">Contact Us</p>
        <h2 class="text-[clamp(1.375rem,3vw,1.875rem)] font-semibold text-[#111111] mb-2">We'd Love to Hear From You</h2>
        <p class="text-[0.9375rem] text-[#555555] mb-8">Have questions or need assistance? Reach out—we're here to help.</p>

        <div class="grid grid-cols-[repeat(auto-fit,minmax(240px,1fr))] gap-4 mb-8">

          <!-- Address -->
          <div class="border border-[#E2E2E2] rounded-md p-5 flex gap-3.5 items-start">
            <span class="text-xl flex-shrink-0">📍</span>
            <div>
              <p class="text-xs font-semibold uppercase tracking-[0.06em] text-[#888888] mb-1">Address</p>
              <p class="text-[0.9375rem] text-[#111111] leading-[1.5] m-0">3589 South Orange Avenue,<br>Orlando, FL 32806, US</p>
            </div>
          </div>

          <!-- Email -->
          <div class="border border-[#E2E2E2] rounded-md p-5 flex gap-3.5 items-start">
            <span class="text-xl flex-shrink-0">📧</span>
            <div>
              <p class="text-xs font-semibold uppercase tracking-[0.06em] text-[#888888] mb-1">Email</p>
              <a href="mailto:support@eliteshopexpress.com"
                 class="text-[0.9375rem] text-[#1B3A5C] font-semibold underline break-all">
                support@eliteshopexpress.com
              </a>
            </div>
          </div>

          <!-- Phone -->
          <div class="border border-[#E2E2E2] rounded-md p-5 flex gap-3.5 items-start">
            <span class="text-xl flex-shrink-0">📞</span>
            <div>
              <p class="text-xs font-semibold uppercase tracking-[0.06em] text-[#888888] mb-1">Phone</p>
              <a href="tel:4072551197" class="text-[0.9375rem] text-[#1B3A5C] font-semibold underline">407-255-1197</a>
            </div>
          </div>

          <!-- Business Hours -->
          <div class="border border-[#E2E2E2] rounded-md p-5 flex gap-3.5 items-start">
            <span class="text-xl flex-shrink-0">🕒</span>
            <div>
              <p class="text-xs font-semibold uppercase tracking-[0.06em] text-[#888888] mb-1">Business Hours</p>
              <p class="text-[0.9375rem] text-[#111111] leading-[1.5] m-0">Mon – Fri<br>9:00 AM – 6:00 PM CST</p>
            </div>
          </div>

        </div>

        <!-- Facebook CTA -->
        <div class="bg-[#F5F5F5] border border-[#E2E2E2] rounded-md p-6 flex flex-wrap gap-4 items-center justify-between">
          <div class="flex gap-3.5 items-center">
            <span class="w-11 h-11 bg-[#1877F2] rounded-md flex items-center justify-center flex-shrink-0">
              <svg width="22" height="22" fill="#fff" viewBox="0 0 24 24" aria-hidden="true"><path d="M22 12c0-5.522-4.477-10-10-10S2 6.478 2 12c0 4.991 3.657 9.128 8.438 9.878V14.89h-2.54V12h2.54V9.797c0-2.507 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
            </span>
            <div>
              <p class="text-sm font-semibold text-[#111111] mb-0.5">Follow us on Facebook</p>
              <p class="text-[0.8125rem] text-[#888888] m-0">Stay updated with new arrivals and offers</p>
            </div>
          </div>
          <a href="https://www.facebook.com/eliteshopexpress/" target="_blank" rel="noopener noreferrer"
             class="inline-flex items-center gap-2 bg-[#1877F2] hover:bg-[#1665d8] text-white font-semibold text-sm px-5 py-2.5 rounded-md no-underline min-h-[44px] whitespace-nowrap transition-colors duration-150">
            facebook.com/eliteshopexpress
          </a>
        </div>
      </section>

    </div><!-- /sections stack -->
  </div><!-- /container -->

  <!-- ░░ BOTTOM CTA BAND ░░ -->
  <div class="bg-[#E8470A] py-12 px-6 text-center">
    <div class="max-w-[640px] mx-auto">
      <h2 class="text-[clamp(1.5rem,3vw,2rem)] font-bold text-white mb-3">Ready to Shop?</h2>
      <p class="text-base text-white/85 mb-7">Free shipping on every order. 30-day returns. Real-time tracking.</p>
      <a href="<?php echo esc_url( home_url( '/shop/' ) ); ?>"
         class="inline-flex items-center gap-2 bg-white hover:opacity-90 text-[#E8470A] font-bold text-[0.9375rem] px-8 py-3.5 rounded-md no-underline min-h-[44px] transition-opacity duration-150">
        Browse All Products →
      </a>
    </div>
  </div>

</div><!-- /about-page -->
