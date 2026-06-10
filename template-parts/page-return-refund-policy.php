<?php
/**
 * Return and refund policy template part.
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email = 'support@queens-bracelet.com';
$contact_url   = home_url('/contact-us/');
$store_address = function_exists('dawp_get_store_address') ? dawp_get_store_address() : '';
?>

<div class="bg-white text-[#24132E] antialiased">
    <section class="bg-[#FBF4FF] px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto max-w-4xl text-center">
            <h1 class="font-heading text-5xl leading-[1.05] text-[#3B1748] sm:text-6xl">Return &amp; Refund Policy</h1>
        </div>
    </section>

    <section class="bg-[#F8F5FA] px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto grid max-w-7xl gap-6">
            <section class="rounded-2xl border border-[#E8DFF0] bg-white p-6 shadow-sm shadow-[#3B1748]/10 lg:p-10">
                <h2 class="font-heading text-4xl leading-tight text-[#3B1748]">Return Eligibility</h2>
                <div class="mt-5 grid gap-4 text-sm leading-7 text-[#6D5875] sm:text-base">
                    <p>To be eligible for a return, your item must meet the following criteria:</p>
                    <ul class="grid gap-3 pl-4">
                        <li class="list-disc">Return Window: You must initiate your return request within 30 days of delivery.</li>
                        <li class="list-disc">Condition: Items must be unworn, unused, undamaged, and in their original, unaltered condition.</li>
                        <li class="list-disc">Packaging: Items must be returned with all original packaging, tags, labels, certificates, care cards, pouches, boxes, and any included accessories.</li>
                        <li class="list-disc">Restocking Fee: Free. We do not charge any restocking fees for eligible returns.</li>
                    </ul>
                </div>
            </section>

            <section class="rounded-2xl border border-[#E8DFF0] bg-[#FBF4FF] p-6 shadow-sm shadow-[#3B1748]/10 lg:p-10">
                <h2 class="font-heading text-4xl leading-tight text-[#3B1748]">Return Shipping Fees</h2>
                <div class="mt-6 grid gap-4 lg:grid-cols-2">
                    <div class="rounded-2xl border border-[#E8DFF0] bg-white p-5">
                        <h3 class="text-lg font-medium leading-6 text-[#3B1748]">Defective, Damaged, or Incorrect Products (Wrong item, carrier damage, or defective):</h3>
                        <p class="mt-4 text-sm leading-7 text-[#6D5875] sm:text-base">No cost to customer. We cover 100% of the return shipping costs. We will provide a downloadable and printable prepaid shipping label via email.</p>
                    </div>
                    <div class="rounded-2xl border border-[#E8DFF0] bg-white p-5">
                        <h3 class="text-lg font-medium leading-6 text-[#3B1748]">Customer Remorse (Ordered wrong item/size/color, changed mind, or doesn't fit):</h3>
                        <p class="mt-4 text-sm leading-7 text-[#6D5875] sm:text-base">The customer is responsible for the return shipping cost. The actual return shipping cost of the provided prepaid label (sent via email) will be deducted from your final refund amount.</p>
                    </div>
                </div>
            </section>

            <section class="rounded-2xl border border-[#E8DFF0] bg-white p-6 shadow-sm shadow-[#3B1748]/10 lg:p-10">
                <h2 class="font-heading text-4xl leading-tight text-[#3B1748]">Common Delivery Issues</h2>
                <div class="mt-6 grid gap-6 text-sm leading-7 text-[#6D5875] sm:text-base">
                    <div>
                        <h3 class="text-lg font-medium text-[#3B1748]">Damaged on Arrival</h3>
                        <p class="mt-2">If your order arrives damaged, please contact us within 30 days of delivery with photos of the item and the shipping packaging, including the shipping label. We will arrange a replacement or full refund at no cost to you.</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-[#3B1748]">Lost Packages / Never Arrived</h3>
                        <p class="mt-2">If your tracking status shows no updates for an extended period, or is marked "Delivered" but you did not receive it, please contact us within 30 days of the recorded delivery date. We will investigate with the carrier and arrange a replacement or refund if the package is confirmed lost.</p>
                    </div>
                </div>
            </section>

            <section class="rounded-2xl border border-[#E8DFF0] bg-[#FBF4FF] p-6 shadow-sm shadow-[#3B1748]/10 lg:p-10">
                <h2 class="font-heading text-4xl leading-tight text-[#3B1748]">How to Return an Item</h2>
                <p class="mt-5 text-sm leading-7 text-[#6D5875] sm:text-base">Please follow our official 3–step process. Do not ship any item back without prior authorization, as unauthorized returns cannot be tracked or processed at our warehouse.</p>

                <ol class="mt-6 grid gap-4">
                    <li class="flex gap-4 rounded-2xl border border-[#E8DFF0] bg-white p-5">
                        <span class="flex size-7 shrink-0 items-center justify-center rounded-full bg-[#3B1748] text-xs font-semibold text-white">1</span>
                        <div>
                            <h3 class="text-lg font-medium text-[#3B1748]">Submit Your Return Request</h3>
                            <p class="mt-3 text-sm leading-7 text-[#6D5875] sm:text-base">Email us or use our Contact Page within 30 days of delivery. Please provide your order number, the email used at checkout, the specific item(s) you wish to return, and the reason for the return with photos or videos if damaged.</p>
                        </div>
                    </li>
                    <li class="flex gap-4 rounded-2xl border border-[#E8DFF0] bg-white p-5">
                        <span class="flex size-7 shrink-0 items-center justify-center rounded-full bg-[#3B1748] text-xs font-semibold text-white">2</span>
                        <div>
                            <h3 class="text-lg font-medium text-[#3B1748]">Receive Approval &amp; Pack Your Item</h3>
                            <div class="mt-3 grid gap-3 text-sm leading-7 text-[#6D5875] sm:text-base">
                                <p>Our support team will review your request within 1–2 business days. Once approved, we will email you a Return Merchandise Authorization (RMA) number along with a prepaid shipping label.</p>
                                <p>Repack the item securely in its original packaging with all included accessories, tags, and boxes. Place it inside a sturdy outer shipping box.</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex gap-4 rounded-2xl border border-[#E8DFF0] bg-white p-5">
                        <span class="flex size-7 shrink-0 items-center justify-center rounded-full bg-[#3B1748] text-xs font-semibold text-white">3</span>
                        <div>
                            <h3 class="text-lg font-medium text-[#3B1748]">Ship It Back to Our Returns Center</h3>
                            <p class="mt-3 text-sm leading-7 text-[#6D5875] sm:text-base">Print the prepaid shipping label, attach it to the outside of your shipping box, and drop it off at the designated carrier location.</p>
                        </div>
                    </li>
                </ol>

                <div class="mt-5 rounded-2xl border border-[#E6C66A] bg-[#FFF9E9] p-5 text-sm leading-7 text-[#3B1748]">
                    <p class="font-semibold">Queen's Bracelet – Returns Department</p>
                    <p><?php echo esc_html($store_address); ?></p>
                </div>

                <div class="mt-6 flex flex-wrap gap-3">
                    <a class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#3B1748] px-6 py-3 text-sm font-semibold text-white transition hover:bg-[#6E3A8A]" href="<?php echo esc_url($contact_url); ?>">Contact Support</a>
                    <a class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#3B1748] bg-white px-6 py-3 text-sm font-semibold text-[#3B1748] transition hover:bg-[#FBF4FF]" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
                </div>
            </section>

            <section class="rounded-2xl border border-[#E8DFF0] bg-white p-6 shadow-sm shadow-[#3B1748]/10 lg:p-10">
                <h2 class="font-heading text-4xl leading-tight text-[#3B1748]">Exchanges</h2>
                <p class="mt-5 text-sm leading-7 text-[#6D5875] sm:text-base">We do not process direct one–for–one product exchanges. To get a different size, color, or model, please follow the return process above to send back your original purchase for a refund, and place a new order on our website simultaneously. This ensures your desired item does not sell out.</p>
            </section>

            <section class="rounded-2xl border border-[#E8DFF0] bg-[#FBF4FF] p-6 shadow-sm shadow-[#3B1748]/10 lg:p-10">
                <h2 class="font-heading text-4xl leading-tight text-[#3B1748]">Refund Process &amp; Timing</h2>
                <ul class="mt-5 grid gap-3 pl-4 text-sm leading-7 text-[#6D5875] sm:text-base">
                    <li class="list-disc">Inspection: Once your return package is received at our warehouse, we will inspect the item within 1–2 business days to ensure it meets our return criteria.</li>
                    <li class="list-disc">Approval &amp; Timing: If approved, your refund will be processed automatically back to your original payment method within 7 business days.</li>
                    <li class="list-disc">Refund Method: All refunds will be issued solely to your original method of payment within 7 business days of inspection. We do not offer store credit or gift cards as a refund method for returns.</li>
                    <li class="list-disc">Issues with Returns: If a return is approved but is found to be missing accessories, tags, boxes, or shows signs of wear, we reserve the right to refuse the refund and will offer to ship the item back to you at your expense.</li>
                    <li class="list-disc">Delayed Refunds: If you have not received your refund after 15 business days of approval, please check with your bank or credit card company first, then contact us.</li>
                </ul>
                <a class="mt-7 inline-flex min-h-12 items-center justify-center rounded-full border border-[#3B1748] bg-white px-6 py-3 text-sm font-semibold text-[#3B1748] transition hover:bg-[#F8F5FA]" href="mailto:<?php echo esc_attr($support_email); ?>">Email Support</a>
            </section>

            <section class="rounded-2xl border border-[#E8DFF0] bg-white p-6 shadow-sm shadow-[#3B1748]/10 lg:p-10">
                <h2 class="font-heading text-4xl leading-tight text-[#3B1748]">Non-Returnable Items</h2>
                <div class="mt-5 grid gap-4 text-sm leading-7 text-[#6D5875] sm:text-base">
                    <p>The following items are strictly non-returnable and final sale:</p>
                    <ul class="grid gap-3 pl-4">
                        <li class="list-disc">Items explicitly marked as "Final Sale" or "Non-Returnable" on the product page.</li>
                        <li class="list-disc">Gift cards or digital products/downloads.</li>
                        <li class="list-disc">Personalized, engraved, resized, or custom–made items.</li>
                        <li class="list-disc">Intimate apparel, swimwear, or hygiene–sensitive items such as earrings where the product seal has been broken.</li>
                        <li class="list-disc">Items that have been worn, washed, altered, or damaged after delivery.</li>
                    </ul>
                </div>
            </section>

            <section class="rounded-2xl border border-[#E8DFF0] bg-[#FBF4FF] p-6 shadow-sm shadow-[#3B1748]/10 lg:p-10">
                <h2 class="font-heading text-4xl leading-tight text-[#3B1748]">Contact Information</h2>
                <div class="mt-6 grid gap-4 rounded-2xl border border-[#E8DFF0] bg-white p-4 md:grid-cols-2">
                    <div class="rounded-2xl border border-[#E8DFF0] p-4">
                        <p class="text-sm font-semibold text-[#3B1748]">Store Name</p>
                        <p class="mt-2 text-sm leading-6 text-[#6D5875]">Queen's Bracelet</p>
                    </div>
                    <div class="rounded-2xl border border-[#E8DFF0] p-4">
                        <p class="text-sm font-semibold text-[#3B1748]">Address</p>
                        <p class="mt-2 text-sm leading-6 text-[#6D5875]"><?php echo esc_html($store_address); ?></p>
                    </div>
                    <div class="rounded-2xl border border-[#E8DFF0] p-4">
                        <p class="text-sm font-semibold text-[#3B1748]">Email</p>
                        <a class="mt-2 block text-sm leading-6 text-[#6D5875] hover:text-[#3B1748]" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
                    </div>
                    <div class="rounded-2xl border border-[#E8DFF0] p-4">
                        <p class="text-sm font-semibold text-[#3B1748]">Contact Support</p>
                        <a class="mt-2 block text-sm leading-6 text-[#6D5875] hover:text-[#3B1748]" href="<?php echo esc_url($contact_url); ?>">Contact Us page</a>
                    </div>
                    <div class="rounded-2xl border border-[#E8DFF0] p-4">
                        <p class="text-sm font-semibold text-[#3B1748]">Customer Service Hours</p>
                        <p class="mt-2 text-sm leading-6 text-[#6D5875]">Monday-Friday, 9:00 AM-6:00 PM PST</p>
                    </div>
                    <div class="rounded-2xl border border-[#E8DFF0] p-4">
                        <p class="text-sm font-semibold text-[#3B1748]">Response Time</p>
                        <p class="mt-2 text-sm leading-6 text-[#6D5875]">We aim to reply within 1 business day. Response times may vary on weekends, holidays, or high-volume periods.</p>
                    </div>
                </div>
            </section>
        </div>
    </section>
</div>
