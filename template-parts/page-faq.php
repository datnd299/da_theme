<?php
/**
 * Template Part: page-faq
 */

$faq_sections = [
    [
        'id'     => 'faq-shipping',
        'label'  => __('🚚 Shipping & Delivery', 'dawp'),
        'accent' => '#2563EB',
        'tint'   => '#EFF6FF',
        'items'  => [
            [
                'question' => __('How long does order processing and delivery take?', 'dawp'),
                'answer'   => [
                    ['type' => 'ul', 'items' => [
                        ['label' => __('Processing Time:', 'dawp'), 'text' => __('Most orders are processed within 1–2 business days (Monday through Friday, excluding U.S. public holidays).', 'dawp')],
                        ['label' => __('Transit Time:', 'dawp'),    'text' => __('Standard delivery within the United States takes 3–5 business days.', 'dawp')],
                    ]],
                ],
            ],
            [
                'question' => __('How much does shipping cost?', 'dawp'),
                'answer'   => [
                    ['type' => 'p', 'text' => __('Tizezap offers 100% FREE Standard Shipping on all tire orders within our standard delivery zones in the United States. There are no hidden shipping fees at checkout.', 'dawp')],
                ],
            ],
            [
                'question' => __('When will I receive my tracking information?', 'dawp'),
                'answer'   => [
                    ['type' => 'p', 'text' => __('Once your order ships, we will automatically send you a shipping confirmation email containing your tracking number. Please allow 24–48 hours for the tracking status to update on the carrier\'s network.', 'dawp')],
                ],
            ],
            [
                'question' => __('Can I change my shipping address after checkout?', 'dawp'),
                'answer'   => [
                    ['type' => 'p', 'text' => __('Address changes or cancellations can only be made before the order enters the fulfillment process (usually within a few hours of placement). Please email support@tizezap.com immediately if you need to modify your shipping details.', 'dawp')],
                ],
            ],
            [
                'question' => __('What happens if my package is lost or delayed?', 'dawp'),
                'answer'   => [
                    ['type' => 'ul', 'items' => [
                        ['label' => __('Delayed:', 'dawp'),               'text' => __('If your estimated delivery window has passed, contact us so we can investigate with the carrier.', 'dawp')],
                        ['label' => __('Lost in Transit:', 'dawp'),        'text' => __('If a package is confirmed lost by the carrier prior to delivery, we will issue a full refund or send a replacement at no extra cost.', 'dawp')],
                        ['label' => __('Missing after Delivery:', 'dawp'), 'text' => __('If tracking shows "Delivered" but you cannot find it, please check with neighbors or local management. While we are not responsible for theft after delivery, we will actively assist you in filing a carrier claim.', 'dawp')],
                    ]],
                ],
            ],
        ],
    ],
    [
        'id'     => 'faq-returns',
        'label'  => __('🔄 Returns & Refunds', 'dawp'),
        'accent' => '#F97316',
        'tint'   => '#FFF7ED',
        'items'  => [
            [
                'question' => __('What is Tizezap\'s return window?', 'dawp'),
                'answer'   => [
                    ['type' => 'p', 'text' => __('You can request a return within 30 days from the date of delivery.', 'dawp')],
                ],
            ],
            [
                'question' => __('Which tires are eligible for a return?', 'dawp'),
                'answer'   => [
                    ['type' => 'p', 'text' => __('To qualify for a full return, tires must be unused, unmounted, undriven, undamaged, and in their original condition with all original labels and tags intact. Proof of purchase (order number) is required.', 'dawp')],
                ],
            ],
            [
                'question' => __('Are there any restocking fees?', 'dawp'),
                'answer'   => [
                    ['type' => 'p', 'text' => __('No. Tizezap charges $0 restocking fees.', 'dawp')],
                ],
            ],
            [
                'question' => __('Who pays for the return shipping cost?', 'dawp'),
                'answer'   => [
                    ['type' => 'ul', 'items' => [
                        ['label' => __('Our Error:', 'dawp'),          'text' => __('If you receive an incorrect, defective, or damaged tire, Tizezap covers 100% of the return shipping costs.', 'dawp')],
                        ['label' => __('Customer Remorse:', 'dawp'),   'text' => __('If you change your mind or ordered the wrong size, the customer is responsible for the return shipping costs.', 'dawp')],
                    ]],
                ],
            ],
            [
                'question' => __('How long do refunds take to process?', 'dawp'),
                'answer'   => [
                    ['type' => 'p', 'text' => __('Once we receive and inspect your returned tires, we will notify you via email. Approved refunds are issued back to your original payment method within 5–10 business days.', 'dawp')],
                ],
            ],
            [
                'question' => __('What should I do if my tire arrives damaged, defective, or incorrect?', 'dawp'),
                'answer'   => [
                    ['type' => 'p', 'text' => __('Please inspect your tires upon arrival. If there is an issue, contact us at support@tizezap.com within 7 days of delivery with your order number and clear photos of the tire, sidewall specs, and shipping label. We will arrange a free replacement or a full refund.', 'dawp')],
                ],
            ],
        ],
    ],
    [
        'id'     => 'faq-products-orders',
        'label'  => __('🛒 Products & Orders', 'dawp'),
        'accent' => '#111827',
        'tint'   => '#F4F6F8',
        'items'  => [
            [
                'question' => __('How do I ensure a tire fits my vehicle?', 'dawp'),
                'answer'   => [
                    ['type' => 'p', 'text' => __('Please double-check your tire size, rim size, load index, speed rating, and vehicle compatibility before placing an order. While we provide detailed product specifications to guide you, the customer is responsible for ensuring the selected tire matches their vehicle\'s requirements.', 'dawp')],
                ],
            ],
            [
                'question' => __('Can prices change after I place an order?', 'dawp'),
                'answer'   => [
                    ['type' => 'p', 'text' => __('No. While product prices and availability may fluctuate on our website due to market conditions, the price you pay at checkout is locked and guaranteed. We will never charge you more after an order is confirmed.', 'dawp')],
                ],
            ],
            [
                'question' => __('Can I cancel an order?', 'dawp'),
                'answer'   => [
                    ['type' => 'p', 'text' => __('You can request a cancellation by emailing support@tizezap.com before the item is shipped. If the item has already left our warehouse, please follow our standard 30-day return process.', 'dawp')],
                ],
            ],
        ],
    ],
    [
        'id'     => 'faq-privacy-security',
        'label'  => __('🔒 Privacy & Security', 'dawp'),
        'accent' => '#2563EB',
        'tint'   => '#EFF6FF',
        'items'  => [
            [
                'question' => __('Does Tizezap store my credit card information?', 'dawp'),
                'answer'   => [
                    ['type' => 'p', 'text' => __('No. Your checkout process is 100% secured by Secure Socket Layer (SSL) encryption. All payments are processed directly through certified, PCI-compliant third-party payment gateways. Tizezap never stores or has access to your full credit card numbers or security codes.', 'dawp')],
                ],
            ],
            [
                'question' => __('Do you sell customer personal data?', 'dawp'),
                'answer'   => [
                    ['type' => 'p', 'text' => __('Absolutely not. We do not sell, rent, trade, or share your contact information with third parties for marketing purposes. Your data is only shared with trusted partners (like shipping carriers and payment processors) strictly to fulfill your order.', 'dawp')],
                ],
            ],
        ],
    ],
];
?>

<div id="primary" class="bg-[#F4F6F8] font-body text-[#111827]">
    <section class="bg-[#0B1F33] py-14 text-white lg:py-20">
        <div class="mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
            <p class="text-sm font-black uppercase tracking-[0.18em] text-[#F97316]"><?php esc_html_e('Tizezap Help Center', 'dawp'); ?></p>
            <h1 class="mt-3 font-heading text-4xl font-black leading-tight lg:text-6xl">
                <?php esc_html_e('Frequently Asked Questions', 'dawp'); ?>
            </h1>
            <p class="mx-auto mt-4 max-w-3xl text-lg leading-8 text-[#D7DEE8]">
                <?php esc_html_e('Clear, transparent answers about tire fitment, checkout, shipping, returns, refunds, and privacy when you shop with Tizezap.', 'dawp'); ?>
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
                    <p class="mt-3 font-heading text-2xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('1-2 Business Days', 'dawp'); ?></p>
                </div>
                <div class="rounded-lg border border-[#E5E7EB] border-t-4 border-t-[#2563EB] bg-white p-6 shadow-sm">
                    <p class="text-sm font-bold uppercase tracking-wide text-[#5B6472]"><?php esc_html_e('US Transit', 'dawp'); ?></p>
                    <p class="mt-3 font-heading text-2xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('3-5 Business Days', 'dawp'); ?></p>
                </div>
                <div class="rounded-lg border border-[#E5E7EB] border-t-4 border-t-[#F97316] bg-white p-6 shadow-sm">
                    <p class="text-sm font-bold uppercase tracking-wide text-[#5B6472]"><?php esc_html_e('Shipping Cost', 'dawp'); ?></p>
                    <p class="mt-3 font-heading text-2xl font-black leading-snug text-[#0B1F33]"><?php esc_html_e('FREE', 'dawp'); ?></p>
                </div>
                <div class="rounded-lg border border-[#E5E7EB] border-t-4 border-t-[#111827] bg-white p-6 shadow-sm">
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
                                            <?php foreach ($item['answer'] as $part) : ?>
                                                <?php if ($part['type'] === 'p') : ?>
                                                    <p class="mb-4 last:mb-0"><?php echo esc_html($part['text']); ?></p>
                                                <?php elseif ($part['type'] === 'ul') : ?>
                                                    <ul class="mb-4 list-disc space-y-2 pl-6 last:mb-0">
                                                        <?php foreach ($part['items'] as $li) : ?>
                                                            <li class="leading-7">
                                                                <?php if (!empty($li['label'])) : ?>
                                                                    <strong class="font-bold text-[#111827]"><?php echo esc_html($li['label']); ?></strong>
                                                                    <?php echo ' ' . esc_html($li['text']); ?>
                                                                <?php else : ?>
                                                                    <?php echo esc_html($li['text']); ?>
                                                                <?php endif; ?>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                <?php endif; ?>
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
                            <h2 class="font-heading text-3xl font-black leading-tight"><?php esc_html_e('📞 Contact Support', 'dawp'); ?></h2>
                            <p class="mx-auto mt-4 max-w-2xl text-base leading-7 text-[#D7DEE8]">
                                <?php esc_html_e('Still have questions? We are here to help!', 'dawp'); ?>
                            </p>
                            <ul class="mt-5 space-y-2 text-sm leading-7 text-[#D7DEE8]">
                                <li><strong class="text-white"><?php esc_html_e('Email:', 'dawp'); ?></strong> <a href="mailto:support@tizezap.com" class="text-[#93C5FD] transition hover:text-white">support@tizezap.com</a></li>
                                <li><strong class="text-white"><?php esc_html_e('Business Hours:', 'dawp'); ?></strong> <?php esc_html_e('Monday – Friday, 9:00 AM – 6:00 PM EST', 'dawp'); ?></li>
                                <li><strong class="text-white"><?php esc_html_e('Response Time:', 'dawp'); ?></strong> <?php esc_html_e('We typically reply to all inquiries within 1–2 business days.', 'dawp'); ?></li>
                            </ul>
                            <div class="mt-7 flex flex-col justify-center gap-3 sm:flex-row">
                                <a href="mailto:support@tizezap.com" class="inline-flex min-h-12 items-center justify-center rounded-md bg-white px-6 text-sm font-black uppercase tracking-wide text-[#0B1F33] transition hover:bg-[#F97316] hover:text-white">
                                    <?php esc_html_e('Email Support', 'dawp'); ?>
                                </a>
                                <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-white/30 px-6 text-sm font-black uppercase tracking-wide text-white transition hover:border-white hover:bg-white/10">
                                    <?php esc_html_e('Shipping Policy', 'dawp'); ?>
                                </a>
                                <a href="<?php echo esc_url(home_url('/returns-policy/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-white/30 px-6 text-sm font-black uppercase tracking-wide text-white transition hover:border-white hover:bg-white/10">
                                    <?php esc_html_e('Return & Refund Policy', 'dawp'); ?>
                                </a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
</div>
