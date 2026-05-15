<?php
/**
 * Shared template for category landing pages.
 */

if (!isset($category_name)) $category_name = 'Collection';
if (!isset($category_desc)) $category_desc = '';
if (!isset($category_image)) $category_image = '';
if (!isset($products)) $products = [];
?>

<div class="bg-white text-[#24132E] antialiased">
    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-[#FBF4FF] px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
        <div class="mx-auto grid max-w-7xl gap-10 lg:grid-cols-[1fr_0.8fr] lg:items-center">
            <div class="relative z-10">
                <nav class="mb-8 flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-[#6E3A8A]" aria-label="Breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-[#3B1748]">Home</a>
                    <span class="text-[#E8DFF0]">/</span>
                    <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="hover:text-[#3B1748]">Shop</a>
                    <span class="text-[#E8DFF0]">/</span>
                    <span class="text-[#3B1748]"><?php echo esc_html($category_name); ?></span>
                </nav>
                
                <h1 class="font-heading text-5xl leading-tight text-[#3B1748] sm:text-6xl lg:text-7xl">
                    <?php echo esc_html($category_name); ?>
                </h1>
                <p class="mt-6 max-w-xl text-lg leading-relaxed text-[#6D5875]">
                    <?php echo esc_html($category_desc); ?>
                </p>
                <div class="mt-10 flex items-center gap-6">
                    <div class="flex items-center gap-2">
                        <span class="flex h-10 w-10 items-center justify-center rounded-full bg-[#E8DFF0] text-[#3B1748]">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        </span>
                        <span class="text-sm font-semibold text-[#3B1748]">Quality Assured</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="flex h-10 w-10 items-center justify-center rounded-full bg-[#E8DFF0] text-[#3B1748]">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10H3M21 6H3M21 14H3M21 18H3"/></svg>
                        </span>
                        <span class="text-sm font-semibold text-[#3B1748]">Soft Fabrics</span>
                    </div>
                </div>
            </div>

            <div class="relative lg:mt-0">
                <div class="relative overflow-hidden rounded-[2.5rem] border-4 border-white shadow-2xl shadow-[#3B1748]/10">
                    <?php if ($category_image) : ?>
                        <img src="<?php echo esc_url($category_image); ?>" alt="<?php echo esc_attr($category_name); ?>" class="aspect-[4/5] w-full object-cover sm:aspect-[5/4] lg:aspect-[4/5]">
                    <?php else : ?>
                        <div class="aspect-[4/5] w-full bg-[#E8DFF0] sm:aspect-[5/4] lg:aspect-[4/5]"></div>
                    <?php endif; ?>
                </div>
                <!-- Decorative elements -->
                <div class="absolute -bottom-6 -left-6 h-32 w-32 rounded-full bg-[#6E3A8A]/10 blur-2xl"></div>
                <div class="absolute -top-6 -right-6 h-32 w-32 rounded-full bg-[#E8B8AD]/20 blur-2xl"></div>
            </div>
        </div>
    </section>

    <!-- Product Grid Section -->
    <section class="bg-white px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
        <div class="mx-auto max-w-7xl">
            <div class="mb-12 flex flex-col justify-between gap-6 border-b border-[#E8DFF0] pb-8 md:flex-row md:items-end">
                <div>
                    <h2 class="font-heading text-3xl text-[#3B1748] md:text-4xl">Explore The Collection</h2>
                    <p class="mt-2 text-[#6D5875]">Discover our curated selection of <?php echo esc_html(strtolower($category_name)); ?>.</p>
                </div>
                <div class="flex items-center gap-4 text-sm font-bold text-[#3B1748]">
                    <span><?php echo count($products); ?> Products</span>
                    <div class="h-4 w-px bg-[#E8DFF0]"></div>
                    <button class="flex items-center gap-2 hover:text-[#6E3A8A]">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
                        Sort By
                    </button>
                </div>
            </div>

            <?php if (!empty($products)) : ?>
                <div class="grid grid-cols-2 gap-6 sm:gap-8 lg:grid-cols-3 xl:grid-cols-4">
                    <?php foreach ($products as $product) :
                        $p_url = get_permalink($product->get_id());
                        $p_img = wp_get_attachment_image_url($product->get_image_id(), 'woocommerce_single');
                        if (!$p_img) $p_img = function_exists('wc_placeholder_img_src') ? wc_placeholder_img_src('woocommerce_single') : '';
                        ?>
                        <div class="group relative flex flex-col">
                            <div class="relative aspect-[4/5] overflow-hidden rounded-2xl bg-[#FBF4FF] transition duration-500 group-hover:shadow-xl group-hover:shadow-[#3B1748]/10">
                                <img src="<?php echo esc_url($p_img); ?>" alt="<?php echo esc_attr($product->get_name()); ?>" class="h-full w-full object-cover transition duration-700 group-hover:scale-110">
                                <div class="absolute inset-0 bg-gradient-to-t from-[#24132E]/20 to-transparent opacity-0 transition-opacity duration-500 group-hover:opacity-100"></div>
                                <a href="<?php echo esc_url($p_url); ?>" class="absolute bottom-4 left-4 right-4 flex h-12 translate-y-4 items-center justify-center rounded-full bg-white text-sm font-bold text-[#3B1748] opacity-0 shadow-lg transition duration-500 group-hover:translate-y-0 group-hover:opacity-100 hover:bg-[#3B1748] hover:text-white">
                                    Quick View
                                </a>
                            </div>
                            <div class="mt-4 flex flex-1 flex-col gap-1">
                                <h3 class="text-base font-bold text-[#3B1748] transition hover:text-[#6E3A8A]">
                                    <a href="<?php echo esc_url($p_url); ?>"><?php echo esc_html($product->get_name()); ?></a>
                                </h3>
                                <div class="text-sm font-bold text-[#6E3A8A]">
                                    <?php echo $product->get_price_html(); ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <!-- Placeholder / Hardcoded products for demonstration as requested in skill -->
                <div class="grid grid-cols-2 gap-6 sm:gap-8 lg:grid-cols-3 xl:grid-cols-4">
                    <?php for ($i = 1; $i <= 4; $i++) : ?>
                        <div class="group relative flex flex-col">
                            <div class="relative aspect-[4/5] overflow-hidden rounded-2xl bg-[#FBF4FF]">
                                <div class="flex h-full w-full items-center justify-center text-[#E8DFF0]">
                                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                                </div>
                                <div class="absolute bottom-4 left-4 right-4 flex h-12 items-center justify-center rounded-full bg-white/90 text-sm font-bold text-[#3B1748] backdrop-blur-sm">
                                    Preview Product
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="h-4 w-3/4 rounded bg-[#FBF4FF]"></div>
                                <div class="mt-2 h-4 w-1/4 rounded bg-[#FBF4FF]"></div>
                            </div>
                        </div>
                    <?php endfor; ?>
                    <div class="col-span-full mt-12 rounded-3xl bg-[#FBF4FF] p-12 text-center">
                        <h3 class="font-heading text-2xl text-[#3B1748]">Collection Coming Soon</h3>
                        <p class="mt-4 text-[#6D5875]">We are currently curating the finest <?php echo esc_html(strtolower($category_name)); ?> for you.</p>
                        <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="mt-8 inline-flex h-12 items-center justify-center rounded-full bg-[#3B1748] px-8 text-sm font-bold text-white transition hover:bg-[#6E3A8A]">
                            Browse All Products
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Trust Section -->
    <section class="bg-[#FBF4FF] px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="grid gap-8 sm:grid-cols-3">
                <div class="text-center">
                    <div class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-full bg-white text-[#6E3A8A] shadow-sm">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10H3M21 6H3M21 14H3M21 18H3"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-[#3B1748]">Premium Materials</h3>
                    <p class="mt-2 text-sm text-[#6D5875]">Carefully selected lace, satin, and silk for ultimate comfort.</p>
                </div>
                <div class="text-center">
                    <div class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-full bg-white text-[#6E3A8A] shadow-sm">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 8l4 4-4 4M8 12h7"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-[#3B1748]">Fast Shipping</h3>
                    <p class="mt-2 text-sm text-[#6D5875]">Dispatched within 2-4 business days with tracking included.</p>
                </div>
                <div class="text-center">
                    <div class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-full bg-white text-[#6E3A8A] shadow-sm">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-[#3B1748]">Romantic Boutique</h3>
                    <p class="mt-2 text-sm text-[#6D5875]">A curated experience for soft confidence and quiet beauty.</p>
                </div>
            </div>
        </div>
    </section>
</div>
