<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Slicktee | Graphic Tee & Modern Streetwear</title>
  <meta name="description" content="Slicktee is a modern streetwear apparel brand focused on graphic tees, oversized t-shirts, hoodies, and everyday streetwear essentials." />
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-[#111827] antialiased">
  <main>
    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-[#0B0F0D] text-white">
      <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(34,197,94,0.35),transparent_34%),linear-gradient(135deg,#0B0F0D_0%,#123D2A_58%,#0B0F0D_100%)]"></div>
      <div class="absolute -right-20 top-20 h-72 w-72 rounded-full bg-[#A3E635]/20 blur-3xl"></div>
      <div class="absolute -left-24 bottom-10 h-80 w-80 rounded-full bg-[#22C55E]/20 blur-3xl"></div>

      <div class="relative mx-auto grid max-w-7xl grid-cols-1 items-center gap-12 px-4 py-20 sm:px-6 lg:grid-cols-2 lg:px-8 lg:py-28">
        <div class="max-w-2xl">
          <p class="mb-5 text-sm font-black uppercase tracking-[0.24em] text-[#A3E635]">
            Graphic Apparel / Streetwear Essentials
          </p>

          <h1 class="text-5xl font-black uppercase leading-[0.92] tracking-[-0.06em] text-white sm:text-6xl lg:text-7xl">
            Clean Fits. Bold Energy.
          </h1>

          <p class="mt-6 max-w-xl text-lg leading-8 text-white/85">
            Modern graphic tees, oversized silhouettes, casual hoodies, and everyday streetwear essentials built for clean style without the noise.
          </p>

          <div class="mt-9 flex flex-wrap gap-4">
            <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#22C55E] px-7 text-sm font-black uppercase tracking-wide text-[#0B0F0D] transition hover:bg-[#A3E635]">
              Shop Now
            </a>

            <a href="#graphic-tees" class="inline-flex min-h-12 items-center justify-center rounded-md border border-white/30 px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-[#0B0F0D]">
              Explore Graphic Tees
            </a>
          </div>
        </div>

        <div class="relative">
          <div class="overflow-hidden rounded-[2rem] border border-white/15 bg-white/10 p-3 shadow-2xl shadow-black/40">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/Slichtee/image_banner%231.png'); ?>" alt="Modern streetwear graphic tee outfit" class="aspect-[4/5] w-full rounded-[1.35rem] object-cover" />
          </div>

          <div class="absolute -bottom-7 -left-4 hidden max-w-[250px] rounded-2xl border border-white/10 bg-white p-5 text-[#111827] shadow-2xl lg:block">
            <p class="text-xs font-black uppercase tracking-[0.2em] text-[#123D2A]">Built For Daily Wear</p>
            <p class="mt-2 text-sm leading-6 text-[#6B7280]">Clean graphics. Easy fits. Street-ready comfort.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Featured Categories -->
    <section class="bg-[#F7F8F5] py-16 lg:py-24">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-10 flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
          <div>
            <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#22C55E]">Shop By Category</p>
            <h2 class="text-4xl font-black uppercase tracking-[-0.05em] text-[#111827] lg:text-5xl">Streetwear Core</h2>
          </div>
          <p class="max-w-xl text-base leading-7 text-[#6B7280]">
            Focused collections for graphic tees, oversized fits, hoodies, and everyday streetwear essentials.
          </p>
        </div>

        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
          <a href="<?php echo esc_url(home_url('/product-category/graphic-tees/')); ?>" class="group relative overflow-hidden rounded-2xl bg-[#0B0F0D] shadow-sm">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/Slichtee/graphic_tee1.png'); ?>" alt="Graphic tees collection" class="aspect-[4/5] w-full object-cover opacity-85 transition duration-500 group-hover:scale-105 group-hover:opacity-65" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/60 to-black/10"></div>
            <div class="absolute bottom-0 left-0 right-0 p-5">
              <div class="rounded-2xl bg-black/45 p-4 backdrop-blur-sm">
              <h3 class="text-2xl font-black uppercase leading-none tracking-[-0.04em] text-white">Graphic Tees</h3>
              <p class="mt-3 text-sm font-semibold leading-6 text-white/90">Original tee styles for everyday rotation.</p>
              </div>
            </div>
          </a>

          <a href="<?php echo esc_url(home_url('/product-category/oversized-tees/')); ?>" class="group relative overflow-hidden rounded-2xl bg-[#0B0F0D] shadow-sm">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/Slichtee/oversize_tee.png'); ?>" alt="Oversized tees collection" class="aspect-[4/5] w-full object-cover opacity-85 transition duration-500 group-hover:scale-105 group-hover:opacity-65" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/60 to-black/10"></div>
            <div class="absolute bottom-0 left-0 right-0 p-5">
              <div class="rounded-2xl bg-black/45 p-4 backdrop-blur-sm">
              <h3 class="text-2xl font-black uppercase leading-none tracking-[-0.04em] text-white">Oversized Tees</h3>
              <p class="mt-3 text-sm font-semibold leading-6 text-white/90">Relaxed silhouettes with modern street fit.</p>
              </div>
            </div>
          </a>

          <a href="<?php echo esc_url(home_url('/product-category/casual-hoodies/')); ?>" class="group relative overflow-hidden rounded-2xl bg-[#0B0F0D] shadow-sm">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/Slichtee/hoodie%231.png'); ?>" alt="Hoodies collection" class="aspect-[4/5] w-full object-cover opacity-85 transition duration-500 group-hover:scale-105 group-hover:opacity-65" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/60 to-black/10"></div>
            <div class="absolute bottom-0 left-0 right-0 p-5">
              <div class="rounded-2xl bg-black/45 p-4 backdrop-blur-sm">
              <h3 class="text-2xl font-black uppercase leading-none tracking-[-0.04em] text-white">Hoodies</h3>
              <p class="mt-3 text-sm font-semibold leading-6 text-white/90">Clean layering pieces for casual outfits.</p>
              </div>
            </div>
          </a>

          <a href="<?php echo esc_url(home_url('/product-category/streetwear-essentials/')); ?>" class="group relative overflow-hidden rounded-2xl bg-[#0B0F0D] shadow-sm">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/Slichtee/banner_image%232.png'); ?>" alt="Streetwear essentials collection" class="aspect-[4/5] w-full object-cover opacity-85 transition duration-500 group-hover:scale-105 group-hover:opacity-65" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/60 to-black/10"></div>
            <div class="absolute bottom-0 left-0 right-0 p-5">
              <div class="rounded-2xl bg-black/45 p-4 backdrop-blur-sm">
              <h3 class="text-2xl font-black uppercase leading-none tracking-[-0.04em] text-white">Essentials</h3>
              <p class="mt-3 text-sm font-semibold leading-6 text-white/90">Minimal apparel built for easy styling.</p>
              </div>
            </div>
          </a>
        </div>
      </div>
    </section>

    <!-- New Arrivals -->
    <section id="new-arrivals" class="bg-white py-16 lg:py-24">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-10 flex items-end justify-between gap-6">
          <div>
            <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#22C55E]">Fresh Drops</p>
            <h2 class="text-4xl font-black uppercase tracking-[-0.05em] text-[#111827] lg:text-5xl">New Arrivals</h2>
          </div>

          <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="hidden rounded-md border border-[#0B0F0D] px-5 py-3 text-sm font-black uppercase tracking-wide text-[#0B0F0D] transition hover:bg-[#0B0F0D] hover:text-white sm:inline-flex">
            View All
          </a>
        </div>

        <div class="grid grid-cols-2 gap-4 lg:grid-cols-4 lg:gap-6">
          <article class="group overflow-hidden rounded-2xl border border-[#E5E7EB] bg-white transition hover:-translate-y-1 hover:shadow-xl">
            <div class="overflow-hidden bg-[#F7F8F5]">
              <img src="https://images.unsplash.com/photo-1576566588028-4147f3842f27?auto=format&fit=crop&w=700&q=80" alt="Core graphic tee" class="aspect-[4/5] w-full object-cover transition duration-500 group-hover:scale-105" />
            </div>
            <div class="p-4">
              <h3 class="text-sm font-black text-[#111827] sm:text-base">Core Graphic Tee</h3>
              <p class="mt-1 font-black text-[#123D2A]">$29.00</p>
              <a href="#" class="mt-4 inline-flex w-full items-center justify-center rounded-md bg-[#0B0F0D] px-4 py-3 text-xs font-black uppercase tracking-wide text-white transition hover:bg-[#123D2A]">View Product</a>
            </div>
          </article>

          <article class="group overflow-hidden rounded-2xl border border-[#E5E7EB] bg-white transition hover:-translate-y-1 hover:shadow-xl">
            <div class="overflow-hidden bg-[#F7F8F5]">
              <img src="https://images.unsplash.com/photo-1562157873-818bc0726f68?auto=format&fit=crop&w=700&q=80" alt="Oversized street tee" class="aspect-[4/5] w-full object-cover transition duration-500 group-hover:scale-105" />
            </div>
            <div class="p-4">
              <h3 class="text-sm font-black text-[#111827] sm:text-base">Oversized Street Tee</h3>
              <p class="mt-1 font-black text-[#123D2A]">$34.00</p>
              <a href="#" class="mt-4 inline-flex w-full items-center justify-center rounded-md bg-[#0B0F0D] px-4 py-3 text-xs font-black uppercase tracking-wide text-white transition hover:bg-[#123D2A]">View Product</a>
            </div>
          </article>

          <article class="group overflow-hidden rounded-2xl border border-[#E5E7EB] bg-white transition hover:-translate-y-1 hover:shadow-xl">
            <div class="overflow-hidden bg-[#F7F8F5]">
              <img src="https://images.unsplash.com/photo-1552374196-1ab2a1c593e8?auto=format&fit=crop&w=700&q=80" alt="Minimal logo hoodie" class="aspect-[4/5] w-full object-cover transition duration-500 group-hover:scale-105" />
            </div>
            <div class="p-4">
              <h3 class="text-sm font-black text-[#111827] sm:text-base">Minimal Logo Hoodie</h3>
              <p class="mt-1 font-black text-[#123D2A]">$52.00</p>
              <a href="#" class="mt-4 inline-flex w-full items-center justify-center rounded-md bg-[#0B0F0D] px-4 py-3 text-xs font-black uppercase tracking-wide text-white transition hover:bg-[#123D2A]">View Product</a>
            </div>
          </article>

          <article class="group overflow-hidden rounded-2xl border border-[#E5E7EB] bg-white transition hover:-translate-y-1 hover:shadow-xl">
            <div class="overflow-hidden bg-[#F7F8F5]">
              <img src="https://images.unsplash.com/photo-1506629905607-d9e297d387be?auto=format&fit=crop&w=700&q=80" alt="Vintage wash tee" class="aspect-[4/5] w-full object-cover transition duration-500 group-hover:scale-105" />
            </div>
            <div class="p-4">
              <h3 class="text-sm font-black text-[#111827] sm:text-base">Vintage Wash Tee</h3>
              <p class="mt-1 font-black text-[#123D2A]">$36.00</p>
              <a href="#" class="mt-4 inline-flex w-full items-center justify-center rounded-md bg-[#0B0F0D] px-4 py-3 text-xs font-black uppercase tracking-wide text-white transition hover:bg-[#123D2A]">View Product</a>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- Lifestyle Banner -->
    <section class="bg-[#0B0F0D] py-16 text-white lg:py-24">
      <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
        <div class="overflow-hidden rounded-3xl border border-white/10 bg-white/5 p-3">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/Slichtee/Everyday_street_style.png'); ?>" alt="Urban lifestyle streetwear outfit" class="aspect-[4/3] w-full rounded-2xl object-cover" />
        </div>

        <div>
          <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#A3E635]">Everyday Street Style</p>
          <h2 class="text-4xl font-black uppercase leading-none tracking-[-0.05em] lg:text-6xl">
            Apparel That Moves With Your Day.
          </h2>
          <p class="mt-6 max-w-xl text-lg leading-8 text-white/82">
            Slicktee focuses on clean graphics, relaxed fits, and modern essentials that work from city streets to weekend plans.
          </p>
          <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="mt-8 inline-flex rounded-md bg-[#22C55E] px-7 py-4 text-sm font-black uppercase tracking-wide text-[#0B0F0D] transition hover:bg-[#A3E635]">
            Shop Now
          </a>
        </div>
      </div>
    </section>

    <!-- Graphic Tee Collection -->
    <section id="graphic-tees" class="bg-[#F7F8F5] py-16 lg:py-24">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-10 max-w-3xl">
          <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#22C55E]">Core Collection</p>
          <h2 class="text-4xl font-black uppercase tracking-[-0.05em] text-[#111827] lg:text-5xl">
            Graphic Tees Without The Noise
          </h2>
          <p class="mt-4 text-base leading-7 text-[#6B7280]">
            Original apparel-focused designs made for daily wear. No fan merch, no copyright-heavy graphics, no meme spam.
          </p>
        </div>

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
          <div class="rounded-3xl bg-[#123D2A] p-8 text-white lg:col-span-1">
            <p class="text-sm font-black uppercase tracking-[0.2em] text-[#A3E635]">Original Direction</p>
            <h3 class="mt-4 text-3xl font-black uppercase tracking-[-0.05em]">Clean Graphics</h3>
            <p class="mt-4 text-white/82">Minimal, wearable tee designs that look sharp without feeling loud.</p>
            <a href="#" class="mt-7 inline-flex rounded-md bg-[#22C55E] px-6 py-3 text-sm font-black uppercase tracking-wide text-[#0B0F0D] transition hover:bg-[#A3E635]">
              Shop Graphic Tees
            </a>
          </div>

          <div class="overflow-hidden rounded-3xl bg-[#0B0F0D] lg:col-span-2">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/Slichtee/Original_direction.png'); ?>" alt="Graphic tee collection banner" class="h-full min-h-[360px] w-full object-cover opacity-90" />
          </div>
        </div>
      </div>
    </section>

    <!-- Oversized + Hoodies -->
    <section class="bg-white py-16 lg:py-24">
      <div class="mx-auto grid max-w-7xl grid-cols-1 gap-6 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
        <a href="#" class="group overflow-hidden rounded-3xl bg-[#0B0F0D] text-white">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/Slichtee/Relaxed_Fit%20_Oversized_Tees.png'); ?>" alt="Oversized tee streetwear style" class="aspect-[16/11] w-full object-cover opacity-85 transition duration-500 group-hover:scale-105 group-hover:opacity-65" />
          <div class="p-8">
            <p class="text-sm font-black uppercase tracking-[0.2em] text-[#A3E635]">Relaxed Fit</p>
            <h3 class="mt-3 text-4xl font-black uppercase tracking-[-0.05em]">Oversized Tees</h3>
            <p class="mt-3 text-white/82">Built for layering, movement, and clean streetwear silhouettes.</p>
          </div>
        </a>

        <a href="#" class="group overflow-hidden rounded-3xl bg-[#123D2A] text-white">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/Slichtee/casoul_hoodie.png'); ?>" alt="Casual hoodie streetwear style" class="aspect-[16/11] w-full object-cover opacity-85 transition duration-500 group-hover:scale-105 group-hover:opacity-65" />
          <div class="p-8">
            <p class="text-sm font-black uppercase tracking-[0.2em] text-[#A3E635]">Layer Ready</p>
            <h3 class="mt-3 text-4xl font-black uppercase tracking-[-0.05em]">Casual Hoodies</h3>
            <p class="mt-3 text-white/82">Simple hoodie essentials with modern streetwear energy.</p>
          </div>
        </a>
      </div>
    </section>

    <!-- Brand Values -->
    <section class="bg-[#123D2A] py-16 text-white lg:py-24">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-10 max-w-3xl">
          <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#A3E635]">Brand Philosophy</p>
          <h2 class="text-4xl font-black uppercase tracking-[-0.05em] lg:text-5xl">
            Built Like A Real Apparel Brand
          </h2>
        </div>

        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
          <div class="rounded-2xl border border-white/10 bg-white/5 p-6">
            <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-[#A3E635] text-sm font-black text-[#0B0F0D]">01</div>
            <h3 class="text-lg font-black uppercase leading-snug">Comfortable Everyday Fits</h3>
            <p class="mt-3 text-sm leading-6 text-white/75">Soft apparel made for repeat wear.</p>
          </div>

          <div class="rounded-2xl border border-white/10 bg-white/5 p-6">
            <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-[#A3E635] text-sm font-black text-[#0B0F0D]">02</div>
            <h3 class="text-lg font-black uppercase leading-snug">Clean Modern Styling</h3>
            <p class="mt-3 text-sm leading-6 text-white/75">Minimal streetwear without visual clutter.</p>
          </div>

          <div class="rounded-2xl border border-white/10 bg-white/5 p-6">
            <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-[#A3E635] text-sm font-black text-[#0B0F0D]">03</div>
            <h3 class="text-lg font-black uppercase leading-snug">Original Graphic Apparel</h3>
            <p class="mt-3 text-sm leading-6 text-white/75">Brand-led graphics, not copied fan merch.</p>
          </div>

          <div class="rounded-2xl border border-white/10 bg-white/5 p-6">
            <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-[#A3E635] text-sm font-black text-[#0B0F0D]">04</div>
            <h3 class="text-lg font-black uppercase leading-snug">Secure Online Shopping</h3>
            <p class="mt-3 text-sm leading-6 text-white/75">Clear policies, support, and checkout trust.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Best Sellers -->
    <section class="bg-white py-16 lg:py-24">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-10">
          <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#22C55E]">Customer Picks</p>
          <h2 class="text-4xl font-black uppercase tracking-[-0.05em] text-[#111827] lg:text-5xl">Best Sellers</h2>
        </div>

        <div class="grid grid-cols-2 gap-4 lg:grid-cols-4 lg:gap-6">
          <article class="overflow-hidden rounded-2xl border border-[#E5E7EB] bg-white transition hover:-translate-y-1 hover:shadow-xl">
            <img src="https://images.unsplash.com/photo-1576566588028-4147f3842f27?auto=format&fit=crop&w=700&q=80" alt="Best selling graphic tee" class="aspect-[4/5] w-full object-cover" />
            <div class="p-4">
              <h3 class="text-sm font-black text-[#111827] sm:text-base">Core Graphic Tee</h3>
              <p class="mt-1 font-black text-[#123D2A]">$29.00</p>
            </div>
          </article>

          <article class="overflow-hidden rounded-2xl border border-[#E5E7EB] bg-white transition hover:-translate-y-1 hover:shadow-xl">
            <img src="https://images.unsplash.com/photo-1562157873-818bc0726f68?auto=format&fit=crop&w=700&q=80" alt="Best selling oversized tee" class="aspect-[4/5] w-full object-cover" />
            <div class="p-4">
              <h3 class="text-sm font-black text-[#111827] sm:text-base">Oversized Street Tee</h3>
              <p class="mt-1 font-black text-[#123D2A]">$34.00</p>
            </div>
          </article>

          <article class="overflow-hidden rounded-2xl border border-[#E5E7EB] bg-white transition hover:-translate-y-1 hover:shadow-xl">
            <img src="https://images.unsplash.com/photo-1552374196-1ab2a1c593e8?auto=format&fit=crop&w=700&q=80" alt="Best selling hoodie" class="aspect-[4/5] w-full object-cover" />
            <div class="p-4">
              <h3 class="text-sm font-black text-[#111827] sm:text-base">Minimal Logo Hoodie</h3>
              <p class="mt-1 font-black text-[#123D2A]">$52.00</p>
            </div>
          </article>

          <article class="overflow-hidden rounded-2xl border border-[#E5E7EB] bg-white transition hover:-translate-y-1 hover:shadow-xl">
            <img src="https://images.unsplash.com/photo-1506629905607-d9e297d387be?auto=format&fit=crop&w=700&q=80" alt="Best selling vintage tee" class="aspect-[4/5] w-full object-cover" />
            <div class="p-4">
              <h3 class="text-sm font-black text-[#111827] sm:text-base">Vintage Wash Tee</h3>
              <p class="mt-1 font-black text-[#123D2A]">$36.00</p>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- Newsletter -->
    <section class="bg-[#0B0F0D] py-16 text-white lg:py-24">
      <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-8 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
        <div>
          <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#A3E635]">Stay Connected</p>
          <h2 class="text-4xl font-black uppercase tracking-[-0.05em] lg:text-5xl">Stay Updated On New Drops</h2>
          <p class="mt-4 max-w-xl text-white/80">
            Get updates on new graphic tees, oversized fits, hoodie releases, and clean streetwear essentials.
          </p>
        </div>

        <form class="flex flex-col gap-3 rounded-2xl border border-white/10 bg-white/5 p-3 sm:flex-row" action="#" method="post">
          <label for="slicktee-email" class="sr-only">Email address</label>
          <input id="slicktee-email" type="email" name="email" placeholder="Enter your email" class="min-h-12 flex-1 rounded-md border border-white/10 bg-white px-4 text-[#111827] placeholder:text-[#6B7280] focus:outline-none focus:ring-2 focus:ring-[#A3E635]" />
          <button type="submit" class="min-h-12 rounded-md bg-[#22C55E] px-6 text-sm font-black uppercase tracking-wide text-[#0B0F0D] transition hover:bg-[#A3E635]">
            Join
          </button>
        </form>
      </div>
    </section>
  </main>
</body>
</html>
