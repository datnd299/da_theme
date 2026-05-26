<?php
/**
 * Template Part: Shipping Policy Page
 */
?>

<section class="bg-surface py-16 md:py-24">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="text-center mb-14">
            <span class="text-accent font-medium tracking-widest uppercase text-sm mb-4 block">Merchant Policies</span>
            <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl text-foreground font-bold mb-6 tracking-tight">Shipping Policy</h1>
            <p class="text-foreground-muted text-lg max-w-3xl mx-auto leading-relaxed">
                Transparent delivery timelines, shipping locations, carrier details, and tracking support for every Shop Kelli order.
            </p>
        </div>

        <div class="grid lg:grid-cols-12 gap-8 items-start">
            <div class="hidden lg:block lg:col-span-3 sticky top-24">
                <nav class="space-y-3">
                    <a href="#shipping-locations" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium">Shipping Locations</a>
                    <a href="#delivery-times" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium">Delivery Times</a>
                    <a href="#carrier-services" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium">Carrier Services</a>
                    <a href="#delivery-issues" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium">Delivery Issues</a>
                    <a href="#contact-information" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium">Contact Information</a>
                </nav>
            </div>

            <div class="lg:col-span-9 space-y-8">
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="bg-background p-6 rounded-lg border border-border shadow-card">
                        <p class="text-accent font-semibold uppercase text-xs tracking-widest mb-2">Order Cutoff</p>
                        <p class="text-foreground text-2xl font-bold">5:00 PM</p>
                        <p class="text-foreground-muted text-sm mt-2">Pacific Standard Time</p>
                    </div>
                    <div class="bg-background p-6 rounded-lg border border-border shadow-card">
                        <p class="text-accent font-semibold uppercase text-xs tracking-widest mb-2">Handling Time</p>
                        <p class="text-foreground text-2xl font-bold">1-3 Business Days</p>
                        <p class="text-foreground-muted text-sm mt-2">Orders are fulfilled Monday-Friday.</p>
                    </div>
                    <div class="bg-background p-6 rounded-lg border border-border shadow-card">
                        <p class="text-accent font-semibold uppercase text-xs tracking-widest mb-2">Transit Time</p>
                        <p class="text-foreground text-2xl font-bold">3-5 Business Days</p>
                        <p class="text-foreground-muted text-sm mt-2">After processing is complete.</p>
                    </div>
                    <div class="bg-background p-6 rounded-lg border border-border shadow-card">
                        <p class="text-accent font-semibold uppercase text-xs tracking-widest mb-2">Shipping Cost</p>
                        <p class="text-foreground text-2xl font-bold">Free</p>
                        <p class="text-foreground-muted text-sm mt-2">Standard shipping on U.S. orders.</p>
                    </div>
                </div>

                <div id="shipping-locations" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-8">
                        <div class="w-12 h-12 bg-accent-soft rounded-full flex items-center justify-center text-accent shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        </div>
                        <div>
                            <h2 class="font-heading text-3xl text-foreground font-semibold">Shipping Locations</h2>
                            <p class="text-foreground-muted mt-2">We currently serve customers within the United States.</p>
                        </div>
                    </div>
                    <div class="text-foreground-muted leading-relaxed space-y-4">
                        <p>Shop Kelli ships eligible orders to U.S. delivery addresses. Some shipments may be limited by carrier availability, address accuracy, holidays, or service disruptions.</p>
                        <p>If an address cannot be serviced, our team will contact you using the details provided at checkout.</p>
                    </div>
                </div>

                <div id="delivery-times" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6">Delivery Times</h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4">What to Expect</h3>
                            <dl class="space-y-4 text-sm">
                                <div class="flex justify-between gap-4 border-b border-border pb-3">
                                    <dt class="text-foreground-muted">Order cutoff time</dt>
                                    <dd class="text-foreground font-semibold text-right">5:00 PM Pacific Standard Time</dd>
                                </div>
                                <div class="flex justify-between gap-4 border-b border-border pb-3">
                                    <dt class="text-foreground-muted">Handling time</dt>
                                    <dd class="text-foreground font-semibold text-right">1-3 business days</dd>
                                </div>
                                <div class="flex justify-between gap-4 border-b border-border pb-3">
                                    <dt class="text-foreground-muted">Fulfillment days</dt>
                                    <dd class="text-foreground font-semibold text-right">Monday-Friday</dd>
                                </div>
                                <div class="flex justify-between gap-4">
                                    <dt class="text-foreground-muted">Transit time</dt>
                                    <dd class="text-foreground font-semibold text-right">3-5 business days</dd>
                                </div>
                            </dl>
                        </div>

                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4">Notes for Orders</h3>
                            <ul class="space-y-3 text-foreground-muted">
                                <li class="flex gap-3"><span class="mt-1 h-2 w-2 rounded-full bg-accent shrink-0"></span><span>Orders placed after the cutoff begin processing the next business day.</span></li>
                                <li class="flex gap-3"><span class="mt-1 h-2 w-2 rounded-full bg-accent shrink-0"></span><span>Estimated total delivery time is usually 4-8 business days.</span></li>
                                <li class="flex gap-3"><span class="mt-1 h-2 w-2 rounded-full bg-accent shrink-0"></span><span>Multi-item orders may ship in more than one package.</span></li>
                                <li class="flex gap-3"><span class="mt-1 h-2 w-2 rounded-full bg-accent shrink-0"></span><span>Public holidays, weather events, and carrier delays may extend delivery timelines.</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div id="carrier-services" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6">Carrier Services & Shipping Costs</h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4">Carriers</h3>
                            <p class="text-foreground-muted leading-relaxed">We use trusted U.S. carriers and select the service based on package size, destination, and availability. Tracking is emailed once your order is ready for delivery.</p>
                        </div>
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4">Shipping Cost</h3>
                            <p class="text-foreground-muted leading-relaxed">Standard shipping is free on U.S. orders. Any unusual shipping adjustment, if applicable, will be communicated before fulfillment.</p>
                        </div>
                    </div>
                </div>

                <div id="delivery-issues" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6">Delivery Issues</h2>
                    <div class="text-foreground-muted leading-relaxed space-y-4">
                        <p>If tracking has not updated, a package is delayed, an item arrives damaged, or the carrier marks a package as delivered but you cannot find it, contact us so we can help review the issue.</p>
                        <p>Please include your order number, delivery address, and photos if the package or item arrived damaged.</p>
                        <p>You can also use the <a href="<?php echo esc_url( home_url( '/track-order/' ) ); ?>" class="text-accent hover:underline font-medium">Order Tracking page</a> to check the latest available status.</p>
                    </div>
                </div>

                <div id="contact-information" class="bg-surface p-10 rounded-lg border border-dashed border-accent/30">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6">Contact Information</h2>
                    <dl class="grid md:grid-cols-2 gap-4 text-sm">
                        <div class="bg-background p-5 rounded-lg border border-border">
                            <dt class="text-accent font-semibold uppercase text-xs tracking-widest mb-2">Store Name</dt>
                            <dd class="text-foreground font-semibold">Shop Kelli</dd>
                        </div>
                        <div class="bg-background p-5 rounded-lg border border-border">
                            <dt class="text-accent font-semibold uppercase text-xs tracking-widest mb-2">Email</dt>
                            <dd><a href="mailto:support@shopkelli.com" class="text-foreground font-semibold hover:text-accent">support@shopkelli.com</a></dd>
                        </div>
                        <div class="bg-background p-5 rounded-lg border border-border">
                            <dt class="text-accent font-semibold uppercase text-xs tracking-widest mb-2">Address</dt>
                            <dd class="text-foreground font-semibold">1777 Canal St, Merced, CA 95340</dd>
                        </div>
                        <div class="bg-background p-5 rounded-lg border border-border">
                            <dt class="text-accent font-semibold uppercase text-xs tracking-widest mb-2">Service Hours</dt>
                            <dd class="text-foreground font-semibold">Mon-Sat, 10:00 AM - 6:00 PM PST</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</section>
