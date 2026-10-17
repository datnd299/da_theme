<?php
/**
 * 404 Not Found — MozTire
 */
get_header();

$help_links = [
    ['title' => 'Shop All Tires', 'url' => dawp_shop_url()],
    ['title' => 'Shop by Brand', 'url' => home_url('/shop-by-brand/')],
    ['title' => 'Tire Size Guide', 'url' => home_url('/tire-size-guide/')],
    ['title' => 'Track Order', 'url' => home_url('/track-order/')],
    ['title' => 'FAQ', 'url' => home_url('/faq/')],
    ['title' => 'Contact Us', 'url' => home_url('/contact-us/')],
];
?>
<main id="primary" class="bg-surface">
    <section class="bg-ink text-white">
        <div class="mz-container grid gap-8 py-14 md:py-20 lg:grid-cols-[1fr_auto] lg:items-center">
            <div>
                <p class="mz-hero__eyebrow">Error 404</p>
                <h1 class="m-0 font-heading text-4xl font-black md:text-6xl">Looks like this page got a flat.</h1>
                <p class="mt-4 mb-0 max-w-xl text-white/70">The link may be old or mistyped. Search by tire size below, or jump to one of the pages drivers use most.</p>
            </div>
            <svg class="hidden lg:block" width="180" height="180" viewBox="0 0 48 48" aria-hidden="true">
                <g transform="translate(24 24)">
                    <ellipse rx="22" ry="19" cy="3" fill="#1A1F27"/>
                    <ellipse rx="20" ry="17" cy="3" fill="none" stroke="#FFFFFF" stroke-width="4" stroke-dasharray="4 2.4"/>
                    <circle r="11" fill="#D2430A"/>
                    <circle r="3.5" fill="#FFC21A"/>
                </g>
            </svg>
        </div>
    </section>

    <section class="py-12 md:py-16">
        <div class="mz-container grid gap-10">
            <?php dawp_tire_finder(['id' => 'notfound-tf', 'variant' => 'bar', 'title' => 'Find tires that fit']); ?>

            <div>
                <h2 class="mt-0 mb-4 font-heading text-2xl font-black">Popular pages</h2>
                <ul class="m-0 grid list-none grid-cols-2 gap-3 p-0 md:grid-cols-3">
                    <?php foreach ($help_links as $link) : ?>
                        <li><a class="flex min-h-14 items-center justify-between rounded-lg border border-border bg-background px-4 font-heading font-extrabold hover:border-foreground" href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?> <span aria-hidden="true" class="text-accent">&rarr;</span></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
