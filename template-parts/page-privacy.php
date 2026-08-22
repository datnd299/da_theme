<?php
/**
 * Privacy policy page for luxurytheme.com.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$store_name     = 'luxurytheme.com';
$site_domain    = 'luxurytheme.com';
$support_email  = 'concierge@luxurytheme.com';
$support_phone  = '757-804-6538';
$store_address  = '57 Calvert St, Woodbridge, VA 22191-2840';
$business_hours = __('Monday - Friday, 9:00 AM - 5:00 PM, GMT-08:00 Pacific Standard Time', 'dawp');
$contact_url    = home_url('/contact-us/');
$last_updated   = __('May 29, 2026', 'dawp');

$policy_intro = [
    __('At luxurytheme.com, accessible via luxurytheme.com (the "Site"), we are deeply committed to protecting the privacy, security, and personal data of our visitors and customers. This Privacy Policy outlines how your personal information is collected, utilized, shared, and securely protected when you browse our catalog, create an account, interact with our customer support, or purchase luxury watches, fine timepieces and premium accessories from our online store.', 'dawp'),
    __('By accessing our Site or placing an order, you acknowledge and agree to the data management practices described in this policy.', 'dawp'),
];

$information_collected = [
    [
        'title' => __('Information You Provide Directly', 'dawp'),
        'copy'  => __('This includes your full name, email address, physical shipping address, billing address, phone number when provided, specific purchase history, credit card processing tokens, and any direct transcripts of customer service messages sent to our support team.', 'dawp'),
    ],
    [
        'title' => __('Information Collected Automatically', 'dawp'),
        'copy'  => __('Whenever you navigate through luxurytheme.com, our servers log technical session details. This tracking includes your IP address, web browser type, referring/exit pages, approximate geographic location derived from network signals, and specific data captured via cookies or similar device identifiers.', 'dawp'),
    ],
];

$information_uses = [
    __('Process, manage, bill, and securely dispatch your online product orders.', 'dawp'),
    __('Provide real-time shipping tracking codes and automated invoice confirmations.', 'dawp'),
    __('Screen transactional logs for potential operational risks, technical vulnerabilities, or system fraud.', 'dawp'),
    __('Handle standard product returns and resolve customer service inquiries.', 'dawp'),
    __('Optimize website layout responsiveness, page loading speed, and inventory selection.', 'dawp'),
    __('With your explicit opt-in consent, deliver store newsletters and promotional updates, featuring an immediate "Unsubscribe" link in every email.', 'dawp'),
];

$sharing_partners = [
    [
        'title' => __('Infrastructure Partners', 'dawp'),
        'copy'  => __('E-commerce platform hosts and backend database management utilities.', 'dawp'),
    ],
    [
        'title' => __('Logistics & Payment', 'dawp'),
        'copy'  => __('Certified payment processing gateways and trusted domestic U.S. shipping carriers used to deliver your orders.', 'dawp'),
    ],
    [
        'title' => __('Regulatory Demands', 'dawp'),
        'copy'  => __('We may disclose your data if strictly required to comply with applicable federal laws, tax audits, court subpoenas, or to defend the safety and property rights of luxurytheme.com and our consumers.', 'dawp'),
    ],
];

$privacy_rights = [
    __('The Right to Access/Know: Request disclosure of what personal data we have collected.', 'dawp'),
    __('The Right to Delete: Request the permanent removal of your personal profiles from our active directories.', 'dawp'),
    __('The Right to Correct: Request rectification of inaccurate account records.', 'dawp'),
];

$contact_details = [
    [
        'label' => __('Store/Brand Name', 'dawp'),
        'value' => $store_name,
    ],
    [
        'label' => __('Customer Support Email', 'dawp'),
        'value' => $support_email,
        'url'   => 'mailto:' . $support_email,
    ],
    [
        'label' => __('Customer Support Phone', 'dawp'),
        'value' => $support_phone,
        'url'   => 'tel:' . $support_phone,
    ],
    [
        'label' => __('Physical Business Address', 'dawp'),
        'value' => $store_address,
    ],
    [
        'label' => __('Business Operating Hours', 'dawp'),
        'value' => $business_hours,
    ],
    [
        'label' => __('Contact Page', 'dawp'),
        'value' => __('Contact Us', 'dawp'),
        'url'   => $contact_url,
    ],
];

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
            __('We process your personal information based on legitimate commercial obligations, specifically to:', 'dawp'),
        ],
        'list'  => $information_uses,
    ],
    [
        'title' => __('3. Cookies and Tracking Technologies', 'dawp'),
        'copy'  => [
            __('luxurytheme.com utilizes functional and analytical cookies, which are small data files stored on your local device, to maintain essential online store capabilities. Cookies help our system remember your shopping cart contents across sessions, preserve secure account logins, and provide aggregated traffic insights via tools like Google Analytics.', 'dawp'),
            __('You can adjust your cookie preferences through your individual browser settings; however, disabling all cookies may break core shopping features, such as the checkout and payment process.', 'dawp'),
        ],
    ],
    [
        'title' => __('4. How Information Is Shared', 'dawp'),
        'copy'  => [
            __('We do not sell, rent, trade, or monetize your personal information to third parties as a business practice. We share transactional data strictly with trusted service providers who assist us in operating our storefront, including:', 'dawp'),
        ],
        'cards' => $sharing_partners,
    ],
    [
        'title' => __('5. Secure Payments & Data Encryption', 'dawp'),
        'copy'  => [
            __('Your financial safety is our highest priority. luxurytheme.com does not store, view, or retain your raw credit card numbers or sensitive payment credentials on our corporate servers.', 'dawp'),
            __('All checkout transactions are executed over a fully secure, encrypted SSL (Secure Sockets Layer) connection. Financial data processing is handled entirely by certified third-party payment gateways that comply strictly with the Payment Card Industry Data Security Standard (PCI-DSS).', 'dawp'),
        ],
    ],
    [
        'title' => __('6. Data Retention and Security', 'dawp'),
        'copy'  => [
            __('We retain your personal order information within our business registries for as long as legally and structurally necessary to complete transactions, fulfill corporate tax reporting, resolve potential billing disputes, and satisfy statutory accounting requirements.', 'dawp'),
            __('While we implement robust administrative, technical, and physical safeguards to defend your files, please note that no method of online transmission can be guaranteed 100% secure.', 'dawp'),
        ],
    ],
    [
        'title' => __('7. Your US State Privacy Rights (CCPA Compliance)', 'dawp'),
        'copy'  => [
            __('Depending on your geographic location, particularly residents of states with active privacy laws such as the California Consumer Privacy Act - CCPA, you possess specific consumer protection rights regarding your data:', 'dawp'),
        ],
        'list'  => $privacy_rights,
        'after' => sprintf(
            /* translators: support email */
            __('To submit a formal privacy or data-removal request, please contact our Compliance Officer at %s.', 'dawp'),
            $support_email
        ),
    ],
    [
        'title' => __('8. Children\'s Privacy', 'dawp'),
        'copy'  => [
            __('luxurytheme.com is intended for a general audience and is strictly directed toward consumers who have reached the legal age of majority. We do not knowingly or intentionally collect, solicit, or maintain personal information from children under the age of 13. If we discover that a minor under 13 has provided data, it will be immediately purged from our servers.', 'dawp'),
        ],
    ],
];

$privacy_faqs = [
    [
        'question' => __('Does luxurytheme.com sell my personal information?', 'dawp'),
        'answer'   => __('No. luxurytheme.com does not sell, rent, trade, or monetize personal information to third parties as a business practice.', 'dawp'),
    ],
    [
        'question' => __('Does luxurytheme.com store my full credit card number?', 'dawp'),
        'answer'   => __('No. We do not store, view, or retain raw credit card numbers or sensitive payment credentials on our corporate servers.', 'dawp'),
    ],
    [
        'question' => __('Can I request access, correction, or deletion of my data?', 'dawp'),
        'answer'   => __('Depending on your location and applicable U.S. state privacy laws, you may request access to, correction of, or deletion of personal data we maintain by contacting support.', 'dawp'),
    ],
    [
        'question' => __('Can I disable cookies?', 'dawp'),
        'answer'   => __('You can adjust cookie preferences through your browser settings, but disabling all cookies may affect core shopping features such as cart, checkout, and payment functionality.', 'dawp'),
    ],
];
?>

<div class="lux-policy bg-white text-[#2B2B2B]">
    <section class="bg-[#F8F5F0] py-14 sm:py-20" aria-labelledby="privacy-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:items-end lg:px-8">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A45A3F]"><?php esc_html_e('Privacy Policy', 'dawp'); ?></p>
                <h1 id="privacy-title" class="mt-4 font-heading text-4xl font-extrabold leading-tight text-[#2B2B2B] sm:text-5xl">
                    <?php esc_html_e('How luxurytheme.com protects customer information.', 'dawp'); ?>
                </h1>
                <p class="mt-5 max-w-2xl text-base leading-8 text-[#4A4A4A]">
                    <?php
                    echo esc_html(
                        sprintf(
                            /* translators: 1: store name, 2: site domain */
                            __('This policy explains how %1$s collects, uses, shares, and protects information when you shop through %2$s.', 'dawp'),
                            $store_name,
                            $site_domain
                        )
                    );
                    ?>
                </p>
            </div>

            <div class="rounded-md border border-[#E8E5DF] bg-white p-6 shadow-sm">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A45A3F]"><?php esc_html_e('Last Updated', 'dawp'); ?></p>
                <p class="mt-3 font-heading text-2xl font-extrabold text-[#2B2B2B]"><?php echo esc_html($last_updated); ?></p>
                <p class="mt-4 text-sm leading-7 text-[#4A4A4A]">
                    <?php esc_html_e('For privacy questions, account data requests, or data-removal inquiries, contact our support team through our official channels.', 'dawp'); ?>
                </p>
                <div class="mt-6 flex flex-col gap-3 sm:flex-row lg:flex-col xl:flex-row">
                    <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#A45A3F] px-6 text-sm font-bold text-white transition hover:bg-[#7F422F]">
                        <?php esc_html_e('Contact Us', 'dawp'); ?>
                    </a>
                    <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#A45A3F] bg-white px-6 text-sm font-bold text-[#A45A3F] transition hover:bg-[#F8F5F0]">
                        <?php echo esc_html($support_email); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#FFFFFF] py-14 sm:py-20" aria-labelledby="privacy-content-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.78fr_1.22fr] lg:px-8">
            <aside class="lg:sticky lg:top-24 lg:self-start">
                <div class="rounded-md border border-[#E8E5DF] bg-white p-6 shadow-sm">
                    <h2 id="privacy-content-title" class="font-heading text-2xl font-extrabold text-[#2B2B2B]"><?php esc_html_e('Privacy overview', 'dawp'); ?></h2>
                    <div class="mt-4 space-y-4 text-sm leading-7 text-[#4A4A4A]">
                        <?php foreach ($policy_intro as $paragraph) : ?>
                            <p><?php echo esc_html($paragraph); ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </aside>

            <div class="grid gap-5">
                <?php foreach ($sections as $section) : ?>
                    <article class="rounded-md border border-[#E8E5DF] bg-white p-6 shadow-sm">
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

                <article class="rounded-md border border-[#E8E5DF] bg-[#F8F5F0] p-6 shadow-sm">
                    <h2 class="font-heading text-xl font-extrabold text-[#2B2B2B]"><?php esc_html_e('9. Contact Us & Business Identity', 'dawp'); ?></h2>
                    <p class="mt-4 text-sm leading-7 text-[#4A4A4A]">
                        <?php esc_html_e('For questions regarding our privacy practices, or if you need to submit a data inquiry, please contact our team through our verified corporate channels:', 'dawp'); ?>
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

                <article class="rounded-md border border-[#E8E5DF] bg-white p-6 shadow-sm">
                    <h2 class="font-heading text-xl font-extrabold text-[#2B2B2B]"><?php esc_html_e('Privacy FAQs', 'dawp'); ?></h2>
                    <div class="mt-6 divide-y divide-[#E8E5DF]">
                        <?php foreach ($privacy_faqs as $item) : ?>
                            <details class="group py-5 first:pt-0 last:pb-0">
                                <summary class="flex cursor-pointer list-none items-start justify-between gap-4 text-left font-heading text-lg font-extrabold text-[#2B2B2B]">
                                    <span><?php echo esc_html($item['question']); ?></span>
                                    <span class="mt-1 flex h-7 w-7 shrink-0 items-center justify-center rounded-md bg-[#F8F5F0] text-[#A45A3F] transition group-open:rotate-45" aria-hidden="true">+</span>
                                </summary>
                                <p class="mt-3 text-sm leading-7 text-[#4A4A4A]"><?php echo esc_html($item['answer']); ?></p>
                            </details>
                        <?php endforeach; ?>
                    </div>
                </article>
            </div>
        </div>
    </section>
</div>


