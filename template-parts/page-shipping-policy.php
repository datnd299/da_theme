<?php
/**
 * Shipping policy page for Imartmy.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$support_email = 'support@imartmy.com';
$support_phone = '+60 3-8605 3388';
$store_address = 'Kuala Lumpur, Malaysia';
$track_url     = home_url('/track-order/');
$contact_url   = home_url('/contact-us/');
$last_updated  = __('29 Mei 2026', 'dawp');

$shipping_costs = [
    [
        'title' => __('Standard Penghantaran Malaysia', 'dawp'),
        'copy'  => __('Percuma sepenuhnya (RM0.00) untuk pesanan ke seluruh Malaysia. Tiada syarat pembelian minimum untuk penghantaran standard percuma.', 'dawp'),
    ],
    [
        'title' => __('Pilihan Penghantaran Naik Taraf', 'dawp'),
        'copy'  => __('Jika penghantaran ekspres atau bantuan khas tersedia untuk destinasi anda, kos tepat akan dipaparkan dengan jelas di halaman checkout sebelum pembayaran.', 'dawp'),
    ],
];

$delivery_times = [
    [
        'title' => __('Masa Tutup Pesanan', 'dawp'),
        'copy'  => __('5:00 petang (GMT+08:00) Waktu Malaysia (Isnin hingga Jumaat).', 'dawp'),
    ],
    [
        'title' => __('Masa Pemprosesan Pesanan', 'dawp'),
        'copy'  => __('1-2 hari bekerja (Isnin hingga Jumaat). Orders placed after cutoff begin processing the following business day.', 'dawp'),
    ],
    [
        'title' => __('Transit Time', 'dawp'),
        'copy'  => __('3-5 hari bekerja (Isnin hingga Jumaat).', 'dawp'),
    ],
    [
        'title' => __('Anggaran Masa Penghantaran', 'dawp'),
        'copy'  => __('4-7 hari bekerja total from the date of purchase (Isnin hingga Jumaat).', 'dawp'),
    ],
];

$carriers = [
    __('Pos Malaysia', 'dawp'),
    __('J&T Express', 'dawp'),
    __('Ninja Van', 'dawp'),
    __('DHL', 'dawp'),
];

$issue_requirements = [
    __('Nombor pesanan tepat anda, contohnya #MMD1001.', 'dawp'),
    __('The specific E-mel Alamat utilized during checkout.', 'dawp'),
    __('The full and complete Delivery Alamat.', 'dawp'),
    __('Clear, well-lit photos if the package container or home, electronics or lifestyle item arrived damaged.', 'dawp'),
];

$contact_details = [
    [
        'label' => __('Nama Kedai', 'dawp'),
        'value' => __('Imartmy', 'dawp'),
    ],
    [
        'label' => __('E-mel Sokongan Pelanggan', 'dawp'),
        'value' => $support_email,
    ],
    [
        'label' => __('Telefon Sokongan Pelanggan', 'dawp'),
        'value' => $support_phone,
    ],
    [
        'label' => __('Alamat', 'dawp'),
        'value' => $store_address,
    ],
    [
        'label' => __('Masa Respons', 'dawp'),
        'value' => __('Within 24 jam bekerja.', 'dawp'),
    ],
];

$shipping_faqs = [
    [
        'question' => __('Ke mana Imartmy membuat penghantaran?', 'dawp'),
        'answer'   => __('Imartmy kini menghantar pesanan dalam pasaran domestik Malaysia sahaja. Jika destinasi atau had kurier menghalang penghantaran ke alamat anda, checkout akan memaklumkan sebelum pembayaran diproses.', 'dawp'),
    ],
    [
        'question' => __('Berapakah kos penghantaran standard?', 'dawp'),
        'answer'   => __('Penghantaran standard Malaysia percuma untuk semua pesanan tanpa minimum pembelian. Pilihan penghantaran naik taraf, jika tersedia, dipaparkan dengan jelas di checkout sebelum pembayaran.', 'dawp'),
    ],
    [
        'question' => __('Berapa lama pesanan saya akan tiba?', 'dawp'),
        'answer'   => __('Order handling takes 1-2 hari bekerja and standard transit takes 3-5 hari bekerja, so estimated delivery is 4-7 hari bekerja total from the date of purchase.', 'dawp'),
    ],
    [
        'question' => __('Adakah saya akan menerima maklumat penjejakan?', 'dawp'),
        'answer'   => __('Yes. Once your order is dispatched, we send a shipping confirmation email with a direct tracking link and courier details to the email address used at checkout.', 'dawp'),
    ],
];
?>

<div class="bg-white text-[#2B2B2B]">
    <section class="bg-[#F8F5F0] py-14 sm:py-20" aria-labelledby="shipping-policy-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:items-end lg:px-8">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A45A3F]"><?php esc_html_e('Polisi Penghantaran', 'dawp'); ?></p>
                <h1 id="shipping-policy-title" class="mt-4 font-heading text-4xl font-extrabold leading-tight text-[#2B2B2B] sm:text-5xl">
                    <?php esc_html_e('Polisi Penghantaran', 'dawp'); ?>
                </h1>
                <p class="mt-5 max-w-2xl text-base leading-8 text-[#4A4A4A]">
                    <?php esc_html_e('Semak liputan penghantaran Malaysia, penghantaran standard percuma, masa pemprosesan, tempoh transit, proses penjejakan dan sokongan penghantaran kami.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-md border border-[#E8E5DF] bg-white p-6 shadow-sm">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A45A3F]"><?php esc_html_e('Dikemas Kini', 'dawp'); ?></p>
                <p class="mt-3 font-heading text-2xl font-extrabold text-[#2B2B2B]"><?php echo esc_html($last_updated); ?></p>
                <p class="mt-4 text-sm leading-7 text-[#4A4A4A]">
                    <?php esc_html_e('Jejak pesanan selepas e-mel penghantaran diterima, atau hubungi sokongan jika penghantaran kelihatan lewat, rosak atau hilang.', 'dawp'); ?>
                </p>
                <div class="mt-6 flex flex-col gap-3 sm:flex-row lg:flex-col xl:flex-row">
                    <a href="<?php echo esc_url($track_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#A45A3F] px-6 text-sm font-bold text-white transition hover:bg-[#7F422F]">
                        <?php esc_html_e('Jejak Pesanan', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#A45A3F] bg-white px-6 text-sm font-bold text-[#A45A3F] transition hover:bg-[#F8F5F0]">
                        <?php esc_html_e('Hubungi Sokongan', 'dawp'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#F8F5F0] py-12 sm:py-16">
        <div class="mx-auto grid max-w-7xl gap-6 px-4 sm:px-6 lg:px-8">
        <section class="rounded-md border border-[#E8E5DF] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="shipping-locations-title">
            <h1 id="shipping-locations-title" class="font-heading text-4xl font-extrabold leading-tight text-[#2B2B2B] sm:text-5xl">
                <?php esc_html_e('Lokasi & Pasaran Penghantaran', 'dawp'); ?>
            </h1>
            <div class="mt-5 space-y-5 text-sm leading-7 text-[#4A4A4A] sm:text-base">
                <p><?php esc_html_e('We currently ship exclusively within the Malaysia. Imartmy serves customers shopping from the pasaran domestik Malaysia.', 'dawp'); ?></p>
                <p><?php esc_html_e('If a product, destination, or carrier limitation prevents delivery to your specific address, the order will not be available for that location, and you will be notified immediately at checkout before any payment is processed.', 'dawp'); ?></p>
                <div class="border-l-4 border-[#D8C7BE] bg-[#F8F5F0] p-5 text-[#4A4A4A]">
                    <p><?php esc_html_e('Some home, electronics and lifestyle orders may ship separately if items are prepared from different fulfillment batches or require distinct specialized packing methods to ensure safe transit.', 'dawp'); ?></p>
                </div>
            </div>
        </section>

        <section class="rounded-md border border-[#E8E5DF] bg-[#F8F5F0] p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="shipping-costs-title">
            <h2 id="shipping-costs-title" class="font-heading text-4xl font-extrabold leading-tight text-[#2B2B2B]">
                <?php esc_html_e('Yuran & Kos Penghantaran', 'dawp'); ?>
            </h2>
            <p class="mt-5 text-sm leading-7 text-[#4A4A4A] sm:text-base">
                <?php esc_html_e('Kami percaya pada ketelusan tanpa caj tersembunyi di checkout. Kos penghantaran kami adalah seperti berikut:', 'dawp'); ?>
            </p>
            <div class="mt-6 grid gap-4 md:grid-cols-2">
                <?php foreach ($shipping_costs as $cost) : ?>
                    <article class="rounded-md border border-[#E8E5DF] bg-white p-5">
                        <h3 class="font-heading text-xl font-extrabold text-[#2B2B2B]"><?php echo esc_html($cost['title']); ?></h3>
                        <p class="mt-4 text-sm leading-7 text-[#4A4A4A] sm:text-base"><?php echo esc_html($cost['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="rounded-md border border-[#E8E5DF] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="delivery-times-title">
            <h2 id="delivery-times-title" class="font-heading text-4xl font-extrabold leading-tight text-[#2B2B2B]">
                <?php esc_html_e('Pemprosesan Pesanan & Masa Penghantaran', 'dawp'); ?>
            </h2>
            <p class="mt-5 text-sm leading-7 text-[#4A4A4A] sm:text-base">
                <?php esc_html_e('Semua tempoh penghantaran dan pengendalian dikira dalam hari bekerja, Isnin hingga Jumaat, tidak termasuk cuti umum Malaysia.', 'dawp'); ?>
            </p>
            <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <?php foreach ($delivery_times as $time) : ?>
                    <article class="rounded-md border border-[#E8E5DF] bg-white p-5">
                        <h3 class="text-sm font-extrabold text-[#2B2B2B]"><?php echo esc_html($time['title']); ?></h3>
                        <p class="mt-3 text-sm leading-6 text-[#4A4A4A]"><?php echo esc_html($time['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
            <p class="mt-6 text-sm leading-7 text-[#4A4A4A] sm:text-base">
                <?php esc_html_e('Delivery estimates are carefully calculated windows reflecting our standard delivery benchmarks. While we and our courier partners work diligently to meet these timelines, unexpected delays due to extreme weather, carrier capacity issues, or regional holidays may occasionally occur.', 'dawp'); ?>
            </p>
        </section>

        <section class="rounded-md border border-[#E8E5DF] bg-[#F8F5F0] p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="multi-item-title">
            <h2 id="multi-item-title" class="font-heading text-4xl font-extrabold leading-tight text-[#2B2B2B]">
                <?php esc_html_e('Pesanan Berbilang Item & Pengendalian Khas', 'dawp'); ?>
            </h2>
            <div class="mt-5 space-y-5 text-sm leading-7 text-[#4A4A4A] sm:text-base">
                <p><?php esc_html_e('If your purchase includes multiple home, electronics or lifestyle products, they may be fulfilled from different locations. Consequently, your items may ship separately and arrive in multiple packages.', 'dawp'); ?></p>
                <p><?php esc_html_e('You will receive unique tracking numbers for each package. Certain intricate or high-demand home, electronics and lifestyle products may require extra preparation time due to rigorous address reviews, holiday volume spikes, or safe-handling protocols.', 'dawp'); ?></p>
            </div>
        </section>

        <section class="rounded-md border border-[#E8E5DF] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="carrier-title">
            <h2 id="carrier-title" class="font-heading text-4xl font-extrabold leading-tight text-[#2B2B2B]">
                <?php esc_html_e('Perkhidmatan Kurier & Penjejakan Penghantaran', 'dawp'); ?>
            </h2>
            <p class="mt-5 text-sm leading-7 text-[#4A4A4A] sm:text-base">
                <?php esc_html_e('Untuk penghantaran yang selamat dan cekap, Imartmy bekerjasama dengan kurier tempatan Malaysia yang dipercayai seperti Pos Malaysia, J&T Express, Ninja Van atau DHL eCommerce.', 'dawp'); ?>
            </p>
            <div class="mt-5 flex flex-wrap gap-3">
                <?php foreach ($carriers as $carrier) : ?>
                    <span class="inline-flex min-h-9 items-center justify-center rounded-full border border-[#E8E5DF] bg-white px-6 text-sm font-extrabold text-[#2B2B2B]"><?php echo esc_html($carrier); ?></span>
                <?php endforeach; ?>
            </div>
            <p class="mt-5 text-sm leading-7 text-[#4A4A4A] sm:text-base">
                <?php esc_html_e('Kurier akhir dipilih apabila bungkusan dilabel dan disediakan di pusat pemenuhan. Selepas dihantar, e-mel pengesahan bersama pautan penjejakan dan butiran kurier akan dihantar ke alamat e-mel berdaftar anda.', 'dawp'); ?>
            </p>
            <div class="mt-7">
                <a href="<?php echo esc_url($track_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#2B2B2B] bg-white px-6 text-sm font-extrabold text-[#2B2B2B] transition hover:bg-[#7F422F] hover:text-white">
                    <?php esc_html_e('Jejak Pesanan', 'dawp'); ?>
                </a>
            </div>
        </section>

        <section class="rounded-md border border-[#E8E5DF] bg-[#F8F5F0] p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="delivery-issues-title">
            <h2 id="delivery-issues-title" class="font-heading text-4xl font-extrabold leading-tight text-[#2B2B2B]">
                <?php esc_html_e('Menyelesaikan Isu Penghantaran & Bungkusan Rosak', 'dawp'); ?>
            </h2>
            <div class="mt-5 space-y-5 text-sm leading-7 text-[#4A4A4A] sm:text-base">
                <p><?php esc_html_e('Your satisfaction is our priority. If your order encounters delays, tracking stops updating, or the package is marked as delivered but has not arrived, please reach out to our dedicated support team immediately.', 'dawp'); ?></p>
                <p><?php esc_html_e('To help us investigate and resolve the issue with the carrier swiftly, please provide:', 'dawp'); ?></p>
                <ul class="list-disc space-y-3 pl-5">
                    <?php foreach ($issue_requirements as $requirement) : ?>
                        <li><?php echo esc_html($requirement); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#A45A3F] px-6 text-sm font-extrabold text-white transition hover:bg-[#A45A3F]">
                    <?php esc_html_e('Hubungi Sokongan', 'dawp'); ?>
                </a>
                <a href="mailto:<?php echo esc_attr($support_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#2B2B2B] bg-white px-6 text-sm font-extrabold text-[#2B2B2B] transition hover:bg-[#F8F5F0]">
                    <?php echo esc_html($support_email); ?>
                </a>
                <a href="tel:<?php echo esc_attr($support_phone); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#2B2B2B] bg-white px-6 text-sm font-extrabold text-[#2B2B2B] transition hover:bg-[#F8F5F0]">
                    <?php echo esc_html($support_phone); ?>
                </a>
            </div>
        </section>

        <section class="rounded-md border border-[#E8E5DF] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="support-contact-title">
            <h2 id="support-contact-title" class="font-heading text-4xl font-extrabold leading-tight text-[#2B2B2B]">
                <?php esc_html_e('Maklumat Hubungan Sokongan Pelanggan', 'dawp'); ?>
            </h2>
            <p class="mt-5 text-sm leading-7 text-[#4A4A4A] sm:text-base">
                <?php esc_html_e('For any questions regarding your shipment, custom delivery requests, or transit inquiries, please contact us directly through our official channels. We respond to all inquiries within 24 jam bekerja.', 'dawp'); ?>
            </p>
            <div class="mt-7 rounded-md border border-[#E8E5DF] p-5">
                <div class="grid gap-4 md:grid-cols-2">
                    <?php foreach ($contact_details as $detail) : ?>
                        <div class="rounded-md border border-[#E8E5DF] bg-white p-5">
                            <h3 class="text-sm font-extrabold text-[#2B2B2B]"><?php echo esc_html($detail['label']); ?></h3>
                             <?php if ($support_email === $detail['value']) : ?>
                                 <a href="mailto:<?php echo esc_attr($support_email); ?>" class="mt-3 block text-sm leading-6 text-[#4A4A4A] transition hover:text-[#A45A3F]"><?php echo esc_html($detail['value']); ?></a>
                             <?php elseif ($support_phone === $detail['value']) : ?>
                                 <a href="tel:<?php echo esc_attr($support_phone); ?>" class="mt-3 block text-sm leading-6 text-[#4A4A4A] transition hover:text-[#A45A3F]"><?php echo esc_html($detail['value']); ?></a>
                             <?php else : ?>
                                 <p class="mt-3 text-sm leading-6 text-[#4A4A4A]"><?php echo esc_html($detail['value']); ?></p>
                             <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="rounded-md border border-[#E8E5DF] bg-white p-6 shadow-sm sm:p-8 lg:p-10" aria-labelledby="shipping-faq-title">
            <h2 id="shipping-faq-title" class="font-heading text-4xl font-extrabold leading-tight text-[#2B2B2B]">
                <?php esc_html_e('Soalan Lazim Penghantaran', 'dawp'); ?>
            </h2>
            <div class="mt-6 divide-y divide-[#E8E5DF]">
                <?php foreach ($shipping_faqs as $item) : ?>
                    <details class="group py-5 first:pt-0 last:pb-0">
                        <summary class="flex cursor-pointer list-none items-start justify-between gap-4 text-left font-heading text-lg font-extrabold text-[#2B2B2B]">
                            <span><?php echo esc_html($item['question']); ?></span>
                            <span class="mt-1 flex h-7 w-7 shrink-0 items-center justify-center rounded-md bg-[#F8F5F0] text-[#A45A3F] transition group-open:rotate-45" aria-hidden="true">+</span>
                        </summary>
                        <p class="mt-3 text-sm leading-7 text-[#4A4A4A] sm:text-base"><?php echo esc_html($item['answer']); ?></p>
                    </details>
                <?php endforeach; ?>
            </div>
        </section>
        </div>
    </section>
</div>
