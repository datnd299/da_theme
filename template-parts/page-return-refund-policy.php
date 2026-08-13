<?php
/**
 * Template Part: page-return-refund-policy
 */
?>

<div id="primary" class="bg-[#FBFCFA] font-body text-[#2D2633]">
    <section class="bg-[#F6F7F9] py-14 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
            <p class="text-sm font-black uppercase tracking-[0.18em] text-[#6B6470]">
                <?php esc_html_e('Crestovia Policy', 'dawp'); ?>
            </p>
            <h1 class="mt-3 font-heading text-4xl font-black leading-tight text-[#2D2633] lg:text-6xl">
                <?php esc_html_e('Return & Refund Policy', 'dawp'); ?>
            </h1>
            <p class="mx-auto mt-4 max-w-3xl text-lg leading-8 text-[#6B6470]">
                <?php esc_html_e('Return eligibility, shipping fees, refund timing, exchanges, and support details for Crestovia orders.', 'dawp'); ?>
            </p>
            <p class="mt-3 text-sm font-semibold uppercase tracking-wide text-[#6B6470]">
                <?php esc_html_e('Last Updated: June 11, 2026', 'dawp'); ?>
            </p>
        </div>
    </section>

    <section class="py-12 lg:py-16">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <div>
                <article class="rounded-lg border border-[#E5E7EB] bg-white p-6 shadow-sm sm:p-8 lg:p-10">
                    <div class="max-w-none text-base leading-8 text-[#6B6470]
                        [&_h2]:scroll-mt-24 [&_h2]:mt-10 [&_h2]:border-t [&_h2]:border-[#E8E6EB] [&_h2]:pt-8 [&_h2]:font-heading [&_h2]:text-2xl [&_h2]:font-black [&_h2]:leading-tight [&_h2]:text-[#2D2633] md:[&_h2]:text-3xl
                        [&_h3]:mt-7 [&_h3]:font-heading [&_h3]:text-xl [&_h3]:font-bold [&_h3]:leading-snug [&_h3]:text-[#2D2633]
                        [&_li]:leading-7 [&_li]:pl-1 [&_p]:mb-5 [&_strong]:font-bold [&_strong]:text-[#2D2633] [&_ul]:mb-8 [&_ul]:mt-4 [&_ul]:list-disc [&_ul]:space-y-3 [&_ul]:pl-6">
                        <p class="rounded-lg border border-[#F7E4A3] bg-[#FFF9E6] p-4 font-medium text-[#2D2633]">
                            <?php esc_html_e('Please contact us before sending any item back. Unauthorized returns cannot be tracked or processed at our warehouse.', 'dawp'); ?>
                        </p>

                        <h2 id="return-eligibility"><?php esc_html_e('Return Eligibility', 'dawp'); ?></h2>
                        <p><?php esc_html_e('To be eligible for a return, your item must meet the following criteria:', 'dawp'); ?></p>
                        <ul>
                            <li><strong><?php esc_html_e('Return Window:', 'dawp'); ?></strong> <?php esc_html_e('You must initiate your return request within 30 days of delivery.', 'dawp'); ?></li>
                            <li><strong><?php esc_html_e('Condition:', 'dawp'); ?></strong> <?php esc_html_e('Items must be unworn, unused, undamaged, and in their original, unaltered condition.', 'dawp'); ?></li>
                            <li><strong><?php esc_html_e('Packaging:', 'dawp'); ?></strong> <?php esc_html_e('Items must be returned with all original packaging, tags, labels, certificates, care cards, pouches, boxes, and any included accessories.', 'dawp'); ?></li>
                            <li><strong><?php esc_html_e('Restocking Fee:', 'dawp'); ?></strong> <?php esc_html_e('Free. We do not charge any restocking fees for eligible returns.', 'dawp'); ?></li>
                        </ul>

                        <h2 id="return-shipping-fees"><?php esc_html_e('Return Shipping Fees', 'dawp'); ?></h2>
                        <div class="not-prose grid gap-4 md:grid-cols-2">
                            <div class="rounded-lg border border-[#D7E9DF] bg-[#F1FAF5] p-5">
                                <p class="text-sm font-black uppercase tracking-wide text-[#587365]"><?php esc_html_e('Covered by Us', 'dawp'); ?></p>
                                <h3 class="mt-3 font-heading text-xl font-bold leading-snug text-[#2D2633]"><?php esc_html_e('Defective, Damaged, or Incorrect Products', 'dawp'); ?></h3>
                                <p class="mt-3 leading-8 text-[#6B6470]"><?php esc_html_e('No cost to customer. We cover 100% of the return shipping costs. We will provide a downloadable and printable prepaid shipping label via email.', 'dawp'); ?></p>
                            </div>
                            <div class="rounded-lg border border-[#F7D8D5] bg-[#FFF5F4] p-5">
                                <p class="text-sm font-black uppercase tracking-wide text-[#8A5C58]"><?php esc_html_e('Deducted From Refund', 'dawp'); ?></p>
                                <h3 class="mt-3 font-heading text-xl font-bold leading-snug text-[#2D2633]"><?php esc_html_e('Customer Remorse', 'dawp'); ?></h3>
                                <p class="mt-3 leading-8 text-[#6B6470]"><?php esc_html_e('For wrong item, size, color, changed mind, or fit issues, the actual return shipping cost of the provided prepaid label will be deducted from your final refund amount.', 'dawp'); ?></p>
                            </div>
                        </div>

                        <h2><?php esc_html_e('Common Delivery Issues', 'dawp'); ?></h2>
                        <h3><?php esc_html_e('Damaged on Arrival', 'dawp'); ?></h3>
                        <p><?php esc_html_e('If your order arrives damaged, please contact us within 30 days of delivery with photos of the item and the shipping packaging, including the shipping label. We will arrange a replacement or full refund at no cost to you.', 'dawp'); ?></p>
                        <h3><?php esc_html_e('Lost Packages / Never Arrived', 'dawp'); ?></h3>
                        <p><?php esc_html_e('If your tracking status shows no updates for an extended period, or is marked "Delivered" but you did not receive it, please contact us within 30 days of the recorded delivery date. We will investigate with the carrier and arrange a replacement or refund if the package is confirmed lost.', 'dawp'); ?></p>

                        <h2 id="return-process"><?php esc_html_e('How to Return an Item', 'dawp'); ?></h2>
                        <p><?php esc_html_e('Please follow our official 3-step process. Do not ship any item back without prior authorization, as unauthorized returns cannot be tracked or processed at our warehouse.', 'dawp'); ?></p>
                        <div class="not-prose mt-6 space-y-4">
                            <div class="rounded-lg border border-[#E5E7EB] bg-[#FBFCFA] p-5">
                                <div class="flex gap-4">
                                    <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#2D2633] text-sm font-black text-white">1</span>
                                    <div>
                                        <h3 class="font-heading text-xl font-bold text-[#2D2633]"><?php esc_html_e('Submit Your Return Request', 'dawp'); ?></h3>
                                        <p class="mt-2 leading-8 text-[#6B6470]"><?php esc_html_e('Email us or use our Contact Page within 30 days of delivery. Please provide your order number, the email used at checkout, the specific item(s) you wish to return, and the reason for the return with photos or videos if damaged.', 'dawp'); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="rounded-lg border border-[#E5E7EB] bg-[#FBFCFA] p-5">
                                <div class="flex gap-4">
                                    <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#2D2633] text-sm font-black text-white">2</span>
                                    <div>
                                        <h3 class="font-heading text-xl font-bold text-[#2D2633]"><?php esc_html_e('Receive Approval & Pack Your Item', 'dawp'); ?></h3>
                                        <p class="mt-2 leading-8 text-[#6B6470]"><?php esc_html_e('Our support team will review your request within 1-2 business days. Once approved, we will email you a Return Merchandise Authorization (RMA) number along with a prepaid shipping label.', 'dawp'); ?></p>
                                        <p class="mt-3 leading-8 text-[#6B6470]"><?php esc_html_e('Repack the item securely in its original packaging with all included accessories, tags, and boxes. Place it inside a sturdy outer shipping box.', 'dawp'); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="rounded-lg border border-[#E5E7EB] bg-[#FBFCFA] p-5">
                                <div class="flex gap-4">
                                    <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#2D2633] text-sm font-black text-white">3</span>
                                    <div>
                                        <h3 class="font-heading text-xl font-bold text-[#2D2633]"><?php esc_html_e('Ship It Back to Our Returns Center', 'dawp'); ?></h3>
                                        <p class="mt-2 leading-8 text-[#6B6470]"><?php esc_html_e('Print the prepaid shipping label, attach it to the outside of your shipping box, and drop it off at the designated carrier location.', 'dawp'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="not-prose mt-6 rounded-lg border border-[#F7E4A3] bg-[#FFF9E6] p-5 text-[#2D2633]">
                            <p class="font-bold"><?php esc_html_e('Crestovia - Returns Department', 'dawp'); ?></p>
                            <p class="mt-2 text-[#6B6470]"><?php dawp_store_address(); ?></p>
                        </div>

                        <h2><?php esc_html_e('Exchanges', 'dawp'); ?></h2>
                        <p><?php esc_html_e('We do not process direct one-for-one product exchanges. To get a different size, color, or model, please follow the return process above to send back your original purchase for a refund, and place a new order on our website simultaneously. This ensures your desired item does not sell out.', 'dawp'); ?></p>

                        <h2 id="refund-process"><?php esc_html_e('Refund Process & Timing', 'dawp'); ?></h2>
                        <ul>
                            <li><strong><?php esc_html_e('Inspection:', 'dawp'); ?></strong> <?php esc_html_e('Once your return package is received at our warehouse, we will inspect the item within 1-2 business days to ensure it meets our return criteria.', 'dawp'); ?></li>
                            <li><strong><?php esc_html_e('Approval & Timing:', 'dawp'); ?></strong> <?php esc_html_e('If approved, your refund will be processed automatically back to your original payment method within 7 business days.', 'dawp'); ?></li>
                            <li><strong><?php esc_html_e('Refund Method:', 'dawp'); ?></strong> <?php esc_html_e('All refunds will be issued solely to your original method of payment within 7 business days of inspection. We do not offer store credit or gift cards as a refund method for returns.', 'dawp'); ?></li>
                            <li><strong><?php esc_html_e('Issues with Returns:', 'dawp'); ?></strong> <?php esc_html_e('If a return is approved but is found to be missing accessories, tags, boxes, or shows signs of wear, we reserve the right to refuse the refund and will offer to ship the item back to you at your expense.', 'dawp'); ?></li>
                            <li><strong><?php esc_html_e('Delayed Refunds:', 'dawp'); ?></strong> <?php esc_html_e('If you have not received your refund after 15 business days of approval, please check with your bank or credit card company first, then contact us.', 'dawp'); ?></li>
                        </ul>

                        <h2><?php esc_html_e('Non-Returnable Items', 'dawp'); ?></h2>
                        <p><?php esc_html_e('The following items are strictly non-returnable and final sale:', 'dawp'); ?></p>
                        <ul>
                            <li><?php esc_html_e('Items explicitly marked as "Final Sale" or "Non-Returnable" on the product page.', 'dawp'); ?></li>
                            <li><?php esc_html_e('Gift cards or digital products/downloads.', 'dawp'); ?></li>
                            <li><?php esc_html_e('Personalized, engraved, resized, or custom-made items.', 'dawp'); ?></li>
                            <li><?php esc_html_e('Opened, used, or unsealed hygiene-sensitive beauty, grooming, or personal care items such as makeup tools, brushes, applicators, hair accessories, or personal care tools where the product seal has been broken.', 'dawp'); ?></li>
                            <li><?php esc_html_e('Items that have been worn, washed, altered, or damaged after delivery.', 'dawp'); ?></li>
                        </ul>

                        <h2 id="return-contact"><?php esc_html_e('Contact Information', 'dawp'); ?></h2>
                        <p><?php esc_html_e('For return questions, refund status checks, or delivery issue support, please contact Crestovia through our verified channels:', 'dawp'); ?></p>
                        <div class="not-prose mt-6 rounded-lg border border-[#E5E7EB] bg-[#FBFCFA] p-4">
                            <div class="grid gap-4 md:grid-cols-2">
                                <div class="rounded-lg border border-[#E5E7EB] bg-white p-5">
                                    <p class="text-sm font-black text-[#2D2633]"><?php esc_html_e('Store Name', 'dawp'); ?></p>
                                    <p class="mt-3 text-[#6B6470]"><?php esc_html_e('Crestovia', 'dawp'); ?></p>
                                </div>
                                <div class="rounded-lg border border-[#E5E7EB] bg-white p-5">
                                    <p class="text-sm font-black text-[#2D2633]"><?php esc_html_e('Customer Support Email', 'dawp'); ?></p>
                                    <p class="mt-3"><a class="font-semibold text-[#2D2633] underline decoration-[#DCD5FF] decoration-2 underline-offset-4 hover:text-[#F7C948]" href="mailto:support@crestovia.net">support@crestovia.net</a></p>
                                </div>
                                <div class="rounded-lg border border-[#E5E7EB] bg-white p-5">
                                    <p class="text-sm font-black text-[#2D2633]"><?php esc_html_e('Address', 'dawp'); ?></p>
                                    <p class="mt-3 text-[#6B6470]"><?php dawp_store_address(); ?></p>
                                </div>
                                <div class="rounded-lg border border-[#E5E7EB] bg-white p-5">
                                    <p class="text-sm font-black text-[#2D2633]"><?php esc_html_e('Customer Service Hours', 'dawp'); ?></p>
                                    <p class="mt-3 text-[#6B6470]"><?php esc_html_e('Monday-Friday, 9:00 AM-6:00 PM PST.', 'dawp'); ?></p>
                                </div>
                                <div class="rounded-lg border border-[#E5E7EB] bg-white p-5">
                                    <p class="text-sm font-black text-[#2D2633]"><?php esc_html_e('Response Time', 'dawp'); ?></p>
                                    <p class="mt-3 text-[#6B6470]"><?php esc_html_e('We aim to reply within 1 business day. Response times may vary on weekends, holidays, or high-volume periods.', 'dawp'); ?></p>
                                </div>
                                <div class="rounded-lg border border-[#E5E7EB] bg-white p-5">
                                    <p class="text-sm font-black text-[#2D2633]"><?php esc_html_e('Contact Page', 'dawp'); ?></p>
                                    <p class="mt-3"><a class="font-semibold text-[#2D2633] underline decoration-[#DCD5FF] decoration-2 underline-offset-4 hover:text-[#F7C948]" href="<?php echo esc_url(home_url('/contact/')); ?>"><?php esc_html_e('Contact Us', 'dawp'); ?></a></p>
                                </div>
                            </div>
                        </div>

                        <div class="not-prose mt-7 flex flex-wrap gap-3">
                            <a class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#2D2633] px-7 text-sm font-black text-white no-underline transition hover:bg-[#F7C948] hover:text-[#2D2633]" href="<?php echo esc_url(home_url('/contact/')); ?>"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
                            <a class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#2D2633] bg-white px-7 text-sm font-black text-[#2D2633] no-underline transition hover:bg-[#2D2633] hover:text-white" href="mailto:support@crestovia.net">support@crestovia.net</a>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>
</div>
