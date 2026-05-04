<?php
/**
 * Template part for displaying the home page
 */
?>

<!-- Noise Overlay -->
<div class="fixed inset-0 z-[50] pointer-events-none opacity-[0.03] bg-[url('https://grainy-gradients.vercel.app/noise.svg')]"></div>

<main class="w-full bg-background min-h-screen overflow-hidden selection:bg-muted selection:text-background pb-32">
    
    <!-- HERO SECTION: The Editorial Split -->
    <section class="relative min-h-[100dvh] w-full flex flex-col md:flex-row items-center justify-between px-4 md:px-12 py-24 md:py-32 max-w-[1600px] mx-auto gap-12 md:gap-8 reveal-container">
        
        <!-- Left: Typography -->
        <div class="w-full md:w-1/2 flex flex-col items-start z-10 space-y-8 animate-fade-up">
            <div class="rounded-full px-4 py-1.5 text-[10px] uppercase tracking-[0.2em] font-medium bg-black/5 text-foreground ring-1 ring-black/5">
                Vanguard Interior Architecture
            </div>
            
            <h1 class="font-heading text-[4rem] md:text-[6rem] lg:text-[7.5rem] leading-[0.9] tracking-[-0.04em] text-foreground">
                Shaping <br/>
                <span class="text-muted italic font-serif opacity-90">Atmospheric</span> <br/>
                Sanctuaries.
            </h1>
            
            <p class="text-lg md:text-xl text-foreground/60 max-w-md font-sans leading-relaxed">
                We orchestrate light, materiality, and form to engineer $150k+ residential and commercial experiences that breathe.
            </p>
            
            <!-- CTA Button -->
            <button class="group relative inline-flex items-center rounded-full bg-foreground text-background px-8 py-4 font-sans font-medium text-sm transition-all duration-700 ease-fluid hover:scale-[0.98] mt-4">
                <span>View Selected Works</span>
                <!-- Nested Trailing Icon -->
                <div class="absolute right-1.5 top-1.5 bottom-1.5 w-[calc(100%-3rem)] max-w-[3rem] rounded-full bg-white/10 flex items-center justify-center transition-all duration-700 ease-fluid group-hover:translate-x-1 group-hover:-translate-y-[1px] group-hover:scale-105 group-hover:bg-white/20">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M7 17L17 7M17 7H7M17 7V17"/>
                    </svg>
                </div>
            </button>
        </div>

        <!-- Right: Interactive Staggered Image (Double-Bezel) -->
        <div class="w-full md:w-1/2 relative h-[60vh] md:h-[80vh] flex items-center justify-center animate-fade-up" style="animation-delay: 200ms;">
            <!-- Outer Shell -->
            <div class="relative w-full max-w-[500px] aspect-[3/4] rounded-[2rem] bg-black/5 p-2 ring-1 ring-black/5 transform transition-transform duration-700 ease-fluid hover:rotate-[-1deg]">
                <!-- Inner Core -->
                <div class="relative w-full h-full rounded-[calc(2rem-0.5rem)] bg-surface overflow-hidden shadow-[inset_0_1px_1px_rgba(255,255,255,0.15)] group">
                    <img src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&q=80&w=1000" alt="Interior Architecture" class="w-full h-full object-cover transition-transform duration-[1.5s] ease-fluid group-hover:scale-105" />
                    <!-- Floating Badge -->
                    <div class="absolute bottom-6 left-6 bg-surface/80 backdrop-blur-md px-4 py-2 rounded-full text-xs font-medium uppercase tracking-wider text-foreground">
                        Project: The Luminary
                    </div>
                </div>
            </div>
            
            <!-- Secondary overlapping element (Z-Axis Cascade) -->
            <div class="absolute -bottom-10 -left-10 md:left-0 hidden md:block w-48 aspect-square rounded-[2rem] bg-white/5 p-1.5 ring-1 ring-black/10 backdrop-blur-xl z-20 transform rotate-[-4deg] transition-transform duration-700 ease-fluid hover:rotate-0">
                <div class="relative w-full h-full rounded-[calc(2rem-0.375rem)] bg-muted/20 overflow-hidden flex flex-col justify-center items-center text-center p-4">
                    <span class="font-heading text-4xl text-foreground">12+</span>
                    <span class="font-sans text-xs uppercase tracking-widest text-foreground/70 mt-1">Global Awards</span>
                </div>
            </div>
        </div>
    </section>

    <!-- BENTO GRID SECTION -->
    <section class="w-full px-4 md:px-12 py-24 md:py-40 max-w-[1600px] mx-auto scroll-reveal">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 md:mb-24 gap-8">
            <div class="w-full md:w-2/3">
                <div class="rounded-full px-4 py-1.5 text-[10px] uppercase tracking-[0.2em] font-medium bg-black/5 text-foreground ring-1 ring-black/5 inline-block mb-6">
                    Curated Portfolio
                </div>
                <h2 class="font-heading text-[3rem] md:text-[5rem] leading-[0.95] tracking-[-0.03em] text-foreground">
                    Spatial narratives <br/> crafted in stone and light.
                </h2>
            </div>
            <a href="#" class="group flex items-center gap-2 text-sm uppercase tracking-widest font-medium pb-2 border-b border-foreground/20 hover:border-foreground transition-colors">
                Explore Index
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="transform transition-transform duration-500 group-hover:translate-x-1">
                    <path d="M5 12h14M12 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

        <!-- The Asymmetrical Bento Grid -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 md:gap-6">
            
            <!-- Bento 1: Large Image (span 8) -->
            <div class="col-span-1 md:col-span-8 row-span-2 group">
                <div class="w-full h-full min-h-[400px] md:min-h-[600px] rounded-[2rem] bg-black/5 p-1.5 ring-1 ring-black/5 transition-transform duration-700 ease-fluid hover:scale-[0.99]">
                    <div class="relative w-full h-full rounded-[calc(2rem-0.375rem)] overflow-hidden shadow-[inset_0_1px_1px_rgba(255,255,255,0.15)]">
                        <img src="https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&q=80&w=1200" alt="Living Room" class="w-full h-full object-cover transition-transform duration-[2s] ease-fluid group-hover:scale-105" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                        <div class="absolute bottom-8 left-8 text-white">
                            <h3 class="font-heading text-3xl mb-1">Oak & Onyx Residence</h3>
                            <p class="font-sans text-sm opacity-80">Minimalist Reconstruction</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bento 2: Text Box (span 4) -->
            <div class="col-span-1 md:col-span-4 rounded-[2rem] bg-black/5 p-1.5 ring-1 ring-black/5">
                <div class="relative w-full h-full min-h-[250px] rounded-[calc(2rem-0.375rem)] bg-surface p-8 flex flex-col justify-between shadow-[inset_0_1px_1px_rgba(0,0,0,0.05)]">
                    <div class="w-10 h-10 rounded-full border border-black/10 flex items-center justify-center">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-sans text-lg text-foreground/80 leading-relaxed mb-4">
                            "Our philosophy revolves around subtraction. Removing the non-essential until only poetry remains."
                        </p>
                        <span class="text-xs font-medium uppercase tracking-widest text-muted">Aesthetic Ethos</span>
                    </div>
                </div>
            </div>

            <!-- Bento 3: Small Image (span 4) -->
            <div class="col-span-1 md:col-span-4 group">
                <div class="w-full h-full min-h-[300px] rounded-[2rem] bg-black/5 p-1.5 ring-1 ring-black/5 transition-transform duration-700 ease-fluid hover:scale-[0.98]">
                    <div class="relative w-full h-full rounded-[calc(2rem-0.375rem)] overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1538688525198-9b88f6f53126?auto=format&fit=crop&q=80&w=800" alt="Detail" class="w-full h-full object-cover transition-transform duration-[2s] ease-fluid group-hover:scale-105" />
                    </div>
                </div>
            </div>

            <!-- Bento 4: Horizontal Image (span 8) -->
            <div class="col-span-1 md:col-span-8 group">
                <div class="w-full h-full min-h-[300px] rounded-[2rem] bg-black/5 p-1.5 ring-1 ring-black/5 transition-transform duration-700 ease-fluid hover:scale-[0.99]">
                    <div class="relative w-full h-full rounded-[calc(2rem-0.375rem)] overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&q=80&w=1200" alt="Dining" class="w-full h-full object-cover transition-transform duration-[2s] ease-fluid group-hover:scale-105" />
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- SECTION: This week's top picks -->
    <section class="w-full px-4 md:px-12 py-24 md:py-32 max-w-[1600px] mx-auto overflow-hidden">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-8 scroll-reveal">
            <div>
                <div class="rounded-full px-4 py-1.5 text-[10px] uppercase tracking-[0.2em] font-medium bg-black/5 text-foreground ring-1 ring-black/5 inline-block mb-6">
                    Curated For You
                </div>
                <h2 class="font-heading text-[3rem] md:text-[4rem] leading-[1] tracking-[-0.03em] text-foreground">
                    This week's <br/> top picks.
                </h2>
            </div>
            <a href="#" class="group flex items-center gap-2 text-sm uppercase tracking-widest font-medium pb-2 border-b border-foreground/20 hover:border-foreground transition-colors">
                Shop the Collection
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="transform transition-transform duration-500 group-hover:translate-x-1">
                    <path d="M5 12h14M12 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
            <!-- Product 1 -->
            <div class="group scroll-reveal" style="transition-delay: 100ms;">
                <div class="w-full aspect-[4/5] rounded-[2rem] bg-black/5 p-1.5 ring-1 ring-black/5 transition-transform duration-700 ease-fluid hover:-translate-y-2">
                    <div class="relative w-full h-full rounded-[calc(2rem-0.375rem)] overflow-hidden shadow-[inset_0_1px_1px_rgba(255,255,255,0.15)] bg-surface">
                        <img src="https://images.unsplash.com/photo-1567016432779-094069958ea5?auto=format&fit=crop&q=80&w=800" alt="Lounge Chair" class="w-full h-full object-cover transition-transform duration-[2s] ease-fluid group-hover:scale-105" />
                        <button class="absolute bottom-6 right-6 w-12 h-12 rounded-full bg-foreground text-background flex items-center justify-center opacity-0 translate-y-4 transition-all duration-500 ease-fluid group-hover:opacity-100 group-hover:translate-y-0 hover:scale-110">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
                        </button>
                    </div>
                </div>
                <div class="mt-6 flex justify-between items-start">
                    <div>
                        <h3 class="font-heading text-xl">The Pierre Lounge</h3>
                        <p class="font-sans text-sm text-muted mt-1">Bouclé & Walnut</p>
                    </div>
                    <span class="font-sans font-medium">$2,450</span>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="group scroll-reveal" style="transition-delay: 200ms;">
                <div class="w-full aspect-[4/5] rounded-[2rem] bg-black/5 p-1.5 ring-1 ring-black/5 transition-transform duration-700 ease-fluid hover:-translate-y-2 mt-0 md:mt-12">
                    <div class="relative w-full h-full rounded-[calc(2rem-0.375rem)] overflow-hidden shadow-[inset_0_1px_1px_rgba(255,255,255,0.15)] bg-surface">
                        <img src="https://images.unsplash.com/photo-1505843490538-5133c6c7d0e1?auto=format&fit=crop&q=80&w=800" alt="Coffee Table" class="w-full h-full object-cover transition-transform duration-[2s] ease-fluid group-hover:scale-105" />
                        <button class="absolute bottom-6 right-6 w-12 h-12 rounded-full bg-foreground text-background flex items-center justify-center opacity-0 translate-y-4 transition-all duration-500 ease-fluid group-hover:opacity-100 group-hover:translate-y-0 hover:scale-110">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
                        </button>
                    </div>
                </div>
                <div class="mt-6 flex justify-between items-start">
                    <div>
                        <h3 class="font-heading text-xl">Monolith Table</h3>
                        <p class="font-sans text-sm text-muted mt-1">Travertine Stone</p>
                    </div>
                    <span class="font-sans font-medium">$1,890</span>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="group scroll-reveal" style="transition-delay: 300ms;">
                <div class="w-full aspect-[4/5] rounded-[2rem] bg-black/5 p-1.5 ring-1 ring-black/5 transition-transform duration-700 ease-fluid hover:-translate-y-2">
                    <div class="relative w-full h-full rounded-[calc(2rem-0.375rem)] overflow-hidden shadow-[inset_0_1px_1px_rgba(255,255,255,0.15)] bg-surface">
                        <img src="https://images.unsplash.com/photo-1538688525198-9b88f6f53126?auto=format&fit=crop&q=80&w=800" alt="Sofa" class="w-full h-full object-cover transition-transform duration-[2s] ease-fluid group-hover:scale-105" />
                        <button class="absolute bottom-6 right-6 w-12 h-12 rounded-full bg-foreground text-background flex items-center justify-center opacity-0 translate-y-4 transition-all duration-500 ease-fluid group-hover:opacity-100 group-hover:translate-y-0 hover:scale-110">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
                        </button>
                    </div>
                </div>
                <div class="mt-6 flex justify-between items-start">
                    <div>
                        <h3 class="font-heading text-xl">Cloud Sofa</h3>
                        <p class="font-sans text-sm text-muted mt-1">Italian Linen</p>
                    </div>
                    <span class="font-sans font-medium">$4,200</span>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: Why shoppers keep coming back -->
    <section class="w-full px-4 md:px-12 py-24 max-w-[1600px] mx-auto">
        <div class="flex flex-col items-center text-center mb-20 scroll-reveal">
            <h2 class="font-heading text-[2.5rem] md:text-[3.5rem] leading-[1.1] tracking-[-0.02em] text-foreground">
                Why shoppers keep <br/> coming back.
            </h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Feature 1 -->
            <div class="rounded-[2rem] bg-black/5 p-1.5 ring-1 ring-black/5 scroll-reveal" style="transition-delay: 100ms;">
                <div class="w-full h-full rounded-[calc(2rem-0.375rem)] bg-surface p-10 flex flex-col items-center text-center shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)] transition-all duration-500 hover:shadow-xl hover:-translate-y-1">
                    <div class="w-16 h-16 rounded-full bg-background flex items-center justify-center mb-6">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    </div>
                    <h3 class="font-heading text-xl mb-3">White-Glove Delivery</h3>
                    <p class="font-sans text-sm text-foreground/70 leading-relaxed">
                        Every piece is unpacked, assembled, and perfectly placed in your home by our specialized team.
                    </p>
                </div>
            </div>
            
            <!-- Feature 2 -->
            <div class="rounded-[2rem] bg-black/5 p-1.5 ring-1 ring-black/5 scroll-reveal" style="transition-delay: 200ms;">
                <div class="w-full h-full rounded-[calc(2rem-0.375rem)] bg-surface p-10 flex flex-col items-center text-center shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)] transition-all duration-500 hover:shadow-xl hover:-translate-y-1">
                    <div class="w-16 h-16 rounded-full bg-background flex items-center justify-center mb-6">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                    </div>
                    <h3 class="font-heading text-xl mb-3">Lifetime Warranty</h3>
                    <p class="font-sans text-sm text-foreground/70 leading-relaxed">
                        Our furniture is engineered to last generations. If a joint fails, we fix it. No questions asked.
                    </p>
                </div>
            </div>
            
            <!-- Feature 3 -->
            <div class="rounded-[2rem] bg-black/5 p-1.5 ring-1 ring-black/5 scroll-reveal" style="transition-delay: 300ms;">
                <div class="w-full h-full rounded-[calc(2rem-0.375rem)] bg-surface p-10 flex flex-col items-center text-center shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)] transition-all duration-500 hover:shadow-xl hover:-translate-y-1">
                    <div class="w-16 h-16 rounded-full bg-background flex items-center justify-center mb-6">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>
                    </div>
                    <h3 class="font-heading text-xl mb-3">Sustainable Materials</h3>
                    <p class="font-sans text-sm text-foreground/70 leading-relaxed">
                        Sourced exclusively from FSC-certified forests and artisan studios across the globe.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: Deals first. Always subscriber-only. -->
    <section class="w-full px-4 md:px-12 py-24 max-w-[1400px] mx-auto scroll-reveal">
        <div class="rounded-[3rem] bg-foreground text-background p-2 ring-1 ring-foreground/10 transform transition-transform duration-1000 ease-fluid hover:scale-[1.01]">
            <div class="relative w-full rounded-[calc(3rem-0.5rem)] bg-foreground p-8 md:p-20 overflow-hidden shadow-[inset_0_1px_1px_rgba(255,255,255,0.1)] flex flex-col md:flex-row items-center justify-between gap-12 z-10">
                <!-- Abstract glowing mesh behind text -->
                <div class="absolute -top-24 -left-24 w-96 h-96 bg-muted/20 rounded-full blur-3xl pointer-events-none"></div>
                
                <div class="w-full md:w-1/2 relative z-20">
                    <h2 class="font-heading text-[2.5rem] md:text-[4rem] leading-[1.05] tracking-[-0.02em] mb-6">
                        Deals first. <br/> Always subscriber-only.
                    </h2>
                    <p class="font-sans text-background/70 text-lg leading-relaxed max-w-md">
                        Early access to new arrivals, subscriber-only discount codes, and a first look at our weekend markdowns. Two emails a month — that is it.
                    </p>
                </div>
                
                <div class="w-full md:w-1/2 relative z-20">
                    <form class="flex flex-col gap-4 w-full max-w-md ml-auto">
                        <div class="relative w-full rounded-full bg-white/10 p-1 backdrop-blur-sm ring-1 ring-white/10 focus-within:ring-white/30 transition-all">
                            <input type="email" placeholder="Enter your email address" class="w-full bg-transparent border-none text-background placeholder:text-background/50 px-6 py-4 outline-none font-sans text-sm" />
                            <button class="absolute right-2 top-2 bottom-2 bg-background text-foreground px-6 rounded-full font-medium text-sm transition-transform duration-300 hover:scale-[0.98]">
                                Subscribe
                            </button>
                        </div>
                        <p class="text-xs text-background/40 px-4">By subscribing, you agree to our Terms of Service & Privacy Policy.</p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: Shopping that feels handled -->
    <section class="w-full py-32 md:py-48 flex items-center justify-center text-center px-4 scroll-reveal">
        <h2 class="font-heading text-[3.5rem] md:text-[6rem] lg:text-[8rem] leading-[0.9] tracking-[-0.04em] text-foreground/10 hover:text-foreground transition-colors duration-[1.5s] ease-fluid cursor-default">
            Shopping that <br/> <span class="italic font-serif">feels</span> handled.
        </h2>
    </section>

</main>

<style>
/* Custom animations & utilities */
@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(4rem);
        filter: blur(8px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
        filter: blur(0);
    }
}
.animate-fade-up {
    animation: fadeUp 1s cubic-bezier(0.32, 0.72, 0, 1) forwards;
    opacity: 0;
}

/* Scroll reveal classes */
.scroll-reveal {
    opacity: 0;
    transform: translateY(4rem);
    filter: blur(8px);
    transition: all 1s cubic-bezier(0.32, 0.72, 0, 1);
}
.scroll-reveal.is-visible {
    opacity: 1;
    transform: translateY(0);
    filter: blur(0);
}
</style>

<script>
// Intersection Observer for scroll animations
document.addEventListener('DOMContentLoaded', () => {
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.15
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll('.scroll-reveal').forEach((elem) => {
        observer.observe(elem);
    });
});
</script>
