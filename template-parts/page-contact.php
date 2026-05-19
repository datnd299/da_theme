<?php
/**
 * Template Part: Contact Us
 * Bardic – Contact Us
 */
?>

<!-- Hero -->
<section class="bg-[#FAF6F0] pt-20 pb-16 px-6 md:px-12 border-b border-[#D9D2C5]/40">
    <div class="max-w-[820px] mx-auto text-center">
        <span class="text-[#B08A57] text-xs font-bold tracking-[0.3em] uppercase block mb-4">Get in Touch</span>
        <h1 class="font-serif text-4xl md:text-5xl text-[#4A3426] leading-[1.1] mb-5 font-medium">We'd Love to Hear From You</h1>
        <p class="text-[#7A6C5F] font-sans text-base leading-[1.8] max-w-xl mx-auto">
            Whether you need help choosing a kit, assembling your lyre, tuning your strings, or tracking an order — our team is here to help.
        </p>
    </div>
</section>

<!-- Contact Cards + Form -->
<section class="bg-[#FAF6F0] py-16 px-6 md:px-12">
    <div class="max-w-[1100px] mx-auto grid grid-cols-1 lg:grid-cols-5 gap-10 lg:gap-16">

        <!-- Left: Info -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Email Card -->
            <div class="bg-[#F3EDE2] border border-[#D9D2C5]/50 rounded-2xl p-7">
                <div class="w-10 h-10 bg-[#4A3426] rounded-xl flex items-center justify-center mb-5">
                    <svg class="w-5 h-5 text-[#FAF6F0]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="font-serif text-lg text-[#4A3426] mb-1 font-medium">Customer Support</h3>
                <p class="text-[#7A6C5F] font-sans text-xs leading-[1.6] mb-3">We aim to respond to all inquiries within 24 hours.</p>
                <a href="mailto:contact@bardicshop.com" class="text-[#B08A57] font-sans font-semibold text-sm hover:underline">contact@bardicshop.com</a>
            </div>

            <!-- Address Card -->
            <div class="bg-[#F3EDE2] border border-[#D9D2C5]/50 rounded-2xl p-7">
                <div class="w-10 h-10 bg-[#4A3426] rounded-xl flex items-center justify-center mb-5">
                    <svg class="w-5 h-5 text-[#FAF6F0]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <h3 class="font-serif text-lg text-[#4A3426] mb-1 font-medium">Address</h3>
                <p class="text-[#7A6C5F] font-sans text-sm mt-2">2000 Parkview Dr</p>
                <p class="text-[#4A3426] font-sans font-semibold text-sm">South Holland, IL 60473</p>
            </div>

            <!-- Hours Card -->
            <div class="bg-[#F3EDE2] border border-[#D9D2C5]/50 rounded-2xl p-7">
                <div class="w-10 h-10 bg-[#4A3426] rounded-xl flex items-center justify-center mb-5">
                    <svg class="w-5 h-5 text-[#FAF6F0]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="font-serif text-lg text-[#4A3426] mb-1 font-medium">Business Hours</h3>
                <p class="text-[#7A6C5F] font-sans text-sm mt-2">Monday – Friday</p>
                <p class="text-[#4A3426] font-sans font-semibold text-sm">9:00 AM – 5:00 PM (EST)</p>
            </div>

            <!-- What we help with -->
            <div class="bg-[#F3EDE2] border border-[#D9D2C5]/50 rounded-2xl p-7">
                <h3 class="font-serif text-lg text-[#4A3426] mb-4 font-medium">We Can Help With</h3>
                <ul class="space-y-2.5">
                    <?php foreach(['Order updates','Shipping questions','Assembly guidance','Tuning assistance','Product recommendations','Returns & refunds'] as $item): ?>
                    <li class="flex items-center gap-3 text-[#7A6C5F] font-sans text-sm">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#B08A57] shrink-0"></span><?= $item ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <!-- Right: Contact Form -->
        <div class="lg:col-span-3">
            <div class="bg-[#F3EDE2] border border-[#D9D2C5]/40 rounded-3xl p-8 md:p-10">
                <h2 class="font-serif text-2xl text-[#4A3426] mb-7 font-medium">Send Us a Message</h2>
                <form class="space-y-5" onsubmit="return false;">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block font-sans text-xs font-semibold text-[#4A3426] tracking-[0.12em] uppercase mb-2">First Name</label>
                            <input type="text" placeholder="Your first name" class="w-full bg-[#FAF6F0] border border-[#D9D2C5] rounded-xl px-4 py-3.5 text-sm text-[#4A3426] placeholder-[#7A6C5F]/50 focus:outline-none focus:ring-2 focus:ring-[#B08A57]/40 focus:border-[#B08A57] transition-all" />
                        </div>
                        <div>
                            <label class="block font-sans text-xs font-semibold text-[#4A3426] tracking-[0.12em] uppercase mb-2">Last Name</label>
                            <input type="text" placeholder="Your last name" class="w-full bg-[#FAF6F0] border border-[#D9D2C5] rounded-xl px-4 py-3.5 text-sm text-[#4A3426] placeholder-[#7A6C5F]/50 focus:outline-none focus:ring-2 focus:ring-[#B08A57]/40 focus:border-[#B08A57] transition-all" />
                        </div>
                    </div>
                    <div>
                        <label class="block font-sans text-xs font-semibold text-[#4A3426] tracking-[0.12em] uppercase mb-2">Email Address</label>
                        <input type="email" placeholder="your@email.com" class="w-full bg-[#FAF6F0] border border-[#D9D2C5] rounded-xl px-4 py-3.5 text-sm text-[#4A3426] placeholder-[#7A6C5F]/50 focus:outline-none focus:ring-2 focus:ring-[#B08A57]/40 focus:border-[#B08A57] transition-all" />
                    </div>
                    <div>
                        <label class="block font-sans text-xs font-semibold text-[#4A3426] tracking-[0.12em] uppercase mb-2">Order Number <span class="text-[#7A6C5F]/60 normal-case font-normal tracking-normal">(optional)</span></label>
                        <input type="text" placeholder="e.g. #10234" class="w-full bg-[#FAF6F0] border border-[#D9D2C5] rounded-xl px-4 py-3.5 text-sm text-[#4A3426] placeholder-[#7A6C5F]/50 focus:outline-none focus:ring-2 focus:ring-[#B08A57]/40 focus:border-[#B08A57] transition-all" />
                    </div>
                    <div>
                        <label class="block font-sans text-xs font-semibold text-[#4A3426] tracking-[0.12em] uppercase mb-2">Topic</label>
                        <select class="w-full bg-[#FAF6F0] border border-[#D9D2C5] rounded-xl px-4 py-3.5 text-sm text-[#4A3426] focus:outline-none focus:ring-2 focus:ring-[#B08A57]/40 focus:border-[#B08A57] transition-all appearance-none">
                            <option value="">Select a topic…</option>
                            <option>Order update / tracking</option>
                            <option>Shipping question</option>
                            <option>Assembly guidance</option>
                            <option>Tuning assistance</option>
                            <option>Return or refund</option>
                            <option>Product recommendation</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-sans text-xs font-semibold text-[#4A3426] tracking-[0.12em] uppercase mb-2">Message</label>
                        <textarea rows="5" placeholder="How can we help you?" class="w-full bg-[#FAF6F0] border border-[#D9D2C5] rounded-xl px-4 py-3.5 text-sm text-[#4A3426] placeholder-[#7A6C5F]/50 focus:outline-none focus:ring-2 focus:ring-[#B08A57]/40 focus:border-[#B08A57] transition-all resize-none"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-[#4A3426] text-[#FAF6F0] py-4 rounded-xl font-sans text-sm font-semibold tracking-wide hover:bg-[#B08A57] transition-all duration-300 flex items-center justify-center gap-2">
                        Send Message
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </button>
                    <p class="text-center text-[#7A6C5F]/70 font-sans text-xs">We'll respond within 1–2 business days.</p>
                </form>
            </div>
        </div>
    </div>
</section>
