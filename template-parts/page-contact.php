<?php
/**
 * Template Part: Contact Page
 * Brand: UK Official Store
 * Description: Clean, professional contact page with support details and inquiry form.
 */

$support_email = 'support@ukofficialstore.com';
$business_hours = 'Monday-Friday, 9:00 AM-6:00 PM PST';
?>

<div class="bg-white text-foreground">
    <!-- Hero Section -->
    <section class="bg-navy py-16 md:py-24 text-white">
        <div class="mx-auto max-w-7xl px-6 text-center">
            <span class="text-blue font-bold uppercase tracking-widest text-sm mb-4 block">Customer Support</span>
            <h1 class="text-4xl md:text-6xl font-heading font-bold mb-6">Contact UK Official Store</h1>
            <p class="text-lg md:text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
                We're here to help with your activewear orders, sizing questions, delivery status, and return requests for our dry-fit sportswear collections.
            </p>
        </div>
    </section>

    <!-- Contact Info & Form -->
    <section class="py-20">
        <div class="mx-auto max-w-7xl px-6">
            <div class="grid lg:grid-cols-2 gap-16">
                <!-- Info Column -->
                <div>
                    <h2 class="text-3xl font-heading font-bold text-navy mb-8">Get in touch</h2>
                    
                    <div class="space-y-8">
                        <div class="flex gap-6">
                            <div class="w-12 h-12 rounded-xl bg-blue/10 text-blue flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-navy mb-1">Email Support</h4>
                                <a href="mailto:<?php echo $support_email; ?>" class="text-blue hover:underline font-semibold"><?php echo $support_email; ?></a>
                                <p class="text-sm text-foreground-muted mt-2">Expect a personal reply within 24–48 business hours.</p>
                            </div>
                        </div>

                        <div class="flex gap-6">
                            <div class="w-12 h-12 rounded-xl bg-blue/10 text-blue flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-navy mb-1">Business Hours</h4>
                                <p class="text-foreground-muted"><?php echo $business_hours; ?></p>
                                <p class="text-sm text-foreground-muted mt-2">Support requests sent outside these hours will be reviewed the next business day.</p>
                            </div>
                        </div>

                        <div class="flex gap-6">
                            <div class="w-12 h-12 rounded-xl bg-blue/10 text-blue flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-navy mb-1">Order Support</h4>
                                <p class="text-foreground-muted">Please include your order number for faster assistance with shipping, tracking, or returns.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Extra Help Card -->
                    <div class="mt-12 p-8 bg-surface-alt rounded-2xl border border-border">
                        <h4 class="font-bold text-navy mb-4">Quick Links</h4>
                        <div class="grid gap-3">
                            <a href="/track-order/" class="flex items-center justify-between p-4 bg-white rounded-lg border border-border hover:border-blue transition-colors group">
                                <span class="font-medium text-navy group-hover:text-blue transition-colors">Track Your Order</span>
                                <svg class="w-5 h-5 text-blue transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                            <a href="/shipping-policy/" class="flex items-center justify-between p-4 bg-white rounded-lg border border-border hover:border-blue transition-colors group">
                                <span class="font-medium text-navy group-hover:text-blue transition-colors">Shipping Policy</span>
                                <svg class="w-5 h-5 text-blue transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                            <a href="/return-refund-policy/" class="flex items-center justify-between p-4 bg-white rounded-lg border border-border hover:border-blue transition-colors group">
                                <span class="font-medium text-navy group-hover:text-blue transition-colors">Return & Refund Policy</span>
                                <svg class="w-5 h-5 text-blue transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Form Column -->
                <div class="bg-white p-8 md:p-10 rounded-2xl border border-border shadow-xl">
                    <h3 class="text-2xl font-heading font-bold text-navy mb-6">Send us a message</h3>
                    <form id="da-contact-form" class="space-y-6" novalidate>
                        <?php wp_nonce_field( 'da_contact_nonce', 'da_contact_nonce_field' ); ?>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-navy mb-2 uppercase tracking-widest">First Name</label>
                                <input type="text" name="first_name" class="w-full px-4 py-3 rounded-lg border border-border focus:border-blue focus:ring-1 focus:ring-blue outline-none transition bg-surface-alt" placeholder="e.g. John" required>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-navy mb-2 uppercase tracking-widest">Last Name</label>
                                <input type="text" name="last_name" class="w-full px-4 py-3 rounded-lg border border-border focus:border-blue focus:ring-1 focus:ring-blue outline-none transition bg-surface-alt" placeholder="e.g. Doe" required>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-navy mb-2 uppercase tracking-widest">Email Address</label>
                            <input type="email" name="email" class="w-full px-4 py-3 rounded-lg border border-border focus:border-blue focus:ring-1 focus:ring-blue outline-none transition bg-surface-alt" placeholder="john.doe@example.com" required>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-navy mb-2 uppercase tracking-widest">Order Number (Optional)</label>
                            <input type="text" name="order_number" class="w-full px-4 py-3 rounded-lg border border-border focus:border-blue focus:ring-1 focus:ring-blue outline-none transition bg-surface-alt" placeholder="#0000">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-navy mb-2 uppercase tracking-widest">Message</label>
                            <textarea name="message" rows="5" class="w-full px-4 py-3 rounded-lg border border-border focus:border-blue focus:ring-1 focus:ring-blue outline-none transition bg-surface-alt" placeholder="How can we help you?" required></textarea>
                        </div>
                        <div id="da-contact-feedback" class="hidden text-sm font-medium rounded-lg px-4 py-3"></div>
                        <button type="submit" id="da-contact-submit" class="w-full py-4 bg-blue hover:bg-navy text-white font-bold rounded-lg transition-all duration-normal text-lg shadow-lg shadow-blue/20 hover:shadow-navy/20">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
