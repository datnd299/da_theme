<?php
/**
 * Home page template part.
 *
 * @package dawp
 */

$theme_uri = get_template_directory_uri();

$asset = static function ($path) use ($theme_uri) {
    return $theme_uri . '/assets/img/' . ltrim($path, '/');
};

$support_email = 'support@gudwear.com';
$support_link_on_dark = '<a class="font-semibold text-white underline decoration-[#6F7F58] underline-offset-4" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>';
$link_support_email_on_dark = static function ($text) use ($support_email, $support_link_on_dark) {
    return str_replace(esc_html($support_email), $support_link_on_dark, esc_html($text));
};

$category_url = static function ($slug) {
    if (function_exists('dawp_product_category_url')) {
        return dawp_product_category_url($slug);
    }

    if (function_exists('get_term_by')) {
        $term = get_term_by('slug', $slug, 'product_cat');
        if ($term && !is_wp_error($term)) {
            $link = get_term_link($term);
            if (!is_wp_error($link)) {
                return $link;
            }
        }
    }

    return home_url('/product-category/' . trim($slug, '/') . '/');
};

$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');

$style_cards = [
    [
        'title' => __('Mens edit', 'dawp'),
        'copy'  => __('Graphic tees, hoodies, and relaxed staples for everyday menswear rotation.', 'dawp'),
        'image' => $asset('gallery/Gudwear/Menswear_graphic_tees_hoodies_staples_202607271342.jpeg'),
        'url'   => $category_url('mens-edit'),
    ],
    [
        'title' => __('Women Collection', 'dawp'),
        'copy'  => __('Easy tees, casual layers, and street-ready fits curated for women.', 'dawp'),
        'image' => $asset('gallery/Gudwear/Women_Collection_Easy_Tees_202607271343.jpeg'),
        'url'   => $category_url('women-collection'),
    ],
    [
        'title' => __('Personalize apparel', 'dawp'),
        'copy'  => __('Custom-friendly pieces made for personal graphics, names, and daily wear.', 'dawp'),
        'image' => $asset('gallery/Gudwear/Personalize_apparel_custom_pieces_202607271351.jpeg'),
        'url'   => $category_url('personalize-apparel'),
    ],
];

$trust_cards = [
    ['title' => __('Comfortable Daily Fits', 'dawp'), 'copy' => __('Relaxed tees, hoodies, and casual layers designed for real movement and repeat wear.', 'dawp')],
    ['title' => __('Original Graphic Direction', 'dawp'), 'copy' => __('Clean prints, wearable artwork, and custom-ready ideas with everyday personality.', 'dawp')],
    ['title' => __('Easy Repeat Styling', 'dawp'), 'copy' => __('Pieces that work with denim, joggers, shorts, and the outfits already in rotation.', 'dawp')],
    ['title' => __('Clear Product Information', 'dawp'), 'copy' => __('Helpful product details make it easier to choose the right style.', 'dawp')],
    ['title' => __('Secure Checkout', 'dawp'), 'copy' => __('Shop with a simple and secure checkout experience.', 'dawp')],
    ['title' => __('30-Day Returns', 'dawp'), 'copy' => __('Eligible unworn items may be returned within 30 days of delivery.', 'dawp')],
];

$new_arrivals = [];
if (class_exists('WooCommerce')) {
    $products = wc_get_products([
        'status'  => 'publish',
        'limit'   => 4,
        'orderby' => 'date',
        'order'   => 'DESC',
        'return'  => 'objects',
    ]);

    if (!empty($products)) {
        $new_arrivals = $products;
    }
}
?>

<div class="bg-white text-[#263029]">
    <section class="overflow-hidden bg-[#FBF7EF]">
        <div class="mx-auto grid max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[0.92fr_1.08fr] lg:px-8 lg:py-24">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#6F7F58]"><?php esc_html_e('Gudwear Everyday Apparel', 'dawp'); ?></p>
                <h1 class="mt-5 max-w-3xl font-heading text-5xl font-bold leading-[1.05] text-[#24312B] sm:text-6xl lg:text-7xl">
                    <?php esc_html_e('Graphic Apparel For Every Daily Rotation', 'dawp'); ?>
                </h1>
                <p class="mt-6 max-w-xl text-lg leading-8 text-[#687268]">
                    <?php esc_html_e('Mens edits, women collections, personalized apparel, and easy casual pieces made for comfort, confidence, and everyday self-expression.', 'dawp'); ?>
                </p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url($category_url('mens-edit')); ?>" class="home-cta-primary inline-flex min-h-12 items-center justify-center rounded-full bg-[#6F7F58] px-7 text-sm font-bold text-white shadow-lg shadow-[#24312B]/10 transition hover:bg-[#24312B]">
                        <?php esc_html_e('Shop Mens edit', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url($category_url('women-collection')); ?>" class="home-cta-secondary inline-flex min-h-12 items-center justify-center rounded-full border border-[#6F7F58] bg-white px-7 text-sm font-bold text-[#24312B] transition hover:bg-[#E9E1D3]">
                        <?php esc_html_e('Explore Women Collection', 'dawp'); ?>
                    </a>
                </div>
                <div class="mt-8 grid gap-3 text-center text-sm font-semibold leading-5 text-[#24312B] sm:grid-cols-3">
                    <span class="flex min-h-16 items-center justify-center rounded-full border border-[#D8D0C2] bg-white px-5 py-3"><?php esc_html_e('Custom-ready apparel', 'dawp'); ?></span>
                    <span class="flex min-h-16 items-center justify-center rounded-full border border-[#D8D0C2] bg-white px-5 py-3"><?php esc_html_e('30-day returns', 'dawp'); ?></span>
                    <span class="flex min-h-16 items-center justify-center rounded-full border border-[#D8D0C2] bg-white px-5 py-3"><?php esc_html_e('Tracking included', 'dawp'); ?></span>
                </div>
            </div>
            <div class="relative">
                <div class="overflow-hidden rounded-[1.5rem] border border-[#D8D0C2] bg-white shadow-2xl shadow-[#24312B]/10">
                    <img src="<?php echo esc_url($asset('gallery/Gudwear/Graphic_apparel_for_daily_rotation_202607271339.jpeg')); ?>" alt="<?php esc_attr_e('Gudwear casual graphic apparel collection', 'dawp'); ?>" class="aspect-[4/5] h-full w-full object-cover lg:aspect-[5/4]">
                </div>
                <div class="absolute bottom-4 left-4 w-[min(100%-32px,640px)] rounded-xl border border-white/70 bg-white/95 p-5 shadow-xl">
                    <p class="text-sm font-bold text-[#24312B]"><?php esc_html_e('Comfort-first graphic apparel', 'dawp'); ?></p>
                    <p class="mt-2 text-sm leading-6 text-[#687268]"><?php esc_html_e('Relaxed fits, wearable prints, and personalized pieces for daily plans, weekends, and casual street style.', 'dawp'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#6F7F58]"><?php esc_html_e('Shop By Style', 'dawp'); ?></p>
                <h2 class="mt-3 font-heading text-4xl font-bold leading-tight text-[#24312B]"><?php esc_html_e('Shop the new category lineup.', 'dawp'); ?></h2>
            </div>
            <div class="home-category-slider mt-10 gap-5 md:grid md:grid-cols-2 lg:grid-cols-3" aria-label="<?php esc_attr_e('Shop by style categories', 'dawp'); ?>">
                <?php foreach ($style_cards as $card) : ?>
                    <a href="<?php echo esc_url($card['url']); ?>" class="home-category-slide group overflow-hidden rounded-xl border border-[#D8D0C2] bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-[#24312B]/10">
                        <img src="<?php echo esc_url($card['image']); ?>" alt="<?php echo esc_attr($card['title']); ?>" class="aspect-[4/5] w-full object-cover transition duration-300 group-hover:scale-[1.03]">
                        <span class="block p-5">
                            <span class="block text-lg font-bold text-[#24312B]"><?php echo esc_html($card['title']); ?></span>
                            <span class="mt-2 block text-sm leading-6 text-[#687268]"><?php echo esc_html($card['copy']); ?></span>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
            <div class="home-category-slider-controls mt-4" aria-label="<?php esc_attr_e('Shop by style slider controls', 'dawp'); ?>">
                <button class="home-category-slider-button home-category-slider-prev" type="button" aria-label="<?php esc_attr_e('Previous category', 'dawp'); ?>">
                    <span aria-hidden="true">&lsaquo;</span>
                </button>
                <div class="home-category-slider-dots" aria-hidden="true"></div>
                <button class="home-category-slider-button home-category-slider-next" type="button" aria-label="<?php esc_attr_e('Next category', 'dawp'); ?>">
                    <span aria-hidden="true">&rsaquo;</span>
                </button>
            </div>
        </div>
    </section>

    <section class="bg-[#DDE8EA] py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:items-center lg:px-8 lg:[&>*:first-child]:order-2">
            <img src="<?php echo esc_url($asset('gallery/Gudwear/Women_Collection_confident_casual_202607271349.jpeg')); ?>" alt="<?php esc_attr_e('Women collection essentials from Gudwear', 'dawp'); ?>" class="aspect-[4/3] w-full rounded-[1.5rem] object-cover">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#6F7F58]"><?php esc_html_e('Women Collection', 'dawp'); ?></p>
                <h2 class="mt-3 font-heading text-4xl font-bold leading-tight text-[#24312B]"><?php esc_html_e('Easy essentials with a confident casual feel.', 'dawp'); ?></h2>
                <p class="mt-5 text-base leading-8 text-[#687268]"><?php esc_html_e('The women collection brings together wearable tees, relaxed layers, and comfortable shapes that fit daily routines without feeling plain.', 'dawp'); ?></p>
                <a href="<?php echo esc_url($category_url('women-collection')); ?>" class="home-cta-primary mt-7 inline-flex min-h-12 items-center justify-center rounded-full bg-[#24312B] px-7 text-sm font-bold text-white transition hover:bg-[#6F7F58]"><?php esc_html_e('Explore Women Collection', 'dawp'); ?></a>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:items-center lg:px-8">
            <img src="<?php echo esc_url($asset('gallery/Gudwear/Personalize_apparel_custom_graphics_202607271347.jpeg')); ?>" alt="<?php esc_attr_e('Personalized graphic apparel direction from Gudwear', 'dawp'); ?>" class="aspect-[4/3] w-full rounded-[1.5rem] object-cover">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#6F7F58]"><?php esc_html_e('Personalize apparel', 'dawp'); ?></p>
                <h2 class="mt-3 font-heading text-4xl font-bold leading-tight text-[#24312B]"><?php esc_html_e('Custom-ready pieces with personal character.', 'dawp'); ?></h2>
                <p class="mt-5 text-base leading-8 text-[#687268]"><?php esc_html_e('Personalize apparel is built for individual graphics, names, ideas, and statement details while keeping the base pieces comfortable enough for everyday outfits.', 'dawp'); ?></p>
                <a href="<?php echo esc_url($category_url('personalize-apparel')); ?>" class="home-cta-primary mt-7 inline-flex min-h-12 items-center justify-center rounded-full bg-[#6F7F58] px-7 text-sm font-bold text-white transition hover:bg-[#24312B]"><?php esc_html_e('Shop Personalize apparel', 'dawp'); ?></a>
            </div>
        </div>
    </section>

    <section class="bg-[#E9E1D3] py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:items-center lg:px-8 lg:[&>*:first-child]:order-2">
            <img src="<?php echo esc_url($asset('gallery/Gudwear/Casual_fashion_for_self-expression_202607271351.jpeg')); ?>" alt="<?php esc_attr_e('Mens edit everyday street style from Gudwear', 'dawp'); ?>" class="aspect-[4/3] w-full rounded-[1.5rem] object-cover">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#6F7F58]"><?php esc_html_e('Mens edit', 'dawp'); ?></p>
                <h2 class="mt-3 font-heading text-4xl font-bold leading-tight text-[#24312B]"><?php esc_html_e('Relaxed staples for everyday street style.', 'dawp'); ?></h2>
                <p class="mt-5 text-base leading-8 text-[#687268]"><?php esc_html_e('The mens edit keeps daily outfits easy with graphic tees, relaxed fits, and casual layers that work for errands, weekends, travel, and off-duty plans.', 'dawp'); ?></p>
                <div class="mt-6 flex flex-wrap gap-3 text-sm font-semibold text-[#24312B]">
                    <span class="rounded-full bg-white px-4 py-2"><?php esc_html_e('Graphic', 'dawp'); ?></span>
                    <span class="rounded-full bg-white px-4 py-2"><?php esc_html_e('Relaxed', 'dawp'); ?></span>
                    <span class="rounded-full bg-white px-4 py-2"><?php esc_html_e('Street-ready', 'dawp'); ?></span>
                    <span class="rounded-full bg-white px-4 py-2"><?php esc_html_e('Wearable', 'dawp'); ?></span>
                </div>
                <a href="<?php echo esc_url($category_url('mens-edit')); ?>" class="home-cta-primary mt-7 inline-flex min-h-12 items-center justify-center rounded-full bg-[#6F7F58] px-7 text-sm font-bold text-white transition hover:bg-[#24312B]"><?php esc_html_e('Shop Mens edit', 'dawp'); ?></a>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-3xl">
                    <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#6F7F58]"><?php esc_html_e('New Arrivals', 'dawp'); ?></p>
                    <h2 class="mt-3 font-heading text-4xl font-bold leading-tight text-[#24312B]"><?php esc_html_e('Fresh pieces for everyday graphic style.', 'dawp'); ?></h2>
                    <p class="mt-4 text-base leading-7 text-[#687268]"><?php esc_html_e('Discover mens edits, women collections, personalized apparel, and easy seasonal styles added to the Gudwear collection.', 'dawp'); ?></p>
                </div>
                <a href="<?php echo esc_url($shop_url); ?>" class="home-cta-secondary inline-flex min-h-11 items-center justify-center rounded-full border border-[#6F7F58] px-6 text-sm font-bold text-[#24312B] transition hover:bg-[#E9E1D3]"><?php esc_html_e('View All Styles', 'dawp'); ?></a>
            </div>

            <?php if (!empty($new_arrivals)) : ?>
                <div class="mt-10 grid grid-cols-2 gap-4 lg:grid-cols-4 lg:gap-6">
                    <?php foreach ($new_arrivals as $product) : ?>
                        <a href="<?php echo esc_url($product->get_permalink()); ?>" class="group overflow-hidden rounded-xl border border-[#D8D0C2] bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-[#24312B]/10">
                            <?php echo wp_kses_post($product->get_image('woocommerce_thumbnail', ['class' => 'aspect-[4/5] w-full object-cover transition duration-300 group-hover:scale-[1.03]'])); ?>
                            <span class="block p-4">
                                <span class="block text-sm font-bold leading-6 text-[#24312B]"><?php echo esc_html($product->get_name()); ?></span>
                                <span class="mt-2 block text-sm font-semibold text-[#687268]"><?php echo wp_kses_post($product->get_price_html()); ?></span>
                            </span>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <div class="mt-10 rounded-xl border border-[#D8D0C2] bg-[#FBF7EF] p-7">
                    <p class="text-base font-semibold text-[#24312B]"><?php esc_html_e('New product listings will appear here as the collection is updated.', 'dawp'); ?></p>
                    <p class="mt-2 text-sm leading-6 text-[#687268]"><?php esc_html_e('Until then, browse the main Gudwear categories for mens edits, women collections, personalized apparel, and seasonal pieces.', 'dawp'); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="bg-[#E9E1D3] py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#6F7F58]"><?php esc_html_e('Why Choose Gudwear', 'dawp'); ?></p>
                <h2 class="mt-3 font-heading text-4xl font-bold leading-tight text-[#24312B]"><?php esc_html_e('Comfort, clear product details, and wearable graphic style.', 'dawp'); ?></h2>
            </div>
            <div class="home-trust-slider mt-10 gap-5 md:grid md:grid-cols-2 lg:grid-cols-3" aria-label="<?php esc_attr_e('Why choose Gudwear benefits', 'dawp'); ?>">
                <?php foreach ($trust_cards as $card) : ?>
                    <div class="home-trust-slide rounded-xl border border-[#D8D0C2] bg-white p-6 shadow-sm">
                        <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-[#FBF7EF] text-[#6F7F58]" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 6 9 17l-5-5"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-[#24312B]"><?php echo esc_html($card['title']); ?></h3>
                        <p class="mt-2 text-sm leading-6 text-[#687268]"><?php echo esc_html($card['copy']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="home-trust-slider-controls mt-4" aria-label="<?php esc_attr_e('Why choose Gudwear slider controls', 'dawp'); ?>">
                <button class="home-trust-slider-button home-trust-slider-prev" type="button" aria-label="<?php esc_attr_e('Previous benefit', 'dawp'); ?>">
                    <span aria-hidden="true">&lsaquo;</span>
                </button>
                <div class="home-trust-slider-dots" aria-hidden="true"></div>
                <button class="home-trust-slider-button home-trust-slider-next" type="button" aria-label="<?php esc_attr_e('Next benefit', 'dawp'); ?>">
                    <span aria-hidden="true">&rsaquo;</span>
                </button>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-[1.5rem] bg-[#24312B] p-6 text-white sm:p-8 lg:p-10">
                <div class="grid gap-8 lg:grid-cols-[0.82fr_1.18fr] lg:items-center">
                    <div>
                        <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#DDE8EA]"><?php esc_html_e('Customer Care', 'dawp'); ?></p>
                        <h2 class="mt-3 font-heading text-4xl font-bold leading-tight"><?php esc_html_e('Clear support from order to delivery.', 'dawp'); ?></h2>
                        <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>" class="home-cta-secondary mt-7 inline-flex min-h-12 items-center justify-center rounded-full bg-white px-7 text-sm font-bold text-[#24312B] transition hover:bg-[#E9E1D3]"><?php esc_html_e('View Shipping Policy', 'dawp'); ?></a>
                    </div>
                    <div class="home-care-slider gap-4 md:grid md:grid-cols-3" aria-label="<?php esc_attr_e('Customer care information', 'dawp'); ?>">
                        <div class="home-care-slide rounded-2xl border border-white/15 bg-white/10 p-5">
                            <h3 class="font-bold"><?php esc_html_e('Shipping', 'dawp'); ?></h3>
                            <p class="mt-2 text-sm leading-6 text-white/80"><?php esc_html_e('Orders are processed within 2-4 business days. Standard US shipping typically takes 5-10 business days after dispatch.', 'dawp'); ?></p>
                        </div>
                        <div class="home-care-slide rounded-2xl border border-white/15 bg-white/10 p-5">
                            <h3 class="font-bold"><?php esc_html_e('Returns', 'dawp'); ?></h3>
                            <p class="mt-2 text-sm leading-6 text-white/80"><?php esc_html_e('Customers may request returns within 30 days of delivery for eligible unworn and unwashed items in original condition.', 'dawp'); ?></p>
                        </div>
                        <div class="home-care-slide rounded-2xl border border-white/15 bg-white/10 p-5">
                            <h3 class="font-bold"><?php esc_html_e('Support', 'dawp'); ?></h3>
                            <p class="mt-2 text-sm leading-6 text-white/80"><?php echo wp_kses_post($link_support_email_on_dark(__('Need help with sizing, orders, or product questions? Contact support@gudwear.com. Business hours: Monday-Friday, 9:00 AM-5:00 PM.', 'dawp'))); ?></p>
                        </div>
                    </div>
                    <div class="home-care-slider-controls mt-4" aria-label="<?php esc_attr_e('Customer care slider controls', 'dawp'); ?>">
                        <button class="home-care-slider-button home-care-slider-prev" type="button" aria-label="<?php esc_attr_e('Previous customer care item', 'dawp'); ?>">
                            <span aria-hidden="true">&lsaquo;</span>
                        </button>
                        <div class="home-care-slider-dots" aria-hidden="true"></div>
                        <button class="home-care-slider-button home-care-slider-next" type="button" aria-label="<?php esc_attr_e('Next customer care item', 'dawp'); ?>">
                            <span aria-hidden="true">&rsaquo;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#FBF7EF] py-16 lg:py-20">
        <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[1fr_0.85fr] lg:items-center lg:px-8">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#6F7F58]"><?php esc_html_e('Stay Updated', 'dawp'); ?></p>
                <h2 class="mt-3 font-heading text-4xl font-bold leading-tight text-[#24312B]"><?php esc_html_e('New drops, straight to your inbox.', 'dawp'); ?></h2>
                <p class="mt-4 max-w-2xl text-base leading-7 text-[#687268]"><?php esc_html_e('Join the Gudwear list for new arrivals, seasonal favorites, personalized apparel ideas, and everyday outfit inspiration.', 'dawp'); ?></p>
            </div>
            <form class="rounded-xl border border-[#D8D0C2] bg-white p-4 shadow-sm" action="#" method="post">
                <label for="gudwear-newsletter-email" class="sr-only"><?php esc_html_e('Email address', 'dawp'); ?></label>
                <div class="flex flex-col gap-3 sm:flex-row">
                    <input id="gudwear-newsletter-email" type="email" name="email" placeholder="<?php esc_attr_e('Email address', 'dawp'); ?>" class="min-h-12 flex-1 rounded-full border border-[#D8D0C2] px-5 text-sm outline-none focus:border-[#6F7F58]">
                    <button type="submit" class="home-cta-primary inline-flex min-h-12 items-center justify-center rounded-full bg-[#6F7F58] px-7 text-sm font-bold text-white transition hover:bg-[#24312B]">
                        <?php esc_html_e('Subscribe', 'dawp'); ?>
                    </button>
                </div>
            </form>
        </div>
    </section>
</div>
