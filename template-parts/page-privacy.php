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
        'id'    => 'information-we-collect',
        'title' => __('1. Information We Collect', 'dawp'),
        'body'  => [
            __('We collect information you provide directly, information collected automatically, and information related to your order and personalization:', 'dawp'),
        ],
        'list' => [
            __('Contact information: name, email, shipping and billing address, phone number.', 'dawp'),
            __('Order information: items purchased, order history, and communications with support.', 'dawp'),
            __('Personalization content: any name, text, or photo you submit to appear on a printed product.', 'dawp'),
            __('Payment information: processed directly by our payment providers — we do not store full card numbers.', 'dawp'),
            __('Usage data: pages visited, device/browser type, and general location, collected via cookies and similar technologies.', 'dawp'),
        ],
    ],
    [
        'id'    => 'how-we-use',
        'title' => __('2. How We Use Your Information', 'dawp'),
        'list' => [
            __('To process, print, and ship your order.', 'dawp'),
            __('To communicate with you about your order, including tracking and support requests.', 'dawp'),
            __('To personalize and improve our website and product recommendations.', 'dawp'),
            __('To detect and prevent fraud or abuse of our checkout and customization tools.', 'dawp'),
            __('To send marketing emails when you\'ve opted in (e.g., the newsletter signup) — you can unsubscribe at any time.', 'dawp'),
        ],
    ],
    [
        'id'    => 'personalization-content',
        'title' => __('3. How We Handle Personalization Content', 'dawp'),
        'body'  => [
            __('Names, text, and photos you submit for printing are used solely to produce and quality-check your order. We do not sell this content, and we do not use customer-submitted photos in our own marketing without your separate, explicit permission.', 'dawp'),
        ],
    ],
    [
        'id'    => 'cookies',
        'title' => __('4. Cookies & Tracking Technologies', 'dawp'),
        'body'  => [
            __('We use cookies and similar technologies to keep your cart working, remember your preferences, and understand how visitors use our site. You can control cookies through your browser settings; disabling them may affect site functionality such as the shopping cart.', 'dawp'),
        ],
    ],
    [
        'id'    => 'sharing',
        'title' => __('5. How We Share Information', 'dawp'),
        'body'  => [
            __('We share information only as needed to run our business:', 'dawp'),
        ],
        'list' => [
            __('Print & fulfillment partners, to produce and ship your order.', 'dawp'),
            __('Payment processors, to securely handle checkout.', 'dawp'),
            __('Shipping carriers, to deliver your order and provide tracking.', 'dawp'),
            __('Analytics providers, to help us understand and improve site performance.', 'dawp'),
            __('Legal authorities, when required by law or to protect our rights.', 'dawp'),
        ],
        'body_after' => [
            __('We do not sell your personal information to third parties.', 'dawp'),
        ],
    ],
    [
        'id'    => 'retention',
        'title' => __('6. Data Retention', 'dawp'),
        'body'  => [
            __('We retain order and personalization information for as long as needed to fulfill your order, provide support, and meet our legal and accounting obligations, after which it is deleted or anonymized.', 'dawp'),
        ],
    ],
    [
        'id'    => 'your-rights',
        'title' => __('7. Your Rights & Choices', 'dawp'),
        'body'  => [
            __('Depending on where you live, you may have the right to access, correct, delete, or receive a copy of your personal information, or to opt out of certain uses. To exercise any of these rights, contact us using the details below.', 'dawp'),
        ],
    ],
    [
        'id'    => 'children',
        'title' => __('8. Children\'s Privacy', 'dawp'),
        'body'  => [
            __('Our website is not directed to children under 13, and we do not knowingly collect personal information from children under 13.', 'dawp'),
        ],
    ],
    [
        'id'    => 'security',
        'title' => __('9. Security', 'dawp'),
        'body'  => [
            __('We use reasonable administrative and technical safeguards to protect your information. No method of transmission or storage is 100% secure, but we work to protect your data at every step of checkout and fulfillment.', 'dawp'),
        ],
    ],
    [
        'id'    => 'changes',
        'title' => __('10. Changes to This Policy', 'dawp'),
        'body'  => [
            __('We may update this Privacy Policy from time to time. The "Last updated" date below reflects the most recent revision.', 'dawp'),
        ],
    ],
];
?>

<div class="bg-white text-[#111827]">
    <section class="bg-[#F9FAFB] py-14 sm:py-20" aria-labelledby="privacy-title">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#FF5A5F]"><?php esc_html_e('Privacy Policy', 'dawp'); ?></p>
            <h1 id="privacy-title" class="mt-4 font-heading text-4xl font-extrabold leading-tight text-[#111827] sm:text-5xl">
                <?php esc_html_e('How we handle your information.', 'dawp'); ?>
            </h1>
            <p class="mt-4 text-sm font-semibold text-[#6B7280]"><?php esc_html_e('Last updated: September 15, 2026', 'dawp'); ?></p>
            <p class="mt-5 max-w-2xl text-base leading-8 text-[#4B5563]">
                <?php esc_html_e('This policy explains what information Eliteshop Express collects, including personalization content, and how it\'s used, shared, and protected.', 'dawp'); ?>
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
                <h2 class="font-heading text-2xl font-bold text-[#111827]"><?php esc_html_e('11. Contact Us', 'dawp'); ?></h2>
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
