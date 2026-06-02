<?php
/**
 * Template Part: Shipping Policy Page
 */

$support_email = 'support@brogeshoes.com';
$support_hours = __('Within 24 business hours.', 'dawp');
$store_name = __('Broge Shoes', 'dawp');
$business_address = dawp_get_woocommerce_store_address() ?: __('1777 Canal St, Merced, CA 95340', 'dawp');
$contact_url = home_url('/contact-us/');
?>

<section class="bg-surface py-16 md:py-24">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="text-center mb-14">
            <span class="text-accent font-medium tracking-widest uppercase text-sm mb-4 block"><?php esc_html_e('Merchant Policies', 'dawp'); ?></span>
            <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl text-foreground font-bold mb-6 tracking-tight"><?php esc_html_e('Shipping Policy', 'dawp'); ?></h1>
            <p class="text-foreground-muted text-lg max-w-3xl mx-auto leading-relaxed">
                <?php esc_html_e('Broge Shoes provides clear shipping timelines, carrier information, and delivery support for men\'s formal shoes, leather dress shoes, and brogue shoes shipped within the United States.', 'dawp'); ?>
            </p>
            <p class="italic text-sm text-foreground-muted mt-4"><?php esc_html_e('Last Updated: May 26, 2026', 'dawp'); ?></p>
        </div>

        <div class="space-y-8">
            <div class="bg-background p-8 md:p-10 rounded-lg shadow-card border border-border">
                <h2 class="font-heading text-3xl md:text-5xl text-foreground font-semibold mb-4"><?php esc_html_e('Shipping Locations & Market', 'dawp'); ?></h2>
                <div class="text-foreground-muted leading-relaxed space-y-4">
                    <p><?php printf(esc_html__('We currently ship exclusively within the United States. %s serves customers shopping from the United States domestic market.', 'dawp'), esc_html($store_name)); ?></p>
                    <p><?php esc_html_e('If a product, destination, or carrier limitation prevents delivery to your specific address, the order will not be available for that location, and you will be notified immediately at checkout before any payment is processed.', 'dawp'); ?></p>
                </div>
                <div class="mt-4 bg-accent-soft p-6 rounded-lg border border-accent/20">
                    <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Some men\'s formal footwear orders may ship separately if items are prepared from different fulfillment batches or require distinct specialized packing methods to ensure safe transit.', 'dawp'); ?></p>
                </div>
            </div>

            <div class="bg-background p-8 md:p-10 rounded-lg shadow-card border border-border">
                <h2 class="font-heading text-3xl md:text-5xl text-foreground font-semibold mb-4"><?php esc_html_e('Shipping Fees & Costs', 'dawp'); ?></h2>
                <p class="text-foreground-muted leading-relaxed mb-6"><?php esc_html_e('We believe in full transparency with no hidden fees at checkout. Our shipping costs are structured as follows:', 'dawp'); ?></p>
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="bg-background p-6 rounded-lg border border-border">
                        <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Standard U.S. Shipping', 'dawp'); ?></h3>
                        <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Completely free for all orders nationwide. There is no minimum purchase requirement to qualify for free standard shipping.', 'dawp'); ?></p>
                    </div>
                    <div class="bg-background p-6 rounded-lg border border-border">
                        <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Optional Upgraded Shipping', 'dawp'); ?></h3>
                        <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('If expedited or assisted shipping services are available for your destination, the exact cost will be displayed clearly on the checkout page before you complete your payment.', 'dawp'); ?></p>
                    </div>
                </div>
            </div>

            <div class="bg-background p-8 md:p-10 rounded-lg shadow-card border border-border">
                <h2 class="font-heading text-3xl md:text-5xl text-foreground font-semibold mb-4"><?php esc_html_e('Order Processing & Delivery Times', 'dawp'); ?></h2>
                <p class="text-foreground-muted leading-relaxed mb-6"><?php esc_html_e('All shipping and handling timelines are calculated in business days, Monday through Friday, excluding standard U.S. public holidays.', 'dawp'); ?></p>
                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                    <div class="bg-background p-5 rounded-lg border border-border">
                        <h3 class="text-foreground font-bold mb-2"><?php esc_html_e('Order Cutoff Time', 'dawp'); ?></h3>
                        <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('5:00 PM (GMT-08:00) Pacific Standard Time.', 'dawp'); ?></p>
                    </div>
                    <div class="bg-background p-5 rounded-lg border border-border">
                        <h3 class="text-foreground font-bold mb-2"><?php esc_html_e('Order Handling Time', 'dawp'); ?></h3>
                        <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('1-3 business days. Orders placed after cutoff begin processing the following business day.', 'dawp'); ?></p>
                    </div>
                    <div class="bg-background p-5 rounded-lg border border-border">
                        <h3 class="text-foreground font-bold mb-2"><?php esc_html_e('Transit Time', 'dawp'); ?></h3>
                        <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('5-7 business days, Monday to Friday.', 'dawp'); ?></p>
                    </div>
                    <div class="bg-background p-5 rounded-lg border border-border">
                        <h3 class="text-foreground font-bold mb-2"><?php esc_html_e('Estimated Delivery Time', 'dawp'); ?></h3>
                        <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('6-10 business days total from the date of purchase.', 'dawp'); ?></p>
                    </div>
                </div>
                <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Delivery estimates are carefully calculated windows reflecting our standard delivery benchmarks. While we and our courier partners work diligently to meet these timelines, unexpected delays due to extreme weather, carrier capacity issues, or regional holidays may occasionally occur.', 'dawp'); ?></p>
            </div>

            <div class="bg-background p-8 md:p-10 rounded-lg shadow-card border border-border">
                <h2 class="font-heading text-3xl md:text-5xl text-foreground font-semibold mb-4"><?php esc_html_e('Multi-Item Orders & Specialized Handling', 'dawp'); ?></h2>
                <div class="text-foreground-muted leading-relaxed space-y-4">
                    <p><?php esc_html_e('If your purchase includes multiple pairs of shoes or diverse men\'s formal footwear items, they may be fulfilled from different locations. Consequently, your items may ship separately and arrive in multiple packages.', 'dawp'); ?></p>
                    <p><?php esc_html_e('You will receive unique tracking numbers for each package. Certain intricate or high-demand formal footwear items may require extra preparation time due to rigorous address reviews, holiday volume spikes, or safe-handling protocols.', 'dawp'); ?></p>
                </div>
            </div>

            <div class="bg-background p-8 md:p-10 rounded-lg shadow-card border border-border">
                <h2 class="font-heading text-3xl md:text-5xl text-foreground font-semibold mb-4"><?php esc_html_e('Carrier Services & Delivery Tracking', 'dawp'); ?></h2>
                <p class="text-foreground-muted leading-relaxed mb-6"><?php printf(esc_html__('To guarantee safe and efficient delivery, %s partners with trusted domestic U.S. carriers. Orders are shipped using USPS, UPS, FedEx, or DHL.', 'dawp'), esc_html($store_name)); ?></p>
                <div class="flex flex-wrap gap-4 mb-6">
                    <span class="inline-flex items-center justify-center px-7 py-2 rounded-full border border-border text-foreground font-bold text-sm"><?php esc_html_e('USPS', 'dawp'); ?></span>
                    <span class="inline-flex items-center justify-center px-7 py-2 rounded-full border border-border text-foreground font-bold text-sm"><?php esc_html_e('UPS', 'dawp'); ?></span>
                    <span class="inline-flex items-center justify-center px-7 py-2 rounded-full border border-border text-foreground font-bold text-sm"><?php esc_html_e('FedEx', 'dawp'); ?></span>
                    <span class="inline-flex items-center justify-center px-7 py-2 rounded-full border border-border text-foreground font-bold text-sm"><?php esc_html_e('DHL', 'dawp'); ?></span>
                </div>
                <p class="text-foreground-muted leading-relaxed mb-8"><?php esc_html_e('The final carrier service is dynamically selected when your package is securely labeled and prepared at our fulfillment center. Once your order is dispatched, an automated shipping confirmation email containing a direct tracking link and courier details will be sent to your registered email address.', 'dawp'); ?></p>
                <a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-foreground px-7 text-sm font-bold text-foreground transition hover:bg-surface">
                    <?php esc_html_e('Track Order', 'dawp'); ?>
                </a>
            </div>

            <div class="bg-background p-8 md:p-10 rounded-lg shadow-card border border-border">
                <h2 class="font-heading text-3xl md:text-5xl text-foreground font-semibold mb-4"><?php esc_html_e('Resolving Delivery Issues & Damaged Shipments', 'dawp'); ?></h2>
                <div class="text-foreground-muted leading-relaxed space-y-4">
                    <p><?php esc_html_e('Your satisfaction is our priority. If your order encounters delays, tracking stops updating, or the package is marked as delivered but has not arrived, please reach out to our dedicated support team immediately.', 'dawp'); ?></p>
                    <p><?php esc_html_e('To help us investigate and resolve the issue with the carrier swiftly, please provide:', 'dawp'); ?></p>
                </div>
                <ul class="space-y-4 text-foreground-muted mt-6">
                    <li class="flex gap-3"><span class="mt-2 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('Your exact Order Number, such as #BS1001.', 'dawp'); ?></span></li>
                    <li class="flex gap-3"><span class="mt-2 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('The specific Email Address utilized during checkout.', 'dawp'); ?></span></li>
                    <li class="flex gap-3"><span class="mt-2 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('The full and complete Delivery Address.', 'dawp'); ?></span></li>
                    <li class="flex gap-3"><span class="mt-2 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('Clear, well-lit photos if the package container or shoe item arrived damaged.', 'dawp'); ?></span></li>
                </ul>
                <div class="flex flex-col sm:flex-row gap-4 mt-8">
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-accent px-7 text-sm font-bold text-white transition hover:bg-accent-hover">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>
                    <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-foreground px-7 text-sm font-bold text-foreground transition hover:bg-surface">
                        <?php echo esc_html($support_email); ?>
                    </a>
                </div>
            </div>

            <div id="contact-us" class="bg-background p-8 md:p-10 rounded-lg shadow-card border border-border">
                <div class="grid lg:grid-cols-[minmax(0,1fr)_minmax(320px,420px)] gap-8 lg:gap-12 items-start">
                    <div>
                        <h2 class="font-heading text-3xl md:text-5xl text-foreground font-semibold mb-4"><?php esc_html_e('Contact Us', 'dawp'); ?></h2>
                        <p class="text-foreground-muted leading-relaxed mb-8"><?php esc_html_e('For privacy questions, data access requests, or questions regarding our information practices, please contact Broge Shoes through our official support channels.', 'dawp'); ?></p>
                        <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-accent px-7 text-sm font-bold text-white transition hover:bg-accent-hover">
                            <?php esc_html_e('Open Contact Page', 'dawp'); ?>
                        </a>
                    </div>
                    <dl class="bg-surface rounded-lg border border-border divide-y divide-border overflow-hidden">
                        <div class="p-5">
                            <dt class="text-sm font-semibold text-foreground"><?php esc_html_e('Brand Name', 'dawp'); ?></dt>
                            <dd class="text-foreground-muted mt-1"><?php echo esc_html($store_name); ?></dd>
                        </div>
                        <div class="p-5">
                            <dt class="text-sm font-semibold text-foreground"><?php esc_html_e('Customer Support Email', 'dawp'); ?></dt>
                            <dd class="mt-1">
                                <a href="mailto:<?php echo esc_attr($support_email); ?>" class="text-accent hover:underline font-medium break-words"><?php echo esc_html($support_email); ?></a>
                            </dd>
                        </div>
                        <div class="p-5">
                            <dt class="text-sm font-semibold text-foreground"><?php esc_html_e('Physical Business Address', 'dawp'); ?></dt>
                            <dd class="text-foreground-muted mt-1"><?php echo esc_html($business_address); ?></dd>
                        </div>
                    </dl>
                </div>
            </div>

        </div>
    </div>
</section>
