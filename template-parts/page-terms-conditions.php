<?php
/**
 * Template Part: Terms & Conditions Page
 * Brand: UK Official Store
 * Description: Clear, GMC-aware terms and conditions for activewear ecommerce.
 */

$brand_name = 'UK Official Store';
$support_email = 'support@ukofficialstore.com';
$business_hours = 'Monday - Friday, 9:00 AM - 6:00 PM EST';
$last_updated = 'May 18, 2026';
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
                    <span>Legal</span>
                </nav>
                <h1 class="text-5xl md:text-6xl font-heading font-black mb-6 leading-[1.1] tracking-tight">
                    Terms <span class="text-blue">&</span> Conditions.
                </h1>
                <p class="text-lg md:text-xl text-gray-400 leading-relaxed font-light max-w-3xl">
                    Clear terms for browsing, purchasing, payment, shipping, returns, and customer support at <?php echo esc_html($brand_name); ?>.
                </p>
                <div class="mt-10 grid sm:grid-cols-3 gap-4 max-w-4xl">
                    <div class="bg-white/10 border border-white/10 rounded-2xl p-5">
                        <p class="text-2xl font-black text-white">Clear</p>
                        <p class="text-xs font-bold uppercase tracking-widest text-gray-400 mt-2 leading-snug">Purchase terms</p>
                    </div>
                    <div class="bg-white/10 border border-white/10 rounded-2xl p-5">
                        <p class="text-2xl font-black text-white">30</p>
                        <p class="text-xs font-bold uppercase tracking-widest text-gray-400 mt-2 leading-snug">Day return reference</p>
                    </div>
                    <div class="bg-white/10 border border-white/10 rounded-2xl p-5">
                        <p class="text-2xl font-black text-white">SSL</p>
                        <p class="text-xs font-bold uppercase tracking-widest text-gray-400 mt-2 leading-snug">Secure checkout</p>
                    </div>
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
                        <p class="text-[10px] font-black uppercase tracking-[0.3em] text-navy/30 mb-5 ml-4">Terms Index</p>
                        <a href="#overview" class="group flex items-center justify-between p-3 rounded-xl bg-white border border-border hover:border-blue hover:shadow-lg transition-all duration-300">
                            <span class="font-bold text-sm">Overview</span>
                            <svg class="w-4 h-4 text-blue transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                        <a href="#store" class="group flex items-center justify-between p-3 rounded-xl bg-white border border-border hover:border-blue hover:shadow-lg transition-all duration-300">
                            <span class="font-bold text-sm">Store Use</span>
                            <svg class="w-4 h-4 text-blue transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                        <a href="#products" class="group flex items-center justify-between p-3 rounded-xl bg-white border border-border hover:border-blue hover:shadow-lg transition-all duration-300">
                            <span class="font-bold text-sm">Products & Fit</span>
                            <svg class="w-4 h-4 text-blue transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                        <a href="#pricing" class="group flex items-center justify-between p-3 rounded-xl bg-white border border-border hover:border-blue hover:shadow-lg transition-all duration-300">
                            <span class="font-bold text-sm">Pricing & Promotions</span>
                            <svg class="w-4 h-4 text-blue transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                        <a href="#orders" class="group flex items-center justify-between p-3 rounded-xl bg-white border border-border hover:border-blue hover:shadow-lg transition-all duration-300">
                            <span class="font-bold text-sm">Orders & Payment</span>
                            <svg class="w-4 h-4 text-blue transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                        <a href="#shipping" class="group flex items-center justify-between p-3 rounded-xl bg-white border border-border hover:border-blue hover:shadow-lg transition-all duration-300">
                            <span class="font-bold text-sm">Shipping & Returns</span>
                            <svg class="w-4 h-4 text-blue transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                        <a href="#responsibility" class="group flex items-center justify-between p-3 rounded-xl bg-white border border-border hover:border-blue hover:shadow-lg transition-all duration-300">
                            <span class="font-bold text-sm">Responsibility</span>
                            <svg class="w-4 h-4 text-blue transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                        <a href="#contact" class="group flex items-center justify-between p-3 rounded-xl bg-white border border-border hover:border-blue hover:shadow-lg transition-all duration-300">
                            <span class="font-bold text-sm">Contact</span>
                            <svg class="w-4 h-4 text-blue transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>

                        <div class="mt-8 p-6 bg-navy rounded-2xl text-white">
                            <p class="text-[10px] font-black uppercase tracking-[0.25em] text-blue mb-3">Need help?</p>
                            <p class="text-sm text-gray-300 leading-relaxed mb-5">For order, payment, policy, or account questions, contact support with your order number if available.</p>
                            <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-block w-full py-3 bg-blue text-white text-center text-xs font-bold rounded-xl hover:bg-white hover:text-navy transition-all">Email Support</a>
                        </div>
                    </div>
                </aside>

                <!-- Content Area -->
                <div class="lg:w-3/4">
                    <div class="prose prose-blue max-w-none text-foreground-muted terms-policy">

                        <!-- Overview Section -->
                        <div id="overview" class="scroll-mt-32 mb-16 policy-section">
                            <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-blue/10 text-blue font-bold text-xs uppercase tracking-widest mb-5 policy-label">
                                Terms Overview
                            </div>
                            <h2 class="text-3xl md:text-4xl font-heading font-black text-navy mb-5 leading-tight">Please read these terms before using the store or placing an order.</h2>
                            <p class="lead text-lg text-navy font-medium">
                                These Terms & Conditions govern your access to and use of <?php echo esc_html($brand_name); ?>, including browsing products, creating or using an account, placing orders, making payments, requesting support, and using any customer service features on our website.
                            </p>
                            <p>
                                By using this website or placing an order, you agree to these Terms & Conditions, our <a href="/privacy-policy/">Privacy Policy</a>, and our <a href="/shipping-returns/">Shipping & Returns Policy</a>. If you do not agree, please do not use the website or complete a purchase.
                            </p>
                            <p>
                                We sell activewear and sportswear products, including dry-fit style t-shirts, tracksuits, training sets, tank tops, and activewear bottoms. These terms are written to make the purchase process clear before and after checkout.
                            </p>

                            <div class="grid md:grid-cols-3 gap-5 mt-8 not-prose">
                                <div class="bg-white rounded-2xl border border-border p-5 summary-card">
                                    <p class="text-xl font-black text-navy mb-2">Before Purchase</p>
                                    <p class="text-sm text-foreground-muted leading-relaxed">Review size, color, product details, price, shipping cost, and return eligibility before checkout.</p>
                                </div>
                                <div class="bg-white rounded-2xl border border-border p-5 summary-card">
                                    <p class="text-xl font-black text-navy mb-2">After Purchase</p>
                                    <p class="text-sm text-foreground-muted leading-relaxed">Order updates, tracking, support, returns, and refunds follow the policies linked on this page.</p>
                                </div>
                                <div class="bg-white rounded-2xl border border-border p-5 summary-card">
                                    <p class="text-xl font-black text-navy mb-2">Support</p>
                                    <p class="text-sm text-foreground-muted leading-relaxed">Use email support for order changes, defects, delivery issues, or privacy/account questions.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Store Use Section -->
                        <div id="store" class="scroll-mt-32 mb-16 policy-section">
                            <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-blue/10 text-blue font-bold text-xs uppercase tracking-widest mb-5 policy-label">
                                Store Use
                            </div>
                            <h2 class="text-3xl md:text-4xl font-heading font-black text-navy mb-5 leading-tight">Eligibility, account use, and fair website behavior.</h2>
                            <p>
                                You may use this website only for lawful personal shopping purposes and in accordance with these terms. You are responsible for ensuring that the information you provide to us is accurate, current, and complete.
                            </p>

                            <h3 class="text-2xl font-heading font-black text-navy mb-4">Account and checkout information</h3>
                            <ul>
                                <li>You must provide accurate contact, billing, shipping, and payment information when placing an order.</li>
                                <li>You are responsible for keeping account login details confidential if account features are available.</li>
                                <li>You should promptly update saved information that becomes inaccurate, including email address or shipping address.</li>
                                <li>We may contact you using the email or phone number provided at checkout for order, payment, shipping, return, or support purposes.</li>
                            </ul>

                            <h3 class="text-2xl font-heading font-black text-navy mb-4 mt-8">Prohibited use</h3>
                            <p>
                                You agree not to misuse the website, interfere with checkout, attempt unauthorized access, submit false information, scrape content, upload malicious code, abuse promotions, or use the store for fraudulent, unlawful, or unauthorized resale activity.
                            </p>
                        </div>

                        <!-- Products Section -->
                        <div id="products" class="scroll-mt-32 mb-16 policy-section">
                            <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-lime/20 text-navy font-bold text-xs uppercase tracking-widest mb-5 policy-label">
                                Products & Fit
                            </div>
                            <h2 class="text-3xl md:text-4xl font-heading font-black text-navy mb-5 leading-tight">Product details are provided to help you choose the right activewear.</h2>
                            <p>
                                We aim to present product names, images, descriptions, prices, sizes, colors, and availability accurately. Because product information may occasionally contain errors or become outdated, we may correct information, update availability, or cancel orders affected by obvious errors where permitted by law.
                            </p>

                            <div class="bg-white p-6 md:p-8 rounded-2xl border border-border shadow-sm not-prose my-8">
                                <div class="grid md:grid-cols-2 gap-8">
                                    <div>
                                        <h3 class="text-lg font-bold text-navy mb-3">Activewear fit</h3>
                                        <p class="text-foreground-muted leading-relaxed">
                                            Fit may vary by product type, cut, fabric feel, stretch, and personal preference. Review size charts, product descriptions, and customer support guidance before ordering.
                                        </p>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-bold text-navy mb-3">Colors and images</h3>
                                        <p class="text-foreground-muted leading-relaxed">
                                            Product colors can appear different because of screen settings, lighting, photography, and device display differences.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <h3 class="text-2xl font-heading font-black text-navy mb-4">Performance and care</h3>
                            <ul>
                                <li>Product descriptions may reference comfort, movement, dry-fit style, breathable feel, gym wear, or training-ready design as general product positioning.</li>
                                <li>We do not guarantee athletic performance, health outcomes, weight loss, injury prevention, medical benefits, or professional sports results from using our products.</li>
                                <li>Follow any product care instructions provided on product pages, garment labels, packaging, or customer support communications.</li>
                                <li>Normal wear, washing, friction, sweat, deodorant, heat, or improper care may affect fabric condition over time.</li>
                            </ul>

                            <h3 class="text-2xl font-heading font-black text-navy mb-4 mt-8">No implied affiliation</h3>
                            <p>
                                Unless a product page clearly states otherwise, references to product style, sport, training, fitness, or activewear categories do not imply endorsement, sponsorship, certification, or affiliation with any athlete, team, league, government body, manufacturer, platform, or third-party brand.
                            </p>
                        </div>

                        <!-- Pricing Section -->
                        <div id="pricing" class="scroll-mt-32 mb-16 policy-section">
                            <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-blue/10 text-blue font-bold text-xs uppercase tracking-widest mb-5 policy-label">
                                Pricing & Promotions
                            </div>
                            <h2 class="text-3xl md:text-4xl font-heading font-black text-navy mb-5 leading-tight">Prices, taxes, discounts, and availability may change.</h2>
                            <p>
                                Product prices are shown on product pages and during checkout. The final amount shown before payment may include product price, discounts, shipping charges, taxes, duties, or other applicable fees based on destination, shipping method, and order details.
                            </p>
                            <ul>
                                <li>Prices, product availability, discounts, and promotions may change without prior notice.</li>
                                <li>Discount codes, sale prices, bundles, or free shipping offers may have conditions, expiration dates, product exclusions, order minimums, or geographic limits.</li>
                                <li>Only one promotion may apply per order unless the checkout page clearly allows stacking.</li>
                                <li>If a price or promotion is shown incorrectly because of a technical, typographical, or system error, we may cancel or correct the affected order before fulfillment.</li>
                                <li>We reserve the right to limit quantities, decline suspicious orders, or cancel orders that appear to abuse promotions or violate these terms.</li>
                            </ul>

                            <div class="bg-navy rounded-2xl p-6 md:p-10 text-white relative overflow-hidden not-prose mt-8">
                                <div class="absolute top-0 right-0 w-64 h-64 bg-blue/10 rounded-full blur-[80px] -mr-32 -mt-32"></div>
                                <div class="relative z-10 grid md:grid-cols-2 gap-8">
                                    <div>
                                        <p class="text-blue font-bold uppercase tracking-widest text-xs mb-3">Checkout clarity</p>
                                        <div class="text-3xl font-black mb-4">Review the full order total before payment.</div>
                                        <p class="text-gray-400 leading-relaxed">
                                            We aim to make the total cost clear before you submit payment, including product price, shipping charges, applicable taxes, and available discounts.
                                        </p>
                                    </div>
                                    <div class="space-y-4">
                                        <div class="flex items-start gap-4">
                                            <div class="w-6 h-6 rounded-full bg-blue/20 flex items-center justify-center shrink-0 mt-1">
                                                <svg class="w-3 h-3 text-blue" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                            </div>
                                            <p class="text-sm text-gray-300">Shipping rates are displayed at checkout before payment is completed.</p>
                                        </div>
                                        <div class="flex items-start gap-4">
                                            <div class="w-6 h-6 rounded-full bg-blue/20 flex items-center justify-center shrink-0 mt-1">
                                                <svg class="w-3 h-3 text-blue" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                            </div>
                                            <p class="text-sm text-gray-300">International duties, taxes, and customs fees may apply depending on destination.</p>
                                        </div>
                                        <div class="flex items-start gap-4">
                                            <div class="w-6 h-6 rounded-full bg-blue/20 flex items-center justify-center shrink-0 mt-1">
                                                <svg class="w-3 h-3 text-blue" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                            </div>
                                            <p class="text-sm text-gray-300">Promotion rules are applied based on the terms shown with the offer or at checkout.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Orders Section -->
                        <div id="orders" class="scroll-mt-32 mb-16 policy-section">
                            <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-lime/20 text-navy font-bold text-xs uppercase tracking-widest mb-5 policy-label">
                                Orders & Payment
                            </div>
                            <h2 class="text-3xl md:text-4xl font-heading font-black text-navy mb-5 leading-tight">Order confirmation, payment authorization, and cancellation rules.</h2>

                            <h3 class="text-2xl font-heading font-black text-navy mb-4">Order acceptance</h3>
                            <p>
                                After you place an order, you may receive an email confirming that we received the order. This confirmation does not guarantee acceptance, availability, or shipment. An order is accepted when payment is approved and the order enters fulfillment or ships.
                            </p>
                            <p>
                                We may refuse, cancel, or limit an order before fulfillment if information is inaccurate, payment cannot be verified, the item is unavailable, the order appears fraudulent, the order appears intended for unauthorized resale, or there is a pricing, product, shipping, or system error.
                            </p>

                            <h3 class="text-2xl font-heading font-black text-navy mb-4 mt-8">Payment security</h3>
                            <p>
                                Payment processing, transaction processing, and processing of personally identifiable information submitted at checkout are intended to be handled through secure checkout technology. We do not store full raw credit card numbers on our website servers.
                            </p>
                            <ul>
                                <li>You authorize us and our payment providers to process the payment method submitted for your order.</li>
                                <li>Payment providers may run fraud checks and may decline transactions according to their own security practices.</li>
                                <li>We may request additional verification if an order appears unusual, incomplete, or inconsistent with normal purchasing behavior.</li>
                                <li>Refunds, if approved, are generally issued to the original payment method according to our Shipping & Returns Policy.</li>
                            </ul>

                            <h3 class="text-2xl font-heading font-black text-navy mb-4 mt-8">Order changes and cancellations</h3>
                            <p>
                                If you need to change a shipping address, size, color, or other order detail, contact us as soon as possible at <a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>. We will do our best to help before fulfillment, but changes are not guaranteed once an order has entered processing or shipped.
                            </p>
                        </div>

                        <!-- Shipping Section -->
                        <div id="shipping" class="scroll-mt-32 mb-16 policy-section">
                            <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-blue/10 text-blue font-bold text-xs uppercase tracking-widest mb-5 policy-label">
                                Shipping & Returns
                            </div>
                            <h2 class="text-3xl md:text-4xl font-heading font-black text-navy mb-5 leading-tight">Shipping, delivery, returns, and refunds are governed by our customer care policies.</h2>
                            <p>
                                Shipping times, processing times, tracking details, return eligibility, refund timing, and exchange availability are described in our <a href="/shipping-returns/">Shipping & Returns Policy</a>. Please review that policy before placing an order.
                            </p>
                            <ul>
                                <li>Orders are typically processed during business hours: <?php echo esc_html($business_hours); ?>.</li>
                                <li>Delivery estimates are estimates and may be affected by carrier volume, weather, destination, customs, holidays, or local delivery conditions.</li>
                                <li>Customers are responsible for providing a complete and accurate shipping address at checkout.</li>
                                <li>Eligible activewear returns generally require items to be unworn, unwashed, undamaged, free from stains or odors, and in original condition.</li>
                                <li>Return requests should be submitted within the return window stated in the Shipping & Returns Policy.</li>
                                <li>Original shipping charges and return shipping costs may be non-refundable unless the return is due to our error or a verified damaged, defective, or incorrect item.</li>
                            </ul>

                            <h3 class="text-2xl font-heading font-black text-navy mb-4 mt-8">Damaged, defective, or incorrect items</h3>
                            <p>
                                If your item arrives damaged, defective, or different from what you ordered, contact us promptly with your order number, a description of the issue, and clear photos of the product, packaging, size label, and any visible damage. We will review the case and provide the next step.
                            </p>
                        </div>

                        <!-- Responsibility Section -->
                        <div id="responsibility" class="scroll-mt-32 mb-16 policy-section">
                            <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-blue/10 text-blue font-bold text-xs uppercase tracking-widest mb-5 policy-label">
                                Responsibility
                            </div>
                            <h2 class="text-3xl md:text-4xl font-heading font-black text-navy mb-5 leading-tight">Website availability, content ownership, and liability limits.</h2>

                            <h3 class="text-2xl font-heading font-black text-navy mb-4">Website availability</h3>
                            <p>
                                We aim to keep the website available and accurate, but we do not guarantee uninterrupted access, error-free operation, or that every feature will always be available. We may update, suspend, remove, or change website content, product pages, features, or services at any time.
                            </p>

                            <h3 class="text-2xl font-heading font-black text-navy mb-4 mt-8">Intellectual property</h3>
                            <p>
                                Website content, including text, product descriptions, layout, graphics, photography, icons, design elements, logos, and other materials, is owned by or licensed to <?php echo esc_html($brand_name); ?> unless otherwise stated. You may not copy, reproduce, distribute, modify, scrape, or use website content for commercial purposes without written permission.
                            </p>

                            <h3 class="text-2xl font-heading font-black text-navy mb-4 mt-8">Third-party services</h3>
                            <p>
                                Our website may use third-party services for payment, shipping, analytics, advertising, email, product review, support, or carrier tracking functions. Third-party services may have their own terms and privacy practices. We are not responsible for third-party websites or services that we do not control.
                            </p>

                            <h3 class="text-2xl font-heading font-black text-navy mb-4 mt-8">Limitation of liability</h3>
                            <p>
                                To the maximum extent permitted by law, <?php echo esc_html($brand_name); ?> will not be liable for indirect, incidental, special, consequential, punitive, or lost-profit damages arising from your use of the website, products, delivery services, or support communications. Where liability cannot be excluded, our liability is limited to the amount you paid for the affected product or service, unless applicable law requires otherwise.
                            </p>
                        </div>

                        <!-- Legal Section -->
                        <div id="legal" class="scroll-mt-32 mb-16 policy-section">
                            <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-lime/20 text-navy font-bold text-xs uppercase tracking-widest mb-5 policy-label">
                                Legal Terms
                            </div>
                            <h2 class="text-3xl md:text-4xl font-heading font-black text-navy mb-5 leading-tight">Additional legal conditions.</h2>

                            <h3 class="text-2xl font-heading font-black text-navy mb-4">Indemnification</h3>
                            <p>
                                You agree to indemnify and hold harmless <?php echo esc_html($brand_name); ?>, its team, service providers, and partners from claims, damages, losses, liabilities, and expenses arising from your misuse of the website, violation of these terms, fraudulent activity, infringement of third-party rights, or unlawful conduct.
                            </p>

                            <h3 class="text-2xl font-heading font-black text-navy mb-4 mt-8">Changes to these terms</h3>
                            <p>
                                We may update these Terms & Conditions from time to time to reflect changes in our products, operations, policies, service providers, or legal requirements. The "Last Updated" date shows when the current version became effective. Continued use of the website after updates means you accept the revised terms.
                            </p>

                            <h3 class="text-2xl font-heading font-black text-navy mb-4 mt-8">Severability</h3>
                            <p>
                                If any part of these terms is found invalid or unenforceable, the remaining sections will continue to apply to the fullest extent permitted by law.
                            </p>
                        </div>

                        <!-- Contact Section -->
                        <div id="contact" class="scroll-mt-32 mb-16 policy-section policy-section-last">
                            <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-navy text-white font-bold text-xs uppercase tracking-widest mb-5 policy-label">
                                Contact
                            </div>
                            <h2 class="text-3xl md:text-4xl font-heading font-black text-navy mb-5 leading-tight">Contact us about these terms.</h2>
                            <p>
                                For questions about these Terms & Conditions, an order, payment, shipping, return, refund, or product issue, contact our support team.
                            </p>

                            <div class="space-y-4 not-prose mt-8">
                                <div class="group flex gap-5 md:gap-6 p-5 md:p-6 rounded-2xl bg-white border border-border hover:border-blue hover:shadow-xl transition-all duration-300">
                                    <div class="w-12 h-12 rounded-full bg-navy text-white flex items-center justify-center font-black shrink-0 group-hover:bg-blue transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8m-18 8h18a2 2 0 002-2V8a2 2 0 00-2-2H3a2 2 0 00-2 2v6a2 2 0 002 2z"></path></svg>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-navy mb-2">Email support</h4>
                                        <p class="text-foreground-muted leading-relaxed"><a href="mailto:<?php echo esc_attr($support_email); ?>" class="text-blue font-bold hover:underline"><?php echo esc_html($support_email); ?></a></p>
                                    </div>
                                </div>
                                <div class="group flex gap-5 md:gap-6 p-5 md:p-6 rounded-2xl bg-white border border-border hover:border-blue hover:shadow-xl transition-all duration-300">
                                    <div class="w-12 h-12 rounded-full bg-navy text-white flex items-center justify-center font-black shrink-0 group-hover:bg-blue transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-navy mb-2">Business hours</h4>
                                        <p class="text-foreground-muted leading-relaxed"><?php echo esc_html($business_hours); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-14 pt-8 border-t border-border flex flex-col sm:flex-row items-center justify-between gap-6">
                            <p class="text-sm font-bold text-navy/40 uppercase tracking-widest">Last Updated: <?php echo esc_html($last_updated); ?></p>
                            <div class="flex flex-wrap justify-center gap-4">
                                <a href="/privacy-policy/" class="text-sm font-bold text-blue hover:underline">Privacy Policy</a>
                                <span class="text-border">|</span>
                                <a href="/shipping-returns/" class="text-sm font-bold text-blue hover:underline">Shipping & Returns</a>
                                <span class="text-border">|</span>
                                <a href="/contact-us/" class="text-sm font-bold text-blue hover:underline">Contact Us</a>
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
            <h2 class="text-4xl md:text-6xl font-heading font-black text-white mb-8">Questions before checkout?</h2>
            <p class="text-xl text-gray-400 mb-12 max-w-2xl mx-auto">
                Contact support for help with product details, sizing, order changes, payment questions, shipping, returns, or refunds.
            </p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center">
                <a href="mailto:<?php echo esc_attr($support_email); ?>" class="px-12 py-5 bg-blue hover:bg-white hover:text-navy text-white font-bold rounded-2xl transition-all duration-300 shadow-lg shadow-blue/20">
                    Email Support
                </a>
                <a href="/shipping-returns/" class="px-12 py-5 border-2 border-white/20 hover:border-white text-white font-bold rounded-2xl transition-all duration-300">
                    Shipping & Returns
                </a>
                <a href="/privacy-policy/" class="px-12 py-5 border-2 border-white/20 hover:border-white text-white font-bold rounded-2xl transition-all duration-300">
                    Privacy Policy
                </a>
            </div>
        </div>
    </section>
</div>

<style>
    html {
        scroll-behavior: smooth;
    }

    .terms-policy {
        color: #4b5563;
        font-size: 16px;
        line-height: 1.78;
    }

    .terms-policy .policy-section {
        padding-bottom: 3.5rem;
        border-bottom: 1px solid #e5e7eb;
    }

    .terms-policy .policy-section-last {
        padding-bottom: 0;
        border-bottom: 0;
    }

    .terms-policy .policy-label {
        line-height: 1;
    }

    .terms-policy p {
        margin-top: 0;
        margin-bottom: 1rem;
    }

    .terms-policy p:last-child {
        margin-bottom: 0;
    }

    .terms-policy .lead {
        line-height: 1.65;
        margin-bottom: 1rem;
    }

    .terms-policy h2,
    .terms-policy h3,
    .terms-policy h4 {
        letter-spacing: 0;
    }

    .terms-policy h3 {
        line-height: 1.25;
    }

    .terms-policy a {
        color: #2563eb;
        font-weight: 700;
        text-decoration: none;
    }

    .terms-policy a:hover {
        text-decoration: underline;
    }

    .terms-policy ul {
        display: grid;
        gap: 0.7rem;
        margin: 0.75rem 0 0;
        padding: 0;
        list-style: none;
    }

    .terms-policy li {
        position: relative;
        padding-left: 1.45rem;
        line-height: 1.65;
    }

    .terms-policy li::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0.72em;
        width: 0.45rem;
        height: 0.45rem;
        border-radius: 999px;
        background: #2563eb;
    }

    .terms-policy .summary-card {
        box-shadow: 0 12px 28px rgba(11, 31, 51, 0.04);
    }

    @media (max-width: 767px) {
        .terms-policy {
            font-size: 15px;
            line-height: 1.72;
        }

        .terms-policy .policy-section {
            padding-bottom: 2.5rem;
        }

        .terms-policy .policy-label {
            margin-bottom: 1rem;
        }
    }
</style>
