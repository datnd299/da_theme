<?php
/**
 * About page template part.
 *
 * @package dawp
 */

$theme_uri = get_template_directory_uri();

$asset = static function ($path) use ($theme_uri) {
    return $theme_uri . '/assets/img/' . ltrim($path, '/');
};

$support_email = 'support@vivisshop.com';
$support_link = '<a class="font-semibold text-[#4B3528] underline decoration-[#B89B83] underline-offset-4" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>';
$link_support_email = static function ($text) use ($support_email, $support_link) {
    return str_replace(esc_html($support_email), $support_link, esc_html($text));
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

$focus_cards = [
    [
        'title' => __('Relaxed Everyday Fits', 'dawp'),
        'copy'  => __('Comfortable silhouettes made for home, errands, weekends, and casual plans.', 'dawp'),
    ],
    [
        'title' => __('Soft Feminine Details', 'dawp'),
        'copy'  => __('Gentle colors, light prints, easy necklines, and wearable finishes.', 'dawp'),
    ],
    [
        'title' => __('Curated Apparel Only', 'dawp'),
        'copy'  => __('A focused women\'s fashion store, not a mixed marketplace of unrelated products.', 'dawp'),
    ],
    [
        'title' => __('Clear Shopping Standards', 'dawp'),
        'copy'  => __('Straightforward product categories, clear policies, secure checkout, and customer support.', 'dawp'),
    ],
];

$values = [
    __('Soft, comfortable clothing for real daily life', 'dawp'),
    __('Mature feminine style without loud trend-chasing', 'dawp'),
    __('Clear product information and focused categories', 'dawp'),
    __('No counterfeit branding, copied characters, or offensive graphics', 'dawp'),
    __('No fake countdowns, exaggerated urgency, or misleading claims', 'dawp'),
    __('Transparent support, shipping, returns, and policy pages', 'dawp'),
];

$trust_cards = [
    [
        'title' => __('Secure Checkout', 'dawp'),
        'copy'  => __('The shopping experience is structured to be simple, clear, and trustworthy.', 'dawp'),
    ],
    [
        'title' => __('Tracking Included', 'dawp'),
        'copy'  => __('Tracking information is provided once an order ships.', 'dawp'),
    ],
    [
        'title' => __('30-Day Returns', 'dawp'),
        'copy'  => __('Eligible unworn and unwashed items may be returned within 30 days of delivery.', 'dawp'),
    ],
    [
        'title' => __('Customer Support', 'dawp'),
        'copy'  => __('Contact support@vivisshop.com. Business hours: Monday-Friday, 9:00 AM-5:00 PM.', 'dawp'),
    ],
];
?>

<div class="bg-white text-[#2F2925]">
    <section class="bg-[#FFF8EF] py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:px-8">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#8C6D58]"><?php esc_html_e('Who We Are', 'dawp'); ?></p>
                <h2 class="mt-3 font-heading text-4xl font-bold leading-tight text-[#4B3528] lg:text-5xl">
                    <?php esc_html_e('A gentle boutique-inspired store for everyday women\'s style.', 'dawp'); ?>
                </h2>
            </div>
            <div class="space-y-5 text-base leading-8 text-[#756A62]">
                <p><?php esc_html_e('Vivisshop was created around a simple idea: everyday clothing should be comfortable, easy to style, and softly feminine without feeling loud or overly trendy.', 'dawp'); ?></p>
                <p><?php esc_html_e('Our collection direction focuses on wearable women\'s apparel such as casual tops, tunic tops, relaxed blouses, soft graphic tops, easy dresses, and seasonal pieces that suit daily routines.', 'dawp'); ?></p>
                <p><?php esc_html_e('We keep the store focused so customers can quickly understand what we offer, browse clear categories, and shop with confidence through transparent support and policy information.', 'dawp'); ?></p>
            </div>
        </div>
    </section>

    <section class="bg-[#F3E7DA] py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#8C6D58]"><?php esc_html_e('Our Focus', 'dawp'); ?></p>
                <h2 class="mt-3 font-heading text-4xl font-bold leading-tight text-[#4B3528]"><?php esc_html_e('Made for comfort-first, everyday dressing.', 'dawp'); ?></h2>
                <p class="mt-4 text-base leading-7 text-[#756A62]"><?php esc_html_e('The Vivisshop experience is built around a clear women\'s apparel niche and a calm shopping journey.', 'dawp'); ?></p>
            </div>

            <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <?php foreach ($focus_cards as $index => $card) : ?>
                    <div class="rounded-2xl border border-[#E7D8C8] bg-white p-6 shadow-sm">
                        <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full <?php echo 1 === $index % 2 ? 'bg-[#A8B99A]' : 'bg-[#B89B83]'; ?> text-sm font-bold text-white">
                            <?php echo esc_html(str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT)); ?>
                        </div>
                        <h3 class="text-lg font-bold text-[#4B3528]"><?php echo esc_html($card['title']); ?></h3>
                        <p class="mt-3 text-sm leading-6 text-[#756A62]"><?php echo esc_html($card['copy']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:items-center lg:px-8">
            <img src="<?php echo esc_url($asset('gallery/vivisshop/Tunic_Tops_Relaxed.png')); ?>" alt="<?php esc_attr_e('Relaxed tunic top styled for everyday wear', 'dawp'); ?>" class="aspect-[4/3] w-full rounded-[2rem] object-cover">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#8C6D58]"><?php esc_html_e('What We Choose', 'dawp'); ?></p>
                <h2 class="mt-3 font-heading text-4xl font-bold leading-tight text-[#4B3528]"><?php esc_html_e('Soft pieces that fit into real routines.', 'dawp'); ?></h2>
                <p class="mt-5 text-base leading-8 text-[#756A62]"><?php esc_html_e('We look for relaxed silhouettes, soft-looking textures, gentle colors, and simple details that help women feel comfortable and naturally put together.', 'dawp'); ?></p>
                <div class="mt-6 grid gap-3 sm:grid-cols-2">
                    <a href="<?php echo esc_url($category_url('relaxed-tops')); ?>" class="rounded-2xl border border-[#E7D8C8] bg-[#FFF8EF] p-5 transition hover:bg-[#F3E7DA]">
                        <span class="block font-bold text-[#4B3528]"><?php esc_html_e('Relaxed Tops', 'dawp'); ?></span>
                        <span class="mt-2 block text-sm leading-6 text-[#756A62]"><?php esc_html_e('Easy tops for daily comfort.', 'dawp'); ?></span>
                    </a>
                    <a href="<?php echo esc_url($category_url('soft-tunics')); ?>" class="rounded-2xl border border-[#E7D8C8] bg-[#FFF8EF] p-5 transition hover:bg-[#F3E7DA]">
                        <span class="block font-bold text-[#4B3528]"><?php esc_html_e('Soft Tunics', 'dawp'); ?></span>
                        <span class="mt-2 block text-sm leading-6 text-[#756A62]"><?php esc_html_e('Longer relaxed fits.', 'dawp'); ?></span>
                    </a>
                    <a href="<?php echo esc_url($category_url('gentle-blouses')); ?>" class="rounded-2xl border border-[#E7D8C8] bg-[#FFF8EF] p-5 transition hover:bg-[#F3E7DA]">
                        <span class="block font-bold text-[#4B3528]"><?php esc_html_e('Gentle Blouses', 'dawp'); ?></span>
                        <span class="mt-2 block text-sm leading-6 text-[#756A62]"><?php esc_html_e('Soft polish for casual days.', 'dawp'); ?></span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#FFF8EF] py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.95fr_1.05fr] lg:items-center lg:px-8 lg:[&>*:first-child]:order-2">
            <img src="<?php echo esc_url($asset('gallery/vivisshop/Blouse_Shirts_Simple.png')); ?>" alt="<?php esc_attr_e('Simple blouse styled for a relaxed polished day', 'dawp'); ?>" class="aspect-[4/3] w-full rounded-[2rem] object-cover">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#8C6D58]"><?php esc_html_e('Our Store Standards', 'dawp'); ?></p>
                <h2 class="mt-3 font-heading text-4xl font-bold leading-tight text-[#4B3528]"><?php esc_html_e('Clear, honest, and focused on women\'s apparel.', 'dawp'); ?></h2>
                <p class="mt-5 text-base leading-8 text-[#756A62]"><?php esc_html_e('Vivisshop is built to present a legitimate, coherent fashion store with transparent customer information and realistic product direction.', 'dawp'); ?></p>
                <div class="mt-7 grid gap-3">
                    <?php foreach ($values as $value) : ?>
                        <div class="flex gap-3 rounded-2xl border border-[#E7D8C8] bg-white p-4">
                            <span class="mt-1 flex h-5 min-w-5 items-center justify-center rounded-full bg-[#A8B99A] text-white" aria-hidden="true">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 6 9 17l-5-5"></path>
                                </svg>
                            </span>
                            <p class="text-sm font-semibold leading-6 text-[#4B3528]"><?php echo esc_html($value); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-3xl">
                    <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#8C6D58]"><?php esc_html_e('Customer Trust', 'dawp'); ?></p>
                    <h2 class="mt-3 font-heading text-4xl font-bold leading-tight text-[#4B3528]"><?php esc_html_e('Support and policies are part of the experience.', 'dawp'); ?></h2>
                    <p class="mt-4 text-base leading-7 text-[#756A62]"><?php esc_html_e('We keep key customer information visible so shoppers can understand shipping, returns, contact options, and order support before they buy.', 'dawp'); ?></p>
                </div>
                <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>" class="inline-flex min-h-11 items-center justify-center rounded-full border border-[#B89B83] px-6 text-sm font-bold text-[#4B3528] transition hover:bg-[#F3E7DA]"><?php esc_html_e('View Shipping Policy', 'dawp'); ?></a>
            </div>

            <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <?php foreach ($trust_cards as $card) : ?>
                    <div class="rounded-2xl border border-[#E7D8C8] bg-white p-6 shadow-sm">
                        <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-[#FFF8EF] text-[#4B3528]" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 6 9 17l-5-5"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-[#4B3528]"><?php echo esc_html($card['title']); ?></h3>
                        <p class="mt-2 text-sm leading-6 text-[#756A62]"><?php echo wp_kses_post($link_support_email($card['copy'])); ?></p>
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
                        <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#F3E7DA]"><?php esc_html_e('Begin With Soft Everyday Style', 'dawp'); ?></p>
                        <h2 class="mt-3 font-heading text-4xl font-bold leading-tight"><?php esc_html_e('Explore relaxed pieces made for comfortable daily dressing.', 'dawp'); ?></h2>
                    </div>
                    <div class="grid gap-4 md:grid-cols-3">
                        <a href="<?php echo esc_url($category_url('relaxed-tops')); ?>" class="group rounded-2xl border border-white/15 bg-white/10 p-5 transition hover:bg-white">
                            <span class="block font-bold text-white transition group-hover:text-[#4B3528]"><?php esc_html_e('Relaxed Tops', 'dawp'); ?></span>
                            <span class="mt-2 block text-sm leading-6 text-white/80 transition group-hover:text-[#756A62]"><?php esc_html_e('Soft everyday favorites.', 'dawp'); ?></span>
                        </a>
                        <a href="<?php echo esc_url($category_url('soft-tunics')); ?>" class="group rounded-2xl border border-white/15 bg-white/10 p-5 transition hover:bg-white">
                            <span class="block font-bold text-white transition group-hover:text-[#4B3528]"><?php esc_html_e('Soft Tunics', 'dawp'); ?></span>
                            <span class="mt-2 block text-sm leading-6 text-white/80 transition group-hover:text-[#756A62]"><?php esc_html_e('Longer relaxed fits.', 'dawp'); ?></span>
                        </a>
                        <a href="<?php echo esc_url($category_url('gentle-blouses')); ?>" class="group rounded-2xl border border-white/15 bg-white/10 p-5 transition hover:bg-white">
                            <span class="block font-bold text-white transition group-hover:text-[#4B3528]"><?php esc_html_e('Gentle Blouses', 'dawp'); ?></span>
                            <span class="mt-2 block text-sm leading-6 text-white/80 transition group-hover:text-[#756A62]"><?php esc_html_e('Soft polish for casual days.', 'dawp'); ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
