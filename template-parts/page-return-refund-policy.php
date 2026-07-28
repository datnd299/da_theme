<?php
/**
 * Return and refund policy page for Imartmy.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$store_name     = 'Imartmy';
$support_email  = 'support@imartmy.com';
$support_phone  = '+60 3-8605 3388';
$store_address  = 'Kuala Lumpur, Malaysia';
$business_hours = __('Isnin - Jumaat, 9:00 pagi - 5:00 petang, GMT+08:00 Waktu Malaysia', 'dawp');
$contact_url    = home_url('/contact-us/');
$last_updated   = __('29 Mei 2026', 'dawp');

$return_eligibility = [
    __('Tempoh Pemulangan: Anda mesti memulakan permintaan pemulangan dalam 30 hari selepas penghantaran diterima.', 'dawp'),
    __('Product Condition: Items must be unused, undamaged, in their original, unaltered condition, and suitable for resale (New only).', 'dawp'),
    __('Packaging: Items must be returned with all original packaging, manuals, labels, parts, accessories, boxes, and included components.', 'dawp'),
    __('Kaedah Pemulangan: Melalui pos sahaja.', 'dawp'),
    __('Caj Restocking: RM0.00 / Percuma. Kami tidak mengenakan caj restocking untuk pemulangan layak.', 'dawp'),
];

$return_shipping_fees = [
    [
        'title' => __('Defective, Damaged, or Incorrect Products:', 'dawp'),
        'copy'  => __('The customer is responsible for shipping the item back to our store. We do not cover return shipping costs or provide prepaid labels. If you receive a defective or damaged product, please contact us for instructions.', 'dawp'),
    ],
    [
        'title' => __('Berubah Fikiran:', 'dawp'),
        'copy'  => __('The customer is responsible for all return shipping costs. The customer must choose their own shipping carrier and prepay the return shipping fee.', 'dawp'),
    ],
];

$delivery_issues = [
    [
        'title' => __('Damaged on Arrival', 'dawp'),
        'copy'  => __('If your order arrives damaged, please contact us within 30 days of delivery with photos of the item and the shipping packaging, including the shipping label. We will assist you with the return process.', 'dawp'),
    ],
    [
        'title' => __('Lost Packages / Never Arrived', 'dawp'),
        'copy'  => __('If your tracking status shows no updates for an extended period, or is marked "Delivered" but you did not receive it, please contact us within 30 days of the recorded delivery date. We will investigate with the carrier.', 'dawp'),
    ],
];

$return_steps = [
    [
        'title' => __('Hantar Permintaan Pemulangan', 'dawp'),
        'copy'  => __('E-mel us or use our Halaman Hubungi within 30 days of delivery. Please provide your order number, the email used at checkout, the specific item(s) you wish to return, and the reason for the return with photos or videos if damaged.', 'dawp'),
    ],
    [
        'title' => __('Terima Kelulusan & Bungkus Item', 'dawp'),
        'copy'  => [
            __('Our support team will review your request within 1-2 hari bekerja. Once approved, we will email you a Return Merchandise Authorization (RMA) number and the Return Alamat details.', 'dawp'),
            __('Repack the item securely in its original packaging with all included accessories, tags, and boxes. Place it inside a sturdy outer shipping box. Write the RMA number clearly on the outside of the box.', 'dawp'),
        ],
    ],
    [
        'title' => __('Hantar Semula Ke Pusat Pemulangan Kami', 'dawp'),
        'copy'  => __('Purchase a shipping label from your preferred carrier (e.g., Pos Malaysia, J&T Express, Ninja Van, or DHL), attach it to the outside of your shipping box, and drop it off at the designated carrier location. The customer is responsible for all shipping costs. We recommend using a trackable shipping service.', 'dawp'),
    ],
];

$refund_process = [
    __('Inspection: Once your return package is received at our warehouse, we will inspect the item within 1-2 hari bekerja to ensure it meets our return criteria.', 'dawp'),
    __('Approval & Timing: If approved, your refund will be processed automatically back to your original payment method within 7 hari bekerja.', 'dawp'),
    __('Refund Method: All refunds will be issued solely to your original method of payment within 7 hari bekerja of inspection. We do not offer store credit or gift cards as a refund method for returns. Please note that original shipping costs (if any) are non-refundable.', 'dawp'),
    __('Issues with Pemulangan: If a return is approved but is found to be missing accessories, tags, boxes, or shows signs of wear, we reserve the right to refuse the refund and will offer to ship the item back to you at your expense.', 'dawp'),
    __('Delayed Refunds: If you have not received your refund after 15 hari bekerja of approval, please check with your bank or credit card company first, then contact us.', 'dawp'),
];

$non_returnable_items = [
    __('Items explicitly marked as "Final Sale" or "Non-Returnable" on the product page.', 'dawp'),
    __('Gift cards or digital products/downloads.', 'dawp'),
    __('Personalized, engraved, configured, assembled, or custom-made items.', 'dawp'),
    __('Hygiene-sensitive, sealed, or consumable items where the product seal has been broken.', 'dawp'),
    __('Items that have been used, installed, altered, or damaged after delivery.', 'dawp'),
];

$contact_cards = [
    [
        'label' => __('Nama Kedai', 'dawp'),
        'value' => $store_name,
    ],
    [
        'label' => __('Alamat', 'dawp'),
        'value' => $store_address,
    ],
    [
        'label' => __('E-mel', 'dawp'),
        'value' => $support_email,
        'url'   => 'mailto:' . $support_email,
    ],
    [
        'label' => __('Telefon', 'dawp'),
        'value' => $support_phone,
        'url'   => 'tel:' . $support_phone,
    ],
    [
        'label' => __('Hubungi Sokongan', 'dawp'),
        'value' => __('Hubungi Kami page', 'dawp'),
        'url'   => $contact_url,
    ],
    [
        'label' => __('Waktu Khidmat Pelanggan', 'dawp'),
        'value' => $business_hours,
    ],
    [
        'label' => __('Masa Respons', 'dawp'),
        'value' => __('We aim to reply within 1 hari bekerja. Response times may vary on weekends, holidays, or high-volume periods.', 'dawp'),
    ],
];

$return_faqs = [
    [
        'question' => __('Apakah tempoh pemulangan?', 'dawp'),
        'answer'   => __('Anda perlu memulakan permintaan pemulangan dalam 30 hari selepas diterima. Pemulangan diterima untuk produk layak, sama ada rosak atau tidak rosak, dalam keadaan baharu.', 'dawp'),
    ],
    [
        'question' => __('Siapa yang membayar kos penghantaran pemulangan?', 'dawp'),
        'answer'   => __('The customer is responsible for paying all return shipping costs for both defective/damaged items and change of mind returns. We do not provide prepaid return labels.', 'dawp'),
    ],
    [
        'question' => __('Adakah terdapat caj restocking?', 'dawp'),
        'answer'   => __('Tidak. Imartmy tidak mengenakan caj restocking (RM0.00) untuk pemulangan yang layak.', 'dawp'),
    ],
    [
        'question' => __('Bilakah saya akan menerima bayaran balik?', 'dawp'),
        'answer'   => __('Once your return package is received, we inspect it within 1-2 hari bekerja. Approved refunds are processed automatically to the original payment method within 7 hari bekerja.', 'dawp'),
    ],
];
?>

<div class="bg-white text-[#2B2B2B]">
    <section class="bg-[#F8F5F0] py-14 sm:py-20" aria-labelledby="return-refund-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:items-end lg:px-8">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A45A3F]"><?php esc_html_e('Polisi Pemulangan & Bayaran Balik', 'dawp'); ?></p>
                <h1 id="return-refund-title" class="mt-4 font-heading text-4xl font-extrabold leading-tight text-[#2B2B2B] sm:text-5xl">
                    <?php esc_html_e('Polisi Pemulangan & Bayaran Balik', 'dawp'); ?>
                </h1>
                <p class="mt-5 max-w-2xl text-base leading-8 text-[#4A4A4A]">
                    <?php esc_html_e('Review eligibility, return shipping fees, return steps, refund timing, exchanges, and contact details before requesting a return.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-md border border-[#E8E5DF] bg-white p-6 shadow-sm">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A45A3F]"><?php esc_html_e('Dikemas Kini', 'dawp'); ?></p>
                <p class="mt-3 font-heading text-2xl font-extrabold text-[#2B2B2B]"><?php echo esc_html($last_updated); ?></p>
                <p class="mt-4 text-sm leading-7 text-[#4A4A4A]">
                    <?php esc_html_e('Need help with a return, damaged package, or refund status? Contact our support team through the official channels below.', 'dawp'); ?>
                </p>
                <div class="mt-6 flex flex-col gap-3 sm:flex-row lg:flex-col xl:flex-row">
                    <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#A45A3F] px-6 text-sm font-bold text-white transition hover:bg-[#7F422F]">
                        <?php esc_html_e('Hubungi Sokongan', 'dawp'); ?>
                    </a>
                    <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#A45A3F] bg-white px-6 text-sm font-bold text-[#A45A3F] transition hover:bg-[#F8F5F0]">
                        <?php echo esc_html($support_email); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#FFFFFF] py-14 sm:py-20">
        <div class="mx-auto grid max-w-7xl gap-6 px-4 sm:px-6 lg:px-8">
            <article class="rounded-md border border-[#E8E5DF] bg-white p-6 shadow-sm sm:p-8">
                <h2 class="font-heading text-3xl font-extrabold text-[#2B2B2B] sm:text-4xl"><?php esc_html_e('Kelayakan Pemulangan', 'dawp'); ?></h2>
                <p class="mt-5 text-sm leading-7 text-[#4A4A4A]"><?php esc_html_e('To be eligible for a return, your item must meet the following criteria:', 'dawp'); ?></p>
                <ul class="mt-5 grid gap-3 text-sm leading-7 text-[#4A4A4A]">
                    <?php foreach ($return_eligibility as $item) : ?>
                        <li class="flex gap-3">
                            <span aria-hidden="true">&bull;</span>
                            <span><?php echo esc_html($item); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </article>

            <article class="rounded-md border border-[#E8E5DF] bg-[#F8F5F0] p-6 shadow-sm sm:p-8">
                <h2 class="font-heading text-3xl font-extrabold text-[#2B2B2B] sm:text-4xl"><?php esc_html_e('Kos Penghantaran Pemulangan', 'dawp'); ?></h2>
                <div class="mt-6 grid gap-4 lg:grid-cols-2">
                    <?php foreach ($return_shipping_fees as $fee) : ?>
                        <div class="rounded-md border border-[#E8E5DF] bg-white p-5">
                            <h3 class="font-heading text-lg font-extrabold leading-7 text-[#2B2B2B]"><?php echo esc_html($fee['title']); ?></h3>
                            <p class="mt-4 text-sm leading-7 text-[#4A4A4A]"><?php echo esc_html($fee['copy']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </article>

            <article class="rounded-md border border-[#E8E5DF] bg-white p-6 shadow-sm sm:p-8">
                <h2 class="font-heading text-3xl font-extrabold text-[#2B2B2B] sm:text-4xl"><?php esc_html_e('Isu Penghantaran Lazim', 'dawp'); ?></h2>
                <div class="mt-6 grid gap-6">
                    <?php foreach ($delivery_issues as $issue) : ?>
                        <section>
                            <h3 class="font-heading text-lg font-extrabold text-[#2B2B2B]"><?php echo esc_html($issue['title']); ?></h3>
                            <p class="mt-4 text-sm leading-7 text-[#4A4A4A]"><?php echo esc_html($issue['copy']); ?></p>
                        </section>
                    <?php endforeach; ?>
                </div>
            </article>

            <article class="rounded-md border border-[#E8E5DF] bg-[#F8F5F0] p-6 shadow-sm sm:p-8">
                <h2 class="font-heading text-3xl font-extrabold text-[#2B2B2B] sm:text-4xl"><?php esc_html_e('Cara Memulangkan Item', 'dawp'); ?></h2>
                <p class="mt-5 text-sm leading-7 text-[#4A4A4A]"><?php esc_html_e('Please follow our official 3-step process. Do not ship any item back without prior authorization, as unauthorized returns cannot be tracked or processed at our warehouse.', 'dawp'); ?></p>

                <div class="mt-6 grid gap-4">
                    <?php foreach ($return_steps as $index => $step) : ?>
                        <section class="rounded-md border border-[#E8E5DF] bg-white p-5">
                            <div class="flex items-start gap-4">
                                <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#A45A3F] text-sm font-extrabold text-white"><?php echo esc_html((string) ($index + 1)); ?></span>
                                <div>
                                    <h3 class="font-heading text-lg font-extrabold text-[#2B2B2B]"><?php echo esc_html($step['title']); ?></h3>
                                    <div class="mt-4 space-y-4 text-sm leading-7 text-[#4A4A4A]">
                                        <?php foreach ((array) $step['copy'] as $paragraph) : ?>
                                            <p><?php echo esc_html($paragraph); ?></p>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </section>
                    <?php endforeach; ?>
                </div>

                <div class="mt-5 rounded-md border border-[#D8C7BE] bg-[#F8F5F0] p-5 text-sm leading-7 text-[#2B2B2B]">
                    <p class="font-extrabold"><?php echo esc_html($store_name); ?><?php esc_html_e(' - Pemulangan Department', 'dawp'); ?></p>
                    <p class="mt-2"><?php echo esc_html($store_address); ?></p>
                </div>

                <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#A45A3F] px-6 text-sm font-bold text-white transition hover:bg-[#A45A3F]">
                        <?php esc_html_e('Hubungi Sokongan', 'dawp'); ?>
                    </a>
                    <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#A45A3F] bg-white px-6 text-sm font-bold text-[#A45A3F] transition hover:bg-[#F8F5F0]">
                        <?php echo esc_html($support_email); ?>
                    </a>
                </div>
            </article>

            <article class="rounded-md border border-[#E8E5DF] bg-white p-6 shadow-sm sm:p-8">
                <h2 class="font-heading text-3xl font-extrabold text-[#2B2B2B] sm:text-4xl"><?php esc_html_e('Pertukaran', 'dawp'); ?></h2>
                <p class="mt-5 text-sm leading-7 text-[#4A4A4A]"><?php esc_html_e('We do not process direct one-for-one product exchanges. To get a different size, color, or model, please follow the return process above to send back your original purchase for a refund, and place a new order on our website simultaneously. This ensures your desired item does not sell out.', 'dawp'); ?></p>
            </article>

            <article class="rounded-md border border-[#E8E5DF] bg-[#F8F5F0] p-6 shadow-sm sm:p-8">
                <h2 class="font-heading text-3xl font-extrabold text-[#2B2B2B] sm:text-4xl"><?php esc_html_e('Proses & Masa Bayaran Balik', 'dawp'); ?></h2>
                <ul class="mt-6 grid gap-3 text-sm leading-7 text-[#4A4A4A]">
                    <?php foreach ($refund_process as $item) : ?>
                        <li class="flex gap-3">
                            <span aria-hidden="true">&bull;</span>
                            <span><?php echo esc_html($item); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <a href="mailto:<?php echo esc_attr($support_email); ?>" class="mt-7 inline-flex min-h-12 items-center justify-center rounded-md border border-[#A45A3F] bg-white px-6 text-sm font-bold text-[#A45A3F] transition hover:bg-[#F8F5F0]">
                    <?php esc_html_e('E-mel Sokongan', 'dawp'); ?>
                </a>
            </article>

            <article class="rounded-md border border-[#E8E5DF] bg-white p-6 shadow-sm sm:p-8">
                <h2 class="font-heading text-3xl font-extrabold text-[#2B2B2B] sm:text-4xl"><?php esc_html_e('Item Tidak Boleh Dipulangkan', 'dawp'); ?></h2>
                <p class="mt-5 text-sm leading-7 text-[#4A4A4A]"><?php esc_html_e('The following items are strictly non-returnable and final sale:', 'dawp'); ?></p>
                <ul class="mt-5 grid gap-3 text-sm leading-7 text-[#4A4A4A]">
                    <?php foreach ($non_returnable_items as $item) : ?>
                        <li class="flex gap-3">
                            <span aria-hidden="true">&bull;</span>
                            <span><?php echo esc_html($item); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </article>

            <article class="rounded-md border border-[#E8E5DF] bg-[#F8F5F0] p-6 shadow-sm sm:p-8">
                <h2 class="font-heading text-3xl font-extrabold text-[#2B2B2B] sm:text-4xl"><?php esc_html_e('Maklumat Hubungan', 'dawp'); ?></h2>
                <div class="mt-6 rounded-md border border-[#E8E5DF] bg-white p-4 sm:p-5">
                    <dl class="grid gap-4 lg:grid-cols-2">
                        <?php foreach ($contact_cards as $card) : ?>
                            <div class="rounded-md border border-[#E8E5DF] bg-[#FFFFFF] p-4">
                                <dt class="text-sm font-extrabold text-[#2B2B2B]"><?php echo esc_html($card['label']); ?></dt>
                                <dd class="mt-3 text-sm leading-7 text-[#4A4A4A]">
                                    <?php if (!empty($card['url'])) : ?>
                                        <a class="font-bold text-[#A45A3F] underline decoration-[#A45A3F]/40 underline-offset-4 transition hover:text-[#7F422F]" href="<?php echo esc_url($card['url']); ?>"><?php echo esc_html($card['value']); ?></a>
                                    <?php else : ?>
                                        <?php echo esc_html($card['value']); ?>
                                    <?php endif; ?>
                                </dd>
                            </div>
                        <?php endforeach; ?>
                    </dl>
                </div>
            </article>

            <article class="rounded-md border border-[#E8E5DF] bg-white p-6 shadow-sm sm:p-8">
                <h2 class="font-heading text-3xl font-extrabold text-[#2B2B2B] sm:text-4xl"><?php esc_html_e('Soalan Lazim Pemulangan & Bayaran Balik', 'dawp'); ?></h2>
                <div class="mt-6 divide-y divide-[#E8E5DF]">
                    <?php foreach ($return_faqs as $item) : ?>
                        <details class="group py-5 first:pt-0 last:pb-0">
                            <summary class="flex cursor-pointer list-none items-start justify-between gap-4 text-left font-heading text-lg font-extrabold text-[#2B2B2B]">
                                <span><?php echo esc_html($item['question']); ?></span>
                                <span class="mt-1 flex h-7 w-7 shrink-0 items-center justify-center rounded-md bg-[#F8F5F0] text-[#A45A3F] transition group-open:rotate-45" aria-hidden="true">+</span>
                            </summary>
                            <p class="mt-3 text-sm leading-7 text-[#4A4A4A]"><?php echo esc_html($item['answer']); ?></p>
                        </details>
                    <?php endforeach; ?>
                </div>
            </article>
        </div>
    </section>
</div>
