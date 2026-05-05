<?php
/**
 * Template part for displaying the home page content
 * 
 * Đây là template trang chủ được thiết kế theo phong cách Urban Cool,
 * tối ưu cho conversion dựa trên bản thiết kế .plans/home_plan.md
 */
?>

<!-- Trust Strip -->
<div class="bg-[#F5F5F5] border-b border-[#E5E5E5] py-2.5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-center items-center gap-6 md:gap-10 text-[11px] md:text-xs font-semibold text-[#737373] uppercase tracking-wider">
        <span class="flex items-center gap-1.5">
            <svg class="w-3.5 h-3.5 md:w-4 md:h-4 text-[#0A0A0A]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" /></svg> 
            Miễn phí ship > $50
        </span>
        <span class="hidden md:flex items-center gap-1.5">
            <svg class="w-4 h-4 text-[#0A0A0A]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" /></svg> 
            Đổi trả 7 ngày
        </span>
        <span class="hidden md:flex items-center gap-1.5">
            <svg class="w-4 h-4 text-[#0A0A0A]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" /></svg> 
            Thanh toán an toàn
        </span>
    </div>
</div>

<!-- Hero Section -->
<section class="relative w-full h-[75vh] min-h-[500px] flex items-center overflow-hidden bg-[#0A0A0A]">
    <picture class="absolute inset-0 w-full h-full">
        <!-- Desktop Image -->
        <source media="(min-width: 768px)" srcset="https://images.unsplash.com/photo-1469334031218-e382a71b716b?q=80&w=2070&auto=format&fit=crop">
        <!-- Mobile Image -->
        <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=1000&auto=format&fit=crop" 
             alt="Summer Collection 2026" 
             class="w-full h-full object-cover object-top"
             fetchpriority="high" loading="eager">
    </picture>
    <!-- Overlay cho text -->
    <div class="absolute inset-0 bg-black/40 md:bg-gradient-to-r md:from-black/70 md:to-transparent"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full mt-10 md:mt-0 text-center md:text-left">
        <div class="max-w-xl text-white mx-auto md:mx-0">
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold tracking-tight mb-4 leading-tight">SUMMER 2026<br><span class="text-3xl md:text-5xl lg:text-6xl text-white/90">UP TO 30% OFF</span></h1>
            <p class="text-base md:text-lg mb-8 text-white/90 font-medium leading-relaxed">Khám phá bộ sưu tập mùa hè với những thiết kế tối giản, năng động và đầy cá tính. Nâng tầm phong cách cá nhân của bạn ngay hôm nay.</p>
            <div class="flex flex-wrap gap-4 justify-center md:justify-start">
                <a href="/shop?gender=women" class="inline-flex min-h-[44px] items-center justify-center rounded-full bg-white text-[#0A0A0A] px-8 py-3.5 text-sm font-bold uppercase tracking-wide transition-all duration-200 hover:bg-[#F5F5F5] active:scale-[0.98]">
                    Shop Nữ
                </a>
                <a href="/shop?gender=men" class="inline-flex min-h-[44px] items-center justify-center rounded-full border border-white text-white px-8 py-3.5 text-sm font-bold uppercase tracking-wide transition-all duration-200 hover:bg-white hover:text-[#0A0A0A] active:scale-[0.98]">
                    Shop Nam
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Category Shortcuts -->
<section class="py-12 md:py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="sr-only">Danh mục sản phẩm</h2>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4">
            <!-- Item 1 -->
            <a href="/product-category/ao" class="group relative block aspect-square md:aspect-[4/5] overflow-hidden rounded-xl bg-[#F5F5F5]">
                <img src="https://images.unsplash.com/photo-1618354691373-d851c5c3a990?q=80&w=800&auto=format&fit=crop" alt="Áo" class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105" loading="lazy">
                <div class="absolute inset-0 bg-black/10 transition-colors duration-200 group-hover:bg-black/20"></div>
                <div class="absolute bottom-4 left-4 right-4 md:bottom-6 md:left-6 md:right-6 text-center">
                    <span class="inline-block w-full bg-white text-[#0A0A0A] px-4 py-2.5 text-sm font-bold uppercase tracking-wider rounded-full shadow-sm">Áo</span>
                </div>
            </a>
            <!-- Item 2 -->
            <a href="/product-category/quan" class="group relative block aspect-square md:aspect-[4/5] overflow-hidden rounded-xl bg-[#F5F5F5]">
                <img src="https://images.unsplash.com/photo-1541099649105-f69ad21f3246?q=80&w=800&auto=format&fit=crop" alt="Quần" class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105" loading="lazy">
                <div class="absolute inset-0 bg-black/10 transition-colors duration-200 group-hover:bg-black/20"></div>
                <div class="absolute bottom-4 left-4 right-4 md:bottom-6 md:left-6 md:right-6 text-center">
                    <span class="inline-block w-full bg-white text-[#0A0A0A] px-4 py-2.5 text-sm font-bold uppercase tracking-wider rounded-full shadow-sm">Quần</span>
                </div>
            </a>
            <!-- Item 3 -->
            <a href="/product-category/phu-kien" class="group relative block aspect-square md:aspect-[4/5] overflow-hidden rounded-xl bg-[#F5F5F5]">
                <img src="https://images.unsplash.com/photo-1509319117193-57bab727e09d?q=80&w=800&auto=format&fit=crop" alt="Phụ kiện" class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105" loading="lazy">
                <div class="absolute inset-0 bg-black/10 transition-colors duration-200 group-hover:bg-black/20"></div>
                <div class="absolute bottom-4 left-4 right-4 md:bottom-6 md:left-6 md:right-6 text-center">
                    <span class="inline-block w-full bg-white text-[#0A0A0A] px-4 py-2.5 text-sm font-bold uppercase tracking-wider rounded-full shadow-sm">Phụ Kiện</span>
                </div>
            </a>
            <!-- Item 4 -->
            <a href="/sale" class="group relative block aspect-square md:aspect-[4/5] overflow-hidden rounded-xl bg-red-50">
                <img src="https://images.unsplash.com/photo-1607083206869-4c7672e72a8a?q=80&w=800&auto=format&fit=crop" alt="Sale" class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105" loading="lazy">
                <div class="absolute inset-0 bg-black/10 transition-colors duration-200 group-hover:bg-black/20"></div>
                <div class="absolute bottom-4 left-4 right-4 md:bottom-6 md:left-6 md:right-6 text-center">
                    <span class="inline-block w-full bg-[#FF4D4D] text-white px-4 py-2.5 text-sm font-bold uppercase tracking-wider rounded-full shadow-sm">Sale Off</span>
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
                <p class="text-[#737373] text-sm md:text-base mt-1">Những sản phẩm được yêu thích nhất.</p>
            </div>
            <a href="/shop" class="hidden md:inline-flex text-sm font-bold uppercase tracking-wider text-[#0A0A0A] border-b-2 border-[#0A0A0A] pb-0.5 hover:text-[#737373] hover:border-[#737373] transition-colors">Xem tất cả</a>
        </div>
        
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4 lg:gap-6">
            <!-- Product 1 -->
            <div class="group flex flex-col">
                <div class="relative aspect-[3/4] rounded-xl overflow-hidden bg-white mb-3 md:mb-4">
                    <span class="absolute top-2.5 left-2.5 z-10 bg-[#0A0A0A] text-white text-[10px] font-bold uppercase tracking-wider px-2 py-1.5 rounded shadow-sm">New</span>
                    <a href="/product/ao-thun-basic-co-tron" class="block w-full h-full">
                        <img src="https://images.unsplash.com/photo-1550639525-c97d455acf70?q=80&w=800&auto=format&fit=crop" alt="Áo Thun Basic Cổ Tròn" class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105" loading="eager">
                    </a>
                    <!-- Quick Add Button -->
                    <button class="absolute bottom-3 left-3 right-3 translate-y-[120%] opacity-0 md:group-hover:translate-y-0 md:group-hover:opacity-100 transition-all duration-300 ease-out bg-white/95 backdrop-blur-sm text-[#0A0A0A] font-bold text-sm py-3 rounded-full shadow-sm hover:bg-[#0A0A0A] hover:text-white flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                        Thêm nhanh
                    </button>
                </div>
                <div class="flex flex-col flex-grow">
                    <a href="/product/ao-thun-basic-co-tron" class="text-sm md:text-base font-medium text-[#0A0A0A] line-clamp-1 mb-1.5 hover:text-[#737373] transition-colors">Áo Thun Basic Cổ Tròn</a>
                    <div class="flex items-center gap-2 mt-auto">
                        <span class="text-base md:text-lg font-bold text-[#0A0A0A]">299.000đ</span>
                    </div>
                </div>
            </div>

            <!-- Product 2 (Sale) -->
            <div class="group flex flex-col">
                <div class="relative aspect-[3/4] rounded-xl overflow-hidden bg-white mb-3 md:mb-4">
                    <span class="absolute top-2.5 left-2.5 z-10 bg-[#FF4D4D] text-white text-[10px] font-bold uppercase tracking-wider px-2 py-1.5 rounded shadow-sm">-30%</span>
                    <a href="/product/ao-croptop-tay-dai" class="block w-full h-full">
                        <img src="https://images.unsplash.com/photo-1594222634351-e12db0144fbb?q=80&w=800&auto=format&fit=crop" alt="Áo Croptop Tay Dài" class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105" loading="eager">
                    </a>
                    <button class="absolute bottom-3 left-3 right-3 translate-y-[120%] opacity-0 md:group-hover:translate-y-0 md:group-hover:opacity-100 transition-all duration-300 ease-out bg-white/95 backdrop-blur-sm text-[#0A0A0A] font-bold text-sm py-3 rounded-full shadow-sm hover:bg-[#0A0A0A] hover:text-white flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                        Thêm nhanh
                    </button>
                </div>
                <div class="flex flex-col flex-grow">
                    <a href="/product/ao-croptop-tay-dai" class="text-sm md:text-base font-medium text-[#0A0A0A] line-clamp-1 mb-1.5 hover:text-[#737373] transition-colors">Áo Croptop Tay Dài</a>
                    <div class="flex items-center gap-2 mt-auto">
                        <span class="text-base md:text-lg font-bold text-[#FF4D4D]">250.000đ</span>
                        <span class="text-sm text-[#737373] line-through">350.000đ</span>
                    </div>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="group flex flex-col">
                <div class="relative aspect-[3/4] rounded-xl overflow-hidden bg-white mb-3 md:mb-4">
                    <a href="/product/quan-jeans-ong-rong" class="block w-full h-full">
                        <img src="https://images.unsplash.com/photo-1551028719-00167b16eac5?q=80&w=800&auto=format&fit=crop" alt="Quần Jeans Ống Rộng" class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105" loading="eager">
                    </a>
                    <button class="absolute bottom-3 left-3 right-3 translate-y-[120%] opacity-0 md:group-hover:translate-y-0 md:group-hover:opacity-100 transition-all duration-300 ease-out bg-white/95 backdrop-blur-sm text-[#0A0A0A] font-bold text-sm py-3 rounded-full shadow-sm hover:bg-[#0A0A0A] hover:text-white flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                        Thêm nhanh
                    </button>
                </div>
                <div class="flex flex-col flex-grow">
                    <a href="/product/quan-jeans-ong-rong" class="text-sm md:text-base font-medium text-[#0A0A0A] line-clamp-1 mb-1.5 hover:text-[#737373] transition-colors">Quần Jeans Ống Rộng Xanh</a>
                    <div class="flex items-center gap-2 mt-auto">
                        <span class="text-base md:text-lg font-bold text-[#0A0A0A]">450.000đ</span>
                    </div>
                </div>
            </div>

            <!-- Product 4 -->
            <div class="group flex flex-col">
                <div class="relative aspect-[3/4] rounded-xl overflow-hidden bg-white mb-3 md:mb-4">
                    <a href="/product/quan-khaki-nu" class="block w-full h-full">
                        <img src="https://images.unsplash.com/photo-1608248543803-ba4f8c70ae0b?q=80&w=800&auto=format&fit=crop" alt="Quần Khaki Nữ" class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105" loading="eager">
                    </a>
                    <button class="absolute bottom-3 left-3 right-3 translate-y-[120%] opacity-0 md:group-hover:translate-y-0 md:group-hover:opacity-100 transition-all duration-300 ease-out bg-white/95 backdrop-blur-sm text-[#0A0A0A] font-bold text-sm py-3 rounded-full shadow-sm hover:bg-[#0A0A0A] hover:text-white flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                        Thêm nhanh
                    </button>
                </div>
                <div class="flex flex-col flex-grow">
                    <a href="/product/quan-khaki-nu" class="text-sm md:text-base font-medium text-[#0A0A0A] line-clamp-1 mb-1.5 hover:text-[#737373] transition-colors">Quần Khaki Nữ Dáng Suông</a>
                    <div class="flex items-center gap-2 mt-auto">
                        <span class="text-base md:text-lg font-bold text-[#0A0A0A]">399.000đ</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-8 text-center md:hidden">
            <a href="/shop" class="inline-flex min-h-[44px] items-center justify-center rounded-full border border-[#E5E5E5] bg-white text-[#0A0A0A] px-8 py-3 text-sm font-bold uppercase w-full">Xem tất cả</a>
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
                <p class="text-[#737373] text-base md:text-lg mb-8 max-w-md">Giảm thêm 20% cho tất cả đơn hàng trên 1 triệu. Nhanh tay săn deal, số lượng có hạn.</p>
                <a href="/sale" class="inline-flex min-h-[44px] items-center justify-center rounded-full bg-white text-[#0A0A0A] px-8 py-3.5 text-sm font-bold uppercase tracking-wide transition-all duration-200 hover:bg-[#F5F5F5] active:scale-[0.98]">
                    Săn Sale Ngay
                </a>
            </div>
            <div class="w-full md:w-1/2 aspect-square md:aspect-auto">
                <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?q=80&w=2070&auto=format&fit=crop" alt="Flash Sale Promotion" class="w-full h-full object-cover" loading="lazy">
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
                <button class="text-[#0A0A0A] border-b-2 border-[#0A0A0A] pb-1">Mới nhất</button>
                <button class="hover:text-[#0A0A0A] transition-colors pb-1">Bán chạy</button>
            </div>
        </div>
        
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4 lg:gap-6">
            <!-- Product 5 -->
            <div class="group flex flex-col">
                <div class="relative aspect-[3/4] rounded-xl overflow-hidden bg-[#F5F5F5] mb-3 md:mb-4">
                    <a href="/product/ao-so-mi-nam" class="block w-full h-full">
                        <img src="https://images.unsplash.com/photo-1564584217132-2271feaeb3c5?q=80&w=800&auto=format&fit=crop" alt="Áo Sơ Mi Nam" class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105" loading="lazy">
                    </a>
                    <button class="absolute bottom-3 left-3 right-3 translate-y-[120%] opacity-0 md:group-hover:translate-y-0 md:group-hover:opacity-100 transition-all duration-300 ease-out bg-white/95 backdrop-blur-sm text-[#0A0A0A] font-bold text-sm py-3 rounded-full shadow-sm hover:bg-[#0A0A0A] hover:text-white flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                        Thêm nhanh
                    </button>
                </div>
                <div class="flex flex-col flex-grow">
                    <a href="/product/ao-so-mi-nam" class="text-sm md:text-base font-medium text-[#0A0A0A] line-clamp-1 mb-1.5 hover:text-[#737373] transition-colors">Áo Sơ Mi Nam Cổ Tàu</a>
                    <div class="flex items-center gap-2 mt-auto">
                        <span class="text-base md:text-lg font-bold text-[#0A0A0A]">420.000đ</span>
                    </div>
                </div>
            </div>

            <!-- Product 6 -->
            <div class="group flex flex-col">
                <div class="relative aspect-[3/4] rounded-xl overflow-hidden bg-[#F5F5F5] mb-3 md:mb-4">
                    <a href="/product/ao-thun-in-hinh" class="block w-full h-full">
                        <img src="https://images.unsplash.com/photo-1576566588028-4147f3842f27?q=80&w=800&auto=format&fit=crop" alt="Áo Thun In Hình" class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105" loading="lazy">
                    </a>
                    <button class="absolute bottom-3 left-3 right-3 translate-y-[120%] opacity-0 md:group-hover:translate-y-0 md:group-hover:opacity-100 transition-all duration-300 ease-out bg-white/95 backdrop-blur-sm text-[#0A0A0A] font-bold text-sm py-3 rounded-full shadow-sm hover:bg-[#0A0A0A] hover:text-white flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                        Thêm nhanh
                    </button>
                </div>
                <div class="flex flex-col flex-grow">
                    <a href="/product/ao-thun-in-hinh" class="text-sm md:text-base font-medium text-[#0A0A0A] line-clamp-1 mb-1.5 hover:text-[#737373] transition-colors">Áo Thun Trắng In Graphic</a>
                    <div class="flex items-center gap-2 mt-auto">
                        <span class="text-base md:text-lg font-bold text-[#0A0A0A]">280.000đ</span>
                    </div>
                </div>
            </div>

            <!-- Product 7 -->
            <div class="group flex flex-col">
                <div class="relative aspect-[3/4] rounded-xl overflow-hidden bg-[#F5F5F5] mb-3 md:mb-4">
                    <span class="absolute top-2.5 left-2.5 z-10 bg-[#0A0A0A] text-white text-[10px] font-bold uppercase tracking-wider px-2 py-1.5 rounded shadow-sm">Mới</span>
                    <a href="/product/chan-vay-denim" class="block w-full h-full">
                        <img src="https://images.unsplash.com/photo-1618932260643-ee46255476d8?q=80&w=800&auto=format&fit=crop" alt="Chân Váy Dài" class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105" loading="lazy">
                    </a>
                    <button class="absolute bottom-3 left-3 right-3 translate-y-[120%] opacity-0 md:group-hover:translate-y-0 md:group-hover:opacity-100 transition-all duration-300 ease-out bg-white/95 backdrop-blur-sm text-[#0A0A0A] font-bold text-sm py-3 rounded-full shadow-sm hover:bg-[#0A0A0A] hover:text-white flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                        Thêm nhanh
                    </button>
                </div>
                <div class="flex flex-col flex-grow">
                    <a href="/product/chan-vay-denim" class="text-sm md:text-base font-medium text-[#0A0A0A] line-clamp-1 mb-1.5 hover:text-[#737373] transition-colors">Chân Váy Denim Dáng Dài</a>
                    <div class="flex items-center gap-2 mt-auto">
                        <span class="text-base md:text-lg font-bold text-[#0A0A0A]">380.000đ</span>
                    </div>
                </div>
            </div>

            <!-- Product 8 -->
            <div class="group flex flex-col">
                <div class="relative aspect-[3/4] rounded-xl overflow-hidden bg-[#F5F5F5] mb-3 md:mb-4">
                    <a href="/product/tui-xach-nu" class="block w-full h-full">
                        <img src="https://images.unsplash.com/photo-1588117305388-c2631a279f82?q=80&w=800&auto=format&fit=crop" alt="Túi Xách Nữ" class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105" loading="lazy">
                    </a>
                    <button class="absolute bottom-3 left-3 right-3 translate-y-[120%] opacity-0 md:group-hover:translate-y-0 md:group-hover:opacity-100 transition-all duration-300 ease-out bg-white/95 backdrop-blur-sm text-[#0A0A0A] font-bold text-sm py-3 rounded-full shadow-sm hover:bg-[#0A0A0A] hover:text-white flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                        Thêm nhanh
                    </button>
                </div>
                <div class="flex flex-col flex-grow">
                    <a href="/product/tui-xach-nu" class="text-sm md:text-base font-medium text-[#0A0A0A] line-clamp-1 mb-1.5 hover:text-[#737373] transition-colors">Túi Xách Da Minimalist</a>
                    <div class="flex items-center gap-2 mt-auto">
                        <span class="text-base md:text-lg font-bold text-[#0A0A0A]">490.000đ</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-10 md:mt-16 text-center">
            <button class="inline-flex min-h-[44px] items-center justify-center rounded-full border border-[#E5E5E5] bg-white text-[#0A0A0A] px-8 py-3.5 text-sm font-bold uppercase tracking-wide hover:border-[#0A0A0A] hover:bg-[#0A0A0A] hover:text-white transition-all duration-200">
                Xem thêm sản phẩm
            </button>
        </div>
    </div>
</section>

<!-- Social Proof / Reviews -->
<section class="py-12 md:py-16 bg-[#F5F5F5] border-t border-[#E5E5E5]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10 md:mb-12">
            <h2 class="text-2xl md:text-3xl font-semibold text-[#0A0A0A] mb-3 tracking-tight">Khách Hàng Nói Gì?</h2>
            <div class="flex items-center justify-center gap-2">
                <div class="flex text-[#0A0A0A] text-sm">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5 fill-current text-[#E5E5E5]" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                </div>
                <span class="text-[#737373] font-medium text-sm">4.8/5 (2,000+ đánh giá)</span>
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
                <p class="text-[#737373] text-sm md:text-base leading-relaxed mb-6 flex-grow">"Chất vải siêu xịn, form áo mặc cực kỳ tôn dáng. Mình đã mua 3 màu khác nhau để mặc đi làm và đi chơi đều hợp. Đóng gói rất cẩn thận và ship siêu nhanh!"</p>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-[#F5F5F5] overflow-hidden shrink-0">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=200&auto=format&fit=crop" alt="Minh Anh" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <p class="text-sm font-bold text-[#0A0A0A]">Minh Anh</p>
                        <p class="text-xs text-[#00D26A] font-medium flex items-center gap-1 mt-0.5">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Đã mua hàng
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
                <p class="text-[#737373] text-sm md:text-base leading-relaxed mb-6 flex-grow">"Form quần jean ống rộng chuẩn không cần chỉnh, mặc hack dáng kinh khủng. Rất ưng ý với chất lượng so với mức giá."</p>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-[#F5F5F5] overflow-hidden shrink-0">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=200&auto=format&fit=crop" alt="Linh Trần" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <p class="text-sm font-bold text-[#0A0A0A]">Linh Trần</p>
                        <p class="text-xs text-[#00D26A] font-medium flex items-center gap-1 mt-0.5">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Đã mua hàng
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
                <p class="text-[#737373] text-sm md:text-base leading-relaxed mb-6 flex-grow">"Mua đồ onl rất ngại khoản form dáng nhưng brand làm mình rất yên tâm. Đổi trả dễ dàng, support nhiệt tình. Quần áo form chuẩn."</p>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-[#F5F5F5] overflow-hidden shrink-0">
                        <img src="https://images.unsplash.com/photo-1527980965255-d3b416303d12?q=80&w=200&auto=format&fit=crop" alt="Tuấn Nguyễn" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <p class="text-sm font-bold text-[#0A0A0A]">Tuấn Nguyễn</p>
                        <p class="text-xs text-[#00D26A] font-medium flex items-center gap-1 mt-0.5">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Đã mua hàng
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
        <p class="text-[#737373] text-base md:text-lg leading-relaxed mb-8">Chúng tôi mang đến những thiết kế thời trang hiện đại, ứng dụng cao, giúp bạn tự tin thể hiện phong cách mỗi ngày một cách thoải mái nhất.</p>
        <a href="/about" class="inline-flex items-center gap-2 text-sm font-bold uppercase tracking-widest text-[#0A0A0A] border-b-2 border-[#0A0A0A] pb-1 hover:text-[#737373] hover:border-[#737373] transition-colors">
            Về chúng tôi
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
        </a>
    </div>
</section>
