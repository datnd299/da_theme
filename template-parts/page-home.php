<?php
/**
 * Homepage — hero, collections, featured watches, atelier, movement, service.
 * See .plans/site.md §4.
 */

defined('ABSPATH') || exit;

$dawp_collections = dawp_collections();

$dawp_featured = [];
if (class_exists('WooCommerce')) {
    $dawp_featured_query = new WP_Query([
        'post_type'           => 'product',
        'posts_per_page'      => 4,
        'post_status'         => 'publish',
        'ignore_sticky_posts' => true,
        'no_found_rows'       => true,
        'orderby'             => 'date',
        'order'               => 'DESC',
        'tax_query'           => [[
            'taxonomy' => 'product_visibility',
            'field'    => 'name',
            'terms'    => 'exclude-from-catalog',
            'operator' => 'NOT IN',
        ]],
    ]);
    $dawp_featured = $dawp_featured_query->posts;
}
?>

<!-- ============================================================ HERO -->
<section class="relative overflow-hidden border-b border-border bg-background" aria-labelledby="hero-title">
    <div class="pointer-events-none absolute -right-[18%] top-[-12%] hidden h-[820px] w-[820px] rounded-pill border border-border lg:block" aria-hidden="true"></div>
    <div class="pointer-events-none absolute -left-[22%] bottom-[-30%] hidden h-[520px] w-[520px] rounded-pill bg-surface-alt lg:block" aria-hidden="true"></div>

    <div class="container relative grid items-center gap-12 py-16 lg:grid-cols-[1.05fr_0.95fr] lg:gap-16 lg:py-28">

        <div class="order-2 lg:order-1">
            <span class="c-rule" aria-hidden="true"></span>
            <p class="c-eyebrow"><?php esc_html_e('Est. 2016 — United States', 'dawp'); ?></p>

            <h1 id="hero-title" class="font-heading text-display font-light leading-[0.94] tracking-tight text-foreground">
                <?php esc_html_e('Time,', 'dawp'); ?><br>
                <span class="italic"><?php esc_html_e('measured', 'dawp'); ?></span> <?php esc_html_e('by hand.', 'dawp'); ?>
            </h1>

            <p class="mt-8 max-w-md text-body text-foreground-muted">
                <?php esc_html_e('An independent atelier building mechanical watches one at a time. Steel cases finished by hand. Carefully selected automatic movements, regulated in five positions.', 'dawp'); ?>
            </p>

            <div class="mt-10 flex flex-wrap gap-4">
                <a class="c-btn" href="<?php echo esc_url(home_url('/shop/')); ?>"><?php esc_html_e('The Collections', 'dawp'); ?></a>
                <a class="c-btn-ghost" href="<?php echo esc_url(home_url('/about-us/')); ?>"><?php esc_html_e('The Atelier', 'dawp'); ?></a>
            </div>

            <dl class="mt-14 grid max-w-lg grid-cols-3 gap-6 border-t border-border pt-8">
                <div>
                    <dt class="text-eyebrow uppercase tracking-wide text-muted"><?php esc_html_e('Movement', 'dawp'); ?></dt>
                    <dd class="m-0 mt-2 font-heading text-h3 text-foreground"><?php esc_html_e('Automatic', 'dawp'); ?></dd>
                </div>
                <div>
                    <dt class="text-eyebrow uppercase tracking-wide text-muted"><?php esc_html_e('Frequency', 'dawp'); ?></dt>
                    <dd class="m-0 mt-2 font-heading text-h3 text-foreground"><?php esc_html_e('28,800', 'dawp'); ?></dd>
                </div>
                <div>
                    <dt class="text-eyebrow uppercase tracking-wide text-muted"><?php esc_html_e('Warranty', 'dawp'); ?></dt>
                    <dd class="m-0 mt-2 font-heading text-h3 text-foreground"><?php esc_html_e('5 years', 'dawp'); ?></dd>
                </div>
            </dl>
        </div>

        <div class="order-1 lg:order-2">
            <img src="<?php echo esc_url(dawp_asset_uri('assets/img/hero/hero-watch.png')); ?>"
                 alt="<?php esc_attr_e('A CHRONEL automatic watch on a steel bracelet', 'dawp'); ?>"
                 width="896" height="1200" fetchpriority="high" decoding="async"
                 class="mx-auto h-[340px] w-auto sm:h-[440px] lg:h-[600px]">
        </div>
    </div>
</section>

<!-- ============================================================ COLLECTIONS -->
<section class="border-b border-border bg-background section-y" aria-labelledby="collections-title">
    <div class="container">
        <div class="mb-14 max-w-2xl">
            <span class="c-rule" aria-hidden="true"></span>
            <p class="c-eyebrow"><?php esc_html_e('Four collections', 'dawp'); ?></p>
            <h2 id="collections-title" class="c-title"><?php esc_html_e('Each one built for a different life.', 'dawp'); ?></h2>
        </div>

        <ul class="m-0 grid list-none grid-cols-2 gap-px border border-border bg-border p-0 lg:grid-cols-4">
            <?php foreach ($dawp_collections as $collection) : ?>
                <li class="bg-background">
                    <a class="group flex h-full flex-col" href="<?php echo esc_url(dawp_product_category_url($collection['slug'])); ?>">
                        <span class="block overflow-hidden bg-surface-alt">
                            <img src="<?php echo esc_url(dawp_asset_uri($collection['image'])); ?>"
                                 alt="<?php echo esc_attr(sprintf(__('%s watch', 'dawp'), $collection['name'])); ?>"
                                 width="896" height="1200" loading="lazy" decoding="async"
                                 class="h-48 w-full object-cover transition-transform duration-700 ease-fluid group-hover:scale-105 sm:h-80">
                        </span>
                        <span class="flex flex-1 flex-col p-5 sm:p-8">
                            <span class="text-eyebrow uppercase tracking-wide text-muted"><?php echo esc_html($collection['kicker']); ?></span>
                            <span class="mt-3 block font-heading text-h3 leading-none text-foreground"><?php echo esc_html($collection['name']); ?></span>
                            <span class="mt-2 block text-caption text-accent-deep"><?php echo esc_html($collection['tagline']); ?></span>
                            <span class="mt-4 hidden text-body-sm text-foreground-muted sm:block"><?php echo esc_html($collection['summary']); ?></span>
                            <span class="mt-4 block text-eyebrow uppercase tracking-wide text-foreground sm:mt-6">
                                <?php esc_html_e('Discover', 'dawp'); ?>
                                <span class="ml-2 inline-block transition-transform duration-400 ease-fluid group-hover:translate-x-1" aria-hidden="true">&rarr;</span>
                            </span>
                        </span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<?php if (!empty($dawp_featured)) : ?>
<!-- ============================================================ FEATURED WATCHES -->
<section class="border-b border-border bg-surface-alt section-y" aria-labelledby="featured-title">
    <div class="container">
        <div class="mb-12 flex flex-wrap items-end justify-between gap-6">
            <div class="max-w-xl">
                <span class="c-rule" aria-hidden="true"></span>
                <p class="c-eyebrow"><?php esc_html_e('Recently completed', 'dawp'); ?></p>
                <h2 id="featured-title" class="c-title"><?php esc_html_e('Fresh from the bench.', 'dawp'); ?></h2>
            </div>
            <a class="c-link" href="<?php echo esc_url(home_url('/shop/')); ?>"><?php esc_html_e('All watches', 'dawp'); ?></a>
        </div>

        <ul class="m-0 grid list-none grid-cols-2 gap-4 p-0 lg:grid-cols-4 lg:gap-6">
            <?php foreach ($dawp_featured as $dawp_post) :
                $product = wc_get_product($dawp_post->ID);
                if (!$product) {
                    continue;
                }
                ?>
                <li>
                    <a class="group flex h-full flex-col border border-border bg-background transition-colors duration-400 ease-fluid hover:border-accent" href="<?php echo esc_url(get_permalink($dawp_post->ID)); ?>">
                        <span class="block overflow-hidden bg-surface-alt">
                            <span class="block transition-transform duration-700 ease-fluid group-hover:scale-105">
                                <?php echo dawp_product_responsive_image($product, 'mx-auto h-auto w-full', '(max-width: 767px) calc((100vw - 56px) / 2), 300px'); ?>
                            </span>
                        </span>
                        <span class="flex flex-1 flex-col p-5 lg:p-6">
                            <span class="block font-heading text-h3 leading-tight text-foreground"><?php echo esc_html($product->get_name()); ?></span>
                            <span class="mt-auto pt-4 block text-body-sm text-accent-deep"><?php echo wp_kses_post($product->get_price_html()); ?></span>
                        </span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
<?php endif; ?>

<!-- ============================================================ THE ATELIER -->
<section class="border-b border-border bg-background section-y" aria-labelledby="atelier-title">
    <div class="container grid items-center gap-12 lg:grid-cols-2 lg:gap-24">
        <div class="order-2 lg:order-1">
            <span class="c-rule" aria-hidden="true"></span>
            <p class="c-eyebrow"><?php esc_html_e('The atelier', 'dawp'); ?></p>
            <h2 id="atelier-title" class="c-title"><?php esc_html_e('One watchmaker. One watch. Start to finish.', 'dawp'); ?></h2>
            <p class="c-lede"><?php esc_html_e('A CHRONEL is not passed down a line. A single watchmaker cases the movement, fits the dial and hands, sets the rate, and signs the certificate. It takes as long as it takes.', 'dawp'); ?></p>

            <ul class="m-0 mt-10 list-none space-y-0 p-0">
                <?php
                $dawp_craft = [
                    ['n' => '01', 't' => __('Cases finished by hand', 'dawp'), 'd' => __('316L steel, brushed along the lug and polished on the bevel. Each surface is worked separately.', 'dawp')],
                    ['n' => '02', 't' => __('Movements regulated in five positions', 'dawp'), 'd' => __('Carefully selected automatic calibres, timed over 72 hours before the case back is closed.', 'dawp')],
                    ['n' => '03', 't' => __('Sealed, numbered, recorded', 'dawp'), 'd' => __('Gaskets seated, pressure tested, serial engraved and entered in the atelier register.', 'dawp')],
                ];
                foreach ($dawp_craft as $step) : ?>
                    <li class="flex gap-6 border-t border-border py-6">
                        <span class="shrink-0 font-heading text-h3 text-accent"><?php echo esc_html($step['n']); ?></span>
                        <span>
                            <span class="block text-body text-foreground"><?php echo esc_html($step['t']); ?></span>
                            <span class="mt-1 block text-body-sm text-foreground-muted"><?php echo esc_html($step['d']); ?></span>
                        </span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="order-1 lg:order-2">
            <div class="border border-border bg-surface-alt">
                <img src="<?php echo esc_url(dawp_asset_uri('assets/img/atelier/workbench.jpeg')); ?>"
                     alt="<?php esc_attr_e('A watchmaker\'s bench with a loupe, tweezers, and a movement in its holder', 'dawp'); ?>"
                     width="1200" height="896" loading="lazy" decoding="async" class="w-full">
            </div>
        </div>
    </div>
</section>

<!-- ============================================================ THE MOVEMENT (deep section) -->
<section id="movement" class="bg-ink text-on-ink section-y" aria-labelledby="movement-title">
    <div class="container grid items-center gap-14 lg:grid-cols-[0.9fr_1.1fr] lg:gap-24">
        <div>
            <img src="<?php echo esc_url(dawp_asset_uri('assets/img/atelier/movement.jpeg')); ?>"
                 alt="<?php esc_attr_e('The calibre CH-01, a carefully selected automatic movement', 'dawp'); ?>"
                 width="1024" height="1024" loading="lazy" decoding="async"
                 class="mx-auto w-full max-w-[420px]">
        </div>

        <div>
            <span class="c-rule" aria-hidden="true"></span>
            <p class="text-eyebrow font-medium uppercase tracking-wide text-accent"><?php esc_html_e('Calibre CH-01', 'dawp'); ?></p>
            <h2 id="movement-title" class="mt-4 font-heading text-h2 font-light leading-[1.05] text-on-ink"><?php esc_html_e('A carefully chosen heart, set by hand.', 'dawp'); ?></h2>
            <p class="mt-6 max-w-lg text-body-sm text-on-ink-muted"><?php esc_html_e('We select our automatic movements for a tolerance we could not better. Everything after that happens here: inspection, regulation, casing, and the final 72-hour test on the timing machine.', 'dawp'); ?></p>

            <dl class="mt-10 grid grid-cols-2 gap-px border border-border-ink bg-border-ink sm:grid-cols-3">
                <?php
                $dawp_specs = [
                    ['t' => __('Type', 'dawp'), 'v' => __('Automatic', 'dawp')],
                    ['t' => __('Jewels', 'dawp'), 'v' => __('24', 'dawp')],
                    ['t' => __('Frequency', 'dawp'), 'v' => __('28,800 vph', 'dawp')],
                    ['t' => __('Power reserve', 'dawp'), 'v' => __('~40 hours', 'dawp')],
                    ['t' => __('Crystal', 'dawp'), 'v' => __('Sapphire', 'dawp')],
                    ['t' => __('Case', 'dawp'), 'v' => __('316L steel', 'dawp')],
                ];
                foreach ($dawp_specs as $spec) : ?>
                    <div class="bg-ink p-5">
                        <dt class="text-eyebrow uppercase tracking-wide text-on-ink-muted"><?php echo esc_html($spec['t']); ?></dt>
                        <dd class="m-0 mt-2 font-heading text-h3 text-on-ink"><?php echo esc_html($spec['v']); ?></dd>
                    </div>
                <?php endforeach; ?>
            </dl>
        </div>
    </div>
</section>

<!-- ============================================================ SERVICE -->
<section class="bg-background pb-20 lg:pb-32" aria-labelledby="service-title">
    <div class="container">
        <div class="mb-12 max-w-xl">
            <span class="c-rule" aria-hidden="true"></span>
            <p class="c-eyebrow"><?php esc_html_e('Ownership', 'dawp'); ?></p>
            <h2 id="service-title" class="c-title"><?php esc_html_e('What comes with the watch.', 'dawp'); ?></h2>
        </div>

        <ul class="m-0 grid list-none grid-cols-1 gap-px border border-border bg-border p-0 sm:grid-cols-2 lg:grid-cols-4">
            <?php
            $dawp_assurances = [
                ['t' => __('Five-year warranty', 'dawp'), 'd' => __('Full movement cover from the day your watch is delivered.', 'dawp')],
                ['t' => __('Lifetime service', 'dawp'), 'd' => __('We service your watch at cost for as long as you own it.', 'dawp')],
                ['t' => __('Insured delivery', 'dawp'), 'd' => __('Complimentary, signature required, insured for full value.', 'dawp')],
                ['t' => __('30-day return', 'dawp'), 'd' => __('Return an unworn watch in its original condition within 30 days.', 'dawp')],
            ];
            foreach ($dawp_assurances as $item) : ?>
                <li class="bg-background p-8">
                    <span class="block h-px w-8 bg-accent" aria-hidden="true"></span>
                    <span class="mt-6 block font-heading text-h3 leading-none text-foreground"><?php echo esc_html($item['t']); ?></span>
                    <span class="mt-3 block text-body-sm text-foreground-muted"><?php echo esc_html($item['d']); ?></span>
                </li>
            <?php endforeach; ?>
        </ul>

        <p class="mt-8 text-caption text-muted">
            <?php esc_html_e('Full terms on the', 'dawp'); ?>
            <a class="text-accent-deep underline underline-offset-4" href="<?php echo esc_url(home_url('/service-warranty/')); ?>"><?php esc_html_e('Service & Warranty', 'dawp'); ?></a>,
            <a class="text-accent-deep underline underline-offset-4" href="<?php echo esc_url(home_url('/shipping-policy/')); ?>"><?php esc_html_e('Shipping Policy', 'dawp'); ?></a>,
            <?php esc_html_e('and', 'dawp'); ?>
            <a class="text-accent-deep underline underline-offset-4" href="<?php echo esc_url(home_url('/returns/')); ?>"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></a>
            <?php esc_html_e('pages.', 'dawp'); ?>
        </p>
    </div>
</section>
