<?php
/**
 * About page for US Watch Store.
 *
 * Hallmark · genre: modern-minimal · macrostructure: Long Document (continuous
 * narrative core, restrained supporting sections, no repeated eyebrow tics)
 * nav: N12 · footer: Ft1 · design-system: .plans/design_system.md (locked)
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

$theme_img_uri  = get_template_directory_uri() . '/assets/img';
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
        'title' => __('We Build It, We Back It', 'dawp'),
        'copy'  => __('USWS is our own watch line. We are responsible for how every watch is designed, assembled, regulated, and warrantied.', 'dawp'),
        'icon'  => 'gear',
    ],
    [
        'title' => __('One Movement, Two Styles', 'dawp'),
        'copy'  => __('Every USWS watch runs the same self-winding automatic movement. Classic and Elegant are two design directions, not two tiers of quality.', 'dawp'),
        'icon'  => 'watch',
    ],
    [
        'title' => __('Real US-Based Support', 'dawp'),
        'copy'  => __('Questions about sizing, winding, servicing, or an order get answered by a real support team, Monday through Friday.', 'dawp'),
        'icon'  => 'mail',
    ],
];

$category_links = [
    [
        'name' => __('Classic Style', 'dawp'),
        'copy' => __('Everyday automatics with legible dials and understated steel cases.', 'dawp'),
        'url'  => $lbq_category_url('classic-style'),
    ],
    [
        'name' => __('Elegant Style', 'dawp'),
        'copy' => __('Dress automatics with slim profiles, polished finishing, and refined detailing.', 'dawp'),
        'url'  => $lbq_category_url('elegant-style'),
    ],
];

$standards = [
    __('Every USWS watch is assembled by our own team and regulated on a timing machine before it ships.', 'dawp'),
    __('We make one type of watch: a self-winding automatic, in two styles - Classic and Elegant.', 'dawp'),
    __('Each watch is covered by a 2-year warranty against movement and assembly defects.', 'dawp'),
    __('Product pages state case size, water resistance, power reserve, and materials clearly, so you know exactly what you are buying.', 'dawp'),
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
        'copy'  => __('Orders are processed within 1-3 business days. Standard US shipping typically takes 3-7 business days after dispatch - free on all orders.', 'dawp'),
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
 * Product photo panel for supporting imagery sections.
 */
$render_visual = static function ($image_file, $classes, $alt) use ($theme_img_uri) {
    printf(
        '<div class="%1$s overflow-hidden rounded-md border border-border bg-surface-alt shadow-card"><img src="%2$s" alt="%3$s" class="h-full w-full object-contain p-6 sm:p-8" loading="lazy"></div>',
        esc_attr($classes),
        esc_url($theme_img_uri . '/' . $image_file),
        esc_attr($alt)
    );
};
?>

<div class="bg-background text-foreground">
    <section class="relative isolate overflow-hidden border-b border-border bg-background py-14 sm:py-20" aria-labelledby="about-hero-title">
        <div class="absolute inset-x-0 top-0 -z-10 h-40 bg-surface" aria-hidden="true"></div>

        <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[1.02fr_0.98fr] lg:items-center lg:gap-12 lg:px-8">
            <div class="max-w-2xl">
                <p class="inline-flex rounded-sm border border-border bg-surface px-4 py-2 text-xs font-extrabold uppercase tracking-[0.14em] text-accent-blush">
                    <?php esc_html_e('About USWS by US Watch Store', 'dawp'); ?>
                </p>
                <h1 id="about-hero-title" class="mt-5 font-heading text-4xl font-extrabold leading-tight text-foreground sm:text-5xl lg:text-6xl">
                    <?php esc_html_e('One automatic watch, built by us, in two styles.', 'dawp'); ?>
                </h1>
                <p class="mt-5 max-w-xl text-base leading-8 text-muted sm:text-lg">
                    <?php esc_html_e('USWS is the in-house watch line from US Watch Store: one self-winding automatic movement, two styles - Classic and Elegant. Every watch is designed, assembled, regulated, and inspected by us, then backed by a 2-year warranty.', 'dawp'); ?>
                </p>

                <div class="mt-7 grid max-w-2xl gap-3 sm:grid-cols-3">
                    <div class="flex items-start gap-3 rounded-sm border border-border bg-surface p-4">
                        <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-accent" aria-hidden="true"></span>
                        <span class="text-sm font-bold leading-6 text-foreground"><?php esc_html_e('Designed and assembled by USWS', 'dawp'); ?></span>
                    </div>
                    <div class="flex items-start gap-3 rounded-sm border border-border bg-surface p-4">
                        <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-accent" aria-hidden="true"></span>
                        <span class="text-sm font-bold leading-6 text-foreground"><?php esc_html_e('Self-winding automatic - no batteries', 'dawp'); ?></span>
                    </div>
                    <div class="flex items-start gap-3 rounded-sm border border-border bg-surface p-4">
                        <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-accent" aria-hidden="true"></span>
                        <span class="text-sm font-bold leading-6 text-foreground"><?php esc_html_e('2-year warranty, 30-day returns', 'dawp'); ?></span>
                    </div>
                </div>

                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center whitespace-nowrap rounded-sm bg-accent px-6 text-sm font-bold text-white transition hover:bg-accent-hover">
                        <?php esc_html_e('Shop Watches', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-12 items-center justify-center whitespace-nowrap rounded-sm border border-accent bg-background px-6 text-sm font-bold text-accent-hover transition hover:bg-surface-alt">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <figure class="relative">
                <?php $render_visual('cat/elegant.webp', 'aspect-[5/4] w-full rounded-md lg:aspect-[4/5]', __('A USWS automatic watch, Elegant style', 'dawp')); ?>
                <figcaption class="mt-4 rounded-sm border border-border bg-surface p-4 text-sm font-bold leading-6 text-foreground">
                    <?php esc_html_e('One movement, finished two ways - a watch you can wear every day and dress up when it counts.', 'dawp'); ?>
                </figcaption>
            </figure>
        </div>
    </section>

    <!-- Our story - continuous prose, Long Document core -->
    <section class="bg-background py-16 sm:py-24" aria-labelledby="about-story-title">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <h2 id="about-story-title" class="font-heading text-3xl font-extrabold leading-tight text-foreground sm:text-4xl">
                <?php esc_html_e('A straightforward automatic watch, sold direct.', 'dawp'); ?>
            </h2>
            <div class="mt-6 space-y-5 text-lg leading-8 text-foreground-muted">
                <p>
                    <?php esc_html_e('USWS started from one idea: a well-made self-winding automatic watch should not cost what most brands charge for the name on the dial. So we built our own.', 'dawp'); ?>
                </p>
                <p>
                    <?php esc_html_e('We design the watch, choose the movement, assemble it, regulate it on a timing machine, and inspect it - then sell it directly, with a 2-year warranty and real support behind it. Two styles, Classic and Elegant, both running the same self-winding automatic movement. No inflated markups, no story you can\'t verify.', 'dawp'); ?>
                </p>
            </div>
        </div>
    </section>

    <!-- What we stand for - divided list, not a 3-col card grid -->
    <section class="bg-surface py-14 sm:py-20" aria-labelledby="about-pillars-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-8 lg:grid-cols-[0.7fr_1.3fr] lg:items-start lg:gap-14">
                <h2 id="about-pillars-title" class="font-heading text-3xl font-extrabold leading-tight text-foreground sm:text-4xl">
                    <?php esc_html_e('One watch line, made and stood behind by us.', 'dawp'); ?>
                </h2>
                <div class="grid divide-y divide-border border-t border-border sm:grid-cols-3 sm:divide-x sm:divide-y-0 sm:border-b">
                    <?php foreach ($brand_pillars as $pillar) : ?>
                        <div class="flex flex-col gap-3 py-6 sm:px-6 sm:py-0 sm:first:pl-0 sm:last:pr-0">
                            <div class="flex h-11 w-11 items-center justify-center rounded-sm bg-accent-soft text-accent">
                                <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <?php echo $render_icon($pillar['icon']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </svg>
                            </div>
                            <h3 class="font-heading text-lg font-extrabold text-foreground"><?php echo esc_html($pillar['title']); ?></h3>
                            <p class="text-sm leading-6 text-foreground-muted"><?php echo esc_html($pillar['copy']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-background py-14 sm:py-20" aria-labelledby="about-categories-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.88fr_1.12fr] lg:items-start lg:px-8">
            <div>
                <h2 id="about-categories-title" class="font-heading text-3xl font-extrabold leading-tight text-foreground sm:text-4xl">
                    <?php esc_html_e('Two styles, one movement.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-foreground-muted">
                    <?php esc_html_e('USWS is deliberately narrow. Classic is built for daily wear - legible, understated, tough enough to ignore. Elegant is the dressed-up version - slimmer, polished, made for the occasions that ask for it. Same self-winding automatic movement inside both.', 'dawp'); ?>
                </p>
                <a href="<?php echo esc_url($shop_url); ?>" class="mt-8 inline-flex min-h-12 items-center justify-center whitespace-nowrap rounded-sm bg-foreground px-6 text-sm font-bold text-white transition hover:bg-accent-hover">
                    <?php esc_html_e('Browse All Watches', 'dawp'); ?>
                </a>
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                <?php foreach ($category_links as $category) : ?>
                    <a href="<?php echo esc_url($category['url']); ?>" class="group rounded-md border border-border bg-background p-5 transition hover:border-accent hover:bg-surface-alt hover:shadow-card">
                        <span class="block font-heading text-lg font-extrabold text-foreground transition group-hover:text-accent-hover"><?php echo esc_html($category['name']); ?></span>
                        <span class="mt-3 block text-sm leading-6 text-foreground-muted"><?php echo esc_html($category['copy']); ?></span>
                        <span class="mt-5 inline-flex text-sm font-bold text-accent-blush">
                            <?php esc_html_e('Shop category', 'dawp'); ?>
                            <span class="ml-2" aria-hidden="true">→</span>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-surface py-14 sm:py-20" aria-labelledby="about-standards-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[1.05fr_0.95fr] lg:items-center lg:px-8">
            <div>
                <h2 id="about-standards-title" class="font-heading text-3xl font-extrabold leading-tight text-foreground sm:text-4xl">
                    <?php esc_html_e('What we hold every USWS watch to.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-foreground-muted">
                    <?php esc_html_e('Because we assemble the watch, the standard is ours to keep: real regulation, honest specs, and no claims we can\'t stand behind.', 'dawp'); ?>
                </p>

                <div class="mt-7 grid gap-3">
                    <?php foreach ($standards as $standard) : ?>
                        <div class="flex gap-3 rounded-sm border border-border bg-background px-4 py-4 text-sm font-bold leading-6 text-foreground">
                            <span class="mt-1 h-2.5 w-2.5 shrink-0 rounded-full bg-accent" aria-hidden="true"></span>
                            <span><?php echo esc_html($standard); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <?php $render_visual('cat/classic.webp', 'aspect-[4/5] w-full rounded-md', __('A USWS automatic watch, Classic style', 'dawp')); ?>
        </div>
    </section>

    <!-- Customer care - asymmetric: one wide card + two stacked -->
    <section class="border-y border-border bg-background py-14 sm:py-20" aria-labelledby="about-care-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 id="about-care-title" class="font-heading text-3xl font-extrabold leading-tight text-foreground sm:text-4xl">
                <?php esc_html_e('Clear support before and after you buy.', 'dawp'); ?>
            </h2>
            <p class="mt-5 max-w-2xl text-base leading-8 text-foreground-muted">
                <?php esc_html_e('We want you to know exactly what to expect - sizing, water resistance, warranty coverage, shipping - before you check out and after your watch arrives.', 'dawp'); ?>
            </p>
            <p class="mt-5 max-w-2xl text-sm leading-7 text-foreground-muted">
                <?php
                echo wp_kses(
                    sprintf(
                        /* translators: 1: support email link, 2: business hours */
                        __('Need help? Email %1$s. Business hours: %2$s.', 'dawp'),
                        '<a class="font-bold text-accent-hover underline decoration-accent/40 underline-offset-4 transition hover:text-foreground" href="mailto:' . esc_attr($support_email) . '">' . esc_html($support_email) . '</a>',
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

            <div class="mt-10 grid gap-4 lg:grid-cols-3">
                <?php foreach ($care_cards as $i => $card) : ?>
                    <article class="rounded-md border border-border bg-surface p-6 <?php echo 0 === $i ? 'lg:col-span-2' : ''; ?>">
                        <div class="flex h-12 w-12 items-center justify-center rounded-sm bg-accent-soft text-accent-blush">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <?php echo $render_icon($card['icon']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </svg>
                        </div>
                        <h3 class="mt-5 font-heading text-lg font-extrabold text-foreground"><?php echo esc_html($card['title']); ?></h3>
                        <p class="mt-3 max-w-md text-sm leading-6 text-foreground-muted"><?php echo esc_html($card['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>
