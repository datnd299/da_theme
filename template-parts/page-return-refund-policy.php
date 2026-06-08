<?php
/**
 * Template Name: Return & Refund Policy
 * Template Part: page-return-refund-policy
 */

get_header();
?>

<main id="primary" class="bg-white text-slickText font-body">

    <section class="relative overflow-hidden bg-slickBlack text-white">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(34,197,94,0.35),transparent_34%),linear-gradient(135deg,#0B0F0D_0%,#123D2A_58%,#0B0F0D_100%)]"></div>
        <div class="absolute -right-24 top-16 h-80 w-80 rounded-full bg-slickActive/20 blur-3xl"></div>
        <div class="absolute -left-24 bottom-0 h-80 w-80 rounded-full bg-slickLime/10 blur-3xl"></div>

        <div class="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
            <div class="max-w-4xl">
                <p class="mb-5 text-sm font-black uppercase tracking-[0.24em] text-slickLime">
                    <?php esc_html_e('Customer Care', 'dawp'); ?>
                </p>

                <h1 class="font-heading text-5xl font-black uppercase leading-[0.92] tracking-[-0.05em] text-white sm:text-6xl lg:text-7xl">
                    <?php esc_html_e('Return & Refund Policy', 'dawp'); ?>
                </h1>

                <p class="mt-6 max-w-2xl text-lg leading-8 text-white/85">
                    <?php esc_html_e('Clear return eligibility, return shipping fees, delivery issue support, exchange rules, and refund timing for Slicktee orders.', 'dawp'); ?>
                </p>

                <p class="mt-6 inline-flex rounded-md border border-white/15 bg-white/10 px-4 py-3 text-sm font-black uppercase tracking-wide text-white/85">
                    <?php esc_html_e('Last Updated: June 8, 2026', 'dawp'); ?>
                </p>
            </div>
        </div>
    </section>

    <section class="bg-slickSoft py-12 lg:py-16">
        <div class="policy-highlight-slider mx-auto grid max-w-7xl grid-cols-1 gap-5 px-4 sm:grid-cols-2 sm:px-6 lg:grid-cols-3 lg:px-8">

            <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-slickGreen text-sm font-black text-white">
                    01
                </div>
                <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                    <?php esc_html_e('30-Day Window', 'dawp'); ?>
                </h3>
                <p class="mt-3 text-sm leading-6 text-slickMuted">
                    <?php esc_html_e('You must initiate your return request within 30 days of delivery.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-slickActive text-sm font-black text-slickBlack">
                    02
                </div>
                <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                    <?php esc_html_e('Free Restocking', 'dawp'); ?>
                </h3>
                <p class="mt-3 text-sm leading-6 text-slickMuted">
                    <?php esc_html_e('We do not charge any restocking fees for eligible returns.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-slickLime text-sm font-black text-slickBlack">
                    03
                </div>
                <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                    <?php esc_html_e('7 Business Days', 'dawp'); ?>
                </h3>
                <p class="mt-3 text-sm leading-6 text-slickMuted">
                    <?php esc_html_e('Approved refunds are processed back to the original payment method within 7 business days.', 'dawp'); ?>
                </p>
            </div>

        </div>
    </section>

    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">

            <div class="space-y-8">

                <section id="eligibility" class="rounded-3xl border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Return Eligibility', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('To be eligible for a return, your item must meet the following criteria:', 'dawp'); ?>
                        </p>

                        <ul class="space-y-3">
                            <li class="flex gap-3">
                                <span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span>
                                <span><?php esc_html_e('Return Window: You must initiate your return request within 30 days of delivery.', 'dawp'); ?></span>
                            </li>
                            <li class="flex gap-3">
                                <span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span>
                                <span><?php esc_html_e('Condition: Items must be unworn, unused, undamaged, and in their original, unaltered condition.', 'dawp'); ?></span>
                            </li>
                            <li class="flex gap-3">
                                <span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span>
                                <span><?php esc_html_e('Packaging: Items must be returned with all original packaging, tags, labels, care cards, pouches, boxes, and any included accessories.', 'dawp'); ?></span>
                            </li>
                            <li class="flex gap-3">
                                <span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span>
                                <span><?php esc_html_e('Restocking Fee: Free. We do not charge any restocking fees for eligible returns.', 'dawp'); ?></span>
                            </li>
                        </ul>
                    </div>
                </section>

                <section id="shipping-fees" class="rounded-3xl border border-[#E5E7EB] bg-slickSoft p-7 lg:p-10">
                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Return Shipping Fees', 'dawp'); ?>
                    </h2>

                    <div class="mt-7 grid grid-cols-1 gap-5 lg:grid-cols-2">
                        <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6">
                            <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                                <?php esc_html_e('Defective, Damaged, Or Incorrect Products', 'dawp'); ?>
                            </h3>
                            <p class="mt-4 text-base leading-8 text-slickMuted">
                                <?php esc_html_e('Wrong item, carrier damage, or defective: No cost to customer. We cover 100% of the return shipping costs. We will provide a downloadable and printable prepaid shipping label via email.', 'dawp'); ?>
                            </p>
                        </div>

                        <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6">
                            <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                                <?php esc_html_e('Customer Remorse', 'dawp'); ?>
                            </h3>
                            <p class="mt-4 text-base leading-8 text-slickMuted">
                                <?php esc_html_e('Ordered wrong item/size/color, changed mind, or does not fit: The customer is responsible for the return shipping cost. The actual return shipping cost of the provided prepaid label sent via email will be deducted from your final refund amount.', 'dawp'); ?>
                            </p>
                        </div>
                    </div>
                </section>

                <section id="delivery-issues" class="rounded-3xl border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Common Delivery Issues', 'dawp'); ?>
                    </h2>

                    <div class="mt-7 space-y-7 text-base leading-8 text-slickMuted">
                        <div>
                            <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                                <?php esc_html_e('Damaged On Arrival', 'dawp'); ?>
                            </h3>
                            <p class="mt-3">
                                <?php esc_html_e('If your order arrives damaged, please contact us within 30 days of delivery with photos of the item and the shipping packaging, including the shipping label. We will arrange a replacement or full refund at no cost to you.', 'dawp'); ?>
                            </p>
                        </div>

                        <div>
                            <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                                <?php esc_html_e('Lost Packages / Never Arrived', 'dawp'); ?>
                            </h3>
                            <p class="mt-3">
                                <?php esc_html_e('If your tracking status shows no updates for an extended period, or is marked "Delivered" but you did not receive it, please contact us within 30 days of the recorded delivery date. We will investigate with the carrier and arrange a replacement or refund if the package is confirmed lost.', 'dawp'); ?>
                            </p>
                        </div>
                    </div>
                </section>

                <section id="return-process" class="rounded-3xl border border-[#E5E7EB] bg-slickSoft p-7 lg:p-10">
                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('How To Return An Item', 'dawp'); ?>
                    </h2>

                    <p class="mt-5 text-base leading-8 text-slickMuted">
                        <?php esc_html_e('Please follow our official 3-step process. Do not ship any item back without prior authorization, as unauthorized returns cannot be tracked or processed at our warehouse.', 'dawp'); ?>
                    </p>

                    <div class="mt-7 space-y-4">
                        <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6">
                            <div class="flex gap-4">
                                <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-slickBlack text-sm font-black text-white">1</span>
                                <div>
                                    <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                                        <?php esc_html_e('Submit Your Return Request', 'dawp'); ?>
                                    </h3>
                                    <p class="mt-3 text-base leading-8 text-slickMuted">
                                        <?php esc_html_e('Email us or use our Contact Page within 30 days of delivery. Please provide your order number, the email used at checkout, the specific item(s) you wish to return, and the reason for the return with photos or videos if damaged.', 'dawp'); ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6">
                            <div class="flex gap-4">
                                <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-slickBlack text-sm font-black text-white">2</span>
                                <div>
                                    <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                                        <?php esc_html_e('Receive Approval & Pack Your Item', 'dawp'); ?>
                                    </h3>
                                    <div class="mt-3 space-y-4 text-base leading-8 text-slickMuted">
                                        <p>
                                            <?php esc_html_e('Our support team will review your request within 1-2 business days. Once approved, we will email you a Return Merchandise Authorization (RMA) number along with a prepaid shipping label.', 'dawp'); ?>
                                        </p>
                                        <p>
                                            <?php esc_html_e('Repack the item securely in its original packaging with all included accessories, tags, and boxes. Place it inside a sturdy outer shipping box.', 'dawp'); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6">
                            <div class="flex gap-4">
                                <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-slickBlack text-sm font-black text-white">3</span>
                                <div>
                                    <h3 class="font-heading text-2xl font-black uppercase tracking-[-0.03em] text-slickText">
                                        <?php esc_html_e('Ship It Back To Our Returns Center', 'dawp'); ?>
                                    </h3>
                                    <p class="mt-3 text-base leading-8 text-slickMuted">
                                        <?php esc_html_e('Print the prepaid shipping label, attach it to the outside of your shipping box, and drop it off at the designated carrier location.', 'dawp'); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 rounded-2xl border border-slickActive/40 bg-slickActive/10 p-6 text-slickText">
                        <p class="font-black">
                            <?php esc_html_e('Slicktee - Returns Department', 'dawp'); ?>
                        </p>
                        <p class="mt-2 text-sm leading-6">
                            <?php esc_html_e('425 Avenue P, Newark, NJ 07105', 'dawp'); ?>
                        </p>
                    </div>

                    <div class="mt-7 flex flex-wrap gap-4">
                        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>"
                           class="inline-flex min-h-12 items-center justify-center rounded-md bg-slickBlack px-6 text-sm font-black uppercase tracking-wide text-white transition hover:bg-slickGreen">
                            <?php esc_html_e('Contact Support', 'dawp'); ?>
                        </a>

                        <a href="mailto:support@slicktee.com"
                           class="inline-flex min-h-12 items-center justify-center rounded-md border border-slickBlack px-6 text-sm font-black uppercase tracking-wide text-slickBlack transition hover:bg-slickBlack hover:text-white">
                            <?php esc_html_e('support@slicktee.com', 'dawp'); ?>
                        </a>
                    </div>
                </section>

                <section id="exchanges" class="rounded-3xl border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Exchanges', 'dawp'); ?>
                    </h2>

                    <p class="mt-5 text-base leading-8 text-slickMuted">
                        <?php esc_html_e('We do not process direct one-for-one product exchanges. To get a different size, color, or model, please follow the return process above to send back your original purchase for a refund, and place a new order on our website simultaneously. This ensures your desired item does not sell out.', 'dawp'); ?>
                    </p>
                </section>

                <section id="refund-process" class="rounded-3xl border border-[#E5E7EB] bg-slickSoft p-7 lg:p-10">
                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Refund Process & Timing', 'dawp'); ?>
                    </h2>

                    <ul class="mt-6 space-y-3 text-base leading-8 text-slickMuted">
                        <li class="flex gap-3">
                            <span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span>
                            <span><?php esc_html_e('Inspection: Once your return package is received at our warehouse, we will inspect the item within 1-2 business days to ensure it meets our return criteria.', 'dawp'); ?></span>
                        </li>
                        <li class="flex gap-3">
                            <span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span>
                            <span><?php esc_html_e('Approval & Timing: If approved, your refund will be processed automatically back to your original payment method within 7 business days.', 'dawp'); ?></span>
                        </li>
                        <li class="flex gap-3">
                            <span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span>
                            <span><?php esc_html_e('Refund Method: All refunds will be issued solely to your original method of payment within 7 business days of inspection. We do not offer store credit or gift cards as a refund method for returns.', 'dawp'); ?></span>
                        </li>
                        <li class="flex gap-3">
                            <span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span>
                            <span><?php esc_html_e('Issues with Returns: If a return is approved but is found to be missing accessories, tags, boxes, or shows signs of wear, we reserve the right to refuse the refund and will offer to ship the item back to you at your expense.', 'dawp'); ?></span>
                        </li>
                        <li class="flex gap-3">
                            <span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span>
                            <span><?php esc_html_e('Delayed Refunds: If you have not received your refund after 15 business days of approval, please check with your bank or credit card company first, then contact us.', 'dawp'); ?></span>
                        </li>
                    </ul>

                    <div class="mt-7">
                        <a href="mailto:support@slicktee.com"
                           class="inline-flex min-h-12 items-center justify-center rounded-md border border-slickBlack px-6 text-sm font-black uppercase tracking-wide text-slickBlack transition hover:bg-slickBlack hover:text-white">
                            <?php esc_html_e('Email Support', 'dawp'); ?>
                        </a>
                    </div>
                </section>

                <section id="non-returnable" class="rounded-3xl border border-[#E5E7EB] bg-white p-7 shadow-sm lg:p-10">
                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Non-Returnable Items', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-slickMuted">
                        <p>
                            <?php esc_html_e('The following items are strictly non-returnable and final sale:', 'dawp'); ?>
                        </p>

                        <ul class="space-y-3">
                            <li class="flex gap-3">
                                <span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span>
                                <span><?php esc_html_e('Items explicitly marked as "Final Sale" or "Non-Returnable" on the product page.', 'dawp'); ?></span>
                            </li>
                            <li class="flex gap-3">
                                <span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span>
                                <span><?php esc_html_e('Gift cards or digital products/downloads.', 'dawp'); ?></span>
                            </li>
                            <li class="flex gap-3">
                                <span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span>
                                <span><?php esc_html_e('Personalized, engraved, resized, or custom-made items.', 'dawp'); ?></span>
                            </li>
                            <li class="flex gap-3">
                                <span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span>
                                <span><?php esc_html_e('Intimate apparel, swimwear, or hygiene-sensitive items where the product seal has been broken.', 'dawp'); ?></span>
                            </li>
                            <li class="flex gap-3">
                                <span class="mt-3 h-2 w-2 shrink-0 rounded-full bg-slickActive"></span>
                                <span><?php esc_html_e('Items that have been worn, washed, altered, or damaged after delivery.', 'dawp'); ?></span>
                            </li>
                        </ul>
                    </div>
                </section>

                <section id="contact" class="rounded-3xl border border-[#E5E7EB] bg-slickSoft p-7 lg:p-10">
                    <h2 class="font-heading text-4xl font-black uppercase tracking-[-0.04em] text-slickText">
                        <?php esc_html_e('Contact Information', 'dawp'); ?>
                    </h2>

                    <div class="mt-7 rounded-2xl border border-[#E5E7EB] bg-white p-5">
                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                            <div class="rounded-2xl border border-[#E5E7EB] p-5">
                                <p class="text-sm font-black uppercase tracking-wide text-slickText">
                                    <?php esc_html_e('Store Name', 'dawp'); ?>
                                </p>
                                <p class="mt-3 text-base leading-7 text-slickMuted">
                                    <?php esc_html_e('Slicktee', 'dawp'); ?>
                                </p>
                            </div>

                            <div class="rounded-2xl border border-[#E5E7EB] p-5">
                                <p class="text-sm font-black uppercase tracking-wide text-slickText">
                                    <?php esc_html_e('Address', 'dawp'); ?>
                                </p>
                                <p class="mt-3 text-base leading-7 text-slickMuted">
                                    <?php esc_html_e('425 Avenue P, Newark, NJ 07105', 'dawp'); ?>
                                </p>
                            </div>

                            <div class="rounded-2xl border border-[#E5E7EB] p-5">
                                <p class="text-sm font-black uppercase tracking-wide text-slickText">
                                    <?php esc_html_e('Email', 'dawp'); ?>
                                </p>
                                <p class="mt-3 text-base leading-7 text-slickMuted">
                                    <a href="mailto:support@slicktee.com" class="font-bold text-slickText transition hover:text-slickGreen">
                                        support@slicktee.com
                                    </a>
                                </p>
                            </div>

                            <div class="rounded-2xl border border-[#E5E7EB] p-5">
                                <p class="text-sm font-black uppercase tracking-wide text-slickText">
                                    <?php esc_html_e('Contact Support', 'dawp'); ?>
                                </p>
                                <p class="mt-3 text-base leading-7 text-slickMuted">
                                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="font-bold text-slickText transition hover:text-slickGreen">
                                        <?php esc_html_e('Contact Us page', 'dawp'); ?>
                                    </a>
                                </p>
                            </div>

                            <div class="rounded-2xl border border-[#E5E7EB] p-5">
                                <p class="text-sm font-black uppercase tracking-wide text-slickText">
                                    <?php esc_html_e('Customer Service Hours', 'dawp'); ?>
                                </p>
                                <p class="mt-3 text-base leading-7 text-slickMuted">
                                    <?php esc_html_e('Business Hours: Monday-Friday, 9:00 AM-6:00 PM PST', 'dawp'); ?>
                                </p>
                            </div>

                            <div class="rounded-2xl border border-[#E5E7EB] p-5">
                                <p class="text-sm font-black uppercase tracking-wide text-slickText">
                                    <?php esc_html_e('Response Time', 'dawp'); ?>
                                </p>
                                <p class="mt-3 text-base leading-7 text-slickMuted">
                                    <?php esc_html_e('We aim to reply within 1 business day. Response times may vary on weekends, holidays, or high-volume periods.', 'dawp'); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </section>

</main>

<?php
get_footer();
