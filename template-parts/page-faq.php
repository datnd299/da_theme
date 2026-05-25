<?php
/**
 * FAQ template part.
 *
 * @package dawp
 */

$faq_highlights = [
    [
        'number' => '01',
        'title'  => __('Orders', 'dawp'),
        'copy'   => __('Find help with checkout, confirmations, order updates, and order details.', 'dawp'),
        'color'  => '#2563EB',
    ],
    [
        'number' => '02',
        'title'  => __('Shipping', 'dawp'),
        'copy'   => __('Review cutoff timing, handling, delivery estimates, and tracking updates.', 'dawp'),
        'color'  => '#06B6D4',
    ],
    [
        'number' => '03',
        'title'  => __('Returns', 'dawp'),
        'copy'   => __('Understand 30-day return eligibility, exchanges, labels, and refund timing.', 'dawp'),
        'color'  => '#C026D3',
    ],
    [
        'number' => '04',
        'title'  => __('Support', 'dawp'),
        'copy'   => __('Contact our team for product, order, shipping, return, and privacy questions.', 'dawp'),
        'color'  => '#65A30D',
    ],
];

$faq_sections = [
    [
        'id'      => 'shopping',
        'eyebrow' => __('Shopping & Products', 'dawp'),
        'title'   => __('Everyday essentials and lifestyle finds.', 'dawp'),
        'items'   => [
            [
                'question' => __('What does Elite Shop Express sell?', 'dawp'),
                'answer'   => __('Elite Shop Express offers practical everyday products across home essentials, beauty and personal care accessories, fashion accessories, lifestyle accessories, and giftable finds.', 'dawp'),
            ],
            [
                'question' => __('Are your products medical treatments or branded replicas?', 'dawp'),
                'answer'   => __('No. Our store is focused on mainstream lifestyle products and practical accessories. We do not position products as medical treatments, miracle solutions, counterfeit goods, luxury replicas, or unsupported branded items.', 'dawp'),
            ],
            [
                'question' => __('How should I choose the right product?', 'dawp'),
                'answer'   => __('Please review each product page for the item type, intended use, key features, sizing or material details where relevant, included items, and care or use notes. Contact support before ordering if you need help with a product detail.', 'dawp'),
            ],
        ],
    ],
    [
        'id'      => 'orders',
        'eyebrow' => __('Orders & Payment', 'dawp'),
        'title'   => __('Checkout, confirmations, and order accuracy.', 'dawp'),
        'items'   => [
            [
                'question' => __('What happens after I place an order?', 'dawp'),
                'answer'   => __('After checkout, your order is reviewed and prepared for fulfillment. You should receive order information using the contact details provided at checkout, and tracking is provided once available.', 'dawp'),
            ],
            [
                'question' => __('Can I change my shipping address after ordering?', 'dawp'),
                'answer'   => __('Contact support as soon as possible with your order number and checkout email address. We cannot guarantee changes after an order begins fulfillment or has shipped, so accurate checkout information is important.', 'dawp'),
            ],
            [
                'question' => __('Why was my order not accepted or delayed?', 'dawp'),
                'answer'   => __('Orders may be delayed or unable to be fulfilled because of incorrect shipping information, payment review, suspected fraud, inventory issues, pricing errors, carrier interruptions, holidays, or other fulfillment restrictions.', 'dawp'),
            ],
        ],
    ],
    [
        'id'      => 'shipping',
        'eyebrow' => __('Shipping & Tracking', 'dawp'),
        'title'   => __('Delivery timing and shipment updates.', 'dawp'),
        'items'   => [
            [
                'question' => __('What is your order cutoff time?', 'dawp'),
                'answer'   => __('Elite Shop Express uses a 2:00 PM Pacific Standard Time order cutoff. Orders placed after the cutoff may begin processing on the next eligible fulfillment day.', 'dawp'),
            ],
            [
                'question' => __('How long does delivery take?', 'dawp'),
                'answer'   => __('Our current Shipping & Returns policy lists handling time as 0-1 business days, Monday through Saturday, and total estimated delivery time as 0-1 business days for all destinations. Public holidays, carrier interruptions, address issues, or payment review may affect this estimate.', 'dawp'),
            ],
            [
                'question' => __('When will I receive tracking information?', 'dawp'),
                'answer'   => __('Tracking information is provided once available. Please allow time for the carrier tracking page to update after a tracking number is created.', 'dawp'),
            ],
            [
                'question' => __('Where can I track my order?', 'dawp'),
                'answer'   => __('Use the Track Order page with your order details to review shipment updates. If tracking is not updating, contact support with your order number and checkout email address.', 'dawp'),
            ],
        ],
    ],
    [
        'id'      => 'returns',
        'eyebrow' => __('Returns & Refunds', 'dawp'),
        'title'   => __('Return eligibility, exchanges, and refund review.', 'dawp'),
        'items'   => [
            [
                'question' => __('What is your return window?', 'dawp'),
                'answer'   => __('Return requests must be made within 30 days. Eligible products must be new, unopened in original packaging, or otherwise unused.', 'dawp'),
            ],
            [
                'question' => __('Do you accept exchanges?', 'dawp'),
                'answer'   => __('Yes. We accept exchanges for eligible products by mail. Contact support before sending anything back so our team can review your request and provide the next steps.', 'dawp'),
            ],
            [
                'question' => __('Who pays for return shipping?', 'dawp'),
                'answer'   => __('Return label cost is the customer\'s responsibility unless support confirms otherwise for an approved order issue. Return labels are download-and-print labels when available.', 'dawp'),
            ],
            [
                'question' => __('When are refunds processed?', 'dawp'),
                'answer'   => __('Approved refunds are processed within 10 days after the returned item is received and reviewed. Your bank, card provider, or payment service may take additional time to post the refund.', 'dawp'),
            ],
            [
                'question' => __('What should I do if my item arrives damaged, incorrect, or missing?', 'dawp'),
                'answer'   => __('Contact us as soon as possible with your order number and clear photos of the product, packaging, and shipping label where relevant. Our support team will review the issue and help with the next available resolution.', 'dawp'),
            ],
        ],
    ],
    [
        'id'      => 'privacy',
        'eyebrow' => __('Privacy & Support', 'dawp'),
        'title'   => __('Customer information and contact details.', 'dawp'),
        'items'   => [
            [
                'question' => __('How do you use customer information?', 'dawp'),
                'answer'   => __('Customer information may be used to process orders, send confirmations, provide shipping and tracking updates, respond to support requests, manage returns and refunds, improve website performance, prevent misuse, and comply with applicable obligations.', 'dawp'),
            ],
            [
                'question' => __('Do you share information with service providers?', 'dawp'),
                'answer'   => __('We may share information with trusted service providers that help operate the store, including payment processors, shipping carriers, fulfillment partners, analytics providers, email services, fraud prevention tools, and customer support systems.', 'dawp'),
            ],
            [
                'question' => __('How can I contact Elite Shop Express?', 'dawp'),
                'answer'   => __('Email support@eliteshopexpress.com for order, shipping, return, product, account, or privacy questions. Support is available Monday through Friday, 9:00 AM - 6:00 PM EST.', 'dawp'),
            ],
        ],
    ],
];

$schema_questions = [];
foreach ($faq_sections as $section) {
    foreach ($section['items'] as $item) {
        $schema_questions[] = [
            '@type'          => 'Question',
            'name'           => wp_strip_all_tags($item['question']),
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text'  => wp_strip_all_tags($item['answer']),
            ],
        ];
    }
}

$faq_schema = [
    '@context'   => 'https://schema.org',
    '@type'      => 'FAQPage',
    'mainEntity' => $schema_questions,
];
?>

<div class="bg-white font-body text-[#101828]">
    <script type="application/ld+json">
        <?php echo wp_json_encode($faq_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
    </script>

    <section class="relative overflow-hidden bg-[#F3F7FB]">
        <div class="relative mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
            <div class="max-w-4xl">
                <p class="mb-5 inline-flex rounded-full bg-[#DBEAFE] px-4 py-2 text-xs font-black uppercase tracking-[0.18em] text-[#2563EB]">
                    <?php esc_html_e('Frequently Asked Questions', 'dawp'); ?>
                </p>
                <h1 class="font-heading text-4xl font-black uppercase leading-[0.98] text-[#101828] sm:text-5xl lg:text-[4.25rem]">
                    <?php esc_html_e('Clear answers for shopping with Elite Shop Express.', 'dawp'); ?>
                </h1>
                <p class="mt-6 max-w-2xl text-lg leading-8 text-[#475467]">
                    <?php esc_html_e('Find common information about everyday products, checkout, shipping, tracking, returns, refunds, privacy, and support before or after placing an order.', 'dawp'); ?>
                </p>
            </div>

            <div class="mt-10 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <?php foreach ($faq_highlights as $item) : ?>
                    <article class="border border-[#E5E7EB] bg-white p-6 shadow-sm">
                        <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full text-sm font-black text-white" style="background-color: <?php echo esc_attr($item['color']); ?>">
                            <?php echo esc_html($item['number']); ?>
                        </div>
                        <h2 class="font-heading text-xl font-black uppercase leading-tight text-[#101828]">
                            <?php echo esc_html($item['title']); ?>
                        </h2>
                        <p class="mt-3 text-sm leading-6 text-[#475467]">
                            <?php echo esc_html($item['copy']); ?>
                        </p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 sm:px-6 lg:grid-cols-[0.82fr_1.18fr] lg:px-8">
            <aside class="lg:sticky lg:top-32 lg:self-start">
                <div class="rounded-[2rem] bg-[#101828] p-7 text-white shadow-xl shadow-[#101828]/10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#67E8F9]"><?php esc_html_e('FAQ Topics', 'dawp'); ?></p>
                    <h2 class="font-heading text-3xl font-black uppercase leading-tight"><?php esc_html_e('Jump to a topic.', 'dawp'); ?></h2>
                    <nav class="mt-7 grid gap-3 text-sm font-black uppercase tracking-wide text-white/85" aria-label="<?php esc_attr_e('FAQ navigation', 'dawp'); ?>">
                        <?php foreach ($faq_sections as $section) : ?>
                            <a href="#<?php echo esc_attr($section['id']); ?>" class="rounded-2xl border border-white/10 px-4 py-3 transition hover:border-[#67E8F9] hover:text-[#67E8F9]">
                                <?php echo esc_html($section['eyebrow']); ?>
                            </a>
                        <?php endforeach; ?>
                    </nav>
                </div>
            </aside>

            <div class="space-y-6">
                <?php foreach ($faq_sections as $section) : ?>
                    <section id="<?php echo esc_attr($section['id']); ?>" class="border border-[#E5E7EB] bg-[#F8FAFC] p-7 lg:p-10">
                        <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#2563EB]"><?php echo esc_html($section['eyebrow']); ?></p>
                        <h2 class="font-heading text-3xl font-black uppercase leading-tight text-[#101828] lg:text-4xl"><?php echo esc_html($section['title']); ?></h2>

                        <div class="mt-7 space-y-4">
                            <?php foreach ($section['items'] as $item) : ?>
                                <details class="group border border-[#E5E7EB] bg-white p-5 shadow-sm">
                                    <summary class="flex cursor-pointer list-none items-start justify-between gap-5 font-heading text-lg font-black uppercase leading-tight text-[#101828]">
                                        <span><?php echo esc_html($item['question']); ?></span>
                                        <span class="mt-1 flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#DBEAFE] text-sm text-[#2563EB] transition group-open:rotate-45">+</span>
                                    </summary>
                                    <p class="mt-4 text-base leading-8 text-[#475467]">
                                        <?php echo esc_html($item['answer']); ?>
                                    </p>
                                </details>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-[#101828] py-12 text-white lg:py-16">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-8 px-4 sm:px-6 lg:grid-cols-[0.74fr_1.26fr] lg:items-start lg:px-8">
            <div class="max-w-xl">
                <p class="mb-2 text-xs font-black uppercase tracking-[0.18em] text-[#67E8F9]"><?php esc_html_e('Still Need Help?', 'dawp'); ?></p>
                <h2 class="font-heading text-3xl font-black uppercase leading-tight lg:text-[2.1rem]"><?php esc_html_e('Use the full policy pages or contact support.', 'dawp'); ?></h2>
                <p class="mt-3 text-sm leading-7 text-white/72"><?php esc_html_e('For order-related questions, include your order number and the email address used at checkout so our team can review your request clearly.', 'dawp'); ?></p>
            </div>
            <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                <a href="<?php echo esc_url(home_url('/shipping-returns/')); ?>" class="border border-white/10 bg-white/[0.04] p-5 transition hover:bg-white hover:text-[#101828]">
                    <span class="text-xs font-black uppercase tracking-[0.18em] text-[#67E8F9]"><?php esc_html_e('Policy', 'dawp'); ?></span>
                    <span class="mt-3 block font-heading text-lg font-black uppercase leading-tight"><?php esc_html_e('Shipping & Returns', 'dawp'); ?></span>
                    <span class="mt-2 block text-sm leading-6 text-white/65"><?php esc_html_e('Review delivery estimates, 30-day returns, exchanges, labels, and refunds.', 'dawp'); ?></span>
                </a>
                <a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="border border-white/10 bg-white/[0.04] p-5 transition hover:bg-white hover:text-[#101828]">
                    <span class="text-xs font-black uppercase tracking-[0.18em] text-[#67E8F9]"><?php esc_html_e('Tracking', 'dawp'); ?></span>
                    <span class="mt-3 block font-heading text-lg font-black uppercase leading-tight"><?php esc_html_e('Track Order', 'dawp'); ?></span>
                    <span class="mt-2 block text-sm leading-6 text-white/65"><?php esc_html_e('Use your order details to review available shipment updates.', 'dawp'); ?></span>
                </a>
                <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>" class="border border-white/10 bg-white/[0.04] p-5 transition hover:bg-white hover:text-[#101828]">
                    <span class="text-xs font-black uppercase tracking-[0.18em] text-[#67E8F9]"><?php esc_html_e('Privacy', 'dawp'); ?></span>
                    <span class="mt-3 block font-heading text-lg font-black uppercase leading-tight"><?php esc_html_e('Privacy Policy', 'dawp'); ?></span>
                    <span class="mt-2 block text-sm leading-6 text-white/65"><?php esc_html_e('Learn how order, support, and website information may be handled.', 'dawp'); ?></span>
                </a>
                <a href="mailto:support@eliteshopexpress.com" class="border border-white/10 bg-white/[0.04] p-5 transition hover:bg-white hover:text-[#101828]">
                    <span class="text-xs font-black uppercase tracking-[0.18em] text-[#67E8F9]"><?php esc_html_e('Email', 'dawp'); ?></span>
                    <span class="mt-3 block break-words font-heading text-lg font-black uppercase leading-tight">support@eliteshopexpress.com</span>
                    <span class="mt-2 block text-sm leading-6 text-white/65"><?php esc_html_e('Monday - Friday, 9:00 AM - 6:00 PM EST.', 'dawp'); ?></span>
                </a>
            </div>
        </div>
    </section>
</div>
