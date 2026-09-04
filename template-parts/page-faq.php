<?php
/**
 * FAQ page — North Time Co.
 *
 * Content is hardcoded (see theme skill) and written to comply with Google
 * Merchant Center / Shopping policies: no unverifiable claims, clear
 * shipping / returns language, a genuine-product statement, and warranty
 * described as model-dependent (never a blanket site-wide claim). Answers are
 * kept consistent with the Shipping Policy, Return & Refund Policy, and
 * Billing Terms & Conditions.
 *
 * Uses native <details>/<summary> for the accordion — no JavaScript required.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$support_email = function_exists('dawp_store_email') ? dawp_store_email() : 'support@northtimeco.com';

$faq_groups = [
    [
        'title' => __('Orders & shipping', 'dawp'),
        'items' => [
            [
                'q' => __('How much does shipping cost?', 'dawp'),
                'a' => __('Standard shipping is free on every order to any address in the United States, with no minimum spend. An optional paid 2-day expedited service is offered at checkout where available for your address.', 'dawp'),
            ],
            [
                'q' => __('How long will my order take to arrive?', 'dawp'),
                'a' => __('Orders are processed within 1-2 business days. Standard shipping then takes about 3-7 business days after dispatch, so most US orders arrive within 4-9 business days of being placed. You will get a tracking link by email as soon as your order ships.', 'dawp'),
            ],
            [
                'q' => __('Do you ship outside the United States?', 'dawp'),
                'a' => __('At this time we only ship within the United States, including US territories and APO, FPO, and DPO military addresses. We are not able to deliver to international addresses yet.', 'dawp'),
            ],
            [
                'q' => __('Can I change or cancel my order after placing it?', 'dawp'),
                'a' => __('If your order has not shipped yet, email us as soon as possible with your order number and we will do our best to update or cancel it for a full refund. Once an order is in transit it falls under our Return & Refund Policy.', 'dawp'),
            ],
            [
                'q' => __('How do I track my order?', 'dawp'),
                'a' => __('Use the Track Order page and enter your order number (it looks like "NTC-1234") and the email address used at checkout. The same tracking details are included in your shipping confirmation email.', 'dawp'),
            ],
        ],
    ],
    [
        'title' => __('Returns & refunds', 'dawp'),
        'items' => [
            [
                'q' => __('What is your return policy?', 'dawp'),
                'a' => __('You can return an unworn watch in its original packaging within 30 days of delivery for a refund. Email our support team with your order number to get a Return Merchandise Authorization (RMA) number and the return address. Full details are on the Return & Refund Policy page.', 'dawp'),
            ],
            [
                'q' => __('Who pays for return shipping?', 'dawp'),
                'a' => __('For a change-of-mind return you cover the return shipping cost. If the item is faulty, damaged, or not what you ordered, we send a prepaid label and refund you in full, including shipping.', 'dawp'),
            ],
            [
                'q' => __('When will I get my refund?', 'dawp'),
                'a' => __('Once we receive and inspect your returned watch (within 3 business days of arrival), we issue the refund to your original payment method within 5-10 business days of approval. How quickly it appears then depends on your bank or card issuer.', 'dawp'),
            ],
            [
                'q' => __('My watch arrived damaged or faulty — what should I do?', 'dawp'),
                'a' => __('Email us within 7 days of delivery with your order number and a few photos of the item and the packaging. We will arrange a free replacement or a full refund, including all shipping costs.', 'dawp'),
            ],
            [
                'q' => __('Do you offer exchanges?', 'dawp'),
                'a' => __('We do not process direct exchanges. Return the original item for a refund and place a new order for the model or strap you want — this keeps stock and pricing accurate and gets your new watch to you faster.', 'dawp'),
            ],
        ],
    ],
    [
        'title' => __('Watches & specifications', 'dawp'),
        'items' => [
            [
                'q' => __('Are your watches genuine?', 'dawp'),
                'a' => __('Yes. Every watch we sell is new and authentic, supplied in its original manufacturer packaging with any included booklet. We never sell replica or counterfeit watches.', 'dawp'),
            ],
            [
                'q' => __('Do the watches come with a warranty?', 'dawp'),
                'a' => __('Any manufacturer warranty depends on the specific model. Where a warranty applies, its length and terms are listed on that product page and in the paperwork supplied with the watch. If you have a question about a particular watch, contact us before ordering.', 'dawp'),
            ],
            [
                'q' => __('What does the water resistance rating mean?', 'dawp'),
                'a' => __('3 ATM handles rain and hand washing; 5 ATM is suitable for showering and short swims. Water resistance is not permanent and can decrease over time. Every product page lists the rating for that watch.', 'dawp'),
            ],
            [
                'q' => __('How do I choose the right case size?', 'dawp'),
                'a' => __('Our watches run roughly 36-44 mm across the case. Each listing shows the case diameter, strap width, and strap material so you can compare against a watch you already own.', 'dawp'),
            ],
            [
                'q' => __('What is the difference between quartz and automatic movements?', 'dawp'),
                'a' => __('Quartz movements are battery powered, very accurate, and low maintenance. Automatic movements wind themselves from the motion of your wrist and use no battery. The movement type is stated on every product page.', 'dawp'),
            ],
        ],
    ],
    [
        'title' => __('Payments & security', 'dawp'),
        'items' => [
            [
                'q' => __('Which payment methods do you accept?', 'dawp'),
                'a' => __('All payments are processed securely through PayPal. You can pay with your PayPal balance or use a Visa, Mastercard, or American Express card through PayPal without creating a PayPal account. Payments are handled over an encrypted, PCI-DSS compliant connection.', 'dawp'),
            ],
            [
                'q' => __('What currency are prices in, and is tax included?', 'dawp'),
                'a' => __('All prices are shown and charged in US dollars. Any applicable state and local sales tax is calculated on your shipping address and shown at checkout before you pay.', 'dawp'),
            ],
            [
                'q' => __('What will the charge look like on my statement?', 'dawp'),
                'a' => __('Because payments are processed by PayPal, the charge usually appears on your statement as "PAYPAL *NORTHTIMECO.COM" or "North Time Co.". If you see a charge you do not recognize, contact us before disputing it with your bank so we can identify the order quickly.', 'dawp'),
            ],
            [
                'q' => __('Is it safe to use my card on your site?', 'dawp'),
                'a' => __('Yes. Checkout runs over an encrypted (HTTPS) connection and your card details are entered on PayPal — we never receive or store your card number.', 'dawp'),
            ],
        ],
    ],
];
?>

<div class="bg-background text-foreground">
    <section class="bg-primary text-white">
        <div class="mx-auto max-w-3xl px-4 py-14 sm:px-6 lg:px-8 lg:py-16">
            <p class="font-heading text-xs font-semibold uppercase tracking-brand text-accent"><?php esc_html_e('Help center', 'dawp'); ?></p>
            <h1 class="mt-4 font-heading text-3xl font-bold uppercase leading-tight sm:text-4xl"><?php esc_html_e('Frequently asked questions', 'dawp'); ?></h1>
            <p class="mt-5 text-base leading-8 text-white/80">
                <?php esc_html_e('Answers to the questions we hear most about shipping, returns, our watches, and payment. Still stuck? Contact us and we will respond within 1 business day.', 'dawp'); ?>
            </p>
        </div>
    </section>

    <section class="py-14 sm:py-20">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">

            <?php foreach ($faq_groups as $group) : ?>
                <div class="mb-12 last:mb-0">
                    <h2 class="font-heading text-xl font-bold uppercase text-foreground sm:text-2xl"><?php echo esc_html($group['title']); ?></h2>

                    <div class="mt-5 grid gap-3">
                        <?php foreach ($group['items'] as $item) : ?>
                            <details class="group rounded-xl border border-line bg-white px-5 py-4 transition open:border-primary/20 open:shadow-card">
                                <summary class="flex cursor-pointer items-center justify-between gap-4 list-none font-heading text-sm font-bold uppercase leading-6 text-foreground [&::-webkit-details-marker]:hidden">
                                    <?php echo esc_html($item['q']); ?>
                                    <span class="inline-flex h-7 w-7 shrink-0 items-center justify-center rounded-full border border-line text-primary transition group-open:rotate-45 group-open:border-accent group-open:bg-accent group-open:text-primary" aria-hidden="true">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg>
                                    </span>
                                </summary>
                                <p class="mt-3 text-sm leading-7 text-muted"><?php echo esc_html($item['a']); ?></p>
                            </details>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="mt-12 rounded-xl border border-line bg-white p-6 sm:p-8">
                <h2 class="font-heading text-lg font-bold uppercase text-foreground"><?php esc_html_e('Still have a question?', 'dawp'); ?></h2>
                <p class="mt-3 text-sm leading-7 text-muted">
                    <?php
                    echo wp_kses(
                        sprintf(
                            /* translators: %s: support email link */
                            __('Email us at %s and a real person will reply within 1 business day.', 'dawp'),
                            '<a class="font-semibold text-primary underline decoration-accent decoration-2 underline-offset-4 transition hover:text-accent" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>'
                        ),
                        ['a' => ['class' => [], 'href' => []]]
                    );
                    ?>
                </p>
                <div class="mt-6 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-lg bg-accent px-6 text-sm font-bold uppercase tracking-wide text-primary transition hover:bg-accent-hover">
                        <?php esc_html_e('Contact us', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-lg border border-primary px-6 text-sm font-bold uppercase tracking-wide text-primary transition hover:bg-primary hover:text-white">
                        <?php esc_html_e('Shop all watches', 'dawp'); ?>
                    </a>
                </div>
            </div>

        </div>
    </section>
</div>
