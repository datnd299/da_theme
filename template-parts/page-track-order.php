<?php
/**
 * Template Part: Track Your Order
 * Bardic – Track Your Order
 */
?>
<section class="bg-[#FAF6F0] pt-20 pb-16 px-6 md:px-12 border-b border-[#D9D2C5]/40">
    <div class="max-w-[600px] mx-auto text-center">
        <span class="text-[#B08A57] text-xs font-bold tracking-[0.3em] uppercase block mb-4">Support</span>
        <h1 class="font-serif text-4xl md:text-5xl text-[#4A3426] leading-[1.1] mb-5 font-medium">Track Your Order</h1>
        <p class="text-[#7A6C5F] font-sans text-base leading-[1.8]">
            Enter your order number and email address below to check the status of your shipment.
        </p>
    </div>
</section>

<!-- Track Form -->
<section class="bg-[#FAF6F0] py-16 px-6 md:px-12">
    <div class="max-w-[520px] mx-auto">
        <div class="bg-[#F3EDE2] border border-[#D9D2C5]/50 rounded-3xl p-8 md:p-10 shadow-sm">
            <h2 class="font-serif text-xl text-[#4A3426] mb-6 font-medium text-center">Order Lookup</h2>
            <form class="space-y-5" onsubmit="return false;">
                <div>
                    <label for="order-number" class="block font-sans text-xs font-semibold text-[#4A3426] tracking-[0.15em] uppercase mb-2">Order Number</label>
                    <input type="text" id="order-number" placeholder="e.g. #10234" class="w-full bg-[#FAF6F0] border border-[#D9D2C5] rounded-xl px-4 py-3.5 text-sm text-[#4A3426] placeholder-[#7A6C5F]/50 focus:outline-none focus:ring-2 focus:ring-[#B08A57]/40 focus:border-[#B08A57] transition-all" />
                </div>
                <div>
                    <label for="order-email" class="block font-sans text-xs font-semibold text-[#4A3426] tracking-[0.15em] uppercase mb-2">Email Address</label>
                    <input type="email" id="order-email" placeholder="Email used at checkout" class="w-full bg-[#FAF6F0] border border-[#D9D2C5] rounded-xl px-4 py-3.5 text-sm text-[#4A3426] placeholder-[#7A6C5F]/50 focus:outline-none focus:ring-2 focus:ring-[#B08A57]/40 focus:border-[#B08A57] transition-all" />
                </div>
                <button type="submit" class="w-full bg-[#4A3426] text-[#FAF6F0] py-4 rounded-xl font-sans text-sm font-semibold tracking-wide hover:bg-[#B08A57] transition-all duration-300 flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7 7 0 1 0 6.65 6.65a7 7 0 0 0 9.9 9.9z"/></svg>
                    Track Order
                </button>
            </form>
        </div>

        <!-- Info Cards -->
        <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="bg-[#F3EDE2] border border-[#D9D2C5]/40 rounded-2xl p-5 text-center">
                <div class="text-2xl mb-2">📦</div>
                <h3 class="font-sans font-semibold text-[#4A3426] text-xs tracking-wide uppercase mb-1">Processing Time</h3>
                <p class="text-[#7A6C5F] text-xs leading-[1.6]">Orders are processed within 3–5 business days (Monday - Friday).</p>
            </div>
            <div class="bg-[#F3EDE2] border border-[#D9D2C5]/40 rounded-2xl p-5 text-center">
                <div class="text-2xl mb-2">🚚</div>
                <h3 class="font-sans font-semibold text-[#4A3426] text-xs tracking-wide uppercase mb-1">Delivery Estimate</h3>
                <p class="text-[#7A6C5F] text-xs leading-[1.6]">Continental US: 7–10 business days total estimated delivery time.</p>
            </div>
        </div>

        <p class="text-center text-[#7A6C5F] font-sans text-xs mt-8 leading-[1.7]">
            Need help with your order? Contact us at
            <a href="mailto:contact@bardicshop.com" class="text-[#B08A57] hover:underline">contact@bardicshop.com</a>
        </p>
    </div>
</section>
