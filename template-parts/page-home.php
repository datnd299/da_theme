<?php
/**
 * Homepage- WristUnion.
 *
 * "Spec sheet" layout (see design brief): left-aligned, hairline dividers,
 * real measurements everywhere, no shadows, one dark block for the hero and
 * one mid-page. Reading copy is set in Newsreader (.font-serif); labels,
 * specs and buttons stay in Archivo.
 *
 * Product grids read the live WooCommerce catalog. Studio photography lives in
 * assets/img/ (watch-*.avif); the store owner can swap these for real bench
 * photography as it is shot.
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

$dawp_cat_link = static function ($slug) use ($shop_url) {
    return function_exists('dawp_product_category_url') ? dawp_product_category_url($slug) : $shop_url;
};

/**
 * Published, catalog-visible products for the homepage grid.
 */
function dawp_home_product_query(array $args) {
    return get_posts(wp_parse_args($args, [
        'post_type'   => 'product',
        'post_status' => 'publish',
        'tax_query'   => [[
            'taxonomy' => 'product_visibility',
            'field'    => 'name',
            'terms'    => 'exclude-from-catalog',
            'operator' => 'NOT IN',
        ]],
    ]));
}

$ready_posts = dawp_home_product_query([
    'posts_per_page' => 8,
    'meta_key'       => 'total_sales',
    'orderby'        => 'meta_value_num',
    'order'          => 'DESC',
]);

/**
 * One product card for the homepage grid- image, name, price, stock.
 * Case dimensions are deliberately not shown here; the full spec sheet lives
 * on each product page.
 */
function dawp_home_product_card($post_id, $is_first = false) {
    $product = wc_get_product($post_id);
    if (!$product || !$product->is_visible()) {
        return;
    }

    $badge_stock = $product->is_in_stock()
        ? __('In stock', 'dawp')
        : __('Sold out', 'dawp');

    $image_id   = $product->get_image_id();
    $image_html = '';
    if ($image_id) {
        $image_url = wp_get_attachment_image_url($image_id, 'full');
        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true) ?: $product->get_name();
        $attrs = function_exists('dawp_i0_img_attrs') ? dawp_i0_img_attrs($image_url, [
            'width'   => 480,
            'height'  => 600,
            'srcset'  => [[240, 300], [360, 450], [480, 600], [720, 900]],
            'sizes'   => '(min-width: 1024px) 22vw, (min-width: 640px) 45vw, 46vw',
            'loading' => $is_first ? 'eager' : 'lazy',
        ]) : 'loading="lazy"';
        $image_html = sprintf('<img alt="%s" class="h-full w-full object-cover" %s>', esc_attr($image_alt), $attrs);
    }
    ?>
    <li class="border-t border-line pt-4">
        <a href="<?php echo esc_url(get_permalink($post_id)); ?>" class="block">
            <div class="aspect-[4/5] overflow-hidden bg-surface">
                <?php echo $image_html; ?>
            </div>
            <div class="mt-3">
                <h3 class="font-heading text-[15px] font-semibold text-foreground"><?php echo esc_html($product->get_name()); ?></h3>
            </div>
            <p class="wu-tnum mt-1 text-sm font-semibold text-accent"><?php echo wp_kses_post($product->get_price_html()); ?></p>
            <p class="mt-1 text-[11px] font-medium uppercase tracking-label <?php echo $product->is_in_stock() ? 'text-success' : 'text-muted'; ?>">
                <?php echo esc_html($badge_stock); ?>
            </p>
        </a>
    </li>
    <?php
}

$categories = [
    [
        'title' => __('Field & Everyday', 'dawp'),
        'desc'  => __('Worn every day. Tough, legible, easy to pair.', 'dawp'),
        'image' => 'assets/img/watch-field.avif',
        'url'   => $dawp_cat_link('field-everyday'),
    ],
    [
        'title' => __('Heritage', 'dawp'),
        'desc'  => __('Classic proportions and restrained dials, made to sit under a cuff.', 'dawp'),
        'image' => 'assets/img/watch-heritage.avif',
        'url'   => $dawp_cat_link('heritage'),
    ],
];

$build_steps = [
    ['n' => '1', 'title' => __('Design & inspect', 'dawp'), 'copy' => __('Each model is drawn in-house. Every component- movement, case, crystal, hands- is checked by hand before it goes into a watch.', 'dawp'), 'image' => 'assets/img/watch-classic.avif'],
    ['n' => '2', 'title' => __('Assemble & case up', 'dawp'), 'copy' => __('Dial and hands fitted under a loupe, movement cased, gaskets seated, back torqued to spec.', 'dawp'), 'image' => 'assets/img/watch-chrono.avif'],
    ['n' => '3', 'title' => __('Regulate, test, pack', 'dawp'), 'copy' => __('Timed over several positions, pressure-tested for water resistance, then packed and shipped.', 'dawp'), 'image' => 'assets/img/watch-field.avif'],
];

$spec_rows = [
    [__('Movement', 'dawp'),         __('Automatic, self-winding- hacking seconds, hand-wind, ~40h power reserve', 'dawp')],
    [__('Case', 'dawp'),             __('316L stainless steel, brushed', 'dawp')],
    [__('Crystal', 'dawp'),          __('Sapphire, flat, inner anti-reflective coating', 'dawp')],
    [__('Water resistance', 'dawp'), __('100 m- rain, hand washing, swimming', 'dawp')],
    [__('Warranty', 'dawp'),         __('2-year WristUnion workshop warranty', 'dawp')],
];

// Real approved product reviews only- never fabricated. Section hides if none.
$home_reviews = get_comments([
    'post_type'   => 'product',
    'status'      => 'approve',
    'number'      => 4,
    'meta_key'    => 'rating',
    'meta_value'  => '4',
    'meta_compare' => '>=',
    'type'        => 'review',
]);
?>

<!-- S1 · Hero ------------------------------------------------------------- -->
<section class="bg-primary text-white">
    <div class="mx-auto max-w-[1320px] px-8 py-14 sm:px-14 lg:py-20">
        <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">
            <div class="max-w-xl">
                <p class="text-[11px] font-medium uppercase tracking-brand text-accent"><?php esc_html_e('WristUnion- designed & built in-house', 'dawp'); ?></p>
                <h1 class="mt-4 font-heading text-[clamp(2.25rem,5vw,3.5rem)] font-bold leading-[1.05]">
                    <?php esc_html_e('Mechanical watches, designed and built by WristUnion.', 'dawp'); ?>
                </h1>
                <p class="mt-5 font-serif text-[17px] leading-8 text-white/80">
                    <?php esc_html_e('Every WristUnion watch is drawn in-house and assembled by hand- automatic movement, 316L steel, sapphire crystal. A short line of Field & Everyday and Heritage models.', 'dawp'); ?>
                </p>
                <div class="mt-8 flex flex-wrap items-center gap-x-6 gap-y-3">
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex h-12 items-center justify-center border border-white bg-white px-8 text-xs font-semibold uppercase tracking-button text-primary transition hover:bg-transparent hover:text-white">
                        <?php esc_html_e('Shop watches', 'dawp'); ?>
                    </a>
                    <a href="#how-its-made" class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-button text-white transition hover:text-accent">
                        <?php esc_html_e('How it\'s made', 'dawp'); ?>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                    </a>
                </div>
            </div>

            <figure class="lg:order-last">
                <div class="aspect-[4/3] overflow-hidden bg-primary-soft">
                    <img src="<?php echo esc_url(get_theme_file_uri('assets/img/watch-chrono.avif')); ?>" alt="<?php esc_attr_e('A WristUnion automatic chronograph on a steel bracelet', 'dawp'); ?>" width="900" height="900" class="h-full w-full object-cover" loading="eager" fetchpriority="high" decoding="async">
                </div>
                <figcaption class="mt-2 flex items-center gap-2 text-[11px] uppercase tracking-label text-white/55">
                    <span aria-hidden="true">├</span>
                    <span><?php esc_html_e('Assembled & pressure-tested by hand', 'dawp'); ?></span>
                    <span class="h-px flex-1 bg-white/25"></span>
                    <span aria-hidden="true">┤</span>
                </figcaption>
            </figure>
        </div>
    </div>
</section>

<!-- S2 · Trust bar ------------------------------------------------------- -->
<section class="border-b border-line bg-surface">
    <div class="mx-auto grid max-w-[1320px] grid-cols-2 divide-x divide-line px-8 sm:grid-cols-3 sm:px-14 lg:grid-cols-5">
        <?php
        $trust = [
            __('Free US shipping, every order', 'dawp'),
            __('2-year workshop warranty', 'dawp'),
            __('30-day returns', 'dawp'),
            __('Sapphire crystal', 'dawp'),
            __('Automatic movement', 'dawp'),
        ];
        foreach ($trust as $i => $t) : ?>
            <p class="flex min-h-[56px] items-center justify-center px-3 text-center text-[11px] font-medium uppercase tracking-label text-foreground-muted <?php echo $i >= 3 ? 'border-t border-line sm:border-t-0' : ''; ?> <?php echo $i === 4 ? 'col-span-2 sm:col-span-1' : ''; ?>">
                <?php echo esc_html($t); ?>
            </p>
        <?php endforeach; ?>
    </div>
</section>

<!-- S3 · Categories ------------------------------------------------------- -->
<section class="mx-auto max-w-[1320px] px-8 py-20 sm:px-14 lg:py-24">
    <div class="flex items-end justify-between gap-6 border-b border-line pb-4">
        <h2 class="font-heading text-[clamp(1.75rem,3.5vw,2.125rem)] font-semibold leading-tight"><?php esc_html_e('The collection', 'dawp'); ?></h2>
        <a href="<?php echo esc_url($shop_url); ?>" class="hidden shrink-0 text-xs font-semibold uppercase tracking-button text-blued transition hover:text-blued-hover sm:inline"><?php esc_html_e('All watches', 'dawp'); ?></a>
    </div>

    <div class="mt-8 grid gap-px bg-line sm:grid-cols-2">
        <?php foreach ($categories as $cat) : ?>
            <a href="<?php echo esc_url($cat['url']); ?>" class="group flex flex-col bg-surface text-foreground p-4 sm:p-6">
                <div class="aspect-[4/3] overflow-hidden bg-surface-alt">
                    <img src="<?php echo esc_url(get_theme_file_uri($cat['image'])); ?>" alt="<?php echo esc_attr($cat['title']); ?>" width="560" height="420" class="h-full w-full object-cover" loading="lazy" decoding="async">
                </div>
                <h3 class="mt-4 font-heading text-lg font-semibold"><?php echo esc_html($cat['title']); ?></h3>
                <p class="mt-1 font-serif text-sm leading-6 text-foreground-muted"><?php echo esc_html($cat['desc']); ?></p>
                <span class="mt-3 inline-flex items-center gap-1.5 text-[11px] font-semibold uppercase tracking-label text-blued">
                    <?php esc_html_e('Shop', 'dawp'); ?>
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                </span>
            </a>
        <?php endforeach; ?>
    </div>
</section>

<!-- S4 · How it's made ---------------------------------------------------- -->
<section id="how-its-made" class="scroll-mt-24 border-y border-line bg-surface">
    <div class="mx-auto max-w-[1320px] px-8 py-20 sm:px-14 lg:py-24">
        <h2 class="font-heading text-[clamp(1.75rem,3.5vw,2.125rem)] font-semibold leading-tight"><?php esc_html_e('How it\'s made', 'dawp'); ?></h2>
        <p class="mt-2 max-w-xl font-serif text-[15px] leading-7 text-foreground-muted"><?php esc_html_e('Every watch passes through the same three stages, by hand, on the same bench.', 'dawp'); ?></p>

        <div class="mt-10 grid gap-px bg-line md:grid-cols-3">
            <?php foreach ($build_steps as $step) : ?>
                <div class="bg-surface p-5">
                    <div class="aspect-[3/2] overflow-hidden bg-surface-alt">
                        <img src="<?php echo esc_url(get_theme_file_uri($step['image'])); ?>" alt="<?php echo esc_attr($step['title']); ?>" width="480" height="320" class="h-full w-full object-cover" loading="lazy" decoding="async">
                    </div>
                    <p class="wu-tnum mt-4 text-xs font-semibold uppercase tracking-label text-accent"><?php echo esc_html($step['n']); ?> · <?php echo esc_html($step['title']); ?></p>
                    <p class="mt-2 font-serif text-sm leading-6 text-foreground-muted"><?php echo esc_html($step['copy']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- S6 · Ready to ship ------------------------------------------------- -->
<section class="mx-auto max-w-[1320px] px-8 py-20 sm:px-14 lg:py-24">
    <div class="flex items-end justify-between gap-6 border-b border-line pb-4">
        <div>
            <h2 class="font-heading text-[clamp(1.75rem,3.5vw,2.125rem)] font-semibold leading-tight"><?php esc_html_e('Ready to ship', 'dawp'); ?></h2>
            <p class="mt-1 font-serif text-sm text-foreground-muted"><?php esc_html_e('In stock now. Order before 3 PM EST on a weekday and it ships the same day.', 'dawp'); ?></p>
        </div>
        <a href="<?php echo esc_url($shop_url); ?>" class="hidden shrink-0 text-xs font-semibold uppercase tracking-button text-blued transition hover:text-blued-hover sm:inline"><?php esc_html_e('All watches', 'dawp'); ?></a>
    </div>

    <?php if ($ready_posts) : ?>
        <ul class="mt-8 grid grid-cols-2 gap-x-8 gap-y-10 lg:grid-cols-4">
            <?php foreach ($ready_posts as $i => $post) : dawp_home_product_card($post->ID, $i < 2); endforeach; ?>
        </ul>
    <?php else : ?>
        <div class="mt-8 border border-dashed border-line px-6 py-14 text-center">
            <p class="font-heading text-lg font-semibold"><?php esc_html_e('The first watches are on the bench', 'dawp'); ?></p>
            <p class="mx-auto mt-2 max-w-sm font-serif text-sm leading-6 text-foreground-muted"><?php esc_html_e('New watches are added as they are finished and tested. Check back soon.', 'dawp'); ?></p>
            <a href="<?php echo esc_url(home_url('/about-us/')); ?>" class="mt-6 inline-flex h-11 items-center justify-center border border-foreground px-7 text-xs font-semibold uppercase tracking-button text-foreground transition hover:border-blued hover:text-blued"><?php esc_html_e('Read our story', 'dawp'); ?></a>
        </div>
    <?php endif; ?>
</section>

<!-- S7 · Specs & quality --------------------------------------------- -->
<section class="border-y border-line bg-surface">
    <div class="mx-auto max-w-[1320px] px-8 py-20 sm:px-14 lg:py-24">
        <div class="grid gap-10 lg:grid-cols-12 lg:gap-16">
            <div class="lg:col-span-4">
                <h2 class="font-heading text-[clamp(1.75rem,3.5vw,2.125rem)] font-semibold leading-tight"><?php esc_html_e('Specs & quality', 'dawp'); ?></h2>
                <p class="mt-3 font-serif text-[15px] leading-7 text-foreground-muted"><?php esc_html_e('What every WristUnion watch has in common. Each product page carries the full spec sheet for that model, including case size and fit measurements.', 'dawp'); ?></p>
            </div>
            <dl class="lg:col-span-8">
                <?php foreach ($spec_rows as $row) : ?>
                    <div class="grid grid-cols-1 gap-1 border-t border-line py-3 sm:grid-cols-[minmax(0,180px)_1fr] sm:gap-6 last:border-b">
                        <dt class="text-xs font-semibold uppercase tracking-label text-muted" style="font-stretch: 88%;"><?php echo esc_html($row[0]); ?></dt>
                        <dd class="wu-tnum text-sm text-foreground"><?php echo esc_html($row[1]); ?></dd>
                    </div>
                <?php endforeach; ?>
            </dl>
        </div>
    </div>
</section>

<?php if (!empty($home_reviews)) : ?>
<!-- S8 · Reviews ---------------------------------------------------- -->
<section class="mx-auto max-w-[1320px] px-8 py-20 sm:px-14 lg:py-24">
    <h2 class="font-heading text-[clamp(1.75rem,3.5vw,2.125rem)] font-semibold leading-tight border-b border-line pb-4"><?php esc_html_e('From the wrist', 'dawp'); ?></h2>
    <ul class="mt-8 grid gap-px bg-line sm:grid-cols-2">
        <?php foreach ($home_reviews as $review) :
            $rating  = (int) get_comment_meta($review->comment_ID, 'rating', true);
            $product = wc_get_product($review->comment_post_ID);
        ?>
            <li class="bg-surface p-6">
                <?php if ($rating) : ?>
                    <p class="wu-tnum text-xs font-semibold uppercase tracking-label text-accent" aria-label="<?php echo esc_attr(sprintf(__('Rated %d out of 5', 'dawp'), $rating)); ?>">
                        <?php echo esc_html(str_repeat('★', $rating) . str_repeat('☆', 5 - $rating)); ?>
                    </p>
                <?php endif; ?>
                <blockquote class="mt-3 font-serif text-[15px] leading-7 text-foreground"><?php echo esc_html(wp_trim_words($review->comment_content, 40)); ?></blockquote>
                <p class="mt-3 text-xs text-muted">
                    <?php echo esc_html($review->comment_author); ?><?php if ($product) : ?> · <a class="text-blued hover:text-blued-hover" href="<?php echo esc_url(get_permalink($product->get_id())); ?>"><?php echo esc_html($product->get_name()); ?></a><?php endif; ?>
                </p>
            </li>
        <?php endforeach; ?>
    </ul>
</section>
<?php endif; ?>

<!-- S9 · Founder ------------------------------------------------------ -->
<section class="mx-auto max-w-[1320px] px-8 py-20 sm:px-14 lg:py-24">
    <div class="grid gap-10 border-t border-line pt-12 lg:grid-cols-12 lg:gap-16">
        <div class="lg:col-span-5">
            <div class="aspect-[4/5] overflow-hidden bg-surface-alt">
                <img src="<?php echo esc_url(get_theme_file_uri('assets/img/watch-heritage.avif')); ?>" alt="<?php esc_attr_e('A WristUnion Heritage watch with a sunburst dial', 'dawp'); ?>" width="900" height="900" class="h-full w-full object-cover" loading="lazy" decoding="async">
            </div>
        </div>
        <div class="lg:col-span-7">
            <p class="text-[11px] font-medium uppercase tracking-brand text-accent"><?php esc_html_e('Who builds these', 'dawp'); ?></p>
            <div class="wu-prose mt-4 space-y-4 font-serif text-[17px] leading-8 text-foreground">
                <p><?php esc_html_e('WristUnion started on one bench, with one question: why is it so hard to buy a watch that says exactly what it is? Photos never match, the specs are buried, and the same case shows up under a dozen names.', 'dawp'); ?></p>
                <p><?php esc_html_e('So we build the opposite. A short line of Field & Everyday and Heritage watches, designed in-house and running an automatic movement. Assembled, regulated, and pressure-tested by hand, one at a time. Every number on the page is a real measurement.', 'dawp'); ?></p>
            </div>
            <p class="mt-5 text-sm font-semibold text-foreground">— <?php esc_html_e('The WristUnion workshop', 'dawp'); ?></p>
        </div>
    </div>
</section>

<!-- S10 · Policies & FAQ ------------------------------------------- -->
<section class="border-t border-line bg-surface">
    <div class="mx-auto max-w-[1320px] px-8 py-16 sm:px-14">
        <div class="grid gap-px bg-line sm:grid-cols-2 lg:grid-cols-4">
            <?php
            $policy_links = [
                ['t' => __('Shipping', 'dawp'),           'd' => __('Free on every US order. Same-day dispatch before 3 PM EST, 3–7 day delivery.', 'dawp'), 'u' => home_url('/shipping-policy/')],
                ['t' => __('Returns', 'dawp'),            'd' => __('30 days, unworn, in the original packaging.', 'dawp'),          'u' => home_url('/return-refund-policy/')],
                ['t' => __('Warranty', 'dawp'),           'd' => __('2-year workshop warranty on assembly and movement.', 'dawp'),   'u' => home_url('/faq/')],
                ['t' => __('Support', 'dawp'),            'd' => __('Email us- a real reply within 1 business day, Mon–Fri.', 'dawp'), 'u' => home_url('/contact-us/')],
            ];
            foreach ($policy_links as $p) : ?>
                <a href="<?php echo esc_url($p['u']); ?>" class="bg-surface p-6 transition hover:bg-surface-alt">
                    <h3 class="font-heading text-sm font-semibold uppercase tracking-label text-foreground"><?php echo esc_html($p['t']); ?></h3>
                    <p class="mt-2 font-serif text-sm leading-6 text-foreground-muted"><?php echo esc_html($p['d']); ?></p>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- S11 · Email capture ---------------------------------------------- -->
<section class="bg-primary text-white">
    <div class="mx-auto max-w-[1320px] px-8 py-16 sm:px-14">
        <div class="max-w-xl">
            <h2 class="font-heading text-[clamp(1.5rem,3vw,1.875rem)] font-semibold leading-tight"><?php esc_html_e('Limited runs, first pick', 'dawp'); ?></h2>
            <p class="mt-3 font-serif text-[15px] leading-7 text-white/75"><?php esc_html_e('One email when a limited run opens. Subscribers get 48 hours to order before it goes public. No discounts, no filler.', 'dawp'); ?></p>

            <form id="newsletter-form" class="mt-6 flex flex-col gap-3 sm:flex-row" novalidate>
                <label class="sr-only" for="newsletter-email"><?php esc_html_e('Email address', 'dawp'); ?></label>
                <input id="newsletter-email" type="email" name="email" required placeholder="<?php esc_attr_e('you@email.com', 'dawp'); ?>" class="h-12 w-full border border-white/30 bg-transparent px-4 text-sm text-white outline-none placeholder:text-white/40 focus:border-white">
                <button type="submit" class="h-12 shrink-0 border border-white bg-white px-8 text-xs font-semibold uppercase tracking-button text-primary transition hover:bg-transparent hover:text-white">
                    <?php esc_html_e('Notify me', 'dawp'); ?>
                </button>
            </form>
            <p id="newsletter-message" class="mt-3 hidden text-sm font-medium text-accent" role="status"></p>
        </div>
    </div>
</section>
