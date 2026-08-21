<?php
/**
 * About page for US Watch Store.
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

$support_email  = 'support@uswatchstore.com';
$business_hours = __('Monday - Friday, 9:00 AM - 6:00 PM EST', 'dawp');

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

$brand_pillars = [
    [
        'title' => __('Authenticity, Verified', 'dawp'),
        'copy'  => __('Every watch is inspected for authenticity and proper function before it ships — not just listed and shipped.', 'dawp'),
        'icon'  => 'shield',
    ],
    [
        'title' => __('All Four Watch Types', 'dawp'),
        'copy'  => __('Quartz, mechanical, smart, and digital — one curated store instead of a narrow niche, so you can compare and choose with confidence.', 'dawp'),
        'icon'  => 'watch',
    ],
    [
        'title' => __('Real US-Based Support', 'dawp'),
        'copy'  => __('Questions about sizing, movement care, or an order get answered by a real support team, Monday through Friday.', 'dawp'),
        'icon'  => 'mail',
    ],
];

$category_links = [
    [
        'name' => __('Quartz Watches', 'dawp'),
        'copy' => __('Battery-powered precision with reliable, low-maintenance timekeeping.', 'dawp'),
        'url'  => $lbq_category_url('quartz-watches'),
    ],
    [
        'name' => __('Mechanical Watches', 'dawp'),
        'copy' => __('Traditional automatic and hand-wound movements built for collectors.', 'dawp'),
        'url'  => $lbq_category_url('mechanical-watches'),
    ],
    [
        'name' => __('Smartwatches', 'dawp'),
        'copy' => __('Connected watches with fitness tracking, notifications, and apps.', 'dawp'),
        'url'  => $lbq_category_url('smartwatches'),
    ],
    [
        'name' => __('Digital Watches', 'dawp'),
        'copy' => __('Rugged, readable digital displays built for everyday durability.', 'dawp'),
        'url'  => $lbq_category_url('digital-watches'),
    ],
];

$standards = [
    __('Every watch is inspected for authenticity and proper function before it ships.', 'dawp'),
    __('Our collection stays focused on quartz, mechanical, smart, and digital watches — no unrelated categories.', 'dawp'),
    __('We stand behind every watch with a 2-year warranty against manufacturing and movement defects.', 'dawp'),
    __('Listings state movement type, water resistance, and materials clearly, so you know exactly what you are buying.', 'dawp'),
];

$care_cards = [
    [
        'title' => __('Customer Support', 'dawp'),
        'copy'  => sprintf(
            /* translators: %s: support email address */
            __('Questions about a watch or an order can be sent to %s.', 'dawp'),
            $support_email
        ),
        'icon'  => 'mail',
    ],
    [
        'title' => __('Fast US Shipping', 'dawp'),
        'copy'  => __('Orders are processed within 1-3 business days. Standard US shipping typically takes 3-7 business days after dispatch — free on orders over $75.', 'dawp'),
        'icon'  => 'truck',
    ],
    [
        'title' => __('30-Day Returns', 'dawp'),
        'copy'  => __('Not the right fit? Return an eligible watch within 30 days of delivery, in original condition.', 'dawp'),
        'icon'  => 'refresh',
    ],
];

$render_icon = static function ($icon) {
    $icons = [
        'mail'      => '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-10 6L2 7"/>',
        'truck'     => '<path d="M10 17h4V5H3v12h2"/><path d="M14 8h4l3 3v6h-3"/><circle cx="7" cy="17" r="2"/><circle cx="16" cy="17" r="2"/>',
        'refresh'   => '<path d="M20 12a8 8 0 0 1-13.66 5.66L4 15"/><path d="M4 20v-5h5"/><path d="M4 12A8 8 0 0 1 17.66 6.34L20 9"/><path d="M20 4v5h-5"/>',
        'watch'     => '<circle cx="12" cy="12" r="7"/><path d="M12 8.5V12l2.5 1.5"/><path d="M9.5 3h5l.4 2.5h-5.8L9.5 3Z"/><path d="M9.5 21h5l.4-2.5h-5.8L9.5 21Z"/><path d="M19 11v2h1.5v-2Z"/>',
        'gear'      => '<circle cx="12" cy="12" r="3"/><path d="M12 2v3M12 19v3M4.2 4.2l2.2 2.2M17.6 17.6l2.2 2.2M2 12h3M19 12h3M4.2 19.8l2.2-2.2M17.6 6.4l2.2-2.2"/>',
        'strap'     => '<rect x="7" y="7" width="10" height="10" rx="2"/><path d="M9 7 8 3h8l-1 4"/><path d="M9 17l-1 4h8l-1-4"/>',
        'smartwatch'=> '<rect x="6" y="6" width="12" height="12" rx="3.5"/><path d="M9 4h6M9 20h6"/><circle cx="15.5" cy="8.5" r="1" fill="currentColor" stroke="none"/>',
        'shield'    => '<path d="M12 3 5 6v5c0 5 3 8.5 7 10 4-1.5 7-5 7-10V6l-7-3Z"/><path d="m9 12 2 2 4-4.5"/>',
        'magnifier' => '<circle cx="10.5" cy="10.5" r="6.5"/><circle cx="10.5" cy="10.5" r="3"/><path d="M10.5 8.7v1.8l1.2.9"/><path d="m19.5 19.5-3.8-3.8"/>',
    ];

    return $icons[$icon] ?? $icons['watch'];
};

/**
 * Decorative gradient panel used in place of missing product photography.
 * See .plans/site.md §6 Imagery Policy.
 */
$render_visual = static function ($icon, $classes, $icon_size = '42%') use ($render_icon) {
    printf(
        '<div class="%1$s flex items-center justify-center shadow-sm" style="background: linear-gradient(135deg, var(--color-accent, #1F4E79), var(--color-accent-hover, #14324D));" aria-hidden="true"><svg viewBox="0 0 24 24" width="%2$s" height="%2$s" fill="none" stroke="#FFFFFF" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" style="max-width:9rem;max-height:9rem;">%3$s</svg></div>',
        esc_attr($classes),
        esc_attr($icon_size),
        $render_icon($icon) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    );
};
?>

<div class="bg-white text-[#10151C]">
    <section class="relative isolate overflow-hidden border-b border-[#E2E8F0] bg-[#FFFFFF] py-12 sm:py-16 lg:py-20" aria-labelledby="about-hero-title">
        <div class="absolute inset-x-0 top-0 -z-10 h-40 bg-[#EEF2F6]" aria-hidden="true"></div>

        <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[1.02fr_0.98fr] lg:items-center lg:gap-12 lg:px-8">
            <div class="max-w-2xl">
                <p class="inline-flex rounded-md border border-[#E2E8F0] bg-white px-4 py-2 text-xs font-extrabold uppercase tracking-[0.14em] text-[#5B7A99] shadow-sm">
                    <?php esc_html_e('About US Watch Store', 'dawp'); ?>
                </p>
                <h1 id="about-hero-title" class="mt-5 font-heading text-4xl font-extrabold leading-tight text-[#10151C] sm:text-5xl lg:text-6xl">
                    <?php esc_html_e('Precision timepieces, chosen with the same care you\'d want if it were on your own wrist.', 'dawp'); ?>
                </h1>
                <p class="mt-5 max-w-xl text-base leading-8 text-[#64748B] sm:text-lg">
                    <?php esc_html_e('US Watch Store curates quartz, mechanical, smart, and digital watches for everyday wear, gifting, and collecting. Every watch is inspected for authenticity and backed by a real warranty — no guesswork, no inflated markups.', 'dawp'); ?>
                </p>

                <div class="mt-7 grid max-w-2xl gap-3 sm:grid-cols-3">
                    <div class="flex items-start gap-3 rounded-md border border-[#E2E8F0] bg-white p-4 shadow-sm">
                        <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-[#1F4E79]" aria-hidden="true"></span>
                        <span class="text-sm font-bold leading-6 text-[#10151C]"><?php esc_html_e('Every watch inspected before it ships', 'dawp'); ?></span>
                    </div>
                    <div class="flex items-start gap-3 rounded-md border border-[#E2E8F0] bg-white p-4 shadow-sm">
                        <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-[#1F4E79]" aria-hidden="true"></span>
                        <span class="text-sm font-bold leading-6 text-[#10151C]"><?php esc_html_e('All four watch types, one trusted store', 'dawp'); ?></span>
                    </div>
                    <div class="flex items-start gap-3 rounded-md border border-[#E2E8F0] bg-white p-4 shadow-sm">
                        <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-[#1F4E79]" aria-hidden="true"></span>
                        <span class="text-sm font-bold leading-6 text-[#10151C]"><?php esc_html_e('2-year warranty, 30-day returns', 'dawp'); ?></span>
                    </div>
                </div>

                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#1F4E79] px-6 text-sm font-bold text-white transition hover:bg-[#10151C]">
                        <?php esc_html_e('Shop Watches', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#1F4E79] bg-white px-6 text-sm font-bold text-[#14324D] transition hover:bg-[#E6EDF5]">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <figure class="relative">
                <?php $render_visual('watch', 'aspect-[5/4] w-full rounded-md lg:aspect-[4/5]'); ?>
                <figcaption class="mt-4 rounded-md border border-[#E2E8F0] bg-white p-4 text-sm font-bold leading-6 text-[#10151C] shadow-sm">
                    <?php esc_html_e('Built for people who want a timepiece they can trust — not just a listing that looks good in a photo.', 'dawp'); ?>
                </figcaption>
            </figure>
        </div>
    </section>

    <section class="bg-[#FFFFFF] py-14 sm:py-20" aria-labelledby="about-story-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:items-center lg:px-8">
            <div class="grid gap-4 sm:grid-cols-5">
                <?php $render_visual('gear', 'aspect-[4/5] w-full rounded-md sm:col-span-3'); ?>
                <div class="grid gap-4 sm:col-span-2">
                    <?php $render_visual('smartwatch', 'aspect-square w-full rounded-md', '38%'); ?>
                    <?php $render_visual('strap', 'aspect-square w-full rounded-md', '38%'); ?>
                </div>
            </div>

            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#5B7A99]"><?php esc_html_e('Our Story', 'dawp'); ?></p>
                <h2 id="about-story-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#10151C] sm:text-4xl">
                    <?php esc_html_e('We built the store we wished existed when shopping for a watch online.', 'dawp'); ?>
                </h2>
                <div class="mt-5 space-y-4 text-base leading-8 text-[#64748B]">
                    <p>
                        <?php esc_html_e('US Watch Store started with a simple frustration: department-store watch counters mark up prices with no explanation, and most online sellers won\'t tell you where a watch actually comes from or whether it has been checked for quality. We wanted a place where you could buy a quartz, mechanical, smart, or digital watch and know exactly what you were getting.', 'dawp'); ?>
                    </p>
                    <p>
                        <?php esc_html_e('So we built exactly that — a curated selection across all four watch types, every piece inspected for authenticity and function before it ships, backed by a 2-year warranty and real US-based support. No inflated markups, no guesswork.', 'dawp'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#EEF2F6] py-14 sm:py-20" aria-labelledby="about-pillars-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#5B7A99]"><?php esc_html_e('What We Stand For', 'dawp'); ?></p>
                <h2 id="about-pillars-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#10151C] sm:text-4xl">
                    <?php esc_html_e('A curated watch store, not a warehouse of random listings.', 'dawp'); ?>
                </h2>
                <p class="mt-4 text-base leading-7 text-[#64748B]">
                    <?php esc_html_e('Every watch we sell is chosen and checked against the same standard, across every category.', 'dawp'); ?>
                </p>
            </div>

            <div class="mt-10 grid gap-5 md:grid-cols-3">
                <?php foreach ($brand_pillars as $pillar) : ?>
                    <article class="rounded-md border border-[#E2E8F0] bg-white p-6 shadow-sm transition hover:border-[#1F4E79] hover:shadow-sm">
                        <div class="flex h-12 w-12 items-center justify-center rounded-md bg-[#E6EDF5] text-[#5B7A99]">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <?php echo $render_icon($pillar['icon']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </svg>
                        </div>
                        <h3 class="mt-5 font-heading text-xl font-extrabold text-[#10151C]"><?php echo esc_html($pillar['title']); ?></h3>
                        <p class="mt-3 text-sm leading-6 text-[#64748B]"><?php echo esc_html($pillar['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-white py-14 sm:py-20" aria-labelledby="about-categories-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.88fr_1.12fr] lg:items-start lg:px-8">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#5B7A99]"><?php esc_html_e('Our Product Focus', 'dawp'); ?></p>
                <h2 id="about-categories-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#10151C] sm:text-4xl">
                    <?php esc_html_e('A focused watch store, not a random marketplace.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-[#64748B]">
                    <?php esc_html_e('US Watch Store keeps the shopping experience focused on one thing: watches worth wearing. Our four categories cover everyday quartz reliability, mechanical craftsmanship, connected smartwatches, and rugged digital durability.', 'dawp'); ?>
                </p>
                <a href="<?php echo esc_url($shop_url); ?>" class="mt-8 inline-flex min-h-12 items-center justify-center rounded-md bg-[#10151C] px-6 text-sm font-bold text-white transition hover:bg-[#14324D]">
                    <?php esc_html_e('Browse All Watches', 'dawp'); ?>
                </a>
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                <?php foreach ($category_links as $category) : ?>
                    <a href="<?php echo esc_url($category['url']); ?>" class="group rounded-md border border-[#E2E8F0] bg-[#FFFFFF] p-5 transition hover:border-[#1F4E79] hover:bg-[#E6EDF5] hover:shadow-sm">
                        <span class="block font-heading text-lg font-extrabold text-[#10151C] transition group-hover:text-[#14324D]"><?php echo esc_html($category['name']); ?></span>
                        <span class="mt-3 block text-sm leading-6 text-[#64748B]"><?php echo esc_html($category['copy']); ?></span>
                        <span class="mt-5 inline-flex text-sm font-bold text-[#5B7A99]">
                            <?php esc_html_e('Shop category', 'dawp'); ?>
                            <span class="ml-2" aria-hidden="true">-&gt;</span>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-[#EEF2F6] py-14 sm:py-20" aria-labelledby="about-standards-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[1.05fr_0.95fr] lg:items-center lg:px-8">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#5B7A99]"><?php esc_html_e('How We Choose', 'dawp'); ?></p>
                <h2 id="about-standards-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#10151C] sm:text-4xl">
                    <?php esc_html_e('A practical standard for every watch we sell.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-[#64748B]">
                    <?php esc_html_e('Our selection process is intentionally strict: real inspection, clear specs, and no exaggerated claims. That is what lets you buy with confidence.', 'dawp'); ?>
                </p>

                <div class="mt-7 grid gap-3">
                    <?php foreach ($standards as $standard) : ?>
                        <div class="flex gap-3 rounded-md border border-[#E2E8F0] bg-white px-4 py-4 text-sm font-bold leading-6 text-[#10151C]">
                            <span class="mt-1 h-2.5 w-2.5 shrink-0 rounded-full bg-[#1F4E79]" aria-hidden="true"></span>
                            <span><?php echo esc_html($standard); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <?php $render_visual('magnifier', 'aspect-[4/5] w-full rounded-md'); ?>
        </div>
    </section>

    <section class="border-y border-[#E2E8F0] bg-[#FFFFFF] py-14 sm:py-20" aria-labelledby="about-care-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[0.85fr_1.15fr] lg:items-start">
                <div>
                    <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#5B7A99]"><?php esc_html_e('Customer Care', 'dawp'); ?></p>
                    <h2 id="about-care-title" class="mt-4 font-heading text-3xl font-extrabold leading-tight text-[#10151C] sm:text-4xl">
                        <?php esc_html_e('Clear support before and after you buy.', 'dawp'); ?>
                    </h2>
                    <p class="mt-5 text-base leading-8 text-[#64748B]">
                        <?php esc_html_e('We want you to know exactly what to expect — sizing, water resistance, warranty coverage, shipping — before you check out and after your watch arrives.', 'dawp'); ?>
                    </p>
                    <p class="mt-5 text-sm leading-7 text-[#64748B]">
                        <?php
                        echo wp_kses(
                            sprintf(
                                /* translators: 1: support email link, 2: business hours */
                                __('Need help? Email %1$s. Business hours: %2$s.', 'dawp'),
                                '<a class="font-bold text-[#14324D] underline decoration-[#1F4E79]/40 underline-offset-4 transition hover:text-[#10151C]" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>',
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
                        <article class="rounded-md border border-[#E2E8F0] bg-white p-6 shadow-sm">
                            <div class="flex h-12 w-12 items-center justify-center rounded-md bg-[#E6EDF5] text-[#5B7A99]">
                                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <?php echo $render_icon($card['icon']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </svg>
                            </div>
                            <h3 class="mt-5 font-heading text-lg font-extrabold text-[#10151C]"><?php echo esc_html($card['title']); ?></h3>
                            <p class="mt-3 text-sm leading-6 text-[#64748B]"><?php echo esc_html($card['copy']); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</div>
