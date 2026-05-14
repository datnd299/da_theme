<?php
/**
 * Homepage template part for Shop Avec Moi.
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('dawp_home_shop_url')) {
    function dawp_home_shop_url() {
        if (function_exists('wc_get_page_id')) {
            $shop_id = wc_get_page_id('shop');
            if ($shop_id && $shop_id > 0) {
                return get_permalink($shop_id);
            }
        }

        return home_url('/shop/');
    }
}

if (!function_exists('dawp_home_find_product_cat')) {
    function dawp_home_find_product_cat($slugs, $name = '') {
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

if (!function_exists('dawp_home_category_url')) {
    function dawp_home_category_url($slugs, $name = '') {
        $slugs = array_values(array_filter((array) $slugs));
        $term = dawp_home_find_product_cat($slugs, $name);
        if ($term) {
            $link = get_term_link($term);
            if (!is_wp_error($link)) {
                return $link;
            }
        }

        if (!empty($slugs) && function_exists('dawp_product_category_url')) {
            return dawp_product_category_url($slugs[0]);
        }

        if (!empty($slugs)) {
            return home_url('/product-category/' . trim($slugs[0], '/') . '/');
        }

        return dawp_home_shop_url();
    }
}

if (!function_exists('dawp_home_image_url')) {
    function dawp_home_image_url($slugs = [], $size = 'large') {
        $term = dawp_home_find_product_cat($slugs);

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

$shop_url             = dawp_home_shop_url();
$new_arrivals_url     = add_query_arg('orderby', 'date', $shop_url);
$sleepwear_url        = dawp_home_category_url(['sleepwear'], 'Sleepwear');
$lingerie_url         = dawp_home_category_url(['lingerie-sets', 'lingerie'], 'Lingerie Sets');
$robes_url            = dawp_home_category_url(['robes-loungewear', 'robes-and-loungewear', 'robes', 'loungewear'], 'Robes & Loungewear');
$bras_url             = dawp_home_category_url(['bras-bralettes', 'bras-and-bralettes', 'bralettes', 'bras'], 'Bras & Bralettes');
$essentials_url       = dawp_home_category_url(['intimate-essentials', 'essentials'], 'Intimate Essentials');
$shipping_returns_url = home_url('/shipping-returns/');
$hero_image_url       = get_theme_file_uri('/assets/img/gallery/Home/Romantic_Intimates_Sleepwear.png');
$lace_feature_url     = get_theme_file_uri('/assets/img/gallery/Home/Lingerie_Lace.png');
$lace_detail_url      = get_theme_file_uri('/assets/img/gallery/Home/Lingerie_Lace_two.png');
$sleepwear_image_url  = get_theme_file_uri('/assets/img/gallery/Home/Sleepwear_Robes.png');
$new_products         = [];

if (function_exists('wc_get_products')) {
    $new_products = array_values(array_filter(wc_get_products([
        'status'  => 'publish',
        'limit'   => 4,
        'orderby' => 'date',
        'order'   => 'DESC',
    ]), function ($product) {
        return $product && $product->is_visible();
    }));
}

$categories = [
    [
        'name'  => 'Lingerie Sets',
        'copy'  => 'Soft lace and delicate matching pieces for romantic confidence.',
        'slugs' => ['lingerie-sets', 'lingerie'],
        'url'   => $lingerie_url,
        'image' => get_theme_file_uri('/assets/img/gallery/Home/Lingerie_Sets.png'),
    ],
    [
        'name'  => 'Sleepwear',
        'copy'  => 'Satin, lace-trim, and soft nightwear for quiet evenings.',
        'slugs' => ['sleepwear'],
        'url'   => $sleepwear_url,
        'image' => get_theme_file_uri('/assets/img/gallery/Home/Sleep_wear.png'),
    ],
    [
        'name'  => 'Robes & Loungewear',
        'copy'  => 'At-home elegance made for comfort, layering, and slow mornings.',
        'slugs' => ['robes-loungewear', 'robes-and-loungewear', 'robes', 'loungewear'],
        'url'   => $robes_url,
        'image' => get_theme_file_uri('/assets/img/gallery/Home/Robes_Loungewear.png'),
    ],
    [
        'name'  => 'Bras & Bralettes',
        'copy'  => 'Delicate support and feminine shapes for everyday intimacy.',
        'slugs' => ['bras-bralettes', 'bras-and-bralettes', 'bralettes', 'bras'],
        'url'   => $bras_url,
        'image' => get_theme_file_uri('/assets/img/gallery/Home/bras.png'),
    ],
    [
        'name'  => 'Intimate Essentials',
        'copy'  => 'Refined basics designed for softness, comfort, and ease.',
        'slugs' => ['intimate-essentials', 'essentials'],
        'url'   => $essentials_url,
        'image' => get_theme_file_uri('/assets/img/gallery/Home/intimate.png'),
    ],
];
?>

<div class="bg-white text-[#24132E] antialiased">
    <section class="overflow-hidden bg-[#FBF4FF] px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto grid max-w-7xl gap-10 lg:grid-cols-[0.92fr_1.08fr] lg:items-center">
            <div class="max-w-2xl">
                <p class="text-sm font-semibold uppercase text-[#6E3A8A]">Romantic Intimates &amp; Sleepwear</p>
                <h1 class="mt-4 font-heading text-5xl leading-[1.05] text-[#3B1748] sm:text-6xl lg:text-7xl">
                    Soft Intimates For Quiet Confidence
                </h1>
                <p class="mt-6 max-w-xl text-base leading-7 text-[#6D5875] sm:text-lg">
                    Romantic lingerie, sleepwear, robes, and feminine essentials designed for comfort, softness, and beautifully personal moments.
                </p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#3B1748] px-7 py-3 text-sm font-semibold text-white transition duration-300 hover:bg-[#6E3A8A]" href="<?php echo esc_url($new_arrivals_url); ?>">
                        Shop New Arrivals
                    </a>
                    <a class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#E8DFF0] bg-white px-7 py-3 text-sm font-semibold text-[#3B1748] transition duration-300 hover:bg-[#FBF4FF]" href="<?php echo esc_url($sleepwear_url); ?>">
                        Explore Sleepwear
                    </a>
                </div>
                <div class="mt-8 grid grid-cols-2 gap-4 text-sm text-[#6D5875] sm:grid-cols-3">
                    <div class="border-l border-[#E8DFF0] pl-4">
                        <span class="block font-semibold text-[#3B1748]">Lace</span>
                        Delicate details
                    </div>
                    <div class="border-l border-[#E8DFF0] pl-4">
                        <span class="block font-semibold text-[#3B1748]">Satin</span>
                        Soft textures
                    </div>
                    <div class="border-l border-[#E8DFF0] pl-4">
                        <span class="block font-semibold text-[#3B1748]">Comfort</span>
                        Everyday ease
                    </div>
                </div>
            </div>

            <div class="relative">
                <?php if ($hero_image_url) : ?>
                    <div class="overflow-hidden rounded-[2rem] border border-[#E8DFF0] bg-white p-3 shadow-2xl shadow-[#3B1748]/10">
                        <img class="aspect-[4/5] w-full rounded-2xl object-cover lg:aspect-[5/4]" src="<?php echo esc_url($hero_image_url); ?>" alt="Tasteful romantic sleepwear and intimate apparel from Shop Avec Moi" loading="eager" fetchpriority="high">
                    </div>
                <?php endif; ?>
                <div class="relative mx-auto -mt-4 max-w-xl rounded-2xl border border-[#E8DFF0] bg-white p-5 shadow-lg shadow-[#3B1748]/10">
                    <p class="font-heading text-2xl leading-tight text-[#3B1748]">Soft intimate pieces for comfort, romance, and quiet confidence.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto max-w-7xl">
            <div class="max-w-3xl">
                <p class="text-sm font-semibold uppercase text-[#6E3A8A]">Shop By Mood</p>
                <h2 class="mt-3 font-heading text-4xl leading-tight text-[#3B1748] md:text-5xl">
                    Curated for softness, romance, and ease.
                </h2>
                <p class="mt-4 text-base leading-7 text-[#6D5875]">
                    Explore intimate apparel by the pieces you reach for most: lace sets, sleepwear, robes, bralettes, and refined essentials.
                </p>
            </div>

            <div class="mt-10 grid grid-cols-2 gap-4 lg:grid-cols-5">
                <?php foreach ($categories as $category) :
                    $category_url = $category['url'];
                    $category_img = $category['image'];
                    ?>
                    <a class="group overflow-hidden rounded-2xl border border-[#E8DFF0] bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-[#3B1748]/10" href="<?php echo esc_url($category_url); ?>">
                        <?php if ($category_img) : ?>
                            <img class="aspect-[4/5] w-full object-cover transition duration-300 group-hover:scale-[1.03]" src="<?php echo esc_url($category_img); ?>" alt="<?php echo esc_attr($category['name']); ?>" loading="lazy">
                        <?php endif; ?>
                        <div class="p-4">
                            <h3 class="font-heading text-2xl leading-tight text-[#3B1748]"><?php echo esc_html($category['name']); ?></h3>
                            <p class="mt-2 text-sm leading-6 text-[#6D5875]"><?php echo esc_html($category['copy']); ?></p>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-[#3B1748] px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto grid max-w-7xl gap-10 lg:grid-cols-[1fr_0.85fr] lg:items-center">
            <div class="grid grid-cols-2 gap-4">
                <?php if ($lace_feature_url) : ?>
                    <img class="aspect-[4/5] w-full rounded-2xl object-cover shadow-xl shadow-black/20" src="<?php echo esc_url($lace_feature_url); ?>" alt="Soft lace lingerie styled with tasteful feminine detail" loading="lazy">
                <?php endif; ?>
                <?php if ($lace_detail_url) : ?>
                    <img class="mt-8 aspect-[4/5] w-full rounded-2xl object-cover shadow-lg shadow-black/20" src="<?php echo esc_url($lace_detail_url); ?>" alt="Close detail of lace and satin intimate apparel" loading="lazy">
                <?php endif; ?>
            </div>

            <div>
                <p class="text-sm font-semibold uppercase text-white">Lingerie &amp; Lace</p>
                <h2 class="mt-3 font-heading text-4xl leading-tight text-white md:text-5xl">
                    Delicate details, softly confident silhouettes.
                </h2>
                <p class="mt-5 text-base leading-7 text-white/75">
                    From lace-trim sets to feminine bralettes, Shop Avec Moi brings intimate pieces that feel romantic, comfortable, and beautifully personal, made for women who love softness without losing confidence.
                </p>

                <div class="mt-8 grid gap-3 sm:grid-cols-2">
                    <?php
                    $lace_highlights = ['Soft lace details', 'Romantic matching sets', 'Comfort-focused silhouettes', 'Tasteful feminine styling'];
                    foreach ($lace_highlights as $highlight) :
                        ?>
                        <div class="rounded-2xl border border-white/15 bg-white/10 p-4 text-sm font-semibold text-white">
                            <?php echo esc_html($highlight); ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <p class="mt-8 font-heading text-2xl text-white">Romance in the details.</p>
                <a class="mt-6 inline-flex min-h-12 items-center justify-center rounded-full bg-white px-7 py-3 text-sm font-semibold text-[#3B1748] transition duration-300 hover:bg-[#FBF4FF]" href="<?php echo esc_url($lingerie_url); ?>">
                    Shop Lingerie Sets
                </a>
            </div>
        </div>
    </section>

    <section class="bg-white px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto grid max-w-7xl gap-10 lg:grid-cols-[0.85fr_1fr] lg:items-center">
            <div>
                <p class="text-sm font-semibold uppercase text-[#6E3A8A]">Sleepwear &amp; Robes</p>
                <h2 class="mt-3 font-heading text-4xl leading-tight text-[#3B1748] md:text-5xl">
                    Soft pieces for evenings, slow mornings, and quiet self-care.
                </h2>
                <p class="mt-5 text-base leading-7 text-[#6D5875]">
                    Sleepwear should feel as beautiful as it is comfortable. Explore satin textures, delicate trims, soft robes, and loungewear pieces made for restful evenings and graceful at-home moments.
                </p>

                <div class="mt-8 grid gap-3 sm:grid-cols-2">
                    <?php
                    $sleepwear_highlights = ['Satin sleepwear', 'Soft robes', 'Loungewear ease', 'Elegant at-home comfort'];
                    foreach ($sleepwear_highlights as $highlight) :
                        ?>
                        <div class="rounded-2xl border border-[#E8DFF0] bg-white p-4 text-sm font-semibold text-[#3B1748]">
                            <?php echo esc_html($highlight); ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#3B1748] px-7 py-3 text-sm font-semibold text-white transition duration-300 hover:bg-[#6E3A8A]" href="<?php echo esc_url($sleepwear_url); ?>">
                        Explore Sleepwear
                    </a>
                    <a class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#E8DFF0] bg-white px-7 py-3 text-sm font-semibold text-[#3B1748] transition duration-300 hover:bg-[#FBF4FF]" href="<?php echo esc_url($robes_url); ?>">
                        Shop Robes &amp; Loungewear
                    </a>
                </div>
            </div>

            <?php if ($sleepwear_image_url) : ?>
                <div class="overflow-hidden rounded-[2rem] border border-[#E8DFF0] bg-white p-3 shadow-2xl shadow-[#3B1748]/10">
                    <img class="aspect-[4/5] w-full rounded-2xl object-cover lg:aspect-[5/4]" src="<?php echo esc_url($sleepwear_image_url); ?>" alt="Soft sleepwear and robes for elegant at-home comfort" loading="lazy">
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="bg-white px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto max-w-7xl">
            <div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-3xl">
                    <p class="text-sm font-semibold uppercase text-[#6E3A8A]">New Arrivals</p>
                    <h2 class="mt-3 font-heading text-4xl leading-tight text-[#3B1748] md:text-5xl">
                        Fresh pieces for soft, personal moments.
                    </h2>
                    <p class="mt-4 text-base leading-7 text-[#6D5875]">
                        Discover romantic lingerie, satin sleepwear, delicate robes, and feminine essentials newly added to Shop Avec Moi.
                    </p>
                </div>
                <a class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#E8DFF0] px-7 py-3 text-sm font-semibold text-[#3B1748] transition duration-300 hover:bg-[#FBF4FF]" href="<?php echo esc_url($new_arrivals_url); ?>">
                    View New Arrivals
                </a>
            </div>

            <?php if (!empty($new_products)) : ?>
                <div class="mt-10 grid grid-cols-2 gap-4 lg:grid-cols-4">
                    <?php foreach ($new_products as $product) :
                        $product_url = get_permalink($product->get_id());
                        $image_id    = $product->get_image_id();
                        $image_url   = $image_id ? wp_get_attachment_image_url($image_id, 'woocommerce_single') : (function_exists('wc_placeholder_img_src') ? wc_placeholder_img_src('woocommerce_single') : '');
                        ?>
                        <a class="group overflow-hidden rounded-2xl border border-[#E8DFF0] bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-[#3B1748]/10" href="<?php echo esc_url($product_url); ?>">
                            <?php if ($image_url) : ?>
                                <img class="aspect-[4/5] w-full object-cover transition duration-300 group-hover:scale-[1.03]" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($product->get_name()); ?>" loading="lazy">
                            <?php endif; ?>
                            <div class="p-4">
                                <h3 class="text-sm font-semibold leading-6 text-[#3B1748] md:text-base"><?php echo esc_html($product->get_name()); ?></h3>
                                <div class="mt-2 text-sm font-bold text-[#6E3A8A]"><?php echo wp_kses_post($product->get_price_html()); ?></div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <div class="mt-10 rounded-2xl border border-[#E8DFF0] bg-white p-8 text-[#6D5875]">
                    New arrivals will appear here as products are added to the boutique.
                </div>
            <?php endif; ?>

            <div class="mt-14 overflow-hidden rounded-[2rem] bg-[#21102C] p-6 text-white sm:p-8 lg:p-10">
                <div class="grid gap-8 lg:grid-cols-[0.72fr_1.28fr] lg:items-center">
                    <div>
                        <p class="text-sm font-semibold uppercase text-white">Customer Care</p>
                        <h2 class="mt-3 font-heading text-4xl leading-tight text-white md:text-5xl">
                            A softer shopping experience, from fit to delivery.
                        </h2>
                        <p class="mt-5 text-base leading-7 text-white/75">
                            Need help with sizing, orders, or product questions? Contact support@shopavecmoi.com during business hours, Monday to Friday, 9:00 AM to 6:00 PM EST.
                        </p>
                        <a class="mt-7 inline-flex min-h-12 items-center justify-center rounded-full bg-white px-7 py-3 text-sm font-semibold text-[#3B1748] transition duration-300 hover:bg-[#FBF4FF]" href="<?php echo esc_url($shipping_returns_url); ?>">
                            View Shipping &amp; Returns
                        </a>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <?php
                        $trust_cards = [
                            ['title' => 'Secure Checkout', 'copy' => 'Shop with a simple and secure checkout experience.'],
                            ['title' => 'Tracking Included', 'copy' => 'Tracking information is provided once your order ships.'],
                            ['title' => '30-Day Returns', 'copy' => 'Eligible unworn and unused items may be returned within 30 days of delivery.'],
                            ['title' => 'Hygiene-Aware Policy', 'copy' => 'Return eligibility may depend on condition, tags, packaging, and hygiene requirements.'],
                        ];
                        foreach ($trust_cards as $card) :
                            ?>
                            <div class="rounded-2xl border border-white/15 bg-white/10 p-5">
                                <div class="mb-4 flex h-10 w-10 items-center justify-center rounded-full bg-white text-[#3B1748]">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M20 6 9 17l-5-5" />
                                    </svg>
                                </div>
                                <h3 class="text-base font-semibold text-white"><?php echo esc_html($card['title']); ?></h3>
                                <p class="mt-2 text-sm leading-6 text-white/75"><?php echo esc_html($card['copy']); ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
