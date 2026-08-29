<?php
/**
 * Privacy Policy — YourWatchStore. Tailwind utilities only.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email = 'support@yourwatchstore.com';
$updated       = get_the_modified_date('F j, Y') ?: gmdate('F j, Y');
$store_address = function_exists('dawp_get_woocommerce_store_address') ? dawp_get_woocommerce_store_address() : '';

$sections = [
    [
        'title' => __('Who we are', 'dawp'),
        'body'  => [
            __('YourWatchStore operates this website and is the data controller for personal information collected through it. This policy explains what we collect, why, how we protect it, and the choices you have.', 'dawp'),
        ],
    ],
    [
        'title' => __('Information we collect', 'dawp'),
        'body'  => [
            __('Order and account information: name, email address, shipping and billing address, phone number, and order history.', 'dawp'),
            __('Payment information: processed by our payment providers. We receive confirmation of payment and limited details such as the card type and last four digits; we do not receive or store full card numbers.', 'dawp'),
            __('Technical information: IP address, device and browser type, pages viewed, and referring links, collected through cookies and similar technologies.', 'dawp'),
            __('Support information: messages you send us and the contents of those messages.', 'dawp'),
        ],
    ],
    [
        'title' => __('How we use information', 'dawp'),
        'body'  => [
            __('To process and deliver orders, take payment, and send order and shipping updates.', 'dawp'),
            __('To provide customer support and handle returns, refunds, and warranty questions.', 'dawp'),
            __('To detect and prevent fraud and to keep the store secure.', 'dawp'),
            __('To understand how the store is used and to improve it, and — only where you have opted in — to send marketing email you can unsubscribe from at any time.', 'dawp'),
        ],
    ],
    [
        'title' => __('Legal bases for processing', 'dawp'),
        'body'  => [
            __('Where data protection law requires a legal basis, we rely on: performance of a contract, to take and fulfill your order; our legitimate interests, to secure the store, prevent fraud, and improve our service; your consent, for optional marketing and non-essential cookies; and compliance with a legal obligation, for tax and accounting records.', 'dawp'),
        ],
    ],
    [
        'title' => __('Sharing', 'dawp'),
        'body'  => [
            __('We share information only with service providers that help us run the store — payment processors, shipping carriers, fulfillment partners, email and analytics providers, customer-support tools, and hosting — and only as needed to perform their service under contract.', 'dawp'),
            __('We may disclose information where required by law, to respond to lawful requests, to enforce our terms, or to protect the rights, property, or safety of our customers or business. If the business is sold or merged, customer information may transfer as part of that transaction.', 'dawp'),
            __('We do not sell your personal information, and we do not share it for cross-context behavioral advertising.', 'dawp'),
        ],
    ],
    [
        'title' => __('International data transfers', 'dawp'),
        'body'  => [
            __('We are based in the United States and our service providers may process data in the United States and other countries. Where information is transferred from a region with data transfer restrictions, we rely on recognized safeguards such as standard contractual clauses.', 'dawp'),
        ],
    ],
    [
        'title' => __('Cookies and tracking technologies', 'dawp'),
        'body'  => [
            __('Essential cookies keep your cart and login working and are required for checkout. Analytics and preference cookies help us measure and improve the store. Where required, we ask for your consent before setting non-essential cookies.', 'dawp'),
            __('You can manage cookies in your browser settings; disabling essential cookies will prevent checkout from working. We honor the Global Privacy Control (GPC) signal where your browser sends it.', 'dawp'),
        ],
    ],
    [
        'title' => __('Marketing communications', 'dawp'),
        'body'  => [
            __('We send marketing email only to people who have opted in or who bought from us and did not opt out. Every marketing email has an unsubscribe link, and you can also ask us to stop by email. Transactional messages about an order you placed are not marketing and cannot be turned off while the order is active.', 'dawp'),
        ],
    ],
    [
        'title' => __('Data retention', 'dawp'),
        'body'  => [
            __('We keep order and transaction records for as long as needed to fulfill the order and to meet tax, accounting, and legal requirements. Support messages and marketing preferences are kept until they are no longer needed or you ask us to delete them.', 'dawp'),
        ],
    ],
    [
        'title' => __('Your rights', 'dawp'),
        'body'  => [
            __('Depending on where you live, you may have the right to access, correct, delete, or export your personal information, to object to or restrict certain processing, and to withdraw consent at any time without affecting processing already carried out.', 'dawp'),
            __('Residents of California and other US states with privacy laws have equivalent rights, including the right to know what categories of information we collect and disclose, the right to delete, the right to correct, and the right not to be discriminated against for exercising them. You may use an authorized agent to submit a request on your behalf.', 'dawp'),
            __('To make a request, email our support team. We may need to verify your identity before acting on a request, and we will respond within the time required by the applicable law. If you are in the EU or UK and are not satisfied with our response, you may complain to your local data protection authority.', 'dawp'),
        ],
    ],
    [
        'title' => __('Categories of information and recipients', 'dawp'),
        'body'  => [
            __('In the past 12 months we have collected identifiers, contact and delivery details, purchase and transaction records, and internet activity such as pages viewed. We disclose these categories for business purposes to payment processors, carriers, fulfillment and email providers, analytics providers, and hosting.', 'dawp'),
        ],
    ],
    [
        'title' => __('Automated decisions', 'dawp'),
        'body'  => [
            __('We use automated fraud-screening tools when you place an order. A flagged order is reviewed by a person before it is cancelled or held. You can contact us to ask about a decision that affected your order.', 'dawp'),
        ],
    ],
    [
        'title' => __('Third-party links', 'dawp'),
        'body'  => [
            __('Our site may link to other websites, such as a carrier tracking page or a payment provider. We are not responsible for the privacy practices of those sites; review their policies before providing information.', 'dawp'),
        ],
    ],
    [
        'title' => __('Security', 'dawp'),
        'body'  => [
            __('We use encrypted connections for checkout and account pages and limit access to personal information to staff and providers who need it. No method of transmission or storage is completely secure, but we work to protect your information and to notify you and the authorities of a breach where required.', 'dawp'),
        ],
    ],
    [
        'title' => __('Children', 'dawp'),
        'body'  => [
            __('This store is intended for adults. We do not knowingly collect personal information from children under 13. If you believe a child has provided us information, contact us and we will delete it.', 'dawp'),
        ],
    ],
    [
        'title' => __('Changes to this policy', 'dawp'),
        'body'  => [
            __('We may update this policy from time to time. Material changes will be posted on this page with a new "last updated" date.', 'dawp'),
        ],
    ],
];
?>

<div class="bg-background text-foreground">
    <section class="border-b border-border">
        <div class="mx-auto max-w-3xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
            <p class="text-xs font-bold uppercase tracking-[0.16em] text-accent-blush"><?php esc_html_e('Policies', 'dawp'); ?></p>
            <h1 class="mt-4 font-heading text-4xl font-extrabold leading-tight tracking-tight text-foreground sm:text-5xl"><?php esc_html_e('Privacy Policy', 'dawp'); ?></h1>
            <p class="mt-5 text-base leading-7 text-foreground-muted"><?php esc_html_e('How YourWatchStore collects, uses, and protects your personal information.', 'dawp'); ?></p>
            <p class="mt-3 text-sm text-muted"><?php printf(esc_html__('Last updated: %s', 'dawp'), esc_html($updated)); ?></p>
        </div>
    </section>

    <section class="mx-auto max-w-3xl px-4 py-14 sm:px-6 lg:px-8 lg:py-16">
        <div class="space-y-10">
            <?php foreach ($sections as $section) : ?>
                <div>
                    <h2 class="font-heading text-xl font-bold text-foreground sm:text-2xl"><?php echo esc_html($section['title']); ?></h2>
                    <?php foreach ($section['body'] as $paragraph) : ?>
                        <p class="mt-3 text-base leading-7 text-foreground-muted"><?php echo esc_html($paragraph); ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>

            <div class="rounded-md border border-border bg-surface-alt p-6">
                <h2 class="font-heading text-lg font-bold text-foreground"><?php esc_html_e('Privacy requests', 'dawp'); ?></h2>
                <p class="mt-2 text-sm leading-6 text-foreground-muted">
                    <?php
                    printf(
                        wp_kses(__('Email <a class="font-semibold text-accent-blush underline underline-offset-2" href="mailto:%1$s">%1$s</a>.', 'dawp'), ['a' => ['class' => [], 'href' => []]]),
                        esc_attr($support_email)
                    );
                    ?>
                    <?php if ($store_address) : ?><br><?php printf(esc_html__('Business address: %s', 'dawp'), esc_html($store_address)); ?><?php endif; ?>
                </p>
            </div>
        </div>
    </section>
</div>
