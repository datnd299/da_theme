<?php
/**
 * Template Part: page-return-refund-policy
 *
 * @package dawp
 */

$store_name             = 'House of Shoes Online';
$support_email          = 'support@houseofshoesonline.com';
$address                = dawp_get_store_address();
$contact_url            = 'https://houseofshoesonline.com/contact-us/';
$customer_service_hours = 'Monday-Friday, 9:00 AM-6:00 PM PST.';
?>

<main id="primary" class="bg-[#F6F5F7] font-body text-[#141217]">

    <section class="relative overflow-hidden bg-[#FFF7FB] text-[#141217]">
        <div class="absolute left-0 top-0 h-1 w-full bg-[linear-gradient(90deg,#E6007E,#FF4FB8,#7C3AED)]"></div>

        <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
            <div class="max-w-4xl">
                <p class="mb-5 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]">
                    <?php esc_html_e('Customer Care', 'dawp'); ?>
                </p>

                <h1 class="font-heading text-5xl font-black leading-[0.94] text-[#141217] sm:text-6xl lg:text-7xl">
                    <?php esc_html_e('Return & Refund Policy', 'dawp'); ?>
                </h1>

                <p class="mt-6 max-w-3xl text-lg leading-8 text-[#5E5363]">
                    <?php esc_html_e('Return eligibility, shipping fees, refund timing, exchanges, and customer support details for House of Shoes Online footwear orders.', 'dawp'); ?>
                </p>

                <p class="mt-5 text-sm font-black uppercase tracking-[0.18em] text-[#7C3AED]">
                    <?php esc_html_e('Last updated: 20 May, 2026', 'dawp'); ?>
                </p>
            </div>
        </div>
    </section>

    <section class="py-12 lg:py-16">
        <div class="mx-auto max-w-6xl space-y-5 px-4 sm:px-6 lg:px-8">

            <section id="return-eligibility" class="rounded-[1.5rem] border border-[#EEE5EF] bg-white p-7 shadow-sm shadow-[#141217]/5 lg:p-10">
                <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]">
                    <?php esc_html_e('Return Eligibility', 'dawp'); ?>
                </h2>

                <p class="mt-4 text-base leading-8 text-[#5E5363]">
                    <?php esc_html_e('To be eligible for a return, your item must meet the following criteria:', 'dawp'); ?>
                </p>

                <ul class="mt-5 space-y-4 text-base leading-7 text-[#5E5363]">
                    <li class="flex gap-4"><span class="mt-3 h-1.5 w-1.5 shrink-0 rounded-full bg-[#5E5363]"></span><?php esc_html_e('Return Window: You must initiate your return request within 30 days of delivery.', 'dawp'); ?></li>
                    <li class="flex gap-4"><span class="mt-3 h-1.5 w-1.5 shrink-0 rounded-full bg-[#5E5363]"></span><?php esc_html_e('Condition: Footwear must be unworn, unused, undamaged, clean, and in its original, unaltered condition.', 'dawp'); ?></li>
                    <li class="flex gap-4"><span class="mt-3 h-1.5 w-1.5 shrink-0 rounded-full bg-[#5E5363]"></span><?php esc_html_e('Packaging: Items must be returned with all original packaging, tags, labels, care cards, shoe boxes, dust bags, inserts, and any included accessories.', 'dawp'); ?></li>
                    <li class="flex gap-4"><span class="mt-3 h-1.5 w-1.5 shrink-0 rounded-full bg-[#5E5363]"></span><?php esc_html_e('Restocking Fee: Free. We do not charge any restocking fees for eligible returns.', 'dawp'); ?></li>
                </ul>
            </section>

            <section id="return-shipping-fees" class="rounded-[1.5rem] border border-[#EEE5EF] bg-[#FFF9FC] p-7 shadow-sm shadow-[#141217]/5 lg:p-10">
                <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]">
                    <?php esc_html_e('Return Shipping Fees', 'dawp'); ?>
                </h2>

                <div class="mt-6 grid grid-cols-1 gap-4 lg:grid-cols-2">
                    <div class="rounded-[1rem] border border-[#EEE5EF] bg-white p-5 sm:p-6">
                        <h3 class="text-xl font-medium leading-7 text-[#141217]">
                            <?php esc_html_e('Defective, Damaged, or Incorrect Products (Wrong item, carrier damage, or defective):', 'dawp'); ?>
                        </h3>
                        <p class="mt-4 text-base leading-8 text-[#5E5363]">
                            <?php esc_html_e('No cost to customer. We cover 100% of the return shipping costs. We will provide a downloadable and printable prepaid shipping label via email.', 'dawp'); ?>
                        </p>
                    </div>

                    <div class="rounded-[1rem] border border-[#EEE5EF] bg-white p-5 sm:p-6">
                        <h3 class="text-xl font-medium leading-7 text-[#141217]">
                            <?php esc_html_e('Customer Remorse (Ordered wrong item/size/color, changed mind, or does not fit):', 'dawp'); ?>
                        </h3>
                        <p class="mt-4 text-base leading-8 text-[#5E5363]">
                            <?php esc_html_e('The customer is responsible for the return shipping cost. The actual return shipping cost of the provided prepaid label (sent via email) will be deducted from your final refund amount.', 'dawp'); ?>
                        </p>
                    </div>
                </div>
            </section>

            <section id="common-delivery-issues" class="rounded-[1.5rem] border border-[#EEE5EF] bg-white p-7 shadow-sm shadow-[#141217]/5 lg:p-10">
                <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]">
                    <?php esc_html_e('Common Delivery Issues', 'dawp'); ?>
                </h2>

                <div class="mt-6 space-y-6 text-base leading-8 text-[#5E5363]">
                    <div>
                        <h3 class="text-xl font-medium text-[#141217]"><?php esc_html_e('Damaged on Arrival', 'dawp'); ?></h3>
                        <p class="mt-3"><?php esc_html_e('If your order arrives damaged, please contact us within 30 days of delivery with photos of the item and the shipping packaging, including the shipping label. We will arrange a replacement or full refund at no cost to you.', 'dawp'); ?></p>
                    </div>

                    <div>
                        <h3 class="text-xl font-medium text-[#141217]"><?php esc_html_e('Lost Packages / Never Arrived', 'dawp'); ?></h3>
                        <p class="mt-3"><?php esc_html_e('If your tracking status shows no updates for an extended period, or is marked "Delivered" but you did not receive it, please contact us within 30 days of the recorded delivery date. We will investigate with the carrier and arrange a replacement or refund if the package is confirmed lost.', 'dawp'); ?></p>
                    </div>
                </div>
            </section>

            <section id="how-to-return" class="rounded-[1.5rem] border border-[#EEE5EF] bg-[#FFF9FC] p-7 shadow-sm shadow-[#141217]/5 lg:p-10">
                <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]">
                    <?php esc_html_e('How to Return an Item', 'dawp'); ?>
                </h2>

                <p class="mt-4 text-base leading-8 text-[#5E5363]">
                    <?php esc_html_e('Please follow our official 3-step process. Do not ship any item back without prior authorization, as unauthorized returns cannot be tracked or processed at our warehouse.', 'dawp'); ?>
                </p>

                <div class="mt-6 space-y-4">
                    <div class="rounded-[1rem] border border-[#EEE5EF] bg-white p-5 sm:p-6">
                        <div class="flex gap-4">
                            <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#2A1538] text-sm font-black text-white">1</span>
                            <div>
                                <h3 class="text-xl font-medium text-[#141217]"><?php esc_html_e('Submit Your Return Request', 'dawp'); ?></h3>
                                <p class="mt-3 text-base leading-8 text-[#5E5363]">
                                    <?php esc_html_e('Email us or use our Contact Page within 30 days of delivery. Please provide your order number, the email used at checkout, the specific item(s) you wish to return, and the reason for the return with photos or videos if damaged.', 'dawp'); ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-[1rem] border border-[#EEE5EF] bg-white p-5 sm:p-6">
                        <div class="flex gap-4">
                            <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#2A1538] text-sm font-black text-white">2</span>
                            <div>
                                <h3 class="text-xl font-medium text-[#141217]"><?php esc_html_e('Receive Approval & Pack Your Item', 'dawp'); ?></h3>
                                <div class="mt-3 space-y-4 text-base leading-8 text-[#5E5363]">
                                    <p><?php esc_html_e('Our support team will review your request within 1-2 business days. Once approved, we will email you a Return Merchandise Authorization (RMA) number along with a prepaid shipping label.', 'dawp'); ?></p>
                                    <p><?php esc_html_e('Repack the item securely in its original packaging with all included accessories, tags, inserts, and boxes. Place it inside a sturdy outer shipping box.', 'dawp'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-[1rem] border border-[#EEE5EF] bg-white p-5 sm:p-6">
                        <div class="flex gap-4">
                            <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#2A1538] text-sm font-black text-white">3</span>
                            <div>
                                <h3 class="text-xl font-medium text-[#141217]"><?php esc_html_e('Ship It Back to Our Returns Center', 'dawp'); ?></h3>
                                <p class="mt-3 text-base leading-8 text-[#5E5363]">
                                    <?php esc_html_e('Print the prepaid shipping label, attach it to the outside of your shipping box, and drop it off at the designated carrier location.', 'dawp'); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-5 rounded-[1rem] border border-[#F4C96B] bg-[#FFF7E8] p-5">
                    <p class="font-black text-[#141217]"><?php echo esc_html($store_name); ?> <?php esc_html_e('- Returns Department', 'dawp'); ?></p>
                    <p class="mt-2 text-base leading-7 text-[#141217]"><?php echo esc_html($address); ?></p>
                </div>

                <div class="mt-7 flex flex-wrap gap-4">
                    <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#2A1538] px-7 text-sm font-black text-white transition hover:bg-[#E6007E]">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>

                    <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 max-w-full items-center justify-center rounded-full border border-[#141217] px-7 text-center text-sm font-black text-[#141217] transition hover:bg-[#141217] hover:text-white max-[420px]:break-all">
                        <?php echo esc_html($support_email); ?>
                    </a>
                </div>
            </section>

            <section id="exchanges" class="rounded-[1.5rem] border border-[#EEE5EF] bg-white p-7 shadow-sm shadow-[#141217]/5 lg:p-10">
                <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]">
                    <?php esc_html_e('Exchanges', 'dawp'); ?>
                </h2>

                <p class="mt-4 text-base leading-8 text-[#5E5363]">
                    <?php esc_html_e('We do not process direct one-for-one product exchanges. To get a different size, color, or model, please follow the return process above to send back your original purchase for a refund, and place a new order on our website simultaneously. This ensures your desired item does not sell out.', 'dawp'); ?>
                </p>
            </section>

            <section id="refund-process" class="rounded-[1.5rem] border border-[#EEE5EF] bg-[#FFF9FC] p-7 shadow-sm shadow-[#141217]/5 lg:p-10">
                <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]">
                    <?php esc_html_e('Refund Process & Timing', 'dawp'); ?>
                </h2>

                <ul class="mt-5 space-y-4 text-base leading-7 text-[#5E5363]">
                    <li class="flex gap-4"><span class="mt-3 h-1.5 w-1.5 shrink-0 rounded-full bg-[#5E5363]"></span><?php esc_html_e('Inspection: Once your return package is received at our warehouse, we will inspect the item within 1-2 business days to ensure it meets our return criteria.', 'dawp'); ?></li>
                    <li class="flex gap-4"><span class="mt-3 h-1.5 w-1.5 shrink-0 rounded-full bg-[#5E5363]"></span><?php esc_html_e('Approval & Timing: If approved, your refund will be processed automatically back to your original payment method within 7 business days.', 'dawp'); ?></li>
                    <li class="flex gap-4"><span class="mt-3 h-1.5 w-1.5 shrink-0 rounded-full bg-[#5E5363]"></span><?php esc_html_e('Refund Method: All refunds will be issued solely to your original method of payment within 7 business days of inspection. We do not offer store credit or gift cards as a refund method for returns.', 'dawp'); ?></li>
                    <li class="flex gap-4"><span class="mt-3 h-1.5 w-1.5 shrink-0 rounded-full bg-[#5E5363]"></span><?php esc_html_e('Issues with Returns: If a return is approved but is found to be missing accessories, tags, boxes, or shows signs of wear, we reserve the right to refuse the refund and will offer to ship the item back to you at your expense.', 'dawp'); ?></li>
                    <li class="flex gap-4"><span class="mt-3 h-1.5 w-1.5 shrink-0 rounded-full bg-[#5E5363]"></span><?php esc_html_e('Delayed Refunds: If you have not received your refund after 15 business days of approval, please check with your bank or credit card company first, then contact us.', 'dawp'); ?></li>
                </ul>

                <div class="mt-7">
                    <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 max-w-full items-center justify-center rounded-full border border-[#141217] px-7 text-center text-sm font-black text-[#141217] transition hover:bg-[#141217] hover:text-white max-[420px]:break-all">
                        <?php esc_html_e('Email Support', 'dawp'); ?>
                    </a>
                </div>
            </section>

            <section id="non-returnable-items" class="rounded-[1.5rem] border border-[#EEE5EF] bg-white p-7 shadow-sm shadow-[#141217]/5 lg:p-10">
                <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]">
                    <?php esc_html_e('Non-Returnable Items', 'dawp'); ?>
                </h2>

                <p class="mt-4 text-base leading-8 text-[#5E5363]">
                    <?php esc_html_e('The following items are strictly non-returnable and final sale:', 'dawp'); ?>
                </p>

                <ul class="mt-5 space-y-4 text-base leading-7 text-[#5E5363]">
                    <li class="flex gap-4"><span class="mt-3 h-1.5 w-1.5 shrink-0 rounded-full bg-[#5E5363]"></span><?php esc_html_e('Items explicitly marked as "Final Sale" or "Non-Returnable" on the product page.', 'dawp'); ?></li>
                    <li class="flex gap-4"><span class="mt-3 h-1.5 w-1.5 shrink-0 rounded-full bg-[#5E5363]"></span><?php esc_html_e('Gift cards or digital products/downloads.', 'dawp'); ?></li>
                    <li class="flex gap-4"><span class="mt-3 h-1.5 w-1.5 shrink-0 rounded-full bg-[#5E5363]"></span><?php esc_html_e('Personalized, resized, altered, or custom-made items.', 'dawp'); ?></li>
                    <li class="flex gap-4"><span class="mt-3 h-1.5 w-1.5 shrink-0 rounded-full bg-[#5E5363]"></span><?php esc_html_e('Socks, insoles, shoe care products, or hygiene-sensitive items where the product seal has been broken.', 'dawp'); ?></li>
                    <li class="flex gap-4"><span class="mt-3 h-1.5 w-1.5 shrink-0 rounded-full bg-[#5E5363]"></span><?php esc_html_e('Items that have been worn, washed, altered, creased, scuffed, stained, or damaged after delivery.', 'dawp'); ?></li>
                </ul>
            </section>

            <section id="contact-information" class="rounded-[1.5rem] border border-[#EEE5EF] bg-[#FFF9FC] p-7 shadow-sm shadow-[#141217]/5 lg:p-10">
                <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]">
                    <?php esc_html_e('Contact Information', 'dawp'); ?>
                </h2>

                <div class="mt-7 rounded-[1.5rem] border border-[#EEE5EF] bg-white p-5 sm:p-6">
                    <div class="grid min-w-0 grid-cols-1 gap-4 lg:grid-cols-2">
                        <div class="min-w-0 rounded-[1rem] border border-[#EEE5EF] bg-white p-5">
                            <h3 class="font-black text-[#141217]"><?php esc_html_e('Store Name', 'dawp'); ?></h3>
                            <p class="mt-3 text-base leading-7 text-[#5E5363]"><?php echo esc_html($store_name); ?></p>
                        </div>

                        <div class="min-w-0 rounded-[1rem] border border-[#EEE5EF] bg-white p-5">
                            <h3 class="font-black text-[#141217]"><?php esc_html_e('Address', 'dawp'); ?></h3>
                            <p class="mt-3 text-base leading-7 text-[#5E5363]"><?php echo esc_html($address); ?></p>
                        </div>

                        <div class="min-w-0 rounded-[1rem] border border-[#EEE5EF] bg-white p-5">
                            <h3 class="font-black text-[#141217]"><?php esc_html_e('Email', 'dawp'); ?></h3>
                            <p class="mt-3 break-all text-base leading-7 text-[#5E5363]">
                                <a href="mailto:<?php echo esc_attr($support_email); ?>" class="transition hover:text-[#E6007E]"><?php echo esc_html($support_email); ?></a>
                            </p>
                        </div>

                        <div class="min-w-0 rounded-[1rem] border border-[#EEE5EF] bg-white p-5">
                            <h3 class="font-black text-[#141217]"><?php esc_html_e('Contact Support', 'dawp'); ?></h3>
                            <p class="mt-3 text-base leading-7 text-[#5E5363]">
                                <a href="<?php echo esc_url($contact_url); ?>" class="transition hover:text-[#E6007E]"><?php esc_html_e('Contact Us page', 'dawp'); ?></a>
                            </p>
                        </div>

                        <div class="min-w-0 rounded-[1rem] border border-[#EEE5EF] bg-white p-5">
                            <h3 class="font-black text-[#141217]"><?php esc_html_e('Customer Service Hours', 'dawp'); ?></h3>
                            <p class="mt-3 text-base leading-7 text-[#5E5363]"><?php echo esc_html($customer_service_hours); ?></p>
                        </div>

                        <div class="min-w-0 rounded-[1rem] border border-[#EEE5EF] bg-white p-5">
                            <h3 class="font-black text-[#141217]"><?php esc_html_e('Response Time', 'dawp'); ?></h3>
                            <p class="mt-3 text-base leading-7 text-[#5E5363]"><?php esc_html_e('We aim to reply within 1 business day. Response times may vary on weekends, holidays, or high-volume periods.', 'dawp'); ?></p>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </section>

</main>
