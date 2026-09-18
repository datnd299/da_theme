<?php
/**
 * FAQ page — Eliteshop Express.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email  = 'support@eliteshopexpress.com';
$business_hours = __('Monday - Friday, 9:00 AM - 6:00 PM EST', 'dawp');
$shop_url       = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$shipping_url = home_url('/shipping-returns/');
$privacy_url  = home_url('/privacy-policy/');
$terms_url    = home_url('/terms-conditions/');
$track_url    = home_url('/track-order/');
$contact_url  = home_url('/contact-us/');

$faq_groups = [
    [
        'label' => __('Personalization', 'dawp'),
        'items' => [
            [
                'question' => __('How does personalization work?', 'dawp'),
                'answer'   => __('Pick a product, then add your name, text, or a photo where the design allows it. You\'ll see a live preview before adding it to your cart — nothing prints until you approve it.', 'dawp'),
            ],
            [
                'question' => __('Can I edit my personalization after ordering?', 'dawp'),
                'answer'   => __('Contact support immediately with your order number. We can usually update text before an order enters production, but cannot guarantee changes once printing has started.', 'dawp'),
            ],
            [
                'question' => __('What if I misspell my personalization text?', 'dawp'),
                'answer'   => __('Double-check the live preview before checkout — it prints exactly as entered. If you catch a mistake right after ordering, contact us right away.', 'dawp'),
            ],
            [
                'question' => __('Can I upload a photo for a pet portrait design?', 'dawp'),
                'answer'   => __('Yes, on designs that support it. Use a clear, well-lit photo for the best print quality.', 'dawp'),
            ],
        ],
    ],
    [
        'label' => __('Orders & Shipping', 'dawp'),
        'items' => [
            [
                'question' => __('How long does order processing take?', 'dawp'),
                'answer'   => __('Each personalized item is printed to order within 2-4 business days before dispatch. Processing does not include weekends or holidays.', 'dawp'),
            ],
            [
                'question' => __('How long does standard US shipping take?', 'dawp'),
                'answer'   => __('After dispatch, standard US shipping typically takes 5-7 business days. We currently ship within the United States only.', 'dawp'),
            ],
            [
                'question' => __('Will I receive tracking information?', 'dawp'),
                'answer'   => __('Yes. Tracking information is emailed once your order ships, and you can look it up any time on our Track Order page.', 'dawp'),
            ],
            [
                'question' => __('Do you offer free shipping?', 'dawp'),
                'answer'   => __('Yes — orders over $50 shipped within the US ship free automatically at checkout.', 'dawp'),
            ],
        ],
    ],
    [
        'label' => __('Returns & Refunds', 'dawp'),
        'items' => [
            [
                'question' => __('Can I return a personalized item?', 'dawp'),
                'answer'   => __('Because every item is printed specifically for you, personalized orders are final sale once production starts. This does not affect your rights if the item arrives damaged, defective, or misprinted.', 'dawp'),
            ],
            [
                'question' => __('What if my order arrives damaged or misprinted?', 'dawp'),
                'answer'   => __('Email us a photo of the item within 30 days of delivery and we will send a free replacement or a full refund — no return shipping required.', 'dawp'),
            ],
            [
                'question' => __('I ordered the wrong size — what now?', 'dawp'),
                'answer'   => __('Contact support with your order number as soon as possible. If production hasn\'t started, we can usually update the size for you.', 'dawp'),
            ],
        ],
    ],
    [
        'label' => __('Products & Sizing', 'dawp'),
        'items' => [
            [
                'question' => __('What products does Eliteshop Express sell?', 'dawp'),
                'answer'   => __('Personalized T-shirts, hoodies, long sleeve tees, crewnecks, and tank tops for men, women, and kids, all printed to order in the USA.', 'dawp'),
            ],
            [
                'question' => __('How do I find my size?', 'dawp'),
                'answer'   => __('Each product page includes a US size chart in inches. When between sizes, we generally recommend sizing up for a relaxed fit.', 'dawp'),
            ],
            [
                'question' => __('How should I care for a personalized print?', 'dawp'),
                'answer'   => __('Machine wash cold, inside out, and tumble dry low or hang dry to keep the print looking sharp for longer.', 'dawp'),
            ],
        ],
    ],
    [
        'label' => __('Payment, Privacy & Support', 'dawp'),
        'items' => [
            [
                'question' => __('Is checkout secure?', 'dawp'),
                'answer'   => __('Payments are processed through secure, third-party payment providers. Eliteshop Express does not store full payment card numbers on its own systems.', 'dawp'),
            ],
            [
                'question' => __('How is my information used?', 'dawp'),
                'answer'   => __('Customer information — including any personalization text or photos you submit — is used to process and print your order, provide support, and prevent fraud. See our Privacy Policy for more detail.', 'dawp'),
            ],
            [
                'question' => __('How do I contact support?', 'dawp'),
                'answer'   => sprintf(
                    /* translators: 1: email address, 2: business hours */
                    __('Email %1$s. Business hours are %2$s.', 'dawp'),
                    $support_email,
                    $business_hours
                ),
            ],
        ],
    ],
];

$quick_links = [
    [
        'title' => __('Track Order', 'dawp'),
        'copy'  => __('Use your order details to check shipment status.', 'dawp'),
        'url'   => $track_url,
    ],
    [
        'title' => __('Shipping & Returns', 'dawp'),
        'copy'  => __('Review processing, delivery estimates, and our custom-print return policy.', 'dawp'),
        'url'   => $shipping_url,
    ],
    [
        'title' => __('Privacy Policy', 'dawp'),
        'copy'  => __('Learn how customer information is collected, used, and protected.', 'dawp'),
        'url'   => $privacy_url,
    ],
    [
        'title' => __('Terms & Conditions', 'dawp'),
        'copy'  => __('Read the store terms for website use and purchases.', 'dawp'),
        'url'   => $terms_url,
    ],
];
?>

<div class="bg-white text-[#111827]">
    <section class="bg-[#F9FAFB] py-14 sm:py-20" aria-labelledby="faq-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.95fr_1.05fr] lg:items-end lg:px-8">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#FF5A5F]"><?php esc_html_e('FAQ', 'dawp'); ?></p>
                <h1 id="faq-title" class="mt-4 font-heading text-4xl font-extrabold leading-tight text-[#111827] sm:text-5xl">
                    <?php esc_html_e('Quick answers for personalized orders.', 'dawp'); ?>
                </h1>
                <p class="mt-5 max-w-2xl text-base leading-8 text-[#4B5563]">
                    <?php esc_html_e('Find clear answers about personalization, orders, shipping, returns, sizing, and support.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-[var(--radius-lg)] border border-[#E5E7EB] bg-white p-6 shadow-[var(--shadow-card)]">
                <h2 class="font-heading text-2xl font-extrabold text-[#111827]"><?php esc_html_e('Need direct help?', 'dawp'); ?></h2>
                <p class="mt-3 text-sm leading-7 text-[#4B5563]">
                    <?php
                    echo wp_kses(
                        sprintf(
                            /* translators: 1: support email, 2: business hours */
                            __('Email %1$s with your order number or personalization question. Business hours: %2$s.', 'dawp'),
                            '<a class="font-bold text-[#FF5A5F] underline decoration-[#FF5A5F]/40 underline-offset-4 transition hover:text-[#111827]" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>',
                            esc_html($business_hours)
                        ),
                        [
                            'a' => [
                                'class' => [],
                                'href'  => [],
                            ],
                        ]
                    );
                    ?>
                </p>
                <div class="mt-6 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-[var(--radius-pill)] bg-[#FF5A5F] px-6 text-sm font-bold text-white transition hover:bg-[#E14247]">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url($track_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-[var(--radius-pill)] border-2 border-[#111827] bg-white px-6 text-sm font-bold text-[#111827] transition hover:bg-[#111827] hover:text-white">
                        <?php esc_html_e('Track Order', 'dawp'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-14 sm:py-20" aria-labelledby="faq-content-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.78fr_1.22fr] lg:px-8">
            <aside class="lg:sticky lg:top-24 lg:self-start">
                <div class="rounded-[var(--radius-lg)] border border-[#E5E7EB] bg-white p-6 shadow-[var(--shadow-card)]">
                    <h2 id="faq-content-title" class="font-heading text-2xl font-extrabold text-[#111827]"><?php esc_html_e('Helpful links', 'dawp'); ?></h2>
                    <p class="mt-4 text-sm leading-7 text-[#4B5563]"><?php esc_html_e('Review the full policy pages for complete details before placing an order or requesting a return.', 'dawp'); ?></p>
                    <div class="mt-6 grid gap-3">
                        <?php foreach ($quick_links as $link) : ?>
                            <a href="<?php echo esc_url($link['url']); ?>" class="rounded-[var(--radius-md)] border border-[#E5E7EB] bg-[#F9FAFB] p-4 transition hover:bg-[#FFF1F0]">
                                <span class="block font-heading text-base font-extrabold text-[#111827]"><?php echo esc_html($link['title']); ?></span>
                                <span class="mt-2 block text-sm leading-6 text-[#4B5563]"><?php echo esc_html($link['copy']); ?></span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </aside>

            <div class="grid gap-8">
                <?php foreach ($faq_groups as $group) : ?>
                    <section class="rounded-[var(--radius-lg)] border border-[#E5E7EB] bg-white p-6 shadow-[var(--shadow-card)]" aria-labelledby="<?php echo esc_attr(sanitize_title($group['label'])); ?>">
                        <h2 id="<?php echo esc_attr(sanitize_title($group['label'])); ?>" class="font-heading text-2xl font-extrabold text-[#111827]"><?php echo esc_html($group['label']); ?></h2>
                        <div class="mt-6 divide-y divide-[#E5E7EB]">
                            <?php foreach ($group['items'] as $item) : ?>
                                <details class="group py-5 first:pt-0 last:pb-0">
                                    <summary class="flex cursor-pointer list-none items-start justify-between gap-4 text-left font-heading text-lg font-extrabold text-[#111827]">
                                        <span><?php echo esc_html($item['question']); ?></span>
                                        <span class="mt-1 flex h-7 w-7 shrink-0 items-center justify-center rounded-[var(--radius-sm)] bg-[#FFF1F0] text-[#FF5A5F] transition group-open:rotate-45" aria-hidden="true">+</span>
                                    </summary>
                                    <p class="mt-3 text-sm leading-7 text-[#4B5563]"><?php echo esc_html($item['answer']); ?></p>
                                </details>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-[#F9FAFB] py-14 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-[var(--radius-lg)] border border-[#E5E7EB] bg-white p-6 sm:p-8">
                <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#FF5A5F]"><?php esc_html_e('Shop With Clarity', 'dawp'); ?></p>
                        <h2 class="mt-3 font-heading text-2xl font-extrabold text-[#111827]"><?php esc_html_e('Personalized apparel, printed just for you.', 'dawp'); ?></h2>
                        <p class="mt-3 text-sm leading-7 text-[#4B5563]"><?php esc_html_e('Browse T-shirts, hoodies, and more — every design can be personalized, with clear policy information available before checkout.', 'dawp'); ?></p>
                    </div>
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-[var(--radius-pill)] bg-[#111827] px-6 text-sm font-bold text-white transition hover:bg-[#FF5A5F]">
                        <?php esc_html_e('Shop Products', 'dawp'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
