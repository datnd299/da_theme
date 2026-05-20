<?php
/**
 * Template Part: page-shipping-returns
 */
?>

<div id="primary" class="bg-[#F4F6F8] font-body text-[#111827]">
    <section class="bg-[#0B1F33] py-14 text-white lg:py-20">
        <div class="mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
            <p class="text-sm font-black uppercase tracking-[0.18em] text-[#F97316]"><?php esc_html_e('Tizezap Customer Care', 'dawp'); ?></p>
            <h1 class="mt-3 font-heading text-4xl font-black leading-tight lg:text-6xl">
                <?php esc_html_e('Shipping & Returns', 'dawp'); ?>
            </h1>
            <p class="mx-auto mt-4 max-w-3xl text-lg leading-8 text-[#D7DEE8]">
                <?php esc_html_e('Clear delivery, return, exchange, and refund terms for tires purchased from Tizezap.', 'dawp'); ?>
            </p>
            <p class="mt-3 text-sm font-semibold uppercase tracking-wide text-[#B8C3D1]">
                <?php esc_html_e('Last Updated: May 19, 2026', 'dawp'); ?>
            </p>
        </div>
    </section>

    <section class="py-14 lg:py-20">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4 lg:gap-6">
                <div class="rounded-lg border border-[#E5E7EB] border-t-4 border-t-[#2563EB] bg-white p-6 shadow-sm">
                    <p class="text-sm font-bold uppercase tracking-wide text-[#5B6472]"><?php esc_html_e('Processing', 'dawp'); ?></p>
                    <p class="mt-3 font-heading text-2xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('2-4 Business Days', 'dawp'); ?></p>
                </div>
                <div class="rounded-lg border border-[#E5E7EB] border-t-4 border-t-[#2563EB] bg-white p-6 shadow-sm">
                    <p class="text-sm font-bold uppercase tracking-wide text-[#5B6472]"><?php esc_html_e('US Transit', 'dawp'); ?></p>
                    <p class="mt-3 font-heading text-2xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('5-10 Business Days', 'dawp'); ?></p>
                </div>
                <div class="rounded-lg border border-[#E5E7EB] border-t-4 border-t-[#F97316] bg-white p-6 shadow-sm">
                    <p class="text-sm font-bold uppercase tracking-wide text-[#5B6472]"><?php esc_html_e('Returns', 'dawp'); ?></p>
                    <p class="mt-3 font-heading text-2xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('30-Day Window', 'dawp'); ?></p>
                </div>
                <div class="rounded-lg border border-[#E5E7EB] border-t-4 border-t-[#111827] bg-white p-6 shadow-sm">
                    <p class="text-sm font-bold uppercase tracking-wide text-[#5B6472]"><?php esc_html_e('Support', 'dawp'); ?></p>
                    <p class="mt-3 font-heading text-2xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('1-2 Business Days', 'dawp'); ?></p>
                </div>
            </div>

            <div class="mt-12 grid gap-10 lg:mt-14 lg:grid-cols-[240px_minmax(0,1fr)] lg:items-start lg:gap-10">
                <aside class="rounded-lg border border-[#E5E7EB] bg-white p-5 shadow-sm lg:sticky lg:top-24">
                    <p class="text-xs font-black uppercase tracking-[0.16em] text-[#5B6472]"><?php esc_html_e('Policy Sections', 'dawp'); ?></p>
                    <nav class="mt-5 space-y-3" aria-label="<?php esc_attr_e('Shipping and returns policy sections', 'dawp'); ?>">
                        <a class="block rounded-md border border-transparent px-4 py-3 text-sm font-bold leading-5 text-[#111827] transition hover:border-[#2563EB] hover:bg-[#EFF6FF]" href="#shipping-policy"><?php esc_html_e('Shipping Policy', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-4 py-3 text-sm font-bold leading-5 text-[#111827] transition hover:border-[#2563EB] hover:bg-[#EFF6FF]" href="#tracking-address"><?php esc_html_e('Tracking & Address', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-4 py-3 text-sm font-bold leading-5 text-[#111827] transition hover:border-[#F97316] hover:bg-[#FFF7ED]" href="#return-policy"><?php esc_html_e('Return Eligibility', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-4 py-3 text-sm font-bold leading-5 text-[#111827] transition hover:border-[#F97316] hover:bg-[#FFF7ED]" href="#return-process"><?php esc_html_e('Return Process', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-4 py-3 text-sm font-bold leading-5 text-[#111827] transition hover:border-[#111827] hover:bg-[#F4F6F8]" href="#refunds-support"><?php esc_html_e('Refunds & Support', 'dawp'); ?></a>
                    </nav>
                </aside>

                <div class="space-y-10">
                    <article id="shipping-policy" class="scroll-mt-24 rounded-lg border border-[#E5E7EB] bg-white p-5 shadow-sm sm:p-7 lg:p-10">
                        <div class="mb-6 inline-flex h-12 w-12 items-center justify-center rounded-full bg-[#2563EB] text-white">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h11v8H3zM14 10h4l3 3v2h-7zM7 19a2 2 0 100-4 2 2 0 000 4zM18 19a2 2 0 100-4 2 2 0 000 4z" />
                            </svg>
                        </div>
                        <h2 class="font-heading text-3xl font-black leading-tight text-[#0B1F33]"><?php esc_html_e('Shipping Policy', 'dawp'); ?></h2>
                        <div class="mt-6 max-w-none text-base leading-7 text-[#4B5563] [&_h3+div]:mt-5 [&_h3+p]:mt-5 [&_li]:leading-7 [&_p+p]:mt-4">
                            <p class="rounded-lg border border-[#BFDBFE] bg-[#EFF6FF] p-5 font-medium leading-7 text-[#111827]"><?php esc_html_e('This policy applies to eligible tire products purchased directly from Tizezap. We review each order for payment confirmation, product availability, shipping details, and tire specifications before fulfillment begins.', 'dawp'); ?></p>

                            <h3 class="mt-10 rounded-md border-l-4 border-[#2563EB] bg-[#EFF6FF] px-5 py-4 text-xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('Shipping Timeline', 'dawp'); ?></h3>
                            <p><?php esc_html_e('Most orders are processed within 2-4 business days after payment is confirmed. After dispatch, standard delivery within the United States typically takes 5-10 business days depending on destination, product availability, tire size, carrier conditions, and delivery location. Business days are Monday through Friday, excluding U.S. public holidays and carrier holidays.', 'dawp'); ?></p>
                            <div class="mt-5 overflow-x-auto rounded-lg border border-[#E5E7EB]">
                                <table class="w-full min-w-[560px] table-fixed text-left text-sm leading-6 md:min-w-0">
                                    <thead class="bg-[#F4F6F8] text-[#0B1F33]">
                                        <tr>
                                            <th class="w-[22%] px-4 py-4 font-bold"><?php esc_html_e('Destination', 'dawp'); ?></th>
                                            <th class="w-[23%] px-4 py-4 font-bold"><?php esc_html_e('Processing Time', 'dawp'); ?></th>
                                            <th class="w-[23%] px-4 py-4 font-bold"><?php esc_html_e('Transit Time', 'dawp'); ?></th>
                                            <th class="w-[32%] px-4 py-4 font-bold"><?php esc_html_e('Shipping Cost', 'dawp'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-[#E5E7EB]">
                                        <tr>
                                            <td class="px-4 py-4 align-top"><?php esc_html_e('United States', 'dawp'); ?></td>
                                            <td class="px-4 py-4 align-top"><?php esc_html_e('2-4 business days', 'dawp'); ?></td>
                                            <td class="px-4 py-4 align-top"><?php esc_html_e('5-10 business days', 'dawp'); ?></td>
                                            <td class="px-4 py-4 align-top"><?php esc_html_e('Shown at checkout before payment', 'dawp'); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <p><?php esc_html_e('Available shipping methods, shipping charges, estimated delivery information, taxes, and applicable fees are shown during checkout before you place your order. Delivery estimates are not guarantees because carrier capacity, weather, address issues, large-item handling, peak seasons, and local delivery conditions may affect final timing.', 'dawp'); ?></p>

                            <h3 class="mt-10 rounded-md border-l-4 border-[#F97316] bg-[#FFF7ED] px-5 py-4 text-xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('Tire Fitment Reminder', 'dawp'); ?></h3>
                            <p><?php esc_html_e('Please confirm your tire size, rim size, load index, speed rating, vehicle compatibility, and quantity before placing an order. Tizezap provides product details to support practical tire shopping, but customers are responsible for confirming that the selected tire is appropriate for their vehicle and intended use.', 'dawp'); ?></p>

                            <h3 id="tracking-address" class="scroll-mt-24 mt-10 rounded-md border-l-4 border-[#2563EB] bg-[#EFF6FF] px-5 py-4 text-xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('Order Tracking and Address Accuracy', 'dawp'); ?></h3>
                            <p><?php esc_html_e('When your order ships, we send a shipping confirmation email with tracking details when tracking is available. Tracking may take 24-48 hours to update after the carrier receives the shipment.', 'dawp'); ?></p>
                            <ul class="mt-5 list-disc space-y-3 pl-6">
                                <li><?php esc_html_e('Customers are responsible for entering a complete and accurate shipping address, including recipient name, street address, unit number, city, state, ZIP code, phone number, and email address.', 'dawp'); ?></li>
                                <li><?php esc_html_e('Address changes can only be reviewed before an order has entered fulfillment or shipped.', 'dawp'); ?></li>
                                <li><?php esc_html_e('Once a package has shipped, rerouting, cancellation, or address correction is not guaranteed.', 'dawp'); ?></li>
                                <li><?php esc_html_e('If an order is returned because of an incomplete or incorrect address, we may offer reshipment at the customer\'s cost or refund eligible item amounts minus non-refundable shipping costs when applicable.', 'dawp'); ?></li>
                            </ul>

                            <h3 class="mt-10 rounded-md border-l-4 border-[#2563EB] bg-[#EFF6FF] px-5 py-4 text-xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('Lost, Delayed, or Delivered Packages', 'dawp'); ?></h3>
                            <p><?php esc_html_e('If tracking shows delayed movement or the estimated delivery window has passed, contact us with your order number and tracking number so we can review the shipment history. If tracking shows delivery but you cannot locate the package, please check the delivery area, building office, mailroom, household members, neighbors, and local carrier office first.', 'dawp'); ?></p>
                            <p><?php esc_html_e('If the carrier confirms a package was lost before delivery and the shipping address was correct, we will review the claim and may offer a replacement, store credit, or refund depending on product availability and claim outcome. If tracking confirms delivery to the address provided at checkout, Tizezap is not responsible for theft or loss after delivery, but we will help collect shipment details for a carrier claim when possible.', 'dawp'); ?></p>
                        </div>
                    </article>

                    <article id="return-policy" class="scroll-mt-24 rounded-lg border border-[#E5E7EB] bg-white p-5 shadow-sm sm:p-7 lg:p-10">
                        <div class="mb-6 inline-flex h-12 w-12 items-center justify-center rounded-full bg-[#F97316] text-white">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v6h6M20 20v-6h-6M5 15a7 7 0 0011.7 3.2M19 9A7 7 0 007.3 5.8" />
                            </svg>
                        </div>
                        <h2 class="font-heading text-3xl font-black leading-tight text-[#0B1F33]"><?php esc_html_e('Return Policy', 'dawp'); ?></h2>
                        <div class="mt-6 max-w-none text-base leading-7 text-[#4B5563] [&_h3+ol]:mt-5 [&_h3+p]:mt-5 [&_h3+ul]:mt-5 [&_li]:leading-7 [&_p+p]:mt-4">
                            <p class="rounded-lg border border-[#FED7AA] bg-[#FFF7ED] p-5 font-medium leading-7 text-[#111827]"><?php esc_html_e('You may request a return within 30 days of delivery for eligible tires purchased directly from Tizezap. Return approval depends on product condition, order details, tire fitment information, and whether the item can be safely resold.', 'dawp'); ?></p>

                            <h3 class="mt-10 rounded-md border-l-4 border-[#F97316] bg-[#FFF7ED] px-5 py-4 text-xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('Eligible Tire Returns', 'dawp'); ?></h3>
                            <ul class="mt-5 list-disc space-y-3 pl-6">
                                <li><?php esc_html_e('The return request is submitted within 30 days of the delivery date.', 'dawp'); ?></li>
                                <li><?php esc_html_e('The tire is unused, unmounted, undriven, undamaged, and in original condition.', 'dawp'); ?></li>
                                <li><?php esc_html_e('Original labels, packaging, documentation, and included parts are present when applicable.', 'dawp'); ?></li>
                                <li><?php esc_html_e('The item was not marked final sale, clearance, special order, custom, or otherwise non-returnable at the time of purchase.', 'dawp'); ?></li>
                                <li><?php esc_html_e('Proof of purchase is provided, such as your order number or order confirmation email.', 'dawp'); ?></li>
                            </ul>

                            <h3 class="mt-10 rounded-md border-l-4 border-[#F97316] bg-[#FFF7ED] px-5 py-4 text-xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('Non-Returnable Tire Conditions', 'dawp'); ?></h3>
                            <ul class="mt-5 list-disc space-y-3 pl-6">
                                <li><?php esc_html_e('Tires that have been mounted, balanced, installed, driven on, repaired, altered, or used.', 'dawp'); ?></li>
                                <li><?php esc_html_e('Tires damaged by improper handling, incorrect installation, road hazards, misuse, storage issues, or customer-caused wear.', 'dawp'); ?></li>
                                <li><?php esc_html_e('Tires ordered in the wrong size, rim size, load index, speed rating, or specification may be declined if they do not meet return condition requirements.', 'dawp'); ?></li>
                                <li><?php esc_html_e('Items returned after the 30-day return window, missing labels, missing packaging where required, incomplete sets, final sale items, and unauthorized returns.', 'dawp'); ?></li>
                            </ul>

                            <h3 id="return-process" class="scroll-mt-24 mt-10 rounded-md border-l-4 border-[#111827] bg-[#F4F6F8] px-5 py-4 text-xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('Return Process', 'dawp'); ?></h3>
                            <ol class="mt-5 list-decimal space-y-3 pl-6">
                                <li><?php esc_html_e('Email support@tizezap.com within 30 days of delivery. Include your order number, tire model, tire size, quantity, reason for return, and clear photos of the tire condition, labels, packaging, and shipping label.', 'dawp'); ?></li>
                                <li><?php esc_html_e('Wait for return authorization and instructions. Do not send tires back before approval, because unauthorized returns may be refused or returned to sender.', 'dawp'); ?></li>
                                <li><?php esc_html_e('Pack approved returns securely according to the instructions provided. Use a trackable shipping service and keep the carrier receipt.', 'dawp'); ?></li>
                                <li><?php esc_html_e('Customers are responsible for return shipping costs unless the return is caused by our error, such as an incorrect, defective, or damaged item confirmed by support.', 'dawp'); ?></li>
                                <li><?php esc_html_e('After the return is delivered to the address in our instructions, we inspect the item and notify you by email whether the return is approved or declined.', 'dawp'); ?></li>
                            </ol>

                            <h3 class="mt-10 rounded-md border-l-4 border-[#111827] bg-[#F4F6F8] px-5 py-4 text-xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('Damaged, Defective, or Incorrect Tires', 'dawp'); ?></h3>
                            <p><?php esc_html_e('Please inspect your order as soon as it arrives. If you receive a tire that is damaged, defective, missing, or different from what you ordered, contact us within 7 days of delivery with your order number and clear photos of the tire, sidewall details, tread, packaging, and shipping label. Keep all packaging until the issue is reviewed.', 'dawp'); ?></p>

                            <h3 id="refunds-support" class="scroll-mt-24 mt-10 rounded-md border-l-4 border-[#111827] bg-[#F4F6F8] px-5 py-4 text-xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('Refunds, Exchanges, and Support', 'dawp'); ?></h3>
                            <ul class="mt-5 list-disc space-y-3 pl-6">
                                <li><?php esc_html_e('Approved refunds are issued to the original payment method used at checkout.', 'dawp'); ?></li>
                                <li><?php esc_html_e('Refunds are normally processed within 5-10 business days after we receive and approve the returned item. Your bank, card issuer, or payment provider may require additional time to post the credit.', 'dawp'); ?></li>
                                <li><?php esc_html_e('Original shipping charges, return shipping charges, shipping protection fees, and service fees are non-refundable unless the return is due to our confirmed error.', 'dawp'); ?></li>
                                <li><?php esc_html_e('Exchanges are reviewed for incorrect, damaged, or defective tires. If approved and inventory is available, we may offer a replacement for the same item; otherwise, we may offer store credit or a refund.', 'dawp'); ?></li>
                                <li><?php esc_html_e('For shipping, return, exchange, or refund help, email support@tizezap.com with your order number. Our support team typically replies within 1-2 business days, Monday through Friday, excluding holidays.', 'dawp'); ?></li>
                            </ul>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
</div>
