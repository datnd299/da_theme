<?php
/**
 * Template Part: Refund & Return Policy Page
 */

defined('ABSPATH') || exit;

$return_image = get_template_directory_uri() . '/assets/img/All_image/image.png';
?>

<section class="relative overflow-hidden bg-foreground py-16 text-white md:py-24">
    <div class="absolute inset-0">
        <img src="<?php echo esc_url($return_image); ?>" alt="<?php esc_attr_e('Women\'s black shoes for return policy banner', 'dawp'); ?>" class="h-full w-full object-cover opacity-45" loading="eager">
        <div class="absolute inset-0 bg-foreground/70"></div>
    </div>
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="relative text-center">
            <span class="font-medium tracking-widest uppercase text-sm mb-4 block text-white/82"><?php esc_html_e('Merchant Policies', 'dawp'); ?></span>
            <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl text-white font-bold mb-6 tracking-tight"><?php esc_html_e('Refund & Return Policy', 'dawp'); ?></h1>
            <p class="text-white/82 text-lg max-w-3xl mx-auto leading-relaxed">
                <?php esc_html_e('A clear 30-day return policy for eligible shoes, handbags, accessories, and other products purchased from Myveganblog.', 'dawp'); ?>
            </p>
        </div>
    </div>
</section>

<section class="bg-surface py-16 md:py-24">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="grid lg:grid-cols-12 gap-8 items-start">
            <div class="hidden lg:block lg:col-span-3 sticky top-24">
                <nav class="space-y-3" aria-label="<?php esc_attr_e('Return policy sections', 'dawp'); ?>">
                    <a href="#return-window" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium"><?php esc_html_e('30-Day Returns', 'dawp'); ?></a>
                    <a href="#return-overview" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium"><?php esc_html_e('Return Overview', 'dawp'); ?></a>
                    <a href="#return-costs" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium"><?php esc_html_e('Return Costs', 'dawp'); ?></a>
                    <a href="#return-steps" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium"><?php esc_html_e('How To Return', 'dawp'); ?></a>
                    <a href="#refunds-exchanges" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium"><?php esc_html_e('Refunds & Exchanges', 'dawp'); ?></a>
                    <a href="#return-support" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium"><?php esc_html_e('Contact', 'dawp'); ?></a>
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
                        <p class="text-accent font-semibold uppercase text-xs tracking-widest mb-2"><?php esc_html_e('Return Method', 'dawp'); ?></p>
                        <p class="text-foreground text-2xl font-bold"><?php esc_html_e('By Mail', 'dawp'); ?></p>
                        <p class="text-foreground-muted text-sm mt-2"><?php esc_html_e('Authorization required.', 'dawp'); ?></p>
                    </div>
                    <div class="bg-background p-6 rounded-lg border border-border shadow-card">
                        <p class="text-accent font-semibold uppercase text-xs tracking-widest mb-2"><?php esc_html_e('Refund Timing', 'dawp'); ?></p>
                        <p class="text-foreground text-2xl font-bold"><?php esc_html_e('Up to 7 Days', 'dawp'); ?></p>
                        <p class="text-foreground-muted text-sm mt-2"><?php esc_html_e('After inspection approval.', 'dawp'); ?></p>
                    </div>
                </div>

                <div id="return-window" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-8">
                        <div class="w-12 h-12 bg-accent-soft rounded-full flex items-center justify-center text-accent shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"></path><polyline points="3 3 3 8 8 8"></polyline></svg>
                        </div>
                        <div>
                            <h2 class="font-heading text-3xl text-foreground font-semibold"><?php esc_html_e('30-Day Easy Returns', 'dawp'); ?></h2>
                            <p class="text-foreground-muted mt-2"><?php esc_html_e('Return requests must be started within 30 days of delivery.', 'dawp'); ?></p>
                        </div>
                    </div>
                    <div class="text-foreground-muted leading-relaxed space-y-4">
                        <p><?php esc_html_e('Eligible items may be returned within 30 days from the delivery date. Returned items must be unused, undamaged, in original condition, and returned with original packaging, tags, and included accessories where applicable.', 'dawp'); ?></p>
                        <p><?php esc_html_e('Myveganblog charges a $0 restocking fee for eligible returns approved under this policy.', 'dawp'); ?></p>
                    </div>
                </div>

                <div id="return-overview" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('Return Policy Overview', 'dawp'); ?></h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Eligible Condition', 'dawp'); ?></h3>
                            <ul class="space-y-3 text-foreground-muted">
                                <li class="flex gap-3"><svg class="text-accent mt-1 shrink-0" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><polyline points="20 6 9 17 4 12"></polyline></svg><span><?php esc_html_e('Items must be unused, undamaged, and in original condition.', 'dawp'); ?></span></li>
                                <li class="flex gap-3"><svg class="text-accent mt-1 shrink-0" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><polyline points="20 6 9 17 4 12"></polyline></svg><span><?php esc_html_e('Original packaging, tags, dust bags, straps, and included accessories should be returned when applicable.', 'dawp'); ?></span></li>
                                <li class="flex gap-3"><svg class="text-accent mt-1 shrink-0" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><polyline points="20 6 9 17 4 12"></polyline></svg><span><?php esc_html_e('Return authorization is required before sending any item back.', 'dawp'); ?></span></li>
                            </ul>
                        </div>
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Product-Specific Notes', 'dawp'); ?></h3>
                            <div class="text-foreground-muted leading-relaxed space-y-4">
                                <p><?php esc_html_e('Eligible footwear must be unworn, undamaged, free of outdoor wear, stains, odor, heavy creasing, or sole marks, and returned with original packaging where applicable.', 'dawp'); ?></p>
                                <p><?php esc_html_e('Bags and accessories must be unused, undamaged, and returned with original packaging, tags, dust bags, straps, or included accessories where applicable.', 'dawp'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="return-costs" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('Return Costs & Common Return Scenarios', 'dawp'); ?></h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Store Error, Damage, or Defect', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('For approved returns caused by a defective, incorrect, or damaged product, Myveganblog will cover return shipping or provide a prepaid return label after review and approval.', 'dawp'); ?></p>
                        </div>
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Customer Remorse or Preference Change', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('For returns due to wrong size, wrong color, wrong model, preference change, or no longer wanting the item, the customer is responsible for the actual return shipping cost.', 'dawp'); ?></p>
                        </div>
                    </div>
                    <div class="mt-6 bg-accent-soft p-6 rounded-lg border border-accent/20">
                        <h3 class="text-foreground font-semibold text-xl mb-3"><?php esc_html_e('Original Shipping Costs', 'dawp'); ?></h3>
                        <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Original shipping costs are non-refundable unless the return is due to our error, carrier damage, or product damage approved by our support team.', 'dawp'); ?></p>
                    </div>
                </div>

                <div id="return-steps" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('How To Return An Item', 'dawp'); ?></h2>
                    <ol class="space-y-4 text-foreground-muted">
                        <li class="flex gap-4">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-accent text-white font-bold">1</span>
                            <span><?php esc_html_e('Email', 'dawp'); ?> <a href="mailto:support@myveganblog.com" class="text-accent hover:underline font-medium">support@myveganblog.com</a> <?php esc_html_e('with your order number, item name, reason for return, and photos if the item is damaged, defective, or incorrect.', 'dawp'); ?></span>
                        </li>
                        <li class="flex gap-4">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-accent text-white font-bold">2</span>
                            <span><?php esc_html_e('Wait for return authorization and return instructions before mailing the item back. Unauthorized returns may be refused or delayed.', 'dawp'); ?></span>
                        </li>
                        <li class="flex gap-4">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-accent text-white font-bold">3</span>
                            <span><?php esc_html_e('Pack the approved item securely with original packaging, tags, and included accessories where applicable.', 'dawp'); ?></span>
                        </li>
                        <li class="flex gap-4">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-accent text-white font-bold">4</span>
                            <span><?php esc_html_e('Ship the item using the approved instructions. Keep your return receipt and tracking number until the return is completed.', 'dawp'); ?></span>
                        </li>
                    </ol>
                </div>

                <div id="refunds-exchanges" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('Refund Process, Exchanges & Non-Returnable Items', 'dawp'); ?></h2>
                    <div class="grid md:grid-cols-3 gap-6">
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Refund Process', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('After your return is received, inspected, and approved, the refund is processed to the original payment method. Refund posting may take up to 7 days depending on your bank or payment provider.', 'dawp'); ?></p>
                        </div>
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Exchanges', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Exchanges are subject to stock availability. If the requested replacement is unavailable, we may offer a refund or ask you to place a new order.', 'dawp'); ?></p>
                        </div>
                        <div class="bg-surface p-6 rounded-lg border border-border">
                            <h3 class="text-foreground font-semibold text-xl mb-4"><?php esc_html_e('Non-Returnable Items', 'dawp'); ?></h3>
                            <p class="text-foreground-muted leading-relaxed"><?php esc_html_e('Items that are used, worn, damaged after delivery, missing required packaging or accessories, returned after the 30-day window, or sent back without authorization may not be eligible for return.', 'dawp'); ?></p>
                        </div>
                    </div>
                </div>

                <div id="return-support" class="text-center bg-surface p-10 rounded-lg border border-dashed border-accent/30">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-4"><?php esc_html_e('Questions About a Return?', 'dawp'); ?></h2>
                    <p class="text-foreground-muted mb-8 max-w-2xl mx-auto">
                        <?php esc_html_e('Our support team is available during Business Hours: Monday-Friday, 9:00 AM-5:00 PM, GMT-08:00. Please contact us before mailing any return.', 'dawp'); ?>
                    </p>
                    <dl class="grid md:grid-cols-2 gap-4 text-left text-sm mb-8">
                        <div class="bg-background p-5 rounded-lg border border-border">
                            <dt class="text-accent font-semibold uppercase text-xs tracking-widest mb-2"><?php esc_html_e('Store Name', 'dawp'); ?></dt>
                            <dd class="text-foreground font-semibold"><?php esc_html_e('Myveganblog', 'dawp'); ?></dd>
                        </div>
                        <div class="bg-background p-5 rounded-lg border border-border">
                            <dt class="text-accent font-semibold uppercase text-xs tracking-widest mb-2"><?php esc_html_e('Email', 'dawp'); ?></dt>
                            <dd><a href="mailto:support@myveganblog.com" class="text-foreground font-semibold hover:text-accent">support@myveganblog.com</a></dd>
                        </div>
                    </dl>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="mailto:support@myveganblog.com" class="inline-flex items-center justify-center bg-accent text-white px-8 py-3 rounded-full font-medium hover:bg-accent-hover transition-colors shadow-lg shadow-accent/20"><?php esc_html_e('Email Support', 'dawp'); ?></a>
                        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex items-center justify-center bg-white text-foreground border border-border px-8 py-3 rounded-full font-medium hover:bg-surface transition-colors"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
