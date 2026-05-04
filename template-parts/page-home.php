<?php
/**
 * Template part for displaying the home page
 * Design System: Editorial Luxury x Soft Structuralism
 * Skill: High-End Visual Design (Awwwards-Tier)
 */
?>

<!-- Import Fonts: Clash Display & Satoshi -->
<link href="https://api.fontshare.com/v2/css?f[]=clash-display@400,500,600,700&f[]=satoshi@400,500,700,900&display=swap" rel="stylesheet">
<!-- Import Phosphor Icons -->
<script src="https://unpkg.com/@phosphor-icons/web"></script>

<style>
  :root {
    --color-paper: #FAFAF7;
    --color-ink: #0A0A0A;
    --color-accent: #FF4D2E;
    --color-lime: #D4FF3D;
    
    --font-display: 'Clash Display', sans-serif;
    --font-body: 'Satoshi', sans-serif;
    
    --ease-spring: cubic-bezier(0.32,0.72,0,1);
  }

  body {
    background-color: var(--color-paper);
    color: var(--color-ink);
    font-family: var(--font-body);
    -webkit-font-smoothing: antialiased;
  }

  h1, h2, h3, h4, .font-display {
    font-family: var(--font-display);
  }

  /* Fixed Noise Overlay */
  .noise-overlay {
    position: fixed;
    inset: 0;
    z-index: 50;
    pointer-events: none;
    opacity: 0.03;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
  }

  /* Scroll Reveal Classes */
  .reveal-up {
    opacity: 0;
    transform: translateY(4rem);
    filter: blur(8px);
    transition: all 800ms var(--ease-spring);
    will-change: transform, opacity, filter;
  }
  .reveal-up.is-visible {
    opacity: 1;
    transform: translateY(0);
    filter: blur(0);
  }

  /* Custom Horizontal Scroll Bar hiding */
  .no-scrollbar::-webkit-scrollbar {
    display: none;
  }
  .no-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
  }
  
  /* Double Bezel Architecture */
  .double-bezel-shell {
    background: rgba(0, 0, 0, 0.03);
    border: 1px solid rgba(0, 0, 0, 0.05);
    padding: 0.5rem;
    border-radius: 2rem;
  }
  .double-bezel-core {
    background: var(--color-paper);
    border-radius: calc(2rem - 0.5rem);
    box-shadow: inset 0 1px 1px rgba(255, 255, 255, 0.6);
    overflow: hidden;
  }
  
  /* Marquee */
  @keyframes marquee {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
  }
  .animate-marquee {
    animation: marquee 30s linear infinite;
  }
</style>

<div class="noise-overlay"></div>

<!-- 1. HERO SECTION (The Hook) - The Editorial Split -->
<section class="min-h-[100dvh] w-full flex flex-col md:flex-row relative px-4 md:px-8 py-8 md:py-12 pb-24" style="background-color: var(--color-paper);">
  
  <!-- Left: Massive Typography -->
  <div class="w-full md:w-1/2 flex flex-col justify-center h-full pt-16 md:pt-0 pr-0 md:pr-12 reveal-up">
    <!-- Eyebrow -->
    <div class="inline-flex items-center rounded-full px-3 py-1 text-[10px] uppercase tracking-[0.2em] font-medium border border-black/10 w-max mb-6">
      <span class="w-1.5 h-1.5 rounded-full bg-[#FF4D2E] mr-2"></span>
      Issue 04 / Editorial
    </div>
    
    <h1 class="font-display text-[12vw] md:text-[6vw] font-bold leading-[0.85] tracking-[-0.04em] mb-6 uppercase">
      WEAR<br/>
      WHAT<br/>
      YOU<br/>
      <span class="text-[#FF4D2E] italic font-medium">MEAN.</span>
    </h1>
    
    <p class="text-lg md:text-xl text-black/60 max-w-md mb-12 leading-relaxed">
      Not just a tee, it's a statement. Limited edition pieces for the bold.
    </p>
    
    <!-- CTA: Button-in-Button -->
    <div class="group relative inline-flex w-max cursor-pointer items-center rounded-full bg-[#0A0A0A] p-1.5 pr-2 transition-all duration-500 active:scale-[0.98] reveal-up" style="transition-delay: 150ms;">
      <span class="pl-6 pr-4 py-3 text-sm font-medium tracking-wide text-white uppercase">Shop the Fit</span>
      <div class="flex h-10 w-10 items-center justify-center rounded-full bg-white/10 transition-transform duration-500 group-hover:scale-105 group-hover:-translate-y-[1px] group-hover:translate-x-1">
        <i class="ph-light ph-arrow-up-right text-white text-lg"></i>
      </div>
    </div>
  </div>
  
  <!-- Right: Image / Interactive -->
  <div class="w-full md:w-1/2 h-[60vh] md:h-[calc(100vh-6rem)] mt-12 md:mt-0 relative double-bezel-shell reveal-up" style="transition-delay: 200ms;">
    <div class="double-bezel-core w-full h-full relative group">
      <img src="https://picsum.photos/seed/editorial-hero/1200/1600" class="w-full h-full object-cover transition-transform duration-1000 ease-[cubic-bezier(0.32,0.72,0,1)] group-hover:scale-105" alt="Editorial Hero Image" />
      <div class="absolute bottom-6 left-6 right-6 flex justify-between items-end">
        <div class="backdrop-blur-md bg-white/30 p-4 rounded-2xl border border-white/20">
          <p class="font-display font-medium text-lg text-black">"STILL LIFE" TEE</p>
          <p class="text-sm text-black/70 font-medium tracking-wide">$48.00</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 2. QUICK NAV (The Shortcut) -->
<section class="w-full py-8 md:py-12 border-y border-black/5 overflow-hidden">
  <div class="flex flex-nowrap overflow-x-auto no-scrollbar gap-4 px-4 md:px-8 w-full reveal-up">
    <?php
    $categories = [
      ['name' => 'Tees', 'icon' => 'ph-t-shirt'],
      ['name' => 'Hoodies', 'icon' => 'ph-hoodie'],
      ['name' => 'Accessories', 'icon' => 'ph-baseball-cap'],
      ['name' => 'Best Sellers', 'icon' => 'ph-fire'],
      ['name' => 'Sale', 'icon' => 'ph-tag'],
    ];
    foreach($categories as $cat) {
    ?>
    <a href="#" class="group flex items-center gap-3 px-6 py-4 rounded-full border border-black/10 hover:border-black/30 hover:bg-black/5 transition-colors duration-500 flex-shrink-0">
      <i class="ph-light <?php echo $cat['icon']; ?> text-xl text-black"></i>
      <span class="font-medium text-sm tracking-wide uppercase"><?php echo $cat['name']; ?></span>
    </a>
    <?php } ?>
  </div>
</section>

<!-- 3. FEATURED COLLECTION (The Meat) - Asymmetrical Bento -->
<section class="w-full py-24 md:py-32 px-4 md:px-8 max-w-[1600px] mx-auto">
  <div class="flex justify-between items-end mb-16 md:mb-24 reveal-up">
    <div>
      <div class="inline-flex items-center rounded-full px-3 py-1 text-[10px] uppercase tracking-[0.2em] font-medium border border-black/10 mb-4">
        Weekly Must-Cops
      </div>
      <h2 class="font-display text-4xl md:text-6xl font-bold tracking-tight">DROP 014</h2>
    </div>
    <a href="#" class="group hidden md:flex items-center gap-2 text-sm font-medium uppercase tracking-wide border-b border-black pb-1 hover:text-[#FF4D2E] hover:border-[#FF4D2E] transition-colors">
      View All 
      <i class="ph-light ph-arrow-right transition-transform group-hover:translate-x-1"></i>
    </a>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-12 gap-6 md:gap-8 auto-rows-[400px] md:auto-rows-[450px]">
    
    <!-- Bento Item 1: Large (Span 8) -->
    <div class="col-span-1 md:col-span-8 row-span-1 md:row-span-2 double-bezel-shell reveal-up">
      <div class="double-bezel-core relative w-full h-full group cursor-pointer bg-black/5">
        <img src="https://picsum.photos/seed/product1-main/1200/1600" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-700 ease-[cubic-bezier(0.32,0.72,0,1)] group-hover:opacity-0" alt="Product" />
        <img src="https://picsum.photos/seed/product1-hover/1200/1600" class="absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-700 ease-[cubic-bezier(0.32,0.72,0,1)] group-hover:opacity-100" alt="Product Hover" />
        
        <!-- Badges -->
        <div class="absolute top-6 left-6 z-10">
          <span class="bg-[#D4FF3D] text-[#0A0A0A] px-3 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-wider">New</span>
        </div>
        
        <!-- Info Panel -->
        <div class="absolute bottom-6 left-6 right-6 flex justify-between items-end opacity-0 translate-y-4 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 ease-[cubic-bezier(0.32,0.72,0,1)] z-10">
          <div class="bg-white/90 backdrop-blur p-5 rounded-2xl border border-black/5 shadow-sm">
            <h3 class="font-display font-medium text-xl text-black">"MIRAGE" HOODIE</h3>
            <p class="text-[#FF4D2E] font-bold mt-1">$94.00</p>
          </div>
          <button class="w-12 h-12 rounded-full bg-black flex items-center justify-center text-white hover:scale-105 transition-transform duration-300 shadow-xl">
            <i class="ph-light ph-plus text-xl"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Bento Item 2: Small (Span 4) -->
    <div class="col-span-1 md:col-span-4 double-bezel-shell reveal-up" style="transition-delay: 100ms;">
      <div class="double-bezel-core relative w-full h-full group cursor-pointer bg-white">
        <img src="https://picsum.photos/seed/product2/800/1000" class="w-full h-full object-cover object-center transition-transform duration-1000 ease-[cubic-bezier(0.32,0.72,0,1)] group-hover:scale-105" alt="Product" />
        <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/60 to-transparent">
          <h3 class="font-display font-medium text-lg text-white">"STATIC" TEE</h3>
          <p class="text-white/80 font-medium">$48.00</p>
        </div>
      </div>
    </div>

    <!-- Bento Item 3: Small (Span 4) -->
    <div class="col-span-1 md:col-span-4 double-bezel-shell reveal-up" style="transition-delay: 200ms;">
      <div class="double-bezel-core relative w-full h-full group cursor-pointer bg-white">
        <img src="https://picsum.photos/seed/product3/800/1000" class="w-full h-full object-cover object-center transition-transform duration-1000 ease-[cubic-bezier(0.32,0.72,0,1)] group-hover:scale-105" alt="Product" />
        <div class="absolute top-6 left-6 z-10">
          <span class="bg-[#FF4D2E] text-white px-3 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-wider">Limited</span>
        </div>
        <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/60 to-transparent">
          <h3 class="font-display font-medium text-lg text-white">"FIELD NOTES" TEE</h3>
          <p class="text-white/80 font-medium">$52.00</p>
        </div>
      </div>
    </div>

  </div>
  
  <a href="#" class="md:hidden mt-12 flex justify-center items-center gap-2 text-sm font-medium uppercase tracking-wide border border-black/20 rounded-full py-4 hover:bg-black/5 transition-colors">
    View All Collection
  </a>
</section>

<!-- 4. EDITORIAL / BRAND MOMENT -->
<section class="w-full py-24 md:py-40 bg-[#050505] text-[#FAFAF7] overflow-hidden rounded-[2.5rem] md:rounded-[4rem] mx-2 md:mx-6 mb-24 max-w-[calc(100%-1rem)] md:max-w-[calc(100%-3rem)] relative">
  <div class="absolute inset-0 z-0 opacity-20 pointer-events-none">
    <div class="absolute top-[-10%] left-[-10%] w-[50%] h-[50%] bg-purple-600 rounded-full mix-blend-screen filter blur-[100px] animate-pulse"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-[60%] h-[60%] bg-[#FF4D2E] rounded-full mix-blend-screen filter blur-[120px] animate-pulse" style="animation-delay: 2s;"></div>
  </div>

  <div class="relative z-10 max-w-[1400px] mx-auto px-4 md:px-12 flex flex-col md:flex-row items-center gap-16 md:gap-24">
    <div class="w-full md:w-5/12 reveal-up">
      <div class="double-bezel-shell !bg-white/5 !border-white/10">
        <div class="double-bezel-core !bg-[#111] shadow-[inset_0_1px_1px_rgba(255,255,255,0.15)] h-[60vh] md:h-[80vh]">
          <img src="https://picsum.photos/seed/editorial-moment/800/1200" class="w-full h-full object-cover object-center grayscale hover:grayscale-0 transition-all duration-1000" alt="Brand Moment" />
        </div>
      </div>
    </div>
    
    <div class="w-full md:w-7/12 flex flex-col justify-center reveal-up" style="transition-delay: 200ms;">
      <h2 class="font-display text-[10vw] md:text-[5vw] font-bold leading-[0.9] tracking-[-0.03em] mb-8">
        SUSTAINABLY<br/>
        MADE.<br/>
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#D4FF3D] to-[#FF4D2E]">UNIQUELY YOURS.</span>
      </h2>
      <p class="text-xl md:text-2xl text-white/70 max-w-xl leading-relaxed mb-12 font-light">
        Every piece is printed on demand. No overproduction, no waste. Just premium heavyweight cotton and a print that outlasts the fabric.
      </p>
      
      <!-- Magnetic Button Light -->
      <div class="group relative inline-flex w-max cursor-pointer items-center rounded-full bg-white p-1.5 pr-2 transition-all duration-500 active:scale-[0.98]">
        <span class="pl-6 pr-4 py-3 text-sm font-medium tracking-wide text-black uppercase">Read the Manifesto</span>
        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-black/5 transition-transform duration-500 group-hover:scale-105 group-hover:-translate-y-[1px] group-hover:translate-x-1">
          <i class="ph-light ph-arrow-right text-black text-lg"></i>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 5. SOCIAL PROOF (The Trust) -->
<section class="w-full py-24 md:py-32 overflow-hidden">
  <div class="px-4 md:px-8 mb-16 text-center reveal-up">
    <h2 class="font-display text-3xl md:text-5xl font-bold mb-4">STYLED BY YOU</h2>
    <p class="font-mono text-xs uppercase tracking-widest text-black/50">#LUMIEREFIT / AS SEEN ON TIKTOK</p>
  </div>
  
  <div class="relative w-full flex overflow-x-hidden group reveal-up" style="transition-delay: 100ms;">
    <div class="flex animate-marquee gap-4 px-2 w-max group-hover:[animation-play-state:paused]">
      <?php for($i = 1; $i <= 8; $i++) { ?>
      <div class="w-[240px] md:w-[280px] h-[380px] md:h-[450px] double-bezel-shell flex-shrink-0 cursor-pointer group/card">
        <div class="double-bezel-core w-full h-full relative">
          <img src="https://picsum.photos/seed/ugc<?php echo $i; ?>/400/600" class="w-full h-full object-cover transition-transform duration-700 group-hover/card:scale-105" alt="UGC Image" />
          <div class="absolute inset-0 bg-black/40 opacity-0 group-hover/card:opacity-100 transition-opacity duration-300 flex items-center justify-center">
            <span class="bg-white text-black px-4 py-2 rounded-full text-xs font-bold uppercase tracking-wider flex items-center gap-2">
              <i class="ph-fill ph-shopping-bag text-sm"></i> Shop Look
            </span>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
    <!-- Duplicate for infinite marquee -->
    <div class="flex animate-marquee gap-4 px-2 w-max group-hover:[animation-play-state:paused]" aria-hidden="true">
      <?php for($i = 1; $i <= 8; $i++) { ?>
      <div class="w-[240px] md:w-[280px] h-[380px] md:h-[450px] double-bezel-shell flex-shrink-0 cursor-pointer group/card">
        <div class="double-bezel-core w-full h-full relative">
          <img src="https://picsum.photos/seed/ugc<?php echo $i; ?>/400/600" class="w-full h-full object-cover transition-transform duration-700 group-hover/card:scale-105" alt="UGC Image" />
          <div class="absolute inset-0 bg-black/40 opacity-0 group-hover/card:opacity-100 transition-opacity duration-300 flex items-center justify-center">
            <span class="bg-white text-black px-4 py-2 rounded-full text-xs font-bold uppercase tracking-wider flex items-center gap-2">
              <i class="ph-fill ph-shopping-bag text-sm"></i> Shop Look
            </span>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>

<!-- 6. VALUE PROPS (The Logic) -->
<section class="w-full py-16 md:py-24 border-t border-black/10">
  <div class="max-w-[1400px] mx-auto px-4 md:px-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-12 md:gap-8 reveal-up">
      <div class="flex flex-col items-center md:items-start text-center md:text-left">
        <i class="ph-light ph-package text-4xl mb-6"></i>
        <h3 class="font-display font-medium text-xl mb-3">Fast Shipping</h3>
        <p class="text-black/60 text-sm leading-relaxed max-w-[280px]">Dispatched within 48 hours. Express delivery available across the US.</p>
      </div>
      <div class="flex flex-col items-center md:items-start text-center md:text-left">
        <i class="ph-light ph-recycle text-4xl mb-6"></i>
        <h3 class="font-display font-medium text-xl mb-3">Printed on Demand</h3>
        <p class="text-black/60 text-sm leading-relaxed max-w-[280px]">Zero overproduction. We make it when you order it, reducing environmental waste.</p>
      </div>
      <div class="flex flex-col items-center md:items-start text-center md:text-left">
        <i class="ph-light ph-lock-key text-4xl mb-6"></i>
        <h3 class="font-display font-medium text-xl mb-3">Secure Checkout</h3>
        <p class="text-black/60 text-sm leading-relaxed max-w-[280px]">Encrypted transactions via Apple Pay, Google Pay, and Shop Pay.</p>
      </div>
    </div>
  </div>
</section>

<!-- 7. NEWSLETTER (The Retain) -->
<section class="w-full bg-[#D4FF3D] py-24 md:py-40 px-4 md:px-8 mt-12 rounded-t-[3rem] md:rounded-t-[5rem] relative z-10">
  <div class="max-w-4xl mx-auto text-center reveal-up">
    <h2 class="font-display text-[12vw] md:text-[6vw] font-bold leading-[0.85] tracking-[-0.04em] mb-6 uppercase">
      DON'T<br/>
      GHOST<br/>
      US.
    </h2>
    <p class="text-lg md:text-xl text-black/70 mb-12 font-medium">Get early access to drops. No spam, ever.</p>
    
    <form class="max-w-xl mx-auto flex flex-col md:flex-row gap-4 md:gap-0 border-b-2 border-black pb-4 md:pb-2 items-center relative group" onsubmit="event.preventDefault();">
      <input type="email" placeholder="ENTER YOUR EMAIL" class="w-full bg-transparent border-none outline-none text-xl md:text-2xl font-display font-medium placeholder-black/30 text-center md:text-left" required />
      <button type="submit" class="md:absolute right-0 top-1/2 md:-translate-y-1/2 flex items-center justify-center w-12 h-12 rounded-full bg-black text-white hover:scale-110 transition-transform duration-300">
        <i class="ph-light ph-arrow-right text-xl"></i>
      </button>
    </form>
  </div>
</section>

<!-- JS for Scroll Interpolation -->
<script>
  document.addEventListener("DOMContentLoaded", () => {
    const observerOptions = {
      root: null,
      rootMargin: '0px',
      threshold: 0.15
    };

    const observer = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, observerOptions);

    const revealElements = document.querySelectorAll('.reveal-up');
    revealElements.forEach(el => observer.observe(el));
  });
</script>
