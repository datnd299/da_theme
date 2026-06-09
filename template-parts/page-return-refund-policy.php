<?php
/**
 * Template Part: Return & Refund Policy
 * Brand: UK Official Store
 */

$brand_name = 'UK Official Store';
$support_email = 'support@ukofficialstore.com';
$store_address = dawp_store_address();
$business_hours = 'Monday-Friday, 9:00 AM-6:00 PM PST';
$last_updated = 'June 8, 2026';
?>

<div class="return-policy-page bg-[#f7f7f9] text-[#34263a]">
    <section class="border-b border-[#e8dde6] bg-white py-16 md:py-20">
        <div class="mx-auto max-w-7xl px-6">
            <nav class="mb-6 flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-[#6f6374]">
                <a href="/" class="hover:text-[#34263a]">Home</a>
                <span>/</span>
                <span>Return &amp; Refund Policy</span>
            </nav>
            <h1 class="font-heading text-4xl font-black tracking-tight sm:text-5xl md:text-6xl">Return &amp; Refund Policy</h1>
            <p class="mt-5 max-w-3xl text-lg leading-relaxed text-[#6f6374]">
                Clear return, exchange, and refund information for purchases from <?php echo esc_html($brand_name); ?>.
            </p>
            <p class="mt-5 text-xs font-bold uppercase tracking-widest text-[#8c818f]">Last Updated: <?php echo esc_html($last_updated); ?></p>
        </div>
    </section>

    <main class="mx-auto max-w-7xl space-y-6 px-6 py-10 md:py-14">
        <section class="policy-card">
            <h2>Return Eligibility</h2>
            <p>To be eligible for a return, your item must meet the following criteria:</p>
            <ul>
                <li><strong>Return Window:</strong> You must initiate your return request within 30 days of delivery.</li>
                <li><strong>Condition:</strong> Items must be unworn, unused, undamaged, and in their original, unaltered condition.</li>
                <li><strong>Packaging:</strong> Items must be returned with all original packaging, tags, labels, certificates, care cards, pouches, boxes, and any included accessories.</li>
                <li><strong>Restocking Fee:</strong> Free. We do not charge any restocking fees for eligible returns.</li>
            </ul>
        </section>

        <section class="policy-card policy-card--tint">
            <h2>Return Shipping Fees</h2>
            <div class="grid gap-4 md:grid-cols-2">
                <div class="inner-card">
                    <h3>Defective, Damaged, or Incorrect Products (Wrong item, carrier damage, or defective):</h3>
                    <p>No cost to customer. We cover 100% of the return shipping costs. We will provide a downloadable and printable prepaid shipping label via email.</p>
                </div>
                <div class="inner-card">
                    <h3>Customer Remorse (Ordered wrong item/size/color, changed mind, or doesn't fit):</h3>
                    <p>The customer is responsible for the return shipping cost. The actual return shipping cost of the provided prepaid label (sent via email) will be deducted from your final refund amount.</p>
                </div>
            </div>
        </section>

        <section class="policy-card">
            <h2>Common Delivery Issues</h2>
            <h3>Damaged on Arrival</h3>
            <p>If your order arrives damaged, please contact us within 30 days of delivery with photos of the item and the shipping packaging, including the shipping label. We will arrange a replacement or full refund at no cost to you.</p>
            <h3>Lost Packages / Never Arrived</h3>
            <p>If your tracking status shows no updates for an extended period, or is marked "Delivered" but you did not receive it, please contact us within 30 days of the recorded delivery date. We will investigate with the carrier and arrange a replacement or refund if the package is confirmed lost.</p>
        </section>

        <section class="policy-card policy-card--tint">
            <h2>How to Return an Item</h2>
            <p>Please follow our official 3-step process. Do not ship any item back without prior authorization, as unauthorized returns cannot be tracked or processed at our warehouse.</p>
            <div class="mt-5 space-y-4">
                <div class="step-card">
                    <span>1</span>
                    <div>
                        <h3>Submit Your Return Request</h3>
                        <p>Email us or use our Contact Page within 30 days of delivery. Please provide your order number, the email used at checkout, the specific item(s) you wish to return, and the reason for the return with photos or videos if damaged.</p>
                    </div>
                </div>
                <div class="step-card">
                    <span>2</span>
                    <div>
                        <h3>Receive Approval &amp; Pack Your Item</h3>
                        <p>Our support team will review your request within 1-2 business days. Once approved, we will email you a Return Merchandise Authorization (RMA) number along with a prepaid shipping label.</p>
                        <p>Repack the item securely in its original packaging with all included accessories, tags, and boxes. Place it inside a sturdy outer shipping box.</p>
                    </div>
                </div>
                <div class="step-card">
                    <span>3</span>
                    <div>
                        <h3>Ship It Back to Our Returns Center</h3>
                        <p>Print the prepaid shipping label, attach it to the outside of your shipping box, and drop it off at the designated carrier location.</p>
                    </div>
                </div>
            </div>
            <div class="address-card">
                <strong><?php echo esc_html($brand_name); ?> - Returns Department</strong>
                <span><?php echo esc_html($store_address); ?></span>
            </div>
            <div class="mt-6 flex flex-wrap gap-3">
                <a class="primary-button" href="/contact-us/">Contact Support</a>
                <a class="secondary-button" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
            </div>
        </section>

        <section class="policy-card">
            <h2>Exchanges</h2>
            <p>We do not process direct one-for-one product exchanges. To get a different size, color, or model, please follow the return process above to send back your original purchase for a refund, and place a new order on our website simultaneously. This ensures your desired item does not sell out.</p>
        </section>

        <section class="policy-card policy-card--tint">
            <h2>Refund Process &amp; Timing</h2>
            <ul>
                <li><strong>Inspection:</strong> Once your return package is received at our warehouse, we will inspect the item within 1-2 business days to ensure it meets our return criteria.</li>
                <li><strong>Approval &amp; Timing:</strong> If approved, your refund will be processed automatically back to your original payment method within 7 business days.</li>
                <li><strong>Refund Method:</strong> All refunds will be issued solely to your original method of payment within 7 business days of inspection. We do not offer store credit or gift cards as a refund method for returns.</li>
                <li><strong>Issues with Returns:</strong> If a return is approved but is found to be missing accessories, tags, boxes, or shows signs of wear, we reserve the right to refuse the refund and will offer to ship the item back to you at your expense.</li>
                <li><strong>Delayed Refunds:</strong> If you have not received your refund after 15 business days of approval, please check with your bank or credit card company first, then contact us.</li>
            </ul>
            <a class="secondary-button mt-5 inline-flex" href="mailto:<?php echo esc_attr($support_email); ?>">Email Support</a>
        </section>

        <section class="policy-card">
            <h2>Non-Returnable Items</h2>
            <p>The following items are strictly non-returnable and final sale:</p>
            <ul>
                <li>Items explicitly marked as "Final Sale" or "Non-Returnable" on the product page.</li>
                <li>Gift cards or digital products/downloads.</li>
                <li>Personalized, altered, resized, or custom-made items.</li>
                <li>Hygiene-sensitive activewear where the product seal has been broken.</li>
                <li>Items that have been worn, washed, altered, or damaged after delivery.</li>
            </ul>
        </section>

        <section class="policy-card policy-card--tint">
            <h2>Contact Information</h2>
            <div class="contact-grid">
                <div class="inner-card"><strong>Store Name</strong><span><?php echo esc_html($brand_name); ?></span></div>
                <div class="inner-card"><strong>Address</strong><span><?php echo esc_html($store_address); ?></span></div>
                <div class="inner-card"><strong>Email</strong><a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a></div>
                <div class="inner-card"><strong>Contact Support</strong><a href="/contact-us/">Contact Us page</a></div>
                <div class="inner-card"><strong>Customer Service Hours</strong><span><?php echo esc_html($business_hours); ?></span></div>
                <div class="inner-card"><strong>Response Time</strong><span>We aim to reply within 1 business day. Response times may vary on weekends, holidays, or high-volume periods.</span></div>
            </div>
        </section>
    </main>
</div>

<style>
    .return-policy-page { color: #6f6374; font-size: 16px; line-height: 1.65; }
    .return-policy-page h1, .return-policy-page h2 { color: #34263a; font-family: "Plus Jakarta Sans", "Inter", sans-serif; }
    .return-policy-page h2 { margin: 0 0 1rem; font-size: clamp(1.8rem, 4vw, 2.5rem); font-weight: 700; line-height: 1.2; }
    .return-policy-page h3 { margin: 0 0 .75rem; color: #34263a; font-size: 1.1rem; font-weight: 500; line-height: 1.4; }
    .return-policy-page p { margin: 0 0 1rem; }
    .return-policy-page a { overflow-wrap: anywhere; }
    .return-policy-page ul { display: grid; gap: .65rem; margin: 1rem 0 0; padding-left: 1.15rem; list-style: disc; }
    .return-policy-page .policy-card { padding: clamp(1.5rem, 4vw, 2.5rem); border: 1px solid #e8dde6; border-radius: 1.25rem; background: #fff; box-shadow: 0 14px 34px rgba(52, 38, 58, .05); }
    .return-policy-page .policy-card--tint { background: #fffafd; }
    .return-policy-page .inner-card { display: flex; flex-direction: column; padding: 1.1rem; border: 1px solid #e8dde6; border-radius: 1rem; background: rgba(255,255,255,.75); }
    .return-policy-page .inner-card p, .return-policy-page .inner-card span { margin: 0; }
    .return-policy-page .step-card { display: flex; gap: 1rem; padding: 1.1rem; border: 1px solid #e8dde6; border-radius: 1rem; background: rgba(255,255,255,.8); }
    .return-policy-page .step-card > span { display: flex; align-items: center; justify-content: center; flex: 0 0 1.75rem; width: 1.75rem; height: 1.75rem; border-radius: 999px; background: #34263a; color: #fff; font-size: .75rem; font-weight: 800; }
    .return-policy-page .step-card p:last-child { margin-bottom: 0; }
    .return-policy-page .address-card { display: flex; flex-direction: column; gap: .25rem; margin-top: 1rem; padding: 1.1rem; border: 1px solid #f0d28b; border-radius: 1rem; background: #fff8e8; color: #34263a; }
    .return-policy-page .primary-button, .return-policy-page .secondary-button { align-items: center; justify-content: center; padding: .8rem 1.35rem; border-radius: 999px; font-size: .8rem; font-weight: 800; text-decoration: none; }
    .return-policy-page .primary-button { background: #34263a; color: #fff; }
    .return-policy-page .secondary-button { border: 1px solid #34263a; color: #34263a; }
    .return-policy-page .contact-grid { display: grid; gap: .9rem; padding: 1rem; border: 1px solid #e8dde6; border-radius: 1.1rem; background: rgba(255,255,255,.65); }
    .return-policy-page .contact-grid strong { margin-bottom: .35rem; color: #34263a; font-size: .8rem; }
    .return-policy-page .contact-grid a { color: #6f6374; text-decoration: none; }
    @media (min-width: 768px) { .return-policy-page .contact-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
</style>
