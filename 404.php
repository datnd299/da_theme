<?php
/**
 * 404 Not Found — YourWatchStore. Tailwind utilities only.
 */
get_header();

$shop_url = function_exists('wc_get_page_id') && wc_get_page_id('shop') > 0
    ? get_permalink(wc_get_page_id('shop'))
    : home_url('/shop/');

$category_sections = function_exists('dawp_megamenu_sections') ? dawp_megamenu_sections() : [
    [
        'title' => __('Shop by Style', 'dawp'),
        'links' => [
            ['title' => __('Dive Watches', 'dawp'), 'url' => home_url('/product-category/dive-watches/')],
            ['title' => __('Field Watches', 'dawp'), 'url' => home_url('/product-category/field-watches/')],
            ['title' => __('Dress Watches', 'dawp'), 'url' => home_url('/product-category/dress-watches/')],
            ['title' => __('Chronograph Watches', 'dawp'), 'url' => home_url('/product-category/chronograph-watches/')],
        ],
    ],
];

$help_links = [
    ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/')],
    ['title' => __('Shipping Policy', 'dawp'), 'url' => home_url('/shipping-policy/')],
    ['title' => __('Refund & Return Policy', 'dawp'), 'url' => home_url('/refund-return-policy/')],
    ['title' => __('FAQ', 'dawp'), 'url' => home_url('/faq/')],
    ['title' => __('Contact Support', 'dawp'), 'url' => home_url('/contact-us/')],
];
?>

<main class="bg-background text-foreground">
    <section class="border-b border-border">
        <div class="mx-auto max-w-[1280px] px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
            <p class="text-xs font-bold uppercase tracking-[0.16em] text-accent-blush"><?php esc_html_e('Page not found', 'dawp'); ?></p>
            <h1 class="mt-4 font-heading text-4xl font-extrabold leading-tight tracking-tight text-foreground sm:text-5xl lg:text-6xl"><?php esc_html_e('That page has moved — the shop hasn\'t.', 'dawp'); ?></h1>
            <p class="mt-5 max-w-xl text-base leading-7 text-foreground-muted"><?php esc_html_e('The link may be outdated or the watch may have been moved. Search the store or jump into a collection below.', 'dawp'); ?></p>

            <form class="mt-8 flex max-w-md flex-col gap-3 sm:flex-row" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <label class="sr-only" for="e404-search"><?php esc_html_e('Search watches', 'dawp'); ?></label>
                <input id="e404-search" type="search" name="s" placeholder="<?php esc_attr_e('Search dive, field, dress, chronograph', 'dawp'); ?>" class="w-full rounded-sm border border-border bg-surface px-4 py-3 text-sm text-foreground outline-none placeholder:text-muted focus:border-foreground">
                <input type="hidden" name="post_type" value="product">
                <button type="submit" class="inline-flex min-h-[3rem] items-center justify-center rounded-sm bg-foreground px-6 text-sm font-semibold uppercase tracking-[0.06em] text-white transition hover:bg-accent-hover"><?php esc_html_e('Search', 'dawp'); ?></button>
            </form>

            <div class="mt-6 flex flex-col gap-3 sm:flex-row">
                <a class="inline-flex min-h-[3rem] items-center justify-center rounded-sm border border-foreground bg-transparent px-7 text-sm font-semibold uppercase tracking-[0.06em] text-foreground transition hover:bg-foreground hover:text-white" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop All Watches', 'dawp'); ?></a>
                <a class="inline-flex min-h-[3rem] items-center justify-center rounded-sm px-4 text-sm font-semibold text-foreground underline decoration-border underline-offset-4 transition hover:decoration-foreground" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Back to home', 'dawp'); ?></a>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-[1280px] px-4 py-14 sm:px-6 lg:px-8 lg:py-16">
        <div class="grid gap-10 lg:grid-cols-2">
            <div>
                <h2 class="font-heading text-2xl font-extrabold tracking-tight text-foreground"><?php esc_html_e('Popular collections', 'dawp'); ?></h2>
                <div class="mt-6 space-y-6">
                    <?php foreach ($category_sections as $section) : ?>
                        <div>
                            <p class="text-xs font-bold uppercase tracking-[0.1em] text-muted"><?php echo esc_html($section['title']); ?></p>
                            <ul class="mt-3 grid gap-2 sm:grid-cols-2">
                                <?php foreach ($section['links'] as $link) : ?>
                                    <li><a class="text-sm font-semibold text-foreground underline decoration-border underline-offset-4 transition hover:decoration-foreground" href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="rounded-md border border-border bg-surface-alt p-6">
                <h2 class="font-heading text-xl font-bold text-foreground"><?php esc_html_e('Need help with an order?', 'dawp'); ?></h2>
                <p class="mt-2 text-sm leading-6 text-foreground-muted"><?php esc_html_e('If you arrived from an email or a saved link, these pages will get you where you were going.', 'dawp'); ?></p>
                <ul class="mt-4 space-y-2">
                    <?php foreach ($help_links as $link) : ?>
                        <li><a class="text-sm font-semibold text-accent-blush underline underline-offset-2 transition hover:text-foreground" href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
