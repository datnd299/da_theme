<?php
/**
 * Homepage content — Crowdfused.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$theme_uri   = get_template_directory_uri();
$theme_dir   = get_template_directory();
$shop_url    = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$about_url   = home_url('/about-us/');
$contact_url = home_url('/contact-us/');

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$cf_asset = static function ($file, $folder = 'gallery') use ($theme_uri, $theme_dir) {
    $relative = 'assets/img/' . $folder . '/' . $file;
    $path     = $theme_dir . '/' . $relative;
    $url      = $theme_uri . '/' . $relative;

    if (file_exists($path)) {
        return add_query_arg('ver', filemtime($path), $url);
    }

    return $url;
};

$cf_img = static function ($file, $alt, $folder = 'gallery', $class = '', $width = 900, $height = 700, $loading = 'lazy', $sizes = '') use ($cf_asset) {
    $url = $cf_asset($file, $folder);

    if (function_exists('dawp_get_responsive_image')) {
        return dawp_get_responsive_image($url, $alt, $class, $width, $height, $loading, $sizes);
    }

    return sprintf(
        '<img src="%s" alt="%s" class="%s" width="%d" height="%d" loading="%s" decoding="async">',
        esc_url($url),
        esc_attr($alt),
        esc_attr($class),
        (int) $width,
        (int) $height,
        esc_attr($loading)
    );
};

$cf_category_link = static function ($slug) {
    if (function_exists('get_term_by')) {
        $term = get_term_by('slug', $slug, 'product_cat');
        if ($term && !is_wp_error($term)) {
            $link = get_term_link($term);
            if (!is_wp_error($link)) {
                return ['url' => $link, 'count' => (int) $term->count];
            }
        }
    }

    return ['url' => home_url('/product-category/' . trim($slug, '/') . '/'), 'count' => 0];
};

$cf_rating_html = static function ($rating, $count) {
    if ($count < 1) {
        return '<p class="cf-rating cf-rating--empty">' . esc_html__('Be the first to review', 'dawp') . '</p>';
    }

    return sprintf(
        '<p class="cf-rating" aria-label="%s"><span class="cf-rating__stars" style="--cf-rating:%s"></span><span class="cf-rating__count">(%d)</span></p>',
        esc_attr(sprintf(__('Rated %s out of 5', 'dawp'), $rating)),
        esc_attr($rating),
        (int) $count
    );
};

$cf_product_card = static function ($product, $eager = false) use ($cf_rating_html) {
    if (!$product || !is_a($product, 'WC_Product') || !$product->is_visible()) {
        return '';
    }

    $benefit = wp_strip_all_tags($product->get_short_description());
    if (!$benefit) {
        $benefit = wp_strip_all_tags($product->get_description());
    }
    $benefit = $benefit ? wp_trim_words($benefit, 14) : __('Thoughtfully designed to make everyday life a little easier.', 'dawp');

    $image = function_exists('dawp_get_product_responsive_image')
        ? dawp_get_product_responsive_image($product, 'cf-product__img', 480, 480, '(max-width: 699px) 74vw, (max-width: 1023px) 40vw, 22vw')
        : $product->get_image('woocommerce_single', ['class' => 'cf-product__img', 'loading' => $eager ? 'eager' : 'lazy']);

    ob_start();
    ?>
    <article class="cf-product">
        <a class="cf-product__media" href="<?php echo esc_url($product->get_permalink()); ?>" aria-label="<?php echo esc_attr($product->get_name()); ?>">
            <?php echo $image; ?>
            <?php if ($product->is_on_sale()) : ?>
                <span class="cf-product__flag"><?php esc_html_e('New Lower Price', 'dawp'); ?></span>
            <?php endif; ?>
        </a>
        <div class="cf-product__body">
            <h3 class="cf-product__title"><a href="<?php echo esc_url($product->get_permalink()); ?>"><?php echo esc_html($product->get_name()); ?></a></h3>
            <p class="cf-product__benefit"><?php echo esc_html($benefit); ?></p>
            <?php echo $cf_rating_html(number_format((float) $product->get_average_rating(), 1), $product->get_rating_count()); ?>
            <div class="cf-product__foot">
                <span class="cf-product__price"><?php echo wp_kses_post($product->get_price_html()); ?></span>
                <a class="cf-product__cta" href="<?php echo esc_url($product->get_permalink()); ?>"><?php esc_html_e('View Product', 'dawp'); ?></a>
            </div>
        </div>
    </article>
    <?php
    return ob_get_clean();
};

$cf_trending  = [];

if (function_exists('wc_get_products')) {
    $cf_trending = wc_get_products([
        'status'   => 'publish',
        'limit'    => 8,
        'orderby'  => 'date',
        'order'    => 'DESC',
        'featured' => true,
    ]);

    if (count($cf_trending) < 4) {
        $cf_trending_ids = wp_list_pluck($cf_trending, 'id');
        $more = wc_get_products([
            'status'  => 'publish',
            'limit'   => 8 - count($cf_trending),
            'orderby' => 'date',
            'order'   => 'DESC',
            'exclude' => $cf_trending_ids,
        ]);
        $cf_trending = array_merge($cf_trending, $more);
    }
}

$cf_categories = [
    ['slug' => 'electronics', 'title' => __('Smart Home & Tech', 'dawp'), 'copy' => __('Connected devices and everyday tech that quietly make home life easier.', 'dawp'), 'image' => 'Smart_home_connected_devices_202607281526.jpeg', 'folder' => 'New_homepage'],
    ['slug' => 'sports-outdoors', 'title' => __('Outdoor & Adventure', 'dawp'), 'copy' => __('Portable gear and recreation essentials built for time outside.', 'dawp'), 'image' => 'Outdoor&Adventure.jpeg', 'folder' => 'New_homepage'],
    ['slug' => 'home', 'title' => __('Kitchen & Home Innovation', 'dawp'), 'copy' => __('Smart cooking tools and home essentials that simplify daily routines.', 'dawp'), 'image' => 'Kitchen_Home_Innovation_Smart_Tools_202607281513.jpeg', 'folder' => 'New_homepage'],
    ['slug' => 'garden-tools', 'title' => __('Outdoor Living & Patio', 'dawp'), 'copy' => __('Patio, garden and handy tools designed for relaxed outdoor living.', 'dawp'), 'image' => 'Patio_garden_handy_tools_202607281516.jpeg', 'folder' => 'New_homepage'],
    ['slug' => 'school-office-art-supplies', 'title' => __('Office & Productivity', 'dawp'), 'copy' => __('Desk accessories and workspace essentials for focused, organized days.', 'dawp'), 'image' => 'Office_desk_accessories_workspac…_202607281532.jpeg', 'folder' => 'New_homepage'],
    ['slug' => 'beauty-personal-care', 'title' => __('Wellness & Self-Care', 'dawp'), 'copy' => __('Thoughtful personal care finds that make everyday routines feel better.', 'dawp'), 'image' => 'Wellness_self-care_personal_care…_202607281533.jpeg', 'folder' => 'New_homepage'],
];

$cf_collections = [
    [
        'slug'  => 'auto-tires',
        'label' => __('Auto & Tires', 'dawp'),
        'title' => __('Gear Up For The Road', 'dawp'),
        'copy'  => __('Practical vehicle accessories, tire care and tools that keep every drive running smoothly.', 'dawp'),
        'cta'   => __('Shop Auto & Tires', 'dawp'),
        'image' => 'car_tire.jpg',
        'folder' => 'New_homepage',
    ],
    [
        'slug'   => 'garden-tools',
        'label'  => __('Patio Picks', 'dawp'),
        'title'  => __('Smart Picks for Your Patio', 'dawp'),
        'copy'   => __('Weather-ready accents, lighting and handy tools that make outdoor living effortless.', 'dawp'),
        'cta'    => __('Shop Patio Picks', 'dawp'),
        'image'  => 'Summer_Patio_Edit.jpeg',
        'folder' => 'home',
    ],
];

$cf_problem_solution = [
    [
        'problem'  => __('Busy mornings.', 'dawp'),
        'solution' => __('Smart products that simplify daily routines.', 'dawp'),
        'icon'     => '<circle cx="12" cy="13" r="7"></circle><path d="M12 9.5v4l2.6 1.6"></path><path d="M5 3.5 3.2 5.3M19 3.5l1.8 1.8"></path>',
    ],
    [
        'problem'  => __('Messy spaces.', 'dawp'),
        'solution' => __('Innovative organization designed for modern living.', 'dawp'),
        'icon'     => '<path d="M3.5 7 12 3l8.5 4-8.5 4-8.5-4Z"></path><path d="M3.5 7v10l8.5 4 8.5-4V7"></path><path d="M12 11v10"></path>',
    ],
    [
        'problem'  => __('Travel inconvenience.', 'dawp'),
        'solution' => __('Compact gear built for every journey.', 'dawp'),
        'icon'     => '<rect x="3.5" y="7.5" width="17" height="12.5" rx="2.2"></rect><path d="M9 7.5v-2a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2"></path><path d="M3.5 13h17"></path>',
    ],
];

$cf_why_shop = [
    [
        'title' => __('Exclusive Deals', 'dawp'),
        'copy'  => __("Shop unique deals you won't easily find anywhere else.", 'dawp'),
        'icon'  => '<rect x="3" y="6.5" width="18" height="11" rx="1.6"></rect><path d="M7 6.5V5.2A1.7 1.7 0 0 1 8.7 3.5h6.6A1.7 1.7 0 0 1 17 5.2v1.3"></path><path d="M7 10.5h6M7 13.5h4"></path>',
    ],
    [
        'title' => __('Free Shipping', 'dawp'),
        'copy'  => __('Enjoy delivery with no extra shipping cost.', 'dawp'),
        'icon'  => '<path d="M3 7h11v9H3z"></path><path d="M14 10.5h4l3 2.5v3h-7z"></path><circle cx="7.5" cy="18" r="1.8"></circle><circle cx="17.5" cy="18" r="1.8"></circle>',
    ],
    [
        'title' => __('Trusted by Customers', 'dawp'),
        'copy'  => __('Over 70% of shoppers return for more great deals.', 'dawp'),
        'icon'  => '<path d="M12 3.2 14.5 9l6.3.6-4.8 4.1 1.5 6.1L12 16.8 6.5 19.8 8 13.7 3.2 9.6 9.5 9z"></path>',
    ],
    [
        'title' => __('30-Day Return Policy', 'dawp'),
        'copy'  => __('Enjoy easy, hassle-free returns within 30 days for a confident shopping experience.', 'dawp'),
        'icon'  => '<path d="M5.5 5.5h9a3.5 3.5 0 0 1 0 7H9"></path><path d="m11 9.5-3-3 3-3"></path><path d="M5.5 12v7h13v-7"></path>',
    ],
];

$cf_testimonials = [
    ['name' => __('Amara K.', 'dawp'), 'location' => __('Austin, TX', 'dawp'), 'rating' => '5.0', 'copy' => __('The kitchen tools I ordered are genuinely well made, and checkout was quick. It felt like shopping somewhere that actually curates what it sells.', 'dawp')],
    ['name' => __('Jordan T.', 'dawp'), 'location' => __('Denver, CO', 'dawp'), 'rating' => '5.0', 'copy' => __('Tracking updates were clear from the moment my order shipped. Everything arrived exactly as described, no surprises.', 'dawp')],
    ['name' => __('Priya S.', 'dawp'), 'location' => __('Seattle, WA', 'dawp'), 'rating' => '4.8', 'copy' => __('I was hunting for smart home gadgets that did not feel gimmicky. Crowdfused had exactly that balance of useful and well designed.', 'dawp')],
    ['name' => __('Marcus B.', 'dawp'), 'location' => __('Raleigh, NC', 'dawp'), 'rating' => '5.0', 'copy' => __('Support answered my question about a return within a day and made the whole process painless.', 'dawp')],
    ['name' => __('Elena R.', 'dawp'), 'location' => __('Phoenix, AZ', 'dawp'), 'rating' => '4.9', 'copy' => __('Our patio finally feels finished. The product pages made it easy to know what I was getting before I bought it.', 'dawp')],
];
?>

<style>
    .cf-home { --cf-orange:#F58220; --cf-orange-dark:#E96F00; --cf-white:#FFFFFF; --cf-charcoal:#222222; --cf-text:#666666; --cf-light:#8A8A8A; --cf-bg:#FAFAFA; --cf-border:#E9ECEF; --cf-red:#E64A3B; --cf-green:#43A047; --cf-font-heading:'Manrope', 'Inter', Arial, sans-serif; --cf-font-body:'Inter', Arial, sans-serif; --cf-radius:16px; }
    .cf-home { background:var(--cf-white); color:var(--cf-text); font-family:var(--cf-font-body); letter-spacing:0; }
    .cf-home * { box-sizing:border-box; }
    .cf-home p { margin:0; }
    .cf-home h1, .cf-home h2, .cf-home h3 { margin:0; color:var(--cf-charcoal); font-family:var(--cf-font-heading); font-weight:800; letter-spacing:-0.01em; line-height:1.15; }
    .cf-container { width:min(100% - 40px, 1280px); margin-inline:auto; }
    .cf-eyebrow { margin:0 0 10px; color:var(--cf-orange); font-size:.78rem; font-weight:800; letter-spacing:.1em; text-transform:uppercase; }
    .cf-btn { display:inline-flex; align-items:center; justify-content:center; gap:8px; min-height:48px; border-radius:999px; padding:0 26px; font-size:.92rem; font-weight:700; text-decoration:none; transition:background 220ms ease, color 220ms ease, border-color 220ms ease, transform 220ms ease, box-shadow 220ms ease; }
    .cf-btn--primary { background:var(--cf-orange); color:var(--cf-white); border:1px solid var(--cf-orange); }
    .cf-btn--primary:hover { background:var(--cf-orange-dark); border-color:var(--cf-orange-dark); transform:translateY(-1px); box-shadow:0 12px 26px rgba(245,130,32,.28); }
    .cf-btn--secondary { background:transparent; color:var(--cf-orange); border:1px solid var(--cf-orange); }
    .cf-btn--secondary:hover { background:var(--cf-orange); color:var(--cf-white); transform:translateY(-1px); }
    .cf-link { color:var(--cf-charcoal); font-weight:700; text-decoration:none; border-bottom:2px solid var(--cf-orange); padding-bottom:2px; }
    .cf-link:hover { color:var(--cf-orange); }
    .cf-section { padding:64px 0; }
    .cf-section--soft { background:var(--cf-bg); }
    .cf-section__head { display:flex; align-items:end; justify-content:space-between; gap:20px; margin-bottom:32px; }
    .cf-section__head h2 { font-size:clamp(1.6rem, 2.6vw, 2.35rem); }
    .cf-section__head p:not(.cf-eyebrow) { max-width:560px; margin-top:10px; font-size:.96rem; line-height:1.65; }

    /* Hero */
    .cf-hero { background:var(--cf-bg); border-bottom:1px solid var(--cf-border); padding:40px 0 52px; }
    .cf-hero__grid { display:grid; gap:32px; align-items:center; }
    .cf-hero__content { max-width:560px; }
    .cf-hero h1 { font-size:clamp(2rem, 4.4vw, 3.1rem); }
    .cf-hero__copy { margin-top:18px; font-size:clamp(1rem, 1.6vw, 1.1rem); line-height:1.7; color:var(--cf-text); }
    .cf-hero__actions { display:flex; flex-wrap:wrap; gap:12px; margin-top:28px; }
    .cf-hero__proof { display:flex; flex-wrap:wrap; gap:16px 22px; margin-top:26px; }
    .cf-hero__proof span { display:inline-flex; align-items:center; gap:8px; color:var(--cf-charcoal); font-size:.84rem; font-weight:700; }
    .cf-hero__proof svg { flex:none; color:var(--cf-green); }
    .cf-hero__media { position:relative; overflow:hidden; border-radius:var(--cf-radius); box-shadow:0 24px 48px rgba(34,34,34,.14); }
    .cf-hero__media img { width:100%; height:100%; min-height:320px; object-fit:cover; display:block; }

    /* Category grid */
    .cf-category-grid { display:grid; gap:18px; }
    .cf-category { position:relative; display:flex; flex-direction:column; min-height:100%; border-radius:var(--cf-radius); overflow:hidden; background:var(--cf-white); border:1px solid var(--cf-border); color:inherit; text-decoration:none; transition:transform 260ms ease, box-shadow 260ms ease; }
    .cf-category:hover { transform:translateY(-4px); box-shadow:0 20px 40px rgba(34,34,34,.12); }
    .cf-category__media { overflow:hidden; }
    .cf-category__media img { width:100%; aspect-ratio:4/3; object-fit:cover; transition:transform 320ms ease; }
    .cf-category:hover .cf-category__media img { transform:scale(1.05); }
    .cf-category__body { padding:20px; }
    .cf-category__body h3 { font-size:1.05rem; }
    .cf-category__body p { margin-top:8px; font-size:.88rem; line-height:1.6; color:var(--cf-text); }
    .cf-category__count { display:inline-block; margin-top:12px; color:var(--cf-orange); font-size:.82rem; font-weight:800; }

    /* Featured collections */
    .cf-collection-grid { display:grid; gap:18px; }
    .cf-collection { display:flex; flex-direction:column; border-radius:var(--cf-radius); overflow:hidden; background:var(--cf-white); border:1px solid var(--cf-border); color:inherit; text-decoration:none; transition:transform 260ms ease, box-shadow 260ms ease; }
    .cf-collection:hover { transform:translateY(-4px); box-shadow:0 20px 40px rgba(34,34,34,.12); }
    .cf-collection__media { position:relative; aspect-ratio:16/10; overflow:hidden; background:var(--cf-bg); }
    .cf-collection__media img { width:100%; height:100%; object-fit:cover; display:block; transition:transform 320ms ease; }
    .cf-collection:hover .cf-collection__media img { transform:scale(1.05); }
    .cf-collection__media--icon { display:flex; align-items:center; justify-content:center; background:linear-gradient(135deg, var(--cf-orange) 0%, var(--cf-orange-dark) 100%); }
    .cf-collection__media--icon svg { width:56px; height:56px; fill:none; stroke:var(--cf-white); stroke-width:1.6; stroke-linecap:round; stroke-linejoin:round; opacity:.94; }
    .cf-collection__body { padding:24px; }
    .cf-collection__label { color:var(--cf-orange); font-size:.76rem; font-weight:800; letter-spacing:.08em; text-transform:uppercase; }
    .cf-collection__body h3 { margin-top:6px; font-size:1.2rem; }
    .cf-collection__body p { margin-top:8px; font-size:.9rem; line-height:1.6; color:var(--cf-text); }
    .cf-collection__cta { display:inline-flex; align-items:center; gap:6px; margin-top:16px; color:var(--cf-charcoal); font-size:.86rem; font-weight:800; }
    .cf-collection__cta svg { transition:transform 220ms ease; }
    .cf-collection:hover .cf-collection__cta { color:var(--cf-orange); }
    .cf-collection:hover .cf-collection__cta svg { transform:translateX(3px); }

    /* Product grid + card */
    .cf-product-grid { display:grid; gap:18px; }
    .cf-product { display:flex; flex-direction:column; border-radius:var(--cf-radius); overflow:hidden; background:var(--cf-white); border:1px solid var(--cf-border); transition:transform 260ms ease, box-shadow 260ms ease; }
    .cf-product:hover { transform:translateY(-4px); box-shadow:0 20px 40px rgba(34,34,34,.12); }
    .cf-product__media { position:relative; display:block; background:var(--cf-bg); overflow:hidden; }
    .cf-product__media img { width:100%; aspect-ratio:1; object-fit:contain; padding:18px; transition:transform 260ms ease; }
    .cf-product:hover .cf-product__media img { transform:scale(1.05); }
    .cf-product__flag { position:absolute; top:12px; left:12px; background:var(--cf-white); border:1px solid var(--cf-border); border-radius:999px; padding:5px 10px; color:var(--cf-charcoal); font-size:.68rem; font-weight:800; }
    .cf-product__body { display:flex; flex:1; flex-direction:column; padding:16px; border-top:1px solid var(--cf-border); }
    .cf-product__title { font-size:.98rem; font-weight:700; line-height:1.35; min-height:2.6em; }
    .cf-product__title a { color:var(--cf-charcoal); text-decoration:none; }
    .cf-product__title a:hover { color:var(--cf-orange); }
    .cf-product__benefit { margin-top:6px; font-size:.84rem; line-height:1.55; color:var(--cf-text); display:-webkit-box; -webkit-box-orient:vertical; -webkit-line-clamp:2; overflow:hidden; }
    .cf-rating { display:inline-flex; align-items:center; gap:6px; margin-top:10px; font-size:.8rem; font-weight:700; color:var(--cf-light); }
    .cf-rating--empty { color:var(--cf-light); font-weight:600; }
    .cf-rating__stars { position:relative; display:inline-block; font-size:.86rem; letter-spacing:1px; color:var(--cf-border); }
    .cf-rating__stars::before { content:"\2605\2605\2605\2605\2605"; }
    .cf-rating__stars::after { content:"\2605\2605\2605\2605\2605"; position:absolute; inset:0; overflow:hidden; width:calc(var(--cf-rating) / 5 * 100%); color:var(--cf-orange); }
    .cf-product__foot { display:flex; align-items:center; justify-content:space-between; gap:10px; margin-top:auto; padding-top:14px; }
    .cf-product__price { font-family:var(--cf-font-heading); font-size:1.05rem; font-weight:800; color:var(--cf-charcoal); }
    .cf-product__price del { font-size:.82rem; font-weight:500; color:var(--cf-light); margin-right:4px; }
    .cf-product__price ins { text-decoration:none; }
    .cf-product__cta { color:var(--cf-orange); font-size:.82rem; font-weight:800; text-decoration:none; white-space:nowrap; }
    .cf-product__cta:hover { color:var(--cf-orange-dark); text-decoration:underline; text-underline-offset:3px; }
    .cf-empty-note { padding:28px; text-align:center; border:1px dashed var(--cf-border); border-radius:var(--cf-radius); color:var(--cf-light); font-size:.92rem; }

    /* Problem -> Solution */
    .cf-solution { display:grid; gap:36px; align-items:center; }
    .cf-solution__media { position:relative; border-radius:var(--cf-radius); overflow:hidden; box-shadow:0 24px 48px rgba(34,34,34,.12); }
    .cf-solution__media img { width:100%; height:100%; min-height:320px; object-fit:cover; display:block; }
    .cf-solution__badge { position:absolute; left:16px; bottom:16px; right:16px; display:flex; align-items:center; gap:12px; padding:14px 16px; border-radius:14px; background:rgba(255,255,255,.96); box-shadow:0 16px 32px rgba(34,34,34,.18); backdrop-filter:blur(6px); }
    .cf-solution__badge-icon { display:inline-flex; align-items:center; justify-content:center; flex:none; width:38px; height:38px; border-radius:999px; background:var(--cf-orange); color:var(--cf-white); }
    .cf-solution__badge-icon svg { width:18px; height:18px; fill:none; stroke:currentColor; stroke-width:2; stroke-linecap:round; stroke-linejoin:round; }
    .cf-solution__badge-text { display:flex; flex-direction:column; gap:2px; min-width:0; }
    .cf-solution__badge-text strong { font-family:var(--cf-font-heading); font-size:.9rem; font-weight:800; color:var(--cf-charcoal); line-height:1.3; }
    .cf-solution__badge-text span { font-size:.78rem; color:var(--cf-text); line-height:1.3; }
    .cf-solution__intro { margin-top:14px; max-width:480px; font-size:.96rem; line-height:1.65; color:var(--cf-text); }
    .cf-solution__list { display:grid; gap:14px; margin-top:26px; }
    .cf-solution__item { display:flex; align-items:flex-start; gap:16px; border:1px solid var(--cf-border); border-radius:var(--cf-radius); padding:18px 20px; background:var(--cf-white); transition:border-color 220ms ease, box-shadow 220ms ease, transform 220ms ease; }
    .cf-solution__item:hover { border-color:rgba(245,130,32,.45); box-shadow:0 16px 32px rgba(34,34,34,.1); transform:translateY(-2px); }
    .cf-solution__icon { display:inline-flex; align-items:center; justify-content:center; flex:none; width:44px; height:44px; margin-top:1px; border-radius:999px; background:var(--cf-bg); color:var(--cf-orange); }
    .cf-solution__icon svg { width:20px; height:20px; fill:none; stroke:currentColor; stroke-width:1.8; stroke-linecap:round; stroke-linejoin:round; }
    .cf-solution__text { margin:6px 0 0; font-size:.96rem; line-height:1.6; }
    .cf-solution__problem { color:var(--cf-text); text-decoration:line-through; text-decoration-color:var(--cf-light); text-decoration-thickness:1.5px; text-underline-offset:2px; }
    .cf-solution__sep { display:inline-block; margin:0 8px; color:var(--cf-orange); font-weight:700; }
    .cf-solution__answer { font-family:var(--cf-font-heading); font-weight:700; color:var(--cf-charcoal); }

    /* Why Shop / Crowdfused */
    .cf-whyshop__head { max-width:720px; margin:0 auto 36px; text-align:center; }
    .cf-whyshop__head h2 { font-size:clamp(1.5rem, 3vw, 2.15rem); text-transform:uppercase; letter-spacing:.02em; }
    .cf-whyshop__head h2 span { color:var(--cf-orange); }
    .cf-whyshop__head p { margin-top:14px; font-size:.96rem; line-height:1.7; color:var(--cf-text); }
    .cf-whyshop-grid { display:grid; gap:18px; }
    .cf-whyshop-card { border:1px solid var(--cf-border); border-radius:12px; padding:28px 22px; background:var(--cf-white); text-align:center; }
    .cf-whyshop-card__icon { display:inline-flex; align-items:center; justify-content:center; width:44px; height:44px; margin-bottom:16px; border-radius:999px; background:var(--cf-bg); color:var(--cf-orange); }
    .cf-whyshop-card__icon svg { width:22px; height:22px; }
    .cf-whyshop-card h3 { font-size:1rem; }
    .cf-whyshop-card p { margin-top:8px; font-size:.86rem; line-height:1.6; color:var(--cf-text); }

    /* Lifestyle story */
    .cf-story { position:relative; overflow:hidden; border-radius:var(--cf-radius); min-height:420px; display:flex; align-items:flex-end; }
    .cf-story img { position:absolute; inset:0; width:100%; height:100%; object-fit:cover; z-index:0; }
    .cf-story::after { content:""; position:absolute; inset:0; background:linear-gradient(90deg, rgba(15,15,15,.82) 0%, rgba(15,15,15,.55) 32%, rgba(15,15,15,.15) 62%, rgba(15,15,15,0) 80%), linear-gradient(0deg, rgba(15,15,15,.55), rgba(15,15,15,0) 65%); z-index:1; }
    .cf-story__content { position:relative; z-index:2; padding:36px; max-width:560px; color:var(--cf-white); }
    .cf-story__content h2 { color:var(--cf-white); font-size:clamp(1.6rem, 3vw, 2.35rem); }
    .cf-story__content p { margin-top:14px; color:rgba(255,255,255,.86); font-size:1rem; line-height:1.65; }
    .cf-story__content .cf-btn { margin-top:22px; }

    /* Reviews (always a slider, including desktop) */
    .cf-review-grid { display:flex; gap:16px; overflow-x:auto; overscroll-behavior-x:contain; scroll-snap-type:x mandatory; scrollbar-width:none; padding-bottom:6px; }
    .cf-review-grid::-webkit-scrollbar { display:none; }
    .cf-review { flex:0 0 clamp(16rem, 82vw, 20rem); max-width:clamp(16rem, 82vw, 20rem); scroll-snap-align:start; border:1px solid var(--cf-border); border-radius:var(--cf-radius); padding:22px; background:var(--cf-white); }
    .cf-slider-nav { display:flex; gap:10px; flex:none; }
    .cf-slider-nav__btn { display:inline-flex; align-items:center; justify-content:center; width:40px; height:40px; border-radius:999px; border:1px solid var(--cf-border); background:var(--cf-white); color:var(--cf-charcoal); cursor:pointer; transition:border-color 200ms ease, color 200ms ease, transform 200ms ease; }
    .cf-slider-nav__btn:hover { border-color:var(--cf-orange); color:var(--cf-orange); }
    .cf-slider-nav__btn:disabled { opacity:.4; cursor:default; border-color:var(--cf-border); color:var(--cf-charcoal); }
    .cf-slider-nav__btn svg { width:18px; height:18px; }
    .cf-review__head { display:flex; align-items:center; gap:12px; }
    .cf-review__avatar { display:inline-flex; align-items:center; justify-content:center; width:40px; height:40px; border-radius:999px; background:var(--cf-bg); color:var(--cf-orange); font-family:var(--cf-font-heading); font-weight:800; font-size:.9rem; flex:none; }
    .cf-review__name { font-weight:800; color:var(--cf-charcoal); font-size:.92rem; }
    .cf-review__location { display:block; margin-top:2px; color:var(--cf-light); font-size:.78rem; }
    .cf-review p.cf-review__copy { margin-top:14px; font-size:.9rem; line-height:1.65; color:var(--cf-text); }

    /* Newsletter */
    .cf-newsletter { background:var(--cf-charcoal); padding:52px 0; }
    .cf-newsletter__inner { display:grid; gap:24px; align-items:center; }
    .cf-newsletter h2 { color:var(--cf-white); font-size:clamp(1.5rem, 2.6vw, 2.1rem); }
    .cf-newsletter p:not(.cf-eyebrow) { margin-top:10px; color:rgba(255,255,255,.72); font-size:.94rem; line-height:1.6; max-width:480px; }
    .cf-newsletter__form { display:flex; flex-wrap:wrap; gap:10px; }
    .cf-newsletter__form input { flex:1 1 240px; min-height:50px; border-radius:999px; border:1px solid rgba(255,255,255,.24); background:rgba(255,255,255,.06); padding:0 20px; color:var(--cf-white); font-size:.92rem; }
    .cf-newsletter__form input::placeholder { color:rgba(255,255,255,.5); }
    .cf-newsletter__form input:focus { outline:2px solid var(--cf-orange); outline-offset:2px; }
    .cf-newsletter__form button { border:0; cursor:pointer; }

    /* Slider (mobile) */
    @media (max-width:759px) {
        .cf-category-grid, .cf-product-grid, .cf-whyshop-grid { display:flex; gap:14px; margin-inline:-20px; overflow-x:auto; overscroll-behavior-x:contain; padding-inline:20px; padding-bottom:6px; scroll-snap-type:x mandatory; scrollbar-width:none; }
        .cf-category-grid::-webkit-scrollbar, .cf-product-grid::-webkit-scrollbar, .cf-whyshop-grid::-webkit-scrollbar { display:none; }
        .cf-review-grid { margin-inline:-20px; padding-inline:20px; }
        .cf-category, .cf-product { flex:0 0 clamp(15.5rem, 70vw, 17.5rem); max-width:clamp(15.5rem, 70vw, 17.5rem); scroll-snap-align:start; }
        .cf-whyshop-card { flex:0 0 clamp(16rem, 82vw, 20rem); max-width:clamp(16rem, 82vw, 20rem); scroll-snap-align:start; }
        .cf-section__head { flex-direction:column; align-items:start; }
        .cf-solution__media { min-height:220px; }
        .cf-solution__media img { min-height:220px; }
        .cf-solution__badge { left:12px; right:12px; bottom:12px; padding:12px 14px; }
        .cf-solution__item { padding:16px; }
    }

    @media (min-width:640px) { .cf-newsletter__form { flex-wrap:nowrap; } }

    @media (min-width:760px) {
        .cf-hero__grid { grid-template-columns:0.92fr 1.08fr; min-height:480px; }
        .cf-hero__media { min-height:420px; }
        .cf-hero__media img { min-height:420px; }
        .cf-category-grid { grid-template-columns:repeat(3, minmax(0,1fr)); }
        .cf-collection-grid { grid-template-columns:repeat(2, minmax(0,1fr)); }
        .cf-product-grid { grid-template-columns:repeat(3, minmax(0,1fr)); }
        .cf-solution { grid-template-columns:0.9fr 1.1fr; }
        .cf-whyshop-grid { grid-template-columns:repeat(2, minmax(0,1fr)); }
        .cf-review { flex-basis:calc(50% - 8px); max-width:calc(50% - 8px); }
        .cf-newsletter__inner { grid-template-columns:1fr auto; }
    }

    @media (min-width:1024px) {
        .cf-section { padding:96px 0; }
        .cf-product-grid { grid-template-columns:repeat(4, minmax(0,1fr)); }
        .cf-whyshop-grid { grid-template-columns:repeat(4, minmax(0,1fr)); }
        .cf-review { flex-basis:calc(33.333% - 11px); max-width:calc(33.333% - 11px); }
    }
</style>

<div class="cf-home">

    <section class="cf-hero" id="hero" aria-labelledby="cf-hero-title">
        <div class="cf-container cf-hero__grid">
            <div class="cf-hero__content">
                <p class="cf-eyebrow"><?php esc_html_e('Innovation Made Everyday', 'dawp'); ?></p>
                <h1 id="cf-hero-title"><?php esc_html_e('Innovation That Fits Into Everyday Life', 'dawp'); ?></h1>
                <p class="cf-hero__copy"><?php esc_html_e('Discover thoughtfully selected products designed to simplify routines, solve everyday challenges and enhance modern living.', 'dawp'); ?></p>
                <div class="cf-hero__actions">
                    <a class="cf-btn cf-btn--primary" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop Innovations', 'dawp'); ?></a>
                    <a class="cf-btn cf-btn--secondary" href="<?php echo esc_url(add_query_arg('orderby', 'popularity', $shop_url)); ?>"><?php esc_html_e('Explore Best Sellers', 'dawp'); ?></a>
                </div>
                <div class="cf-hero__proof">
                    <span><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"></path></svg><?php esc_html_e('Free Shipping on Eligible Orders', 'dawp'); ?></span>
                    <span><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"></path></svg><?php esc_html_e('30-Day Easy Returns', 'dawp'); ?></span>
                    <span><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"></path></svg><?php esc_html_e('Secure Checkout', 'dawp'); ?></span>
                </div>
            </div>
            <div class="cf-hero__media">
                <?php echo $cf_img('Innovation_Made_Everyday.jpeg', __('Innovation that fits into everyday life, shown through modern products in a real home', 'dawp'), 'New_homepage', '', 980, 760, 'eager', '(min-width: 760px) 54vw, 100vw'); ?>
            </div>
        </div>
    </section>

    <section class="cf-section" id="categories" aria-labelledby="cf-categories-title">
        <div class="cf-container">
            <div class="cf-section__head">
                <div>
                    <p class="cf-eyebrow"><?php esc_html_e('Shop By Lifestyle', 'dawp'); ?></p>
                    <h2 id="cf-categories-title"><?php esc_html_e('Explore By Lifestyle', 'dawp'); ?></h2>
                    <p><?php esc_html_e('Six ways Crowdfused fits into modern living, from the kitchen to the backyard.', 'dawp'); ?></p>
                </div>
                <a class="cf-link" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('View All', 'dawp'); ?></a>
            </div>
            <div class="cf-category-grid">
                <?php foreach ($cf_categories as $category) :
                    $link = $cf_category_link($category['slug']);
                    ?>
                    <a class="cf-category" href="<?php echo esc_url($link['url']); ?>">
                        <div class="cf-category__media">
                            <?php echo $cf_img($category['image'], $category['title'], $category['folder'] ?? 'gallery', '', 480, 360, 'lazy', '(max-width: 759px) 70vw, (max-width: 1023px) 33vw, 25vw'); ?>
                        </div>
                        <div class="cf-category__body">
                            <h3><?php echo esc_html($category['title']); ?></h3>
                            <p><?php echo esc_html($category['copy']); ?></p>
                            <?php if ($link['count'] > 0) : ?>
                                <span class="cf-category__count"><?php echo esc_html(sprintf(_n('%d product', '%d products', $link['count'], 'dawp'), $link['count'])); ?></span>
                            <?php endif; ?>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="cf-section" id="collections" aria-labelledby="cf-collections-title">
        <div class="cf-container">
            <div class="cf-section__head">
                <div>
                    <p class="cf-eyebrow"><?php esc_html_e('Featured Collections', 'dawp'); ?></p>
                    <h2 id="cf-collections-title"><?php esc_html_e('Curated Edits Worth Exploring', 'dawp'); ?></h2>
                    <p><?php esc_html_e('Spotlight collections built around the moments and spaces that matter most.', 'dawp'); ?></p>
                </div>
            </div>
            <div class="cf-collection-grid">
                <?php foreach ($cf_collections as $collection) :
                    $link = $cf_category_link($collection['slug']);
                    ?>
                    <a class="cf-collection" href="<?php echo esc_url($link['url']); ?>">
                        <div class="cf-collection__media<?php echo empty($collection['image']) ? ' cf-collection__media--icon' : ''; ?>">
                            <?php if (!empty($collection['image'])) : ?>
                                <?php echo $cf_img($collection['image'], $collection['title'], $collection['folder'] ?? 'gallery', '', 760, 480, 'lazy', '(max-width: 759px) 100vw, 50vw'); ?>
                            <?php else : ?>
                                <svg viewBox="0 0 24 24" aria-hidden="true"><?php echo $collection['icon']; ?></svg>
                            <?php endif; ?>
                        </div>
                        <div class="cf-collection__body">
                            <p class="cf-collection__label"><?php echo esc_html($collection['label']); ?></p>
                            <h3><?php echo esc_html($collection['title']); ?></h3>
                            <p><?php echo esc_html($collection['copy']); ?></p>
                            <span class="cf-collection__cta">
                                <?php echo esc_html($collection['cta']); ?>
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"></path></svg>
                            </span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="cf-section cf-section--soft" id="trending" aria-labelledby="cf-trending-title">
        <div class="cf-container">
            <div class="cf-section__head">
                <div>
                    <p class="cf-eyebrow"><?php esc_html_e('Just Landed', 'dawp'); ?></p>
                    <h2 id="cf-trending-title"><?php esc_html_e('Trending Right Now', 'dawp'); ?></h2>
                    <p><?php esc_html_e('The newest additions to our lineup, chosen for how well they solve everyday problems.', 'dawp'); ?></p>
                </div>
                <a class="cf-link" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('View All', 'dawp'); ?></a>
            </div>
            <?php if (!empty($cf_trending)) : ?>
                <div class="cf-product-grid">
                    <?php foreach ($cf_trending as $index => $product) : ?>
                        <?php echo $cf_product_card($product, 0 === $index); ?>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <p class="cf-empty-note"><?php esc_html_e('New innovations are on their way. Check back soon.', 'dawp'); ?></p>
            <?php endif; ?>
        </div>
    </section>

    <section class="cf-section" aria-labelledby="cf-why-it-matters-title">
        <div class="cf-container cf-solution">
            <div class="cf-solution__media">
                <?php echo $cf_img('Fresh_Utility_Spaces.jpeg', __('Organized, fresh home space designed to simplify daily routines', 'dawp'), 'home', '', 780, 620, 'lazy', '(max-width: 759px) 100vw, 44vw'); ?>
                <div class="cf-solution__badge">
                    <span class="cf-solution__badge-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24"><path d="M12 3v3.5M12 17.5V21M3 12h3.5M17.5 12H21"></path><circle cx="12" cy="12" r="5.2"></circle></svg>
                    </span>
                    <span class="cf-solution__badge-text">
                        <strong><?php esc_html_e('3 everyday problems', 'dawp'); ?></strong>
                        <span><?php esc_html_e('solved by thoughtful design', 'dawp'); ?></span>
                    </span>
                </div>
            </div>
            <div>
                <p class="cf-eyebrow"><?php esc_html_e('Why It Matters', 'dawp'); ?></p>
                <h2 id="cf-why-it-matters-title"><?php esc_html_e('Innovation solves real everyday problems.', 'dawp'); ?></h2>
                <p class="cf-solution__intro"><?php esc_html_e('Every product we carry starts with a frustration worth fixing. Here are a few that show up in daily life.', 'dawp'); ?></p>
                <div class="cf-solution__list">
                    <?php foreach ($cf_problem_solution as $item) : ?>
                        <div class="cf-solution__item">
                            <span class="cf-solution__icon" aria-hidden="true"><svg viewBox="0 0 24 24"><?php echo $item['icon']; ?></svg></span>
                            <p class="cf-solution__text">
                                <span class="cf-solution__problem"><?php echo esc_html($item['problem']); ?></span>
                                <span class="cf-solution__sep" aria-hidden="true">&rarr;</span>
                                <span class="cf-solution__answer"><?php echo esc_html($item['solution']); ?></span>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="cf-section cf-section--soft" id="our-story" aria-labelledby="cf-story-title">
        <div class="cf-container">
            <div class="cf-story">
                <?php echo $cf_img('Living_room_minimalist_design_ph…_202607281539.jpeg', __('Calm, minimalist living room reflecting effortless everyday design', 'dawp'), 'New_homepage', '', 1200, 700, 'lazy', '100vw'); ?>
                <div class="cf-story__content">
                    <p class="cf-eyebrow" style="color:#FFC98A;"><?php esc_html_e('Our Philosophy', 'dawp'); ?></p>
                    <h2 id="cf-story-title"><?php esc_html_e('Innovation Should Feel Effortless', 'dawp'); ?></h2>
                    <p><?php esc_html_e("Crowdfused believes the best products aren't the most complicated. They're the ones that quietly make everyday life easier, more enjoyable and more efficient.", 'dawp'); ?></p>
                    <a class="cf-btn cf-btn--primary" href="<?php echo esc_url($about_url); ?>"><?php esc_html_e('Discover Our Story', 'dawp'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="cf-section cf-section--soft cf-whyshop" id="why-shop" aria-labelledby="cf-whyshop-title">
        <div class="cf-container">
            <div class="cf-whyshop__head">
                <h2 id="cf-whyshop-title"><?php esc_html_e('Why Shop', 'dawp'); ?> / <span><?php esc_html_e('Crowdfused', 'dawp'); ?></span></h2>
                <p><?php esc_html_e('Thoughtfully chosen everyday innovations, shipped fast and backed by an easy 30-day return policy.', 'dawp'); ?></p>
            </div>
            <div class="cf-whyshop-grid">
                <?php foreach ($cf_why_shop as $item) : ?>
                    <div class="cf-whyshop-card">
                        <span class="cf-whyshop-card__icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><?php echo $item['icon']; ?></svg></span>
                        <h3><?php echo esc_html($item['title']); ?></h3>
                        <p><?php echo esc_html($item['copy']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="cf-section" id="reviews" aria-labelledby="cf-reviews-title">
        <div class="cf-container">
            <div class="cf-section__head">
                <div>
                    <p class="cf-eyebrow"><?php esc_html_e('Social Proof', 'dawp'); ?></p>
                    <h2 id="cf-reviews-title"><?php esc_html_e('Trusted By Thousands', 'dawp'); ?></h2>
                </div>
                <div class="cf-slider-nav" data-slider-nav="cf-review-track">
                    <button type="button" class="cf-slider-nav__btn" data-slider-prev aria-label="<?php esc_attr_e('Previous reviews', 'dawp'); ?>">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"></path></svg>
                    </button>
                    <button type="button" class="cf-slider-nav__btn" data-slider-next aria-label="<?php esc_attr_e('Next reviews', 'dawp'); ?>">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"></path></svg>
                    </button>
                </div>
            </div>
            <div class="cf-review-grid" id="cf-review-track">
                <?php foreach ($cf_testimonials as $review) :
                    $initials = '';
                    foreach (explode(' ', $review['name']) as $part) {
                        $initials .= mb_substr($part, 0, 1);
                    }
                    ?>
                    <div class="cf-review">
                        <div class="cf-review__head">
                            <span class="cf-review__avatar" aria-hidden="true"><?php echo esc_html($initials); ?></span>
                            <div>
                                <span class="cf-review__name"><?php echo esc_html($review['name']); ?></span>
                                <span class="cf-review__location"><?php echo esc_html($review['location']); ?></span>
                            </div>
                        </div>
                        <?php echo $cf_rating_html($review['rating'], 1); ?>
                        <p class="cf-review__copy">&ldquo;<?php echo esc_html($review['copy']); ?>&rdquo;</p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="cf-newsletter" id="newsletter" aria-labelledby="cf-newsletter-title">
        <div class="cf-container cf-newsletter__inner">
            <div>
                <p class="cf-eyebrow" style="color:#FFC98A;"><?php esc_html_e('Stay In The Loop', 'dawp'); ?></p>
                <h2 id="cf-newsletter-title"><?php esc_html_e('Stay Ahead of What&rsquo;s Next', 'dawp'); ?></h2>
                <p><?php esc_html_e('Receive updates on innovative products, exclusive launches and special offers.', 'dawp'); ?></p>
            </div>
            <form class="cf-newsletter__form" method="post" action="<?php echo esc_url(home_url('/')); ?>">
                <label class="screen-reader-text" for="cf-newsletter-email"><?php esc_html_e('Email address', 'dawp'); ?></label>
                <input id="cf-newsletter-email" type="email" name="email" required placeholder="<?php esc_attr_e('Enter your email address', 'dawp'); ?>">
                <button type="submit" class="cf-btn cf-btn--primary"><?php esc_html_e('Subscribe', 'dawp'); ?></button>
            </form>
        </div>
    </section>

</div>
