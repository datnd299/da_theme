<?php
/**
 * Theme footer.
 *
 * @package dawp
 */

$current_year = date_i18n('Y');
$brand_name   = 'Scott Osterbind';

$term_url = static function ($slug) {
    if (taxonomy_exists('product_cat')) {
        $term = get_term_by('slug', $slug, 'product_cat');

        if ($term && ! is_wp_error($term)) {
            $link = get_term_link($term);

            if (! is_wp_error($link)) {
                return $link;
            }
        }
    }

    return home_url('/product-category/' . sanitize_title($slug) . '/');
};

$account_id  = (int) get_option('woocommerce_myaccount_page_id');
$account_url = $account_id > 0 ? get_permalink($account_id) : home_url('/my-account/');

$footer_shop_links = [
    ['title' => __('Shop All Products', 'dawp'), 'url' => home_url('/shop/')],
    ['title' => __('Handmade Bracelets', 'dawp'), 'url' => $term_url('handmade-bracelets')],
    ['title' => __('Beaded Jewelry', 'dawp'), 'url' => $term_url('beaded-jewelry')],
    ['title' => __('Vintage Accessories', 'dawp'), 'url' => $term_url('vintage-accessories')],
    ['title' => __('Curated Apparel', 'dawp'), 'url' => $term_url('curated-apparel')],
    ['title' => __('Artisan Gifts', 'dawp'), 'url' => $term_url('artisan-gifts')],
];

$footer_help_links = [
    ['title' => __('FAQs', 'dawp'), 'url' => home_url('/faq/')],
    ['title' => __('Shipping & Returns', 'dawp'), 'url' => home_url('/shipping-returns/')],
    ['title' => __('Privacy Policy', 'dawp'), 'url' => home_url('/privacy-policy/')],
    ['title' => __('Terms & Conditions', 'dawp'), 'url' => home_url('/terms-conditions/')],
];

$footer_policy_links = [
    ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/')],
    ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/')],
    ['title' => __('Track My Order', 'dawp'), 'url' => home_url('/track-order/')],
    ['title' => __('My Account', 'dawp'), 'url' => $account_url],
];

$trust_items = [
    [
        'title' => __('Secure Checkout', 'dawp'),
        'copy'  => __('Checkout is handled through protected store payment flows.', 'dawp'),
    ],
    [
        'title' => __('Tracking Included', 'dawp'),
        'copy'  => __('Tracking information is provided once an order ships.', 'dawp'),
    ],
    [
        'title' => __('30-Day Returns', 'dawp'),
        'copy'  => __('Eligible unused, unworn items may be returned within 30 days.', 'dawp'),
    ],
    [
        'title' => __('Clear Product Details', 'dawp'),
        'copy'  => __('Review materials, sizing, care notes, and handmade variation details.', 'dawp'),
    ],
];

$footer_payment_methods = [
    [
        'label' => __('JCB', 'dawp'),
        'image' => get_template_directory_uri() . '/assets/img/gallery/Oneshopvibe/payment/image copy.png',
    ],
    [
        'label' => __('MasterCard', 'dawp'),
        'image' => get_template_directory_uri() . '/assets/img/gallery/Oneshopvibe/payment/image copy 2.png',
    ],
    [
        'label' => __('PayPal', 'dawp'),
        'image' => get_template_directory_uri() . '/assets/img/gallery/Oneshopvibe/payment/image copy 3.png',
    ],
    [
        'label' => __('Visa', 'dawp'),
        'image' => get_template_directory_uri() . '/assets/img/gallery/Oneshopvibe/payment/image copy 4.png',
    ],
];
?>

</div><!-- #content -->

<style>
    .scott-social-link {
        background-color: var(--scott-social-color);
        border-color: var(--scott-social-color);
        color: #fff;
    }

    .scott-social-link:hover,
    .scott-social-link:focus-visible {
        background-color: #fff;
        border-color: var(--scott-social-color);
        color: var(--scott-social-color);
        transform: translateY(-2px);
    }

    .scott-social-link svg {
        fill: currentColor;
    }
</style>

<footer id="colophon" class="bg-[#1B4F49] text-white" role="contentinfo">
    <section class="border-b border-[#E8D9A6] bg-[#F7F5EF] text-[#1F2937]">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-4 px-4 py-8 sm:grid-cols-2 sm:px-6 lg:grid-cols-4 lg:px-8">
            <?php foreach ($trust_items as $item) : ?>
                <div class="rounded-lg border border-[#E8D9A6] bg-white p-5 shadow-sm">
                    <div class="mb-4 flex h-10 w-10 items-center justify-center rounded-full bg-[#6E9B8E] text-white">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <p class="font-heading text-lg font-black leading-snug text-[#1F6F68]">
                        <?php echo esc_html($item['title']); ?>
                    </p>
                    <p class="mt-2 text-sm leading-6 text-[#475569]">
                        <?php echo esc_html($item['copy']); ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section>
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-8 px-4 py-10 sm:px-6 lg:grid-cols-[1.2fr_0.8fr_0.8fr_0.8fr] lg:px-8 lg:py-12">
            <div>
                <a href="<?php echo esc_url(home_url('/')); ?>"
                   class="inline-flex items-center gap-3"
                   aria-label="<?php echo esc_attr($brand_name); ?>">
                    <img
                        src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/Logo_Scott.png'); ?>"
                        alt="<?php echo esc_attr($brand_name); ?>"
                        width="220"
                        height="80"
                        loading="lazy"
                        class="h-20 w-auto"
                    >
                </a>

                <div class="mt-5 space-y-1.5 text-sm leading-6 text-white/75">
                    <p>
                        <strong class="text-white"><?php esc_html_e('Support:', 'dawp'); ?></strong>
                        <a href="mailto:support@scottosterbind.com" class="transition hover:text-[#C89B3C]">support@scottosterbind.com</a>
                    </p>
                    <p>
                        <strong class="text-white"><?php esc_html_e('Address:', 'dawp'); ?></strong>
                        <?php esc_html_e('2822 Holsted Dr, Murfreesboro, TN 37128', 'dawp'); ?>
                    </p>
                    <p>
                        <strong class="text-white"><?php esc_html_e('Business Hours:', 'dawp'); ?></strong>
                        <?php esc_html_e('Monday - Friday, 9:00 AM - 6:00 PM EST', 'dawp'); ?>
                    </p>
                </div>

                <div class="mt-5 flex flex-wrap gap-3" aria-label="<?php esc_attr_e('Social links', 'dawp'); ?>">
                    <a
                        href="https://www.facebook.com/beadbracelets"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="scott-social-link inline-flex h-12 w-12 items-center justify-center rounded-full border shadow-lg shadow-black/20 transition"
                        style="--scott-social-color: #1877F2;"
                        aria-label="<?php esc_attr_e('Facebook', 'dawp'); ?>"
                    >
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M22 12.06C22 6.5 17.52 2 12 2S2 6.5 2 12.06C2 17.08 5.66 21.25 10.44 22v-7.03H7.9v-2.91h2.54V9.85c0-2.52 1.49-3.91 3.77-3.91 1.09 0 2.23.2 2.23.2V8.6h-1.25c-1.24 0-1.63.77-1.63 1.56v1.9h2.77l-.44 2.91h-2.33V22C18.34 21.25 22 17.08 22 12.06z" />
                        </svg>
                    </a>
                    <a
                        href="https://www.etsy.com/shop/scottosterbind"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="scott-social-link inline-flex h-12 w-12 items-center justify-center rounded-full border shadow-lg shadow-black/20 transition"
                        style="--scott-social-color: #F1641E;"
                        aria-label="<?php esc_attr_e('Etsy', 'dawp'); ?>"
                    >
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M7.1 3h9.99c.41 0 .64.1.74.52.17.73.3 1.47.47 2.2l-.38.12c-.62-1.17-1.58-1.71-2.88-1.71H10.2v6.41h3.92c1 0 1.55-.37 1.79-1.36h.39v4.12h-.39c-.26-1.02-.78-1.38-1.79-1.38H10.2v6.78h5.08c1.38 0 2.33-.62 3.08-1.86l.37.14c-.2.79-.39 1.59-.6 2.38-.11.4-.31.52-.72.52H7.1v-.37c.9-.16 1.14-.42 1.14-1.33V4.69c0-.88-.24-1.14-1.14-1.32V3z" />
                        </svg>
                    </a>
                </div>

            </div>

            <nav aria-label="<?php esc_attr_e('Footer shop navigation', 'dawp'); ?>">
                <h3 class="mb-5 text-sm font-black uppercase tracking-[0.2em] text-[#C89B3C]">
                    <?php esc_html_e('Shop', 'dawp'); ?>
                </h3>

                <ul class="space-y-3">
                    <?php foreach ($footer_shop_links as $link) : ?>
                        <li>
                            <a href="<?php echo esc_url($link['url']); ?>"
                               class="text-sm font-bold text-white/72 transition hover:text-[#C89B3C]">
                                <?php echo esc_html($link['title']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <nav aria-label="<?php esc_attr_e('Footer help navigation', 'dawp'); ?>">
                <h3 class="mb-5 text-sm font-black uppercase tracking-[0.2em] text-[#C89B3C]">
                    <?php esc_html_e('Policy', 'dawp'); ?>
                </h3>

                <ul class="space-y-3">
                    <?php foreach ($footer_help_links as $link) : ?>
                        <li>
                            <a href="<?php echo esc_url($link['url']); ?>"
                               class="text-sm font-bold text-white/72 transition hover:text-[#C89B3C]">
                                <?php echo esc_html($link['title']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <nav aria-label="<?php esc_attr_e('Footer policy navigation', 'dawp'); ?>">
                <h3 class="mb-5 text-sm font-black uppercase tracking-[0.2em] text-[#C89B3C]">
                    <?php esc_html_e('Company', 'dawp'); ?>
                </h3>

                <ul class="space-y-3">
                    <?php foreach ($footer_policy_links as $link) : ?>
                        <?php if (! empty($link['url'])) : ?>
                            <li>
                                <a href="<?php echo esc_url($link['url']); ?>"
                                   class="text-sm font-bold text-white/72 transition hover:text-[#C89B3C]">
                                    <?php echo esc_html($link['title']); ?>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
    </section>

    <div class="border-t border-white/10">
        <div class="mx-auto flex max-w-7xl flex-col gap-4 px-4 py-6 text-sm text-white/60 sm:px-6 lg:flex-row lg:items-center lg:justify-between lg:px-8">
            <p>
                &copy; <?php echo esc_html($current_year); ?> <?php echo esc_html($brand_name); ?>. <?php esc_html_e('All rights reserved.', 'dawp'); ?>
            </p>

            <div class="flex flex-col gap-3 lg:items-center">
                <p class="text-xs font-black uppercase tracking-[0.2em] text-white/70">
                    <?php esc_html_e('Payment Methods', 'dawp'); ?>
                </p>
                <ul class="flex flex-wrap gap-1.5" aria-label="<?php esc_attr_e('Accepted payment methods', 'dawp'); ?>">
                    <?php foreach ($footer_payment_methods as $method) : ?>
                        <li>
                            <img
                                src="<?php echo esc_url($method['image']); ?>"
                                alt="<?php echo esc_attr($method['label']); ?>"
                                width="80"
                                height="48"
                                loading="lazy"
                                class="h-7 w-auto rounded bg-white shadow-sm"
                            >
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <p class="font-black uppercase tracking-[0.18em] text-[#C89B3C]">
                <?php esc_html_e('Handmade. Curated. Personal.', 'dawp'); ?>
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
