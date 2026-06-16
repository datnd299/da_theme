<?php
/**
 * Template Part: Refund & Return Policy
 */
$store_address = dawp_get_woocommerce_store_address();
?>

<style>
    .sk-refund-page {
        --sk-refund-cream: #F7F2E8;
        --sk-refund-rose: #B31942;
        --sk-refund-rose-dark: #921233;
        --sk-refund-gold: #C6A15B;
        --sk-refund-navy: #0B1F3A;
        --sk-refund-blue: #153866;
        --sk-refund-ink: #111827;
        --sk-refund-muted: #6B7280;
        --sk-refund-border: #E5E7EB;
        background: linear-gradient(180deg, #fff 0%, var(--sk-refund-cream) 18%, #fff 100%);
        color: var(--sk-refund-muted);
    }

    .sk-refund-page .sk-policy-hero {
        background:
            linear-gradient(135deg, rgba(11, 31, 58, .98), rgba(21, 56, 102, .94) 48%, rgba(179, 25, 66, .88)),
            var(--sk-refund-navy);
        border-bottom-color: rgba(198, 161, 91, .32);
    }

    .sk-refund-page .sk-policy-hero::before {
        background: rgba(198, 161, 91, .22);
    }

    .sk-refund-page .sk-policy-hero::after {
        border-color: rgba(198, 161, 91, .26);
        background: rgba(255, 255, 255, .08);
    }

    .sk-refund-page .sk-policy-hero .text-accent {
        color: var(--sk-refund-gold);
    }

    .sk-refund-page .sk-policy-hero .text-foreground,
    .sk-refund-page .sk-policy-hero .text-foreground-muted {
        color: #fff;
    }

    .sk-refund-page .sk-policy-hero__copy {
        color: rgba(255, 255, 255, .82);
    }

    .sk-refund-page .sk-policy-body > .container > .space-y-8 > section {
        border-color: rgba(229, 231, 235, .95);
        background: linear-gradient(180deg, rgba(255, 255, 255, .98), rgba(247, 242, 232, .5)), #fff;
        box-shadow: 0 12px 34px rgba(11, 31, 58, .08);
    }

    .sk-refund-page .sk-policy-body > .container > .space-y-8 > section:nth-child(even) {
        background: linear-gradient(180deg, rgba(247, 242, 232, .72), rgba(255, 255, 255, .96)), #fff;
    }

    .sk-refund-page .sk-policy-body h2::after {
        background: var(--sk-refund-rose);
    }

    .sk-refund-page .sk-policy-body .rounded-2xl {
        border-color: rgba(229, 231, 235, .95);
        background: rgba(255, 255, 255, .76);
    }

    .sk-refund-page .sk-policy-body span.bg-foreground,
    .sk-refund-page .sk-policy-body a.bg-foreground {
        background: var(--sk-refund-rose);
    }

    .sk-refund-page .sk-policy-body a.bg-foreground:hover {
        background: var(--sk-refund-rose-dark);
    }

    .sk-refund-page .sk-policy-body a.border-foreground {
        border-color: var(--sk-refund-rose);
        color: var(--sk-refund-rose);
    }

    .sk-refund-page .sk-policy-body a.border-foreground:hover,
    .sk-refund-page .sk-policy-body a.hover\:text-accent:hover {
        border-color: var(--sk-refund-rose-dark);
        color: var(--sk-refund-rose-dark);
    }

    .sk-refund-page .sk-policy-body .border-\[\#C6A15B\]\/30 {
        border-left: 4px solid var(--sk-refund-rose);
        border-color: rgba(198, 161, 91, .42);
        background: #FFF8E8;
    }
</style>

<main class="sk-policy-page sk-refund-page bg-surface">
    <section class="sk-policy-hero">
        <div class="container mx-auto max-w-6xl px-4">
            <div class="sk-policy-hero__inner text-center">
            <span class="mb-4 block text-sm font-bold uppercase tracking-widest text-accent"><?php esc_html_e('Customer Care', 'dawp'); ?></span>
            <h1 class="font-heading text-4xl font-bold tracking-tight text-foreground md:text-5xl lg:text-6xl"><?php esc_html_e('Refund & Return Policy', 'dawp'); ?></h1>
            <p class="mt-5 text-sm font-bold uppercase tracking-widest text-foreground"><?php esc_html_e('Last Updated: May 30, 2026', 'dawp'); ?></p>
            <p class="sk-policy-hero__copy mx-auto mt-6 max-w-3xl text-lg leading-relaxed text-foreground-muted">
                <?php esc_html_e('We want every Proudlywear piece to feel just right for you and your loved ones. Please review the return requirements below before sending any patriotic apparel, accessories, or custom gift item back to us.', 'dawp'); ?>
            </p>
            </div>
        </div>
    </section>

    <section class="sk-policy-body">
    <div class="container mx-auto max-w-6xl px-4">
        <div class="space-y-8">
            <section class="rounded-3xl border border-border bg-background p-8 shadow-card md:p-10">
                <h2 class="font-heading text-3xl font-semibold text-foreground md:text-4xl"><?php esc_html_e('Return Eligibility', 'dawp'); ?></h2>
                <p class="mt-5 text-foreground-muted"><?php esc_html_e('To be eligible for a return, your item must meet the following criteria:', 'dawp'); ?></p>
                <ul class="mt-6 list-disc space-y-4 pl-5 leading-relaxed text-foreground-muted">
                    <li><?php esc_html_e('Return Window: You must initiate your return request within 30 days of delivery.', 'dawp'); ?></li>
                    <li><?php esc_html_e('Condition: Items must be unworn, unused, undamaged, and in their original, unaltered condition.', 'dawp'); ?></li>
                    <li><?php esc_html_e('Packaging: Items must be returned with all original packaging, tags, labels, care cards, garment bags, boxes, and any included accessories.', 'dawp'); ?></li>
                    <li><?php esc_html_e('Restocking Fee: Free. We do not charge any restocking fees for eligible returns.', 'dawp'); ?></li>
                </ul>
            </section>

            <section class="rounded-3xl border border-border bg-background p-8 shadow-card md:p-10">
                <h2 class="font-heading text-3xl font-semibold text-foreground md:text-4xl"><?php esc_html_e('Return Shipping Fees', 'dawp'); ?></h2>
                <div class="mt-6 grid gap-4 md:grid-cols-2">
                    <div class="rounded-2xl border border-border bg-background p-5">
                        <h3 class="text-lg font-medium leading-snug text-foreground"><?php esc_html_e("Defective, Damaged, or Incorrect Products (Wrong item, carrier damage, or defective):", 'dawp'); ?></h3>
                        <p class="mt-5 leading-relaxed text-foreground-muted">
                            <?php esc_html_e('No cost to customer. We cover 100% of the return shipping costs. We will provide a downloadable and printable prepaid shipping label via email.', 'dawp'); ?>
                        </p>
                    </div>
                    <div class="rounded-2xl border border-border bg-background p-5">
                        <h3 class="text-lg font-medium leading-snug text-foreground"><?php esc_html_e("Customer Remorse (Ordered wrong item/size/color, changed mind, or doesn't fit):", 'dawp'); ?></h3>
                        <p class="mt-5 leading-relaxed text-foreground-muted">
                            <?php esc_html_e('The customer is responsible for the return shipping cost. The actual return shipping cost of the provided prepaid label (sent via email) will be deducted from your final refund amount.', 'dawp'); ?>
                        </p>
                    </div>
                </div>
            </section>

            <section class="rounded-3xl border border-border bg-background p-8 shadow-card md:p-10">
                <h2 class="font-heading text-3xl font-semibold text-foreground md:text-4xl"><?php esc_html_e('Common Delivery Issues', 'dawp'); ?></h2>
                <div class="mt-7 space-y-7 text-foreground-muted">
                    <div>
                        <h3 class="text-lg font-medium text-foreground"><?php esc_html_e('Damaged on Arrival', 'dawp'); ?></h3>
                        <p class="mt-4 leading-relaxed">
                            <?php esc_html_e('If your order arrives damaged, please contact us within 30 days of delivery with photos of the item and the shipping packaging, including the shipping label. We will arrange a replacement or full refund at no cost to you.', 'dawp'); ?>
                        </p>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-foreground"><?php esc_html_e('Lost Packages / Never Arrived', 'dawp'); ?></h3>
                        <p class="mt-4 leading-relaxed">
                            <?php esc_html_e('If your tracking status shows no updates for an extended period, or is marked "Delivered" but you did not receive it, please contact us within 30 days of the recorded delivery date. We will investigate with the carrier and arrange a replacement or refund if the package is confirmed lost.', 'dawp'); ?>
                        </p>
                    </div>
                </div>
            </section>

            <section class="rounded-3xl border border-border bg-background p-8 shadow-card md:p-10">
                <h2 class="font-heading text-3xl font-semibold text-foreground md:text-4xl"><?php esc_html_e('How to Return an Item', 'dawp'); ?></h2>
                <p class="mt-5 leading-relaxed text-foreground-muted">
                    <?php esc_html_e('Please follow our official 3-step process. Do not ship any item back without prior authorization, as unauthorized returns cannot be tracked or processed at our warehouse.', 'dawp'); ?>
                </p>

                <div class="mt-6 space-y-4">
                    <div class="rounded-2xl border border-border bg-background p-5 md:p-6">
                        <div class="flex gap-4">
                            <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-foreground text-sm font-bold text-white">1</span>
                            <div>
                                <h3 class="text-lg font-medium text-foreground"><?php esc_html_e('Submit Your Return Request', 'dawp'); ?></h3>
                                <p class="mt-5 leading-relaxed text-foreground-muted">
                                    <?php esc_html_e('Email us or use our Contact Page within 30 days of delivery. Please provide your order number, the email used at checkout, the specific item(s) you wish to return, and the reason for the return with photos or videos if damaged.', 'dawp'); ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-2xl border border-border bg-background p-5 md:p-6">
                        <div class="flex gap-4">
                            <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-foreground text-sm font-bold text-white">2</span>
                            <div>
                                <h3 class="text-lg font-medium text-foreground"><?php esc_html_e('Receive Approval & Pack Your Item', 'dawp'); ?></h3>
                                <p class="mt-5 leading-relaxed text-foreground-muted">
                                    <?php esc_html_e('Our support team will review your request within 1-2 business days. Once approved, we will email you a Return Merchandise Authorization (RMA) number along with a prepaid shipping label.', 'dawp'); ?>
                                </p>
                                <p class="mt-5 leading-relaxed text-foreground-muted">
                                    <?php esc_html_e('Repack the item securely in its original packaging with all included accessories, tags, and boxes. Place it inside a sturdy outer shipping box.', 'dawp'); ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-2xl border border-border bg-background p-5 md:p-6">
                        <div class="flex gap-4">
                            <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-foreground text-sm font-bold text-white">3</span>
                            <div>
                                <h3 class="text-lg font-medium text-foreground"><?php esc_html_e('Ship It Back to Our Returns Center', 'dawp'); ?></h3>
                                <p class="mt-5 leading-relaxed text-foreground-muted">
                                    <?php esc_html_e('Print the prepaid shipping label, attach it to the outside of your shipping box, and drop it off at the designated carrier location.', 'dawp'); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-5 rounded-2xl border border-[#C6A15B]/30 bg-[#F7F2E8] p-5 text-foreground">
                    <p class="font-bold"><?php esc_html_e('Proudlywear - Returns Department', 'dawp'); ?></p>
                    <p class="mt-2"><?php echo esc_html($store_address); ?></p>
                </div>

                <div class="mt-7 flex flex-wrap gap-4">
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-foreground px-6 text-sm font-bold text-white transition-colors hover:bg-accent">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>
                    <a href="mailto:support@proudlywear.com" class="inline-flex min-h-12 items-center justify-center rounded-full border border-foreground px-6 text-sm font-bold text-foreground transition-colors hover:border-accent hover:text-accent">
                        <?php esc_html_e('support@proudlywear.com', 'dawp'); ?>
                    </a>
                </div>
            </section>

            <section class="rounded-3xl border border-border bg-background p-8 shadow-card md:p-10">
                <h2 class="font-heading text-3xl font-semibold text-foreground md:text-4xl"><?php esc_html_e('Exchanges', 'dawp'); ?></h2>
                <p class="mt-5 leading-relaxed text-foreground-muted">
                    <?php esc_html_e('We do not process direct one-for-one product exchanges. To get a different size, color, or style, please follow the return process above to send back your original purchase for a refund, and place a new order on our website simultaneously. This ensures your desired item does not sell out.', 'dawp'); ?>
                </p>
            </section>

            <section class="rounded-3xl border border-border bg-background p-8 shadow-card md:p-10">
                <h2 class="font-heading text-3xl font-semibold text-foreground md:text-4xl"><?php esc_html_e('Refund Process & Timing', 'dawp'); ?></h2>
                <ul class="mt-6 list-disc space-y-4 pl-5 leading-relaxed text-foreground-muted">
                    <li><?php esc_html_e('Inspection: Once your return package is received at our warehouse, we will inspect the item within 1-2 business days to ensure it meets our return criteria.', 'dawp'); ?></li>
                    <li><?php esc_html_e('Approval & Timing: If approved, your refund will be processed automatically back to your original payment method within 7 business days.', 'dawp'); ?></li>
                    <li><?php esc_html_e('Refund Method: All refunds will be issued solely to your original method of payment within 7 business days of inspection. We do not offer store credit or gift cards as a refund method for returns.', 'dawp'); ?></li>
                    <li><?php esc_html_e('Issues with Returns: If a return is approved but is found to be missing accessories, tags, boxes, or shows signs of wear, we reserve the right to refuse the refund and will offer to ship the item back to you at your expense.', 'dawp'); ?></li>
                    <li><?php esc_html_e('Delayed Refunds: If you have not received your refund after 15 business days of approval, please check with your bank or credit card company first, then contact us.', 'dawp'); ?></li>
                </ul>
                <a href="mailto:support@proudlywear.com" class="mt-8 inline-flex min-h-12 items-center justify-center rounded-full border border-foreground px-6 text-sm font-bold text-foreground transition-colors hover:border-accent hover:text-accent">
                    <?php esc_html_e('Email Support', 'dawp'); ?>
                </a>
            </section>

            <section class="rounded-3xl border border-border bg-background p-8 shadow-card md:p-10">
                <h2 class="font-heading text-3xl font-semibold text-foreground md:text-4xl"><?php esc_html_e('Non-Returnable Items', 'dawp'); ?></h2>
                <p class="mt-5 text-foreground-muted"><?php esc_html_e('The following items are strictly non-returnable and final sale:', 'dawp'); ?></p>
                <ul class="mt-6 list-disc space-y-4 pl-5 leading-relaxed text-foreground-muted">
                    <li><?php esc_html_e('Items explicitly marked as "Final Sale" or "Non-Returnable" on the product page.', 'dawp'); ?></li>
                    <li><?php esc_html_e('Gift cards or digital products/downloads.', 'dawp'); ?></li>
                    <li><?php esc_html_e('Personalized, resized, or custom-made items.', 'dawp'); ?></li>
                    <li><?php esc_html_e('Intimate apparel, swimwear, or hygiene-sensitive items where the product seal has been broken.', 'dawp'); ?></li>
                    <li><?php esc_html_e('Items that have been worn, washed, altered, or damaged after delivery.', 'dawp'); ?></li>
                </ul>
            </section>

            <section class="rounded-3xl border border-border bg-background p-8 shadow-card md:p-10">
                <h2 class="font-heading text-3xl font-semibold text-foreground md:text-4xl"><?php esc_html_e('Contact Information', 'dawp'); ?></h2>
                <div class="mt-6 rounded-3xl border border-border bg-background p-4 md:p-5">
                    <div class="grid gap-4 md:grid-cols-2">
                        <div class="rounded-2xl border border-border p-5">
                            <h3 class="font-bold text-foreground"><?php esc_html_e('Store Name', 'dawp'); ?></h3>
                            <p class="mt-3 text-foreground-muted"><?php esc_html_e('Proudlywear', 'dawp'); ?></p>
                        </div>
                        <div class="rounded-2xl border border-border p-5">
                            <h3 class="font-bold text-foreground"><?php esc_html_e('Address', 'dawp'); ?></h3>
                            <p class="mt-3 text-foreground-muted"><?php echo esc_html($store_address); ?></p>
                        </div>
                        <div class="rounded-2xl border border-border p-5">
                            <h3 class="font-bold text-foreground"><?php esc_html_e('Email', 'dawp'); ?></h3>
                            <p class="mt-3 text-foreground-muted"><a href="mailto:support@proudlywear.com" class="transition-colors hover:text-accent">support@proudlywear.com</a></p>
                        </div>
                        <div class="rounded-2xl border border-border p-5">
                            <h3 class="font-bold text-foreground"><?php esc_html_e('Contact Support', 'dawp'); ?></h3>
                            <p class="mt-3 text-foreground-muted"><a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="transition-colors hover:text-accent"><?php esc_html_e('Contact Us page', 'dawp'); ?></a></p>
                        </div>
                        <div class="rounded-2xl border border-border p-5">
                            <h3 class="font-bold text-foreground"><?php esc_html_e('Support Availability', 'dawp'); ?></h3>
                            <p class="mt-3 text-foreground-muted"><?php esc_html_e('Monday-Friday, 10:00 AM-6:00 PM PST', 'dawp'); ?></p>
                        </div>
                        <div class="rounded-2xl border border-border p-5">
                            <h3 class="font-bold text-foreground"><?php esc_html_e('Response Time', 'dawp'); ?></h3>
                            <p class="mt-3 leading-relaxed text-foreground-muted"><?php esc_html_e('We aim to reply within 1 business day. Response times may vary on weekends, holidays, or high-volume periods.', 'dawp'); ?></p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    </section>
</main>

