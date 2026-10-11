<?php
/**
 * Privacy Policy page — Eliteshop Express.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email    = 'support@eliteshopexpress.com';
$company_address  = '447 Broadway, 2nd Floor, New York, NY 10013, United States';
$terms_url        = home_url('/terms-conditions/');
$contact_url      = home_url('/contact-us/');

$sections = [
    [
        'id'    => 'scope',
        'title' => __('1. Who We Are & Scope of This Policy', 'dawp'),
        'body'  => [
            __('Eliteshop Express ("Eliteshop Express," "we," "us," or "our") operates eliteshopexpress.com, an online store selling personalized, print-on-demand apparel to customers in the United States.', 'dawp'),
            __('This Privacy Policy explains what personal information we collect when you visit our website, place an order, contact support, or sign up for emails, and how we use, share, and protect it. By using our website, you agree to the practices described here.', 'dawp'),
        ],
    ],
    [
        'id'    => 'information-we-collect',
        'title' => __('2. Information We Collect', 'dawp'),
        'body'  => [
            __('We collect the following categories of information:', 'dawp'),
        ],
        'list' => [
            __('Contact and identity information: your name, email address, phone number, and shipping and billing addresses.', 'dawp'),
            __('Order information: the products, styles, colors, and sizes you buy, your order history, order totals, and any discount codes used.', 'dawp'),
            __('Personalization content: the names, text, initials, dates, and photos you submit to be printed on a product.', 'dawp'),
            __('Payment information: your payment is handled directly by our payment processors. We receive only limited details, such as the card type, the last four digits, and the transaction status. We never see or store your full card number.', 'dawp'),
            __('Communications: messages you send through our contact form or by email, including photos you attach to a support request.', 'dawp'),
            __('Device and usage information: IP address, browser and device type, pages viewed, links clicked, referring website, and approximate location based on IP address. This is collected automatically through cookies and similar technologies.', 'dawp'),
        ],
        'body_after' => [
            __('We collect this information directly from you, automatically when you use our website, and from service providers who help us run our store (such as payment processors and shipping carriers).', 'dawp'),
        ],
    ],
    [
        'id'    => 'how-we-use',
        'title' => __('3. How We Use Your Information', 'dawp'),
        'list' => [
            __('To process your payment, print your personalized order, and ship it to you.', 'dawp'),
            __('To send order confirmations, shipping notifications, tracking details, and other service messages.', 'dawp'),
            __('To answer support questions and handle cancellations, returns, replacements, and refunds.', 'dawp'),
            __('To keep our website, checkout, and customization tools working properly, and to improve them.', 'dawp'),
            __('To detect, prevent, and investigate fraud, unauthorized transactions, and misuse of our website.', 'dawp'),
            __('To send marketing emails, such as new designs and offers, only if you have opted in, for example by checking the marketing box at checkout. Every marketing email has an unsubscribe link.', 'dawp'),
            __('To comply with legal, tax, and accounting obligations and to enforce our Terms & Conditions.', 'dawp'),
        ],
    ],
    [
        'id'    => 'personalization-content',
        'title' => __('4. How We Handle Personalization Content', 'dawp'),
        'body'  => [
            __('Names, text, and photos you submit for printing are used only to produce your order, check its quality, and handle any support request about it. Access is limited to the team members and print partners who need it to make your item.', 'dawp'),
            __('We do not sell personalization content, and we do not use your photos or personalized designs in our marketing without your separate, explicit permission. We keep uploaded photos only as long as needed to fulfill your order and handle any replacement request within the 30-day period after delivery. You can ask us to delete them at any time.', 'dawp'),
        ],
    ],
    [
        'id'    => 'cookies',
        'title' => __('5. Cookies & Tracking Technologies', 'dawp'),
        'body'  => [
            __('We use cookies and similar technologies for the following purposes:', 'dawp'),
        ],
        'list' => [
            __('Essential cookies keep your cart, checkout, and account sessions working. The website cannot function properly without them.', 'dawp'),
            __('Preference cookies remember choices such as items in your cart and recently viewed products.', 'dawp'),
            __('Analytics cookies help us understand how visitors use the website, so we can fix problems and improve the shopping experience.', 'dawp'),
        ],
        'body_after' => [
            __('You can block or delete cookies in your browser settings. If you disable essential cookies, the cart and checkout may not work.', 'dawp'),
        ],
    ],
    [
        'id'    => 'sharing',
        'title' => __('6. How We Share Information', 'dawp'),
        'body'  => [
            __('We share personal information only with the following parties, and only as needed to run our store:', 'dawp'),
        ],
        'list' => [
            __('Print and fulfillment partners, who produce and pack your order. They receive your order details, personalization content, and shipping address.', 'dawp'),
            __('Payment processors, who securely handle checkout and fraud screening.', 'dawp'),
            __('Shipping carriers, who deliver your order and provide tracking. They receive your name, shipping address, and, where needed, your phone number.', 'dawp'),
            __('Website, hosting, email, and analytics providers, who help us operate and improve the website.', 'dawp'),
            __('Legal authorities and other parties, when required by law, or when needed to protect our rights, our customers, or the public.', 'dawp'),
            __('A buyer or successor, if our business is sold or merged.', 'dawp'),
        ],
        'body_after' => [
            __('These service providers may use your information only to provide services to us. We do not sell your personal information, and we do not share it with third parties for their own marketing.', 'dawp'),
        ],
    ],
    [
        'id'    => 'retention',
        'title' => __('7. Data Retention', 'dawp'),
        'body'  => [
            __('We keep order records for as long as needed to fulfill your order, provide support, and meet legal, tax, and accounting requirements, which is generally up to 7 years. Support messages are kept for up to 2 years. Marketing data is kept until you unsubscribe. Personalization photos are handled as described in section 4. After these periods, information is deleted or anonymized.', 'dawp'),
        ],
    ],
    [
        'id'    => 'your-rights',
        'title' => __('8. Your Privacy Rights', 'dawp'),
        'body'  => [
            __('Depending on your state of residence (for example, under the California Consumer Privacy Act and similar state privacy laws), you may have the right to:', 'dawp'),
        ],
        'list' => [
            __('Know and access the personal information we hold about you, and receive a copy of it.', 'dawp'),
            __('Correct inaccurate personal information.', 'dawp'),
            __('Delete your personal information, subject to exceptions such as completing an order or meeting legal obligations.', 'dawp'),
            __('Opt out of the sale or sharing of personal information and of targeted advertising. We do not sell personal information.', 'dawp'),
            __('Not be discriminated against for exercising any of these rights.', 'dawp'),
        ],
        'body_after' => [
            __('To make a request, email us from the address used on your order, or include your order number. We verify your identity before acting on a request and respond within 45 days. You may also use an authorized agent; we may ask for proof that the agent is authorized. To stop marketing emails, click the unsubscribe link in any email or contact us.', 'dawp'),
        ],
    ],
    [
        'id'    => 'children',
        'title' => __('9. Children\'s Privacy', 'dawp'),
        'body'  => [
            __('Our website is not directed to children under 13, and we do not knowingly collect personal information from children under 13. We sell kids\' apparel, but purchases must be made by an adult. If you believe a child has given us personal information, contact us and we will delete it.', 'dawp'),
        ],
    ],
    [
        'id'    => 'security',
        'title' => __('10. Security', 'dawp'),
        'body'  => [
            __('Our website uses HTTPS encryption, and payments are handled by PCI-compliant payment processors. Access to customer data is limited to the people who need it to fulfill orders and provide support. No method of transmission or storage is 100% secure, but we take reasonable steps to protect your information.', 'dawp'),
        ],
    ],
    [
        'id'    => 'third-party-links',
        'title' => __('11. Third-Party Websites', 'dawp'),
        'body'  => [
            __('Our website may link to third-party websites, such as payment providers or carrier tracking pages. Those websites have their own privacy practices, and we are not responsible for their content or how they handle your information.', 'dawp'),
        ],
    ],
    [
        'id'    => 'changes',
        'title' => __('12. Changes to This Policy', 'dawp'),
        'body'  => [
            __('We may update this Privacy Policy from time to time. The "Last updated" date at the top of this page shows when it was last changed. If we make material changes, we will post a notice on our website before they take effect.', 'dawp'),
        ],
    ],
];
?>?>

<div class="bg-white text-[#111827]">
    <section class="bg-[#F9FAFB] py-14 sm:py-20" aria-labelledby="privacy-title">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#FF5A5F]"><?php esc_html_e('Privacy Policy', 'dawp'); ?></p>
            <h1 id="privacy-title" class="mt-4 font-heading text-4xl font-extrabold leading-tight text-[#111827] sm:text-5xl">
                <?php esc_html_e('How we handle your information.', 'dawp'); ?>
            </h1>
            <p class="mt-4 text-sm font-semibold text-[#6B7280]"><?php esc_html_e('Last updated: October 9, 2026', 'dawp'); ?></p>
            <p class="mt-5 max-w-2xl text-base leading-8 text-[#4B5563]">
                <?php esc_html_e('This policy explains what information Eliteshop Express collects when you shop with us, including the names, text, and photos you submit for personalization, and how we use, share, and protect it.', 'dawp'); ?>
            </p>
        </div>
    </section>

    <section class="bg-white py-14 sm:py-20">
        <div class="mx-auto grid max-w-5xl gap-10 px-4 sm:px-6 lg:px-8">
            <?php foreach ($sections as $section) : ?>
                <div id="<?php echo esc_attr($section['id']); ?>" class="scroll-mt-24">
                    <h2 class="font-heading text-2xl font-bold text-[#111827]"><?php echo esc_html($section['title']); ?></h2>
                    <div class="mt-4 grid gap-4 text-base leading-8 text-[#4B5563]">
                        <?php if (!empty($section['body'])) : ?>
                            <?php foreach ($section['body'] as $paragraph) : ?>
                                <p><?php echo esc_html($paragraph); ?></p>
                            <?php endforeach; ?>
                        <?php endif; ?>

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
                <h2 class="font-heading text-2xl font-bold text-[#111827]"><?php esc_html_e('13. Contact Us', 'dawp'); ?></h2>
                <p class="mt-4 text-base leading-8 text-[#4B5563]">
                    <?php esc_html_e('Questions about this Privacy Policy or a request about your information? Reach us at:', 'dawp'); ?>
                </p>
                <p class="mt-3 text-base leading-8 text-[#111827]">
                    <strong>Eliteshop Express</strong><br>
                    <?php echo esc_html($company_address); ?><br>
                    <a class="font-bold text-[#FF5A5F] underline decoration-[#FF5A5F]/40 underline-offset-4 hover:text-[#111827]" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
                </p>
                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-[var(--radius-pill)] bg-[#FF5A5F] px-6 text-sm font-bold text-white transition hover:bg-[#E14247]"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
                    <a href="<?php echo esc_url($terms_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-[var(--radius-pill)] border-2 border-[#111827] px-6 text-sm font-bold text-[#111827] transition hover:bg-[#111827] hover:text-white"><?php esc_html_e('Terms & Conditions', 'dawp'); ?></a>
                </div>
            </div>
        </div>
    </section>
</div>
