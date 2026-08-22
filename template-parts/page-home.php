<?php
/**
 * Luxury watch homepage.
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

$new_arrivals_url = function_exists('dawp_new_arrivals_url') ? dawp_new_arrivals_url() : home_url('/product-category/new-arrivals/');
$discover_url   = home_url('/about-us/');
$services_url   = home_url('/contact-us/');
$contact_url    = home_url('/contact-us/');

$remote_image = static function ($url) {
    return esc_url($url);
};

$image_tag = static function ($src, $alt, $class = '', $loading = 'lazy', $sizes = '100vw', $width = 1600, $height = 1000, $fetchpriority = '') {
    if (function_exists('dawp_get_responsive_image')) {
        return dawp_get_responsive_image($src, $alt, $class, $width, $height, $loading, $sizes, $fetchpriority);
    }

    return '<img src="' . esc_url($src) . '" alt="' . esc_attr($alt) . '" class="' . esc_attr($class) . '" loading="' . esc_attr($loading) . '" decoding="async" sizes="' . esc_attr($sizes) . '">';
};

$craft_notes = [
    [
        'title' => __('Caliber', 'dawp'),
        'copy' => __('Automatic movements regulated for dependable daily accuracy and tactile winding.', 'dawp'),
        'image' => get_theme_file_uri('assets/img/home/ef05554a-2686-4d5d-a6f3-42a88a9ac3db.jpg'),
        'alt' => __('Macro detail of a luxury watch movement and caliber', 'dawp'),
        'position' => '50% 58%',
    ],
    [
        'title' => __('Casework', 'dawp'),
        'copy' => __('Alternating polished and brushed planes create quiet contrast around the wrist.', 'dawp'),
        'image' => get_theme_file_uri('assets/img/home/d9169a29-71a9-424e-8183-9cafd36514ce.jpg'),
        'alt' => __('Polished luxury watch case and bracelet detail', 'dawp'),
        'position' => '50% 54%',
    ],
    [
        'title' => __('Dial', 'dawp'),
        'copy' => __('Layered indexes, balanced negative space and sapphire clarity keep time legible.', 'dawp'),
        'image' => get_theme_file_uri('assets/img/home/7381a7ef-d7d0-42b2-b15e-fc865028c567.jpg'),
        'alt' => __('Close view of a refined luxury watch dial', 'dawp'),
        'position' => '50% 56%',
    ],
];

$fallback_products = [
    [
        'name' => __('Aurum Chronograph 41', 'dawp'),
        'collection' => __('Rolex', 'dawp'),
        'price' => '$8,900',
        'status' => __('New', 'dawp'),
        'url' => $shop_url,
        'image' => $remote_image('https://images.unsplash.com/photo-1523170335258-f5ed11844a49'),
    ],
    [
        'name' => __('Nocturne Moonphase 39', 'dawp'),
        'collection' => __('Patek Philippe', 'dawp'),
        'price' => '$11,400',
        'status' => __('Limited', 'dawp'),
        'url' => $shop_url,
        'image' => $remote_image('https://images.unsplash.com/photo-1548171915-e79a380a2a4b'),
    ],
    [
        'name' => __('Atlas Automatic 40', 'dawp'),
        'collection' => __('Audemars Piguet', 'dawp'),
        'price' => '$6,750',
        'status' => __('In stock', 'dawp'),
        'url' => $shop_url,
        'image' => $remote_image('https://images.unsplash.com/photo-1612817159949-195b6eb9e31a'),
    ],
    [
        'name' => __('Maison Reserve 38', 'dawp'),
        'collection' => __('Omega', 'dawp'),
        'price' => '$14,200',
        'status' => __('Exclusive', 'dawp'),
        'url' => $shop_url,
        'image' => $remote_image('https://images.unsplash.com/photo-1533139502658-0198f920d8e8'),
    ],
    [
        'name' => __('Vantage Diver 44', 'dawp'),
        'collection' => __('Sport Collection', 'dawp'),
        'price' => '$7,300',
        'status' => __('Available', 'dawp'),
        'url' => $shop_url,
        'image' => $remote_image('https://images.unsplash.com/photo-1548169874-53e85f753f1e'),
    ],
    [
        'name' => __('Elan Skeleton 40', 'dawp'),
        'collection' => __('Heritage Collection', 'dawp'),
        'price' => '$16,850',
        'status' => __('Limited', 'dawp'),
        'url' => $shop_url,
        'image' => $remote_image('https://images.unsplash.com/photo-1524805444758-089113d48a6d'),
    ],
    [
        'name' => __('Solstice GMT 41', 'dawp'),
        'collection' => __('Classic Collection', 'dawp'),
        'price' => '$9,600',
        'status' => __('Available', 'dawp'),
        'url' => $shop_url,
        'image' => $remote_image('https://images.unsplash.com/photo-1508057198894-247b23fe5ade'),
    ],
    [
        'name' => __('Regent Perpetual 39', 'dawp'),
        'collection' => __('Signature Collection', 'dawp'),
        'price' => '$21,400',
        'status' => __('Exclusive', 'dawp'),
        'url' => $shop_url,
        'image' => $remote_image('https://images.unsplash.com/photo-1546868871-7041f2a55e12'),
    ],
    [
        'name' => __('Cascade Chrono 42', 'dawp'),
        'collection' => __('Sport Collection', 'dawp'),
        'price' => '$8,150',
        'status' => __('In stock', 'dawp'),
        'url' => $shop_url,
        'image' => $remote_image('https://images.unsplash.com/photo-1614703484239-14e6d0d68c3b'),
    ],
    [
        'name' => __('Meridian Reserve 40', 'dawp'),
        'collection' => __('Heritage Collection', 'dawp'),
        'price' => '$13,050',
        'status' => __('New', 'dawp'),
        'url' => $shop_url,
        'image' => $remote_image('https://images.unsplash.com/photo-1587836374828-4dbafa94cf0e'),
    ],
    [
        'name' => __('Vesper Tourbillon 38', 'dawp'),
        'collection' => __('Classic Collection', 'dawp'),
        'price' => '$27,900',
        'status' => __('Limited', 'dawp'),
        'url' => $shop_url,
        'image' => $remote_image('https://images.unsplash.com/photo-1533139143976-30918502365b'),
    ],
];

$products = [];
$default_product_image = $remote_image('https://images.unsplash.com/photo-1523170335258-f5ed11844a49');
if (function_exists('wc_get_products')) {
    $wc_products = wc_get_products([
        'status' => 'publish',
        'limit' => 12,
        'orderby' => 'date',
        'order' => 'DESC',
    ]);

    foreach ($wc_products as $product) {
        if (!$product) {
            continue;
        }

        $image_id = $product->get_image_id();
        $terms = get_the_terms($product->get_id(), 'product_cat');
        $products[] = [
            'name' => $product->get_name(),
            'collection' => (!empty($terms) && !is_wp_error($terms)) ? $terms[0]->name : __('Luxury Timepiece', 'dawp'),
            'price' => $product->get_price_html(),
            'status' => $product->is_in_stock() ? __('Available', 'dawp') : __('Inquiry', 'dawp'),
            'url' => get_permalink($product->get_id()),
            'image' => $image_id ? wp_get_attachment_image_url($image_id, 'large') : $default_product_image,
        ];
    }
}

if (empty($products)) {
    $products = $fallback_products;
}

$popular_brands = [
    [
        'name' => __('Rolex', 'dawp'),
        'copy' => __('Iconic sports references, refined bracelets and everyday precision with lasting recognition.', 'dawp'),
        'image' => $remote_image('https://images.unsplash.com/photo-1594534475808-b18fc33b045e'),
        'url' => function_exists('dawp_watch_category_url') ? dawp_watch_category_url('Rolex Watches') : home_url('/product-category/rolex-watches/'),
    ],
    [
        'name' => __('Patek Philippe', 'dawp'),
        'copy' => __('Elegant complications, quiet finishing and heirloom proportions for considered collectors.', 'dawp'),
        'image' => $remote_image('https://patek-res.cloudinary.com/dfsmedia/0906caea301d42b3b8bd23bd656d1711/175354-51882'),
        'url' => function_exists('dawp_watch_category_url') ? dawp_watch_category_url('Patek Philippe') : home_url('/product-category/patek-philippe/'),
    ],
    [
        'name' => __('Audemars Piguet', 'dawp'),
        'copy' => __('Architectural cases, integrated bracelets and bold mechanical presence on the wrist.', 'dawp'),
        'image' => $remote_image('https://images.unsplash.com/photo-1509048191080-d2984bad6ae5'),
        'url' => function_exists('dawp_watch_category_url') ? dawp_watch_category_url('Audemars Piguet') : home_url('/product-category/audemars-piguet/'),
    ],
    [
        'name' => __('Omega', 'dawp'),
        'copy' => __('Sport chronographs, diver references and precise daily watches with technical character.', 'dawp'),
        'image' => $remote_image('https://images.unsplash.com/photo-1523170335258-f5ed11844a49'),
        'url' => function_exists('dawp_watch_category_url') ? dawp_watch_category_url('Omega Watches') : home_url('/product-category/omega-watches/'),
    ],
];

$journal_posts = function_exists('dawp_journal_posts') ? dawp_journal_posts() : [];
?>

<style>
    .lux-home { --black:#0B0B0B; --charcoal:#1A1A1A; --ivory:#F7F5F0; --white:#FFFFFF; --gold:#B89B5E; --gold-light:#D1BD8A; --gray-700:#555555; --gray-500:#858585; --gray-300:#CCCCCC; --gray-200:#E5E2DC; color:var(--charcoal); background:var(--white); font-family:Inter, "Avenir Next", Arial, sans-serif; letter-spacing:0; overflow:hidden; }
    .lux-home * { box-sizing:border-box; }
    .lux-home img { display:block; width:100%; height:100%; object-fit:cover; }
    .lux-wrap { width:min(100% - 40px,1280px); min-width:0; margin-inline:auto; }
    .lux-label { margin:0 0 14px; color:var(--gold); font-size:12px; font-weight:700; line-height:1.3; letter-spacing:.1em; text-transform:uppercase; }
    .lux-title { margin:0; font-family:"Cormorant Garamond", Georgia, serif; font-weight:400; letter-spacing:0; line-height:.98; color:inherit; }
    .lux-copy { margin:22px 0 0; max-width:620px; color:var(--gray-700); font-size:17px; line-height:1.75; }
    .lux-btn { display:inline-flex; align-items:center; justify-content:center; min-height:50px; padding:0 28px; border:1px solid var(--black); border-radius:2px; background:var(--black); color:var(--white); font-size:12px; font-weight:800; letter-spacing:.08em; text-decoration:none; text-transform:uppercase; transition:background .3s cubic-bezier(.22,1,.36,1), color .3s cubic-bezier(.22,1,.36,1), border-color .3s cubic-bezier(.22,1,.36,1), transform .3s cubic-bezier(.22,1,.36,1); }
    .lux-btn:hover { transform:translateY(-2px); background:transparent; color:var(--black); }
    .lux-btn--light { border-color:var(--ivory); background:var(--ivory); color:var(--black); }
    .lux-btn--light:hover { background:transparent; color:var(--ivory); }
    .lux-link { display:inline-flex; width:max-content; color:inherit; font-size:12px; font-weight:800; letter-spacing:.08em; text-transform:uppercase; text-decoration:underline; text-underline-offset:6px; text-decoration-thickness:1px; }
    .lux-section { padding:104px 0; }
    .lux-section--ivory { background:var(--ivory); }
    .lux-section--dark { background:var(--black); color:var(--ivory); }
    .lux-hero { min-height:calc(92vh - 112px); display:grid; align-items:end; position:relative; isolation:isolate; overflow:hidden; color:var(--ivory); background:var(--black); }
    .lux-hero__media { position:absolute; inset:0; z-index:-2; }
    .lux-hero__media img { opacity:.92; transform:scale(1.03); animation:luxSlowZoom 14s cubic-bezier(.22,1,.36,1) forwards; }
    .lux-hero:after { content:""; position:absolute; inset:0; z-index:-1; background:linear-gradient(90deg, rgba(11,11,11,.58) 0%, rgba(11,11,11,.28) 43%, rgba(11,11,11,.04) 100%), linear-gradient(0deg, rgba(11,11,11,.58), rgba(11,11,11,0) 48%); }
    .lux-hero__content { padding:82px 0 60px; max-width:690px; }
    .lux-hero h1 { font-size:clamp(46px,7vw,82px); }
    .lux-hero .lux-copy { color:#E9E3D7; font-size:18px; }
    .lux-hero__meta { display:flex; flex-wrap:wrap; gap:18px 34px; margin-top:34px; padding-top:26px; border-top:1px solid rgba(247,245,240,.28); color:#D8D0C2; font-size:13px; }
    .lux-hero__categories { display:flex; flex-wrap:wrap; gap:10px; margin-top:26px; }
    .lux-hero__categories a { padding:9px 18px; border:1px solid rgba(247,245,240,.4); border-radius:999px; color:var(--ivory); font-size:12px; font-weight:600; letter-spacing:.04em; text-decoration:none; text-transform:uppercase; transition:background .25s cubic-bezier(.22,1,.36,1), border-color .25s cubic-bezier(.22,1,.36,1), color .25s cubic-bezier(.22,1,.36,1); }
    .lux-hero__categories a:hover, .lux-hero__categories a:focus-visible { background:var(--gold); border-color:var(--gold); color:var(--black); }
    .lux-split { display:grid; grid-template-columns:minmax(0,1fr) minmax(0,.88fr); gap:72px; align-items:center; }
    .lux-split--reverse { grid-template-columns:minmax(0,.88fr) minmax(0,1fr); }
    .lux-split--reverse .lux-split__media { order:2; }
    .lux-split__media { aspect-ratio:4/3; overflow:hidden;}
    .lux-split__media img { transition:transform .7s cubic-bezier(.22,1,.36,1); }
    .lux-split__media:hover img { transform:scale(1.025); }
    .lux-split h2, .lux-section__head h2, .lux-newsletter h2 { font-size:clamp(34px,4vw,52px); }
    .lux-section__head { display:flex; justify-content:space-between; align-items:end; gap:32px; margin-bottom:42px; }
    .lux-section__head p { margin:12px 0 0; max-width:520px; color:var(--gray-700); line-height:1.7; }
    .lux-products { display:grid; grid-template-columns:repeat(4,minmax(0,1fr)); gap:28px; }
    .lux-product { position:relative; min-width:0; color:inherit; text-decoration:none; }
    .lux-product__image { display:block; aspect-ratio:4/5; overflow:hidden; background:#F1EFE9; }
    .lux-product__image img { object-fit:cover; transition:transform .55s cubic-bezier(.22,1,.36,1); }
    .lux-product:hover .lux-product__image img { transform:scale(1.035); }
    .lux-product__status { position:absolute; top:14px; left:14px; z-index:1; padding:6px 9px; background:rgba(247,245,240,.94); color:var(--black); font-size:11px; font-weight:800; letter-spacing:.08em; text-transform:uppercase; }
    .lux-product__body { display:block; padding:18px 0 0; }
    .lux-product__body h3 { margin:0; color:var(--black); font-size:18px; font-weight:600; line-height:1.35; }
    .lux-product__body p { margin:7px 0 0; color:var(--gray-500); font-size:14px; }
    .lux-product__price { display:flex; flex-wrap:wrap; align-items:baseline; gap:4px 8px; margin-top:12px; color:var(--black); font-size:15px; font-weight:700; line-height:1.45; }
    .lux-product__price del { color:var(--gray-500); font-weight:600; text-decoration-thickness:1px; }
    .lux-product__price ins { color:var(--black); font-weight:800; text-decoration:none; }
    .lux-product__price .screen-reader-text { position:absolute !important; width:1px; height:1px; padding:0; margin:-1px; overflow:hidden; clip:rect(0,0,0,0); white-space:nowrap; border:0; }
    .lux-popular { display:grid; grid-template-columns:repeat(4,minmax(0,1fr)); gap:20px; }
    .lux-popular__card { display:block; min-width:0; color:inherit; text-decoration:none; border-radius:3px; overflow:hidden; background:var(--gray-200); transition:transform .35s cubic-bezier(.22,1,.36,1), box-shadow .35s cubic-bezier(.22,1,.36,1); }
    .lux-popular__card:hover, .lux-popular__card:focus-visible { transform:translateY(-4px); box-shadow:0 18px 32px -18px rgba(11,11,11,.28); }
    .lux-popular__card:focus-visible { outline:2px solid var(--gold-light); outline-offset:3px; }
    .lux-popular__image { display:block; position:relative; aspect-ratio:1/1; overflow:hidden; background:var(--gray-200); }
    .lux-popular__image img { object-fit:contain; object-position:center; transition:transform .5s cubic-bezier(.22,1,.36,1); }
    .lux-popular__card:hover .lux-popular__image img { transform:scale(1.05); }
    .lux-popular__body { display:block; padding:16px 18px 20px; background:var(--white); }
    .lux-popular__brand { display:block; margin:0; color:var(--gold); font-size:11px; font-weight:800; letter-spacing:.08em; text-transform:uppercase; }
    .lux-popular__name { display:block; margin:5px 0 0; color:var(--black); font-size:16px; font-weight:600; line-height:1.3; }
    .lux-story { display:grid; grid-template-columns:1.05fr .95fr; gap:64px; align-items:center; }
    .lux-story__media { min-height:560px; overflow:hidden; position:relative; }
    .lux-story__media img { position:absolute; inset:0; width:100%; height:100%; object-fit:cover; }
    .lux-story .lux-copy { color:#C9C3B8; }
    .lux-craft-grid { display:grid; grid-template-columns:minmax(0,1.12fr) minmax(360px,.88fr); gap:28px; align-items:stretch; }
    .lux-craft-main { aspect-ratio:100/91; min-height:0; overflow:hidden; background:#E8E3D9; position:relative; }
    .lux-craft-main img { position:absolute; inset:0; width:100%; height:100%; object-fit:cover; object-position:50% 58%; transition:opacity .28s cubic-bezier(.22,1,.36,1), transform .7s cubic-bezier(.22,1,.36,1); }
    .lux-craft-main.is-changing img { opacity:.2; transform:scale(1.018); }
    .lux-craft-panel { min-width:0; align-self:center; padding:12px 0 12px 14px; }
    .lux-craft-panel .lux-title { padding-bottom:16px; border-bottom:1px solid var(--gray-200); font-size:clamp(34px,3.2vw,48px); }
    .lux-craft-notes { display:grid; gap:12px; margin-top:22px; }
    .lux-note { width:100%; display:grid; grid-template-columns:42px 1fr; gap:18px; padding:20px 18px; border:1px solid transparent; border-bottom-color:var(--gray-200); border-radius:2px; background:transparent; color:inherit; text-align:left; cursor:pointer; transition:background .28s cubic-bezier(.22,1,.36,1), border-color .28s cubic-bezier(.22,1,.36,1), transform .28s cubic-bezier(.22,1,.36,1); }
    .lux-note:hover, .lux-note:focus-visible, .lux-note.is-active { background:#FBFAF7; border-color:rgba(184,155,94,.42); transform:translateX(6px); }
    .lux-note:focus-visible { outline:2px solid var(--gold-light); outline-offset:4px; }
    .lux-note__index { color:var(--gold); font-size:12px; font-weight:800; letter-spacing:.08em; line-height:2.55; }
    .lux-note strong { display:block; color:var(--black); font-family:"Cormorant Garamond", Georgia, serif; font-size:31px; font-weight:400; line-height:1.05; }
    .lux-note span:not(.lux-note__index) { display:block; margin-top:9px; color:var(--gray-700); line-height:1.6; }
    .lux-note.is-active strong { color:#7A6439; }
    .lux-banner { min-height:78vh; display:grid; align-items:end; position:relative; isolation:isolate; overflow:hidden; color:var(--ivory); background:var(--black); }
    .lux-banner img { position:absolute; inset:0; z-index:-2; opacity:.9; }
    .lux-banner:after { content:""; position:absolute; inset:0; z-index:-1; background:linear-gradient(0deg, rgba(11,11,11,.62), rgba(11,11,11,.08)); }
    .lux-banner__content { max-width:620px; padding:80px 0; }
    .lux-banner h2 { font-size:clamp(40px,5.2vw,70px); }
    .lux-collections { display:grid; grid-template-columns:repeat(4,minmax(0,1fr)); gap:24px; }
    .lux-collection { min-height:440px; display:grid; align-items:end; position:relative; isolation:isolate; overflow:hidden; color:var(--ivory); text-decoration:none; }
    .lux-collection img { position:absolute; inset:0; z-index:-2; transition:transform .55s cubic-bezier(.22,1,.36,1); }
    .lux-collection:after { content:""; position:absolute; inset:0; z-index:-1; background:linear-gradient(0deg, rgba(11,11,11,.56), rgba(11,11,11,.04) 58%); }
    .lux-collection:hover img { transform:scale(1.025); }
    .lux-collection span { padding:28px; }
    .lux-collection strong { display:block; font-family:"Cormorant Garamond", Georgia, serif; font-size:36px; font-weight:400; line-height:1; }
    .lux-collection em { display:block; margin-top:12px; color:#D8D0C2; font-style:normal; line-height:1.55; }
        .lux-form { grid-template-columns:1fr; }
        .lux-form .lux-btn { width:100%; }
    }
</style>

<div class="lux-home">
    <section class="lux-hero" aria-label="<?php esc_attr_e('Luxury watch hero', 'dawp'); ?>">
        <div class="lux-hero__media">
            <?php echo $image_tag(get_template_directory_uri() . '/assets/img/banner/hero.jpg', __('Close-up of a luxury watch on the wrist', 'dawp'), '', 'eager', '100vw'); ?>
        </div>
        <div class="lux-wrap">
            <div class="lux-hero__content">
                <p class="lux-label"><?php esc_html_e('New Collection', 'dawp'); ?></p>
                <h1 class="lux-title"><?php esc_html_e('The Art of Time', 'dawp'); ?></h1>
                <p class="lux-copy"><?php esc_html_e('Precision shaped by hand-finished details, restrained design and mechanical character made for a lifetime of wear.', 'dawp'); ?></p>
                <p style="margin:30px 0 0;"><a class="lux-btn lux-btn--light" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('All Watches', 'dawp'); ?></a></p>
                <?php if (!empty($brand_categories)) : ?>
                    <nav class="lux-hero__categories" aria-label="<?php esc_attr_e('Shop by category', 'dawp'); ?>">
                        <?php foreach ($brand_categories as $category) : ?>
                            <a href="<?php echo esc_url($category['url']); ?>"><?php echo esc_html($category['title']); ?></a>
                        <?php endforeach; ?>
                    </nav>
                <?php endif; ?>
                <div class="lux-hero__meta" aria-label="<?php esc_attr_e('Brand assurances', 'dawp'); ?>">
                    <span><?php esc_html_e('Swiss automatic movements', 'dawp'); ?></span>
                    <span><?php esc_html_e('Insured global delivery', 'dawp'); ?></span>
                    <span><?php esc_html_e('Concierge consultation', 'dawp'); ?></span>
                </div>
            </div>
        </div>
    </section>

    <section class="lux-section lux-section--ivory">
        <div class="lux-wrap">
            <div class="lux-section__head">
                <div>
                    <p class="lux-label"><?php esc_html_e('Iconic Timepieces', 'dawp'); ?></p>
                    <h2 class="lux-title"><?php esc_html_e('Our Most Popular Models', 'dawp'); ?></h2>
                    <p><?php esc_html_e('Explore our curated selection of luxury watch collections from the world\'s most prestigious brands.', 'dawp'); ?></p>
                </div>
                <a class="lux-link" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('View all brands', 'dawp'); ?></a>
            </div>
            <div>
                <p class="lux-label"><?php esc_html_e('Featured Collection', 'dawp'); ?></p>
                <h2 class="lux-title"><?php esc_html_e('Heritage, redrawn for now.', 'dawp'); ?></h2>
                <p class="lux-copy"><?php esc_html_e('A collection of slim cases, sculpted lugs and textured dials that carry classic watchmaking codes into a quieter modern language.', 'dawp'); ?></p>
                <p style="margin:30px 0 0;"><a class="lux-btn" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Explore Watches', 'dawp'); ?></a></p>
            </div>
        </div>
    </section>

    <section class="lux-section">
        <div class="lux-wrap">
            <div class="lux-section__head">
                <div>
                    <p class="lux-label"><?php esc_html_e('Featured Timepieces', 'dawp'); ?></p>
                    <h2 class="lux-title"><?php esc_html_e('Signature watches', 'dawp'); ?></h2>
                    <p><?php esc_html_e('A curated edit of mechanical watches selected for proportion, finishing and everyday confidence.', 'dawp'); ?></p>
                </div>
                <a class="lux-link" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('View all watches', 'dawp'); ?></a>
            </div>

            <div class="lux-products">
                <?php foreach ($products as $product) : ?>
                    <a class="lux-product" href="<?php echo esc_url($product['url']); ?>">
                        <span class="lux-product__status"><?php echo esc_html($product['status']); ?></span>
                        <span class="lux-product__image">
                            <?php echo $image_tag($product['image'], $product['name'], '', 'lazy', '(max-width: 640px) 74vw, (max-width: 980px) 45vw, 25vw', 520, 650); ?>
                        </span>
                        <span class="lux-product__body">
                            <h3><?php echo esc_html($product['name']); ?></h3>
                            <p><?php echo esc_html($product['collection']); ?></p>
                            <strong class="lux-product__price"><?php echo wp_kses_post($product['price']); ?></strong>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="lux-section lux-section--dark">
        <div class="lux-wrap lux-story">
            <div class="lux-story__media">
                <?php echo $image_tag(get_template_directory_uri() . '/assets/img/products/Spirit-of-Big-Bang-Titanium-Blue-Ceramic-42-mm-soldier-shot-1-700x700.png', __('Watchmaker working on a mechanical movement', 'dawp')); ?>
            </div>
            <div>
                <p class="lux-label"><?php esc_html_e('Crafted With Purpose', 'dawp'); ?></p>
                <h2 class="lux-title"><?php esc_html_e('Every surface has a reason.', 'dawp'); ?></h2>
                <p class="lux-copy"><?php esc_html_e('From the movement within to the final brushing of the case, each watch is built to make precision feel personal, durable and quietly distinctive.', 'dawp'); ?></p>
                <p style="margin:30px 0 0;"><a class="lux-btn lux-btn--light" href="<?php echo esc_url($discover_url); ?>"><?php esc_html_e('Our Story', 'dawp'); ?></a></p>
            </div>
        </div>
    </section>

    <section class="lux-section lux-section--ivory">
        <div class="lux-wrap">
            <div class="lux-section__head">
                <div>
                    <p class="lux-label"><?php esc_html_e('New Arrivals', 'dawp'); ?></p>
                    <h2 class="lux-title"><?php esc_html_e('Latest additions', 'dawp'); ?></h2>
                    <p><?php esc_html_e('Fresh references with clean dials, balanced dimensions and refined bracelets.', 'dawp'); ?></p>
                </div>
                <a class="lux-link" href="<?php echo esc_url($new_arrivals_url); ?>"><?php esc_html_e('Shop new arrivals', 'dawp'); ?></a>
            </div>
            <div class="lux-products">
                <?php foreach (array_reverse($products) as $product) : ?>
                    <a class="lux-product" href="<?php echo esc_url($product['url']); ?>">
                        <span class="lux-product__status"><?php echo esc_html($product['status']); ?></span>
                        <span class="lux-product__image">
                            <?php echo $image_tag($product['image'], $product['name'], '', 'lazy', '(max-width: 640px) 74vw, (max-width: 980px) 45vw, 25vw', 520, 650); ?>
                        </span>
                        <span class="lux-product__body">
                            <h3><?php echo esc_html($product['name']); ?></h3>
                            <p><?php echo esc_html($product['collection']); ?></p>
                            <strong class="lux-product__price"><?php echo wp_kses_post($product['price']); ?></strong>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="lux-section lux-section--dark">
        <div class="lux-wrap">
            <div class="lux-section__head">
                <div>
                    <p class="lux-label"><?php esc_html_e('Services', 'dawp'); ?></p>
                    <h2 class="lux-title"><?php esc_html_e('Confidence after purchase', 'dawp'); ?></h2>
                </div>
                <a class="lux-link" href="<?php echo esc_url($services_url); ?>"><?php esc_html_e('View services', 'dawp'); ?></a>
            </div>
            <div class="lux-services">
                <div class="lux-service"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 7h11v10H3z"></path><path d="M14 10h4l3 3v4h-7z"></path><circle cx="7" cy="19" r="2"></circle><circle cx="18" cy="19" r="2"></circle></svg><h3><?php esc_html_e('Insured Shipping', 'dawp'); ?></h3><p><?php esc_html_e('Secure delivery with tracking and signature confirmation.', 'dawp'); ?></p></div>
                <div class="lux-service"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3l7 4v5c0 4.5-3 7.6-7 9-4-1.4-7-4.5-7-9V7z"></path><path d="m9 12 2 2 4-5"></path></svg><h3><?php esc_html_e('Authenticity Guarantee', 'dawp'); ?></h3><p><?php esc_html_e('Each watch is inspected, documented and verified.', 'dawp'); ?></p></div>
                <div class="lux-service"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="8"></circle><path d="M12 8v4l3 2"></path></svg><h3><?php esc_html_e('International Warranty', 'dawp'); ?></h3><p><?php esc_html_e('Coverage and care guidance for long-term ownership.', 'dawp'); ?></p></div>
                <div class="lux-service"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M21 15a4 4 0 0 1-4 4H8l-5 3V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4z"></path></svg><h3><?php esc_html_e('Personal Consultation', 'dawp'); ?></h3><p><?php esc_html_e('Private guidance for sizing, gifting and collection choice.', 'dawp'); ?></p></div>
            </div>
        </div>
    </section>

    <section class="lux-section">
        <div class="lux-wrap">
            <div class="lux-section__head">
                <div>
                    <p class="lux-label"><?php esc_html_e('Journal', 'dawp'); ?></p>
                    <h2 class="lux-title"><?php esc_html_e('Stories of time and design', 'dawp'); ?></h2>
                </div>
                <a class="lux-link" href="<?php echo esc_url(home_url('/journal/')); ?>"><?php esc_html_e('Read journal', 'dawp'); ?></a>
            </div>
            <div class="lux-journal">
                <?php if (!empty($journal_posts)) : ?>
                <a class="lux-article" href="<?php echo esc_url(home_url('/journal/' . $journal_posts[0]['slug'] . '/')); ?>">
                    <span class="lux-article__image"><?php echo $image_tag($journal_posts[0]['image'], $journal_posts[0]['alt']); ?></span>
                    <span><?php echo esc_html($journal_posts[0]['category']); ?></span>
                    <strong><?php echo esc_html($journal_posts[0]['title']); ?></strong>
                    <p><?php echo esc_html($journal_posts[0]['excerpt']); ?></p>
                </a>
                <div style="display:grid; gap:28px;">
                    <?php foreach (array_slice($journal_posts, 1) as $post) : ?>
                    <a class="lux-article lux-article--small" href="<?php echo esc_url(home_url('/journal/' . $post['slug'] . '/')); ?>">
                        <span class="lux-article__image"><?php echo $image_tag($post['image'], $post['alt']); ?></span>
                        <span><span><?php echo esc_html($post['category']); ?></span><strong><?php echo esc_html($post['title']); ?></strong><p><?php echo esc_html($post['excerpt']); ?></p></span>
                    </a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="lux-newsletter">
        <div class="lux-wrap lux-newsletter__inner">
            <div>
                <p class="lux-label"><?php esc_html_e('Private Access', 'dawp'); ?></p>
                <h2 class="lux-title"><?php esc_html_e('New releases, quietly delivered.', 'dawp'); ?></h2>
                <p class="lux-copy"><?php esc_html_e('Receive collection notes, appointment availability and occasional editorial stories from the atelier.', 'dawp'); ?></p>
            </div>
            <form class="lux-form" action="<?php echo esc_url($contact_url); ?>" method="get">
                <label for="lux-home-email"><?php esc_html_e('Email address', 'dawp'); ?></label>
                <input id="lux-home-email" type="email" name="email" placeholder="<?php esc_attr_e('Email address', 'dawp'); ?>" autocomplete="email">
                <button class="lux-btn lux-btn--light" type="submit"><?php esc_html_e('Subscribe', 'dawp'); ?></button>
            </form>
        </div>
    </section>
</div>

