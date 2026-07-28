<?php
/**
 * FAQs page for Imartmy.
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
$last_updated = __('29 Mei 2026', 'dawp');

$policy_highlights = [
    [
        'title' => __('Penghantaran Percuma Malaysia', 'dawp'),
        'copy'  => __('Penghantaran standard percuma ke seluruh Malaysia tanpa syarat pembelian minimum.', 'dawp'),
    ],
    [
        'title' => __('Pemulangan 30 Hari', 'dawp'),
        'copy'  => __('Item layak yang belum digunakan boleh dipulangkan dalam 30 hari selepas tarikh penerimaan yang direkodkan.', 'dawp'),
    ],
    [
        'title' => __('Checkout Selamat', 'dawp'),
        'copy'  => __('Pembayaran diproses melalui checkout berenkripsi dan gerbang pembayaran pihak ketiga yang diperakui.', 'dawp'),
    ],
];

$faq_groups = [
    [
        'label' => __('Pesanan & Penghantaran', 'dawp'),
        'items' => [
            [
                'question' => __('Ke mana Imartmy membuat penghantaran?', 'dawp'),
                'answer'   => __('Imartmy kini menghantar pesanan dalam pasaran domestik Malaysia sahaja. Jika destinasi atau had kurier menghalang penghantaran ke alamat anda, checkout akan memaklumkan sebelum pembayaran diproses.', 'dawp'),
            ],
            [
                'question' => __('Berapakah kos penghantaran?', 'dawp'),
                'answer'   => __('Penghantaran standard Malaysia adalah percuma (RM0.00) untuk semua pesanan tanpa minimum pembelian. Jika penghantaran naik taraf tersedia, kos tepat akan dipaparkan di checkout sebelum pembayaran.', 'dawp'),
            ],
            [
                'question' => __('Apakah waktu akhir pesanan harian?', 'dawp'),
                'answer'   => __('Waktu akhir pesanan harian ialah 5:00 petang (GMT+08:00) Waktu Malaysia, Isnin hingga Jumaat. Pesanan selepas waktu ini diproses pada hari bekerja berikutnya.', 'dawp'),
            ],
            [
                'question' => __('Berapa lama pemprosesan dan penghantaran pesanan?', 'dawp'),
                'answer'   => __('Pemprosesan pesanan mengambil 1-2 hari bekerja, tidak termasuk cuti umum Malaysia. Transit standard mengambil 3-5 hari bekerja, jadi anggaran penghantaran ialah 4-7 hari bekerja dari tarikh pembelian.', 'dawp'),
            ],
            [
                'question' => __('Kurier apakah yang digunakan?', 'dawp'),
                'answer'   => __('Pesanan dihantar melalui kurier tempatan yang dipercayai seperti Pos Malaysia, J&T Express, Ninja Van, DHL eCommerce atau rakan kurier lain. Kurier akhir dipilih apabila bungkusan disediakan untuk penghantaran.', 'dawp'),
            ],
            [
                'question' => __('Adakah saya akan menerima maklumat penjejakan?', 'dawp'),
                'answer'   => __('Ya. Selepas pesanan dihantar, e-mel pengesahan penghantaran dengan pautan penjejakan dan butiran kurier akan dihantar ke e-mel checkout anda.', 'dawp'),
            ],
            [
                'question' => __('Mengapa item saya dihantar berasingan?', 'dawp'),
                'answer'   => __('Pesanan berbilang item mungkin dihantar dalam bungkusan berasingan jika produk datang daripada kumpulan pemenuhan atau kaedah pembungkusan berbeza. Butiran penjejakan akan diberikan untuk setiap bungkusan apabila tersedia.', 'dawp'),
            ],
            [
                'question' => __('Bolehkah saya menukar alamat penghantaran selepas membuat pesanan?', 'dawp'),
                'answer'   => __('Hubungi sokongan secepat mungkin dengan nombor pesanan dan alamat yang betul. Perubahan alamat tidak boleh dijamin selepas pesanan diproses, dilabel atau dihantar.', 'dawp'),
            ],
        ],
    ],
    [
        'label' => __('Pemulangan & Bayaran Balik', 'dawp'),
        'items' => [
            [
                'question' => __('Apakah tempoh pemulangan?', 'dawp'),
                'answer'   => __('Anda perlu memulakan permintaan pemulangan dalam 30 hari selepas diterima. Pemulangan diterima untuk produk layak, sama ada rosak atau tidak rosak, dalam keadaan baharu.', 'dawp'),
            ],
            [
                'question' => __('Produk manakah yang layak dipulangkan?', 'dawp'),
                'answer'   => __('Eligible items must be unused, undamaged, and in their original, unaltered condition (New only) with all original packaging, manuals, labels, parts, accessories, boxes, and included components.', 'dawp'),
            ],
            [
                'question' => __('Bagaimana saya memulakan pemulangan?', 'dawp'),
                'answer'   => __('E-mel sokongan atau gunakan halaman Hubungi Kami dalam 30 hari selepas penerimaan. Sertakan nombor pesanan, e-mel checkout, item yang ingin dipulangkan, sebab pemulangan serta foto atau video jika item rosak atau salah.', 'dawp'),
            ],
            [
                'question' => __('Siapa yang membayar kos penghantaran pemulangan?', 'dawp'),
                'answer'   => __('Pelanggan bertanggungjawab membayar semua kos penghantaran pemulangan untuk item rosak/cacat dan juga pemulangan kerana berubah fikiran. Kami tidak menanggung kos pemulangan atau menyediakan label prabayar.', 'dawp'),
            ],
            [
                'question' => __('Adakah terdapat caj restocking?', 'dawp'),
                'answer'   => __('Tidak. Imartmy tidak mengenakan caj restocking (RM0.00) untuk pemulangan yang layak.', 'dawp'),
            ],
            [
                'question' => __('Adakah pertukaran produk disediakan?', 'dawp'),
                'answer'   => __('Kami tidak memproses pertukaran terus satu-sama-satu. Untuk saiz, warna atau model lain, pulangkan item asal yang layak untuk bayaran balik dan buat pesanan baharu di laman web.', 'dawp'),
            ],
            [
                'question' => __('Bilakah saya akan menerima bayaran balik?', 'dawp'),
                'answer'   => __('Selepas bungkusan pemulangan diterima, kami akan memeriksanya dalam 1-2 hari bekerja. Bayaran balik yang diluluskan diproses ke kaedah pembayaran asal dalam 7 hari bekerja. Jika masih belum diterima selepas 15 hari bekerja, semak dengan bank atau penyedia kad dahulu, kemudian hubungi sokongan.', 'dawp'),
            ],
            [
                'question' => __('Item manakah yang tidak boleh dipulangkan?', 'dawp'),
                'answer'   => __('Items marked as Final Sale or Non-Returnable, gift cards or digital products/downloads, personalized or custom-made items, hygiene-sensitive sealed or consumable items with broken seals, and items used, installed, altered, or damaged after delivery are not eligible for return.', 'dawp'),
            ],
            [
                'question' => __('Apa perlu saya lakukan jika bungkusan rosak atau hilang?', 'dawp'),
                'answer'   => __('For damaged orders, contact us within 30 days of delivery with photos of the item, shipping packaging, and shipping label. For missing packages, stalled tracking, or packages marked delivered but not received, contact us within 30 days of the recorded delivery date so we can investigate with the carrier and arrange a replacement or refund if the package is confirmed lost.', 'dawp'),
            ],
        ],
    ],
    [
        'label' => __('Produk & Kedai', 'dawp'),
        'items' => [
            [
                'question' => __('Apakah yang dijual oleh Imartmy?', 'dawp'),
                'answer'   => __('Imartmy focuses on practical home essentials, furniture, electronics, smart home products, kitchen and dining products, outdoor living items, and other home, electronics and lifestyle products.', 'dawp'),
            ],
            [
                'question' => __('Adakah foto dan warna produk sentiasa sama seperti barang sebenar?', 'dawp'),
                'answer'   => __('We work to present descriptions, images, prices, materials, dimensions, and availability as accurately as reasonably possible. Small differences in color, texture, or appearance may occur because of screen settings, digital photography lighting, or supplier updates.', 'dawp'),
            ],
            [
                'question' => __('Adakah anda menjual produk tiruan atau replika?', 'dawp'),
                'answer'   => __('No. Imartmy does not sell counterfeit goods, replica logos, unauthorized branded items, dietary supplements, medical devices, regulated products, or items with unverified health claims.', 'dawp'),
            ],
            [
                'question' => __('Adakah produk anda membuat tuntutan perubatan, keselamatan atau rawatan?', 'dawp'),
                'answer'   => __('No. Our catalog is focused on home, electronics and lifestyle products. We do not sell dietary supplements, medical devices, regulated products, or items with unverified health claims.', 'dawp'),
            ],
            [
                'question' => __('Di mana saya boleh melihat butiran produk?', 'dawp'),
                'answer'   => __('Product pages include available details such as item use, materials, dimensions, capacity, care notes, price, and availability. Please review the product page before ordering and contact support if you need clarification.', 'dawp'),
            ],
        ],
    ],
    [
        'label' => __('Pembayaran, Privasi & Sokongan', 'dawp'),
        'items' => [
            [
                'question' => __('Adakah checkout selamat?', 'dawp'),
                'answer'   => __('Yes. Checkout transactions are executed over an encrypted SSL connection and payment processing is handled by certified third-party payment gateways that follow PCI-DSS standards.', 'dawp'),
            ],
            [
                'question' => __('Adakah Imartmy menyimpan nombor kad kredit penuh saya?', 'dawp'),
                'answer'   => __('No. Imartmy does not store, view, or retain raw credit card numbers or sensitive payment credentials on our corporate servers.', 'dawp'),
            ],
            [
                'question' => __('Bagaimana maklumat saya digunakan?', 'dawp'),
                'answer'   => __('Customer information is used to process, bill, manage, and ship orders; send tracking and invoices; provide support; handle returns; improve site performance; prevent fraud; and meet legal or accounting obligations.', 'dawp'),
            ],
            [
                'question' => __('Bolehkah saya meminta akses, pembetulan atau pemadaman data peribadi?', 'dawp'),
                'answer'   => __('Tertakluk kepada undang-undang privasi yang berkenaan di Malaysia, anda boleh meminta akses, pembetulan atau pemadaman data peribadi yang kami simpan melalui sokongan.', 'dawp'),
            ],
            [
                'question' => __('Bagaimana saya menghubungi Imartmy?', 'dawp'),
                'answer'   => sprintf(
                    /* translators: 1: email address, 2: phone number, 3: business hours, 4: store address */
                    __('E-mel %1$s, call %2$s, or use the Hubungi Kami page. Customer service hours are %3$s. Our business address is %4$s.', 'dawp'),
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
        'title' => __('Jejak Pesanan', 'dawp'),
        'copy'  => __('Check shipment status after your tracking email arrives.', 'dawp'),
        'url'   => $track_url,
    ],
    [
        'title' => __('Polisi Penghantaran', 'dawp'),
        'copy'  => __('Review penghantaran Malaysia scope, free standard shipping, handling, transit, carriers, and tracking.', 'dawp'),
        'url'   => $shipping_url,
    ],
    [
        'title' => __('Polisi Pemulangan & Bayaran Balik', 'dawp'),
        'copy'  => __('Review eligibility, return shipping fees, RMA steps, refund timing, and non-returnable items.', 'dawp'),
        'url'   => $returns_url,
    ],
    [
        'title' => __('Polisi Privasi', 'dawp'),
        'copy'  => __('Learn how customer information, cookies, payment security, retention, and privacy requests are handled.', 'dawp'),
        'url'   => $privacy_url,
    ],
    [
        'title' => __('Terma & Syarat', 'dawp'),
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
                <?php esc_html_e('Jawapan pantas untuk membeli-belah dengan Imartmy.', 'dawp'); ?>
            </h1>
            <p class="mx-auto mt-5 max-w-2xl text-center text-base leading-8 text-[#4A4A4A]">
                <?php
                echo esc_html(
                    sprintf(
                        /* translators: 1: store name, 2: site domain */
                        __('Dapatkan jawapan selaras polisi tentang pesanan, penghantaran, pemulangan, bayaran balik, produk, privasi dan sokongan apabila membeli-belah di %1$s melalui %2$s.', 'dawp'),
                        $store_name,
                        $site_domain
                    )
                );
                ?>
            </p>
            <div class="mt-6 rounded-md border border-[#E8E5DF] bg-white px-5 py-4 shadow-sm">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A45A3F]"><?php esc_html_e('Dikemas Kini', 'dawp'); ?></p>
                <p class="mt-2 font-heading text-2xl font-extrabold text-[#2B2B2B]"><?php echo esc_html($last_updated); ?></p>
            </div>
        </div>
    </section>

    <section class="bg-[#FFFFFF] py-14 sm:py-20" aria-labelledby="faq-content-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.78fr_1.22fr] lg:px-8">
            <aside class="hidden lg:block lg:sticky lg:top-24 lg:self-start">
                <div class="rounded-md border border-[#E8E5DF] bg-white p-6 shadow-sm">
                    <h2 id="faq-content-title" class="font-heading text-2xl font-extrabold text-[#2B2B2B]"><?php esc_html_e('Pautan berguna', 'dawp'); ?></h2>
                    <p class="mt-4 text-sm leading-7 text-[#4A4A4A]">
                        <?php esc_html_e('Soalan Lazim ini merumuskan polisi kedai semasa. Sila baca halaman polisi penuh sebelum membuat pesanan, memohon pemulangan atau menghantar permintaan privasi.', 'dawp'); ?>
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
                    <h2 class="font-heading text-xl font-extrabold text-[#2B2B2B]"><?php esc_html_e('Masih perlukan bantuan?', 'dawp'); ?></h2>
                    <p class="mt-4 text-sm leading-7 text-[#4A4A4A]">
                        <?php
                        echo esc_html(
                            sprintf(
                                /* translators: 1: email address, 2: business hours */
                                __('E-mel %1$s or use the Hubungi Kami page with your order number, checkout email, and a short description of the issue. Customer service hours are %2$s.', 'dawp'),
                                $support_email,
                                $business_hours
                            )
                        );
                        ?>
                    </p>
                    <dl class="mt-5 grid gap-4 md:grid-cols-3">
                        <div class="rounded-md border border-[#E8E5DF] bg-white p-5">
                            <dt class="text-sm font-extrabold text-[#2B2B2B]"><?php esc_html_e('E-mel Sokongan Pelanggan', 'dawp'); ?></dt>
                            <dd class="mt-3 text-sm leading-7 text-[#4A4A4A]">
                                <a class="font-bold text-[#A45A3F] underline decoration-[#A45A3F]/40 underline-offset-4 transition hover:text-[#7F422F]" href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a>
                            </dd>
                        </div>
                        <div class="rounded-md border border-[#E8E5DF] bg-white p-5">
                            <dt class="text-sm font-extrabold text-[#2B2B2B]"><?php esc_html_e('Telefon Sokongan Pelanggan', 'dawp'); ?></dt>
                            <dd class="mt-3 text-sm leading-7 text-[#4A4A4A]">
                                <a class="font-bold text-[#A45A3F] underline decoration-[#A45A3F]/40 underline-offset-4 transition hover:text-[#7F422F]" href="tel:<?php echo esc_attr($support_phone); ?>"><?php echo esc_html($support_phone); ?></a>
                            </dd>
                        </div>
                        <div class="rounded-md border border-[#E8E5DF] bg-white p-5">
                            <dt class="text-sm font-extrabold text-[#2B2B2B]"><?php esc_html_e('Alamat Perniagaan', 'dawp'); ?></dt>
                            <dd class="mt-3 text-sm leading-7 text-[#4A4A4A]"><?php echo esc_html($store_address); ?></dd>
                        </div>
                    </dl>
                    <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                        <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#A45A3F] px-6 text-sm font-bold text-white transition hover:bg-[#7F422F]">
                            <?php esc_html_e('Hubungi Kami', 'dawp'); ?>
                        </a>
                        <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#A45A3F] bg-white px-6 text-sm font-bold text-[#A45A3F] transition hover:bg-[#F8F5F0]">
                            <?php esc_html_e('Beli Produk', 'dawp'); ?>
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </section>
</div>
