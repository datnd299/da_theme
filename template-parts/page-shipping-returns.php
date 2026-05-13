<?php
/**
 * Shipping and returns page template part.
 *
 * @package dawp
 */

$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$support_email = 'support@vivisshop.com';
$support_link = '<a class="font-semibold text-[#4B3528] underline decoration-[#B89B83] underline-offset-4" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>';
$support_link_on_dark = '<a class="font-semibold text-white underline decoration-[#B89B83] underline-offset-4" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>';
$link_support_email = static function ($text, $link) use ($support_email) {
    return str_replace(esc_html($support_email), $link, esc_html($text));
};

$summary_cards = [
    ['title' => __('Processing Time', 'dawp'), 'copy' => __('Orders are prepared within 2-4 business days before dispatch.', 'dawp')],
    ['title' => __('US Delivery', 'dawp'), 'copy' => __('Standard US shipping typically takes 5-10 business days after dispatch.', 'dawp')],
    ['title' => __('Tracking Included', 'dawp'), 'copy' => __('A tracking email is sent once your order has shipped.', 'dawp')],
    ['title' => __('30-Day Returns', 'dawp'), 'copy' => __('Eligible unworn items may be returned within 30 days of delivery.', 'dawp')],
];

$return_steps = [
    __('Email support@vivisshop.com within 30 days of delivery with your order number and return reason.', 'dawp'),
    __('Wait for return instructions before sending anything back so we can match the package to your order.', 'dawp'),
    __('Ship the approved item in original condition with packaging and tags where applicable.', 'dawp'),
    __('After inspection, approved refunds are issued to the original payment method.', 'dawp'),
];
?>

<div class="bg-white text-[#2F2925]">
    <section class="bg-[#FFF8EF] py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl">
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#8C6D58]"><?php esc_html_e('Customer Care', 'dawp'); ?></p>
                <h1 class="mt-4 font-heading text-5xl font-bold leading-tight text-[#4B3528] sm:text-6xl">
                    <?php esc_html_e('Shipping & Returns', 'dawp'); ?>
                </h1>
                <p class="mt-6 max-w-3xl text-lg leading-8 text-[#756A62]">
                    <?php esc_html_e('Clear delivery and return information for Vivisshop orders. Please review these timelines before placing an order so your shopping experience feels simple and transparent.', 'dawp'); ?>
                </p>
            </div>
            <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <?php foreach ($summary_cards as $card) : ?>
                    <div class="rounded-2xl border border-[#E7D8C8] bg-white p-6 shadow-sm">
                        <h2 class="text-lg font-bold text-[#4B3528]"><?php echo esc_html($card['title']); ?></h2>
                        <p class="mt-3 text-sm leading-6 text-[#756A62]"><?php echo esc_html($card['copy']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 lg:py-20">
        <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[0.72fr_1.28fr] lg:px-8">
            <aside class="rounded-2xl border border-[#E7D8C8] bg-[#FFF8EF] p-6 lg:sticky lg:top-8 lg:self-start">
                <h2 class="font-heading text-3xl font-bold text-[#4B3528]"><?php esc_html_e('Quick Policy Summary', 'dawp'); ?></h2>
                <div class="mt-5 space-y-4 text-sm leading-6 text-[#756A62]">
                    <p><strong class="text-[#4B3528]"><?php esc_html_e('Market:', 'dawp'); ?></strong> <?php esc_html_e('United States', 'dawp'); ?></p>
                    <p><strong class="text-[#4B3528]"><?php esc_html_e('Processing:', 'dawp'); ?></strong> <?php esc_html_e('2-4 business days', 'dawp'); ?></p>
                    <p><strong class="text-[#4B3528]"><?php esc_html_e('Delivery:', 'dawp'); ?></strong> <?php esc_html_e('5-10 business days after dispatch', 'dawp'); ?></p>
                    <p><strong class="text-[#4B3528]"><?php esc_html_e('Return window:', 'dawp'); ?></strong> <?php esc_html_e('30 days from delivery', 'dawp'); ?></p>
                    <p><strong class="text-[#4B3528]"><?php esc_html_e('Support:', 'dawp'); ?></strong> <a class="font-semibold text-[#4B3528] underline decoration-[#B89B83] underline-offset-4" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a></p>
                </div>
            </aside>

            <div class="space-y-6">
                <section class="rounded-2xl border border-[#E7D8C8] bg-white p-6 shadow-sm sm:p-8">
                    <h2 class="font-heading text-3xl font-bold text-[#4B3528]"><?php esc_html_e('Shipping Policy', 'dawp'); ?></h2>
                    <div class="mt-5 space-y-4 text-base leading-8 text-[#756A62]">
                        <p><?php esc_html_e('Vivisshop currently focuses on standard shipping for customers in the United States. Orders are processed Monday through Friday, excluding holidays.', 'dawp'); ?></p>
                        <p><?php esc_html_e('Order processing usually takes 2-4 business days. After dispatch, standard US delivery typically takes 5-10 business days depending on destination, carrier capacity, weather, and other delivery conditions.', 'dawp'); ?></p>
                        <p><?php esc_html_e('Shipping fees, if applicable, are shown at checkout before payment. Please review your shipping address carefully because incomplete or incorrect addresses may delay delivery.', 'dawp'); ?></p>
                    </div>
                </section>

                <section class="rounded-2xl border border-[#E7D8C8] bg-[#FFF8EF] p-6 sm:p-8">
                    <h2 class="font-heading text-3xl font-bold text-[#4B3528]"><?php esc_html_e('Tracking & Delivery', 'dawp'); ?></h2>
                    <div class="mt-5 space-y-4 text-base leading-8 text-[#756A62]">
                        <p><?php esc_html_e('Once your order ships, we send tracking information to the email address used at checkout. Tracking updates may take 24-48 hours to appear after the carrier receives the package.', 'dawp'); ?></p>
                        <p><?php esc_html_e('If tracking shows delivered but you cannot find the package, please check your mailbox, porch, building office, household members, and neighbors first. Then contact us with your order number so we can help review the issue.', 'dawp'); ?></p>
                    </div>
                </section>

                <section class="rounded-2xl border border-[#E7D8C8] bg-white p-6 shadow-sm sm:p-8">
                    <h2 class="font-heading text-3xl font-bold text-[#4B3528]"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></h2>
                    <div class="mt-5 space-y-4 text-base leading-8 text-[#756A62]">
                        <p><?php esc_html_e('Customers may request a return within 30 days of delivery. To be eligible, items must be unworn, unwashed, unused, and in original condition with original packaging and tags where applicable.', 'dawp'); ?></p>
                        <p><?php esc_html_e('Items that show signs of wear, washing, fragrance, stains, damage caused after delivery, or missing original components may not be eligible for a refund.', 'dawp'); ?></p>
                        <p><?php esc_html_e('Return shipping costs are the customer\'s responsibility unless the item arrived damaged, defective, or incorrect. Original shipping charges are non-refundable unless required by law or caused by our error.', 'dawp'); ?></p>
                    </div>
                </section>

                <section class="rounded-2xl border border-[#E7D8C8] bg-[#F3E7DA] p-6 sm:p-8">
                    <h2 class="font-heading text-3xl font-bold text-[#4B3528]"><?php esc_html_e('How To Start A Return', 'dawp'); ?></h2>
                    <ol class="mt-6 grid gap-4 sm:grid-cols-2">
                        <?php foreach ($return_steps as $index => $step) : ?>
                            <li class="rounded-2xl bg-white p-5 text-sm leading-6 text-[#756A62]">
                                <span class="mb-3 flex h-10 w-10 items-center justify-center rounded-full bg-[#B89B83] text-sm font-bold text-white"><?php echo esc_html((string) ($index + 1)); ?></span>
                                <?php echo wp_kses_post($link_support_email($step, $support_link)); ?>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                </section>

                <section class="rounded-[2rem] bg-[#4B3528] p-6 text-white sm:p-8">
                    <h2 class="font-heading text-3xl font-bold"><?php esc_html_e('Need help with an order?', 'dawp'); ?></h2>
                    <p class="mt-4 max-w-3xl text-base leading-8 text-white/80">
                        <?php echo wp_kses_post($link_support_email(__('Email support@vivisshop.com with your order number. Business hours: Monday-Friday, 9:00 AM-5:00 PM.', 'dawp'), $support_link_on_dark)); ?>
                    </p>
                    <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                        <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-white px-7 text-sm font-bold text-[#4B3528] transition hover:bg-[#F3E7DA]"><?php esc_html_e('Email Support', 'dawp'); ?></a>
                        <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-white/25 px-7 text-sm font-bold text-white transition hover:bg-white hover:text-[#4B3528]"><?php esc_html_e('Continue Shopping', 'dawp'); ?></a>
                    </div>
                </section>
            </div>
        </div>
    </section>
</div>
