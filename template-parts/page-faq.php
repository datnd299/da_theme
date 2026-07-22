<?php
/**
 * FAQs page for MegaMallDepot.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$store_name     = 'MegaMallDepot';
$site_domain    = 'megamalldepot.com';
$support_email  = 'support@megamalldepot.com';
$support_phone  = '826-207-1399';
$store_address  = '57 Calvert St, Woodbridge, VA 22191-2840';
$business_hours = __('Monday - Friday, 9:00 AM - 5:00 PM, GMT-08:00 Pacific Standard Time', 'dawp');
$shop_url       = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$shipping_url = home_url('/shipping-policy/');
$returns_url  = home_url('/return-refund-policy/');
$privacy_url  = home_url('/privacy-policy/');
$terms_url    = home_url('/terms-conditions/');
$track_url    = home_url('/track-order/');
$contact_url  = home_url('/contact-us/');
$last_updated = __('May 29, 2026', 'dawp');

$policy_highlights = [
    [
        'title' => __('Free U.S. Shipping', 'dawp'),
        'copy'  => __('Standard shipping is free nationwide within the United States, with no minimum purchase requirement.', 'dawp'),
    ],
    [
        'title' => __('30-Day Returns', 'dawp'),
        'copy'  => __('Eligible unused items may be returned within 30 days of documented delivery.', 'dawp'),
    ],
    [
        'title' => __('Secure Checkout', 'dawp'),
        'copy'  => __('Payments are processed through encrypted checkout and certified third-party payment gateways.', 'dawp'),
    ],
];

$faq_groups = [
    [
        'label' => __('Orders & Shipping', 'dawp'),
        'items' => [
            [
                'question' => __('Where does MegaMallDepot ship?', 'dawp'),
                'answer'   => __('MegaMallDepot currently ships exclusively within the United States domestic market. If a destination or carrier limitation prevents delivery to your address, checkout will notify you before payment is processed.', 'dawp'),
            ],
            [
                'question' => __('How much does shipping cost?', 'dawp'),
                'answer'   => __('Standard U.S. shipping is free ($0.00) for all orders nationwide with no minimum purchase requirement. If optional upgraded shipping is available, the exact cost is displayed at checkout before payment.', 'dawp'),
            ],
            [
                'question' => __('What is the daily order cutoff time?', 'dawp'),
                'answer'   => __('The daily order cutoff time is 5:00 PM (GMT-08:00) Pacific Standard Time (Monday to Friday). Orders placed after the cutoff begin processing on the following business day.', 'dawp'),
            ],
            [
                'question' => __('How long does order handling and delivery take?', 'dawp'),
                'answer'   => __('Order handling takes 1-2 business days (Monday to Friday), excluding standard U.S. public holidays. Standard transit takes 3-5 business days (Monday to Friday), so estimated delivery is 4-7 business days total from the date of purchase.', 'dawp'),
            ],
            [
                'question' => __('Which carriers do you use?', 'dawp'),
                'answer'   => __('Orders are shipped with trusted domestic U.S. carriers such as USPS, UPS, FedEx, or DHL. The final carrier is selected when your package is labeled and prepared for dispatch.', 'dawp'),
            ],
            [
                'question' => __('Will I receive tracking information?', 'dawp'),
                'answer'   => __('Yes. Once your order is dispatched, an automated shipping confirmation email with a direct tracking link and courier details is sent to the email address used at checkout.', 'dawp'),
            ],
            [
                'question' => __('Why did my items ship separately?', 'dawp'),
                'answer'   => __('Multi-item orders may ship in separate packages if products are prepared from different fulfillment batches or require different packing methods. You will receive tracking details for each package when available.', 'dawp'),
            ],
            [
                'question' => __('Can I change my shipping address after placing an order?', 'dawp'),
                'answer'   => __('Contact support as soon as possible with your order number and the correct address. Address changes cannot be guaranteed once an order has entered processing, been labeled, or shipped.', 'dawp'),
            ],
        ],
    ],
    [
        'label' => __('Returns & Refunds', 'dawp'),
        'items' => [
            [
                'question' => __('What is the return window?', 'dawp'),
                'answer'   => __('You must initiate your return request within 30 days of delivery. Returns are accepted for eligible defective and non-defective products in new condition.', 'dawp'),
            ],
            [
                'question' => __('Which products are eligible for return?', 'dawp'),
                'answer'   => __('Eligible items must be unused, undamaged, and in their original, unaltered condition (New only) with all original packaging, manuals, labels, parts, accessories, boxes, and included components.', 'dawp'),
            ],
            [
                'question' => __('How do I start a return?', 'dawp'),
                'answer'   => __('Email support or use the Contact Us page within 30 days of delivery. Include your order number, checkout email, item(s) you want to return, the return reason, and photos or videos if the item arrived damaged or incorrect.', 'dawp'),
            ],
            [
                'question' => __('Who pays return shipping?', 'dawp'),
                'answer'   => __('The customer is responsible for paying all return shipping costs for both defective/damaged items and change of mind returns. We do not cover return shipping fees or provide prepaid shipping labels.', 'dawp'),
            ],
            [
                'question' => __('Do you charge restocking fees?', 'dawp'),
                'answer'   => __('No. MegaMallDepot does not charge restocking fees ($0.00) for eligible returns.', 'dawp'),
            ],
            [
                'question' => __('Do you offer exchanges?', 'dawp'),
                'answer'   => __('We do not process direct one-for-one product exchanges. To get a different size, color, or model, return the original eligible item for a refund and place a new order on the website.', 'dawp'),
            ],
            [
                'question' => __('When will I receive my refund?', 'dawp'),
                'answer'   => __('Once your return package is received, we inspect it within 1-2 business days. Approved refunds are processed automatically to the original payment method within 7 business days. If you have not received your refund after 15 business days of approval, contact support after checking with your bank or credit card company.', 'dawp'),
            ],
            [
                'question' => __('Which items are non-returnable?', 'dawp'),
                'answer'   => __('Items marked as Final Sale or Non-Returnable, gift cards or digital products/downloads, personalized or custom-made items, hygiene-sensitive sealed or consumable items with broken seals, and items used, installed, altered, or damaged after delivery are not eligible for return.', 'dawp'),
            ],
            [
                'question' => __('What should I do if my package is damaged or lost?', 'dawp'),
                'answer'   => __('For damaged orders, contact us within 30 days of delivery with photos of the item, shipping packaging, and shipping label. For missing packages, stalled tracking, or packages marked delivered but not received, contact us within 30 days of the recorded delivery date so we can investigate with the carrier and arrange a replacement or refund if the package is confirmed lost.', 'dawp'),
            ],
        ],
    ],
    [
        'label' => __('Products & Store', 'dawp'),
        'items' => [
            [
                'question' => __('What does MegaMallDepot sell?', 'dawp'),
                'answer'   => __('MegaMallDepot focuses on practical home essentials, furniture, electronics, smart home products, kitchen and dining products, outdoor living items, and other home, electronics and lifestyle products.', 'dawp'),
            ],
            [
                'question' => __('Do product photos and colors always look exactly the same in person?', 'dawp'),
                'answer'   => __('We work to present descriptions, images, prices, materials, dimensions, and availability as accurately as reasonably possible. Small differences in color, texture, or appearance may occur because of screen settings, digital photography lighting, or supplier updates.', 'dawp'),
            ],
            [
                'question' => __('Do you sell counterfeit or replica products?', 'dawp'),
                'answer'   => __('No. MegaMallDepot does not sell counterfeit goods, replica logos, unauthorized branded items, dietary supplements, medical devices, regulated products, or items with unverified health claims.', 'dawp'),
            ],
            [
                'question' => __('Do your products make medical, safety, or treatment claims?', 'dawp'),
                'answer'   => __('No. Our catalog is focused on home, electronics and lifestyle products. We do not sell dietary supplements, medical devices, regulated products, or items with unverified health claims.', 'dawp'),
            ],
            [
                'question' => __('Where can I find product details?', 'dawp'),
                'answer'   => __('Product pages include available details such as item use, materials, dimensions, capacity, care notes, price, and availability. Please review the product page before ordering and contact support if you need clarification.', 'dawp'),
            ],
        ],
    ],
    [
        'label' => __('Payment, Privacy & Support', 'dawp'),
        'items' => [
            [
                'question' => __('Is checkout secure?', 'dawp'),
                'answer'   => __('Yes. Checkout transactions are executed over an encrypted SSL connection and payment processing is handled by certified third-party payment gateways that follow PCI-DSS standards.', 'dawp'),
            ],
            [
                'question' => __('Does MegaMallDepot store my full credit card number?', 'dawp'),
                'answer'   => __('No. MegaMallDepot does not store, view, or retain raw credit card numbers or sensitive payment credentials on our corporate servers.', 'dawp'),
            ],
            [
                'question' => __('How is my information used?', 'dawp'),
                'answer'   => __('Customer information is used to process, bill, manage, and ship orders; send tracking and invoices; provide support; handle returns; improve site performance; prevent fraud; and meet legal or accounting obligations.', 'dawp'),
            ],
            [
                'question' => __('Can I request access, correction, or deletion of my personal data?', 'dawp'),
                'answer'   => __('Depending on your location and applicable U.S. state privacy laws, you may request access to, correction of, or deletion of personal data we maintain. Submit privacy requests through support.', 'dawp'),
            ],
            [
                'question' => __('How do I contact MegaMallDepot?', 'dawp'),
                'answer'   => sprintf(
                    /* translators: 1: email address, 2: phone number, 3: business hours, 4: store address */
                    __('Email %1$s, call %2$s, or use the Contact Us page. Customer service hours are %3$s. Our business address is %4$s.', 'dawp'),
                    $support_email,
                    $support_phone,
                    $business_hours,
                    $store_address
                ),
            ],
        ],
    ],
];

$quick_links = [
    [
        'title' => __('Track Order', 'dawp'),
        'copy'  => __('Check shipment status after your tracking email arrives.', 'dawp'),
        'url'   => $track_url,
    ],
    [
        'title' => __('Shipping Policy', 'dawp'),
        'copy'  => __('Review U.S. shipping scope, free standard shipping, handling, transit, carriers, and tracking.', 'dawp'),
        'url'   => $shipping_url,
    ],
    [
        'title' => __('Return & Refund Policy', 'dawp'),
        'copy'  => __('Review eligibility, return shipping fees, RMA steps, refund timing, and non-returnable items.', 'dawp'),
        'url'   => $returns_url,
    ],
    [
        'title' => __('Privacy Policy', 'dawp'),
        'copy'  => __('Learn how customer information, cookies, payment security, retention, and privacy requests are handled.', 'dawp'),
        'url'   => $privacy_url,
    ],
    [
        'title' => __('Terms & Conditions', 'dawp'),
        'copy'  => __('Read the store terms covering website use, orders, payments, policies, and limitations.', 'dawp'),
        'url'   => $terms_url,
    ],
];
?>

<div class="bg-white text-[#2B2B2B]">
    <section class="bg-[#F8F5F0] py-14 sm:py-20" aria-labelledby="faq-title">
        <div class="mx-auto flex max-w-3xl flex-col items-center justify-center px-4 text-center sm:px-6 lg:px-8">
            <p class="text-center text-sm font-extrabold uppercase tracking-[0.14em] text-[#A45A3F]"><?php esc_html_e('FAQs', 'dawp'); ?></p>
            <h1 id="faq-title" class="mt-4 text-center font-heading text-4xl font-extrabold leading-tight text-[#2B2B2B] sm:text-5xl">
                <?php esc_html_e('Quick answers for shopping with MegaMallDepot.', 'dawp'); ?>
            </h1>
            <p class="mx-auto mt-5 max-w-2xl text-center text-base leading-8 text-[#4A4A4A]">
                <?php
                echo esc_html(
                    sprintf(
                        /* translators: 1: store name, 2: site domain */
                        __('Find policy-aligned answers about orders, shipping, returns, refunds, products, privacy, and support when shopping with %1$s through %2$s.', 'dawp'),
                        $store_name,
                        $site_domain
                    )
                );
                ?>
            </p>
            <div class="mt-6 rounded-md border border-[#E8E5DF] bg-white px-5 py-4 shadow-sm">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A45A3F]"><?php esc_html_e('Last Updated', 'dawp'); ?></p>
                <p class="mt-2 font-heading text-2xl font-extrabold text-[#2B2B2B]"><?php echo esc_html($last_updated); ?></p>
            </div>
        </div>
    </section>

    <section class="bg-[#FFFFFF] py-14 sm:py-20" aria-labelledby="faq-content-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.78fr_1.22fr] lg:px-8">
            <aside class="hidden lg:block lg:sticky lg:top-24 lg:self-start">
                <div class="rounded-md border border-[#E8E5DF] bg-white p-6 shadow-sm">
                    <h2 id="faq-content-title" class="font-heading text-2xl font-extrabold text-[#2B2B2B]"><?php esc_html_e('Helpful links', 'dawp'); ?></h2>
                    <p class="mt-4 text-sm leading-7 text-[#4A4A4A]">
                        <?php esc_html_e('This FAQ summarizes the current store policies. Review the full policy pages for complete details before placing an order, requesting a return, or submitting a privacy request.', 'dawp'); ?>
                    </p>
                    <div class="mt-6 grid gap-3">
                        <?php foreach ($quick_links as $link) : ?>
                            <a href="<?php echo esc_url($link['url']); ?>" class="block w-full rounded-md border border-[#E8E5DF] bg-[#FFFFFF] p-4 transition hover:border-[#D0B8AE] hover:bg-[#F8F5F0]">
                                <span class="block font-heading text-base font-extrabold text-[#2B2B2B]"><?php echo esc_html($link['title']); ?></span>
                                <span class="mt-2 block text-sm leading-6 text-[#4A4A4A]"><?php echo esc_html($link['copy']); ?></span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </aside>

            <div class="grid gap-5">
                <?php foreach ($faq_groups as $group) : ?>
                    <section class="rounded-md border border-[#E8E5DF] bg-white p-6 shadow-sm" aria-labelledby="<?php echo esc_attr(sanitize_title($group['label'])); ?>">
                        <h2 id="<?php echo esc_attr(sanitize_title($group['label'])); ?>" class="font-heading text-xl font-extrabold text-[#2B2B2B]"><?php echo esc_html($group['label']); ?></h2>
                        <div class="mt-6 divide-y divide-[#E8E5DF]">
                            <?php foreach ($group['items'] as $item) : ?>
                                <details class="group py-5 first:pt-0 last:pb-0">
                                    <summary class="flex cursor-pointer list-none items-start justify-between gap-4 text-left font-heading text-lg font-extrabold text-[#2B2B2B]">
                                        <span><?php echo esc_html($item['question']); ?></span>
                                        <span class="mt-1 flex h-7 w-7 shrink-0 items-center justify-center rounded-md bg-[#F8F5F0] text-[#A45A3F] transition group-open:rotate-45" aria-hidden="true">+</span>
                                    </summary>
                                    <p class="mt-3 text-sm leading-7 text-[#4A4A4A]"><?php echo esc_html($item['answer']); ?></p>
                                </details>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php endforeach; ?>

                <article class="rounded-md border border-[#E8E5DF] bg-[#F8F5F0] p-6 shadow-sm">
                    <h2 class="font-heading text-xl font-extrabold text-[#2B2B2B]"><?php esc_html_e('Still need help?', 'dawp'); ?></h2>
                    <p class="mt-4 text-sm leading-7 text-[#4A4A4A]">
                        <?php
                        echo esc_html(
                            sprintf(
                                /* translators: 1: email address, 2: business hours */
                                __('Email %1$s or use the Contact Us page with your order number, checkout email, and a short description of the issue. Customer service hours are %2$s.', 'dawp'),
                                $support_email,
                                $business_hours
                            )
                        );
                        ?>
                    </p>
                    <dl class="mt-5 grid gap-4 md:grid-cols-3">
                        <div class="rounded-md border border-[#E8E5DF] bg-white p-5">
                            <dt class="text-sm font-extrabold text-[#2B2B2B]"><?php esc_html_e('Customer Support Email', 'dawp'); ?></dt>
                            <dd class="mt-3 text-sm leading-7 text-[#4A4A4A]">
                                <a class="font-bold text-[#A45A3F] underline decoration-[#A45A3F]/40 underline-offset-4 transition hover:text-[#7F422F]" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
                            </dd>
                        </div>
                        <div class="rounded-md border border-[#E8E5DF] bg-white p-5">
                            <dt class="text-sm font-extrabold text-[#2B2B2B]"><?php esc_html_e('Customer Support Phone', 'dawp'); ?></dt>
                            <dd class="mt-3 text-sm leading-7 text-[#4A4A4A]">
                                <a class="font-bold text-[#A45A3F] underline decoration-[#A45A3F]/40 underline-offset-4 transition hover:text-[#7F422F]" href="tel:<?php echo esc_attr($support_phone); ?>"><?php echo esc_html($support_phone); ?></a>
                            </dd>
                        </div>
                        <div class="rounded-md border border-[#E8E5DF] bg-white p-5">
                            <dt class="text-sm font-extrabold text-[#2B2B2B]"><?php esc_html_e('Business Address', 'dawp'); ?></dt>
                            <dd class="mt-3 text-sm leading-7 text-[#4A4A4A]"><?php echo esc_html($store_address); ?></dd>
                        </div>
                    </dl>
                    <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                        <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#A45A3F] px-6 text-sm font-bold text-white transition hover:bg-[#7F422F]">
                            <?php esc_html_e('Contact Us', 'dawp'); ?>
                        </a>
                        <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#A45A3F] bg-white px-6 text-sm font-bold text-[#A45A3F] transition hover:bg-[#F8F5F0]">
                            <?php esc_html_e('Shop Products', 'dawp'); ?>
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </section>
</div>
