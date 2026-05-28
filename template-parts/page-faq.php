<?php
/**
 * Template Part: FAQ Page
 */

defined('ABSPATH') || exit;

$support_email = 'support@myveganblog.com';
$faq_image     = get_template_directory_uri() . '/assets/img/All_image/image copy 10.png';

$faq_groups = [
    [
        'id'          => 'orders-payments',
        'nav_label'   => __('Orders & Payments', 'dawp'),
        'title'       => __('Orders & Payments', 'dawp'),
        'description' => __('Common questions about placing orders, payment, order changes, and confirmations.', 'dawp'),
        'icon'        => '<rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line>',
        'items'       => [
            [
                'question' => __('What payment methods do you accept?', 'dawp'),
                'answer'   => __('Accepted payment methods are shown during checkout before you submit your order. Please review your billing details carefully because orders may be reviewed for payment authorization, fraud prevention, and shipping eligibility.', 'dawp'),
            ],
            [
                'question' => __('Can I change or cancel my order after placing it?', 'dawp'),
                'answer'   => __('Contact us as soon as possible if you need to request an order change or cancellation. We cannot guarantee changes after an order has entered processing or shipped.', 'dawp'),
            ],
            [
                'question' => __('Where can I find my order confirmation?', 'dawp'),
                'answer'   => __('Order confirmations are sent to the email address entered at checkout. If you cannot find the email, check your spam or promotions folder and contact support with the name and email used for the order.', 'dawp'),
            ],
        ],
    ],
    [
        'id'          => 'shipping-delivery',
        'nav_label'   => __('Shipping & Delivery', 'dawp'),
        'title'       => __('Shipping & Delivery', 'dawp'),
        'description' => __('Shipping coverage, fulfillment timing, tracking, and delivery issue guidance.', 'dawp'),
        'icon'        => '<rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle>',
        'items'       => [
            [
                'question' => __('Where does Myveganblog ship?', 'dawp'),
                'answer'   => __('Myveganblog currently ships eligible orders within the United States. Some remote areas, restricted addresses, freight forwarding addresses, P.O. boxes, APO/FPO addresses, or addresses with carrier limitations may not be available for every item.', 'dawp'),
            ],
            [
                'question' => __('How long does delivery usually take?', 'dawp'),
                'answer'   => __('Orders placed before the 5:00 PM, GMT-08:00 cutoff are typically processed within 1-2 business days, Monday-Friday. Transit time is generally 5-7 business days after handling is complete, so estimated total delivery time is usually 6-9 business days.', 'dawp'),
            ],
            [
                'question' => __('How do I track my order?', 'dawp'),
                'answer'   => __('Once your order ships, tracking details are sent to the email address used at checkout. Tracking may take 24-48 hours to show movement after the carrier receives the package.', 'dawp'),
                'link'     => [
                    'url'   => home_url('/track-order/'),
                    'label' => __('Track your order', 'dawp'),
                ],
            ],
            [
                'question' => __('Why did my order arrive in separate packages?', 'dawp'),
                'answer'   => __('Orders containing more than one item may ship in separate packages. Each package may have its own tracking number and may arrive on a different day.', 'dawp'),
            ],
            [
                'question' => __('What should I do if my package is delayed, lost, or damaged?', 'dawp'),
                'answer'   => __('Contact support with your order number and tracking information. For damaged packages, include clear photos of the item, packaging, and shipping label so we can review the issue.', 'dawp'),
            ],
        ],
    ],
    [
        'id'          => 'returns-refunds',
        'nav_label'   => __('Returns & Refunds', 'dawp'),
        'title'       => __('Returns & Refunds', 'dawp'),
        'description' => __('Return eligibility, return shipping responsibility, refunds, and exchanges.', 'dawp'),
        'icon'        => '<path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"></path><polyline points="3 3 3 8 8 8"></polyline>',
        'items'       => [
            [
                'question' => __('What is your return window?', 'dawp'),
                'answer'   => __('Eligible items may be returned within 30 days from the delivery date. Items must be unused, undamaged, in original condition, and returned with original packaging, tags, and included accessories where applicable.', 'dawp'),
            ],
            [
                'question' => __('How do I start a return?', 'dawp'),
                'answer'   => __('Email support with your order number, item name, reason for return, and photos if the item is damaged, defective, or incorrect. Please wait for return authorization and instructions before mailing anything back.', 'dawp'),
            ],
            [
                'question' => __('Who pays for return shipping?', 'dawp'),
                'answer'   => __('For approved returns caused by a defective, incorrect, or damaged product, Myveganblog will cover return shipping or provide a prepaid return label after review. For wrong size, wrong color, wrong model, preference change, or no longer wanting the item, the customer is responsible for the actual return shipping cost.', 'dawp'),
            ],
            [
                'question' => __('Do you charge a restocking fee?', 'dawp'),
                'answer'   => __('Myveganblog charges a $0 restocking fee for eligible returns approved under the Refund & Return Policy.', 'dawp'),
            ],
            [
                'question' => __('How long does a refund take?', 'dawp'),
                'answer'   => __('After your return is received, inspected, and approved, the refund is processed to the original payment method. Refund posting may take up to 7 days depending on your bank or payment provider.', 'dawp'),
            ],
        ],
    ],
    [
        'id'          => 'products-sizing',
        'nav_label'   => __('Products & Sizing', 'dawp'),
        'title'       => __('Products & Sizing', 'dawp'),
        'description' => __('Product details, sizing checks, and item condition guidance before ordering.', 'dawp'),
        'icon'        => '<path d="M20.24 12.24a6 6 0 0 0-8.49-8.49L5 10.5V19h8.5z"></path><line x1="16" y1="8" x2="2" y2="22"></line><line x1="17.5" y1="15" x2="9" y2="15"></line>',
        'items'       => [
            [
                'question' => __('What should I review before ordering shoes, handbags, or accessories?', 'dawp'),
                'answer'   => __('Review the product description, available sizes, color options, material or finish notes, dimensions for handbags, closure and strap details where applicable, and care instructions before placing your order.', 'dawp'),
            ],
            [
                'question' => __('How can I choose the right size?', 'dawp'),
                'answer'   => __('Use the size, fit, and product notes shown on the product page. If anything is unclear, contact us before ordering and we will help you choose the right option.', 'dawp'),
            ],
            [
                'question' => __('What condition must shoes, bags, and accessories be in for return?', 'dawp'),
                'answer'   => __('Footwear must be unworn, undamaged, free of outdoor wear, stains, odor, heavy creasing, or sole marks. Bags and accessories must be unused, undamaged, and returned with original packaging, tags, dust bags, straps, or included accessories where applicable.', 'dawp'),
            ],
        ],
    ],
    [
        'id'          => 'support-policies',
        'nav_label'   => __('Support & Policies', 'dawp'),
        'title'       => __('Support & Policies', 'dawp'),
        'description' => __('Where to get help and where to review detailed store policies.', 'dawp'),
        'icon'        => '<circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 1 1 5.82 1c0 2-3 2-3 4"></path><line x1="12" y1="17" x2="12.01" y2="17"></line>',
        'items'       => [
            [
                'question' => __('How can I contact customer support?', 'dawp'),
                'answer'   => __('Email support@myveganblog.com or use the Contact Us page. Include your order number if your question is about a recent purchase.', 'dawp'),
            ],
            [
                'question' => __('When is customer support available?', 'dawp'),
                'answer'   => __('Business Hours: Monday-Friday, 9:00 AM-5:00 PM, GMT-08:00.', 'dawp'),
            ],
            [
                'question' => __('Where can I read the full store policies?', 'dawp'),
                'answer'   => __('Detailed shipping, return, privacy, and terms information is available on the policy pages linked below.', 'dawp'),
            ],
        ],
    ],
];
?>

<section class="relative overflow-hidden bg-foreground py-16 text-white md:py-24">
    <div class="absolute inset-0">
        <img src="<?php echo esc_url($faq_image); ?>" alt="<?php esc_attr_e('Women\'s fashion hats and accessories for FAQ banner', 'dawp'); ?>" class="h-full w-full object-cover opacity-42" loading="eager">
        <div class="absolute inset-0 bg-foreground/72"></div>
    </div>
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="relative text-center">
            <span class="font-medium tracking-widest uppercase text-sm mb-4 block text-white/82"><?php esc_html_e('Customer Help', 'dawp'); ?></span>
            <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl text-white font-bold mb-6 tracking-tight"><?php esc_html_e('Frequently Asked Questions', 'dawp'); ?></h1>
            <p class="text-white/82 text-lg max-w-3xl mx-auto leading-relaxed">
                <?php esc_html_e('Quick answers about Myveganblog orders, shipping, delivery, returns, refunds, products, and customer support.', 'dawp'); ?>
            </p>
        </div>
    </div>
</section>

<section class="bg-surface py-16 md:py-24">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="grid lg:grid-cols-12 gap-8 items-start">
            <div class="hidden lg:block lg:col-span-3 sticky top-24">
                <nav class="space-y-3" aria-label="<?php esc_attr_e('FAQ sections', 'dawp'); ?>">
                    <?php foreach ($faq_groups as $group) : ?>
                        <a href="#<?php echo esc_attr($group['id']); ?>" class="block p-4 rounded-lg bg-background border border-border hover:border-accent hover:text-accent transition-all font-medium"><?php echo esc_html($group['nav_label']); ?></a>
                    <?php endforeach; ?>
                </nav>
            </div>

            <div class="lg:col-span-9 space-y-8">
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="bg-background p-6 rounded-lg border border-border shadow-card">
                        <p class="text-accent font-semibold uppercase text-xs tracking-widest mb-2"><?php esc_html_e('Delivery', 'dawp'); ?></p>
                        <p class="text-foreground text-2xl font-bold"><?php esc_html_e('6-9 Business Days', 'dawp'); ?></p>
                        <p class="text-foreground-muted text-sm mt-2"><?php esc_html_e('Typical total timeline.', 'dawp'); ?></p>
                    </div>
                    <div class="bg-background p-6 rounded-lg border border-border shadow-card">
                        <p class="text-accent font-semibold uppercase text-xs tracking-widest mb-2"><?php esc_html_e('Returns', 'dawp'); ?></p>
                        <p class="text-foreground text-2xl font-bold"><?php esc_html_e('30 Days', 'dawp'); ?></p>
                        <p class="text-foreground-muted text-sm mt-2"><?php esc_html_e('From delivery date.', 'dawp'); ?></p>
                    </div>
                    <div class="bg-background p-6 rounded-lg border border-border shadow-card">
                        <p class="text-accent font-semibold uppercase text-xs tracking-widest mb-2"><?php esc_html_e('Restocking Fee', 'dawp'); ?></p>
                        <p class="text-foreground text-2xl font-bold"><?php esc_html_e('$0', 'dawp'); ?></p>
                        <p class="text-foreground-muted text-sm mt-2"><?php esc_html_e('For eligible returns.', 'dawp'); ?></p>
                    </div>
                    <div class="bg-background p-6 rounded-lg border border-border shadow-card">
                        <p class="text-accent font-semibold uppercase text-xs tracking-widest mb-2"><?php esc_html_e('Support', 'dawp'); ?></p>
                        <p class="text-foreground text-2xl font-bold"><?php esc_html_e('Mon-Fri', 'dawp'); ?></p>
                        <p class="text-foreground-muted text-sm mt-2"><?php esc_html_e('9:00 AM-5:00 PM, GMT-08:00.', 'dawp'); ?></p>
                    </div>
                </div>

                <?php foreach ($faq_groups as $group) : ?>
                    <section id="<?php echo esc_attr($group['id']); ?>" class="bg-background p-8 md:p-12 rounded-lg shadow-card border border-border">
                        <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-8">
                            <div class="w-12 h-12 bg-accent-soft rounded-full flex items-center justify-center text-accent shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><?php echo wp_kses($group['icon'], ['rect' => ['x' => true, 'y' => true, 'width' => true, 'height' => true, 'rx' => true, 'ry' => true], 'line' => ['x1' => true, 'y1' => true, 'x2' => true, 'y2' => true], 'polygon' => ['points' => true], 'circle' => ['cx' => true, 'cy' => true, 'r' => true], 'path' => ['d' => true], 'polyline' => ['points' => true]]); ?></svg>
                            </div>
                            <div>
                                <h2 class="font-heading text-3xl text-foreground font-semibold"><?php echo esc_html($group['title']); ?></h2>
                                <p class="text-foreground-muted mt-2"><?php echo esc_html($group['description']); ?></p>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <?php foreach ($group['items'] as $item) : ?>
                                <details class="group bg-surface rounded-lg border border-border overflow-hidden">
                                    <summary class="flex cursor-pointer list-none items-center justify-between gap-6 p-5 md:p-6 text-left font-semibold text-foreground transition-colors hover:text-accent">
                                        <span><?php echo esc_html($item['question']); ?></span>
                                        <svg class="text-accent shrink-0 transition-transform group-open:rotate-180" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                    </summary>
                                    <div class="border-t border-border px-5 py-5 md:px-6 text-foreground-muted leading-relaxed">
                                        <p><?php echo esc_html($item['answer']); ?></p>
                                        <?php if (!empty($item['link'])) : ?>
                                            <a href="<?php echo esc_url($item['link']['url']); ?>" class="mt-4 inline-flex text-accent hover:underline font-medium"><?php echo esc_html($item['link']['label']); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </details>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php endforeach; ?>

                <div class="bg-surface p-10 rounded-lg border border-dashed border-accent/30">
                    <h2 class="font-heading text-3xl text-foreground font-semibold mb-6"><?php esc_html_e('Still Need Help?', 'dawp'); ?></h2>
                    <dl class="grid md:grid-cols-2 gap-4 text-sm">
                        <div class="bg-background p-5 rounded-lg border border-border">
                            <dt class="text-accent font-semibold uppercase text-xs tracking-widest mb-2"><?php esc_html_e('Store Name', 'dawp'); ?></dt>
                            <dd class="text-foreground font-semibold"><?php esc_html_e('Myveganblog', 'dawp'); ?></dd>
                        </div>
                        <div class="bg-background p-5 rounded-lg border border-border">
                            <dt class="text-accent font-semibold uppercase text-xs tracking-widest mb-2"><?php esc_html_e('Email', 'dawp'); ?></dt>
                            <dd><a href="<?php echo esc_url('mailto:' . $support_email); ?>" class="text-foreground font-semibold hover:text-accent"><?php echo esc_html($support_email); ?></a></dd>
                        </div>
                        <div class="bg-background p-5 rounded-lg border border-border md:col-span-2">
                            <dt class="text-accent font-semibold uppercase text-xs tracking-widest mb-2"><?php esc_html_e('Business Hours', 'dawp'); ?></dt>
                            <dd class="text-foreground font-semibold"><?php esc_html_e('Monday-Friday, 9:00 AM-5:00 PM, GMT-08:00', 'dawp'); ?></dd>
                        </div>
                    </dl>
                    <div class="mt-8 flex flex-col sm:flex-row gap-4">
                        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex items-center justify-center bg-accent text-white px-8 py-3 rounded-full font-medium hover:bg-accent-hover transition-colors shadow-lg shadow-accent/20"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
                        <a href="<?php echo esc_url('mailto:' . $support_email); ?>" class="inline-flex items-center justify-center bg-white text-foreground border border-border px-8 py-3 rounded-full font-medium hover:bg-surface transition-colors"><?php esc_html_e('Email Support', 'dawp'); ?></a>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>" class="bg-background p-5 rounded-lg border border-border hover:border-accent hover:text-accent transition-all font-medium"><?php esc_html_e('Shipping Policy', 'dawp'); ?></a>
                    <a href="<?php echo esc_url(home_url('/refund-return-policy/')); ?>" class="bg-background p-5 rounded-lg border border-border hover:border-accent hover:text-accent transition-all font-medium"><?php esc_html_e('Refund & Return Policy', 'dawp'); ?></a>
                    <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>" class="bg-background p-5 rounded-lg border border-border hover:border-accent hover:text-accent transition-all font-medium"><?php esc_html_e('Privacy Policy', 'dawp'); ?></a>
                    <a href="<?php echo esc_url(home_url('/terms-conditions/')); ?>" class="bg-background p-5 rounded-lg border border-border hover:border-accent hover:text-accent transition-all font-medium"><?php esc_html_e('Terms & Conditions', 'dawp'); ?></a>
                </div>
            </div>
        </div>
    </div>
</section>
