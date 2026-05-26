<?php
/**
 * Template Part: page-shipping-returns
 */
?>

<main id="primary" class="bg-white font-body text-[#141217]">

    <section class="relative overflow-hidden bg-[#141217] text-white">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(230,0,126,0.34),transparent_32%),linear-gradient(135deg,#141217_0%,#2A1538_58%,#141217_100%)]"></div>

        <div class="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
            <div class="max-w-4xl">
                <p class="mb-5 text-sm font-black uppercase tracking-[0.24em] text-[#FF4FB8]">
                    <?php esc_html_e('Customer Care', 'dawp'); ?>
                </p>

                <h1 class="font-heading text-5xl font-black leading-[0.94] text-white sm:text-6xl lg:text-7xl">
                    <?php esc_html_e('Shipping & Returns Policy', 'dawp'); ?>
                </h1>

                <p class="mt-6 max-w-2xl text-lg leading-8 text-white/82">
                    <?php esc_html_e('Clear delivery, return, exchange, and refund terms for House of Shoes Online orders.', 'dawp'); ?>
                </p>

                <div class="mt-8 grid max-w-4xl grid-cols-1 gap-4 sm:grid-cols-3">
                    <div class="border-l-4 border-[#E6007E] bg-white/8 p-5">
                        <p class="text-xs font-black uppercase tracking-[0.18em] text-[#FF4FB8]"><?php esc_html_e('Order Cutoff', 'dawp'); ?></p>
                        <p class="mt-2 font-heading text-2xl font-black"><?php esc_html_e('2:00 PM PST', 'dawp'); ?></p>
                    </div>

                    <div class="border-l-4 border-[#FF4FB8] bg-white/8 p-5">
                        <p class="text-xs font-black uppercase tracking-[0.18em] text-[#FF4FB8]"><?php esc_html_e('Delivery Time', 'dawp'); ?></p>
                        <p class="mt-2 font-heading text-2xl font-black"><?php esc_html_e('0-1 Business Days', 'dawp'); ?></p>
                    </div>

                    <div class="border-l-4 border-[#7C3AED] bg-white/8 p-5">
                        <p class="text-xs font-black uppercase tracking-[0.18em] text-[#FF4FB8]"><?php esc_html_e('Returns', 'dawp'); ?></p>
                        <p class="mt-2 font-heading text-2xl font-black"><?php esc_html_e('30 Days', 'dawp'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#F6F5F7] py-12 lg:py-16">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-5 px-4 sm:grid-cols-2 sm:px-6 lg:grid-cols-4 lg:px-8">
            <?php
            $summary_cards = [
                ['number' => '01', 'title' => __('Fast Processing', 'dawp'), 'copy' => __('Orders placed before 2:00 PM PST can begin fulfillment the same business day.', 'dawp')],
                ['number' => '02', 'title' => __('Mon-Sat Fulfillment', 'dawp'), 'copy' => __('Handling and shipping operate Monday through Saturday, excluding public holidays.', 'dawp')],
                ['number' => '03', 'title' => __('Mail Returns', 'dawp'), 'copy' => __('Approved returns are accepted by mail. Customers download, print, and use the return label.', 'dawp')],
                ['number' => '04', 'title' => __('No Restocking Fee', 'dawp'), 'copy' => __('Eligible returns are not charged a restocking fee after inspection approval.', 'dawp')],
            ];
            ?>

            <?php foreach ($summary_cards as $card) : ?>
                <div class="rounded-2xl border border-[#EEE5EF] bg-white p-6 shadow-sm">
                    <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-[#E6007E] text-sm font-black text-white">
                        <?php echo esc_html($card['number']); ?>
                    </div>
                    <h2 class="font-heading text-2xl font-black leading-tight text-[#141217]">
                        <?php echo esc_html($card['title']); ?>
                    </h2>
                    <p class="mt-3 text-sm leading-6 text-[#5E5363]">
                        <?php echo esc_html($card['copy']); ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 sm:px-6 lg:grid-cols-[0.82fr_1.18fr] lg:px-8">

            <aside class="lg:sticky lg:top-32 lg:self-start">
                <div class="rounded-3xl bg-[#141217] p-7 text-white shadow-xl shadow-[#141217]/10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#FF4FB8]">
                        <?php esc_html_e('Policy Sections', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black leading-none">
                        <?php esc_html_e('Order Terms At A Glance.', 'dawp'); ?>
                    </h2>

                    <p class="mt-5 text-sm leading-7 text-white/80">
                        <?php esc_html_e('Use these sections to review our shipping timeline, return eligibility, exchange terms, return costs, and refund timing before placing an order.', 'dawp'); ?>
                    </p>

                    <nav class="mt-7 grid gap-3 text-sm font-black uppercase tracking-wide text-white/85" aria-label="<?php esc_attr_e('Shipping and returns navigation', 'dawp'); ?>">
                        <a href="#shipping" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-[#FF4FB8]"><?php esc_html_e('Shipping Timeline', 'dawp'); ?></a>
                        <a href="#delivery" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-[#FF4FB8]"><?php esc_html_e('Delivery Estimate', 'dawp'); ?></a>
                        <a href="#returns" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-[#FF4FB8]"><?php esc_html_e('Returns & Exchanges', 'dawp'); ?></a>
                        <a href="#return-costs" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-[#FF4FB8]"><?php esc_html_e('Return Costs', 'dawp'); ?></a>
                        <a href="#refunds" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-[#FF4FB8]"><?php esc_html_e('Refunds', 'dawp'); ?></a>
                        <a href="#support" class="rounded-md border border-white/10 px-4 py-3 transition hover:border-[#FF4FB8] hover:text-[#FF4FB8]"><?php esc_html_e('Support', 'dawp'); ?></a>
                    </nav>
                </div>
            </aside>

            <div class="space-y-8">

                <section id="shipping" class="rounded-3xl border border-[#EEE5EF] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]">
                        <?php esc_html_e('Shipping Policy', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]">
                        <?php esc_html_e('Order Cutoff, Handling, And Shipping Days', 'dawp'); ?>
                    </h2>

                    <div class="mt-7 grid gap-4 sm:grid-cols-2">
                        <div class="rounded-2xl bg-[#F6F5F7] p-6">
                            <p class="text-xs font-black uppercase tracking-[0.18em] text-[#7C3AED]"><?php esc_html_e('Order Cutoff Time', 'dawp'); ?></p>
                            <p class="mt-2 text-2xl font-black text-[#141217]"><?php esc_html_e('2:00 PM', 'dawp'); ?></p>
                            <p class="mt-2 text-sm leading-6 text-[#5E5363]"><?php esc_html_e('Pacific Standard Time, Los Angeles timezone.', 'dawp'); ?></p>
                        </div>

                        <div class="rounded-2xl bg-[#F6F5F7] p-6">
                            <p class="text-xs font-black uppercase tracking-[0.18em] text-[#7C3AED]"><?php esc_html_e('Handling Time', 'dawp'); ?></p>
                            <p class="mt-2 text-2xl font-black text-[#141217]"><?php esc_html_e('0-1 Business Days', 'dawp'); ?></p>
                            <p class="mt-2 text-sm leading-6 text-[#5E5363]"><?php esc_html_e('Orders are fulfilled Monday through Saturday.', 'dawp'); ?></p>
                        </div>
                    </div>

                    <div class="mt-6 space-y-5 text-base leading-8 text-[#5E5363]">
                        <p>
                            <?php esc_html_e('Orders placed before the 2:00 PM PST cutoff may begin handling on the same business day. Orders placed after the cutoff may begin handling on the next business day.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('Handling time is the time between order placement and when the shipment is ready for carrier transit. Public holidays and carrier interruptions may affect the estimate.', 'dawp'); ?>
                        </p>
                    </div>
                </section>

                <section id="delivery" class="rounded-3xl border border-[#EEE5EF] bg-[#F6F5F7] p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]">
                        <?php esc_html_e('Delivery Estimate', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]">
                        <?php esc_html_e('Estimated Delivery Is 0-1 Business Days', 'dawp'); ?>
                    </h2>

                    <div class="mt-7 overflow-hidden rounded-2xl border border-[#EEE5EF] bg-white">
                        <div class="grid grid-cols-1 divide-y divide-[#EEE5EF] sm:grid-cols-3 sm:divide-x sm:divide-y-0">
                            <div class="p-6">
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-[#7C3AED]"><?php esc_html_e('Destination', 'dawp'); ?></p>
                                <p class="mt-2 font-heading text-2xl font-black text-[#141217]"><?php esc_html_e('All Destinations', 'dawp'); ?></p>
                            </div>
                            <div class="p-6">
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-[#7C3AED]"><?php esc_html_e('Transit Time', 'dawp'); ?></p>
                                <p class="mt-2 font-heading text-2xl font-black text-[#141217]"><?php esc_html_e('0 Days', 'dawp'); ?></p>
                            </div>
                            <div class="p-6">
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-[#7C3AED]"><?php esc_html_e('Total Delivery', 'dawp'); ?></p>
                                <p class="mt-2 font-heading text-2xl font-black text-[#141217]"><?php esc_html_e('0-1 Business Days', 'dawp'); ?></p>
                            </div>
                        </div>
                    </div>

                    <p class="mt-6 text-base leading-8 text-[#5E5363]">
                        <?php esc_html_e('Estimated delivery time is calculated from the order cutoff, handling time, and transit time provided for the shipment. If an order is placed over a public holiday, the estimate may be adjusted.', 'dawp'); ?>
                    </p>
                </section>

                <section id="returns" class="rounded-3xl border border-[#EEE5EF] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]">
                        <?php esc_html_e('Returns & Exchanges', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]">
                        <?php esc_html_e('30-Day Returns For New Footwear', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-[#5E5363]">
                        <p>
                            <?php esc_html_e('We accept returns for defective and non-defective products. We also accept exchanges when the requested replacement item is available.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('Return requests must be made within 30 days of delivery. Items must be new, unused, unworn, unopened where applicable, and returned in original packaging with all included accessories or materials.', 'dawp'); ?>
                        </p>
                    </div>

                    <div class="mt-7 grid gap-4 sm:grid-cols-2">
                        <div class="rounded-2xl border border-[#EEE5EF] bg-[#F6F5F7] p-6">
                            <h3 class="font-heading text-2xl font-black leading-tight text-[#141217]"><?php esc_html_e('Accepted Product Condition', 'dawp'); ?></h3>
                            <p class="mt-3 text-sm leading-6 text-[#5E5363]"><?php esc_html_e('Only new products are eligible. Footwear must not show wear, stains, odors, damage, washing, or alteration.', 'dawp'); ?></p>
                        </div>

                        <div class="rounded-2xl border border-[#EEE5EF] bg-[#F6F5F7] p-6">
                            <h3 class="font-heading text-2xl font-black leading-tight text-[#141217]"><?php esc_html_e('Return Method', 'dawp'); ?></h3>
                            <p class="mt-3 text-sm leading-6 text-[#5E5363]"><?php esc_html_e('Returns are accepted by mail. In-store returns and drop-off location returns are not available.', 'dawp'); ?></p>
                        </div>
                    </div>
                </section>

                <section id="return-costs" class="rounded-3xl border border-[#EEE5EF] bg-[#F6F5F7] p-7 lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]">
                        <?php esc_html_e('Return Costs', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]">
                        <?php esc_html_e('Return Label And Restocking Terms', 'dawp'); ?>
                    </h2>

                    <div class="mt-7 grid gap-4 lg:grid-cols-3">
                        <div class="rounded-2xl bg-white p-6 shadow-sm">
                            <p class="text-xs font-black uppercase tracking-[0.18em] text-[#7C3AED]"><?php esc_html_e('Currency', 'dawp'); ?></p>
                            <p class="mt-2 text-2xl font-black text-[#141217]"><?php esc_html_e('USD', 'dawp'); ?></p>
                        </div>

                        <div class="rounded-2xl bg-white p-6 shadow-sm">
                            <p class="text-xs font-black uppercase tracking-[0.18em] text-[#7C3AED]"><?php esc_html_e('Return Label', 'dawp'); ?></p>
                            <p class="mt-2 text-2xl font-black text-[#141217]"><?php esc_html_e('Download & Print', 'dawp'); ?></p>
                        </div>

                        <div class="rounded-2xl bg-white p-6 shadow-sm">
                            <p class="text-xs font-black uppercase tracking-[0.18em] text-[#7C3AED]"><?php esc_html_e('Restocking Fee', 'dawp'); ?></p>
                            <p class="mt-2 text-2xl font-black text-[#141217]"><?php esc_html_e('No Cost', 'dawp'); ?></p>
                        </div>
                    </div>

                    <p class="mt-6 text-base leading-8 text-[#5E5363]">
                        <?php esc_html_e('Customers are responsible for return label and return shipping costs unless our support team confirms that a different remedy applies to a defective, damaged, or incorrect item case.', 'dawp'); ?>
                    </p>
                </section>

                <section id="refunds" class="rounded-3xl border border-[#EEE5EF] bg-white p-7 shadow-sm lg:p-10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]">
                        <?php esc_html_e('Refund Processing', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black leading-tight text-[#141217]">
                        <?php esc_html_e('Approved Refunds Are Processed Within 10 Days', 'dawp'); ?>
                    </h2>

                    <div class="mt-6 space-y-5 text-base leading-8 text-[#5E5363]">
                        <p>
                            <?php esc_html_e('After your returned item is received, we inspect it against the return eligibility requirements. We will notify you once the return is approved or declined.', 'dawp'); ?>
                        </p>
                        <p>
                            <?php esc_html_e('Approved refunds are processed to the original payment method within 10 days. Your bank, card issuer, or payment provider may take additional time to post the refund to your account.', 'dawp'); ?>
                        </p>
                    </div>
                </section>

                <section id="support" class="overflow-hidden rounded-3xl bg-[#141217] text-white shadow-xl shadow-[#141217]/10">
                    <div class="p-7 lg:p-10">
                        <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#FF4FB8]">
                            <?php esc_html_e('Need Help?', 'dawp'); ?>
                        </p>

                        <h2 class="font-heading text-4xl font-black leading-tight lg:text-5xl">
                            <?php esc_html_e('Contact Us Before Sending A Return.', 'dawp'); ?>
                        </h2>

                        <p class="mt-5 max-w-3xl text-base leading-8 text-white/80">
                            <?php esc_html_e('Before mailing a return, contact our support team with your order number and the reason for the request. For defective, damaged, or incorrect items, include clear photos so we can review the issue quickly.', 'dawp'); ?>
                        </p>

                        <div class="mt-8 flex flex-wrap gap-4">
                            <a href="<?php echo esc_url(home_url('/contact-us/')); ?>"
                               class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#E6007E] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#7C3AED]">
                                <?php esc_html_e('Contact Support', 'dawp'); ?>
                            </a>

                            <a href="mailto:support@houseofshoesonline.com"
                               class="inline-flex min-h-12 items-center justify-center rounded-full border border-white/25 px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-[#141217]">
                                <?php esc_html_e('Email Us', 'dawp'); ?>
                            </a>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </section>

</main>
