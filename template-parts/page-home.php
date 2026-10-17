<?php
/**
 * Homepage — MozTire
 * Hero + finder | Tire types | How it works | Featured tires | Popular sizes | Brands | Size decoder | FAQ
 */

$facts    = dawp_store_facts();
$shop_url = dawp_shop_url();
$featured = dawp_featured_tires(8);
$brands   = dawp_tire_brands(12);
$faq      = array_slice(dawp_get_faq_items(), 0, 4);

$hero_bg = sprintf(
    "--mz-hero-image:url('%s')",
    esc_url(dawp_theme_cdn_image_url('assets/img/hero/home-hero.jpg', 1600, 900))
);

$types = dawp_tire_types();
$type_cards = array_filter($types, static function ($type) {
    return $type['image'] !== '';
});
$type_links = array_filter($types, static function ($type) {
    return $type['image'] === '';
});

// Most-stocked size categories; fallback list when the catalog has none.
$size_catalog = dawp_size_catalog();
usort($size_catalog, static function ($x, $y) {
    return $y['count'] <=> $x['count'];
});
$popular_sizes = [];
foreach (array_slice($size_catalog, 0, 12) as $size) {
    $link = get_term_link($size['slug'], 'product_cat');
    if (! is_wp_error($link)) {
        $popular_sizes[$size['name']] = $link;
    }
}
if (! $popular_sizes) {
    foreach (['205/55R16', '215/55R17', '225/65R17', '235/65R17', '225/60R18', '235/60R18', '245/60R18', '265/70R17', '275/55R20', '225/45R17', '215/60R16', '255/70R18'] as $size) {
        $popular_sizes[$size] = add_query_arg(['s' => $size, 'post_type' => 'product'], home_url('/'));
    }
}

$steps = [
    ['n' => '01', 'title' => 'Find your size', 'text' => 'Read it off your sidewall or door-jamb sticker and pick width, aspect ratio and rim diameter. Or type it straight into search.'],
    ['n' => '02', 'title' => 'Compare what matters', 'text' => 'Every tire lists season, load index, speed rating, load range and tread warranty, so you can compare specs side by side.'],
    ['n' => '03', 'title' => 'Ship free, install local', 'text' => 'Free ground shipping to your home or straight to your installer in the contiguous U.S. Tracking on every package.'],
];
?>

<div class="bg-background text-foreground">

    <!-- HERO + FINDER -->
    <section class="mz-hero" style="<?php echo esc_attr($hero_bg); ?>" aria-labelledby="home-hero-title">
        <div class="mz-container grid items-center gap-8 py-10 md:py-16 lg:grid-cols-[1fr_minmax(0,560px)] lg:gap-12 lg:py-24">
            <div>
                <p class="mz-hero__eyebrow">Tires for cars, SUVs &amp; trucks</p>
                <h1 id="home-hero-title" class="m-0 max-w-xl font-heading text-[2.4rem] leading-[1.02] font-black md:text-6xl">The right tire for your ride. <span class="text-accent-blush">Shipped free.</span></h1>
                <p class="mt-5 mb-0 max-w-lg text-base text-white/75 md:text-lg">Search by the size on your sidewall, filter by brand, season and speed rating, and get free ground shipping to the contiguous U.S.</p>
                <ul class="mt-6 mb-0 grid list-none gap-2 p-0 text-sm text-white/85 sm:grid-cols-2">
                    <li class="flex items-center gap-2"><span class="inline-block size-2 rounded-full bg-accent-blush"></span>Full specs on every tire</li>
                    <li class="flex items-center gap-2"><span class="inline-block size-2 rounded-full bg-accent-blush"></span>Ship to home or installer</li>
                    <li class="flex items-center gap-2"><span class="inline-block size-2 rounded-full bg-accent-blush"></span><?php echo (int) $facts['return_window']; ?>-day returns, unmounted</li>
                    <li class="flex items-center gap-2"><span class="inline-block size-2 rounded-full bg-accent-blush"></span>Secure, encrypted checkout</li>
                </ul>
            </div>
            <div id="find">
                <?php dawp_tire_finder(['id' => 'home-tf', 'variant' => 'hero', 'title' => 'Find tires that fit']); ?>
            </div>
        </div>
    </section>

    <!-- TIRE TYPES -->
    <section class="py-14 md:py-20" aria-labelledby="types-title">
        <div class="mz-container">
            <div class="mb-8 flex flex-wrap items-end justify-between gap-4">
                <div>
                    <p class="m-0 font-heading text-sm font-extrabold tracking-[0.14em] text-accent uppercase">Shop by tire type</p>
                    <h2 id="types-title" class="mt-2 mb-0 font-heading text-3xl font-black md:text-4xl">Built for how and where you drive</h2>
                </div>
                <a href="<?php echo esc_url($shop_url); ?>" class="font-heading font-extrabold text-foreground underline decoration-accent decoration-2 underline-offset-4 hover:text-accent">View all tires</a>
            </div>

            <div class="grid grid-cols-2 gap-3 md:gap-5 lg:grid-cols-4">
                <?php foreach ($type_cards as $type) : ?>
                    <a href="<?php echo esc_url(dawp_tire_type_url($type['label'])); ?>" class="group relative isolate flex aspect-[4/5] flex-col justify-end overflow-hidden rounded-lg bg-ink p-4 text-white md:p-5">
                        <?php echo dawp_theme_image($type['image'], $type['label'] . ' tires', 400, 500, [[320, 400], [400, 500], [640, 800]], '(max-width: 1023px) 50vw, 300px', ['class' => 'absolute inset-0 -z-10 size-full object-cover transition-transform duration-500 group-hover:scale-105']); // phpcs:ignore ?>
                        <span class="absolute inset-0 -z-10 bg-gradient-to-t from-ink via-ink/50 to-transparent"></span>
                        <span class="font-heading text-xl font-black md:text-2xl"><?php echo esc_html($type['label']); ?></span>
                        <span class="mt-1 hidden text-sm text-white/75 sm:block"><?php echo esc_html($type['desc']); ?></span>
                        <span class="mt-3 inline-flex items-center gap-1 text-sm font-bold text-accent-blush">Shop now <span aria-hidden="true">&rarr;</span></span>
                    </a>
                <?php endforeach; ?>
            </div>

            <div class="mt-4 grid grid-cols-2 gap-3 md:grid-cols-4">
                <?php foreach ($type_links as $type) : ?>
                    <a href="<?php echo esc_url(dawp_tire_type_url($type['label'])); ?>" class="flex min-h-16 flex-col justify-center rounded-lg border border-border bg-surface px-4 py-3 hover:border-foreground">
                        <span class="font-heading font-extrabold"><?php echo esc_html($type['label']); ?></span>
                        <span class="hidden text-xs text-muted md:block"><?php echo esc_html($type['desc']); ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- HOW IT WORKS -->
    <section class="bg-surface py-14 md:py-20" aria-labelledby="how-title">
        <div class="mz-container">
            <p class="m-0 font-heading text-sm font-extrabold tracking-[0.14em] text-accent uppercase">How MozTire works</p>
            <h2 id="how-title" class="mt-2 mb-10 max-w-2xl font-heading text-3xl font-black md:text-4xl">Three steps from &ldquo;what size do I need?&rdquo; to tires at your door</h2>
            <ol class="m-0 grid list-none gap-4 p-0 md:grid-cols-3 md:gap-6">
                <?php foreach ($steps as $step) : ?>
                    <li class="relative rounded-lg border border-border bg-background p-6">
                        <span class="font-heading text-5xl font-black text-accent-blush [-webkit-text-stroke:1.5px_var(--color-foreground)]"><?php echo esc_html($step['n']); ?></span>
                        <h3 class="mt-3 mb-2 font-heading text-xl font-black"><?php echo esc_html($step['title']); ?></h3>
                        <p class="m-0 text-foreground-muted"><?php echo esc_html($step['text']); ?></p>
                    </li>
                <?php endforeach; ?>
            </ol>
        </div>
    </section>

    <!-- FEATURED TIRES -->
    <?php if ($featured) : ?>
        <section class="py-14 md:py-20" aria-labelledby="featured-title">
            <div class="mz-container">
                <div class="mb-8 flex flex-wrap items-end justify-between gap-4">
                    <div>
                        <p class="m-0 font-heading text-sm font-extrabold tracking-[0.14em] text-accent uppercase">Popular right now</p>
                        <h2 id="featured-title" class="mt-2 mb-0 font-heading text-3xl font-black md:text-4xl">Tires drivers are choosing</h2>
                    </div>
                    <a href="<?php echo esc_url($shop_url); ?>" class="mz-btn mz-btn--outline">Shop All Tires</a>
                </div>
                <ul class="tire-grid tire-grid--4">
                    <?php foreach ($featured as $product) {
                        dawp_render_tire_card($product);
                    } ?>
                </ul>
            </div>
        </section>
    <?php endif; ?>

    <!-- POPULAR SIZES -->
    <section class="bg-ink py-14 text-white md:py-20" aria-labelledby="sizes-title">
        <div class="mz-container grid gap-10 lg:grid-cols-[minmax(0,420px)_1fr] lg:items-center">
            <div>
                <p class="m-0 font-heading text-sm font-extrabold tracking-[0.14em] text-accent-blush uppercase">Popular tire sizes</p>
                <h2 id="sizes-title" class="mt-2 mb-4 font-heading text-3xl font-black md:text-4xl">Know your size? Jump straight to it.</h2>
                <p class="m-0 text-white/70">These are some of the most common sizes on U.S. sedans, crossovers, SUVs and pickups. Tap one to see every tire we carry in that size.</p>
            </div>
            <ul class="m-0 grid list-none grid-cols-2 gap-2 p-0 sm:grid-cols-3 md:grid-cols-4">
                <?php foreach ($popular_sizes as $size => $url) : ?>
                    <li>
                        <a href="<?php echo esc_url($url); ?>" class="flex min-h-14 items-center justify-center rounded-md border border-white/15 bg-white/5 font-heading text-lg font-extrabold tracking-wide transition-colors hover:border-accent-blush hover:bg-accent-blush hover:text-ink"><?php echo esc_html($size); ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <!-- BRANDS -->
    <section class="py-14 md:py-20" aria-labelledby="brands-title">
        <div class="mz-container">
            <div class="mb-8 flex flex-wrap items-end justify-between gap-4">
                <div>
                    <p class="m-0 font-heading text-sm font-extrabold tracking-[0.14em] text-accent uppercase">Shop by brand</p>
                    <h2 id="brands-title" class="mt-2 mb-0 font-heading text-3xl font-black md:text-4xl">Brands in stock</h2>
                </div>
                <a href="<?php echo esc_url(home_url('/shop-by-brand/')); ?>" class="font-heading font-extrabold underline decoration-accent decoration-2 underline-offset-4 hover:text-accent">See all brands</a>
            </div>
            <?php if ($brands) : ?>
                <ul class="m-0 grid list-none grid-cols-2 gap-3 p-0 sm:grid-cols-3 lg:grid-cols-6">
                    <?php foreach ($brands as $brand) :
                        $logo_id = (int) get_term_meta($brand->term_id, 'thumbnail_id', true);
                        ?>
                        <li>
                            <a href="<?php echo esc_url(get_term_link($brand)); ?>" class="flex h-24 flex-col items-center justify-center gap-1 rounded-lg border border-border bg-background px-3 text-center transition-colors hover:border-foreground">
                                <?php if ($logo_id) : ?>
                                    <?php echo wp_get_attachment_image($logo_id, 'medium', false, ['class' => 'max-h-10 w-auto object-contain', 'alt' => $brand->name, 'loading' => 'lazy']); ?>
                                <?php else : ?>
                                    <span class="font-heading text-lg font-black"><?php echo esc_html($brand->name); ?></span>
                                <?php endif; ?>
                                <span class="text-xs text-muted"><?php echo esc_html(sprintf(_n('%d tire', '%d tires', $brand->count, 'dawp'), $brand->count)); ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else : ?>
                <p class="m-0 rounded-lg border border-dashed border-border p-6 text-foreground-muted">Brands will appear here as soon as they are in stock. In the meantime, <a class="font-bold text-accent underline" href="<?php echo esc_url($shop_url); ?>">browse all tires</a>.</p>
            <?php endif; ?>
        </div>
    </section>

    <!-- SIZE DECODER -->
    <section class="bg-surface py-14 md:py-20" aria-labelledby="decode-title">
        <div class="mz-container grid gap-10 lg:grid-cols-2 lg:items-center">
            <div>
                <p class="m-0 font-heading text-sm font-extrabold tracking-[0.14em] text-accent uppercase">Read your sidewall</p>
                <h2 id="decode-title" class="mt-2 mb-4 font-heading text-3xl font-black md:text-4xl">What does 225/65R17 102H mean?</h2>
                <p class="mt-0 mb-6 text-foreground-muted">Every tire size is a short code. Once you can read it, you can compare any two tires in seconds and make sure the replacement matches what your vehicle needs.</p>
                <a href="<?php echo esc_url(home_url('/tire-size-guide/')); ?>" class="mz-btn mz-btn--dark">Read the Full Size Guide</a>
            </div>
            <div class="rounded-lg bg-ink p-5 text-white md:p-8">
                <p class="m-0 text-center font-heading text-4xl font-black tracking-wider md:text-6xl">
                    <span class="text-accent-blush">225</span>/<span class="text-[#7DD3FC]">65</span><span class="text-white/60">R</span><span class="text-[#86EFAC]">17</span>
                    <span class="text-[#FDA4AF]">102</span><span class="text-[#C4B5FD]">H</span>
                </p>
                <dl class="mt-6 mb-0 grid grid-cols-2 gap-3 text-sm md:grid-cols-3">
                    <div class="rounded-md bg-white/5 p-3"><dt class="font-heading font-extrabold text-accent-blush">225</dt><dd class="m-0 text-white/70">Width in mm</dd></div>
                    <div class="rounded-md bg-white/5 p-3"><dt class="font-heading font-extrabold text-[#7DD3FC]">65</dt><dd class="m-0 text-white/70">Aspect ratio %</dd></div>
                    <div class="rounded-md bg-white/5 p-3"><dt class="font-heading font-extrabold text-white/60">R</dt><dd class="m-0 text-white/70">Radial build</dd></div>
                    <div class="rounded-md bg-white/5 p-3"><dt class="font-heading font-extrabold text-[#86EFAC]">17</dt><dd class="m-0 text-white/70">Rim diameter (in)</dd></div>
                    <div class="rounded-md bg-white/5 p-3"><dt class="font-heading font-extrabold text-[#FDA4AF]">102</dt><dd class="m-0 text-white/70">Load index</dd></div>
                    <div class="rounded-md bg-white/5 p-3"><dt class="font-heading font-extrabold text-[#C4B5FD]">H</dt><dd class="m-0 text-white/70">Speed rating</dd></div>
                </dl>
            </div>
        </div>
    </section>

    <!-- FAQ TEASER -->
    <section class="py-14 md:py-20" aria-labelledby="home-faq-title">
        <div class="mz-container grid gap-10 lg:grid-cols-[minmax(0,380px)_1fr]">
            <div>
                <p class="m-0 font-heading text-sm font-extrabold tracking-[0.14em] text-accent uppercase">Good to know</p>
                <h2 id="home-faq-title" class="mt-2 mb-4 font-heading text-3xl font-black md:text-4xl">Tire buying questions, answered</h2>
                <p class="mt-0 mb-6 text-foreground-muted">Still unsure? Email <a class="font-semibold text-accent underline" href="mailto:<?php echo esc_attr($facts['email']); ?>"><?php echo esc_html($facts['email']); ?></a> and we&rsquo;ll reply <?php echo esc_html($facts['response_time']); ?>.</p>
                <a class="mz-btn mz-btn--outline" href="<?php echo esc_url(home_url('/faq/')); ?>">All FAQs</a>
            </div>
            <div>
                <?php foreach ($faq as $item) : ?>
                    <details class="mz-faq">
                        <summary><?php echo esc_html($item['question']); ?></summary>
                        <div class="mz-faq__answer mz-prose"><p><?php echo wp_kses_post($item['answer']); ?></p></div>
                    </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>
