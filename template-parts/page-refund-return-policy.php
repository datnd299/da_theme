<?php
/**
 * Template Part: Refund & Return Policy Page
 */

$support_email = 'support@brogeshoes.com';
$store_name    = __('Broge Shoes', 'dawp');
$store_address = dawp_get_woocommerce_store_address();
$contact_url   = home_url('/contact-us/');
?>

<section class="bg-surface py-16 md:py-24">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="text-center mb-14">
            <span class="text-accent font-medium tracking-widest uppercase text-sm mb-4 block"><?php esc_html_e('Merchant Policies', 'dawp'); ?></span>
            <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl text-foreground font-bold mb-6 tracking-tight"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></h1>
            <p class="text-foreground-muted text-lg max-w-3xl mx-auto leading-relaxed">
                <?php printf(esc_html__('%s accepts eligible returns for men\'s formal shoes, leather dress shoes, and brogue shoes within 30 days of delivery.', 'dawp'), esc_html($store_name)); ?>
            </p>
            <p class="italic text-sm text-foreground-muted mt-4"><?php esc_html_e('Last Updated: May 26, 2026', 'dawp'); ?></p>
        </div>

        <div class="space-y-8">
            <div class="bg-background p-8 md:p-10 rounded-lg shadow-card border border-border">
                <h2 class="font-heading text-3xl md:text-5xl text-foreground font-semibold mb-4"><?php esc_html_e('Return Eligibility', 'dawp'); ?></h2>
                <p class="text-foreground-muted leading-relaxed mb-6"><?php esc_html_e('To be eligible for a return, your item must meet the following criteria:', 'dawp'); ?></p>
                <ul class="space-y-4 text-foreground-muted">
                    <li class="flex gap-3"><span class="mt-2 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('Return Window: You must initiate your return request within 30 days of delivery.', 'dawp'); ?></span></li>
                    <li class="flex gap-3"><span class="mt-2 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('Condition: Items must be unworn, unused, undamaged, and in their original, unaltered condition.', 'dawp'); ?></span></li>
                    <li class="flex gap-3"><span class="mt-2 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('Packaging: Items must be returned with all original packaging, tags, labels, certificates, care cards, shoe bags, boxes, and any included accessories.', 'dawp'); ?></span></li>
                    <li class="flex gap-3"><span class="mt-2 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('Restocking Fee: Free. We do not charge any restocking fees for eligible returns.', 'dawp'); ?></span></li>
                </ul>
            </div>

            <div class="bg-background p-8 md:p-10 rounded-lg shadow-card border border-border">
                <h2 class="font-heading text-3xl md:text-5xl text-foreground font-semibold mb-6"><?php esc_html_e('Return Shipping Fees', 'dawp'); ?></h2>
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="bg-background p-6 rounded-lg border border-border">
                        <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Defective, Damaged, or Incorrect Products (Wrong item, carrier damage, or defective):', 'dawp'); ?></h3>
                        <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('No cost to customer. We cover 100% of the return shipping costs. We will provide a downloadable and printable prepaid shipping label via email.', 'dawp'); ?></p>
                    </div>
                    <div class="bg-background p-6 rounded-lg border border-border">
                        <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Customer Remorse (Ordered wrong item/size/color, changed mind, or doesn\'t fit):', 'dawp'); ?></h3>
                        <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('The customer is responsible for the return shipping cost. The actual return shipping cost of the provided prepaid label (sent via email) will be deducted from your final refund amount.', 'dawp'); ?></p>
                    </div>
                </div>
            </div>

            <div class="bg-background p-8 md:p-10 rounded-lg shadow-card border border-border">
                <h2 class="font-heading text-3xl md:text-5xl text-foreground font-semibold mb-4"><?php esc_html_e('How to Return an Item', 'dawp'); ?></h2>
                <p class="text-foreground-muted leading-relaxed mb-6"><?php esc_html_e('Please follow our official 3-step process. Do not ship any item back without prior authorization, as unauthorized returns cannot be tracked or processed at our warehouse.', 'dawp'); ?></p>

                <div class="space-y-4">
                    <div class="bg-background p-5 md:p-6 rounded-lg border border-border">
                        <div class="flex gap-4">
                            <span class="inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-foreground text-white text-sm font-bold">1</span>
                            <div>
                                <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Submit Your Return Request', 'dawp'); ?></h3>
                                <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Email us or use our Contact Page within 30 days of delivery. Please provide your order number, the email used at checkout, the specific item(s) you wish to return, and the reason for the return with photos or videos if damaged.', 'dawp'); ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-background p-5 md:p-6 rounded-lg border border-border">
                        <div class="flex gap-4">
                            <span class="inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-foreground text-white text-sm font-bold">2</span>
                            <div>
                                <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Receive Approval & Pack Your Item', 'dawp'); ?></h3>
                                <div class="text-foreground-muted leading-relaxed space-y-4">
                                    <p><?php esc_html_e('Our support team will review your request within 1-2 business days. Once approved, we will email you a Return Merchandise Authorization (RMA) number along with a prepaid shipping label.', 'dawp'); ?></p>
                                    <p><?php esc_html_e('Repack the item securely in its original packaging with all included accessories, tags, and boxes. Place it inside a sturdy outer shipping box.', 'dawp'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-background p-5 md:p-6 rounded-lg border border-border">
                        <div class="flex gap-4">
                            <span class="inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-foreground text-white text-sm font-bold">3</span>
                            <div>
                                <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Ship It Back to Our Returns Center', 'dawp'); ?></h3>
                                <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Print the prepaid shipping label, attach it to the outside of your shipping box, and drop it off at the designated carrier location.', 'dawp'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-5 bg-accent-soft p-6 rounded-lg border border-accent/20">
                    <p class="text-foreground font-bold mb-2"><?php printf(esc_html__('%s - Returns Department', 'dawp'), esc_html($store_name)); ?></p>
                    <p class="text-foreground-muted"><?php echo esc_html($store_address); ?></p>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 mt-8">
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-accent px-7 text-sm font-bold text-white transition hover:bg-accent-hover">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>
                    <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-foreground px-7 text-sm font-bold text-foreground transition hover:bg-surface">
                        <?php echo esc_html($support_email); ?>
                    </a>
                </div>
            </div>

            <div class="bg-background p-8 md:p-10 rounded-lg shadow-card border border-border">
                <h2 class="font-heading text-3xl md:text-5xl text-foreground font-semibold mb-4"><?php esc_html_e('Common Delivery Issues', 'dawp'); ?></h2>
                <div class="text-foreground-muted leading-relaxed space-y-8">
                    <div>
                        <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Damaged on Arrival', 'dawp'); ?></h3>
                        <p><?php esc_html_e('If your order arrives damaged, please contact us within 30 days of delivery with photos of the item and the shipping packaging, including the shipping label. We will arrange a replacement or full refund at no cost to you.', 'dawp'); ?></p>
                    </div>
                    <div>
                        <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Lost Packages / Never Arrived', 'dawp'); ?></h3>
                        <p><?php esc_html_e('If your tracking status shows no updates for an extended period, or is marked "Delivered" but you did not receive it, please contact us within 30 days of the recorded delivery date. We will investigate with the carrier and arrange a replacement or refund if the package is confirmed lost.', 'dawp'); ?></p>
                    </div>
                </div>
            </div>

            <div class="bg-background p-8 md:p-10 rounded-lg shadow-card border border-border">
                <h2 class="font-heading text-3xl md:text-5xl text-foreground font-semibold mb-4"><?php esc_html_e('Exchanges', 'dawp'); ?></h2>
                <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('We do not process direct one-for-one product exchanges. To get a different size, color, or model, please follow the return process above to send back your original purchase for a refund, and place a new order on our website simultaneously. This ensures your desired item does not sell out.', 'dawp'); ?></p>
            </div>

            <div class="bg-background p-8 md:p-10 rounded-lg shadow-card border border-border">
                <h2 class="font-heading text-3xl md:text-5xl text-foreground font-semibold mb-4"><?php esc_html_e('Refund Process & Timing', 'dawp'); ?></h2>
                <ul class="space-y-4 text-foreground-muted">
                    <li class="flex gap-3"><span class="mt-2 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('Inspection: Once your return package is received at our warehouse, we will inspect the item within 1-2 business days to ensure it meets our return criteria.', 'dawp'); ?></span></li>
                    <li class="flex gap-3"><span class="mt-2 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('Approval & Timing: If approved, your refund will be processed automatically back to your original payment method within 7 business days.', 'dawp'); ?></span></li>
                    <li class="flex gap-3"><span class="mt-2 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('Refund Method: All refunds will be issued solely to your original method of payment within 7 business days of inspection. We do not offer store credit or gift cards as a refund method for returns.', 'dawp'); ?></span></li>
                    <li class="flex gap-3"><span class="mt-2 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('Issues with Returns: If a return is approved but is found to be missing accessories, tags, boxes, or shows signs of wear, we reserve the right to refuse the refund and will offer to ship the item back to you at your expense.', 'dawp'); ?></span></li>
                    <li class="flex gap-3"><span class="mt-2 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('Delayed Refunds: If you have not received your refund after 15 business days of approval, please check with your bank or credit card company first, then contact us.', 'dawp'); ?></span></li>
                </ul>
                <a href="mailto:<?php echo esc_attr($support_email); ?>" class="mt-8 inline-flex min-h-12 items-center justify-center rounded-full border border-foreground px-7 text-sm font-bold text-foreground transition hover:bg-surface">
                    <?php esc_html_e('Email Support', 'dawp'); ?>
                </a>
            </div>

            <div class="bg-background p-8 md:p-10 rounded-lg shadow-card border border-border">
                <h2 class="font-heading text-3xl md:text-5xl text-foreground font-semibold mb-4"><?php esc_html_e('Non-Returnable Items', 'dawp'); ?></h2>
                <p class="text-foreground-muted leading-relaxed mb-6"><?php esc_html_e('The following items are strictly non-returnable and final sale:', 'dawp'); ?></p>
                <ul class="space-y-4 text-foreground-muted">
                    <li class="flex gap-3"><span class="mt-2 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('Items explicitly marked as "Final Sale" or "Non-Returnable" on the product page.', 'dawp'); ?></span></li>
                    <li class="flex gap-3"><span class="mt-2 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('Gift cards or digital products/downloads.', 'dawp'); ?></span></li>
                    <li class="flex gap-3"><span class="mt-2 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('Personalized, engraved, resized, or custom-made items.', 'dawp'); ?></span></li>
                    <li class="flex gap-3"><span class="mt-2 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('Shoe-care, fit, or hygiene-sensitive accessories where the product seal has been broken.', 'dawp'); ?></span></li>
                    <li class="flex gap-3"><span class="mt-2 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('Items that have been worn, washed, altered, or damaged after delivery.', 'dawp'); ?></span></li>
                </ul>
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
                            <dd class="text-foreground-muted mt-1"><?php echo esc_html($store_address); ?></dd>
                        </div>
                    </dl>
                </div>
            </div>

        </div>
    </div>
</section>
