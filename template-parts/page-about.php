<?php
/**
 * About page for LBQ Shop.
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

$support_email  = 'support@lbqshop.com';
$business_hours = __('Monday - Friday, 9:00 AM - 5:00 PM, GMT-08:00 Pacific Standard Time', 'dawp');

$lbq_category_url = static function ($slug) {
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

$stock_images = [
    'hero'     => get_theme_file_uri('assets/img/about/about-hero-beauty-essentials.jpg'),
    'drawer'   => get_theme_file_uri('assets/img/about/about-drawer-organizer.jpg'),
    'brushes'  => get_theme_file_uri('assets/img/about/about-brush-storage.jpg'),
    'flat_lay' => get_theme_file_uri('assets/img/about/about-standards-flat-lay.jpg'),
    'gift'     => get_theme_file_uri('assets/img/about/about-giftable-flat-lay.jpg'),
];

$brand_pillars = [
    [
        'title' => __('Clean Beauty Organization', 'dawp'),
        'copy'  => __('Makeup bags, cosmetic organizers, brush storage, and small tools that help everyday routines feel easier to manage.', 'dawp'),
        'icon'  => 'sparkle',
    ],
    [
        'title' => __('Practical Daily Style', 'dawp'),
        'copy'  => __('Simple accessories selected for regular days, travel, commuting, gifting, and small outfit details.', 'dawp'),
        'icon'  => 'bag',
    ],
    [
        'title' => __('Approachable Support', 'dawp'),
        'copy'  => __('Clear product focus, transparent order details, and customer care that keeps shopping straightforward.', 'dawp'),
        'icon'  => 'mail',
    ],
];

$category_links = [
    [
        'name' => __('Beauty Accessories', 'dawp'),
        'copy' => __('Useful beauty tools and small accessories designed to support simple everyday routines.', 'dawp'),
        'url'  => $lbq_category_url('beauty-accessories'),
    ],
    [
        'name' => __('Makeup Bags & Organizers', 'dawp'),
        'copy' => __('Travel-friendly cosmetic bags and organizers that help keep beauty items neat and easy to find.', 'dawp'),
        'url'  => $lbq_category_url('makeup-bags-organizers'),
    ],
    [
        'name' => __('Fashion Accessories', 'dawp'),
        'copy' => __('Simple style accents for everyday outfits, from hair accessories to small carry pieces.', 'dawp'),
        'url'  => $lbq_category_url('fashion-accessories'),
    ],
    [
        'name' => __('Everyday Style Essentials', 'dawp'),
        'copy' => __('Practical accessories for daily beauty, travel, organization, and personal style.', 'dawp'),
        'url'  => $lbq_category_url('everyday-style-essentials'),
    ],
];

$standards = [
    __('Products should feel useful, feminine, organized, and easy to use.', 'dawp'),
    __('Collections stay focused on beauty accessories, makeup organization, fashion accents, and giftable everyday finds.', 'dawp'),
    __('We avoid counterfeit branding, medical beauty claims, and unrelated general-store products.', 'dawp'),
    __('Product copy should be clear about how each item fits into daily routines, travel, storage, or personal style.', 'dawp'),
];

$care_cards = [
    [
        'title' => __('Customer Support', 'dawp'),
        'copy'  => sprintf(
            /* translators: %s: support email address */
            __('Questions about an item or order can be sent to %s.', 'dawp'),
            $support_email
        ),
        'icon'  => 'mail',
    ],
    [
        'title' => __('Realistic Shipping', 'dawp'),
        'copy'  => __('Standard U.S. shipping is free. Orders use a 5:00 PM (GMT-08:00) Pacific Standard Time cutoff, 1-3 business day handling, and 5-7 business day transit.', 'dawp'),
        'icon'  => 'truck',
    ],
    [
        'title' => __('30-Day Returns', 'dawp'),
        'copy'  => __('Returns and exchanges are accepted within 30 days of delivery for eligible unused items in original condition.', 'dawp'),
        'icon'  => 'refresh',
    ],
];

$render_icon = static function ($icon) {
    $icons = [
        'bag'     => '<path d="M6 8h12l1 13H5L6 8Z"/><path d="M9 8a3 3 0 0 1 6 0"/>',
        'mail'    => '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-10 6L2 7"/>',
        'truck'   => '<path d="M10 17h4V5H3v12h2"/><path d="M14 8h4l3 3v6h-3"/><circle cx="7" cy="17" r="2"/><circle cx="16" cy="17" r="2"/>',
        'refresh' => '<path d="M20 12a8 8 0 0 1-13.66 5.66L4 15"/><path d="M4 20v-5h5"/><path d="M4 12A8 8 0 0 1 17.66 6.34L20 9"/><path d="M20 4v5h-5"/>',
        'sparkle' => '<path d="m12 3 1.9 5.8L20 11l-6.1 2.2L12 19l-1.9-5.8L4 11l6.1-2.2L12 3Z"/>',
    ];

    return $icons[$icon] ?? $icons['sparkle'];
};
?>

<div class="bg-white text-[#2F2A28]">
    <section class="relative isolate overflow-hidden border-b border-[#E8DAD4] bg-[#FFFDFC] py-12 sm:py-16 lg:py-20" aria-labelledby="about-hero-title">
        <div class="absolute inset-x-0 top-0 -z-10 h-40 bg-[#F8F2EE]" aria-hidden="true"></div>

        <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[1.02fr_0.98fr] lg:items-center lg:gap-12 lg:px-8">
            <div class="max-w-2xl">
                <p class="inline-flex rounded-md border border-[#E8DAD4] bg-white px-4 py-2 text-xs font-extrabold uppercase tracking-[0.14em] text-[#A96870] shadow-sm">
                    <?php esc_html_e('About LBQ Shop', 'dawp'); ?>
                </p>
                <h1 id="about-hero-title" class="mt-5 font-heading text-4xl font-extrabold leading-tight text-[#2F2A28] sm:text-5xl lg:text-6xl">
                    <?php esc_html_e('Pretty, practical beauty and style essentials for everyday confidence.', 'dawp'); ?>
                </h1>
                <p class="mt-5 max-w-xl text-base leading-8 text-[#6F625D] sm:text-lg">
                    <?php esc_html_e('LBQ Shop brings together simple makeup organizers, beauty accessories, fashion accents, and giftable everyday finds that help your routine feel cleaner, easier, and more polished without overcomplicating your day.', 'dawp'); ?>
                </p>

                <div class="mt-7 grid max-w-2xl gap-3 sm:grid-cols-3">
                    <div class="flex items-start gap-3 rounded-md border border-[#E8DAD4] bg-white p-4 shadow-sm">
                        <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-[#C87F86]" aria-hidden="true"></span>
                        <span class="text-sm font-bold leading-6 text-[#2F2A28]"><?php esc_html_e('Simple organizers for easier routines', 'dawp'); ?></span>
                    </div>
                    <div class="flex items-start gap-3 rounded-md border border-[#E8DAD4] bg-white p-4 shadow-sm">
                        <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-[#C87F86]" aria-hidden="true"></span>
                        <span class="text-sm font-bold leading-6 text-[#2F2A28]"><?php esc_html_e('Pretty accents for daily beauty and style', 'dawp'); ?></span>
                    </div>
                    <div class="flex items-start gap-3 rounded-md border border-[#E8DAD4] bg-white p-4 shadow-sm">
                        <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-[#C87F86]" aria-hidden="true"></span>
                        <span class="text-sm font-bold leading-6 text-[#2F2A28]"><?php esc_html_e('Useful finds that feel easy to trust', 'dawp'); ?></span>
                    </div>
                </div>

                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#C87F86] px-6 text-sm font-bold text-white transition hover:bg-[#2F2A28]">
                        <?php esc_html_e('Shop Everyday Finds', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#C87F86] bg-white px-6 text-sm font-bold text-[#8A4F56] transition hover:bg-[#FBEDEA]">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <figure class="relative">
                <?php echo dawp_get_responsive_image($stock_images['hero'], __('Makeup and beauty accessories arranged beside a cosmetic bag', 'dawp'), 'aspect-[5/4] w-full rounded-md object-cover shadow-xl shadow-[#8A4F56]/15 lg:aspect-[4/5]', 1200, 1500, 'eager'); ?>
                <figcaption class="mt-4 rounded-md border border-[#E8DAD4] bg-white p-4 text-sm font-bold leading-6 text-[#2F2A28] shadow-sm">
                    <?php esc_html_e('Clean, feminine accessories made for simple routines, travel, gifting, and everyday confidence.', 'dawp'); ?>
                </figcaption>
            </figure>
        </div>
    </section>

    <section class="bg-[#FFFDFC] py-14 sm:py-20" aria-labelledby="about-story-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:items-center lg:px-8">
            <div class="about-story-gallery" aria-label="<?php esc_attr_e('Beauty accessories image gallery', 'dawp'); ?>">
                <?php echo dawp_get_responsive_image($stock_images['drawer'], __('Cosmetics and beauty tools organized in a clean drawer', 'dawp'), 'about-story-gallery__image about-story-gallery__image--tall rounded-md object-cover shadow-sm', 800, 1000); ?>
                <?php echo dawp_get_responsive_image($stock_images['brushes'], __('Makeup brushes stored neatly in small holders', 'dawp'), 'about-story-gallery__image rounded-md object-cover shadow-sm', 800, 1000); ?>
                <?php echo dawp_get_responsive_image($stock_images['gift'], __('Pink beauty accessories arranged as a giftable flat lay', 'dawp'), 'about-story-gallery__image rounded-md object-cover shadow-sm', 800, 1000); ?>
            </div>

            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A96870]"><?php esc_html_e('Our Story', 'dawp'); ?></p>
                <h2 id="about-story-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#2F2A28] sm:text-4xl">
                    <?php esc_html_e('Small accessories can make daily routines feel more put together.', 'dawp'); ?>
                </h2>
                <div class="mt-5 space-y-4 text-base leading-8 text-[#6F625D]">
                    <p>
                        <?php esc_html_e('LBQ Shop was created for shoppers who like beauty and fashion pieces that are pretty, useful, and simple to use. The store focuses on the everyday details: a makeup bag that keeps cosmetics easy to find, a compact organizer that clears a vanity, or a small style accent that finishes a regular outfit.', 'dawp'); ?>
                    </p>
                    <p>
                        <?php esc_html_e('Our approach is modern and practical. We keep the collection focused on beauty accessories, makeup storage, fashion accessories, everyday style essentials, and giftable finds instead of unrelated products or exaggerated claims.', 'dawp'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#F8F2EE] py-14 sm:py-20" aria-labelledby="about-pillars-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A96870]"><?php esc_html_e('What We Stand For', 'dawp'); ?></p>
                <h2 id="about-pillars-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#2F2A28] sm:text-4xl">
                    <?php esc_html_e('Pretty, practical finds for beauty, organization, and everyday style.', 'dawp'); ?>
                </h2>
                <p class="mt-4 text-base leading-7 text-[#6F625D]">
                    <?php esc_html_e('Every section of LBQ Shop is shaped around products customers can understand quickly and use often.', 'dawp'); ?>
                </p>
            </div>

            <div class="-mx-4 mt-10 flex snap-x snap-mandatory gap-4 overflow-x-auto overscroll-x-contain px-4 pb-2 scroll-smooth [scrollbar-width:none] [-ms-overflow-style:none] md:mx-0 md:grid md:grid-cols-3 md:gap-5 md:overflow-visible md:px-0 md:pb-0 [&::-webkit-scrollbar]:hidden">
                <?php foreach ($brand_pillars as $pillar) : ?>
                    <article class="min-w-[82%] snap-start rounded-md border border-[#E8DAD4] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-[#8A4F56]/10 sm:min-w-[55%] md:min-w-0">
                        <div class="flex h-12 w-12 items-center justify-center rounded-md bg-[#FBEDEA] text-[#A96870]">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <?php echo $render_icon($pillar['icon']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </svg>
                        </div>
                        <h3 class="mt-5 font-heading text-xl font-extrabold text-[#2F2A28]"><?php echo esc_html($pillar['title']); ?></h3>
                        <p class="mt-3 text-sm leading-6 text-[#6F625D]"><?php echo esc_html($pillar['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-white py-14 sm:py-20" aria-labelledby="about-categories-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.88fr_1.12fr] lg:items-start lg:px-8">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A96870]"><?php esc_html_e('Our Product Focus', 'dawp'); ?></p>
                <h2 id="about-categories-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#2F2A28] sm:text-4xl">
                    <?php esc_html_e('A clear beauty and fashion accessories store, not a random marketplace.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-[#6F625D]">
                    <?php esc_html_e('LBQ Shop keeps the shopping experience focused, feminine, and easy to browse. Our categories are built around daily routines, travel-friendly organization, simple outfit details, and thoughtful small gifts.', 'dawp'); ?>
                </p>
                <a href="<?php echo esc_url($shop_url); ?>" class="mt-8 inline-flex min-h-12 items-center justify-center rounded-md bg-[#2F2A28] px-6 text-sm font-bold text-white transition hover:bg-[#8A4F56]">
                    <?php esc_html_e('Browse All Products', 'dawp'); ?>
                </a>
            </div>

            <div class="-mx-4 flex snap-x snap-mandatory gap-4 overflow-x-auto overscroll-x-contain px-4 pb-2 scroll-smooth [scrollbar-width:none] [-ms-overflow-style:none] sm:mx-0 sm:grid sm:grid-cols-2 sm:overflow-visible sm:px-0 sm:pb-0 [&::-webkit-scrollbar]:hidden">
                <?php foreach ($category_links as $category) : ?>
                    <a href="<?php echo esc_url($category['url']); ?>" class="group min-w-[82%] snap-start rounded-md border border-[#E8DAD4] bg-[#FFFDFC] p-5 transition hover:-translate-y-1 hover:bg-[#FBEDEA] hover:shadow-xl hover:shadow-[#8A4F56]/10 sm:min-w-0">
                        <span class="block font-heading text-lg font-extrabold text-[#2F2A28] transition group-hover:text-[#8A4F56]"><?php echo esc_html($category['name']); ?></span>
                        <span class="mt-3 block text-sm leading-6 text-[#6F625D]"><?php echo esc_html($category['copy']); ?></span>
                        <span class="mt-5 inline-flex text-sm font-bold text-[#A96870]">
                            <?php esc_html_e('Shop category', 'dawp'); ?>
                            <span class="ml-2" aria-hidden="true">-&gt;</span>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-[#F8F2EE] py-14 sm:py-20" aria-labelledby="about-standards-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[1.05fr_0.95fr] lg:items-center lg:px-8">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A96870]"><?php esc_html_e('How We Choose', 'dawp'); ?></p>
                <h2 id="about-standards-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#2F2A28] sm:text-4xl">
                    <?php esc_html_e('A practical standard for every beauty and style essential.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-[#6F625D]">
                    <?php esc_html_e('Our product direction is intentionally simple: useful items, clean presentation, and clear expectations. That helps customers understand what they are buying and how it fits into daily life.', 'dawp'); ?>
                </p>

                <div class="mt-7 grid gap-3">
                    <?php foreach ($standards as $standard) : ?>
                        <div class="flex gap-3 rounded-md border border-[#E8DAD4] bg-white px-4 py-4 text-sm font-bold leading-6 text-[#2F2A28]">
                            <span class="mt-1 h-2.5 w-2.5 shrink-0 rounded-full bg-[#C87F86]" aria-hidden="true"></span>
                            <span><?php echo esc_html($standard); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <?php echo dawp_get_responsive_image($stock_images['flat_lay'], __('Beauty and fashion accessories arranged neatly on a tabletop', 'dawp'), 'aspect-[4/5] w-full rounded-md object-cover shadow-sm', 800, 1000); ?>
        </div>
    </section>

    <section class="border-y border-[#E8DAD4] bg-[#FFFDFC] py-14 sm:py-20" aria-labelledby="about-care-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[0.85fr_1.15fr] lg:items-start">
                <div>
                    <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#A96870]"><?php esc_html_e('Customer Care', 'dawp'); ?></p>
                    <h2 id="about-care-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#2F2A28] sm:text-4xl">
                        <?php esc_html_e('Clear support for a smoother shopping experience.', 'dawp'); ?>
                    </h2>
                    <p class="mt-5 text-base leading-8 text-[#6F625D]">
                        <?php esc_html_e('We want customers to know what to expect before and after they place an order. Product focus, shipping details, returns, and support information are kept visible and straightforward.', 'dawp'); ?>
                    </p>
                    <p class="mt-5 text-sm leading-7 text-[#6F625D]">
                        <?php
                        echo wp_kses(
                            sprintf(
                                /* translators: 1: support email link, 2: business hours */
                                __('Need help? Email %1$s. Business hours: %2$s.', 'dawp'),
                                '<a class="font-bold text-[#8A4F56] underline decoration-[#C87F86]/40 underline-offset-4 transition hover:text-[#2F2A28]" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>',
                                esc_html($business_hours)
                            ),
                            [
                                'a' => [
                                    'class' => [],
                                    'href'  => [],
                                ],
                            ]
                        );
                        ?>
                    </p>
                </div>

                <div class="-mx-4 flex snap-x snap-mandatory gap-4 overflow-x-auto overscroll-x-contain px-4 pb-2 scroll-smooth [scrollbar-width:none] [-ms-overflow-style:none] md:mx-0 md:grid md:grid-cols-3 md:overflow-visible md:px-0 md:pb-0 [&::-webkit-scrollbar]:hidden">
                    <?php foreach ($care_cards as $card) : ?>
                        <article class="min-w-[82%] snap-start rounded-md border border-[#E8DAD4] bg-white p-6 shadow-sm sm:min-w-[55%] md:min-w-0">
                            <div class="flex h-12 w-12 items-center justify-center rounded-md bg-[#FBEDEA] text-[#A96870]">
                                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <?php echo $render_icon($card['icon']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </svg>
                            </div>
                            <h3 class="mt-5 font-heading text-lg font-extrabold text-[#2F2A28]"><?php echo esc_html($card['title']); ?></h3>
                            <p class="mt-3 text-sm leading-6 text-[#6F625D]"><?php echo esc_html($card['copy']); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</div>
