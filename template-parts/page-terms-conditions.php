<?php
/**
 * Terms & Conditions template part for Shop Avec Moi.
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email = 'support@shopavecmoi.com';
$shipping_url  = home_url('/shipping-returns/');
$privacy_url   = home_url('/privacy-policy/');
$contact_url   = home_url('/contact-us/');

$terms_cards = [
    [
        'title' => 'Clear Store Terms',
        'copy'  => 'These terms explain how purchases, product information, shipping, returns, and website use are handled.',
    ],
    [
        'title' => 'Policy Consistency',
        'copy'  => 'Shipping, returns, refunds, and privacy details are kept on dedicated policy pages for easy review.',
    ],
    [
        'title' => 'Customer Support',
        'copy'  => 'Questions about orders or policies can be sent to support@shopavecmoi.com during business hours.',
    ],
];

$sections = [
    [
        'title' => 'Overview',
        'copy'  => [
            'These Terms & Conditions apply to your use of shopavecmoi.com and purchases from Shop Avec Moi. By using our website or placing an order, you agree to these terms.',
            'Shop Avec Moi is a women\'s intimate apparel boutique offering lingerie, sleepwear, robes, loungewear, bras, bralettes, and intimate essentials for customers in the United States.',
        ],
    ],
    [
        'title' => 'Eligibility And Account Responsibility',
        'copy'  => [
            'You must be old enough to enter into a binding purchase agreement in your location and provide accurate information when placing an order.',
            'If you create an account, you are responsible for keeping your login details secure and for activity under your account.',
        ],
    ],
    [
        'title' => 'Product Information',
        'copy'  => [
            'We aim to present product names, photos, colors, prices, sizes, descriptions, and availability accurately. Minor differences may occur due to screen settings, photography, production updates, or inventory changes.',
            'Product descriptions are provided for general guidance. Please review size, fit, fabric, and care details before purchase.',
        ],
    ],
    [
        'title' => 'Orders, Pricing, And Payment',
        'copy'  => [
            'When you place an order, you agree that the information provided is complete and accurate. We may cancel or refuse an order if payment cannot be verified, information appears inaccurate, inventory is unavailable, or fraud prevention checks raise concerns.',
            'Prices are shown in the currency displayed at checkout and may change without notice. Taxes, shipping charges, and discounts are calculated during checkout when applicable.',
            'Payments are processed through secure payment providers. Shop Avec Moi does not store full payment card numbers on our website.',
        ],
    ],
    [
        'title' => 'Shipping, Delivery, And Risk Of Loss',
        'copy'  => [
            'Orders are processed within 2-4 business days. Standard US shipping typically takes 5-10 business days after dispatch.',
            'Delivery estimates are not guarantees and may be affected by carrier delays, weather, holidays, address issues, or peak season volume. Tracking information is provided once your order ships.',
            'Customers are responsible for providing a complete and accurate shipping address. Risk of loss passes to the customer when the carrier confirms delivery to the provided address, except where applicable law provides otherwise.',
        ],
    ],
    [
        'title' => 'Returns, Refunds, And Exchanges',
        'copy'  => [
            'Eligible unworn, unwashed, unused items may be returned within 30 days of delivery after contacting support for return instructions.',
            'Because we sell intimate apparel, returns must meet hygiene requirements. Items with signs of wear, washing, odor, marks, removed tags, missing hygiene liners, or missing original packaging may not be accepted.',
            'Refunds are issued to the original payment method after eligible returned items are received and inspected. Please review our Shipping & Returns page for the full return process, return shipping responsibility, refund timing, and exceptions.',
        ],
    ],
    [
        'title' => 'Website Use',
        'copy'  => [
            'You agree not to misuse the website, interfere with site security, attempt unauthorized access, submit false information, scrape content without permission, or use the website for unlawful activity.',
            'We may suspend access, cancel orders, or take appropriate action if website use appears fraudulent, abusive, harmful, or unlawful.',
        ],
    ],
    [
        'title' => 'Intellectual Property',
        'copy'  => [
            'All website content, including text, graphics, layout, photography, branding, logos, and design elements, belongs to Shop Avec Moi or our licensors and may not be copied, reproduced, modified, or used without permission.',
        ],
    ],
    [
        'title' => 'Third-Party Services And Links',
        'copy'  => [
            'Our website may use third-party services for payments, shipping, analytics, advertising, ecommerce functionality, and customer support. Third-party websites or services are governed by their own terms and privacy practices.',
        ],
    ],
    [
        'title' => 'Disclaimers And Limitation Of Liability',
        'copy'  => [
            'The website and products are provided as available, subject to applicable consumer protection laws. We do not guarantee uninterrupted site access or error-free content.',
            'To the fullest extent allowed by law, Shop Avec Moi is not liable for indirect, incidental, special, or consequential damages arising from website use, delayed delivery, third-party services, or product use.',
        ],
    ],
    [
        'title' => 'Changes To These Terms',
        'copy'  => [
            'We may update these Terms & Conditions from time to time. Updates will be posted on this page with a revised last updated date. Continued use of the website after updates means you accept the revised terms.',
        ],
    ],
];
?>

<div class="bg-white text-[#24132E] antialiased">
    <section class="bg-[#FBF4FF] px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto max-w-4xl text-center">
            <p class="text-sm font-semibold uppercase text-[#6E3A8A]">Store Terms</p>
            <h1 class="mt-4 font-heading text-5xl leading-[1.05] text-[#3B1748] sm:text-6xl">
                Terms &amp; Conditions
            </h1>
            <p class="mt-6 text-base leading-7 text-[#6D5875] sm:text-lg">
                Please review these terms before using shopavecmoi.com or placing an order with Shop Avec Moi.
            </p>
            <p class="mt-4 text-sm font-semibold text-[#6E3A8A]">Last updated: May 13, 2026</p>
        </div>
    </section>

    <section class="bg-white px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto max-w-7xl">
            <div class="grid gap-4 md:grid-cols-3">
                <?php foreach ($terms_cards as $card) : ?>
                    <div class="rounded-2xl border border-[#E8DFF0] bg-white p-6 shadow-sm shadow-[#3B1748]/10">
                        <h2 class="font-heading text-2xl leading-tight text-[#3B1748]"><?php echo esc_html($card['title']); ?></h2>
                        <p class="mt-3 text-sm leading-6 text-[#6D5875]"><?php echo esc_html($card['copy']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="mt-12 grid gap-8 lg:grid-cols-[0.72fr_1.28fr]">
                <aside class="rounded-[2rem] bg-[#21102C] p-6 text-white lg:p-8">
                    <p class="text-sm font-semibold uppercase text-white">Related Policies</p>
                    <h2 class="mt-3 font-heading text-3xl leading-tight text-white">Review the full customer care details.</h2>
                    <div class="mt-7 grid gap-3">
                        <a class="rounded-2xl border border-white/15 bg-white/10 p-4 text-sm font-semibold text-white transition hover:bg-white/15" href="<?php echo esc_url($shipping_url); ?>">Shipping &amp; Returns</a>
                        <a class="rounded-2xl border border-white/15 bg-white/10 p-4 text-sm font-semibold text-white transition hover:bg-white/15" href="<?php echo esc_url($privacy_url); ?>">Privacy Policy</a>
                        <a class="rounded-2xl border border-white/15 bg-white/10 p-4 text-sm font-semibold text-white transition hover:bg-white/15" href="<?php echo esc_url($contact_url); ?>">Contact Us</a>
                    </div>
                    <p class="mt-7 text-sm leading-6 text-white/75">
                        Support hours: Monday to Friday, 9:00 AM to 6:00 PM EST.
                    </p>
                    <a class="mt-5 inline-flex min-h-12 items-center justify-center rounded-full bg-white px-7 py-3 text-sm font-semibold text-[#3B1748] transition duration-300 hover:bg-[#FBF4FF]" href="mailto:<?php echo esc_attr($support_email); ?>">
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
