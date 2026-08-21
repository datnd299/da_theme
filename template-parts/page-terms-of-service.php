<?php
/**
 * Terms of service page for US Watch Store.
 *
 * Hallmark · genre: modern-minimal · macrostructure: Long Document (continuous
 * prose sections, no per-section card boxes)
 * nav: N12 · footer: Ft1 · design-system: .plans/design_system.md (locked)
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email = 'support@uswatchstore.com';
$last_updated  = __('August 21, 2026', 'dawp');
$shipping_url  = home_url('/shipping-policy/');
$returns_url   = home_url('/return-refund-policy/');
$billing_url   = home_url('/billing-terms/');
$privacy_url   = home_url('/privacy-policy/');
$contact_url   = home_url('/contact-us/');

$terms_highlights = [
    [
        'title' => __('Focused Store Use', 'dawp'),
        'copy'  => __('US Watch Store sells quartz, mechanical, smart, and digital watches for everyday wear, gifting, and collecting, shipped within the United States.', 'dawp'),
    ],
    [
        'title' => __('Transparent Policies', 'dawp'),
        'copy'  => __('Shipping, tracking, returns, warranty, billing, and refund terms are published so customers can review them before ordering.', 'dawp'),
    ],
    [
        'title' => __('Responsible Product Copy', 'dawp'),
        'copy'  => __('Product descriptions explain movement type, materials, water resistance, sizing, and care without counterfeit, replica, or misleading authenticity claims.', 'dawp'),
    ],
];

$sections = [
    [
        'title' => __('1. Overview and Acceptance', 'dawp'),
        'copy'  => [
            __('These Terms of Service ("Terms") govern your access to and use of uswatchstore.com (the "Site") and any purchase made from US Watch Store ("we," "us," or "our"). By browsing the Site, creating an account, or placing an order, you agree to be bound by these Terms.', 'dawp'),
            __('US Watch Store is a watch retailer based in San Diego, California, focused on quartz, mechanical, smart, and digital watches for everyday wear, gifting, and collecting.', 'dawp'),
            __('If you do not agree to these Terms, do not use the Site or place an order.', 'dawp'),
        ],
    ],
    [
        'title' => __('2. Eligibility', 'dawp'),
        'copy'  => [
            __('You must be at least 18 years old, or the age of majority in your state of residence, and able to form a legally binding contract to place an order on this Site. By placing an order, you represent that you meet these requirements.', 'dawp'),
        ],
    ],
    [
        'title' => __('3. Website Use and Prohibited Conduct', 'dawp'),
        'copy'  => [
            __('You agree to use this website only for lawful purposes and in a way that does not interfere with store operation, security, checkout, customer accounts, or other visitors\' use of the Site.', 'dawp'),
            __('You may not: attempt unauthorized access to any part of the Site or its systems; submit false order, payment, or contact information; use automated means (bots, scrapers) to access or copy the Site without permission; interfere with or disrupt the Site or servers; or use US Watch Store content for misleading, unlawful, infringing, or competing commercial purposes.', 'dawp'),
        ],
    ],
    [
        'title' => __('4. Product Information', 'dawp'),
        'copy'  => [
            __('We aim to present product descriptions, images, prices, materials, movement types, dial sizes, water resistance ratings, and availability as accurately as reasonably possible.', 'dawp'),
            __('Small differences in color, finish, or appearance may occur due to screen settings, photography, product batches, or supplier updates. Product information may be updated without prior notice.', 'dawp'),
            __('US Watch Store does not sell counterfeit or replica watches, unauthorized branded products, or items with misrepresented authenticity claims. If you believe a listing is inaccurate, contact support@uswatchstore.com before ordering.', 'dawp'),
        ],
    ],
    [
        'title' => __('5. Orders, Pricing, and Acceptance', 'dawp'),
        'copy'  => [
            __('An order confirmation email means we received your order request; it is not a guarantee of acceptance. We may review, decline, cancel, or limit orders when necessary, including for suspected fraud, incorrect pricing, unavailable inventory, payment issues, shipping restrictions, or policy violations.', 'dawp'),
            __('If an order is cancelled after payment, eligible amounts are refunded to the original payment method. Prices are shown on the Site in US Dollars and may change without notice; the price displayed at checkout when your order is placed is the price you are charged. See our Billing Terms & Conditions for full pricing and tax details.', 'dawp'),
        ],
    ],
    [
        'title' => __('6. Payment', 'dawp'),
        'copy'  => [
            __('Payments are processed through third-party, PCI-DSS-compliant payment providers and PayPal. By submitting payment information, you represent that you are authorized to use the selected payment method and that the information provided is accurate.', 'dawp'),
            __('Your payment method is charged when your order is placed, not when it ships. See our Billing Terms & Conditions for accepted payment methods, currency, sales tax, and dispute handling.', 'dawp'),
        ],
    ],
    [
        'title' => __('7. Shipping, Tracking, and Delivery', 'dawp'),
        'copy'  => [
            __('US Watch Store currently ships only within the United States. Orders are processed within 1-3 business days. After dispatch, standard US shipping typically takes 3-7 business days depending on destination and carrier conditions. Shipping is free on all orders. See our Shipping Policy for full details.', 'dawp'),
            __('Tracking information is provided once an order ships. Delivery estimates are not guarantees and may be affected by carrier delays, weather, holidays, address issues, or other events outside our direct control.', 'dawp'),
        ],
    ],
    [
        'title' => __('8. Returns, Refunds, and Warranty', 'dawp'),
        'copy'  => [
            __('Customers may request returns within 30 days of delivery, no questions asked. Eligible watches must be unworn and undamaged, with all original tags, papers, and box included. Customers are responsible for return shipping on standard returns; US Watch Store covers return shipping for damaged, defective, or incorrect items. See our Return & Refund Policy for full details.', 'dawp'),
            __('Every watch carries a 2-year limited warranty covering movement, battery, and factory-assembly defects from normal use; accidental damage, water damage beyond the rated resistance, unauthorized repair, and normal wear are not covered. Refunds are issued to the original payment method after returned items are received and inspected.', 'dawp'),
        ],
    ],
    [
        'title' => __('9. Customer Accounts and Information Accuracy', 'dawp'),
        'copy'  => [
            __('You are responsible for providing accurate contact, billing, shipping, and order information. US Watch Store is not responsible for delays or failed delivery caused by incorrect or incomplete customer information.', 'dawp'),
            __('If you create an account, keep your login credentials confidential and notify us promptly at support@uswatchstore.com if you believe your account or order information has been used without authorization.', 'dawp'),
        ],
    ],
    [
        'title' => __('10. Intellectual Property', 'dawp'),
        'copy'  => [
            __('The Site\'s text, layout, images, graphics, logos, and other content are owned by or licensed to US Watch Store and are protected by copyright, trademark, and other intellectual property laws. They may not be copied, reproduced, distributed, or used for commercial purposes without our prior written permission, except as allowed by law.', 'dawp'),
        ],
    ],
    [
        'title' => __('11. Third-Party Links and Services', 'dawp'),
        'copy'  => [
            __('The Site may link to third-party websites or services, including social media platforms and payment providers, that we do not control and are not responsible for. Your use of any linked third-party site is subject to that site\'s own terms and privacy policy.', 'dawp'),
        ],
    ],
    [
        'title' => __('12. Disclaimer of Warranties', 'dawp'),
        'copy'  => [
            __('The Site and its content are provided "as is" and "as available" without warranties of any kind, express or implied, except for the express product warranty described in our Return & Refund Policy. To the fullest extent permitted by law, we disclaim implied warranties of merchantability, fitness for a particular purpose, and non-infringement, and do not warrant that the Site will be uninterrupted, error-free, or free of viruses or other harmful components.', 'dawp'),
        ],
    ],
    [
        'title' => __('13. Limitation of Liability', 'dawp'),
        'copy'  => [
            __('To the fullest extent permitted by law, US Watch Store is not liable for indirect, incidental, special, consequential, or punitive damages arising from your use of the Site, use of a purchased product, delivery delays, or inability to access the Site, even if we have been advised of the possibility of such damages.', 'dawp'),
            __('Our total liability for any claim arising from these Terms or your order is limited to the amount you paid for the applicable order. Nothing in these Terms excludes or limits liability that cannot be excluded or limited under applicable law, including liability for gross negligence, fraud, or death or personal injury caused by our negligence.', 'dawp'),
        ],
    ],
    [
        'title' => __('14. Indemnification', 'dawp'),
        'copy'  => [
            __('You agree to indemnify and hold US Watch Store, its officers, employees, and agents harmless from any claims, losses, liabilities, and expenses, including reasonable attorneys\' fees, arising from your violation of these Terms, misuse of the Site, or violation of any law or third-party right.', 'dawp'),
        ],
    ],
    [
        'title' => __('15. Governing Law and Dispute Resolution', 'dawp'),
        'copy'  => [
            __('These Terms are governed by the laws of the State of California, without regard to its conflict-of-laws principles, except where superseded by applicable federal law.', 'dawp'),
            __('Before filing a formal claim, please contact support@uswatchstore.com so we can attempt to resolve the issue directly. Any dispute that cannot be resolved informally shall be subject to the exclusive jurisdiction of the state and federal courts located in San Diego County, California.', 'dawp'),
        ],
    ],
    [
        'title' => __('16. Severability and Entire Agreement', 'dawp'),
        'copy'  => [
            __('If any provision of these Terms is found unenforceable, the remaining provisions remain in full force and effect. These Terms, together with our Shipping Policy, Return & Refund Policy, Billing Terms & Conditions, and Privacy Policy, constitute the entire agreement between you and US Watch Store regarding use of the Site and purchases made from it.', 'dawp'),
        ],
    ],
    [
        'title' => __('17. Changes to These Terms', 'dawp'),
        'copy'  => [
            __('We may update these Terms of Service from time to time. Updated Terms will be posted on this page with a revised "Last Updated" date and apply to website use and orders placed after posting. Continued use of the Site after changes are posted constitutes acceptance of the updated Terms.', 'dawp'),
        ],
    ],
    [
        'title' => __('18. Contact', 'dawp'),
        'copy'  => [
            __('Questions about these Terms, an order, or store policies can be sent to support@uswatchstore.com or by mail to US Watch Store, 1420 Kettner Blvd, San Diego, CA 92101, United States.', 'dawp'),
        ],
    ],
];
?>

<div class="bg-background text-foreground">
    <section class="bg-surface py-14 sm:py-20" aria-labelledby="terms-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:items-end">
                <div>
                    <div class="flex flex-wrap items-center gap-3">
                        <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-accent-blush"><?php esc_html_e('Terms of Service', 'dawp'); ?></p>
                        <span class="inline-flex items-center rounded-sm border border-border bg-background px-2.5 py-1 text-xs font-semibold uppercase tracking-[0.08em] text-muted">
                            <?php echo esc_html(sprintf(__('Last Updated: %s', 'dawp'), $last_updated)); ?>
                        </span>
                    </div>
                    <h1 id="terms-title" class="mt-4 font-heading text-4xl font-extrabold leading-tight text-foreground sm:text-5xl">
                        <?php esc_html_e('Store terms for shopping with US Watch Store.', 'dawp'); ?>
                    </h1>
                    <p class="mt-5 max-w-2xl text-base leading-8 text-foreground-muted">
                        <?php esc_html_e('These terms explain website use, ordering, product information, payments, shipping, returns, and customer responsibilities for US Watch Store.', 'dawp'); ?>
                    </p>
                </div>

                <div class="grid gap-4 md:grid-cols-3 lg:grid-cols-1 xl:grid-cols-3">
                    <?php foreach ($terms_highlights as $highlight) : ?>
                        <article class="rounded-md border border-border bg-background p-5 shadow-card">
                            <h2 class="font-heading text-lg font-extrabold text-foreground"><?php echo esc_html($highlight['title']); ?></h2>
                            <p class="mt-3 text-sm leading-6 text-foreground-muted"><?php echo esc_html($highlight['copy']); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Long Document: continuous prose, inline section heads, no card boxes -->
    <section class="bg-background py-16 sm:py-24" aria-labelledby="terms-content-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.7fr_1.3fr] lg:px-8">
            <aside class="lg:sticky lg:top-24 lg:self-start">
                <div class="rounded-md border border-border bg-surface p-6">
                    <h2 id="terms-content-title" class="font-heading text-xl font-extrabold text-foreground"><?php esc_html_e('Important policy links', 'dawp'); ?></h2>
                    <p class="mt-4 text-sm leading-7 text-foreground-muted">
                        <?php esc_html_e('Shipping, returns, billing, privacy, and support details are part of a transparent shopping experience. Review them before ordering if you have questions.', 'dawp'); ?>
                    </p>
                    <div class="mt-6 grid gap-3">
                        <a href="<?php echo esc_url($shipping_url); ?>" class="inline-flex min-h-12 items-center justify-center whitespace-nowrap rounded-sm bg-accent px-5 text-sm font-bold text-white transition hover:bg-accent-hover">
                            <?php esc_html_e('Shipping Policy', 'dawp'); ?>
                        </a>
                        <a href="<?php echo esc_url($returns_url); ?>" class="inline-flex min-h-12 items-center justify-center whitespace-nowrap rounded-sm border border-accent bg-background px-5 text-sm font-bold text-accent-hover transition hover:bg-surface-alt">
                            <?php esc_html_e('Return & Refund Policy', 'dawp'); ?>
                        </a>
                        <a href="<?php echo esc_url($billing_url); ?>" class="inline-flex min-h-12 items-center justify-center whitespace-nowrap rounded-sm border border-accent bg-background px-5 text-sm font-bold text-accent-hover transition hover:bg-surface-alt">
                            <?php esc_html_e('Billing Terms & Conditions', 'dawp'); ?>
                        </a>
                        <a href="<?php echo esc_url($privacy_url); ?>" class="inline-flex min-h-12 items-center justify-center whitespace-nowrap rounded-sm border border-accent bg-background px-5 text-sm font-bold text-accent-hover transition hover:bg-surface-alt">
                            <?php esc_html_e('Privacy Policy', 'dawp'); ?>
                        </a>
                    </div>
                </div>
            </aside>

            <div class="max-w-[65ch] divide-y divide-border">
                <?php foreach ($sections as $section) : ?>
                    <article class="py-7 first:pt-0">
                        <h2 class="font-heading text-xl font-extrabold text-foreground"><?php echo esc_html($section['title']); ?></h2>
                        <div class="mt-4 space-y-4 text-base leading-7 text-foreground-muted">
                            <?php foreach ($section['copy'] as $paragraph) : ?>
                                <p><?php echo esc_html($paragraph); ?></p>
                            <?php endforeach; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-surface py-14 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-md border border-border bg-background p-6 sm:p-8">
                <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <h2 class="font-heading text-2xl font-extrabold text-foreground"><?php esc_html_e('Questions about these terms?', 'dawp'); ?></h2>
                        <p class="mt-3 text-sm leading-7 text-foreground-muted">
                            <?php
                            echo wp_kses(
                                sprintf(
                                    /* translators: support email */
                                    __('Email %s and include your order number if your question is order-specific.', 'dawp'),
                                    '<a class="font-bold text-accent-hover underline decoration-accent/40 underline-offset-4 transition hover:text-foreground" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>'
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
                    <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center whitespace-nowrap rounded-sm bg-foreground px-6 text-sm font-bold text-white transition hover:bg-accent-hover">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
