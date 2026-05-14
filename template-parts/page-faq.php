<?php
/**
 * FAQ page for MyBaapStore.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email = 'support@mybaapstore.com';

$faq_groups = [
    [
        'label' => __('Orders & Shipping', 'dawp'),
        'items' => [
            [
                'question' => __('How long does order processing take?', 'dawp'),
                'answer'   => __('Orders are processed within 2-4 business days, Monday through Friday, excluding holidays. You will receive an order confirmation after checkout and tracking once the order ships.', 'dawp'),
            ],
            [
                'question' => __('How long does US shipping take?', 'dawp'),
                'answer'   => __('After dispatch, standard US shipping typically takes 5-10 business days depending on your destination, carrier conditions, weather, holidays, and other delivery factors.', 'dawp'),
            ],
            [
                'question' => __('Where can I track my order?', 'dawp'),
                'answer'   => __('Use the Track Your Order page with your order details. Tracking may take 24-72 hours to update after the carrier receives the package.', 'dawp'),
            ],
            [
                'question' => __('Can I change my shipping address?', 'dawp'),
                'answer'   => __('Contact support as soon as possible if you entered the wrong address. We cannot guarantee address changes after an order has started processing or shipped.', 'dawp'),
            ],
        ],
    ],
    [
        'label' => __('Returns & Refunds', 'dawp'),
        'items' => [
            [
                'question' => __('What is your return window?', 'dawp'),
                'answer'   => __('Eligible unused items may be returned within 30 days of delivery. Please contact support before sending anything back so we can review the request and provide return instructions.', 'dawp'),
            ],
            [
                'question' => __('What condition must returned items be in?', 'dawp'),
                'answer'   => __('Returned items should be unused, undamaged, in original condition, and returned with original packaging, accessories, manuals, and proof of purchase where applicable.', 'dawp'),
            ],
            [
                'question' => __('Can personal care devices be returned?', 'dawp'),
                'answer'   => __('Personal care and grooming devices may be subject to hygiene-related return conditions. Opened or used personal care items may be declined when they cannot be safely inspected or resold.', 'dawp'),
            ],
            [
                'question' => __('When will I receive my refund?', 'dawp'),
                'answer'   => __('Approved refunds are issued to the original payment method after the returned item is received and inspected. Your bank or payment provider may need additional time to post the refund.', 'dawp'),
            ],
        ],
    ],
    [
        'label' => __('Products & Store', 'dawp'),
        'items' => [
            [
                'question' => __('What does MyBaapStore sell?', 'dawp'),
                'answer'   => __('MyBaapStore sells practical gadgets and everyday electronic tools for home, kitchen, grooming, camera and tech accessories, and daily convenience.', 'dawp'),
            ],
            [
                'question' => __('Are personal care products medical devices?', 'dawp'),
                'answer'   => __('No. Personal care products on MyBaapStore are presented for simple grooming and everyday care routines. We do not make medical, treatment, cure, or permanent-result claims.', 'dawp'),
            ],
            [
                'question' => __('How are camera and tech accessories intended to be used?', 'dawp'),
                'answer'   => __('Camera and tech accessories are presented for normal, lawful uses such as content creation, desk setups, organization, and everyday device support. Customers are responsible for using products with respect for privacy, consent, and local requirements.', 'dawp'),
            ],
            [
                'question' => __('How should I choose a product?', 'dawp'),
                'answer'   => __('Read the product description, specifications, included items, care instructions, and safety notes before ordering. If you are unsure whether a product fits your needs, contact support before purchase.', 'dawp'),
            ],
        ],
    ],
    [
        'label' => __('Payments & Support', 'dawp'),
        'items' => [
            [
                'question' => __('Is checkout secure?', 'dawp'),
                'answer'   => __('Checkout is handled through secure ecommerce and payment tools. MyBaapStore does not store full credit card numbers on the website.', 'dawp'),
            ],
            [
                'question' => __('What should I do if an item arrives damaged or incorrect?', 'dawp'),
                'answer'   => __('Email support within 7 days of delivery with your order number and clear photos of the item, packaging, and shipping label so our team can review the issue.', 'dawp'),
            ],
            [
                'question' => __('How do I contact MyBaapStore?', 'dawp'),
                'answer'   => __('Email support@mybaapstore.com. Business hours are Monday - Friday, 9:00 AM - 6:00 PM EST.', 'dawp'),
            ],
        ],
    ],
];

$quick_links = [
    [
        'title' => __('Shipping & Returns', 'dawp'),
        'copy'  => __('Review delivery timelines, return eligibility, and refund details.', 'dawp'),
        'url'   => home_url('/shipping-returns/'),
    ],
    [
        'title' => __('Track Your Order', 'dawp'),
        'copy'  => __('Check your current order status and shipping progress.', 'dawp'),
        'url'   => home_url('/track-order/'),
    ],
    [
        'title' => __('Contact Support', 'dawp'),
        'copy'  => __('Get help with products, orders, delivery, or returns.', 'dawp'),
        'url'   => home_url('/contact-us/'),
    ],
];
?>

<div class="bg-white text-[#1F2937]">
    <section class="bg-[#EAF4FF]" aria-labelledby="faq-title">
        <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
            <div class="max-w-4xl">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#2F80ED]"><?php esc_html_e('Customer Help', 'dawp'); ?></p>
                <h1 id="faq-title" class="mt-5 text-4xl font-extrabold leading-tight text-[#102A43] sm:text-5xl">
                    <?php esc_html_e('Frequently Asked Questions', 'dawp'); ?>
                </h1>
                <p class="mt-6 text-lg leading-8 text-[#667085]">
                    <?php esc_html_e('Quick answers about MyBaapStore orders, shipping, returns, practical gadgets, personal care devices, camera accessories, and customer support.', 'dawp'); ?>
                </p>
            </div>

            <div class="mt-10 grid gap-4 md:grid-cols-3">
                <?php foreach ($quick_links as $link) : ?>
                    <a href="<?php echo esc_url($link['url']); ?>" class="group rounded-2xl border border-white bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-[#102A43]/10">
                        <h2 class="text-lg font-extrabold text-[#102A43] group-hover:text-[#2F80ED]"><?php echo esc_html($link['title']); ?></h2>
                        <p class="mt-3 text-sm leading-6 text-[#667085]"><?php echo esc_html($link['copy']); ?></p>
                        <span class="mt-5 inline-flex text-sm font-bold text-[#2F80ED]"><?php esc_html_e('Open page', 'dawp'); ?> <span class="ml-2" aria-hidden="true">-&gt;</span></span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 sm:py-20">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.75fr_1.25fr] lg:px-8">
            <aside class="lg:sticky lg:top-28 lg:self-start">
                <div class="rounded-2xl border border-[#E5E7EB] bg-[#F5F7FA] p-6">
                    <h2 class="text-lg font-extrabold text-[#102A43]"><?php esc_html_e('FAQ Topics', 'dawp'); ?></h2>
                    <nav class="mt-5 grid gap-2 text-sm font-bold text-[#334155]" aria-label="<?php esc_attr_e('FAQ topics', 'dawp'); ?>">
                        <?php foreach ($faq_groups as $group_index => $group) : ?>
                            <a class="rounded-xl px-3 py-2 transition hover:bg-white hover:text-[#2F80ED]" href="#faq-group-<?php echo esc_attr((string) $group_index); ?>"><?php echo esc_html($group['label']); ?></a>
                        <?php endforeach; ?>
                    </nav>
                </div>
            </aside>

            <div class="max-w-4xl">
                <?php foreach ($faq_groups as $group_index => $group) : ?>
                    <section id="faq-group-<?php echo esc_attr((string) $group_index); ?>" class="<?php echo 0 === $group_index ? '' : 'mt-8'; ?>">
                        <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm sm:p-8">
                            <h2 class="text-2xl font-extrabold text-[#102A43]"><?php echo esc_html($group['label']); ?></h2>
                            <div class="mt-6 grid gap-4">
                                <?php foreach ($group['items'] as $item) : ?>
                                    <article class="rounded-2xl border border-[#E5E7EB] bg-[#F5F7FA] p-5">
                                        <h3 class="text-lg font-extrabold text-[#102A43]"><?php echo esc_html($item['question']); ?></h3>
                                        <p class="mt-3 text-base leading-8 text-[#667085]"><?php echo esc_html($item['answer']); ?></p>
                                    </article>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </section>
                <?php endforeach; ?>

                <section class="mt-8 rounded-2xl bg-[#102A43] p-6 text-white sm:p-8">
                    <h2 class="text-2xl font-extrabold"><?php esc_html_e('Still Need Help?', 'dawp'); ?></h2>
                    <p class="mt-4 text-base leading-8 text-white/75">
                        <?php esc_html_e('Contact MyBaapStore support with your order number, product name, or question. Business hours are Monday - Friday, 9:00 AM - 6:00 PM EST.', 'dawp'); ?>
                    </p>
                    <div class="mt-6 flex flex-col gap-3 sm:flex-row">
                        <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-xl bg-white px-6 text-sm font-bold text-[#102A43] transition hover:bg-[#EAF4FF]"><?php echo esc_html($support_email); ?></a>
                        <a href="<?php echo esc_url(home_url('/shipping-returns/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-xl border border-white/35 px-6 text-sm font-bold text-white transition hover:bg-white/10"><?php esc_html_e('Read Shipping & Returns', 'dawp'); ?></a>
                    </div>
                </section>
            </div>
        </div>
    </section>
</div>
