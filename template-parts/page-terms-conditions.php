<?php
/**
 * Terma and conditions page for Imartmy.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$store_name     = 'Imartmy';
$site_domain    = 'Imartmy.com';
$support_email  = 'support@imartmy.com';
$support_phone  = '+60 3-8605 3388';
$store_address  = 'Kuala Lumpur, Malaysia';
$business_hours = __('Isnin - Jumaat, 9:00 pagi - 5:00 petang, GMT+08:00 Waktu Malaysia', 'dawp');
$last_updated   = __('29 Mei 2026', 'dawp');
$shipping_url   = home_url('/shipping-policy/');
$returns_url    = home_url('/return-refund-policy/');
$privacy_url    = home_url('/privacy-policy/');
$contact_url    = home_url('/contact-us/');

$intro_paragraphs = [
    __('Selamat datang ke Imartmy! Terma & Syarat ini mengawal akses dan penggunaan laman web Imartmy.com ("Laman"), termasuk melayari katalog produk, membuat akaun, menghubungi sokongan atau membeli item daripada kedai dalam talian kami.', 'dawp'),
    __('Laman ini dikendalikan oleh Imartmy. Dalam Laman ini, istilah "kami" merujuk kepada Imartmy. Dengan mengakses Laman atau membuat pesanan, anda bersetuju terikat dengan Terma ini dan polisi operasi yang dirujuk. Jika anda tidak bersetuju, sila hentikan penggunaan laman web atau pesanan.', 'dawp'),
];

$terms_highlights = [
    [
        'title' => __('Skop Kedai', 'dawp'),
        'copy'  => __('Imartmy memfokuskan peralatan dapur, cookware, penyimpanan, peralatan makan dan kelengkapan rumah praktikal.', 'dawp'),
    ],
    [
        'title' => __('Checkout Selamat', 'dawp'),
        'copy'  => __('Payments are handled through encrypted checkout and certified third-party payment gateways that follow PCI-DSS standards.', 'dawp'),
    ],
    [
        'title' => __('Polisi Berkaitan', 'dawp'),
        'copy'  => __('Terma penghantaran, pemulangan, bayaran balik dan privasi diterbitkan sebagai sebahagian daripada perjanjian pelanggan.', 'dawp'),
    ],
];

$shipping_parameters = [
    __('Lokasi Penghantaran: Imartmy kini menghantar dalam pasaran domestik Malaysia sahaja.', 'dawp'),
    __('Yuran Penghantaran: Penghantaran standard Malaysia percuma (RM0.00) untuk semua pesanan tanpa minimum pembelian. Kos penghantaran naik taraf, jika tersedia, dipaparkan sebelum pembayaran.', 'dawp'),
    __('Masa Tutup Pesanan Harian: 5:00 petang (GMT+08:00) Waktu Malaysia (Isnin hingga Jumaat). Pesanan selepas waktu ini diproses pada hari bekerja berikutnya.', 'dawp'),
    __('Handling Time: Current order handling and packaging time is 1-2 hari bekerja (Isnin hingga Jumaat), excluding standard cuti umum Malaysia.', 'dawp'),
    __('Masa Transit: Transit standard mengambil 3-5 hari bekerja. Anggaran penghantaran ialah 4-7 hari bekerja dari tarikh pembelian.', 'dawp'),
    __('Kurier & Penjejakan: Pesanan dihantar menggunakan kurier tempatan Malaysia seperti Pos Malaysia, J&T Express, Ninja Van atau DHL eCommerce. Butiran penjejakan dihantar melalui e-mel selepas pesanan dihantar.', 'dawp'),
];

$return_terms = [
    __('Tempoh Pemulangan: Pelanggan boleh meminta pemulangan dalam 30 hari selepas rekod penghantaran. Pemulangan diterima untuk produk layak dalam keadaan baharu.', 'dawp'),
    __('Keadaan Produk: Produk layak mesti belum digunakan, dalam keadaan asal yang baik, dan dipulangkan bersama pembungkusan, tag, label, aksesori serta komponen asal.', 'dawp'),
    __('Caj & Kos Pos Balik: Tiada caj restocking (RM0.00). Pelanggan bertanggungjawab terhadap semua kos pos balik untuk item rosak/cacat dan pemulangan kerana berubah fikiran. Kami tidak menanggung kos pos balik atau menyediakan label prabayar.', 'dawp'),
    __('Masa Bayaran Balik: Bayaran balik yang diluluskan diproses ke kaedah pembayaran asal dalam tempoh sehingga 7 hari bekerja.', 'dawp'),
];

$contact_details = [
    [
        'label' => __('Nama Kedai/Jenama', 'dawp'),
        'value' => $store_name,
    ],
    [
        'label' => __('E-mel Sokongan Pelanggan', 'dawp'),
        'value' => $support_email,
        'url'   => 'mailto:' . $support_email,
    ],
    [
        'label' => __('Telefon Sokongan Pelanggan', 'dawp'),
        'value' => $support_phone,
        'url'   => 'tel:' . $support_phone,
    ],
    [
        'label' => __('Physical Alamat Perniagaan', 'dawp'),
        'value' => $store_address,
    ],
    [
        'label' => __('Waktu Khidmat Pelanggan', 'dawp'),
        'value' => $business_hours,
    ],
    [
        'label' => __('Halaman Hubungi', 'dawp'),
        'value' => __('Hubungi Kami', 'dawp'),
        'url'   => $contact_url,
    ],
];

$sections = [
    [
        'title' => __('1. Online Skop Kedai & Content Accuracy', 'dawp'),
        'copy'  => [
            __('Imartmy is an e-commerce store focused on practical home essentials, furniture, electronics, smart home products, kitchen and dining products, and outdoor living items.', 'dawp'),
            __('Kami berusaha memaparkan penerangan produk, imej, harga, bahan, saiz dan stok setepat mungkin. Sedikit perbezaan warna, tekstur atau rupa fizikal mungkin berlaku kerana tetapan skrin, pencahayaan foto atau kemas kini pembekal.', 'dawp'),
            __('Imartmy mengamalkan perdagangan beretika: kami tidak menjual barangan tiruan, logo replika, item berjenama tanpa kebenaran, suplemen, peranti perubatan, produk terkawal atau produk dengan dakwaan kesihatan tidak disahkan.', 'dawp'),
        ],
    ],
    [
        'title' => __('2. Penggunaan Laman Web & Kelayakan', 'dawp'),
        'copy'  => [
            __('Dengan bersetuju kepada Terma ini, anda mengesahkan bahawa anda telah mencapai umur majoriti yang sah. Anda bersetuju menggunakan laman web ini hanya untuk tujuan yang sah dan tidak mengganggu operasi kedai, keselamatan checkout, pangkalan data akaun pelanggan atau pengalaman pelawat lain.', 'dawp'),
            __('Anda tidak boleh menyalahgunakan Laman, cuba mengakses sistem tanpa kebenaran, menghantar kod berbahaya seperti virus atau malware, atau menggunakan alat scraping automatik untuk mengambil data kami tanpa izin.', 'dawp'),
        ],
    ],
    [
        'title' => __('3. Pesanan & Penerimaan Pesanan', 'dawp'),
        'copy'  => [
            __('E-mel pengesahan pesanan bermaksud kami telah menerima permintaan pembelian anda. Kami berhak menyemak, menolak, membatalkan atau mengehadkan mana-mana pesanan jika perlu, termasuk kerana risiko penipuan, harga tidak tepat, stok tidak tersedia, ralat pembayaran, sekatan penghantaran atau pelanggaran polisi.', 'dawp'),
            __('If an order is canceled after successful billing, the full amount will be refunded immediately to your original payment method.', 'dawp'),
        ],
    ],
    [
        'title' => __('4. Harga & Pemprosesan Pembayaran Selamat', 'dawp'),
        'copy'  => [
            __('Prices are displayed clearly on the website and are subject to change without notice. Applicable taxes, optional upgraded shipping costs when available, and exact checkout costs are displayed dynamically where required before your order completion.', 'dawp'),
            __('Semua transaksi kewangan dijalankan melalui sambungan SSL yang selamat dan terenkripsi. Pembayaran dikendalikan oleh gerbang pembayaran pihak ketiga bertauliah yang mematuhi standard PCI-DSS.', 'dawp'),
            __('By submitting payment information, you represent that you are authorized to utilize the selected payment method.', 'dawp'),
        ],
    ],
    [
        'title' => __('5. Parameter Penghantaran, Penjejakan & Logistik', 'dawp'),
        'copy'  => [
            __('Pemprosesan dan penghantaran pesanan kami mengikuti garis masa berikut:', 'dawp'),
        ],
        'list'  => $shipping_parameters,
        'after' => [
            'text' => __('For full parameters, please review our comprehensive Polisi Penghantaran.', 'dawp'),
            'url'  => $shipping_url,
            'link' => __('Polisi Penghantaran', 'dawp'),
        ],
    ],
    [
        'title' => __('6. Pemulangan, Bayaran Balik & Hak Pengguna', 'dawp'),
        'copy'  => [
            __('Kami menyediakan tempoh pemulangan yang jelas untuk peralatan dapur dan kelengkapan rumah:', 'dawp'),
        ],
        'list'  => $return_terms,
        'after' => [
            'text' => __('Untuk arahan langkah demi langkah, sila baca Polisi Pemulangan & Bayaran Balik kami.', 'dawp'),
            'url'  => $returns_url,
            'link' => __('Polisi Pemulangan & Bayaran Balik', 'dawp'),
        ],
    ],
    [
        'title' => __('7. Polisi Kedai Bersepadu', 'dawp'),
        'copy'  => [
            __('Transaksi dan keselamatan data anda dilindungi melalui polisi utama kami. Sila semak garis panduan khusus melalui pautan berikut:', 'dawp'),
            __('Pengurusan Data: Penyerahan maklumat peribadi melalui checkout kedai tertakluk kepada Polisi Privasi kami.', 'dawp'),
        ],
        'after' => [
            'text' => __('Review the full Polisi Privasi for details about data collection, payment security, cookies, retention, and privacy requests.', 'dawp'),
            'url'  => $privacy_url,
            'link' => __('Polisi Privasi', 'dawp'),
        ],
    ],
    [
        'title' => __('8. Intellectual Property & Liability Limitations', 'dawp'),
        'copy'  => [
            __('All website text, layout configurations, imagery, custom graphics, and brand logos are owned by or licensed to Imartmy and are protected by copyright laws.', 'dawp'),
            __('To the fullest extent permitted by applicable law, Imartmy shall not be liable for any indirect, incidental, special, consequential, or punitive damages arising out of website usage, delivery delays, or product consumption.', 'dawp'),
        ],
    ],
    [
        'title' => __('9. Governing Law', 'dawp'),
        'copy'  => [
            __('These Terma & Syarat and any separate agreements whereby we provide you services shall be governed by, and construed in accordance with, the laws of the State of Malaysia.', 'dawp'),
        ],
    ],
];

$terms_faqs = [
    [
        'question' => __('Apakah yang diliputi oleh Terma ini?', 'dawp'),
        'answer'   => __('Terma ini mengawal akses kepada Imartmy, pelayaran katalog, pendaftaran akaun, hubungan dengan sokongan dan pembelian melalui Imartmy.com.', 'dawp'),
    ],
    [
        'question' => __('Bilakah pesanan diterima?', 'dawp'),
        'answer'   => __('E-mel pengesahan pesanan bermaksud kami menerima permintaan pembelian anda. Kami masih boleh menyemak, menolak, membatalkan atau mengehadkan pesanan atas sebab penipuan, harga, stok, pembayaran, penghantaran atau polisi.', 'dawp'),
    ],
    [
        'question' => __('Polisi manakah menjadi sebahagian daripada perjanjian pelanggan?', 'dawp'),
        'answer'   => __('Terma penghantaran, pemulangan, bayaran balik dan privasi menjadi sebahagian daripada persetujuan pelanggan melalui Polisi Penghantaran, Polisi Pemulangan & Bayaran Balik dan Polisi Privasi.', 'dawp'),
    ],
    [
        'question' => __('Bagaimana saya menghubungi sokongan tentang Terma?', 'dawp'),
        'answer'   => sprintf(
            /* translators: support email */
            __('E-mel %s atau gunakan halaman Hubungi Kami untuk soalan, aduan atau penjelasan tentang Terma & Syarat ini atau pesanan aktif.', 'dawp'),
            $support_email
        ),
    ],
];
?>

<div class="bg-white text-[#2B2B2B]">
    <section class="bg-[#F8F5F0] py-14 sm:py-20" aria-labelledby="terms-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:items-end lg:px-8">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A45A3F]"><?php esc_html_e('Terma & Syarat', 'dawp'); ?></p>
                <h1 id="terms-title" class="mt-4 font-heading text-4xl font-extrabold leading-tight text-[#2B2B2B] sm:text-5xl">
                    <?php esc_html_e('Terma for using and shopping with Imartmy.', 'dawp'); ?>
                </h1>
                <p class="mt-5 max-w-2xl text-base leading-8 text-[#4A4A4A]">
                    <?php
                    echo esc_html(
                        sprintf(
                            /* translators: 1: store name, 2: site domain */
                            __('These Terma govern access to %1$s, browsing our catalog, creating an account, contacting support, and purchasing items through %2$s.', 'dawp'),
                            $store_name,
                            $site_domain
                        )
                    );
                    ?>
                </p>
            </div>

            <div class="rounded-md border border-[#E8E5DF] bg-white p-6 shadow-sm">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A45A3F]"><?php esc_html_e('Dikemas Kini', 'dawp'); ?></p>
                <p class="mt-3 font-heading text-2xl font-extrabold text-[#2B2B2B]"><?php echo esc_html($last_updated); ?></p>
                <div class="terms-highlight-slider mt-5 hidden gap-4 md:grid md:grid-cols-3 lg:grid-cols-1 xl:grid-cols-3">
                    <?php foreach ($terms_highlights as $highlight) : ?>
                        <article class="terms-highlight-card rounded-md border border-[#E8E5DF] bg-[#FFFFFF] p-4">
                            <h2 class="font-heading text-base font-extrabold text-[#2B2B2B]"><?php echo esc_html($highlight['title']); ?></h2>
                            <p class="mt-3 text-sm leading-6 text-[#4A4A4A]"><?php echo esc_html($highlight['copy']); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#FFFFFF] py-14 sm:py-20" aria-labelledby="terms-content-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.78fr_1.22fr] lg:px-8">
            <aside class="lg:sticky lg:top-24 lg:self-start">
                <div class="rounded-md border border-[#E8E5DF] bg-white p-6 shadow-sm">
                    <h2 id="terms-content-title" class="font-heading text-2xl font-extrabold text-[#2B2B2B]"><?php esc_html_e('Ringkasan terma', 'dawp'); ?></h2>
                    <div class="mt-4 space-y-4 text-sm leading-7 text-[#4A4A4A]">
                        <?php foreach ($intro_paragraphs as $paragraph) : ?>
                            <p><?php echo esc_html($paragraph); ?></p>
                        <?php endforeach; ?>
                    </div>
                    <div class="mt-6 grid gap-3">
                        <a href="<?php echo esc_url($shipping_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#A45A3F] px-5 text-sm font-bold text-white transition hover:bg-[#7F422F]">
                            <?php esc_html_e('Polisi Penghantaran', 'dawp'); ?>
                        </a>
                        <a href="<?php echo esc_url($returns_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#A45A3F] bg-white px-5 text-sm font-bold text-[#A45A3F] transition hover:bg-[#F8F5F0]">
                            <?php esc_html_e('Polisi Pemulangan & Bayaran Balik', 'dawp'); ?>
                        </a>
                        <a href="<?php echo esc_url($privacy_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#A45A3F] bg-white px-5 text-sm font-bold text-[#A45A3F] transition hover:bg-[#F8F5F0]">
                            <?php esc_html_e('Polisi Privasi', 'dawp'); ?>
                        </a>
                    </div>
                </div>
            </aside>

            <div class="grid gap-5">
                <?php foreach ($sections as $section) : ?>
                    <article class="rounded-md border border-[#E8E5DF] bg-white p-6 shadow-sm">
                        <h2 class="font-heading text-xl font-extrabold text-[#2B2B2B]"><?php echo esc_html($section['title']); ?></h2>

                        <?php if (!empty($section['copy'])) : ?>
                            <div class="mt-4 space-y-4 text-sm leading-7 text-[#4A4A4A]">
                                <?php foreach ($section['copy'] as $paragraph) : ?>
                                    <p><?php echo esc_html($paragraph); ?></p>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($section['list'])) : ?>
                            <ul class="mt-5 grid gap-3 text-sm leading-7 text-[#4A4A4A]">
                                <?php foreach ($section['list'] as $item) : ?>
                                    <li class="flex gap-3">
                                        <span aria-hidden="true">&bull;</span>
                                        <span><?php echo esc_html($item); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <?php if (!empty($section['after'])) : ?>
                            <p class="mt-5 text-sm leading-7 text-[#4A4A4A]">
                                <?php echo esc_html($section['after']['text']); ?>
                                <a class="font-bold text-[#A45A3F] underline decoration-[#A45A3F]/40 underline-offset-4 transition hover:text-[#7F422F]" href="<?php echo esc_url($section['after']['url']); ?>">
                                    <?php echo esc_html($section['after']['link']); ?>
                                </a>
                            </p>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>

                <article class="rounded-md border border-[#E8E5DF] bg-[#F8F5F0] p-6 shadow-sm">
                    <h2 class="font-heading text-xl font-extrabold text-[#2B2B2B]"><?php esc_html_e('10. Sokongan Pelanggan & Identiti Perniagaan', 'dawp'); ?></h2>
                    <p class="mt-4 text-sm leading-7 text-[#4A4A4A]">
                        <?php esc_html_e('If you have questions, complaints, or require clarification regarding these Terma & Syarat or an active order, please contact our team via our verified corporate channels:', 'dawp'); ?>
                    </p>
                    <dl class="mt-5 grid gap-4 md:grid-cols-2">
                        <?php foreach ($contact_details as $detail) : ?>
                            <div class="rounded-md border border-[#E8E5DF] bg-white p-5">
                                <dt class="text-sm font-extrabold text-[#2B2B2B]"><?php echo esc_html($detail['label']); ?></dt>
                                <dd class="mt-3 text-sm leading-7 text-[#4A4A4A]">
                                    <?php if (!empty($detail['url'])) : ?>
                                        <a class="font-bold text-[#A45A3F] underline decoration-[#A45A3F]/40 underline-offset-4 transition hover:text-[#7F422F]" href="<?php echo esc_url($detail['url']); ?>"><?php echo esc_html($detail['value']); ?></a>
                                    <?php else : ?>
                                        <?php echo esc_html($detail['value']); ?>
                                    <?php endif; ?>
                                </dd>
                            </div>
                        <?php endforeach; ?>
                    </dl>
                </article>

                <article class="rounded-md border border-[#E8E5DF] bg-white p-6 shadow-sm">
                    <h2 class="font-heading text-xl font-extrabold text-[#2B2B2B]"><?php esc_html_e('Soalan Lazim Terma', 'dawp'); ?></h2>
                    <div class="mt-6 divide-y divide-[#E8E5DF]">
                        <?php foreach ($terms_faqs as $item) : ?>
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
        </div>
    </section>
</div>
