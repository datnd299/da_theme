<?php
/**
 * FAQs page for LBQ Shop.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email  = 'support@lbqshop.com';
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
        'label' => __('Orders & Shipping', 'dawp'),
        'items' => [
            [
                'question' => __('What is the order cut off time?', 'dawp'),
                'answer'   => __('The daily order cut off time is 2:00 PM Pacific Standard Time (Los Angeles). Orders placed after the cut off time are processed from the next business day.', 'dawp'),
            ],
            [
                'question' => __('How long does handling take?', 'dawp'),
                'answer'   => __('Current handling time is 0-1 business days from the order cut off to when the shipment is ready for transit. Orders are fulfilled Monday through Saturday.', 'dawp'),
            ],
            [
                'question' => __('How long does transit take?', 'dawp'),
                'answer'   => __('Transit time is currently listed as 0 business days for all destinations in the provided policy settings. Public holidays may affect the final delivery estimate.', 'dawp'),
            ],
            [
                'question' => __('Will I receive tracking information?', 'dawp'),
                'answer'   => __('Yes. Tracking information is provided once your order ships. Tracking may take a short time to update after the carrier receives the package.', 'dawp'),
            ],
            [
                'question' => __('Can I change my shipping address after ordering?', 'dawp'),
                'answer'   => __('Contact support as soon as possible with your order number. We cannot guarantee address changes once an order has entered processing or shipped.', 'dawp'),
            ],
        ],
    ],
    [
        'label' => __('Returns & Refunds', 'dawp'),
        'items' => [
            [
                'question' => __('What is the return window?', 'dawp'),
                'answer'   => __('You may request a return or exchange within 30 days of delivery for eligible products.', 'dawp'),
            ],
            [
                'question' => __('Which products are eligible for return?', 'dawp'),
                'answer'   => __('Returns are accepted for defective and non-defective products. Eligible products must be new, including unopened products in original packaging or products that have never been used.', 'dawp'),
            ],
            [
                'question' => __('Do you accept exchanges?', 'dawp'),
                'answer'   => __('Yes. Exchanges are accepted for eligible new products within the 30-day return window.', 'dawp'),
            ],
            [
                'question' => __('Who pays return shipping?', 'dawp'),
                'answer'   => __('Customers are responsible for the return label cost. The return method is by mail, and the return label option is download and print.', 'dawp'),
            ],
            [
                'question' => __('Are there restocking fees or refund delays?', 'dawp'),
                'answer'   => __('There is no restocking fee. After a return is received and approved, refunds are processed within 10 days.', 'dawp'),
            ],
        ],
    ],
    [
        'label' => __('Products & Store', 'dawp'),
        'items' => [
            [
                'question' => __('What does LBQ Shop sell?', 'dawp'),
                'answer'   => __('LBQ Shop sells beauty accessories, makeup bags, cosmetic organizers, fashion accessories, everyday style essentials, and giftable accessories for simple daily routines.', 'dawp'),
            ],
            [
                'question' => __('Do you sell branded designer replicas or counterfeit items?', 'dawp'),
                'answer'   => __('No. LBQ Shop does not sell counterfeit designer accessories, fake branded cosmetics, replica logos, or products presented as unauthorized luxury items.', 'dawp'),
            ],
            [
                'question' => __('Do your products make skincare or medical claims?', 'dawp'),
                'answer'   => __('No. Our products are beauty and fashion accessories. We avoid medical, treatment, skin whitening, acne cure, supplement, or similar prohibited claims.', 'dawp'),
            ],
            [
                'question' => __('Where can I find product details?', 'dawp'),
                'answer'   => __('Product pages should include practical details such as what the item is, how it is used, size or capacity when relevant, material details when available, and care notes where needed.', 'dawp'),
            ],
        ],
    ],
    [
        'label' => __('Payment, Privacy & Support', 'dawp'),
        'items' => [
            [
                'question' => __('Is checkout secure?', 'dawp'),
                'answer'   => __('Payments are processed through third-party payment providers. LBQ Shop does not intentionally store full payment card numbers on its own systems.', 'dawp'),
            ],
            [
                'question' => __('How is my information used?', 'dawp'),
                'answer'   => __('Customer information is used to process orders, ship purchases, provide support, improve the site, prevent fraud, and meet legal obligations. More detail is available in our Privacy Policy.', 'dawp'),
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
        'copy'  => __('Review cut off time, handling, transit, return eligibility, label cost, and refunds.', 'dawp'),
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

<div class="bg-white text-[#2F2A28]">
    <section class="bg-[#F8F2EE] py-14 sm:py-20" aria-labelledby="faq-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.95fr_1.05fr] lg:items-end lg:px-8">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A96870]"><?php esc_html_e('FAQs', 'dawp'); ?></p>
                <h1 id="faq-title" class="mt-4 font-heading text-4xl font-extrabold leading-tight text-[#2F2A28] sm:text-5xl">
                    <?php esc_html_e('Quick answers for shopping with LBQ Shop.', 'dawp'); ?>
                </h1>
                <p class="mt-5 max-w-2xl text-base leading-8 text-[#6F625D]">
                    <?php esc_html_e('Find clear answers about orders, shipping, returns, product expectations, privacy, and support for our beauty and fashion accessories store.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-md border border-[#E8DAD4] bg-white p-6 shadow-sm">
                <h2 class="font-heading text-2xl font-extrabold text-[#2F2A28]"><?php esc_html_e('Need direct help?', 'dawp'); ?></h2>
                <p class="mt-3 text-sm leading-7 text-[#6F625D]">
                    <?php
                    echo wp_kses(
                        sprintf(
                            /* translators: 1: support email, 2: business hours */
                            __('Email %1$s with your order number or product question. Business hours: %2$s.', 'dawp'),
                            '<a class="font-bold text-[#8A4F56] underline decoration-[#C87F86]/40 underline-offset-4 transition hover:text-[#2F2A28]" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>',
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
                    <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#C87F86] px-6 text-sm font-bold text-white transition hover:bg-[#2F2A28]">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url($track_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#C87F86] bg-white px-6 text-sm font-bold text-[#8A4F56] transition hover:bg-[#FBEDEA]">
                        <?php esc_html_e('Track Order', 'dawp'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#FFFDFC] py-14 sm:py-20" aria-labelledby="faq-content-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.78fr_1.22fr] lg:px-8">
            <aside class="lg:sticky lg:top-24 lg:self-start">
                <div class="rounded-md border border-[#E8DAD4] bg-white p-6 shadow-sm">
                    <h2 id="faq-content-title" class="font-heading text-2xl font-extrabold text-[#2F2A28]"><?php esc_html_e('Helpful links', 'dawp'); ?></h2>
                    <p class="mt-4 text-sm leading-7 text-[#6F625D]"><?php esc_html_e('Review the full policy pages for complete details before placing an order or requesting a return.', 'dawp'); ?></p>
                    <div class="mt-6 grid gap-3">
                        <?php foreach ($quick_links as $link) : ?>
                            <a href="<?php echo esc_url($link['url']); ?>" class="rounded-md border border-[#E8DAD4] bg-[#FFFDFC] p-4 transition hover:border-[#C87F86] hover:bg-[#FBEDEA]">
                                <span class="block font-heading text-base font-extrabold text-[#2F2A28]"><?php echo esc_html($link['title']); ?></span>
                                <span class="mt-2 block text-sm leading-6 text-[#6F625D]"><?php echo esc_html($link['copy']); ?></span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </aside>

            <div class="grid gap-8">
                <?php foreach ($faq_groups as $group) : ?>
                    <section class="rounded-md border border-[#E8DAD4] bg-white p-6 shadow-sm" aria-labelledby="<?php echo esc_attr(sanitize_title($group['label'])); ?>">
                        <h2 id="<?php echo esc_attr(sanitize_title($group['label'])); ?>" class="font-heading text-2xl font-extrabold text-[#2F2A28]"><?php echo esc_html($group['label']); ?></h2>
                        <div class="mt-6 divide-y divide-[#E8DAD4]">
                            <?php foreach ($group['items'] as $item) : ?>
                                <details class="group py-5 first:pt-0 last:pb-0">
                                    <summary class="flex cursor-pointer list-none items-start justify-between gap-4 text-left font-heading text-lg font-extrabold text-[#2F2A28]">
                                        <span><?php echo esc_html($item['question']); ?></span>
                                        <span class="mt-1 flex h-7 w-7 shrink-0 items-center justify-center rounded-md bg-[#FBEDEA] text-[#8A4F56] transition group-open:rotate-45" aria-hidden="true">+</span>
                                    </summary>
                                    <p class="mt-3 text-sm leading-7 text-[#6F625D]"><?php echo esc_html($item['answer']); ?></p>
                                </details>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-[#F8F2EE] py-14 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-md border border-[#E8DAD4] bg-white p-6 sm:p-8">
                <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A96870]"><?php esc_html_e('Shop With Clarity', 'dawp'); ?></p>
                        <h2 class="mt-3 font-heading text-2xl font-extrabold text-[#2F2A28]"><?php esc_html_e('Beauty and style accessories for everyday confidence.', 'dawp'); ?></h2>
                        <p class="mt-3 text-sm leading-7 text-[#6F625D]"><?php esc_html_e('Browse practical makeup organizers, beauty accessories, fashion accents, and giftable finds with clear policy information available before checkout.', 'dawp'); ?></p>
                    </div>
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#2F2A28] px-6 text-sm font-bold text-white transition hover:bg-[#8A4F56]">
                        <?php esc_html_e('Shop Products', 'dawp'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
