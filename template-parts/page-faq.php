<?php
/**
 * FAQ page template part.
 *
 * @package dawp
 */

$support_email = 'support@vivisshop.com';
$support_link = '<a class="font-semibold text-[#4B3528] underline decoration-[#B89B83] underline-offset-4" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>';
$link_support_email = static function ($text) use ($support_email, $support_link) {
    return str_replace(esc_html($support_email), $support_link, esc_html($text));
};

$faq_groups = [
    [
        'label' => __('Orders & Shipping', 'dawp'),
        'items' => [
            [
                'q' => __('How long does order processing take?', 'dawp'),
                'a' => __('Orders are processed within 2-4 business days, Monday through Friday excluding holidays. You will receive tracking once your order ships.', 'dawp'),
            ],
            [
                'q' => __('How long does US shipping take?', 'dawp'),
                'a' => __('After dispatch, standard US shipping typically takes 5-10 business days depending on destination, carrier conditions, weather, and local delivery volume.', 'dawp'),
            ],
            [
                'q' => __('Where can I find my tracking number?', 'dawp'),
                'a' => __('Tracking is sent to the email address used at checkout. If you do not see it, check spam or promotions folders, then contact support with your order number.', 'dawp'),
            ],
        ],
    ],
    [
        'label' => __('Returns & Refunds', 'dawp'),
        'items' => [
            [
                'q' => __('What is your return window?', 'dawp'),
                'a' => __('Eligible items may be returned within 30 days of delivery. Items must be unworn, unwashed, unused, and in original condition with packaging and tags where applicable.', 'dawp'),
            ],
            [
                'q' => __('How do I start a return?', 'dawp'),
                'a' => __('Email support@vivisshop.com with your order number and return reason before sending anything back. We will provide return instructions for eligible requests.', 'dawp'),
            ],
            [
                'q' => __('Who pays return shipping?', 'dawp'),
                'a' => __('Customers are responsible for return shipping costs unless the item arrived damaged, defective, or incorrect. Original shipping charges are non-refundable unless required by law or caused by our error.', 'dawp'),
            ],
        ],
    ],
    [
        'label' => __('Products & Sizing', 'dawp'),
        'items' => [
            [
                'q' => __('What type of clothing does Vivisshop sell?', 'dawp'),
                'a' => __('Vivisshop focuses on soft everyday women\'s fashion, including relaxed tops, tunics, blouses, soft graphic tops, dresses, and easy casual pieces.', 'dawp'),
            ],
            [
                'q' => __('How should I choose a size?', 'dawp'),
                'a' => __('Please review the size details on each product page before ordering. If you are between sizes or prefer a relaxed fit, compare measurements with a similar item you already own.', 'dawp'),
            ],
            [
                'q' => __('Are colors exactly the same as the photos?', 'dawp'),
                'a' => __('We try to show product colors clearly, but screen settings and lighting can make colors appear slightly different. Product descriptions may include additional color or material notes.', 'dawp'),
            ],
        ],
    ],
    [
        'label' => __('Payment & Support', 'dawp'),
        'items' => [
            [
                'q' => __('Is checkout secure?', 'dawp'),
                'a' => __('Vivisshop uses secure checkout tools provided by our ecommerce and payment partners. Full card numbers are not stored by Vivisshop on this website.', 'dawp'),
            ],
            [
                'q' => __('Can I change or cancel an order?', 'dawp'),
                'a' => __('Contact us as soon as possible at support@vivisshop.com. We cannot guarantee changes after an order enters processing or has shipped, but we will review the request.', 'dawp'),
            ],
            [
                'q' => __('How do I contact customer support?', 'dawp'),
                'a' => __('Email support@vivisshop.com. Business hours: Monday-Friday, 9:00 AM-5:00 PM. Include your order number when asking about an order.', 'dawp'),
            ],
        ],
    ],
];
?>

<div class="bg-white text-[#2F2925]">
    <section class="bg-[#FFF8EF] py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl">
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#8C6D58]"><?php esc_html_e('Help Center', 'dawp'); ?></p>
                <h1 class="mt-4 font-heading text-5xl font-bold leading-tight text-[#4B3528] sm:text-6xl">
                    <?php esc_html_e('Frequently Asked Questions', 'dawp'); ?>
                </h1>
                <p class="mt-6 max-w-3xl text-lg leading-8 text-[#756A62]">
                    <?php esc_html_e('Quick answers about Vivisshop orders, shipping, returns, sizing, payment, and customer support.', 'dawp'); ?>
                </p>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 lg:py-20">
        <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[0.72fr_1.28fr] lg:px-8">
            <aside class="rounded-2xl border border-[#E7D8C8] bg-[#F3E7DA] p-6 lg:sticky lg:top-8 lg:self-start">
                <h2 class="font-heading text-3xl font-bold text-[#4B3528]"><?php esc_html_e('Need direct help?', 'dawp'); ?></h2>
                <p class="mt-4 text-sm leading-7 text-[#756A62]">
                    <?php esc_html_e('For order-specific questions, include your order number so our support team can review the details faster.', 'dawp'); ?>
                </p>
                <a href="mailto:support@vivisshop.com" class="mt-6 inline-flex min-h-12 items-center justify-center rounded-full bg-[#B89B83] px-6 text-sm font-bold text-white transition hover:bg-[#4B3528]">
                    <?php esc_html_e('Email Support', 'dawp'); ?>
                </a>
                <div class="mt-6 rounded-2xl bg-white p-5 text-sm leading-6 text-[#756A62]">
                    <p><strong class="text-[#4B3528]"><?php esc_html_e('Hours:', 'dawp'); ?></strong> <?php esc_html_e('Business hours: Monday-Friday, 9:00 AM-5:00 PM', 'dawp'); ?></p>
                    <p class="mt-2"><strong class="text-[#4B3528]"><?php esc_html_e('Email:', 'dawp'); ?></strong> <a class="font-semibold text-[#4B3528] underline decoration-[#B89B83] underline-offset-4" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a></p>
                </div>
            </aside>

            <div class="space-y-8">
                <?php foreach ($faq_groups as $group) : ?>
                    <section class="rounded-2xl border border-[#E7D8C8] bg-white p-6 shadow-sm sm:p-8">
                        <h2 class="font-heading text-3xl font-bold text-[#4B3528]"><?php echo esc_html($group['label']); ?></h2>
                        <div class="mt-6 divide-y divide-[#E7D8C8]">
                            <?php foreach ($group['items'] as $item) : ?>
                                <details class="group py-5 first:pt-0 last:pb-0">
                                    <summary class="flex cursor-pointer list-none items-start justify-between gap-4 text-left text-base font-bold text-[#4B3528]">
                                        <span><?php echo esc_html($item['q']); ?></span>
                                        <span class="mt-1 flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#FFF8EF] text-[#4B3528] transition group-open:rotate-45" aria-hidden="true">+</span>
                                    </summary>
                                    <p class="mt-3 max-w-3xl text-sm leading-7 text-[#756A62]"><?php echo wp_kses_post($link_support_email($item['a'])); ?></p>
                                </details>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php endforeach; ?>

                <section class="rounded-[2rem] bg-[#4B3528] p-6 text-white sm:p-8">
                    <h2 class="font-heading text-3xl font-bold"><?php esc_html_e('Still have a question?', 'dawp'); ?></h2>
                    <p class="mt-4 max-w-3xl text-base leading-8 text-white/80">
                        <?php esc_html_e('We are here to help with product details, order questions, shipping updates, and return requests.', 'dawp'); ?>
                    </p>
                    <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-white px-7 text-sm font-bold text-[#4B3528] transition hover:bg-[#F3E7DA]"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
                        <a href="<?php echo esc_url(home_url('/shipping-returns/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-white/25 px-7 text-sm font-bold text-white transition hover:bg-white hover:text-[#4B3528]"><?php esc_html_e('Shipping & Returns', 'dawp'); ?></a>
                    </div>
                </section>
            </div>
        </div>
    </section>
</div>
