<?php
/**
 * About page content - Crowdfused.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$theme_uri   = get_template_directory_uri();
$theme_dir   = get_template_directory();
$shop_url    = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$contact_url = home_url('/contact-us/');
$faq_url     = home_url('/faq/');

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$cf_asset = static function ($file, $folder = 'New_homepage') use ($theme_uri, $theme_dir) {
    $relative = 'assets/img/' . $folder . '/' . $file;
    $path     = $theme_dir . '/' . $relative;
    $url      = $theme_uri . '/' . $relative;

    if (file_exists($path)) {
        return add_query_arg('ver', filemtime($path), $url);
    }

    return $url;
};

$cf_img = static function ($file, $alt, $folder = 'New_homepage', $class = '', $width = 900, $height = 700, $loading = 'lazy', $sizes = '') use ($cf_asset) {
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

$cf_values = [
    [
        'title' => __('Useful First', 'dawp'),
        'copy'  => __('We look for products that solve real routines before they ever land in a collection.', 'dawp'),
        'icon'  => '<path d="m9 12 2 2 4-4"></path><circle cx="12" cy="12" r="9"></circle>',
    ],
    [
        'title' => __('Modern Living', 'dawp'),
        'copy'  => __('Every category is shaped around how people actually cook, work, relax and reset at home.', 'dawp'),
        'icon'  => '<path d="M3 11.5 12 4l9 7.5"></path><path d="M5 10.5V20h14v-9.5"></path><path d="M9 20v-6h6v6"></path>',
    ],
    [
        'title' => __('Clear Shopping', 'dawp'),
        'copy'  => __('Simple product pages, protected checkout and tracking help keep the whole path easy to trust.', 'dawp'),
        'icon'  => '<rect x="3.5" y="5" width="17" height="14" rx="2"></rect><path d="M3.5 9h17"></path><path d="M7 14h4"></path>',
    ],
];

$cf_steps = [
    __('Find products with a practical reason to exist.', 'dawp'),
    __('Check for everyday fit, value and clear customer benefit.', 'dawp'),
    __('Organize the best finds into lifestyle-led collections.', 'dawp'),
    __('Keep support, shipping and returns simple after checkout.', 'dawp'),
];

$cf_promises = [
    ['label' => __('Curated innovation', 'dawp'), 'detail' => __('Products selected for quality, function and day-to-day usefulness.', 'dawp')],
    ['label' => __('Reliable fulfillment', 'dawp'), 'detail' => __('Fast processing with tracking available once your order ships.', 'dawp')],
    ['label' => __('Secure checkout', 'dawp'), 'detail' => __('Protected payment flow designed to keep ordering straightforward.', 'dawp')],
    ['label' => __('Helpful support', 'dawp'), 'detail' => __('Friendly assistance for order questions, returns and product guidance.', 'dawp')],
];
?>

<style>
    .cf-about { --cf-orange:#F58220; --cf-orange-dark:#E96F00; --cf-white:#FFFFFF; --cf-charcoal:#222222; --cf-text:#666666; --cf-light:#8A8A8A; --cf-bg:#FAFAFA; --cf-border:#E9ECEF; --cf-green:#43A047; --cf-font-heading:'Manrope', 'Inter', Arial, sans-serif; --cf-font-body:'Inter', Arial, sans-serif; --cf-radius:16px; background:var(--cf-white); color:var(--cf-text); font-family:var(--cf-font-body); letter-spacing:0; }
    .cf-about * { box-sizing:border-box; }
    .cf-about p { margin:0; }
    .cf-about h1, .cf-about h2, .cf-about h3 { margin:0; color:var(--cf-charcoal); font-family:var(--cf-font-heading); font-weight:800; letter-spacing:-0.01em; line-height:1.15; }
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
    .cf-about-hero { background:var(--cf-bg); border-bottom:1px solid var(--cf-border); padding:40px 0 52px; }
    .cf-about-hero__grid { display:grid; gap:32px; align-items:center; }
    .cf-about-hero__content { max-width:580px; }
    .cf-about-hero h1 { font-size:clamp(2rem, 4.4vw, 3.1rem); }
    .cf-about-hero__copy { margin-top:18px; font-size:clamp(1rem, 1.6vw, 1.1rem); line-height:1.7; }
    .cf-about-hero__actions, .cf-about-hero__proof { display:flex; flex-wrap:wrap; gap:12px; margin-top:26px; }
    .cf-about-hero__proof span { display:inline-flex; align-items:center; gap:8px; color:var(--cf-charcoal); font-size:.84rem; font-weight:700; }
    .cf-about-hero__proof span::before { content:""; width:8px; height:8px; border-radius:999px; background:var(--cf-green); flex:none; }
    .cf-about-hero__media, .cf-about-story__media, .cf-about-curation__media { position:relative; overflow:hidden; border-radius:var(--cf-radius); box-shadow:0 24px 48px rgba(34,34,34,.14); }
    .cf-about-hero__media img, .cf-about-story__media img, .cf-about-curation__media img { width:100%; height:100%; min-height:320px; object-fit:cover; display:block; }
    .cf-about-hero__badge { position:absolute; left:16px; bottom:16px; right:16px; max-width:360px; display:grid; gap:4px; padding:14px 16px; border-radius:14px; background:rgba(255,255,255,.96); box-shadow:0 16px 32px rgba(34,34,34,.18); backdrop-filter:blur(6px); }
    .cf-about-hero__badge strong { color:var(--cf-charcoal); font-family:var(--cf-font-heading); font-size:.96rem; font-weight:800; }
    .cf-about-hero__badge span { color:var(--cf-text); font-size:.82rem; line-height:1.45; }
    .cf-about-story, .cf-about-curation { display:grid; gap:36px; align-items:center; }
    .cf-about-story__copy { display:grid; gap:16px; margin-top:18px; font-size:.96rem; line-height:1.68; }
    .cf-about-value-grid, .cf-about-promise-grid { display:grid; gap:16px; }
    .cf-about-value, .cf-about-promise { border:1px solid var(--cf-border); border-radius:var(--cf-radius); padding:22px; background:var(--cf-white); transition:transform 260ms ease, box-shadow 260ms ease; }
    .cf-about-value:hover, .cf-about-promise:hover { transform:translateY(-3px); box-shadow:0 18px 36px rgba(34,34,34,.1); }
    .cf-about-value__icon { display:inline-flex; align-items:center; justify-content:center; width:44px; height:44px; margin-bottom:14px; border-radius:999px; background:var(--cf-bg); color:var(--cf-orange); }
    .cf-about-value__icon svg { width:22px; height:22px; fill:none; stroke:currentColor; stroke-width:1.9; stroke-linecap:round; stroke-linejoin:round; }
    .cf-about-value h3, .cf-about-promise h3 { font-size:1rem; }
    .cf-about-value p, .cf-about-promise p { margin-top:8px; font-size:.88rem; line-height:1.6; color:var(--cf-text); }
    .cf-about-steps { display:grid; gap:14px; margin-top:24px; counter-reset:cf-step; }
    .cf-about-step { display:flex; gap:14px; align-items:flex-start; padding:16px; border:1px solid var(--cf-border); border-radius:var(--cf-radius); background:var(--cf-white); counter-increment:cf-step; }
    .cf-about-step::before { content:counter(cf-step); display:inline-flex; align-items:center; justify-content:center; flex:none; width:34px; height:34px; border-radius:999px; background:var(--cf-orange); color:var(--cf-white); font-family:var(--cf-font-heading); font-size:.86rem; font-weight:800; }
    .cf-about-step p { color:var(--cf-charcoal); font-weight:700; line-height:1.5; }
    .cf-about-banner { position:relative; min-height:420px; display:flex; align-items:flex-end; overflow:hidden; border-radius:var(--cf-radius); }
    .cf-about-banner img { position:absolute; inset:0; z-index:0; width:100%; height:100%; object-fit:cover; }
    .cf-about-banner::after { content:""; position:absolute; inset:0; z-index:1; background:linear-gradient(90deg, rgba(15,15,15,.82) 0%, rgba(15,15,15,.52) 42%, rgba(15,15,15,.12) 76%), linear-gradient(0deg, rgba(15,15,15,.5), rgba(15,15,15,0) 65%); }
    .cf-about-banner__content { position:relative; z-index:2; max-width:580px; padding:36px; color:var(--cf-white); }
    .cf-about-banner__content h2 { color:var(--cf-white); font-size:clamp(1.6rem, 3vw, 2.35rem); }
    .cf-about-banner__content p { margin-top:14px; color:rgba(255,255,255,.86); font-size:1rem; line-height:1.65; }
    .cf-about-cta { background:var(--cf-charcoal); padding:52px 0; }
    .cf-about-cta__inner { display:grid; gap:24px; align-items:center; }
    .cf-about-cta h2 { color:var(--cf-white); font-size:clamp(1.5rem, 2.6vw, 2.1rem); }
    .cf-about-cta p:not(.cf-eyebrow) { margin-top:10px; max-width:560px; color:rgba(255,255,255,.72); font-size:.94rem; line-height:1.6; }
    .cf-about-cta__actions { display:flex; flex-wrap:wrap; gap:12px; }
    @media (max-width:759px) {
        .cf-section__head { flex-direction:column; align-items:start; }
        .cf-about-value-grid, .cf-about-promise-grid { display:flex; gap:14px; margin-inline:-20px; overflow-x:auto; overscroll-behavior-x:contain; padding-inline:20px; padding-bottom:6px; scroll-snap-type:x mandatory; scrollbar-width:none; }
        .cf-about-value-grid::-webkit-scrollbar, .cf-about-promise-grid::-webkit-scrollbar { display:none; }
        .cf-about-value, .cf-about-promise { flex:0 0 clamp(16rem, 82vw, 20rem); max-width:clamp(16rem, 82vw, 20rem); scroll-snap-align:start; }
        .cf-about-banner { min-height:360px; }
        .cf-about-banner__content { padding:26px; }
    }
    @media (min-width:760px) {
        .cf-about-hero__grid { grid-template-columns:.92fr 1.08fr; min-height:480px; }
        .cf-about-hero__media { min-height:420px; }
        .cf-about-hero__media img { min-height:420px; }
        .cf-about-story, .cf-about-curation { grid-template-columns:.95fr 1.05fr; }
        .cf-about-value-grid { grid-template-columns:repeat(3, minmax(0,1fr)); }
        .cf-about-promise-grid { grid-template-columns:repeat(2, minmax(0,1fr)); }
        .cf-about-cta__inner { grid-template-columns:1fr auto; }
    }
    @media (min-width:1024px) {
        .cf-section { padding:96px 0; }
        .cf-about-promise-grid { grid-template-columns:repeat(4, minmax(0,1fr)); }
    }
</style>

<div class="cf-about">

    <section class="cf-about-hero" aria-labelledby="cf-about-title">
        <div class="cf-container cf-about-hero__grid">
            <div class="cf-about-hero__content">
                <p class="cf-eyebrow"><?php esc_html_e('About Crowdfused', 'dawp'); ?></p>
                <h1 id="cf-about-title"><?php esc_html_e('We Curate Innovation For Everyday Life', 'dawp'); ?></h1>
                <p class="cf-about-hero__copy"><?php esc_html_e('Crowdfused brings together practical, modern products that make daily routines feel simpler, smarter and more enjoyable.', 'dawp'); ?></p>
                <div class="cf-about-hero__actions">
                    <a class="cf-btn cf-btn--primary" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop Innovations', 'dawp'); ?></a>
                    <a class="cf-btn cf-btn--secondary" href="<?php echo esc_url($contact_url); ?>"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
                </div>
                <div class="cf-about-hero__proof">
                    <span><?php esc_html_e('Curated product discovery', 'dawp'); ?></span>
                    <span><?php esc_html_e('Secure checkout', 'dawp'); ?></span>
                    <span><?php esc_html_e('Easy customer support', 'dawp'); ?></span>
                </div>
            </div>
            <div class="cf-about-hero__media">
                <?php echo $cf_img('Innovation_fits_everyday_life_202607281529.jpeg', __('Modern everyday products arranged for simple, useful living', 'dawp'), 'New_homepage', '', 980, 760, 'eager', '(min-width: 760px) 54vw, 100vw'); ?>
                <div class="cf-about-hero__badge">
                    <strong><?php esc_html_e('Innovation, made practical', 'dawp'); ?></strong>
                    <span><?php esc_html_e('Chosen for function, value and how naturally each product fits into real life.', 'dawp'); ?></span>
                </div>
            </div>
        </div>
    </section>

    <section class="cf-section" aria-labelledby="cf-about-story-title">
        <div class="cf-container cf-about-story">
            <div class="cf-about-story__media">
                <?php echo $cf_img('Living_room_minimalist_design_ph…_202607281539.jpeg', __('Calm modern living room with useful home products', 'dawp'), 'New_homepage', '', 780, 620, 'lazy', '(max-width: 759px) 100vw, 44vw'); ?>
            </div>
            <div>
                <p class="cf-eyebrow"><?php esc_html_e('Our Story', 'dawp'); ?></p>
                <h2 id="cf-about-story-title"><?php esc_html_e('A better way to discover useful things.', 'dawp'); ?></h2>
                <div class="cf-about-story__copy">
                    <p><?php esc_html_e('Online shopping can feel crowded with products that look clever but do not earn a place in daily life. Crowdfused was built around a simpler idea: highlight useful finds that help people live, work, cook, organize and unwind with less friction.', 'dawp'); ?></p>
                    <p><?php esc_html_e('From smart home devices to kitchen tools, patio upgrades and wellness essentials, our collections are shaped around practical benefits instead of endless browsing.', 'dawp'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <section class="cf-section cf-section--soft" aria-labelledby="cf-about-values-title">
        <div class="cf-container">
            <div class="cf-section__head">
                <div>
                    <p class="cf-eyebrow"><?php esc_html_e('What Guides Us', 'dawp'); ?></p>
                    <h2 id="cf-about-values-title"><?php esc_html_e('Products should earn their space.', 'dawp'); ?></h2>
                    <p><?php esc_html_e('Every selection starts with usefulness, then earns trust through quality, clarity and everyday fit.', 'dawp'); ?></p>
                </div>
            </div>
            <div class="cf-about-value-grid">
                <?php foreach ($cf_values as $value) : ?>
                    <article class="cf-about-value">
                        <span class="cf-about-value__icon" aria-hidden="true"><svg viewBox="0 0 24 24"><?php echo $value['icon']; ?></svg></span>
                        <h3><?php echo esc_html($value['title']); ?></h3>
                        <p><?php echo esc_html($value['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="cf-section" aria-labelledby="cf-about-curation-title">
        <div class="cf-container cf-about-curation">
            <div>
                <p class="cf-eyebrow"><?php esc_html_e('How We Curate', 'dawp'); ?></p>
                <h2 id="cf-about-curation-title"><?php esc_html_e('A practical filter for modern life.', 'dawp'); ?></h2>
                <p class="cf-about-hero__copy"><?php esc_html_e('We organize discovery around everyday needs, so shoppers can move from idea to useful purchase with confidence.', 'dawp'); ?></p>
                <div class="cf-about-steps">
                    <?php foreach ($cf_steps as $step) : ?>
                        <div class="cf-about-step"><p><?php echo esc_html($step); ?></p></div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="cf-about-curation__media">
                <?php echo $cf_img('Kitchen_Home_Innovation_Smart_Tools_202607281513.jpeg', __('Smart kitchen and home tools selected for everyday utility', 'dawp'), 'New_homepage', '', 780, 620, 'lazy', '(max-width: 759px) 100vw, 44vw'); ?>
            </div>
        </div>
    </section>

    <section class="cf-section cf-section--soft" aria-labelledby="cf-about-promise-title">
        <div class="cf-container">
            <div class="cf-section__head">
                <div>
                    <p class="cf-eyebrow"><?php esc_html_e('Our Promise', 'dawp'); ?></p>
                    <h2 id="cf-about-promise-title"><?php esc_html_e('A shopping experience built for confidence.', 'dawp'); ?></h2>
                </div>
                <a class="cf-link" href="<?php echo esc_url($faq_url); ?>"><?php esc_html_e('Visit FAQ', 'dawp'); ?></a>
            </div>
            <div class="cf-about-promise-grid">
                <?php foreach ($cf_promises as $promise) : ?>
                    <article class="cf-about-promise">
                        <h3><?php echo esc_html($promise['label']); ?></h3>
                        <p><?php echo esc_html($promise['detail']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="cf-section" aria-labelledby="cf-about-philosophy-title">
        <div class="cf-container">
            <div class="cf-about-banner">
                <?php echo $cf_img('Office_desk_accessories_workspac…_202607281532.jpeg', __('Organized workspace with practical productivity accessories', 'dawp'), 'New_homepage', '', 1200, 700, 'lazy', '100vw'); ?>
                <div class="cf-about-banner__content">
                    <p class="cf-eyebrow" style="color:#FFC98A;"><?php esc_html_e('Our Philosophy', 'dawp'); ?></p>
                    <h2 id="cf-about-philosophy-title"><?php esc_html_e('The best innovation feels effortless.', 'dawp'); ?></h2>
                    <p><?php esc_html_e('We believe good products do not need to shout. They simply make ordinary moments easier, cleaner, faster or more enjoyable.', 'dawp'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <section class="cf-about-cta" aria-labelledby="cf-about-cta-title">
        <div class="cf-container cf-about-cta__inner">
            <div>
                <p class="cf-eyebrow" style="color:#FFC98A;"><?php esc_html_e('Start Exploring', 'dawp'); ?></p>
                <h2 id="cf-about-cta-title"><?php esc_html_e('Find something useful for the way you live.', 'dawp'); ?></h2>
                <p><?php esc_html_e('Browse curated categories built around home, work, wellness, outdoor living and smart everyday upgrades.', 'dawp'); ?></p>
            </div>
            <div class="cf-about-cta__actions">
                <a class="cf-btn cf-btn--primary" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop Now', 'dawp'); ?></a>
                <a class="cf-btn cf-btn--secondary" href="<?php echo esc_url($contact_url); ?>"><?php esc_html_e('Get Support', 'dawp'); ?></a>
            </div>
        </div>
    </section>

</div>
