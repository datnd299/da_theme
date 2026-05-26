<?php
/**
 * Template Part: Refund & Return Policy Page
 */
?>

<section class="bg-surface py-16 md:py-24">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="text-center mb-14">
            <span class="text-accent font-medium tracking-widest uppercase text-sm mb-4 block">Merchant Policies</span>
            <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl text-foreground font-bold mb-6 tracking-tight">Refund & Return Policy</h1>
            <p class="text-foreground-muted text-lg max-w-3xl mx-auto leading-relaxed">
                Clear return eligibility, refund timing, exchange details, and support steps for your Shop Kelli purchase.
            </p>
        </div>

        <div class="grid lg:grid-cols-12 gap-8 items-start">
            <div class="hidden lg:block lg:col-span-3 sticky top-24">
                <nav class="space-y-3">
                    <a href="#return-window" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium">Return Window</a>
                    <a href="#return-conditions" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium">Return Conditions</a>
                    <a href="#start-return" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium">Start a Return</a>
                    <a href="#refunds" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium">Refunds</a>
                    <a href="#exchanges" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium">Exchanges</a>
                </nav>
            </div>

            <div class="lg:col-span-9 space-y-8">
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="bg-background p-6 rounded-lg border border-border shadow-card">
                        <p class="text-accent font-semibold uppercase text-xs tracking-widest mb-2">Return Window</p>
                        <p class="text-foreground text-2xl font-bold">30 Days</p>
                        <p class="text-foreground-muted text-sm mt-2">From delivery date.</p>
                    </div>
                    <div class="bg-background p-6 rounded-lg border border-border shadow-card">
                        <p class="text-accent font-semibold uppercase text-xs tracking-widest mb-2">Return Method</p>
                        <p class="text-foreground text-2xl font-bold">By Mail</p>
                        <p class="text-foreground-muted text-sm mt-2">Contact support first.</p>
                    </div>
                    <div class="bg-background p-6 rounded-lg border border-border shadow-card">
                        <p class="text-accent font-semibold uppercase text-xs tracking-widest mb-2">Restocking Fee</p>
                        <p class="text-foreground text-2xl font-bold">None</p>
                        <p class="text-foreground-muted text-sm mt-2">No restocking fee.</p>
                    </div>
                    <div class="bg-background p-6 rounded-lg border border-border shadow-card">
                        <p class="text-accent font-semibold uppercase text-xs tracking-widest mb-2">Refund Timing</p>
                        <p class="text-foreground text-2xl font-bold">10 Days</p>
                        <p class="text-foreground-muted text-sm mt-2">After inspection approval.</p>
                    </div>
                </div>

                <div id="return-window" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-8">
                        <div class="w-12 h-12 bg-accent-soft rounded-full flex items-center justify-center text-accent shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"></path><polyline points="3 3 3 8 8 8"></polyline></svg>
                        </div>
                        <div>
                            <h2 class="font-heading text-3xl text-foreground font-semibold">Return Window</h2>
                            <p class="text-foreground-muted mt-2">Return requests must be started within 30 days of delivery.</p>
                        </div>
                    </div>
                    <p class="text-foreground-muted leading-relaxed">Items must be returned unused, unworn, in original condition, and with original tags and packaging. Returns requested after the 30-day window may not be accepted.</p>
                </div>

                <div id="return-conditions" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6">Return Conditions</h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4">Eligible Returns</h3>
                            <ul class="space-y-3 text-foreground-muted">
                                <li class="flex gap-3"><svg class="text-accent mt-1 shrink-0" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><polyline points="20 6 9 17 4 12"></polyline></svg><span>Defective and non-defective eligible products.</span></li>
                                <li class="flex gap-3"><svg class="text-accent mt-1 shrink-0" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><polyline points="20 6 9 17 4 12"></polyline></svg><span>New-condition products with original packaging.</span></li>
                                <li class="flex gap-3"><svg class="text-accent mt-1 shrink-0" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><polyline points="20 6 9 17 4 12"></polyline></svg><span>Exchanges for eligible products, subject to availability.</span></li>
                            </ul>
                        </div>
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4">Return Shipping</h3>
                            <p class="text-foreground-muted leading-relaxed">Return label and return shipping costs are the customer's responsibility unless your item arrived damaged, defective, or incorrect. Return labels are handled as download-and-print labels when applicable.</p>
                        </div>
                    </div>
                </div>

                <div id="start-return" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6">How to Start a Return</h2>
                    <ol class="space-y-4 text-foreground-muted">
                        <li class="flex gap-4">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-accent text-white font-bold">1</span>
                            <span>Email <a href="mailto:support@shopkelli.com" class="text-accent hover:underline font-medium">support@shopkelli.com</a> with your order number and the item details.</span>
                        </li>
                        <li class="flex gap-4">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-accent text-white font-bold">2</span>
                            <span>Wait for return instructions before mailing the item back.</span>
                        </li>
                        <li class="flex gap-4">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-accent text-white font-bold">3</span>
                            <span>Pack the item securely with its original tags and packaging.</span>
                        </li>
                    </ol>
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
                            <p>Your bank or payment provider may need additional time to post the refund to your account.</p>
                        </div>
                    </div>
                </div>

                <div id="exchanges" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6">Exchanges, Damaged Items & Return Address</h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4">Exchanges</h3>
                            <p class="text-foreground-muted leading-relaxed">If you need a different size or replacement, contact us with your order number. Exchanges depend on current item availability.</p>
                        </div>
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4">Damaged or Incorrect Items</h3>
                            <p class="text-foreground-muted leading-relaxed">Please contact us as soon as possible with your order number and photos so we can review and help resolve the issue.</p>
                        </div>
                    </div>
                    <div class="mt-6 bg-accent-soft p-6 rounded-lg border border-accent/20">
                        <h3 class="text-foreground font-semibold text-xl mb-3">Return Address</h3>
                        <p class="text-foreground-muted leading-relaxed">Shop Kelli, 1777 Canal St, Merced, CA 95340. Please contact support before mailing any return.</p>
                    </div>
                </div>

                <div class="text-center bg-surface p-10 rounded-lg border border-dashed border-accent/30">
                    <h3 class="font-heading text-2xl text-foreground mb-4">Need help with a return?</h3>
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
