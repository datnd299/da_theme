<?php
/**
 * Privacy policy page for Brickygo.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$store_name     = function_exists('dawp_get_store_contact') ? dawp_get_store_contact('name') : 'Brickygo';
$site_domain    = function_exists('dawp_get_store_contact') ? dawp_get_store_contact('domain') : 'https://brickygo.com';
$support_email  = function_exists('dawp_get_store_contact') ? dawp_get_store_contact('email') : 'support@brickygo.com';
$support_phone  = function_exists('dawp_get_store_contact') ? dawp_get_store_contact('phone') : '';
$store_address  = function_exists('dawp_get_store_contact') ? dawp_get_store_contact('address') : '';
$business_hours = __('Monday - Friday, 9:00 AM - 5:00 PM, GMT-08:00 Pacific Standard Time', 'dawp');
$contact_url    = home_url('/contact-us/');
$last_updated   = __('August 29, 2026', 'dawp');

$information_collected = [
    [
        'title' => __('Information You Provide Directly', 'dawp'),
        'copy'  => __('Personal Identification & Contact Data: Your full name, email address, physical shipping address, billing address, and phone number.', 'dawp'),
        'items' => [
            __('Transactional Data: Details about products you have purchased, order history, credit card processing tokens, and direct transcripts or records of communications sent to our customer support team.', 'dawp'),
        ],
    ],
    [
        'title' => __('Information Collected Automatically', 'dawp'),
        'copy'  => __('Whenever you navigate through Brickygo, our servers automatically log technical session details, including:', 'dawp'),
        'items' => [
            __('Your IP address, web browser type and version, language preferences, operating system, and referring/exit pages.', 'dawp'),
            __('Approximate geographic location derived from network signals.', 'dawp'),
            __('Specific interactions with our site captured via cookies, tracking pixels, or similar device identifiers.', 'dawp'),
        ],
    ],
];

$information_uses = [
    __('Process, manage, bill, fulfill, and securely dispatch your online product orders.', 'dawp'),
    __('Provide real-time shipping tracking codes, delivery updates, and automated invoice confirmations.', 'dawp'),
    __('Screen transactional logs for potential operational risks, technical vulnerabilities, or system fraud.', 'dawp'),
    __('Handle standard product returns, warranties, and resolve customer service inquiries.', 'dawp'),
    __('Optimize website layout responsiveness, page loading speed, site performance, and inventory selection.', 'dawp'),
    __('Marketing Communications: With your explicit opt-in consent, deliver store newsletters and promotional updates. Every promotional email includes an immediate and functional "Unsubscribe" link at the footer.', 'dawp'),
];

$sharing_partners = [
    [
        'title' => __('Infrastructure & Platform Partners', 'dawp'),
        'copy'  => __('E-commerce platform hosts, cloud infrastructure providers, and backend database management utilities.', 'dawp'),
    ],
    [
        'title' => __('Logistics & Payment Processors', 'dawp'),
        'copy'  => __('Certified payment processing gateways and trusted domestic/international shipping carriers used to fulfill and deliver your orders.', 'dawp'),
    ],
    [
        'title' => __('Legal & Regulatory Demands', 'dawp'),
        'copy'  => __('We may disclose your data if required by law to comply with applicable federal/state laws, tax audits, court subpoenas, or to defend the safety, legal rights, and property of Brickygo, our staff, and our consumers.', 'dawp'),
    ],
];

$privacy_rights = [
    __('Right to Access / Know: Request disclosure of what personal data we have collected, used, or shared about you.', 'dawp'),
    __('Right to Delete: Request the permanent removal of your personal profile and data from our active directories, subject to statutory retention requirements.', 'dawp'),
    __('Right to Correct / Rectify: Request rectification of inaccurate or outdated account records.', 'dawp'),
    __('Right to Opt-Out: Opt out of the sale or sharing of personal information (Note: Brickygo does not sell personal data).', 'dawp'),
];

$contact_details = [
    [
        'label' => __('Store Name', 'dawp'),
        'value' => $store_name,
    ],
    [
        'label' => __('Customer Support Email', 'dawp'),
        'value' => $support_email,
        'url'   => 'mailto:' . $support_email,
    ],
    [
        'label' => __('Support Hours', 'dawp'),
        'value' => $business_hours,
    ],
];

if ($support_phone) {
    $contact_details[] = [
        'label' => __('Phone Number', 'dawp'),
        'value' => $support_phone,
        'url'   => 'tel:' . $support_phone,
    ];
}

if ($store_address) {
    $contact_details[] = [
        'label' => __('Physical Business Address', 'dawp'),
        'value' => $store_address,
    ];
}

$sections = [
    [
        'title' => __('1. Information We Collect', 'dawp'),
        'copy'  => [
            __('To fulfill your orders and provide a seamless e-commerce experience, we gather two primary categories of data:', 'dawp'),
        ],
        'cards' => $information_collected,
    ],
    [
        'title' => __('2. How We Use Your Information', 'dawp'),
        'copy'  => [
            __('We process your personal information strictly for legitimate commercial and operational purposes, specifically to:', 'dawp'),
        ],
        'list'  => $information_uses,
    ],
    [
        'title' => __('3. Cookies, Pixels, and Tracking Technologies', 'dawp'),
        'copy'  => [
            __('Brickygo utilizes functional, analytical, and advertising cookies--small data files stored on your local device--to maintain essential online store capabilities and enhance your experience.', 'dawp'),
            __('Essential Cookies: Maintain core shopping functionality, remember shopping cart contents across sessions, and preserve secure account logins.', 'dawp'),
            __('Analytics Cookies: Gather aggregated, anonymous traffic insights via tools such as Google Analytics to help us understand how visitors interact with the site.', 'dawp'),
            __('Advertising & Marketing Pixels: We may utilize tracking technologies (such as Google Ads Remarketing or Meta Pixels) to serve personalized, relevant advertisements to you on third-party websites based on your prior visits to our site.', 'dawp'),
            __('Managing Cookies: You can adjust or disable your cookie preferences through your individual browser settings. You can also opt out of personalized Google advertising by visiting Google Ad Settings. Please note that disabling essential cookies may break core shopping features, such as the checkout and payment process.', 'dawp'),
        ],
    ],
    [
        'title' => __('4. How Information Is Shared', 'dawp'),
        'copy'  => [
            __('We do not sell, rent, trade, monetize, or disclose your personal information to third parties for commercial gain. We share transactional and technical data strictly with trusted service providers who assist us in operating our storefront, subject to strict confidentiality agreements:', 'dawp'),
        ],
        'cards' => $sharing_partners,
    ],
    [
        'title' => __('5. Secure Payments & Data Encryption', 'dawp'),
        'copy'  => [
            __('Your financial safety is our highest priority. Brickygo does not store, view, or retain raw credit card numbers or sensitive payment credentials on our corporate servers.', 'dawp'),
            __('All checkout transactions are executed over a fully secure, encrypted SSL (Secure Sockets Layer) connection using industry-standard 256-bit encryption.', 'dawp'),
            __('Financial data processing is handled entirely by certified third-party payment gateways (e.g., Stripe, PayPal) that strictly comply with the Payment Card Industry Data Security Standard (PCI-DSS).', 'dawp'),
        ],
    ],
    [
        'title' => __('6. Data Retention and Security', 'dawp'),
        'copy'  => [
            __('Retention: We retain your personal order information within our secure business registries for as long as legally and operationally necessary to complete transactions, fulfill corporate tax reporting, resolve potential billing disputes, and satisfy statutory accounting requirements.', 'dawp'),
            __('Security Measures: We implement robust administrative, technical, and physical safeguards designed to defend your files against unauthorized access, loss, or alteration. However, please note that no method of online transmission or electronic storage can be guaranteed 100% secure.', 'dawp'),
        ],
    ],
    [
        'title' => __('7. Consumer Privacy Rights (CCPA/GDPR Compliance)', 'dawp'),
        'copy'  => [
            __('Depending on your geographic location, you possess specific consumer protection rights regarding your personal data:', 'dawp'),
        ],
        'list'  => $privacy_rights,
        'after' => __('To submit a formal privacy or data-removal request, please contact our Compliance Officer using the details provided below.', 'dawp'),
    ],
    [
        'title' => __('8. Children\'s Privacy', 'dawp'),
        'copy'  => [
            __('Brickygo is intended for a general audience and is strictly directed toward consumers who have reached the legal age of majority in their jurisdiction. We do not knowingly or intentionally collect, solicit, or maintain personal information from children under the age of 13. If you believe that a minor under 13 has provided us with personal data, please contact us immediately, and we will promptly purge such information from our records.', 'dawp'),
        ],
    ],
];

?>

<div class="bgs-policy bg-white text-[#2B2B2B]">
    <section class="bgs-policy__hero bg-[#F8F5F0] py-14 sm:py-20" aria-labelledby="privacy-title">
        <div class="bgs-policy__shell mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:items-end lg:px-8">
            <div>
                <p class="bgs-policy-kicker text-sm font-extrabold uppercase tracking-[0.14em] text-[#A45A3F]"><?php esc_html_e('Privacy Policy', 'dawp'); ?></p>
                <h1 id="privacy-title" class="mt-4 font-heading text-4xl font-extrabold leading-tight text-[#2B2B2B] sm:text-5xl">
                    <?php esc_html_e('How Brickygo protects customer information.', 'dawp'); ?>
                </h1>
                <p class="mt-5 max-w-2xl text-base leading-8 text-[#4A4A4A]">
                    <?php
                    echo esc_html(
                        sprintf(
                            /* translators: 1: store name, 2: site domain */
                            __('At %1$s, accessible from %2$s, one of our main priorities is the privacy and security of our visitors. This Privacy Policy document outlines the types of personal information that is collected and recorded by %1$s and how we use, share, and protect it in compliance with global standards and standard e-commerce regulations.', 'dawp'),
                            $store_name,
                            $site_domain
                        )
                    );
                    ?>
                </p>
            </div>

            <div class="bgs-policy-meta rounded-md border border-[#E8E5DF] bg-white p-6 shadow-sm">
                <p class="bgs-policy-kicker text-sm font-extrabold uppercase tracking-[0.14em] text-[#A45A3F]"><?php esc_html_e('Last Updated', 'dawp'); ?></p>
                <p class="mt-3 font-heading text-2xl font-extrabold text-[#2B2B2B]"><?php echo esc_html($last_updated); ?></p>
            </div>
        </div>
    </section>

    <section class="bgs-policy__content bg-[#FFFFFF] py-12 sm:py-16" aria-labelledby="privacy-content-title">
        <div class="bgs-policy__shell mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <h2 id="privacy-content-title" class="sr-only"><?php esc_html_e('Privacy Policy Details', 'dawp'); ?></h2>
            <div class="grid gap-4">
                <?php foreach ($sections as $section) : ?>
                    <article class="rounded-md border border-[#E8E5DF] bg-white p-5 shadow-sm sm:p-6">
                        <h2 class="font-heading text-xl font-extrabold text-[#2B2B2B]"><?php echo esc_html($section['title']); ?></h2>

                        <?php if (!empty($section['copy'])) : ?>
                            <div class="mt-4 space-y-4 text-sm leading-7 text-[#4A4A4A]">
                                <?php foreach ($section['copy'] as $paragraph) : ?>
                                    <p><?php echo esc_html($paragraph); ?></p>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($section['cards'])) : ?>
                            <div class="mt-5 grid gap-4 md:grid-cols-2">
                                <?php foreach ($section['cards'] as $card) : ?>
                                    <section class="rounded-md border border-[#E8E5DF] bg-[#FFFFFF] p-5">
                                        <h3 class="font-heading text-lg font-extrabold text-[#2B2B2B]"><?php echo esc_html($card['title']); ?></h3>
                                        <p class="mt-3 text-sm leading-7 text-[#4A4A4A]"><?php echo esc_html($card['copy']); ?></p>
                                        <?php if (!empty($card['items'])) : ?>
                                            <ul class="mt-4 grid gap-3 text-sm leading-7 text-[#4A4A4A]">
                                                <?php foreach ($card['items'] as $item) : ?>
                                                    <li class="flex gap-3">
                                                        <span aria-hidden="true">&bull;</span>
                                                        <span><?php echo esc_html($item); ?></span>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </section>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($section['list'])) : ?>
                            <ul class="mt-5 grid gap-3 text-sm leading-7 text-[#4A4A4A]">
                                <?php foreach ($section['list'] as $item) : ?>
                                    <li class="flex gap-3">
                                        <span aria-hidden="true">&bull;</span>
                                        <span><?php echo esc_html($item); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <?php if (!empty($section['after'])) : ?>
                            <p class="mt-5 text-sm leading-7 text-[#4A4A4A]"><?php echo esc_html($section['after']); ?></p>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>

                <article class="rounded-md border border-[#E8E5DF] bg-[#F8F5F0] p-5 shadow-sm sm:p-6">
                    <h2 class="font-heading text-xl font-extrabold text-[#2B2B2B]"><?php esc_html_e('9. Contact Us & Business Details', 'dawp'); ?></h2>
                    <p class="mt-4 text-sm leading-7 text-[#4A4A4A]">
                        <?php esc_html_e('If you have any questions about this Privacy Policy, wish to exercise your legal data rights, or need customer support, please contact us through our official business channels:', 'dawp'); ?>
                    </p>
                    <dl class="mt-5 grid gap-4 md:grid-cols-2">
                        <?php foreach ($contact_details as $detail) : ?>
                            <div class="rounded-md border border-[#E8E5DF] bg-white p-5">
                                <dt class="text-sm font-extrabold text-[#2B2B2B]"><?php echo esc_html($detail['label']); ?></dt>
                                <dd class="mt-3 text-sm leading-7 text-[#4A4A4A]">
                                    <?php if (!empty($detail['url'])) : ?>
                                        <a class="font-bold text-[#A45A3F] underline decoration-[#A45A3F]/40 underline-offset-4 transition hover:text-[#7F422F]" href="<?php echo esc_url($detail['url']); ?>"><?php echo esc_html($detail['value']); ?></a>
                                    <?php else : ?>
                                        <?php echo esc_html($detail['value']); ?>
                                    <?php endif; ?>
                                </dd>
                            </div>
                        <?php endforeach; ?>
                    </dl>
                </article>
            </div>
        </div>
    </section>
</div>
