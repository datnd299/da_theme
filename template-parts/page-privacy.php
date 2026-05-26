<?php
/**
 * Privacy policy page for LBQ Shop.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email  = 'support@lbqshop.com';
$business_hours = __('Monday - Friday, 9:00 AM - 5:00 PM, GMT-08:00 Pacific Standard Time (Los Angeles)', 'dawp');
$contact_url    = home_url('/contact-us/');
$terms_url      = home_url('/terms-conditions/');

$summary_cards = [
    [
        'title' => __('Information We Collect', 'dawp'),
        'copy'  => __('Order, contact, shipping, billing, account, device, usage, and communication information needed to operate the store.', 'dawp'),
        'icon'  => 'file',
    ],
    [
        'title' => __('How We Use It', 'dawp'),
        'copy'  => __('To process orders, ship purchases, provide support, improve the site, prevent fraud, and meet legal obligations.', 'dawp'),
        'icon'  => 'check',
    ],
    [
        'title' => __('Your Choices', 'dawp'),
        'copy'  => __('You may contact us to update certain information, ask privacy questions, or opt out of marketing emails.', 'dawp'),
        'icon'  => 'settings',
    ],
];

$sections = [
    [
        'title' => __('1. Information We Collect', 'dawp'),
        'copy'  => [
            __('We collect information you provide when you place an order, create an account, contact support, subscribe to email updates, or otherwise interact with LBQ Shop.', 'dawp'),
            __('This may include your name, email address, phone number when provided, shipping address, billing address, order details, payment-related information, customer service messages, and product preferences.', 'dawp'),
            __('We may also collect device and usage information such as IP address, browser type, pages visited, referring pages, approximate location derived from technical information, and cookie or similar tracking data.', 'dawp'),
        ],
    ],
    [
        'title' => __('2. How We Use Information', 'dawp'),
        'copy'  => [
            __('We use information to process and fulfill orders, provide tracking, manage returns, respond to support requests, maintain store security, detect fraud, improve products and website performance, and comply with legal or tax requirements.', 'dawp'),
            __('If you opt in to marketing emails, we may send product updates or store news. You can unsubscribe from marketing emails at any time using the unsubscribe link or by contacting support.', 'dawp'),
        ],
    ],
    [
        'title' => __('3. Cookies and Similar Technologies', 'dawp'),
        'copy'  => [
            __('LBQ Shop may use cookies and similar technologies to keep the website functional, remember cart or session details, understand site usage, improve the shopping experience, and support security or fraud prevention.', 'dawp'),
            __('You can adjust cookie settings through your browser. Some store features may not work correctly if required cookies are disabled.', 'dawp'),
        ],
    ],
    [
        'title' => __('4. How Information Is Shared', 'dawp'),
        'copy'  => [
            __('We share information with service providers that help operate our store, such as payment processors, shipping carriers, fulfillment partners, website hosting providers, analytics tools, fraud prevention services, and customer support tools.', 'dawp'),
            __('We may also disclose information if required by law, to protect our rights, to prevent misuse of the site, or in connection with a business transfer such as a merger or asset sale.', 'dawp'),
            __('We do not sell customer personal information as a core business practice.', 'dawp'),
        ],
    ],
    [
        'title' => __('5. Payments', 'dawp'),
        'copy'  => [
            __('Payment information is processed by third-party payment providers. LBQ Shop does not intentionally store full payment card numbers on its own systems.', 'dawp'),
            __('Payment providers may collect and process payment details according to their own privacy and security practices.', 'dawp'),
        ],
    ],
    [
        'title' => __('6. Data Retention and Security', 'dawp'),
        'copy'  => [
            __('We keep information for as long as needed to provide services, complete transactions, support accounting or legal requirements, resolve disputes, and maintain security.', 'dawp'),
            __('We use reasonable administrative, technical, and organizational safeguards, but no website, transmission method, or storage system can be guaranteed completely secure.', 'dawp'),
        ],
    ],
    [
        'title' => __('7. Your Privacy Rights and Choices', 'dawp'),
        'copy'  => [
            __('Depending on your location, you may have rights to request access, correction, deletion, or information about certain personal data. You may also opt out of marketing emails.', 'dawp'),
            __('To make a privacy request, contact us using the support email below. We may need to verify your identity before completing certain requests.', 'dawp'),
        ],
    ],
    [
        'title' => __('8. Children Privacy', 'dawp'),
        'copy'  => [
            __('LBQ Shop is intended for general audiences and is not directed to children under 13. We do not knowingly collect personal information from children under 13.', 'dawp'),
        ],
    ],
    [
        'title' => __('9. Updates to This Policy', 'dawp'),
        'copy'  => [
            __('We may update this Privacy Policy from time to time. Changes will be posted on this page with the updated content.', 'dawp'),
        ],
    ],
];

$render_icon = static function ($icon) {
    $icons = [
        'file'     => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8Z"/><path d="M14 2v6h6"/><path d="M8 13h8"/><path d="M8 17h6"/>',
        'check'    => '<path d="m20 6-11 11-5-5"/>',
        'settings' => '<path d="M12 15.5A3.5 3.5 0 1 0 12 8a3.5 3.5 0 0 0 0 7.5Z"/><path d="M19.4 15a1.7 1.7 0 0 0 .34 1.88l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06A1.7 1.7 0 0 0 15 19.4a1.7 1.7 0 0 0-1 .6 1.7 1.7 0 0 0-.34 1.05V21a2 2 0 1 1-4 0v-.09A1.7 1.7 0 0 0 8.6 19.4a1.7 1.7 0 0 0-1.88.34l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06A1.7 1.7 0 0 0 4.6 15a1.7 1.7 0 0 0-.6-1 1.7 1.7 0 0 0-1.05-.34H3a2 2 0 1 1 0-4h.09A1.7 1.7 0 0 0 4.6 8.6a1.7 1.7 0 0 0-.34-1.88l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06A1.7 1.7 0 0 0 9 4.6a1.7 1.7 0 0 0 1-.6 1.7 1.7 0 0 0 .34-1.05V3a2 2 0 1 1 4 0v.09A1.7 1.7 0 0 0 15.4 4.6a1.7 1.7 0 0 0 1.88-.34l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06A1.7 1.7 0 0 0 19.4 9c.4.18.75.42 1 .75.26.32.4.73.4 1.15V11a2 2 0 1 1 0 4h-.09A1.7 1.7 0 0 0 19.4 15Z"/>',
    ];

    return $icons[$icon] ?? $icons['check'];
};
?>

<div class="bg-white text-[#2F2A28]">
    <section class="bg-[#F8F2EE] py-14 sm:py-20" aria-labelledby="privacy-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A96870]"><?php esc_html_e('Privacy Policy', 'dawp'); ?></p>
                <h1 id="privacy-title" class="mt-4 font-heading text-4xl font-extrabold leading-tight text-[#2F2A28] sm:text-5xl">
                    <?php esc_html_e('How LBQ Shop handles customer information.', 'dawp'); ?>
                </h1>
                <p class="mt-5 text-base leading-8 text-[#6F625D]">
                    <?php esc_html_e('This Privacy Policy explains how LBQ Shop collects, uses, shares, and protects information when you visit our website, place an order, or contact our support team.', 'dawp'); ?>
                </p>
            </div>

            <div class="mt-10 grid gap-4 md:grid-cols-3">
                <?php foreach ($summary_cards as $card) : ?>
                    <article class="rounded-md border border-[#E8DAD4] bg-white p-6 shadow-sm">
                        <div class="flex h-11 w-11 items-center justify-center rounded-md bg-[#FBEDEA] text-[#A96870]">
                            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <?php echo $render_icon($card['icon']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </svg>
                        </div>
                        <h2 class="mt-5 font-heading text-lg font-extrabold text-[#2F2A28]"><?php echo esc_html($card['title']); ?></h2>
                        <p class="mt-3 text-sm leading-6 text-[#6F625D]"><?php echo esc_html($card['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-[#FFFDFC] py-14 sm:py-20" aria-labelledby="privacy-content-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.78fr_1.22fr] lg:px-8">
            <aside class="lg:sticky lg:top-24 lg:self-start">
                <div class="rounded-md border border-[#E8DAD4] bg-white p-6 shadow-sm">
                    <h2 id="privacy-content-title" class="font-heading text-2xl font-extrabold text-[#2F2A28]"><?php esc_html_e('Policy overview', 'dawp'); ?></h2>
                    <p class="mt-4 text-sm leading-7 text-[#6F625D]">
                        <?php esc_html_e('LBQ Shop uses customer information to operate a beauty and fashion accessories store, process orders, provide support, and maintain a secure shopping experience.', 'dawp'); ?>
                    </p>
                    <div class="mt-6 border-t border-[#E8DAD4] pt-5 text-sm leading-7 text-[#6F625D]">
                        <?php
                        echo wp_kses(
                            sprintf(
                                /* translators: 1: support email, 2: business hours */
                                __('Privacy questions: %1$s. Business hours: %2$s.', 'dawp'),
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
                    </div>
                </div>
            </aside>

            <div class="grid gap-5">
                <?php foreach ($sections as $section) : ?>
                    <article class="rounded-md border border-[#E8DAD4] bg-white p-6 shadow-sm">
                        <h2 class="font-heading text-xl font-extrabold text-[#2F2A28]"><?php echo esc_html($section['title']); ?></h2>
                        <div class="mt-4 space-y-4 text-sm leading-7 text-[#6F625D]">
                            <?php foreach ($section['copy'] as $paragraph) : ?>
                                <p><?php echo esc_html($paragraph); ?></p>
                            <?php endforeach; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-[#F8F2EE] py-14 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-md border border-[#E8DAD4] bg-white p-6 sm:p-8">
                <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A96870]"><?php esc_html_e('Contact', 'dawp'); ?></p>
                        <h2 class="mt-3 font-heading text-2xl font-extrabold text-[#2F2A28]"><?php esc_html_e('Questions about privacy or account information?', 'dawp'); ?></h2>
                        <p class="mt-3 text-sm leading-7 text-[#6F625D]"><?php esc_html_e('Contact support and include enough detail for us to locate your account or order when needed.', 'dawp'); ?></p>
                    </div>
                    <div class="flex flex-col gap-3 sm:flex-row">
                        <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#C87F86] px-6 text-sm font-bold text-white transition hover:bg-[#2F2A28]">
                            <?php esc_html_e('Contact Support', 'dawp'); ?>
                        </a>
                        <a href="<?php echo esc_url($terms_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#C87F86] bg-white px-6 text-sm font-bold text-[#8A4F56] transition hover:bg-[#FBEDEA]">
                            <?php esc_html_e('Terms & Conditions', 'dawp'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
