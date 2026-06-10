<?php
/**
 * Template Part: Home
 *
 * @package dawp
 */

$shop_url             = home_url('/shop/');
$support_email        = 'support@houseofshoesonline.com';
$contact_url          = home_url('/contact-us/');
$size_guide_url       = home_url('/size-guide/');

if (!function_exists('dawp_home_category_url')) {
    function dawp_home_category_url($slug) {
        $term = get_term_by('slug', $slug, 'product_cat');

        if ($term && !is_wp_error($term)) {
            $link = get_term_link($term);
            if (!is_wp_error($link)) {
                return $link;
            }
        }

        return home_url('/product-category/' . trailingslashit($slug));
    }
}

if (!function_exists('dawp_home_category_image')) {
    function dawp_home_category_image($slug) {
        $term = get_term_by('slug', $slug, 'product_cat');

        if ($term && !is_wp_error($term)) {
            $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
            $image_url    = $thumbnail_id ? wp_get_attachment_image_url($thumbnail_id, 'large') : '';

            if ($image_url) {
                return $image_url;
            }
        }

        if (function_exists('wc_placeholder_img_src')) {
            return wc_placeholder_img_src('large');
        }

        return get_template_directory_uri() . '/assets/img/payment-methods.webp';
    }
}

if (!function_exists('dawp_home_first_product_image')) {
    function dawp_home_first_product_image($category_slug = '') {
        if (!function_exists('wc_get_products')) {
            return function_exists('wc_placeholder_img_src') ? wc_placeholder_img_src('large') : '';
        }

        $args = [
            'limit'  => 1,
            'status' => 'publish',
        ];

        if ($category_slug) {
            $args['category'] = [$category_slug];
        }

        $products = wc_get_products($args);
        $product  = $products ? $products[0] : null;

        if ($product) {
            $image_url = wp_get_attachment_image_url($product->get_image_id(), 'large');
            if ($image_url) {
                return $image_url;
            }
        }

        return function_exists('wc_placeholder_img_src') ? wc_placeholder_img_src('large') : '';
    }
}

$categories = [
    [
        'name' => __('Everyday Sneakers', 'dawp'),
        'slug' => 'everyday-sneakers',
        'copy' => __('Casual sneakers for daily outfits and easy movement.', 'dawp'),
        'badge' => __('Daily Wear', 'dawp'),
        'image' => get_template_directory_uri() . '/assets/img/gallery/Image/sneaker_two.png',
    ],
    [
        'name' => __('Comfort Shoes', 'dawp'),
        'slug' => 'comfort-shoes',
        'copy' => __('Soft everyday styles made for walking, errands, and daily routines.', 'dawp'),
        'badge' => __('Comfort Style', 'dawp'),
        'image' => get_template_directory_uri() . '/assets/img/gallery/Image/comfort_shoes.png',
    ],
    [
        'name' => __('Sandals & Slides', 'dawp'),
        'slug' => 'sandals-slides',
        'copy' => __('Easy warm-weather footwear for relaxed days and casual looks.', 'dawp'),
        'badge' => __('Easy Wear', 'dawp'),
        'image' => get_template_directory_uri() . '/assets/img/gallery/Image/Slides.png',
    ],
    [
        'name' => __('Slippers', 'dawp'),
        'slug' => 'slippers',
        'copy' => __('Soft house shoes for simple comfort at home.', 'dawp'),
        'badge' => __('Home Comfort', 'dawp'),
        'image' => get_template_directory_uri() . '/assets/img/gallery/Image/Slippers.png',
    ],
    [
        'name' => __('Boots', 'dawp'),
        'slug' => 'boots',
        'copy' => __('Everyday boot styles for seasonal outfits and confident steps.', 'dawp'),
        'badge' => __('Seasonal Style', 'dawp'),
        'image' => get_template_directory_uri() . '/assets/img/gallery/Image/boots_new.png',
    ],
];

$new_arrivals = function_exists('wc_get_products') ? wc_get_products([
    'limit'   => 3,
    'orderby' => 'date',
    'order'   => 'DESC',
    'status'  => 'publish',
]) : [];
?>

<!-- Hero -->
<section class="relative overflow-hidden bg-[#FFF7FB] text-[#141217]">
    <div class="absolute left-0 top-0 h-1 w-full bg-[linear-gradient(90deg,#E6007E,#FF4FB8,#7C3AED)]"></div>
    <div class="absolute inset-y-0 right-0 hidden w-[46%] bg-[linear-gradient(135deg,#F3E8FF_0%,#F4DDE8_100%)] lg:block"></div>

    <div class="relative mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 py-14 sm:px-6 lg:min-h-[650px] lg:grid-cols-[0.92fr_1.08fr] lg:items-center lg:px-8 lg:py-20">
        <div class="max-w-2xl">
            <div class="mb-7 flex flex-wrap items-center gap-3">
                <span class="inline-flex rounded-full bg-white px-4 py-2 text-xs font-black uppercase tracking-[0.18em] text-[#E6007E] shadow-sm shadow-[#141217]/5">
                    <?php esc_html_e('Modern Footwear Boutique', 'dawp'); ?>
                </span>
                <span class="hidden h-px w-16 bg-[#F0C7DC] sm:block"></span>
                <span class="text-sm font-extrabold text-[#7C3AED]">
                    <?php esc_html_e('Sneakers, sandals, boots & more', 'dawp'); ?>
                </span>
            </div>

            <h1 class="font-heading text-5xl font-black leading-[0.94] text-[#141217] sm:text-6xl lg:text-7xl">
                <?php esc_html_e('Everyday Shoes With Boutique Energy', 'dawp'); ?>
            </h1>

            <p class="mt-6 max-w-xl text-lg leading-8 text-[#5E5363]">
                <?php esc_html_e('Shop comfortable everyday shoes, sneakers, sandals, slippers, and boots selected for easy outfits and confident steps.', 'dawp'); ?>
            </p>

            <div class="mt-9 flex flex-wrap gap-4">
                <a href="<?php echo esc_url($shop_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#E6007E] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#7C3AED]">
                    <?php esc_html_e('Shop Shoes', 'dawp'); ?>
                </a>

                <a href="<?php echo esc_url(dawp_home_category_url('boots')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#E6007E] bg-white px-7 text-sm font-black uppercase tracking-wide text-[#E6007E] transition hover:bg-[#F3E8FF]">
                    <?php esc_html_e('Explore Boots', 'dawp'); ?>
                </a>
            </div>

            <div class="mt-10 grid max-w-2xl grid-cols-1 gap-3 sm:grid-cols-2">
                <a href="<?php echo esc_url(dawp_home_category_url('everyday-sneakers')); ?>" class="group border-l-4 border-[#7C3AED] bg-white p-4 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                    <span class="text-xs font-black uppercase tracking-[0.16em] text-[#7C3AED]"><?php esc_html_e('01', 'dawp'); ?></span>
                    <span class="mt-2 block font-heading text-xl font-black leading-tight text-[#141217]"><?php esc_html_e('Sneakers', 'dawp'); ?></span>
                </a>
                <a href="<?php echo esc_url(dawp_home_category_url('sandals-slides')); ?>" class="group border-l-4 border-[#FF4FB8] bg-white p-4 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                    <span class="text-xs font-black uppercase tracking-[0.16em] text-[#E6007E]"><?php esc_html_e('02', 'dawp'); ?></span>
                    <span class="mt-2 block font-heading text-xl font-black leading-tight text-[#141217]"><?php esc_html_e('Sandals & Slides', 'dawp'); ?></span>
                </a>
            </div>
        </div>

        <div class="relative lg:pl-6">
            <div class="grid grid-cols-[0.82fr_1.18fr] gap-4 sm:gap-5">
                <div class="space-y-4 pt-8 sm:space-y-5 lg:pt-16">
                    <a href="<?php echo esc_url(dawp_home_category_url('boots')); ?>" class="group block overflow-hidden rounded-[1.6rem] bg-white p-3 shadow-xl shadow-[#E6007E]/10 transition hover:-translate-y-1">
                        <img <?php echo dawp_i0_img_attrs(get_template_directory_uri() . '/assets/img/gallery/Image/boots.png', [
                                 'width'   => 520,
                                 'height'  => 650,
                                 'srcset'  => [[260, 325], [390, 488], [520, 650], [720, 900]],
                                 'sizes'   => '(max-width: 1023px) 36vw, 260px',
                                 'loading' => 'eager',
                             ]); ?>
                             alt="<?php esc_attr_e('Everyday boots from House of Shoes Online', 'dawp'); ?>"
                             class="aspect-[4/5] w-full rounded-[1.1rem] bg-[#F6F5F7] object-cover transition duration-500 group-hover:scale-105">
                    </a>
                </div>

                <div class="space-y-4 sm:space-y-5">
                    <div class="mt-5 grid grid-cols-2 gap-4 sm:gap-5">
                        <div class="bg-white p-5 shadow-sm">
                            <p class="text-xs font-black uppercase tracking-[0.16em] text-[#7C3AED]"><?php esc_html_e('Fit First', 'dawp'); ?></p>
                            <p class="mt-2 text-sm font-bold leading-6 text-[#5E5363]"><?php esc_html_e('Clear size guidance and product details before checkout.', 'dawp'); ?></p>
                        </div>
                        <a href="<?php echo esc_url(dawp_home_category_url('everyday-sneakers')); ?>" class="group block overflow-hidden rounded-[1.25rem] bg-white p-2 shadow-sm transition hover:-translate-y-1">
                            <img <?php echo dawp_i0_img_attrs(get_template_directory_uri() . '/assets/img/gallery/Image/sneaker.png', [
                                     'width'   => 360,
                                     'height'  => 360,
                                     'srcset'  => [[180, 180], [280, 280], [360, 360], [520, 520]],
                                     'sizes'   => '(max-width: 1023px) 38vw, 170px',
                                     'loading' => 'eager',
                                 ]); ?>
                                 alt="<?php esc_attr_e('Everyday sneakers from House of Shoes Online', 'dawp'); ?>"
                                 class="aspect-square w-full rounded-[0.9rem] bg-[#F6F5F7] object-cover transition duration-500 group-hover:scale-105">
                        </a>
                    </div>
                    <a href="<?php echo esc_url(dawp_home_category_url('sandals-slides')); ?>" class="group block overflow-hidden rounded-[1.6rem] bg-[#141217] p-3 shadow-xl shadow-[#141217]/10 transition hover:-translate-y-1">
                        <img <?php echo dawp_i0_img_attrs(get_template_directory_uri() . '/assets/img/gallery/Image/Sandals_Women.png', [
                                 'width'   => 640,
                                 'height'  => 512,
                                 'srcset'  => [[320, 256], [480, 384], [640, 512], [900, 720]],
                                 'sizes'   => '(max-width: 1023px) 58vw, 360px',
                                 'loading' => 'eager',
                             ]); ?>
                             alt="<?php esc_attr_e('Sandals and slides from House of Shoes Online', 'dawp'); ?>"
                             class="aspect-[5/4] w-full rounded-[1.1rem] bg-[#F6F5F7] object-cover opacity-95 transition duration-500 group-hover:scale-105">
                    </a>
                </div>
            </div>

            <div class="pointer-events-none absolute -right-8 top-8 hidden h-24 w-24 rounded-full border border-white/80 lg:block"></div>
            <div class="pointer-events-none absolute -bottom-8 left-6 hidden h-20 w-20 rounded-full bg-[#E6007E]/10 lg:block"></div>
        </div>
    </div>
</section>

<!-- Shop By Footwear Style -->
<section class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-[0.7fr_1.3fr] lg:items-start">
            <div class="lg:sticky lg:top-8">
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]"><?php esc_html_e('Shop By Footwear Style', 'dawp'); ?></p>
                <h2 class="font-heading text-4xl font-black leading-tight text-[#141217] lg:text-5xl"><?php esc_html_e('Footwear categories made easy to browse.', 'dawp'); ?></h2>
                <p class="mt-5 max-w-xl text-base leading-7 text-[#6F625D]">
                    <?php esc_html_e('Find everyday sneakers, comfort shoes, sandals, slides, slippers, and boots without confusing marketplace clutter.', 'dawp'); ?>
                </p>

                <a href="<?php echo esc_url($shop_url); ?>" class="mt-8 inline-flex min-h-12 items-center justify-center rounded-full bg-[#141217] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#E6007E]">
                    <?php esc_html_e('Browse All Shoes', 'dawp'); ?>
                </a>
            </div>

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                <?php foreach ($categories as $index => $category) : ?>
                    <a href="<?php echo esc_url(dawp_home_category_url($category['slug'])); ?>" class="group relative overflow-hidden rounded-[1.5rem] border border-[#EEE5EF] bg-[#F6F5F7] shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-[#E6007E]/10 <?php echo 0 === $index ? 'sm:col-span-2' : ''; ?>">
                        <img <?php echo dawp_i0_img_attrs($category['image'], [
                                 'width'  => 0 === $index ? 1200 : 640,
                                 'height' => 0 === $index ? 600 : 480,
                                 'srcset' => 0 === $index ? [[480, 240], [768, 384], [1024, 512], [1200, 600]] : [[320, 240], [480, 360], [640, 480], [900, 675]],
                                 'sizes'  => 0 === $index ? '(max-width: 1023px) 100vw, 780px' : '(max-width: 640px) 100vw, (max-width: 1023px) 50vw, 380px',
                             ]); ?>
                             alt="<?php echo esc_attr($category['name']); ?>"
                             class="<?php echo 0 === $index ? 'aspect-[16/8]' : 'aspect-[4/3]'; ?> w-full object-cover transition duration-500 group-hover:scale-105">
                        <div class="absolute inset-x-0 bottom-0 bg-[linear-gradient(180deg,rgba(20,18,23,0)_0%,rgba(20,18,23,0.82)_100%)] p-5 pt-16 text-white">
                            <span class="inline-flex rounded-full bg-white/90 px-3 py-1 text-xs font-black uppercase tracking-wide text-[#7C3AED]">
                                <?php echo esc_html($category['badge']); ?>
                            </span>
                            <h3 class="mt-3 font-heading text-2xl font-black leading-tight">
                                <?php echo esc_html($category['name']); ?>
                            </h3>
                            <p class="mt-2 max-w-xl text-sm leading-6 text-white/82">
                                <?php echo esc_html($category['copy']); ?>
                            </p>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<?php if ($new_arrivals) : ?>
<!-- New Arrivals -->
<section class="bg-[#F6F5F7] py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-[0.72fr_1.28fr] lg:items-stretch">
            <div class="rounded-[2rem] bg-white p-7 shadow-sm lg:p-9">
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]"><?php esc_html_e('New Arrivals', 'dawp'); ?></p>
                <h2 class="font-heading text-4xl font-black leading-tight text-[#141217] lg:text-5xl"><?php esc_html_e('Fresh footwear styles for everyday steps.', 'dawp'); ?></h2>
                <p class="mt-4 text-base leading-7 text-[#6F625D]">
                    <?php esc_html_e('Browse footwear selected for daily routines, casual outfits, and clear product details.', 'dawp'); ?>
                </p>

                <a href="<?php echo esc_url($shop_url); ?>" class="mt-8 inline-flex min-h-12 items-center justify-center rounded-full border border-[#E6007E] bg-white px-7 text-sm font-black uppercase tracking-wide text-[#E6007E] transition hover:bg-[#F3E8FF]">
                    <?php esc_html_e('View All', 'dawp'); ?>
                </a>
            </div>

            <div class="grid grid-cols-2 gap-4 lg:grid-cols-3 lg:gap-5">
                <?php foreach ($new_arrivals as $product) :
                    $img_url = wp_get_attachment_image_url($product->get_image_id(), 'woocommerce_thumbnail');
                    $img_url = $img_url ?: (function_exists('wc_placeholder_img_src') ? wc_placeholder_img_src('woocommerce_thumbnail') : '');
                    $price   = $product->get_price_html();
                    $link    = get_permalink($product->get_id());
                    $name    = $product->get_name();
                ?>
                    <article class="group overflow-hidden rounded-[1.5rem] border border-[#EEE5EF] bg-white transition hover:-translate-y-1 hover:shadow-xl hover:shadow-[#7C3AED]/10 lg:even:mt-10">
                        <a href="<?php echo esc_url($link); ?>" class="block overflow-hidden bg-white">
                            <img <?php echo dawp_i0_img_attrs($img_url, [
                                     'width'  => 480,
                                     'height' => 600,
                                     'srcset' => [[240, 300], [360, 450], [480, 600], [640, 800]],
                                     'sizes'  => '(max-width: 1023px) 50vw, 260px',
                                 ]); ?>
                                 alt="<?php echo esc_attr($name); ?>"
                                 class="aspect-[4/5] w-full object-cover transition duration-500 group-hover:scale-105">
                        </a>
                        <div class="p-4">
                            <p class="mb-2 inline-flex rounded-full bg-[#F4DDE8] px-3 py-1 text-[11px] font-black uppercase tracking-wide text-[#141217]">
                                <?php esc_html_e('New', 'dawp'); ?>
                            </p>
                            <h3 class="line-clamp-2 text-sm font-black leading-6 text-[#141217] sm:text-base"><?php echo esc_html($name); ?></h3>
                            <p class="mt-2 text-xs font-bold leading-5 text-[#6F625D]"><?php esc_html_e('Review size, fit note, material details, and return conditions before ordering.', 'dawp'); ?></p>
                            <div class="mt-3 font-black text-[#E6007E]"><?php echo wp_kses_post($price); ?></div>
                            <a href="<?php echo esc_url($link); ?>" class="mt-4 inline-flex w-full items-center justify-center rounded-full bg-[#141217] px-4 py-3 text-xs font-black uppercase tracking-wide text-white transition hover:bg-[#E6007E]">
                                <?php esc_html_e('View Product', 'dawp'); ?>
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Sneakers & Statement Shoes -->
<section class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 overflow-hidden rounded-[2rem] border border-[#EEE5EF] bg-[#F6F5F7] lg:grid-cols-[1.05fr_0.95fr]">
            <div class="p-6 sm:p-8 lg:p-10">
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E6007E]"><?php esc_html_e('Sneakers & Casual Shoes', 'dawp'); ?></p>
                <h2 class="font-heading text-4xl font-black leading-tight text-[#141217] lg:text-5xl">
                    <?php esc_html_e('Easy styles for daily outfits and confident moments.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-lg leading-8 text-[#6F625D]">
                    <?php esc_html_e('From casual sneakers to slip-on everyday shoes, House of Shoes Online offers footwear styles designed for simple routines, easy outfits, and comfortable daily wear.', 'dawp'); ?>
                </p>

                <div class="mt-7 flex flex-wrap gap-3 text-sm font-black text-[#141217]">
                    <div class="rounded-full bg-white px-4 py-3"><?php esc_html_e('Daily wear', 'dawp'); ?></div>
                    <div class="rounded-full bg-white px-4 py-3"><?php esc_html_e('Casual outfits', 'dawp'); ?></div>
                    <div class="rounded-full bg-white px-4 py-3"><?php esc_html_e('Easy movement', 'dawp'); ?></div>
                    <div class="rounded-full bg-white px-4 py-3"><?php esc_html_e('Boutique style', 'dawp'); ?></div>
                </div>

                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="<?php echo esc_url(dawp_home_category_url('everyday-sneakers')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#E6007E] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#7C3AED]">
                        <?php esc_html_e('Shop Sneakers', 'dawp'); ?>
                    </a>

                    <a href="<?php echo esc_url(dawp_home_category_url('comfort-shoes')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#E6007E] px-7 text-sm font-black uppercase tracking-wide text-[#E6007E] transition hover:bg-[#F3E8FF]">
                        <?php esc_html_e('Shop Comfort Shoes', 'dawp'); ?>
                    </a>
                </div>

                <p class="mt-6 rounded-2xl border border-[#F0C7DC] bg-[#FFF7FB] p-4 text-sm font-bold leading-6 text-[#6F625D]">
                    <?php esc_html_e('Please review the size guide and fit note before ordering footwear.', 'dawp'); ?>
                </p>
            </div>

            <div class="flex flex-col bg-white p-4 sm:p-6">
                <div class="flex-1 overflow-hidden rounded-[1.75rem] bg-[#F3E8FF] p-3">
                    <img <?php echo dawp_i0_img_attrs(get_template_directory_uri() . '/assets/img/gallery/Image/shoes_comfort.png', [
                             'width'  => 900,
                             'height' => 900,
                             'srcset' => [[360, 360], [640, 640], [900, 900], [1200, 1200]],
                             'sizes'  => '(max-width: 1023px) 100vw, 520px',
                         ]); ?>
                         alt="<?php esc_attr_e('Sneakers and casual shoes', 'dawp'); ?>"
                         class="h-full w-full min-h-[350px] rounded-[1.2rem] object-cover">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Easy-Wear Footwear -->
<section class="bg-[#F4DDE8] py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-[0.85fr_1.15fr] lg:items-stretch">
            <div class="overflow-hidden rounded-[2rem] bg-white p-3 shadow-2xl shadow-[#141217]/10 lg:order-2">
                <img <?php echo dawp_i0_img_attrs(get_template_directory_uri() . '/assets/img/gallery/Image/bootsboots.png', [
                         'width'  => 900,
                         'height' => 720,
                         'srcset' => [[360, 288], [640, 512], [900, 720], [1200, 960]],
                         'sizes'  => '(max-width: 1023px) 100vw, 620px',
                     ]); ?>
                     alt="<?php esc_attr_e('Sandals slides slippers and casual boots', 'dawp'); ?>"
                     class="aspect-[5/4] h-full w-full rounded-[1.35rem] object-cover">
            </div>

            <div class="lg:order-1">
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#7C3AED]"><?php esc_html_e('Sandals, Slides & Slippers', 'dawp'); ?></p>
                <h2 class="font-heading text-4xl font-black leading-tight text-[#141217] lg:text-5xl">
                    <?php esc_html_e('Relaxed footwear for home, errands, and easy days.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-lg leading-8 text-[#5E5363]">
                    <?php esc_html_e('Explore sandals, slides, slippers, and casual boots made for simple comfort, casual outfits, and everyday routines at home or on the go.', 'dawp'); ?>
                </p>

                <div class="mt-8 grid gap-4">
                    <a href="<?php echo esc_url(dawp_home_category_url('sandals-slides')); ?>" class="grid grid-cols-[auto_1fr] gap-4 rounded-3xl bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                        <span class="flex h-12 w-12 items-center justify-center rounded-full bg-[#F3E8FF] text-sm font-black text-[#7C3AED]">01</span>
                        <span>
                            <h3 class="font-heading text-2xl font-black text-[#141217]"><?php esc_html_e('Sandals & Slides', 'dawp'); ?></h3>
                            <p class="mt-2 text-sm leading-6 text-[#6F625D]"><?php esc_html_e('Easy slip-on styles for warm days and casual wear.', 'dawp'); ?></p>
                        </span>
                    </a>
                    <a href="<?php echo esc_url(dawp_home_category_url('slippers')); ?>" class="grid grid-cols-[auto_1fr] gap-4 rounded-3xl bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                        <span class="flex h-12 w-12 items-center justify-center rounded-full bg-[#F3E8FF] text-sm font-black text-[#7C3AED]">02</span>
                        <span>
                            <h3 class="font-heading text-2xl font-black text-[#141217]"><?php esc_html_e('Slippers', 'dawp'); ?></h3>
                            <p class="mt-2 text-sm leading-6 text-[#6F625D]"><?php esc_html_e('Soft house shoes for comfort-focused home routines.', 'dawp'); ?></p>
                        </span>
                    </a>
                    <a href="<?php echo esc_url(dawp_home_category_url('boots')); ?>" class="grid grid-cols-[auto_1fr] gap-4 rounded-3xl bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                        <span class="flex h-12 w-12 items-center justify-center rounded-full bg-[#F3E8FF] text-sm font-black text-[#7C3AED]">03</span>
                        <span>
                            <h3 class="font-heading text-2xl font-black text-[#141217]"><?php esc_html_e('Boots', 'dawp'); ?></h3>
                            <p class="mt-2 text-sm leading-6 text-[#6F625D]"><?php esc_html_e('Seasonal boot styles for everyday outfits and confident steps.', 'dawp'); ?></p>
                        </span>
                    </a>
                </div>

                <a href="<?php echo esc_url($shop_url); ?>" class="mt-8 inline-flex min-h-12 items-center justify-center rounded-full bg-[#141217] px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#E6007E]">
                    <?php esc_html_e('Explore Easy-Wear Footwear', 'dawp'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

