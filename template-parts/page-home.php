<?php
/**
 * Template Part: page-home
 */

$oneshopvibe_gallery_uri = get_theme_file_uri('/assets/img/gallery/Oneshopvibe/');

$images = [
    'hero' => $oneshopvibe_gallery_uri . 'Beauty_Essentials_Personal_Care.png',
    'beauty_accessories' => $oneshopvibe_gallery_uri . 'Beauty_Accessories.png',
    'makeup_tools' => $oneshopvibe_gallery_uri . 'makeup_tools.png',
    'hair_care' => $oneshopvibe_gallery_uri . 'haircare.png',
    'personal_care' => $oneshopvibe_gallery_uri . 'Personal_care.png',
    'organizers' => $oneshopvibe_gallery_uri . 'Beauty_Organizers.png',
    'makeup_feature' => $oneshopvibe_gallery_uri . 'Makeup_Tools_Beauty_Accessories.png',
    'care_feature' => $oneshopvibe_gallery_uri . 'Hair_Care_Personal_Care.png',
];

$categories = [
    [
        'title' => __('Beauty Accessories', 'dawp'),
        'copy' => __('Small beauty helpers for simple everyday routines.', 'dawp'),
        'url' => home_url('/product-category/beauty-accessories/'),
        'image' => $images['beauty_accessories'],
        'accent' => '#F7C948',
    ],
    [
        'title' => __('Makeup Tools', 'dawp'),
        'copy' => __('Brushes, sponges, and tools for easier makeup application.', 'dawp'),
        'url' => home_url('/product-category/makeup-tools/'),
        'image' => $images['makeup_tools'],
        'accent' => '#DCD5FF',
    ],
    [
        'title' => __('Hair Care Essentials', 'dawp'),
        'copy' => __('Hair accessories and tools for daily styling and care.', 'dawp'),
        'url' => home_url('/product-category/hair-care-essentials/'),
        'image' => $images['hair_care'],
        'accent' => '#EAF7F0',
    ],
    [
        'title' => __('Personal Care Tools', 'dawp'),
        'copy' => __('Practical grooming and personal-use tools for daily self-care.', 'dawp'),
        'url' => home_url('/product-category/personal-care-tools/'),
        'image' => $images['personal_care'],
        'accent' => '#F7C948',
    ],
    [
        'title' => __('Beauty Organizers', 'dawp'),
        'copy' => __('Storage solutions that keep cosmetics and tools easy to find.', 'dawp'),
        'url' => home_url('/product-category/beauty-organizers/'),
        'image' => $images['organizers'],
        'accent' => '#DCD5FF',
    ],
];
?>

<div id="primary" class="bg-white font-body text-[#2D2633]">

    <!-- Hero -->
    <section class="relative overflow-hidden bg-[#EAF7F0]">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,rgba(220,213,255,0.72),transparent_34%),radial-gradient(circle_at_bottom_right,rgba(247,201,72,0.28),transparent_30%)]"></div>

        <div class="relative mx-auto grid max-w-7xl grid-cols-1 items-center gap-12 px-4 py-14 sm:px-6 lg:grid-cols-[0.95fr_1.05fr] lg:px-8 lg:py-20">
            <div class="max-w-3xl">
                <p class="mb-5 inline-flex rounded-full bg-white px-5 py-2 text-xs font-black uppercase tracking-[0.18em] text-[#2D2633] shadow-sm">
                    <?php esc_html_e('Beauty Essentials & Personal Care', 'dawp'); ?>
                </p>

                <h1 class="font-heading text-5xl font-black leading-[0.96] text-[#2D2633] sm:text-6xl lg:text-7xl">
                    <?php esc_html_e('Beauty Essentials For Everyday Confidence', 'dawp'); ?>
                </h1>

                <p class="mt-6 max-w-2xl text-lg leading-8 text-[#6B6470]">
                    <?php esc_html_e('Discover simple beauty accessories, makeup tools, hair care essentials, and personal care products made for easy daily routines.', 'dawp'); ?>
                </p>

                <div class="mt-9 flex flex-wrap gap-4">
                    <a href="<?php echo esc_url(home_url('/shop/')); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#2D2633] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#F7C948] hover:text-[#2D2633]">
                        <?php esc_html_e('Shop Beauty Essentials', 'dawp'); ?>
                    </a>

                    <a href="<?php echo esc_url(home_url('/product-category/makeup-tools/')); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#2D2633] bg-white px-7 text-sm font-black uppercase tracking-wide text-[#2D2633] transition hover:bg-[#DCD5FF]">
                        <?php esc_html_e('Explore Makeup Tools', 'dawp'); ?>
                    </a>
                </div>

                <div class="mt-10 grid max-w-2xl grid-cols-1 gap-4 sm:grid-cols-3">
                    <div class="rounded-2xl bg-white p-5 shadow-sm">
                        <p class="text-2xl font-black text-[#2D2633]"><?php esc_html_e('1-3', 'dawp'); ?></p>
                        <p class="mt-1 text-sm leading-6 text-[#6B6470]"><?php esc_html_e('Business day handling', 'dawp'); ?></p>
                    </div>
                    <div class="rounded-2xl bg-white p-5 shadow-sm">
                        <p class="text-2xl font-black text-[#2D2633]"><?php esc_html_e('6-10', 'dawp'); ?></p>
                        <p class="mt-1 text-sm leading-6 text-[#6B6470]"><?php esc_html_e('Business day total delivery', 'dawp'); ?></p>
                    </div>
                    <div class="rounded-2xl bg-white p-5 shadow-sm">
                        <p class="text-2xl font-black text-[#2D2633]"><?php esc_html_e('30', 'dawp'); ?></p>
                        <p class="mt-1 text-sm leading-6 text-[#6B6470]"><?php esc_html_e('Day eligible returns', 'dawp'); ?></p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="overflow-hidden rounded-[1.375rem] border border-white bg-white p-3 shadow-xl shadow-black/10">
                    <?php
                    echo dawp_responsive_image([
                        'src'           => $images['hero'],
                        'alt'           => __('Vanity table with makeup tools, brushes, beauty pouch, and daily beauty essentials', 'dawp'),
                        'width'         => 896,
                        'height'        => 1200,
                        'class'         => 'aspect-[4/5] w-full rounded-2xl object-cover',
                        'sizes'         => '(max-width: 1023px) 100vw, 640px',
                        'srcset_widths' => [400, 640, 768, 896],
                        'loading'       => 'eager',
                        'fetchpriority' => 'high',
                    ]);
                    ?>
                </div>

                <div class="absolute -bottom-6 left-6 hidden max-w-[280px] rounded-2xl border border-[#E5E7EB] bg-white p-5 shadow-xl lg:block">
                    <p class="text-xs font-black uppercase tracking-[0.18em] text-[#2D2633]">
                        <?php esc_html_e('Simple Routine Support', 'dawp'); ?>
                    </p>
                    <p class="mt-2 text-sm leading-6 text-[#6B6470]">
                        <?php esc_html_e('Practical tools for organized beauty, grooming, and self-care moments.', 'dawp'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Shop By Category -->
    <section class="bg-[#F6F7F9] py-14 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-10 flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-3xl">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#6B6470]">
                        <?php esc_html_e('Shop By Category', 'dawp'); ?>
                    </p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#2D2633] lg:text-5xl">
                        <?php esc_html_e('Find beauty essentials by routine.', 'dawp'); ?>
                    </h2>
                </div>

                <a href="<?php echo esc_url(home_url('/shop/')); ?>"
                   class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#2D2633] px-6 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#F7C948] hover:text-[#2D2633]">
                    <?php esc_html_e('Shop All', 'dawp'); ?>
                </a>
            </div>

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-5">
                <?php foreach ($categories as $category) : ?>
                    <a href="<?php echo esc_url($category['url']); ?>"
                       class="group overflow-hidden rounded-[1.25rem] border border-[#E5E7EB] bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                        <div class="relative overflow-hidden">
                            <?php
                            echo dawp_responsive_image([
                                'src'           => $category['image'],
                                'alt'           => $category['title'],
                                'width'         => 896,
                                'height'        => 1200,
                                'class'         => 'aspect-[4/3] w-full object-cover transition duration-500 group-hover:scale-105',
                                'sizes'         => '(max-width: 639px) 100vw, (max-width: 1023px) 50vw, 240px',
                                'srcset_widths' => [240, 400, 600, 768, 896],
                            ]);
                            ?>
                            <span class="absolute left-4 top-4 h-9 w-9 rounded-full border border-white/70 shadow-sm"
                                  style="background-color: <?php echo esc_attr($category['accent']); ?>"></span>
                        </div>
                        <div class="p-5">
                            <h3 class="text-xl font-black leading-snug text-[#2D2633]">
                                <?php echo esc_html($category['title']); ?>
                            </h3>
                            <p class="mt-3 text-sm leading-6 text-[#6B6470]">
                                <?php echo esc_html($category['copy']); ?>
                            </p>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Makeup Tools & Beauty Accessories -->
    <section class="bg-white py-14 lg:py-20">
        <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
            <div class="overflow-hidden rounded-[1.25rem] border border-[#E5E7EB] bg-white p-3 shadow-sm">
                <?php
                echo dawp_responsive_image([
                    'src'           => $images['makeup_feature'],
                    'alt'           => __('Makeup brushes, applicators, mirrors, and small beauty accessories on a bright vanity', 'dawp'),
                    'width'         => 1200,
                    'height'        => 896,
                    'class'         => 'aspect-[4/3] w-full rounded-2xl object-cover',
                    'sizes'         => '(max-width: 1023px) 100vw, 600px',
                    'srcset_widths' => [400, 768, 1024, 1200],
                ]);
                ?>
            </div>

            <div>
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#6B6470]">
                    <?php esc_html_e('Makeup Tools & Beauty Accessories', 'dawp'); ?>
                </p>

                <h2 class="font-heading text-4xl font-black leading-tight text-[#2D2633] lg:text-5xl">
                    <?php esc_html_e('Simple tools for cleaner, easier beauty routines.', 'dawp'); ?>
                </h2>

                <p class="mt-5 max-w-2xl text-base leading-8 text-[#6B6470]">
                    <?php esc_html_e('From brushes and applicators to mirrors and small beauty helpers, One Shop Vibe brings practical accessories that make daily routines feel easier and more organized.', 'dawp'); ?>
                </p>

                <div class="mt-7 grid grid-cols-1 gap-3 sm:grid-cols-2">
                    <?php
                    $makeup_highlights = [
                        __('Makeup helpers', 'dawp'),
                        __('Beauty tools', 'dawp'),
                        __('Compact mirrors', 'dawp'),
                        __('Daily routine support', 'dawp'),
                    ];
                    ?>
                    <?php foreach ($makeup_highlights as $highlight) : ?>
                        <div class="flex items-center gap-3 rounded-2xl bg-[#F6F7F9] p-4">
                            <span class="h-3 w-3 shrink-0 rounded-full bg-[#F7C948]"></span>
                            <span class="text-sm font-bold text-[#2D2633]"><?php echo esc_html($highlight); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="mt-8">
                    <a href="<?php echo esc_url(home_url('/product-category/makeup-tools/')); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#2D2633] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#F7C948] hover:text-[#2D2633]">
                        <?php esc_html_e('Shop Makeup Tools', 'dawp'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Hair Care & Personal Care Essentials -->
    <section class="bg-[#DCD5FF] py-14 lg:py-20">
        <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-10 px-4 sm:px-6 lg:grid-cols-[1.05fr_0.95fr] lg:px-8">
            <div>
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#2D2633]">
                    <?php esc_html_e('Hair Care & Personal Care', 'dawp'); ?>
                </p>

                <h2 class="font-heading text-4xl font-black leading-tight text-[#2D2633] lg:text-5xl">
                    <?php esc_html_e('Everyday tools for simple self-care moments.', 'dawp'); ?>
                </h2>

                <p class="mt-5 max-w-2xl text-base leading-8 text-[#4F4657]">
                    <?php esc_html_e('Explore hair accessories, grooming tools, and personal care essentials designed to support daily routines at home or while traveling.', 'dawp'); ?>
                </p>

                <div class="mt-8 grid grid-cols-1 gap-5 sm:grid-cols-2">
                    <a href="<?php echo esc_url(home_url('/product-category/hair-care-essentials/')); ?>"
                       class="rounded-[1.25rem] border border-white/60 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                        <p class="mb-4 inline-flex rounded-full bg-[#EAF7F0] px-4 py-2 text-xs font-black uppercase tracking-[0.16em] text-[#2D2633]">
                            <?php esc_html_e('Hair Care Essentials', 'dawp'); ?>
                        </p>
                        <h3 class="text-2xl font-black leading-snug text-[#2D2633]">
                            <?php esc_html_e('Simple accessories for everyday styling and care.', 'dawp'); ?>
                        </h3>
                    </a>

                    <a href="<?php echo esc_url(home_url('/product-category/personal-care-tools/')); ?>"
                       class="rounded-[1.25rem] border border-white/60 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                        <p class="mb-4 inline-flex rounded-full bg-[#F7C948] px-4 py-2 text-xs font-black uppercase tracking-[0.16em] text-[#2D2633]">
                            <?php esc_html_e('Personal Care Tools', 'dawp'); ?>
                        </p>
                        <h3 class="text-2xl font-black leading-snug text-[#2D2633]">
                            <?php esc_html_e('Practical tools for easy daily grooming routines.', 'dawp'); ?>
                        </h3>
                    </a>
                </div>

                <div class="mt-8">
                    <a href="<?php echo esc_url(home_url('/product-category/personal-care-tools/')); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#2D2633] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#F7C948] hover:text-[#2D2633]">
                        <?php esc_html_e('Explore Personal Care', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <div class="overflow-hidden rounded-[1.25rem] border border-white/60 bg-white p-3 shadow-xl shadow-black/10">
                <?php
                echo dawp_responsive_image([
                    'src'           => $images['care_feature'],
                    'alt'           => __('Hair accessories and personal care tools arranged on a clean vanity surface', 'dawp'),
                    'width'         => 1200,
                    'height'        => 896,
                    'class'         => 'aspect-[4/5] w-full rounded-2xl object-cover',
                    'sizes'         => '(max-width: 1023px) 100vw, 560px',
                    'srcset_widths' => [400, 768, 1024, 1200],
                ]);
                ?>
            </div>
        </div>
    </section>

    <!-- Customer Care / Trust -->
    <section class="bg-[#2D2633] py-14 text-white lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-10 flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-3xl">
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#F7C948]">
                        <?php esc_html_e('Customer Care', 'dawp'); ?>
                    </p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-white lg:text-5xl">
                        <?php esc_html_e('Clear support from checkout to delivery.', 'dawp'); ?>
                    </h2>
                    <p class="mt-5 max-w-2xl text-base leading-8 text-white/75">
                        <?php esc_html_e('Shop beauty essentials with clear product details, order tracking, and customer support when you need help.', 'dawp'); ?>
                    </p>
                </div>

                <div class="flex flex-wrap gap-4">
                    <a href="<?php echo esc_url(home_url('/shipping-policy/')); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#F7C948] px-6 text-sm font-black uppercase tracking-wide text-[#2D2633] transition hover:bg-white">
                        <?php esc_html_e('View Shipping Policy', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>"
                       class="inline-flex min-h-12 items-center justify-center rounded-full border border-white/30 px-6 text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-[#2D2633]">
                        <?php esc_html_e('Contact Support', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <?php
                $trust_cards = [
                    __('Secure Checkout', 'dawp'),
                    __('Email Tracking', 'dawp'),
                    __('30-Day Returns', 'dawp'),
                    __('Clear Product Details', 'dawp'),
                ];
                ?>
                <?php foreach ($trust_cards as $index => $card) : ?>
                    <div class="rounded-[1.25rem] border border-white/10 bg-white/5 p-6">
                        <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-[#F7C948] text-sm font-black text-[#2D2633]">
                            <?php echo esc_html(str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT)); ?>
                        </div>
                        <h3 class="text-2xl font-black leading-snug text-white">
                            <?php echo esc_html($card); ?>
                        </h3>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="mt-8 grid grid-cols-1 gap-5 lg:grid-cols-2">
                <div class="rounded-[1.25rem] border border-white/10 bg-white/5 p-6">
                    <p class="text-xs font-black uppercase tracking-[0.2em] text-[#F7C948]">
                        <?php esc_html_e('Shipping Note', 'dawp'); ?>
                    </p>
                    <p class="mt-3 text-sm leading-7 text-white/75">
                        <?php esc_html_e('Orders are handled within 1-3 business days. Standard U.S. transit typically takes 5-7 business days after courier dispatch, for an estimated total delivery time of 6-10 business days from purchase.', 'dawp'); ?>
                    </p>
                </div>

                <div class="rounded-[1.25rem] border border-white/10 bg-white/5 p-6">
                    <p class="text-xs font-black uppercase tracking-[0.2em] text-[#F7C948]">
                        <?php esc_html_e('Return Note', 'dawp'); ?>
                    </p>
                    <p class="mt-3 text-sm leading-7 text-white/75">
                        <?php esc_html_e('Eligible unused and undamaged items may be returned within 30 days of delivery. Personal care items may be subject to hygiene and original condition requirements.', 'dawp'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

</div>
