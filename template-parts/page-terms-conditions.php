<?php
/**
 * Terms & Conditions template part.
 *
 * @package dawp
 */

$terms_cards = [
    [
        'number' => '01',
        'title'  => __('Everyday Products', 'dawp'),
        'copy'   => __('Elite Shop Express offers practical home, personal care, accessory, lifestyle, and giftable products.', 'dawp'),
        'color'  => '#2563EB',
    ],
    [
        'number' => '02',
        'title'  => __('Order Accuracy', 'dawp'),
        'copy'   => __('Customers are responsible for entering accurate checkout, shipping, and contact information.', 'dawp'),
        'color'  => '#06B6D4',
    ],
    [
        'number' => '03',
        'title'  => __('Clear Policies', 'dawp'),
        'copy'   => __('Shipping, returns, privacy, and support policies are published for transparent expectations.', 'dawp'),
        'color'  => '#C026D3',
    ],
    [
        'number' => '04',
        'title'  => __('Responsible Use', 'dawp'),
        'copy'   => __('Customers must use the website lawfully and avoid misuse of store features or content.', 'dawp'),
        'color'  => '#65A30D',
    ],
];

$sections = [
    [
        'id'      => 'agreement',
        'eyebrow' => __('Agreement', 'dawp'),
        'title'   => __('Using the Elite Shop Express website.', 'dawp'),
        'body'    => [
            __('These Terms & Conditions apply when you browse, access, or purchase from Elite Shop Express. By using the website, you agree to these terms and to any policies referenced here, including shipping, returns, and privacy policies.', 'dawp'),
            __('If you do not agree with these terms, please do not use the website or place an order.', 'dawp'),
        ],
    ],
    [
        'id'      => 'store',
        'eyebrow' => __('Store Scope', 'dawp'),
        'title'   => __('Everyday essentials and lifestyle finds.', 'dawp'),
        'body'    => [
            __('Elite Shop Express is a lifestyle ecommerce store focused on practical products for home essentials, beauty and personal care accessories, fashion accessories, lifestyle accessories, and giftable everyday finds.', 'dawp'),
            __('Product descriptions are provided to help customers understand common use cases, features, materials, sizing, included items, and care notes where relevant. Product images, colors, packaging, and details may vary slightly due to screen settings, photography, supplier updates, or availability.', 'dawp'),
        ],
    ],
    [
        'id'      => 'orders',
        'eyebrow' => __('Orders & Payment', 'dawp'),
        'title'   => __('Checkout, confirmation, and order review.', 'dawp'),
        'body'    => [
            __('When placing an order, you agree to provide accurate billing, shipping, contact, and payment information. Incorrect information may delay or prevent delivery.', 'dawp'),
            __('An order confirmation does not guarantee acceptance if there is a pricing error, inventory issue, suspected fraud, payment problem, shipping restriction, or other issue that prevents fulfillment.', 'dawp'),
            __('Prices, product availability, promotions, and descriptions may change without notice. The final order total is shown at checkout before payment is completed.', 'dawp'),
        ],
    ],
    [
        'id'      => 'shipping',
        'eyebrow' => __('Shipping & Returns', 'dawp'),
        'title'   => __('Policy expectations for delivery and returns.', 'dawp'),
        'body'    => [
            __('Orders are processed within 2-4 business days. After dispatch, standard US shipping typically takes 5-10 business days depending on destination and carrier conditions.', 'dawp'),
            __('Tracking information is provided once an order ships. Delivery timelines are estimates and may be affected by carrier delays, weather, holidays, high-volume periods, or address issues.', 'dawp'),
            __('Eligible returns may be requested within 30 days of delivery. Shoes must be unworn, unused, undamaged, and returned in the original shoebox and packaging with included tags, inserts, and accessories where applicable.', 'dawp'),
        ],
    ],
    [
        'id'      => 'website',
        'eyebrow' => __('Website Use', 'dawp'),
        'title'   => __('Responsible use of site features and content.', 'dawp'),
        'body'    => [
            __('You agree not to misuse the website, interfere with its security or operation, attempt unauthorized access, submit false information, scrape or copy content at scale, or use the website for unlawful purposes.', 'dawp'),
            __('Website content, including text, images, page layouts, product presentation, graphics, and branding elements, is provided for the Elite Shop Express shopping experience and may not be copied or reused without permission except as allowed by law.', 'dawp'),
        ],
    ],
    [
        'id'      => 'support',
        'eyebrow' => __('Support & Changes', 'dawp'),
        'title'   => __('Contact, updates, and policy changes.', 'dawp'),
        'body'    => [
            __('For questions about orders, shipping, returns, products, or these terms, contact support@eliteshopexpress.com. Support is available Monday through Friday, 9:00 AM - 6:00 PM EST.', 'dawp'),
            __('We may update these Terms & Conditions from time to time. Continued use of the website after updates means you accept the revised terms.', 'dawp'),
        ],
    ],
];
?>

<div class="bg-white font-body text-[#101828]">
    <section class="relative overflow-hidden bg-[#F3F7FB]">
        <div class="relative mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
            <div class="max-w-4xl">
                <p class="mb-5 inline-flex rounded-full bg-[#DBEAFE] px-4 py-2 text-xs font-black uppercase tracking-[0.18em] text-[#2563EB]">
                    <?php esc_html_e('Terms & Conditions', 'dawp'); ?>
                </p>
                <h1 class="font-heading text-4xl font-black uppercase leading-[0.98] text-[#101828] sm:text-5xl lg:text-[4.25rem]">
                    <?php esc_html_e('Clear terms for a straightforward shopping experience.', 'dawp'); ?>
                </h1>
                <p class="mt-6 max-w-2xl text-lg leading-8 text-[#475467]">
                    <?php esc_html_e('These terms explain how customers may use Elite Shop Express, place orders, review product information, and access support for everyday essentials and lifestyle finds.', 'dawp'); ?>
                </p>
            </div>

            <div class="mt-10 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <?php foreach ($terms_cards as $card) : ?>
                    <article class="border border-[#E5E7EB] bg-white p-6 shadow-sm">
                        <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full text-sm font-black text-white" style="background-color: <?php echo esc_attr($card['color']); ?>">
                            <?php echo esc_html($card['number']); ?>
                        </div>
                        <h2 class="font-heading text-xl font-black uppercase leading-tight text-[#101828]">
                            <?php echo esc_html($card['title']); ?>
                        </h2>
                        <p class="mt-3 text-sm leading-6 text-[#475467]">
                            <?php echo esc_html($card['copy']); ?>
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
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#67E8F9]"><?php esc_html_e('Terms Sections', 'dawp'); ?></p>
                    <h2 class="font-heading text-3xl font-black uppercase leading-tight"><?php esc_html_e('Review the basics.', 'dawp'); ?></h2>
                    <nav class="mt-7 grid gap-3 text-sm font-black uppercase tracking-wide text-white/85" aria-label="<?php esc_attr_e('Terms and conditions navigation', 'dawp'); ?>">
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
                <p class="mb-2 text-xs font-black uppercase tracking-[0.18em] text-[#67E8F9]"><?php esc_html_e('Related Policies', 'dawp'); ?></p>
                <h2 class="font-heading text-3xl font-black uppercase leading-tight lg:text-[2.1rem]"><?php esc_html_e('Read the full customer care details.', 'dawp'); ?></h2>
                <p class="mt-3 text-sm leading-7 text-white/72"><?php esc_html_e('Shipping, return, and privacy details help set clear expectations before and after checkout.', 'dawp'); ?></p>
            </div>
            <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                <a href="<?php echo esc_url(home_url('/shipping-returns/')); ?>" class="group border border-white/10 bg-white/[0.04] p-5 transition hover:bg-white hover:text-[#101828]">
                    <span class="text-xs font-black uppercase tracking-[0.18em] text-[#67E8F9] transition group-hover:text-[#2563EB]"><?php esc_html_e('Shipping & Returns', 'dawp'); ?></span>
                    <span class="mt-3 block font-heading text-lg font-black uppercase leading-tight"><?php esc_html_e('Delivery and return rules', 'dawp'); ?></span>
                    <span class="mt-2 block text-sm leading-6 text-white/65 transition group-hover:text-[#475467]"><?php esc_html_e('Processing, tracking, return window, shoe packaging, and refund review details.', 'dawp'); ?></span>
                </a>
                <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>" class="group border border-white/10 bg-white/[0.04] p-5 transition hover:bg-white hover:text-[#101828]">
                    <span class="text-xs font-black uppercase tracking-[0.18em] text-[#67E8F9] transition group-hover:text-[#2563EB]"><?php esc_html_e('Privacy Policy', 'dawp'); ?></span>
                    <span class="mt-3 block font-heading text-lg font-black uppercase leading-tight"><?php esc_html_e('Customer information use', 'dawp'); ?></span>
                    <span class="mt-2 block text-sm leading-6 text-white/65 transition group-hover:text-[#475467]"><?php esc_html_e('How order, support, and website information may be handled.', 'dawp'); ?></span>
                </a>
            </div>
        </div>
    </section>
</div>
