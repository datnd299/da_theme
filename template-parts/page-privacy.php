<?php
/**
 * Privacy policy page for MyBaapStore.
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
        'title' => __('Information We Collect', 'dawp'),
        'copy'  => __('We collect order, contact, payment-related, account, and site usage information needed to operate the store.', 'dawp'),
    ],
    [
        'title' => __('How We Use It', 'dawp'),
        'copy'  => __('We use information to process orders, provide support, improve shopping, prevent fraud, and meet legal obligations.', 'dawp'),
    ],
    [
        'title' => __('Who We Share With', 'dawp'),
        'copy'  => __('We share information only with service providers such as payment processors, shipping carriers, analytics, and store tools.', 'dawp'),
    ],
];

$sections = [
    [
        'id'    => 'information-collected',
        'title' => __('1. Information We Collect', 'dawp'),
        'body'  => [
            __('When you shop at MyBaapStore, we may collect your name, billing and shipping address, email address, phone number, order details, payment confirmation details, account login information, customer service messages, and product preferences.', 'dawp'),
            __('We may also collect technical information such as IP address, device type, browser type, pages visited, referring pages, approximate location, and interactions with our website. This helps us keep the store working, understand product interest, and improve the customer experience.', 'dawp'),
        ],
    ],
    [
        'id'    => 'use-of-information',
        'title' => __('2. How We Use Information', 'dawp'),
        'body'  => [
            __('We use customer information to process and fulfill orders, send order confirmations and tracking updates, respond to support requests, manage returns, prevent fraud, maintain security, improve product pages, personalize store functionality, and comply with legal or tax requirements.', 'dawp'),
            __('We do not use product interest in practical gadgets, personal care tools, or tech accessories to make unsupported medical, personal, or privacy-invasive claims. Our product communication is focused on normal ecommerce support and everyday product use.', 'dawp'),
        ],
    ],
    [
        'id'    => 'payments',
        'title' => __('3. Payments', 'dawp'),
        'body'  => [
            __('Payments are handled by secure third-party payment providers. MyBaapStore does not store full credit card numbers on our website. Payment providers may process payment data according to their own privacy and security practices.', 'dawp'),
        ],
    ],
    [
        'id'    => 'sharing',
        'title' => __('4. Sharing Information', 'dawp'),
        'body'  => [
            __('We may share necessary information with service providers that help operate our store, including payment processors, shipping carriers, warehouse or fulfillment services, email tools, analytics providers, fraud prevention tools, customer support tools, and website hosting providers.', 'dawp'),
            __('We may also share information when required to comply with law, enforce our policies, respond to legal requests, or protect the rights, safety, and security of MyBaapStore, customers, or others.', 'dawp'),
        ],
    ],
    [
        'id'    => 'cookies',
        'title' => __('5. Cookies & Similar Technologies', 'dawp'),
        'body'  => [
            __('Our website may use cookies, pixels, and similar technologies to keep your cart working, remember preferences, understand site performance, measure marketing, detect fraud, and improve browsing. You can usually control cookies through your browser settings, though some store features may not work correctly if cookies are disabled.', 'dawp'),
        ],
    ],
    [
        'id'    => 'retention',
        'title' => __('6. Data Retention', 'dawp'),
        'body'  => [
            __('We keep customer information only as long as reasonably needed for store operations, order records, accounting, fraud prevention, customer support, legal compliance, and dispute resolution. Retention periods may vary depending on the type of information and legal requirements.', 'dawp'),
        ],
    ],
    [
        'id'    => 'rights',
        'title' => __('7. Your Privacy Choices', 'dawp'),
        'body'  => [
            __('Depending on where you live, you may have rights to request access to, correction of, deletion of, or a copy of personal information we maintain about you. You may also ask us to limit certain communications. To make a request, contact us using the email below.', 'dawp'),
            __('We may need to verify your identity before completing a privacy request. We will not discriminate against customers for exercising applicable privacy rights.', 'dawp'),
        ],
    ],
    [
        'id'    => 'children',
        'title' => __('8. Children', 'dawp'),
        'body'  => [
            __('MyBaapStore is intended for general ecommerce customers and is not directed to children under 13. We do not knowingly collect personal information from children under 13.', 'dawp'),
        ],
    ],
    [
        'id'    => 'updates',
        'title' => __('9. Policy Updates', 'dawp'),
        'body'  => [
            __('We may update this Privacy Policy from time to time to reflect store, technology, legal, or operational changes. The latest version will be posted on this page with the updated date.', 'dawp'),
        ],
    ],
];
?>

<div class="bg-white text-[#1F2937]">
    <section class="bg-[#EAF4FF]" aria-labelledby="privacy-title">
        <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
            <div class="max-w-4xl">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#2F80ED]"><?php esc_html_e('Store Policy', 'dawp'); ?></p>
                <h1 id="privacy-title" class="mt-5 text-4xl font-extrabold leading-tight text-[#102A43] sm:text-5xl">
                    <?php esc_html_e('Privacy Policy', 'dawp'); ?>
                </h1>
                <p class="mt-6 text-lg leading-8 text-[#667085]">
                    <?php esc_html_e('This Privacy Policy explains how MyBaapStore collects, uses, shares, and protects information when you browse our store, place an order, contact support, or use our services.', 'dawp'); ?>
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
                    <h2 class="text-lg font-extrabold text-[#102A43]"><?php esc_html_e('Privacy Sections', 'dawp'); ?></h2>
                    <nav class="mt-5 grid gap-2 text-sm font-bold text-[#334155]" aria-label="<?php esc_attr_e('Privacy policy sections', 'dawp'); ?>">
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
                        </section>
                    <?php endforeach; ?>
                </div>

                <section class="mt-8 rounded-2xl bg-[#102A43] p-6 text-white sm:p-8">
                    <h2 class="text-2xl font-extrabold"><?php esc_html_e('Privacy Questions', 'dawp'); ?></h2>
                    <p class="mt-4 text-base leading-8 text-white/75">
                        <?php esc_html_e('For privacy questions or requests, contact MyBaapStore support during business hours: Monday - Friday, 9:00 AM - 6:00 PM EST.', 'dawp'); ?>
                    </p>
                    <a href="mailto:<?php echo esc_attr($support_email); ?>" class="mt-6 inline-flex min-h-12 items-center justify-center rounded-xl bg-white px-6 text-sm font-bold text-[#102A43] transition hover:bg-[#EAF4FF]"><?php echo esc_html($support_email); ?></a>
                </section>
            </div>
        </div>
    </section>
</div>
