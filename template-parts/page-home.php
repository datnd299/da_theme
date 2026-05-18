<?php
/**
 * Template Part: Home Page
 * Brand: UK Official Store
 * Description: Clean, sporty homepage for activewear and dry-fit sportswear.
 */

// Image Paths (Generated)
$img_dir = get_template_directory_uri() . '/assets/img/';

$hero_img = $img_dir . 'hero_activewear_lifestyle.png';
$cat_tshirts = $img_dir . 'dry_fit_tshirts_category.png';
$cat_tracksuits = $img_dir . 'tracksuits_category.png';
$cat_tanktops = $img_dir . 'tank_tops_category.png';
$cat_trainingsets = $img_dir . 'training_sets_category.png';
$cat_bottoms = $img_dir . 'activewear_bottoms_category.png';
?>

<div class="bg-background font-sans text-foreground">

    <!-- Section 1: Hero -->
    <section class="relative h-[75vh] min-h-[580px] flex items-center overflow-hidden bg-navy">
        <div class="absolute inset-0 z-0">
            <img src="<?php echo $hero_img; ?>" alt="Activewear Lifestyle" class="w-full h-full object-cover opacity-50">
            <div class="absolute inset-0 bg-gradient-to-r from-navy/80 via-navy/40 to-transparent"></div>
        </div>
        <div class="mx-auto max-w-7xl px-6 relative z-10 text-white w-full">
            <div class="max-w-xl">
                <span class="inline-block px-3 py-1.5 mb-6 text-xs font-bold tracking-widest uppercase bg-blue rounded-md">
                    Activewear & Dry-Fit Sportswear
                </span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-heading font-bold mb-6 leading-[1.1]">
                    Activewear Essentials For Everyday Movement
                </h1>
                <p class="text-base md:text-lg mb-10 text-gray-200 max-w-lg leading-relaxed">
                    Discover dry-fit t-shirts, tracksuits, and training-ready sportswear designed for comfort, movement, and daily active routines.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="/shop/" class="px-8 py-4 bg-blue hover:bg-white hover:text-navy text-white font-bold rounded-lg transition-all duration-normal text-center text-sm md:text-base border-2 border-blue hover:border-white">
                        Shop Activewear
                    </a>
                    <a href="/product-category/dry-fit-t-shirts/" class="px-8 py-4 border-2 border-white/40 hover:border-white hover:bg-white hover:text-navy text-white font-bold rounded-lg transition-all duration-normal text-center text-sm md:text-base">
                        Explore Dry-Fit Tops
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: Shop By Category -->
    <section class="py-20 bg-surface-alt">
        <div class="mx-auto max-w-7xl px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-heading font-bold mb-4 text-navy">Shop By Category</h2>
                <div class="w-20 h-1 bg-blue mx-auto"></div>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                <!-- Category 1 -->
                <a href="/product-category/dry-fit-t-shirts/" class="group block bg-white rounded-lg overflow-hidden border border-border hover:shadow-lg transition-all duration-normal">
                    <div class="aspect-square overflow-hidden bg-gray-100">
                        <img src="<?php echo $cat_tshirts; ?>" alt="Dry-Fit T-Shirts" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-slow">
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2 text-navy">Dry-Fit T-Shirts</h3>
                        <p class="text-sm text-foreground-muted">Lightweight tops for training and movement.</p>
                    </div>
                </a>

                <!-- Category 2 -->
                <a href="/product-category/tracksuits/" class="group block bg-white rounded-lg overflow-hidden border border-border hover:shadow-lg transition-all duration-normal">
                    <div class="aspect-square overflow-hidden bg-gray-100">
                        <img src="<?php echo $cat_tracksuits; ?>" alt="Tracksuits" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-slow">
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2 text-navy">Tracksuits</h3>
                        <p class="text-sm text-foreground-muted">Comfortable sets for casual movement.</p>
                    </div>
                </a>

                <!-- Category 3 -->
                <a href="/product-category/tank-tops/" class="group block bg-white rounded-lg overflow-hidden border border-border hover:shadow-lg transition-all duration-normal">
                    <div class="aspect-square overflow-hidden bg-gray-100">
                        <img src="<?php echo $cat_tanktops; ?>" alt="Tank Tops" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-slow">
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2 text-navy">Tank Tops</h3>
                        <p class="text-sm text-foreground-muted">Gym-ready tops for active style.</p>
                    </div>
                </a>

                <!-- Category 4 -->
                <a href="/product-category/training-sets/" class="group block bg-white rounded-lg overflow-hidden border border-border hover:shadow-lg transition-all duration-normal">
                    <div class="aspect-square overflow-hidden bg-gray-100">
                        <img src="<?php echo $cat_trainingsets; ?>" alt="Training Sets" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-slow">
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2 text-navy">Training Sets</h3>
                        <p class="text-sm text-foreground-muted">Coordinated sets for training looks.</p>
                    </div>
                </a>

                <!-- Category 5 -->
                <a href="/product-category/activewear-bottoms/" class="group block bg-white rounded-lg overflow-hidden border border-border hover:shadow-lg transition-all duration-normal">
                    <div class="aspect-square overflow-hidden bg-gray-100">
                        <img src="<?php echo $cat_bottoms; ?>" alt="Activewear Bottoms" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-slow">
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2 text-navy">Activewear Bottoms</h3>
                        <p class="text-sm text-foreground-muted">Joggers and shorts for daily wear.</p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Section 3: Dry-Fit Training Tops Feature -->
    <section class="py-20 bg-white">
        <div class="mx-auto max-w-7xl px-6">
            <div class="flex flex-col lg:flex-row items-center gap-12">
                <div class="w-full lg:w-1/2">
                    <img src="<?php echo $cat_tshirts; ?>" alt="Dry-Fit Feature" class="rounded-2xl shadow-xl w-full object-cover aspect-video lg:aspect-square">
                </div>
                <div class="w-full lg:w-1/2">
                    <span class="text-blue font-bold uppercase tracking-widest text-sm">Dry-Fit Training Tops</span>
                    <h2 class="text-4xl md:text-5xl font-heading font-bold mt-4 mb-6 text-navy leading-tight">
                        Lightweight comfort for active routines.
                    </h2>
                    <p class="text-lg text-foreground-muted mb-8 leading-relaxed">
                        Explore dry-fit style t-shirts and training tops made for workouts, warm-ups, and everyday movement. Designed with breathable-feel fabrics that keep you comfortable throughout your training session.
                    </p>
                    <div class="grid grid-cols-2 gap-4 mb-10">
                        <div class="flex items-center gap-3">
                            <div class="w-2 h-2 rounded-full bg-lime"></div>
                            <span class="font-medium">Lightweight feel</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-2 h-2 rounded-full bg-lime"></div>
                            <span class="font-medium">Training-ready style</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-2 h-2 rounded-full bg-lime"></div>
                            <span class="font-medium">Easy movement</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-2 h-2 rounded-full bg-lime"></div>
                            <span class="font-medium">Everyday activewear</span>
                        </div>
                    </div>
                    <a href="/product-category/dry-fit-t-shirts/" class="inline-block px-10 py-4 bg-navy hover:bg-blue text-white font-bold rounded-lg transition-all duration-normal">
                        Shop Dry-Fit T-Shirts
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 4: Tracksuits & Gym Wear Feature -->
    <section class="py-20 bg-surface-alt">
        <div class="mx-auto max-w-7xl px-6">
            <div class="flex flex-col lg:flex-row-reverse items-center gap-12">
                <div class="w-full lg:w-1/2">
                    <img src="<?php echo $cat_tracksuits; ?>" alt="Tracksuits Feature" class="rounded-2xl shadow-xl w-full object-cover aspect-video lg:aspect-square">
                </div>
                <div class="w-full lg:w-1/2">
                    <span class="text-blue font-bold uppercase tracking-widest text-sm">Tracksuits & Gym Wear</span>
                    <h2 class="text-4xl md:text-5xl font-heading font-bold mt-4 mb-6 text-navy leading-tight">
                        Built for warm-ups, workouts, and everyday sport style.
                    </h2>
                    <p class="text-lg text-foreground-muted mb-8 leading-relaxed">
                        From tracksuits to tank tops and training sets, find activewear pieces that keep your style clean and your movement comfortable.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-6 mb-10">
                        <div class="bg-white p-6 rounded-xl border border-border flex-1">
                            <h4 class="font-bold text-navy mb-2">Tracksuits</h4>
                            <p class="text-sm text-foreground-muted">Matching sportswear sets for training days and casual movement.</p>
                        </div>
                        <div class="bg-white p-6 rounded-xl border border-border flex-1">
                            <h4 class="font-bold text-navy mb-2">Tank Tops</h4>
                            <p class="text-sm text-foreground-muted">Simple gym-ready tops for layering and active routines.</p>
                        </div>
                    </div>

                    <a href="/shop/" class="inline-block px-10 py-4 bg-blue hover:bg-navy text-white font-bold rounded-lg transition-all duration-normal">
                        Explore Gym Wear
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 5: Customer Care / Trust -->
    <section class="py-24 bg-navy text-white overflow-hidden relative">
        <div class="absolute top-0 right-0 w-1/3 h-full bg-blue opacity-10 skew-x-12 translate-x-1/2"></div>
        
        <div class="mx-auto max-w-7xl px-6 relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                <div class="w-full lg:w-1/2">
                    <span class="text-lime font-bold uppercase tracking-widest text-sm">Customer Care</span>
                    <h2 class="text-4xl md:text-5xl font-heading font-bold mt-4 mb-6 leading-tight">
                        Clear support from checkout to delivery.
                    </h2>
                    <p class="text-xl text-gray-300 mb-10 leading-relaxed">
                        Shop activewear with clear product details, order tracking, and customer support when you need help.
                    </p>
                    
                    <div class="grid grid-cols-2 gap-8 mb-12">
                        <div>
                            <div class="text-blue text-3xl mb-3">
                                <i class="fas fa-shield-alt"></i> <!-- Replace with SVG if FontAwesome not loaded -->
                                <svg class="w-10 h-10 text-lime" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            </div>
                            <h4 class="font-bold text-lg mb-1">Secure Checkout</h4>
                            <p class="text-sm text-gray-400">Encrypted payment processing for your safety.</p>
                        </div>
                        <div>
                            <div class="text-blue text-3xl mb-3">
                                <svg class="w-10 h-10 text-lime" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <h4 class="font-bold text-lg mb-1">Tracking Included</h4>
                            <p class="text-sm text-gray-400">Full visibility from our door to yours.</p>
                        </div>
                        <div>
                            <div class="text-blue text-3xl mb-3">
                                <svg class="w-10 h-10 text-lime" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 15v-1a4 4 0 00-4-4H8m0 0l3 3m-3-3l3-3m9 14V5a2 2 0 00-2-2H6a2 2 0 00-2 2v16l4-2 4 2 4-2 4 2z"></path></svg>
                            </div>
                            <h4 class="font-bold text-lg mb-1">30-Day Returns</h4>
                            <p class="text-sm text-gray-400">Easy returns for unwashed and unworn items.</p>
                        </div>
                        <div>
                            <div class="text-blue text-3xl mb-3">
                                <svg class="w-10 h-10 text-lime" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h4 class="font-bold text-lg mb-1">Size & Product Details</h4>
                            <p class="text-sm text-gray-400">Clear information to help you find the right fit.</p>
                        </div>
                    </div>

                    <div class="bg-blue/20 p-6 rounded-xl border border-blue/30 mb-10">
                        <p class="text-sm text-gray-300 mb-4">
                            <strong>Shipping:</strong> Orders processed in 2–4 business days. US shipping takes 5–10 business days after dispatch.
                        </p>
                        <p class="text-sm text-gray-300">
                            <strong>Returns:</strong> Eligible unworn, unwashed, and undamaged items may be returned within 30 days of delivery.
                        </p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="/shipping-returns/" class="px-8 py-4 bg-white text-navy hover:bg-lime hover:text-navy font-bold rounded-lg transition-all duration-normal text-center">
                            View Shipping & Returns
                        </a>
                        <a href="/contact-us/" class="px-8 py-4 border border-white/30 hover:bg-white/10 text-white font-bold rounded-lg transition-all duration-normal text-center">
                            Contact Support
                        </a>
                    </div>
                </div>
                
                <div class="w-full lg:w-1/2 relative">
                    <div class="relative z-10 rounded-2xl overflow-hidden shadow-2xl">
                         <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?q=80&w=1000&auto=format&fit=crop" alt="Customer Support" class="w-full h-full object-cover aspect-square">
                    </div>
                    <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-lime rounded-full mix-blend-screen filter blur-3xl opacity-20 animate-pulse"></div>
                </div>
            </div>
        </div>
    </section>

</div>
