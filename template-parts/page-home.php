<?php
/**
 * Template Part: page-home
 */

defined('ABSPATH') || exit;

if (!function_exists('dawp_home_product_grid')) {
    function dawp_home_product_grid($products) {
        if (empty($products)) {
            ?>
            <div class="col-span-full rounded-3xl border border-[#D8CEC6] bg-white p-8 text-center">
                <p class="text-[#6F625D]"><?php esc_html_e('New Smartbasketco patch designs will be available soon.', 'dawp'); ?></p>
            </div>
            <?php
            return;
        }

        foreach ($products as $product) :
            if (!$product instanceof WC_Product) {
                continue;
            }

            $product_id = $product->get_id();
            $image_id   = $product->get_image_id();
            $image      = $image_id
                ? wp_get_attachment_image($image_id, 'woocommerce_single', false, [
                    'class'   => 'h-full w-full object-cover transition-transform duration-500 group-hover:scale-105',
                    'loading' => 'lazy',
                ])
                : wc_placeholder_img('woocommerce_single', ['class' => 'h-full w-full object-cover']);
            ?>
            <article class="group overflow-hidden rounded-3xl border border-[#D8CEC6] bg-white shadow-[0_12px_30px_rgba(47,42,40,0.06)] transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_18px_40px_rgba(47,42,40,0.12)]">
                <a href="<?php echo esc_url(get_permalink($product_id)); ?>" class="block" aria-label="<?php echo esc_attr($product->get_name()); ?>">
                    <div class="aspect-square overflow-hidden bg-[#F4ECE5]">
                        <?php echo $image; ?>
                    </div>
                    <div class="space-y-4 p-4 sm:p-5">
                        <div class="space-y-2">
                            <h3 class="line-clamp-2 min-h-[3rem] text-base font-bold leading-snug text-[#2F2A28]">
                                <?php echo esc_html($product->get_name()); ?>
                            </h3>
                            <div class="text-base font-bold text-[#C98A8A]">
                                <?php echo wp_kses_post($product->get_price_html()); ?>
                            </div>
                        </div>
                        <span class="inline-flex min-h-11 w-full items-center justify-center rounded-full bg-[#2F2A28] px-5 py-3 text-sm font-bold text-white transition-colors duration-300 group-hover:bg-[#C98A8A]">
                            <?php esc_html_e('View Product', 'dawp'); ?>
                        </span>
                    </div>
                </a>
            </article>
            <?php
        endforeach;
    }
}

if (!function_exists('dawp_home_products')) {
    function dawp_home_products($args = []) {
        if (!class_exists('WooCommerce')) {
            return [];
        }

        $products = wc_get_products(array_merge([
            'status'  => 'publish',
            'limit'   => 8,
            'orderby' => 'date',
            'order'   => 'DESC',
        ], $args));

        return array_values(array_filter($products, static function ($product) {
            return $product instanceof WC_Product && $product->get_image_id();
        }));
    }
}

if (!function_exists('dawp_home_image_tile')) {
    function dawp_home_image_tile($product, $wrapper_class = '', $img_class = '') {
        if (!$product instanceof WC_Product) {
            return;
        }
        $image = wp_get_attachment_image($product->get_image_id(), 'woocommerce_thumbnail', false, [
            'class'   => $img_class ?: 'h-full w-full object-cover transition-transform duration-500 group-hover:scale-105',
            'loading' => 'lazy',
        ]);
        ?>
        <a href="<?php echo esc_url(get_permalink($product->get_id())); ?>"
           class="group relative block overflow-hidden bg-[#F4ECE5] <?php echo esc_attr($wrapper_class); ?>"
           aria-label="<?php echo esc_attr($product->get_name()); ?>">
            <?php echo $image; ?>
        </a>
        <?php
    }
}

$new_arrivals = dawp_home_products(['limit' => 8, 'orderby' => 'date', 'order' => 'DESC']);
$favorites    = dawp_home_products(['limit' => 8, 'orderby' => 'popularity']);
if (empty($favorites)) {
    $favorites = $new_arrivals;
}

$showcase = dawp_home_products(['limit' => 14, 'orderby' => 'rand']);
if (empty($showcase)) {
    $showcase = $new_arrivals;
}

$hero_tiles    = array_slice($showcase, 0, 3);
$catalog_tiles = array_slice($showcase, 0, 6);
$gallery_tiles = array_slice($showcase, 0, 8);
$feature_tile  = $showcase[0] ?? null;

$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');

$steps = [
    ['no' => '01', 'title' => __('Send your design', 'dawp'), 'copy' => __('Share a logo, sketch, or idea with the size and backing you need.', 'dawp')],
    ['no' => '02', 'title' => __('We digitize and stitch', 'dawp'), 'copy' => __('Your artwork is mapped to thread and embroidered onto durable twill.', 'dawp')],
    ['no' => '03', 'title' => __('Iron or sew it on', 'dawp'), 'copy' => __('Patches arrive ready to apply to jackets, bags, hats, and uniforms.', 'dawp')],
];

$feature_points = [
    ['title' => __('Stitched Twill', 'dawp'), 'copy' => __('Tight embroidery on a sturdy fabric base.', 'dawp')],
    ['title' => __('Iron-On Backing', 'dawp'), 'copy' => __('Heat-seal or sew-on options available.', 'dawp')],
    ['title' => __('Any Shape', 'dawp'), 'copy' => __('Circles, shields, banners, and custom cuts.', 'dawp')],
];

$trust_cards = [
    ['title' => __('Secure Checkout', 'dawp'), 'copy' => __('A clean and protected checkout experience for every order.', 'dawp')],
    ['title' => __('Tracking Included', 'dawp'), 'copy' => __('Tracking details are provided once your order ships.', 'dawp')],
    ['title' => __('30-Day Returns', 'dawp'), 'copy' => __('Returns are available on eligible unused items within 30 days of delivery.', 'dawp')],
    ['title' => __('Custom Design Help', 'dawp'), 'copy' => __('Our team reviews your artwork and confirms sizing before production.', 'dawp')],
];
?>

<main class="bg-[#F8F3EC] text-[#2F2A28]">
    <!-- Hero -->
    <section class="relative overflow-hidden bg-[#241F1D] text-white">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_15%_20%,rgba(201,138,138,0.22),transparent_45%),radial-gradient(circle_at_85%_80%,rgba(232,216,200,0.12),transparent_40%)]"></div>
        <div class="relative mx-auto grid w-[min(100%,1180px)] gap-12 px-4 pb-14 pt-20 sm:px-6 lg:grid-cols-[1.1fr_0.9fr] lg:items-center lg:gap-10 lg:px-8 lg:pb-20 lg:pt-24">
            <div class="max-w-2xl">
                <span class="inline-flex border-b border-[#E8D8C8] pb-2 text-xs font-bold uppercase tracking-[0.18em] text-[#E8D8C8]">
                    <?php esc_html_e('Smartbasketco', 'dawp'); ?>
                </span>
                <h1 class="mt-7 font-serif text-4xl leading-[1.04] text-white sm:text-5xl lg:text-6xl">
                    <?php esc_html_e('Custom Embroidered Patches, Made Your Way', 'dawp'); ?>
                </h1>
                <p class="mt-6 max-w-xl text-base leading-8 text-white/78 sm:text-lg">
                    <?php esc_html_e('Shop hundreds of ready-made embroidered patch designs, or send your own artwork for a fully custom patch with iron-on or sew-on backing.', 'dawp'); ?>
                </p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-white px-7 py-3 text-sm font-bold text-[#2F2A28] transition-colors duration-300 hover:bg-[#E8D8C8]">
                        <?php esc_html_e('Shop All Patches', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-white/35 px-7 py-3 text-sm font-bold text-white transition-colors duration-300 hover:border-white hover:bg-white/10">
                        <?php esc_html_e('Start a Custom Order', 'dawp'); ?>
                    </a>
                </div>

                <div class="mt-12 grid gap-3 border-t border-white/18 pt-5 sm:grid-cols-3">
                    <div>
                        <span class="block font-serif text-2xl text-white"><?php esc_html_e('01', 'dawp'); ?></span>
                        <p class="mt-1 text-sm leading-6 text-white/72"><?php esc_html_e('Your artwork stitched onto durable embroidered twill.', 'dawp'); ?></p>
                    </div>
                    <div>
                        <span class="block font-serif text-2xl text-white"><?php esc_html_e('02', 'dawp'); ?></span>
                        <p class="mt-1 text-sm leading-6 text-white/72"><?php esc_html_e('Iron-on and sew-on backing options for every patch.', 'dawp'); ?></p>
                    </div>
                    <div>
                        <span class="block font-serif text-2xl text-white"><?php esc_html_e('03', 'dawp'); ?></span>
                        <p class="mt-1 text-sm leading-6 text-white/72"><?php esc_html_e('Custom sizes and shapes, from small badges to back patches.', 'dawp'); ?></p>
                    </div>
                </div>
            </div>

            <?php if (count($hero_tiles) >= 3) : ?>
                <div class="grid grid-cols-2 gap-4">
                    <div class="group aspect-square overflow-hidden rounded-[24px] border-4 border-white/90 shadow-[0_18px_44px_rgba(0,0,0,0.35)]">
                        <?php dawp_home_image_tile($hero_tiles[0], 'h-full w-full', 'h-full w-full object-cover transition-transform duration-500 group-hover:scale-105'); ?>
                    </div>
                    <div class="group aspect-square translate-y-8 overflow-hidden rounded-[24px] border-4 border-white/90 shadow-[0_18px_44px_rgba(0,0,0,0.35)]">
                        <?php dawp_home_image_tile($hero_tiles[1], 'h-full w-full', 'h-full w-full object-cover transition-transform duration-500 group-hover:scale-105'); ?>
                    </div>
                    <div class="group col-span-2 aspect-[16/10] overflow-hidden rounded-[24px] border-4 border-white/90 shadow-[0_18px_44px_rgba(0,0,0,0.35)]">
                        <?php dawp_home_image_tile($hero_tiles[2], 'h-full w-full', 'h-full w-full object-cover transition-transform duration-500 group-hover:scale-105'); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Shop all patches -->
    <section class="bg-white px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto grid w-[min(100%,1180px)] gap-8 lg:grid-cols-[0.9fr_1.1fr] lg:items-center">
            <div class="flex flex-col justify-center gap-6 border-y border-[#D8CEC6] py-8 lg:py-10">
                <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#C98A8A]"><?php esc_html_e('The Full Catalog', 'dawp'); ?></span>
                <h2 class="max-w-md font-serif text-3xl leading-tight text-[#2F2A28] sm:text-5xl"><?php esc_html_e('Browse every embroidered patch in one place.', 'dawp'); ?></h2>
                <p class="max-w-md text-base leading-8 text-[#6F625D]">
                    <?php esc_html_e('Hundreds of embroidered patch designs for jackets, bags, hats, and uniforms, plus fully custom patches made from your own artwork.', 'dawp'); ?>
                </p>
                <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 w-fit items-center justify-center rounded-full bg-[#2F2A28] px-7 py-3 text-sm font-bold text-white transition-colors hover:bg-[#C98A8A]">
                    <?php esc_html_e('Shop All Patches', 'dawp'); ?>
                </a>
            </div>

            <?php if (count($catalog_tiles) >= 6) : ?>
                <div class="grid grid-cols-3 gap-3 sm:gap-4">
                    <?php foreach ($catalog_tiles as $tile) : ?>
                        <?php dawp_home_image_tile($tile, 'aspect-square rounded-[12px] border border-[#D8CEC6]'); ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- New arrivals -->
    <section class="bg-[#F4ECE5] px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto w-[min(100%,1180px)]">
            <div class="mb-10 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                <div class="max-w-2xl space-y-3">
                    <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#C98A8A]"><?php esc_html_e('New Arrivals', 'dawp'); ?></span>
                    <h2 class="font-serif text-3xl leading-tight text-[#2F2A28] sm:text-4xl"><?php esc_html_e('Fresh patch designs added regularly', 'dawp'); ?></h2>
                </div>
                <a href="<?php echo esc_url($shop_url); ?>" class="text-sm font-bold text-[#2F2A28] underline decoration-[#C98A8A] decoration-2 underline-offset-8 transition-colors hover:text-[#C98A8A]">
                    <?php esc_html_e('View All', 'dawp'); ?>
                </a>
            </div>

            <div class="grid grid-cols-2 gap-4 lg:grid-cols-4 lg:gap-6">
                <?php dawp_home_product_grid(array_slice($new_arrivals, 0, 4)); ?>
            </div>
        </div>
    </section>

    <!-- Feature -->
    <section class="px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto grid w-[min(100%,1180px)] items-center gap-8 lg:grid-cols-2">
            <?php if ($feature_tile) : ?>
                <div class="group overflow-hidden rounded-[28px] border-8 border-white shadow-[0_18px_44px_rgba(47,42,40,0.12)]">
                    <a href="<?php echo esc_url(get_permalink($feature_tile->get_id())); ?>" class="block aspect-[5/4] w-full overflow-hidden bg-[#F4ECE5]" aria-label="<?php echo esc_attr($feature_tile->get_name()); ?>">
                        <?php echo wp_get_attachment_image($feature_tile->get_image_id(), 'woocommerce_single', false, [
                            'class'   => 'h-full w-full object-cover transition-transform duration-500 group-hover:scale-105',
                            'loading' => 'lazy',
                        ]); ?>
                    </a>
                </div>
            <?php endif; ?>
            <div class="rounded-[28px] border border-[#D8CEC6] bg-white p-8 shadow-[0_12px_30px_rgba(47,42,40,0.08)] lg:p-10">
                <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#C98A8A]"><?php esc_html_e('Made To Order', 'dawp'); ?></span>
                <h2 class="mt-4 font-serif text-3xl leading-tight text-[#2F2A28] sm:text-4xl">
                    <?php esc_html_e('Embroidered patches built to last on jackets, bags, and uniforms.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-[#6F625D]">
                    <?php esc_html_e('Smartbasketco makes embroidered patches for makers, teams, events, clubs, and brands, with clear sizing, backing options, and care details on every product page.', 'dawp'); ?>
                </p>
                <div class="mt-8 grid gap-3 sm:grid-cols-3">
                    <?php foreach ($feature_points as $point) : ?>
                        <div class="rounded-2xl bg-[#F8F3EC] p-4">
                            <h3 class="font-bold text-[#2F2A28]"><?php echo esc_html($point['title']); ?></h3>
                            <p class="mt-2 text-sm leading-6 text-[#6F625D]"><?php echo esc_html($point['copy']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
                <a href="<?php echo esc_url($shop_url); ?>" class="mt-8 inline-flex min-h-12 items-center justify-center rounded-full bg-[#C98A8A] px-7 py-3 text-sm font-bold text-white transition-colors duration-300 hover:bg-[#2F2A28]">
                    <?php esc_html_e('Shop The Collection', 'dawp'); ?>
                </a>
            </div>
        </div>
    </section>

    <!-- How it works -->
    <section class="bg-white px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto w-[min(100%,1180px)]">
            <div class="mb-10 max-w-2xl space-y-3">
                <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#C98A8A]"><?php esc_html_e('Custom Patches', 'dawp'); ?></span>
                <h2 class="font-serif text-3xl leading-tight text-[#2F2A28] sm:text-4xl"><?php esc_html_e('From your idea to a finished patch in three steps.', 'dawp'); ?></h2>
            </div>
            <div class="grid gap-4 md:grid-cols-3 md:gap-6">
                <?php foreach ($steps as $step) : ?>
                    <div class="rounded-3xl border border-[#D8CEC6] bg-[#F8F3EC] p-6 sm:p-8">
                        <span class="font-serif text-3xl text-[#C98A8A]"><?php echo esc_html($step['no']); ?></span>
                        <h3 class="mt-4 font-serif text-xl text-[#2F2A28]"><?php echo esc_html($step['title']); ?></h3>
                        <p class="mt-3 text-sm leading-6 text-[#6F625D]"><?php echo esc_html($step['copy']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Favorites -->
    <section class="bg-[#F4ECE5] px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto w-[min(100%,1180px)]">
            <div class="mb-10 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                <div class="max-w-2xl space-y-3">
                    <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#C98A8A]"><?php esc_html_e('Customer Favorites', 'dawp'); ?></span>
                    <h2 class="font-serif text-3xl leading-tight text-[#2F2A28] sm:text-4xl"><?php esc_html_e('Popular embroidered patches', 'dawp'); ?></h2>
                </div>
                <p class="max-w-md text-sm leading-6 text-[#6F625D]"><?php esc_html_e('A selection of patch designs our customers order most for gear, gifts, and group projects.', 'dawp'); ?></p>
            </div>
            <div class="grid grid-cols-2 gap-4 lg:grid-cols-4 lg:gap-6">
                <?php dawp_home_product_grid(array_slice($favorites, 0, 4)); ?>
            </div>
        </div>
    </section>

    <!-- About and newsletter -->
    <section class="px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto grid min-h-[520px] w-[min(100%,1180px)] overflow-hidden rounded-[28px] bg-[#2F2A28] lg:min-h-[560px] lg:grid-cols-[0.9fr_1.1fr]">
            <div class="grid min-h-[240px] grid-cols-2 gap-2 bg-[#241F1D] p-2 lg:min-h-[560px]">
                <?php
                $about_tiles = array_slice($showcase, 0, 4);
                if (count($about_tiles) >= 4) :
                    foreach ($about_tiles as $tile) :
                        dawp_home_image_tile($tile, 'h-full min-h-[120px] w-full overflow-hidden rounded-[12px]');
                    endforeach;
                endif;
                ?>
            </div>
            <div class="flex min-h-[520px] flex-col justify-center p-8 pb-10 text-white sm:p-10 sm:pb-12 lg:min-h-[560px] lg:p-12">
                <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#E8D8C8]"><?php esc_html_e('Our Workshop Direction', 'dawp'); ?></span>
                <h2 class="mt-4 font-serif text-3xl leading-tight sm:text-4xl">
                    <?php esc_html_e('A dedicated shop for custom and ready-made embroidered patches.', 'dawp'); ?>
                </h2>
                <p class="mt-5 max-w-2xl text-base leading-8 text-white/78">
                    <?php esc_html_e('Smartbasketco brings together a large catalog of embroidered patch designs and a simple custom process, so you can add a finished patch to almost anything you wear or carry.', 'dawp'); ?>
                </p>
                <form id="newsletter-form" class="mt-8 grid gap-3 sm:grid-cols-[1fr_auto]" method="post" action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>" novalidate>
                    <input type="hidden" name="action" value="dawp_newsletter">
                    <input type="hidden" name="nonce" value="<?php echo esc_attr(wp_create_nonce('dawp_newsletter_nonce')); ?>">
                    <label class="sr-only" for="home-newsletter-email"><?php esc_html_e('Email address', 'dawp'); ?></label>
                    <input id="home-newsletter-email" name="email" type="email" required autocomplete="email" placeholder="<?php esc_attr_e('Enter your email', 'dawp'); ?>" class="min-h-12 min-w-0 rounded-full border border-white/18 bg-white px-5 text-sm text-[#2F2A28] outline-none transition-colors placeholder:text-[#948984] focus:border-[#C98A8A]">
                    <button type="submit" class="min-h-12 whitespace-nowrap rounded-full bg-[#C98A8A] px-7 py-3 text-sm font-bold text-white transition-colors hover:bg-white hover:text-[#2F2A28] disabled:cursor-not-allowed disabled:opacity-70">
                        <?php esc_html_e('Sign Up', 'dawp'); ?>
                    </button>
                    <p id="newsletter-msg" class="text-sm font-bold sm:col-span-2" aria-live="polite" style="display:none"></p>
                </form>
                <div class="mt-8 flex flex-col flex-wrap gap-3 sm:flex-row">
                    <a href="<?php echo esc_url(home_url('/about-us/')); ?>" class="inline-flex min-h-11 w-full items-center justify-center rounded-full border border-white/24 px-6 py-3 text-sm font-bold text-white transition-colors hover:bg-white hover:text-[#2F2A28] sm:w-auto">
                        <?php esc_html_e('Learn About Us', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-11 w-full items-center justify-center rounded-full px-6 py-3 text-sm font-bold text-[#F4ECE5] transition-colors hover:text-white sm:w-auto">
                        <?php esc_html_e('Customer Support', 'dawp'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Trust -->
    <section class="bg-white px-4 py-14 sm:px-6 lg:px-8 lg:py-16">
        <div class="mx-auto flex w-[min(100%,1180px)] snap-x snap-mandatory gap-4 overflow-x-auto pb-1 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden md:grid md:grid-cols-2 md:overflow-visible md:pb-0 lg:grid-cols-4" aria-label="<?php esc_attr_e('Shopping trust highlights', 'dawp'); ?>">
            <?php foreach ($trust_cards as $card) : ?>
                <div class="min-w-[82%] snap-start rounded-3xl border border-[#D8CEC6] bg-[#F8F3EC] p-6 sm:min-w-[46%] sm:p-8 md:min-h-[230px] md:min-w-0">
                    <div class="mb-5 flex h-12 w-12 items-center justify-center rounded-full bg-[#C98A8A]/14 text-[#C98A8A]">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>
                    </div>
                    <h3 class="font-serif text-xl text-[#2F2A28]"><?php echo esc_html($card['title']); ?></h3>
                    <p class="mt-4 text-sm leading-6 text-[#6F625D]"><?php echo esc_html($card['copy']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Gallery -->
    <?php if (count($gallery_tiles) >= 4) : ?>
        <section class="bg-[#F8F3EC] px-4 pb-20 pt-4 sm:px-6 lg:px-8">
            <div class="mx-auto w-[min(100%,1180px)]">
                <div class="mb-8 flex flex-col gap-3 md:flex-row md:items-end md:justify-between">
                    <div class="max-w-2xl space-y-3">
                        <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#C98A8A]"><?php esc_html_e('From The Catalog', 'dawp'); ?></span>
                        <h2 class="font-serif text-3xl leading-tight text-[#2F2A28] sm:text-4xl"><?php esc_html_e('A look at recent patches', 'dawp'); ?></h2>
                    </div>
                    <a href="<?php echo esc_url($shop_url); ?>" class="text-sm font-bold text-[#2F2A28] underline decoration-[#C98A8A] decoration-2 underline-offset-8 transition-colors hover:text-[#C98A8A]">
                        <?php esc_html_e('Shop All Patches', 'dawp'); ?>
                    </a>
                </div>
                <div class="grid grid-cols-2 gap-3 sm:grid-cols-4 sm:gap-4">
                    <?php foreach ($gallery_tiles as $tile) : ?>
                        <?php dawp_home_image_tile($tile, 'aspect-square rounded-[12px] border border-[#D8CEC6]'); ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
</main>
