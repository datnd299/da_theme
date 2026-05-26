<?php
/**
 * Terms and conditions page for LBQ Shop.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email = 'support@lbqshop.com';
$shipping_url  = home_url('/shipping-policy/');
$returns_url   = home_url('/return-refund-policy/');
$privacy_url   = home_url('/privacy-policy/');
$contact_url   = home_url('/contact-us/');

$terms_highlights = [
    [
        'title' => __('Focused Store Use', 'dawp'),
        'copy'  => __('LBQ Shop sells beauty accessories, makeup organizers, fashion accessories, everyday style essentials, and giftable finds.', 'dawp'),
    ],
    [
        'title' => __('Transparent Policies', 'dawp'),
        'copy'  => __('Shipping, tracking, returns, and refund terms are published so customers can review them before ordering.', 'dawp'),
    ],
    [
        'title' => __('Responsible Product Copy', 'dawp'),
        'copy'  => __('Product descriptions are intended to explain practical use, size, material, care, and styling context without medical or counterfeit claims.', 'dawp'),
    ],
];

$sections = [
    [
        'title' => __('1. Overview', 'dawp'),
        'copy'  => [
            __('These Terms & Conditions govern your use of lbqshop.com and purchases made from LBQ Shop. By using this website or placing an order, you agree to these terms.', 'dawp'),
            __('LBQ Shop is a beauty and fashion accessories store focused on practical makeup bags, cosmetic organizers, beauty accessories, fashion accents, everyday style essentials, and giftable accessories.', 'dawp'),
        ],
    ],
    [
        'title' => __('2. Website Use', 'dawp'),
        'copy'  => [
            __('You agree to use this website only for lawful purposes and in a way that does not interfere with store operation, security, checkout, customer accounts, or other visitors use of the site.', 'dawp'),
            __('You may not misuse the site, attempt unauthorized access, submit false order information, or use LBQ Shop content for misleading, unlawful, or infringing purposes.', 'dawp'),
        ],
    ],
    [
        'title' => __('3. Product Information', 'dawp'),
        'copy'  => [
            __('We aim to present product descriptions, images, prices, materials, sizes, colors, and availability as accurately as reasonably possible.', 'dawp'),
            __('Small differences in color, texture, or appearance may occur due to screen settings, photography, product batches, or supplier updates. Product information may be updated without prior notice.', 'dawp'),
            __('LBQ Shop does not sell counterfeit designer products, fake branded cosmetics, supplements, medical skincare treatments, or products with prohibited beauty claims.', 'dawp'),
        ],
    ],
    [
        'title' => __('4. Orders and Acceptance', 'dawp'),
        'copy'  => [
            __('An order confirmation means we received your order request. We may review, decline, cancel, or limit orders when necessary, including for suspected fraud, incorrect pricing, unavailable inventory, payment issues, shipping restrictions, or policy violations.', 'dawp'),
            __('If an order is cancelled after payment, eligible amounts will be refunded to the original payment method.', 'dawp'),
        ],
    ],
    [
        'title' => __('5. Pricing and Payment', 'dawp'),
        'copy'  => [
            __('Prices are shown on the website and may change without notice. Applicable taxes, shipping charges, and other checkout costs are displayed where required before order completion.', 'dawp'),
            __('Payments are processed through third-party payment providers. By submitting payment information, you represent that you are authorized to use the selected payment method.', 'dawp'),
        ],
    ],
    [
        'title' => __('6. Shipping, Tracking, and Delivery', 'dawp'),
        'copy'  => [
            __('The daily order cut off time is 5:00 PM Pacific Standard Time (Los Angeles). Orders placed after the cut off time are processed from the next business day.', 'dawp'),
            __('Current handling time is 1-2 business days from the order cut off to when the shipment is ready for transit. Orders are fulfilled Monday through Friday, excluding holidays, and standard transit usually takes 5-7 business days after dispatch.', 'dawp'),
            __('Tracking information is provided once an order ships. Public holidays, carrier delays, weather, address issues, or other events outside our direct control may affect the final delivery estimate.', 'dawp'),
        ],
    ],
    [
        'title' => __('7. Returns and Refunds', 'dawp'),
        'copy'  => [
            __('Customers may request returns or exchanges within 30 days of delivery. Returns are accepted for defective and non-defective products.', 'dawp'),
            __('Eligible products must be unused, in original condition, and returned with original packaging, tags or labels, accessories, manuals, and parts. Return authorization is required before sending items back.', 'dawp'),
            __('There is no restocking fee. We cover return shipping for defective, damaged, or incorrect products; customers pay actual return shipping for change-of-mind returns. Approved refunds are processed to the original payment method and typically appear within up to 7 days depending on the bank or payment provider.', 'dawp'),
        ],
    ],
    [
        'title' => __('8. Account and Customer Information', 'dawp'),
        'copy'  => [
            __('You are responsible for providing accurate contact, billing, shipping, and order information. LBQ Shop is not responsible for delays or failed delivery caused by incorrect or incomplete customer information.', 'dawp'),
            __('Please keep account login details confidential if you create an account. Notify us promptly if you believe your account or order information has been used without authorization.', 'dawp'),
        ],
    ],
    [
        'title' => __('9. Intellectual Property', 'dawp'),
        'copy'  => [
            __('Website text, layout, images, graphics, logos, and other content are owned by or licensed to LBQ Shop and may not be copied, reproduced, or used for commercial purposes without permission, except as allowed by law.', 'dawp'),
        ],
    ],
    [
        'title' => __('10. Limitation of Liability', 'dawp'),
        'copy'  => [
            __('To the fullest extent permitted by law, LBQ Shop is not liable for indirect, incidental, special, consequential, or punitive damages related to website use, product use, delivery delays, or inability to access the site.', 'dawp'),
            __('Nothing in these terms excludes rights or remedies that cannot be excluded under applicable law.', 'dawp'),
        ],
    ],
    [
        'title' => __('11. Changes to These Terms', 'dawp'),
        'copy'  => [
            __('We may update these Terms & Conditions from time to time. Updated terms will be posted on this page and apply to website use and orders after posting.', 'dawp'),
        ],
    ],
    [
        'title' => __('12. Contact', 'dawp'),
        'copy'  => [
            __('Questions about these terms, an order, or store policies can be sent to support@lbqshop.com.', 'dawp'),
        ],
    ],
];
?>

<div class="bg-white text-[#2F2A28]">
    <section class="bg-[#F8F2EE] py-14 sm:py-20" aria-labelledby="terms-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:items-end">
                <div>
                    <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A96870]"><?php esc_html_e('Terms & Conditions', 'dawp'); ?></p>
                    <h1 id="terms-title" class="mt-4 font-heading text-4xl font-extrabold leading-tight text-[#2F2A28] sm:text-5xl">
                        <?php esc_html_e('Store terms for shopping with LBQ Shop.', 'dawp'); ?>
                    </h1>
                    <p class="mt-5 max-w-2xl text-base leading-8 text-[#6F625D]">
                        <?php esc_html_e('These terms explain website use, ordering, product information, payments, shipping, returns, and customer responsibilities for LBQ Shop.', 'dawp'); ?>
                    </p>
                </div>

                <div class="grid gap-4 md:grid-cols-3 lg:grid-cols-1 xl:grid-cols-3">
                    <?php foreach ($terms_highlights as $highlight) : ?>
                        <article class="rounded-md border border-[#E8DAD4] bg-white p-5 shadow-sm">
                            <h2 class="font-heading text-lg font-extrabold text-[#2F2A28]"><?php echo esc_html($highlight['title']); ?></h2>
                            <p class="mt-3 text-sm leading-6 text-[#6F625D]"><?php echo esc_html($highlight['copy']); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#FFFDFC] py-14 sm:py-20" aria-labelledby="terms-content-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.78fr_1.22fr] lg:px-8">
            <aside class="lg:sticky lg:top-24 lg:self-start">
                <div class="rounded-md border border-[#E8DAD4] bg-white p-6 shadow-sm">
                    <h2 id="terms-content-title" class="font-heading text-2xl font-extrabold text-[#2F2A28]"><?php esc_html_e('Important policy links', 'dawp'); ?></h2>
                    <p class="mt-4 text-sm leading-7 text-[#6F625D]">
                        <?php esc_html_e('Shipping, returns, privacy, and support details are part of a transparent shopping experience. Review them before ordering if you have questions.', 'dawp'); ?>
                    </p>
                    <div class="mt-6 grid gap-3">
                        <a href="<?php echo esc_url($shipping_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#C87F86] px-5 text-sm font-bold text-white transition hover:bg-[#2F2A28]">
                            <?php esc_html_e('Shipping Policy', 'dawp'); ?>
                        </a>
                        <a href="<?php echo esc_url($returns_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#C87F86] bg-white px-5 text-sm font-bold text-[#8A4F56] transition hover:bg-[#FBEDEA]">
                            <?php esc_html_e('Return & Refund Policy', 'dawp'); ?>
                        </a>
                        <a href="<?php echo esc_url($privacy_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#C87F86] bg-white px-5 text-sm font-bold text-[#8A4F56] transition hover:bg-[#FBEDEA]">
                            <?php esc_html_e('Privacy Policy', 'dawp'); ?>
                        </a>
                    </div>
                </div>
            </aside>

            <div class="grid gap-5">
                <?php foreach ($sections as $section) : ?>
                    <article class="rounded-md border border-[#E8DAD4] bg-white p-6 shadow-sm">
                        <h2 class="font-heading text-xl font-extrabold text-[#2F2A28]"><?php echo esc_html($section['title']); ?></h2>
                        <div class="mt-4 space-y-4 text-sm leading-7 text-[#6F625D]">
                            <?php foreach ($section['copy'] as $paragraph) : ?>
                                <p><?php echo esc_html($paragraph); ?></p>
                            <?php endforeach; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-[#F8F2EE] py-14 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-md border border-[#E8DAD4] bg-white p-6 sm:p-8">
                <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A96870]"><?php esc_html_e('Support', 'dawp'); ?></p>
                        <h2 class="mt-3 font-heading text-2xl font-extrabold text-[#2F2A28]"><?php esc_html_e('Questions about these terms?', 'dawp'); ?></h2>
                        <p class="mt-3 text-sm leading-7 text-[#6F625D]">
                            <?php
                            echo wp_kses(
                                sprintf(
                                    /* translators: support email */
                                    __('Email %s and include your order number if your question is order-specific.', 'dawp'),
                                    '<a class="font-bold text-[#8A4F56] underline decoration-[#C87F86]/40 underline-offset-4 transition hover:text-[#2F2A28]" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>'
                                ),
                                [
                                    'a' => [
                                        'class' => [],
                                        'href'  => [],
                                    ],
                                ]
                            );
                            ?>
                        </p>
                    </div>
                    <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#2F2A28] px-6 text-sm font-bold text-white transition hover:bg-[#8A4F56]">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
