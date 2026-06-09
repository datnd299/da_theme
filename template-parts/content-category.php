<?php
/**
 * Shared template for category landing pages.
 */

if (!isset($category_name)) $category_name = 'Collection';
if (!isset($category_desc)) $category_desc = '';
if (!isset($category_image)) $category_image = '';
if (!isset($products)) $products = [];
?>

<div class="bg-white text-navy antialiased">
    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-surface-alt px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
        <div class="mx-auto grid max-w-7xl gap-10 lg:grid-cols-[1fr_0.8fr] lg:items-center">
            <div class="relative z-10">
                <nav class="mb-8 flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-blue" aria-label="Breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-navy">Home</a>
                    <span class="text-gray-300">/</span>
                    <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="hover:text-navy">Shop</a>
                    <span class="text-gray-300">/</span>
                    <span class="text-navy"><?php echo esc_html($category_name); ?></span>
                </nav>
                
                <h1 class="font-heading text-5xl leading-tight text-navy sm:text-6xl lg:text-7xl">
                    <?php echo esc_html($category_name); ?>
                </h1>
                <p class="mt-6 max-w-xl text-lg leading-relaxed text-foreground-muted">
                    <?php echo esc_html($category_desc); ?>
                </p>
                <div class="mt-10 flex items-center gap-6">
                    <div class="flex items-center gap-2">
                        <span class="flex h-10 w-10 items-center justify-center rounded-full bg-blue/10 text-blue">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        </span>
                        <span class="text-sm font-semibold text-navy">Quality Assured</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="flex h-10 w-10 items-center justify-center rounded-full bg-lime/20 text-navy">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
                        </span>
                        <span class="text-sm font-semibold text-navy">Pro Performance</span>
                    </div>
                </div>
            </div>

            <div class="relative lg:mt-0">
                <div class="relative overflow-hidden rounded-[2.5rem] border-4 border-white shadow-2xl shadow-navy/5">
                    <?php if ($category_image) : ?>
                        <img src="<?php echo esc_url($category_image); ?>" alt="<?php echo esc_attr($category_name); ?>" class="aspect-[4/5] w-full object-cover sm:aspect-[5/4] lg:aspect-[4/5]">
                    <?php else : ?>
                        <div class="aspect-[4/5] w-full bg-gray-100 sm:aspect-[5/4] lg:aspect-[4/5]"></div>
                    <?php endif; ?>
                </div>
                <!-- Decorative elements -->
                <div class="absolute -bottom-6 -left-6 h-32 w-32 rounded-full bg-blue/10 blur-2xl"></div>
                <div class="absolute -top-6 -right-6 h-32 w-32 rounded-full bg-lime/20 blur-2xl"></div>
            </div>
        </div>
    </section>

    <!-- Product Grid Section -->
    <section class="bg-white px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
        <div class="mx-auto max-w-7xl">
            <div class="mb-12 flex flex-col justify-between gap-6 border-b border-gray-100 pb-8 md:flex-row md:items-end">
                <div>
                    <h2 class="font-heading text-3xl text-navy md:text-4xl">Explore The Collection</h2>
                    <p class="mt-2 text-foreground-muted">Discover our curated selection of <?php echo esc_html(strtolower($category_name)); ?>.</p>
                </div>
                <div class="flex items-center gap-4 text-sm font-bold text-navy">
                    <span><?php echo count($products); ?> Products</span>
                    <div class="h-4 w-px bg-gray-200"></div>
                    <button class="flex items-center gap-2 hover:text-blue">
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
                            <div class="relative aspect-[4/5] overflow-hidden rounded-2xl bg-surface-alt transition duration-500 group-hover:shadow-xl group-hover:shadow-navy/10">
                                <img src="<?php echo esc_url($p_img); ?>" alt="<?php echo esc_attr($product->get_name()); ?>" class="h-full w-full object-cover transition duration-700 group-hover:scale-110">
                                <div class="absolute inset-0 bg-gradient-to-t from-navy/20 to-transparent opacity-0 transition-opacity duration-500 group-hover:opacity-100"></div>
                                <a href="<?php echo esc_url($p_url); ?>" class="absolute bottom-4 left-4 right-4 flex h-12 translate-y-4 items-center justify-center rounded-full bg-white text-sm font-bold text-navy opacity-0 shadow-lg transition duration-500 group-hover:translate-y-0 group-hover:opacity-100 hover:bg-navy hover:text-white">
                                    Quick View
                                </a>
                            </div>
                            <div class="mt-4 flex flex-1 flex-col gap-1">
                                <h3 class="text-base font-bold text-navy transition hover:text-blue">
                                    <a href="<?php echo esc_url($p_url); ?>"><?php echo esc_html($product->get_name()); ?></a>
                                </h3>
                                <div class="text-sm font-bold text-blue">
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
                            <div class="relative aspect-[4/5] overflow-hidden rounded-2xl bg-surface-alt">
                                <div class="flex h-full w-full items-center justify-center text-gray-200">
                                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                                </div>
                                <div class="absolute bottom-4 left-4 right-4 flex h-12 items-center justify-center rounded-full bg-white/90 text-sm font-bold text-navy backdrop-blur-sm">
                                    Preview Product
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="h-4 w-3/4 rounded bg-surface-alt"></div>
                                <div class="mt-2 h-4 w-1/4 rounded bg-surface-alt"></div>
                            </div>
                        </div>
                    <?php endfor; ?>
                    <div class="col-span-full mt-12 rounded-3xl bg-surface-alt p-12 text-center">
                        <h3 class="font-heading text-2xl text-navy">Collection Coming Soon</h3>
                        <p class="mt-4 text-foreground-muted">We are currently curating the finest <?php echo esc_html(strtolower($category_name)); ?> for you.</p>
                        <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="mt-8 inline-flex h-12 items-center justify-center rounded-full bg-navy px-8 text-sm font-bold text-white transition hover:bg-blue">
                            Browse All Products
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Trust Section -->
    <section class="bg-surface-alt px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="grid gap-8 sm:grid-cols-3">
                <div class="text-center">
                    <div class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-full bg-white text-blue shadow-sm">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.24 12.24a6 6 0 0 0-8.49-8.49L5 10.5V19h8.5z"/><line x1="16" y1="8" x2="2" y2="22"/><line x1="17.5" y1="15" x2="9" y2="15"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-navy">Performance Fabrics</h3>
                    <p class="mt-2 text-sm text-foreground-muted">Breathable, dry-fit, and durable materials designed for peak performance.</p>
                </div>
                <div class="text-center">
                    <div class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-full bg-white text-blue shadow-sm">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 8l4 4-4 4M8 12h7"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-navy">Free U.S. Shipping</h3>
                    <p class="mt-2 text-sm text-foreground-muted">Free standard shipping nationwide, with orders processed within 1-3 business days.</p>
                </div>
                <div class="text-center">
                    <div class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-full bg-white text-blue shadow-sm">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-navy">Official UK Quality</h3>
                    <p class="mt-2 text-sm text-foreground-muted">Authentic activewear essentials curated for style and movement.</p>
                </div>
            </div>
        </div>
    </section>
</div>
