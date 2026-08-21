<?php
/**
 * Privacy policy page for US Watch Store.
 *
 * Hallmark · genre: modern-minimal · macrostructure: Long Document (continuous
 * prose sections, no per-section card boxes)
 * nav: N12 · footer: Ft1 · design-system: .plans/design_system.md (locked)
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email  = 'support@uswatchstore.com';
$business_hours = __('Monday - Friday, 9:00 AM - 6:00 PM EST', 'dawp');
$store_address  = __('1420 Kettner Blvd, San Diego, CA 92101, United States', 'dawp');
$last_updated   = __('August 21, 2026', 'dawp');
$contact_url    = home_url('/contact-us/');
$terms_url      = home_url('/terms-of-service/');

$summary_cards = [
    [
        'title' => __('Information We Collect', 'dawp'),
        'copy'  => __('Order, contact, shipping, billing, device, usage, and communication information needed to operate the store.', 'dawp'),
        'icon'  => 'file',
    ],
    [
        'title' => __('How We Use It', 'dawp'),
        'copy'  => __('To process orders, ship purchases, provide support, run analytics and ad measurement, prevent fraud, and meet legal obligations.', 'dawp'),
        'icon'  => 'check',
    ],
    [
        'title' => __('Your Choices', 'dawp'),
        'copy'  => __('Request access, correction, or deletion, opt out of marketing emails, or exercise California privacy rights any time.', 'dawp'),
        'icon'  => 'settings',
    ],
];

$sections = [
    [
        'title' => __('1. Overview and Scope', 'dawp'),
        'copy'  => [
            __('This Privacy Policy explains how US Watch Store ("we," "us," or "our"), operating uswatchstore.com from San Diego, California, collects, uses, discloses, and protects information when you visit our website, browse products, place an order, contact customer support, or otherwise interact with our store.', 'dawp'),
            __('By using this website or providing information to us, you agree to the practices described in this Privacy Policy. If you do not agree, please do not use the website or submit personal information to us.', 'dawp'),
            __('This policy applies to information collected through uswatchstore.com. It does not apply to information collected offline or through third-party websites and social media platforms we do not control, including any linked Instagram or Facebook pages.', 'dawp'),
        ],
    ],
    [
        'title' => __('2. Information We Collect', 'dawp'),
        'copy'  => [
            __('Information you provide directly: your name, email address, phone number, shipping address, billing address, order details, payment-related information entered at checkout, messages sent through our contact form, and any details you include in return or warranty requests.', 'dawp'),
            __('Information collected automatically: IP address, browser type and version, device type, operating system, referring website, pages viewed, time spent on pages, links clicked, approximate location derived from IP address, and cookie identifiers collected through server logs and the tracking technologies described in Section 4.', 'dawp'),
            __('Information from third parties: our payment processor and shipping carriers may share limited transaction or delivery-status information with us, such as payment confirmation, fraud-risk signals, and shipment tracking updates, to help us process and secure your order.', 'dawp'),
            __('We do not knowingly collect sensitive categories of personal information, such as government ID numbers, health information, or biometric data, through this website.', 'dawp'),
        ],
    ],
    [
        'title' => __('3. How We Use Your Information', 'dawp'),
        'copy'  => [
            __('Order processing and fulfillment: to confirm, process, pack, ship, and track your order; to calculate applicable sales tax; and to send order confirmations, shipping notifications, and delivery updates.', 'dawp'),
            __('Customer support: to respond to questions, process return and warranty requests, and resolve billing or delivery issues.', 'dawp'),
            __('Store operations and security: to maintain website functionality, detect and prevent fraud or unauthorized transactions, enforce our Terms of Service, and comply with legal, tax, and accounting obligations.', 'dawp'),
            __('Marketing, with your consent where required: if you opt in, to send product updates, promotions, or store news by email. You may unsubscribe at any time using the link in any marketing email or by contacting support@uswatchstore.com.', 'dawp'),
            __('Analytics and improvement: to understand how visitors use the website, measure the performance of pages and product listings, and improve site speed, navigation, and merchandising.', 'dawp'),
        ],
    ],
    [
        'title' => __('4. Cookies, Analytics, and Advertising Technologies', 'dawp'),
        'copy'  => [
            __('Cookies are small text files stored on your device. We use strictly necessary cookies to operate core functions such as the shopping cart, checkout, and session security; functional cookies to remember preferences; and analytics and advertising cookies described below.', 'dawp'),
            __('We use Google Analytics to understand aggregate website traffic and behavior, such as pages visited, time on site, and general geographic region. You can learn more or opt out at tools.google.com/dlpage/gaoptout.', 'dawp'),
            __('We may use Google Ads and similar tools to measure the performance of our Google Shopping and search campaigns and to show relevant ads to past visitors (remarketing). You can manage ad personalization at adssettings.google.com or opt out of interest-based advertising through the Digital Advertising Alliance at optout.aboutads.info.', 'dawp'),
            __('Most browsers let you refuse, block, or delete cookies through browser settings. Disabling strictly necessary cookies may prevent parts of the site, including checkout, from functioning correctly.', 'dawp'),
        ],
    ],
    [
        'title' => __('5. How We Share Your Information', 'dawp'),
        'copy'  => [
            __('We share information with service providers who perform functions on our behalf, including: payment processors that authorize and process card and PayPal transactions; shipping carriers such as USPS, UPS, and FedEx that deliver orders and provide tracking; email and customer-support platforms; website hosting and content-delivery providers; and the analytics and advertising platforms described in Section 4.', 'dawp'),
            __('These service providers may use your information only as necessary to provide their services to us and are contractually or otherwise required to protect it.', 'dawp'),
            __('We may disclose information if required by law, subpoena, or legal process; to protect the rights, property, or safety of US Watch Store, our customers, or others; to investigate fraud or security issues; or in connection with a merger, acquisition, financing, or sale of business assets, in which case information may be transferred as part of that transaction.', 'dawp'),
            __('We do not sell personal information to third parties for money, and we do not share personal information with third parties for their own independent marketing purposes without your consent.', 'dawp'),
        ],
    ],
    [
        'title' => __('6. Payment Information and Security', 'dawp'),
        'copy'  => [
            __('Checkout payments are processed by PCI-DSS-compliant third-party payment processors and PayPal. US Watch Store does not store full card numbers, card verification codes (CVV), or complete payment credentials on its own servers.', 'dawp'),
            __('Payment processors and PayPal maintain their own privacy and security practices governing the payment information you provide directly to them during checkout.', 'dawp'),
        ],
    ],
    [
        'title' => __('7. Data Retention', 'dawp'),
        'copy'  => [
            __('We retain order and transaction records for as long as necessary to fulfill orders, honor our 30-day return window and 2-year warranty, comply with tax and accounting requirements, resolve disputes, and enforce our agreements, generally for the period required by applicable US federal and California state recordkeeping laws.', 'dawp'),
            __('Contact form messages and support correspondence are retained for as long as needed to resolve your inquiry and for a reasonable period afterward for quality and recordkeeping purposes, after which they may be deleted or anonymized.', 'dawp'),
        ],
    ],
    [
        'title' => __('8. Data Security', 'dawp'),
        'copy'  => [
            __('We use administrative, technical, and organizational safeguards designed to protect personal information from unauthorized access, use, disclosure, alteration, or loss, including encrypted checkout (SSL/TLS), restricted internal access to order data, and reputable third-party infrastructure providers.', 'dawp'),
            __('No website, transmission method, or storage system can be guaranteed 100% secure. If we become aware of a security incident affecting your personal information, we will notify affected individuals and any applicable authorities as required by law.', 'dawp'),
        ],
    ],
    [
        'title' => __('9. Your Privacy Rights and Choices', 'dawp'),
        'copy'  => [
            __('Depending on your state of residence, you may have the right to request access to, correction of, or deletion of certain personal information we hold about you, and to opt out of marketing communications.', 'dawp'),
            __('To exercise these rights, email support@uswatchstore.com with your request and enough detail, such as your order number or the email address used to order, for us to locate and verify your information. We will respond within a reasonable time and may need to verify your identity before completing certain requests.', 'dawp'),
            __('You may unsubscribe from marketing emails at any time using the unsubscribe link included in those emails; you will still receive transactional emails related to orders you place, such as order confirmations and shipping updates.', 'dawp'),
        ],
    ],
    [
        'title' => __('10. California Privacy Rights (CCPA/CPRA)', 'dawp'),
        'copy'  => [
            __('If you are a California resident, the California Consumer Privacy Act (CCPA), as amended by the California Privacy Rights Act (CPRA), gives you additional rights, including the right to know the categories and specific pieces of personal information collected, the right to request deletion, the right to correct inaccurate information, and the right to opt out of the sale or sharing of personal information.', 'dawp'),
            __('In the preceding 12 months, we have collected the categories of personal information described in Section 2 for the business purposes described in Section 3. We do not sell personal information for monetary consideration, and beyond the advertising and analytics cookies described in Section 4, we do not share personal information in a manner that constitutes a "sale" or "share" requiring an opt-out link under the CCPA/CPRA.', 'dawp'),
            __('California residents may submit a CCPA/CPRA request by emailing support@uswatchstore.com. We will not discriminate against you for exercising your privacy rights.', 'dawp'),
        ],
    ],
    [
        'title' => __('11. Third-Party Links and Services', 'dawp'),
        'copy'  => [
            __('Our website may contain links to third-party websites, social media platforms, or services we do not control, including Instagram and Facebook. This Privacy Policy does not apply to those third-party sites, and we encourage you to review their privacy policies before providing information to them.', 'dawp'),
        ],
    ],
    [
        'title' => __('12. Children\'s Privacy', 'dawp'),
        'copy'  => [
            __('US Watch Store is intended for general audiences and is not directed to children under 13. We do not knowingly collect personal information from children under 13. If we learn that we have inadvertently collected such information, we will take reasonable steps to delete it.', 'dawp'),
        ],
    ],
    [
        'title' => __('13. International Visitors', 'dawp'),
        'copy'  => [
            __('US Watch Store currently ships only within the United States and operates from the United States. If you access the website from outside the United States, your information will be transferred to, stored, and processed in the United States, which may have different data protection laws than your country of residence.', 'dawp'),
        ],
    ],
    [
        'title' => __('14. Changes to This Privacy Policy', 'dawp'),
        'copy'  => [
            __('We may update this Privacy Policy periodically to reflect changes in our practices, technology, legal requirements, or other factors. The "Last Updated" date at the top of this page indicates when this policy was last revised. Material changes will be posted on this page, and continued use of the website after changes are posted constitutes acceptance of the updated policy.', 'dawp'),
        ],
    ],
    [
        'title' => __('15. Contact Us', 'dawp'),
        'copy'  => [
            __('Questions, requests, or concerns about this Privacy Policy or your personal information can be sent to support@uswatchstore.com or by mail to US Watch Store, 1420 Kettner Blvd, San Diego, CA 92101, United States.', 'dawp'),
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

<div class="bg-background text-foreground">
    <section class="bg-surface py-14 sm:py-20" aria-labelledby="privacy-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <div class="flex flex-wrap items-center gap-3">
                    <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-accent-blush"><?php esc_html_e('Privacy Policy', 'dawp'); ?></p>
                    <span class="inline-flex items-center rounded-sm border border-border bg-background px-2.5 py-1 text-xs font-semibold uppercase tracking-[0.08em] text-muted">
                        <?php echo esc_html(sprintf(__('Last Updated: %s', 'dawp'), $last_updated)); ?>
                    </span>
                </div>
                <h1 id="privacy-title" class="mt-4 font-heading text-4xl font-extrabold leading-tight text-foreground sm:text-5xl">
                    <?php esc_html_e('How US Watch Store handles customer information.', 'dawp'); ?>
                </h1>
                <p class="mt-5 max-w-2xl text-base leading-8 text-foreground-muted">
                    <?php esc_html_e('This Privacy Policy explains how US Watch Store collects, uses, shares, and protects information when you visit our website, place an order, or contact our support team.', 'dawp'); ?>
                </p>
            </div>

            <div class="mt-10 grid gap-4 md:grid-cols-3">
                <?php foreach ($summary_cards as $card) : ?>
                    <article class="rounded-md border border-border bg-background p-6 shadow-card">
                        <div class="flex h-11 w-11 items-center justify-center rounded-sm bg-accent-soft text-accent-blush">
                            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <?php echo $render_icon($card['icon']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </svg>
                        </div>
                        <h2 class="mt-5 font-heading text-lg font-extrabold text-foreground"><?php echo esc_html($card['title']); ?></h2>
                        <p class="mt-3 text-sm leading-6 text-foreground-muted"><?php echo esc_html($card['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Long Document: continuous prose, inline section heads, no card boxes -->
    <section class="bg-background py-16 sm:py-24" aria-labelledby="privacy-content-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.7fr_1.3fr] lg:px-8">
            <aside class="lg:sticky lg:top-24 lg:self-start">
                <div class="rounded-md border border-border bg-surface p-6">
                    <h2 id="privacy-content-title" class="font-heading text-xl font-extrabold text-foreground"><?php esc_html_e('Policy overview', 'dawp'); ?></h2>
                    <p class="mt-4 text-sm leading-7 text-foreground-muted">
                        <?php esc_html_e('US Watch Store uses customer information to operate a watch store, process orders, provide support, and maintain a secure shopping experience.', 'dawp'); ?>
                    </p>
                    <div class="mt-6 border-t border-border pt-5 text-sm leading-7 text-foreground-muted">
                        <?php
                        echo wp_kses(
                            sprintf(
                                /* translators: 1: support email, 2: business hours */
                                __('Privacy questions: %1$s. Business hours: %2$s.', 'dawp'),
                                '<a class="font-bold text-accent-hover underline decoration-accent/40 underline-offset-4 transition hover:text-foreground" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>',
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
                    <p class="mt-4 text-sm leading-7 text-foreground-muted"><?php echo esc_html($store_address); ?></p>
                </div>
            </aside>

            <div class="max-w-[65ch] divide-y divide-border">
                <?php foreach ($sections as $section) : ?>
                    <article class="py-7 first:pt-0">
                        <h2 class="font-heading text-xl font-extrabold text-foreground"><?php echo esc_html($section['title']); ?></h2>
                        <div class="mt-4 space-y-4 text-base leading-7 text-foreground-muted">
                            <?php foreach ($section['copy'] as $paragraph) : ?>
                                <p><?php echo esc_html($paragraph); ?></p>
                            <?php endforeach; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-surface py-14 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-md border border-border bg-background p-6 sm:p-8">
                <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <h2 class="font-heading text-2xl font-extrabold text-foreground"><?php esc_html_e('Questions about privacy or account information?', 'dawp'); ?></h2>
                        <p class="mt-3 text-sm leading-7 text-foreground-muted"><?php esc_html_e('Contact support and include enough detail for us to locate your account or order when needed.', 'dawp'); ?></p>
                    </div>
                    <div class="flex flex-col gap-3 sm:flex-row">
                        <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center whitespace-nowrap rounded-sm bg-accent px-6 text-sm font-bold text-white transition hover:bg-accent-hover">
                            <?php esc_html_e('Contact Support', 'dawp'); ?>
                        </a>
                        <a href="<?php echo esc_url($terms_url); ?>" class="inline-flex min-h-12 items-center justify-center whitespace-nowrap rounded-sm border border-accent bg-background px-6 text-sm font-bold text-accent-hover transition hover:bg-surface-alt">
                            <?php esc_html_e('Terms of Service', 'dawp'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
