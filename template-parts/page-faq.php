<?php
/**
 * Template Part: FAQ Page
 * Brand: UK Official Store
 * Description: High-end, organized FAQ page for activewear shoppers.
 */

$support_email = 'support@ukofficialstore.com';
?>

<div class="bg-white text-navy font-sans">
    <!-- Premium Header -->
    <section class="bg-navy pt-24 pb-16 md:pt-32 md:pb-24 text-white relative overflow-hidden">
        <div class="absolute inset-0 z-0">
             <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-blue/10 rounded-full blur-[100px]"></div>
             <div class="absolute -bottom-20 -left-20 w-[400px] h-[400px] bg-lime/5 rounded-full blur-[80px]"></div>
        </div>
        
        <div class="mx-auto max-w-7xl px-6 relative z-10">
            <div class="text-center max-w-3xl mx-auto">
                <span class="inline-block px-4 py-1.5 rounded-full bg-blue text-white text-[10px] font-black uppercase tracking-[0.2em] mb-8">
                    Help Center
                </span>
                <h1 class="text-5xl md:text-7xl font-heading font-black mb-8 leading-tight tracking-tight">
                    How can we <span class="text-blue">help?</span>
                </h1>
                <p class="text-xl text-gray-400 font-light">
                    Search through our most common inquiries about activewear, sizing, and orders.
                </p>
            </div>
        </div>
    </section>

    <!-- Quick Category Grid -->
    <section class="-mt-12 relative z-20 mb-20">
        <div class="mx-auto max-w-7xl px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
                <a href="#ordering" class="bg-white p-8 rounded-3xl border border-border shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 text-center group">
                    <div class="w-12 h-12 rounded-2xl bg-blue/10 text-blue flex items-center justify-center mx-auto mb-4 group-hover:bg-blue group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    </div>
                    <span class="font-bold text-sm text-navy">Ordering</span>
                </a>
                <a href="#shipping" class="bg-white p-8 rounded-3xl border border-border shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 text-center group">
                    <div class="w-12 h-12 rounded-2xl bg-blue/10 text-blue flex items-center justify-center mx-auto mb-4 group-hover:bg-blue group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
                    </div>
                    <span class="font-bold text-sm text-navy">Shipping</span>
                </a>
                <a href="#returns" class="bg-white p-8 rounded-3xl border border-border shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 text-center group">
                    <div class="w-12 h-12 rounded-2xl bg-blue/10 text-blue flex items-center justify-center mx-auto mb-4 group-hover:bg-blue group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 15v-1a4 4 0 00-4-4H8m0 0l3 3m-3-3l3-3m9 14V5a2 2 0 00-2-2H6a2 2 0 00-2 2v16l4-2 4 2 4-2 4 2z"></path></svg>
                    </div>
                    <span class="font-bold text-sm text-navy">Returns</span>
                </a>
                <a href="#products" class="bg-white p-8 rounded-3xl border border-border shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 text-center group">
                    <div class="w-12 h-12 rounded-2xl bg-blue/10 text-blue flex items-center justify-center mx-auto mb-4 group-hover:bg-blue group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <span class="font-bold text-sm text-navy">Products</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Detailed FAQ Sections -->
    <section class="py-20">
        <div class="mx-auto max-w-4xl px-6">
            
            <!-- Ordering & Payment -->
            <div id="ordering" class="scroll-mt-32 mb-24">
                <div class="flex items-center gap-4 mb-12">
                    <span class="text-5xl font-black text-blue/20">01</span>
                    <h2 class="text-3xl font-heading font-black text-navy uppercase tracking-tight">Ordering & Payment</h2>
                </div>
                <div class="space-y-4">
                    <details class="group bg-surface-alt rounded-2xl overflow-hidden border border-transparent hover:border-blue/20 transition-all">
                        <summary class="flex items-center justify-between p-8 cursor-pointer list-none">
                            <h4 class="font-bold text-lg pr-8">How do I track my order?</h4>
                            <span class="text-blue group-open:rotate-180 transition-transform">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </span>
                        </summary>
                        <div class="px-8 pb-8 text-foreground-muted leading-relaxed">
                            Once your order ships, you will receive an email with a tracking number and a link to track your package. You can also visit our <a href="/track-order/" class="text-blue font-bold hover:underline">Track Order</a> page for real-time updates.
                        </div>
                    </details>
                    <details class="group bg-surface-alt rounded-2xl overflow-hidden border border-transparent hover:border-blue/20 transition-all">
                        <summary class="flex items-center justify-between p-8 cursor-pointer list-none">
                            <h4 class="font-bold text-lg pr-8">Can I change or cancel my order?</h4>
                            <span class="text-blue group-open:rotate-180 transition-transform">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </span>
                        </summary>
                        <div class="px-8 pb-8 text-foreground-muted leading-relaxed">
                            We process orders quickly to ensure fast delivery. Please contact us at <a href="mailto:<?php echo $support_email; ?>" class="text-blue font-bold hover:underline"><?php echo $support_email; ?></a> within 1 hour of placing your order if you need to make changes.
                        </div>
                    </details>
                </div>
            </div>

            <!-- Shipping & Delivery -->
            <div id="shipping" class="scroll-mt-32 mb-24">
                <div class="flex items-center gap-4 mb-12">
                    <span class="text-5xl font-black text-blue/20">02</span>
                    <h2 class="text-3xl font-heading font-black text-navy uppercase tracking-tight">Shipping & Delivery</h2>
                </div>
                <div class="space-y-4">
                    <details class="group bg-surface-alt rounded-2xl overflow-hidden border border-transparent hover:border-blue/20 transition-all">
                        <summary class="flex items-center justify-between p-8 cursor-pointer list-none">
                            <h4 class="font-bold text-lg pr-8">How long does shipping take?</h4>
                            <span class="text-blue group-open:rotate-180 transition-transform">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </span>
                        </summary>
                        <div class="px-8 pb-8 text-foreground-muted leading-relaxed">
                            Orders are processed within 2–4 business days. Standard US shipping typically takes 5–10 business days after dispatch.
                        </div>
                    </details>
                    <details class="group bg-surface-alt rounded-2xl overflow-hidden border border-transparent hover:border-blue/20 transition-all">
                        <summary class="flex items-center justify-between p-8 cursor-pointer list-none">
                            <h4 class="font-bold text-lg pr-8">Do you ship internationally?</h4>
                            <span class="text-blue group-open:rotate-180 transition-transform">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </span>
                        </summary>
                        <div class="px-8 pb-8 text-foreground-muted leading-relaxed">
                            Currently, we focus on serving customers in the United States and selected international regions. Shipping availability and rates will be displayed clearly at checkout.
                        </div>
                    </details>
                </div>
            </div>

            <!-- Returns & Refunds -->
            <div id="returns" class="scroll-mt-32 mb-24">
                <div class="flex items-center gap-4 mb-12">
                    <span class="text-5xl font-black text-blue/20">03</span>
                    <h2 class="text-3xl font-heading font-black text-navy uppercase tracking-tight">Returns & Refunds</h2>
                </div>
                <div class="space-y-4">
                    <details class="group bg-surface-alt rounded-2xl overflow-hidden border border-transparent hover:border-blue/20 transition-all">
                        <summary class="flex items-center justify-between p-8 cursor-pointer list-none">
                            <h4 class="font-bold text-lg pr-8">What is your return policy?</h4>
                            <span class="text-blue group-open:rotate-180 transition-transform">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </span>
                        </summary>
                        <div class="px-8 pb-8 text-foreground-muted leading-relaxed">
                            We offer a 30-day return window for unworn, unwashed, and undamaged items in their original condition. For a full breakdown, please visit our <a href="/return-refund-policy/" class="text-blue font-bold hover:underline">Return & Refund Policy</a> page.
                        </div>
                    </details>
                    <details class="group bg-surface-alt rounded-2xl overflow-hidden border border-transparent hover:border-blue/20 transition-all">
                        <summary class="flex items-center justify-between p-8 cursor-pointer list-none">
                            <h4 class="font-bold text-lg pr-8">When will I receive my refund?</h4>
                            <span class="text-blue group-open:rotate-180 transition-transform">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </span>
                        </summary>
                        <div class="px-8 pb-8 text-foreground-muted leading-relaxed">
                            Once we receive and inspect your return, refunds are typically processed back to your original payment method within 5–10 business days.
                        </div>
                    </details>
                </div>
            </div>

            <!-- Products & Sizing -->
            <div id="products" class="scroll-mt-32">
                <div class="flex items-center gap-4 mb-12">
                    <span class="text-5xl font-black text-blue/20">04</span>
                    <h2 class="text-3xl font-heading font-black text-navy uppercase tracking-tight">Products & Sizing</h2>
                </div>
                <div class="space-y-4">
                    <details class="group bg-surface-alt rounded-2xl overflow-hidden border border-transparent hover:border-blue/20 transition-all">
                        <summary class="flex items-center justify-between p-8 cursor-pointer list-none">
                            <h4 class="font-bold text-lg pr-8">How do I find the right size?</h4>
                            <span class="text-blue group-open:rotate-180 transition-transform">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </span>
                        </summary>
                        <div class="px-8 pb-8 text-foreground-muted leading-relaxed">
                            We recommend checking the size guide provided on each product page. Our activewear is designed for a comfortable training fit. If you're between sizes, we generally recommend sizing up for a more relaxed feel.
                        </div>
                    </details>
                    <details class="group bg-surface-alt rounded-2xl overflow-hidden border border-transparent hover:border-blue/20 transition-all">
                        <summary class="flex items-center justify-between p-8 cursor-pointer list-none">
                            <h4 class="font-bold text-lg pr-8">What is "Dry-Fit Style" fabric?</h4>
                            <span class="text-blue group-open:rotate-180 transition-transform">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </span>
                        </summary>
                        <div class="px-8 pb-8 text-foreground-muted leading-relaxed">
                            Our dry-fit style pieces are made from lightweight, breathable-feel polyester blends designed to keep you comfortable during movement and training by wicking moisture away from the skin.
                        </div>
                    </details>
                </div>
            </div>

        </div>
    </section>

    <!-- Premium Support Footer -->
    <section class="py-24 bg-surface-alt border-t border-border">
        <div class="mx-auto max-w-7xl px-6">
            <div class="bg-navy rounded-[3rem] p-12 md:p-20 text-white relative overflow-hidden">
                <div class="absolute top-0 right-0 w-96 h-96 bg-blue/10 rounded-full blur-[100px] -mr-48 -mt-48"></div>
                
                <div class="relative z-10 flex flex-col lg:flex-row items-center justify-between gap-12">
                    <div class="max-w-xl text-center lg:text-left">
                        <h2 class="text-4xl md:text-5xl font-heading font-black mb-6">Didn't find what you need?</h2>
                        <p class="text-xl text-gray-400">
                            Our support experts are ready to assist you with any specific questions about our activewear.
                        </p>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-6 w-full lg:w-auto">
                        <a href="mailto:<?php echo $support_email; ?>" class="px-12 py-5 bg-blue hover:bg-white hover:text-navy text-white font-bold rounded-2xl transition-all duration-300 text-center shadow-lg shadow-blue/20">
                            Email Support
                        </a>
                        <a href="/contact-us/" class="px-12 py-5 border-2 border-white/10 hover:border-white text-white font-bold rounded-2xl transition-all duration-300 text-center">
                            Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    html {
        scroll-behavior: smooth;
    }
    details summary::-webkit-details-marker {
        display: none;
    }
</style>
