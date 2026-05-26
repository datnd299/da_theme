<?php
/**
 * Template Part: Refund & Return Policy Page
 */

$support_email = 'support@brogeshoes.com';
?>

<section class="bg-surface py-16 md:py-24">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="text-center mb-14">
            <span class="text-accent font-medium tracking-widest uppercase text-sm mb-4 block"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></span>
            <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl text-foreground font-bold mb-6 tracking-tight"><?php esc_html_e('Refund & Return Policy', 'dawp'); ?></h1>
            <p class="text-foreground-muted text-lg max-w-3xl mx-auto leading-relaxed">
                <?php esc_html_e('Clear return eligibility, refund timing, exchange options, and footwear-specific return conditions for Broge Shoes orders.', 'dawp'); ?>
            </p>
        </div>

        <div class="grid lg:grid-cols-12 gap-8 items-start">
            <div class="hidden lg:block lg:col-span-3 sticky top-24">
                <nav class="space-y-3" aria-label="<?php esc_attr_e('Return policy sections', 'dawp'); ?>">
                    <a href="#easy-returns" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium"><?php esc_html_e('30-Day Returns', 'dawp'); ?></a>
                    <a href="#return-overview" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium"><?php esc_html_e('Policy Overview', 'dawp'); ?></a>
                    <a href="#return-costs" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium"><?php esc_html_e('Return Costs', 'dawp'); ?></a>
                    <a href="#how-to-return" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium"><?php esc_html_e('How To Return', 'dawp'); ?></a>
                    <a href="#refund-process" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium"><?php esc_html_e('Refund Process', 'dawp'); ?></a>
                    <a href="#contact-information" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium"><?php esc_html_e('Questions', 'dawp'); ?></a>
                </nav>
            </div>

            <div class="lg:col-span-9 space-y-8">
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
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
                        <p class="text-accent font-semibold uppercase text-xs tracking-widest mb-2"><?php esc_html_e('Authorization', 'dawp'); ?></p>
                        <p class="text-foreground text-2xl font-bold"><?php esc_html_e('Required', 'dawp'); ?></p>
                        <p class="text-foreground-muted text-sm mt-2"><?php esc_html_e('Contact support first.', 'dawp'); ?></p>
                    </div>
                    <div class="bg-background p-6 rounded-lg border border-border shadow-card">
                        <p class="text-accent font-semibold uppercase text-xs tracking-widest mb-2"><?php esc_html_e('Refund Timing', 'dawp'); ?></p>
                        <p class="text-foreground text-2xl font-bold"><?php esc_html_e('Up to 7 Days', 'dawp'); ?></p>
                        <p class="text-foreground-muted text-sm mt-2"><?php esc_html_e('After inspection approval.', 'dawp'); ?></p>
                    </div>
                </div>

                <div id="easy-returns" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('30-Day Easy Returns', 'dawp'); ?></h2>
                    <div class="text-foreground-muted leading-relaxed space-y-4">
                        <p><?php esc_html_e('Broge Shoes accepts eligible returns within 30 days from the delivery date. Items must be unused, unworn, undamaged, in original condition, and returned with original packaging where applicable.', 'dawp'); ?></p>
                        <p><?php esc_html_e('Eligible footwear must be unworn, undamaged, free of outdoor wear, stains, heavy creasing, or sole marks, and returned with original packaging where applicable.', 'dawp'); ?></p>
                    </div>
                </div>

                <div id="restocking-fee" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('$0 Restocking Fee', 'dawp'); ?></h2>
                    <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('We do not charge a restocking fee for eligible returns. Returned items must still meet the return condition requirements and must be approved through our return authorization process.', 'dawp'); ?></p>
                </div>

                <div id="return-overview" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('Return Policy Overview', 'dawp'); ?></h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Eligible Condition', 'dawp'); ?></h3>
                            <ul class="space-y-3 text-foreground-muted">
                                <li class="flex gap-3"><span class="mt-1 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('Unused, unworn, and undamaged.', 'dawp'); ?></span></li>
                                <li class="flex gap-3"><span class="mt-1 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('Original condition with packaging where applicable.', 'dawp'); ?></span></li>
                                <li class="flex gap-3"><span class="mt-1 h-2 w-2 rounded-full bg-accent shrink-0"></span><span><?php esc_html_e('No outdoor wear, stains, heavy creasing, or sole marks on footwear.', 'dawp'); ?></span></li>
                            </ul>
                        </div>
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Return Authorization Required', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Please contact support and wait for return instructions before sending any item back. Items returned without authorization may be delayed or refused.', 'dawp'); ?></p>
                        </div>
                    </div>
                </div>

                <div id="return-costs" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('Return Costs', 'dawp'); ?></h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Store Error, Defective, Incorrect, or Damaged Items', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('If a product is defective, incorrect, or damaged, Broge Shoes will cover return shipping or provide a prepaid label after the return is reviewed and approved.', 'dawp'); ?></p>
                        </div>
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Customer Remorse, Size, Color, Model, or Preference Changes', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('For returns due to customer remorse, wrong size, wrong color, wrong model, or preference change, the customer pays the actual return shipping cost.', 'dawp'); ?></p>
                        </div>
                    </div>
                    <p class="text-foreground-muted leading-relaxed mt-6"><?php esc_html_e('Original shipping costs are non-refundable unless the return is due to store error, carrier damage, or product damage.', 'dawp'); ?></p>
                </div>

                <div id="common-return-scenarios" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('Common Return Scenarios', 'dawp'); ?></h2>
                    <div class="text-foreground-muted leading-relaxed space-y-4">
                        <p><?php esc_html_e('If your shoes arrive damaged, defective, or different from what you ordered, contact us promptly with your order number and photos so we can review the issue.', 'dawp'); ?></p>
                        <p><?php esc_html_e('If you ordered the wrong size, color, model, or changed your preference, contact us within 30 days of delivery for return instructions. Customer-paid return shipping applies to these cases.', 'dawp'); ?></p>
                    </div>
                </div>

                <div id="how-to-return" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('How To Return An Item', 'dawp'); ?></h2>
                    <ol class="space-y-4 text-foreground-muted">
                        <li class="flex gap-4">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-accent text-white font-bold">1</span>
                            <span><?php printf(esc_html__('Email %s with your order number, item details, and the reason for return.', 'dawp'), '<a href="mailto:' . esc_attr($support_email) . '" class="text-accent hover:underline font-medium">' . esc_html($support_email) . '</a>'); ?></span>
                        </li>
                        <li class="flex gap-4">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-accent text-white font-bold">2</span>
                            <span><?php esc_html_e('Wait for return authorization and instructions before mailing the item back.', 'dawp'); ?></span>
                        </li>
                        <li class="flex gap-4">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-accent text-white font-bold">3</span>
                            <span><?php esc_html_e('Pack the item securely in original condition with original packaging where applicable.', 'dawp'); ?></span>
                        </li>
                        <li class="flex gap-4">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-accent text-white font-bold">4</span>
                            <span><?php esc_html_e('Ship the return according to the approved instructions and keep your shipping receipt or tracking number.', 'dawp'); ?></span>
                        </li>
                    </ol>
                </div>

                <div id="refund-process" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('Refund Process', 'dawp'); ?></h2>
                    <div class="grid md:grid-cols-[180px_1fr] gap-6 items-start">
                        <div class="bg-surface p-6 rounded-lg border border-border text-center">
                            <p class="text-foreground text-4xl font-bold"><?php esc_html_e('7', 'dawp'); ?></p>
                            <p class="text-foreground-muted text-sm mt-2"><?php esc_html_e('Days, typically', 'dawp'); ?></p>
                        </div>
                        <div class="text-foreground-muted leading-relaxed space-y-4">
                            <p><?php esc_html_e('After your return is received, inspected, and approved, refunds are processed to the original payment method. Refund timing is typically up to 7 days depending on your bank or payment provider.', 'dawp'); ?></p>
                            <p><?php esc_html_e('We will contact you if a returned item does not meet the eligibility requirements.', 'dawp'); ?></p>
                        </div>
                    </div>
                </div>

                <div id="exchanges" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('Exchanges', 'dawp'); ?></h2>
                    <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Exchanges are subject to stock availability. In some cases, the fastest option may be to return the eligible item for a refund and place a new order for the preferred size, color, or style.', 'dawp'); ?></p>
                </div>

                <div id="non-returnable-items" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('Non-Returnable Items', 'dawp'); ?></h2>
                    <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Items that are worn, used outdoors, damaged after delivery, stained, heavily creased, marked on the soles, missing required packaging, or returned outside the approved return process may not be accepted.', 'dawp'); ?></p>
                </div>

                <div id="contact-information" class="text-center bg-surface p-10 rounded-lg border border-dashed border-accent/30">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-4"><?php esc_html_e('Questions About A Return?', 'dawp'); ?></h2>
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
