<?php
/**
 * Template Part: Refund & Return Policy Page
 */

?>

<section class="bg-[#F7F8FA] py-16 lg:py-24">
    <div class="mx-auto w-[min(100%-32px,1180px)]">
        <div class="mb-12 text-center">
            <span class="mb-4 block text-xs font-black uppercase tracking-[0.18em] text-[#D71920]"><?php esc_html_e('Store Policies', 'dawp'); ?></span>
            <h1 class="font-heading text-5xl font-black uppercase leading-none text-[#111827] md:text-6xl"><?php esc_html_e('Refund & Return Policy', 'dawp'); ?></h1>
            <p class="mx-auto mt-5 max-w-3xl text-lg leading-8 text-[#6B7280]">
                <?php esc_html_e('Last Updated: June 3, 2026', 'dawp'); ?>
            </p>
            <p class="mx-auto mt-4 max-w-3xl text-lg leading-8 text-[#6B7280]">
                <?php esc_html_e('Shopmivo accepts eligible unused items in original condition within 30 days of delivery.', 'dawp'); ?>
            </p>
        </div>

        <div class="space-y-8">
                <section id="return-eligibility" class="rounded-xl border border-[#E5E7EB] bg-white p-8 shadow-card md:p-10">
                    <h2 class="font-heading text-3xl font-black uppercase text-[#111827]"><?php esc_html_e('Return Eligibility', 'dawp'); ?></h2>
                    <p class="mt-5 leading-8 text-[#6B7280]"><?php esc_html_e('To be eligible for a return, your item must meet the following criteria:', 'dawp'); ?></p>
                    <ul class="mt-6 space-y-4 leading-8 text-[#6B7280]">
                        <li class="rounded-lg bg-[#F7F8FA] p-5"><?php esc_html_e('Return Window: You must initiate your return request within 30 days of delivery.', 'dawp'); ?></li>
                        <li class="rounded-lg bg-[#F7F8FA] p-5"><?php esc_html_e('Condition: Items must be unused, undamaged, and in their original, unaltered condition.', 'dawp'); ?></li>
                        <li class="rounded-lg bg-[#F7F8FA] p-5"><?php esc_html_e('Packaging: Items must be returned with all original packaging, tags, labels, manuals, and any included accessories.', 'dawp'); ?></li>
                        <li class="rounded-lg bg-[#F7F8FA] p-5"><?php esc_html_e('Restocking Fee: Free. We do not charge any restocking fees for eligible returns.', 'dawp'); ?></li>
                    </ul>
                </section>

                <section id="return-shipping-fees" class="rounded-xl border border-[#E5E7EB] bg-white p-8 shadow-card md:p-10">
                    <h2 class="font-heading text-3xl font-black uppercase text-[#111827]"><?php esc_html_e('Return Shipping Fees', 'dawp'); ?></h2>
                    <div class="mt-6 grid gap-5 md:grid-cols-2">
                        <div class="rounded-lg border border-[#E5E7EB] bg-[#F7F8FA] p-6">
                            <h3 class="text-xl font-black text-[#111827]"><?php esc_html_e('Defective, Damaged, or Incorrect Products (Wrong item, carrier damage, or defective):', 'dawp'); ?></h3>
                            <p class="mt-4 leading-8 text-[#6B7280]"><?php esc_html_e('No cost to customer. We cover 100% of the return shipping costs. We will provide a downloadable and printable prepaid shipping label via email.', 'dawp'); ?></p>
                        </div>
                        <div class="rounded-lg border border-[#E5E7EB] bg-[#F7F8FA] p-6">
                            <h3 class="text-xl font-black text-[#111827]"><?php esc_html_e("Customer Remorse (Ordered wrong item/size/color, changed mind, or doesn't fit):", 'dawp'); ?></h3>
                            <p class="mt-4 leading-8 text-[#6B7280]"><?php esc_html_e('The customer is responsible for the return shipping cost. The actual return shipping cost of the provided prepaid label (sent via email) will be deducted from your final refund amount.', 'dawp'); ?></p>
                        </div>
                    </div>
                </section>

                <section id="delivery-issues" class="rounded-xl border border-[#E5E7EB] bg-white p-8 shadow-card md:p-10">
                    <h2 class="font-heading text-3xl font-black uppercase text-[#111827]"><?php esc_html_e('Common Delivery Issues', 'dawp'); ?></h2>
                    <div class="mt-6 space-y-6 leading-8 text-[#6B7280]">
                        <div>
                            <h3 class="text-xl font-black text-[#111827]"><?php esc_html_e('Damaged on Arrival', 'dawp'); ?></h3>
                            <p class="mt-3"><?php esc_html_e('If your order arrives damaged, please contact us within 30 days of delivery with photos of the item and the shipping packaging, including the shipping label. We will arrange a replacement or full refund at no cost to you.', 'dawp'); ?></p>
                        </div>
                        <div>
                            <h3 class="text-xl font-black text-[#111827]"><?php esc_html_e('Lost Packages / Never Arrived', 'dawp'); ?></h3>
                            <p class="mt-3"><?php esc_html_e('If your tracking status shows no updates for an extended period, or is marked "Delivered" but you did not receive it, please contact us within 30 days of the recorded delivery date. We will investigate with the carrier and arrange a replacement or refund if the package is confirmed lost.', 'dawp'); ?></p>
                        </div>
                    </div>
                </section>

                <section id="return-process" class="rounded-xl border border-[#E5E7EB] bg-white p-8 shadow-card md:p-10">
                    <h2 class="font-heading text-3xl font-black uppercase text-[#111827]"><?php esc_html_e('How to Return an Item', 'dawp'); ?></h2>
                    <p class="mt-5 leading-8 text-[#6B7280]"><?php esc_html_e('Please follow our official 3-step process. Do not ship any item back without prior authorization, as unauthorized returns cannot be tracked or processed at our warehouse.', 'dawp'); ?></p>

                    <div class="mt-6 space-y-4">
                        <div class="rounded-lg border border-[#E5E7EB] bg-white p-6">
                            <div class="flex gap-4">
                                <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#111827] text-sm font-black text-white">1</span>
                                <div>
                                    <h3 class="text-xl font-black text-[#111827]"><?php esc_html_e('Submit Your Return Request', 'dawp'); ?></h3>
                                    <p class="mt-3 leading-8 text-[#6B7280]">
                                        <?php esc_html_e('Use our', 'dawp'); ?>
                                        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="font-bold text-[#D71920] hover:underline"><?php esc_html_e('Contact Page', 'dawp'); ?></a>
                                        <?php esc_html_e('within 30 days of delivery. Please provide your order number, the email used at checkout, the specific item(s) you wish to return, and the reason for the return with photos or videos if damaged.', 'dawp'); ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="rounded-lg border border-[#E5E7EB] bg-white p-6">
                            <div class="flex gap-4">
                                <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#111827] text-sm font-black text-white">2</span>
                                <div>
                                    <h3 class="text-xl font-black text-[#111827]"><?php esc_html_e('Receive Approval & Pack Your Item', 'dawp'); ?></h3>
                                    <p class="mt-3 leading-8 text-[#6B7280]"><?php esc_html_e('Our support team will review your request within 1-2 business days. Once approved, we will email you a Return Merchandise Authorization (RMA) number along with a prepaid shipping label.', 'dawp'); ?></p>
                                    <p class="mt-3 leading-8 text-[#6B7280]"><?php esc_html_e('Repack the item securely in its original packaging with all included accessories, tags, and boxes. Place it inside a sturdy outer shipping box.', 'dawp'); ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="rounded-lg border border-[#E5E7EB] bg-white p-6">
                            <div class="flex gap-4">
                                <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#111827] text-sm font-black text-white">3</span>
                                <div>
                                    <h3 class="text-xl font-black text-[#111827]"><?php esc_html_e('Ship It Back to Our Returns Center', 'dawp'); ?></h3>
                                    <p class="mt-3 leading-8 text-[#6B7280]"><?php esc_html_e('Print the prepaid shipping label, attach it to the outside of your shipping box, and drop it off at the designated carrier location.', 'dawp'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 rounded-lg border border-[#F2C94C] bg-[#FFF7E6] p-5">
                        <p class="font-black text-[#111827]"><?php esc_html_e('Shopmivo - Returns Department', 'dawp'); ?></p>
                        <p class="mt-2 text-[#111827]">1777 Canal St, Merced, CA 95340, United States</p>
                    </div>

                    <div class="mt-7 flex flex-wrap gap-3">
                        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-12 items-center rounded-full bg-[#111827] px-6 text-sm font-black uppercase tracking-wide text-white hover:bg-[#D71920]"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
                        <a href="mailto:support@shopmivo.com" class="inline-flex min-h-12 items-center rounded-full border border-[#111827] bg-white px-6 text-sm font-black text-[#111827] hover:border-[#D71920] hover:text-[#D71920]">support@shopmivo.com</a>
                    </div>
                </section>

                <section id="exchanges" class="rounded-xl border border-[#E5E7EB] bg-white p-8 shadow-card md:p-10">
                    <h2 class="font-heading text-3xl font-black uppercase text-[#111827]"><?php esc_html_e('Exchanges', 'dawp'); ?></h2>
                    <p class="mt-5 leading-8 text-[#6B7280]"><?php esc_html_e('We do not process direct one-for-one product exchanges. To get a different size, color, or item, please follow the return process above to send back your original purchase for a refund, and place a new order on our website simultaneously. This ensures your desired item does not sell out.', 'dawp'); ?></p>
                </section>

                <section id="refund-process" class="rounded-xl border border-[#E5E7EB] bg-white p-8 shadow-card md:p-10">
                    <h2 class="font-heading text-3xl font-black uppercase text-[#111827]"><?php esc_html_e('Refund Process & Timing', 'dawp'); ?></h2>
                    <ul class="mt-6 space-y-4 leading-8 text-[#6B7280]">
                        <li class="rounded-lg bg-[#F7F8FA] p-5"><?php esc_html_e('Inspection: Once your return package is received at our warehouse, we will inspect the item within 1-2 business days to ensure it meets our return criteria.', 'dawp'); ?></li>
                        <li class="rounded-lg bg-[#F7F8FA] p-5"><?php esc_html_e('Approval & Timing: If approved, your refund will be processed automatically back to your original payment method within 7 business days.', 'dawp'); ?></li>
                        <li class="rounded-lg bg-[#F7F8FA] p-5"><?php esc_html_e('Refund Method: All refunds will be issued solely to your original method of payment within 7 business days of inspection. We do not offer store credit or gift cards as a refund method for returns.', 'dawp'); ?></li>
                        <li class="rounded-lg bg-[#F7F8FA] p-5"><?php esc_html_e('Issues with Returns: If a return is approved but is found to be missing accessories, tags, boxes, or manuals, or shows signs of use, wear, or damage, we reserve the right to refuse the refund and will offer to ship the item back to you at your expense.', 'dawp'); ?></li>
                        <li class="rounded-lg bg-[#F7F8FA] p-5"><?php esc_html_e('Delayed Refunds: If you have not received your refund after 15 business days of approval, please check with your bank or credit card company first, then contact us.', 'dawp'); ?></li>
                    </ul>
                    <p class="mt-7"><a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-12 items-center rounded-full border border-[#111827] bg-white px-6 text-sm font-black text-[#111827] hover:border-[#D71920] hover:text-[#D71920]"><?php esc_html_e('Contact Support', 'dawp'); ?></a></p>
                </section>

                <section id="non-returnable-items" class="rounded-xl border border-[#E5E7EB] bg-white p-8 shadow-card md:p-10">
                    <h2 class="font-heading text-3xl font-black uppercase text-[#111827]"><?php esc_html_e('Non-Returnable Items', 'dawp'); ?></h2>
                    <p class="mt-5 leading-8 text-[#6B7280]"><?php esc_html_e('The following items are strictly non-returnable and final sale:', 'dawp'); ?></p>
                    <ul class="mt-6 space-y-4 leading-8 text-[#6B7280]">
                        <li class="rounded-lg bg-[#F7F8FA] p-5"><?php esc_html_e('Items explicitly marked as "Final Sale" or "Non-Returnable" on the product page.', 'dawp'); ?></li>
                        <li class="rounded-lg bg-[#F7F8FA] p-5"><?php esc_html_e('Gift cards or digital products/downloads.', 'dawp'); ?></li>
                        <li class="rounded-lg bg-[#F7F8FA] p-5"><?php esc_html_e('Personalized, custom-made, or modified special-order items.', 'dawp'); ?></li>
                        <li class="rounded-lg bg-[#F7F8FA] p-5"><?php esc_html_e('Opened or used hygiene-sensitive items, including apparel or accessories where the product seal has been broken.', 'dawp'); ?></li>
                        <li class="rounded-lg bg-[#F7F8FA] p-5"><?php esc_html_e('Items that have been used, washed, altered, or damaged after delivery.', 'dawp'); ?></li>
                    </ul>
                </section>

                <section id="contact-information" class="rounded-xl border border-dashed border-[#D71920]/35 bg-white p-8 shadow-card md:p-10">
                    <h2 class="font-heading text-3xl font-black uppercase text-[#111827]"><?php esc_html_e('Contact Information', 'dawp'); ?></h2>
                    <dl class="mt-6 grid gap-4 md:grid-cols-2">
                        <div class="rounded-lg border border-[#E5E7EB] bg-[#F7F8FA] p-5">
                            <dt class="mb-2 text-xs font-black uppercase tracking-widest text-[#D71920]"><?php esc_html_e('Store Name', 'dawp'); ?></dt>
                            <dd class="font-bold text-[#111827]">Shopmivo</dd>
                        </div>
                        <div class="rounded-lg border border-[#E5E7EB] bg-[#F7F8FA] p-5">
                            <dt class="mb-2 text-xs font-black uppercase tracking-widest text-[#D71920]"><?php esc_html_e('Address', 'dawp'); ?></dt>
                            <dd class="font-bold text-[#111827]">1777 Canal St, Merced, CA 95340, United States</dd>
                        </div>
                        <div class="rounded-lg border border-[#E5E7EB] bg-[#F7F8FA] p-5">
                            <dt class="mb-2 text-xs font-black uppercase tracking-widest text-[#D71920]"><?php esc_html_e('Email', 'dawp'); ?></dt>
                            <dd><a href="mailto:support@shopmivo.com" class="font-bold text-[#111827] hover:text-[#D71920]">support@shopmivo.com</a></dd>
                        </div>
                        <div class="rounded-lg border border-[#E5E7EB] bg-[#F7F8FA] p-5">
                            <dt class="mb-2 text-xs font-black uppercase tracking-widest text-[#D71920]"><?php esc_html_e('Contact Support', 'dawp'); ?></dt>
                            <dd><a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="font-bold text-[#111827] hover:text-[#D71920]"><?php esc_html_e('Contact Us page', 'dawp'); ?></a></dd>
                        </div>
                        <div class="rounded-lg border border-[#E5E7EB] bg-[#F7F8FA] p-5">
                            <dt class="mb-2 text-xs font-black uppercase tracking-widest text-[#D71920]"><?php esc_html_e('Customer Service Hours', 'dawp'); ?></dt>
                            <dd class="font-bold text-[#111827]">Monday-Friday, 9:00 AM-5:00 PM PST (Los Angeles)</dd>
                        </div>
                        <div class="rounded-lg border border-[#E5E7EB] bg-[#F7F8FA] p-5">
                            <dt class="mb-2 text-xs font-black uppercase tracking-widest text-[#D71920]"><?php esc_html_e('Response Time', 'dawp'); ?></dt>
                            <dd class="font-bold text-[#111827]"><?php esc_html_e('We aim to reply within 1 business day. Response times may vary on weekends, holidays, or high-volume periods.', 'dawp'); ?></dd>
                        </div>
                    </dl>
                </section>
        </div>
    </div>
</section>
