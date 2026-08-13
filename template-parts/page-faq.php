<?php
/**
 * FAQ template part.
 *
 * @package dawp
 */

$support_email     = 'support@meridova.net';
$support_address   = dawp_get_store_address();
$operating_hours   = 'Monday - Friday, 9:00 AM - 6:00 PM EST';
$response_time     = __('within 1 business day', 'dawp');

$faq_sections = [
    [
        'id'      => 'shopping',
        'eyebrow' => __('Shopping & Products', 'dawp'),
        'title'   => __('Product details before checkout.', 'dawp'),
        'items'   => [
            [
                'question' => __('What does Meridova sell?', 'dawp'),
                'answer'   => __('Meridova offers home essentials, beauty and personal care accessories, fashion accessories, lifestyle items, and giftable everyday finds. Product pages include the available details customers need to review features, included items, materials, sizing, and care notes where relevant.', 'dawp'),
            ],
            [
                'question' => __('Are your products medical treatments or branded replicas?', 'dawp'),
                'answer'   => __('No. Our store is focused on mainstream everyday essentials and lifestyle products. We do not position products as medical treatments, miracle solutions, counterfeit goods, luxury replicas, or unsupported branded items.', 'dawp'),
            ],
            [
                'question' => __('How should I choose the right product?', 'dawp'),
                'answer'   => __('Please review each product page for the item type, intended use, key features, sizing or material details where relevant, included items, and care or use notes. Contact support before ordering if you need help with a product detail.', 'dawp'),
            ],
        ],
    ],
    [
        'id'      => 'orders',
        'eyebrow' => __('Orders & Payment', 'dawp'),
        'title'   => __('Checkout, confirmations, and order accuracy.', 'dawp'),
        'items'   => [
            [
                'question' => __('What happens after I place an order?', 'dawp'),
                'answer'   => __('After checkout, your order is reviewed and prepared for fulfillment. Orders placed after the 5:00 PM (GMT-08:00) Pacific Standard Time cutoff begin processing the following business day. Tracking is sent to the email address provided at checkout once the order is dispatched.', 'dawp'),
            ],
            [
                'question' => __('Can I change my shipping address after ordering?', 'dawp'),
                'answer'   => __('Contact support as soon as possible with your order number and checkout email address. We cannot guarantee changes after an order begins fulfillment or has shipped, so accurate checkout information is important.', 'dawp'),
            ],
            [
                'question' => __('How are payments processed?', 'dawp'),
                'answer'   => __('Payments are processed through certified third-party payment gateways such as Stripe or PayPal. Meridova does not store, collect, or retain raw credit card numbers or payment credentials on our servers.', 'dawp'),
            ],
            [
                'question' => __('Why was my order not accepted or delayed?', 'dawp'),
                'answer'   => __('Orders may be delayed or unable to be fulfilled because of incorrect shipping information, payment review, suspected fraud, inventory issues, pricing errors, carrier interruptions, holidays, or other fulfillment restrictions.', 'dawp'),
            ],
        ],
    ],
    [
        'id'      => 'shipping',
        'eyebrow' => __('Shipping & Tracking', 'dawp'),
        'title'   => __('Delivery timing and shipment updates.', 'dawp'),
        'items'   => [
            [
                'question' => __('Where do you ship?', 'dawp'),
                'answer'   => __('Meridova currently ships exclusively within the United States. If a product, destination, or carrier limitation prevents delivery to a specific address, the order will not be available for that location and the customer will be notified at checkout before payment is processed.', 'dawp'),
            ],
            [
                'question' => __('How much does standard shipping cost?', 'dawp'),
                'answer'   => __('Standard U.S. shipping is completely free for all orders nationwide, with no minimum purchase requirement. If optional upgraded shipping is available, the exact cost is displayed at checkout before payment is completed.', 'dawp'),
            ],
            [
                'question' => __('How long does order processing take?', 'dawp'),
                'answer'   => __('Order handling time is 1-3 business days, Monday through Friday, excluding standard U.S. public holidays. Orders placed after the 5:00 PM (GMT-08:00) Pacific Standard Time cutoff begin processing the following business day.', 'dawp'),
            ],
            [
                'question' => __('How long does delivery take?', 'dawp'),
                'answer'   => __('Standard transit time is 5-7 business days, Monday to Friday. Estimated delivery is 6-10 business days total from the date of purchase. Extreme weather, carrier capacity issues, regional holidays, incorrect addresses, and other carrier conditions may affect timing.', 'dawp'),
            ],
            [
                'question' => __('When will I receive tracking information?', 'dawp'),
                'answer'   => __('Once your order is dispatched, an automated shipping confirmation email with a direct tracking link and courier details is sent to the registered email address. Please allow time for the carrier tracking page to update after the label is created or the package is scanned.', 'dawp'),
            ],
            [
                'question' => __('Where can I track my order?', 'dawp'),
                'answer'   => __('Use the Track Order page with your order details to review shipment updates. If tracking is not updating, contact support with your order number and checkout email address.', 'dawp'),
            ],
            [
                'question' => __('Which carriers do you use?', 'dawp'),
                'answer'   => __('Orders are shipped using trusted domestic U.S. carriers, including USPS, UPS, FedEx, or DHL. The final carrier is selected when the package is labeled and prepared at the fulfillment center.', 'dawp'),
            ],
            [
                'question' => __('Can one order arrive in multiple packages?', 'dawp'),
                'answer'   => __('Yes. Multi-item orders may be fulfilled from different locations or require different packing methods, so items may ship separately and arrive in multiple packages. Separate tracking numbers are provided when available.', 'dawp'),
            ],
        ],
    ],
    [
        'id'      => 'returns',
        'eyebrow' => __('Returns & Refunds', 'dawp'),
        'title'   => __('Return eligibility, packaging, and refund review.', 'dawp'),
        'items'   => [
            [
                'question' => __('What is your return window?', 'dawp'),
                'answer'   => __('Return requests must be initiated within 30 days of delivery. Items sent back without prior authorization cannot be tracked or processed. Eligible items must be unworn, unused, undamaged, and in original, unaltered condition with all original packaging, tags, labels, manuals, inserts, product boxes, protective packaging, and included accessories.', 'dawp'),
            ],
            [
                'question' => __('Do you charge a restocking fee?', 'dawp'),
                'answer'   => __('No. Meridova does not charge restocking fees for eligible returns.', 'dawp'),
            ],
            [
                'question' => __('How should I package a return?', 'dawp'),
                'answer'   => __('After approval, repack the item securely in its original packaging with all included accessories, tags, manuals, inserts, and boxes, then place it inside a sturdy outer shipping box. Do not place tape, labels, or postage directly on retail packaging when separate outer packaging can be used.', 'dawp'),
            ],
            [
                'question' => __('Who pays for return shipping?', 'dawp'),
                'answer'   => __('For defective, damaged, or incorrect products, there is no cost to the customer and we cover 100% of return shipping with a downloadable and printable prepaid label sent by email. For customer remorse returns, including wrong item, size, color, model, changed mind, or fit needs, the return shipping cost is the customer\'s responsibility and the prepaid label cost is deducted from the final refund.', 'dawp'),
            ],
            [
                'question' => __('When are refunds processed?', 'dawp'),
                'answer'   => __('Once a return package is received at our warehouse, we inspect the item within 1-2 business days. If approved, the refund is processed automatically back to the original payment method within 7 business days of inspection. If you have not received your refund after 15 business days of approval, check with your bank or card company first, then contact us.', 'dawp'),
            ],
            [
                'question' => __('What should I do if my item arrives damaged, defective, incorrect, or missing?', 'dawp'),
                'answer'   => __('Contact us within 30 days of delivery with your order number, checkout email address, and clear photos of the item, shipping packaging, and shipping label where relevant. Our support team will review the issue and arrange the available replacement or refund resolution when the issue is confirmed.', 'dawp'),
            ],
            [
                'question' => __('Do you offer exchanges?', 'dawp'),
                'answer'   => __('We do not process direct one-for-one product exchanges. To get a different size, color, model, or product, follow the return process for a refund and place a new order on the website.', 'dawp'),
            ],
        ],
    ],
    [
        'id'      => 'privacy',
        'eyebrow' => __('Privacy & Support', 'dawp'),
        'title'   => __('Customer information and contact details.', 'dawp'),
        'items'   => [
            [
                'question' => __('How do you use customer information?', 'dawp'),
                'answer'   => __('Customer information may be used to process, build, track, and deliver orders; send order confirmations and tracking links; respond to support requests; review transactions for fraud or unauthorized chargebacks; manage standard 30-day product returns; improve website performance; and comply with applicable legal, accounting, tax, and dispute-resolution obligations.', 'dawp'),
            ],
            [
                'question' => __('Do you share information with service providers?', 'dawp'),
                'answer'   => __('We do not sell, rent, trade, or monetize personal information. We only share operational data with trusted service providers that help run the store, such as e-commerce platform tools, analytics providers, payment processors, shipping carriers, fulfillment partners, fraud prevention tools, email services, customer support systems, or legal compliance parties when required.', 'dawp'),
            ],
            [
                'question' => __('What privacy rights can U.S. customers request?', 'dawp'),
                'answer'   => __('U.S. customers may request access to personal data, correction of inaccurate records, deletion where legally available, and opt-out choices for targeted third-party advertising tracking. Meridova does not sell personal data.', 'dawp'),
            ],
            [
                'question' => __('How can I contact Meridova?', 'dawp'),
                'answer'   => sprintf(
                    /* translators: 1: support email, 2: support hours, 3: support address, 4: response time. */
                    __('Email %1$s for order, shipping, return, product, account, or privacy questions. Support hours are %2$s, and we aim to reply %4$s. Corporate address: %3$s.', 'dawp'),
                    $support_email,
                    $operating_hours,
                    $support_address,
                    $response_time
                ),
            ],
        ],
    ],
];

$schema_questions = [];
foreach ($faq_sections as $section) {
    foreach ($section['items'] as $item) {
        $schema_questions[] = [
            '@type'          => 'Question',
            'name'           => wp_strip_all_tags($item['question']),
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text'  => wp_strip_all_tags($item['answer']),
            ],
        ];
    }
}

$faq_schema = [
    '@context'   => 'https://schema.org',
    '@type'      => 'FAQPage',
    'mainEntity' => $schema_questions,
];
?>

<style>
  .ese-page { --ese-blue:#2563eb; --ese-cyan:#06b6d4; --ese-lime:#a3e635; --ese-ink:#101828; --ese-slate:#475467; background:#fff; color:var(--ese-slate); font-family:"Lato","Inter",system-ui,sans-serif; }
  .ese-page * { box-sizing:border-box; }
  .ese-page a { color:inherit; text-decoration:none; }
  .ese-wrap { width:min(100% - 32px,1160px); margin-inline:auto; }
  .ese-eyebrow { margin:0 0 12px; color:var(--ese-blue); font-size:12px; font-weight:900; letter-spacing:.16em; text-transform:uppercase; }
  .ese-title { margin:0; color:var(--ese-ink); font-family:"Lato","Inter",system-ui,sans-serif; font-size:clamp(36px,5vw,64px); font-weight:900; line-height:1.04; letter-spacing:0; text-transform:uppercase; }
  .ese-copy { margin:18px 0 0; max-width:780px; color:var(--ese-slate); font-size:17px; line-height:1.75; }
  .ese-button { display:inline-flex; min-height:48px; align-items:center; justify-content:center; border:1px solid var(--ese-ink); border-radius:999px; background:var(--ese-ink); color:#fff !important; padding:0 22px; font-size:14px; font-weight:900; transition:.2s ease; }
  .ese-button:hover { border-color:var(--ese-blue); background:var(--ese-blue); color:#fff !important; }
  .ese-button--secondary { background:#fff; color:var(--ese-ink) !important; }
  .ese-button--secondary:hover { border-color:var(--ese-blue); background:#eff6ff; color:var(--ese-blue) !important; }
  .ese-actions { display:flex; flex-wrap:wrap; gap:14px; margin-top:28px; }
  .ese-hero { position:relative; overflow:hidden; background:linear-gradient(135deg,rgba(37,99,235,.14),rgba(6,182,212,.12) 48%,rgba(163,230,53,.16)),#f8fbff; }
  .ese-hero::before { content:""; position:absolute; inset:24px auto auto 8%; width:220px; height:220px; border-radius:999px; background:rgba(255,255,255,.56); filter:blur(8px); }
  .ese-hero::after { content:""; position:absolute; right:7%; bottom:-92px; width:360px; height:360px; border:1px solid rgba(37,99,235,.18); border-radius:999px; background:rgba(255,255,255,.28); }
  .ese-hero__grid { position:relative; z-index:1; display:grid; place-items:center; padding:82px 0 88px; text-align:center; }
  .ese-hero__content { max-width:880px; }
  .ese-hero .ese-copy { max-width:760px; margin-inline:auto; }
  .ese-hero .ese-actions { justify-content:center; }
  @media (max-width:680px) {
    .ese-hero__grid { padding:52px 0 56px; }
    .ese-actions { flex-direction:column; }
    .ese-button { width:100%; }
  }
</style>

<div class="bg-white font-body text-[#101828]">
    <script type="application/ld+json">
        <?php echo wp_json_encode($faq_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
    </script>

    <section class="ese-page ese-faq-page ese-hero">
        <div class="ese-wrap ese-hero__grid">
            <div class="ese-hero__content">
                <p class="ese-eyebrow"><?php esc_html_e('Frequently Asked Questions', 'dawp'); ?></p>
                <h1 class="ese-title"><?php esc_html_e('Frequently Asked Questions', 'dawp'); ?></h1>
                <p class="ese-copy"><?php esc_html_e('Find common information about products, checkout, processing time, U.S. standard shipping, tracking, returns, refunds, privacy, and support before or after placing an order.', 'dawp'); ?></p>
                <div class="ese-actions">
                    <a class="ese-button" href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
                    <a class="ese-button ese-button--secondary" href="<?php echo esc_url(home_url('/track-order/')); ?>"><?php esc_html_e('Track Order', 'dawp'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="space-y-6">
                <?php foreach ($faq_sections as $section) : ?>
                    <section id="<?php echo esc_attr($section['id']); ?>" class="border border-[#E5E7EB] bg-[#F8FAFC] p-7 lg:p-10">
                        <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-[#2563EB]"><?php echo esc_html($section['eyebrow']); ?></p>
                        <h2 class="font-heading text-3xl font-black uppercase leading-tight text-[#101828] lg:text-4xl"><?php echo esc_html($section['title']); ?></h2>

                        <div class="mt-7 space-y-4">
                            <?php foreach ($section['items'] as $item) : ?>
                                <details class="group border border-[#E5E7EB] bg-white p-5 shadow-sm">
                                    <summary class="flex cursor-pointer list-none items-start justify-between gap-5 font-heading text-lg font-black uppercase leading-tight text-[#101828]">
                                        <span><?php echo esc_html($item['question']); ?></span>
                                        <span class="mt-1 flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#DBEAFE] text-sm text-[#2563EB] transition group-open:rotate-45">+</span>
                                    </summary>
                                    <p class="mt-4 text-base leading-8 text-[#475467]">
                                        <?php echo esc_html($item['answer']); ?>
                                    </p>
                                </details>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</div>
