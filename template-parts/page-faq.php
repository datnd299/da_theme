<?php
/**
 * FAQ page — SlickTee.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$link = static function ($url, $label) {
    return '<a class="font-bold text-[#17140F] underline decoration-[#D7351E] decoration-2 underline-offset-4 hover:text-[#D7351E]" href="' . esc_url($url) . '">' . esc_html($label) . '</a>';
};

$contact  = $link(home_url('/contact-us/'), __('contact us', 'dawp'));
$track    = $link(home_url('/track-order/'), __('Track Your Order', 'dawp'));
$shipping = $link(home_url('/shipping-returns/'), __('Shipping Information', 'dawp'));
$returns  = $link(home_url('/shipping-returns/#returns'), __('Refund & Return Policy', 'dawp'));
$email    = $link('mailto:support@slicktee.com', 'support@slicktee.com');

$groups = [
    [
        'id'    => 'orders',
        'title' => __('Orders & payment', 'dawp'),
        'items' => [
            [__('Do I need an account to shop?', 'dawp'), __('No. You can check out as a guest every time. Creating an account simply saves your details for next time and lets you see your order history under “My Account”.', 'dawp')],
            [__('How will I know my order is confirmed?', 'dawp'), __('Right after you place your order we email you a receipt with your order details. Orders go into production once payment is approved and the billing and delivery address are verified.', 'dawp')],
            [__('I didn’t receive a confirmation email.', 'dawp'), sprintf(__('Check your spam or promotions folder, and the email linked to your PayPal account if you paid with PayPal. Still nothing? Please %s and we’ll resend it.', 'dawp'), $contact)],
            [__('Which payment methods do you accept?', 'dawp'), __('We accept Visa, Mastercard, American Express and PayPal. Payment is taken when your order is placed, because work on your item starts right away. Our checkout is protected with 256-bit SSL encryption.', 'dawp')],
        ],
    ],
    [
        'id'    => 'changes',
        'title' => __('Changes & cancellations', 'dawp'),
        'items' => [
            [__('Can I change my order?', 'dawp'), sprintf(__('Because every item is printed on demand, you can change the size, color, quantity or shipping address within 24 hours of ordering. Email %s with your order number and we’ll reply within 24 hours.', 'dawp'), $email)],
            [__('Can I cancel my order?', 'dawp'), sprintf(__('Yes — within 24 hours of placing it. After that your order goes into production and can no longer be cancelled or changed. To cancel, %s or email %s.', 'dawp'), $contact, $email)],
        ],
    ],
    [
        'id'    => 'shipping',
        'title' => __('Shipping & tracking', 'dawp'),
        'items' => [
            [__('How much is shipping?', 'dawp'), sprintf(__('Shipping costs depend on the destination and number of items. Most items are $5.99 for the first item + $1.99 for each additional item. See %s for details.', 'dawp'), $shipping)],
            [__('How long will my order take?', 'dawp'), __('Production takes 5–7 business days. After dispatch, US orders typically arrive in 7–10 days and international orders in 7–15 days. Holidays and severe weather can occasionally cause delays.', 'dawp')],
            [__('Do you ship worldwide?', 'dawp'), __('Yes, we ship to most countries. We’re unable to ship to APO/FPO addresses or PO boxes.', 'dawp')],
            [__('Where is my order?', 'dawp'), sprintf(__('As soon as your order ships we email you a tracking number and link. You can also check its status any time on our %s page.', 'dawp'), $track)],
            [__('Why isn’t my tracking working?', 'dawp'), sprintf(__('Tracking updates once the carrier picks up and scans your package, which can take a few days after dispatch. If you ordered more than 21 days ago and still see no tracking, please %s with your order number and checkout email.', 'dawp'), $contact)],
            [__('My order is past the estimated delivery date.', 'dawp'), sprintf(__('Please %s with your order number. If a package is lost in transit we’ll reprint and reship it at no cost to you.', 'dawp'), $contact)],
        ],
    ],
    [
        'id'    => 'problems',
        'title' => __('Returns & problems', 'dawp'),
        'items' => [
            [__('I received a damaged, misprinted or wrong item.', 'dawp'), sprintf(__('We’re sorry! Email a photo to %s within 14 days of delivery and we’ll send a free replacement or refund the item — no need to pay for return shipping.', 'dawp'), $email)],
            [__('An item is missing from my order.', 'dawp'), sprintf(__('Items in one order are sometimes shipped separately, so check your email for a second tracking number. If something is still missing, email %s and we’ll resend it or refund it.', 'dawp'), $email)],
            [__('Can I return an item I just don’t like?', 'dawp'), sprintf(__('Because each piece is made to order specifically for you, we can’t accept returns for change of mind or wrong size choice. Returns, exchanges and refunds apply to damaged, defective or incorrect items — see our %s.', 'dawp'), $returns)],
        ],
    ],
];
?>

<div class="bg-[#FBF7EF] text-[#17140F]">
    <section class="border-b-2 border-[#17140F] py-14 sm:py-20" aria-labelledby="faq-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <span class="inline-flex -rotate-2 rounded-[4px] border-2 border-[#17140F] bg-[#F2B33D] px-3 py-1 text-xs font-extrabold uppercase tracking-[0.18em]"><?php esc_html_e('Help Center', 'dawp'); ?></span>
            <h1 id="faq-title" class="font-display mt-5 text-5xl uppercase leading-[0.95] sm:text-7xl"><?php esc_html_e('Frequently asked questions', 'dawp'); ?></h1>
            <p class="mt-5 max-w-2xl text-lg leading-relaxed text-[#4A4339]"><?php esc_html_e('Quick answers about ordering, shipping, sizing and returns. Can’t find what you need? Our team replies within 24 hours.', 'dawp'); ?></p>
            <nav class="mt-8 flex flex-wrap gap-2" aria-label="<?php esc_attr_e('FAQ topics', 'dawp'); ?>">
                <?php foreach ($groups as $group) : ?>
                    <a href="#<?php echo esc_attr($group['id']); ?>" class="inline-flex min-h-11 items-center rounded-[999px] border-2 border-[#17140F] bg-[#FFFFFF] px-4 text-xs font-extrabold uppercase tracking-wide transition hover:bg-[#F2B33D]"><?php echo esc_html($group['title']); ?></a>
                <?php endforeach; ?>
                <a href="#size-guide" class="inline-flex min-h-11 items-center rounded-[999px] border-2 border-[#17140F] bg-[#FFFFFF] px-4 text-xs font-extrabold uppercase tracking-wide transition hover:bg-[#F2B33D]"><?php esc_html_e('Size guide', 'dawp'); ?></a>
            </nav>
        </div>
    </section>

    <section class="py-14 sm:py-20">
        <div class="mx-auto grid max-w-5xl gap-14 px-4 sm:px-6 lg:px-8">
            <?php foreach ($groups as $group) : ?>
                <div id="<?php echo esc_attr($group['id']); ?>" class="scroll-mt-24">
                    <h2 class="font-display text-3xl uppercase sm:text-4xl"><?php echo esc_html($group['title']); ?></h2>
                    <div class="mt-5 grid gap-3">
                        <?php foreach ($group['items'] as $item) : ?>
                            <details class="group rounded-[14px] border-2 border-[#17140F] bg-[#FFFFFF] open:shadow-[4px_4px_0_#17140F]">
                                <summary class="flex min-h-14 cursor-pointer list-none items-center justify-between gap-4 px-5 py-4 text-base font-extrabold [&::-webkit-details-marker]:hidden">
                                    <span><?php echo esc_html($item[0]); ?></span>
                                    <span class="inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-full border-2 border-[#17140F] text-lg leading-none transition group-open:rotate-45 group-open:bg-[#D7351E] group-open:text-[#FFFFFF]" aria-hidden="true">+</span>
                                </summary>
                                <div class="border-t-2 border-dashed border-[#E3D7C2] px-5 py-4 text-sm leading-7 text-[#4A4339]">
                                    <?php echo wp_kses($item[1], ['a' => ['class' => [], 'href' => []]]); ?>
                                </div>
                            </details>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>

            <div id="size-guide" class="scroll-mt-24 rounded-[14px] border-2 border-[#17140F] bg-[#F4EDE0] p-6 sm:p-8">
                <h2 class="font-display text-3xl uppercase sm:text-4xl"><?php esc_html_e('Size guide', 'dawp'); ?></h2>
                <p class="mt-3 text-sm leading-7 text-[#4A4339]"><?php esc_html_e('Our range covers Classic Tees, Vintage T-Shirts, Vintage Shirts for Kids, Sweatshirts, Hoodies, Tank Tops, Leg Pants and Shorts. Each product page shows the size chart for that exact style — always check it before ordering, since items are made to order and can’t be exchanged for a different size.', 'dawp'); ?></p>
                <div class="mt-6 grid gap-4 sm:grid-cols-3">
                    <?php
                    $measure = [
                        [__('Chest / width', 'dawp'), __('Lay a shirt you love flat and measure straight across, armpit to armpit.', 'dawp')],
                        [__('Length', 'dawp'), __('Measure from the highest point of the shoulder down to the bottom hem.', 'dawp')],
                        [__('Compare', 'dawp'), __('Match those numbers to the chart on the product page. Between sizes? Pick the larger one for a relaxed fit.', 'dawp')],
                    ];
                    foreach ($measure as $i => $row) :
                        ?>
                        <div class="rounded-[8px] border-2 border-[#17140F] bg-[#FFFFFF] p-4">
                            <span class="font-display text-2xl text-[#D7351E]"><?php echo esc_html($i + 1); ?></span>
                            <p class="mt-1 text-sm font-extrabold uppercase"><?php echo esc_html($row[0]); ?></p>
                            <p class="mt-1 text-sm leading-6 text-[#4A4339]"><?php echo esc_html($row[1]); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="rounded-[14px] border-2 border-[#17140F] bg-[#17140F] p-6 text-[#FBF7EF] sm:flex sm:items-center sm:justify-between sm:gap-6 sm:p-8">
                <div>
                    <h2 class="font-display text-3xl uppercase"><?php esc_html_e('Still have a question?', 'dawp'); ?></h2>
                    <p class="mt-2 text-sm text-[#FBF7EF]/75"><?php esc_html_e('Email support@slicktee.com or call +1 909-366-3939 (Mon–Fri 10am–6pm, Sat 8am–6pm).', 'dawp'); ?></p>
                </div>
                <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="mt-5 inline-flex min-h-12 shrink-0 items-center rounded-[8px] border-2 border-[#FBF7EF] bg-[#D7351E] px-6 text-sm font-extrabold uppercase tracking-wide text-[#FFFFFF] transition hover:bg-[#B32813] sm:mt-0"><?php esc_html_e('Contact support', 'dawp'); ?></a>
            </div>
        </div>
    </section>
</div>
