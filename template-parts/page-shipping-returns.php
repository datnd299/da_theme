<?php
/**
 * Template Part: Shipping & Returns Page
 *
 * This template follows Google Merchant Center (GMC) standards and the Shop Kelli Design System.
 */
?>

<section class="bg-surface py-16 md:py-24">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="text-center mb-14">
            <span class="text-accent font-medium tracking-widest uppercase text-sm mb-4 block">Merchant Policies</span>
            <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl text-foreground font-bold mb-6 tracking-tight">Shipping & Returns</h1>
            <p class="text-foreground-muted text-lg max-w-3xl mx-auto leading-relaxed">
                Clear delivery, return, exchange, and refund details for your Shop Kelli order.
            </p>
        </div>

        <div class="grid lg:grid-cols-12 gap-8 items-start">
            <div class="hidden lg:block lg:col-span-3 sticky top-24">
                <nav class="space-y-3">
                    <a href="#shipping-policy" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium">Shipping Policy</a>
                    <a href="#delivery-times" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium">Delivery Times</a>
                    <a href="#return-policy" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium">Returns & Exchanges</a>
                    <a href="#refunds" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium">Refunds</a>
                </nav>
            </div>

            <div class="lg:col-span-9 space-y-8">
                <div class="grid md:grid-cols-3 gap-4">
                    <div class="bg-background p-6 rounded-lg border border-border shadow-card">
                        <p class="text-accent font-semibold uppercase text-xs tracking-widest mb-2">Order Cutoff</p>
                        <p class="text-foreground text-2xl font-bold">2:00 PM</p>
                        <p class="text-foreground-muted text-sm mt-2">Pacific Standard Time</p>
                    </div>
                    <div class="bg-background p-6 rounded-lg border border-border shadow-card">
                        <p class="text-accent font-semibold uppercase text-xs tracking-widest mb-2">Handling Time</p>
                        <p class="text-foreground text-2xl font-bold">0-1 Business Days</p>
                        <p class="text-foreground-muted text-sm mt-2">Orders are fulfilled Monday-Saturday.</p>
                    </div>
                    <div class="bg-background p-6 rounded-lg border border-border shadow-card">
                        <p class="text-accent font-semibold uppercase text-xs tracking-widest mb-2">Shipping Cost</p>
                        <p class="text-foreground text-2xl font-bold">Free</p>
                        <p class="text-foreground-muted text-sm mt-2">Standard shipping on U.S. orders.</p>
                    </div>
                </div>

                <div id="shipping-policy" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-8">
                        <div class="w-12 h-12 bg-accent-soft rounded-full flex items-center justify-center text-accent shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                        </div>
                        <div>
                            <h2 class="font-heading text-3xl text-foreground font-semibold">Shipping Policy</h2>
                            <p class="text-foreground-muted mt-2">We ship orders from our boutique with tracking included.</p>
                        </div>
                    </div>

                    <div id="delivery-times" class="grid md:grid-cols-2 gap-6">
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4">Delivery Schedule</h3>
                            <dl class="space-y-4 text-sm">
                                <div class="flex justify-between gap-4 border-b border-border pb-3">
                                    <dt class="text-foreground-muted">Shipping cost</dt>
                                    <dd class="text-foreground font-semibold text-right">Free standard shipping</dd>
                                </div>
                                <div class="flex justify-between gap-4 border-b border-border pb-3">
                                    <dt class="text-foreground-muted">Order cutoff time</dt>
                                    <dd class="text-foreground font-semibold text-right">2:00 PM PST</dd>
                                </div>
                                <div class="flex justify-between gap-4 border-b border-border pb-3">
                                    <dt class="text-foreground-muted">Handling time</dt>
                                    <dd class="text-foreground font-semibold text-right">0-1 business days</dd>
                                </div>
                                <div class="flex justify-between gap-4 border-b border-border pb-3">
                                    <dt class="text-foreground-muted">Fulfillment days</dt>
                                    <dd class="text-foreground font-semibold text-right">Monday-Saturday</dd>
                                </div>
                                <div class="flex justify-between gap-4">
                                    <dt class="text-foreground-muted">Transit time</dt>
                                    <dd class="text-foreground font-semibold text-right">0 business days</dd>
                                </div>
                            </dl>
                        </div>

                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4">Shipping Details</h3>
                            <ul class="space-y-3 text-foreground-muted">
                                <li class="flex gap-3">
                                    <span class="mt-1 h-2 w-2 rounded-full bg-accent shrink-0"></span>
                                    <span>Standard shipping is free for U.S. orders.</span>
                                </li>
                                <li class="flex gap-3">
                                    <span class="mt-1 h-2 w-2 rounded-full bg-accent shrink-0"></span>
                                    <span>Estimated total delivery time is 0-1 business days after the order is placed before the daily cutoff.</span>
                                </li>
                                <li class="flex gap-3">
                                    <span class="mt-1 h-2 w-2 rounded-full bg-accent shrink-0"></span>
                                    <span>Shipping estimates may be adjusted during public holidays or carrier delays.</span>
                                </li>
                                <li class="flex gap-3">
                                    <span class="mt-1 h-2 w-2 rounded-full bg-accent shrink-0"></span>
                                    <span>Tracking information is emailed once your order is ready for delivery.</span>
                                </li>
                                <li class="flex gap-3">
                                    <span class="mt-1 h-2 w-2 rounded-full bg-accent shrink-0"></span>
                                    <span>Shop Kelli currently serves customers in the United States.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div id="return-policy" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-8">
                        <div class="w-12 h-12 bg-accent-soft rounded-full flex items-center justify-center text-accent shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 11a9 9 0 0 0-15.74-6.26L3 7"></path><path d="M3 3v4h4"></path><path d="M3 13a9 9 0 0 0 15.74 6.26L21 17"></path><path d="M21 21v-4h-4"></path></svg>
                        </div>
                        <div>
                            <h2 class="font-heading text-3xl text-foreground font-semibold">Return & Refund Policy</h2>
                            <p class="text-foreground-muted mt-2">Returns and exchanges are available for eligible boutique purchases.</p>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6 mb-8">
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4">What We Accept</h3>
                            <ul class="space-y-3 text-foreground-muted">
                                <li class="flex gap-3">
                                    <svg class="text-accent mt-1 shrink-0" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    <span>Returns for defective and non-defective products.</span>
                                </li>
                                <li class="flex gap-3">
                                    <svg class="text-accent mt-1 shrink-0" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    <span>Exchanges for eligible products.</span>
                                </li>
                                <li class="flex gap-3">
                                    <svg class="text-accent mt-1 shrink-0" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    <span>Only new products in original condition.</span>
                                </li>
                            </ul>
                        </div>

                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4">Return Window</h3>
                            <p class="text-foreground text-4xl font-bold mb-3">30 Days</p>
                            <p class="text-foreground-muted leading-relaxed">Return requests must be started within 30 days of delivery. Items must be unused, unworn, in original condition, and returned with original tags and packaging.</p>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-3 gap-4 mb-8">
                        <div class="border border-border rounded-lg p-5">
                            <p class="text-accent font-semibold uppercase text-xs tracking-widest mb-2">Method</p>
                            <p class="text-foreground font-semibold">By mail</p>
                        </div>
                        <div class="border border-border rounded-lg p-5">
                            <p class="text-accent font-semibold uppercase text-xs tracking-widest mb-2">Currency</p>
                            <p class="text-foreground font-semibold">USD</p>
                        </div>
                        <div class="border border-border rounded-lg p-5">
                            <p class="text-accent font-semibold uppercase text-xs tracking-widest mb-2">Restocking Fee</p>
                            <p class="text-foreground font-semibold">No cost</p>
                        </div>
                    </div>

                    <div class="bg-accent-soft p-6 rounded-lg border border-accent/20">
                        <h3 class="text-foreground font-semibold text-xl mb-3">Return Label & Shipping Cost</h3>
                        <p class="text-foreground-muted leading-relaxed">
                            Return labels are handled as download-and-print labels when applicable. Return label and return shipping costs are the customer's responsibility unless your item arrived damaged, defective, or incorrect.
                        </p>
                    </div>
                </div>

                <div id="refunds" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6">Refund Processing</h2>
                    <div class="grid md:grid-cols-[180px_1fr] gap-6 items-start">
                        <div class="bg-surface p-6 rounded-lg border border-border text-center">
                            <p class="text-foreground text-4xl font-bold">10</p>
                            <p class="text-foreground-muted text-sm mt-2">Days</p>
                        </div>
                        <div class="text-foreground-muted leading-relaxed space-y-4">
                            <p>After your returned item is received and inspected, approved refunds are issued to the original payment method within 10 days.</p>
                            <p>To start a return or exchange, email <a href="mailto:support@shopkelli.com" class="text-accent hover:underline font-medium">support@shopkelli.com</a> with your order number and the item details.</p>
                        </div>
                    </div>
                </div>

                <div class="text-center bg-surface p-10 rounded-lg border border-dashed border-accent/30">
                    <h3 class="font-heading text-2xl text-foreground mb-4">Need help with your order?</h3>
                    <p class="text-foreground-muted mb-8 max-w-md mx-auto">Our boutique team is here Monday through Saturday, 10:00 AM - 6:00 PM (PST).</p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="mailto:support@shopkelli.com" class="inline-flex items-center justify-center bg-accent text-white px-8 py-3 rounded-full font-medium hover:bg-accent-hover transition-colors shadow-lg shadow-accent/20">Email Support</a>
                        <a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" class="inline-flex items-center justify-center bg-white text-foreground border border-border px-8 py-3 rounded-full font-medium hover:bg-surface transition-colors">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
