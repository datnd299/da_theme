<?php
/**
 * Template Part: FAQ Page
 * Brand: UK Official Store
 * Description: Customer care FAQ aligned with the store's published policies.
 */

$brand_name     = 'UK Official Store';
$support_email  = 'support@ukofficialstore.com';
$store_address  = function_exists('dawp_store_address') ? dawp_store_address() : '';
$business_hours = 'Monday-Friday, 9:00 AM-6:00 PM PST';
$last_updated   = 'June 9, 2026';

$policy_links = array(
    'shipping' => home_url('/shipping-policy/'),
    'returns'  => home_url('/return-refund-policy/'),
    'privacy'  => home_url('/privacy-policy/'),
    'terms'    => home_url('/terms-conditions/'),
    'tracking' => home_url('/track-order/'),
    'contact'  => home_url('/contact-us/'),
);

$faq_sections = array(
    'orders-payment' => array(
        'number'    => '01',
        'label'     => 'Orders & Payment',
        'intro'     => 'Information to review before and immediately after placing an order.',
        'questions' => array(
            array(
                'question' => 'When is my order confirmed?',
                'answer'   => 'Your order is confirmed when you receive an order confirmation email. If an item becomes unavailable or an order cannot be fulfilled, we will contact you and issue any applicable refund to the original payment method.',
            ),
            array(
                'question' => 'Can I change or cancel my order?',
                'answer'   => 'Contact us at <a href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a> as soon as possible if you need to correct your shipping address, size, color, or other order details. We will do our best to help before dispatch, but changes or cancellations cannot be guaranteed once processing has begun or the order has shipped.',
            ),
            array(
                'question' => 'What will I be charged at checkout?',
                'answer'   => 'Product prices, applicable taxes, and any optional upgraded shipping cost are displayed before you submit payment. Standard U.S. shipping is free for every order, with no minimum purchase requirement. Available payment methods are shown securely at checkout.',
            ),
        ),
    ),
    'shipping-delivery' => array(
        'number'    => '02',
        'label'     => 'Shipping & Delivery',
        'intro'     => 'Clear shipping coverage, costs, delivery estimates, and tracking details.',
        'questions' => array(
            array(
                'question' => 'Where do you ship?',
                'answer'   => 'We currently ship exclusively within the United States. If a destination or carrier limitation prevents delivery to your address, the order will not be available for that location.',
            ),
            array(
                'question' => 'How much does shipping cost?',
                'answer'   => 'Standard U.S. shipping is free for every order. If optional upgraded shipping is available, its exact cost will be displayed at checkout before payment.',
            ),
            array(
                'question' => 'How long does delivery take?',
                'answer'   => 'Orders are processed within 1-3 business days. Standard U.S. transit takes 5-7 business days after dispatch, for an estimated total delivery time of 6-10 business days from purchase. Business days exclude weekends and U.S. public holidays.',
            ),
            array(
                'question' => 'How do I track my order?',
                'answer'   => 'Once your order ships, we will email you a tracking number and carrier link. You can also visit our <a href="' . esc_url($policy_links['tracking']) . '">Track Order page</a>. Tracking may take time to show movement after the carrier receives shipment information.',
            ),
            array(
                'question' => 'What should I do if my package is delayed or missing?',
                'answer'   => 'Check the carrier tracking first. If tracking stops updating or shows delivered but you cannot locate the package, contact us with your order number, checkout email, and delivery address so we can investigate with the carrier.',
            ),
        ),
    ),
    'returns-refunds' => array(
        'number'    => '03',
        'label'     => 'Returns & Refunds',
        'intro'     => 'Return eligibility, costs, steps, and refund timing.',
        'questions' => array(
            array(
                'question' => 'What is your return policy?',
                'answer'   => 'You may initiate an eligible return within 30 days of delivery. Items must be unworn, unused, unwashed, undamaged, and in their original condition with all original packaging, tags, labels, and included accessories. See the complete <a href="' . esc_url($policy_links['returns']) . '">Return &amp; Refund Policy</a> before sending an item back.',
            ),
            array(
                'question' => 'How do I start a return?',
                'answer'   => 'Email us or use our <a href="' . esc_url($policy_links['contact']) . '">Contact Us page</a> within 30 days of delivery. Include your order number, checkout email, item details, reason for return, and photos or videos if the item is damaged or incorrect. Wait for approval and return instructions before shipping the item.',
            ),
            array(
                'question' => 'Who pays for return shipping?',
                'answer'   => 'We cover return shipping for verified defective, damaged, or incorrect products. For buyer-remorse returns, including ordering the wrong size or changing your mind, the customer is responsible for the return shipping cost. We do not charge a restocking fee for eligible returns.',
            ),
            array(
                'question' => 'When will I receive my refund?',
                'answer'   => 'After your return arrives, we inspect it within 1-2 business days. If approved, the refund is issued to your original payment method within 7 business days. Your bank or payment provider may require additional time to post the funds.',
            ),
            array(
                'question' => 'Do you offer exchanges?',
                'answer'   => 'We do not process direct one-for-one exchanges. To order a different size, color, or model, return the eligible original item for a refund and place a new order.',
            ),
        ),
    ),
    'products' => array(
        'number'    => '04',
        'label'     => 'Products & Sizing',
        'intro'     => 'Helpful details for choosing and caring for your activewear.',
        'questions' => array(
            array(
                'question' => 'How do I choose the right size?',
                'answer'   => 'Review the size information shown on the relevant product page before ordering. If you are between sizes or need help interpreting a product measurement, contact our support team before checkout.',
            ),
            array(
                'question' => 'Will product colors look exactly the same on my screen?',
                'answer'   => 'We work to display product images, colors, sizes, materials, prices, and availability accurately. Screen settings and lighting can cause minor color differences. Please review the product description and images before purchasing.',
            ),
            array(
                'question' => 'What should I do if an item arrives damaged or incorrect?',
                'answer'   => 'Contact us within 30 days of delivery and include your order number plus clear photos of the item, packaging, and shipping label. After review, we will arrange an appropriate replacement or refund at no return-shipping cost to you.',
            ),
        ),
    ),
    'support' => array(
        'number'    => '05',
        'label'     => 'Customer Support',
        'intro'     => 'Verified contact channels and links to the store policies.',
        'questions' => array(
            array(
                'question' => 'How can I contact UK Official Store?',
                'answer'   => 'Email <a href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a> or use our <a href="' . esc_url($policy_links['contact']) . '">Contact Us page</a>. For order questions, include your order number and the email used at checkout.',
            ),
            array(
                'question' => 'When is customer support available?',
                'answer'   => 'Our customer service hours are ' . esc_html($business_hours) . '. We aim to reply within 1 business day. Requests received outside business hours are reviewed the next business day.',
            ),
            array(
                'question' => 'Where can I read the complete store policies?',
                'answer'   => 'Review our <a href="' . esc_url($policy_links['shipping']) . '">Shipping Policy</a>, <a href="' . esc_url($policy_links['returns']) . '">Return &amp; Refund Policy</a>, <a href="' . esc_url($policy_links['privacy']) . '">Privacy Policy</a>, and <a href="' . esc_url($policy_links['terms']) . '">Terms &amp; Conditions</a>. The complete policy pages control if a short FAQ answer and a policy page differ.',
            ),
        ),
    ),
);
?>

<div class="faq-policy-page bg-[#f8fafc] text-navy">
    <section class="relative overflow-hidden bg-navy py-20 text-white md:py-28">
        <div class="absolute inset-0 z-0">
            <div class="absolute right-0 top-0 -mr-64 -mt-64 h-[500px] w-[500px] rounded-full bg-blue/20 blur-[120px]"></div>
            <div class="absolute bottom-0 left-0 -mb-48 -ml-48 h-[400px] w-[400px] rounded-full bg-lime/10 blur-[100px]"></div>
        </div>
        <div class="relative z-10 mx-auto max-w-7xl px-6">
            <div class="max-w-4xl">
                <nav class="mb-8 flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-blue" aria-label="Breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="transition-colors hover:text-lime">Home</a>
                    <span class="text-white/30">/</span>
                    <span>Customer Care</span>
                </nav>
                <h1 class="mb-6 font-heading text-5xl font-black leading-tight md:text-6xl">Frequently Asked <span class="text-blue">Questions.</span></h1>
                <p class="max-w-3xl text-lg font-light leading-relaxed text-gray-400 md:text-xl">
                    Clear answers about ordering, payment, U.S. shipping, returns, refunds, products, and customer support.
                </p>
                <p class="mt-8 text-sm font-bold uppercase tracking-widest text-white/50">Last Updated: <?php echo esc_html($last_updated); ?></p>
            </div>
        </div>
    </section>

    <main class="py-16 md:py-24">
        <div class="mx-auto max-w-7xl px-6">
            <div class="flex flex-col gap-12 lg:flex-row lg:gap-20">
                <aside class="hidden lg:block lg:w-1/4">
                    <div class="space-y-1 lg:sticky lg:top-32">
                        <p class="mb-5 ml-4 text-[10px] font-black uppercase tracking-widest text-navy/30">FAQ Sections</p>
                        <?php foreach ($faq_sections as $section_id => $section) : ?>
                            <a href="#<?php echo esc_attr($section_id); ?>" class="group flex items-center justify-between rounded-xl border border-border bg-white p-3 transition-all duration-300 hover:border-blue hover:shadow-lg">
                                <span class="text-sm font-bold"><?php echo esc_html($section['label']); ?></span>
                                <span class="text-blue transition-transform group-hover:translate-x-1">&rarr;</span>
                            </a>
                        <?php endforeach; ?>

                        <div class="mt-8 rounded-2xl bg-navy p-6 text-white">
                            <p class="mb-3 text-[10px] font-black uppercase tracking-widest text-blue">Need Help?</p>
                            <p class="mb-5 text-sm leading-relaxed text-gray-300">Include your order number and checkout email for faster assistance.</p>
                            <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-block w-full rounded-xl bg-blue py-3 text-center text-xs font-bold text-white transition-all hover:bg-white hover:text-navy">Email Support</a>
                        </div>
                    </div>
                </aside>

                <div class="lg:w-3/4">
                    <section class="mb-16 rounded-2xl border border-border bg-white p-6 shadow-sm md:p-8" aria-labelledby="quick-policy-summary">
                        <p class="mb-3 text-xs font-black uppercase tracking-widest text-blue">Quick Policy Summary</p>
                        <h2 id="quick-policy-summary" class="font-heading text-3xl font-black text-navy">Important details before you order</h2>
                        <div class="mt-6 grid gap-4 sm:grid-cols-2">
                            <div class="rounded-xl border border-border bg-surface-alt p-5"><strong class="block text-navy">Shipping</strong><span class="mt-2 block text-sm leading-6 text-foreground-muted">Free standard U.S. shipping. Estimated total delivery: 6-10 business days.</span></div>
                            <div class="rounded-xl border border-border bg-surface-alt p-5"><strong class="block text-navy">Returns</strong><span class="mt-2 block text-sm leading-6 text-foreground-muted">Eligible returns may be initiated within 30 days of delivery.</span></div>
                            <div class="rounded-xl border border-border bg-surface-alt p-5"><strong class="block text-navy">Refunds</strong><span class="mt-2 block text-sm leading-6 text-foreground-muted">Approved refunds are issued to the original payment method within 7 business days.</span></div>
                            <div class="rounded-xl border border-border bg-surface-alt p-5"><strong class="block text-navy">Support</strong><span class="mt-2 block text-sm leading-6 text-foreground-muted">Email support is available during published business hours.</span></div>
                        </div>
                    </section>

                    <?php foreach ($faq_sections as $section_id => $section) : ?>
                        <section id="<?php echo esc_attr($section_id); ?>" class="faq-section scroll-mt-32" aria-labelledby="<?php echo esc_attr($section_id); ?>-heading">
                            <span class="section-number"><?php echo esc_html($section['number']); ?></span>
                            <h2 id="<?php echo esc_attr($section_id); ?>-heading"><?php echo esc_html($section['label']); ?></h2>
                            <p class="section-intro"><?php echo esc_html($section['intro']); ?></p>

                            <div class="mt-8 space-y-4">
                                <?php foreach ($section['questions'] as $faq) : ?>
                                    <details class="group overflow-hidden rounded-2xl border border-border bg-white transition-all open:border-blue/30 open:shadow-lg">
                                        <summary class="flex cursor-pointer list-none items-center justify-between gap-6 p-5 font-bold text-navy md:p-6">
                                            <span><?php echo esc_html($faq['question']); ?></span>
                                            <span class="shrink-0 text-xl text-blue transition-transform group-open:rotate-45" aria-hidden="true">+</span>
                                        </summary>
                                        <div class="faq-answer px-5 pb-5 leading-7 text-foreground-muted md:px-6 md:pb-6">
                                            <?php echo wp_kses_post($faq['answer']); ?>
                                        </div>
                                    </details>
                                <?php endforeach; ?>
                            </div>
                        </section>
                    <?php endforeach; ?>

                    <section class="rounded-2xl border border-border bg-white p-6 shadow-sm md:p-8" aria-labelledby="business-information">
                        <p class="mb-3 text-xs font-black uppercase tracking-widest text-blue">Verified Store Details</p>
                        <h2 id="business-information" class="font-heading text-3xl font-black text-navy">Business &amp; contact information</h2>
                        <dl class="mt-6 grid gap-4 md:grid-cols-2">
                            <div class="contact-card"><dt>Store Name</dt><dd><?php echo esc_html($brand_name); ?></dd></div>
                            <div class="contact-card"><dt>Support Email</dt><dd><a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a></dd></div>
                            <div class="contact-card"><dt>Business Address</dt><dd><?php echo esc_html($store_address); ?></dd></div>
                            <div class="contact-card"><dt>Customer Service Hours</dt><dd><?php echo esc_html($business_hours); ?></dd></div>
                        </dl>
                    </section>
                </div>
            </div>
        </div>
    </main>

    <section class="relative overflow-hidden bg-navy py-20 text-white">
        <div class="relative z-10 mx-auto max-w-5xl px-6 text-center">
            <h2 class="mb-6 font-heading text-4xl font-black md:text-5xl">Still need help?</h2>
            <p class="mx-auto mb-10 max-w-2xl text-lg leading-relaxed text-gray-400">Contact our support team with your order number and checkout email so we can review your request.</p>
            <div class="flex flex-col justify-center gap-4 sm:flex-row">
                <a href="mailto:<?php echo esc_attr($support_email); ?>" class="rounded-2xl bg-blue px-10 py-4 font-bold text-white transition-all hover:bg-white hover:text-navy">Email Support</a>
                <a href="<?php echo esc_url($policy_links['contact']); ?>" class="rounded-2xl border-2 border-white/20 px-10 py-4 font-bold text-white transition-all hover:border-white">Contact Us</a>
            </div>
        </div>
    </section>
</div>

<style>
    html { scroll-behavior: smooth; }
    .faq-policy-page .faq-section { margin-bottom: 4rem; padding-bottom: 4rem; border-bottom: 1px solid #e5e7eb; }
    .faq-policy-page .faq-section h2 { margin: 0 0 .75rem; color: #0b1f33; font-family: "Plus Jakarta Sans", "Inter", sans-serif; font-size: clamp(1.8rem, 4vw, 2.5rem); font-weight: 900; line-height: 1.2; }
    .faq-policy-page .section-number { display: inline-flex; align-items: center; justify-content: center; width: 2.5rem; height: 2.5rem; margin-bottom: 1rem; border-radius: 999px; background: #dbeafe; color: #2563eb; font-weight: 900; }
    .faq-policy-page .section-intro { color: #6b7280; line-height: 1.7; }
    .faq-policy-page details summary::-webkit-details-marker { display: none; }
    .faq-policy-page .faq-answer a, .faq-policy-page .contact-card a { color: #2563eb; font-weight: 700; overflow-wrap: anywhere; }
    .faq-policy-page .faq-answer a:hover, .faq-policy-page .contact-card a:hover { text-decoration: underline; }
    .faq-policy-page .contact-card { padding: 1.25rem; border: 1px solid #e5e7eb; border-radius: 1rem; background: #f8fafc; }
    .faq-policy-page .contact-card dt { margin-bottom: .4rem; color: #6b7280; font-size: .7rem; font-weight: 900; letter-spacing: .1em; text-transform: uppercase; }
    .faq-policy-page .contact-card dd { margin: 0; color: #0b1f33; font-weight: 700; line-height: 1.6; overflow-wrap: anywhere; }
</style>
