<?php
/**
 * FAQ template part for Shop Avec Moi.
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email = 'support@shopavecmoi.com';
$shipping_url  = home_url('/shipping-policy/');
$returns_url   = home_url('/return-refund-policy/');
$track_url     = home_url('/track-order/');
$contact_url   = home_url('/contact-us/');
$privacy_url   = home_url('/privacy-policy/');
$terms_url     = home_url('/terms-conditions/');

$faqs = [
    'Orders & Shipping' => [
        [
            'question' => 'How long does order processing take?',
            'answer'   => 'Orders are processed within 1-3 business days, Monday to Friday, excluding U.S. public holidays. Orders placed after the 5:00 PM PST cutoff begin processing on the following business day.',
        ],
        [
            'question' => 'How long does US delivery take?',
            'answer'   => 'Free standard U.S. shipping takes 5-7 business days in transit. The estimated total delivery window is 6-10 business days from purchase.',
        ],
        [
            'question' => 'How can I track my order?',
            'answer'   => 'Use the Track Your Order page with your order details, or check the tracking link sent to your email after dispatch.',
        ],
        [
            'question' => 'Can I change my shipping address?',
            'answer'   => 'Email support as soon as possible. We can only update an address before the order has shipped or entered fulfillment.',
        ],
    ],
    'Returns & Refunds' => [
        [
            'question' => 'What is your return window?',
            'answer'   => 'Eligible items may be returned within 30 days of delivery. Return requests must be approved by support before sending items back.',
        ],
        [
            'question' => 'Can intimate apparel be returned?',
            'answer'   => 'Some intimate apparel can be returned only if it is unworn, unwashed, unused, in original condition, and includes tags, hygiene liners, and original packaging where applicable. Items that show signs of wear, odor, marks, washing, missing tags, or missing hygiene materials cannot be accepted.',
        ],
        [
            'question' => 'Who pays return shipping?',
            'answer'   => 'Shop Avec Moi covers return shipping for defective, damaged, or incorrect items. For customer-remorse returns, the cost of the provided prepaid return label is deducted from the final refund.',
        ],
        [
            'question' => 'When will I receive my refund?',
            'answer'   => 'Returns are inspected within 1-2 business days after arrival. Approved refunds are issued to the original payment method within 7 business days, though your bank may need additional time to post the credit.',
        ],
    ],
    'Products & Fit' => [
        [
            'question' => 'What types of products does Shop Avec Moi sell?',
            'answer'   => 'Shop Avec Moi offers romantic lingerie sets, sleepwear, robes, loungewear, bras, bralettes, and intimate essentials with a soft, tasteful boutique focus.',
        ],
        [
            'question' => 'How should I choose my size?',
            'answer'   => 'Review the size details on each product page before ordering. If you are between sizes or need help, email support with the product name and your fit question.',
        ],
        [
            'question' => 'How should I care for delicate pieces?',
            'answer'   => 'Follow the care instructions on the product page and garment label. Delicate lace, satin, and mesh items usually last longer with gentle washing and air drying.',
        ],
    ],
    'Payments & Support' => [
        [
            'question' => 'Is checkout secure?',
            'answer'   => 'Checkout is handled through secure ecommerce payment processing. Shop Avec Moi does not store full payment card numbers on our website.',
        ],
        [
            'question' => 'How do I contact customer support?',
            'answer'   => 'Email support@shopavecmoi.com Monday-Friday, 9:00 AM-6:00 PM PST. Include your order number when asking about an order.',
        ],
    ],
];
?>

<div class="bg-white text-[#24132E] antialiased">
    <section class="bg-[#FBF4FF] px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto max-w-4xl text-center">
            <p class="text-sm font-semibold uppercase text-[#6E3A8A]">Customer Care &amp; Policies</p>
            <h1 class="mt-4 font-heading text-5xl leading-[1.05] text-[#3B1748] sm:text-6xl">
                Frequently Asked Questions
            </h1>
            <p class="mt-5 text-sm font-semibold text-[#6E3A8A]">Last updated: June 10, 2026</p>
            <p class="mt-6 text-base leading-7 text-[#6D5875] sm:text-lg">
                Helpful answers about shipping, returns, fit, product care, and support for your Shop Avec Moi order.
            </p>
        </div>
    </section>

    <section class="bg-white px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto max-w-7xl">
            <div class="rounded-2xl border border-[#E8DFF0] bg-[#FBF4FF] p-6 text-sm leading-7 text-[#6D5875] lg:p-8">
                <p>These answers summarize our store policies for quick reference. For complete terms, eligibility requirements, and special circumstances, please review the linked policy pages.</p>
            </div>

            <div class="mt-8 grid gap-8 lg:grid-cols-[0.72fr_1.28fr]">
                <aside class="h-fit rounded-[2rem] bg-[#21102C] p-6 text-white lg:sticky lg:top-28 lg:p-8">
                    <p class="text-sm font-semibold uppercase text-white">Policy Support</p>
                    <h2 class="mt-3 font-heading text-3xl leading-tight text-white">Find the right answer faster.</h2>
                    <p class="mt-5 text-sm leading-6 text-white/75">Review detailed store policies, track an order, or contact our support team for personal assistance.</p>
                    <div class="mt-7 grid gap-3">
                        <a class="rounded-2xl border border-white/15 bg-white/10 p-4 text-sm font-semibold text-white transition hover:bg-white/15" href="<?php echo esc_url($shipping_url); ?>">Shipping Policy</a>
                        <a class="rounded-2xl border border-white/15 bg-white/10 p-4 text-sm font-semibold text-white transition hover:bg-white/15" href="<?php echo esc_url($returns_url); ?>">Return &amp; Refund Policy</a>
                        <a class="rounded-2xl border border-white/15 bg-white/10 p-4 text-sm font-semibold text-white transition hover:bg-white/15" href="<?php echo esc_url($privacy_url); ?>">Privacy Policy</a>
                        <a class="rounded-2xl border border-white/15 bg-white/10 p-4 text-sm font-semibold text-white transition hover:bg-white/15" href="<?php echo esc_url($terms_url); ?>">Terms &amp; Conditions</a>
                        <a class="rounded-2xl border border-white/15 bg-white/10 p-4 text-sm font-semibold text-white transition hover:bg-white/15" href="<?php echo esc_url($track_url); ?>">Track Your Order</a>
                    </div>
                    <p class="mt-7 text-sm leading-6 text-white/75">Monday-Friday, 9:00 AM-6:00 PM PST</p>
                    <a class="mt-5 inline-flex min-h-12 items-center justify-center rounded-full bg-white px-7 py-3 text-sm font-semibold text-[#3B1748] transition duration-300 hover:bg-[#FBF4FF]" href="mailto:<?php echo esc_attr($support_email); ?>">
                        <?php echo esc_html($support_email); ?>
                    </a>
                </aside>

                <div class="grid gap-6">
                    <?php foreach ($faqs as $section_title => $items) : ?>
                        <section class="rounded-2xl border border-[#E8DFF0] bg-white p-6 shadow-sm shadow-[#3B1748]/10 lg:p-8">
                            <h2 class="font-heading text-3xl leading-tight text-[#3B1748]"><?php echo esc_html($section_title); ?></h2>
                            <div class="mt-6 grid gap-3">
                                <?php foreach ($items as $item) : ?>
                                    <details class="group rounded-2xl border border-[#E8DFF0] bg-[#FBF4FF] p-5">
                                        <summary class="flex cursor-pointer list-none items-center justify-between gap-4 text-base font-semibold text-[#3B1748]">
                                            <?php echo esc_html($item['question']); ?>
                                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-white text-[#3B1748] transition group-open:rotate-45">
                                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                    <path d="M12 5v14" />
                                                    <path d="M5 12h14" />
                                                </svg>
                                            </span>
                                        </summary>
                                        <p class="mt-4 text-sm leading-7 text-[#6D5875]"><?php echo esc_html($item['answer']); ?></p>
                                    </details>
                                <?php endforeach; ?>
                            </div>
                        </section>
                    <?php endforeach; ?>

                    <section class="rounded-2xl border border-[#E8DFF0] bg-[#FBF4FF] p-6 lg:p-8">
                        <p class="text-sm font-semibold uppercase text-[#6E3A8A]">Still Need Help?</p>
                        <h2 class="mt-3 font-heading text-3xl leading-tight text-[#3B1748]">Contact Shop Avec Moi support.</h2>
                        <p class="mt-5 text-sm leading-7 text-[#6D5875]">Include your order number and the email address used at checkout so our team can assist you efficiently.</p>
                        <div class="mt-6 flex flex-wrap gap-3">
                            <a class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#3B1748] px-7 py-3 text-sm font-semibold text-white transition duration-300 hover:bg-[#6E3A8A]" href="<?php echo esc_url($contact_url); ?>">Contact Us</a>
                            <a class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#3B1748] bg-white px-7 py-3 text-sm font-semibold text-[#3B1748] transition duration-300 hover:bg-[#FBF4FF]" href="mailto:<?php echo esc_attr($support_email); ?>">Email Support</a>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
</div>
