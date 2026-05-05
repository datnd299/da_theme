<?php
/**
 * Template part for displaying the home page content
 */
$theme_path = get_template_directory_uri();
?>

<!-- Hero Section -->
<section class="relative w-full h-[75vh] min-h-[500px] flex items-center overflow-hidden bg-[#0A0A0A]">
    <picture class="absolute inset-0 w-full h-full">
        <!-- Desktop Image -->
        <source media="(min-width: 768px)" srcset="<?php echo $theme_path; ?>/assets/img/banner1.jpeg">
        <!-- Mobile Image -->
        <img src="<?php echo $theme_path; ?>/assets/img/banner2.jpeg"
             alt="Summer Collection 2026"
             class="w-full h-full object-cover object-top"
             fetchpriority="high" loading="eager">
    </picture>
    <div class="absolute inset-0 bg-black/40 md:bg-gradient-to-r md:from-black/70 md:to-transparent"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full mt-10 md:mt-0 text-center md:text-left">
        <div class="max-w-xl text-white mx-auto md:mx-0">
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold tracking-tight mb-4 leading-tight">SUMMER 2026<br><span class="text-3xl md:text-5xl lg:text-6xl text-white/90">UP TO 30% OFF</span></h1>
            <p class="text-base md:text-lg mb-8 text-white/90 font-medium leading-relaxed">Discover our summer collection — clean silhouettes, effortless style, and bold personality. Upgrade your look today.</p>
            <div class="flex flex-wrap gap-4 justify-center md:justify-start">
                <a href="/shop?gender=women" class="inline-flex min-h-[44px] items-center justify-center rounded-full bg-white text-[#0A0A0A] px-8 py-3.5 text-sm font-bold uppercase tracking-wide transition-all duration-200 hover:bg-[#F5F5F5] active:scale-[0.98]">
                    Shop Women
                </a>
                <a href="/shop?gender=men" class="inline-flex min-h-[44px] items-center justify-center rounded-full border border-white text-white px-8 py-3.5 text-sm font-bold uppercase tracking-wide transition-all duration-200 hover:bg-white hover:text-[#0A0A0A] active:scale-[0.98]">
                    Shop Men
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Trust Strip -->
<div class="bg-[#F5F5F5] border-b border-[#E5E5E5] py-2.5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-center items-center gap-6 md:gap-10 text-[11px] md:text-xs font-semibold text-[#737373] uppercase tracking-wider">
        <span class="flex items-center gap-1.5">
            <svg class="w-3.5 h-3.5 md:w-4 md:h-4 text-[#0A0A0A]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" /></svg>
            Free Shipping Over $50
        </span>
        <span class="hidden md:flex items-center gap-1.5">
            <svg class="w-4 h-4 text-[#0A0A0A]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" /></svg>
            Easy 30-Day Returns
        </span>
        <span class="hidden md:flex items-center gap-1.5">
            <svg class="w-4 h-4 text-[#0A0A0A]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" /></svg>
            Secure Checkout
        </span>
    </div>
</div>

<!-- Category Shortcuts -->
<section class="py-12 md:py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="sr-only">Shop by Category</h2>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4">
            <!-- Item 1 -->
            <a href="/product-category/ao" class="group relative block aspect-square md:aspect-[4/5] overflow-hidden rounded-xl bg-[#F5F5F5]">
                <img src="<?php echo $theme_path; ?>/assets/img/shirt1.jpeg" alt="Tops" class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105" loading="lazy">
                <div class="absolute inset-0 bg-black/10 transition-colors duration-200 group-hover:bg-black/20"></div>
                <div class="absolute bottom-4 left-4 right-4 md:bottom-6 md:left-6 md:right-6 text-center">
                    <span class="inline-block w-full bg-white text-[#0A0A0A] px-4 py-2.5 text-sm font-bold uppercase tracking-wider rounded-full shadow-sm">Shirt</span>
                </div>
            </a>
            <!-- Item 2 -->
            <a href="/product-category/quan" class="group relative block aspect-square md:aspect-[4/5] overflow-hidden rounded-xl bg-[#F5F5F5]">
                <img src="<?php echo $theme_path; ?>/assets/img/sweater.jpeg" alt="Bottoms" class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105" loading="lazy">
                <div class="absolute inset-0 bg-black/10 transition-colors duration-200 group-hover:bg-black/20"></div>
                <div class="absolute bottom-4 left-4 right-4 md:bottom-6 md:left-6 md:right-6 text-center">
                    <span class="inline-block w-full bg-white text-[#0A0A0A] px-4 py-2.5 text-sm font-bold uppercase tracking-wider rounded-full shadow-sm">Sweater</span>
                </div>
            </a>
            <!-- Item 3 -->
            <a href="/product-category/phu-kien" class="group relative block aspect-square md:aspect-[4/5] overflow-hidden rounded-xl bg-[#F5F5F5]">
                <img src="<?php echo $theme_path; ?>/assets/img/accessories1.jpeg" alt="Accessories" class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105" loading="lazy">
                <div class="absolute inset-0 bg-black/10 transition-colors duration-200 group-hover:bg-black/20"></div>
                <div class="absolute bottom-4 left-4 right-4 md:bottom-6 md:left-6 md:right-6 text-center">
                    <span class="inline-block w-full bg-white text-[#0A0A0A] px-4 py-2.5 text-sm font-bold uppercase tracking-wider rounded-full shadow-sm">Accessories</span>
                </div>
            </a>
            <!-- Item 4 -->
            <a href="/sale" class="group relative block aspect-square md:aspect-[4/5] overflow-hidden rounded-xl bg-red-50">
                <img src="<?php echo $theme_path; ?>/assets/img/sale1.jpeg" alt="Sale" class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105" loading="lazy">
                <div class="absolute inset-0 bg-black/10 transition-colors duration-200 group-hover:bg-black/20"></div>
                <div class="absolute bottom-4 left-4 right-4 md:bottom-6 md:left-6 md:right-6 text-center">
                    <span class="inline-block w-full bg-[#FF4D4D] text-white px-4 py-2.5 text-sm font-bold uppercase tracking-wider rounded-full shadow-sm">On Sale</span>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- Featured Products (Best Sellers) -->
<section class="py-12 md:py-16 bg-[#F5F5F5]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-end justify-between mb-8 md:mb-10">
            <div>
                <h2 class="text-2xl md:text-3xl font-semibold text-[#0A0A0A] tracking-tight">Best Sellers</h2>
                <p class="text-[#737373] text-sm md:text-base mt-1">Our most-loved pieces, chosen by you.</p>
            </div>
            <a href="/shop" class="hidden md:inline-flex text-sm font-bold uppercase tracking-wider text-[#0A0A0A] border-b-2 border-[#0A0A0A] pb-0.5 hover:text-[#737373] hover:border-[#737373] transition-colors">View All</a>
        </div>

        <?php echo do_shortcode('[products limit="4" columns="4" best_selling="true"]'); ?>

        <div class="mt-8 text-center md:hidden">
            <a href="/shop" class="inline-flex min-h-[44px] items-center justify-center rounded-full border border-[#E5E5E5] bg-white text-[#0A0A0A] px-8 py-3 text-sm font-bold uppercase w-full">View All</a>
        </div>
    </div>
</section>

<!-- Promotional Banner -->
<section class="py-6 md:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-[#0A0A0A] text-white rounded-2xl overflow-hidden flex flex-col md:flex-row items-stretch">
            <div class="w-full md:w-1/2 p-10 md:p-16 flex flex-col justify-center items-center md:items-start text-center md:text-left">
                <span class="inline-block bg-[#FF4D4D] text-white px-3 py-1 text-xs font-bold uppercase tracking-wider rounded-sm mb-4">Flash Sale</span>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold tracking-tight mb-4 text-white">48 HOURS ONLY</h2>
                <p class="text-[#737373] text-base md:text-lg mb-8 max-w-md">Extra 20% off orders over $100. Limited stock — grab it before it's gone.</p>
                <a href="/sale" class="inline-flex min-h-[44px] items-center justify-center rounded-full bg-white text-[#0A0A0A] px-8 py-3.5 text-sm font-bold uppercase tracking-wide transition-all duration-200 hover:bg-[#F5F5F5] active:scale-[0.98]">
                    Shop the Sale
                </a>
            </div>
            <div class="w-full md:w-1/2 aspect-square md:aspect-auto">
                <img src="<?php echo $theme_path; ?>/assets/img/sale2.jpeg" alt="Flash Sale Promotion" class="w-full h-full object-cover" loading="lazy">
            </div>
        </div>
    </div>
</section>

<!-- Product Grid (Explore More) -->
<section class="py-12 md:py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8 md:mb-10 border-b border-[#E5E5E5] pb-4">
            <h2 class="text-2xl md:text-3xl font-semibold text-[#0A0A0A] tracking-tight">Explore More</h2>
            <div class="hidden md:flex gap-4 text-sm font-medium text-[#737373]">
                <button class="text-[#0A0A0A] border-b-2 border-[#0A0A0A] pb-1">Newest</button>
                <button class="hover:text-[#0A0A0A] transition-colors pb-1">Top Sellers</button>
            </div>
        </div>

        <?php echo do_shortcode('[products limit="8" columns="4" orderby="date" order="DESC"]'); ?>

        <div class="mt-10 md:mt-16 text-center">
            <a href="/shop" class="inline-flex min-h-[44px] items-center justify-center rounded-full border border-[#E5E5E5] bg-white text-[#0A0A0A] px-8 py-3.5 text-sm font-bold uppercase tracking-wide hover:border-[#0A0A0A] hover:bg-[#0A0A0A] hover:text-white transition-all duration-200">
                View All Products
            </a>
        </div>
    </div>
</section>

<!-- Social Proof / Reviews -->
<section class="py-12 md:py-16 bg-[#F5F5F5] border-t border-[#E5E5E5]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10 md:mb-12">
            <h2 class="text-2xl md:text-3xl font-semibold text-[#0A0A0A] mb-3 tracking-tight">What Our Customers Say</h2>
            <div class="flex items-center justify-center gap-2">
                <div class="flex text-[#0A0A0A] text-sm">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5 fill-current text-[#E5E5E5]" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                </div>
                <span class="text-[#737373] font-medium text-sm">4.8/5 (2,000+ Reviews)</span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
            <!-- Review 1 -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-[#E5E5E5] flex flex-col h-full">
                <div class="flex text-[#0A0A0A] mb-4">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                </div>
                <p class="text-[#737373] text-sm md:text-base leading-relaxed mb-6 flex-grow">"The fabric quality is amazing and the fit is incredibly flattering. I bought three colors to wear both to work and out on weekends. Packaging was careful and shipping was super fast!"</p>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-[#F5F5F5] overflow-hidden shrink-0">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=200&auto=format&fit=crop" alt="Sarah M." class="w-full h-full object-cover">
                    </div>
                    <div>
                        <p class="text-sm font-bold text-[#0A0A0A]">Sarah M.</p>
                        <p class="text-xs text-[#00D26A] font-medium flex items-center gap-1 mt-0.5">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Verified Purchase
                        </p>
                    </div>
                </div>
            </div>

            <!-- Review 2 -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-[#E5E5E5] flex flex-col h-full hidden md:flex">
                <div class="flex text-[#0A0A0A] mb-4">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                </div>
                <p class="text-[#737373] text-sm md:text-base leading-relaxed mb-6 flex-grow">"The wide-leg jeans fit perfectly right out of the box — no tailoring needed. Super flattering silhouette. Great quality for the price, I'm genuinely impressed."</p>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-[#F5F5F5] overflow-hidden shrink-0">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=200&auto=format&fit=crop" alt="Jessica T." class="w-full h-full object-cover">
                    </div>
                    <div>
                        <p class="text-sm font-bold text-[#0A0A0A]">Jessica T.</p>
                        <p class="text-xs text-[#00D26A] font-medium flex items-center gap-1 mt-0.5">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Verified Purchase
                        </p>
                    </div>
                </div>
            </div>

            <!-- Review 3 -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-[#E5E5E5] flex flex-col h-full hidden lg:flex">
                <div class="flex text-[#0A0A0A] mb-4">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                </div>
                <p class="text-[#737373] text-sm md:text-base leading-relaxed mb-6 flex-grow">"Always nervous buying clothes online but this brand put me at ease. Returns were a breeze and support was super responsive. Sizing was spot on — fits exactly as described."</p>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-[#F5F5F5] overflow-hidden shrink-0">
                        <img src="https://images.unsplash.com/photo-1527980965255-d3b416303d12?q=80&w=200&auto=format&fit=crop" alt="Mike R." class="w-full h-full object-cover">
                    </div>
                    <div>
                        <p class="text-sm font-bold text-[#0A0A0A]">Mike R.</p>
                        <p class="text-xs text-[#00D26A] font-medium flex items-center gap-1 mt-0.5">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Verified Purchase
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Brand Story (Short) -->
<section class="py-16 md:py-20 bg-white">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-2xl md:text-3xl font-bold tracking-tight text-[#0A0A0A] mb-4">We create everyday essentials<br class="hidden md:block"> for modern lifestyle</h2>
        <p class="text-[#737373] text-base md:text-lg leading-relaxed mb-8">We design modern, versatile fashion that empowers you to express your personal style with confidence — every single day.</p>
        <a href="/about" class="inline-flex items-center gap-2 text-sm font-bold uppercase tracking-widest text-[#0A0A0A] border-b-2 border-[#0A0A0A] pb-1 hover:text-[#737373] hover:border-[#737373] transition-colors">
            Our Story
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
        </a>
    </div>
</section>
