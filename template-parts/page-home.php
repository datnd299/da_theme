<?php
/**
 * Template Part: page-home
 */

$gallery_uri = get_theme_file_uri('/assets/img/gallery/Rubyinstar/');

$images = [
    'hero'        => $gallery_uri . 'tire-hero-road.png',
    'tread'       => $gallery_uri . 'all-season-tread.png',
    'suv'         => $gallery_uri . 'category-suv-crossover-tires.png',
    'truck'       => $gallery_uri . 'category-light-truck-tires.png',
    'performance' => $gallery_uri . 'category-performance-tires.png',
    'all_season' => $gallery_uri . 'category-all-season-tires.png',
];

$shop_url = function_exists('wc_get_page_id') && wc_get_page_id('shop') > 0
    ? get_permalink(wc_get_page_id('shop'))
    : home_url('/shop/');

$product_query = null;
if (class_exists('WooCommerce')) {
    $product_query = new WP_Query([
        'post_type'           => 'product',
        'post_status'         => 'publish',
        'posts_per_page'      => 8,
        'ignore_sticky_posts' => true,
        'meta_query'          => WC()->query->get_meta_query(),
        'tax_query'           => WC()->query->get_tax_query(),
    ]);
}

$categories = [
    [
        'title' => __('Passenger Car Tires', 'dawp'),
        'copy'  => __('Reliable tires for daily driving and everyday vehicles.', 'dawp'),
        'image' => $images['tread'],
        'url'   => $shop_url,
    ],
    [
        'title' => __('SUV & Crossover Tires', 'dawp'),
        'copy'  => __('Comfortable and dependable tires for family vehicles.', 'dawp'),
        'image' => $images['suv'],
        'url'   => home_url('/shop-by-vehicle-type/'),
    ],
    [
        'title' => __('Truck Tires', 'dawp'),
        'copy'  => __('Durable options for pickups and work vehicles.', 'dawp'),
        'image' => $images['truck'],
        'url'   => home_url('/shop-by-vehicle-type/'),
    ],
    [
        'title' => __('Performance Tires', 'dawp'),
        'copy'  => __('Designed for better handling and driving experience.', 'dawp'),
        'image' => $images['performance'],
        'url'   => $shop_url,
    ],
];

$fallback_products = [
    ['brand' => 'Michelin', 'model' => 'Defender 2', 'size' => '215/55R17', 'type' => 'All Season', 'price' => '$189.99', 'badge' => 'Best Seller'],
    ['brand' => 'Goodyear', 'model' => 'Assurance ComfortDrive', 'size' => '225/60R18', 'type' => 'Touring', 'price' => '$176.99', 'badge' => 'Popular Choice'],
    ['brand' => 'Continental', 'model' => 'TrueContact Tour', 'size' => '205/55R16', 'type' => 'All Season', 'price' => '$154.99', 'badge' => 'Free Shipping'],
    ['brand' => 'Pirelli', 'model' => 'Scorpion AS Plus 3', 'size' => '235/55R19', 'type' => 'SUV', 'price' => '$214.99', 'badge' => 'SUV Pick'],
];

$deals = [
    ['title' => __('All Season Deals', 'dawp'), 'copy' => __('Practical year-round tire options for daily commutes.', 'dawp')],
    ['title' => __('SUV Tire Savings', 'dawp'), 'copy' => __('Dependable picks for crossovers and family SUVs.', 'dawp')],
    ['title' => __('Truck Tire Offers', 'dawp'), 'copy' => __('Durable choices for pickup and utility driving needs.', 'dawp')],
];

$trust_cards = [
    [
        'eyebrow' => __('Simple search', 'dawp'),
        'title'   => __('Easy Online Shopping', 'dawp'),
        'copy'    => __('Compare popular tire options, check key details, and order from home without the complicated showroom process.', 'dawp'),
        'icon'    => 'M3 5h18M8 12h8m-11 7h14',
    ],
    [
        'eyebrow' => __('Clear value', 'dawp'),
        'title'   => __('Competitive Pricing', 'dawp'),
        'copy'    => __('Shop practical tire choices with straightforward pricing built for everyday drivers and family vehicles.', 'dawp'),
        'icon'    => 'M12 8c-2.21 0-4 1.12-4 2.5S9.79 13 12 13s4 1.12 4 2.5S14.21 18 12 18m0-14v3m0 11v3',
    ],
    [
        'eyebrow' => __('Order updates', 'dawp'),
        'title'   => __('Reliable Delivery', 'dawp'),
        'copy'    => __('Stay informed after checkout with delivery details that help you plan around your tire arrival.', 'dawp'),
        'icon'    => 'M3 7h11v10H3zM14 11h3l4 4v2h-7zm-8 8a2 2 0 100-4 2 2 0 000 4zm11 0a2 2 0 100-4 2 2 0 000 4z',
    ],
    [
        'eyebrow' => __('Real help', 'dawp'),
        'title'   => __('Customer Support', 'dawp'),
        'copy'    => __('Get guidance when you need help narrowing down size, type, or the right tire for your driving routine.', 'dawp'),
        'icon'    => 'M18 10a6 6 0 10-12 0v4a3 3 0 003 3h1m8-7v4a3 3 0 01-3 3h-1m-4 3h4',
    ],
];

$feedback = [
    __('Easy shopping experience and clear product information.', 'dawp'),
    __('Great value and convenient delivery process.', 'dawp'),
    __('Found the right tires without the complicated process.', 'dawp'),
];
?>

<div id="primary" class="bg-white font-body text-[#111111]">

    <section class="relative overflow-hidden bg-[#050505] text-white">
        <img src="<?php echo esc_url($images['hero']); ?>"
             alt="<?php esc_attr_e('Tire rolling on an open road for online tire shopping', 'dawp'); ?>"
             class="absolute inset-0 h-full w-full object-cover"
             loading="eager"
             fetchpriority="high">
        <div class="absolute inset-0 bg-[#050505]/82 lg:bg-[linear-gradient(90deg,rgba(5,5,5,0.98)_0%,rgba(17,17,17,0.86)_48%,rgba(185,28,28,0.28)_100%)]"></div>

        <div class="relative mx-auto grid min-h-[680px] max-w-7xl grid-cols-1 items-center gap-8 px-4 py-16 sm:px-6 lg:grid-cols-[minmax(0,0.95fr)_minmax(0,1.05fr)] lg:px-8">
            <div class="max-w-3xl">
                <p class="mb-5 inline-flex rounded-md border border-[#FCA5A5]/50 bg-[#B91C1C]/20 px-4 py-2 text-xs font-black uppercase tracking-[0.18em] text-[#FCA5A5]">
                    <?php esc_html_e('Online Tire Shopping Made Simple', 'dawp'); ?>
                </p>
                <h1 class="font-heading text-5xl font-black leading-[0.98] text-white sm:text-6xl lg:text-7xl">
                    <?php esc_html_e('Find The Right Tires For Your Vehicle', 'dawp'); ?>
                </h1>
                <p class="mt-6 max-w-2xl text-lg leading-8 text-[#E5E5E5]">
                    <?php esc_html_e('Shop quality tires online with competitive prices, convenient delivery, and an easier buying experience.', 'dawp'); ?>
                </p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#DC2626] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-[#111111]">
                        <?php esc_html_e('Shop Tires', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/shop-by-rim-size/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md border border-[#FCA5A5]/70 bg-white/10 px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#DC2626]">
                        <?php esc_html_e('Find My Tire Size', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <div class="rounded-lg border border-white/20 bg-white p-5 text-[#111111] shadow-xl lg:p-10">
                <div class="flex flex-col gap-3 sm:flex-row">
                    <button class="min-h-11 flex-1 rounded-md bg-[#111111] px-4 text-sm font-black uppercase tracking-wide text-white" type="button">
                        <?php esc_html_e('Find By Vehicle', 'dawp'); ?>
                    </button>
                    <a href="<?php echo esc_url(home_url('/shop-by-rim-size/')); ?>" class="inline-flex min-h-11 flex-1 items-center justify-center rounded-md border border-[#D4D4D4] px-4 text-sm font-black uppercase tracking-wide text-[#111111] hover:border-[#DC2626]">
                        <?php esc_html_e('Find By Tire Size', 'dawp'); ?>
                    </a>
                </div>

                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="mt-6 space-y-4">
                    <input type="hidden" name="post_type" value="product">
                    <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                        <?php foreach ([__('Year', 'dawp'), __('Make', 'dawp'), __('Model', 'dawp'), __('Trim', 'dawp')] as $placeholder) : ?>
                            <input class="min-h-12 rounded-md border border-[#D4D4D4] px-4 text-sm font-semibold text-[#111111] placeholder:text-[#737373] focus:border-[#DC2626] focus:outline-none focus:ring-2 focus:ring-[#DC2626]/30"
                                   type="text"
                                   name="s"
                                   placeholder="<?php echo esc_attr($placeholder); ?>">
                        <?php endforeach; ?>
                    </div>
                    <button class="inline-flex min-h-12 w-full items-center justify-center rounded-md bg-[#DC2626] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#111111]" type="submit">
                        <?php esc_html_e('Search Tires', 'dawp'); ?>
                    </button>
                </form>

                <div class="mt-5 grid grid-cols-1 gap-3 sm:grid-cols-3">
                    <?php foreach ([__('Secure Checkout', 'dawp'), __('Order Tracking', 'dawp'), __('Easy Returns', 'dawp')] as $item) : ?>
                        <div class="rounded-md bg-[#FEE2E2] px-3 py-3 text-center text-xs font-black uppercase tracking-wide text-[#991B1B]">
                            <?php echo esc_html($item); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#F5F5F5] py-14 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                <div>
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#DC2626]"><?php esc_html_e('Shop By Category', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#111111] lg:text-5xl"><?php esc_html_e('Browse tires by everyday driving need.', 'dawp'); ?></h2>
                </div>
                <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#111111] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#DC2626]"><?php esc_html_e('View Categories', 'dawp'); ?></a>
            </div>

            <div class="home-category-slider grid grid-cols-2 gap-4 lg:grid-cols-4 xl:grid-cols-4">
                <?php foreach ($categories as $category) : ?>
                    <a href="<?php echo esc_url($category['url']); ?>" class="group overflow-hidden rounded-lg border border-[#D4D4D4] bg-white shadow-sm transition hover:-translate-y-1 hover:border-[#DC2626] hover:shadow-md">
                        <img src="<?php echo esc_url($category['image']); ?>" alt="<?php echo esc_attr($category['title']); ?>" class="aspect-[4/3] w-full object-cover transition duration-300 group-hover:scale-[1.03]" loading="lazy">
                        <div class="p-4">
                            <h3 class="font-heading text-xl font-black leading-snug text-[#111111]"><?php echo esc_html($category['title']); ?></h3>
                            <p class="mt-2 text-sm leading-6 text-[#525252]"><?php echo esc_html($category['copy']); ?></p>
                            <span class="mt-4 inline-flex text-sm font-black uppercase tracking-wide text-[#DC2626]"><?php esc_html_e('Shop Now', 'dawp'); ?></span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-white py-14 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                <div>
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#DC2626]"><?php esc_html_e('Featured Tires', 'dawp'); ?></p>
                    <h2 class="font-heading text-4xl font-black leading-tight text-[#111111] lg:text-5xl"><?php esc_html_e('Popular Tires For Everyday Drivers', 'dawp'); ?></h2>
                </div>
                <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#DC2626] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#111111]"><?php esc_html_e('View All Tires', 'dawp'); ?></a>
            </div>

            <div class="grid grid-cols-2 gap-4 lg:grid-cols-4">
                <?php if ($product_query && $product_query->have_posts()) : ?>
                    <?php while ($product_query->have_posts()) : $product_query->the_post(); ?>
                        <?php
                        global $product;
                        $brand = $product ? wc_get_product_category_list($product->get_id(), ', ') : '';
                        ?>
                        <article class="rounded-lg border border-[#D4D4D4] bg-white p-4 shadow-sm transition hover:-translate-y-1 hover:border-[#DC2626] hover:shadow-md">
                            <a href="<?php the_permalink(); ?>" class="block">
                                <div class="relative rounded-md bg-[#F5F5F5] p-4">
                                    <?php if ($product && $product->is_on_sale()) : ?>
                                        <span class="absolute left-3 top-3 rounded-md bg-[#DC2626] px-3 py-1.5 text-xs font-black uppercase tracking-wide text-white"><?php esc_html_e('Best Deal', 'dawp'); ?></span>
                                    <?php endif; ?>
                                    <?php echo $product ? $product->get_image('woocommerce_single', ['class' => 'h-48 w-full object-cover', 'loading' => 'lazy']) : ''; ?>
                                </div>
                                <div class="pt-5">
                                    <?php if ($brand) : ?>
                                        <div class="text-xs font-black uppercase tracking-wide text-[#DC2626]"><?php echo wp_kses_post($brand); ?></div>
                                    <?php endif; ?>
                                    <h3 class="mt-2 font-heading text-lg font-black leading-snug text-[#111111]"><?php the_title(); ?></h3>
                                    <p class="mt-3 text-sm font-semibold text-[#525252]"><?php esc_html_e('Shipping information available at checkout', 'dawp'); ?></p>
                                    <div class="mt-4 text-xl font-black text-[#111111]"><?php echo $product ? wp_kses_post($product->get_price_html()) : ''; ?></div>
                                    <span class="mt-4 inline-flex min-h-11 w-full items-center justify-center rounded-md bg-[#111111] px-5 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#DC2626]"><?php esc_html_e('Shop Now', 'dawp'); ?></span>
                                </div>
                            </a>
                        </article>
                    <?php endwhile; wp_reset_postdata(); ?>
                <?php else : ?>
                    <?php foreach ($fallback_products as $item) : ?>
                        <article class="rounded-lg border border-[#D4D4D4] bg-white p-4 shadow-sm">
                            <div class="relative rounded-md bg-[#F5F5F5] p-4">
                                <span class="absolute left-3 top-3 rounded-md bg-[#DC2626] px-3 py-1.5 text-xs font-black uppercase tracking-wide text-white"><?php echo esc_html($item['badge']); ?></span>
                                <img src="<?php echo esc_url($images['all_season']); ?>" alt="<?php echo esc_attr($item['brand'] . ' ' . $item['model']); ?>" class="h-48 w-full object-cover" loading="lazy">
                            </div>
                            <div class="pt-5">
                                <p class="text-xs font-black uppercase tracking-wide text-[#DC2626]"><?php echo esc_html($item['brand']); ?></p>
                                <h3 class="mt-2 font-heading text-lg font-black leading-snug text-[#111111]"><?php echo esc_html($item['model']); ?></h3>
                                <div class="mt-3 space-y-1 text-sm font-semibold text-[#525252]">
                                    <p><?php echo esc_html($item['size']); ?></p>
                                    <p><?php echo esc_html($item['type']); ?></p>
                                    <p><?php esc_html_e('Shipping information available at checkout', 'dawp'); ?></p>
                                </div>
                                <div class="mt-4 text-xl font-black text-[#111111]"><?php echo esc_html($item['price']); ?></div>
                                <a href="<?php echo esc_url($shop_url); ?>" class="mt-4 inline-flex min-h-11 w-full items-center justify-center rounded-md bg-[#111111] px-5 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#DC2626]"><?php esc_html_e('Shop Now', 'dawp'); ?></a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="bg-[#111111] py-14 text-white lg:py-20">
        <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-8 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
            <div>
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#FCA5A5]"><?php esc_html_e('Seasonal Picks', 'dawp'); ?></p>
                <h2 class="font-heading text-4xl font-black leading-tight text-white lg:text-5xl"><?php esc_html_e('Quality Tires At Better Prices', 'dawp'); ?></h2>
                <p class="mt-5 max-w-2xl text-base leading-8 text-[#D4D4D4]"><?php esc_html_e('Explore affordable tire options designed for everyday driving needs.', 'dawp'); ?></p>
                <a href="<?php echo esc_url($shop_url); ?>" class="mt-8 inline-flex min-h-12 items-center justify-center rounded-md bg-[#DC2626] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-[#111111]"><?php esc_html_e('Shop Deals', 'dawp'); ?></a>
            </div>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                <?php foreach ($deals as $deal) : ?>
                    <div class="rounded-lg border border-white/10 bg-white/10 p-5">
                        <h3 class="font-heading text-xl font-black text-white"><?php echo esc_html($deal['title']); ?></h3>
                        <p class="mt-3 text-sm leading-7 text-[#D4D4D4]"><?php echo esc_html($deal['copy']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-white py-14 lg:py-20">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-8 px-4 sm:px-6 lg:grid-cols-[minmax(0,0.9fr)_minmax(0,1.1fr)] lg:items-start lg:px-8">
            <div class="lg:sticky lg:top-8">
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#DC2626]"><?php esc_html_e('Why Rubyinstar', 'dawp'); ?></p>
                <h2 class="font-heading text-4xl font-black leading-tight text-[#111111] lg:text-5xl"><?php esc_html_e('Why Drivers Choose Rubyinstar', 'dawp'); ?></h2>
                <p class="mt-5 max-w-xl text-base leading-8 text-[#525252]"><?php esc_html_e('A cleaner tire-buying experience with practical product details, fair pricing, and support that keeps drivers moving.', 'dawp'); ?></p>
                <div class="mt-8 grid grid-cols-2 gap-3 sm:max-w-lg">
                    <div class="rounded-lg border border-[#D4D4D4] bg-[#F5F5F5] p-4">
                        <p class="font-heading text-3xl font-black text-[#111111]">4</p>
                        <p class="mt-1 text-xs font-black uppercase tracking-wide text-[#525252]"><?php esc_html_e('Core promises', 'dawp'); ?></p>
                    </div>
                    <div class="rounded-lg border border-[#D4D4D4] bg-[#F5F5F5] p-4">
                        <p class="font-heading text-3xl font-black text-[#111111]"><?php esc_html_e('Online', 'dawp'); ?></p>
                        <p class="mt-1 text-xs font-black uppercase tracking-wide text-[#525252]"><?php esc_html_e('Built for convenience', 'dawp'); ?></p>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <?php foreach ($trust_cards as $index => $card) : ?>
                    <article class="group rounded-lg border border-[#D4D4D4] bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:border-[#DC2626] hover:shadow-lg sm:p-6 <?php echo 0 === $index ? 'sm:mt-8' : ''; ?> <?php echo 3 === $index ? 'sm:-mt-8' : ''; ?>">
                        <div class="flex items-start gap-4">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-md bg-[#111111] text-white transition group-hover:bg-[#DC2626]">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo esc_attr($card['icon']); ?>" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.16em] text-[#DC2626]"><?php echo esc_html($card['eyebrow']); ?></p>
                                <h3 class="mt-2 font-heading text-xl font-black leading-snug text-[#111111]"><?php echo esc_html($card['title']); ?></h3>
                            </div>
                        </div>
                        <p class="mt-5 text-sm leading-7 text-[#525252]"><?php echo esc_html($card['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-[#F5F5F5] py-14 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-8 max-w-3xl">
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#DC2626]"><?php esc_html_e('Customer Feedback', 'dawp'); ?></p>
                <h2 class="font-heading text-4xl font-black leading-tight text-[#111111] lg:text-5xl"><?php esc_html_e('What Customers Say', 'dawp'); ?></h2>
            </div>
            <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
                <?php foreach ($feedback as $quote) : ?>
                    <figure class="rounded-lg border border-[#D4D4D4] bg-white p-6 shadow-sm">
                        <blockquote class="text-lg font-bold leading-8 text-[#111111]">"<?php echo esc_html($quote); ?>"</blockquote>
                    </figure>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-white py-14 lg:py-20">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-8 px-4 sm:px-6 lg:grid-cols-[minmax(0,0.95fr)_minmax(0,1.05fr)] lg:px-8">
            <div class="rounded-lg bg-[#111111] p-6 text-white sm:p-8 lg:p-10">
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#FCA5A5]"><?php esc_html_e('Tire Deals & Updates', 'dawp'); ?></p>
                <h2 class="font-heading text-4xl font-black leading-tight text-white"><?php esc_html_e('Get Tire Deals & Updates', 'dawp'); ?></h2>
                <p class="mt-4 text-base leading-8 text-[#D4D4D4]"><?php esc_html_e('Receive new offers, tire tips, and product updates.', 'dawp'); ?></p>
                <form class="mt-6 flex flex-col gap-3 sm:flex-row" action="<?php echo esc_url(home_url('/')); ?>" method="post">
                    <input class="min-h-12 flex-1 rounded-md border border-white/20 bg-white px-4 text-sm font-semibold text-[#111111] placeholder:text-[#737373] focus:outline-none" type="email" name="email" placeholder="<?php esc_attr_e('Enter your email', 'dawp'); ?>">
                    <button class="min-h-12 rounded-md bg-[#DC2626] px-7 text-sm font-black uppercase tracking-wide text-white hover:bg-white hover:text-[#111111]" type="submit"><?php esc_html_e('Subscribe', 'dawp'); ?></button>
                </form>
            </div>
            <div class="rounded-lg border border-[#D4D4D4] bg-[#F5F5F5] p-6 sm:p-8 lg:p-10">
                <h3 class="font-heading text-2xl font-black text-[#111111]"><?php esc_html_e('Shop with confidence', 'dawp'); ?></h3>
                <div class="mt-6 grid grid-cols-2 gap-3">
                    <?php
                    $footer_links = [
                        __('About Us', 'dawp') => home_url('/about-us/'),
                        __('Contact Us', 'dawp') => home_url('/contact-us/'),
                        __('Shipping Policy', 'dawp') => home_url('/shipping-policy/'),
                        __('Return & Refund Policy', 'dawp') => home_url('/returns-policy/'),
                        __('Privacy Policy', 'dawp') => home_url('/privacy-policy/'),
                        __('Terms Of Service', 'dawp') => home_url('/terms-conditions/'),
                        __('FAQ', 'dawp') => home_url('/faq/'),
                        __('Track Order', 'dawp') => home_url('/track-order/'),
                    ];
                    foreach ($footer_links as $label => $url) :
                    ?>
                        <a href="<?php echo esc_url($url); ?>" class="rounded-md border border-[#D4D4D4] bg-white px-4 py-3 text-sm font-bold text-[#111111] hover:border-[#DC2626] hover:text-[#DC2626]"><?php echo esc_html($label); ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

</div>
