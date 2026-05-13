<?php
/**
 * Privacy policy template part for Shop Avec Moi.
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email = 'support@shopavecmoi.com';

$privacy_cards = [
    [
        'title' => 'Order Information',
        'copy'  => 'We collect the information needed to process orders, provide delivery updates, and support customer service.',
    ],
    [
        'title' => 'Secure Checkout',
        'copy'  => 'Payments are handled through secure payment providers. We do not store full payment card numbers on our website.',
    ],
    [
        'title' => 'Customer Control',
        'copy'  => 'You may contact us to request access, correction, or deletion of eligible personal information.',
    ],
];

$sections = [
    [
        'title' => 'Information We Collect',
        'copy'  => [
            'We collect information you provide when you place an order, create an account, contact support, subscribe to updates, or interact with our website.',
            'This may include your name, email address, shipping address, billing address, phone number, order details, account details, support messages, and transaction-related information.',
            'We may also collect technical information such as IP address, browser type, device information, pages viewed, referral source, and cookie or analytics data.',
        ],
    ],
    [
        'title' => 'How We Use Information',
        'copy'  => [
            'We use personal information to process orders, arrange shipping, send order confirmations and tracking updates, provide customer support, manage returns and refunds, prevent fraud, improve our website, and comply with legal obligations.',
            'If you choose to receive marketing messages, we may use your contact information to send product updates or offers. You can unsubscribe from marketing emails at any time.',
        ],
    ],
    [
        'title' => 'Cookies And Analytics',
        'copy'  => [
            'Our website may use cookies and similar technologies to support site functionality, remember preferences, understand website performance, improve shopping experience, and support advertising or analytics.',
            'You can adjust cookie settings through your browser. Some site features may not work properly if cookies are disabled.',
        ],
    ],
    [
        'title' => 'How We Share Information',
        'copy'  => [
            'We share information only as needed with service providers that help us operate the store, including payment processors, shipping carriers, ecommerce platform providers, fraud prevention tools, analytics providers, email services, and customer support tools.',
            'We may also share information if required by law, to protect our rights, to prevent fraud or security issues, or in connection with a business transfer such as a merger or sale.',
        ],
    ],
    [
        'title' => 'Data Security And Retention',
        'copy'  => [
            'We use reasonable administrative, technical, and organizational safeguards to protect personal information. No online system is completely secure, so we cannot guarantee absolute security.',
            'We keep personal information only as long as needed for order records, customer support, legal compliance, fraud prevention, accounting, and legitimate business purposes.',
        ],
    ],
    [
        'title' => 'Your Privacy Choices',
        'copy'  => [
            'Depending on where you live, you may have rights to request access, correction, deletion, portability, or restriction of certain personal information.',
            'To make a privacy request, email us at support@shopavecmoi.com. We may need to verify your identity before completing certain requests.',
        ],
    ],
    [
        'title' => 'Children\'s Privacy',
        'copy'  => [
            'Shop Avec Moi is intended for adult shoppers and does not knowingly collect personal information from children under 13. If you believe a child has provided personal information, please contact us so we can review and delete it where appropriate.',
        ],
    ],
    [
        'title' => 'Policy Updates',
        'copy'  => [
            'We may update this Privacy Policy from time to time. Updates will be posted on this page with a revised last updated date.',
        ],
    ],
];
?>

<div class="bg-white text-[#24132E] antialiased">
    <section class="bg-[#FBF4FF] px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto max-w-4xl text-center">
            <p class="text-sm font-semibold uppercase text-[#6E3A8A]">Privacy &amp; Trust</p>
            <h1 class="mt-4 font-heading text-5xl leading-[1.05] text-[#3B1748] sm:text-6xl">
                Privacy Policy
            </h1>
            <p class="mt-6 text-base leading-7 text-[#6D5875] sm:text-lg">
                This policy explains how Shop Avec Moi collects, uses, shares, and protects personal information when you visit our website or place an order.
            </p>
            <p class="mt-4 text-sm font-semibold text-[#6E3A8A]">Last updated: May 13, 2026</p>
        </div>
    </section>

    <section class="bg-white px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto max-w-7xl">
            <div class="grid gap-4 md:grid-cols-3">
                <?php foreach ($privacy_cards as $card) : ?>
                    <div class="rounded-2xl border border-[#E8DFF0] bg-white p-6 shadow-sm shadow-[#3B1748]/10">
                        <h2 class="font-heading text-2xl leading-tight text-[#3B1748]"><?php echo esc_html($card['title']); ?></h2>
                        <p class="mt-3 text-sm leading-6 text-[#6D5875]"><?php echo esc_html($card['copy']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="mt-12 grid gap-8 lg:grid-cols-[0.72fr_1.28fr]">
                <aside class="rounded-[2rem] bg-[#21102C] p-6 text-white lg:p-8">
                    <p class="text-sm font-semibold uppercase text-white">Privacy Contact</p>
                    <h2 class="mt-3 font-heading text-3xl leading-tight text-white">Questions about your information?</h2>
                    <p class="mt-4 text-sm leading-6 text-white/75">
                        Contact our support team for privacy requests or questions about how your order information is handled.
                    </p>
                    <a class="mt-7 inline-flex min-h-12 items-center justify-center rounded-full bg-white px-7 py-3 text-sm font-semibold text-[#3B1748] transition duration-300 hover:bg-[#FBF4FF]" href="mailto:<?php echo esc_attr($support_email); ?>">
                        <?php echo esc_html($support_email); ?>
                    </a>
                </aside>

                <div class="grid gap-6">
                    <?php foreach ($sections as $section) : ?>
                        <section class="rounded-2xl border border-[#E8DFF0] bg-white p-6 shadow-sm shadow-[#3B1748]/10 lg:p-8">
                            <h2 class="font-heading text-3xl leading-tight text-[#3B1748]"><?php echo esc_html($section['title']); ?></h2>
                            <div class="mt-5 grid gap-4 text-sm leading-7 text-[#6D5875]">
                                <?php foreach ($section['copy'] as $paragraph) : ?>
                                    <p><?php echo esc_html($paragraph); ?></p>
                                <?php endforeach; ?>
                            </div>
                        </section>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</div>
