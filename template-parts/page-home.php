<?php
/**
 * Premium home page template part.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$theme_uri = get_template_directory_uri();
$theme_dir = get_template_directory();
$shop_url  = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$mmd_asset = static function ($file) use ($theme_uri, $theme_dir) {
    if (preg_match('#^https?://#i', $file)) {
        return $file;
    }

    $relative = 'assets/img/gallery/' . $file;
    $path     = $theme_dir . '/' . $relative;

    if (!file_exists($path)) {
        $relative = 'assets/img/home/' . $file;
        $path     = $theme_dir . '/' . $relative;
    }

    $url = $theme_uri . '/' . $relative;

    if (file_exists($path)) {
        return add_query_arg('ver', filemtime($path), $url);
    }

    return $url;
};

$mmd_cat_url = static function ($slug) {
    return function_exists('dawp_product_category_url')
        ? dawp_product_category_url($slug)
        : home_url('/product-category/' . trim($slug, '/') . '/');
};

$mmd_img = static function ($file, $alt, $class = '', $width = 900, $height = 700, $loading = 'lazy', $sizes = '') use ($mmd_asset) {
    $url = $mmd_asset($file);

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

$mmd_category_media = static function ($card) use ($mmd_img) {
    if (!empty($card['image'])) {
        echo $mmd_img($card['image'], $card['title'], '', 560, 420, 'lazy', '(max-width: 699px) 82vw, (max-width: 899px) 33vw, 25vw');
        return;
    }

    printf(
        '<span class="mmd-room-card__missing-image">%s<br><strong>%s</strong></span>',
        esc_html__('Add image in assets/img/gallery/', 'dawp'),
        esc_html($card['image_hint'])
    );
};

$mmd_product_card = static function ($product_id) {
    if (!function_exists('wc_get_product')) {
        return;
    }

    $product = wc_get_product($product_id);
    if (!$product || !$product->is_visible()) {
        return;
    }

    $terms      = get_the_terms($product_id, 'product_cat');
    $collection = __('Featured', 'dawp');
    if (!is_wp_error($terms) && !empty($terms)) {
        $collection = $terms[0]->name;
    }

    $rating = (float) $product->get_average_rating();
    $count  = (int) $product->get_rating_count();
    ?>
    <article class="mmd-product-card">
        <a class="mmd-product-card__media" href="<?php echo esc_url(get_permalink($product_id)); ?>">
            <?php
            echo function_exists('dawp_get_product_responsive_image')
                ? dawp_get_product_responsive_image($product, 'mmd-product-card__img', 420, 420, '(max-width: 699px) 82vw, (max-width: 899px) 50vw, 25vw')
                : $product->get_image('woocommerce_single', ['class' => 'mmd-product-card__img', 'loading' => 'lazy']);
            ?>
            <span><?php esc_html_e('Quick View', 'dawp'); ?></span>
        </a>
        <div class="mmd-product-card__body">
            <p><?php echo esc_html($collection); ?></p>
            <h3><a href="<?php echo esc_url(get_permalink($product_id)); ?>"><?php echo esc_html($product->get_name()); ?></a></h3>
            <?php if ($count > 0) : ?>
            <div class="mmd-product-card__rating" aria-label="<?php echo esc_attr(sprintf(__('Rated %s out of 5', 'dawp'), $rating)); ?>">
                <span aria-hidden="true"><?php echo esc_html(str_repeat('*', max(1, min(5, (int) round($rating))))); ?></span>
                <em><?php echo esc_html(sprintf(_n('%d review', '%d reviews', $count, 'dawp'), $count)); ?></em>
            </div>
            <?php endif; ?>
            <div class="mmd-product-card__price"><?php echo wp_kses_post($product->get_price_html()); ?></div>
            <a class="mmd-product-card__add" href="<?php echo esc_url($product->add_to_cart_url()); ?>" data-quantity="1" data-product_id="<?php echo esc_attr($product_id); ?>" rel="nofollow">
                <?php esc_html_e('Add to Cart', 'dawp'); ?>
            </a>
        </div>
    </article>
    <?php
};

$room_cards = [
    ['title' => __('Strength Training', 'dawp'), 'copy' => __('Dumbbells, kettlebells, resistance bands, weight plates and lifting accessories.', 'dawp'), 'image' => 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?auto=format&fit=crop&w=900&q=80', 'image_hint' => 'strength-training.jpg', 'slug' => 'strength-training'],
    ['title' => __('Cardio & Conditioning', 'dawp'), 'copy' => __('Jump ropes, exercise bikes, step platforms, agility equipment and rowing accessories.', 'dawp'), 'image' => 'https://images.unsplash.com/photo-1519505907962-0a6cb0167c73?auto=format&fit=crop&w=900&q=80', 'image_hint' => 'cardio-conditioning.jpg', 'slug' => 'cardio-conditioning'],
    ['title' => __('Yoga & Mobility', 'dawp'), 'copy' => __('Yoga mats, blocks, foam rollers, stretching straps and massage balls.', 'dawp'), 'image' => 'https://images.unsplash.com/photo-1601925260368-ae2f83cf8b7f?auto=format&fit=crop&w=900&q=80', 'image_hint' => 'yoga-mobility.jpg', 'slug' => 'yoga-mobility'],
    ['title' => __('Fitness Accessories', 'dawp'), 'copy' => __('Gym bags, water bottles, workout gloves, towels, fitness trackers and resistance accessories.', 'dawp'), 'image' => 'https://images.unsplash.com/photo-1591291621164-2c6367723315?auto=format&fit=crop&w=900&q=80', 'image_hint' => 'fitness-accessories.jpg', 'slug' => 'fitness-accessories'],
];

$collections = [
    ['title' => __('Home Gym Essentials', 'dawp'), 'copy' => __('Dumbbells, kettlebells and plates selected for building a serious home gym.', 'dawp'), 'image' => 'https://images.unsplash.com/photo-1596357395217-80de13130e92?auto=format&fit=crop&w=900&q=80', 'slug' => 'strength-training'],
    ['title' => __('Cardio Conditioning', 'dawp'), 'copy' => __('Bikes, ropes and step platforms built for consistent conditioning work.', 'dawp'), 'image' => 'https://images.unsplash.com/photo-1571902943202-507ec2618e8f?auto=format&fit=crop&w=900&q=80', 'slug' => 'cardio-conditioning'],
    ['title' => __('Recovery & Mobility', 'dawp'), 'copy' => __('Mats, rollers and straps to support mobility work and recovery days.', 'dawp'), 'image' => 'https://images.unsplash.com/photo-1518459031867-a89b944bffe4?auto=format&fit=crop&w=900&q=80', 'slug' => 'yoga-mobility'],
];

$seasonal = [
    ['title' => __('Strength Starter Kit', 'dawp'), 'image' => 'https://images.unsplash.com/photo-1601422407692-ec4eeec1d9b3?auto=format&fit=crop&w=760&q=80'],
    ['title' => __('Cardio Conditioning Edit', 'dawp'), 'image' => 'https://images.unsplash.com/photo-1534258936925-c58bed479fcb?auto=format&fit=crop&w=760&q=80'],
    ['title' => __('Mobility & Recovery Edit', 'dawp'), 'image' => 'https://images.unsplash.com/photo-1600881333168-2ef49b341f30?auto=format&fit=crop&w=760&q=80'],
    ['title' => __('Everyday Training Gear', 'dawp'), 'image' => 'https://images.unsplash.com/photo-1584464491033-06628f3a6b7b?auto=format&fit=crop&w=760&q=80'],
];

$best_sellers = [];
$new_arrivals = [];

if (function_exists('wc_get_products')) {
    $best_sellers = wc_get_products([
        'status'   => 'publish',
        'limit'    => 8,
        'orderby'  => 'popularity',
        'return'   => 'ids',
        'featured' => false,
    ]);

    $new_arrivals = wc_get_products([
        'status'  => 'publish',
        'limit'   => 8,
        'orderby' => 'date',
        'order'   => 'DESC',
        'return'  => 'ids',
    ]);
}
?>

<style>
    .mmd-home { --mmd-ink:#2B2B2B; --mmd-text:#4A4A4A; --mmd-ivory:#F3F4F1; --mmd-line:#E1E3DE; --mmd-accent:#E8442C; --mmd-accent-dark:#B8331F; --mmd-white:#FFFFFF; color:var(--mmd-text); background:var(--mmd-white); font-family:Inter, "Avenir Next", Arial, sans-serif; letter-spacing:0; }
    .mmd-home * { box-sizing:border-box; }
    .mmd-container { width:min(100% - 32px, 1280px); margin-inline:auto; }
    .mmd-eyebrow { margin:0 0 10px; color:var(--mmd-accent); font-size:.68rem; font-weight:700; letter-spacing:.12em; text-transform:uppercase; }
    .mmd-home h1, .mmd-home h2, .mmd-home h3 { margin:0; color:var(--mmd-ink); font-family:"Archivo", "Inter", Arial, sans-serif; font-weight:800; line-height:1.05; letter-spacing:0; }
    .mmd-home p { margin:0; }
    .mmd-btn { display:inline-flex; align-items:center; justify-content:center; min-height:44px; border:1px solid var(--mmd-ink); border-radius:2px; padding:0 22px; font-size:.78rem; font-weight:700; letter-spacing:.035em; text-decoration:none; text-transform:uppercase; transition:background .18s ease, color .18s ease, border-color .18s ease, transform .18s ease; }
    .mmd-btn:hover { transform:translateY(-1px); }
    .mmd-btn--primary { background:var(--mmd-ink); color:#fff; }
    .mmd-btn--primary:hover { background:var(--mmd-accent); border-color:var(--mmd-accent); color:#fff; }
    .mmd-btn--secondary { background:transparent; color:var(--mmd-ink); }
    .mmd-btn--secondary:hover { background:var(--mmd-ink); color:#fff; }
    .mmd-hero { background:var(--mmd-ivory); border-bottom:1px solid var(--mmd-line); }
    .mmd-hero__grid { display:grid; gap:28px; min-height:580px; padding:42px 0; }
    .mmd-hero__content { display:flex; flex-direction:column; justify-content:center; max-width:610px; }
    .mmd-hero h1 { font-size:clamp(2.35rem, 5.2vw, 4.35rem); line-height:1.08; }
    .mmd-hero__copy { max-width:560px; margin-top:18px; color:#554E49; font-size:clamp(.94rem, 1.2vw, 1.03rem); line-height:1.68; }
    .mmd-hero__actions { display:flex; flex-wrap:wrap; gap:12px; margin-top:30px; }
    .mmd-hero__media { min-height:360px; overflow:hidden; position:relative; }
    .mmd-hero__media img { width:100%; height:100%; min-height:360px; object-fit:cover; }
    .mmd-hero__note { position:absolute; right:18px; bottom:18px; max-width:260px; background:rgba(255,255,255,.94); border:1px solid var(--mmd-line); padding:16px; color:var(--mmd-ink); font-size:.84rem; line-height:1.5; }
    .mmd-section { padding:68px 0; }
    .mmd-section--soft { background:var(--mmd-ivory); }
    .mmd-section__head { display:flex; align-items:end; justify-content:space-between; gap:24px; margin-bottom:28px; }
    .mmd-section__head h2, .mmd-newsletter h2 { font-size:clamp(1.7rem, 2.8vw, 2.55rem); line-height:1.12; }
    .mmd-section__head p:not(.mmd-eyebrow) { max-width:590px; margin-top:10px; font-size:.95rem; line-height:1.62; }
    .mmd-text-link { color:var(--mmd-accent); font-weight:800; text-decoration:none; }
    .mmd-text-link:hover { color:var(--mmd-accent-dark); text-decoration:underline; text-underline-offset:4px; }
    .mmd-room-grid, .mmd-product-grid, .mmd-season-grid, .mmd-trust-grid, .mmd-gallery-grid { display:grid; gap:18px; }
    .mmd-room-grid { grid-template-columns:repeat(2, minmax(0, 1fr)); }
    .mmd-room-card, .mmd-collection-card, .mmd-product-card, .mmd-trust-card { background:#fff; border:1px solid var(--mmd-line); border-radius:4px; overflow:hidden; transition:border-color .18s ease, box-shadow .18s ease, transform .18s ease; }
    .mmd-room-card { color:inherit; display:flex; flex-direction:column; min-height:100%; text-decoration:none; }
    .mmd-room-card img { width:100%; aspect-ratio:4/3; object-fit:cover; transition:transform .35s ease; }
    .mmd-room-card__missing-image { aspect-ratio:4/3; display:flex; flex-direction:column; align-items:center; justify-content:center; background:#F5F6F8; color:#6B7280; padding:18px; text-align:center; font-size:.84rem; line-height:1.45; }
    .mmd-room-card__missing-image strong { margin-top:6px; color:var(--mmd-ink); font-size:.9rem; word-break:break-word; }
    .mmd-room-card__body { display:flex; flex:1; flex-direction:column; padding:18px; }
    .mmd-room-card h3 { font-size:1.28rem; line-height:1.14; }
    .mmd-room-card p { margin-top:9px; font-size:.92rem; line-height:1.56; }
    .mmd-room-card__cta { margin-top:auto; padding-top:16px; color:var(--mmd-accent); font-size:.76rem; font-weight:800; letter-spacing:.05em; text-transform:uppercase; }
    .mmd-room-card:hover, .mmd-product-card:hover { border-color:#EDB3A6; box-shadow:0 18px 34px rgba(43,43,43,.09); transform:translateY(-3px); }
    .mmd-room-card:hover img, .mmd-collection-card:hover img { transform:scale(1.04); }
    .mmd-collection-grid { display:grid; gap:18px; }
    .mmd-collection-card { display:grid; min-height:330px; color:#fff; text-decoration:none; }
    .mmd-collection-card img, .mmd-collection-card__content { grid-area:1/1; }
    .mmd-collection-card img { width:100%; height:100%; object-fit:cover; transition:transform .35s ease; }
    .mmd-collection-card:after { content:""; grid-area:1/1; background:linear-gradient(180deg, rgba(0,0,0,.03), rgba(43,43,43,.58)); z-index:1; }
    .mmd-collection-card__content { align-self:end; display:grid; gap:8px; padding:26px; position:relative; z-index:2; }
    .mmd-collection-card h3 { color:#fff; font-size:1.5rem; line-height:1.14; }
    .mmd-collection-card p { max-width:430px; color:rgba(255,255,255,.9); font-size:.92rem; line-height:1.56; }
    .mmd-story { display:grid; gap:30px; align-items:center; }
    .mmd-story__media { display:grid; grid-template-columns:1fr .74fr; gap:14px; align-items:end; }
    .mmd-story__media img { width:100%; object-fit:cover; }
    .mmd-story__media img:first-child { aspect-ratio:4/5; }
    .mmd-story__media img:last-child { aspect-ratio:4/3; margin-bottom:34px; }
    .mmd-story__content h2 { font-size:clamp(1.75rem, 3vw, 2.65rem); line-height:1.12; }
    .mmd-story__content p { margin-top:16px; line-height:1.68; font-size:.96rem; }
    .mmd-story__content .mmd-btn { margin-top:28px; }
    .mmd-product-grid { grid-template-columns:repeat(2, minmax(0, 1fr)); }
    .mmd-product-card { display:flex; flex-direction:column; }
    .mmd-product-card__media { display:block; position:relative; overflow:hidden; background:#F6F3EE; text-decoration:none; }
    .mmd-product-card__img { width:100%; aspect-ratio:1; object-fit:contain; padding:18px; transition:transform .25s ease; }
    .mmd-product-card__media span { position:absolute; inset:auto 12px 12px; display:flex; align-items:center; justify-content:center; min-height:38px; background:rgba(255,255,255,.94); color:var(--mmd-ink); font-size:.78rem; font-weight:800; letter-spacing:.05em; text-transform:uppercase; opacity:0; transform:translateY(8px); transition:opacity .2s ease, transform .2s ease; }
    .mmd-product-card:hover .mmd-product-card__img { transform:scale(1.035); }
    .mmd-product-card:hover .mmd-product-card__media span { opacity:1; transform:translateY(0); }
    .mmd-product-card__body { display:flex; flex:1; flex-direction:column; padding:16px; }
    .mmd-product-card__body p { color:var(--mmd-accent); font-size:.75rem; font-weight:800; letter-spacing:.08em; text-transform:uppercase; }
    .mmd-product-card h3 { margin-top:7px; min-height:2.5em; font-family:Inter, Arial, sans-serif; font-size:.92rem; font-weight:700; line-height:1.34; }
    .mmd-product-card h3 a { color:inherit; text-decoration:none; }
    .mmd-product-card__rating { display:flex; flex-wrap:wrap; gap:7px; margin-top:10px; color:#B98235; font-size:.8rem; font-style:normal; }
    .mmd-product-card__rating em { color:#77706A; font-style:normal; }
    .mmd-product-card__price { margin-top:8px; color:var(--mmd-ink); font-weight:800; }
    .mmd-product-card__add { display:flex; align-items:center; justify-content:center; min-height:42px; margin-top:auto; border:1px solid var(--mmd-ink); color:var(--mmd-ink); font-size:.78rem; font-weight:800; letter-spacing:.05em; text-decoration:none; text-transform:uppercase; }
    .mmd-product-card__add:hover { background:var(--mmd-ink); color:#fff; }
    .mmd-empty-products { grid-column:1/-1; border:1px solid var(--mmd-line); background:#fff; padding:28px; text-align:center; }
    .mmd-season-grid { grid-template-columns:1fr; }
    .mmd-season-card { display:grid; min-height:240px; overflow:hidden; color:#fff; text-decoration:none; }
    .mmd-season-card img, .mmd-season-card span { grid-area:1/1; }
    .mmd-season-card img { width:100%; height:100%; object-fit:cover; }
    .mmd-season-card:after { content:""; grid-area:1/1; background:linear-gradient(180deg, rgba(0,0,0,0), rgba(43,43,43,.55)); z-index:1; }
    .mmd-season-card span { align-self:end; padding:20px; position:relative; z-index:2; font-family:"Archivo", "Inter", Arial, sans-serif; font-weight:800; font-size:1.25rem; line-height:1.12; }
    .mmd-trust-grid { grid-template-columns:repeat(2, minmax(0, 1fr)); }
    .mmd-trust-card { padding:22px; }
    .mmd-trust-card svg { width:30px; height:30px; margin-bottom:14px; color:var(--mmd-accent); fill:none; stroke:currentColor; stroke-width:1.8; stroke-linecap:round; stroke-linejoin:round; }
    .mmd-trust-card h3 { font-family:Inter, Arial, sans-serif; font-size:.92rem; font-weight:800; }
    .mmd-trust-card p { margin-top:8px; font-size:.9rem; line-height:1.56; }
    .mmd-gallery-grid { grid-template-columns:repeat(2, minmax(0, 1fr)); }
    .mmd-gallery-grid img { width:100%; aspect-ratio:1; object-fit:cover; }
    .mmd-newsletter { padding:62px 0; background:var(--mmd-ink); color:#fff; }
    .mmd-newsletter h2 { color:#fff; }
    .mmd-newsletter__inner { display:grid; gap:24px; align-items:center; }
    .mmd-newsletter p:not(.mmd-eyebrow) { max-width:560px; margin-top:10px; color:rgba(255,255,255,.76); font-size:.95rem; line-height:1.62; }
    .mmd-newsletter form { display:grid; gap:10px; width:100%; max-width:540px; }
    .mmd-newsletter input { min-height:48px; border:1px solid rgba(255,255,255,.28); background:#fff; padding:0 14px; color:var(--mmd-ink); }
    .mmd-newsletter button { min-height:48px; border:1px solid var(--mmd-accent); background:var(--mmd-accent); color:#fff; cursor:pointer; font-weight:800; letter-spacing:.05em; text-transform:uppercase; }
    @media (min-width:700px) { .mmd-room-grid { grid-template-columns:repeat(3, minmax(0, 1fr)); } .mmd-collection-grid { grid-template-columns:repeat(3, minmax(0, 1fr)); } .mmd-season-grid { grid-template-columns:repeat(4, minmax(0, 1fr)); } .mmd-gallery-grid { grid-template-columns:repeat(4, minmax(0, 1fr)); } .mmd-newsletter form { grid-template-columns:1fr auto; justify-self:end; } }
    @media (min-width:900px) { .mmd-hero__grid { grid-template-columns:.94fr 1.06fr; } .mmd-story { grid-template-columns:1.06fr .94fr; } .mmd-product-grid { grid-template-columns:repeat(4, minmax(0, 1fr)); } .mmd-trust-grid { grid-template-columns:repeat(5, minmax(0, 1fr)); } .mmd-newsletter__inner { grid-template-columns:1fr minmax(380px, 540px); } }
    @media (max-width:699px) { .mmd-section { padding:50px 0; } .mmd-section__head { align-items:start; flex-direction:column; } .mmd-room-grid, .mmd-product-grid, .mmd-season-grid, .mmd-trust-grid { display:flex; gap:14px; margin-inline:-16px; overflow-x:auto; padding-inline:16px; padding-bottom:4px; scroll-snap-type:x mandatory; scrollbar-width:none; } .mmd-room-grid::-webkit-scrollbar, .mmd-product-grid::-webkit-scrollbar, .mmd-season-grid::-webkit-scrollbar, .mmd-trust-grid::-webkit-scrollbar { display:none; } .mmd-room-card, .mmd-product-card, .mmd-season-card, .mmd-trust-card { flex:0 0 clamp(17rem, 82vw, 21rem); max-width:clamp(17rem, 82vw, 21rem); scroll-snap-align:start; } .mmd-gallery-grid { gap:10px; } .mmd-hero__note { left:14px; right:14px; } }
</style>

<div class="mmd-home">
    <section class="mmd-hero" aria-labelledby="mmd-hero-title">
        <div class="mmd-container mmd-hero__grid">
            <div class="mmd-hero__content">
                <p class="mmd-eyebrow"><?php esc_html_e('DTI Fitness Training Gear', 'dawp'); ?></p>
                <h1 id="mmd-hero-title"><?php esc_html_e('Train With Purpose', 'dawp'); ?></h1>
                <p class="mmd-hero__copy"><?php esc_html_e('Shop strength training, cardio & conditioning, yoga & mobility and everyday fitness accessories built to keep up with real workouts, at home or in the gym.', 'dawp'); ?></p>
                <div class="mmd-hero__actions">
                    <a class="mmd-btn mmd-btn--primary" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop Collection', 'dawp'); ?></a>
                    <a class="mmd-btn mmd-btn--secondary" href="#new-arrivals"><?php esc_html_e('Explore New Arrivals', 'dawp'); ?></a>
                </div>
            </div>
            <div class="mmd-hero__media">
                <?php echo $mmd_img('https://images.unsplash.com/photo-1596357395217-80de13130e92?auto=format&fit=crop&w=1200&q=82', __('Bright modern gym with a squat rack and free weights', 'dawp'), '', 980, 760, 'eager', '(min-width: 900px) 50vw, 100vw'); ?>
                <div class="mmd-hero__note"><?php esc_html_e('Training equipment chosen for real use, durable builds and reliable value.', 'dawp'); ?></div>
            </div>
        </div>
    </section>

    <section class="mmd-section" aria-labelledby="mmd-room-title">
        <div class="mmd-container">
            <div class="mmd-section__head">
                <div>
                    <p class="mmd-eyebrow"><?php esc_html_e('Shop By Category', 'dawp'); ?></p>
                    <h2 id="mmd-room-title"><?php esc_html_e('Browse the training categories you need most.', 'dawp'); ?></h2>
                    <p><?php esc_html_e('Shop strength, cardio, mobility and everyday accessories organized around how you actually train.', 'dawp'); ?></p>
                </div>
                <a class="mmd-text-link" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop all categories', 'dawp'); ?></a>
            </div>
            <div class="mmd-room-grid">
                <?php foreach ($room_cards as $card) : ?>
                    <a class="mmd-room-card" href="<?php echo esc_url($mmd_cat_url($card['slug'])); ?>">
                        <?php $mmd_category_media($card); ?>
                        <span class="mmd-room-card__body">
                            <h3><?php echo esc_html($card['title']); ?></h3>
                            <p><?php echo esc_html($card['copy']); ?></p>
                            <span class="mmd-room-card__cta"><?php esc_html_e('Explore', 'dawp'); ?></span>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="mmd-section mmd-section--soft" aria-labelledby="mmd-collections-title">
        <div class="mmd-container">
            <div class="mmd-section__head">
                <div>
                    <p class="mmd-eyebrow"><?php esc_html_e('Featured Collections', 'dawp'); ?></p>
                    <h2 id="mmd-collections-title"><?php esc_html_e('Built around the way you train.', 'dawp'); ?></h2>
                </div>
            </div>
            <div class="mmd-collection-grid">
                <?php foreach ($collections as $collection) : ?>
                    <a class="mmd-collection-card" href="<?php echo esc_url($mmd_cat_url($collection['slug'])); ?>">
                        <?php echo $mmd_img($collection['image'], $collection['title'], '', 680, 520, 'lazy', '(max-width: 699px) 100vw, 33vw'); ?>
                        <span class="mmd-collection-card__content">
                            <h3><?php echo esc_html($collection['title']); ?></h3>
                            <p><?php echo esc_html($collection['copy']); ?></p>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="mmd-section" aria-labelledby="mmd-story-title">
        <div class="mmd-container mmd-story">
            <div class="mmd-story__media">
                <?php echo $mmd_img('https://images.unsplash.com/photo-1585152968992-d2b9444408cc?auto=format&fit=crop&w=700&q=80', __('Two lifters spotting a bench press in the gym', 'dawp'), '', 620, 780, 'lazy', '(max-width: 899px) 58vw, 31vw'); ?>
                <?php echo $mmd_img('https://images.unsplash.com/photo-1601925260368-ae2f83cf8b7f?auto=format&fit=crop&w=560&q=80', __('Rolled yoga mats stored on a shelf', 'dawp'), '', 480, 360, 'lazy', '(max-width: 899px) 43vw, 23vw'); ?>
            </div>
            <div class="mmd-story__content">
                <p class="mmd-eyebrow"><?php esc_html_e('Our Point Of View', 'dawp'); ?></p>
                <h2 id="mmd-story-title"><?php esc_html_e('A simpler way to shop for real training.', 'dawp'); ?></h2>
                <p><?php esc_html_e('DTI Fitness brings together purpose-built equipment for strength, cardio, mobility and everyday training, from the home gym to the studio floor. Each category is organized clearly so shopping stays simple and easy to trust.', 'dawp'); ?></p>
                <a class="mmd-btn mmd-btn--secondary" href="<?php echo esc_url(home_url('/about-us/')); ?>"><?php esc_html_e('Discover Our Story', 'dawp'); ?></a>
            </div>
        </div>
    </section>

    <section class="mmd-section mmd-section--soft" aria-labelledby="mmd-best-title">
        <div class="mmd-container">
            <div class="mmd-section__head">
                <div>
                    <p class="mmd-eyebrow"><?php esc_html_e('Best Sellers', 'dawp'); ?></p>
                    <h2 id="mmd-best-title"><?php esc_html_e('Gear customers train with again and again.', 'dawp'); ?></h2>
                </div>
                <a class="mmd-text-link" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('View all products', 'dawp'); ?></a>
            </div>
            <div class="mmd-product-grid">
                <?php if (!empty($best_sellers)) : ?>
                    <?php foreach ($best_sellers as $product_id) : ?>
                        <?php $mmd_product_card($product_id); ?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="mmd-empty-products"><?php esc_html_e('Add WooCommerce products to feature best sellers in this editorial grid.', 'dawp'); ?></div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="mmd-section" aria-labelledby="mmd-season-title">
        <div class="mmd-container">
            <div class="mmd-section__head">
                <div>
                    <p class="mmd-eyebrow"><?php esc_html_e('Training Edits', 'dawp'); ?></p>
                    <h2 id="mmd-season-title"><?php esc_html_e('Fresh edits to plan your next training block.', 'dawp'); ?></h2>
                </div>
            </div>
            <div class="mmd-season-grid">
                <?php foreach ($seasonal as $edit) : ?>
                    <a class="mmd-season-card" href="<?php echo esc_url($shop_url); ?>">
                        <?php echo $mmd_img($edit['image'], $edit['title'], '', 520, 420, 'lazy', '(max-width: 699px) 82vw, 25vw'); ?>
                        <span><?php echo esc_html($edit['title']); ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="new-arrivals" class="mmd-section mmd-section--soft" aria-labelledby="mmd-new-title">
        <div class="mmd-container">
            <div class="mmd-section__head">
                <div>
                    <p class="mmd-eyebrow"><?php esc_html_e('New Arrivals', 'dawp'); ?></p>
                    <h2 id="mmd-new-title"><?php esc_html_e('Just added to the training edit.', 'dawp'); ?></h2>
                </div>
            </div>
            <div class="mmd-product-grid">
                <?php if (!empty($new_arrivals)) : ?>
                    <?php foreach ($new_arrivals as $product_id) : ?>
                        <?php $mmd_product_card($product_id); ?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="mmd-empty-products"><?php esc_html_e('New arrivals will appear here as soon as products are published.', 'dawp'); ?></div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="mmd-section" aria-labelledby="mmd-trust-title">
        <div class="mmd-container">
            <div class="mmd-section__head">
                <div>
                    <p class="mmd-eyebrow"><?php esc_html_e('Why Train With DTI Fitness', 'dawp'); ?></p>
                    <h2 id="mmd-trust-title"><?php esc_html_e('A reliable path from order to workout.', 'dawp'); ?></h2>
                </div>
            </div>
            <div class="mmd-trust-grid">
                <?php
                $trust_items = [
                    [__('Fast Shipping', 'dawp'), __('Orders ship after 1-2 business days and usually arrive in 4-7 business days.', 'dawp'), '<path d="M3 7h11v10H3z"></path><path d="M14 10h4l3 3v4h-7z"></path><circle cx="7" cy="19" r="2"></circle><circle cx="18" cy="19" r="2"></circle>'],
                    [__('Easy Returns', 'dawp'), __('Return eligible unused items within 30 days of delivery.', 'dawp'), '<path d="M3 7v6h6"></path><path d="M21 17a9 9 0 0 0-15-6.7L3 13"></path>'],
                    [__('Secure Checkout', 'dawp'), __('Payment details are protected through encrypted checkout.', 'dawp'), '<rect x="4" y="10" width="16" height="10" rx="2"></rect><path d="M8 10V7a4 4 0 0 1 8 0v3"></path>'],
                    [__('Order Tracking', 'dawp'), __('Tracking is provided once your order ships.', 'dawp'), '<path d="M12 21s7-4.4 7-11a7 7 0 1 0-14 0c0 6.6 7 11 7 11z"></path><circle cx="12" cy="10" r="2"></circle>'],
                    [__('Customer Support', 'dawp'), __('A dedicated care team is available Monday through Friday.', 'dawp'), '<path d="M4 12a8 8 0 0 1 16 0"></path><path d="M4 12v4a2 2 0 0 0 2 2h2v-8H6a2 2 0 0 0-2 2z"></path><path d="M20 12v4a2 2 0 0 1-2 2h-2v-8h2a2 2 0 0 1 2 2z"></path>'],
                ];
                ?>
                <?php foreach ($trust_items as $item) : ?>
                    <article class="mmd-trust-card">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><?php echo $item[2]; ?></svg>
                        <h3><?php echo esc_html($item[0]); ?></h3>
                        <p><?php echo esc_html($item[1]); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="mmd-section" aria-labelledby="mmd-gallery-title">
        <div class="mmd-container">
            <div class="mmd-section__head">
                <div>
                    <p class="mmd-eyebrow"><?php esc_html_e('Lifestyle Gallery', 'dawp'); ?></p>
                    <h2 id="mmd-gallery-title"><?php esc_html_e('Training in every corner.', 'dawp'); ?></h2>
                </div>
            </div>
            <div class="mmd-gallery-grid">
                <?php echo $mmd_img('https://images.unsplash.com/photo-1517836357463-d25dfeac3438?auto=format&fit=crop&w=420&q=80', __('Close-up of a barbell deadlift', 'dawp'), '', 420, 420, 'lazy', '(max-width: 699px) 50vw, 25vw'); ?>
                <?php echo $mmd_img('https://images.unsplash.com/photo-1571731956672-f2b94d7dd0cb?auto=format&fit=crop&w=420&q=80', __('Woman training on a cable machine', 'dawp'), '', 420, 420, 'lazy', '(max-width: 699px) 50vw, 25vw'); ?>
                <?php echo $mmd_img('https://images.unsplash.com/photo-1600881333168-2ef49b341f30?auto=format&fit=crop&w=420&q=80', __('Yoga mobility session with a mat and water bottle', 'dawp'), '', 420, 420, 'lazy', '(max-width: 699px) 50vw, 25vw'); ?>
                <?php echo $mmd_img('https://images.unsplash.com/photo-1601422407692-ec4eeec1d9b3?auto=format&fit=crop&w=420&q=80', __('Athlete performing a kettlebell swing', 'dawp'), '', 420, 420, 'lazy', '(max-width: 699px) 50vw, 25vw'); ?>
            </div>
        </div>
    </section>

    <section class="mmd-newsletter" aria-labelledby="mmd-newsletter-title">
        <div class="mmd-container mmd-newsletter__inner">
            <div>
                <p class="mmd-eyebrow"><?php esc_html_e('Bring Training Home', 'dawp'); ?></p>
                <h2 id="mmd-newsletter-title"><?php esc_html_e('Receive new gear, training edits and helpful finds.', 'dawp'); ?></h2>
                <p><?php esc_html_e('Sign up for a calmer inbox with new equipment drops and product discoveries from DTI Fitness.', 'dawp'); ?></p>
            </div>
            <form action="<?php echo esc_url(home_url('/')); ?>" method="post">
                <label class="screen-reader-text" for="mmd-newsletter-email"><?php esc_html_e('Email address', 'dawp'); ?></label>
                <input id="mmd-newsletter-email" type="email" name="email" placeholder="<?php esc_attr_e('Email address', 'dawp'); ?>" required>
                <button type="submit"><?php esc_html_e('Sign Up', 'dawp'); ?></button>
            </form>
        </div>
    </section>
</div>
