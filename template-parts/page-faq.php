<?php
/**
 * FAQ page — WristUnion.
 *
 * Hardcoded content, written to comply with Google Merchant Center / Shopping
 * policies: no unverifiable claims, clear shipping / returns language, and
 * warranty stated as a specific 2-year workshop warranty. Kept consistent with
 * the Shipping Policy, Return & Refund Policy, and Billing Terms & Conditions.
 *
 * Native <details>/<summary> accordion — no JavaScript.
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

$support_email = function_exists('dawp_store_email') ? dawp_store_email() : 'support@wristunion.com';

$faq_groups = [
    [
        'title' => __('Custom builds', 'dawp'),
        'items' => [
            [
                'q' => __('How does a custom build work?', 'dawp'),
                'a' => __('Start from one of our base models, then choose the dial, hands, case finish, bezel insert, and strap, and add a caseback engraving if you want one. Send the request through the Custom Shop link and we reply within 1 business day with a firm quote. Nothing is built until you approve the quote and the details in writing.', 'dawp'),
            ],
            [
                'q' => __('How long does a custom build take?', 'dawp'),
                'a' => __('Custom builds take 4 to 6 weeks from the date you approve the quote to the date it ships. If a chosen component is on back order we tell you before you pay, not after.', 'dawp'),
            ],
            [
                'q' => __('Can I return a custom build?', 'dawp'),
                'a' => __('Engraved or personalized watches cannot be returned for a change of mind. A custom build with no engraving can be returned unworn within 30 days, but a restocking deduction may apply because the configuration has to be broken down and re-sold. If a custom build arrives faulty or not to the approved spec, we repair, replace, or refund it in full.', 'dawp'),
            ],
            [
                'q' => __('What can actually be changed?', 'dawp'),
                'a' => __('Dial colour and finish (sunburst, matte, or fumé), hand style (dauphine, sword, or snowflake), case finish (brushed, polished, or PVD), bezel insert, strap (leather, rubber, oyster, or jubilee), and a caseback engraving of up to 40 characters. Movement and case size are set by the base model you choose.', 'dawp'),
            ],
        ],
    ],
    [
        'title' => __('Orders & shipping', 'dawp'),
        'items' => [
            [
                'q' => __('How much does shipping cost?', 'dawp'),
                'a' => __('Standard shipping is free on every order to any US address, with no minimum. An optional paid 2-day service is offered at checkout where available for your address.', 'dawp'),
            ],
            [
                'q' => __('How long will a ready-to-ship watch take to arrive?', 'dawp'),
                'a' => __('In-stock watches are dispatched within 1 to 2 business days. Standard shipping then takes about 3 to 7 business days, so most US orders arrive within 4 to 9 business days of being placed. Made-to-order (not custom) models ship in about 3 weeks. You get a tracking link by email when your order ships.', 'dawp'),
            ],
            [
                'q' => __('Do you ship outside the United States?', 'dawp'),
                'a' => __('At this time we ship only within the United States, including US territories and APO, FPO, and DPO military addresses.', 'dawp'),
            ],
            [
                'q' => __('How do I track my order?', 'dawp'),
                'a' => __('Use the Track Order page and enter your order number (it looks like "WU-1234") and the email address used at checkout. The same details are in your shipping confirmation email.', 'dawp'),
            ],
        ],
    ],
    [
        'title' => __('Returns & warranty', 'dawp'),
        'items' => [
            [
                'q' => __('What is your return policy?', 'dawp'),
                'a' => __('You can return an unworn, non-engraved watch in its original packaging within 30 days of delivery for a refund. Email us with your order number for a Return Merchandise Authorization (RMA) number and the return address. Full details are on the Return & Refund Policy page.', 'dawp'),
            ],
            [
                'q' => __('Who pays for return shipping?', 'dawp'),
                'a' => __('For a change-of-mind return you cover the return shipping. If the watch is faulty, damaged, or not what you ordered, we send a prepaid label and refund you in full, including shipping.', 'dawp'),
            ],
            [
                'q' => __('What does the warranty cover?', 'dawp'),
                'a' => __('Every WristUnion watch carries a 2-year workshop warranty from the delivery date. It covers assembly faults and the movement under normal use. It does not cover normal wear, battery-style servicing, water exposure beyond the watch\'s rated resistance, accidental damage, scratches, or damage from unauthorized repair. Straps and crystals are consumable parts.', 'dawp'),
            ],
            [
                'q' => __('My watch arrived damaged or faulty — what should I do?', 'dawp'),
                'a' => __('Email us within 7 days of delivery with your order number and a few photos of the watch and the packaging. We arrange a free repair, replacement, or full refund, including all shipping costs.', 'dawp'),
            ],
        ],
    ],
    [
        'title' => __('The watches', 'dawp'),
        'items' => [
            [
                'q' => __('Who makes WristUnion watches?', 'dawp'),
                'a' => __('We do. Each watch is assembled, regulated, and pressure-tested by hand in our own workshop. We are an independent brand and are not an authorized dealer for any other maker. We do not sell pre-owned, replica, or counterfeit watches.', 'dawp'),
            ],
            [
                'q' => __('What movement do you use?', 'dawp'),
                'a' => __('A Japanese Seiko NH35A automatic: 24 jewels, hacking seconds, hand-winding, and about a 41-hour power reserve. It winds itself from the motion of your wrist and uses no battery. The movement is listed on every product page.', 'dawp'),
            ],
            [
                'q' => __('What does the water resistance rating mean?', 'dawp'),
                'a' => __('Our Field and Dress models are rated 100 m and handle rain, hand washing, and swimming. Dive models are rated 200 m. Water resistance is not permanent and should be checked periodically. Every product page lists the rating for that watch.', 'dawp'),
            ],
            [
                'q' => __('How do I choose the right case size?', 'dawp'),
                'a' => __('Our watches run 36 to 42 mm across the case. Every listing shows case diameter, thickness, lug-to-lug, and lug width so you can compare against a watch you already own — lug-to-lug is usually the number that decides fit.', 'dawp'),
            ],
        ],
    ],
    [
        'title' => __('Payments & security', 'dawp'),
        'items' => [
            [
                'q' => __('Which payment methods do you accept?', 'dawp'),
                'a' => __('Payments are processed securely through PayPal. You can pay with your PayPal balance or use a Visa, Mastercard, or American Express card through PayPal without a PayPal account. The connection is encrypted and PCI-DSS compliant.', 'dawp'),
            ],
            [
                'q' => __('What currency are prices in, and is tax included?', 'dawp'),
                'a' => __('All prices are shown and charged in US dollars. Any applicable state and local sales tax is calculated on your shipping address and shown at checkout before you pay.', 'dawp'),
            ],
            [
                'q' => __('What will the charge look like on my statement?', 'dawp'),
                'a' => __('Because payments are processed by PayPal, the charge usually appears as "PAYPAL *WRISTUNION.COM" or "WristUnion". If you see a charge you do not recognize, contact us before disputing it with your bank so we can identify the order quickly.', 'dawp'),
            ],
        ],
    ],
];
?>

<div class="bg-background text-foreground">
    <section class="bg-primary text-white">
        <div class="mx-auto max-w-3xl px-8 py-16 sm:px-14 lg:py-20">
            <p class="text-[11px] font-medium uppercase tracking-brand text-accent"><?php esc_html_e('Help', 'dawp'); ?></p>
            <h1 class="mt-4 font-heading text-[clamp(2rem,5vw,3rem)] font-bold leading-[1.05]"><?php esc_html_e('Frequently asked questions', 'dawp'); ?></h1>
            <p class="mt-5 font-serif text-lg leading-8 text-white/80">
                <?php esc_html_e('Custom builds, shipping, returns, warranty, and the watches themselves. Still stuck? Contact us and we reply within 1 business day.', 'dawp'); ?>
            </p>
        </div>
    </section>

    <section class="py-16 sm:py-20">
        <div class="mx-auto max-w-3xl px-8 sm:px-14">
            <?php foreach ($faq_groups as $group) : ?>
                <div class="mb-12 last:mb-0">
                    <h2 class="font-heading text-lg font-semibold uppercase tracking-label text-foreground"><?php echo esc_html($group['title']); ?></h2>

                    <div class="mt-4 border-t border-line">
                        <?php foreach ($group['items'] as $item) : ?>
                            <details class="group border-b border-line">
                                <summary class="flex cursor-pointer list-none items-center justify-between gap-4 py-4 font-heading text-sm font-semibold text-foreground [&::-webkit-details-marker]:hidden">
                                    <?php echo esc_html($item['q']); ?>
                                    <span class="inline-flex h-6 w-6 shrink-0 items-center justify-center border border-line text-foreground transition group-open:rotate-45 group-open:border-accent group-open:text-accent" aria-hidden="true">
                                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg>
                                    </span>
                                </summary>
                                <p class="pb-4 font-serif text-[15px] leading-7 text-foreground-muted"><?php echo esc_html($item['a']); ?></p>
                            </details>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="mt-12 border border-line bg-surface p-6 sm:p-8">
                <h2 class="font-heading text-base font-semibold uppercase tracking-label text-foreground"><?php esc_html_e('Still have a question?', 'dawp'); ?></h2>
                <p class="mt-3 font-serif text-[15px] leading-7 text-foreground-muted">
                    <?php
                    echo wp_kses(
                        sprintf(
                            /* translators: %s: support email link */
                            __('Email us at %s and a real person replies within 1 business day.', 'dawp'),
                            '<a class="font-semibold text-blued underline decoration-line underline-offset-4 transition hover:text-blued-hover" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>'
                        ),
                        ['a' => ['class' => [], 'href' => []]]
                    );
                    ?>
                </p>
                <div class="mt-6 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex h-12 items-center justify-center border border-primary bg-primary px-7 text-xs font-semibold uppercase tracking-button text-white transition hover:bg-transparent hover:text-primary">
                        <?php esc_html_e('Contact us', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex h-12 items-center justify-center border border-primary px-7 text-xs font-semibold uppercase tracking-button text-primary transition hover:bg-primary hover:text-white">
                        <?php esc_html_e('Shop watches', 'dawp'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
