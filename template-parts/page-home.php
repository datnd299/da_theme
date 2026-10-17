<?php
/**
 * Luxury watch homepage — Maison editorial layout.
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

$contact_url  = home_url('/contact-us/');
$img          = static fn($file) => get_template_directory_uri() . '/assets/img/' . $file;
$category_img = static fn($file) => get_theme_file_uri('assets/img/categories/' . $file);

$image_tag = static function ($src, $alt, $class = '', $loading = 'lazy', $sizes = '100vw', $w = 0, $h = 0) {
    $dims = $w && $h ? ' width="' . (int) $w . '" height="' . (int) $h . '"' : '';
    return '<img src="' . esc_url($src) . '" alt="' . esc_attr($alt) . '" class="' . esc_attr($class) . '" loading="' . esc_attr($loading) . '" decoding="async" sizes="' . esc_attr($sizes) . '"' . $dims . '>';
};

$brands = function_exists('dawp_lbq_product_categories') ? dawp_lbq_product_categories() : [];

$popular_models = [
    ['slug' => 'rolex-submariner', 'image' => 'rolex-submariner.webp', 'brand' => __('Rolex', 'dawp'), 'name' => __('Submariner', 'dawp')],
    ['slug' => 'rolex-daytona', 'image' => 'rolex-daytona.webp', 'brand' => __('Rolex', 'dawp'), 'name' => __('Daytona', 'dawp')],
    ['slug' => 'patek-philippe-nautilus', 'image' => 'patek-philippe-nautilus.jpg', 'brand' => __('Patek Philippe', 'dawp'), 'name' => __('Nautilus', 'dawp')],
    ['slug' => 'audemars-piguet-royal-oak', 'image' => 'ap-royal-oak-jumbo.jpg', 'brand' => __('Audemars Piguet', 'dawp'), 'name' => __('Royal Oak', 'dawp')],
    ['slug' => 'omega-speedmaster', 'image' => 'omega-speedmaster.jpg', 'brand' => __('Omega', 'dawp'), 'name' => __('Speedmaster', 'dawp')],
    ['slug' => 'rolex-gmt-master', 'image' => 'rolex-gmt-master.jpg', 'brand' => __('Rolex', 'dawp'), 'name' => __('GMT-Master II', 'dawp')],
    ['slug' => 'hublot-big-bang', 'image' => 'hublot-big-bang.jpg', 'brand' => __('Hublot', 'dawp'), 'name' => __('Big Bang', 'dawp')],
    ['slug' => 'rolex-day-date', 'image' => 'rolex-day-date.webp', 'brand' => __('Rolex', 'dawp'), 'name' => __('Day-Date', 'dawp')],
];

$products = [];
if (function_exists('wc_get_products')) {
    foreach (wc_get_products(['status' => 'publish', 'limit' => 8, 'orderby' => 'date', 'order' => 'DESC']) as $product) {
        $image_id = $product->get_image_id();
        $terms    = get_the_terms($product->get_id(), 'product_cat');
        $products[] = [
            'name'  => $product->get_name(),
            'brand' => (!empty($terms) && !is_wp_error($terms)) ? $terms[0]->name : '',
            'price' => $product->get_price_html(),
            'url'   => get_permalink($product->get_id()),
            'image' => $image_id ? wp_get_attachment_image_url($image_id, 'woocommerce_single') : wc_placeholder_img_src('woocommerce_single'),
        ];
    }
}

$craft_notes = [
    ['title' => __('The Movement', 'dawp'), 'copy' => __('Automatic calibres checked for amplitude, beat and power reserve before dispatch.', 'dawp')],
    ['title' => __('The Case', 'dawp'), 'copy' => __('Brushed and polished surfaces, crown action and crystal inspected under magnification.', 'dawp')],
    ['title' => __('The Bracelet', 'dawp'), 'copy' => __('Links, clasp and fit reviewed so the piece wears as it was designed to.', 'dawp')],
];
?>

<style>
    .mh { background:var(--color-background); color:var(--color-foreground); }
    .mh img { display:block; width:100%; height:100%; object-fit:cover; }
    .mh-title { margin:0; color:inherit; font-family:var(--font-heading); font-weight:400; line-height:1.02; letter-spacing:-.005em; }
    .mh-title em { color:var(--color-accent); font-style:italic; }
    .mh-copy { max-width:560px; margin:22px 0 0; color:var(--color-foreground-muted); font-size:16px; line-height:1.8; }
    .mh-section { padding:84px 0; }
    .mh-head { display:flex; flex-wrap:wrap; justify-content:space-between; align-items:flex-end; gap:20px 40px; margin-bottom:44px; }
    .mh-head h2 { font-size:clamp(36px,4.4vw,58px); }
    .mh-head--center { flex-direction:column; align-items:center; text-align:center; }

    /* Hero */
    .mh-hero { position:relative; isolation:isolate; display:flex; align-items:flex-end; min-height:min(88vh,860px); overflow:hidden; background:var(--color-ink); color:var(--color-surface); }
    .mh-hero__media { position:absolute; inset:0; z-index:-2; }
    .mh-hero__media img { object-position:72% 50%; animation:mhZoom 16s var(--ease-fluid) forwards; }
    .mh-hero::after { content:""; position:absolute; inset:0; z-index:-1; background:linear-gradient(0deg, rgba(19,17,14,.92) 0%, rgba(19,17,14,.35) 55%, rgba(19,17,14,.1) 100%); }
    .mh-hero__content { padding:120px 0 56px; }
    .mh-hero h1 { max-width:760px; font-size:clamp(48px,8vw,104px); }
    .mh-hero .mh-copy { color:rgba(243,238,229,.78); }
    .mh-hero__ctas { display:flex; flex-wrap:wrap; gap:12px; margin-top:34px; }
    .mh-hero__foot { display:flex; flex-wrap:wrap; gap:10px 28px; margin-top:52px; padding-top:22px; border-top:1px solid var(--color-line-dark); color:rgba(243,238,229,.6); font-size:10.5px; font-weight:600; letter-spacing:.2em; text-transform:uppercase; }
    .mh-hero__foot span::before { content:"\2014"; margin-right:10px; color:var(--color-accent-light); }
    @media (max-width: 767px) {
        .mh-hero { min-height:auto; }
        .mh-hero__media { bottom:auto; height:62vw; min-height:260px; }
        .mh-hero__media img { object-position:78% 50%; }
        .mh-hero::after { background:linear-gradient(180deg, rgba(19,17,14,0) 0%, rgba(19,17,14,.2) 30%, var(--color-ink) min(62vw,420px)); }
        .mh-hero__content { padding:calc(max(62vw,260px) - 70px) 0 44px; }
        .mh-hero__ctas .mx-btn { flex:1 1 100%; }
        .mh-banner::after { background:linear-gradient(0deg, rgba(19,17,14,.95) 0%, rgba(19,17,14,.6) 60%, rgba(19,17,14,.3) 100%); }
        .mh-banner { align-items:flex-end; }
    }
    @keyframes mhZoom { from { transform:scale(1.06); } to { transform:scale(1); } }

    /* Brand ribbon */
    .mh-ribbon { border-bottom:1px solid var(--color-border); background:var(--color-background); }
    .mh-ribbon__track { display:flex; gap:0; overflow-x:auto; scrollbar-width:none; }
    .mh-ribbon__track::-webkit-scrollbar { display:none; }
    .mh-ribbon a { flex:none; padding:26px 26px; color:var(--color-foreground-muted); font-family:var(--font-heading); font-size:22px; letter-spacing:.02em; text-decoration:none; white-space:nowrap; transition:color var(--duration-fast) var(--ease-fluid); }
    .mh-ribbon a:hover { color:var(--color-accent); }

    /* Model grid */
    .mh-models { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:12px; }
    .mh-model { display:block; color:inherit; text-decoration:none; }
    .mh-model__img, .mh-card__img, .mh-index__thumb { display:block; }
    .mh-model__img { position:relative; aspect-ratio:1/1; overflow:hidden; background:var(--color-surface-alt); }
    .mh-model__img img { object-fit:contain; padding:8%; transition:transform var(--duration-slow) var(--ease-fluid); }
    .mh-model:hover .mh-model__img img { transform:scale(1.05); }
    .mh-model__body { padding:16px 2px 6px; }
    .mh-model__brand { display:block; color:var(--color-accent); font-size:10px; font-weight:600; letter-spacing:.22em; text-transform:uppercase; }
    .mh-model__name { display:block; margin-top:4px; color:var(--color-ink); font-family:var(--font-heading); font-size:24px; line-height:1.15; }

    /* Products */
    .mh-products { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:36px 12px; }
    .mh-card { display:flex; flex-direction:column; color:inherit; text-decoration:none; }
    .mh-card__img { aspect-ratio:1/1; overflow:hidden; background:var(--color-surface); }
    .mh-card__img img { object-fit:contain; mix-blend-mode:multiply; transition:transform var(--duration-slow) var(--ease-fluid); }
    .mh-card:hover .mh-card__img img { transform:scale(1.04); }
    .mh-card__brand { margin-top:16px; color:var(--color-muted); font-size:10px; font-weight:600; letter-spacing:.2em; text-transform:uppercase; }
    .mh-card__name { display:-webkit-box; overflow:hidden; margin:6px 0 0; -webkit-box-orient:vertical; -webkit-line-clamp:2; color:var(--color-ink); font-family:var(--font-heading); font-size:20px; font-weight:500; line-height:1.2; }
    .mh-card__price { margin-top:10px; color:var(--color-ink); font-size:14px; font-weight:600; }
    .mh-card__price del { margin-right:6px; color:var(--color-muted); font-weight:400; }
    .mh-card__price ins { text-decoration:none; }
    .mh-empty { padding:56px 24px; border:1px solid var(--color-border); text-align:center; color:var(--color-foreground-muted); }

    /* Editorial split */
    .mh-split { display:grid; gap:40px; align-items:center; }
    .mh-split__media { aspect-ratio:4/3; overflow:hidden; }
    .mh-split h2 { font-size:clamp(38px,4.6vw,64px); }
    .mh-split .mx-btn { margin-top:34px; }

    /* Maison index */
    .mh-index { border-top:1px solid var(--color-border); }
    .mh-index a { display:grid; grid-template-columns:44px 1fr auto; gap:16px; align-items:center; padding:24px 0; border-bottom:1px solid var(--color-border); color:inherit; text-decoration:none; transition:padding var(--duration-normal) var(--ease-fluid), background var(--duration-normal) var(--ease-fluid); }
    .mh-index__no { color:var(--color-accent); font-size:11px; font-weight:600; letter-spacing:.14em; }
    .mh-index__name { display:block; color:var(--color-ink); font-family:var(--font-heading); font-size:clamp(26px,3vw,36px); line-height:1.1; }
    .mh-index__short { display:block; margin-top:4px; color:var(--color-foreground-muted); font-size:14px; }
    .mh-index__thumb { width:64px; height:64px; overflow:hidden; border-radius:50%; background:var(--color-surface-alt); }
    .mh-index__thumb img { object-fit:contain; }
    .mh-index a:hover { padding-left:12px; background:var(--color-surface-alt); }

    /* Craft */
    .mh-craft { background:var(--color-ink); color:var(--color-surface); }
    .mh-craft__grid { display:grid; gap:44px; align-items:center; }
    .mh-craft__media { aspect-ratio:4/3; overflow:hidden; }
    .mh-craft h2 { font-size:clamp(36px,4.2vw,56px); }
    .mh-craft .mh-copy { color:rgba(243,238,229,.7); }
    .mh-craft__notes { display:grid; margin-top:34px; border-top:1px solid var(--color-line-dark); }
    .mh-craft__note { display:grid; grid-template-columns:44px 1fr; gap:14px; padding:20px 0; border-bottom:1px solid var(--color-line-dark); }
    .mh-craft__note span { color:var(--color-accent-light); font-size:11px; font-weight:600; letter-spacing:.14em; line-height:2.2; }
    .mh-craft__note strong { display:block; font-family:var(--font-heading); font-size:24px; font-weight:400; }
    .mh-craft__note p { margin:4px 0 0; color:rgba(243,238,229,.62); font-size:14px; line-height:1.65; }

    /* Concierge banner */
    .mh-banner { position:relative; isolation:isolate; display:flex; align-items:center; min-height:min(78vh,720px); overflow:hidden; background:var(--color-ink); color:var(--color-surface); }
    .mh-banner > img { position:absolute; inset:0; z-index:-2; object-position:65% 50%; }
    .mh-banner::after { content:""; position:absolute; inset:0; z-index:-1; background:linear-gradient(90deg, rgba(19,17,14,.9) 0%, rgba(19,17,14,.55) 50%, rgba(19,17,14,.15) 100%); }
    .mh-banner__content { max-width:560px; padding:96px 0; }
    .mh-banner h2 { font-size:clamp(40px,5vw,68px); }
    .mh-banner .mh-copy { color:rgba(243,238,229,.75); }
    .mh-banner__ctas { display:flex; flex-wrap:wrap; gap:12px; margin-top:34px; }

    @media (min-width: 768px) {
        .mh-section { padding:112px 0; }
        .mh-models { grid-template-columns:repeat(4,minmax(0,1fr)); gap:20px; }
        .mh-products { grid-template-columns:repeat(4,minmax(0,1fr)); gap:48px 20px; }
        .mh-index a { grid-template-columns:64px 1fr auto; gap:24px; padding:28px 0; }
        .mh-index__thumb { width:84px; height:84px; }
    }
    @media (min-width: 1024px) {
        .mh-hero__content { padding:140px 0 72px; }
        .mh-split { grid-template-columns:1.1fr .9fr; gap:88px; }
        .mh-craft__grid { grid-template-columns:1fr 1fr; gap:88px; }
        .mh-craft__media { aspect-ratio:4/5; }
        .mh-index__wrap { display:grid; grid-template-columns:.8fr 1.2fr; gap:88px; align-items:start; }
        .mh-index__wrap .mh-head { position:sticky; top:120px; display:block; }
    }
    @media (prefers-reduced-motion: reduce) {
        .mh-hero__media img { animation:none; }
        .mh * { transition:none !important; }
    }
</style>

<div class="mh">
    <section class="mh-hero" aria-label="<?php esc_attr_e('Featured', 'dawp'); ?>">
        <div class="mh-hero__media">
            <?php echo $image_tag($img('maison/hero-diver.jpg'), __('Steel dive watch resting on dark slate', 'dawp'), '', 'eager', '100vw', 1916, 821); ?>
        </div>
        <div class="mx-wrap mh-hero__content">
            <p class="mx-eyebrow mx-eyebrow--light"><?php esc_html_e('Fine Swiss Timepieces', 'dawp'); ?></p>
            <h1 class="mh-title"><?php echo wp_kses(__('The art of <em>time</em>, held to a higher standard.', 'dawp'), ['em' => []]); ?></h1>
            <p class="mh-copy"><?php esc_html_e('Rolex, Patek Philippe, Audemars Piguet, Omega and the houses that define fine watchmaking, each piece inspected before it reaches your wrist.', 'dawp'); ?></p>
            <div class="mh-hero__ctas">
                <a class="mx-btn mx-btn--light" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop Watches', 'dawp'); ?></a>
                <a class="mx-btn mx-btn--ghost-light" href="#maisons"><?php esc_html_e('Explore the Maisons', 'dawp'); ?></a>
            </div>
            <div class="mh-hero__foot">
                <span><?php esc_html_e('Quality inspected', 'dawp'); ?></span>
                <span><?php esc_html_e('Insured delivery', 'dawp'); ?></span>
                <span><?php esc_html_e('Private concierge', 'dawp'); ?></span>
            </div>
        </div>
    </section>

    <?php if (!empty($brands)) : ?>
        <nav class="mh-ribbon" aria-label="<?php esc_attr_e('Brands', 'dawp'); ?>">
            <div class="mx-wrap mh-ribbon__track">
                <?php foreach ($brands as $slug => $brand) : ?>
                    <a href="<?php echo esc_url(dawp_product_category_url($slug)); ?>"><?php echo esc_html(preg_replace('/\s+Watches$/', '', $brand['name'])); ?></a>
                <?php endforeach; ?>
            </div>
        </nav>
    <?php endif; ?>

    <section class="mh-section">
        <div class="mx-wrap">
            <div class="mh-head">
                <div>
                    <p class="mx-eyebrow"><?php esc_html_e('Iconic References', 'dawp'); ?></p>
                    <h2 class="mh-title"><?php esc_html_e('The most coveted models', 'dawp'); ?></h2>
                </div>
                <a class="mx-link" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('View all watches', 'dawp'); ?></a>
            </div>
            <div class="mh-models">
                <?php foreach ($popular_models as $model) : ?>
                    <a class="mh-model" href="<?php echo esc_url(dawp_product_category_url($model['slug'])); ?>">
                        <span class="mh-model__img"><?php echo $image_tag($category_img($model['image']), $model['brand'] . ' ' . $model['name'], '', 'lazy', '(max-width: 767px) 50vw, 25vw'); ?></span>
                        <span class="mh-model__body">
                            <span class="mh-model__brand"><?php echo esc_html($model['brand']); ?></span>
                            <span class="mh-model__name"><?php echo esc_html($model['name']); ?></span>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="mh-section" style="padding-top:0;">
        <div class="mx-wrap mh-split">
            <div class="mh-split__media">
                <?php echo $image_tag($img('maison/collector-gold.jpg'), __('Gold dress watch on cream silk beside a walnut watch box', 'dawp'), '', 'lazy', '(max-width: 1023px) 100vw, 55vw', 1344, 1008); ?>
            </div>
            <div>
                <p class="mx-eyebrow"><?php esc_html_e('The Collector\'s Edit', 'dawp'); ?></p>
                <h2 class="mh-title"><?php echo wp_kses(__('Quiet gold, <em>lasting</em> value.', 'dawp'), ['em' => []]); ?></h2>
                <p class="mh-copy"><?php esc_html_e('Dress watches and precious-metal references chosen for proportion, finishing and the kind of presence that never needs to announce itself.', 'dawp'); ?></p>
                <a class="mx-btn mx-btn--dark" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Discover the Edit', 'dawp'); ?></a>
            </div>
        </div>
    </section>

    <section class="mh-section" style="background:var(--color-surface);">
        <div class="mx-wrap">
            <div class="mh-head">
                <div>
                    <p class="mx-eyebrow"><?php esc_html_e('Just Arrived', 'dawp'); ?></p>
                    <h2 class="mh-title"><?php esc_html_e('New to the collection', 'dawp'); ?></h2>
                </div>
                <a class="mx-link" href="<?php echo esc_url(add_query_arg('orderby', 'date', $shop_url)); ?>"><?php esc_html_e('Shop new arrivals', 'dawp'); ?></a>
            </div>
            <?php if (!empty($products)) : ?>
                <div class="mh-products">
                    <?php foreach ($products as $product) : ?>
                        <a class="mh-card" href="<?php echo esc_url($product['url']); ?>">
                            <span class="mh-card__img"><?php echo $image_tag($product['image'], $product['name'], '', 'lazy', '(max-width: 767px) 50vw, 25vw'); ?></span>
                            <?php if ($product['brand']) : ?><span class="mh-card__brand"><?php echo esc_html($product['brand']); ?></span><?php endif; ?>
                            <h3 class="mh-card__name"><?php echo esc_html($product['name']); ?></h3>
                            <span class="mh-card__price"><?php echo wp_kses_post($product['price']); ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <p class="mh-empty"><?php esc_html_e('New references are being added. Browse the full collection in the meantime.', 'dawp'); ?></p>
            <?php endif; ?>
        </div>
    </section>

    <?php if (!empty($brands)) : ?>
        <section class="mh-section" id="maisons">
            <div class="mx-wrap mh-index__wrap">
                <div class="mh-head">
                    <div>
                        <p class="mx-eyebrow"><?php esc_html_e('The Maisons', 'dawp'); ?></p>
                        <h2 class="mh-title"><?php esc_html_e('Houses we carry', 'dawp'); ?></h2>
                        <p class="mh-copy"><?php esc_html_e('From the Oyster case to the octagonal bezel, explore each house and its defining collections.', 'dawp'); ?></p>
                    </div>
                </div>
                <div class="mh-index">
                    <?php $i = 0; foreach ($brands as $slug => $brand) : $i++; ?>
                        <a href="<?php echo esc_url(dawp_product_category_url($slug)); ?>">
                            <span class="mh-index__no"><?php echo esc_html(sprintf('%02d', $i)); ?></span>
                            <span>
                                <span class="mh-index__name"><?php echo esc_html($brand['name']); ?></span>
                                <?php if (!empty($brand['short'])) : ?><span class="mh-index__short"><?php echo esc_html($brand['short']); ?></span><?php endif; ?>
                            </span>
                            <?php if (!empty($brand['image'])) : ?>
                                <span class="mh-index__thumb"><?php echo $image_tag($category_img($brand['image']), '', '', 'lazy', '84px'); ?></span>
                            <?php endif; ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section class="mh-section mh-craft">
        <div class="mx-wrap mh-craft__grid">
            <div class="mh-craft__media">
                <?php echo $image_tag($img('maison/craft-movement.jpg'), __('Macro view of a mechanical watch movement', 'dawp'), '', 'lazy', '(max-width: 1023px) 100vw, 50vw', 1200, 900); ?>
            </div>
            <div>
                <p class="mx-eyebrow mx-eyebrow--light"><?php esc_html_e('Inspected by Hand', 'dawp'); ?></p>
                <h2 class="mh-title"><?php esc_html_e('Precision is measured in fractions.', 'dawp'); ?></h2>
                <p class="mh-copy"><?php esc_html_e('Before a watch leaves us, it is examined piece by piece, from the beat of the movement to the last link of the bracelet.', 'dawp'); ?></p>
                <div class="mh-craft__notes">
                    <?php foreach ($craft_notes as $index => $note) : ?>
                        <div class="mh-craft__note">
                            <span><?php echo esc_html(sprintf('%02d', $index + 1)); ?></span>
                            <div>
                                <strong><?php echo esc_html($note['title']); ?></strong>
                                <p><?php echo esc_html($note['copy']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="mh-banner">
        <?php echo $image_tag($img('maison/concierge-wrist.jpg'), __('Sport chronograph worn with a tailored suit', 'dawp'), '', 'lazy', '100vw', 1672, 941); ?>
        <div class="mx-wrap">
            <div class="mh-banner__content">
                <p class="mx-eyebrow mx-eyebrow--light"><?php esc_html_e('Private Concierge', 'dawp'); ?></p>
                <h2 class="mh-title"><?php esc_html_e('Guidance from the first glance to the final fitting.', 'dawp'); ?></h2>
                <p class="mh-copy"><?php esc_html_e('Sizing, references, gifting or a model you cannot find: speak with our team and we will take it from there.', 'dawp'); ?></p>
                <div class="mh-banner__ctas">
                    <a class="mx-btn mx-btn--light" href="<?php echo esc_url($contact_url); ?>"><?php esc_html_e('Contact Concierge', 'dawp'); ?></a>
                    <a class="mx-btn mx-btn--ghost-light" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Browse Watches', 'dawp'); ?></a>
                </div>
            </div>
        </div>
    </section>
</div>
