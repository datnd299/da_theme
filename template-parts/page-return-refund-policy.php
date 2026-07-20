<?php
/**
 * Return and refund policy page for MegaMallDepot.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$store_name     = 'MegaMallDepot';
$support_email  = 'support@megamalldepot.com';
$store_address  = function_exists('dawp_get_store_address') ? dawp_get_store_address() : '';
$business_hours = __('Monday - Friday, 9:00 AM - 5:00 PM, GMT-08:00 Pacific Standard Time', 'dawp');
$contact_url    = home_url('/contact-us/');
$last_updated   = __('May 29, 2026', 'dawp');

$return_eligibility = [
    __('Return Window: You must initiate your return request within 30 days of delivery.', 'dawp'),
    __('Condition: Items must be unused, undamaged, and in their original, unaltered condition.', 'dawp'),
    __('Packaging: Items must be returned with all original packaging, manuals, labels, parts, accessories, boxes, and included components.', 'dawp'),
    __('Restocking Fee: Free. We do not charge any restocking fees for eligible returns.', 'dawp'),
];

$return_shipping_fees = [
    [
        'title' => __('Defective, Damaged, or Incorrect Products (Wrong item, carrier damage, or defective):', 'dawp'),
        'copy'  => __('No cost to customer. We cover 100% of the return shipping costs. We will provide a downloadable and printable prepaid shipping label via email.', 'dawp'),
    ],
    [
        'title' => __('Customer Remorse (Ordered wrong item/model/color, changed mind, or product does not fit the intended space):', 'dawp'),
        'copy'  => __('The customer is responsible for the return shipping cost. The actual return shipping cost of the provided prepaid label (sent via email) will be deducted from your final refund amount.', 'dawp'),
    ],
];

$delivery_issues = [
    [
        'title' => __('Damaged on Arrival', 'dawp'),
        'copy'  => __('If your order arrives damaged, please contact us within 30 days of delivery with photos of the item and the shipping packaging, including the shipping label. We will arrange a replacement or full refund at no cost to you.', 'dawp'),
    ],
    [
        'title' => __('Lost Packages / Never Arrived', 'dawp'),
        'copy'  => __('If your tracking status shows no updates for an extended period, or is marked "Delivered" but you did not receive it, please contact us within 30 days of the recorded delivery date. We will investigate with the carrier and arrange a replacement or refund if the package is confirmed lost.', 'dawp'),
    ],
];

$return_steps = [
    [
        'title' => __('Submit Your Return Request', 'dawp'),
        'copy'  => __('Email us or use our Contact Page within 30 days of delivery. Please provide your order number, the email used at checkout, the specific item(s) you wish to return, and the reason for the return with photos or videos if damaged.', 'dawp'),
    ],
    [
        'title' => __('Receive Approval & Pack Your Item', 'dawp'),
        'copy'  => [
            __('Our support team will review your request within 1-2 business days. Once approved, we will email you a Return Merchandise Authorization (RMA) number along with a prepaid shipping label.', 'dawp'),
            __('Repack the item securely in its original packaging with all included accessories, tags, and boxes. Place it inside a sturdy outer shipping box.', 'dawp'),
        ],
    ],
    [
        'title' => __('Ship It Back to Our Returns Center', 'dawp'),
        'copy'  => __('Print the prepaid shipping label, attach it to the outside of your shipping box, and drop it off at the designated carrier location.', 'dawp'),
    ],
];

$refund_process = [
    __('Inspection: Once your return package is received at our warehouse, we will inspect the item within 1-2 business days to ensure it meets our return criteria.', 'dawp'),
    __('Approval & Timing: If approved, your refund will be processed automatically back to your original payment method within 7 business days.', 'dawp'),
    __('Refund Method: All refunds will be issued solely to your original method of payment within 7 business days of inspection. We do not offer store credit or gift cards as a refund method for returns.', 'dawp'),
    __('Issues with Returns: If a return is approved but is found to be missing accessories, tags, boxes, or shows signs of wear, we reserve the right to refuse the refund and will offer to ship the item back to you at your expense.', 'dawp'),
    __('Delayed Refunds: If you have not received your refund after 15 business days of approval, please check with your bank or credit card company first, then contact us.', 'dawp'),
];

$non_returnable_items = [
    __('Items explicitly marked as "Final Sale" or "Non-Returnable" on the product page.', 'dawp'),
    __('Gift cards or digital products/downloads.', 'dawp'),
    __('Personalized, engraved, configured, assembled, or custom-made items.', 'dawp'),
    __('Hygiene-sensitive, sealed, or consumable items where the product seal has been broken.', 'dawp'),
    __('Items that have been used, installed, altered, or damaged after delivery.', 'dawp'),
];

$contact_cards = [
    [
        'label' => __('Store Name', 'dawp'),
        'value' => $store_name,
    ],
    [
        'label' => __('Address', 'dawp'),
        'value' => $store_address,
    ],
    [
        'label' => __('Email', 'dawp'),
        'value' => $support_email,
        'url'   => 'mailto:' . $support_email,
    ],
    [
        'label' => __('Contact Support', 'dawp'),
        'value' => __('Contact Us page', 'dawp'),
        'url'   => $contact_url,
    ],
    [
        'label' => __('Customer Service Hours', 'dawp'),
        'value' => $business_hours,
    ],
    [
        'label' => __('Response Time', 'dawp'),
        'value' => __('We aim to reply within 1 business day. Response times may vary on weekends, holidays, or high-volume periods.', 'dawp'),
    ],
];

$return_faqs = [
    [
        'question' => __('What is the return window?', 'dawp'),
        'answer'   => __('You must initiate your return request within 30 days of delivery. Returns are accepted for eligible defective and non-defective products.', 'dawp'),
    ],
    [
        'question' => __('Who pays return shipping?', 'dawp'),
        'answer'   => __('MegaMallDepot covers return shipping for defective, damaged, carrier-damaged, or incorrect products. For customer-remorse returns, the actual prepaid label cost is deducted from the refund.', 'dawp'),
    ],
    [
        'question' => __('Do you charge restocking fees?', 'dawp'),
        'answer'   => __('No. MegaMallDepot does not charge restocking fees for eligible returns.', 'dawp'),
    ],
    [
        'question' => __('When will I receive my refund?', 'dawp'),
        'answer'   => __('Once your return package is received, we inspect it within 1-2 business days. Approved refunds are processed automatically to the original payment method within 7 business days.', 'dawp'),
    ],
];
?>

<div class="bg-white text-[#2B2B2B]">
    <section class="bg-[#F8F5F0] py-14 sm:py-20" aria-labelledby="return-refund-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:items-end lg:px-8">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A45A3F]"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></p>
                <h1 id="return-refund-title" class="mt-4 font-heading text-4xl font-extrabold leading-tight text-[#2B2B2B] sm:text-5xl">
                    <?php esc_html_e('Return & Refund Policy', 'dawp'); ?>
                </h1>
                <p class="mt-5 max-w-2xl text-base leading-8 text-[#4A4A4A]">
                    <?php esc_html_e('Review eligibility, return shipping fees, return steps, refund timing, exchanges, and contact details before requesting a return.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-md border border-[#E8E5DF] bg-white p-6 shadow-sm">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A45A3F]"><?php esc_html_e('Last Updated', 'dawp'); ?></p>
                <p class="mt-3 font-heading text-2xl font-extrabold text-[#2B2B2B]"><?php echo esc_html($last_updated); ?></p>
                <p class="mt-4 text-sm leading-7 text-[#4A4A4A]">
                    <?php esc_html_e('Need help with a return, damaged package, or refund status? Contact our support team through the official channels below.', 'dawp'); ?>
                </p>
                <div class="mt-6 flex flex-col gap-3 sm:flex-row lg:flex-col xl:flex-row">
                    <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#A45A3F] px-6 text-sm font-bold text-white transition hover:bg-[#7F422F]">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>
                    <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#A45A3F] bg-white px-6 text-sm font-bold text-[#A45A3F] transition hover:bg-[#F8F5F0]">
                        <?php echo esc_html($support_email); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#FFFFFF] py-14 sm:py-20">
        <div class="mx-auto grid max-w-7xl gap-6 px-4 sm:px-6 lg:px-8">
            <article class="rounded-md border border-[#E8E5DF] bg-white p-6 shadow-sm sm:p-8">
                <h2 class="font-heading text-3xl font-extrabold text-[#2B2B2B] sm:text-4xl"><?php esc_html_e('Return Eligibility', 'dawp'); ?></h2>
                <p class="mt-5 text-sm leading-7 text-[#4A4A4A]"><?php esc_html_e('To be eligible for a return, your item must meet the following criteria:', 'dawp'); ?></p>
                <ul class="mt-5 grid gap-3 text-sm leading-7 text-[#4A4A4A]">
                    <?php foreach ($return_eligibility as $item) : ?>
                        <li class="flex gap-3">
                            <span aria-hidden="true">&bull;</span>
                            <span><?php echo esc_html($item); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </article>

            <article class="rounded-md border border-[#E8E5DF] bg-[#F8F5F0] p-6 shadow-sm sm:p-8">
                <h2 class="font-heading text-3xl font-extrabold text-[#2B2B2B] sm:text-4xl"><?php esc_html_e('Return Shipping Fees', 'dawp'); ?></h2>
                <div class="mt-6 grid gap-4 lg:grid-cols-2">
                    <?php foreach ($return_shipping_fees as $fee) : ?>
                        <div class="rounded-md border border-[#E8E5DF] bg-white p-5">
                            <h3 class="font-heading text-lg font-extrabold leading-7 text-[#2B2B2B]"><?php echo esc_html($fee['title']); ?></h3>
                            <p class="mt-4 text-sm leading-7 text-[#4A4A4A]"><?php echo esc_html($fee['copy']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </article>

            <article class="rounded-md border border-[#E8E5DF] bg-white p-6 shadow-sm sm:p-8">
                <h2 class="font-heading text-3xl font-extrabold text-[#2B2B2B] sm:text-4xl"><?php esc_html_e('Common Delivery Issues', 'dawp'); ?></h2>
                <div class="mt-6 grid gap-6">
                    <?php foreach ($delivery_issues as $issue) : ?>
                        <section>
                            <h3 class="font-heading text-lg font-extrabold text-[#2B2B2B]"><?php echo esc_html($issue['title']); ?></h3>
                            <p class="mt-4 text-sm leading-7 text-[#4A4A4A]"><?php echo esc_html($issue['copy']); ?></p>
                        </section>
                    <?php endforeach; ?>
                </div>
            </article>

            <article class="rounded-md border border-[#E8E5DF] bg-[#F8F5F0] p-6 shadow-sm sm:p-8">
                <h2 class="font-heading text-3xl font-extrabold text-[#2B2B2B] sm:text-4xl"><?php esc_html_e('How to Return an Item', 'dawp'); ?></h2>
                <p class="mt-5 text-sm leading-7 text-[#4A4A4A]"><?php esc_html_e('Please follow our official 3-step process. Do not ship any item back without prior authorization, as unauthorized returns cannot be tracked or processed at our warehouse.', 'dawp'); ?></p>

                <div class="mt-6 grid gap-4">
                    <?php foreach ($return_steps as $index => $step) : ?>
                        <section class="rounded-md border border-[#E8E5DF] bg-white p-5">
                            <div class="flex items-start gap-4">
                                <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#A45A3F] text-sm font-extrabold text-white"><?php echo esc_html((string) ($index + 1)); ?></span>
                                <div>
                                    <h3 class="font-heading text-lg font-extrabold text-[#2B2B2B]"><?php echo esc_html($step['title']); ?></h3>
                                    <div class="mt-4 space-y-4 text-sm leading-7 text-[#4A4A4A]">
                                        <?php foreach ((array) $step['copy'] as $paragraph) : ?>
                                            <p><?php echo esc_html($paragraph); ?></p>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </section>
                    <?php endforeach; ?>
                </div>

                <div class="mt-5 rounded-md border border-[#D8C7BE] bg-[#F8F5F0] p-5 text-sm leading-7 text-[#2B2B2B]">
                    <p class="font-extrabold"><?php echo esc_html($store_name); ?><?php esc_html_e(' - Returns Department', 'dawp'); ?></p>
                    <p class="mt-2"><?php echo esc_html($store_address); ?></p>
                </div>

                <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#A45A3F] px-6 text-sm font-bold text-white transition hover:bg-[#A45A3F]">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>
                    <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#A45A3F] bg-white px-6 text-sm font-bold text-[#A45A3F] transition hover:bg-[#F8F5F0]">
                        <?php echo esc_html($support_email); ?>
                    </a>
                </div>
            </article>

            <article class="rounded-md border border-[#E8E5DF] bg-white p-6 shadow-sm sm:p-8">
                <h2 class="font-heading text-3xl font-extrabold text-[#2B2B2B] sm:text-4xl"><?php esc_html_e('Exchanges', 'dawp'); ?></h2>
                <p class="mt-5 text-sm leading-7 text-[#4A4A4A]"><?php esc_html_e('We do not process direct one-for-one product exchanges. To get a different size, color, or model, please follow the return process above to send back your original purchase for a refund, and place a new order on our website simultaneously. This ensures your desired item does not sell out.', 'dawp'); ?></p>
            </article>

            <article class="rounded-md border border-[#E8E5DF] bg-[#F8F5F0] p-6 shadow-sm sm:p-8">
                <h2 class="font-heading text-3xl font-extrabold text-[#2B2B2B] sm:text-4xl"><?php esc_html_e('Refund Process & Timing', 'dawp'); ?></h2>
                <ul class="mt-6 grid gap-3 text-sm leading-7 text-[#4A4A4A]">
                    <?php foreach ($refund_process as $item) : ?>
                        <li class="flex gap-3">
                            <span aria-hidden="true">&bull;</span>
                            <span><?php echo esc_html($item); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <a href="mailto:<?php echo esc_attr($support_email); ?>" class="mt-7 inline-flex min-h-12 items-center justify-center rounded-md border border-[#A45A3F] bg-white px-6 text-sm font-bold text-[#A45A3F] transition hover:bg-[#F8F5F0]">
                    <?php esc_html_e('Email Support', 'dawp'); ?>
                </a>
            </article>

            <article class="rounded-md border border-[#E8E5DF] bg-white p-6 shadow-sm sm:p-8">
                <h2 class="font-heading text-3xl font-extrabold text-[#2B2B2B] sm:text-4xl"><?php esc_html_e('Non-Returnable Items', 'dawp'); ?></h2>
                <p class="mt-5 text-sm leading-7 text-[#4A4A4A]"><?php esc_html_e('The following items are strictly non-returnable and final sale:', 'dawp'); ?></p>
                <ul class="mt-5 grid gap-3 text-sm leading-7 text-[#4A4A4A]">
                    <?php foreach ($non_returnable_items as $item) : ?>
                        <li class="flex gap-3">
                            <span aria-hidden="true">&bull;</span>
                            <span><?php echo esc_html($item); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </article>

            <article class="rounded-md border border-[#E8E5DF] bg-[#F8F5F0] p-6 shadow-sm sm:p-8">
                <h2 class="font-heading text-3xl font-extrabold text-[#2B2B2B] sm:text-4xl"><?php esc_html_e('Contact Information', 'dawp'); ?></h2>
                <div class="mt-6 rounded-md border border-[#E8E5DF] bg-white p-4 sm:p-5">
                    <dl class="grid gap-4 lg:grid-cols-2">
                        <?php foreach ($contact_cards as $card) : ?>
                            <div class="rounded-md border border-[#E8E5DF] bg-[#FFFFFF] p-4">
                                <dt class="text-sm font-extrabold text-[#2B2B2B]"><?php echo esc_html($card['label']); ?></dt>
                                <dd class="mt-3 text-sm leading-7 text-[#4A4A4A]">
                                    <?php if (!empty($card['url'])) : ?>
                                        <a class="font-bold text-[#A45A3F] underline decoration-[#A45A3F]/40 underline-offset-4 transition hover:text-[#7F422F]" href="<?php echo esc_url($card['url']); ?>"><?php echo esc_html($card['value']); ?></a>
                                    <?php else : ?>
                                        <?php echo esc_html($card['value']); ?>
                                    <?php endif; ?>
                                </dd>
                            </div>
                        <?php endforeach; ?>
                    </dl>
                </div>
            </article>

            <article class="rounded-md border border-[#E8E5DF] bg-white p-6 shadow-sm sm:p-8">
                <h2 class="font-heading text-3xl font-extrabold text-[#2B2B2B] sm:text-4xl"><?php esc_html_e('Return & Refund FAQs', 'dawp'); ?></h2>
                <div class="mt-6 divide-y divide-[#E8E5DF]">
                    <?php foreach ($return_faqs as $item) : ?>
                        <details class="group py-5 first:pt-0 last:pb-0">
                            <summary class="flex cursor-pointer list-none items-start justify-between gap-4 text-left font-heading text-lg font-extrabold text-[#2B2B2B]">
                                <span><?php echo esc_html($item['question']); ?></span>
                                <span class="mt-1 flex h-7 w-7 shrink-0 items-center justify-center rounded-md bg-[#F8F5F0] text-[#A45A3F] transition group-open:rotate-45" aria-hidden="true">+</span>
                            </summary>
                            <p class="mt-3 text-sm leading-7 text-[#4A4A4A]"><?php echo esc_html($item['answer']); ?></p>
                        </details>
                    <?php endforeach; ?>
                </div>
            </article>
        </div>
    </section>
</div>
