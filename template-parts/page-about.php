<?php
/**
 * About page — WristUnion.
 *
 * Hardcoded content, kept consistent with the homepage, footer, FAQ, and
 * policy pages: an independent brand that hand-assembles its own watches on a
 * Seiko NH35 automatic, takes custom builds, ships free in the US,
 * and accepts 30-day returns.
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

$email   = function_exists('dawp_store_email') ? dawp_store_email() : 'support@wristunion.com';
$store   = function_exists('dawp_store_name') ? dawp_store_name() : 'WristUnion';
$address = function_exists('dawp_store_address') ? dawp_store_address() : '';

$dawp_cat_link = static function ($slug) use ($shop_url) {
    return function_exists('dawp_product_category_url') ? dawp_product_category_url($slug) : $shop_url;
};

$collections = [
    ['title' => __('Field & Everyday', 'dawp'), 'copy' => __('Durable, legible watches for daily wear.', 'dawp'),        'url' => $dawp_cat_link('field-everyday')],
    ['title' => __('Dive', 'dawp'),             'copy' => __('Water resistant, with a 120-click rotating bezel.', 'dawp'), 'url' => $dawp_cat_link('dive')],
    ['title' => __('Dress & Heritage', 'dawp'), 'copy' => __('Slim cases and restrained dials.', 'dawp'),                 'url' => $dawp_cat_link('dress-heritage')],
    ['title' => __('Custom Shop', 'dawp'),      'copy' => __('Start the one that is yours — dial, hands, case, strap.', 'dawp'), 'url' => home_url('/#build-yours')],
];

$values = [
    [
        'title' => __('Assembled by hand, one at a time', 'dawp'),
        'copy'  => __('Every WristUnion watch is built, regulated, and pressure-tested on our own bench. No batch lines. The person who cased your watch is the person who timed it.', 'dawp'),
    ],
    [
        'title' => __('Real numbers, not adjectives', 'dawp'),
        'copy'  => __('Each product page lists the movement, case diameter, thickness, lug-to-lug, lug width, crystal, and water resistance. No "premium quality" — 316L steel, sapphire crystal, 120-click bezel.', 'dawp'),
    ],
    [
        'title' => __('Fair, simple pricing', 'dawp'),
        'copy'  => __('One clear price per watch in US dollars, free US shipping on every US order, and no invented "list price" or countdown timers.', 'dawp'),
    ],
    [
        'title' => __('Backed after it ships', 'dawp'),
        'copy'  => __('A 2-year workshop warranty covers assembly and the movement, and a real person answers every message within 1 business day. Not right for you? Return it unworn within 30 days.', 'dawp'),
    ],
];
?>

<div class="bg-background text-foreground">
    <section class="bg-primary text-white">
        <div class="mx-auto max-w-3xl px-8 py-16 sm:px-14 lg:py-20">
            <p class="text-[11px] font-medium uppercase tracking-brand text-accent"><?php esc_html_e('About', 'dawp'); ?></p>
            <h1 class="mt-4 font-heading text-[clamp(2rem,5vw,3rem)] font-bold leading-[1.05]">
                <?php esc_html_e('Hand-assembled watches, built one at a time.', 'dawp'); ?>
            </h1>
            <p class="mt-5 font-serif text-lg leading-8 text-white/80">
                <?php esc_html_e('WristUnion is an independent watch brand. We assemble a short line of field, dive, and dress watches by hand, on a Japanese Seiko NH35 automatic movement, and we take custom builds to order.', 'dawp'); ?>
            </p>
        </div>
    </section>

    <section class="py-16 sm:py-20">
        <div class="mx-auto max-w-3xl px-8 sm:px-14">
            <div class="wu-prose space-y-10">
                <div>
                    <h2 class="font-heading text-xl font-semibold uppercase tracking-label"><?php esc_html_e('Why we started', 'dawp'); ?></h2>
                    <p class="mt-3 font-serif text-[17px] leading-8"><?php esc_html_e('Buying a watch online usually means guessing. Photos are inconsistent, the specs are buried three tabs deep, and the same case is sold under a dozen names. We started WristUnion to do the opposite: a tight range, honest photography, a full spec sheet on every listing, and plain answers to the questions people actually ask before they buy.', 'dawp'); ?></p>
                </div>
                <div>
                    <h2 class="font-heading text-xl font-semibold uppercase tracking-label"><?php esc_html_e('How a watch is built', 'dawp'); ?></h2>
                    <p class="mt-3 font-serif text-[17px] leading-8"><?php esc_html_e('Components are inspected by hand before anything is assembled. Dial and hands are fitted under a loupe, the movement is cased, gaskets are seated, and the caseback is torqued to spec. Then the watch is regulated over several positions, pressure-tested for its stated water resistance, and packed. If a piece does not pass, it does not ship.', 'dawp'); ?></p>
                </div>
                <div>
                    <h2 class="font-heading text-xl font-semibold uppercase tracking-label"><?php esc_html_e('What you can count on', 'dawp'); ?></h2>
                    <p class="mt-3 font-serif text-[17px] leading-8"><?php esc_html_e('Free US shipping on every order, a 30-day return window on unworn watches, a 2-year workshop warranty on assembly and the movement, secure checkout, and a real reply within 1 business day.', 'dawp'); ?></p>
                </div>
            </div>

            <h2 class="mt-16 font-heading text-xl font-semibold uppercase tracking-label"><?php esc_html_e('The range', 'dawp'); ?></h2>
            <div class="mt-6 grid gap-px bg-line sm:grid-cols-2">
                <?php foreach ($collections as $c) : ?>
                    <a href="<?php echo esc_url($c['url']); ?>" class="group bg-surface p-5 transition hover:bg-surface-alt">
                        <h3 class="font-heading text-base font-semibold text-foreground"><?php echo esc_html($c['title']); ?></h3>
                        <p class="mt-2 font-serif text-sm leading-6 text-foreground-muted"><?php echo esc_html($c['copy']); ?></p>
                        <span class="mt-3 inline-flex items-center gap-1.5 text-[11px] font-semibold uppercase tracking-label text-blued">
                            <?php esc_html_e('Open', 'dawp'); ?>
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>

            <h2 class="mt-16 font-heading text-xl font-semibold uppercase tracking-label"><?php esc_html_e('What we stand for', 'dawp'); ?></h2>
            <div class="mt-6 grid gap-px bg-line sm:grid-cols-2">
                <?php foreach ($values as $v) : ?>
                    <article class="bg-surface p-6">
                        <h3 class="font-heading text-base font-semibold text-foreground"><?php echo esc_html($v['title']); ?></h3>
                        <p class="mt-2 font-serif text-sm leading-6 text-foreground-muted"><?php echo esc_html($v['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="mt-12 border border-line bg-surface p-6">
                <h2 class="font-heading text-base font-semibold uppercase tracking-label text-foreground"><?php esc_html_e('Company details', 'dawp'); ?></h2>
                <ul class="mt-3 grid gap-2 text-sm text-foreground">
                    <li><span class="font-semibold"><?php esc_html_e('Brand:', 'dawp'); ?></span> <?php echo esc_html($store); ?></li>
                    <li>
                        <span class="font-semibold"><?php esc_html_e('Email:', 'dawp'); ?></span>
                        <a class="text-blued underline decoration-line underline-offset-4 transition hover:text-blued-hover" href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
                    </li>
                    <li><span class="font-semibold"><?php esc_html_e('Support hours:', 'dawp'); ?></span> <?php esc_html_e('Monday to Friday, 9:00 AM to 5:00 PM EST', 'dawp'); ?></li>
                    <?php if ($address) : ?>
                        <li><span class="font-semibold"><?php esc_html_e('Business address:', 'dawp'); ?></span> <?php echo esc_html($address); ?></li>
                    <?php endif; ?>
                </ul>
            </div>

            <div class="mt-10 flex flex-col gap-3 sm:flex-row">
                <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex h-12 items-center justify-center border border-primary bg-primary px-7 text-xs font-semibold uppercase tracking-button text-white transition hover:bg-transparent hover:text-primary">
                    <?php esc_html_e('Shop watches', 'dawp'); ?>
                </a>
                <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex h-12 items-center justify-center border border-primary px-7 text-xs font-semibold uppercase tracking-button text-primary transition hover:bg-primary hover:text-white">
                    <?php esc_html_e('Contact us', 'dawp'); ?>
                </a>
            </div>
        </div>
    </section>
</div>
