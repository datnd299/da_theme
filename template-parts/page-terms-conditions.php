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

$sections = [
    [
        'id'    => 'acceptance',
        'title' => __('1. Acceptance of Terms', 'dawp'),
        'body'  => [
            __('By accessing or placing an order on eliteshopexpress.com ("Eliteshop Express," "we," "us," or "our"), you agree to be bound by these Terms & Conditions. If you do not agree, please do not use this website or place an order.', 'dawp'),
        ],
    ],
    [
        'id'    => 'use-of-site',
        'title' => __('2. Use of This Website', 'dawp'),
        'body'  => [
            __('You agree to use this website only for lawful purposes and in a way that does not infringe the rights of, or restrict or inhibit the use of, this website by anyone else. You must be at least 18 years old, or have a parent/guardian\'s permission, to place an order.', 'dawp'),
        ],
    ],
    [
        'id'    => 'personalization',
        'title' => __('3. Personalization Content & Your Responsibility', 'dawp'),
        'body'  => [
            __('Eliteshop Express lets you submit names, text, and in some cases photos to be printed on your order ("Personalization Content"). By submitting Personalization Content, you confirm that:', 'dawp'),
        ],
        'list' => [
            __('You own the rights to any photo, text, or artwork you submit, or have permission to use it.', 'dawp'),
            __('Your Personalization Content does not infringe any copyright, trademark, or other intellectual property right (including logos, characters, or brand names you do not own).', 'dawp'),
            __('Your Personalization Content is not unlawful, obscene, defamatory, or otherwise objectionable.', 'dawp'),
        ],
        'body_after' => [
            __('We reserve the right to refuse or cancel any order containing content that appears to violate this section, with a full refund issued for any such cancelled order.', 'dawp'),
        ],
    ],
    [
        'id'    => 'products-pricing',
        'title' => __('4. Products, Pricing & Availability', 'dawp'),
        'body'  => [
            __('All prices are listed in US dollars and are subject to change without notice. We make reasonable efforts to display accurate pricing and product information, but errors may occasionally occur; if a pricing error is discovered after an order is placed, we will contact you before charging or shipping.', 'dawp'),
        ],
    ],
    [
        'id'    => 'orders-payment',
        'title' => __('5. Orders & Payment', 'dawp'),
        'body'  => [
            __('Placing an order is an offer to purchase, which we may accept or decline. Payment is processed securely through third-party payment providers at the time of order. Because each item is printed to order, orders typically enter production shortly after payment is confirmed.', 'dawp'),
        ],
    ],
    [
        'id'    => 'shipping',
        'title' => __('6. Shipping, Returns & Replacements', 'dawp'),
        'body'  => [
            sprintf(
                /* translators: %s: shipping & returns page link */
                __('Full details on processing times, delivery estimates, and our return/replacement policy for personalized items are available on our %s page.', 'dawp'),
                '<a class="font-bold text-[#FF5A5F] underline decoration-[#FF5A5F]/40 underline-offset-4 hover:text-[#111827]" href="' . esc_url($shipping_url) . '">' . esc_html__('Shipping & Returns', 'dawp') . '</a>'
            ),
        ],
        'raw' => true,
    ],
    [
        'id'    => 'intellectual-property',
        'title' => __('7. Our Intellectual Property', 'dawp'),
        'body'  => [
            __('The Eliteshop Express name, logo, website design, and original design templates are our property or that of our licensors and may not be copied, reproduced, or used without written permission.', 'dawp'),
        ],
    ],
    [
        'id'    => 'liability',
        'title' => __('8. Limitation of Liability', 'dawp'),
        'body'  => [
            __('To the fullest extent permitted by law, Eliteshop Express is not liable for any indirect, incidental, or consequential damages arising from your use of this website or your purchase. Our total liability for any claim relating to an order is limited to the amount you paid for that order.', 'dawp'),
        ],
    ],
    [
        'id'    => 'governing-law',
        'title' => __('9. Governing Law', 'dawp'),
        'body'  => [
            __('These Terms are governed by the laws of the United States, without regard to conflict-of-law principles, and apply to purchases made by customers within the United States.', 'dawp'),
        ],
    ],
    [
        'id'    => 'changes',
        'title' => __('10. Changes to These Terms', 'dawp'),
        'body'  => [
            __('We may update these Terms from time to time. The "Last updated" date below reflects the most recent revision. Continued use of this website after changes are posted constitutes acceptance of the updated Terms.', 'dawp'),
        ],
    ],
];
?>

<div class="bg-white text-[#111827]">
    <section class="bg-[#F9FAFB] py-14 sm:py-20" aria-labelledby="terms-title">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#FF5A5F]"><?php esc_html_e('Terms & Conditions', 'dawp'); ?></p>
            <h1 id="terms-title" class="mt-4 font-heading text-4xl font-extrabold leading-tight text-[#111827] sm:text-5xl">
                <?php esc_html_e('The terms behind every order.', 'dawp'); ?>
            </h1>
            <p class="mt-4 text-sm font-semibold text-[#6B7280]"><?php esc_html_e('Last updated: September 15, 2026', 'dawp'); ?></p>
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
                <h2 class="font-heading text-2xl font-bold text-[#111827]"><?php esc_html_e('11. Contact Us', 'dawp'); ?></h2>
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
