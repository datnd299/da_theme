<?php
/**
 * Template Part: page-return-refund-policy
 */

$support_email = 'support@scottosterbind.com';
$store_address = function_exists('dawp_get_woocommerce_store_address') ? dawp_get_woocommerce_store_address() : '';

$return_steps = [
    [
        'number' => '1',
        'title'  => __('Submit Your Return Request', 'dawp'),
        'copy'   => __('Email us or use our Contact Page within 30 days of delivery. Please provide your order number, the email used at checkout, the specific item(s) you wish to return, and the reason for the return with photos or videos if damaged.', 'dawp'),
    ],
    [
        'number' => '2',
        'title'  => __('Receive Approval & Pack Your Item', 'dawp'),
        'copy'   => __('Our support team will review your request within 1-2 business days. Once approved, we will email you a Return Merchandise Authorization (RMA) number along with return instructions or a prepaid shipping label when applicable.', 'dawp'),
        'extra'  => __('Repack the item securely in its original packaging with all included accessories, tags, product cards, care cards, pouches, boxes, and packaging materials. Place it inside a sturdy outer shipping box or protective mailer.', 'dawp'),
    ],
    [
        'number' => '3',
        'title'  => __('Ship It Back to Our Returns Center', 'dawp'),
        'copy'   => __('Print the prepaid shipping label if provided, attach it to the outside of your shipping box, and drop it off at the designated carrier location. If you are responsible for return shipping, use a trackable shipping service and keep the receipt until the return is fully resolved.', 'dawp'),
    ],
];

$contact_details = [
    [
        'label' => __('Store Name', 'dawp'),
        'value' => __('Scott Osterbind', 'dawp'),
    ],
    [
        'label' => __('Address', 'dawp'),
        'value' => $store_address !== '' ? $store_address : __('Provided with approved return instructions.', 'dawp'),
    ],
    [
        'label' => __('Email', 'dawp'),
        'value' => $support_email,
    ],
    [
        'label' => __('Contact Support', 'dawp'),
        'value' => __('Contact Us page', 'dawp'),
    ],
    [
        'label' => __('Customer Service Hours', 'dawp'),
        'value' => __('Monday-Friday, 9:00 AM-6:00 PM EST.', 'dawp'),
    ],
    [
        'label' => __('Response Time', 'dawp'),
        'value' => __('We aim to reply within 1 business day. Response times may vary on weekends, holidays, or high-volume periods.', 'dawp'),
    ],
];
?>

<div id="primary" class="bg-[#F8F1E7] font-body text-[#24211E]">
    <section class="bg-[#5A3825] py-14 text-white lg:py-20">
        <div class="mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
            <p class="text-sm font-black uppercase tracking-[0.18em] text-[#C8A45D]"><?php esc_html_e('Scott Osterbind Customer Care', 'dawp'); ?></p>
            <h1 class="mt-3 font-heading text-4xl font-black leading-tight lg:text-6xl">
                <?php esc_html_e('Return & Refund Policy', 'dawp'); ?>
            </h1>
            <p class="mx-auto mt-4 max-w-3xl text-lg leading-8 text-[#F8F1E7]">
                <?php esc_html_e('Return eligibility, return shipping fees, delivery issue support, exchanges, refund timing, non-returnable items, and contact information for Scott Osterbind orders.', 'dawp'); ?>
            </p>
            <p class="mt-3 text-sm font-semibold uppercase tracking-wide text-[#D8C3A5]">
                <?php esc_html_e('Last Updated: May 20, 2026', 'dawp'); ?>
            </p>
        </div>
    </section>

    <section class="py-12 lg:py-16">
        <div class="mx-auto max-w-6xl space-y-6 px-4 sm:px-6 lg:px-8">
            <article class="rounded-lg border border-[#D8C3A5] bg-white p-6 shadow-sm sm:p-8 lg:p-10">
                <h2 class="font-heading text-3xl font-black leading-tight text-[#5A3825] md:text-4xl"><?php esc_html_e('Return Eligibility', 'dawp'); ?></h2>
                <div class="mt-5 text-base leading-8 text-[#5E554D]">
                    <p><?php esc_html_e('To be eligible for a return, your item must meet the following criteria:', 'dawp'); ?></p>
                    <ul class="mt-5 list-disc space-y-3 pl-6">
                        <li><?php esc_html_e('Return Window: You must initiate your return request within 30 days of delivery.', 'dawp'); ?></li>
                        <li><?php esc_html_e('Condition: Items must be unworn, unused, undamaged, and in their original, unaltered condition.', 'dawp'); ?></li>
                        <li><?php esc_html_e('Packaging: Items must be returned with all original packaging, tags, labels, care cards, pouches, boxes, and any included accessories where applicable.', 'dawp'); ?></li>
                        <li><?php esc_html_e('Restocking Fee: Free. We do not charge any restocking fees for eligible returns.', 'dawp'); ?></li>
                    </ul>
                </div>
            </article>

            <article class="rounded-lg border border-[#D8C3A5] bg-white p-6 shadow-sm sm:p-8 lg:p-10">
                <h2 class="font-heading text-3xl font-black leading-tight text-[#5A3825] md:text-4xl"><?php esc_html_e('Return Shipping Fees', 'dawp'); ?></h2>
                <div class="mt-6 grid gap-4 md:grid-cols-2">
                    <div class="rounded-lg border border-[#D8C3A5] bg-white p-5">
                        <h3 class="text-lg font-bold leading-7 text-[#34243A]"><?php esc_html_e('Defective, Damaged, or Incorrect Products (Wrong item, carrier damage, or defective):', 'dawp'); ?></h3>
                        <p class="mt-4 leading-8 text-[#5E554D]"><?php esc_html_e('No cost to customer. We cover 100% of the return shipping costs. We will provide a downloadable and printable prepaid shipping label via email.', 'dawp'); ?></p>
                    </div>
                    <div class="rounded-lg border border-[#D8C3A5] bg-white p-5">
                        <h3 class="text-lg font-bold leading-7 text-[#34243A]"><?php esc_html_e('Customer Remorse (Ordered wrong item, size, material, color, changed mind, or does not fit):', 'dawp'); ?></h3>
                        <p class="mt-4 leading-8 text-[#5E554D]"><?php esc_html_e('The customer is responsible for the return shipping cost. The actual return shipping cost of the provided prepaid label, if sent via email, will be deducted from your final refund amount.', 'dawp'); ?></p>
                    </div>
                </div>
            </article>

            <article class="rounded-lg border border-[#D8C3A5] bg-white p-6 shadow-sm sm:p-8 lg:p-10">
                <h2 class="font-heading text-3xl font-black leading-tight text-[#5A3825] md:text-4xl"><?php esc_html_e('Common Delivery Issues', 'dawp'); ?></h2>
                <div class="mt-6 space-y-7 text-base leading-8 text-[#5E554D]">
                    <div>
                        <h3 class="text-lg font-bold text-[#34243A]"><?php esc_html_e('Damaged on Arrival', 'dawp'); ?></h3>
                        <p class="mt-3"><?php esc_html_e('If your order arrives damaged, please contact us within 30 days of delivery with photos of the item and the shipping packaging, including the shipping label. We will arrange a replacement or full refund at no cost to you.', 'dawp'); ?></p>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-[#34243A]"><?php esc_html_e('Lost Packages / Never Arrived', 'dawp'); ?></h3>
                        <p class="mt-3"><?php esc_html_e('If your tracking status shows no updates for an extended period, or is marked "Delivered" but you did not receive it, please contact us within 30 days of the recorded delivery date. We will investigate with the carrier and arrange a replacement or refund if the package is confirmed lost.', 'dawp'); ?></p>
                    </div>
                </div>
            </article>

            <article class="rounded-lg border border-[#D8C3A5] bg-white p-6 shadow-sm sm:p-8 lg:p-10">
                <h2 class="font-heading text-3xl font-black leading-tight text-[#5A3825] md:text-4xl"><?php esc_html_e('How to Return an Item', 'dawp'); ?></h2>
                <p class="mt-5 text-base leading-8 text-[#5E554D]"><?php esc_html_e('Please follow our official 3-step process. Do not ship any item back without prior authorization, as unauthorized returns cannot be tracked or processed at our warehouse.', 'dawp'); ?></p>
                <div class="mt-6 space-y-4">
                    <?php foreach ($return_steps as $step) : ?>
                        <div class="rounded-lg border border-[#D8C3A5] bg-white p-5">
                            <div class="flex gap-4">
                                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-[#34243A] text-sm font-black text-white"><?php echo esc_html($step['number']); ?></span>
                                <div>
                                    <h3 class="text-lg font-bold leading-7 text-[#34243A]"><?php echo esc_html($step['title']); ?></h3>
                                    <p class="mt-3 leading-8 text-[#5E554D]"><?php echo esc_html($step['copy']); ?></p>
                                    <?php if (! empty($step['extra'])) : ?>
                                        <p class="mt-4 leading-8 text-[#5E554D]"><?php echo esc_html($step['extra']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="mt-5 rounded-lg border border-[#C8A45D] bg-[#F8F1E7] p-5">
                    <p class="font-black text-[#34243A]"><?php esc_html_e('Scott Osterbind - Returns Department', 'dawp'); ?></p>
                    <p class="mt-2 text-[#34243A]"><?php echo esc_html($store_address !== '' ? $store_address : __('Return address will be provided after approval.', 'dawp')); ?></p>
                </div>
                <div class="mt-7 flex flex-wrap gap-3">
                    <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#5A3825] px-6 text-sm font-black text-white transition hover:bg-[#9A6242]">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>
                    <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#34243A] px-6 text-sm font-black text-[#34243A] transition hover:bg-[#34243A] hover:text-white">
                        <?php echo esc_html($support_email); ?>
                    </a>
                </div>
            </article>

            <article class="rounded-lg border border-[#D8C3A5] bg-white p-6 shadow-sm sm:p-8 lg:p-10">
                <h2 class="font-heading text-3xl font-black leading-tight text-[#5A3825] md:text-4xl"><?php esc_html_e('Exchanges', 'dawp'); ?></h2>
                <p class="mt-5 text-base leading-8 text-[#5E554D]"><?php esc_html_e('We do not process direct one-for-one product exchanges. To get a different size, color, material, style, or item, please follow the return process above to send back your original purchase for a refund, and place a new order on our website simultaneously. This ensures your desired item does not sell out.', 'dawp'); ?></p>
            </article>

            <article class="rounded-lg border border-[#D8C3A5] bg-white p-6 shadow-sm sm:p-8 lg:p-10">
                <h2 class="font-heading text-3xl font-black leading-tight text-[#5A3825] md:text-4xl"><?php esc_html_e('Refund Process & Timing', 'dawp'); ?></h2>
                <div class="mt-5 text-base leading-8 text-[#5E554D]">
                    <ul class="list-disc space-y-3 pl-6">
                        <li><?php esc_html_e('Inspection: Once your return package is received at our warehouse, we will inspect the item within 1-2 business days to ensure it meets our return criteria.', 'dawp'); ?></li>
                        <li><?php esc_html_e('Approval & Timing: If approved, your refund will be processed automatically back to your original payment method within 7 business days.', 'dawp'); ?></li>
                        <li><?php esc_html_e('Refund Method: All refunds will be issued solely to your original method of payment within 7 business days of inspection. We do not offer store credit or gift cards as a refund method for returns.', 'dawp'); ?></li>
                        <li><?php esc_html_e('Issues with Returns: If a return is approved but is found to be missing accessories, tags, boxes, care cards, product cards, pouches, or shows signs of wear, we reserve the right to refuse the refund and will offer to ship the item back to you at your expense.', 'dawp'); ?></li>
                        <li><?php esc_html_e('Delayed Refunds: If you have not received your refund after 15 business days of approval, please check with your bank or credit card company first, then contact us.', 'dawp'); ?></li>
                    </ul>
                </div>
                <a href="mailto:<?php echo esc_attr($support_email); ?>" class="mt-7 inline-flex min-h-12 items-center justify-center rounded-full border border-[#34243A] px-6 text-sm font-black text-[#34243A] transition hover:bg-[#34243A] hover:text-white">
                    <?php esc_html_e('Email Support', 'dawp'); ?>
                </a>
            </article>

            <article class="rounded-lg border border-[#D8C3A5] bg-white p-6 shadow-sm sm:p-8 lg:p-10">
                <h2 class="font-heading text-3xl font-black leading-tight text-[#5A3825] md:text-4xl"><?php esc_html_e('Non-Returnable Items', 'dawp'); ?></h2>
                <div class="mt-5 text-base leading-8 text-[#5E554D]">
                    <p><?php esc_html_e('The following items are strictly non-returnable and final sale:', 'dawp'); ?></p>
                    <ul class="mt-5 list-disc space-y-3 pl-6">
                        <li><?php esc_html_e('Items explicitly marked as "Final Sale" or "Non-Returnable" on the product page.', 'dawp'); ?></li>
                        <li><?php esc_html_e('Gift cards or digital products/downloads.', 'dawp'); ?></li>
                        <li><?php esc_html_e('Personalized, engraved, resized, custom-made, or special-order items.', 'dawp'); ?></li>
                        <li><?php esc_html_e('Hygiene-sensitive jewelry or accessories, including earrings, where the product seal has been broken.', 'dawp'); ?></li>
                        <li><?php esc_html_e('Items that have been worn, washed, altered, scented, stained, damaged, or used after delivery.', 'dawp'); ?></li>
                    </ul>
                </div>
            </article>

            <article class="rounded-lg border border-[#D8C3A5] bg-white p-6 shadow-sm sm:p-8 lg:p-10">
                <h2 class="font-heading text-3xl font-black leading-tight text-[#5A3825] md:text-4xl"><?php esc_html_e('Contact Information', 'dawp'); ?></h2>
                <div class="mt-7 rounded-lg border border-[#D8C3A5] p-4">
                    <div class="grid gap-4 md:grid-cols-2">
                        <?php foreach ($contact_details as $detail) : ?>
                            <div class="rounded-lg border border-[#D8C3A5] bg-white p-5">
                                <h3 class="text-sm font-black text-[#34243A]"><?php echo esc_html($detail['label']); ?></h3>
                                <p class="mt-3 leading-7 text-[#5E554D]"><?php echo esc_html($detail['value']); ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </article>
        </div>
    </section>
</div>
