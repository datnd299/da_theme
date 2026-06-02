<?php
/**
 * Template Part: FAQ Page
 */

$support_email = 'support@brogeshoes.com';
$support_hours = __('Monday - Friday, 9:00 AM - 5:00 PM EST', 'dawp');
$store_name    = __('Broge Shoes', 'dawp');
$store_address = dawp_get_woocommerce_store_address();
?>

<section class="bg-surface py-16 md:py-24">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="text-center mb-14">
            <span class="text-accent font-medium tracking-widest uppercase text-sm mb-4 block"><?php esc_html_e('Help Center', 'dawp'); ?></span>
            <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl text-foreground font-bold mb-6 tracking-tight"><?php esc_html_e('Frequently Asked Questions', 'dawp'); ?></h1>
            <p class="text-foreground-muted text-lg max-w-3xl mx-auto leading-relaxed">
                <?php esc_html_e('Transparent answers about Broge Shoes orders, delivery timelines, returns, refunds, exchanges, privacy, and footwear condition requirements for men\'s formal shoes.', 'dawp'); ?>
            </p>
            <p class="italic text-sm text-foreground-muted mt-4"><?php esc_html_e('Last Updated: May 26, 2026', 'dawp'); ?></p>
        </div>

        <div class="max-w-4xl mx-auto">
            <div class="space-y-8">
                <div id="faq-orders" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('Orders', 'dawp'); ?></h2>
                    <div class="space-y-4">
                        <details class="group bg-surface rounded-lg border border-border overflow-hidden">
                            <summary class="flex cursor-pointer list-none items-center justify-between gap-4 p-6 font-semibold text-foreground">
                                <span><?php esc_html_e('What happens after I place an order?', 'dawp'); ?></span>
                                <span class="text-accent transition-transform group-open:rotate-180" aria-hidden="true">&#9662;</span>
                            </summary>
                            <div class="px-6 pb-6 text-foreground-muted leading-relaxed">
                                <p><?php esc_html_e('After checkout, we send an order confirmation email and review the order before fulfillment. Standard handling takes 1-3 business days, Monday through Friday, excluding standard U.S. public holidays. We may cancel or refuse an order because of inventory shortages, payment authorization issues, suspected fraud, pricing errors, or invalid shipping information.', 'dawp'); ?></p>
                            </div>
                        </details>

                        <details class="group bg-surface rounded-lg border border-border overflow-hidden">
                            <summary class="flex cursor-pointer list-none items-center justify-between gap-4 p-6 font-semibold text-foreground">
                                <span><?php esc_html_e('Can I change my shipping address after ordering?', 'dawp'); ?></span>
                                <span class="text-accent transition-transform group-open:rotate-180" aria-hidden="true">&#9662;</span>
                            </summary>
                            <div class="px-6 pb-6 text-foreground-muted leading-relaxed">
                                <p><?php esc_html_e('Please contact us as soon as possible if your shipping address is incorrect. We cannot guarantee address changes after fulfillment begins, so you should provide current, complete, and accurate billing, shipping, email, and phone details before checkout.', 'dawp'); ?></p>
                            </div>
                        </details>

                        <details class="group bg-surface rounded-lg border border-border overflow-hidden">
                            <summary class="flex cursor-pointer list-none items-center justify-between gap-4 p-6 font-semibold text-foreground">
                                <span><?php esc_html_e('Where does Broge Shoes ship?', 'dawp'); ?></span>
                                <span class="text-accent transition-transform group-open:rotate-180" aria-hidden="true">&#9662;</span>
                            </summary>
                            <div class="px-6 pb-6 text-foreground-muted leading-relaxed">
                                <p><?php printf(esc_html__('%s currently ships exclusively within the United States and serves customers shopping from the United States domestic market. If a product, destination, or carrier limitation prevents delivery to your address, you will be notified at checkout before payment is processed.', 'dawp'), esc_html($store_name)); ?></p>
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
                                <p><?php esc_html_e('Order handling takes 1-3 business days, Monday to Friday. Transit time usually takes 5-7 business days after handling is complete.', 'dawp'); ?></p>
                                <p><?php esc_html_e('The total estimated delivery time is 6-10 business days from the date of purchase. Unexpected carrier delays, extreme weather, capacity issues, or regional holidays may occasionally affect delivery.', 'dawp'); ?></p>
                            </div>
                        </details>

                        <details class="group bg-surface rounded-lg border border-border overflow-hidden">
                            <summary class="flex cursor-pointer list-none items-center justify-between gap-4 p-6 font-semibold text-foreground">
                                <span><?php esc_html_e('What is the daily order cutoff time?', 'dawp'); ?></span>
                                <span class="text-accent transition-transform group-open:rotate-180" aria-hidden="true">&#9662;</span>
                            </summary>
                            <div class="px-6 pb-6 text-foreground-muted leading-relaxed">
                                <p><?php esc_html_e('The shipping order cutoff time is 5:00 PM (GMT-08:00) Pacific Standard Time. Orders placed after cutoff, on weekends, or on holidays begin processing on the next business day.', 'dawp'); ?></p>
                            </div>
                        </details>

                        <details class="group bg-surface rounded-lg border border-border overflow-hidden">
                            <summary class="flex cursor-pointer list-none items-center justify-between gap-4 p-6 font-semibold text-foreground">
                                <span><?php esc_html_e('How are shipping costs shown?', 'dawp'); ?></span>
                                <span class="text-accent transition-transform group-open:rotate-180" aria-hidden="true">&#9662;</span>
                            </summary>
                            <div class="px-6 pb-6 text-foreground-muted leading-relaxed">
                                <p><?php esc_html_e('Standard U.S. shipping is free for all orders nationwide with no minimum purchase requirement. If optional upgraded, expedited, or assisted shipping is available for your destination, the exact cost will be shown at checkout before payment.', 'dawp'); ?></p>
                            </div>
                        </details>
                    </div>
                </div>

                <div id="faq-tracking" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('Tracking & Delivery Issues', 'dawp'); ?></h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('How do I track my order?', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed mb-5"><?php esc_html_e('Tracking information is sent to the email address used at checkout after your order ships. Orders may ship with USPS, UPS, FedEx, or DHL, and tracking updates may take time to appear after the carrier receives the package.', 'dawp'); ?></p>
                            <a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="inline-flex items-center justify-center bg-accent text-white px-6 py-3 rounded-full font-medium hover:bg-accent-hover transition-colors"><?php esc_html_e('Track Order', 'dawp'); ?></a>
                        </div>
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('What if my package is lost or damaged?', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Contact support within 30 days of delivery or the recorded delivery date with your order number, checkout email, full delivery address, and clear photos if the package or shoe item arrived damaged. We will investigate with the carrier and arrange a replacement or refund when the package is confirmed lost or damaged.', 'dawp'); ?></p>
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
                                <p><?php esc_html_e('Broge Shoes accepts eligible returns initiated within 30 days of delivery. Items must be unworn, unused, undamaged, in original unaltered condition, and returned with all original packaging, tags, labels, certificates, care cards, shoe bags, boxes, and included accessories.', 'dawp'); ?></p>
                            </div>
                        </details>

                        <details class="group bg-surface rounded-lg border border-border overflow-hidden">
                            <summary class="flex cursor-pointer list-none items-center justify-between gap-4 p-6 font-semibold text-foreground">
                                <span><?php esc_html_e('What footwear condition is required for a return?', 'dawp'); ?></span>
                                <span class="text-accent transition-transform group-open:rotate-180" aria-hidden="true">&#9662;</span>
                            </summary>
                            <div class="px-6 pb-6 text-foreground-muted leading-relaxed">
                                <p><?php esc_html_e('Eligible footwear must be unworn, unused, undamaged, free of outdoor wear, stains, heavy creasing, or sole marks, and returned with original packaging, tags, labels, shoe bags, boxes, and any included accessories.', 'dawp'); ?></p>
                            </div>
                        </details>

                        <details class="group bg-surface rounded-lg border border-border overflow-hidden">
                            <summary class="flex cursor-pointer list-none items-center justify-between gap-4 p-6 font-semibold text-foreground">
                                <span><?php esc_html_e('How do I start a return?', 'dawp'); ?></span>
                                <span class="text-accent transition-transform group-open:rotate-180" aria-hidden="true">&#9662;</span>
                            </summary>
                            <div class="px-6 pb-6 text-foreground-muted leading-relaxed">
                                <p><?php printf(esc_html__('Email %s or use the Contact Us page within 30 days of delivery. Include your order number, the email used at checkout, the item(s) you want to return, and the reason for return with photos or videos if damaged. Our support team reviews requests within 1-2 business days and sends return authorization, RMA details, and a prepaid label after approval. Do not mail any item back without authorization.', 'dawp'), '<a href="mailto:' . esc_attr($support_email) . '" class="text-accent hover:underline font-medium">' . esc_html($support_email) . '</a>'); ?></p>
                            </div>
                        </details>

                        <details class="group bg-surface rounded-lg border border-border overflow-hidden">
                            <summary class="flex cursor-pointer list-none items-center justify-between gap-4 p-6 font-semibold text-foreground">
                                <span><?php esc_html_e('Which items are non-returnable?', 'dawp'); ?></span>
                                <span class="text-accent transition-transform group-open:rotate-180" aria-hidden="true">&#9662;</span>
                            </summary>
                            <div class="px-6 pb-6 text-foreground-muted leading-relaxed">
                                <p><?php esc_html_e('Final sale or non-returnable items, gift cards, digital products, personalized or custom-made items, shoe-care or hygiene-sensitive accessories with broken seals, and items worn, washed, altered, or damaged after delivery are not eligible for return.', 'dawp'); ?></p>
                            </div>
                        </details>
                    </div>
                </div>

                <div id="faq-refunds" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('Refunds & Exchanges', 'dawp'); ?></h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Who pays return shipping?', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('If the product is defective, damaged, or incorrect because of our fulfillment or carrier issue, Broge Shoes covers 100% of the return shipping cost and provides a downloadable prepaid label by email after approval. For customer remorse, including ordering the wrong item, size, or color, changed mind, or fit issues, the actual prepaid label cost is deducted from the final refund.', 'dawp'); ?></p>
                        </div>
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('When will I receive my refund?', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('After your return is received, inspected within 1-2 business days, and approved, your refund is processed back only to the original payment method within 7 business days. We do not offer store credit or gift cards as a refund method for returns. If you have not received it after 15 business days of approval, please check with your bank or card company first, then contact us.', 'dawp'); ?></p>
                        </div>
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Do you charge a restocking fee?', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('No. Broge Shoes does not charge a restocking fee for eligible returns that meet the return condition requirements and are approved through the return authorization process.', 'dawp'); ?></p>
                        </div>
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Can I exchange an item?', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('We do not process direct one-for-one exchanges. To get a different size, color, or model, follow the return process for the original item and place a new order on our website for the preferred item.', 'dawp'); ?></p>
                        </div>
                    </div>
                </div>

                <div id="faq-privacy" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('Privacy & Secure Checkout', 'dawp'); ?></h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Is checkout secure?', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Yes. Checkout uses HTTPS/SSL encryption, and payments are handled through verified, PCI-DSS compliant third-party payment providers. We do not store or have access to your full credit card numbers or financial credentials on our servers.', 'dawp'); ?></p>
                        </div>
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Do you sell customer data?', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('No. Broge Shoes does not sell, rent, or trade personal information to third parties for their commercial marketing purposes. We share data only with trusted providers needed to operate the store, process payments, arrange shipping, prevent fraud, and provide customer support.', 'dawp'); ?></p>
                        </div>
                    </div>
                </div>

                <div class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('Policy Details', 'dawp'); ?></h2>
                    <div class="grid md:grid-cols-3 gap-6">
                        <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>" class="block bg-surface p-6 rounded-lg border border-border hover:border-accent transition-all">
                            <h3 class="text-foreground font-semibold text-xl mb-3"><?php esc_html_e('Shipping Policy', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Read full delivery timelines, carrier details, tracking support, and delivery issue information.', 'dawp'); ?></p>
                        </a>
                        <a href="<?php echo esc_url(home_url('/refund-return-policy/')); ?>" class="block bg-surface p-6 rounded-lg border border-border hover:border-accent transition-all">
                            <h3 class="text-foreground font-semibold text-xl mb-3"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Read full return eligibility, refund timing, exchange options, and footwear condition requirements.', 'dawp'); ?></p>
                        </a>
                        <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>" class="block bg-surface p-6 rounded-lg border border-border hover:border-accent transition-all">
                            <h3 class="text-foreground font-semibold text-xl mb-3"><?php esc_html_e('Privacy Policy', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Read how we collect, use, share, protect, and retain personal information for store operations.', 'dawp'); ?></p>
                        </a>
                    </div>
                </div>

                <div id="faq-support" class="text-center bg-surface p-10 rounded-lg border border-dashed border-accent/30">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-4"><?php esc_html_e('Still Have Questions?', 'dawp'); ?></h2>
                    <p class="text-foreground-muted mb-8 max-w-2xl mx-auto"><?php printf(esc_html__('%s customer support is available %s. We aim to reply within 1 business day, and shipping inquiries are answered within 24 business hours.', 'dawp'), esc_html($store_name), esc_html($support_hours)); ?></p>
                    <dl class="grid md:grid-cols-2 gap-4 text-sm text-left mb-8">
                        <div class="bg-background p-5 rounded-lg border border-border">
                            <dt class="text-accent font-semibold uppercase text-xs tracking-widest mb-2"><?php esc_html_e('Store Name', 'dawp'); ?></dt>
                            <dd class="text-foreground font-semibold"><?php echo esc_html($store_name); ?></dd>
                        </div>
                        <div class="bg-background p-5 rounded-lg border border-border">
                            <dt class="text-accent font-semibold uppercase text-xs tracking-widest mb-2"><?php esc_html_e('Email', 'dawp'); ?></dt>
                            <dd><a href="mailto:<?php echo esc_attr($support_email); ?>" class="text-foreground font-semibold hover:text-accent"><?php echo esc_html($support_email); ?></a></dd>
                        </div>
                        <div class="bg-background p-5 rounded-lg border border-border">
                            <dt class="text-accent font-semibold uppercase text-xs tracking-widest mb-2"><?php esc_html_e('Address', 'dawp'); ?></dt>
                            <dd class="text-foreground font-semibold"><?php echo esc_html($store_address); ?></dd>
                        </div>
                        <div class="bg-background p-5 rounded-lg border border-border">
                            <dt class="text-accent font-semibold uppercase text-xs tracking-widest mb-2"><?php esc_html_e('Business Hours', 'dawp'); ?></dt>
                            <dd class="text-foreground font-semibold"><?php echo esc_html($support_hours); ?></dd>
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
