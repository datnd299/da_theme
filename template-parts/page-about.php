<?php
/**
 * Luxury watch about page template part.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$shop_url     = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$contact_url  = home_url('/contact-us/');
$discover_url = $shop_url;
$services_url = home_url('/contact-us/');
$shipping_url = home_url('/shipping-policy/');
$returns_url  = home_url('/return-refund-policy/');

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

$remote_image = static function ($url, $width = 1600) {
    return esc_url($url);
};

$image_tag = static function ($src, $alt, $class = '', $loading = 'lazy', $sizes = '100vw', $width = 1600, $height = 1000, $fetchpriority = '') {
    if (function_exists('dawp_get_responsive_image')) {
        return dawp_get_responsive_image($src, $alt, $class, $width, $height, $loading, $sizes, $fetchpriority);
    }

    return '<img src="' . esc_url($src) . '" alt="' . esc_attr($alt) . '" class="' . esc_attr($class) . '" loading="' . esc_attr($loading) . '" decoding="async" sizes="' . esc_attr($sizes) . '">';
};

$principles = [
    [
        'title' => __('Product First', 'dawp'),
        'copy'  => __('Every layout begins with the watch: the dial, the case profile, the movement story and the feeling it creates on the wrist.', 'dawp'),
    ],
    [
        'title' => __('Curated Discovery', 'dawp'),
        'copy'  => __('We organize references by proportion, material, movement and occasion so collectors can compare with clarity.', 'dawp'),
    ],
    [
        'title' => __('Quiet Confidence', 'dawp'),
        'copy'  => __('Policies, authentication, shipping and consultation are presented clearly without turning the experience into noise.', 'dawp'),
    ],
];

$craft_notes = [
    [__('01', 'dawp'), __('Movement', 'dawp'), __('Automatic calibers, power reserve and complication details are explained in plain language.', 'dawp')],
    [__('02', 'dawp'), __('Materials', 'dawp'), __('Steel, gold, ceramic, sapphire and leather are selected for durability, finish and long-term character.', 'dawp')],
    [__('03', 'dawp'), __('Fit', 'dawp'), __('Case diameter, thickness, lug shape and strap feel help buyers choose a watch they will actually wear.', 'dawp')],
];

$trust_items = [
    [__('Authentication', 'dawp'), __('Each watch is inspected, documented and presented with clear reference details.', 'dawp')],
    [__('Insured Delivery', 'dawp'), __('Tracked, signature delivery supports a calm handoff from checkout to ownership.', 'dawp')],
    [__('Warranty Guidance', 'dawp'), __('Ownership support keeps care, coverage and service information easy to understand.', 'dawp')],
    [__('Private Consultation', 'dawp'), __('Personal guidance is available for sizing, gifting, collecting and first-time luxury purchases.', 'dawp')],
];
?>

<style>
    .lux-about { --black:#0B0B0B; --charcoal:#1A1A1A; --ivory:#F7F5F0; --white:#FFFFFF; --gold:#B89B5E; --gold-light:#D1BD8A; --gray-700:#555555; --gray-500:#858585; --gray-300:#CCCCCC; --gray-200:#E5E2DC; color:var(--charcoal); background:var(--white); font-family:Inter, "Avenir Next", Arial, sans-serif; letter-spacing:0; overflow:hidden; }
    .lux-about * { box-sizing:border-box; }
    .lux-about img { display:block; width:100%; height:100%; object-fit:cover; }
    .lux-about-wrap { width:min(100% - 40px,1280px); min-width:0; margin-inline:auto; }
    .lux-about-label { margin:0 0 14px; color:var(--gold); font-size:12px; font-weight:700; line-height:1.3; letter-spacing:.1em; text-transform:uppercase; }
    .lux-about-title { margin:0; font-family:"Cormorant Garamond", Georgia, serif; font-weight:400; letter-spacing:0; line-height:.98; color:inherit; }
    .lux-about-copy { margin:22px 0 0; max-width:640px; color:var(--gray-700); font-size:17px; line-height:1.75; }
    .lux-about-btn { display:inline-flex; align-items:center; justify-content:center; min-height:50px; padding:0 28px; border:1px solid var(--black); border-radius:2px; background:var(--black); color:var(--white); font-size:12px; font-weight:800; letter-spacing:.08em; text-decoration:none; text-transform:uppercase; transition:background .3s cubic-bezier(.22,1,.36,1), color .3s cubic-bezier(.22,1,.36,1), border-color .3s cubic-bezier(.22,1,.36,1), transform .3s cubic-bezier(.22,1,.36,1); }
    .lux-about-btn:hover { transform:translateY(-2px); background:transparent; color:var(--black); }
    .lux-about-btn--light { border-color:var(--ivory); background:var(--ivory); color:var(--black); }
    .lux-about-btn--light:hover { background:transparent; color:var(--ivory); }
    .lux-about-link { display:inline-flex; width:max-content; color:inherit; font-size:12px; font-weight:800; letter-spacing:.08em; text-transform:uppercase; text-decoration:underline; text-underline-offset:6px; text-decoration-thickness:1px; }
    .lux-about-section { padding:104px 0; }
    .lux-about-section--ivory { background:var(--ivory); }
    .lux-about-section--dark { background:var(--black); color:var(--ivory); }
    .lux-about-hero { min-height:calc(92vh - 112px); display:grid; align-items:end; position:relative; isolation:isolate; overflow:hidden; color:var(--ivory); background:var(--black); }
    .lux-about-hero__media { position:absolute; inset:0; z-index:-2; }
    .lux-about-hero__media img { opacity:.9; transform:scale(1.03); animation:luxAboutSlowZoom 14s cubic-bezier(.22,1,.36,1) forwards; }
    .lux-about-hero:after { content:""; position:absolute; inset:0; z-index:-1; background:linear-gradient(90deg, rgba(11,11,11,.62) 0%, rgba(11,11,11,.32) 46%, rgba(11,11,11,.05) 100%), linear-gradient(0deg, rgba(11,11,11,.58), rgba(11,11,11,0) 50%); }
    .lux-about-hero__content { max-width:760px; padding:94px 0 70px; }
    .lux-about-hero h1 { font-size:clamp(46px,7vw,84px); }
    .lux-about-hero .lux-about-copy { color:#E9E3D7; font-size:18px; }
    .lux-about-actions { display:flex; flex-wrap:wrap; gap:14px; margin-top:32px; }
    .lux-about-meta { display:flex; flex-wrap:wrap; gap:18px 34px; margin-top:34px; padding-top:26px; border-top:1px solid rgba(247,245,240,.28); color:#D8D0C2; font-size:13px; }
    .lux-about-split { display:grid; grid-template-columns:minmax(0,1fr) minmax(0,.9fr); gap:72px; align-items:center; }
    .lux-about-split--reverse { grid-template-columns:minmax(0,.9fr) minmax(0,1fr); }
    .lux-about-split--reverse .lux-about-media { order:2; }
    .lux-about-media { aspect-ratio:4/5; overflow:hidden; background:#E8E3D9; }
    .lux-about-media--wide { aspect-ratio:16/11; }
    .lux-about-media img { transition:transform .7s cubic-bezier(.22,1,.36,1); }
    .lux-about-media:hover img { transform:scale(1.025); }
    .lux-about h2 { font-size:clamp(34px,4vw,52px); }
    .lux-about-values { display:flex; flex-wrap:wrap; gap:10px; margin-top:28px; }
    .lux-about-values span { border:1px solid rgba(184,155,94,.42); background:#FBFAF7; color:var(--black); padding:10px 13px; font-size:12px; font-weight:800; letter-spacing:.08em; text-transform:uppercase; }
    .lux-about-section__head { display:flex; justify-content:space-between; align-items:end; gap:32px; margin-bottom:42px; }
    .lux-about-section__head p:not(.lux-about-label) { margin:12px 0 0; max-width:540px; color:var(--gray-700); line-height:1.7; }
    .lux-about-principles { display:grid; grid-template-columns:repeat(3,minmax(0,1fr)); gap:24px; }
    .lux-about-card { min-height:260px; padding:28px; border:1px solid var(--gray-200); background:var(--white); color:inherit; transition:border-color .28s cubic-bezier(.22,1,.36,1), transform .28s cubic-bezier(.22,1,.36,1); }
    .lux-about-card:hover { border-color:rgba(184,155,94,.55); transform:translateY(-4px); }
    .lux-about-card__index { display:block; margin-bottom:34px; color:var(--gold); font-size:12px; font-weight:800; letter-spacing:.08em; }
    .lux-about-card h3 { margin:0; color:var(--black); font-family:"Cormorant Garamond", Georgia, serif; font-size:32px; font-weight:400; line-height:1.05; }
    .lux-about-card p { margin:14px 0 0; color:var(--gray-700); line-height:1.65; }
    .lux-about-craft { display:grid; grid-template-columns:1.05fr .95fr; gap:64px; align-items:center; }
    .lux-about-craft__media { min-height:560px; position:relative; overflow:hidden; }
    .lux-about-craft__media img { position:absolute; inset:0; }
    .lux-about-craft .lux-about-copy { color:#C9C3B8; }
    .lux-about-notes { display:grid; gap:12px; margin-top:30px; }
    .lux-about-note { display:grid; grid-template-columns:42px 1fr; gap:18px; padding:20px 0; border-top:1px solid rgba(247,245,240,.22); }
    .lux-about-note span { color:var(--gold); font-size:12px; font-weight:800; letter-spacing:.08em; line-height:2.55; }
    .lux-about-note strong { display:block; color:var(--ivory); font-family:"Cormorant Garamond", Georgia, serif; font-size:31px; font-weight:400; line-height:1.05; }
    .lux-about-note em { display:block; margin-top:9px; color:#BDB6AA; font-style:normal; line-height:1.6; }
    .lux-about-trust { display:grid; grid-template-columns:repeat(4,minmax(0,1fr)); gap:24px; }
    .lux-about-trust-card { padding-top:24px; border-top:1px solid rgba(184,155,94,.55); }
    .lux-about-trust-card span { display:block; margin-bottom:18px; color:var(--gold); font-size:12px; font-weight:800; letter-spacing:.08em; }
    .lux-about-trust-card h3 { margin:0; color:inherit; font-size:17px; font-weight:700; }
    .lux-about-trust-card p { margin:10px 0 0; color:#BDB6AA; line-height:1.65; }
    .lux-about-policy { display:grid; grid-template-columns:repeat(3,minmax(0,1fr)); gap:24px; }
    .lux-about-policy a { min-height:220px; display:flex; flex-direction:column; justify-content:space-between; padding:26px; border:1px solid var(--gray-200); color:inherit; text-decoration:none; transition:border-color .28s cubic-bezier(.22,1,.36,1), transform .28s cubic-bezier(.22,1,.36,1); }
    .lux-about-policy a:hover { border-color:rgba(184,155,94,.55); transform:translateY(-4px); }
    .lux-about-policy strong { display:block; color:var(--black); font-family:"Cormorant Garamond", Georgia, serif; font-size:31px; font-weight:400; line-height:1.05; }
    .lux-about-policy span { display:block; margin-top:14px; color:var(--gray-700); line-height:1.65; }
    .lux-about-policy em { color:var(--gold); font-size:12px; font-style:normal; font-weight:800; letter-spacing:.08em; text-transform:uppercase; }
    .lux-about-cta { min-height:68vh; display:grid; align-items:end; position:relative; isolation:isolate; overflow:hidden; color:var(--ivory); background:var(--black); }
    .lux-about-cta img { position:absolute; inset:0; z-index:-2; opacity:.88; }
    .lux-about-cta:after { content:""; position:absolute; inset:0; z-index:-1; background:linear-gradient(0deg, rgba(11,11,11,.62), rgba(11,11,11,.08)); }
    .lux-about-cta__content { max-width:700px; padding:82px 0; }
    .lux-about-cta h2 { font-size:clamp(40px,5.2vw,70px); }
    .lux-about-btn:focus, .lux-about-link:focus, .lux-about-policy a:focus { outline:2px solid var(--gold-light); outline-offset:3px; }
    @keyframes luxAboutSlowZoom { from { transform:scale(1.03); } to { transform:scale(1); } }
    @media (prefers-reduced-motion: reduce) { .lux-about *, .lux-about-hero__media img { animation:none !important; transition:none !important; } }
    @media (max-width: 980px) {
        .lux-about-section { padding:72px 0; }
        .lux-about-split, .lux-about-split--reverse, .lux-about-craft { grid-template-columns:1fr; gap:36px; }
        .lux-about-split--reverse .lux-about-media { order:0; }
        .lux-about-principles, .lux-about-trust, .lux-about-policy { grid-template-columns:repeat(2,minmax(0,1fr)); }
        .lux-about-craft__media { min-height:420px; }
    }
    @media (max-width: 640px) {
        .lux-about-hero { min-height:82vh; }
        .lux-about-hero__content { padding:72px 0 46px; }
        .lux-about-section__head { display:block; margin-bottom:30px; }
        .lux-about-section__head .lux-about-link { margin-top:18px; }
        .lux-about-principles, .lux-about-trust, .lux-about-policy { display:flex; gap:16px; max-width:100%; overflow-x:auto; overflow-y:hidden; margin-inline:0; padding:0 18px 18px 0; scroll-padding-inline:0 18px; overscroll-behavior-x:contain; scroll-snap-type:x mandatory; scrollbar-width:none; }
        .lux-about-principles::-webkit-scrollbar, .lux-about-trust::-webkit-scrollbar, .lux-about-policy::-webkit-scrollbar { display:none; }
        .lux-about-card, .lux-about-trust-card, .lux-about-policy a { flex:0 0 82%; min-height:220px; scroll-snap-align:start; }
        .lux-about-trust-card { padding:24px 18px 20px; border:1px solid rgba(184,155,94,.42); }
        .lux-about-craft__media { aspect-ratio:16/10; min-height:0; }
        .lux-about-actions .lux-about-btn { width:100%; }
    }
</style>

<div class="lux-about">
    <section class="lux-about-hero" aria-labelledby="lux-about-title">
        <div class="lux-about-hero__media">
            <?php echo $image_tag($remote_image('https://images.unsplash.com/photo-1662384205880-2c7a9879cc0c'), __('Close-up of a black dial luxury dive watch', 'dawp'), '', 'eager', '100vw'); ?>
        </div>
        <div class="lux-about-wrap">
            <div class="lux-about-hero__content">
                <p class="lux-about-label"><?php esc_html_e('About chronelshop.com', 'dawp'); ?></p>
                <h1 id="lux-about-title" class="lux-about-title"><?php esc_html_e('A modern watch boutique shaped by restraint.', 'dawp'); ?></h1>
                <p class="lux-about-copy"><?php esc_html_e('We present fine mechanical timepieces through editorial storytelling, precise product information and personal guidance for confident ownership.', 'dawp'); ?></p>
                <div class="lux-about-actions">
                    <a class="lux-about-btn lux-about-btn--light" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Discover Watches', 'dawp'); ?></a>
                    <a class="lux-about-btn lux-about-btn--light" href="<?php echo esc_url($contact_url); ?>"><?php esc_html_e('Book Consultation', 'dawp'); ?></a>
                </div>
                <div class="lux-about-meta" aria-label="<?php esc_attr_e('Brand assurances', 'dawp'); ?>">
                    <span><?php esc_html_e('Curated references', 'dawp'); ?></span>
                    <span><?php esc_html_e('Authentication guidance', 'dawp'); ?></span>
                    <span><?php esc_html_e('Ownership support', 'dawp'); ?></span>
                </div>
            </div>
        </div>
    </section>

    <section class="lux-about-section lux-about-section--ivory" aria-labelledby="lux-about-story-title">
        <div class="lux-about-wrap lux-about-split">
            <div class="lux-about-media">
                <?php echo $image_tag($remote_image('https://s30964.pcdn.co/introspective-magazine/wp-content/uploads/2023/03/LB_Hero.jpg'), __('Curated collection of luxury watches in a display case', 'dawp'), '', 'lazy', '(max-width: 980px) 100vw, 50vw'); ?>
            </div>
            <div>
                <p class="lux-about-label"><?php esc_html_e('Our Story', 'dawp'); ?></p>
                <h2 id="lux-about-story-title" class="lux-about-title"><?php esc_html_e('Built for people who notice the details.', 'dawp'); ?></h2>
                <p class="lux-about-copy"><?php esc_html_e('chronelshop.com was created for collectors, gift buyers and first-time luxury watch clients who want a calmer path to choosing the right timepiece.', 'dawp'); ?></p>
                <p class="lux-about-copy"><?php esc_html_e('Rather than overwhelming the customer, we focus on proportion, finishing, movement character, wearability and the practical details that make ownership feel reassuring.', 'dawp'); ?></p>
                <div class="lux-about-values">
                    <span><?php esc_html_e('Editorial curation', 'dawp'); ?></span>
                    <span><?php esc_html_e('Mechanical clarity', 'dawp'); ?></span>
                    <span><?php esc_html_e('Concierge support', 'dawp'); ?></span>
                </div>
            </div>
        </div>
    </section>

    <section class="lux-about-section" aria-labelledby="lux-about-principles-title">
        <div class="lux-about-wrap">
            <div class="lux-about-section__head">
                <div>
                    <p class="lux-about-label"><?php esc_html_e('What Guides Us', 'dawp'); ?></p>
                    <h2 id="lux-about-principles-title" class="lux-about-title"><?php esc_html_e('Luxury through clarity, space and craft.', 'dawp'); ?></h2>
                    <p><?php esc_html_e('The experience is designed to feel closer to a private watch salon than a crowded product marketplace.', 'dawp'); ?></p>
                </div>
            </div>
            <div class="lux-about-principles">
                <?php foreach ($principles as $index => $principle) : ?>
                    <article class="lux-about-card">
                        <span class="lux-about-card__index"><?php echo esc_html(sprintf('%02d', $index + 1)); ?></span>
                        <h3><?php echo esc_html($principle['title']); ?></h3>
                        <p><?php echo esc_html($principle['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="lux-about-section lux-about-section--dark" aria-labelledby="lux-about-craft-title">
        <div class="lux-about-wrap lux-about-craft">
            <div class="lux-about-craft__media">
                <?php echo $image_tag($remote_image('https://st2.depositphotos.com/3203307/9805/i/450/depositphotos_98058508-Working-On-A-Mechanical-Watch.jpg'), __('Watchmaker adjusting a mechanical watch movement with tweezers', 'dawp'), '', 'lazy', '(max-width: 980px) 100vw, 50vw'); ?>
            </div>
            <div>
                <p class="lux-about-label"><?php esc_html_e('Craftsmanship', 'dawp'); ?></p>
                <h2 id="lux-about-craft-title" class="lux-about-title"><?php esc_html_e('Precision should feel understandable.', 'dawp'); ?></h2>
                <p class="lux-about-copy"><?php esc_html_e('A great watch is emotional, but the decision should feel informed. We translate technical detail into the things buyers actually need to know.', 'dawp'); ?></p>
                <div class="lux-about-notes">
                    <?php foreach ($craft_notes as $note) : ?>
                        <div class="lux-about-note">
                            <span><?php echo esc_html($note[0]); ?></span>
                            <div>
                                <strong><?php echo esc_html($note[1]); ?></strong>
                                <em><?php echo esc_html($note[2]); ?></em>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="lux-about-section lux-about-section--ivory" aria-labelledby="lux-about-curation-title">
        <div class="lux-about-wrap lux-about-split lux-about-split--reverse">
            <div class="lux-about-media lux-about-media--wide">
                <?php echo $image_tag($remote_image('https://images.unsplash.com/photo-1749847259324-656099d97985'), __('Gold skeleton luxury watch with an open mechanism', 'dawp'), '', 'lazy', '(max-width: 980px) 100vw, 50vw'); ?>
            </div>
            <div>
                <p class="lux-about-label"><?php esc_html_e('Our Curation', 'dawp'); ?></p>
                <h2 id="lux-about-curation-title" class="lux-about-title"><?php esc_html_e('Selected for design, movement and daily presence.', 'dawp'); ?></h2>
                <p class="lux-about-copy"><?php esc_html_e('From classic dress watches to sport references, heritage silhouettes and limited editions, every category is shaped around how the watch lives after purchase.', 'dawp'); ?></p>
                <p style="margin:30px 0 0;"><a class="lux-about-btn" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Browse Watches', 'dawp'); ?></a></p>
            </div>
        </div>
    </section>

    <section class="lux-about-section lux-about-section--dark" aria-labelledby="lux-about-trust-title">
        <div class="lux-about-wrap">
            <div class="lux-about-section__head">
                <div>
                    <p class="lux-about-label"><?php esc_html_e('Ownership Confidence', 'dawp'); ?></p>
                    <h2 id="lux-about-trust-title" class="lux-about-title"><?php esc_html_e('Support that continues after checkout.', 'dawp'); ?></h2>
                </div>
                <a class="lux-about-link" href="<?php echo esc_url($services_url); ?>"><?php esc_html_e('View services', 'dawp'); ?></a>
            </div>
            <div class="lux-about-trust">
                <?php foreach ($trust_items as $index => $item) : ?>
                    <article class="lux-about-trust-card">
                        <span><?php echo esc_html(sprintf('%02d', $index + 1)); ?></span>
                        <h3><?php echo esc_html($item[0]); ?></h3>
                        <p><?php echo esc_html($item[1]); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="lux-about-section" aria-labelledby="lux-about-policy-title">
        <div class="lux-about-wrap">
            <div class="lux-about-section__head">
                <div>
                    <p class="lux-about-label"><?php esc_html_e('Helpful Details', 'dawp'); ?></p>
                    <h2 id="lux-about-policy-title" class="lux-about-title"><?php esc_html_e('Clear policies for a calmer purchase.', 'dawp'); ?></h2>
                </div>
                <a class="lux-about-link" href="<?php echo esc_url($contact_url); ?>"><?php esc_html_e('Need help?', 'dawp'); ?></a>
            </div>
            <div class="lux-about-policy">
                <a href="<?php echo esc_url($shipping_url); ?>">
                    <span><strong><?php esc_html_e('Shipping Policy', 'dawp'); ?></strong><span><?php esc_html_e('Review handling time, transit estimates, tracking and insured delivery details before you order.', 'dawp'); ?></span></span>
                    <em><?php esc_html_e('Read more', 'dawp'); ?></em>
                </a>
                <a href="<?php echo esc_url($returns_url); ?>">
                    <span><strong><?php esc_html_e('Returns', 'dawp'); ?></strong><span><?php esc_html_e('Understand how eligible unworn items can be returned within the published return window.', 'dawp'); ?></span></span>
                    <em><?php esc_html_e('Read more', 'dawp'); ?></em>
                </a>
                <a href="<?php echo esc_url(home_url('/track-order/')); ?>">
                    <span><strong><?php esc_html_e('Order Tracking', 'dawp'); ?></strong><span><?php esc_html_e('Follow your shipment once tracking information has been shared after dispatch.', 'dawp'); ?></span></span>
                    <em><?php esc_html_e('Track order', 'dawp'); ?></em>
                </a>
            </div>
        </div>
    </section>

    <section class="lux-about-cta" aria-labelledby="lux-about-cta-title">
        <?php echo $image_tag($remote_image('https://the-chronolab.com/wp-content/uploads/2025/07/luxury-mechanical-wristwatch-dark-wooden-background.webp'), __('Skeleton dial luxury mechanical watch on a dark wooden surface', 'dawp'), '', 'lazy', '100vw'); ?>
        <div class="lux-about-wrap">
            <div class="lux-about-cta__content">
                <p class="lux-about-label"><?php esc_html_e('Begin With The Right Reference', 'dawp'); ?></p>
                <h2 id="lux-about-cta-title" class="lux-about-title"><?php esc_html_e('Find a watch that feels precise, personal and enduring.', 'dawp'); ?></h2>
                <p class="lux-about-copy" style="color:#E9E3D7;"><?php esc_html_e('Discover classic, sport, heritage and limited timepieces selected for modern collectors and confident first-time buyers.', 'dawp'); ?></p>
                <p style="margin:30px 0 0;"><a class="lux-about-btn lux-about-btn--light" href="<?php echo esc_url($discover_url); ?>"><?php esc_html_e('Discover Our World', 'dawp'); ?></a></p>
            </div>
        </div>
    </section>
</div>
