<?php
/**
 * Template Part: FAQ Page
 */

$support_email = 'support@brogeshoes.com';
?>

<section class="bg-surface py-16 md:py-24">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="text-center mb-14">
            <span class="text-accent font-medium tracking-widest uppercase text-sm mb-4 block"><?php esc_html_e('Help Center', 'dawp'); ?></span>
            <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl text-foreground font-bold mb-6 tracking-tight"><?php esc_html_e('Frequently Asked Questions', 'dawp'); ?></h1>
            <p class="text-foreground-muted text-lg max-w-3xl mx-auto leading-relaxed">
                <?php esc_html_e('Transparent answers about Broge Shoes orders, delivery timelines, returns, refunds, exchanges, and footwear condition requirements.', 'dawp'); ?>
            </p>
        </div>

        <div class="grid lg:grid-cols-12 gap-8 items-start">
            <div class="hidden lg:block lg:col-span-3 sticky top-24">
                <nav class="space-y-3" aria-label="<?php esc_attr_e('FAQ sections', 'dawp'); ?>">
                    <a href="#faq-orders" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium"><?php esc_html_e('Orders', 'dawp'); ?></a>
                    <a href="#faq-shipping" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium"><?php esc_html_e('Shipping', 'dawp'); ?></a>
                    <a href="#faq-tracking" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium"><?php esc_html_e('Tracking & Delivery Issues', 'dawp'); ?></a>
                    <a href="#faq-returns" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium"><?php esc_html_e('Returns', 'dawp'); ?></a>
                    <a href="#faq-refunds" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium"><?php esc_html_e('Refunds & Exchanges', 'dawp'); ?></a>
                    <a href="#faq-support" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium"><?php esc_html_e('Support', 'dawp'); ?></a>
                </nav>
            </div>

            <div class="lg:col-span-9 space-y-8">
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="bg-background p-6 rounded-lg border border-border shadow-card">
                        <p class="text-accent font-semibold uppercase text-xs tracking-widest mb-2"><?php esc_html_e('Delivery Estimate', 'dawp'); ?></p>
                        <p class="text-foreground text-2xl font-bold"><?php esc_html_e('6-9 Business Days', 'dawp'); ?></p>
                        <p class="text-foreground-muted text-sm mt-2"><?php esc_html_e('Most standard orders.', 'dawp'); ?></p>
                    </div>
                    <div class="bg-background p-6 rounded-lg border border-border shadow-card">
                        <p class="text-accent font-semibold uppercase text-xs tracking-widest mb-2"><?php esc_html_e('Return Window', 'dawp'); ?></p>
                        <p class="text-foreground text-2xl font-bold"><?php esc_html_e('30 Days', 'dawp'); ?></p>
                        <p class="text-foreground-muted text-sm mt-2"><?php esc_html_e('From delivery date.', 'dawp'); ?></p>
                    </div>
                    <div class="bg-background p-6 rounded-lg border border-border shadow-card">
                        <p class="text-accent font-semibold uppercase text-xs tracking-widest mb-2"><?php esc_html_e('Restocking Fee', 'dawp'); ?></p>
                        <p class="text-foreground text-2xl font-bold"><?php esc_html_e('$0', 'dawp'); ?></p>
                        <p class="text-foreground-muted text-sm mt-2"><?php esc_html_e('For eligible returns.', 'dawp'); ?></p>
                    </div>
                    <div class="bg-background p-6 rounded-lg border border-border shadow-card">
                        <p class="text-accent font-semibold uppercase text-xs tracking-widest mb-2"><?php esc_html_e('Support Hours', 'dawp'); ?></p>
                        <p class="text-foreground text-2xl font-bold"><?php esc_html_e('Mon-Fri', 'dawp'); ?></p>
                        <p class="text-foreground-muted text-sm mt-2"><?php esc_html_e('Monday-Friday, 9:00 AM-5:00 PM PST', 'dawp'); ?></p>
                    </div>
                </div>

                <div id="faq-orders" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('Orders', 'dawp'); ?></h2>
                    <div class="space-y-4">
                        <details class="group bg-surface rounded-lg border border-border overflow-hidden">
                            <summary class="flex cursor-pointer list-none items-center justify-between gap-4 p-6 font-semibold text-foreground">
                                <span><?php esc_html_e('What happens after I place an order?', 'dawp'); ?></span>
                                <span class="text-accent transition-transform group-open:rotate-180" aria-hidden="true">&#9662;</span>
                            </summary>
                            <div class="px-6 pb-6 text-foreground-muted leading-relaxed">
                                <p><?php esc_html_e('After checkout, we review and process your order before fulfillment. Standard handling usually takes 1-2 business days, Monday to Friday.', 'dawp'); ?></p>
                            </div>
                        </details>

                        <details class="group bg-surface rounded-lg border border-border overflow-hidden">
                            <summary class="flex cursor-pointer list-none items-center justify-between gap-4 p-6 font-semibold text-foreground">
                                <span><?php esc_html_e('Can I change my shipping address after ordering?', 'dawp'); ?></span>
                                <span class="text-accent transition-transform group-open:rotate-180" aria-hidden="true">&#9662;</span>
                            </summary>
                            <div class="px-6 pb-6 text-foreground-muted leading-relaxed">
                                <p><?php esc_html_e('Please contact us as soon as possible if your shipping address is incorrect. We cannot guarantee address changes after fulfillment begins, so the address should be reviewed carefully before checkout.', 'dawp'); ?></p>
                            </div>
                        </details>

                        <details class="group bg-surface rounded-lg border border-border overflow-hidden">
                            <summary class="flex cursor-pointer list-none items-center justify-between gap-4 p-6 font-semibold text-foreground">
                                <span><?php esc_html_e('Where does Broge Shoes ship?', 'dawp'); ?></span>
                                <span class="text-accent transition-transform group-open:rotate-180" aria-hidden="true">&#9662;</span>
                            </summary>
                            <div class="px-6 pb-6 text-foreground-muted leading-relaxed">
                                <p><?php esc_html_e('Broge Shoes ships eligible orders to delivery addresses within the United States. Carrier service may vary by destination, address type, holidays, and regional availability.', 'dawp'); ?></p>
                            </div>
                        </details>
                    </div>
                </div>

                <div id="faq-shipping" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('Shipping', 'dawp'); ?></h2>
                    <div class="space-y-4">
                        <details class="group bg-surface rounded-lg border border-border overflow-hidden">
                            <summary class="flex cursor-pointer list-none items-center justify-between gap-4 p-6 font-semibold text-foreground">
                                <span><?php esc_html_e('How long does delivery take?', 'dawp'); ?></span>
                                <span class="text-accent transition-transform group-open:rotate-180" aria-hidden="true">&#9662;</span>
                            </summary>
                            <div class="px-6 pb-6 text-foreground-muted leading-relaxed space-y-4">
                                <p><?php esc_html_e('Order handling usually takes 1-2 business days, Monday to Friday. Transit time usually takes 5-7 business days after handling is complete.', 'dawp'); ?></p>
                                <p><?php esc_html_e('Most standard orders are delivered in approximately 6-9 business days. Some bulky, oversized, freight, special handling, or partner-shipped items may need more time.', 'dawp'); ?></p>
                            </div>
                        </details>

                        <details class="group bg-surface rounded-lg border border-border overflow-hidden">
                            <summary class="flex cursor-pointer list-none items-center justify-between gap-4 p-6 font-semibold text-foreground">
                                <span><?php esc_html_e('What is the daily order cutoff time?', 'dawp'); ?></span>
                                <span class="text-accent transition-transform group-open:rotate-180" aria-hidden="true">&#9662;</span>
                            </summary>
                            <div class="px-6 pb-6 text-foreground-muted leading-relaxed">
                                <p><?php esc_html_e('The order cutoff time is 5:00 PM, GMT-08:00 Pacific Standard Time, Los Angeles. Orders placed after cutoff, on weekends, or on holidays begin processing on the next business day.', 'dawp'); ?></p>
                            </div>
                        </details>

                        <details class="group bg-surface rounded-lg border border-border overflow-hidden">
                            <summary class="flex cursor-pointer list-none items-center justify-between gap-4 p-6 font-semibold text-foreground">
                                <span><?php esc_html_e('How are shipping costs shown?', 'dawp'); ?></span>
                                <span class="text-accent transition-transform group-open:rotate-180" aria-hidden="true">&#9662;</span>
                            </summary>
                            <div class="px-6 pb-6 text-foreground-muted leading-relaxed">
                                <p><?php esc_html_e('Shipping costs, if applicable, are shown at checkout before you place your order. Any special shipping adjustment will be communicated before fulfillment.', 'dawp'); ?></p>
                            </div>
                        </details>
                    </div>
                </div>

                <div id="faq-tracking" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('Tracking & Delivery Issues', 'dawp'); ?></h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('How do I track my order?', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed mb-5"><?php esc_html_e('Tracking information is sent to the email address used at checkout after your order ships. Tracking updates may take time to appear after the carrier receives the package.', 'dawp'); ?></p>
                            <a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="inline-flex items-center justify-center bg-accent text-white px-6 py-3 rounded-full font-medium hover:bg-accent-hover transition-colors"><?php esc_html_e('Track Order', 'dawp'); ?></a>
                        </div>
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('What if my package is lost or damaged?', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Contact support with your order number and shipping address. For damaged packages or products, include clear photos of the package and item so we can review the issue.', 'dawp'); ?></p>
                        </div>
                    </div>
                </div>

                <div id="faq-returns" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('Returns', 'dawp'); ?></h2>
                    <div class="space-y-4">
                        <details class="group bg-surface rounded-lg border border-border overflow-hidden">
                            <summary class="flex cursor-pointer list-none items-center justify-between gap-4 p-6 font-semibold text-foreground">
                                <span><?php esc_html_e('What is your return window?', 'dawp'); ?></span>
                                <span class="text-accent transition-transform group-open:rotate-180" aria-hidden="true">&#9662;</span>
                            </summary>
                            <div class="px-6 pb-6 text-foreground-muted leading-relaxed">
                                <p><?php esc_html_e('Broge Shoes accepts eligible returns within 30 days from the delivery date. Items must be unused, unworn, undamaged, in original condition, and returned with original packaging where applicable.', 'dawp'); ?></p>
                            </div>
                        </details>

                        <details class="group bg-surface rounded-lg border border-border overflow-hidden">
                            <summary class="flex cursor-pointer list-none items-center justify-between gap-4 p-6 font-semibold text-foreground">
                                <span><?php esc_html_e('What footwear condition is required for a return?', 'dawp'); ?></span>
                                <span class="text-accent transition-transform group-open:rotate-180" aria-hidden="true">&#9662;</span>
                            </summary>
                            <div class="px-6 pb-6 text-foreground-muted leading-relaxed">
                                <p><?php esc_html_e('Eligible footwear must be unworn, undamaged, free of outdoor wear, stains, heavy creasing, or sole marks, and returned with original packaging where applicable.', 'dawp'); ?></p>
                            </div>
                        </details>

                        <details class="group bg-surface rounded-lg border border-border overflow-hidden">
                            <summary class="flex cursor-pointer list-none items-center justify-between gap-4 p-6 font-semibold text-foreground">
                                <span><?php esc_html_e('How do I start a return?', 'dawp'); ?></span>
                                <span class="text-accent transition-transform group-open:rotate-180" aria-hidden="true">&#9662;</span>
                            </summary>
                            <div class="px-6 pb-6 text-foreground-muted leading-relaxed">
                                <p><?php printf(esc_html__('Email %s with your order number, item details, and reason for return. Please wait for return authorization and instructions before mailing any item back.', 'dawp'), '<a href="mailto:' . esc_attr($support_email) . '" class="text-accent hover:underline font-medium">' . esc_html($support_email) . '</a>'); ?></p>
                            </div>
                        </details>
                    </div>
                </div>

                <div id="faq-refunds" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('Refunds & Exchanges', 'dawp'); ?></h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Who pays return shipping?', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('If a product is defective, incorrect, or damaged, Broge Shoes will cover return shipping or provide a prepaid label after review and approval. For wrong size, wrong color, wrong model, preference changes, or customer remorse, the customer pays the actual return shipping cost.', 'dawp'); ?></p>
                        </div>
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('When will I receive my refund?', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('After your return is received, inspected, and approved, refunds are processed to the original payment method. Refund timing is typically up to 7 days depending on your bank or payment provider.', 'dawp'); ?></p>
                        </div>
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Do you charge a restocking fee?', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('No. Broge Shoes does not charge a restocking fee for eligible returns that meet the return condition requirements and are approved through the return authorization process.', 'dawp'); ?></p>
                        </div>
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Can I exchange an item?', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Exchanges are subject to stock availability. In some cases, the fastest option may be to return the eligible item for a refund and place a new order for the preferred size, color, or style.', 'dawp'); ?></p>
                        </div>
                    </div>
                </div>

                <div class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('Policy Details', 'dawp'); ?></h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>" class="block bg-surface p-6 rounded-lg border border-border hover:border-accent transition-all">
                            <h3 class="text-foreground font-semibold text-xl mb-3"><?php esc_html_e('Shipping Policy', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Read full delivery timelines, carrier details, tracking support, and delivery issue information.', 'dawp'); ?></p>
                        </a>
                        <a href="<?php echo esc_url(home_url('/refund-return-policy/')); ?>" class="block bg-surface p-6 rounded-lg border border-border hover:border-accent transition-all">
                            <h3 class="text-foreground font-semibold text-xl mb-3"><?php esc_html_e('Refund & Return Policy', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Read full return eligibility, refund timing, exchange options, and footwear condition requirements.', 'dawp'); ?></p>
                        </a>
                    </div>
                </div>

                <div id="faq-support" class="text-center bg-surface p-10 rounded-lg border border-dashed border-accent/30">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-4"><?php esc_html_e('Still Have Questions?', 'dawp'); ?></h2>
                    <p class="text-foreground-muted mb-8 max-w-2xl mx-auto"><?php esc_html_e('Broge Shoes customer support is available Monday-Friday, 9:00 AM-5:00 PM PST.', 'dawp'); ?></p>
                    <dl class="grid md:grid-cols-2 gap-4 text-sm text-left mb-8">
                        <div class="bg-background p-5 rounded-lg border border-border">
                            <dt class="text-accent font-semibold uppercase text-xs tracking-widest mb-2"><?php esc_html_e('Store Name', 'dawp'); ?></dt>
                            <dd class="text-foreground font-semibold"><?php esc_html_e('Broge Shoes', 'dawp'); ?></dd>
                        </div>
                        <div class="bg-background p-5 rounded-lg border border-border">
                            <dt class="text-accent font-semibold uppercase text-xs tracking-widest mb-2"><?php esc_html_e('Email', 'dawp'); ?></dt>
                            <dd><a href="mailto:<?php echo esc_attr($support_email); ?>" class="text-foreground font-semibold hover:text-accent"><?php echo esc_html($support_email); ?></a></dd>
                        </div>
                    </dl>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex items-center justify-center bg-accent text-white px-8 py-3 rounded-full font-medium hover:bg-accent-hover transition-colors shadow-lg shadow-accent/20"><?php esc_html_e('Email Support', 'dawp'); ?></a>
                        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex items-center justify-center bg-white text-foreground border border-border px-8 py-3 rounded-full font-medium hover:bg-surface transition-colors"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
