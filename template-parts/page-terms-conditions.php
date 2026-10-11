<?php
/**
 * Terms & Conditions page — Eliteshop Express.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email = 'support@eliteshopexpress.com';
$company_address = '447 Broadway, 2nd Floor, New York, NY 10013, United States';
$shipping_url  = home_url('/shipping-returns/');
$privacy_url   = home_url('/privacy-policy/');
$contact_url   = home_url('/contact-us/');

$link_class = 'font-bold text-[#FF5A5F] underline decoration-[#FF5A5F]/40 underline-offset-4 hover:text-[#111827]';
$shipping_link = '<a class="' . $link_class . '" href="' . esc_url($shipping_url) . '">' . esc_html__('Shipping & Returns', 'dawp') . '</a>';
$privacy_link  = '<a class="' . $link_class . '" href="' . esc_url($privacy_url) . '">' . esc_html__('Privacy Policy', 'dawp') . '</a>';

$sections = [
    [
        'id'    => 'acceptance',
        'title' => __('1. Acceptance of Terms', 'dawp'),
        'body'  => [
            __('These Terms & Conditions ("Terms") apply to your use of eliteshopexpress.com and to every purchase made on it from Eliteshop Express ("Eliteshop Express," "we," "us," or "our"). By using this website or placing an order, you agree to these Terms and to the policies they refer to. If you do not agree, please do not use this website or place an order.', 'dawp'),
            sprintf(
                /* translators: 1: shipping & returns page link, 2: privacy policy page link */
                __('Our %1$s policy and %2$s are part of these Terms.', 'dawp'),
                $shipping_link,
                $privacy_link
            ),
        ],
        'raw' => true,
    ],
    [
        'id'    => 'eligibility',
        'title' => __('2. Eligibility & Use of This Website', 'dawp'),
        'body'  => [
            __('You must be at least 18 years old, or have the permission and supervision of a parent or legal guardian, to place an order. We sell to customers with a shipping address in the United States only.', 'dawp'),
            __('You agree to use this website only for lawful purposes. You may not:', 'dawp'),
        ],
        'list' => [
            __('Place fraudulent orders or use a payment method you are not authorized to use.', 'dawp'),
            __('Interfere with the website\'s security or operation, or try to gain unauthorized access to it.', 'dawp'),
            __('Use bots, scrapers, or other automated tools to copy content, designs, or product data.', 'dawp'),
            __('Upload viruses or other harmful code.', 'dawp'),
        ],
    ],
    [
        'id'    => 'accounts',
        'title' => __('3. Accounts', 'dawp'),
        'body'  => [
            __('If you create an account, you are responsible for keeping your password confidential and for all activity under your account. Let us know right away if you suspect unauthorized use. We may suspend or close accounts that violate these Terms.', 'dawp'),
        ],
    ],
    [
        'id'    => 'personalization',
        'title' => __('4. Personalization Content & Your Responsibility', 'dawp'),
        'body'  => [
            __('You can submit names, text, and on some designs photos to be printed on your order ("Personalization Content"). By submitting Personalization Content, you confirm that:', 'dawp'),
        ],
        'list' => [
            __('You own the rights to any photo, text, or artwork you submit, or have permission to use it.', 'dawp'),
            __('Your Personalization Content does not infringe any copyright, trademark, publicity, or other right, including logos, characters, team names, or brand names you do not own.', 'dawp'),
            __('Your Personalization Content is not unlawful, hateful, obscene, defamatory, or harassing.', 'dawp'),
        ],
        'body_after' => [
            __('You give us a limited license to use your Personalization Content only to produce, quality-check, and ship your order and to provide support for it. You are responsible for checking spelling, spacing, and photo quality in the live preview before checkout. We print your item exactly as shown in the preview you approve.', 'dawp'),
            __('We may refuse or cancel any order with content that appears to violate this section. If we do, you receive a full refund.', 'dawp'),
        ],
    ],
    [
        'id'    => 'products',
        'title' => __('5. Product Information, Colors & Sizing', 'dawp'),
        'body'  => [
            __('We try to describe and display our products as accurately as possible. However, colors can look different on different screens, and because every item is printed to order, print placement and color can vary slightly from item to item. These minor variations are not defects.', 'dawp'),
            __('Each product page includes a size chart. Please check it before ordering, because personalized items cannot be returned for wrong size selection.', 'dawp'),
        ],
    ],
    [
        'id'    => 'pricing',
        'title' => __('6. Pricing, Taxes & Errors', 'dawp'),
        'body'  => [
            __('All prices are listed in US dollars (USD). Applicable sales tax and shipping charges are calculated and shown at checkout before you pay. Prices may change at any time, but a price change will not affect an order you have already placed.', 'dawp'),
            __('If a product is listed at an incorrect price due to a clear error, we will contact you before shipping. You can then choose to pay the correct price or cancel the order for a full refund.', 'dawp'),
        ],
    ],
    [
        'id'    => 'orders-payment',
        'title' => __('7. Orders, Payment & Acceptance', 'dawp'),
        'body'  => [
            __('When you place an order, you make an offer to buy the products in your cart. You will receive an order confirmation email, and the contract is formed when we accept your order and begin production. We may decline or cancel an order, for example because of suspected fraud, a pricing error, or content that violates section 4. If we cancel an order, you receive a full refund.', 'dawp'),
            __('Payment is taken at the time of order through secure third-party payment processors. Available payment methods are shown at checkout. By submitting payment, you confirm that you are authorized to use the payment method.', 'dawp'),
        ],
    ],
    [
        'id'    => 'promotions',
        'title' => __('8. Discount Codes & Promotions', 'dawp'),
        'body'  => [
            __('Discount codes and promotions are subject to their stated terms and expiration dates. Unless stated otherwise, they apply to new orders only, cannot be combined with other offers, have no cash value, and cannot be applied to past orders. The free shipping offer applies to orders over $50, measured on the subtotal after discounts and before taxes.', 'dawp'),
        ],
    ],
    [
        'id'    => 'shipping',
        'title' => __('9. Shipping, Returns & Refunds', 'dawp'),
        'body'  => [
            __('Orders are processed in 2-4 business days and delivered by standard US shipping in 5-7 business days after dispatch. Risk of loss passes to you when the package is delivered to the shipping address you provided.', 'dawp'),
            __('Personalized items are final sale, except when they arrive damaged, defective, misprinted, or incorrect. Non-personalized items can be returned within 30 days of delivery if they are unworn and unwashed. Damage, defects, and misprints must be reported within 30 days of delivery for a free replacement or full refund.', 'dawp'),
            sprintf(
                /* translators: %s: shipping & returns page link */
                __('Full details, including cancellations, lost packages, and how to request a refund, are on our %s page.', 'dawp'),
                $shipping_link
            ),
        ],
        'raw' => true,
    ],
    [
        'id'    => 'intellectual-property',
        'title' => __('10. Our Intellectual Property', 'dawp'),
        'body'  => [
            __('The Eliteshop Express name and logo, and the website design, text, graphics, product photos, and original design templates, belong to us or our licensors and are protected by intellectual property laws. You may not copy, reproduce, sell, or use them without our written permission. Buying a product gives you ownership of that physical item, not of the design itself.', 'dawp'),
            sprintf(
                /* translators: %s: support email */
                __('If you believe something on our website infringes your intellectual property, email %s with a description of the work, where it appears on our website, and your contact information. We will review and respond promptly.', 'dawp'),
                $support_email
            ),
        ],
    ],
    [
        'id'    => 'reviews',
        'title' => __('11. Reviews & Submissions', 'dawp'),
        'body'  => [
            __('If you submit a product review, photo, or comment, it must be honest and must not include unlawful or offensive content. By submitting it, you allow us to display it on our website. We may remove any submission that violates these Terms.', 'dawp'),
        ],
    ],
    [
        'id'    => 'disclaimer',
        'title' => __('12. Disclaimer & Limitation of Liability', 'dawp'),
        'body'  => [
            __('Except as stated in these Terms and our Shipping & Returns policy, the website and products are provided "as is," to the extent permitted by law.', 'dawp'),
            __('To the fullest extent permitted by law, Eliteshop Express is not liable for any indirect, incidental, special, or consequential damages arising from your use of this website or your purchase. Our total liability for any claim relating to an order is limited to the amount you paid for that order. Nothing in these Terms limits any rights you have under applicable consumer protection laws that cannot be waived.', 'dawp'),
        ],
    ],
    [
        'id'    => 'indemnification',
        'title' => __('13. Indemnification', 'dawp'),
        'body'  => [
            __('You agree to indemnify and hold Eliteshop Express harmless from claims, losses, and expenses (including reasonable legal fees) arising from Personalization Content you submit or from your violation of these Terms.', 'dawp'),
        ],
    ],
    [
        'id'    => 'governing-law',
        'title' => __('14. Governing Law & Disputes', 'dawp'),
        'body'  => [
            __('These Terms are governed by the laws of the State of New York and applicable US federal law, without regard to conflict-of-law rules. If you have a problem with an order, please contact us first. Most issues can be resolved quickly through our support team. Any dispute that cannot be resolved informally will be handled in the state or federal courts located in New York County, New York, unless the law of your state requires otherwise.', 'dawp'),
        ],
    ],
    [
        'id'    => 'changes',
        'title' => __('15. Changes & Severability', 'dawp'),
        'body'  => [
            __('We may update these Terms from time to time. The "Last updated" date at the top of this page shows when they last changed. The Terms in effect when you place an order apply to that order. If any part of these Terms is found unenforceable, the rest remains in effect.', 'dawp'),
        ],
    ],
];
?>?>

<div class="bg-white text-[#111827]">
    <section class="bg-[#F9FAFB] py-14 sm:py-20" aria-labelledby="terms-title">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#FF5A5F]"><?php esc_html_e('Terms & Conditions', 'dawp'); ?></p>
            <h1 id="terms-title" class="mt-4 font-heading text-4xl font-extrabold leading-tight text-[#111827] sm:text-5xl">
                <?php esc_html_e('The terms behind every order.', 'dawp'); ?>
            </h1>
            <p class="mt-4 text-sm font-semibold text-[#6B7280]"><?php esc_html_e('Last updated: October 9, 2026', 'dawp'); ?></p>
            <p class="mt-5 max-w-2xl text-base leading-8 text-[#4B5563]">
                <?php esc_html_e('Please read these Terms & Conditions carefully before placing an order with Eliteshop Express.', 'dawp'); ?>
            </p>
        </div>
    </section>

    <section class="bg-white py-14 sm:py-20">
        <div class="mx-auto grid max-w-5xl gap-10 px-4 sm:px-6 lg:px-8">
            <?php foreach ($sections as $section) : ?>
                <div id="<?php echo esc_attr($section['id']); ?>" class="scroll-mt-24">
                    <h2 class="font-heading text-2xl font-bold text-[#111827]"><?php echo esc_html($section['title']); ?></h2>
                    <div class="mt-4 grid gap-4 text-base leading-8 text-[#4B5563]">
                        <?php foreach ($section['body'] as $paragraph) : ?>
                            <p>
                                <?php
                                if (!empty($section['raw'])) {
                                    echo wp_kses($paragraph, ['a' => ['class' => [], 'href' => []]]);
                                } else {
                                    echo esc_html($paragraph);
                                }
                                ?>
                            </p>
                        <?php endforeach; ?>

                        <?php if (!empty($section['list'])) : ?>
                            <ul class="grid gap-2 pl-1">
                                <?php foreach ($section['list'] as $item) : ?>
                                    <li class="flex gap-3">
                                        <span class="mt-2.5 h-1.5 w-1.5 shrink-0 rounded-full bg-[#FF5A5F]"></span>
                                        <span><?php echo esc_html($item); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <?php if (!empty($section['body_after'])) : ?>
                            <?php foreach ($section['body_after'] as $paragraph) : ?>
                                <p><?php echo esc_html($paragraph); ?></p>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>

            <div id="contact" class="scroll-mt-24 rounded-[var(--radius-lg)] border border-[#E5E7EB] bg-[#F9FAFB] p-6 sm:p-8">
                <h2 class="font-heading text-2xl font-bold text-[#111827]"><?php esc_html_e('16. Contact Us', 'dawp'); ?></h2>
                <p class="mt-4 text-base leading-8 text-[#4B5563]">
                    <?php esc_html_e('Questions about these Terms? Reach us at:', 'dawp'); ?>
                </p>
                <p class="mt-3 text-base leading-8 text-[#111827]">
                    <strong>Eliteshop Express</strong><br>
                    <?php echo esc_html($company_address); ?><br>
                    <a class="font-bold text-[#FF5A5F] underline decoration-[#FF5A5F]/40 underline-offset-4 hover:text-[#111827]" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
                </p>
                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-[var(--radius-pill)] bg-[#FF5A5F] px-6 text-sm font-bold text-white transition hover:bg-[#E14247]"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
                    <a href="<?php echo esc_url($privacy_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-[var(--radius-pill)] border-2 border-[#111827] px-6 text-sm font-bold text-[#111827] transition hover:bg-[#111827] hover:text-white"><?php esc_html_e('Privacy Policy', 'dawp'); ?></a>
                </div>
            </div>
        </div>
    </section>
</div>
