<?php
/**
 * Homepage for MyBaapStore.
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
$home_image_url = trailingslashit(get_template_directory_uri()) . 'assets/img/home/';

$mybaap_category_url = static function ($slug) {
    if (function_exists('get_term_by')) {
        $term = get_term_by('slug', $slug, 'product_cat');

        if ($term && !is_wp_error($term)) {
            $link = get_term_link($term);

            if (!is_wp_error($link)) {
                return $link;
            }
        }
    }

    return home_url('/product-category/' . trim($slug, '/') . '/');
};

$categories = [
    [
        'name' => 'Smart Gadgets',
        'description' => 'Useful small gadgets selected for simple everyday convenience.',
        'url' => $mybaap_category_url('smart-gadgets'),
        'image' => $home_image_url . 'category-smart-gadgets.jpg',
        'alt' => 'Small everyday tech tools arranged on a clean desk',
    ],
    [
        'name' => 'Home & Kitchen Gadgets',
        'description' => 'Helpful tools for kitchen prep, storage, drinkware, and home routines.',
        'url' => $mybaap_category_url('home-kitchen-gadgets'),
        'image' => $home_image_url . 'category-home-kitchen.jpg',
        'alt' => 'Clean kitchen counter with practical kitchen tools',
    ],
    [
        'name' => 'Personal Care Devices',
        'description' => 'Simple grooming tools designed for everyday personal care routines.',
        'url' => $mybaap_category_url('personal-care-devices'),
        'image' => $home_image_url . 'category-personal-care.jpg',
        'alt' => 'Personal care items arranged on a bright bathroom vanity',
    ],
    [
        'name' => 'Camera & Tech Accessories',
        'description' => 'Practical camera, video, and tech accessories for normal daily use.',
        'url' => $mybaap_category_url('camera-tech-accessories'),
        'image' => $home_image_url . 'category-camera-tech.jpg',
        'alt' => 'Camera and desk accessories in a normal content creation setup',
    ],
    [
        'name' => 'Daily Tools',
        'description' => 'Compact accessories for travel, daily carry, and small everyday tasks.',
        'url' => $mybaap_category_url('daily-tools'),
        'image' => $home_image_url . 'category-daily-tools.jpg',
        'alt' => 'Compact travel accessories arranged neatly for daily use',
    ],
];

$kitchen_highlights = [
    'Kitchen helpers',
    'Drinkware tools',
    'Home convenience',
    'Easy everyday use',
];

$trust_cards = [
    [
        'title' => 'Secure Checkout',
        'copy' => 'Shop with a simple and secure checkout experience.',
        'icon' => 'lock',
    ],
    [
        'title' => 'Tracking Included',
        'copy' => 'Tracking information is provided once your order ships.',
        'icon' => 'truck',
    ],
    [
        'title' => 'Shipping Timeline',
        'copy' => 'Orders are processed within 2-4 business days. Standard US shipping typically takes 5-10 business days after dispatch.',
        'icon' => 'calendar',
    ],
    [
        'title' => '30-Day Returns',
        'copy' => 'Eligible unused items may be returned within 30 days of delivery. Personal care devices may be subject to hygiene-related return conditions.',
        'icon' => 'refresh',
    ],
];

$render_icon = static function ($icon) {
    $icons = [
        'lock' => '<path d="M7 11V8a5 5 0 0 1 10 0v3"/><rect width="14" height="10" x="5" y="11" rx="2"/><path d="M12 15v2"/>',
        'truck' => '<path d="M10 17h4V5H3v12h2"/><path d="M14 8h4l3 3v6h-3"/><circle cx="7" cy="17" r="2"/><circle cx="16" cy="17" r="2"/>',
        'calendar' => '<path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/>',
        'refresh' => '<path d="M20 12a8 8 0 0 1-13.66 5.66L4 15"/><path d="M4 20v-5h5"/><path d="M4 12A8 8 0 0 1 17.66 6.34L20 9"/><path d="M20 4v5h-5"/>',
    ];

    return $icons[$icon] ?? $icons['lock'];
};
?>

<div class="bg-white text-[#1F2937]">
    <section class="bg-[#EAF4FF]" aria-labelledby="mybaap-hero-title">
        <div class="mx-auto grid max-w-7xl gap-12 px-4 py-16 sm:px-6 lg:grid-cols-[1fr_0.92fr] lg:items-center lg:px-8 lg:py-20">
            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#2F80ED]">
                    <?php esc_html_e('Practical Gadgets & Daily Tools', 'dawp'); ?>
                </p>
                <h1 id="mybaap-hero-title" class="mt-5 max-w-3xl text-4xl font-extrabold leading-tight text-[#102A43] sm:text-5xl lg:text-6xl">
                    <?php esc_html_e('Smart Little Tools For Everyday Living', 'dawp'); ?>
                </h1>
                <p class="mt-6 max-w-2xl text-lg leading-8 text-[#667085]">
                    <?php esc_html_e('Discover practical gadgets for home, kitchen, grooming, tech accessories, and daily routines - selected to make everyday tasks simpler.', 'dawp'); ?>
                </p>

                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url($new_arrivals_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-xl bg-[#2F80ED] px-6 text-sm font-bold text-white transition hover:bg-[#102A43]">
                        <?php esc_html_e('Shop New Arrivals', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-xl border border-[#2F80ED] bg-white px-6 text-sm font-bold text-[#2F80ED] transition hover:bg-[#EAF4FF]">
                        <?php esc_html_e('Shop All Products', 'dawp'); ?>
                    </a>
                </div>

                <div class="mt-8 flex flex-wrap gap-3 text-sm font-semibold text-[#102A43]">
                    <span class="rounded-full border border-[#2F80ED]/20 bg-white px-4 py-2"><?php esc_html_e('Useful products', 'dawp'); ?></span>
                    <span class="rounded-full border border-[#2F80ED]/20 bg-white px-4 py-2"><?php esc_html_e('Clear support', 'dawp'); ?></span>
                    <span class="rounded-full border border-[#2F80ED]/20 bg-white px-4 py-2"><?php esc_html_e('Everyday convenience', 'dawp'); ?></span>
                </div>
            </div>

            <div class="relative">
                <div class="overflow-hidden rounded-2xl border border-white bg-white p-4 shadow-xl shadow-[#102A43]/15">
                    <div class="grid gap-4 sm:grid-cols-2">
                        <img src="<?php echo esc_url($home_image_url . 'home-hero-gadgets.jpg'); ?>" alt="<?php esc_attr_e('Clean desk with practical small home, grooming, kitchen, and tech gadgets', 'dawp'); ?>" class="aspect-[4/3] h-full w-full rounded-xl object-cover" loading="eager" decoding="async">
                        <div class="grid gap-4">
                            <img src="<?php echo esc_url($home_image_url . 'category-home-kitchen.jpg'); ?>" alt="<?php esc_attr_e('Bright kitchen counter with useful household tools', 'dawp'); ?>" class="aspect-[4/3] h-full w-full rounded-xl object-cover" loading="eager" decoding="async">
                            <img src="<?php echo esc_url($home_image_url . 'category-camera-tech.jpg'); ?>" alt="<?php esc_attr_e('Camera and tech accessory setup on a clean desk', 'dawp'); ?>" class="aspect-[4/3] h-full w-full rounded-xl object-cover" loading="eager" decoding="async">
                        </div>
                    </div>
                    <div class="mt-4 grid gap-3 rounded-xl bg-[#F5F7FA] p-4 sm:grid-cols-3">
                        <p class="text-sm font-bold text-[#102A43]"><?php esc_html_e('Home', 'dawp'); ?></p>
                        <p class="text-sm font-bold text-[#102A43]"><?php esc_html_e('Grooming', 'dawp'); ?></p>
                        <p class="text-sm font-bold text-[#102A43]"><?php esc_html_e('Tech', 'dawp'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="shop-by-category" class="bg-white py-16 sm:py-20" aria-labelledby="category-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#2F80ED]"><?php esc_html_e('Shop By Category', 'dawp'); ?></p>
                <h2 id="category-title" class="mt-4 text-3xl font-extrabold leading-tight text-[#102A43] sm:text-4xl">
                    <?php esc_html_e('Practical gadgets organized by everyday use.', 'dawp'); ?>
                </h2>
                <p class="mt-4 text-base leading-7 text-[#667085]">
                    <?php esc_html_e('Browse focused categories for home routines, kitchen tasks, grooming, camera accessories, tech organization, and compact daily tools.', 'dawp'); ?>
                </p>
            </div>

            <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-5">
                <?php foreach ($categories as $category) : ?>
                    <a href="<?php echo esc_url($category['url']); ?>" class="group overflow-hidden rounded-2xl border border-[#E5E7EB] bg-white transition hover:-translate-y-1 hover:shadow-xl hover:shadow-[#102A43]/10">
                        <img src="<?php echo esc_url($category['image']); ?>" alt="<?php echo esc_attr($category['alt']); ?>" class="aspect-[4/3] w-full object-cover transition group-hover:scale-105" loading="lazy" decoding="async">
                        <div class="p-5">
                            <h3 class="text-lg font-extrabold text-[#102A43]"><?php echo esc_html($category['name']); ?></h3>
                            <p class="mt-3 text-sm leading-6 text-[#667085]"><?php echo esc_html($category['description']); ?></p>
                            <span class="mt-5 inline-flex items-center text-sm font-bold text-[#2F80ED]">
                                <?php esc_html_e('Shop category', 'dawp'); ?>
                                <span class="ml-2" aria-hidden="true">-&gt;</span>
                            </span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-[#F5F7FA] py-16 sm:py-20" aria-labelledby="kitchen-title">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.95fr_1.05fr] lg:items-center lg:px-8">
            <div class="overflow-hidden rounded-2xl border border-[#E5E7EB] bg-white p-3 shadow-sm">
                <img src="<?php echo esc_url($home_image_url . 'feature-kitchen-helpers.jpg'); ?>" alt="<?php esc_attr_e('Clean kitchen workspace with simple home and kitchen gadgets', 'dawp'); ?>" class="aspect-[4/3] w-full rounded-xl object-cover" loading="lazy" decoding="async">
            </div>

            <div>
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#5BA8A0]"><?php esc_html_e('Home & Kitchen Gadgets', 'dawp'); ?></p>
                <h2 id="kitchen-title" class="mt-4 text-3xl font-extrabold leading-tight text-[#102A43] sm:text-4xl">
                    <?php esc_html_e('Useful helpers for simpler home routines.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-[#667085]">
                    <?php esc_html_e('From drinkware tools to small kitchen helpers, MyBaapStore brings practical gadgets that support everyday tasks around the home without making things complicated.', 'dawp'); ?>
                </p>

                <div class="mt-7 grid gap-3 sm:grid-cols-2">
                    <?php foreach ($kitchen_highlights as $highlight) : ?>
                        <div class="rounded-xl border border-[#E5E7EB] bg-white px-4 py-3 text-sm font-bold text-[#102A43]">
                            <?php echo esc_html($highlight); ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <a href="<?php echo esc_url($mybaap_category_url('home-kitchen-gadgets')); ?>" class="mt-8 inline-flex min-h-12 items-center justify-center rounded-xl bg-[#2F80ED] px-6 text-sm font-bold text-white transition hover:bg-[#102A43]">
                    <?php esc_html_e('Shop Home & Kitchen Gadgets', 'dawp'); ?>
                </a>
            </div>
        </div>
    </section>

    <section class="bg-[#EAF4FF] py-16 sm:py-20" aria-labelledby="care-tech-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#2F80ED]"><?php esc_html_e('Personal Care & Tech Tools', 'dawp'); ?></p>
                <h2 id="care-tech-title" class="mt-4 text-3xl font-extrabold leading-tight text-[#102A43] sm:text-4xl">
                    <?php esc_html_e('Simple tools for grooming, video, and daily convenience.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-[#667085]">
                    <?php esc_html_e('Explore everyday grooming devices and practical tech accessories designed for simple use at home, at your desk, or on the go.', 'dawp'); ?>
                </p>
            </div>

            <div class="mt-10 grid gap-6 lg:grid-cols-2">
                <article class="overflow-hidden rounded-2xl border border-white bg-white shadow-sm">
                    <img src="<?php echo esc_url($home_image_url . 'category-personal-care.jpg'); ?>" alt="<?php esc_attr_e('Clean personal care setup on a bathroom vanity', 'dawp'); ?>" class="aspect-[4/3] w-full object-cover" loading="lazy" decoding="async">
                    <div class="p-6 sm:p-8">
                        <h3 class="text-2xl font-extrabold text-[#102A43]"><?php esc_html_e('Personal Care Devices', 'dawp'); ?></h3>
                        <p class="mt-3 text-base leading-7 text-[#667085]">
                            <?php esc_html_e('Compact grooming tools for simple everyday routines.', 'dawp'); ?>
                        </p>
                        <a href="<?php echo esc_url($mybaap_category_url('personal-care-devices')); ?>" class="mt-6 inline-flex min-h-12 items-center justify-center rounded-xl border border-[#2F80ED] px-5 text-sm font-bold text-[#2F80ED] transition hover:bg-[#EAF4FF]">
                            <?php esc_html_e('Shop Personal Care', 'dawp'); ?>
                        </a>
                    </div>
                </article>

                <article class="overflow-hidden rounded-2xl border border-white bg-white shadow-sm">
                    <img src="<?php echo esc_url($home_image_url . 'category-camera-tech.jpg'); ?>" alt="<?php esc_attr_e('Camera and tech accessories on a clean desk', 'dawp'); ?>" class="aspect-[4/3] w-full object-cover" loading="lazy" decoding="async">
                    <div class="p-6 sm:p-8">
                        <h3 class="text-2xl font-extrabold text-[#102A43]"><?php esc_html_e('Camera & Tech Accessories', 'dawp'); ?></h3>
                        <p class="mt-3 text-base leading-7 text-[#667085]">
                            <?php esc_html_e('Useful video, camera, and device accessories for regular daily use.', 'dawp'); ?>
                        </p>
                        <a href="<?php echo esc_url($mybaap_category_url('camera-tech-accessories')); ?>" class="mt-6 inline-flex min-h-12 items-center justify-center rounded-xl border border-[#2F80ED] px-5 text-sm font-bold text-[#2F80ED] transition hover:bg-[#EAF4FF]">
                            <?php esc_html_e('Shop Tech Accessories', 'dawp'); ?>
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="border-t border-b border-[#E5E7EB] bg-[#F5F7FA] py-16 sm:py-20" aria-labelledby="trust-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-8 lg:grid-cols-[0.85fr_1.15fr] lg:items-start">
                <div class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm sm:p-8">
                    <p class="text-sm font-extrabold uppercase tracking-[0.14em] text-[#2F80ED]"><?php esc_html_e('Customer Care', 'dawp'); ?></p>
                    <h2 id="trust-title" class="mt-4 text-3xl font-extrabold leading-tight text-[#102A43] sm:text-4xl">
                        <?php esc_html_e('Clear support from checkout to delivery.', 'dawp'); ?>
                    </h2>
                    <p class="mt-5 text-base leading-8 text-[#667085]">
                        <?php esc_html_e('MyBaapStore is built for simple shopping, clear product information, and practical support - so you can choose everyday gadgets with more confidence.', 'dawp'); ?>
                    </p>
                    <p class="mt-6 text-sm leading-7 text-[#667085]">
                        <?php esc_html_e('Need help with an order or product question? Contact support@mybaapstore.com during business hours: Monday - Friday, 9:00 AM - 6:00 PM EST.', 'dawp'); ?>
                    </p>

                    <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                        <a href="<?php echo esc_url(home_url('/shipping-returns/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-xl bg-[#2F80ED] px-6 text-sm font-bold text-white transition hover:bg-[#102A43]">
                            <?php esc_html_e('View Shipping & Returns', 'dawp'); ?>
                        </a>
                        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-xl border border-[#2F80ED] bg-white px-6 text-sm font-bold text-[#2F80ED] transition hover:bg-[#EAF4FF]">
                            <?php esc_html_e('Contact Support', 'dawp'); ?>
                        </a>
                    </div>
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                    <?php foreach ($trust_cards as $card) : ?>
                        <article class="rounded-2xl border border-[#E5E7EB] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-[#102A43]/10">
                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#EAF4FF] text-[#2F80ED]">
                                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <?php echo $render_icon($card['icon']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </svg>
                            </div>
                            <h3 class="mt-5 text-lg font-extrabold text-[#102A43]"><?php echo esc_html($card['title']); ?></h3>
                            <p class="mt-3 text-sm leading-6 text-[#667085]"><?php echo esc_html($card['copy']); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</div>
