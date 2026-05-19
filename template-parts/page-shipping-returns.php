<?php
/**
 * Template Part: page-shipping-returns
 */
?>

<div id="primary" class="bg-[#FBFCFA] font-body text-[#2D2633]">
    <!-- Hero -->
    <section class="bg-[#EAF7F0] py-14 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="font-heading text-4xl font-black leading-tight text-[#2D2633] lg:text-6xl">
                <?php esc_html_e('Shipping & Returns', 'dawp'); ?>
            </h1>
            <p class="mt-4 max-w-3xl mx-auto text-lg leading-8 text-[#6B6470]">
                <?php esc_html_e('Clear shipping, return, exchange, and refund information for beauty, grooming, and personal care products purchased from One Shop Vibe.', 'dawp'); ?>
            </p>
            <p class="mt-3 text-sm font-semibold uppercase tracking-wide text-[#6B6470]">
                <?php esc_html_e('Last Updated: May 19, 2026', 'dawp'); ?>
            </p>
        </div>
    </section>

    <section class="py-12 lg:py-16">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <div class="rounded-lg border border-[#E5E7EB] border-t-4 border-t-[#F7C948] bg-white p-5 shadow-sm">
                    <p class="text-sm font-bold uppercase tracking-wide text-[#6B6470]"><?php esc_html_e('Processing', 'dawp'); ?></p>
                    <p class="mt-2 font-heading text-2xl font-black text-[#2D2633]"><?php esc_html_e('2-4 Business Days', 'dawp'); ?></p>
                </div>
                <div class="rounded-lg border border-[#E5E7EB] border-t-4 border-t-[#9CCFB5] bg-white p-5 shadow-sm">
                    <p class="text-sm font-bold uppercase tracking-wide text-[#6B6470]"><?php esc_html_e('Transit', 'dawp'); ?></p>
                    <p class="mt-2 font-heading text-2xl font-black text-[#2D2633]"><?php esc_html_e('5-10 Business Days', 'dawp'); ?></p>
                </div>
                <div class="rounded-lg border border-[#E5E7EB] border-t-4 border-t-[#DCD5FF] bg-white p-5 shadow-sm">
                    <p class="text-sm font-bold uppercase tracking-wide text-[#6B6470]"><?php esc_html_e('Returns', 'dawp'); ?></p>
                    <p class="mt-2 font-heading text-2xl font-black text-[#2D2633]"><?php esc_html_e('30-Day Window', 'dawp'); ?></p>
                </div>
                <div class="rounded-lg border border-[#E5E7EB] border-t-4 border-t-[#F3A6A0] bg-white p-5 shadow-sm">
                    <p class="text-sm font-bold uppercase tracking-wide text-[#6B6470]"><?php esc_html_e('Support', 'dawp'); ?></p>
                    <p class="mt-2 font-heading text-2xl font-black text-[#2D2633]"><?php esc_html_e('1-2 Business Days', 'dawp'); ?></p>
                </div>
            </div>

            <div class="mt-10 grid gap-8 lg:grid-cols-[250px_minmax(0,1fr)] lg:items-start">
                <aside class="rounded-lg border border-[#E5E7EB] bg-white p-4 shadow-sm lg:sticky lg:top-24">
                    <p class="text-xs font-black uppercase tracking-[0.16em] text-[#6B6470]"><?php esc_html_e('Policy Sections', 'dawp'); ?></p>
                    <nav class="mt-4 space-y-2" aria-label="<?php esc_attr_e('Shipping and returns policy sections', 'dawp'); ?>">
                        <a class="block rounded-md border border-transparent px-3 py-2 text-sm font-bold text-[#2D2633] transition hover:border-[#D7E9DF] hover:bg-[#F1FAF5]" href="#shipping-policy"><?php esc_html_e('Shipping Policy', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-3 py-2 text-sm font-bold text-[#2D2633] transition hover:border-[#D7E9DF] hover:bg-[#F1FAF5]" href="#shipping-address"><?php esc_html_e('Address & Tracking', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-3 py-2 text-sm font-bold text-[#2D2633] transition hover:border-[#E5E0FF] hover:bg-[#F5F3FF]" href="#return-policy"><?php esc_html_e('Return Policy', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-3 py-2 text-sm font-bold text-[#2D2633] transition hover:border-[#E5E0FF] hover:bg-[#F5F3FF]" href="#return-process"><?php esc_html_e('Return Process', 'dawp'); ?></a>
                        <a class="block rounded-md border border-transparent px-3 py-2 text-sm font-bold text-[#2D2633] transition hover:border-[#F7D8D5] hover:bg-[#FFF5F4]" href="#refunds"><?php esc_html_e('Refunds & Support', 'dawp'); ?></a>
                    </nav>
                </aside>

                <div class="space-y-8">
                <!-- Shipping -->
                <div id="shipping-policy" class="scroll-mt-24 rounded-lg border border-[#E5E7EB] bg-white p-6 shadow-sm sm:p-8">
                    <div class="mb-5 inline-flex h-12 w-12 items-center justify-center rounded-full bg-[#F7C948]">
                        <svg class="h-6 w-6 text-[#2D2633]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                        </svg>
                    </div>
                    <h2 class="font-heading text-3xl font-black text-[#2D2633] mb-4">
                        <?php esc_html_e('Shipping Policy', 'dawp'); ?>
                    </h2>
                    <div class="max-w-none text-base leading-8 text-[#6B6470] [&_li]:leading-7 [&_p+p]:mt-4">
                        <p class="rounded-lg border border-[#D7E9DF] bg-[#F1FAF5] p-4 font-medium text-[#2D2633]"><?php esc_html_e('This shipping policy applies to eligible products purchased directly from One Shop Vibe. We process each order through our own order review, packing, and handoff workflow so that beauty, grooming, and personal care items are checked before they leave our fulfillment process.', 'dawp'); ?></p>

                        <h3 class="mt-8 mb-4 rounded-md border-l-4 border-[#F7C948] bg-[#FFF9E6] px-4 py-3 text-xl font-black text-[#2D2633]"><?php esc_html_e('Shipping Information', 'dawp'); ?></h3>
                        <p><?php esc_html_e('Most orders are reviewed and prepared within 2-4 business days after payment is confirmed. Standard delivery within the United States normally takes 5-10 business days after the package is handed to the carrier. Business days are Monday through Friday, excluding U.S. public holidays and carrier holidays.', 'dawp'); ?></p>
                        <div class="mt-4 overflow-hidden rounded-lg border border-[#E5E7EB]">
                            <table class="w-full text-left text-sm">
                                <thead class="bg-[#F6F7F9] text-[#2D2633]">
                                    <tr>
                                        <th class="px-4 py-3 font-bold"><?php esc_html_e('Destination', 'dawp'); ?></th>
                                        <th class="px-4 py-3 font-bold"><?php esc_html_e('Processing Time', 'dawp'); ?></th>
                                        <th class="px-4 py-3 font-bold"><?php esc_html_e('Transit Time', 'dawp'); ?></th>
                                        <th class="px-4 py-3 font-bold"><?php esc_html_e('Shipping Cost', 'dawp'); ?></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-[#E5E7EB]">
                                    <tr>
                                        <td class="px-4 py-3"><?php esc_html_e('United States', 'dawp'); ?></td>
                                        <td class="px-4 py-3"><?php esc_html_e('2-4 business days', 'dawp'); ?></td>
                                        <td class="px-4 py-3"><?php esc_html_e('5-10 business days', 'dawp'); ?></td>
                                        <td class="px-4 py-3"><?php esc_html_e('Shown at checkout before payment', 'dawp'); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <p class="mt-4"><?php esc_html_e('Shipping rates, available shipping methods, taxes, and estimated delivery information are displayed during checkout before you place your order. Delivery estimates are not guarantees because carrier capacity, weather, address issues, security checks, peak seasons, and local delivery conditions may affect final delivery timing.', 'dawp'); ?></p>

                        <h3 class="mt-8 mb-4 rounded-md border-l-4 border-[#F7C948] bg-[#FFF9E6] px-4 py-3 text-xl font-black text-[#2D2633]"><?php esc_html_e('Order Review and Packing', 'dawp'); ?></h3>
                        <ul class="list-disc pl-5 space-y-2">
                            <li><?php esc_html_e('Orders are checked for payment confirmation, product availability, and shipping details before fulfillment begins.', 'dawp'); ?></li>
                            <li><?php esc_html_e('Items are packed according to product type so bottles, tools, accessories, and boxed personal care items are protected during normal carrier handling.', 'dawp'); ?></li>
                            <li><?php esc_html_e('If an item becomes unavailable or requires additional review, we may contact you before dispatching the order or issue a refund for the unavailable item.', 'dawp'); ?></li>
                            <li><?php esc_html_e('Orders placed on weekends or holidays begin processing on the next business day.', 'dawp'); ?></li>
                        </ul>

                        <h3 id="shipping-address" class="scroll-mt-24 mt-8 mb-4 rounded-md border-l-4 border-[#9CCFB5] bg-[#F1FAF5] px-4 py-3 text-xl font-black text-[#2D2633]"><?php esc_html_e('Order Tracking', 'dawp'); ?></h3>
                        <p><?php esc_html_e('When your order ships, we send a shipping confirmation email with tracking details when tracking is available. Tracking may take 24-48 hours to update after the carrier receives the package. You can also use the Track Your Order page with your order information to check the latest status when available.', 'dawp'); ?></p>
                        <p><?php esc_html_e('If your order has not arrived after the estimated delivery window has passed, contact us with your order number and tracking number. We will review the shipment history and help determine the next step with the carrier.', 'dawp'); ?></p>

                        <h3 class="mt-8 mb-4 rounded-md border-l-4 border-[#9CCFB5] bg-[#F1FAF5] px-4 py-3 text-xl font-black text-[#2D2633]"><?php esc_html_e('Shipping Address Policy', 'dawp'); ?></h3>
                        <p><?php esc_html_e('Customers are responsible for entering a complete and accurate shipping address at checkout. Please confirm the recipient name, street address, apartment or unit number, city, state, ZIP code, phone number, and email address before submitting the order.', 'dawp'); ?></p>
                        <ul class="list-disc pl-5 space-y-2">
                            <li><?php esc_html_e('Address changes can only be considered before an order has been processed or shipped.', 'dawp'); ?></li>
                            <li><?php esc_html_e('Once a package has shipped, we cannot guarantee rerouting, cancellation, or address correction.', 'dawp'); ?></li>
                            <li><?php esc_html_e('If an order is returned to us because of an incomplete or incorrect address, we may offer reshipment at the customer\'s cost or refund the item price minus non-refundable shipping costs when applicable.', 'dawp'); ?></li>
                            <li><?php esc_html_e('We are not responsible for delays, failed delivery, or loss caused by incorrect or incomplete shipping information provided by the customer.', 'dawp'); ?></li>
                        </ul>

                        <h3 class="mt-8 mb-4 rounded-md border-l-4 border-[#9CCFB5] bg-[#F1FAF5] px-4 py-3 text-xl font-black text-[#2D2633]"><?php esc_html_e('P.O. Boxes, Business Addresses, and Secure Buildings', 'dawp'); ?></h3>
                        <p><?php esc_html_e('Some carriers or shipping methods may not support every address type. If you use a P.O. Box, workplace, apartment building, mailroom, gated building, or parcel locker, please make sure the selected address can receive packages from the carrier shown in tracking. Failed delivery caused by building access, mailroom refusal, or address restrictions is handled under the carrier\'s delivery rules.', 'dawp'); ?></p>

                        <h3 class="mt-8 mb-4 rounded-md border-l-4 border-[#9CCFB5] bg-[#F1FAF5] px-4 py-3 text-xl font-black text-[#2D2633]"><?php esc_html_e('Lost or Stolen Packages', 'dawp'); ?></h3>
                        <p><?php esc_html_e('If tracking shows that a package was delivered but you cannot find it, please check your mailbox, porch, lobby, parcel locker, building office, household members, neighbors, and local carrier office first. Carriers may mark a package delivered shortly before final placement at the address.', 'dawp'); ?></p>
                        <ul class="list-disc pl-5 space-y-2">
                            <li><?php esc_html_e('If the carrier confirms the package is lost before delivery and the shipping address was correct, we will review the claim and may offer a replacement, store credit, or refund depending on product availability and claim outcome.', 'dawp'); ?></li>
                            <li><?php esc_html_e('If tracking confirms delivery to the address provided at checkout, One Shop Vibe is not responsible for theft or loss after delivery, but we will help you collect the shipment details needed for a carrier claim when possible.', 'dawp'); ?></li>
                            <li><?php esc_html_e('If the package was shipped to an incorrect address entered by the customer, replacement or refund is not guaranteed.', 'dawp'); ?></li>
                        </ul>
                    </div>
                </div>

                <!-- Returns -->
                <div id="return-policy" class="scroll-mt-24 rounded-lg border border-[#E5E7EB] bg-white p-6 shadow-sm sm:p-8">
                    <div class="mb-5 inline-flex h-12 w-12 items-center justify-center rounded-full bg-[#DCD5FF]">
                        <svg class="h-6 w-6 text-[#2D2633]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 15v-1a4 4 0 00-4-4H8m0 0l3 3m-3-3l3-3m9 14V5a2 2 0 00-2-2H6a2 2 0 00-2 2v16l4-2 4 2 4-2 4 2z" />
                        </svg>
                    </div>
                    <h2 class="font-heading text-3xl font-black text-[#2D2633] mb-4">
                        <?php esc_html_e('Return Policy', 'dawp'); ?>
                    </h2>
                    <div class="max-w-none text-base leading-8 text-[#6B6470] [&_li]:leading-7 [&_p+p]:mt-4">
                        <p class="rounded-lg border border-[#E5E0FF] bg-[#F5F3FF] p-4 font-medium text-[#2D2633]"><?php esc_html_e('This return policy applies only to products purchased directly on the One Shop Vibe website. If you purchased a One Shop Vibe product from another retailer, marketplace, social seller, or third-party website, please contact that seller for their return instructions.', 'dawp'); ?></p>

                        <h3 class="mt-8 mb-4 rounded-md border-l-4 border-[#DCD5FF] bg-[#F5F3FF] px-4 py-3 text-xl font-black text-[#2D2633]"><?php esc_html_e('Return Policy For Products on Our Website', 'dawp'); ?></h3>
                        <p><?php esc_html_e('You may request a return within 30 days of delivery for eligible products. Because our catalog may include beauty, grooming, wellness, and personal care items, return eligibility depends on hygiene, safety, product condition, packaging condition, and whether the item can be resold safely.', 'dawp'); ?></p>
                        <p><?php esc_html_e('A return request does not automatically mean the item is approved for refund. We review each request and may ask for photos, batch or SKU details, packaging condition, or other order information before issuing return instructions.', 'dawp'); ?></p>

                        <div class="mt-6 rounded-lg border border-[#F7D8D5] border-l-4 border-l-[#F3A6A0] bg-[#FFF5F4] p-4">
                            <p class="text-sm font-bold text-[#2D2633] uppercase tracking-wide mb-1"><?php esc_html_e('Beauty, Grooming, and Personal Care Hygiene Rule', 'dawp'); ?></p>
                            <p class="text-sm"><?php esc_html_e('Opened, used, tested, worn, altered, contaminated, or hygiene-sensitive products cannot be returned unless they arrived defective, damaged, or incorrect. This includes items that touch skin, hair, nails, lips, eyes, or other personal areas.', 'dawp'); ?></p>
                        </div>

                        <h3 class="mt-8 mb-4 rounded-md border-l-4 border-[#DCD5FF] bg-[#F5F3FF] px-4 py-3 text-xl font-black text-[#2D2633]"><?php esc_html_e('Eligible Returns', 'dawp'); ?></h3>
                        <ul class="list-disc pl-5 space-y-2">
                            <li><?php esc_html_e('The return request is submitted within 30 days of the delivery date.', 'dawp'); ?></li>
                            <li><?php esc_html_e('The product is unused, unopened when hygiene rules require it, undamaged, and in its original condition.', 'dawp'); ?></li>
                            <li><?php esc_html_e('Original packaging, seals, labels, manuals, accessories, inserts, and included parts are present when applicable.', 'dawp'); ?></li>
                            <li><?php esc_html_e('The item was not marked final sale, clearance, gift card, sample, promotional, custom, or otherwise non-returnable at the time of purchase.', 'dawp'); ?></li>
                            <li><?php esc_html_e('Proof of purchase is provided, such as your order number or order confirmation email.', 'dawp'); ?></li>
                        </ul>

                        <h3 class="mt-8 mb-4 rounded-md border-l-4 border-[#DCD5FF] bg-[#F5F3FF] px-4 py-3 text-xl font-black text-[#2D2633]"><?php esc_html_e('Non-Returnable Items', 'dawp'); ?></h3>
                        <ul class="list-disc pl-5 space-y-2">
                            <li><?php esc_html_e('Opened or used beauty, grooming, cosmetic, skincare, haircare, nail care, oral care, or personal care products, unless the item arrived defective or incorrect.', 'dawp'); ?></li>
                            <li><?php esc_html_e('Items with broken seals, missing protective film, removed hygiene covers, damaged packaging, missing accessories, or signs of handling beyond inspection.', 'dawp'); ?></li>
                            <li><?php esc_html_e('Products damaged by misuse, improper storage, normal wear, customer handling, unauthorized repair, or exposure to heat, moisture, or liquids after delivery.', 'dawp'); ?></li>
                            <li><?php esc_html_e('Gift cards, digital products, samples, free gifts, promotional bundles when incomplete, final sale items, and items returned after the 30-day return window.', 'dawp'); ?></li>
                        </ul>

                        <h3 id="return-process" class="scroll-mt-24 mt-8 mb-4 rounded-md border-l-4 border-[#DCD5FF] bg-[#F5F3FF] px-4 py-3 text-xl font-black text-[#2D2633]"><?php esc_html_e('Return Process', 'dawp'); ?></h3>
                        <ol class="list-decimal pl-5 space-y-2">
                            <li><?php esc_html_e('Contact support@oneshopvibe.com within 30 days of delivery. Include your order number, the item you want to return, the reason for the request, and photos if the item is damaged, defective, incorrect, or packaging-related.', 'dawp'); ?></li>
                            <li><?php esc_html_e('Wait for return authorization and instructions. Do not send items back before receiving approval, because unauthorized returns may be refused or returned to sender.', 'dawp'); ?></li>
                            <li><?php esc_html_e('Pack the approved item securely in its original packaging when possible. Include all required parts, accessories, manuals, seals, and order information.', 'dawp'); ?></li>
                            <li><?php esc_html_e('Ship the return using a trackable service. Customers are responsible for return shipping costs unless the return is caused by our error, such as an incorrect, defective, or damaged item.', 'dawp'); ?></li>
                            <li><?php esc_html_e('After the return is delivered to the address provided in our instructions, we inspect the item and notify you by email whether the return is approved or declined.', 'dawp'); ?></li>
                        </ol>

                        <h3 class="mt-8 mb-4 rounded-md border-l-4 border-[#DCD5FF] bg-[#F5F3FF] px-4 py-3 text-xl font-black text-[#2D2633]"><?php esc_html_e('Exchanges', 'dawp'); ?></h3>
                        <p><?php esc_html_e('We review exchange requests for defective, damaged, or incorrect items. Contact us within 7 days of delivery with your order number and clear photos of the product, packaging, shipping label, and any visible issue. If approved and inventory is available, we may offer a replacement for the same item. If a replacement is not available, we may offer store credit or a refund according to the refund policy below.', 'dawp'); ?></p>
                        <p><?php esc_html_e('For hygiene-sensitive products, we do not offer size, color, scent, preference, or change-of-mind exchanges after the item has been opened, tested, or used.', 'dawp'); ?></p>

                        <h3 id="refunds" class="scroll-mt-24 mt-8 mb-4 rounded-md border-l-4 border-[#F3A6A0] bg-[#FFF5F4] px-4 py-3 text-xl font-black text-[#2D2633]"><?php esc_html_e('Refunds', 'dawp'); ?></h3>
                        <ul class="list-disc pl-5 space-y-2">
                            <li><?php esc_html_e('Approved refunds are issued to the original payment method used at checkout.', 'dawp'); ?></li>
                            <li><?php esc_html_e('Refunds are normally processed within 5-10 business days after we receive and approve the returned item. Your bank, card issuer, or payment provider may require additional time to post the credit.', 'dawp'); ?></li>
                            <li><?php esc_html_e('Original shipping charges, shipping protection fees, gift wrap, and other service fees are non-refundable unless the return is due to our error.', 'dawp'); ?></li>
                            <li><?php esc_html_e('If a returned item is missing parts, arrives damaged, shows signs of use, or does not meet the approved return conditions, the refund may be declined or reduced.', 'dawp'); ?></li>
                            <li><?php esc_html_e('If more than 15 business days have passed since your refund approval email and you still do not see the credit, contact your payment provider first, then contact us with your order number.', 'dawp'); ?></li>
                        </ul>

                        <h3 class="mt-8 mb-4 rounded-md border-l-4 border-[#F3A6A0] bg-[#FFF5F4] px-4 py-3 text-xl font-black text-[#2D2633]"><?php esc_html_e('Damaged, Defective, or Incorrect Items', 'dawp'); ?></h3>
                        <p><?php esc_html_e('Please inspect your order as soon as it arrives. If you receive an item that is damaged, defective, leaking, missing parts, or different from what you ordered, contact us within 7 days of delivery. Include your order number and clear photos of the item, packaging, and shipping label so we can review the issue quickly.', 'dawp'); ?></p>

                        <h3 class="mt-8 mb-4 rounded-md border-l-4 border-[#F3A6A0] bg-[#FFF5F4] px-4 py-3 text-xl font-black text-[#2D2633]"><?php esc_html_e('Questions About Your Order?', 'dawp'); ?></h3>
                        <p><?php esc_html_e('For shipping, return, exchange, or refund help, email support@oneshopvibe.com with your order number. Our support team typically replies within 1-2 business days, Monday through Friday, excluding holidays.', 'dawp'); ?></p>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
</div>
