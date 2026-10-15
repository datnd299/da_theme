<?php
/**
 * About page — ProudlyWear.
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

$img = static function ($name) {
    return get_template_directory_uri() . '/assets/images/home/' . $name . '.webp';
};

$values = [
    ['title' => __('Respect first', 'dawp'), 'copy' => __('Every design is reviewed to make sure it treats service, sacrifice and the flag with the respect they deserve.', 'dawp')],
    ['title' => __('Original artwork', 'dawp'), 'copy' => __('Our designs are created for ProudlyWear. We never use official military seals, emblems or insignia, and we don’t claim any government endorsement.', 'dawp')],
    ['title' => __('Made to order', 'dawp'), 'copy' => __('Nothing sits in a warehouse. Your item is printed after you order it, then checked for print quality before it ships.', 'dawp')],
    ['title' => __('Straight answers', 'dawp'), 'copy' => __('Clear prices, clear shipping times and a real person on the other end of every email — within 24 hours, Monday to Friday.', 'dawp')],
];

$range = [
    ['title' => __('For veterans', 'dawp'), 'copy' => __('Tees, hoodies, polos, caps and bomber jackets for Army, Navy, Air Force, Marine and Coast Guard veterans of every era.', 'dawp')],
    ['title' => __('For military families', 'dawp'), 'copy' => __('Proud mom, dad, spouse, son and daughter designs — because families serve too.', 'dawp')],
    ['title' => __('For the home', 'dawp'), 'copy' => __('Garden flags, house flags and metal signs for the porch, the den or the garage wall.', 'dawp')],
];
?>

<div class="bg-background text-foreground">
    <section class="border-b border-border-strong py-14 sm:py-20" aria-labelledby="about-title">
        <div class="mx-auto grid max-w-7xl gap-12 px-4 sm:px-6 lg:grid-cols-[1.05fr_1fr] lg:items-center lg:px-8">
            <div>
                <span class="font-stencil inline-flex items-center gap-2 border-y-2 border-foreground py-1 text-sm uppercase tracking-[0.2em]"><span class="text-accent" aria-hidden="true">★</span><?php esc_html_e('About ProudlyWear', 'dawp'); ?></span>
                <h1 id="about-title" class="font-display mt-5 text-5xl uppercase leading-[1] sm:text-6xl lg:text-7xl"><?php esc_html_e('Made for those who served.', 'dawp'); ?></h1>
                <p class="mt-6 max-w-xl text-lg leading-relaxed text-foreground-muted"><?php esc_html_e('ProudlyWear started with a simple idea: the men and women who served this country deserve apparel that tells their story with dignity — not a cheap novelty, but something they’re proud to wear to the reunion, the ballgame or the Fourth of July cookout.', 'dawp'); ?></p>
                <p class="mt-4 max-w-xl text-base leading-relaxed text-foreground-muted"><?php esc_html_e('Today we design tees, hoodies, polos, caps, flags and metal signs for veterans of every branch and era, and for the military families who stood beside them.', 'dawp'); ?></p>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-accent px-7 font-heading text-base font-bold uppercase tracking-wider text-background shadow-ink transition hover:translate-y-[2px] hover:bg-accent-hover hover:shadow-none"><?php esc_html_e('Shop the collection', 'dawp'); ?></a>
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border-2 border-foreground px-7 font-heading text-base font-bold uppercase tracking-wider transition hover:bg-foreground hover:text-background"><?php esc_html_e('Contact us', 'dawp'); ?></a>
                </div>
            </div>
            <div class="relative">
                <img src="<?php echo esc_url($img('about-shop')); ?>" alt="<?php esc_attr_e('Hands smoothing a freshly printed navy patriotic t-shirt on a print table', 'dawp'); ?>" width="1200" height="900" class="block aspect-[4/3] w-full rounded-lg border border-border-strong object-cover shadow-card-hover">
                <span class="absolute -bottom-5 left-5 rounded-md border-t-4 border-highlight bg-foreground px-5 py-3 font-display text-lg uppercase tracking-wide text-background"><?php esc_html_e('Printed to order', 'dawp'); ?></span>
            </div>
        </div>
    </section>

    <section class="bg-foreground py-14 text-background sm:py-20" aria-labelledby="mission-title">
        <div class="mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8">
            <p class="text-2xl tracking-[0.4em] text-highlight" aria-hidden="true">★ ★ ★</p>
            <h2 id="mission-title" class="font-display mt-4 text-4xl uppercase leading-[1.05] sm:text-5xl"><?php esc_html_e('Our mission', 'dawp'); ?></h2>
            <p class="mt-6 text-xl leading-relaxed text-background/85"><?php esc_html_e('To give every veteran and military family a way to wear their pride — honestly designed, carefully made and backed by service that treats them the way they treated this country.', 'dawp'); ?></p>
        </div>
    </section>

    <section class="py-14 sm:py-20" aria-labelledby="range-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <span class="inline-flex items-center gap-2 font-heading text-sm font-bold uppercase tracking-[0.22em] text-accent"><span aria-hidden="true">★</span><?php esc_html_e('What we make', 'dawp'); ?></span>
            <h2 id="range-title" class="font-display mt-2 text-4xl uppercase leading-[1.02] sm:text-5xl"><?php esc_html_e('Something for every proud family', 'dawp'); ?></h2>
            <div class="mt-10 grid gap-5 md:grid-cols-3">
                <?php foreach ($range as $item) : ?>
                    <div class="rounded-lg border border-border border-t-4 border-t-accent bg-[#FFFFFF] p-6">
                        <h3 class="font-display text-2xl uppercase"><?php echo esc_html($item['title']); ?></h3>
                        <p class="mt-3 text-sm leading-relaxed text-foreground-muted"><?php echo esc_html($item['copy']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="border-y border-border bg-surface py-14 sm:py-20" aria-labelledby="values-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <span class="inline-flex items-center gap-2 font-heading text-sm font-bold uppercase tracking-[0.22em] text-accent"><span aria-hidden="true">★</span><?php esc_html_e('What we stand for', 'dawp'); ?></span>
            <h2 id="values-title" class="font-display mt-2 text-4xl uppercase leading-[1.02] sm:text-5xl"><?php esc_html_e('Our promises to you', 'dawp'); ?></h2>
            <ol class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <?php foreach ($values as $i => $value) : ?>
                    <li class="rounded-lg border border-border bg-background p-6">
                        <span class="font-stencil text-3xl leading-none text-accent"><?php echo esc_html(str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT)); ?></span>
                        <h3 class="font-display mt-3 text-xl uppercase"><?php echo esc_html($value['title']); ?></h3>
                        <p class="mt-2 text-sm leading-relaxed text-foreground-muted"><?php echo esc_html($value['copy']); ?></p>
                    </li>
                <?php endforeach; ?>
            </ol>
        </div>
    </section>

    <section class="py-14 sm:py-20">
        <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-2 lg:items-center lg:px-8">
            <div>
                <h2 class="font-display text-4xl uppercase leading-[1.02] sm:text-5xl"><?php esc_html_e('A note on how we work', 'dawp'); ?></h2>
                <p class="mt-5 text-base leading-relaxed text-foreground-muted"><?php esc_html_e('ProudlyWear is an independent online store. We are not affiliated with, sponsored by or endorsed by the U.S. Department of Defense, the Department of Veterans Affairs or any branch of the U.S. Armed Forces. Our products are made to order by trusted print partners, so production takes 2–3 business days before your order ships.', 'dawp'); ?></p>
            </div>
            <div class="rounded-lg border-t-4 border-highlight bg-foreground p-6 text-background sm:p-8">
                <h3 class="font-display text-2xl uppercase"><?php esc_html_e('Questions? We’re here.', 'dawp'); ?></h3>
                <p class="mt-3 text-sm leading-relaxed text-background/80"><?php esc_html_e('Email support@proudlywear.com or use our contact form. We reply within 24 hours, Monday to Friday.', 'dawp'); ?></p>
                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="mailto:support@proudlywear.com" class="inline-flex min-h-11 items-center rounded-md bg-accent px-5 font-heading text-sm font-bold uppercase tracking-wider text-background transition hover:bg-accent-hover">support@proudlywear.com</a>
                    <a href="<?php echo esc_url(home_url('/faq/')); ?>" class="inline-flex min-h-11 items-center rounded-md border border-background/40 px-5 font-heading text-sm font-bold uppercase tracking-wider transition hover:border-highlight hover:text-highlight"><?php esc_html_e('Read FAQs', 'dawp'); ?></a>
                </div>
            </div>
        </div>
    </section>
</div>
