<?php
/**
 * Template Part: page-home
 */

$tizezap_gallery_uri = get_theme_file_uri('/assets/img/gallery/Tizezap/');

$images = [
    'hero'        => $tizezap_gallery_uri . 'tire-hero-road.png',
    'all_season'  => $tizezap_gallery_uri . 'category-all-season-tires.png',
    'suv'         => $tizezap_gallery_uri . 'category-suv-crossover-tires.png',
    'light_truck' => $tizezap_gallery_uri . 'category-light-truck-tires.png',
    'performance' => $tizezap_gallery_uri . 'category-performance-tires.png',
    'trailer'     => $tizezap_gallery_uri . 'category-trailer-tires.png',
    'winter'      => $tizezap_gallery_uri . 'category-winter-tires.png',
    'suv_trailer' => $tizezap_gallery_uri . 'suv-trailer-tires.png',
];

$shop_url = function_exists('wc_get_page_id') && wc_get_page_id('shop') > 0
    ? get_permalink(wc_get_page_id('shop'))
    : home_url('/shop/');

$term_url = static function ($slug) {
    return function_exists('dawp_product_category_url')
        ? dawp_product_category_url($slug)
        : home_url('/product-category/' . sanitize_title($slug) . '/');
};

$categories = [
    [
        'title' => __('All-Season Tires', 'dawp'),
        'copy'  => __('Practical tire options for year-round everyday driving.', 'dawp'),
        'url'   => $term_url('all-season-tires'),
        'image' => $images['all_season'],
    ],
    [
        'title' => __('SUV & Crossover Tires', 'dawp'),
        'copy'  => __('Tires for SUVs, crossovers, family vehicles, and daily road use.', 'dawp'),
        'url'   => $term_url('suv-crossover-tires'),
        'image' => $images['suv'],
    ],
    [
        'title' => __('Light Truck Tires', 'dawp'),
        'copy'  => __('Tire options for pickup trucks, utility driving, and hauling needs.', 'dawp'),
        'url'   => $term_url('light-truck-tires'),
        'image' => $images['light_truck'],
    ],
    [
        'title' => __('Performance Tires', 'dawp'),
        'copy'  => __('Tires designed for responsive handling and performance-inspired driving.', 'dawp'),
        'url'   => $term_url('performance-tires'),
        'image' => $images['performance'],
    ],
    [
        'title' => __('Trailer Tires', 'dawp'),
        'copy'  => __('Road-ready tire options for trailers and towing support.', 'dawp'),
        'url'   => $term_url('trailer-tires'),
        'image' => $images['trailer'],
    ],
    [
        'title' => __('Winter Tires', 'dawp'),
        'copy'  => __('Tires designed for colder temperatures and winter road conditions.', 'dawp'),
        'url'   => $term_url('winter-tires'),
        'image' => $images['winter'],
    ],
];

$daily_highlights = [
    __('Everyday driving', 'dawp'),
    __('Year-round use', 'dawp'),
    __('Road comfort', 'dawp'),
    __('Clear tire specs', 'dawp'),
];

$vehicle_cards = [
    [
        'title' => __('SUV & Crossover Tires', 'dawp'),
        'copy'  => __('For family vehicles, road trips, and daily SUV driving.', 'dawp'),
        'url'   => $term_url('suv-crossover-tires'),
    ],
    [
        'title' => __('Light Truck Tires', 'dawp'),
        'copy'  => __('For pickup trucks, hauling needs, and everyday utility use.', 'dawp'),
        'url'   => $term_url('light-truck-tires'),
    ],
    [
        'title' => __('Trailer Tires', 'dawp'),
        'copy'  => __('For trailers, towing support, and road-ready utility needs.', 'dawp'),
        'url'   => $term_url('trailer-tires'),
    ],
];

$trust_cards = [
    __('Secure Checkout', 'dawp'),
    __('Tracking Included', 'dawp'),
    __('30-Day Returns', 'dawp'),
    __('Clear Tire Specifications', 'dawp'),
];
?>

<div id="primary" class="bg-white font-body text-[#111827]">

    <!-- Hero -->
    <section class="relative min-h-[680px] overflow-hidden bg-[#0B1F33] text-white sm:min-h-[720px]">
        <img src="<?php echo esc_url($images['hero']); ?>"
             alt="<?php esc_attr_e('SUV tire on an open road for everyday driving', 'dawp'); ?>"
             class="absolute inset-0 h-full w-full object-cover"
             loading="eager"
             fetchpriority="high">
        <div class="absolute inset-0 bg-[#0B1F33]/72 lg:bg-[linear-gradient(90deg,rgba(11,31,51,0.94)_0%,rgba(11,31,51,0.78)_42%,rgba(11,31,51,0.24)_100%)]"></div>

        <div class="relative mx-auto flex min-h-[680px] max-w-7xl items-center px-4 py-16 sm:min-h-[720px] sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <p class="mb-5 inline-flex rounded-md border border-[#FDBA74]/50 bg-[#F97316]/18 px-4 py-2 text-xs font-black uppercase tracking-[0.18em] text-[#FDBA74]">
                    <?php esc_html_e('Tire & Auto Essentials', 'dawp'); ?>
                </p>

                <h1 class="font-heading text-5xl font-black leading-[0.98] text-white sm:text-6xl lg:text-7xl">
                    <?php esc_html_e('Reliable Tires For Everyday Driving', 'dawp'); ?>
                </h1>

                <p class="mt-6 max-w-2xl text-lg leading-8 text-[#E5E7EB]">
                    <?php esc_html_e('Find all-season, SUV, truck, trailer, winter, and performance tires with clear product details to help you choose the right fit for your vehicle.', 'dawp'); ?>
                </p>

                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url($shop_url); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#F97316] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-[#0B1F33]">
                        <?php esc_html_e('Shop Tires', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/shop-by-rim-size/')); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#FDBA74]/70 bg-white/10 px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#F97316] hover:text-white">
                        <?php esc_html_e('Find Your Tire Size', 'dawp'); ?>
                    </a>
                </div>

                <div class="mt-6 flex flex-wrap gap-3 text-xs font-black uppercase tracking-[0.16em] text-[#FDBA74]">
                    <span class="inline-flex items-center gap-2">
                        <span class="h-2 w-2 rounded-full bg-[#F97316]"></span>
                        <?php esc_html_e('Fast Category Browsing', 'dawp'); ?>
                    </span>
                    <span class="inline-flex items-center gap-2">
                        <span class="h-2 w-2 rounded-full bg-[#F97316]"></span>
                        <?php esc_html_e('Fitment-Focused Details', 'dawp'); ?>
                    </span>
                </div>

                <p class="mt-7 max-w-2xl border-l-4 border-[#F97316] bg-[#111827]/60 p-4 text-sm font-semibold leading-6 text-white">
                    <?php esc_html_e('Please confirm your tire size, rim size, and vehicle compatibility before placing an order.', 'dawp'); ?>
                </p>
            </div>
        </div>
    </section>

    <!-- Shop By Tire Category -->
    <section class="bg-[#F4F6F8] py-14 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-5 md:flex-row md:items-end md:justify-between">
                <div>
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#F97316]">
                        <?php esc_html_e('Shop By Tire Category', 'dawp'); ?>
                    </p>
                    <h2 class="max-w-2xl font-heading text-4xl font-black leading-tight text-[#0B1F33] lg:text-5xl">
                        <?php esc_html_e('Choose tires by vehicle need and road condition.', 'dawp'); ?>
                    </h2>
                </div>
                <a href="<?php echo esc_url($shop_url); ?>"
                   class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#F97316] bg-white px-6 text-sm font-black uppercase tracking-wide text-[#C2410C] transition hover:bg-[#FFF7ED]">
                    <?php esc_html_e('View All Tires', 'dawp'); ?>
                </a>
            </div>

            <div class="mt-10 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                <?php foreach ($categories as $category) : ?>
                    <a href="<?php echo esc_url($category['url']); ?>"
                       class="group overflow-hidden rounded-lg border border-[#E5E7EB] border-t-4 border-t-[#F97316] bg-white shadow-sm transition hover:-translate-y-1 hover:border-[#F97316] hover:shadow-md">
                        <img src="<?php echo esc_url($category['image']); ?>"
                             alt="<?php echo esc_attr($category['title']); ?>"
                             class="aspect-[16/10] w-full object-cover transition duration-300 group-hover:scale-[1.03]"
                             loading="lazy">
                        <div class="p-5">
                            <h3 class="font-heading text-xl font-black text-[#0B1F33]">
                                <?php echo esc_html($category['title']); ?>
                            </h3>
                            <p class="mt-2 text-sm leading-6 text-[#4B5563]">
                                <?php echo esc_html($category['copy']); ?>
                            </p>
                            <span class="mt-4 inline-flex text-sm font-black uppercase tracking-wide text-[#C2410C]">
                                <?php esc_html_e('Shop Category', 'dawp'); ?>
                            </span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- All-Season & Daily Driving Tires -->
    <section class="bg-white py-14 lg:py-20">
        <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
            <div>
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#F97316]">
                    <?php esc_html_e('All-Season Tires', 'dawp'); ?>
                </p>

                <h2 class="font-heading text-4xl font-black leading-tight text-[#0B1F33] lg:text-5xl">
                    <?php esc_html_e('Built for practical everyday road use.', 'dawp'); ?>
                </h2>

                <p class="mt-5 max-w-2xl text-base leading-8 text-[#4B5563]">
                    <?php esc_html_e('Explore tire options made for daily driving, road comfort, and year-round use. Review tire size, rim size, load index, and speed rating before choosing the right fit.', 'dawp'); ?>
                </p>

                <div class="mt-7 grid grid-cols-1 gap-3 sm:grid-cols-2">
                    <?php foreach ($daily_highlights as $highlight) : ?>
                        <div class="flex min-h-12 items-center gap-3 rounded-lg border border-[#FED7AA] bg-[#FFF7ED] px-4">
                            <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-md bg-[#F97316] text-white">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <span class="text-sm font-bold text-[#111827]"><?php echo esc_html($highlight); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="mt-8">
                    <a href="<?php echo esc_url($term_url('all-season-tires')); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#F97316] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#0B1F33]">
                        <?php esc_html_e('Shop All-Season Tires', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <div class="overflow-hidden rounded-lg border border-[#FED7AA] bg-white shadow-sm">
                <img src="<?php echo esc_url($images['all_season']); ?>"
                     alt="<?php esc_attr_e('Close-up of all-season tire tread in a clean service bay', 'dawp'); ?>"
                     class="aspect-[4/3] w-full object-cover"
                     loading="lazy">
            </div>
        </div>
    </section>

    <!-- SUV, Truck & Trailer Tires -->
    <section class="bg-[#F4F6F8] py-14 lg:py-20">
        <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
            <div class="overflow-hidden rounded-lg border border-[#E5E7EB] bg-white shadow-sm lg:order-1">
                <img src="<?php echo esc_url($images['suv_trailer']); ?>"
                     alt="<?php esc_attr_e('SUV towing a utility trailer with visible tire detail', 'dawp'); ?>"
                     class="aspect-[4/3] w-full object-cover"
                     loading="lazy">
            </div>

            <div class="lg:order-2">
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#F97316]">
                    <?php esc_html_e('SUV, Truck & Trailer Tires', 'dawp'); ?>
                </p>

                <h2 class="font-heading text-4xl font-black leading-tight text-[#0B1F33] lg:text-5xl">
                    <?php esc_html_e('Tire options for utility, towing, and larger vehicles.', 'dawp'); ?>
                </h2>

                <p class="mt-5 max-w-2xl text-base leading-8 text-[#4B5563]">
                    <?php esc_html_e('Find tire categories for SUVs, crossovers, light trucks, and trailers with product details that help support better fitment decisions.', 'dawp'); ?>
                </p>

                <div class="mt-8 grid grid-cols-1 gap-4">
                    <?php foreach ($vehicle_cards as $card) : ?>
                        <a href="<?php echo esc_url($card['url']); ?>"
                           class="rounded-lg border border-[#E5E7EB] border-l-4 border-l-[#F97316] bg-white p-5 transition hover:border-[#F97316] hover:shadow-sm">
                            <h3 class="text-lg font-black text-[#0B1F33]"><?php echo esc_html($card['title']); ?></h3>
                            <p class="mt-2 text-sm leading-6 text-[#4B5563]"><?php echo esc_html($card['copy']); ?></p>
                        </a>
                    <?php endforeach; ?>
                </div>

                <div class="mt-8">
                    <a href="<?php echo esc_url(home_url('/shop-by-vehicle-type/')); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#0B1F33] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#F97316]">
                        <?php esc_html_e('Explore Vehicle-Specific Tires', 'dawp'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Customer Care / Fitment & Trust -->
    <section id="fitment-check" class="scroll-mt-24 bg-[#0B1F33] py-14 text-white lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-10 lg:grid-cols-[minmax(0,0.9fr)_minmax(0,1.1fr)] lg:items-start">
                <div>
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#FDBA74]">
                        <?php esc_html_e('Customer Care', 'dawp'); ?>
                    </p>

                    <h2 class="font-heading text-4xl font-black leading-tight text-white lg:text-5xl">
                        <?php esc_html_e('Clear support from tire selection to delivery.', 'dawp'); ?>
                    </h2>

                    <p class="mt-5 max-w-2xl text-base leading-8 text-[#D1D5DB]">
                        <?php esc_html_e('Tizezap provides clear product details, tire fitment reminders, order tracking, and customer support to help you shop with confidence.', 'dawp'); ?>
                    </p>

                    <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                        <a href="<?php echo esc_url(home_url('/shipping-returns/')); ?>"
                           class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#F97316] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-[#0B1F33]">
                            <?php esc_html_e('View Shipping & Returns', 'dawp'); ?>
                        </a>
                        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>"
                           class="inline-flex min-h-12 items-center justify-center rounded-md border border-white/40 bg-transparent px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-[#0B1F33]">
                            <?php esc_html_e('Contact Support', 'dawp'); ?>
                        </a>
                    </div>
                </div>

                <div class="space-y-5">
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <?php foreach ($trust_cards as $trust) : ?>
                            <div class="rounded-lg border border-white/10 bg-white/10 p-5">
                                <div class="mb-4 flex h-10 w-10 items-center justify-center rounded-md bg-[#F97316] text-white">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <h3 class="text-base font-black text-white"><?php echo esc_html($trust); ?></h3>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="rounded-lg border border-[#F97316]/50 bg-[#F97316]/12 p-5">
                        <p class="text-sm font-black uppercase tracking-[0.16em] text-[#FDBA74]">
                            <?php esc_html_e('Fitment Reminder', 'dawp'); ?>
                        </p>
                        <p class="mt-3 text-sm font-semibold leading-7 text-white">
                            <?php esc_html_e('Please confirm your tire size, rim size, load index, speed rating, and vehicle compatibility before placing an order.', 'dawp'); ?>
                        </p>
                    </div>

                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div class="rounded-lg border border-white/10 bg-white p-5 text-[#111827]">
                            <h3 class="text-base font-black text-[#0B1F33]"><?php esc_html_e('Shipping Timeline', 'dawp'); ?></h3>
                            <p class="mt-2 text-sm leading-7 text-[#4B5563]">
                                <?php esc_html_e('Orders are processed within 2-4 business days. Standard US shipping typically takes 5-10 business days after dispatch depending on product availability, tire size, carrier conditions, and delivery location.', 'dawp'); ?>
                            </p>
                        </div>

                        <div class="rounded-lg border border-white/10 bg-white p-5 text-[#111827]">
                            <h3 class="text-base font-black text-[#0B1F33]"><?php esc_html_e('Return Eligibility', 'dawp'); ?></h3>
                            <p class="mt-2 text-sm leading-7 text-[#4B5563]">
                                <?php esc_html_e('Eligible unused, unmounted, and undamaged tires may be returned within 30 days of delivery in original condition.', 'dawp'); ?>
                            </p>
                        </div>
                    </div>

                    <p class="text-sm leading-7 text-[#D1D5DB]">
                        <?php esc_html_e('Support: support@tizezap.com. Business hours: Monday - Friday, 9:00 AM - 6:00 PM EST.', 'dawp'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

</div>
