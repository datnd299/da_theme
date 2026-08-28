<?php
/**
 * Homepage template part for Corvelshop.
 *
 * @package dawp
 */

$theme_uri       = get_template_directory_uri();
$shop_url        = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$about_url       = home_url('/about-us/');
$hero_image      = $theme_uri . '/assets/images/home/luxuryimagecollection/1.jpg';
$editorial_image = $theme_uri . '/assets/images/home/luxuryimagecollection/2.jpg';

if (!function_exists('dawp_home_products')) {
    function dawp_home_products($args = []) {
        if (!class_exists('WooCommerce')) {
            return [];
        }

        $defaults = [
            'status'  => 'publish',
            'limit'   => 4,
            'orderby' => 'date',
            'order'   => 'DESC',
            'return'  => 'objects',
        ];

        return wc_get_products(wp_parse_args($args, $defaults));
    }
}

if (!function_exists('dawp_home_product_card')) {
    function dawp_home_product_card($product) {
        if (!$product instanceof WC_Product) {
            return;
        }

        $image_id = $product->get_image_id();
        ?>
        <article class="cv-product group">
            <a class="cv-product__image" href="<?php echo esc_url($product->get_permalink()); ?>">
                <?php
                if ($image_id) {
                    echo wp_get_attachment_image(
                        $image_id,
                        'woocommerce_thumbnail',
                        false,
                        [
                            'class'   => 'h-full w-full object-cover transition duration-500 group-hover:scale-[1.025]',
                            'loading' => 'lazy',
                        ]
                    );
                } else {
                    echo wc_placeholder_img('woocommerce_thumbnail', ['class' => 'h-full w-full object-cover']);
                }
                ?>
            </a>
            <a class="cv-product__name" href="<?php echo esc_url($product->get_permalink()); ?>">
                <?php echo esc_html($product->get_name()); ?>
            </a>
            <div class="cv-product__price"><?php echo wp_kses_post($product->get_price_html()); ?></div>
        </article>
        <?php
    }
}

$featured_products = dawp_home_products([
    'limit'    => 4,
    'featured' => true,
]);

if (empty($featured_products)) {
    $featured_products = dawp_home_products(['limit' => 4]);
}

$featured_product_ids = array_map(
    static function ($product) {
        return $product instanceof WC_Product ? $product->get_id() : 0;
    },
    $featured_products
);

$latest_products = dawp_home_products([
    'limit'   => 4,
    'exclude' => array_filter($featured_product_ids),
]);

if (count($latest_products) < 4) {
    $latest_products = dawp_home_products(['limit' => 4]);
}
?>

<div class="cv-home bg-[#F5F2EB] text-[#171A19]">
    <section class="relative overflow-hidden bg-[#0D0F0F] text-white">
        <div class="absolute inset-0">
            <?php
            echo qb_responsive_image(
                $hero_image,
                __('Modern black luxury watch campaign image', 'dawp'),
                [
                    'class'   => 'h-full w-full object-cover object-center opacity-80',
                    'width'   => 1536,
                    'height'  => 1024,
                    'widths'  => [768, 1024, 1360, 1536],
                    'sizes'   => '100vw',
                    'loading' => 'eager',
                ]
            );
            ?>
            <div class="absolute inset-0 bg-[linear-gradient(90deg,rgba(13,15,15,.92),rgba(13,15,15,.58)_42%,rgba(13,15,15,.08)_82%)]"></div>
        </div>

        <div class="relative mx-auto grid min-h-[440px] w-[min(100%-40px,1360px)] items-center pt-10 pb-16 md:min-h-[520px] md:w-[min(100%-80px,1360px)] lg:min-h-[580px]">
            <div class="max-w-[610px]">
                <p class="mb-5 text-[12px] font-semibold uppercase tracking-[.26em] text-[#B38A52]"><?php esc_html_e('Corvelshop', 'dawp'); ?></p>
                <h1 class="font-serif text-[clamp(42px,6vw,64px)] leading-[.98] tracking-normal"><?php esc_html_e('Precision with Presence.', 'dawp'); ?></h1>
                <p class="mt-6 max-w-[470px] text-[16px] leading-7 text-[#D8D6CF]"><?php esc_html_e('Modern luxury watches with confident form, refined materials, and a quieter kind of power.', 'dawp'); ?></p>
                <div class="mt-9 flex flex-wrap gap-3">
                    <a class="cv-btn cv-btn--light" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop Watches', 'dawp'); ?></a>
                    <a class="cv-btn cv-btn--ghost" href="<?php echo esc_url($about_url); ?>"><?php esc_html_e('About Us', 'dawp'); ?></a>
                </div>
            </div>
            <div class="absolute bottom-6 left-1/2 hidden w-[min(100%-80px,1360px)] -translate-x-1/2 justify-between border-t border-white/18 pt-5 text-[11px] uppercase tracking-[.2em] text-[#B8B8B2] md:flex">
                <span><?php esc_html_e('Dark Editorial', 'dawp'); ?></span>
                <span><?php esc_html_e('Modern Time', 'dawp'); ?></span>
                <span><?php esc_html_e('Refined Form', 'dawp'); ?></span>
            </div>
        </div>
    </section>

    <section id="cv-featured" class="py-16 md:py-24">
        <div class="mx-auto w-[min(100%-40px,1360px)] md:w-[min(100%-80px,1360px)]">
            <div class="mb-9 flex flex-col justify-between gap-5 border-b border-[#B8B8B2]/55 pb-6 md:flex-row md:items-end">
                <div>
                    <p class="cv-kicker"><?php esc_html_e('Featured', 'dawp'); ?></p>
                    <h2 class="cv-heading"><?php esc_html_e('Designed to Be Noticed.', 'dawp'); ?></h2>
                </div>
                <a class="cv-link" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop all', 'dawp'); ?> <span aria-hidden="true">-></span></a>
            </div>

            <?php if (!empty($featured_products)) : ?>
                <div class="grid grid-cols-2 gap-x-6 gap-y-10 lg:grid-cols-4">
                    <?php foreach ($featured_products as $product) : ?>
                        <?php dawp_home_product_card($product); ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="bg-[#0D0F0F] text-white">
        <div class="mx-auto grid w-[min(100%-40px,1360px)] gap-10 py-16 md:w-[min(100%-80px,1360px)] md:grid-cols-12 md:py-24">
            <div class="md:col-span-7">
                <div class="overflow-hidden">
                    <?php
                    echo qb_responsive_image(
                        $editorial_image,
                        __('Silver luxury watch on ivory architectural surface', 'dawp'),
                        [
                            'class'   => 'aspect-[16/10] w-full object-cover transition duration-500 hover:scale-[1.02]',
                            'width'   => 1536,
                            'height'  => 1024,
                            'widths'  => [640, 960, 1280, 1536],
                            'sizes'   => '(max-width: 768px) 100vw, 58vw',
                            'loading' => 'lazy',
                        ]
                    );
                    ?>
                </div>
            </div>
            <div class="flex flex-col justify-center md:col-span-4 md:col-start-9">
                <p class="mb-5 text-[12px] font-semibold uppercase tracking-[.24em] text-[#B38A52]"><?php esc_html_e('Campaign', 'dawp'); ?></p>
                <h2 class="font-serif text-[clamp(32px,4vw,46px)] leading-tight"><?php esc_html_e('Modern Time. Refined Form.', 'dawp'); ?></h2>
                <p class="mt-6 text-[16px] leading-7 text-[#D8D6CF]"><?php esc_html_e('A focused edit of watches built around proportion, texture, and daily presence.', 'dawp'); ?></p>
                <a class="cv-btn cv-btn--light mt-9 w-fit" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Explore the Edit', 'dawp'); ?></a>
            </div>
        </div>
    </section>

    <?php if (!empty($latest_products)) : ?>
        <section class="bg-white py-16 md:py-24">
            <div class="mx-auto w-[min(100%-40px,1360px)] md:w-[min(100%-80px,1360px)]">
                <div class="mb-9 grid gap-5 md:grid-cols-12 md:items-end">
                    <div class="md:col-span-6">
                        <p class="cv-kicker"><?php esc_html_e('Selection', 'dawp'); ?></p>
                        <h2 class="cv-heading"><?php esc_html_e('Time, Made Distinct.', 'dawp'); ?></h2>
                    </div>
                    <p class="text-[15px] leading-7 text-[#5E625F] md:col-span-4 md:col-start-9"><?php esc_html_e('Clean ecommerce, precise presentation, and product detail where it matters.', 'dawp'); ?></p>
                </div>

                <div class="grid grid-cols-2 gap-x-6 gap-y-10 lg:grid-cols-4">
                    <?php foreach ($latest_products as $product) : ?>
                        <?php dawp_home_product_card($product); ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section class="py-16 md:py-24">
        <div class="mx-auto grid w-[min(100%-40px,1360px)] gap-10 border-y border-[#B8B8B2]/55 py-12 md:w-[min(100%-80px,1360px)] md:grid-cols-12 md:py-16">
            <div class="md:col-span-5">
                <p class="cv-kicker"><?php esc_html_e('Corvel Standard', 'dawp'); ?></p>
                <h2 class="cv-heading"><?php esc_html_e('Built Around the Details.', 'dawp'); ?></h2>
            </div>
            <div class="grid gap-7 md:col-span-6 md:col-start-7 sm:grid-cols-3">
                <div>
                    <span class="cv-detail-line"></span>
                    <h3 class="cv-detail-title"><?php esc_html_e('Material', 'dawp'); ?></h3>
                    <p class="cv-detail-copy"><?php esc_html_e('Steel, leather, and tactile finishes with restrained polish.', 'dawp'); ?></p>
                </div>
                <div>
                    <span class="cv-detail-line"></span>
                    <h3 class="cv-detail-title"><?php esc_html_e('Presence', 'dawp'); ?></h3>
                    <p class="cv-detail-copy"><?php esc_html_e('Strong silhouettes balanced by clean, wearable proportions.', 'dawp'); ?></p>
                </div>
                <div>
                    <span class="cv-detail-line"></span>
                    <h3 class="cv-detail-title"><?php esc_html_e('Service', 'dawp'); ?></h3>
                    <p class="cv-detail-copy"><?php esc_html_e('Secure checkout, clear policies, and attentive support.', 'dawp'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#263C33] py-14 text-white md:py-18">
        <div class="mx-auto grid w-[min(100%-40px,1360px)] gap-7 md:w-[min(100%-80px,1360px)] md:grid-cols-12 md:items-center">
            <div class="md:col-span-6">
                <p class="mb-4 text-[12px] font-semibold uppercase tracking-[.24em] text-[#D7B987]"><?php esc_html_e('Private Notes', 'dawp'); ?></p>
                <h2 class="font-serif text-[clamp(30px,3.6vw,42px)] leading-tight"><?php esc_html_e('New drops. Quietly delivered.', 'dawp'); ?></h2>
            </div>
            <form class="flex gap-3 md:col-span-5 md:col-start-8" action="<?php echo esc_url(home_url('/')); ?>" method="post">
                <label class="sr-only" for="cv-newsletter-email"><?php esc_html_e('Email address', 'dawp'); ?></label>
                <input id="cv-newsletter-email" class="min-h-12 min-w-0 flex-1 border border-white/25 bg-white px-4 text-[14px] text-[#171A19] outline-none placeholder:text-[#777]" type="email" name="email" placeholder="<?php esc_attr_e('Email address', 'dawp'); ?>">
                <button class="cv-btn cv-btn--dark shrink-0" type="submit"><?php esc_html_e('Join', 'dawp'); ?></button>
            </form>
        </div>
    </section>
</div>
