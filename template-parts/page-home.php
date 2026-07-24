<?php
/**
 * Template Part: simple homepage
 */

$shop_url = home_url('/shop/');
$collections = array(
    array(
        'title' => __('Girls Dresses', 'dawp'),
        'copy'  => __('Soft, playful dresses for celebrations and everyday sparkle.', 'dawp'),
        'image' => 'assets/img/babygirls_dress.png',
        'url'   => home_url('/product-category/girls-dresses/'),
    ),
    array(
        'title' => __('Mommy & Me', 'dawp'),
        'copy'  => __('Coordinated outfits made for warm family moments.', 'dawp'),
        'image' => 'assets/img/Mom&me_collection.png',
        'url'   => home_url('/product-category/mommy-me-matching-sets/'),
    ),
    array(
        'title' => __('Women Casual', 'dawp'),
        'copy'  => __('Easy boutique pieces for weekends, errands, and sunny days.', 'dawp'),
        'image' => 'assets/img/women_casual.png',
        'url'   => home_url('/product-category/women-casual/'),
    ),
);
?>

<div class="home-page overflow-hidden">
    <section class="bg-[#FAF7F2]">
        <div class="mx-auto grid min-h-[calc(100vh-64px)] w-[min(100%-32px,1180px)] items-center gap-10 py-12 lg:grid-cols-[0.9fr_1.1fr] lg:py-16">
            <div>
                <p class="text-xs font-extrabold uppercase tracking-[0.18em] text-[#A64B55]"><?php esc_html_e('Women and Girls Boutique', 'dawp'); ?></p>
                <h1 class="mt-4 font-serif text-5xl font-bold leading-none text-[#2F2A28] md:text-7xl">
                    <?php esc_html_e('Sweet everyday style, made simple.', 'dawp'); ?>
                </h1>
                <p class="mt-6 max-w-xl text-lg leading-8 text-[#6F625D]">
                    <?php esc_html_e('A clean one-page boutique experience featuring soft dresses, casual women styles, and matching family favorites.', 'dawp'); ?>
                </p>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#A64B55] px-6 text-sm font-extrabold text-white transition hover:bg-[#2F2A28]">
                        <?php esc_html_e('Shop Now', 'dawp'); ?>
                    </a>
                    <a href="#collections" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#E6DDD6] bg-white px-6 text-sm font-extrabold text-[#2F2A28] transition hover:border-[#A64B55] hover:text-[#A64B55]">
                        <?php esc_html_e('View Collections', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <div class="relative">
                <div class="overflow-hidden rounded-lg bg-white shadow-[0_20px_50px_rgba(47,42,40,0.12)]">
                    <?php echo dawp_theme_image(
                        'assets/img/banner_baby.png',
                        'Boutique fashion for women and girls',
                        1086,
                        620,
                        array(array(420, 420), array(720, 560), array(1086, 620)),
                        '(max-width: 1023px) calc(100vw - 32px), 620px',
                        array('class' => 'h-[430px] w-full object-cover md:h-[620px]', 'loading' => 'eager', 'fetchpriority' => 'high')
                    ); ?>
                </div>
            </div>
        </div>
    </section>

    <section id="collections" class="py-14 md:py-20">
        <div class="mx-auto w-[min(100%-32px,1180px)]">
            <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                <div>
                    <p class="text-xs font-extrabold uppercase tracking-[0.18em] text-[#A64B55]"><?php esc_html_e('Collections', 'dawp'); ?></p>
                    <h2 class="mt-3 font-serif text-4xl font-bold leading-tight md:text-5xl"><?php esc_html_e('Shop the essentials', 'dawp'); ?></h2>
                </div>
                <p class="max-w-lg text-[#6F625D]"><?php esc_html_e('Only the core sections customers need on the homepage: discover, browse, trust, and contact.', 'dawp'); ?></p>
            </div>

            <div class="grid gap-5 md:grid-cols-3">
                <?php foreach ($collections as $collection) : ?>
                    <a href="<?php echo esc_url($collection['url']); ?>" class="group overflow-hidden rounded-lg border border-[#E6DDD6] bg-white transition hover:-translate-y-1 hover:shadow-[0_12px_30px_rgba(47,42,40,0.10)]">
                        <?php echo dawp_theme_image(
                            $collection['image'],
                            $collection['title'],
                            640,
                            520,
                            array(array(360, 320), array(520, 440), array(640, 520)),
                            '(max-width: 767px) calc(100vw - 32px), 374px',
                            array('class' => 'h-80 w-full object-cover transition duration-300 group-hover:scale-105')
                        ); ?>
                        <div class="p-5">
                            <h3 class="font-serif text-2xl font-bold"><?php echo esc_html($collection['title']); ?></h3>
                            <p class="mt-2 text-sm leading-6 text-[#6F625D]"><?php echo esc_html($collection['copy']); ?></p>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="new-arrivals" class="bg-[#FAF7F2] py-14 md:py-20">
        <div class="mx-auto w-[min(100%-32px,1180px)]">
            <div class="mb-8 flex items-end justify-between gap-4">
                <div>
                    <p class="text-xs font-extrabold uppercase tracking-[0.18em] text-[#A64B55]"><?php esc_html_e('New Arrivals', 'dawp'); ?></p>
                    <h2 class="mt-3 font-serif text-4xl font-bold leading-tight md:text-5xl"><?php esc_html_e('Fresh from the boutique', 'dawp'); ?></h2>
                </div>
                <a href="<?php echo esc_url($shop_url); ?>" class="hidden min-h-11 items-center justify-center rounded-md bg-white px-5 text-sm font-extrabold text-[#2F2A28] transition hover:text-[#A64B55] sm:inline-flex"><?php esc_html_e('Shop All', 'dawp'); ?></a>
            </div>

            <?php
            $products = class_exists('WooCommerce') ? wc_get_products(array(
                'status'  => 'publish',
                'limit'   => 4,
                'orderby' => 'date',
                'order'   => 'DESC',
            )) : array();
            ?>

            <?php if (!empty($products)) : ?>
                <div class="grid grid-cols-2 gap-4 md:gap-6 lg:grid-cols-4">
                    <?php foreach ($products as $product) : ?>
                        <article class="overflow-hidden rounded-lg border border-[#E6DDD6] bg-white">
                            <a href="<?php echo esc_url($product->get_permalink()); ?>">
                                <?php echo dawp_product_responsive_image($product, 'aspect-square w-full object-cover', '(max-width: 767px) calc((100vw - 48px) / 2), 280px'); ?>
                            </a>
                            <div class="p-4">
                                <h3 class="line-clamp-2 min-h-10 text-sm font-extrabold"><?php echo esc_html($product->get_name()); ?></h3>
                                <p class="mt-2 font-extrabold text-[#A64B55]"><?php echo wp_kses_post($product->get_price_html()); ?></p>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <div class="rounded-lg border border-[#E6DDD6] bg-white p-8 text-center">
                    <p class="font-serif text-3xl font-bold"><?php esc_html_e('Products will appear here.', 'dawp'); ?></p>
                    <p class="mx-auto mt-3 max-w-xl text-[#6F625D]"><?php esc_html_e('Once WooCommerce products are published, the latest four items will be shown automatically.', 'dawp'); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section id="story" class="py-14 md:py-20">
        <div class="mx-auto grid w-[min(100%-32px,1180px)] items-center gap-8 lg:grid-cols-2">
            <div class="overflow-hidden rounded-lg bg-[#F5F3F1]">
                <?php echo dawp_theme_image(
                    'assets/img/mom_baby_store.png',
                    'Warm boutique shopping story',
                    900,
                    560,
                    array(array(420, 380), array(700, 520), array(900, 560)),
                    '(max-width: 1023px) calc(100vw - 32px), 560px',
                    array('class' => 'h-[420px] w-full object-cover md:h-[560px]')
                ); ?>
            </div>
            <div>
                <p class="text-xs font-extrabold uppercase tracking-[0.18em] text-[#A64B55]"><?php esc_html_e('Our Story', 'dawp'); ?></p>
                <h2 class="mt-3 font-serif text-4xl font-bold leading-tight md:text-5xl"><?php esc_html_e('A softer way to shop family style.', 'dawp'); ?></h2>
                <p class="mt-5 text-lg leading-8 text-[#6F625D]">
                    <?php esc_html_e('This rebuilt homepage keeps the brand focused: a friendly header, a strong first impression, useful collection paths, recent products, and a compact footer.', 'dawp'); ?>
                </p>
                <div class="mt-8 grid gap-4 sm:grid-cols-3">
                    <div class="rounded-lg border border-[#E6DDD6] p-5">
                        <strong class="block text-2xl text-[#A64B55]">01</strong>
                        <span class="mt-2 block text-sm font-bold"><?php esc_html_e('Simple', 'dawp'); ?></span>
                    </div>
                    <div class="rounded-lg border border-[#E6DDD6] p-5">
                        <strong class="block text-2xl text-[#A64B55]">02</strong>
                        <span class="mt-2 block text-sm font-bold"><?php esc_html_e('Responsive', 'dawp'); ?></span>
                    </div>
                    <div class="rounded-lg border border-[#E6DDD6] p-5">
                        <strong class="block text-2xl text-[#A64B55]">03</strong>
                        <span class="mt-2 block text-sm font-bold"><?php esc_html_e('Shop Ready', 'dawp'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
