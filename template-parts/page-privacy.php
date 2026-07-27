<?php
/**
 * Privacy policy page template part.
 *
 * @package dawp
 */

$privacy_cards = [
    ['title' => __('Order Information', 'dawp'), 'copy' => __('We collect details needed to process purchases, including name, email, shipping address, billing address, phone number when provided, and order details.', 'dawp')],
    ['title' => __('Payment Security', 'dawp'), 'copy' => __('Payments are handled through secure payment providers. Gudwear.com does not store full payment card numbers on this website.', 'dawp')],
    ['title' => __('Customer Support', 'dawp'), 'copy' => __('Messages sent to support may be used to answer questions, resolve order issues, and improve service quality.', 'dawp')],
];

$policy_sections = [
    [
        'title' => __('Information We Collect', 'dawp'),
        'copy'  => [
            __('When you browse or shop at Gudwear.com, we may collect information you provide directly, such as your name, email address, shipping address, billing address, phone number, order details, and customer service messages.', 'dawp'),
            __('We may also collect basic technical information such as IP address, browser type, device information, pages visited, referring pages, and cookie data to help operate and protect the website.', 'dawp'),
        ],
    ],
    [
        'title' => __('How We Use Information', 'dawp'),
        'copy'  => [
            __('We use customer information to process orders, accept payment, arrange shipping, provide tracking, answer support requests, manage returns, prevent fraud, maintain website security, and improve the shopping experience.', 'dawp'),
            __('If you join our email list, we may send product updates or store news. You can unsubscribe from marketing emails at any time by using the unsubscribe link in the email.', 'dawp'),
        ],
    ],
    [
        'title' => __('Sharing Information', 'dawp'),
        'copy'  => [
            __('We share information only when needed to operate the store, such as with payment processors, shipping carriers, ecommerce platform providers, analytics providers, fraud prevention tools, and customer support services.', 'dawp'),
            __('We may also disclose information when required by law, to protect our legal rights, or to respond to valid legal requests.', 'dawp'),
        ],
    ],
    [
        'title' => __('Cookies & Analytics', 'dawp'),
        'copy'  => [
            __('Cookies help the website remember cart contents, support checkout, understand site performance, and improve browsing. You can control cookies through your browser settings, but some store features may not work correctly if cookies are disabled.', 'dawp'),
        ],
    ],
    [
        'title' => __('Data Retention', 'dawp'),
        'copy'  => [
            __('We keep order and account information for as long as needed to provide service, comply with legal obligations, resolve disputes, prevent fraud, and maintain business records.', 'dawp'),
        ],
    ],
    [
        'title' => __('Your Choices', 'dawp'),
        'copy'  => [
            __('You may contact us to request access, correction, or deletion of personal information where applicable. Some information may need to be retained for legal, tax, fraud prevention, or order record purposes.', 'dawp'),
        ],
    ],
];
?>

<div class="bg-white text-[#2F2925]">
    <section class="bg-[#FFF8EF] py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl">
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#8C6D58]"><?php esc_html_e('Privacy & Trust', 'dawp'); ?></p>
                <h1 class="mt-4 font-heading text-5xl font-bold leading-tight text-[#4B3528] sm:text-6xl">
                    <?php esc_html_e('Privacy Policy', 'dawp'); ?>
                </h1>
                <p class="mt-6 max-w-3xl text-lg leading-8 text-[#756A62]">
                    <?php esc_html_e('This policy explains how Gudwear.com collects, uses, and protects information when you browse our women\'s fashion store, place an order, or contact customer support.', 'dawp'); ?>
                </p>
                <p class="mt-4 text-sm font-semibold text-[#4B3528]"><?php esc_html_e('Last updated: May 13, 2026', 'dawp'); ?></p>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-5 md:grid-cols-3">
                <?php foreach ($privacy_cards as $card) : ?>
                    <div class="rounded-2xl border border-[#E7D8C8] bg-[#FFF8EF] p-6">
                        <h2 class="text-lg font-bold text-[#4B3528]"><?php echo esc_html($card['title']); ?></h2>
                        <p class="mt-3 text-sm leading-6 text-[#756A62]"><?php echo esc_html($card['copy']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="mt-10 grid gap-8 lg:grid-cols-[0.75fr_1.25fr]">
                <aside class="rounded-2xl border border-[#E7D8C8] bg-white p-6 shadow-sm lg:sticky lg:top-8 lg:self-start">
                    <h2 class="font-heading text-3xl font-bold text-[#4B3528]"><?php esc_html_e('Contact For Privacy Requests', 'dawp'); ?></h2>
                    <p class="mt-4 text-sm leading-7 text-[#756A62]">
                        <?php esc_html_e('For privacy questions or requests, email us with enough detail to identify your order or account.', 'dawp'); ?>
                    </p>
                    <a class="mt-5 inline-flex min-h-12 items-center justify-center rounded-full bg-[#B89B83] px-6 text-sm font-bold text-white transition hover:bg-[#4B3528]" href="mailto:support@gudwear.com">
                        <?php esc_html_e('support@gudwear.com', 'dawp'); ?>
                    </a>
                    <p class="mt-5 text-sm leading-6 text-[#756A62]"><?php esc_html_e('Business hours: Monday-Friday, 9:00 AM-5:00 PM', 'dawp'); ?></p>
                </aside>

                <div class="space-y-6">
                    <?php foreach ($policy_sections as $section) : ?>
                        <section class="rounded-2xl border border-[#E7D8C8] bg-white p-6 shadow-sm sm:p-8">
                            <h2 class="font-heading text-3xl font-bold text-[#4B3528]"><?php echo esc_html($section['title']); ?></h2>
                            <div class="mt-5 space-y-4 text-base leading-8 text-[#756A62]">
                                <?php foreach ($section['copy'] as $paragraph) : ?>
                                    <p><?php echo esc_html($paragraph); ?></p>
                                <?php endforeach; ?>
                            </div>
                        </section>
                    <?php endforeach; ?>

                    <section class="rounded-[2rem] bg-[#4B3528] p-6 text-white sm:p-8">
                        <h2 class="font-heading text-3xl font-bold"><?php esc_html_e('Policy Updates', 'dawp'); ?></h2>
                        <p class="mt-4 text-base leading-8 text-white/80">
                            <?php esc_html_e('We may update this Privacy Policy from time to time. Updates will be posted on this page with a revised date, and continued use of the website means the updated policy applies.', 'dawp'); ?>
                        </p>
                    </section>
                </div>
            </div>
        </div>
    </section>
</div>
