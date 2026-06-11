<?php
/**
 * Terms and conditions page template part.
 *
 * @package dawp
 */

$support_email = 'support@vivisshop.com';
$support_link = '<a class="font-semibold text-[#4B3528] underline decoration-[#B89B83] underline-offset-4" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>';
$link_support_email = static function ($text) use ($support_email, $support_link) {
    return str_replace(esc_html($support_email), $support_link, esc_html($text));
};

$terms_sections = [
    [
        'title' => __('Use Of This Website', 'dawp'),
        'copy'  => [
            __('By using vivisshop.com, you agree to use the website for lawful personal shopping purposes and not to misuse, interfere with, copy, scrape, or disrupt the website, checkout, accounts, or security features.', 'dawp'),
            __('We may update, suspend, or limit access to parts of the website when needed for maintenance, security, fraud prevention, or business operations.', 'dawp'),
        ],
    ],
    [
        'title' => __('Product Information', 'dawp'),
        'copy'  => [
            __('Vivisshop focuses on women\'s everyday fashion including relaxed tops, tunics, blouses, soft graphic tops, dresses, and casual wardrobe pieces. We aim to present product descriptions, prices, images, colors, and availability clearly and accurately.', 'dawp'),
            __('Colors may vary slightly because of screen settings, lighting, and photography. Size, fit, fabric, and care information should be reviewed on each product page before purchase.', 'dawp'),
        ],
    ],
    [
        'title' => __('Orders, Pricing & Payment', 'dawp'),
        'copy'  => [
            __('All prices are shown before checkout, and any applicable shipping fees or taxes are displayed during checkout before payment is submitted. Placing an order means you authorize the selected payment method for the order total.', 'dawp'),
            __('We reserve the right to cancel or refuse orders affected by suspected fraud, payment issues, incorrect address information, inventory errors, pricing errors, or other issues that prevent normal fulfillment.', 'dawp'),
        ],
    ],
    [
        'title' => __('Shipping', 'dawp'),
        'copy'  => [
            __('Orders are processed within 2-4 business days. After dispatch, standard US shipping typically takes 5-10 business days depending on destination and carrier conditions. Tracking is provided once an order ships.', 'dawp'),
            __('Delivery dates are estimates and may be affected by carrier delays, weather, holidays, address issues, or other conditions outside our direct control.', 'dawp'),
        ],
    ],
    [
        'title' => __('Returns & Refunds', 'dawp'),
        'copy'  => [
            __('Eligible items may be returned within 30 days of delivery if they are unworn, unwashed, unused, and in original condition with original packaging and tags where applicable.', 'dawp'),
            __('Please email support@vivisshop.com before returning an item. Return shipping costs are the customer\'s responsibility unless the item arrived damaged, defective, or incorrect. Approved refunds are issued to the original payment method after inspection.', 'dawp'),
        ],
    ],
    [
        'title' => __('Customer Accounts & Communication', 'dawp'),
        'copy'  => [
            __('You are responsible for providing accurate contact, billing, and shipping information. We may contact you by email about order confirmation, payment, shipping, tracking, returns, support requests, or important store updates.', 'dawp'),
        ],
    ],
    [
        'title' => __('Intellectual Property', 'dawp'),
        'copy'  => [
            __('Website text, layout, graphics, product presentation, photos, brand elements, and other content are owned by Vivisshop or used with permission. You may not copy, reproduce, sell, or reuse website content without written permission.', 'dawp'),
        ],
    ],
    [
        'title' => __('Limitation Of Liability', 'dawp'),
        'copy'  => [
            __('To the fullest extent allowed by law, Vivisshop is not responsible for indirect, incidental, special, or consequential damages related to website use, product use, delivery delays, or inability to access the website.', 'dawp'),
            __('Nothing in these terms limits rights that cannot be limited under applicable law.', 'dawp'),
        ],
    ],
];

$trust_cards = [
    __('Transparent order totals before checkout', 'dawp'),
    __('Clear shipping and return timelines', 'dawp'),
    __('Support available at support@vivisshop.com', 'dawp'),
];
?>

<div class="bg-white text-[#2F2925]">
    <section class="bg-[#FFF8EF] py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl">
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#8C6D58]"><?php esc_html_e('Store Terms', 'dawp'); ?></p>
                <h1 class="mt-4 font-heading text-5xl font-bold leading-tight text-[#4B3528] sm:text-6xl">
                    <?php esc_html_e('Terms & Conditions', 'dawp'); ?>
                </h1>
                <p class="mt-6 max-w-3xl text-lg leading-8 text-[#756A62]">
                    <?php esc_html_e('These terms explain the basic rules for using Vivisshop, placing orders, reviewing product information, and contacting us about shipping, returns, or support.', 'dawp'); ?>
                </p>
                <p class="mt-4 text-sm font-semibold text-[#4B3528]"><?php esc_html_e('Last updated: May 13, 2026', 'dawp'); ?></p>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-5 md:grid-cols-3">
                <?php foreach ($trust_cards as $card) : ?>
                    <div class="rounded-2xl border border-[#E7D8C8] bg-[#FFF8EF] p-6">
                        <div class="mb-4 flex h-10 w-10 items-center justify-center rounded-full bg-[#B89B83] text-white" aria-hidden="true">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 6 9 17l-5-5"></path>
                            </svg>
                        </div>
                        <p class="text-sm font-bold leading-6 text-[#4B3528]"><?php echo wp_kses_post($link_support_email($card)); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="mt-10 grid gap-8 lg:grid-cols-[0.75fr_1.25fr]">
                <aside class="rounded-2xl border border-[#E7D8C8] bg-[#F3E7DA] p-6 lg:sticky lg:top-8 lg:self-start">
                    <h2 class="font-heading text-3xl font-bold text-[#4B3528]"><?php esc_html_e('Customer Care', 'dawp'); ?></h2>
                    <p class="mt-4 text-sm leading-7 text-[#756A62]">
                        <?php esc_html_e('Questions about these terms, an order, or a policy can be sent to our support team.', 'dawp'); ?>
                    </p>
                    <div class="mt-5 space-y-3 text-sm leading-6 text-[#756A62]">
                        <p><strong class="text-[#4B3528]"><?php esc_html_e('Email:', 'dawp'); ?></strong> <a class="font-semibold text-[#4B3528] underline decoration-[#B89B83] underline-offset-4" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a></p>
                        <p><strong class="text-[#4B3528]"><?php esc_html_e('Hours:', 'dawp'); ?></strong> <?php esc_html_e('Business hours: Monday-Friday, 9:00 AM-5:00 PM', 'dawp'); ?></p>
                    </div>
                    <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>" class="mt-6 inline-flex min-h-12 items-center justify-center rounded-full bg-[#B89B83] px-6 text-sm font-bold text-white transition hover:bg-[#4B3528]">
                        <?php esc_html_e('View Shipping Policy', 'dawp'); ?>
                    </a>
                </aside>

                <div class="space-y-6">
                    <?php foreach ($terms_sections as $section) : ?>
                        <section class="rounded-2xl border border-[#E7D8C8] bg-white p-6 shadow-sm sm:p-8">
                            <h2 class="font-heading text-3xl font-bold text-[#4B3528]"><?php echo esc_html($section['title']); ?></h2>
                            <div class="mt-5 space-y-4 text-base leading-8 text-[#756A62]">
                                <?php foreach ($section['copy'] as $paragraph) : ?>
                                    <p><?php echo wp_kses_post($link_support_email($paragraph)); ?></p>
                                <?php endforeach; ?>
                            </div>
                        </section>
                    <?php endforeach; ?>

                    <section class="rounded-[2rem] bg-[#4B3528] p-6 text-white sm:p-8">
                        <h2 class="font-heading text-3xl font-bold"><?php esc_html_e('Updates To These Terms', 'dawp'); ?></h2>
                        <p class="mt-4 text-base leading-8 text-white/80">
                            <?php esc_html_e('We may update these Terms & Conditions from time to time. The updated version will be posted on this page with a revised date, and continued use of the website means the updated terms apply.', 'dawp'); ?>
                        </p>
                    </section>
                </div>
            </div>
        </div>
    </section>
</div>
