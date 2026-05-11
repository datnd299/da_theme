<?php
/**
 * Shipping & Returns template part — Shopshive
 * Sections: Hero · Shipping Policy · Returns & Exchanges · Process Steps · Contact CTA
 */
?>

<!-- ===== HERO ===== -->
<section class="relative overflow-hidden bg-[#F5E6DC]" style="min-height:400px" aria-label="Shipping and returns hero">
  <div class="absolute inset-0 bg-gradient-to-br from-[#F5E6DC] via-[#F2A8BC]/25 to-[#E8567A]/15"></div>
  <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-[#FDF8F4]/60"></div>

  <div class="relative z-10 max-w-[1280px] mx-auto px-6 lg:px-12 py-20 lg:py-28 flex flex-col items-center text-center">
    <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#E8567A] mb-5">Policies</p>
    <h1 class="mb-6 text-[#2B2B2B] leading-[1.1]"
        style="font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(36px,5.5vw,64px);font-weight:300">
      Shipping &amp; <em>Returns</em>
    </h1>
    <p class="text-base lg:text-lg text-[#2B2B2B]/70 max-w-2xl leading-relaxed">
      We want your shopping experience to be seamless from checkout to your doorstep — and back if needed. Here's everything you need to know.
    </p>

    <!-- Quick highlights -->
    <div class="mt-10 flex flex-wrap justify-center gap-4">
      <div class="flex items-center gap-2 bg-white/70 backdrop-blur-sm border border-[#F2A8BC]/40 rounded-full px-5 py-2.5">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
        <span class="text-xs font-semibold text-[#2B2B2B]">Free Shipping On All Orders</span>
      </div>
      <div class="flex items-center gap-2 bg-white/70 backdrop-blur-sm border border-[#F2A8BC]/40 rounded-full px-5 py-2.5">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="23 4 23 10 17 10"/><path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"/></svg>
        <span class="text-xs font-semibold text-[#2B2B2B]">30-Day Returns &amp; Exchanges</span>
      </div>
      <div class="flex items-center gap-2 bg-white/70 backdrop-blur-sm border border-[#F2A8BC]/40 rounded-full px-5 py-2.5">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        <span class="text-xs font-semibold text-[#2B2B2B]">Secure &amp; Trusted</span>
      </div>
    </div>
  </div>
</section>

<!-- ===== SHIPPING POLICY ===== -->
<section class="bg-[#FDF8F4] py-20 lg:py-28" aria-label="Shipping policy">
  <div class="max-w-[1280px] mx-auto px-6 lg:px-12">

    <div class="text-center mb-14">
      <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#E8567A] mb-4">Getting It To You</p>
      <h2 class="text-[#2B2B2B] leading-tight"
          style="font-family:'Playfair Display',serif;font-size:clamp(24px,3vw,36px);font-weight:500">
        Shipping Policy
      </h2>
      <p class="mt-4 text-[14px] text-[#2B2B2B]/60 max-w-xl mx-auto leading-relaxed">
        Every order ships free, no minimum required. We partner with trusted carriers to deliver your fashion quickly and safely.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

      <!-- Free Shipping -->
      <div class="bg-white rounded-2xl p-8 shadow-sm border border-[#F5E6DC] hover:shadow-md transition-shadow duration-300">
        <div class="w-12 h-12 rounded-full bg-[#F5E6DC] flex items-center justify-center mb-6">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
        </div>
        <h3 class="text-[#2B2B2B] font-semibold text-lg mb-3" style="font-family:'Playfair Display',serif">Free Standard Shipping</h3>
        <p class="text-[14px] text-[#2B2B2B]/65 leading-relaxed">
          We offer <strong class="text-[#2B2B2B]">free shipping on all orders</strong> across the United States — no minimum spend, no hidden fees, no surprises at checkout.
        </p>
      </div>

      <!-- Processing Time -->
      <div class="bg-white rounded-2xl p-8 shadow-sm border border-[#F5E6DC] hover:shadow-md transition-shadow duration-300">
        <div class="w-12 h-12 rounded-full bg-[#F5E6DC] flex items-center justify-center mb-6">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        </div>
        <h3 class="text-[#2B2B2B] font-semibold text-lg mb-3" style="font-family:'Playfair Display',serif">Order Processing</h3>
        <p class="text-[14px] text-[#2B2B2B]/65 leading-relaxed">
          Orders are processed within <strong class="text-[#2B2B2B]">1–3 business days</strong> after payment is confirmed. You'll receive an email with tracking information once your order ships.
        </p>
      </div>

      <!-- Delivery Time -->
      <div class="bg-white rounded-2xl p-8 shadow-sm border border-[#F5E6DC] hover:shadow-md transition-shadow duration-300">
        <div class="w-12 h-12 rounded-full bg-[#F5E6DC] flex items-center justify-center mb-6">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 0 1-2.827 0l-4.244-4.243a8 8 0 1 1 11.314 0z"/><path d="M15 11a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/></svg>
        </div>
        <h3 class="text-[#2B2B2B] font-semibold text-lg mb-3" style="font-family:'Playfair Display',serif">Estimated Delivery</h3>
        <p class="text-[14px] text-[#2B2B2B]/65 leading-relaxed">
          Standard delivery takes <strong class="text-[#2B2B2B]">5–10 business days</strong> depending on your location within the United States. Most orders arrive sooner.
        </p>
      </div>

      <!-- Tracking -->
      <div class="bg-white rounded-2xl p-8 shadow-sm border border-[#F5E6DC] hover:shadow-md transition-shadow duration-300">
        <div class="w-12 h-12 rounded-full bg-[#F5E6DC] flex items-center justify-center mb-6">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
        </div>
        <h3 class="text-[#2B2B2B] font-semibold text-lg mb-3" style="font-family:'Playfair Display',serif">Order Tracking</h3>
        <p class="text-[14px] text-[#2B2B2B]/65 leading-relaxed">
          Once your order ships, you'll get a tracking number by email. You can also track your order anytime on our
          <a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="text-[#E8567A] hover:underline">Track Order</a> page.
        </p>
      </div>

      <!-- Shipping Area -->
      <div class="bg-white rounded-2xl p-8 shadow-sm border border-[#F5E6DC] hover:shadow-md transition-shadow duration-300">
        <div class="w-12 h-12 rounded-full bg-[#F5E6DC] flex items-center justify-center mb-6">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
        </div>
        <h3 class="text-[#2B2B2B] font-semibold text-lg mb-3" style="font-family:'Playfair Display',serif">Where We Ship</h3>
        <p class="text-[14px] text-[#2B2B2B]/65 leading-relaxed">
          We currently ship to all states within the <strong class="text-[#2B2B2B]">United States</strong>, including Alaska and Hawaii. We are unable to ship to P.O. Boxes at this time.
        </p>
      </div>

      <!-- Delays -->
      <div class="bg-white rounded-2xl p-8 shadow-sm border border-[#F5E6DC] hover:shadow-md transition-shadow duration-300">
        <div class="w-12 h-12 rounded-full bg-[#F5E6DC] flex items-center justify-center mb-6">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
        </div>
        <h3 class="text-[#2B2B2B] font-semibold text-lg mb-3" style="font-family:'Playfair Display',serif">Possible Delays</h3>
        <p class="text-[14px] text-[#2B2B2B]/65 leading-relaxed">
          Delivery times may be longer during peak seasons (holidays, sales events) or due to carrier delays outside our control. We'll always keep you informed.
        </p>
      </div>

    </div>
  </div>
</section>

<!-- ===== RETURNS & EXCHANGES ===== -->
<section class="bg-[#F5E6DC] py-20 lg:py-28" aria-label="Returns and exchanges policy">
  <div class="max-w-[1280px] mx-auto px-6 lg:px-12">

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-start">

      <!-- Left: Policy Details -->
      <div>
        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#E8567A] mb-4">Hassle-Free</p>
        <h2 class="mb-6 text-[#2B2B2B] leading-tight"
            style="font-family:'Playfair Display',serif;font-size:clamp(24px,3vw,36px);font-weight:500">
          Returns &amp; Exchanges
        </h2>
        <p class="text-[14px] lg:text-[15px] text-[#2B2B2B]/70 leading-relaxed mb-8">
          We want you to love what you ordered. If something isn't right, we make it easy to return or exchange your items within <strong class="text-[#2B2B2B]">30 days</strong> of the delivery date.
        </p>

        <ul class="space-y-5">
          <li class="flex items-start gap-4">
            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-[#E8567A]/15 flex items-center justify-center mt-0.5">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
            </div>
            <div>
              <h4 class="font-semibold text-[#2B2B2B] text-[15px] mb-1">30-Day Return Window</h4>
              <p class="text-[13px] text-[#2B2B2B]/60 leading-relaxed">Items can be returned or exchanged within 30 days of delivery. The clock starts from the date your package is delivered.</p>
            </div>
          </li>

          <li class="flex items-start gap-4">
            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-[#E8567A]/15 flex items-center justify-center mt-0.5">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
            </div>
            <div>
              <h4 class="font-semibold text-[#2B2B2B] text-[15px] mb-1">Items Must Be Unworn &amp; Unwashed</h4>
              <p class="text-[13px] text-[#2B2B2B]/60 leading-relaxed">Returned items must be in their original condition — unworn, unwashed, and with all original tags attached. Items showing signs of wear or damage may not be accepted.</p>
            </div>
          </li>

          <li class="flex items-start gap-4">
            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-[#E8567A]/15 flex items-center justify-center mt-0.5">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
            </div>
            <div>
              <h4 class="font-semibold text-[#2B2B2B] text-[15px] mb-1">Free Exchanges</h4>
              <p class="text-[13px] text-[#2B2B2B]/60 leading-relaxed">Need a different size or color? We offer free exchanges on eligible items. Simply contact us and we'll guide you through the process.</p>
            </div>
          </li>

          <li class="flex items-start gap-4">
            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-[#E8567A]/15 flex items-center justify-center mt-0.5">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
            </div>
            <div>
              <h4 class="font-semibold text-[#2B2B2B] text-[15px] mb-1">Refunds Processed Promptly</h4>
              <p class="text-[13px] text-[#2B2B2B]/60 leading-relaxed">Once we receive and inspect your return, refunds are issued to your original payment method within <strong class="text-[#2B2B2B]">5–7 business days</strong>.</p>
            </div>
          </li>
        </ul>
      </div>

      <!-- Right: Non-Returnable + Process -->
      <div class="space-y-6">

        <!-- Non-returnable items -->
        <div class="bg-white rounded-2xl p-8 shadow-sm border border-white">
          <div class="flex items-center gap-3 mb-5">
            <div class="w-10 h-10 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"/></svg>
            </div>
            <h3 class="font-semibold text-[#2B2B2B] text-lg" style="font-family:'Playfair Display',serif">Non-Returnable Items</h3>
          </div>
          <p class="text-[13px] text-[#2B2B2B]/60 leading-relaxed mb-4">The following items are final sale and cannot be returned or exchanged:</p>
          <ul class="space-y-2">
            <?php
              $non_returnable = [
                'Swimwear and intimate apparel',
                'Items marked as "Final Sale"',
                'Items with removed or damaged tags',
                'Items showing signs of wear, washing, or alteration',
                'Gift cards',
              ];
              foreach ( $non_returnable as $item ) :
            ?>
            <li class="flex items-center gap-3 text-[13px] text-[#2B2B2B]/60">
              <span class="flex-shrink-0 w-1.5 h-1.5 rounded-full bg-[#D4B8A0]"></span>
              <?php echo esc_html($item); ?>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>

        <!-- Damaged / Wrong Items -->
        <div class="bg-white rounded-2xl p-8 shadow-sm border border-white">
          <div class="flex items-center gap-3 mb-5">
            <div class="w-10 h-10 rounded-full bg-[#F5E6DC] flex items-center justify-center flex-shrink-0">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#E8567A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
            </div>
            <h3 class="font-semibold text-[#2B2B2B] text-lg" style="font-family:'Playfair Display',serif">Damaged or Wrong Items?</h3>
          </div>
          <p class="text-[13px] text-[#2B2B2B]/60 leading-relaxed">
            If you received a damaged, defective, or incorrect item, we sincerely apologize. Please contact us within <strong class="text-[#2B2B2B]">7 days</strong> of delivery with a photo and your order number. We'll make it right — fast.
          </p>
          <a href="mailto:support@shopshive.com"
             class="inline-flex items-center gap-2 mt-5 text-[#E8567A] text-[13px] font-semibold hover:underline">
            Email support@shopshive.com
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </a>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- ===== HOW TO RETURN — STEPS ===== -->
<section class="bg-[#FDF8F4] py-20 lg:py-28" aria-label="How to return an order">
  <div class="max-w-[1280px] mx-auto px-6 lg:px-12">

    <div class="text-center mb-14">
      <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#E8567A] mb-4">Simple Process</p>
      <h2 class="text-[#2B2B2B] leading-tight"
          style="font-family:'Playfair Display',serif;font-size:clamp(24px,3vw,36px);font-weight:500">
        How To Start A Return
      </h2>
      <p class="mt-4 text-[14px] text-[#2B2B2B]/60 max-w-xl mx-auto leading-relaxed">
        Returning an item is quick and simple. Follow these three steps to get started.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative">

      <!-- Connector line (desktop) -->
      <div class="hidden md:block absolute top-[52px] left-[calc(16.67%+16px)] right-[calc(16.67%+16px)] h-px bg-[#F2A8BC]/50 z-0"></div>

      <!-- Step 1 -->
      <div class="relative z-10 flex flex-col items-center text-center">
        <div class="w-16 h-16 rounded-full bg-[#E8567A] flex items-center justify-center mb-6 shadow-lg shadow-[#E8567A]/20">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        </div>
        <span class="text-xs font-bold uppercase tracking-[0.15em] text-[#E8567A] mb-2">Step 01</span>
        <h3 class="font-semibold text-[#2B2B2B] text-lg mb-3" style="font-family:'Playfair Display',serif">Contact Us</h3>
        <p class="text-[13px] text-[#2B2B2B]/60 leading-relaxed">
          Email us at <a href="mailto:support@shopshive.com" class="text-[#E8567A] hover:underline">support@shopshive.com</a> or call <a href="tel:+17603830494" class="text-[#E8567A] hover:underline">+1 (760) 383 0494</a> with your order number and reason for return. Our team will respond within 24 hours.
        </p>
      </div>

      <!-- Step 2 -->
      <div class="relative z-10 flex flex-col items-center text-center">
        <div class="w-16 h-16 rounded-full bg-[#E8567A] flex items-center justify-center mb-6 shadow-lg shadow-[#E8567A]/20">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/></svg>
        </div>
        <span class="text-xs font-bold uppercase tracking-[0.15em] text-[#E8567A] mb-2">Step 02</span>
        <h3 class="font-semibold text-[#2B2B2B] text-lg mb-3" style="font-family:'Playfair Display',serif">Pack &amp; Ship</h3>
        <p class="text-[13px] text-[#2B2B2B]/60 leading-relaxed">
          Securely pack the item(s) in their original or similar packaging with tags still attached. Use the return shipping label we provide or ship to the address given by our support team.
        </p>
      </div>

      <!-- Step 3 -->
      <div class="relative z-10 flex flex-col items-center text-center">
        <div class="w-16 h-16 rounded-full bg-[#E8567A] flex items-center justify-center mb-6 shadow-lg shadow-[#E8567A]/20">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
        </div>
        <span class="text-xs font-bold uppercase tracking-[0.15em] text-[#E8567A] mb-2">Step 03</span>
        <h3 class="font-semibold text-[#2B2B2B] text-lg mb-3" style="font-family:'Playfair Display',serif">Get Refunded</h3>
        <p class="text-[13px] text-[#2B2B2B]/60 leading-relaxed">
          Once your return is received and inspected, we'll issue your refund or ship your exchange. Refunds go back to your original payment method within <strong class="text-[#2B2B2B]">5–7 business days</strong>.
        </p>
      </div>

    </div>
  </div>
</section>

<!-- ===== FAQ STRIP ===== -->
<section class="bg-[#2B2B2B] py-16 lg:py-20" aria-label="Common questions">
  <div class="max-w-[1280px] mx-auto px-6 lg:px-12">
    <div class="text-center mb-12">
      <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#F2A8BC] mb-4">Quick Answers</p>
      <h2 class="text-white leading-tight"
          style="font-family:'Playfair Display',serif;font-size:clamp(22px,3vw,32px);font-weight:500">
        Frequently Asked Questions
      </h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 max-w-4xl mx-auto">

      <?php
        $faqs = [
          [
            'q' => 'Is shipping really free on all orders?',
            'a' => 'Yes! We offer free standard shipping on every single order within the United States — no minimum order value, no exceptions.',
          ],
          [
            'q' => 'How long does delivery take?',
            'a' => 'Orders are processed within 1–3 business days and typically delivered within 5–10 business days after shipping.',
          ],
          [
            'q' => 'Can I return sale items?',
            'a' => 'Items marked as "Final Sale" cannot be returned. All other sale items are eligible for return or exchange within 30 days.',
          ],
          [
            'q' => 'How do I track my order?',
            'a' => 'You\'ll receive a tracking number by email once your order ships. You can also use our Track Order page anytime.',
          ],
          [
            'q' => 'What if my item arrives damaged?',
            'a' => 'We\'re so sorry! Email us at support@shopshive.com within 7 days with your order number and a photo — we\'ll resolve it quickly.',
          ],
          [
            'q' => 'How long does a refund take?',
            'a' => 'Once we receive and inspect your return, refunds are processed within 5–7 business days to your original payment method.',
          ],
        ];
        foreach ( $faqs as $faq ) :
      ?>
      <div class="bg-white/5 border border-white/10 rounded-xl p-6 hover:bg-white/10 transition-colors duration-300">
        <h4 class="font-semibold text-white text-[15px] mb-2"><?php echo esc_html($faq['q']); ?></h4>
        <p class="text-[13px] text-white/60 leading-relaxed"><?php echo esc_html($faq['a']); ?></p>
      </div>
      <?php endforeach; ?>

    </div>

    <div class="text-center mt-10">
      <a href="<?php echo esc_url(home_url('/faq/')); ?>"
         class="inline-flex items-center gap-2 text-[#F2A8BC] text-sm font-semibold hover:text-white transition-colors duration-300">
        View All FAQs
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
    </div>
  </div>
</section>

<!-- ===== CONTACT / SUPPORT CTA ===== -->
<section class="bg-[#FDF8F4] py-20 lg:py-24" aria-label="Contact support">
  <div class="max-w-[1280px] mx-auto px-6 lg:px-12">

    <div class="bg-[#E8567A] rounded-3xl px-8 py-14 lg:py-16 lg:px-16 text-center relative overflow-hidden">
      <!-- Decorative circles -->
      <div class="absolute -top-12 -right-12 w-48 h-48 rounded-full bg-white/10 pointer-events-none"></div>
      <div class="absolute -bottom-16 -left-16 w-64 h-64 rounded-full bg-white/5 pointer-events-none"></div>

      <div class="relative z-10">
        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-white/70 mb-4">Still Have Questions?</p>
        <h2 class="mb-4 text-white leading-tight"
            style="font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(28px,4vw,48px);font-weight:300">
          We're Here To Help
        </h2>
        <p class="text-white/80 text-[15px] mb-10 max-w-lg mx-auto leading-relaxed">
          Our support team is available Monday through Saturday, 10:00 AM – 6:00 PM PST. Reach out anytime — we're happy to help.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
          <a href="mailto:support@shopshive.com"
             class="inline-flex items-center justify-center gap-2 px-7 py-3.5 bg-white text-[#E8567A] text-sm font-semibold rounded-full hover:bg-[#FDF8F4] transition-all duration-300 hover:scale-[1.02] active:scale-[0.98]">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
            support@shopshive.com
          </a>
          <a href="tel:+17603830494"
             class="inline-flex items-center justify-center gap-2 px-7 py-3.5 bg-transparent border-2 border-white text-white text-sm font-semibold rounded-full hover:bg-white/10 transition-all duration-300">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13.6a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 2.9h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
            +1 (760) 383 0494
          </a>
        </div>

        <p class="mt-6 text-white/50 text-xs">Mon – Sat &nbsp;·&nbsp; 10:00 AM – 6:00 PM PST</p>
      </div>
    </div>

  </div>
</section>
