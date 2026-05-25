<?php
/**
 * Privacy Policy template part.
 *
 * @package dawp
 */

$privacy_highlights = [
    [
        'number' => '01',
        'title'  => __('Order Information', 'dawp'),
        'copy'   => __('We use order details to process purchases, provide tracking, and support customer requests.', 'dawp'),
        'color'  => '#2563EB',
    ],
    [
        'number' => '02',
        'title'  => __('Support Requests', 'dawp'),
        'copy'   => __('Messages sent to support may include your contact details, order number, and issue details.', 'dawp'),
        'color'  => '#06B6D4',
    ],
    [
        'number' => '03',
        'title'  => __('Secure Checkout', 'dawp'),
        'copy'   => __('Payment information is handled through ecommerce and payment processing systems.', 'dawp'),
        'color'  => '#C026D3',
    ],
    [
        'number' => '04',
        'title'  => __('Customer Choices', 'dawp'),
        'copy'   => __('You can contact us to ask privacy questions or request help with your account information.', 'dawp'),
        'color'  => '#65A30D',
    ],
];

$sections = [
    [
        'id'      => 'overview',
        'eyebrow' => __('Overview', 'dawp'),
        'title'   => __('How we handle customer information.', 'dawp'),
        'body'    => [
            __('Elite Shop Express is an everyday essentials and lifestyle ecommerce store serving customers in the United States. This Privacy Policy explains how information may be collected, used, and shared when you browse the website, place an order, contact support, or interact with store features.', 'dawp'),
            __('By using this website, you agree to the handling of information described in this policy. If you do not agree, please do not use the website or place an order.', 'dawp'),
        ],
    ],
    [
        'id'      => 'information',
        'eyebrow' => __('Information We Collect', 'dawp'),
        'title'   => __('Details needed for shopping and support.', 'dawp'),
        'body'    => [
            __('We may collect information you provide directly, such as your name, email address, shipping address, billing details, phone number where applicable, order details, and messages sent through forms or email.', 'dawp'),
            __('We may also collect basic website usage information such as pages viewed, device or browser information, approximate location data, referral sources, and interactions with website features.', 'dawp'),
            __('Payment details are handled through payment processing systems. We do not use payment information for unrelated purposes.', 'dawp'),
        ],
    ],
    [
        'id'      => 'use',
        'eyebrow' => __('How We Use Information', 'dawp'),
        'title'   => __('Practical uses tied to your order.', 'dawp'),
        'body'    => [
            __('We use customer information to process orders, send confirmations, provide shipping and tracking updates, respond to support requests, manage returns and refunds, improve website performance, prevent fraud or misuse, and comply with applicable obligations.', 'dawp'),
            __('We may use contact details to send service-related messages about your order or account. Marketing messages, where used, should include a way to unsubscribe or manage preferences.', 'dawp'),
        ],
    ],
    [
        'id'      => 'sharing',
        'eyebrow' => __('Information Sharing', 'dawp'),
        'title'   => __('Service providers that help operate the store.', 'dawp'),
        'body'    => [
            __('We may share information with trusted service providers that help operate the website and ecommerce experience, such as payment processors, shipping carriers, fulfillment partners, analytics providers, email services, fraud prevention tools, and customer support systems.', 'dawp'),
            __('We may also share information if required to comply with legal obligations, protect rights and safety, respond to lawful requests, or handle business transfers if the store changes ownership.', 'dawp'),
            __('We do not present customer information as a product for sale as part of the Elite Shop Express shopping experience.', 'dawp'),
        ],
    ],
    [
        'id'      => 'cookies',
        'eyebrow' => __('Cookies', 'dawp'),
        'title'   => __('Website functionality and analytics.', 'dawp'),
        'body'    => [
            __('The website may use cookies and similar technologies to support cart functionality, checkout, account sessions, analytics, performance, security, and customer experience improvements.', 'dawp'),
            __('You can control cookies through your browser settings. Blocking certain cookies may affect cart, checkout, account, or tracking features.', 'dawp'),
        ],
    ],
    [
        'id'      => 'choices',
        'eyebrow' => __('Your Choices', 'dawp'),
        'title'   => __('Questions, updates, and requests.', 'dawp'),
        'body'    => [
            __('You may contact us to ask questions about this Privacy Policy or request help with information connected to your order or account.', 'dawp'),
            __('For privacy-related requests, email support@eliteshopexpress.com with enough information for us to verify and review your request. We may need to keep certain order records where required for accounting, fraud prevention, dispute handling, or legal obligations.', 'dawp'),
        ],
    ],
];
?>

<div class="bg-white font-body text-[#101828]">
    <section class="relative overflow-hidden bg-[#F3F7FB]">
        <div class="relative mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
            <div class="max-w-4xl">
                <p class="mb-5 inline-flex rounded-full bg-[#DBEAFE] px-4 py-2 text-xs font-black uppercase tracking-[0.18em] text-[#2563EB]">
                    <?php esc_html_e('Privacy Policy', 'dawp'); ?>
                </p>
                <h1 class="font-heading text-4xl font-black uppercase leading-[0.98] text-[#101828] sm:text-5xl lg:text-[4.25rem]">
                    <?php esc_html_e('Customer information handled with clear purpose.', 'dawp'); ?>
                </h1>
                <p class="mt-6 max-w-2xl text-lg leading-8 text-[#475467]">
                    <?php esc_html_e('This policy explains how Elite Shop Express may collect, use, and share information for orders, shipping, support, website operation, and customer care.', 'dawp'); ?>
                </p>
            </div>

            <div class="mt-10 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <?php foreach ($privacy_highlights as $item) : ?>
                    <article class="border border-[#E5E7EB] bg-white p-6 shadow-sm">
                        <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full text-sm font-black text-white" style="background-color: <?php echo esc_attr($item['color']); ?>">
                            <?php echo esc_html($item['number']); ?>
                        </div>
                        <h2 class="font-heading text-xl font-black uppercase leading-tight text-[#101828]">
                            <?php echo esc_html($item['title']); ?>
                        </h2>
                        <p class="mt-3 text-sm leading-6 text-[#475467]">
                            <?php echo esc_html($item['copy']); ?>
                        </p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 sm:px-6 lg:grid-cols-[0.82fr_1.18fr] lg:px-8">
            <aside class="lg:sticky lg:top-32 lg:self-start">
                <div class="rounded-[2rem] bg-[#101828] p-7 text-white shadow-xl shadow-[#101828]/10">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#67E8F9]"><?php esc_html_e('Privacy Sections', 'dawp'); ?></p>
                    <h2 class="font-heading text-3xl font-black uppercase leading-tight"><?php esc_html_e('Clear policy details.', 'dawp'); ?></h2>
                    <nav class="mt-7 grid gap-3 text-sm font-black uppercase tracking-wide text-white/85" aria-label="<?php esc_attr_e('Privacy policy navigation', 'dawp'); ?>">
                        <?php foreach ($sections as $section) : ?>
                            <a href="#<?php echo esc_attr($section['id']); ?>" class="rounded-2xl border border-white/10 px-4 py-3 transition hover:border-[#67E8F9] hover:text-[#67E8F9]">
                                <?php echo esc_html($section['eyebrow']); ?>
                            </a>
                        <?php endforeach; ?>
                    </nav>
                </div>
            </aside>

            <div class="space-y-6">
                <?php foreach ($sections as $section) : ?>
                    <section id="<?php echo esc_attr($section['id']); ?>" class="border border-[#E5E7EB] bg-[#F8FAFC] p-7 lg:p-10">
                        <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#2563EB]"><?php echo esc_html($section['eyebrow']); ?></p>
                        <h2 class="font-heading text-3xl font-black uppercase leading-tight text-[#101828] lg:text-4xl"><?php echo esc_html($section['title']); ?></h2>
                        <div class="mt-6 space-y-4 text-base leading-8 text-[#475467]">
                            <?php foreach ($section['body'] as $paragraph) : ?>
                                <p><?php echo esc_html($paragraph); ?></p>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-[#101828] py-12 text-white lg:py-16">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-8 px-4 sm:px-6 lg:grid-cols-[0.74fr_1.26fr] lg:items-start lg:px-8">
            <div class="max-w-xl">
                <p class="mb-2 text-xs font-black uppercase tracking-[0.18em] text-[#67E8F9]"><?php esc_html_e('Privacy Contact', 'dawp'); ?></p>
                <h2 class="font-heading text-3xl font-black uppercase leading-tight lg:text-[2.1rem]"><?php esc_html_e('Questions about your information?', 'dawp'); ?></h2>
                <p class="mt-3 text-sm leading-7 text-white/72"><?php esc_html_e('Contact support with your privacy or account question and include order details only when relevant.', 'dawp'); ?></p>
            </div>
            <a href="mailto:support@eliteshopexpress.com" class="border border-white/10 bg-white/[0.04] p-5 transition hover:bg-white hover:text-[#101828]">
                <span class="text-xs font-black uppercase tracking-[0.18em] text-[#67E8F9]"><?php esc_html_e('Support Email', 'dawp'); ?></span>
                <span class="mt-3 block break-words font-heading text-lg font-black uppercase leading-tight">support@eliteshopexpress.com</span>
                <span class="mt-2 block text-sm leading-6 text-white/65"><?php esc_html_e('Monday - Friday, 9:00 AM - 6:00 PM EST.', 'dawp'); ?></span>
            </a>
        </div>
    </section>
</div>
