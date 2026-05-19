<?php
/**
 * Theme footer.
 *
 * @package dawp
 */

$current_year = date_i18n('Y');

$footer_shop_links = array_merge([
    ['title' => __('Shop All', 'dawp'), 'url' => home_url('/shop/')],
], function_exists('dawp_product_category_links') ? dawp_product_category_links(5) : []);

$footer_help_links = [
    ['title' => __('Shipping & Returns', 'dawp'), 'url' => home_url('/shipping-returns/')],
    ['title' => __('Privacy Policy', 'dawp'), 'url' => home_url('/privacy-policy/')],
    ['title' => __('Terms & Conditions', 'dawp'), 'url' => home_url('/terms-conditions/')],
    ['title' => __('FAQ', 'dawp'), 'url' => home_url('/faq/')],
];

$footer_policy_links = [
    ['title' => __('About Us', 'dawp'), 'url' => home_url('/about-us/')],
    ['title' => __('Contact Us', 'dawp'), 'url' => home_url('/contact-us/')],
    ['title' => __('Track Order', 'dawp'), 'url' => home_url('/track-order/')],
    ['title' => __('My Account', 'dawp'), 'url' => get_permalink(get_option('woocommerce_myaccount_page_id')) ?: home_url('/my-account/')],
    ['title' => __('Cart', 'dawp'), 'url' => function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/')],
];

$footer_payment_methods = [
    ['label' => __('Visa', 'dawp'), 'mark' => 'VISA'],
    ['label' => __('Mastercard', 'dawp'), 'mark' => 'MC'],
    ['label' => __('American Express', 'dawp'), 'mark' => 'AMEX'],
    ['label' => __('Discover', 'dawp'), 'mark' => 'DISC'],
    ['label' => __('PayPal', 'dawp'), 'mark' => 'PayPal'],
];
?>

</div><!-- #content -->

<footer id="colophon" class="bg-[#2D2633] text-white" role="contentinfo">
    <section class="border-b border-white/10 bg-[#EAF7F0] text-[#2D2633]">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-5 px-4 py-8 sm:px-6 lg:grid-cols-4 lg:px-8">
            <div class="rounded-[1.25rem] border border-white bg-white p-5 shadow-sm">
                <p class="text-xl font-black leading-snug">
                    <?php esc_html_e('Secure Checkout', 'dawp'); ?>
                </p>
                <p class="mt-2 text-sm leading-6 text-[#6B6470]">
                    <?php esc_html_e('Protected order details and a clear checkout flow.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-[1.25rem] border border-white bg-white p-5 shadow-sm">
                <p class="text-xl font-black leading-snug">
                    <?php esc_html_e('Tracking Included', 'dawp'); ?>
                </p>
                <p class="mt-2 text-sm leading-6 text-[#6B6470]">
                    <?php esc_html_e('Tracking information is provided once an order ships.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-[1.25rem] border border-white bg-white p-5 shadow-sm">
                <p class="text-xl font-black leading-snug">
                    <?php esc_html_e('30-Day Returns', 'dawp'); ?>
                </p>
                <p class="mt-2 text-sm leading-6 text-[#6B6470]">
                    <?php esc_html_e('Eligible unused items may be returned within 30 days.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-[1.25rem] border border-white bg-white p-5 shadow-sm">
                <p class="text-xl font-black leading-snug">
                    <?php esc_html_e('Support Available', 'dawp'); ?>
                </p>
                <p class="mt-2 text-sm leading-6 text-[#6B6470]">
                    <?php esc_html_e('Help with orders, shipping, returns, and product questions.', 'dawp'); ?>
                </p>
            </div>
        </div>
    </section>

    <section class="relative overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(247,201,72,0.18),transparent_34%),radial-gradient(circle_at_bottom_left,rgba(220,213,255,0.16),transparent_30%)]"></div>

        <div class="relative mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[1.15fr_0.85fr_0.85fr_0.85fr] lg:px-8 lg:py-20">
            <div>
                <a href="<?php echo esc_url(home_url('/')); ?>"
                   class="inline-flex items-center gap-3"
                   aria-label="<?php echo esc_attr(get_bloginfo('name') ?: 'One Shop Vibe'); ?>">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/gallery/Oneshopvibe/image.png'); ?>" alt="<?php esc_attr_e('One Shop Vibe', 'dawp'); ?>" class="h-12 w-auto">
                </a>


                <div class="mt-7 text-sm leading-relaxed text-white/80">
                    <strong class="block text-white"><?php esc_html_e('Address:', 'dawp'); ?></strong>
                    500 Dekalb Ave Suite 316, Brooklyn, NY 11205
                </div>

                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="https://www.facebook.com/people/One-Shop-Vibe/61575413724507/"
                       target="_blank"
                       rel="noopener noreferrer"
                       aria-label="<?php esc_attr_e('Visit One Shop Vibe on Facebook', 'dawp'); ?>"
                       class="inline-flex h-12 w-12 items-center justify-center rounded-full border-2 border-[#F7C948] bg-[#1877F2] text-white shadow-[0_0_24px_rgba(247,201,72,0.35)] ring-4 ring-white/10 transition hover:-translate-y-0.5 hover:bg-[#F7C948] hover:text-[#2D2633] hover:shadow-[0_0_32px_rgba(247,201,72,0.5)]">
                        <svg aria-hidden="true" viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                            <path d="M22 12.06C22 6.5 17.52 2 12 2S2 6.5 2 12.06c0 5.02 3.66 9.18 8.44 9.94v-7.03H7.9v-2.91h2.54V9.85c0-2.52 1.49-3.91 3.78-3.91 1.1 0 2.24.2 2.24.2v2.48H15.2c-1.24 0-1.63.78-1.63 1.57v1.87h2.77l-.44 2.91h-2.33V22C18.34 21.24 22 17.08 22 12.06z"></path>
                        </svg>
                    </a>

                    <a href="mailto:support@oneshopvibe.com"
                       class="inline-flex min-h-10 items-center justify-center rounded-full border border-white/15 px-4 text-xs font-black uppercase tracking-wide text-white/85 transition hover:border-[#F7C948] hover:text-[#F7C948]">
                        support@oneshopvibe.com
                    </a>

                    <a href="<?php echo esc_url(home_url('/shop/')); ?>"
                       class="inline-flex min-h-10 items-center justify-center rounded-full bg-white px-4 text-xs font-black uppercase tracking-wide text-[#2D2633] transition hover:bg-[#F7C948]">
                        <?php esc_html_e('Shop Beauty Essentials', 'dawp'); ?>
                    </a>
                </div>


            </div>

            <nav aria-label="<?php esc_attr_e('Footer shop navigation', 'dawp'); ?>">
                <h3 class="mb-5 text-sm font-black uppercase tracking-[0.2em] text-[#F7C948]">
                    <?php esc_html_e('Shop', 'dawp'); ?>
                </h3>

                <ul class="space-y-3">
                    <?php foreach ($footer_shop_links as $link) : ?>
                        <li>
                            <a href="<?php echo esc_url($link['url']); ?>"
                               class="text-sm font-bold text-white/72 transition hover:text-[#F7C948]">
                                <?php echo esc_html($link['title']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <nav aria-label="<?php esc_attr_e('Footer help navigation', 'dawp'); ?>">
                <h3 class="mb-5 text-sm font-black uppercase tracking-[0.2em] text-[#F7C948]">
                    <?php esc_html_e('Customer Care', 'dawp'); ?>
                </h3>

                <ul class="space-y-3">
                    <?php foreach ($footer_help_links as $link) : ?>
                        <li>
                            <a href="<?php echo esc_url($link['url']); ?>"
                               class="text-sm font-bold text-white/72 transition hover:text-[#F7C948]">
                                <?php echo esc_html($link['title']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>


            </nav>

            <nav aria-label="<?php esc_attr_e('Footer policy navigation', 'dawp'); ?>">
                <h3 class="mb-5 text-sm font-black uppercase tracking-[0.2em] text-[#F7C948]">
                    <?php esc_html_e('About', 'dawp'); ?>
                </h3>

                <ul class="space-y-3">
                    <?php foreach ($footer_policy_links as $link) : ?>
                        <?php if (!empty($link['url'])) : ?>
                            <li>
                                <a href="<?php echo esc_url($link['url']); ?>"
                                   class="text-sm font-bold text-white/72 transition hover:text-[#F7C948]">
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
                &copy; <?php echo esc_html($current_year); ?> <?php echo esc_html('One Shop Vibe'); ?>. <?php esc_html_e('All rights reserved.', 'dawp'); ?>
            </p>

            <div class="flex flex-col gap-3 lg:items-center">
                <p class="text-xs font-black uppercase tracking-[0.2em] text-white/70">
                    <?php esc_html_e('Payment Methods', 'dawp'); ?>
                </p>
                <ul class="flex flex-wrap gap-2" aria-label="<?php esc_attr_e('Accepted payment methods', 'dawp'); ?>">
                    <?php foreach ($footer_payment_methods as $method) : ?>
                        <li>
                            <span class="inline-flex min-h-8 min-w-14 items-center justify-center rounded-md border border-white/15 bg-white px-3 text-xs font-black leading-none tracking-wide text-[#2D2633] shadow-sm">
                                <span class="sr-only"><?php echo esc_html($method['label']); ?></span>
                                <span aria-hidden="true"><?php echo esc_html($method['mark']); ?></span>
                            </span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <p class="font-black uppercase tracking-[0.18em] text-[#F7C948]">
                <?php esc_html_e('Simple everyday confidence', 'dawp'); ?>
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
