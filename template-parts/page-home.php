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

$support_email = 'support@vivisshop.com';
$support_link_on_dark = '<a class="font-semibold text-white underline decoration-[#B89B83] underline-offset-4" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>';
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
        'title' => __('Relaxed Tops', 'dawp'),
        'copy'  => __('Easy tops made for comfort, errands, weekends, and everyday wear.', 'dawp'),
        'image' => $asset('gallery/vivisshop/Relaxed_Tops.png'),
        'url'   => $category_url('relaxed-tops'),
    ],
    [
        'title' => __('Soft Tunics', 'dawp'),
        'copy'  => __('Longer relaxed silhouettes with a flattering, comfortable feel.', 'dawp'),
        'image' => $asset('gallery/vivisshop/Soft_Tunics.png'),
        'url'   => $category_url('soft-tunics'),
    ],
    [
        'title' => __('Gentle Blouses', 'dawp'),
        'copy'  => __('Light feminine shirts and blouses for polished casual days.', 'dawp'),
        'image' => $asset('gallery/vivisshop/Gentle_Blouses.png'),
        'url'   => $category_url('gentle-blouses'),
    ],
];

$trust_cards = [
    ['title' => __('Soft Comfortable Fits', 'dawp'), 'copy' => __('Relaxed silhouettes designed for real daily movement and comfort.', 'dawp')],
    ['title' => __('Gentle Feminine Details', 'dawp'), 'copy' => __('Soft colors, light prints, and simple details that feel naturally pretty.', 'dawp')],
    ['title' => __('Easy Everyday Styling', 'dawp'), 'copy' => __('Pieces you can wear at home, out for errands, or on casual weekends.', 'dawp')],
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

<div class="bg-white text-[#2F2925]">
    <section class="overflow-hidden bg-[#FFF8EF]">
        <div class="mx-auto grid max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[0.92fr_1.08fr] lg:px-8 lg:py-24">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#8C6D58]"><?php esc_html_e('Soft Women\'s Everyday Fashion', 'dawp'); ?></p>
                <h1 class="mt-5 max-w-3xl font-heading text-5xl font-bold leading-[1.05] text-[#4B3528] sm:text-6xl lg:text-7xl">
                    <?php esc_html_e('Soft Everyday Styles For Women', 'dawp'); ?>
                </h1>
                <p class="mt-6 max-w-xl text-lg leading-8 text-[#756A62]">
                    <?php esc_html_e('Relaxed tops, tunics, blouses, and easy wardrobe pieces made for comfort, quiet beauty, and real daily life.', 'dawp'); ?>
                </p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url($category_url('relaxed-tops')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#B89B83] px-7 text-sm font-bold text-white shadow-lg shadow-[#4B3528]/10 transition hover:bg-[#4B3528]">
                        <?php esc_html_e('Shop Relaxed Tops', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url($category_url('soft-tunics')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#B89B83] bg-white px-7 text-sm font-bold text-[#4B3528] transition hover:bg-[#F3E7DA]">
                        <?php esc_html_e('Explore Soft Tunics', 'dawp'); ?>
                    </a>
                </div>
                <div class="mt-8 grid gap-3 text-center text-sm font-semibold leading-5 text-[#4B3528] sm:grid-cols-3">
                    <span class="flex min-h-16 items-center justify-center rounded-full border border-[#E7D8C8] bg-white px-5 py-3"><?php esc_html_e('Women\'s casual fashion', 'dawp'); ?></span>
                    <span class="flex min-h-16 items-center justify-center rounded-full border border-[#E7D8C8] bg-white px-5 py-3"><?php esc_html_e('30-day returns', 'dawp'); ?></span>
                    <span class="flex min-h-16 items-center justify-center rounded-full border border-[#E7D8C8] bg-white px-5 py-3"><?php esc_html_e('Tracking included', 'dawp'); ?></span>
                </div>
            </div>
            <div class="relative">
                <div class="overflow-hidden rounded-[2rem] border border-[#E7D8C8] bg-white shadow-2xl shadow-[#4B3528]/10">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/vivisshop/Soft_Women\'s_Everyday_Fashion.png'); ?>" alt="<?php esc_attr_e('Woman wearing a relaxed soft everyday top', 'dawp'); ?>" class="aspect-[4/5] h-full w-full object-cover lg:aspect-[5/4]">
                </div>
                <div class="absolute bottom-4 left-4 w-[min(100%-32px,640px)] rounded-[1.35rem] border border-white/70 bg-white/95 p-5 shadow-xl">
                    <p class="text-sm font-bold text-[#4B3528]"><?php esc_html_e('Comfort-first wardrobe pieces', 'dawp'); ?></p>
                    <p class="mt-2 text-sm leading-6 text-[#756A62]"><?php esc_html_e('Soft colors, relaxed fits, and wearable details for home, errands, weekends, and casual plans.', 'dawp'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#8C6D58]"><?php esc_html_e('Shop By Style', 'dawp'); ?></p>
                <h2 class="mt-3 font-heading text-4xl font-bold leading-tight text-[#4B3528]"><?php esc_html_e('Find the fit that feels easy.', 'dawp'); ?></h2>
            </div>
            <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                <?php foreach ($style_cards as $card) : ?>
                    <a href="<?php echo esc_url($card['url']); ?>" class="group overflow-hidden rounded-2xl border border-[#E7D8C8] bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-[#4B3528]/10">
                        <img src="<?php echo esc_url($card['image']); ?>" alt="<?php echo esc_attr($card['title']); ?>" class="aspect-[4/5] w-full object-cover transition duration-300 group-hover:scale-[1.03]">
                        <span class="block p-5">
                            <span class="block text-lg font-bold text-[#4B3528]"><?php echo esc_html($card['title']); ?></span>
                            <span class="mt-2 block text-sm leading-6 text-[#756A62]"><?php echo esc_html($card['copy']); ?></span>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-[#FFF8EF] py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:items-center lg:px-8 lg:[&>*:first-child]:order-2">
            <img src="<?php echo esc_url($asset('gallery/vivisshop/Tunic_Tops_Relaxed.png')); ?>" alt="<?php esc_attr_e('Woman wearing a relaxed tunic top', 'dawp'); ?>" class="aspect-[4/3] w-full rounded-[2rem] object-cover">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#8C6D58]"><?php esc_html_e('Soft Tunics', 'dawp'); ?></p>
                <h2 class="mt-3 font-heading text-4xl font-bold leading-tight text-[#4B3528]"><?php esc_html_e('Relaxed silhouettes with a flattering feel.', 'dawp'); ?></h2>
                <p class="mt-5 text-base leading-8 text-[#756A62]"><?php esc_html_e('Tunic tops bring ease to everyday dressing. Longer lengths, soft drape, and comfortable shapes make them simple to style for home, errands, weekends, and casual gatherings.', 'dawp'); ?></p>
                <a href="<?php echo esc_url($category_url('soft-tunics')); ?>" class="mt-7 inline-flex min-h-12 items-center justify-center rounded-full bg-[#4B3528] px-7 text-sm font-bold text-white transition hover:bg-[#B89B83]"><?php esc_html_e('Explore Soft Tunics', 'dawp'); ?></a>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:items-center lg:px-8">
            <img src="<?php echo esc_url($asset('gallery/vivisshop/Soft_Graphic_Tops.png')); ?>" alt="<?php esc_attr_e('Soft graphic top with gentle artwork', 'dawp'); ?>" class="aspect-[4/3] w-full rounded-[2rem] object-cover">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#8C6D58]"><?php esc_html_e('Soft Graphic Tops', 'dawp'); ?></p>
                <h2 class="mt-3 font-heading text-4xl font-bold leading-tight text-[#4B3528]"><?php esc_html_e('Gentle prints with a quiet kind of charm.', 'dawp'); ?></h2>
                <p class="mt-5 text-base leading-8 text-[#756A62]"><?php esc_html_e('For women who like a little artwork without a loud statement, our soft graphic tops bring nature-inspired details, delicate motifs, and relaxed comfort into everyday outfits.', 'dawp'); ?></p>
                <a href="<?php echo esc_url($category_url('relaxed-tops')); ?>" class="mt-7 inline-flex min-h-12 items-center justify-center rounded-full bg-[#B89B83] px-7 text-sm font-bold text-white transition hover:bg-[#4B3528]"><?php esc_html_e('Shop Relaxed Tops', 'dawp'); ?></a>
            </div>
        </div>
    </section>

    <section class="bg-[#F3E7DA] py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:items-center lg:px-8 lg:[&>*:first-child]:order-2">
            <img src="<?php echo esc_url($asset('gallery/vivisshop/Blouse_Shirts_Simple.png')); ?>" alt="<?php esc_attr_e('Light blouse styled for a casual polished day', 'dawp'); ?>" class="aspect-[4/3] w-full rounded-[2rem] object-cover">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#8C6D58]"><?php esc_html_e('Gentle Blouses', 'dawp'); ?></p>
                <h2 class="mt-3 font-heading text-4xl font-bold leading-tight text-[#4B3528]"><?php esc_html_e('Simple polish for everyday plans.', 'dawp'); ?></h2>
                <p class="mt-5 text-base leading-8 text-[#756A62]"><?php esc_html_e('Light blouses and easy shirts help you feel comfortable while looking gently put together. Perfect for casual workdays, lunches, errands, or relaxed time with family and friends.', 'dawp'); ?></p>
                <div class="mt-6 flex flex-wrap gap-3 text-sm font-semibold text-[#4B3528]">
                    <span class="rounded-full bg-white px-4 py-2"><?php esc_html_e('Light', 'dawp'); ?></span>
                    <span class="rounded-full bg-white px-4 py-2"><?php esc_html_e('Easy', 'dawp'); ?></span>
                    <span class="rounded-full bg-white px-4 py-2"><?php esc_html_e('Feminine', 'dawp'); ?></span>
                    <span class="rounded-full bg-white px-4 py-2"><?php esc_html_e('Wearable', 'dawp'); ?></span>
                </div>
                <a href="<?php echo esc_url($category_url('gentle-blouses')); ?>" class="mt-7 inline-flex min-h-12 items-center justify-center rounded-full bg-[#B89B83] px-7 text-sm font-bold text-white transition hover:bg-[#4B3528]"><?php esc_html_e('Shop Gentle Blouses', 'dawp'); ?></a>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-3xl">
                    <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#8C6D58]"><?php esc_html_e('New Arrivals', 'dawp'); ?></p>
                    <h2 class="mt-3 font-heading text-4xl font-bold leading-tight text-[#4B3528]"><?php esc_html_e('Fresh pieces for softer everyday dressing.', 'dawp'); ?></h2>
                    <p class="mt-4 text-base leading-7 text-[#756A62]"><?php esc_html_e('Discover relaxed tops, gentle blouses, soft graphic pieces, and easy seasonal styles added to the Vivisshop collection.', 'dawp'); ?></p>
                </div>
                <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-11 items-center justify-center rounded-full border border-[#B89B83] px-6 text-sm font-bold text-[#4B3528] transition hover:bg-[#F3E7DA]"><?php esc_html_e('View All Styles', 'dawp'); ?></a>
            </div>

            <?php if (!empty($new_arrivals)) : ?>
                <div class="mt-10 grid grid-cols-2 gap-4 lg:grid-cols-4 lg:gap-6">
                    <?php foreach ($new_arrivals as $product) : ?>
                        <a href="<?php echo esc_url($product->get_permalink()); ?>" class="group overflow-hidden rounded-2xl border border-[#E7D8C8] bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-[#4B3528]/10">
                            <?php echo wp_kses_post($product->get_image('woocommerce_thumbnail', ['class' => 'aspect-[4/5] w-full object-cover transition duration-300 group-hover:scale-[1.03]'])); ?>
                            <span class="block p-4">
                                <span class="block text-sm font-bold leading-6 text-[#4B3528]"><?php echo esc_html($product->get_name()); ?></span>
                                <span class="mt-2 block text-sm font-semibold text-[#756A62]"><?php echo wp_kses_post($product->get_price_html()); ?></span>
                            </span>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <div class="mt-10 rounded-2xl border border-[#E7D8C8] bg-[#FFF8EF] p-7">
                    <p class="text-base font-semibold text-[#4B3528]"><?php esc_html_e('New product listings will appear here as the collection is updated.', 'dawp'); ?></p>
                    <p class="mt-2 text-sm leading-6 text-[#756A62]"><?php esc_html_e('Until then, browse the main Vivisshop categories for relaxed tops, tunics, blouses, and seasonal pieces.', 'dawp'); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="bg-[#F3E7DA] py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#8C6D58]"><?php esc_html_e('Why Women Love Vivisshop', 'dawp'); ?></p>
                <h2 class="mt-3 font-heading text-4xl font-bold leading-tight text-[#4B3528]"><?php esc_html_e('Comfort, clarity, and simple everyday style.', 'dawp'); ?></h2>
            </div>
            <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                <?php foreach ($trust_cards as $card) : ?>
                    <div class="rounded-2xl border border-[#E7D8C8] bg-white p-6 shadow-sm">
                        <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-[#FFF8EF] text-[#4B3528]" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 6 9 17l-5-5"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-[#4B3528]"><?php echo esc_html($card['title']); ?></h3>
                        <p class="mt-2 text-sm leading-6 text-[#756A62]"><?php echo esc_html($card['copy']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-[2rem] bg-[#4B3528] p-6 text-white sm:p-8 lg:p-10">
                <div class="grid gap-8 lg:grid-cols-[0.82fr_1.18fr] lg:items-center">
                    <div>
                        <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#F3E7DA]"><?php esc_html_e('Customer Care', 'dawp'); ?></p>
                        <h2 class="mt-3 font-heading text-4xl font-bold leading-tight"><?php esc_html_e('Clear support from order to delivery.', 'dawp'); ?></h2>
                        <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>" class="mt-7 inline-flex min-h-12 items-center justify-center rounded-full bg-white px-7 text-sm font-bold text-[#4B3528] transition hover:bg-[#F3E7DA]"><?php esc_html_e('View Shipping Policy', 'dawp'); ?></a>
                    </div>
                    <div class="grid gap-4 md:grid-cols-3">
                        <div class="rounded-2xl border border-white/15 bg-white/10 p-5">
                            <h3 class="font-bold"><?php esc_html_e('Shipping', 'dawp'); ?></h3>
                            <p class="mt-2 text-sm leading-6 text-white/80"><?php esc_html_e('Orders are processed within 2-4 business days. Standard US shipping typically takes 5-10 business days after dispatch.', 'dawp'); ?></p>
                        </div>
                        <div class="rounded-2xl border border-white/15 bg-white/10 p-5">
                            <h3 class="font-bold"><?php esc_html_e('Returns', 'dawp'); ?></h3>
                            <p class="mt-2 text-sm leading-6 text-white/80"><?php esc_html_e('Customers may request returns within 30 days of delivery for eligible unworn and unwashed items in original condition.', 'dawp'); ?></p>
                        </div>
                        <div class="rounded-2xl border border-white/15 bg-white/10 p-5">
                            <h3 class="font-bold"><?php esc_html_e('Support', 'dawp'); ?></h3>
                            <p class="mt-2 text-sm leading-6 text-white/80"><?php echo wp_kses_post($link_support_email_on_dark(__('Need help with sizing, orders, or product questions? Contact support@vivisshop.com. Business hours: Monday-Friday, 9:00 AM-5:00 PM.', 'dawp'))); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#FFF8EF] py-16 lg:py-20">
        <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[1fr_0.85fr] lg:items-center lg:px-8">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#8C6D58]"><?php esc_html_e('Stay Updated', 'dawp'); ?></p>
                <h2 class="mt-3 font-heading text-4xl font-bold leading-tight text-[#4B3528]"><?php esc_html_e('Soft new styles, straight to your inbox.', 'dawp'); ?></h2>
                <p class="mt-4 max-w-2xl text-base leading-7 text-[#756A62]"><?php esc_html_e('Join the Vivisshop list for new arrivals, seasonal favorites, and easy everyday outfit ideas.', 'dawp'); ?></p>
            </div>
            <form class="rounded-2xl border border-[#E7D8C8] bg-white p-4 shadow-sm" action="#" method="post">
                <label for="vivisshop-newsletter-email" class="sr-only"><?php esc_html_e('Email address', 'dawp'); ?></label>
                <div class="flex flex-col gap-3 sm:flex-row">
                    <input id="vivisshop-newsletter-email" type="email" name="email" placeholder="<?php esc_attr_e('Email address', 'dawp'); ?>" class="min-h-12 flex-1 rounded-full border border-[#E7D8C8] px-5 text-sm outline-none focus:border-[#A8B99A]">
                    <button type="submit" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#B89B83] px-7 text-sm font-bold text-white transition hover:bg-[#4B3528]">
                        <?php esc_html_e('Subscribe', 'dawp'); ?>
                    </button>
                </div>
            </form>
        </div>
    </section>
</div>
