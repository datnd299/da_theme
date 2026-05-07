<?php
/**
 * Template Part: Shipping & Returns Page
 * 
 * This template follows Google Merchant Center (GMC) standards and the Shop Kelli Design System.
 */
?>

<section class="bg-surface py-16 md:py-24">
    <div class="container mx-auto px-4 max-w-5xl">
        <div class="text-center mb-16">
            <span class="text-accent font-medium tracking-widest uppercase text-sm mb-4 block">Merchant Policies</span>
            <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl text-foreground font-bold mb-6 tracking-tight">Shipping & Returns</h1>
            <p class="text-foreground-muted text-lg max-w-2xl mx-auto leading-relaxed">
                We want your shopping experience at Shop Kelli to be as warm and joyful as the pieces you find here. Here is everything you need to know about our delivery and returns.
            </p>
        </div>

        <div class="grid lg:grid-cols-12 gap-12 items-start">
            <!-- Navigation Sidebar (Desktop) -->
            <div class="hidden lg:block lg:col-span-3 sticky top-24">
                <nav class="space-y-4">
                    <a href="#shipping-policy" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium">Shipping Policy</a>
                    <a href="#processing-times" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium">Processing Times</a>
                    <a href="#return-policy" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium">Return & Refunds</a>
                    <a href="#damaged-items" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium">Damaged Items</a>
                </nav>
            </div>

            <!-- Content Area -->
            <div class="lg:col-span-9 space-y-12">
                
                <!-- Shipping Policy Section -->
                <div id="shipping-policy" class="bg-background p-8 md:p-12 rounded-2xl shadow-card border border-border transition-all duration-normal">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-14 h-14 bg-accent-soft rounded-full flex items-center justify-center text-accent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                        </div>
                        <h2 class="font-heading text-3xl text-foreground font-semibold">Shipping Policy</h2>
                    </div>

                    <div class="prose prose-neutral max-w-none text-foreground-muted space-y-8">
                        <div id="processing-times">
                            <h3 class="text-foreground font-semibold text-xl mb-4">Processing & Handling</h3>
                            <p>Every item at Shop Kelli is handled with love. Our dedicated team typically processes orders within **2–4 business days** (Monday–Saturday). During peak seasonal launches, processing may take slightly longer, but we always strive to get your boutique favorites out the door as fast as possible.</p>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="bg-surface p-6 rounded-xl border border-border/50">
                                <h4 class="text-accent font-semibold uppercase text-xs tracking-widest mb-2">Transit Time</h4>
                                <p class="text-foreground text-2xl font-bold">5–10 Business Days</p>
                                <p class="text-sm mt-2">Standard delivery across the contiguous United States.</p>
                            </div>
                            <div class="bg-surface p-6 rounded-xl border border-border/50">
                                <h4 class="text-accent font-semibold uppercase text-xs tracking-widest mb-2">Shipping Fee</h4>
                                <p class="text-foreground text-2xl font-bold">Free Shipping</p>
                                <p class="text-sm mt-2">Enjoy complimentary shipping on all orders.</p>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-foreground font-semibold text-xl mb-4">Shipping Carriers & Destinations</h3>
                            <p>We primarily use **USPS** and **UPS** for our deliveries to ensure your items arrive safely. At this time, we exclusively ship within the **United States**. We do not ship to P.O. Boxes, APO/FPO addresses, or international locations.</p>
                        </div>

                        <div class="bg-accent-soft p-6 rounded-xl border border-accent/20">
                            <h4 class="text-foreground font-semibold mb-2 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                Order Tracking
                            </h4>
                            <p class="text-sm">As soon as your order is on its way, you'll receive an email with a tracking link so you can follow its journey to your home.</p>
                        </div>
                    </div>
                </div>

                <!-- Returns & Refund Policy Section -->
                <div id="return-policy" class="bg-background p-8 md:p-12 rounded-2xl shadow-card border border-border transition-all duration-normal">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-14 h-14 bg-accent-soft rounded-full flex items-center justify-center text-accent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11a9 9 0 0 0-9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"></path><path d="M3 3v5h5"></path><path d="M3 13a9 9 0 0 0 9 9 9.75 9.75 0 0 0 6.74-2.74L21 16"></path><path d="M16 16h5v5"></path></svg>
                        </div>
                        <h2 class="font-heading text-3xl text-foreground font-semibold">Return & Refund Policy</h2>
                    </div>

                    <div class="prose prose-neutral max-w-none text-foreground-muted space-y-8">
                        <p class="text-lg italic text-foreground/80 border-l-4 border-accent pl-6 py-2">
                            "If you or your little ones don't absolutely love your purchase, we're here to make it right."
                        </p>

                        <div>
                            <h3 class="text-foreground font-semibold text-xl mb-4">30-Day Happiness Guarantee</h3>
                            <p>We accept returns of unworn, unwashed, and undamaged items within **30 days** of the delivery date. Items must have all original tags attached and be in their original packaging.</p>
                            
                            <div class="mt-6 grid sm:grid-cols-2 gap-4">
                                <ul class="space-y-3">
                                    <li class="flex items-start gap-2">
                                        <svg class="text-accent mt-1 shrink-0" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        <span>Unworn and unwashed</span>
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <svg class="text-accent mt-1 shrink-0" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        <span>Original tags attached</span>
                                    </li>
                                </ul>
                                <ul class="space-y-3">
                                    <li class="flex items-start gap-2">
                                        <svg class="text-accent mt-1 shrink-0" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        <span>No restocking fees</span>
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <svg class="text-accent mt-1 shrink-0" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        <span>Easy email process</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div id="damaged-items" class="bg-surface-alt p-6 rounded-xl border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-3">Damaged or Incorrect Items</h3>
                            <p>If you receive an item that is damaged or incorrect, please contact us immediately at **support@shopkelli.com** with photos of the issue. We will prioritize sending a replacement at no additional cost to you.</p>
                        </div>

                        <div>
                            <h3 class="text-foreground font-semibold text-xl mb-4">How to Return</h3>
                            <ol class="list-decimal pl-5 space-y-4">
                                <li><strong>Initiate:</strong> Email <a href="mailto:support@shopkelli.com" class="text-accent hover:underline font-medium">support@shopkelli.com</a> with your order number.</li>
                                <li><strong>Prepare:</strong> Pack your items securely with tags attached.</li>
                                <li><strong>Ship:</strong> Send the package to our boutique address below. (Return shipping costs are the responsibility of the customer).</li>
                                <li><strong>Refund:</strong> Once inspected, we will issue a refund to your original payment method within 5-7 business days.</li>
                            </ol>
                        </div>
                    </div>
                </div>

                <!-- Final Reassurance -->
                <div class="text-center bg-surface p-12 rounded-2xl border border-dashed border-accent/30">
                    <h3 class="font-heading text-2xl text-foreground mb-4">Need help with your order?</h3>
                    <p class="text-foreground-muted mb-8 max-w-md mx-auto">Our boutique team is here to help you Monday through Saturday, 10:00 AM – 6:00 PM (PST).</p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="mailto:support@shopkelli.com" class="inline-flex items-center justify-center bg-accent text-white px-8 py-3 rounded-full font-medium hover:bg-accent-hover transition-colors shadow-lg shadow-accent/20">
                            Email Support
                        </a>
                        <a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" class="inline-flex items-center justify-center bg-white text-foreground border border-border px-8 py-3 rounded-full font-medium hover:bg-surface transition-colors">
                            Contact Us
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
