<?php
/**
 * Privacy Policy — SlickTee.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$email_link = '<a href="mailto:support@slicktee.com">support@slicktee.com</a>';

$sections = [
    [
        'id'    => 'scope',
        'title' => __('1. What this policy covers', 'dawp'),
        'body'  => '<p>' . esc_html__('This Privacy Policy explains how SlickTee (“SlickTee”, “we”, “us”) collects, uses and protects personal information when you visit slicktee.com, create an account, place an order or contact us. “Personal information” means information that identifies, relates to, or can reasonably be linked to you. We have no control over the privacy practices of third-party websites linked from our site.', 'dawp') . '</p>',
    ],
    [
        'id'    => 'collect',
        'title' => __('2. What we collect and why', 'dawp'),
        'body'  => '<ul>'
            . '<li><strong>' . esc_html__('Account registration:', 'dawp') . '</strong> ' . esc_html__('name, email address, saved shipping addresses and basic browsing data such as cookie IDs — used to run your account, save preferences and show your order history.', 'dawp') . '</li>'
            . '<li><strong>' . esc_html__('Orders:', 'dawp') . '</strong> ' . esc_html__('name, shipping and billing address, email, phone number (if provided) and order details — used to make and deliver your order, process payment, send receipts and order updates, and prevent fraud.', 'dawp') . '</li>'
            . '<li><strong>' . esc_html__('Communications:', 'dawp') . '</strong> ' . esc_html__('your name, contact details and anything you choose to tell us when you email or use our contact form — used to answer your request and improve our service.', 'dawp') . '</li>'
            . '<li><strong>' . esc_html__('Marketing (only if you opt in):', 'dawp') . '</strong> ' . esc_html__('your email address and how you interact with our emails — used to send offers and new collections. You can unsubscribe at any time.', 'dawp') . '</li>'
            . '<li><strong>' . esc_html__('Reviews & comments:', 'dawp') . '</strong> ' . esc_html__('information you post publicly about us — used to understand feedback and improve our products.', 'dawp') . '</li>'
            . '<li><strong>' . esc_html__('Device & usage data:', 'dawp') . '</strong> ' . esc_html__('IP address, browser type, pages visited and cookies — used to keep the site secure, remember your cart and understand how the site is used.', 'dawp') . '</li>'
            . '</ul>',
    ],
    [
        'id'    => 'payments',
        'title' => __('3. Payments', 'dawp'),
        'body'  => '<p>' . esc_html__('All payments are processed by secure third-party payment gateways such as PayPal and Stripe. We never see or store your full card number. Their use of your information is governed by their own privacy policies:', 'dawp') . '</p><ul><li><a href="https://www.paypal.com/us/webapps/mpp/ua/privacy-full" rel="noopener nofollow" target="_blank">' . esc_html__('PayPal Privacy Statement', 'dawp') . '</a></li><li><a href="https://stripe.com/privacy" rel="noopener nofollow" target="_blank">' . esc_html__('Stripe Privacy Policy', 'dawp') . '</a></li></ul>',
    ],
    [
        'id'    => 'use',
        'title' => __('4. How we use your information', 'dawp'),
        'body'  => '<ul><li>' . esc_html__('To give you access to our website and supply the products you order.', 'dawp') . '</li><li>' . esc_html__('To fulfil requests such as order changes, replacements and refunds.', 'dawp') . '</li><li>' . esc_html__('To communicate with you about your orders and, if you agreed, about products and offers.', 'dawp') . '</li><li>' . esc_html__('To detect, investigate and prevent security incidents, fraud and other illegal activity.', 'dawp') . '</li><li>' . esc_html__('To ask for your feedback and tell you about important changes to our site or services.', 'dawp') . '</li></ul>',
    ],
    [
        'id'    => 'share',
        'title' => __('5. Sharing your information', 'dawp'),
        'body'  => '<p>' . esc_html__('We do not sell your personal information. We share it only with service providers who help us run the store — such as our payment processors, production partners, shipping carriers, email and hosting providers — and only as needed to perform those services. We may also disclose information when required by law or to protect our rights and customers.', 'dawp') . '</p>',
    ],
    [
        'id'    => 'cookies',
        'title' => __('6. Cookies', 'dawp'),
        'body'  => '<p>' . esc_html__('We use cookies to keep your cart, remember your login and preferences, and understand site traffic. You can block or delete cookies in your browser settings, but some features (like the cart and checkout) may not work without them.', 'dawp') . '</p>',
    ],
    [
        'id'    => 'security',
        'title' => __('7. How we protect your information', 'dawp'),
        'body'  => '<p>' . esc_html__('Our site uses SSL encryption and we apply technical and organisational safeguards such as access controls and security monitoring. No method of transmission over the internet is 100% secure, but we work hard to protect your data.', 'dawp') . '</p>',
    ],
    [
        'id'    => 'retention',
        'title' => __('8. How long we keep it', 'dawp'),
        'body'  => '<p>' . esc_html__('We keep order records for as long as needed to provide our services and to meet legal, tax and accounting obligations. Account information is kept until you delete your account or ask us to remove it. Registered users can view and edit their personal information at any time in “My Account”.', 'dawp') . '</p>',
    ],
    [
        'id'    => 'rights',
        'title' => __('9. Your rights', 'dawp'),
        'body'  => '<p>' . sprintf(esc_html__('Depending on where you live (for example under the UK GDPR, EU GDPR or US state privacy laws such as the CCPA), you may have the right to access, correct, export or delete your personal information, to object to or restrict certain processing, and to opt out of marketing. To make a request, email %s. We may need to verify your identity, and we may keep information we are legally required to retain.', 'dawp'), $email_link) . '</p>',
    ],
    [
        'id'    => 'children',
        'title' => __('10. Children', 'dawp'),
        'body'  => '<p>' . esc_html__('Our website is not directed to children under 13 and we do not knowingly collect their personal information. Kids’ products must be purchased by an adult.', 'dawp') . '</p>',
    ],
    [
        'id'    => 'changes',
        'title' => __('11. Changes to this policy', 'dawp'),
        'body'  => '<p>' . esc_html__('We may update this Privacy Policy from time to time. Any changes will be posted on this page with an updated date.', 'dawp') . '</p>',
    ],
];

$allowed = ['p' => [], 'ul' => [], 'li' => [], 'strong' => [], 'a' => ['href' => [], 'rel' => [], 'target' => []]];
?>

<div class="bg-[#FBF7EF] text-[#17140F]">
    <section class="border-b-2 border-[#17140F] py-14 sm:py-20" aria-labelledby="privacy-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <span class="inline-flex -rotate-2 rounded-[4px] border-2 border-[#17140F] bg-[#F2B33D] px-3 py-1 text-xs font-extrabold uppercase tracking-[0.18em]"><?php esc_html_e('Policies', 'dawp'); ?></span>
            <h1 id="privacy-title" class="font-display mt-5 text-5xl uppercase leading-[0.95] sm:text-7xl"><?php esc_html_e('Privacy policy', 'dawp'); ?></h1>
            <p class="mt-5 max-w-2xl text-lg leading-relaxed text-[#4A4339]"><?php esc_html_e('What we collect, why we collect it, and the choices you have. In short: we use your data to make and ship your order — and we never sell it.', 'dawp'); ?></p>
            <p class="mt-4 text-sm font-bold text-[#6F665A]"><?php esc_html_e('Last updated: October 2026', 'dawp'); ?></p>
        </div>
    </section>

    <section class="py-14 sm:py-20">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[260px_1fr] lg:px-8">
            <nav class="lg:sticky lg:top-6 lg:self-start" aria-label="<?php esc_attr_e('On this page', 'dawp'); ?>">
                <p class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#6F665A]"><?php esc_html_e('On this page', 'dawp'); ?></p>
                <ul class="mt-3 grid border-l-2 border-[#17140F]">
                    <?php foreach ($sections as $section) : ?>
                        <li><a href="#<?php echo esc_attr($section['id']); ?>" class="block py-1.5 pl-4 text-sm font-bold transition hover:bg-[#F4EDE0] hover:text-[#D7351E]"><?php echo esc_html($section['title']); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <div class="rounded-[14px] border-2 border-[#17140F] bg-[#FFFFFF] p-6 sm:p-10">
                <div class="grid gap-10">
                    <?php foreach ($sections as $section) : ?>
                        <article id="<?php echo esc_attr($section['id']); ?>" class="scroll-mt-6">
                            <h2 class="font-heading text-xl font-extrabold uppercase sm:text-2xl"><?php echo esc_html($section['title']); ?></h2>
                            <div class="mt-3 grid gap-3 text-[0.95rem] leading-7 text-[#4A4339] [&_a]:font-bold [&_a]:text-[#17140F] [&_a]:underline [&_a]:decoration-[#D7351E] [&_a]:decoration-2 [&_a]:underline-offset-4 [&_strong]:text-[#17140F] [&_ul]:grid [&_ul]:list-disc [&_ul]:gap-2 [&_ul]:pl-5">
                                <?php echo wp_kses($section['body'], $allowed); ?>
                            </div>
                        </article>
                    <?php endforeach; ?>

                    <article class="rounded-[8px] border-2 border-dashed border-[#17140F] bg-[#F4EDE0] p-5 text-sm leading-7 text-[#4A4339]">
                        <h2 class="font-heading text-lg font-extrabold uppercase text-[#17140F]"><?php esc_html_e('Contact us about privacy', 'dawp'); ?></h2>
                        <p class="mt-2">
                            SlickTee · slicktee.com<br>
                            <?php esc_html_e('304 S. Jones Blvd #3456, Las Vegas, NV 89107, United States', 'dawp'); ?><br>
                            <a class="font-bold text-[#17140F] underline" href="mailto:support@slicktee.com">support@slicktee.com</a> · <?php esc_html_e('US +1 909-366-3939', 'dawp'); ?>
                        </p>
                    </article>
                </div>
            </div>
        </div>
    </section>
</div>
