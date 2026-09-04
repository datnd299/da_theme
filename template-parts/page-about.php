<?php
/**
 * About page — North Time Co.
 *
 * Content is hardcoded (see theme skill) and kept consistent with the
 * homepage, footer, and policy pages: an independent US watch retailer,
 * free US shipping, 30-day returns, genuine products only, and support that
 * replies within 1 business day.
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

$new_arrivals_url = add_query_arg('orderby', 'date', $shop_url);

$email   = function_exists('dawp_store_email') ? dawp_store_email() : 'support@northtimeco.com';
$store   = function_exists('dawp_store_name') ? dawp_store_name() : 'North Time Co.';
$address = function_exists('dawp_store_address') ? dawp_store_address() : '';

// Mirrors the homepage "Shop by Category" section. Cards link to the matching
// product-category archive; "New Arrivals" links to the shop sorted by newest.
$dawp_cat_link = static function ($slug) use ($shop_url) {
    return function_exists('dawp_product_category_url') ? dawp_product_category_url($slug) : $shop_url;
};

$collections = [
    ['title' => __("Men's Watches", 'dawp'),     'copy' => __('Classic and contemporary timepieces for every occasion.', 'dawp'),    'url' => $dawp_cat_link('mens-watches')],
    ['title' => __("Women's Watches", 'dawp'),   'copy' => __('Elegant designs made to complement your style.', 'dawp'),             'url' => $dawp_cat_link('womens-watches')],
    ['title' => __('Automatic Watches', 'dawp'), 'copy' => __('Self-winding mechanical movements, powered by the motion of your wrist.', 'dawp'), 'url' => $dawp_cat_link('automatic-watches')],
    ['title' => __('New Arrivals', 'dawp'),      'copy' => __('Our latest watches and newest collections.', 'dawp'),                'url' => $new_arrivals_url],
];

$values = [
    [
        'title' => __('Genuine, and clearly described', 'dawp'),
        'copy'  => __('Every watch we sell is new and authentic, in its original manufacturer packaging. We never sell replica or counterfeit goods, and each product page lists the movement, case size, strap, and water resistance so you know exactly what you are buying.', 'dawp'),
    ],
    [
        'title' => __('Fair, simple pricing', 'dawp'),
        'copy'  => __('One clear price per watch in US dollars, with free standard shipping on every US order. No inflated "list prices" and no pressure countdowns.', 'dawp'),
    ],
    [
        'title' => __('Support that answers', 'dawp'),
        'copy'  => __('A real person replies to every message within 1 business day, Monday to Friday. If something is wrong with your order, we make it right.', 'dawp'),
    ],
    [
        'title' => __('Easy 30-day returns', 'dawp'),
        'copy'  => __('If a watch is not right for you, return it unworn within 30 days of delivery for a refund. The full policy is on our Return & Refund Policy page.', 'dawp'),
    ],
];
?>

<div class="bg-background text-foreground">
    <section class="bg-primary text-white">
        <div class="mx-auto max-w-3xl px-4 py-14 sm:px-6 lg:px-8 lg:py-16">
            <p class="font-heading text-xs font-semibold uppercase tracking-brand text-accent"><?php esc_html_e('About', 'dawp'); ?></p>
            <h1 class="mt-4 font-heading text-3xl font-bold uppercase leading-tight sm:text-4xl">
                <?php
                /* translators: %s: store name */
                printf(esc_html__('About %s', 'dawp'), esc_html($store));
                ?>
            </h1>
            <p class="mt-5 text-base leading-8 text-white/80">
                <?php esc_html_e('North Time Co. is an independent watch shop for the US market. We curate a small, focused range of men\'s, women\'s, and automatic watches so you can find a timepiece that fits how you actually live — without wading through hundreds of near-identical listings.', 'dawp'); ?>
            </p>
        </div>
    </section>

    <section class="py-14 sm:py-20">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <div class="legal-doc">
                <section>
                    <h2><?php esc_html_e('Why we started', 'dawp'); ?></h2>
                    <p><?php esc_html_e('Buying a watch online often means guessing. Photos are inconsistent, specifications are buried, and the same case shows up under a dozen names. We started North Time Co. to do the opposite: a tight selection, honest photography, complete specs, and plain-language answers to the questions people actually ask before they buy.', 'dawp'); ?></p>
                </section>
                <section>
                    <h2><?php esc_html_e('How we choose watches', 'dawp'); ?></h2>
                    <p><?php esc_html_e('Each watch has to earn its place in the collection. We look at build quality, the movement, how the watch wears on the wrist, and whether the price is fair for what you get. If a piece does not meet that bar, we do not list it.', 'dawp'); ?></p>
                </section>
                <section>
                    <h2><?php esc_html_e('What you can count on', 'dawp'); ?></h2>
                    <p><?php esc_html_e('Free standard shipping on every US order, a 30-day return window, secure checkout through PayPal, and genuine watches only. If anything goes wrong, one email gets a real reply within 1 business day.', 'dawp'); ?></p>
                </section>
            </div>

            <h2 class="mt-14 font-heading text-2xl font-bold uppercase text-foreground"><?php esc_html_e('Shop by category', 'dawp'); ?></h2>
            <div class="mt-6 grid gap-4 sm:grid-cols-2">
                <?php foreach ($collections as $c) : ?>
                    <a href="<?php echo esc_url($c['url']); ?>" class="group rounded-xl border border-line bg-white p-5 transition hover:-translate-y-1 hover:border-primary/20 hover:shadow-card-hover">
                        <h3 class="font-heading text-base font-bold uppercase text-foreground"><?php echo esc_html($c['title']); ?></h3>
                        <p class="mt-2 text-sm leading-6 text-muted"><?php echo esc_html($c['copy']); ?></p>
                        <span class="mt-4 inline-flex items-center text-sm font-bold text-primary">
                            <?php esc_html_e('Browse', 'dawp'); ?>
                            <svg class="ml-2 transition group-hover:translate-x-1" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>

            <h2 class="mt-14 font-heading text-2xl font-bold uppercase text-foreground"><?php esc_html_e('What we stand for', 'dawp'); ?></h2>
            <div class="mt-6 grid gap-4 sm:grid-cols-2">
                <?php foreach ($values as $v) : ?>
                    <article class="rounded-xl border border-line bg-white p-6">
                        <h3 class="font-heading text-base font-bold uppercase text-foreground"><?php echo esc_html($v['title']); ?></h3>
                        <p class="mt-2 text-sm leading-6 text-muted"><?php echo esc_html($v['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="mt-12 rounded-xl border border-line bg-white p-6">
                <h2 class="font-heading text-base font-bold uppercase text-foreground"><?php esc_html_e('Company details', 'dawp'); ?></h2>
                <ul class="mt-3 grid gap-2 text-sm text-foreground">
                    <li><span class="font-semibold"><?php esc_html_e('Store:', 'dawp'); ?></span> <?php echo esc_html($store); ?></li>
                    <li>
                        <span class="font-semibold"><?php esc_html_e('Email:', 'dawp'); ?></span>
                        <a class="text-primary underline decoration-accent decoration-2 underline-offset-4 transition hover:text-accent" href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
                    </li>
                    <li><span class="font-semibold"><?php esc_html_e('Support hours:', 'dawp'); ?></span> <?php esc_html_e('Monday to Friday, 9:00 AM to 5:00 PM EST', 'dawp'); ?></li>
                    <?php if ($address) : ?>
                        <li><span class="font-semibold"><?php esc_html_e('Business address:', 'dawp'); ?></span> <?php echo esc_html($address); ?></li>
                    <?php endif; ?>
                </ul>
            </div>

            <div class="mt-10 flex flex-col gap-3 sm:flex-row">
                <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-lg bg-accent px-6 text-sm font-bold uppercase tracking-wide text-primary transition hover:bg-accent-hover">
                    <?php esc_html_e('Shop all watches', 'dawp'); ?>
                </a>
                <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-lg border border-primary px-6 text-sm font-bold uppercase tracking-wide text-primary transition hover:bg-primary hover:text-white">
                    <?php esc_html_e('Contact us', 'dawp'); ?>
                </a>
            </div>
        </div>
    </section>
</div>
