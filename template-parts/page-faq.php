<?php
/**
 * Template Part: page-faq
 */

$faq_sections = [
    [
        'id'    => 'faq-shipping',
        'label' => __('Shipping & Delivery', 'dawp'),
        'items' => [
            [
                'question' => __('How long does order processing and delivery take?', 'dawp'),
                'answer'   => [
                    ['type' => 'ul', 'items' => [
                        ['label' => __('Processing Time:', 'dawp'), 'text' => __('Most orders are processed within 1-2 business days, Monday through Friday, excluding U.S. public holidays.', 'dawp')],
                        ['label' => __('Transit Time:', 'dawp'), 'text' => __('Standard delivery within the United States takes 3-5 business days.', 'dawp')],
                    ]],
                ],
            ],
            [
                'question' => __('How much does shipping cost?', 'dawp'),
                'answer'   => [
                    ['type' => 'p', 'text' => __('Mytire offers 100% free standard shipping on all tire orders within our standard delivery zones in the United States. There are no hidden shipping fees at checkout.', 'dawp')],
                ],
            ],
            [
                'question' => __('When will I receive my tracking information?', 'dawp'),
                'answer'   => [
                    ['type' => 'p', 'text' => __('Once your order ships, we will send a shipping confirmation email containing your tracking number. Please allow 24-48 hours for tracking status to update on the carrier network.', 'dawp')],
                ],
            ],
            [
                'question' => __('Can I change my shipping address after checkout?', 'dawp'),
                'answer'   => [
                    ['type' => 'p', 'text' => __('Address changes or cancellations can only be made before the order enters fulfillment, usually within a few hours of placement. Email support@Mytire.co immediately if you need to modify your shipping details.', 'dawp')],
                ],
            ],
            [
                'question' => __('What happens if my package is lost or delayed?', 'dawp'),
                'answer'   => [
                    ['type' => 'ul', 'items' => [
                        ['label' => __('Delayed:', 'dawp'), 'text' => __('If your estimated delivery window has passed, contact us so we can investigate with the carrier.', 'dawp')],
                        ['label' => __('Lost in Transit:', 'dawp'), 'text' => __('If a package is confirmed lost before delivery, we will issue a full refund or send a replacement at no extra cost.', 'dawp')],
                        ['label' => __('Missing after Delivery:', 'dawp'), 'text' => __('If tracking shows delivered but you cannot find it, please check with neighbors or local management. We will assist you in filing a carrier claim.', 'dawp')],
                    ]],
                ],
            ],
        ],
    ],
    [
        'id'    => 'faq-returns',
        'label' => __('Returns & Refunds', 'dawp'),
        'items' => [
            [
                'question' => __('What is Mytire\'s return window?', 'dawp'),
                'answer'   => [
                    ['type' => 'p', 'text' => __('You can request a return within 30 days from the date of delivery.', 'dawp')],
                ],
            ],
            [
                'question' => __('Which tires are eligible for a return?', 'dawp'),
                'answer'   => [
                    ['type' => 'p', 'text' => __('To qualify for a return, tires must be unused, unmounted, undriven, undamaged, and in their original condition with original labels, tags, and packaging intact. Proof of purchase is required.', 'dawp')],
                ],
            ],
            [
                'question' => __('Are there any restocking fees?', 'dawp'),
                'answer'   => [
                    ['type' => 'p', 'text' => __('No. Mytire charges $0 restocking fees.', 'dawp')],
                ],
            ],
            [
                'question' => __('Who pays for return shipping?', 'dawp'),
                'answer'   => [
                    ['type' => 'ul', 'items' => [
                        ['label' => __('Our Error:', 'dawp'), 'text' => __('If you receive an incorrect, defective, or damaged tire, Mytire covers 100% of the return shipping costs.', 'dawp')],
                        ['label' => __('Customer Remorse:', 'dawp'), 'text' => __('If you change your mind or ordered the wrong size, the customer is responsible for actual return shipping costs.', 'dawp')],
                    ]],
                ],
            ],
            [
                'question' => __('How long do refunds take to process?', 'dawp'),
                'answer'   => [
                    ['type' => 'p', 'text' => __('Once we receive and inspect your returned tires, approved refunds are issued back to your original payment method within 5-10 business days.', 'dawp')],
                ],
            ],
            [
                'question' => __('What should I do if my tire arrives damaged, defective, or incorrect?', 'dawp'),
                'answer'   => [
                    ['type' => 'p', 'text' => __('Please inspect your tires upon arrival. If there is an issue, contact support@Mytire.co within 7 days of delivery with your order number and clear photos.', 'dawp')],
                ],
            ],
        ],
    ],
    [
        'id'    => 'faq-products-orders',
        'label' => __('Products & Orders', 'dawp'),
        'items' => [
            [
                'question' => __('How do I ensure a tire fits my vehicle?', 'dawp'),
                'answer'   => [
                    ['type' => 'p', 'text' => __('Please double-check tire size, rim size, load index, speed rating, and vehicle compatibility before placing an order. The customer is responsible for ensuring the selected tire matches their vehicle requirements.', 'dawp')],
                ],
            ],
            [
                'question' => __('Can prices change after I place an order?', 'dawp'),
                'answer'   => [
                    ['type' => 'p', 'text' => __('No. While product prices and availability may fluctuate on the website, the price you pay at checkout is locked and guaranteed once the order is confirmed.', 'dawp')],
                ],
            ],
            [
                'question' => __('Can I cancel an order?', 'dawp'),
                'answer'   => [
                    ['type' => 'p', 'text' => __('You can request a cancellation by emailing support@Mytire.co before the item ships. If it has already left our warehouse, please follow the standard 30-day return process.', 'dawp')],
                ],
            ],
        ],
    ],
    [
        'id'    => 'faq-privacy-security',
        'label' => __('Privacy & Security', 'dawp'),
        'items' => [
            [
                'question' => __('Does Mytire store my credit card information?', 'dawp'),
                'answer'   => [
                    ['type' => 'p', 'text' => __('No. Payments are processed through certified, PCI-compliant third-party payment gateways. Mytire never stores or has access to your full credit card numbers or security codes.', 'dawp')],
                ],
            ],
            [
                'question' => __('Do you sell customer personal data?', 'dawp'),
                'answer'   => [
                    ['type' => 'p', 'text' => __('No. We do not sell, rent, trade, or share your contact information with third parties for marketing purposes. Data is only shared with trusted partners strictly to fulfill your order.', 'dawp')],
                ],
            ],
        ],
    ],
];
?>

<div id="primary" class="mytire-policy-page mytire-policy-minimal bg-white font-body text-[#111111]">
    <section class="mytire-policy-cover border-b border-[#111111] bg-white">
        <div class="mx-auto w-full max-w-5xl px-5 py-12 sm:px-6 lg:px-8 lg:py-14">
            <p class="text-xs font-black uppercase tracking-[0.22em] text-[#111111]"><?php esc_html_e('Mytire Help Center', 'dawp'); ?></p>
            <h1 class="mt-4 max-w-3xl font-heading text-4xl font-black leading-tight tracking-normal text-[#111111] md:text-5xl lg:text-6xl">
                <?php esc_html_e('Frequently Asked Questions', 'dawp'); ?>
            </h1>
            <p class="mt-7 max-w-3xl text-base font-semibold leading-7 text-[#333333] md:text-lg">
                <?php esc_html_e('Clear answers about tire fitment, checkout, shipping, returns, refunds, and privacy when you shop with Mytire.', 'dawp'); ?>
            </p>
            <p class="mt-8 inline-flex min-h-11 items-center border border-[#111111] bg-[#111111] px-5 text-sm font-black uppercase tracking-wide text-white">
                <?php esc_html_e('Last Updated: May 19, 2026', 'dawp'); ?>
            </p>
        </div>
    </section>

    <section class="py-12 lg:py-16">
        <div class="mx-auto max-w-5xl px-5 sm:px-6 lg:px-8">
            <div class="grid border border-[#111111] sm:grid-cols-2 lg:grid-cols-4">
                <div class="border-b border-[#111111] bg-white p-5 sm:border-r lg:border-b-0">
                    <p class="text-xs font-black uppercase tracking-[0.2em] text-[#555555]"><?php esc_html_e('Processing', 'dawp'); ?></p>
                    <p class="mt-2 font-heading text-2xl font-black text-[#111111]"><?php esc_html_e('1-2 Business Days', 'dawp'); ?></p>
                </div>
                <div class="border-b border-[#111111] bg-white p-5 lg:border-b-0 lg:border-r">
                    <p class="text-xs font-black uppercase tracking-[0.2em] text-[#555555]"><?php esc_html_e('US Transit', 'dawp'); ?></p>
                    <p class="mt-2 font-heading text-2xl font-black text-[#111111]"><?php esc_html_e('3-5 Business Days', 'dawp'); ?></p>
                </div>
                <div class="border-b border-[#111111] bg-white p-5 sm:border-b-0 sm:border-r">
                    <p class="text-xs font-black uppercase tracking-[0.2em] text-[#555555]"><?php esc_html_e('Shipping Cost', 'dawp'); ?></p>
                    <p class="mt-2 font-heading text-2xl font-black text-[#111111]"><?php esc_html_e('FREE', 'dawp'); ?></p>
                </div>
                <div class="bg-[#111111] p-5 text-white">
                    <p class="text-xs font-black uppercase tracking-[0.2em] text-white/70"><?php esc_html_e('Support', 'dawp'); ?></p>
                    <p class="mt-2 font-heading text-2xl font-black text-white"><?php esc_html_e('1-2 Business Days', 'dawp'); ?></p>
                </div>
            </div>

            <div class="mt-12 space-y-14 lg:mt-14">
                <?php foreach ($faq_sections as $section) : ?>
                    <section id="<?php echo esc_attr($section['id']); ?>" class="scroll-mt-24">
                        <h2 class="border-t border-[#111111] pt-8 font-heading text-3xl font-black leading-tight text-[#111111]"><?php echo esc_html($section['label']); ?></h2>

                        <div class="mt-6 divide-y divide-[#111111] border border-[#111111]">
                            <?php foreach ($section['items'] as $index => $item) : ?>
                                <details class="group bg-white open:bg-[#111111] open:text-white" <?php echo 0 === $index ? 'open' : ''; ?>>
                                    <summary class="flex cursor-pointer list-none items-start justify-between gap-4 px-5 py-5 text-left marker:hidden">
                                        <span class="font-heading text-lg font-black leading-snug"><?php echo esc_html($item['question']); ?></span>
                                        <span class="mt-1 inline-flex h-6 w-6 shrink-0 items-center justify-center border border-current text-current transition group-open:rotate-45">
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14M5 12h14" />
                                            </svg>
                                        </span>
                                    </summary>
                                    <div class="border-t border-current px-5 pb-5 pt-4 text-base leading-7 text-current">
                                        <?php foreach ($item['answer'] as $part) : ?>
                                            <?php if ($part['type'] === 'p') : ?>
                                                <p class="mb-4 last:mb-0"><?php echo esc_html($part['text']); ?></p>
                                            <?php elseif ($part['type'] === 'ul') : ?>
                                                <ul class="mb-4 list-disc space-y-2 pl-6 last:mb-0">
                                                    <?php foreach ($part['items'] as $li) : ?>
                                                        <li class="leading-7">
                                                            <?php if (!empty($li['label'])) : ?>
                                                                <strong class="font-bold"><?php echo esc_html($li['label']); ?></strong>
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

                <section class="border border-[#111111] bg-white p-6 sm:p-8 lg:p-10">
                    <h2 class="font-heading text-3xl font-black leading-tight text-[#111111]"><?php esc_html_e('Contact Support', 'dawp'); ?></h2>
                    <p class="mt-4 max-w-2xl text-base leading-7 text-[#333333]"><?php esc_html_e('Still have questions? We are here to help.', 'dawp'); ?></p>
                    <ul class="mt-5 space-y-2 text-sm leading-7 text-[#222222]">
                        <li><strong><?php esc_html_e('Company:', 'dawp'); ?></strong> <?php esc_html_e('TIRE CAPITAL LLC', 'dawp'); ?></li>
                        <li><strong><?php esc_html_e('Address:', 'dawp'); ?></strong> <?php esc_html_e('324 W Dickerson Ln, Middletown, DE 19709-8832', 'dawp'); ?></li>
                        <li><strong><?php esc_html_e('Email:', 'dawp'); ?></strong> <a href="mailto:support@Mytire.co" class="font-bold text-[#111111] underline decoration-2 underline-offset-4 hover:no-underline">support@Mytire.co</a></li>
                        <li><strong><?php esc_html_e('Business Hours:', 'dawp'); ?></strong> <?php esc_html_e('Monday - Friday, 9:00 AM - 5:00 PM (GMT-05:00) Eastern Standard Time (New York)', 'dawp'); ?></li>
                        <li><strong><?php esc_html_e('Response Time:', 'dawp'); ?></strong> <?php esc_html_e('We typically reply to all inquiries within 1-2 business days.', 'dawp'); ?></li>
                    </ul>
                    <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                        <a href="mailto:support@Mytire.co" class="inline-flex min-h-12 items-center justify-center border border-[#111111] bg-[#111111] px-6 text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-[#111111]">
                            <?php esc_html_e('Email Support', 'dawp'); ?>
                        </a>
                        <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>" class="inline-flex min-h-12 items-center justify-center border border-[#111111] px-6 text-sm font-black uppercase tracking-wide text-[#111111] transition hover:bg-[#111111] hover:text-white">
                            <?php esc_html_e('Shipping Policy', 'dawp'); ?>
                        </a>
                        <a href="<?php echo esc_url(home_url('/returns-policy/')); ?>" class="inline-flex min-h-12 items-center justify-center border border-[#111111] px-6 text-sm font-black uppercase tracking-wide text-[#111111] transition hover:bg-[#111111] hover:text-white">
                            <?php esc_html_e('Return & Refund Policy', 'dawp'); ?>
                        </a>
                    </div>
                </section>
            </div>
        </div>
    </section>
</div>
