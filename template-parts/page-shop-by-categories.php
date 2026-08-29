<?php
/**
 * Shop By Style — YourWatchStore. Tailwind utilities only.
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

$style_defs = [
    ['slug' => 'dive-watches',        'name' => __('Dive Watches', 'dawp'),        'copy' => __('Rotating timing bezels, high-contrast luminous dials, screw-down crowns, and water resistance meant for the water. The most versatile everyday sports watch.', 'dawp')],
    ['slug' => 'field-watches',       'name' => __('Field Watches', 'dawp'),       'copy' => __('Clean, legible dials, matte cases, and hard-wearing straps. A utilitarian classic that reads instantly and goes with everything.', 'dawp')],
    ['slug' => 'dress-watches',       'name' => __('Dress Watches', 'dawp'),       'copy' => __('Slim cases, restrained dials, and thin straps that disappear under a cuff. Built for the office and occasions rather than the pool.', 'dawp')],
    ['slug' => 'chronograph-watches', 'name' => __('Chronograph Watches', 'dawp'), 'copy' => __('Stopwatch complications with sub-dials and pushers, often with a tachymeter scale. For timing laps, cooking, workouts, or anything on a deadline.', 'dawp')],
];

$cards = [];
foreach ($style_defs as $def) {
    $term  = function_exists('get_term_by') ? get_term_by('slug', $def['slug'], 'product_cat') : null;
    $url   = $shop_url;
    $count = null;
    $img   = '';

    if ($term && !is_wp_error($term)) {
        $link  = get_term_link($term);
        $url   = is_wp_error($link) ? $shop_url : $link;
        $count = (int) $term->count;
        $thumb = get_term_meta($term->term_id, 'thumbnail_id', true);
        if ($thumb) {
            $img = wp_get_attachment_image_url($thumb, 'medium_large');
        }
    }

    $cards[] = [
        'name'  => $def['name'],
        'copy'  => $def['copy'],
        'url'   => $url,
        'count' => $count,
        'image' => $img,
    ];
}
?>

<div class="bg-background text-foreground">
    <section class="border-b border-border">
        <div class="mx-auto max-w-3xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
            <p class="text-xs font-bold uppercase tracking-[0.16em] text-accent-blush"><?php esc_html_e('Collections', 'dawp'); ?></p>
            <h1 class="mt-4 font-heading text-4xl font-extrabold leading-tight tracking-tight text-foreground sm:text-5xl"><?php esc_html_e('Shop by Style', 'dawp'); ?></h1>
            <p class="mt-5 text-base leading-7 text-foreground-muted"><?php esc_html_e('Four styles cover most of how people actually wear a watch. Start with the one that fits your day.', 'dawp'); ?></p>
        </div>
    </section>

    <section class="mx-auto max-w-[1280px] px-4 py-14 sm:px-6 lg:px-8 lg:py-16">
        <div class="grid gap-5 sm:grid-cols-2">
            <?php foreach ($cards as $card) : ?>
                <a href="<?php echo esc_url($card['url']); ?>" class="group flex flex-col overflow-hidden rounded-md border border-border bg-surface transition hover:border-foreground hover:shadow-card-hover sm:flex-row">
                    <div class="flex aspect-[4/3] w-full shrink-0 items-center justify-center overflow-hidden bg-surface-alt sm:aspect-auto sm:w-44">
                        <?php if (!empty($card['image'])) : ?>
                            <img src="<?php echo esc_url($card['image']); ?>" alt="<?php echo esc_attr($card['name']); ?>" class="h-full w-full object-cover transition duration-500 group-hover:scale-[1.03]" width="400" height="400" loading="lazy">
                        <?php else : ?>
                            <svg viewBox="0 0 24 24" width="40" height="40" fill="none" stroke="currentColor" stroke-width="1.4" class="text-foreground/25" aria-hidden="true"><circle cx="12" cy="12" r="6"/><path d="M12 12V8.5M12 12l2.5 1.5M9.5 3h5M9.5 21h5"/></svg>
                        <?php endif; ?>
                    </div>
                    <div class="flex flex-1 flex-col p-6">
                        <div class="flex items-baseline justify-between gap-3">
                            <h2 class="font-heading text-lg font-bold text-foreground"><?php echo esc_html($card['name']); ?></h2>
                            <?php if (is_int($card['count'])) : ?>
                                <span class="shrink-0 text-xs font-semibold uppercase tracking-[0.08em] text-muted">
                                    <?php printf(esc_html(_n('%d watch', '%d watches', $card['count'], 'dawp')), $card['count']); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        <p class="mt-2 text-sm leading-6 text-foreground-muted"><?php echo esc_html($card['copy']); ?></p>
                        <span class="mt-4 inline-flex items-center text-sm font-semibold text-accent-blush"><?php esc_html_e('Shop the collection', 'dawp'); ?><span class="ml-1.5 transition group-hover:translate-x-0.5" aria-hidden="true">&rarr;</span></span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>

        <div class="mt-10 text-center">
            <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-[3rem] items-center justify-center rounded-sm border border-foreground bg-transparent px-7 text-sm font-semibold uppercase tracking-[0.06em] text-foreground transition hover:bg-foreground hover:text-white">
                <?php esc_html_e('Shop All Watches', 'dawp'); ?>
            </a>
        </div>
    </section>
</div>
