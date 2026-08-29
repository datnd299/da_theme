<?php
/**
 * Terms & Conditions — YourWatchStore. Tailwind utilities only.
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
        'title' => __('1. Overview', 'dawp'),
        'body'  => [
            __('This website is operated by YourWatchStore. By visiting the site or placing an order, you agree to these Terms & Conditions and to our Privacy Policy, Shipping Policy, and Refund & Return Policy, which are incorporated here by reference.', 'dawp'),
            __('We may update these terms at any time. The version published on this page at the time of your order applies to that order.', 'dawp'),
        ],
    ],
    [
        'title' => __('2. Eligibility', 'dawp'),
        'body'  => [
            __('You must be at least 18 years old, or the age of majority in your state, and able to form a binding contract to place an order. You agree to provide accurate account, contact, billing, and shipping information.', 'dawp'),
        ],
    ],
    [
        'title' => __('3. Your account', 'dawp'),
        'body'  => [
            __('You can check out as a guest or create an account. If you create an account, you are responsible for keeping your password confidential and for all activity that happens under it. Tell us right away if you suspect unauthorized use.', 'dawp'),
            __('We may suspend or close an account that is used to breach these terms, to submit false information, or in connection with fraud or abuse.', 'dawp'),
        ],
    ],
    [
        'title' => __('4. Products and pricing', 'dawp'),
        'body'  => [
            __('We work to describe watches, specifications, and images accurately. Slight variation in color, finish, and dial or case detail can occur between screens and physical products. Movement type, water resistance, crystal, and dimensions listed on each product page are provided by the manufacturer or our own measurement.', 'dawp'),
            __('All prices are in US dollars and may change without notice. If a product is listed at an incorrect price due to a typographical or system error, we may cancel the order and refund any payment, whether or not the order has been confirmed.', 'dawp'),
        ],
    ],
    [
        'title' => __('5. Orders and acceptance', 'dawp'),
        'body'  => [
            __('Your submitted order is an offer to buy. A confirmation email acknowledges that we received the order; the contract is formed only when we accept the order and dispatch it, or notify you that it has been accepted.', 'dawp'),
            __('We may refuse, limit, or cancel any order, in whole or in part, including for suspected fraud, payment issues, stock discrepancies, pricing errors, delivery-area limits, or quantities that appear to be for resale. If we cancel a paid order, we refund the original payment method.', 'dawp'),
        ],
    ],
    [
        'title' => __('6. Payment and billing', 'dawp'),
        'body'  => [
            __('Payment is processed at checkout through WooCommerce and certified third-party payment gateways over an encrypted connection. We do not store raw card numbers on our storefront servers. You confirm that you are authorized to use the payment method provided.', 'dawp'),
            __('When your card is charged, accepted payment methods, taxes, declined payments, and chargebacks are covered in our Billing Terms & Conditions, which form part of these terms.', 'dawp'),
        ],
    ],
    [
        'title' => __('7. Shipping, returns, and refunds', 'dawp'),
        'body'  => [
            __('Shipping timelines and costs are set out in our Shipping Policy. Return eligibility, return shipping responsibility, and refund timing are set out in our Refund & Return Policy. Delivery estimates are not guarantees.', 'dawp'),
        ],
    ],
    [
        'title' => __('8. Warranty and watch care', 'dawp'),
        'body'  => [
            __('Where a manufacturer warranty applies, its card and terms are included with the watch and administered by the manufacturer. Every watch is inspected for function before dispatch, and faults present on arrival are covered by our 30-day return policy.', 'dawp'),
            __('Normal wear, water damage where the stated rating was exceeded, damage from drops or improper handling, third-party servicing, and battery or crown misuse are not covered. Water-resistance ratings describe a watch when new and are not a permanent guarantee; seals age with use.', 'dawp'),
        ],
    ],
    [
        'title' => __('9. Promotions, discount codes, and gift cards', 'dawp'),
        'body'  => [
            __('Promotions and discount codes are valid for the stated period, cannot be combined unless we say so, have no cash value, and may be withdrawn or changed at any time. They must be applied at checkout and cannot be added to an order afterward.', 'dawp'),
            __('Gift cards, where offered, are issued in US dollars, do not expire unless stated, and cannot be redeemed for cash except where required by law.', 'dawp'),
        ],
    ],
    [
        'title' => __('10. Acceptable use', 'dawp'),
        'body'  => [
            __('You agree not to use the site for unlawful purposes, to interfere with its operation or security, to introduce malicious code, to scrape or copy content at scale, to use automated systems to place orders, or to submit false information. We may suspend or block access for conduct that harms the store, our suppliers, or other customers.', 'dawp'),
        ],
    ],
    [
        'title' => __('11. Intellectual property', 'dawp'),
        'body'  => [
            __('Site content, including text, layout, graphics, and product photography prepared by us, is owned by YourWatchStore or its licensors and is protected by copyright and other laws. You may view and print content for your own personal, non-commercial use only, and may not reproduce, distribute, or create derivative works without written permission.', 'dawp'),
            __('Brand names, model names, and trademarks of watch manufacturers belong to their respective owners and are used only to describe the products we sell.', 'dawp'),
        ],
    ],
    [
        'title' => __('12. Reviews and submissions', 'dawp'),
        'body'  => [
            __('If you submit a review, comment, photo, or other content, you confirm it is your own, is accurate, and does not break the law or infringe anyone\'s rights. You grant YourWatchStore a non-exclusive, royalty-free, worldwide license to use, display, and reproduce that content in connection with the store. We may edit or remove submissions that are abusive, misleading, or off-topic.', 'dawp'),
        ],
    ],
    [
        'title' => __('13. Third-party links', 'dawp'),
        'body'  => [
            __('The site may link to third-party websites and services, such as carrier tracking or payment providers. We do not control and are not responsible for their content, policies, or practices. Following those links is at your own risk.', 'dawp'),
        ],
    ],
    [
        'title' => __('14. Disclaimer of warranties', 'dawp'),
        'body'  => [
            __('The website is provided on an "as is" and "as available" basis. To the extent permitted by law, we do not warrant that the site will be uninterrupted, error-free, or secure, or that descriptions and other content are complete or current. This does not affect any warranty that applies to a product you buy or any right you have under consumer law.', 'dawp'),
        ],
    ],
    [
        'title' => __('15. Limitation of liability', 'dawp'),
        'body'  => [
            __('To the extent permitted by law, YourWatchStore is not liable for indirect, incidental, special, or consequential losses, or for lost profits or data, arising from use of the site or a product. Our total liability for any claim connected to an order is limited to the amount you paid for that order.', 'dawp'),
            __('Nothing in these terms limits liability for fraud, for death or personal injury caused by negligence, or for anything that cannot be limited under applicable law.', 'dawp'),
        ],
    ],
    [
        'title' => __('16. Indemnification', 'dawp'),
        'body'  => [
            __('You agree to indemnify and hold harmless YourWatchStore and its staff and suppliers from claims, losses, and reasonable legal costs arising from your misuse of the site, your breach of these terms, or your violation of any law or third-party right.', 'dawp'),
        ],
    ],
    [
        'title' => __('17. Events outside our control', 'dawp'),
        'body'  => [
            __('We are not responsible for delay or failure to perform caused by events beyond our reasonable control, including carrier disruption, extreme weather, natural disasters, strikes, war, civil unrest, epidemic, failure of utilities or networks, or government action. We will let you know and, where a significant delay results, offer you the choice of waiting or cancelling for a refund.', 'dawp'),
        ],
    ],
    [
        'title' => __('18. Dispute resolution', 'dawp'),
        'body'  => [
            __('Most issues can be resolved quickly by contacting our support team, and we ask that you do so before taking any formal step. If a dispute cannot be resolved informally within 30 days, it will be handled through binding individual arbitration or, where permitted, the small-claims court for your area.', 'dawp'),
            __('To the extent permitted by law, disputes will be resolved on an individual basis and not as part of a class or representative action. Where mandatory law gives you a right to bring a claim in your local courts, this section does not remove that right.', 'dawp'),
        ],
    ],
    [
        'title' => __('19. Electronic communications', 'dawp'),
        'body'  => [
            __('By using the site or placing an order, you agree that we may communicate with you electronically, by email or by notices on the site, and that electronic communications satisfy any legal requirement that a communication be in writing.', 'dawp'),
        ],
    ],
    [
        'title' => __('20. Changes and general terms', 'dawp'),
        'body'  => [
            __('We may update these terms at any time; the version published when you place an order applies to that order. If a provision is found unenforceable, the rest of the terms stay in force. Our failure to enforce a provision is not a waiver of it. You may not assign your rights under these terms without our consent; we may assign ours to a successor of the business.', 'dawp'),
            __('These terms, together with the Privacy Policy, Shipping Policy, Refund & Return Policy, and Billing Terms & Conditions, are the entire agreement between you and YourWatchStore about your use of the site and your orders.', 'dawp'),
        ],
    ],
    [
        'title' => __('21. Governing law and contact', 'dawp'),
        'body'  => [
            __('These terms are governed by the laws of the United States and the state in which the business is registered, without regard to conflict-of-law rules. Questions about these terms can be sent to our support team.', 'dawp'),
        ],
    ],
];
?>

<div class="bg-background text-foreground">
    <section class="border-b border-border">
        <div class="mx-auto max-w-3xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
            <p class="text-xs font-bold uppercase tracking-[0.16em] text-accent-blush"><?php esc_html_e('Policies', 'dawp'); ?></p>
            <h1 class="mt-4 font-heading text-4xl font-extrabold leading-tight tracking-tight text-foreground sm:text-5xl"><?php esc_html_e('Terms & Conditions', 'dawp'); ?></h1>
            <p class="mt-5 text-base leading-7 text-foreground-muted"><?php esc_html_e('The terms that apply when you use this website and place an order with YourWatchStore.', 'dawp'); ?></p>
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
                <p class="text-sm leading-6 text-foreground-muted">
                    <?php
                    printf(
                        wp_kses(__('Contact: <a class="font-semibold text-accent-blush underline underline-offset-2" href="mailto:%1$s">%1$s</a>', 'dawp'), ['a' => ['class' => [], 'href' => []]]),
                        esc_attr($support_email)
                    );
                    ?>
                    <?php if ($store_address) : ?><br><?php printf(esc_html__('Business address: %s', 'dawp'), esc_html($store_address)); ?><?php endif; ?>
                </p>
            </div>
        </div>
    </section>
</div>
