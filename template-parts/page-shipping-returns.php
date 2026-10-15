<?php
/**
 * Shipping Information + Refund & Return Policy — SlickTee.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$email_link   = '<a href="mailto:support@slicktee.com">support@slicktee.com</a>';
$track_link   = '<a href="' . esc_url(home_url('/track-order/')) . '">' . esc_html__('Track Your Order', 'dawp') . '</a>';
$contact_link = '<a href="' . esc_url(home_url('/contact-us/')) . '">' . esc_html__('Contact Us', 'dawp') . '</a>';

$summary = [
    ['label' => __('Processing', 'dawp'), 'value' => __('2–3 business days', 'dawp')],
    ['label' => __('Shipping', 'dawp'), 'value' => __('5–10 business days', 'dawp')],
    ['label' => __('Tracking', 'dawp'), 'value' => __('Every order', 'dawp')],
    ['label' => __('Shipping fee', 'dawp'), 'value' => __('Free over $49', 'dawp')],
];

$sections = [
    [
        'id'    => 'shipping',
        'title' => __('Shipping Information', 'dawp'),
        'body'  => [
            '<h3>' . esc_html__('1. Processing (production) time', 'dawp') . '</h3>',
            '<p>' . esc_html__('Every SlickTee item is printed, cut and finished to order after you buy it. Processing takes 2–3 business days before your order is dispatched. A business day is Monday to Friday, excluding federal and bank holidays.', 'dawp') . '</p>',
            '<h3>' . esc_html__('2. Delivery time', 'dawp') . '</h3>',
            '<p>' . esc_html__('Once dispatched, orders are delivered in 5–10 business days.', 'dawp') . '</p>',
            '<p>' . esc_html__('Delivery can occasionally be shorter or longer than these estimates. Delays may occur around holidays or because of events outside our control, such as severe weather.', 'dawp') . '</p>',
            '<h3>' . esc_html__('3. Shipping fees', 'dawp') . '</h3>',
            '<p>' . esc_html__('Orders over $49 ship free. For orders under $49, the shipping cost is always shown at checkout before you pay.', 'dawp') . '</p>',
            '<h3>' . esc_html__('4. Where we ship', 'dawp') . '</h3>',
            '<p>' . esc_html__('We ship worldwide. We are unable to ship to APO/FPO addresses or PO boxes.', 'dawp') . '</p>',
            '<h3>' . esc_html__('5. Carriers & tracking', 'dawp') . '</h3>',
            '<p>' . sprintf(esc_html__('We don’t run our own delivery network, so we hand your package to trusted carriers who deliver it from our facility to your address. Every shipment includes tracking: once your order ships we email you the tracking number and link. You can also check status on our %s page, or under “My Account” if you created an account at checkout.', 'dawp'), $track_link) . '</p>',
        ],
    ],
    [
        'id'    => 'delivery-issues',
        'title' => __('Delivery Issues', 'dawp'),
        'body'  => [
            '<h3>' . esc_html__('Lost packages', 'dawp') . '</h3>',
            '<p>' . esc_html__('If your package is lost in transit, let us know no later than 4 days after the estimated delivery date. We’ll cover the cost of reprinting and shipping a replacement. We may first ask you to confirm the shipping address and to check with your local post office.', 'dawp') . '</p>',
            '<h3>' . esc_html__('Marked as delivered but not received', 'dawp') . '</h3>',
            '<p>' . esc_html__('Please contact us right away. Often the package was left in an unexpected spot at the address (a back porch, a mailroom, a neighbor), so check around and ask the carrier whether the driver left delivery notes. We’ll help from there, including with carrier errors such as misrouted parcels.', 'dawp') . '</p>',
            '<h3>' . esc_html__('Wrong address', 'dawp') . '</h3>',
            '<p>' . esc_html__('Please double-check your address at checkout. If an incorrect address was entered, the package is usually returned to us and we’ll notify you when it arrives so we can reship it to the corrected address. If the package isn’t returned, a new order is needed to replace it.', 'dawp') . '</p>',
            '<h3>' . esc_html__('Returned to sender', 'dawp') . '</h3>',
            '<p>' . esc_html__('Packages can be returned because the address was undeliverable, the parcel went unclaimed at customs, or delivery was refused. We’ll contact you once it’s back at our facility to agree on next steps.', 'dawp') . '</p>',
        ],
    ],
    [
        'id'    => 'cancel',
        'title' => __('Cancel or Change an Order', 'dawp'),
        'body'  => [
            '<p>' . sprintf(esc_html__('Because orders are made to order, you can cancel or change the size, color, quantity or shipping address within 24 hours of placing your order. Email %1$s with your order number, or use our %2$s page. After 24 hours your order enters production and can no longer be changed or cancelled.', 'dawp'), $email_link, $contact_link) . '</p>',
        ],
    ],
    [
        'id'    => 'returns',
        'title' => __('Refund, Return & Exchange Policy', 'dawp'),
        'body'  => [
            '<p>' . esc_html__('By placing an order you acknowledge that our goods are made specifically for you and are produced only after your purchase is confirmed. For that reason we can’t accept returns for change of mind or for choosing the wrong size — but if anything is wrong with what we sent, we’ll make it right.', 'dawp') . '</p>',
            '<h3>' . esc_html__('1. When you can request a return, exchange or refund', 'dawp') . '</h3>',
            '<ul><li>' . esc_html__('The item arrived damaged.', 'dawp') . '</li><li>' . esc_html__('There are visible defects in the print.', 'dawp') . '</li><li>' . esc_html__('You received a different size than the one you ordered (e.g. L instead of M).', 'dawp') . '</li><li>' . esc_html__('You received a different color than the one you ordered.', 'dawp') . '</li><li>' . esc_html__('You received a different design than the one you ordered.', 'dawp') . '</li><li>' . esc_html__('You received a different style than the one you ordered (e.g. a long sleeve shirt instead of a tee).', 'dawp') . '</li></ul>',
            '<h3>' . esc_html__('2. How to request it', 'dawp') . '</h3>',
            '<p>' . sprintf(esc_html__('Contact us within 14 days of receiving your items: email %1$s or use our %2$s page, and include your order number and a photo of the problem. Requests made after 14 days can’t be accepted. In most cases we can arrange a replacement or refund without you sending anything back; if we do need the item, we’ll give you the return address and cover the return shipping. No restocking fees apply.', 'dawp'), $email_link, $contact_link) . '</p>',
            '<h3>' . esc_html__('3. Refunds', 'dawp') . '</h3>',
            '<p>' . esc_html__('Refunds can be full or partial depending on how the order was affected, and cover the damaged or incorrect items. Refunds go back to your original payment method:', 'dawp') . '</p>',
            '<ul><li>' . esc_html__('PayPal: the refund appears in your PayPal balance as soon as we process it.', 'dawp') . '</li><li>' . esc_html__('Credit / debit card: allow up to 5–10 business days for the refund to show on your statement.', 'dawp') . '</li></ul>',
            '<p>' . sprintf(esc_html__('If you still don’t see your refund after that time, email %s and we’ll look into it.', 'dawp'), $email_link) . '</p>',
        ],
    ],
];

$allowed = [
    'p'  => [],
    'h3' => [],
    'ul' => [],
    'li' => [],
    'a'  => ['href' => []],
];
?>

<div class="bg-[#FBF7EF] text-[#17140F]">
    <section class="border-b-2 border-[#17140F] py-14 sm:py-20" aria-labelledby="ship-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <span class="inline-flex -rotate-2 rounded-[4px] border-2 border-[#17140F] bg-[#F2B33D] px-3 py-1 text-xs font-extrabold uppercase tracking-[0.18em]"><?php esc_html_e('Policies', 'dawp'); ?></span>
            <h1 id="ship-title" class="font-display mt-5 text-5xl uppercase leading-[0.95] sm:text-7xl"><?php esc_html_e('Shipping & returns', 'dawp'); ?></h1>
            <p class="mt-5 max-w-2xl text-lg leading-relaxed text-[#4A4339]"><?php esc_html_e('Thank you for choosing SlickTee. Please read how we make, ship and stand behind your order before you buy — and if you still need help, just send us an email.', 'dawp'); ?></p>
            <dl class="mt-10 grid grid-cols-2 gap-3 lg:grid-cols-4">
                <?php foreach ($summary as $item) : ?>
                    <div class="rounded-[14px] border-2 border-[#17140F] bg-[#FFFFFF] p-4">
                        <dt class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#6F665A]"><?php echo esc_html($item['label']); ?></dt>
                        <dd class="font-display mt-1 text-xl uppercase sm:text-2xl"><?php echo esc_html($item['value']); ?></dd>
                    </div>
                <?php endforeach; ?>
            </dl>
        </div>
    </section>

    <section class="py-14 sm:py-20">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[260px_1fr] lg:px-8">
            <nav class="lg:sticky lg:top-6 lg:self-start" aria-label="<?php esc_attr_e('On this page', 'dawp'); ?>">
                <p class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#6F665A]"><?php esc_html_e('On this page', 'dawp'); ?></p>
                <ul class="mt-3 grid gap-1 border-l-2 border-[#17140F]">
                    <?php foreach ($sections as $section) : ?>
                        <li><a href="#<?php echo esc_attr($section['id']); ?>" class="block py-2 pl-4 text-sm font-bold transition hover:bg-[#F4EDE0] hover:text-[#D7351E]"><?php echo esc_html($section['title']); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <div class="grid gap-8">
                <?php foreach ($sections as $section) : ?>
                    <article id="<?php echo esc_attr($section['id']); ?>" class="scroll-mt-6 rounded-[14px] border-2 border-[#17140F] bg-[#FFFFFF] p-6 sm:p-8">
                        <h2 class="font-display text-3xl uppercase sm:text-4xl"><?php echo esc_html($section['title']); ?></h2>
                        <div class="mt-5 grid gap-4 text-[0.95rem] leading-7 text-[#4A4339] [&_a]:font-bold [&_a]:text-[#17140F] [&_a]:underline [&_a]:decoration-[#D7351E] [&_a]:decoration-2 [&_a]:underline-offset-4 [&_h3]:mt-2 [&_h3]:font-heading [&_h3]:text-lg [&_h3]:font-extrabold [&_h3]:text-[#17140F] [&_li]:pl-1 [&_ul]:grid [&_ul]:list-disc [&_ul]:gap-1.5 [&_ul]:pl-5">
                            <?php echo wp_kses(implode('', $section['body']), $allowed); ?>
                        </div>
                    </article>
                <?php endforeach; ?>

                <div class="rounded-[14px] border-2 border-[#17140F] bg-[#17140F] p-6 text-[#FBF7EF] sm:p-8">
                    <h2 class="font-display text-2xl uppercase"><?php esc_html_e('Need help?', 'dawp'); ?></h2>
                    <p class="mt-3 text-sm leading-7 text-[#FBF7EF]/80">
                        SlickTee · slicktee.com<br>
                        <?php esc_html_e('US Address: 304 S. Jones Blvd #3456, Las Vegas, NV 89107, United States', 'dawp'); ?><br>
                        <a class="font-bold text-[#F2B33D] underline" href="mailto:support@slicktee.com">support@slicktee.com</a> · <?php esc_html_e('US +1 909-366-3939', 'dawp'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
</div>
