<?php
/**
 * Template Part: About Us Page
 * Brand: UK Official Store
 * Description: Sporty, modern, and clean About Us page for an activewear brand.
 */

// Image Paths (Using high-quality Unsplash images that match the activewear niche)
$img_hero = 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?q=80&w=1400&auto=format&fit=crop';
$img_mission = 'https://images.unsplash.com/photo-1517836357463-d25dfeac3438?q=80&w=1000&auto=format&fit=crop';
$img_lifestyle = get_template_directory_uri() . '/assets/img/hero_activewear_lifestyle.png';
?>

<div class="bg-background font-sans text-foreground overflow-hidden">

    <!-- Section 1: Hero -->
    <section class="relative py-24 md:py-32 bg-navy text-white overflow-hidden min-h-[450px] flex items-center">
        <!-- Background Image & Accents -->
        <div class="absolute inset-0 z-0">
            <img src="<?php echo $img_hero; ?>" alt="Our Story" class="w-full h-full object-cover opacity-40">
            <div class="absolute inset-0 bg-gradient-to-b from-navy/70 via-navy/50 to-navy/80"></div>
            
            <!-- Floating Accents -->
            <div class="absolute top-0 right-0 w-1/2 h-full bg-blue/10 skew-x-12 translate-x-1/4 pointer-events-none"></div>
            <div class="absolute bottom-0 left-0 w-1/4 h-1/2 bg-lime/10 skew-x-12 -translate-x-1/4 opacity-30 pointer-events-none"></div>
        </div>
        
        <div class="mx-auto max-w-7xl px-6 relative z-10 text-center w-full">
            <div class="max-w-3xl mx-auto">
                <span class="inline-block px-3 py-1.5 mb-6 text-xs font-bold tracking-widest uppercase bg-blue rounded-md shadow-lg shadow-blue/20">
                    Our Story
                </span>
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-heading font-bold mb-8 leading-[1.1]">
                    Movement Essentials <br class="hidden md:block"> for Every Routine.
                </h1>
                <p class="text-lg md:text-xl text-gray-300 max-w-2xl mx-auto leading-relaxed">
                    UK Official Store is an independent activewear provider focused on training-ready essentials, comfortable movement, and everyday sportswear style.
                </p>
            </div>
        </div>
    </section>

    <!-- Section 2: Our Mission -->
    <section class="py-20 md:py-32 bg-white relative">
        <div class="mx-auto max-w-7xl px-6">
            <div class="flex flex-col lg:flex-row items-center gap-16 md:gap-24">
                <div class="w-full lg:w-1/2 relative">
                    <div class="relative z-10 rounded-2xl overflow-hidden shadow-2xl">
                        <img src="<?php echo $img_mission; ?>" alt="Training Session" class="w-full aspect-[4/5] object-cover">
                    </div>
                    <!-- Decorative shapes -->
                    <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-blue/10 rounded-full blur-3xl -z-10"></div>
                    <div class="absolute -top-10 -right-10 w-64 h-64 bg-lime/5 rounded-full blur-3xl -z-10"></div>
                    
                    <div class="absolute -right-8 bottom-12 bg-navy p-6 rounded-xl shadow-xl hidden md:block max-w-[200px]">
                        <p class="text-lime font-bold text-3xl mb-1">100%</p>
                        <p class="text-white text-sm font-medium">Focused on practical movement & comfort.</p>
                    </div>
                </div>
                <div class="w-full lg:w-1/2">
                    <span class="text-blue font-bold uppercase tracking-widest text-sm">Our Mission</span>
                    <h2 class="text-3xl md:text-5xl font-heading font-bold mt-4 mb-8 text-navy leading-tight">
                        Built for training, <br class="hidden sm:block">designed for life.
                    </h2>
                    <div class="space-y-6 text-lg text-foreground-muted leading-relaxed">
                        <p>
                            At UK Official Store, we believe that activewear should be more than just clothing—it should be a tool that supports your daily movement. Our mission is to provide high-quality dry-fit apparel and training essentials that combine performance with a clean, modern aesthetic.
                        </p>
                        <p>
                            We started with a simple goal: to create activewear that works as hard as you do, whether you're in the gym, on the track, or navigating a busy day. We focus on the details that matter—breathability, range of motion, and durability.
                        </p>
                    </div>
                    
                    <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 gap-8">
                        <div class="flex gap-4">
                            <div class="w-12 h-12 shrink-0 rounded-lg bg-surface-alt flex items-center justify-center text-blue shadow-sm">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-navy text-lg mb-1">Performance Ready</h4>
                                <p class="text-sm text-foreground-muted leading-snug">Materials tested for durability and movement.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-12 h-12 shrink-0 rounded-lg bg-surface-alt flex items-center justify-center text-blue shadow-sm">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-navy text-lg mb-1">Clean Aesthetic</h4>
                                <p class="text-sm text-foreground-muted leading-snug">Independent designs for a modern sportswear look.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 3: Brand Values (Icon Grid) -->
    <section class="py-24 bg-surface-alt">
        <div class="mx-auto max-w-7xl px-6">
            <div class="text-center mb-16 md:mb-20">
                <span class="text-blue font-bold uppercase tracking-widest text-sm mb-4 block">Core Values</span>
                <h2 class="text-3xl md:text-5xl font-heading font-bold text-navy">What Drives Us</h2>
                <div class="w-24 h-1.5 bg-lime mx-auto mt-6 rounded-full"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12">
                <!-- Value 1 -->
                <div class="bg-white p-8 md:p-10 rounded-2xl border border-border hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 group">
                    <div class="w-16 h-16 bg-navy text-white rounded-xl flex items-center justify-center mb-8 group-hover:bg-blue transition-colors duration-300 shadow-lg shadow-navy/10">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A10.003 10.003 0 0012 20c1.89 0 3.664-.522 5.183-1.429m-1.258-4.39A3.372 3.372 0 0118 10.375c0-1.018-.439-1.933-1.14-2.566l-.004-.005A3.372 3.372 0 0115 5.25c0-1.864 1.512-3.375 3.375-3.375 1.864 0 3.375 1.512 3.375 3.375 0 .762-.253 1.463-.682 2.029l-.003.004A3.372 3.372 0 0121 10.375c0 1.018-.439 1.933-1.14 2.566l-.004.005A3.372 3.372 0 0118 15.5c-1.864 0-3.375-1.512-3.375-3.375 0-.762.253-1.463.682-2.029l.003-.004A3.372 3.372 0 0115 7.25c0-1.018.439-1.933 1.14-2.566l.004-.005A3.372 3.372 0 0118 2.125"></path></svg>
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-navy mb-4">Practical Design</h3>
                    <p class="text-foreground-muted leading-relaxed">
                        We avoid unnecessary features. Every seam, pocket, and fabric choice is made to enhance your training experience and daily comfort.
                    </p>
                </div>
                
                <!-- Value 2 -->
                <div class="bg-white p-8 md:p-10 rounded-2xl border border-border hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 group">
                    <div class="w-16 h-16 bg-navy text-white rounded-xl flex items-center justify-center mb-8 group-hover:bg-blue transition-colors duration-300 shadow-lg shadow-navy/10">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-navy mb-4">Quality Focus</h3>
                    <p class="text-foreground-muted leading-relaxed">
                        Our dry-fit style materials are selected for their breathable feel and durability. We build activewear that stands up to your intense active routines.
                    </p>
                </div>
                
                <!-- Value 3 -->
                <div class="bg-white p-8 md:p-10 rounded-2xl border border-border hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 group">
                    <div class="w-16 h-16 bg-navy text-white rounded-xl flex items-center justify-center mb-8 group-hover:bg-blue transition-colors duration-300 shadow-lg shadow-navy/10">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-navy mb-4">Movement First</h3>
                    <p class="text-foreground-muted leading-relaxed">
                        We test our gear for comfort and movement. Our goal is clothing that feels lightweight and natural, allowing you to focus entirely on your movement.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 4: Visual Lifestyle -->
    <section class="py-20 md:py-32 bg-white">
        <div class="mx-auto max-w-7xl px-6">
            <div class="flex flex-col lg:flex-row-reverse items-center gap-16 md:gap-24">
                <div class="w-full lg:w-1/2 relative">
                    <div class="relative z-10 rounded-2xl overflow-hidden shadow-2xl">
                        <img src="<?php echo $img_lifestyle; ?>" alt="Activewear Lifestyle" class="w-full aspect-video md:aspect-square object-cover">
                    </div>
                    <!-- Decorative element -->
                    <div class="absolute -top-12 -right-12 w-48 h-48 border-[12px] border-lime/20 rounded-full -z-10 animate-pulse"></div>
                </div>
                <div class="w-full lg:w-1/2">
                    <span class="text-blue font-bold uppercase tracking-widest text-sm">Everyday Wear</span>
                    <h2 class="text-3xl md:text-5xl font-heading font-bold mt-4 mb-8 text-navy leading-tight">
                        Activewear essentials <br class="hidden sm:block">for everyday training.
                    </h2>
                    <p class="text-lg text-foreground-muted mb-10 leading-relaxed">
                        From dry-fit t-shirts to tracksuits and tank tops, our collection is curated for the modern athlete who values simplicity and performance. We avoid the hype and focus on the essentials that actually matter to your training.
                    </p>
                    
                    <div class="space-y-4 mb-12">
                        <div class="flex items-center gap-4 py-3 border-b border-border">
                            <span class="w-2.5 h-2.5 rounded-full bg-lime"></span>
                            <span class="font-bold text-navy text-lg uppercase tracking-tight italic">Lightweight Dry-Fit Feel</span>
                        </div>
                        <div class="flex items-center gap-4 py-3 border-b border-border">
                            <span class="w-2.5 h-2.5 rounded-full bg-lime"></span>
                            <span class="font-bold text-navy text-lg uppercase tracking-tight italic">Training-Ready Durability</span>
                        </div>
                        <div class="flex items-center gap-4 py-3 border-b border-border">
                            <span class="w-2.5 h-2.5 rounded-full bg-lime"></span>
                            <span class="font-bold text-navy text-lg uppercase tracking-tight italic">Everyday Movement Comfort</span>
                        </div>
                    </div>
                    
                    <a href="/shop/" class="inline-flex items-center justify-center px-10 py-4 bg-blue hover:bg-navy text-white font-bold rounded-lg transition-all duration-normal shadow-xl shadow-blue/20 group">
                        <span>Explore Our Collection</span>
                        <svg class="w-5 h-5 ml-3 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 5: Trust & CTA -->
    <section class="py-24 bg-navy relative overflow-hidden">
        <!-- Background Effects -->
        <div class="absolute top-0 right-0 w-1/3 h-full bg-blue/10 skew-x-12 translate-x-1/2"></div>
        <div class="absolute -bottom-20 -left-20 w-80 h-80 bg-lime/10 blur-[100px] rounded-full"></div>
        
        <div class="mx-auto max-w-4xl px-6 relative z-10 text-center text-white">
            <h2 class="text-3xl md:text-5xl font-heading font-bold mb-8">Move with Confidence.</h2>
            <p class="text-lg md:text-xl text-gray-300 mb-12 leading-relaxed">
                Discover activewear that supports your goals and fits your lifestyle. Transparent policies, clear sizing, and dedicated support—every step of the way.
            </p>
            
            <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
                <a href="/shop/" class="w-full sm:w-auto px-12 py-5 bg-lime text-navy hover:bg-white hover:text-navy font-bold rounded-xl transition-all duration-normal shadow-lg shadow-lime/20 text-lg">
                    Shop All Activewear
                </a>
                <a href="/contact-us/" class="w-full sm:w-auto px-12 py-5 border-2 border-white/20 hover:bg-white/10 text-white font-bold rounded-xl transition-all duration-normal text-lg">
                    Contact Support
                </a>
            </div>
            
            <p class="mt-12 text-sm text-gray-400">
                Independent Brand • Training Ready • US Shipping & Returns
            </p>
        </div>
    </section>

</div>
