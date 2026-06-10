<?php
/**
 * Terms and conditions template part for Shop Avec Moi.
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email = 'support@shopavecmoi.com';
$contact_url   = home_url('/contact-us/');
$returns_url   = home_url('/return-refund-policy/');
$shipping_url  = home_url('/shipping-policy/');
$store_address = function_exists('dawp_get_store_address') ? dawp_get_store_address() : '';

$sections = [
    [
        'title' => '1. Acceptance & Modification Rights',
        'copy'  => [
            'If you do not agree to these Terms, you may not utilize this Site or place a commercial order through our storefront. We reserve the absolute right to modify, adjust, or rewrite these Terms at any time without prior notice. Your continued interaction with the Site after dynamic updates constitutes your binding agreement to the revised Terms.',
        ],
    ],
    [
        'title' => '2. Intellectual Property & Trademarks',
        'copy'  => [
            'The shopavecmoi.com name, brand identity, custom graphics, page layouts, imagery, and official logos are exclusive service marks and intellectual property owned by or licensed to us. All other third-party trademarks, product names, or corporate logos appearing on the Site remain the sole property of their respective owners. You are strictly prohibited from copying, distributing, or commercially exploiting any content from this Site without explicit written authorization.',
        ],
    ],
    [
        'title' => '3. User-Generated Content & Social Media Tag Usage',
        'copy'  => [
            'You may submit product reviews, comments, ratings, or blog photos (“User Content”). You are entirely responsible for ensuring your submissions do not infringe upon any third-party intellectual property, privacy, or publicity rights.',
            'By submitting User Content or using official social media tags such as #shopavecmoi.com or @shopavecmoi.com, you grant us an unrestricted, irrevocable, royalty-free, perpetual, and worldwide license to utilize, reproduce, and display your uploaded images and text across our marketing materials, storefront layouts, and corporate social channels. We reserve the right to remove or edit any User Content without liability.',
        ],
    ],
    [
        'title' => '4. Acceptable Use Policy',
        'copy'  => [
            'By interacting with our Site, you strictly agree NOT to:',
        ],
        'items' => [
            'Post or transmit unlawful, abusive, defamatory, obscene, or fraudulent content.',
            'Upload viruses, malicious code, or software designed to disrupt Site infrastructure.',
            'Impersonate any individual, entity, or misrepresent your professional affiliations.',
            'Interfere with the transactional security measures or network policies of our store.',
            'Collect or scrape other users’ personal identifiable information without explicit consent.',
        ],
    ],
    [
        'title' => '5. Website Warranties & Disclaimers',
        'copy'  => [
            'The information, layout, and services provided on this Site are delivered on an “as is” and “as available” basis. Your utilization of this storefront is at your sole risk. To the fullest extent permitted by law, we disclaim all warranties, express or implied, including implied warranties of merchantability and fitness for a particular purpose. We do not guarantee that website functions will be completely uninterrupted, secure, or free from operational errors.',
        ],
    ],
    [
        'title' => '6. Order Acceptance & Verification',
        'copy'  => [
            'Official order acceptance and contract formation occur strictly when you receive our automated confirmation email. We strive to fulfill all purchases; however, if an item becomes physically unavailable post-confirmation, we will notify you promptly and issue an immediate 100% refund to your original payment method. We reserve the right to refuse or cancel any order for reason of payment fraud, stock discrepancies, or billing errors.',
        ],
    ],
    [
        'title' => '7. Product Details & Pricing Precision',
        'copy'  => [
            'Product prices and stock availability are subject to change without notice. While we work to ensure comprehensive accuracy regarding size charts, fabric descriptions, and pricing, technical errors may occasionally occur. If an error materially impacts your transaction, we will contact you immediately with the option to reconfirm the order at the correct parameters or cancel the purchase for a full refund.',
        ],
    ],
    [
        'title' => '8. Secure Payments & Gateway Standards',
        'copy'  => [
            'Product prices are displayed transparently on our product pages. Standard shipping is free for all United States orders with no minimum purchase requirement. Any applicable taxes and optional upgraded shipping fees will be shown in the final checkout summary before payment.',
            'To maintain strict consumer data protection, shopavecmoi.com does not collect, view, or store your raw credit card numbers. All transactions are secured through SSL (Secure Sockets Layer) encryption and managed entirely via certified payment infrastructure nodes that comply fully with the global Payment Card Industry Data Security Standard (PCI-DSS).',
        ],
    ],
    [
        'title' => '9. Delivery Framework & Logistical Windows (GMC MANDATORY)',
        'copy'  => [
            'We currently ship exclusively within the United States. Delivery parameters are structured based on our standard handling timelines:',
        ],
        'items' => [
            '<strong>Order Cut-off Time:</strong> 5:00 PM Pacific Standard Time (GMT-08:00).',
            '<strong>Handling Time:</strong> Order packaging, quality check, and dispatch take 1-3 business days from Monday through Friday, excluding standard U.S. public holidays.',
            '<strong>Transit & Delivery Time:</strong> Standard domestic shipping takes approximately 5-7 business days in transit, with an estimated total delivery time of 6-10 business days from the date of purchase.',
            '<strong>Risk & Ownership:</strong> Full physical responsibility and risk for the products transfer to you upon verified carrier delivery to the specified address.',
        ],
        'link'  => [
            'label' => 'View Shipping Policy',
            'url'   => $shipping_url,
        ],
    ],
    [
        'title' => '10. Consumer Cancellation Rights & Returns (GMC MANDATORY)',
        'copy'  => [
            'Your consumer rights to cancel an order or request product exchanges are governed by our official Returns Policy:',
        ],
        'items' => [
            'Customers have a verified 30-day window from the date of package delivery to initiate a return request.',
            'Items must be returned in their original unwashed, unworn, and pristine condition with all original brand tags attached.',
            'There is a $0.00 restocking fee. For detailed step-by-step instructions, please view our specialized Refund & Return Policy.',
        ],
        'link'  => [
            'label' => 'View Refund & Return Policy',
            'url'   => $returns_url,
        ],
    ],
    [
        'title' => '11. Limitation of Liability',
        'copy'  => [
            'To the maximum extent permitted by applicable law, shopavecmoi.com and its operational officers, directors, employees, or third-party providers shall not be held liable for any indirect, incidental, punitive, or consequential damages (including loss of profits, data, or business opportunities) arising from your use of the Site or unexpected shipping carrier delays.',
        ],
    ],
    [
        'title' => '12. Governing Law & Jurisdiction',
        'copy'  => [
            'These Terms of Use, Terms of Sale, and any related contractual or non-contractual obligations regarding the purchase of goods from our store shall be governed by, interpreted, and construed in accordance with the laws of the United States and the State of New York, without regard to conflict of law principles.',
        ],
    ],
];

$parts = [
    [
        'eyebrow' => 'Part I',
        'title'   => 'Terms of Use (Website Usage)',
        'start'   => 0,
        'length'  => 5,
    ],
    [
        'eyebrow' => 'Part II',
        'title'   => 'Terms of Sale (Purchase Contracts)',
        'start'   => 5,
        'length'  => 5,
    ],
    [
        'eyebrow' => 'Part III',
        'title'   => 'Legal & Corporate Identity',
        'start'   => 10,
        'length'  => 2,
    ],
];
?>

<div class="bg-white text-[#24132E] antialiased">
    <section class="bg-[#FBF4FF] px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto max-w-4xl text-center">
            <p class="text-sm font-semibold uppercase text-[#6E3A8A]">Website Use &amp; Purchases</p>
            <h1 class="mt-4 font-heading text-5xl leading-[1.05] text-[#3B1748] sm:text-6xl">Terms &amp; Conditions</h1>
            <p class="mt-6 text-base leading-7 text-[#6D5875] sm:text-lg">
                The following Terms &amp; Conditions govern your access to and use of shopavecmoi.com (the “Site”) and your physical purchase of retail products from our online storefront. By accessing the Site, browsing our collection, or submitting a purchase order, you expressly agree to be bound by these Terms and our integrated Privacy Policy.
            </p>
            <p class="mt-4 text-sm font-semibold text-[#6E3A8A]">Last Updated: June 10, 2026</p>
        </div>
    </section>

    <section class="bg-white px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto max-w-7xl">
            <div class="grid gap-8 lg:grid-cols-[0.72fr_1.28fr]">
                <aside class="h-fit rounded-[2rem] bg-[#21102C] p-6 text-white lg:sticky lg:top-28 lg:p-8">
                    <p class="text-sm font-semibold uppercase text-white">Terms Support</p>
                    <h2 class="mt-3 font-heading text-3xl leading-tight text-white">Questions about these terms?</h2>
                    <p class="mt-5 text-sm leading-6 text-white/75">Contact our support team for policy inquiries, legal questions, or transactional support.</p>
                    <div class="mt-7 grid gap-3">
                        <a class="rounded-2xl border border-white/15 bg-white/10 p-4 text-sm font-semibold text-white transition hover:bg-white/15" href="<?php echo esc_url($contact_url); ?>">Contact Us</a>
                        <a class="rounded-2xl border border-white/15 bg-white/10 p-4 text-sm font-semibold text-white transition hover:bg-white/15" href="<?php echo esc_url($returns_url); ?>">Refund &amp; Return Policy</a>
                    </div>
                    <p class="mt-7 text-sm leading-6 text-white/75">Monday-Friday, 9:00 AM-6:00 PM PST</p>
                    <a class="mt-5 inline-flex min-h-12 items-center justify-center rounded-full bg-white px-7 py-3 text-sm font-semibold text-[#3B1748] transition duration-300 hover:bg-[#FBF4FF]" href="mailto:<?php echo esc_attr($support_email); ?>">
                        <?php echo esc_html($support_email); ?>
                    </a>
                </aside>

                <div class="grid gap-8">
                    <?php foreach ($parts as $part) : ?>
                        <div class="grid gap-6">
                            <div>
                                <p class="text-sm font-semibold uppercase text-[#6E3A8A]"><?php echo esc_html($part['eyebrow']); ?></p>
                                <h2 class="mt-2 font-heading text-4xl leading-tight text-[#3B1748]"><?php echo esc_html($part['title']); ?></h2>
                            </div>

                            <?php foreach (array_slice($sections, $part['start'], $part['length']) as $section) : ?>
                                <section class="rounded-2xl border border-[#E8DFF0] bg-white p-6 shadow-sm shadow-[#3B1748]/10 lg:p-8">
                                    <h3 class="font-heading text-3xl leading-tight text-[#3B1748]"><?php echo esc_html($section['title']); ?></h3>
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

                                        <?php if (!empty($section['link'])) : ?>
                                            <div class="pt-2">
                                                <a class="inline-flex min-h-11 items-center justify-center rounded-full border border-[#E8DFF0] bg-[#FBF4FF] px-5 py-2 text-sm font-semibold text-[#6E3A8A] transition hover:border-[#6E3A8A]" href="<?php echo esc_url($section['link']['url']); ?>"><?php echo esc_html($section['link']['label']); ?></a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </section>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>

                    <section class="rounded-2xl border border-[#E8DFF0] bg-[#FBF4FF] p-6 lg:p-8">
                        <p class="text-sm font-semibold uppercase text-[#6E3A8A]">13. Customer Support &amp; Operational Contact</p>
                        <h2 class="mt-3 font-heading text-3xl leading-tight text-[#3B1748]">Shop Avec Moi</h2>
                        <div class="mt-5 grid gap-3 text-sm leading-7 text-[#6D5875]">
                            <p>For any policy inquiries, legal questions, or transactional support regarding these Terms, please reach out to our administration through our verified corporate channels:</p>
                            <p><strong class="text-[#3B1748]">Store / Brand Name:</strong> Shop Avec Moi</p>
                            <p><strong class="text-[#3B1748]">Customer Support Email:</strong> <a class="font-semibold text-[#6E3A8A] hover:text-[#3B1748]" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a></p>
                            <p><strong class="text-[#3B1748]">Physical Business Address:</strong> <?php echo esc_html($store_address); ?></p>
                            <p><strong class="text-[#3B1748]">Customer Support Availability:</strong> Monday-Friday, 9:00 AM-6:00 PM PST.</p>
                            <p><strong class="text-[#3B1748]">Contact Page:</strong> <a class="font-semibold text-[#6E3A8A] hover:text-[#3B1748]" href="<?php echo esc_url($contact_url); ?>">Contact Us</a></p>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
</div>
