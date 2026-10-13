<?php
/**
 * Homepage content — SlickTee.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$cat_url = static function ($slug) use ($shop_url) {
    return function_exists('dawp_product_category_url') ? dawp_product_category_url($slug) : $shop_url;
};

$home_img = static function ($name) {
    return get_template_directory_uri() . '/assets/images/home/' . $name . '.webp';
};

$fandoms = [
    ['title' => __('Anime', 'dawp'), 'slug' => 'anime', 'note' => __('Shōnen heroes, magical girls & cult classics', 'dawp'), 'bg' => 'bg-[#D7351E]', 'text' => 'text-[#FBF7EF]', 'mark' => '◆'],
    ['title' => __('Pokemon', 'dawp'), 'slug' => 'pokemon', 'note' => __('Pocket monsters, retro trainer vibes', 'dawp'), 'bg' => 'bg-[#F2B33D]', 'text' => 'text-[#17140F]', 'mark' => '★'],
    ['title' => __('Cartoon & Animated', 'dawp'), 'slug' => 'cartoon-animated', 'note' => __('Saturday-morning nostalgia', 'dawp'), 'bg' => 'bg-[#1F3A68]', 'text' => 'text-[#FBF7EF]', 'mark' => '✿'],
    ['title' => __('Game Art', 'dawp'), 'slug' => 'game-art', 'note' => __('Pixel legends & boss fights', 'dawp'), 'bg' => 'bg-[#17140F]', 'text' => 'text-[#FBF7EF]', 'mark' => '▲'],
    ['title' => __('Horror', 'dawp'), 'slug' => 'horror', 'note' => __('Slasher posters & midnight movies', 'dawp'), 'bg' => 'bg-[#17140F]', 'text' => 'text-[#FBF7EF]', 'mark' => '✝'],
    ['title' => __('Marvel Comics', 'dawp'), 'slug' => 'marvel-comics', 'note' => __('Comic-panel heroes & villains', 'dawp'), 'bg' => 'bg-[#D7351E]', 'text' => 'text-[#FBF7EF]', 'mark' => '✸'],
    ['title' => __('Movies', 'dawp'), 'slug' => 'movies', 'note' => __('Box-office icons, VHS-era cool', 'dawp'), 'bg' => 'bg-[#F2B33D]', 'text' => 'text-[#17140F]', 'mark' => '●'],
    ['title' => __('Best Sellers', 'dawp'), 'slug' => 'best-seller', 'note' => __('What the community is wearing', 'dawp'), 'bg' => 'bg-[#FBF7EF]', 'text' => 'text-[#17140F]', 'mark' => '♥'],
];

$product_types = [
    ['title' => __('Vintage Shirts', 'dawp'), 'slug' => 'vintage-shirts', 'img' => 'cat-shirts', 'desc' => __('Washed, oversized, bootleg-style', 'dawp')],
    ['title' => __('Vintage Hoodie', 'dawp'), 'slug' => 'vintage-hoodie', 'img' => 'cat-hoodie', 'desc' => __('Heavyweight & stonewashed', 'dawp')],
    ['title' => __('Vintage Sweatshirt', 'dawp'), 'slug' => 'vintage-sweatshirt', 'img' => 'cat-sweatshirt', 'desc' => __('Cozy crewnecks, faded prints', 'dawp')],
    ['title' => __('Vintage Tank Tops', 'dawp'), 'slug' => 'vintage-tank-top', 'img' => 'cat-tank', 'desc' => __('Gym-ready, poster-loud', 'dawp')],
    ['title' => __('Vintage Shorts', 'dawp'), 'slug' => 'vintage-shorts', 'img' => 'cat-shorts', 'desc' => __('All-over print mesh shorts', 'dawp')],
    ['title' => __('Vintage Caps', 'dawp'), 'slug' => 'vintage-caps', 'img' => 'cat-caps', 'desc' => __('Washed 6-panel caps', 'dawp')],
    ['title' => __('Shirts For Kids', 'dawp'), 'slug' => 'vintage-shirt-for-kids', 'img' => 'cat-kids', 'desc' => __('Mini sizes, same big fandom', 'dawp')],
    ['title' => __('Classic Tee', 'dawp'), 'slug' => 'classic-tee', 'img' => 'cat-classic', 'desc' => __('Clean cotton, bold artwork', 'dawp')],
];

// Live best sellers: products in the "best-seller" category, else most-sold.
$best_sellers = [];
if (function_exists('wc_get_products')) {
    $query_args = ['limit' => 8, 'status' => 'publish', 'visibility' => 'catalog'];
    $best_term  = get_term_by('slug', 'best-seller', 'product_cat');
    if ($best_term && !is_wp_error($best_term)) {
        $query_args['category'] = ['best-seller'];
        $query_args['orderby']  = 'date';
    } else {
        $query_args['orderby'] = 'popularity';
    }
    $best_sellers = wc_get_products($query_args);
}
?>

<!-- ============================================================
     HERO
     ============================================================ -->
<section class="relative overflow-hidden border-b-2 border-[#17140F] bg-[#FBF7EF]">
    <div class="pointer-events-none absolute inset-0 opacity-[0.35] [background-image:radial-gradient(#E3D7C2_1px,transparent_1px)] [background-size:14px_14px]" aria-hidden="true"></div>

    <div class="relative mx-auto grid max-w-7xl gap-12 px-4 pb-16 pt-10 sm:px-6 lg:grid-cols-[1.05fr_1fr] lg:items-center lg:gap-10 lg:px-8 lg:pb-24 lg:pt-16">
        <div>
            <span class="inline-flex -rotate-2 items-center gap-2 rounded-[4px] border-2 border-[#17140F] bg-[#F2B33D] px-3 py-1 text-xs font-extrabold uppercase tracking-[0.18em] text-[#17140F]">
                <?php esc_html_e('Fan art merch · Printed to order', 'dawp'); ?>
            </span>

            <h1 class="font-display mt-6 text-[3.4rem] uppercase leading-[0.92] text-[#17140F] sm:text-7xl lg:text-[6.5rem]">
                <?php esc_html_e('Wear the', 'dawp'); ?><br>
                <span class="relative inline-block text-[#D7351E]">
                    <?php esc_html_e('fandom.', 'dawp'); ?>
                    <svg class="absolute -bottom-2 left-0 h-3 w-full text-[#F2B33D] sm:-bottom-3 sm:h-4" viewBox="0 0 300 16" preserveAspectRatio="none" aria-hidden="true"><path d="M2 11C60 3 120 3 180 8s90 4 116-2" fill="none" stroke="currentColor" stroke-width="6" stroke-linecap="round"></path></svg>
                </span>
            </h1>

            <p class="mt-7 max-w-lg text-lg leading-relaxed text-[#4A4339]">
                <?php esc_html_e('Vintage-washed tees, hoodies, shorts and caps covered in the anime, games, cartoons and horror classics you grew up on. Every piece is printed to order — just for you.', 'dawp'); ?>
            </p>

            <div class="mt-8 flex flex-wrap items-center gap-4">
                <a href="<?php echo esc_url($cat_url('vintage-shirts')); ?>" class="inline-flex min-h-12 items-center justify-center gap-2 rounded-[8px] border-2 border-[#17140F] bg-[#D7351E] px-7 py-3 text-sm font-extrabold uppercase tracking-wide text-[#FFFFFF] shadow-[4px_4px_0_#17140F] transition hover:translate-x-[2px] hover:translate-y-[2px] hover:bg-[#B32813] hover:shadow-[2px_2px_0_#17140F]">
                    <?php esc_html_e('Shop Vintage Tees', 'dawp'); ?>
                    <span aria-hidden="true">→</span>
                </a>
                <a href="<?php echo esc_url($cat_url('new-arrivals')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-[8px] border-2 border-[#17140F] bg-[#FBF7EF] px-7 py-3 text-sm font-extrabold uppercase tracking-wide text-[#17140F] transition hover:bg-[#17140F] hover:text-[#FBF7EF]">
                    <?php esc_html_e('New Arrivals', 'dawp'); ?>
                </a>
            </div>

            <div class="mt-9">
                <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#6F665A]"><?php esc_html_e('Popular right now', 'dawp'); ?></p>
                <ul class="mt-3 flex flex-wrap gap-2">
                    <?php foreach (array_slice($fandoms, 0, 6) as $fandom) : ?>
                        <li>
                            <a href="<?php echo esc_url($cat_url($fandom['slug'])); ?>" class="inline-flex min-h-9 items-center rounded-[999px] border border-[#17140F] bg-[#FFFFFF] px-3.5 text-xs font-bold text-[#17140F] transition hover:bg-[#F2B33D]">
                                #<?php echo esc_html($fandom['title']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="relative mx-auto w-full max-w-xl">
            <div class="relative overflow-hidden rounded-[14px] border-2 border-[#17140F] bg-[#F4EDE0] shadow-[8px_8px_0_#17140F]">
                <img src="<?php echo esc_url($home_img('hero')); ?>" alt="<?php esc_attr_e('Vintage-washed graphic tees, shorts and a cap with retro anime and horror artwork', 'dawp'); ?>" width="1200" height="900" fetchpriority="high" class="block aspect-[4/3] h-auto w-full object-cover">
            </div>
            <span class="absolute -right-3 -top-5 inline-flex h-24 w-24 rotate-12 flex-col items-center justify-center rounded-full border-2 border-[#17140F] bg-[#F2B33D] text-center text-[#17140F] shadow-[3px_3px_0_#17140F] sm:-right-6 sm:h-28 sm:w-28" aria-hidden="true">
                <span class="font-display text-2xl leading-none sm:text-3xl">1-of-1</span>
                <span class="mt-1 text-[0.6rem] font-extrabold uppercase tracking-[0.14em]"><?php esc_html_e('Made for you', 'dawp'); ?></span>
            </span>
            <div class="absolute -bottom-5 left-4 flex items-center gap-3 rounded-[8px] border-2 border-[#17140F] bg-[#FBF7EF] px-4 py-2.5 shadow-[3px_3px_0_#17140F] sm:left-6">
                <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-[#1F3A68] text-[#FBF7EF]" aria-hidden="true">
                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"></circle><path d="M3 12h18"></path><path d="M12 3a14 14 0 0 1 0 18a14 14 0 0 1 0-18"></path></svg>
                </span>
                <span class="text-xs font-bold leading-tight text-[#17140F]"><?php esc_html_e('Ships worldwide', 'dawp'); ?><br><span class="font-medium text-[#6F665A]"><?php esc_html_e('Tracking on every order', 'dawp'); ?></span></span>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     FANDOM TICKER
     ============================================================ -->
<div class="fandom-ticker" aria-hidden="true">
    <div class="fandom-ticker__track">
        <?php for ($i = 0; $i < 2; $i++) : ?>
            <?php foreach (['Anime', 'Game Art', 'Horror', 'Cartoons', 'Comics', 'Movies', 'Pokemon', 'Vintage Wash'] as $word) : ?>
                <span class="fandom-ticker__item font-display"><?php echo esc_html($word); ?><span class="fandom-ticker__star">✦</span></span>
            <?php endforeach; ?>
        <?php endfor; ?>
    </div>
</div>

<!-- ============================================================
     SHOP BY PRODUCT
     ============================================================ -->
<section class="bg-[#FBF7EF] py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap items-end justify-between gap-4">
            <div>
                <span class="text-xs font-extrabold uppercase tracking-[0.2em] text-[#D7351E]"><?php esc_html_e('Shop by product', 'dawp'); ?></span>
                <h2 class="font-display mt-2 text-4xl uppercase leading-none text-[#17140F] sm:text-5xl"><?php esc_html_e('Pick your canvas', 'dawp'); ?></h2>
            </div>
            <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-11 items-center text-sm font-extrabold uppercase tracking-wide text-[#17140F] underline decoration-[#D7351E] decoration-2 underline-offset-4 hover:text-[#D7351E]"><?php esc_html_e('Shop everything →', 'dawp'); ?></a>
        </div>

        <div class="mt-10 grid grid-cols-2 gap-4 sm:gap-6 lg:grid-cols-4">
            <?php foreach ($product_types as $i => $type) : ?>
                <a href="<?php echo esc_url($cat_url($type['slug'])); ?>" class="group block overflow-hidden rounded-[14px] border-2 border-[#17140F] bg-[#FFFFFF] transition hover:-translate-x-[3px] hover:-translate-y-[3px] hover:shadow-[6px_6px_0_#17140F]">
                    <span class="block aspect-square overflow-hidden border-b-2 border-[#17140F] bg-[#F4EDE0]">
                        <img src="<?php echo esc_url($home_img($type['img'])); ?>" alt="<?php echo esc_attr($type['title']); ?>" width="700" height="700" loading="lazy" class="block h-full w-full object-cover transition duration-300 group-hover:scale-105">
                    </span>
                    <span class="flex items-center justify-between gap-2 p-3 sm:p-4">
                        <span class="min-w-0">
                            <span class="font-heading block text-[0.8rem] font-extrabold uppercase leading-tight text-[#17140F] sm:truncate sm:text-base"><?php echo esc_html($type['title']); ?></span>
                            <span class="mt-0.5 hidden truncate text-xs text-[#6F665A] sm:block"><?php echo esc_html($type['desc']); ?></span>
                        </span>
                        <span class="hidden h-8 w-8 shrink-0 items-center justify-center rounded-full border-2 border-[#17140F] text-[#17140F] transition group-hover:bg-[#D7351E] group-hover:text-[#FFFFFF] sm:inline-flex" aria-hidden="true">→</span>
                    </span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     SHOP BY FANDOM
     ============================================================ -->
<section class="border-y-2 border-[#17140F] bg-[#F4EDE0] py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl">
            <span class="text-xs font-extrabold uppercase tracking-[0.2em] text-[#D7351E]"><?php esc_html_e('Shop by fandom', 'dawp'); ?></span>
            <h2 class="font-display mt-2 text-4xl uppercase leading-none text-[#17140F] sm:text-5xl"><?php esc_html_e('Find your people', 'dawp'); ?></h2>
            <p class="mt-4 text-base leading-relaxed text-[#4A4339]"><?php esc_html_e('Thousands of designs across the worlds you love. Pick a universe and start digging.', 'dawp'); ?></p>
        </div>

        <div class="mt-10 grid grid-cols-2 gap-3 sm:gap-5 lg:grid-cols-4">
            <?php foreach ($fandoms as $fandom) : ?>
                <a href="<?php echo esc_url($cat_url($fandom['slug'])); ?>" class="group relative flex min-h-36 flex-col justify-between overflow-hidden rounded-[14px] border-2 border-[#17140F] p-4 transition hover:-translate-x-[3px] hover:-translate-y-[3px] hover:shadow-[6px_6px_0_#17140F] sm:min-h-44 sm:p-6 <?php echo esc_attr($fandom['bg'] . ' ' . $fandom['text']); ?>">
                    <span class="pointer-events-none absolute -bottom-6 -right-2 text-[7rem] leading-none opacity-15 transition group-hover:rotate-12 sm:text-[9rem]" aria-hidden="true"><?php echo esc_html($fandom['mark']); ?></span>
                    <span class="font-display relative text-2xl uppercase leading-none sm:text-4xl"><?php echo esc_html($fandom['title']); ?></span>
                    <span class="relative mt-4 flex items-end justify-between gap-2">
                        <span class="hidden text-xs font-medium leading-snug opacity-85 sm:block"><?php echo esc_html($fandom['note']); ?></span>
                        <span class="text-xs font-extrabold uppercase tracking-wide sm:hidden"><?php esc_html_e('Shop', 'dawp'); ?></span>
                        <span class="text-lg font-bold transition group-hover:translate-x-1" aria-hidden="true">→</span>
                    </span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php if (!empty($best_sellers)) : ?>
<!-- ============================================================
     BEST SELLERS (live WooCommerce products)
     ============================================================ -->
<section class="bg-[#FBF7EF] py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap items-end justify-between gap-4">
            <div>
                <span class="text-xs font-extrabold uppercase tracking-[0.2em] text-[#D7351E]"><?php esc_html_e('Trending', 'dawp'); ?></span>
                <h2 class="font-display mt-2 text-4xl uppercase leading-none text-[#17140F] sm:text-5xl"><?php esc_html_e('Best sellers this week', 'dawp'); ?></h2>
            </div>
            <a href="<?php echo esc_url($cat_url('best-seller')); ?>" class="inline-flex min-h-11 items-center text-sm font-extrabold uppercase tracking-wide text-[#17140F] underline decoration-[#D7351E] decoration-2 underline-offset-4 hover:text-[#D7351E]"><?php esc_html_e('View all trending →', 'dawp'); ?></a>
        </div>

        <ul class="mt-10 grid grid-cols-2 gap-4 sm:gap-6 lg:grid-cols-4">
            <?php foreach ($best_sellers as $product) : ?>
                <li>
                    <a href="<?php echo esc_url($product->get_permalink()); ?>" class="group block h-full overflow-hidden rounded-[14px] border-2 border-[#17140F] bg-[#FFFFFF] transition hover:-translate-x-[3px] hover:-translate-y-[3px] hover:shadow-[6px_6px_0_#17140F]">
                        <span class="relative block aspect-square overflow-hidden border-b-2 border-[#17140F] bg-[#F4EDE0] [&_img]:h-full [&_img]:w-full [&_img]:object-cover [&_img]:transition [&_img]:duration-300 group-hover:[&_img]:scale-105">
                            <?php echo $product->get_image('woocommerce_thumbnail', ['loading' => 'lazy']); ?>
                            <?php if ($product->is_on_sale()) : ?>
                                <span class="absolute left-2 top-2 rounded-[4px] border-2 border-[#17140F] bg-[#F2B33D] px-2 py-0.5 text-[0.65rem] font-extrabold uppercase tracking-wide text-[#17140F]"><?php esc_html_e('Sale', 'dawp'); ?></span>
                            <?php endif; ?>
                        </span>
                        <span class="block p-3 sm:p-4">
                            <span class="line-clamp-2 block text-sm font-bold leading-snug text-[#17140F]"><?php echo esc_html($product->get_name()); ?></span>
                            <span class="mt-2 block text-base font-extrabold text-[#D7351E] [&_del]:mr-1 [&_del]:text-sm [&_del]:font-medium [&_del]:text-[#6F665A] [&_ins]:no-underline"><?php echo wp_kses_post($product->get_price_html()); ?></span>
                        </span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
<?php endif; ?>

<!-- ============================================================
     WHY SLICKTEE
     ============================================================ -->
<section class="bg-[#17140F] py-16 text-[#FBF7EF] lg:py-24">
    <div class="mx-auto grid max-w-7xl gap-12 px-4 sm:px-6 lg:grid-cols-2 lg:items-center lg:gap-16 lg:px-8">
        <div class="relative order-2 lg:order-1">
            <img src="<?php echo esc_url($home_img('about-studio')); ?>" alt="<?php esc_attr_e('A direct-to-garment printer printing anime artwork onto a black tee in the SlickTee print studio', 'dawp'); ?>" width="1200" height="900" loading="lazy" class="block aspect-[4/3] w-full rounded-[14px] border-2 border-[#FBF7EF] object-cover">
            <span class="absolute -bottom-4 right-4 rounded-[4px] border-2 border-[#17140F] bg-[#F2B33D] px-3 py-1.5 text-xs font-extrabold uppercase tracking-wide text-[#17140F]"><?php esc_html_e('Eco-certified DTG inks', 'dawp'); ?></span>
        </div>

        <div class="order-1 lg:order-2">
            <span class="text-xs font-extrabold uppercase tracking-[0.2em] text-[#F2B33D]"><?php esc_html_e('Why you’ll love us', 'dawp'); ?></span>
            <h2 class="font-display mt-2 text-4xl uppercase leading-none sm:text-5xl"><?php esc_html_e('Made by fans, printed with care', 'dawp'); ?></h2>
            <p class="mt-5 max-w-xl text-base leading-relaxed text-[#FBF7EF]/75"><?php esc_html_e('We sweat the details: premium cotton blanks, a lived-in vintage wash and direct-to-garment prints with non-hazardous, OEKO-TEX® ECO PASSPORT certified inks. Nothing sits in a warehouse — your piece is made after you order it.', 'dawp'); ?></p>

            <ul class="mt-9 grid gap-6 sm:grid-cols-2">
                <?php
                $reasons = [
                    ['title' => __('Worldwide Shipping', 'dawp'), 'copy' => __('US delivery in 7–10 days, international in 7–15 days, with tracking.', 'dawp'), 'icon' => '<circle cx="12" cy="12" r="9"></circle><path d="M3 12h18"></path><path d="M12 3a14 14 0 0 1 0 18a14 14 0 0 1 0-18"></path>'],
                    ['title' => __('Secure Payments', 'dawp'), 'copy' => __('256-bit SSL checkout. Visa, Mastercard, Amex and PayPal.', 'dawp'), 'icon' => '<rect x="4" y="10" width="16" height="10" rx="2"></rect><path d="M8 10V7a4 4 0 0 1 8 0v3"></path>'],
                    ['title' => __('Super-easy Fixes', 'dawp'), 'copy' => __('Wrong, damaged or misprinted? Tell us within 14 days for a free replacement or refund.', 'dawp'), 'icon' => '<path d="M3 12a9 9 0 1 0 3-6.7"></path><path d="M3 4v5h5"></path>'],
                    ['title' => __('Premium Quality', 'dawp'), 'copy' => __('Soft premium cotton, finely tailored, with prints that stay bold wash after wash.', 'dawp'), 'icon' => '<path d="m12 2 2.6 6.3L21 9l-4.9 4.3L17.4 20 12 16.7 6.6 20l1.3-6.7L3 9l6.4-.7Z"></path>'],
                ];
                foreach ($reasons as $reason) :
                    ?>
                    <li class="flex gap-4">
                        <span class="inline-flex h-11 w-11 shrink-0 items-center justify-center rounded-[8px] bg-[#D7351E] text-[#FFFFFF]" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><?php echo $reason['icon']; ?></svg>
                        </span>
                        <span>
                            <span class="font-heading block text-base font-extrabold uppercase tracking-wide"><?php echo esc_html($reason['title']); ?></span>
                            <span class="mt-1 block text-sm leading-relaxed text-[#FBF7EF]/70"><?php echo esc_html($reason['copy']); ?></span>
                        </span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>

<!-- ============================================================
     HOW AN ORDER WORKS
     ============================================================ -->
<section id="how-it-works" class="bg-[#FBF7EF] py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <span class="text-xs font-extrabold uppercase tracking-[0.2em] text-[#D7351E]"><?php esc_html_e('From click to closet', 'dawp'); ?></span>
            <h2 class="font-display mt-2 text-4xl uppercase leading-none text-[#17140F] sm:text-5xl"><?php esc_html_e('How your order works', 'dawp'); ?></h2>
        </div>

        <ol class="mt-12 grid gap-6 md:grid-cols-4">
            <?php
            $steps = [
                ['title' => __('Pick your design', 'dawp'), 'copy' => __('Choose a design, then your style, color and size. Check the size guide first.', 'dawp')],
                ['title' => __('24h to change it', 'dawp'), 'copy' => __('Need a different size or address? Email us within 24 hours of ordering.', 'dawp')],
                ['title' => __('We print it', 'dawp'), 'copy' => __('Your piece is printed, cut and finished in 5–7 business days.', 'dawp')],
                ['title' => __('It ships to you', 'dawp'), 'copy' => __('US 7–10 days, international 7–15 days, with a tracking link by email.', 'dawp')],
            ];
            foreach ($steps as $i => $step) :
                ?>
                <li class="relative rounded-[14px] border-2 border-[#17140F] bg-[#FFFFFF] p-6">
                    <span class="font-display absolute -top-5 left-6 inline-flex h-10 w-10 items-center justify-center rounded-full border-2 border-[#17140F] bg-[#F2B33D] text-xl text-[#17140F]"><?php echo esc_html($i + 1); ?></span>
                    <h3 class="font-heading mt-4 text-lg font-extrabold uppercase text-[#17140F]"><?php echo esc_html($step['title']); ?></h3>
                    <p class="mt-2 text-sm leading-relaxed text-[#4A4339]"><?php echo esc_html($step['copy']); ?></p>
                </li>
            <?php endforeach; ?>
        </ol>

        <p class="mt-8 text-center text-sm text-[#6F665A]">
            <?php esc_html_e('Shipping is $5.99 for the first item + $1.99 for each additional item.', 'dawp'); ?>
            <a href="<?php echo esc_url(home_url('/shipping-returns/')); ?>" class="font-bold text-[#17140F] underline decoration-[#D7351E] decoration-2 underline-offset-4"><?php esc_html_e('Shipping details', 'dawp'); ?></a>
        </p>
    </div>
</section>

<!-- ============================================================
     REVIEWS (independent platforms) + SEARCH CTA
     ============================================================ -->
<section class="border-t-2 border-[#17140F] bg-[#D7351E] py-16 text-[#FFFFFF] lg:py-20">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:items-center lg:px-8">
        <div>
            <h2 class="font-display text-4xl uppercase leading-none sm:text-5xl"><?php esc_html_e('Can’t find your character?', 'dawp'); ?></h2>
            <p class="mt-4 max-w-lg text-base leading-relaxed text-[#FFFFFF]/85"><?php esc_html_e('Search thousands of designs by character, show, game or movie.', 'dawp'); ?></p>
            <?php if (shortcode_exists('fibosearch')) :
                // FiboSearch (same as header) — own placeholder for this field only
                $home_search_label = static function ($labels) {
                    $labels['search_placeholder'] = __('e.g. samurai, pixel, horror…', 'dawp');
                    return $labels;
                };
                add_filter('dgwt/wcas/labels', $home_search_label, 20);
                ?>
                <div class="home-search mt-6 max-w-lg">
                    <?php echo do_shortcode('[fibosearch layout="classic" style="solaris" submit_btn="1" submit_text="' . esc_attr__('Search', 'dawp') . '" mobile_overlay="0" darken_bg="0"]'); ?>
                </div>
                <?php remove_filter('dgwt/wcas/labels', $home_search_label, 20); ?>
            <?php else : ?>
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="mt-6 flex max-w-lg overflow-hidden rounded-[8px] border-2 border-[#17140F] bg-[#FFFFFF] shadow-[4px_4px_0_#17140F]">
                    <label class="sr-only" for="home-product-search"><?php esc_html_e('Search products', 'dawp'); ?></label>
                    <input id="home-product-search" type="search" name="s" placeholder="<?php esc_attr_e('e.g. samurai, pixel, horror…', 'dawp'); ?>" class="min-h-12 w-full bg-transparent px-4 text-base text-[#17140F] outline-none placeholder:text-[#6F665A]">
                    <input type="hidden" name="post_type" value="product">
                    <button type="submit" class="shrink-0 border-l-2 border-[#17140F] bg-[#F2B33D] px-5 text-sm font-extrabold uppercase tracking-wide text-[#17140F] transition hover:bg-[#17140F] hover:text-[#FBF7EF]"><?php esc_html_e('Search', 'dawp'); ?></button>
                </form>
            <?php endif; ?>
        </div>

        <div class="rounded-[14px] border-2 border-[#17140F] bg-[#FBF7EF] p-6 text-[#17140F] shadow-[6px_6px_0_#17140F] sm:p-8">
            <h3 class="font-display text-2xl uppercase sm:text-3xl"><?php esc_html_e('Read real customer reviews', 'dawp'); ?></h3>
            <p class="mt-3 text-sm leading-relaxed text-[#4A4339]"><?php esc_html_e('We don’t cherry-pick. See what customers say about SlickTee on independent review platforms.', 'dawp'); ?></p>
            <ul class="mt-6 grid gap-3 sm:grid-cols-3">
                <?php
                $review_sites = [
                    ['name' => 'Trustpilot', 'url' => 'https://www.trustpilot.com/review/slicktee.com'],
                    ['name' => 'Sitejabber', 'url' => 'https://www.sitejabber.com/reviews/slicktee.com'],
                    ['name' => 'Webwiki', 'url' => 'https://www.webwiki.com/slicktee.com'],
                ];
                foreach ($review_sites as $site) :
                    ?>
                    <li>
                        <a href="<?php echo esc_url($site['url']); ?>" target="_blank" rel="noopener nofollow" class="flex min-h-12 items-center justify-between rounded-[8px] border-2 border-[#17140F] px-4 text-sm font-extrabold transition hover:bg-[#F2B33D]">
                            <?php echo esc_html($site['name']); ?>
                            <span aria-hidden="true">↗</span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>
