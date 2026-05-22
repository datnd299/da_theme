<?php
/**
 * Template Part: page-about
 */

$gallery_uri = get_theme_file_uri('/assets/img/gallery/ScottOsterbind/');

$images = [
    'hero'      => $gallery_uri . 'about-hero-artisan-studio.png',
    'bracelets' => $gallery_uri . 'about-story-handmade-details.png',
    'curated'   => $gallery_uri . 'about-curated-accessories.png',
];

$shop_url = function_exists('wc_get_page_id') && wc_get_page_id('shop') > 0
    ? get_permalink(wc_get_page_id('shop'))
    : home_url('/shop/');

$category_url = static function ($slug) {
    if (taxonomy_exists('product_cat')) {
        $term = get_term_by('slug', $slug, 'product_cat');

        if ($term && ! is_wp_error($term)) {
            $link = get_term_link($term);

            if (! is_wp_error($link)) {
                return $link;
            }
        }
    }

    return home_url('/product-category/' . sanitize_title($slug) . '/');
};

$values = [
    [
        'title' => __('Handmade Character', 'dawp'),
        'copy'  => __('We focus on pieces that feel personal, tactile, and easy to wear, with handmade details and natural variation where appropriate.', 'dawp'),
    ],
    [
        'title' => __('Curated Vintage Feel', 'dawp'),
        'copy'  => __('Accessories and apparel are selected for warm texture, everyday styling, and vintage-inspired character without unsupported authenticity claims.', 'dawp'),
    ],
    [
        'title' => __('Clear Customer Care', 'dawp'),
        'copy'  => __('Product notes, processing timelines, tracking information, and return eligibility are presented clearly so customers can shop with confidence.', 'dawp'),
    ],
];

$collections = [
    __('Handmade bracelets', 'dawp'),
    __('Beaded jewelry', 'dawp'),
    __('Vintage-inspired accessories', 'dawp'),
    __('Curated apparel', 'dawp'),
    __('Artisan gifts', 'dawp'),
    __('Thoughtful small finds', 'dawp'),
];

$trust_items = [
    __('Secure checkout', 'dawp'),
    __('Tracking provided after dispatch', 'dawp'),
    __('30-day return window for eligible items', 'dawp'),
    __('Support by email during business hours', 'dawp'),
];
?>

<div id="primary" class="bg-white font-body text-[#1F2937]">

    <!-- Hero -->
    <section class="relative overflow-hidden bg-[#F7F5EF]">
        <div class="mx-auto grid min-h-[560px] max-w-7xl grid-cols-1 items-center gap-10 px-4 py-14 sm:px-6 lg:grid-cols-[minmax(0,0.92fr)_minmax(0,1.08fr)] lg:px-8 lg:py-20">
            <div class="relative z-10">
                <p class="mb-5 inline-flex rounded-full border border-[#C89B3C]/60 bg-white px-4 py-2 text-xs font-black uppercase tracking-[0.16em] text-[#6E9B8E]">
                    <?php esc_html_e('About Scott Osterbind', 'dawp'); ?>
                </p>

                <h1 class="font-heading text-5xl font-black leading-[0.98] text-[#1F6F68] sm:text-6xl lg:text-7xl">
                    <?php esc_html_e('A warm artisan boutique for handmade jewelry and curated style.', 'dawp'); ?>
                </h1>

                <p class="mt-6 max-w-2xl text-lg leading-8 text-[#475569]">
                    <?php esc_html_e('Scott Osterbind brings together handmade bracelets, beaded jewelry, vintage-inspired accessories, curated apparel, and small creative gifts with a personal, boutique feel.', 'dawp'); ?>
                </p>

                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url($shop_url); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#C89B3C] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#1F6F68] hover:text-white">
                        <?php esc_html_e('Shop The Boutique', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#C89B3C] bg-white px-7 text-sm font-black uppercase tracking-wide text-[#1F6F68] transition hover:bg-[#F7F5EF]">
                        <?php esc_html_e('Contact Us', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <div class="relative">
                <div class="overflow-hidden rounded-lg border border-[#E8D9A6] bg-white shadow-xl">
                    <img src="<?php echo esc_url($images['hero']); ?>"
                         alt="<?php esc_attr_e('Artisan jewelry workspace with beads, bracelets, and warm handmade details', 'dawp'); ?>"
                         class="aspect-[4/3] w-full object-cover"
                         loading="eager"
                         fetchpriority="high">
                </div>

                <div class="absolute -bottom-6 left-6 right-6 rounded-lg border border-[#E8D9A6] bg-white p-5 shadow-xl sm:left-auto sm:right-8 sm:w-80">
                    <p class="text-xs font-black uppercase tracking-[0.16em] text-[#C89B3C]">
                        <?php esc_html_e('Creative Everyday Style', 'dawp'); ?>
                    </p>
                    <p class="mt-2 text-sm font-semibold leading-6 text-[#475569]">
                        <?php esc_html_e('Each piece is selected or made to feel thoughtful, wearable, and giftable.', 'dawp'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Story -->
    <section class="bg-white py-14 lg:py-20">
        <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
            <div>
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#C89B3C]">
                    <?php esc_html_e('Our Story', 'dawp'); ?>
                </p>

                <h2 class="font-heading text-4xl font-black leading-tight text-[#1F6F68] lg:text-5xl">
                    <?php esc_html_e('Handmade details, vintage-inspired curation, and an honest boutique point of view.', 'dawp'); ?>
                </h2>

                <p class="mt-5 max-w-2xl text-base leading-8 text-[#475569]">
                    <?php esc_html_e('The store is built for people who appreciate jewelry and accessories with texture, character, and a sense of personal expression. Our assortment stays focused on bracelets, beaded pieces, curated accessories, apparel accents, and small gifts.', 'dawp'); ?>
                </p>
                <p class="mt-4 max-w-2xl text-base leading-8 text-[#475569]">
                    <?php esc_html_e('We avoid exaggerated luxury language, replica claims, and unsupported gemstone or vintage claims. The goal is simple: present creative products clearly, warmly, and professionally.', 'dawp'); ?>
                </p>

                <p class="mt-7 border-l-4 border-l-[#C89B3C] bg-[#F7F5EF] p-4 text-sm font-bold leading-7 text-[#1F6F68]">
                    <?php esc_html_e('Handmade items may include slight natural variations in color, texture, bead pattern, or finish.', 'dawp'); ?>
                </p>
            </div>

            <div class="overflow-hidden rounded-lg border border-[#E8D9A6] bg-white shadow-sm">
                <img src="<?php echo esc_url($images['bracelets']); ?>"
                     alt="<?php esc_attr_e('Handmade beaded bracelets arranged on warm neutral fabric', 'dawp'); ?>"
                     class="aspect-[4/3] w-full object-cover"
                     loading="lazy">
            </div>
        </div>
    </section>

    <!-- Values -->
    <section class="bg-[#F7F5EF] py-14 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#C89B3C]">
                    <?php esc_html_e('How We Work', 'dawp'); ?>
                </p>
                <h2 class="font-heading text-4xl font-black leading-tight text-[#1F6F68] lg:text-5xl">
                    <?php esc_html_e('A focused shop built around creativity, clarity, and customer trust.', 'dawp'); ?>
                </h2>
            </div>

            <div class="mt-10 grid grid-cols-1 gap-5 md:grid-cols-3">
                <?php foreach ($values as $value) : ?>
                    <div class="rounded-lg border border-[#E8D9A6] border-t-4 border-t-[#C89B3C] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:border-[#C89B3C] hover:shadow-md">
                        <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-[#6E9B8E] text-white">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <h3 class="font-heading text-xl font-black text-[#1F6F68]"><?php echo esc_html($value['title']); ?></h3>
                        <p class="mt-3 text-sm leading-7 text-[#475569]"><?php echo esc_html($value['copy']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Collections -->
    <section class="bg-white py-14 lg:py-20">
        <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
            <div class="overflow-hidden rounded-lg border border-[#E8D9A6] bg-white shadow-sm">
                <img src="<?php echo esc_url($images['curated']); ?>"
                     alt="<?php esc_attr_e('Vintage-inspired accessories and curated apparel details on neutral fabric', 'dawp'); ?>"
                     class="aspect-[4/3] w-full object-cover"
                     loading="lazy">
            </div>

            <div>
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#C89B3C]">
                    <?php esc_html_e('What We Offer', 'dawp'); ?>
                </p>

                <h2 class="font-heading text-4xl font-black leading-tight text-[#1F6F68] lg:text-5xl">
                    <?php esc_html_e('Small collections for personal style and thoughtful gifting.', 'dawp'); ?>
                </h2>

                <p class="mt-5 max-w-2xl text-base leading-8 text-[#475569]">
                    <?php esc_html_e('Our product categories stay intentionally focused so the store feels curated instead of random. Browse handmade wristwear, beaded details, warm accessories, apparel accents, and small giftable pieces.', 'dawp'); ?>
                </p>

                <div class="mt-7 grid grid-cols-1 gap-3 sm:grid-cols-2">
                    <?php foreach ($collections as $collection) : ?>
                        <div class="flex min-h-12 items-center gap-3 rounded-lg border border-[#E8D9A6] bg-[#F7F5EF] px-4">
                            <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-[#C89B3C] text-white">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <span class="text-sm font-bold text-[#1F2937]"><?php echo esc_html($collection); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url($category_url('handmade-bracelets')); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#C89B3C] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#1F6F68] hover:text-white">
                        <?php esc_html_e('Shop Bracelets', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url($category_url('vintage-accessories')); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#C89B3C] bg-white px-7 text-sm font-black uppercase tracking-wide text-[#1F6F68] transition hover:bg-[#F7F5EF]">
                        <?php esc_html_e('Explore Vintage Finds', 'dawp'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Trust -->
    <section class="bg-[#1B4F49] py-14 text-white lg:py-20">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 sm:px-6 lg:grid-cols-[minmax(0,0.9fr)_minmax(0,1.1fr)] lg:px-8">
            <div>
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#C89B3C]">
                    <?php esc_html_e('Customer Care', 'dawp'); ?>
                </p>
                <h2 class="font-heading text-4xl font-black leading-tight text-white lg:text-5xl">
                    <?php esc_html_e('Clear policies for a trustworthy handmade boutique experience.', 'dawp'); ?>
                </h2>
                <p class="mt-5 max-w-2xl text-base leading-8 text-[#FAF6EA]">
                    <?php esc_html_e('We provide support access, order tracking, shipping information, and return guidance so customers understand what to expect before and after checkout.', 'dawp'); ?>
                </p>
            </div>

            <div class="space-y-5">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <?php foreach ($trust_items as $item) : ?>
                        <div class="rounded-lg border border-white/10 border-l-4 border-l-[#C89B3C] bg-white/10 p-5">
                            <h3 class="text-base font-black text-white"><?php echo esc_html($item); ?></h3>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="rounded-lg border border-[#C89B3C]/50 bg-[#EEF6F2]/14 p-5">
                    <p class="text-sm font-black uppercase tracking-[0.16em] text-[#C89B3C]">
                        <?php esc_html_e('Support Information', 'dawp'); ?>
                    </p>
                    <p class="mt-3 text-sm font-semibold leading-7 text-[#FAF6EA]">
                        <?php esc_html_e('Email support@scottosterbind.com. Business hours are Monday - Friday, 9:00 AM - 6:00 PM EST.', 'dawp'); ?>
                    </p>
                </div>

                <div class="flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url(home_url('/shipping-returns/')); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#C89B3C] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-[#123D39]">
                        <?php esc_html_e('Shipping & Returns', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/faq/')); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#C89B3C] bg-transparent px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-[#1F2937]">
                        <?php esc_html_e('View FAQs', 'dawp'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>
