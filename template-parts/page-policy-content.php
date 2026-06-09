<?php
/**
 * Shared Template Part: Shipping Policy / Return & Refund Policy
 * Brand: UK Official Store
 * Description: Clear, GMC-safe shipping, return, and refund policy page.
 */

$brand_name = 'UK Official Store';
$support_email = 'support@ukofficialstore.com';
$business_hours = 'Monday-Friday, 9:00 AM-6:00 PM PST';
$policy_type = isset($policy_type) ? $policy_type : 'shipping';
$is_shipping = 'shipping' === $policy_type;
?>

<div class="bg-[#f8fafc] text-navy">
    <!-- Hero Section -->
    <section class="relative bg-navy py-20 md:py-28 overflow-hidden text-white">
        <div class="absolute inset-0 z-0">
            <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue/20 rounded-full blur-[120px] -mr-64 -mt-64"></div>
            <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-lime/10 rounded-full blur-[100px] -ml-48 -mb-48"></div>
            <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 40px 40px;"></div>
        </div>

        <div class="mx-auto max-w-7xl px-6 relative z-10">
            <div class="max-w-4xl">
                <nav class="flex items-center gap-2 mb-8 text-blue font-bold uppercase tracking-[0.2em] text-xs">
                    <a href="/" class="hover:text-lime transition-colors">Home</a>
                    <span class="text-white/30">/</span>
                    <span>Customer Care</span>
                </nav>
                <h1 class="text-5xl md:text-6xl font-heading font-black mb-6 leading-[1.1] tracking-tight">
                    <?php echo $is_shipping ? 'Shipping <span class="text-blue">Policy.</span>' : 'Return <span class="text-blue">&amp;</span> Refund Policy.'; ?>
                </h1>
                <p class="text-lg md:text-xl text-gray-400 leading-relaxed font-light max-w-3xl">
                    <?php echo $is_shipping
                        ? 'Clear processing, delivery, and tracking information for ' . esc_html($brand_name) . ' activewear orders.'
                        : 'Clear return, exchange, and refund information for ' . esc_html($brand_name) . ' activewear orders.'; ?>
                </p>
                <div class="mt-10 grid sm:grid-cols-2 gap-4 max-w-4xl">
                    <?php if ($is_shipping) : ?>
                    <div class="bg-white/10 border border-white/10 rounded-2xl p-5">
                        <p class="text-2xl font-black text-white">2-4</p>
                        <p class="text-xs font-bold uppercase tracking-widest text-gray-400 mt-2 leading-snug">Business day processing</p>
                    </div>
                    <div class="bg-white/10 border border-white/10 rounded-2xl p-5">
                        <p class="text-2xl font-black text-white">5-10</p>
                        <p class="text-xs font-bold uppercase tracking-widest text-gray-400 mt-2 leading-snug">US business day transit</p>
                    </div>
                    <?php else : ?>
                    <div class="bg-white/10 border border-white/10 rounded-2xl p-5">
                        <p class="text-2xl font-black text-white">30</p>
                        <p class="text-xs font-bold uppercase tracking-widest text-gray-400 mt-2 leading-snug">Day return window</p>
                    </div>
                    <div class="bg-white/10 border border-white/10 rounded-2xl p-5">
                        <p class="text-2xl font-black text-white">5-10</p>
                        <p class="text-xs font-bold uppercase tracking-widest text-gray-400 mt-2 leading-snug">Business day refund processing</p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content with Sticky Sidebar -->
    <section class="py-16 md:py-24">
        <div class="mx-auto max-w-7xl px-6">
            <div class="flex flex-col lg:flex-row gap-12 lg:gap-20">

                <!-- Sticky Navigation Sidebar -->
                <aside class="lg:w-1/4">
                    <div class="lg:sticky lg:top-32 space-y-1">
                        <p class="text-[10px] font-black uppercase tracking-[0.3em] text-navy/30 mb-5 ml-4">Policy Sections</p>
                        <a href="#overview" class="group flex items-center justify-between p-3 rounded-xl bg-white border border-border hover:border-blue hover:shadow-lg transition-all duration-300">
                            <span class="font-bold text-sm">Overview</span>
                            <svg class="w-4 h-4 text-blue transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                        <?php if ($is_shipping) : ?>
                        <a href="#shipping" class="group flex items-center justify-between p-3 rounded-xl bg-white border border-border hover:border-blue hover:shadow-lg transition-all duration-300">
                            <span class="font-bold text-sm">Shipping Policy</span>
                            <svg class="w-4 h-4 text-blue transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                        <a href="#delivery" class="group flex items-center justify-between p-3 rounded-xl bg-white border border-border hover:border-blue hover:shadow-lg transition-all duration-300">
                            <span class="font-bold text-sm">Delivery & Tracking</span>
                            <svg class="w-4 h-4 text-blue transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                        <?php else : ?>
                        <a href="#returns" class="group flex items-center justify-between p-3 rounded-xl bg-white border border-border hover:border-blue hover:shadow-lg transition-all duration-300">
                            <span class="font-bold text-sm">Returns</span>
                            <svg class="w-4 h-4 text-blue transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                        <a href="#refunds" class="group flex items-center justify-between p-3 rounded-xl bg-white border border-border hover:border-blue hover:shadow-lg transition-all duration-300">
                            <span class="font-bold text-sm">Refunds & Exchanges</span>
                            <svg class="w-4 h-4 text-blue transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                        <a href="#process" class="group flex items-center justify-between p-3 rounded-xl bg-white border border-border hover:border-blue hover:shadow-lg transition-all duration-300">
                            <span class="font-bold text-sm">How to Return</span>
                            <svg class="w-4 h-4 text-blue transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                        <?php endif; ?>

                        <div class="mt-8 p-6 bg-navy rounded-2xl text-white">
                            <p class="text-[10px] font-black uppercase tracking-[0.25em] text-blue mb-3">Need help?</p>
                            <p class="text-sm text-gray-300 leading-relaxed mb-5">For the fastest support, include your order number and the email used at checkout.</p>
                            <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-block w-full py-3 bg-blue text-white text-center text-xs font-bold rounded-xl hover:bg-white hover:text-navy transition-all">Email Support</a>
                        </div>
                    </div>
                </aside>

                <!-- Content Area -->
                <div class="lg:w-3/4">
                    <div class="prose prose-blue max-w-none text-foreground-muted ship-policy">

                        <!-- Overview Section -->
                        <div id="overview" class="scroll-mt-32 mb-16 policy-section">
                            <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-blue/10 text-blue font-bold text-xs uppercase tracking-widest mb-5 policy-label">
                                Policy Overview
                            </div>
                            <h2 class="text-3xl md:text-4xl font-heading font-black text-navy mb-5 leading-tight">
                                <?php echo $is_shipping ? 'Transparent order and delivery rules.' : 'Transparent return and refund rules.'; ?>
                            </h2>
                            <p class="lead text-lg text-navy font-medium">
                                <?php echo $is_shipping
                                    ? 'This Shipping Policy explains how ' . esc_html($brand_name) . ' processes activewear orders, estimates delivery times, and handles tracking.'
                                    : 'This Return & Refund Policy explains how ' . esc_html($brand_name) . ' reviews return, exchange, and refund requests.'; ?>
                            </p>
                            <p>
                                <?php echo $is_shipping
                                    ? 'We ship activewear essentials including dry-fit style t-shirts, tracksuits, tank tops, training sets, and activewear bottoms. Available methods, costs, and delivery estimates are shown at checkout.'
                                    : 'Because activewear items are worn close to the body, return eligibility depends on the item being clean, unused, and in original condition.'; ?>
                            </p>
                            <div class="grid md:grid-cols-2 gap-5 mt-8 not-prose">
                                <?php if ($is_shipping) : ?>
                                <div class="bg-white rounded-2xl border border-border p-5 summary-card">
                                    <p class="text-xl font-black text-navy mb-2">Processing</p>
                                    <p class="text-sm text-foreground-muted leading-relaxed">Orders are prepared within 1-3 business days after payment confirmation.</p>
                                </div>
                                <div class="bg-white rounded-2xl border border-border p-5 summary-card">
                                    <p class="text-xl font-black text-navy mb-2">Tracking</p>
                                    <p class="text-sm text-foreground-muted leading-relaxed">A tracking email is sent once your order has been dispatched.</p>
                                </div>
                                <?php else : ?>
                                <div class="bg-white rounded-2xl border border-border p-5 summary-card">
                                    <p class="text-xl font-black text-navy mb-2">Returns</p>
                                    <p class="text-sm text-foreground-muted leading-relaxed">Return requests may be submitted within 30 days of delivery.</p>
                                </div>
                                <div class="bg-white rounded-2xl border border-border p-5 summary-card">
                                    <p class="text-xl font-black text-navy mb-2">Refunds</p>
                                    <p class="text-sm text-foreground-muted leading-relaxed">Approved refunds are issued to the original payment method.</p>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <?php if ($is_shipping) : ?>
                        <!-- Shipping Policy Section -->
                        <div id="shipping" class="scroll-mt-32 mb-16 policy-section">
                            <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-blue/10 text-blue font-bold text-xs uppercase tracking-widest mb-5 policy-label">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
                                Shipping Policy
                            </div>
                            <h2 class="text-3xl md:text-4xl font-heading font-black text-navy mb-5 leading-tight">Order processing and dispatch.</h2>

                            <div class="bg-white p-6 md:p-8 rounded-2xl border border-border shadow-sm not-prose mb-8">
                                <div class="grid md:grid-cols-2 gap-8">
                                    <div>
                                        <h3 class="text-lg font-bold text-navy mb-3">Processing time</h3>
                                        <p class="text-foreground-muted leading-relaxed">
                                            Orders are typically processed within <strong class="text-blue">1-3 business days</strong> after payment is confirmed. Processing takes place during our business hours: <?php echo esc_html($business_hours); ?>.
                                        </p>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-bold text-navy mb-3">Business days</h3>
                                        <p class="text-foreground-muted leading-relaxed">
                                            Business days do not include Saturdays, Sundays, or public holidays. Orders placed after business hours begin processing on the next business day.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <h3 class="text-2xl font-heading font-black text-navy mb-4">Shipping coverage and rates</h3>
                            <p>
                                We ship exclusively within the United States. Standard U.S. shipping is free for every order with no minimum purchase requirement.
                            </p>
                            <p>
                                If optional upgraded shipping is available for your destination, its exact cost will be displayed at checkout before payment. If a destination or carrier limitation prevents delivery, the order will not be available for that address.
                            </p>

                            <h3 class="text-2xl font-heading font-black text-navy mb-4 mt-8">Order changes and cancellations</h3>
                            <p>
                                If you need to correct a shipping address, size, color, or order detail, contact us as soon as possible at <a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>. We will do our best to help before dispatch, but we cannot guarantee changes once an order has entered processing or has shipped.
                            </p>
                            <p>
                                Once a package has been handed to the carrier, we cannot redirect it or cancel the shipment. Please review your shipping address carefully before placing an order.
                            </p>
                        </div>

                        <!-- Delivery Times Section -->
                        <div id="delivery" class="scroll-mt-32 mb-16 policy-section">
                            <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-lime/20 text-navy font-bold text-xs uppercase tracking-widest mb-5 policy-label">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                Delivery & Tracking
                            </div>
                            <h2 class="text-3xl md:text-4xl font-heading font-black text-navy mb-5 leading-tight">Delivery estimates and tracking updates.</h2>

                            <div class="bg-navy rounded-2xl p-6 md:p-10 text-white relative overflow-hidden not-prose mb-8">
                                <div class="absolute top-0 right-0 w-64 h-64 bg-blue/10 rounded-full blur-[80px] -mr-32 -mt-32"></div>
                                <div class="relative z-10 grid md:grid-cols-2 gap-8">
                                    <div>
                                        <p class="text-blue font-bold uppercase tracking-widest text-xs mb-3">Standard US Shipping</p>
                                        <div class="text-4xl font-black mb-4">5-7 <span class="text-xl font-light text-gray-400">Business Days</span></div>
                                        <p class="text-gray-400 leading-relaxed">
                                            Standard U.S. transit usually takes 5-7 business days after dispatch, for an estimated total delivery time of 6-10 business days from purchase.
                                        </p>
                                    </div>
                                    <div class="space-y-4">
                                        <div class="flex items-start gap-4">
                                            <div class="w-6 h-6 rounded-full bg-blue/20 flex items-center justify-center shrink-0 mt-1">
                                                <svg class="w-3 h-3 text-blue" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                            </div>
                                            <p class="text-sm text-gray-300">Tracking details are emailed after the order ships.</p>
                                        </div>
                                        <div class="flex items-start gap-4">
                                            <div class="w-6 h-6 rounded-full bg-blue/20 flex items-center justify-center shrink-0 mt-1">
                                                <svg class="w-3 h-3 text-blue" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                            </div>
                                            <p class="text-sm text-gray-300">You can also check status on our Track Order page.</p>
                                        </div>
                                        <div class="flex items-start gap-4">
                                            <div class="w-6 h-6 rounded-full bg-blue/20 flex items-center justify-center shrink-0 mt-1">
                                                <svg class="w-3 h-3 text-blue" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                            </div>
                                            <p class="text-sm text-gray-300">Delivery estimates are not guaranteed arrival dates.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h3 class="text-2xl font-heading font-black text-navy mb-4">Tracking delays</h3>
                            <p>
                                Tracking numbers may take time to show movement after the carrier receives shipment information. If tracking stops updating or your order is delayed, contact us immediately and we will review the shipment status with the carrier.
                            </p>

                            <h3 class="text-2xl font-heading font-black text-navy mb-4 mt-8">Delivered but not received</h3>
                            <p>
                                If tracking shows delivered but you cannot locate your package, please check around the delivery area, with household members, neighbors, building staff, or your local carrier office, then contact us immediately with your order number so we can help review the issue.
                            </p>

                            <h3 class="text-2xl font-heading font-black text-navy mb-4 mt-8">Damaged or incorrect items</h3>
                            <p>
                                If your activewear arrives damaged, defective, or different from what you ordered, email us within 7 days of delivery. Include your order number, a short description of the issue, and clear photos of the item, packaging, size label, and any damage. We will review the case and provide the next step.
                            </p>
                        </div>

                        <?php else : ?>
                        <!-- Return Policy Section -->
                        <div id="returns" class="scroll-mt-32 mb-16 policy-section">
                            <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-blue/10 text-blue font-bold text-xs uppercase tracking-widest mb-5 policy-label">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 15v-1a4 4 0 00-4-4H8m0 0l3 3m-3-3l3-3m9 14V5a2 2 0 00-2-2H6a2 2 0 00-2 2v16l4-2 4 2 4-2 4 2z"></path></svg>
                                Return Policy
                            </div>
                            <h2 class="text-3xl md:text-4xl font-heading font-black text-navy mb-5 leading-tight">30-day returns for eligible items.</h2>

                            <div class="bg-white border border-navy/20 rounded-2xl p-6 md:p-8 relative overflow-hidden not-prose mb-8">
                                <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-lime/10 rounded-full"></div>
                                <div class="grid md:grid-cols-3 gap-6 text-center relative z-10">
                                    <div>
                                        <div class="text-3xl font-black text-navy mb-2">30</div>
                                        <p class="text-xs font-bold uppercase tracking-widest text-blue">Days from delivery</p>
                                    </div>
                                    <div>
                                        <div class="text-3xl font-black text-navy mb-2">Unused</div>
                                        <p class="text-xs font-bold uppercase tracking-widest text-blue">Original condition</p>
                                    </div>
                                    <div>
                                        <div class="text-3xl font-black text-navy mb-2">Email</div>
                                        <p class="text-xs font-bold uppercase tracking-widest text-blue">Approval required</p>
                                    </div>
                                </div>
                            </div>

                            <p>
                                Customers may request a return within <strong>30 days of delivery</strong>. To be eligible, items must be unworn, unwashed, undamaged, free from stains or odors, and in original condition with tags and original packaging where applicable.
                            </p>
                            <p>
                                You may carefully try on apparel indoors to check fit. For hygiene and quality reasons, we cannot accept activewear that has been used for workouts, training, outdoor wear, washing, or extended use.
                            </p>

                            <h3 class="text-2xl font-heading font-black text-navy mb-4 mt-8">Items not eligible for return</h3>
                            <ul>
                                <li>Items returned after the 30-day return window.</li>
                                <li>Items that have been worn, washed, damaged, altered, or used for training.</li>
                                <li>Items with stains, odors, deodorant marks, makeup marks, lint, hair, or signs of wear.</li>
                                <li>Items missing tags, labels, accessories, or original packaging where applicable.</li>
                                <li>Final sale, clearance, or promotional items marked as non-returnable at the time of purchase.</li>
                                <li>Gift cards or store credit, where offered.</li>
                            </ul>

                            <h3 class="text-2xl font-heading font-black text-navy mb-4 mt-8">Return shipping responsibility</h3>
                            <p>
                                Unless the item arrived damaged, defective, or incorrect, customers are responsible for return shipping costs. We recommend using a trackable shipping service because we cannot confirm or process a return until it has been received and inspected.
                            </p>
                            <p>
                                Original shipping charges are non-refundable unless the return is due to our error, such as sending the wrong item or a verified defective item.
                            </p>
                        </div>

                        <!-- Refunds Section -->
                        <div id="refunds" class="scroll-mt-32 mb-16 policy-section">
                            <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-lime/20 text-navy font-bold text-xs uppercase tracking-widest mb-5 policy-label">
                                Refunds & Exchanges
                            </div>
                            <h2 class="text-3xl md:text-4xl font-heading font-black text-navy mb-5 leading-tight">Refund review after inspection.</h2>

                            <h3 class="text-2xl font-heading font-black text-navy mb-4">Refund timing</h3>
                            <p>
                                After we receive your returned item, our team will inspect it to confirm eligibility. If approved, your refund will be issued to the original payment method. Refund processing typically takes 5-10 business days after approval, depending on your bank or payment provider.
                            </p>
                            <p>
                                If a returned item does not meet the eligibility requirements, we may decline the refund. In that case, our support team will contact you with the available options.
                            </p>

                            <h3 class="text-2xl font-heading font-black text-navy mb-4 mt-8">Exchanges</h3>
                            <p>
                                Exchanges depend on stock availability. If you need a different size or color, contact us before sending your item back. If the requested replacement is not available, we may recommend returning the eligible item for a refund and placing a new order.
                            </p>

                            <h3 class="text-2xl font-heading font-black text-navy mb-4 mt-8">Partial refunds</h3>
                            <p>
                                Partial refunds may apply if an item is returned with missing packaging, missing accessories, or condition issues that reduce resale eligibility, when allowed by applicable policy and law.
                            </p>
                        </div>

                        <!-- Process Section -->
                        <div id="process" class="scroll-mt-32 mb-16 policy-section policy-section-last">
                            <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-navy text-white font-bold text-xs uppercase tracking-widest mb-5 policy-label">
                                Return Steps
                            </div>
                            <h2 class="text-3xl md:text-4xl font-heading font-black text-navy mb-8 leading-tight">How to start a return.</h2>

                            <div class="space-y-4 not-prose">
                                <div class="group flex gap-5 md:gap-6 p-5 md:p-6 rounded-2xl bg-white border border-border hover:border-blue hover:shadow-xl transition-all duration-300">
                                    <div class="w-12 h-12 rounded-full bg-navy text-white flex items-center justify-center font-black shrink-0 group-hover:bg-blue transition-colors">1</div>
                                    <div>
                                        <h4 class="font-bold text-navy mb-2">Email support</h4>
                                        <p class="text-foreground-muted leading-relaxed">Contact <a href="mailto:<?php echo esc_attr($support_email); ?>" class="text-blue font-bold hover:underline"><?php echo esc_html($support_email); ?></a> within 30 days of delivery. Include your order number, item name, reason for return, and photos if the item is damaged or incorrect.</p>
                                    </div>
                                </div>
                                <div class="group flex gap-5 md:gap-6 p-5 md:p-6 rounded-2xl bg-white border border-border hover:border-blue hover:shadow-xl transition-all duration-300">
                                    <div class="w-12 h-12 rounded-full bg-navy text-white flex items-center justify-center font-black shrink-0 group-hover:bg-blue transition-colors">2</div>
                                    <div>
                                        <h4 class="font-bold text-navy mb-2">Wait for return instructions</h4>
                                        <p class="text-foreground-muted leading-relaxed">Our team will review your request during business hours and provide return instructions if the item appears eligible. Please do not send items back before receiving instructions.</p>
                                    </div>
                                </div>
                                <div class="group flex gap-5 md:gap-6 p-5 md:p-6 rounded-2xl bg-white border border-border hover:border-blue hover:shadow-xl transition-all duration-300">
                                    <div class="w-12 h-12 rounded-full bg-navy text-white flex items-center justify-center font-black shrink-0 group-hover:bg-blue transition-colors">3</div>
                                    <div>
                                        <h4 class="font-bold text-navy mb-2">Ship the item back</h4>
                                        <p class="text-foreground-muted leading-relaxed">Pack the item securely in its original packaging where possible. Use a trackable service and keep your shipping receipt until your return has been processed.</p>
                                    </div>
                                </div>
                                <div class="group flex gap-5 md:gap-6 p-5 md:p-6 rounded-2xl bg-white border border-border hover:border-blue hover:shadow-xl transition-all duration-300">
                                    <div class="w-12 h-12 rounded-full bg-navy text-white flex items-center justify-center font-black shrink-0 group-hover:bg-blue transition-colors">4</div>
                                    <div>
                                        <h4 class="font-bold text-navy mb-2">Inspection and refund decision</h4>
                                        <p class="text-foreground-muted leading-relaxed">Once received, the item will be inspected. Approved refunds are issued to the original payment method, usually within 5-10 business days after approval.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php endif; ?>

                        <div class="mt-14 pt-8 border-t border-border flex flex-col sm:flex-row items-center justify-between gap-6">
                            <p class="text-sm font-bold text-navy/40 uppercase tracking-widest">Last Updated: June 5, 2026</p>
                            <div class="flex gap-4">
                                <a href="/privacy-policy/" class="text-sm font-bold text-blue hover:underline">Privacy Policy</a>
                                <span class="text-border">|</span>
                                <a href="/terms-conditions/" class="text-sm font-bold text-blue hover:underline">Terms & Conditions</a>
                                <span class="text-border">|</span>
                                <a href="/faq/" class="text-sm font-bold text-blue hover:underline">FAQ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Support CTA Section -->
    <section class="py-20 md:py-32 bg-navy relative overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-full bg-[radial-gradient(circle,rgba(59,130,246,0.3)_0%,transparent_70%)]"></div>
        </div>
        <div class="mx-auto max-w-5xl px-6 relative z-10 text-center">
            <h2 class="text-4xl md:text-6xl font-heading font-black text-white mb-8">Still have questions?</h2>
            <p class="text-xl text-gray-400 mb-12 max-w-2xl mx-auto">
                Contact our support team for help with <?php echo $is_shipping ? 'shipping or tracking' : 'returns, exchanges, or refund status'; ?>. Please include your order number for faster assistance.
            </p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center">
                <a href="mailto:<?php echo esc_attr($support_email); ?>" class="px-12 py-5 bg-blue hover:bg-white hover:text-navy text-white font-bold rounded-2xl transition-all duration-300 shadow-lg shadow-blue/20">
                    Email Support
                </a>
                <a href="/contact-us/" class="px-12 py-5 border-2 border-white/20 hover:border-white text-white font-bold rounded-2xl transition-all duration-300">
                    Contact Us
                </a>
                <?php if ($is_shipping) : ?>
                <a href="/track-order/" class="px-12 py-5 border-2 border-white/20 hover:border-white text-white font-bold rounded-2xl transition-all duration-300">
                    Track Order
                </a>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>

<style>
    html {
        scroll-behavior: smooth;
    }

    .ship-policy {
        color: #4b5563;
        font-size: 16px;
        line-height: 1.78;
    }

    .ship-policy .policy-section {
        padding-bottom: 3.5rem;
        border-bottom: 1px solid #e5e7eb;
    }

    .ship-policy .policy-section-last {
        padding-bottom: 0;
        border-bottom: 0;
    }

    .ship-policy .policy-label {
        line-height: 1;
    }

    .ship-policy p {
        margin-top: 0;
        margin-bottom: 1rem;
    }

    .ship-policy p:last-child {
        margin-bottom: 0;
    }

    .ship-policy .lead {
        line-height: 1.65;
        margin-bottom: 1rem;
    }

    .ship-policy h2,
    .ship-policy h3,
    .ship-policy h4 {
        letter-spacing: 0;
    }

    .ship-policy h3 {
        line-height: 1.25;
    }

    .ship-policy a {
        color: #2563eb;
        font-weight: 700;
        text-decoration: none;
    }

    .ship-policy a:hover {
        text-decoration: underline;
    }

    .ship-policy ul {
        display: grid;
        gap: 0.7rem;
        margin: 0.75rem 0 0;
        padding: 0;
        list-style: none;
    }

    .ship-policy li {
        position: relative;
        padding-left: 1.45rem;
        line-height: 1.65;
    }

    .ship-policy li::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0.72em;
        width: 0.45rem;
        height: 0.45rem;
        border-radius: 999px;
        background: #2563eb;
    }

    .ship-policy .summary-card {
        box-shadow: 0 12px 28px rgba(11, 31, 51, 0.04);
    }

    @media (max-width: 767px) {
        .ship-policy {
            font-size: 15px;
            line-height: 1.72;
        }

        .ship-policy .policy-section {
            padding-bottom: 2.5rem;
        }

        .ship-policy .policy-label {
            margin-bottom: 1rem;
        }
    }
</style>
