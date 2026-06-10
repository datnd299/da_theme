<?php
/**
 * Template Part: page-about
 */

$tizezap_gallery_uri = get_theme_file_uri('/assets/img/gallery/Tizezap/');

$images = [
    'hero'        => $tizezap_gallery_uri . 'tire-hero-road.png',
    'tread'       => $tizezap_gallery_uri . 'all-season-tread.png',
    'suv_trailer' => $tizezap_gallery_uri . 'suv-trailer-tires.png',
];

$shop_url = function_exists('wc_get_page_id') && wc_get_page_id('shop') > 0
    ? get_permalink(wc_get_page_id('shop'))
    : home_url('/shop/');

$values = [
    [
        'title' => __('Clear Tire Information', 'dawp'),
        'copy'  => __('We keep tire size, rim size, season, load index, speed rating, and vehicle guidance easy to review before checkout.', 'dawp'),
    ],
    [
        'title' => __('Practical Road Use', 'dawp'),
        'copy'  => __('Our store is focused on tires for everyday driving, commuting, utility needs, towing support, and seasonal road conditions.', 'dawp'),
    ],
    [
        'title' => __('Transparent Support', 'dawp'),
        'copy'  => __('Customers can review shipping timelines, return eligibility, tracking information, and support details before placing an order.', 'dawp'),
    ],
];

$categories = [
    __('All-season tires', 'dawp'),
    __('SUV and crossover tires', 'dawp'),
    __('Light truck tires', 'dawp'),
    __('Performance tires', 'dawp'),
    __('Trailer tires', 'dawp'),
    __('Winter tires', 'dawp'),
];

$trust_items = [
    __('Secure checkout', 'dawp'),
    __('Tracking included after dispatch', 'dawp'),
    __('30-day return window for eligible unused tires', 'dawp'),
    __('Support by email during business hours', 'dawp'),
];
?>

<div id="primary" class="bg-white font-body text-[#111827]">

    <!-- Hero -->
    <section class="relative min-h-[560px] overflow-hidden bg-[#0B1F33] text-white">
        <img src="<?php echo esc_url($images['hero']); ?>"
             alt="<?php esc_attr_e('Tire on an open road representing everyday driving support from Tizezap', 'dawp'); ?>"
             class="absolute inset-0 h-full w-full object-cover"
             loading="eager"
             fetchpriority="high">
        <div class="absolute inset-0 bg-[#0B1F33]/78 lg:bg-[linear-gradient(90deg,rgba(11,31,51,0.96)_0%,rgba(11,31,51,0.82)_46%,rgba(11,31,51,0.32)_100%)]"></div>

        <div class="relative mx-auto flex min-h-[560px] max-w-7xl items-center px-4 py-16 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <p class="mb-5 inline-flex rounded-md border border-[#FDBA74]/50 bg-[#F97316]/15 px-4 py-2 text-xs font-black uppercase tracking-[0.18em] text-[#FDBA74]">
                    <?php esc_html_e('About Tizezap', 'dawp'); ?>
                </p>

                <h1 class="font-heading text-5xl font-black leading-[0.98] text-white sm:text-6xl lg:text-7xl">
                    <?php esc_html_e('A practical online tire store for everyday drivers.', 'dawp'); ?>
                </h1>

                <p class="mt-6 max-w-2xl text-lg leading-8 text-[#E5E7EB]">
                    <?php esc_html_e('Tizezap helps drivers shop for car, SUV, light truck, trailer, winter, performance, and all-season tires with clear product details and fitment reminders.', 'dawp'); ?>
                </p>

                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url($shop_url); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#F97316] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-[#0B1F33]">
                        <?php esc_html_e('Shop Tires', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#FDBA74]/70 bg-white/10 px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#F97316] hover:text-white">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission -->
    <section class="bg-white py-14 lg:py-20">
        <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
            <div>
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#F97316]">
                    <?php esc_html_e('Our Mission', 'dawp'); ?>
                </p>

                <h2 class="font-heading text-4xl font-black leading-tight text-[#0B1F33] lg:text-5xl">
                    <?php esc_html_e('Make tire shopping clearer and easier to compare.', 'dawp'); ?>
                </h2>

                <p class="mt-5 max-w-2xl text-base leading-8 text-[#4B5563]">
                    <?php esc_html_e('Choosing tires online should not depend on vague descriptions or oversized promises. Tizezap focuses on practical tire categories, readable specifications, and reminders that help customers confirm size and compatibility before ordering.', 'dawp'); ?>
                </p>
                <p class="mt-4 max-w-2xl text-base leading-8 text-[#4B5563]">
                    <?php esc_html_e('Our goal is to support everyday drivers who need road-ready tire options for commuting, family vehicles, light-duty utility driving, towing needs, and seasonal conditions.', 'dawp'); ?>
                </p>

                <p class="mt-7 border-l-4 border-[#F97316] bg-[#FFF7ED] p-4 text-sm font-bold leading-7 text-[#0B1F33]">
                    <?php esc_html_e('Please confirm your tire size, rim size, load index, speed rating, and vehicle compatibility before placing an order.', 'dawp'); ?>
                </p>
            </div>

            <div class="overflow-hidden rounded-lg border border-[#E5E7EB] bg-white shadow-sm">
                <img src="<?php echo esc_url($images['tread']); ?>"
                     alt="<?php esc_attr_e('Close-up of tire tread showing product detail and road-use focus', 'dawp'); ?>"
                     class="aspect-[4/3] w-full object-cover"
                     loading="lazy">
            </div>
        </div>
    </section>

    <!-- Values -->
    <section class="bg-[#F4F6F8] py-14 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#F97316]">
                    <?php esc_html_e('How We Work', 'dawp'); ?>
                </p>
                <h2 class="font-heading text-4xl font-black leading-tight text-[#0B1F33] lg:text-5xl">
                    <?php esc_html_e('Built around clear specs, fitment awareness, and transparent policies.', 'dawp'); ?>
                </h2>
            </div>

            <div class="mt-10 grid grid-cols-1 gap-5 md:grid-cols-3">
                <?php foreach ($values as $value) : ?>
                    <div class="rounded-lg border border-[#E5E7EB] border-t-4 border-t-[#F97316] bg-white p-6 shadow-sm transition hover:border-[#F97316] hover:shadow-md">
                        <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-md bg-[#F97316] text-white">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <h3 class="font-heading text-xl font-black text-[#0B1F33]"><?php echo esc_html($value['title']); ?></h3>
                        <p class="mt-3 text-sm leading-7 text-[#4B5563]"><?php echo esc_html($value['copy']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Categories -->
    <section class="bg-white py-14 lg:py-20">
        <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
            <div class="overflow-hidden rounded-lg border border-[#E5E7EB] bg-white shadow-sm">
                <img src="<?php echo esc_url($images['suv_trailer']); ?>"
                     alt="<?php esc_attr_e('SUV and trailer tire scene for utility and towing tire categories', 'dawp'); ?>"
                     class="aspect-[4/3] w-full object-cover"
                     loading="lazy">
            </div>

            <div>
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#F97316]">
                    <?php esc_html_e('What We Sell', 'dawp'); ?>
                </p>

                <h2 class="font-heading text-4xl font-black leading-tight text-[#0B1F33] lg:text-5xl">
                    <?php esc_html_e('Tire categories for common vehicle and driving needs.', 'dawp'); ?>
                </h2>

                <p class="mt-5 max-w-2xl text-base leading-8 text-[#4B5563]">
                    <?php esc_html_e('Tizezap is focused on tire and auto essentials, not unrelated auto parts. Customers can browse by tire type, vehicle need, seasonal condition, and product specification.', 'dawp'); ?>
                </p>

                <div class="mt-7 grid grid-cols-1 gap-3 sm:grid-cols-2">
                    <?php foreach ($categories as $category) : ?>
                        <div class="flex min-h-12 items-center gap-3 rounded-lg border border-[#FED7AA] bg-[#FFF7ED] px-4">
                            <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-md bg-[#F97316] text-white">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <span class="text-sm font-bold text-[#111827]"><?php echo esc_html($category); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="mt-8">
                    <a href="<?php echo esc_url($shop_url); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#F97316] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#0B1F33]">
                        <?php esc_html_e('Browse Tire Categories', 'dawp'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Trust -->
    <section class="bg-[#0B1F33] py-14 text-white lg:py-20">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 sm:px-6 lg:grid-cols-[minmax(0,0.9fr)_minmax(0,1.1fr)] lg:px-8">
            <div>
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#FDBA74]">
                    <?php esc_html_e('Customer Care', 'dawp'); ?>
                </p>
                <h2 class="font-heading text-4xl font-black leading-tight text-white lg:text-5xl">
                    <?php esc_html_e('Support and policies customers can check before ordering.', 'dawp'); ?>
                </h2>
                <p class="mt-5 max-w-2xl text-base leading-8 text-[#D1D5DB]">
                    <?php esc_html_e('We provide order tracking, shipping and return information, and support access so customers can understand the buying process from product selection to delivery.', 'dawp'); ?>
                </p>
            </div>

            <div class="space-y-5">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <?php foreach ($trust_items as $item) : ?>
                        <div class="rounded-lg border border-white/10 border-l-4 border-l-[#F97316] bg-white/10 p-5">
                            <h3 class="text-base font-black text-white"><?php echo esc_html($item); ?></h3>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="rounded-lg border border-[#F97316]/50 bg-[#F97316]/12 p-5">
                    <p class="text-sm font-black uppercase tracking-[0.16em] text-[#FDBA74]">
                        <?php esc_html_e('Support Information', 'dawp'); ?>
                    </p>
                    <p class="mt-3 text-sm font-semibold leading-7 text-white">
                        <?php esc_html_e('Email support@tizezap.com. Business hours are Monday - Friday, 9:00 AM - 6:00 PM EST.', 'dawp'); ?>
                    </p>
                </div>

                <div class="flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#F97316] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-[#0B1F33]">
                        <?php esc_html_e('Shipping Policy', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/faq/')); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#FDBA74]/70 bg-transparent px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#F97316] hover:text-white">
                        <?php esc_html_e('View FAQ', 'dawp'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>
