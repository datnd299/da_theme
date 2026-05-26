<?php
/**
 * Template Part: Shipping Policy Page
 */

$support_email = 'support@brogeshoes.com';
?>

<section class="bg-surface py-16 md:py-24">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="text-center mb-14">
            <span class="text-accent font-medium tracking-widest uppercase text-sm mb-4 block"><?php esc_html_e('Shipping Policy', 'dawp'); ?></span>
            <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl text-foreground font-bold mb-6 tracking-tight"><?php esc_html_e('Shipping Policy', 'dawp'); ?></h1>
            <p class="text-foreground-muted text-lg max-w-3xl mx-auto leading-relaxed">
                <?php esc_html_e('Clear delivery timelines, shipping locations, carrier details, and tracking support for Broge Shoes orders.', 'dawp'); ?>
            </p>
        </div>

        <div class="grid lg:grid-cols-12 gap-8 items-start">
            <div class="hidden lg:block lg:col-span-3 sticky top-24">
                <nav class="space-y-3" aria-label="<?php esc_attr_e('Shipping policy sections', 'dawp'); ?>">
                    <a href="#shipping-locations" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium"><?php esc_html_e('Shipping Locations', 'dawp'); ?></a>
                    <a href="#processing-cutoff" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium"><?php esc_html_e('Processing & Cutoff', 'dawp'); ?></a>
                    <a href="#estimated-delivery" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium"><?php esc_html_e('Estimated Delivery', 'dawp'); ?></a>
                    <a href="#tracking-order" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium"><?php esc_html_e('Tracking Your Order', 'dawp'); ?></a>
                    <a href="#delivery-issues" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium"><?php esc_html_e('Delivery Issues', 'dawp'); ?></a>
                    <a href="#shipping-support" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium"><?php esc_html_e('Customer Support', 'dawp'); ?></a>
                </nav>
            </div>

            <div class="lg:col-span-9 space-y-8">
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="bg-background p-6 rounded-lg border border-border shadow-card">
                        <p class="text-accent font-semibold uppercase text-xs tracking-widest mb-2"><?php esc_html_e('Order Cutoff', 'dawp'); ?></p>
                        <p class="text-foreground text-2xl font-bold"><?php esc_html_e('5:00 PM', 'dawp'); ?></p>
                        <p class="text-foreground-muted text-sm mt-2"><?php esc_html_e('Monday-Friday, 9:00 AM-5:00 PM PST', 'dawp'); ?></p>
                    </div>
                    <div class="bg-background p-6 rounded-lg border border-border shadow-card">
                        <p class="text-accent font-semibold uppercase text-xs tracking-widest mb-2"><?php esc_html_e('Handling Time', 'dawp'); ?></p>
                        <p class="text-foreground text-2xl font-bold"><?php esc_html_e('1-2 Business Days', 'dawp'); ?></p>
                        <p class="text-foreground-muted text-sm mt-2"><?php esc_html_e('Monday to Friday.', 'dawp'); ?></p>
                    </div>
                    <div class="bg-background p-6 rounded-lg border border-border shadow-card">
                        <p class="text-accent font-semibold uppercase text-xs tracking-widest mb-2"><?php esc_html_e('Transit Time', 'dawp'); ?></p>
                        <p class="text-foreground text-2xl font-bold"><?php esc_html_e('5-7 Business Days', 'dawp'); ?></p>
                        <p class="text-foreground-muted text-sm mt-2"><?php esc_html_e('After order handling is complete.', 'dawp'); ?></p>
                    </div>
                    <div class="bg-background p-6 rounded-lg border border-border shadow-card">
                        <p class="text-accent font-semibold uppercase text-xs tracking-widest mb-2"><?php esc_html_e('Delivery Estimate', 'dawp'); ?></p>
                        <p class="text-foreground text-2xl font-bold"><?php esc_html_e('6-9 Business Days', 'dawp'); ?></p>
                        <p class="text-foreground-muted text-sm mt-2"><?php esc_html_e('Most standard orders.', 'dawp'); ?></p>
                    </div>
                </div>

                <div id="shipping-locations" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('Shipping Locations', 'dawp'); ?></h2>
                    <div class="text-foreground-muted leading-relaxed space-y-4">
                        <p><?php esc_html_e('Broge Shoes ships eligible orders to delivery addresses within the United States. Carrier service may vary by destination, address type, holidays, and regional service availability.', 'dawp'); ?></p>
                        <p><?php esc_html_e('If an address cannot be serviced, our support team will contact you using the information provided at checkout.', 'dawp'); ?></p>
                    </div>
                </div>

                <div id="processing-cutoff" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('Order Processing & Cutoff Time', 'dawp'); ?></h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Processing Schedule', 'dawp'); ?></h3>
                            <dl class="space-y-4 text-sm">
                                <div class="flex justify-between gap-4 border-b border-border pb-3">
                                    <dt class="text-foreground-muted"><?php esc_html_e('Order cutoff time', 'dawp'); ?></dt>
                                    <dd class="text-foreground font-semibold text-right"><?php esc_html_e('5:00 PM PST', 'dawp'); ?></dd>
                                </div>
                                <div class="flex justify-between gap-4 border-b border-border pb-3">
                                    <dt class="text-foreground-muted"><?php esc_html_e('Handling time', 'dawp'); ?></dt>
                                    <dd class="text-foreground font-semibold text-right"><?php esc_html_e('1-2 business days', 'dawp'); ?></dd>
                                </div>
                                <div class="flex justify-between gap-4">
                                    <dt class="text-foreground-muted"><?php esc_html_e('Business days', 'dawp'); ?></dt>
                                    <dd class="text-foreground font-semibold text-right"><?php esc_html_e('Monday-Friday, 9:00 AM-5:00 PM PST', 'dawp'); ?></dd>
                                </div>
                            </dl>
                        </div>

                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('After Cutoff', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Orders placed after 5:00 PM (GMT-08:00) Pacific Standard Time begin processing on the next business day. Weekend and holiday orders begin processing on the next available business day.', 'dawp'); ?></p>
                        </div>
                    </div>
                </div>

                <div id="estimated-delivery" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('Estimated Delivery Time', 'dawp'); ?></h2>
                    <div class="text-foreground-muted leading-relaxed space-y-4">
                        <p><?php esc_html_e('Standard order handling usually takes 1-2 business days, Monday to Friday. Transit time usually takes 5-7 business days, Monday to Friday, after handling is complete.', 'dawp'); ?></p>
                        <p><?php esc_html_e('Most orders are delivered in approximately 6-9 business days. Some items may take longer, including bulky items, special handling items, oversized or freight items, or items shipped directly from a brand or partner. We will keep customers updated when additional time is needed.', 'dawp'); ?></p>
                    </div>
                </div>

                <div id="shipping-carriers" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('Shipping Carriers & Costs', 'dawp'); ?></h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Shipping Carriers', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('We use available carrier services based on package size, delivery address, and shipping availability. Tracking details are sent when your order is prepared for shipment.', 'dawp'); ?></p>
                        </div>
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Shipping Costs', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Shipping costs, if applicable, are shown at checkout before you place your order. Any special shipping adjustment will be communicated before fulfillment.', 'dawp'); ?></p>
                        </div>
                    </div>
                </div>

                <div id="multiple-packages" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('Multiple Packages', 'dawp'); ?></h2>
                    <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Orders containing multiple items may ship in separate packages. If this happens, each package may have a different tracking number and delivery date.', 'dawp'); ?></p>
                </div>

                <div id="tracking-order" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('Tracking Your Order', 'dawp'); ?></h2>
                    <div class="text-foreground-muted leading-relaxed space-y-4">
                        <p><?php esc_html_e('After your order ships, tracking information will be sent to the email address used at checkout. Tracking updates may take time to appear after a carrier receives the package.', 'dawp'); ?></p>
                        <p><?php esc_html_e('You can also visit the order tracking page for the latest available status.', 'dawp'); ?></p>
                        <a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="inline-flex items-center justify-center bg-accent text-white px-8 py-3 rounded-full font-medium hover:bg-accent-hover transition-colors shadow-lg shadow-accent/20"><?php esc_html_e('Track Order', 'dawp'); ?></a>
                    </div>
                </div>

                <div id="delivery-issues" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('Delivery Issues', 'dawp'); ?></h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Incorrect Shipping Address', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Please review your shipping address carefully before placing an order. If you notice an error, contact us as soon as possible. We cannot guarantee changes after fulfillment begins.', 'dawp'); ?></p>
                        </div>
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Lost Packages', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('If tracking shows no movement or a delivered package cannot be found, contact support with your order number and shipping address so we can help review the issue.', 'dawp'); ?></p>
                        </div>
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Damaged Packages', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('If a package or item arrives damaged, contact us promptly with your order number and clear photos of the package and product so we can assist.', 'dawp'); ?></p>
                        </div>
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Shipping Restrictions', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Some addresses, locations, or items may be restricted by carrier service, package size, special handling needs, or shipping availability.', 'dawp'); ?></p>
                        </div>
                    </div>
                </div>

                <div id="delays" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('Delays', 'dawp'); ?></h2>
                    <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Weather, holidays, carrier disruptions, high order volume, customs or routing issues, and special handling requirements may extend delivery timelines. We will share updates when we receive relevant shipping information.', 'dawp'); ?></p>
                </div>

                <div id="shipping-support" class="text-center bg-surface p-10 rounded-lg border border-dashed border-accent/30">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-4"><?php esc_html_e('Need Help With Shipping?', 'dawp'); ?></h2>
                    <p class="text-foreground-muted mb-8 max-w-2xl mx-auto"><?php esc_html_e('Broge Shoes customer support is available Monday-Friday, 9:00 AM-5:00 PM PST.', 'dawp'); ?></p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex items-center justify-center bg-accent text-white px-8 py-3 rounded-full font-medium hover:bg-accent-hover transition-colors shadow-lg shadow-accent/20"><?php esc_html_e('Email Support', 'dawp'); ?></a>
                        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex items-center justify-center bg-white text-foreground border border-border px-8 py-3 rounded-full font-medium hover:bg-surface transition-colors"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
