<!-- Handed Shoes — Homepage HTML -->
<!-- Built for a craft-inspired men’s formal footwear store -->

<?php
$home_img_base = get_template_directory_uri() . '/assets/img/Home/';
?>

<main class="bg-[#F4EEE6] text-[#121212]">
  <!-- ================= HERO ================= -->
  <section class="relative overflow-hidden bg-[#121212] text-white">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(169,101,56,0.36),transparent_36%),linear-gradient(135deg,#121212_0%,#3A2418_58%,#121212_100%)]"></div>
    <div class="absolute inset-x-0 bottom-0 h-28 bg-gradient-to-t from-[#F4EEE6] to-transparent"></div>

    <div class="relative mx-auto grid max-w-7xl items-center gap-12 px-5 py-20 sm:px-8 lg:grid-cols-[1.02fr_0.98fr] lg:px-10 lg:py-28">
      <div class="max-w-2xl">
        <p class="text-xs font-bold uppercase tracking-[0.22em] text-[#B8955A]">Men’s Formal Footwear</p>
        <h1 class="mt-5 max-w-3xl font-serif text-5xl font-semibold leading-[0.98] text-[#F4EEE6] sm:text-6xl lg:text-7xl">
          Crafted-Look Dress Shoes For Polished Steps
        </h1>
        <p class="mt-6 max-w-xl text-base leading-8 text-white/72 sm:text-lg">
          Discover Oxford shoes, brogue shoes, loafers, and monk strap shoes designed for office days, smart casual outfits, and confident occasions.
        </p>

        <div class="mt-8 flex flex-col gap-3 sm:flex-row">
          <a href="/product-category/oxford-shoes/" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#A96538] px-7 text-sm font-bold uppercase tracking-[0.08em] text-white transition hover:bg-white hover:text-[#121212]">
            Shop Oxford Shoes
          </a>
          <a href="/product-category/brogue-shoes/" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#A96538] px-7 text-sm font-bold uppercase tracking-[0.08em] text-[#F4EEE6] transition hover:bg-[#A96538] hover:text-white">
            Explore Brogue Shoes
          </a>
        </div>

        <div class="mt-8 flex flex-wrap gap-3 text-sm text-white/70">
          <span class="rounded-full border border-white/10 bg-white/5 px-4 py-2">Refined styles</span>
          <span class="rounded-full border border-white/10 bg-white/5 px-4 py-2">Clear size guidance</span>
          <span class="rounded-full border border-white/10 bg-white/5 px-4 py-2">Reliable support</span>
        </div>
      </div>

      <div class="relative">
        <div class="absolute -left-5 -top-5 h-28 w-28 rounded-full border border-[#B8955A]/30"></div>
        <div class="absolute -bottom-5 -right-5 h-40 w-40 rounded-full bg-[#A96538]/20 blur-3xl"></div>
        <div class="relative overflow-hidden rounded-[2rem] border border-white/10 bg-white/10 p-3 shadow-2xl shadow-black/40 backdrop-blur-sm">
          <img
            src="<?php echo esc_url($home_img_base . 'section_one.png'); ?>"
            alt="Premium men’s formal dress shoes on a refined dark surface"
            class="h-[420px] w-full rounded-[1.5rem] object-cover object-center sm:h-[520px]"
          />
        </div>
      </div>
    </div>
  </section>

  <!-- ================= SHOP BY STYLE ================= -->
  <section class="bg-[#F4EEE6] py-16 sm:py-20 lg:py-24">
    <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
      <div class="mb-10 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
        <div>
          <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#A96538]">Shop By Style</p>
          <h2 class="mt-3 font-serif text-4xl font-semibold text-[#121212] sm:text-5xl">Four refined ways to step forward.</h2>
        </div>
        <p class="max-w-xl text-sm leading-7 text-[#3A2418]/70">
          Focused men’s formal footwear made for polished office style, smart casual dressing, and occasion-ready looks.
        </p>
      </div>

      <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
        <a href="/product-category/oxford-shoes/" class="group overflow-hidden rounded-3xl border border-[#3A2418]/10 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
          <div class="h-56 overflow-hidden bg-[#121212]">
            <img src="<?php echo esc_url($home_img_base . 'Oxford_Shoes.png'); ?>" alt="Oxford shoes for formal office style" class="h-full w-full object-cover object-center transition duration-500 group-hover:scale-105" />
          </div>
          <div class="p-5">
            <h3 class="font-serif text-2xl font-semibold text-[#121212]">Oxford Shoes</h3>
            <p class="mt-2 text-sm leading-6 text-[#3A2418]/70">Classic lace-up dress shoes for office days and formal occasions.</p>
            <span class="mt-5 inline-flex text-sm font-bold text-[#A96538]">Shop Oxfords →</span>
          </div>
        </a>

        <a href="/product-category/brogue-shoes/" class="group overflow-hidden rounded-3xl border border-[#3A2418]/10 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
          <div class="h-56 overflow-hidden bg-[#121212]">
            <img src="<?php echo esc_url($home_img_base . 'Brogue.png'); ?>" alt="Brogue shoe detailing close-up" class="h-full w-full object-cover object-center transition duration-500 group-hover:scale-105" />
          </div>
          <div class="p-5">
            <h3 class="font-serif text-2xl font-semibold text-[#121212]">Brogue Shoes</h3>
            <p class="mt-2 text-sm leading-6 text-[#3A2418]/70">Classic detailing for formal outfits and smart casual looks.</p>
            <span class="mt-5 inline-flex text-sm font-bold text-[#A96538]">View Brogues →</span>
          </div>
        </a>

        <a href="/product-category/loafers/" class="group overflow-hidden rounded-3xl border border-[#3A2418]/10 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
          <div class="h-56 overflow-hidden bg-[#121212]">
            <img src="<?php echo esc_url($home_img_base . 'Loafers.png'); ?>" alt="Men’s loafers for smart casual outfits" class="h-full w-full object-cover object-center transition duration-500 group-hover:scale-105" />
          </div>
          <div class="p-5">
            <h3 class="font-serif text-2xl font-semibold text-[#121212]">Loafers</h3>
            <p class="mt-2 text-sm leading-6 text-[#3A2418]/70">Slip-on dress style for easy refined wear and business casual outfits.</p>
            <span class="mt-5 inline-flex text-sm font-bold text-[#A96538]">Explore Loafers →</span>
          </div>
        </a>

        <a href="/product-category/monk-strap-shoes/" class="group overflow-hidden rounded-3xl border border-[#3A2418]/10 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
          <div class="h-56 overflow-hidden bg-[#121212]">
            <img src="<?php echo esc_url($home_img_base . 'Monk_Strap_Shoes.png'); ?>" alt="Monk strap shoes with buckle detail" class="h-full w-full object-cover object-center transition duration-500 group-hover:scale-105" />
          </div>
          <div class="p-5">
            <h3 class="font-serif text-2xl font-semibold text-[#121212]">Monk Strap Shoes</h3>
            <p class="mt-2 text-sm leading-6 text-[#3A2418]/70">Strap-and-buckle styling for distinctive formal and smart casual looks.</p>
            <span class="mt-5 inline-flex text-sm font-bold text-[#A96538]">Shop Monk Straps →</span>
          </div>
        </a>
      </div>
    </div>
  </section>

  <!-- ================= OXFORD FEATURE ================= -->
  <section class="bg-white py-16 sm:py-20 lg:py-24">
    <div class="mx-auto grid max-w-7xl items-center gap-12 px-5 sm:px-8 lg:grid-cols-2 lg:px-10">
      <div class="relative order-2 lg:order-1">
        <div class="absolute -left-4 -top-4 h-full w-full rounded-[2rem] border border-[#A96538]/20"></div>
        <img
          src="<?php echo esc_url($home_img_base . 'Brogue_Shoes.png'); ?>"
          alt="Formal dress shoes styled for office and formal occasions"
          class="relative h-[420px] w-full rounded-[2rem] object-cover object-center shadow-2xl shadow-[#3A2418]/15"
        />
      </div>

      <div class="order-1 lg:order-2">
        <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#A96538]">Oxford Shoes</p>
        <h2 class="mt-4 font-serif text-4xl font-semibold leading-tight text-[#121212] sm:text-5xl">
          A clean formal foundation for sharp daily dressing.
        </h2>
        <p class="mt-5 text-base leading-8 text-[#3A2418]/72">
          Oxford shoes bring a polished look to office outfits, formal events, and smart evening plans. Choose refined dress footwear designed to support confident, professional presentation.
        </p>

        <div class="mt-7 grid gap-3 sm:grid-cols-2">
          <div class="rounded-2xl border border-[#3A2418]/10 bg-[#F4EEE6] p-5">
            <p class="font-bold text-[#121212]">Office-ready</p>
            <p class="mt-2 text-sm leading-6 text-[#3A2418]/70">Built around clean formal styling.</p>
          </div>
          <div class="rounded-2xl border border-[#3A2418]/10 bg-[#F4EEE6] p-5">
            <p class="font-bold text-[#121212]">Polished finish</p>
            <p class="mt-2 text-sm leading-6 text-[#3A2418]/70">A refined look for work and events.</p>
          </div>
          <div class="rounded-2xl border border-[#3A2418]/10 bg-[#F4EEE6] p-5">
            <p class="font-bold text-[#121212]">Formal occasions</p>
            <p class="mt-2 text-sm leading-6 text-[#3A2418]/70">Suitable for suits and smart outfits.</p>
          </div>
          <div class="rounded-2xl border border-[#3A2418]/10 bg-[#F4EEE6] p-5">
            <p class="font-bold text-[#121212]">Fit guidance</p>
            <p class="mt-2 text-sm leading-6 text-[#3A2418]/70">Review size notes before ordering.</p>
          </div>
        </div>

        <a href="/product-category/oxford-shoes/" class="mt-8 inline-flex min-h-12 items-center justify-center rounded-full bg-[#A96538] px-7 text-sm font-bold uppercase tracking-[0.08em] text-white transition hover:bg-[#121212]">
          Shop Oxford Shoes
        </a>
      </div>
    </div>
  </section>

  <!-- ================= DETAILS FEATURE ================= -->
  <section class="bg-[#121212] py-16 text-white sm:py-20 lg:py-24">
    <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
      <div class="mb-10 max-w-3xl">
        <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#B8955A]">Classic Details & Smart Casual Style</p>
        <h2 class="mt-4 font-serif text-4xl font-semibold leading-tight text-[#F4EEE6] sm:text-5xl">
          Refined styles for work, events, and confident evenings.
        </h2>
        <p class="mt-5 text-base leading-8 text-white/68">
          From brogue detailing to easy slip-on loafers and distinctive monk strap shoes, Handed Shoes focuses on polished footwear styles that work across formal and smart casual moments.
        </p>
      </div>

      <div class="grid gap-5 lg:grid-cols-3">
        <article class="overflow-hidden rounded-3xl border border-white/10 bg-white/[0.04]">
          <img src="<?php echo esc_url($home_img_base . 'Loafers_collection.png'); ?>" alt="Refined formal shoe detail close-up" class="h-64 w-full object-cover object-center opacity-90" />
          <div class="p-6">
            <h3 class="font-serif text-2xl font-semibold text-[#F4EEE6]">Brogue Shoes</h3>
            <p class="mt-3 text-sm leading-7 text-white/65">Perforation-inspired detailing for a classic dress shoe look.</p>
          </div>
        </article>

        <article class="overflow-hidden rounded-3xl border border-white/10 bg-white/[0.04]">
          <img src="<?php echo esc_url($home_img_base . 'Loafers_two.png'); ?>" alt="Loafers styled for smart casual wear" class="h-64 w-full object-cover object-center opacity-90" />
          <div class="p-6">
            <h3 class="font-serif text-2xl font-semibold text-[#F4EEE6]">Loafers</h3>
            <p class="mt-3 text-sm leading-7 text-white/65">Easy slip-on styling for business casual and refined daily wear.</p>
          </div>
        </article>

        <article class="overflow-hidden rounded-3xl border border-white/10 bg-white/[0.04]">
          <img src="<?php echo esc_url($home_img_base . 'Monk_Strap_Shoes_two.png'); ?>" alt="Monk strap shoe buckle detail" class="h-64 w-full object-cover object-center opacity-90" />
          <div class="p-6">
            <h3 class="font-serif text-2xl font-semibold text-[#F4EEE6]">Monk Strap Shoes</h3>
            <p class="mt-3 text-sm leading-7 text-white/65">Strap-and-buckle details for a distinctive formal finish.</p>
          </div>
        </article>
      </div>

      <div class="mt-10 flex flex-col gap-3 sm:flex-row">
        <a href="/shop/" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#A96538] px-7 text-sm font-bold uppercase tracking-[0.08em] text-white transition hover:bg-white hover:text-[#121212]">
          Explore Dress Shoe Styles
        </a>
        <a href="/product-category/loafers/" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#A96538] px-7 text-sm font-bold uppercase tracking-[0.08em] text-[#F4EEE6] transition hover:bg-[#A96538] hover:text-white">
          View Loafers
        </a>
      </div>
    </div>
  </section>

  <!-- ================= TRUST ================= -->
  <section class="bg-[#3A2418] py-16 text-white sm:py-20 lg:py-24">
    <div class="mx-auto grid max-w-7xl gap-12 px-5 sm:px-8 lg:grid-cols-[0.9fr_1.1fr] lg:px-10">
      <div>
        <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#B8955A]">Customer Care</p>
        <h2 class="mt-4 font-serif text-4xl font-semibold leading-tight text-[#F4EEE6] sm:text-5xl">
          Clear support for size, fit, shipping, and returns.
        </h2>
        <p class="mt-5 text-base leading-8 text-white/68">
          Shop men’s formal footwear with clear product details, size guidance, order tracking, and customer support when you need help.
        </p>

        <div class="mt-7 space-y-4 text-sm leading-7 text-white/72">
          <p><strong class="text-[#F4EEE6]">Size note:</strong> Please review the size guide, fit note, material or finish, care instructions, and return conditions before placing an order.</p>
          <p><strong class="text-[#F4EEE6]">Shipping note:</strong> Orders placed before 5:00 PM Pacific Standard Time begin processing the same business day. Orders placed after the cutoff begin processing the next business day. Handling time is 1–2 business days and transit usually takes 5–7 business days.</p>
          <p><strong class="text-[#F4EEE6]">Return note:</strong> Eligible footwear must be unworn, undamaged, free of outdoor wear, stains, heavy creasing, or sole marks, and returned with original packaging where applicable within 30 days of delivery.</p>
        </div>

        <div class="mt-8 flex flex-col gap-3 sm:flex-row">
          <a href="/shipping-policy/" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#A96538] px-7 text-sm font-bold uppercase tracking-[0.08em] text-white transition hover:bg-white hover:text-[#121212]">
            View Shipping & Returns
          </a>
          <a href="/contact-us/" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#A96538] px-7 text-sm font-bold uppercase tracking-[0.08em] text-[#F4EEE6] transition hover:bg-[#A96538] hover:text-white">
            Contact Support
          </a>
        </div>
      </div>

      <div class="grid gap-4 sm:grid-cols-2">
        <div class="flex min-h-[230px] flex-col justify-between rounded-3xl border border-white/10 bg-white/[0.06] p-6">
          <div>
            <span class="text-2xl text-[#B8955A]">✓</span>
            <h3 class="mt-4 font-serif text-2xl font-semibold text-[#F4EEE6]">Secure Checkout</h3>
            <p class="mt-3 text-sm leading-7 text-white/65">Clear payment flow for confident ordering.</p>
          </div>
          <div class="mt-6 border-t border-white/10 pt-4 text-xs font-bold uppercase tracking-[0.14em] text-[#B8955A]">
            Protected payment flow
          </div>
        </div>
        <div class="flex min-h-[230px] flex-col justify-between rounded-3xl border border-white/10 bg-white/[0.06] p-6">
          <div>
            <span class="text-2xl text-[#B8955A]">✓</span>
            <h3 class="mt-4 font-serif text-2xl font-semibold text-[#F4EEE6]">Tracking Included</h3>
            <p class="mt-3 text-sm leading-7 text-white/65">Order tracking is provided after dispatch.</p>
          </div>
          <div class="mt-6 border-t border-white/10 pt-4 text-xs font-bold uppercase tracking-[0.14em] text-[#B8955A]">
            Updates after dispatch
          </div>
        </div>
        <div class="flex min-h-[230px] flex-col justify-between rounded-3xl border border-white/10 bg-white/[0.06] p-6">
          <div>
            <span class="text-2xl text-[#B8955A]">✓</span>
            <h3 class="mt-4 font-serif text-2xl font-semibold text-[#F4EEE6]">30-Day Returns</h3>
            <p class="mt-3 text-sm leading-7 text-white/65">Eligible unworn footwear may be returned.</p>
          </div>
          <div class="mt-6 border-t border-white/10 pt-4 text-xs font-bold uppercase tracking-[0.14em] text-[#B8955A]">
            Unworn items only
          </div>
        </div>
        <div class="flex min-h-[230px] flex-col justify-between rounded-3xl border border-white/10 bg-white/[0.06] p-6">
          <div>
            <span class="text-2xl text-[#B8955A]">✓</span>
            <h3 class="mt-4 font-serif text-2xl font-semibold text-[#F4EEE6]">Size Guide & Fit Notes</h3>
            <p class="mt-3 text-sm leading-7 text-white/65">Review product details before ordering.</p>
          </div>
          <div class="mt-6 border-t border-white/10 pt-4 text-xs font-bold uppercase tracking-[0.14em] text-[#B8955A]">
            Check details first
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= CUSTOMER FEEDBACK ================= -->
  <section class="bg-[#F4EEE6] py-16 sm:py-20 lg:py-24">
    <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
      <div class="mx-auto max-w-3xl text-center">
        <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#A96538]">Customer Feedback</p>
        <h2 class="mt-4 font-serif text-4xl font-semibold leading-tight text-[#121212] sm:text-5xl">
          What customers look for in polished dress footwear.
        </h2>
        <p class="mt-5 text-base leading-8 text-[#3A2418]/70">
          Customers shopping for formal shoes often care about fit, finish, detail, and confidence. These feedback areas can be updated with verified customer reviews as the store grows.
        </p>
      </div>

      <div class="mt-10 grid gap-5 md:grid-cols-3">
        <article class="rounded-3xl border border-[#3A2418]/10 bg-white p-7 shadow-sm">
          <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#A96538]">Fit & Sizing</p>
          <p class="mt-5 text-lg leading-8 text-[#121212]">“Clear size and fit details make dress shoe shopping easier.”</p>
        </article>
        <article class="rounded-3xl border border-[#3A2418]/10 bg-white p-7 shadow-sm">
          <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#A96538]">Refined Style</p>
          <p class="mt-5 text-lg leading-8 text-[#121212]">“Classic silhouettes work well for office, events, and smart casual outfits.”</p>
        </article>
        <article class="rounded-3xl border border-[#3A2418]/10 bg-white p-7 shadow-sm">
          <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#A96538]">Product Details</p>
          <p class="mt-5 text-lg leading-8 text-[#121212]">“Material, care, shipping, and return details should be easy to review before ordering.”</p>
        </article>
      </div>

      <div class="mt-10 text-center">
        <a href="/shop/" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#121212] px-8 text-sm font-bold uppercase tracking-[0.08em] text-white transition hover:bg-[#A96538]">
          Shop Formal Footwear
        </a>
      </div>
    </div>
  </section>
</main>
