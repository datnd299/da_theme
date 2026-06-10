<?php
/**
 * Privacy policy template part for Shop Avec Moi.
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email = 'support@shopavecmoi.com';
$contact_url   = home_url('/contact-us/');
$terms_url     = home_url('/terms-conditions/');

$sections = [
    [
        'title' => '1. Collecting Personal Information',
        'copy'  => [
            'When you interact with the Site, we gather specific metrics regarding your device, store interactions, and details strictly necessary to process your transactions. We also collect personal records if you connect with our customer service desk.',
        ],
        'items' => [
            '<strong>Device Metrics:</strong> Collected automatically via functional cookies, server logs, web beacons, and tracking pixels when you access our Site. This includes browser type, local IP address, active time zone, unique cookie files, what specific products you view, and store search terms.',
            '<strong>Order Records:</strong> Collected directly from you to fulfill our sales contract. This includes your full name, billing address, physical shipping address, contact email address, phone number, and encrypted payment tokens.',
            '<strong>Customer Support Records:</strong> Gathered directly from you during support inquiries to provide efficient operational responses.',
        ],
    ],
    [
        'title' => '2. Minors & Children\'s Privacy',
        'copy'  => [
            'The Site is not intended for individuals under the age of 18. We do not knowingly or intentionally collect Personal Identifiable Information from children. If you are a parent or guardian and believe your child has transmitted personal records to our system, please contact us immediately through our official channels below to request prompt erasure.',
        ],
    ],
    [
        'title' => '3. Sharing Personal Information',
        'copy'  => [
            'We share your Personal Information with trusted corporate service providers to help us deliver our e-commerce services and execute our contractual agreements with you. For example:',
            'We use WordPress and WooCommerce to power our online storefront infrastructure. You can learn more about how WordPress manages your records through its official privacy documentation.',
            'We may share your Personal Information to fully comply with applicable state or federal regulations, to respond to a legal subpoena, search warrant, or other lawful requests for data we receive, or to otherwise defend our property and corporate rights.',
        ],
        'links' => [
            ['label' => 'WordPress Privacy', 'url' => 'https://wordpress.org/support/article/wordpress-privacy/'],
        ],
    ],
    [
        'title' => '4. Behavioral Advertising & Marketing Updates',
        'copy'  => [
            'We utilize your Personal Information to deliver targeted advertisements, localized marketing materials, and store announcements that we believe align with your shopping preferences.',
            'We use Google Analytics to understand traffic volume and browsing behaviors. We share anonymous web behavior metrics and purchase records with our marketing networks to optimize ad campaigns.',
            'You can opt out of targeted digital advertising at any time through the consumer portals below.',
        ],
        'links' => [
            ['label' => 'Google Privacy', 'url' => 'https://policies.google.com/privacy'],
            ['label' => 'Google Analytics Opt-Out', 'url' => 'https://tools.google.com/dlpage/gaoptout'],
            ['label' => 'Facebook Ad Settings', 'url' => 'https://www.facebook.com/settings/?tab=ads'],
            ['label' => 'Google Ad Settings', 'url' => 'https://www.google.com/settings/ads/anonymous'],
            ['label' => 'Digital Advertising Alliance', 'url' => 'http://optout.aboutads.info/'],
        ],
    ],
    [
        'title' => '5. Secure Payments & Transaction Encryption (GMC MANDATORY)',
        'copy'  => [
            'To ensure the safety of your financial credentials, shopavecmoi.com operates a highly protected checkout ecosystem. All monetary communications and payment data transfers are encrypted utilizing secure SSL (Secure Sockets Layer) technology.',
            'Furthermore, we do not store, view, or retain raw credit card numbers or account passwords on our local databases. All transactions are routed directly to accredited payment processors adhering to the strict Payment Card Industry Data Security Standard (PCI-DSS).',
        ],
    ],
    [
        'title' => '6. Lawful Basis & GDPR Compliance (For EEA Residents)',
        'copy'  => [
            'Pursuant to the General Data Protection Regulation (GDPR), if you reside within the European Economic Area (EEA), we process your personal data under these lawful bases:',
        ],
        'items' => [
            'Your explicit, documented consent.',
            'The performance of the commercial purchase contract between you and our store.',
            'Compliance with our legal, accounting, and corporate tax obligations.',
            'Our legitimate retail business interests, which do not override your fundamental data rights.',
        ],
        'after' => [
            'If you are an EEA resident, you possess the right to access your data, port it to a new service, or request that your records be corrected, updated, or permanently deleted. To exercise these rights, please email our support team at support@shopavecmoi.com.',
            'Your records will be initially processed in Ireland and transferred outside of Europe, including to Canada and the United States, for secure storage.',
        ],
    ],
    [
        'title' => '7. California Consumer Privacy Act (CCPA)',
        'copy'  => [
            'If you are a resident of California, you possess the right to access the Personal Information we hold about you (the Right to Know), to port it to a separate digital utility, and to ask that your records be corrected, updated, or erased. To submit a formal data request or designate an authorized agent to contact us on your behalf, please reach out to us using the contact registries at the bottom of this page.',
        ],
    ],
    [
        'title' => '8. Data Retention & Anti-Fraud Decision-Making',
        'items' => [
            '<strong>Retention Protocols:</strong> When you place an order through the Site, we will securely retain your transaction data for our official business registries unless and until you formally request the removal of this information.',
            '<strong>Automated Decision-Making:</strong> We do not engage in automated individual decision-making that carries legal consequences. Our processor utilizes automated parameters solely to filter out transaction fraud. This involves short-term, temporary denylists for IP addresses or credit cards associated with consecutive, repetitive failed payment attempts.',
        ],
    ],
];

$cookies = [
    ['name' => 'woocommerce_cart_hash', 'duration' => 'Session', 'purpose' => 'Helps determine when shopping cart data and contents are modified.'],
    ['name' => 'woocommerce_items_in_cart', 'duration' => 'Session', 'purpose' => 'Tracks item quantities placed in the cart during the active session.'],
    ['name' => 'wp_woocommerce_session_', 'duration' => '2 Days', 'purpose' => 'Contains an anonymous unique code for each buyer to sync database cart registries.'],
    ['name' => 'woocommerce_recently_viewed', 'duration' => 'Session', 'purpose' => 'Powers the "Recently Viewed Products" interactive widget on the storefront.'],
    ['name' => 'store_notice[notice id]', 'duration' => 'Session', 'purpose' => 'Remembers if a visitor has dismissed the global promotional store notice banner.'],
];
?>

<div class="bg-white text-[#24132E] antialiased">
    <section class="bg-[#FBF4FF] px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto max-w-4xl text-center">
            <p class="text-sm font-semibold uppercase text-[#6E3A8A]">Your Data &amp; Privacy</p>
            <h1 class="mt-4 font-heading text-5xl leading-[1.05] text-[#3B1748] sm:text-6xl">Privacy Policy</h1>
            <p class="mt-6 text-base leading-7 text-[#6D5875] sm:text-lg">
                This Privacy Policy explains how shopavecmoi.com (the Site, we, us, or our) collects, uses, and discloses your Personal Information when you visit, browse, or execute a purchase transaction from the Site.
            </p>
            <p class="mt-4 text-sm font-semibold text-[#6E3A8A]">Last updated: June 10, 2026</p>
        </div>
    </section>

    <section class="bg-white px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto max-w-7xl">
            <div class="rounded-2xl border border-[#E8DFF0] bg-[#FBF4FF] p-6 text-sm leading-7 text-[#6D5875] lg:p-8">
                <p>By utilizing our Site or purchasing products from our store, you acknowledge and agree to the data management and processing practices detailed in this policy.</p>
            </div>

            <div class="mt-8 grid gap-8 lg:grid-cols-[0.72fr_1.28fr]">
                <aside class="rounded-[2rem] bg-[#21102C] p-6 text-white lg:p-8">
                    <p class="text-sm font-semibold uppercase text-white">Privacy Support</p>
                    <h2 class="mt-3 font-heading text-3xl leading-tight text-white">Questions or data requests?</h2>
                    <p class="mt-5 text-sm leading-6 text-white/75">Contact our support team for privacy inquiries, data access requests, or help with an active order.</p>
                    <div class="mt-7 grid gap-3">
                        <a class="rounded-2xl border border-white/15 bg-white/10 p-4 text-sm font-semibold text-white transition hover:bg-white/15" href="<?php echo esc_url($contact_url); ?>">Contact Us</a>
                        <a class="rounded-2xl border border-white/15 bg-white/10 p-4 text-sm font-semibold text-white transition hover:bg-white/15" href="<?php echo esc_url($terms_url); ?>">Terms &amp; Conditions</a>
                    </div>
                    <p class="mt-7 text-sm leading-6 text-white/75">Monday-Friday, 9:00 AM-6:00 PM PST</p>
                    <a class="mt-5 inline-flex min-h-12 items-center justify-center rounded-full bg-white px-7 py-3 text-sm font-semibold text-[#3B1748] transition duration-300 hover:bg-[#FBF4FF]" href="mailto:<?php echo esc_attr($support_email); ?>">
                        <?php echo esc_html($support_email); ?>
                    </a>
                </aside>

                <div class="grid gap-6">
                    <?php foreach ($sections as $section) : ?>
                        <section class="rounded-2xl border border-[#E8DFF0] bg-white p-6 shadow-sm shadow-[#3B1748]/10 lg:p-8">
                            <h2 class="font-heading text-3xl leading-tight text-[#3B1748]"><?php echo esc_html($section['title']); ?></h2>
                            <div class="mt-5 grid gap-4 text-sm leading-7 text-[#6D5875]">
                                <?php foreach ($section['copy'] ?? [] as $paragraph) : ?>
                                    <p><?php echo esc_html($paragraph); ?></p>
                                <?php endforeach; ?>
                                <?php if (!empty($section['items'])) : ?>
                                    <ul class="grid gap-3 pl-4">
                                        <?php foreach ($section['items'] as $item) : ?>
                                            <li class="list-disc"><?php echo wp_kses($item, ['strong' => []]); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                                <?php foreach ($section['after'] ?? [] as $paragraph) : ?>
                                    <p><?php echo esc_html($paragraph); ?></p>
                                <?php endforeach; ?>
                                <?php if (!empty($section['links'])) : ?>
                                    <div class="flex flex-wrap gap-3 pt-2">
                                        <?php foreach ($section['links'] as $link) : ?>
                                            <a class="rounded-full border border-[#E8DFF0] bg-[#FBF4FF] px-4 py-2 text-xs font-semibold text-[#6E3A8A] transition hover:border-[#6E3A8A]" href="<?php echo esc_url($link['url']); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html($link['label']); ?></a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </section>
                    <?php endforeach; ?>

                    <section class="rounded-2xl border border-[#E8DFF0] bg-white p-6 shadow-sm shadow-[#3B1748]/10 lg:p-8">
                        <h2 class="font-heading text-3xl leading-tight text-[#3B1748]">9. Cookies Management Policy</h2>
                        <div class="mt-5 grid gap-4 text-sm leading-7 text-[#6D5875]">
                            <p>A cookie is a small data text file downloaded to your computing device when you access our store. We employ essential cookies to manage your shopping cart persistence, preserve account log-ins, and remember individual regional settings.</p>
                            <p>We use the following core cookies to maintain standard store operations:</p>
                            <div class="overflow-x-auto rounded-2xl border border-[#E8DFF0]">
                                <table class="w-full min-w-[42rem] text-left text-sm">
                                    <thead class="bg-[#FBF4FF] text-[#3B1748]">
                                        <tr>
                                            <th class="p-4 font-semibold">Cookie Name</th>
                                            <th class="p-4 font-semibold">Duration</th>
                                            <th class="p-4 font-semibold">Purpose</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($cookies as $cookie) : ?>
                                            <tr class="border-t border-[#E8DFF0]">
                                                <td class="p-4 font-semibold text-[#3B1748]"><?php echo esc_html($cookie['name']); ?></td>
                                                <td class="p-4"><?php echo esc_html($cookie['duration']); ?></td>
                                                <td class="p-4"><?php echo esc_html($cookie['purpose']); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <p>You can adjust, disable, or clear cookies via your local web browser preferences. For comprehensive tracking management instructions, visit <a class="font-semibold text-[#6E3A8A] hover:text-[#3B1748]" href="https://www.allaboutcookies.org/" target="_blank" rel="noopener noreferrer">www.allaboutcookies.org</a>. Please note that blocking essential cookies may disable core shopping features, preventing the checkout from functioning.</p>
                        </div>
                    </section>

                    <section class="rounded-2xl border border-[#E8DFF0] bg-white p-6 shadow-sm shadow-[#3B1748]/10 lg:p-8">
                        <h2 class="font-heading text-3xl leading-tight text-[#3B1748]">10. Do Not Track &amp; Policy Updates</h2>
                        <div class="mt-5 grid gap-4 text-sm leading-7 text-[#6D5875]">
                            <p>Because there is no unified industry standard for responding to Do Not Track signals, our data collection systems do not change behavior when such signals are detected from your browser.</p>
                            <p>We may update this Privacy Policy periodically to reflect shifts in our e-commerce operations, software modifications, or legal regulations.</p>
                        </div>
                    </section>

                    <section class="rounded-2xl border border-[#E8DFF0] bg-[#FBF4FF] p-6 lg:p-8">
                        <p class="text-sm font-semibold uppercase text-[#6E3A8A]">11. Corporate Identity &amp; Customer Support Channels</p>
                        <h2 class="mt-3 font-heading text-3xl leading-tight text-[#3B1748]">Shop Avec Moi</h2>
                        <div class="mt-5 grid gap-3 text-sm leading-7 text-[#6D5875]">
                            <p>For questions about our data practices, to file a privacy inquiry, or for help with an active order, please connect with our compliance officer via our verified communication block:</p>
                            <p><strong class="text-[#3B1748]">Website:</strong> shopavecmoi.com</p>
                            <p><strong class="text-[#3B1748]">Customer Support Email:</strong> <a class="font-semibold text-[#6E3A8A] hover:text-[#3B1748]" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a></p>
                            <p><strong class="text-[#3B1748]">Customer Support Availability:</strong> Monday-Friday, 9:00 AM-6:00 PM PST.</p>
                            <p><strong class="text-[#3B1748]">Contact Page:</strong> <a class="font-semibold text-[#6E3A8A] hover:text-[#3B1748]" href="<?php echo esc_url($contact_url); ?>">Contact Us</a></p>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
</div>
