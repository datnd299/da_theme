<?php
/**
 * FAQ page — ProudlyWear.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$link = static function ($url, $label) {
    return '<a class="font-bold text-foreground underline decoration-accent decoration-2 underline-offset-4 hover:text-accent" href="' . esc_url($url) . '">' . esc_html($label) . '</a>';
};

$contact  = $link(home_url('/contact-us/'), __('contact us', 'dawp'));
$track    = $link(home_url('/track-order/'), __('Order Tracking', 'dawp'));
$shipping = $link(home_url('/shipping-returns/'), __('Shipping Policy', 'dawp'));
$returns  = $link(home_url('/shipping-returns/#returns'), __('Return & Refund Policy', 'dawp'));
$email    = $link('mailto:support@proudlywear.com', 'support@proudlywear.com');

$groups = [
    [
        'id'    => 'orders',
        'title' => __('Orders & payment', 'dawp'),
        'items' => [
            [__('Do I need an account to order?', 'dawp'), __('No. You can check out as a guest. Creating an account simply saves your details and lets you see your order history under “My Account”.', 'dawp')],
            [__('How will I know my order is confirmed?', 'dawp'), __('Right after checkout we email you an order confirmation with your order number and details. Your order goes into production once payment is approved.', 'dawp')],
            [__('I didn’t receive a confirmation email.', 'dawp'), sprintf(__('Check your spam or promotions folder, and the email linked to your PayPal account if you paid with PayPal. Still nothing? Please %s and we’ll resend it.', 'dawp'), $contact)],
            [__('Which payment methods do you accept?', 'dawp'), __('We accept Visa, Mastercard, American Express and PayPal. The methods available to you are shown at checkout. Payment is charged when your order is placed.', 'dawp')],
            [__('Why did my payment fail?', 'dawp'), __('Common causes are a typo in the card details or billing address, an expired card, insufficient funds or a bank security block. Double-check your details or contact your bank, then try again.', 'dawp')],
            [__('Is my payment information safe?', 'dawp'), __('Yes. Checkout is protected with SSL encryption and payments are processed by our payment providers. We never see or store your full card number or security code.', 'dawp')],
        ],
    ],
    [
        'id'    => 'changes',
        'title' => __('Changes & cancellations', 'dawp'),
        'items' => [
            [__('Can I change my order or shipping address?', 'dawp'), sprintf(__('Yes — within 6 hours of placing your order. Email %s with your order number and the change you need. After 6 hours your item may already be in production and we can’t guarantee changes.', 'dawp'), $email)],
            [__('Can I cancel my order?', 'dawp'), sprintf(__('Yes, within 6 hours of ordering and before production begins, for a full refund. Email %s with your order number. Once production has started, the order can no longer be cancelled.', 'dawp'), $email)],
        ],
    ],
    [
        'id'    => 'shipping',
        'title' => __('Shipping & tracking', 'dawp'),
        'items' => [
            [__('How much does shipping cost?', 'dawp'), sprintf(__('Standard shipping is free on US orders of $49 or more (after discounts). Under $49, it’s $5.99 for the first item + $1.99 for each additional item. The exact amount is always shown at checkout. See our %s.', 'dawp'), $shipping)],
            [__('How long will my order take?', 'dawp'), __('Every item is made to order, so production takes 3–5 business days. After dispatch, US delivery typically takes 4–8 business days. Holidays and severe weather can occasionally cause delays.', 'dawp')],
            [__('Where do you ship?', 'dawp'), __('We currently ship to addresses in all 50 US states. At this time we are unable to ship to APO/FPO/DPO addresses, PO boxes or international destinations.', 'dawp')],
            [__('Where is my order?', 'dawp'), sprintf(__('When your order ships we email you a tracking number and link. You can also check its status any time on our %s page.', 'dawp'), $track)],
            [__('Why isn’t my tracking number working?', 'dawp'), sprintf(__('Tracking can take 2–5 business days to show updates after the label is created. If there’s still no movement after that, please %s with your order number.', 'dawp'), $contact)],
            [__('Tracking says delivered, but I can’t find my package.', 'dawp'), sprintf(__('Check around your property, with neighbors and household members, and confirm the shipping address on your order. Allow 1–2 business days, as carriers sometimes mark packages delivered early. If it still hasn’t turned up, email %s and we’ll help.', 'dawp'), $email)],
        ],
    ],
    [
        'id'    => 'returns',
        'title' => __('Returns & problems', 'dawp'),
        'items' => [
            [__('What is your return policy?', 'dawp'), sprintf(__('You can return eligible items within 30 days of delivery. Items must be unworn, unwashed and in original condition. Contact us first — please don’t send anything back without a return authorization. See our %s.', 'dawp'), $returns)],
            [__('My item arrived damaged, defective or wrong.', 'dawp'), sprintf(__('We’re sorry! Email %s within 7 days of delivery with your order number and clear photos. We’ll send a free replacement or a full refund, and you won’t pay any return shipping.', 'dawp'), $email)],
            [__('Can I return something I just don’t like?', 'dawp'), sprintf(__('Yes, eligible items can be returned within 30 days of delivery for a change of mind or the wrong size. Return shipping is paid by the customer in that case. Personalized items can only be returned if they arrive damaged, defective or incorrect. See our %s.', 'dawp'), $returns)],
            [__('When will I get my refund?', 'dawp'), __('Approved refunds are processed within 5 business days to your original payment method. Your bank or card issuer may take a few extra days to post the funds.', 'dawp')],
        ],
    ],
    [
        'id'    => 'products',
        'title' => __('Products & designs', 'dawp'),
        'items' => [
            [__('Are your products officially licensed by the military?', 'dawp'), __('No. ProudlyWear is an independent brand and our designs are original artwork. We are not affiliated with or endorsed by the U.S. Department of Defense, the VA or any branch of the U.S. Armed Forces, and we don’t use official seals or insignia.', 'dawp')],
            [__('How do you check quality?', 'dawp'), __('Each item is inspected by our print partners for print quality, color and accuracy before it ships. If anything isn’t right when it arrives, we’ll make it right.', 'dawp')],
            [__('How should I wash my apparel?', 'dawp'), __('Turn garments inside out, machine wash cold with similar colors and tumble dry low or hang dry. Don’t iron directly on the print and avoid bleach.', 'dawp')],
        ],
    ],
];

$chip = 'inline-flex min-h-11 items-center rounded-md border border-border-strong bg-[#FFFFFF] px-4 font-heading text-sm font-bold uppercase tracking-wider transition hover:border-foreground hover:bg-foreground hover:text-background';
?>

<div class="bg-background text-foreground">
    <section class="border-b border-border-strong py-14 sm:py-20" aria-labelledby="faq-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <span class="font-stencil inline-flex items-center gap-2 border-y-2 border-foreground py-1 text-sm uppercase tracking-[0.2em]"><span class="text-accent" aria-hidden="true">★</span><?php esc_html_e('Help Center', 'dawp'); ?></span>
            <h1 id="faq-title" class="font-display mt-5 text-5xl uppercase leading-[1] sm:text-7xl"><?php esc_html_e('Frequently asked questions', 'dawp'); ?></h1>
            <p class="mt-5 max-w-2xl text-lg leading-relaxed text-foreground-muted"><?php esc_html_e('Quick answers about ordering, shipping, sizing and returns. Can’t find what you need? Our team replies within 24 hours, Monday to Friday.', 'dawp'); ?></p>
            <nav class="mt-8 flex flex-wrap gap-2" aria-label="<?php esc_attr_e('FAQ topics', 'dawp'); ?>">
                <?php foreach ($groups as $group) : ?>
                    <a href="#<?php echo esc_attr($group['id']); ?>" class="<?php echo esc_attr($chip); ?>"><?php echo esc_html($group['title']); ?></a>
                <?php endforeach; ?>
                <a href="#size-guide" class="<?php echo esc_attr($chip); ?>"><?php esc_html_e('Size guide', 'dawp'); ?></a>
            </nav>
        </div>
    </section>

    <section class="py-14 sm:py-20">
        <div class="mx-auto grid max-w-5xl gap-14 px-4 sm:px-6 lg:px-8">
            <?php foreach ($groups as $group) : ?>
                <div id="<?php echo esc_attr($group['id']); ?>" class="scroll-mt-24">
                    <h2 class="font-display flex items-center gap-3 text-3xl uppercase sm:text-4xl"><span class="text-xl text-accent" aria-hidden="true">★</span><?php echo esc_html($group['title']); ?></h2>
                    <div class="mt-5 grid gap-3">
                        <?php foreach ($group['items'] as $item) : ?>
                            <details class="group rounded-lg border border-border bg-[#FFFFFF] transition open:border-border-strong open:shadow-card-hover">
                                <summary class="flex min-h-14 cursor-pointer list-none items-center justify-between gap-4 px-5 py-4 text-base font-bold [&::-webkit-details-marker]:hidden">
                                    <span><?php echo esc_html($item[0]); ?></span>
                                    <span class="inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-full border border-border-strong text-lg leading-none transition group-open:rotate-45 group-open:border-accent group-open:bg-accent group-open:text-background" aria-hidden="true">+</span>
                                </summary>
                                <div class="border-t border-border px-5 py-4 text-[0.95rem] leading-7 text-foreground-muted">
                                    <?php echo wp_kses($item[1], ['a' => ['class' => [], 'href' => []]]); ?>
                                </div>
                            </details>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>

            <div id="size-guide" class="scroll-mt-24 rounded-lg border border-border border-t-4 border-t-accent-2 bg-surface p-6 sm:p-8">
                <h2 class="font-display text-3xl uppercase sm:text-4xl"><?php esc_html_e('Size guide', 'dawp'); ?></h2>
                <p class="mt-3 text-[0.95rem] leading-7 text-foreground-muted"><?php esc_html_e('Our apparel includes t-shirts, hoodies and zip-ups, sweatshirts, polo shirts and bomber jackets, and fit varies by style. Each product page shows the size chart for that exact item — always check it before ordering.', 'dawp'); ?></p>
                <div class="mt-6 grid gap-4 sm:grid-cols-3">
                    <?php
                    $measure = [
                        [__('Chest / width', 'dawp'), __('Lay a shirt that fits you well flat and measure straight across, armpit to armpit.', 'dawp')],
                        [__('Length', 'dawp'), __('Measure from the highest point of the shoulder down to the bottom hem.', 'dawp')],
                        [__('Compare', 'dawp'), __('Match those numbers to the chart on the product page. Between sizes? Size up for a relaxed fit.', 'dawp')],
                    ];
                    foreach ($measure as $i => $row) :
                        ?>
                        <div class="rounded-md border border-border bg-[#FFFFFF] p-4">
                            <span class="font-stencil text-2xl text-accent"><?php echo esc_html(str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT)); ?></span>
                            <p class="mt-1 font-heading text-base font-bold uppercase"><?php echo esc_html($row[0]); ?></p>
                            <p class="mt-1 text-sm leading-6 text-foreground-muted"><?php echo esc_html($row[1]); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
                <p class="mt-5 text-sm text-foreground-muted"><?php esc_html_e('Hats and caps are adjustable unless the product page lists sizes. Flags and metal signs show their dimensions on each product page.', 'dawp'); ?></p>
            </div>

            <div class="rounded-lg border-t-4 border-highlight bg-foreground p-6 text-background sm:flex sm:items-center sm:justify-between sm:gap-6 sm:p-8">
                <div>
                    <h2 class="font-display text-3xl uppercase"><?php esc_html_e('Still have a question?', 'dawp'); ?></h2>
                    <p class="mt-2 text-sm text-background/75"><?php esc_html_e('Email support@proudlywear.com — we reply within 24 hours, Monday to Friday.', 'dawp'); ?></p>
                </div>
                <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="mt-5 inline-flex min-h-12 shrink-0 items-center rounded-md bg-accent px-6 font-heading text-base font-bold uppercase tracking-wider text-background transition hover:bg-accent-hover sm:mt-0"><?php esc_html_e('Contact support', 'dawp'); ?></a>
            </div>
        </div>
    </section>
</div>
