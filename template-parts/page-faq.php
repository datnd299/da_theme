<?php
/**
 * Template Part: page-faq
 */

$faq_sections = [
    [
        'id' => 'faq-shipping',
        'label' => __('Shipping', 'dawp'),
        'accent' => '#9A6242',
        'tint' => '#F8F1E7',
        'items' => [
            [
                'question' => __('How long does order processing and delivery take?', 'dawp'),
                'answer' => [
                    __('Most Scott Osterbind orders are processed within 2-4 business days after payment is confirmed. Processing includes order review, payment confirmation, product availability, and shipping detail checks before fulfillment begins.', 'dawp'),
                    __('After dispatch, standard delivery within the United States usually takes 5-10 business days. Delivery estimates may change because of destination, carrier capacity, weather, peak seasons, address issues, or local delivery conditions.', 'dawp'),
                ],
            ],
            [
                'question' => __('Where can I see shipping costs before I pay?', 'dawp'),
                'answer' => [
                    __('Available shipping methods, shipping charges, estimated delivery information, taxes, and applicable fees are shown during checkout before you place your order. Please review the full checkout total before submitting payment.', 'dawp'),
                    __('If a listing, cart, checkout, or policy page shows different shipping information, contact support@scottosterbind.com before ordering so we can review the details.', 'dawp'),
                ],
            ],
            [
                'question' => __('When will I receive tracking information?', 'dawp'),
                'answer' => [
                    __('When your order ships, we send a shipping confirmation email with tracking details when tracking is available. Tracking may take 24-48 hours to update after the carrier receives the shipment.', 'dawp'),
                    __('If the tracking window has passed or movement appears delayed, email support@scottosterbind.com with your order number and tracking number so support can review the shipment history.', 'dawp'),
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
                    __('First check the delivery area, building office, mailroom, household members, neighbors, and local carrier office. If the package still cannot be located, contact us with your order number and tracking number.', 'dawp'),
                    __('If the carrier confirms a package was lost before delivery and the shipping address was correct, we will review the claim and may offer a replacement, store credit, or refund depending on product availability and claim outcome. If tracking confirms delivery to the address provided at checkout, Scott Osterbind is not responsible for theft or loss after delivery, but we will help collect shipment details for a carrier claim when possible.', 'dawp'),
                ],
            ],
        ],
    ],
    [
        'id' => 'faq-returns',
        'label' => __('Returns & Refunds', 'dawp'),
        'accent' => '#F97316',
        'tint' => '#FFF7ED',
        'items' => [
            [
                'question' => __('What is Scott Osterbind\'s return window?', 'dawp'),
                'answer' => [
                    __('You may request a return within 30 days of delivery for eligible items purchased directly from Scott Osterbind. Return approval depends on product condition, order details, and whether the item can be safely and honestly resold.', 'dawp'),
                    __('A return request is not automatically approved. Please wait for return authorization and instructions before shipping anything back.', 'dawp'),
                ],
            ],
            [
                'question' => __('Which returns are eligible?', 'dawp'),
                'answer' => [
                    __('Eligible returns generally must be requested within 30 days of delivery and the item must be unused, unworn, undamaged, and in original condition. Original packaging, tags, documentation, and included parts should be present when applicable.', 'dawp'),
                    __('Proof of purchase is required, such as your order number or order confirmation email. Items marked final sale, clearance, special order, custom, or otherwise non-returnable at purchase may not qualify.', 'dawp'),
                ],
            ],
            [
                'question' => __('Which item conditions are not returnable?', 'dawp'),
                'answer' => [
                    __('Items that have been worn, used, washed, altered, damaged, or missing required packaging may not be returnable. Items damaged by improper care, misuse, storage issues, or customer-caused wear may also be declined.', 'dawp'),
                    __('Returns may be declined if they are outside the 30-day window, missing required labels or packaging, incomplete, final sale, unauthorized, or not in condition suitable for resale.', 'dawp'),
                ],
            ],
            [
                'question' => __('How do I start a return or exchange request?', 'dawp'),
                'answer' => [
                    __('Email support@scottosterbind.com within 30 days of delivery. Include your order number, item name, quantity, reason for return, and clear photos of the item condition, packaging, and shipping label.', 'dawp'),
                    __('After review, support will provide return authorization and instructions if the request is approved. Unauthorized returns may be refused or returned to sender.', 'dawp'),
                ],
            ],
            [
                'question' => __('Who pays for return shipping?', 'dawp'),
                'answer' => [
                    __('Customers are responsible for return shipping costs unless the return is caused by our confirmed error, such as an incorrect, defective, or damaged item confirmed by support.', 'dawp'),
                    __('Use a trackable shipping service for approved returns and keep the carrier receipt until the return is fully resolved.', 'dawp'),
                ],
            ],
            [
                'question' => __('How long do refunds take?', 'dawp'),
                'answer' => [
                    __('Approved refunds are issued to the original payment method used at checkout. Refunds are normally processed within 5-10 business days after we receive and approve the returned item.', 'dawp'),
                    __('Your bank, card issuer, or payment provider may require additional time to post the credit. Original shipping charges, return shipping charges, shipping protection fees, and service fees are non-refundable unless the return is due to our confirmed error.', 'dawp'),
                ],
            ],
            [
                'question' => __('What should I do if my item arrives damaged, defective, or incorrect?', 'dawp'),
                'answer' => [
                    __('Inspect your order as soon as it arrives. If you receive an item that is damaged, defective, missing, or different from what you ordered, contact us within 7 days of delivery.', 'dawp'),
                    __('Include your order number and clear photos of the item, packaging, and shipping label. Keep all packaging until the issue is reviewed.', 'dawp'),
                ],
            ],
        ],
    ],
    [
        'id' => 'faq-products-orders',
        'label' => __('Products & Orders', 'dawp'),
        'accent' => '#111827',
        'tint' => '#F4F6F8',
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
                    __('Contact support@scottosterbind.com as soon as possible if you need to update order details, correct an address, or request cancellation. Changes can only be reviewed before the order has entered fulfillment or shipped.', 'dawp'),
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
        'accent' => '#7A7B52',
        'tint' => '#F8F1E7',
        'items' => [
            [
                'question' => __('How does Scott Osterbind use my personal information?', 'dawp'),
                'answer' => [
                    __('We use personal information to operate the store, process and confirm purchases, process payments through third-party payment processors, fulfill and ship orders, provide tracking, manage returns or refunds, provide customer support, improve the website, prevent fraud, and meet legal obligations.', 'dawp'),
                    __('This may include contact details, order and product information, payment-related references, device and technical data, website usage data, communications, support photos, and marketing preferences where applicable.', 'dawp'),
                ],
            ],
            [
                'question' => __('Does Scott Osterbind store my full credit card number?', 'dawp'),
                'answer' => [
                    __('No. Payment information is processed by trusted third-party payment processors. Scott Osterbind does not store full credit card numbers, card security codes, or complete payment credentials on our website servers.', 'dawp'),
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
                    __('To make a privacy request, contact support@scottosterbind.com. We may need enough information to verify your identity and locate the relevant order, account, or contact record.', 'dawp'),
                ],
            ],
            [
                'question' => __('How can I contact Scott Osterbind support?', 'dawp'),
                'answer' => [
                    __('For shipping, returns, exchanges, refunds, privacy requests, product details, order status, or policy questions, email support@scottosterbind.com with your order number when available.', 'dawp'),
                    __('Our support team typically replies within 1-2 business days, Monday through Friday, excluding holidays. Business hours are Monday - Friday, 9:00 AM - 6:00 PM EST.', 'dawp'),
                ],
            ],
        ],
    ],
];
?>

<div id="primary" class="bg-[#F8F1E7] font-body text-[#24211E]">
    <section class="bg-[#5A3825] py-14 text-white lg:py-20">
        <div class="mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
            <p class="text-sm font-black uppercase tracking-[0.18em] text-[#C8A45D]"><?php esc_html_e('Scott Osterbind Help Center', 'dawp'); ?></p>
            <h1 class="mt-3 font-heading text-4xl font-black leading-tight lg:text-6xl">
                <?php esc_html_e('Frequently Asked Questions', 'dawp'); ?>
            </h1>
            <p class="mx-auto mt-4 max-w-3xl text-lg leading-8 text-[#F8F1E7]">
                <?php esc_html_e('Clear answers about handmade and curated products, checkout, shipping, returns, refunds, privacy, and the terms that apply when you shop with Scott Osterbind.', 'dawp'); ?>
            </p>
            <p class="mt-3 text-sm font-semibold uppercase tracking-wide text-[#B8C3D1]">
                <?php esc_html_e('Last Updated: May 19, 2026', 'dawp'); ?>
            </p>
        </div>
    </section>

    <section class="py-14 lg:py-20">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4 lg:gap-6">
                <div class="rounded-lg border border-[#D8C3A5] border-t-4 border-t-[#9A6242] bg-white p-6 shadow-sm">
                    <p class="text-sm font-bold uppercase tracking-wide text-[#5B6472]"><?php esc_html_e('Processing', 'dawp'); ?></p>
                    <p class="mt-3 font-heading text-2xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('2-4 Business Days', 'dawp'); ?></p>
                </div>
                <div class="rounded-lg border border-[#D8C3A5] border-t-4 border-t-[#9A6242] bg-white p-6 shadow-sm">
                    <p class="text-sm font-bold uppercase tracking-wide text-[#5B6472]"><?php esc_html_e('US Transit', 'dawp'); ?></p>
                    <p class="mt-3 font-heading text-2xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('5-10 Business Days', 'dawp'); ?></p>
                </div>
                <div class="rounded-lg border border-[#D8C3A5] border-t-4 border-t-[#C8A45D] bg-white p-6 shadow-sm">
                    <p class="text-sm font-bold uppercase tracking-wide text-[#5B6472]"><?php esc_html_e('Returns', 'dawp'); ?></p>
                    <p class="mt-3 font-heading text-2xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('30-Day Window', 'dawp'); ?></p>
                </div>
                <div class="rounded-lg border border-[#D8C3A5] border-t-4 border-t-[#7A7B52] bg-white p-6 shadow-sm">
                    <p class="text-sm font-bold uppercase tracking-wide text-[#5B6472]"><?php esc_html_e('Support', 'dawp'); ?></p>
                    <p class="mt-3 font-heading text-2xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('1-2 Business Days', 'dawp'); ?></p>
                </div>
            </div>

            <div class="mt-12 grid gap-10 lg:mt-14 lg:grid-cols-[240px_minmax(0,1fr)] lg:items-start lg:gap-10">
                <aside class="rounded-lg border border-[#E5E7EB] bg-white p-5 shadow-sm lg:sticky lg:top-24">
                    <p class="text-xs font-black uppercase tracking-[0.16em] text-[#5B6472]"><?php esc_html_e('FAQ Sections', 'dawp'); ?></p>
                    <nav class="mt-5 space-y-3" aria-label="<?php esc_attr_e('FAQ sections', 'dawp'); ?>">
                        <?php foreach ($faq_sections as $section) : ?>
                            <a class="block rounded-md border border-transparent px-4 py-3 text-sm font-bold leading-5 text-[#111827] transition hover:border-[var(--faq-accent)] hover:bg-[var(--faq-tint)]" style="--faq-accent: <?php echo esc_attr($section['accent']); ?>; --faq-tint: <?php echo esc_attr($section['tint']); ?>;" href="#<?php echo esc_attr($section['id']); ?>">
                                <?php echo esc_html($section['label']); ?>
                            </a>
                        <?php endforeach; ?>
                    </nav>
                </aside>

                <div class="space-y-10">
                    <?php foreach ($faq_sections as $section) : ?>
                        <section id="<?php echo esc_attr($section['id']); ?>" class="scroll-mt-24 rounded-lg border border-[#E5E7EB] bg-white p-5 shadow-sm sm:p-7 lg:p-10">
                            <div class="mb-6 inline-flex h-12 w-12 items-center justify-center rounded-full text-white" style="background-color: <?php echo esc_attr($section['accent']); ?>;">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h8M8 14h5M5 5h14v12H8l-3 3z" />
                                </svg>
                            </div>
                            <h2 class="font-heading text-3xl font-black leading-tight text-[#0B1F33]"><?php echo esc_html($section['label']); ?></h2>

                            <div class="mt-6 space-y-4">
                                <?php foreach ($section['items'] as $index => $item) : ?>
                                    <details class="group rounded-lg border border-[#E5E7EB] bg-white shadow-sm open:border-[var(--faq-accent)] open:bg-[var(--faq-tint)]" style="--faq-accent: <?php echo esc_attr($section['accent']); ?>; --faq-tint: <?php echo esc_attr($section['tint']); ?>;" <?php echo 0 === $index ? 'open' : ''; ?>>
                                        <summary class="flex cursor-pointer list-none items-start justify-between gap-4 px-5 py-5 text-left marker:hidden">
                                            <span class="font-heading text-lg font-black leading-snug text-[#0B1F33]"><?php echo esc_html($item['question']); ?></span>
                                            <span class="mt-1 inline-flex h-6 w-6 shrink-0 items-center justify-center rounded-full border border-[#D1D5DB] text-[#111827] transition group-open:rotate-45 group-open:border-[var(--faq-accent)] group-open:bg-white">
                                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14M5 12h14" />
                                                </svg>
                                            </span>
                                        </summary>
                                        <div class="border-t border-[#E5E7EB] px-5 pb-5 pt-4 text-base leading-7 text-[#4B5563]">
                                            <?php foreach ($item['answer'] as $paragraph) : ?>
                                                <p class="mb-4 last:mb-0"><?php echo esc_html($paragraph); ?></p>
                                            <?php endforeach; ?>
                                        </div>
                                    </details>
                                <?php endforeach; ?>
                            </div>
                        </section>
                    <?php endforeach; ?>

                    <section class="rounded-lg border border-[#E5E7EB] bg-[#0B1F33] p-6 text-white shadow-sm sm:p-8 lg:p-10">
                        <div class="mx-auto max-w-3xl text-center">
                            <div class="mx-auto mb-5 inline-flex h-12 w-12 items-center justify-center rounded-full bg-[#F97316] text-white">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h2 class="font-heading text-3xl font-black leading-tight"><?php esc_html_e('Still have questions?', 'dawp'); ?></h2>
                            <p class="mx-auto mt-4 max-w-2xl text-base leading-7 text-[#D7DEE8]">
                                <?php esc_html_e('Email support@scottosterbind.com with your order number when available. Support typically replies within 1-2 business days, Monday through Friday, excluding holidays.', 'dawp'); ?>
                            </p>
                            <div class="mt-7 flex flex-col justify-center gap-3 sm:flex-row">
                                <a href="mailto:support@scottosterbind.com" class="inline-flex min-h-12 items-center justify-center rounded-md bg-white px-6 text-sm font-black uppercase tracking-wide text-[#0B1F33] transition hover:bg-[#C8A45D] hover:text-[#24211E]">
                                    <?php esc_html_e('Email Support', 'dawp'); ?>
                                </a>
                                <a href="<?php echo esc_url(home_url('/shipping-returns/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-white/30 px-6 text-sm font-black uppercase tracking-wide text-white transition hover:border-white hover:bg-white/10">
                                    <?php esc_html_e('Shipping & Returns', 'dawp'); ?>
                                </a>
                                <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-white/30 px-6 text-sm font-black uppercase tracking-wide text-white transition hover:border-white hover:bg-white/10">
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
