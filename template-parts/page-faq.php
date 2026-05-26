<?php
/**
 * Template Part: FAQ Page
 * 
 * This template follows Google Merchant Center (GMC) standards and the Shop Kelli Design System.
 * It provides clear, transparent answers to common customer questions, building trust and reducing support load.
 */
?>

<section class="bg-surface py-16 md:py-24">
    <div class="container mx-auto px-4 max-w-4xl">
        <!-- Header -->
        <div class="text-center mb-16">
            <span class="text-accent font-medium tracking-widest uppercase text-sm mb-4 block">Common Questions</span>
            <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl text-foreground font-bold mb-6 tracking-tight">Frequently Asked Questions</h1>
            <p class="text-foreground-muted text-lg max-w-2xl mx-auto leading-relaxed">
                Everything you need to know about our boutique pieces, shipping, and more. Can't find the answer you're looking for? <a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" class="text-accent hover:underline font-medium">Contact our friendly team</a>.
            </p>
        </div>

        <div class="space-y-12">
            <!-- category: Orders & Payments -->
            <div class="faq-category">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-12 h-12 bg-accent-soft rounded-full flex items-center justify-center text-accent">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                    </div>
                    <h2 class="font-heading text-3xl text-foreground font-semibold">Orders & Payments</h2>
                </div>

                <div class="space-y-4">
                    <div class="faq-item group bg-background rounded-2xl border border-border overflow-hidden transition-all duration-normal hover:shadow-card">
                        <button class="faq-trigger w-full flex items-center justify-between p-6 md:p-8 text-left outline-none focus:bg-surface-alt transition-colors">
                            <span class="font-medium text-lg text-foreground pr-8">What payment methods do you accept?</span>
                            <span class="faq-icon text-accent transition-transform duration-normal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                            </span>
                        </button>
                        <div class="faq-content hidden px-6 md:px-8 pb-8 md:pb-10 pt-2 md:pt-4 text-foreground-muted border-t border-border/50 bg-surface/30">
                            <p>We accept all major credit cards (Visa, Mastercard, American Express, Discover), PayPal, Apple Pay, and Google Pay. All transactions are securely processed and encrypted for your safety.</p>
                        </div>
                    </div>

                    <div class="faq-item group bg-background rounded-2xl border border-border overflow-hidden transition-all duration-normal hover:shadow-card">
                        <button class="faq-trigger w-full flex items-center justify-between p-6 md:p-8 text-left outline-none focus:bg-surface-alt transition-colors">
                            <span class="font-medium text-lg text-foreground pr-8">Can I modify or cancel my order after it's placed?</span>
                            <span class="faq-icon text-accent transition-transform duration-normal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                            </span>
                        </button>
                        <div class="faq-content hidden px-6 md:px-8 pb-8 md:pb-10 pt-2 md:pt-4 text-foreground-muted border-t border-border/50 bg-surface/30">
                            <p>We aim to process orders quickly. If you need to change or cancel an order, please contact us at <a href="mailto:support@shopkelli.com" class="text-accent hover:underline font-medium">support@shopkelli.com</a> within 2 hours of placing your order. Once an order has been processed for shipping, we are unable to make changes.</p>
                        </div>
                    </div>

                    <div class="faq-item group bg-background rounded-2xl border border-border overflow-hidden transition-all duration-normal hover:shadow-card">
                        <button class="faq-trigger w-full flex items-center justify-between p-6 md:p-8 text-left outline-none focus:bg-surface-alt transition-colors">
                            <span class="font-medium text-lg text-foreground pr-8">How do I track my order?</span>
                            <span class="faq-icon text-accent transition-transform duration-normal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                            </span>
                        </button>
                        <div class="faq-content hidden px-6 md:px-8 pb-8 md:pb-10 pt-2 md:pt-4 text-foreground-muted border-t border-border/50 bg-surface/30">
                            <p>Once your order ships, you will receive an email with your tracking number and a link to follow its journey. You can also track your order directly on our <a href="<?php echo esc_url( home_url( '/track-order/' ) ); ?>" class="text-accent hover:underline font-medium">Order Tracking page</a>.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- category: Shipping & Delivery -->
            <div class="faq-category">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-12 h-12 bg-accent-soft rounded-full flex items-center justify-center text-accent">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                    </div>
                    <h2 class="font-heading text-3xl text-foreground font-semibold">Shipping & Delivery</h2>
                </div>

                <div class="space-y-4">
                    <div class="faq-item group bg-background rounded-2xl border border-border overflow-hidden transition-all duration-normal hover:shadow-card">
                        <button class="faq-trigger w-full flex items-center justify-between p-6 md:p-8 text-left outline-none focus:bg-surface-alt transition-colors">
                            <span class="font-medium text-lg text-foreground pr-8">How long will it take to receive my order?</span>
                            <span class="faq-icon text-accent transition-transform duration-normal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                            </span>
                        </button>
                        <div class="faq-content hidden px-6 md:px-8 pb-8 md:pb-10 pt-2 md:pt-4 text-foreground-muted border-t border-border/50 bg-surface/30">
                            <p>Orders placed before our 5:00 PM Pacific Standard Time cutoff are typically processed within 1-3 business days, Monday-Friday. Shipping transit time is 3-5 business days after processing is complete, so estimated total delivery time is 4-8 business days. For full details, please visit our <a href="<?php echo esc_url( home_url( '/shipping-policy/' ) ); ?>" class="text-accent hover:underline font-medium">Shipping Policy</a>.</p>
                        </div>
                    </div>

                    <div class="faq-item group bg-background rounded-2xl border border-border overflow-hidden transition-all duration-normal hover:shadow-card">
                        <button class="faq-trigger w-full flex items-center justify-between p-6 md:p-8 text-left outline-none focus:bg-surface-alt transition-colors">
                            <span class="font-medium text-lg text-foreground pr-8">What are your shipping costs?</span>
                            <span class="faq-icon text-accent transition-transform duration-normal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                            </span>
                        </button>
                        <div class="faq-content hidden px-6 md:px-8 pb-8 md:pb-10 pt-2 md:pt-4 text-foreground-muted border-t border-border/50 bg-surface/30">
                            <p>We offer free standard shipping on all orders within the United States.</p>
                        </div>
                    </div>

                    <div class="faq-item group bg-background rounded-2xl border border-border overflow-hidden transition-all duration-normal hover:shadow-card">
                        <button class="faq-trigger w-full flex items-center justify-between p-6 md:p-8 text-left outline-none focus:bg-surface-alt transition-colors">
                            <span class="font-medium text-lg text-foreground pr-8">Where do you ship?</span>
                            <span class="faq-icon text-accent transition-transform duration-normal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                            </span>
                        </button>
                        <div class="faq-content hidden px-6 md:px-8 pb-8 md:pb-10 pt-2 md:pt-4 text-foreground-muted border-t border-border/50 bg-surface/30">
                            <p>Shop Kelli currently serves customers in the United States only.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- category: Returns & Exchanges -->
            <div class="faq-category">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-12 h-12 bg-accent-soft rounded-full flex items-center justify-center text-accent">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"></path><polyline points="3 3 3 8 8 8"></polyline></svg>
                    </div>
                    <h2 class="font-heading text-3xl text-foreground font-semibold">Returns & Exchanges</h2>
                </div>

                <div class="space-y-4">
                    <div class="faq-item group bg-background rounded-2xl border border-border overflow-hidden transition-all duration-normal hover:shadow-card">
                        <button class="faq-trigger w-full flex items-center justify-between p-6 md:p-8 text-left outline-none focus:bg-surface-alt transition-colors">
                            <span class="font-medium text-lg text-foreground pr-8">What is your return policy?</span>
                            <span class="faq-icon text-accent transition-transform duration-normal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                            </span>
                        </button>
                        <div class="faq-content hidden px-6 md:px-8 pb-8 md:pb-10 pt-2 md:pt-4 text-foreground-muted border-t border-border/50 bg-surface/30">
                            <p>We accept returns within 30 days of delivery for eligible new-condition items. Items must be unused, unworn, in original condition, and returned with original tags and packaging. For full details, please see our <a href="<?php echo esc_url( home_url( '/refund-return-policy/' ) ); ?>" class="text-accent hover:underline font-medium">Refund & Return Policy</a>.</p>
                        </div>
                    </div>

                    <div class="faq-item group bg-background rounded-2xl border border-border overflow-hidden transition-all duration-normal hover:shadow-card">
                        <button class="faq-trigger w-full flex items-center justify-between p-6 md:p-8 text-left outline-none focus:bg-surface-alt transition-colors">
                            <span class="font-medium text-lg text-foreground pr-8">How do I start a return?</span>
                            <span class="faq-icon text-accent transition-transform duration-normal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                            </span>
                        </button>
                        <div class="faq-content hidden px-6 md:px-8 pb-8 md:pb-10 pt-2 md:pt-4 text-foreground-muted border-t border-border/50 bg-surface/30">
                            <p>To start a return or exchange, email us at <a href="mailto:support@shopkelli.com" class="text-accent hover:underline font-medium">support@shopkelli.com</a> with your order number and the item details. Return label and return shipping costs are the customer's responsibility unless your item arrived damaged, defective, or incorrect.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- category: Product & Sizing -->
            <div class="faq-category">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-12 h-12 bg-accent-soft rounded-full flex items-center justify-center text-accent">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.24 12.24a6 6 0 0 0-8.49-8.49L5 10.5V19h8.5z"></path><line x1="16" y1="8" x2="2" y2="22"></line><line x1="17.5" y1="15" x2="9" y2="15"></line></svg>
                    </div>
                    <h2 class="font-heading text-3xl text-foreground font-semibold">Product & Sizing</h2>
                </div>

                <div class="space-y-4">
                    <div class="faq-item group bg-background rounded-2xl border border-border overflow-hidden transition-all duration-normal hover:shadow-card">
                        <button class="faq-trigger w-full flex items-center justify-between p-6 md:p-8 text-left outline-none focus:bg-surface-alt transition-colors">
                            <span class="font-medium text-lg text-foreground pr-8">How do I know which size to order?</span>
                            <span class="faq-icon text-accent transition-transform duration-normal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                            </span>
                        </button>
                        <div class="faq-content hidden px-6 md:px-8 pb-8 md:pb-10 pt-2 md:pt-4 text-foreground-muted border-t border-border/50 bg-surface/30">
                            <p>We include specific sizing information on each product page. Since we carry various boutique brands, fit can vary slightly. If you're between sizes, we generally recommend sizing up for kids' items to allow for growth!</p>
                        </div>
                    </div>

                    <div class="faq-item group bg-background rounded-2xl border border-border overflow-hidden transition-all duration-normal hover:shadow-card">
                        <button class="faq-trigger w-full flex items-center justify-between p-6 md:p-8 text-left outline-none focus:bg-surface-alt transition-colors">
                            <span class="font-medium text-lg text-foreground pr-8">How should I care for my boutique pieces?</span>
                            <span class="faq-icon text-accent transition-transform duration-normal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                            </span>
                        </button>
                        <div class="faq-content hidden px-6 md:px-8 pb-8 md:pb-10 pt-2 md:pt-4 text-foreground-muted border-t border-border/50 bg-surface/30">
                            <p>To keep your items looking beautiful, we recommend following the care instructions on the label. Most of our delicate pieces benefit from hand washing or a gentle machine cycle in cold water, followed by hanging to dry.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Still Have Questions? -->
        <div class="mt-20 bg-accent-soft p-10 md:p-16 rounded-3xl text-center">
            <h3 class="font-heading text-3xl text-foreground font-bold mb-4">Still have questions?</h3>
            <p class="text-foreground-muted text-lg mb-8 max-w-xl mx-auto">
                Our family is here to help yours. Reach out anytime and we'll get back to you as soon as possible.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" class="inline-flex items-center justify-center px-8 py-4 bg-accent text-white font-semibold rounded-full hover:bg-accent-hover transition-colors shadow-lg shadow-accent/20">
                    Contact Support
                </a>
                <a href="mailto:support@shopkelli.com" class="inline-flex items-center justify-center px-8 py-4 bg-white text-foreground font-semibold rounded-full border border-border hover:bg-surface-alt transition-colors">
                    Email Us Directly
                </a>
            </div>
        </div>

        <!-- Policy Links Footer -->
        <div class="mt-16 pt-8 border-t border-border flex flex-wrap justify-center gap-x-8 gap-y-4 text-sm text-muted">
            <a href="<?php echo esc_url( home_url( '/shipping-policy/' ) ); ?>" class="hover:text-accent transition-colors">Shipping Policy</a>
            <a href="<?php echo esc_url( home_url( '/refund-return-policy/' ) ); ?>" class="hover:text-accent transition-colors">Refund & Return Policy</a>
            <a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>" class="hover:text-accent transition-colors">Privacy Policy</a>
            <a href="<?php echo esc_url( home_url( '/terms-conditions/' ) ); ?>" class="hover:text-accent transition-colors">Terms of Service</a>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const faqTriggers = document.querySelectorAll('.faq-trigger');
    
    faqTriggers.forEach(trigger => {
        trigger.addEventListener('click', function() {
            const item = this.parentElement;
            const content = this.nextElementSibling;
            const icon = this.querySelector('.faq-icon');
            
            // Toggle current item
            const isOpen = !content.classList.contains('hidden');
            
            if (isOpen) {
                content.classList.add('hidden');
                icon.style.transform = 'rotate(0deg)';
            } else {
                content.classList.remove('hidden');
                icon.style.transform = 'rotate(180deg)';
            }
        });
    });
});
</script>
