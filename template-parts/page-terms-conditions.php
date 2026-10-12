<?php
/**
 * Terms of Service — SlickTee.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$email_link    = '<a href="mailto:support@slicktee.com">support@slicktee.com</a>';
$shipping_link = '<a href="' . esc_url(home_url('/shipping-returns/')) . '">' . esc_html__('Shipping Information', 'dawp') . '</a>';
$returns_link  = '<a href="' . esc_url(home_url('/shipping-returns/#returns')) . '">' . esc_html__('Refund & Return Policy', 'dawp') . '</a>';
$privacy_link  = '<a href="' . esc_url(home_url('/privacy-policy/')) . '">' . esc_html__('Privacy Policy', 'dawp') . '</a>';

$sections = [
    [
        'id'    => 'agreement',
        'title' => __('1. Agreement to these terms', 'dawp'),
        'body'  => '<p>' . esc_html__('These Terms of Service apply to your use of slicktee.com, operated by SlickTee. By using the site or placing an order you agree to these terms. We may update them from time to time; the version posted on this page when you place an order applies to that order.', 'dawp') . '</p>',
    ],
    [
        'id'    => 'ordering',
        'title' => __('2. Ordering', 'dawp'),
        'body'  => '<p>' . esc_html__('You place an order by completing our online checkout, where you can review your order and correct any errors before paying. We then email you an order acknowledgement. Our acceptance of your order takes place when the order status changes to “processing”, which we confirm by email.', 'dawp') . '</p><p>' . esc_html__('We may refuse or cancel an order if we cannot obtain payment authorization, if an item was listed at an obvious pricing error, or if we suspect fraud or unauthorized activity. If we cancel an order after payment, you receive a full refund.', 'dawp') . '</p>',
    ],
    [
        'id'    => 'made-to-order',
        'title' => __('3. Made-to-order products', 'dawp'),
        'body'  => '<p>' . sprintf(esc_html__('Our products are printed on demand specifically for you after your order is confirmed. You can change or cancel an order within 24 hours of placing it; after that it goes into production. Because items are bespoke, returns are accepted only for damaged, defective or incorrect items, as described in our %s.', 'dawp'), $returns_link) . '</p><p>' . esc_html__('We make every effort to show products accurately, but colors on screen may vary slightly from the finished print, and the vintage wash and hand-finishing mean each piece can differ a little from the photos.', 'dawp') . '</p>',
    ],
    [
        'id'    => 'pricing',
        'title' => __('4. Pricing & taxes', 'dawp'),
        'body'  => '<p>' . sprintf(esc_html__('Prices are shown in US dollars and may change without notice; the price that applies is the one shown at checkout when you order. Shipping fees are added at checkout (see %s). Where required by law, applicable sales tax or VAT is calculated and shown at checkout. International orders may be subject to import duties or taxes charged by the destination country, which are the recipient’s responsibility.', 'dawp'), $shipping_link) . '</p>',
    ],
    [
        'id'    => 'payment',
        'title' => __('5. Payment methods', 'dawp'),
        'body'  => '<p>' . esc_html__('We accept Visa, Mastercard, American Express and PayPal. Because work on your order starts right away, your payment method is charged when your order is placed. By paying, you confirm that the payment information you provide is accurate and that you are authorized to use that payment method.', 'dawp') . '</p><p>' . esc_html__('To pay: add items to your cart, enter your email and shipping address at checkout, choose a payment method, enter your details and click “Place order”.', 'dawp') . '</p><p>' . sprintf(esc_html__('If a payment method doesn’t work at checkout, contact %s and we’ll help.', 'dawp'), $email_link) . '</p>',
    ],
    [
        'id'    => 'fraud',
        'title' => __('6. Fraud protection', 'dawp'),
        'body'  => '<p>' . esc_html__('We screen orders for fraud and unauthorized or illegal activity. We may decline to process an order, or cancel related orders or accounts, where we reasonably suspect fraud or a breach of these terms.', 'dawp') . '</p>',
    ],
    [
        'id'    => 'ip',
        'title' => __('7. Intellectual property & DMCA', 'dawp'),
        'body'  => '<p>' . esc_html__('Our designs are fan-made artwork. Characters, names and trademarks referenced on this site belong to their respective owners, and SlickTee is not affiliated with or endorsed by them unless stated. The site’s own content — layout, text, photos and graphics — is owned by SlickTee or its licensors and may not be copied without permission.', 'dawp') . '</p><p>' . sprintf(esc_html__('We respect intellectual property rights. If you believe a product on our site infringes your copyright, trademark or other rights, email %s with:', 'dawp'), $email_link) . '</p><ul><li>' . esc_html__('your physical or electronic signature as the rights owner or authorized agent;', 'dawp') . '</li><li>' . esc_html__('the URL(s) of the product(s) concerned;', 'dawp') . '</li><li>' . esc_html__('identification of the rights infringed, with proof of ownership (e.g. registration copies);', 'dawp') . '</li><li>' . esc_html__('your full name, address, phone number and email;', 'dawp') . '</li><li>' . esc_html__('a statement of good-faith belief that the use is not authorized by the rights owner; and', 'dawp') . '</li><li>' . esc_html__('a statement, under penalty of perjury, that your notice is accurate and that you are authorized to act for the owner.', 'dawp') . '</li></ul><p>' . esc_html__('We remove or block material we believe in good faith to be infringing after receiving a complete notice. If you believe material was removed by mistake, you may send a counter-notice with the same contact details, identification of the removed material, and a statement under penalty of perjury that it was removed by mistake. Material may be restored 10–14 business days after a valid counter-notice unless the rights owner files a court action.', 'dawp') . '</p>',
    ],
    [
        'id'    => 'submissions',
        'title' => __('8. Comments & submissions', 'dawp'),
        'body'  => '<p>' . esc_html__('We welcome feedback and design suggestions. By sending us comments or ideas you grant SlickTee a worldwide, royalty-free, non-exclusive licence to use them, and you confirm they don’t infringe anyone else’s rights or contain unlawful, abusive or obscene material. Please don’t send confidential information or original artwork you don’t want to share.', 'dawp') . '</p>',
    ],
    [
        'id'    => 'use',
        'title' => __('9. Acceptable use', 'dawp'),
        'body'  => '<p>' . esc_html__('You agree not to misuse the site — for example by attempting unauthorized access, scraping, interfering with its operation, or using it for any unlawful purpose.', 'dawp') . '</p>',
    ],
    [
        'id'    => 'liability',
        'title' => __('10. Limitation of liability', 'dawp'),
        'body'  => '<p>' . esc_html__('To the extent permitted by law, SlickTee is not liable for indirect or consequential losses arising from use of the site or our products, and our total liability for any order is limited to the amount you paid for it. Nothing in these terms limits rights you have under applicable consumer protection law.', 'dawp') . '</p>',
    ],
    [
        'id'    => 'privacy',
        'title' => __('11. Privacy', 'dawp'),
        'body'  => '<p>' . sprintf(esc_html__('How we handle your personal information is explained in our %s.', 'dawp'), $privacy_link) . '</p>',
    ],
    [
        'id'    => 'law',
        'title' => __('12. Governing law', 'dawp'),
        'body'  => '<p>' . esc_html__('These terms are governed by the laws of England and Wales. If you are a consumer, you also benefit from any mandatory protections of the law of the country where you live.', 'dawp') . '</p>',
    ],
];

$allowed = ['p' => [], 'ul' => [], 'li' => [], 'strong' => [], 'a' => ['href' => []]];
?>

<div class="bg-[#FBF7EF] text-[#17140F]">
    <section class="border-b-2 border-[#17140F] py-14 sm:py-20" aria-labelledby="terms-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <span class="inline-flex -rotate-2 rounded-[4px] border-2 border-[#17140F] bg-[#F2B33D] px-3 py-1 text-xs font-extrabold uppercase tracking-[0.18em]"><?php esc_html_e('Policies', 'dawp'); ?></span>
            <h1 id="terms-title" class="font-display mt-5 text-5xl uppercase leading-[0.95] sm:text-7xl"><?php esc_html_e('Terms of service', 'dawp'); ?></h1>
            <p class="mt-5 max-w-2xl text-lg leading-relaxed text-[#4A4339]"><?php esc_html_e('The rules for using slicktee.com and buying from us — ordering, payment, made-to-order products and intellectual property.', 'dawp'); ?></p>
            <p class="mt-4 text-sm font-bold text-[#6F665A]"><?php esc_html_e('Last updated: October 2026', 'dawp'); ?></p>
        </div>
    </section>

    <section class="py-14 sm:py-20">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[260px_1fr] lg:px-8">
            <nav class="lg:sticky lg:top-6 lg:self-start" aria-label="<?php esc_attr_e('On this page', 'dawp'); ?>">
                <p class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#6F665A]"><?php esc_html_e('On this page', 'dawp'); ?></p>
                <ul class="mt-3 grid border-l-2 border-[#17140F]">
                    <?php foreach ($sections as $section) : ?>
                        <li><a href="#<?php echo esc_attr($section['id']); ?>" class="block py-1.5 pl-4 text-sm font-bold transition hover:bg-[#F4EDE0] hover:text-[#D7351E]"><?php echo esc_html($section['title']); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <div class="rounded-[14px] border-2 border-[#17140F] bg-[#FFFFFF] p-6 sm:p-10">
                <div class="grid gap-10">
                    <?php foreach ($sections as $section) : ?>
                        <article id="<?php echo esc_attr($section['id']); ?>" class="scroll-mt-6">
                            <h2 class="font-heading text-xl font-extrabold uppercase sm:text-2xl"><?php echo esc_html($section['title']); ?></h2>
                            <div class="mt-3 grid gap-3 text-[0.95rem] leading-7 text-[#4A4339] [&_a]:font-bold [&_a]:text-[#17140F] [&_a]:underline [&_a]:decoration-[#D7351E] [&_a]:decoration-2 [&_a]:underline-offset-4 [&_ul]:grid [&_ul]:list-disc [&_ul]:gap-1.5 [&_ul]:pl-5">
                                <?php echo wp_kses($section['body'], $allowed); ?>
                            </div>
                        </article>
                    <?php endforeach; ?>

                    <article class="rounded-[8px] border-2 border-dashed border-[#17140F] bg-[#F4EDE0] p-5 text-sm leading-7 text-[#4A4339]">
                        <h2 class="font-heading text-lg font-extrabold uppercase text-[#17140F]"><?php esc_html_e('Contact', 'dawp'); ?></h2>
                        <p class="mt-2">
                            SlickTee · slicktee.com<br>
                            <?php esc_html_e('US Address: 304 S. Jones Blvd #3456, Las Vegas, NV 89107, United States', 'dawp'); ?><br>
                            <a class="font-bold text-[#17140F] underline" href="mailto:support@slicktee.com">support@slicktee.com</a> · <?php esc_html_e('US +1 909-366-3939', 'dawp'); ?>
                        </p>
                    </article>
                </div>
            </div>
        </div>
    </section>
</div>
