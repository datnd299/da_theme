<?php
/**
 * Template Part: Return & Refund Policy Page
 */

defined('ABSPATH') || exit;

$support_email    = 'support@norvexaholdingsllc.com';
$store_name       = 'Norvexa';
$store_address    = function_exists('dawp_store_address') ? dawp_store_address() : '';
$updated_date     = 'May 28, 2026';
$policy_image     = get_template_directory_uri() . '/assets/img/All_image/image copy 6.png';
$business_hours   = __('Monday-Friday, 9:00 AM-5:00 PM, GMT-08:00', 'dawp');
$response_time    = __('We aim to reply within 1 business day. Response times may vary on weekends, holidays, or high-volume periods.', 'dawp');

$eligibility_items = [
    __('Return Window: You must initiate your return request within 30 days of delivery.', 'dawp'),
    __('Condition: Items must be unworn, unused, undamaged, and in their original, unaltered condition.', 'dawp'),
    __('Packaging: Items must be returned with all original packaging, tags, labels, certificates, care cards, pouches, boxes, and any included accessories.', 'dawp'),
    __('Restocking Fee: Free. We do not charge any restocking fees for eligible returns.', 'dawp'),
];

$return_steps = [
    [
        'number' => '1',
        'title'  => __('Submit Your Return Request', 'dawp'),
        'body'   => [
            __('Email us or use our Contact Page within 30 days of delivery. Please provide your order number, the email used at checkout, the specific item(s) you wish to return, and the reason for the return with photos or videos if damaged.', 'dawp'),
        ],
    ],
    [
        'number' => '2',
        'title'  => __('Receive Approval & Pack Your Item', 'dawp'),
        'body'   => [
            __('Our support team will review your request within 1-2 business days. Once approved, we will email you a Return Merchandise Authorization (RMA) number along with a prepaid shipping label.', 'dawp'),
            __('Repack the item securely in its original packaging with all included accessories, tags, and boxes. Place it inside a sturdy outer shipping box.', 'dawp'),
        ],
    ],
    [
        'number' => '3',
        'title'  => __('Ship It Back to Our Returns Center', 'dawp'),
        'body'   => [
            __('Print the prepaid shipping label, attach it to the outside of your shipping box, and drop it off at the designated carrier location.', 'dawp'),
        ],
    ],
];

$refund_items = [
    __('Inspection: Once your return package is received at our warehouse, we will inspect the item within 1-2 business days to ensure it meets our return criteria.', 'dawp'),
    __('Approval & Timing: If approved, your refund will be processed automatically back to your original payment method within 7 business days.', 'dawp'),
    __('Refund Method: All refunds will be issued solely to your original method of payment within 7 business days of inspection. We do not offer store credit or gift cards as a refund method for returns.', 'dawp'),
    __('Issues with Returns: If a return is approved but is found to be missing accessories, tags, boxes, or shows signs of wear, we reserve the right to refuse the refund and will offer to ship the item back to you at your expense.', 'dawp'),
    __('Delayed Refunds: If you have not received your refund after 15 business days of approval, please check with your bank or credit card company first, then contact us.', 'dawp'),
];

$non_returnable_items = [
    __('Items explicitly marked as "Final Sale" or "Non-Returnable" on the product page.', 'dawp'),
    __('Gift cards or digital products/downloads.', 'dawp'),
    __('Personalized, engraved, resized, or custom-made items.', 'dawp'),
    __('Intimate apparel, swimwear, or hygiene-sensitive items such as earrings where the product seal has been broken.', 'dawp'),
    __('Items that have been worn, washed, altered, or damaged after delivery.', 'dawp'),
];
?>

<main class="bg-[#F8F3EC] text-[#2F2A28]">
    <section class="relative overflow-hidden bg-[#241F1D] px-4 py-20 text-white sm:px-6 lg:px-8 lg:py-24">
        <div class="absolute inset-0 opacity-35">
            <img src="<?php echo esc_url($policy_image); ?>" alt="<?php esc_attr_e('Women\'s shoes and accessories for return policy', 'dawp'); ?>" class="h-full w-full object-cover" loading="eager">
            <div class="absolute inset-0 bg-[linear-gradient(90deg,rgba(36,31,29,0.98)_0%,rgba(36,31,29,0.78)_52%,rgba(36,31,29,0.42)_100%)]"></div>
        </div>
        <div class="relative mx-auto grid w-[min(100%,1180px)] gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:items-end">
            <div class="max-w-3xl">
                <span class="inline-flex border-b border-[#E8D8C8] pb-2 text-xs font-bold uppercase tracking-[0.18em] text-[#E8D8C8]"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></span>
                <h1 class="mt-7 font-serif text-4xl leading-tight text-white sm:text-6xl"><?php esc_html_e('Returns, refunds, and exchanges.', 'dawp'); ?></h1>
                <p class="mt-6 max-w-2xl text-base leading-8 text-white/78 sm:text-lg">
                    <?php esc_html_e('Review Norvexa return eligibility, return shipping fees, delivery issue guidance, refund timing, non-returnable items, and contact information before starting a return.', 'dawp'); ?>
                </p>
            </div>
            <div class="rounded-[28px] border border-white/18 bg-white/10 p-6 backdrop-blur sm:p-8">
                <dl class="grid gap-5 sm:grid-cols-2">
                    <div>
                        <dt class="text-xs font-bold uppercase tracking-[0.18em] text-[#E8D8C8]"><?php esc_html_e('Store', 'dawp'); ?></dt>
                        <dd class="mt-2 font-serif text-2xl text-white"><?php echo esc_html($store_name); ?></dd>
                    </div>
                    <div>
                        <dt class="text-xs font-bold uppercase tracking-[0.18em] text-[#E8D8C8]"><?php esc_html_e('Updated', 'dawp'); ?></dt>
                        <dd class="mt-2 font-serif text-2xl text-white"><?php echo esc_html($updated_date); ?></dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>

    <section class="bg-white px-4 py-10 sm:px-6 lg:px-8">
        <div class="mx-auto grid w-[min(100%,1180px)] gap-4 md:grid-cols-4">
            <div class="rounded-[28px] border border-[#D8CEC6] bg-[#F8F3EC] p-6">
                <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#C98A8A]"><?php esc_html_e('Return Window', 'dawp'); ?></span>
                <p class="mt-3 font-serif text-3xl text-[#2F2A28]"><?php esc_html_e('30 Days', 'dawp'); ?></p>
            </div>
            <div class="rounded-[28px] border border-[#D8CEC6] bg-[#F8F3EC] p-6">
                <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#C98A8A]"><?php esc_html_e('Review Time', 'dawp'); ?></span>
                <p class="mt-3 font-serif text-3xl text-[#2F2A28]"><?php esc_html_e('1-2 Days', 'dawp'); ?></p>
            </div>
            <div class="rounded-[28px] border border-[#D8CEC6] bg-[#F8F3EC] p-6">
                <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#C98A8A]"><?php esc_html_e('Refund Timing', 'dawp'); ?></span>
                <p class="mt-3 font-serif text-3xl text-[#2F2A28]"><?php esc_html_e('7 Days', 'dawp'); ?></p>
            </div>
            <div class="rounded-[28px] border border-[#D8CEC6] bg-[#F8F3EC] p-6">
                <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#C98A8A]"><?php esc_html_e('Restocking Fee', 'dawp'); ?></span>
                <p class="mt-3 font-serif text-3xl text-[#2F2A28]"><?php esc_html_e('Free', 'dawp'); ?></p>
            </div>
        </div>
    </section>

    <section class="px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto grid w-[min(100%,1180px)] gap-8 lg:grid-cols-[280px_1fr]">
            <aside class="h-fit rounded-[28px] border border-[#D8CEC6] bg-white p-6 shadow-[0_12px_30px_rgba(47,42,40,0.06)] lg:sticky lg:top-24">
                <h2 class="font-serif text-2xl text-[#2F2A28]"><?php esc_html_e('Policy Overview', 'dawp'); ?></h2>
                <p class="mt-4 text-sm leading-6 text-[#6F625D]"><?php esc_html_e('Please do not ship any item back without prior authorization, as unauthorized returns cannot be tracked or processed at our warehouse.', 'dawp'); ?></p>
                <div class="mt-6 rounded-2xl bg-[#F4ECE5] p-5">
                    <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#C98A8A]"><?php esc_html_e('Support', 'dawp'); ?></span>
                    <a href="<?php echo esc_url('mailto:' . $support_email); ?>" class="mt-2 block break-words text-sm font-bold text-[#2F2A28] hover:text-[#C98A8A]"><?php echo esc_html($support_email); ?></a>
                </div>
            </aside>

            <div class="space-y-5">
                <article class="rounded-[28px] border border-[#D8CEC6] bg-white p-6 shadow-[0_12px_30px_rgba(47,42,40,0.06)] sm:p-8 lg:p-10">
                    <h2 class="font-serif text-3xl leading-tight text-[#2F2A28] sm:text-4xl"><?php esc_html_e('Return Eligibility', 'dawp'); ?></h2>
                    <p class="mt-5 text-base leading-8 text-[#6F625D]"><?php esc_html_e('To be eligible for a return, your item must meet the following criteria:', 'dawp'); ?></p>
                    <ul class="mt-5 list-disc space-y-4 pl-5 text-base leading-8 text-[#6F625D]">
                        <?php foreach ($eligibility_items as $item) : ?>
                            <li><?php echo esc_html($item); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </article>

                <article class="rounded-[28px] border border-[#D8CEC6] bg-white p-6 shadow-[0_12px_30px_rgba(47,42,40,0.06)] sm:p-8 lg:p-10">
                    <h2 class="font-serif text-3xl leading-tight text-[#2F2A28] sm:text-4xl"><?php esc_html_e('Return Shipping Fees', 'dawp'); ?></h2>
                    <div class="mt-6 grid gap-4 md:grid-cols-2">
                        <div class="rounded-2xl border border-[#E8D8C8] bg-white p-5">
                            <h3 class="text-lg font-semibold leading-7 text-[#2F2A28]"><?php esc_html_e('Defective, Damaged, or Incorrect Products (Wrong item, carrier damage, or defective):', 'dawp'); ?></h3>
                            <p class="mt-4 text-sm leading-7 text-[#6F625D]"><?php esc_html_e('No cost to customer. We cover 100% of the return shipping costs. We will provide a downloadable and printable prepaid shipping label via email.', 'dawp'); ?></p>
                        </div>
                        <div class="rounded-2xl border border-[#E8D8C8] bg-white p-5">
                            <h3 class="text-lg font-semibold leading-7 text-[#2F2A28]"><?php esc_html_e('Customer Remorse (Ordered wrong item/size/color, changed mind, or does not fit):', 'dawp'); ?></h3>
                            <p class="mt-4 text-sm leading-7 text-[#6F625D]"><?php esc_html_e('The customer is responsible for the return shipping cost. The actual return shipping cost of the provided prepaid label (sent via email) will be deducted from your final refund amount.', 'dawp'); ?></p>
                        </div>
                    </div>
                </article>

                <article class="rounded-[28px] border border-[#D8CEC6] bg-white p-6 shadow-[0_12px_30px_rgba(47,42,40,0.06)] sm:p-8 lg:p-10">
                    <h2 class="font-serif text-3xl leading-tight text-[#2F2A28] sm:text-4xl"><?php esc_html_e('Common Delivery Issues', 'dawp'); ?></h2>
                    <div class="mt-6 space-y-6 text-base leading-8 text-[#6F625D]">
                        <div>
                            <h3 class="text-lg font-semibold text-[#2F2A28]"><?php esc_html_e('Damaged on Arrival', 'dawp'); ?></h3>
                            <p class="mt-3"><?php esc_html_e('If your order arrives damaged, please contact us within 30 days of delivery with photos of the item and the shipping packaging, including the shipping label. We will arrange a replacement or full refund at no cost to you.', 'dawp'); ?></p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-[#2F2A28]"><?php esc_html_e('Lost Packages / Never Arrived', 'dawp'); ?></h3>
                            <p class="mt-3"><?php esc_html_e('If your tracking status shows no updates for an extended period, or is marked "Delivered" but you did not receive it, please contact us within 30 days of the recorded delivery date. We will investigate with the carrier and arrange a replacement or refund if the package is confirmed lost.', 'dawp'); ?></p>
                        </div>
                    </div>
                </article>

                <article class="rounded-[28px] border border-[#D8CEC6] bg-white p-6 shadow-[0_12px_30px_rgba(47,42,40,0.06)] sm:p-8 lg:p-10">
                    <h2 class="font-serif text-3xl leading-tight text-[#2F2A28] sm:text-4xl"><?php esc_html_e('How to Return an Item', 'dawp'); ?></h2>
                    <p class="mt-5 text-base leading-8 text-[#6F625D]"><?php esc_html_e('Please follow our official 3-step process. Do not ship any item back without prior authorization, as unauthorized returns cannot be tracked or processed at our warehouse.', 'dawp'); ?></p>
                    <div class="mt-6 space-y-4">
                        <?php foreach ($return_steps as $step) : ?>
                            <div class="rounded-2xl border border-[#E8D8C8] bg-white p-5">
                                <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-[#2F2A28] text-sm font-bold text-white"><?php echo esc_html($step['number']); ?></span>
                                <div class="mt-4">
                                    <h3 class="text-lg font-semibold text-[#2F2A28]"><?php echo esc_html($step['title']); ?></h3>
                                    <div class="mt-3 space-y-3 text-base leading-8 text-[#6F625D]">
                                        <?php foreach ($step['body'] as $paragraph) : ?>
                                            <p><?php echo esc_html($paragraph); ?></p>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="mt-5 rounded-2xl border border-[#E6C779] bg-[#FFF7E3] p-5 text-[#2F2A28]">
                        <p class="font-bold"><?php printf(esc_html__('%s - Returns Department', 'dawp'), esc_html($store_name)); ?></p>
                        <p class="mt-2"><?php echo esc_html($store_address); ?></p>
                    </div>
                    <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#2F2A28] px-7 py-3 text-sm font-bold text-white transition-colors hover:bg-[#C98A8A]"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
                        <a href="<?php echo esc_url('mailto:' . $support_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#2F2A28] bg-white px-7 py-3 text-sm font-bold text-[#2F2A28] transition-colors hover:border-[#C98A8A] hover:text-[#C98A8A]"><?php echo esc_html($support_email); ?></a>
                    </div>
                </article>

                <article class="rounded-[28px] border border-[#D8CEC6] bg-white p-6 shadow-[0_12px_30px_rgba(47,42,40,0.06)] sm:p-8 lg:p-10">
                    <h2 class="font-serif text-3xl leading-tight text-[#2F2A28] sm:text-4xl"><?php esc_html_e('Exchanges', 'dawp'); ?></h2>
                    <p class="mt-5 text-base leading-8 text-[#6F625D]"><?php esc_html_e('We do not process direct one-for-one product exchanges. To get a different size, color, or model, please follow the return process above to send back your original purchase for a refund, and place a new order on our website simultaneously. This ensures your desired item does not sell out.', 'dawp'); ?></p>
                </article>

                <article class="rounded-[28px] border border-[#D8CEC6] bg-white p-6 shadow-[0_12px_30px_rgba(47,42,40,0.06)] sm:p-8 lg:p-10">
                    <h2 class="font-serif text-3xl leading-tight text-[#2F2A28] sm:text-4xl"><?php esc_html_e('Refund Process & Timing', 'dawp'); ?></h2>
                    <ul class="mt-6 list-disc space-y-4 pl-5 text-base leading-8 text-[#6F625D]">
                        <?php foreach ($refund_items as $item) : ?>
                            <li><?php echo esc_html($item); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="<?php echo esc_url('mailto:' . $support_email); ?>" class="mt-7 inline-flex min-h-12 items-center justify-center rounded-full border border-[#2F2A28] bg-white px-7 py-3 text-sm font-bold text-[#2F2A28] transition-colors hover:border-[#C98A8A] hover:text-[#C98A8A]"><?php esc_html_e('Email Support', 'dawp'); ?></a>
                </article>

                <article class="rounded-[28px] border border-[#D8CEC6] bg-white p-6 shadow-[0_12px_30px_rgba(47,42,40,0.06)] sm:p-8 lg:p-10">
                    <h2 class="font-serif text-3xl leading-tight text-[#2F2A28] sm:text-4xl"><?php esc_html_e('Non-Returnable Items', 'dawp'); ?></h2>
                    <p class="mt-5 text-base leading-8 text-[#6F625D]"><?php esc_html_e('The following items are strictly non-returnable and final sale:', 'dawp'); ?></p>
                    <ul class="mt-5 list-disc space-y-4 pl-5 text-base leading-8 text-[#6F625D]">
                        <?php foreach ($non_returnable_items as $item) : ?>
                            <li><?php echo esc_html($item); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </article>

                <article class="rounded-[28px] border border-[#D8CEC6] bg-white p-6 shadow-[0_12px_30px_rgba(47,42,40,0.06)] sm:p-8 lg:p-10">
                    <h2 class="font-serif text-3xl leading-tight text-[#2F2A28] sm:text-4xl"><?php esc_html_e('Contact Information', 'dawp'); ?></h2>
                    <dl class="mt-7 grid gap-4 md:grid-cols-2">
                        <div class="rounded-2xl border border-[#E8D8C8] bg-white p-5">
                            <dt class="text-sm font-bold text-[#2F2A28]"><?php esc_html_e('Store Name', 'dawp'); ?></dt>
                            <dd class="mt-3 text-sm leading-7 text-[#6F625D]"><?php echo esc_html($store_name); ?></dd>
                        </div>
                        <div class="rounded-2xl border border-[#E8D8C8] bg-white p-5">
                            <dt class="text-sm font-bold text-[#2F2A28]"><?php esc_html_e('Address', 'dawp'); ?></dt>
                            <dd class="mt-3 text-sm leading-7 text-[#6F625D]"><?php echo esc_html($store_address); ?></dd>
                        </div>
                        <div class="rounded-2xl border border-[#E8D8C8] bg-white p-5">
                            <dt class="text-sm font-bold text-[#2F2A28]"><?php esc_html_e('Email', 'dawp'); ?></dt>
                            <dd class="mt-3 text-sm leading-7 text-[#6F625D]"><a href="<?php echo esc_url('mailto:' . $support_email); ?>" class="hover:text-[#C98A8A]"><?php echo esc_html($support_email); ?></a></dd>
                        </div>
                        <div class="rounded-2xl border border-[#E8D8C8] bg-white p-5">
                            <dt class="text-sm font-bold text-[#2F2A28]"><?php esc_html_e('Contact Support', 'dawp'); ?></dt>
                            <dd class="mt-3 text-sm leading-7 text-[#6F625D]"><a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="hover:text-[#C98A8A]"><?php esc_html_e('Contact Us page', 'dawp'); ?></a></dd>
                        </div>
                        <div class="rounded-2xl border border-[#E8D8C8] bg-white p-5">
                            <dt class="text-sm font-bold text-[#2F2A28]"><?php esc_html_e('Customer Service Hours', 'dawp'); ?></dt>
                            <dd class="mt-3 text-sm leading-7 text-[#6F625D]"><?php echo esc_html($business_hours); ?></dd>
                        </div>
                        <div class="rounded-2xl border border-[#E8D8C8] bg-white p-5">
                            <dt class="text-sm font-bold text-[#2F2A28]"><?php esc_html_e('Response Time', 'dawp'); ?></dt>
                            <dd class="mt-3 text-sm leading-7 text-[#6F625D]"><?php echo esc_html($response_time); ?></dd>
                        </div>
                    </dl>
                </article>
            </div>
        </div>
    </section>
</main>
