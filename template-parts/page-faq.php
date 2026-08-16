<?php
/**
 * Template Part: FAQ Page
 */

defined('ABSPATH') || exit;

$support_email  = 'support@smartbasketco.com';
$store_name     = 'Smartbasketco';
$store_address  = function_exists('dawp_store_address') ? dawp_store_address() : '';
$updated_date   = 'May 28, 2026';
$business_hours = __('Monday-Friday, 9:00 AM-5:00 PM, GMT-08:00', 'dawp');
$contact_url    = home_url('/contact-us/');
$faq_image      = get_template_directory_uri() . '/assets/img/All_image/image copy 10.png';

$faq_highlights = [
    [
        'label' => __('Delivery', 'dawp'),
        'value' => __('6-10 Business Days', 'dawp'),
        'copy'  => __('Estimated total delivery window.', 'dawp'),
    ],
    [
        'label' => __('Returns', 'dawp'),
        'value' => __('30 Days', 'dawp'),
        'copy'  => __('From the delivery date.', 'dawp'),
    ],
    [
        'label' => __('Restocking Fee', 'dawp'),
        'value' => __('Free', 'dawp'),
        'copy'  => __('For eligible approved returns.', 'dawp'),
    ],
    [
        'label' => __('Support', 'dawp'),
        'value' => __('Mon-Fri', 'dawp'),
        'copy'  => __('9:00 AM-5:00 PM, GMT-08:00.', 'dawp'),
    ],
];

$faq_groups = [
    [
        'id'          => 'orders-payments',
        'number'      => '01',
        'nav_label'   => __('Orders & Payments', 'dawp'),
        'title'       => __('Orders & Payments', 'dawp'),
        'description' => __('Common questions about placing orders, payment, order changes, and confirmations.', 'dawp'),
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
        'number'      => '02',
        'nav_label'   => __('Shipping & Delivery', 'dawp'),
        'title'       => __('Shipping & Delivery', 'dawp'),
        'description' => __('Shipping coverage, fulfillment timing, tracking, and delivery issue guidance.', 'dawp'),
        'items'       => [
            [
                'question' => __('Where does Smartbasketco ship?', 'dawp'),
                'answer'   => __('Smartbasketco currently ships eligible orders within the United States. If a product, destination, or carrier limitation prevents delivery to your specific address, the order will not be available for that location at checkout.', 'dawp'),
            ],
            [
                'question' => __('How long does delivery usually take?', 'dawp'),
                'answer'   => __('Orders placed before the 5:00 PM, GMT-08:00 cutoff are typically processed within 1-3 business days, Monday-Friday. Transit time is generally 5-7 business days after handling is complete, so estimated total delivery time is usually 6-10 business days.', 'dawp'),
            ],
            [
                'question' => __('How much does standard U.S. shipping cost?', 'dawp'),
                'answer'   => __('Standard U.S. shipping is free for all orders nationwide. If optional upgraded shipping is available for your destination, the exact cost will be displayed at checkout before payment.', 'dawp'),
            ],
            [
                'question' => __('How do I track my order?', 'dawp'),
                'answer'   => __('Once your order ships, tracking details are sent to the email address used at checkout. Tracking may take 24-48 hours to show movement after the carrier receives the package.', 'dawp'),
                'link'     => [
                    'url'   => home_url('/track-order/'),
                    'label' => __('Track Order', 'dawp'),
                ],
            ],
            [
                'question' => __('Why did my order arrive in separate packages?', 'dawp'),
                'answer'   => __('Orders containing more than one item may ship in separate packages if items are prepared from different fulfillment batches or require distinct packing methods. Each package may have its own tracking number and may arrive on a different day.', 'dawp'),
            ],
            [
                'question' => __('What should I do if my package is delayed, lost, or damaged?', 'dawp'),
                'answer'   => __('Contact support with your order number, checkout email, full delivery address, and tracking information. For damaged packages, include clear photos of the item, packaging, and shipping label so we can review the issue with the carrier.', 'dawp'),
            ],
        ],
    ],
    [
        'id'          => 'returns-refunds',
        'number'      => '03',
        'nav_label'   => __('Returns & Refunds', 'dawp'),
        'title'       => __('Returns & Refunds', 'dawp'),
        'description' => __('Return eligibility, return shipping responsibility, refunds, and exchanges.', 'dawp'),
        'items'       => [
            [
                'question' => __('What is your return window?', 'dawp'),
                'answer'   => __('Eligible items may be returned within 30 days from the delivery date. Items must be unworn, unused, undamaged, in original condition, and returned with original packaging, tags, labels, certificates, care cards, pouches, boxes, and included accessories where applicable.', 'dawp'),
            ],
            [
                'question' => __('How do I start a return?', 'dawp'),
                'answer'   => __('Email support or use the Contact Us page with your order number, checkout email, item name, return reason, and photos or videos if the item is damaged, defective, or incorrect. Please wait for return authorization and instructions before mailing anything back.', 'dawp'),
            ],
            [
                'question' => __('Who pays for return shipping?', 'dawp'),
                'answer'   => __('For approved returns caused by a defective, incorrect, or damaged product, Smartbasketco covers the return shipping cost and provides a prepaid shipping label by email. For wrong size, wrong color, wrong model, preference change, or no longer wanting the item, the actual return shipping cost is deducted from the final refund amount.', 'dawp'),
            ],
            [
                'question' => __('Do you charge a restocking fee?', 'dawp'),
                'answer'   => __('No. Smartbasketco does not charge any restocking fee for eligible approved returns.', 'dawp'),
            ],
            [
                'question' => __('How long does a refund take?', 'dawp'),
                'answer'   => __('After your return package is received and inspected, approved refunds are processed automatically back to the original payment method within 7 business days. If you have not received your refund after 15 business days of approval, please contact support after checking with your bank or card provider.', 'dawp'),
            ],
            [
                'question' => __('Do you offer exchanges?', 'dawp'),
                'answer'   => __('We do not process direct one-for-one exchanges. To get a different size, color, or model, return the original item through the approved return process and place a new order on the website.', 'dawp'),
            ],
        ],
    ],
    [
        'id'          => 'products-sizing',
        'number'      => '04',
        'nav_label'   => __('Products & Sizing', 'dawp'),
        'title'       => __('Products & Sizing', 'dawp'),
        'description' => __('Product details, sizing checks, and item condition guidance before ordering.', 'dawp'),
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
                'answer'   => __('Footwear must be unworn and free of outdoor wear, stains, odor, heavy creasing, or sole marks. Handbags and accessories must be unused, undamaged, and returned with original packaging, tags, straps, dust bags, or included accessories where applicable.', 'dawp'),
            ],
        ],
    ],
    [
        'id'          => 'support-policies',
        'number'      => '05',
        'nav_label'   => __('Support & Policies', 'dawp'),
        'title'       => __('Support & Policies', 'dawp'),
        'description' => __('Where to get help and where to review detailed store policies.', 'dawp'),
        'items'       => [
            [
                'question' => __('How can I contact customer support?', 'dawp'),
                'answer'   => __('Email support@smartbasketco.com or use the Contact Us page. Include your order number if your question is about a recent purchase.', 'dawp'),
            ],
            [
                'question' => __('When is customer support available?', 'dawp'),
                'answer'   => __('Customer support is available Monday-Friday, 9:00 AM-5:00 PM, GMT-08:00. We aim to reply within 1 business day, though response times may vary during weekends, holidays, or high-volume periods.', 'dawp'),
            ],
            [
                'question' => __('Where can I read the full store policies?', 'dawp'),
                'answer'   => __('Detailed shipping, return, privacy, and terms information is available on the policy pages linked below.', 'dawp'),
            ],
        ],
    ],
];

?>

<main class="bg-[#F8F3EC] text-[#2F2A28]">
    <section class="relative overflow-hidden bg-[#241F1D] px-4 py-20 text-white sm:px-6 lg:px-8 lg:py-24">
        <div class="absolute inset-0 opacity-35">
            <img src="<?php echo esc_url($faq_image); ?>" alt="<?php esc_attr_e('Women\'s fashion hats and accessories for FAQ banner', 'dawp'); ?>" class="h-full w-full object-cover" loading="eager">
            <div class="absolute inset-0 bg-[linear-gradient(90deg,rgba(36,31,29,0.98)_0%,rgba(36,31,29,0.78)_52%,rgba(36,31,29,0.42)_100%)]"></div>
        </div>
        <div class="relative mx-auto grid w-[min(100%,1180px)] gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:items-end">
            <div class="max-w-3xl">
                <span class="inline-flex border-b border-[#E8D8C8] pb-2 text-xs font-bold uppercase tracking-[0.18em] text-[#E8D8C8]"><?php esc_html_e('Customer Help', 'dawp'); ?></span>
                <h1 class="mt-7 font-serif text-4xl leading-tight text-white sm:text-6xl"><?php esc_html_e('Frequently asked questions.', 'dawp'); ?></h1>
                <p class="mt-6 max-w-2xl text-base leading-8 text-white/78 sm:text-lg">
                    <?php esc_html_e('Quick answers about Smartbasketco orders, shipping, delivery, returns, refunds, products, and customer support.', 'dawp'); ?>
                </p>
            </div>
            <div class="rounded-[28px] border border-white/18 bg-white/10 p-6 backdrop-blur sm:p-8">
                <dl class="grid gap-5 sm:grid-cols-2">
                    <div>
                        <dt class="text-xs font-bold uppercase tracking-[0.18em] text-[#E8D8C8]"><?php esc_html_e('Store', 'dawp'); ?></dt>
                        <dd class="mt-2 font-serif text-2xl text-white"><?php echo esc_html($store_name); ?></dd>
                    </div>
                    <div>
                        <dt class="text-xs font-bold uppercase tracking-[0.18em] text-[#E8D8C8]"><?php esc_html_e('Updated', 'dawp'); ?></dt>
                        <dd class="mt-2 font-serif text-2xl text-white"><?php echo esc_html($updated_date); ?></dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>

    <section class="bg-white px-4 py-10 sm:px-6 lg:px-8">
        <div class="faq-highlight-slider mx-auto flex w-[min(100%,1180px)] snap-x snap-mandatory gap-4 overflow-x-auto pb-2 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden md:grid md:grid-cols-4 md:overflow-visible md:pb-0" aria-label="<?php esc_attr_e('FAQ quick highlights', 'dawp'); ?>">
            <?php foreach ($faq_highlights as $highlight) : ?>
                <div class="faq-highlight-slide min-w-[82%] snap-center rounded-[28px] border border-[#D8CEC6] bg-[#F8F3EC] p-6 sm:min-w-[46%] md:min-w-0">
                    <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#C98A8A]"><?php echo esc_html($highlight['label']); ?></span>
                    <p class="mt-3 font-serif text-3xl text-[#2F2A28]"><?php echo esc_html($highlight['value']); ?></p>
                    <p class="mt-3 text-sm leading-6 text-[#6F625D]"><?php echo esc_html($highlight['copy']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto grid w-[min(100%,1180px)] gap-8 lg:grid-cols-[280px_1fr]">
            <aside class="h-fit rounded-[28px] border border-[#D8CEC6] bg-white p-6 shadow-[0_12px_30px_rgba(47,42,40,0.06)] lg:sticky lg:top-24">
                <h2 class="font-serif text-2xl text-[#2F2A28]"><?php esc_html_e('FAQ Topics', 'dawp'); ?></h2>
                <nav class="mt-6 space-y-3" aria-label="<?php esc_attr_e('FAQ sections', 'dawp'); ?>">
                    <?php foreach ($faq_groups as $group) : ?>
                        <a href="#<?php echo esc_attr($group['id']); ?>" class="block rounded-2xl border border-[#D8CEC6] bg-white px-4 py-3 text-sm font-bold text-[#2F2A28] transition-colors hover:border-[#C98A8A] hover:text-[#C98A8A]"><?php echo esc_html($group['nav_label']); ?></a>
                    <?php endforeach; ?>
                </nav>
                <div class="mt-6 rounded-2xl bg-[#F4ECE5] p-5">
                    <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#C98A8A]"><?php esc_html_e('Support', 'dawp'); ?></span>
                    <a href="<?php echo esc_url('mailto:' . $support_email); ?>" class="mt-2 block break-words text-sm font-bold text-[#2F2A28] transition-colors hover:text-[#C98A8A]"><?php echo esc_html($support_email); ?></a>
                </div>
            </aside>

            <div class="space-y-5">
                <?php foreach ($faq_groups as $group) : ?>
                    <section id="<?php echo esc_attr($group['id']); ?>" class="rounded-[28px] border border-[#D8CEC6] bg-white p-6 shadow-[0_12px_30px_rgba(47,42,40,0.06)] sm:p-8 lg:p-10">
                        <div class="flex flex-col gap-4 sm:flex-row sm:items-start">
                            <span class="inline-flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-[#F4ECE5] font-serif text-xl text-[#C98A8A]"><?php echo esc_html($group['number']); ?></span>
                            <div>
                                <h2 class="font-serif text-3xl leading-tight text-[#2F2A28] sm:text-4xl"><?php echo esc_html($group['title']); ?></h2>
                                <p class="mt-4 text-base leading-8 text-[#6F625D]"><?php echo esc_html($group['description']); ?></p>
                            </div>
                        </div>

                        <div class="mt-7 space-y-4">
                            <?php foreach ($group['items'] as $item) : ?>
                                <details class="group rounded-2xl border border-[#E8D8C8] bg-white">
                                    <summary class="flex min-h-16 cursor-pointer list-none items-center justify-between gap-5 px-5 py-4 text-left text-base font-bold leading-7 text-[#2F2A28] transition-colors hover:text-[#C98A8A] sm:px-6">
                                        <span><?php echo esc_html($item['question']); ?></span>
                                        <span class="relative flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#F4ECE5] text-[#C98A8A]" aria-hidden="true">
                                            <span class="absolute h-0.5 w-3 bg-current"></span>
                                            <span class="absolute h-3 w-0.5 bg-current transition-transform group-open:rotate-90 group-open:opacity-0"></span>
                                        </span>
                                    </summary>
                                    <div class="border-t border-[#E8D8C8] px-5 py-5 text-base leading-8 text-[#6F625D] sm:px-6">
                                        <p><?php echo esc_html($item['answer']); ?></p>
                                        <?php if (!empty($item['link'])) : ?>
                                            <a href="<?php echo esc_url($item['link']['url']); ?>" class="mt-4 inline-flex min-h-11 items-center justify-center rounded-full border border-[#2F2A28] px-6 py-3 text-sm font-bold text-[#2F2A28] transition-colors hover:bg-[#2F2A28] hover:text-white"><?php echo esc_html($item['link']['label']); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </details>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-white px-4 py-14 sm:px-6 lg:px-8 lg:py-16">
        <div class="mx-auto grid w-[min(100%,1180px)] gap-6 rounded-[28px] bg-[#2F2A28] p-8 text-white sm:p-10 lg:grid-cols-[1fr_auto] lg:items-center lg:p-12">
            <div>
                <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#E8D8C8]"><?php esc_html_e('Still Need Help?', 'dawp'); ?></span>
                <h2 class="mt-4 font-serif text-3xl leading-tight sm:text-4xl"><?php esc_html_e('Customer support is available on business days.', 'dawp'); ?></h2>
                <p class="mt-4 max-w-2xl text-sm leading-7 text-white/76">
                    <?php echo esc_html(sprintf(__('Email %s during Business Hours: %s.', 'dawp'), $support_email, $business_hours)); ?>
                </p>
            </div>
            <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#C98A8A] px-7 py-3 text-sm font-bold text-white transition-colors hover:bg-white hover:text-[#2F2A28]">
                <?php esc_html_e('Contact Support', 'dawp'); ?>
            </a>
        </div>
    </section>

    <section class="px-4 pb-16 sm:px-6 lg:px-8 lg:pb-20">
        <div class="mx-auto w-[min(100%,1180px)] rounded-[28px] border border-[#D8CEC6] bg-white p-6 shadow-[0_12px_30px_rgba(47,42,40,0.06)] sm:p-8 lg:p-10">
            <h2 class="font-serif text-3xl leading-tight text-[#2F2A28] sm:text-4xl"><?php esc_html_e('Contact Information', 'dawp'); ?></h2>
            <p class="mt-5 text-base leading-8 text-[#6F625D]"><?php esc_html_e('For questions about an order, product, shipment, return, refund, or store policy, please contact us through the official business channels below.', 'dawp'); ?></p>
            <dl class="mt-7 grid gap-4 md:grid-cols-2">
                <div class="rounded-2xl border border-[#E8D8C8] bg-[#F8F3EC] p-5">
                    <dt class="text-sm font-bold text-[#2F2A28]"><?php esc_html_e('Store Name', 'dawp'); ?></dt>
                    <dd class="mt-3 text-sm leading-7 text-[#6F625D]"><?php echo esc_html($store_name); ?></dd>
                </div>
                <div class="rounded-2xl border border-[#E8D8C8] bg-[#F8F3EC] p-5">
                    <dt class="text-sm font-bold text-[#2F2A28]"><?php esc_html_e('Email', 'dawp'); ?></dt>
                    <dd class="mt-3 break-words text-sm leading-7 text-[#6F625D]"><a href="<?php echo esc_url('mailto:' . $support_email); ?>" class="transition-colors hover:text-[#C98A8A]"><?php echo esc_html($support_email); ?></a></dd>
                </div>
                <div class="rounded-2xl border border-[#E8D8C8] bg-[#F8F3EC] p-5">
                    <dt class="text-sm font-bold text-[#2F2A28]"><?php esc_html_e('Address', 'dawp'); ?></dt>
                    <dd class="mt-3 text-sm leading-7 text-[#6F625D]"><?php echo esc_html($store_address); ?></dd>
                </div>
                <div class="rounded-2xl border border-[#E8D8C8] bg-[#F8F3EC] p-5">
                    <dt class="text-sm font-bold text-[#2F2A28]"><?php esc_html_e('Business Hours', 'dawp'); ?></dt>
                    <dd class="mt-3 text-sm leading-7 text-[#6F625D]"><?php echo esc_html($business_hours); ?></dd>
                </div>
            </dl>
        </div>
    </section>
</main>
