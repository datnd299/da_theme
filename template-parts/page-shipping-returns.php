<?php
/**
 * Template Part: page-shipping-returns
 */

$support_email = 'support@scottosterbind.com';

$policy_cards = [
    [
        'label' => __('Processing', 'dawp'),
        'value' => __('2-4 Business Days', 'dawp'),
    ],
    [
        'label' => __('US Shipping', 'dawp'),
        'value' => __('5-10 Business Days', 'dawp'),
    ],
    [
        'label' => __('Returns', 'dawp'),
        'value' => __('30-Day Window', 'dawp'),
    ],
    [
        'label' => __('Support', 'dawp'),
        'value' => __('Mon-Fri, 9 AM-6 PM EST', 'dawp'),
    ],
];
?>

<div id="primary" class="bg-[#F7F5EF] font-body text-[#1F2937]">
    <section class="bg-[#1B4F49] py-14 text-white lg:py-20">
        <div class="mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
            <p class="text-sm font-black uppercase tracking-[0.18em] text-[#C89B3C]"><?php esc_html_e('Scott Osterbind Customer Care', 'dawp'); ?></p>
            <h1 class="mt-3 font-heading text-4xl font-black leading-tight lg:text-6xl">
                <?php esc_html_e('Shipping & Returns', 'dawp'); ?>
            </h1>
            <p class="mx-auto mt-4 max-w-3xl text-lg leading-8 text-[#FAF6EA]">
                <?php esc_html_e('Clear shipping, delivery, return, exchange, and refund information for handmade jewelry, vintage-inspired accessories, curated apparel, and artisan gifts.', 'dawp'); ?>
            </p>
            <p class="mt-3 text-sm font-semibold uppercase tracking-wide text-[#E8D9A6]">
                <?php esc_html_e('Last Updated: May 20, 2026', 'dawp'); ?>
            </p>
        </div>
    </section>

    <section class="py-14 lg:py-20">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <?php foreach ($policy_cards as $card) : ?>
                    <div class="rounded-lg border border-[#E8D9A6] border-t-4 border-t-[#C89B3C] bg-white p-6 shadow-sm">
                        <p class="text-sm font-bold uppercase tracking-wide text-[#6E9B8E]"><?php echo esc_html($card['label']); ?></p>
                        <p class="mt-3 font-heading text-2xl font-black leading-snug text-[#1F6F68]"><?php echo esc_html($card['value']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="mt-12 grid gap-10 lg:grid-cols-[240px_minmax(0,1fr)] lg:items-start">
                <aside class="rounded-lg border border-[#E8D9A6] bg-white p-5 shadow-sm lg:sticky lg:top-24">
                    <p class="text-xs font-black uppercase tracking-[0.16em] text-[#C89B3C]"><?php esc_html_e('Policy Sections', 'dawp'); ?></p>
                    <nav class="mt-5 space-y-3" aria-label="<?php esc_attr_e('Shipping and returns policy sections', 'dawp'); ?>">
                        <a class="block rounded-md border border-transparent px-4 py-3 text-sm font-bold leading-5 text-[#1F2937] transition hover:border-[#C89B3C] hover:bg-[#F7F5EF]" href="#shipping-policy"><?php esc_html_e('Shipping Policy', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-4 py-3 text-sm font-bold leading-5 text-[#1F2937] transition hover:border-[#C89B3C] hover:bg-[#F7F5EF]" href="#tracking-address"><?php esc_html_e('Tracking & Address', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-4 py-3 text-sm font-bold leading-5 text-[#1F2937] transition hover:border-[#6E9B8E] hover:bg-[#F7F5EF]" href="#return-policy"><?php esc_html_e('Return Eligibility', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-4 py-3 text-sm font-bold leading-5 text-[#1F2937] transition hover:border-[#6E9B8E] hover:bg-[#F7F5EF]" href="#return-process"><?php esc_html_e('Return Process', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-4 py-3 text-sm font-bold leading-5 text-[#1F2937] transition hover:border-[#C89B3C] hover:bg-[#F7F5EF]" href="#refunds-support"><?php esc_html_e('Refunds & Support', 'dawp'); ?></a>
                    </nav>
                </aside>

                <div class="space-y-10">
                    <article id="shipping-policy" class="scroll-mt-24 rounded-lg border border-[#E8D9A6] bg-white p-5 shadow-sm sm:p-7 lg:p-10">
                        <h2 class="font-heading text-3xl font-black leading-tight text-[#1F6F68]"><?php esc_html_e('Shipping Policy', 'dawp'); ?></h2>
                        <div class="mt-6 max-w-none text-base leading-7 text-[#475569] [&_h3+div]:mt-5 [&_h3+p]:mt-5 [&_li]:leading-7 [&_p+p]:mt-4">
                            <p class="rounded-lg border border-[#C89B3C]/60 bg-[#F7F5EF] p-5 font-medium leading-7 text-[#1F6F68]"><?php esc_html_e('This policy applies to eligible products purchased directly from Scott Osterbind. We review each order for payment confirmation, product availability, shipping details, and item condition before fulfillment begins.', 'dawp'); ?></p>

                            <h3 class="mt-10 rounded-md border-l-4 border-[#C89B3C] bg-[#F7F5EF] px-5 py-4 text-xl font-black leading-snug text-[#1F6F68]"><?php esc_html_e('Shipping Timeline', 'dawp'); ?></h3>
                            <p><?php esc_html_e('Most orders are processed within 2-4 business days after payment is confirmed. After dispatch, standard delivery within the United States typically takes 5-10 business days depending on destination, carrier conditions, and local delivery volume. Business days are Monday through Friday, excluding U.S. public holidays and carrier holidays.', 'dawp'); ?></p>
                            <div class="mt-5 overflow-x-auto rounded-lg border border-[#E8D9A6]">
                                <table class="w-full min-w-[560px] table-fixed text-left text-sm leading-6 md:min-w-0">
                                    <thead class="bg-[#F7F5EF] text-[#1F6F68]">
                                        <tr>
                                            <th class="w-[24%] px-4 py-4 font-bold"><?php esc_html_e('Destination', 'dawp'); ?></th>
                                            <th class="w-[24%] px-4 py-4 font-bold"><?php esc_html_e('Processing Time', 'dawp'); ?></th>
                                            <th class="w-[24%] px-4 py-4 font-bold"><?php esc_html_e('Transit Time', 'dawp'); ?></th>
                                            <th class="w-[28%] px-4 py-4 font-bold"><?php esc_html_e('Shipping Cost', 'dawp'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-[#E8D9A6]">
                                        <tr>
                                            <td class="px-4 py-4 align-top"><?php esc_html_e('United States', 'dawp'); ?></td>
                                            <td class="px-4 py-4 align-top"><?php esc_html_e('2-4 business days', 'dawp'); ?></td>
                                            <td class="px-4 py-4 align-top"><?php esc_html_e('5-10 business days', 'dawp'); ?></td>
                                            <td class="px-4 py-4 align-top"><?php esc_html_e('Shown at checkout before payment', 'dawp'); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <p><?php esc_html_e('Available shipping methods, shipping charges, estimated delivery information, taxes, and applicable fees are shown during checkout before you place your order. Delivery estimates are not guarantees because carrier capacity, weather, address issues, peak seasons, and local delivery conditions may affect final timing.', 'dawp'); ?></p>

                            <h3 id="tracking-address" class="scroll-mt-24 mt-10 rounded-md border-l-4 border-[#C89B3C] bg-[#F7F5EF] px-5 py-4 text-xl font-black leading-snug text-[#1F6F68]"><?php esc_html_e('Order Tracking and Address Accuracy', 'dawp'); ?></h3>
                            <p><?php esc_html_e('When your order ships, we send a shipping confirmation email with tracking details when tracking is available. Tracking may take 24-48 hours to update after the carrier receives the package.', 'dawp'); ?></p>
                            <ul class="mt-5 list-disc space-y-3 pl-6">
                                <li><?php esc_html_e('Customers are responsible for entering a complete and accurate shipping address, including recipient name, street address, unit number, city, state, ZIP code, phone number, and email address.', 'dawp'); ?></li>
                                <li><?php esc_html_e('Address changes can only be reviewed before an order has entered fulfillment or shipped.', 'dawp'); ?></li>
                                <li><?php esc_html_e('Once a package has shipped, rerouting, cancellation, or address correction is not guaranteed.', 'dawp'); ?></li>
                                <li><?php esc_html_e('If an order is returned because of an incomplete or incorrect address, we may offer reshipment at the customer\'s cost or refund eligible item amounts minus non-refundable shipping costs when applicable.', 'dawp'); ?></li>
                            </ul>

                            <h3 class="mt-10 rounded-md border-l-4 border-[#C89B3C] bg-[#F7F5EF] px-5 py-4 text-xl font-black leading-snug text-[#1F6F68]"><?php esc_html_e('Lost, Delayed, or Delivered Packages', 'dawp'); ?></h3>
                            <p><?php esc_html_e('If tracking shows delayed movement or the estimated delivery window has passed, contact us with your order number and tracking number so we can review the shipment history. If tracking shows delivery but you cannot locate the package, please check the delivery area, building office, mailroom, household members, neighbors, and local carrier office first.', 'dawp'); ?></p>
                            <p><?php esc_html_e('If the carrier confirms a package was lost before delivery and the shipping address was correct, we will review the claim and may offer a replacement, store credit, or refund depending on product availability and claim outcome. If tracking confirms delivery to the address provided at checkout, Scott Osterbind is not responsible for theft or loss after delivery, but we will help collect shipment details for a carrier claim when possible.', 'dawp'); ?></p>
                        </div>
                    </article>

                    <article id="return-policy" class="scroll-mt-24 rounded-lg border border-[#E8D9A6] bg-white p-5 shadow-sm sm:p-7 lg:p-10">
                        <h2 class="font-heading text-3xl font-black leading-tight text-[#1F6F68]"><?php esc_html_e('Return Policy', 'dawp'); ?></h2>
                        <div class="mt-6 max-w-none text-base leading-7 text-[#475569] [&_h3+ol]:mt-5 [&_h3+p]:mt-5 [&_h3+ul]:mt-5 [&_li]:leading-7 [&_p+p]:mt-4">
                            <p class="rounded-lg border border-[#C89B3C]/60 bg-[#F7F5EF] p-5 font-medium leading-7 text-[#1F6F68]"><?php esc_html_e('You may request a return within 30 days of delivery for eligible items purchased directly from Scott Osterbind. Return approval depends on product condition, order details, and whether the item can be resold safely and honestly.', 'dawp'); ?></p>

                            <h3 class="mt-10 rounded-md border-l-4 border-[#6E9B8E] bg-[#F7F5EF] px-5 py-4 text-xl font-black leading-snug text-[#1F6F68]"><?php esc_html_e('Eligible Returns', 'dawp'); ?></h3>
                            <ul class="mt-5 list-disc space-y-3 pl-6">
                                <li><?php esc_html_e('The return request is submitted within 30 days of the delivery date.', 'dawp'); ?></li>
                                <li><?php esc_html_e('The item is unused, unworn, undamaged, and in original condition.', 'dawp'); ?></li>
                                <li><?php esc_html_e('Original packaging, tags, product cards, accessories, and included parts are present when applicable.', 'dawp'); ?></li>
                                <li><?php esc_html_e('Proof of purchase is provided, such as your order number or order confirmation email.', 'dawp'); ?></li>
                            </ul>

                            <h3 class="mt-10 rounded-md border-l-4 border-[#6E9B8E] bg-[#F7F5EF] px-5 py-4 text-xl font-black leading-snug text-[#1F6F68]"><?php esc_html_e('Items That May Not Be Returnable', 'dawp'); ?></h3>
                            <ul class="mt-5 list-disc space-y-3 pl-6">
                                <li><?php esc_html_e('Items that have been worn, washed, altered, damaged, stained, scented, or used.', 'dawp'); ?></li>
                                <li><?php esc_html_e('Personalized, custom-made, final sale, clearance, gift card, or otherwise non-returnable items when clearly marked at purchase.', 'dawp'); ?></li>
                                <li><?php esc_html_e('Items missing original packaging, product cards, tags, accessories, or included parts where applicable.', 'dawp'); ?></li>
                                <li><?php esc_html_e('Returns sent after the 30-day return window or sent without return authorization.', 'dawp'); ?></li>
                            </ul>

                            <h3 id="return-process" class="scroll-mt-24 mt-10 rounded-md border-l-4 border-[#C89B3C] bg-[#F7F5EF] px-5 py-4 text-xl font-black leading-snug text-[#1F6F68]"><?php esc_html_e('Return Process', 'dawp'); ?></h3>
                            <ol class="mt-5 list-decimal space-y-3 pl-6">
                                <li><?php printf(esc_html__('Email %s within 30 days of delivery. Include your order number, item name, reason for return, and clear photos showing the item condition and packaging.', 'dawp'), esc_html($support_email)); ?></li>
                                <li><?php esc_html_e('Wait for return authorization and instructions before shipping anything back. Unauthorized returns may be refused or returned to sender.', 'dawp'); ?></li>
                                <li><?php esc_html_e('Pack approved returns securely. Handmade jewelry and small accessories should be protected from bending, tangling, moisture, and impact during transit.', 'dawp'); ?></li>
                                <li><?php esc_html_e('Use a trackable shipping service and keep the carrier receipt until the return is fully resolved.', 'dawp'); ?></li>
                                <li><?php esc_html_e('After the return is delivered to the address in our instructions, we inspect the item and notify you by email whether the return is approved or declined.', 'dawp'); ?></li>
                            </ol>

                            <h3 class="mt-10 rounded-md border-l-4 border-[#C89B3C] bg-[#F7F5EF] px-5 py-4 text-xl font-black leading-snug text-[#1F6F68]"><?php esc_html_e('Damaged, Defective, or Incorrect Items', 'dawp'); ?></h3>
                            <p><?php esc_html_e('Please inspect your order as soon as it arrives. If you receive an item that is damaged, defective, missing, or different from what you ordered, contact us within 7 days of delivery with your order number and clear photos of the item, packaging, and shipping label. Keep all packaging until the issue is reviewed.', 'dawp'); ?></p>

                            <h3 id="refunds-support" class="scroll-mt-24 mt-10 rounded-md border-l-4 border-[#C89B3C] bg-[#F7F5EF] px-5 py-4 text-xl font-black leading-snug text-[#1F6F68]"><?php esc_html_e('Refunds, Exchanges, and Support', 'dawp'); ?></h3>
                            <ul class="mt-5 list-disc space-y-3 pl-6">
                                <li><?php esc_html_e('Approved refunds are issued to the original payment method used at checkout.', 'dawp'); ?></li>
                                <li><?php esc_html_e('Refunds are normally processed within 5-10 business days after we receive and approve the returned item. Your bank, card issuer, or payment provider may require additional time to post the credit.', 'dawp'); ?></li>
                                <li><?php esc_html_e('Original shipping charges, return shipping charges, shipping protection fees, and service fees are non-refundable unless the return is due to our confirmed error.', 'dawp'); ?></li>
                                <li><?php esc_html_e('Exchanges are reviewed for incorrect, damaged, or defective items. If approved and inventory is available, we may offer a replacement for the same item; otherwise, we may offer store credit or a refund.', 'dawp'); ?></li>
                                <li><?php printf(esc_html__('For shipping, return, exchange, or refund help, email %s with your order number. Our support team typically replies during business hours, Monday through Friday, excluding holidays.', 'dawp'), esc_html($support_email)); ?></li>
                            </ul>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
</div>
