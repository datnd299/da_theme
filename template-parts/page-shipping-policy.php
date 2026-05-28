<?php
/**
 * Template Part: Shipping Policy Page
 */

defined('ABSPATH') || exit;

$shipping_image = get_template_directory_uri() . '/assets/img/All_image/image copy 4.png';
?>

<section class="relative overflow-hidden bg-foreground py-16 text-white md:py-24">
    <div class="absolute inset-0">
        <img src="<?php echo esc_url($shipping_image); ?>" alt="<?php esc_attr_e('Women\'s black sandals for shipping policy banner', 'dawp'); ?>" class="h-full w-full object-cover opacity-45" loading="eager">
        <div class="absolute inset-0 bg-foreground/70"></div>
    </div>
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="relative text-center">
            <span class="font-medium tracking-widest uppercase text-sm mb-4 block text-white/82"><?php esc_html_e('Merchant Policies', 'dawp'); ?></span>
            <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl text-white font-bold mb-6 tracking-tight"><?php esc_html_e('Shipping Policy', 'dawp'); ?></h1>
            <p class="text-white/82 text-lg max-w-3xl mx-auto leading-relaxed">
                <?php esc_html_e('Clear shipping timelines, delivery coverage, carrier details, and tracking support for every Myveganblog order.', 'dawp'); ?>
            </p>
        </div>
    </div>
</section>

<section class="bg-surface py-16 md:py-24">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="grid lg:grid-cols-12 gap-8 items-start">
            <div class="hidden lg:block lg:col-span-3 sticky top-24">
                <nav class="space-y-3" aria-label="<?php esc_attr_e('Shipping policy sections', 'dawp'); ?>">
                    <a href="#shipping-locations" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium"><?php esc_html_e('Shipping Locations', 'dawp'); ?></a>
                    <a href="#processing-delivery" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium"><?php esc_html_e('Processing & Delivery', 'dawp'); ?></a>
                    <a href="#carriers-costs" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium"><?php esc_html_e('Carriers & Costs', 'dawp'); ?></a>
                    <a href="#tracking-packages" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium"><?php esc_html_e('Tracking & Packages', 'dawp'); ?></a>
                    <a href="#delivery-issues" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium"><?php esc_html_e('Delivery Issues', 'dawp'); ?></a>
                    <a href="#shipping-support" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium"><?php esc_html_e('Support', 'dawp'); ?></a>
                </nav>
            </div>

            <div class="lg:col-span-9 space-y-8">
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="bg-background p-6 rounded-lg border border-border shadow-card">
                        <p class="text-accent font-semibold uppercase text-xs tracking-widest mb-2"><?php esc_html_e('Order Cutoff', 'dawp'); ?></p>
                        <p class="text-foreground text-2xl font-bold"><?php esc_html_e('5:00 PM', 'dawp'); ?></p>
                        <p class="text-foreground-muted text-sm mt-2"><?php esc_html_e('GMT-08:00', 'dawp'); ?></p>
                    </div>
                    <div class="bg-background p-6 rounded-lg border border-border shadow-card">
                        <p class="text-accent font-semibold uppercase text-xs tracking-widest mb-2"><?php esc_html_e('Handling Time', 'dawp'); ?></p>
                        <p class="text-foreground text-2xl font-bold"><?php esc_html_e('1-2 Business Days', 'dawp'); ?></p>
                        <p class="text-foreground-muted text-sm mt-2"><?php esc_html_e('Monday-Friday fulfillment.', 'dawp'); ?></p>
                    </div>
                    <div class="bg-background p-6 rounded-lg border border-border shadow-card">
                        <p class="text-accent font-semibold uppercase text-xs tracking-widest mb-2"><?php esc_html_e('Transit Time', 'dawp'); ?></p>
                        <p class="text-foreground text-2xl font-bold"><?php esc_html_e('5-7 Business Days', 'dawp'); ?></p>
                        <p class="text-foreground-muted text-sm mt-2"><?php esc_html_e('After processing is complete.', 'dawp'); ?></p>
                    </div>
                    <div class="bg-background p-6 rounded-lg border border-border shadow-card">
                        <p class="text-accent font-semibold uppercase text-xs tracking-widest mb-2"><?php esc_html_e('Estimated Delivery', 'dawp'); ?></p>
                        <p class="text-foreground text-2xl font-bold"><?php esc_html_e('6-9 Business Days', 'dawp'); ?></p>
                        <p class="text-foreground-muted text-sm mt-2"><?php esc_html_e('Typical total timeline.', 'dawp'); ?></p>
                    </div>
                </div>

                <div id="shipping-locations" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-8">
                        <div class="w-12 h-12 bg-accent-soft rounded-full flex items-center justify-center text-accent shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        </div>
                        <div>
                            <h2 class="font-heading text-3xl text-foreground font-semibold"><?php esc_html_e('Shipping Locations', 'dawp'); ?></h2>
                            <p class="text-foreground-muted mt-2"><?php esc_html_e('Myveganblog currently ships eligible orders within the United States.', 'dawp'); ?></p>
                        </div>
                    </div>
                    <div class="text-foreground-muted leading-relaxed space-y-4">
                        <p><?php esc_html_e('Orders may be shipped to valid residential or business addresses where carrier service is available. Delivery to some remote areas, restricted addresses, freight forwarding addresses, P.O. boxes, APO/FPO addresses, or addresses with carrier limitations may not be available for every item.', 'dawp'); ?></p>
                        <p><?php esc_html_e('If we cannot service the address provided at checkout, our support team will contact you using the order contact details before fulfillment continues.', 'dawp'); ?></p>
                    </div>
                </div>

                <div id="processing-delivery" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('Order Processing & Estimated Delivery Time', 'dawp'); ?></h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Processing Timeline', 'dawp'); ?></h3>
                            <dl class="space-y-4 text-sm">
                                <div class="flex justify-between gap-4 border-b border-border pb-3">
                                    <dt class="text-foreground-muted"><?php esc_html_e('Order cutoff time', 'dawp'); ?></dt>
                                    <dd class="text-foreground font-semibold text-right"><?php esc_html_e('5:00 PM, GMT-08:00', 'dawp'); ?></dd>
                                </div>
                                <div class="flex justify-between gap-4 border-b border-border pb-3">
                                    <dt class="text-foreground-muted"><?php esc_html_e('Orders after cutoff', 'dawp'); ?></dt>
                                    <dd class="text-foreground font-semibold text-right"><?php esc_html_e('Next business day', 'dawp'); ?></dd>
                                </div>
                                <div class="flex justify-between gap-4 border-b border-border pb-3">
                                    <dt class="text-foreground-muted"><?php esc_html_e('Handling time', 'dawp'); ?></dt>
                                    <dd class="text-foreground font-semibold text-right"><?php esc_html_e('1-2 business days', 'dawp'); ?></dd>
                                </div>
                                <div class="flex justify-between gap-4">
                                    <dt class="text-foreground-muted"><?php esc_html_e('Fulfillment days', 'dawp'); ?></dt>
                                    <dd class="text-foreground font-semibold text-right"><?php esc_html_e('Monday-Friday', 'dawp'); ?></dd>
                                </div>
                            </dl>
                        </div>

                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Delivery Timeline', 'dawp'); ?></h3>
                            <ul class="space-y-3 text-foreground-muted">
                                <li class="flex gap-3"><span class="mt-1 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('Transit time is generally 5-7 business days, Monday to Friday, after handling is complete.', 'dawp'); ?></span></li>
                                <li class="flex gap-3"><span class="mt-1 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('Estimated delivery time is usually 6-9 business days from the order date.', 'dawp'); ?></span></li>
                                <li class="flex gap-3"><span class="mt-1 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('Bulky, oversized, special-handling, or partner-shipped items may require additional time.', 'dawp'); ?></span></li>
                                <li class="flex gap-3"><span class="mt-1 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('Weekends, holidays, weather events, and carrier disruptions may extend delivery timelines.', 'dawp'); ?></span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div id="carriers-costs" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('Shipping Carriers & Shipping Costs', 'dawp'); ?></h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Shipping Carriers', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('We work with reliable carriers and fulfillment partners. The final carrier may vary based on the item, package size, destination, service availability, and warehouse location.', 'dawp'); ?></p>
                        </div>
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Shipping Costs', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Shipping costs, when applicable, are shown at checkout before payment. Any unusual shipping adjustment for oversized or special-handling items will be communicated before fulfillment.', 'dawp'); ?></p>
                        </div>
                    </div>
                </div>

                <div id="tracking-packages" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('Multiple Packages & Tracking Your Order', 'dawp'); ?></h2>
                    <div class="text-foreground-muted leading-relaxed space-y-4">
                        <p><?php esc_html_e('Orders containing more than one item may ship in separate packages. Each package may have its own tracking number and may arrive on a different day.', 'dawp'); ?></p>
                        <p><?php esc_html_e('Once your order ships, tracking details will be sent to the email address used at checkout. Tracking may take 24-48 hours to show movement after the carrier receives the package.', 'dawp'); ?></p>
                        <p><?php esc_html_e('You can also visit our', 'dawp'); ?> <a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="text-accent hover:underline font-medium"><?php esc_html_e('Order Tracking page', 'dawp'); ?></a> <?php esc_html_e('to check the latest available shipment status.', 'dawp'); ?></p>
                    </div>
                </div>

                <div id="delivery-issues" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('Delivery Issues, Address Errors & Package Claims', 'dawp'); ?></h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Incorrect Shipping Address', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Please review your shipping address carefully before placing an order. If you notice an error, contact us as soon as possible. We cannot guarantee address changes after an order has entered processing or shipped.', 'dawp'); ?></p>
                        </div>
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Lost Packages', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('If tracking stops updating or a package appears lost, contact us with your order number. We will help review the tracking details and work with the carrier or fulfillment partner when appropriate.', 'dawp'); ?></p>
                        </div>
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Damaged Packages', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('If your package or product arrives damaged, contact us promptly with your order number and clear photos of the item, packaging, and shipping label so we can review the issue.', 'dawp'); ?></p>
                        </div>
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Shipping Restrictions & Delays', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Carrier restrictions, weather, holidays, high-volume seasons, inventory routing, or service disruptions may cause delays. We will keep customers updated when we become aware of meaningful fulfillment delays.', 'dawp'); ?></p>
                        </div>
                    </div>
                </div>

                <div id="shipping-support" class="bg-surface p-10 rounded-lg border border-dashed border-accent/30">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('Customer Support', 'dawp'); ?></h2>
                    <dl class="grid md:grid-cols-2 gap-4 text-sm">
                        <div class="bg-background p-5 rounded-lg border border-border">
                            <dt class="text-accent font-semibold uppercase text-xs tracking-widest mb-2"><?php esc_html_e('Store Name', 'dawp'); ?></dt>
                            <dd class="text-foreground font-semibold"><?php esc_html_e('Myveganblog', 'dawp'); ?></dd>
                        </div>
                        <div class="bg-background p-5 rounded-lg border border-border">
                            <dt class="text-accent font-semibold uppercase text-xs tracking-widest mb-2"><?php esc_html_e('Email', 'dawp'); ?></dt>
                            <dd><a href="mailto:support@myveganblog.com" class="text-foreground font-semibold hover:text-accent">support@myveganblog.com</a></dd>
                        </div>
                        <div class="bg-background p-5 rounded-lg border border-border md:col-span-2">
                            <dt class="text-accent font-semibold uppercase text-xs tracking-widest mb-2"><?php esc_html_e('Business Hours', 'dawp'); ?></dt>
                            <dd class="text-foreground font-semibold"><?php esc_html_e('Monday-Friday, 9:00 AM-5:00 PM, GMT-08:00', 'dawp'); ?></dd>
                        </div>
                    </dl>
                    <div class="mt-8 flex flex-col sm:flex-row gap-4">
                        <a href="mailto:support@myveganblog.com" class="inline-flex items-center justify-center bg-accent text-white px-8 py-3 rounded-full font-medium hover:bg-accent-hover transition-colors shadow-lg shadow-accent/20"><?php esc_html_e('Email Support', 'dawp'); ?></a>
                        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex items-center justify-center bg-white text-foreground border border-border px-8 py-3 rounded-full font-medium hover:bg-surface transition-colors"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
