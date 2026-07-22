<?php
/**
 * About page for GraphicShirt.
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

$support_email  = 'support@graphicshirt.com';
$business_hours = __('Monday - Friday, 9:00 AM - 6:00 PM EST', 'dawp');

$graphicshirt_category_url = static function ($slug) {
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
    'hero'     => get_theme_file_uri('assets/img/home/editorial-america-250-family.jpg'),
    'drawer'   => get_theme_file_uri('assets/img/home/editorial-hoodie-lifestyle.jpg'),
    'brushes'  => get_theme_file_uri('assets/img/home/editorial-polo-cap.jpg'),
    'flat_lay' => get_theme_file_uri('assets/img/about/about-standards-flat-lay.jpg'),
    'gift'     => get_theme_file_uri('assets/img/home/editorial-metal-sign-flag.jpg'),
];

$brand_pillars = [
    [
        'title' => __('Original American-Inspired Designs', 'dawp'),
        'copy'  => __('Graphic T-shirts, caps and flags, brush storage, and small tools that help everyday routines feel easier to manage.', 'dawp'),
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
        'name' => __('Patriotic Apparel', 'dawp'),
        'copy' => __('Original patriotic tees for every American occasion.', 'dawp'),
        'url'  => $graphicshirt_category_url('t-shirt'),
    ],
    [
        'name' => __('Graphic T-shirts & Hoodies', 'dawp'),
        'copy' => __('Warm patriotic hoodies made to stand out.', 'dawp'),
        'url'  => $graphicshirt_category_url('hoodie'),
    ],
    [
        'name' => __('Patriotic Decor', 'dawp'),
        'copy' => __('Simple style accents for everyday outfits, from hair accessories to small carry pieces.', 'dawp'),
        'url'  => $graphicshirt_category_url('flags'),
    ],
    [
        'name' => __('Everyday Style Essentials', 'dawp'),
        'copy' => __('Commemorative products for holidays, family traditions, and everyday pride.', 'dawp'),
        'url'  => $graphicshirt_category_url('america-250'),
    ],
];

$standards = [
    __('Products should feel useful, patriotic, organized, and easy to use.', 'dawp'),
    __('Collections stay focused on patriotic apparel, American-inspired decor, and meaningful gifts.', 'dawp'),
    __('We avoid counterfeit branding, misleading product claims, and unrelated general-store products.', 'dawp'),
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
        'copy'  => __('Orders are processed within 2-4 business days. Standard US shipping typically takes 5-10 business days after dispatch.', 'dawp'),
        'icon'  => 'truck',
    ],
    [
        'title' => __('30-Day Returns', 'dawp'),
        'copy'  => __('Eligible unused items may be returned within 30 days of delivery, with hygiene and original-condition requirements where relevant.', 'dawp'),
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

<div class="bg-white text-[#102A43]">
    <section class="relative isolate overflow-hidden border-b border-[#D6DEE8] bg-[#FBFCFE] py-12 sm:py-16 lg:py-20" aria-labelledby="about-hero-title">
        <div class="absolute inset-x-0 top-0 -z-10 h-40 bg-[#F7F3EA]" aria-hidden="true"></div>

        <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[1.02fr_0.98fr] lg:items-center lg:gap-12 lg:px-8">
            <div class="max-w-2xl">
                <p class="inline-flex rounded-md border border-[#D6DEE8] bg-white px-4 py-2 text-xs font-extrabold uppercase tracking-[0.14em] text-[#B83232] shadow-sm">
                    <?php esc_html_e('About GraphicShirt', 'dawp'); ?>
                </p>
                <h1 id="about-hero-title" class="mt-5 font-heading text-4xl font-extrabold leading-tight text-[#102A43] sm:text-5xl lg:text-6xl">
                    <?php esc_html_e('Original designs for American moments that matter.', 'dawp'); ?>
                </h1>
                <p class="mt-5 max-w-xl text-base leading-8 text-[#52657A] sm:text-lg">
                    <?php esc_html_e('GraphicShirt creates patriotic apparel and decor for family celebrations, national holidays, remembrance, America 250, and everyday pride.', 'dawp'); ?>
                </p>

                <div class="mt-7 grid max-w-2xl gap-3 sm:grid-cols-3">
                    <div class="flex items-start gap-3 rounded-md border border-[#D6DEE8] bg-white p-4 shadow-sm">
                        <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-[#C83E3E]" aria-hidden="true"></span>
                        <span class="text-sm font-bold leading-6 text-[#102A43]"><?php esc_html_e('Original designs with American character', 'dawp'); ?></span>
                    </div>
                    <div class="flex items-start gap-3 rounded-md border border-[#D6DEE8] bg-white p-4 shadow-sm">
                        <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-[#C83E3E]" aria-hidden="true"></span>
                        <span class="text-sm font-bold leading-6 text-[#102A43]"><?php esc_html_e('Pretty accents for daily patriotic apparel', 'dawp'); ?></span>
                    </div>
                    <div class="flex items-start gap-3 rounded-md border border-[#D6DEE8] bg-white p-4 shadow-sm">
                        <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-[#C83E3E]" aria-hidden="true"></span>
                        <span class="text-sm font-bold leading-6 text-[#102A43]"><?php esc_html_e('Useful finds that feel easy to trust', 'dawp'); ?></span>
                    </div>
                </div>

                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#C83E3E] px-6 text-sm font-bold text-white transition hover:bg-[#102A43]">
                        <?php esc_html_e('Shop Everyday Finds', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#C83E3E] bg-white px-6 text-sm font-bold text-[#9B2C2C] transition hover:bg-[#E8EEF5]">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <figure class="relative">
                <img <?php echo dawp_i0_img_attrs($stock_images['hero'], [
                    'width'   => 600,
                    'height'  => 750,
                    'srcset'  => [[400, 500], [600, 750], [900, 1125], [1200, 1500]],
                    'sizes'   => '(max-width: 1023px) 100vw, 590px',
                    'loading' => 'eager',
                ]); ?> alt="<?php esc_attr_e('Family wearing America 250 graphic shirts', 'dawp'); ?>" class="aspect-[5/4] w-full rounded-md object-cover shadow-xl shadow-[#9B2C2C]/15 lg:aspect-[4/5]">
                <figcaption class="mt-4 rounded-md border border-[#D6DEE8] bg-white p-4 text-sm font-bold leading-6 text-[#102A43] shadow-sm">
                    <?php esc_html_e('Clean, patriotic accessories made for simple routines, travel, gifting, and everyday confidence.', 'dawp'); ?>
                </figcaption>
            </figure>
        </div>
    </section>

    <section class="bg-[#FBFCFE] py-14 sm:py-20" aria-labelledby="about-story-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:items-center lg:px-8">
            <div class="grid gap-4 sm:grid-cols-5">
                <img <?php echo dawp_i0_img_attrs($stock_images['drawer'], [
                    'width'  => 600,
                    'height' => 750,
                    'srcset' => [[320, 400], [480, 600], [600, 750], [900, 1125]],
                    'sizes'  => '(max-width: 639px) 100vw, (max-width: 1023px) 45vw, 360px',
                ]); ?> alt="<?php esc_attr_e('Man wearing a patriotic graphic hoodie', 'dawp'); ?>" class="aspect-[4/5] w-full rounded-md object-cover shadow-sm sm:col-span-3">
                <div class="grid gap-4 sm:col-span-2">
                    <img <?php echo dawp_i0_img_attrs($stock_images['brushes'], [
                        'width'  => 400,
                        'height' => 400,
                        'srcset' => [[200, 200], [300, 300], [400, 400], [600, 600]],
                        'sizes'  => '(max-width: 639px) 50vw, (max-width: 1023px) 30vw, 235px',
                    ]); ?> alt="<?php esc_attr_e('Patriotic polo shirt and embroidered cap', 'dawp'); ?>" class="aspect-square w-full rounded-md object-cover shadow-sm">
                    <img <?php echo dawp_i0_img_attrs($stock_images['gift'], [
                        'width'  => 400,
                        'height' => 400,
                        'srcset' => [[200, 200], [300, 300], [400, 400], [600, 600]],
                        'sizes'  => '(max-width: 639px) 50vw, (max-width: 1023px) 30vw, 235px',
                    ]); ?> alt="<?php esc_attr_e('Pink patriotic apparel arranged as a giftable flat lay', 'dawp'); ?>" class="aspect-square w-full rounded-md object-cover shadow-sm">
                </div>
            </div>

            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#B83232]"><?php esc_html_e('Our Story', 'dawp'); ?></p>
                <h2 id="about-story-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#102A43] sm:text-4xl">
                    <?php esc_html_e('Small accessories can make daily routines feel more put together.', 'dawp'); ?>
                </h2>
                <div class="mt-5 space-y-4 text-base leading-8 text-[#52657A]">
                    <p>
                        <?php esc_html_e('GraphicShirt was created for people who want to wear, display, and share what America means to them. Our designs connect family traditions, national milestones, service, remembrance, and everyday pride.', 'dawp'); ?>
                    </p>
                    <p>
                        <?php esc_html_e('Our approach is modern, respectful, and product-focused. We offer graphic apparel, caps, flags, metal signs, and commemorative America 250 designs.', 'dawp'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#F7F3EA] py-14 sm:py-20" aria-labelledby="about-pillars-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#B83232]"><?php esc_html_e('What We Stand For', 'dawp'); ?></p>
                <h2 id="about-pillars-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#102A43] sm:text-4xl">
                    <?php esc_html_e('Patriotic products designed with purpose and American character.', 'dawp'); ?>
                </h2>
                <p class="mt-4 text-base leading-7 text-[#52657A]">
                    <?php esc_html_e('Every section of GraphicShirt is shaped around products customers can understand quickly and use often.', 'dawp'); ?>
                </p>
            </div>

            <div class="mt-10 grid gap-5 md:grid-cols-3">
                <?php foreach ($brand_pillars as $pillar) : ?>
                    <article class="rounded-md border border-[#D6DEE8] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-[#9B2C2C]/10">
                        <div class="flex h-12 w-12 items-center justify-center rounded-md bg-[#E8EEF5] text-[#B83232]">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <?php echo $render_icon($pillar['icon']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </svg>
                        </div>
                        <h3 class="mt-5 font-heading text-xl font-extrabold text-[#102A43]"><?php echo esc_html($pillar['title']); ?></h3>
                        <p class="mt-3 text-sm leading-6 text-[#52657A]"><?php echo esc_html($pillar['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-white py-14 sm:py-20" aria-labelledby="about-categories-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.88fr_1.12fr] lg:items-start lg:px-8">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#B83232]"><?php esc_html_e('Our Product Focus', 'dawp'); ?></p>
                <h2 id="about-categories-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#102A43] sm:text-4xl">
                    <?php esc_html_e('A clear patriotic apparel and American-inspired decor store, not a random marketplace.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-[#52657A]">
                    <?php esc_html_e('GraphicShirt keeps the shopping experience focused, patriotic, and easy to browse. Our categories are built around daily routines, travel-friendly organization, simple outfit details, and thoughtful small gifts.', 'dawp'); ?>
                </p>
                <a href="<?php echo esc_url($shop_url); ?>" class="mt-8 inline-flex min-h-12 items-center justify-center rounded-md bg-[#102A43] px-6 text-sm font-bold text-white transition hover:bg-[#9B2C2C]">
                    <?php esc_html_e('Browse All Products', 'dawp'); ?>
                </a>
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                <?php foreach ($category_links as $category) : ?>
                    <a href="<?php echo esc_url($category['url']); ?>" class="group rounded-md border border-[#D6DEE8] bg-[#FBFCFE] p-5 transition hover:-translate-y-1 hover:bg-[#E8EEF5] hover:shadow-xl hover:shadow-[#9B2C2C]/10">
                        <span class="block font-heading text-lg font-extrabold text-[#102A43] transition group-hover:text-[#9B2C2C]"><?php echo esc_html($category['name']); ?></span>
                        <span class="mt-3 block text-sm leading-6 text-[#52657A]"><?php echo esc_html($category['copy']); ?></span>
                        <span class="mt-5 inline-flex text-sm font-bold text-[#B83232]">
                            <?php esc_html_e('Shop category', 'dawp'); ?>
                            <span class="ml-2" aria-hidden="true">-&gt;</span>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-[#F7F3EA] py-14 sm:py-20" aria-labelledby="about-standards-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[1.05fr_0.95fr] lg:items-center lg:px-8">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#B83232]"><?php esc_html_e('How We Choose', 'dawp'); ?></p>
                <h2 id="about-standards-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#102A43] sm:text-4xl">
                    <?php esc_html_e('A practical standard for every patriotic apparel essential.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-[#52657A]">
                    <?php esc_html_e('Our product direction is intentionally simple: useful items, clean presentation, and clear expectations. That helps customers understand what they are buying and how it fits into daily life.', 'dawp'); ?>
                </p>

                <div class="mt-7 grid gap-3">
                    <?php foreach ($standards as $standard) : ?>
                        <div class="flex gap-3 rounded-md border border-[#D6DEE8] bg-white px-4 py-4 text-sm font-bold leading-6 text-[#102A43]">
                            <span class="mt-1 h-2.5 w-2.5 shrink-0 rounded-full bg-[#C83E3E]" aria-hidden="true"></span>
                            <span><?php echo esc_html($standard); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <img <?php echo dawp_i0_img_attrs($stock_images['flat_lay'], [
                'width'  => 500,
                'height' => 625,
                'srcset' => [[300, 375], [400, 500], [500, 625], [750, 938]],
                'sizes'  => '(max-width: 1023px) 100vw, 460px',
            ]); ?> alt="<?php esc_attr_e('Patriotic apparel and American-inspired decor arranged neatly on a tabletop', 'dawp'); ?>" class="aspect-[4/5] w-full rounded-md object-cover shadow-sm">
        </div>
    </section>

    <section class="border-y border-[#D6DEE8] bg-[#FBFCFE] py-14 sm:py-20" aria-labelledby="about-care-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[0.85fr_1.15fr] lg:items-start">
                <div>
                    <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#B83232]"><?php esc_html_e('Customer Care', 'dawp'); ?></p>
                    <h2 id="about-care-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#102A43] sm:text-4xl">
                        <?php esc_html_e('Clear support for a smoother shopping experience.', 'dawp'); ?>
                    </h2>
                    <p class="mt-5 text-base leading-8 text-[#52657A]">
                        <?php esc_html_e('We want customers to know what to expect before and after they place an order. Product focus, shipping details, returns, and support information are kept visible and straightforward.', 'dawp'); ?>
                    </p>
                    <p class="mt-5 text-sm leading-7 text-[#52657A]">
                        <?php
                        echo wp_kses(
                            sprintf(
                                /* translators: 1: support email link, 2: business hours */
                                __('Need help? Email %1$s. Business hours: %2$s.', 'dawp'),
                                '<a class="font-bold text-[#9B2C2C] underline decoration-[#C83E3E]/40 underline-offset-4 transition hover:text-[#102A43]" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>',
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

                <div class="grid gap-4 md:grid-cols-3">
                    <?php foreach ($care_cards as $card) : ?>
                        <article class="rounded-md border border-[#D6DEE8] bg-white p-6 shadow-sm">
                            <div class="flex h-12 w-12 items-center justify-center rounded-md bg-[#E8EEF5] text-[#B83232]">
                                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <?php echo $render_icon($card['icon']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </svg>
                            </div>
                            <h3 class="mt-5 font-heading text-lg font-extrabold text-[#102A43]"><?php echo esc_html($card['title']); ?></h3>
                            <p class="mt-3 text-sm leading-6 text-[#52657A]"><?php echo esc_html($card['copy']); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</div>
