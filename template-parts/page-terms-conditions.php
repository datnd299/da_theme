<?php
/**
 * Terms and conditions page for MyBaapStore.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email = 'support@mybaapstore.com';
$last_updated  = 'May 14, 2026';

$summary_cards = [
    [
        'title' => __('Practical Products', 'dawp'),
        'copy'  => __('MyBaapStore sells useful gadgets, home tools, grooming devices, camera and tech accessories, and daily convenience products.', 'dawp'),
    ],
    [
        'title' => __('Clear Order Rules', 'dawp'),
        'copy'  => __('Orders are subject to product availability, payment authorization, accurate customer information, and our shipping and return policies.', 'dawp'),
    ],
    [
        'title' => __('Responsible Use', 'dawp'),
        'copy'  => __('Customers are responsible for using products safely, legally, and according to product instructions and local requirements.', 'dawp'),
    ],
];

$sections = [
    [
        'id'    => 'acceptance',
        'title' => __('1. Acceptance Of Terms', 'dawp'),
        'body'  => [
            __('By visiting MyBaapStore, creating an account, placing an order, or using our website, you agree to these Terms & Conditions and any policies linked from this page. If you do not agree, please do not use the website.', 'dawp'),
        ],
    ],
    [
        'id'    => 'store-products',
        'title' => __('2. Store Products & Product Information', 'dawp'),
        'body'  => [
            __('MyBaapStore offers practical gadgets and everyday electronic tools for home, kitchen, grooming, camera and tech accessories, and daily convenience. Product descriptions, images, prices, specifications, and availability may change without notice.', 'dawp'),
            __('We aim to present products clearly and realistically. Personal care devices are described for normal grooming routines and are not intended to diagnose, treat, cure, or permanently resolve any condition. Camera and tech accessories must be used lawfully and with respect for privacy and consent.', 'dawp'),
        ],
    ],
    [
        'id'    => 'orders',
        'title' => __('3. Orders, Pricing & Payment', 'dawp'),
        'body'  => [
            __('When you place an order, you agree that the information you provide is accurate and complete. We may cancel or refuse an order if payment cannot be verified, an item is unavailable, information appears inaccurate, fraud is suspected, or there is an error in price or product details.', 'dawp'),
            __('Prices are listed in the currency shown at checkout. Taxes, shipping charges, and any available discounts are calculated where applicable before payment is submitted.', 'dawp'),
        ],
    ],
    [
        'id'    => 'shipping-returns',
        'title' => __('4. Shipping, Delivery & Returns', 'dawp'),
        'body'  => [
            __('Orders are processed within 2-4 business days. After dispatch, standard US shipping typically takes 5-10 business days depending on destination and carrier conditions. Tracking is provided once an order ships.', 'dawp'),
            __('Eligible unused items may be returned within 30 days of delivery. Personal care devices may be subject to hygiene-related return conditions. Please review our Shipping & Returns page before placing an order or starting a return.', 'dawp'),
        ],
    ],
    [
        'id'    => 'accounts',
        'title' => __('5. Accounts & Website Use', 'dawp'),
        'body'  => [
            __('If you create an account, you are responsible for keeping your login information secure and for activity under your account. You agree not to misuse the website, interfere with store operations, attempt unauthorized access, submit false information, or use the website for unlawful purposes.', 'dawp'),
        ],
    ],
    [
        'id'    => 'product-use',
        'title' => __('6. Product Use & Safety', 'dawp'),
        'body'  => [
            __('Customers are responsible for reading product information, instructions, warnings, and care notes before use. Use products only for their intended everyday purpose and stop using a product if it appears damaged, unsafe, or unsuitable for your situation.', 'dawp'),
            __('Some products may include small parts, batteries, electronic components, blades, heat, moving parts, or hygiene considerations. Keep products away from children unless the product is specifically intended for them and supervision is appropriate.', 'dawp'),
        ],
    ],
    [
        'id'    => 'intellectual-property',
        'title' => __('7. Intellectual Property', 'dawp'),
        'body'  => [
            __('The MyBaapStore name, website content, layout, graphics, text, and other materials are owned by or licensed to MyBaapStore unless otherwise stated. You may not copy, reproduce, sell, or exploit website content without written permission.', 'dawp'),
        ],
    ],
    [
        'id'    => 'third-parties',
        'title' => __('8. Third-Party Services', 'dawp'),
        'body'  => [
            __('Our website may use third-party services for payments, shipping, analytics, hosting, email, fraud prevention, and support. Those services may have their own terms and privacy practices. We are not responsible for third-party websites or services that we do not control.', 'dawp'),
        ],
    ],
    [
        'id'    => 'limitations',
        'title' => __('9. Disclaimers & Limitation Of Liability', 'dawp'),
        'body'  => [
            __('The website and products are provided as available. To the fullest extent permitted by law, MyBaapStore is not liable for indirect, incidental, special, or consequential damages arising from website use, delivery delays, product misuse, or events outside our reasonable control.', 'dawp'),
            __('Nothing in these terms limits rights that cannot be limited under applicable law.', 'dawp'),
        ],
    ],
    [
        'id'    => 'changes',
        'title' => __('10. Changes To These Terms', 'dawp'),
        'body'  => [
            __('We may update these Terms & Conditions from time to time. The latest version will be posted on this page with the updated date. Continued use of the website after changes means you accept the updated terms.', 'dawp'),
        ],
    ],
];
?>

<div class="bg-white text-[#1F2937]">
    <section class="bg-[#EAF4FF]" aria-labelledby="terms-title">
        <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
            <div class="max-w-4xl">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#2F80ED]"><?php esc_html_e('Store Policy', 'dawp'); ?></p>
                <h1 id="terms-title" class="mt-5 text-4xl font-extrabold leading-tight text-[#102A43] sm:text-5xl">
                    <?php esc_html_e('Terms & Conditions', 'dawp'); ?>
                </h1>
                <p class="mt-6 text-lg leading-8 text-[#667085]">
                    <?php esc_html_e('These terms explain the rules for using MyBaapStore, placing orders, and purchasing practical gadgets and everyday electronic tools from our website.', 'dawp'); ?>
                </p>
                <p class="mt-5 text-sm font-semibold text-[#102A43]">
                    <?php printf(esc_html__('Last updated: %s', 'dawp'), esc_html($last_updated)); ?>
                </p>
            </div>

            <div class="mt-10 grid gap-4 md:grid-cols-3">
                <?php foreach ($summary_cards as $card) : ?>
                    <article class="rounded-2xl border border-white bg-white p-6 shadow-sm">
                        <h2 class="text-lg font-extrabold text-[#102A43]"><?php echo esc_html($card['title']); ?></h2>
                        <p class="mt-3 text-sm leading-6 text-[#667085]"><?php echo esc_html($card['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 sm:py-20">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.75fr_1.25fr] lg:px-8">
            <aside class="lg:sticky lg:top-28 lg:self-start">
                <div class="rounded-2xl border border-[#E5E7EB] bg-[#F5F7FA] p-6">
                    <h2 class="text-lg font-extrabold text-[#102A43]"><?php esc_html_e('Terms Sections', 'dawp'); ?></h2>
                    <nav class="mt-5 grid gap-2 text-sm font-bold text-[#334155]" aria-label="<?php esc_attr_e('Terms sections', 'dawp'); ?>">
                        <?php foreach ($sections as $section) : ?>
                            <a class="rounded-xl px-3 py-2 transition hover:bg-white hover:text-[#2F80ED]" href="#<?php echo esc_attr($section['id']); ?>"><?php echo esc_html($section['title']); ?></a>
                        <?php endforeach; ?>
                    </nav>
                </div>
            </aside>

            <div class="max-w-4xl">
                <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm sm:p-8">
                    <?php foreach ($sections as $index => $section) : ?>
                        <section id="<?php echo esc_attr($section['id']); ?>" class="<?php echo 0 === $index ? '' : 'mt-10 border-t border-[#E5E7EB] pt-10'; ?>">
                            <h2 class="text-2xl font-extrabold text-[#102A43]"><?php echo esc_html($section['title']); ?></h2>
                            <?php foreach ($section['body'] as $paragraph) : ?>
                                <p class="mt-4 text-base leading-8 text-[#667085]"><?php echo esc_html($paragraph); ?></p>
                            <?php endforeach; ?>
                            <?php if ('shipping-returns' === $section['id']) : ?>
                                <a href="<?php echo esc_url(home_url('/shipping-returns/')); ?>" class="mt-5 inline-flex min-h-11 items-center justify-center rounded-xl border border-[#2F80ED] px-5 text-sm font-bold text-[#2F80ED] transition hover:bg-[#EAF4FF]"><?php esc_html_e('View Shipping & Returns', 'dawp'); ?></a>
                            <?php endif; ?>
                        </section>
                    <?php endforeach; ?>
                </div>

                <section class="mt-8 rounded-2xl bg-[#102A43] p-6 text-white sm:p-8">
                    <h2 class="text-2xl font-extrabold"><?php esc_html_e('Questions About These Terms?', 'dawp'); ?></h2>
                    <p class="mt-4 text-base leading-8 text-white/75">
                        <?php esc_html_e('Contact MyBaapStore support during business hours: Monday - Friday, 9:00 AM - 6:00 PM EST.', 'dawp'); ?>
                    </p>
                    <a href="mailto:<?php echo esc_attr($support_email); ?>" class="mt-6 inline-flex min-h-12 items-center justify-center rounded-xl bg-white px-6 text-sm font-bold text-[#102A43] transition hover:bg-[#EAF4FF]"><?php echo esc_html($support_email); ?></a>
                </section>
            </div>
        </div>
    </section>
</div>
