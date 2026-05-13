<?php
/**
 * About page template part for Shop Avec Moi.
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('dawp_about_shop_url')) {
    function dawp_about_shop_url() {
        if (function_exists('wc_get_page_id')) {
            $shop_id = wc_get_page_id('shop');
            if ($shop_id && $shop_id > 0) {
                return get_permalink($shop_id);
            }
        }

        return home_url('/shop/');
    }
}

if (!function_exists('dawp_about_find_product_cat')) {
    function dawp_about_find_product_cat($slugs, $name = '') {
        if (!taxonomy_exists('product_cat')) {
            return null;
        }

        foreach ((array) $slugs as $slug) {
            $term = get_term_by('slug', $slug, 'product_cat');
            if ($term && !is_wp_error($term)) {
                return $term;
            }
        }

        if ($name) {
            $term = get_term_by('name', $name, 'product_cat');
            if ($term && !is_wp_error($term)) {
                return $term;
            }
        }

        return null;
    }
}

if (!function_exists('dawp_about_category_url')) {
    function dawp_about_category_url($slugs, $name = '') {
        $term = dawp_about_find_product_cat($slugs, $name);
        if ($term) {
            $link = get_term_link($term);
            if (!is_wp_error($link)) {
                return $link;
            }
        }

        return dawp_about_shop_url();
    }
}

if (!function_exists('dawp_about_image_url')) {
    function dawp_about_image_url($slugs = [], $size = 'large') {
        $term = dawp_about_find_product_cat($slugs);

        if ($term) {
            $thumbnail_id = (int) get_term_meta($term->term_id, 'thumbnail_id', true);
            if ($thumbnail_id) {
                $image_url = wp_get_attachment_image_url($thumbnail_id, $size);
                if ($image_url) {
                    return $image_url;
                }
            }

            if (function_exists('wc_get_products')) {
                $products = wc_get_products([
                    'status'   => 'publish',
                    'limit'    => 1,
                    'category' => [$term->slug],
                    'orderby'  => 'date',
                    'order'    => 'DESC',
                ]);

                if (!empty($products)) {
                    $image_id = $products[0]->get_image_id();
                    if ($image_id) {
                        $image_url = wp_get_attachment_image_url($image_id, $size);
                        if ($image_url) {
                            return $image_url;
                        }
                    }
                }
            }
        }

        if (function_exists('wc_get_products')) {
            $products = wc_get_products([
                'status'  => 'publish',
                'limit'   => 1,
                'orderby' => 'date',
                'order'   => 'DESC',
            ]);

            if (!empty($products)) {
                $image_id = $products[0]->get_image_id();
                if ($image_id) {
                    $image_url = wp_get_attachment_image_url($image_id, $size);
                    if ($image_url) {
                        return $image_url;
                    }
                }
            }
        }

        return function_exists('wc_placeholder_img_src') ? wc_placeholder_img_src($size) : '';
    }
}

$shop_url        = dawp_about_shop_url();
$sleepwear_url   = dawp_about_category_url(['sleepwear'], 'Sleepwear');
$lingerie_url    = dawp_about_category_url(['lingerie-sets', 'lingerie'], 'Lingerie Sets');
$robes_url       = dawp_about_category_url(['robes-loungewear', 'robes-and-loungewear', 'robes', 'loungewear'], 'Robes & Loungewear');
$contact_url     = home_url('/contact-us/');
$shipping_url    = home_url('/shipping-returns/');
$hero_image_url  = dawp_about_image_url(['sleepwear', 'robes-loungewear', 'robes-and-loungewear'], 'full');
$detail_image_url = dawp_about_image_url(['lingerie-sets', 'lingerie', 'bras-bralettes'], 'large');

$values = [
    [
        'title' => 'Soft Confidence',
        'copy'  => 'Pieces are chosen for the way they help you feel beautiful, comfortable, and quietly put together.',
    ],
    [
        'title' => 'Tasteful Romance',
        'copy'  => 'Lace, satin, and delicate details are presented as intimate apparel, never as explicit styling.',
    ],
    [
        'title' => 'Boutique Care',
        'copy'  => 'The collection stays focused, feminine, and easy to shop, with clear support when you need it.',
    ],
];

$collections = [
    [
        'title' => 'Lingerie Sets',
        'copy'  => 'Delicate matching pieces, soft lace, and romantic silhouettes.',
        'url'   => $lingerie_url,
    ],
    [
        'title' => 'Sleepwear',
        'copy'  => 'Satin, lace-trim, and restful nightwear for quiet evenings.',
        'url'   => $sleepwear_url,
    ],
    [
        'title' => 'Robes & Loungewear',
        'copy'  => 'At-home ease, soft layers, and elegant comfort.',
        'url'   => $robes_url,
    ],
];

$care_points = [
    'Orders are processed within 2-4 business days.',
    'Standard US shipping typically takes 5-10 business days after dispatch.',
    'Eligible unworn and unused items may be returned within 30 days of delivery.',
    'Return conditions are hygiene-aware because the boutique sells intimate apparel.',
];
?>

<div class="bg-white text-[#24132E] antialiased">
    <section class="overflow-hidden bg-[#FBF4FF] px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto grid max-w-7xl gap-10 lg:grid-cols-[0.92fr_1.08fr] lg:items-center">
            <div class="max-w-2xl">
                <p class="text-sm font-semibold uppercase text-[#6E3A8A]">About Shop Avec Moi</p>
                <h1 class="mt-4 font-heading text-5xl leading-[1.05] text-[#3B1748] sm:text-6xl lg:text-7xl">
                    A softer way to shop intimate apparel.
                </h1>
                <p class="mt-6 max-w-xl text-base leading-7 text-[#6D5875] sm:text-lg">
                    Shop Avec Moi is a romantic feminine boutique for lingerie, sleepwear, robes, and intimate essentials made for comfort, softness, and quiet confidence.
                </p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#3B1748] px-7 py-3 text-sm font-semibold text-white transition duration-300 hover:bg-[#6E3A8A]" href="<?php echo esc_url($shop_url); ?>">
                        Explore The Boutique
                    </a>
                    <a class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#E8DFF0] bg-white px-7 py-3 text-sm font-semibold text-[#3B1748] transition duration-300 hover:bg-white/70" href="<?php echo esc_url($contact_url); ?>">
                        Contact Support
                    </a>
                </div>
            </div>

            <div class="relative">
                <?php if ($hero_image_url) : ?>
                    <div class="overflow-hidden rounded-[2rem] border border-[#E8DFF0] bg-white p-3 shadow-2xl shadow-[#3B1748]/10">
                        <img class="aspect-[4/5] w-full rounded-2xl object-cover lg:aspect-[5/4]" src="<?php echo esc_url($hero_image_url); ?>" alt="Soft sleepwear and robes styled for Shop Avec Moi" loading="eager" fetchpriority="high">
                    </div>
                <?php endif; ?>
                <div class="relative mx-auto -mt-4 max-w-xl rounded-2xl border border-[#E8DFF0] bg-white p-5 shadow-lg shadow-[#3B1748]/10">
                    <p class="font-heading text-2xl leading-tight text-[#3B1748]">Soft intimate pieces for comfort, romance, and beautifully personal moments.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto grid max-w-7xl gap-10 lg:grid-cols-[0.82fr_1.18fr] lg:items-center">
            <?php if ($detail_image_url) : ?>
                <div class="overflow-hidden rounded-[2rem] border border-[#E8DFF0] bg-white p-3 shadow-2xl shadow-[#3B1748]/10">
                    <img class="aspect-[4/5] w-full rounded-2xl object-cover" src="<?php echo esc_url($detail_image_url); ?>" alt="Tasteful lace and satin details from Shop Avec Moi" loading="lazy">
                </div>
            <?php endif; ?>

            <div>
                <p class="text-sm font-semibold uppercase text-[#6E3A8A]">Our Point Of View</p>
                <h2 class="mt-3 font-heading text-4xl leading-tight text-[#3B1748] md:text-5xl">
                    Intimacy through fabric, fit, and feeling.
                </h2>
                <div class="mt-5 grid gap-4 text-base leading-7 text-[#6D5875]">
                    <p>
                        The Avec Moi feeling is personal, close, and softly romantic. We focus on pieces women choose for themselves: something delicate after a long day, a satin set for a quiet evening, a robe that makes home feel more graceful.
                    </p>
                    <p>
                        Every page, product, and collection is shaped to feel tasteful and mature. The boutique celebrates feminine confidence without explicit language, harsh styling, or loud urgency.
                    </p>
                </div>

                <div class="mt-8 grid gap-4 md:grid-cols-3">
                    <?php foreach ($values as $value) : ?>
                        <div class="rounded-2xl border border-[#E8DFF0] bg-[#FBF4FF] p-5">
                            <h3 class="font-heading text-2xl leading-tight text-[#3B1748]"><?php echo esc_html($value['title']); ?></h3>
                            <p class="mt-3 text-sm leading-6 text-[#6D5875]"><?php echo esc_html($value['copy']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#3B1748] px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto max-w-7xl">
            <div class="max-w-3xl">
                <p class="text-sm font-semibold uppercase text-white">Curated Boutique</p>
                <h2 class="mt-3 font-heading text-4xl leading-tight text-white md:text-5xl">
                    A focused collection for softness, romance, and ease.
                </h2>
                <p class="mt-4 text-base leading-7 text-white/75">
                    Shop Avec Moi keeps the assortment simple and intentional so each category feels clear, feminine, and easy to browse.
                </p>
            </div>

            <div class="mt-10 grid gap-4 md:grid-cols-3">
                <?php foreach ($collections as $collection) : ?>
                    <a class="group rounded-2xl border border-white/15 bg-white/10 p-6 text-white transition duration-300 hover:-translate-y-1 hover:bg-white/15" href="<?php echo esc_url($collection['url']); ?>">
                        <span class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-white text-[#3B1748]">
                            <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M20 6 9 17l-5-5" />
                            </svg>
                        </span>
                        <h3 class="font-heading text-3xl leading-tight text-white"><?php echo esc_html($collection['title']); ?></h3>
                        <p class="mt-3 text-sm leading-6 text-white/75"><?php echo esc_html($collection['copy']); ?></p>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-white px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto grid max-w-7xl gap-8 lg:grid-cols-[0.78fr_1.22fr]">
            <aside class="rounded-[2rem] bg-[#21102C] p-6 text-white lg:p-8">
                <p class="text-sm font-semibold uppercase text-white">Customer Care</p>
                <h2 class="mt-3 font-heading text-3xl leading-tight text-white">Clear support for personal pieces.</h2>
                <p class="mt-4 text-sm leading-6 text-white/75">
                    Have a question about sizing, delivery, returns, or a product detail? Our support team is available Monday to Friday, 9:00 AM to 6:00 PM EST.
                </p>
                <a class="mt-7 inline-flex min-h-12 items-center justify-center rounded-full bg-white px-7 py-3 text-sm font-semibold text-[#3B1748] transition duration-300 hover:bg-[#FBF4FF]" href="<?php echo esc_url($contact_url); ?>">
                    Contact Us
                </a>
            </aside>

            <div class="rounded-2xl border border-[#E8DFF0] bg-white p-6 shadow-sm shadow-[#3B1748]/10 lg:p-8">
                <p class="text-sm font-semibold uppercase text-[#6E3A8A]">Trust &amp; Policy</p>
                <h2 class="mt-3 font-heading text-4xl leading-tight text-[#3B1748] md:text-5xl">
                    Designed to feel beautiful and straightforward.
                </h2>
                <div class="mt-7 grid gap-3 md:grid-cols-2">
                    <?php foreach ($care_points as $point) : ?>
                        <div class="rounded-2xl border border-[#E8DFF0] bg-[#FBF4FF] p-5 text-sm font-semibold leading-6 text-[#3B1748]">
                            <?php echo esc_html($point); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <a class="mt-7 inline-flex min-h-12 items-center justify-center rounded-full border border-[#E8DFF0] px-7 py-3 text-sm font-semibold text-[#3B1748] transition duration-300 hover:bg-[#FBF4FF]" href="<?php echo esc_url($shipping_url); ?>">
                    View Shipping &amp; Returns
                </a>
            </div>
        </div>
    </section>
</div>
