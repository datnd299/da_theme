<?php
/**
 * Brickygo about page template part.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$shop_url    = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$contact_url = home_url('/contact-us/');
$faq_url     = home_url('/faq/');

if (!$shop_url) {
    $shop_url = home_url('/shop/');
}

if (!function_exists('bgs_page_image')) {
    function bgs_page_image($file, $alt, $class = '', $loading = 'lazy', $sizes = '100vw', $width = 980, $height = 760) {
        if (function_exists('dawp_get_home_responsive_image')) {
            return dawp_get_home_responsive_image($file, $alt, $class, $loading, $sizes, $width, $height);
        }

        $src = esc_url(get_template_directory_uri() . '/assets/img/home/' . basename($file));
        return sprintf('<img src="%s" alt="%s" class="%s" loading="%s" width="%d" height="%d" decoding="async">', $src, esc_attr($alt), esc_attr($class), esc_attr($loading), (int) $width, (int) $height);
    }
}

$philosophy = [
    [
        'title' => __('Build', 'dawp'),
        'copy'  => __('The good kind of slow: hands busy, screen quiet, finished piece ready for the shelf.', 'dawp'),
    ],
    [
        'title' => __('Collect', 'dawp'),
        'copy'  => __('Fresh finds, blind-box energy and small objects with enough personality to start a setup.', 'dawp'),
    ],
    [
        'title' => __('Display', 'dawp'),
        'copy'  => __('Pieces selected for desks, shelves and rooms where display matters as much as the build.', 'dawp'),
    ],
];

$reasons = [
    __('Curated categories without marketplace clutter.', 'dawp'),
    __('Modern product imagery and clear shopping paths.', 'dawp'),
    __('Support pages that make shipping, returns and tracking easy to find.', 'dawp'),
    __('A youthful point of view that stays brand-neutral and collectible-first.', 'dawp'),
];
?>

<style>
    .bgs-page{--bgs-bg:#f7f8f4;--bgs-paper:#fff;--bgs-ink:#16131f;--bgs-muted:#625e68;--bgs-violet:#5e46e8;--bgs-lime:#d6ff57;--bgs-coral:#ff776d;--bgs-ice:#d8f3ff;--bgs-line:#16131f21;background:var(--bgs-bg);color:var(--bgs-ink);font-family:"Space Grotesk","Geist",var(--font-sans);letter-spacing:0;overflow:clip}.bgs-page *{box-sizing:border-box}.bgs-page p,.bgs-page h1,.bgs-page h2,.bgs-page h3{margin:0}.bgs-page a{color:inherit}.bgs-page__shell{width:min(100% - 32px,1120px);margin-inline:auto}.bgs-page__kicker{color:var(--bgs-violet);text-transform:uppercase;margin-bottom:12px;font-size:.72rem;font-weight:950;line-height:1.2}.bgs-page h1,.bgs-page h2{color:var(--bgs-ink);text-transform:uppercase;font-weight:920;letter-spacing:0;line-height:1.04}.bgs-page h1{max-width:600px;font-size:clamp(2rem,4vw,3.25rem)}.bgs-page h2{max-width:620px;font-size:clamp(1.45rem,2.8vw,2.35rem)}.bgs-page h3{color:var(--bgs-ink);font-size:clamp(1rem,1.5vw,1.18rem);font-weight:900;line-height:1.18}.bgs-page__lead,.bgs-page__copy{color:var(--bgs-muted);font-size:clamp(.96rem,1.25vw,1.06rem);font-weight:620;line-height:1.62}.bgs-page__lead{max-width:540px;margin-top:18px}.bgs-page__copy{max-width:650px;margin-top:16px}.bgs-page__actions{flex-wrap:wrap;gap:12px;margin-top:24px;display:flex}.bgs-page__btn,.bgs-page__text-link{justify-content:center;align-items:center;text-decoration:none;transition:background .24s,border-color .24s,color .24s,transform .24s;display:inline-flex}.bgs-page__btn{border:1px solid var(--bgs-ink);text-transform:uppercase;border-radius:999px;gap:8px;min-height:42px;padding:0 17px;font-size:.8rem;font-weight:920}.bgs-page .bgs-page__btn--lime{background:var(--bgs-lime);color:var(--bgs-ink)}.bgs-page .bgs-page__btn--ink{background:var(--bgs-violet);border-color:var(--bgs-violet);color:#fff}.bgs-page .bgs-page__btn--ghost{background:transparent;border-color:var(--bgs-line);color:var(--bgs-ink)}.bgs-page__text-link{color:var(--bgs-ink);text-transform:uppercase;gap:8px;min-height:42px;font-size:.82rem;font-weight:920}.bgs-page__hero,.bgs-page__section,.bgs-page__band{position:relative}.bgs-page__hero{padding:clamp(30px,4.5vw,58px) 0 clamp(38px,5.5vw,68px)}.bgs-page__hero-grid,.bgs-page__story-grid,.bgs-page__band-grid,.bgs-page__cta-grid{display:grid;gap:clamp(22px,3.5vw,42px);align-items:center}.bgs-page__hero-media,.bgs-page__story-media,.bgs-page__band-media{position:relative;min-height:300px;border:1px solid var(--bgs-line);border-radius:8px;background:var(--bgs-paper);overflow:hidden}.bgs-page__hero-media:before{content:"";z-index:1;width:22%;height:13%;background:var(--bgs-coral);position:absolute;top:0;right:0}.bgs-page__image{width:100%;height:100%;min-height:inherit;object-fit:cover;display:block;position:relative}.bgs-page__hero-note{z-index:2;background:var(--bgs-paper);border:1px solid var(--bgs-line);border-radius:8px;gap:5px;max-width:calc(100% - 32px);padding:12px 14px;display:grid;position:absolute;bottom:16px;left:16px}.bgs-page__hero-note span,.bgs-page__stat span,.bgs-page__card span{color:var(--bgs-violet);text-transform:uppercase;font-size:.7rem;font-weight:920;line-height:1.25}.bgs-page__hero-note strong{font-size:.94rem;line-height:1.25}.bgs-page__section{padding:clamp(42px,5.5vw,68px) 0}.bgs-page__section--paper{background:var(--bgs-paper)}.bgs-page__section-head{border-top:1px solid var(--bgs-line);margin-bottom:20px;padding-top:16px}.bgs-page__story-grid{align-items:center}.bgs-page__story-media{display:grid;grid-template-columns:1fr .72fr;gap:12px;border:0;background:transparent;border-radius:0;overflow:visible}.bgs-page__story-media img{border:1px solid var(--bgs-line);border-radius:8px;background:var(--bgs-paper);object-fit:cover;width:100%}.bgs-page__story-media img:first-child{aspect-ratio:4/5}.bgs-page__story-media img:last-child{aspect-ratio:1;margin-top:28px}.bgs-page__stats{grid-template-columns:repeat(3,minmax(0,1fr));gap:10px;margin-top:24px;display:grid}.bgs-page__stat{background:var(--bgs-paper);border:1px solid var(--bgs-line);border-radius:8px;padding:14px}.bgs-page__stat strong{font-size:clamp(1.25rem,2.2vw,1.7rem);font-weight:920;line-height:1}.bgs-page__grid{display:grid;gap:14px}.bgs-page__card{background:var(--bgs-paper);border:1px solid var(--bgs-line);border-radius:8px;padding:20px;transition:border-color .24s,transform .24s}.bgs-page__card p{color:var(--bgs-muted);margin-top:10px;font-size:.94rem;font-weight:620;line-height:1.56}.bgs-page__band{background:var(--bgs-ice);padding:clamp(42px,5.5vw,68px) 0}.bgs-page__band-media img{object-fit:cover}.bgs-page__checklist{display:grid;gap:10px;margin-top:20px}.bgs-page__checklist li{background:var(--bgs-paper);border:1px solid var(--bgs-line);border-radius:8px;padding:13px 15px;font-weight:780;line-height:1.4}.bgs-page__checklist li::before{content:"";display:inline-block;width:8px;height:8px;margin-right:10px;border-radius:999px;background:var(--bgs-lime);box-shadow:0 0 0 1px var(--bgs-ink)}.bgs-page__cta{background:var(--bgs-violet);color:#fff;padding:clamp(40px,5.5vw,62px) 0}.bgs-page__cta-grid{border-top:1px solid #ffffff47;padding-top:clamp(22px,3.5vw,34px)}.bgs-page__cta h2,.bgs-page__cta p,.bgs-page__cta .bgs-page__kicker{color:#fff}.bgs-page__cta .bgs-page__btn--lime{border-color:var(--bgs-ink)}.bgs-page__cta .bgs-page__btn--ghost{border-color:#ffffff70;color:#fff}@media (hover:hover){.bgs-page__btn:hover,.bgs-page__text-link:hover{transform:translateY(-2px)}.bgs-page__card:hover{border-color:var(--bgs-coral);transform:translateY(-3px)}}@media (min-width:700px){.bgs-page__grid{grid-template-columns:repeat(3,minmax(0,1fr))}}@media (min-width:900px){.bgs-page__shell{width:min(100% - 48px,1120px)}.bgs-page__hero-grid{grid-template-columns:.86fr 1.14fr}.bgs-page__story-grid,.bgs-page__band-grid,.bgs-page__cta-grid{grid-template-columns:repeat(2,minmax(0,1fr))}.bgs-page__hero-media,.bgs-page__band-media{min-height:420px}.bgs-page__cta-grid{gap:24px}.bgs-page__cta-actions{justify-self:end}}@media (max-width:699px){.bgs-page__shell{width:min(100% - 24px,1120px)}.bgs-page h1{font-size:clamp(2rem,9vw,2.5rem)}.bgs-page h2{font-size:clamp(1.32rem,6vw,1.9rem)}.bgs-page__actions .bgs-page__btn{width:100%}.bgs-page__stats{grid-template-columns:1fr}.bgs-page__grid{display:flex;gap:14px;overflow-x:auto;padding-bottom:4px;scroll-snap-type:x mandatory;scrollbar-width:none}.bgs-page__grid::-webkit-scrollbar{display:none}.bgs-page__card{flex:0 0 clamp(17rem,82vw,21rem);scroll-snap-align:start}.bgs-page__story-media{min-height:auto}.bgs-page__hero-note{right:14px;left:14px}}@media (prefers-reduced-motion:reduce){.bgs-page *,.bgs-page :before,.bgs-page :after{scroll-behavior:auto!important;transition-duration:.01ms!important}}
</style>
<style>
    .bgs-page__cta .bgs-page__btn--ghost:hover,
    .bgs-page__cta .bgs-page__btn--ghost:focus-visible {
        background: #fff;
        border-color: #fff;
        color: var(--bgs-violet);
    }
</style>

<div class="bgs-page bgs-page--about">
    <section class="bgs-page__hero" aria-labelledby="bgs-about-title">
        <div class="bgs-page__shell bgs-page__hero-grid">
            <div>
                <p class="bgs-page__kicker"><?php esc_html_e('About Brickygo', 'dawp'); ?></p>
                <h1 id="bgs-about-title"><?php esc_html_e('Collectible culture, edited clean.', 'dawp'); ?></h1>
                <p class="bgs-page__lead"><?php esc_html_e('Brickygo is a youthful collectible store for builders, display collectors and gift hunters who like creative objects with personality.', 'dawp'); ?></p>
                <div class="bgs-page__actions">
                    <a class="bgs-page__btn bgs-page__btn--lime" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop Drops', 'dawp'); ?><span aria-hidden="true">-&gt;</span></a>
                    <a class="bgs-page__btn bgs-page__btn--ghost" href="<?php echo esc_url($contact_url); ?>"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
                </div>
            </div>
            <div class="bgs-page__hero-media">
                <?php echo bgs_page_image('21.png', __('Colorful collectible display pieces in a clean studio scene.', 'dawp'), 'bgs-page__image', 'eager', '(max-width: 899px) 100vw, 58vw', 1320, 1060); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                <div class="bgs-page__hero-note">
                    <span><?php esc_html_e('Point of view', 'dawp'); ?></span>
                    <strong><?php esc_html_e('Build. Collect. Display.', 'dawp'); ?></strong>
                </div>
            </div>
        </div>
    </section>

    <section class="bgs-page__section bgs-page__section--paper" aria-labelledby="bgs-about-story-title">
        <div class="bgs-page__shell bgs-page__story-grid">
            <div class="bgs-page__story-media">
                <?php echo bgs_page_image('22.png', __('Collector desk with display-ready builds and figures.', 'dawp'), '', 'lazy', '(max-width: 899px) 58vw, 31vw', 620, 780); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                <?php echo bgs_page_image('23.png', __('Small colorful collectible build arranged for display.', 'dawp'), '', 'lazy', '(max-width: 899px) 42vw, 20vw', 480, 480); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            </div>
            <div>
                <p class="bgs-page__kicker"><?php esc_html_e('Brand Story', 'dawp'); ?></p>
                <h2 id="bgs-about-story-title"><?php esc_html_e('Made for the shelf, not the scroll.', 'dawp'); ?></h2>
                <p class="bgs-page__copy"><?php esc_html_e('We started Brickygo around a simple idea: collecting should feel clear, current and fun. The store brings together building sets, art figures, blind boxes and display pieces without the crowded-marketplace noise.', 'dawp'); ?></p>
                <p class="bgs-page__copy"><?php esc_html_e('Every page is shaped around the same rhythm: find a piece, enjoy the build, and give it a place worth seeing.', 'dawp'); ?></p>
                <div class="bgs-page__stats" aria-label="<?php esc_attr_e('Brickygo focus areas', 'dawp'); ?>">
                    <div class="bgs-page__stat"><span><?php esc_html_e('01', 'dawp'); ?></span><strong><?php esc_html_e('Build', 'dawp'); ?></strong></div>
                    <div class="bgs-page__stat"><span><?php esc_html_e('02', 'dawp'); ?></span><strong><?php esc_html_e('Collect', 'dawp'); ?></strong></div>
                    <div class="bgs-page__stat"><span><?php esc_html_e('03', 'dawp'); ?></span><strong><?php esc_html_e('Display', 'dawp'); ?></strong></div>
                </div>
            </div>
        </div>
    </section>

    <section class="bgs-page__section" aria-labelledby="bgs-about-philosophy-title">
        <div class="bgs-page__shell">
            <div class="bgs-page__section-head">
                <p class="bgs-page__kicker"><?php esc_html_e('Philosophy', 'dawp'); ?></p>
                <h2 id="bgs-about-philosophy-title"><?php esc_html_e('Built around modern collecting rituals.', 'dawp'); ?></h2>
            </div>
            <div class="bgs-page__grid">
                <?php foreach ($philosophy as $item) : ?>
                    <article class="bgs-page__card">
                        <span><?php echo esc_html($item['title']); ?></span>
                        <h3><?php echo esc_html($item['title']); ?></h3>
                        <p><?php echo esc_html($item['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bgs-page__band" aria-labelledby="bgs-about-why-title">
        <div class="bgs-page__shell bgs-page__band-grid">
            <div>
                <p class="bgs-page__kicker"><?php esc_html_e('Why Brickygo', 'dawp'); ?></p>
                <h2 id="bgs-about-why-title"><?php esc_html_e('Focused, visual and collector-friendly.', 'dawp'); ?></h2>
                <ul class="bgs-page__checklist">
                    <?php foreach ($reasons as $reason) : ?>
                        <li><?php echo esc_html($reason); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="bgs-page__band-media">
                <?php echo bgs_page_image('24.png', __('Graphic collectible display with violet lighting and clean negative space.', 'dawp'), 'bgs-page__image', 'lazy', '(max-width: 899px) 100vw, 48vw', 980, 980); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            </div>
        </div>
    </section>

    <section class="bgs-page__cta" aria-labelledby="bgs-about-cta-title">
        <div class="bgs-page__shell bgs-page__cta-grid">
            <div>
                <p class="bgs-page__kicker"><?php esc_html_e('Stay Curious', 'dawp'); ?></p>
                <h2 id="bgs-about-cta-title"><?php esc_html_e('Find your next display piece.', 'dawp'); ?></h2>
                <p class="bgs-page__copy"><?php esc_html_e('Browse fresh collectibles selected for modern shelves, desks and creative spaces.', 'dawp'); ?></p>
            </div>
            <div class="bgs-page__actions bgs-page__cta-actions">
                <a class="bgs-page__btn bgs-page__btn--lime" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop Collectibles', 'dawp'); ?><span aria-hidden="true">-&gt;</span></a>
                <a class="bgs-page__btn bgs-page__btn--ghost" href="<?php echo esc_url($faq_url); ?>"><?php esc_html_e('View FAQs', 'dawp'); ?></a>
            </div>
        </div>
    </section>
</div>
