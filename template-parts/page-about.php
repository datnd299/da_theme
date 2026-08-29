<?php
/**
 * About page — YourWatchStore. Tailwind utilities only.
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

$support_email  = 'support@yourwatchstore.com';
$business_hours = __('Monday - Friday, 9:00 AM - 5:00 PM EST', 'dawp');

$dawp_cat_url = static function ($slug) use ($shop_url) {
    if (function_exists('get_term_by')) {
        $term = get_term_by('slug', $slug, 'product_cat');
        if ($term && !is_wp_error($term)) {
            $link = get_term_link($term);
            if (!is_wp_error($link)) {
                return $link;
            }
        }
    }
    return $shop_url;
};

$pillars = [
    [
        'title' => __('Inspected before it ships', 'dawp'),
        'copy'  => __('Every watch is checked for timekeeping, crown and pusher action, and strap hardware before it is packed — not just pulled from a shelf and sent.', 'dawp'),
    ],
    [
        'title' => __('Four styles, one standard', 'dawp'),
        'copy'  => __('Dive, field, dress, and chronograph — a focused range of automatic watches so you can compare and choose without wading through a thousand listings.', 'dawp'),
    ],
    [
        'title' => __('Support you can reach', 'dawp'),
        'copy'  => __('Questions about sizing, movement care, or an order are answered by a real person, Monday through Friday.', 'dawp'),
    ],
];

$categories = [
    ['name' => __('Dive Watches', 'dawp'),        'slug' => 'dive-watches',        'copy' => __('Rotating bezels, luminous dials, real water resistance.', 'dawp')],
    ['name' => __('Field Watches', 'dawp'),       'slug' => 'field-watches',       'copy' => __('Legible, rugged, and unfussy — a daily-wear classic.', 'dawp')],
    ['name' => __('Dress Watches', 'dawp'),       'slug' => 'dress-watches',       'copy' => __('Slim cases and clean dials that finish an outfit.', 'dawp')],
    ['name' => __('Chronograph Watches', 'dawp'), 'slug' => 'chronograph-watches', 'copy' => __('Stopwatch complications and sub-dials for timing.', 'dawp')],
];
?>

<div class="bg-background text-foreground">
    <section class="border-b border-border">
        <div class="mx-auto max-w-3xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
            <p class="text-xs font-bold uppercase tracking-[0.16em] text-accent-blush"><?php esc_html_e('About', 'dawp'); ?></p>
            <h1 class="mt-4 font-heading text-4xl font-extrabold leading-tight tracking-tight text-foreground sm:text-5xl"><?php esc_html_e('Mechanical watches, chosen for everyday wear.', 'dawp'); ?></h1>
            <p class="mt-5 text-lg leading-8 text-foreground-muted"><?php esc_html_e('YourWatchStore is an online watch shop built around a simple idea: an automatic watch should be something you actually wear, not something you keep in a drawer.', 'dawp'); ?></p>
        </div>
    </section>

    <section class="mx-auto max-w-3xl px-4 py-14 sm:px-6 lg:px-8 lg:py-16">
        <div class="space-y-6 text-base leading-8 text-foreground-muted">
            <p><?php esc_html_e('We stock automatic dive, field, dress, and chronograph watches — the four styles that cover most of how people actually use a watch. Instead of an endless catalog, we keep the range tight and the specifications clear: movement, water resistance, crystal, case size, and strap width are listed on every product page so you know exactly what you are buying.', 'dawp'); ?></p>
            <p><?php esc_html_e('Before anything ships, it is inspected. We check that the watch keeps time, that the crown and any pushers work smoothly, that the date changes cleanly, and that the strap or bracelet hardware is secure. If a watch does not pass, it does not go out.', 'dawp'); ?></p>
            <p><?php esc_html_e('Shipping across the US is free on every order, and returns are open for 30 days on unworn watches in original condition with the box and papers. If something is wrong when it arrives, we cover the return and make it right.', 'dawp'); ?></p>
        </div>
    </section>

    <section class="border-y border-border bg-surface-alt py-14 sm:py-16">
        <div class="mx-auto max-w-[1280px] px-4 sm:px-6 lg:px-8">
            <h2 class="font-heading text-2xl font-extrabold tracking-tight text-foreground sm:text-3xl"><?php esc_html_e('What we stand for', 'dawp'); ?></h2>
            <div class="mt-8 grid gap-8 sm:grid-cols-3">
                <?php foreach ($pillars as $pillar) : ?>
                    <div>
                        <h3 class="font-heading text-lg font-bold text-foreground"><?php echo esc_html($pillar['title']); ?></h3>
                        <p class="mt-2 text-sm leading-6 text-foreground-muted"><?php echo esc_html($pillar['copy']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-[1280px] px-4 py-14 sm:px-6 lg:px-8 lg:py-16">
        <h2 class="font-heading text-2xl font-extrabold tracking-tight text-foreground sm:text-3xl"><?php esc_html_e('Explore the range', 'dawp'); ?></h2>
        <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <?php foreach ($categories as $category) : ?>
                <a href="<?php echo esc_url($dawp_cat_url($category['slug'])); ?>" class="group rounded-md border border-border bg-surface p-5 transition hover:border-foreground hover:shadow-card-hover">
                    <h3 class="font-heading text-base font-bold text-foreground"><?php echo esc_html($category['name']); ?></h3>
                    <p class="mt-2 text-sm leading-6 text-foreground-muted"><?php echo esc_html($category['copy']); ?></p>
                    <span class="mt-3 inline-flex items-center text-sm font-semibold text-accent-blush"><?php esc_html_e('Shop', 'dawp'); ?><span class="ml-1.5 transition group-hover:translate-x-0.5" aria-hidden="true">&rarr;</span></span>
                </a>
            <?php endforeach; ?>
        </div>

        <div class="mt-12 flex flex-col gap-4 rounded-md border border-border bg-surface-alt p-6 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="font-heading text-lg font-bold text-foreground"><?php esc_html_e('Questions before you buy?', 'dawp'); ?></h2>
                <p class="mt-1 text-sm leading-6 text-foreground-muted">
                    <?php
                    printf(
                        wp_kses(__('Email <a class="font-semibold text-accent-blush underline underline-offset-2" href="mailto:%1$s">%1$s</a> — %2$s.', 'dawp'), ['a' => ['class' => [], 'href' => []]]),
                        esc_attr($support_email),
                        esc_html($business_hours)
                    );
                    ?>
                </p>
            </div>
            <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-[3rem] shrink-0 items-center justify-center rounded-sm bg-foreground px-7 text-sm font-semibold uppercase tracking-[0.06em] text-white transition hover:bg-accent-hover">
                <?php esc_html_e('Shop Watches', 'dawp'); ?>
            </a>
        </div>
    </section>
</div>
