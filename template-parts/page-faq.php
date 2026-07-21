<?php
/**
 * Template Part: page-faq
 */

$faq_sections = [
    [
        'id' => 'faq-shipping',
        'label' => __('Shipping', 'dawp'),
        'accent' => '#C8A45D',
        'tint' => '#F8F1E7',
        'items' => [
            [
                'question' => __('How long does order processing and delivery take?', 'dawp'),
                'answer' => [
                    __('Orders placed before the 5:00 PM Eastern Time cutoff are typically handled within 1-3 business days. Orders placed after cutoff begin processing the following business day.', 'dawp'),
                    __('After dispatch, standard U.S. transit usually takes 5-7 business days, Monday to Friday. The estimated total delivery window is 6-10 business days from the date of purchase.', 'dawp'),
                ],
            ],
            [
                'question' => __('Where does Patado LLC ship?', 'dawp'),
                'answer' => [
                    __('We currently ship exclusively within the United States domestic market. If a product, destination, or carrier limitation prevents delivery to your address, you will be notified at checkout before payment is processed.', 'dawp'),
                    __('Some handmade jewelry, vintage-inspired accessories, curated apparel, or artisan gifts may ship separately when items require different fulfillment batches or specialized packing methods.', 'dawp'),
                ],
            ],
            [
                'question' => __('How much does standard shipping cost?', 'dawp'),
                'answer' => [
                    __('Standard U.S. shipping is free for all orders nationwide, with no minimum purchase requirement.', 'dawp'),
                    __('If expedited or assisted shipping services are available for your destination, the exact cost will be shown clearly at checkout before you complete payment.', 'dawp'),
                ],
            ],
            [
                'question' => __('When will I receive tracking information?', 'dawp'),
                'answer' => [
                    __('Once your order is dispatched, we send an automated shipping confirmation email with a direct tracking link and courier details to the email address used at checkout.', 'dawp'),
                    __('Orders are shipped through trusted domestic U.S. carriers such as USPS, UPS, FedEx, or DHL. The final carrier is selected when your package is labeled and prepared for shipment.', 'dawp'),
                ],
            ],
            [
                'question' => __('Can I change my shipping address after checkout?', 'dawp'),
                'answer' => [
                    __('Address changes can only be reviewed before an order has entered fulfillment or shipped. Once a package has shipped, rerouting, cancellation, or address correction is not guaranteed.', 'dawp'),
                    __('Customers are responsible for entering a complete and accurate shipping address, including recipient name, street address, unit number, city, state, ZIP code, phone number, and email address.', 'dawp'),
                ],
            ],
            [
                'question' => __('What happens if tracking says delivered but I cannot find the package?', 'dawp'),
                'answer' => [
                    __('First check the delivery area, building office, mailroom, household members, neighbors, and local carrier office. If the package still cannot be located, email support@patadollc.com with your order number, tracking number, checkout email, and full delivery address.', 'dawp'),
                    __('We will investigate with the carrier and help resolve the issue. If the package is confirmed lost, damaged, or otherwise affected by a delivery problem covered by our policy, we may arrange a replacement or refund as applicable.', 'dawp'),
                ],
            ],
        ],
    ],
    [
        'id' => 'faq-returns',
        'label' => __('Returns & Refunds', 'dawp'),
        'accent' => '#C8A45D',
        'tint' => '#F8F1E7',
        'items' => [
            [
                'question' => __('What is Patado LLC\'s return window?', 'dawp'),
                'answer' => [
                    __('You must initiate your return request within 30 days of delivery for eligible items purchased directly from Patado LLC.', 'dawp'),
                    __('A return request is not automatically approved. Please wait for our Return Merchandise Authorization (RMA) number and return instructions before shipping anything back.', 'dawp'),
                ],
            ],
            [
                'question' => __('Which returns are eligible?', 'dawp'),
                'answer' => [
                    __('Eligible items must be unworn, unused, undamaged, and in their original, unaltered condition.', 'dawp'),
                    __('Items must be returned with all original packaging, tags, labels, care cards, pouches, boxes, and any included accessories where applicable. Patado LLC does not charge restocking fees for eligible returns.', 'dawp'),
                ],
            ],
            [
                'question' => __('Which item conditions are not returnable?', 'dawp'),
                'answer' => [
                    __('Items that have been worn, washed, altered, scented, stained, damaged, or used after delivery are not returnable.', 'dawp'),
                    __('Final sale or non-returnable products, gift cards or digital products, personalized, engraved, resized, custom-made, or special-order items, and hygiene-sensitive jewelry or accessories with broken seals may also be final sale.', 'dawp'),
                ],
            ],
            [
                'question' => __('How do I start a return request?', 'dawp'),
                'answer' => [
                    __('Email support@patadollc.com or use the Contact Page within 30 days of delivery. Include your order number, checkout email, item(s), reason for return, and photos or videos if the item is damaged.', 'dawp'),
                    __('Our support team reviews requests within 1-2 business days. If approved, we will email an RMA number with return instructions or a prepaid shipping label when applicable.', 'dawp'),
                ],
            ],
            [
                'question' => __('Who pays for return shipping?', 'dawp'),
                'answer' => [
                    __('If the return is for a defective, damaged, incorrect, or carrier-damaged product confirmed by support, there is no cost to the customer and we cover the return shipping costs.', 'dawp'),
                    __('For customer remorse returns, including wrong item, size, material, color, changed mind, or fit issues, the customer is responsible for return shipping. If we provide a prepaid label, the actual label cost may be deducted from the final refund.', 'dawp'),
                ],
            ],
            [
                'question' => __('How long do refunds take?', 'dawp'),
                'answer' => [
                    __('Once your return package is received, we inspect the item within 1-2 business days. If approved, the refund is processed automatically back to your original payment method within 7 business days.', 'dawp'),
                    __('If you have not received your refund after 15 business days of approval, please check with your bank or card company first, then contact support@patadollc.com.', 'dawp'),
                ],
            ],
            [
                'question' => __('What should I do if my item arrives damaged, defective, or incorrect?', 'dawp'),
                'answer' => [
                    __('Contact us within 30 days of delivery with photos of the item and shipping packaging, including the shipping label.', 'dawp'),
                    __('If approved, we will arrange a replacement or full refund at no cost to you.', 'dawp'),
                ],
            ],
            [
                'question' => __('Do you offer direct exchanges?', 'dawp'),
                'answer' => [
                    __('We do not process direct one-for-one exchanges. To get a different size, color, material, style, or item, please return the original purchase for a refund and place a new order on the website.', 'dawp'),
                    __('Placing the new order separately helps ensure your desired item does not sell out while the return is being reviewed.', 'dawp'),
                ],
            ],
        ],
    ],
    [
        'id' => 'faq-products-orders',
        'label' => __('Products & Orders', 'dawp'),
        'accent' => '#34243A',
        'tint' => '#F8F1E7',
        'items' => [
            [
                'question' => __('How do I confirm an item is right for me?', 'dawp'),
                'answer' => [
                    __('Before ordering, review the product type, materials, measurements, fit notes, care instructions, and handmade or curated details shown on the product page.', 'dawp'),
                    __('Handmade pieces may include slight natural variations in color, texture, bead pattern, or finish. Vintage-inspired or curated items are described according to the information available for each item.', 'dawp'),
                ],
            ],
            [
                'question' => __('Can I cancel or change an order after placing it?', 'dawp'),
                'answer' => [
                    __('Contact support@patadollc.com as soon as possible if you need to update order details, correct an address, or request cancellation. Changes can only be reviewed before the order has entered fulfillment or shipped.', 'dawp'),
                    __('We may also refuse, limit, hold, review, or cancel an order in certain situations, including unavailable products, pricing errors, suspected fraud, inaccurate information, or restrictions tied to the same customer account, payment method, billing address, shipping address, email, or phone number.', 'dawp'),
                ],
            ],
            [
                'question' => __('Can prices, specifications, or availability change?', 'dawp'),
                'answer' => [
                    __('Yes. Product prices, promotions, availability, shipping rates, descriptions, images, materials, measurements, and service features may change without notice. Product images may also vary because of device screens, lighting, handmade variations, packaging updates, supplier variations, or specification updates.', 'dawp'),
                    __('If website information contains an error, inaccuracy, or omission, we may correct it and may update, refuse, or cancel affected orders where permitted by law.', 'dawp'),
                ],
            ],
            [
                'question' => __('Why do I need to provide accurate billing, contact, and shipping information?', 'dawp'),
                'answer' => [
                    __('Accurate billing, shipping, email, and phone information helps us process payment, fulfill the order, send tracking updates, review address issues, handle returns, and contact you if support needs more information.', 'dawp'),
                    __('Incorrect or incomplete information may delay fulfillment, prevent delivery, affect return eligibility, or require reshipment at the customer\'s cost when applicable.', 'dawp'),
                ],
            ],
        ],
    ],
    [
        'id' => 'faq-privacy-terms',
        'label' => __('Privacy & Terms', 'dawp'),
        'accent' => '#5A3825',
        'tint' => '#F8F1E7',
        'items' => [
            [
                'question' => __('How does Patado LLC use my personal information?', 'dawp'),
                'answer' => [
                    __('We use personal information to operate the store, process and confirm purchases, process payments through third-party payment processors, fulfill and ship orders, provide tracking, manage returns or refunds, provide customer support, improve the website, prevent fraud, and meet legal obligations.', 'dawp'),
                    __('This may include contact details, order and product information, payment-related references, device and technical data, website usage data, communications, support photos, and marketing preferences where applicable.', 'dawp'),
                ],
            ],
            [
                'question' => __('Does Patado LLC store my full credit card number?', 'dawp'),
                'answer' => [
                    __('No. Payment information is processed by trusted third-party payment processors. Patado LLC does not store full credit card numbers, card security codes, or complete payment credentials on our website servers.', 'dawp'),
                    __('Checkout pages and pages that collect personal information should be protected by HTTPS/SSL, but no website or online transmission can be guaranteed completely secure.', 'dawp'),
                ],
            ],
            [
                'question' => __('Do you sell customer contact information?', 'dawp'),
                'answer' => [
                    __('We do not sell, rent, or trade customer contact information to third parties for their independent marketing. We share personal information only when needed to operate the store, fulfill purchases, protect customers, comply with law, or complete a transaction you requested.', 'dawp'),
                    __('For example, we may share limited information with payment processors, fraud prevention providers, shipping carriers, fulfillment partners, website providers, analytics or advertising partners, professional advisers, or legal authorities when appropriate.', 'dawp'),
                ],
            ],
            [
                'question' => __('How do cookies and advertising tools work on the website?', 'dawp'),
                'answer' => [
                    __('We use cookies and similar technologies for cart, checkout, account login, security, language preferences, fraud prevention, analytics, performance measurement, advertising measurement, and relevant advertising where permitted.', 'dawp'),
                    __('You can set your browser to block or delete cookies, but some parts of the website may not work correctly if cookies are disabled.', 'dawp'),
                ],
            ],
            [
                'question' => __('What privacy rights do I have?', 'dawp'),
                'answer' => [
                    __('Depending on where you live, you may have rights to request access, correction, deletion, portability, restriction, objection, withdrawal of consent, or information about how we collect, use, and share personal information.', 'dawp'),
                    __('To make a privacy request, contact support@patadollc.com. We may need enough information to verify your identity and locate the relevant order, account, or contact record.', 'dawp'),
                ],
            ],
            [
                'question' => __('How can I contact Patado LLC support?', 'dawp'),
                'answer' => [
                    __('For shipping, returns, exchanges, refunds, privacy requests, product details, order status, or policy questions, email support@patadollc.com with your order number when available.', 'dawp'),
                    __('Our support team responds within 24 business hours. Customer service hours are Monday-Friday, 9:00 AM-6:00 PM EST, excluding holidays and high-volume periods.', 'dawp'),
                ],
            ],
        ],
    ],
];
?>

<div id="primary" class="bg-[#F8F1E7] font-body text-[#24211E]">
    <section class="bg-[#5A3825] py-14 text-white lg:py-20">
        <div class="mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
            <p class="text-sm font-black uppercase tracking-[0.18em] text-[#C8A45D]"><?php esc_html_e('Patado LLC Customer Care', 'dawp'); ?></p>
            <h1 class="mt-3 font-heading text-4xl font-black leading-tight lg:text-6xl">
                <?php esc_html_e('Frequently Asked Questions', 'dawp'); ?>
            </h1>
            <p class="mx-auto mt-4 max-w-3xl text-lg leading-8 text-[#F8F1E7]">
                <?php esc_html_e('Clear answers about U.S. shipping, free standard delivery, tracking, returns, refunds, products, privacy, and customer support for Patado LLC orders.', 'dawp'); ?>
            </p>
            <p class="mt-3 text-sm font-semibold uppercase tracking-wide text-[#D8C3A5]">
                <?php esc_html_e('Last Updated: May 20, 2026', 'dawp'); ?>
            </p>
        </div>
    </section>

    <section class="py-12 lg:py-16">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <div class="rounded-lg border border-[#D8C3A5] bg-white p-6 shadow-sm">
                    <p class="text-sm font-bold uppercase tracking-wide text-[#5E554D]"><?php esc_html_e('Processing', 'dawp'); ?></p>
                    <p class="mt-3 font-heading text-2xl font-black leading-snug text-[#5A3825]"><?php esc_html_e('1-3 Business Days', 'dawp'); ?></p>
                </div>
                <div class="rounded-lg border border-[#D8C3A5] bg-white p-6 shadow-sm">
                    <p class="text-sm font-bold uppercase tracking-wide text-[#5E554D]"><?php esc_html_e('Standard Shipping', 'dawp'); ?></p>
                    <p class="mt-3 font-heading text-2xl font-black leading-snug text-[#5A3825]"><?php esc_html_e('Free U.S. Delivery', 'dawp'); ?></p>
                </div>
                <div class="rounded-lg border border-[#D8C3A5] bg-white p-6 shadow-sm">
                    <p class="text-sm font-bold uppercase tracking-wide text-[#5E554D]"><?php esc_html_e('Returns', 'dawp'); ?></p>
                    <p class="mt-3 font-heading text-2xl font-black leading-snug text-[#5A3825]"><?php esc_html_e('30-Day Window', 'dawp'); ?></p>
                </div>
                <div class="rounded-lg border border-[#D8C3A5] bg-white p-6 shadow-sm">
                    <p class="text-sm font-bold uppercase tracking-wide text-[#5E554D]"><?php esc_html_e('Support', 'dawp'); ?></p>
                    <p class="mt-3 font-heading text-2xl font-black leading-snug text-[#5A3825]"><?php esc_html_e('24 Business Hours', 'dawp'); ?></p>
                </div>
            </div>

            <div class="mt-12 grid gap-10 lg:mt-14 lg:grid-cols-[240px_minmax(0,1fr)] lg:items-start lg:gap-10">
                <aside class="rounded-lg border border-[#D8C3A5] bg-white p-5 shadow-sm lg:sticky lg:top-24">
                    <p class="text-xs font-black uppercase tracking-[0.16em] text-[#5E554D]"><?php esc_html_e('FAQs Sections', 'dawp'); ?></p>
                    <nav class="mt-5 space-y-3" aria-label="<?php esc_attr_e('FAQs sections', 'dawp'); ?>">
                        <?php foreach ($faq_sections as $section) : ?>
                            <a class="block rounded-lg border border-transparent px-4 py-3 text-sm font-bold leading-5 text-[#34243A] transition hover:border-[var(--faq-accent)] hover:bg-[var(--faq-tint)]" style="--faq-accent: <?php echo esc_attr($section['accent']); ?>; --faq-tint: <?php echo esc_attr($section['tint']); ?>;" href="#<?php echo esc_attr($section['id']); ?>">
                                <?php echo esc_html($section['label']); ?>
                            </a>
                        <?php endforeach; ?>
                    </nav>
                </aside>

                <div class="space-y-10">
                    <?php foreach ($faq_sections as $section) : ?>
                        <section id="<?php echo esc_attr($section['id']); ?>" class="scroll-mt-24 rounded-lg border border-[#D8C3A5] bg-white p-5 shadow-sm sm:p-7 lg:p-10">
                            <div class="mb-6 inline-flex h-12 w-12 items-center justify-center rounded-full text-white" style="background-color: <?php echo esc_attr($section['accent']); ?>;">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h8M8 14h5M5 5h14v12H8l-3 3z" />
                                </svg>
                            </div>
                            <h2 class="font-heading text-3xl font-black leading-tight text-[#5A3825]"><?php echo esc_html($section['label']); ?></h2>

                            <div class="mt-6 space-y-4">
                                <?php foreach ($section['items'] as $index => $item) : ?>
                                    <details class="group rounded-lg border border-[#D8C3A5] bg-white shadow-sm open:border-[var(--faq-accent)] open:bg-[var(--faq-tint)]" style="--faq-accent: <?php echo esc_attr($section['accent']); ?>; --faq-tint: <?php echo esc_attr($section['tint']); ?>;" <?php echo 0 === $index ? 'open' : ''; ?>>
                                        <summary class="flex cursor-pointer list-none items-start justify-between gap-4 px-5 py-5 text-left marker:hidden">
                                            <span class="font-heading text-lg font-black leading-snug text-[#34243A]"><?php echo esc_html($item['question']); ?></span>
                                            <span class="mt-1 inline-flex h-6 w-6 shrink-0 items-center justify-center rounded-full border border-[#D8C3A5] text-[#34243A] transition group-open:rotate-45 group-open:border-[var(--faq-accent)] group-open:bg-white">
                                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14M5 12h14" />
                                                </svg>
                                            </span>
                                        </summary>
                                        <div class="border-t border-[#D8C3A5] px-5 pb-5 pt-4 text-base leading-7 text-[#5E554D]">
                                            <?php foreach ($item['answer'] as $paragraph) : ?>
                                                <p class="mb-4 last:mb-0"><?php echo esc_html($paragraph); ?></p>
                                            <?php endforeach; ?>
                                        </div>
                                    </details>
                                <?php endforeach; ?>
                            </div>
                        </section>
                    <?php endforeach; ?>

                    <section class="rounded-lg border border-[#D8C3A5] bg-[#5A3825] p-6 text-white shadow-sm sm:p-8 lg:p-10">
                        <div class="mx-auto max-w-3xl text-center">
                            <div class="mx-auto mb-5 inline-flex h-12 w-12 items-center justify-center rounded-full bg-[#C8A45D] text-white">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h2 class="font-heading text-3xl font-black leading-tight"><?php esc_html_e('Still have questions?', 'dawp'); ?></h2>
                            <p class="mx-auto mt-4 max-w-2xl text-base leading-7 text-[#F8F1E7]">
                                <?php esc_html_e('Email support@patadollc.com with your order number when available. Support responds within 24 business hours, Monday through Friday, excluding holidays.', 'dawp'); ?>
                            </p>
                            <div class="mt-7 flex flex-col justify-center gap-3 sm:flex-row">
                                <a href="mailto:support@patadollc.com" class="inline-flex min-h-12 items-center justify-center rounded-full bg-white px-6 text-sm font-black text-[#34243A] transition hover:bg-[#C8A45D] hover:text-white">
                                    <?php esc_html_e('Email Support', 'dawp'); ?>
                                </a>
                                <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-white/30 px-6 text-sm font-black text-white transition hover:border-white hover:bg-white/10">
                                    <?php esc_html_e('Shipping Policy', 'dawp'); ?>
                                </a>
                                <a href="<?php echo esc_url(home_url('/return-refund-policy/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-white/30 px-6 text-sm font-black text-white transition hover:border-white hover:bg-white/10">
                                    <?php esc_html_e('Return & Refund Policy', 'dawp'); ?>
                                </a>
                                <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-white/30 px-6 text-sm font-black text-white transition hover:border-white hover:bg-white/10">
                                    <?php esc_html_e('Privacy Policy', 'dawp'); ?>
                                </a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
</div>
