<?php
/**
 * Premium about page template part.
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
$returns_url = home_url('/return-refund-policy/');
$shipping_url = home_url('/shipping-policy/');
$store_address = '57 Calvert St, Woodbridge, VA 22191-2840';

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$mmd_about_asset = static function ($file) use ($theme_uri, $theme_dir) {
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

$mmd_about_img = static function ($file, $alt, $class = '', $width = 900, $height = 700, $loading = 'lazy', $sizes = '') use ($mmd_about_asset) {
    $url = $mmd_about_asset($file);

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

$principles = [
    [
        'title' => __('Timepiece-first selection', 'dawp'),
        'copy'  => __('We curate watches for proportion, finishing, movement character and the quiet confidence they bring to daily wear.', 'dawp'),
    ],
    [
        'title' => __('Modern collecting', 'dawp'),
        'copy'  => __('Our catalog is shaped for enthusiasts, first-time luxury buyers and gift clients who want clear guidance without noise.', 'dawp'),
    ],
    [
        'title' => __('Quality without the noise', 'dawp'),
        'copy'  => __('luxurytheme.com avoids cluttered marketplace browsing and focuses on curated watches with clear reference details and calm presentation.', 'dawp'),
    ],
];

$values = [
    __('Editorial watch storytelling', 'dawp'),
    __('Mechanical references and limited editions', 'dawp'),
    __('Insured shipping and clear returns', 'dawp'),
    __('Concierge support after purchase', 'dawp'),
];

$trust_items = [
    [__('Secure Checkout', 'dawp'), __('Encrypted checkout helps protect your payment details from cart to confirmation.', 'dawp')],
    [__('Insured Shipping', 'dawp'), __('Orders are handled in 1-2 business days, with estimated delivery usually in 4-7 business days.', 'dawp')],
    [__('Easy Returns', 'dawp'), __('Eligible unused items can be returned within 30 days after delivery.', 'dawp')],
    [__('Order Tracking', 'dawp'), __('Tracking details are provided once your order ships so you can follow each step.', 'dawp')],
];
?>

<style>
    .mmd-about { --mmd-ink:#2B2B2B; --mmd-text:#4A4A4A; --mmd-ivory:#F8F5F0; --mmd-line:#E8E5DF; --mmd-accent:#A45A3F; --mmd-accent-dark:#7F422F; --mmd-white:#FFFFFF; color:var(--mmd-text); background:var(--mmd-white); font-family:Inter, "Avenir Next", Arial, sans-serif; letter-spacing:0; }
    .mmd-about * { box-sizing:border-box; }
    .mmd-about p { margin:0; }
    .mmd-about h1, .mmd-about h2, .mmd-about h3 { margin:0; color:var(--mmd-ink); font-family:"Cormorant Garamond", Georgia, serif; font-weight:600; line-height:1.05; letter-spacing:0; }
    .mmd-about-container { width:min(100% - 48px, 1280px); margin-inline:auto; }
    .mmd-about-eyebrow { margin:0 0 10px; color:var(--mmd-accent); font-size:.68rem; font-weight:700; letter-spacing:.12em; text-transform:uppercase; }
    .mmd-about-btn { display:inline-flex; align-items:center; justify-content:center; min-height:44px; border:1px solid var(--mmd-ink); border-radius:2px; padding:0 22px; font-size:.78rem; font-weight:700; letter-spacing:.035em; text-decoration:none; text-transform:uppercase; transition:background .18s ease, color .18s ease, border-color .18s ease, transform .18s ease; }
    .mmd-about-btn:hover { transform:translateY(-1px); }
    .mmd-about-btn--primary { background:var(--mmd-ink); color:#fff; }
    .mmd-about-btn--primary:hover { background:var(--mmd-accent); border-color:var(--mmd-accent); color:#fff; }
    .mmd-about-btn--secondary { background:transparent; color:var(--mmd-ink); }
    .mmd-about-btn--secondary:hover { background:var(--mmd-ink); color:#fff; }
    .mmd-about-link { color:var(--mmd-accent); font-weight:800; text-decoration:none; }
    .mmd-about-link:hover { color:var(--mmd-accent-dark); text-decoration:underline; text-underline-offset:4px; }
    .mmd-about-hero { background:var(--mmd-ivory); border-bottom:1px solid var(--mmd-line); }
    .mmd-about-hero__grid { display:grid; gap:30px; min-height:560px; padding:42px 0; }
    .mmd-about-hero__content { display:flex; flex-direction:column; justify-content:center; max-width:640px; }
    .mmd-about-hero h1 { font-size:clamp(2.35rem, 5vw, 4.25rem); line-height:1.08; }
    .mmd-about-hero__copy { max-width:590px; margin-top:18px; color:#554E49; font-size:clamp(.96rem, 1.2vw, 1.05rem); line-height:1.7; }
    .mmd-about-hero__actions { display:flex; flex-wrap:wrap; gap:12px; margin-top:30px; }
    .mmd-about-hero__media { min-height:360px; position:relative; overflow:hidden; }
    .mmd-about-hero__media img { width:100%; height:100%; min-height:360px; object-fit:cover; }
    .mmd-about-hero__note { position:absolute; right:18px; bottom:18px; max-width:280px; background:rgba(255,255,255,.94); border:1px solid var(--mmd-line); padding:16px; color:var(--mmd-ink); font-size:.84rem; line-height:1.5; }
    .mmd-about-section { padding:68px 0; }
    .mmd-about-section--soft { background:var(--mmd-ivory); }
    .mmd-about-section__head { display:flex; align-items:end; justify-content:space-between; gap:24px; margin-bottom:28px; }
    .mmd-about-section__head h2 { font-size:clamp(1.7rem, 2.8vw, 2.55rem); line-height:1.12; }
    .mmd-about-section__head p:not(.mmd-about-eyebrow) { max-width:600px; margin-top:10px; font-size:.95rem; line-height:1.62; }
    .mmd-about-story { display:grid; gap:32px; align-items:center; }
    .mmd-about-story__media { display:grid; grid-template-columns:1fr .76fr; gap:14px; align-items:end; }
    .mmd-about-story__media img { width:100%; object-fit:cover; }
    .mmd-about-story__media img:first-child { aspect-ratio:4/5; }
    .mmd-about-story__media img:last-child { aspect-ratio:4/3; margin-bottom:34px; }
    .mmd-about-story__content h2 { font-size:clamp(1.75rem, 3vw, 2.65rem); line-height:1.12; }
    .mmd-about-story__content p { margin-top:16px; line-height:1.68; font-size:.96rem; }
    .mmd-about-values { display:flex; flex-wrap:wrap; gap:10px; margin-top:24px; }
    .mmd-about-values span { border:1px solid #D8C7BE; background:#fff; color:var(--mmd-ink); padding:9px 12px; font-size:.78rem; font-weight:800; letter-spacing:.03em; text-transform:uppercase; }
    .mmd-about-address { margin-top:20px; font-size:.92rem; line-height:1.6; color:var(--mmd-text); }
    .mmd-about-address strong { color:var(--mmd-ink); }
    .mmd-about-principles, .mmd-about-trust, .mmd-about-policy-grid, .mmd-about-gallery { display:grid; gap:18px; }
    .mmd-about-principles { grid-template-columns:1fr; }
    .mmd-about-card, .mmd-about-trust-card, .mmd-about-policy-card { background:#fff; border:1px solid var(--mmd-line); border-radius:4px; transition:border-color .18s ease, box-shadow .18s ease, transform .18s ease; }
    .mmd-about-card { padding:26px; }
    .mmd-about-card h3, .mmd-about-trust-card h3, .mmd-about-policy-card h3 { font-family:Inter, Arial, sans-serif; font-size:.94rem; font-weight:800; line-height:1.32; }
    .mmd-about-card p, .mmd-about-trust-card p, .mmd-about-policy-card p { margin-top:10px; font-size:.92rem; line-height:1.6; }
    .mmd-about-card:hover, .mmd-about-trust-card:hover, .mmd-about-policy-card:hover { border-color:#D0B8AE; box-shadow:0 18px 34px rgba(43,43,43,.09); transform:translateY(-3px); }
    .mmd-about-feature { display:grid; gap:28px; align-items:center; }
    .mmd-about-feature__media { min-height:330px; overflow:hidden; }
    .mmd-about-feature__media img { width:100%; height:100%; min-height:330px; object-fit:cover; }
    .mmd-about-feature__content h2 { font-size:clamp(1.75rem, 3vw, 2.65rem); line-height:1.12; }
    .mmd-about-feature__content p { margin-top:16px; line-height:1.68; font-size:.96rem; }
    .mmd-about-feature__content .mmd-about-btn { margin-top:28px; }
    .mmd-about-trust { grid-template-columns:repeat(2, minmax(0, 1fr)); }
    .mmd-about-trust-card { padding:22px; }
    .mmd-about-trust-card span { display:inline-flex; align-items:center; justify-content:center; width:34px; height:34px; margin-bottom:14px; border:1px solid #D8C7BE; color:var(--mmd-accent); font-weight:800; }
    .mmd-about-policy-grid { grid-template-columns:1fr; }
    .mmd-about-policy-card { display:block; color:inherit; padding:24px; text-decoration:none; }
    .mmd-about-gallery { grid-template-columns:repeat(2, minmax(0, 1fr)); }
    .mmd-about-gallery img { width:100%; aspect-ratio:1; object-fit:cover; }
    .mmd-about-cta { background:var(--mmd-ink); color:#fff; padding:62px 0; }
    .mmd-about-cta__inner { display:grid; gap:22px; align-items:center; }
    .mmd-about-cta h2 { color:#fff; font-size:clamp(1.75rem, 3vw, 2.65rem); }
    .mmd-about-cta p { max-width:620px; margin-top:12px; color:rgba(255,255,255,.76); line-height:1.65; }
    .mmd-about-cta .mmd-about-eyebrow { color:#D8B19F; }
    .mmd-about-cta__actions { display:flex; flex-wrap:wrap; gap:12px; }
    .mmd-about-cta .mmd-about-btn--primary { border-color:#fff; background:#fff; color:var(--mmd-ink); }
    .mmd-about-cta .mmd-about-btn--primary:hover { border-color:var(--mmd-accent); background:var(--mmd-accent); color:#fff; }
    .mmd-about-cta .mmd-about-btn--secondary { border-color:rgba(255,255,255,.55); color:#fff; }
    .mmd-about-cta .mmd-about-btn--secondary:hover { border-color:#fff; background:#fff; color:var(--mmd-ink); }
    @media (min-width:700px) { .mmd-about-principles { grid-template-columns:repeat(3, minmax(0, 1fr)); } .mmd-about-policy-grid { grid-template-columns:repeat(3, minmax(0, 1fr)); } .mmd-about-gallery { grid-template-columns:repeat(4, minmax(0, 1fr)); } }
    @media (min-width:900px) { .mmd-about-hero__grid { grid-template-columns:.94fr 1.06fr; } .mmd-about-story { grid-template-columns:1.06fr .94fr; } .mmd-about-feature { grid-template-columns:.96fr 1.04fr; } .mmd-about-trust { grid-template-columns:repeat(4, minmax(0, 1fr)); } .mmd-about-cta__inner { grid-template-columns:1fr auto; } .mmd-about-cta__actions { justify-content:flex-end; } }
    @media (max-width:699px) { .mmd-about-container { width:min(100% - 40px, 1280px); } .mmd-about-section { padding:50px 0; } .mmd-about-section__head { align-items:start; flex-direction:column; } .mmd-about-principles, .mmd-about-trust, .mmd-about-policy-grid { display:flex; gap:14px; margin-inline:0; overflow-x:auto; padding-inline:0; padding-bottom:4px; scroll-snap-type:x mandatory; scrollbar-width:none; } .mmd-about-principles::-webkit-scrollbar, .mmd-about-trust::-webkit-scrollbar, .mmd-about-policy-grid::-webkit-scrollbar { display:none; } .mmd-about-card, .mmd-about-trust-card, .mmd-about-policy-card { flex:0 0 clamp(17rem, 82vw, 21rem); max-width:clamp(17rem, 82vw, 21rem); scroll-snap-align:start; } .mmd-about-gallery { gap:10px; } .mmd-about-hero__note { left:14px; right:14px; } .mmd-about-cta__actions .mmd-about-btn { width:100%; } }
</style>

<div class="mmd-about">
    <section class="mmd-about-hero" aria-labelledby="mmd-about-title">
        <div class="mmd-about-container mmd-about-hero__grid">
            <div class="mmd-about-hero__content">
                <p class="mmd-about-eyebrow"><?php esc_html_e('About luxurytheme.com', 'dawp'); ?></p>
                <h1 id="mmd-about-title"><?php esc_html_e('A modern boutique for refined mechanical timepieces.', 'dawp'); ?></h1>
                <p class="mmd-about-hero__copy"><?php esc_html_e('luxurytheme.com presents luxury watches through restrained design, clear reference information and personal support for confident ownership.', 'dawp'); ?></p>
                <div class="mmd-about-hero__actions">
                    <a class="mmd-about-btn mmd-about-btn--primary" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop Collection', 'dawp'); ?></a>
                    <a class="mmd-about-btn mmd-about-btn--secondary" href="<?php echo esc_url($contact_url); ?>"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
                </div>
            </div>
            <div class="mmd-about-hero__media">
                <?php echo $mmd_about_img('Modern_living_room_smart_electro…_202607161235.jpeg', __('Refined interior setting for a luxury watch consultation', 'dawp'), '', 980, 760, 'eager', '(min-width: 900px) 50vw, 100vw'); ?>
                <div class="mmd-about-hero__note"><?php esc_html_e('Our point of view is simple: every watch should feel considered, precise and personal.', 'dawp'); ?></div>
            </div>
        </div>
    </section>

    <section class="mmd-about-section" aria-labelledby="mmd-about-story-title">
        <div class="mmd-about-container mmd-about-story">
            <div class="mmd-about-story__media">
                <?php echo $mmd_about_img('Stainless_steel_kitchen_range_counter_202607161438.jpeg', __('Polished materials and precise finishing details', 'dawp'), '', 620, 780, 'lazy', '(max-width: 899px) 58vw, 31vw'); ?>
                <?php echo $mmd_about_img('Minimalist_home_office_desk_setup_202607241524.jpeg', __('Minimal desk setting for a watch collector', 'dawp'), '', 480, 360, 'lazy', '(max-width: 899px) 43vw, 23vw'); ?>
            </div>
            <div class="mmd-about-story__content">
                <p class="mmd-about-eyebrow"><?php esc_html_e('Our Story', 'dawp'); ?></p>
                <h2 id="mmd-about-story-title"><?php esc_html_e('Curated for collectors who value proportion, craft and restraint.', 'dawp'); ?></h2>
                <p><?php esc_html_e('We built luxurytheme.com for shoppers who want a clearer, more inspiring way to discover fine timepieces. Instead of overwhelming customers with unrelated products, we focus on watches with balanced design, meaningful specifications and long-term wearability.', 'dawp'); ?></p>
                <p><?php esc_html_e('Every collection is guided by materials, movement quality, case finishing and timeless styling, so choosing a watch feels calm rather than complicated.', 'dawp'); ?></p>
                <div class="mmd-about-values">
                    <?php foreach ($values as $value) : ?>
                        <span><?php echo esc_html($value); ?></span>
                    <?php endforeach; ?>
                </div>
                <p class="mmd-about-address"><strong><?php esc_html_e('Store Address:', 'dawp'); ?></strong> <?php echo esc_html($store_address); ?></p>
            </div>
        </div>
    </section>

    <section class="mmd-about-section mmd-about-section--soft" aria-labelledby="mmd-about-principles-title">
        <div class="mmd-about-container">
            <div class="mmd-about-section__head">
                <div>
                    <p class="mmd-about-eyebrow"><?php esc_html_e('What Guides Us', 'dawp'); ?></p>
                    <h2 id="mmd-about-principles-title"><?php esc_html_e('A refined shopping experience, from inspiration to checkout.', 'dawp'); ?></h2>
                    <p><?php esc_html_e('Our store is designed to feel organized, refined and helpful, closer to a private watch salon than a crowded marketplace.', 'dawp'); ?></p>
                </div>
            </div>
            <div class="mmd-about-principles">
                <?php foreach ($principles as $principle) : ?>
                    <article class="mmd-about-card">
                        <h3><?php echo esc_html($principle['title']); ?></h3>
                        <p><?php echo esc_html($principle['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="mmd-about-section" aria-labelledby="mmd-about-curation-title">
        <div class="mmd-about-container mmd-about-feature">
            <div class="mmd-about-feature__media">
                <?php echo $mmd_about_img('Stainless_steel_kitchen_range_co…_202607161438.jpeg', __('Precise polished metal detail evoking watch case finishing', 'dawp'), '', 780, 620, 'lazy', '(max-width: 899px) 100vw, 46vw'); ?>
            </div>
            <div class="mmd-about-feature__content">
                <p class="mmd-about-eyebrow"><?php esc_html_e('Our Curation', 'dawp'); ?></p>
                <h2 id="mmd-about-curation-title"><?php esc_html_e('Fine watches chosen for design, movement and daily presence.', 'dawp'); ?></h2>
                <p><?php esc_html_e('From classic dress watches to sport references, heritage silhouettes and limited editions, each category is shaped around how collectors actually choose and wear timepieces. Product pages emphasize reference details, materials, movement notes, sizing and ownership support.', 'dawp'); ?></p>
                <a class="mmd-about-btn mmd-about-btn--secondary" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Browse Watches', 'dawp'); ?></a>
            </div>
        </div>
    </section>

    <section class="mmd-about-section mmd-about-section--soft" aria-labelledby="mmd-about-trust-title">
        <div class="mmd-about-container">
            <div class="mmd-about-section__head">
                <div>
                    <p class="mmd-about-eyebrow"><?php esc_html_e('Ownership Confidence', 'dawp'); ?></p>
                    <h2 id="mmd-about-trust-title"><?php esc_html_e('Trust built into each step of the experience.', 'dawp'); ?></h2>
                </div>
            </div>
            <div class="mmd-about-trust">
                <?php foreach ($trust_items as $index => $item) : ?>
                    <article class="mmd-about-trust-card">
                        <span><?php echo esc_html(str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT)); ?></span>
                        <h3><?php echo esc_html($item[0]); ?></h3>
                        <p><?php echo esc_html($item[1]); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="mmd-about-section" aria-labelledby="mmd-about-policies-title">
        <div class="mmd-about-container">
            <div class="mmd-about-section__head">
                <div>
                    <p class="mmd-about-eyebrow"><?php esc_html_e('Helpful Details', 'dawp'); ?></p>
                    <h2 id="mmd-about-policies-title"><?php esc_html_e('Clear policies for a calmer purchase.', 'dawp'); ?></h2>
                </div>
                <a class="mmd-about-link" href="<?php echo esc_url($contact_url); ?>"><?php esc_html_e('Need help?', 'dawp'); ?></a>
            </div>
            <div class="mmd-about-policy-grid">
                <a class="mmd-about-policy-card" href="<?php echo esc_url($shipping_url); ?>">
                    <h3><?php esc_html_e('Shipping Policy', 'dawp'); ?></h3>
                    <p><?php esc_html_e('Review handling time, transit estimates and tracking information before you order.', 'dawp'); ?></p>
                </a>
                <a class="mmd-about-policy-card" href="<?php echo esc_url($returns_url); ?>">
                    <h3><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></h3>
                    <p><?php esc_html_e('Learn how eligible unworn watches can be returned within 30 days after delivery.', 'dawp'); ?></p>
                </a>
                <a class="mmd-about-policy-card" href="<?php echo esc_url(home_url('/track-order/')); ?>">
                    <h3><?php esc_html_e('Track Order', 'dawp'); ?></h3>
                    <p><?php esc_html_e('Follow your shipment once tracking details have been shared after dispatch.', 'dawp'); ?></p>
                </a>
            </div>
        </div>
    </section>

    <section class="mmd-about-section mmd-about-section--soft" aria-labelledby="mmd-about-gallery-title">
        <div class="mmd-about-container">
            <div class="mmd-about-section__head">
                <div>
                    <p class="mmd-about-eyebrow"><?php esc_html_e('Our World', 'dawp'); ?></p>
                    <h2 id="mmd-about-gallery-title"><?php esc_html_e('Materials, precision and atmosphere guide the way we curate.', 'dawp'); ?></h2>
                </div>
            </div>
            <div class="mmd-about-gallery">
                <?php echo $mmd_about_img('Minimalist_home_office_desk_setup_202607241524.jpeg', __('Minimal collector desk with refined materials', 'dawp'), '', 420, 420, 'lazy', '(max-width: 699px) 50vw, 25vw'); ?>
                <?php echo $mmd_about_img('Stainless_steel_kitchen_range_counter_202607161438.jpeg', __('Brushed metal surface detail', 'dawp'), '', 420, 420, 'lazy', '(max-width: 699px) 50vw, 25vw'); ?>
                <?php echo $mmd_about_img('Modern_living_room_smart_electro…_202607161235.jpeg', __('Quiet modern interior for luxury consultation', 'dawp'), '', 420, 420, 'lazy', '(max-width: 699px) 50vw, 25vw'); ?>
                <?php echo $mmd_about_img('Customer_support_scene_in_office_202607161445.jpeg', __('Concierge desk for watch ownership support', 'dawp'), '', 420, 420, 'lazy', '(max-width: 699px) 50vw, 25vw'); ?>
            </div>
        </div>
    </section>

    <section class="mmd-about-cta" aria-labelledby="mmd-about-cta-title">
        <div class="mmd-about-container mmd-about-cta__inner">
            <div>
                <p class="mmd-about-eyebrow"><?php esc_html_e('Begin With The Right Reference', 'dawp'); ?></p>
                <h2 id="mmd-about-cta-title"><?php esc_html_e('Find a watch that feels precise, personal and enduring.', 'dawp'); ?></h2>
                <p><?php esc_html_e('Discover classic, sport, heritage and limited timepieces selected for modern collectors and confident first-time buyers.', 'dawp'); ?></p>
            </div>
            <div class="mmd-about-cta__actions">
                <a class="mmd-about-btn mmd-about-btn--primary" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop Collection', 'dawp'); ?></a>
                <a class="mmd-about-btn mmd-about-btn--secondary" href="<?php echo esc_url(home_url('/faq/')); ?>"><?php esc_html_e('View FAQs', 'dawp'); ?></a>
            </div>
        </div>
    </section>
</div>


