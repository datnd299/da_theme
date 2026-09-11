<?php
/**
 * Template Part: page-about
 *
 * @package dawp
 */

defined('ABSPATH') || exit;

$asset_base = trailingslashit(get_template_directory_uri()) . 'assets/images/Zorexwatch/';
$shop_url   = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
?>

<section class="zc-about-hero">
    <div class="zc-wrap zc-about-hero__grid">
        <div class="zc-about-hero__copy">
            <span class="zc-kicker"><?php esc_html_e('About Zorex Craft', 'dawp'); ?></span>
            <h1><?php esc_html_e('Zorex Craft Watches.', 'dawp'); ?></h1>
            <p><?php esc_html_e('Zorex Craft is an independent watch brand focused on refined design, practical detail and a direct shopping experience for our own timepieces.', 'dawp'); ?></p>
            <div class="zc-actions">
                <a class="zc-button zc-button--primary" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Shop Watches', 'dawp'); ?></a>
                <a class="zc-button zc-button--secondary" href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Contact Us', 'dawp'); ?></a>
            </div>
        </div>
        <div class="zc-about-hero__visual" aria-hidden="true">
            <figure class="zc-about-frame zc-about-frame--main">
                <img src="<?php echo esc_url($asset_base . '14.png'); ?>" alt="">
            </figure>
            <figure class="zc-about-frame zc-about-frame--detail">
                <img src="<?php echo esc_url($asset_base . '15.png'); ?>" alt="">
            </figure>
        </div>
    </div>
</section>

<section class="zc-about-strip" aria-label="<?php esc_attr_e('Brand principles', 'dawp'); ?>">
    <div class="zc-wrap zc-about-strip__grid">
        <div><span>01</span><strong><?php esc_html_e('Original Zorex Line', 'dawp'); ?></strong></div>
        <div><span>02</span><strong><?php esc_html_e('Clean Watch Detail', 'dawp'); ?></strong></div>
        <div><span>03</span><strong><?php esc_html_e('Direct Brand Support', 'dawp'); ?></strong></div>
    </div>
</section>

<section class="zc-about-section zc-about-section--white">
    <div class="zc-wrap zc-about-statement">
        <span class="zc-kicker"><?php esc_html_e('Our Point of View', 'dawp'); ?></span>
        <h2><?php esc_html_e('A watch brand should make details clear.', 'dawp'); ?></h2>
        <p><?php esc_html_e('We present Zorex Craft watches with strong imagery, structured specifications and calm page layouts. The result feels refined without hiding the details people need before they buy.', 'dawp'); ?></p>
    </div>
</section>

<section class="zc-about-section zc-about-section--ice">
    <div class="zc-wrap zc-about-values">
        <article><span></span><h3><?php esc_html_e('Our own watches', 'dawp'); ?></h3><p><?php esc_html_e('The catalog is built around Zorex Craft models, organized by use, style and product detail rather than outside labels.', 'dawp'); ?></p></article>
        <article><span></span><h3><?php esc_html_e('Information-led', 'dawp'); ?></h3><p><?php esc_html_e('Names, prices and available specifications remain readable so every Zorex watch can be compared without visual clutter.', 'dawp'); ?></p></article>
        <article><span></span><h3><?php esc_html_e('No inflated claims', 'dawp'); ?></h3><p><?php esc_html_e('We keep the language direct and avoid unsupported heritage, certification, warranty, material or investment promises.', 'dawp'); ?></p></article>
    </div>
</section>

<section class="zc-about-editorial">
    <figure class="zc-about-editorial__media">
        <img src="<?php echo esc_url($asset_base . '16.png'); ?>" alt="<?php esc_attr_e('Watch detail on a collector desk', 'dawp'); ?>">
    </figure>
    <div class="zc-wrap zc-about-editorial__content">
        <span class="zc-kicker"><?php esc_html_e('Built by Zorex', 'dawp'); ?></span>
        <h2><?php esc_html_e('Clear design, direct presentation, no reseller story.', 'dawp'); ?></h2>
        <p><?php esc_html_e('Zorex Craft presents its own watches with a focused brand approach: refined enough to feel special, structured enough to shop with ease.', 'dawp'); ?></p>
        <a class="zc-button zc-button--light" href="<?php echo esc_url($shop_url); ?>"><?php esc_html_e('Explore the Catalog', 'dawp'); ?></a>
    </div>
</section>
