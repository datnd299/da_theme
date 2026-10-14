<?php
/**
 * Homepage content — ProudlyWear.
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

$cat_url = static function ($slug) use ($shop_url) {
    return function_exists('dawp_product_category_url') ? dawp_product_category_url($slug) : $shop_url;
};

$home_img = static function ($name) {
    return get_template_directory_uri() . '/assets/images/home/' . $name . '.webp';
};

$branches = [
    ['title' => __('Army', 'dawp'), 'slug' => 'army', 'note' => __('For soldiers who answered the call', 'dawp')],
    ['title' => __('Navy', 'dawp'), 'slug' => 'navy', 'note' => __('For sailors, shipmates and plank owners', 'dawp')],
    ['title' => __('Air Force', 'dawp'), 'slug' => 'air-force', 'note' => __('For airmen on the line and in the air', 'dawp')],
    ['title' => __('Marines', 'dawp'), 'slug' => 'marine-corps', 'note' => __('Once a Marine, always a Marine', 'dawp')],
    ['title' => __('Coast Guard', 'dawp'), 'slug' => 'coast-guard', 'note' => __('For guardians of our shores', 'dawp')],
    ['title' => __('Military Families', 'dawp'), 'slug' => 'military-family', 'note' => __('Proud moms, dads, spouses & kids', 'dawp')],
];

$product_types = [
    ['title' => __('T-Shirts', 'dawp'), 'slug' => 't-shirts', 'img' => 'cat-tees', 'desc' => __('Soft cotton, bold patriotic prints', 'dawp')],
    ['title' => __('Hoodies & Zip-Ups', 'dawp'), 'slug' => 'hoodies', 'img' => 'cat-hoodies', 'desc' => __('Warm layers for cool mornings', 'dawp')],
    ['title' => __('Sweatshirts', 'dawp'), 'slug' => 'sweatshirts', 'img' => 'cat-sweatshirts', 'desc' => __('Classic crewnecks, vintage feel', 'dawp')],
    ['title' => __('Polo Shirts', 'dawp'), 'slug' => 'polo-shirts', 'img' => 'cat-polos', 'desc' => __('Sharp enough for the reunion', 'dawp')],
    ['title' => __('Bomber Jackets', 'dawp'), 'slug' => 'bomber-jackets', 'img' => 'cat-bombers', 'desc' => __('Flight-jacket style, made to order', 'dawp')],
    ['title' => __('Hats & Caps', 'dawp'), 'slug' => 'caps', 'img' => 'cat-caps', 'desc' => __('Embroidered & printed caps', 'dawp')],
    ['title' => __('Flags', 'dawp'), 'slug' => 'flags', 'img' => 'cat-flags', 'desc' => __('Garden & house flags for the porch', 'dawp')],
    ['title' => __('Metal Signs', 'dawp'), 'slug' => 'metal-signs', 'img' => 'cat-signs', 'desc' => __('Tin signs for the den or garage', 'dawp')],
];

$benefits = [
    ['title' => __('It honors your service', 'dawp'), 'copy' => __('Wearing your branch, era or unit pride is a quiet way to say “I was there” — and to keep that chapter of your life close.', 'dawp')],
    ['title' => __('It finds your people', 'dawp'), 'copy' => __('A cap or tee is often all it takes for another veteran to walk over, shake your hand and swap a story.', 'dawp')],
    ['title' => __('It starts conversations', 'dawp'), 'copy' => __('Kids, neighbors and strangers ask questions. Your shirt becomes an invitation to share what service really means.', 'dawp')],
    ['title' => __('It keeps memories alive', 'dawp'), 'copy' => __('For those we lost and those who came home, the things we wear help us remember names, places and sacrifices.', 'dawp')],
    ['title' => __('It raises awareness', 'dawp'), 'copy' => __('Visible pride reminds the public that veterans are all around us — in every town, workplace and family.', 'dawp')],
    ['title' => __('It shows family support', 'dawp'), 'copy' => __('Military moms, dads, spouses and kids served too. Our family designs let them wear that pride as well.', 'dawp')],
];

$steps = [
    ['title' => __('Choose your design', 'dawp'), 'copy' => __('Pick the design, style, color and size. Check our size guide first — fit varies by style.', 'dawp')],
    ['title' => __('6 hours to adjust', 'dawp'), 'copy' => __('Need a different size or address? Email us within 6 hours of ordering, before production starts.', 'dawp')],
    ['title' => __('We print it for you', 'dawp'), 'copy' => __('Your item is made to order and quality-checked in 3–5 business days.', 'dawp')],
    ['title' => __('It ships to your door', 'dawp'), 'copy' => __('US delivery in 4–8 business days after dispatch, with a tracking link by email.', 'dawp')],
];

// Live product rows: a named category if it exists, else a fallback ordering.
$get_products = static function ($slug, $fallback_orderby) {
    if (!function_exists('wc_get_products')) {
        return [];
    }
    $args = ['limit' => 8, 'status' => 'publish', 'visibility' => 'catalog'];
    $term = get_term_by('slug', $slug, 'product_cat');
    if ($term && !is_wp_error($term) && $term->count > 0) {
        $args['category'] = [$slug];
        $args['orderby']  = 'date';
    } else {
        $args['orderby'] = $fallback_orderby;
    }
    return wc_get_products($args);
};

$new_arrivals = $get_products('new-arrivals', 'date');
$best_sellers = $get_products('best-seller', 'popularity');

$render_products = static function ($products) {
    ?>
    <ul class="mt-10 grid grid-cols-2 gap-4 sm:gap-6 lg:grid-cols-4">
        <?php foreach ($products as $product) : ?>
            <li>
                <a href="<?php echo esc_url($product->get_permalink()); ?>" class="group flex h-full flex-col overflow-hidden rounded-lg border border-border bg-[#FFFFFF] transition hover:-translate-y-1 hover:border-border-strong hover:shadow-card-hover">
                    <span class="relative block aspect-square overflow-hidden bg-surface [&_img]:h-full [&_img]:w-full [&_img]:object-cover [&_img]:transition [&_img]:duration-300 group-hover:[&_img]:scale-105">
                        <?php echo $product->get_image('woocommerce_thumbnail', ['loading' => 'lazy']); ?>
                        <?php if ($product->is_on_sale()) : ?>
                            <span class="absolute left-2 top-2 rounded-sm bg-accent px-2 py-0.5 font-heading text-xs font-bold uppercase tracking-wider text-background"><?php esc_html_e('Sale', 'dawp'); ?></span>
                        <?php endif; ?>
                    </span>
                    <span class="flex flex-1 flex-col p-3 sm:p-4">
                        <span class="line-clamp-2 block text-sm font-semibold leading-snug text-foreground group-hover:text-accent"><?php echo esc_html($product->get_name()); ?></span>
                        <span class="mt-auto block pt-2 text-base font-bold text-accent [&_del]:mr-1 [&_del]:text-sm [&_del]:font-medium [&_del]:text-muted [&_ins]:no-underline"><?php echo wp_kses_post($product->get_price_html()); ?></span>
                    </span>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php
};

$eyebrow = 'inline-flex items-center gap-2 font-heading text-sm font-bold uppercase tracking-[0.22em] text-accent';
$h2      = 'font-display mt-2 text-4xl uppercase leading-[1.02] text-foreground sm:text-5xl';
$more    = 'inline-flex min-h-11 items-center gap-1 font-heading text-[0.95rem] font-bold uppercase tracking-wider text-foreground underline decoration-accent decoration-2 underline-offset-[6px] transition hover:text-accent';
?>

<!-- ============================================================
     HERO
     ============================================================ -->
<section class="relative overflow-hidden bg-background">
    <div class="pointer-events-none absolute inset-y-0 right-0 hidden w-1/2 bg-surface lg:block" aria-hidden="true"></div>

    <div class="relative mx-auto grid max-w-7xl gap-12 px-4 pb-16 pt-10 sm:px-6 lg:grid-cols-[1.05fr_1fr] lg:items-center lg:gap-14 lg:px-8 lg:pb-24 lg:pt-16">
        <div>
            <span class="font-stencil inline-flex items-center gap-2 border-y-2 border-foreground py-1 text-sm uppercase tracking-[0.2em] text-foreground">
                <span class="text-accent" aria-hidden="true">★</span><?php esc_html_e('For those who served', 'dawp'); ?><span class="text-accent" aria-hidden="true">★</span>
            </span>

            <h1 class="font-display mt-6 text-[3rem] uppercase leading-[0.98] text-foreground sm:text-7xl lg:text-[5.4rem]">
                <?php esc_html_e('Served with honor.', 'dawp'); ?><br>
                <span class="text-accent"><?php esc_html_e('Worn with pride.', 'dawp'); ?></span>
            </h1>

            <p class="mt-6 max-w-lg text-lg leading-relaxed text-foreground-muted">
                <?php esc_html_e('Veteran tees, hoodies, polos, caps, flags and signs for the men and women who served this country — and the families who stood beside them. Every piece is printed to order, just for you.', 'dawp'); ?>
            </p>

            <div class="mt-8 flex flex-wrap items-center gap-3">
                <a href="<?php echo esc_url($cat_url('new-arrivals')); ?>" class="inline-flex min-h-12 items-center justify-center gap-2 rounded-md bg-accent px-7 py-3 font-heading text-base font-bold uppercase tracking-wider text-background shadow-ink transition hover:translate-y-[2px] hover:bg-accent-hover hover:shadow-none">
                    <?php esc_html_e('Shop New Arrivals', 'dawp'); ?>
                    <span aria-hidden="true">→</span>
                </a>
                <a href="<?php echo esc_url($cat_url('best-seller')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border-2 border-foreground px-7 py-3 font-heading text-base font-bold uppercase tracking-wider text-foreground transition hover:bg-foreground hover:text-background">
                    <?php esc_html_e('Best Sellers', 'dawp'); ?>
                </a>
            </div>

            <div class="mt-9">
                <p class="font-heading text-sm font-semibold uppercase tracking-[0.18em] text-muted"><?php esc_html_e('Shop by branch', 'dawp'); ?></p>
                <ul class="mt-3 flex flex-wrap gap-2">
                    <?php foreach ($branches as $branch) : ?>
                        <li>
                            <a href="<?php echo esc_url($cat_url($branch['slug'])); ?>" class="inline-flex min-h-10 items-center gap-1.5 rounded-sm border border-border-strong bg-[#FFFFFF] px-3.5 text-sm font-semibold text-foreground transition hover:border-foreground hover:bg-foreground hover:text-background">
                                <span class="text-[0.65rem] text-highlight" aria-hidden="true">★</span><?php echo esc_html($branch['title']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="relative mx-auto w-full max-w-xl">
            <div class="relative overflow-hidden rounded-lg border border-border-strong bg-surface p-2 shadow-card-hover">
                <img src="<?php echo esc_url($home_img('hero')); ?>" alt="<?php esc_attr_e('A proud American veteran on his front porch wearing a navy patriotic veteran tee', 'dawp'); ?>" width="1200" height="900" fetchpriority="high" class="block aspect-[4/3] h-auto w-full rounded-md object-cover">
            </div>
            <span class="absolute -right-2 -top-6 inline-flex h-28 w-28 flex-col items-center justify-center rounded-full border-4 border-background bg-highlight text-center text-foreground shadow-card-hover sm:-right-6 sm:h-32 sm:w-32" aria-hidden="true">
                <span class="text-base leading-none">★★★</span>
                <span class="font-display mt-1 text-xl uppercase leading-none sm:text-2xl"><?php esc_html_e('Proudly', 'dawp'); ?></span>
                <span class="font-display text-xl uppercase leading-none sm:text-2xl"><?php esc_html_e('Served', 'dawp'); ?></span>
            </span>
            <div class="absolute -bottom-6 left-4 flex items-center gap-3 rounded-md border border-border-strong bg-background px-4 py-3 shadow-card-hover sm:left-6">
                <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-accent-2 text-background" aria-hidden="true">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 17h4V5H3v12h2"></path><path d="M14 8h4l3 3v6h-3"></path><circle cx="7" cy="17" r="2"></circle><circle cx="16" cy="17" r="2"></circle></svg>
                </span>
                <span class="text-sm font-bold leading-tight text-foreground"><?php esc_html_e('Free US shipping on $49+', 'dawp'); ?><br><span class="font-medium text-muted"><?php esc_html_e('Tracking on every order', 'dawp'); ?></span></span>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     HONOR TICKER
     ============================================================ -->
<div class="honor-ticker" aria-hidden="true">
    <div class="honor-ticker__track">
        <?php for ($i = 0; $i < 2; $i++) : ?>
            <?php foreach (['Army', 'Navy', 'Air Force', 'Marines', 'Coast Guard', 'Military Families', 'Proudly Served'] as $word) : ?>
                <span class="honor-ticker__item"><?php echo esc_html($word); ?><span class="honor-ticker__star">★</span></span>
            <?php endforeach; ?>
        <?php endfor; ?>
    </div>
</div>

<?php if (!empty($new_arrivals)) : ?>
<!-- ============================================================
     NEW ARRIVALS (live WooCommerce products)
     ============================================================ -->
<section class="bg-background py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap items-end justify-between gap-4">
            <div>
                <span class="<?php echo esc_attr($eyebrow); ?>"><span aria-hidden="true">★</span><?php esc_html_e('Just landed', 'dawp'); ?></span>
                <h2 class="<?php echo esc_attr($h2); ?>"><?php esc_html_e('New arrivals', 'dawp'); ?></h2>
            </div>
            <a href="<?php echo esc_url($cat_url('new-arrivals')); ?>" class="<?php echo esc_attr($more); ?>"><?php esc_html_e('View all new →', 'dawp'); ?></a>
        </div>
        <?php $render_products($new_arrivals); ?>
    </div>
</section>
<?php endif; ?>

<!-- ============================================================
     SHOP BY CATEGORY
     ============================================================ -->
<section class="border-y border-border bg-surface py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap items-end justify-between gap-4">
            <div>
                <span class="<?php echo esc_attr($eyebrow); ?>"><span aria-hidden="true">★</span><?php esc_html_e('Shop by category', 'dawp'); ?></span>
                <h2 class="<?php echo esc_attr($h2); ?>"><?php esc_html_e('Gear up with pride', 'dawp'); ?></h2>
            </div>
            <a href="<?php echo esc_url($shop_url); ?>" class="<?php echo esc_attr($more); ?>"><?php esc_html_e('Shop everything →', 'dawp'); ?></a>
        </div>

        <div class="mt-10 grid grid-cols-2 gap-4 sm:gap-6 lg:grid-cols-4">
            <?php foreach ($product_types as $type) : ?>
                <a href="<?php echo esc_url($cat_url($type['slug'])); ?>" class="group block overflow-hidden rounded-lg border border-border bg-[#FFFFFF] transition hover:-translate-y-1 hover:border-border-strong hover:shadow-card-hover">
                    <span class="block aspect-square overflow-hidden bg-surface-alt">
                        <img src="<?php echo esc_url($home_img($type['img'])); ?>" alt="<?php echo esc_attr($type['title']); ?>" width="700" height="700" loading="lazy" class="block h-full w-full object-cover transition duration-300 group-hover:scale-105">
                    </span>
                    <span class="flex items-center justify-between gap-2 border-t-[3px] border-accent p-3 sm:p-4">
                        <span class="min-w-0">
                            <span class="font-display block text-base uppercase leading-tight tracking-wide text-foreground sm:truncate sm:text-lg"><?php echo esc_html($type['title']); ?></span>
                            <span class="mt-0.5 hidden truncate text-sm text-muted sm:block"><?php echo esc_html($type['desc']); ?></span>
                        </span>
                        <span class="hidden h-8 w-8 shrink-0 items-center justify-center rounded-full border border-border-strong text-foreground transition group-hover:border-accent group-hover:bg-accent group-hover:text-background sm:inline-flex" aria-hidden="true">→</span>
                    </span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php if (!empty($best_sellers)) : ?>
<!-- ============================================================
     BEST SELLERS (live WooCommerce products)
     ============================================================ -->
<section class="bg-background py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap items-end justify-between gap-4">
            <div>
                <span class="<?php echo esc_attr($eyebrow); ?>"><span aria-hidden="true">★</span><?php esc_html_e('Most loved', 'dawp'); ?></span>
                <h2 class="<?php echo esc_attr($h2); ?>"><?php esc_html_e('Best sellers', 'dawp'); ?></h2>
            </div>
            <a href="<?php echo esc_url($cat_url('best-seller')); ?>" class="<?php echo esc_attr($more); ?>"><?php esc_html_e('View all best sellers →', 'dawp'); ?></a>
        </div>
        <?php $render_products($best_sellers); ?>
    </div>
</section>
<?php endif; ?>

<!-- ============================================================
     SHOP BY BRANCH (navy band)
     ============================================================ -->
<section class="bg-foreground py-16 text-background lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <span class="inline-flex items-center gap-2 font-heading text-sm font-bold uppercase tracking-[0.22em] text-highlight"><span aria-hidden="true">★</span><?php esc_html_e('Shop by branch', 'dawp'); ?><span aria-hidden="true">★</span></span>
            <h2 class="font-display mt-2 text-4xl uppercase leading-[1.02] sm:text-5xl"><?php esc_html_e('Every branch. Every era.', 'dawp'); ?></h2>
            <p class="mt-4 text-base leading-relaxed text-background/70"><?php esc_html_e('Whichever uniform you wore, there’s a design here made with you in mind.', 'dawp'); ?></p>
        </div>

        <div class="mt-12 grid grid-cols-2 gap-3 sm:gap-5 lg:grid-cols-3">
            <?php foreach ($branches as $i => $branch) : ?>
                <a href="<?php echo esc_url($cat_url($branch['slug'])); ?>" class="group relative flex min-h-36 flex-col justify-between overflow-hidden rounded-lg border border-background/20 bg-accent-2 p-4 transition hover:-translate-y-1 hover:border-highlight sm:min-h-44 sm:p-7">
                    <span class="pointer-events-none absolute -bottom-10 -right-6 text-[9rem] leading-none text-background/[0.06] transition group-hover:text-highlight/20 sm:text-[12rem]" aria-hidden="true">★</span>
                    <span class="flex items-center gap-1 text-highlight" aria-hidden="true">
                        <?php for ($s = 0; $s <= $i % 3; $s++) : ?><svg viewBox="0 0 24 24" width="12" height="12" fill="currentColor"><path d="m12 2 2.9 6.6 7.1.6-5.4 4.7 1.6 7L12 17.3 5.8 21l1.6-7L2 9.2l7.1-.6Z"/></svg><?php endfor; ?>
                    </span>
                    <span class="relative mt-6">
                        <span class="font-display block text-2xl uppercase leading-none sm:text-4xl"><?php echo esc_html($branch['title']); ?></span>
                        <span class="mt-2 hidden text-sm leading-snug text-background/70 sm:block"><?php echo esc_html($branch['note']); ?></span>
                        <span class="mt-3 inline-flex items-center gap-1 font-heading text-sm font-bold uppercase tracking-wider text-highlight"><?php esc_html_e('Shop now', 'dawp'); ?><span class="transition group-hover:translate-x-1" aria-hidden="true">→</span></span>
                    </span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     WHY WEAR MILITARY APPAREL
     ============================================================ -->
<section class="bg-background py-16 lg:py-24">
    <div class="mx-auto grid max-w-7xl gap-12 px-4 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:items-start lg:gap-16 lg:px-8">
        <div class="lg:sticky lg:top-8">
            <span class="<?php echo esc_attr($eyebrow); ?>"><span aria-hidden="true">★</span><?php esc_html_e('Why it matters', 'dawp'); ?></span>
            <h2 class="<?php echo esc_attr($h2); ?>"><?php esc_html_e('Why wear military apparel?', 'dawp'); ?></h2>
            <p class="mt-5 max-w-xl text-base leading-relaxed text-foreground-muted"><?php esc_html_e('It’s more than a shirt. For veterans and military families, what you wear can carry a story, start a friendship and keep a promise to remember.', 'dawp'); ?></p>
            <div class="relative mt-8">
                <img src="<?php echo esc_url($home_img('about-shop')); ?>" alt="<?php esc_attr_e('Hands smoothing a freshly printed navy patriotic t-shirt on a print table', 'dawp'); ?>" width="1200" height="900" loading="lazy" class="block aspect-[4/3] w-full rounded-lg border border-border-strong object-cover">
                <span class="absolute -bottom-4 right-4 rounded-sm bg-accent px-3 py-1.5 font-heading text-sm font-bold uppercase tracking-wider text-background shadow-ink"><?php esc_html_e('Printed to order', 'dawp'); ?></span>
            </div>
        </div>

        <ol class="grid gap-4 sm:grid-cols-2">
            <?php foreach ($benefits as $i => $benefit) : ?>
                <li class="rounded-lg border border-border bg-[#FFFFFF] p-6 transition hover:border-border-strong hover:shadow-card-hover">
                    <span class="font-stencil text-3xl leading-none text-accent"><?php echo esc_html(str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT)); ?></span>
                    <h3 class="font-display mt-3 text-xl uppercase leading-tight text-foreground"><?php echo esc_html($benefit['title']); ?></h3>
                    <p class="mt-2 text-sm leading-relaxed text-foreground-muted"><?php echo esc_html($benefit['copy']); ?></p>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>

<!-- ============================================================
     HOW AN ORDER WORKS
     ============================================================ -->
<section id="how-it-works" class="border-y border-border bg-surface py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <span class="<?php echo esc_attr($eyebrow); ?>"><span aria-hidden="true">★</span><?php esc_html_e('From order to doorstep', 'dawp'); ?></span>
            <h2 class="<?php echo esc_attr($h2); ?>"><?php esc_html_e('How your order works', 'dawp'); ?></h2>
        </div>

        <ol class="mt-14 grid gap-8 md:grid-cols-4 md:gap-6">
            <?php foreach ($steps as $i => $step) : ?>
                <li class="relative rounded-lg border border-border bg-background p-6 pt-8">
                    <span class="font-display absolute -top-5 left-6 inline-flex h-10 w-10 items-center justify-center rounded-full border-2 border-highlight bg-foreground text-lg text-background"><?php echo esc_html($i + 1); ?></span>
                    <h3 class="font-display text-lg uppercase tracking-wide text-foreground"><?php echo esc_html($step['title']); ?></h3>
                    <p class="mt-2 text-sm leading-relaxed text-foreground-muted"><?php echo esc_html($step['copy']); ?></p>
                </li>
            <?php endforeach; ?>
        </ol>

        <p class="mt-10 text-center text-sm text-foreground-muted">
            <?php esc_html_e('Free standard US shipping on orders $49+. Under $49: $5.99 for the first item + $1.99 for each additional item.', 'dawp'); ?>
            <a href="<?php echo esc_url(home_url('/shipping-returns/')); ?>" class="font-bold text-foreground underline decoration-accent decoration-2 underline-offset-4"><?php esc_html_e('Shipping details', 'dawp'); ?></a>
        </p>
    </div>
</section>

<!-- ============================================================
     SEARCH + HAVE A QUESTION?
     ============================================================ -->
<section class="bg-accent-2 py-16 text-background lg:py-20">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:items-center lg:px-8">
        <div>
            <h2 class="font-display text-4xl uppercase leading-[1.02] sm:text-5xl"><?php esc_html_e('Looking for something specific?', 'dawp'); ?></h2>
            <p class="mt-4 max-w-lg text-base leading-relaxed text-background/80"><?php esc_html_e('Search by branch, era, rank, family role or product — e.g. “Vietnam veteran cap” or “Navy dad hoodie”.', 'dawp'); ?></p>
            <?php if (shortcode_exists('fibosearch')) :
                // FiboSearch (same as header) — own placeholder for this field only
                $home_search_label = static function ($labels) {
                    $labels['search_placeholder'] = __('e.g. veteran cap, Navy dad…', 'dawp');
                    return $labels;
                };
                add_filter('dgwt/wcas/labels', $home_search_label, 20);
                ?>
                <div class="home-search mt-6 max-w-lg">
                    <?php echo do_shortcode('[fibosearch layout="classic" style="solaris" submit_btn="1" submit_text="' . esc_attr__('Search', 'dawp') . '" mobile_overlay="0" darken_bg="0"]'); ?>
                </div>
                <?php remove_filter('dgwt/wcas/labels', $home_search_label, 20); ?>
            <?php else : ?>
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="mt-6 flex max-w-lg overflow-hidden rounded-md bg-background">
                    <label class="sr-only" for="home-product-search"><?php esc_html_e('Search products', 'dawp'); ?></label>
                    <input id="home-product-search" type="search" name="s" placeholder="<?php esc_attr_e('e.g. veteran cap, Navy dad…', 'dawp'); ?>" class="min-h-13 w-full bg-transparent px-4 text-base text-foreground outline-none placeholder:text-muted">
                    <input type="hidden" name="post_type" value="product">
                    <button type="submit" class="shrink-0 bg-accent px-6 font-heading text-base font-bold uppercase tracking-wider text-background transition hover:bg-accent-hover"><?php esc_html_e('Search', 'dawp'); ?></button>
                </form>
            <?php endif; ?>
        </div>

        <div class="rounded-lg border-t-4 border-highlight bg-background p-6 text-foreground shadow-card-hover sm:p-8">
            <h3 class="font-display text-2xl uppercase sm:text-3xl"><?php esc_html_e('Have a question?', 'dawp'); ?></h3>
            <p class="mt-3 text-sm leading-relaxed text-foreground-muted"><?php esc_html_e('Sizing, an order update or a design idea — our support team answers every email within 24 hours, Monday to Friday.', 'dawp'); ?></p>
            <div class="mt-6 grid gap-3 sm:grid-cols-2">
                <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="flex min-h-12 items-center justify-center rounded-md bg-accent px-4 font-heading text-base font-bold uppercase tracking-wider text-background shadow-ink transition hover:translate-y-[2px] hover:bg-accent-hover hover:shadow-none"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
                <a href="<?php echo esc_url(home_url('/faq/')); ?>" class="flex min-h-12 items-center justify-center rounded-md border-2 border-foreground px-4 font-heading text-base font-bold uppercase tracking-wider text-foreground transition hover:bg-foreground hover:text-background"><?php esc_html_e('Read FAQs', 'dawp'); ?></a>
            </div>
        </div>
    </div>
</section>
