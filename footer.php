<?php
/**
 * Theme footer.
 *
 * @package dawp
 */

$current_year = date_i18n('Y');
$brand_name   = 'Carlton Edgeworth';
$store_address = dawp_get_woocommerce_store_address();

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
    ['title' => __('Shipping Policy', 'dawp'), 'url' => home_url('/shipping-policy/')],
    ['title' => __('Return & Refund Policy', 'dawp'), 'url' => home_url('/return-refund-policy/')],
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
    .ce-social-link {
        background-color: var(--ce-social-color);
        border-color: var(--ce-social-color);
        color: #fff;
    }

    .ce-social-link:hover,
    .ce-social-link:focus-visible {
        background-color: #fff;
        border-color: var(--ce-social-color);
        color: var(--ce-social-color);
        transform: translateY(-2px);
    }

    .ce-social-link svg {
        fill: currentColor;
    }

    .ce-trust-slider {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .ce-trust-slider::-webkit-scrollbar {
        display: none;
    }

    @media (max-width: 639px) {
        .ce-trust-slide {
            flex: 0 0 min(82vw, 20rem);
        }
    }
</style>

<footer id="colophon" class="bg-[#1B4F49] text-white" role="contentinfo">
    <section class="border-b border-[#E8D9A6] bg-[#F7F5EF] text-[#1F2937]">
        <div class="ce-trust-slider mx-auto flex max-w-7xl snap-x snap-mandatory gap-4 overflow-x-auto px-4 py-8 sm:grid sm:grid-cols-2 sm:overflow-visible sm:px-6 lg:grid-cols-4 lg:px-8">
            <?php foreach ($trust_items as $item) : ?>
                <div class="ce-trust-slide snap-center rounded-lg border border-[#E8D9A6] bg-white p-5 shadow-sm sm:w-auto">
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
                        <?php echo dawp_responsive_image_attrs(get_template_directory_uri() . '/assets/img/logo.png', 160, 160, [[80, 80], [160, 160], [320, 320]], '80px', 'h-20 w-auto', 'lazy'); ?>
                        alt="<?php echo esc_attr($brand_name); ?>"
                    >
                </a>

                <div class="mt-5 space-y-1.5 text-sm leading-6 text-white/75">
                    <p>
                        <strong class="text-white"><?php esc_html_e('Support:', 'dawp'); ?></strong>
                        <a href="mailto:support@carltonedgeworth.net" class="transition hover:text-[#C89B3C]">support@carltonedgeworth.net</a>
                    </p>
                    <?php if ($store_address !== '') : ?>
                        <p>
                            <strong class="text-white"><?php esc_html_e('Address:', 'dawp'); ?></strong>
                            <?php echo esc_html($store_address); ?>
                        </p>
                    <?php endif; ?>
                    <p>
                        <strong class="text-white"><?php esc_html_e('Business Hours:', 'dawp'); ?></strong>
                        <?php esc_html_e('Monday - Friday, 9:00 AM - 6:00 PM EST', 'dawp'); ?>
                    </p>
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
                                <?php echo dawp_responsive_image_attrs($method['image'], 80, 48, [[80, 48], [160, 96]], '80px', 'h-7 w-auto rounded bg-white shadow-sm', 'lazy'); ?>
                                alt="<?php echo esc_attr($method['label']); ?>"
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
