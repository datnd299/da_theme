<?php

?>

<!-- Noise Overlay -->
<div class="fixed inset-0 z-[50] pointer-events-none opacity-[0.03] bg-[url('https://grainy-gradients.vercel.app/noise.svg')]"></div>

<main class="w-full bg-background min-h-screen overflow-hidden selection:bg-muted selection:text-background pb-32">

    <!-- HERO SECTION -->
    <section class="relative w-full flex flex-col items-start justify-end px-4 md:px-12 pt-20 md:pt-32 pb-12 md:pb-20 max-w-[1600px] mx-auto gap-6 md:gap-8">

        <div class="rounded-full px-4 py-1.5 text-[10px] uppercase tracking-[0.2em] font-medium bg-black/5 text-foreground ring-1 ring-black/5 animate-fade-up">
            Policy Documentation
        </div>

        <h1 class="font-heading text-[4rem] md:text-[7rem] lg:text-[9rem] leading-[0.88] tracking-[-0.04em] text-foreground animate-fade-up" style="animation-delay: 80ms;">
            Shipping &amp; <br/>
            <span class="italic font-serif text-muted opacity-80">Returns.</span>
        </h1>

        <div class="flex flex-col md:flex-row items-start md:items-end justify-between w-full gap-6 animate-fade-up" style="animation-delay: 160ms;">
            <p class="text-base text-foreground/50 font-sans max-w-lg leading-relaxed">
                We are committed to delivering your timepiece safely and ensuring your complete satisfaction. Please read our full policy below.
            </p>
            <div class="flex items-center gap-3 shrink-0">
                <div class="w-2 h-2 rounded-full bg-foreground/30"></div>
                <span class="font-sans text-xs uppercase tracking-widest text-foreground/40">Last Updated: April 28, 2026</span>
            </div>
        </div>

        <!-- Stats Bar -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-2 md:gap-3 w-full animate-fade-up" style="animation-delay: 240ms;">
            <div class="rounded-[1.5rem] bg-black/5 p-1.5 ring-1 ring-black/5">
                <div class="rounded-[calc(1.5rem-0.375rem)] bg-surface px-4 py-4 md:px-6 md:py-5 shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)]">
                    <p class="font-heading text-xl md:text-2xl text-foreground">Free</p>
                    <p class="font-sans text-[9px] md:text-[10px] uppercase tracking-widest text-foreground/40 mt-1">USA Shipping</p>
                </div>
            </div>
            <div class="rounded-[1.5rem] bg-black/5 p-1.5 ring-1 ring-black/5">
                <div class="rounded-[calc(1.5rem-0.375rem)] bg-surface px-4 py-4 md:px-6 md:py-5 shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)]">
                    <p class="font-heading text-xl md:text-2xl text-foreground">11–16</p>
                    <p class="font-sans text-[9px] md:text-[10px] uppercase tracking-widest text-foreground/40 mt-1">Business Days</p>
                </div>
            </div>
            <div class="rounded-[1.5rem] bg-black/5 p-1.5 ring-1 ring-black/5">
                <div class="rounded-[calc(1.5rem-0.375rem)] bg-surface px-4 py-4 md:px-6 md:py-5 shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)]">
                    <p class="font-heading text-xl md:text-2xl text-foreground">30 Days</p>
                    <p class="font-sans text-[9px] md:text-[10px] uppercase tracking-widest text-foreground/40 mt-1">Return Window</p>
                </div>
            </div>
            <div class="rounded-[1.5rem] bg-black/5 p-1.5 ring-1 ring-black/5">
                <div class="rounded-[calc(1.5rem-0.375rem)] bg-surface px-4 py-4 md:px-6 md:py-5 shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)]">
                    <p class="font-heading text-xl md:text-2xl text-foreground">100%</p>
                    <p class="font-sans text-[9px] md:text-[10px] uppercase tracking-widest text-foreground/40 mt-1">Insured Orders</p>
                </div>
            </div>
        </div>

        <!-- Divider -->
        <div class="w-full h-px bg-black/8 mt-4 animate-fade-up" style="animation-delay: 280ms;"></div>
    </section>

    <!-- MAIN CONTENT -->
    <section class="w-full px-4 md:px-12 max-w-[1600px] mx-auto">

        <!-- Mobile TOC — horizontal scroll pills (hidden on lg+) -->
        <div class="lg:hidden -mx-4 px-4 mb-6">
            <div class="flex gap-2 overflow-x-auto pb-2" style="-ms-overflow-style:none;scrollbar-width:none;">
                <a href="#shipping-info" class="flex-none rounded-full px-4 py-2 text-[10px] uppercase tracking-wider font-medium bg-black/5 text-foreground/60 ring-1 ring-black/8 whitespace-nowrap">Shipping</a>
                <a href="#destination" class="flex-none rounded-full px-4 py-2 text-[10px] uppercase tracking-wider font-medium bg-black/5 text-foreground/60 ring-1 ring-black/8 whitespace-nowrap">Destination</a>
                <a href="#cutoff" class="flex-none rounded-full px-4 py-2 text-[10px] uppercase tracking-wider font-medium bg-black/5 text-foreground/60 ring-1 ring-black/8 whitespace-nowrap">Cut-off</a>
                <a href="#carriers" class="flex-none rounded-full px-4 py-2 text-[10px] uppercase tracking-wider font-medium bg-black/5 text-foreground/60 ring-1 ring-black/8 whitespace-nowrap">Carriers</a>
                <a href="#tracking" class="flex-none rounded-full px-4 py-2 text-[10px] uppercase tracking-wider font-medium bg-black/5 text-foreground/60 ring-1 ring-black/8 whitespace-nowrap">Tracking</a>
                <a href="#address-policy" class="flex-none rounded-full px-4 py-2 text-[10px] uppercase tracking-wider font-medium bg-black/5 text-foreground/60 ring-1 ring-black/8 whitespace-nowrap">Address</a>
                <a href="#lost-stolen" class="flex-none rounded-full px-4 py-2 text-[10px] uppercase tracking-wider font-medium bg-black/5 text-foreground/60 ring-1 ring-black/8 whitespace-nowrap">Lost &amp; Stolen</a>
                <a href="#return-policy" class="flex-none rounded-full px-4 py-2 text-[10px] uppercase tracking-wider font-medium bg-foreground text-background ring-1 ring-foreground/10 whitespace-nowrap">Returns</a>
                <a href="#eligibility" class="flex-none rounded-full px-4 py-2 text-[10px] uppercase tracking-wider font-medium bg-black/5 text-foreground/60 ring-1 ring-black/8 whitespace-nowrap">Eligibility</a>
                <a href="#how-to-return" class="flex-none rounded-full px-4 py-2 text-[10px] uppercase tracking-wider font-medium bg-black/5 text-foreground/60 ring-1 ring-black/8 whitespace-nowrap">How to Return</a>
                <a href="#defective" class="flex-none rounded-full px-4 py-2 text-[10px] uppercase tracking-wider font-medium bg-black/5 text-foreground/60 ring-1 ring-black/8 whitespace-nowrap">Defective</a>
                <a href="#exchanges" class="flex-none rounded-full px-4 py-2 text-[10px] uppercase tracking-wider font-medium bg-black/5 text-foreground/60 ring-1 ring-black/8 whitespace-nowrap">Exchanges</a>
                <a href="#refunds" class="flex-none rounded-full px-4 py-2 text-[10px] uppercase tracking-wider font-medium bg-black/5 text-foreground/60 ring-1 ring-black/8 whitespace-nowrap">Refunds</a>
                <a href="#contact" class="flex-none rounded-full px-4 py-2 text-[10px] uppercase tracking-wider font-medium bg-black/5 text-foreground/60 ring-1 ring-black/8 whitespace-nowrap">Contact</a>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-8 lg:gap-16 items-start">

            <!-- Sticky Table of Contents -->
            <aside class="hidden lg:block lg:w-72 shrink-0 sticky top-8">
                <div class="rounded-[2rem] bg-black/5 p-1.5 ring-1 ring-black/5">
                    <div class="rounded-[calc(2rem-0.375rem)] bg-surface p-8 shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)]">
                        <p class="font-sans text-[10px] uppercase tracking-[0.2em] text-foreground/40 mb-6">Table of Contents</p>
                        <nav class="flex flex-col gap-1" id="toc-nav">
                            <a href="#shipping-info" class="toc-link font-sans text-sm text-foreground/60 hover:text-foreground py-2 px-3 rounded-xl transition-colors duration-300 hover:bg-black/5">Shipping Information</a>
                            <a href="#destination" class="toc-link font-sans text-sm text-foreground/60 hover:text-foreground py-2 px-3 rounded-xl transition-colors duration-300 hover:bg-black/5 pl-6">Destination</a>
                            <a href="#cutoff" class="toc-link font-sans text-sm text-foreground/60 hover:text-foreground py-2 px-3 rounded-xl transition-colors duration-300 hover:bg-black/5 pl-6">Order Cut-off</a>
                            <a href="#carriers" class="toc-link font-sans text-sm text-foreground/60 hover:text-foreground py-2 px-3 rounded-xl transition-colors duration-300 hover:bg-black/5 pl-6">Carriers</a>
                            <a href="#tracking" class="toc-link font-sans text-sm text-foreground/60 hover:text-foreground py-2 px-3 rounded-xl transition-colors duration-300 hover:bg-black/5 pl-6">Order Tracking</a>
                            <a href="#address-policy" class="toc-link font-sans text-sm text-foreground/60 hover:text-foreground py-2 px-3 rounded-xl transition-colors duration-300 hover:bg-black/5 pl-6">Address Policy</a>
                            <a href="#lost-stolen" class="toc-link font-sans text-sm text-foreground/60 hover:text-foreground py-2 px-3 rounded-xl transition-colors duration-300 hover:bg-black/5 pl-6">Lost &amp; Stolen</a>
                            <a href="#return-policy" class="toc-link font-sans text-sm text-foreground/60 hover:text-foreground py-2 px-3 rounded-xl transition-colors duration-300 hover:bg-black/5">Return Policy</a>
                            <a href="#eligibility" class="toc-link font-sans text-sm text-foreground/60 hover:text-foreground py-2 px-3 rounded-xl transition-colors duration-300 hover:bg-black/5 pl-6">Eligibility</a>
                            <a href="#how-to-return" class="toc-link font-sans text-sm text-foreground/60 hover:text-foreground py-2 px-3 rounded-xl transition-colors duration-300 hover:bg-black/5 pl-6">How to Return</a>
                            <a href="#defective" class="toc-link font-sans text-sm text-foreground/60 hover:text-foreground py-2 px-3 rounded-xl transition-colors duration-300 hover:bg-black/5 pl-6">Damaged &amp; Defective</a>
                            <a href="#exchanges" class="toc-link font-sans text-sm text-foreground/60 hover:text-foreground py-2 px-3 rounded-xl transition-colors duration-300 hover:bg-black/5">Exchanges</a>
                            <a href="#refunds" class="toc-link font-sans text-sm text-foreground/60 hover:text-foreground py-2 px-3 rounded-xl transition-colors duration-300 hover:bg-black/5">Refunds</a>
                            <a href="#contact" class="toc-link font-sans text-sm text-foreground/60 hover:text-foreground py-2 px-3 rounded-xl transition-colors duration-300 hover:bg-black/5">Contact</a>
                        </nav>
                    </div>
                </div>
            </aside>

            <!-- Content Body -->
            <div class="flex-1 min-w-0 flex flex-col gap-6">

                <!-- SHIPPING SECTION HEADER -->
                <div id="shipping-info" class="rounded-[2rem] bg-foreground text-background p-1.5 ring-1 ring-foreground/10 scroll-reveal">
                    <div class="relative rounded-[calc(2rem-0.375rem)] bg-foreground p-8 md:p-16 overflow-hidden shadow-[inset_0_1px_1px_rgba(255,255,255,0.1)] flex flex-col md:flex-row items-start md:items-center justify-between gap-8 md:gap-12">
                        <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-muted/15 rounded-full blur-3xl pointer-events-none"></div>
                        <div class="relative z-10 w-full md:w-2/3">
                            <div class="rounded-full px-4 py-1.5 text-[10px] uppercase tracking-[0.2em] font-medium bg-white/10 text-background ring-1 ring-white/10 inline-block mb-5 md:mb-6">
                                Part I &mdash; Shipping
                            </div>
                            <h2 class="font-heading text-[2rem] md:text-[4rem] leading-[1] tracking-[-0.03em] text-background mb-3 md:mb-4">
                                From our store, <br/><span class="italic font-serif opacity-70">to your door.</span>
                            </h2>
                            <p class="font-sans text-background/60 text-sm md:text-base leading-relaxed max-w-md">
                                Every watch is carefully packaged and fully insured during transit. All orders ship from Houston, TX.
                            </p>
                        </div>
                        <div class="relative z-10 w-full md:w-auto grid grid-cols-2 md:flex md:flex-col gap-3 md:gap-4 shrink-0">
                            <div class="rounded-[1.25rem] bg-white/10 p-4 md:p-5">
                                <p class="font-heading text-2xl md:text-3xl text-background mb-1">6:00 PM</p>
                                <p class="font-sans text-[10px] md:text-xs text-background/60 uppercase tracking-widest">CST Order Cut-off</p>
                            </div>
                            <div class="rounded-[1.25rem] bg-white/10 p-4 md:p-5">
                                <p class="font-heading text-2xl md:text-3xl text-background mb-1">Insured</p>
                                <p class="font-sans text-[10px] md:text-xs text-background/60 uppercase tracking-widest">Every Shipment</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Destination -->
                <div id="destination" class="rounded-[2rem] bg-black/5 p-1.5 ring-1 ring-black/5 scroll-reveal">
                    <div class="rounded-[calc(2rem-0.375rem)] bg-surface p-8 md:p-12 shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)]">
                        <div class="rounded-full px-4 py-1.5 text-[10px] uppercase tracking-[0.2em] font-medium bg-black/5 text-foreground ring-1 ring-black/5 inline-block mb-6">
                            01 &mdash; Shipping Destination
                        </div>
                        <h2 class="font-heading text-[2rem] md:text-[2.5rem] leading-[1] tracking-[-0.03em] text-foreground mb-4">
                            United States only.
                        </h2>
                        <p class="font-sans text-base text-foreground/70 leading-relaxed mb-8">
                            We currently ship exclusively within the United States. International shipping is not available at this time. We hope to expand our shipping destinations in the future.
                        </p>
                        <!-- Shipping info — mobile card (hidden on md+) -->
                        <div class="md:hidden rounded-[1.25rem] ring-1 ring-black/8 overflow-hidden divide-y divide-black/5">
                            <div class="bg-black/5 px-5 py-3">
                                <p class="font-sans text-[10px] uppercase tracking-widest text-foreground/40">Destination</p>
                                <p class="font-sans text-sm text-foreground/80 font-medium mt-0.5">United States (contiguous)</p>
                            </div>
                            <div class="bg-surface flex items-center justify-between px-5 py-3">
                                <p class="font-sans text-[10px] uppercase tracking-widest text-foreground/40">Handling</p>
                                <p class="font-sans text-sm text-foreground/70">5–6 Business Days</p>
                            </div>
                            <div class="bg-surface flex items-center justify-between px-5 py-3">
                                <p class="font-sans text-[10px] uppercase tracking-widest text-foreground/40">Transit</p>
                                <p class="font-sans text-sm text-foreground/70">6–10 Business Days</p>
                            </div>
                            <div class="bg-surface flex items-center justify-between px-5 py-3">
                                <p class="font-sans text-[10px] uppercase tracking-widest text-foreground/40">Total</p>
                                <p class="font-sans text-sm text-foreground/80 font-medium">11–16 Business Days</p>
                            </div>
                            <div class="bg-surface flex items-center justify-between px-5 py-3">
                                <p class="font-sans text-[10px] uppercase tracking-widest text-foreground/40">Cost</p>
                                <span class="rounded-full px-3 py-1 text-[10px] uppercase tracking-widest font-medium bg-foreground text-background">Free</span>
                            </div>
                        </div>

                        <!-- Shipping Table — desktop only (hidden on mobile) -->
                        <div class="hidden md:block rounded-[1.25rem] ring-1 ring-black/8 overflow-hidden">
                            <table class="w-full text-sm font-sans">
                                <thead>
                                    <tr class="bg-black/5 border-b border-black/8">
                                        <th class="text-left px-6 py-4 text-[10px] uppercase tracking-widest text-foreground/40 font-medium">Destination</th>
                                        <th class="text-left px-6 py-4 text-[10px] uppercase tracking-widest text-foreground/40 font-medium">Handling</th>
                                        <th class="text-left px-6 py-4 text-[10px] uppercase tracking-widest text-foreground/40 font-medium">Transit</th>
                                        <th class="text-left px-6 py-4 text-[10px] uppercase tracking-widest text-foreground/40 font-medium">Total</th>
                                        <th class="text-left px-6 py-4 text-[10px] uppercase tracking-widest text-foreground/40 font-medium">Cost</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-surface">
                                        <td class="px-6 py-5 text-foreground/80 font-medium">United States (contiguous)</td>
                                        <td class="px-6 py-5 text-foreground/60">5–6 Business Days</td>
                                        <td class="px-6 py-5 text-foreground/60">6–10 Business Days</td>
                                        <td class="px-6 py-5 text-foreground/80 font-medium">11–16 Business Days</td>
                                        <td class="px-6 py-5">
                                            <span class="rounded-full px-3 py-1 text-[10px] uppercase tracking-widest font-medium bg-foreground text-background">Free</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <p class="font-sans text-xs text-foreground/40 mt-4 leading-relaxed">
                            Business days are Monday through Friday, excluding U.S. federal holidays. Delivery times are estimates and not guaranteed.
                        </p>
                    </div>
                </div>

                <!-- Cut-off + Carriers -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div id="cutoff" class="rounded-[2rem] bg-black/5 p-1.5 ring-1 ring-black/5 scroll-reveal">
                        <div class="w-full h-full rounded-[calc(2rem-0.375rem)] bg-surface p-8 flex flex-col justify-between md:min-h-[280px] shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)]">
                            <div class="w-10 h-10 rounded-full border border-black/10 flex items-center justify-center mb-6">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
                                </svg>
                            </div>
                            <div>
                                <div class="rounded-full px-3 py-1 text-[9px] uppercase tracking-[0.2em] font-medium bg-black/5 text-foreground ring-1 ring-black/5 inline-block mb-4">02 &mdash; Order Cut-off</div>
                                <h3 class="font-heading text-xl mb-3">Same-day processing.</h3>
                                <p class="font-sans text-sm text-foreground/60 leading-relaxed">
                                    Orders placed before <strong class="text-foreground font-medium">6:00 PM CST</strong> begin processing the same business day. Orders placed after this time begin processing the following business day.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div id="carriers" class="rounded-[2rem] bg-black/5 p-1.5 ring-1 ring-black/5 scroll-reveal" style="transition-delay: 100ms;">
                        <div class="w-full h-full rounded-[calc(2rem-0.375rem)] bg-surface p-8 flex flex-col justify-between md:min-h-[280px] shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)]">
                            <div class="w-10 h-10 rounded-full border border-black/10 flex items-center justify-center mb-6">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/>
                                </svg>
                            </div>
                            <div>
                                <div class="rounded-full px-3 py-1 text-[9px] uppercase tracking-[0.2em] font-medium bg-black/5 text-foreground ring-1 ring-black/5 inline-block mb-4">03 &mdash; Carriers</div>
                                <h3 class="font-heading text-xl mb-3">Trusted logistics partners.</h3>
                                <p class="font-sans text-sm text-foreground/60 leading-relaxed mb-4">
                                    We ship via FedEx, USPS, and UPS. Carrier selection depends on your location and order. P.O. Boxes and APO/FPO addresses are not supported.
                                </p>
                                <div class="flex gap-2 flex-wrap">
                                    <span class="rounded-full px-3 py-1 text-[9px] uppercase tracking-widest font-medium bg-black/5 text-foreground/60 ring-1 ring-black/8">FedEx</span>
                                    <span class="rounded-full px-3 py-1 text-[9px] uppercase tracking-widest font-medium bg-black/5 text-foreground/60 ring-1 ring-black/8">USPS</span>
                                    <span class="rounded-full px-3 py-1 text-[9px] uppercase tracking-widest font-medium bg-black/5 text-foreground/60 ring-1 ring-black/8">UPS</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Tracking -->
                <div id="tracking" class="rounded-[2rem] bg-black/5 p-1.5 ring-1 ring-black/5 scroll-reveal">
                    <div class="rounded-[calc(2rem-0.375rem)] bg-surface p-8 md:p-12 shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)]">
                        <div class="rounded-full px-4 py-1.5 text-[10px] uppercase tracking-[0.2em] font-medium bg-black/5 text-foreground ring-1 ring-black/5 inline-block mb-6">
                            04 &mdash; Order Tracking
                        </div>
                        <h2 class="font-heading text-[2rem] md:text-[2.5rem] leading-[1] tracking-[-0.03em] text-foreground mb-6">
                            Watch your watch arrive.
                        </h2>
                        <p class="font-sans text-base text-foreground/70 leading-relaxed mb-8">
                            Once your order is dispatched, you will receive a shipping confirmation email with your tracking number. Monitor your delivery in real time on the carrier's website, or use our Track Your Order page.
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                            <div class="rounded-[1.25rem] bg-black/3 p-6 ring-1 ring-black/5 text-center">
                                <p class="font-heading text-2xl text-foreground mb-2">48h</p>
                                <p class="font-sans text-xs uppercase tracking-widest text-foreground/50">Tracking Activation</p>
                            </div>
                            <div class="rounded-[1.25rem] bg-black/3 p-6 ring-1 ring-black/5 text-center">
                                <p class="font-heading text-2xl text-foreground mb-2">Real-Time</p>
                                <p class="font-sans text-xs uppercase tracking-widest text-foreground/50">Live Updates</p>
                            </div>
                            <div class="rounded-[1.25rem] bg-black/3 p-6 ring-1 ring-black/5 text-center">
                                <p class="font-heading text-2xl text-foreground mb-2">12 Days</p>
                                <p class="font-sans text-xs uppercase tracking-widest text-foreground/50">Contact if Not Arrived</p>
                            </div>
                        </div>
                        <!-- Track Order CTA -->
                        <div class="rounded-[1.5rem] bg-foreground p-6 md:p-8 flex flex-col md:flex-row items-start md:items-center justify-between gap-5 md:gap-6">
                            <div>
                                <p class="font-heading text-xl text-background mb-1">Track My Order</p>
                                <p class="font-sans text-sm text-background/50 leading-relaxed">Enter your Order ID and billing email — no account needed.</p>
                            </div>
                            <?php
                            $track_page = get_page_by_path('track-my-order');
                            $track_url  = $track_page ? get_permalink($track_page->ID) : home_url('/track-my-order/');
                            ?>
                            <a href="<?php echo esc_url($track_url); ?>" class="group flex items-center justify-between md:justify-start gap-4 rounded-full bg-white/10 hover:bg-white/20 ring-1 ring-white/15 px-6 md:px-8 py-4 transition-all duration-500 w-full md:w-auto shrink-0">
                                <span class="font-sans font-medium text-background text-sm">Track Your Order</span>
                                <div class="w-7 h-7 rounded-full bg-background/10 flex items-center justify-center transition-transform duration-500 group-hover:translate-x-1">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M7 17L17 7M17 7H7M17 7V17"/>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Address Policy + Lost & Stolen -->
                <div id="address-policy" class="rounded-[2rem] bg-black/5 p-1.5 ring-1 ring-black/5 scroll-reveal">
                    <div class="rounded-[calc(2rem-0.375rem)] bg-surface p-8 md:p-12 shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)]">
                        <div class="rounded-full px-4 py-1.5 text-[10px] uppercase tracking-[0.2em] font-medium bg-black/5 text-foreground ring-1 ring-black/5 inline-block mb-6">
                            05 &mdash; Shipping Address Policy
                        </div>
                        <h2 class="font-heading text-[2rem] md:text-[2.5rem] leading-[1] tracking-[-0.03em] text-foreground mb-6">
                            Your address, your responsibility.
                        </h2>
                        <p class="font-sans text-base text-foreground/70 leading-relaxed mb-8">
                            It is the buyer's sole responsibility to provide a complete and accurate shipping address at checkout. Please double-check your address before submitting, as changes cannot be guaranteed once processing has begun.
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="rounded-[1.25rem] bg-black/3 p-6 ring-1 ring-black/5">
                                <p class="font-sans text-[10px] uppercase tracking-widest text-foreground/40 mb-3">Incorrect Address</p>
                                <p class="font-sans text-sm text-foreground/70 leading-relaxed">Goviloop is not responsible for packages delivered to an incorrect address provided by the buyer. If returned to us, we will arrange a reship at your cost, or issue a refund minus the original shipping cost.</p>
                            </div>
                            <div class="rounded-[1.25rem] bg-black/3 p-6 ring-1 ring-black/5">
                                <p class="font-sans text-[10px] uppercase tracking-widest text-foreground/40 mb-3">P.O. Boxes &amp; APO/FPO</p>
                                <p class="font-sans text-sm text-foreground/70 leading-relaxed">We are unable to ship to P.O. Boxes or Military APO/FPO addresses. A valid physical street address is required. Orders with a P.O. Box address may be delayed or canceled.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Lost & Stolen -->
                <div id="lost-stolen" class="rounded-[2rem] bg-black/5 p-1.5 ring-1 ring-black/5 scroll-reveal">
                    <div class="rounded-[calc(2rem-0.375rem)] bg-surface p-8 md:p-12 shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)]">
                        <div class="rounded-full px-4 py-1.5 text-[10px] uppercase tracking-[0.2em] font-medium bg-black/5 text-foreground ring-1 ring-black/5 inline-block mb-6">
                            06 &mdash; Lost &amp; Stolen Packages
                        </div>
                        <h2 class="font-heading text-[2rem] md:text-[2.5rem] leading-[1] tracking-[-0.03em] text-foreground mb-6">
                            We have you covered.
                        </h2>
                        <p class="font-sans text-base text-foreground/70 leading-relaxed mb-8">
                            All Goviloop orders are insured during transit. In the rare event your package is lost or significantly delayed, we will work with the carrier to resolve the issue promptly.
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                            <div class="flex items-start gap-4 rounded-[1.25rem] bg-black/3 p-5 ring-1 ring-black/5">
                                <div class="w-8 h-8 rounded-full border border-black/10 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                                <div>
                                    <p class="font-sans text-[10px] uppercase tracking-widest text-foreground/40 mb-2">Confirmed Lost</p>
                                    <p class="font-sans text-sm text-foreground/70 leading-relaxed">If a carrier confirms the package is lost and your address was correct, we will reship your order or issue a full refund.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4 rounded-[1.25rem] bg-black/3 p-5 ring-1 ring-black/5">
                                <div class="w-8 h-8 rounded-full border border-black/10 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"/></svg>
                                </div>
                                <div>
                                    <p class="font-sans text-[10px] uppercase tracking-widest text-foreground/40 mb-2">Wrong Address</p>
                                    <p class="font-sans text-sm text-foreground/70 leading-relaxed">No replacement, refund, or credit will be issued for packages sent to an invalid address provided by the buyer.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4 rounded-[1.25rem] bg-black/3 p-5 ring-1 ring-black/5">
                                <div class="w-8 h-8 rounded-full border border-black/10 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <p class="font-sans text-[10px] uppercase tracking-widest text-foreground/40 mb-2">Stolen Package</p>
                                    <p class="font-sans text-sm text-foreground/70 leading-relaxed">If tracking shows "Delivered" but the package is missing, check with neighbors and your local carrier, then contact us to file a claim.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RETURNS HEADER -->
                <div id="return-policy" class="rounded-[2rem] bg-foreground text-background p-1.5 ring-1 ring-foreground/10 scroll-reveal">
                    <div class="relative rounded-[calc(2rem-0.375rem)] bg-foreground p-8 md:p-16 overflow-hidden shadow-[inset_0_1px_1px_rgba(255,255,255,0.1)] flex flex-col md:flex-row items-start md:items-center justify-between gap-8 md:gap-12">
                        <div class="absolute -top-20 -right-20 w-96 h-96 bg-muted/10 rounded-full blur-3xl pointer-events-none"></div>
                        <div class="relative z-10 w-full md:w-2/3">
                            <div class="rounded-full px-4 py-1.5 text-[10px] uppercase tracking-[0.2em] font-medium bg-white/10 text-background ring-1 ring-white/10 inline-block mb-5 md:mb-6">
                                Part II &mdash; Returns
                            </div>
                            <h2 class="font-heading text-[2rem] md:text-[4rem] leading-[1] tracking-[-0.03em] text-background mb-3 md:mb-4">
                                Not right? <br/><span class="italic font-serif opacity-70">We will make it right.</span>
                            </h2>
                            <p class="font-sans text-background/60 text-sm md:text-base leading-relaxed max-w-md">
                                Every watch sold by Goviloop is carefully inspected before shipment. We accept returns within 30 days — quickly and without hassle.
                            </p>
                        </div>
                        <div class="relative z-10 w-full md:w-auto grid grid-cols-2 md:flex md:flex-col gap-3 md:gap-4 shrink-0">
                            <div class="rounded-[1.25rem] bg-white/10 p-4 md:p-5">
                                <p class="font-heading text-2xl md:text-3xl text-background mb-1">30 Days</p>
                                <p class="font-sans text-[10px] md:text-xs text-background/60 uppercase tracking-widest">Return Window</p>
                            </div>
                            <div class="rounded-[1.25rem] bg-white/10 p-4 md:p-5">
                                <p class="font-heading text-2xl md:text-3xl text-background mb-1">1–2 Days</p>
                                <p class="font-sans text-[10px] md:text-xs text-background/60 uppercase tracking-widest">Review Time</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Eligibility -->
                <div id="eligibility" class="rounded-[2rem] bg-black/5 p-1.5 ring-1 ring-black/5 scroll-reveal">
                    <div class="rounded-[calc(2rem-0.375rem)] bg-surface p-8 md:p-12 shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)]">
                        <div class="rounded-full px-4 py-1.5 text-[10px] uppercase tracking-[0.2em] font-medium bg-black/5 text-foreground ring-1 ring-black/5 inline-block mb-6">
                            07 &mdash; Return Eligibility
                        </div>
                        <h2 class="font-heading text-[2rem] md:text-[2.5rem] leading-[1] tracking-[-0.03em] text-foreground mb-8">
                            What we accept.
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                            <!-- Eligible -->
                            <div>
                                <p class="font-sans text-[10px] uppercase tracking-widest text-foreground/40 mb-4">Eligible for Return</p>
                                <div class="flex flex-col gap-2">
                                    <?php
                                    $eligible = [
                                        'Unworn and in unused condition (brief try-on only)',
                                        'All original tags, stickers, and protective films intact',
                                        'Original box with all accessories included',
                                        'No signs of wear, scratches, dents, or alterations',
                                        'Strap/bracelet not sized, shortened, or adjusted',
                                        'Proof of purchase included',
                                        'Return requested within 30 days of delivery',
                                    ];
                                    foreach ($eligible as $item): ?>
                                    <div class="flex items-start gap-3 rounded-[1rem] bg-black/3 p-4 ring-1 ring-black/5">
                                        <div class="w-5 h-5 rounded-full bg-foreground flex items-center justify-center shrink-0 mt-0.5">
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                                        </div>
                                        <p class="font-sans text-sm text-foreground/70 leading-relaxed"><?php echo esc_html($item); ?></p>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <!-- Non-Returnable -->
                            <div>
                                <p class="font-sans text-[10px] uppercase tracking-widest text-foreground/40 mb-4">Non-Returnable Items</p>
                                <div class="flex flex-col gap-2">
                                    <?php
                                    $non_eligible = [
                                        'Watches that have been worn, sized, or altered',
                                        'Custom, personalized, or engraved watches',
                                        'Missing original box, warranty card, or accessories',
                                        'Watches showing wear, scratches, or post-delivery damage',
                                        'Final sale items, promotional items, and gift cards',
                                        'Items returned more than 30 days after delivery',
                                    ];
                                    foreach ($non_eligible as $item): ?>
                                    <div class="flex items-start gap-3 rounded-[1rem] bg-black/3 p-4 ring-1 ring-black/5">
                                        <div class="w-5 h-5 rounded-full border border-black/15 flex items-center justify-center shrink-0 mt-0.5">
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                                        </div>
                                        <p class="font-sans text-sm text-foreground/50 leading-relaxed"><?php echo esc_html($item); ?></p>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="rounded-[1.25rem] bg-black/3 p-6 ring-1 ring-black/5">
                            <p class="font-sans text-[10px] uppercase tracking-widest text-foreground/40 mb-2">Condition Assessment</p>
                            <p class="font-sans text-sm text-foreground/60 leading-relaxed">We reserve the right to assess the condition of any returned watch. Items that do not meet our return criteria will be sent back to you at your expense, and no refund will be issued. We recommend photographing your watch before shipping it back.</p>
                        </div>
                    </div>
                </div>

                <!-- How to Return — Steps -->
                <div id="how-to-return" class="rounded-[2rem] bg-black/5 p-1.5 ring-1 ring-black/5 scroll-reveal">
                    <div class="rounded-[calc(2rem-0.375rem)] bg-surface p-8 md:p-12 shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)]">
                        <div class="rounded-full px-4 py-1.5 text-[10px] uppercase tracking-[0.2em] font-medium bg-black/5 text-foreground ring-1 ring-black/5 inline-block mb-6">
                            08 &mdash; How to Start a Return
                        </div>
                        <h2 class="font-heading text-[2rem] md:text-[2.5rem] leading-[1] tracking-[-0.03em] text-foreground mb-4">
                            Four simple steps.
                        </h2>
                        <p class="font-sans text-base text-foreground/50 leading-relaxed mb-10">
                            Do not ship any item back before receiving authorization — unauthorized returns will not be accepted.
                        </p>
                        <div class="flex flex-col gap-4">
                            <?php
                            $steps = [
                                [
                                    'num'   => '01',
                                    'title' => 'Request a Return Authorization',
                                    'body'  => 'Email info@goviloop.com within 30 days of delivery. Include your order number, the reason for the return, and clear photos of the watch and original packaging. We will review within 1–2 business days.',
                                ],
                                [
                                    'num'   => '02',
                                    'title' => 'Receive Authorization &amp; Label',
                                    'body'  => 'Once approved, we will email you a Return Merchandise Authorization (RMA) number and a prepaid shipping label with full packaging instructions. Write the RMA number clearly on the outside of the package.',
                                ],
                                [
                                    'num'   => '03',
                                    'title' => 'Pack Your Watch Securely',
                                    'body'  => 'Place the watch in its original inner box with all accessories, then pack inside a sturdy outer shipping box with adequate cushioning. Avoid placing the shipping label directly on the watch box.',
                                ],
                                [
                                    'num'   => '04',
                                    'title' => 'Ship to Our Returns Center',
                                    'body'  => 'Drop off the package at any authorized carrier location. Keep your tracking number until your refund has been confirmed. Returns Address: Goviloop — Returns Dept., 2800 Post Oak Blvd, Suite 4100, Houston, TX 77056.',
                                ],
                            ];
                            foreach ($steps as $i => $step): ?>
                            <div class="flex items-start gap-6 rounded-[1.5rem] bg-black/3 p-6 ring-1 ring-black/5" style="transition-delay: <?php echo $i * 60; ?>ms;">
                                <div class="font-heading text-[2.5rem] leading-none text-foreground/10 shrink-0 w-14 text-right"><?php echo $step['num']; ?></div>
                                <div class="pt-1">
                                    <h4 class="font-heading text-lg text-foreground mb-2"><?php echo $step['title']; ?></h4>
                                    <p class="font-sans text-sm text-foreground/60 leading-relaxed"><?php echo $step['body']; ?></p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- Defective + Damaged -->
                <div id="defective" class="rounded-[2rem] bg-black/5 p-1.5 ring-1 ring-black/5 scroll-reveal">
                    <div class="rounded-[calc(2rem-0.375rem)] bg-surface p-8 md:p-12 shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)]">
                        <div class="rounded-full px-4 py-1.5 text-[10px] uppercase tracking-[0.2em] font-medium bg-black/5 text-foreground ring-1 ring-black/5 inline-block mb-6">
                            09 &mdash; Damaged, Defective, or Incorrect Items
                        </div>
                        <h2 class="font-heading text-[2rem] md:text-[2.5rem] leading-[1] tracking-[-0.03em] text-foreground mb-6">
                            We make it right, immediately.
                        </h2>
                        <p class="font-sans text-base text-foreground/70 leading-relaxed mb-8">
                            We perform a thorough quality check on every watch before shipment. However, if your order arrives damaged, defective, or is not the item you ordered, please contact us <strong class="text-foreground">within 48 hours of delivery</strong>. Claims submitted after this window may not be eligible for resolution.
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="rounded-[1.25rem] bg-black/3 p-6 ring-1 ring-black/5">
                                <p class="font-sans text-[10px] uppercase tracking-widest text-foreground/40 mb-3">What to Include</p>
                                <p class="font-sans text-sm text-foreground/70 leading-relaxed">Email info@goviloop.com with: (1) your order number, (2) a description of the issue, and (3) clear photos of the watch, damage or defect, and outer packaging.</p>
                            </div>
                            <div class="rounded-[1.25rem] bg-black/3 p-6 ring-1 ring-black/5">
                                <p class="font-sans text-[10px] uppercase tracking-widest text-foreground/40 mb-3">Packaging Damage</p>
                                <p class="font-sans text-sm text-foreground/70 leading-relaxed">If the outer shipping box appears damaged upon delivery, photograph the packaging before opening and note the condition with the delivery driver if possible.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Exchanges -->
                <div id="exchanges" class="rounded-[2rem] bg-foreground text-background p-1.5 ring-1 ring-foreground/10 scroll-reveal">
                    <div class="relative rounded-[calc(2rem-0.375rem)] bg-foreground p-8 md:p-12 overflow-hidden shadow-[inset_0_1px_1px_rgba(255,255,255,0.1)]">
                        <div class="absolute -top-20 -right-20 w-80 h-80 bg-muted/10 rounded-full blur-3xl pointer-events-none"></div>
                        <div class="relative z-10">
                            <div class="rounded-full px-4 py-1.5 text-[10px] uppercase tracking-[0.2em] font-medium bg-white/10 text-background ring-1 ring-white/10 inline-block mb-6">
                                10 &mdash; Exchanges
                            </div>
                            <h2 class="font-heading text-[2rem] md:text-[2.5rem] leading-[1] tracking-[-0.03em] text-background mb-4">
                                Want a different model?
                            </h2>
                            <p class="font-sans text-base text-background/60 leading-relaxed mb-8 max-w-xl">
                                We do not process direct one-for-one exchanges. The fastest way to get the watch you want is a two-step process.
                            </p>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="rounded-[1.5rem] bg-white/8 p-6 ring-1 ring-white/10">
                                    <div class="font-heading text-[3rem] leading-none text-background/15 mb-4">01</div>
                                    <h4 class="font-heading text-lg text-background mb-2">Return the Original Watch</h4>
                                    <p class="font-sans text-sm text-background/60 leading-relaxed">Follow the return process above to send back your original purchase. Once approved and received, a refund will be processed.</p>
                                </div>
                                <div class="rounded-[1.5rem] bg-white/8 p-6 ring-1 ring-white/10">
                                    <div class="font-heading text-[3rem] leading-none text-background/15 mb-4">02</div>
                                    <h4 class="font-heading text-lg text-background mb-2">Place a New Order</h4>
                                    <p class="font-sans text-sm text-background/60 leading-relaxed">Place a fresh order on goviloop.com for the watch you want. This ensures the item is reserved and shipped as soon as possible.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Refunds -->
                <div id="refunds" class="rounded-[2rem] bg-black/5 p-1.5 ring-1 ring-black/5 scroll-reveal">
                    <div class="rounded-[calc(2rem-0.375rem)] bg-surface p-8 md:p-12 shadow-[inset_0_1px_1px_rgba(255,255,255,0.8)]">
                        <div class="rounded-full px-4 py-1.5 text-[10px] uppercase tracking-[0.2em] font-medium bg-black/5 text-foreground ring-1 ring-black/5 inline-block mb-6">
                            11 &mdash; Refunds
                        </div>
                        <h2 class="font-heading text-[2rem] md:text-[2.5rem] leading-[1] tracking-[-0.03em] text-foreground mb-4">
                            Your refund, step by step.
                        </h2>
                        <p class="font-sans text-base text-foreground/50 leading-relaxed mb-10">
                            Once we receive and inspect your returned watch, we will process your refund promptly.
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                            <?php
                            $refund_steps = [
                                ['num' => '01', 'title' => 'Inspection Upon Arrival', 'body' => 'We inspect the returned watch within 1–2 business days. You will be notified by email of the outcome.'],
                                ['num' => '02', 'title' => 'Refund Processing', 'body' => 'If approved, your refund is issued to your original payment method within 10 business days, minus applicable return shipping costs.'],
                                ['num' => '03', 'title' => 'Refund Not Received?', 'body' => 'Timelines vary by bank. If more than 15 business days have passed since approval, contact us at info@goviloop.com with your order number.'],
                            ];
                            foreach ($refund_steps as $step): ?>
                            <div class="rounded-[1.5rem] bg-black/3 p-6 ring-1 ring-black/5 flex flex-col gap-4">
                                <div class="font-heading text-[3rem] leading-none text-foreground/10"><?php echo $step['num']; ?></div>
                                <div>
                                    <h4 class="font-heading text-lg text-foreground mb-2"><?php echo $step['title']; ?></h4>
                                    <p class="font-sans text-sm text-foreground/60 leading-relaxed"><?php echo $step['body']; ?></p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="rounded-[1.25rem] bg-black/3 p-6 ring-1 ring-black/5">
                            <p class="font-sans text-[10px] uppercase tracking-widest text-foreground/40 mb-2">Partial Refunds</p>
                            <p class="font-sans text-sm text-foreground/60 leading-relaxed">A partial refund may be issued if the returned watch shows signs of use, is missing accessories, or otherwise does not fully meet our return conditions. We will notify you of any deduction before processing.</p>
                        </div>
                    </div>
                </div>

                <!-- Contact CTA -->
                <div id="contact" class="rounded-[2rem] bg-foreground text-background p-1.5 ring-1 ring-foreground/10 scroll-reveal">
                    <div class="relative rounded-[calc(2rem-0.375rem)] bg-foreground p-8 md:p-16 overflow-hidden shadow-[inset_0_1px_1px_rgba(255,255,255,0.1)] flex flex-col md:flex-row items-start md:items-center justify-between gap-8 md:gap-12 z-10">
                        <div class="absolute -top-20 -right-20 w-80 h-80 bg-muted/15 rounded-full blur-3xl pointer-events-none"></div>
                        <div class="relative z-10 w-full md:w-1/2">
                            <div class="rounded-full px-4 py-1.5 text-[10px] uppercase tracking-[0.2em] font-medium bg-white/10 text-background ring-1 ring-white/10 inline-block mb-5 md:mb-6">
                                Questions?
                            </div>
                            <h2 class="font-heading text-[2rem] md:text-[3.5rem] leading-[1.05] tracking-[-0.02em] text-background mb-3 md:mb-4">
                                We are here <br/> to help.
                            </h2>
                            <p class="font-sans text-background/70 text-sm md:text-base leading-relaxed">
                                Our support team is available Monday – Friday and responds within 1 business day. Don't hesitate to reach out.
                            </p>
                        </div>
                        <div class="relative z-10 w-full md:w-auto flex flex-col gap-3 md:gap-4 shrink-0">
                            <a href="mailto:info@goviloop.com" class="group flex items-center justify-between gap-4 rounded-full bg-white/10 hover:bg-white/20 ring-1 ring-white/15 px-6 md:px-8 py-4 md:py-5 transition-all duration-500">
                                <span class="font-sans font-medium text-background text-sm md:text-base truncate">info@goviloop.com</span>
                                <div class="w-8 h-8 rounded-full bg-background/10 flex items-center justify-center shrink-0 transition-transform duration-500 group-hover:translate-x-1">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M7 17L17 7M17 7H7M17 7V17"/>
                                    </svg>
                                </div>
                            </a>
                            <div class="rounded-[1.25rem] bg-white/5 ring-1 ring-white/10 px-6 md:px-8 py-4 md:py-5">
                                <p class="font-sans text-xs text-background/40 uppercase tracking-widest mb-1">Address</p>
                                <p class="font-sans text-sm text-background/80">2800 Post Oak Blvd, Suite 4100<br/>Houston, TX 77056, United States</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- CLOSING STATEMENT -->
    <section class="w-full py-20 md:py-48 flex items-center justify-center text-center px-4 scroll-reveal">
        <h2 class="font-heading text-[3.5rem] md:text-[6rem] lg:text-[8rem] leading-[0.9] tracking-[-0.04em] text-foreground/10 hover:text-foreground transition-colors duration-[1.5s] ease-fluid cursor-default">
            Delivered with <br/> <span class="italic font-serif">care.</span>
        </h2>
    </section>

</main>

<style>
@keyframes fadeUp {
    from { opacity: 0; transform: translateY(4rem); filter: blur(8px); }
    to   { opacity: 1; transform: translateY(0);    filter: blur(0);  }
}
.animate-fade-up {
    animation: fadeUp 1s cubic-bezier(0.32, 0.72, 0, 1) forwards;
    opacity: 0;
}
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
.toc-link.is-active {
    background: rgba(0,0,0,0.05);
    color: var(--color-foreground, #111);
    font-weight: 500;
}
/* Hide scrollbar for mobile TOC strip */
.scrollbar-none::-webkit-scrollbar { display: none; }
.scrollbar-none { -ms-overflow-style: none; scrollbar-width: none; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { root: null, rootMargin: '0px', threshold: 0.1 });

    document.querySelectorAll('.scroll-reveal').forEach(el => observer.observe(el));

    const sections = document.querySelectorAll('[id]');
    const tocLinks = document.querySelectorAll('.toc-link');

    const tocObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                tocLinks.forEach(l => l.classList.remove('is-active'));
                const active = document.querySelector('.toc-link[href="#' + entry.target.id + '"]');
                if (active) active.classList.add('is-active');
            }
        });
    }, { root: null, rootMargin: '-20% 0px -70% 0px', threshold: 0 });

    sections.forEach(s => tocObserver.observe(s));
});
</script>
